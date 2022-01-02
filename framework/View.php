<?php

namespace Framework;

class View
{
    public static function render($layout, $content, $data = null): void
    {
        require_once APP_VIEWS . $layout;
    }
}
