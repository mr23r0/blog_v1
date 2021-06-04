@extends('front/layout.layout')

@section('page_title', $result[0]->name)
@section('post_name', $result[0]->name)

@section('container')


    <div class="container">
      <div class="row">
        
          {!! $result[0]->description !!}
        </div>
      </div>



@endsection