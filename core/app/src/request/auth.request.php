<?php
$config = require "../../database/config.php";
require "../../database/db.php";
$database = DB::getInstance();
use core\app\classes\traits\Hydrate;
use \core\app\src\model\Formule;
use core\app\src\model\Authentify;
use core\app\src\model\Profil;
$res = $database->select("SELECT id,email,id_group,id_profil FROM authentify");
echo json_encode($res);