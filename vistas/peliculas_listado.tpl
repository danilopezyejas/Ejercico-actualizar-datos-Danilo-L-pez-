<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="{$url_base}">
    <meta charset="utf-8">
    
    <title>{$proyecto}</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.3.3/underscore-min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/funciones.js"></script>
    
    
  </head>

  <body>
    {include file="cabezal.tpl"}
    <div class="container-fluid">
      <div class="row">
       
        <div class="col-sm-12  col-md-12  main">
          <h1 class="page-header">Peliculas</h1>
          <h2 class="sub-header">{$titulo} </h2>
          {if $mensaje!=""}
            <div class="alert alert-danger" role="alert">{$mensaje}</div>
          {/if}
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
                {foreach from=$peliculas item=pelicula}
                  <tr>
                    <td>{$pelicula->getAnio()}</td>
                    <td>{$pelicula->getTitulo()}</td>
                    <td><img src="{$pelicula->getPoster()}" class="img-fluid img-thumbnail" alt="{$pelicula->getTitulo()}"></td>
                    <td>
                      <input type="button" value="Para Ver" class="btn btn-info" onClick="javascript:paraVer('{$pelicula->getId()}');"/>
                     
                      
                    </td>
                  </tr>
                {/foreach}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/funciones.js"></script>
  </body>
</html>

