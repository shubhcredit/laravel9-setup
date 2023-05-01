<div class="form-group col-sm-{{$col}}">
    @if($label!=null)
    <label for="{{$name}}"> {{$label}} {{$required}} </label>
    @endif
    <select name="{{$name}}" id="{{$name}}" class="form-control" @if($required) required @endif >
        <option value="" >Select {{$required}} </option>
        @if($option==null && $val==null)
            @foreach($arr  as $list)
                <option @selected($list==$selected) value="{{$list}}" >{{ ucfirst($list)}}</option>
            @endforeach
        @else
            @foreach($arr  as $list)
                <option @selected($list[$val]==$selected) value="{{$list[$val]}}" >{{ ucfirst($list[$option])}}</option>
            @endforeach
        @endif

    </select>
    @error($name)
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>

{{-- <x-form.input-option label="label" name="name" :arr="Array option" val="option_val" option="option_label" required="*" selected="{{$old_val}}" col="6"/> --}}
