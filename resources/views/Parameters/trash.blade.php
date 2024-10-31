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
                {{--                search input--}}
                <input type="text" id="search" onkeyup="search()" class="form-control mb-3" placeholder="Search">

            </tr>

            {{--            Data--}}
            <tr>
                <th scope="col">#</th>
                <th scope="col">Parameter</th>
                <th scope="col">Restore</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody id="data">
            @foreach($params as $i=>$param)
            <tr>
                <th scope="row">{{++$i}}</th>
                <td id="parameter">{{$param->parameter}}</td>
                <td>
                    <form action="{{route('param.restore', ['param' => $param->id])}}" method="POST">
                        @csrf
                        <input type="submit" class="btn btn-primary" value="Restore">
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


@push('js')
    <script>

        function search() {
            const search = document.getElementById('search').value;
            const rows = document.querySelectorAll('#data tr');

            rows.forEach(row=>{
                const data = row.querySelector(`[id="parameter"]`);
                if (data){
                    const cellText = data.textContent.toLowerCase();
                    if(cellText.includes(search.toLowerCase())){
                        row.style.display = '';
                    }else {
                        row.style.display = 'none';
                    }
                }
            })
        }

    </script>
@endpush

