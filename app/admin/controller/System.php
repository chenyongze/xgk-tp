<?php

namespace app\admin\controller;

use app\BaseController;

class System extends BaseController
{
    public function index()
    {
        return view('', ['x', 3]);
    }

    public function menu()
    {
        return view();
    }

    public function select_table()
    {
        return view('select-table');
    }

    public function table()
    {
        return view();
    }

    public function icon()
    {
        return view();
    }

    public function __empty()
    {
        echo time();
    }
    public function test()
    {
        return view();
    }

    public function a()
    {
        return 'ssss';
    }


    /**
     * 编辑
     *
     * @return void
     * @author yongze.chen <yongze@dingtalk.com>
     *
     */
    public function edit()
    {
        // echo json_encode(['code' => 0]);
        return json(['code' => 1, 'info' => 'hello', 'data' => '']);
    }

    public function add()
    {
        return view('form');
    }
}
