<script type="text/javascript">
    $(function(){
        $('#obj_gestion').change(function(){
            var id = $('#obj_gestion').val();
            $('#det_obj_gestion').html('');
            $('#obj_esp').html('');
            $('#det_obj_esp').html('');
            $('#actividad').html('');
            $('#det_act').html('');
            var act = 'detobjgestion';///detalle del Objetivo de Gestion 
            var ctr = $('#det_obj_gestion');
            ajaxs(id, act, ctr);
            act = 'objespecifico';
            ctr = $('#obj_esp');
            ajaxs(id, act, ctr);
        });
        $('#obj_esp').change(function(){
            var id = $('#obj_esp').val();
            $('#det_obj_esp').html('');
            $('#actividad').html('');
            $('#det_act').html('');
            var act = 'detobjespecifico';///detalle del Objetivo Especifico 
            var ctr = $('#det_obj_esp');
            ajaxs(id, act, ctr);
            act = 'actividad';///actividades 
            ctr = $('#actividad');
            ajaxs(id, act, ctr);
            
        });
        $('#actividad').change(function(){
            var id = $('#actividad').val();
            $('#det_act').html('');
            var act = 'detactividad';///detalle del Objetivo Especifico 
            var ctr = $('#det_act');
            ajaxs(id, act, ctr);
            
        });
        
        function ajaxs(id, accion, control)
        {        
            $.ajax({
                type: "POST",
                data: { id: id},
                url: "/pvajax/"+accion,
                dataType: "json",
                success: function(item)
                {
                    $(control).html(item);
                },
                error: $(control).html(''),
            });
        }

        // Modificado por Freddy Velasco
var valor = $('#id_tipocontratacion option:selected').html();
     if(valor =='Otros'){
        $('#id_label_otro_tc').show();
        $('#id_otro_tipocontracion').show();
        $('#otro_tipocontratacion').attr('class','required');
     }else{
        $('#id_label_otro_tc').hide();
        $('#id_otro_tipocontracion').hide();
        $('#otro_tipocontratacion').removeAttr('class');
     }

$('#id_tipocontratacion').change(function(){
     var valor = $('#id_tipocontratacion option:selected').html();
     if(valor =='Otros'){
        $('#id_label_otro_tc').show();
        $('#id_otro_tipocontracion').show();
        $('#otro_tipocontratacion').attr('class','required');
     }else{
        $('#id_label_otro_tc').hide();
        $('#id_otro_tipocontracion').hide();
        $('#otro_tipocontratacion').removeAttr('class');
     }
});
//////////end////////////// 

        $('#frmEditarpoa').validate();
        $('.autorizar').live('click', function() {
            var answer = confirm("Esta seguro de Aprobar Certificacion POA? ")
            if (answer)
                return true;
            return false;
        });
    });
</script>
<?php 
?>
<div class="formulario" style="padding: 20px 0;">        
    <div style="border-bottom: 1px solid #ccc; background: #F2F7FC; display: block; padding: 0px 0;   width: 100%;  ">
        <h2 style="text-align:center;">Certificaci&oacute;n POA </h2><hr/><hr />
        <form action="/pvplanificacion/modificarpoa/<?php echo $poa->id; ?>" method="post" id="frmEditarpoa" >
            <fieldset>
                <table width="100%" border="0px">
                    <tr>
                        <td><?php echo Form::label('unidad_ejecutora', 'Unidad Ejecutora POA:', array('class' => 'form')); ?></td>
                        <td colspan="2"><?php echo $ue_poa->oficina ?></td>
                        <td>Nro.: <?php echo Form::input('nro_poa',$poa->nro_poa); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo Form::label('obj_gestion', 'C&oacute;digo Objetivo de Gesti&oacute;n:', array('class' => 'form')); ?></td>
                        <td colspan="3"><?php echo Form::select('obj_gestion', $obj_gestion, $poa->id_obj_gestion, array('class' => 'form', 'name' => 'obj_gestion', 'id' => 'obj_gestion', 'class' => 'required')); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo Form::label('detalle_obj_gestion', 'Detalle Objetivo de Gesti&oacute;n:', array('class' => 'form')); ?></td>
                        <td colspan="3"><br />
                            <textarea name="det_obj_gestion" id="det_obj_gestion" style="width: 600px;" readonly rows="2" ><?php echo $det_obj_gestion; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo Form::label('obj_esp', 'C&oacute;digo Objetivo Espec&iacute;fico:', array('class' => 'form')); ?></td>
                        <td colspan="3"><?php echo Form::select('obj_esp', $obj_esp, $poa->id_obj_esp, array('class' => 'form', 'class' => 'required', 'id' => 'obj_esp', 'name' => 'obj_esp')); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo Form::label('det_obj_esp', 'Detalle Objetivo Espec&iacutefico:', array('class' => 'form')); ?></td>
                        <td colspan="3"><textarea name="det_obj_esp" id="det_obj_esp" style="width: 600px;" readonly rows="2" ><?php echo $det_obj_esp; ?></textarea></td>
                    </tr>
                    <tr>
                        <td><b><?php echo Form::label('actividad', 'C&oacute;digo Actividad', array('class' => 'form')); ?></b></td>
                        <td colspan="3"><?php echo Form::select('actividad', $actividad, $poa->id_actividad, array('class' => 'form', 'class' => 'required', 'id' => 'actividad', 'name' => 'actividad')); ?></td>
                    </tr>
                    <tr>
                        <td><b><?php echo Form::label('det_act', 'Detalle:', array('class' => 'form')); ?></b></td>
                        <td colspan="3"><br />
                            <textarea name="det_act" id="det_act" style="width: 600px;" readonly rows="2" ><?php echo $det_act; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><b><?php echo Form::label('id_tipocontratacion', 'Tipo de Contratacion:', array('class' => 'form')); ?></b></td>
                        <td><?php echo Form::select('id_tipocontratacion', $tipocontratacion, $poa->id_tipocontratacion, array('class' => 'form', 'class' => 'required', 'id' => 'id_tipocontratacion', 'name' => 'id_tipocontratacion')); ?></td>
                        <td id="id_label_otro_tc"><b><?php echo Form::label('otro_tipocontratacion', 'Otro:', array('class' => 'form')); ?></b></td>
                        <td id="id_otro_tipocontracion"><?php echo Form::input('otro_tipocontratacion',$poa->otro_tipocontratacion,array('class'=>'form','id'=>'otro_tipocontratacion')); ?></td>
                    </tr>
                    <td colspan="4"><hr /><br /></td>
                    <tr>
                        <td colspan="4" align="center">
                            <table>
                                <tr>
                                    <td>
                                        <table class="classy" border="1">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center;" colspan="2">TIPO DE ACTIVIDAD</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>INVERSION</td>
                                                    <td><input type="radio" name="tipo_actividad" value="INVERSION" <?php if($poa->tipo_actividad == "INVERSION") { echo 'checked';} ?> ></td>

                                                </tr>
                                                <tr>
                                                    <td>FUNCIONAMIENTO</td>
                                                    <td><input type="radio" name="tipo_actividad" value="FUNCIONAMIENTO" <?php if($poa->tipo_actividad == "FUNCIONAMIENTO") { echo 'checked';} ?>></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    <td>
                                        <table class="classy" border="1">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center;">RECURSOS</th>
                                                    <th style="text-align:center;">Organismo Financiador</th>
                                                    <th style="text-align:center;">%</th>
                                                </tr>
                                            </thead>
                                            <TBODY>
                                                <tr>  
                                                    <td>Internos</td>
                                                    <td><?php echo Form::input('ri_financiador',$poa->ri_financiador,array('id'=>'ri_financiador')); ?></td>
                                                    <td><?php echo Form::input('ri_porcentaje',$poa->ri_porcentaje,array('id' => 'ri_porcentaje','size'=>'6','class'=>'number','max'=>100, 'min'=>0)); ?> %</td>
                                                </tr>
                                                <tr>
                                                    <td>Externos</td>
                                                    <td><?php echo Form::input('re_financiador',$poa->re_financiador,array('id'=>'re_financiador')); ?></td>
                                                    <td><?php echo Form::input('re_porcentaje',$poa->re_porcentaje,array('id' => 're_porcentaje','size'=>'6','class'=>'number','max'=>100, 'min'=>0)); ?> %</td>
                                                </tr>
                                            </TBODY>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                    <tr>
                    <td colspan="4"><hr /><br /></td>
                </tr>
                <tr>
                    <td colspan="4">
                        <table>
                            <tr>
                                <td>
                                    <table class="classy" border="1">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">PROCESO DE CONTRATACI&Oacute;N / ADQUISICI&Oacute;N (descripci&oacute;n especifica)</th>
                                                <th style="text-align:center;">Cantidad</th>
                                                <th style="text-align:center;">Monto Total (Bs)</th>
                                                <th style="text-align:center;">Plazo de Ejecuci&oacute;n</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><textarea name="referencia" id="referencia" style="width: 380px;" ><?php echo $poa->proceso_con; ?></textarea></td>
                                                <td><?php echo Form::input('cantidad',$poa->cantidad,array('id'=>'cantidad','size'=>'4','class'=>'number')); ?></td>
                                                <td><?php echo Form::input('monto_total',$poa->monto_total,array('id'=>'monto_total','size'=>'8','class'=>'number')); ?></td>
                                                <td><?php echo Form::input('plazo_ejecucion',$poa->plazo_ejecucion,array('id'=>'plazo_ejecucion','size'=>'15')); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
                </table>
            </fieldset>
            <div style="text-align: center;"> <input type="submit" name="documento" value="Modificar documento" class="uibutton" /></div>
        </form>
    </div>
    <center>
        <a href="/pdf/certificacionpoa.php?id=<?php echo $poa->id_documento;?>&f=<?php echo $poa->id?>" class="link pdf" target="_blank" title="Imprimir PDF" >imprimir Certificado</a>
        <?php if($poa->estado == 0):?>
            <a href="/pvplanificacion/aprobarpoa/<?php echo $poa->id; ?>" class="autorizar" title="Aprobar POA" ><img src="/media/images/tick.png"/>Aprobar POA</a>
        <?php endif;?>
        <?php if($poa->estado == 1):?>
            <a href="/hojaruta/derivar/?id_doc=<?php echo $poa->id_documento; ?>" class="link derivar" title="Derivar a partir del documento, si ya esta derivado muestra el seguimiento" >Derivar</a>
        <?php endif;?>
        <br />
    </center>
</div>


