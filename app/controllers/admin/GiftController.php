<?php

/**
 * Created by PhpStorm.
 * User: Jian
 * Date: 14-11-7
 * Time: 上午11:28
 */
class GiftController extends AdminController
{
    private $giftsViewPath = 'admin.gift.gifts';
    private $giftViewPath = 'admin.gift.gift';
    private $giftsUrl = '/admin/gift/all';
    private $exchangesViewPath = 'admin.gift.exchanges';

    function findAllGifts()
    {
        $gifts = Gift::paginate(10);
        return $this->makeView($this->giftsViewPath, compact('gifts'), 'gifts');
    }

    function addGift()
    {
        $gift = new Gift();
        return $this->makeView($this->giftViewPath, compact('gift'), 'gift');
    }

    function findById($id)
    {
        $gift = Gift::find($id);
        return $this->makeView($this->giftViewPath, compact('gift'), 'gift');
    }

    function saveGift()
    {

        $id = Input::get('id');
        $title = Input::get('title');
        $photo = Input::get('photo');
        $qiniu = \Qiniu\Qiniu::create(array(
            'access_key' => Config::get('wm.qiniu_access_key'),
            'secret_key' => Config::get('wm.qiniu_secret_key'),
            'bucket' => Config::get('wm.qiniu_bucket')
        ));

        $file = Input::file('photo');
        $info = null;
        if ($file) {
            $info = $qiniu->uploadFile($file->getRealPath(), $file->getFilename());
        }
        $price = Input::get('price');
        $score = Input::get('score');
        $stock = Input::get('stock');
        $gift = null;
        if ($id == '') {
            $id = DB::table('gifts')->max('id') + 1;
            $gift = Gift::create(array(
                'id' => $id,
                'title' => $title,
                'photo' => $info != null ? $info->data['url'] : Input::get('photoValue'),
                'price' => $price,
                'score' => $score,
                'stock' => $stock
            ));
        } else {
            $gift = Gift::find($id);
            $gift->title = $title;
            $gift->photo = $info != null ? $info->data['url'] : Input::get('photoValue');
            $gift->price = $price;
            $gift->score = $score;
            $gift->stock = $stock;
        }
        $gift->save();

        return Redirect::to($this->giftsUrl);
    }

    function deleteGift($id)
    {
        $gift = Gift::find($id);
        $gift->delete();
        return Redirect::to($this->giftsUrl);
    }

    function findAllExchanges()
    {
        $exchanges = GiftExchange::paginate(10);
        return $this->makeView($this->exchangesViewPath, compact('exchanges'), 'exchanges');
    }

}