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

  <div class="card mb-5">
  <div class="card-header">
    PostInfo.
  </div>
    <h3>Title:- {{$posts->title}}</h3>
    <h3>Describtion:- {{$posts->describtion}}</h3>
    <h3>CreatedAt:- {{$posts->created_at->format('l jS \\of F Y h:i:s A')}}</h3>
</div>
  <div class="card mt-5 ">
  <div class="card-header">
    PostCreatorInfo.
  </div>
    <h3>Name:- {{$posts->user->name}}</h3>
    <h3>Email:- {{$posts->user->email}}</h3>
  
</div>
</div>
@endsection
