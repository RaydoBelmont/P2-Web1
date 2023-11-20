<?php
use PHPUnit\Framework\TestCase;
use App\model\Cinema;
use App\controller\CinemaController;


class CinemaTest extends TestCase {
    private $cinema;
    private $controller;
    

    protected function setUp(): void {
        $this->cinema = new Cinema();
        $this->controller = new CinemaController($this->cinema);
    }

    public function testInserirCinema() {
        $result = $this->cinema->inserirCinema('Teste1', 'Rua teste 1', 1, 1);
        $this->assertTrue($result);
    }

    public function testExcluirCinema() {
        $inserir = $this->cinema->inserirCinema('Teste2', 'Rua teste 2', 2, 2);
        $this->assertTrue($inserir);
        $cinemas = $this->cinema->listarCinemas();
        $this->assertNotEmpty($cinemas);
        $ultimo_cinema = end($cinemas);
        $resultado = $this->cinema->excluirCinema($ultimo_cinema['id']);
        $this->assertTrue($resultado);
    }

    public function testAtualizarCinema() {
        $inserir = $this->cinema->inserirCinema('Teste3', 'Rua teste 3', 3, 3);
        $this->assertTrue($inserir);
        $cinemas = $this->cinema->listarCinemas();
        $this->assertNotEmpty($cinemas);
        $ultimo_cinema = end($cinemas);
        $resultado = $this->cinema->atualizarCinema($ultimo_cinema['id'], 'Teste4', 'Rua teste 4', 4, 4);
        $this->assertTrue($resultado);
    }

    public function testListarCinemas() {
        $inserir = $this->cinema->inserirCinema('Teste5', 'Rua teste 5', 5, 5);
        $this->assertTrue($inserir);
        $resultado = $this->cinema->listarCinemas();
        $this->assertNotEmpty($resultado);
    }

    public function testInserirController() {
        $result = $this->controller->inserirCinema('Teste6', 'Rua teste 6', 6, 6);
        $this->assertTrue($result);
    }

    public function testExcluirController() {
        $inserir = $this->controller->inserirCinema('Teste7', 'Rua teste 7', 7, 7);
        $this->assertTrue($inserir);
        $cinemas = $this->controller->listarCinemas();
        $this->assertNotEmpty($cinemas);
        $ultimo_cinema = end($cinemas);
        $resultado = $this->controller->excluirCinema($ultimo_cinema['id']);
        $this->assertTrue($resultado);
    }

    public function testAtualizarController() {
        $inserir = $this->controller->inserirCinema('Teste8', 'Rua teste 8', 8, 8);
        $this->assertTrue($inserir);
        $cinemas = $this->controller->listarCinemas();
        $this->assertNotEmpty($cinemas);
        $ultimo_cinema = end($cinemas);
        $resultado = $this->controller->atualizarCinema($ultimo_cinema['id'], 'Teste9', 'Rua teste 9', 9, 9);
        $this->assertTrue($resultado);
    }

    public function testListarController() {
        $inserir = $this->controller->inserirCinema('Teste10', 'Rua teste 10', 10, 10);
        $this->assertTrue($inserir);
        $resultado = $this->controller->listarCinemas();
        $this->assertNotEmpty($resultado);
    }

}