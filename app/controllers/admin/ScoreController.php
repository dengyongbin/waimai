<?php

/**
 * Created by PhpStorm.
 * User: Jian
 * Date: 14-11-4
 * Time: 上午10:59
 */
class ScoreController extends AdminController
{
    private $scoreViewPath = 'admin.score.scores';
    private $detailViewPath = 'admin.score.detail';
    private $scoreUrl = 'admin/score/all';

    function findAllByMember()
    {
        $score = DB::select('select b.email,b.name,a.* from (select member_id,count(order_id) ct,sum(amount) am from wm_member_scores  group by member_id) a RIGHT JOIN wm_member_users b on a.member_id = b.id ');
        return $this->makeView($this->scoreViewPath, compact('score'), 'score');
    }

    function findByMember($member_id)
    {
        $detail = MemberScores::whereRaw('member_id = ? and isnull(deleted_at)', array($member_id))->get();
        return $this->makeView($this->detailViewPath, compact('detail'), 'detail');
    }
}