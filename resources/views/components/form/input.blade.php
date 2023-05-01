<div class="form-group col-sm-{{$col}}">
    @if($label)
        <label for="{{$name}}" class="form-label">{{$label}} {{$required}}</label>
    @endif
    <input type="{{$type}}" @if($required) required @endif  class="form-control" name="{{$name}}" id="{{$name}}" placeholder="Enter {{ snakeToName($name)}} {{$required  }}" maxlength="{{$maxlength}}" value="{{$value}}">
    @error($name)
        <span class="text-danger ">{{$message}}</span>
    @enderror
</div>
{{--use this <x-form.input type="text" name="title" label="Enter Title" value="optional" required="*" col="6" />--}}
