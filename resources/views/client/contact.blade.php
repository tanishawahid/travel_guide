@extends('Layouts.website')
@section('content')

<div class="contact">

    <div class="header py-4 py-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5 d-none d-lg-block pt-5">
                    <h1 class="mb-0 mt-4">Contact Us</h1>
                </div>
                <div class="col-12 col-lg-7 text-center">
                    <img src="{{asset('website/images/static/contact_banner.png')}}" class="img-fluid">
                </div>
                <div class="col-12 col-lg-5 d-lg-none text-center">
                    <h1>Contact Us</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
            
                <form action="{{route('message')}}" method="post">
                    @csrf 

                    <div class="row">
                        <!-- Name -->
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-3">
                                @if($errors->has('name'))
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                @else
                                    <p class="text-muted">Name</p>
                                @endif
                                <input type="text" class="form-control shadow-none" name="name">
                            </div>
                        </div>

                        <!-- email -->
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-3">
                                @if($errors->has('email'))
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                @else
                                    <p class="text-muted">Email</p>
                                @endif
                                <input type="text" class="form-control shadow-none" name="email">
                            </div>
                        </div>

                        <!-- message -->
                        <div class="col-12">
                            <div class="form-group mb-3">
                                @if($errors->has('message'))
                                    <p class="text-danger">{{ $errors->first('message') }}</p>
                                @else
                                    <p class="text-muted">Message</p>
                                @endif
                                <textarea name="message" class="form-control shadow-none" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="col-12 text-right">
                            <button type="submit" class="btn shadow-none">Send Message</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>

@endsection