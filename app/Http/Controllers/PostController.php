<?php

namespace App\Http\Controllers;
use App\Http\Repository\PostRepository;
use App\Http\Repository\UserRepository;
use Illuminate\Http\Request;
// use Carbon\Carbon;

//  this class use RepositoryPattern

class PostController extends Controller
{
    private $postModel;
    private $UserModel;
    public function __construct(PostRepository $postModel,UserRepository $UserModel)
    {
        $this->postModel = $postModel;
        $this->UserModel = $UserModel;
    }
    
    
    public function index(){
        //NumberOfElementPerPage
        $limit=10;
        $posts=$this->postModel->paginateAll($limit);
        return view('Posts.index',compact('posts','current','current1'));
    }
    public function show($id){
        $posts=$this->postModel->find($id);
        return view('Posts.show',compact('posts'));
    }
 
          public function create() {
            $users=$this->UserModel->all();
                return view('Posts.create',compact('users'));
            }
        
            public function store(Request $request) {
                $posts=$this->postModel->create($request->all());
        
                // dd($request->all());
                return redirect()->route('Posts.index');
            }
        
            public function edit(string $id) {
                $post=$this->postModel->find($id);
                $users=$this->UserModel->all();
                return view('Posts.edit', compact('post','users'));
            }
        
            public function update(Request $request,$id) {
                $posts =$this->postModel->update($id,$request->all());  
                return redirect()->route('Posts.index');
            }

            public function destroy($id)
            {
                $posts =$this->postModel->delete($id);
                return redirect()->route('Posts.index');
            }
}
