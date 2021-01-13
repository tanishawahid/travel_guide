
@extends('Layouts.admin')
@section('content')

<div class="container-fluid px-lg-4">
    <div class="row">

        <div class="col-12 my-3">
            <div class="card rounded-0 border-0 shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h5 class="mb-0 mt-2 text-dark"><b>Packages</b></h5>
                        </div>
                        <div class="ml-auto">
                            <a href="{{route('admin.package.create')}}" class="btn btn-info rounded-0 shadow-none text-white"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mb-4">
            <table class="table table-bordered table-responsive-md">
                <thead>
                    <tr>
                        <td><p class="mb-0 text-dark"><b>ID</b></p></td>
                        <td><p class="mb-0 text-dark"><b>Title</b></p></td>
                        <td><p class="mb-0 text-dark"><b>Start Date</b></p></td>
                        <td><p class="mb-0 text-dark"><b>End Date</b></p></td>
                        <td><p class="mb-0 text-dark"><b>Image</b></p></td>
                        <td><p class="mb-0 text-dark"><b>Details</b></p></td>
                        <td class="text-center"><p class="mb-0 text-dark"><b>Action</b></p></td>
                    </tr>
                </thead>
                <tbody>

                    @foreach($packages as $key => $package)
                    <tr>
                        <td><p class="mb-0 text-dark"><b>{{ $key+1 }}</b></p></td>
                        <td><p class="mb-0 text-dark"><b>{{ $package->title }}</b></p></td>
                        <td><p class="mb-0 text-dark"><b>{{ $package->start_date }}</b></p></td>
                        <td><p class="mb-0 text-dark"><b>{{ $package->end_date }}</b></p></td>
                        <td><img src="{{url('')}}/website/images/packages/{{$package->image}}" class="img-fluid" style="width: 130px;"></td>
                        <td>{!! $package->details !!}</td>
                        <td class="text-center">
                            <a href="{{route('admin.package.edit', $package->id)}}" type="button" class="btn btn-sm btn-info rounded-0 shadow-none text-white"><i class="fas fa-pen"></i></a>
                          
                            <form action="{{route('admin.package.destroy',$package->id)}}" method="post"
                                onsubmit="return confirm('Are you sure ?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger rounded-0 shadow-none text-white">
                                    <i class="fas fa-trash text-whie"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>


    </div>
</div>

@endsection