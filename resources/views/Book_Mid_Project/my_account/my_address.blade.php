@extends('Book_Mid_Project.my-account')

@section('Addresses')

<div class="pt-5 pl-md-5 pt-lg-8 pl-lg-9 space-bottom-2 mb-lg-4">
    <h6 class="font-weight-medium font-size-7 ml-lg-1 mb-5 mb-lg-8 pb-xl-1">Addresses</h6>
    <p><a href="{{route('CreateAddress')}}" class="btn btn-primary width-160 rounded-0 btn-wide font-weight-medium">Create New</a></p>
    <div class="row row-cols-1 row-cols-md-2">

        @foreach ($allAddress as $address)
        <div class="col">
            <div class="mb-6 mb-md-0">
                <h6 class="font-weight-medium font-size-22 mb-3">Shipping Address
                </h6>
                <address class="d-flex flex-column mb-4">
                    <span class="text-gray-600 font-size-2">House No: {{$address->House_No}}</span>
                    <span class="text-gray-600 font-size-2">Road No: {{$address->Road_No}}</span>
                    <span class="text-gray-600 font-size-2">Area: {{$address->Area}}</span>
                    <span class="text-gray-600 font-size-2">{{$address->City}}, {{$address->Postal_Code}}</span>
                    <span class="text-gray-600 font-size-2">{{$address->Country}}</span>
                    <span class="text-gray-600 font-size-2">Mobile Number: {{$address->Mobile_Number}}</span>
                </address>
                <div class="d-flex">
                    <a href="{{url('/user/edit/address')}}/{{$address->address_id}}" class="btn btn-dark width-150 rounded-0 btn-wide font-weight-medium">Edit</a>
                    <a href="{{url('/user/delete/address')}}/{{$address->address_id}}" class="btn btn-danger width-150 rounded-0 btn-wide font-weight-medium">Remove</a>
                </div>
                <div class="d-flex">

                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection