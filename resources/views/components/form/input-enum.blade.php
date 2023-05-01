<div class="form-group col-sm-{{$col}}">
    @if($label!=null)
    <label for="{{$name}}"> {{$label}} {{$required}} </label>
    @endif
    <select name="{{$name}}" id="{{$name}}" class="form-control" @if($required) required @endif >
        @foreach($arr  as $key=>$val)
            <option @selected($key==$selected) value="{{$key}}" >{{ ucfirst($val)}}</option>
        @endforeach
    </select>
    @error($name)
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>

{{-- <x-form.input-enum label="label" name="name" :arr="Array option" required="*" selected="{{$old_val}}" col="6"/> --}}
