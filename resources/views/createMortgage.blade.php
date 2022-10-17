@extends('layout')
@section('main-content')
    <div class="col-lg-5 mx-auto">
        <form class="row g-3" method="post" action="/mortgage/create">
            <div class="row mb-3 text-center mt-5">
                <div class="col-sm-6 themed-grid-col">Название</div>
                <div class="col-sm-5 themed-grid-col"><input name="title" type="text" class="form-control rounded-3"></div>
            </div>
            <div class="row mb-3 text-center">
                <div class="col-md-6 themed-grid-col">Ставка, %</div>
                <div class="col-md-5 themed-grid-col"><input name="rate" type="number" class="form-control rounded-3"></div>
            </div>

            <div class="row mb-3 text-center">
                <div class="col-md-6 themed-grid-col">Максимальный срок, лет</div>
                <div class="col-md-5 themed-grid-col"><input name="maximum_term" type="number" class="form-control rounded-3"></div>
            </div>

            <div class="row mb-3 text-center">
                <div class="col-lg-6 themed-grid-col">Минимальный первоначальный взнос</div>
                <div class="col-md-5 themed-grid-col"><input name="minimum_down_payment" type="number" class="form-control rounded-3"></div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Создать</button>
            </div>
        </form>
    </div>
@endsection

