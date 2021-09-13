<?php

require __DIR__ . '/crawler.php';


class Router
{

    public function post($url,$class)
    {
        $response = new Response();
        if($_SERVER["REQUEST_URI"] == $url ) {

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $methodClass = explode(":", $class)[1];
                $className = explode(":", $class)[0];
                $this->createObject($className, $methodClass);
            }
            else
            {
                $error["Message"] = "Method is not POST.";
                $response->setJSON($error);
            }
        }
        else
            echo "Используйте /crawler";
    }



    private function createObject($className,$methodClass)
    {
        $object = new $className();
        $object->$methodClass();
    }
}

