<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Quest;
use App\NGO;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin/dashboard');
    }

    public function categories()
    {
        $res = Category::all();
        return view('admin/categories',compact('res'));
    }

    public function quests()
    {
        $res = Quest::all();
        return view('admin/quests', compact('res'));
    }

    public function ngoapplication()
    {
        $res = NGO::all();
        return view('admin/ngoapplication', compact('res'));
    }

    public function users()
    {
        $res = User::all();
        return view('admin/users',compact('res'));
    }
}
