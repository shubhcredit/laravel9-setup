
<div class="form-group">
    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
        <input type="checkbox" @checked($csstatus=='active' || $csstatus=='read' || $csstatus=='complete') onchange="status_change('{{$cstable}}','{{$csidcol}}','{{$csid}}','{{$csstatuscol}}','{{$csstatus}}')" class="custom-control-input" id="cs{{$csid}}{{$csstatuscol}}">
        <label class="custom-control-label text-capitalize" for="cs{{$csid}}{{$csstatuscol}}">{{$csstatus}}</label>
    </div>
</div>
{{--use as--}}
{{--add this in header <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--<x-form.customswitch cstable="" csidcol="" csid="" csstatuscol="" csstatus=""/>--}}
<script>
    function status_change(cstable,csidcol,csid,csstatuscol,csstatus){
        // alert(cstable+csidcol+csid+csstatuscol+csstatus)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "{{url('/admin/toggle/status')}}",
            data:{table:cstable,id_col:csidcol,id:csid,status_col:csstatuscol,status:csstatus},
            success: function(re) {
                if(re['status']){
                    window.location.reload();
                }else{
                    alert(re['message']);
                }
            }
        });
    }
</script>
