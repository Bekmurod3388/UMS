@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10"><h1 class="card-title">Добавить Гараж</h1></div>
                </div>
                <hr>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>ОЙ!</strong> С вашим вводом возникли некоторые проблемы.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form action="{{route('admin.garage.update')}}" method="POST" accept-charset="UTF-8">
                        @csrf
                        <div class="form-group">
                            <label for="name">№ Гаража</label>
                            <input type="text" name="number" class="form-control" id="name" placeholder="№ Гаража" value="{{old('number',$garage->number)}}">
                        </div>

                        <button type="submit" id="alert" class="btn btn-primary">Сохранить</button>
                        <input type="reset" class="btn btn-danger" value="Очистить">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" style="padding:40px 50px;">
                    <form action="{{route('admin.equipment_type.add',['equipment'=>$equipment->id])}}" method="POST" id="form_forType" onsubmit="submit.disabled = true">
                        @csrf
                        <div class="form-group">
                            <label for="type"><span class="glyphicon glyphicon-user"></span> {{__('table.equipments.add_types')}}</label>
                            <input type="text" class="form-control" id="type" name="type" required>
                            <label for="order"><span class="glyphicon glyphicon-user"></span> {{__('table.equipments.order')}}</label>
                            <input type="number" class="form-control" id="order" name="order" required>
                        </div>

                        @can('add_users')
                            <input type="submit" id="submit" class="btn btn-success" value="{{__('table.add')}}">
                        @endcan
                        <button type="button" class="btn btn-danger btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>{{__('table.activity_type.button_cancel')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
