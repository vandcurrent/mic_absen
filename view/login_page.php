<?php
    $loginfail = $_GET['ref'];
?>
<div class="grid fluid container">
    <div class="row">
        <div class="span12">
            <h2><a href="./" class="element"><span class="icon-grid-view"></span> MIC-ITB ABSEN</a></h2><hr>
        </div>
    </div>
    <div class="row">
        <div class="span8">
            <div class="cover-img"></div>
        </div>
        <div class="span1"></div>
        <div class="span3">
            <form method="post" role="form" action="core/login.php">
                <fieldset>
                    <legend>Login</legend>
                    <?php
                        if ($loginfail == "login-failed") {
                            echo    "<p class='fg-red'>Email atau password salah</p>";
                        }
                    ?>
                    <div class="input-control text" data-role="input-control">
                        <input type="text" name="email" placeholder="someone@example.com">
                        <button class="btn-clear" tabindex="-1"></button>
                    </div>
                    <div class="input-control password" data-role="input-control">
                        <input type="password" name="password" placeholder="password" autofocus>
                        <button class="btn-reveal" tabindex="-1"></button>
                    </div>
                    <!-- <div class="input-control checkbox" data-role="input-control">
                        <label>
                            <input type="checkbox" checked />
                            <span class="check"></span>
                            Ingat akun ini
                        </label>
                    </div> -->

                    <div><input type="submit" name="btn_submit" value="Masuk" class="primary"></div>
                </fieldset>
            </form>
        </div>
    </div>
    <hr>