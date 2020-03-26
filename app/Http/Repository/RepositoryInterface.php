<?php

namespace App\Http\Repository;

interface  RepositoryInterface{
    public function all();
    public function create(array $model);
    public function find(string $id);
    public function update(string $id, array $model);
    public function delete(string $id);
}