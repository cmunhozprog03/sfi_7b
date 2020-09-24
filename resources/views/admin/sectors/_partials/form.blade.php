@csrf
<div class="form-group">
    <label>Nome</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{$sector->name ?? old('name')}}" name="name">

    @error('name')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror

</div>
<div class="form-group">
    <label>Descrição</label>
    <input type="text" class="form-control @error('description') is-invalid @enderror" value="{{$sector->description ?? old('description')}}" name="description">

    @error('description')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror

</div>
<div class="form-group">
    <label>Descrição Longa</label>
    <textarea type="text" class="form-control @error('body') is-invalid @enderror" value="" name="body">{{$sector->body ?? old('body')}}</textarea>

    @error('body')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror


</div>
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label>Ordem</label>
            <input type="text" class="form-control @error('position') is-invalid @enderror" value="{{$sector->position ?? old('position')}}" name="position">

            @error('position')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror

        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label>Ativo</label>
            <input type="text" class="form-control @error('condition') is-invalid @enderror" value="{{$sector->condition ?? old('condition')}}" name="condition">

            @error('condition')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Selecione a imagem</label>
            <input type="file" class="form-control-file @error('image') is-invalid @enderror"  name="image">

            @error('image')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror

        </div>
    </div>
</div>


<button type="submit" class="btn btn-primary">Submit</button>