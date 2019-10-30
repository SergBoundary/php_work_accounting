@extends('layouts.layout')

@section('content')
    @php 
        /** @var \App\Models\Accounting\WorkOrders $menu, $title, $workOrdersList
         * @var \Illuminate\Database\Eloquent $departmentsList, $objectsList, $teamsList, $accountsList, $algorithmsList, $yearsList, $monthsList
         */
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><h3>{{$title['name']}}</h3></div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('acc.work-orders.update', $workOrdersList->id) }}">
                            @method('PATCH')
                            @csrf
                            @php
                                /** @var \Illuminate\Support\ViewErrorBag @errors */
                            @endphp
                            @include('acc.work-orders.includes.result_messages')
                            <div class="row justify-content-center">
                                <div class='form-group col-md-10'>
                                    <label for='department_id'>Подразделение</label>
                                    <div class="input-group mb-3"
>                                        <select name='department_id' value='{{ $workOrdersList->departments_id }}' id='department_id' type='text' placeholder="Подразделение" class="form-control" title='Подразделение' required>
                                            @foreach($departmentsList as $departmentsOption)
                                            <option value="{{ $departmentsOption->id }}" 
                                                @if($departmentsOption->id == $workOrdersList->department_id) selected @endif>
                                                {{ $departmentsOption->department }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <a class="btn btn-outline-secondary" href="{{ route('ref.departments.create') }}">Добавить</a>
                                        </div>
                                    </div>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='object_id'>Объект</label>
                                    <div class="input-group mb-3"
>                                        <select name='object_id' value='{{ $workOrdersList->objects_id }}' id='object_id' type='text' placeholder="Объект" class="form-control" title='Объект' required>
                                            @foreach($objectsList as $objectsOption)
                                            <option value="{{ $objectsOption->id }}" 
                                                @if($objectsOption->id == $workOrdersList->object_id) selected @endif>
                                                {{ $objectsOption->object }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <a class="btn btn-outline-secondary" href="{{ route('ref.objects.create') }}">Добавить</a>
                                        </div>
                                    </div>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='team_id'>Бригада</label>
                                    <div class="input-group mb-3"
>                                        <select name='team_id' value='{{ $workOrdersList->teams_id }}' id='team_id' type='text' placeholder="Бригада" class="form-control" title='Бригада' required>
                                            @foreach($teamsList as $teamsOption)
                                            <option value="{{ $teamsOption->id }}" 
                                                @if($teamsOption->id == $workOrdersList->team_id) selected @endif>
                                                {{ $teamsOption->team }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <a class="btn btn-outline-secondary" href="{{ route('ref.teams.create') }}">Добавить</a>
                                        </div>
                                    </div>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='account_id'>Счет затрат выполненой работы</label>
                                    <div class="input-group mb-3"
>                                        <select name='account_id' value='{{ $workOrdersList->accounts_id }}' id='account_id' type='text' placeholder="Счет затрат выполненой работы" class="form-control" title='Счет затрат выполненой работы' required>
                                            @foreach($accountsList as $accountsOption)
                                            <option value="{{ $accountsOption->id }}" 
                                                @if($accountsOption->id == $workOrdersList->account_id) selected @endif>
                                                {{ $accountsOption->account }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <a class="btn btn-outline-secondary" href="{{ route('ref.accounts.create') }}">Добавить</a>
                                        </div>
                                    </div>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='algorithm_id'>Алгоритм расчета сдельной суммы</label>
                                    <div class="input-group mb-3"
>                                        <select name='algorithm_id' value='{{ $workOrdersList->algorithms_id }}' id='algorithm_id' type='text' placeholder="Алгоритм расчета сдельной суммы" class="form-control" title='Алгоритм расчета сдельной суммы' required>
                                            @foreach($algorithmsList as $algorithmsOption)
                                            <option value="{{ $algorithmsOption->id }}" 
                                                @if($algorithmsOption->id == $workOrdersList->algorithm_id) selected @endif>
                                                {{ $algorithmsOption->algorithm }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <a class="btn btn-outline-secondary" href="{{ route('ref.algorithms.create') }}">Добавить</a>
                                        </div>
                                    </div>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='year_id'>Год расчета</label>
                                    <div class="input-group mb-3"
>                                        <select name='year_id' value='{{ $workOrdersList->years_id }}' id='year_id' type='text' placeholder="Год расчета" class="form-control" title='Год расчета' required>
                                            @foreach($yearsList as $yearsOption)
                                            <option value="{{ $yearsOption->id }}" 
                                                @if($yearsOption->id == $workOrdersList->year_id) selected @endif>
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
                                    <label for='month_id'>Месяц расчета</label>
                                    <div class="input-group mb-3"
>                                        <select name='month_id' value='{{ $workOrdersList->months_id }}' id='month_id' type='text' placeholder="Месяц расчета" class="form-control" title='Месяц расчета' required>
                                            @foreach($monthsList as $monthsOption)
                                            <option value="{{ $monthsOption->id }}" 
                                                @if($monthsOption->id == $workOrdersList->month_id) selected @endif>
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
                                    <label for='date'>Дата наряда</label>
                                    <input name='date' value='{{ $workOrdersList->date }}' id='date' type='text' maxlength="50" class="form-control" title='Дата наряда'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='number'>Номер наряда</label>
                                    <input name='number' value='{{ $workOrdersList->number }}' id='number' type='text' maxlength="50" class="form-control" title='Номер наряда'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='amount'>Сумма наряда</label>
                                    <input name='amount' value='{{ $workOrdersList->amount }}' id='amount' type='text' maxlength="50" class="form-control" title='Сумма наряда'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <button type="submit" class="btn btn-secondary float-left">
                                        {{ __('Сохранить') }}
                                    </button>
                                    @if(session('success'))
                                        <a class='btn btn-outline-secondary' style="margin-left: 10px;" href="{{ route('acc.work-orders.show', $workOrdersList->id) }}">{{ __('Закрыть') }}</a>
                                    @else
                                        <a class='btn btn-outline-secondary' style="margin-left: 10px;" href="{{ route('acc.work-orders.show', $workOrdersList->id) }}">{{ __('Отмена') }}</a>
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