<?php

/**
 * 用户管理
 */

namespace app\admin\controller;

use app\BaseController;
use think\facade\View;

class User extends BaseController
{
    public function index()
    {
        return 'index';
    }

    public function list()
    {
        # code...
        return View::fetch();
    }
}
