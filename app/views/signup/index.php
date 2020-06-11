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
                    Flasher::Flash();
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
                                                
                                                
                                                <a href="<?=BASE_URL?>/AdminPage">Login untuk Admin</a>
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
                                        <input type="text" name="user-name" placeholder="Username" required>
                                        <input type="password" name="user-password" placeholder="Password" required>
                                        <input name="user-email" placeholder="Email" type="email" required>
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