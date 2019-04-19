<?php

namespace App\Controllers;

use App\Di\Container;


class Content extends Action
{
   
    protected $model = "incidentes";
     
    use Crud;


    
    public function index()
    {    

    	 $this->inicial();
    }

    public function conteudo()
    {
        $content = Container::Content($_GET['city'],$_GET['category']);

        if($content == null){

            $this->noContent();
        }

        $this->view->objetos = $content;


        $this->render('content');
    }

    public function conteudoFull(){

        $content = Container::ContentFull($_GET['id']);



        $this->view->objetos = $content;

        $this->render('content-full');
    }

    public function  inicial(){

        if (!empty($_POST)){

            $city = $_POST['city'];
            $category = $_POST['category'];

        }else {

            $city = 1;
            $category = 1;
        }

        $content = Container::initialContent($category,$city);
        $this->view->objetos = $content;
        $this->render('index');

    }

    public function noContent(){

        $this->render('no-content');
    }
    

   

    
 
}
