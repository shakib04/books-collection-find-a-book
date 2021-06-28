@extends('Book_Mid_Project.my-account')
@section('Wishlist')

<div class="pt-5 pl-md-5 pt-lg-8 pl-lg-9 space-bottom-lg-3">
    <h6 class="font-weight-medium font-size-7 ml-lg-1 mb-lg-8 pb-xl-1">Wishlist</h6>
    @if($wishlist)
    @if($wishlist->bookid1 == "" and $wishlist->bookid2 == "" and $wishlist->bookid3 == "")
    <h2>No Book in WishList</h2>
    @else
    <table class="table mb-0">
        <thead>

            <tr class="border">
                <th scope="col" class="py-3 border-bottom-0 font-weight-medium pl-3 pl-md-5">Prouct</th>
                <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Price</th>
                <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Stock Staus
                </th>
                <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Actions</th>
                <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Remove</th>
            </tr>
        </thead>
        <tbody>

            @if($wishlist->bookid1 != "")
            <tr class="border">
                <th class="pl-3 pl-md-5 font-weight-normal align-middle py-6">
                    <div class="d-flex align-items-center">
                        <a class="d-block" href="#">
                            <img class="img-fluid" src="{{$books['book1']->BookSampleImage1}}" width="100px" height="120px" alt="Image-Description">
                        </a>
                        <div class="ml-xl-4">
                            <div class="font-weight-normal">
                                <a href="#">{{$books["book1"]->Name}}</a>
                            </div>
                            <div class="font-size-2"><a href="#" class="text-gray-700" tabindex="0">{{$books["book1"]->AuthorName}}</a></div>
                        </div>
                    </div>
                </th>
                <td class="align-middle py-5">{{$books["book1"]->Price}}</td>
                <td class="align-middle py-5">In Stock</td>
                <td class="align-middle py-5">
                    <span class="product__add-to-cart">ADD TO CART</span>
                </td>
                <td class="align-middle py-5">
                    <a class="product__add-to-cart" href="{{url('/remove/wishlist/')}}/{{$books['book1']->Id}}"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            @endif
            @if($wishlist->bookid2 != "")
            <tr class="border">
                <th class="pl-3 pl-md-5 font-weight-normal align-middle py-6">
                    <div class="d-flex align-items-center">
                        <a class="d-block" href="#">
                            <img class="img-fluid" src="{{$books['book2']->BookSampleImage1}}" width="100px" height="120px" alt="Image-Description">
                        </a>
                        <div class="ml-xl-4">
                            <div class="font-weight-normal">
                                <a href="#">{{$books["book2"]->Name}}</a>
                            </div>
                            <div class="font-size-2"><a href="#" class="text-gray-700" tabindex="0">{{$books["book2"]->AuthorName}}</a></div>
                        </div>
                    </div>
                </th>
                <td class="align-middle py-5">{{$books["book2"]->Price}}</td>
                <td class="align-middle py-5">In Stock</td>
                <td class="align-middle py-5">
                    <span class="product__add-to-cart">ADD TO CART</span>
                </td>
                <td class="align-middle py-5">
                    <a class="product__add-to-cart" href="{{url('/remove/wishlist/')}}/{{$books['book2']->Id}}"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            @endif
            @if($wishlist->bookid3 != "")
            <tr class="border">
                <th class="pl-3 pl-md-5 font-weight-normal align-middle py-6">
                    <div class="d-flex align-items-center">
                        <a class="d-block" href="#">
                            <img class="img-fluid" width="100px" height="120px" src="{{$books['book3']->BookSampleImage1}}" alt="Image-Description">
                        </a>
                        <div class="ml-xl-4">
                            <div class="font-weight-normal">
                                <a href="#">{{$books["book3"]->Name}}</a>
                            </div>
                            <div class="font-size-2"><a href="#" class="text-gray-700" tabindex="0">{{$books["book3"]->AuthorName}}</a></div>
                        </div>
                    </div>
                </th>
                <td class="align-middle py-5">{{$books["book3"]->Price}}</td>
                <td class="align-middle py-5">In Stock</td>
                <td class="align-middle py-5">
                    <span class="product__add-to-cart">ADD TO CART</span>
                </td>
                <td class="align-middle py-5">
                    <a class="product__add-to-cart" href="{{url('/remove/wishlist/')}}/{{$books['book3']->Id}}"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
    @endif
    @else
    <h2>No Book in WishList</h2>
    @endif
</div>

@endsection