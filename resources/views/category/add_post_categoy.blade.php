@extends('my_welcome')
@section('content')
<h1>This is a Create Category</h1>
<div class="container">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <a href="" class="btn btn-info">All Category</a>

            <div class="my-5">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST">
                    @csrf
                    <div class="form-floating">
                        <input class="form-control" name="name" type="text" placeholder="Enter your name..." />
                        <label for="inputName">Category Name</label>
                    </div>
                    <div class="form-floating">
                        <input class="form-control" name="status" type="text" placeholder="Enter your phone number..." />
                        <label for="status">Category Status</label>
                    </div>

                    <br />
                    <button class="btn btn-primary text-uppercase" type="submit">Create Category</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('about_us_content')
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima perspiciatis itaque porro veritatis aliquid fugit labore eius consequuntur. Harum, unde?</p>
@endsection