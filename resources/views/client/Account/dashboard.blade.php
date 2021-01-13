<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>tGo || Profile</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/account/dashboard.css') }}" rel="stylesheet">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    

</head>
<body>
    <div id="app">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <p class="text-capitalize navbar-brand mb-0">{{Auth()->User()->name}}</p>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link active" href="{{ url('/') }}">Home</a>
                <a href="{{ route('logout') }}"
                    class="nav-item nav-link active"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

        <div class="container py-4">
            <div class="row">
                <div class="col-12 mb-4 mb-lg-5 text-center">
                    <h1 class="mb-0">Welcome {{Auth::User()->name}}</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <p class="text-info mb-1">Your selected packages</p>
                </div>
                <div class="col-12">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <td class="text-center">SL</td>
                                <td>Package name</td>
                                <td class="text-center">Status</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($packages as $key => $package)
                            <tr>
                                <td class="text-center">{{$key+1}}</td>
                                <td>{{$package->title}}</td>
                                <td class="text-center">
                                    @if($package->status == 'pending')
                                        <span class="text-danger text-capitalize">{{$package->status}}</span>
                                    @elseif($package->status =='confirmed')
                                        <span class="text-success text-capitalize">{{$package->status}}</span>
                                    @elseif($package->status == 'canceled')
                                        <span class="text-warning text-capitalize">{{$package->status}}</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>


