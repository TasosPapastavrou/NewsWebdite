@extends('layouts.app-writer')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('You are logged in as writer!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>hello {{ Auth::user()->name }} you can create post</p>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@section('work')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
    <form method="POST" action="{{ url('/writer/create_post/'.Auth::user()->id) }}">
        @csrf

        @method('PUT')

    <div class="card-body">
          <div class="form-group">
          <label for="exampleInputTitle">Title</label>
          <input type="text" class="form-control" name="title"  aria-describedby="emailHelp" placeholder="Enter title">
          </div> 
    </div>

   
    <div class="card-body">
      <div class="form-group">
      <label for="exampleInputBody">Body</label>
      <textarea rows="4" cols="50" type="text" class="form-control" name="body" id="exampleInputPassword1" placeholder="body"></textarea>
      </div>
    </div>

    <div class="card-body">
        <div class="form-group">
        <label for="exampleInputBody">Img</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="img" placeholder="img">
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