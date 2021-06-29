@extends('Book_Mid_Project.my-account')
@section('dashboard')
<div class="tab-pane fade show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab">
    <div class="pt-5 pt-lg-8 pl-md-5 pl-lg-9 space-bottom-2 space-bottom-lg-3 mb-xl-1">
        <h6 class="font-weight-medium font-size-7 ml-lg-1 mb-lg-8 pb-xl-1">Dashboard</h6>
        <div class="ml-lg-1 mb-4">
            <span class="font-size-22">Hello {{ Session::get('userFullName')}}</span>
            <span class="font-size-2"> (not {{ Session::get('userFullName')}}? <a class="link-black-100" href="{{url('/logout')}}">Log
                    out</a>)</span>
        </div>


        <div class="col">
            <div class="border py-6 text-center">
                <img width="180" height="150" src="/upload/users/profile_pic/{{$userDetials->profile_pic}}" class="btn btn-primary rounded-circle px-4 mb-2" alt="Upload Your Profile Picture" />
                <div class="font-size-3 mb-xl-1"></div>
            </div>
        </div>

        <div class="mb-4">
            <form class="form-horizontal" method="POST" action="/user/profile/picture" enctype="multipart/form-data">
                @csrf

                <!-- File Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="filebutton">Upload Here</label>
                    <div class="col-md-4">
                        <input id="filebutton" name="profile_image" class="input-file" type="file">
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="Change Profile Pic" name="" id="">
                    <div class="col-md-4">
                    </div>
                </div>
            </form>
        </div>

        <div class="mb-4">
            <p class="mb-0 font-size-2 ml-lg-1 text-gray-600">From your account dashboard you
                can view your <span class="text-dark">recent orders,</span> manage your <span class="text-dark">shipping and billing addresses,</span> and edit your <span class="text-dark">password and account details.</span></p>
        </div>
        <div class="row no-gutters row-cols-1 row-cols-md-2 row-cols-lg-3">
            <div class="col">
                <div class="border py-6 text-center">
                    <a href="#" class="btn btn-primary rounded-circle px-4 mb-2">
                        <span class="flaticon-order font-size-10 btn-icon__inner"></span>
                    </a>
                    <div class="font-size-3 mb-xl-1">Orders</div>
                </div>
            </div>
            <div class="col">
                <div class="border border-left-0 py-6 text-center">
                    <a href="#" class="btn bg-gray-200 rounded-circle px-4 mb-2">
                        <span class="flaticon-cloud-computing font-size-10 btn-icon__inner text-primary"></span>
                    </a>
                    <div class="font-size-3 mb-xl-1">Downloads</div>
                </div>
            </div>
            <div class="col">
                <div class="border border-left-0 py-6 text-center">
                    <a href="#" class="btn bg-gray-200 rounded-circle px-4 mb-2">
                        <span class="flaticon-place font-size-10 btn-icon__inner text-primary"></span>
                    </a>
                    <div class="font-size-3 mb-xl-1">Addresses</div>
                </div>
            </div>
            <div class="col">
                <div class="border py-6 text-center">
                    <a href="#" class="btn bg-gray-200 rounded-circle px-4 mb-2">
                        <span class="flaticon-user-1 font-size-10 btn-icon__inner text-primary"></span>
                    </a>
                    <div class="font-size-3 mb-xl-1">Account Details</div>
                </div>
            </div>
            <div class="col">
                <div class="border border-left-0 py-6 text-center">
                    <a href="#" class="btn bg-gray-200  rounded-circle px-4 mb-2">
                        <span class="flaticon-heart font-size-10 btn-icon__inner text-primary"></span>
                    </a>
                    <div class="font-size-3 mb-xl-1">Wishlist</div>
                </div>
            </div>
            <div class="col">
                <div class="border border-left-0 py-6 text-center">
                    <a href="#" class="btn bg-gray-200 rounded-circle px-4 mb-2">
                        <span class="flaticon-exit font-size-10 btn-icon__inner text-primary"></span>
                    </a>
                    <div class="font-size-3 mb-xl-1">Orders</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection