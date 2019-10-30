@extends('layouts.layout')

@section('content')
    @php 
        /** @var \App\Models\HumanResources\PersonalEducations $menu, $title, $personalEducationsList
         * @var \Illuminate\Database\Eloquent $personalCardsList, $educationTypesList, $studyModesList
         */
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><h3>{{$title['name']}}</h3></div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('hr.personal-educations.store') }}">
                            @csrf
                            @php
                                /** @var \Illuminate\Support\ViewErrorBag @errors */
                            @endphp
                            @include('hr.personal-educations.includes.result_messages')
                            <div class="row justify-content-center">
                                <div class='form-group col-md-10'>
                                    <label for='personal_card_id'>Работник</label>
                                    <div class="input-group mb-3"
>                                        <select name='personal_card_id' value='personal_card_id' id='personal_card_id' type='text' placeholder="Работник" class="form-control" title='Работник' required>
                                            @foreach($personalCardsList as $personalCardsOption)
                                            <option value="{{ $personal_cardsOption->id }}" >
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
                                    <label for='education_type_id'>Уровень образования</label>
                                    <div class="input-group mb-3"
>                                        <select name='education_type_id' value='education_type_id' id='education_type_id' type='text' placeholder="Уровень образования" class="form-control" title='Уровень образования' required>
                                            @foreach($educationTypesList as $educationTypesOption)
                                            <option value="{{ $education_typesOption->id }}" >
                                                {{ $educationTypesOption->education_type }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <a class="btn btn-outline-secondary" href="{{ route('ref.education-types.create') }}">Добавить</a>
                                        </div>
                                    </div>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='study_mode_id'>Режим (форма) обучения</label>
                                    <div class="input-group mb-3"
>                                        <select name='study_mode_id' value='study_mode_id' id='study_mode_id' type='text' placeholder="Режим (форма) обучения" class="form-control" title='Режим (форма) обучения' required>
                                            @foreach($studyModesList as $studyModesOption)
                                            <option value="{{ $study_modesOption->id }}" >
                                                {{ $studyModesOption->study_mode }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <a class="btn btn-outline-secondary" href="{{ route('ref.study-modes.create') }}">Добавить</a>
                                        </div>
                                    </div>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='institution'>Учебное заведение</label>
                                    <input name='institution' id='institution' type='text' maxlength="50" class="form-control" title='Учебное заведение'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='specialty'>Специальность</label>
                                    <input name='specialty' id='specialty' type='text' maxlength="50" class="form-control" title='Специальность'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='degree'>Квалификация (степень)</label>
                                    <input name='degree' id='degree' type='text' maxlength="50" class="form-control" title='Квалификация (степень)'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='degree_abbr'>Аббривиатура квалификации</label>
                                    <input name='degree_abbr' id='degree_abbr' type='text' maxlength="50" class="form-control" title='Аббривиатура квалификации'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='diploma'>Серия и номер диплома</label>
                                    <input name='diploma' id='diploma' type='text' maxlength="50" class="form-control" title='Серия и номер диплома'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <button type="submit" class="btn btn-outline-secondary float-left">
                                        {{ __('Сохранить') }}
                                    </button>
                                    @if(session('success'))
                                        <a class='btn btn-outline-secondary' style="margin-left: 10px;" href="{{ route('hr.personal-educations.index') }}">{{ __('Закрыть') }}</a>
                                    @else
                                        <a class='btn btn-outline-secondary' style="margin-left: 10px;" href="{{ route('hr.personal-educations.index') }}">{{ __('Отмена') }}</a>
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