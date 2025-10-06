<?php

namespace App\Controllers;

class TestController extends BaseController
{
    public function admin(): string
    {
        return view('TestRol/admin');
    }

    public function user(): string
    {
        return view('TestRol/user');
    }
}
