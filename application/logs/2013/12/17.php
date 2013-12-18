<?php defined('SYSPATH') or die('No direct script access.'); ?>

2013-12-17 11:21:28 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-17 15:13:22 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-17 16:47:14 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/documento.php [ 1016 ]
2013-12-17 17:54:51 --- ERROR: ErrorException [ 1 ]: Class 'Model_Pvoestrategico' not found ~ MODPATH/orm/classes/kohana/orm.php [ 109 ]
2013-12-17 17:54:54 --- ERROR: ErrorException [ 1 ]: Class 'Model_Pvoestrategico' not found ~ MODPATH/orm/classes/kohana/orm.php [ 109 ]
2013-12-17 17:54:58 --- ERROR: ErrorException [ 1 ]: Class 'Model_Pvoestrategico' not found ~ MODPATH/orm/classes/kohana/orm.php [ 109 ]
2013-12-17 17:55:02 --- ERROR: ErrorException [ 1 ]: Class 'Model_Pvoestrategico' not found ~ MODPATH/orm/classes/kohana/orm.php [ 109 ]
2013-12-17 17:55:05 --- ERROR: ErrorException [ 1 ]: Class 'Model_Pvoestrategico' not found ~ MODPATH/orm/classes/kohana/orm.php [ 109 ]
2013-12-17 17:55:08 --- ERROR: ErrorException [ 1 ]: Class 'Model_Pvoestrategico' not found ~ MODPATH/orm/classes/kohana/orm.php [ 109 ]
2013-12-17 17:55:12 --- ERROR: ErrorException [ 1 ]: Class 'Model_Pvoestrategico' not found ~ MODPATH/orm/classes/kohana/orm.php [ 109 ]
2013-12-17 17:59:36 --- ERROR: ErrorException [ 1 ]: Class 'Model_Pvoestrategico' not found ~ MODPATH/orm/classes/kohana/orm.php [ 109 ]
2013-12-17 17:59:38 --- ERROR: ErrorException [ 1 ]: Class 'Model_Pvoestrategico' not found ~ MODPATH/orm/classes/kohana/orm.php [ 109 ]
2013-12-17 17:59:40 --- ERROR: ErrorException [ 1 ]: Class 'Model_Pvoestrategico' not found ~ MODPATH/orm/classes/kohana/orm.php [ 109 ]
2013-12-17 17:59:48 --- ERROR: ErrorException [ 1 ]: Class 'Model_Pvoestrategico' not found ~ MODPATH/orm/classes/kohana/orm.php [ 109 ]
2013-12-17 18:04:40 --- ERROR: ErrorException [ 1 ]: Class 'Model_Pvoestrategico' not found ~ MODPATH/orm/classes/kohana/orm.php [ 109 ]
2013-12-17 18:39:27 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected '?>' ~ APPPATH/views/documentos/edit.php [ 621 ]