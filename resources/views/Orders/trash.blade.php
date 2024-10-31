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
            {{--            Search --}}
            <tr>
                {{--                search options--}}
                <div class="mb-3 row">
                    <label for="searchby" class="col-sm-2 col-form-label">Search By</label>
                    <div class="col-sm-10">
                        <select class="form-select mb-2" onchange="search()" name="searchby" id="searchby">
                            <option value="Production Order">Production Order#</option>
                            <option value="Work Order">Work Order#</option>
                            <option value="Date">Date</option>
                            <option value="Customer">Customer</option>
                            <option value="Project">Project</option>
                            <option value="Shape">Shape</option>
                            <option value="Quality Inspector">Quality Inspector</option>
                            <option value="Approved By">Approved By</option>
                        </select>
                    </div>
                </div>
                {{--                search input--}}
                <input type="text" id="search" onkeyup="search()" class="form-control mb-3" placeholder="Search">

            </tr>

            {{--            Data--}}
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
            <tbody id="data">
            @foreach($orders as $i=>$order)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td id="Production Order">{{$order->production_order}}</td>
                    <td id="Work Order">{{$order->work_order}}</td>
                    <td id="Date">{{$order->date}}</td>
                    <td id="Customer">{{$order->customer}}</td>
                    <td id="Project">{{$order->project}}</td>
                    <td id="Shape">{{$order->shape}}</td>
                    <td id="Quality Inspector">{{$order->quality_inspector}}</td>
                    <td id="Approved By">{{$order->approved_by}}</td>
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

@push('js')
    <script>

        function search() {
            const search = document.getElementById('search').value;
            const searchBy = document.getElementById('searchby').value;
            const rows = document.querySelectorAll('#data tr');

            rows.forEach(row => {
                const data = row.querySelector(`td[id="${searchBy}"]`);
                if (data) {
                    const cellText = data.textContent.toLowerCase();
                    if (cellText.includes(search)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            })
        }

    </script>
@endpush
