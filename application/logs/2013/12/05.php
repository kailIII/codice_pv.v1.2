<?php defined('SYSPATH') or die('No direct script access.'); ?>

2013-12-05 09:58:53 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-05 10:00:34 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') GROUP BY u.id' at line 4 ( SELECT u.id, u.nombre,u.cargo,COUNT(*) as  pendientes FROM users u
    INNER JOIN seguimiento s ON s.derivado_a=u.id
    WHERE s.estado='2'
    AND s.derivado_a IN  ) GROUP BY u.id ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-05 10:05:37 --- ERROR: Database_Exception [ 0 ]: [1146] Table 'correspondencia_pv2.pvpoas' doesn't exist ( SHOW FULL COLUMNS FROM `pvpoas` ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-05 10:18:09 --- ERROR: Database_Exception [ 0 ]: [1054] Unknown column 'liq.id_fucov' in 'on clause' ( select DISTINCT fcv.id_memo id_memo, doc.codigo, doc.nur, doc.nombre_remitente nombre, doc.cargo_remitente cargo, liq.fecha_creacion, of.oficina, fcv.id id_fucov 
                from documentos doc 
                inner join pvfucovs fcv on doc.id = fcv.id_documento
                inner join pvliquidaciones liq on liq.id_fucov = fcv.id
                inner join oficinas of on of.id = doc.id_oficina
                where doc.id_tipo = 13
                and of.id_entidad = 1 ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2013-12-05 10:18:31 --- ERROR: Database_Exception [ 0 ]: [1146] Table 'correspondencia_pv2.pvpoas' doesn't exist ( SHOW FULL COLUMNS FROM `pvpoas` ) ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]