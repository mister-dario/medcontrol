<?php

class grid_ventas_xls
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
   var $count_ger;
   var $sum_total;
   var $sum_efectivo;
   var $sum_cheque;
   var $sum_tarjeta;
   var $sum_transferencia;
   var $sum_retfte;
   //---- 
   function __construct()
   {
   }

   //---- 
   function monta_xls()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['embutida']) {
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['opcao'] = "";
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
                   nm_limpa_str_grid_ventas($cadapar[1]);
                   nm_protect_num_grid_ventas($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_ventas']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($v_ruc)) 
      {
          $_SESSION['v_ruc'] = $v_ruc;
          nm_limpa_str_grid_ventas($_SESSION["v_ruc"]);
      }
      if (isset($v_fecha_ini)) 
      {
          $_SESSION['v_fecha_ini'] = $v_fecha_ini;
          nm_limpa_str_grid_ventas($_SESSION["v_fecha_ini"]);
      }
      if (isset($v_fecha_fin)) 
      {
          $_SESSION['v_fecha_fin'] = $v_fecha_fin;
          nm_limpa_str_grid_ventas($_SESSION["v_fecha_fin"]);
      }
      if (isset($v_filtros)) 
      {
          $_SESSION['v_filtros'] = $v_filtros;
          nm_limpa_str_grid_ventas($_SESSION["v_filtros"]);
      }
      $this->Use_phpspreadsheet = (phpversion() >=  "7.3.9" && is_dir($this->Ini->path_third . '/phpspreadsheet')) ? true : false;
      $this->Xls_tot_col = 0;
      $this->Xls_row     = 0;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['embutida'])
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['embutida'])
      { 
          $this->Arquivo    = "sc_xls";
          $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
          $this->Arq_zip    = $this->Arquivo . "_grid_ventas.zip";
          $this->Arquivo   .= "_grid_ventas" . $this->Xls_tp;
          $this->Tit_doc    = "grid_ventas" . $this->Xls_tp;
          $this->Tit_zip    = "grid_ventas.zip";
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
      require_once($this->Ini->path_aplicacao . "grid_ventas_total.class.php"); 
      $this->Tot = new grid_ventas_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['SC_Ind_Groupby'];
      $this->Tot->$Gb_geral();
      $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['tot_geral'][1];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['SC_Ind_Groupby'] == "sc_free_total")
      {
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['tot_geral'][2];
          $this->sum_efectivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['tot_geral'][3];
          $this->sum_cheque = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['tot_geral'][4];
          $this->sum_tarjeta = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['tot_geral'][5];
          $this->sum_transferencia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['tot_geral'][6];
          $this->sum_retfte = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['tot_geral'][7];
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
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_ventas']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_ventas']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_ventas']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['field_order'] as $Cada_cmp)
      {
          if (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
          {
              $this->Xls_tot_col++;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['campos_busca'];
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
          $this->numero = $Busca_temp['numero']; 
          $tmp_pos = strpos($this->numero, "##@@");
          if ($tmp_pos !== false && !is_array($this->numero))
          {
              $this->numero = substr($this->numero, 0, $tmp_pos);
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha))
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['xls_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['xls_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['xls_name'] .= $this->Xls_tp;
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['xls_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['xls_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['xls_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['xls_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['xls_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['xls_name']);
          $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['embutida_label']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['embutida_label'])
      { 
          $this->count_span = 0;
          $this->Xls_row++;
          $this->proc_label();
          $_SESSION['scriptcase']['export_return'] = $this->arr_export;
          return;
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT 'F' AS TIPO, CONCAT(F.ESTAB,'-',F.PTOEMI,'-',F.SECUENCIAL) AS NUMERO, F.IDCOMPRADOR AS IDCLI, F.RAZONSOCIALCOMPRADOR AS NOMCLI, F.VALORADICIONAL4 AS CODPAC, F.VALORADICIONAL5 AS NOMPAC, CONCAT(M.medapellidos,' ',M.mednombres) AS NOMMED, C.cittitulo AS DESCRIPCION, CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2)) AS FECHA, F.facvalefec AS EFECTIVO, F.facvalcheq AS CHEQUE, F.facvaltarjcred AS TARJETA, F.facvaltransf AS TRANSFERENCIA, F.facvalretfte AS RETFTE, F.IMPORTETOTAL AS TOTAL FROM FACTURA F, FACTURA_FLAGS G, cita C, agenda A, medico M WHERE A.medcodigo=M.medcodigo AND C.agesecuen=A.agesecuen AND F.num_cita=C.citid AND F.ESTAB=G.ESTAB AND F.PTOEMI=G.PTOEMI AND F.SECUENCIAL=G.SECUENCIAL AND F.LOTE=G.LOTE AND G.AUTORIZADO<2 AND F.RUC='" . $_SESSION['v_ruc'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))>='" . $_SESSION['v_fecha_ini'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))<='" . $_SESSION['v_fecha_fin'] . "' AND F.VALORADICIONAL7='' " . $_SESSION['v_filtros'] . "  UNION  SELECT 'O' AS TIPO, CONCAT(F.ESTAB,'-',F.PTOEMI,'-',F.SECUENCIAL) AS NUMERO, F.IDCOMPRADOR AS IDCLI, F.RAZONSOCIALCOMPRADOR AS NOMCLI, F.VALORADICIONAL4 AS CODPAC, F.VALORADICIONAL5 AS NOMPAC, CONCAT(M.medapellidos,' ',M.mednombres) AS NOMMED, C.cittitulo AS DESCRIPCION, CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2)) AS FECHA, F.ordvalefec AS EFECTIVO, F.ordvalcheq AS CHEQUE, F.ordvaltarjcred AS TARJETA, F.ordvaltransf AS TRANSFERENCIA, 0 AS RETFTE, F.IMPORTETOTAL AS TOTAL FROM orden_trabajo F, cita C, agenda A, medico M WHERE A.medcodigo=M.medcodigo AND C.agesecuen=A.agesecuen AND F.num_cita=C.citid AND F.RUC='" . $_SESSION['v_ruc'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))>='" . $_SESSION['v_fecha_ini'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))<='" . $_SESSION['v_fecha_fin'] . "' " . $_SESSION['v_filtros'] . "    ) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT TIPO, FECHA, NUMERO, TOTAL, DESCRIPCION, EFECTIVO, CHEQUE, TARJETA, TRANSFERENCIA, RETFTE, NOMCLI, NOMPAC, NOMMED from (SELECT 'F' AS TIPO, CONCAT(F.ESTAB,'-',F.PTOEMI,'-',F.SECUENCIAL) AS NUMERO, F.IDCOMPRADOR AS IDCLI, F.RAZONSOCIALCOMPRADOR AS NOMCLI, F.VALORADICIONAL4 AS CODPAC, F.VALORADICIONAL5 AS NOMPAC, CONCAT(M.medapellidos,' ',M.mednombres) AS NOMMED, C.cittitulo AS DESCRIPCION, CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2)) AS FECHA, F.facvalefec AS EFECTIVO, F.facvalcheq AS CHEQUE, F.facvaltarjcred AS TARJETA, F.facvaltransf AS TRANSFERENCIA, F.facvalretfte AS RETFTE, F.IMPORTETOTAL AS TOTAL FROM FACTURA F, FACTURA_FLAGS G, cita C, agenda A, medico M WHERE A.medcodigo=M.medcodigo AND C.agesecuen=A.agesecuen AND F.num_cita=C.citid AND F.ESTAB=G.ESTAB AND F.PTOEMI=G.PTOEMI AND F.SECUENCIAL=G.SECUENCIAL AND F.LOTE=G.LOTE AND G.AUTORIZADO<2 AND F.RUC='" . $_SESSION['v_ruc'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))>='" . $_SESSION['v_fecha_ini'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))<='" . $_SESSION['v_fecha_fin'] . "' AND F.VALORADICIONAL7='' " . $_SESSION['v_filtros'] . "  UNION  SELECT 'O' AS TIPO, CONCAT(F.ESTAB,'-',F.PTOEMI,'-',F.SECUENCIAL) AS NUMERO, F.IDCOMPRADOR AS IDCLI, F.RAZONSOCIALCOMPRADOR AS NOMCLI, F.VALORADICIONAL4 AS CODPAC, F.VALORADICIONAL5 AS NOMPAC, CONCAT(M.medapellidos,' ',M.mednombres) AS NOMMED, C.cittitulo AS DESCRIPCION, CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2)) AS FECHA, F.ordvalefec AS EFECTIVO, F.ordvalcheq AS CHEQUE, F.ordvaltarjcred AS TARJETA, F.ordvaltransf AS TRANSFERENCIA, 0 AS RETFTE, F.IMPORTETOTAL AS TOTAL FROM orden_trabajo F, cita C, agenda A, medico M WHERE A.medcodigo=M.medcodigo AND C.agesecuen=A.agesecuen AND F.num_cita=C.citid AND F.RUC='" . $_SESSION['v_ruc'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))>='" . $_SESSION['v_fecha_ini'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))<='" . $_SESSION['v_fecha_fin'] . "' " . $_SESSION['v_filtros'] . "    ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT TIPO, FECHA, NUMERO, TOTAL, DESCRIPCION, EFECTIVO, CHEQUE, TARJETA, TRANSFERENCIA, RETFTE, NOMCLI, NOMPAC, NOMMED from (SELECT 'F' AS TIPO, CONCAT(F.ESTAB,'-',F.PTOEMI,'-',F.SECUENCIAL) AS NUMERO, F.IDCOMPRADOR AS IDCLI, F.RAZONSOCIALCOMPRADOR AS NOMCLI, F.VALORADICIONAL4 AS CODPAC, F.VALORADICIONAL5 AS NOMPAC, CONCAT(M.medapellidos,' ',M.mednombres) AS NOMMED, C.cittitulo AS DESCRIPCION, CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2)) AS FECHA, F.facvalefec AS EFECTIVO, F.facvalcheq AS CHEQUE, F.facvaltarjcred AS TARJETA, F.facvaltransf AS TRANSFERENCIA, F.facvalretfte AS RETFTE, F.IMPORTETOTAL AS TOTAL FROM FACTURA F, FACTURA_FLAGS G, cita C, agenda A, medico M WHERE A.medcodigo=M.medcodigo AND C.agesecuen=A.agesecuen AND F.num_cita=C.citid AND F.ESTAB=G.ESTAB AND F.PTOEMI=G.PTOEMI AND F.SECUENCIAL=G.SECUENCIAL AND F.LOTE=G.LOTE AND G.AUTORIZADO<2 AND F.RUC='" . $_SESSION['v_ruc'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))>='" . $_SESSION['v_fecha_ini'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))<='" . $_SESSION['v_fecha_fin'] . "' AND F.VALORADICIONAL7='' " . $_SESSION['v_filtros'] . "  UNION  SELECT 'O' AS TIPO, CONCAT(F.ESTAB,'-',F.PTOEMI,'-',F.SECUENCIAL) AS NUMERO, F.IDCOMPRADOR AS IDCLI, F.RAZONSOCIALCOMPRADOR AS NOMCLI, F.VALORADICIONAL4 AS CODPAC, F.VALORADICIONAL5 AS NOMPAC, CONCAT(M.medapellidos,' ',M.mednombres) AS NOMMED, C.cittitulo AS DESCRIPCION, CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2)) AS FECHA, F.ordvalefec AS EFECTIVO, F.ordvalcheq AS CHEQUE, F.ordvaltarjcred AS TARJETA, F.ordvaltransf AS TRANSFERENCIA, 0 AS RETFTE, F.IMPORTETOTAL AS TOTAL FROM orden_trabajo F, cita C, agenda A, medico M WHERE A.medcodigo=M.medcodigo AND C.agesecuen=A.agesecuen AND F.num_cita=C.citid AND F.RUC='" . $_SESSION['v_ruc'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))>='" . $_SESSION['v_fecha_ini'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))<='" . $_SESSION['v_fecha_fin'] . "' " . $_SESSION['v_filtros'] . "    ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT TIPO, FECHA, NUMERO, TOTAL, DESCRIPCION, EFECTIVO, CHEQUE, TARJETA, TRANSFERENCIA, RETFTE, NOMCLI, NOMPAC, NOMMED from (SELECT 'F' AS TIPO, CONCAT(F.ESTAB,'-',F.PTOEMI,'-',F.SECUENCIAL) AS NUMERO, F.IDCOMPRADOR AS IDCLI, F.RAZONSOCIALCOMPRADOR AS NOMCLI, F.VALORADICIONAL4 AS CODPAC, F.VALORADICIONAL5 AS NOMPAC, CONCAT(M.medapellidos,' ',M.mednombres) AS NOMMED, C.cittitulo AS DESCRIPCION, CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2)) AS FECHA, F.facvalefec AS EFECTIVO, F.facvalcheq AS CHEQUE, F.facvaltarjcred AS TARJETA, F.facvaltransf AS TRANSFERENCIA, F.facvalretfte AS RETFTE, F.IMPORTETOTAL AS TOTAL FROM FACTURA F, FACTURA_FLAGS G, cita C, agenda A, medico M WHERE A.medcodigo=M.medcodigo AND C.agesecuen=A.agesecuen AND F.num_cita=C.citid AND F.ESTAB=G.ESTAB AND F.PTOEMI=G.PTOEMI AND F.SECUENCIAL=G.SECUENCIAL AND F.LOTE=G.LOTE AND G.AUTORIZADO<2 AND F.RUC='" . $_SESSION['v_ruc'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))>='" . $_SESSION['v_fecha_ini'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))<='" . $_SESSION['v_fecha_fin'] . "' AND F.VALORADICIONAL7='' " . $_SESSION['v_filtros'] . "  UNION  SELECT 'O' AS TIPO, CONCAT(F.ESTAB,'-',F.PTOEMI,'-',F.SECUENCIAL) AS NUMERO, F.IDCOMPRADOR AS IDCLI, F.RAZONSOCIALCOMPRADOR AS NOMCLI, F.VALORADICIONAL4 AS CODPAC, F.VALORADICIONAL5 AS NOMPAC, CONCAT(M.medapellidos,' ',M.mednombres) AS NOMMED, C.cittitulo AS DESCRIPCION, CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2)) AS FECHA, F.ordvalefec AS EFECTIVO, F.ordvalcheq AS CHEQUE, F.ordvaltarjcred AS TARJETA, F.ordvaltransf AS TRANSFERENCIA, 0 AS RETFTE, F.IMPORTETOTAL AS TOTAL FROM orden_trabajo F, cita C, agenda A, medico M WHERE A.medcodigo=M.medcodigo AND C.agesecuen=A.agesecuen AND F.num_cita=C.citid AND F.RUC='" . $_SESSION['v_ruc'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))>='" . $_SESSION['v_fecha_ini'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))<='" . $_SESSION['v_fecha_fin'] . "' " . $_SESSION['v_filtros'] . "    ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT TIPO, FECHA, NUMERO, TOTAL, DESCRIPCION, EFECTIVO, CHEQUE, TARJETA, TRANSFERENCIA, RETFTE, NOMCLI, NOMPAC, NOMMED from (SELECT 'F' AS TIPO, CONCAT(F.ESTAB,'-',F.PTOEMI,'-',F.SECUENCIAL) AS NUMERO, F.IDCOMPRADOR AS IDCLI, F.RAZONSOCIALCOMPRADOR AS NOMCLI, F.VALORADICIONAL4 AS CODPAC, F.VALORADICIONAL5 AS NOMPAC, CONCAT(M.medapellidos,' ',M.mednombres) AS NOMMED, C.cittitulo AS DESCRIPCION, CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2)) AS FECHA, F.facvalefec AS EFECTIVO, F.facvalcheq AS CHEQUE, F.facvaltarjcred AS TARJETA, F.facvaltransf AS TRANSFERENCIA, F.facvalretfte AS RETFTE, F.IMPORTETOTAL AS TOTAL FROM FACTURA F, FACTURA_FLAGS G, cita C, agenda A, medico M WHERE A.medcodigo=M.medcodigo AND C.agesecuen=A.agesecuen AND F.num_cita=C.citid AND F.ESTAB=G.ESTAB AND F.PTOEMI=G.PTOEMI AND F.SECUENCIAL=G.SECUENCIAL AND F.LOTE=G.LOTE AND G.AUTORIZADO<2 AND F.RUC='" . $_SESSION['v_ruc'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))>='" . $_SESSION['v_fecha_ini'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))<='" . $_SESSION['v_fecha_fin'] . "' AND F.VALORADICIONAL7='' " . $_SESSION['v_filtros'] . "  UNION  SELECT 'O' AS TIPO, CONCAT(F.ESTAB,'-',F.PTOEMI,'-',F.SECUENCIAL) AS NUMERO, F.IDCOMPRADOR AS IDCLI, F.RAZONSOCIALCOMPRADOR AS NOMCLI, F.VALORADICIONAL4 AS CODPAC, F.VALORADICIONAL5 AS NOMPAC, CONCAT(M.medapellidos,' ',M.mednombres) AS NOMMED, C.cittitulo AS DESCRIPCION, CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2)) AS FECHA, F.ordvalefec AS EFECTIVO, F.ordvalcheq AS CHEQUE, F.ordvaltarjcred AS TARJETA, F.ordvaltransf AS TRANSFERENCIA, 0 AS RETFTE, F.IMPORTETOTAL AS TOTAL FROM orden_trabajo F, cita C, agenda A, medico M WHERE A.medcodigo=M.medcodigo AND C.agesecuen=A.agesecuen AND F.num_cita=C.citid AND F.RUC='" . $_SESSION['v_ruc'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))>='" . $_SESSION['v_fecha_ini'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))<='" . $_SESSION['v_fecha_fin'] . "' " . $_SESSION['v_filtros'] . "    ) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT TIPO, FECHA, NUMERO, TOTAL, DESCRIPCION, EFECTIVO, CHEQUE, TARJETA, TRANSFERENCIA, RETFTE, NOMCLI, NOMPAC, NOMMED from (SELECT 'F' AS TIPO, CONCAT(F.ESTAB,'-',F.PTOEMI,'-',F.SECUENCIAL) AS NUMERO, F.IDCOMPRADOR AS IDCLI, F.RAZONSOCIALCOMPRADOR AS NOMCLI, F.VALORADICIONAL4 AS CODPAC, F.VALORADICIONAL5 AS NOMPAC, CONCAT(M.medapellidos,' ',M.mednombres) AS NOMMED, C.cittitulo AS DESCRIPCION, CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2)) AS FECHA, F.facvalefec AS EFECTIVO, F.facvalcheq AS CHEQUE, F.facvaltarjcred AS TARJETA, F.facvaltransf AS TRANSFERENCIA, F.facvalretfte AS RETFTE, F.IMPORTETOTAL AS TOTAL FROM FACTURA F, FACTURA_FLAGS G, cita C, agenda A, medico M WHERE A.medcodigo=M.medcodigo AND C.agesecuen=A.agesecuen AND F.num_cita=C.citid AND F.ESTAB=G.ESTAB AND F.PTOEMI=G.PTOEMI AND F.SECUENCIAL=G.SECUENCIAL AND F.LOTE=G.LOTE AND G.AUTORIZADO<2 AND F.RUC='" . $_SESSION['v_ruc'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))>='" . $_SESSION['v_fecha_ini'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))<='" . $_SESSION['v_fecha_fin'] . "' AND F.VALORADICIONAL7='' " . $_SESSION['v_filtros'] . "  UNION  SELECT 'O' AS TIPO, CONCAT(F.ESTAB,'-',F.PTOEMI,'-',F.SECUENCIAL) AS NUMERO, F.IDCOMPRADOR AS IDCLI, F.RAZONSOCIALCOMPRADOR AS NOMCLI, F.VALORADICIONAL4 AS CODPAC, F.VALORADICIONAL5 AS NOMPAC, CONCAT(M.medapellidos,' ',M.mednombres) AS NOMMED, C.cittitulo AS DESCRIPCION, CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2)) AS FECHA, F.ordvalefec AS EFECTIVO, F.ordvalcheq AS CHEQUE, F.ordvaltarjcred AS TARJETA, F.ordvaltransf AS TRANSFERENCIA, 0 AS RETFTE, F.IMPORTETOTAL AS TOTAL FROM orden_trabajo F, cita C, agenda A, medico M WHERE A.medcodigo=M.medcodigo AND C.agesecuen=A.agesecuen AND F.num_cita=C.citid AND F.RUC='" . $_SESSION['v_ruc'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))>='" . $_SESSION['v_fecha_ini'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))<='" . $_SESSION['v_fecha_fin'] . "' " . $_SESSION['v_filtros'] . "    ) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT TIPO, FECHA, NUMERO, TOTAL, DESCRIPCION, EFECTIVO, CHEQUE, TARJETA, TRANSFERENCIA, RETFTE, NOMCLI, NOMPAC, NOMMED from (SELECT 'F' AS TIPO, CONCAT(F.ESTAB,'-',F.PTOEMI,'-',F.SECUENCIAL) AS NUMERO, F.IDCOMPRADOR AS IDCLI, F.RAZONSOCIALCOMPRADOR AS NOMCLI, F.VALORADICIONAL4 AS CODPAC, F.VALORADICIONAL5 AS NOMPAC, CONCAT(M.medapellidos,' ',M.mednombres) AS NOMMED, C.cittitulo AS DESCRIPCION, CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2)) AS FECHA, F.facvalefec AS EFECTIVO, F.facvalcheq AS CHEQUE, F.facvaltarjcred AS TARJETA, F.facvaltransf AS TRANSFERENCIA, F.facvalretfte AS RETFTE, F.IMPORTETOTAL AS TOTAL FROM FACTURA F, FACTURA_FLAGS G, cita C, agenda A, medico M WHERE A.medcodigo=M.medcodigo AND C.agesecuen=A.agesecuen AND F.num_cita=C.citid AND F.ESTAB=G.ESTAB AND F.PTOEMI=G.PTOEMI AND F.SECUENCIAL=G.SECUENCIAL AND F.LOTE=G.LOTE AND G.AUTORIZADO<2 AND F.RUC='" . $_SESSION['v_ruc'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))>='" . $_SESSION['v_fecha_ini'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))<='" . $_SESSION['v_fecha_fin'] . "' AND F.VALORADICIONAL7='' " . $_SESSION['v_filtros'] . "  UNION  SELECT 'O' AS TIPO, CONCAT(F.ESTAB,'-',F.PTOEMI,'-',F.SECUENCIAL) AS NUMERO, F.IDCOMPRADOR AS IDCLI, F.RAZONSOCIALCOMPRADOR AS NOMCLI, F.VALORADICIONAL4 AS CODPAC, F.VALORADICIONAL5 AS NOMPAC, CONCAT(M.medapellidos,' ',M.mednombres) AS NOMMED, C.cittitulo AS DESCRIPCION, CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2)) AS FECHA, F.ordvalefec AS EFECTIVO, F.ordvalcheq AS CHEQUE, F.ordvaltarjcred AS TARJETA, F.ordvaltransf AS TRANSFERENCIA, 0 AS RETFTE, F.IMPORTETOTAL AS TOTAL FROM orden_trabajo F, cita C, agenda A, medico M WHERE A.medcodigo=M.medcodigo AND C.agesecuen=A.agesecuen AND F.num_cita=C.citid AND F.RUC='" . $_SESSION['v_ruc'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))>='" . $_SESSION['v_fecha_ini'] . "' AND CONCAT(SUBSTRING(F.FECHAEMISION,7,4),'-',SUBSTRING(F.FECHAEMISION,4,2),'-',SUBSTRING(F.FECHAEMISION,1,2))<='" . $_SESSION['v_fecha_fin'] . "' " . $_SESSION['v_filtros'] . "    ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['order_grid'];
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
         $this->numero = $rs->fields[2] ;  
         $this->total = $rs->fields[3] ;  
         $this->total =  str_replace(",", ".", $this->total);
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;
         $this->descripcion = $rs->fields[4] ;  
         $this->efectivo = $rs->fields[5] ;  
         $this->efectivo =  str_replace(",", ".", $this->efectivo);
         $this->efectivo = (strpos(strtolower($this->efectivo), "e")) ? (float)$this->efectivo : $this->efectivo; 
         $this->efectivo = (string)$this->efectivo;
         $this->cheque = $rs->fields[6] ;  
         $this->cheque =  str_replace(",", ".", $this->cheque);
         $this->cheque = (strpos(strtolower($this->cheque), "e")) ? (float)$this->cheque : $this->cheque; 
         $this->cheque = (string)$this->cheque;
         $this->tarjeta = $rs->fields[7] ;  
         $this->tarjeta =  str_replace(",", ".", $this->tarjeta);
         $this->tarjeta = (strpos(strtolower($this->tarjeta), "e")) ? (float)$this->tarjeta : $this->tarjeta; 
         $this->tarjeta = (string)$this->tarjeta;
         $this->transferencia = $rs->fields[8] ;  
         $this->transferencia =  str_replace(",", ".", $this->transferencia);
         $this->transferencia = (strpos(strtolower($this->transferencia), "e")) ? (float)$this->transferencia : $this->transferencia; 
         $this->transferencia = (string)$this->transferencia;
         $this->retfte = $rs->fields[9] ;  
         $this->retfte =  str_replace(",", ".", $this->retfte);
         $this->retfte = (strpos(strtolower($this->retfte), "e")) ? (float)$this->retfte : $this->retfte; 
         $this->retfte = (string)$this->retfte;
         $this->nomcli = $rs->fields[10] ;  
         $this->nompac = $rs->fields[11] ;  
         $this->nommed = $rs->fields[12] ;  
     if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['embutida'])
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
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['embutida'])
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
         if (isset($this->NM_Row_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['embutida'])
         { 
             foreach ($this->NM_Row_din as $row => $height) 
             { 
                 $this->Nm_ActiveSheet->getRowDimension($row)->setRowHeight($height);
             } 
         } 
         $rs->MoveNext();
      }
      $this->xls_set_style();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['embutida'] && $prim_reg)
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
      if (isset($this->NM_Col_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['embutida'])
      { 
          foreach ($this->NM_Col_din as $col => $width)
          { 
              $this->Nm_ActiveSheet->getColumnDimension($col)->setWidth($width / 5);
          } 
      } 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['embutida'])
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   function proc_label()
   { 
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['tipo'])) ? $this->New_label['tipo'] : "TIPO"; 
          if ($Cada_col == "tipo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['embutida'])
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
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['embutida'])
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
          $SC_Label = (isset($this->New_label['numero'])) ? $this->New_label['numero'] : "N�MERO"; 
          if ($Cada_col == "numero" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['embutida'])
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
          $SC_Label = (isset($this->New_label['total'])) ? $this->New_label['total'] : "TOTAL"; 
          if ($Cada_col == "total" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['embutida'])
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
          $SC_Label = (isset($this->New_label['descripcion'])) ? $this->New_label['descripcion'] : "DESCRIPCI�N"; 
          if ($Cada_col == "descripcion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['embutida'])
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
          $SC_Label = (isset($this->New_label['efectivo'])) ? $this->New_label['efectivo'] : "EFECTIVO"; 
          if ($Cada_col == "efectivo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['embutida'])
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
          $SC_Label = (isset($this->New_label['cheque'])) ? $this->New_label['cheque'] : "CHEQUE"; 
          if ($Cada_col == "cheque" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['embutida'])
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
          $SC_Label = (isset($this->New_label['tarjeta'])) ? $this->New_label['tarjeta'] : "TARJETA"; 
          if ($Cada_col == "tarjeta" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['embutida'])
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
          $SC_Label = (isset($this->New_label['transferencia'])) ? $this->New_label['transferencia'] : "TRANSFERENCIA"; 
          if ($Cada_col == "transferencia" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['embutida'])
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
          $SC_Label = (isset($this->New_label['retfte'])) ? $this->New_label['retfte'] : "RET. FUENTE"; 
          if ($Cada_col == "retfte" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['embutida'])
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
          $SC_Label = (isset($this->New_label['nomcli'])) ? $this->New_label['nomcli'] : "CLIENTE"; 
          if ($Cada_col == "nomcli" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['embutida'])
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
          $SC_Label = (isset($this->New_label['nompac'])) ? $this->New_label['nompac'] : "PACIENTE"; 
          if ($Cada_col == "nompac" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['embutida'])
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
          $SC_Label = (isset($this->New_label['nommed'])) ? $this->New_label['nommed'] : "M�DICO"; 
          if ($Cada_col == "nommed" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['embutida'])
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
      if (!empty($this->fecha))
      {
             $conteudo_x =  $this->fecha;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && $conteudo_x > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha, "YYYY-MM-DD");
                 $this->fecha = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
      }
         $this->fecha = NM_charset_to_utf8($this->fecha);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->fecha, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->fecha, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- numero
   function NM_export_numero()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->numero = html_entity_decode($this->numero, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->numero = strip_tags($this->numero);
         $this->numero = NM_charset_to_utf8($this->numero);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->numero, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->numero, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- total
   function NM_export_total()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->total = NM_charset_to_utf8($this->total);
         if (is_numeric($this->total))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->total);
         $this->Xls_col++;
   }
   //----- descripcion
   function NM_export_descripcion()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->descripcion = html_entity_decode($this->descripcion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->descripcion = strip_tags($this->descripcion);
         $this->descripcion = NM_charset_to_utf8($this->descripcion);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->descripcion, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->descripcion, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- efectivo
   function NM_export_efectivo()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->efectivo = NM_charset_to_utf8($this->efectivo);
         if (is_numeric($this->efectivo))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->efectivo);
         $this->Xls_col++;
   }
   //----- cheque
   function NM_export_cheque()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->cheque = NM_charset_to_utf8($this->cheque);
         if (is_numeric($this->cheque))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->cheque);
         $this->Xls_col++;
   }
   //----- tarjeta
   function NM_export_tarjeta()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->tarjeta = NM_charset_to_utf8($this->tarjeta);
         if (is_numeric($this->tarjeta))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->tarjeta);
         $this->Xls_col++;
   }
   //----- transferencia
   function NM_export_transferencia()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->transferencia = NM_charset_to_utf8($this->transferencia);
         if (is_numeric($this->transferencia))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->transferencia);
         $this->Xls_col++;
   }
   //----- retfte
   function NM_export_retfte()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->retfte = NM_charset_to_utf8($this->retfte);
         if (is_numeric($this->retfte))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->retfte);
         $this->Xls_col++;
   }
   //----- nomcli
   function NM_export_nomcli()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->nomcli = html_entity_decode($this->nomcli, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nomcli = strip_tags($this->nomcli);
         $this->nomcli = NM_charset_to_utf8($this->nomcli);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->nomcli, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->nomcli, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- nompac
   function NM_export_nompac()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->nompac = html_entity_decode($this->nompac, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nompac = strip_tags($this->nompac);
         $this->nompac = NM_charset_to_utf8($this->nompac);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->nompac, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->nompac, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- nommed
   function NM_export_nommed()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->nommed = html_entity_decode($this->nommed, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nommed = strip_tags($this->nommed);
         $this->nommed = NM_charset_to_utf8($this->nommed);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->nommed, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->nommed, PHPExcel_Cell_DataType::TYPE_STRING);
         }
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
      if (!empty($this->fecha))
      {
         $conteudo_x =  $this->fecha;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->fecha, "YYYY-MM-DD");
             $this->fecha = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
         } 
      }
         $this->fecha = NM_charset_to_utf8($this->fecha);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->fecha;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- numero
   function NM_sub_cons_numero()
   {
         $this->numero = html_entity_decode($this->numero, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->numero = strip_tags($this->numero);
         $this->numero = NM_charset_to_utf8($this->numero);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->numero;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- total
   function NM_sub_cons_total()
   {
         $this->total = NM_charset_to_utf8($this->total);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->total;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   //----- descripcion
   function NM_sub_cons_descripcion()
   {
         $this->descripcion = html_entity_decode($this->descripcion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->descripcion = strip_tags($this->descripcion);
         $this->descripcion = NM_charset_to_utf8($this->descripcion);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->descripcion;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- efectivo
   function NM_sub_cons_efectivo()
   {
         $this->efectivo = NM_charset_to_utf8($this->efectivo);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->efectivo;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   //----- cheque
   function NM_sub_cons_cheque()
   {
         $this->cheque = NM_charset_to_utf8($this->cheque);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->cheque;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   //----- tarjeta
   function NM_sub_cons_tarjeta()
   {
         $this->tarjeta = NM_charset_to_utf8($this->tarjeta);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->tarjeta;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   //----- transferencia
   function NM_sub_cons_transferencia()
   {
         $this->transferencia = NM_charset_to_utf8($this->transferencia);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->transferencia;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   //----- retfte
   function NM_sub_cons_retfte()
   {
         $this->retfte = NM_charset_to_utf8($this->retfte);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->retfte;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   //----- nomcli
   function NM_sub_cons_nomcli()
   {
         $this->nomcli = html_entity_decode($this->nomcli, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nomcli = strip_tags($this->nomcli);
         $this->nomcli = NM_charset_to_utf8($this->nomcli);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->nomcli;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- nompac
   function NM_sub_cons_nompac()
   {
         $this->nompac = html_entity_decode($this->nompac, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nompac = strip_tags($this->nompac);
         $this->nompac = NM_charset_to_utf8($this->nompac);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->nompac;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- nommed
   function NM_sub_cons_nommed()
   {
         $this->nommed = html_entity_decode($this->nommed, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nommed = strip_tags($this->nommed);
         $this->nommed = NM_charset_to_utf8($this->nommed);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->nommed;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   function xls_sub_cons_copy_label($row)
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['nolabel']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['nolabel'])
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas'][$path_doc_md5][1] = $this->Tit_doc;
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
<form name="Fdown" method="get" action="grid_ventas_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_ventas"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas']['xls_return']); ?>"> 
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
