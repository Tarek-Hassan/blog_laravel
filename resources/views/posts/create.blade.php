@extends('layouts.app')
@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <h2>PostDetails</h2>
  <form method="POST" action="{{route('posts.store')}}">
   
  @csrf
  <div class="form-group">
      <label for="title">title</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
    </div>
    <div class="form-group">
      <label for="describtion">describtion</label>
      <textarea  class="form-control" id="describtion" placeholder="Enter describtion" name="describtion"></textarea>
    </div>
    <div class="form-group">
      <label for="describtion">PostCreator</label>
      <select name="user_id" class="form-control">
        @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-success">Create</button>
  </form>
</div>
@endsection
