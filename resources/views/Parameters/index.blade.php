@extends('layouts.main')
@section('content')
    <div class="row justify-content-center" style="padding: 1% 10%">

        @session('success')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endsession

        <table class="table table-hover text-center">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Parameter</th>
                <th scope="col">Update</th>
                <th scope="col">Temporarily Delete</th>
                <th scope="col">Permanently Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($params as $i=>$param)
            <tr>
                <th scope="row">{{++$i}}</th>
                <td>{{$param->parameter}}</td>
                <td>
                    <form action="{{route('param.edit', ['param' => $param->id])}}" method="GET">
                        @csrf
                        <input type="submit" class="btn btn-primary" value="Update">
                    </form>
                </td>
                <td>
                    <form action="{{route('param.destroy', ['param' => $param->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-secondary" value="Delete">
                    </form>
                </td>
                <td>
                    <form action="{{route('param.forceDelete', ['param' => $param->id])}}" method="POST">
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
