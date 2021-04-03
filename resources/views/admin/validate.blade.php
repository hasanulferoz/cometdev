@if($errors->any())
    <script>
    swal({
        title: "Validation erroe",
        text: "{{ $errors-> first()}}",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    });
    </script>
@endif

@if(Session::has('success'))
  
    <script>
        swal('success', '{{session::get('success')}}', 'success');
    </script>
@endif


