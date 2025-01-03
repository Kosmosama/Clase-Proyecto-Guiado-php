<div id="login">
    <div class="container">
        <div class="col-xs-12 col-sm-8 col-sm-push-2">
            <h1>check-registro</h1>
            <hr>
            <?php include __DIR__ . '/show-error.part.view.php' ?>
            <form clas="form-horizontal" action="/check-registro" method="post">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Username</label>
                        <input class="form-control" type="text" name="username" value="<?= $username ?? '' ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Password</label>
                        <input class="form-control" name="password" type="password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Repeat password</label>
                        <input class="form-control" name="re-password" type="password">
                        <label class="label-control">Insert Captcha <img style="border: 1px solid #D3D0D0" src="/app/utils/captcha.php" id='captcha'></label>
                        <input class="form-control" name="captcha" type="text">
                        <button class="pull-right btn btn-lg sr-button">ENVIAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>