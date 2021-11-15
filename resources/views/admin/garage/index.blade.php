@extends('admin.master')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-9"><h1 class="card-title">Гараж</h1></div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-primary" onclick="createGarage()">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Добавить Гараж
                        </button>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">№</th>
                            <th class="col-8" scope="col">Номер Гаража</th>
                            <th style="width: auto" scope="col">Действие</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($garages as $garage)
                                <tr>
                                    <th scope="row" class="col-1">{{$garage->id}}</th>
                                    <td>{{$garage->number}}</td>
                                    <td>
                                        <form action="{{route('admin.garage.destroy', ['garage' => $garage])}}" method="post"
                                              id="form_{{$garage->id}}">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="createGarage('{{$garage->number}}', '{{route('admin.garage.update', ['garage' => $garage])}}')"
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
            <form action="{{route('admin.garage.store')}}" method="post" id="firm">
                @csrf
                <input type="hidden" name="_method" id="_method" value="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Добавить Гараж</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="number">№ Гаража</label>
                            <input type="text" name="number" id="number" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
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

        {{--$(document).ready(function() {--}}
        {{--    $("#myBtn").click(function() {--}}
        {{--        $('#form_forType').attr('action', '{{route('admin.garage.store',['garage'=>$garage->id])}}');--}}
        {{--        $("#type").val('');--}}
        {{--        $("#order").val(null)--}}

        {{--        $("#myModal").modal();--}}
        {{--    });--}}
        {{--});--}}

        {{--function fillData(type, order, id) {--}}
        {{--    let route = '{{route('admin.garage.update',['garage'=>$garage->id])}}';--}}
        {{--    $('#form_forType').attr('action', route.substr(0, route.length - 1) + id);--}}
        {{--    $("#type").val(type);--}}
        {{--    $("#order").val(order);--}}

        {{--    $("#myModal").modal();--}}
        {{--}--}}

        function createGarage(val = '', action = '') {
            let form = $('#firm')
            let method = $('#_method')
            if (val === '') {
                form.attr('action', "{{route('admin.garage.store')}}")
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
                title: '',
                text: "",
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
