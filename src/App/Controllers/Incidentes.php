<?php

namespace App\Controllers;

use App\Di\Container;


class Incidentes extends Action
{
   
    protected $model = "incidentes";
     
    use Crud;

    public function dashboard ()
    {
        $this->render('dashboard');
    }
    
    public function index()
    {    
        if(!empty($_GET['pagina']))
        {
            $pagina = $_GET['pagina'];

        }else 
        {
            $pagina = 0;
        }
         $this->fetchAll($pagina);    
    	 $this->render('index');
    }
    
    public function novo()
    {
        $model = Container::getClass($this->model);
        $model->save($_POST);
        header("Location:/incidentes");
        
    }

    public function show()
     {  
         
        $model = Container::getClass($this->model);        
        $this->view->objetos = $model->find($_GET['id']);        
        $this->render("edit", false);
    }

    public function edit()
    {    
               
        $model = Container::getClass($this->model);
        $model->save($_POST);
        header("Location:/incidentes");
       
    }

   

    
 
}
