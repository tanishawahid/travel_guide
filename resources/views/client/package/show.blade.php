
@extends('Layouts.website')
@section('content')

<div class="package-show py-4">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9 m-auto">

                @if($package)
                    <div class="card rounded-0 border-0 shadow-none">
                        <img src="{{url('')}}/website/images/packages/{{$package->image}}" class="img-fluid w-100">
                        <div class="card-body px-0">
                            <h2 class="mb-0">{{$package->title}}</h2>
                            <h6>Start from {{$package->start_date}} to {{$package->end_date}}</h6>
                            <div class="text-right px-1 py-2">
                                <button type="button" class="btn shadow-none" id="showModal">Book Now</button>
                            </div>
                            <div class="details">
                                {!! $package->details !!}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-center py-4">
                        <h2>Package not found !!</h2>
                    </div>
                @endif

            </div>
        </div>
    </div>



    <!-- Booking Modal -->
    @if(Auth::User())
    <div class="booking-modal-backdrop">
        <div class="flex-center flex-column">
            <div class="card shadow border-0">
                <div class="card-header bg-white p-4">
                    <div class="d-flex">
                        <div><h3 class="mb-0">Confirm Booking</h3></div>
                        <div class="ml-auto">
                            <button type="button" class="btn shadow-none rounded-circle btn-close" id="closeModal">
                                <img src="{{asset('/website/images/static/delete_icon.png')}}" alt="">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form id="submitForm">
                        <!-- Name -->
                        <div class="form-group mb-3">
                            <p>Name</p>
                            <input type="text" class="form-control shadow-none" id="name" value="{{Auth::User()->name}}" readonly>
                        </div>

                        <!-- Email -->
                        <div class="form-group mb-3">
                            <p>E-mail</p>
                            <input type="email" class="form-control shadow-none" id="email" value="{{Auth::User()->email}}" readonly>
                        </div>

                        <!-- Phone -->
                        <div class="form-group mb-3">
                            <p>Phone</p>
                            <input type="number" min="11" class="form-control shadow-none" id="phone" required>
                        </div>

                        <button type="submit" class="btn shadow-none float-right">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

</div>

<?php
    function getCredential(){
        if(Auth::User()){
            return Auth::User()->id;
        }else{
            return "null";
        }
    }
?>

<script>
    $('.booking-modal-backdrop').css('display', 'none')

    // Show Modal
    $('#showModal').click(function(){
        if('<?php echo getCredential(); ?>' === "null"){
            return window.location = "/login"
        }else{
            $('.booking-modal-backdrop').css('display', 'block')
        }
    })

    // Hide Modal
    $('#closeModal').click(function(){
        $('.booking-modal-backdrop').css('display', 'none')
    })

    // Submit form
    $('#submitForm').submit(function(event){
        event.preventDefault()
        const data = {
            user_id: <?php echo getCredential(); ?>,
            package_id: <?php echo request()->id; ?>,
            phone: $('#phone').val()
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            },
            type: "POST",
            url: "{{route('confirmbooking')}}",
            data: data,
            success:function(response){
                if(response === 'success'){
                    notif({
                        type: "success",
                        msg: "<b>Your booking complete, we will contact with you.</b>",
                        position: "right",
                    })
                    $('.booking-modal-backdrop').css('display', 'none')
                }
            }
        })
        
    })
</script>

@endsection