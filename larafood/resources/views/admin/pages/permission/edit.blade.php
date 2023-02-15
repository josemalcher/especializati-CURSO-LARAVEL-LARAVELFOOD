@extends('adminlte::page')

@section('title', "Editar Permissão {$permission->name}")

@section('content_header')
    <h1>Editar Permissão {{$permission->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('permissions.update', $permission->id)}}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('admin.pages.permission._partials.form')
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log("Editar Permissão {{$permission->name}}"); </script>
@stop
