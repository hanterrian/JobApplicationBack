<label for="{{$id}}" class="text_field_block">
    <span class="text_field_label">{{$label}}</span>
    <input class="text_field_input @error($name) text_field_input_error @enderror" type="text" id="{{$id}}" name="{{$name}}" value="{{$value}}"/>
    @error($name)
    <span class="text_field_error">
        {{$message}}
    </span>
    @enderror
</label>
