{literal}
    <section id="Vue-comments">

    

        <h1> {{subtitle}} </h2>


        <ul class="list-none">


            <li v-for="comment in comments">


               Comentario :  {{ comment.comentario }}  <br> Valoracion :  {{ comment.valoracion }} <br>
               
                
                <span> <button v-on:click="deleteComentario(comment.id_comentario)"> Eliminar</button></span>

        

                
            </li>
        </ul>


    </section>
{/literal}
