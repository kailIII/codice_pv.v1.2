<?php defined('SYSPATH') or die('No direct script access.'); ?>

2013-11-14 11:45:48 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected 'else' (T_ELSE) ~ APPPATH/classes/controller/documento.php [ 188 ]
2013-11-14 11:46:31 --- ERROR: ErrorException [ 1 ]: Call to undefined method Database_MySQL_Result::save() ~ APPPATH/classes/controller/ajax.php [ 126 ]
2013-11-14 12:02:38 --- ERROR: ErrorException [ 2 ]: mysql_num_rows() expects parameter 1 to be resource, boolean given ~ MODPATH/database/classes/kohana/database/mysql/result.php [ 20 ]
2013-11-14 12:06:38 --- ERROR: ErrorException [ 2 ]: mysql_num_rows() expects parameter 1 to be resource, boolean given ~ MODPATH/database/classes/kohana/database/mysql/result.php [ 20 ]
2013-11-14 12:06:52 --- ERROR: ErrorException [ 2 ]: mysql_num_rows() expects parameter 1 to be resource, boolean given ~ MODPATH/database/classes/kohana/database/mysql/result.php [ 20 ]
2013-11-14 12:12:52 --- ERROR: ErrorException [ 2 ]: mysql_num_rows() expects parameter 1 to be resource, boolean given ~ MODPATH/database/classes/kohana/database/mysql/result.php [ 20 ]
2013-11-14 12:17:03 --- ERROR: ErrorException [ 8 ]: Undefined property: Controller_Ajax::$_db ~ APPPATH/classes/controller/ajax.php [ 124 ]
2013-11-14 15:40:25 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-11-14 15:41:12 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-11-14 15:45:32 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-11-14 16:05:30 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]