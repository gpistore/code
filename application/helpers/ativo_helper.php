<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function select_ativo($pfgativo)
{

    $ldata = array('1' => 'Ativo',
        '0' => 'Inativo');

    return '<label for="fgativo">Status</label>'.form_dropdown('fgativo', $ldata, $pfgativo, 'class="form-control"');
}
