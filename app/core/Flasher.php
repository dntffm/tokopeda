<?php

class Flasher {
    public static function setFlash($icon, $title, $text){
        $_SESSION["flash"] = [
            'icon' => $icon,
            'title' => $title,
            'text' => $text
        ];
    }

    public static function Flash(){
        if(isset($_SESSION["flash"])) {
            /* echo '
            <div class="alert alert-'.$_SESSION["flash"]["tipe"].'" alert-dismissible fade show" role="alert">
            <strong>'.$_SESSION["flash"]["aksi"].'</strong> '.$_SESSION["flash"]["pesan"].'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            '; */
            echo "<script type='text/javascript'>
            Swal.fire({
                icon: '".$_SESSION["flash"]["icon"]."',
                title: '".$_SESSION["flash"]["title"]."',
                text: '".$_SESSION["flash"]["text"]."'
              })
            
            </script>";
        }

        unset($_SESSION["flash"]);
    }
}