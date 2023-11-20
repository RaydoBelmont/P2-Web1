<?php
require '../../vendor/autoload.php';

use App\Controller\CinemaController;
use App\Model\Cinema;

$cinemaModel = new Cinema();
$cinemaController = new CinemaController($cinemaModel);

// Verificar qual ação está sendo realizada
if (isset($_POST['inserir'])) {
    if ($_POST['id'] > 0){ //se existir um ID e pq esta editando
    // Ação de edição
    $cinemaController->atualizarCinema($_POST['id'], $_POST['nome'], $_POST['endereco'], $_POST['capacidade'], $_POST['qtdSalas']);
    } else{ //se nao vai para inserção
    // Ação de inserção
    $cinemaController->inserirCinema($_POST['nome'], $_POST['endereco'], $_POST['capacidade'], $_POST['qtdSalas']);
    }
} elseif (isset($_POST['excluir']) ) {
    // Ação de exclusão
    $cinemaController->excluirCinema($_POST['id']);
}

header('Location: principal.php');
exit;
?>
