{include file="header.tpl"}

<div class="mt-4 d-flex justify-content-center ">
    <div class="card card border-dark mb-3" style="width: 16rem;">

        <img src="imagenes/tiempo.jpg" class="card-img-top" alt="...">

        <div class="card-body ">
            <p class="card-text">{foreach from=$botin item=bot}
                <ul>
                    <li data-aos="flip-up" data-aos-delay="300"> Modelo: {$bot->modelo}</li>
                    <li data-aos="flip-up" data-aos-delay="400"> Talle: {$bot->talle}</li>
                    {foreach from=$marcas item=marca}
                        {if $bot->marca eq $marca->id_marca}
                            <li data-aos="flip-up" data-aos-delay="600"> Marca: {$marca->nombre}</li>
                        {/if}
                    {/foreach}
                </ul>
            {/foreach}</p>
        </div>
    </div>

    <form action="insertComentario" method="POST">

    {if $logged eq "user"}
        <form id="form_comentario" action="comentarios/insert" name="form-comentario" method="POST">
            <div class="valoracion"><h3>Insertar comentario:</h3></div>
            <input  name="input_textoComentario" type="textarea" name="message" rows="5" cols="20" placeholder="inserte su comentario aqui." value=""></textarea>
            <div class="valoracion"><h3>Insertar valoracion del 1 al 5:</h3></div>
                <div class="clasificacion">
                    <input id="radio1" type="radio" name="radio1" value="5">
                    <label for="radio1">★</label>
                    <input id="radio2" type="radio" name="radio2" value="4">
                    <label for="radio2">★</label>
                    <input id="radio3" type="radio" name="radio3" value="3">
                    <label for="radio3">★</label>
                    <input id="radio4" type="radio" name="radio4" value="2">
                    <label for="radio4">★</label>
                    <input id="radio5" type="radio" name="radio5" value="1">
                    <label for="radio5">★</label>
                </div>
            <div class="botones_tabla_ruedas"> 
            <input class="boton_tabla_ruedas" type="submit">
            </div>
        </form>
        {/if}
        <br><br>
        <div id="container_comentarios" class="comentarios">
            {include file="vue/comentarios.vue"}
        </div>


    </form>






</div>


<script type="text/javascript" src="../js/clientSideRendering.js"></script> 

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>