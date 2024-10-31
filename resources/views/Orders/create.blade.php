@extends('layouts.main')
@section('content')

    <div class="row justify-content-center" style="padding: 1% 20%">
        <form action="/order" class="m-auto needs-validation" method="POST">
            @csrf
            {{--            Primary Info (Order#, Work ORder#, Date)--}}
            <div class="row">

                {{--                Work Order No--}}
                <div class="form-floating mb-3 col">
                    <input type="text" class="form-control" id="work_order" value="{{old('work order')}}"
                           name="work order" placeholder="Work Order No">
                    @error('work order')
                    <div class="invalid-feedback" style="display: inline-block">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="work_order">Work Order No</label>
                </div>

                {{--            Production Order ID--}}
                <div class="form-floating mb-3 col">
                    <input type="text" class="form-control" id="production_order" value="{{old('production_order')}}"
                           name="production_order"
                           placeholder="Production Order No">
                    @error('production_order')
                    <div class="invalid-feedback" style="display: inline-block">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="production_order">Production Order No</label>
                </div>

                {{--                Date--}}
                <div class="form-floating mb-3 col">
                    <input type="date" class="form-control" id="date" value="{{old('date')}}" name="date"
                           placeholder="Date">
                    @error('date')
                    <div class="invalid-feedback" style="display: inline-block">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="date">Date</label>
                </div>
            </div>

            {{--            Project And Customer Info--}}
            <div class="row">

                {{--                Customer--}}
                <div class="form-floating mb-3 col">
                    <input type="text" class="form-control" id="customer" value="{{old('customer')}}" name="customer"
                           placeholder="Customer">
                    @error('customer')
                    <div class="invalid-feedback" style="display: inline-block">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="customer">Customer</label>
                </div>

                {{--                Project--}}
                <div class="form-floating mb-3 col">
                    <input type="text" class="form-control" id="project" value="{{old('project')}}" name="project"
                           placeholder="Project">
                    @error('project')
                    <div class="invalid-feedback" style="display: inline-block">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="project">Project</label>
                </div>

                {{--                Shape--}}
                <div class="form-floating mb-3 col">
                    <input type="text" class="form-control" id="shape" value="{{old('shape')}}" name="shape"
                           placeholder="Shape">
                    @error('shape')
                    <div class="invalid-feedback" style="display: inline-block">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="shape">Shape</label>
                </div>
            </div>

            {{--            Parameters--}}
            <table class="table table-hover text-center">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Parameter</th>
                    <th scope="col">Check</th>
                    <th scope="col">Remarks</th>
                </tr>
                </thead>
                <tbody>
                @foreach($params as $i=>$param)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{$param->parameter}}</td>
                        <td>
                            <input type="checkbox" class="form-check-input border-3 border-primary-subtle"
                                   name="parameters[{{$param->id}}][check]">
                        </td>
                        <td>
                            <input type="text" class="form-control" id="floatingInput" value="{{old('remarks')}}"
                                   name="parameters[{{$param->id}}][remarks]">
                            <input type="hidden" name="parameters[{{$param->id}}][id]" value="{{$param->id}}">
                            @error('remarks')
                            <div class="invalid-feedback" style="display: inline-block">
                                {{$message}}
                            </div>
                            @enderror
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{--            Signature--}}
            <div class="row">

                {{--                Quality Inspector--}}
                <div class="form-floating mb-3 col">
                    <input type="text" class="form-control" id="quality-inspector" value="{{old('quality_inspector')}}"
                           name="quality_inspector"
                           placeholder="Quality Inspector">
                    @error('quality_inspector')
                    <div class="invalid-feedback" style="display: inline-block">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="quality-inspector">Quality Inspector</label>
                </div>

                {{--                Approved By--}}
                <div class="form-floating mb-3 col">
                    <input type="text" class="form-control" id="approved-by" value="{{old('approved_by')}}"
                           name="approved_by"
                           placeholder="Approved By">
                    @error('approved_by')
                    <div class="invalid-feedback" style="display: inline-block">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="approved-by">Approved By</label>
                </div>

                {{--                Date--}}
                <div class="form-floating mb-3 col">
                    <input type="text" class="form-control" id="date2"
                           placeholder="Date" disabled>
                    <label for="date2">Date</label>
                </div>
            </div>

            <input type="submit" class="form-control btn btn-primary" value="Submit">
        </form>
    </div>

@endsection

@push('js')
    <script>

        function changeDateFormate() {
            const date = new Date(document.getElementById('date').value);
            const formatedDate = date.toLocaleDateString('en-US', options);
            document.getElementById('date2').value = formatedDate.toString();
        }

        const year = new Date().getFullYear();
        const month = (new Date().getMonth() + 1).toString().padStart(2, '0');
        const randomNum = Math.floor(Math.random() * 10000);
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        document.getElementById('work_order').value = `${year}-${month}-${randomNum}`;
        document.getElementById('production_order').value = Math.floor(Math.random() * 100000);
        document.getElementById('date').value = new Date().toISOString().split('T')[0];
        changeDateFormate()
        document.getElementById('date').onchange = function () {
            changeDateFormate()
        }

    </script>
@endpush
