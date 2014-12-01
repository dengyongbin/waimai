<?php

/**
 * Created by PhpStorm.
 * User: Jian
 * Date: 14-11-12
 * Time: 上午10:11
 */
class PhoneOrderController extends AdminController
{
    private $orderViewPath = 'admin.phoneOrder.order';
    private $orderUrl = '/admin/phone/order';

    function order()
    {
        $goods = Good::all();
        $catgs = GoodCategory::all();
        $good = new Good();
        $goodOrder = new GoodOrder();
        return $this->makeView($this->orderViewPath, compact('goods', 'catgs', 'good', 'goodOrder'), 'goods', 'catgs', 'good', 'goodOrder');
    }

    function addOrder()
    {
        DB::transaction(function () {

            //保存到订单表
            $contacts = Input::get('contacts');
            $telphone = Input::get('telphone');
            $address = Input::get('address');
            $totalprice = Input::get('totalprice');
            $maxorderid = DB::table('orders')->max('id') + 1;
            $order = Order::create(array(
                    'id' => $maxorderid,
                    'order_no' => $this->orderNo(),
                    'order_status' => 1,
                    'pay_status' => 0,
                    'pay_type' => 1,
                    'source' => '电话订餐',
                    'order_type' => 0,
                    'telphone' => $telphone,
                    'address' => $address,
                    'contacts' => $contacts,
                    'total_price' => $totalprice
                )
            );
            $order->save();

            //保存到菜品订单表
            $good_id = $_POST['good_id'];
            $good_name = $_POST['good_name'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $total_price = $_POST['total_price'];
            $goodOrderArrs = array();
            for ($i = 1; $i < count($good_id); $i++) {
                $maxgorderid = DB::table('good_orders')->max('id') + $i;
                $tmpArr = array(
                    'id' => $maxgorderid,
                    'good_id' => $good_id[$i],
                    'order_id' => $maxorderid,
                    'good_name' => $good_name[$i],
                    'number' => $quantity[$i],
                    'price' => $price[$i],
                    'total_price' => $total_price[$i]

                );
                array_push($goodOrderArrs, $tmpArr);
            };
            //批量插入
            DB::table('good_orders')->insert($goodOrderArrs);
        });
        return Redirect::to($this->orderUrl);
    }

    function orderNo()
    {
        date_default_timezone_get('PRC');
        $thisDate = date('Ymd', time());
        $order = DB::select('SELECT * FROM wm_orders WHERE order_no like \'' . $thisDate . '%\' ORDER BY order_no DESC LIMIT 1');
        $orderno = '';
        if (count($order) > 0) {
            $sub = substr((string)$order[0]->order_no, -5);
            $orderno = $thisDate . str_pad((int)$sub + 1, 6 - count($sub), '0', STR_PAD_LEFT);
        } else {
            $orderno = $thisDate . '00001';
        }
        return $orderno;
    }
}