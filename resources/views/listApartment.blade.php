@extends('layout')
@section('main-content')
    <h2>Квартиры</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Тип квартиры</th>
                <th scope="col">Цена</th>
                <th scope="col">Программа ипотеки</th>
                <th scope="col">Платеж/мес</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($entities as $entity)
                <tr>
                    <td><a href="/apartment/exists/{{$entity['id']}}">{{$entity['title']}}</a></td>
                    <td>{{$entity['type']}}</td>
                    <td>{{$entity['price']}}</td>
                    <td>
                        <div class="col-sm-8 accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{$entity['id']}}" aria-expanded="false">
                                    Список
                                </button>
                            </h2>

                            <div id="collapse_{{$entity['id']}}" class="accordion-collapse collapse">

                                @foreach ($entity['mortgage'] as $mortgage)
                                        <a href="/mortgage/exists/{{$mortgage['id']}}">{{$mortgage['title']}}</a><br>
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td>
                        <div id="collapse_{{$entity['id']}}" class="accordion-collapse collapse">
                    @foreach ($entity['mortgage'] as $mortgage)
                            <br>{{$mortgage['monthlyPayment']}}
{{--                            <br>{{round(($entity['price']*(11/12/100))/(1-(1+$mortgage['rate']/12)*(1-(12*$mortgage['maximum_term']))))}}--}}
                    @endforeach
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

