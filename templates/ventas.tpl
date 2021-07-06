{include file="header.tpl"}


<div class="container">
    {if isset($username) && $username}
        <div class="row justify-content-center ">

            <form action="agregarBotin" method="POST">
                <input type="text" name="inputModelo" placeholder="Modelo" class="shadow p-1  mx-1 my-1 bg-white rounded">
                <input type="text" name="inputTalle" placeholder="Talle" class="shadow p-1 mx-1 my-1 bg-white rounded">

                <select name="inputMarca">
                    {foreach from=$marcas item=marca}
                        <option value={$marca->id_marca}>{$marca->nombre}</option>
                    {/foreach}
                    
                </select>

                <button type="submit"> AGREGAR </button>

            </form>


        </div>
    {/if}
    <div class="row justify-content-center">
        <form action="filtrar" method="POST">

            <select name="marcaInput">
                {foreach from=$marcas item=marca}
                    <option value={$marca->id_marca}>{$marca->nombre}</option>
                {/foreach}
            </select>

            <button type="submit"> APLICAR FILTRO </button>



        </form>
    </div>
</div>



</div>

<table class="table w-50 mx-auto table table-hover " data-aos="zoom-in""
     data-aos-easing=" ease-out-cubic" data-aos-duration="2000">
    <thead class="bg-warning">
        <tr id=>
            <th scope="col">MODELO</th>
            <th scope="col" onclick="">TALLE </th>
            <th scope="col" onclick="">MARCA</th>
            <th scope="col" onclick="">DETALLE</th>
            {if isset($username) && $username} <th scope="col" onclick="">X</th>
                <th scope="col" onclick="">MODIFICAR</th>
            {/if}

        </tr>

    </thead>
    <tbody class="table mx-auto">

        {foreach from=$botines item=botin}
            <tr>
                <td data-aos="zoom-in-up">{$botin->modelo}</td>
                <td data-aos="zoom-in-up">{$botin->talle}</td>
                {foreach from=$marcas item=marca}
                    {if $botin->marca eq $marca->id_marca}
                        <td data-aos="zoom-in-up">{$marca->nombre}</td>
                    {/if}
                {/foreach}
                <td> <button> <a href="detalles/{$botin->id}"> Detalle </a> </button> </td>
                {if isset($username) && $username}
                    <td> <button> <a href="borrarBotin/{$botin->id}"> Borrar </a> </button> </td>

                    {if $botin->stock==0}
                        <td> <button> <a href="modificar/{$botin->id}"> Vender</a> </button> </td>
                    {else}
                        <td> Vendido </td>
                    {/if}
                {/if}
            </tr>
        {/foreach}



    </tbody>

</table>

<script src="js/js.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
    integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous">
</script>
</div>

</body>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>



</html>