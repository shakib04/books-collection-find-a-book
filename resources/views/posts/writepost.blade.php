@extends('my_welcome')
@section('content')
<h1>This is an write post page</h1>
<div class="container">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <p>
                <a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
                <a href="" class="btn btn-info">All Category</a>
            </p>
            <div class="my-5">
                <form method="POST">
                    <div class="form-floating">
                        <input class="form-control" id="inputName" type="text" placeholder="Enter your name..." />
                        <label for="inputName">Post Title</label>
                    </div>
                    <div class="form-floating">
                        <select class="form-control" id="inputEmail" type="email" placeholder="Enter your email...">
                            <option>cat 1</option>
                            <option>cat 2</option>
                        </select>
                        <label for="inputEmail">Category</label>
                    </div>
                    <div class="form-floating">
                        <input class="form-control" id="inputPhone" type="file" placeholder="Enter your phone number..." />
                        <label for="inputPhone">Post Image</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" id="inputMessage" placeholder="Enter your message here..." style="height: 12rem"></textarea>
                        <label for="inputMessage">Description</label>
                    </div>
                    <br />
                    <button class="btn btn-primary text-uppercase" type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('about_us_content')
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima perspiciatis itaque porro veritatis aliquid fugit labore eius consequuntur. Harum, unde?</p>
@endsection