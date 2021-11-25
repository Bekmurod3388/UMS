@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-9"><h1 class="card-title">Sxemalar</h1></div>
                    <div class="col-md-1">
                        <button onclick="create()" class="btn btn-primary">
                            <span class="btn-label">
                                <i class="fa fa-pen"></i>
                            </span>
                            Qo&#8216;shish
                        </button>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th>Ism</th>
                                <th>Familiyasi</th>
                                <th>Email</th>
                                <th>Amallar</th>
                            </tr>
                        </thead>

                        <tbody>
{{--                        @foreach($users as $user)--}}
{{--                            <tr>--}}
{{--                                <td>{{$user->id}}</td>--}}
{{--                                <td>{{$user->name}}</td>--}}
{{--                                <td>{{$user->surname}}</td>--}}
{{--                                <td>{{$user->email}}</td>--}}
{{--                                <td>--}}
{{--                                    <form action="{{route('admin.users.store')}}" method="post"--}}
{{--                                          id="form_{{$user->id}}">--}}
{{--                                        @method('DELETE')--}}
{{--                                        @csrf--}}
{{--                                        <button type="button"--}}
{{--                                                onclick="update('{{route('admin.users.update', ['user' => $user])}}', '{{$user->name}}', '{{$user->surname}}', '{{$user->email}}')" class="btn btn-warning"--}}
{{--                                                title="O&#8216;zgartirish"><i class="fas fa-pencil-alt"></i>--}}
{{--                                        </button>--}}

{{--                                        <button type="button" class="btn btn-danger disabled" onclick="remove(this.parentNode)"--}}
{{--                                                title="O&#8216;chirish">--}}
{{--                                            <i class="fas fa-trash-alt"></i>--}}
{{--                                        </button>--}}
{{--                                    </form>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
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
                            <label for="surname">Kontrollerlar</label>
                            <select name="controller_id" id="surname" class="form-control" required>
                                @foreach($controllers as $controller)
                                    <option value="{{$controller->id}}">{{$controller->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sensor_id">Sensorlar</label>
                            <select name="sensor_id" id="sensor_id" class="form-control" required>
                                @foreach($sensors as $sensor)
                                    <option value="{{$sensor->id}}">{{$sensor->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Saqlash</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Bekor qilish</button>
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
