@extends('layouts.layout')

@section('content')
    @php 
        /** @var \App\Models\Accounting\SpecialEatings $menu, $title, $specialEatingsList
         * @var \Illuminate\Database\Eloquent $personalCardsList, $yearsList, $monthsList
         */
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><h3>{{$title['name']}}</h3></div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('acc.special-eatings.update', $specialEatingsList->id) }}">
                            @method('PATCH')
                            @csrf
                            @php
                                /** @var \Illuminate\Support\ViewErrorBag @errors */
                            @endphp
                            @include('acc.special-eatings.includes.result_messages')
                            <div class="row justify-content-center">
                                <div class='form-group col-md-10'>
                                    <label for='personal_card_id'>Работник</label>
                                    <div class="input-group mb-3"
>                                        <select name='personal_card_id' value='{{ $specialEatingsList->personal_cards_id }}' id='personal_card_id' type='text' placeholder="Работник" class="form-control" title='Работник' required>
                                            @foreach($personalCardsList as $personalCardsOption)
                                            <option value="{{ $personal_cardsOption->id }}" 
                                                @if($personalCardsOption->id == $specialEatingsList->personal_card_id) selected @endif>
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
                                    <label for='year_id'>Год расхода</label>
                                    <div class="input-group mb-3"
>                                        <select name='year_id' value='{{ $specialEatingsList->years_id }}' id='year_id' type='text' placeholder="Год расхода" class="form-control" title='Год расхода' required>
                                            @foreach($yearsList as $yearsOption)
                                            <option value="{{ $yearsOption->id }}" 
                                                @if($yearsOption->id == $specialEatingsList->year_id) selected @endif>
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
                                    <label for='month_id'>Месяц расхода</label>
                                    <div class="input-group mb-3"
>                                        <select name='month_id' value='{{ $specialEatingsList->months_id }}' id='month_id' type='text' placeholder="Месяц расхода" class="form-control" title='Месяц расхода' required>
                                            @foreach($monthsList as $monthsOption)
                                            <option value="{{ $monthsOption->id }}" 
                                                @if($monthsOption->id == $specialEatingsList->month_id) selected @endif>
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
                                    <label for='residual_amount'>Остаток суммы на начало месяца</label>
                                    <input name='residual_amount' value='{{ $specialEatingsList->residual_amount }}' id='residual_amount' type='text' maxlength="50" class="form-control" title='Остаток суммы на начало месяца'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='amount'>Сумма затрат</label>
                                    <input name='amount' value='{{ $specialEatingsList->amount }}' id='amount' type='text' maxlength="50" class="form-control" title='Сумма затрат'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='hours'>Отработано часов за месяц</label>
                                    <input name='hours' value='{{ $specialEatingsList->hours }}' id='hours' type='text' maxlength="50" class="form-control" title='Отработано часов за месяц'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='unit_price'>Цена питания за штуку</label>
                                    <input name='unit_price' value='{{ $specialEatingsList->unit_price }}' id='unit_price' type='text' maxlength="50" class="form-control" title='Цена питания за штуку'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='unit_quantity'>Положеное количество за месяц</label>
                                    <input name='unit_quantity' value='{{ $specialEatingsList->unit_quantity }}' id='unit_quantity' type='text' maxlength="50" class="form-control" title='Положеное количество за месяц'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <button type="submit" class="btn btn-secondary float-left">
                                        {{ __('Сохранить') }}
                                    </button>
                                    @if(session('success'))
                                        <a class='btn btn-outline-secondary' style="margin-left: 10px;" href="{{ route('acc.special-eatings.show', $specialEatingsList->id) }}">{{ __('Закрыть') }}</a>
                                    @else
                                        <a class='btn btn-outline-secondary' style="margin-left: 10px;" href="{{ route('acc.special-eatings.show', $specialEatingsList->id) }}">{{ __('Отмена') }}</a>
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