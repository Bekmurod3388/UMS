@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10"><h1 class="card-title">Изменить контакты</h1></div>
                </div>
                <hr>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Ой!</strong> С вашим вводом возникли некоторые проблемы.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form action="{{route('admin.contacts.update',$contact)}}" method="POST" accept-charset="UTF-8">
                        @csrf
                        @method('PUT')
                    <div class="form-group">
                        <label for="address_ru">Адрес РУ</label>
                        <input type="text" name="address_ru" class="form-control" id="address_ru" placeholder="Адрес" value="{{$contact->address_ru}}">
                    </div>
                        <div class="form-group">
                            <label for="address_en">Адрес En</label>
                            <input type="text" name="address_en" class="form-control" id="address_en" placeholder="Адрес En" value="{{$contact->address_en}}">
                        </div>
                    <div class="form-group">
                        <label for="phone">Телефонный номер</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Телефонный номер" value="{{$contact->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" value="{{$contact->email}}" class="form-control" id="email" placeholder="email">
                    </div>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                    <input type="reset" class="btn btn-danger" value="Очистить">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
