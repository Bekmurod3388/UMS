@extends('admin.master')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-9"><h1 class="card-title">Вендоры</h1></div>
                    <div class="col-md-1">
                        <a class="btn btn-primary" href="{{route('admin.vendors.create')}}">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Добавить Вендор
                        </a>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                        <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Рисунок</th>
                            <th scope="col">Имя</th>
                            <th scope="col">Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($vendors as $vendor)
                        <tr>
                            <th scope="row" class="col-1">{{$vendor->id}}</th>
                            <td><img src="/storage/{{$vendor->img}}" width="180px"></td>
                            <td>{{$vendor->name }}</td>
                            <td class="col-2">
                                <form action="{{ route('admin.vendors.destroy',$vendor->id) }}" method="POST">
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.vendors.edit',$vendor->id) }}">
                                    <span class="btn-label">
                                        <i class="fa fa-pen"></i>
                                    </span>

                                </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><span class="btn-label">
                                        <i class="fa fa-trash"></i>
                                    </span></button>
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


@endsection
