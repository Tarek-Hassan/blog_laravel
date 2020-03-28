<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Repository\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postModel;
    private $UserModel;

    public function __construct(PostRepository $postModel, UserRepository $UserModel) {
        $this->postModel=$postModel;
        $this->UserModel=$UserModel;
    }
    //
    public function index() {
        //NumberOfElementPerPage

        // $limit=10;
        // $posts=$this->postModel->all();
        // return view('posts.index', compact('posts'));
    }
}
