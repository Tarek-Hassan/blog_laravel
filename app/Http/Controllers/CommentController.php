<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Repository\PostRepository;



//  this class use RepositoryPattern

class CommentController extends Controller {
    private $postModel;

    public function __construct(PostRepository $postModel) {
        $this->postModel=$postModel;
    }



    public function store(StoreCommentRequest $request) {
      $post=$this->postModel->find($request->post_id);
      $post->comments()->create($request->all());
      return redirect()->back();
    }

}
