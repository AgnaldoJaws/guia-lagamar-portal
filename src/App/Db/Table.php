<?php

namespace App\Db;


abstract class Table {

   
    protected $db;

    
    protected $table;


    public function __construct(\PDO $db) {
        $this->db = $db;
    }

   
    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

    
    public function getTable()
    {
        return $this->table;
    }

    abstract protected function _insert(array $data);

  
    abstract protected function _update(array $data);

    
    
    public function save(array $data) {
              
        if (isset($data['id'])) {            
            return $this-> _update($data);
        } else {            
            return $this->_insert($data);  
        }       
               
    }
    
    
    public function find($id) {       
        $stmt = $this->db->prepare("select * from ".$this->getTable()." where id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    }
    

}