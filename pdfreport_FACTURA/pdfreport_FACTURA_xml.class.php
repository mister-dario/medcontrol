<?php

class pdfreport_FACTURA_xml
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['embutida'])
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['opcao'] = "";
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
                   nm_limpa_str_pdfreport_FACTURA($cadapar[1]);
                   nm_protect_num_pdfreport_FACTURA($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['pdfreport_FACTURA']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($var_estab)) 
      {
          $_SESSION['var_estab'] = $var_estab;
          nm_limpa_str_pdfreport_FACTURA($_SESSION["var_estab"]);
      }
      if (isset($var_ptoemi)) 
      {
          $_SESSION['var_ptoemi'] = $var_ptoemi;
          nm_limpa_str_pdfreport_FACTURA($_SESSION["var_ptoemi"]);
      }
      if (isset($var_secuencial)) 
      {
          $_SESSION['var_secuencial'] = $var_secuencial;
          nm_limpa_str_pdfreport_FACTURA($_SESSION["var_secuencial"]);
      }
      if (isset($var_lote)) 
      {
          $_SESSION['var_lote'] = $var_lote;
          nm_limpa_str_pdfreport_FACTURA($_SESSION["var_lote"]);
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['xml_label']))
      {
          $this->Xml_tag_label = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['xml_label'];
          $this->New_Format    = true;
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nm_data    = new nm_data("es");
      $this->Arquivo      = "sc_xml";
      $this->Arquivo     .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arq_zip      = $this->Arquivo . "_pdfreport_FACTURA.zip";
      $this->Arquivo     .= "_pdfreport_FACTURA";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "pdfreport_FACTURA.xml";
      $this->Tit_zip      = "pdfreport_FACTURA.zip";
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
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['campos_busca'];
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['xml_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['xml_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['xml_name'] .= ".xml";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['xml_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['xml_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['xml_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['xml_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['embutida'])
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
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['order_grid'];
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
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['embutida'])
         { 
             $this->xml_registro .= "<" . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro = "<pdfreport_FACTURA>\r\n";
         }
         else
         {
             $this->xml_registro = "<pdfreport_FACTURA";
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
         $_SESSION['scriptcase']['pdfreport_FACTURA']['contr_erro'] = 'on';
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
$_SESSION['scriptcase']['pdfreport_FACTURA']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['embutida'])
         { 
             $this->xml_registro .= "</" . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro .= "</pdfreport_FACTURA>\r\n";
         }
         else
         {
             $this->xml_registro .= " />\r\n";
         }
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['embutida'])
         { 
             fwrite($xml_f, $this->xml_registro);
             if ($this->Grava_view)
             {
                fwrite($xml_v, $this->xml_registro);
             }
         }
         $rs->MoveNext();
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['embutida'])
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- f_razonsocial
   function NM_export_f_razonsocial()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_razonsocial))
         {
             $this->f_razonsocial = sc_convert_encoding($this->f_razonsocial, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_razonsocial'])) ? $this->New_label['f_razonsocial'] : ""; 
          }
          else
          {
              $SC_Label = "f_razonsocial"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_razonsocial) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_razonsocial) . "\"";
         }
   }
   //----- f_ruc
   function NM_export_f_ruc()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_ruc))
         {
             $this->f_ruc = sc_convert_encoding($this->f_ruc, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_ruc'])) ? $this->New_label['f_ruc'] : ""; 
          }
          else
          {
              $SC_Label = "f_ruc"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_ruc) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_ruc) . "\"";
         }
   }
   //----- f_estab
   function NM_export_f_estab()
   {
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_estab'])) ? $this->New_label['f_estab'] : ""; 
          }
          else
          {
              $SC_Label = "f_estab"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_estab) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_estab) . "\"";
         }
   }
   //----- f_ptoemi
   function NM_export_f_ptoemi()
   {
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_ptoemi'])) ? $this->New_label['f_ptoemi'] : ""; 
          }
          else
          {
              $SC_Label = "f_ptoemi"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_ptoemi) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_ptoemi) . "\"";
         }
   }
   //----- f_secuencial
   function NM_export_f_secuencial()
   {
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_secuencial'])) ? $this->New_label['f_secuencial'] : ""; 
          }
          else
          {
              $SC_Label = "f_secuencial"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_secuencial) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_secuencial) . "\"";
         }
   }
   //----- f_lote
   function NM_export_f_lote()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_lote))
         {
             $this->f_lote = sc_convert_encoding($this->f_lote, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_lote'])) ? $this->New_label['f_lote'] : ""; 
          }
          else
          {
              $SC_Label = "f_lote"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_lote) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_lote) . "\"";
         }
   }
   //----- f_dirmatriz
   function NM_export_f_dirmatriz()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_dirmatriz))
         {
             $this->f_dirmatriz = sc_convert_encoding($this->f_dirmatriz, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_dirmatriz'])) ? $this->New_label['f_dirmatriz'] : ""; 
          }
          else
          {
              $SC_Label = "f_dirmatriz"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_dirmatriz) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_dirmatriz) . "\"";
         }
   }
   //----- f_fechaemision
   function NM_export_f_fechaemision()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_fechaemision))
         {
             $this->f_fechaemision = sc_convert_encoding($this->f_fechaemision, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_fechaemision'])) ? $this->New_label['f_fechaemision'] : ""; 
          }
          else
          {
              $SC_Label = "f_fechaemision"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_fechaemision) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_fechaemision) . "\"";
         }
   }
   //----- f_direstablecimiento
   function NM_export_f_direstablecimiento()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_direstablecimiento))
         {
             $this->f_direstablecimiento = sc_convert_encoding($this->f_direstablecimiento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_direstablecimiento'])) ? $this->New_label['f_direstablecimiento'] : ""; 
          }
          else
          {
              $SC_Label = "f_direstablecimiento"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_direstablecimiento) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_direstablecimiento) . "\"";
         }
   }
   //----- f_numcontribuyenteespecial
   function NM_export_f_numcontribuyenteespecial()
   {
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_numcontribuyenteespecial'])) ? $this->New_label['f_numcontribuyenteespecial'] : ""; 
          }
          else
          {
              $SC_Label = "f_numcontribuyenteespecial"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_numcontribuyenteespecial) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_numcontribuyenteespecial) . "\"";
         }
   }
   //----- f_obligadocontabilidad
   function NM_export_f_obligadocontabilidad()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_obligadocontabilidad))
         {
             $this->f_obligadocontabilidad = sc_convert_encoding($this->f_obligadocontabilidad, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_obligadocontabilidad'])) ? $this->New_label['f_obligadocontabilidad'] : ""; 
          }
          else
          {
              $SC_Label = "f_obligadocontabilidad"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_obligadocontabilidad) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_obligadocontabilidad) . "\"";
         }
   }
   //----- f_guiaremision
   function NM_export_f_guiaremision()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_guiaremision))
         {
             $this->f_guiaremision = sc_convert_encoding($this->f_guiaremision, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_guiaremision'])) ? $this->New_label['f_guiaremision'] : ""; 
          }
          else
          {
              $SC_Label = "f_guiaremision"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_guiaremision) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_guiaremision) . "\"";
         }
   }
   //----- f_razonsocialcomprador
   function NM_export_f_razonsocialcomprador()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_razonsocialcomprador))
         {
             $this->f_razonsocialcomprador = sc_convert_encoding($this->f_razonsocialcomprador, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_razonsocialcomprador'])) ? $this->New_label['f_razonsocialcomprador'] : ""; 
          }
          else
          {
              $SC_Label = "f_razonsocialcomprador"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_razonsocialcomprador) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_razonsocialcomprador) . "\"";
         }
   }
   //----- f_idcomprador
   function NM_export_f_idcomprador()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_idcomprador))
         {
             $this->f_idcomprador = sc_convert_encoding($this->f_idcomprador, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_idcomprador'])) ? $this->New_label['f_idcomprador'] : ""; 
          }
          else
          {
              $SC_Label = "f_idcomprador"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_idcomprador) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_idcomprador) . "\"";
         }
   }
   //----- f_base_12
   function NM_export_f_base_12()
   {
             nmgp_Form_Num_Val($this->f_base_12, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_base_12'])) ? $this->New_label['f_base_12'] : ""; 
          }
          else
          {
              $SC_Label = "f_base_12"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_base_12) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_base_12) . "\"";
         }
   }
   //----- f_base_0
   function NM_export_f_base_0()
   {
             nmgp_Form_Num_Val($this->f_base_0, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_base_0'])) ? $this->New_label['f_base_0'] : ""; 
          }
          else
          {
              $SC_Label = "f_base_0"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_base_0) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_base_0) . "\"";
         }
   }
   //----- f_totalsinimpuestos
   function NM_export_f_totalsinimpuestos()
   {
             nmgp_Form_Num_Val($this->f_totalsinimpuestos, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_totalsinimpuestos'])) ? $this->New_label['f_totalsinimpuestos'] : ""; 
          }
          else
          {
              $SC_Label = "f_totalsinimpuestos"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_totalsinimpuestos) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_totalsinimpuestos) . "\"";
         }
   }
   //----- f_totaldescuento
   function NM_export_f_totaldescuento()
   {
             nmgp_Form_Num_Val($this->f_totaldescuento, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_totaldescuento'])) ? $this->New_label['f_totaldescuento'] : ""; 
          }
          else
          {
              $SC_Label = "f_totaldescuento"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_totaldescuento) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_totaldescuento) . "\"";
         }
   }
   //----- f_tarifa1
   function NM_export_f_tarifa1()
   {
             nmgp_Form_Num_Val($this->f_tarifa1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "6", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_tarifa1'])) ? $this->New_label['f_tarifa1'] : "TARIFA1"; 
          }
          else
          {
              $SC_Label = "f_tarifa1"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_tarifa1) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_tarifa1) . "\"";
         }
   }
   //----- f_valor1
   function NM_export_f_valor1()
   {
             nmgp_Form_Num_Val($this->f_valor1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_valor1'])) ? $this->New_label['f_valor1'] : ""; 
          }
          else
          {
              $SC_Label = "f_valor1"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_valor1) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_valor1) . "\"";
         }
   }
   //----- f_propina
   function NM_export_f_propina()
   {
             nmgp_Form_Num_Val($this->f_propina, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_propina'])) ? $this->New_label['f_propina'] : ""; 
          }
          else
          {
              $SC_Label = "f_propina"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_propina) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_propina) . "\"";
         }
   }
   //----- f_importetotal
   function NM_export_f_importetotal()
   {
             nmgp_Form_Num_Val($this->f_importetotal, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_importetotal'])) ? $this->New_label['f_importetotal'] : ""; 
          }
          else
          {
              $SC_Label = "f_importetotal"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_importetotal) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_importetotal) . "\"";
         }
   }
   //----- f_campoadicional1
   function NM_export_f_campoadicional1()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_campoadicional1))
         {
             $this->f_campoadicional1 = sc_convert_encoding($this->f_campoadicional1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_campoadicional1'])) ? $this->New_label['f_campoadicional1'] : ""; 
          }
          else
          {
              $SC_Label = "f_campoadicional1"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_campoadicional1) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_campoadicional1) . "\"";
         }
   }
   //----- f_valoradicional1
   function NM_export_f_valoradicional1()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_valoradicional1))
         {
             $this->f_valoradicional1 = sc_convert_encoding($this->f_valoradicional1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_valoradicional1'])) ? $this->New_label['f_valoradicional1'] : ""; 
          }
          else
          {
              $SC_Label = "f_valoradicional1"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_valoradicional1) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_valoradicional1) . "\"";
         }
   }
   //----- f_campoadicional2
   function NM_export_f_campoadicional2()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_campoadicional2))
         {
             $this->f_campoadicional2 = sc_convert_encoding($this->f_campoadicional2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_campoadicional2'])) ? $this->New_label['f_campoadicional2'] : ""; 
          }
          else
          {
              $SC_Label = "f_campoadicional2"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_campoadicional2) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_campoadicional2) . "\"";
         }
   }
   //----- f_valoradicional2
   function NM_export_f_valoradicional2()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_valoradicional2))
         {
             $this->f_valoradicional2 = sc_convert_encoding($this->f_valoradicional2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_valoradicional2'])) ? $this->New_label['f_valoradicional2'] : ""; 
          }
          else
          {
              $SC_Label = "f_valoradicional2"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_valoradicional2) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_valoradicional2) . "\"";
         }
   }
   //----- f_campoadicional3
   function NM_export_f_campoadicional3()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_campoadicional3))
         {
             $this->f_campoadicional3 = sc_convert_encoding($this->f_campoadicional3, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_campoadicional3'])) ? $this->New_label['f_campoadicional3'] : ""; 
          }
          else
          {
              $SC_Label = "f_campoadicional3"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_campoadicional3) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_campoadicional3) . "\"";
         }
   }
   //----- f_valoradicional3
   function NM_export_f_valoradicional3()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_valoradicional3))
         {
             $this->f_valoradicional3 = sc_convert_encoding($this->f_valoradicional3, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_valoradicional3'])) ? $this->New_label['f_valoradicional3'] : ""; 
          }
          else
          {
              $SC_Label = "f_valoradicional3"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_valoradicional3) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_valoradicional3) . "\"";
         }
   }
   //----- f_campoadicional4
   function NM_export_f_campoadicional4()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_campoadicional4))
         {
             $this->f_campoadicional4 = sc_convert_encoding($this->f_campoadicional4, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_campoadicional4'])) ? $this->New_label['f_campoadicional4'] : ""; 
          }
          else
          {
              $SC_Label = "f_campoadicional4"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_campoadicional4) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_campoadicional4) . "\"";
         }
   }
   //----- f_valoradicional4
   function NM_export_f_valoradicional4()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_valoradicional4))
         {
             $this->f_valoradicional4 = sc_convert_encoding($this->f_valoradicional4, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_valoradicional4'])) ? $this->New_label['f_valoradicional4'] : ""; 
          }
          else
          {
              $SC_Label = "f_valoradicional4"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_valoradicional4) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_valoradicional4) . "\"";
         }
   }
   //----- f_campoadicional5
   function NM_export_f_campoadicional5()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_campoadicional5))
         {
             $this->f_campoadicional5 = sc_convert_encoding($this->f_campoadicional5, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_campoadicional5'])) ? $this->New_label['f_campoadicional5'] : ""; 
          }
          else
          {
              $SC_Label = "f_campoadicional5"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_campoadicional5) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_campoadicional5) . "\"";
         }
   }
   //----- f_valoradicional5
   function NM_export_f_valoradicional5()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_valoradicional5))
         {
             $this->f_valoradicional5 = sc_convert_encoding($this->f_valoradicional5, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_valoradicional5'])) ? $this->New_label['f_valoradicional5'] : ""; 
          }
          else
          {
              $SC_Label = "f_valoradicional5"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_valoradicional5) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_valoradicional5) . "\"";
         }
   }
   //----- f_campoadicional6
   function NM_export_f_campoadicional6()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_campoadicional6))
         {
             $this->f_campoadicional6 = sc_convert_encoding($this->f_campoadicional6, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_campoadicional6'])) ? $this->New_label['f_campoadicional6'] : ""; 
          }
          else
          {
              $SC_Label = "f_campoadicional6"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_campoadicional6) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_campoadicional6) . "\"";
         }
   }
   //----- f_valoradicional6
   function NM_export_f_valoradicional6()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_valoradicional6))
         {
             $this->f_valoradicional6 = sc_convert_encoding($this->f_valoradicional6, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_valoradicional6'])) ? $this->New_label['f_valoradicional6'] : ""; 
          }
          else
          {
              $SC_Label = "f_valoradicional6"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_valoradicional6) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_valoradicional6) . "\"";
         }
   }
   //----- f_campoadicional7
   function NM_export_f_campoadicional7()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_campoadicional7))
         {
             $this->f_campoadicional7 = sc_convert_encoding($this->f_campoadicional7, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_campoadicional7'])) ? $this->New_label['f_campoadicional7'] : ""; 
          }
          else
          {
              $SC_Label = "f_campoadicional7"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_campoadicional7) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_campoadicional7) . "\"";
         }
   }
   //----- f_valoradicional7
   function NM_export_f_valoradicional7()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_valoradicional7))
         {
             $this->f_valoradicional7 = sc_convert_encoding($this->f_valoradicional7, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_valoradicional7'])) ? $this->New_label['f_valoradicional7'] : ""; 
          }
          else
          {
              $SC_Label = "f_valoradicional7"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_valoradicional7) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_valoradicional7) . "\"";
         }
   }
   //----- f_campoadicional8
   function NM_export_f_campoadicional8()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_campoadicional8))
         {
             $this->f_campoadicional8 = sc_convert_encoding($this->f_campoadicional8, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_campoadicional8'])) ? $this->New_label['f_campoadicional8'] : ""; 
          }
          else
          {
              $SC_Label = "f_campoadicional8"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_campoadicional8) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_campoadicional8) . "\"";
         }
   }
   //----- f_valoradicional8
   function NM_export_f_valoradicional8()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_valoradicional8))
         {
             $this->f_valoradicional8 = sc_convert_encoding($this->f_valoradicional8, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_valoradicional8'])) ? $this->New_label['f_valoradicional8'] : ""; 
          }
          else
          {
              $SC_Label = "f_valoradicional8"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_valoradicional8) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_valoradicional8) . "\"";
         }
   }
   //----- f_campoadicional9
   function NM_export_f_campoadicional9()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_campoadicional9))
         {
             $this->f_campoadicional9 = sc_convert_encoding($this->f_campoadicional9, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_campoadicional9'])) ? $this->New_label['f_campoadicional9'] : ""; 
          }
          else
          {
              $SC_Label = "f_campoadicional9"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_campoadicional9) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_campoadicional9) . "\"";
         }
   }
   //----- f_valoradicional9
   function NM_export_f_valoradicional9()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_valoradicional9))
         {
             $this->f_valoradicional9 = sc_convert_encoding($this->f_valoradicional9, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_valoradicional9'])) ? $this->New_label['f_valoradicional9'] : ""; 
          }
          else
          {
              $SC_Label = "f_valoradicional9"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_valoradicional9) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_valoradicional9) . "\"";
         }
   }
   //----- f_campoadicional10
   function NM_export_f_campoadicional10()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_campoadicional10))
         {
             $this->f_campoadicional10 = sc_convert_encoding($this->f_campoadicional10, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_campoadicional10'])) ? $this->New_label['f_campoadicional10'] : ""; 
          }
          else
          {
              $SC_Label = "f_campoadicional10"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_campoadicional10) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_campoadicional10) . "\"";
         }
   }
   //----- f_valoradicional10
   function NM_export_f_valoradicional10()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_valoradicional10))
         {
             $this->f_valoradicional10 = sc_convert_encoding($this->f_valoradicional10, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_valoradicional10'])) ? $this->New_label['f_valoradicional10'] : ""; 
          }
          else
          {
              $SC_Label = "f_valoradicional10"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_valoradicional10) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_valoradicional10) . "\"";
         }
   }
   //----- f_campoadicional11
   function NM_export_f_campoadicional11()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_campoadicional11))
         {
             $this->f_campoadicional11 = sc_convert_encoding($this->f_campoadicional11, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_campoadicional11'])) ? $this->New_label['f_campoadicional11'] : ""; 
          }
          else
          {
              $SC_Label = "f_campoadicional11"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_campoadicional11) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_campoadicional11) . "\"";
         }
   }
   //----- f_valoradicional11
   function NM_export_f_valoradicional11()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_valoradicional11))
         {
             $this->f_valoradicional11 = sc_convert_encoding($this->f_valoradicional11, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_valoradicional11'])) ? $this->New_label['f_valoradicional11'] : ""; 
          }
          else
          {
              $SC_Label = "f_valoradicional11"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_valoradicional11) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_valoradicional11) . "\"";
         }
   }
   //----- f_campoadicional12
   function NM_export_f_campoadicional12()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_campoadicional12))
         {
             $this->f_campoadicional12 = sc_convert_encoding($this->f_campoadicional12, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_campoadicional12'])) ? $this->New_label['f_campoadicional12'] : "CAMPOADICIONAL12"; 
          }
          else
          {
              $SC_Label = "f_campoadicional12"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_campoadicional12) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_campoadicional12) . "\"";
         }
   }
   //----- f_valoradicional12
   function NM_export_f_valoradicional12()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_valoradicional12))
         {
             $this->f_valoradicional12 = sc_convert_encoding($this->f_valoradicional12, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_valoradicional12'])) ? $this->New_label['f_valoradicional12'] : "VALORADICIONAL12"; 
          }
          else
          {
              $SC_Label = "f_valoradicional12"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_valoradicional12) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_valoradicional12) . "\"";
         }
   }
   //----- f_campoadicional13
   function NM_export_f_campoadicional13()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_campoadicional13))
         {
             $this->f_campoadicional13 = sc_convert_encoding($this->f_campoadicional13, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_campoadicional13'])) ? $this->New_label['f_campoadicional13'] : "CAMPOADICIONAL13"; 
          }
          else
          {
              $SC_Label = "f_campoadicional13"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_campoadicional13) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_campoadicional13) . "\"";
         }
   }
   //----- f_valoradicional13
   function NM_export_f_valoradicional13()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_valoradicional13))
         {
             $this->f_valoradicional13 = sc_convert_encoding($this->f_valoradicional13, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_valoradicional13'])) ? $this->New_label['f_valoradicional13'] : "VALORADICIONAL13"; 
          }
          else
          {
              $SC_Label = "f_valoradicional13"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_valoradicional13) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_valoradicional13) . "\"";
         }
   }
   //----- f_campoadicional14
   function NM_export_f_campoadicional14()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_campoadicional14))
         {
             $this->f_campoadicional14 = sc_convert_encoding($this->f_campoadicional14, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_campoadicional14'])) ? $this->New_label['f_campoadicional14'] : "CAMPOADICIONAL14"; 
          }
          else
          {
              $SC_Label = "f_campoadicional14"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_campoadicional14) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_campoadicional14) . "\"";
         }
   }
   //----- f_valoradicional14
   function NM_export_f_valoradicional14()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_valoradicional14))
         {
             $this->f_valoradicional14 = sc_convert_encoding($this->f_valoradicional14, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_valoradicional14'])) ? $this->New_label['f_valoradicional14'] : "VALORADICIONAL14"; 
          }
          else
          {
              $SC_Label = "f_valoradicional14"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_valoradicional14) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_valoradicional14) . "\"";
         }
   }
   //----- f_campoadicional15
   function NM_export_f_campoadicional15()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_campoadicional15))
         {
             $this->f_campoadicional15 = sc_convert_encoding($this->f_campoadicional15, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_campoadicional15'])) ? $this->New_label['f_campoadicional15'] : "CAMPOADICIONAL15"; 
          }
          else
          {
              $SC_Label = "f_campoadicional15"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_campoadicional15) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_campoadicional15) . "\"";
         }
   }
   //----- f_valoradicional15
   function NM_export_f_valoradicional15()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_valoradicional15))
         {
             $this->f_valoradicional15 = sc_convert_encoding($this->f_valoradicional15, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_valoradicional15'])) ? $this->New_label['f_valoradicional15'] : "VALORADICIONAL15"; 
          }
          else
          {
              $SC_Label = "f_valoradicional15"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_valoradicional15) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_valoradicional15) . "\"";
         }
   }
   //----- f_campoadicional16
   function NM_export_f_campoadicional16()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_campoadicional16))
         {
             $this->f_campoadicional16 = sc_convert_encoding($this->f_campoadicional16, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_campoadicional16'])) ? $this->New_label['f_campoadicional16'] : "CAMPOADICIONAL16"; 
          }
          else
          {
              $SC_Label = "f_campoadicional16"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_campoadicional16) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_campoadicional16) . "\"";
         }
   }
   //----- f_valoradicional16
   function NM_export_f_valoradicional16()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_valoradicional16))
         {
             $this->f_valoradicional16 = sc_convert_encoding($this->f_valoradicional16, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_valoradicional16'])) ? $this->New_label['f_valoradicional16'] : "VALORADICIONAL16"; 
          }
          else
          {
              $SC_Label = "f_valoradicional16"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_valoradicional16) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_valoradicional16) . "\"";
         }
   }
   //----- f_campoadicional17
   function NM_export_f_campoadicional17()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_campoadicional17))
         {
             $this->f_campoadicional17 = sc_convert_encoding($this->f_campoadicional17, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_campoadicional17'])) ? $this->New_label['f_campoadicional17'] : "CAMPOADICIONAL17"; 
          }
          else
          {
              $SC_Label = "f_campoadicional17"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_campoadicional17) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_campoadicional17) . "\"";
         }
   }
   //----- f_valoradicional17
   function NM_export_f_valoradicional17()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_valoradicional17))
         {
             $this->f_valoradicional17 = sc_convert_encoding($this->f_valoradicional17, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_valoradicional17'])) ? $this->New_label['f_valoradicional17'] : "VALORADICIONAL17"; 
          }
          else
          {
              $SC_Label = "f_valoradicional17"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_valoradicional17) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_valoradicional17) . "\"";
         }
   }
   //----- f_campoadicional18
   function NM_export_f_campoadicional18()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_campoadicional18))
         {
             $this->f_campoadicional18 = sc_convert_encoding($this->f_campoadicional18, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_campoadicional18'])) ? $this->New_label['f_campoadicional18'] : "CAMPOADICIONAL18"; 
          }
          else
          {
              $SC_Label = "f_campoadicional18"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_campoadicional18) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_campoadicional18) . "\"";
         }
   }
   //----- f_valoradicional18
   function NM_export_f_valoradicional18()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_valoradicional18))
         {
             $this->f_valoradicional18 = sc_convert_encoding($this->f_valoradicional18, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_valoradicional18'])) ? $this->New_label['f_valoradicional18'] : "VALORADICIONAL18"; 
          }
          else
          {
              $SC_Label = "f_valoradicional18"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_valoradicional18) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_valoradicional18) . "\"";
         }
   }
   //----- f_campoadicional19
   function NM_export_f_campoadicional19()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_campoadicional19))
         {
             $this->f_campoadicional19 = sc_convert_encoding($this->f_campoadicional19, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_campoadicional19'])) ? $this->New_label['f_campoadicional19'] : "CAMPOADICIONAL19"; 
          }
          else
          {
              $SC_Label = "f_campoadicional19"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_campoadicional19) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_campoadicional19) . "\"";
         }
   }
   //----- f_valoradicional19
   function NM_export_f_valoradicional19()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_valoradicional19))
         {
             $this->f_valoradicional19 = sc_convert_encoding($this->f_valoradicional19, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_valoradicional19'])) ? $this->New_label['f_valoradicional19'] : "VALORADICIONAL19"; 
          }
          else
          {
              $SC_Label = "f_valoradicional19"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_valoradicional19) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_valoradicional19) . "\"";
         }
   }
   //----- f_campoadicional20
   function NM_export_f_campoadicional20()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_campoadicional20))
         {
             $this->f_campoadicional20 = sc_convert_encoding($this->f_campoadicional20, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_campoadicional20'])) ? $this->New_label['f_campoadicional20'] : "CAMPOADICIONAL20"; 
          }
          else
          {
              $SC_Label = "f_campoadicional20"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_campoadicional20) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_campoadicional20) . "\"";
         }
   }
   //----- f_valoradicional20
   function NM_export_f_valoradicional20()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_valoradicional20))
         {
             $this->f_valoradicional20 = sc_convert_encoding($this->f_valoradicional20, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_valoradicional20'])) ? $this->New_label['f_valoradicional20'] : "VALORADICIONAL20"; 
          }
          else
          {
              $SC_Label = "f_valoradicional20"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_valoradicional20) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_valoradicional20) . "\"";
         }
   }
   //----- ff_clave_acceso
   function NM_export_ff_clave_acceso()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->ff_clave_acceso))
         {
             $this->ff_clave_acceso = sc_convert_encoding($this->ff_clave_acceso, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['ff_clave_acceso'])) ? $this->New_label['ff_clave_acceso'] : ""; 
          }
          else
          {
              $SC_Label = "ff_clave_acceso"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->ff_clave_acceso) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->ff_clave_acceso) . "\"";
         }
   }
   //----- ff_numeroautorizacion
   function NM_export_ff_numeroautorizacion()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->ff_numeroautorizacion))
         {
             $this->ff_numeroautorizacion = sc_convert_encoding($this->ff_numeroautorizacion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['ff_numeroautorizacion'])) ? $this->New_label['ff_numeroautorizacion'] : ""; 
          }
          else
          {
              $SC_Label = "ff_numeroautorizacion"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->ff_numeroautorizacion) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->ff_numeroautorizacion) . "\"";
         }
   }
   //----- ff_fechaautorizacion
   function NM_export_ff_fechaautorizacion()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->ff_fechaautorizacion))
         {
             $this->ff_fechaautorizacion = sc_convert_encoding($this->ff_fechaautorizacion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['ff_fechaautorizacion'])) ? $this->New_label['ff_fechaautorizacion'] : ""; 
          }
          else
          {
              $SC_Label = "ff_fechaautorizacion"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->ff_fechaautorizacion) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->ff_fechaautorizacion) . "\"";
         }
   }
   //----- f_numpagos
   function NM_export_f_numpagos()
   {
             nmgp_Form_Num_Val($this->f_numpagos, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_numpagos'])) ? $this->New_label['f_numpagos'] : "NUMPAGOS"; 
          }
          else
          {
              $SC_Label = "f_numpagos"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_numpagos) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_numpagos) . "\"";
         }
   }
   //----- f_formapago1
   function NM_export_f_formapago1()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_f_formapago1))
         {
             $this->look_f_formapago1 = sc_convert_encoding($this->look_f_formapago1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_formapago1'])) ? $this->New_label['f_formapago1'] : "FORMAPAGO1"; 
          }
          else
          {
              $SC_Label = "f_formapago1"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->look_f_formapago1) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->look_f_formapago1) . "\"";
         }
   }
   //----- f_valortot1
   function NM_export_f_valortot1()
   {
             nmgp_Form_Num_Val($this->f_valortot1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_valortot1'])) ? $this->New_label['f_valortot1'] : "VALORTOT1"; 
          }
          else
          {
              $SC_Label = "f_valortot1"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_valortot1) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_valortot1) . "\"";
         }
   }
   //----- f_plazo1
   function NM_export_f_plazo1()
   {
             nmgp_Form_Num_Val($this->f_plazo1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_plazo1'])) ? $this->New_label['f_plazo1'] : "PLAZO1"; 
          }
          else
          {
              $SC_Label = "f_plazo1"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_plazo1) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_plazo1) . "\"";
         }
   }
   //----- f_unidadtiempo1
   function NM_export_f_unidadtiempo1()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_unidadtiempo1))
         {
             $this->f_unidadtiempo1 = sc_convert_encoding($this->f_unidadtiempo1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_unidadtiempo1'])) ? $this->New_label['f_unidadtiempo1'] : "UNIDADTIEMPO1"; 
          }
          else
          {
              $SC_Label = "f_unidadtiempo1"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_unidadtiempo1) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_unidadtiempo1) . "\"";
         }
   }
   //----- f_formapago2
   function NM_export_f_formapago2()
   {
             nmgp_Form_Num_Val($this->f_formapago2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_formapago2'])) ? $this->New_label['f_formapago2'] : "FORMAPAGO2"; 
          }
          else
          {
              $SC_Label = "f_formapago2"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_formapago2) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_formapago2) . "\"";
         }
   }
   //----- f_valortot2
   function NM_export_f_valortot2()
   {
             nmgp_Form_Num_Val($this->f_valortot2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "6", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_valortot2'])) ? $this->New_label['f_valortot2'] : "VALORTOT2"; 
          }
          else
          {
              $SC_Label = "f_valortot2"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_valortot2) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_valortot2) . "\"";
         }
   }
   //----- f_plazo2
   function NM_export_f_plazo2()
   {
             nmgp_Form_Num_Val($this->f_plazo2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_plazo2'])) ? $this->New_label['f_plazo2'] : "PLAZO2"; 
          }
          else
          {
              $SC_Label = "f_plazo2"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_plazo2) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_plazo2) . "\"";
         }
   }
   //----- f_unidadtiempo2
   function NM_export_f_unidadtiempo2()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->f_unidadtiempo2))
         {
             $this->f_unidadtiempo2 = sc_convert_encoding($this->f_unidadtiempo2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_unidadtiempo2'])) ? $this->New_label['f_unidadtiempo2'] : "UNIDADTIEMPO2"; 
          }
          else
          {
              $SC_Label = "f_unidadtiempo2"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->f_unidadtiempo2) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->f_unidadtiempo2) . "\"";
         }
   }
   //----- f_ambiente
   function NM_export_f_ambiente()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_f_ambiente))
         {
             $this->look_f_ambiente = sc_convert_encoding($this->look_f_ambiente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['f_ambiente'])) ? $this->New_label['f_ambiente'] : "AMBIENTE"; 
          }
          else
          {
              $SC_Label = "f_ambiente"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->look_f_ambiente) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->look_f_ambiente) . "\"";
         }
   }
   //----- ice
   function NM_export_ice()
   {
             nmgp_Form_Num_Val($this->ice, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['ice'])) ? $this->New_label['ice'] : "ICE"; 
          }
          else
          {
              $SC_Label = "ice"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->ice) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->ice) . "\"";
         }
   }
   //----- ca_bar
   function NM_export_ca_bar()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->ca_bar))
         {
             $this->ca_bar = sc_convert_encoding($this->ca_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['ca_bar'])) ? $this->New_label['ca_bar'] : "ca_bar"; 
          }
          else
          {
              $SC_Label = "ca_bar"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->ca_bar) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->ca_bar) . "\"";
         }
   }
   //----- detalle
   function NM_export_detalle()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->detalle))
         {
             $this->detalle = sc_convert_encoding($this->detalle, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['detalle'])) ? $this->New_label['detalle'] : "detalle"; 
          }
          else
          {
              $SC_Label = "detalle"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->detalle) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->detalle) . "\"";
         }
   }
   //----- detalle_cantidad
   function NM_export_detalle_cantidad()
   {
             nmgp_Form_Num_Val($this->detalle_cantidad, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "1", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['detalle_cantidad'])) ? $this->New_label['detalle_cantidad'] : "CANTIDAD"; 
          }
          else
          {
              $SC_Label = "detalle_cantidad"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->detalle_cantidad) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->detalle_cantidad) . "\"";
         }
   }
   //----- detalle_descuento
   function NM_export_detalle_descuento()
   {
             nmgp_Form_Num_Val($this->detalle_descuento, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['detalle_descuento'])) ? $this->New_label['detalle_descuento'] : "DESCUENTO"; 
          }
          else
          {
              $SC_Label = "detalle_descuento"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->detalle_descuento) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->detalle_descuento) . "\"";
         }
   }
   //----- detalle_item
   function NM_export_detalle_item()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->detalle_item))
         {
             $this->detalle_item = sc_convert_encoding($this->detalle_item, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['detalle_item'])) ? $this->New_label['detalle_item'] : "ITEM"; 
          }
          else
          {
              $SC_Label = "detalle_item"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->detalle_item) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->detalle_item) . "\"";
         }
   }
   //----- detalle_preciototalsinimpuesto
   function NM_export_detalle_preciototalsinimpuesto()
   {
             nmgp_Form_Num_Val($this->detalle_preciototalsinimpuesto, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['detalle_preciototalsinimpuesto'])) ? $this->New_label['detalle_preciototalsinimpuesto'] : "PRECIOTOTALSINIMPUESTO"; 
          }
          else
          {
              $SC_Label = "detalle_preciototalsinimpuesto"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->detalle_preciototalsinimpuesto) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->detalle_preciototalsinimpuesto) . "\"";
         }
   }
   //----- detalle_preciounitario
   function NM_export_detalle_preciounitario()
   {
             nmgp_Form_Num_Val($this->detalle_preciounitario, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['detalle_preciounitario'])) ? $this->New_label['detalle_preciounitario'] : "PRECIOUNITARIO"; 
          }
          else
          {
              $SC_Label = "detalle_preciounitario"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->detalle_preciounitario) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->detalle_preciounitario) . "\"";
         }
   }
   //----- direccion
   function NM_export_direccion()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->direccion))
         {
             $this->direccion = sc_convert_encoding($this->direccion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['direccion'])) ? $this->New_label['direccion'] : "direccion"; 
          }
          else
          {
              $SC_Label = "direccion"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->direccion) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->direccion) . "\"";
         }
   }
   //----- fecha_auth_format
   function NM_export_fecha_auth_format()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->fecha_auth_format))
         {
             $this->fecha_auth_format = sc_convert_encoding($this->fecha_auth_format, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['fecha_auth_format'])) ? $this->New_label['fecha_auth_format'] : "fecha_auth_format"; 
          }
          else
          {
              $SC_Label = "fecha_auth_format"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fecha_auth_format) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fecha_auth_format) . "\"";
         }
   }
   //----- label_atencion
   function NM_export_label_atencion()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->label_atencion))
         {
             $this->label_atencion = sc_convert_encoding($this->label_atencion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['label_atencion'])) ? $this->New_label['label_atencion'] : "label_atencion"; 
          }
          else
          {
              $SC_Label = "label_atencion"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->label_atencion) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->label_atencion) . "\"";
         }
   }
   //----- label_ca
   function NM_export_label_ca()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->label_ca))
         {
             $this->label_ca = sc_convert_encoding($this->label_ca, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['label_ca'])) ? $this->New_label['label_ca'] : "label_ca"; 
          }
          else
          {
              $SC_Label = "label_ca"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->label_ca) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->label_ca) . "\"";
         }
   }
   //----- label_codcliente
   function NM_export_label_codcliente()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->label_codcliente))
         {
             $this->label_codcliente = sc_convert_encoding($this->label_codcliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['label_codcliente'])) ? $this->New_label['label_codcliente'] : "label_codcliente"; 
          }
          else
          {
              $SC_Label = "label_codcliente"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->label_codcliente) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->label_codcliente) . "\"";
         }
   }
   //----- label_contr_especial
   function NM_export_label_contr_especial()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->label_contr_especial))
         {
             $this->label_contr_especial = sc_convert_encoding($this->label_contr_especial, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['label_contr_especial'])) ? $this->New_label['label_contr_especial'] : "label_contr_especial"; 
          }
          else
          {
              $SC_Label = "label_contr_especial"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->label_contr_especial) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->label_contr_especial) . "\"";
         }
   }
   //----- label_descuento
   function NM_export_label_descuento()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->label_descuento))
         {
             $this->label_descuento = sc_convert_encoding($this->label_descuento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['label_descuento'])) ? $this->New_label['label_descuento'] : "label_descuento"; 
          }
          else
          {
              $SC_Label = "label_descuento"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->label_descuento) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->label_descuento) . "\"";
         }
   }
   //----- label_dircliente
   function NM_export_label_dircliente()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->label_dircliente))
         {
             $this->label_dircliente = sc_convert_encoding($this->label_dircliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['label_dircliente'])) ? $this->New_label['label_dircliente'] : "label_dircliente"; 
          }
          else
          {
              $SC_Label = "label_dircliente"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->label_dircliente) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->label_dircliente) . "\"";
         }
   }
   //----- label_fecha_auth
   function NM_export_label_fecha_auth()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->label_fecha_auth))
         {
             $this->label_fecha_auth = sc_convert_encoding($this->label_fecha_auth, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['label_fecha_auth'])) ? $this->New_label['label_fecha_auth'] : "label_fecha_auth"; 
          }
          else
          {
              $SC_Label = "label_fecha_auth"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->label_fecha_auth) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->label_fecha_auth) . "\"";
         }
   }
   //----- label_fecha_emision
   function NM_export_label_fecha_emision()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->label_fecha_emision))
         {
             $this->label_fecha_emision = sc_convert_encoding($this->label_fecha_emision, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['label_fecha_emision'])) ? $this->New_label['label_fecha_emision'] : "label_fecha_emision"; 
          }
          else
          {
              $SC_Label = "label_fecha_emision"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->label_fecha_emision) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->label_fecha_emision) . "\"";
         }
   }
   //----- label_file
   function NM_export_label_file()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->label_file))
         {
             $this->label_file = sc_convert_encoding($this->label_file, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['label_file'])) ? $this->New_label['label_file'] : "label_file"; 
          }
          else
          {
              $SC_Label = "label_file"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->label_file) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->label_file) . "\"";
         }
   }
   //----- label_formapago
   function NM_export_label_formapago()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->label_formapago))
         {
             $this->label_formapago = sc_convert_encoding($this->label_formapago, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['label_formapago'])) ? $this->New_label['label_formapago'] : "label_formapago"; 
          }
          else
          {
              $SC_Label = "label_formapago"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->label_formapago) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->label_formapago) . "\"";
         }
   }
   //----- label_guia_remision
   function NM_export_label_guia_remision()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->label_guia_remision))
         {
             $this->label_guia_remision = sc_convert_encoding($this->label_guia_remision, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['label_guia_remision'])) ? $this->New_label['label_guia_remision'] : "label_guia_remision"; 
          }
          else
          {
              $SC_Label = "label_guia_remision"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->label_guia_remision) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->label_guia_remision) . "\"";
         }
   }
   //----- label_iva
   function NM_export_label_iva()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->label_iva))
         {
             $this->label_iva = sc_convert_encoding($this->label_iva, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['label_iva'])) ? $this->New_label['label_iva'] : "label_iva"; 
          }
          else
          {
              $SC_Label = "label_iva"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->label_iva) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->label_iva) . "\"";
         }
   }
   //----- label_lote
   function NM_export_label_lote()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->label_lote))
         {
             $this->label_lote = sc_convert_encoding($this->label_lote, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['label_lote'])) ? $this->New_label['label_lote'] : "label_lote"; 
          }
          else
          {
              $SC_Label = "label_lote"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->label_lote) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->label_lote) . "\"";
         }
   }
   //----- label_nom_cliente
   function NM_export_label_nom_cliente()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->label_nom_cliente))
         {
             $this->label_nom_cliente = sc_convert_encoding($this->label_nom_cliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['label_nom_cliente'])) ? $this->New_label['label_nom_cliente'] : "label_nom_cliente"; 
          }
          else
          {
              $SC_Label = "label_nom_cliente"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->label_nom_cliente) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->label_nom_cliente) . "\"";
         }
   }
   //----- label_num_auth
   function NM_export_label_num_auth()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->label_num_auth))
         {
             $this->label_num_auth = sc_convert_encoding($this->label_num_auth, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['label_num_auth'])) ? $this->New_label['label_num_auth'] : "label_num_auth"; 
          }
          else
          {
              $SC_Label = "label_num_auth"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->label_num_auth) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->label_num_auth) . "\"";
         }
   }
   //----- label_obligado_cont
   function NM_export_label_obligado_cont()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->label_obligado_cont))
         {
             $this->label_obligado_cont = sc_convert_encoding($this->label_obligado_cont, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['label_obligado_cont'])) ? $this->New_label['label_obligado_cont'] : "label_obligado_cont"; 
          }
          else
          {
              $SC_Label = "label_obligado_cont"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->label_obligado_cont) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->label_obligado_cont) . "\"";
         }
   }
   //----- label_promo
   function NM_export_label_promo()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->label_promo))
         {
             $this->label_promo = sc_convert_encoding($this->label_promo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['label_promo'])) ? $this->New_label['label_promo'] : "label_promo"; 
          }
          else
          {
              $SC_Label = "label_promo"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->label_promo) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->label_promo) . "\"";
         }
   }
   //----- label_ruccliente
   function NM_export_label_ruccliente()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->label_ruccliente))
         {
             $this->label_ruccliente = sc_convert_encoding($this->label_ruccliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['label_ruccliente'])) ? $this->New_label['label_ruccliente'] : "label_ruccliente"; 
          }
          else
          {
              $SC_Label = "label_ruccliente"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->label_ruccliente) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->label_ruccliente) . "\"";
         }
   }
   //----- label_stexento
   function NM_export_label_stexento()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->label_stexento))
         {
             $this->label_stexento = sc_convert_encoding($this->label_stexento, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['label_stexento'])) ? $this->New_label['label_stexento'] : "label_stexento"; 
          }
          else
          {
              $SC_Label = "label_stexento"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->label_stexento) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->label_stexento) . "\"";
         }
   }
   //----- label_stgravado
   function NM_export_label_stgravado()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->label_stgravado))
         {
             $this->label_stgravado = sc_convert_encoding($this->label_stgravado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['label_stgravado'])) ? $this->New_label['label_stgravado'] : "label_stgravado"; 
          }
          else
          {
              $SC_Label = "label_stgravado"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->label_stgravado) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->label_stgravado) . "\"";
         }
   }
   //----- label_subtotal
   function NM_export_label_subtotal()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->label_subtotal))
         {
             $this->label_subtotal = sc_convert_encoding($this->label_subtotal, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['label_subtotal'])) ? $this->New_label['label_subtotal'] : "label_subtotal"; 
          }
          else
          {
              $SC_Label = "label_subtotal"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->label_subtotal) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->label_subtotal) . "\"";
         }
   }
   //----- label_suma_letras
   function NM_export_label_suma_letras()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->label_suma_letras))
         {
             $this->label_suma_letras = sc_convert_encoding($this->label_suma_letras, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['label_suma_letras'])) ? $this->New_label['label_suma_letras'] : "label_suma_letras"; 
          }
          else
          {
              $SC_Label = "label_suma_letras"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->label_suma_letras) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->label_suma_letras) . "\"";
         }
   }
   //----- label_telfcliente
   function NM_export_label_telfcliente()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->label_telfcliente))
         {
             $this->label_telfcliente = sc_convert_encoding($this->label_telfcliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['label_telfcliente'])) ? $this->New_label['label_telfcliente'] : "label_telfcliente"; 
          }
          else
          {
              $SC_Label = "label_telfcliente"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->label_telfcliente) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->label_telfcliente) . "\"";
         }
   }
   //----- label_vence
   function NM_export_label_vence()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->label_vence))
         {
             $this->label_vence = sc_convert_encoding($this->label_vence, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['label_vence'])) ? $this->New_label['label_vence'] : "label_vence"; 
          }
          else
          {
              $SC_Label = "label_vence"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->label_vence) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->label_vence) . "\"";
         }
   }
   //----- label_vendedor
   function NM_export_label_vendedor()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->label_vendedor))
         {
             $this->label_vendedor = sc_convert_encoding($this->label_vendedor, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['label_vendedor'])) ? $this->New_label['label_vendedor'] : "label_vendedor"; 
          }
          else
          {
              $SC_Label = "label_vendedor"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->label_vendedor) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->label_vendedor) . "\"";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - FACTURA :: XML</TITLE>
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
<form name="Fdown" method="get" action="pdfreport_FACTURA_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdfreport_FACTURA"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['xml_return']); ?>"> 
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
