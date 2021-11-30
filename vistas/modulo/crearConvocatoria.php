<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->

    <title>Crear convocatoria</title>
</head>
<body>
  <header>
    <?php include '../headerLogin.php'; ?>
  </header>
    <aside class="">
      <?php include 'BarraLateralAdministrador.php'; ?>
    </aside>
    <section class="container">


        <form action="../../controladores/?con=ConvocatoriaControlador&fun=crearConvocatoria"  method="post" enctype="multipart/form-data">
            <fieldset class="border p-2">
             <legend>Crear Convocatoria:</legend>
                <label class="form-label" for="titulo">Titulo</label>
                <input type="text" id="titulo" name="titulo" required/>
                <br><br>
            <label for="CargarImagen" class="form-label">Cargar Imagen</label>
            <input name="imagen" type="file" id="CargarImagen" multiple  accept="image/*" required>
            <br><br>
                <label class="form-label" for="form4Example3">Descripcion</label>
                <textarea name="descripcion"  required id="form4Example3" rows="4"></textarea>
                <br><br>
                     <label for="FechaInicio">Fecha de Inicio:</label>
             <input type="date" id="FechaInicio" name="fecha_inicio" class="form-control"><br><br>

                <label for="FechaCierre">Fecha de cierre:</label>
                <input type="date" id="FechaCierre" name="fecha_fin" class="form-control"><br><br>
             <input type="submit" value="Enviar" name="enviar">

            </fieldset>
           </form>

    </section>
    <footer>
      <?php include '../footer.php'; ?>
    </footer>
</body>
</html>