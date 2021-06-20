<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">

<form action="" method="post">
    @csrf
    <label for="email">Email</label> <input type="text" name="email" id="email" placeholder="Enter Email"> <br>
    <label for="password">Password</label> <input type="text" name="password" id="password" placeholder="Enter Password"> <br>
    <input type="submit" name="" id="">
</form>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<p class="text-danger">{{session('notLogged')}}</p>


{{session('failed')}}