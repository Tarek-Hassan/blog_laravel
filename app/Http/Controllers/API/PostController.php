<?php

namespace App\Http\Controllers\API;
use App\Http\Resources\PostResource;
use App\Http\Requests\StorePostRequest;
use App\Http\Controllers\Controller;
use App\Http\Repository\PostRepository;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    private $postModel;

    public function __construct(PostRepository $postModel) {
        $this->postModel=$postModel;
    }
    

    //
    public function index() {
       return PostResource::collection(
           Post::all()
        );
    }
    public function show($id) {
       return new PostResource(
        Post::find($id)
        );
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|unique:post|min:3',
            'img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'describtion' => 'required|min:10',
    ]);
       return $this->postModel->create($request->all());
    }

// user_id manually update ***
    public function update(Request $request, $id) {
        $checkId=$this->postModel->check($id);
        if($checkId) {
        $request->validate([
            'title' => 'required|min:3',
            'img' => 'image|mimes:jpeg,png,jpg|max:2048',
            'describtion' => 'required|min:10',
        ]);
            $request['user_id']=$request->user()->id;
            $post=$this->postModel->find($id);
            return $this->postModel->update($id, $request->all());
        }
        return json_encode(array("ERROR"=>"ID $id NOT EXSIST"));
    }


    public function destroy($id) {
        $checkId=$this->postModel->check($id);
        if($checkId) {
        $post=$this->postModel->delete($id);
        
        return json_encode(array("msg"=>"Data With ID=$id DElleted Sussecfully"));
    }
    return json_encode(array("ERROR"=>"ID $id NOT EXSIST"));
    }

}
