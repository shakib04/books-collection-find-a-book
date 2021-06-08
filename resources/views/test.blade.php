<h1>Good Evening <?php echo $name; ?></h1>

<h1>Hi {{$name}}</h1>

@if($age >= 18)
<h1>You are adult</h1>
@else
<h1>You are not adult</h1>
@endif