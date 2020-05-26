<?php
require_once("cabecalho.php");
require_once("banco-produto.php");
require_once("class/Produto.php");
require_once("class/Categoria.php");



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


$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
$produto->setId($_POST['id']);

if(alteraProduto($conexao, $produto)) { ?>
	<p class="text-success">O produto <?= $nome ?>, <?= $produto->preco ?> foi alterado.</p>
<?php 
} else {
	$msg = mysqli_error($conexao);
?>
	<p class="text-danger">O produto <?= $nome ?> não foi alterado: <?= $msg?></p>
<?php
}
?>

<?php include("rodape.php"); ?>