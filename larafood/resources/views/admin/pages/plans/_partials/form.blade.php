<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name"
           value="{{$plan->name ?? ''}}"
           class="form-control" placeholder="Nome:">
</div>
<div class="form-group">
    <label>Preço:</label>
    <input type="text" name="price"
           value="{{$plan->price ?? ''}}"
           class="form-control" placeholder="Preço:">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="description"
           value="{{$plan->description ?? ''}}"
           class="form-control" placeholder="Descrição:">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
