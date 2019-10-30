@extends('layouts.layout')

@section('content')
    @php
        /** @var \App\Models\References\Ranks $menu, $title, $ranksList */
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3><small class="text-muted text-uppercase">{{$title['name']}}</small></h3><br />
                @if(count($ranksList) > 0)
                <table class="table table-hover">
                    <thead>
                        <th class="align-middle" scope="col">Уровень квалификации</th>
                        <th scope="col">
                            <a class="btn btn-outline-secondary btn-sm" href="{{ route('ref.ranks.create') }}">{{ __('Добавить') }}</a>
                        </th>
                    </thead>
                    <tbody>
                        @foreach($ranksList as $ranksRow)
                        <tr>
                            <td>{{ $ranksRow->title }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Record editing">
                                    <form method="POST" action="{{ route('ref.ranks.destroy', $ranksRow->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a class="btn btn-outline-primary btn-sm" href="{{ route('ref.ranks.show', $ranksRow->id) }}">{{ __('Открыть') }}</a>
                                        <a class="btn btn-outline-primary btn-sm" href="{{ route('ref.ranks.edit', $ranksRow->id) }}">{{ __('Изменить') }}</a>
                                        <button type="submit" class="btn btn-outline-danger btn-sm" href="#">{{ __('Удалить') }}</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <p><em>Данные отсутствуют..</em></p>
                    <a class="btn btn-outline-secondary btn-sm" href="{{ route('ref.ranks.create') }}">{{ __('Добавить') }}</a>
                @endif
            </div>
        </div>
    </div>
@endsection