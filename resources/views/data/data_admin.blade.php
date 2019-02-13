@extends('template')

@section('judul')
Data admin
@stop

@section('ac-admin')
active
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="admin/add"><button type="button" class="btn bg-green btn-flat margin">Add New</button></a>
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $rsUsers)
            <tr>
                  <td>{{ $rsUsers -> id }}</td>
                  <td>{{ $rsUsers -> name }}</td>
                  <td>{{ $rsUsers -> email }}</td>
                  <td>
                  <a href="/admin/edit/{{ $rsUsers->id }}"><button type="button" class="btn bg-yellow btn-flat"><i class="fa fa-pencil"></i></button></a>
                  <a onclick="return confimation_hapus(this)" link="/admin/hapus/{{ $rsUsers->id }}"><button type="button" class="btn bg-red btn-flat"><i class="fa fa-trash"></i></button></a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@stop

