@extends('layouts.main')
@section('content')

    <div class="row justify-content-center" style="padding: 1% 20%">
        <form action="{{route('order.update', ['order' => $order->id])}}" class="m-auto needs-validation" method="POST">
            @csrf
            @method('PUT')

            {{--            Primary Info (Order#, Work ORder#, Date)--}}
            <div class="row">

                {{--                Work Order No--}}
                <div class="form-floating mb-3 col">
                    <input type="text" class="form-control" id="work_order" value="{{$order->work_order}}"
                           name="work order" placeholder="Work Order No" disabled>
                    @error('work order')
                    <div class="invalid-feedback" style="display: inline-block">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="work_order">Work Order No</label>
                </div>

                {{--            Production Order ID--}}
                <div class="form-floating mb-3 col">
                    <input type="text" class="form-control" id="production_order" value="{{$order->production_order}}"
                           name="production_order"
                           placeholder="Production Order No" disabled>
                    @error('production_order')
                    <div class="invalid-feedback" style="display: inline-block">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="production_order">Production Order No</label>
                </div>

                {{--                Date--}}
                <div class="form-floating mb-3 col">
                    <input type="date" class="form-control" id="date" value="{{$order->date}}" name="date"
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
                    <input type="text" class="form-control" id="customer" value="{{$order->customer}}" name="customer"
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
                    <input type="text" class="form-control" id="project" value="{{$order->project}}" name="project"
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
                    <input type="text" class="form-control" id="shape" value="{{$order->shape}}" name="shape"
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
                                   name="parameters[{{$param->id}}][check]" @checked(isset($order->parameters[$param->id]['check'])) >
                        </td>
                        <td>
                            <input type="text" class="form-control" id="floatingInput"
                                   value="{{$order->parameters[$param->id]['remarks']}}"
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
                    <input type="text" class="form-control" id="quality-inspector" value="{{$order->quality_inspector}}"
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
                    <input type="text" class="form-control" id="approved-by" value="{{$order->approved_by}}"
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

            <input type="submit" class="form-control btn btn-primary" value="Edit">
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
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        changeDateFormate()
        document.getElementById('date').onchange = function () {
            changeDateFormate()
        }

    </script>
@endpush
