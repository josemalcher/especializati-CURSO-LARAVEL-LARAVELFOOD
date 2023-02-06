@csrf

<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" placeholder="Nome" class="form-control" value="{{$detail->name ?? old('name')}}">
</div>
<div class="form-group">
    <button class="btn btn-primary" type="submit">Enviar</button>
</div>
