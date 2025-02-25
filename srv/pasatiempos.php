<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_PASATIEMPO.php";

ejecutaServicio(function () {

  $lista = select(pdo: Bd::pdo(),  from: PASATIEMPO,  orderBy: PAS_NOMBRE);

  $render = "";
  foreach ($lista as $modelo) {
    $encodeId = urlencode($modelo[PAS_ID]);
    $id = htmlentities($encodeId);
    $nombre = htmlentities($modelo[PAS_NOMBRE]);
    $render .=
      "<li class='md-two-line'>
        <p>
          <a href='modifica.html?id=$id' style='text-decoration: none;'>
            <span class='headline'>{$nombre}</span>
            <span class='supporting'>Campo2</span>
          </a>
        </p>
    </li>";
  }

  devuelveJson(["lista" => ["innerHTML" => $render]]);
});
