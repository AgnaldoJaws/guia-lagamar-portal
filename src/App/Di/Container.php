<?php

namespace App\Di;

use GuzzleHttp\Client;

/**
 * Class Container
 * @package App\Di
 */
class Container {

    /**
     * @return \PDO
     */
    private static function getDb() {
        $db = new \PDO("mysql:host=localhost;dbname=teste_chall", "root", "ab45", array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $db;
    }

    /**
     * @param $name
     * @param string $data
     * @return mixed
     */
    public static function getClass($name, $data = "") {        
        $str_class = "\\App\\Models\\" . ucfirst($name);
        if ($data)
            $class = new $str_class(self::getDb(), $data);
        else
            $class = new $str_class(self::getDb());
        return $class;
    }



    public static function  GET2()
    {
        $client = new Client();
        $res = $client->request('GET', 'http://dev.stbelavista.com.br/api/content/13' );
        return json_decode($res->getBody()->getContents(), true);

    }

    public static function initialContent ($city, $category)
    {
        $client = new Client();
        $res = $client->request('GET', 'http://dev.stbelavista.com.br/api/subCategories/'.$city.'/'.$category );
        return json_decode($res->getBody()->getContents(), true);
    }

    public static  function Content ($city, $category)
    {

        try{
            $client = new Client();
            $res = $client->request('GET', 'http://dev.stbelavista.com.br/api/contenties/'.$category.'/'. $city );
            return json_decode($res->getBody()->getContents(), true);

        }catch (\Exception $e){

            return null;
        }


    }

    public static  function ContentFull ($id)
    {

        $client = new Client();
        $res = $client->request('GET', 'http://dev.stbelavista.com.br/api/content/'.$id );

        return json_decode($res->getBody()->getContents(), true);
    }


}
