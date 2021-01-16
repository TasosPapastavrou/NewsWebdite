@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                 
                @foreach($posts as $post)
                
                <div class="card-body border border-primary mt-5">
                    <div>Title:{{ $post->title }}</div>
                 
                <div class="justify-content-center" ><img src="{{ $post->img }}" style="width:600px; height:300px;" ></div> 
                <div>   {{ $post->body }}  </div> 

                
                </div>
                @endforeach                           
                   
               
            </div>
        </div>
    </div>
</div>
@endsection