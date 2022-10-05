<?php /** @var \App\ViewModels\EntitiesViewModel $model */?>

@extends('layout.app')

@section('title', 'Список')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-sm-between">
            <div class="display-6 fst-bolder">
                <p class=''>Юридические лица</p>
            </div>
            <div class="d-flex align-items-center">
                <a href="{{route('entities.createPage')}}" class="nav-link btn btn-success">Добавить</a>
            </div>

        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Организация</th>
                    <th>Директор</th>
                    <th>Телефон</th>
                    <th>Адрес</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($model->items as $item)
                <tr>
                    <td>{{$item->company_name}}</td>
                    <td>{{$item->director}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->address}}</td>
                    <td><a href="{{route('entities.updatePage', ['id' => $item->id])}}" class="btn btn-warning text-white">Изменить</a></td>
                    <td>
                        <form action="{{route('entities.delete')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <button class="btn bg-danger text-white">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
    <script src="https://unpkg.com/imask"></script>
    <script src="{{asset('js/app.js')}}"></script>
@endsection