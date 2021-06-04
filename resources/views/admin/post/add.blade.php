@extends('admin/layout.layout')

@section('page_title','Manage Post')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
   tinymce.init({
      selector:'.textarea',
      plugins:'link code',
      menubar: false
   });
</script>

@section('container')

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Manage Post</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" method="post" action="{{url('admin/post/submit')}}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Title</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" placeholder="Title" name="title">
                                <div class="container my-2 text-danger">@error('title') {{$message}} @enderror</div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Slug</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" placeholder="Title" name="slug"
                                    >
                                <div class="container my-2 text-danger">@error('slug') {{$message}} @enderror</div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Short Desc</label>
                            <div class="col-md-9 col-sm-9 ">
                                <textarea class="form-control" name="short_desc"></textarea>
                                <div class="container my-2 text-danger">@error('short_desc') {{$message}} @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Description</label>
                            <div class="col-md-9 col-sm-9 ">
                                <textarea class="form-control" rows="15" name="long_desc"></textarea>
                                <div class="container my-2 text-danger">@error('long_desc') {{$message}} @enderror</div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Image</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="file" name="image">
                                <div class="container my-2 text-danger">@error('image') {{$message}} @enderror</div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9  offset-md-3">
                                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection