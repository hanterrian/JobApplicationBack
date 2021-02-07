<div class="form-group form-check">
    <input type="hidden" name="{{$name}}" value="0">
    <input type="checkbox" class="form-check-input" name="{{$name}}" id="{{$id}}" value="{{$value}}" @if($checked) checked="checked" @endif>
    <label class="form-check-label" for="{{$id}}">{{$label}}</label>
</div>
