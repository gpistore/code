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
        <!--Inclusão Javascript Bootstrap -->
        <script src="<?php echo base_url('includes/bootstrap/js/bootstrap.min.js') ?>"></script>
        <!--Inclusão Font Aewsome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Code</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav mr-auto">
            <?php if($this->session->sUsuario){ ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('produto')?>">Produto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"s href="<?php echo site_url('categoria')?>">Categoria</a>
                </li>
            <?php } ?>
            </ul>

            <ul class="navbar-nav navbar-right"">
                <?php if($this->session->sUsuario != NULL){?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <?php echo $this->session->sUsuario['nmusuario']?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo site_url('logout')?>">Logout</a>
                    </div>
                </li>
                <?php }else{?>
                <li>
                    <a class="nav-link - " href="<?php echo site_url('login')?>" >Login</a>
                </li>
                <?php } ?>
            </ul>
        </nav>
        <?php if (isset($msgalerta)){?>


        <div id="container"  class="container-fluid">
            <div class="alert alert-danger m-3 " >
                <span ><?php echo $msgalerta;?></span>
            </div>
            <?php }?>

            <?php if (isset($msgsucesso)){?>
                <div class="alert alert-success m-3" >
                    <span ><?php echo $msgsucesso;?></span>
                </div>
            <?php }?>

