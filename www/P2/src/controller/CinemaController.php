<?php
namespace App\controller;

class CinemaController {
    private $cinema;

    public function __construct($cinema) {
        $this->cinema = $cinema;
    }

    public function inserirCinema($nome, $endereco, $capacidade, $qtdSalas) {
        return $this->cinema->inserirCinema($nome, $endereco, $capacidade, $qtdSalas);
    }  
      public function atualizarCinema($id, $nome, $endereco, $capacidade, $qtdSalas) {
        return $this->cinema->atualizarCinema($id, $nome, $endereco, $capacidade, $qtdSalas);
    }
    public function excluirCinema($id) {
        return $this->cinema->excluirCinema($id);
    }

    public function listarCinemas() {
        return $this->cinema->listarCinemas();
    }
}
