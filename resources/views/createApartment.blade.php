@extends('layout')
@section('main-content')
    <div class="col-lg-5 mx-auto">
        <form class="row g-3" method="post" action="/apartment/create">
            <div class="row mb-3 text-center mt-5">
                <div class="col-sm-3 themed-grid-col">Название</div>
                <div class="col-sm-5 themed-grid-col"><input name="title" type="text" class="form-control rounded-3"></div>
            </div>

            <div class="row mb-3 text-center">
                <div class="col-md-3 themed-grid-col">Тип квартиры</div>
                <div class="col-md-5 themed-grid-col"><input name="type" type="text" class="form-control rounded-3"></div>
            </div>

            <div class="row mb-3 text-center">
                <div class="col-lg-3 themed-grid-col">Цена</div>
                <div class="col-md-5 themed-grid-col"><input name="price" type="number" class="form-control rounded-3"></div>
            </div>

            <div class="accordion" id="accordionExample">
                <div class="col-sm-8 accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Программа ипотеки
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        @foreach ($mortgages as $mortgage)
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="property[]" value={{$mortgage['id']}} >
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{$mortgage['title']}}
                                </label>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Создать</button>
            </div>
        </form>
    </div>
@endsection

