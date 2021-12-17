<?php

class View
{
    public function generate($template, $data, $layout)
    {
        include 'src/' . $layout;
    }
}
