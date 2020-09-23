@extends('admin.layouts.main')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <h2 class="mt-2 mb-2">Editar Setor: {{$sector->name}}</h2>
        </div>
        <div class="row justify-content-center" >

            <form action="{{route('setores.update', $sector->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="name" value="{{$sector->name}}">
                </div>
                <div class="form-group">
                    <label>Descrição</label>
                    <input type="text" class="form-control" name="description" {{$sector->descripiton}}>
                </div>
                <div class="form-group">
                    <label>Descrição Longa</label>
                    <textarea type="text" class="form-control" name="body" {{$sector->body}}></textarea>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Ordem</label>
                            <input type="text" class="form-control" name="position" {{$sector->position}}>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Ativo</label>
                            <input type="text" class="form-control" name="condition" {{$sector->condition}}>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Selecione a imagem</label>
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>

                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>



@endsection
