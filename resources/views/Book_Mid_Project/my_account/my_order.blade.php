@extends('Book_Mid_Project.my-account')
@section('my_order')

<div class="pt-5 pl-md-5 pt-lg-8 pl-lg-9 space-bottom-lg-2 mb-lg-4">
    <h6 class="font-weight-medium font-size-7 ml-lg-1 mb-lg-8 pb-xl-1">orders</h6>
    <table class="table">
        <thead>
            <tr class="border">
                <th scope="col" class="py-3 border-bottom-0 font-weight-medium pl-3 pl-lg-5">#Order Id</th>
                <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Date</th>
                <th scope="col" class="py-3 border-bottom-0 font-weight-medium"> Payment Staus</th>
                <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Total (Taka)</th>
                <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr class="border">
                <th class="pl-3 pl-md-5 font-weight-normal align-middle py-6">{{$order->order_id}}</th>
                <td class="align-middle py-5">{{$order->order_created}}</td>
                <td class="align-middle py-5">Completed</td>
                <td class="align-middle py-5">
                    <span class="text-primary">{{$order->amount}}</span> for all items
                </td>
                <td class="align-middle py-5">
                    <div class="d-flex justify-content-center">
                        <a href="{{url('/user/order/')}}/{{$order->order_id}}" class="btn btn-dark rounded-0 btn-wide font-weight-medium">View</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection