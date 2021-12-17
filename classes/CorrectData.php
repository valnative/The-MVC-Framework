<?php

class CorrectData
{
    public function dataIsCorrect(bool $status): void
    {
        $link_header = "Location: https://" . $_SERVER["HTTP_HOST"];

        $status ? header($link_header . "/success.php") : header($link_header . "/failure.php");
    }
}