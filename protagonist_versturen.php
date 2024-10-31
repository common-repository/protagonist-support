<?php

$Email = Trim(stripslashes($_POST['email'])); 
$EmailFrom = $Email;
$EmailTo = "support@protagonist.nl";
$Subject = "Support aanvraag vanuit WordPress";
$Naam = Trim(stripslashes($_POST['naam'])); 
$Klant = Trim(stripslashes($_POST['klantnummer'])); 
$Bericht = Trim(stripslashes($_POST['bericht'])); 
$Domein = Trim(stripslashes($_POST['domein'])); 

// Validatie
$validationOK=true;
if (!$validationOK) {
  print '<div style="width:100%;height:100%;background:-moz-linear-gradient(top,#ffffff 0%,#e2e2e2 100%);background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#ffffff),color-stop(100%,#e2e2e2));background: -webkit-linear-gradient(top, #ffffff 0%,#e2e2e2 100%);background: -o-linear-gradient(top, #ffffff 0%,#e2e2e2 100%);background: -ms-linear-gradient(top, #ffffff 0%,#e2e2e2 100%);background: linear-gradient(top, #ffffff 0%,#e2e2e2 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#ffffff\', endColorstr=\'#e2e2e2\',GradientType=0 );"><p style="text-align:center;font-family: Century Gothic, sans-serif;color:#333333;margin-top:100px"><img src="logo.png" width="118" height="80" /><br/><br/>Er ging iets mis, probeer het later nog eens.</p>';
  exit;
}

// Bericht klaarmaken
$Body = "";
$Body .= "Naam: ";
$Body .= $Naam;
$Body .= "\n";
$Body .= "E-mail: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Klantnummer: ";
$Body .= $Klant;
$Body .= "\n";
$Body .= "Domein: ";
$Body .= $Domein;
$Body .= "\n";
$Body .= "Bericht: ";
$Body .= $Bericht;
$Body .= "\n";

// Verzenden
$success = mail($EmailTo, $Subject, $Body, "From: $Naam <$EmailFrom>");

// Redirect
if ($success){
  print '<div style="width:100%;height:100%;background:-moz-linear-gradient(top,#ffffff 0%,#e2e2e2 100%);background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#ffffff),color-stop(100%,#e2e2e2));background: -webkit-linear-gradient(top, #ffffff 0%,#e2e2e2 100%);background: -o-linear-gradient(top, #ffffff 0%,#e2e2e2 100%);background: -ms-linear-gradient(top, #ffffff 0%,#e2e2e2 100%);background: linear-gradient(top, #ffffff 0%,#e2e2e2 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#ffffff\', endColorstr=\'#e2e2e2\',GradientType=0 );"><p style="text-align:center;font-family: Century Gothic, sans-serif;color:#333333;margin-top:100px"><img src="logo.png" width="118" height="80" /><br/><br/>Uw bericht is verzonden. U wordt doorgestuurd naar het WordPress Dashboard.</p></div>';
  print '<meta http-equiv="refresh" content="3;url=../../../wp-admin/">';
}
else{
  print '<div style="width:100%;height:100%;background:-moz-linear-gradient(top,#ffffff 0%,#e2e2e2 100%);background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#ffffff),color-stop(100%,#e2e2e2));background: -webkit-linear-gradient(top, #ffffff 0%,#e2e2e2 100%);background: -o-linear-gradient(top, #ffffff 0%,#e2e2e2 100%);background: -ms-linear-gradient(top, #ffffff 0%,#e2e2e2 100%);background: linear-gradient(top, #ffffff 0%,#e2e2e2 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#ffffff\', endColorstr=\'#e2e2e2\',GradientType=0 );"><p style="text-align:center;font-family: Century Gothic, sans-serif;color:#333333;margin-top:100px"><img src="logo.png" width="118" height="80" /><br/><br/>Er ging iets mis, probeer het later nog eens.</p>';
  print '<meta http-equiv="refresh" content="3;url=../../../wp-admin/">';
}
?>