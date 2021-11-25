@extends('admin.master')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-9"><h1 class="card-title">Микроконтроллерлар</h1></div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-primary" onclick="createMicro()">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Микроконтроллер қўшиш
                        </button>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">№</th>
                            <th class="col-8" scope="col">Микроконтроллер номи</th>
                            <th class="col-8" scope="col">Сериал порт</th>
                            <th class="col-8" scope="col">Порт</th>
                            <th style="width: auto" scope="col">Амаллар</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($micros as $micro)
                            <tr>
                                <th scope="row" class="col-1">{{$micro->id}}</th>
                                <td>{{$micro->name}}</td>
                                <td>{{$micro->serialport}}</td>
                                <td>{{$micro->port}}</td>
                                <td>
                                    <form
                                        action="{{route('admin.microcontrollers.destroy', ['microcontroller' => $micro])}}"
                                        method="post"
                                        id="form_{{$micro->id}}">
                                        @method('DELETE')
                                        @csrf

                                        <button type="button" class="btn btn-danger" onclick="remove(this.parentNode)"
                                                title="Ўчириш">
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
            <form action="{{route('admin.microcontrollers.store')}}" method="post" id="firm">
                @csrf
                <input type="hidden" name="_method" id="_method" value="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Микроконтроллер қўшиш</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Микроконтроллерни танланг</label>
                            <select class="custom-select" name="name">
                                <option>Arduino Uno</option>
                                <option>ESP8266 Wemos D1</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="serialport">Сериал порт</label>
                            <select class="custom-select" name="serialport">
                                <option>USB 9600</option>
                                <option>WiFi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="port">Порт</label>
                            <select class="custom-select" name="port">
                                <option>COM1</option>
                                <option>COM2</option>
                                <option>COM3</option>
                                <option>COM4</option>
                                <option>COM5</option>
                                <option>COM6</option>
                                <option>COM7</option>
                                <option>COM8</option>
                                <option>COM9</option>
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
        $('#table_search').keyup(function () {
            let qiymat = this.value.toLowerCase();
            $('tbody tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(qiymat) > -1)
            })
        });

        function createMicro(val = '', action = '') {
            let form = $('#firm')
            let method = $('#_method')
            if (val === '') {
                form.attr('action', "{{route('admin.microcontrollers.store')}}")
                $('#number').val('')
                // method.val("POST")
            }

            $('#modal').modal()
        }

        function remove(form) {
            Swal.fire({
                title: 'Аниқ ўчиришни хоҳлайсизми?',
                text: "Маълумотларни ўчиргандан кейин қайта тиклай олмайсиз!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dd3333',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ха}',
                cancelButtonText: 'Йўқ'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire({
                        title: 'Муваффақиятли ўчирилди!',
                        icon: 'success',
                        showConfirmButton: false,
                    });
                }
            });
        }
    </script>
@stop
