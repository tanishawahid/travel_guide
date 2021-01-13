
@extends('Layouts.admin')
@section('content')

<div class="container-fluid px-lg-4">
    <div class="row">

        <div class="col-12 my-3">
            <div class="card rounded-0 border-0 shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h5 class="mb-0 mt-2 text-dark"><b>Create new blog</b></h5>
                        </div>
                        <div class="ml-auto">
                            <a href="{{route('admin.blog.index')}}" class="btn btn-info rounded-0 shadow-none text-white"><i class="fas fa-chevron-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mb-3">
            <div class="row">
                <div class="col-12">
                    @if(Session::has('success'))
                        <p class="text-success mb-0">{{Session::get('success')}}</p>
                    @endif
                    <form action="{{route('admin.blog.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Title -->
                        <div class="form-group mb-3">
                            @if($errors->has('title'))
                                <small class="text-danger">{{ $errors->first('title') }}</small>
                            @else
                                <small class="text-muted">Title</small>
                            @endif
                            <input type="text" class="form-control form-control-lg rounded-0 shadow-none" name="title" placeholder="Enter title">
                        </div>

                        <!-- Short Details -->
                        <div class="form-group mb-3">
                            @if($errors->has('short_details'))
                                <small class="text-danger">{{ $errors->first('short_details') }}</small>
                            @else
                                <small class="text-muted">Short details</small>
                            @endif
                            <input type="text" class="form-control form-control-lg rounded-0 shadow-none" name="short_details" placeholder="Enter short details">
                        </div>

                        <!-- Long Details -->
                        <div class="form-group mb-3">
                            <small class="text-muted">Long details</small>
                            <textarea name="details" row="15"></textarea>
                        </div>

                        <!-- Image -->
                        <div class="form-group mb-3">
                            @if($errors->has('image'))
                                <small class="text-danger">{{ $errors->first('image') }}</small>
                            @else
                                <small class="text-muted">Image</small>
                            @endif
                            <br>
                            <input type="file" name="image">
                        </div>


                        <button type="submit" class="btn btn-lg btn-primary rounded-0 shadow-none float-right text-white px-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>



    </div>
</div>
<script>
    CKEDITOR.replace( 'details' );
</script>
@endsection