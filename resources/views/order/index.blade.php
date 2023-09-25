@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                {{-- <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Orders</li>
                    </ol>
                </nav> --}}
                <div class="card ">
                    <div class="card-header">Orders
                        <a style="float:right;" href=""><button class="bnt btn-secondary btn-sm" style="margin-left: 5px;">View Pizza</button></a>
                        <a style="float:right;" href=""><button class="bnt btn-secondary btn-sm">Add new Pizza</button></a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">User</th>
                                    <th scope="col">Phone/Email</th>
                                    <th scope="col">Date/Time</th>
                                    <th scope="col">Pizza</th>
                                    <th scope="col">S. pizza</th>
                                    <th scope="col">M. pizza</th>
                                    <th scope="col">L. pizza</th>
                                    <th scope="col">Total($)</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Accept</th>
                                    <th scope="col">Reject</th>
                                    <th scope="col">Order<br>Completed</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->user->email }}</td>
                                    <td>{{ $order->date }}/{{ $order->time }}</td>
                                    <td>{{ $order->pizza->name }}</td>
                                    <td>{{ $order->small_pizza }}</td>
                                    <td>{{ $order->medium_pizza }}</td>
                                    <td>{{ $order->large_pizza }}</td>
                                    <td></td>
                                    <td> {{ $order->description }}</td>
                                    <td>{{ $order->status}} </td>
                                    <form action="" method="post">@csrf
                                        <td>
                                            <input name="status" type="submit" value="accepted"
                                                class="btn btn-primary btn-sm">
                                        </td>
                                        <td>
                                            <input name="status" type="submit" value="rejected"
                                                class="btn btn-danger btn-sm">
                                        </td>
                                        <td>
                                            <input name="status" type="submit" value="completed"
                                                class="btn btn-success btn-sm">
                                        </td>
                                    </form>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection