{literal}
    <section id="Vue-comments">

    

        <h1> {{subtitle}} </h2>


        <ul class="list-none">


            <li v-for="comment in comments">


               Comentario :  {{ comment.comentario }}  <br> Valoracion :  {{ comment.valoracion }} <br>
               
                  
            </li>
        </ul>


    </section>
{/literal}
