<?php
use core\app\classes\Form;
use core\app\classes\FormFilter;
// generate a token for secuire this form //
$_SESSION['form']['csrf'] = str_shuffle(md5(uniqid()));
?>
<div class="display-flex box box-content margin-auto bg-cloud opacity9">
<?php
echo '<form class="margin-auto" id="formular" method="post" action="">';
	echo '<p class="input-focus padding10"><label for="email"> Votre email :</label>'.Form::input('text','email','Email','required','email').' *</p>';
	echo '<p class="input-focus padding10"><label for="password"> Votre password :</label>'.Form::input('password','password','Password','required','password').' *</p>';
	echo '<p><input type="hidden" id="csrf" name="csrf" value="'.$_SESSION['form']['csrf'].'"></p>';
	echo '<button class="rec-button void-success" type="submit" name="soumettre" id="soumettre">soumettre</button>';
echo '<div id="responseMessageError"></div>'.FormFilter::error_message().'</form>';
?>
</div>