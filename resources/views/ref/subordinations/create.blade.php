@extends('layouts.layout')

@section('content')
    @php 
        /** @var \App\Models\References\Subordinations $menu, $title, $subordinationsList
         */
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><h3>{{$title['name']}}</h3></div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('ref.subordinations.store') }}">
                            @csrf
                            @php
                                /** @var \Illuminate\Support\ViewErrorBag @errors */
                            @endphp
                            @include('ref.subordinations.includes.result_messages')
                            <div class="row justify-content-center">
                                <div class='form-group col-md-10'>
                                    <label for='title'>Уровень должности</label>
                                    <input name='title' id='title' type='text' maxlength="50" class="form-control" title='Уровень должности'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <button type="submit" class="btn btn-outline-secondary float-left">
                                        {{ __('Сохранить') }}
                                    </button>
                                    @if(session('success'))
                                        <a class='btn btn-outline-secondary' style="margin-left: 10px;" href="{{ route('ref.subordinations.index') }}">{{ __('Закрыть') }}</a>
                                    @else
                                        <a class='btn btn-outline-secondary' style="margin-left: 10px;" href="{{ route('ref.subordinations.index') }}">{{ __('Отмена') }}</a>
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