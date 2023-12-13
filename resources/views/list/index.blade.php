@component('layouts.app')
    @section('content')
        <div class="container">
            <div class="page-content">
                <div class="list-content">
                    <div class="list-row">
                        <label for="type">{{__('Type')}}</label>
                        <select name="type" id="type" class="form-control">
                            <option value="">{{__('All')}}</option>
                            @for($i=1; $i <= 5; $i++)
                                <option value="{{$i}}">
                                    {{$i}}
                                </option>
                            @endfor
                        </select>
                    </div>
                    @for($i=1; $i <= 5; $i++)
                        <div class="list-row input-row">
                            <label for="input-{{$i}}">{{__('Поле ' . $i)}}</label>
                            <input type="text" class="form-control" id="input-{{$i}}" name="input_{{$i}}">
                        </div>
                    @endfor

                    @for($i=1; $i <= 5; $i++)
                        <div class="list-row button-row">
                            <input class="btn btn-secondary" type="button" name="{{__('button_' . $i)}}" value="{{__('Кнопка ' . $i)}}">
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    @endsection
@endcomponent
