<?php /* Smarty version Smarty-3.1.21-dev, created on 2020-03-24 20:33:00
         compiled from "vistas\peliculas_listado.tpl" */ ?>
<?php /*%%SmartyHeaderCode:271725e7a698cc70094-12091360%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e105a73cc253134d11073c5b5fca3f98c90b8a6b' => 
    array (
      0 => 'vistas\\peliculas_listado.tpl',
      1 => 1585081261,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '271725e7a698cc70094-12091360',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5e7a698cf0c0b5_07101290',
  'variables' => 
  array (
    'url_base' => 0,
    'proyecto' => 0,
    'titulo' => 0,
    'mensaje' => 0,
    'peliculas' => 0,
    'pelicula' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e7a698cf0c0b5_07101290')) {function content_5e7a698cf0c0b5_07101290($_smarty_tpl) {?><!DOCTYPE html>
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

    <div class="container-fluid">
      <div class="row">
       
        <div class="col-sm-12  col-md-12  main">
          <h1 class="page-header">Peliculas</h1>
          <h2 class="sub-header"><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
 </h2>
          <?php if ($_smarty_tpl->tpl_vars['mensaje']->value!='') {?>
            <div class="alert alert-danger" role="alert"><?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
</div>
          <?php }?>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Año</th>
                  <th>Póster</th>
                  <th>Título</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php  $_smarty_tpl->tpl_vars['pelicula'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pelicula']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['peliculas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pelicula']->key => $_smarty_tpl->tpl_vars['pelicula']->value) {
$_smarty_tpl->tpl_vars['pelicula']->_loop = true;
?>
                  <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['pelicula']->value->getAnio();?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['pelicula']->value->getTitulo();?>
</td>
                    <td><img src="<?php echo $_smarty_tpl->tpl_vars['pelicula']->value->getPoster();?>
" class="img-fluid img-thumbnail" alt="<?php echo $_smarty_tpl->tpl_vars['pelicula']->value->getTitulo();?>
"></td>
                    <td>
                      <input type="button" value="Para Ver" class="btn btn-info" onClick="javascript:paraVer('<?php echo $_smarty_tpl->tpl_vars['pelicula']->value->getId();?>
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
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/funciones.js"><?php echo '</script'; ?>
>
  </body>
</html>

<?php }} ?>
