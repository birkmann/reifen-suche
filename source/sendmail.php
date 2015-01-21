<?php

	$ToEmail = 'mail@rafaelbirkmann.de';
	$subject = 'Reifen Pabst - Bestellbestätigung ' . Trim(stripslashes($_POST["input-first-name"])) . ' ' . Trim(stripslashes($_POST["input-last-name"]));
	$EmailSubject = '=?UTF-8?B?'.base64_encode($subject).'?=';

	$Header = "From: ".Trim(stripslashes($_POST["input-mail"]))."\r\n";
	$Header .= "Reply-To: ".Trim(stripslashes($_POST["input-mail"]))."\r\n";
	$Header .= "Content-type: text/html; charset=utf-8\r\n";

	$Body = "<b>Vorname:</b> ".Trim(stripslashes($_POST["input-first-name"]))."<br>";
	$Body .= "<b>Nachname:</b> ".Trim(stripslashes($_POST["input-last-name"]))."<br>";
	$Body .= "<b>Telefonnummer:</b> ".Trim(stripslashes($_POST["input-phone"]))."<br><br>";
	$Body .= "<b>E-Mail:</b> ".Trim(stripslashes($_POST["input-mail"]))."<br><br>";
	$Body .= "<b>Nachricht:</b><br>".nl2br($_POST["textarea-message"])."<br><br>";
	$Body .= "<b>Bestellung:</b><br><br> ".nl2br($_POST["hidden-order"])."<br>";

	$ToEmailCust = Trim(stripslashes($_POST["input-mail"]));
	$BodyCust .= "<h3>Vielen Dank für Ihre Bestellung, die wir schnellstmöglich bearbeiten werden.</h3>";
	$BodyCust .= "<p>Bei Fragen zu Ihrer Bestellung oder zu Produkten stehen wir Ihnen gerne zur Verfügung: <a href=\"maitlo:info@reifen-pabst.de\">info@reifen-pabst.de</a></p><br><br>";
	$BodyCust .= "<b>Ihre Nachricht:</b><br>".nl2br($_POST["textarea-message"])."<br><br>";
	$BodyCust .= "<b>Ihre Bestellung:</b><br><br> ".nl2br($_POST["hidden-order"])."<br><br>";
	
	$success = mail($ToEmail, $EmailSubject, $Body, $Header);
	mail($ToEmailCust, $EmailSubject, $BodyCust, $Header);

	if ($success){
		 print "<meta http-equiv=\"refresh\" content=\"0;URL=danke.php\">";
	}

	else {
		print "<meta http-equiv=\"refresh\" content=\"0;URL=fehler.php\">";
	}

?>