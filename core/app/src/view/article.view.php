<?php use \core\app\classes\Route;?>
<?php $title = 'Articles'; ?>


<?php ob_start(); ?>

<h1><?= $titleH1; ?></h1>

<p><?= $describe; ?></p>


<?php
if (isset($_SESSION['auth']['idgroup']) && $_SESSION['auth']['idgroup']==2) {
	echo "<div>achat</div>";
}

if(isset($_SESSION['auth'])){
	echo "bienvenue dans les Articles";
}
?>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>-->
<form id="f">
<input type="text" name="search" id="search" value="">

<input type ="submit" value="ok">
</form>
<p id="m"></p>
<p id="mm"></p>
<div class="height200px width200px"><canvas id="myChart" width="200" height="200"></canvas></div>
<div class="height200px width200px"><canvas id="myChar" width="200" height="200"></canvas></div>
<script>
/*generateChartDoughnut('myChar','doughnut',['white','red'],'test',[80,20],[  'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'], [  'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'],options = null);
*/
//reponseFetch('http://localhost/macata/core/app/src/request/reqtest.php?d=GAPI',"m");

//drawFetch('http://localhost/macata/core/app/src/request/formule.request.php','GET','application/json',55,"m");

//ids("m").innerHTML = generateHtmlTagArray('p',['mes donne','dsddfsfd'],'f','bg-emerald');
//var tet = reponseFetchDataObject('http://localhost/macata/core/app/src/request/reqtest.php?d=GAPI',"mm");

searching('search',"http://localhost/macata/core/app/src/request/reqtest.php?d=",'blur','p','data','bg-carrot');
//asyncawait("http://localhost/macata/core/app/src/request/reqtest.php?d=actif").then((reponse) =>document.getElementById('mm').innerHTML = JSON.parse(reponse).code);
/*
asyncawait("http://localhost/macata/core/app/src/request/reqtest.php?d=GAPI").then((reponse)=> generateChartDoughnut('myChar','doughnut',
	[JSON.parse(reponse).code,'red'],'test',[800,250],['rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)'], ['rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)'],options = null));
*/
//searchAndShowGraphic('search','click');

</script>

<?php $content = ob_get_clean(); ?>


<?php require('templates/default.php'); ?>