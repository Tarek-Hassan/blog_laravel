<?php

namespace App\Http\Repository;
use App\User;
use App\Http\Repository\RepositoryInterface;

class UserRepository implements RepositoryInterface{
     private $model;

    // construct->((ModelName) $model)
     public function __construct(User $model)
     {
         $this->model=$model;
     }
    public function all(){
        return $this->model::all();
    }
    public function create(array $model){
        return $this->model->create($model);
    }
    public function find(string $id){
        return $this->model->find($id);
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