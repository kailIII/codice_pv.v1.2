<?php defined('SYSPATH') or die('No direct script access.'); ?>

2013-11-27 09:25:46 --- ERROR: ErrorException [ 8 ]: Undefined index: descripcion ~ APPPATH/classes/controller/documento.php [ 70 ]
2013-11-27 09:29:04 --- ERROR: ErrorException [ 8 ]: Undefined index: referencia ~ APPPATH/classes/controller/documento.php [ 100 ]
2013-11-27 09:33:29 --- ERROR: ErrorException [ 8 ]: Undefined index: id_obj_gestion ~ APPPATH/classes/controller/documento.php [ 137 ]
2013-11-27 11:24:23 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected 'if' (T_IF) ~ APPPATH/classes/controller/documento.php [ 176 ]
2013-11-27 11:25:40 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected '->' (T_OBJECT_OPERATOR) ~ APPPATH/classes/controller/documento.php [ 695 ]
2013-11-27 11:44:11 --- ERROR: ErrorException [ 1 ]: Class 'Model_Poa' not found ~ MODPATH/orm/classes/kohana/orm.php [ 109 ]
2013-11-27 12:00:42 --- ERROR: Kohana_Exception [ 0 ]: The id_obj_eps property does not exist in the Model_Poas class ~ MODPATH/orm/classes/kohana/orm.php [ 682 ]
2013-11-27 12:02:08 --- ERROR: Kohana_Exception [ 0 ]: The id_obj_eps property does not exist in the Model_Poas class ~ MODPATH/orm/classes/kohana/orm.php [ 682 ]
2013-11-27 12:02:54 --- ERROR: ErrorException [ 8 ]: Undefined variable: tipocontratacion ~ APPPATH/views/documentos/edit_poa.php [ 298 ]
2013-11-27 12:02:55 --- ERROR: ErrorException [ 8 ]: Undefined variable: tipocontratacion ~ APPPATH/views/documentos/edit_poa.php [ 298 ]
2013-11-27 12:23:20 --- ERROR: ErrorException [ 8 ]: Undefined index: descripcion ~ APPPATH/classes/controller/documento.php [ 419 ]
2013-11-27 12:24:46 --- ERROR: ErrorException [ 1 ]: Call to a member function loaded() on a non-object ~ APPPATH/classes/controller/documento.php [ 468 ]
2013-11-27 12:31:15 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-11-27 14:39:28 --- ERROR: Database_Exception [ 0 ]: [1146] Table 'correspondencia_pv2.pvpoas' doesn't exist ( SHOW FULL COLUMNS FROM `pvpoas` ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-11-27 17:48:23 --- ERROR: ErrorException [ 2 ]: Missing argument 2 for Controller_documento::contenido_documento(), called in /var/www/codice_pv2/application/classes/controller/documento.php on line 338 and defined ~ APPPATH/classes/controller/documento.php [ 790 ]
2013-11-27 18:07:14 --- ERROR: ErrorException [ 8 ]: Undefined variable: pvfucov ~ APPPATH/views/pvplanificacion/contenidopoa.php [ 109 ]