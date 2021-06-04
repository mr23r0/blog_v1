@extends('front/layout.layout')

@section('page_title','Home')

@section('container')


        <div class="col-lg-8 col-md-10 mx-auto">

        @foreach($result as $list)
            <div class="post-preview">
                <a href="{{url('post/'.$list->slug)}}">
                    <h2 class="post-title"> {{$list->title}} </h2>
                    <h3 class="post-subtitle"> {{$list->short_desc}}  </h3>
                </a>
                <p class="post-meta">Posted on  {{$list->added_on}} 
                </p>
            </div>


        @endforeach
           

            <!-- Pager -->
            
        </div>
@endsection