<?php

namespace App\Controllers;

use App\Di\Container;

trait Crud {

    
    public function delete($id) {
        $stmt = $this->db->prepare("delete from ".$this->getTable()." where id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return true;
    }

    
    public function fetchAll($pagina) {
        $model = Container::getClass($this->model);                   
        $this->view->objetos = $model->fetchAllIncidentes($pagina);
    }

    

  
    

    

}
