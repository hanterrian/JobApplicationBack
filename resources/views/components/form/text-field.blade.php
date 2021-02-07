<div class="form-group">
    <label for="{{$id}}">{{$label}}</label>
    <input class="form-control @error($name) is-invalid @enderror" type="text" id="{{$id}}" name="{{$name}}" value="{{$value}}"/>
    @error($name)
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
