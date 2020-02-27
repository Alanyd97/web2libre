
<div class="container-fluid">
  {if !isset($usuario) || $usuario eq null  || $usuario->admin == 1}
    <div class="row d-flex justify-content-center">
    {foreach from=$lista_productos item=producto}
          <div class="col-10 col-lg-8 d-flex justify-content-center">
         {/foreach}  
              <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Detalle</th>
                  </tr>
                </thead>
                <tbody>
                  {foreach from=$lista_productos item=producto}
                    <tr>
                      <td>{$producto->nombre}</td>
                      <td scope="col"> <a href="detalle/{$producto->id_producto}">Detalle</th>
                    </tr>
                    {/foreach}
                </tbody>
              </table>

          </div>
      </div>

    </div>
{elseif $usuario->admin eq 0}
<div class="row d-flex justify-content-center">
      <div class="col-10 col-lg-8">
          <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">Producto</th>
                  <th scope="col">Descripcion</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Categoria</th>
                  <th scope="col">Borrar</th>
                  <th scope="col">Editar</th>
                  <th scope="col">Detalle</th>
                  <th scope="col">Imagenes</th>
                </tr>
              </thead>
              <tbody>
                {foreach from=$lista_productos item=producto}
                  <tr>
                    <td>{$producto->nombre}</td>
                    <td>{$producto->descripcion}</td>
                    <td>{$producto->precio}</td>
                    <td>
                    {foreach from=$lista_categorias item=categoria}
                      {if $categoria->id_categoria eq $producto->id_categoria}
                        {$categoria->nombre}
                      {/if}
                    {/foreach}
                    </td>
                    <td><a href='borrar/{$producto->id_producto}'>Borrar</a></td>
                    <td><a href='MostrarEditar/{$producto->id_producto}'>Editar</a></td>
                    <td scope="col"> <a href="detalle/{$producto->id_producto}">Detalle</th>
                    <td><a href='MostrarSubirImagen/{$producto->id_producto}'>Subir imagen</a></td>
                    <td>
                    {foreach from=$lista_img item=img}
                      {if $img->id_producto eq $producto->id_producto}
                      <img src='{$img->src}'  height="150px" width="150px">
                      <a href='borrarimagen/{$img->id_img}'>Borrar</a>
                      {/if}
                    {/foreach}
                    </td>
                  </tr>
                  {/foreach}
              </tbody>
            </table>
            {include file="form_productos.tpl"}

      </div>


  </div>
{/if}  

{include file="footer.tpl"}