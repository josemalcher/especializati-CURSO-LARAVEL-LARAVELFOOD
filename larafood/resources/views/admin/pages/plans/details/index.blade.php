@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan=>name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
        <li class="breadcrumb-item "><a href="{{route('plans.show', $plan->url)}}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item active"><a href="{{route('details.plan.index', $plan->url)}}">Detalhes</a></li>
    </ol>
    <h1>Detalhes do Plano: {{$plan->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th width="50">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($details as $detail)
                    <tr>
                        <td>{{$plan->name}}</td>
                        <td><a href="{{route('plans.edit', $plan->url)}}" class="btn btn-primary">Edit</a></td>
                        <td><a href="{{route('plans.show', $plan->url)}}" class="btn btn-warning">Ação</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $details->appends($filters)->links() !!}
            @else
                {!! $details->links() !!}
            @endif
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
