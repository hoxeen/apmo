@extends('layout')
@section('main-content')
    <h2>Ипотеки</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Процентная ставка</th>
                <th scope="col">Максимальный срок, лет</th>
                <th scope="col">Минимальный первоначальный взнос</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($entities as $entity)
                <tr>
                    <td><a href="/mortgage/exists/{{$entity['id']}}">{{$entity['title']}}</a></td>
                    <td>{{$entity['rate']}}</td>
                    <td>{{$entity['maximum_term']}}</td>
                    <td>{{$entity['minimum_down_payment']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

