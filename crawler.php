<?php

include('simpleHTML/simple_html_dom.php');

class crawler
{
    public function parseData()
    {
        $urls = json_decode(file_get_contents("php://input"), 1);
        $this->checkTtile($urls);
    }

    private function checkTtile($urls)
    {
        $response = new Response();
        if(isset($urls["data"]))
        {
            $data = explode(",", $urls["data"]);

            foreach ($data as $url) {

                if(!empty(file_get_html(trim($url)))) {
                    $res[$url] = file_get_html(trim($url))->find('title', 0)->plaintext;
                }
                else{
                    $error["Message"] = "Error url.";
                    $response->setJson($error);
                    break;
                }

            }
            if(!isset($error))
                $response->setJson($res);
        }
        else
        {
            $error["Message"] = "Data error in request.";
            $response->setJson($error);
        }
    }


}