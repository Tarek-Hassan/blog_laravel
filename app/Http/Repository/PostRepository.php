<?php

namespace App\Http\Repository;
use App\Post;
use App\Http\Repository\RepositoryInterface;
use Illuminate\Support\Facades\Storage;

class PostRepository implements RepositoryInterface{
     private $model;
     private $path;

    // construct->((ModelName) $model)
     public function __construct(Post $model)
     {
         $this->model=$model;
         $this->path=storage_path('uploads');
     }
    public function all(){
        return $this->model::all();
    }
    // $id the number of ilemnt per page

    public function paginateAll($limit){
        return $this->model::paginate($limit);
    }
    public function create(array $model){
        $model['img']=Storage::disk('public')->put($this->path,$model['img']);
        return $this->model->create($model);
    }
    public function find(string $id){
        return $this->model->findOrFail($id);
    }
    // thisMethod__ToShowPostsWithComments
    public function postWithComments(string $id){
        return $this->model->findOrFail($id);
        // return $this->model->where('id',$id)->with('comments')->get();
    }
    public function check(string $id){
        return $this->model->where('id',$id)->first();
    }
    public function update(string $id, array $model){
        if(array_key_exists('img',$model)){
            Storage::disk('public')->delete($model['oldimg']);
            $model['img']=Storage::disk('public')->put($this->path,$model['img']);
        }
        $modelToUpdate = $this->model->find($id);
        $modelToUpdate->update($model);
        return $modelToUpdate->fresh();
    }
    public function delete(string $id){
        $modelToDelete=$this->model->find($id);
        if($modelToDelete->img){
            Storage::disk('public')->delete($modelToDelete->img);
        }
        return $modelToDelete->delete();
    }
}
