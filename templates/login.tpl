{include file="header.tpl"}

<div class="container-fluid mt-4 mx-2">
    <div class="row">
        <div class=" col-md-6 border   ">
            <H1>REGISTRARSE</H1>

            <form action="registrar" method="POST">


                Usuario
                <input type="text" class="form-control " name="usernameRegister">



                Contraseña
                <input type="password" class="form-control" name="passwordRegister">



                <input type="submit" value="REGISTRARSE">


                

            </form>

            

            <label id="resultado"></label>
        </div>

        <div class="col-md-6 border ">
            <h1>INGRESAR</h1>

            <form action="verifyUser" method="POST">
                Usuario
                <input type="text" class="form-control " name="usernameLogin">

                Contraseña
                <input type="password" class="form-control" name="passwordLogin">

                <input type="submit" value="INGRESAR">
                <a>{$mensaje}</a>
            </form>

        </div>

        

       


    </div>



</div>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
    integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous">
</script>


</body>

</html>