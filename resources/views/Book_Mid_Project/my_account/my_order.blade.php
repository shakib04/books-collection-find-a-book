@extends('Book_Mid_Project.my-account')
@section('my_order')
<div class="tab-pane fade" id="pills-two-example1" role="tabpanel" aria-labelledby="pills-two-example1-tab">
    <div class="pt-5 pl-md-5 pt-lg-8 pl-lg-9 space-bottom-lg-2 mb-lg-4">
        <h6 class="font-weight-medium font-size-7 ml-lg-1 mb-lg-8 pb-xl-1">orders</h6>
        <table class="table">
            <thead>
                <tr class="border">
                    <th scope="col" class="py-3 border-bottom-0 font-weight-medium pl-3 pl-lg-5">Order</th>
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
                            <a href="{{url('/user/order/orderId')}}" class="btn btn-dark rounded-0 btn-wide font-weight-medium">View</a>
                        </div>
                    </td>
                </tr>
                <tr class="border">
                    <th class="pl-3 pl-md-5 font-weight-normal align-middle py-6">#30785</th>
                    <td class="align-middle py-5">March 26, 2020</td>
                    <td class="align-middle py-5">On hold</td>
                    <td class="align-middle py-5">
                        <span class="text-primary">$1,855.00</span> for 5 items
                    </td>
                    <td class="align-middle py-5">
                        <div class="d-flex justify-content-center">
                            <a href="{{url('/user/order/orderId')}}" class="btn btn-dark rounded-0 btn-wide font-weight-medium">View</a>
                        </div>
                    </td>
                </tr>
                <tr class="border">
                    <th class="pl-3 pl-md-5 font-weight-normal align-middle py-6">#30785</th>
                    <td class="align-middle py-5">March 26, 2020</td>
                    <td class="align-middle py-5">On hold</td>
                    <td class="align-middle py-5">
                        <span class="text-primary">$1,855.00</span> for 5 items
                    </td>
                    <td class="align-middle py-5">
                        <div class="d-flex justify-content-center">
                            <a href="{{url('/user/order/orderId')}}" class="btn btn-dark rounded-0 btn-wide font-weight-medium">View</a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection