<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * 为指定用户显示详情
     *
     * @param int $id
     * @return Response
     * @author yan
     */
    public function show($idadmin)
    {
        return view('user.profile', ['user' => "123"]);
    }

    public function index()
    {
        $users = DB::select('SELECT * FROM users WHERE is_active = ?', [1]);

        return view('user.index',['users' => $users]);
    }
}
