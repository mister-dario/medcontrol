<?php

class grid_NUEVAS_FACTURAS_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function __construct($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("es");
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_NUEVAS_FACTURAS']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_NUEVAS_FACTURAS']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->f_nombrecomercial = $Busca_temp['f_nombrecomercial']; 
          $tmp_pos = strpos($this->f_nombrecomercial, "##@@");
          if ($tmp_pos !== false && !is_array($this->f_nombrecomercial))
          {
              $this->f_nombrecomercial = substr($this->f_nombrecomercial, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral_sc_free_total($res_limit=false)
   {
      global $nada, $nm_lang ;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['contr_total_geral'] = "OK";
   } 

   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT") {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT") {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "SC_FORMAT_REGION") {
           $this->nm_data->SetaData($dt_in, strtoupper($form_in));
           $prep_out  = (strpos(strtolower($form_in), "dd") !== false) ? "dd" : "";
           $prep_out .= (strpos(strtolower($form_in), "mm") !== false) ? "mm" : "";
           $prep_out .= (strpos(strtolower($form_in), "aa") !== false) ? "aaaa" : "";
           $prep_out .= (strpos(strtolower($form_in), "yy") !== false) ? "aaaa" : "";
           return $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", $prep_out));
       }
       else {
           nm_conv_form_data($dt_out, $form_in, $form_out);
           return $dt_out;
       }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $str_highlight_ini = "";
      $str_highlight_fim = "";
      if(substr($nm_campo, 0, 23) == '<div class="highlight">' && substr($nm_campo, -6) == '</div>')
      {
           $str_highlight_ini = substr($nm_campo, 0, 23);
           $str_highlight_fim = substr($nm_campo, -6);

           $trab_campo = substr($nm_campo, 23, -6);
           $tam_campo  = strlen($trab_campo);
      }      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont2 >= $tam_campo)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
   } 
function crear_comprobante($contenedor)
{
$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'on';
  
$contenedor->preserveWhiteSpace = false;
$contenedor->formatOutput = true;

$documento = $contenedor->createElement("factura");

$contenedor->appendChild($documento);

$factura_id = $contenedor->createAttribute("id");
$factura_id->value = 'comprobante';
$documento->appendChild($factura_id);

$factura_version = $contenedor->createAttribute("version");
$factura_version->value = '1.1.0';
$documento->appendChild($factura_version);

return $documento;

$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'off';
}
function crear_detalles($contenedor, $documento)
{
$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'on';
  
$detalles = $contenedor->createElement("detalles");
$documento->appendChild($detalles);

$check_sql = "SELECT CODIGO, DESCRIPCION, CANTIDAD, PRECIOUNITARIO, DESCUENTO, PRECIOTOTALSINIMPUESTO,"
   . "NOMBREDETALLEADICIONAL1, VALORADICIONAL1, NOMBREDETALLEADICIONAL2, VALORADICIONAL2, NOMBREDETALLEADICIONAL3,VALORADICIONAL3,"
   . "CODIGOIMPUESTO, CODIGOPORCENTAJEIMP, TARIFA, BASEIMPONIBLE, VALOR, CODIMPICE, CODPORCENICE, PORCENICE, BASEICE,  VALORICE"  
   . " FROM DETALLE_FACTURA"
   . " WHERE ESTAB = " .$this->f_estab . " AND PTOEMI = ".$this->f_ptoemi ." AND SECUENCIAL = ".$this->f_secuencial ." AND LOTE = '".$this->f_lote ."'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

foreach($this->rs  as $items) {
	
	
	$detalles_detalle = $contenedor->createElement("detalle");
	$detalles->appendChild($detalles_detalle);
	
	$detalles_codigoPrincipal = $contenedor->createElement("codigoPrincipal");
	$detalles_codigoPrincipal->nodeValue = $items[0];
	$detalles_detalle->appendChild($detalles_codigoPrincipal);
	
	$detalles_descripcion = $contenedor->createElement("descripcion");
	$detalles_descripcion->nodeValue = $items[1];
	$detalles_detalle->appendChild($detalles_descripcion);
	
	$detalles_cantidad = $contenedor->createElement("cantidad");
	$detalles_cantidad->nodeValue = $items[2];
	$detalles_detalle->appendChild($detalles_cantidad);
	
	$detalles_preciounitario = $contenedor->createElement("precioUnitario");
	$detalles_preciounitario->nodeValue = $items[3];
	$detalles_detalle->appendChild($detalles_preciounitario);
	
	$detalles_descuento = $contenedor->createElement("descuento");
	$detalles_descuento->nodeValue = bcdiv($items[4], 1, 2);
	$detalles_detalle->appendChild($detalles_descuento);

	$detalles_precioTotalSinImpuesto = $contenedor->createElement("precioTotalSinImpuesto");
	$detalles_precioTotalSinImpuesto->nodeValue = $items[5];
	$detalles_detalle->appendChild($detalles_precioTotalSinImpuesto);
	
	if(trim($items[6])!="" || trim($items[8])!="" || trim($items[10])!="") {
		$detalles_detallesAdicionales = $contenedor->createElement("detallesAdicionales");
		$detalles_detalle->appendChild($detalles_detallesAdicionales);
		
		if(trim($items[6])!="") {
			
			$detallesAdicionales_detAdicional = $contenedor->createElement("detAdicional");
			$detalles_detallesAdicionales->appendChild($detallesAdicionales_detAdicional);
		
			$nombre_detAdicional = $contenedor->createAttribute("nombre");
			$nombre_detAdicional->value = $items[6];
			$detallesAdicionales_detAdicional->appendChild($nombre_detAdicional);
			
			$valor_detAdicional = $contenedor->createAttribute("valor");
			$valor_detAdicional->value = $items[7];
			$detallesAdicionales_detAdicional->appendChild($valor_detAdicional);
		}
		if(trim($items[8])!="") {
			
			$detallesAdicionales_detAdicional = $contenedor->createElement("detAdicional");
			$detalles_detallesAdicionales->appendChild($detallesAdicionales_detAdicional);
		
			$nombre_detAdicional = $contenedor->createAttribute("nombre");
			$nombre_detAdicional->value = $items[8];
			$detallesAdicionales_detAdicional->appendChild($nombre_detAdicional);
			
			$valor_detAdicional = $contenedor->createAttribute("valor");
			$valor_detAdicional->value = $items[9];
			$detallesAdicionales_detAdicional->appendChild($valor_detAdicional);
		}
		if(trim($items[10])!="") {
			
			$detallesAdicionales_detAdicional = $contenedor->createElement("detAdicional");
			$detalles_detallesAdicionales->appendChild($detallesAdicionales_detAdicional);
		
			$nombre_detAdicional = $contenedor->createAttribute("nombre");
			$nombre_detAdicional->value = $items[10];
			$detallesAdicionales_detAdicional->appendChild($nombre_detAdicional);
			
			$valor_detAdicional = $contenedor->createAttribute("valor");
			$valor_detAdicional->value = $items[11];
			$detallesAdicionales_detAdicional->appendChild($valor_detAdicional);
		}
	}
	
	
	$detalle_impuestos = $contenedor->createElement("impuestos");
	$detalles_detalle->appendChild($detalle_impuestos);
	
	if($items[17]>0) {
		$impuestos_impuesto = $contenedor->createElement("impuesto");
		$detalle_impuestos->appendChild($impuestos_impuesto);
		
		$impuesto_codigo = $contenedor->createElement("codigo");
		$impuesto_codigo->nodeValue = $items[17];
		$impuestos_impuesto->appendChild($impuesto_codigo);	
		
		$impuesto_codigoPorcentaje = $contenedor->createElement("codigoPorcentaje");
		$impuesto_codigoPorcentaje->nodeValue = $items[18];
		$impuestos_impuesto->appendChild($impuesto_codigoPorcentaje);	
	
		$impuesto_tarifa = $contenedor->createElement("tarifa");
		$impuesto_tarifa->nodeValue = $items[19];
		$impuestos_impuesto->appendChild($impuesto_tarifa);	
		
		$impuesto_baseImponible = $contenedor->createElement("baseImponible");
		$impuesto_baseImponible->nodeValue = $items[20];
		$impuestos_impuesto->appendChild($impuesto_baseImponible);	
		
		$impuesto_valor = $contenedor->createElement("valor");
		$impuesto_valor->nodeValue = $items[21];
		$impuestos_impuesto->appendChild($impuesto_valor);
		
	}
	
	$impuestos_impuesto = $contenedor->createElement("impuesto");
	$detalle_impuestos->appendChild($impuestos_impuesto);
	
	$impuesto_codigo = $contenedor->createElement("codigo");
	$impuesto_codigo->nodeValue = $items[12];
	$impuestos_impuesto->appendChild($impuesto_codigo);	
	
	$impuesto_codigoPorcentaje = $contenedor->createElement("codigoPorcentaje");
	$impuesto_codigoPorcentaje->nodeValue = $items[13];
	$impuestos_impuesto->appendChild($impuesto_codigoPorcentaje);	

	$impuesto_tarifa = $contenedor->createElement("tarifa");
	$impuesto_tarifa->nodeValue = $items[14];
	$impuestos_impuesto->appendChild($impuesto_tarifa);	
	
	$impuesto_baseImponible = $contenedor->createElement("baseImponible");
	$impuesto_baseImponible->nodeValue = $items[15];
	$impuestos_impuesto->appendChild($impuesto_baseImponible);	
	
	$impuesto_valor = $contenedor->createElement("valor");
	$impuesto_valor->nodeValue = $items[16];
	$impuestos_impuesto->appendChild($impuesto_valor);	
	


}
$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'off';
}
function crear_infoAdicional($contenedor, $documento)
{
$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'on';
  
if(trim($this->f_campoadicional1 )!="" || trim($this->f_campoadicional2 )!="" || trim($this->f_campoadicional3 )!="" || trim($this->f_campoadicional4 )!="" || trim($this->f_campoadicional5 )!="" || trim($this->f_campoadicional6 )!="" || trim($this->f_campoadicional7 )!="" || trim($this->f_campoadicional8 )!="" || trim($this->f_campoadicional9 )!="" || trim($this->f_campoadicional10 )!="" || trim($this->f_campoadicional11 )!="" || trim($this->f_campoadicional12 )!="" || trim($this->f_campoadicional13 )!="" || trim($this->f_campoadicional14 )!="" || trim($this->f_campoadicional15 )!="") {

	$infoAdicional = $contenedor->createElement("infoAdicional");
	$documento->appendChild($infoAdicional);
	
	if(trim($this->f_campoadicional1 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $this->f_valoradicional1 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $this->f_campoadicional1 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	if(trim($this->f_campoadicional2 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $this->f_valoradicional2 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $this->f_campoadicional2 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}

	if(trim($this->f_campoadicional3 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $this->f_valoradicional3 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $this->f_campoadicional3 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}

	if(trim($this->f_campoadicional4 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $this->f_valoradicional4 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $this->f_campoadicional4 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	if(trim($this->f_campoadicional5 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $this->f_valoradicional5 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $this->f_campoadicional5 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	if(trim($this->f_campoadicional6 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $this->f_valoradicional6 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $this->f_campoadicional6 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	if(trim($this->f_campoadicional7 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $this->f_valoradicional7 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $this->f_campoadicional7 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	if(trim($this->f_campoadicional8 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $this->f_valoradicional8 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $this->f_campoadicional8 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	if(trim($this->f_campoadicional9 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $this->f_valoradicional9 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $this->f_campoadicional9 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	if(trim($this->f_campoadicional10 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $this->f_valoradicional10 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $this->f_campoadicional10 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	if(trim($this->f_campoadicional11 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $this->f_valoradicional11 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $this->f_campoadicional11 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	if(trim($this->f_campoadicional12 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $this->f_valoradicional12 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $this->f_campoadicional12 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	if(trim($this->f_campoadicional13 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $this->f_valoradicional13 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $this->f_campoadicional13 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	if(trim($this->f_campoadicional14 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $this->f_valoradicional14 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $this->f_campoadicional14 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	if(trim($this->f_campoadicional15 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $this->f_valoradicional15 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $this->f_campoadicional15 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	
}



$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'off';
}
function crear_infoFactura($contenedor, $documento)
{
$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'on';
  
$infofact = $contenedor->createElement("infoFactura");
$documento->appendChild($infofact);

$infofact_fechaEmision = $contenedor->createElement("fechaEmision");
$infofact_fechaEmision->nodeValue = $this->f_fechaemision ;
$infofact->appendChild($infofact_fechaEmision);

$infofact_dirEstablecimiento = $contenedor->createElement("dirEstablecimiento");
$infofact_dirEstablecimiento->nodeValue = $this->f_direstablecimiento ;
$infofact->appendChild($infofact_dirEstablecimiento);

if(trim($this->f_numcontribuyenteespecial )!='' && $this->f_numcontribuyenteespecial !=0) {
	$infofact_contribuyenteEspecial = $contenedor->createElement("contribuyenteEspecial");
	$infofact_contribuyenteEspecial->nodeValue = $this->f_numcontribuyenteespecial ;
	$infofact->appendChild($infofact_contribuyenteEspecial);
}

$infofact_obligadoContabilidad = $contenedor->createElement("obligadoContabilidad");
$infofact_obligadoContabilidad->nodeValue = $this->f_obligadocontabilidad ;
$infofact->appendChild($infofact_obligadoContabilidad);
	
$infofact_tipoidComprador = $contenedor->createElement("tipoIdentificacionComprador");
$infofact_tipoidComprador->nodeValue = $this->f_tipoidentcomprador ;
$infofact->appendChild($infofact_tipoidComprador);
	
if(trim($this->f_guiaremision )!="") {
	$infofact_guiaRemision = $contenedor->createElement("guiaRemision");
	$infofact_guiaRemision->nodeValue = $this->f_guiaremision ;
	$infofact->appendChild($infofact_guiaRemision);	
}

$infofact_razonSocialComprador = $contenedor->createElement("razonSocialComprador");
$infofact_razonSocialComprador->nodeValue = $this->f_razonsocialcomprador ;
$infofact->appendChild($infofact_razonSocialComprador);

$infofact_idComprador = $contenedor->createElement("identificacionComprador");
$infofact_idComprador->nodeValue = $this->f_idcomprador ;
$infofact->appendChild($infofact_idComprador);

$infofact_totalSinImpuestos = $contenedor->createElement("totalSinImpuestos");
$infofact_totalSinImpuestos->nodeValue = $this->f_totalsinimpuestos ;
$infofact->appendChild($infofact_totalSinImpuestos);

$infofact_totalDescuento = $contenedor->createElement("totalDescuento");
$infofact_totalDescuento->nodeValue = bcdiv($this->f_totaldescuento , 1, 2);;
$infofact->appendChild($infofact_totalDescuento);


$infofact_totalConImpuestos = $contenedor->createElement("totalConImpuestos");
$infofact->appendChild($infofact_totalConImpuestos);

$check_sql = "SELECT CODIMPICE, CODPORCENICE, PORCENICE, SUM(BASEICE),  SUM(VALORICE)
  FROM DETALLE_FACTURA
   WHERE CODIMPICE > 0 AND ESTAB =".$this->f_estab ." AND PTOEMI=".$this->f_ptoemi ." AND SECUENCIAL=".$this->f_secuencial ." AND LOTE='".$this->f_lote ."'
GROUP BY  CODIMPICE, CODPORCENICE, PORCENICE";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

foreach($this->rs  as $impice) {
	$totalConImpuestos_totalImpuestoIce = $contenedor->createElement("totalImpuesto");
	$infofact_totalConImpuestos->appendChild($totalConImpuestos_totalImpuestoIce);
	
	$codigoImpuesto = $contenedor->createElement("codigo");
	$codigoImpuesto->nodeValue = 3;
	$totalConImpuestos_totalImpuestoIce->appendChild($codigoImpuesto);
	
	$codigoPorcentaje = $contenedor->createElement("codigoPorcentaje");
	$codigoPorcentaje->nodeValue = $impice[1];
	$totalConImpuestos_totalImpuestoIce->appendChild($codigoPorcentaje);
	
	$baseImponible = $contenedor->createElement("baseImponible");
	$baseImponible->nodeValue = $impice[3];
	$totalConImpuestos_totalImpuestoIce->appendChild($baseImponible);
	
	$valor = $contenedor->createElement("valor");
	$valor->nodeValue = $impice[4];
	$totalConImpuestos_totalImpuestoIce->appendChild($valor);	
}

if($this->f_base_0 >0) {
	$totalConImpuestos_totalImpuestoIva0 = $contenedor->createElement("totalImpuesto");
	$infofact_totalConImpuestos->appendChild($totalConImpuestos_totalImpuestoIva0);
	
	$codigoImpuesto = $contenedor->createElement("codigo");
	$codigoImpuesto->nodeValue = 2;
	$totalConImpuestos_totalImpuestoIva0->appendChild($codigoImpuesto);
	
	$codigoPorcentaje = $contenedor->createElement("codigoPorcentaje");
	$codigoPorcentaje->nodeValue = 0;
	$totalConImpuestos_totalImpuestoIva0->appendChild($codigoPorcentaje);
	
	$baseImponible = $contenedor->createElement("baseImponible");
	$baseImponible->nodeValue = $this->f_base_0 ;
	$totalConImpuestos_totalImpuestoIva0->appendChild($baseImponible);
	
	$valor = $contenedor->createElement("valor");
	$valor->nodeValue = 0;
	$totalConImpuestos_totalImpuestoIva0->appendChild($valor);
}

if($this->f_base_12 >0) {
	$totalConImpuestos_totalImpuestoIva12 = $contenedor->createElement("totalImpuesto");
	$infofact_totalConImpuestos->appendChild($totalConImpuestos_totalImpuestoIva12);
	
	$codigoImpuesto = $contenedor->createElement("codigo");
	$codigoImpuesto->nodeValue = 2;
	$totalConImpuestos_totalImpuestoIva12->appendChild($codigoImpuesto);
	
	$codigoPorcentaje = $contenedor->createElement("codigoPorcentaje");
	$codigoPorcentaje->nodeValue = $this->f_codporcentajeimpuesto ;
	$totalConImpuestos_totalImpuestoIva12->appendChild($codigoPorcentaje);
	
	$baseImponible = $contenedor->createElement("baseImponible");
	$baseImponible->nodeValue = $this->f_base_12 ;
	$totalConImpuestos_totalImpuestoIva12->appendChild($baseImponible);
	
	$valor = $contenedor->createElement("valor");
	$valor->nodeValue = $this->f_valor1 ;
	$totalConImpuestos_totalImpuestoIva12->appendChild($valor);
}	

$infofact_propina = $contenedor->createElement("propina");
$infofact_propina->nodeValue = $this->f_propina ;
$infofact->appendChild($infofact_propina);

$infofact_importeTotal = $contenedor->createElement("importeTotal");
$infofact_importeTotal->nodeValue = $this->f_importetotal ;
$infofact->appendChild($infofact_importeTotal);

$infofact_moneda = $contenedor->createElement("moneda");
$infofact_moneda->nodeValue = $this->f_moneda ;
$infofact->appendChild($infofact_moneda);

$infofact_pagos = $contenedor->createElement("pagos");
$infofact->appendChild($infofact_pagos);


$check_sql = "SELECT NUMPAGOS, FORMAPAGO1, VALORTOT1, PLAZO1, UNIDADTIEMPO1, FORMAPAGO2, VALORTOT2, PLAZO2, UNIDADTIEMPO2"
   . " FROM FACTURA"
    . " WHERE ESTAB = " .$this->f_estab . " AND PTOEMI = ".$this->f_ptoemi ." AND SECUENCIAL = ".$this->f_secuencial ." AND LOTE = '".$this->f_lote ."'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

$numpagos = $this->rs[0][0];
	
$pagos_pago1 = $contenedor->createElement("pago");
$infofact_pagos->appendChild($pagos_pago1);
	
$pago1_forma = $contenedor->createElement("formaPago");
$pago1_forma->nodeValue = str_pad($this->rs[0][1], 2, "0", STR_PAD_LEFT);
$pagos_pago1->appendChild($pago1_forma);

$pago1_total = $contenedor->createElement("total");
$pago1_total->nodeValue = $this->rs[0][2];
$pagos_pago1->appendChild($pago1_total);

$pago1_plazo = $contenedor->createElement("plazo");
$pago1_plazo->nodeValue = $this->rs[0][3];
$pagos_pago1->appendChild($pago1_plazo);

$pago1_unitiempo = $contenedor->createElement("unidadTiempo");
$pago1_unitiempo->nodeValue = $this->rs[0][4];
$pagos_pago1->appendChild($pago1_unitiempo);
	
if($numpagos==2) {

	$pagos_pago2 = $contenedor->createElement("pago");
	$infofact_pagos->appendChild($pagos_pago2);
		
	$pago2_forma = $contenedor->createElement("formaPago");
	$pago2_forma->nodeValue = str_pad($this->rs[0][5], 2, "0", STR_PAD_LEFT);
	$pagos_pago2->appendChild($pago2_forma);
	
	$pago2_total = $contenedor->createElement("total");
	$pago2_total->nodeValue = $this->rs[0][6];
	$pagos_pago2->appendChild($pago2_total);
	
	$pago2_plazo = $contenedor->createElement("plazo");
	$pago2_plazo->nodeValue = $this->rs[0][7];
	$pagos_pago2->appendChild($pago2_plazo);
	
	$pago2_unitiempo = $contenedor->createElement("unidadTiempo");
	$pago2_unitiempo->nodeValue = $this->rs[0][8];
	$pagos_pago2->appendChild($pago2_unitiempo);
	
	
}
$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'off';
}
function crear_infoTributaria($contenedor, $documento, $ambiente, $tipoEmision, $tipoComprobante, $factura)
{
$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'on';
  

$infotrib = $contenedor->createElement("infoTributaria");
$documento->appendChild($infotrib);

$infotrib_ambiente = $contenedor->createElement("ambiente");
$infotrib_ambiente->nodeValue = $ambiente;
$infotrib->appendChild($infotrib_ambiente);

$infotrib_tipoEmision = $contenedor->createElement("tipoEmision");
$infotrib_tipoEmision->nodeValue = $tipoEmision;
$infotrib->appendChild($infotrib_tipoEmision);

$infotrib_razonSocial = $contenedor->createElement("razonSocial");
$infotrib_razonSocial->nodeValue = $this->f_razonsocial ;
$infotrib->appendChild($infotrib_razonSocial);
	
$infotrib_nombreComercial = $contenedor->createElement("nombreComercial");
$infotrib_nombreComercial->nodeValue = $this->f_nombrecomercial ;
$infotrib->appendChild($infotrib_nombreComercial);
	
$infotrib_ruc = $contenedor->createElement("ruc");
$infotrib_ruc->nodeValue = $this->f_ruc ;
$infotrib->appendChild($infotrib_ruc);	
	
$fecha_emision=$this->f_fechaemision ;

list($dia, $mes, $ano) = explode("/", $fecha_emision);

list($establecimiento, $ptoEmision, $secuencial) = explode("-", $factura);

$serie=$establecimiento."".$ptoEmision;

$codigo_numerico=$this->generar_codigo_numerico($fecha_emision); 
	
$clave_acceso_sdv=$dia."".$mes."".$ano."".$tipoComprobante."".$this->f_ruc ."".$ambiente."".$serie."".$secuencial."".$codigo_numerico."".$tipoEmision;

$digito_verificador=$this->modulo11($clave_acceso_sdv);

$clave_acceso=$clave_acceso_sdv."".$digito_verificador;

$infotrib_claveAcceso = $contenedor->createElement("claveAcceso");
$infotrib_claveAcceso->nodeValue = $clave_acceso;
$infotrib->appendChild($infotrib_claveAcceso);

$update_table  = 'FACTURA_FLAGS';      
$update_where  = " ESTAB = ".$this->f_estab ." AND PTOEMI = ".$this->f_ptoemi ." AND SECUENCIAL = ".$this->f_secuencial ." AND LOTE = '".$this->f_lote ."'"; 
$update_fields = array(   
     "CLAVE_ACCESO = '".$clave_acceso."'"
 );
$update_sql = 'UPDATE ' . $update_table
    . ' SET '   . implode(', ', $update_fields)
    . ' WHERE ' . $update_where;

     $nm_select = $update_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

$infotrib_codDoc = $contenedor->createElement("codDoc");
$infotrib_codDoc->nodeValue = $tipoComprobante;
$infotrib->appendChild($infotrib_codDoc);

$infotrib_estab = $contenedor->createElement("estab");
$infotrib_estab->nodeValue = $establecimiento;
$infotrib->appendChild($infotrib_estab);

$infotrib_ptoEmi = $contenedor->createElement("ptoEmi");
$infotrib_ptoEmi->nodeValue = $ptoEmision;
$infotrib->appendChild($infotrib_ptoEmi);

$infotrib_secuencial = $contenedor->createElement("secuencial");
$infotrib_secuencial->nodeValue = $secuencial;
$infotrib->appendChild($infotrib_secuencial);

$infotrib_dirMatriz = $contenedor->createElement("dirMatriz");
$infotrib_dirMatriz->nodeValue = $this->f_dirmatriz ;
$infotrib->appendChild($infotrib_dirMatriz);
$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'off';
}
function generar_codigo_numerico($fecha_emision)
{
$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'on';
  
$d1dia = substr($fecha_emision,0,1);
$d2dia = substr($fecha_emision,1,1);
$d1mes = substr($fecha_emision,3,1);
$d2mes = substr($fecha_emision,4,1);
$d1ano = substr($fecha_emision,6,1);
$d2ano = substr($fecha_emision,7,1);
$d3ano = substr($fecha_emision,8,1);
$d4ano = substr($fecha_emision,9,1);
	
$d1cn = 0;
$d2cn = 0;
$d3cn = 0;
$d4cn = 0;
$d5cn = 0;
$d6cn = 0;
$d7cn = 0;
$d8cn = 0;

if($d1dia!=9)
	$d1cn=$d1dia+1;
if($d2dia!=9)
	$d2cn=$d2dia+1;
if($d1mes!=9)
	$d3cn=$d1mes+1;
if($d2mes!=9)
	$d4cn=$d2mes+1;
if($d1ano!=9)
	$d5cn=$d1ano+1;
if($d2ano!=9)
	$d6cn=$d2ano+1;
if($d3ano!=9)
	$d7cn=$d3ano+1;
if($d4ano!=9)
	$d8cn=$d4ano+1;

return $d1cn."".$d2cn."".$d3cn."".$d4cn."".$d5cn."".$d6cn."".$d7cn."".$d8cn;

$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'off';
}
function modulo11($cadena)
{
$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'on';
  
$entrada=str_split(strrev($cadena));

$dividido=array_chunk($entrada,6);

$total=0;
foreach($dividido as $parte) {
	$subtotal=0;
	foreach($parte as $clave=>$valor) {
		$factor=$clave+2;
		$subtotal=$subtotal+($valor*$factor);
	}
	$total=$total+$subtotal;	
}

$modulo=$total%11;

$verificador=11-$modulo;

if($verificador==11)
	$verificador=0;
if($verificador==10)
	$verificador=1;

return $verificador;


$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'off';
}
}

?>
