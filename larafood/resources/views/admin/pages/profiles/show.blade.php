@extends('adminlte::page')

@section('title', "Detalhes do perfil {$profile->name}")

@section('content_header')
    <h1>Detalhes do perfil:  {{$profile->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li><strong>Nome: </strong>{{$profile->name}}</li>
                <li><strong>Descrição: </strong>{{$profile->description}}</li>
            </ul>
            @include('admin.includes.alerts')
            <form action="{{route('profiles.destroy', $profile->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">DELETAR PERFIL: {{$profile->name}}</button>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('DEletar Perfil'); </script>
@stop
