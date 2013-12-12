<?php

require_once('../libs/tcpdf/config/lang/eng.php');
require_once('../libs/tcpdf/tcpdf.php');
require_once('../db/dbclass.php');
$id = $_GET['id'];
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
    
    //Page header
    public function Header() {
        
        
        
        $id = $_GET['id'];
        $dbh = New db();
        $stmt = $dbh->prepare("SELECT c.logo,c.id FROM documentos AS a INNER JOIN oficinas AS b ON a.id_oficina = b.id
INNER JOIN entidades AS c ON b.id_entidad = c.id WHERE a.id = '$id'");
        $stmt->execute();
        //echo "<B>outputting...</B><BR>";
        $image_file = 'logo.jpg';
        while ($rs2 = $stmt->fetch(PDO::FETCH_OBJ)) {
            if ($rs2->logo) {
                $image_file = '../media/logos/' . $rs2->logo;
            }
            $id_entidad=$rs2->id;
        }
        if($id_entidad<>2 && $id_entidad<>4){
        $this->Image($image_file, 89, 5, 40, 23, 'PNG');
        }
        $this->SetFont('helvetica', 'B', 20);        
    }

    // Page footer
    public function Footer() {
        $id = $_GET['id'];
        $dbh = New db();
        $stmt = $dbh->prepare("SELECT e.pie_1,e.pie_2,e.id FROM documentos d 
                               INNER JOIN tipos t ON d.id_tipo=t.id
                               INNER JOIN oficinas o ON d.id_oficina=o.id
                               INNER JOIN entidades e ON o.id_entidad=e.id
                               WHERE d.id='$id'");
        $stmt->execute();
        while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
            $pie1 = $rs->pie_1;
            $pie2 = $rs->pie_2;
            $id_entidad=$rs->id;
        }
        if($id_entidad<>2){
        // Linea vertical negra
            
        $style = array('width' => 1.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0));
        $this->Line(140, 257, 140, 272, $style);
        // logo quinua
        $this->Image('../media/logos/logo_quinua.jpg', 140, 253, 40, 22, 'JPG');
        // Pie de pagina
        $this->SetFont('helvetica', 'I', 7);
        $this->MultiCell(85, 0, $pie1, 0, 'R', false, 1, 50, 260, true, 0, false, true, 0, 'T', false);
        $this->MultiCell(90, 0, $pie2, 0, 'R', false, 1, 45, 266, true, 0, false, true, 0, 'T', false);
        $this->SetY(30);
        }
    }

}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LETTER', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('DOCUMENTO');
$pdf->SetSubject('TCPDF');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));


// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
//$pdf->SetMargins(20, 33, 20);
$pdf->SetMargins(20, PDF_MARGIN_TOP, 20);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

$pdf->SetFont('Helvetica', 'B', 18);

// add a page
$pdf->AddPage();
$nombre = 'cert_ppto';
try {
    $dbh = New db();
    $stmt = $dbh->prepare("SELECT * FROM documentos d 
                               INNER JOIN tipos t ON d.id_tipo=t.id
                               WHERE d.id='$id'");
    $stmt->execute();
    $rs = $stmt->fetch(PDO::FETCH_OBJ);
    $mes = (int) date('m', strtotime($rs->fecha_creacion));
    $meses = array(1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre');
    $stmt = $dbh->prepare("SELECT * FROM documentos WHERE id=$id");
    $stmt->execute();
    $documento = $stmt->fetch(PDO::FETCH_OBJ);
    
    ///usuario solicitante
    $stmt = $dbh->prepare("SELECT * FROM users WHERE id = $documento->id_user");
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_OBJ);
        
    ///oficina solicitante
    $stmt = $dbh->prepare("SELECT * FROM oficinas WHERE id=$documento->id_oficina");
    $stmt->execute();
    $oficina = $stmt->fetch(PDO::FETCH_OBJ);
    
    ///Unidad Ejecutora
    $stmt = $dbh->prepare("SELECT * FROM oficinas WHERE id=$oficina->id");
    $stmt->execute();
    $oficina2 = $stmt->fetch(PDO::FETCH_OBJ);
    while($oficina2->ppt_unid_ejecutora == NULL || $oficina2->ppt_unid_ejecutora == 0){
        $stmt = $dbh->prepare("SELECT * FROM oficinas WHERE id=$oficina2->padre");
        $stmt->execute();
        $oficina2 = $stmt->fetch(PDO::FETCH_OBJ);
    }
    
   $stmt = $dbh->prepare("select p.*
        ,og.codigo cod_ges, og.objetivo obj_ges, og.gestion
        ,oe.codigo cod_esp, oe.objetivo obj_esp
        ,ac.codigo cod_act, ac.actividad act
        ,t.nombre
        from poas p 
        inner join pvogestiones og on p.id_obj_gestion = og.id
        inner join pvoespecificos oe on p.id_obj_esp = oe.id
        inner join pvactividades ac on p.id_actividad = ac.id
        inner join poatipocontrataciones t on p.id_tipocontratacion = t.id
        where p.id_documento = $id");
    $stmt->execute();
    $pvobjetivos = $stmt->fetch(PDO::FETCH_OBJ);
    
    if($pvobjetivos){
    ///verificar si esta aprobado
    if($pvobjetivos->auto_poa == 1){
        $stmt = $dbh->prepare("SELECT * FROM users WHERE id = $pvobjetivos->id_user_auto");
        $stmt->execute();
        $userppt = $stmt->fetch(PDO::FETCH_OBJ);
        $autoriza = $userppt->nombre;
        $fecha_aprobado = $pvobjetivos->fecha_aprobacion;
    }else{
        $autoriza = 'Certificacion no aprobada';
        $fecha_aprobado = "";
    }
    //$pdf->Ln(0);
    $pdf->SetFont('Helvetica', 'B', 14);
    $pdf->write(0,'CERTIFICACIÓN POA '.$pvobjetivos->gestion,'',0,'C');
    //$pdf->Cell(5, 6, 'D.N.I.:',0,0,'',$valign='M');
    //$pdf->SetFont('Helvetica', 'B', 9);
    $pdf->Ln();
    $pdf->SetFont('Helvetica', '', 13);
    $pdf->write(0,$rs->nur,'',0,'C');
    $pdf->SetFont('Helvetica', 'B', 14);
    $tabla1 = "
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <table style=\" width: 170px;\"  border=\"1px\">
            <tr>
                <td style = \" width: 40px;\" colspan = \"3\"><b>N°</b></td>
                <td style = \" width: 130px;\">$pvobjetivos->nro_poa</td>
            </tr>
        </table>";
    $pdf->writeHTML($tabla1, false, false, false,false,'C');
    $pdf->SetFont('Helvetica', '', 10);
    $color = "#CBCBCB";
    $altura = "20 px";
    $altura2 = "18 px";
    $actividad = utf8_encode($pvobjetivos->act);
    if($pvobjetivos->tipo_actividad == 'INVERSION'){
        $tipo_inv = 'X';
        $tipo_fun = '';
    }
    else{
        $tipo_inv = '';
        $tipo_fun = 'X';
    }
    $tipo_con = array();
    $tipo_con[$pvobjetivos->id_tipocontratacion]='<b>X</b>';
    ///verificar si es pasajes y viaticos
    $proceso_con="";
    if($pvobjetivos->memo == 0)
    {
        $proceso_con ="<tr>
                            <td colspan = \"3\">
                                <table border = \"1px\" style=\" width:100%;\">
                                    <tr bgcolor=\"$color\">
                                        <td style=\"width: 51%;\"  height =\"$altura\">PROCESO DE CONTRATACION / ADQUISICION:</td>
                                        <td style=\"width: 10%;\">Cantidad</td>
                                        <td style=\"width: 18%;\">Monto Total(Bs)</td>
                                        <td style=\"width: 20%;\">Plazo de ejecucion</td>
                                    </tr>
                                    <tr>
                                        <td>$pvobjetivos->proceso_con</td>
                                        <td>$pvobjetivos->cantidad</td>
                                        <td>$pvobjetivos->monto_total</td>
                                        <td>$pvobjetivos->plazo_ejecucion</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>";
    }
    $tabla1 = "
        <table style=\" width: 600px;\" border=\"0px\" frame=\"border\">
            <tr>
                <td style = \" width: 100%;\" colspan = \"3\" height =\"$altura\"><b>I. SOLICITUD</b></td>
            </tr>
            <tr>
                <td colspan = \"3\">
                    <table border = \"1px\" STYLE=\" WIDTH:580px;\">
                        <tr>
                            <td style=\"width: 150px;\" bgcolor=\"$color\">UNIDAD SOLICITANTE:</td>
                            <td style=\"width: 300px;\">$oficina->oficina</td>
                            <td style=\"width: 130px;\">Dependiencia: $oficina2->sigla</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style = \" width: 100%;\" colspan = \"3\">&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table border = \"1px\" style=\" width:580px;\">
                        <tr bgcolor=\"$color\">
                            <td style=\"width: 130px; text align:center\" height =\"$altura\">POA</td>
                            <td style=\"width: 60px;\" >CODIGO</td>
                        </tr>
                        <tr>
                            <td height =\"$altura2\">Objetivo de Gestion</td>
                            <td>$pvobjetivos->cod_ges</td>
                        </tr>
                        <tr>
                            <td height =\"$altura2\">Objetivo Especifico</td>
                            <td>$pvobjetivos->cod_esp</td>
                        </tr>
                    </table>
                </td>
                <td colspan =\"2\">
                    <table border = \"1px\" style=\" width:380px;\">
                        <tr bgcolor=\"$color\">
                            <td style=\"width: 60px;\" height =\"$altura\" >CODIGO</td>
                            <td style=\"width: 320px;\" >ACTIVIDAD - DESCRIPCION SEGUN POA</td>
                        </tr>
                        <tr>
                            <td >$pvobjetivos->cod_act</td>
                            <td >$actividad</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style = \" width: 100%;\" colspan = \"3\">&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table border = \"1px\" style=\" width:190px;\">
                        <tr bgcolor=\"$color\">
                            <td colspan=\"2\" height =\"$altura\">TIPO DE ACTIVIDAD</td>
                        </tr>
                        <tr>
                            <td style=\"width: 130px;\" height =\"$altura2\">INVERSION</td>
                            <td style=\"width: 60px;\"><b>$tipo_inv</b></td>
                        </tr>
                        <tr>
                            <td height =\"$altura2\">FUNCIONAMIENTO</td>
                            <td><b>$tipo_fun</b></td>
                        </tr>
                    </table>
                </td>
                <td rowspan=\"3\" colspan=\"2\">
                    <table border = \"1px\" style=\" width:380px;\">
                        <tr bgcolor=\"$color\">
                            <td colspan=\"2\" height =\"$altura\">TIPO DE CONTRATACION</td>
                        </tr>
                        <tr>
                            <td height =\"$altura2\" style=\"width: 330px;\">Consultoria Individual de linea</td>
                            <td style=\"width: 50px;\">$tipo_con[1]</td>
                        </tr>
                        <tr>
                            <td height =\"$altura2\">Consultoria Individual por producto</td>
                            <td>$tipo_con[2]</td>
                        </tr>
                        <tr>
                            <td height =\"$altura2\">Servicios de Empresa consultora(estudios)</td>
                            <td>$tipo_con[3]</td>
                        </tr>
                        <tr>
                            <td height =\"$altura2\">Adquisicion de Bienes</td>
                            <td>$tipo_con[4]</td>
                        </tr>
                        <tr>
                            <td height =\"$altura2\">Contratacion de obras</td>
                            <td>$tipo_con[5]</td>
                        </tr>
                        <tr>
                            <td height =\"$altura2\">Otros | $pvobjetivos->otro_tipocontratacion</td>
                            <td>$tipo_con[6]</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table border = \"1px\" style=\" width:190px;\">
                        <tr bgcolor=\"$color\">
                            <td height =\"$altura2\"  style=\"width: 40%;\">RECURSO</td>
                            <td style=\"width: 36%;\">ORG. FIN.</td>
                            <td style=\"width: 24%;\">%</td>
                        </tr>
                        <tr>
                            <td height =\"$altura2\">INTERNOS</td>
                            <td>$pvobjetivos->ri_financiador</td>
                            <td>$pvobjetivos->ri_porcentaje</td>
                        </tr>
                        <tr>
                            <td height =\"$altura2\">EXTERNOS</td>
                            <td>$pvobjetivos->re_financiador</td>
                            <td>$pvobjetivos->re_porcentaje</td>
                        </tr>
                    </table>
                </td>                
            </tr>
            <tr>
                <td style = \" width: 100%;\" colspan = \"3\">&nbsp;</td>
            </tr>
                $proceso_con
            <tr>
                <td style = \" width: 100%;\" colspan = \"3\">Responsable de Solicitud:</td>
            </tr>            
            <tr>
                <td colspan = \"3\">
                    <table border = \"1px\" style=\" width:99%;\">
                        <tr bgcolor=\"$color\">
                            <td style=\"width: 32%;\" height =\"$altura\">NOMBRE</td>
                            <td style=\"width: 35%;\">CARGO</td>
                            <td style=\"width: 20%;\">FIRMA Y SELLO</td>
                            <td style=\"width: 13%;\">FECHA</td>
                        </tr>
                        <tr>
                            <td  height =\"$altura2\"><br /><br />$user->nombre</td>
                            <td><br /><br />$user->cargo</td>
                            <td height =\"50\"></td>
                            <td><br /><br />$documento->fecha_creacion</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style = \" width: 100%;\" colspan = \"3\">&nbsp;</td>
            </tr>
        </table>";
    $pdf->Ln();
    //$pdf->Cell(169.5,111,'',1,0,'C');
    //$pdf->Ln(1);
    $pdf->writeHTML( $tabla1, false, false, false);
    
    $tabla2 = "
    <table style=\"width: 600px;\"  border=\"1px\" >
            <tr bgcolor = \"$color\">
                <td style = \" width: 100%;\" height =\"$altura\"><b>II. CERTIFICACI&Oacute;N (A ser llenado por la DGP)</b></td>
            </tr>
            <tr>
                <td style = \" width: 100%;\">
                    <center>
                    <table border = \"1px\" style=\" width:580px;\" >
                        <tr>
                            <td>En cumplimiento de los reglamentos Específicos del Sistema de Programación de Operaciones y del Sistema de 
                            Administración de Bienes y servicios del MDPyEP, la Dirección General de Planificación <b>Certifica</b> que la actividad solicitada
                            se encuentra inscrita en el POA $pvobjetivos->gestion del MDPyEP.
                            </td>
                        </tr>
                    </table>
                    </center>
                    
                </td>
            </tr>
            <tr>
                <td style = \" width: 100%;\" bgcolor = \"$color\" height =\"$altura\"><b>Responsable de la certificación</b></td>
            </tr>
            <tr>
                <td><p>
                    <table border = \"1px\" style=\" width:580px;\" >
                        <tr>
                            <td style=\"width: 90px;\" bgcolor = \"$color\">Responsable Verificación POA</td>
                            <td style=\"width: 200px;\"><span style=\"color:#DADADA; text-align:center; font-size: 60%;\"><br /><br /><br /><br /><span style=\"color:#000000; text-align:center; font-size: 120%;\">$autoriza</span><br />FIRMA</span></td>
                            <td style=\"width: 200px;\"><span style=\"color:#DADADA; text-align:center; font-size: 60%;\"><br /><br /><br /><br /><br />SELLO</span></td>
                            <td style=\"width: 90px;\" bgcolor = \"$color\">FECHA $fecha_aprobado</td>
                        </tr>
                        <tr>
                            <td bgcolor = \"$color\">Dirección General de Planificación</td>
                            <td><span style=\"color:#DADADA; text-align:center; font-size: 60%;\"><br /><br /><br /><br /><br />FIRMA</span></td>
                            <td><span style=\"color:#DADADA; text-align:center; font-size: 60%;\"><br /><br /><br /><br /><br />SELLO</span></td>
                            <td><span style=\"text-align:center;\"><br /></span></td>
                        </tr>
                    </table>                
                    </p>
                </td>
            </tr>
    </table>
    ";
    //$pdf->Ln(10);
    //$pdf->Cell(169.5,70,'',1,0,'C');
    //$pdf->Ln(5);
    $pdf->writeHTML($tabla2, false, false, false);
    
    $pdf->SetFont('Helvetica', '', 5);
    $pdf->writeHTML('cc. ' . strtoupper($rs->copias));
    $pdf->writeHTML('Adj. ' . strtoupper($rs->adjuntos));
    }
    else{         
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->writeHTML('ERROR AL GENERAR EL DOCUMENTO.', false, false, false);
    }
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
//Close and output PDF document
$pdf->Output($nombre . '.pdf', 'I');
//============================================================+
// END OF FILE                                                
//============================================================+
