{include file="top.tpl"}
{include file="nav.tpl"}
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-10 col-lg-8">
            <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">usuario</th>
                  <th scope="col">Descripcion</th>
                </tr>
              </thead>
              <tbody>
                {foreach from=$lista_usuario item=usuario}
                  <tr>
                    <td>{$usuario->nombre}</td>
                    <td>
                    {if $usuario->admin eq 0}
                        Administrador
                    {else}
                        Usuario
                    {/if}   
                    </td>
                    <td><a href='borrarusuario/{$usuario->id_usuario}'>Borrar</a></td>
                    <td><a href='tugglepermiso/{$usuario->id_usuario}/{$usuario->admin}'>
                    {if $usuario->admin eq 0}
                        Quitar Permiso
                    {else}
                        Agregar Permiso
                    {/if} 
                    </a></td>
                  </tr>
                  {/foreach}
              </tbody>
            </table>
            <h4 style="color=red;">{$error}</h4>
        </div>

    </div>
</div>

{include file="footer.tpl"}