@extends('Book_Mid_Project.my-account')
@section('Account_Details')

<div class="border-bottom mb-6 pb-6 mb-lg-8 pb-lg-9">
    <div class="pt-5 pl-md-5 pt-lg-8 pl-lg-9">
        <h6 class="font-weight-medium font-size-7 ml-lg-1 mb-lg-8 pb-xl-1">Account Details
        </h6>
        <div class="col-md-6 mb-4">
            <div class="js-form-message">
                <p for="exampleFormControlInput2">Date of Birth: {{ date("F jS, Y", strtotime($userDetials->dob)) }}</p>
                @php
                if(Session('birthday'))
                echo "<h3 class='text-primary'>Today is Your Birthday! Receive 2% off for Any Purchase</h3>";
                @endphp

            </div>
        </div>
        <div class="font-weight-medium font-size-22 mb-4 pb-xl-1">Edit Account</div>
        <form action="" method="post">
            @csrf
            <div class="row">
                <!-- <div class="col-md-6 mb-4">
                                            <div class="js-form-message">
                                                <label for="exampleFormControlInput1">First name *</label>
                                                <input type="text" class="form-control rounded-0 pl-3 placeholder-color-3" id="exampleFormControlInput1" name="name" aria-label="Jack Wayley" placeholder="Ali" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                                            </div>
                                        </div> -->
                <div class="col-md-6 mb-4">
                    <div class="js-form-message">
                        <label for="exampleFormControlInput2">Full name *</label>
                        <input type="text" value="{{$userDetials->name}}" class="form-control rounded-0 pl-3 placeholder-color-3" id="exampleFormControlInput2" name="name" aria-label="Jack Wayley" placeholder="Your Full Name" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                    </div>
                </div>



                <div class="col-md-12 mb-4">
                    <div class="js-form-message">
                        <label for="exampleFormControlInput3">Select Gender</label> <br>
                        @if ($userDetials->gender == "Male")
                        <input type="radio" value="Male" checked class="rounded-0" name="gender" aria-label="Jack Wayley" id="exampleFormControlInput3" required="" data-error-class="u-has-error" data-msg="Please select your gender." data-success-class="u-has-success"> Male
                        <input type="radio" value="Female" class="rounded-0" name="gender" aria-label="Jack Wayley" id="exampleFormControlInput3" required="" data-error-class="u-has-error" data-msg="Please select your gender." data-success-class="u-has-success"> Female
                        @elseif ($userDetials->gender == "Female")
                        <input type="radio" value="Male" class="rounded-0" name="gender" aria-label="Jack Wayley" id="exampleFormControlInput3" required="" data-error-class="u-has-error" data-msg="Please select your gender." data-success-class="u-has-success"> Male
                        <input type="radio" value="Female" checked class="rounded-0" name="gender" aria-label="Jack Wayley" id="exampleFormControlInput3" required="" data-error-class="u-has-error" data-msg="Please select your gender." data-success-class="u-has-success"> Female
                        @endif
                    </div>
                </div>
                <!-- <div class="col-md-12 mb-4 mb-md-0">
                                            <div class="js-form-message">
                                                <label for="exampleFormControlInput4">Email address</label>
                                                <input type="email" value="{{$userDetials->email}}" class="form-control rounded-0" name="email" id="exampleFormControlInput4" aria-label="Jack Wayley" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                                            </div>
                                        </div> -->
                <br>
                <br>
                <br>
                <br>
                <div class="ml-3">
                    <button type="submit" class="btn btn-wide btn-dark text-white rounded-0 transition-3d-hover height-60 width-390">Save
                        Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="pl-md-5 pl-lg-9 space-bottom-2 space-bottom-lg-3">
    <div class="font-weight-medium font-size-22 mb-4 pb-xl-1">Password Change</div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="/user/changepassword" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="js-form-message">
                    <label for="exampleFormControlInput5">Current Password</label>
                    <input type="password" class="form-control rounded-0" name="Current_Password" id="exampleFormControlInput5" aria-label="Jack Wayley" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                </div>
            </div>
            <div class="col-md-12 mb-4">
                <div class="js-form-message">
                    <label for="exampleFormControlInput6">New Password</label>
                    <input type="password" class="form-control rounded-0" name="New_Password" id="exampleFormControlInput6" aria-label="Jack Wayley" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                </div>
            </div>
            <div class="col-md-12 mb-5">
                <div class="js-form-message">
                    <label for="exampleFormControlInput7">Confirm new password</label>
                    <input type="password" class="form-control rounded-0" name="New_Password_confirmation" id="exampleFormControlInput7" aria-label="Jack Wayley" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                </div>
            </div>
            <div class="ml-3">
                <button type="submit" class="btn btn-wide btn-dark text-white rounded-0 transition-3d-hover height-60 width-390">Save
                    Changes</button>
            </div>
        </div>
    </form>
</div>
@endsection