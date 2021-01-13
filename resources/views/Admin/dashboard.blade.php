
@extends('Layouts.admin')
@section('content')

<div class="dashboard">
    <div class="container py-3">
        <div class="row">

            <div class="col-6 col-md-4 col-lg-3">
                <div class="card rounded-0 border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="flex-center flex-column text-center">
                            <h3 class="mb-0"><b>{{$admin}}</b></h3>
                            <h5 class="mb-0">admin</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
                <div class="card rounded-0 border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="flex-center flex-column text-center">
                            <h3 class="mb-0"><b>{{$users}}</b></h3>
                            <h5 class="mb-0">users</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
                <div class="card rounded-0 border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="flex-center flex-column text-center">
                            <h3 class="mb-0"><b>{{$banners}}</b></h3>
                            <h5 class="mb-0">banners</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
                <div class="card rounded-0 border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="flex-center flex-column text-center">
                            <h3 class="mb-0"><b>{{$blogs}}</b></h3>
                            <h5 class="mb-0">blogs</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
                <div class="card rounded-0 border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="flex-center flex-column text-center">
                            <h3 class="mb-0"><b>{{$members}}</b></h3>
                            <h5 class="mb-0">members</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
                <div class="card rounded-0 border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="flex-center flex-column text-center">
                            <h3 class="mb-0"><b>{{$requests}}</b></h3>
                            <h5 class="mb-0">requests</h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection