@extends('admin/layout.layout')

@section('page_title','Post Listing')

@section('container')

<div class="">
		 <div class="container my-2 "></h1><h2 style="color:Red;" class="text-center">{{session('msg')}}</h2></div>
	  <div class="page-title">
		 <div class="title_left">
			<h4>Post</h4>
			<h2><a href="/admin/post/add">Add Post</a></h2>
		 </div>
	  </div>
	  <div class="clearfix"></div>
	  <div class="row">
		 <div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
			   <div class="x_content">
				  <div class="row">
					 <div class="col-sm-12">
						<div class="card-box table-responsive">
						   <table id="datatable" class="table table-striped table-bordered" style="width:100%">
							  <thead>
								 <tr>
									<th width="5%">S.No</th>
									<th width="40%">Title</th>
									<th width="25%">Image</th>
									<th width="15%">Date</th>
									<th width="15%">Action</th>
								 </tr>
							  </thead>
							  <tbody>
							  @foreach($result as $list)
								 <tr>
									<td>{{$list->id}}</td>
									<td>{{$list->title}}</td>
									<td><img src="{{asset('storage/img/'.$list->image)}}" width="128px" alt=""></td>
									<td>{{$list->added_on}}</td>
									<td><a type="button"  href="{{url('admin/post/edit/'.$list->id)}}" class="btn cursor-pointer btn-primary text-light mx-1 px-2 py-1">Edit</a>
									<a type="button" href="{{url('admin/post/delete/'.$list->id)}}" class="btn cursor-pointer btn-danger mx-1 px-1 py-1 text-light">Delete</a>
									</td>
								 </tr>
								@endforeach
							  </tbody>
						   </table>
						</div>
					 </div>
				  </div>
			   </div>
			</div>
		 </div>
	  </div>
   </div>
@endsection