<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<form class="form-horizontal" method="POST" enctype="multipart/form-data">
    @csrf
    <fieldset>

        <!-- Form Name -->
        <legend><a href="{{url('/product/all')}}">PRODUCTS</a></legend>



        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>
            <div class="col-md-4">
                <input id="product_name" value="{{$product->product_name}}" name="product_name" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_name_fr">PRODUCT DESCRIPTION</label>
            <div class="col-md-4">
                <input id="product_name_fr" value="{{$product->product_descr}}" name="product_descr" placeholder="PRODUCT DESCRIPTION" class="form-control input-md" required="" type="text">

            </div>
        </div>


        <!-- File Button
        <div class="form-group">
            <label class="col-md-4 control-label" for="filebutton">PRODUCT Image</label>
            <div class="col-md-4">
                <input id="filebutton" value="asset('Uplo'$product->product_descr)" name="product_image" class="input-file" type="file">
            </div>
        </div> -->

        <!-- Button -->
        <div class="form-group">
            <input class="btn btn-danger" type="reset" name="" id="">
            <input class="btn btn-success" type="submit" value="Update" name="" id="">
            <div class="col-md-4">
            </div>
        </div>

    </fieldset>
</form>