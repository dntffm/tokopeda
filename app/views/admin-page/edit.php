 <?php
   
 ?>
 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">Daftar Produk</h1>
     <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more
         information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
             DataTables documentation</a>.</p>

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>#</th>
                             <th>Nama Produk</th>
                             <th>Harga Produk</th>
                             <th>Stok</th>
                             <th>Status</th>
                             <th>Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php 
                $nomer = 1;
                foreach($data["product"] as $product):
                
             ?>
                         <tr>
                             <td><?=$nomer++;?></td>
                             <td><?=$product["product_name"];?></td>
                             <td><?=$product["product_price"]?></td>
                             <td><?=$product["stock"]?></td>
                             <td><?=$product["status"]?></td>
                             <td>
                                 <a href="<?=BASE_URL?>/AdminPage/formUpdate/<?=$product["product_id"]?>" class="badge badge-primary">Update</a>
                                 <a href="<?=BASE_URL?>/AdminPage/hapus/<?=$product["product_id"]?>" onclick="return confirm('Yakin Untuk Dihapus ?')" class="badge badge-danger">Hapus</a>
                                 

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
 