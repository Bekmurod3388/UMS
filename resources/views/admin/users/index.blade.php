@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-9"><h1 class="card-title">Foydalanuvchilar</h1></div>
                    <div class="col-md-1">
                        <a href="{{route('admin.users.create')}}" class="btn btn-primary disabled">
                            <span class="btn-label">
                                <i class="fa fa-pen"></i>
                            </span>
                            Yaratish
                        </a>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th>Ism</th>
                                <th>Familiyasi</th>
                                <th>Email</th>
                                <th>Amallar</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->surname}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <form action="{{route('admin.users.store')}}" method="post"
                                          id="form_{{$user->id}}">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick=""
                                                class="btn btn-warning" type="button" title="O&#8216;zgartirish"><i class="fas fa-pencil-alt"></i>
                                        </button>

                                        <button type="button" class="btn btn-danger disabled" onclick="remove(this.parentNode)"
                                                title="O&#8216;chirish">
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
@endsection
