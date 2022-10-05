@extends('layout.app')

@section('title', 'Добавление')

@section('content')
    <div class="container">
        <div class="container d-flex flex-column col-6 align-items-center">
            <div class="display-6 fst-bolder">
                <p class=''>Добавление новой организации</p>
            </div>
            <form class="col-6" action="{{route('entities.create')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="company_name" class="form-label">Введите название организации</label>
                    <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" placeholder="Назв. организации">
                </div>
                @error('company_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="director" class="form-label">Введите ФИО директора</label>
                    <input type="text" class="form-control @error('director') is-invalid @enderror" id="director" name="director" placeholder="Иванов Иван Иванович">
                </div>
                @error('director')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="phone" class="form-label">Введите номер телефона</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone">
                </div>
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="address" class="form-label">Введите адрес</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="г. Город, ул. Улица, д. 0">
                </div>
                @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="d-flex justify-content-center">
                    <input class="btn btn-primary" type="submit" value="Добавить">
                </div>

            </form>
        </div>
    </div>
    <script src="https://unpkg.com/imask"></script>
    <script src="{{asset('js/app.js')}}"></script>
@endsection