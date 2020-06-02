$(document).ready(function(){

    $("#provinsi").change(function(){
        var idProv = $("#provinsi").val();
        json = null;
        $.ajax({
            type : 'POST',
            url : "http://localhost/tokopeda/public/cart/getKotaByProvId/",
            data : {idProv : idProv},
            success : function(data){
               $("#kabupaten").html(data);        
            }

        })
    })

    $("#kurir").change(function(){
        var berat = $("#berat").val();
        var kotaTujuan = $("#kabupaten").val();
        var kurir = $("#kurir").val();
        
        $.ajax({
            type : "POST",
            url : "http://localhost/tokopeda/public/cart/getDataOngkir/",
            data : {berat : berat,kotaTujuan : kotaTujuan, kurir : kurir},
            success : function(data){
                json = JSON.parse(data);
                cost = json["rajaongkir"]["results"][0]["costs"][0]["cost"][0]["value"];
                cost = parseFloat(cost) * parseFloat(berat);
               
                subtotal = $("#subtotal").text().replace("Rp","").replace(".","").split(".").join("");  
                subtotal = parseFloat(subtotal);
                total = cost+subtotal;

                formatedCost = cost.toString().split('').reverse().join('').match(/\d{1,3}/g).join('.').split('').reverse().join('');
                formatedTotal = total.toString().split('').reverse().join('').match(/\d{1,3}/g).join('.').split('').reverse().join('');


               
                $("#total").text("Rp. "+formatedTotal);
            }
        })
    })

    $("#submit").click(function(event){
        if( $("#provinsi").val() == "Pilih Provinsi" ){
            event.preventDefault();
            alert("Provinsi invalid");
        } else if($("#kabuapaten").val() == "Kota"){
            event.preventDefault();
            alert("Kota Invalid");
        } else if($("#kurir").val() == "Kurir" ){
            event.preventDefault();
            alert("Kurir Invalid");
        } else{
            return;
        }
    })


})