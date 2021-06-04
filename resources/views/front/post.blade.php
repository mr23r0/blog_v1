@extends('front/layout.layout')

@section('page_title', $result[0]->title)
@section('post_name', $result[0]->title)

@section('container')


    <div class="container">
    <img src="{{ asset('storage/img/'.$result[0]->image) }}" width="100%" alt="Something went wrong cannot load image">
      <div class="row">
       
        {!! $result[0]->long_desc !!}
        </div>
      </div>



@endsection