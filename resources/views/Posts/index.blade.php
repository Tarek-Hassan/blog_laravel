<!DOCTYPE html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
    <body>
    <div class="container">
  <h2>Striped Rows</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>title</th>
        <th>createdAt</th>
      </tr>
    </thead>
    <tbody>
    
    {{--dd($posts)--}}
    @foreach($posts as $post)
      <tr>
        <td>{{$post['id']}}</td>
        <td>{{$post['title']}}</td>
        <td>{{$post['createdAt']}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
    </body>
</html>
