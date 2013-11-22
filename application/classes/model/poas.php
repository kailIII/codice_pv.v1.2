<?php
defined('SYSPATH') or die ('no tiene acceso');
//descripcion del modelo poas
class Model_Poas extends ORM{
    protected $_table_names_plural = false;
    protected $_sorting=array('id'=>'ASC');
    
	protected $_belogn_to=array(
        'pvogestiones'=>array(
            'model'=>'pvogestiones',
            'foreign_key'=>'id_obj_gestion'
        ),
        'pvoespecificos'=>array(
            'model'=>'pvoespecificos',
            'foreign_key'=>'id_obj_esp'
        ),
        'pvactividades'=>array(
            'model'=>'pvactividades',
            'foreign_key'=>'id_actividad'
        ),
        'documentos'=>array(
            'model'=>'documentos',
            'foreign_key'=>'id_documento'
        ),
        'poatipocontrataciones'=>array(
            'model'=>'poatipocontrataciones',
            'foreign_key'=>'id_tipocontratacion'
        )
    );

}
?>
