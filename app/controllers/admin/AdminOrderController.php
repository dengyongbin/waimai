<?php

/**
 * Created by PhpStorm.
 * User: dengyb
 * Date: 14-10-14
 * Time: 下午2:14
 */
class AdminOrderController extends AdminController
{

    private $allOrderViewPath = 'admin.order.allOrder';
    private $todayOrderViewPath = 'admin.order.todayOrder';

    public function allOrder()
    {
        $contacts = Input::get('contacts');
        $telphone = Input::get('telphone');
        $order_no = Input::get('order_no');
        $order_status = Input::get('order_status');
        $start_time = Input::get('start_time');
        $end_time = Input::get('end_time');
        // 下拉枚举值
        $enums = array(
            'PAY_TYPE' => Config::get('nt.PAY_TYPE'),
            'PAY_STATUS' => Config::get('nt.PAY_STATUS'),
            'ORDER_STATUS' => Config::get('nt.ORDER_STATUS'),
            'ORDER_TYPE' => Config::get('nt.ORDER_TYPE'),
        );
        // 查询条件参数
        $param = new Order();
        $param->contacts = $contacts;
        $param->telphone = $telphone;
        $param->order_no = $order_no;
        $param->order_status = $order_status;
        $time = array($start_time, $end_time);
        $orders = Order::where(function ($query) use ($contacts, $telphone, $order_no, $order_status, $start_time, $end_time) {
            // 联系人
            if (!empty($contacts)) {
                $query->where('contacts', $contacts);
            }
            // 联系电话
            if (!empty($telphone)) {
                $query->where('telphone', $telphone);
            }
            // 订单编号
            if (!empty($order_no)) {
                $query->where('order_no', $order_no);
            }
            // 订单状态
            if ($order_status != 0) {
                $query->where('order_status', $order_status);
            }
            // 订单时间
            if (!empty($start_time) && empty($end_time)) {
                $query->where('created_at', '>=', $start_time);
            } elseif (empty($start_time) && !empty($end_time)) {
                $query->where('created_at', '<=', $end_time);
            } elseif (!empty($start_time) && !empty($end_time)) {
                $query->whereBetween('created_at', array($start_time, $end_time . ' 23:59:59'));
            }

        })->paginate(5);
        // 菜品订单记录
        $good_orders = $this->getGoodOrders($orders);
        return $this->makeView($this->allOrderViewPath, compact('orders', 'enums', 'param', 'time', 'good_orders'), 'orders', 'enums', 'param', 'time', 'good_orders');
    }

    public function todayOrder($order_status)
    {
        // 下拉枚举值
        $enums = array(
            'PAY_TYPE' => Config::get('nt.PAY_TYPE'),
            'PAY_STATUS' => Config::get('nt.PAY_STATUS'),
            'ORDER_STATUS' => Config::get('nt.ORDER_STATUS'),
            'ORDER_TYPE' => Config::get('nt.ORDER_TYPE'),
        );
        Log::info(date('Y-m-d', time()));
        $orders = Order::where(DB::raw('date(created_at)'), '=', date('y-m-d', time()))
            ->where(function ($query) use ($order_status) {
                if ($order_status != 'all') {
                    $query->where('order_status', '=', $order_status);
                }
            })
            ->get();
        // 菜品订单记录
        $good_orders = count($orders) == 0 ? array() : $this->getGoodOrders($orders);
        return $this->makeView($this->todayOrderViewPath, compact('orders', 'enums', 'good_orders', 'order_status'), 'orders', 'enums', 'good_orders', 'order_status');
    }

    public function operation($id, $code)
    {
        $order = Order::find($id);
        $order->order_status = $code;
        $order->save();
        return Redirect::to('admin/order/todayOrder/all');
    }

    private function getGoodOrders($orders)
    {
        // 菜品订单记录
        $order_ids = array();
        foreach ($orders as $temp) {
            array_push($order_ids, $temp->id);
        }
        $goodOrders = GoodOrder::whereIn('order_id', $order_ids)->get();
        $good_orders = array();
        foreach ($order_ids as $id) {
            $goods = array();
            foreach ($goodOrders as $temp) {
                if ($id == $temp->order_id) {
                    $new_good = array(
                        'good_id' => $temp->good_id,
                        'good_name' => $temp->good_name,
                        'number' => $temp->number,
                        'price' => $temp->price,
                        'total_price' => $temp->total_price);
                    array_push($goods, $new_good);
                } else {
                    break;
                }
            }
            $good_orders = array_add($good_orders, $id, $goods);
        }

        return $good_orders;

    }
}