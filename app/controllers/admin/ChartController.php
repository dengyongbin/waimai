<?php

/**
 * Created by PhpStorm.
 * User: Jian
 * Date: 14-11-10
 * Time: 下午2:11
 */
class ChartController extends AdminController
{
    private $orderViewPath = 'admin.chart.order';
    private $areaViewPath = 'admin.chart.area';
    private $goodsViewPath = 'admin.chart.goods';

    function byOrder($type)
    {
        $sql = null;
        if (is_null($type)) {
            $type = 'day';
        }
        switch ($type) {
            case 'day':
                $sql = "SELECT COUNT(1) ct,UNIX_TIMESTAMP(DATE_FORMAT(created_at,'%Y-%m-%d %H'))*1000 ms,DATE_FORMAT(created_at,'%Y-%m-%d %H') fmtdays FROM wm_orders WHERE date(created_at) = curdate() GROUP BY ms ORDER BY ms";
                break;
            case 'week':
                $sql = "SELECT COUNT(1) ct,UNIX_TIMESTAMP(DATE_FORMAT(created_at,'%Y-%m-%d'))*1000 ms,DATE_FORMAT(created_at,'%Y-%m-%d') fmtdays FROM wm_orders WHERE DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(created_at) GROUP BY ms ORDER BY ms";
                break;
            case 'month':
                $sql = "SELECT COUNT(1) ct,UNIX_TIMESTAMP(DATE_FORMAT(created_at,'%Y-%m-%d'))*1000 ms,DATE_FORMAT(created_at,'%Y-%m-%d') fmtdays FROM wm_orders WHERE DATE_SUB(CURDATE(), INTERVAL 1 MONTH) <= date(created_at) GROUP BY ms ORDER BY ms";
                break;
            case 'all':
                $sql = "SELECT COUNT(1) ct,UNIX_TIMESTAMP(DATE_FORMAT(created_at,'%Y-%m-01'))*1000 ms,DATE_FORMAT(created_at,'%Y-%m') fmtdays FROM wm_orders GROUP BY ms ORDER BY ms";
                break;
        }

        $result = json_encode(DB::select($sql));
        return $this->makeView($this->orderViewPath, compact('result', 'type'), 'result', 'type');
    }

    function byArea($type)
    {

    }

    function byGoods($type)
    {
        $sql = null;
        if (is_null($type)) {
            $type = 'day';
        }
        switch ($type) {
            case 'day':
                $sql = "SELECT good_name,SUM(number) ct,good_id FROM	wm_good_orders WHERE date(created_at) = curdate() GROUP BY good_id ORDER BY	ct DESC LIMIT 10";
                break;
            case 'week':
                $sql = "SELECT good_name,SUM(number) ct,good_id FROM	wm_good_orders WHERE DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(created_at) GROUP BY good_id ORDER BY ct DESC LIMIT 10";
                break;
            case 'month':
                $sql = "SELECT good_name,SUM(number) ct,good_id FROM	wm_good_orders WHERE DATE_SUB(CURDATE(), INTERVAL 1 MONTH) <= date(created_at) GROUP BY good_id ORDER BY	ct DESC LIMIT 10";
                break;
            case 'all':
                $sql = "SELECT good_name,SUM(number) ct,good_id FROM	wm_good_orders WHERE DATE_SUB(CURDATE(), INTERVAL 1 MONTH) <= date(created_at) GROUP BY good_id ORDER BY	ct DESC LIMIT 10";
                break;
        }

        $result = json_encode(DB::select($sql));
        return $this->makeView($this->goodsViewPath, compact('result', 'type'), 'result', 'type');
    }


}