@extends('layouts.layout')

@section('content')
    @php 
        /** @var \App\Models\References\AccrualGroups $menu, $title, $accrualGroupsList
         */
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><h3>{{$title['name']}}</h3></div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('ref.accrual-groups.update', $accrualGroupsList->id) }}">
                            @method('PATCH')
                            @csrf
                            @php
                                /** @var \Illuminate\Support\ViewErrorBag @errors */
                            @endphp
                            @include('ref.accrual-groups.includes.result_messages')
                            <div class="row justify-content-center">
                                <div class='form-group col-md-10'>
                                    <label for='title'>Группа начисления</label>
                                    <input name='title' value='{{ $accrualGroupsList->title }}' id='title' type='text' maxlength="50" class="form-control" title='Группа начисления'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='description'>Описание группы расчета</label>
                                    <input name='description' value='{{ $accrualGroupsList->description }}' id='description' type='text' maxlength="50" class="form-control" title='Описание группы расчета'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='type'>Тип начисления</label>
                                    <input name='type' value='{{ $accrualGroupsList->type }}' id='type' type='text' maxlength="50" class="form-control" title='Тип начисления'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <button type="submit" class="btn btn-secondary float-left">
                                        {{ __('Сохранить') }}
                                    </button>
                                    @if(session('success'))
                                        <a class='btn btn-outline-secondary' style="margin-left: 10px;" href="{{ route('ref.accrual-groups.show', $accrualGroupsList->id) }}">{{ __('Закрыть') }}</a>
                                    @else
                                        <a class='btn btn-outline-secondary' style="margin-left: 10px;" href="{{ route('ref.accrual-groups.show', $accrualGroupsList->id) }}">{{ __('Отмена') }}</a>
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