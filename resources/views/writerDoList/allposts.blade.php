@extends('layouts.app-writer')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                 
                @foreach($posts as $post)
                
                <div class="card-body border border-primary mt-5">
                    <div>Title:</div>
                {{ $post->title }}  
                    <div class="float-right">
                    <a href="{{ url('/writer/post/'.$post->id.'/edit')  }}">edit post</a>   
                    </div>
                </div>
                @endforeach                           
                   
               
            </div>
        </div>
    </div>
</div>
@endsection