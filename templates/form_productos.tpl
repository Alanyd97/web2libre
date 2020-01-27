<form action="insertar" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="nombre">Nombre producto:</label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Enter nombre del producto">
  </div>
  <div class="form-group">
    <label for="descripcion">Descripcion producto:</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Enter descripcion del producto">
  </div>
  <div class="form-group">
    <label for="precio">Precio producto:</label>
    <input type="number" class="form-control" id="precio" name="precio" placeholder="Enter precio del producto">
  </div>
  <div class="form-group">
    <label for="categoria">Categoria producto:</label>
    <select id="id_categoria" name ="categoria" class="browser-default custom-select">
              {foreach from=$lista_categorias item=categoria}
                <option value="{$categoria->id_categoria}">{$categoria->nombre}</option>          
              {/foreach}
    </select>
  </div>
  <p></p>
  <div class="custom-file">
  <input type="file" class="custom-file-input" id="imagenes" name="imagenes" >
  <label class="custom-file-label" for="customFileLang"  name="imagenes"  >Seleccionar Archivo</label>
  </div>
  <input type="submit" class="btn btn-primary" value="insertar">
</form><p></p>


            
          