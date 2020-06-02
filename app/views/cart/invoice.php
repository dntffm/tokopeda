
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    
    <style>
    button{
        background-color: #353535;
        padding : 20px;
        border: none;
        color:white;
    }
    button:hover{
        cursor:pointer;
        background-color: #444355;
    }
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <h1>TokoPeda</h1>
                            </td>
                            
                            <td>
                                Invoice #: <?=$data["orderlist"][0]["id_order"]?><br>
                                Tanggal Beli: <?=Datetime::createFromFormat('Y-m-d H:i:s',$data["orderlist"][0]["od_created_at"])->format("d/m/Y H:i:s")?><br>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            
                            
                            <td>
                                <strong>Nama Akun: </strong>
                                <?=$data["customer"]["cust_uname"]?><br>
                                <strong>Nama penerima: </strong>
                                <?=$data["orderlist"][0]["nm_penerima"]?><br>
                                <strong>Alamat penerima:</strong>
                                <?=$data["orderlist"][0]["dst_city"].",".$data["orderlist"][0]["dst_province"].','.$data["orderlist"][0]["postal_code"]?><br>
                                <strong>Nomer HP: </strong>
                                <?=$data["orderlist"][0]["phone"]?>
                            </td>

                            <td>
                                <strong>ID Order: </strong>
                                <?=$data["orderlist"][0]["id_order"]?><br>
                                <strong>Jasa Kirim: </strong>
                                <?=$data["orderlist"][0]["courier"]?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Payment Method
                </td>
                
                <td>
                    Check #
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    Check
                </td>
                
                <td>
                    1000
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Price
                </td>
            </tr>
            
            <?php $total = 0; foreach($data["orderlist"] as $item) : $total+=((int) str_replace(".",'',$item["product_price"]) * $item["kuantitas"])?>
            <tr class="item">
                <td>
                    <?=$item["product_name"]." (x".$item["kuantitas"].")"?>
                </td>
                
                <td>
                   Rp. <?=$item["product_price"]?>
                </td>
            </tr>
            <?php endforeach; ?>
           
            
            <tr class="total">
                <td></td>
                
                <td>
                   Total: Rp.<?= number_format($total,0,'.','.') ?>
                </td>
            </tr>
        </table>
    </div>
    <button>Download Invoice</button>
</body>
</html>
