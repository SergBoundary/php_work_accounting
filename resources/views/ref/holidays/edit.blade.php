@extends('layouts.layout')

@section('content')
    @php 
        /** @var \App\Models\References\Holidays $menu, $title, $holidaysList
         * @var \Illuminate\Database\Eloquent $countriesList, $yearsList, $monthsList
         */
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><h3>{{$title['name']}}</h3></div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('ref.holidays.update', $holidaysList->id) }}">
                            @method('PATCH')
                            @csrf
                            @php
                                /** @var \Illuminate\Support\ViewErrorBag @errors */
                            @endphp
                            @include('ref.holidays.includes.result_messages')
                            <div class="row justify-content-center">
                                <div class='form-group col-md-10'>
                                    <label for='country_id'>Страна</label>
                                    <div class="input-group mb-3"
>                                        <select name='country_id' value='{{ $holidaysList->countries_id }}' id='country_id' type='text' placeholder="Страна" class="form-control" title='Страна' required>
                                            @foreach($countriesList as $countriesOption)
                                            <option value="{{ $countriesOption->id }}" 
                                                @if($countriesOption->id == $holidaysList->country_id) selected @endif>
                                                {{ $countriesOption->country }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <a class="btn btn-outline-secondary" href="{{ route('ref.countries.create') }}">Добавить</a>
                                        </div>
                                    </div>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='year_id'>Год</label>
                                    <div class="input-group mb-3"
>                                        <select name='year_id' value='{{ $holidaysList->years_id }}' id='year_id' type='text' placeholder="Год" class="form-control" title='Год' required>
                                            @foreach($yearsList as $yearsOption)
                                            <option value="{{ $yearsOption->id }}" 
                                                @if($yearsOption->id == $holidaysList->year_id) selected @endif>
                                                {{ $yearsOption->year }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <a class="btn btn-outline-secondary" href="{{ route('ref.years.create') }}">Добавить</a>
                                        </div>
                                    </div>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='month_id'>Месяц</label>
                                    <div class="input-group mb-3"
>                                        <select name='month_id' value='{{ $holidaysList->months_id }}' id='month_id' type='text' placeholder="Месяц" class="form-control" title='Месяц' required>
                                            @foreach($monthsList as $monthsOption)
                                            <option value="{{ $monthsOption->id }}" 
                                                @if($monthsOption->id == $holidaysList->month_id) selected @endif>
                                                {{ $monthsOption->month }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <a class="btn btn-outline-secondary" href="{{ route('ref.months.create') }}">Добавить</a>
                                        </div>
                                    </div>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='holiday'>Праздничный день</label>
                                    <input name='holiday' value='{{ $holidaysList->holiday }}' id='holiday' type='text' maxlength="50" class="form-control" title='Праздничный день'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='title'>Описание праздника</label>
                                    <input name='title' value='{{ $holidaysList->title }}' id='title' type='text' maxlength="50" class="form-control" title='Описание праздника'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='not_work'>Не рабочий</label>
                                    <input name='not_work' value='{{ $holidaysList->not_work }}' id='not_work' type='text' maxlength="50" class="form-control" title='Не рабочий'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='religion'>Религиозный</label>
                                    <input name='religion' value='{{ $holidaysList->religion }}' id='religion' type='text' maxlength="50" class="form-control" title='Религиозный'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <button type="submit" class="btn btn-secondary float-left">
                                        {{ __('Сохранить') }}
                                    </button>
                                    @if(session('success'))
                                        <a class='btn btn-outline-secondary' style="margin-left: 10px;" href="{{ route('ref.holidays.show', $holidaysList->id) }}">{{ __('Закрыть') }}</a>
                                    @else
                                        <a class='btn btn-outline-secondary' style="margin-left: 10px;" href="{{ route('ref.holidays.show', $holidaysList->id) }}">{{ __('Отмена') }}</a>
                                    @endif
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection