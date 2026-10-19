---
title: "MySQL 5.0.51"
_old_id: "1115"
_old_uri: "2.x/getting-started/server-requirements/mysql-5.0.51-issues"
note: "La versión mínima admitida es MySQL 5.7 (ver Requisitos del Servidor); además, Setup rechaza instalarse en versiones anteriores a 4.1.20 y en 5.0.51/5.0.51a. Esta página está en el archivo."
translation: "getting-started/installation/troubleshooting/mysql-5.0.51"
---

## ¿Por qué MODX no admite el servidor MySQL 5.0.51?

MySQL 5.0.51, incluida la 5.0.51a, tiene errores graves con PDO, concretamente en agrupamiento, ordenación y sentencias preparadas.

Esto provoca errores irresolubles en consultas normales de MODX, así como en otras aplicaciones de código abierto, por lo que MODX no admite instalaciones con MySQL 5.0.51. Actualiza tu instalación de MySQL.

## Lista de errores del servidor MySQL 5.0.51

Solo algunos de los errores que se producen:

- <http://bugs.mysql.com/bug.php?id=32202>
- <http://bugs.php.net/bug.php?id=47655>
- <http://bugs.mysql.com/bug.php?id=36406>
