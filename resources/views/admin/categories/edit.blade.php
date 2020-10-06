@section('title', "Editar Categoria {$category->name}")

@section('content')

    <div class="container">
        <div class="row justify-content-center mt-1">
            <div class="col-md-8 col-lg-8 col-sm-12">
                <div class="w3-card-4">
                    <div class="w3-container w3-amber">
                        <h2>Editar Categoria: {{$category->name}}</h2>

                    </div>
                    <form class="w3-container w3-light-grey" action="{{route('categorias.update', $category->id)}}" method="post"
                          enctype="multipart/form-data">
                        @method('PUT')
                        @include('admin.categories._partials.form')
                    </form>
                </div>
            </div>
        </div>

@endsection
