@extends('Layouts.website')
@section('content')

<div class="blog-index">

    <div class="header py-4 py-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 text-center">
                    <img src="{{asset('website/images/static/blog_banner.png')}}" class="img-fluid">
                </div>
                <div class="col-12 col-lg-6 text-center text-lg-right pt-lg-5">
                    <h1 class="mb-0 mt-lg-5">Read Our Blog</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="blog">
        <div class="container">
            <div class="row">

                @foreach($blogs as $blog)
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{route('blog.read', $blog->id)}}">
                        <div class="card rounded-0 blog-card">
                            <img src="{{url('')}}/website/images/blog/{{$blog->image}}" class="img-fluid">
                            <div class="card-body">
                                <h4>{{$blog->title}}</h4>
                                <p>{{ Illuminate\Support\Str::limit($blog->short_details, 120) }}</p>

                                <small class="mb-0">{{ date('M d, Y', strtotime($blog->created_at)) }}</small>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </div>


</div>

@endsection