<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<h3><?php echo $titulo ?></h3>

</div>
<form method="post">	  <!-- area de campos do form -->
    <hr/>
    <?php if(isset($alter)){?>
        <input type="hidden" name="cdcategoria" value="<?php echo $alter['cdcategoria']?>" ?>
    <?php } ?>
    <div class="row">
        <div class="form-group col-md-12">
            <label for="nmcategoria">Nome</label>
            <input type="text" class="form-control" name="nmcategoria" required
              <?php echo (isset($alter) ? 'value="'.$alter['nmcategoria'].'"' : "" );?> >
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <?php echo (isset($alter) ? select_ativo($alter['fgativo']) : select_ativo(null) )?>
        </div>
    </div



    <div id="actions" class="row">
        <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="<?php echo site_url('categoria')?>" class="btn btn-default">Cancelar</a>
        </div>
    </div>
</form>