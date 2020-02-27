
<div class="container-fluid">
  {if !isset($usuario) || $usuario eq null  || $usuario->admin == 1}
    <div class="row d-flex justify-content-center">
        <div class="col-10 col-lg-8">
                  
          <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">Categoria</th>
                <th scope="col">Descripcion</th>
              </tr>
            </thead>
            <tbody>
              {foreach from=$lista_categoria item=categoria}
                <tr>
                  <td>{$categoria->nombre}</td>
                  <td>{$categoria->descripcion}</td>
                </tr>
                {/foreach}
            </tbody>
          </table>
        </div>

    </div>
  {elseif $usuario->admin eq 0}
    
    <div class="row d-flex justify-content-center">
        <div class="col-10 col-lg-8">
            <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">categoria</th>
                  <th scope="col">Descripcion</th>
                </tr>
              </thead>
              <tbody>
                {foreach from=$lista_categoria item=categoria}
                  <tr>
                    <td>{$categoria->nombre}</td>
                    <td>{$categoria->descripcion}</td>
                    <td><a href='borrarCategoria/{$categoria->id_categoria}'>Borrar</a></td>
                    <td><a href='MostrarEditarCategoria/{$categoria->id_categoria}'>Editar</a></td>
                  </tr>
                  {/foreach}
              </tbody>
            </table>
            <h4>{$error}</h4 style="color=red;">
            {include file="form_categoria_adm.tpl"}
        </div>

    </div>
{/if}    

</div>


{include file="footer.tpl"}