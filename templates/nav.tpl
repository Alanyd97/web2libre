<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand">Electro-House</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="productos">Productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="categorias">Categorias</a>
      </li>
        {if !isset($usuario) || $usuario eq null}
          <li class="nav-item">
            <a class="nav-link" href="login">Iniciar Sesion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="registro">Registrarse</a>
          </li>
        {elseif $usuario->admin eq 0}
          <li class="nav-item">
            <a class="nav-link" href="usuarios">Usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logOut">LogOut</a>
          </li>
           <li class="nav-item">
            <p class="nav-link">Soy el admin!! "{$usuario->nombre}"</p>
          </li>
        {elseif $usuario->admin eq 1}    
          <li class="nav-item">
            <a class="nav-link" href="logOut">LogOut</a>
          </li>
          <li class="nav-item">
            <p class="nav-link">Sesion iniciada con "{$usuario->nombre}"</p>
          </li>
        {/if}   
       
    </ul>
  </div>
</nav>