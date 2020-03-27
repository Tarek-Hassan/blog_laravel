<?php

namespace App\Http\Controllers;
use App\Http\Repository\PostRepository;
use App\Http\Repository\UserRepository;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Carbon\Carbon;

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
        return view('posts.index',compact('posts','current','current1'));
    }
    public function show($id){
        $posts=$this->postModel->find($id);
        return view('posts.show',compact('posts'));
    }
 
          public function create() {
            $users=$this->UserModel->all();
                return view('posts.create',compact('users'));
            }
        
            public function store(StorePostRequest $request) {
             
                $posts=$this->postModel->create($request->all());
                return redirect()->route('Posts.index');
            }
        
            public function edit(string $id) {

                $checkId=$this->postModel->check($id);
                if($checkId){
                    $post=$this->postModel->check($id);
                    $users=$this->UserModel->all();
                    return view('posts.edit', compact('post','users'));
                }
                
                return redirect()->back()->withErrors(['ID NOT CORRECT']);
            }
        
            // public function update(UpdatePostRequest $request,$id) {
            public function update(Request $request,$id) {
                $checkId=$this->postModel->check($id);
                if($checkId){
                    // dd( $request->all());
                $post=$this->postModel->find($id);
                $posts =$this->postModel->update($id,$request->all());  
                return redirect()->route('Posts.index');
            }
            return redirect()->back()->withErrors(['ID NOT CORRECT']);
            }

            public function destroy($id)
            {
                $posts =$this->postModel->delete($id);
                return redirect()->route('Posts.index');
            }
}
