<div class="login-register-area ptb-130 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> login </h4>
                        </a>
                        <a data-toggle="tab" href="#lg2">
                            <h4> daftar </h4>
                        </a>
                    </div>
                    <?php
                    if(isset($_SESSION["regsuccess"])){
                      $auth = $_SESSION["regsuccess"];
                      if($auth){
                        echo '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                           Register Berhasil, Silahkan Login
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                        </div>
                        ';
  
                        session_destroy();
                      }
                    }
                    if(isset($_SESSION["isauth"])){
                        $auth = $_SESSION["isauth"];
                        if($auth == false){
                          echo '
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                             Username atau Password Salah
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                          </div>
                          ';
    
                          session_destroy();
                        }
                      }

                      if(isset($_SESSION["signfirst"])){
                          echo '
                          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                             Login Dulu Untuk Lanjut. Tidak punya akun ? klik daftar diatas
                        
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          ';
    
                          session_destroy();
                        
                      }
                    
                  ?>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-form">
                                    <form action="<?=BASE_URL?>/signup/customerAuth" method="post">
                                        <input type="text" name="user-name" placeholder="Username">
                                        <input type="password" name="user-password" placeholder="Password">
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox">
                                                <label>Ingat Saya</label>
                                                <a href="#">Lupa Password</a>
                                            </div>
                                            <button type="submit" name="login" class="btn-style cr-btn"><span>Login</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div id="lg2" class="tab-pane">
                            <div class="login-form-container">
                                <div class="login-form">
                                    <form action="<?=BASE_URL?>/signup/daftar" method="post">
                                        <input type="text" name="user-name" placeholder="Username">
                                        <input type="password" name="user-password" placeholder="Password">
                                        <input name="user-email" placeholder="Email" type="email">
                                        <div class="button-box">
                                            <button type="submit" name="register" class="btn-style cr-btn"><span>Daftar</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>