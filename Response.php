<?php


class Response
{

    public function setJson($arg)
    {
        echo json_encode($arg, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
    }
}