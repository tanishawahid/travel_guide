@extends('Layouts.website')
@section('content')

<div class="gallery">

    <div class="header py-4 py-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5 d-none d-lg-block pt-5">
                    <h1 class="mb-0 mt-5">Photo Gallery</h1>
                </div>
                <div class="col-12 col-lg-7 text-center">
                    <img src="{{asset('website/images/static/gallery_banner.png')}}" class="img-fluid">
                </div>
                <div class="col-12 col-lg-5 d-lg-none text-center">
                    <h1>Photo Gallery</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="container pt-5">
        <div class="row">

            <div class="col-12">
                @foreach($photos as $photo)
                <div class="card border-0 rounded-0 photo-card">
                    <img src="{{url('')}}/website/images/photos/{{$photo->image}}" class="img-fluid">
                    <div class="overlay">
                        <div class="flex-center flex-column text-center">
                            <h5 class="mb-0">{{$photo->title}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
   
</div>

@endsection