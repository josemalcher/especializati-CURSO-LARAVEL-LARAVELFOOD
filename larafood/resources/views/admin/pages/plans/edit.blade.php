@extends('adminlte::page')

@section('title', "Editar Plano {$plan->name}")

@section('content_header')
    <h1>Editar o plano {{$plan->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('plans.update', $plan->url)}}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('admin.pages.plans._partials.form')
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Cadastrar Novo Plano'); </script>
@stop
