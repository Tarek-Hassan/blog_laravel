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

    <div class="card mt-5 ">
        <div class="card-header">
            PostCreatorInfo.
        </div>
        <h3>Name:- {{$posts->user->name}}</h3>
        <h3>Email:- {{$posts->user->email}}</h3>

    </div>
    <br />
    <div class="card mb-5">
        <div class="card-header">
            PostInfo.
        </div>
        <img width="100px" alt="{{$posts->title}}" height="100px"
            src="{{$posts->img ? asset('storage/'.$posts->img):''}} " />
        <h3>Title:- {{$posts->title}}</h3>
        <h3>Describtion:- {{$posts->describtion}}</h3>
        <h3>CreatedAt:- {{$posts->created_at->format('l jS \\of F Y h:i:s A')}}</h3>
    </div>
    <div class="card mb-5">
        @foreach($posts->comments as $comment)
        <div class="card-header text-dark">
            <h5>

                <strong>{{$comment->user->name}}</strong> <span
                    class="float-right">{{$comment->created_at->format('l jS \\of F Y h:i:s A')}}</span>
            </h5>
        </div>
        <h3 class="pl-5">{{$comment->content}}</h3>
        @endforeach
    </div>
    <hr />
    <div class="card mb-5">
        <div class="card-header  text-info">
            <h2>AddComment</h2>
        </div>
        <form method="POST" action="{{route('posts.comments.store',$posts->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                 <input type="hidden" name="user_id" value="{{auth()->user()->id}}" />
                <input type="text" class="form-control" id="content" placeholder="Enter Comment" name="content">
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
</div>
@endsection
