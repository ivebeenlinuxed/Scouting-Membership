<?php
define("START_MEM", memory_get_usage());
define("BOILER_LOCATION", __DIR__."/../framework/");
define("BOILER_TMP", __DIR__."/../_offline/tmp/");


$config = array();
if (file_exists(BOILER_LOCATION."application/config/config.php")) {
	include BOILER_LOCATION."application/config/config.php";
}


function __autoload($load) {
	$e = explode("\\", $load);
	$class = array_pop($e);
	foreach ($e as $key=>$data)
	$e[$key] = strtolower($data);

	if ($e[0] == "system") {
		$e = array_slice($e, 1);
		if (file_exists($loc = BOILER_LOCATION."system/".implode("/", $e)."/$class.php")) {
			include $loc;
			return;
		}
	} else {
		if (file_exists($loc = BOILER_LOCATION."application/".implode("/", $e)."/$class.php")) {
			include $loc;
			return;
		}

		if (file_exists($loc = BOILER_LOCATION."system/".implode("/", $e)."/$class.php")) {
			include $loc;
			return;
		}
	}

}


if (isset($_SERVER['_']))
$call = Core\Router::getController(array_slice($_SERVER['argv'], 1));
else
$call = Core\Router::getController(explode("/", substr($_SERVER['REQUEST_URI'], 1)));

if ($config['start_session'] || $config['login_required']) {
	session_start();
}

if ($config['login_required'] === true && $_SESSION['boiler_logged_in'] !== true) {
	$call[0] = "\\Controller\\".$config['login_controller'][0];
	$call[1] = $config['login_controller'][1];
}

$obj = new $call[0];
call_user_func_array(array($obj, $call[1]), $call[2]);
