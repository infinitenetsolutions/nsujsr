<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>
<script src="dist/js/demo.js"></script>
<script>
    function alert_toast(alert_option, message){ 
        if(alert_option == "success")
            toastr.success(message);
        if(alert_option == "info")
            toastr.info(message);
        if(alert_option == "error")
            toastr.error(message);
        if(alert_option == "warning")
            toastr.warning(message);
    }
    function slowInternet(){
        setTimeout(function(){ 
            if($("#loading").is(":visible")){
                alert_toast("error", "Something went wrong, Please check your Internet Connection!!!");
                setTimeout(function(){ 
                    if($("#loading").is(":visible")){
                        slowInternet();
                    } else
                        return false;
                }, 30000);
            } else
                return false;
        }, 30000);
    }
    function main(action){
        $('#loader_section').append('<center id = "loading"><img width="50px" src = "images/ajax-loader.gif" alt="Loading..." /><br/><br/></center>');
        var allData = "action=" + action;
        $.ajax({
            url: 'include/view.php',
            type: 'POST',
            data: allData,
            success: function(result) {
                $('#loading').fadeOut(500, function() {
                    $(this).remove();
                    $("#data").html(result);
                    return false;
                });
            }
        });
    }
</script>
