<?php

namespace App\Models;

use App\Db\Table;



class Incidentes extends Table {

   
    protected $table = "incidentes";

   
    protected function _insert(array $data) {        
      
        $stmt = $this->db->prepare(
            "INSERT INTO ".$this->getTable().
            "(atendente, cliente, descricao, status, creation_time) VALUES(:atendente, :cliente, :descricao, :status, :creation_time)"
        );
       
        $stmt->bindParam(":atendente", $data['atendente']);
        $stmt->bindParam(":cliente", $data['cliente']);
        $stmt->bindParam(":descricao", $data['descricao']);
        $stmt->bindParam(":status", $data['status']);      
        $dt = new \DateTime();
        $agora =$dt->format('Y-m-d H:i:s');
        $stmt->bindParam(":creation_time",$agora);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

  
    protected function _update(array $data) {       
        $query = "UPDATE ".$this->getTable()." set descricao=:descricao, status=:status WHERE id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":descricao",$data['descricao']);
        $stmt->bindValue(":status",$data['status']);
        $stmt->bindValue(":id",$data['id']);       
        $ret = $stmt->execute();
        return $data['id'];
    }

    public function fetchAllIncidentes($pagina) {
        if ($pagina == 1){
            $limite = 0;
        } else {
            $limite = 7;
        }
        
        $offset =   $limite * $pagina;
        $query = "select i.id , a.nome AS atendente_nome, c.nome AS cliente_nome, i.descricao, i.status, i.creation_time from incidentes  i 
        inner join  clientes c on c.id = i.cliente
        inner join  atendentes a on a.id = i.atendente
        ORDER BY id DESC LIMIT ".$offset." ,7";
        $stmt = $this->db->prepare($query);
        $stmt->execute();       
        return $stmt->fetchAll();
        
    }
    


}