<?php

class Bd
{
  private static ?PDO $pdo = null;

  static function pdo(): PDO
  {
    if (self::$pdo === null) {

      self::$pdo = new PDO(
        // cadena de conexión
        "mysql:host=sql311.infinityfree.com;dbname=if0_38398297_pwa",
        // usuario
        "if0_38398297",
        // contraseña
        "U1A4wWZT2WJMymg",
        // Opciones: pdos no persistentes y lanza excepciones.
        [PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
      );

      self::$pdo->exec(
        "CREATE TABLE IF NOT EXISTS CATEGORIA (
          CAT_ID INT AUTO_INCREMENT,
          CAT_NOMBRE VARCHAR(100) NOT NULL,
          CAT_DESCRIPCION TEXT NOT NULL,
          CAT_ESTADO VARCHAR(50) NOT NULL,
          CONSTRAINT CAT_PK PRIMARY KEY (CAT_ID),
          CONSTRAINT CAT_NOM_UNQ UNIQUE (CAT_NOMBRE),
          CONSTRAINT CAT_NOM_NV CHECK (CHAR_LENGTH(CAT_NOMBRE) > 0),
          CONSTRAINT CAT_DES_NV CHECK (CHAR_LENGTH(CAT_DESCRIPCION) > 0),
          CONSTRAINT CAT_EST_NV CHECK (CHAR_LENGTH(CAT_ESTADO) > 0)
        ) ENGINE=InnoDB"
      );
    }

    return self::$pdo;
  }
}
