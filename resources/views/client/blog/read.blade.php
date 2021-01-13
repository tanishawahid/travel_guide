@extends('Layouts.website')
@section('content')

<div class="blog-read">
    <div class="container py-4 py-lg-5">
        <div class="row">
        
        @if($blog)
            <div class="col-12 col-lg-10 m-auto">
                <img src="{{url('')}}/website/images/blog/{{$blog->image}}" class="img-fluid">

                <div class="content mt-3 mb-4">
                    <h2 class="mb-0">{{$blog->title}}</h2>
                    <small class="mb-4">{{ date('M d, Y', strtotime($blog->created_at)) }}</small>
                    <br>
                    <br>
                    <p>{{ $blog->short_details }}</p>
                    <div class="details">
                        {!! $blog->details !!}
                    </div>
                </div>

                <!-- Social Share -->
                <div class="text-center">
                    <div id="share"></div>
                </div>
            </div>
        @else 
            <div class="col-12 col-lg-10 m-auto text-center no-data">
                <img src="{{asset('/website/images/static/no_data.png')}}" class="img-fluid">
                <h5>Opps ! Data not found !!</h5>
                <a href="{{url('/')}}" type="button" class="btn shadow-none">Back to Home</a>
            </div>
        @endif
            
        

        </div>
    </div>
</div>

<script>
    $("#share").jsSocials({
        showLabel: false,
        showCount: false,
        shares: [
            {
                share: "twitter",
                logo: "{{asset('/website/images/static/icons/twitter.png')}}"
            },
            {
                share: "facebook",
                logo: "{{asset('/website/images/static/icons/facebook.png')}}"
            },
            {
                share: "linkedin",
                logo: "{{asset('/website/images/static/icons/linkedin.png')}}"
            },
            {
                share: "whatsapp",
                logo: "{{asset('/website/images/static/icons/whatsapp.png')}}"
            }
        ]
    });
</script>

@endsection