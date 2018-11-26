<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<h3><?php echo $titulo ?></h3>
<div class="col-md-12 text-right">
    <a class="btn btn-default" href="<?php echo site_url('categoria/add')?>">Adicionar</a>
</div>

<div>
    <table class="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Status</th>
                <th style="width:5%"></th>
            </tr>
        </thead>
        <tbody>
        <?php if ($dados == FALSE){ ?>
            <tr><td colspan="4">Nenhuma categoria encontrado</td></tr>
        <?php }else{    ?>
            <?php foreach ($dados as $dado){ ?>
                <tr>
                    <td><?= $dado['cdcategoria'] ?></td>
                    <td><?= $dado['nmcategoria'] ?></td>
                    <td><?= ($dado['fgativo'] ==1 ?'Ativo' : 'Inativo')?></td>
                    <td><a class="btn-link" href="<?php echo site_url('categoria/edit/'.$dado['cdcategoria'])?>"><i class="fas fa-pencil-alt"></i></a>&nbsp;
                        <a class="btn-link" href="<?php echo site_url('categoria/del/'.$dado['cdcategoria'])?>"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php } ?>
        <?php } ?>
        </tbody>
    </table>
</div>