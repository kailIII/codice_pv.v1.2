<?php defined('SYSPATH') or die('No direct script access.'); ?>

2013-12-04 08:41:53 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-04 09:54:26 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-04 09:54:37 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-04 09:56:54 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-04 10:46:57 --- ERROR: Database_Exception [ 0 ]: [1054] Unknown column 'id_documento' in 'where clause' ( SELECT `documentos`.* FROM `documentos` WHERE `id_documento` = '7090' LIMIT 1 ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-04 11:12:58 --- ERROR: Database_Exception [ 0 ]: [1146] Table 'correspondencia_pv2.pvpoas' doesn't exist ( SHOW FULL COLUMNS FROM `pvpoas` ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-04 11:13:14 --- ERROR: Database_Exception [ 0 ]: [1146] Table 'correspondencia_pv2.pvpoas' doesn't exist ( SHOW FULL COLUMNS FROM `pvpoas` ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-04 11:15:03 --- ERROR: Database_Exception [ 0 ]: [1146] Table 'correspondencia_pv2.pvpoas' doesn't exist ( SHOW FULL COLUMNS FROM `pvpoas` ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-04 11:34:49 --- ERROR: Database_Exception [ 0 ]: [1146] Table 'correspondencia_pv2.pvpoas' doesn't exist ( SHOW FULL COLUMNS FROM `pvpoas` ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-04 14:43:27 --- ERROR: ErrorException [ 8 ]: Undefined variable: resul ~ APPPATH/classes/controller/ajax.php [ 437 ]
2013-12-04 14:44:14 --- ERROR: ErrorException [ 8 ]: Undefined variable: resul ~ APPPATH/classes/controller/ajax.php [ 437 ]
2013-12-04 14:44:48 --- ERROR: ErrorException [ 8 ]: Undefined variable: resul ~ APPPATH/classes/controller/ajax.php [ 437 ]
2013-12-04 14:44:50 --- ERROR: ErrorException [ 8 ]: Undefined variable: resul ~ APPPATH/classes/controller/ajax.php [ 437 ]
2013-12-04 17:11:26 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-04 17:12:44 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-04 17:39:25 --- ERROR: ErrorException [ 8 ]: Undefined property: Controller_Ajax::$_db ~ APPPATH/classes/controller/ajax.php [ 124 ]
2013-12-04 17:52:09 --- ERROR: ErrorException [ 8 ]: Undefined property: Controller_Ajax::$_db ~ APPPATH/classes/controller/ajax.php [ 124 ]
2013-12-04 17:57:45 --- ERROR: ErrorException [ 8 ]: Undefined property: Controller_Ajax::$_db ~ APPPATH/classes/controller/ajax.php [ 124 ]
2013-12-04 18:03:55 --- ERROR: ErrorException [ 1 ]: Call to undefined method Database_MySQL_Result::save() ~ APPPATH/classes/controller/ajax.php [ 125 ]
2013-12-04 18:07:20 --- ERROR: ErrorException [ 1 ]: Call to undefined method Database_MySQL_Result::save() ~ APPPATH/classes/controller/ajax.php [ 125 ]
2013-12-04 18:43:50 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]