<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table>
      <tr>
        <td>
        id categoria</td>
      </tr>
    <?php
    foreach ($listaCategorias as $listas) {
      ?>
      <tr>
        <td>
        <?php
          echo $listas['id_categoria'];
         ?></td>
      </tr>
      <?php

    }

     ?>

     </table>
  </body>
</html>
