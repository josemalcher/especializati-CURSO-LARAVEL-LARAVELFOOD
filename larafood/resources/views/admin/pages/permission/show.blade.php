@extends('adminlte::page')

@section('title', "Detalhes da Permissão {$permission->name}")

@section('content_header')
    <h1>Detalhes do Permissão:  {{$permission->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li><strong>Nome: </strong>{{$permission->name}}</li>
                <li><strong>Descrição: </strong>{{$permission->description}}</li>
            </ul>
            @include('admin.includes.alerts')
            <form action="{{route('permissions.destroy', $permission->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">DELETAR PERFIL: {{$permission->name}}</button>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('SHOW Permissão {{$permission->name}}'); </script>
@stop
