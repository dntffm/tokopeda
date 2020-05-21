$(document).ready(function(){
    $("#provinsi").change(function(){
        var idProv = $("#provinsi").val();

        $.ajax({
            type : 'POST',
            url : "http://localhost/tokopeda/public/cart/getKotaByProvId",
            data : 'prov_id='+idProv,
            success : function(data){
                $("#kabupaten").html(data);
            }

        })
    })
})