@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10"><h1 class="card-title">Добавить вендоры</h1></div>
                </div>
                <hr>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form action="{{route('admin.vendors.store')}}" method="POST" accept-charset="UTF-8"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Наименование</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="img">Добавить лого</label>
                            <input type="file" name="img" class="form-control" id="img">
                        </div>
                        <div class="form-group">
                            <label for="back">Добавить изображение <b><i>Размер изображения:(900x674)</i></b> </label>
                            <input type="file" name="back" class="form-control" id="back">
                        </div>

                        <div class="form-group">
                            <label for="description_ru">Текст (RU)</label>
                            <textarea class="form-control" name="description_ru" id="description_ru" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description_en">Текст (EN)</label>
                            <textarea class="form-control" name="description_en" id="description_en" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="files">Добавить файлы</label>
                            <input type="file" name="files[]" class="form-control" id="files" multiple>
                        </div>

                        <div class="form-group">
                            <label for="category">Выберите категорию</label>
                            <select class="form-control" name="category_id">
                                <option></option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="links">Поместите каждую ссылку в новую строку</label>

                            <div class="row">
                                <div id="links-part" class="col-12"></div>
                                <input type="hidden" name="links" id="links" value="{{"[]"}}">

                                <div class="col-12">
                                    <button type="button" onclick="addEquipment()" class="btn btn-block btn-outline-info text-bold">
                                        <i class="fas fa-plus"></i>
                                        <span>Добавить</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="alert" class="btn btn-primary">Сохранить</button>
                        <input type="reset" class="btn btn-danger" value="Очистить">
                    </form>
                </div>
            </div>
        </div>
    </div>


@section('script')
    <script src="{{asset('js/default.js')}}"></script>
@stop
@endsection
