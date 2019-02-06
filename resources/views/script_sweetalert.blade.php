<script>
$(document).ready(function(){
        $(".hapus").click(function(){
            var det = $("#datas").val();
            $.ajax({
                type: 'POST',
                url: '/kategori/hapus/{{ $rsKat->kd_kategori }}'+det,
                success: function(data) {
    swal({   title: "Your account will be deleted permanently!",   
    text: "Are you sure to proceed?",   
    type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",   
    confirmButtonText: "Yes, Remove My Account!",   
    cancelButtonText: "No, I am not sure!",   
    closeOnConfirm: false,   
    closeOnCancel: false }, 
    function(isConfirm){   
        if (isConfirm) 
    {   
        swal("Account Removed!", "Your account is removed permanently!", "success");   
        } 
        else {     
            swal("Hurray", "Account is not removed!", "error");   
            } });
}
                }
            });
   });
});
</script>