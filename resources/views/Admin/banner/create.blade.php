@extends('Layouts.admin')
@section('content')

<div class="container-fluid px-lg-4">
    <div class="row">

        <div class="col-12 my-4">
            <div class="card rounded-0 border-0 shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h5 class="mb-0 mt-2 text-dark"><b>Make new banner</b></h5>
                        </div>
                        <div class="ml-auto">
                            <a href="{{route('admin.banner.index')}}" class="btn btn-info rounded-0 shadow-none text-white"><i class="fas fa-chevron-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mb-4">
            <div class="row">
                <div class="col-12">
                    @if(Session::has('success'))
                        <p class="text-success mb-0">{{Session::get('success')}}</p>
                    @endif
                    <div class="card rounded-0 shadow-sm">
                        <div class="card-body">
                            <form action="{{route('admin.banner.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <!-- Banner image -->
                                <div class="form-group mb-4">
                                    @if($errors->has('banner_image'))
                                        <small class="text-danger">{{ $errors->first('banner_image') }}</small>
                                    @else
                                        <small class="text-muted">Banner image</small>
                                    @endif
                                    <br>
                                    <input type="file" name="banner_image">
                                </div>

                                <button type="submit" class="btn btn-lg btn-primary rounded-0 shadow-none text-white px-5">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>

@endsection
