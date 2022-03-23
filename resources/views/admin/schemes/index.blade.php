@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-9"><h1 class="card-title">Схемалар</h1></div>
                    <div class="col-md-1">
                        <button onclick="create()" class="btn btn-primary">
                            <span class="btn-label">
                                <i class="fa fa-pen"></i>
                            </span>
                            Кушиш
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
                        @dd($schemes)
                        @foreach($schemes as $schema)
                            <tr>
                                <td>{{$schema->id}}</td>
                                <td>{{$schema->controller}}</td>
                                <td>{{$schema->sensor_id}}</td>
                                <td>
                                    <form action="{{route('admin.scheme.store')}}" method="post"
                                          id="form_{{$schema->id}}">
                                        @method('DELETE')
                                        @csrf
                                       <a href="#" class="btn btn-warning"><i class="fas fa-eye"></i></a>

                                        <button type="button" class="btn btn-danger" onclick="remove(this.parentNode)"
                                                title="Учириш">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
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
                                @foreach($controllers as $controller)
                                    <option value="{{$controller->id}}">{{$controller->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sensor_id">Сенсорлар</label>
                            <select name="sensor_id" id="sensor_id" class="form-control" required>
                                @foreach($sensors as $sensor)
                                    <option value="{{$sensor->id}}">{{$sensor->name}} ({{$sensor->type}}, )</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Саклаш</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Бекор килиш</button>
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
