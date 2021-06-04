@extends('admin/layout.layout')

@section('page_title','Page Listing')

@section('container')

<div class="">
		 <div class="container my-2 "></h1><h2 style="color:Red;" class="text-center">{{session('msg')}}</h2></div>
	  <div class="page-title">
		 <div class="title_left">
			<h4>Post</h4>
			<h2><a href="{{url('/admin/page/add')}}">Add Page</a></h2>
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
									<th width="45%">Name</th>
									<th width="35%">Slug</th>
									<th width="15%">Action</th>
								 </tr>
							  </thead>
							  <tbody>
							  @foreach($result as $list)
								 <tr>
									<td>{{$list->id}}</td>
									<td>{{$list->name}}</td>
									<td>{{$list->slug}}</td>
									<td><a type="button"  href="{{url('admin/page/edit/'.$list->id)}}" class="btn cursor-pointer btn-primary text-light mx-1 px-2 py-1">Edit</a>
									<a type="button" href="{{url('admin/page/delete/'.$list->id)}}" class="btn cursor-pointer btn-danger mx-1 px-1 py-1 text-light">Delete</a>
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