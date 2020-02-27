

<div class="container-fluid" id="app">
 <div class="row d-flex justify-content-center">
    <div class="col-10 col-lg-8">
      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Producto</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Precio</th>
            <th scope="col">Imagen</th>
          </tr>
        </thead>
        <tbody>
            <tr>
              <td>{$producto->nombre}</td>
              <td>{$producto->descripcion}</td>
              <td>{$producto->precio}</td> 
              <td>
               {foreach from=$lista_img item=img}
                      {if $img->id_producto eq $producto->id_producto}
                      <img src='{$img->src}'  height="150px" width="150px">
                      {/if}
                {/foreach}
              </td>
            </tr>
        </tbody>
      </table>
    
    </div>
  </div>
 
 
 <div class="row d-flex justify-content-center" >
 {if $usuario != null} 
      <input type="text" id="idusuario" class="form-control d-none"  v-model="comentario.idUsr = {$usuario->id_usuario}"> 
      <input id="admin" value="{$usuario->admin}" class="form-control d-none">
  {/if}  

  <div class="col-6 align-self-center">
  <form v-if="admin !=0 " class="form-signin text-center">
  
    <div class="form-group">
      <label for="exampleFormControlSelect1">Puntaje</label>
      <select class="form-control" v-model="comentario.puntaje" id="exampleFormControlSelect1" required>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>
    <div class="form-group">
      <label for="coment" >Comentario</label>
      <textarea class="form-control" id="coment" v-model="comentario.comentario" rows="3" required></textarea>
     
    
    
   
    
    </div>
  </form>
   
 {if $usuario eq null}
    <h2>Loguearse para poder comentar</h2>
  {else}    
   <input type="text" id="idProducto" value="{$producto->id_producto}"  class="form-control d-none" v-model="comentario.idProducto = {$producto->id_producto}">
    <button  v-if="admin !=0 " class="btn btn-primary" @click="postComentario" value="">Comentar</button>
  {/if}  
   
{include file="comentarios.tpl"}

  </div>
</div>

</div>

{include file="footer.tpl"}