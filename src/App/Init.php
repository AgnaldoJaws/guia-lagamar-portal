<?php

namespace App;

use App\Init\Bootstrap;

/**
 * Class Init
 * @package App
 */
class Init extends Bootstrap
{

    /**
     * Método para setar rotas, baseadas em controlers e actions
     */
    protected function initRoutes()
    {
        $ar['home'] = ['route' => '/', 'controller' => 'content', 'action' => 'index'];

        $ar['incidentes'] = ['route' => '/incidentes', 'controller' => 'incidentes', 'action' => 'index'];

        $ar['inicial'] = ['route' => '/inicial', 'controller' => 'content', 'action' => 'inicial'];

        $ar['content'] = ['route' => '/content', 'controller' => 'content', 'action' => 'conteudo'];

        $ar['no-content'] = ['route' => '/no-content', 'controller' => 'content', 'action' => 'noContent'];

        $ar['content-full'] = ['route' => '/content-full', 'controller' => 'content', 'action' => 'conteudoFull'];

        $ar['incidentes-novo'] = ['route' => '/incidentes/novo', 'controller' => 'incidentes', 'action' => 'novo'];

        $ar['incidentes-show'] = ['route' => '/incidentes/show', 'controller' => 'incidentes', 'action' => 'show'];

        $ar['incidentes-edit'] = ['route' => '/incidentes/edit', 'controller' => 'incidentes', 'action' => 'edit'];

        $ar['incidentes-detele'] = ['route' => '/incidentes/delete', 'controller' => 'incidentes', 'action' => 'delete'];
       
        
        $this->setRoutes($ar);
    }



}
