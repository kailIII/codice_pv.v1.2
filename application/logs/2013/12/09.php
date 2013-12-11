<?php defined('SYSPATH') or die('No direct script access.'); ?>

2013-12-09 14:58:40 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-09 15:01:13 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-09 15:11:55 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-09 16:23:45 --- ERROR: ErrorException [ 8 ]: Undefined variable: resul ~ APPPATH/classes/controller/ajax.php [ 436 ]
2013-12-09 16:23:58 --- ERROR: ErrorException [ 8 ]: Undefined variable: resul ~ APPPATH/classes/controller/ajax.php [ 436 ]
2013-12-09 16:26:12 --- ERROR: ErrorException [ 8 ]: Undefined variable: resul ~ APPPATH/classes/controller/ajax.php [ 436 ]
2013-12-09 16:30:02 --- ERROR: ErrorException [ 8 ]: Undefined variable: resul ~ APPPATH/classes/controller/ajax.php [ 436 ]
2013-12-09 16:30:27 --- ERROR: ErrorException [ 8 ]: Undefined variable: resul ~ APPPATH/classes/controller/ajax.php [ 436 ]
2013-12-09 16:32:50 --- ERROR: ErrorException [ 8 ]: Undefined variable: resul ~ APPPATH/classes/controller/ajax.php [ 436 ]
2013-12-09 16:32:55 --- ERROR: ErrorException [ 8 ]: Undefined variable: resul ~ APPPATH/classes/controller/ajax.php [ 436 ]
2013-12-09 16:33:55 --- ERROR: ErrorException [ 8 ]: Undefined variable: resul ~ APPPATH/classes/controller/ajax.php [ 436 ]
2013-12-09 16:34:00 --- ERROR: ErrorException [ 8 ]: Undefined variable: resul ~ APPPATH/classes/controller/ajax.php [ 436 ]