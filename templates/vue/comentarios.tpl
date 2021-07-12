

{literal}
<div id="template-vue-comments">

    <ul id="lista-comentarios" class="">
        <li v-for="comentario in comments"> 
        {{comentario.comentario}} - Valoracion: {{comentario.valoracion}}/5
{/literal}
        
            {literal}
             - <button v-on:click="deleteComentario(comentario.id_comentario)">Eliminar</button>
            {/literal}
            
        </li>
    </ul>
</div>









