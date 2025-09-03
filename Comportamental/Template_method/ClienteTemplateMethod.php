<?php

require_once __DIR__ . "/Interface/Method.php";
require_once __DIR__ . "/Interface/TemplateMethod.php";
require_once __DIR__ . "/Class/Stringona.php";
require_once __DIR__ . "/Class/Stringuinha.php";

$stringona = new Stringona();
$stringuinha = new Stringuinha();
die(var_dump($stringuinha->resultado()));