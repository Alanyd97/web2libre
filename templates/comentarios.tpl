{literal}
<section id="comentarios">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Comentarios</th>
                    <th scope="col">Puntajes</th> 
                </tr>
            </thead>
            <tbody>
                <tr v-for="comentario of respuesta" >
                    <td scope="col">{{comentario.comentario}}</th>
                    <td scope="col">{{comentario.puntaje}}</th>
                    <input id="id_comentario" v-model="idComentario = comentario.id_comentario" class="form-control d-none">
                    <th scope="col"  v-if="admin ==0"> <button  class="btn btn-primary" @click="deleteComentario" value="">Borrar</button></th>   
                </tr>
            </tbody>
        </table>   
</section>
{/literal}