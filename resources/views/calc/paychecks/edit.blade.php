@extends('layouts.layout')

@section('content')
    @php 
        /** @var \App\Models\Calculations\Paychecks $menu, $title, $paychecksList
         * @var \Illuminate\Database\Eloquent $personalCardsList, $yearsList, $monthsList
         */
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><h3>{{ $title }}</h3></div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('calc.paychecks.update', $paychecksList->id) }}">
                            @method('PATCH')
                            @csrf
                            @php
                                /** @var \Illuminate\Support\ViewErrorBag @errors */
                            @endphp
                            @include('calc.paychecks.includes.result_messages')
                            <div class="row justify-content-center">
                                <div class='form-group col-md-10'>
                                    <label for='personal_card_id'>Работник</label>
                                    <div class="input-group mb-3"
>                                        <select name='personal_card_id' value='{{ $paychecksList->personal_cards_id }}' id='personal_card_id' type='text' placeholder="Работник" class="form-control" title='Работник' required>
                                            @foreach($personalCardsList as $personalCardsOption)
                                            <option value="{{ $personalCardsOption->id }}" 
                                                @if($personalCardsOption->id == $paychecksList->personal_card_id) selected @endif>
                                                {{ $personalCardsOption->personal_card }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <a class="btn btn-outline-secondary" href="{{ route('hr.personal-cards.create') }}">Добавить</a>
                                        </div>
                                    </div>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='year_id'>Год</label>
                                    <div class="input-group mb-3"
>                                        <select name='year_id' value='{{ $paychecksList->years_id }}' id='year_id' type='text' placeholder="Год" class="form-control" title='Год' required>
                                            @foreach($yearsList as $yearsOption)
                                            <option value="{{ $yearsOption->id }}" 
                                                @if($yearsOption->id == $paychecksList->year_id) selected @endif>
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
>                                        <select name='month_id' value='{{ $paychecksList->months_id }}' id='month_id' type='text' placeholder="Месяц" class="form-control" title='Месяц' required>
                                            @foreach($monthsList as $monthsOption)
                                            <option value="{{ $monthsOption->id }}" 
                                                @if($monthsOption->id == $paychecksList->month_id) selected @endif>
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
                                    <label for='balance_start'>Начальный остаток</label>
                                    <input name='balance_start' value='{{ $paychecksList->balance_start }}' id='balance_start' type='text' maxlength="50" class="form-control" title='Начальный остаток'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='hourly'>Почасовая работа</label>
                                    <input name='hourly' value='{{ $paychecksList->hourly }}' id='hourly' type='text' maxlength="50" class="form-control" title='Почасовая работа'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='piecework'>Сдельная работа</label>
                                    <input name='piecework' value='{{ $paychecksList->piecework }}' id='piecework' type='text' maxlength="50" class="form-control" title='Сдельная работа'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='accrual'>Начислено</label>
                                    <input name='accrual' value='{{ $paychecksList->accrual }}' id='accrual' type='text' maxlength="50" class="form-control" title='Начислено'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='retention'>Удержано</label>
                                    <input name='retention' value='{{ $paychecksList->retention }}' id='retention' type='text' maxlength="50" class="form-control" title='Удержано'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='issued_by'>Выдано</label>
                                    <input name='issued_by' value='{{ $paychecksList->issued_by }}' id='issued_by' type='text' maxlength="50" class="form-control" title='Выдано'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='give_out'>К выдаче</label>
                                    <input name='give_out' value='{{ $paychecksList->give_out }}' id='give_out' type='text' maxlength="50" class="form-control" title='К выдаче'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='debt'>Долг</label>
                                    <input name='debt' value='{{ $paychecksList->debt }}' id='debt' type='text' maxlength="50" class="form-control" title='Долг'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <button type="submit" class="btn btn-secondary float-left">
                                        {{ __('Сохранить') }}
                                    </button>
                                    @if(session('success'))
                                        <a class='btn btn-outline-secondary' style="margin-left: 10px;" href="{{ route('calc.paychecks.show', $paychecksList->id) }}">{{ __('Закрыть') }}</a>
                                    @else
                                        <a class='btn btn-outline-secondary' style="margin-left: 10px;" href="{{ route('calc.paychecks.show', $paychecksList->id) }}">{{ __('Отмена') }}</a>
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