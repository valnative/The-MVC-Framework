<?php

namespace Framework;

class View
{
    public static function render($content, $layout, $data = null): void
    {
        include_once APP_VIEWS . $layout;
    }
}