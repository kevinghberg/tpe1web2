{include file="header.tpl"}


<div class="container">



{if $logged eq 'admin'}
        <div class="row justify-content-center ">

            <form action="agregarMarca" method="POST">

                <input type="text" name="inputMarca" placeholder="Marca" class="shadow p-1  mx-1 my-1 bg-white rounded">
                <input type="text" name="inputPaisDeOrigen" placeholder="Pais de Origen"
                    class="shadow p-1 mx-1 my-1 bg-white rounded">
                <button type="submit"> AGREGAR </button>



            </form>

        </div>

    {/if}



</div>



</div>

<table class="table w-50 mx-auto">
    <thead class="thead-dark">
        <tr id=>

            <th scope="col" >NOMBRE</th>
            <th scope="col" >PAIS DE ORIGEN</th>
        {if $logged eq 'admin'} <th scope="col">X</th> {/if}
        </tr>

    </thead>

    <tbody class="table mx-auto">

        
        {foreach from=$marcas item=marca}
            <tr>
                <td>{$marca->nombre}</td>
                <td>{$marca->paisOrigen}</td>
            {if $logged eq 'admin'}   <td> <button> <a href="borrarMarca/{$marca->id_marca}"> Borrar </a> </button> </td>{/if}
            </tr>
        {/foreach}
    
    </tbody>



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



    </html>