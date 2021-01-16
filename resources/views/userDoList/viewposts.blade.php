@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                 
                @foreach($posts as $post)
                
                
                    
                    <a class="text-dark btn" href="{{ url('/user/show/post/'.$post->id)  }}"> 
                        <div class="card-body border border-primary mt-5">
                            <div>Title:</div>
                            {{ $post->title }}  
                        </div>
                    </a>   
                    
                
                @endforeach                           
                   
               
            </div>
        </div>
    </div>
</div>
@endsection