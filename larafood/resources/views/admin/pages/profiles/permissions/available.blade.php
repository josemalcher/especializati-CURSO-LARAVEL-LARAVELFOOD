@extends('adminlte::page')

@section('title', 'Permissões Disponíveis para Perfil {$profile->name}')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.index')}}">Perfis</a></li>
    </ol>
    <h1>Permissões Disponíveis Para Perfil {{$profile->name}}
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
                    <th width="50px">#</th>
                    <th>Nome</th>
                </tr>
                </thead>
                <tbody>
                <form action="{{ route('profiles.permissions.attach', $profile->id) }}" method="POST">
                    @csrf
                    @foreach($permissions as $permission)
                        <tr>
                            <td><input type="checkbox" name="permissions[]" id="{{$permission->id}}" value="{{$permission->id}}"></td>
                            <td>{{ $permission->name }}</td>
                        </tr>
                    @endforeach
                        <tr>
                            @include('admin.includes.alerts')
                            <td colspan="500"><button type="submit" class="btn btn-success">Vincular</button></td>
                        </tr>
                </form>
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
