@extends('layouts.layout')

@section('content')
    @php 
        /** @var \App\Models\References\Countries $menu, $title, $countriesList */
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><h3>{{$title['name']}}</h3></div>

                    <div class="card-body">

                        <form name="show">
                            <div class="row justify-content-center">
                                <div class='form-group col-md-10'>
                                    <label for='title'>Название страны</label>
                                    <input name='title' value='{{ $countriesList->title }}' id='title' type='text' maxlength="50" readonly class="form-control" title='Название страны'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='national_name'>Национальное название страны</label>
                                    <input name='national_name' value='{{ $countriesList->national_name }}' id='national_name' type='text' maxlength="50" readonly class="form-control" title='Национальное название страны'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='symbol_alfa2'>Код страны Alfa 2</label>
                                    <input name='symbol_alfa2' value='{{ $countriesList->symbol_alfa2 }}' id='symbol_alfa2' type='text' maxlength="50" readonly class="form-control" title='Код страны Alfa 2'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='symbol_alfa3'>Код страны Alfa 3</label>
                                    <input name='symbol_alfa3' value='{{ $countriesList->symbol_alfa3 }}' id='symbol_alfa3' type='text' maxlength="50" readonly class="form-control" title='Код страны Alfa 3'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='number_iso'>Код страны ISO</label>
                                    <input name='number_iso' value='{{ $countriesList->number_iso }}' id='number_iso' type='text' maxlength="50" readonly class="form-control" title='Код страны ISO'>
                                </div>
                                <div class='form-group col-md-10'>
                                    <label for='visible'>Видимость в системе</label>
                                    <input name='visible' value='{{ $countriesList->visible }}' id='visible' type='text' maxlength="50" readonly class="form-control" title='Видимость в системе'>
                                </div>
                                <div class='form-group col-md-10'> </div>
                            </div>
                        </form>

                        <form name="delete" method="POST" action="{{ route('ref.countries.destroy', $countriesList->id) }}">
                            <div class="row justify-content-center">
                                <div class='form-group col-md-10'>
                                    @method('DELETE')
                                    @csrf
                                    <a class="btn btn-outline-secondary" href="{{ route('ref.countries.index') }}">{{ __('Закрыть') }}</a><span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <a class="btn btn-outline-secondary" href="{{ route('ref.countries.edit', $countriesList->id) }}">{{ __('Изменить') }}</a>
                                    <button type="submit" class="btn btn-outline-danger" href="#">{{ __('Удалить') }}</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection