@extends('layouts.layout')

@section('content')
    @php
        /** @var \App\Models\References\CurrencyKurses $menu, $title, $currencyKursesList */
        $currencies = "";
        $currencies = "";
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3><small class="text-muted text-uppercase">{{$title['name']}}</small></h3><br />
                @if(count($currencyKursesList) > 0)
                <table class="table table-hover">
                    <thead>
                        <th class="align-middle" scope="col" colspan="3">Масштаб котировки</th>
                        <th class="align-middle" scope="col">Курс</th>
                        <th scope="col">
                            <a class="btn btn-outline-secondary btn-sm" href="{{ route('ref.currency-kurses.create') }}">{{ __('Добавить') }}</a>
                        </th>
                    </thead>
                    <tbody>
                        @foreach($currencyKursesList as $currencyKursesRow)
                        @if ($currencies != $currencyKursesRow->base currency)
                        <tr>
                            <td colspan="5" class="text-muted text-uppercase"><em> {{ $currencyKursesRow->country }}</em></td>
                        </tr>
                        @endif
                        @if ($currencies != $currencyKursesRow->quoted currency)
                        <tr>
                            <td colspan="5" class="text-muted text-uppercase"><em>  {{ $currencyKursesRow->country }}</em></td>
                        </tr>
                        @endif
                        <tr>
                            <td> </td>
                            <td> </td>
                            <td>{{ $currencyKursesRow->scale }}</td>
                            <td>{{ $currencyKursesRow->residual }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Record editing">
                                    <form method="POST" action="{{ route('ref.currency-kurses.destroy', $currencyKursesRow->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a class="btn btn-outline-primary btn-sm" href="{{ route('ref.currency-kurses.show', $currencyKursesRow->id) }}">{{ __('Открыть') }}</a>
                                        <a class="btn btn-outline-primary btn-sm" href="{{ route('ref.currency-kurses.edit', $currencyKursesRow->id) }}">{{ __('Изменить') }}</a>
                                        <button type="submit" class="btn btn-outline-danger btn-sm" href="#">{{ __('Удалить') }}</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @php
                            $currencies = $currencyKursesRow->base currency;
                            $currencies = $currencyKursesRow->quoted currency;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
                @else
                    <p><em>Данные отсутствуют..</em></p>
                    <a class="btn btn-outline-secondary btn-sm" href="{{ route('ref.currency-kurses.create') }}">{{ __('Добавить') }}</a>
                @endif
            </div>
        </div>
    </div>
@endsection