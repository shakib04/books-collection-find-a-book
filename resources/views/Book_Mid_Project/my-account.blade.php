@extends('Book_Mid_Project._layout_2')

@section('content')
<main id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-3 border-right">
                <h6 class="font-weight-medium font-size-7 pt-5 pt-lg-8  mb-5 mb-lg-7">My account</h6>
                <div class="tab-wrapper">
                    <ul class="my__account-nav nav flex-column mb-0" role="tablist" id="pills-tab">
                        <li class="nav-item mx-0">
                            <a class="nav-link d-flex align-items-center px-0 active" id="pills-one-example1-tab" data-toggle="" href="{{route('Dashboard')}}" role="tab" aria-controls="pills-one-example1" aria-selected="false">
                                <span class="font-weight-normal text-gray-600">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item mx-0">
                            <a class="nav-link d-flex align-items-center px-0" id="pills-two-example1-tab" data-toggle="" href="{{route('OrderList')}}" role="tab" aria-controls="pills-two-example1" aria-selected="false">
                                <span class="font-weight-normal text-gray-600">Orders</span>
                            </a>
                        </li>
                        <li class="nav-item mx-0">
                            <a class="nav-link d-flex align-items-center px-0" id="pills-three-example1-tab" data-toggle="pill" href="#pills-three-example1" role="tab" aria-controls="pills-three-example1" aria-selected="false">
                                <span class="font-weight-normal text-gray-600">Downloads</span>
                            </a>
                        </li>
                        <li class="nav-item mx-0">
                            <a class="nav-link d-flex align-items-center px-0" id="pills-four-example1-tab" data-toggle="" href="{{route('MyAddress')}}" role="tab" aria-controls="pills-four-example1" aria-selected="false">
                                <span class="font-weight-normal text-gray-600">Addresses</span>
                            </a>
                        </li>
                        <li class="nav-item mx-0">
                            <a class="nav-link d-flex align-items-center px-0" id="pills-five-example1-tab" data-toggle="" href="{{route('account_details')}}" role="tab" aria-controls="pills-five-example1" aria-selected="false">
                                <span class="font-weight-normal text-gray-600">Account details</span>
                            </a>
                        </li>
                        <li class="nav-item mx-0">
                            <a class="nav-link d-flex align-items-center px-0" id="pills-six-example1-tab" data-toggle="" href="{{route('WishList')}}" role="tab" aria-controls="pills-six-example1" aria-selected="false">
                                <span class="font-weight-normal text-gray-600">Wishlist</span>
                            </a>
                        </li>
                        <li class="nav-item mx-0">
                            <!-- logoutbtn -->
                            <a class="nav-link d-flex align-items-center px-0" href="{{url('/logout')}}">
                                <span class="font-weight-normal text-gray-600">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content" id="pills-tabContent">
                    @yield('dashboard')
                    @yield('my_order')
                    <div class="tab-pane fade" id="pills-three-example1" role="tabpanel" aria-labelledby="pills-three-example1-tab">
                        <div class="pt-5 pl-md-5 pt-lg-8 pl-lg-9 space-bottom-lg-2 mb-lg-4">
                            <h6 class="font-weight-medium font-size-7 ml-lg-1 mb-lg-8 pb-xl-1">Downloads</h6>
                            <table class="table">
                                <thead>
                                    <tr class="border">
                                        <th scope="col" class="py-3 border-bottom-0 font-weight-medium pl-3 pl-md-5">Order</th>
                                        <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Date</th>
                                        <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Staus</th>
                                        <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Total</th>
                                        <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border">
                                        <th class="pl-3 pl-md-5 font-weight-normal align-middle py-6">#30785</th>
                                        <td class="align-middle py-5">March 26, 2020</td>
                                        <td class="align-middle py-5">On hold</td>
                                        <td class="align-middle py-5">
                                            <span class="text-primary">$1,855.00</span> for 5 items
                                        </td>
                                        <td class="align-middle py-5">
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-dark rounded-0 btn-wide font-weight-medium">View
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @yield('Addresses')
                    @yield('Account_Details')
                    @yield('Wishlist')
                </div>
            </div>
        </div>
    </div>
</main>

@endsection