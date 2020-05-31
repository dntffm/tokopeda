 <?php Flasher::Flash(); ?>
 
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Produk Baru</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Produk Baru</h6>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <form action="<?=BASE_URL?>/AdminPage/tambah" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama-produk">Nama Produk</label>
                                <input type="text" class="form-control" id="nama-produk" name="nama-produk" required>
                            </div>
                            <div class="form-group">
                                <label for="harga-produk">Harga Produk</label>
                                <input type="text" class="form-control" id="harga-produk" name="harga-produk" required>
                            </div>
                            <div class="form-group">
                                <label for="weight">Berat</label>
                                <input type="text" class="form-control" id="weight" name="weight" required>
                            </div>
                            <div class="form-group">
                                <label for="brand-produk">Brand Produk</label>
                                <input type="text" class="form-control" id="brand-produk" name="brand-produk" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis-produk">Jenis Produk</label>
                                <select class="form-control" id="jenis-produk" name="jenis-produk" required>
                                    <option value="sepeda">sepeda</option>
                                    <option value="asesoris">asesoris</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tag">Tag</label>
                                <input type="text" class="form-control" id="tag" name="tag" required><small id="emailHelp" class="form-text text-muted">Pisahkan dengan koma(,) untuk tiap tagnya. misal : Mtb,Polygon,dst</small>
                            </div>
                            <div class="form-group">
                                <label for="gambar-produk">Pilih Gambar (377x488 pixel)</label>
                                <input type="file" class="form-control-file" id="gambar-produk" name="gambar-produk">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Produk</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                    
                </div>
            </div>
           
        </div>
    </div>
 </div>
 <!-- End of Main Content -->