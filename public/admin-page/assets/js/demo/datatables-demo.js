$(document).ready(function() {
  $('#dataTable1').DataTable();
  $('#dataTable2').DataTable();

  
  /* 
  $("#filterByTime").change(function(){
    let filter = $("#filterByTime").val();
    $.ajax({
      url : 'http://localhost/tokopeda/public/AdminPage/orderByTime',
      type : 'post',
      data : {filter : filter},
      success : function(data){
        $.each(JSON.parse(data),function(key,value){
          console.log(value); 
            $("#contentBody").html(
              '<tr>'+
              '<td><?=$no++;?></td>'+
              '<td>'+value.od_created_at+'</td>'+
              '<td>'+value.nm_penerima+'</td>'+
              '<td>'+value.product_name+'</td>'+
              '<td>'+value.kuantitas+'</td>'+
              '<td>Rp. <?=number_format($total,0,".",".")?></td>'+
              '<td><?=$order["status_order"]?></td>'+
              '<td>'+
                '<?php if($order["status_order"] == "paid") { ?>'+
                  '<a href="<?=BASE_URL?>/Adminpage/ubahstatusorder/<?=$order["id_order"]?>" class="btn btn-danger" > '+
                    'Kirim Barang'+
                  '</a>'+
                '<?php } if($order["status_order"] == "done"){ ?>'+
                  '<p>Barang sudah diterima</p>'+
                '<?php } ?>'+
              '</td>'+
            '</tr>'
            )
        })
      }
    })
  }) */
})
