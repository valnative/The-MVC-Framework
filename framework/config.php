<?php

define('APP_ROOT', dirname(__FILE__, 2));

const APP_NAME = 'V-SHOP';
const APP_CONTROLLERS = APP_ROOT.'/app/Controllers/';
const APP_MODELS = APP_ROOT.'/app/Models/';
const APP_VIEWS = APP_ROOT.'/resources/views/';

const DB_HOST = 'localhost';
const DB_NAME = 'nix_db';
const DB_USER = 'nix_user';
const DB_PASS = '123';
const DB_DSN = 'mysql:host='.DB_HOST.';dbname='.DB_NAME;