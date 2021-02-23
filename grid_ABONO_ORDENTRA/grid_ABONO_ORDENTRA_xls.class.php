<?php

class grid_ABONO_ORDENTRA_xls
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Xls_dados;
   var $Xls_workbook;
   var $Xls_col;
   var $Xls_row;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();
   var $NM_ctrl_style = array();
   var $Arquivo;
   var $Tit_doc;
   //---- 
   function __construct()
   {
   }

   //---- 
   function monta_xls()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['embutida']) {
          if ($this->Ini->sc_export_ajax)
          {
              $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Xls_f);
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
      else { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['opcao'] = "";
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
                   nm_limpa_str_grid_ABONO_ORDENTRA($cadapar[1]);
                   nm_protect_num_grid_ABONO_ORDENTRA($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_ABONO_ORDENTRA']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($v_docum_emisor)) 
      {
          $_SESSION['v_docum_emisor'] = $v_docum_emisor;
          nm_limpa_str_grid_ABONO_ORDENTRA($_SESSION["v_docum_emisor"]);
      }
      if (isset($v_docum_secuen)) 
      {
          $_SESSION['v_docum_secuen'] = $v_docum_secuen;
          nm_limpa_str_grid_ABONO_ORDENTRA($_SESSION["v_docum_secuen"]);
      }
      if (isset($v_numfila_doc)) 
      {
          $_SESSION['v_numfila_doc'] = $v_numfila_doc;
          nm_limpa_str_grid_ABONO_ORDENTRA($_SESSION["v_numfila_doc"]);
      }
      if (isset($v_saldo_doc)) 
      {
          $_SESSION['v_saldo_doc'] = $v_saldo_doc;
          nm_limpa_str_grid_ABONO_ORDENTRA($_SESSION["v_saldo_doc"]);
      }
      $this->Use_phpspreadsheet = (phpversion() >=  "7.3.9" && is_dir($this->Ini->path_third . '/phpspreadsheet')) ? true : false;
      $this->Xls_tot_col = 0;
      $this->Xls_row     = 0;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['embutida'])
      { 
          if ($this->Use_phpspreadsheet) {
              require_once $this->Ini->path_third . '/phpspreadsheet/vendor/autoload.php';
          } 
          else { 
              set_include_path(get_include_path() . PATH_SEPARATOR . $this->Ini->path_third . '/phpexcel/');
              require_once $this->Ini->path_third . '/phpexcel/PHPExcel.php';
              require_once $this->Ini->path_third . '/phpexcel/PHPExcel/IOFactory.php';
              require_once $this->Ini->path_third . '/phpexcel/PHPExcel/Cell/AdvancedValueBinder.php';
          } 
      } 
      $orig_form_dt = strtoupper($_SESSION['scriptcase']['reg_conf']['date_format']);
      $this->SC_date_conf_region = "";
      for ($i = 0; $i < 8; $i++)
      {
          if ($i > 0 && substr($orig_form_dt, $i, 1) != substr($this->SC_date_conf_region, -1, 1)) {
              $this->SC_date_conf_region .= $_SESSION['scriptcase']['reg_conf']['date_sep'];
          }
          $this->SC_date_conf_region .= substr($orig_form_dt, $i, 1);
      }
      $this->Xls_tp = ".xlsx";
      if (isset($_REQUEST['nmgp_tp_xls']) && !empty($_REQUEST['nmgp_tp_xls']))
      {
          $this->Xls_tp = "." . $_REQUEST['nmgp_tp_xls'];
      }
      $this->Xls_col      = 0;
      $this->Tem_xls_res  = false;
      $this->Xls_password = "";
      $this->nm_data      = new nm_data("es");
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['embutida'])
      { 
          $this->Arquivo    = "sc_xls";
          $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
          $this->Arq_zip    = $this->Arquivo . "_grid_ABONO_ORDENTRA.zip";
          $this->Arquivo   .= "_grid_ABONO_ORDENTRA" . $this->Xls_tp;
          $this->Tit_doc    = "grid_ABONO_ORDENTRA" . $this->Xls_tp;
          $this->Tit_zip    = "grid_ABONO_ORDENTRA.zip";
          $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          if ($this->Use_phpspreadsheet) {
              $this->Xls_dados = new PhpOffice\PhpSpreadsheet\Spreadsheet();
              \PhpOffice\PhpSpreadsheet\Cell\Cell::setValueBinder( new \PhpOffice\PhpSpreadsheet\Cell\AdvancedValueBinder() );
          }
          else {
              PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );
              $this->Xls_dados = new PHPExcel();
          }
          $this->Xls_dados->setActiveSheetIndex(0);
          $this->Nm_ActiveSheet = $this->Xls_dados->getActiveSheet();
          if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
          {
              $this->Nm_ActiveSheet->setRightToLeft(true);
          }
      }
      require_once($this->Ini->path_aplicacao . "grid_ABONO_ORDENTRA_total.class.php"); 
      $this->Tot = new grid_ABONO_ORDENTRA_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['SC_Ind_Groupby'];
      $this->Tot->$Gb_geral();
      $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['tot_geral'][1];
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
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_ABONO_ORDENTRA']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_ABONO_ORDENTRA']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_ABONO_ORDENTRA']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['field_order'] as $Cada_cmp)
      {
          if (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
          {
              $this->Xls_tot_col++;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->tipo = $Busca_temp['tipo']; 
          $tmp_pos = strpos($this->tipo, "##@@");
          if ($tmp_pos !== false && !is_array($this->tipo))
          {
              $this->tipo = substr($this->tipo, 0, $tmp_pos);
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha))
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $this->numdoc = $Busca_temp['numdoc']; 
          $tmp_pos = strpos($this->numdoc, "##@@");
          if ($tmp_pos !== false && !is_array($this->numdoc))
          {
              $this->numdoc = substr($this->numdoc, 0, $tmp_pos);
          }
          $this->forma_pago = $Busca_temp['forma_pago']; 
          $tmp_pos = strpos($this->forma_pago, "##@@");
          if ($tmp_pos !== false && !is_array($this->forma_pago))
          {
              $this->forma_pago = substr($this->forma_pago, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['xls_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['xls_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['xls_name'] .= $this->Xls_tp;
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['xls_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['xls_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['xls_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['xls_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['xls_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['xls_name']);
          $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['embutida_label']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['embutida_label'])
      { 
          $this->count_span = 0;
          $this->Xls_row++;
          $this->proc_label();
          $_SESSION['scriptcase']['export_return'] = $this->arr_export;
          return;
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT 'O' AS TIPO, CONCAT(SUBSTR(FECHAEMISION,7,4),'-',SUBSTR(FECHAEMISION,4,2),'-',SUBSTR(FECHAEMISION,1,2)) AS FECHA, CONCAT(ESTAB,'-',PTOEMI,'-',SECUENCIAL) AS NUMDOC, '' AS FORMA_PAGO, IMPORTETOTAL AS DEBE, 0 AS HABER FROM orden_trabajo WHERE VALORADICIONAL6<>'' AND RUC='" . $_SESSION['v_docum_emisor'] . "' AND SECUENCIAL=" . $_SESSION['v_docum_secuen'] . "   UNION  SELECT 'O' AS TIPO, CONCAT(SUBSTR(FECHAEMISION,7,4),'-',SUBSTR(FECHAEMISION,4,2),'-',SUBSTR(FECHAEMISION,1,2)) AS FECHA, CONCAT(ESTAB,'-',PTOEMI,'-',SECUENCIAL) AS NUMDOC, VALORADICIONAL6 AS FORMA_PAGO, 0 AS DEBE, IMPORTETOTAL AS HABER FROM orden_trabajo WHERE VALORADICIONAL6<>'' AND RUC='" . $_SESSION['v_docum_emisor'] . "' AND SECUENCIAL=" . $_SESSION['v_docum_secuen'] . "  UNION  SELECT 'O' AS TIPO, CONCAT(SUBSTR(FECHAEMISION,7,4),'-',SUBSTR(FECHAEMISION,4,2),'-',SUBSTR(FECHAEMISION,1,2)) AS FECHA, CONCAT(ESTAB,'-',PTOEMI,'-',SECUENCIAL) AS NUMDOC, VALORADICIONAL6 AS FORMA_PAGO, IMPORTETOTAL AS DEBE, 0 AS HABER FROM orden_trabajo WHERE VALORADICIONAL6='' AND RUC='" . $_SESSION['v_docum_emisor'] . "' AND SECUENCIAL=" . $_SESSION['v_docum_secuen'] . "   UNION   SELECT 'C' AS TIPO, C.cobfecha AS FECHA, D.cobnumero AS NUMDOC, CASE WHEN C.cobvalefec>0 THEN 'EFECTIVO' WHEN C.cobvalcheq>0 THEN 'CHEQUE' WHEN C.cobvaltarjcred>0 THEN 'TARJETA DE CR�DITO' WHEN C.cobvaltransf>0 THEN 'TRANSFERENCIA BANCARIA' WHEN C.cobvalretfte>0 THEN 'RETENCI�N FTE.' ELSE 'N/A' END AS FORMA_PAGO, 0 AS DEBE, D.decvalabono AS HABER FROM cobros C, detalle_cobro D WHERE D.cxctipodoc='O' AND C.cobnumero=D.cobnumero AND C.emiruc=D.cobemiruc AND C.cobanula=0 AND C.emiruc='" . $_SESSION['v_docum_emisor'] . "' AND SUBSTR(D.cxcnumdoc,3)=" . $_SESSION['v_docum_secuen'] . "  ) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT TIPO, FECHA, NUMDOC, FORMA_PAGO, DEBE, HABER from (SELECT 'O' AS TIPO, CONCAT(SUBSTR(FECHAEMISION,7,4),'-',SUBSTR(FECHAEMISION,4,2),'-',SUBSTR(FECHAEMISION,1,2)) AS FECHA, CONCAT(ESTAB,'-',PTOEMI,'-',SECUENCIAL) AS NUMDOC, '' AS FORMA_PAGO, IMPORTETOTAL AS DEBE, 0 AS HABER FROM orden_trabajo WHERE VALORADICIONAL6<>'' AND RUC='" . $_SESSION['v_docum_emisor'] . "' AND SECUENCIAL=" . $_SESSION['v_docum_secuen'] . "   UNION  SELECT 'O' AS TIPO, CONCAT(SUBSTR(FECHAEMISION,7,4),'-',SUBSTR(FECHAEMISION,4,2),'-',SUBSTR(FECHAEMISION,1,2)) AS FECHA, CONCAT(ESTAB,'-',PTOEMI,'-',SECUENCIAL) AS NUMDOC, VALORADICIONAL6 AS FORMA_PAGO, 0 AS DEBE, IMPORTETOTAL AS HABER FROM orden_trabajo WHERE VALORADICIONAL6<>'' AND RUC='" . $_SESSION['v_docum_emisor'] . "' AND SECUENCIAL=" . $_SESSION['v_docum_secuen'] . "  UNION  SELECT 'O' AS TIPO, CONCAT(SUBSTR(FECHAEMISION,7,4),'-',SUBSTR(FECHAEMISION,4,2),'-',SUBSTR(FECHAEMISION,1,2)) AS FECHA, CONCAT(ESTAB,'-',PTOEMI,'-',SECUENCIAL) AS NUMDOC, VALORADICIONAL6 AS FORMA_PAGO, IMPORTETOTAL AS DEBE, 0 AS HABER FROM orden_trabajo WHERE VALORADICIONAL6='' AND RUC='" . $_SESSION['v_docum_emisor'] . "' AND SECUENCIAL=" . $_SESSION['v_docum_secuen'] . "   UNION   SELECT 'C' AS TIPO, C.cobfecha AS FECHA, D.cobnumero AS NUMDOC, CASE WHEN C.cobvalefec>0 THEN 'EFECTIVO' WHEN C.cobvalcheq>0 THEN 'CHEQUE' WHEN C.cobvaltarjcred>0 THEN 'TARJETA DE CR�DITO' WHEN C.cobvaltransf>0 THEN 'TRANSFERENCIA BANCARIA' WHEN C.cobvalretfte>0 THEN 'RETENCI�N FTE.' ELSE 'N/A' END AS FORMA_PAGO, 0 AS DEBE, D.decvalabono AS HABER FROM cobros C, detalle_cobro D WHERE D.cxctipodoc='O' AND C.cobnumero=D.cobnumero AND C.emiruc=D.cobemiruc AND C.cobanula=0 AND C.emiruc='" . $_SESSION['v_docum_emisor'] . "' AND SUBSTR(D.cxcnumdoc,3)=" . $_SESSION['v_docum_secuen'] . "  ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT TIPO, FECHA, NUMDOC, FORMA_PAGO, DEBE, HABER from (SELECT 'O' AS TIPO, CONCAT(SUBSTR(FECHAEMISION,7,4),'-',SUBSTR(FECHAEMISION,4,2),'-',SUBSTR(FECHAEMISION,1,2)) AS FECHA, CONCAT(ESTAB,'-',PTOEMI,'-',SECUENCIAL) AS NUMDOC, '' AS FORMA_PAGO, IMPORTETOTAL AS DEBE, 0 AS HABER FROM orden_trabajo WHERE VALORADICIONAL6<>'' AND RUC='" . $_SESSION['v_docum_emisor'] . "' AND SECUENCIAL=" . $_SESSION['v_docum_secuen'] . "   UNION  SELECT 'O' AS TIPO, CONCAT(SUBSTR(FECHAEMISION,7,4),'-',SUBSTR(FECHAEMISION,4,2),'-',SUBSTR(FECHAEMISION,1,2)) AS FECHA, CONCAT(ESTAB,'-',PTOEMI,'-',SECUENCIAL) AS NUMDOC, VALORADICIONAL6 AS FORMA_PAGO, 0 AS DEBE, IMPORTETOTAL AS HABER FROM orden_trabajo WHERE VALORADICIONAL6<>'' AND RUC='" . $_SESSION['v_docum_emisor'] . "' AND SECUENCIAL=" . $_SESSION['v_docum_secuen'] . "  UNION  SELECT 'O' AS TIPO, CONCAT(SUBSTR(FECHAEMISION,7,4),'-',SUBSTR(FECHAEMISION,4,2),'-',SUBSTR(FECHAEMISION,1,2)) AS FECHA, CONCAT(ESTAB,'-',PTOEMI,'-',SECUENCIAL) AS NUMDOC, VALORADICIONAL6 AS FORMA_PAGO, IMPORTETOTAL AS DEBE, 0 AS HABER FROM orden_trabajo WHERE VALORADICIONAL6='' AND RUC='" . $_SESSION['v_docum_emisor'] . "' AND SECUENCIAL=" . $_SESSION['v_docum_secuen'] . "   UNION   SELECT 'C' AS TIPO, C.cobfecha AS FECHA, D.cobnumero AS NUMDOC, CASE WHEN C.cobvalefec>0 THEN 'EFECTIVO' WHEN C.cobvalcheq>0 THEN 'CHEQUE' WHEN C.cobvaltarjcred>0 THEN 'TARJETA DE CR�DITO' WHEN C.cobvaltransf>0 THEN 'TRANSFERENCIA BANCARIA' WHEN C.cobvalretfte>0 THEN 'RETENCI�N FTE.' ELSE 'N/A' END AS FORMA_PAGO, 0 AS DEBE, D.decvalabono AS HABER FROM cobros C, detalle_cobro D WHERE D.cxctipodoc='O' AND C.cobnumero=D.cobnumero AND C.emiruc=D.cobemiruc AND C.cobanula=0 AND C.emiruc='" . $_SESSION['v_docum_emisor'] . "' AND SUBSTR(D.cxcnumdoc,3)=" . $_SESSION['v_docum_secuen'] . "  ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT TIPO, FECHA, NUMDOC, FORMA_PAGO, DEBE, HABER from (SELECT 'O' AS TIPO, CONCAT(SUBSTR(FECHAEMISION,7,4),'-',SUBSTR(FECHAEMISION,4,2),'-',SUBSTR(FECHAEMISION,1,2)) AS FECHA, CONCAT(ESTAB,'-',PTOEMI,'-',SECUENCIAL) AS NUMDOC, '' AS FORMA_PAGO, IMPORTETOTAL AS DEBE, 0 AS HABER FROM orden_trabajo WHERE VALORADICIONAL6<>'' AND RUC='" . $_SESSION['v_docum_emisor'] . "' AND SECUENCIAL=" . $_SESSION['v_docum_secuen'] . "   UNION  SELECT 'O' AS TIPO, CONCAT(SUBSTR(FECHAEMISION,7,4),'-',SUBSTR(FECHAEMISION,4,2),'-',SUBSTR(FECHAEMISION,1,2)) AS FECHA, CONCAT(ESTAB,'-',PTOEMI,'-',SECUENCIAL) AS NUMDOC, VALORADICIONAL6 AS FORMA_PAGO, 0 AS DEBE, IMPORTETOTAL AS HABER FROM orden_trabajo WHERE VALORADICIONAL6<>'' AND RUC='" . $_SESSION['v_docum_emisor'] . "' AND SECUENCIAL=" . $_SESSION['v_docum_secuen'] . "  UNION  SELECT 'O' AS TIPO, CONCAT(SUBSTR(FECHAEMISION,7,4),'-',SUBSTR(FECHAEMISION,4,2),'-',SUBSTR(FECHAEMISION,1,2)) AS FECHA, CONCAT(ESTAB,'-',PTOEMI,'-',SECUENCIAL) AS NUMDOC, VALORADICIONAL6 AS FORMA_PAGO, IMPORTETOTAL AS DEBE, 0 AS HABER FROM orden_trabajo WHERE VALORADICIONAL6='' AND RUC='" . $_SESSION['v_docum_emisor'] . "' AND SECUENCIAL=" . $_SESSION['v_docum_secuen'] . "   UNION   SELECT 'C' AS TIPO, C.cobfecha AS FECHA, D.cobnumero AS NUMDOC, CASE WHEN C.cobvalefec>0 THEN 'EFECTIVO' WHEN C.cobvalcheq>0 THEN 'CHEQUE' WHEN C.cobvaltarjcred>0 THEN 'TARJETA DE CR�DITO' WHEN C.cobvaltransf>0 THEN 'TRANSFERENCIA BANCARIA' WHEN C.cobvalretfte>0 THEN 'RETENCI�N FTE.' ELSE 'N/A' END AS FORMA_PAGO, 0 AS DEBE, D.decvalabono AS HABER FROM cobros C, detalle_cobro D WHERE D.cxctipodoc='O' AND C.cobnumero=D.cobnumero AND C.emiruc=D.cobemiruc AND C.cobanula=0 AND C.emiruc='" . $_SESSION['v_docum_emisor'] . "' AND SUBSTR(D.cxcnumdoc,3)=" . $_SESSION['v_docum_secuen'] . "  ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT TIPO, FECHA, NUMDOC, FORMA_PAGO, DEBE, HABER from (SELECT 'O' AS TIPO, CONCAT(SUBSTR(FECHAEMISION,7,4),'-',SUBSTR(FECHAEMISION,4,2),'-',SUBSTR(FECHAEMISION,1,2)) AS FECHA, CONCAT(ESTAB,'-',PTOEMI,'-',SECUENCIAL) AS NUMDOC, '' AS FORMA_PAGO, IMPORTETOTAL AS DEBE, 0 AS HABER FROM orden_trabajo WHERE VALORADICIONAL6<>'' AND RUC='" . $_SESSION['v_docum_emisor'] . "' AND SECUENCIAL=" . $_SESSION['v_docum_secuen'] . "   UNION  SELECT 'O' AS TIPO, CONCAT(SUBSTR(FECHAEMISION,7,4),'-',SUBSTR(FECHAEMISION,4,2),'-',SUBSTR(FECHAEMISION,1,2)) AS FECHA, CONCAT(ESTAB,'-',PTOEMI,'-',SECUENCIAL) AS NUMDOC, VALORADICIONAL6 AS FORMA_PAGO, 0 AS DEBE, IMPORTETOTAL AS HABER FROM orden_trabajo WHERE VALORADICIONAL6<>'' AND RUC='" . $_SESSION['v_docum_emisor'] . "' AND SECUENCIAL=" . $_SESSION['v_docum_secuen'] . "  UNION  SELECT 'O' AS TIPO, CONCAT(SUBSTR(FECHAEMISION,7,4),'-',SUBSTR(FECHAEMISION,4,2),'-',SUBSTR(FECHAEMISION,1,2)) AS FECHA, CONCAT(ESTAB,'-',PTOEMI,'-',SECUENCIAL) AS NUMDOC, VALORADICIONAL6 AS FORMA_PAGO, IMPORTETOTAL AS DEBE, 0 AS HABER FROM orden_trabajo WHERE VALORADICIONAL6='' AND RUC='" . $_SESSION['v_docum_emisor'] . "' AND SECUENCIAL=" . $_SESSION['v_docum_secuen'] . "   UNION   SELECT 'C' AS TIPO, C.cobfecha AS FECHA, D.cobnumero AS NUMDOC, CASE WHEN C.cobvalefec>0 THEN 'EFECTIVO' WHEN C.cobvalcheq>0 THEN 'CHEQUE' WHEN C.cobvaltarjcred>0 THEN 'TARJETA DE CR�DITO' WHEN C.cobvaltransf>0 THEN 'TRANSFERENCIA BANCARIA' WHEN C.cobvalretfte>0 THEN 'RETENCI�N FTE.' ELSE 'N/A' END AS FORMA_PAGO, 0 AS DEBE, D.decvalabono AS HABER FROM cobros C, detalle_cobro D WHERE D.cxctipodoc='O' AND C.cobnumero=D.cobnumero AND C.emiruc=D.cobemiruc AND C.cobanula=0 AND C.emiruc='" . $_SESSION['v_docum_emisor'] . "' AND SUBSTR(D.cxcnumdoc,3)=" . $_SESSION['v_docum_secuen'] . "  ) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT TIPO, FECHA, NUMDOC, FORMA_PAGO, DEBE, HABER from (SELECT 'O' AS TIPO, CONCAT(SUBSTR(FECHAEMISION,7,4),'-',SUBSTR(FECHAEMISION,4,2),'-',SUBSTR(FECHAEMISION,1,2)) AS FECHA, CONCAT(ESTAB,'-',PTOEMI,'-',SECUENCIAL) AS NUMDOC, '' AS FORMA_PAGO, IMPORTETOTAL AS DEBE, 0 AS HABER FROM orden_trabajo WHERE VALORADICIONAL6<>'' AND RUC='" . $_SESSION['v_docum_emisor'] . "' AND SECUENCIAL=" . $_SESSION['v_docum_secuen'] . "   UNION  SELECT 'O' AS TIPO, CONCAT(SUBSTR(FECHAEMISION,7,4),'-',SUBSTR(FECHAEMISION,4,2),'-',SUBSTR(FECHAEMISION,1,2)) AS FECHA, CONCAT(ESTAB,'-',PTOEMI,'-',SECUENCIAL) AS NUMDOC, VALORADICIONAL6 AS FORMA_PAGO, 0 AS DEBE, IMPORTETOTAL AS HABER FROM orden_trabajo WHERE VALORADICIONAL6<>'' AND RUC='" . $_SESSION['v_docum_emisor'] . "' AND SECUENCIAL=" . $_SESSION['v_docum_secuen'] . "  UNION  SELECT 'O' AS TIPO, CONCAT(SUBSTR(FECHAEMISION,7,4),'-',SUBSTR(FECHAEMISION,4,2),'-',SUBSTR(FECHAEMISION,1,2)) AS FECHA, CONCAT(ESTAB,'-',PTOEMI,'-',SECUENCIAL) AS NUMDOC, VALORADICIONAL6 AS FORMA_PAGO, IMPORTETOTAL AS DEBE, 0 AS HABER FROM orden_trabajo WHERE VALORADICIONAL6='' AND RUC='" . $_SESSION['v_docum_emisor'] . "' AND SECUENCIAL=" . $_SESSION['v_docum_secuen'] . "   UNION   SELECT 'C' AS TIPO, C.cobfecha AS FECHA, D.cobnumero AS NUMDOC, CASE WHEN C.cobvalefec>0 THEN 'EFECTIVO' WHEN C.cobvalcheq>0 THEN 'CHEQUE' WHEN C.cobvaltarjcred>0 THEN 'TARJETA DE CR�DITO' WHEN C.cobvaltransf>0 THEN 'TRANSFERENCIA BANCARIA' WHEN C.cobvalretfte>0 THEN 'RETENCI�N FTE.' ELSE 'N/A' END AS FORMA_PAGO, 0 AS DEBE, D.decvalabono AS HABER FROM cobros C, detalle_cobro D WHERE D.cxctipodoc='O' AND C.cobnumero=D.cobnumero AND C.emiruc=D.cobemiruc AND C.cobanula=0 AND C.emiruc='" . $_SESSION['v_docum_emisor'] . "' AND SUBSTR(D.cxcnumdoc,3)=" . $_SESSION['v_docum_secuen'] . "  ) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT TIPO, FECHA, NUMDOC, FORMA_PAGO, DEBE, HABER from (SELECT 'O' AS TIPO, CONCAT(SUBSTR(FECHAEMISION,7,4),'-',SUBSTR(FECHAEMISION,4,2),'-',SUBSTR(FECHAEMISION,1,2)) AS FECHA, CONCAT(ESTAB,'-',PTOEMI,'-',SECUENCIAL) AS NUMDOC, '' AS FORMA_PAGO, IMPORTETOTAL AS DEBE, 0 AS HABER FROM orden_trabajo WHERE VALORADICIONAL6<>'' AND RUC='" . $_SESSION['v_docum_emisor'] . "' AND SECUENCIAL=" . $_SESSION['v_docum_secuen'] . "   UNION  SELECT 'O' AS TIPO, CONCAT(SUBSTR(FECHAEMISION,7,4),'-',SUBSTR(FECHAEMISION,4,2),'-',SUBSTR(FECHAEMISION,1,2)) AS FECHA, CONCAT(ESTAB,'-',PTOEMI,'-',SECUENCIAL) AS NUMDOC, VALORADICIONAL6 AS FORMA_PAGO, 0 AS DEBE, IMPORTETOTAL AS HABER FROM orden_trabajo WHERE VALORADICIONAL6<>'' AND RUC='" . $_SESSION['v_docum_emisor'] . "' AND SECUENCIAL=" . $_SESSION['v_docum_secuen'] . "  UNION  SELECT 'O' AS TIPO, CONCAT(SUBSTR(FECHAEMISION,7,4),'-',SUBSTR(FECHAEMISION,4,2),'-',SUBSTR(FECHAEMISION,1,2)) AS FECHA, CONCAT(ESTAB,'-',PTOEMI,'-',SECUENCIAL) AS NUMDOC, VALORADICIONAL6 AS FORMA_PAGO, IMPORTETOTAL AS DEBE, 0 AS HABER FROM orden_trabajo WHERE VALORADICIONAL6='' AND RUC='" . $_SESSION['v_docum_emisor'] . "' AND SECUENCIAL=" . $_SESSION['v_docum_secuen'] . "   UNION   SELECT 'C' AS TIPO, C.cobfecha AS FECHA, D.cobnumero AS NUMDOC, CASE WHEN C.cobvalefec>0 THEN 'EFECTIVO' WHEN C.cobvalcheq>0 THEN 'CHEQUE' WHEN C.cobvaltarjcred>0 THEN 'TARJETA DE CR�DITO' WHEN C.cobvaltransf>0 THEN 'TRANSFERENCIA BANCARIA' WHEN C.cobvalretfte>0 THEN 'RETENCI�N FTE.' ELSE 'N/A' END AS FORMA_PAGO, 0 AS DEBE, D.decvalabono AS HABER FROM cobros C, detalle_cobro D WHERE D.cxctipodoc='O' AND C.cobnumero=D.cobnumero AND C.emiruc=D.cobemiruc AND C.cobanula=0 AND C.emiruc='" . $_SESSION['v_docum_emisor'] . "' AND SUBSTR(D.cxcnumdoc,3)=" . $_SESSION['v_docum_secuen'] . "  ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->SC_seq_register = 0;
      $prim_reg = true;
      $prim_gb  = true;
      $nm_houve_quebra = "N";
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         $prim_reg = false;
         $this->Xls_col = 0;
         $this->Xls_row++;
         $this->tipo = $rs->fields[0] ;  
         $this->fecha = $rs->fields[1] ;  
         $this->numdoc = $rs->fields[2] ;  
         $this->forma_pago = $rs->fields[3] ;  
         $this->debe = $rs->fields[4] ;  
         $this->debe =  str_replace(",", ".", $this->debe);
         $this->debe = (strpos(strtolower($this->debe), "e")) ? (float)$this->debe : $this->debe; 
         $this->debe = (string)$this->debe;
         $this->haber = $rs->fields[5] ;  
         $this->haber =  str_replace(",", ".", $this->haber);
         $this->haber = (strpos(strtolower($this->haber), "e")) ? (float)$this->haber : $this->haber; 
         $this->haber = (string)$this->haber;
     if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['embutida'])
     { 
         if ($prim_gb)
         {
             $this->count_span = 0;
             $this->proc_label();
             $this->xls_sub_cons_copy_label($this->Xls_row);
             $this->Xls_row++;
         }
     }
     elseif ($prim_gb)
     {
         $this->count_span = 0;
         $this->proc_label();
     }
     $prim_gb = false;
     $nm_houve_quebra = "N";
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_ABONO_ORDENTRA']['contr_erro'] = 'on';
if (!isset($_SESSION['v_saldo_doc'])) {$_SESSION['v_saldo_doc'] = "";}
if (!isset($this->sc_temp_v_saldo_doc)) {$this->sc_temp_v_saldo_doc = (isset($_SESSION['v_saldo_doc'])) ? $_SESSION['v_saldo_doc'] : "";}
if (!isset($_SESSION['v_numfila_doc'])) {$_SESSION['v_numfila_doc'] = "";}
if (!isset($this->sc_temp_v_numfila_doc)) {$this->sc_temp_v_numfila_doc = (isset($_SESSION['v_numfila_doc'])) ? $_SESSION['v_numfila_doc'] : "";}
 $this->sc_temp_v_numfila_doc=$this->sc_temp_v_numfila_doc+1;

if($this->sc_temp_v_numfila_doc==1) {

	$this->saldo =$this->debe ;
	$this->sc_temp_v_saldo_doc=$this->debe ;
	
}

else {
	
	$this->sc_temp_v_saldo_doc=$this->sc_temp_v_saldo_doc-$this->haber ;
	$this->saldo =$this->sc_temp_v_saldo_doc;
	
}
if (isset($this->sc_temp_v_numfila_doc)) {$_SESSION['v_numfila_doc'] = $this->sc_temp_v_numfila_doc;}
if (isset($this->sc_temp_v_saldo_doc)) {$_SESSION['v_saldo_doc'] = $this->sc_temp_v_saldo_doc;}
$_SESSION['scriptcase']['grid_ABONO_ORDENTRA']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['embutida'])
                { 
                    $NM_func_exp = "NM_sub_cons_" . $Cada_col;
                    $this->$NM_func_exp();
                } 
                else 
                { 
                    $NM_func_exp = "NM_export_" . $Cada_col;
                    $this->$NM_func_exp();
                } 
            } 
         } 
         if (isset($this->NM_Row_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['embutida'])
         { 
             foreach ($this->NM_Row_din as $row => $height) 
             { 
                 $this->Nm_ActiveSheet->getRowDimension($row)->setRowHeight($height);
             } 
         } 
         $rs->MoveNext();
      }
      $this->xls_set_style();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['embutida'] && $prim_reg)
      { 
          $this->proc_label();
          $this->xls_sub_cons_copy_label($this->Xls_row);
          $nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
          $nm_grid_sem_reg  = NM_charset_to_utf8($nm_grid_sem_reg);
          $this->Xls_row++;
          $this->arr_export['lines'][$this->Xls_row][1]['data']   = $nm_grid_sem_reg;
          $this->arr_export['lines'][$this->Xls_row][1]['align']  = "right";
          $this->arr_export['lines'][$this->Xls_row][1]['type']   = "char";
          $this->arr_export['lines'][$this->Xls_row][1]['format'] = "";
      }
      if (isset($this->NM_Col_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['embutida'])
      { 
          foreach ($this->NM_Col_din as $col => $width)
          { 
              $this->Nm_ActiveSheet->getColumnDimension($col)->setWidth($width / 5);
          } 
      } 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['embutida'])
      { 
          if ($this->Use_phpspreadsheet) {
              if ($this->Xls_tp == ".xlsx") {
                  $objWriter = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($this->Xls_dados);
              } 
              else {
                  $objWriter = new PhpOffice\PhpSpreadsheet\Writer\Xls($this->Xls_dados);
              } 
          } 
          else {
              if ($this->Xls_tp == ".xlsx") {
                  $objWriter = new PHPExcel_Writer_Excel2007($this->Xls_dados);
              } 
              else {
                  $objWriter = new PHPExcel_Writer_Excel5($this->Xls_dados);
              } 
          } 
          $objWriter->save($this->Xls_f);
      } 
      else 
      { 
          $_SESSION['scriptcase']['export_return'] = $this->arr_export;
      } 
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   function proc_label()
   { 
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['tipo'])) ? $this->New_label['tipo'] : "TIPO DOC."; 
          if ($Cada_col == "tipo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['fecha'])) ? $this->New_label['fecha'] : "FECHA"; 
          if ($Cada_col == "fecha" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['numdoc'])) ? $this->New_label['numdoc'] : "No. DOC."; 
          if ($Cada_col == "numdoc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['forma_pago'])) ? $this->New_label['forma_pago'] : "FORMA PAGO"; 
          if ($Cada_col == "forma_pago" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['debe'])) ? $this->New_label['debe'] : "DEBE"; 
          if ($Cada_col == "debe" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['haber'])) ? $this->New_label['haber'] : "HABER"; 
          if ($Cada_col == "haber" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['saldo'])) ? $this->New_label['saldo'] : "SALDO"; 
          if ($Cada_col == "saldo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
      } 
      $this->Xls_col = 0;
      $this->Xls_row++;
   } 
   //----- tipo
   function NM_export_tipo()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->tipo = html_entity_decode($this->tipo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tipo = strip_tags($this->tipo);
         $this->tipo = NM_charset_to_utf8($this->tipo);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->tipo, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->tipo, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- fecha
   function NM_export_fecha()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->fecha = html_entity_decode($this->fecha, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->fecha = strip_tags($this->fecha);
         $this->fecha = NM_charset_to_utf8($this->fecha);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->fecha, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->fecha, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- numdoc
   function NM_export_numdoc()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->numdoc = html_entity_decode($this->numdoc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->numdoc = strip_tags($this->numdoc);
         $this->numdoc = NM_charset_to_utf8($this->numdoc);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->numdoc, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->numdoc, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- forma_pago
   function NM_export_forma_pago()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->forma_pago = html_entity_decode($this->forma_pago, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->forma_pago = strip_tags($this->forma_pago);
         $this->forma_pago = NM_charset_to_utf8($this->forma_pago);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->forma_pago, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->forma_pago, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- debe
   function NM_export_debe()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->debe = NM_charset_to_utf8($this->debe);
         if (is_numeric($this->debe))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->debe);
         $this->Xls_col++;
   }
   //----- haber
   function NM_export_haber()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->haber = NM_charset_to_utf8($this->haber);
         if (is_numeric($this->haber))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->haber);
         $this->Xls_col++;
   }
   //----- saldo
   function NM_export_saldo()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->saldo = NM_charset_to_utf8($this->saldo);
         if (is_numeric($this->saldo))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->saldo);
         $this->Xls_col++;
   }
   //----- tipo
   function NM_sub_cons_tipo()
   {
         $this->tipo = html_entity_decode($this->tipo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tipo = strip_tags($this->tipo);
         $this->tipo = NM_charset_to_utf8($this->tipo);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->tipo;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- fecha
   function NM_sub_cons_fecha()
   {
         $this->fecha = html_entity_decode($this->fecha, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->fecha = strip_tags($this->fecha);
         $this->fecha = NM_charset_to_utf8($this->fecha);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->fecha;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- numdoc
   function NM_sub_cons_numdoc()
   {
         $this->numdoc = html_entity_decode($this->numdoc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->numdoc = strip_tags($this->numdoc);
         $this->numdoc = NM_charset_to_utf8($this->numdoc);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->numdoc;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- forma_pago
   function NM_sub_cons_forma_pago()
   {
         $this->forma_pago = html_entity_decode($this->forma_pago, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->forma_pago = strip_tags($this->forma_pago);
         $this->forma_pago = NM_charset_to_utf8($this->forma_pago);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->forma_pago;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- debe
   function NM_sub_cons_debe()
   {
         $this->debe = NM_charset_to_utf8($this->debe);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->debe;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   //----- haber
   function NM_sub_cons_haber()
   {
         $this->haber = NM_charset_to_utf8($this->haber);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->haber;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   //----- saldo
   function NM_sub_cons_saldo()
   {
         $this->saldo = NM_charset_to_utf8($this->saldo);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->saldo;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   function xls_sub_cons_copy_label($row)
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['nolabel']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['nolabel'])
       {
           foreach ($this->arr_export['label'] as $col => $dados)
           {
               $this->arr_export['lines'][$row][$col] = $dados;
           }
       }
   }
   function xls_set_style()
   {
       if (!empty($this->NM_ctrl_style))
       {
           foreach ($this->NM_ctrl_style as $col => $dados)
           {
               $cell_ref = $col . $dados['ini'] . ":" . $col . $dados['end'];
               if ($this->Use_phpspreadsheet) {
                   if ($dados['align'] == "LEFT") {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                   }
                   elseif ($dados['align'] == "RIGHT") {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                   }
               }
               else {
                   if ($dados['align'] == "LEFT") {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                   }
                   elseif ($dados['align'] == "RIGHT") {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                   }
               }
               if (isset($dados['format'])) {
                   $this->Nm_ActiveSheet->getStyle($cell_ref)->getNumberFormat()->setFormatCode($dados['format']);
               }
           }
           $this->NM_ctrl_style = array();
       }
   }

   function calc_cell($col)
   {
       $arr_alfa = array("","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
       $val_ret = "";
       $result = $col + 1;
       while ($result > 26)
       {
           $cel      = $result % 26;
           $result   = $result / 26;
           if ($cel == 0)
           {
               $cel    = 26;
               $result--;
           }
           $val_ret = $arr_alfa[$cel] . $val_ret;
       }
       $val_ret = $arr_alfa[$result] . $val_ret;
       return $val_ret;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?>  :: Excel</TITLE>
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
   <td class="scExportTitle" style="height: 25px">XLS</td>
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
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_ABONO_ORDENTRA_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_ABONO_ORDENTRA"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ABONO_ORDENTRA']['xls_return']); ?>"> 
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
