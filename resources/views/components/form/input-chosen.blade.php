
<div class="form-group col-sm-{{$col}}">
    @if($label!=null)
    <label for="{{$name}}"> {{$label}}  {{$required}} </label>
    @endif
    <select name="{{$name}}[]" id="{{$name}}" class="form-control chosen-select" @if($required) required @endif multiple >
        @if($option==null && $val==null)
            @foreach($arr  as $list)
                <option @selected(str_contains($selected,$list)) value="{{$list}}" >{{ ucfirst($list)}}</option>
            @endforeach
        @else
            @foreach($arr  as $list)
                <option @selected(str_contains($selected,$list[$val])) value="{{$list[$val]}}" >{{ ucfirst($list[$option])}}</option>
            @endforeach
        @endif
    </select>
    @error($name)
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
{{-- <x-form.input-select2 label="label" name="name" :arr="Array option" val="option_val" option="option_label" selected="{{$old_val}}" col="6"/> --}}


{{-- //------------------ADD THIS LINK IN HEADER-----------------------------
    <script  src="{{asset('cp/plugins/chosen/js/chosen.min.js')}}"  crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('cp/plugins/chosen/css/chosen.css')}}">
--}}
     
{{-- //--------------------------- ADD THIS IN FOOTER FOR INITIALIZE      
    $("#id").chosen();//  name is id in that case
        or 
    $(".chosen-select").chosen();
 --}}