<?php
session_start();
define("RACINE",__DIR__);
require "".RACINE."/../vendor/autoload.php";
$config = require "".RACINE."/app/database/config.php";
require "".RACINE."/app/database/db.php";
require_once 'functions/functionGeneral.php';
require_once 'functions/functions.php';
$message='';
$titleH1 = '';
$describe = '';
$titleApp = isset($_SERVER['REQUEST_URI'])? strtoupper(str_replace('/','',$_SERVER['REQUEST_URI'])): "macata";
$database = DB::getInstance();
//var_dump($_SESSION);
$error="";
$ok=true;
/*
session_start();
require "../../../vendor/autoload.php";
$config = require "../../../core/app/database/config.php";
require "../../../core/app/database/db.php";
require_once 'functions/functionGeneral.php';
require_once 'functions/functions.php';
$titleH1 = '';
$describe = '';
$titleApp = isset($_SERVER['REQUEST_URI'])? strtoupper(str_replace('/','',$_SERVER['REQUEST_URI'])): "macata";
$database = DB::getInstance();
//var_dump($_SESSION);
$error="";
*/


