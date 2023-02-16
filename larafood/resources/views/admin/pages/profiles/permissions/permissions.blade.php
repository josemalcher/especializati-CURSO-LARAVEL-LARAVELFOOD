@extends('adminlte::page')

@section('title', 'Permissões do Perfil {$profile->name}')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.index')}}">Perfis</a></li>
    </ol>
    <h1>Permissões do Perfil {{$profile->name}}
        <a href="{{route('profiles.create')}}" class="btn btn-dark">Adicionar Permissão</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <!--Ajustar em breve-->
            <form action="{{route('profiles.search')}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter"
                       placeholder="Nome"
                       class="form-control"
                       value="{{$filters['filter'] ?? ''}}"
                >
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{$permission->name}}</td>
                        <td>
                            <a href="{{route('profiles.edit', $permission->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Permissões do Perfil {$profile->name}'); </script>
@stop
