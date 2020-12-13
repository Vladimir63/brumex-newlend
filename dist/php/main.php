<?
	ini_set('display_errors','Off');

	include('func.php');

	if(!$_GET['sendLead']) {
		senderEmail('verinvld@yandex.ru', 'Новый лид с лендинга BRUMEX', 'no-reply@no.reply', 'no-reply@no.reply');
	}

?>
