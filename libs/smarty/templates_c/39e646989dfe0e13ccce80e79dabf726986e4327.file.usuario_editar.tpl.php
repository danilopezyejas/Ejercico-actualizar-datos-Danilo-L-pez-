<?php /* Smarty version Smarty-3.1.21-dev, created on 2020-03-31 18:40:12
         compiled from "vistas\usuario_editar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8406723295e829899c05df2-08274036%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39e646989dfe0e13ccce80e79dabf726986e4327' => 
    array (
      0 => 'vistas\\usuario_editar.tpl',
      1 => 1585672809,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8406723295e829899c05df2-08274036',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5e82989acb61e8_71410950',
  'variables' => 
  array (
    'url_base' => 0,
    'proyecto' => 0,
    'titulo' => 0,
    'mensaje' => 0,
    'nombre' => 0,
    'apellido' => 0,
    'email' => 0,
    'pass' => 0,
    'edad' => 0,
    'ci' => 0,
    'foto' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e82989acb61e8_71410950')) {function content_5e82989acb61e8_71410950($_smarty_tpl) {?><!DOCTYPE html>
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
  </head>
  <body>
    <?php echo $_smarty_tpl->getSubTemplate ("cabezal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-12  col-md-12  main">
          <h1 class="page-header">Usuarios</h1>
          <h2 class="sub-header"><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h2>
          <?php if ($_smarty_tpl->tpl_vars['mensaje']->value!='') {?>
            <div class="alert alert-danger" role="alert"><?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
</div>
          <?php }?>
          <form class="form-horizontal" method="post" enctype="multipart/form-data">
            <fieldset>
            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="nombre"  >Nombre</label>
              <div class="col-md-4">
              <input id="nombre" name="nombre" type="text" placeholder="Juan" class="form-control input-md" required="" value="<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
">

              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="apellido" >Apellido</label>
              <div class="col-md-4">
              <input id="apellido" name="apellido" type="text" placeholder="Silvera" class="form-control input-md" required="" value="<?php echo $_smarty_tpl->tpl_vars['apellido']->value;?>
">

              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="apellido">Email</label>
              <div class="col-md-4">
              <input id="email" name="email" type="text" placeholder="pepe@gmail.com" class="form-control input-md" required="" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
">

              </div>
            </div>

             <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="apellido">Password</label>
              <div class="col-md-4">
              <input id="pass" name="pass" type="password"  minlength="6" title="6 letras mín." class="form-control input-md" required="" value="<?php echo $_smarty_tpl->tpl_vars['pass']->value;?>
">

              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="edad">Edad</label>
              <div class="col-md-4">
              <input id="edad" name="edad" type="text" placeholder="21" class="form-control input-md" value="<?php echo $_smarty_tpl->tpl_vars['edad']->value;?>
">

              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="ci">C.I.</label>
              <div class="col-md-4">
              <input id="ci" name="ci" type="text" placeholder="" class="form-control input-md" required="" value="<?php echo $_smarty_tpl->tpl_vars['ci']->value;?>
">

              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="ci">Foto</label>
              <div class="col-md-4">
              <input type="file" name="foto" id="foto" class="form-control input-md"/>
              <img src="<?php echo $_smarty_tpl->tpl_vars['foto']->value;?>
" alt="Foto perfil" width="75px" height="75px">

              </div>
            </div>

            <!-- Button -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="guardar"></label>
              <div class="col-md-4">
                <button id="guardar" name="guardar" class="btn btn-success">Editar</button>
              </div>
            </div>

            </fieldset>
          </form>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../../dist/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <?php echo '<script'; ?>
 src="../../assets/js/vendor/holder.js"><?php echo '</script'; ?>
>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <?php echo '<script'; ?>
 src="../../assets/js/ie10-viewport-bug-workaround.js"><?php echo '</script'; ?>
>
  </body>
</html>
<?php }} ?>
