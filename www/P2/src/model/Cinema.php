<?php
namespace App\model;

use App\utils\DatabaseSingleton;

class Cinema {
    private $db;

    public function __construct() {
        $dbSingleton = DatabaseSingleton::getInstance();
        $this->db = $dbSingleton->getConnection();
    }

    public function inserirCinema($nome, $endereco, $capacidade, $qtdSalas) {
        

        $stmt = $this->db->prepare("INSERT INTO cinemas (nome, endereco, capacidade, qtdSalas) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $nome, $endereco, $capacidade, $qtdSalas);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function excluirCinema($id) {
        $stmt = $this->db->prepare("DELETE FROM cinemas WHERE id = ?");
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    public function atualizarCinema($id, $nome, $endereco, $capacidade, $qtdSalas) {
        $stmt = $this->db->prepare("UPDATE cinemas SET nome = ?, endereco = ?, capacidade = ?, qtdSalas = ? WHERE id = ?");
        $stmt->bind_param("ssiii", $nome, $endereco, $capacidade, $qtdSalas, $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    
    public function listarCinemas() {
        $sql = "SELECT * FROM cinemas";
        $result = $this->db->query($sql);
    
        if (!$result) {
            die("Erro na consulta: " . $this->db->error);
        }

        // Verificar se há resultados antes de tentar processar
        if ($result->num_rows > 0) {
            $cinemas = array();
    
            while ($row = $result->fetch_assoc()) {
                $cinemas[] = $row;
            }
    
            return $cinemas;
        } else {
            // Sem resultados
            return array(); 
        }
    }
    
}
