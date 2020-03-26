<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        $posts=[
            [
                'id'=>1,
                'title'=>'FristPost',
                'createdAt'=>'2020-2-1'
            ],
            [
                'id'=>2,
                'title'=>'FristPost',
                'createdAt'=>'2020-2-1'
            ],
            [
                'id'=>3,
                'title'=>'FristPost',
                'createdAt'=>'2020-2-1'
            ]
        ];
        return view('Posts.index',compact('posts'));
    }
}
