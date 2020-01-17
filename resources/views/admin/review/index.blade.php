@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <th>ID</th>
                <th>Пользователь</th>
                <th>Оценка</th>
                <th>Статус</th>
                <th>Действие</th>
                </thead>

                <tbody>
                @foreach($reviews as $review)
                    <tr>
                        <td>{{ $review->id }}</td>
                        <td>{{ $review->name }}</td>
                        <td>{{ $review->rating }}</td>
                        <td>
                            @if($review->active == 1)
                                Активно
                            @else
                                Не активно
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.review.show', ['id' => $review->id]) }}" class="btn btn-primary">Показать на сайте</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop