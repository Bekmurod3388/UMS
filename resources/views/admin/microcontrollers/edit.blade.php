@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10"><h1 class="card-title">Изменить автобус</h1></div>
                </div>
                <hr>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>ОЙ!</strong> Что то не так!.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form action="{{route('admin.bus.update',['bu'=>$model->id])}}" method="POST" accept-charset="UTF-8">
                        @csrf
@method('put')
                        <div class="form-group">
                            <label for="header_ru">Гараж №</label>
                            <input type="number" name="garage_number" class="form-control" id="header_ru" placeholder="Гараж №" required value="{{old('text', $model->garage_number)}}">
                        </div>
                        <div class="form-group">
                            <label for="header2_ru">Автобус №</label>
                            <input type="number" name="bus_number" class="form-control" id="header2_ru" required placeholder="Автобус №" value="{{old('text', $model->bus_number)}}">
                        </div>
                        <button type="submit" id="alert" class="btn btn-primary">Сохранить</button>
                        <input type="reset" class="btn btn-danger" value="Очистить">
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
