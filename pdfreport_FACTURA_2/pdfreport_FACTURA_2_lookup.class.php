<?php
class pdfreport_FACTURA_2_lookup
{
//  
   function lookup_f_formapago1(&$f_formapago1) 
   {
      $conteudo = "" ; 
      if ($f_formapago1 == "1")
      { 
          $conteudo = "SIN UTILIZACION DEL SISTEMA FINANCIERO";
      } 
      if ($f_formapago1 == "15")
      { 
          $conteudo = "COMPENSACIÓN DE DEUDAS";
      } 
      if ($f_formapago1 == "16")
      { 
          $conteudo = "TARJETA DE DÉBITO";
      } 
      if ($f_formapago1 == "17")
      { 
          $conteudo = "DINERO ELECTRÓNICO";
      } 
      if ($f_formapago1 == "18")
      { 
          $conteudo = "TARJETA PREPAGO";
      } 
      if ($f_formapago1 == "19")
      { 
          $conteudo = "TARJETA DE CRÉDITO";
      } 
      if ($f_formapago1 == "20")
      { 
          $conteudo = "OTROS CON UTILIZACION DEL SISTEMA FINANCIERO";
      } 
      if ($f_formapago1 == "21")
      { 
          $conteudo = "ENDOSO DE TÍTULOS";
      } 
      if (!empty($conteudo)) 
      { 
          $f_formapago1 = $conteudo; 
      } 
   }  
//  
   function lookup_f_ambiente(&$f_ambiente) 
   {
      $conteudo = "" ; 
      if ($f_ambiente == "1")
      { 
          $conteudo = "PRUEBAS";
      } 
      if ($f_ambiente == "2")
      { 
          $conteudo = "PRODUCCIÓN";
      } 
      if (!empty($conteudo)) 
      { 
          $f_ambiente = $conteudo; 
      } 
   }  
//  
   function lookup_detalle(&$conteudo , $f_estab, $f_ptoemi, $f_secuencial, $f_lote, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      if (trim($f_estab) === "" || trim($f_ptoemi) === "" || trim($f_secuencial) === "")
      { 
          $conteudo = "";
          return ; 
      } 
      $conteudo = "";
      $nm_comando = "SELECT 
    
    concat('>  ',DESCRIPCION) as ITEM,
    CANTIDAD,
    PRECIOUNITARIO,
    DESCUENTO,
    CANTIDAD*PRECIOUNITARIO AS PRECIOTOTALSINIMPUESTO   
FROM 
    DETALLE_FACTURA
WHERE
     ESTAB=$f_estab AND PTOEMI=$f_ptoemi AND SECUENCIAL=$f_secuencial AND LOTE='" . substr($this->Db->qstr($f_lote), 1 , -1) . "'" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $a = 0; 
          $x = 0; 
          $nm_tmp_campos_select = explode(",", "concat('>  ',DESCRIPCION) as ITEM,
    CANTIDAD,
    PRECIOUNITARIO,
    DESCUENTO,
    CANTIDAD*PRECIOUNITARIO AS PRECIOTOTALSINIMPUESTO"); 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 $rx->fields[1] = str_replace(',', '.', $rx->fields[1]); 
                 $rx->fields[2] = str_replace(',', '.', $rx->fields[2]); 
                 $rx->fields[3] = str_replace(',', '.', $rx->fields[3]); 
                 $rx->fields[4] = str_replace(',', '.', $rx->fields[4]); 
                 if ($y == 1)
                 { 
                     $conteudo .= "<br>";
                     $y = 0; 
                     $x = 0; 
                 } 
                 $y++; 
                 if ($x != 0)
                 { 
                     $conteudo .= "";
                 } 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $nm_array_retorno_lookup[$a] [trim($nm_tmp_campos_select[$x])] = trim($rx->fields[$x]);
                        $nm_array_retorno_lookup[$a] [$x]= trim($rx->fields[$x]);
                        if ($x != 0)
                        { 
                            $conteudo .= "";
                        } 
                        $conteudo .= trim($rx->fields[$x]);
                 }
                 $a++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
   } 
}
?>
