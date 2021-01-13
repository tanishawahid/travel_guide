
@extends('Layouts.admin')
@section('content')

<div class="container-fluid px-lg-4">
    <div class="row">

        <div class="col-12 my-3">
            <div class="card rounded-0 border-0 shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h5 class="mb-0 mt-2 text-dark"><b>All Requests</b></h5>
                        </div>
                        <div class="ml-auto">
                            <a href="{{route('admin.dashboard')}}" class="btn btn-info rounded-0 shadow-none text-white"><i class="fas fa-chevron-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mb-4">
            <table class="table table-sm table-responsive-sm table-bordered">
                <thead>
                    <tr>
                        <td>SL</td>
                        <td>Name</td>
                        <td>E-mail</td>
                        <td>Phone</td>
                        <td>Package</td>
                        <td class="text-center">Package Image</td>
                        <td class="text-center">Status</td>
                        <td class="text-center">Action</td>
                    </tr>
                </thead>
                <tbody>

                    @foreach($requests as $key => $request)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$request->name}}</td>
                        <td>{{$request->email}}</td>
                        <td>{{$request->phone}}</td>
                        <td>{{$request->title}}</td>
                        <td class="text-center">
                            <img src="{{url('')}}/website/images/packages/{{$request->image}}" class="img-fluid" style="height: 70px;" />
                        </td>
                        <td class="text-center text-capitalize">
                            @if($request->status == 'pending')
                                <span class="text-danger">{{$request->status}}</span>
                            @elseif($request->status == 'confirmed')
                                <span class="text-success">{{$request->status}}</span>
                            @elseif($request->status == 'canceled')
                                <span class="text-danger">{{$request->status}}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($request->status == 'pending')

                                <form action="{{route('admin.booking.approve',$request->id)}}" method="post"
                                    onsubmit="return confirm('Are you sure ?')">
                                    @csrf
                                    @method('put')
                                    <button  type="submit" class="btn btn-sm btn-success shadow-none">Approve</button>
                                </form>

                                <form action="{{route('admin.booking.cancel',$request->id)}}" method="post"
                                    onsubmit="return confirm('Are you sure ?')">
                                    @csrf
                                    @method('put')
                                    <button  type="submit" class="btn btn-sm btn-danger shadow-none">Cancel</button>
                                </form>
                              
                            @elseif($request->status == 'confirmed')
                                <span class="text-success"><i class="fas fa-check-circle" style="font-size: 25px;"></i></span>
                            @elseif($request->status == 'canceled')
                            <span class="text-danger"><i class="fas fa-times-circle" style="font-size: 25px;"></i></span>
                            @endif
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>


    </div>
</div>

@endsection