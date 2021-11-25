 <?php
require_once '../../modelos/Categoria_modelo.php';
$categoria=new Categoria_modelo();
$listaCategorias=$categoria->listar();
require_once 'categorias.php';
?>
