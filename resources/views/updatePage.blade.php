<?php /** @var \App\ViewModels\EntitiesViewModel $model */?>

@extends('layout.app')

@section('title', 'Изменение')

@section('content')
    <div class="container">
        <div class="container d-flex flex-column col-6 align-items-center">
            <div class="display-6 fst-bolder">
                <p class=''>Изменение параметров</p>
            </div>
            <form class="col-6" action="{{route('entities.update', ['id' => $model->items[0]->id])}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="company_name" class="form-label">Введите название организации</label>
                    <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" placeholder="Назв. организации" value="{{$model->items[0]->company_name}}">
                </div>
                @error('company_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="director" class="form-label">Введите ФИО директора</label>
                    <input type="text" class="form-control @error('director') is-invalid @enderror" id="director" name="director" placeholder="Иванов Иван Иванович" value="{{$model->items[0]->director}}">
                </div>
                @error('director')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="phone" class="form-label">Введите номер телефона</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{$model->items[0]->phone}}">
                </div>
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="address" class="form-label">Введите адрес</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="г. Город, ул. Улица, д. 0" value="{{$model->items[0]->address}}">
                </div>
                @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="d-flex justify-content-center">
                    <input class="btn btn-primary" type="submit" value="Изменить">
                </div>

            </form>
        </div>
    </div>
    <script src="https://unpkg.com/imask"></script>
    <script src="{{asset('js/app.js')}}"></script>
@endsection