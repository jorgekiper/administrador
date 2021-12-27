<?php

define("MOD_AMBIENT", "Developer");

define("MOD_ENVIO_MAILS", "SMTP");
#define("MOD_ENVIO_MAILS", "MAILPHP");

define("MOD_PAYMENT", "Sandbox");
#define("MOD_PAYMENT", "Production");

define("VIEW_REDNER", "Home/index.php");

switch (MOD_AMBIENT) {
	case 'Developer':
		define("PATH_ROOT", "/webroot/");
                define("DOCUMENT_ROOT", $_SERVER["DOCUMENT_ROOT"]);
		break;
	case 'Testing':
		define("PATH_ROOT", "/desarrollos/amapro_festival/webroot/");
            define("DOCUMENT_ROOT", $_SERVER["DOCUMENT_ROOT"]."/desarrollos/amapro_festival");
		break;
}

?>
