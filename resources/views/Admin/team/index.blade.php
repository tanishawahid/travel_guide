
@extends('Layouts.admin')
@section('content')

<div class="container-fluid px-lg-4">
    <div class="row">

        <div class="col-12 my-3">
            <div class="card rounded-0 border-0 shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h5 class="mb-0 mt-2 text-dark"><b>Team Members</b></h5>
                        </div>
                        <div class="ml-auto">
                            <a href="{{route('admin.team.create')}}" class="btn btn-info rounded-0 shadow-none text-white"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mb-4">
            <table class="table table-bordered table-responsive-md">
                <thead>
                    <tr>
                        <td><p class="mb-0 text-dark"><b>SL</b></p></td>
                        <td class="text-center"><p class="mb-0 text-dark"><b>Image</b></p></td>
                        <td><p class="mb-0 text-dark"><b>Name</b></p></td>
                        <td><p class="mb-0 text-dark"><b>Title</b></p></td>
                        <td class="text-center"><p class="mb-0 text-dark"><b>Action</b></p></td>
                    </tr>
                </thead>
                <tbody>

                    @foreach($members as $key => $member)
                    <tr>
                        <td><p class="mb-0 text-dark"><b>{{$key+1}}</b></p></td>
                        <td class="text-center">
                            <img src="{{url('')}}/website/images/team/{{$member->image}}" class="img-fluid" style="width: 150px;">
                        </td>
                        <td><p class="mb-0 text-dark"><b>{{$member->name}}</b></p></td>
                        <td><p class="mb-0 text-dark">{{$member->title}}</p></td>
                        <td class="text-center">
                            <form action="{{route('admin.team.destroy',$member->id)}}" method="post"
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