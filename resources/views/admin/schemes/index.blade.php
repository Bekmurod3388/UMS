@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-9">
                        <h1 class="card-title">Схемалар</h1>
                    </div>
                    <div class="col-md-1">
                        <button onclick="create()" class="btn btn-primary">
                            <span class="btn-label">
                                <i class="fa fa-pen"></i>
                            </span>
                            Қўшиш
                        </button>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th>Микроконтроллер</th>
                                <th>Сенсор</th>
                                <th>Амаллар</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($schemes as $scheme)
                            <tr>
                                <td>{{$scheme->id}}</td>
                                <td>{{$controllers[$scheme->controller_id]}}</td>
                                <td>{{$scheme->sensor}}</td>
                                <td>
                                    <form action="" method="post"
                                          id="form">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" method="post" id="form">
                @csrf
                <input type="hidden" name="_method" id="_method" value="POST">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="surname">Контроллерлар</label>
                            <select name="controller_id" id="surname" class="form-control" required>
                                @foreach($controllers as $key => $controller)
                                    <option value="{{$key}}">{{$controller}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sensor_id">Сенсорлар</label>
                            <select name="sensor_id" id="sensor_id" class="form-control" required>
                                @foreach($sensors as $sensor)
                                    <option value="{{$sensor->id}}">{{$sensor->name}} ({{$sensor->type}})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Сақлаш</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Бекор қилиш</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function create() {
            $('#modal').modal()
        }
    </script>
@endsection
