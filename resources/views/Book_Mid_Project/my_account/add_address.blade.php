@extends('Book_Mid_Project._layout_2')

@section('content')

<div class="border-bottom mb-6 pb-6 mb-lg-8 pb-lg-9">
    <div class="pt-5 pl-md-5 pt-lg-8 pl-lg-9">
        <h6 class="font-weight-medium font-size-7 ml-lg-1 mb-lg-8 pb-xl-1">Address Details
        </h6>
        <div class="font-weight-medium font-size-22 mb-4 pb-xl-1">Add Another Shipping Address</div>
        <form action="" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="js-form-message">
                        <label for="exampleFormControlInput1">Country *</label>
                        <input type="text" value="" class="form-control rounded-0 pl-3 placeholder-color-3" id="exampleFormControlInput1" name="Country" aria-label="Jack Wayley" placeholder="" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="js-form-message">
                        <label for="exampleFormControlInput1">City *</label>
                        <input type="text" value="" class="form-control rounded-0 pl-3 placeholder-color-3" id="exampleFormControlInput1" name="City" aria-label="Jack Wayley" placeholder="" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="js-form-message">
                        <label for="exampleFormControlInput2">Area*</label>
                        <input type="text" value="" class="form-control rounded-0 pl-3 placeholder-color-3" id="exampleFormControlInput2" name="Area" aria-label="Jack Wayley" placeholder="" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="js-form-message">
                        <label for="exampleFormControlInput2">Post Code*</label>
                        <input type="text" value="" class="form-control rounded-0 pl-3 placeholder-color-3" id="exampleFormControlInput2" name="Postal_Code" aria-label="Jack Wayley" placeholder="" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="js-form-message">
                        <label for="exampleFormControlInput2">Road No *</label>
                        <input type="text" value="" class="form-control rounded-0 pl-3 placeholder-color-3" id="exampleFormControlInput2" name="Road_No" aria-label="Jack Wayley" placeholder="" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="js-form-message">
                        <label for="exampleFormControlInput2">House No *</label>
                        <input type="text" value="" class="form-control rounded-0 pl-3 placeholder-color-3" id="exampleFormControlInput2" name="House_No" aria-label="Jack Wayley" placeholder="" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="js-form-message">
                        <label for="exampleFormControlInput2">Mobile Number *</label>
                        <input type="text" value="" class="form-control rounded-0 pl-3 placeholder-color-3" id="exampleFormControlInput2" name="Mobile_Number" aria-label="Jack Wayley" placeholder="" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                    </div>
                </div>

                <br>
                <br>
                <br>
                <br>
                <div class="ml-3">
                    <button type="submit" class="btn btn-wide btn-dark text-white rounded-0 transition-3d-hover height-60 width-390">Save</button>
                </div>
                <div class="ml-3">
                    <a href="{{route('MyAddress')}}" class="btn btn-wide btn-danger text-white rounded-0 transition-3d-hover height-60 width-390">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection