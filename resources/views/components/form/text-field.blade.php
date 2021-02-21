<div class="form-group">
    <label for="{{$id}}">{{$label}}</label>
    <textarea class="form-control @error($name) is-invalid @enderror" id="{{$id}}" name="{{$name}}">{{$value}}</textarea>
    @error($name)
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
