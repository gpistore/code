    <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="utf-8">
            <title>Code</title>

            <!--Inclusão JQuery -->
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
            <!--Inclusão CSS Bootstrap -->
            <link rel="stylesheet" href="<?php echo base_url('includes/bootstrap/css/bootstrap.min.css') ?>">
            <!--Inclusão CSS Específico -->
            <link rel="stylesheet" href="<?php echo base_url('includes/bootstrap/css/login.css') ?>">

            <!--Inclusão Javascript Bootstrap -->
            <script src="<?php echo base_url('includes/bootstrap/js/bootstrap.min.js') ?>"></script>
        </head>

        <body class="text-center">
            <div id="container"  class="container-fluid">
                <form role="form" method="post" class="form-signin">
                    <div class="form-group">
                        <span class="titulo">Code</span>
                    </div>
                    <?php if (isset($msg)){?>
                        <div class="alert alert-danger">
                            <span ><?php echo $msg;?></span>
                        </div>
                    <?php }?>
                    <div class="form-group">
                        <label for="txtlogin">Login</label>
                        <input type="text" class="form-control" id="txtlogin" name="txtlogin" required>
                    </div>
                    <div class="form-group">
                        <label for="txtsenha">Senha</label>
                        <input type="password"  class="form-control" id="txtsenha" name="txtsenha" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-login btn-default">Entrar</button>
                    </div>
                </form>
            </div>
        </body>
    </html>
