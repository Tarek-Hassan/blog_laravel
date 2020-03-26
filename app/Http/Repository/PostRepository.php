<?php

namespace App\Http\Repository;
use App\Post;
use App\Http\Repository\RepositoryInterface;

class PostRepository implements RepositoryInterface{
     private $model;

    // construct->((ModelName) $model)
     public function __construct(Post $model)
     {
         $this->model=$model;
     }
    public function all(){
        return $this->model::all();
    }
    // $id the number of ilemnt per page

    public function paginateAll($limit){
        return $this->model::paginate($limit);
    }
    public function create(array $model){
        return $this->model->create($model);
    }
    public function find(string $id){
        return $this->model->findOrFail($id);
    }
    public function update(string $id, array $model){
        $modelToUpdate = $this->model->find($id);
        $modelToUpdate->update($model);
        return $modelToUpdate->fresh();
    }
    public function delete(string $id){
        return $this->find($id)->delete();
    }
}