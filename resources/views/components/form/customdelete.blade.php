<button class="btn btn-danger"  onclick="custom_delete('{{$cstable}}','{{$csidcol}}','{{$csid}}')">Delete</button>
{{--use as--}}
{{--<x-form.customdelete cstable="" csbidcol="" csid="" />--}}

{{--other way using controller--}}
{{--  <form id="" action="{{url('/acp/manufacturer/'.$list->mf_id)}}" method="POST">--}}
{{--  @csrf--}}
{{--  @method('DELETE')--}}
{{--  <button type="submit" onclick="return confirm('Are you really want to delete the data')" class="btn btn-danger">Delete</button>--}}
{{--  </form>--}}
<script>
    function custom_delete(cstable,csidcol,csid){
      if(confirm('Are really want to delete this record ?')){
          $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type: "post",
              url: "{{url('/acp/custom/delete')}}",
              data: {table: cstable, id_col: csidcol, id: csid},
              success: function (re) {
                  if (re['status']) {
                      window.location.reload();
                  } else {
                      alert(re['message']);
                  }
              }
          });
      }

    }
</script>
