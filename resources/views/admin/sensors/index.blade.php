@extends('admin.master')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-9"><h1 class="card-title">Сенсорлар</h1></div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-primary" onclick="createSensor()">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Сенсор қўшиш
                        </button>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">№</th>
                            <th class="col-2" scope="col">Номи</th>
                            <th class="col-6" scope="col">Тури</th>
                            <th style="width: auto" scope="col">Амаллар</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($sensors as $sensor)
                            <tr>
                                <th scope="row" class="col-1">{{$sensor->id}}</th>
                                <td>{{$sensor->name}}</td>
                                <td>{{$sensor->type}}</td>
                                <td>
                                    <form action="{{route('admin.sensors.destroy', ['sensor' => $sensor])}}" method="post"
                                          id="form_{{$sensor->id}}">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="createSensor('{{$sensor->name}}', '{{route('admin.sensors.update', ['sensor' => $sensor])}}')"
                                                class="btn btn-warning" type="button" title="Изменить"><i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger" onclick="remove(this.parentNode)"
                                                title="Удалить">
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
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{route('admin.sensors.store')}}" method="post" id="firm">
                @csrf
                <input type="hidden" name="_method" id="_method" value="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Добавить Водитель</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Номи</label>
                            <select name="name" id="name" class="custom-select">
                                <option value="Температура">Температура</option>
                            </select>
{{--                            <input type="text" name="name" id="name" class="form-control" autocomplete="off" required>--}}
                        </div>
                        <div class="form-group">
                            <label for="type">Тури</label>
                            <select name="type" id="type" class="custom-select">
                                <option value="DHT">DHT</option>
                            </select>
{{--                            <input type="text" name="type" id="type" class="form-control" autocomplete="off" required>--}}
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
        $('#table_search').keyup(function () {
            let qiymat = this.value.toLowerCase();
            $('tbody tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(qiymat) > - 1)
            })
        });

        function createSensor(val = '', action = '') {
            let form = $('#firm')
            let method = $('#_method')
            if (val === '') {
                form.attr('action', "{{route('admin.sensors.store')}}")
                $('#number').val('')
                // method.val("POST")
            } else {
                method.val("PUT")
                form.attr('action', action)
                $('#number').val(val)
            }

            $('#modal').modal()
        }
        function remove(form) {
            Swal.fire({
                title: 'Точно хотите?',
                text: "После удаление всех данные будет потеряны",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dd3333',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Да',
                cancelButtonText: 'Нет'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire({
                        title: 'Успешно удалено!',
                        icon: 'success',
                        showConfirmButton: false,
                    });
                }
            });
        }
    </script>
@stop
