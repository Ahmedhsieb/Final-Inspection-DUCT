@extends('layouts.main')
@section('content')
    <div class="row justify-content-center" style="padding: 1% 10%">

        @session('success')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endsession

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Production Order#</th>
                <th scope="col">Work Order#</th>
                <th scope="col">Date</th>
                <th scope="col">Customer</th>
                <th scope="col">Project</th>
                <th scope="col">Shape</th>
                <th scope="col">Quality Inspector</th>
                <th scope="col">Approved By</th>
                <th scope="col">Restore</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $i=>$order)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td>{{$order->production_order}}</td>
                    <td>{{$order->work_order}}</td>
                    <td>{{$order->date}}</td>
                    <td>{{$order->customer}}</td>
                    <td>{{$order->project}}</td>
                    <td>{{$order->shape}}</td>
                    <td>{{$order->quality_inspector}}</td>
                    <td>{{$order->approved_by}}</td>
                    <td>
                        <form action="{{route('order.restore', ['order' => $order->id])}}" method="POST">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="Restore">
                        </form>
                    </td>
                    <td>
                        <form action="{{route('order.forceDelete', ['order' => $order->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
