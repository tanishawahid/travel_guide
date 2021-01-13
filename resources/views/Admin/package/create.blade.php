
@extends('Layouts.admin')
@section('content')

<div class="container-fluid px-lg-4">
    <div class="row">

        <div class="col-12 my-3">
            <div class="card rounded-0 border-0 shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h5 class="mb-0 mt-2 text-dark"><b>Make new package</b></h5>
                        </div>
                        <div class="ml-auto">
                            <a href="{{route('admin.package.index')}}" class="btn btn-info rounded-0 shadow-none text-white"><i class="fas fa-chevron-left"></i></a>
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
                    <form action="{{route('admin.package.store')}}" method="post" enctype="multipart/form-data">
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

                        <!-- start date -->
                        <div class="form-group mb-3">
                            @if($errors->has('start_date'))
                                <small class="text-danger">{{ $errors->first('start_date') }}</small>
                            @else
                                <small class="text-muted">Start date</small>
                            @endif
                            <input type="date" class="form-control form-control-lg rounded-0 shadow-none" name="start_date">
                        </div>

                         <!-- end date -->
                         <div class="form-group mb-3">
                            @if($errors->has('end_date'))
                                <small class="text-danger">{{ $errors->first('end_date') }}</small>
                            @else
                                <small class="text-muted">Start date</small>
                            @endif
                            <input type="date" class="form-control form-control-lg rounded-0 shadow-none" name="end_date">
                        </div>

                        <!-- Details -->
                        <div class="form-group mb-3">
                            @if($errors->has('details'))
                                <small class="text-danger">{{ $errors->first('details') }}</small>
                            @else
                                <small class="text-muted">details</small>
                            @endif
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