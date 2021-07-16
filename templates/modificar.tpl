{include file="header.tpl"}






<div class="container">

<form method="POST" action="modificarBotin" enctype="multipart/form-data">


<input type="file" name="imagen" id="imagen">
<input type="text" name="inputModificarModelo" placeholder="Modelo" class="shadow p-1  mx-1 my-1 bg-white rounded">
<input type="text" name="inputModificarTalle" placeholder="Talle" class="shadow p-1 mx-1 my-1 bg-white rounded">  


<input type="hidden" name="inputId" id="botinardo" value={$botin->id}>


<select name="inputModificarMarca">
{foreach from=$marcas item=marca}
    <option value={$marca->id_marca}>{$marca->nombre}</option>
{/foreach}

</select>

<button type="submit"> Modificar </button>

</form>
 </div>

