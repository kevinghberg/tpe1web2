

{literal}
<div id="vue-comentario">

    <ul id="lista-comentarios" class="">
        <li v-for="comentarios in comments"> 
        {{comments.comentario}} - Valoracion: {{comments.valoracion}}/5
{/literal}
            {if $logged eq "admin"}
            {literal}
             - <button class="boton_tabla_ruedas" v-on:click="deleteComentario(comentario.id_comentario)">Eliminar</button>
            {/literal}
            {/if}
        </li>
    </ul>
</div>
<p> CACA </p>

