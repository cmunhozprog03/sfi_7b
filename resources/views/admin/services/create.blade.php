@extends('admin.layouts.main')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <h2 class="mt-2 mb-2">Novo Setor</h2>
        </div>
        <div class="row justify-content-center" >

            <form action="{{route('setores.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="name">
                </div>
                 <div class="form-group">
                    <label>Descrição</label>
                    <input type="text" class="form-control" name="description">
                </div>




                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


@endsection
