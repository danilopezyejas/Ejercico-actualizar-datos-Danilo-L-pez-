<?php /* Smarty version Smarty-3.1.21-dev, created on 2020-03-31 03:48:14
         compiled from "vistas\cabezal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14963403535e826df2567512-08227937%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bab45dbdad47bd742a97710b134b26160c943598' => 
    array (
      0 => 'vistas\\cabezal.tpl',
      1 => 1585619291,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14963403535e826df2567512-08227937',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5e826df256e644_35386650',
  'variables' => 
  array (
    'proyecto' => 0,
    'foto' => 0,
    'usuario' => 0,
    'url_base' => 0,
    'url_logout' => 0,
    'controller' => 0,
    'buscar' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e826df256e644_35386650')) {function content_5e826df256e644_35386650($_smarty_tpl) {?><nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $_smarty_tpl->tpl_vars['proyecto']->value;?>
</a>
          <img class="navbar-brand" src="<?php echo $_smarty_tpl->tpl_vars['foto']->value;?>
" width="75px" height="75px">
          <a class="navbar-brand" href="usuario/editar"><?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
pelicula/listado/">Peliculas</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['url_logout']->value;?>
">Cerrar Sesión</a></li>
          </ul>
          <form class="navbar-form navbar-right" method="post" action="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;
echo $_smarty_tpl->tpl_vars['controller']->value;?>
/buscar/">
            <input type="text" id="buscar" name="buscar" class="form-control" placeholder="Buscar..." value='<?php echo $_smarty_tpl->tpl_vars['buscar']->value;?>
'>
            <input type="submit" value="Buscar" class="form-control btn btn-primary">
          </form>
        </div>
      </div>
    </nav>
<?php }} ?>
