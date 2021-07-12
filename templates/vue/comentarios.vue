
{literal}
<div id="vue-comentario">

    <ul id="lista-comentarios" class="">
        <li v-for="comentario in comments"> 
        {{comentario.texto}} - Valoracion: {{comentario.valoracion}}/5

            {if $logged eq "admin"}
            {literal}
             - <button class="boton_tabla_ruedas" v-on:click="deleteComentario(comentario.id_comentario)">Eliminar</button>
            {/literal}
            {/if}
        </li>
    </ul>

</div>

{/literal}