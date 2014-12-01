<?php

/**
 * Created by PhpStorm.
 * User: Jian
 * Date: 14-11-4
 * Time: 上午11:48
 */
class MemberController extends AdminController
{
    private $membersViewPath = 'admin.member.members';
    private $membersUrl = '/admin/member/all';

    function findAllMember()
    {
        $members = MemberUser::paginate(10);
        return $this->makeView($this->membersViewPath, compact('members'), 'members');
    }

    function  deleteMember($id)
    {
        $memberUser = MemberUser::find($id);
        $memberUser->delete();
        return Redirect::to($this->membersUrl);
    }
}