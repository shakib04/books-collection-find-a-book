@extends('Book_Mid_Project._layout_2')

@section('content')
<main id="content">
    <div class="space-bottom-2 space-bottom-lg-3">
        <div class="pb-lg-1">
            <div class="page-header border-bottom">
                <div class="container">
                    <div class="d-md-flex justify-content-between align-items-center py-4">
                        <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Shops</h1>
                        <nav class="woocommerce-breadcrumb font-size-2">
                            <a href="../home/index.html" class="h-primary">Home</a>
                            <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                            <span>Shops Single</span>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="space-bottom-2 space-bottom-lg-3">
                <div class="bg-gray-200 space-bottom-2 space-bottom-md-0">
                    <div class="container space-top-2 space-top-wd-3 px-3">
                        <div class="row">
                            <div class="col-lg-4 col-wd-3 d-flex">
                                <img class="img-fluid mb-5 mb-lg-0 mt-auto" src="../../assets/img/400x759/img1.png" alt="Image-Description">
                            </div>
                            <div class="col-lg-8 col-wd-9">
                                <div class="mb-8">
                                    <span class="text-gray-400 font-size-2">Shop Info</span>
                                    <h6 class="font-size-7 ont-weight-medium mt-2 mb-3 pb-1">
                                        {{$shopInfo->shop_name}}
                                        @if($userFollow)
                                        <a class="btn btn-dark" href="/unfollow/shop/{{$shopInfo->shop_id}}">Unfollow Shop</a>
                                        @else
                                        <a class="btn btn-dark" href="/follow/shop/{{$shopInfo->shop_id}}">Follow Shop</a>
                                        @endif
                                    </h6>

                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                </div>
                                <ul class="products list-unstyled row no-gutters row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-wd-4 my-0 mb-md-8 mb-wd-12">
                                    <li class="product product__no-border col border-0 mb-2 mb-lg-0">
                                        <div class="product__inner overflow-hidden p-3 p-md-4d875 mx-1 bg-white">
                                            <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                                <div class="woocommerce-loop-product__thumbnail">
                                                    <a href="..shop/single-product-v5.html" class="d-block"><img src="../../assets/img/120x180/img1.jpg" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image" alt="image-description"></a>
                                                </div>
                                                <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                                    <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="..shop/single-product-v5.html">Paperback</a></div>
                                                    <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="..shop/single-product-v5.html">Think Like a Monk: Train Your Mind for Peace and Purpose Everyday</a></h2>
                                                    <div class="font-size-2  mb-1 text-truncate"><a href="../others/Shops-single.html" class="text-gray-700">Jay Shetty</a></div>
                                                    <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                                    </div>
                                                </div>
                                                <div class="product__hover d-flex align-items-center">
                                                    <a href="../shop/single-product-v5.html" class="text-uppercase text-dark h-dark font-weight-medium mr-auto" tabindex="0">
                                                        <span class="product__add-to-cart">ADD TO CART</span>
                                                        <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                                    </a>
                                                    <a href="../shop/single-product-v5.html" class="mr-1 h-p-bg" tabindex="0">
                                                        <i class="flaticon-switch"></i>
                                                    </a>
                                                    <a href="../shop/single-product-v5.html" class="h-p-bg" tabindex="0">
                                                        <i class="flaticon-heart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product product__no-border col border-0 mb-2 mb-lg-0">
                                        <div class="product__inner overflow-hidden p-3 p-md-4d875 mx-1 bg-white">
                                            <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                                <div class="woocommerce-loop-product__thumbnail">
                                                    <a href="..shop/single-product-v5.html" class="d-block"><img src="../../assets/img/120x180/img2.jpg" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image" alt="image-description"></a>
                                                </div>
                                                <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                                    <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="..shop/single-product-v5.html">Paperback</a></div>
                                                    <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="..shop/single-product-v5.html">Think Like a Monk: Train Your Mind for Peace and Purpose Everyday</a></h2>
                                                    <div class="font-size-2  mb-1 text-truncate"><a href="../others/Shops-single.html" class="text-gray-700">Jay Shetty</a></div>
                                                    <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                                    </div>
                                                </div>
                                                <div class="product__hover d-flex align-items-center">
                                                    <a href="../shop/single-product-v5.html" class="text-uppercase text-dark h-dark font-weight-medium mr-auto" tabindex="0">
                                                        <span class="product__add-to-cart">ADD TO CART</span>
                                                        <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                                    </a>
                                                    <a href="../shop/single-product-v5.html" class="mr-1 h-p-bg" tabindex="0">
                                                        <i class="flaticon-switch"></i>
                                                    </a>
                                                    <a href="../shop/single-product-v5.html" class="h-p-bg" tabindex="0">
                                                        <i class="flaticon-heart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product product__no-border col border-0 mb-2 mb-lg-0">
                                        <div class="product__inner overflow-hidden p-3 p-md-4d875 mx-1 bg-white">
                                            <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                                <div class="woocommerce-loop-product__thumbnail">
                                                    <a href="..shop/single-product-v5.html" class="d-block"><img src="../../assets/img/120x180/img3.jpg" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image" alt="image-description"></a>
                                                </div>
                                                <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                                    <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="..shop/single-product-v5.html">Paperback</a></div>
                                                    <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="..shop/single-product-v5.html">Think Like a Monk: Train Your Mind for Peace and Purpose Everyday</a></h2>
                                                    <div class="font-size-2  mb-1 text-truncate"><a href="../others/Shops-single.html" class="text-gray-700">Jay Shetty</a></div>
                                                    <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                                    </div>
                                                </div>
                                                <div class="product__hover d-flex align-items-center">
                                                    <a href="../shop/single-product-v5.html" class="text-uppercase text-dark h-dark font-weight-medium mr-auto" tabindex="0">
                                                        <span class="product__add-to-cart">ADD TO CART</span>
                                                        <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                                    </a>
                                                    <a href="../shop/single-product-v5.html" class="mr-1 h-p-bg" tabindex="0">
                                                        <i class="flaticon-switch"></i>
                                                    </a>
                                                    <a href="../shop/single-product-v5.html" class="h-p-bg" tabindex="0">
                                                        <i class="flaticon-heart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="d-md-none d-wd-block product product__no-border col border-0 mb-2 mb-lg-0">
                                        <div class="product__inner overflow-hidden p-3 p-md-4d875 mx-1 bg-white">
                                            <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                                <div class="woocommerce-loop-product__thumbnail">
                                                    <a href="..shop/single-product-v5.html" class="d-block"><img src="../../assets/img/120x180/img4.jpg" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image" alt="image-description"></a>
                                                </div>
                                                <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                                    <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="..shop/single-product-v5.html">Paperback</a></div>
                                                    <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="..shop/single-product-v5.html">Think Like a Monk: Train Your Mind for Peace and Purpose Everyday</a></h2>
                                                    <div class="font-size-2  mb-1 text-truncate"><a href="../others/Shops-single.html" class="text-gray-700">Jay Shetty</a></div>
                                                    <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                                    </div>
                                                </div>
                                                <div class="product__hover d-flex align-items-center">
                                                    <a href="../shop/single-product-v5.html" class="text-uppercase text-dark h-dark font-weight-medium mr-auto" tabindex="0">
                                                        <span class="product__add-to-cart">ADD TO CART</span>
                                                        <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                                    </a>
                                                    <a href="../shop/single-product-v5.html" class="mr-1 h-p-bg" tabindex="0">
                                                        <i class="flaticon-switch"></i>
                                                    </a>
                                                    <a href="../shop/single-product-v5.html" class="h-p-bg" tabindex="0">
                                                        <i class="flaticon-heart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container">
                <header class="mb-5">
                    <h2 class="font-size-7 mb-0">Shop's Books</h2>
                </header>
                <ul class="js-slick-carousel products list-unstyled my-0 border-right border-top border-left slick-initialized slick-slider" data-arrows-classes="d-none d-lg-block u-slick__arrow u-slick__arrow-centered--y" data-arrow-left-classes="fas flaticon-back u-slick__arrow-inner u-slick__arrow-inner--left ml-lg-n10" data-arrow-right-classes="fas flaticon-next u-slick__arrow-inner u-slick__arrow-inner--right mr-lg-n10" data-slides-show="4" data-responsive="[{
                           &quot;breakpoint&quot;: 992,
                           &quot;settings&quot;: {
                             &quot;slidesToShow&quot;: 2
                           }
                        }, {
                           &quot;breakpoint&quot;: 768,
                           &quot;settings&quot;: {
                             &quot;slidesToShow&quot;: 1
                           }
                        }, {
                           &quot;breakpoint&quot;: 554,
                           &quot;settings&quot;: {
                             &quot;slidesToShow&quot;: 1
                           }
                        }]">
                    <div class="js-prev d-none d-lg-block u-slick__arrow u-slick__arrow-centered--y fas flaticon-back u-slick__arrow-inner u-slick__arrow-inner--left ml-lg-n10 slick-arrow slick-disabled" aria-disabled="true" style=""></div>
                    <div class="slick-list draggable">
                        <div class="slick-track" style="opacity: 1; width: 2800px; transform: translate3d(0px, 0px, 0px);">
                            <li class="product slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 350px; height: auto;" tabindex="0">
                                <div class="product__inner overflow-hidden p-4d875">
                                    <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="../shop/single-product-v5.html" class="d-block" tabindex="0"><img src="../../assets/img/150x226/img1.jpg" class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="../shop/single-product-v5.html" tabindex="0">Paperback</a></div>
                                            <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="../shop/single-product-v5.html" tabindex="0">Think Like a Monk: Train Your Mind for Peace and Purpose Everyday</a></h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a href="../others/Shops-single.html" class="text-gray-700" tabindex="0">Jay Shetty</a></div>
                                            <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                            </div>
                                            <div class="product__rating d-flex align-items-center font-size-2">
                                                <div class="text-yellow-darker mr-2">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star"></small>
                                                    <small class="far fa-star"></small>
                                                </div>
                                                <div class="">(3,714)</div>
                                            </div>
                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="../shop/single-product-v5.html" class="text-uppercase text-dark h-dark font-weight-medium mr-auto" tabindex="0">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                            </a>
                                            <a href="../shop/single-product-v5.html" class="mr-1 h-p-bg border-0 btn btn-outline-primary" tabindex="0">
                                                <i class="flaticon-switch"></i>
                                            </a>
                                            <a href="../shop/single-product-v5.html" class="h-p-bg border-0 btn btn-outline-primary" tabindex="0">
                                                <i class="flaticon-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product slick-slide slick-active" data-slick-index="1" aria-hidden="false" style="width: 350px; height: auto;" tabindex="0">
                                <div class="product__inner overflow-hidden p-4d875">
                                    <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="../shop/single-product-v5.html" class="d-block" tabindex="0"><img src="../../assets/img/150x226/img2.jpg" class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="../shop/single-product-v5.html" tabindex="0">Kindle Edition</a></div>
                                            <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="../shop/single-product-v5.html" tabindex="0">The Overdue Life of Amy Byler</a></h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a href="../others/Shops-single.html" class="text-gray-700" tabindex="0">Kelly Harms</a></div>
                                            <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                            </div>
                                            <div class="product__rating d-flex align-items-center font-size-2">
                                                <div class="text-yellow-darker mr-2">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star"></small>
                                                    <small class="far fa-star"></small>
                                                </div>
                                                <div class="">(3,714)</div>
                                            </div>
                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="../shop/single-product-v5.html" class="text-uppercase text-dark h-dark font-weight-medium mr-auto" tabindex="0">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                            </a>
                                            <a href="../shop/single-product-v5.html" class="mr-1 h-p-bg border-0 btn btn-outline-primary" tabindex="0">
                                                <i class="flaticon-switch"></i>
                                            </a>
                                            <a href="../shop/single-product-v5.html" class="h-p-bg border-0 btn btn-outline-primary" tabindex="0">
                                                <i class="flaticon-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product slick-slide slick-active" data-slick-index="2" aria-hidden="false" style="width: 350px; height: auto;" tabindex="0">
                                <div class="product__inner overflow-hidden p-4d875">
                                    <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="../shop/single-product-v5.html" class="d-block" tabindex="0"><img src="../../assets/img/150x226/img3.jpg" class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="../shop/single-product-v5.html" tabindex="0">Paperback</a></div>
                                            <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="../shop/single-product-v5.html" tabindex="0">Think Like a Monk: Train Your Mind for Peace and Purpose Everyday</a></h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a href="../others/Shops-single.html" class="text-gray-700" tabindex="0">Jay Shetty</a></div>
                                            <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                            </div>
                                            <div class="product__rating d-flex align-items-center font-size-2">
                                                <div class="text-yellow-darker mr-2">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star"></small>
                                                    <small class="far fa-star"></small>
                                                </div>
                                                <div class="">(3,714)</div>
                                            </div>
                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="../shop/single-product-v5.html" class="text-uppercase text-dark h-dark font-weight-medium mr-auto" tabindex="0">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                            </a>
                                            <a href="../shop/single-product-v5.html" class="mr-1 h-p-bg border-0 btn btn-outline-primary" tabindex="0">
                                                <i class="flaticon-switch"></i>
                                            </a>
                                            <a href="../shop/single-product-v5.html" class="h-p-bg border-0 btn btn-outline-primary" tabindex="0">
                                                <i class="flaticon-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product slick-slide slick-active" data-slick-index="3" aria-hidden="false" style="width: 350px; height: auto;" tabindex="0">
                                <div class="product__inner overflow-hidden p-4d875">
                                    <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="../shop/single-product-v5.html" class="d-block" tabindex="0"><img src="../../assets/img/150x226/img4.jpg" class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="../shop/single-product-v5.html" tabindex="0">Kindle Edition</a></div>
                                            <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="../shop/single-product-v5.html" tabindex="0">The Overdue Life of Amy Byler</a></h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a href="../others/Shops-single.html" class="text-gray-700" tabindex="0">Kelly Harms</a></div>
                                            <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                            </div>
                                            <div class="product__rating d-flex align-items-center font-size-2">
                                                <div class="text-yellow-darker mr-2">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star"></small>
                                                    <small class="far fa-star"></small>
                                                </div>
                                                <div class="">(3,714)</div>
                                            </div>
                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="../shop/single-product-v5.html" class="text-uppercase text-dark h-dark font-weight-medium mr-auto" tabindex="0">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                            </a>
                                            <a href="../shop/single-product-v5.html" class="mr-1 h-p-bg border-0 btn btn-outline-primary" tabindex="0">
                                                <i class="flaticon-switch"></i>
                                            </a>
                                            <a href="../shop/single-product-v5.html" class="h-p-bg border-0 btn btn-outline-primary" tabindex="0">
                                                <i class="flaticon-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product slick-slide" data-slick-index="4" aria-hidden="true" style="width: 350px; height: auto;" tabindex="-1">
                                <div class="product__inner overflow-hidden p-4d875">
                                    <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="../shop/single-product-v5.html" class="d-block" tabindex="-1"><img src="../../assets/img/150x226/img5.jpg" class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="../shop/single-product-v5.html" tabindex="-1">Paperback</a></div>
                                            <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="../shop/single-product-v5.html" tabindex="-1">Think Like a Monk: Train Your Mind for Peace and Purpose Everyday</a></h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a href="../others/Shops-single.html" class="text-gray-700" tabindex="-1">Jay Shetty</a></div>
                                            <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                            </div>
                                            <div class="product__rating d-flex align-items-center font-size-2">
                                                <div class="text-yellow-darker mr-2">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star"></small>
                                                    <small class="far fa-star"></small>
                                                </div>
                                                <div class="">(3,714)</div>
                                            </div>
                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="../shop/single-product-v5.html" class="text-uppercase text-dark h-dark font-weight-medium mr-auto" tabindex="-1">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                            </a>
                                            <a href="../shop/single-product-v5.html" class="mr-1 h-p-bg border-0 btn btn-outline-primary" tabindex="-1">
                                                <i class="flaticon-switch"></i>
                                            </a>
                                            <a href="../shop/single-product-v5.html" class="h-p-bg border-0 btn btn-outline-primary" tabindex="-1">
                                                <i class="flaticon-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product slick-slide" data-slick-index="5" aria-hidden="true" style="width: 350px; height: auto;" tabindex="-1">
                                <div class="product__inner overflow-hidden p-4d875">
                                    <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="../shop/single-product-v5.html" class="d-block" tabindex="-1"><img src="../../assets/img/150x226/img6.jpg" class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="../shop/single-product-v5.html" tabindex="-1">Kindle Edition</a></div>
                                            <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="../shop/single-product-v5.html" tabindex="-1">The Overdue Life of Amy Byler</a></h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a href="../others/Shops-single.html" class="text-gray-700" tabindex="-1">Kelly Harms</a></div>
                                            <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                            </div>
                                            <div class="product__rating d-flex align-items-center font-size-2">
                                                <div class="text-yellow-darker mr-2">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star"></small>
                                                    <small class="far fa-star"></small>
                                                </div>
                                                <div class="">(3,714)</div>
                                            </div>
                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="../shop/single-product-v5.html" class="text-uppercase text-dark h-dark font-weight-medium mr-auto" tabindex="-1">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                            </a>
                                            <a href="../shop/single-product-v5.html" class="mr-1 h-p-bg border-0 btn btn-outline-primary" tabindex="-1">
                                                <i class="flaticon-switch"></i>
                                            </a>
                                            <a href="../shop/single-product-v5.html" class="h-p-bg border-0 btn btn-outline-primary" tabindex="-1">
                                                <i class="flaticon-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product slick-slide" data-slick-index="6" aria-hidden="true" style="width: 350px; height: auto;" tabindex="-1">
                                <div class="product__inner overflow-hidden p-4d875">
                                    <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="../shop/single-product-v5.html" class="d-block" tabindex="-1"><img src="../../assets/img/150x226/img7.jpg" class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="../shop/single-product-v5.html" tabindex="-1">Paperback</a></div>
                                            <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="../shop/single-product-v5.html" tabindex="-1">Think Like a Monk: Train Your Mind for Peace and Purpose Everyday</a></h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a href="../others/Shops-single.html" class="text-gray-700" tabindex="-1">Jay Shetty</a></div>
                                            <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                            </div>
                                            <div class="product__rating d-flex align-items-center font-size-2">
                                                <div class="text-yellow-darker mr-2">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star"></small>
                                                    <small class="far fa-star"></small>
                                                </div>
                                                <div class="">(3,714)</div>
                                            </div>
                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="../shop/single-product-v5.html" class="text-uppercase text-dark h-dark font-weight-medium mr-auto" tabindex="-1">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                            </a>
                                            <a href="../shop/single-product-v5.html" class="mr-1 h-p-bg border-0 btn btn-outline-primary" tabindex="-1">
                                                <i class="flaticon-switch"></i>
                                            </a>
                                            <a href="../shop/single-product-v5.html" class="h-p-bg border-0 btn btn-outline-primary" tabindex="-1">
                                                <i class="flaticon-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product slick-slide" data-slick-index="7" aria-hidden="true" style="width: 350px; height: auto;" tabindex="-1">
                                <div class="product__inner overflow-hidden p-4d875">
                                    <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="../shop/single-product-v5.html" class="d-block" tabindex="-1"><img src="../../assets/img/150x226/img8.jpg" class="d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="../shop/single-product-v5.html" tabindex="-1">Kindle Edition</a></div>
                                            <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="../shop/single-product-v5.html" tabindex="-1">The Overdue Life of Amy Byler</a></h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a href="../others/Shops-single.html" class="text-gray-700" tabindex="-1">Kelly Harms</a></div>
                                            <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                            </div>
                                            <div class="product__rating d-flex align-items-center font-size-2">
                                                <div class="text-yellow-darker mr-2">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star"></small>
                                                    <small class="far fa-star"></small>
                                                </div>
                                                <div class="">(3,714)</div>
                                            </div>
                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="../shop/single-product-v5.html" class="text-uppercase text-dark h-dark font-weight-medium mr-auto" tabindex="-1">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                            </a>
                                            <a href="../shop/single-product-v5.html" class="mr-1 h-p-bg border-0 btn btn-outline-primary" tabindex="-1">
                                                <i class="flaticon-switch"></i>
                                            </a>
                                            <a href="../shop/single-product-v5.html" class="h-p-bg border-0 btn btn-outline-primary" tabindex="-1">
                                                <i class="flaticon-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </div>
                    </div>






                    <div class="js-next d-none d-lg-block u-slick__arrow u-slick__arrow-centered--y fas flaticon-next u-slick__arrow-inner u-slick__arrow-inner--right mr-lg-n10 slick-arrow" style="" aria-disabled="false"></div>
                </ul>
            </div>
        </div>
    </div>
</main>

<div>
    <h6 class="font-weight-medium font-size-10 mb-3 pb-xl-1">Get In Touch</h6>
    <form method="post" action="/shop/contact/{{$shopInfo->shop_id}}" class="js-validate" novalidate="novalidate">
        @csrf
        <div class="row">

            <div class="col-sm-12 mb-5">
                <div class="js-form-message">
                    <label for="exampleFormControlInput3">Subject</label>
                    <input id="exampleFormControlInput3" type="text" class="form-control rounded-0" name="subject" required="">
                </div>
            </div>
            <div class="col-sm-12 mb-5">
                <div class="js-form-message">
                    <div class="input-group flex-column">
                        <label for="exampleFormControlInput4">Details please!</label>
                        <textarea id="exampleFormControlInput4" class="form-control rounded-0 pl-3 font-size-2 placeholder-color-3" rows="6" cols="77" name="message" placeholder="What did you like or dislike? What should other shoppers know before buying?" aria-label="Hi there, I would like to ..." required="" data-msg="Please enter a reason." data-error-class="u-has-error" data-success-class="u-has-success"></textarea>
                    </div>
                </div>
            </div>

            <div class="col d-flex justify-content-lg-start">
                <button type="submit" class="btn btn-wide btn-dark text-white rounded-0 transition-3d-hover height-60">Sumbit Message</button>
            </div>
        </div>
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
</div>
@endsection