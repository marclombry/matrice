<?php use \core\app\classes\Route;?>
<?php $title = 'Admin Home'; ?>
<?php $titleH1 ='Administration / Supprimer';?>

<?php ob_start(); ?>

<p><?= $describe; ?></p>
<?php require_once("view/partials/module.view.php");?>
<div id="show_module"></div>
<div id="show_form"></div>
<div id="show_request"></div>
<!--<script src="http://localhost/macata/core/app/public/js/adminDelete.js"/>-->

</div>

<?php $content = ob_get_clean(); ?>


<?php require("".RACINE."/app/src/view/templates/default.php"); ?>