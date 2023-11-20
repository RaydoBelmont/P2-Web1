<?php

require '../../vendor/autoload.php';

// Inicializar o controlador e o modelo
use App\Controller\CinemaController;
use App\Model\Cinema;

$cinemaModel = new Cinema();
$cinemaController = new CinemaController($cinemaModel);

// Obter a lista de cinemas
$cinemas = $cinemaController->listarCinemas();

// Titulo da Pagina muda entre Inserir e Editar
$acao = isset($_POST['id']) ? 'Editando Registro' : 'Inserir Cinema';

//Nome do botao muda entre Inserir e Editar
$botao = isset($_POST['id']) ? 'Editar' : 'Inserir';

//Verifica se existe um ID , se sim armazena o valor na variavel
$valor_id = isset($_POST['id']) ? $_POST['id'] : null;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciamento de Cinemas</title>
</head>
<body>
    <h1>Gerenciamento de Cinemas</h1>

    <!-- Formulário para inserir cinema -->
    <h2><?= $acao; ?></h2>
    <form action="processar.php" method="post">
        <!-- Campos do formulário -->
        <input type="text" name="nome" placeholder="Nome">
        <input type="text" name="endereco" placeholder="Endereço">
        <input type="text" name="capacidade" placeholder="Capacidade">
        <input type="text" name="qtdSalas" placeholder="Quantidade de Salas">
        <input type="hidden" name="id" value="<?= $valor_id; ?>"> <!-- aqui so vai ter valor se existir um ID no POST -->
        <button type="submit" name="inserir"><?= $botao; ?></button>
    </form>

    <!-- Lista de Cinemas -->
    <h2>Listagem de Cinemas</h2>
    <ul>
        <?php foreach ($cinemas as $cinema): ?>
            <li>
                <?= $cinema['nome']; ?> - <?= $cinema['endereco'] ; ?> - Capacidade: <?= $cinema['capacidade']; ?> - Salas: <?= $cinema['qtdSalas']; ?> -
                <form action="principal.php" method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $cinema['id']; ?>"> <!-- qnd clicar no botao vai passar o ID pelo Post para essa msm pagina -->
                    <button type="submit" name="editar">Editar</button>
                </form>
                <form action="processar.php" method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $cinema['id']; ?>"> <!-- qnd clicar no botao vai passar o ID pelo Post para o processar -->
                    <button type="submit" name="excluir">Excluir</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
