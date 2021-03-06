<?php /* Smarty version Smarty-3.1.21-dev, created on 2020-03-31 01:25:32
         compiled from "vistas\usuarios_listado.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3874684485e826df1abd641-31587667%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ce19360b9f0cd2956bc6da03e46250566a2024b' => 
    array (
      0 => 'vistas\\usuarios_listado.tpl',
      1 => 1585610724,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3874684485e826df1abd641-31587667',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5e826df233f408_21167636',
  'variables' => 
  array (
    'url_base' => 0,
    'proyecto' => 0,
    'titulo' => 0,
    'usuario_nuevo' => 0,
    'mensaje' => 0,
    'usuarios' => 0,
    'persona' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e826df233f408_21167636')) {function content_5e826df233f408_21167636($_smarty_tpl) {?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
">
    <meta charset="utf-8">

    <title><?php echo $_smarty_tpl->tpl_vars['proyecto']->value;?>
</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.0/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.3.3/underscore-min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript" src="js/funciones.js"><?php echo '</script'; ?>
>


  </head>

  <body>
    <?php echo $_smarty_tpl->getSubTemplate ("cabezal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("lista_para_ver.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-12  col-md-12  main">
          <h1 class="page-header">Usuarios</h1>
          <h2 class="sub-header"><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
 <button id="agregar" name="agregar" class="btn btn-success pull-right" onClick="window.location='<?php echo $_smarty_tpl->tpl_vars['usuario_nuevo']->value;?>
'">Agregar</button></h2>
          <?php if ($_smarty_tpl->tpl_vars['mensaje']->value!='') {?>
            <div class="alert alert-danger" role="alert"><?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
</div>
          <?php }?>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Foto</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Edad</th>
                  <th>Ci</th>
                  <th>Email</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php  $_smarty_tpl->tpl_vars['persona'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['persona']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['usuarios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['persona']->key => $_smarty_tpl->tpl_vars['persona']->value) {
$_smarty_tpl->tpl_vars['persona']->_loop = true;
?>
                  <tr>
                    <td><img src="<?php echo $_smarty_tpl->tpl_vars['persona']->value->getFoto();?>
" alt="Foto de perfil" width="75px" height="75px"></td>
                    <td><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['persona']->value->getNombre(), 'UTF-8');?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['persona']->value->getApellido();?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['persona']->value->getEdad();?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['persona']->value->getCI();?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['persona']->value->getEmail();?>
</td>
                    <td>
                      <input type="button" value="Borrar" class="btn btn-danger" onClick="window.location='<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
usuario/listado/borrar/<?php echo $_smarty_tpl->tpl_vars['persona']->value->getId();?>
/'"/>
                      <input type="button" value="Para Ver" class="btn btn-info" onClick="javascript:cargarParaVer('<?php echo $_smarty_tpl->tpl_vars['persona']->value->getId();?>
');"/>


                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>



  </body>
</html>
<?php }} ?>
