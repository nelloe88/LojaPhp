<?php 
require_once("cabecalho.php");
require_once("banco-produto.php");
require_once("logica-usuario.php");
require_once("class/Produto.php");
require_once("class/Categoria.php");

verificaUsuario();



$categoria = new Categoria();


$categoria->setId($_POST['categoria_id']);

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];


if(array_key_exists('usado', $_POST)) {
    $usado = "true";
} else {
    $usado = "false";
}

//$produto = new Produto();

$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);

//var_dump($produto);

//$produto->categoria = $categoria;

if(insereProduto($conexao, $produto)) { ?>
	<p class="text-success">O produto <?= $nome ?>, <?= $preco ?> foi adicionado.</p>
<?php 
} else {
	$msg = mysqli_error($conexao);
?>
	<p class="text-danger">O produto <?= $nome ?> não foi adicionado: <?= $msg?></p>
<?php
}
?>

<?php include("rodape.php"); ?>