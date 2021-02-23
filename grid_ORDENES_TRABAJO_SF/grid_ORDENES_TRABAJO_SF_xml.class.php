<?php

class grid_ORDENES_TRABAJO_SF_xml
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;

   var $Arquivo;
   var $Arquivo_view;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("es");
   }

   //---- 
   function monta_xml()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['embutida'])
      {
          if ($this->Ini->sc_export_ajax)
          {
              $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Xml_f);
              $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
              $Temp = ob_get_clean();
              if ($Temp !== false && trim($Temp) != "")
              {
                  $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
              }
              $oJson = new Services_JSON();
              echo $oJson->encode($this->Arr_result);
              exit;
          }
          else
          {
              $this->monta_html();
          }
      }
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['opcao'] = "";
      }
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      if (isset($GLOBALS['nmgp_parms']) && !empty($GLOBALS['nmgp_parms'])) 
      { 
          $GLOBALS['nmgp_parms'] = str_replace("@aspass@", "'", $GLOBALS['nmgp_parms']);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $GLOBALS["nmgp_parms"]);
          $todo  = explode("?@?", $todox);
          foreach ($todo as $param)
          {
               $cadapar = explode("?#?", $param);
               if (1 < sizeof($cadapar))
               {
                   if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                   {
                       $cadapar[0] = substr($cadapar[0], 11);
                       $cadapar[1] = $_SESSION[$cadapar[1]];
                   }
                   if (isset($GLOBALS['sc_conv_var'][$cadapar[0]]))
                   {
                       $cadapar[0] = $GLOBALS['sc_conv_var'][$cadapar[0]];
                   }
                   elseif (isset($GLOBALS['sc_conv_var'][strtolower($cadapar[0])]))
                   {
                       $cadapar[0] = $GLOBALS['sc_conv_var'][strtolower($cadapar[0])];
                   }
                   nm_limpa_str_grid_ORDENES_TRABAJO_SF($cadapar[1]);
                   nm_protect_num_grid_ORDENES_TRABAJO_SF($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_ORDENES_TRABAJO_SF']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($ordenes)) 
      {
          $_SESSION['ordenes'] = $ordenes;
          nm_limpa_str_grid_ORDENES_TRABAJO_SF($_SESSION["ordenes"]);
      }
      if (isset($cods_pacientes)) 
      {
          $_SESSION['cods_pacientes'] = $cods_pacientes;
          nm_limpa_str_grid_ORDENES_TRABAJO_SF($_SESSION["cods_pacientes"]);
      }
      if (isset($total_sinimp)) 
      {
          $_SESSION['total_sinimp'] = $total_sinimp;
          nm_limpa_str_grid_ORDENES_TRABAJO_SF($_SESSION["total_sinimp"]);
      }
      if (isset($total_desc)) 
      {
          $_SESSION['total_desc'] = $total_desc;
          nm_limpa_str_grid_ORDENES_TRABAJO_SF($_SESSION["total_desc"]);
      }
      if (isset($total_baseiva)) 
      {
          $_SESSION['total_baseiva'] = $total_baseiva;
          nm_limpa_str_grid_ORDENES_TRABAJO_SF($_SESSION["total_baseiva"]);
      }
      if (isset($total_basecero)) 
      {
          $_SESSION['total_basecero'] = $total_basecero;
          nm_limpa_str_grid_ORDENES_TRABAJO_SF($_SESSION["total_basecero"]);
      }
      if (isset($totvalefec)) 
      {
          $_SESSION['totvalefec'] = $totvalefec;
          nm_limpa_str_grid_ORDENES_TRABAJO_SF($_SESSION["totvalefec"]);
      }
      if (isset($totvalcheq)) 
      {
          $_SESSION['totvalcheq'] = $totvalcheq;
          nm_limpa_str_grid_ORDENES_TRABAJO_SF($_SESSION["totvalcheq"]);
      }
      if (isset($totvaltransf)) 
      {
          $_SESSION['totvaltransf'] = $totvaltransf;
          nm_limpa_str_grid_ORDENES_TRABAJO_SF($_SESSION["totvaltransf"]);
      }
      if (isset($totvaltarj)) 
      {
          $_SESSION['totvaltarj'] = $totvaltarj;
          nm_limpa_str_grid_ORDENES_TRABAJO_SF($_SESSION["totvaltarj"]);
      }
      if (isset($porceniva)) 
      {
          $_SESSION['porceniva'] = $porceniva;
          nm_limpa_str_grid_ORDENES_TRABAJO_SF($_SESSION["porceniva"]);
      }
      if (isset($codporceniva)) 
      {
          $_SESSION['codporceniva'] = $codporceniva;
          nm_limpa_str_grid_ORDENES_TRABAJO_SF($_SESSION["codporceniva"]);
      }
      if (isset($v_ambiente_cod)) 
      {
          $_SESSION['v_ambiente_cod'] = $v_ambiente_cod;
          nm_limpa_str_grid_ORDENES_TRABAJO_SF($_SESSION["v_ambiente_cod"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->New_Format  = true;
      $this->Xml_tag_label = false;
      $this->Tem_xml_res = false;
      $this->Xml_password = "";
      if (isset($_REQUEST['nm_xml_tag']) && !empty($_REQUEST['nm_xml_tag']))
      {
          $this->New_Format = ($_REQUEST['nm_xml_tag'] == "tag") ? true : false;
      }
      if (isset($_REQUEST['nm_xml_label']) && !empty($_REQUEST['nm_xml_label']))
      {
          $this->Xml_tag_label = ($_REQUEST['nm_xml_label'] == "S") ? true : false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['xml_label']))
      {
          $this->Xml_tag_label = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['xml_label'];
          $this->New_Format    = true;
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nm_data    = new nm_data("es");
      $this->Arquivo      = "sc_xml";
      $this->Arquivo     .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arq_zip      = $this->Arquivo . "_grid_ORDENES_TRABAJO_SF.zip";
      $this->Arquivo     .= "_grid_ORDENES_TRABAJO_SF";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "grid_ORDENES_TRABAJO_SF.xml";
      $this->Tit_zip      = "grid_ORDENES_TRABAJO_SF.zip";
      $this->Grava_view   = false;
      if (strtolower($_SESSION['scriptcase']['charset']) != strtolower($_SESSION['scriptcase']['charset_html']))
      {
          $this->Grava_view = true;
      }
   }

   //---- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }

   //----- 
   function grava_arquivo()
   {
      global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_ORDENES_TRABAJO_SF']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_ORDENES_TRABAJO_SF']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_ORDENES_TRABAJO_SF']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->ruc = $Busca_temp['ruc']; 
          $tmp_pos = strpos($this->ruc, "##@@");
          if ($tmp_pos !== false && !is_array($this->ruc))
          {
              $this->ruc = substr($this->ruc, 0, $tmp_pos);
          }
          $this->idcomprador = $Busca_temp['idcomprador']; 
          $tmp_pos = strpos($this->idcomprador, "##@@");
          if ($tmp_pos !== false && !is_array($this->idcomprador))
          {
              $this->idcomprador = substr($this->idcomprador, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['xml_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['xml_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['xml_name'] .= ".xml";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['xml_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['xml_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['xml_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['xml_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['embutida'])
      { 
          $xml_charset = $_SESSION['scriptcase']['charset'];
          $this->Xml_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          $xml_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
          fwrite($xml_f, "<?xml version=\"1.0\" encoding=\"$xml_charset\" ?>\r\n");
          fwrite($xml_f, "<root>\r\n");
          if ($this->Grava_view)
          {
              $xml_charset_v = $_SESSION['scriptcase']['charset_html'];
              $xml_v         = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view, "w");
              fwrite($xml_v, "<?xml version=\"1.0\" encoding=\"$xml_charset_v\" ?>\r\n");
              fwrite($xml_v, "<root>\r\n");
          }
      }
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT      RAZONSOCIAL,     NOMBRECOMERCIAL,     RUC,     CODDOC,     concat(ESTAB,'-',PTOEMI,'-',SECUENCIAL) as FACTURA,     ESTAB,     PTOEMI,     SECUENCIAL,     LOTE,    DIRMATRIZ,     FECHAEMISION,     DIRESTABLECIMIENTO,     NUMCONTRIBUYENTEESPECIAL,     OBLIGADOCONTABILIDAD,     TIPOIDENTCOMPRADOR,     GUIAREMISION,     RAZONSOCIALCOMPRADOR,     IDCOMPRADOR,     TOTALSINIMPUESTOS,     TOTALDESCUENTO,     BASE_12,     BASE_0,     CODIMPUESTO,     CODPORCENTAJEIMPUESTO,     BASEIMPONIBLE1,     TARIFA1,     VALOR1,     PROPINA,     IMPORTETOTAL,     MONEDA,     FORMATO,     CAMPOADICIONAL1,     VALORADICIONAL1,     CAMPOADICIONAL2,     VALORADICIONAL2,     CAMPOADICIONAL3,     VALORADICIONAL3,     CAMPOADICIONAL4,     VALORADICIONAL4,     CAMPOADICIONAL5,     VALORADICIONAL5,     CAMPOADICIONAL6,     VALORADICIONAL6,     CAMPOADICIONAL7,     VALORADICIONAL7,     CAMPOADICIONAL8,     VALORADICIONAL8,     CAMPOADICIONAL9,     VALORADICIONAL9,     CAMPOADICIONAL10,     VALORADICIONAL10,     CAMPOADICIONAL11,     VALORADICIONAL11,     facturado,     ordvalefec, ordvalcheq, ordvaltarjcred, ordvaltransf FROM      orden_trabajo  WHERE facturado=0 AND CONCAT(SUBSTR(ESTAB,3,1),'-',SUBSTR(SECUENCIAL,2,8)) NOT IN (SELECT cxcnumdoc FROM cuentasxcobrar WHERE cxctipodoc='O' AND cxcvalpen>0 AND cxcanulado=0) AND IMPORTETOTAL>0 ) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT FACTURA, IDCOMPRADOR, RAZONSOCIALCOMPRADOR, VALORADICIONAL5, FECHAEMISION, IMPORTETOTAL, RUC, ESTAB, PTOEMI, SECUENCIAL, LOTE, TOTALSINIMPUESTOS, TOTALDESCUENTO, BASE_12, BASE_0, VALORADICIONAL4, ordvalefec, ordvalcheq, ordvaltarjcred, ordvaltransf from (SELECT      RAZONSOCIAL,     NOMBRECOMERCIAL,     RUC,     CODDOC,     concat(ESTAB,'-',PTOEMI,'-',SECUENCIAL) as FACTURA,     ESTAB,     PTOEMI,     SECUENCIAL,     LOTE,    DIRMATRIZ,     FECHAEMISION,     DIRESTABLECIMIENTO,     NUMCONTRIBUYENTEESPECIAL,     OBLIGADOCONTABILIDAD,     TIPOIDENTCOMPRADOR,     GUIAREMISION,     RAZONSOCIALCOMPRADOR,     IDCOMPRADOR,     TOTALSINIMPUESTOS,     TOTALDESCUENTO,     BASE_12,     BASE_0,     CODIMPUESTO,     CODPORCENTAJEIMPUESTO,     BASEIMPONIBLE1,     TARIFA1,     VALOR1,     PROPINA,     IMPORTETOTAL,     MONEDA,     FORMATO,     CAMPOADICIONAL1,     VALORADICIONAL1,     CAMPOADICIONAL2,     VALORADICIONAL2,     CAMPOADICIONAL3,     VALORADICIONAL3,     CAMPOADICIONAL4,     VALORADICIONAL4,     CAMPOADICIONAL5,     VALORADICIONAL5,     CAMPOADICIONAL6,     VALORADICIONAL6,     CAMPOADICIONAL7,     VALORADICIONAL7,     CAMPOADICIONAL8,     VALORADICIONAL8,     CAMPOADICIONAL9,     VALORADICIONAL9,     CAMPOADICIONAL10,     VALORADICIONAL10,     CAMPOADICIONAL11,     VALORADICIONAL11,     facturado,     ordvalefec, ordvalcheq, ordvaltarjcred, ordvaltransf FROM      orden_trabajo  WHERE facturado=0 AND CONCAT(SUBSTR(ESTAB,3,1),'-',SUBSTR(SECUENCIAL,2,8)) NOT IN (SELECT cxcnumdoc FROM cuentasxcobrar WHERE cxctipodoc='O' AND cxcvalpen>0 AND cxcanulado=0) AND IMPORTETOTAL>0 ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT FACTURA, IDCOMPRADOR, RAZONSOCIALCOMPRADOR, VALORADICIONAL5, FECHAEMISION, IMPORTETOTAL, RUC, ESTAB, PTOEMI, SECUENCIAL, LOTE, TOTALSINIMPUESTOS, TOTALDESCUENTO, BASE_12, BASE_0, VALORADICIONAL4, ordvalefec, ordvalcheq, ordvaltarjcred, ordvaltransf from (SELECT      RAZONSOCIAL,     NOMBRECOMERCIAL,     RUC,     CODDOC,     concat(ESTAB,'-',PTOEMI,'-',SECUENCIAL) as FACTURA,     ESTAB,     PTOEMI,     SECUENCIAL,     LOTE,    DIRMATRIZ,     FECHAEMISION,     DIRESTABLECIMIENTO,     NUMCONTRIBUYENTEESPECIAL,     OBLIGADOCONTABILIDAD,     TIPOIDENTCOMPRADOR,     GUIAREMISION,     RAZONSOCIALCOMPRADOR,     IDCOMPRADOR,     TOTALSINIMPUESTOS,     TOTALDESCUENTO,     BASE_12,     BASE_0,     CODIMPUESTO,     CODPORCENTAJEIMPUESTO,     BASEIMPONIBLE1,     TARIFA1,     VALOR1,     PROPINA,     IMPORTETOTAL,     MONEDA,     FORMATO,     CAMPOADICIONAL1,     VALORADICIONAL1,     CAMPOADICIONAL2,     VALORADICIONAL2,     CAMPOADICIONAL3,     VALORADICIONAL3,     CAMPOADICIONAL4,     VALORADICIONAL4,     CAMPOADICIONAL5,     VALORADICIONAL5,     CAMPOADICIONAL6,     VALORADICIONAL6,     CAMPOADICIONAL7,     VALORADICIONAL7,     CAMPOADICIONAL8,     VALORADICIONAL8,     CAMPOADICIONAL9,     VALORADICIONAL9,     CAMPOADICIONAL10,     VALORADICIONAL10,     CAMPOADICIONAL11,     VALORADICIONAL11,     facturado,     ordvalefec, ordvalcheq, ordvaltarjcred, ordvaltransf FROM      orden_trabajo  WHERE facturado=0 AND CONCAT(SUBSTR(ESTAB,3,1),'-',SUBSTR(SECUENCIAL,2,8)) NOT IN (SELECT cxcnumdoc FROM cuentasxcobrar WHERE cxctipodoc='O' AND cxcvalpen>0 AND cxcanulado=0) AND IMPORTETOTAL>0 ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT FACTURA, IDCOMPRADOR, RAZONSOCIALCOMPRADOR, VALORADICIONAL5, FECHAEMISION, IMPORTETOTAL, RUC, ESTAB, PTOEMI, SECUENCIAL, LOTE, TOTALSINIMPUESTOS, TOTALDESCUENTO, BASE_12, BASE_0, VALORADICIONAL4, ordvalefec, ordvalcheq, ordvaltarjcred, ordvaltransf from (SELECT      RAZONSOCIAL,     NOMBRECOMERCIAL,     RUC,     CODDOC,     concat(ESTAB,'-',PTOEMI,'-',SECUENCIAL) as FACTURA,     ESTAB,     PTOEMI,     SECUENCIAL,     LOTE,    DIRMATRIZ,     FECHAEMISION,     DIRESTABLECIMIENTO,     NUMCONTRIBUYENTEESPECIAL,     OBLIGADOCONTABILIDAD,     TIPOIDENTCOMPRADOR,     GUIAREMISION,     RAZONSOCIALCOMPRADOR,     IDCOMPRADOR,     TOTALSINIMPUESTOS,     TOTALDESCUENTO,     BASE_12,     BASE_0,     CODIMPUESTO,     CODPORCENTAJEIMPUESTO,     BASEIMPONIBLE1,     TARIFA1,     VALOR1,     PROPINA,     IMPORTETOTAL,     MONEDA,     FORMATO,     CAMPOADICIONAL1,     VALORADICIONAL1,     CAMPOADICIONAL2,     VALORADICIONAL2,     CAMPOADICIONAL3,     VALORADICIONAL3,     CAMPOADICIONAL4,     VALORADICIONAL4,     CAMPOADICIONAL5,     VALORADICIONAL5,     CAMPOADICIONAL6,     VALORADICIONAL6,     CAMPOADICIONAL7,     VALORADICIONAL7,     CAMPOADICIONAL8,     VALORADICIONAL8,     CAMPOADICIONAL9,     VALORADICIONAL9,     CAMPOADICIONAL10,     VALORADICIONAL10,     CAMPOADICIONAL11,     VALORADICIONAL11,     facturado,     ordvalefec, ordvalcheq, ordvaltarjcred, ordvaltransf FROM      orden_trabajo  WHERE facturado=0 AND CONCAT(SUBSTR(ESTAB,3,1),'-',SUBSTR(SECUENCIAL,2,8)) NOT IN (SELECT cxcnumdoc FROM cuentasxcobrar WHERE cxctipodoc='O' AND cxcvalpen>0 AND cxcanulado=0) AND IMPORTETOTAL>0 ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT FACTURA, IDCOMPRADOR, RAZONSOCIALCOMPRADOR, VALORADICIONAL5, FECHAEMISION, IMPORTETOTAL, RUC, ESTAB, PTOEMI, SECUENCIAL, LOTE, TOTALSINIMPUESTOS, TOTALDESCUENTO, BASE_12, BASE_0, VALORADICIONAL4, ordvalefec, ordvalcheq, ordvaltarjcred, ordvaltransf from (SELECT      RAZONSOCIAL,     NOMBRECOMERCIAL,     RUC,     CODDOC,     concat(ESTAB,'-',PTOEMI,'-',SECUENCIAL) as FACTURA,     ESTAB,     PTOEMI,     SECUENCIAL,     LOTE,    DIRMATRIZ,     FECHAEMISION,     DIRESTABLECIMIENTO,     NUMCONTRIBUYENTEESPECIAL,     OBLIGADOCONTABILIDAD,     TIPOIDENTCOMPRADOR,     GUIAREMISION,     RAZONSOCIALCOMPRADOR,     IDCOMPRADOR,     TOTALSINIMPUESTOS,     TOTALDESCUENTO,     BASE_12,     BASE_0,     CODIMPUESTO,     CODPORCENTAJEIMPUESTO,     BASEIMPONIBLE1,     TARIFA1,     VALOR1,     PROPINA,     IMPORTETOTAL,     MONEDA,     FORMATO,     CAMPOADICIONAL1,     VALORADICIONAL1,     CAMPOADICIONAL2,     VALORADICIONAL2,     CAMPOADICIONAL3,     VALORADICIONAL3,     CAMPOADICIONAL4,     VALORADICIONAL4,     CAMPOADICIONAL5,     VALORADICIONAL5,     CAMPOADICIONAL6,     VALORADICIONAL6,     CAMPOADICIONAL7,     VALORADICIONAL7,     CAMPOADICIONAL8,     VALORADICIONAL8,     CAMPOADICIONAL9,     VALORADICIONAL9,     CAMPOADICIONAL10,     VALORADICIONAL10,     CAMPOADICIONAL11,     VALORADICIONAL11,     facturado,     ordvalefec, ordvalcheq, ordvaltarjcred, ordvaltransf FROM      orden_trabajo  WHERE facturado=0 AND CONCAT(SUBSTR(ESTAB,3,1),'-',SUBSTR(SECUENCIAL,2,8)) NOT IN (SELECT cxcnumdoc FROM cuentasxcobrar WHERE cxctipodoc='O' AND cxcvalpen>0 AND cxcanulado=0) AND IMPORTETOTAL>0 ) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT FACTURA, IDCOMPRADOR, RAZONSOCIALCOMPRADOR, VALORADICIONAL5, FECHAEMISION, IMPORTETOTAL, RUC, ESTAB, PTOEMI, SECUENCIAL, LOTE, TOTALSINIMPUESTOS, TOTALDESCUENTO, BASE_12, BASE_0, VALORADICIONAL4, ordvalefec, ordvalcheq, ordvaltarjcred, ordvaltransf from (SELECT      RAZONSOCIAL,     NOMBRECOMERCIAL,     RUC,     CODDOC,     concat(ESTAB,'-',PTOEMI,'-',SECUENCIAL) as FACTURA,     ESTAB,     PTOEMI,     SECUENCIAL,     LOTE,    DIRMATRIZ,     FECHAEMISION,     DIRESTABLECIMIENTO,     NUMCONTRIBUYENTEESPECIAL,     OBLIGADOCONTABILIDAD,     TIPOIDENTCOMPRADOR,     GUIAREMISION,     RAZONSOCIALCOMPRADOR,     IDCOMPRADOR,     TOTALSINIMPUESTOS,     TOTALDESCUENTO,     BASE_12,     BASE_0,     CODIMPUESTO,     CODPORCENTAJEIMPUESTO,     BASEIMPONIBLE1,     TARIFA1,     VALOR1,     PROPINA,     IMPORTETOTAL,     MONEDA,     FORMATO,     CAMPOADICIONAL1,     VALORADICIONAL1,     CAMPOADICIONAL2,     VALORADICIONAL2,     CAMPOADICIONAL3,     VALORADICIONAL3,     CAMPOADICIONAL4,     VALORADICIONAL4,     CAMPOADICIONAL5,     VALORADICIONAL5,     CAMPOADICIONAL6,     VALORADICIONAL6,     CAMPOADICIONAL7,     VALORADICIONAL7,     CAMPOADICIONAL8,     VALORADICIONAL8,     CAMPOADICIONAL9,     VALORADICIONAL9,     CAMPOADICIONAL10,     VALORADICIONAL10,     CAMPOADICIONAL11,     VALORADICIONAL11,     facturado,     ordvalefec, ordvalcheq, ordvaltarjcred, ordvaltransf FROM      orden_trabajo  WHERE facturado=0 AND CONCAT(SUBSTR(ESTAB,3,1),'-',SUBSTR(SECUENCIAL,2,8)) NOT IN (SELECT cxcnumdoc FROM cuentasxcobrar WHERE cxctipodoc='O' AND cxcvalpen>0 AND cxcanulado=0) AND IMPORTETOTAL>0 ) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT FACTURA, IDCOMPRADOR, RAZONSOCIALCOMPRADOR, VALORADICIONAL5, FECHAEMISION, IMPORTETOTAL, RUC, ESTAB, PTOEMI, SECUENCIAL, LOTE, TOTALSINIMPUESTOS, TOTALDESCUENTO, BASE_12, BASE_0, VALORADICIONAL4, ordvalefec, ordvalcheq, ordvaltarjcred, ordvaltransf from (SELECT      RAZONSOCIAL,     NOMBRECOMERCIAL,     RUC,     CODDOC,     concat(ESTAB,'-',PTOEMI,'-',SECUENCIAL) as FACTURA,     ESTAB,     PTOEMI,     SECUENCIAL,     LOTE,    DIRMATRIZ,     FECHAEMISION,     DIRESTABLECIMIENTO,     NUMCONTRIBUYENTEESPECIAL,     OBLIGADOCONTABILIDAD,     TIPOIDENTCOMPRADOR,     GUIAREMISION,     RAZONSOCIALCOMPRADOR,     IDCOMPRADOR,     TOTALSINIMPUESTOS,     TOTALDESCUENTO,     BASE_12,     BASE_0,     CODIMPUESTO,     CODPORCENTAJEIMPUESTO,     BASEIMPONIBLE1,     TARIFA1,     VALOR1,     PROPINA,     IMPORTETOTAL,     MONEDA,     FORMATO,     CAMPOADICIONAL1,     VALORADICIONAL1,     CAMPOADICIONAL2,     VALORADICIONAL2,     CAMPOADICIONAL3,     VALORADICIONAL3,     CAMPOADICIONAL4,     VALORADICIONAL4,     CAMPOADICIONAL5,     VALORADICIONAL5,     CAMPOADICIONAL6,     VALORADICIONAL6,     CAMPOADICIONAL7,     VALORADICIONAL7,     CAMPOADICIONAL8,     VALORADICIONAL8,     CAMPOADICIONAL9,     VALORADICIONAL9,     CAMPOADICIONAL10,     VALORADICIONAL10,     CAMPOADICIONAL11,     VALORADICIONAL11,     facturado,     ordvalefec, ordvalcheq, ordvaltarjcred, ordvaltransf FROM      orden_trabajo  WHERE facturado=0 AND CONCAT(SUBSTR(ESTAB,3,1),'-',SUBSTR(SECUENCIAL,2,8)) NOT IN (SELECT cxcnumdoc FROM cuentasxcobrar WHERE cxctipodoc='O' AND cxcvalpen>0 AND cxcanulado=0) AND IMPORTETOTAL>0 ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select_count;
      $rt = $this->Db->Execute($nmgp_select_count);
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->count_ger = $rt->fields[0];
      $rt->Close();
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->SC_seq_register = 0;
      $this->xml_registro = "";
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['embutida'])
         { 
             $this->xml_registro .= "<" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro = "<grid_ORDENES_TRABAJO_SF>\r\n";
         }
         else
         {
             $this->xml_registro = "<grid_ORDENES_TRABAJO_SF";
         }
         $this->factura = $rs->fields[0] ;  
         $this->idcomprador = $rs->fields[1] ;  
         $this->razonsocialcomprador = $rs->fields[2] ;  
         $this->valoradicional5 = $rs->fields[3] ;  
         $this->fechaemision = $rs->fields[4] ;  
         $this->importetotal = $rs->fields[5] ;  
         $this->importetotal =  str_replace(",", ".", $this->importetotal);
         $this->importetotal = (strpos(strtolower($this->importetotal), "e")) ? (float)$this->importetotal : $this->importetotal; 
         $this->importetotal = (string)$this->importetotal;
         $this->ruc = $rs->fields[6] ;  
         $this->estab = $rs->fields[7] ;  
         $this->estab = (string)$this->estab;
         $this->ptoemi = $rs->fields[8] ;  
         $this->ptoemi = (string)$this->ptoemi;
         $this->secuencial = $rs->fields[9] ;  
         $this->secuencial = (string)$this->secuencial;
         $this->lote = $rs->fields[10] ;  
         $this->totalsinimpuestos = $rs->fields[11] ;  
         $this->totalsinimpuestos = (strpos(strtolower($this->totalsinimpuestos), "e")) ? (float)$this->totalsinimpuestos : $this->totalsinimpuestos; 
         $this->totalsinimpuestos = (string)$this->totalsinimpuestos;
         $this->totaldescuento = $rs->fields[12] ;  
         $this->totaldescuento = (strpos(strtolower($this->totaldescuento), "e")) ? (float)$this->totaldescuento : $this->totaldescuento; 
         $this->totaldescuento = (string)$this->totaldescuento;
         $this->base_12 = $rs->fields[13] ;  
         $this->base_12 = (strpos(strtolower($this->base_12), "e")) ? (float)$this->base_12 : $this->base_12; 
         $this->base_12 = (string)$this->base_12;
         $this->base_0 = $rs->fields[14] ;  
         $this->base_0 = (strpos(strtolower($this->base_0), "e")) ? (float)$this->base_0 : $this->base_0; 
         $this->base_0 = (string)$this->base_0;
         $this->valoradicional4 = $rs->fields[15] ;  
         $this->ordvalefec = $rs->fields[16] ;  
         $this->ordvalefec = (strpos(strtolower($this->ordvalefec), "e")) ? (float)$this->ordvalefec : $this->ordvalefec; 
         $this->ordvalefec = (string)$this->ordvalefec;
         $this->ordvalcheq = $rs->fields[17] ;  
         $this->ordvalcheq = (strpos(strtolower($this->ordvalcheq), "e")) ? (float)$this->ordvalcheq : $this->ordvalcheq; 
         $this->ordvalcheq = (string)$this->ordvalcheq;
         $this->ordvaltarjcred = $rs->fields[18] ;  
         $this->ordvaltarjcred = (strpos(strtolower($this->ordvaltarjcred), "e")) ? (float)$this->ordvaltarjcred : $this->ordvaltarjcred; 
         $this->ordvaltarjcred = (string)$this->ordvaltarjcred;
         $this->ordvaltransf = $rs->fields[19] ;  
         $this->ordvaltransf = (strpos(strtolower($this->ordvaltransf), "e")) ? (float)$this->ordvaltransf : $this->ordvaltransf; 
         $this->ordvaltransf = (string)$this->ordvaltransf;
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['embutida'])
         { 
             $this->xml_registro .= "</" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro .= "</grid_ORDENES_TRABAJO_SF>\r\n";
         }
         else
         {
             $this->xml_registro .= " />\r\n";
         }
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['embutida'])
         { 
             fwrite($xml_f, $this->xml_registro);
             if ($this->Grava_view)
             {
                fwrite($xml_v, $this->xml_registro);
             }
         }
         $rs->MoveNext();
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['embutida'])
      { 
          if (!$this->New_Format)
          {
              $this->xml_registro = "";
          }
          $_SESSION['scriptcase']['export_return'] = $this->xml_registro;
      }
      else
      { 
          fwrite($xml_f, "</root>");
          fclose($xml_f);
          if ($this->Grava_view)
          {
             fwrite($xml_v, "</root>");
             fclose($xml_v);
          }
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- factura
   function NM_export_factura()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->factura))
         {
             $this->factura = sc_convert_encoding($this->factura, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['factura'])) ? $this->New_label['factura'] : "N�MERO"; 
          }
          else
          {
              $SC_Label = "factura"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->factura) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->factura) . "\"";
         }
   }
   //----- idcomprador
   function NM_export_idcomprador()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->idcomprador))
         {
             $this->idcomprador = sc_convert_encoding($this->idcomprador, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['idcomprador'])) ? $this->New_label['idcomprador'] : "ID CLIENTE"; 
          }
          else
          {
              $SC_Label = "idcomprador"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->idcomprador) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->idcomprador) . "\"";
         }
   }
   //----- razonsocialcomprador
   function NM_export_razonsocialcomprador()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->razonsocialcomprador))
         {
             $this->razonsocialcomprador = sc_convert_encoding($this->razonsocialcomprador, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['razonsocialcomprador'])) ? $this->New_label['razonsocialcomprador'] : "NOMBRE CLIENTE"; 
          }
          else
          {
              $SC_Label = "razonsocialcomprador"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->razonsocialcomprador) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->razonsocialcomprador) . "\"";
         }
   }
   //----- valoradicional5
   function NM_export_valoradicional5()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->valoradicional5))
         {
             $this->valoradicional5 = sc_convert_encoding($this->valoradicional5, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['valoradicional5'])) ? $this->New_label['valoradicional5'] : "PACIENTE"; 
          }
          else
          {
              $SC_Label = "valoradicional5"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->valoradicional5) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->valoradicional5) . "\"";
         }
   }
   //----- fechaemision
   function NM_export_fechaemision()
   {
             $conteudo_x =  $this->fechaemision;
             nm_conv_limpa_dado($conteudo_x, "DD/MM/YYYY");
             if (is_numeric($conteudo_x) && $conteudo_x > 0) 
             { 
                 $this->nm_data->SetaData($this->fechaemision, "DD/MM/YYYY");
                 $this->fechaemision = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->fechaemision))
         {
             $this->fechaemision = sc_convert_encoding($this->fechaemision, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['fechaemision'])) ? $this->New_label['fechaemision'] : "FECHA DE EMISI�N"; 
          }
          else
          {
              $SC_Label = "fechaemision"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fechaemision) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fechaemision) . "\"";
         }
   }
   //----- importetotal
   function NM_export_importetotal()
   {
             nmgp_Form_Num_Val($this->importetotal, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['importetotal'])) ? $this->New_label['importetotal'] : "IMPORTE TOTAL"; 
          }
          else
          {
              $SC_Label = "importetotal"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->importetotal) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->importetotal) . "\"";
         }
   }
   //----- ride
   function NM_export_ride()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->ride))
         {
             $this->ride = sc_convert_encoding($this->ride, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['ride'])) ? $this->New_label['ride'] : "PDF"; 
          }
          else
          {
              $SC_Label = "ride"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->ride) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->ride) . "\"";
         }
   }

   //----- 
   function trata_dados($conteudo)
   {
      $str_temp =  $conteudo;
      $str_temp =  str_replace("<br />", "",  $str_temp);
      $str_temp =  str_replace("&", "&amp;",  $str_temp);
      $str_temp =  str_replace("<", "&lt;",   $str_temp);
      $str_temp =  str_replace(">", "&gt;",   $str_temp);
      $str_temp =  str_replace("'", "&apos;", $str_temp);
      $str_temp =  str_replace('"', "&quot;",  $str_temp);
      $str_temp =  str_replace('(', "_",  $str_temp);
      $str_temp =  str_replace(')', "",  $str_temp);
      return ($str_temp);
   }

   function clear_tag(&$conteudo)
   {
      $out = (is_numeric(substr($conteudo, 0, 1)) || substr($conteudo, 0, 1) == "") ? "_" : "";
      $str_temp = "abcdefghijklmnopqrstuvwxyz0123456789";
      for ($i = 0; $i < strlen($conteudo); $i++)
      {
          $char = substr($conteudo, $i, 1);
          $ok = false;
          for ($z = 0; $z < strlen($str_temp); $z++)
          {
              if (strtolower($char) == substr($str_temp, $z, 1))
              {
                  $ok = true;
                  break;
              }
          }
          $out .= ($ok) ? $char : "_";
      }
      $conteudo = $out;
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
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>SELECCIONAR �RDENES DE TRABAJO PARA INCLUIR EN LA FACTURA :: XML</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <?php
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->str_google_fonts ?>" />
 <?php
 }
 ?>
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">XML</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo_view ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_ORDENES_TRABAJO_SF_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_ORDENES_TRABAJO_SF"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ORDENES_TRABAJO_SF']['xml_return']); ?>"> 
</FORM> 
</BODY>
</HTML>
<?php
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
}

?>
