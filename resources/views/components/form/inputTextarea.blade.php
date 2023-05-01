<div class="form-group  col-sm-{{$col}} ">
    @if($label)
        <label for="{{$name}}" class="form-label">{{$label}} {{$required}}</label>
    @endif
    <textarea name="{{$name}}" class="form-control" id="{{$name}}" placeholder="Write {{snakeToName($name)}} ... {{$required}}"  rows="{{$rows}}">{{$value}}</textarea>
    @error($name)
    <span class="text-danger ">{{$message}}</span>
    @enderror
</div>
{{--use this <x-form.inputTextarea  name="title" rows="5"  label="Enter Title" value="optional"/>--}}


