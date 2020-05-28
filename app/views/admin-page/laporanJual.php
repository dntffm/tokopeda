 <?php
/*  echo "<pre>";
 var_dump($data);
 echo "</pre>"; */

 ?>
 
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Laporan Penjualan</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Laporan Penjualan</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Tanggal Order</th>
            <th>Nama Penerima</th>
            <th>Nama Produk</th>
            <th>Kuantitas</th>
            <th>Total harga</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $no = 1; 
            foreach($data as $order) :  
            $total = (int) $order["kuantitas"] * (int) str_replace('.','',$order["product_price"]);
            
          ?>
          <tr>
            <td><?=$no++;?></td>
            <td><?= DateTime::createFromFormat('Y-m-d H:i:s',$order["created_at"])->format("d/m/Y") ?></td>
            <td><?=$order["nm_penerima"]?></td>
            <td><?=$order["product_name"]?></td>
            <td><?=$order["kuantitas"]?></td>
            <td>Rp. <?=number_format($total,0,'.','.')?></td>
            <td><?=$order["status_order"]?></td>
            <td>
              <?php if($order["status_order"] == "paid") { ?>
                <a href="<?=BASE_URL?>/Adminpage/ubahstatusorder/<?=$order["id_order"]?>" class="btn btn-danger" > 
                  Kirim Barang
                </a>
              <?php } if($order["status_order"] == "done"){ ?>
                <p>Barang sudah diterima</p>
              <?php } ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>



<!-- End of Main Content -->