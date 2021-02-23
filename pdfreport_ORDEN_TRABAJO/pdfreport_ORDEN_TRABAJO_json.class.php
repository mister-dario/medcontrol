<?php

class pdfreport_ORDEN_TRABAJO_json
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

   function __construct()
   {
      $this->nm_data = new nm_data("es");
   }

   function monta_json()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['embutida'])
      {
          if ($this->Ini->sc_export_ajax)
          {
              $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Json_f);
              $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
              $Temp = ob_get_clean();
              if ($Temp !== false && trim($Temp) != "")
              {
                  $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
              }
              $result_json = json_encode($this->Arr_result, JSON_UNESCAPED_UNICODE);
              if ($result_json == false)
              {
                  $oJson = new Services_JSON();
                  $result_json = $oJson->encode($this->Arr_result);
              }
              echo $result_json;
              exit;
          }
          else
          {
              $this->progress_bar_end();
          }
      }
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['opcao'] = "";
      }
   }

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
                   nm_limpa_str_pdfreport_ORDEN_TRABAJO($cadapar[1]);
                   nm_protect_num_pdfreport_ORDEN_TRABAJO($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['pdfreport_ORDEN_TRABAJO']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($var_estab)) 
      {
          $_SESSION['var_estab'] = $var_estab;
          nm_limpa_str_pdfreport_ORDEN_TRABAJO($_SESSION["var_estab"]);
      }
      if (isset($var_ptoemi)) 
      {
          $_SESSION['var_ptoemi'] = $var_ptoemi;
          nm_limpa_str_pdfreport_ORDEN_TRABAJO($_SESSION["var_ptoemi"]);
      }
      if (isset($var_secuencial)) 
      {
          $_SESSION['var_secuencial'] = $var_secuencial;
          nm_limpa_str_pdfreport_ORDEN_TRABAJO($_SESSION["var_secuencial"]);
      }
      if (isset($var_lote)) 
      {
          $_SESSION['var_lote'] = $var_lote;
          nm_limpa_str_pdfreport_ORDEN_TRABAJO($_SESSION["var_lote"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->Json_use_label = false;
      $this->Json_format = false;
      $this->Tem_json_res = false;
      $this->Json_password = "";
      if (isset($_REQUEST['nm_json_label']) && !empty($_REQUEST['nm_json_label']))
      {
          $this->Json_use_label = ($_REQUEST['nm_json_label'] == "S") ? true : false;
      }
      if (isset($_REQUEST['nm_json_format']) && !empty($_REQUEST['nm_json_format']))
      {
          $this->Json_format = ($_REQUEST['nm_json_format'] == "S") ? true : false;
      }
      $this->Tem_json_res  = true;
      if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
      { 
          $this->Tem_json_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false) ? true : false;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['SC_Gb_Free_cmp']))
      {
          $this->Tem_json_res  = false;
      }
      if (!is_file($this->Ini->root . $this->Ini->path_link . "pdfreport_ORDEN_TRABAJO/pdfreport_ORDEN_TRABAJO_res_json.class.php"))
      {
          $this->Tem_json_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['json_label']))
      {
          $this->Json_use_label = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['json_label'];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['json_format']))
      {
          $this->Json_format = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['json_format'];
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['pdfreport_ORDEN_TRABAJO']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['json_return']);
          if ($this->Tem_json_res) {
              $PB_plus = intval ($this->count_ger * 0.04);
              $PB_plus = ($PB_plus < 2) ? 2 : $PB_plus;
          }
          else {
              $PB_plus = intval ($this->count_ger * 0.02);
              $PB_plus = ($PB_plus < 1) ? 1 : $PB_plus;
          }
          $PB_tot = $this->count_ger + $PB_plus;
          $this->PB_dif = $PB_tot - $this->count_ger;
          $this->pb->setTotalSteps($PB_tot);
      }
      $this->nm_data = new nm_data("es");
      $this->Arquivo      = "sc_json";
      $this->Arquivo     .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arq_zip      = $this->Arquivo . "_pdfreport_ORDEN_TRABAJO.zip";
      $this->Arquivo     .= "_pdfreport_ORDEN_TRABAJO";
      $this->Arquivo     .= ".json";
      $this->Tit_doc      = "pdfreport_ORDEN_TRABAJO.json";
      $this->Tit_zip      = "pdfreport_ORDEN_TRABAJO.zip";
   }

   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }

   function grava_arquivo()
   {
      global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->valoradicional14 = $Busca_temp['valoradicional14']; 
          $tmp_pos = strpos($this->valoradicional14, "##@@");
          if ($tmp_pos !== false && !is_array($this->valoradicional14))
          {
              $this->valoradicional14 = substr($this->valoradicional14, 0, $tmp_pos);
          }
          $this->razonsocial = $Busca_temp['razonsocial']; 
          $tmp_pos = strpos($this->razonsocial, "##@@");
          if ($tmp_pos !== false && !is_array($this->razonsocial))
          {
              $this->razonsocial = substr($this->razonsocial, 0, $tmp_pos);
          }
          $this->ruc = $Busca_temp['ruc']; 
          $tmp_pos = strpos($this->ruc, "##@@");
          if ($tmp_pos !== false && !is_array($this->ruc))
          {
              $this->ruc = substr($this->ruc, 0, $tmp_pos);
          }
          $this->estab = $Busca_temp['estab']; 
          $tmp_pos = strpos($this->estab, "##@@");
          if ($tmp_pos !== false && !is_array($this->estab))
          {
              $this->estab = substr($this->estab, 0, $tmp_pos);
          }
          $this->ptoemi = $Busca_temp['ptoemi']; 
          $tmp_pos = strpos($this->ptoemi, "##@@");
          if ($tmp_pos !== false && !is_array($this->ptoemi))
          {
              $this->ptoemi = substr($this->ptoemi, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['json_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['json_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['json_name'] .= ".json";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['json_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['json_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['json_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['json_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['json_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['json_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['embutida'])
      { 
          $this->Json_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          $json_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      }
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT RAZONSOCIAL, RUC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, BASE_12, BASE_0, TOTALSINIMPUESTOS, TOTALDESCUENTO, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT RAZONSOCIAL, RUC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, BASE_12, BASE_0, TOTALSINIMPUESTOS, TOTALDESCUENTO, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT RAZONSOCIAL, RUC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, BASE_12, BASE_0, TOTALSINIMPUESTOS, TOTALDESCUENTO, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT RAZONSOCIAL, RUC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, BASE_12, BASE_0, TOTALSINIMPUESTOS, TOTALDESCUENTO, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT RAZONSOCIAL, RUC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, BASE_12, BASE_0, TOTALSINIMPUESTOS, TOTALDESCUENTO, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT RAZONSOCIAL, RUC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, BASE_12, BASE_0, TOTALSINIMPUESTOS, TOTALDESCUENTO, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['order_grid'];
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
      $this->json_registro = array();
      $this->SC_seq_json   = 0;
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->razonsocial = $rs->fields[0] ;  
         $this->ruc = $rs->fields[1] ;  
         $this->estab = $rs->fields[2] ;  
         $this->estab = (string)$this->estab;
         $this->ptoemi = $rs->fields[3] ;  
         $this->ptoemi = (string)$this->ptoemi;
         $this->secuencial = $rs->fields[4] ;  
         $this->secuencial = (string)$this->secuencial;
         $this->lote = $rs->fields[5] ;  
         $this->dirmatriz = $rs->fields[6] ;  
         $this->fechaemision = $rs->fields[7] ;  
         $this->direstablecimiento = $rs->fields[8] ;  
         $this->numcontribuyenteespecial = $rs->fields[9] ;  
         $this->numcontribuyenteespecial = (string)$this->numcontribuyenteespecial;
         $this->obligadocontabilidad = $rs->fields[10] ;  
         $this->guiaremision = $rs->fields[11] ;  
         $this->razonsocialcomprador = $rs->fields[12] ;  
         $this->idcomprador = $rs->fields[13] ;  
         $this->base_12 = $rs->fields[14] ;  
         $this->base_12 = (strpos(strtolower($this->base_12), "e")) ? (float)$this->base_12 : $this->base_12; 
         $this->base_12 = (string)$this->base_12;
         $this->base_0 = $rs->fields[15] ;  
         $this->base_0 = (strpos(strtolower($this->base_0), "e")) ? (float)$this->base_0 : $this->base_0; 
         $this->base_0 = (string)$this->base_0;
         $this->totalsinimpuestos = $rs->fields[16] ;  
         $this->totalsinimpuestos = (strpos(strtolower($this->totalsinimpuestos), "e")) ? (float)$this->totalsinimpuestos : $this->totalsinimpuestos; 
         $this->totalsinimpuestos = (string)$this->totalsinimpuestos;
         $this->totaldescuento = $rs->fields[17] ;  
         $this->totaldescuento = (strpos(strtolower($this->totaldescuento), "e")) ? (float)$this->totaldescuento : $this->totaldescuento; 
         $this->totaldescuento = (string)$this->totaldescuento;
         $this->tarifa1 = $rs->fields[18] ;  
         $this->tarifa1 = (strpos(strtolower($this->tarifa1), "e")) ? (float)$this->tarifa1 : $this->tarifa1; 
         $this->tarifa1 = (string)$this->tarifa1;
         $this->valor1 = $rs->fields[19] ;  
         $this->valor1 = (strpos(strtolower($this->valor1), "e")) ? (float)$this->valor1 : $this->valor1; 
         $this->valor1 = (string)$this->valor1;
         $this->propina = $rs->fields[20] ;  
         $this->propina = (strpos(strtolower($this->propina), "e")) ? (float)$this->propina : $this->propina; 
         $this->propina = (string)$this->propina;
         $this->importetotal = $rs->fields[21] ;  
         $this->importetotal = (strpos(strtolower($this->importetotal), "e")) ? (float)$this->importetotal : $this->importetotal; 
         $this->importetotal = (string)$this->importetotal;
         $this->campoadicional1 = $rs->fields[22] ;  
         $this->valoradicional1 = $rs->fields[23] ;  
         $this->campoadicional2 = $rs->fields[24] ;  
         $this->valoradicional2 = $rs->fields[25] ;  
         $this->campoadicional3 = $rs->fields[26] ;  
         $this->valoradicional3 = $rs->fields[27] ;  
         $this->campoadicional4 = $rs->fields[28] ;  
         $this->valoradicional4 = $rs->fields[29] ;  
         $this->campoadicional5 = $rs->fields[30] ;  
         $this->valoradicional5 = $rs->fields[31] ;  
         $this->campoadicional6 = $rs->fields[32] ;  
         $this->valoradicional6 = $rs->fields[33] ;  
         $this->campoadicional7 = $rs->fields[34] ;  
         $this->valoradicional7 = $rs->fields[35] ;  
         $this->campoadicional8 = $rs->fields[36] ;  
         $this->valoradicional8 = $rs->fields[37] ;  
         $this->campoadicional9 = $rs->fields[38] ;  
         $this->valoradicional9 = $rs->fields[39] ;  
         $this->campoadicional10 = $rs->fields[40] ;  
         $this->valoradicional10 = $rs->fields[41] ;  
         $this->campoadicional11 = $rs->fields[42] ;  
         $this->valoradicional11 = $rs->fields[43] ;  
         $this->campoadicional12 = $rs->fields[44] ;  
         $this->valoradicional12 = $rs->fields[45] ;  
         $this->campoadicional13 = $rs->fields[46] ;  
         $this->valoradicional13 = $rs->fields[47] ;  
         $this->campoadicional14 = $rs->fields[48] ;  
         $this->valoradicional14 = $rs->fields[49] ;  
         $this->campoadicional15 = $rs->fields[50] ;  
         $this->valoradicional15 = $rs->fields[51] ;  
         $this->campoadicional16 = $rs->fields[52] ;  
         $this->valoradicional16 = $rs->fields[53] ;  
         $this->campoadicional17 = $rs->fields[54] ;  
         $this->valoradicional17 = $rs->fields[55] ;  
         $this->campoadicional18 = $rs->fields[56] ;  
         $this->valoradicional18 = $rs->fields[57] ;  
         $this->campoadicional19 = $rs->fields[58] ;  
         $this->valoradicional19 = $rs->fields[59] ;  
         $this->campoadicional20 = $rs->fields[60] ;  
         $this->valoradicional20 = $rs->fields[61] ;  
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['pdfreport_ORDEN_TRABAJO']['contr_erro'] = 'on';
 $this->label_codcliente ="R.U.C.:";
$this->label_nom_cliente ="Cliente:";
$this->label_ruccliente ="RUC/CI:";
$this->label_fecha_emision ="Fecha de emisión:";
$this->label_telfcliente ="Teléfono:";
$this->label_dircliente ="Dirección:";

$this->label_subtotal ="Subtotal";
$this->label_descuento ="Descuento";
$this->label_stexento ="Subtotal 0%";
$this->label_stgravado ="Subtotal ".$this->tarifa1 ."%";
$this->label_iva ="IVA ".$this->tarifa1 ."%";

$this->totalsinimpuestos =$this->totalsinimpuestos +$this->totaldescuento ;
	
$check_sql = "SELECT SUM(VALORICE)"
   . " FROM DETALLE_FACTURA"
   . " WHERE CODIMPICE > 0 AND ESTAB =".$this->estab ." AND PTOEMI=".$this->ptoemi ." AND SECUENCIAL=".$this->secuencial ." AND LOTE='".$this->lote ."'";
 
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

if(isset($this->rs[0][0])) {
	
	$this->ice =$this->rs[0][0];	
}

else {
	
	$this->ice =0;
}
$_SESSION['scriptcase']['pdfreport_ORDEN_TRABAJO']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->SC_seq_json++;
         $rs->MoveNext();
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['embutida'])
      { 
          $_SESSION['scriptcase']['export_return'] = $this->json_registro;
      }
      else
      { 
          $result_json = json_encode($this->json_registro, JSON_UNESCAPED_UNICODE);
          if ($result_json == false)
          {
              $oJson = new Services_JSON();
              $result_json = $oJson->encode($this->json_registro);
          }
          fwrite($json_f, $result_json);
          fclose($json_f);
          if ($this->Tem_json_res)
          { 
              if (!$this->Ini->sc_export_ajax) {
                  $this->PB_dif = intval ($this->PB_dif / 2);
                  $Mens_bar  = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
                  $Mens_smry = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_smry_titl']);
                  $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
                  $this->pb->addSteps($this->PB_dif);
              }
              require_once($this->Ini->path_aplicacao . "pdfreport_ORDEN_TRABAJO_res_json.class.php");
              $this->Res = new pdfreport_ORDEN_TRABAJO_res_json();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['json_res_grid'] = true;
              $this->Res->monta_json();
          } 
          if (!$this->Ini->sc_export_ajax) {
              $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_btns_export_finished']);
              $this->pb->setProgressbarMessage($Mens_bar);
              $this->pb->addSteps($this->PB_dif);
          }
          if ($this->Json_password != "" || $this->Tem_json_res)
          { 
              $str_zip    = "";
              $Parm_pass  = ($this->Json_password != "") ? " -p" : "";
              $Zip_f      = (FALSE !== strpos($this->Zip_f, ' ')) ? " \"" . $this->Zip_f . "\"" :  $this->Zip_f;
              $Arq_input  = (FALSE !== strpos($this->Json_f, ' ')) ? " \"" . $this->Json_f . "\"" :  $this->Json_f;
              if (is_file($Zip_f)) {
                  unlink($Zip_f);
              }
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  chdir($this->Ini->path_third . "/zip/windows");
                  $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Json_password . " " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
              {
                  if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                  {
                      chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                  }
                  else
                  {
                      chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                  }
                  $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  chdir($this->Ini->path_third . "/zip/mac/bin");
                  $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
              }
              if (!empty($str_zip)) {
                  exec($str_zip);
              }
              // ----- ZIP log
              $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'w');
              if ($fp)
              {
                  @fwrite($fp, $str_zip . "\r\n\r\n");
                  @fclose($fp);
              }
              unlink($Arq_input);
              $this->Arquivo = $this->Arq_zip;
              $this->Json_f   = $this->Zip_f;
              $this->Tit_doc = $this->Tit_zip;
              if ($this->Tem_json_res)
              { 
                  $str_zip   = "";
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['json_res_file']['json'];
                  $Arq_input = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
                  if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                  {
                      $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Json_password . " " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  if (!empty($str_zip)) {
                      exec($str_zip);
                  }
                  // ----- ZIP log
                  $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
                  if ($fp)
                  {
                      @fwrite($fp, $str_zip . "\r\n\r\n");
                      @fclose($fp);
                  }
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['json_res_file']['json']);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['json_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- razonsocial
   function NM_export_razonsocial()
   {
         $this->razonsocial = NM_charset_to_utf8($this->razonsocial);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['razonsocial'])) ? $this->New_label['razonsocial'] : "RAZONSOCIAL"; 
         }
         else
         {
             $SC_Label = "razonsocial"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->razonsocial;
   }
   //----- ruc
   function NM_export_ruc()
   {
         $this->ruc = NM_charset_to_utf8($this->ruc);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['ruc'])) ? $this->New_label['ruc'] : "RUC"; 
         }
         else
         {
             $SC_Label = "ruc"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->ruc;
   }
   //----- estab
   function NM_export_estab()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->estab, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['estab'])) ? $this->New_label['estab'] : "ESTAB"; 
         }
         else
         {
             $SC_Label = "estab"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->estab;
   }
   //----- ptoemi
   function NM_export_ptoemi()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->ptoemi, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['ptoemi'])) ? $this->New_label['ptoemi'] : "PTOEMI"; 
         }
         else
         {
             $SC_Label = "ptoemi"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->ptoemi;
   }
   //----- secuencial
   function NM_export_secuencial()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->secuencial, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['secuencial'])) ? $this->New_label['secuencial'] : "SECUENCIAL"; 
         }
         else
         {
             $SC_Label = "secuencial"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->secuencial;
   }
   //----- lote
   function NM_export_lote()
   {
         $this->lote = NM_charset_to_utf8($this->lote);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['lote'])) ? $this->New_label['lote'] : "LOTE"; 
         }
         else
         {
             $SC_Label = "lote"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->lote;
   }
   //----- dirmatriz
   function NM_export_dirmatriz()
   {
         $this->dirmatriz = NM_charset_to_utf8($this->dirmatriz);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['dirmatriz'])) ? $this->New_label['dirmatriz'] : "DIRMATRIZ"; 
         }
         else
         {
             $SC_Label = "dirmatriz"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->dirmatriz;
   }
   //----- fechaemision
   function NM_export_fechaemision()
   {
         $this->fechaemision = NM_charset_to_utf8($this->fechaemision);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['fechaemision'])) ? $this->New_label['fechaemision'] : "FECHAEMISION"; 
         }
         else
         {
             $SC_Label = "fechaemision"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->fechaemision;
   }
   //----- direstablecimiento
   function NM_export_direstablecimiento()
   {
         $this->direstablecimiento = NM_charset_to_utf8($this->direstablecimiento);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['direstablecimiento'])) ? $this->New_label['direstablecimiento'] : "DIRESTABLECIMIENTO"; 
         }
         else
         {
             $SC_Label = "direstablecimiento"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->direstablecimiento;
   }
   //----- numcontribuyenteespecial
   function NM_export_numcontribuyenteespecial()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->numcontribuyenteespecial, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['numcontribuyenteespecial'])) ? $this->New_label['numcontribuyenteespecial'] : "NUMCONTRIBUYENTEESPECIAL"; 
         }
         else
         {
             $SC_Label = "numcontribuyenteespecial"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->numcontribuyenteespecial;
   }
   //----- obligadocontabilidad
   function NM_export_obligadocontabilidad()
   {
         $this->obligadocontabilidad = NM_charset_to_utf8($this->obligadocontabilidad);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['obligadocontabilidad'])) ? $this->New_label['obligadocontabilidad'] : "OBLIGADOCONTABILIDAD"; 
         }
         else
         {
             $SC_Label = "obligadocontabilidad"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->obligadocontabilidad;
   }
   //----- guiaremision
   function NM_export_guiaremision()
   {
         $this->guiaremision = NM_charset_to_utf8($this->guiaremision);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['guiaremision'])) ? $this->New_label['guiaremision'] : "GUIAREMISION"; 
         }
         else
         {
             $SC_Label = "guiaremision"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->guiaremision;
   }
   //----- razonsocialcomprador
   function NM_export_razonsocialcomprador()
   {
         $this->razonsocialcomprador = NM_charset_to_utf8($this->razonsocialcomprador);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['razonsocialcomprador'])) ? $this->New_label['razonsocialcomprador'] : "RAZONSOCIALCOMPRADOR"; 
         }
         else
         {
             $SC_Label = "razonsocialcomprador"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->razonsocialcomprador;
   }
   //----- idcomprador
   function NM_export_idcomprador()
   {
         $this->idcomprador = NM_charset_to_utf8($this->idcomprador);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['idcomprador'])) ? $this->New_label['idcomprador'] : "IDCOMPRADOR"; 
         }
         else
         {
             $SC_Label = "idcomprador"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->idcomprador;
   }
   //----- base_12
   function NM_export_base_12()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->base_12, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['base_12'])) ? $this->New_label['base_12'] : "BASE 12"; 
         }
         else
         {
             $SC_Label = "base_12"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->base_12;
   }
   //----- base_0
   function NM_export_base_0()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->base_0, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['base_0'])) ? $this->New_label['base_0'] : "BASE"; 
         }
         else
         {
             $SC_Label = "base_0"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->base_0;
   }
   //----- totalsinimpuestos
   function NM_export_totalsinimpuestos()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->totalsinimpuestos, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['totalsinimpuestos'])) ? $this->New_label['totalsinimpuestos'] : "TOTALSINIMPUESTOS"; 
         }
         else
         {
             $SC_Label = "totalsinimpuestos"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->totalsinimpuestos;
   }
   //----- totaldescuento
   function NM_export_totaldescuento()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->totaldescuento, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['totaldescuento'])) ? $this->New_label['totaldescuento'] : "TOTALDESCUENTO"; 
         }
         else
         {
             $SC_Label = "totaldescuento"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->totaldescuento;
   }
   //----- tarifa1
   function NM_export_tarifa1()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->tarifa1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['tarifa1'])) ? $this->New_label['tarifa1'] : "TARIFA1"; 
         }
         else
         {
             $SC_Label = "tarifa1"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->tarifa1;
   }
   //----- valor1
   function NM_export_valor1()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->valor1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valor1'])) ? $this->New_label['valor1'] : "VALOR1"; 
         }
         else
         {
             $SC_Label = "valor1"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valor1;
   }
   //----- propina
   function NM_export_propina()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->propina, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['propina'])) ? $this->New_label['propina'] : "PROPINA"; 
         }
         else
         {
             $SC_Label = "propina"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->propina;
   }
   //----- importetotal
   function NM_export_importetotal()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->importetotal, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['importetotal'])) ? $this->New_label['importetotal'] : "IMPORTETOTAL"; 
         }
         else
         {
             $SC_Label = "importetotal"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->importetotal;
   }
   //----- campoadicional1
   function NM_export_campoadicional1()
   {
         $this->campoadicional1 = NM_charset_to_utf8($this->campoadicional1);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['campoadicional1'])) ? $this->New_label['campoadicional1'] : "CAMPOADICIONAL1"; 
         }
         else
         {
             $SC_Label = "campoadicional1"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->campoadicional1;
   }
   //----- valoradicional1
   function NM_export_valoradicional1()
   {
         $this->valoradicional1 = NM_charset_to_utf8($this->valoradicional1);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valoradicional1'])) ? $this->New_label['valoradicional1'] : "VALORADICIONAL1"; 
         }
         else
         {
             $SC_Label = "valoradicional1"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valoradicional1;
   }
   //----- campoadicional2
   function NM_export_campoadicional2()
   {
         $this->campoadicional2 = NM_charset_to_utf8($this->campoadicional2);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['campoadicional2'])) ? $this->New_label['campoadicional2'] : "CAMPOADICIONAL2"; 
         }
         else
         {
             $SC_Label = "campoadicional2"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->campoadicional2;
   }
   //----- valoradicional2
   function NM_export_valoradicional2()
   {
         $this->valoradicional2 = NM_charset_to_utf8($this->valoradicional2);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valoradicional2'])) ? $this->New_label['valoradicional2'] : "VALORADICIONAL2"; 
         }
         else
         {
             $SC_Label = "valoradicional2"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valoradicional2;
   }
   //----- campoadicional3
   function NM_export_campoadicional3()
   {
         $this->campoadicional3 = NM_charset_to_utf8($this->campoadicional3);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['campoadicional3'])) ? $this->New_label['campoadicional3'] : "CAMPOADICIONAL3"; 
         }
         else
         {
             $SC_Label = "campoadicional3"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->campoadicional3;
   }
   //----- valoradicional3
   function NM_export_valoradicional3()
   {
         $this->valoradicional3 = NM_charset_to_utf8($this->valoradicional3);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valoradicional3'])) ? $this->New_label['valoradicional3'] : "VALORADICIONAL3"; 
         }
         else
         {
             $SC_Label = "valoradicional3"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valoradicional3;
   }
   //----- campoadicional4
   function NM_export_campoadicional4()
   {
         $this->campoadicional4 = NM_charset_to_utf8($this->campoadicional4);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['campoadicional4'])) ? $this->New_label['campoadicional4'] : "CAMPOADICIONAL4"; 
         }
         else
         {
             $SC_Label = "campoadicional4"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->campoadicional4;
   }
   //----- valoradicional4
   function NM_export_valoradicional4()
   {
         $this->valoradicional4 = NM_charset_to_utf8($this->valoradicional4);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valoradicional4'])) ? $this->New_label['valoradicional4'] : "VALORADICIONAL4"; 
         }
         else
         {
             $SC_Label = "valoradicional4"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valoradicional4;
   }
   //----- campoadicional5
   function NM_export_campoadicional5()
   {
         $this->campoadicional5 = NM_charset_to_utf8($this->campoadicional5);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['campoadicional5'])) ? $this->New_label['campoadicional5'] : "CAMPOADICIONAL5"; 
         }
         else
         {
             $SC_Label = "campoadicional5"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->campoadicional5;
   }
   //----- valoradicional5
   function NM_export_valoradicional5()
   {
         $this->valoradicional5 = NM_charset_to_utf8($this->valoradicional5);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valoradicional5'])) ? $this->New_label['valoradicional5'] : "VALORADICIONAL5"; 
         }
         else
         {
             $SC_Label = "valoradicional5"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valoradicional5;
   }
   //----- campoadicional6
   function NM_export_campoadicional6()
   {
         $this->campoadicional6 = NM_charset_to_utf8($this->campoadicional6);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['campoadicional6'])) ? $this->New_label['campoadicional6'] : "CAMPOADICIONAL6"; 
         }
         else
         {
             $SC_Label = "campoadicional6"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->campoadicional6;
   }
   //----- valoradicional6
   function NM_export_valoradicional6()
   {
         $this->valoradicional6 = NM_charset_to_utf8($this->valoradicional6);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valoradicional6'])) ? $this->New_label['valoradicional6'] : "VALORADICIONAL6"; 
         }
         else
         {
             $SC_Label = "valoradicional6"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valoradicional6;
   }
   //----- campoadicional7
   function NM_export_campoadicional7()
   {
         $this->campoadicional7 = NM_charset_to_utf8($this->campoadicional7);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['campoadicional7'])) ? $this->New_label['campoadicional7'] : "CAMPOADICIONAL7"; 
         }
         else
         {
             $SC_Label = "campoadicional7"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->campoadicional7;
   }
   //----- valoradicional7
   function NM_export_valoradicional7()
   {
         $this->valoradicional7 = NM_charset_to_utf8($this->valoradicional7);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valoradicional7'])) ? $this->New_label['valoradicional7'] : "VALORADICIONAL7"; 
         }
         else
         {
             $SC_Label = "valoradicional7"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valoradicional7;
   }
   //----- campoadicional8
   function NM_export_campoadicional8()
   {
         $this->campoadicional8 = NM_charset_to_utf8($this->campoadicional8);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['campoadicional8'])) ? $this->New_label['campoadicional8'] : "CAMPOADICIONAL8"; 
         }
         else
         {
             $SC_Label = "campoadicional8"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->campoadicional8;
   }
   //----- valoradicional8
   function NM_export_valoradicional8()
   {
         $this->valoradicional8 = NM_charset_to_utf8($this->valoradicional8);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valoradicional8'])) ? $this->New_label['valoradicional8'] : "VALORADICIONAL8"; 
         }
         else
         {
             $SC_Label = "valoradicional8"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valoradicional8;
   }
   //----- campoadicional9
   function NM_export_campoadicional9()
   {
         $this->campoadicional9 = NM_charset_to_utf8($this->campoadicional9);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['campoadicional9'])) ? $this->New_label['campoadicional9'] : "CAMPOADICIONAL9"; 
         }
         else
         {
             $SC_Label = "campoadicional9"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->campoadicional9;
   }
   //----- valoradicional9
   function NM_export_valoradicional9()
   {
         $this->valoradicional9 = NM_charset_to_utf8($this->valoradicional9);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valoradicional9'])) ? $this->New_label['valoradicional9'] : "VALORADICIONAL9"; 
         }
         else
         {
             $SC_Label = "valoradicional9"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valoradicional9;
   }
   //----- campoadicional10
   function NM_export_campoadicional10()
   {
         $this->campoadicional10 = NM_charset_to_utf8($this->campoadicional10);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['campoadicional10'])) ? $this->New_label['campoadicional10'] : "CAMPOADICIONAL10"; 
         }
         else
         {
             $SC_Label = "campoadicional10"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->campoadicional10;
   }
   //----- valoradicional10
   function NM_export_valoradicional10()
   {
         $this->valoradicional10 = NM_charset_to_utf8($this->valoradicional10);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valoradicional10'])) ? $this->New_label['valoradicional10'] : "VALORADICIONAL10"; 
         }
         else
         {
             $SC_Label = "valoradicional10"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valoradicional10;
   }
   //----- campoadicional11
   function NM_export_campoadicional11()
   {
         $this->campoadicional11 = NM_charset_to_utf8($this->campoadicional11);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['campoadicional11'])) ? $this->New_label['campoadicional11'] : "CAMPOADICIONAL11"; 
         }
         else
         {
             $SC_Label = "campoadicional11"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->campoadicional11;
   }
   //----- valoradicional11
   function NM_export_valoradicional11()
   {
         $this->valoradicional11 = NM_charset_to_utf8($this->valoradicional11);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valoradicional11'])) ? $this->New_label['valoradicional11'] : "VALORADICIONAL11"; 
         }
         else
         {
             $SC_Label = "valoradicional11"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valoradicional11;
   }
   //----- campoadicional12
   function NM_export_campoadicional12()
   {
         $this->campoadicional12 = NM_charset_to_utf8($this->campoadicional12);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['campoadicional12'])) ? $this->New_label['campoadicional12'] : "CAMPOADICIONAL12"; 
         }
         else
         {
             $SC_Label = "campoadicional12"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->campoadicional12;
   }
   //----- valoradicional12
   function NM_export_valoradicional12()
   {
         $this->valoradicional12 = NM_charset_to_utf8($this->valoradicional12);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valoradicional12'])) ? $this->New_label['valoradicional12'] : "VALORADICIONAL12"; 
         }
         else
         {
             $SC_Label = "valoradicional12"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valoradicional12;
   }
   //----- campoadicional13
   function NM_export_campoadicional13()
   {
         $this->campoadicional13 = NM_charset_to_utf8($this->campoadicional13);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['campoadicional13'])) ? $this->New_label['campoadicional13'] : "CAMPOADICIONAL13"; 
         }
         else
         {
             $SC_Label = "campoadicional13"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->campoadicional13;
   }
   //----- valoradicional13
   function NM_export_valoradicional13()
   {
         $this->valoradicional13 = NM_charset_to_utf8($this->valoradicional13);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valoradicional13'])) ? $this->New_label['valoradicional13'] : "VALORADICIONAL13"; 
         }
         else
         {
             $SC_Label = "valoradicional13"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valoradicional13;
   }
   //----- campoadicional14
   function NM_export_campoadicional14()
   {
         $this->campoadicional14 = NM_charset_to_utf8($this->campoadicional14);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['campoadicional14'])) ? $this->New_label['campoadicional14'] : "CAMPOADICIONAL14"; 
         }
         else
         {
             $SC_Label = "campoadicional14"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->campoadicional14;
   }
   //----- valoradicional14
   function NM_export_valoradicional14()
   {
         $this->valoradicional14 = NM_charset_to_utf8($this->valoradicional14);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valoradicional14'])) ? $this->New_label['valoradicional14'] : "VALORADICIONAL14"; 
         }
         else
         {
             $SC_Label = "valoradicional14"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valoradicional14;
   }
   //----- campoadicional15
   function NM_export_campoadicional15()
   {
         $this->campoadicional15 = NM_charset_to_utf8($this->campoadicional15);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['campoadicional15'])) ? $this->New_label['campoadicional15'] : "CAMPOADICIONAL15"; 
         }
         else
         {
             $SC_Label = "campoadicional15"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->campoadicional15;
   }
   //----- valoradicional15
   function NM_export_valoradicional15()
   {
         $this->valoradicional15 = NM_charset_to_utf8($this->valoradicional15);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valoradicional15'])) ? $this->New_label['valoradicional15'] : "VALORADICIONAL15"; 
         }
         else
         {
             $SC_Label = "valoradicional15"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valoradicional15;
   }
   //----- campoadicional16
   function NM_export_campoadicional16()
   {
         $this->campoadicional16 = NM_charset_to_utf8($this->campoadicional16);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['campoadicional16'])) ? $this->New_label['campoadicional16'] : "CAMPOADICIONAL16"; 
         }
         else
         {
             $SC_Label = "campoadicional16"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->campoadicional16;
   }
   //----- valoradicional16
   function NM_export_valoradicional16()
   {
         $this->valoradicional16 = NM_charset_to_utf8($this->valoradicional16);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valoradicional16'])) ? $this->New_label['valoradicional16'] : "VALORADICIONAL16"; 
         }
         else
         {
             $SC_Label = "valoradicional16"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valoradicional16;
   }
   //----- campoadicional17
   function NM_export_campoadicional17()
   {
         $this->campoadicional17 = NM_charset_to_utf8($this->campoadicional17);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['campoadicional17'])) ? $this->New_label['campoadicional17'] : "CAMPOADICIONAL17"; 
         }
         else
         {
             $SC_Label = "campoadicional17"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->campoadicional17;
   }
   //----- valoradicional17
   function NM_export_valoradicional17()
   {
         $this->valoradicional17 = NM_charset_to_utf8($this->valoradicional17);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valoradicional17'])) ? $this->New_label['valoradicional17'] : "VALORADICIONAL17"; 
         }
         else
         {
             $SC_Label = "valoradicional17"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valoradicional17;
   }
   //----- campoadicional18
   function NM_export_campoadicional18()
   {
         $this->campoadicional18 = NM_charset_to_utf8($this->campoadicional18);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['campoadicional18'])) ? $this->New_label['campoadicional18'] : "CAMPOADICIONAL18"; 
         }
         else
         {
             $SC_Label = "campoadicional18"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->campoadicional18;
   }
   //----- valoradicional18
   function NM_export_valoradicional18()
   {
         $this->valoradicional18 = NM_charset_to_utf8($this->valoradicional18);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valoradicional18'])) ? $this->New_label['valoradicional18'] : "VALORADICIONAL18"; 
         }
         else
         {
             $SC_Label = "valoradicional18"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valoradicional18;
   }
   //----- campoadicional19
   function NM_export_campoadicional19()
   {
         $this->campoadicional19 = NM_charset_to_utf8($this->campoadicional19);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['campoadicional19'])) ? $this->New_label['campoadicional19'] : "CAMPOADICIONAL19"; 
         }
         else
         {
             $SC_Label = "campoadicional19"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->campoadicional19;
   }
   //----- valoradicional19
   function NM_export_valoradicional19()
   {
         $this->valoradicional19 = NM_charset_to_utf8($this->valoradicional19);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valoradicional19'])) ? $this->New_label['valoradicional19'] : "VALORADICIONAL19"; 
         }
         else
         {
             $SC_Label = "valoradicional19"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valoradicional19;
   }
   //----- campoadicional20
   function NM_export_campoadicional20()
   {
         $this->campoadicional20 = NM_charset_to_utf8($this->campoadicional20);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['campoadicional20'])) ? $this->New_label['campoadicional20'] : "CAMPOADICIONAL20"; 
         }
         else
         {
             $SC_Label = "campoadicional20"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->campoadicional20;
   }
   //----- valoradicional20
   function NM_export_valoradicional20()
   {
         $this->valoradicional20 = NM_charset_to_utf8($this->valoradicional20);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valoradicional20'])) ? $this->New_label['valoradicional20'] : "VALORADICIONAL20"; 
         }
         else
         {
             $SC_Label = "valoradicional20"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valoradicional20;
   }
   //----- ice
   function NM_export_ice()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->ice, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['ice'])) ? $this->New_label['ice'] : "ICE"; 
         }
         else
         {
             $SC_Label = "ice"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->ice;
   }
   //----- ca_bar
   function NM_export_ca_bar()
   {
         $this->ca_bar = NM_charset_to_utf8($this->ca_bar);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['ca_bar'])) ? $this->New_label['ca_bar'] : "ca_bar"; 
         }
         else
         {
             $SC_Label = "ca_bar"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->ca_bar;
   }
   //----- detalle
   function NM_export_detalle()
   {
         $this->detalle = NM_charset_to_utf8($this->detalle);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detalle'])) ? $this->New_label['detalle'] : "detalle"; 
         }
         else
         {
             $SC_Label = "detalle"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detalle;
   }
   //----- detalle_cantidad
   function NM_export_detalle_cantidad()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->detalle_cantidad, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "1", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detalle_cantidad'])) ? $this->New_label['detalle_cantidad'] : "CANTIDAD"; 
         }
         else
         {
             $SC_Label = "detalle_cantidad"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detalle_cantidad;
   }
   //----- detalle_codigo
   function NM_export_detalle_codigo()
   {
         $this->detalle_codigo = NM_charset_to_utf8($this->detalle_codigo);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detalle_codigo'])) ? $this->New_label['detalle_codigo'] : "CODIGO"; 
         }
         else
         {
             $SC_Label = "detalle_codigo"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detalle_codigo;
   }
   //----- detalle_descuento
   function NM_export_detalle_descuento()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->detalle_descuento, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detalle_descuento'])) ? $this->New_label['detalle_descuento'] : "DESCUENTO"; 
         }
         else
         {
             $SC_Label = "detalle_descuento"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detalle_descuento;
   }
   //----- detalle_item
   function NM_export_detalle_item()
   {
         $this->detalle_item = NM_charset_to_utf8($this->detalle_item);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detalle_item'])) ? $this->New_label['detalle_item'] : "ITEM"; 
         }
         else
         {
             $SC_Label = "detalle_item"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detalle_item;
   }
   //----- detalle_preciototalsinimpuesto
   function NM_export_detalle_preciototalsinimpuesto()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->detalle_preciototalsinimpuesto, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detalle_preciototalsinimpuesto'])) ? $this->New_label['detalle_preciototalsinimpuesto'] : "PRECIOTOTALSINIMPUESTO"; 
         }
         else
         {
             $SC_Label = "detalle_preciototalsinimpuesto"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detalle_preciototalsinimpuesto;
   }
   //----- detalle_preciounitario
   function NM_export_detalle_preciounitario()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->detalle_preciounitario, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detalle_preciounitario'])) ? $this->New_label['detalle_preciounitario'] : "PRECIOUNITARIO"; 
         }
         else
         {
             $SC_Label = "detalle_preciounitario"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detalle_preciounitario;
   }
   //----- direccion
   function NM_export_direccion()
   {
         $this->direccion = NM_charset_to_utf8($this->direccion);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['direccion'])) ? $this->New_label['direccion'] : "direccion"; 
         }
         else
         {
             $SC_Label = "direccion"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->direccion;
   }
   //----- fecha_auth_format
   function NM_export_fecha_auth_format()
   {
         $this->fecha_auth_format = NM_charset_to_utf8($this->fecha_auth_format);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['fecha_auth_format'])) ? $this->New_label['fecha_auth_format'] : "fecha_auth_format"; 
         }
         else
         {
             $SC_Label = "fecha_auth_format"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->fecha_auth_format;
   }
   //----- label_atencion
   function NM_export_label_atencion()
   {
         $this->label_atencion = NM_charset_to_utf8($this->label_atencion);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['label_atencion'])) ? $this->New_label['label_atencion'] : "label_atencion"; 
         }
         else
         {
             $SC_Label = "label_atencion"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->label_atencion;
   }
   //----- label_ca
   function NM_export_label_ca()
   {
         $this->label_ca = NM_charset_to_utf8($this->label_ca);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['label_ca'])) ? $this->New_label['label_ca'] : "label_ca"; 
         }
         else
         {
             $SC_Label = "label_ca"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->label_ca;
   }
   //----- label_codcliente
   function NM_export_label_codcliente()
   {
         $this->label_codcliente = NM_charset_to_utf8($this->label_codcliente);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['label_codcliente'])) ? $this->New_label['label_codcliente'] : "label_codcliente"; 
         }
         else
         {
             $SC_Label = "label_codcliente"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->label_codcliente;
   }
   //----- label_contr_especial
   function NM_export_label_contr_especial()
   {
         $this->label_contr_especial = NM_charset_to_utf8($this->label_contr_especial);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['label_contr_especial'])) ? $this->New_label['label_contr_especial'] : "label_contr_especial"; 
         }
         else
         {
             $SC_Label = "label_contr_especial"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->label_contr_especial;
   }
   //----- label_descuento
   function NM_export_label_descuento()
   {
         $this->label_descuento = NM_charset_to_utf8($this->label_descuento);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['label_descuento'])) ? $this->New_label['label_descuento'] : "label_descuento"; 
         }
         else
         {
             $SC_Label = "label_descuento"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->label_descuento;
   }
   //----- label_dircliente
   function NM_export_label_dircliente()
   {
         $this->label_dircliente = NM_charset_to_utf8($this->label_dircliente);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['label_dircliente'])) ? $this->New_label['label_dircliente'] : "label_dircliente"; 
         }
         else
         {
             $SC_Label = "label_dircliente"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->label_dircliente;
   }
   //----- label_fecha_auth
   function NM_export_label_fecha_auth()
   {
         $this->label_fecha_auth = NM_charset_to_utf8($this->label_fecha_auth);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['label_fecha_auth'])) ? $this->New_label['label_fecha_auth'] : "label_fecha_auth"; 
         }
         else
         {
             $SC_Label = "label_fecha_auth"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->label_fecha_auth;
   }
   //----- label_fecha_emision
   function NM_export_label_fecha_emision()
   {
         $this->label_fecha_emision = NM_charset_to_utf8($this->label_fecha_emision);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['label_fecha_emision'])) ? $this->New_label['label_fecha_emision'] : "label_fecha_emision"; 
         }
         else
         {
             $SC_Label = "label_fecha_emision"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->label_fecha_emision;
   }
   //----- label_file
   function NM_export_label_file()
   {
         $this->label_file = NM_charset_to_utf8($this->label_file);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['label_file'])) ? $this->New_label['label_file'] : "label_file"; 
         }
         else
         {
             $SC_Label = "label_file"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->label_file;
   }
   //----- label_formapago
   function NM_export_label_formapago()
   {
         $this->label_formapago = NM_charset_to_utf8($this->label_formapago);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['label_formapago'])) ? $this->New_label['label_formapago'] : "label_formapago"; 
         }
         else
         {
             $SC_Label = "label_formapago"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->label_formapago;
   }
   //----- label_guia_remision
   function NM_export_label_guia_remision()
   {
         $this->label_guia_remision = NM_charset_to_utf8($this->label_guia_remision);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['label_guia_remision'])) ? $this->New_label['label_guia_remision'] : "label_guia_remision"; 
         }
         else
         {
             $SC_Label = "label_guia_remision"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->label_guia_remision;
   }
   //----- label_iva
   function NM_export_label_iva()
   {
         $this->label_iva = NM_charset_to_utf8($this->label_iva);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['label_iva'])) ? $this->New_label['label_iva'] : "label_iva"; 
         }
         else
         {
             $SC_Label = "label_iva"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->label_iva;
   }
   //----- label_lote
   function NM_export_label_lote()
   {
         $this->label_lote = NM_charset_to_utf8($this->label_lote);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['label_lote'])) ? $this->New_label['label_lote'] : "label_lote"; 
         }
         else
         {
             $SC_Label = "label_lote"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->label_lote;
   }
   //----- label_nom_cliente
   function NM_export_label_nom_cliente()
   {
         $this->label_nom_cliente = NM_charset_to_utf8($this->label_nom_cliente);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['label_nom_cliente'])) ? $this->New_label['label_nom_cliente'] : "label_nom_cliente"; 
         }
         else
         {
             $SC_Label = "label_nom_cliente"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->label_nom_cliente;
   }
   //----- label_num_auth
   function NM_export_label_num_auth()
   {
         $this->label_num_auth = NM_charset_to_utf8($this->label_num_auth);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['label_num_auth'])) ? $this->New_label['label_num_auth'] : "label_num_auth"; 
         }
         else
         {
             $SC_Label = "label_num_auth"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->label_num_auth;
   }
   //----- label_obligado_cont
   function NM_export_label_obligado_cont()
   {
         $this->label_obligado_cont = NM_charset_to_utf8($this->label_obligado_cont);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['label_obligado_cont'])) ? $this->New_label['label_obligado_cont'] : "label_obligado_cont"; 
         }
         else
         {
             $SC_Label = "label_obligado_cont"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->label_obligado_cont;
   }
   //----- label_promo
   function NM_export_label_promo()
   {
         $this->label_promo = NM_charset_to_utf8($this->label_promo);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['label_promo'])) ? $this->New_label['label_promo'] : "label_promo"; 
         }
         else
         {
             $SC_Label = "label_promo"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->label_promo;
   }
   //----- label_ruccliente
   function NM_export_label_ruccliente()
   {
         $this->label_ruccliente = NM_charset_to_utf8($this->label_ruccliente);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['label_ruccliente'])) ? $this->New_label['label_ruccliente'] : "label_ruccliente"; 
         }
         else
         {
             $SC_Label = "label_ruccliente"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->label_ruccliente;
   }
   //----- label_stexento
   function NM_export_label_stexento()
   {
         $this->label_stexento = NM_charset_to_utf8($this->label_stexento);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['label_stexento'])) ? $this->New_label['label_stexento'] : "label_stexento"; 
         }
         else
         {
             $SC_Label = "label_stexento"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->label_stexento;
   }
   //----- label_stgravado
   function NM_export_label_stgravado()
   {
         $this->label_stgravado = NM_charset_to_utf8($this->label_stgravado);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['label_stgravado'])) ? $this->New_label['label_stgravado'] : "label_stgravado"; 
         }
         else
         {
             $SC_Label = "label_stgravado"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->label_stgravado;
   }
   //----- label_subtotal
   function NM_export_label_subtotal()
   {
         $this->label_subtotal = NM_charset_to_utf8($this->label_subtotal);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['label_subtotal'])) ? $this->New_label['label_subtotal'] : "label_subtotal"; 
         }
         else
         {
             $SC_Label = "label_subtotal"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->label_subtotal;
   }
   //----- label_suma_letras
   function NM_export_label_suma_letras()
   {
         $this->label_suma_letras = NM_charset_to_utf8($this->label_suma_letras);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['label_suma_letras'])) ? $this->New_label['label_suma_letras'] : "label_suma_letras"; 
         }
         else
         {
             $SC_Label = "label_suma_letras"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->label_suma_letras;
   }
   //----- label_telfcliente
   function NM_export_label_telfcliente()
   {
         $this->label_telfcliente = NM_charset_to_utf8($this->label_telfcliente);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['label_telfcliente'])) ? $this->New_label['label_telfcliente'] : "label_telfcliente"; 
         }
         else
         {
             $SC_Label = "label_telfcliente"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->label_telfcliente;
   }
   //----- label_vence
   function NM_export_label_vence()
   {
         $this->label_vence = NM_charset_to_utf8($this->label_vence);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['label_vence'])) ? $this->New_label['label_vence'] : "label_vence"; 
         }
         else
         {
             $SC_Label = "label_vence"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->label_vence;
   }
   //----- label_vendedor
   function NM_export_label_vendedor()
   {
         $this->label_vendedor = NM_charset_to_utf8($this->label_vendedor);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['label_vendedor'])) ? $this->New_label['label_vendedor'] : "label_vendedor"; 
         }
         else
         {
             $SC_Label = "label_vendedor"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->label_vendedor;
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
   function progress_bar_end()
   {
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO'][$path_doc_md5][1] = $this->Tit_doc;
      $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
          $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
      }
      $this->pb->setProgressbarMessage($Mens_bar);
      $this->pb->setDownloadLink($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $this->pb->setDownloadMd5($path_doc_md5);
      $this->pb->completed();
   }
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - FACTURA :: JSON</TITLE>
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
   <td class="scExportTitle" style="height: 25px">JSON</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
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
<form name="Fdown" method="get" action="pdfreport_ORDEN_TRABAJO_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdfreport_ORDEN_TRABAJO"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['json_return']); ?>"> 
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
