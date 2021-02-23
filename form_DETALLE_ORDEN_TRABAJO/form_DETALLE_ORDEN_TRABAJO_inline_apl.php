<?php
//
class form_DETALLE_ORDEN_TRABAJO_inline_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $formatado = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'            => '',
                                'param'             => array(),
                                'autoComp'          => '',
                                'rsSize'            => '',
                                'msgDisplay'        => '',
                                'errList'           => array(),
                                'fldList'           => array(),
                                'varList'           => array(),
                                'focus'             => '',
                                'navStatus'         => array(),
                                'redir'             => array(),
                                'blockDisplay'      => array(),
                                'fieldDisplay'      => array(),
                                'fieldLabel'        => array(),
                                'readOnly'          => array(),
                                'btnVars'           => array(),
                                'ajaxAlert'         => array(),
                                'ajaxMessage'       => array(),
                                'ajaxJavascript'    => array(),
                                'buttonDisplay'     => array(),
                                'buttonDisplayVert' => array(),
                                'calendarReload'    => false,
                                'quickSearchRes'    => false,
                                'displayMsg'        => false,
                                'displayMsgTxt'     => '',
                                'dyn_search'        => array(),
                                'empty_filter'      => '',
                                'event_field'       => '',
                                'fieldsWithErrors'  => array(),
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $ruc_;
   var $coddoc_;
   var $estab_;
   var $ptoemi_;
   var $secuencial_;
   var $lote_;
   var $codigo_;
   var $descripcion_;
   var $cantidad_;
   var $preciounitario_;
   var $descuento_;
   var $preciototalsinimpuesto_;
   var $nombredetalleadicional1_;
   var $valoradicional1_;
   var $nombredetalleadicional2_;
   var $valoradicional2_;
   var $nombredetalleadicional3_;
   var $valoradicional3_;
   var $nombredetalleadicional4_;
   var $valoradicional4_;
   var $nombredetalleadicional5_;
   var $valoradicional5_;
   var $nombredetalleadicional6_;
   var $valoradicional6_;
   var $nombredetalleadicional7_;
   var $valoradicional7_;
   var $nombredetalleadicional8_;
   var $valoradicional8_;
   var $nombredetalleadicional9_;
   var $valoradicional9_;
   var $nombredetalleadicional10_;
   var $valoradicional10_;
   var $nombredetalleadicional11_;
   var $valoradicional11_;
   var $nombredetalleadicional12_;
   var $valoradicional12_;
   var $nombredetalleadicional13_;
   var $valoradicional13_;
   var $nombredetalleadicional14_;
   var $valoradicional14_;
   var $nombredetalleadicional15_;
   var $valoradicional15_;
   var $codigoimpuesto_;
   var $codigoporcentajeimp_;
   var $tarifa_;
   var $baseimponible_;
   var $valor_;
   var $codimpice_;
   var $codporcenice_;
   var $baseice_;
   var $porcenice_;
   var $valorice_;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
   var $record_insert_ok = false;
   var $record_delete_ok = false;
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['cantidad_']))
          {
              $this->cantidad_ = $this->NM_ajax_info['param']['cantidad_'];
          }
          if (isset($this->NM_ajax_info['param']['codigo_']))
          {
              $this->codigo_ = $this->NM_ajax_info['param']['codigo_'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['descripcion_']))
          {
              $this->descripcion_ = $this->NM_ajax_info['param']['descripcion_'];
          }
          if (isset($this->NM_ajax_info['param']['descuento_']))
          {
              $this->descuento_ = $this->NM_ajax_info['param']['descuento_'];
          }
          if (isset($this->NM_ajax_info['param']['estab_']))
          {
              $this->estab_ = $this->NM_ajax_info['param']['estab_'];
          }
          if (isset($this->NM_ajax_info['param']['lote_']))
          {
              $this->lote_ = $this->NM_ajax_info['param']['lote_'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['preciounitario_']))
          {
              $this->preciounitario_ = $this->NM_ajax_info['param']['preciounitario_'];
          }
          if (isset($this->NM_ajax_info['param']['ptoemi_']))
          {
              $this->ptoemi_ = $this->NM_ajax_info['param']['ptoemi_'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['secuencial_']))
          {
              $this->secuencial_ = $this->NM_ajax_info['param']['secuencial_'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->sc_conv_var = array();
      $this->sc_conv_var['ruc'] = "ruc_";
      $this->sc_conv_var['coddoc'] = "coddoc_";
      $this->sc_conv_var['estab'] = "estab_";
      $this->sc_conv_var['ptoemi'] = "ptoemi_";
      $this->sc_conv_var['secuencial'] = "secuencial_";
      $this->sc_conv_var['lote'] = "lote_";
      $this->sc_conv_var['codigo'] = "codigo_";
      $this->sc_conv_var['descripcion'] = "descripcion_";
      $this->sc_conv_var['cantidad'] = "cantidad_";
      $this->sc_conv_var['preciounitario'] = "preciounitario_";
      $this->sc_conv_var['descuento'] = "descuento_";
      $this->sc_conv_var['preciototalsinimpuesto'] = "preciototalsinimpuesto_";
      $this->sc_conv_var['nombredetalleadicional1'] = "nombredetalleadicional1_";
      $this->sc_conv_var['valoradicional1'] = "valoradicional1_";
      $this->sc_conv_var['nombredetalleadicional2'] = "nombredetalleadicional2_";
      $this->sc_conv_var['valoradicional2'] = "valoradicional2_";
      $this->sc_conv_var['nombredetalleadicional3'] = "nombredetalleadicional3_";
      $this->sc_conv_var['valoradicional3'] = "valoradicional3_";
      $this->sc_conv_var['nombredetalleadicional4'] = "nombredetalleadicional4_";
      $this->sc_conv_var['valoradicional4'] = "valoradicional4_";
      $this->sc_conv_var['nombredetalleadicional5'] = "nombredetalleadicional5_";
      $this->sc_conv_var['valoradicional5'] = "valoradicional5_";
      $this->sc_conv_var['nombredetalleadicional6'] = "nombredetalleadicional6_";
      $this->sc_conv_var['valoradicional6'] = "valoradicional6_";
      $this->sc_conv_var['nombredetalleadicional7'] = "nombredetalleadicional7_";
      $this->sc_conv_var['valoradicional7'] = "valoradicional7_";
      $this->sc_conv_var['nombredetalleadicional8'] = "nombredetalleadicional8_";
      $this->sc_conv_var['valoradicional8'] = "valoradicional8_";
      $this->sc_conv_var['nombredetalleadicional9'] = "nombredetalleadicional9_";
      $this->sc_conv_var['valoradicional9'] = "valoradicional9_";
      $this->sc_conv_var['nombredetalleadicional10'] = "nombredetalleadicional10_";
      $this->sc_conv_var['valoradicional10'] = "valoradicional10_";
      $this->sc_conv_var['nombredetalleadicional11'] = "nombredetalleadicional11_";
      $this->sc_conv_var['valoradicional11'] = "valoradicional11_";
      $this->sc_conv_var['nombredetalleadicional12'] = "nombredetalleadicional12_";
      $this->sc_conv_var['valoradicional12'] = "valoradicional12_";
      $this->sc_conv_var['nombredetalleadicional13'] = "nombredetalleadicional13_";
      $this->sc_conv_var['valoradicional13'] = "valoradicional13_";
      $this->sc_conv_var['nombredetalleadicional14'] = "nombredetalleadicional14_";
      $this->sc_conv_var['valoradicional14'] = "valoradicional14_";
      $this->sc_conv_var['nombredetalleadicional15'] = "nombredetalleadicional15_";
      $this->sc_conv_var['valoradicional15'] = "valoradicional15_";
      $this->sc_conv_var['codigoimpuesto'] = "codigoimpuesto_";
      $this->sc_conv_var['codigoporcentajeimp'] = "codigoporcentajeimp_";
      $this->sc_conv_var['tarifa'] = "tarifa_";
      $this->sc_conv_var['baseimponible'] = "baseimponible_";
      $this->sc_conv_var['valor'] = "valor_";
      $this->sc_conv_var['codimpice'] = "codimpice_";
      $this->sc_conv_var['codporcenice'] = "codporcenice_";
      $this->sc_conv_var['baseice'] = "baseice_";
      $this->sc_conv_var['porcenice'] = "porcenice_";
      $this->sc_conv_var['valorice'] = "valorice_";
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (isset($this->sc_conv_var[$nmgp_campo]))
               {
                   $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
               {
                   $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = NM_decode_input($nmgp_parms);
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_form_DETALLE_ORDEN_TRABAJO_inline($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_DETALLE_ORDEN_TRABAJO_inline']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_DETALLE_ORDEN_TRABAJO_inline']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_DETALLE_ORDEN_TRABAJO_inline']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_DETALLE_ORDEN_TRABAJO_inline']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_DETALLE_ORDEN_TRABAJO_inline']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_DETALLE_ORDEN_TRABAJO_inline']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['form_DETALLE_ORDEN_TRABAJO_inline']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_DETALLE_ORDEN_TRABAJO_inline']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_DETALLE_ORDEN_TRABAJO_inline']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_DETALLE_ORDEN_TRABAJO_inline']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_DETALLE_ORDEN_TRABAJO_inline']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_DETALLE_ORDEN_TRABAJO_inline']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_DETALLE_ORDEN_TRABAJO_inline']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_DETALLE_ORDEN_TRABAJO_inline']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_DETALLE_ORDEN_TRABAJO_inline_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_DETALLE_ORDEN_TRABAJO_inline']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_DETALLE_ORDEN_TRABAJO_inline']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_DETALLE_ORDEN_TRABAJO_inline'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_DETALLE_ORDEN_TRABAJO_inline']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_DETALLE_ORDEN_TRABAJO_inline']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_DETALLE_ORDEN_TRABAJO_inline') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_DETALLE_ORDEN_TRABAJO_inline']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - DETALLE_FACTURA";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_DETALLE_ORDEN_TRABAJO_inline")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form    = trim($str_button);
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $this->Db = $this->Ini->Db; 
      $this->Ini->str_google_fonts = '';
      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok       = "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err      = "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status          = "scFormInputError";
      $this->Ini->Css_status_pwd_box  = "scFormInputErrorPwdBox";
      $this->Ini->Css_status_pwd_text = "scFormInputErrorPwdText";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);
      $this->Ini->form_table_width     = isset($str_form_table_width) && '' != trim($str_form_table_width) ? $str_form_table_width : '';



      $_SESSION['scriptcase']['error_icon']['form_DETALLE_ORDEN_TRABAJO_inline']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_DETALLE_ORDEN_TRABAJO_inline'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "off";
      $this->nmgp_botoes['new']  = "off";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['insert'] = "off";
      $this->nmgp_botoes['update'] = "off";
      $this->nmgp_botoes['delete'] = "off";
      $this->nmgp_botoes['first'] = "off";
      $this->nmgp_botoes['back'] = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last'] = "off";
      $this->nmgp_botoes['summary'] = "off";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['reload'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_DETALLE_ORDEN_TRABAJO_inline']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_DETALLE_ORDEN_TRABAJO_inline'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_DETALLE_ORDEN_TRABAJO_inline'];

              $this->nmgp_botoes['update']     = $tmpDashboardButtons['form_update']    ? 'on' : 'off';
              $this->nmgp_botoes['new']        = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['insert']     = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['delete']     = $tmpDashboardButtons['form_delete']    ? 'on' : 'off';
              $this->nmgp_botoes['copy']       = $tmpDashboardButtons['form_copy']      ? 'on' : 'off';
              $this->nmgp_botoes['first']      = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['back']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['last']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['forward']    = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['navpage']    = $tmpDashboardButtons['form_navpage']   ? 'on' : 'off';
              $this->nmgp_botoes['goto']       = $tmpDashboardButtons['form_goto']      ? 'on' : 'off';
              $this->nmgp_botoes['qtline']     = $tmpDashboardButtons['form_lineqty']   ? 'on' : 'off';
              $this->nmgp_botoes['summary']    = $tmpDashboardButtons['form_summary']   ? 'on' : 'off';
              $this->nmgp_botoes['qsearch']    = $tmpDashboardButtons['form_qsearch']   ? 'on' : 'off';
              $this->nmgp_botoes['dynsearch']  = $tmpDashboardButtons['form_dynsearch'] ? 'on' : 'off';
              $this->nmgp_botoes['reload']     = $tmpDashboardButtons['form_reload']    ? 'on' : 'off';
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['dados_form'];
          if (!isset($this->ruc_)){$this->ruc_ = $this->nmgp_dados_form['ruc_'];} 
          if (!isset($this->coddoc_)){$this->coddoc_ = $this->nmgp_dados_form['coddoc_'];} 
          if (!isset($this->preciototalsinimpuesto_)){$this->preciototalsinimpuesto_ = $this->nmgp_dados_form['preciototalsinimpuesto_'];} 
          if (!isset($this->nombredetalleadicional1_)){$this->nombredetalleadicional1_ = $this->nmgp_dados_form['nombredetalleadicional1_'];} 
          if (!isset($this->valoradicional1_)){$this->valoradicional1_ = $this->nmgp_dados_form['valoradicional1_'];} 
          if (!isset($this->nombredetalleadicional2_)){$this->nombredetalleadicional2_ = $this->nmgp_dados_form['nombredetalleadicional2_'];} 
          if (!isset($this->valoradicional2_)){$this->valoradicional2_ = $this->nmgp_dados_form['valoradicional2_'];} 
          if (!isset($this->nombredetalleadicional3_)){$this->nombredetalleadicional3_ = $this->nmgp_dados_form['nombredetalleadicional3_'];} 
          if (!isset($this->valoradicional3_)){$this->valoradicional3_ = $this->nmgp_dados_form['valoradicional3_'];} 
          if (!isset($this->nombredetalleadicional4_)){$this->nombredetalleadicional4_ = $this->nmgp_dados_form['nombredetalleadicional4_'];} 
          if (!isset($this->valoradicional4_)){$this->valoradicional4_ = $this->nmgp_dados_form['valoradicional4_'];} 
          if (!isset($this->nombredetalleadicional5_)){$this->nombredetalleadicional5_ = $this->nmgp_dados_form['nombredetalleadicional5_'];} 
          if (!isset($this->valoradicional5_)){$this->valoradicional5_ = $this->nmgp_dados_form['valoradicional5_'];} 
          if (!isset($this->nombredetalleadicional6_)){$this->nombredetalleadicional6_ = $this->nmgp_dados_form['nombredetalleadicional6_'];} 
          if (!isset($this->valoradicional6_)){$this->valoradicional6_ = $this->nmgp_dados_form['valoradicional6_'];} 
          if (!isset($this->nombredetalleadicional7_)){$this->nombredetalleadicional7_ = $this->nmgp_dados_form['nombredetalleadicional7_'];} 
          if (!isset($this->valoradicional7_)){$this->valoradicional7_ = $this->nmgp_dados_form['valoradicional7_'];} 
          if (!isset($this->nombredetalleadicional8_)){$this->nombredetalleadicional8_ = $this->nmgp_dados_form['nombredetalleadicional8_'];} 
          if (!isset($this->valoradicional8_)){$this->valoradicional8_ = $this->nmgp_dados_form['valoradicional8_'];} 
          if (!isset($this->nombredetalleadicional9_)){$this->nombredetalleadicional9_ = $this->nmgp_dados_form['nombredetalleadicional9_'];} 
          if (!isset($this->valoradicional9_)){$this->valoradicional9_ = $this->nmgp_dados_form['valoradicional9_'];} 
          if (!isset($this->nombredetalleadicional10_)){$this->nombredetalleadicional10_ = $this->nmgp_dados_form['nombredetalleadicional10_'];} 
          if (!isset($this->valoradicional10_)){$this->valoradicional10_ = $this->nmgp_dados_form['valoradicional10_'];} 
          if (!isset($this->nombredetalleadicional11_)){$this->nombredetalleadicional11_ = $this->nmgp_dados_form['nombredetalleadicional11_'];} 
          if (!isset($this->valoradicional11_)){$this->valoradicional11_ = $this->nmgp_dados_form['valoradicional11_'];} 
          if (!isset($this->nombredetalleadicional12_)){$this->nombredetalleadicional12_ = $this->nmgp_dados_form['nombredetalleadicional12_'];} 
          if (!isset($this->valoradicional12_)){$this->valoradicional12_ = $this->nmgp_dados_form['valoradicional12_'];} 
          if (!isset($this->nombredetalleadicional13_)){$this->nombredetalleadicional13_ = $this->nmgp_dados_form['nombredetalleadicional13_'];} 
          if (!isset($this->valoradicional13_)){$this->valoradicional13_ = $this->nmgp_dados_form['valoradicional13_'];} 
          if (!isset($this->nombredetalleadicional14_)){$this->nombredetalleadicional14_ = $this->nmgp_dados_form['nombredetalleadicional14_'];} 
          if (!isset($this->valoradicional14_)){$this->valoradicional14_ = $this->nmgp_dados_form['valoradicional14_'];} 
          if (!isset($this->nombredetalleadicional15_)){$this->nombredetalleadicional15_ = $this->nmgp_dados_form['nombredetalleadicional15_'];} 
          if (!isset($this->valoradicional15_)){$this->valoradicional15_ = $this->nmgp_dados_form['valoradicional15_'];} 
          if (!isset($this->codigoimpuesto_)){$this->codigoimpuesto_ = $this->nmgp_dados_form['codigoimpuesto_'];} 
          if (!isset($this->codigoporcentajeimp_)){$this->codigoporcentajeimp_ = $this->nmgp_dados_form['codigoporcentajeimp_'];} 
          if (!isset($this->tarifa_)){$this->tarifa_ = $this->nmgp_dados_form['tarifa_'];} 
          if (!isset($this->baseimponible_)){$this->baseimponible_ = $this->nmgp_dados_form['baseimponible_'];} 
          if (!isset($this->valor_)){$this->valor_ = $this->nmgp_dados_form['valor_'];} 
          if (!isset($this->codimpice_)){$this->codimpice_ = $this->nmgp_dados_form['codimpice_'];} 
          if (!isset($this->codporcenice_)){$this->codporcenice_ = $this->nmgp_dados_form['codporcenice_'];} 
          if (!isset($this->baseice_)){$this->baseice_ = $this->nmgp_dados_form['baseice_'];} 
          if (!isset($this->porcenice_)){$this->porcenice_ = $this->nmgp_dados_form['porcenice_'];} 
          if (!isset($this->valorice_)){$this->valorice_ = $this->nmgp_dados_form['valorice_'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_DETALLE_ORDEN_TRABAJO_inline", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 

      if (is_file($this->Ini->path_aplicacao . 'form_DETALLE_ORDEN_TRABAJO_inline_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_DETALLE_ORDEN_TRABAJO_inline_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'form_DETALLE_ORDEN_TRABAJO/form_DETALLE_ORDEN_TRABAJO_inline_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_DETALLE_ORDEN_TRABAJO_inline_erro.class.php"); 
      }
      $this->Erro      = new form_DETALLE_ORDEN_TRABAJO_inline_erro();
      $this->Erro->Ini = $this->Ini;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['opcao']))
         { 
             if ($this->estab_ != "" || $this->ptoemi_ != "" || $this->secuencial_ != "" || $this->lote_ != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_DETALLE_ORDEN_TRABAJO_inline']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      if (isset($this->estab_)) { $this->nm_limpa_alfa($this->estab_); }
      if (isset($this->ptoemi_)) { $this->nm_limpa_alfa($this->ptoemi_); }
      if (isset($this->secuencial_)) { $this->nm_limpa_alfa($this->secuencial_); }
      if (isset($this->lote_)) { $this->nm_limpa_alfa($this->lote_); }
      if (isset($this->codigo_)) { $this->nm_limpa_alfa($this->codigo_); }
      if (isset($this->descripcion_)) { $this->nm_limpa_alfa($this->descripcion_); }
      if (isset($this->cantidad_)) { $this->nm_limpa_alfa($this->cantidad_); }
      if (isset($this->preciounitario_)) { $this->nm_limpa_alfa($this->preciounitario_); }
      if (isset($this->descuento_)) { $this->nm_limpa_alfa($this->descuento_); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- cantidad_
      $this->field_config['cantidad_']               = array();
      $this->field_config['cantidad_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cantidad_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cantidad_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['cantidad_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cantidad_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- preciounitario_
      $this->field_config['preciounitario_']               = array();
      $this->field_config['preciounitario_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['preciounitario_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['preciounitario_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['preciounitario_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['preciounitario_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- descuento_
      $this->field_config['descuento_']               = array();
      $this->field_config['descuento_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['descuento_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['descuento_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['descuento_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['descuento_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- coddoc_
      $this->field_config['coddoc_']               = array();
      $this->field_config['coddoc_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['coddoc_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['coddoc_']['symbol_dec'] = '';
      $this->field_config['coddoc_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['coddoc_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- estab_
      $this->field_config['estab_']               = array();
      $this->field_config['estab_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['estab_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['estab_']['symbol_dec'] = '';
      $this->field_config['estab_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['estab_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ptoemi_
      $this->field_config['ptoemi_']               = array();
      $this->field_config['ptoemi_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ptoemi_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ptoemi_']['symbol_dec'] = '';
      $this->field_config['ptoemi_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ptoemi_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- secuencial_
      $this->field_config['secuencial_']               = array();
      $this->field_config['secuencial_']['symbol_grp'] = '';
      $this->field_config['secuencial_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['secuencial_']['symbol_dec'] = '';
      $this->field_config['secuencial_']['symbol_neg'] = '-';
      $this->field_config['secuencial_']['format_neg'] = '4';
      //-- preciototalsinimpuesto_
      $this->field_config['preciototalsinimpuesto_']               = array();
      $this->field_config['preciototalsinimpuesto_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['preciototalsinimpuesto_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['preciototalsinimpuesto_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['preciototalsinimpuesto_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['preciototalsinimpuesto_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- codigoimpuesto_
      $this->field_config['codigoimpuesto_']               = array();
      $this->field_config['codigoimpuesto_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['codigoimpuesto_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['codigoimpuesto_']['symbol_dec'] = '';
      $this->field_config['codigoimpuesto_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['codigoimpuesto_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- codigoporcentajeimp_
      $this->field_config['codigoporcentajeimp_']               = array();
      $this->field_config['codigoporcentajeimp_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['codigoporcentajeimp_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['codigoporcentajeimp_']['symbol_dec'] = '';
      $this->field_config['codigoporcentajeimp_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['codigoporcentajeimp_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- tarifa_
      $this->field_config['tarifa_']               = array();
      $this->field_config['tarifa_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['tarifa_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['tarifa_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['tarifa_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['tarifa_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- baseimponible_
      $this->field_config['baseimponible_']               = array();
      $this->field_config['baseimponible_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['baseimponible_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['baseimponible_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['baseimponible_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['baseimponible_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- valor_
      $this->field_config['valor_']               = array();
      $this->field_config['valor_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['valor_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['valor_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['valor_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['valor_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- codimpice_
      $this->field_config['codimpice_']               = array();
      $this->field_config['codimpice_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['codimpice_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['codimpice_']['symbol_dec'] = '';
      $this->field_config['codimpice_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['codimpice_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- codporcenice_
      $this->field_config['codporcenice_']               = array();
      $this->field_config['codporcenice_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['codporcenice_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['codporcenice_']['symbol_dec'] = '';
      $this->field_config['codporcenice_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['codporcenice_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- baseice_
      $this->field_config['baseice_']               = array();
      $this->field_config['baseice_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['baseice_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['baseice_']['symbol_dec'] = '';
      $this->field_config['baseice_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['baseice_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- porcenice_
      $this->field_config['porcenice_']               = array();
      $this->field_config['porcenice_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['porcenice_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['porcenice_']['symbol_dec'] = '';
      $this->field_config['porcenice_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['porcenice_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- valorice_
      $this->field_config['valorice_']               = array();
      $this->field_config['valorice_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['valorice_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['valorice_']['symbol_dec'] = '';
      $this->field_config['valorice_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['valorice_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();

      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_codigo_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'codigo_');
          }
          if ('validate_descripcion_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'descripcion_');
          }
          if ('validate_cantidad_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cantidad_');
          }
          if ('validate_preciounitario_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'preciounitario_');
          }
          if ('validate_descuento_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'descuento_');
          }
          if ('validate_estab_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estab_');
          }
          if ('validate_ptoemi_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ptoemi_');
          }
          if ('validate_secuencial_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'secuencial_');
          }
          if ('validate_lote_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'lote_');
          }
          form_DETALLE_ORDEN_TRABAJO_inline_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_DETALLE_ORDEN_TRABAJO_inline_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_DETALLE_ORDEN_TRABAJO_inline']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_DETALLE_ORDEN_TRABAJO_inline_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_DETALLE_ORDEN_TRABAJO_inline_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          form_DETALLE_ORDEN_TRABAJO_inline_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      $this->nmgp_opcao = ""; 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_DETALLE_ORDEN_TRABAJO_inline.zip";
          $Arq_htm = $this->Ini->path_imag_temp . "/" . $Zip_name;
          $Arq_zip = $this->Ini->root . $Arq_htm;
          $Zip_f     = (FALSE !== strpos($Arq_zip, ' ')) ? " \"" . $Arq_zip . "\"" :  $Arq_zip;
          $Arq_input = (FALSE !== strpos($Arq_base, ' ')) ? " \"" . $Arq_base . "\"" :  $Arq_base;
           if (is_file($Arq_zip)) {
               unlink($Arq_zip);
           }
           $str_zip = "";
           if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
           {
               chdir($this->Ini->path_third . "/zip/windows");
               $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $Html_password . " " . $Zip_f . " " . $Arq_input;
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
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
           {
               chdir($this->Ini->path_third . "/zip/mac/bin");
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
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
           foreach ($this->Ini->Img_export_zip as $cada_img_zip)
           {
               $str_zip      = "";
              $cada_img_zip = '"' . $cada_img_zip . '"';
               if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
               {
                   $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $Html_password . " " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
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
           }
           if (is_file($Arq_zip)) {
               unlink($Arq_base);
           } 
          $path_doc_md5 = md5($Arq_htm);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - DETALLE_FACTURA") ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" /> 
  <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
</HEAD>
<BODY class="scExportPage">
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: top">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">PRINT</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
   <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo  $this->form_encode_input($Arq_htm) ?>" target="_self" style="display: none"> 
</form>
<form name="Fdown" method="get" action="form_DETALLE_ORDEN_TRABAJO_inline_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_DETALLE_ORDEN_TRABAJO_inline"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="form_DETALLE_ORDEN_TRABAJO_inline.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nmgp_opcao" value="<?php echo $this->nmgp_opcao ?>"> 
</form> 
         </BODY>
         </HTML>
<?php
          exit;
  }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;

           case 4:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros_SweetAlert($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros_SweetAlert($Campos_Erros) 
   {
       $sError  = '';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= $this->Recupera_Nome_Campo($campo) . ': ' . implode('<br />', array_unique($erros)) . '<br />';
       }

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'codigo_':
               return "CÓDIGO PRODUCTO";
               break;
           case 'descripcion_':
               return "DESCRIPCIÓN";
               break;
           case 'cantidad_':
               return "CANTIDAD";
               break;
           case 'preciounitario_':
               return "PRECIO UNITARIO";
               break;
           case 'descuento_':
               return "DESCUENTO";
               break;
           case 'ruc_':
               return "RUC";
               break;
           case 'coddoc_':
               return "CODDOC";
               break;
           case 'estab_':
               return "ESTAB";
               break;
           case 'ptoemi_':
               return "PTOEMI";
               break;
           case 'secuencial_':
               return "SECUENCIAL";
               break;
           case 'lote_':
               return "LOTE";
               break;
           case 'preciototalsinimpuesto_':
               return "PRECIOTOTALSINIMPUESTO";
               break;
           case 'nombredetalleadicional1_':
               return "DETALLE ADICIONAL";
               break;
           case 'valoradicional1_':
               return "VALOR";
               break;
           case 'nombredetalleadicional2_':
               return "DETALLE ADICIONAL";
               break;
           case 'valoradicional2_':
               return "VALOR";
               break;
           case 'nombredetalleadicional3_':
               return "DETALLE ADICIONAL";
               break;
           case 'valoradicional3_':
               return "VALOR";
               break;
           case 'nombredetalleadicional4_':
               return "DETALLE ADICIONAL";
               break;
           case 'valoradicional4_':
               return "VALOR";
               break;
           case 'nombredetalleadicional5_':
               return "DETALLE ADICIONAL";
               break;
           case 'valoradicional5_':
               return "VALOR";
               break;
           case 'nombredetalleadicional6_':
               return "DETALLE ADICIONAL";
               break;
           case 'valoradicional6_':
               return "VALOR";
               break;
           case 'nombredetalleadicional7_':
               return "DETALLE ADICIONAL";
               break;
           case 'valoradicional7_':
               return "VALOR";
               break;
           case 'nombredetalleadicional8_':
               return "DETALLE ADICIONAL";
               break;
           case 'valoradicional8_':
               return "VALOR";
               break;
           case 'nombredetalleadicional9_':
               return "DETALLE ADICIONAL";
               break;
           case 'valoradicional9_':
               return "VALOR";
               break;
           case 'nombredetalleadicional10_':
               return "DETALLE ADICIONAL";
               break;
           case 'valoradicional10_':
               return "VALOR";
               break;
           case 'nombredetalleadicional11_':
               return "DETALLE ADICIONAL";
               break;
           case 'valoradicional11_':
               return "VALOR";
               break;
           case 'nombredetalleadicional12_':
               return "DETALLE ADICIONAL";
               break;
           case 'valoradicional12_':
               return "VALOR";
               break;
           case 'nombredetalleadicional13_':
               return "DETALLE ADICIONAL";
               break;
           case 'valoradicional13_':
               return "VALOR";
               break;
           case 'nombredetalleadicional14_':
               return "DETALLE ADICIONAL";
               break;
           case 'valoradicional14_':
               return "VALOR";
               break;
           case 'nombredetalleadicional15_':
               return "DETALLE ADICIONAL";
               break;
           case 'valoradicional15_':
               return "VALOR";
               break;
           case 'codigoimpuesto_':
               return "CODIGOIMPUESTO";
               break;
           case 'codigoporcentajeimp_':
               return "CODIGOPORCENTAJEIMP";
               break;
           case 'tarifa_':
               return "TARIFA";
               break;
           case 'baseimponible_':
               return "BASEIMPONIBLE";
               break;
           case 'valor_':
               return "VALOR";
               break;
           case 'codimpice_':
               return "CODIMPICE";
               break;
           case 'codporcenice_':
               return "CODPORCENICE";
               break;
           case 'baseice_':
               return "BASEICE";
               break;
           case 'porcenice_':
               return "PORCENICE";
               break;
           case 'valorice_':
               return "VALORICE";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
//---------------------------------------------------------
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_form_DETALLE_ORDEN_TRABAJO_inline']) || !is_array($this->NM_ajax_info['errList']['geral_form_DETALLE_ORDEN_TRABAJO_inline']))
              {
                  $this->NM_ajax_info['errList']['geral_form_DETALLE_ORDEN_TRABAJO_inline'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_DETALLE_ORDEN_TRABAJO_inline'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'codigo_' == $filtro)
        $this->ValidateField_codigo_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'descripcion_' == $filtro)
        $this->ValidateField_descripcion_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cantidad_' == $filtro)
        $this->ValidateField_cantidad_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'preciounitario_' == $filtro)
        $this->ValidateField_preciounitario_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'descuento_' == $filtro)
        $this->ValidateField_descuento_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'estab_' == $filtro)
        $this->ValidateField_estab_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ptoemi_' == $filtro)
        $this->ValidateField_ptoemi_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'secuencial_' == $filtro)
        $this->ValidateField_secuencial_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'lote_' == $filtro)
        $this->ValidateField_lote_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_codigo_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['php_cmp_required']['codigo_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['php_cmp_required']['codigo_'] == "on")) 
      { 
          if ($this->codigo_ == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "CÓDIGO PRODUCTO" ; 
              if (!isset($Campos_Erros['codigo_']))
              {
                  $Campos_Erros['codigo_'] = array();
              }
              $Campos_Erros['codigo_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['codigo_']) || !is_array($this->NM_ajax_info['errList']['codigo_']))
                  {
                      $this->NM_ajax_info['errList']['codigo_'] = array();
                  }
                  $this->NM_ajax_info['errList']['codigo_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->codigo_) > 25) 
          { 
              $hasError = true;
              $Campos_Crit .= "CÓDIGO PRODUCTO " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['codigo_']))
              {
                  $Campos_Erros['codigo_'] = array();
              }
              $Campos_Erros['codigo_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['codigo_']) || !is_array($this->NM_ajax_info['errList']['codigo_']))
              {
                  $this->NM_ajax_info['errList']['codigo_'] = array();
              }
              $this->NM_ajax_info['errList']['codigo_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'codigo_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_codigo_

    function ValidateField_descripcion_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['php_cmp_required']['descripcion_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['php_cmp_required']['descripcion_'] == "on")) 
      { 
          if ($this->descripcion_ == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "DESCRIPCIÓN" ; 
              if (!isset($Campos_Erros['descripcion_']))
              {
                  $Campos_Erros['descripcion_'] = array();
              }
              $Campos_Erros['descripcion_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['descripcion_']) || !is_array($this->NM_ajax_info['errList']['descripcion_']))
                  {
                      $this->NM_ajax_info['errList']['descripcion_'] = array();
                  }
                  $this->NM_ajax_info['errList']['descripcion_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->descripcion_) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "DESCRIPCIÓN " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['descripcion_']))
              {
                  $Campos_Erros['descripcion_'] = array();
              }
              $Campos_Erros['descripcion_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['descripcion_']) || !is_array($this->NM_ajax_info['errList']['descripcion_']))
              {
                  $this->NM_ajax_info['errList']['descripcion_'] = array();
              }
              $this->NM_ajax_info['errList']['descripcion_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'descripcion_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_descripcion_

    function ValidateField_cantidad_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['cantidad_']['symbol_dec']))
      {
          nm_limpa_valor($this->cantidad_, $this->field_config['cantidad_']['symbol_dec'], $this->field_config['cantidad_']['symbol_grp']) ; 
          if ('.' == substr($this->cantidad_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->cantidad_, 1)))
              {
                  $this->cantidad_ = '';
              }
              else
              {
                  $this->cantidad_ = '0' . $this->cantidad_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->cantidad_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->cantidad_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "CANTIDAD: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cantidad_']))
                  {
                      $Campos_Erros['cantidad_'] = array();
                  }
                  $Campos_Erros['cantidad_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cantidad_']) || !is_array($this->NM_ajax_info['errList']['cantidad_']))
                  {
                      $this->NM_ajax_info['errList']['cantidad_'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidad_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cantidad_, 11, 1, -0, 999999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "CANTIDAD; " ; 
                  if (!isset($Campos_Erros['cantidad_']))
                  {
                      $Campos_Erros['cantidad_'] = array();
                  }
                  $Campos_Erros['cantidad_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cantidad_']) || !is_array($this->NM_ajax_info['errList']['cantidad_']))
                  {
                      $this->NM_ajax_info['errList']['cantidad_'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidad_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['php_cmp_required']['cantidad_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['php_cmp_required']['cantidad_'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "CANTIDAD" ; 
              if (!isset($Campos_Erros['cantidad_']))
              {
                  $Campos_Erros['cantidad_'] = array();
              }
              $Campos_Erros['cantidad_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['cantidad_']) || !is_array($this->NM_ajax_info['errList']['cantidad_']))
                  {
                      $this->NM_ajax_info['errList']['cantidad_'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidad_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cantidad_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cantidad_

    function ValidateField_preciounitario_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['preciounitario_']['symbol_dec']))
      {
          nm_limpa_valor($this->preciounitario_, $this->field_config['preciounitario_']['symbol_dec'], $this->field_config['preciounitario_']['symbol_grp']) ; 
          if ('.' == substr($this->preciounitario_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->preciounitario_, 1)))
              {
                  $this->preciounitario_ = '';
              }
              else
              {
                  $this->preciounitario_ = '0' . $this->preciounitario_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->preciounitario_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->preciounitario_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "PRECIO UNITARIO: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['preciounitario_']))
                  {
                      $Campos_Erros['preciounitario_'] = array();
                  }
                  $Campos_Erros['preciounitario_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['preciounitario_']) || !is_array($this->NM_ajax_info['errList']['preciounitario_']))
                  {
                      $this->NM_ajax_info['errList']['preciounitario_'] = array();
                  }
                  $this->NM_ajax_info['errList']['preciounitario_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->preciounitario_, 10, 2, -0, 999999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "PRECIO UNITARIO; " ; 
                  if (!isset($Campos_Erros['preciounitario_']))
                  {
                      $Campos_Erros['preciounitario_'] = array();
                  }
                  $Campos_Erros['preciounitario_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['preciounitario_']) || !is_array($this->NM_ajax_info['errList']['preciounitario_']))
                  {
                      $this->NM_ajax_info['errList']['preciounitario_'] = array();
                  }
                  $this->NM_ajax_info['errList']['preciounitario_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['php_cmp_required']['preciounitario_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['php_cmp_required']['preciounitario_'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "PRECIO UNITARIO" ; 
              if (!isset($Campos_Erros['preciounitario_']))
              {
                  $Campos_Erros['preciounitario_'] = array();
              }
              $Campos_Erros['preciounitario_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['preciounitario_']) || !is_array($this->NM_ajax_info['errList']['preciounitario_']))
                  {
                      $this->NM_ajax_info['errList']['preciounitario_'] = array();
                  }
                  $this->NM_ajax_info['errList']['preciounitario_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'preciounitario_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_preciounitario_

    function ValidateField_descuento_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['descuento_']['symbol_dec']))
      {
          nm_limpa_valor($this->descuento_, $this->field_config['descuento_']['symbol_dec'], $this->field_config['descuento_']['symbol_grp']) ; 
          if ('.' == substr($this->descuento_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->descuento_, 1)))
              {
                  $this->descuento_ = '';
              }
              else
              {
                  $this->descuento_ = '0' . $this->descuento_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->descuento_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->descuento_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "DESCUENTO: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['descuento_']))
                  {
                      $Campos_Erros['descuento_'] = array();
                  }
                  $Campos_Erros['descuento_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['descuento_']) || !is_array($this->NM_ajax_info['errList']['descuento_']))
                  {
                      $this->NM_ajax_info['errList']['descuento_'] = array();
                  }
                  $this->NM_ajax_info['errList']['descuento_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->descuento_, 10, 2, -0, 999999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "DESCUENTO; " ; 
                  if (!isset($Campos_Erros['descuento_']))
                  {
                      $Campos_Erros['descuento_'] = array();
                  }
                  $Campos_Erros['descuento_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['descuento_']) || !is_array($this->NM_ajax_info['errList']['descuento_']))
                  {
                      $this->NM_ajax_info['errList']['descuento_'] = array();
                  }
                  $this->NM_ajax_info['errList']['descuento_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['php_cmp_required']['descuento_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['php_cmp_required']['descuento_'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "DESCUENTO" ; 
              if (!isset($Campos_Erros['descuento_']))
              {
                  $Campos_Erros['descuento_'] = array();
              }
              $Campos_Erros['descuento_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['descuento_']) || !is_array($this->NM_ajax_info['errList']['descuento_']))
                  {
                      $this->NM_ajax_info['errList']['descuento_'] = array();
                  }
                  $this->NM_ajax_info['errList']['descuento_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'descuento_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_descuento_

    function ValidateField_estab_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_numero($this->estab_, $this->field_config['estab_']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->estab_ != '')  
          { 
              $iTestSize = 3;
              if (strlen($this->estab_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "ESTAB: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['estab_']))
                  {
                      $Campos_Erros['estab_'] = array();
                  }
                  $Campos_Erros['estab_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['estab_']) || !is_array($this->NM_ajax_info['errList']['estab_']))
                  {
                      $this->NM_ajax_info['errList']['estab_'] = array();
                  }
                  $this->NM_ajax_info['errList']['estab_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->estab_, 3, 0, -0, 999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "ESTAB; " ; 
                  if (!isset($Campos_Erros['estab_']))
                  {
                      $Campos_Erros['estab_'] = array();
                  }
                  $Campos_Erros['estab_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['estab_']) || !is_array($this->NM_ajax_info['errList']['estab_']))
                  {
                      $this->NM_ajax_info['errList']['estab_'] = array();
                  }
                  $this->NM_ajax_info['errList']['estab_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['php_cmp_required']['estab_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['php_cmp_required']['estab_'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "ESTAB" ; 
              if (!isset($Campos_Erros['estab_']))
              {
                  $Campos_Erros['estab_'] = array();
              }
              $Campos_Erros['estab_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['estab_']) || !is_array($this->NM_ajax_info['errList']['estab_']))
                  {
                      $this->NM_ajax_info['errList']['estab_'] = array();
                  }
                  $this->NM_ajax_info['errList']['estab_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'estab_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_estab_

    function ValidateField_ptoemi_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_numero($this->ptoemi_, $this->field_config['ptoemi_']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->ptoemi_ != '')  
          { 
              $iTestSize = 3;
              if (strlen($this->ptoemi_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "PTOEMI: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['ptoemi_']))
                  {
                      $Campos_Erros['ptoemi_'] = array();
                  }
                  $Campos_Erros['ptoemi_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['ptoemi_']) || !is_array($this->NM_ajax_info['errList']['ptoemi_']))
                  {
                      $this->NM_ajax_info['errList']['ptoemi_'] = array();
                  }
                  $this->NM_ajax_info['errList']['ptoemi_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->ptoemi_, 3, 0, -0, 999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "PTOEMI; " ; 
                  if (!isset($Campos_Erros['ptoemi_']))
                  {
                      $Campos_Erros['ptoemi_'] = array();
                  }
                  $Campos_Erros['ptoemi_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['ptoemi_']) || !is_array($this->NM_ajax_info['errList']['ptoemi_']))
                  {
                      $this->NM_ajax_info['errList']['ptoemi_'] = array();
                  }
                  $this->NM_ajax_info['errList']['ptoemi_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['php_cmp_required']['ptoemi_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['php_cmp_required']['ptoemi_'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "PTOEMI" ; 
              if (!isset($Campos_Erros['ptoemi_']))
              {
                  $Campos_Erros['ptoemi_'] = array();
              }
              $Campos_Erros['ptoemi_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['ptoemi_']) || !is_array($this->NM_ajax_info['errList']['ptoemi_']))
                  {
                      $this->NM_ajax_info['errList']['ptoemi_'] = array();
                  }
                  $this->NM_ajax_info['errList']['ptoemi_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ptoemi_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ptoemi_

    function ValidateField_secuencial_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_numero($this->secuencial_, $this->field_config['secuencial_']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->secuencial_ != '')  
          { 
              $iTestSize = 9;
              if (strlen($this->secuencial_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "SECUENCIAL: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['secuencial_']))
                  {
                      $Campos_Erros['secuencial_'] = array();
                  }
                  $Campos_Erros['secuencial_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['secuencial_']) || !is_array($this->NM_ajax_info['errList']['secuencial_']))
                  {
                      $this->NM_ajax_info['errList']['secuencial_'] = array();
                  }
                  $this->NM_ajax_info['errList']['secuencial_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->secuencial_, 9, 0, -0, 999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "SECUENCIAL; " ; 
                  if (!isset($Campos_Erros['secuencial_']))
                  {
                      $Campos_Erros['secuencial_'] = array();
                  }
                  $Campos_Erros['secuencial_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['secuencial_']) || !is_array($this->NM_ajax_info['errList']['secuencial_']))
                  {
                      $this->NM_ajax_info['errList']['secuencial_'] = array();
                  }
                  $this->NM_ajax_info['errList']['secuencial_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['php_cmp_required']['secuencial_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['php_cmp_required']['secuencial_'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "SECUENCIAL" ; 
              if (!isset($Campos_Erros['secuencial_']))
              {
                  $Campos_Erros['secuencial_'] = array();
              }
              $Campos_Erros['secuencial_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['secuencial_']) || !is_array($this->NM_ajax_info['errList']['secuencial_']))
                  {
                      $this->NM_ajax_info['errList']['secuencial_'] = array();
                  }
                  $this->NM_ajax_info['errList']['secuencial_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'secuencial_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_secuencial_

    function ValidateField_lote_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (($this->nmgp_opcao == "incluir" || 'validate_lote_' == $this->NM_ajax_opcao) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['php_cmp_required']['lote_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['php_cmp_required']['lote_'] == "on"))
      { 
          if ($this->lote_ == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "LOTE" ; 
              if (!isset($Campos_Erros['lote_']))
              {
                  $Campos_Erros['lote_'] = array();
              }
              $Campos_Erros['lote_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['lote_']) || !is_array($this->NM_ajax_info['errList']['lote_']))
                  {
                      $this->NM_ajax_info['errList']['lote_'] = array();
                  }
                  $this->NM_ajax_info['errList']['lote_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->lote_) > 22) 
          { 
              $hasError = true;
              $Campos_Crit .= "LOTE " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 22 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['lote_']))
              {
                  $Campos_Erros['lote_'] = array();
              }
              $Campos_Erros['lote_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 22 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['lote_']) || !is_array($this->NM_ajax_info['errList']['lote_']))
              {
                  $this->NM_ajax_info['errList']['lote_'] = array();
              }
              $this->NM_ajax_info['errList']['lote_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 22 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'lote_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_lote_

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['codigo_'] = $this->codigo_;
    $this->nmgp_dados_form['descripcion_'] = $this->descripcion_;
    $this->nmgp_dados_form['cantidad_'] = $this->cantidad_;
    $this->nmgp_dados_form['preciounitario_'] = $this->preciounitario_;
    $this->nmgp_dados_form['descuento_'] = $this->descuento_;
    $this->nmgp_dados_form['ruc_'] = $this->ruc_;
    $this->nmgp_dados_form['coddoc_'] = $this->coddoc_;
    $this->nmgp_dados_form['estab_'] = $this->estab_;
    $this->nmgp_dados_form['ptoemi_'] = $this->ptoemi_;
    $this->nmgp_dados_form['secuencial_'] = $this->secuencial_;
    $this->nmgp_dados_form['lote_'] = $this->lote_;
    $this->nmgp_dados_form['preciototalsinimpuesto_'] = $this->preciototalsinimpuesto_;
    $this->nmgp_dados_form['nombredetalleadicional1_'] = $this->nombredetalleadicional1_;
    $this->nmgp_dados_form['valoradicional1_'] = $this->valoradicional1_;
    $this->nmgp_dados_form['nombredetalleadicional2_'] = $this->nombredetalleadicional2_;
    $this->nmgp_dados_form['valoradicional2_'] = $this->valoradicional2_;
    $this->nmgp_dados_form['nombredetalleadicional3_'] = $this->nombredetalleadicional3_;
    $this->nmgp_dados_form['valoradicional3_'] = $this->valoradicional3_;
    $this->nmgp_dados_form['nombredetalleadicional4_'] = $this->nombredetalleadicional4_;
    $this->nmgp_dados_form['valoradicional4_'] = $this->valoradicional4_;
    $this->nmgp_dados_form['nombredetalleadicional5_'] = $this->nombredetalleadicional5_;
    $this->nmgp_dados_form['valoradicional5_'] = $this->valoradicional5_;
    $this->nmgp_dados_form['nombredetalleadicional6_'] = $this->nombredetalleadicional6_;
    $this->nmgp_dados_form['valoradicional6_'] = $this->valoradicional6_;
    $this->nmgp_dados_form['nombredetalleadicional7_'] = $this->nombredetalleadicional7_;
    $this->nmgp_dados_form['valoradicional7_'] = $this->valoradicional7_;
    $this->nmgp_dados_form['nombredetalleadicional8_'] = $this->nombredetalleadicional8_;
    $this->nmgp_dados_form['valoradicional8_'] = $this->valoradicional8_;
    $this->nmgp_dados_form['nombredetalleadicional9_'] = $this->nombredetalleadicional9_;
    $this->nmgp_dados_form['valoradicional9_'] = $this->valoradicional9_;
    $this->nmgp_dados_form['nombredetalleadicional10_'] = $this->nombredetalleadicional10_;
    $this->nmgp_dados_form['valoradicional10_'] = $this->valoradicional10_;
    $this->nmgp_dados_form['nombredetalleadicional11_'] = $this->nombredetalleadicional11_;
    $this->nmgp_dados_form['valoradicional11_'] = $this->valoradicional11_;
    $this->nmgp_dados_form['nombredetalleadicional12_'] = $this->nombredetalleadicional12_;
    $this->nmgp_dados_form['valoradicional12_'] = $this->valoradicional12_;
    $this->nmgp_dados_form['nombredetalleadicional13_'] = $this->nombredetalleadicional13_;
    $this->nmgp_dados_form['valoradicional13_'] = $this->valoradicional13_;
    $this->nmgp_dados_form['nombredetalleadicional14_'] = $this->nombredetalleadicional14_;
    $this->nmgp_dados_form['valoradicional14_'] = $this->valoradicional14_;
    $this->nmgp_dados_form['nombredetalleadicional15_'] = $this->nombredetalleadicional15_;
    $this->nmgp_dados_form['valoradicional15_'] = $this->valoradicional15_;
    $this->nmgp_dados_form['codigoimpuesto_'] = $this->codigoimpuesto_;
    $this->nmgp_dados_form['codigoporcentajeimp_'] = $this->codigoporcentajeimp_;
    $this->nmgp_dados_form['tarifa_'] = $this->tarifa_;
    $this->nmgp_dados_form['baseimponible_'] = $this->baseimponible_;
    $this->nmgp_dados_form['valor_'] = $this->valor_;
    $this->nmgp_dados_form['codimpice_'] = $this->codimpice_;
    $this->nmgp_dados_form['codporcenice_'] = $this->codporcenice_;
    $this->nmgp_dados_form['baseice_'] = $this->baseice_;
    $this->nmgp_dados_form['porcenice_'] = $this->porcenice_;
    $this->nmgp_dados_form['valorice_'] = $this->valorice_;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['cantidad_'] = $this->cantidad_;
      if (!empty($this->field_config['cantidad_']['symbol_dec']))
      {
         nm_limpa_valor($this->cantidad_, $this->field_config['cantidad_']['symbol_dec'], $this->field_config['cantidad_']['symbol_grp']);
      }
      $this->Before_unformat['preciounitario_'] = $this->preciounitario_;
      if (!empty($this->field_config['preciounitario_']['symbol_dec']))
      {
         nm_limpa_valor($this->preciounitario_, $this->field_config['preciounitario_']['symbol_dec'], $this->field_config['preciounitario_']['symbol_grp']);
      }
      $this->Before_unformat['descuento_'] = $this->descuento_;
      if (!empty($this->field_config['descuento_']['symbol_dec']))
      {
         nm_limpa_valor($this->descuento_, $this->field_config['descuento_']['symbol_dec'], $this->field_config['descuento_']['symbol_grp']);
      }
      $this->Before_unformat['coddoc_'] = $this->coddoc_;
      nm_limpa_numero($this->coddoc_, $this->field_config['coddoc_']['symbol_grp']) ; 
      $this->Before_unformat['estab_'] = $this->estab_;
      nm_limpa_numero($this->estab_, $this->field_config['estab_']['symbol_grp']) ; 
      $this->Before_unformat['ptoemi_'] = $this->ptoemi_;
      nm_limpa_numero($this->ptoemi_, $this->field_config['ptoemi_']['symbol_grp']) ; 
      $this->Before_unformat['secuencial_'] = $this->secuencial_;
      nm_limpa_numero($this->secuencial_, $this->field_config['secuencial_']['symbol_grp']) ; 
      $this->Before_unformat['preciototalsinimpuesto_'] = $this->preciototalsinimpuesto_;
      if (!empty($this->field_config['preciototalsinimpuesto_']['symbol_dec']))
      {
         nm_limpa_valor($this->preciototalsinimpuesto_, $this->field_config['preciototalsinimpuesto_']['symbol_dec'], $this->field_config['preciototalsinimpuesto_']['symbol_grp']);
      }
      $this->Before_unformat['codigoimpuesto_'] = $this->codigoimpuesto_;
      nm_limpa_numero($this->codigoimpuesto_, $this->field_config['codigoimpuesto_']['symbol_grp']) ; 
      $this->Before_unformat['codigoporcentajeimp_'] = $this->codigoporcentajeimp_;
      nm_limpa_numero($this->codigoporcentajeimp_, $this->field_config['codigoporcentajeimp_']['symbol_grp']) ; 
      $this->Before_unformat['tarifa_'] = $this->tarifa_;
      if (!empty($this->field_config['tarifa_']['symbol_dec']))
      {
         nm_limpa_valor($this->tarifa_, $this->field_config['tarifa_']['symbol_dec'], $this->field_config['tarifa_']['symbol_grp']);
      }
      $this->Before_unformat['baseimponible_'] = $this->baseimponible_;
      if (!empty($this->field_config['baseimponible_']['symbol_dec']))
      {
         nm_limpa_valor($this->baseimponible_, $this->field_config['baseimponible_']['symbol_dec'], $this->field_config['baseimponible_']['symbol_grp']);
      }
      $this->Before_unformat['valor_'] = $this->valor_;
      if (!empty($this->field_config['valor_']['symbol_dec']))
      {
         nm_limpa_valor($this->valor_, $this->field_config['valor_']['symbol_dec'], $this->field_config['valor_']['symbol_grp']);
      }
      $this->Before_unformat['codimpice_'] = $this->codimpice_;
      nm_limpa_numero($this->codimpice_, $this->field_config['codimpice_']['symbol_grp']) ; 
      $this->Before_unformat['codporcenice_'] = $this->codporcenice_;
      nm_limpa_numero($this->codporcenice_, $this->field_config['codporcenice_']['symbol_grp']) ; 
      $this->Before_unformat['baseice_'] = $this->baseice_;
      nm_limpa_numero($this->baseice_, $this->field_config['baseice_']['symbol_grp']) ; 
      $this->Before_unformat['porcenice_'] = $this->porcenice_;
      nm_limpa_numero($this->porcenice_, $this->field_config['porcenice_']['symbol_grp']) ; 
      $this->Before_unformat['valorice_'] = $this->valorice_;
      nm_limpa_numero($this->valorice_, $this->field_config['valorice_']['symbol_grp']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~i', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "cantidad_")
      {
          if (!empty($this->field_config['cantidad_']['symbol_dec']))
          {
             nm_limpa_valor($this->cantidad_, $this->field_config['cantidad_']['symbol_dec'], $this->field_config['cantidad_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "preciounitario_")
      {
          if (!empty($this->field_config['preciounitario_']['symbol_dec']))
          {
             nm_limpa_valor($this->preciounitario_, $this->field_config['preciounitario_']['symbol_dec'], $this->field_config['preciounitario_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "descuento_")
      {
          if (!empty($this->field_config['descuento_']['symbol_dec']))
          {
             nm_limpa_valor($this->descuento_, $this->field_config['descuento_']['symbol_dec'], $this->field_config['descuento_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "coddoc_")
      {
          nm_limpa_numero($this->coddoc_, $this->field_config['coddoc_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "estab_")
      {
          nm_limpa_numero($this->estab_, $this->field_config['estab_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ptoemi_")
      {
          nm_limpa_numero($this->ptoemi_, $this->field_config['ptoemi_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "secuencial_")
      {
          nm_limpa_numero($this->secuencial_, $this->field_config['secuencial_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "preciototalsinimpuesto_")
      {
          if (!empty($this->field_config['preciototalsinimpuesto_']['symbol_dec']))
          {
             nm_limpa_valor($this->preciototalsinimpuesto_, $this->field_config['preciototalsinimpuesto_']['symbol_dec'], $this->field_config['preciototalsinimpuesto_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "codigoimpuesto_")
      {
          nm_limpa_numero($this->codigoimpuesto_, $this->field_config['codigoimpuesto_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "codigoporcentajeimp_")
      {
          nm_limpa_numero($this->codigoporcentajeimp_, $this->field_config['codigoporcentajeimp_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "tarifa_")
      {
          if (!empty($this->field_config['tarifa_']['symbol_dec']))
          {
             nm_limpa_valor($this->tarifa_, $this->field_config['tarifa_']['symbol_dec'], $this->field_config['tarifa_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "baseimponible_")
      {
          if (!empty($this->field_config['baseimponible_']['symbol_dec']))
          {
             nm_limpa_valor($this->baseimponible_, $this->field_config['baseimponible_']['symbol_dec'], $this->field_config['baseimponible_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "valor_")
      {
          if (!empty($this->field_config['valor_']['symbol_dec']))
          {
             nm_limpa_valor($this->valor_, $this->field_config['valor_']['symbol_dec'], $this->field_config['valor_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "codimpice_")
      {
          nm_limpa_numero($this->codimpice_, $this->field_config['codimpice_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "codporcenice_")
      {
          nm_limpa_numero($this->codporcenice_, $this->field_config['codporcenice_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "baseice_")
      {
          nm_limpa_numero($this->baseice_, $this->field_config['baseice_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "porcenice_")
      {
          nm_limpa_numero($this->porcenice_, $this->field_config['porcenice_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "valorice_")
      {
          nm_limpa_numero($this->valorice_, $this->field_config['valorice_']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if ('' !== $this->cantidad_ || (!empty($format_fields) && isset($format_fields['cantidad_'])))
      {
          nmgp_Form_Num_Val($this->cantidad_, $this->field_config['cantidad_']['symbol_grp'], $this->field_config['cantidad_']['symbol_dec'], "1", "S", $this->field_config['cantidad_']['format_neg'], "", "", "-", $this->field_config['cantidad_']['symbol_fmt']) ; 
      }
      if ('' !== $this->preciounitario_ || (!empty($format_fields) && isset($format_fields['preciounitario_'])))
      {
          nmgp_Form_Num_Val($this->preciounitario_, $this->field_config['preciounitario_']['symbol_grp'], $this->field_config['preciounitario_']['symbol_dec'], "2", "S", $this->field_config['preciounitario_']['format_neg'], "", "", "-", $this->field_config['preciounitario_']['symbol_fmt']) ; 
      }
      if ('' !== $this->descuento_ || (!empty($format_fields) && isset($format_fields['descuento_'])))
      {
          nmgp_Form_Num_Val($this->descuento_, $this->field_config['descuento_']['symbol_grp'], $this->field_config['descuento_']['symbol_dec'], "2", "S", $this->field_config['descuento_']['format_neg'], "", "", "-", $this->field_config['descuento_']['symbol_fmt']) ; 
      }
      if ('' !== $this->estab_ || (!empty($format_fields) && isset($format_fields['estab_'])))
      {
          nmgp_Form_Num_Val($this->estab_, $this->field_config['estab_']['symbol_grp'], $this->field_config['estab_']['symbol_dec'], "0", "S", $this->field_config['estab_']['format_neg'], "", "", "-", $this->field_config['estab_']['symbol_fmt']) ; 
      }
      if ('' !== $this->ptoemi_ || (!empty($format_fields) && isset($format_fields['ptoemi_'])))
      {
          nmgp_Form_Num_Val($this->ptoemi_, $this->field_config['ptoemi_']['symbol_grp'], $this->field_config['ptoemi_']['symbol_dec'], "0", "S", $this->field_config['ptoemi_']['format_neg'], "", "", "-", $this->field_config['ptoemi_']['symbol_fmt']) ; 
      }
      if ('' !== $this->secuencial_ || (!empty($format_fields) && isset($format_fields['secuencial_'])))
      {
          nmgp_Form_Num_Val($this->secuencial_, $this->field_config['secuencial_']['symbol_grp'], $this->field_config['secuencial_']['symbol_dec'], "0", "S", $this->field_config['secuencial_']['format_neg'], "", "", "-", $this->field_config['secuencial_']['symbol_fmt']) ; 
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
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
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
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
          $nm_campo = $trab_saida;
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
      $nm_campo = $trab_saida;
   } 
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
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
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               $x = 0;
               foreach ($str as $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
                   $x++;
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
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
           nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
           return $dt_out;
       }
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_codigo_();
          $this->ajax_return_values_descripcion_();
          $this->ajax_return_values_cantidad_();
          $this->ajax_return_values_preciounitario_();
          $this->ajax_return_values_descuento_();
          $this->ajax_return_values_estab_();
          $this->ajax_return_values_ptoemi_();
          $this->ajax_return_values_secuencial_();
          $this->ajax_return_values_lote_();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['estab_']['keyVal'] = form_DETALLE_ORDEN_TRABAJO_inline_pack_protect_string($this->nmgp_dados_form['estab_']);
              $this->NM_ajax_info['fldList']['ptoemi_']['keyVal'] = form_DETALLE_ORDEN_TRABAJO_inline_pack_protect_string($this->nmgp_dados_form['ptoemi_']);
              $this->NM_ajax_info['fldList']['secuencial_']['keyVal'] = form_DETALLE_ORDEN_TRABAJO_inline_pack_protect_string($this->nmgp_dados_form['secuencial_']);
              $this->NM_ajax_info['fldList']['lote_']['keyVal'] = form_DETALLE_ORDEN_TRABAJO_inline_pack_protect_string($this->nmgp_dados_form['lote_']);
          }
   } // ajax_return_values

          //----- codigo_
   function ajax_return_values_codigo_($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("codigo_", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->codigo_);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['codigo_'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- descripcion_
   function ajax_return_values_descripcion_($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("descripcion_", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->descripcion_);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['descripcion_'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cantidad_
   function ajax_return_values_cantidad_($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cantidad_", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cantidad_);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cantidad_'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- preciounitario_
   function ajax_return_values_preciounitario_($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("preciounitario_", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->preciounitario_);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['preciounitario_'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- descuento_
   function ajax_return_values_descuento_($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("descuento_", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->descuento_);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['descuento_'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- estab_
   function ajax_return_values_estab_($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estab_", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->estab_);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['estab_'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- ptoemi_
   function ajax_return_values_ptoemi_($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ptoemi_", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ptoemi_);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ptoemi_'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- secuencial_
   function ajax_return_values_secuencial_($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("secuencial_", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->secuencial_);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['secuencial_'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- lote_
   function ajax_return_values_lote_($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("lote_", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->lote_);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['lote_'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//
   function nm_troca_decimal($sc_parm1, $sc_parm2) 
   { 
      $this->cantidad_ = str_replace($sc_parm1, $sc_parm2, $this->cantidad_); 
      $this->preciounitario_ = str_replace($sc_parm1, $sc_parm2, $this->preciounitario_); 
      $this->descuento_ = str_replace($sc_parm1, $sc_parm2, $this->descuento_); 
      $this->preciototalsinimpuesto_ = str_replace($sc_parm1, $sc_parm2, $this->preciototalsinimpuesto_); 
      $this->tarifa_ = str_replace($sc_parm1, $sc_parm2, $this->tarifa_); 
      $this->baseimponible_ = str_replace($sc_parm1, $sc_parm2, $this->baseimponible_); 
      $this->valor_ = str_replace($sc_parm1, $sc_parm2, $this->valor_); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->cantidad_ = "'" . $this->cantidad_ . "'";
      $this->preciounitario_ = "'" . $this->preciounitario_ . "'";
      $this->descuento_ = "'" . $this->descuento_ . "'";
      $this->preciototalsinimpuesto_ = "'" . $this->preciototalsinimpuesto_ . "'";
      $this->tarifa_ = "'" . $this->tarifa_ . "'";
      $this->baseimponible_ = "'" . $this->baseimponible_ . "'";
      $this->valor_ = "'" . $this->valor_ . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->cantidad_ = str_replace("'", "", $this->cantidad_); 
      $this->preciounitario_ = str_replace("'", "", $this->preciounitario_); 
      $this->descuento_ = str_replace("'", "", $this->descuento_); 
      $this->preciototalsinimpuesto_ = str_replace("'", "", $this->preciototalsinimpuesto_); 
      $this->tarifa_ = str_replace("'", "", $this->tarifa_); 
      $this->baseimponible_ = str_replace("'", "", $this->baseimponible_); 
      $this->valor_ = str_replace("'", "", $this->valor_); 
   } 
//----------- 

   function controle_navegacao()
   {
      global $sc_where;

          if (false && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['total']))
          {
               $sc_where_pos = " WHERE ((ESTAB < $this->estab_) OR (ESTAB = $this->estab_ AND PTOEMI < $this->ptoemi_) OR (ESTAB = $this->estab_ AND PTOEMI = $this->ptoemi_ AND SECUENCIAL < $this->secuencial_) OR (ESTAB = $this->estab_ AND PTOEMI = $this->ptoemi_ AND SECUENCIAL = $this->secuencial_ AND LOTE < '" . substr($this->Db->qstr($this->lote_), 1, -1) . "'))";
               if ('' != $sc_where)
               {
                   if ('where ' == strtolower(substr(trim($sc_where), 0, 6)))
                   {
                       $sc_where = substr(trim($sc_where), 6);
                   }
                   if ('and ' == strtolower(substr(trim($sc_where), 0, 4)))
                   {
                       $sc_where = substr(trim($sc_where), 4);
                   }
                   $sc_where_pos .= ' AND (' . $sc_where . ')';
                   $sc_where = ' WHERE ' . $sc_where;
               }
               $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['total'] = $rsc->fields[0];
               $rsc->Close(); 
               if ('' != $this->estab_ && '' != $this->ptoemi_ && '' != $this->secuencial_)
               {
               $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['inicio'] = $rsc->fields[0];
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['inicio'] < 0)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['inicio'] = 0;
               }
               $rsc->Close(); 
               }
               else
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['inicio'] = 0;
               }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['qt_reg_grid'] = 1;
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['inicio']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['inicio'] = 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['final']  = 0;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['opcao'] = $this->NM_ajax_info['param']['nmgp_opcao'];
          if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['opcao'], array('incluir', 'alterar', 'excluir')))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['opcao'] = '';
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['opcao'] == 'inicio')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['inicio'] = 0;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['opcao'] == 'retorna')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['inicio'] = 0 ;
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['opcao'] == 'avanca' && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['total']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['total'] > $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['final']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['final'];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['opcao'] == 'final')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['inicio'] = 0;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['final'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['qt_reg_grid'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['final'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['opcao'] = '';

   }

   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros
    function handleDbErrorMessage(&$dbErrorMessage, $dbErrorCode)
    {
        if (1267 == $dbErrorCode) {
            $dbErrorMessage = $this->Ini->Nm_lang['lang_errm_db_invalid_collation'];
        }
    }


   function nm_acessa_banco() 
   { 
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Ini->sc_tem_trans_banco = $this->Db->BeginTrans(); 
      } 
      $NM_val_form['codigo_'] = $this->codigo_;
      $NM_val_form['descripcion_'] = $this->descripcion_;
      $NM_val_form['cantidad_'] = $this->cantidad_;
      $NM_val_form['preciounitario_'] = $this->preciounitario_;
      $NM_val_form['descuento_'] = $this->descuento_;
      $NM_val_form['ruc_'] = $this->ruc_;
      $NM_val_form['coddoc_'] = $this->coddoc_;
      $NM_val_form['estab_'] = $this->estab_;
      $NM_val_form['ptoemi_'] = $this->ptoemi_;
      $NM_val_form['secuencial_'] = $this->secuencial_;
      $NM_val_form['lote_'] = $this->lote_;
      $NM_val_form['preciototalsinimpuesto_'] = $this->preciototalsinimpuesto_;
      $NM_val_form['nombredetalleadicional1_'] = $this->nombredetalleadicional1_;
      $NM_val_form['valoradicional1_'] = $this->valoradicional1_;
      $NM_val_form['nombredetalleadicional2_'] = $this->nombredetalleadicional2_;
      $NM_val_form['valoradicional2_'] = $this->valoradicional2_;
      $NM_val_form['nombredetalleadicional3_'] = $this->nombredetalleadicional3_;
      $NM_val_form['valoradicional3_'] = $this->valoradicional3_;
      $NM_val_form['nombredetalleadicional4_'] = $this->nombredetalleadicional4_;
      $NM_val_form['valoradicional4_'] = $this->valoradicional4_;
      $NM_val_form['nombredetalleadicional5_'] = $this->nombredetalleadicional5_;
      $NM_val_form['valoradicional5_'] = $this->valoradicional5_;
      $NM_val_form['nombredetalleadicional6_'] = $this->nombredetalleadicional6_;
      $NM_val_form['valoradicional6_'] = $this->valoradicional6_;
      $NM_val_form['nombredetalleadicional7_'] = $this->nombredetalleadicional7_;
      $NM_val_form['valoradicional7_'] = $this->valoradicional7_;
      $NM_val_form['nombredetalleadicional8_'] = $this->nombredetalleadicional8_;
      $NM_val_form['valoradicional8_'] = $this->valoradicional8_;
      $NM_val_form['nombredetalleadicional9_'] = $this->nombredetalleadicional9_;
      $NM_val_form['valoradicional9_'] = $this->valoradicional9_;
      $NM_val_form['nombredetalleadicional10_'] = $this->nombredetalleadicional10_;
      $NM_val_form['valoradicional10_'] = $this->valoradicional10_;
      $NM_val_form['nombredetalleadicional11_'] = $this->nombredetalleadicional11_;
      $NM_val_form['valoradicional11_'] = $this->valoradicional11_;
      $NM_val_form['nombredetalleadicional12_'] = $this->nombredetalleadicional12_;
      $NM_val_form['valoradicional12_'] = $this->valoradicional12_;
      $NM_val_form['nombredetalleadicional13_'] = $this->nombredetalleadicional13_;
      $NM_val_form['valoradicional13_'] = $this->valoradicional13_;
      $NM_val_form['nombredetalleadicional14_'] = $this->nombredetalleadicional14_;
      $NM_val_form['valoradicional14_'] = $this->valoradicional14_;
      $NM_val_form['nombredetalleadicional15_'] = $this->nombredetalleadicional15_;
      $NM_val_form['valoradicional15_'] = $this->valoradicional15_;
      $NM_val_form['codigoimpuesto_'] = $this->codigoimpuesto_;
      $NM_val_form['codigoporcentajeimp_'] = $this->codigoporcentajeimp_;
      $NM_val_form['tarifa_'] = $this->tarifa_;
      $NM_val_form['baseimponible_'] = $this->baseimponible_;
      $NM_val_form['valor_'] = $this->valor_;
      $NM_val_form['codimpice_'] = $this->codimpice_;
      $NM_val_form['codporcenice_'] = $this->codporcenice_;
      $NM_val_form['baseice_'] = $this->baseice_;
      $NM_val_form['porcenice_'] = $this->porcenice_;
      $NM_val_form['valorice_'] = $this->valorice_;
      if ($this->coddoc_ === "" || is_null($this->coddoc_))  
      { 
          $this->coddoc_ = 0;
          $this->sc_force_zero[] = 'coddoc_';
      } 
      if ($this->estab_ === "" || is_null($this->estab_))  
      { 
          $this->estab_ = 0;
      } 
      if ($this->ptoemi_ === "" || is_null($this->ptoemi_))  
      { 
          $this->ptoemi_ = 0;
      } 
      if ($this->secuencial_ === "" || is_null($this->secuencial_))  
      { 
          $this->secuencial_ = 0;
      } 
      if ($this->cantidad_ === "" || is_null($this->cantidad_))  
      { 
          $this->cantidad_ = 0;
          $this->sc_force_zero[] = 'cantidad_';
      } 
      if ($this->preciounitario_ === "" || is_null($this->preciounitario_))  
      { 
          $this->preciounitario_ = 0;
          $this->sc_force_zero[] = 'preciounitario_';
      } 
      if ($this->descuento_ === "" || is_null($this->descuento_))  
      { 
          $this->descuento_ = 0;
          $this->sc_force_zero[] = 'descuento_';
      } 
      if ($this->preciototalsinimpuesto_ === "" || is_null($this->preciototalsinimpuesto_))  
      { 
          $this->preciototalsinimpuesto_ = 0;
          $this->sc_force_zero[] = 'preciototalsinimpuesto_';
      } 
      if ($this->codigoimpuesto_ === "" || is_null($this->codigoimpuesto_))  
      { 
          $this->codigoimpuesto_ = 0;
          $this->sc_force_zero[] = 'codigoimpuesto_';
      } 
      if ($this->codigoporcentajeimp_ === "" || is_null($this->codigoporcentajeimp_))  
      { 
          $this->codigoporcentajeimp_ = 0;
          $this->sc_force_zero[] = 'codigoporcentajeimp_';
      } 
      if ($this->tarifa_ === "" || is_null($this->tarifa_))  
      { 
          $this->tarifa_ = 0;
          $this->sc_force_zero[] = 'tarifa_';
      } 
      if ($this->baseimponible_ === "" || is_null($this->baseimponible_))  
      { 
          $this->baseimponible_ = 0;
          $this->sc_force_zero[] = 'baseimponible_';
      } 
      if ($this->valor_ === "" || is_null($this->valor_))  
      { 
          $this->valor_ = 0;
          $this->sc_force_zero[] = 'valor_';
      } 
      if ($this->codimpice_ === "" || is_null($this->codimpice_))  
      { 
          $this->codimpice_ = 0;
          $this->sc_force_zero[] = 'codimpice_';
      } 
      if ($this->codporcenice_ === "" || is_null($this->codporcenice_))  
      { 
          $this->codporcenice_ = 0;
          $this->sc_force_zero[] = 'codporcenice_';
      } 
      if ($this->baseice_ === "" || is_null($this->baseice_))  
      { 
          $this->baseice_ = 0;
          $this->sc_force_zero[] = 'baseice_';
      } 
      if ($this->porcenice_ === "" || is_null($this->porcenice_))  
      { 
          $this->porcenice_ = 0;
          $this->sc_force_zero[] = 'porcenice_';
      } 
      if ($this->valorice_ === "" || is_null($this->valorice_))  
      { 
          $this->valorice_ = 0;
          $this->sc_force_zero[] = 'valorice_';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->ruc__before_qstr = $this->ruc_;
          $this->ruc_ = substr($this->Db->qstr($this->ruc_), 1, -1); 
          if ($this->ruc_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ruc_ = "null"; 
              $NM_val_null[] = "ruc_";
          } 
          $this->lote__before_qstr = $this->lote_;
          $this->lote_ = substr($this->Db->qstr($this->lote_), 1, -1); 
          if ($this->lote_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->lote_ = "null"; 
              $NM_val_null[] = "lote_";
          } 
          $this->codigo__before_qstr = $this->codigo_;
          $this->codigo_ = substr($this->Db->qstr($this->codigo_), 1, -1); 
          if ($this->codigo_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->codigo_ = "null"; 
              $NM_val_null[] = "codigo_";
          } 
          $this->descripcion__before_qstr = $this->descripcion_;
          $this->descripcion_ = substr($this->Db->qstr($this->descripcion_), 1, -1); 
          if ($this->descripcion_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->descripcion_ = "null"; 
              $NM_val_null[] = "descripcion_";
          } 
          $this->nombredetalleadicional1__before_qstr = $this->nombredetalleadicional1_;
          $this->nombredetalleadicional1_ = substr($this->Db->qstr($this->nombredetalleadicional1_), 1, -1); 
          if ($this->nombredetalleadicional1_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombredetalleadicional1_ = "null"; 
              $NM_val_null[] = "nombredetalleadicional1_";
          } 
          $this->valoradicional1__before_qstr = $this->valoradicional1_;
          $this->valoradicional1_ = substr($this->Db->qstr($this->valoradicional1_), 1, -1); 
          if ($this->valoradicional1_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional1_ = "null"; 
              $NM_val_null[] = "valoradicional1_";
          } 
          $this->nombredetalleadicional2__before_qstr = $this->nombredetalleadicional2_;
          $this->nombredetalleadicional2_ = substr($this->Db->qstr($this->nombredetalleadicional2_), 1, -1); 
          if ($this->nombredetalleadicional2_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombredetalleadicional2_ = "null"; 
              $NM_val_null[] = "nombredetalleadicional2_";
          } 
          $this->valoradicional2__before_qstr = $this->valoradicional2_;
          $this->valoradicional2_ = substr($this->Db->qstr($this->valoradicional2_), 1, -1); 
          if ($this->valoradicional2_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional2_ = "null"; 
              $NM_val_null[] = "valoradicional2_";
          } 
          $this->nombredetalleadicional3__before_qstr = $this->nombredetalleadicional3_;
          $this->nombredetalleadicional3_ = substr($this->Db->qstr($this->nombredetalleadicional3_), 1, -1); 
          if ($this->nombredetalleadicional3_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombredetalleadicional3_ = "null"; 
              $NM_val_null[] = "nombredetalleadicional3_";
          } 
          $this->valoradicional3__before_qstr = $this->valoradicional3_;
          $this->valoradicional3_ = substr($this->Db->qstr($this->valoradicional3_), 1, -1); 
          if ($this->valoradicional3_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional3_ = "null"; 
              $NM_val_null[] = "valoradicional3_";
          } 
          $this->nombredetalleadicional4__before_qstr = $this->nombredetalleadicional4_;
          $this->nombredetalleadicional4_ = substr($this->Db->qstr($this->nombredetalleadicional4_), 1, -1); 
          if ($this->nombredetalleadicional4_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombredetalleadicional4_ = "null"; 
              $NM_val_null[] = "nombredetalleadicional4_";
          } 
          $this->valoradicional4__before_qstr = $this->valoradicional4_;
          $this->valoradicional4_ = substr($this->Db->qstr($this->valoradicional4_), 1, -1); 
          if ($this->valoradicional4_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional4_ = "null"; 
              $NM_val_null[] = "valoradicional4_";
          } 
          $this->nombredetalleadicional5__before_qstr = $this->nombredetalleadicional5_;
          $this->nombredetalleadicional5_ = substr($this->Db->qstr($this->nombredetalleadicional5_), 1, -1); 
          if ($this->nombredetalleadicional5_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombredetalleadicional5_ = "null"; 
              $NM_val_null[] = "nombredetalleadicional5_";
          } 
          $this->valoradicional5__before_qstr = $this->valoradicional5_;
          $this->valoradicional5_ = substr($this->Db->qstr($this->valoradicional5_), 1, -1); 
          if ($this->valoradicional5_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional5_ = "null"; 
              $NM_val_null[] = "valoradicional5_";
          } 
          $this->nombredetalleadicional6__before_qstr = $this->nombredetalleadicional6_;
          $this->nombredetalleadicional6_ = substr($this->Db->qstr($this->nombredetalleadicional6_), 1, -1); 
          if ($this->nombredetalleadicional6_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombredetalleadicional6_ = "null"; 
              $NM_val_null[] = "nombredetalleadicional6_";
          } 
          $this->valoradicional6__before_qstr = $this->valoradicional6_;
          $this->valoradicional6_ = substr($this->Db->qstr($this->valoradicional6_), 1, -1); 
          if ($this->valoradicional6_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional6_ = "null"; 
              $NM_val_null[] = "valoradicional6_";
          } 
          $this->nombredetalleadicional7__before_qstr = $this->nombredetalleadicional7_;
          $this->nombredetalleadicional7_ = substr($this->Db->qstr($this->nombredetalleadicional7_), 1, -1); 
          if ($this->nombredetalleadicional7_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombredetalleadicional7_ = "null"; 
              $NM_val_null[] = "nombredetalleadicional7_";
          } 
          $this->valoradicional7__before_qstr = $this->valoradicional7_;
          $this->valoradicional7_ = substr($this->Db->qstr($this->valoradicional7_), 1, -1); 
          if ($this->valoradicional7_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional7_ = "null"; 
              $NM_val_null[] = "valoradicional7_";
          } 
          $this->nombredetalleadicional8__before_qstr = $this->nombredetalleadicional8_;
          $this->nombredetalleadicional8_ = substr($this->Db->qstr($this->nombredetalleadicional8_), 1, -1); 
          if ($this->nombredetalleadicional8_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombredetalleadicional8_ = "null"; 
              $NM_val_null[] = "nombredetalleadicional8_";
          } 
          $this->valoradicional8__before_qstr = $this->valoradicional8_;
          $this->valoradicional8_ = substr($this->Db->qstr($this->valoradicional8_), 1, -1); 
          if ($this->valoradicional8_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional8_ = "null"; 
              $NM_val_null[] = "valoradicional8_";
          } 
          $this->nombredetalleadicional9__before_qstr = $this->nombredetalleadicional9_;
          $this->nombredetalleadicional9_ = substr($this->Db->qstr($this->nombredetalleadicional9_), 1, -1); 
          if ($this->nombredetalleadicional9_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombredetalleadicional9_ = "null"; 
              $NM_val_null[] = "nombredetalleadicional9_";
          } 
          $this->valoradicional9__before_qstr = $this->valoradicional9_;
          $this->valoradicional9_ = substr($this->Db->qstr($this->valoradicional9_), 1, -1); 
          if ($this->valoradicional9_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional9_ = "null"; 
              $NM_val_null[] = "valoradicional9_";
          } 
          $this->nombredetalleadicional10__before_qstr = $this->nombredetalleadicional10_;
          $this->nombredetalleadicional10_ = substr($this->Db->qstr($this->nombredetalleadicional10_), 1, -1); 
          if ($this->nombredetalleadicional10_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombredetalleadicional10_ = "null"; 
              $NM_val_null[] = "nombredetalleadicional10_";
          } 
          $this->valoradicional10__before_qstr = $this->valoradicional10_;
          $this->valoradicional10_ = substr($this->Db->qstr($this->valoradicional10_), 1, -1); 
          if ($this->valoradicional10_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional10_ = "null"; 
              $NM_val_null[] = "valoradicional10_";
          } 
          $this->nombredetalleadicional11__before_qstr = $this->nombredetalleadicional11_;
          $this->nombredetalleadicional11_ = substr($this->Db->qstr($this->nombredetalleadicional11_), 1, -1); 
          if ($this->nombredetalleadicional11_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombredetalleadicional11_ = "null"; 
              $NM_val_null[] = "nombredetalleadicional11_";
          } 
          $this->valoradicional11__before_qstr = $this->valoradicional11_;
          $this->valoradicional11_ = substr($this->Db->qstr($this->valoradicional11_), 1, -1); 
          if ($this->valoradicional11_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional11_ = "null"; 
              $NM_val_null[] = "valoradicional11_";
          } 
          $this->nombredetalleadicional12__before_qstr = $this->nombredetalleadicional12_;
          $this->nombredetalleadicional12_ = substr($this->Db->qstr($this->nombredetalleadicional12_), 1, -1); 
          if ($this->nombredetalleadicional12_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombredetalleadicional12_ = "null"; 
              $NM_val_null[] = "nombredetalleadicional12_";
          } 
          $this->valoradicional12__before_qstr = $this->valoradicional12_;
          $this->valoradicional12_ = substr($this->Db->qstr($this->valoradicional12_), 1, -1); 
          if ($this->valoradicional12_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional12_ = "null"; 
              $NM_val_null[] = "valoradicional12_";
          } 
          $this->nombredetalleadicional13__before_qstr = $this->nombredetalleadicional13_;
          $this->nombredetalleadicional13_ = substr($this->Db->qstr($this->nombredetalleadicional13_), 1, -1); 
          if ($this->nombredetalleadicional13_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombredetalleadicional13_ = "null"; 
              $NM_val_null[] = "nombredetalleadicional13_";
          } 
          $this->valoradicional13__before_qstr = $this->valoradicional13_;
          $this->valoradicional13_ = substr($this->Db->qstr($this->valoradicional13_), 1, -1); 
          if ($this->valoradicional13_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional13_ = "null"; 
              $NM_val_null[] = "valoradicional13_";
          } 
          $this->nombredetalleadicional14__before_qstr = $this->nombredetalleadicional14_;
          $this->nombredetalleadicional14_ = substr($this->Db->qstr($this->nombredetalleadicional14_), 1, -1); 
          if ($this->nombredetalleadicional14_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombredetalleadicional14_ = "null"; 
              $NM_val_null[] = "nombredetalleadicional14_";
          } 
          $this->valoradicional14__before_qstr = $this->valoradicional14_;
          $this->valoradicional14_ = substr($this->Db->qstr($this->valoradicional14_), 1, -1); 
          if ($this->valoradicional14_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional14_ = "null"; 
              $NM_val_null[] = "valoradicional14_";
          } 
          $this->nombredetalleadicional15__before_qstr = $this->nombredetalleadicional15_;
          $this->nombredetalleadicional15_ = substr($this->Db->qstr($this->nombredetalleadicional15_), 1, -1); 
          if ($this->nombredetalleadicional15_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombredetalleadicional15_ = "null"; 
              $NM_val_null[] = "nombredetalleadicional15_";
          } 
          $this->valoradicional15__before_qstr = $this->valoradicional15_;
          $this->valoradicional15_ = substr($this->Db->qstr($this->valoradicional15_), 1, -1); 
          if ($this->valoradicional15_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional15_ = "null"; 
              $NM_val_null[] = "valoradicional15_";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_DETALLE_ORDEN_TRABAJO_inline_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "CODIGO = '$this->codigo_', DESCRIPCION = '$this->descripcion_', CANTIDAD = $this->cantidad_, PRECIOUNITARIO = $this->preciounitario_, DESCUENTO = $this->descuento_"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "CODIGO = '$this->codigo_', DESCRIPCION = '$this->descripcion_', CANTIDAD = $this->cantidad_, PRECIOUNITARIO = $this->preciounitario_, DESCUENTO = $this->descuento_"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "CODIGO = '$this->codigo_', DESCRIPCION = '$this->descripcion_', CANTIDAD = $this->cantidad_, PRECIOUNITARIO = $this->preciounitario_, DESCUENTO = $this->descuento_"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "CODIGO = '$this->codigo_', DESCRIPCION = '$this->descripcion_', CANTIDAD = $this->cantidad_, PRECIOUNITARIO = $this->preciounitario_, DESCUENTO = $this->descuento_"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "CODIGO = '$this->codigo_', DESCRIPCION = '$this->descripcion_', CANTIDAD = $this->cantidad_, PRECIOUNITARIO = $this->preciounitario_, DESCUENTO = $this->descuento_"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "CODIGO = '$this->codigo_', DESCRIPCION = '$this->descripcion_', CANTIDAD = $this->cantidad_, PRECIOUNITARIO = $this->preciounitario_, DESCUENTO = $this->descuento_"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "CODIGO = '$this->codigo_', DESCRIPCION = '$this->descripcion_', CANTIDAD = $this->cantidad_, PRECIOUNITARIO = $this->preciounitario_, DESCUENTO = $this->descuento_"; 
              } 
              if (isset($NM_val_form['ruc_']) && $NM_val_form['ruc_'] != $this->nmgp_dados_select['ruc_']) 
              { 
                  $SC_fields_update[] = "RUC = '$this->ruc_'"; 
              } 
              if (isset($NM_val_form['coddoc_']) && $NM_val_form['coddoc_'] != $this->nmgp_dados_select['coddoc_']) 
              { 
                  $SC_fields_update[] = "CODDOC = $this->coddoc_"; 
              } 
              if (isset($NM_val_form['preciototalsinimpuesto_']) && $NM_val_form['preciototalsinimpuesto_'] != $this->nmgp_dados_select['preciototalsinimpuesto_']) 
              { 
                  $SC_fields_update[] = "PRECIOTOTALSINIMPUESTO = $this->preciototalsinimpuesto_"; 
              } 
              if (isset($NM_val_form['nombredetalleadicional1_']) && $NM_val_form['nombredetalleadicional1_'] != $this->nmgp_dados_select['nombredetalleadicional1_']) 
              { 
                  $SC_fields_update[] = "NOMBREDETALLEADICIONAL1 = '$this->nombredetalleadicional1_'"; 
              } 
              if (isset($NM_val_form['valoradicional1_']) && $NM_val_form['valoradicional1_'] != $this->nmgp_dados_select['valoradicional1_']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL1 = '$this->valoradicional1_'"; 
              } 
              if (isset($NM_val_form['nombredetalleadicional2_']) && $NM_val_form['nombredetalleadicional2_'] != $this->nmgp_dados_select['nombredetalleadicional2_']) 
              { 
                  $SC_fields_update[] = "NOMBREDETALLEADICIONAL2 = '$this->nombredetalleadicional2_'"; 
              } 
              if (isset($NM_val_form['valoradicional2_']) && $NM_val_form['valoradicional2_'] != $this->nmgp_dados_select['valoradicional2_']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL2 = '$this->valoradicional2_'"; 
              } 
              if (isset($NM_val_form['nombredetalleadicional3_']) && $NM_val_form['nombredetalleadicional3_'] != $this->nmgp_dados_select['nombredetalleadicional3_']) 
              { 
                  $SC_fields_update[] = "NOMBREDETALLEADICIONAL3 = '$this->nombredetalleadicional3_'"; 
              } 
              if (isset($NM_val_form['valoradicional3_']) && $NM_val_form['valoradicional3_'] != $this->nmgp_dados_select['valoradicional3_']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL3 = '$this->valoradicional3_'"; 
              } 
              if (isset($NM_val_form['nombredetalleadicional4_']) && $NM_val_form['nombredetalleadicional4_'] != $this->nmgp_dados_select['nombredetalleadicional4_']) 
              { 
                  $SC_fields_update[] = "NOMBREDETALLEADICIONAL4 = '$this->nombredetalleadicional4_'"; 
              } 
              if (isset($NM_val_form['valoradicional4_']) && $NM_val_form['valoradicional4_'] != $this->nmgp_dados_select['valoradicional4_']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL4 = '$this->valoradicional4_'"; 
              } 
              if (isset($NM_val_form['nombredetalleadicional5_']) && $NM_val_form['nombredetalleadicional5_'] != $this->nmgp_dados_select['nombredetalleadicional5_']) 
              { 
                  $SC_fields_update[] = "NOMBREDETALLEADICIONAL5 = '$this->nombredetalleadicional5_'"; 
              } 
              if (isset($NM_val_form['valoradicional5_']) && $NM_val_form['valoradicional5_'] != $this->nmgp_dados_select['valoradicional5_']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL5 = '$this->valoradicional5_'"; 
              } 
              if (isset($NM_val_form['nombredetalleadicional6_']) && $NM_val_form['nombredetalleadicional6_'] != $this->nmgp_dados_select['nombredetalleadicional6_']) 
              { 
                  $SC_fields_update[] = "NOMBREDETALLEADICIONAL6 = '$this->nombredetalleadicional6_'"; 
              } 
              if (isset($NM_val_form['valoradicional6_']) && $NM_val_form['valoradicional6_'] != $this->nmgp_dados_select['valoradicional6_']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL6 = '$this->valoradicional6_'"; 
              } 
              if (isset($NM_val_form['nombredetalleadicional7_']) && $NM_val_form['nombredetalleadicional7_'] != $this->nmgp_dados_select['nombredetalleadicional7_']) 
              { 
                  $SC_fields_update[] = "NOMBREDETALLEADICIONAL7 = '$this->nombredetalleadicional7_'"; 
              } 
              if (isset($NM_val_form['valoradicional7_']) && $NM_val_form['valoradicional7_'] != $this->nmgp_dados_select['valoradicional7_']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL7 = '$this->valoradicional7_'"; 
              } 
              if (isset($NM_val_form['nombredetalleadicional8_']) && $NM_val_form['nombredetalleadicional8_'] != $this->nmgp_dados_select['nombredetalleadicional8_']) 
              { 
                  $SC_fields_update[] = "NOMBREDETALLEADICIONAL8 = '$this->nombredetalleadicional8_'"; 
              } 
              if (isset($NM_val_form['valoradicional8_']) && $NM_val_form['valoradicional8_'] != $this->nmgp_dados_select['valoradicional8_']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL8 = '$this->valoradicional8_'"; 
              } 
              if (isset($NM_val_form['nombredetalleadicional9_']) && $NM_val_form['nombredetalleadicional9_'] != $this->nmgp_dados_select['nombredetalleadicional9_']) 
              { 
                  $SC_fields_update[] = "NOMBREDETALLEADICIONAL9 = '$this->nombredetalleadicional9_'"; 
              } 
              if (isset($NM_val_form['valoradicional9_']) && $NM_val_form['valoradicional9_'] != $this->nmgp_dados_select['valoradicional9_']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL9 = '$this->valoradicional9_'"; 
              } 
              if (isset($NM_val_form['nombredetalleadicional10_']) && $NM_val_form['nombredetalleadicional10_'] != $this->nmgp_dados_select['nombredetalleadicional10_']) 
              { 
                  $SC_fields_update[] = "NOMBREDETALLEADICIONAL10 = '$this->nombredetalleadicional10_'"; 
              } 
              if (isset($NM_val_form['valoradicional10_']) && $NM_val_form['valoradicional10_'] != $this->nmgp_dados_select['valoradicional10_']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL10 = '$this->valoradicional10_'"; 
              } 
              if (isset($NM_val_form['nombredetalleadicional11_']) && $NM_val_form['nombredetalleadicional11_'] != $this->nmgp_dados_select['nombredetalleadicional11_']) 
              { 
                  $SC_fields_update[] = "NOMBREDETALLEADICIONAL11 = '$this->nombredetalleadicional11_'"; 
              } 
              if (isset($NM_val_form['valoradicional11_']) && $NM_val_form['valoradicional11_'] != $this->nmgp_dados_select['valoradicional11_']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL11 = '$this->valoradicional11_'"; 
              } 
              if (isset($NM_val_form['nombredetalleadicional12_']) && $NM_val_form['nombredetalleadicional12_'] != $this->nmgp_dados_select['nombredetalleadicional12_']) 
              { 
                  $SC_fields_update[] = "NOMBREDETALLEADICIONAL12 = '$this->nombredetalleadicional12_'"; 
              } 
              if (isset($NM_val_form['valoradicional12_']) && $NM_val_form['valoradicional12_'] != $this->nmgp_dados_select['valoradicional12_']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL12 = '$this->valoradicional12_'"; 
              } 
              if (isset($NM_val_form['nombredetalleadicional13_']) && $NM_val_form['nombredetalleadicional13_'] != $this->nmgp_dados_select['nombredetalleadicional13_']) 
              { 
                  $SC_fields_update[] = "NOMBREDETALLEADICIONAL13 = '$this->nombredetalleadicional13_'"; 
              } 
              if (isset($NM_val_form['valoradicional13_']) && $NM_val_form['valoradicional13_'] != $this->nmgp_dados_select['valoradicional13_']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL13 = '$this->valoradicional13_'"; 
              } 
              if (isset($NM_val_form['nombredetalleadicional14_']) && $NM_val_form['nombredetalleadicional14_'] != $this->nmgp_dados_select['nombredetalleadicional14_']) 
              { 
                  $SC_fields_update[] = "NOMBREDETALLEADICIONAL14 = '$this->nombredetalleadicional14_'"; 
              } 
              if (isset($NM_val_form['valoradicional14_']) && $NM_val_form['valoradicional14_'] != $this->nmgp_dados_select['valoradicional14_']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL14 = '$this->valoradicional14_'"; 
              } 
              if (isset($NM_val_form['nombredetalleadicional15_']) && $NM_val_form['nombredetalleadicional15_'] != $this->nmgp_dados_select['nombredetalleadicional15_']) 
              { 
                  $SC_fields_update[] = "NOMBREDETALLEADICIONAL15 = '$this->nombredetalleadicional15_'"; 
              } 
              if (isset($NM_val_form['valoradicional15_']) && $NM_val_form['valoradicional15_'] != $this->nmgp_dados_select['valoradicional15_']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL15 = '$this->valoradicional15_'"; 
              } 
              if (isset($NM_val_form['codigoimpuesto_']) && $NM_val_form['codigoimpuesto_'] != $this->nmgp_dados_select['codigoimpuesto_']) 
              { 
                  $SC_fields_update[] = "CODIGOIMPUESTO = $this->codigoimpuesto_"; 
              } 
              if (isset($NM_val_form['codigoporcentajeimp_']) && $NM_val_form['codigoporcentajeimp_'] != $this->nmgp_dados_select['codigoporcentajeimp_']) 
              { 
                  $SC_fields_update[] = "CODIGOPORCENTAJEIMP = $this->codigoporcentajeimp_"; 
              } 
              if (isset($NM_val_form['tarifa_']) && $NM_val_form['tarifa_'] != $this->nmgp_dados_select['tarifa_']) 
              { 
                  $SC_fields_update[] = "TARIFA = $this->tarifa_"; 
              } 
              if (isset($NM_val_form['baseimponible_']) && $NM_val_form['baseimponible_'] != $this->nmgp_dados_select['baseimponible_']) 
              { 
                  $SC_fields_update[] = "BASEIMPONIBLE = $this->baseimponible_"; 
              } 
              if (isset($NM_val_form['valor_']) && $NM_val_form['valor_'] != $this->nmgp_dados_select['valor_']) 
              { 
                  $SC_fields_update[] = "VALOR = $this->valor_"; 
              } 
              if (isset($NM_val_form['codimpice_']) && $NM_val_form['codimpice_'] != $this->nmgp_dados_select['codimpice_']) 
              { 
                  $SC_fields_update[] = "CODIMPICE = $this->codimpice_"; 
              } 
              if (isset($NM_val_form['codporcenice_']) && $NM_val_form['codporcenice_'] != $this->nmgp_dados_select['codporcenice_']) 
              { 
                  $SC_fields_update[] = "CODPORCENICE = $this->codporcenice_"; 
              } 
              if (isset($NM_val_form['baseice_']) && $NM_val_form['baseice_'] != $this->nmgp_dados_select['baseice_']) 
              { 
                  $SC_fields_update[] = "BASEICE = $this->baseice_"; 
              } 
              if (isset($NM_val_form['porcenice_']) && $NM_val_form['porcenice_'] != $this->nmgp_dados_select['porcenice_']) 
              { 
                  $SC_fields_update[] = "PORCENICE = $this->porcenice_"; 
              } 
              if (isset($NM_val_form['valorice_']) && $NM_val_form['valorice_'] != $this->nmgp_dados_select['valorice_']) 
              { 
                  $SC_fields_update[] = "VALORICE = $this->valorice_"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' ";  
              }  
              else  
              {
                  $comando .= " WHERE ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' ";  
              }  
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $useUpdateProcedure = false;
              if (!empty($SC_fields_update) || $useUpdateProcedure)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $dbErrorMessage = $this->Db->ErrorMsg();
                          $dbErrorCode = $this->Db->ErrorNo();
                          $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $dbErrorMessage, true);
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $dbErrorMessage;
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_DETALLE_ORDEN_TRABAJO_inline_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->ruc_ = $this->ruc__before_qstr;
              $this->lote_ = $this->lote__before_qstr;
              $this->codigo_ = $this->codigo__before_qstr;
              $this->descripcion_ = $this->descripcion__before_qstr;
              $this->nombredetalleadicional1_ = $this->nombredetalleadicional1__before_qstr;
              $this->valoradicional1_ = $this->valoradicional1__before_qstr;
              $this->nombredetalleadicional2_ = $this->nombredetalleadicional2__before_qstr;
              $this->valoradicional2_ = $this->valoradicional2__before_qstr;
              $this->nombredetalleadicional3_ = $this->nombredetalleadicional3__before_qstr;
              $this->valoradicional3_ = $this->valoradicional3__before_qstr;
              $this->nombredetalleadicional4_ = $this->nombredetalleadicional4__before_qstr;
              $this->valoradicional4_ = $this->valoradicional4__before_qstr;
              $this->nombredetalleadicional5_ = $this->nombredetalleadicional5__before_qstr;
              $this->valoradicional5_ = $this->valoradicional5__before_qstr;
              $this->nombredetalleadicional6_ = $this->nombredetalleadicional6__before_qstr;
              $this->valoradicional6_ = $this->valoradicional6__before_qstr;
              $this->nombredetalleadicional7_ = $this->nombredetalleadicional7__before_qstr;
              $this->valoradicional7_ = $this->valoradicional7__before_qstr;
              $this->nombredetalleadicional8_ = $this->nombredetalleadicional8__before_qstr;
              $this->valoradicional8_ = $this->valoradicional8__before_qstr;
              $this->nombredetalleadicional9_ = $this->nombredetalleadicional9__before_qstr;
              $this->valoradicional9_ = $this->valoradicional9__before_qstr;
              $this->nombredetalleadicional10_ = $this->nombredetalleadicional10__before_qstr;
              $this->valoradicional10_ = $this->valoradicional10__before_qstr;
              $this->nombredetalleadicional11_ = $this->nombredetalleadicional11__before_qstr;
              $this->valoradicional11_ = $this->valoradicional11__before_qstr;
              $this->nombredetalleadicional12_ = $this->nombredetalleadicional12__before_qstr;
              $this->valoradicional12_ = $this->valoradicional12__before_qstr;
              $this->nombredetalleadicional13_ = $this->nombredetalleadicional13__before_qstr;
              $this->valoradicional13_ = $this->valoradicional13__before_qstr;
              $this->nombredetalleadicional14_ = $this->nombredetalleadicional14__before_qstr;
              $this->valoradicional14_ = $this->valoradicional14__before_qstr;
              $this->nombredetalleadicional15_ = $this->nombredetalleadicional15__before_qstr;
              $this->valoradicional15_ = $this->valoradicional15__before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['estab_'])) { $this->estab_ = $NM_val_form['estab_']; }
              elseif (isset($this->estab_)) { $this->nm_limpa_alfa($this->estab_); }
              if     (isset($NM_val_form) && isset($NM_val_form['ptoemi_'])) { $this->ptoemi_ = $NM_val_form['ptoemi_']; }
              elseif (isset($this->ptoemi_)) { $this->nm_limpa_alfa($this->ptoemi_); }
              if     (isset($NM_val_form) && isset($NM_val_form['secuencial_'])) { $this->secuencial_ = $NM_val_form['secuencial_']; }
              elseif (isset($this->secuencial_)) { $this->nm_limpa_alfa($this->secuencial_); }
              if     (isset($NM_val_form) && isset($NM_val_form['lote_'])) { $this->lote_ = $NM_val_form['lote_']; }
              elseif (isset($this->lote_)) { $this->nm_limpa_alfa($this->lote_); }
              if     (isset($NM_val_form) && isset($NM_val_form['codigo_'])) { $this->codigo_ = $NM_val_form['codigo_']; }
              elseif (isset($this->codigo_)) { $this->nm_limpa_alfa($this->codigo_); }
              if     (isset($NM_val_form) && isset($NM_val_form['descripcion_'])) { $this->descripcion_ = $NM_val_form['descripcion_']; }
              elseif (isset($this->descripcion_)) { $this->nm_limpa_alfa($this->descripcion_); }
              if     (isset($NM_val_form) && isset($NM_val_form['cantidad_'])) { $this->cantidad_ = $NM_val_form['cantidad_']; }
              elseif (isset($this->cantidad_)) { $this->nm_limpa_alfa($this->cantidad_); }
              if     (isset($NM_val_form) && isset($NM_val_form['preciounitario_'])) { $this->preciounitario_ = $NM_val_form['preciounitario_']; }
              elseif (isset($this->preciounitario_)) { $this->nm_limpa_alfa($this->preciounitario_); }
              if     (isset($NM_val_form) && isset($NM_val_form['descuento_'])) { $this->descuento_ = $NM_val_form['descuento_']; }
              elseif (isset($this->descuento_)) { $this->nm_limpa_alfa($this->descuento_); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('codigo_', 'descripcion_', 'cantidad_', 'preciounitario_', 'descuento_', 'estab_', 'ptoemi_', 'secuencial_', 'lote_'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          $bInsertOk = true;
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 0) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_pkey']); 
              $this->nmgp_opcao = "nada"; 
              $GLOBALS["erro_incl"] = 1; 
              $bInsertOk = false;
              $this->sc_evento = 'insert';
          } 
          $rs1->Close(); 
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_DETALLE_ORDEN_TRABAJO_inline_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, CODIGO, DESCRIPCION, CANTIDAD, PRECIOUNITARIO, DESCUENTO, PRECIOTOTALSINIMPUESTO, NOMBREDETALLEADICIONAL1, VALORADICIONAL1, NOMBREDETALLEADICIONAL2, VALORADICIONAL2, NOMBREDETALLEADICIONAL3, VALORADICIONAL3, NOMBREDETALLEADICIONAL4, VALORADICIONAL4, NOMBREDETALLEADICIONAL5, VALORADICIONAL5, NOMBREDETALLEADICIONAL6, VALORADICIONAL6, NOMBREDETALLEADICIONAL7, VALORADICIONAL7, NOMBREDETALLEADICIONAL8, VALORADICIONAL8, NOMBREDETALLEADICIONAL9, VALORADICIONAL9, NOMBREDETALLEADICIONAL10, VALORADICIONAL10, NOMBREDETALLEADICIONAL11, VALORADICIONAL11, NOMBREDETALLEADICIONAL12, VALORADICIONAL12, NOMBREDETALLEADICIONAL13, VALORADICIONAL13, NOMBREDETALLEADICIONAL14, VALORADICIONAL14, NOMBREDETALLEADICIONAL15, VALORADICIONAL15, CODIGOIMPUESTO, CODIGOPORCENTAJEIMP, TARIFA, BASEIMPONIBLE, VALOR, CODIMPICE, CODPORCENICE, BASEICE, PORCENICE, VALORICE) VALUES ('$this->ruc_', $this->coddoc_, $this->estab_, $this->ptoemi_, $this->secuencial_, '$this->lote_', '$this->codigo_', '$this->descripcion_', $this->cantidad_, $this->preciounitario_, $this->descuento_, $this->preciototalsinimpuesto_, '$this->nombredetalleadicional1_', '$this->valoradicional1_', '$this->nombredetalleadicional2_', '$this->valoradicional2_', '$this->nombredetalleadicional3_', '$this->valoradicional3_', '$this->nombredetalleadicional4_', '$this->valoradicional4_', '$this->nombredetalleadicional5_', '$this->valoradicional5_', '$this->nombredetalleadicional6_', '$this->valoradicional6_', '$this->nombredetalleadicional7_', '$this->valoradicional7_', '$this->nombredetalleadicional8_', '$this->valoradicional8_', '$this->nombredetalleadicional9_', '$this->valoradicional9_', '$this->nombredetalleadicional10_', '$this->valoradicional10_', '$this->nombredetalleadicional11_', '$this->valoradicional11_', '$this->nombredetalleadicional12_', '$this->valoradicional12_', '$this->nombredetalleadicional13_', '$this->valoradicional13_', '$this->nombredetalleadicional14_', '$this->valoradicional14_', '$this->nombredetalleadicional15_', '$this->valoradicional15_', $this->codigoimpuesto_, $this->codigoporcentajeimp_, $this->tarifa_, $this->baseimponible_, $this->valor_, $this->codimpice_, $this->codporcenice_, $this->baseice_, $this->porcenice_, $this->valorice_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, CODIGO, DESCRIPCION, CANTIDAD, PRECIOUNITARIO, DESCUENTO, PRECIOTOTALSINIMPUESTO, NOMBREDETALLEADICIONAL1, VALORADICIONAL1, NOMBREDETALLEADICIONAL2, VALORADICIONAL2, NOMBREDETALLEADICIONAL3, VALORADICIONAL3, NOMBREDETALLEADICIONAL4, VALORADICIONAL4, NOMBREDETALLEADICIONAL5, VALORADICIONAL5, NOMBREDETALLEADICIONAL6, VALORADICIONAL6, NOMBREDETALLEADICIONAL7, VALORADICIONAL7, NOMBREDETALLEADICIONAL8, VALORADICIONAL8, NOMBREDETALLEADICIONAL9, VALORADICIONAL9, NOMBREDETALLEADICIONAL10, VALORADICIONAL10, NOMBREDETALLEADICIONAL11, VALORADICIONAL11, NOMBREDETALLEADICIONAL12, VALORADICIONAL12, NOMBREDETALLEADICIONAL13, VALORADICIONAL13, NOMBREDETALLEADICIONAL14, VALORADICIONAL14, NOMBREDETALLEADICIONAL15, VALORADICIONAL15, CODIGOIMPUESTO, CODIGOPORCENTAJEIMP, TARIFA, BASEIMPONIBLE, VALOR, CODIMPICE, CODPORCENICE, BASEICE, PORCENICE, VALORICE) VALUES (" . $NM_seq_auto . "'$this->ruc_', $this->coddoc_, $this->estab_, $this->ptoemi_, $this->secuencial_, '$this->lote_', '$this->codigo_', '$this->descripcion_', $this->cantidad_, $this->preciounitario_, $this->descuento_, $this->preciototalsinimpuesto_, '$this->nombredetalleadicional1_', '$this->valoradicional1_', '$this->nombredetalleadicional2_', '$this->valoradicional2_', '$this->nombredetalleadicional3_', '$this->valoradicional3_', '$this->nombredetalleadicional4_', '$this->valoradicional4_', '$this->nombredetalleadicional5_', '$this->valoradicional5_', '$this->nombredetalleadicional6_', '$this->valoradicional6_', '$this->nombredetalleadicional7_', '$this->valoradicional7_', '$this->nombredetalleadicional8_', '$this->valoradicional8_', '$this->nombredetalleadicional9_', '$this->valoradicional9_', '$this->nombredetalleadicional10_', '$this->valoradicional10_', '$this->nombredetalleadicional11_', '$this->valoradicional11_', '$this->nombredetalleadicional12_', '$this->valoradicional12_', '$this->nombredetalleadicional13_', '$this->valoradicional13_', '$this->nombredetalleadicional14_', '$this->valoradicional14_', '$this->nombredetalleadicional15_', '$this->valoradicional15_', $this->codigoimpuesto_, $this->codigoporcentajeimp_, $this->tarifa_, $this->baseimponible_, $this->valor_, $this->codimpice_, $this->codporcenice_, $this->baseice_, $this->porcenice_, $this->valorice_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, CODIGO, DESCRIPCION, CANTIDAD, PRECIOUNITARIO, DESCUENTO, PRECIOTOTALSINIMPUESTO, NOMBREDETALLEADICIONAL1, VALORADICIONAL1, NOMBREDETALLEADICIONAL2, VALORADICIONAL2, NOMBREDETALLEADICIONAL3, VALORADICIONAL3, NOMBREDETALLEADICIONAL4, VALORADICIONAL4, NOMBREDETALLEADICIONAL5, VALORADICIONAL5, NOMBREDETALLEADICIONAL6, VALORADICIONAL6, NOMBREDETALLEADICIONAL7, VALORADICIONAL7, NOMBREDETALLEADICIONAL8, VALORADICIONAL8, NOMBREDETALLEADICIONAL9, VALORADICIONAL9, NOMBREDETALLEADICIONAL10, VALORADICIONAL10, NOMBREDETALLEADICIONAL11, VALORADICIONAL11, NOMBREDETALLEADICIONAL12, VALORADICIONAL12, NOMBREDETALLEADICIONAL13, VALORADICIONAL13, NOMBREDETALLEADICIONAL14, VALORADICIONAL14, NOMBREDETALLEADICIONAL15, VALORADICIONAL15, CODIGOIMPUESTO, CODIGOPORCENTAJEIMP, TARIFA, BASEIMPONIBLE, VALOR, CODIMPICE, CODPORCENICE, BASEICE, PORCENICE, VALORICE) VALUES (" . $NM_seq_auto . "'$this->ruc_', $this->coddoc_, $this->estab_, $this->ptoemi_, $this->secuencial_, '$this->lote_', '$this->codigo_', '$this->descripcion_', $this->cantidad_, $this->preciounitario_, $this->descuento_, $this->preciototalsinimpuesto_, '$this->nombredetalleadicional1_', '$this->valoradicional1_', '$this->nombredetalleadicional2_', '$this->valoradicional2_', '$this->nombredetalleadicional3_', '$this->valoradicional3_', '$this->nombredetalleadicional4_', '$this->valoradicional4_', '$this->nombredetalleadicional5_', '$this->valoradicional5_', '$this->nombredetalleadicional6_', '$this->valoradicional6_', '$this->nombredetalleadicional7_', '$this->valoradicional7_', '$this->nombredetalleadicional8_', '$this->valoradicional8_', '$this->nombredetalleadicional9_', '$this->valoradicional9_', '$this->nombredetalleadicional10_', '$this->valoradicional10_', '$this->nombredetalleadicional11_', '$this->valoradicional11_', '$this->nombredetalleadicional12_', '$this->valoradicional12_', '$this->nombredetalleadicional13_', '$this->valoradicional13_', '$this->nombredetalleadicional14_', '$this->valoradicional14_', '$this->nombredetalleadicional15_', '$this->valoradicional15_', $this->codigoimpuesto_, $this->codigoporcentajeimp_, $this->tarifa_, $this->baseimponible_, $this->valor_, $this->codimpice_, $this->codporcenice_, $this->baseice_, $this->porcenice_, $this->valorice_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, CODIGO, DESCRIPCION, CANTIDAD, PRECIOUNITARIO, DESCUENTO, PRECIOTOTALSINIMPUESTO, NOMBREDETALLEADICIONAL1, VALORADICIONAL1, NOMBREDETALLEADICIONAL2, VALORADICIONAL2, NOMBREDETALLEADICIONAL3, VALORADICIONAL3, NOMBREDETALLEADICIONAL4, VALORADICIONAL4, NOMBREDETALLEADICIONAL5, VALORADICIONAL5, NOMBREDETALLEADICIONAL6, VALORADICIONAL6, NOMBREDETALLEADICIONAL7, VALORADICIONAL7, NOMBREDETALLEADICIONAL8, VALORADICIONAL8, NOMBREDETALLEADICIONAL9, VALORADICIONAL9, NOMBREDETALLEADICIONAL10, VALORADICIONAL10, NOMBREDETALLEADICIONAL11, VALORADICIONAL11, NOMBREDETALLEADICIONAL12, VALORADICIONAL12, NOMBREDETALLEADICIONAL13, VALORADICIONAL13, NOMBREDETALLEADICIONAL14, VALORADICIONAL14, NOMBREDETALLEADICIONAL15, VALORADICIONAL15, CODIGOIMPUESTO, CODIGOPORCENTAJEIMP, TARIFA, BASEIMPONIBLE, VALOR, CODIMPICE, CODPORCENICE, BASEICE, PORCENICE, VALORICE) VALUES (" . $NM_seq_auto . "'$this->ruc_', $this->coddoc_, $this->estab_, $this->ptoemi_, $this->secuencial_, '$this->lote_', '$this->codigo_', '$this->descripcion_', $this->cantidad_, $this->preciounitario_, $this->descuento_, $this->preciototalsinimpuesto_, '$this->nombredetalleadicional1_', '$this->valoradicional1_', '$this->nombredetalleadicional2_', '$this->valoradicional2_', '$this->nombredetalleadicional3_', '$this->valoradicional3_', '$this->nombredetalleadicional4_', '$this->valoradicional4_', '$this->nombredetalleadicional5_', '$this->valoradicional5_', '$this->nombredetalleadicional6_', '$this->valoradicional6_', '$this->nombredetalleadicional7_', '$this->valoradicional7_', '$this->nombredetalleadicional8_', '$this->valoradicional8_', '$this->nombredetalleadicional9_', '$this->valoradicional9_', '$this->nombredetalleadicional10_', '$this->valoradicional10_', '$this->nombredetalleadicional11_', '$this->valoradicional11_', '$this->nombredetalleadicional12_', '$this->valoradicional12_', '$this->nombredetalleadicional13_', '$this->valoradicional13_', '$this->nombredetalleadicional14_', '$this->valoradicional14_', '$this->nombredetalleadicional15_', '$this->valoradicional15_', $this->codigoimpuesto_, $this->codigoporcentajeimp_, $this->tarifa_, $this->baseimponible_, $this->valor_, $this->codimpice_, $this->codporcenice_, $this->baseice_, $this->porcenice_, $this->valorice_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, CODIGO, DESCRIPCION, CANTIDAD, PRECIOUNITARIO, DESCUENTO, PRECIOTOTALSINIMPUESTO, NOMBREDETALLEADICIONAL1, VALORADICIONAL1, NOMBREDETALLEADICIONAL2, VALORADICIONAL2, NOMBREDETALLEADICIONAL3, VALORADICIONAL3, NOMBREDETALLEADICIONAL4, VALORADICIONAL4, NOMBREDETALLEADICIONAL5, VALORADICIONAL5, NOMBREDETALLEADICIONAL6, VALORADICIONAL6, NOMBREDETALLEADICIONAL7, VALORADICIONAL7, NOMBREDETALLEADICIONAL8, VALORADICIONAL8, NOMBREDETALLEADICIONAL9, VALORADICIONAL9, NOMBREDETALLEADICIONAL10, VALORADICIONAL10, NOMBREDETALLEADICIONAL11, VALORADICIONAL11, NOMBREDETALLEADICIONAL12, VALORADICIONAL12, NOMBREDETALLEADICIONAL13, VALORADICIONAL13, NOMBREDETALLEADICIONAL14, VALORADICIONAL14, NOMBREDETALLEADICIONAL15, VALORADICIONAL15, CODIGOIMPUESTO, CODIGOPORCENTAJEIMP, TARIFA, BASEIMPONIBLE, VALOR, CODIMPICE, CODPORCENICE, BASEICE, PORCENICE, VALORICE) VALUES (" . $NM_seq_auto . "'$this->ruc_', $this->coddoc_, $this->estab_, $this->ptoemi_, $this->secuencial_, '$this->lote_', '$this->codigo_', '$this->descripcion_', $this->cantidad_, $this->preciounitario_, $this->descuento_, $this->preciototalsinimpuesto_, '$this->nombredetalleadicional1_', '$this->valoradicional1_', '$this->nombredetalleadicional2_', '$this->valoradicional2_', '$this->nombredetalleadicional3_', '$this->valoradicional3_', '$this->nombredetalleadicional4_', '$this->valoradicional4_', '$this->nombredetalleadicional5_', '$this->valoradicional5_', '$this->nombredetalleadicional6_', '$this->valoradicional6_', '$this->nombredetalleadicional7_', '$this->valoradicional7_', '$this->nombredetalleadicional8_', '$this->valoradicional8_', '$this->nombredetalleadicional9_', '$this->valoradicional9_', '$this->nombredetalleadicional10_', '$this->valoradicional10_', '$this->nombredetalleadicional11_', '$this->valoradicional11_', '$this->nombredetalleadicional12_', '$this->valoradicional12_', '$this->nombredetalleadicional13_', '$this->valoradicional13_', '$this->nombredetalleadicional14_', '$this->valoradicional14_', '$this->nombredetalleadicional15_', '$this->valoradicional15_', $this->codigoimpuesto_, $this->codigoporcentajeimp_, $this->tarifa_, $this->baseimponible_, $this->valor_, $this->codimpice_, $this->codporcenice_, $this->baseice_, $this->porcenice_, $this->valorice_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, CODIGO, DESCRIPCION, CANTIDAD, PRECIOUNITARIO, DESCUENTO, PRECIOTOTALSINIMPUESTO, NOMBREDETALLEADICIONAL1, VALORADICIONAL1, NOMBREDETALLEADICIONAL2, VALORADICIONAL2, NOMBREDETALLEADICIONAL3, VALORADICIONAL3, NOMBREDETALLEADICIONAL4, VALORADICIONAL4, NOMBREDETALLEADICIONAL5, VALORADICIONAL5, NOMBREDETALLEADICIONAL6, VALORADICIONAL6, NOMBREDETALLEADICIONAL7, VALORADICIONAL7, NOMBREDETALLEADICIONAL8, VALORADICIONAL8, NOMBREDETALLEADICIONAL9, VALORADICIONAL9, NOMBREDETALLEADICIONAL10, VALORADICIONAL10, NOMBREDETALLEADICIONAL11, VALORADICIONAL11, NOMBREDETALLEADICIONAL12, VALORADICIONAL12, NOMBREDETALLEADICIONAL13, VALORADICIONAL13, NOMBREDETALLEADICIONAL14, VALORADICIONAL14, NOMBREDETALLEADICIONAL15, VALORADICIONAL15, CODIGOIMPUESTO, CODIGOPORCENTAJEIMP, TARIFA, BASEIMPONIBLE, VALOR, CODIMPICE, CODPORCENICE, BASEICE, PORCENICE, VALORICE) VALUES (" . $NM_seq_auto . "'$this->ruc_', $this->coddoc_, $this->estab_, $this->ptoemi_, $this->secuencial_, '$this->lote_', '$this->codigo_', '$this->descripcion_', $this->cantidad_, $this->preciounitario_, $this->descuento_, $this->preciototalsinimpuesto_, '$this->nombredetalleadicional1_', '$this->valoradicional1_', '$this->nombredetalleadicional2_', '$this->valoradicional2_', '$this->nombredetalleadicional3_', '$this->valoradicional3_', '$this->nombredetalleadicional4_', '$this->valoradicional4_', '$this->nombredetalleadicional5_', '$this->valoradicional5_', '$this->nombredetalleadicional6_', '$this->valoradicional6_', '$this->nombredetalleadicional7_', '$this->valoradicional7_', '$this->nombredetalleadicional8_', '$this->valoradicional8_', '$this->nombredetalleadicional9_', '$this->valoradicional9_', '$this->nombredetalleadicional10_', '$this->valoradicional10_', '$this->nombredetalleadicional11_', '$this->valoradicional11_', '$this->nombredetalleadicional12_', '$this->valoradicional12_', '$this->nombredetalleadicional13_', '$this->valoradicional13_', '$this->nombredetalleadicional14_', '$this->valoradicional14_', '$this->nombredetalleadicional15_', '$this->valoradicional15_', $this->codigoimpuesto_, $this->codigoporcentajeimp_, $this->tarifa_, $this->baseimponible_, $this->valor_, $this->codimpice_, $this->codporcenice_, $this->baseice_, $this->porcenice_, $this->valorice_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, CODIGO, DESCRIPCION, CANTIDAD, PRECIOUNITARIO, DESCUENTO, PRECIOTOTALSINIMPUESTO, NOMBREDETALLEADICIONAL1, VALORADICIONAL1, NOMBREDETALLEADICIONAL2, VALORADICIONAL2, NOMBREDETALLEADICIONAL3, VALORADICIONAL3, NOMBREDETALLEADICIONAL4, VALORADICIONAL4, NOMBREDETALLEADICIONAL5, VALORADICIONAL5, NOMBREDETALLEADICIONAL6, VALORADICIONAL6, NOMBREDETALLEADICIONAL7, VALORADICIONAL7, NOMBREDETALLEADICIONAL8, VALORADICIONAL8, NOMBREDETALLEADICIONAL9, VALORADICIONAL9, NOMBREDETALLEADICIONAL10, VALORADICIONAL10, NOMBREDETALLEADICIONAL11, VALORADICIONAL11, NOMBREDETALLEADICIONAL12, VALORADICIONAL12, NOMBREDETALLEADICIONAL13, VALORADICIONAL13, NOMBREDETALLEADICIONAL14, VALORADICIONAL14, NOMBREDETALLEADICIONAL15, VALORADICIONAL15, CODIGOIMPUESTO, CODIGOPORCENTAJEIMP, TARIFA, BASEIMPONIBLE, VALOR, CODIMPICE, CODPORCENICE, BASEICE, PORCENICE, VALORICE) VALUES (" . $NM_seq_auto . "'$this->ruc_', $this->coddoc_, $this->estab_, $this->ptoemi_, $this->secuencial_, '$this->lote_', '$this->codigo_', '$this->descripcion_', $this->cantidad_, $this->preciounitario_, $this->descuento_, $this->preciototalsinimpuesto_, '$this->nombredetalleadicional1_', '$this->valoradicional1_', '$this->nombredetalleadicional2_', '$this->valoradicional2_', '$this->nombredetalleadicional3_', '$this->valoradicional3_', '$this->nombredetalleadicional4_', '$this->valoradicional4_', '$this->nombredetalleadicional5_', '$this->valoradicional5_', '$this->nombredetalleadicional6_', '$this->valoradicional6_', '$this->nombredetalleadicional7_', '$this->valoradicional7_', '$this->nombredetalleadicional8_', '$this->valoradicional8_', '$this->nombredetalleadicional9_', '$this->valoradicional9_', '$this->nombredetalleadicional10_', '$this->valoradicional10_', '$this->nombredetalleadicional11_', '$this->valoradicional11_', '$this->nombredetalleadicional12_', '$this->valoradicional12_', '$this->nombredetalleadicional13_', '$this->valoradicional13_', '$this->nombredetalleadicional14_', '$this->valoradicional14_', '$this->nombredetalleadicional15_', '$this->valoradicional15_', $this->codigoimpuesto_, $this->codigoporcentajeimp_, $this->tarifa_, $this->baseimponible_, $this->valor_, $this->codimpice_, $this->codporcenice_, $this->baseice_, $this->porcenice_, $this->valorice_)"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, CODIGO, DESCRIPCION, CANTIDAD, PRECIOUNITARIO, DESCUENTO, PRECIOTOTALSINIMPUESTO, NOMBREDETALLEADICIONAL1, VALORADICIONAL1, NOMBREDETALLEADICIONAL2, VALORADICIONAL2, NOMBREDETALLEADICIONAL3, VALORADICIONAL3, NOMBREDETALLEADICIONAL4, VALORADICIONAL4, NOMBREDETALLEADICIONAL5, VALORADICIONAL5, NOMBREDETALLEADICIONAL6, VALORADICIONAL6, NOMBREDETALLEADICIONAL7, VALORADICIONAL7, NOMBREDETALLEADICIONAL8, VALORADICIONAL8, NOMBREDETALLEADICIONAL9, VALORADICIONAL9, NOMBREDETALLEADICIONAL10, VALORADICIONAL10, NOMBREDETALLEADICIONAL11, VALORADICIONAL11, NOMBREDETALLEADICIONAL12, VALORADICIONAL12, NOMBREDETALLEADICIONAL13, VALORADICIONAL13, NOMBREDETALLEADICIONAL14, VALORADICIONAL14, NOMBREDETALLEADICIONAL15, VALORADICIONAL15, CODIGOIMPUESTO, CODIGOPORCENTAJEIMP, TARIFA, BASEIMPONIBLE, VALOR, CODIMPICE, CODPORCENICE, BASEICE, PORCENICE, VALORICE) VALUES (" . $NM_seq_auto . "'$this->ruc_', $this->coddoc_, $this->estab_, $this->ptoemi_, $this->secuencial_, '$this->lote_', '$this->codigo_', '$this->descripcion_', $this->cantidad_, $this->preciounitario_, $this->descuento_, $this->preciototalsinimpuesto_, '$this->nombredetalleadicional1_', '$this->valoradicional1_', '$this->nombredetalleadicional2_', '$this->valoradicional2_', '$this->nombredetalleadicional3_', '$this->valoradicional3_', '$this->nombredetalleadicional4_', '$this->valoradicional4_', '$this->nombredetalleadicional5_', '$this->valoradicional5_', '$this->nombredetalleadicional6_', '$this->valoradicional6_', '$this->nombredetalleadicional7_', '$this->valoradicional7_', '$this->nombredetalleadicional8_', '$this->valoradicional8_', '$this->nombredetalleadicional9_', '$this->valoradicional9_', '$this->nombredetalleadicional10_', '$this->valoradicional10_', '$this->nombredetalleadicional11_', '$this->valoradicional11_', '$this->nombredetalleadicional12_', '$this->valoradicional12_', '$this->nombredetalleadicional13_', '$this->valoradicional13_', '$this->nombredetalleadicional14_', '$this->valoradicional14_', '$this->nombredetalleadicional15_', '$this->valoradicional15_', $this->codigoimpuesto_, $this->codigoporcentajeimp_, $this->tarifa_, $this->baseimponible_, $this->valor_, $this->codimpice_, $this->codporcenice_, $this->baseice_, $this->porcenice_, $this->valorice_)"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, CODIGO, DESCRIPCION, CANTIDAD, PRECIOUNITARIO, DESCUENTO, PRECIOTOTALSINIMPUESTO, NOMBREDETALLEADICIONAL1, VALORADICIONAL1, NOMBREDETALLEADICIONAL2, VALORADICIONAL2, NOMBREDETALLEADICIONAL3, VALORADICIONAL3, NOMBREDETALLEADICIONAL4, VALORADICIONAL4, NOMBREDETALLEADICIONAL5, VALORADICIONAL5, NOMBREDETALLEADICIONAL6, VALORADICIONAL6, NOMBREDETALLEADICIONAL7, VALORADICIONAL7, NOMBREDETALLEADICIONAL8, VALORADICIONAL8, NOMBREDETALLEADICIONAL9, VALORADICIONAL9, NOMBREDETALLEADICIONAL10, VALORADICIONAL10, NOMBREDETALLEADICIONAL11, VALORADICIONAL11, NOMBREDETALLEADICIONAL12, VALORADICIONAL12, NOMBREDETALLEADICIONAL13, VALORADICIONAL13, NOMBREDETALLEADICIONAL14, VALORADICIONAL14, NOMBREDETALLEADICIONAL15, VALORADICIONAL15, CODIGOIMPUESTO, CODIGOPORCENTAJEIMP, TARIFA, BASEIMPONIBLE, VALOR, CODIMPICE, CODPORCENICE, BASEICE, PORCENICE, VALORICE) VALUES (" . $NM_seq_auto . "'$this->ruc_', $this->coddoc_, $this->estab_, $this->ptoemi_, $this->secuencial_, '$this->lote_', '$this->codigo_', '$this->descripcion_', $this->cantidad_, $this->preciounitario_, $this->descuento_, $this->preciototalsinimpuesto_, '$this->nombredetalleadicional1_', '$this->valoradicional1_', '$this->nombredetalleadicional2_', '$this->valoradicional2_', '$this->nombredetalleadicional3_', '$this->valoradicional3_', '$this->nombredetalleadicional4_', '$this->valoradicional4_', '$this->nombredetalleadicional5_', '$this->valoradicional5_', '$this->nombredetalleadicional6_', '$this->valoradicional6_', '$this->nombredetalleadicional7_', '$this->valoradicional7_', '$this->nombredetalleadicional8_', '$this->valoradicional8_', '$this->nombredetalleadicional9_', '$this->valoradicional9_', '$this->nombredetalleadicional10_', '$this->valoradicional10_', '$this->nombredetalleadicional11_', '$this->valoradicional11_', '$this->nombredetalleadicional12_', '$this->valoradicional12_', '$this->nombredetalleadicional13_', '$this->valoradicional13_', '$this->nombredetalleadicional14_', '$this->valoradicional14_', '$this->nombredetalleadicional15_', '$this->valoradicional15_', $this->codigoimpuesto_, $this->codigoporcentajeimp_, $this->tarifa_, $this->baseimponible_, $this->valor_, $this->codimpice_, $this->codporcenice_, $this->baseice_, $this->porcenice_, $this->valorice_)"; 
              }
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $dbErrorMessage = $this->Db->ErrorMsg();
                      $dbErrorCode = $this->Db->ErrorNo();
                      $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $dbErrorMessage, true);
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
                      { 
                          $this->sc_erro_insert = $dbErrorMessage;
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_DETALLE_ORDEN_TRABAJO_inline_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->ruc_ = $this->ruc__before_qstr;
              $this->lote_ = $this->lote__before_qstr;
              $this->codigo_ = $this->codigo__before_qstr;
              $this->descripcion_ = $this->descripcion__before_qstr;
              $this->nombredetalleadicional1_ = $this->nombredetalleadicional1__before_qstr;
              $this->valoradicional1_ = $this->valoradicional1__before_qstr;
              $this->nombredetalleadicional2_ = $this->nombredetalleadicional2__before_qstr;
              $this->valoradicional2_ = $this->valoradicional2__before_qstr;
              $this->nombredetalleadicional3_ = $this->nombredetalleadicional3__before_qstr;
              $this->valoradicional3_ = $this->valoradicional3__before_qstr;
              $this->nombredetalleadicional4_ = $this->nombredetalleadicional4__before_qstr;
              $this->valoradicional4_ = $this->valoradicional4__before_qstr;
              $this->nombredetalleadicional5_ = $this->nombredetalleadicional5__before_qstr;
              $this->valoradicional5_ = $this->valoradicional5__before_qstr;
              $this->nombredetalleadicional6_ = $this->nombredetalleadicional6__before_qstr;
              $this->valoradicional6_ = $this->valoradicional6__before_qstr;
              $this->nombredetalleadicional7_ = $this->nombredetalleadicional7__before_qstr;
              $this->valoradicional7_ = $this->valoradicional7__before_qstr;
              $this->nombredetalleadicional8_ = $this->nombredetalleadicional8__before_qstr;
              $this->valoradicional8_ = $this->valoradicional8__before_qstr;
              $this->nombredetalleadicional9_ = $this->nombredetalleadicional9__before_qstr;
              $this->valoradicional9_ = $this->valoradicional9__before_qstr;
              $this->nombredetalleadicional10_ = $this->nombredetalleadicional10__before_qstr;
              $this->valoradicional10_ = $this->valoradicional10__before_qstr;
              $this->nombredetalleadicional11_ = $this->nombredetalleadicional11__before_qstr;
              $this->valoradicional11_ = $this->valoradicional11__before_qstr;
              $this->nombredetalleadicional12_ = $this->nombredetalleadicional12__before_qstr;
              $this->valoradicional12_ = $this->valoradicional12__before_qstr;
              $this->nombredetalleadicional13_ = $this->nombredetalleadicional13__before_qstr;
              $this->valoradicional13_ = $this->valoradicional13__before_qstr;
              $this->nombredetalleadicional14_ = $this->nombredetalleadicional14__before_qstr;
              $this->valoradicional14_ = $this->valoradicional14__before_qstr;
              $this->nombredetalleadicional15_ = $this->nombredetalleadicional15__before_qstr;
              $this->valoradicional15_ = $this->valoradicional15__before_qstr;
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->estab_ = substr($this->Db->qstr($this->estab_), 1, -1); 
          $this->ptoemi_ = substr($this->Db->qstr($this->ptoemi_), 1, -1); 
          $this->secuencial_ = substr($this->Db->qstr($this->secuencial_), 1, -1); 
          $this->lote_ = substr($this->Db->qstr($this->lote_), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_' "); 
              }  
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_DETALLE_ORDEN_TRABAJO_inline_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              if (empty($this->sc_erro_delete)) {
                  $this->record_delete_ok = true;
              }
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['total']);
              }

              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['parms'] = "estab_?#?$this->estab_?@?ptoemi_?#?$this->ptoemi_?@?secuencial_?#?$this->secuencial_?@?lote_?#?$this->lote_?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->estab_ = null === $this->estab_ ? null : substr($this->Db->qstr($this->estab_), 1, -1); 
          $this->ptoemi_ = null === $this->ptoemi_ ? null : substr($this->Db->qstr($this->ptoemi_), 1, -1); 
          $this->secuencial_ = null === $this->secuencial_ ? null : substr($this->Db->qstr($this->secuencial_), 1, -1); 
          $this->lote_ = null === $this->lote_ ? null : substr($this->Db->qstr($this->lote_), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_filter'] . ")";
          }
      }
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "inicio")
      { 
          $this->nmgp_opcao = "igual"; 
      } 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, CODIGO, DESCRIPCION, CANTIDAD, PRECIOUNITARIO, DESCUENTO, PRECIOTOTALSINIMPUESTO, NOMBREDETALLEADICIONAL1, VALORADICIONAL1, NOMBREDETALLEADICIONAL2, VALORADICIONAL2, NOMBREDETALLEADICIONAL3, VALORADICIONAL3, NOMBREDETALLEADICIONAL4, VALORADICIONAL4, NOMBREDETALLEADICIONAL5, VALORADICIONAL5, NOMBREDETALLEADICIONAL6, VALORADICIONAL6, NOMBREDETALLEADICIONAL7, VALORADICIONAL7, NOMBREDETALLEADICIONAL8, VALORADICIONAL8, NOMBREDETALLEADICIONAL9, VALORADICIONAL9, NOMBREDETALLEADICIONAL10, VALORADICIONAL10, NOMBREDETALLEADICIONAL11, VALORADICIONAL11, NOMBREDETALLEADICIONAL12, VALORADICIONAL12, NOMBREDETALLEADICIONAL13, VALORADICIONAL13, NOMBREDETALLEADICIONAL14, VALORADICIONAL14, NOMBREDETALLEADICIONAL15, VALORADICIONAL15, CODIGOIMPUESTO, CODIGOPORCENTAJEIMP, TARIFA, BASEIMPONIBLE, VALOR, CODIMPICE, CODPORCENICE, BASEICE, PORCENICE, VALORICE from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, CODIGO, DESCRIPCION, CANTIDAD, PRECIOUNITARIO, DESCUENTO, PRECIOTOTALSINIMPUESTO, NOMBREDETALLEADICIONAL1, VALORADICIONAL1, NOMBREDETALLEADICIONAL2, VALORADICIONAL2, NOMBREDETALLEADICIONAL3, VALORADICIONAL3, NOMBREDETALLEADICIONAL4, VALORADICIONAL4, NOMBREDETALLEADICIONAL5, VALORADICIONAL5, NOMBREDETALLEADICIONAL6, VALORADICIONAL6, NOMBREDETALLEADICIONAL7, VALORADICIONAL7, NOMBREDETALLEADICIONAL8, VALORADICIONAL8, NOMBREDETALLEADICIONAL9, VALORADICIONAL9, NOMBREDETALLEADICIONAL10, VALORADICIONAL10, NOMBREDETALLEADICIONAL11, VALORADICIONAL11, NOMBREDETALLEADICIONAL12, VALORADICIONAL12, NOMBREDETALLEADICIONAL13, VALORADICIONAL13, NOMBREDETALLEADICIONAL14, VALORADICIONAL14, NOMBREDETALLEADICIONAL15, VALORADICIONAL15, CODIGOIMPUESTO, CODIGOPORCENTAJEIMP, TARIFA, BASEIMPONIBLE, VALOR, CODIMPICE, CODPORCENICE, BASEICE, PORCENICE, VALORICE from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, CODIGO, DESCRIPCION, CANTIDAD, PRECIOUNITARIO, DESCUENTO, PRECIOTOTALSINIMPUESTO, NOMBREDETALLEADICIONAL1, VALORADICIONAL1, NOMBREDETALLEADICIONAL2, VALORADICIONAL2, NOMBREDETALLEADICIONAL3, VALORADICIONAL3, NOMBREDETALLEADICIONAL4, VALORADICIONAL4, NOMBREDETALLEADICIONAL5, VALORADICIONAL5, NOMBREDETALLEADICIONAL6, VALORADICIONAL6, NOMBREDETALLEADICIONAL7, VALORADICIONAL7, NOMBREDETALLEADICIONAL8, VALORADICIONAL8, NOMBREDETALLEADICIONAL9, VALORADICIONAL9, NOMBREDETALLEADICIONAL10, VALORADICIONAL10, NOMBREDETALLEADICIONAL11, VALORADICIONAL11, NOMBREDETALLEADICIONAL12, VALORADICIONAL12, NOMBREDETALLEADICIONAL13, VALORADICIONAL13, NOMBREDETALLEADICIONAL14, VALORADICIONAL14, NOMBREDETALLEADICIONAL15, VALORADICIONAL15, CODIGOIMPUESTO, CODIGOPORCENTAJEIMP, TARIFA, BASEIMPONIBLE, VALOR, CODIMPICE, CODPORCENICE, BASEICE, PORCENICE, VALORICE from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, CODIGO, DESCRIPCION, CANTIDAD, PRECIOUNITARIO, DESCUENTO, PRECIOTOTALSINIMPUESTO, NOMBREDETALLEADICIONAL1, VALORADICIONAL1, NOMBREDETALLEADICIONAL2, VALORADICIONAL2, NOMBREDETALLEADICIONAL3, VALORADICIONAL3, NOMBREDETALLEADICIONAL4, VALORADICIONAL4, NOMBREDETALLEADICIONAL5, VALORADICIONAL5, NOMBREDETALLEADICIONAL6, VALORADICIONAL6, NOMBREDETALLEADICIONAL7, VALORADICIONAL7, NOMBREDETALLEADICIONAL8, VALORADICIONAL8, NOMBREDETALLEADICIONAL9, VALORADICIONAL9, NOMBREDETALLEADICIONAL10, VALORADICIONAL10, NOMBREDETALLEADICIONAL11, VALORADICIONAL11, NOMBREDETALLEADICIONAL12, VALORADICIONAL12, NOMBREDETALLEADICIONAL13, VALORADICIONAL13, NOMBREDETALLEADICIONAL14, VALORADICIONAL14, NOMBREDETALLEADICIONAL15, VALORADICIONAL15, CODIGOIMPUESTO, CODIGOPORCENTAJEIMP, TARIFA, BASEIMPONIBLE, VALOR, CODIMPICE, CODPORCENICE, BASEICE, PORCENICE, VALORICE from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, CODIGO, DESCRIPCION, CANTIDAD, PRECIOUNITARIO, DESCUENTO, PRECIOTOTALSINIMPUESTO, NOMBREDETALLEADICIONAL1, VALORADICIONAL1, NOMBREDETALLEADICIONAL2, VALORADICIONAL2, NOMBREDETALLEADICIONAL3, VALORADICIONAL3, NOMBREDETALLEADICIONAL4, VALORADICIONAL4, NOMBREDETALLEADICIONAL5, VALORADICIONAL5, NOMBREDETALLEADICIONAL6, VALORADICIONAL6, NOMBREDETALLEADICIONAL7, VALORADICIONAL7, NOMBREDETALLEADICIONAL8, VALORADICIONAL8, NOMBREDETALLEADICIONAL9, VALORADICIONAL9, NOMBREDETALLEADICIONAL10, VALORADICIONAL10, NOMBREDETALLEADICIONAL11, VALORADICIONAL11, NOMBREDETALLEADICIONAL12, VALORADICIONAL12, NOMBREDETALLEADICIONAL13, VALORADICIONAL13, NOMBREDETALLEADICIONAL14, VALORADICIONAL14, NOMBREDETALLEADICIONAL15, VALORADICIONAL15, CODIGOIMPUESTO, CODIGOPORCENTAJEIMP, TARIFA, BASEIMPONIBLE, VALOR, CODIMPICE, CODPORCENICE, BASEICE, PORCENICE, VALORICE from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_'"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_'"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_'"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_'"; 
              }  
              else  
              {
                  $aWhere[] = "ESTAB = $this->estab_ and PTOEMI = $this->ptoemi_ and SECUENCIAL = $this->secuencial_ and LOTE = '$this->lote_'"; 
              }  
              if (!empty($sc_where_filter))  
              {
                  $teste_select = $nmgp_select . $this->returnWhere($aWhere);
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $teste_select; 
                  $rs = $this->Db->Execute($teste_select); 
                  if ($rs->EOF)
                  {
                     $aWhere = array($sc_where_filter);
                  }  
                  $rs->Close(); 
              }  
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "ESTAB, PTOEMI, SECUENCIAL, LOTE";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['select'] = ""; 
              } 
          } 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = $this->Db->Execute($nmgp_select) ; 
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['empty_filter'] = true;
                  return; 
              }
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
              }
              $this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes['update'] = "off";
              $this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes['delete'] = "off";
              return; 
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->ruc_ = $rs->fields[0] ; 
              $this->nmgp_dados_select['ruc_'] = $this->ruc_;
              $this->coddoc_ = $rs->fields[1] ; 
              $this->nmgp_dados_select['coddoc_'] = $this->coddoc_;
              $this->estab_ = $rs->fields[2] ; 
              $this->nmgp_dados_select['estab_'] = $this->estab_;
              $this->ptoemi_ = $rs->fields[3] ; 
              $this->nmgp_dados_select['ptoemi_'] = $this->ptoemi_;
              $this->secuencial_ = $rs->fields[4] ; 
              $this->nmgp_dados_select['secuencial_'] = $this->secuencial_;
              $this->lote_ = $rs->fields[5] ; 
              $this->nmgp_dados_select['lote_'] = $this->lote_;
              $this->codigo_ = $rs->fields[6] ; 
              $this->nmgp_dados_select['codigo_'] = $this->codigo_;
              $this->descripcion_ = $rs->fields[7] ; 
              $this->nmgp_dados_select['descripcion_'] = $this->descripcion_;
              $this->cantidad_ = trim($rs->fields[8]) ; 
              $this->nmgp_dados_select['cantidad_'] = $this->cantidad_;
              $this->preciounitario_ = trim($rs->fields[9]) ; 
              $this->nmgp_dados_select['preciounitario_'] = $this->preciounitario_;
              $this->descuento_ = trim($rs->fields[10]) ; 
              $this->nmgp_dados_select['descuento_'] = $this->descuento_;
              $this->preciototalsinimpuesto_ = trim($rs->fields[11]) ; 
              $this->nmgp_dados_select['preciototalsinimpuesto_'] = $this->preciototalsinimpuesto_;
              $this->nombredetalleadicional1_ = $rs->fields[12] ; 
              $this->nmgp_dados_select['nombredetalleadicional1_'] = $this->nombredetalleadicional1_;
              $this->valoradicional1_ = $rs->fields[13] ; 
              $this->nmgp_dados_select['valoradicional1_'] = $this->valoradicional1_;
              $this->nombredetalleadicional2_ = $rs->fields[14] ; 
              $this->nmgp_dados_select['nombredetalleadicional2_'] = $this->nombredetalleadicional2_;
              $this->valoradicional2_ = $rs->fields[15] ; 
              $this->nmgp_dados_select['valoradicional2_'] = $this->valoradicional2_;
              $this->nombredetalleadicional3_ = $rs->fields[16] ; 
              $this->nmgp_dados_select['nombredetalleadicional3_'] = $this->nombredetalleadicional3_;
              $this->valoradicional3_ = $rs->fields[17] ; 
              $this->nmgp_dados_select['valoradicional3_'] = $this->valoradicional3_;
              $this->nombredetalleadicional4_ = $rs->fields[18] ; 
              $this->nmgp_dados_select['nombredetalleadicional4_'] = $this->nombredetalleadicional4_;
              $this->valoradicional4_ = $rs->fields[19] ; 
              $this->nmgp_dados_select['valoradicional4_'] = $this->valoradicional4_;
              $this->nombredetalleadicional5_ = $rs->fields[20] ; 
              $this->nmgp_dados_select['nombredetalleadicional5_'] = $this->nombredetalleadicional5_;
              $this->valoradicional5_ = $rs->fields[21] ; 
              $this->nmgp_dados_select['valoradicional5_'] = $this->valoradicional5_;
              $this->nombredetalleadicional6_ = $rs->fields[22] ; 
              $this->nmgp_dados_select['nombredetalleadicional6_'] = $this->nombredetalleadicional6_;
              $this->valoradicional6_ = $rs->fields[23] ; 
              $this->nmgp_dados_select['valoradicional6_'] = $this->valoradicional6_;
              $this->nombredetalleadicional7_ = $rs->fields[24] ; 
              $this->nmgp_dados_select['nombredetalleadicional7_'] = $this->nombredetalleadicional7_;
              $this->valoradicional7_ = $rs->fields[25] ; 
              $this->nmgp_dados_select['valoradicional7_'] = $this->valoradicional7_;
              $this->nombredetalleadicional8_ = $rs->fields[26] ; 
              $this->nmgp_dados_select['nombredetalleadicional8_'] = $this->nombredetalleadicional8_;
              $this->valoradicional8_ = $rs->fields[27] ; 
              $this->nmgp_dados_select['valoradicional8_'] = $this->valoradicional8_;
              $this->nombredetalleadicional9_ = $rs->fields[28] ; 
              $this->nmgp_dados_select['nombredetalleadicional9_'] = $this->nombredetalleadicional9_;
              $this->valoradicional9_ = $rs->fields[29] ; 
              $this->nmgp_dados_select['valoradicional9_'] = $this->valoradicional9_;
              $this->nombredetalleadicional10_ = $rs->fields[30] ; 
              $this->nmgp_dados_select['nombredetalleadicional10_'] = $this->nombredetalleadicional10_;
              $this->valoradicional10_ = $rs->fields[31] ; 
              $this->nmgp_dados_select['valoradicional10_'] = $this->valoradicional10_;
              $this->nombredetalleadicional11_ = $rs->fields[32] ; 
              $this->nmgp_dados_select['nombredetalleadicional11_'] = $this->nombredetalleadicional11_;
              $this->valoradicional11_ = $rs->fields[33] ; 
              $this->nmgp_dados_select['valoradicional11_'] = $this->valoradicional11_;
              $this->nombredetalleadicional12_ = $rs->fields[34] ; 
              $this->nmgp_dados_select['nombredetalleadicional12_'] = $this->nombredetalleadicional12_;
              $this->valoradicional12_ = $rs->fields[35] ; 
              $this->nmgp_dados_select['valoradicional12_'] = $this->valoradicional12_;
              $this->nombredetalleadicional13_ = $rs->fields[36] ; 
              $this->nmgp_dados_select['nombredetalleadicional13_'] = $this->nombredetalleadicional13_;
              $this->valoradicional13_ = $rs->fields[37] ; 
              $this->nmgp_dados_select['valoradicional13_'] = $this->valoradicional13_;
              $this->nombredetalleadicional14_ = $rs->fields[38] ; 
              $this->nmgp_dados_select['nombredetalleadicional14_'] = $this->nombredetalleadicional14_;
              $this->valoradicional14_ = $rs->fields[39] ; 
              $this->nmgp_dados_select['valoradicional14_'] = $this->valoradicional14_;
              $this->nombredetalleadicional15_ = $rs->fields[40] ; 
              $this->nmgp_dados_select['nombredetalleadicional15_'] = $this->nombredetalleadicional15_;
              $this->valoradicional15_ = $rs->fields[41] ; 
              $this->nmgp_dados_select['valoradicional15_'] = $this->valoradicional15_;
              $this->codigoimpuesto_ = $rs->fields[42] ; 
              $this->nmgp_dados_select['codigoimpuesto_'] = $this->codigoimpuesto_;
              $this->codigoporcentajeimp_ = $rs->fields[43] ; 
              $this->nmgp_dados_select['codigoporcentajeimp_'] = $this->codigoporcentajeimp_;
              $this->tarifa_ = trim($rs->fields[44]) ; 
              $this->nmgp_dados_select['tarifa_'] = $this->tarifa_;
              $this->baseimponible_ = trim($rs->fields[45]) ; 
              $this->nmgp_dados_select['baseimponible_'] = $this->baseimponible_;
              $this->valor_ = trim($rs->fields[46]) ; 
              $this->nmgp_dados_select['valor_'] = $this->valor_;
              $this->codimpice_ = $rs->fields[47] ; 
              $this->nmgp_dados_select['codimpice_'] = $this->codimpice_;
              $this->codporcenice_ = $rs->fields[48] ; 
              $this->nmgp_dados_select['codporcenice_'] = $this->codporcenice_;
              $this->baseice_ = trim($rs->fields[49]) ; 
              $this->nmgp_dados_select['baseice_'] = $this->baseice_;
              $this->porcenice_ = trim($rs->fields[50]) ; 
              $this->nmgp_dados_select['porcenice_'] = $this->porcenice_;
              $this->valorice_ = trim($rs->fields[51]) ; 
              $this->nmgp_dados_select['valorice_'] = $this->valorice_;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->coddoc_ = (string)$this->coddoc_; 
              $this->estab_ = (string)$this->estab_; 
              $this->ptoemi_ = (string)$this->ptoemi_; 
              $this->secuencial_ = (string)$this->secuencial_; 
              $this->cantidad_ = (strpos(strtolower($this->cantidad_), "e")) ? (float)$this->cantidad_ : $this->cantidad_; 
              $this->cantidad_ = (string)$this->cantidad_; 
              $this->preciounitario_ = (strpos(strtolower($this->preciounitario_), "e")) ? (float)$this->preciounitario_ : $this->preciounitario_; 
              $this->preciounitario_ = (string)$this->preciounitario_; 
              $this->descuento_ = (strpos(strtolower($this->descuento_), "e")) ? (float)$this->descuento_ : $this->descuento_; 
              $this->descuento_ = (string)$this->descuento_; 
              $this->preciototalsinimpuesto_ = (strpos(strtolower($this->preciototalsinimpuesto_), "e")) ? (float)$this->preciototalsinimpuesto_ : $this->preciototalsinimpuesto_; 
              $this->preciototalsinimpuesto_ = (string)$this->preciototalsinimpuesto_; 
              $this->codigoimpuesto_ = (string)$this->codigoimpuesto_; 
              $this->codigoporcentajeimp_ = (string)$this->codigoporcentajeimp_; 
              $this->tarifa_ = (strpos(strtolower($this->tarifa_), "e")) ? (float)$this->tarifa_ : $this->tarifa_; 
              $this->tarifa_ = (string)$this->tarifa_; 
              $this->baseimponible_ = (strpos(strtolower($this->baseimponible_), "e")) ? (float)$this->baseimponible_ : $this->baseimponible_; 
              $this->baseimponible_ = (string)$this->baseimponible_; 
              $this->valor_ = (strpos(strtolower($this->valor_), "e")) ? (float)$this->valor_ : $this->valor_; 
              $this->valor_ = (string)$this->valor_; 
              $this->codimpice_ = (string)$this->codimpice_; 
              $this->codporcenice_ = (string)$this->codporcenice_; 
              $this->baseice_ = (strpos(strtolower($this->baseice_), "e")) ? (float)$this->baseice_ : $this->baseice_; 
              $this->baseice_ = (string)$this->baseice_; 
              $this->porcenice_ = (strpos(strtolower($this->porcenice_), "e")) ? (float)$this->porcenice_ : $this->porcenice_; 
              $this->porcenice_ = (string)$this->porcenice_; 
              $this->valorice_ = (strpos(strtolower($this->valorice_), "e")) ? (float)$this->valorice_ : $this->valorice_; 
              $this->valorice_ = (string)$this->valorice_; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['parms'] = "estab_?#?$this->estab_?@?ptoemi_?#?$this->ptoemi_?@?secuencial_?#?$this->secuencial_?@?lote_?#?$this->lote_?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->controle_navegacao();
          }
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->ruc_ = "";  
              $this->nmgp_dados_form["ruc_"] = $this->ruc_;
              $this->coddoc_ = "";  
              $this->nmgp_dados_form["coddoc_"] = $this->coddoc_;
              $this->estab_ = "";  
              $this->nmgp_dados_form["estab_"] = $this->estab_;
              $this->ptoemi_ = "";  
              $this->nmgp_dados_form["ptoemi_"] = $this->ptoemi_;
              $this->secuencial_ = "";  
              $this->nmgp_dados_form["secuencial_"] = $this->secuencial_;
              $this->lote_ = "";  
              $this->nmgp_dados_form["lote_"] = $this->lote_;
              $this->codigo_ = "";  
              $this->nmgp_dados_form["codigo_"] = $this->codigo_;
              $this->descripcion_ = "";  
              $this->nmgp_dados_form["descripcion_"] = $this->descripcion_;
              $this->cantidad_ = "";  
              $this->nmgp_dados_form["cantidad_"] = $this->cantidad_;
              $this->preciounitario_ = "";  
              $this->nmgp_dados_form["preciounitario_"] = $this->preciounitario_;
              $this->descuento_ = "";  
              $this->nmgp_dados_form["descuento_"] = $this->descuento_;
              $this->preciototalsinimpuesto_ = "";  
              $this->nmgp_dados_form["preciototalsinimpuesto_"] = $this->preciototalsinimpuesto_;
              $this->nombredetalleadicional1_ = "";  
              $this->nmgp_dados_form["nombredetalleadicional1_"] = $this->nombredetalleadicional1_;
              $this->valoradicional1_ = "";  
              $this->nmgp_dados_form["valoradicional1_"] = $this->valoradicional1_;
              $this->nombredetalleadicional2_ = "";  
              $this->nmgp_dados_form["nombredetalleadicional2_"] = $this->nombredetalleadicional2_;
              $this->valoradicional2_ = "";  
              $this->nmgp_dados_form["valoradicional2_"] = $this->valoradicional2_;
              $this->nombredetalleadicional3_ = "";  
              $this->nmgp_dados_form["nombredetalleadicional3_"] = $this->nombredetalleadicional3_;
              $this->valoradicional3_ = "";  
              $this->nmgp_dados_form["valoradicional3_"] = $this->valoradicional3_;
              $this->nombredetalleadicional4_ = "";  
              $this->nmgp_dados_form["nombredetalleadicional4_"] = $this->nombredetalleadicional4_;
              $this->valoradicional4_ = "";  
              $this->nmgp_dados_form["valoradicional4_"] = $this->valoradicional4_;
              $this->nombredetalleadicional5_ = "";  
              $this->nmgp_dados_form["nombredetalleadicional5_"] = $this->nombredetalleadicional5_;
              $this->valoradicional5_ = "";  
              $this->nmgp_dados_form["valoradicional5_"] = $this->valoradicional5_;
              $this->nombredetalleadicional6_ = "";  
              $this->nmgp_dados_form["nombredetalleadicional6_"] = $this->nombredetalleadicional6_;
              $this->valoradicional6_ = "";  
              $this->nmgp_dados_form["valoradicional6_"] = $this->valoradicional6_;
              $this->nombredetalleadicional7_ = "";  
              $this->nmgp_dados_form["nombredetalleadicional7_"] = $this->nombredetalleadicional7_;
              $this->valoradicional7_ = "";  
              $this->nmgp_dados_form["valoradicional7_"] = $this->valoradicional7_;
              $this->nombredetalleadicional8_ = "";  
              $this->nmgp_dados_form["nombredetalleadicional8_"] = $this->nombredetalleadicional8_;
              $this->valoradicional8_ = "";  
              $this->nmgp_dados_form["valoradicional8_"] = $this->valoradicional8_;
              $this->nombredetalleadicional9_ = "";  
              $this->nmgp_dados_form["nombredetalleadicional9_"] = $this->nombredetalleadicional9_;
              $this->valoradicional9_ = "";  
              $this->nmgp_dados_form["valoradicional9_"] = $this->valoradicional9_;
              $this->nombredetalleadicional10_ = "";  
              $this->nmgp_dados_form["nombredetalleadicional10_"] = $this->nombredetalleadicional10_;
              $this->valoradicional10_ = "";  
              $this->nmgp_dados_form["valoradicional10_"] = $this->valoradicional10_;
              $this->nombredetalleadicional11_ = "";  
              $this->nmgp_dados_form["nombredetalleadicional11_"] = $this->nombredetalleadicional11_;
              $this->valoradicional11_ = "";  
              $this->nmgp_dados_form["valoradicional11_"] = $this->valoradicional11_;
              $this->nombredetalleadicional12_ = "";  
              $this->nmgp_dados_form["nombredetalleadicional12_"] = $this->nombredetalleadicional12_;
              $this->valoradicional12_ = "";  
              $this->nmgp_dados_form["valoradicional12_"] = $this->valoradicional12_;
              $this->nombredetalleadicional13_ = "";  
              $this->nmgp_dados_form["nombredetalleadicional13_"] = $this->nombredetalleadicional13_;
              $this->valoradicional13_ = "";  
              $this->nmgp_dados_form["valoradicional13_"] = $this->valoradicional13_;
              $this->nombredetalleadicional14_ = "";  
              $this->nmgp_dados_form["nombredetalleadicional14_"] = $this->nombredetalleadicional14_;
              $this->valoradicional14_ = "";  
              $this->nmgp_dados_form["valoradicional14_"] = $this->valoradicional14_;
              $this->nombredetalleadicional15_ = "";  
              $this->nmgp_dados_form["nombredetalleadicional15_"] = $this->nombredetalleadicional15_;
              $this->valoradicional15_ = "";  
              $this->nmgp_dados_form["valoradicional15_"] = $this->valoradicional15_;
              $this->codigoimpuesto_ = "";  
              $this->nmgp_dados_form["codigoimpuesto_"] = $this->codigoimpuesto_;
              $this->codigoporcentajeimp_ = "";  
              $this->nmgp_dados_form["codigoporcentajeimp_"] = $this->codigoporcentajeimp_;
              $this->tarifa_ = "";  
              $this->nmgp_dados_form["tarifa_"] = $this->tarifa_;
              $this->baseimponible_ = "";  
              $this->nmgp_dados_form["baseimponible_"] = $this->baseimponible_;
              $this->valor_ = "";  
              $this->nmgp_dados_form["valor_"] = $this->valor_;
              $this->codimpice_ = "";  
              $this->nmgp_dados_form["codimpice_"] = $this->codimpice_;
              $this->codporcenice_ = "";  
              $this->nmgp_dados_form["codporcenice_"] = $this->codporcenice_;
              $this->baseice_ = "";  
              $this->nmgp_dados_form["baseice_"] = $this->baseice_;
              $this->porcenice_ = "";  
              $this->nmgp_dados_form["porcenice_"] = $this->porcenice_;
              $this->valorice_ = "";  
              $this->nmgp_dados_form["valorice_"] = $this->valorice_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
      }
      if (!isset($this->nmgp_refresh_fields)) 
      { 
          $this->nm_proc_onload();
      }
  }
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_DETALLE_ORDEN_TRABAJO_inline_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_DETALLE_ORDEN_TRABAJO_inline_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_format_readonly($field, $value)
    {
        $result = $value;

        $this->form_highlight_search($result, $field, $value);

        return $result;
    }

    function form_highlight_search(&$result, $field, $value)
    {
        if ($this->proc_fast_search) {
            $this->form_highlight_search_quicksearch($result, $field, $value);
        }
    }

    function form_highlight_search_quicksearch(&$result, $field, $value)
    {
        $searchOk = false;
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("ruc_", "coddoc_", "estab_", "ptoemi_", "secuencial_", "lote_", "codigo_", "descripcion_", "cantidad_", "preciounitario_", "descuento_", "preciototalsinimpuesto_", "nombredetalleadicional1_", "valoradicional1_", "nombredetalleadicional2_", "valoradicional2_", "nombredetalleadicional3_", "valoradicional3_", "nombredetalleadicional4_", "valoradicional4_", "nombredetalleadicional5_", "valoradicional5_", "nombredetalleadicional6_", "valoradicional6_", "nombredetalleadicional7_", "valoradicional7_", "nombredetalleadicional8_", "valoradicional8_", "nombredetalleadicional9_", "valoradicional9_", "nombredetalleadicional10_", "valoradicional10_", "nombredetalleadicional11_", "valoradicional11_", "nombredetalleadicional12_", "valoradicional12_", "nombredetalleadicional13_", "valoradicional13_", "nombredetalleadicional14_", "valoradicional14_", "nombredetalleadicional15_", "valoradicional15_", "codigoimpuesto_", "codigoporcentajeimp_", "tarifa_", "baseimponible_", "valor_"))) {
            $searchOk = true;
        }
        elseif ($field == $this->nmgp_fast_search && in_array($field, array(""))) {
            $searchOk = true;
        }

        if (!$searchOk || '' == $this->nmgp_arg_fast_search) {
            return;
        }

        $htmlIni = '<div class="highlight" style="background-color: #fafaca; display: inline-block">';
        $htmlFim = '</div>';

        if ('qp' == $this->nmgp_cond_fast_search) {
            $result = preg_replace('/'. $this->nmgp_arg_fast_search .'/i', $htmlIni . '$0' . $htmlFim, $result);
        } elseif ('eq' == $this->nmgp_cond_fast_search) {
            if (strcasecmp($this->nmgp_arg_fast_search, $value) == 0) {
                $result = $htmlIni. $result .$htmlFim;
            }
        }
    }


    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

        function addUrlParam($url, $param, $value) {
                $urlParts  = explode('?', $url);
                $urlParams = isset($urlParts[1]) ? explode('&', $urlParts[1]) : array();
                $objParams = array();
                foreach ($urlParams as $paramInfo) {
                        $paramParts = explode('=', $paramInfo);
                        $objParams[ $paramParts[0] ] = isset($paramParts[1]) ? $paramParts[1] : '';
                }
                $objParams[$param] = $value;
                $urlParams = array();
                foreach ($objParams as $paramName => $paramValue) {
                        $urlParams[] = $paramName . '=' . $paramValue;
                }
                return $urlParts[0] . '?' . implode('&', $urlParams);
        }
 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

function sc_file_size($file, $format = false)
{
    if ('' == $file) {
        return '';
    }
    if (!@is_file($file)) {
        return '';
    }
    $fileSize = @filesize($file);
    if ($format) {
        $suffix = '';
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' KB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' MB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' GB';
        }
        $fileSize = $fileSize . $suffix;
    }
    return $fileSize;
}


 function new_date_format($type, $field)
 {
     $new_date_format_out = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format_out .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format_out .= $time_sep;
         }
         else
         {
             $new_date_format_out .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format_out;
     if ('DH' == $type)
     {
         $new_date_format_out                                  = explode(';', $new_date_format_out);
         $this->field_config[$field]['date_format_js']        = $new_date_format_out[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format_out[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_DETALLE_ORDEN_TRABAJO_inline_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      foreach ($fields as $field) {
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "RUC", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CODDOC", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ESTAB", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "PTOEMI", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "SECUENCIAL", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "LOTE", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CODIGO", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "DESCRIPCION", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CANTIDAD", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "PRECIOUNITARIO", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "DESCUENTO", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "PRECIOTOTALSINIMPUESTO", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "NOMBREDETALLEADICIONAL1", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL1", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "NOMBREDETALLEADICIONAL2", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL2", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "NOMBREDETALLEADICIONAL3", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL3", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "NOMBREDETALLEADICIONAL4", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL4", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "NOMBREDETALLEADICIONAL5", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL5", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "NOMBREDETALLEADICIONAL6", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL6", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "NOMBREDETALLEADICIONAL7", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL7", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "NOMBREDETALLEADICIONAL8", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL8", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "NOMBREDETALLEADICIONAL9", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL9", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "NOMBREDETALLEADICIONAL10", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL10", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "NOMBREDETALLEADICIONAL11", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL11", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "NOMBREDETALLEADICIONAL12", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL12", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "NOMBREDETALLEADICIONAL13", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL13", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "NOMBREDETALLEADICIONAL14", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL14", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "NOMBREDETALLEADICIONAL15", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL15", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CODIGOIMPUESTO", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CODIGOPORCENTAJEIMP", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "TARIFA", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "BASEIMPONIBLE", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALOR", $arg_search, str_replace(",", ".", $data_search));
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_filter_form'] . " and (" . $comando . ")";
      }
      else
      {
         $sc_where = " where " . $comando;
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_DETALLE_ORDEN_TRABAJO_inline = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['total'] = $qt_geral_reg_form_DETALLE_ORDEN_TRABAJO_inline;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_DETALLE_ORDEN_TRABAJO_inline_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_DETALLE_ORDEN_TRABAJO_inline_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $nm_esp_postgres = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "coddoc";$nm_numeric[] = "estab";$nm_numeric[] = "ptoemi";$nm_numeric[] = "secuencial";$nm_numeric[] = "cantidad";$nm_numeric[] = "preciounitario";$nm_numeric[] = "descuento";$nm_numeric[] = "preciototalsinimpuesto";$nm_numeric[] = "codigoimpuesto";$nm_numeric[] = "codigoporcentajeimp";$nm_numeric[] = "tarifa";$nm_numeric[] = "baseimponible";$nm_numeric[] = "valor";$nm_numeric[] = "codimpice";$nm_numeric[] = "codporcenice";$nm_numeric[] = "baseice";$nm_numeric[] = "porcenice";$nm_numeric[] = "valorice";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS VARCHAR)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_ini_lower . $nm_aspas . $Cmp . $nm_aspas1 . $nm_fim_lower;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         $cond_tst = strtoupper($condicao);
         if ($cond_tst == "II" || $cond_tst == "QP" || $cond_tst == "NP")
         {
             if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && $this->NM_case_insensitive)
             {
                 $op_like      = " ilike ";
                 $nm_ini_lower = "";
                 $nm_fim_lower = "";
             }
             else
             {
                 $op_like = " like ";
             }
         }
         switch ($cond_tst)
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_like . $nm_ini_lower . "'" . $campo . "%'" . $nm_fim_lower;
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_like . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " not" . $op_like . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " > " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " >= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " < " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
         }
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2)
   {
       $nmgp_saida_form = "form_DETALLE_ORDEN_TRABAJO_inline_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_DETALLE_ORDEN_TRABAJO_inline_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $sTarget = '_self';
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = $sTarget;
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       form_DETALLE_ORDEN_TRABAJO_inline_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
    <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['sc_modal'])
   {
?>
        parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
   elseif ($this->lig_edit_lookup)
   {
?>
        opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
?>
      }
      if (bLigEditLookupCall)
      {
        scLigEditLookupCall();
      }
<?php
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO_inline']['masterValue']);
?>
}
<?php
    }
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
}
?>
