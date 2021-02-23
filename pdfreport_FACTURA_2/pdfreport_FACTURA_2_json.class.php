<?php

class pdfreport_FACTURA_2_json
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['embutida'])
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['opcao'] = "";
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
                   nm_limpa_str_pdfreport_FACTURA_2($cadapar[1]);
                   nm_protect_num_pdfreport_FACTURA_2($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['pdfreport_FACTURA_2']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($var_estab)) 
      {
          $_SESSION['var_estab'] = $var_estab;
          nm_limpa_str_pdfreport_FACTURA_2($_SESSION["var_estab"]);
      }
      if (isset($var_ptoemi)) 
      {
          $_SESSION['var_ptoemi'] = $var_ptoemi;
          nm_limpa_str_pdfreport_FACTURA_2($_SESSION["var_ptoemi"]);
      }
      if (isset($var_secuencial)) 
      {
          $_SESSION['var_secuencial'] = $var_secuencial;
          nm_limpa_str_pdfreport_FACTURA_2($_SESSION["var_secuencial"]);
      }
      if (isset($var_lote)) 
      {
          $_SESSION['var_lote'] = $var_lote;
          nm_limpa_str_pdfreport_FACTURA_2($_SESSION["var_lote"]);
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['SC_Gb_Free_cmp']))
      {
          $this->Tem_json_res  = false;
      }
      if (!is_file($this->Ini->root . $this->Ini->path_link . "pdfreport_FACTURA_2/pdfreport_FACTURA_2_res_json.class.php"))
      {
          $this->Tem_json_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['json_label']))
      {
          $this->Json_use_label = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['json_label'];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['json_format']))
      {
          $this->Json_format = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['json_format'];
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['pdfreport_FACTURA_2']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['json_return']);
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
      $this->Arq_zip      = $this->Arquivo . "_pdfreport_FACTURA_2.zip";
      $this->Arquivo     .= "_pdfreport_FACTURA_2";
      $this->Arquivo     .= ".json";
      $this->Tit_doc      = "pdfreport_FACTURA_2.json";
      $this->Tit_zip      = "pdfreport_FACTURA_2.zip";
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
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->f_valoradicional14 = $Busca_temp['f_valoradicional14']; 
          $tmp_pos = strpos($this->f_valoradicional14, "##@@");
          if ($tmp_pos !== false && !is_array($this->f_valoradicional14))
          {
              $this->f_valoradicional14 = substr($this->f_valoradicional14, 0, $tmp_pos);
          }
          $this->f_razonsocial = $Busca_temp['f_razonsocial']; 
          $tmp_pos = strpos($this->f_razonsocial, "##@@");
          if ($tmp_pos !== false && !is_array($this->f_razonsocial))
          {
              $this->f_razonsocial = substr($this->f_razonsocial, 0, $tmp_pos);
          }
          $this->f_ruc = $Busca_temp['f_ruc']; 
          $tmp_pos = strpos($this->f_ruc, "##@@");
          if ($tmp_pos !== false && !is_array($this->f_ruc))
          {
              $this->f_ruc = substr($this->f_ruc, 0, $tmp_pos);
          }
          $this->f_estab = $Busca_temp['f_estab']; 
          $tmp_pos = strpos($this->f_estab, "##@@");
          if ($tmp_pos !== false && !is_array($this->f_estab))
          {
              $this->f_estab = substr($this->f_estab, 0, $tmp_pos);
          }
          $this->f_ptoemi = $Busca_temp['f_ptoemi']; 
          $tmp_pos = strpos($this->f_ptoemi, "##@@");
          if ($tmp_pos !== false && !is_array($this->f_ptoemi))
          {
              $this->f_ptoemi = substr($this->f_ptoemi, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['json_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['json_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['json_name'] .= ".json";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['json_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['json_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['json_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['json_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['json_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['json_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['embutida'])
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
          $nmgp_select = "SELECT F.RAZONSOCIAL as f_razonsocial, F.RUC as f_ruc, F.ESTAB as f_estab, F.PTOEMI as f_ptoemi, F.SECUENCIAL as f_secuencial, F.LOTE as f_lote, F.DIRMATRIZ as f_dirmatriz, F.FECHAEMISION as f_fechaemision, F.DIRESTABLECIMIENTO as f_direstablecimiento, F.NUMCONTRIBUYENTEESPECIAL as f_numcontribuyenteespecial, F.OBLIGADOCONTABILIDAD as f_obligadocontabilidad, F.GUIAREMISION as f_guiaremision, F.RAZONSOCIALCOMPRADOR as f_razonsocialcomprador, F.IDCOMPRADOR as f_idcomprador, F.BASE_12 as f_base_12, F.BASE_0 as f_base_0, F.TOTALSINIMPUESTOS as f_totalsinimpuestos, F.TOTALDESCUENTO as f_totaldescuento, F.TARIFA1 as f_tarifa1, F.VALOR1 as f_valor1, F.PROPINA as f_propina, F.IMPORTETOTAL as f_importetotal, F.CAMPOADICIONAL1 as f_campoadicional1, F.VALORADICIONAL1 as f_valoradicional1, F.CAMPOADICIONAL2 as f_campoadicional2, F.VALORADICIONAL2 as f_valoradicional2, F.CAMPOADICIONAL3 as f_campoadicional3, F.VALORADICIONAL3 as f_valoradicional3, F.CAMPOADICIONAL4 as f_campoadicional4, F.VALORADICIONAL4 as f_valoradicional4, F.CAMPOADICIONAL5 as f_campoadicional5, F.VALORADICIONAL5 as f_valoradicional5, F.CAMPOADICIONAL6 as f_campoadicional6, F.VALORADICIONAL6 as f_valoradicional6, F.CAMPOADICIONAL7 as f_campoadicional7, F.VALORADICIONAL7 as f_valoradicional7, F.CAMPOADICIONAL8 as f_campoadicional8, F.VALORADICIONAL8 as f_valoradicional8, F.CAMPOADICIONAL9 as f_campoadicional9, F.VALORADICIONAL9 as f_valoradicional9, F.CAMPOADICIONAL10 as f_campoadicional10, F.VALORADICIONAL10 as f_valoradicional10, F.CAMPOADICIONAL11 as f_campoadicional11, F.VALORADICIONAL11 as f_valoradicional11, F.CAMPOADICIONAL12 as f_campoadicional12, F.VALORADICIONAL12 as f_valoradicional12, F.CAMPOADICIONAL13 as f_campoadicional13, F.VALORADICIONAL13 as f_valoradicional13, F.CAMPOADICIONAL14 as f_campoadicional14, F.VALORADICIONAL14 as f_valoradicional14, F.CAMPOADICIONAL15 as f_campoadicional15, F.VALORADICIONAL15 as f_valoradicional15, F.CAMPOADICIONAL16 as f_campoadicional16, F.VALORADICIONAL16 as f_valoradicional16, F.CAMPOADICIONAL17 as f_campoadicional17, F.VALORADICIONAL17 as f_valoradicional17, F.CAMPOADICIONAL18 as f_campoadicional18, F.VALORADICIONAL18 as f_valoradicional18, F.CAMPOADICIONAL19 as f_campoadicional19, F.VALORADICIONAL19 as f_valoradicional19, F.CAMPOADICIONAL20 as f_campoadicional20, F.VALORADICIONAL20 as f_valoradicional20, FF.CLAVE_ACCESO as ff_clave_acceso, FF.NUMEROAUTORIZACION as ff_numeroautorizacion, FF.FECHAAUTORIZACION as ff_fechaautorizacion, F.NUMPAGOS as f_numpagos, F.FORMAPAGO1 as f_formapago1, F.VALORTOT1 as f_valortot1, F.PLAZO1 as f_plazo1, F.UNIDADTIEMPO1 as f_unidadtiempo1, F.FORMAPAGO2 as f_formapago2, F.VALORTOT2 as f_valortot2, F.PLAZO2 as f_plazo2, F.UNIDADTIEMPO2 as f_unidadtiempo2, F.AMBIENTE as f_ambiente from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT F.RAZONSOCIAL as f_razonsocial, F.RUC as f_ruc, F.ESTAB as f_estab, F.PTOEMI as f_ptoemi, F.SECUENCIAL as f_secuencial, F.LOTE as f_lote, F.DIRMATRIZ as f_dirmatriz, F.FECHAEMISION as f_fechaemision, F.DIRESTABLECIMIENTO as f_direstablecimiento, F.NUMCONTRIBUYENTEESPECIAL as f_numcontribuyenteespecial, F.OBLIGADOCONTABILIDAD as f_obligadocontabilidad, F.GUIAREMISION as f_guiaremision, F.RAZONSOCIALCOMPRADOR as f_razonsocialcomprador, F.IDCOMPRADOR as f_idcomprador, F.BASE_12 as f_base_12, F.BASE_0 as f_base_0, F.TOTALSINIMPUESTOS as f_totalsinimpuestos, F.TOTALDESCUENTO as f_totaldescuento, F.TARIFA1 as f_tarifa1, F.VALOR1 as f_valor1, F.PROPINA as f_propina, F.IMPORTETOTAL as f_importetotal, F.CAMPOADICIONAL1 as f_campoadicional1, F.VALORADICIONAL1 as f_valoradicional1, F.CAMPOADICIONAL2 as f_campoadicional2, F.VALORADICIONAL2 as f_valoradicional2, F.CAMPOADICIONAL3 as f_campoadicional3, F.VALORADICIONAL3 as f_valoradicional3, F.CAMPOADICIONAL4 as f_campoadicional4, F.VALORADICIONAL4 as f_valoradicional4, F.CAMPOADICIONAL5 as f_campoadicional5, F.VALORADICIONAL5 as f_valoradicional5, F.CAMPOADICIONAL6 as f_campoadicional6, F.VALORADICIONAL6 as f_valoradicional6, F.CAMPOADICIONAL7 as f_campoadicional7, F.VALORADICIONAL7 as f_valoradicional7, F.CAMPOADICIONAL8 as f_campoadicional8, F.VALORADICIONAL8 as f_valoradicional8, F.CAMPOADICIONAL9 as f_campoadicional9, F.VALORADICIONAL9 as f_valoradicional9, F.CAMPOADICIONAL10 as f_campoadicional10, F.VALORADICIONAL10 as f_valoradicional10, F.CAMPOADICIONAL11 as f_campoadicional11, F.VALORADICIONAL11 as f_valoradicional11, F.CAMPOADICIONAL12 as f_campoadicional12, F.VALORADICIONAL12 as f_valoradicional12, F.CAMPOADICIONAL13 as f_campoadicional13, F.VALORADICIONAL13 as f_valoradicional13, F.CAMPOADICIONAL14 as f_campoadicional14, F.VALORADICIONAL14 as f_valoradicional14, F.CAMPOADICIONAL15 as f_campoadicional15, F.VALORADICIONAL15 as f_valoradicional15, F.CAMPOADICIONAL16 as f_campoadicional16, F.VALORADICIONAL16 as f_valoradicional16, F.CAMPOADICIONAL17 as f_campoadicional17, F.VALORADICIONAL17 as f_valoradicional17, F.CAMPOADICIONAL18 as f_campoadicional18, F.VALORADICIONAL18 as f_valoradicional18, F.CAMPOADICIONAL19 as f_campoadicional19, F.VALORADICIONAL19 as f_valoradicional19, F.CAMPOADICIONAL20 as f_campoadicional20, F.VALORADICIONAL20 as f_valoradicional20, FF.CLAVE_ACCESO as ff_clave_acceso, FF.NUMEROAUTORIZACION as ff_numeroautorizacion, FF.FECHAAUTORIZACION as ff_fechaautorizacion, F.NUMPAGOS as f_numpagos, F.FORMAPAGO1 as f_formapago1, F.VALORTOT1 as f_valortot1, F.PLAZO1 as f_plazo1, F.UNIDADTIEMPO1 as f_unidadtiempo1, F.FORMAPAGO2 as f_formapago2, F.VALORTOT2 as f_valortot2, F.PLAZO2 as f_plazo2, F.UNIDADTIEMPO2 as f_unidadtiempo2, F.AMBIENTE as f_ambiente from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT F.RAZONSOCIAL as f_razonsocial, F.RUC as f_ruc, F.ESTAB as f_estab, F.PTOEMI as f_ptoemi, F.SECUENCIAL as f_secuencial, F.LOTE as f_lote, F.DIRMATRIZ as f_dirmatriz, F.FECHAEMISION as f_fechaemision, F.DIRESTABLECIMIENTO as f_direstablecimiento, F.NUMCONTRIBUYENTEESPECIAL as f_numcontribuyenteespecial, F.OBLIGADOCONTABILIDAD as f_obligadocontabilidad, F.GUIAREMISION as f_guiaremision, F.RAZONSOCIALCOMPRADOR as f_razonsocialcomprador, F.IDCOMPRADOR as f_idcomprador, F.BASE_12 as f_base_12, F.BASE_0 as f_base_0, F.TOTALSINIMPUESTOS as f_totalsinimpuestos, F.TOTALDESCUENTO as f_totaldescuento, F.TARIFA1 as f_tarifa1, F.VALOR1 as f_valor1, F.PROPINA as f_propina, F.IMPORTETOTAL as f_importetotal, F.CAMPOADICIONAL1 as f_campoadicional1, F.VALORADICIONAL1 as f_valoradicional1, F.CAMPOADICIONAL2 as f_campoadicional2, F.VALORADICIONAL2 as f_valoradicional2, F.CAMPOADICIONAL3 as f_campoadicional3, F.VALORADICIONAL3 as f_valoradicional3, F.CAMPOADICIONAL4 as f_campoadicional4, F.VALORADICIONAL4 as f_valoradicional4, F.CAMPOADICIONAL5 as f_campoadicional5, F.VALORADICIONAL5 as f_valoradicional5, F.CAMPOADICIONAL6 as f_campoadicional6, F.VALORADICIONAL6 as f_valoradicional6, F.CAMPOADICIONAL7 as f_campoadicional7, F.VALORADICIONAL7 as f_valoradicional7, F.CAMPOADICIONAL8 as f_campoadicional8, F.VALORADICIONAL8 as f_valoradicional8, F.CAMPOADICIONAL9 as f_campoadicional9, F.VALORADICIONAL9 as f_valoradicional9, F.CAMPOADICIONAL10 as f_campoadicional10, F.VALORADICIONAL10 as f_valoradicional10, F.CAMPOADICIONAL11 as f_campoadicional11, F.VALORADICIONAL11 as f_valoradicional11, F.CAMPOADICIONAL12 as f_campoadicional12, F.VALORADICIONAL12 as f_valoradicional12, F.CAMPOADICIONAL13 as f_campoadicional13, F.VALORADICIONAL13 as f_valoradicional13, F.CAMPOADICIONAL14 as f_campoadicional14, F.VALORADICIONAL14 as f_valoradicional14, F.CAMPOADICIONAL15 as f_campoadicional15, F.VALORADICIONAL15 as f_valoradicional15, F.CAMPOADICIONAL16 as f_campoadicional16, F.VALORADICIONAL16 as f_valoradicional16, F.CAMPOADICIONAL17 as f_campoadicional17, F.VALORADICIONAL17 as f_valoradicional17, F.CAMPOADICIONAL18 as f_campoadicional18, F.VALORADICIONAL18 as f_valoradicional18, F.CAMPOADICIONAL19 as f_campoadicional19, F.VALORADICIONAL19 as f_valoradicional19, F.CAMPOADICIONAL20 as f_campoadicional20, F.VALORADICIONAL20 as f_valoradicional20, FF.CLAVE_ACCESO as ff_clave_acceso, FF.NUMEROAUTORIZACION as ff_numeroautorizacion, FF.FECHAAUTORIZACION as ff_fechaautorizacion, F.NUMPAGOS as f_numpagos, F.FORMAPAGO1 as f_formapago1, F.VALORTOT1 as f_valortot1, F.PLAZO1 as f_plazo1, F.UNIDADTIEMPO1 as f_unidadtiempo1, F.FORMAPAGO2 as f_formapago2, F.VALORTOT2 as f_valortot2, F.PLAZO2 as f_plazo2, F.UNIDADTIEMPO2 as f_unidadtiempo2, F.AMBIENTE as f_ambiente from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT F.RAZONSOCIAL as f_razonsocial, F.RUC as f_ruc, F.ESTAB as f_estab, F.PTOEMI as f_ptoemi, F.SECUENCIAL as f_secuencial, F.LOTE as f_lote, F.DIRMATRIZ as f_dirmatriz, F.FECHAEMISION as f_fechaemision, F.DIRESTABLECIMIENTO as f_direstablecimiento, F.NUMCONTRIBUYENTEESPECIAL as f_numcontribuyenteespecial, F.OBLIGADOCONTABILIDAD as f_obligadocontabilidad, F.GUIAREMISION as f_guiaremision, F.RAZONSOCIALCOMPRADOR as f_razonsocialcomprador, F.IDCOMPRADOR as f_idcomprador, F.BASE_12 as f_base_12, F.BASE_0 as f_base_0, F.TOTALSINIMPUESTOS as f_totalsinimpuestos, F.TOTALDESCUENTO as f_totaldescuento, F.TARIFA1 as f_tarifa1, F.VALOR1 as f_valor1, F.PROPINA as f_propina, F.IMPORTETOTAL as f_importetotal, F.CAMPOADICIONAL1 as f_campoadicional1, F.VALORADICIONAL1 as f_valoradicional1, F.CAMPOADICIONAL2 as f_campoadicional2, F.VALORADICIONAL2 as f_valoradicional2, F.CAMPOADICIONAL3 as f_campoadicional3, F.VALORADICIONAL3 as f_valoradicional3, F.CAMPOADICIONAL4 as f_campoadicional4, F.VALORADICIONAL4 as f_valoradicional4, F.CAMPOADICIONAL5 as f_campoadicional5, F.VALORADICIONAL5 as f_valoradicional5, F.CAMPOADICIONAL6 as f_campoadicional6, F.VALORADICIONAL6 as f_valoradicional6, F.CAMPOADICIONAL7 as f_campoadicional7, F.VALORADICIONAL7 as f_valoradicional7, F.CAMPOADICIONAL8 as f_campoadicional8, F.VALORADICIONAL8 as f_valoradicional8, F.CAMPOADICIONAL9 as f_campoadicional9, F.VALORADICIONAL9 as f_valoradicional9, F.CAMPOADICIONAL10 as f_campoadicional10, F.VALORADICIONAL10 as f_valoradicional10, F.CAMPOADICIONAL11 as f_campoadicional11, F.VALORADICIONAL11 as f_valoradicional11, F.CAMPOADICIONAL12 as f_campoadicional12, F.VALORADICIONAL12 as f_valoradicional12, F.CAMPOADICIONAL13 as f_campoadicional13, F.VALORADICIONAL13 as f_valoradicional13, F.CAMPOADICIONAL14 as f_campoadicional14, F.VALORADICIONAL14 as f_valoradicional14, F.CAMPOADICIONAL15 as f_campoadicional15, F.VALORADICIONAL15 as f_valoradicional15, F.CAMPOADICIONAL16 as f_campoadicional16, F.VALORADICIONAL16 as f_valoradicional16, F.CAMPOADICIONAL17 as f_campoadicional17, F.VALORADICIONAL17 as f_valoradicional17, F.CAMPOADICIONAL18 as f_campoadicional18, F.VALORADICIONAL18 as f_valoradicional18, F.CAMPOADICIONAL19 as f_campoadicional19, F.VALORADICIONAL19 as f_valoradicional19, F.CAMPOADICIONAL20 as f_campoadicional20, F.VALORADICIONAL20 as f_valoradicional20, FF.CLAVE_ACCESO as ff_clave_acceso, FF.NUMEROAUTORIZACION as ff_numeroautorizacion, FF.FECHAAUTORIZACION as ff_fechaautorizacion, F.NUMPAGOS as f_numpagos, F.FORMAPAGO1 as f_formapago1, F.VALORTOT1 as f_valortot1, F.PLAZO1 as f_plazo1, F.UNIDADTIEMPO1 as f_unidadtiempo1, F.FORMAPAGO2 as f_formapago2, F.VALORTOT2 as f_valortot2, F.PLAZO2 as f_plazo2, F.UNIDADTIEMPO2 as f_unidadtiempo2, F.AMBIENTE as f_ambiente from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT F.RAZONSOCIAL as f_razonsocial, F.RUC as f_ruc, F.ESTAB as f_estab, F.PTOEMI as f_ptoemi, F.SECUENCIAL as f_secuencial, F.LOTE as f_lote, F.DIRMATRIZ as f_dirmatriz, F.FECHAEMISION as f_fechaemision, F.DIRESTABLECIMIENTO as f_direstablecimiento, F.NUMCONTRIBUYENTEESPECIAL as f_numcontribuyenteespecial, F.OBLIGADOCONTABILIDAD as f_obligadocontabilidad, F.GUIAREMISION as f_guiaremision, F.RAZONSOCIALCOMPRADOR as f_razonsocialcomprador, F.IDCOMPRADOR as f_idcomprador, F.BASE_12 as f_base_12, F.BASE_0 as f_base_0, F.TOTALSINIMPUESTOS as f_totalsinimpuestos, F.TOTALDESCUENTO as f_totaldescuento, F.TARIFA1 as f_tarifa1, F.VALOR1 as f_valor1, F.PROPINA as f_propina, F.IMPORTETOTAL as f_importetotal, F.CAMPOADICIONAL1 as f_campoadicional1, F.VALORADICIONAL1 as f_valoradicional1, F.CAMPOADICIONAL2 as f_campoadicional2, F.VALORADICIONAL2 as f_valoradicional2, F.CAMPOADICIONAL3 as f_campoadicional3, F.VALORADICIONAL3 as f_valoradicional3, F.CAMPOADICIONAL4 as f_campoadicional4, F.VALORADICIONAL4 as f_valoradicional4, F.CAMPOADICIONAL5 as f_campoadicional5, F.VALORADICIONAL5 as f_valoradicional5, F.CAMPOADICIONAL6 as f_campoadicional6, F.VALORADICIONAL6 as f_valoradicional6, F.CAMPOADICIONAL7 as f_campoadicional7, F.VALORADICIONAL7 as f_valoradicional7, F.CAMPOADICIONAL8 as f_campoadicional8, F.VALORADICIONAL8 as f_valoradicional8, F.CAMPOADICIONAL9 as f_campoadicional9, F.VALORADICIONAL9 as f_valoradicional9, F.CAMPOADICIONAL10 as f_campoadicional10, F.VALORADICIONAL10 as f_valoradicional10, F.CAMPOADICIONAL11 as f_campoadicional11, F.VALORADICIONAL11 as f_valoradicional11, F.CAMPOADICIONAL12 as f_campoadicional12, F.VALORADICIONAL12 as f_valoradicional12, F.CAMPOADICIONAL13 as f_campoadicional13, F.VALORADICIONAL13 as f_valoradicional13, F.CAMPOADICIONAL14 as f_campoadicional14, F.VALORADICIONAL14 as f_valoradicional14, F.CAMPOADICIONAL15 as f_campoadicional15, F.VALORADICIONAL15 as f_valoradicional15, F.CAMPOADICIONAL16 as f_campoadicional16, F.VALORADICIONAL16 as f_valoradicional16, F.CAMPOADICIONAL17 as f_campoadicional17, F.VALORADICIONAL17 as f_valoradicional17, F.CAMPOADICIONAL18 as f_campoadicional18, F.VALORADICIONAL18 as f_valoradicional18, F.CAMPOADICIONAL19 as f_campoadicional19, F.VALORADICIONAL19 as f_valoradicional19, F.CAMPOADICIONAL20 as f_campoadicional20, F.VALORADICIONAL20 as f_valoradicional20, FF.CLAVE_ACCESO as ff_clave_acceso, FF.NUMEROAUTORIZACION as ff_numeroautorizacion, FF.FECHAAUTORIZACION as ff_fechaautorizacion, F.NUMPAGOS as f_numpagos, F.FORMAPAGO1 as f_formapago1, F.VALORTOT1 as f_valortot1, F.PLAZO1 as f_plazo1, F.UNIDADTIEMPO1 as f_unidadtiempo1, F.FORMAPAGO2 as f_formapago2, F.VALORTOT2 as f_valortot2, F.PLAZO2 as f_plazo2, F.UNIDADTIEMPO2 as f_unidadtiempo2, F.AMBIENTE as f_ambiente from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT F.RAZONSOCIAL as f_razonsocial, F.RUC as f_ruc, F.ESTAB as f_estab, F.PTOEMI as f_ptoemi, F.SECUENCIAL as f_secuencial, F.LOTE as f_lote, F.DIRMATRIZ as f_dirmatriz, F.FECHAEMISION as f_fechaemision, F.DIRESTABLECIMIENTO as f_direstablecimiento, F.NUMCONTRIBUYENTEESPECIAL as f_numcontribuyenteespecial, F.OBLIGADOCONTABILIDAD as f_obligadocontabilidad, F.GUIAREMISION as f_guiaremision, F.RAZONSOCIALCOMPRADOR as f_razonsocialcomprador, F.IDCOMPRADOR as f_idcomprador, F.BASE_12 as f_base_12, F.BASE_0 as f_base_0, F.TOTALSINIMPUESTOS as f_totalsinimpuestos, F.TOTALDESCUENTO as f_totaldescuento, F.TARIFA1 as f_tarifa1, F.VALOR1 as f_valor1, F.PROPINA as f_propina, F.IMPORTETOTAL as f_importetotal, F.CAMPOADICIONAL1 as f_campoadicional1, F.VALORADICIONAL1 as f_valoradicional1, F.CAMPOADICIONAL2 as f_campoadicional2, F.VALORADICIONAL2 as f_valoradicional2, F.CAMPOADICIONAL3 as f_campoadicional3, F.VALORADICIONAL3 as f_valoradicional3, F.CAMPOADICIONAL4 as f_campoadicional4, F.VALORADICIONAL4 as f_valoradicional4, F.CAMPOADICIONAL5 as f_campoadicional5, F.VALORADICIONAL5 as f_valoradicional5, F.CAMPOADICIONAL6 as f_campoadicional6, F.VALORADICIONAL6 as f_valoradicional6, F.CAMPOADICIONAL7 as f_campoadicional7, F.VALORADICIONAL7 as f_valoradicional7, F.CAMPOADICIONAL8 as f_campoadicional8, F.VALORADICIONAL8 as f_valoradicional8, F.CAMPOADICIONAL9 as f_campoadicional9, F.VALORADICIONAL9 as f_valoradicional9, F.CAMPOADICIONAL10 as f_campoadicional10, F.VALORADICIONAL10 as f_valoradicional10, F.CAMPOADICIONAL11 as f_campoadicional11, F.VALORADICIONAL11 as f_valoradicional11, F.CAMPOADICIONAL12 as f_campoadicional12, F.VALORADICIONAL12 as f_valoradicional12, F.CAMPOADICIONAL13 as f_campoadicional13, F.VALORADICIONAL13 as f_valoradicional13, F.CAMPOADICIONAL14 as f_campoadicional14, F.VALORADICIONAL14 as f_valoradicional14, F.CAMPOADICIONAL15 as f_campoadicional15, F.VALORADICIONAL15 as f_valoradicional15, F.CAMPOADICIONAL16 as f_campoadicional16, F.VALORADICIONAL16 as f_valoradicional16, F.CAMPOADICIONAL17 as f_campoadicional17, F.VALORADICIONAL17 as f_valoradicional17, F.CAMPOADICIONAL18 as f_campoadicional18, F.VALORADICIONAL18 as f_valoradicional18, F.CAMPOADICIONAL19 as f_campoadicional19, F.VALORADICIONAL19 as f_valoradicional19, F.CAMPOADICIONAL20 as f_campoadicional20, F.VALORADICIONAL20 as f_valoradicional20, FF.CLAVE_ACCESO as ff_clave_acceso, FF.NUMEROAUTORIZACION as ff_numeroautorizacion, FF.FECHAAUTORIZACION as ff_fechaautorizacion, F.NUMPAGOS as f_numpagos, F.FORMAPAGO1 as f_formapago1, F.VALORTOT1 as f_valortot1, F.PLAZO1 as f_plazo1, F.UNIDADTIEMPO1 as f_unidadtiempo1, F.FORMAPAGO2 as f_formapago2, F.VALORTOT2 as f_valortot2, F.PLAZO2 as f_plazo2, F.UNIDADTIEMPO2 as f_unidadtiempo2, F.AMBIENTE as f_ambiente from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['order_grid'];
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
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->f_razonsocial = $rs->fields[0] ;  
         $this->f_ruc = $rs->fields[1] ;  
         $this->f_estab = $rs->fields[2] ;  
         $this->f_estab = (string)$this->f_estab;
         $this->f_ptoemi = $rs->fields[3] ;  
         $this->f_ptoemi = (string)$this->f_ptoemi;
         $this->f_secuencial = $rs->fields[4] ;  
         $this->f_secuencial = (string)$this->f_secuencial;
         $this->f_lote = $rs->fields[5] ;  
         $this->f_dirmatriz = $rs->fields[6] ;  
         $this->f_fechaemision = $rs->fields[7] ;  
         $this->f_direstablecimiento = $rs->fields[8] ;  
         $this->f_numcontribuyenteespecial = $rs->fields[9] ;  
         $this->f_numcontribuyenteespecial = (string)$this->f_numcontribuyenteespecial;
         $this->f_obligadocontabilidad = $rs->fields[10] ;  
         $this->f_guiaremision = $rs->fields[11] ;  
         $this->f_razonsocialcomprador = $rs->fields[12] ;  
         $this->f_idcomprador = $rs->fields[13] ;  
         $this->f_base_12 = $rs->fields[14] ;  
         $this->f_base_12 = (strpos(strtolower($this->f_base_12), "e")) ? (float)$this->f_base_12 : $this->f_base_12; 
         $this->f_base_12 = (string)$this->f_base_12;
         $this->f_base_0 = $rs->fields[15] ;  
         $this->f_base_0 = (strpos(strtolower($this->f_base_0), "e")) ? (float)$this->f_base_0 : $this->f_base_0; 
         $this->f_base_0 = (string)$this->f_base_0;
         $this->f_totalsinimpuestos = $rs->fields[16] ;  
         $this->f_totalsinimpuestos = (strpos(strtolower($this->f_totalsinimpuestos), "e")) ? (float)$this->f_totalsinimpuestos : $this->f_totalsinimpuestos; 
         $this->f_totalsinimpuestos = (string)$this->f_totalsinimpuestos;
         $this->f_totaldescuento = $rs->fields[17] ;  
         $this->f_totaldescuento = (strpos(strtolower($this->f_totaldescuento), "e")) ? (float)$this->f_totaldescuento : $this->f_totaldescuento; 
         $this->f_totaldescuento = (string)$this->f_totaldescuento;
         $this->f_tarifa1 = $rs->fields[18] ;  
         $this->f_tarifa1 = (strpos(strtolower($this->f_tarifa1), "e")) ? (float)$this->f_tarifa1 : $this->f_tarifa1; 
         $this->f_tarifa1 = (string)$this->f_tarifa1;
         $this->f_valor1 = $rs->fields[19] ;  
         $this->f_valor1 = (strpos(strtolower($this->f_valor1), "e")) ? (float)$this->f_valor1 : $this->f_valor1; 
         $this->f_valor1 = (string)$this->f_valor1;
         $this->f_propina = $rs->fields[20] ;  
         $this->f_propina = (strpos(strtolower($this->f_propina), "e")) ? (float)$this->f_propina : $this->f_propina; 
         $this->f_propina = (string)$this->f_propina;
         $this->f_importetotal = $rs->fields[21] ;  
         $this->f_importetotal = (strpos(strtolower($this->f_importetotal), "e")) ? (float)$this->f_importetotal : $this->f_importetotal; 
         $this->f_importetotal = (string)$this->f_importetotal;
         $this->f_campoadicional1 = $rs->fields[22] ;  
         $this->f_valoradicional1 = $rs->fields[23] ;  
         $this->f_campoadicional2 = $rs->fields[24] ;  
         $this->f_valoradicional2 = $rs->fields[25] ;  
         $this->f_campoadicional3 = $rs->fields[26] ;  
         $this->f_valoradicional3 = $rs->fields[27] ;  
         $this->f_campoadicional4 = $rs->fields[28] ;  
         $this->f_valoradicional4 = $rs->fields[29] ;  
         $this->f_campoadicional5 = $rs->fields[30] ;  
         $this->f_valoradicional5 = $rs->fields[31] ;  
         $this->f_campoadicional6 = $rs->fields[32] ;  
         $this->f_valoradicional6 = $rs->fields[33] ;  
         $this->f_campoadicional7 = $rs->fields[34] ;  
         $this->f_valoradicional7 = $rs->fields[35] ;  
         $this->f_campoadicional8 = $rs->fields[36] ;  
         $this->f_valoradicional8 = $rs->fields[37] ;  
         $this->f_campoadicional9 = $rs->fields[38] ;  
         $this->f_valoradicional9 = $rs->fields[39] ;  
         $this->f_campoadicional10 = $rs->fields[40] ;  
         $this->f_valoradicional10 = $rs->fields[41] ;  
         $this->f_campoadicional11 = $rs->fields[42] ;  
         $this->f_valoradicional11 = $rs->fields[43] ;  
         $this->f_campoadicional12 = $rs->fields[44] ;  
         $this->f_valoradicional12 = $rs->fields[45] ;  
         $this->f_campoadicional13 = $rs->fields[46] ;  
         $this->f_valoradicional13 = $rs->fields[47] ;  
         $this->f_campoadicional14 = $rs->fields[48] ;  
         $this->f_valoradicional14 = $rs->fields[49] ;  
         $this->f_campoadicional15 = $rs->fields[50] ;  
         $this->f_valoradicional15 = $rs->fields[51] ;  
         $this->f_campoadicional16 = $rs->fields[52] ;  
         $this->f_valoradicional16 = $rs->fields[53] ;  
         $this->f_campoadicional17 = $rs->fields[54] ;  
         $this->f_valoradicional17 = $rs->fields[55] ;  
         $this->f_campoadicional18 = $rs->fields[56] ;  
         $this->f_valoradicional18 = $rs->fields[57] ;  
         $this->f_campoadicional19 = $rs->fields[58] ;  
         $this->f_valoradicional19 = $rs->fields[59] ;  
         $this->f_campoadicional20 = $rs->fields[60] ;  
         $this->f_valoradicional20 = $rs->fields[61] ;  
         $this->ff_clave_acceso = $rs->fields[62] ;  
         $this->ff_numeroautorizacion = $rs->fields[63] ;  
         $this->ff_fechaautorizacion = $rs->fields[64] ;  
         $this->f_numpagos = $rs->fields[65] ;  
         $this->f_numpagos = (string)$this->f_numpagos;
         $this->f_formapago1 = $rs->fields[66] ;  
         $this->f_formapago1 = (string)$this->f_formapago1;
         $this->f_valortot1 = $rs->fields[67] ;  
         $this->f_valortot1 = (strpos(strtolower($this->f_valortot1), "e")) ? (float)$this->f_valortot1 : $this->f_valortot1; 
         $this->f_valortot1 = (string)$this->f_valortot1;
         $this->f_plazo1 = $rs->fields[68] ;  
         $this->f_plazo1 = (string)$this->f_plazo1;
         $this->f_unidadtiempo1 = $rs->fields[69] ;  
         $this->f_formapago2 = $rs->fields[70] ;  
         $this->f_formapago2 = (string)$this->f_formapago2;
         $this->f_valortot2 = $rs->fields[71] ;  
         $this->f_valortot2 = (strpos(strtolower($this->f_valortot2), "e")) ? (float)$this->f_valortot2 : $this->f_valortot2; 
         $this->f_valortot2 = (string)$this->f_valortot2;
         $this->f_plazo2 = $rs->fields[72] ;  
         $this->f_plazo2 = (string)$this->f_plazo2;
         $this->f_unidadtiempo2 = $rs->fields[73] ;  
         $this->f_ambiente = $rs->fields[74] ;  
         $this->f_ambiente = (string)$this->f_ambiente;
         //----- lookup - f_formapago1
         $this->look_f_formapago1 = $this->f_formapago1; 
         $this->Lookup->lookup_f_formapago1($this->look_f_formapago1); 
         $this->look_f_formapago1 = ($this->look_f_formapago1 == "&nbsp;") ? "" : $this->look_f_formapago1; 
         //----- lookup - f_ambiente
         $this->look_f_ambiente = $this->f_ambiente; 
         $this->Lookup->lookup_f_ambiente($this->look_f_ambiente); 
         $this->look_f_ambiente = ($this->look_f_ambiente == "&nbsp;") ? "" : $this->look_f_ambiente; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['pdfreport_FACTURA_2']['contr_erro'] = 'on';
 $this->ca_bar  = $this->ff_clave_acceso ;

$this->direccion  = $this->f_valoradicional2 ;
	
$dia_auth = substr($this->ff_fechaautorizacion ,8,2);
$mes_auth = substr($this->ff_fechaautorizacion ,5,2);
$anio_auth = substr($this->ff_fechaautorizacion ,0,4);
$hora_auth = substr($this->ff_fechaautorizacion ,11,2);
$minuto_auth = substr($this->ff_fechaautorizacion ,14,2);

$fecha_auth = $dia_auth."/".$mes_auth."/".$anio_auth;
$tiempo_auth = $hora_auth.":".$minuto_auth;

$this->fecha_auth_format  = $fecha_auth." ".$tiempo_auth;

$this->label_ca ="CLAVE DE ACCESO";
$this->label_num_auth ="Número de autorización:";
$this->label_fecha_auth ="Fecha de autorización:";
$this->label_codcliente ="R.U.C.:";
$this->label_nom_cliente ="Cliente:";
$this->label_ruccliente ="RUC/CI:";
$this->label_fecha_emision ="Fecha de emisión:";
$this->label_guia_remision ="Guía de remisión:";
$this->label_telfcliente ="Teléfono:";
$this->label_dircliente ="Dirección:";
$this->label_formapago ="Forma de pago";
$this->label_vendedor ="Valor";
$this->label_contr_especial ="Nro. Contribuyente Especial:";
$this->label_obligado_cont ="OBLIGADO A LLEVAR CONTABILIDAD:";

$this->label_vence ='Vence:';
$this->label_file ='File:';
$this->label_atencion ='Atención:';
		
$this->label_lote ="Plazo";
$this->label_promo ="Tiempo";	

$this->label_suma_letras ='LA SUMA DE:';
$this->label_subtotal ="Subtotal";
$this->label_descuento ="Descuento";
$this->label_stexento ="Subtotal 0%";
$this->label_stgravado ="Subtotal ".$this->f_tarifa1 ."%";
$this->label_iva ="IVA ".$this->f_tarifa1 ."%";

$this->f_totalsinimpuestos =$this->f_totalsinimpuestos +$this->f_totaldescuento ;
	
$check_sql = "SELECT SUM(VALORICE)"
   . " FROM DETALLE_FACTURA"
   . " WHERE CODIMPICE > 0 AND ESTAB =".$this->f_estab ." AND PTOEMI=".$this->f_ptoemi ." AND SECUENCIAL=".$this->f_secuencial ." AND LOTE='".$this->f_lote ."'";
 
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
$_SESSION['scriptcase']['pdfreport_FACTURA_2']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['field_order'] as $Cada_col)
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['embutida'])
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
              require_once($this->Ini->path_aplicacao . "pdfreport_FACTURA_2_res_json.class.php");
              $this->Res = new pdfreport_FACTURA_2_res_json();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['json_res_grid'] = true;
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
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['json_res_file']['json'];
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
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['json_res_file']['json']);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['json_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- f_razonsocial
   function NM_export_f_razonsocial()
   {
         $this->f_razonsocial = NM_charset_to_utf8($this->f_razonsocial);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_razonsocial'])) ? $this->New_label['f_razonsocial'] : ""; 
         }
         else
         {
             $SC_Label = "f_razonsocial"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_razonsocial;
   }
   //----- f_ruc
   function NM_export_f_ruc()
   {
         $this->f_ruc = NM_charset_to_utf8($this->f_ruc);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_ruc'])) ? $this->New_label['f_ruc'] : ""; 
         }
         else
         {
             $SC_Label = "f_ruc"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_ruc;
   }
   //----- f_estab
   function NM_export_f_estab()
   {
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_estab'])) ? $this->New_label['f_estab'] : ""; 
         }
         else
         {
             $SC_Label = "f_estab"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_estab;
   }
   //----- f_ptoemi
   function NM_export_f_ptoemi()
   {
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_ptoemi'])) ? $this->New_label['f_ptoemi'] : ""; 
         }
         else
         {
             $SC_Label = "f_ptoemi"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_ptoemi;
   }
   //----- f_secuencial
   function NM_export_f_secuencial()
   {
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_secuencial'])) ? $this->New_label['f_secuencial'] : ""; 
         }
         else
         {
             $SC_Label = "f_secuencial"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_secuencial;
   }
   //----- f_lote
   function NM_export_f_lote()
   {
         $this->f_lote = NM_charset_to_utf8($this->f_lote);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_lote'])) ? $this->New_label['f_lote'] : ""; 
         }
         else
         {
             $SC_Label = "f_lote"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_lote;
   }
   //----- f_dirmatriz
   function NM_export_f_dirmatriz()
   {
         $this->f_dirmatriz = NM_charset_to_utf8($this->f_dirmatriz);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_dirmatriz'])) ? $this->New_label['f_dirmatriz'] : ""; 
         }
         else
         {
             $SC_Label = "f_dirmatriz"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_dirmatriz;
   }
   //----- f_fechaemision
   function NM_export_f_fechaemision()
   {
         $this->f_fechaemision = NM_charset_to_utf8($this->f_fechaemision);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_fechaemision'])) ? $this->New_label['f_fechaemision'] : ""; 
         }
         else
         {
             $SC_Label = "f_fechaemision"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_fechaemision;
   }
   //----- f_direstablecimiento
   function NM_export_f_direstablecimiento()
   {
         $this->f_direstablecimiento = NM_charset_to_utf8($this->f_direstablecimiento);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_direstablecimiento'])) ? $this->New_label['f_direstablecimiento'] : ""; 
         }
         else
         {
             $SC_Label = "f_direstablecimiento"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_direstablecimiento;
   }
   //----- f_numcontribuyenteespecial
   function NM_export_f_numcontribuyenteespecial()
   {
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_numcontribuyenteespecial'])) ? $this->New_label['f_numcontribuyenteespecial'] : ""; 
         }
         else
         {
             $SC_Label = "f_numcontribuyenteespecial"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_numcontribuyenteespecial;
   }
   //----- f_obligadocontabilidad
   function NM_export_f_obligadocontabilidad()
   {
         $this->f_obligadocontabilidad = NM_charset_to_utf8($this->f_obligadocontabilidad);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_obligadocontabilidad'])) ? $this->New_label['f_obligadocontabilidad'] : ""; 
         }
         else
         {
             $SC_Label = "f_obligadocontabilidad"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_obligadocontabilidad;
   }
   //----- f_guiaremision
   function NM_export_f_guiaremision()
   {
         $this->f_guiaremision = NM_charset_to_utf8($this->f_guiaremision);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_guiaremision'])) ? $this->New_label['f_guiaremision'] : ""; 
         }
         else
         {
             $SC_Label = "f_guiaremision"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_guiaremision;
   }
   //----- f_razonsocialcomprador
   function NM_export_f_razonsocialcomprador()
   {
         $this->f_razonsocialcomprador = NM_charset_to_utf8($this->f_razonsocialcomprador);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_razonsocialcomprador'])) ? $this->New_label['f_razonsocialcomprador'] : ""; 
         }
         else
         {
             $SC_Label = "f_razonsocialcomprador"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_razonsocialcomprador;
   }
   //----- f_idcomprador
   function NM_export_f_idcomprador()
   {
         $this->f_idcomprador = NM_charset_to_utf8($this->f_idcomprador);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_idcomprador'])) ? $this->New_label['f_idcomprador'] : ""; 
         }
         else
         {
             $SC_Label = "f_idcomprador"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_idcomprador;
   }
   //----- f_base_12
   function NM_export_f_base_12()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->f_base_12, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_base_12'])) ? $this->New_label['f_base_12'] : ""; 
         }
         else
         {
             $SC_Label = "f_base_12"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_base_12;
   }
   //----- f_base_0
   function NM_export_f_base_0()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->f_base_0, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_base_0'])) ? $this->New_label['f_base_0'] : ""; 
         }
         else
         {
             $SC_Label = "f_base_0"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_base_0;
   }
   //----- f_totalsinimpuestos
   function NM_export_f_totalsinimpuestos()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->f_totalsinimpuestos, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_totalsinimpuestos'])) ? $this->New_label['f_totalsinimpuestos'] : ""; 
         }
         else
         {
             $SC_Label = "f_totalsinimpuestos"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_totalsinimpuestos;
   }
   //----- f_totaldescuento
   function NM_export_f_totaldescuento()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->f_totaldescuento, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_totaldescuento'])) ? $this->New_label['f_totaldescuento'] : ""; 
         }
         else
         {
             $SC_Label = "f_totaldescuento"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_totaldescuento;
   }
   //----- f_tarifa1
   function NM_export_f_tarifa1()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->f_tarifa1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "6", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_tarifa1'])) ? $this->New_label['f_tarifa1'] : "TARIFA1"; 
         }
         else
         {
             $SC_Label = "f_tarifa1"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_tarifa1;
   }
   //----- f_valor1
   function NM_export_f_valor1()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->f_valor1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_valor1'])) ? $this->New_label['f_valor1'] : ""; 
         }
         else
         {
             $SC_Label = "f_valor1"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_valor1;
   }
   //----- f_propina
   function NM_export_f_propina()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->f_propina, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_propina'])) ? $this->New_label['f_propina'] : ""; 
         }
         else
         {
             $SC_Label = "f_propina"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_propina;
   }
   //----- f_importetotal
   function NM_export_f_importetotal()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->f_importetotal, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_importetotal'])) ? $this->New_label['f_importetotal'] : ""; 
         }
         else
         {
             $SC_Label = "f_importetotal"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_importetotal;
   }
   //----- f_campoadicional1
   function NM_export_f_campoadicional1()
   {
         $this->f_campoadicional1 = NM_charset_to_utf8($this->f_campoadicional1);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_campoadicional1'])) ? $this->New_label['f_campoadicional1'] : ""; 
         }
         else
         {
             $SC_Label = "f_campoadicional1"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_campoadicional1;
   }
   //----- f_valoradicional1
   function NM_export_f_valoradicional1()
   {
         $this->f_valoradicional1 = NM_charset_to_utf8($this->f_valoradicional1);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_valoradicional1'])) ? $this->New_label['f_valoradicional1'] : ""; 
         }
         else
         {
             $SC_Label = "f_valoradicional1"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_valoradicional1;
   }
   //----- f_campoadicional2
   function NM_export_f_campoadicional2()
   {
         $this->f_campoadicional2 = NM_charset_to_utf8($this->f_campoadicional2);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_campoadicional2'])) ? $this->New_label['f_campoadicional2'] : ""; 
         }
         else
         {
             $SC_Label = "f_campoadicional2"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_campoadicional2;
   }
   //----- f_valoradicional2
   function NM_export_f_valoradicional2()
   {
         $this->f_valoradicional2 = NM_charset_to_utf8($this->f_valoradicional2);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_valoradicional2'])) ? $this->New_label['f_valoradicional2'] : ""; 
         }
         else
         {
             $SC_Label = "f_valoradicional2"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_valoradicional2;
   }
   //----- f_campoadicional3
   function NM_export_f_campoadicional3()
   {
         $this->f_campoadicional3 = NM_charset_to_utf8($this->f_campoadicional3);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_campoadicional3'])) ? $this->New_label['f_campoadicional3'] : ""; 
         }
         else
         {
             $SC_Label = "f_campoadicional3"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_campoadicional3;
   }
   //----- f_valoradicional3
   function NM_export_f_valoradicional3()
   {
         $this->f_valoradicional3 = NM_charset_to_utf8($this->f_valoradicional3);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_valoradicional3'])) ? $this->New_label['f_valoradicional3'] : ""; 
         }
         else
         {
             $SC_Label = "f_valoradicional3"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_valoradicional3;
   }
   //----- f_campoadicional4
   function NM_export_f_campoadicional4()
   {
         $this->f_campoadicional4 = NM_charset_to_utf8($this->f_campoadicional4);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_campoadicional4'])) ? $this->New_label['f_campoadicional4'] : ""; 
         }
         else
         {
             $SC_Label = "f_campoadicional4"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_campoadicional4;
   }
   //----- f_valoradicional4
   function NM_export_f_valoradicional4()
   {
         $this->f_valoradicional4 = NM_charset_to_utf8($this->f_valoradicional4);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_valoradicional4'])) ? $this->New_label['f_valoradicional4'] : ""; 
         }
         else
         {
             $SC_Label = "f_valoradicional4"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_valoradicional4;
   }
   //----- f_campoadicional5
   function NM_export_f_campoadicional5()
   {
         $this->f_campoadicional5 = NM_charset_to_utf8($this->f_campoadicional5);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_campoadicional5'])) ? $this->New_label['f_campoadicional5'] : ""; 
         }
         else
         {
             $SC_Label = "f_campoadicional5"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_campoadicional5;
   }
   //----- f_valoradicional5
   function NM_export_f_valoradicional5()
   {
         $this->f_valoradicional5 = NM_charset_to_utf8($this->f_valoradicional5);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_valoradicional5'])) ? $this->New_label['f_valoradicional5'] : ""; 
         }
         else
         {
             $SC_Label = "f_valoradicional5"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_valoradicional5;
   }
   //----- f_campoadicional6
   function NM_export_f_campoadicional6()
   {
         $this->f_campoadicional6 = NM_charset_to_utf8($this->f_campoadicional6);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_campoadicional6'])) ? $this->New_label['f_campoadicional6'] : ""; 
         }
         else
         {
             $SC_Label = "f_campoadicional6"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_campoadicional6;
   }
   //----- f_valoradicional6
   function NM_export_f_valoradicional6()
   {
         $this->f_valoradicional6 = NM_charset_to_utf8($this->f_valoradicional6);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_valoradicional6'])) ? $this->New_label['f_valoradicional6'] : ""; 
         }
         else
         {
             $SC_Label = "f_valoradicional6"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_valoradicional6;
   }
   //----- f_campoadicional7
   function NM_export_f_campoadicional7()
   {
         $this->f_campoadicional7 = NM_charset_to_utf8($this->f_campoadicional7);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_campoadicional7'])) ? $this->New_label['f_campoadicional7'] : ""; 
         }
         else
         {
             $SC_Label = "f_campoadicional7"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_campoadicional7;
   }
   //----- f_valoradicional7
   function NM_export_f_valoradicional7()
   {
         $this->f_valoradicional7 = NM_charset_to_utf8($this->f_valoradicional7);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_valoradicional7'])) ? $this->New_label['f_valoradicional7'] : ""; 
         }
         else
         {
             $SC_Label = "f_valoradicional7"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_valoradicional7;
   }
   //----- f_campoadicional8
   function NM_export_f_campoadicional8()
   {
         $this->f_campoadicional8 = NM_charset_to_utf8($this->f_campoadicional8);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_campoadicional8'])) ? $this->New_label['f_campoadicional8'] : ""; 
         }
         else
         {
             $SC_Label = "f_campoadicional8"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_campoadicional8;
   }
   //----- f_valoradicional8
   function NM_export_f_valoradicional8()
   {
         $this->f_valoradicional8 = NM_charset_to_utf8($this->f_valoradicional8);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_valoradicional8'])) ? $this->New_label['f_valoradicional8'] : ""; 
         }
         else
         {
             $SC_Label = "f_valoradicional8"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_valoradicional8;
   }
   //----- f_campoadicional9
   function NM_export_f_campoadicional9()
   {
         $this->f_campoadicional9 = NM_charset_to_utf8($this->f_campoadicional9);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_campoadicional9'])) ? $this->New_label['f_campoadicional9'] : ""; 
         }
         else
         {
             $SC_Label = "f_campoadicional9"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_campoadicional9;
   }
   //----- f_valoradicional9
   function NM_export_f_valoradicional9()
   {
         $this->f_valoradicional9 = NM_charset_to_utf8($this->f_valoradicional9);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_valoradicional9'])) ? $this->New_label['f_valoradicional9'] : ""; 
         }
         else
         {
             $SC_Label = "f_valoradicional9"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_valoradicional9;
   }
   //----- f_campoadicional10
   function NM_export_f_campoadicional10()
   {
         $this->f_campoadicional10 = NM_charset_to_utf8($this->f_campoadicional10);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_campoadicional10'])) ? $this->New_label['f_campoadicional10'] : ""; 
         }
         else
         {
             $SC_Label = "f_campoadicional10"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_campoadicional10;
   }
   //----- f_valoradicional10
   function NM_export_f_valoradicional10()
   {
         $this->f_valoradicional10 = NM_charset_to_utf8($this->f_valoradicional10);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_valoradicional10'])) ? $this->New_label['f_valoradicional10'] : ""; 
         }
         else
         {
             $SC_Label = "f_valoradicional10"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_valoradicional10;
   }
   //----- f_campoadicional11
   function NM_export_f_campoadicional11()
   {
         $this->f_campoadicional11 = NM_charset_to_utf8($this->f_campoadicional11);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_campoadicional11'])) ? $this->New_label['f_campoadicional11'] : ""; 
         }
         else
         {
             $SC_Label = "f_campoadicional11"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_campoadicional11;
   }
   //----- f_valoradicional11
   function NM_export_f_valoradicional11()
   {
         $this->f_valoradicional11 = NM_charset_to_utf8($this->f_valoradicional11);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_valoradicional11'])) ? $this->New_label['f_valoradicional11'] : ""; 
         }
         else
         {
             $SC_Label = "f_valoradicional11"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_valoradicional11;
   }
   //----- f_campoadicional12
   function NM_export_f_campoadicional12()
   {
         $this->f_campoadicional12 = NM_charset_to_utf8($this->f_campoadicional12);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_campoadicional12'])) ? $this->New_label['f_campoadicional12'] : "CAMPOADICIONAL12"; 
         }
         else
         {
             $SC_Label = "f_campoadicional12"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_campoadicional12;
   }
   //----- f_valoradicional12
   function NM_export_f_valoradicional12()
   {
         $this->f_valoradicional12 = NM_charset_to_utf8($this->f_valoradicional12);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_valoradicional12'])) ? $this->New_label['f_valoradicional12'] : "VALORADICIONAL12"; 
         }
         else
         {
             $SC_Label = "f_valoradicional12"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_valoradicional12;
   }
   //----- f_campoadicional13
   function NM_export_f_campoadicional13()
   {
         $this->f_campoadicional13 = NM_charset_to_utf8($this->f_campoadicional13);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_campoadicional13'])) ? $this->New_label['f_campoadicional13'] : "CAMPOADICIONAL13"; 
         }
         else
         {
             $SC_Label = "f_campoadicional13"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_campoadicional13;
   }
   //----- f_valoradicional13
   function NM_export_f_valoradicional13()
   {
         $this->f_valoradicional13 = NM_charset_to_utf8($this->f_valoradicional13);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_valoradicional13'])) ? $this->New_label['f_valoradicional13'] : "VALORADICIONAL13"; 
         }
         else
         {
             $SC_Label = "f_valoradicional13"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_valoradicional13;
   }
   //----- f_campoadicional14
   function NM_export_f_campoadicional14()
   {
         $this->f_campoadicional14 = NM_charset_to_utf8($this->f_campoadicional14);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_campoadicional14'])) ? $this->New_label['f_campoadicional14'] : "CAMPOADICIONAL14"; 
         }
         else
         {
             $SC_Label = "f_campoadicional14"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_campoadicional14;
   }
   //----- f_valoradicional14
   function NM_export_f_valoradicional14()
   {
         $this->f_valoradicional14 = NM_charset_to_utf8($this->f_valoradicional14);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_valoradicional14'])) ? $this->New_label['f_valoradicional14'] : "VALORADICIONAL14"; 
         }
         else
         {
             $SC_Label = "f_valoradicional14"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_valoradicional14;
   }
   //----- f_campoadicional15
   function NM_export_f_campoadicional15()
   {
         $this->f_campoadicional15 = NM_charset_to_utf8($this->f_campoadicional15);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_campoadicional15'])) ? $this->New_label['f_campoadicional15'] : "CAMPOADICIONAL15"; 
         }
         else
         {
             $SC_Label = "f_campoadicional15"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_campoadicional15;
   }
   //----- f_valoradicional15
   function NM_export_f_valoradicional15()
   {
         $this->f_valoradicional15 = NM_charset_to_utf8($this->f_valoradicional15);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_valoradicional15'])) ? $this->New_label['f_valoradicional15'] : "VALORADICIONAL15"; 
         }
         else
         {
             $SC_Label = "f_valoradicional15"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_valoradicional15;
   }
   //----- f_campoadicional16
   function NM_export_f_campoadicional16()
   {
         $this->f_campoadicional16 = NM_charset_to_utf8($this->f_campoadicional16);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_campoadicional16'])) ? $this->New_label['f_campoadicional16'] : "CAMPOADICIONAL16"; 
         }
         else
         {
             $SC_Label = "f_campoadicional16"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_campoadicional16;
   }
   //----- f_valoradicional16
   function NM_export_f_valoradicional16()
   {
         $this->f_valoradicional16 = NM_charset_to_utf8($this->f_valoradicional16);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_valoradicional16'])) ? $this->New_label['f_valoradicional16'] : "VALORADICIONAL16"; 
         }
         else
         {
             $SC_Label = "f_valoradicional16"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_valoradicional16;
   }
   //----- f_campoadicional17
   function NM_export_f_campoadicional17()
   {
         $this->f_campoadicional17 = NM_charset_to_utf8($this->f_campoadicional17);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_campoadicional17'])) ? $this->New_label['f_campoadicional17'] : "CAMPOADICIONAL17"; 
         }
         else
         {
             $SC_Label = "f_campoadicional17"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_campoadicional17;
   }
   //----- f_valoradicional17
   function NM_export_f_valoradicional17()
   {
         $this->f_valoradicional17 = NM_charset_to_utf8($this->f_valoradicional17);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_valoradicional17'])) ? $this->New_label['f_valoradicional17'] : "VALORADICIONAL17"; 
         }
         else
         {
             $SC_Label = "f_valoradicional17"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_valoradicional17;
   }
   //----- f_campoadicional18
   function NM_export_f_campoadicional18()
   {
         $this->f_campoadicional18 = NM_charset_to_utf8($this->f_campoadicional18);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_campoadicional18'])) ? $this->New_label['f_campoadicional18'] : "CAMPOADICIONAL18"; 
         }
         else
         {
             $SC_Label = "f_campoadicional18"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_campoadicional18;
   }
   //----- f_valoradicional18
   function NM_export_f_valoradicional18()
   {
         $this->f_valoradicional18 = NM_charset_to_utf8($this->f_valoradicional18);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_valoradicional18'])) ? $this->New_label['f_valoradicional18'] : "VALORADICIONAL18"; 
         }
         else
         {
             $SC_Label = "f_valoradicional18"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_valoradicional18;
   }
   //----- f_campoadicional19
   function NM_export_f_campoadicional19()
   {
         $this->f_campoadicional19 = NM_charset_to_utf8($this->f_campoadicional19);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_campoadicional19'])) ? $this->New_label['f_campoadicional19'] : "CAMPOADICIONAL19"; 
         }
         else
         {
             $SC_Label = "f_campoadicional19"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_campoadicional19;
   }
   //----- f_valoradicional19
   function NM_export_f_valoradicional19()
   {
         $this->f_valoradicional19 = NM_charset_to_utf8($this->f_valoradicional19);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_valoradicional19'])) ? $this->New_label['f_valoradicional19'] : "VALORADICIONAL19"; 
         }
         else
         {
             $SC_Label = "f_valoradicional19"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_valoradicional19;
   }
   //----- f_campoadicional20
   function NM_export_f_campoadicional20()
   {
         $this->f_campoadicional20 = NM_charset_to_utf8($this->f_campoadicional20);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_campoadicional20'])) ? $this->New_label['f_campoadicional20'] : "CAMPOADICIONAL20"; 
         }
         else
         {
             $SC_Label = "f_campoadicional20"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_campoadicional20;
   }
   //----- f_valoradicional20
   function NM_export_f_valoradicional20()
   {
         $this->f_valoradicional20 = NM_charset_to_utf8($this->f_valoradicional20);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_valoradicional20'])) ? $this->New_label['f_valoradicional20'] : "VALORADICIONAL20"; 
         }
         else
         {
             $SC_Label = "f_valoradicional20"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_valoradicional20;
   }
   //----- ff_clave_acceso
   function NM_export_ff_clave_acceso()
   {
         $this->ff_clave_acceso = NM_charset_to_utf8($this->ff_clave_acceso);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['ff_clave_acceso'])) ? $this->New_label['ff_clave_acceso'] : ""; 
         }
         else
         {
             $SC_Label = "ff_clave_acceso"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->ff_clave_acceso;
   }
   //----- ff_numeroautorizacion
   function NM_export_ff_numeroautorizacion()
   {
         $this->ff_numeroautorizacion = NM_charset_to_utf8($this->ff_numeroautorizacion);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['ff_numeroautorizacion'])) ? $this->New_label['ff_numeroautorizacion'] : ""; 
         }
         else
         {
             $SC_Label = "ff_numeroautorizacion"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->ff_numeroautorizacion;
   }
   //----- ff_fechaautorizacion
   function NM_export_ff_fechaautorizacion()
   {
         $this->ff_fechaautorizacion = NM_charset_to_utf8($this->ff_fechaautorizacion);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['ff_fechaautorizacion'])) ? $this->New_label['ff_fechaautorizacion'] : ""; 
         }
         else
         {
             $SC_Label = "ff_fechaautorizacion"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->ff_fechaautorizacion;
   }
   //----- f_numpagos
   function NM_export_f_numpagos()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->f_numpagos, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_numpagos'])) ? $this->New_label['f_numpagos'] : "NUMPAGOS"; 
         }
         else
         {
             $SC_Label = "f_numpagos"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_numpagos;
   }
   //----- f_formapago1
   function NM_export_f_formapago1()
   {
         $this->look_f_formapago1 = NM_charset_to_utf8($this->look_f_formapago1);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_formapago1'])) ? $this->New_label['f_formapago1'] : "FORMAPAGO1"; 
         }
         else
         {
             $SC_Label = "f_formapago1"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->look_f_formapago1;
   }
   //----- f_valortot1
   function NM_export_f_valortot1()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->f_valortot1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_valortot1'])) ? $this->New_label['f_valortot1'] : "VALORTOT1"; 
         }
         else
         {
             $SC_Label = "f_valortot1"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_valortot1;
   }
   //----- f_plazo1
   function NM_export_f_plazo1()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->f_plazo1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_plazo1'])) ? $this->New_label['f_plazo1'] : "PLAZO1"; 
         }
         else
         {
             $SC_Label = "f_plazo1"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_plazo1;
   }
   //----- f_unidadtiempo1
   function NM_export_f_unidadtiempo1()
   {
         $this->f_unidadtiempo1 = NM_charset_to_utf8($this->f_unidadtiempo1);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_unidadtiempo1'])) ? $this->New_label['f_unidadtiempo1'] : "UNIDADTIEMPO1"; 
         }
         else
         {
             $SC_Label = "f_unidadtiempo1"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_unidadtiempo1;
   }
   //----- f_formapago2
   function NM_export_f_formapago2()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->f_formapago2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_formapago2'])) ? $this->New_label['f_formapago2'] : "FORMAPAGO2"; 
         }
         else
         {
             $SC_Label = "f_formapago2"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_formapago2;
   }
   //----- f_valortot2
   function NM_export_f_valortot2()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->f_valortot2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "6", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_valortot2'])) ? $this->New_label['f_valortot2'] : "VALORTOT2"; 
         }
         else
         {
             $SC_Label = "f_valortot2"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_valortot2;
   }
   //----- f_plazo2
   function NM_export_f_plazo2()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->f_plazo2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_plazo2'])) ? $this->New_label['f_plazo2'] : "PLAZO2"; 
         }
         else
         {
             $SC_Label = "f_plazo2"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_plazo2;
   }
   //----- f_unidadtiempo2
   function NM_export_f_unidadtiempo2()
   {
         $this->f_unidadtiempo2 = NM_charset_to_utf8($this->f_unidadtiempo2);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_unidadtiempo2'])) ? $this->New_label['f_unidadtiempo2'] : "UNIDADTIEMPO2"; 
         }
         else
         {
             $SC_Label = "f_unidadtiempo2"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->f_unidadtiempo2;
   }
   //----- f_ambiente
   function NM_export_f_ambiente()
   {
         $this->look_f_ambiente = NM_charset_to_utf8($this->look_f_ambiente);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['f_ambiente'])) ? $this->New_label['f_ambiente'] : "AMBIENTE"; 
         }
         else
         {
             $SC_Label = "f_ambiente"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->look_f_ambiente;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2'][$path_doc_md5][1] = $this->Tit_doc;
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
<form name="Fdown" method="get" action="pdfreport_FACTURA_2_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdfreport_FACTURA_2"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA_2']['json_return']); ?>"> 
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
