<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: aliceblue
    }

    .wrapper {
        padding: 30px 50px;
        border: 1px solid #ddd;
        border-radius: 15px;
        margin: 10px auto;
        max-width: 600px
    }

    h4 {
        letter-spacing: -1px;
        font-weight: 400
    }

    .img {
        width: 70px;
        height: 70px;
        border-radius: 6px;
        object-fit: cover
    }

    #img-section p,
    #deactivate p {
        font-size: 12px;
        color: #777;
        margin-bottom: 10px;
        text-align: justify
    }

    #img-section b,
    #img-section button,
    #deactivate b {
        font-size: 14px
    }

    label {
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 500;
        color: #777;
        padding-left: 3px
    }

    .form-control {
        border-radius: 10px
    }

    input[placeholder] {
        font-weight: 500
    }

    .form-control:focus {
        box-shadow: none;
        border: 1.5px solid #0779e4
    }

    select {
        display: block;
        width: 100%;
        border: 1px solid #ddd;
        border-radius: 10px;
        height: 40px;
        padding: 5px 10px
    }

    select:focus {
        outline: none
    }

    .button {
        background-color: #fff;
        color: #0779e4
    }

    .button:hover {
        background-color: #0779e4;
        color: #fff
    }

    .btn-primary {
        background-color: #0779e4
    }

    .danger {
        background-color: #fff;
        color: #e20404;
        border: 1px solid #ddd
    }

    .danger:hover {
        background-color: #e20404;
        color: #fff
    }

    @media(max-width:576px) {
        .wrapper {
            padding: 25px 20px
        }

        #deactivate {
            line-height: 18px
        }
    }
</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">


<!-- template source -->
<!-- https://bbbootstrap.com/snippets/bootstrap-edit-profile-accounts-setting-template-80240656 -->

<div class="wrapper bg-white mt-sm-5">
    <h4 class="pb-4 border-bottom">Account settings</h4>
    <div class="d-flex align-items-start py-3 border-bottom"> <img src="https://images.pexels.com/photos/1037995/pexels-photo-1037995.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="img" alt="">
        <div class="pl-sm-4 pl-2" id="img-section"> <b>Profile Photo</b>
            <p>Accepted file type .png. Less than 1MB</p> <button class="btn button border"><b>Upload</b></button>
        </div>
    </div>
    <div class="py-2">
        <div class="row py-2">
            <div class="col-md-6"> <label for="firstname">First Name</label> <input type="text" class="bg-light form-control" placeholder="Steve"> </div>
            <div class="col-md-6 pt-md-0 pt-3"> <label for="lastname">Last Name</label> <input type="text" class="bg-light form-control" placeholder="Smith"> </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6"> <label for="email">Email Address</label> <input type="text" class="bg-light form-control" placeholder="steve_@email.com"> </div>
            <div class="col-md-6 pt-md-0 pt-3"> <label for="phone">Phone Number</label> <input type="tel" class="bg-light form-control" placeholder="+1 213-548-6015"> </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6"> <label for="country">Country</label> <select name="country" id="country" class="bg-light">
                    <option value="india" selected>Bangladesh</option>
                    <option value="usa">USA</option>
                    <option value="uk">UK</option>
                    <option value="uae">UAE</option>
                </select> </div>
            <div class="col-md-6 pt-md-0 pt-3" id="lang"> <label for="language">Language</label>
                <div class="arrow"> <select name="language" id="language" class="bg-light">
                        <option value="english" selected>English</option>
                        <option value="english_us">English (United States)</option>
                        <option value="enguk">English UK</option>
                        <option value="arab">Arabic</option>
                    </select> </div>
            </div>
        </div>
        <div class="py-3 pb-4 border-bottom"> <button class="btn btn-primary mr-3">Save Changes</button> <a class="btn border button" href="{{url('/user/profile')}}">Cancel</a> </div>
        <div class="d-sm-flex align-items-center pt-3" id="deactivate">
            <div> <b>Deactivate your account</b>
                <p>Details about your company account and password</p>
            </div>
            <div class="ml-auto"> <button class="btn danger">Deactivate</button> </div>
        </div>
    </div>
</div>