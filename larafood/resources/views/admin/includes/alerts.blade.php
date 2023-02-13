@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif
@if(session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@endif
