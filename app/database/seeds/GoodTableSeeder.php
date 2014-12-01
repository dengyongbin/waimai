<?php
/**
 * Created by PhpStorm.
 * User: dengyb
 * Date: 14-9-26
 * Time: 下午2:13
 */
class GoodTableSeeder extends Seeder {

    public function run() {
        Order::truncate();

        $order = new Order;
        $order -> order_no = '20131013';
        $order -> status = '0';
        $order -> delivery_time = '2013-10-13 12:00:00';
        $order -> telphone = '18701376399';
        $order -> address = '银河soho';
        $order -> contacts = '习近平';
        $order -> remark = '满汉全席';
        $order -> ip = '110.110.110.110';
        $order -> good_order_id = '1';
        $order->save();

        $goodOrder = new GoodOrder;
        $goodOrder -> good_id = '1';
        $goodOrder -> order_id = '1';
        $goodOrder -> number = '1';
        $goodOrder ->  price = '12';
        $goodOrder -> total_price = '12';
        $goodOrder->save();

        $goodOrder = new GoodOrder;
        $goodOrder -> good_id = '2';
        $goodOrder -> order_id = '1';
        $goodOrder -> number = '1';
        $goodOrder ->  price = '20';
        $goodOrder -> total_price = '20';
        $goodOrder->save();

        $goodOrder = new GoodOrder;
        $goodOrder -> good_id = '3';
        $goodOrder -> order_id = '1';
        $goodOrder -> number = '1';
        $goodOrder ->  price = '15';
        $goodOrder -> total_price = '15';
        $goodOrder->save();

    }
}