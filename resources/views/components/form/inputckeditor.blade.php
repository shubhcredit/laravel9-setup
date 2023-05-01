
<div class="form-group">
    <label for="ckeditor{{$name}}">{{$label}}</label>
    <textarea name="{{$name}}" id="ckeditor{{$name}}" cols="30" rows="10">{{$value}} </textarea>
</div>
@error($name)
<span class="text-danger ">{{$message}}</span>
@enderror
{{--for use <x-form.inputckeditor label="" name="" value="optional" />--}}
<script>
    ClassicEditor
        .create( document.querySelector( '#ckeditor'+'{{$name}}' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
