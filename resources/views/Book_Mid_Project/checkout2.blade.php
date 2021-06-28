@extends('Book_Mid_Project._layout_2')
@section('content')

<div id="content" class="site-content bg-punch-light space-bottom-3">
    <div class="col-full container">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <article id="post-6" class="post-6 page type-page status-publish hentry">
                    <header class="entry-header space-top-2 space-bottom-1 mb-2">
                        <h4 class="entry-title font-size-7 text-center">Checkout</h4>
                    </header>

                    <div class="entry-content">
                        <div class="woocommerce">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <form name="checkout" method="post" class="checkout woocommerce-checkout row mt-8" enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                                <div class="col2-set col-md-6 col-lg-7 col-xl-8 mb-6 mb-md-0" id="customer_details">
                                    <div class="px-4 pt-5 bg-white border">
                                        <div class="woocommerce-billing-fields">
                                            <h3 class="mb-4 font-size-3">Select Address</h3>
                                            <div class="woocommerce-billing-fields__field-wrapper row">
                                                @foreach($allAddress as $address)
                                                <p class="col-lg-6 mb-4d75 form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
                                                <div class="col">
                                                    <div class="mb-6 mb-md-0">
                                                        <h6 class="font-weight-medium font-size-22 mb-3">Shipping Address
                                                        </h6>
                                                        <address class="d-flex flex-column mb-4">
                                                            <span class="text-gray-600 font-size-2">House No: {{$address->House_No}}</span>
                                                            <span class="text-gray-600 font-size-2">Road No: {{$address->Road_No}}</span>
                                                            <span class="text-gray-600 font-size-2">Area: {{$address->Area}}</span>
                                                            <span class="text-gray-600 font-size-2">{{$address->City}}, {{$address->Postal_Code}}</span>
                                                            <span class="text-gray-600 font-size-2">{{$address->Country}}</span>
                                                            <span class="text-gray-600 font-size-2">Mobile Number: {{$address->Mobile_Number}}</span>
                                                        </address>
                                                    </div>
                                                </div>
                                                <label for="billing_first_name" class="form-label">Address:
                                                    <abbr class="required" title="required">*</abbr></label>
                                                <input type="radio" class="input-text form-control" name="address" id="billing_first_name" placeholder="" value="{{$address->address_id}}" autocomplete="given-name" autofocus="autofocus">
                                                </p>
                                                @endforeach

                                                <p class="col-12 mb-3 form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50">
                                                    <label for="billing_address_1" class="form-label">Payment Method
                                                        <abbr class="required" title="required">*</abbr></label>
                                                    <select name="payment_method" id="payment_method" class="form-control country_to_state country_select  select2-hidden-accessible" autocomplete="country" tabindex="-1" aria-hidden="true">
                                                        <option value="">Select a Payment Method</option>
                                                        <option value="Card">Card</option>
                                                        <option value="Mobile Banking">Mobile Banking</option>
                                                    </select>
                                                </p>


                                                <div id="card_payment_details" class="d-none">
                                                    <p class="col-12 mb-4d75 form-row form-row-wide" id="billing_company_field" data-priority="30">
                                                        <label for="billing_company" class="form-label">Card Number</label>
                                                        <input type="text" class="input-text form-control" name="Card_Number" id="billing_company" placeholder="" value="{{Request::old('Card_Number')}}" autocomplete="organization">
                                                    </p>
                                                    <p class="col-12 mb-4d75 form-row form-row-wide" id="billing_company_field" data-priority="30">
                                                        <label for="billing_company" class="form-label">MM/YY</label>
                                                        <input type="text" class="input-text form-control" name="MM/YY" id="billing_company" placeholder="Example 11/2022" value="{{Request::old('MM/YY')}}" autocomplete="organization">
                                                    </p>
                                                    <p class="col-12 mb-4d75 form-row form-row-wide" id="billing_company_field" data-priority="30">
                                                        <label for="billing_company" class="form-label">CVC/CVV</label>
                                                        <input type="text" class="input-text form-control" name="CVC/CVV" id="billing_company" placeholder="" value="" autocomplete="organization">
                                                    </p>
                                                    <p class="col-12 mb-4d75 form-row form-row-wide" id="billing_company_field" data-priority="30">
                                                        <label for="billing_company" class="form-label">Card_Holder_Name</label>
                                                        <input type="text" class="input-text form-control" name="Card_Holder_Name" id="billing_company" placeholder="" value="" autocomplete="organization">
                                                    </p>
                                                    <p class="col-12 mb-4d75 form-row form-row-wide" id="billing_company_field" data-priority="30">
                                                        <label for="billing_company" class="form-label">PIN (info will not be saved)</label>
                                                        <input type="password" class="input-text form-control" name="Card_PIN" id="billing_company" placeholder="" value="" autocomplete="organization">
                                                    </p>
                                                </div>

                                                <div id="mobile_banking_details" class="d-none">
                                                    <p class="col-12 mb-3 form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50">
                                                        <label for="billing_address_1" class="form-label">Mobile Bank Name
                                                            <abbr class="required" title="required">*</abbr></label>
                                                        <select name="which_mobile_bank" id="which_mobile_bank" class="form-control country_to_state country_select  select2-hidden-accessible" autocomplete="country" tabindex="-1" aria-hidden="true">
                                                            <option value="">Select a Mobile Bank</option>
                                                            <option value="Bkash">Bkash</option>
                                                            <option value="Rocket">Rocket</option>
                                                            <option value="Nagad">Nagad</option>
                                                        </select>
                                                    </p>
                                                    <p class="col-12 mb-4d75 form-row form-row-wide" id="billing_company_field" data-priority="30">
                                                        <label for="billing_company" class="form-label">Mobile Number</label>
                                                        <input type="number" class="input-text form-control" name="mobile_bank_number" id="billing_company" placeholder="" value="" autocomplete="mobile number">
                                                    </p>
                                                    <p class="col-12 mb-4d75 form-row form-row-wide" id="billing_company_field" data-priority="30">
                                                        <label for="billing_company" class="form-label">PIN (info will not be saved)</label>
                                                        <input type="password" class="input-text form-control" name="Mobile_Banking_PIN" id="billing_company" placeholder="" value="" autocomplete="organization">
                                                    </p>
                                                </div>

                                                <script>
                                                    $("#payment_method").on("change", function() {
                                                        var s = $("#payment_method").val();
                                                        if (s == "Card") {
                                                            $("#card_payment_details").removeClass('d-none');
                                                            $("#mobile_banking_details").addClass('d-none');
                                                        } else if (s == "Mobile Banking") {
                                                            $("#card_payment_details").addClass('d-none');
                                                            $("#mobile_banking_details").removeClass('d-none');
                                                        } else {
                                                            $("#card_payment_details").addClass('d-none');
                                                            $("#mobile_banking_details").addClass('d-none');
                                                        }
                                                        console.log($(this).val());
                                                    });
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 pt-5 bg-white border border-top-0 mt-n-one">
                                        <div class="woocommerce-additional-fields">
                                            <h3 class="mb-4 font-size-3">Additional information</h3>
                                            <div class="woocommerce-additional-fields__field-wrapper">
                                                <p class="col-12 mb-4d75 px-0 form-row notes" id="order_comments_field" data-priority="">
                                                    <label for="order_comments" class="form-label">Order notes
                                                        (optional)</label>
                                                    <textarea name="order_comments" class="input-text form-control" id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="8" cols="5"></textarea>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3 id="order_review_heading" class="d-none">Your order</h3>
                                <div id="order_review" class="col-md-6 col-lg-5 col-xl-4 woocommerce-checkout-review-order">
                                    <div id="checkoutAccordion" class="border border-gray-900 bg-white mb-5">
                                        <!-- <div class="p-4d875 border">
                                            <div id="checkoutHeadingOnee" class="checkout-head">
                                                <a href="#" class="text-dark d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#checkoutCollapseOnee" aria-expanded="true" aria-controls="checkoutCollapseOnee">
                                                    <h3 class="checkout-title mb-0 font-weight-medium font-size-3">
                                                        Your order</h3>
                                                    <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                                    </svg>
                                                    <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div id="checkoutCollapseOnee" class="mt-4 checkout-content collapse show" aria-labelledby="checkoutHeadingOnee" data-parent="#checkoutAccordion">
                                                <table class="shop_table woocommerce-checkout-review-order-table">
                                                    <thead class="d-none">
                                                        <tr>
                                                            <th class="product-name">Product</th>
                                                            <th class="product-total">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="cart_item">
                                                            <td class="product-name">
                                                                Touchscreen MP3 Player&nbsp; <strong class="product-quantity">× 1</strong>
                                                            </td>
                                                            <td class="product-total">
                                                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">£</span>79.99</span>
                                                            </td>
                                                        </tr>
                                                        <tr class="cart_item">
                                                            <td class="product-name">
                                                                Happy Ninja&nbsp; <strong class="product-quantity">×
                                                                    1</strong>
                                                            </td>
                                                            <td class="product-total">
                                                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">£</span>18.00</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot class="d-none">
                                                        <tr class="cart-subtotal">
                                                            <th>Subtotal</th>
                                                            <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">£</span>97.99</span>
                                                            </td>
                                                        </tr>
                                                        <tr class="order-total">
                                                            <th>Total</th>
                                                            <td><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">£</span>97.99</span></strong>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div> -->
                                        <div class="p-4d875 border">
                                            <div id="checkoutHeadingOne" class="checkout-head">
                                                <a href="#" class="text-dark d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#checkoutCollapseOne" aria-expanded="true" aria-controls="checkoutCollapseOne">
                                                    <h3 class="checkout-title mb-0 font-weight-medium font-size-3">
                                                        Cart Totals</h3>
                                                    <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                                    </svg>
                                                    <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div id="checkoutCollapseOne" class="mt-4 checkout-content collapse show" aria-labelledby="checkoutHeadingOne" data-parent="#checkoutAccordion">
                                                <table class="shop_table shop_table_responsive">
                                                    <tbody>
                                                        <tr class="checkout-subtotal">
                                                            <th>Subtotal</th>
                                                            <td data-title="Subtotal"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Taka</span> {{$totalAmountToPay}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr class="order-shipping">
                                                            <th>Shipping</th>
                                                            <td data-title="Shipping">Free Shipping</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- <div class="p-4d875 border">
                                            <div id="checkoutHeadingTwo" class="checkout-head">
                                                <a href="#" class="text-dark d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#checkoutCollapseTwo" aria-expanded="false" aria-controls="checkoutCollapseTwo">
                                                    <h3 class="checkout-title mb-0 font-weight-medium font-size-3">
                                                        Shipping</h3>
                                                    <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                                    </svg>
                                                    <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div id="checkoutCollapseTwo" class="mt-4 checkout-content collapse" aria-labelledby="checkoutHeadingTwo" data-parent="#checkoutAccordion">

                                                <ul id="shipping_method">
                                                    <li>
                                                        <input type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_flat_rate1" value="flat_rate:1" class="shipping_method">
                                                        <label for="shipping_method_0_flat_rate1">Free
                                                            shipping</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_flat_rate2" value="flat_rate:2" class="shipping_method" checked="checked">
                                                        <label for="shipping_method_0_flat_rate2">Flat rate: <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>15</span></label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_flat_rate3" value="flat_rate:2" class="shipping_method" checked="checked">
                                                        <label for="shipping_method_0_flat_rate3">Local pickup::
                                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>8</span></label>
                                                    </li>
                                                </ul>

                                                <span class="font-size-2">Shipping to Turkey.</span><a href="#" class="font-weight-medium h-primary ml-3 font-size-2">Change
                                                    Address</a>
                                            </div>
                                        </div>
                                        <div class="p-4d875 border">
                                            <div id="checkoutHeadingThree" class="checkout-head">
                                                <a href="#" class="text-dark d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#checkoutCollapseThree" aria-expanded="true" aria-controls="checkoutCollapseThree">
                                                    <h3 class="checkout-title mb-0 font-weight-medium font-size-3">
                                                        Coupon</h3>
                                                    <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                                    </svg>
                                                    <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div id="checkoutCollapseThree" class="mt-4 checkout-content collapse show" aria-labelledby="checkoutHeadingThree" data-parent="#checkoutAccordion">
                                                <div class="coupon">
                                                    <label for="coupon_code">Coupon:</label>
                                                    <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code" autocomplete="off">
                                                    <input type="submit" class="button" name="apply_coupon" value="Apply coupon">
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- <div class="p-4d875 border">
                                            <table class="shop_table shop_table_responsive">
                                                <tbody>
                                                    <tr class="order-total">
                                                        <th>Total</th>
                                                        <td data-title="Total"><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">£</span>97.99</span></strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> -->
                                        <!-- <div class="p-4d875 border">
                                            <div id="checkoutHeadingThreee" class="checkout-head">
                                                <a href="#" class="text-dark d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#checkoutCollapseThreee" aria-expanded="true" aria-controls="checkoutCollapseThreee">
                                                    <h3 class="checkout-title mb-0 font-weight-medium font-size-3">
                                                        Payment</h3>
                                                    <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                                    </svg>
                                                    <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div id="checkoutCollapseThreee" class="mt-4 checkout-content collapse show" aria-labelledby="checkoutHeadingThreee" data-parent="#checkoutAccordion">
                                                <div id="payment" class="woocommerce-checkout-payment">
                                                    <ul class="wc_payment_methods payment_methods methods">
                                                        <li class="wc_payment_method payment_method_bacs">
                                                            <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bacs" data-order_button_text="">
                                                            <label for="payment_method_bacs">Direct bank transfer
                                                            </label>
                                                            <div class="payment_box payment_method_bacs" style="display: block;">
                                                                <p>Make your payment directly into our bank account.
                                                                    Please use your Order ID as the payment
                                                                    reference. Your order won’t be shipped until the
                                                                    funds have cleared in our account.</p>
                                                            </div>
                                                        </li>
                                                        <li class="wc_payment_method payment_method_cheque">
                                                            <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="cheque" data-order_button_text="">
                                                            <label for="payment_method_cheque">Check payments
                                                            </label>
                                                            <div class="payment_box payment_method_cheque" style="display: block;">
                                                                <p>Please send a check to Store Name, Store Street,
                                                                    Store Town, Store State / County, Store
                                                                    Postcode.</p>
                                                            </div>
                                                        </li>
                                                        <li class="wc_payment_method payment_method_cod">
                                                            <input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="cod" checked="checked" data-order_button_text="">
                                                            <label for="payment_method_cod">Cash on delivery
                                                            </label>
                                                            <div class="payment_box payment_method_cod" style="display: block;">
                                                                <p>Pay with cash upon delivery.</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="form-row place-order">
                                        <input type="submit" class="button alt btn btn-dark btn-block rounded-0 py-4" value="Place order" />
                                        <input type="hidden" id="_wpnonce" name="_wpnonce" value="926470d564"><input type="hidden" name="_wp_http_referer" value="/storefront/?wc-ajax=update_order_review">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </article>

            </main>

        </div>

    </div>

</div>
@endsection