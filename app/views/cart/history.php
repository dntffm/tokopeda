    
    <div class="product-cart-area pt-120 pb-130 mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="table-content table-responsive">
                        <table>
                            <thead >
                                <tr>
                                    <th class="product-name">Nama Penerima</th>
                                    <th class="product-price">nama product</th>
                                    <th class="product-name">kuantitas</th>
                                    <th class="product-price">harga</th>
                                    <th class="product-quantity">Sub Total</th>
                                    <th class="product-subtotal">status</th>
                                    <th class="product-subtotal">aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(isset($data)) :
                                    foreach($data as $order) : ?>
                                <tr>
                                    <td><?=$order["nm_penerima"]?></td>
                                    <td><?=$order["product_name"]?></td>
                                    <td><?=$order["kuantitas"]?></td>
                                    <td><?="Rp. ".$order["product_price"]?></td>
                                    <td>
                                        <?php
                                            $qty = $order["kuantitas"];
                                            $harga = (int) str_replace('.','',$order["product_price"]);
                                            echo "Rp. ".number_format($qty * $harga,0,'.','.');
                                        ?>
                                    </td>
                                    <td><?=$order["status_order"]?></td>
                                    <td>
                                        <?php if($order["status_order"] == "paid") : ?>
                                            <a href="<?=BASE_URL?>/ dsd/<?=$order["id_order"]?>" class="btn btn-warning text-light">Terima Barang</a>
                                        <?php endif; ?>
                                        <a href="<?=BASE_URL?>/cart/invoice/<?=$order["id_order"]?>" class="btn btn-primary text-light">lihat invoice</a>
                                    </td>
                                </tr>
                                <?php 
                                    endforeach;
                                    endif;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
