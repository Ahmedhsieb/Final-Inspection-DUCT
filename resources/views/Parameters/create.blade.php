@extends('layouts.main')
@section('content')
    <div class="row justify-content-center" style="padding: 5% 20%">
        <form action="/param" class="m-auto needs-validation" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" value="{{old('parameter')}}" name="parameter" placeholder="Parameter Name">
                @error('parameter')
                <div class="invalid-feedback" style="display: inline-block">
                    {{$message}}
                </div>
                @enderror
                <label for="floatingInput">Parameter Name</label>
            </div>
                <input type="submit" class="form-control btn btn-primary" value="Submit">
        </form>
    </div>
@endsection
