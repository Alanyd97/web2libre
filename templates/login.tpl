{include file="top.tpl"}
{include file="nav.tpl"}

<div class="container-fluid text-center" id="container">
   <div class="row d-flex justify-content-center">
        <div class="col-10 col-lg-6">
            <h1 class="h3 mb-3 font-weight-normal">INICIAR SESION</h1>
                <form class="form-signin text-center" method="post" action="iniciarSesion">
                    <h5>USUARIO</h5>
                    <label for="inputUser" class="sr-only">Nombre de usuario</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre de usuario" required="" autofocus="">
                    <p></p>
                    <h5>CONTRASEÑA</h5>
                    <label for="inputPassword" class="sr-only">Contraseña</label>
                    <input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña" required="">
                    <p></p>
                    <button class="btn btn-lg btn-primary btn-block"  value="Login">INICIAR SESION</button>
                    <a class="nav-link" href="cambiarcontraseña">Olvide mi Contraseña</a>
                </form>
                <h4 class="h3 mb-3 font-weight-normal">{$estado}</h4>
        </div>

   </div>
</div>

  {include file="footer.tpl"}