<?php

class grid_NUEVAS_FACTURAS_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Texto_tag;
   var $Arquivo;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("es");
      $this->Texto_tag = "";
   }

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Rtf_f);
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
                   nm_limpa_str_grid_NUEVAS_FACTURAS($cadapar[1]);
                   nm_protect_num_grid_NUEVAS_FACTURAS($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_NUEVAS_FACTURAS']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($var_secuencial)) 
      {
          $_SESSION['var_secuencial'] = $var_secuencial;
          nm_limpa_str_grid_NUEVAS_FACTURAS($_SESSION["var_secuencial"]);
      }
      if (isset($var_lote)) 
      {
          $_SESSION['var_lote'] = $var_lote;
          nm_limpa_str_grid_NUEVAS_FACTURAS($_SESSION["var_lote"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_NUEVAS_FACTURAS";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_NUEVAS_FACTURAS.rtf";
   }

   //----- 
   function gera_texto_tag()
   {
     global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_NUEVAS_FACTURAS']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_NUEVAS_FACTURAS']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_NUEVAS_FACTURAS']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['campos_busca']))
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['f_estab'])) ? $this->New_label['f_estab'] : "ESTAB"; 
          if ($Cada_col == "f_estab" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['f_ptoemi'])) ? $this->New_label['f_ptoemi'] : "PTOEMI"; 
          if ($Cada_col == "f_ptoemi" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['f_secuencial'])) ? $this->New_label['f_secuencial'] : "SECUENCIAL"; 
          if ($Cada_col == "f_secuencial" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['f_lote'])) ? $this->New_label['f_lote'] : "LOTE"; 
          if ($Cada_col == "f_lote" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->Texto_tag .= "</tr>\r\n";
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT F.ESTAB as f_estab, F.PTOEMI as f_ptoemi, F.SECUENCIAL as f_secuencial, F.LOTE as f_lote, F.RAZONSOCIAL as f_razonsocial, F.NOMBRECOMERCIAL as f_nombrecomercial, F.RUC as f_ruc, F.DIRMATRIZ as f_dirmatriz, F.FECHAEMISION as f_fechaemision, F.DIRESTABLECIMIENTO as f_direstablecimiento, F.NUMCONTRIBUYENTEESPECIAL as f_numcontribuyenteespecial, F.OBLIGADOCONTABILIDAD as f_obligadocontabilidad, F.TIPOIDENTCOMPRADOR as f_tipoidentcomprador, F.GUIAREMISION as f_guiaremision, F.RAZONSOCIALCOMPRADOR as f_razonsocialcomprador, F.IDCOMPRADOR as f_idcomprador, F.TOTALSINIMPUESTOS as f_totalsinimpuestos, F.TOTALDESCUENTO as f_totaldescuento, F.BASE_12 as f_base_12, F.BASE_0 as f_base_0, F.CODPORCENTAJEIMPUESTO as f_codporcentajeimpuesto, F.VALOR1 as f_valor1, F.PROPINA as f_propina, F.IMPORTETOTAL as f_importetotal, F.MONEDA as f_moneda, F.CAMPOADICIONAL1 as f_campoadicional1, F.VALORADICIONAL1 as f_valoradicional1, F.CAMPOADICIONAL2 as f_campoadicional2, F.VALORADICIONAL2 as f_valoradicional2, F.CAMPOADICIONAL3 as f_campoadicional3, F.VALORADICIONAL3 as f_valoradicional3, F.CAMPOADICIONAL4 as f_campoadicional4, F.VALORADICIONAL4 as f_valoradicional4, F.CAMPOADICIONAL5 as f_campoadicional5, F.VALORADICIONAL5 as f_valoradicional5, F.CAMPOADICIONAL6 as f_campoadicional6, F.VALORADICIONAL6 as f_valoradicional6, F.CAMPOADICIONAL7 as f_campoadicional7, F.VALORADICIONAL7 as f_valoradicional7, F.CAMPOADICIONAL8 as f_campoadicional8, F.VALORADICIONAL8 as f_valoradicional8, F.CAMPOADICIONAL9 as f_campoadicional9, F.VALORADICIONAL9 as f_valoradicional9, F.CAMPOADICIONAL10 as f_campoadicional10, F.VALORADICIONAL10 as f_valoradicional10, F.CAMPOADICIONAL11 as f_campoadicional11, F.VALORADICIONAL11 as f_valoradicional11, F.CAMPOADICIONAL12 as f_campoadicional12, F.VALORADICIONAL12 as f_valoradicional12, F.CAMPOADICIONAL13 as f_campoadicional13, F.VALORADICIONAL13 as f_valoradicional13, F.CAMPOADICIONAL14 as f_campoadicional14, F.VALORADICIONAL14 as f_valoradicional14, F.CAMPOADICIONAL15 as f_campoadicional15, F.VALORADICIONAL15 as f_valoradicional15 from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT F.ESTAB as f_estab, F.PTOEMI as f_ptoemi, F.SECUENCIAL as f_secuencial, F.LOTE as f_lote, F.RAZONSOCIAL as f_razonsocial, F.NOMBRECOMERCIAL as f_nombrecomercial, F.RUC as f_ruc, F.DIRMATRIZ as f_dirmatriz, F.FECHAEMISION as f_fechaemision, F.DIRESTABLECIMIENTO as f_direstablecimiento, F.NUMCONTRIBUYENTEESPECIAL as f_numcontribuyenteespecial, F.OBLIGADOCONTABILIDAD as f_obligadocontabilidad, F.TIPOIDENTCOMPRADOR as f_tipoidentcomprador, F.GUIAREMISION as f_guiaremision, F.RAZONSOCIALCOMPRADOR as f_razonsocialcomprador, F.IDCOMPRADOR as f_idcomprador, F.TOTALSINIMPUESTOS as f_totalsinimpuestos, F.TOTALDESCUENTO as f_totaldescuento, F.BASE_12 as f_base_12, F.BASE_0 as f_base_0, F.CODPORCENTAJEIMPUESTO as f_codporcentajeimpuesto, F.VALOR1 as f_valor1, F.PROPINA as f_propina, F.IMPORTETOTAL as f_importetotal, F.MONEDA as f_moneda, F.CAMPOADICIONAL1 as f_campoadicional1, F.VALORADICIONAL1 as f_valoradicional1, F.CAMPOADICIONAL2 as f_campoadicional2, F.VALORADICIONAL2 as f_valoradicional2, F.CAMPOADICIONAL3 as f_campoadicional3, F.VALORADICIONAL3 as f_valoradicional3, F.CAMPOADICIONAL4 as f_campoadicional4, F.VALORADICIONAL4 as f_valoradicional4, F.CAMPOADICIONAL5 as f_campoadicional5, F.VALORADICIONAL5 as f_valoradicional5, F.CAMPOADICIONAL6 as f_campoadicional6, F.VALORADICIONAL6 as f_valoradicional6, F.CAMPOADICIONAL7 as f_campoadicional7, F.VALORADICIONAL7 as f_valoradicional7, F.CAMPOADICIONAL8 as f_campoadicional8, F.VALORADICIONAL8 as f_valoradicional8, F.CAMPOADICIONAL9 as f_campoadicional9, F.VALORADICIONAL9 as f_valoradicional9, F.CAMPOADICIONAL10 as f_campoadicional10, F.VALORADICIONAL10 as f_valoradicional10, F.CAMPOADICIONAL11 as f_campoadicional11, F.VALORADICIONAL11 as f_valoradicional11, F.CAMPOADICIONAL12 as f_campoadicional12, F.VALORADICIONAL12 as f_valoradicional12, F.CAMPOADICIONAL13 as f_campoadicional13, F.VALORADICIONAL13 as f_valoradicional13, F.CAMPOADICIONAL14 as f_campoadicional14, F.VALORADICIONAL14 as f_valoradicional14, F.CAMPOADICIONAL15 as f_campoadicional15, F.VALORADICIONAL15 as f_valoradicional15 from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT F.ESTAB as f_estab, F.PTOEMI as f_ptoemi, F.SECUENCIAL as f_secuencial, F.LOTE as f_lote, F.RAZONSOCIAL as f_razonsocial, F.NOMBRECOMERCIAL as f_nombrecomercial, F.RUC as f_ruc, F.DIRMATRIZ as f_dirmatriz, F.FECHAEMISION as f_fechaemision, F.DIRESTABLECIMIENTO as f_direstablecimiento, F.NUMCONTRIBUYENTEESPECIAL as f_numcontribuyenteespecial, F.OBLIGADOCONTABILIDAD as f_obligadocontabilidad, F.TIPOIDENTCOMPRADOR as f_tipoidentcomprador, F.GUIAREMISION as f_guiaremision, F.RAZONSOCIALCOMPRADOR as f_razonsocialcomprador, F.IDCOMPRADOR as f_idcomprador, F.TOTALSINIMPUESTOS as f_totalsinimpuestos, F.TOTALDESCUENTO as f_totaldescuento, F.BASE_12 as f_base_12, F.BASE_0 as f_base_0, F.CODPORCENTAJEIMPUESTO as f_codporcentajeimpuesto, F.VALOR1 as f_valor1, F.PROPINA as f_propina, F.IMPORTETOTAL as f_importetotal, F.MONEDA as f_moneda, F.CAMPOADICIONAL1 as f_campoadicional1, F.VALORADICIONAL1 as f_valoradicional1, F.CAMPOADICIONAL2 as f_campoadicional2, F.VALORADICIONAL2 as f_valoradicional2, F.CAMPOADICIONAL3 as f_campoadicional3, F.VALORADICIONAL3 as f_valoradicional3, F.CAMPOADICIONAL4 as f_campoadicional4, F.VALORADICIONAL4 as f_valoradicional4, F.CAMPOADICIONAL5 as f_campoadicional5, F.VALORADICIONAL5 as f_valoradicional5, F.CAMPOADICIONAL6 as f_campoadicional6, F.VALORADICIONAL6 as f_valoradicional6, F.CAMPOADICIONAL7 as f_campoadicional7, F.VALORADICIONAL7 as f_valoradicional7, F.CAMPOADICIONAL8 as f_campoadicional8, F.VALORADICIONAL8 as f_valoradicional8, F.CAMPOADICIONAL9 as f_campoadicional9, F.VALORADICIONAL9 as f_valoradicional9, F.CAMPOADICIONAL10 as f_campoadicional10, F.VALORADICIONAL10 as f_valoradicional10, F.CAMPOADICIONAL11 as f_campoadicional11, F.VALORADICIONAL11 as f_valoradicional11, F.CAMPOADICIONAL12 as f_campoadicional12, F.VALORADICIONAL12 as f_valoradicional12, F.CAMPOADICIONAL13 as f_campoadicional13, F.VALORADICIONAL13 as f_valoradicional13, F.CAMPOADICIONAL14 as f_campoadicional14, F.VALORADICIONAL14 as f_valoradicional14, F.CAMPOADICIONAL15 as f_campoadicional15, F.VALORADICIONAL15 as f_valoradicional15 from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT F.ESTAB as f_estab, F.PTOEMI as f_ptoemi, F.SECUENCIAL as f_secuencial, F.LOTE as f_lote, F.RAZONSOCIAL as f_razonsocial, F.NOMBRECOMERCIAL as f_nombrecomercial, F.RUC as f_ruc, F.DIRMATRIZ as f_dirmatriz, F.FECHAEMISION as f_fechaemision, F.DIRESTABLECIMIENTO as f_direstablecimiento, F.NUMCONTRIBUYENTEESPECIAL as f_numcontribuyenteespecial, F.OBLIGADOCONTABILIDAD as f_obligadocontabilidad, F.TIPOIDENTCOMPRADOR as f_tipoidentcomprador, F.GUIAREMISION as f_guiaremision, F.RAZONSOCIALCOMPRADOR as f_razonsocialcomprador, F.IDCOMPRADOR as f_idcomprador, F.TOTALSINIMPUESTOS as f_totalsinimpuestos, F.TOTALDESCUENTO as f_totaldescuento, F.BASE_12 as f_base_12, F.BASE_0 as f_base_0, F.CODPORCENTAJEIMPUESTO as f_codporcentajeimpuesto, F.VALOR1 as f_valor1, F.PROPINA as f_propina, F.IMPORTETOTAL as f_importetotal, F.MONEDA as f_moneda, F.CAMPOADICIONAL1 as f_campoadicional1, F.VALORADICIONAL1 as f_valoradicional1, F.CAMPOADICIONAL2 as f_campoadicional2, F.VALORADICIONAL2 as f_valoradicional2, F.CAMPOADICIONAL3 as f_campoadicional3, F.VALORADICIONAL3 as f_valoradicional3, F.CAMPOADICIONAL4 as f_campoadicional4, F.VALORADICIONAL4 as f_valoradicional4, F.CAMPOADICIONAL5 as f_campoadicional5, F.VALORADICIONAL5 as f_valoradicional5, F.CAMPOADICIONAL6 as f_campoadicional6, F.VALORADICIONAL6 as f_valoradicional6, F.CAMPOADICIONAL7 as f_campoadicional7, F.VALORADICIONAL7 as f_valoradicional7, F.CAMPOADICIONAL8 as f_campoadicional8, F.VALORADICIONAL8 as f_valoradicional8, F.CAMPOADICIONAL9 as f_campoadicional9, F.VALORADICIONAL9 as f_valoradicional9, F.CAMPOADICIONAL10 as f_campoadicional10, F.VALORADICIONAL10 as f_valoradicional10, F.CAMPOADICIONAL11 as f_campoadicional11, F.VALORADICIONAL11 as f_valoradicional11, F.CAMPOADICIONAL12 as f_campoadicional12, F.VALORADICIONAL12 as f_valoradicional12, F.CAMPOADICIONAL13 as f_campoadicional13, F.VALORADICIONAL13 as f_valoradicional13, F.CAMPOADICIONAL14 as f_campoadicional14, F.VALORADICIONAL14 as f_valoradicional14, F.CAMPOADICIONAL15 as f_campoadicional15, F.VALORADICIONAL15 as f_valoradicional15 from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT F.ESTAB as f_estab, F.PTOEMI as f_ptoemi, F.SECUENCIAL as f_secuencial, F.LOTE as f_lote, F.RAZONSOCIAL as f_razonsocial, F.NOMBRECOMERCIAL as f_nombrecomercial, F.RUC as f_ruc, F.DIRMATRIZ as f_dirmatriz, F.FECHAEMISION as f_fechaemision, F.DIRESTABLECIMIENTO as f_direstablecimiento, F.NUMCONTRIBUYENTEESPECIAL as f_numcontribuyenteespecial, F.OBLIGADOCONTABILIDAD as f_obligadocontabilidad, F.TIPOIDENTCOMPRADOR as f_tipoidentcomprador, F.GUIAREMISION as f_guiaremision, F.RAZONSOCIALCOMPRADOR as f_razonsocialcomprador, F.IDCOMPRADOR as f_idcomprador, F.TOTALSINIMPUESTOS as f_totalsinimpuestos, F.TOTALDESCUENTO as f_totaldescuento, F.BASE_12 as f_base_12, F.BASE_0 as f_base_0, F.CODPORCENTAJEIMPUESTO as f_codporcentajeimpuesto, F.VALOR1 as f_valor1, F.PROPINA as f_propina, F.IMPORTETOTAL as f_importetotal, F.MONEDA as f_moneda, F.CAMPOADICIONAL1 as f_campoadicional1, F.VALORADICIONAL1 as f_valoradicional1, F.CAMPOADICIONAL2 as f_campoadicional2, F.VALORADICIONAL2 as f_valoradicional2, F.CAMPOADICIONAL3 as f_campoadicional3, F.VALORADICIONAL3 as f_valoradicional3, F.CAMPOADICIONAL4 as f_campoadicional4, F.VALORADICIONAL4 as f_valoradicional4, F.CAMPOADICIONAL5 as f_campoadicional5, F.VALORADICIONAL5 as f_valoradicional5, F.CAMPOADICIONAL6 as f_campoadicional6, F.VALORADICIONAL6 as f_valoradicional6, F.CAMPOADICIONAL7 as f_campoadicional7, F.VALORADICIONAL7 as f_valoradicional7, F.CAMPOADICIONAL8 as f_campoadicional8, F.VALORADICIONAL8 as f_valoradicional8, F.CAMPOADICIONAL9 as f_campoadicional9, F.VALORADICIONAL9 as f_valoradicional9, F.CAMPOADICIONAL10 as f_campoadicional10, F.VALORADICIONAL10 as f_valoradicional10, F.CAMPOADICIONAL11 as f_campoadicional11, F.VALORADICIONAL11 as f_valoradicional11, F.CAMPOADICIONAL12 as f_campoadicional12, F.VALORADICIONAL12 as f_valoradicional12, F.CAMPOADICIONAL13 as f_campoadicional13, F.VALORADICIONAL13 as f_valoradicional13, F.CAMPOADICIONAL14 as f_campoadicional14, F.VALORADICIONAL14 as f_valoradicional14, F.CAMPOADICIONAL15 as f_campoadicional15, F.VALORADICIONAL15 as f_valoradicional15 from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT F.ESTAB as f_estab, F.PTOEMI as f_ptoemi, F.SECUENCIAL as f_secuencial, F.LOTE as f_lote, F.RAZONSOCIAL as f_razonsocial, F.NOMBRECOMERCIAL as f_nombrecomercial, F.RUC as f_ruc, F.DIRMATRIZ as f_dirmatriz, F.FECHAEMISION as f_fechaemision, F.DIRESTABLECIMIENTO as f_direstablecimiento, F.NUMCONTRIBUYENTEESPECIAL as f_numcontribuyenteespecial, F.OBLIGADOCONTABILIDAD as f_obligadocontabilidad, F.TIPOIDENTCOMPRADOR as f_tipoidentcomprador, F.GUIAREMISION as f_guiaremision, F.RAZONSOCIALCOMPRADOR as f_razonsocialcomprador, F.IDCOMPRADOR as f_idcomprador, F.TOTALSINIMPUESTOS as f_totalsinimpuestos, F.TOTALDESCUENTO as f_totaldescuento, F.BASE_12 as f_base_12, F.BASE_0 as f_base_0, F.CODPORCENTAJEIMPUESTO as f_codporcentajeimpuesto, F.VALOR1 as f_valor1, F.PROPINA as f_propina, F.IMPORTETOTAL as f_importetotal, F.MONEDA as f_moneda, F.CAMPOADICIONAL1 as f_campoadicional1, F.VALORADICIONAL1 as f_valoradicional1, F.CAMPOADICIONAL2 as f_campoadicional2, F.VALORADICIONAL2 as f_valoradicional2, F.CAMPOADICIONAL3 as f_campoadicional3, F.VALORADICIONAL3 as f_valoradicional3, F.CAMPOADICIONAL4 as f_campoadicional4, F.VALORADICIONAL4 as f_valoradicional4, F.CAMPOADICIONAL5 as f_campoadicional5, F.VALORADICIONAL5 as f_valoradicional5, F.CAMPOADICIONAL6 as f_campoadicional6, F.VALORADICIONAL6 as f_valoradicional6, F.CAMPOADICIONAL7 as f_campoadicional7, F.VALORADICIONAL7 as f_valoradicional7, F.CAMPOADICIONAL8 as f_campoadicional8, F.VALORADICIONAL8 as f_valoradicional8, F.CAMPOADICIONAL9 as f_campoadicional9, F.VALORADICIONAL9 as f_valoradicional9, F.CAMPOADICIONAL10 as f_campoadicional10, F.VALORADICIONAL10 as f_valoradicional10, F.CAMPOADICIONAL11 as f_campoadicional11, F.VALORADICIONAL11 as f_valoradicional11, F.CAMPOADICIONAL12 as f_campoadicional12, F.VALORADICIONAL12 as f_valoradicional12, F.CAMPOADICIONAL13 as f_campoadicional13, F.VALORADICIONAL13 as f_valoradicional13, F.CAMPOADICIONAL14 as f_campoadicional14, F.VALORADICIONAL14 as f_valoradicional14, F.CAMPOADICIONAL15 as f_campoadicional15, F.VALORADICIONAL15 as f_valoradicional15 from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['order_grid'];
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
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         $this->Texto_tag .= "<tr>\r\n";
         $this->f_estab = $rs->fields[0] ;  
         $this->f_estab = (string)$this->f_estab;
         $this->f_ptoemi = $rs->fields[1] ;  
         $this->f_ptoemi = (string)$this->f_ptoemi;
         $this->f_secuencial = $rs->fields[2] ;  
         $this->f_secuencial = (string)$this->f_secuencial;
         $this->f_lote = $rs->fields[3] ;  
         $this->f_razonsocial = $rs->fields[4] ;  
         $this->f_nombrecomercial = $rs->fields[5] ;  
         $this->f_ruc = $rs->fields[6] ;  
         $this->f_dirmatriz = $rs->fields[7] ;  
         $this->f_fechaemision = $rs->fields[8] ;  
         $this->f_direstablecimiento = $rs->fields[9] ;  
         $this->f_numcontribuyenteespecial = $rs->fields[10] ;  
         $this->f_numcontribuyenteespecial = (string)$this->f_numcontribuyenteespecial;
         $this->f_obligadocontabilidad = $rs->fields[11] ;  
         $this->f_tipoidentcomprador = $rs->fields[12] ;  
         $this->f_tipoidentcomprador = (string)$this->f_tipoidentcomprador;
         $this->f_guiaremision = $rs->fields[13] ;  
         $this->f_razonsocialcomprador = $rs->fields[14] ;  
         $this->f_idcomprador = $rs->fields[15] ;  
         $this->f_totalsinimpuestos = $rs->fields[16] ;  
         $this->f_totalsinimpuestos = (strpos(strtolower($this->f_totalsinimpuestos), "e")) ? (float)$this->f_totalsinimpuestos : $this->f_totalsinimpuestos; 
         $this->f_totalsinimpuestos = (string)$this->f_totalsinimpuestos;
         $this->f_totaldescuento = $rs->fields[17] ;  
         $this->f_totaldescuento = (strpos(strtolower($this->f_totaldescuento), "e")) ? (float)$this->f_totaldescuento : $this->f_totaldescuento; 
         $this->f_totaldescuento = (string)$this->f_totaldescuento;
         $this->f_base_12 = $rs->fields[18] ;  
         $this->f_base_12 = (strpos(strtolower($this->f_base_12), "e")) ? (float)$this->f_base_12 : $this->f_base_12; 
         $this->f_base_12 = (string)$this->f_base_12;
         $this->f_base_0 = $rs->fields[19] ;  
         $this->f_base_0 = (strpos(strtolower($this->f_base_0), "e")) ? (float)$this->f_base_0 : $this->f_base_0; 
         $this->f_base_0 = (string)$this->f_base_0;
         $this->f_codporcentajeimpuesto = $rs->fields[20] ;  
         $this->f_codporcentajeimpuesto = (string)$this->f_codporcentajeimpuesto;
         $this->f_valor1 = $rs->fields[21] ;  
         $this->f_valor1 = (strpos(strtolower($this->f_valor1), "e")) ? (float)$this->f_valor1 : $this->f_valor1; 
         $this->f_valor1 = (string)$this->f_valor1;
         $this->f_propina = $rs->fields[22] ;  
         $this->f_propina = (strpos(strtolower($this->f_propina), "e")) ? (float)$this->f_propina : $this->f_propina; 
         $this->f_propina = (string)$this->f_propina;
         $this->f_importetotal = $rs->fields[23] ;  
         $this->f_importetotal = (strpos(strtolower($this->f_importetotal), "e")) ? (float)$this->f_importetotal : $this->f_importetotal; 
         $this->f_importetotal = (string)$this->f_importetotal;
         $this->f_moneda = $rs->fields[24] ;  
         $this->f_campoadicional1 = $rs->fields[25] ;  
         $this->f_valoradicional1 = $rs->fields[26] ;  
         $this->f_campoadicional2 = $rs->fields[27] ;  
         $this->f_valoradicional2 = $rs->fields[28] ;  
         $this->f_campoadicional3 = $rs->fields[29] ;  
         $this->f_valoradicional3 = $rs->fields[30] ;  
         $this->f_campoadicional4 = $rs->fields[31] ;  
         $this->f_valoradicional4 = $rs->fields[32] ;  
         $this->f_campoadicional5 = $rs->fields[33] ;  
         $this->f_valoradicional5 = $rs->fields[34] ;  
         $this->f_campoadicional6 = $rs->fields[35] ;  
         $this->f_valoradicional6 = $rs->fields[36] ;  
         $this->f_campoadicional7 = $rs->fields[37] ;  
         $this->f_valoradicional7 = $rs->fields[38] ;  
         $this->f_campoadicional8 = $rs->fields[39] ;  
         $this->f_valoradicional8 = $rs->fields[40] ;  
         $this->f_campoadicional9 = $rs->fields[41] ;  
         $this->f_valoradicional9 = $rs->fields[42] ;  
         $this->f_campoadicional10 = $rs->fields[43] ;  
         $this->f_valoradicional10 = $rs->fields[44] ;  
         $this->f_campoadicional11 = $rs->fields[45] ;  
         $this->f_valoradicional11 = $rs->fields[46] ;  
         $this->f_campoadicional12 = $rs->fields[47] ;  
         $this->f_valoradicional12 = $rs->fields[48] ;  
         $this->f_campoadicional13 = $rs->fields[49] ;  
         $this->f_valoradicional13 = $rs->fields[50] ;  
         $this->f_campoadicional14 = $rs->fields[51] ;  
         $this->f_valoradicional14 = $rs->fields[52] ;  
         $this->f_campoadicional15 = $rs->fields[53] ;  
         $this->f_valoradicional15 = $rs->fields[54] ;  
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'on';
  $contenedor = new DOMDocument();

$documento = $this->crear_comprobante($contenedor);

$check_sql2 = "SELECT VALOR"
   . " FROM CONFIGURACIONES"
   . " WHERE ID = 2";
 
      $nm_select = $check_sql2; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs2 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->rs2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs2 = false;
          $this->rs2_erro = $this->Db->ErrorMsg();
      } 
;

$ambiente=$this->rs2[0][0];

$check_sql1 = "SELECT VALOR"
   . " FROM CONFIGURACIONES"
   . " WHERE ID = 1";
 
      $nm_select = $check_sql1; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs1 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->rs1[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs1 = false;
          $this->rs1_erro = $this->Db->ErrorMsg();
      } 
;

$tipoEmision=$this->rs1[0][0];

$tipo_comprobante="01"; 

$factura=$this->f_estab ."-".$this->f_ptoemi ."-".$this->f_secuencial ;

$this->crear_infoTributaria($contenedor,$documento,$ambiente,$tipoEmision,$tipo_comprobante,$factura);
$this->crear_infoFactura($contenedor,$documento);
$this->crear_detalles($contenedor,$documento);
$this->crear_infoAdicional($contenedor,$documento);

$xml_content = $contenedor->saveXML($documento);

$update_table  = 'FACTURA_FLAGS';      
$update_where  = "ESTAB = ".$this->f_estab ." AND PTOEMI = ".$this->f_ptoemi ." AND SECUENCIAL = ".$this->f_secuencial ." AND LOTE = '".$this->f_lote ."'"; 
$update_fields = array(   
     "XML = 1",
     "CONTENIDO = '".addslashes($xml_content)."'",
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
$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- f_estab
   function NM_export_f_estab()
   {
             nmgp_Form_Num_Val($this->f_estab, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->f_estab = NM_charset_to_utf8($this->f_estab);
         $this->f_estab = str_replace('<', '&lt;', $this->f_estab);
         $this->f_estab = str_replace('>', '&gt;', $this->f_estab);
         $this->Texto_tag .= "<td>" . $this->f_estab . "</td>\r\n";
   }
   //----- f_ptoemi
   function NM_export_f_ptoemi()
   {
             nmgp_Form_Num_Val($this->f_ptoemi, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->f_ptoemi = NM_charset_to_utf8($this->f_ptoemi);
         $this->f_ptoemi = str_replace('<', '&lt;', $this->f_ptoemi);
         $this->f_ptoemi = str_replace('>', '&gt;', $this->f_ptoemi);
         $this->Texto_tag .= "<td>" . $this->f_ptoemi . "</td>\r\n";
   }
   //----- f_secuencial
   function NM_export_f_secuencial()
   {
             nmgp_Form_Num_Val($this->f_secuencial, "", "", "0", "S", "2", "", "N:4", "-") ; 
         $this->f_secuencial = NM_charset_to_utf8($this->f_secuencial);
         $this->f_secuencial = str_replace('<', '&lt;', $this->f_secuencial);
         $this->f_secuencial = str_replace('>', '&gt;', $this->f_secuencial);
         $this->Texto_tag .= "<td>" . $this->f_secuencial . "</td>\r\n";
   }
   //----- f_lote
   function NM_export_f_lote()
   {
         $this->f_lote = html_entity_decode($this->f_lote, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->f_lote = strip_tags($this->f_lote);
         $this->f_lote = NM_charset_to_utf8($this->f_lote);
         $this->f_lote = str_replace('<', '&lt;', $this->f_lote);
         $this->f_lote = str_replace('>', '&gt;', $this->f_lote);
         $this->Texto_tag .= "<td>" . $this->f_lote . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $this->Rtf_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $rtf_f       = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->Texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>NUEVAS FACTURAS  :: RTF</TITLE>
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
   <td class="scExportTitle" style="height: 25px">RTF</td>
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
<form name="Fdown" method="get" action="grid_NUEVAS_FACTURAS_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_NUEVAS_FACTURAS"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
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
