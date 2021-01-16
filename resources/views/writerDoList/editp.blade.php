@extends('layouts.app-writer')

@section('content')
 
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
    <form method="POST" action="{{ url('/writer/post/edit/'.$post->id) }}" >
            @csrf <!-- {{ csrf_field() }} -->
            {{ method_field('PUT') }}

    <div class="card-body">
          <div class="form-group">
          <label for="exampleInputTitle">Title</label>
          <input type="text" class="form-control" name="title"  aria-describedby="emailHelp" placeholder="Enter title" value="{{$post->title}}">
          </div> 
    </div>

   
    <div class="card-body">
      <div class="form-group">
      <label for="exampleInputBody">Body</label>
      <textarea rows="4" cols="50" type="text" class="form-control" name="body" id="exampleInputPassword1">{{ $post->body}}</textarea>
      </div>
    </div>

    <div class="card-body">
        <div class="form-group">
        <label for="exampleInputBody">Img</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="img" placeholder="img" value="{{$post->img}}">
        </div>
    </div>
    
     
       
    <div class="card-body">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    
 
    </form> 
                </div>
          </div>
    </div>
</div>
@endsection