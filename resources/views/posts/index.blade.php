@extends('layouts.app')
@section('content')
    <div class="container">
  <h2>ALLPosts</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>            
  <button class="btn btn-success"><a href='{{route("posts.create")}}'>AddPost</a></button>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>title</th>
        <th>describtion</th>
        <th>user</th>
        <th>createdAt</th>
      </tr>
    </thead>
    <tbody>

    @foreach($posts as $post)
      <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->describtion}}</td>
        <td>{{$post->user?$post->user->name:'non'}}</td>
        <td>{{$post->created_at->format('Y-m-d')}}</td>
        <td><button class="btn btn-secondary"><a href='{{route("posts.edit",$post->id)}}'>edit</a></button></td>
        <td><button class="btn btn-secondary"><a href='{{route("posts.show",$post->id)}}'>show</a></button></td>
        <td><button type="button" class="btn btn-danger" data-toggle="modal"data-target="#delete{{$post->id}}">Delete</button></td>
      </tr>
      <div class="modal model-danger fade" id="delete{{$post->id}}" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
                                                </div>

                                                <form action="{{route('posts.destroy',$post->id)}}"
                                                    method="post">
                                                    <div class="modal-body">
                                              
                                                    @csrf
                      @method('delete')
                                                        <div>
                                                            <div class="box-body">
                                                                <p class="text-center">Are u sure want to delete?</p>


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning pull-left"
                                                            data-dismiss="modal">No, cancel</button>
                                                        <button type="submit" class="btn btn-success">Yes,
                                                            Delete</button>
                                                    </div>
                                                </form>
      @endforeach
    </tbody>
  </table>
  <div class="pagination justify-content-center">
  {{ $posts->links() }}
  </div>
</div>
@endsection