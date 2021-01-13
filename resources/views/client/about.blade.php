@extends('Layouts.website')
@section('content')

<div class="about">

    <div class="header py-4 py-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5 d-none d-lg-block pt-5">
                    <h1 class="mb-0 mt-5">About Team</h1>
                </div>
                <div class="col-12 col-lg-7 text-center">
                    <img src="{{asset('website/images/static/about_banner.png')}}" class="img-fluid">
                </div>
                <div class="col-12 col-lg-5 d-lg-none text-center">
                    <h1>About Team</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="container py-5">
        <div class="row">

            @foreach($members as $member)
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="card border-0">
                    <div class="card-body text-center">
                        <div class="img-box rounded-circle">
                            <img src="{{url('')}}/website/images/team/{{$member->image}}" class="img-fluid">
                        </div>
                        <div class="content mt-3">
                            <h3 class="mb-0">{{$member->title}}</h3>
                            <h5 class="mb-0 text-capitalize">{{$member->name}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
   
</div>

@endsection