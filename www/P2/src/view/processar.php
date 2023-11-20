<?php
// processar.php

// Incluir o autoloader do Composer para carregar automaticamente as classes
require '../../vendor/autoload.php';

// Inicializar o controlador e o modelo
use App\Controller\CinemaController;
use App\Model\Cinema;

$cinemaModel = new Cinema(/* configurações do banco de dados, se necessário */);
$cinemaController = new CinemaController($cinemaModel);

// Verificar qual ação está sendo realizada
if (isset($_POST['inserir'])) {
    if ($_POST['id'] > 0){
    // Ação de edição
    $cinemaController->atualizarCinema($_POST['id'], $_POST['nome'], $_POST['endereco'], $_POST['capacidade'], $_POST['qtdSalas']);
    } else{
    // Ação de inserção
    $cinemaController->inserirCinema($_POST['nome'], $_POST['endereco'], $_POST['capacidade'], $_POST['qtdSalas']);
    }
} elseif (isset($_POST['excluir']) ) {
    // Ação de exclusão
    $cinemaController->excluirCinema($_POST['id']);
}

// Redirecionar de volta para a página principal
header('Location: principal.php');
exit;
?>
