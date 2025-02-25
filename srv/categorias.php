<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_CATEGORIA.php";

ejecutaServicio(function () {

  $lista = select(pdo: Bd::pdo(),  from: CATEGORIA,  orderBy: CAT_NOMBRE);

  $render = "";
  foreach ($lista as $modelo) {
    $encodeId = urlencode($modelo[CAT_ID]);
    $id = htmlentities($encodeId);
    $nombre = htmlentities($modelo[CAT_NOMBRE]);
    $descripcion = htmlentities($modelo[CAT_DESCRIPCION]);
    $estado = htmlentities($modelo[CAT_ESTADO]);
    $render .=
      "<li class='md-two-line'>
        <p>
          <a href='modifica.html?id=$id' style='text-decoration: none;'>
            <span class='headline'>{$nombre}</span>
            <span class='supporting'>Descripción: {$descripcion}</span>
            <span class='supporting'>Estado: {$estado}</span>
          </a>
        </p>
      </li>";
  }

  devuelveJson(["lista" => ["innerHTML" => $render]]);
});
