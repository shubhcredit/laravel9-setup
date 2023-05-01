
<div class="form-group col-sm-{{$col}}">
    @if($label)
        <label for="{{$name}}">{{$label}} {{$required}}</label>
    @endif
    <input type="file" name="{{$name}}" class="form-control" id="{{$name}}" @if($required) required @endif >
    @error($name)
    <span class="text-danger">{{$message}}</span>
    @enderror
    @if($value)
        <span><img src="{{$value}}" height="{{$height}}" alt="{{$value}}"></span>
    @endif
</div>
{{--    for use <x-form.inputfile name="image" label="Add the Image" value="" height="" required="*" col="default-6"/>--}}


