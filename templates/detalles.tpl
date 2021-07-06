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



</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>