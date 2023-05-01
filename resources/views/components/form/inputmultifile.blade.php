
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
    <div class="form-group">
        <label for="{{$name}}">{{$label}}</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" name="{{$name}}[]" class="custom-file-input" id="{{$name}}" multiple>
                <label class="custom-file-label" for="{{$name}}">Choose file</label>
            </div>
            <div class="input-group-append">
                <span class="input-group-text">Upload</span>
            </div>
        </div>
    </div>
    @error($name)
    <span class="text-danger">{{$message}}</span>
    @enderror

    {{-- <span><img src="{{$value}}" height="{{$height}}" alt="{{$value}}"></span> --}}

{{--    for use <x-form.inputfile name="image" label="Add the Image" value="" height=""/>--}}
