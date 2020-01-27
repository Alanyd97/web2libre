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
              {foreach from=$imagenes item=img}        
               <td><img src='{$img->src}'  height="150px" width="150px">
              </td>
              {/foreach}
            </tr>
        </tbody>
      </table>
<form action="subirImagen/{$producto->id_producto}" method="post" enctype="multipart/form-data">
  <p></p>
  <div class="custom-file">
  <input type="file" class="custom-file-input" id="imagenes" name="imagenes" >
  <label class="custom-file-label" for="customFileLang"  name="imagenes"  >Seleccionar Archivo</label>
  </div>
  <input type="submit" class="btn btn-primary" value="subirImagen">
</form><p></p>


{include file="footer.tpl"}