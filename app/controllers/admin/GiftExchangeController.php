<?php

/**
 * Created by PhpStorm.
 * User: Jian
 * Date: 14-11-10
 * Time: 上午10:33
 */
class GiftExchangeController extends AdminController
{
    private $exchangesViewPath = 'admin.giftexchange.exchanges';

    function findAllExchanges()
    {
        $exchanges = GiftExchange::all();
        return $this->makeView($this->exchangesViewPath, compact('exchanges'), 'exchanges');
    }
}