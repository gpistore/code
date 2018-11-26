<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<h3><?php echo $titulo ?></h3>

</div>
<form method="post">	  <!-- area de campos do form -->
    <hr/>
    <?php if(isset($alter)){?>
        <input type="hidden" name="cdproduto" value="<?php echo $alter['cdproduto']?>" ?>
    <?php } ?>
    <div class="row">
        <div class="form-group col-md-12">
            <label for="nmproduto">Nome</label>
            <input type="text" class="form-control" name="nmproduto" required
                <?php echo (isset($alter) ? 'value="'.$alter['nmproduto'].'"' : "" );?> >
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <label for="cdcategoria">Categoria</label>
            <?php
            if(isset($alter)){
                $lselected = $alter['cdcategoria'];
            }else{
                $lselected = '';
            }
            echo form_dropdown('cdcategoria', $categorias,$lselected, 'class="form-control"');?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <?php echo (isset($alter) ? select_ativo($alter['fgativo']) : select_ativo(null) )?>
        </div>
    </div>

    <div id="actions" class="row">
        <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="<?php echo site_url('produto')?>" class="btn btn-default">Cancelar</a>
        </div>
    </div>
</form>