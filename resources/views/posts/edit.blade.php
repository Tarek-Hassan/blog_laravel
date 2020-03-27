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
  <h2>UpdatePost</h2>
  <form method="POST" action="{{route('posts.update',$post->id)}}">
  @csrf
  @method('put')
  <div class="form-group">
      <label for="title">title</label>
      <input type="text" class="form-control" id="title" value="{{$post->title}}" name="title">
    </div>
    <div class="form-group">
      <label for="describtion">describtion</label>
      <textarea  class="form-control" id="describtion" placeholder="Enter describtion" name="describtion">{{$post->describtion}}</textarea>
    </div>
    <div class="form-group">
      <label for="describtion">PostCreator</label>
      <select name="user_id" class="form-control">
        @foreach($users as $user)
        <option value="{{$user->id}}" {{$user->id==$post->user_id?'checked':''}}>{{$user->name}}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
@endsection
