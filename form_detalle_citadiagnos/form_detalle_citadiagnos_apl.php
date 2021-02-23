<?php
//
class form_detalle_citadiagnos_apl
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
                                'navPage'           => array(),
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
   var $dcdsecuen_;
   var $citid_;
   var $sercodigo_;
   var $dcdcantidad_;
   var $dcdprecio_;
   var $dcdporcendesc_;
   var $dcdtotal_;
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
   var $sc_teve_incl = false;
   var $sc_teve_excl = false;
   var $sc_teve_alt  = false;
   var $sc_after_all_insert = false;
   var $sc_after_all_update = false;
   var $sc_after_all_delete = false;
   var $sc_max_reg = 10; 
   var $sc_max_reg_incl = 10; 
   var $form_vert_form_detalle_citadiagnos = array();
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
   var $Grid_editavel  = true;
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
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['dcdcantidad_']))
          {
              $this->dcdcantidad_ = $this->NM_ajax_info['param']['dcdcantidad_'];
          }
          if (isset($this->NM_ajax_info['param']['dcdporcendesc_']))
          {
              $this->dcdporcendesc_ = $this->NM_ajax_info['param']['dcdporcendesc_'];
          }
          if (isset($this->NM_ajax_info['param']['dcdprecio_']))
          {
              $this->dcdprecio_ = $this->NM_ajax_info['param']['dcdprecio_'];
          }
          if (isset($this->NM_ajax_info['param']['dcdsecuen_']))
          {
              $this->dcdsecuen_ = $this->NM_ajax_info['param']['dcdsecuen_'];
          }
          if (isset($this->NM_ajax_info['param']['dcdtotal_']))
          {
              $this->dcdtotal_ = $this->NM_ajax_info['param']['dcdtotal_'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_row']))
          {
              $this->nmgp_refresh_row = $this->NM_ajax_info['param']['nmgp_refresh_row'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['sc_clone']))
          {
              $this->sc_clone = $this->NM_ajax_info['param']['sc_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_clone']))
          {
              $this->sc_seq_clone = $this->NM_ajax_info['param']['sc_seq_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_vert']))
          {
              $this->sc_seq_vert = $this->NM_ajax_info['param']['sc_seq_vert'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['sercodigo_']))
          {
              $this->sercodigo_ = $this->NM_ajax_info['param']['sercodigo_'];
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
      $this->sc_conv_var['dcdsecuen'] = "dcdsecuen_";
      $this->sc_conv_var['citid'] = "citid_";
      $this->sc_conv_var['sercodigo'] = "sercodigo_";
      $this->sc_conv_var['dcdcantidad'] = "dcdcantidad_";
      $this->sc_conv_var['dcdprecio'] = "dcdprecio_";
      $this->sc_conv_var['dcdporcendesc'] = "dcdporcendesc_";
      $this->sc_conv_var['dcdtotal'] = "dcdtotal_";
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
      if (isset($this->v_facturado) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['v_facturado'] = $this->v_facturado;
      }
      if (isset($this->v_anulado) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['v_anulado'] = $this->v_anulado;
      }
      if (isset($this->v_numpresup) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['v_numpresup'] = $this->v_numpresup;
      }
      if (isset($_POST["v_facturado"]) && isset($this->v_facturado)) 
      {
          $_SESSION['v_facturado'] = $this->v_facturado;
      }
      if (isset($_POST["v_anulado"]) && isset($this->v_anulado)) 
      {
          $_SESSION['v_anulado'] = $this->v_anulado;
      }
      if (isset($_POST["v_numpresup"]) && isset($this->v_numpresup)) 
      {
          $_SESSION['v_numpresup'] = $this->v_numpresup;
      }
      if (isset($_GET["v_facturado"]) && isset($this->v_facturado)) 
      {
          $_SESSION['v_facturado'] = $this->v_facturado;
      }
      if (isset($_GET["v_anulado"]) && isset($this->v_anulado)) 
      {
          $_SESSION['v_anulado'] = $this->v_anulado;
      }
      if (isset($_GET["v_numpresup"]) && isset($this->v_numpresup)) 
      {
          $_SESSION['v_numpresup'] = $this->v_numpresup;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_detalle_citadiagnos']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_detalle_citadiagnos']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_detalle_citadiagnos']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $this->NM_where_filter = "";
          $tem_where_parms       = false;
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
                 nm_limpa_str_form_detalle_citadiagnos($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 if ($cadapar[0] == "dcdsecuen_")
                 {
                     $this->NM_where_filter .= (empty($this->NM_where_filter)) ? "(" : " and ";
                     $this->NM_where_filter .= "dcdsecuen = " . $this->dcdsecuen_;
                     $this->has_where_params = true;
                     $tem_where_parms        = true;
                 }
                 elseif ($cadapar[0] == "NM_where_filter")
                 {
                     $this->has_where_params = false;
                     $tem_where_parms        = false;
                 }
             }
             $ix++;
          }
          if (isset($this->v_facturado)) 
          {
              $_SESSION['v_facturado'] = $this->v_facturado;
          }
          if (isset($this->v_anulado)) 
          {
              $_SESSION['v_anulado'] = $this->v_anulado;
          }
          if (isset($this->v_numpresup)) 
          {
              $_SESSION['v_numpresup'] = $this->v_numpresup;
          }
          if ($tem_where_parms)
          {
              $this->NM_where_filter .= ")";
          }
          elseif (empty($this->NM_where_filter))
          {
              unset($this->NM_where_filter);
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_detalle_citadiagnos']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_detalle_citadiagnos']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_detalle_citadiagnos']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_detalle_citadiagnos']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->v_facturado)) 
          {
              $_SESSION['v_facturado'] = $this->v_facturado;
          }
          if (isset($this->v_anulado)) 
          {
              $_SESSION['v_anulado'] = $this->v_anulado;
          }
          if (isset($this->v_numpresup)) 
          {
              $_SESSION['v_numpresup'] = $this->v_numpresup;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_detalle_citadiagnos']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_detalle_citadiagnos']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_detalle_citadiagnos']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_detalle_citadiagnos']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_detalle_citadiagnos']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_detalle_citadiagnos']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_detalle_citadiagnos']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_detalle_citadiagnos']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_detalle_citadiagnos']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_detalle_citadiagnos']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_detalle_citadiagnos_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_detalle_citadiagnos']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_detalle_citadiagnos']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_detalle_citadiagnos'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_detalle_citadiagnos']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_detalle_citadiagnos']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_detalle_citadiagnos') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_detalle_citadiagnos']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " detalle_citadiagnos";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_detalle_citadiagnos")
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
      $this->Ini->Img_status_ok       = "" == trim($str_img_status_ok_mult)   ? ""     : $str_img_status_ok_mult;
      $this->Ini->Img_status_err      = "" == trim($str_img_status_err_mult)  ? ""     : $str_img_status_err_mult;
      $this->Ini->Css_status          = "scFormInputErrorMult";
      $this->Ini->Css_status_pwd_box  = "scFormInputErrorMultPwdBox";
      $this->Ini->Css_status_pwd_text = "scFormInputErrorMultPwdText";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);
      $this->Ini->form_table_width     = isset($str_form_table_width) && '' != trim($str_form_table_width) ? $str_form_table_width : '';



      $_SESSION['scriptcase']['error_icon']['form_detalle_citadiagnos']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_detalle_citadiagnos'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      if ('total' == $this->form_paginacao)
      {
          $this->nmgp_botoes['first']   = "off";
          $this->nmgp_botoes['back']    = "off";
          $this->nmgp_botoes['forward'] = "off";
          $this->nmgp_botoes['last']    = "off";
          $this->nmgp_botoes['navpage'] = "off";
          $this->nmgp_botoes['goto']    = "off";
          $this->nmgp_botoes['qtline']  = "off";
          $this->nmgp_botoes['summary'] = "off";
      }
      else
      {
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "off";
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "on";
      $this->nmgp_botoes['qtline'] = "on";
      $this->nmgp_botoes['reload'] = "off";
      }
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detalle_citadiagnos']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_detalle_citadiagnos'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_detalle_citadiagnos'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field . "_"] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field . "_"] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_detalle_citadiagnos", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'form_detalle_citadiagnos_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_detalle_citadiagnos_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_detalle_citadiagnos/form_detalle_citadiagnos_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_detalle_citadiagnos_erro.class.php"); 
      }
      $this->Erro      = new form_detalle_citadiagnos_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['sc_max_reg']) && strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['sc_max_reg']) == "all")
      {
          $this->form_paginacao = "total";
      }
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['opcao']))
         { 
             if ($this->dcdsecuen_ != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- dcdcantidad_
      $this->field_config['dcdcantidad_']               = array();
      $this->field_config['dcdcantidad_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dcdcantidad_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dcdcantidad_']['symbol_dec'] = '';
      $this->field_config['dcdcantidad_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dcdcantidad_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dcdprecio_
      $this->field_config['dcdprecio_']               = array();
      $this->field_config['dcdprecio_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['dcdprecio_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['dcdprecio_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['dcdprecio_']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['dcdprecio_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['dcdprecio_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- dcdporcendesc_
      $this->field_config['dcdporcendesc_']               = array();
      $this->field_config['dcdporcendesc_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dcdporcendesc_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dcdporcendesc_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['dcdporcendesc_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dcdporcendesc_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dcdtotal_
      $this->field_config['dcdtotal_']               = array();
      $this->field_config['dcdtotal_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['dcdtotal_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['dcdtotal_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['dcdtotal_']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['dcdtotal_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['dcdtotal_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- dcdsecuen_
      $this->field_config['dcdsecuen_']               = array();
      $this->field_config['dcdsecuen_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dcdsecuen_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dcdsecuen_']['symbol_dec'] = '';
      $this->field_config['dcdsecuen_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dcdsecuen_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- citid_
      $this->field_config['citid_']               = array();
      $this->field_config['citid_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['citid_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['citid_']['symbol_dec'] = '';
      $this->field_config['citid_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['citid_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ($this->nmgp_opcao == "change_qtd_line")
      {
          $this->NM_btn_navega = "N";
          if (strtolower($this->nmgp_max_line) == "all")
          {
              $this->nmgp_opcao = "inicio";
              $this->form_paginacao = "total";
          }
          else
          {
              $this->nmgp_opcao = "igual";
              $this->form_paginacao = "parcial";
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['sc_max_reg'] = $this->nmgp_max_line;
      }
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

      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['opc_edit'] = true;  
      $sc_contr_vert = $GLOBALS["sc_contr_vert"];
      $sc_seq_vert   = 1; 
      $sc_opc_salva  = $this->nmgp_opcao; 
      $sc_todas_Crit = "";
      $sc_check_excl = array(); 
      $sc_check_incl = array(); 
      if (is_array($GLOBALS["sc_check_vert"])) 
      { 
          if ($this->nmgp_opcao == "incluir" || ($this->nmgp_opcao == "recarga" && $this->nmgp_opc_ant == "novo"))
          {
              $sc_check_incl = $GLOBALS["sc_check_vert"]; 
          }
          elseif ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir" || $this->nmgp_opcao == "recarga")
          {
              $sc_check_excl = $GLOBALS["sc_check_vert"]; 
          }
      } 
      elseif ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $sc_check_incl = array($_POST['upload_file_row']);
      }
      if (empty($this->nmgp_opcao)) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "novo";
         $this->nm_select_banco();
         $this->nm_gera_html();
         $this->NM_ajax_info['newline'] = NM_utf8_urldecode($this->New_Line);
         $this->NM_close_db();
         form_detalle_citadiagnos_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'backup_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "igual";
         $this->nm_tira_formatacao();
         $this->nm_select_banco();
         $this->ajax_return_values();
         $this->NM_close_db();
         form_detalle_citadiagnos_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'submit_form' == $this->NM_ajax_opcao)
      {
         if (isset($this->dcdsecuen_)) { $this->nm_limpa_alfa($this->dcdsecuen_); }
         if (isset($this->sercodigo_)) { $this->nm_limpa_alfa($this->sercodigo_); }
         if (isset($this->dcdcantidad_)) { $this->nm_limpa_alfa($this->dcdcantidad_); }
         if (isset($this->dcdprecio_)) { $this->nm_limpa_alfa($this->dcdprecio_); }
         if (isset($this->dcdporcendesc_)) { $this->nm_limpa_alfa($this->dcdporcendesc_); }
         if (isset($this->dcdtotal_)) { $this->nm_limpa_alfa($this->dcdtotal_); }
         if (isset($this->Sc_num_lin_alt) && $this->Sc_num_lin_alt > 0) 
         {
             $sc_seq_vert = $this->Sc_num_lin_alt;
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dados_form'][$sc_seq_vert];
             $this->citid_ = $this->nmgp_dados_form['citid_']; 
         }
         $this->controle_form_vert();
         if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
         {
             $this->NM_rollback_db();
              if ($this->NM_ajax_flag)
              {
                  if (!isset($this->NM_ajax_info['errList']['geral_form_detalle_citadiagnos']) || !is_array($this->NM_ajax_info['errList']['geral_form_detalle_citadiagnos']))
                  {
                      $this->NM_ajax_info['errList']['geral_form_detalle_citadiagnos'] = array();
                  }
                  if ($Campos_Crit != "")
                  {
                      $this->NM_ajax_info['errList']['geral_form_detalle_citadiagnos'][] = $Campos_Crit;
                  }
                  if (!empty($Campos_Falta))
                  {
                      $this->NM_ajax_info['errList']['geral_form_detalle_citadiagnos'][] = $this->Formata_Campos_Falta($Campos_Falta);
                  }
                  if ($this->Campos_Mens_erro != "")
                  {
                      $this->NM_ajax_info['errList']['geral_form_detalle_citadiagnos'][] = $this->Campos_Mens_erro;
                  }
                  $this->NM_gera_nav_page(); 
                  $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
              }
         }
         else
         {
             $this->NM_commit_db();
         }
         if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
         }
         $this->NM_close_db();
		if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'] && 'ERROR' != $this->NM_ajax_info['result']) {
			$this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
		}
		if ('incluir' == $this->NM_ajax_info['param']['nmgp_opcao'] && 'ERROR' != $this->NM_ajax_info['result']) {
			$this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmi']);
		}
		if ('excluir' == $this->NM_ajax_info['param']['nmgp_opcao'] && 'ERROR' != $this->NM_ajax_info['result']) {
			$this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmd']);
		}
         form_detalle_citadiagnos_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
          if ('validate_sercodigo_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sercodigo_');
          }
          if ('validate_dcdcantidad_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dcdcantidad_');
          }
          if ('validate_dcdprecio_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dcdprecio_');
          }
          if ('validate_dcdporcendesc_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dcdporcendesc_');
          }
          if ('validate_dcdtotal_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dcdtotal_');
          }
          if ('validate_dcdsecuen_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dcdsecuen_');
          }
          form_detalle_citadiagnos_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('autocomp_sercodigo_' == substr($this->NM_ajax_opcao, 0, strlen('autocomp_sercodigo_')))
          {
              if (isset($_GET['term'])) {
                  $this->sercodigo_ = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
              } else {
                  $this->sercodigo_ = '';
              }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['Lookup_sercodigo_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['Lookup_sercodigo_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['Lookup_sercodigo_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['Lookup_sercodigo_'] = array(); 
    }

   $old_value_dcdcantidad_ = $this->dcdcantidad_;
   $old_value_dcdprecio_ = $this->dcdprecio_;
   $old_value_dcdporcendesc_ = $this->dcdporcendesc_;
   $old_value_dcdtotal_ = $this->dcdtotal_;
   $old_value_dcdsecuen_ = $this->dcdsecuen_;
   $this->nm_tira_formatacao();


   $unformatted_value_dcdcantidad_ = $this->dcdcantidad_;
   $unformatted_value_dcdprecio_ = $this->dcdprecio_;
   $unformatted_value_dcdporcendesc_ = $this->dcdporcendesc_;
   $unformatted_value_dcdtotal_ = $this->dcdtotal_;
   $unformatted_value_dcdsecuen_ = $this->dcdsecuen_;

   $nm_comando = "SELECT S.sercodigo, concat(E.espnombre,' - ',S.sernombre,' - $ ',S.serprecio) FROM servicio S, especialidad E WHERE (S.espcodigo=E.espcodigo) AND concat(E.espnombre,' - ',S.sernombre,' - $ ',S.serprecio) LIKE '%" . substr($this->Db->qstr($this->sercodigo_), 1, -1) . "%' ORDER BY E.espnombre, S.sernombre";

   $this->dcdcantidad_ = $old_value_dcdcantidad_;
   $this->dcdprecio_ = $old_value_dcdprecio_;
   $this->dcdporcendesc_ = $old_value_dcdporcendesc_;
   $this->dcdtotal_ = $old_value_dcdtotal_;
   $this->dcdsecuen_ = $old_value_dcdsecuen_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_detalle_citadiagnos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_detalle_citadiagnos_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['Lookup_sercodigo_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $AjaxLim = 0;
              $aResponse = array();
              foreach ($aLookup as $sLkpIndex => $aLkpList)
              {
                  $AjaxLim++;
                  if ($AjaxLim > 10)
                  {
                      break;
                  }
                  foreach ($aLkpList as $sLkpIndex => $sLkpValue)
                  {
                      $sLkpIndex = str_replace(array("\r", "\n"), array('', '<br />'), $sLkpIndex);
                      $sLkpValue = str_replace(array("\r", "\n"), array('', '<br />'), $sLkpValue);
                      $aResponse[] = array('label' => $sLkpValue, 'value' => $sLkpIndex);
                  }
              }
              $oJson = new Services_JSON();
              echo $oJson->encode($aResponse);
              exit;
          }
          form_detalle_citadiagnos_pack_ajax_response();
          exit;
      }
      while ($sc_contr_vert > $sc_seq_vert) 
      { 
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
         $this->sercodigo_ = $GLOBALS["sercodigo_" . $sc_seq_vert]; 
         $this->dcdcantidad_ = $GLOBALS["dcdcantidad_" . $sc_seq_vert]; 
         $this->dcdprecio_ = $GLOBALS["dcdprecio_" . $sc_seq_vert]; 
         $this->dcdporcendesc_ = $GLOBALS["dcdporcendesc_" . $sc_seq_vert]; 
         $this->dcdtotal_ = $GLOBALS["dcdtotal_" . $sc_seq_vert]; 
         $this->dcdsecuen_ = $GLOBALS["dcdsecuen_" . $sc_seq_vert]; 
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dados_form'][$sc_seq_vert];
             $this->citid_ = $this->nmgp_dados_form['citid_']; 
         }
         if (isset($this->dcdsecuen_)) { $this->nm_limpa_alfa($this->dcdsecuen_); }
         if (isset($this->sercodigo_)) { $this->nm_limpa_alfa($this->sercodigo_); }
         if (isset($this->dcdcantidad_)) { $this->nm_limpa_alfa($this->dcdcantidad_); }
         if (isset($this->dcdprecio_)) { $this->nm_limpa_alfa($this->dcdprecio_); }
         if (isset($this->dcdporcendesc_)) { $this->nm_limpa_alfa($this->dcdporcendesc_); }
         if (isset($this->dcdtotal_)) { $this->nm_limpa_alfa($this->dcdtotal_); }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dados_form'])) 
         {
            $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dados_form'][$sc_seq_vert];
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dados_select'])) 
         {
            $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dados_select'][$sc_seq_vert];
         }
         if ($this->nmgp_opcao != "recarga" && in_array($sc_seq_vert, $sc_check_excl))
         {
             $this->nmgp_opcao = "excluir";
         }
         if ($this->nmgp_opcao == "incluir" && !in_array($sc_seq_vert, $sc_check_incl))
         { }
         else
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['sc_disabled'] = array();
             $this->controle_form_vert(); 
             $this->nmgp_opcao = $sc_opc_salva; 
             if ($this->nmgp_opcao != "recarga"  && $this->nmgp_opcao != "muda_form" && ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != ""))
             {
                 $sc_todas_Crit .= (!empty($sc_todas_Crit)) ? "<br>" : ""; 
                 $sc_todas_Crit .= "<B>" . $this->Ini->Nm_lang['lang_errm_line'] . $sc_seq_vert . "</B>: "; 
                 $sc_todas_Crit .= $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
                 $this->Campos_Mens_erro = ""; 
             }
             if ($this->nmgp_opcao != "recarga") 
             {
                $this->nm_guardar_campos();
                $this->nm_formatar_campos();
             }
             $this->form_vert_form_detalle_citadiagnos[$sc_seq_vert]['sercodigo_'] =  $this->sercodigo_; 
             $this->form_vert_form_detalle_citadiagnos[$sc_seq_vert]['dcdcantidad_'] =  $this->dcdcantidad_; 
             $this->form_vert_form_detalle_citadiagnos[$sc_seq_vert]['dcdprecio_'] =  $this->dcdprecio_; 
             $this->form_vert_form_detalle_citadiagnos[$sc_seq_vert]['dcdporcendesc_'] =  $this->dcdporcendesc_; 
             $this->form_vert_form_detalle_citadiagnos[$sc_seq_vert]['dcdtotal_'] =  $this->dcdtotal_; 
             $this->form_vert_form_detalle_citadiagnos[$sc_seq_vert]['dcdsecuen_'] =  $this->dcdsecuen_; 
             $this->form_vert_form_detalle_citadiagnos[$sc_seq_vert]['citid_'] =  $this->citid_; 
         }
         $sc_seq_vert++; 
      } 
      if (!empty($sc_todas_Crit)) 
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sc_todas_Crit); 
          if ($this->nmgp_opcao == "incluir")
          { 
              $this->nmgp_opcao = "novo"; 
          }
      } 
      elseif ($this->nmgp_opcao == "incluir")
      { 
          $this->nmgp_opcao = "novo"; 
      }
      if ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $this->nmgp_opcao = 'igual';
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && (!$this->NM_ajax_flag || 'event_' != substr($this->NM_ajax_opcao, 0, 6))) 
      { 
          if ($this->sc_teve_incl) 
          { 
              $this->sc_after_all_insert = true;
          }
          if ($this->sc_teve_alt) 
          { 
              $this->sc_after_all_update = true;
          }
          if ($this->sc_teve_excl) 
          { 
              $this->sc_after_all_delete = true;
          }
          if (empty($sc_todas_Crit)) 
          { 
              $this->NM_commit_db(); 
              $this->nm_select_banco();
              $sc_check_excl = array(); 
          } 
          else
          { 
              $this->NM_rollback_db(); 
          } 
      } 
      if ($this->nmgp_opcao == "recarga") 
      { 
          $this->NM_gera_nav_page(); 
      } 
      if ($this->NM_ajax_flag && ('navigate_form' == $this->NM_ajax_opcao || !empty($this->nmgp_refresh_fields)))
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          $this->NM_close_db();
          form_detalle_citadiagnos_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
      {
          $this->nm_gera_html();
          $this->NM_ajax_info['tableRefresh'] = NM_charset_to_utf8($this->Table_refresh . $this->New_Line) . '</table>';
          $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
          $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_form_detalle_citadiagnos);
          $this->NM_ajax_info['fldList']['dcdsecuen_']['keyVal'] = sc_htmlentities($this->nmgp_dados_form['dcdsecuen_']);
          $this->NM_close_db();
          form_detalle_citadiagnos_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          if ('event_dcdcantidad__onchange' == $this->NM_ajax_opcao)
          {
              $this->dcdcantidad__onChange();
          }
          if ('event_dcdporcendesc__onchange' == $this->NM_ajax_opcao)
          {
              $this->dcdporcendesc__onChange();
          }
          if ('event_dcdtotal__onchange' == $this->NM_ajax_opcao)
          {
              $this->dcdtotal__onChange();
          }
          if ('event_sercodigo__onchange' == $this->NM_ajax_opcao)
          {
              $this->sercodigo__onChange();
          }
          $this->NM_close_db();
          form_detalle_citadiagnos_pack_ajax_response();
          exit;
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      $this->nm_todas_criticas = $sc_todas_Crit;
      $this->nm_gera_html();
      $this->NM_close_db(); 
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
   function controle_form_vert()
   {
     global $nm_opc_lookup,$Campos_Crit, $Campos_Falta, $Campos_Erros, 
            $glo_senha_protect, $nm_apl_dependente, $nm_form_submit;

//
//-----> 
//
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['inline_form_seq'] = $this->sc_seq_row;
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
              form_detalle_citadiagnos_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          return; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_detalle_citadiagnos']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
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
   }
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_detalle_citadiagnos.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " detalle_citadiagnos") ?></TITLE>
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
<form name="Fdown" method="get" action="form_detalle_citadiagnos_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_detalle_citadiagnos"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="./" target="_self" style="display: none"> 
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
           case 'sercodigo_':
               return "SERVICIO";
               break;
           case 'dcdcantidad_':
               return "CANTIDAD";
               break;
           case 'dcdprecio_':
               return "PRECIO";
               break;
           case 'dcdporcendesc_':
               return "DESCUENTO (%)";
               break;
           case 'dcdtotal_':
               return "SUBTOTAL";
               break;
           case 'dcdsecuen_':
               return "Dcdsecuen";
               break;
           case 'citid_':
               return "Citid";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_detalle_citadiagnos']) || !is_array($this->NM_ajax_info['errList']['geral_form_detalle_citadiagnos']))
              {
                  $this->NM_ajax_info['errList']['geral_form_detalle_citadiagnos'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_detalle_citadiagnos'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'sercodigo_' == $filtro)
        $this->ValidateField_sercodigo_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'dcdcantidad_' == $filtro)
        $this->ValidateField_dcdcantidad_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'dcdprecio_' == $filtro)
        $this->ValidateField_dcdprecio_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'dcdporcendesc_' == $filtro)
        $this->ValidateField_dcdporcendesc_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'dcdtotal_' == $filtro)
        $this->ValidateField_dcdtotal_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'dcdsecuen_' == $filtro)
        $this->ValidateField_dcdsecuen_($Campos_Crit, $Campos_Falta, $Campos_Erros);

      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['form_detalle_citadiagnos']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_dcdcantidad_ = $this->dcdcantidad_;
    $original_dcdprecio_ = $this->dcdprecio_;
    $original_dcdtotal_ = $this->dcdtotal_;
}
if (!isset($this->sc_temp_v_numpresup)) {$this->sc_temp_v_numpresup = (isset($_SESSION['v_numpresup'])) ? $_SESSION['v_numpresup'] : "";}
  $num_presup=$this->sc_temp_v_numpresup;



$subtotal=$this->dcdcantidad_ *$this->dcdprecio_ ;

$error_test    = $this->compareFloatNumbers($subtotal,$this->dcdtotal_ , '<');    
$error_message = 'El subtotal debe ser menor al valor ingresado.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_detalle_citadiagnos' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}
if (isset($this->sc_temp_v_numpresup)) { $_SESSION['v_numpresup'] = $this->sc_temp_v_numpresup;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_dcdcantidad_ != $this->dcdcantidad_ || (isset($bFlagRead_dcdcantidad_) && $bFlagRead_dcdcantidad_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['dcdcantidad_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['dcdcantidad_' . $this->nmgp_refresh_row]['valList'] = array($this->dcdcantidad_);
        $this->NM_ajax_changed['dcdcantidad_'] = true;
    }
    if (($original_dcdprecio_ != $this->dcdprecio_ || (isset($bFlagRead_dcdprecio_) && $bFlagRead_dcdprecio_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['dcdprecio_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['dcdprecio_' . $this->nmgp_refresh_row]['valList'] = array($this->dcdprecio_);
        $this->NM_ajax_changed['dcdprecio_'] = true;
    }
    if (($original_dcdtotal_ != $this->dcdtotal_ || (isset($bFlagRead_dcdtotal_) && $bFlagRead_dcdtotal_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['dcdtotal_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['dcdtotal_' . $this->nmgp_refresh_row]['valList'] = array($this->dcdtotal_);
        $this->NM_ajax_changed['dcdtotal_'] = true;
    }
}
$_SESSION['scriptcase']['form_detalle_citadiagnos']['contr_erro'] = 'off'; 
      }
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

    function ValidateField_sercodigo_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['php_cmp_required']['sercodigo_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['php_cmp_required']['sercodigo_'] == "on")) 
      { 
          if ($this->sercodigo_ == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "SERVICIO" ; 
              if (!isset($Campos_Erros['sercodigo_']))
              {
                  $Campos_Erros['sercodigo_'] = array();
              }
              $Campos_Erros['sercodigo_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['sercodigo_']) || !is_array($this->NM_ajax_info['errList']['sercodigo_']))
                  {
                      $this->NM_ajax_info['errList']['sercodigo_'] = array();
                  }
                  $this->NM_ajax_info['errList']['sercodigo_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->sercodigo_) > 11) 
          { 
              $hasError = true;
              $Campos_Crit .= "SERVICIO " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['sercodigo_']))
              {
                  $Campos_Erros['sercodigo_'] = array();
              }
              $Campos_Erros['sercodigo_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['sercodigo_']) || !is_array($this->NM_ajax_info['errList']['sercodigo_']))
              {
                  $this->NM_ajax_info['errList']['sercodigo_'] = array();
              }
              $this->NM_ajax_info['errList']['sercodigo_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sercodigo_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_sercodigo_

    function ValidateField_dcdcantidad_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_numero($this->dcdcantidad_, $this->field_config['dcdcantidad_']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->dcdcantidad_ != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->dcdcantidad_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "CANTIDAD: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['dcdcantidad_']))
                  {
                      $Campos_Erros['dcdcantidad_'] = array();
                  }
                  $Campos_Erros['dcdcantidad_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['dcdcantidad_']) || !is_array($this->NM_ajax_info['errList']['dcdcantidad_']))
                  {
                      $this->NM_ajax_info['errList']['dcdcantidad_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dcdcantidad_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->dcdcantidad_, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "CANTIDAD; " ; 
                  if (!isset($Campos_Erros['dcdcantidad_']))
                  {
                      $Campos_Erros['dcdcantidad_'] = array();
                  }
                  $Campos_Erros['dcdcantidad_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dcdcantidad_']) || !is_array($this->NM_ajax_info['errList']['dcdcantidad_']))
                  {
                      $this->NM_ajax_info['errList']['dcdcantidad_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dcdcantidad_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['php_cmp_required']['dcdcantidad_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['php_cmp_required']['dcdcantidad_'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "CANTIDAD" ; 
              if (!isset($Campos_Erros['dcdcantidad_']))
              {
                  $Campos_Erros['dcdcantidad_'] = array();
              }
              $Campos_Erros['dcdcantidad_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['dcdcantidad_']) || !is_array($this->NM_ajax_info['errList']['dcdcantidad_']))
                  {
                      $this->NM_ajax_info['errList']['dcdcantidad_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dcdcantidad_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'dcdcantidad_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_dcdcantidad_

    function ValidateField_dcdprecio_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['dcdprecio_']['symbol_dec']))
      {
          $this->sc_remove_currency($this->dcdprecio_, $this->field_config['dcdprecio_']['symbol_dec'], $this->field_config['dcdprecio_']['symbol_grp'], $this->field_config['dcdprecio_']['symbol_mon']); 
          nm_limpa_valor($this->dcdprecio_, $this->field_config['dcdprecio_']['symbol_dec'], $this->field_config['dcdprecio_']['symbol_grp']) ; 
          if ('.' == substr($this->dcdprecio_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->dcdprecio_, 1)))
              {
                  $this->dcdprecio_ = '';
              }
              else
              {
                  $this->dcdprecio_ = '0' . $this->dcdprecio_;
              }
          }
      }
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->dcdprecio_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->dcdprecio_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "PRECIO: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['dcdprecio_']))
                  {
                      $Campos_Erros['dcdprecio_'] = array();
                  }
                  $Campos_Erros['dcdprecio_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['dcdprecio_']) || !is_array($this->NM_ajax_info['errList']['dcdprecio_']))
                  {
                      $this->NM_ajax_info['errList']['dcdprecio_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dcdprecio_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->dcdprecio_, 10, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "PRECIO; " ; 
                  if (!isset($Campos_Erros['dcdprecio_']))
                  {
                      $Campos_Erros['dcdprecio_'] = array();
                  }
                  $Campos_Erros['dcdprecio_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dcdprecio_']) || !is_array($this->NM_ajax_info['errList']['dcdprecio_']))
                  {
                      $this->NM_ajax_info['errList']['dcdprecio_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dcdprecio_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['php_cmp_required']['dcdprecio_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['php_cmp_required']['dcdprecio_'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "PRECIO" ; 
              if (!isset($Campos_Erros['dcdprecio_']))
              {
                  $Campos_Erros['dcdprecio_'] = array();
              }
              $Campos_Erros['dcdprecio_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['dcdprecio_']) || !is_array($this->NM_ajax_info['errList']['dcdprecio_']))
                  {
                      $this->NM_ajax_info['errList']['dcdprecio_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dcdprecio_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'dcdprecio_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_dcdprecio_

    function ValidateField_dcdporcendesc_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->dcdporcendesc_ === "" || is_null($this->dcdporcendesc_))  
      { 
          $this->dcdporcendesc_ = 0;
          $this->sc_force_zero[] = 'dcdporcendesc_';
      } 
      if (!empty($this->field_config['dcdporcendesc_']['symbol_dec']))
      {
          nm_limpa_valor($this->dcdporcendesc_, $this->field_config['dcdporcendesc_']['symbol_dec'], $this->field_config['dcdporcendesc_']['symbol_grp']) ; 
          if ('.' == substr($this->dcdporcendesc_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->dcdporcendesc_, 1)))
              {
                  $this->dcdporcendesc_ = '';
              }
              else
              {
                  $this->dcdporcendesc_ = '0' . $this->dcdporcendesc_;
              }
          }
      }
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->dcdporcendesc_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->dcdporcendesc_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "DESCUENTO (%): " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['dcdporcendesc_']))
                  {
                      $Campos_Erros['dcdporcendesc_'] = array();
                  }
                  $Campos_Erros['dcdporcendesc_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['dcdporcendesc_']) || !is_array($this->NM_ajax_info['errList']['dcdporcendesc_']))
                  {
                      $this->NM_ajax_info['errList']['dcdporcendesc_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dcdporcendesc_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->dcdporcendesc_, 10, 2, 0, 100, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "DESCUENTO (%); " ; 
                  if (!isset($Campos_Erros['dcdporcendesc_']))
                  {
                      $Campos_Erros['dcdporcendesc_'] = array();
                  }
                  $Campos_Erros['dcdporcendesc_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dcdporcendesc_']) || !is_array($this->NM_ajax_info['errList']['dcdporcendesc_']))
                  {
                      $this->NM_ajax_info['errList']['dcdporcendesc_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dcdporcendesc_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'dcdporcendesc_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_dcdporcendesc_

    function ValidateField_dcdtotal_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->dcdtotal_ === "" || is_null($this->dcdtotal_))  
      { 
          $this->dcdtotal_ = 0;
          $this->sc_force_zero[] = 'dcdtotal_';
      } 
      if (!empty($this->field_config['dcdtotal_']['symbol_dec']))
      {
          $this->sc_remove_currency($this->dcdtotal_, $this->field_config['dcdtotal_']['symbol_dec'], $this->field_config['dcdtotal_']['symbol_grp'], $this->field_config['dcdtotal_']['symbol_mon']); 
          nm_limpa_valor($this->dcdtotal_, $this->field_config['dcdtotal_']['symbol_dec'], $this->field_config['dcdtotal_']['symbol_grp']) ; 
          if ('.' == substr($this->dcdtotal_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->dcdtotal_, 1)))
              {
                  $this->dcdtotal_ = '';
              }
              else
              {
                  $this->dcdtotal_ = '0' . $this->dcdtotal_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->dcdtotal_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->dcdtotal_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "SUBTOTAL: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['dcdtotal_']))
                  {
                      $Campos_Erros['dcdtotal_'] = array();
                  }
                  $Campos_Erros['dcdtotal_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['dcdtotal_']) || !is_array($this->NM_ajax_info['errList']['dcdtotal_']))
                  {
                      $this->NM_ajax_info['errList']['dcdtotal_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dcdtotal_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->dcdtotal_, 10, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "SUBTOTAL; " ; 
                  if (!isset($Campos_Erros['dcdtotal_']))
                  {
                      $Campos_Erros['dcdtotal_'] = array();
                  }
                  $Campos_Erros['dcdtotal_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dcdtotal_']) || !is_array($this->NM_ajax_info['errList']['dcdtotal_']))
                  {
                      $this->NM_ajax_info['errList']['dcdtotal_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dcdtotal_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'dcdtotal_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_dcdtotal_

    function ValidateField_dcdsecuen_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->dcdsecuen_ === "" || is_null($this->dcdsecuen_))  
      { 
          $this->dcdsecuen_ = 0;
      } 
      nm_limpa_numero($this->dcdsecuen_, $this->field_config['dcdsecuen_']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->dcdsecuen_ != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->dcdsecuen_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Dcdsecuen: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['dcdsecuen_']))
                  {
                      $Campos_Erros['dcdsecuen_'] = array();
                  }
                  $Campos_Erros['dcdsecuen_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['dcdsecuen_']) || !is_array($this->NM_ajax_info['errList']['dcdsecuen_']))
                  {
                      $this->NM_ajax_info['errList']['dcdsecuen_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dcdsecuen_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->dcdsecuen_, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Dcdsecuen; " ; 
                  if (!isset($Campos_Erros['dcdsecuen_']))
                  {
                      $Campos_Erros['dcdsecuen_'] = array();
                  }
                  $Campos_Erros['dcdsecuen_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dcdsecuen_']) || !is_array($this->NM_ajax_info['errList']['dcdsecuen_']))
                  {
                      $this->NM_ajax_info['errList']['dcdsecuen_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dcdsecuen_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'dcdsecuen_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_dcdsecuen_

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
    $this->nmgp_dados_form['sercodigo_'] = $this->sercodigo_;
    $this->nmgp_dados_form['dcdcantidad_'] = $this->dcdcantidad_;
    $this->nmgp_dados_form['dcdprecio_'] = $this->dcdprecio_;
    $this->nmgp_dados_form['dcdporcendesc_'] = $this->dcdporcendesc_;
    $this->nmgp_dados_form['dcdtotal_'] = $this->dcdtotal_;
    $this->nmgp_dados_form['dcdsecuen_'] = $this->dcdsecuen_;
    $this->nmgp_dados_form['citid_'] = $this->citid_;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dados_form'][$sc_seq_vert] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['dcdcantidad_'] = $this->dcdcantidad_;
      nm_limpa_numero($this->dcdcantidad_, $this->field_config['dcdcantidad_']['symbol_grp']) ; 
      $this->Before_unformat['dcdprecio_'] = $this->dcdprecio_;
      if (!empty($this->field_config['dcdprecio_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->dcdprecio_, $this->field_config['dcdprecio_']['symbol_dec'], $this->field_config['dcdprecio_']['symbol_grp'], $this->field_config['dcdprecio_']['symbol_mon']);
         nm_limpa_valor($this->dcdprecio_, $this->field_config['dcdprecio_']['symbol_dec'], $this->field_config['dcdprecio_']['symbol_grp']);
      }
      $this->Before_unformat['dcdporcendesc_'] = $this->dcdporcendesc_;
      if (!empty($this->field_config['dcdporcendesc_']['symbol_dec']))
      {
         nm_limpa_valor($this->dcdporcendesc_, $this->field_config['dcdporcendesc_']['symbol_dec'], $this->field_config['dcdporcendesc_']['symbol_grp']);
      }
      $this->Before_unformat['dcdtotal_'] = $this->dcdtotal_;
      if (!empty($this->field_config['dcdtotal_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->dcdtotal_, $this->field_config['dcdtotal_']['symbol_dec'], $this->field_config['dcdtotal_']['symbol_grp'], $this->field_config['dcdtotal_']['symbol_mon']);
         nm_limpa_valor($this->dcdtotal_, $this->field_config['dcdtotal_']['symbol_dec'], $this->field_config['dcdtotal_']['symbol_grp']);
      }
      $this->Before_unformat['dcdsecuen_'] = $this->dcdsecuen_;
      nm_limpa_numero($this->dcdsecuen_, $this->field_config['dcdsecuen_']['symbol_grp']) ; 
      $this->Before_unformat['citid_'] = $this->citid_;
      nm_limpa_numero($this->citid_, $this->field_config['citid_']['symbol_grp']) ; 
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
      if ($Nome_Campo == "dcdcantidad_")
      {
          nm_limpa_numero($this->dcdcantidad_, $this->field_config['dcdcantidad_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dcdprecio_")
      {
          if (!empty($this->field_config['dcdprecio_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->dcdprecio_, $this->field_config['dcdprecio_']['symbol_dec'], $this->field_config['dcdprecio_']['symbol_grp'], $this->field_config['dcdprecio_']['symbol_mon']);
             nm_limpa_valor($this->dcdprecio_, $this->field_config['dcdprecio_']['symbol_dec'], $this->field_config['dcdprecio_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dcdporcendesc_")
      {
          if (!empty($this->field_config['dcdporcendesc_']['symbol_dec']))
          {
             nm_limpa_valor($this->dcdporcendesc_, $this->field_config['dcdporcendesc_']['symbol_dec'], $this->field_config['dcdporcendesc_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dcdtotal_")
      {
          if (!empty($this->field_config['dcdtotal_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->dcdtotal_, $this->field_config['dcdtotal_']['symbol_dec'], $this->field_config['dcdtotal_']['symbol_grp'], $this->field_config['dcdtotal_']['symbol_mon']);
             nm_limpa_valor($this->dcdtotal_, $this->field_config['dcdtotal_']['symbol_dec'], $this->field_config['dcdtotal_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dcdsecuen_")
      {
          nm_limpa_numero($this->dcdsecuen_, $this->field_config['dcdsecuen_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "citid_")
      {
          nm_limpa_numero($this->citid_, $this->field_config['citid_']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
      if ('' !== $this->dcdcantidad_ || (!empty($format_fields) && isset($format_fields['dcdcantidad_'])))
      {
          nmgp_Form_Num_Val($this->dcdcantidad_, $this->field_config['dcdcantidad_']['symbol_grp'], $this->field_config['dcdcantidad_']['symbol_dec'], "0", "S", $this->field_config['dcdcantidad_']['format_neg'], "", "", "-", $this->field_config['dcdcantidad_']['symbol_fmt']) ; 
      }
      if ('' !== $this->dcdprecio_ || (!empty($format_fields) && isset($format_fields['dcdprecio_'])))
      {
          nmgp_Form_Num_Val($this->dcdprecio_, $this->field_config['dcdprecio_']['symbol_grp'], $this->field_config['dcdprecio_']['symbol_dec'], "2", "S", $this->field_config['dcdprecio_']['format_neg'], "", "", "-", $this->field_config['dcdprecio_']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['dcdprecio_']['symbol_mon'];
          $this->sc_add_currency($this->dcdprecio_, $sMonSymb, $this->field_config['dcdprecio_']['format_pos']); 
      }
      if ('' !== $this->dcdporcendesc_ || (!empty($format_fields) && isset($format_fields['dcdporcendesc_'])))
      {
          nmgp_Form_Num_Val($this->dcdporcendesc_, $this->field_config['dcdporcendesc_']['symbol_grp'], $this->field_config['dcdporcendesc_']['symbol_dec'], "2", "S", $this->field_config['dcdporcendesc_']['format_neg'], "", "", "-", $this->field_config['dcdporcendesc_']['symbol_fmt']) ; 
      }
      if ('' !== $this->dcdtotal_ || (!empty($format_fields) && isset($format_fields['dcdtotal_'])))
      {
          nmgp_Form_Num_Val($this->dcdtotal_, $this->field_config['dcdtotal_']['symbol_grp'], $this->field_config['dcdtotal_']['symbol_dec'], "2", "S", $this->field_config['dcdtotal_']['format_neg'], "", "", "-", $this->field_config['dcdtotal_']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['dcdtotal_']['symbol_mon'];
          $this->sc_add_currency($this->dcdtotal_, $sMonSymb, $this->field_config['dcdtotal_']['format_pos']); 
      }
      if ('' !== $this->dcdsecuen_ || (!empty($format_fields) && isset($format_fields['dcdsecuen_'])))
      {
          nmgp_Form_Num_Val($this->dcdsecuen_, $this->field_config['dcdsecuen_']['symbol_grp'], $this->field_config['dcdsecuen_']['symbol_dec'], "0", "S", $this->field_config['dcdsecuen_']['format_neg'], "", "", "-", $this->field_config['dcdsecuen_']['symbol_fmt']) ; 
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
          $this->ajax_return_values_all_vert();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['dcdsecuen_']['keyVal'] = form_detalle_citadiagnos_pack_protect_string($this->nmgp_dados_form['dcdsecuen_']);
          }
   } // ajax_return_values
   function ajax_return_values_all_vert()
   {
          if (isset($this->nmgp_refresh_fields) && isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_form_detalle_citadiagnos[$this->nmgp_refresh_row] = $this->NM_ajax_info['param'];
              if ((isset($this->Embutida_ronly) && $this->Embutida_ronly) || $this->NM_ajax_force_values)
              {
                  if (isset($this->NM_ajax_changed['sercodigo_']) && $this->NM_ajax_changed['sercodigo_'])
                  {
                      $this->form_vert_form_detalle_citadiagnos[$this->nmgp_refresh_row]['sercodigo_'] = $this->sercodigo_;
                  }
                  if (isset($this->NM_ajax_changed['dcdcantidad_']) && $this->NM_ajax_changed['dcdcantidad_'])
                  {
                      $this->form_vert_form_detalle_citadiagnos[$this->nmgp_refresh_row]['dcdcantidad_'] = $this->dcdcantidad_;
                  }
                  if (isset($this->NM_ajax_changed['dcdprecio_']) && $this->NM_ajax_changed['dcdprecio_'])
                  {
                      $this->form_vert_form_detalle_citadiagnos[$this->nmgp_refresh_row]['dcdprecio_'] = $this->dcdprecio_;
                  }
                  if (isset($this->NM_ajax_changed['dcdporcendesc_']) && $this->NM_ajax_changed['dcdporcendesc_'])
                  {
                      $this->form_vert_form_detalle_citadiagnos[$this->nmgp_refresh_row]['dcdporcendesc_'] = $this->dcdporcendesc_;
                  }
                  if (isset($this->NM_ajax_changed['dcdtotal_']) && $this->NM_ajax_changed['dcdtotal_'])
                  {
                      $this->form_vert_form_detalle_citadiagnos[$this->nmgp_refresh_row]['dcdtotal_'] = $this->dcdtotal_;
                  }
                  if (isset($this->NM_ajax_changed['dcdsecuen_']) && $this->NM_ajax_changed['dcdsecuen_'])
                  {
                      $this->form_vert_form_detalle_citadiagnos[$this->nmgp_refresh_row]['dcdsecuen_'] = $this->dcdsecuen_;
                  }
              }
          }
          if (isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
          }
          $this->NM_ajax_info['rsSize']            = sizeof($this->form_vert_form_detalle_citadiagnos);
          $this->NM_ajax_info['buttonDisplayVert'] = array();
          foreach($this->form_vert_form_detalle_citadiagnos as $sc_seq_vert => $aRecData)
          {
              $this->loadRecordState($sc_seq_vert);
              if ('navigate_form' == $this->NM_ajax_opcao) {
                  $this->NM_ajax_info['buttonDisplayVert'][] = array(
                      'seq'      => $sc_seq_vert,
                      'gridView' => true,
                      'delete'   => $this->nmgp_botoes['delete'],
                      'update'   => $this->nmgp_botoes['update'],
                  );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sercodigo_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['sercodigo_']);
                  $this->sercodigo_ = $sTmpValue;
                  $this->nm_clear_val('sercodigo_');
                  $sTmpValue = $this->sercodigo_;
                  $aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['Lookup_sercodigo_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['Lookup_sercodigo_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['Lookup_sercodigo_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['Lookup_sercodigo_'] = array(); 
    }

   $old_value_dcdcantidad_ = $this->dcdcantidad_;
   $old_value_dcdprecio_ = $this->dcdprecio_;
   $old_value_dcdporcendesc_ = $this->dcdporcendesc_;
   $old_value_dcdtotal_ = $this->dcdtotal_;
   $old_value_dcdsecuen_ = $this->dcdsecuen_;
   $this->nm_tira_formatacao();


   $unformatted_value_dcdcantidad_ = $this->dcdcantidad_;
   $unformatted_value_dcdprecio_ = $this->dcdprecio_;
   $unformatted_value_dcdporcendesc_ = $this->dcdporcendesc_;
   $unformatted_value_dcdtotal_ = $this->dcdtotal_;
   $unformatted_value_dcdsecuen_ = $this->dcdsecuen_;

   $nm_comando = "SELECT S.sercodigo, concat(E.espnombre,' - ',S.sernombre,' - $ ',S.serprecio) FROM servicio S, especialidad E WHERE (S.espcodigo=E.espcodigo) AND S.sercodigo = " . $aRecData['sercodigo_'] . " ORDER BY E.espnombre, S.sernombre";

   $this->dcdcantidad_ = $old_value_dcdcantidad_;
   $this->dcdprecio_ = $old_value_dcdprecio_;
   $this->dcdporcendesc_ = $old_value_dcdporcendesc_;
   $this->dcdtotal_ = $old_value_dcdtotal_;
   $this->dcdsecuen_ = $old_value_dcdsecuen_;

   if ('' != $aRecData['sercodigo_'])
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_detalle_citadiagnos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_detalle_citadiagnos_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['Lookup_sercodigo_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
                  $Nm_tp_obj = (isset($this->nmgp_refresh_fields) && in_array("sercodigo_", $this->nmgp_refresh_fields)) ? 'text' : 'text';
                  $this->NM_ajax_info['fldList']['sercodigo_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => $Nm_tp_obj,
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['sercodigo_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['sercodigo_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['sercodigo_' . $sc_seq_vert]['labList'] = $aLabel;
          $this->NM_ajax_info['fldList']['sercodigo_' . $sc_seq_vert . '_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($aLookup[0][form_detalle_citadiagnos_pack_protect_string($aRecData['sercodigo_'])]),
              );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dcdcantidad_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['dcdcantidad_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['dcdcantidad_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dcdprecio_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['dcdprecio_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['dcdprecio_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dcdporcendesc_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['dcdporcendesc_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['dcdporcendesc_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dcdtotal_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['dcdtotal_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['dcdtotal_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dcdsecuen_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['dcdsecuen_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['dcdsecuen_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['upload_dir'][$fieldName][] = $newName;
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
  function nm_proc_onload_record($sc_seq_vert=0)
  {
          if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
          $_SESSION['scriptcase']['form_detalle_citadiagnos']['contr_erro'] = 'on';
if (!isset($this->sc_temp_v_anulado)) {$this->sc_temp_v_anulado = (isset($_SESSION['v_anulado'])) ? $_SESSION['v_anulado'] : "";}
if (!isset($this->sc_temp_v_facturado)) {$this->sc_temp_v_facturado = (isset($_SESSION['v_facturado'])) ? $_SESSION['v_facturado'] : "";}
  if($this->sc_temp_v_facturado>0 || $this->sc_temp_v_anulado==1) {
	
	$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;
	
}
if (isset($this->sc_temp_v_facturado)) { $_SESSION['v_facturado'] = $this->sc_temp_v_facturado;}
if (isset($this->sc_temp_v_anulado)) { $_SESSION['v_anulado'] = $this->sc_temp_v_anulado;}
$_SESSION['scriptcase']['form_detalle_citadiagnos']['contr_erro'] = 'off'; 
          }
  }
  function nm_proc_onload($bFormat = true)
  {
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_detalle_citadiagnos']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_dcdprecio_ = $this->dcdprecio_;
}
if (!isset($this->sc_temp_v_anulado)) {$this->sc_temp_v_anulado = (isset($_SESSION['v_anulado'])) ? $_SESSION['v_anulado'] : "";}
if (!isset($this->sc_temp_v_facturado)) {$this->sc_temp_v_facturado = (isset($_SESSION['v_facturado'])) ? $_SESSION['v_facturado'] : "";}
  if($this->sc_evento == "novo") {

	$this->sc_field_readonly("dcdprecio_", 'on', (isset($sc_seq_vert) ? $sc_seq_vert : ''));
	
	
	
}

if($this->sc_temp_v_facturado>0 || $this->sc_temp_v_anulado==1) {
	
	$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "off";;
	
	
}
if (isset($this->sc_temp_v_facturado)) { $_SESSION['v_facturado'] = $this->sc_temp_v_facturado;}
if (isset($this->sc_temp_v_anulado)) { $_SESSION['v_anulado'] = $this->sc_temp_v_anulado;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_dcdprecio_ != $this->dcdprecio_ || (isset($bFlagRead_dcdprecio_) && $bFlagRead_dcdprecio_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['dcdprecio_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['dcdprecio_' . $this->nmgp_refresh_row]['valList'] = array($this->dcdprecio_);
        $this->NM_ajax_changed['dcdprecio_'] = true;
    }
}
$_SESSION['scriptcase']['form_detalle_citadiagnos']['contr_erro'] = 'off'; 
      }
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
      $this->dcdprecio_ = str_replace($sc_parm1, $sc_parm2, $this->dcdprecio_); 
      $this->dcdporcendesc_ = str_replace($sc_parm1, $sc_parm2, $this->dcdporcendesc_); 
      $this->dcdtotal_ = str_replace($sc_parm1, $sc_parm2, $this->dcdtotal_); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->dcdprecio_ = "'" . $this->dcdprecio_ . "'";
      $this->dcdporcendesc_ = "'" . $this->dcdporcendesc_ . "'";
      $this->dcdtotal_ = "'" . $this->dcdtotal_ . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->dcdprecio_ = str_replace("'", "", $this->dcdprecio_); 
      $this->dcdporcendesc_ = str_replace("'", "", $this->dcdporcendesc_); 
      $this->dcdtotal_ = str_replace("'", "", $this->dcdtotal_); 
   } 
//----------- 


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
      global $sc_seq_vert,  $nm_form_submit, $teste_validade, $sc_where;
 
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
    if ("incluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_detalle_citadiagnos']['contr_erro'] = 'on';
  

$_SESSION['scriptcase']['form_detalle_citadiagnos']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          return;
      }
      if ($this->nmgp_opcao == "alterar")
      {
          $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dados_select'][$sc_seq_vert];
          if ($this->nmgp_dados_select['sercodigo_'] == $this->sercodigo_ &&
              $this->nmgp_dados_select['dcdcantidad_'] == $this->dcdcantidad_ &&
              $this->nmgp_dados_select['dcdprecio_'] == $this->dcdprecio_ &&
              $this->nmgp_dados_select['dcdporcendesc_'] == $this->dcdporcendesc_ &&
              $this->nmgp_dados_select['dcdtotal_'] == $this->dcdtotal_ &&
              $this->nmgp_dados_select['dcdsecuen_'] == $this->dcdsecuen_)
          { }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dados_select'][$sc_seq_vert]['sercodigo_'] = $this->sercodigo_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dados_select'][$sc_seq_vert]['dcdcantidad_'] = $this->dcdcantidad_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dados_select'][$sc_seq_vert]['dcdprecio_'] = $this->dcdprecio_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dados_select'][$sc_seq_vert]['dcdporcendesc_'] = $this->dcdporcendesc_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dados_select'][$sc_seq_vert]['dcdtotal_'] = $this->dcdtotal_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dados_select'][$sc_seq_vert]['dcdsecuen_'] = $this->dcdsecuen_;
          }
      }
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
      $NM_val_form['sercodigo_'] = $this->sercodigo_;
      $NM_val_form['dcdcantidad_'] = $this->dcdcantidad_;
      $NM_val_form['dcdprecio_'] = $this->dcdprecio_;
      $NM_val_form['dcdporcendesc_'] = $this->dcdporcendesc_;
      $NM_val_form['dcdtotal_'] = $this->dcdtotal_;
      $NM_val_form['dcdsecuen_'] = $this->dcdsecuen_;
      $NM_val_form['citid_'] = $this->citid_;
      if ($this->dcdsecuen_ === "" || is_null($this->dcdsecuen_))  
      { 
          $this->dcdsecuen_ = 0;
      } 
      if ($this->citid_ === "" || is_null($this->citid_))  
      { 
          $this->citid_ = 0;
          $this->sc_force_zero[] = 'citid_';
      } 
      if ($this->sercodigo_ === "" || is_null($this->sercodigo_))  
      { 
          $this->sercodigo_ = 0;
          $this->sc_force_zero[] = 'sercodigo_';
      } 
      if ($this->dcdcantidad_ === "" || is_null($this->dcdcantidad_))  
      { 
          $this->dcdcantidad_ = 0;
          $this->sc_force_zero[] = 'dcdcantidad_';
      } 
      if ($this->dcdprecio_ === "" || is_null($this->dcdprecio_))  
      { 
          $this->dcdprecio_ = 0;
          $this->sc_force_zero[] = 'dcdprecio_';
      } 
      if ($this->dcdporcendesc_ === "" || is_null($this->dcdporcendesc_))  
      { 
          $this->dcdporcendesc_ = 0;
          $this->sc_force_zero[] = 'dcdporcendesc_';
      } 
      if ($this->dcdtotal_ === "" || is_null($this->dcdtotal_))  
      { 
          $this->dcdtotal_ = 0;
          $this->sc_force_zero[] = 'dcdtotal_';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_ "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_ "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_detalle_citadiagnos_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_nfnd']; 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
              $Cmd_Unique = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where (citid = " . $this->citid_ . " AND sercodigo = " . $this->sercodigo_ . ") AND (dcdsecuen <> $this->dcdsecuen_)";
              $Cmd_Unique = str_replace("'null'", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace("#null#", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $Cmd_Unique) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $Cmd_Unique;
              $rsUni = $this->Db->Execute($Cmd_Unique);
              if (false === $rsUni)
              {
                  $dbErrorMessage = $this->Db->ErrorMsg();
                  $dbErrorCode = $this->Db->ErrorNo();
                  $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $dbErrorMessage, true);
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) {
                      $this->sc_erro_update = $dbErrorMessage;
                      $this->NM_rollback_db();
                      if ($this->NM_ajax_flag) {
                          form_detalle_citadiagnos_pack_ajax_response();
                      }
                      exit;
                  }
              }
              elseif (0 < $rsUni->fields[0])
              {
                  $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_ukey']; 
                  $this->nmgp_opcao = "nada"; 
                  $aUpdateOk[] = 'citid+sercodigo';
                  $rsUni->Close();
              }
              else
              {
                  $rsUni->Close();
              }
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "dcdtotal = $this->dcdtotal_"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "dcdtotal = $this->dcdtotal_"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "dcdtotal = $this->dcdtotal_"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "dcdtotal = $this->dcdtotal_"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "dcdtotal = $this->dcdtotal_"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "dcdtotal = $this->dcdtotal_"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "dcdtotal = $this->dcdtotal_"; 
              } 
              if (isset($NM_val_form['citid_']) && $NM_val_form['citid_'] != $this->nmgp_dados_select['citid_']) 
              { 
                  $SC_fields_update[] = "citid = $this->citid_"; 
              } 
              if (isset($NM_val_form['sercodigo_']) && $NM_val_form['sercodigo_'] != $this->nmgp_dados_select['sercodigo_']) 
              { 
                  $SC_fields_update[] = "sercodigo = $this->sercodigo_"; 
              } 
              if (isset($NM_val_form['dcdcantidad_']) && $NM_val_form['dcdcantidad_'] != $this->nmgp_dados_select['dcdcantidad_']) 
              { 
                  $SC_fields_update[] = "dcdcantidad = $this->dcdcantidad_"; 
              } 
              if (isset($NM_val_form['dcdprecio_']) && $NM_val_form['dcdprecio_'] != $this->nmgp_dados_select['dcdprecio_']) 
              { 
                  $SC_fields_update[] = "dcdprecio = $this->dcdprecio_"; 
              } 
              if (isset($NM_val_form['dcdporcendesc_']) && $NM_val_form['dcdporcendesc_'] != $this->nmgp_dados_select['dcdporcendesc_']) 
              { 
                  $SC_fields_update[] = "dcdporcendesc = $this->dcdporcendesc_"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE dcdsecuen = $this->dcdsecuen_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE dcdsecuen = $this->dcdsecuen_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE dcdsecuen = $this->dcdsecuen_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE dcdsecuen = $this->dcdsecuen_ ";  
              }  
              else  
              {
                  $comando .= " WHERE dcdsecuen = $this->dcdsecuen_ ";  
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
                                  form_detalle_citadiagnos_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }

              $this->sc_teve_alt = true; 
              if     (isset($NM_val_form) && isset($NM_val_form['dcdsecuen_'])) { $this->dcdsecuen_ = $NM_val_form['dcdsecuen_']; }
              elseif (isset($this->dcdsecuen_)) { $this->nm_limpa_alfa($this->dcdsecuen_); }
              if     (isset($NM_val_form) && isset($NM_val_form['sercodigo_'])) { $this->sercodigo_ = $NM_val_form['sercodigo_']; }
              elseif (isset($this->sercodigo_)) { $this->nm_limpa_alfa($this->sercodigo_); }
              if     (isset($NM_val_form) && isset($NM_val_form['dcdcantidad_'])) { $this->dcdcantidad_ = $NM_val_form['dcdcantidad_']; }
              elseif (isset($this->dcdcantidad_)) { $this->nm_limpa_alfa($this->dcdcantidad_); }
              if     (isset($NM_val_form) && isset($NM_val_form['dcdprecio_'])) { $this->dcdprecio_ = $NM_val_form['dcdprecio_']; }
              elseif (isset($this->dcdprecio_)) { $this->nm_limpa_alfa($this->dcdprecio_); }
              if     (isset($NM_val_form) && isset($NM_val_form['dcdporcendesc_'])) { $this->dcdporcendesc_ = $NM_val_form['dcdporcendesc_']; }
              elseif (isset($this->dcdporcendesc_)) { $this->nm_limpa_alfa($this->dcdporcendesc_); }
              if     (isset($NM_val_form) && isset($NM_val_form['dcdtotal_'])) { $this->dcdtotal_ = $NM_val_form['dcdtotal_']; }
              elseif (isset($this->dcdtotal_)) { $this->nm_limpa_alfa($this->dcdtotal_); }
              $this->nm_proc_onload_record($this->nmgp_refresh_row);

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('sercodigo_', 'dcdcantidad_', 'dcdprecio_', 'dcdporcendesc_', 'dcdtotal_', 'dcdsecuen_'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
              {

                  $this->NM_ajax_info['readOnly']['sercodigo_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['dcdcantidad_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['dcdprecio_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['dcdporcendesc_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['dcdtotal_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['dcdsecuen_' . $this->nmgp_refresh_row] = 'on';


                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "dcdsecuen, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
              $Cmd_Unique = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where citid = " . $this->citid_ . " AND sercodigo = " . $this->sercodigo_ . "";
              $Cmd_Unique = str_replace("'null'", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace("#null#", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $Cmd_Unique) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $Cmd_Unique;
              $rsUni = $this->Db->Execute($Cmd_Unique);
              if (false === $rsUni)
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
                          form_detalle_citadiagnos_pack_ajax_response();
                          exit;
                      }
                  }
              }
              elseif (0 < $rsUni->fields[0])
              {
                  $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_inst_uniq'] . " Citid, SERVICIO"; 
                  $this->nmgp_opcao = "nada"; 
                  $GLOBALS["erro_incl"] = 1; 
                  $aInsertOk[] = 'citid+sercodigo';
                  $rsUni->Close();
              }
              else
              {
                  $rsUni->Close();
              }
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (citid, sercodigo, dcdcantidad, dcdprecio, dcdporcendesc, dcdtotal) VALUES ($this->citid_, $this->sercodigo_, $this->dcdcantidad_, $this->dcdprecio_, $this->dcdporcendesc_, $this->dcdtotal_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "citid, sercodigo, dcdcantidad, dcdprecio, dcdporcendesc, dcdtotal) VALUES (" . $NM_seq_auto . "$this->citid_, $this->sercodigo_, $this->dcdcantidad_, $this->dcdprecio_, $this->dcdporcendesc_, $this->dcdtotal_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "citid, sercodigo, dcdcantidad, dcdprecio, dcdporcendesc, dcdtotal) VALUES (" . $NM_seq_auto . "$this->citid_, $this->sercodigo_, $this->dcdcantidad_, $this->dcdprecio_, $this->dcdporcendesc_, $this->dcdtotal_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "citid, sercodigo, dcdcantidad, dcdprecio, dcdporcendesc, dcdtotal) VALUES (" . $NM_seq_auto . "$this->citid_, $this->sercodigo_, $this->dcdcantidad_, $this->dcdprecio_, $this->dcdporcendesc_, $this->dcdtotal_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "citid, sercodigo, dcdcantidad, dcdprecio, dcdporcendesc, dcdtotal) VALUES (" . $NM_seq_auto . "$this->citid_, $this->sercodigo_, $this->dcdcantidad_, $this->dcdprecio_, $this->dcdporcendesc_, $this->dcdtotal_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "citid, sercodigo, dcdcantidad, dcdprecio, dcdporcendesc, dcdtotal) VALUES (" . $NM_seq_auto . "$this->citid_, $this->sercodigo_, $this->dcdcantidad_, $this->dcdprecio_, $this->dcdporcendesc_, $this->dcdtotal_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "citid, sercodigo, dcdcantidad, dcdprecio, dcdporcendesc, dcdtotal) VALUES (" . $NM_seq_auto . "$this->citid_, $this->sercodigo_, $this->dcdcantidad_, $this->dcdprecio_, $this->dcdporcendesc_, $this->dcdtotal_)"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "citid, sercodigo, dcdcantidad, dcdprecio, dcdporcendesc, dcdtotal) VALUES (" . $NM_seq_auto . "$this->citid_, $this->sercodigo_, $this->dcdcantidad_, $this->dcdprecio_, $this->dcdporcendesc_, $this->dcdtotal_)"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "citid, sercodigo, dcdcantidad, dcdprecio, dcdporcendesc, dcdtotal) VALUES (" . $NM_seq_auto . "$this->citid_, $this->sercodigo_, $this->dcdcantidad_, $this->dcdprecio_, $this->dcdporcendesc_, $this->dcdtotal_)"; 
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
                              form_detalle_citadiagnos_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select @@identity"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_detalle_citadiagnos_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->dcdsecuen_ =  $rsy->fields[0];
                 $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->dcdsecuen_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT dbinfo('sqlca.sqlerrd1') FROM " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->dcdsecuen_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select .currval from dual"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->dcdsecuen_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $str_tabela = "SYSIBM.SYSDUMMY1"; 
                  if($this->Ini->nm_con_use_schema == "N") 
                  { 
                          $str_tabela = "SYSDUMMY1"; 
                  } 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT IDENTITY_VAL_LOCAL() FROM " . $str_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->dcdsecuen_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select CURRVAL('')"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->dcdsecuen_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select gen_id(, 0) from " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->dcdsecuen_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->dcdsecuen_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['db_changed'] = true;

              $this->sc_evento = "insert"; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['total']++; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_qtd']++; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_I_E']++; 
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
              $this->sc_teve_incl = true; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dados_select'][$sc_seq_vert]['sercodigo_'] = $this->sercodigo_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dados_select'][$sc_seq_vert]['dcdcantidad_'] = $this->dcdcantidad_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dados_select'][$sc_seq_vert]['dcdprecio_'] = $this->dcdprecio_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dados_select'][$sc_seq_vert]['dcdporcendesc_'] = $this->dcdporcendesc_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dados_select'][$sc_seq_vert]['dcdtotal_'] = $this->dcdtotal_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dados_select'][$sc_seq_vert]['dcdsecuen_'] = $this->dcdsecuen_;
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
              if (isset($this->dcdsecuen_)) { $this->nm_limpa_alfa($this->dcdsecuen_); }
              if (isset($this->sercodigo_)) { $this->nm_limpa_alfa($this->sercodigo_); }
              if (isset($this->dcdcantidad_)) { $this->nm_limpa_alfa($this->dcdcantidad_); }
              if (isset($this->dcdprecio_)) { $this->nm_limpa_alfa($this->dcdprecio_); }
              if (isset($this->dcdporcendesc_)) { $this->nm_limpa_alfa($this->dcdporcendesc_); }
              if (isset($this->dcdtotal_)) { $this->nm_limpa_alfa($this->dcdtotal_); }
              if (isset($this->Embutida_form) && $this->Embutida_form)
              {
                  $this->nm_guardar_campos();
                  $this->nm_proc_onload_record($this->nmgp_refresh_row);
                  $this->nm_formatar_campos();

              $aLookup = array();
              $aRecData['sercodigo_'] = $this->sercodigo_;
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['Lookup_sercodigo_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['Lookup_sercodigo_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['Lookup_sercodigo_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['Lookup_sercodigo_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['Lookup_sercodigo_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['Lookup_sercodigo_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['Lookup_sercodigo_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['Lookup_sercodigo_'] = array(); 
    }

   $old_value_dcdcantidad_ = $this->dcdcantidad_;
   $old_value_dcdprecio_ = $this->dcdprecio_;
   $old_value_dcdporcendesc_ = $this->dcdporcendesc_;
   $old_value_dcdtotal_ = $this->dcdtotal_;
   $old_value_dcdsecuen_ = $this->dcdsecuen_;
   $this->nm_tira_formatacao();


   $unformatted_value_dcdcantidad_ = $this->dcdcantidad_;
   $unformatted_value_dcdprecio_ = $this->dcdprecio_;
   $unformatted_value_dcdporcendesc_ = $this->dcdporcendesc_;
   $unformatted_value_dcdtotal_ = $this->dcdtotal_;
   $unformatted_value_dcdsecuen_ = $this->dcdsecuen_;

   $nm_comando = "SELECT S.sercodigo, concat(E.espnombre,' - ',S.sernombre,' - $ ',S.serprecio) FROM servicio S, especialidad E WHERE (S.espcodigo=E.espcodigo) AND S.sercodigo = " . $aRecData['sercodigo_'] . " ORDER BY E.espnombre, S.sernombre";

   $this->dcdcantidad_ = $old_value_dcdcantidad_;
   $this->dcdprecio_ = $old_value_dcdprecio_;
   $this->dcdporcendesc_ = $old_value_dcdporcendesc_;
   $this->dcdtotal_ = $old_value_dcdtotal_;
   $this->dcdsecuen_ = $old_value_dcdsecuen_;

   if ('' != $aRecData['sercodigo_'])
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_detalle_citadiagnos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_detalle_citadiagnos_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['Lookup_sercodigo_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $val_output = "";
          foreach ($aLookup as $iLookup => $aLookupDados)
          {
              $SV_cmp = $this->sercodigo_;
              $this->nm_clear_val("sercodigo_");
              if (isset($aLookupDados[$this->sercodigo_]))
              {
                  $val_output = $aLookupDados[$this->sercodigo_];
              }
              $this->sercodigo_ = $SV_cmp;
          }
          $this->NM_ajax_info['fldList']['sercodigo__autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          $tmpLabel_sercodigo_ = $val_output;

                  $this->NM_ajax_info['fldList']['sercodigo_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['sercodigo_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->sercodigo_)));
                  $this->NM_ajax_info['fldList']['sercodigo_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_sercodigo_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sercodigo_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sercodigo_' . $this->nmgp_refresh_row] = "on";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sercodigo_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sercodigo_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['dcdcantidad_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['dcdcantidad_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->dcdcantidad_)));
                  $this->NM_ajax_info['fldList']['dcdcantidad_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_dcdcantidad_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dcdcantidad_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dcdcantidad_' . $this->nmgp_refresh_row] = "on";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dcdcantidad_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dcdcantidad_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['dcdprecio_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['dcdprecio_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->dcdprecio_)));
                  $this->NM_ajax_info['fldList']['dcdprecio_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_dcdprecio_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dcdprecio_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dcdprecio_' . $this->nmgp_refresh_row] = "on";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dcdprecio_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dcdprecio_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['dcdporcendesc_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['dcdporcendesc_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->dcdporcendesc_)));
                  $this->NM_ajax_info['fldList']['dcdporcendesc_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_dcdporcendesc_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dcdporcendesc_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dcdporcendesc_' . $this->nmgp_refresh_row] = "on";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dcdporcendesc_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dcdporcendesc_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['dcdtotal_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['dcdtotal_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->dcdtotal_)));
                  $this->NM_ajax_info['fldList']['dcdtotal_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_dcdtotal_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dcdtotal_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dcdtotal_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dcdtotal_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dcdtotal_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['dcdsecuen_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['dcdsecuen_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->dcdsecuen_)));
                  $this->NM_ajax_info['fldList']['dcdsecuen_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_dcdsecuen_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dcdsecuen_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dcdsecuen_' . $this->nmgp_refresh_row] = "on";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dcdsecuen_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dcdsecuen_' . $this->nmgp_refresh_row] = "on";
                      }
                  }


                  $this->nm_tira_formatacao();

                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->dcdsecuen_ = substr($this->Db->qstr($this->dcdsecuen_), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_ "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_ "); 
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
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_dele_nfnd']; 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_ "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where dcdsecuen = $this->dcdsecuen_ "); 
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
                          form_detalle_citadiagnos_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nm_proc_onload_record($sc_seq_vert);
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['db_changed'] = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_qtd']--; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['total']--; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_I_E']--; 
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
              $this->sc_teve_excl = true; 
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
    if ("insert" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['decimal_db'] == ",")
        {
            $this->nm_troca_decimal(",", ".");
        }
        $_SESSION['scriptcase']['form_detalle_citadiagnos']['contr_erro'] = 'on';
  $this->actualiza_titulo_cita();

$sqlval="select citfecha, agesecuen, cithoraini, fclnumero from cita where citid=".$this->citid_ ;
 
      $nm_select = $sqlval; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
;

$idagenda=$this->ds[0][1];

if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}


$this->sc_ajax_javascript('reload_calendar', array($idagenda));

 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('form_cita') . "/", $this->nm_location, "", "_parent", "ret_self", 440, 630);
 };
$_SESSION['scriptcase']['form_detalle_citadiagnos']['contr_erro'] = 'off'; 
    }
    if ("delete" == $this->sc_evento && $this->nmgp_opcao != "nada") {
      $_SESSION['scriptcase']['form_detalle_citadiagnos']['contr_erro'] = 'on';
  $this->actualiza_titulo_cita();



$sqlval="select citfecha, agesecuen, cithoraini, fclnumero from cita where citid=".$this->citid_ ;
 
      $nm_select = $sqlval; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
;

$idagenda=$this->ds[0][1];

if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}


$this->sc_ajax_javascript('reload_calendar', array($idagenda));


 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('form_cita') . "/", $this->nm_location, "", "_parent", "ret_self", 440, 630);
 };
$_SESSION['scriptcase']['form_detalle_citadiagnos']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          return;
      }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['decimal_db'] == ",")
   {
       $this->nm_troca_decimal(".", ",");
   }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['parms'] = "dcdsecuen_?#?$this->dcdsecuen_?@?"; 
      }
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->dcdsecuen_ = null === $this->dcdsecuen_ ? null : substr($this->Db->qstr($this->dcdsecuen_), 1, -1); 
      } 
   }
//---------- 
   function nm_select_banco() 
   { 
      global $nm_form_submit, $sc_seq_vert, $sc_check_incl, $teste_validade, $sc_where;
 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['rows']))
      {
          $this->sc_max_reg = $_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['rows'];
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['rows_ins']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['rows_ins']))
      {
          $this->sc_max_reg_incl = $_SESSION['scriptcase']['sc_apl_conf']['form_detalle_citadiagnos']['rows_ins'];
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_qtd_reg']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_qtd_reg'])
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_liga_qtd_reg'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['sc_max_reg']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['sc_max_reg'] > 0 || strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['sc_max_reg']) == "all"))
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['sc_max_reg'];
      } 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
      $this->form_vert_form_detalle_citadiagnos = array();
      if ($this->nmgp_opcao != "novo") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['parms'] = ""; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($this->sc_teve_excl)
      {
          $this->nmgp_opcao = "avanca";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start'] -= $this->sc_max_reg;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start'] = 0;
      }
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_filter'] . ")";
          }
      }
      $sc_where = "";
      if ('' != $sc_where_filter)
      {
          $sc_where = (isset($sc_where) && '' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (((isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao) || (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)) && !$this->has_where_params && 'novo' != $this->nmgp_opcao)
      {
          $aNewWhereCond = array();
          if (null != $this->dcdsecuen_)
          {
              $aNewWhereCond[] = "dcdsecuen = " . $this->dcdsecuen_;
          }
          if (!$this->NM_ajax_flag)
          {
              $this->NM_btn_navega = "S";
          }
          elseif (!empty($aNewWhereCond))
          {
              if ('' == $sc_where)
              {
                  $sc_where = " where (";
              }
              else
              {
                  $sc_where .= " and (";
              }
              $sc_where .= implode(" and ", $aNewWhereCond) . ")";
          }
      }
      if ('total' != $this->form_paginacao)
      {
          if ($this->app_is_initializing || $this->sc_teve_excl || $this->sc_teve_incl || (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['total']))
          {
              $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where;
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
              $rt = $this->Db->Execute($nmgp_select);
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit;
              }
              $qt_geral_reg_form_detalle_citadiagnos = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['total'] = $qt_geral_reg_form_detalle_citadiagnos;
              $rt->Close();
          }
      if ((isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['total']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_I_E'] = 0; 
          if (!$this->sc_teve_excl && !$this->sc_teve_incl) 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start'] = 0; 
          } 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->dcdsecuen_))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "dcdsecuen < $this->dcdsecuen_ "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "dcdsecuen < $this->dcdsecuen_ "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "dcdsecuen < $this->dcdsecuen_ "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "dcdsecuen < $this->dcdsecuen_ "; 
              }
              else  
              {
                  $Key_Where = "dcdsecuen < $this->dcdsecuen_ "; 
              }
              $Where_Start = (empty($sc_where)) ? " where " . $Key_Where :  $sc_where . " and (" . $Key_Where . ")";
              $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $Where_Start; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_detalle_citadiagnos = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['total'];
      } 
      if ($this->nmgp_opcao == "inicio" || $this->nmgp_opcao == "ordem") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_detalle_citadiagnos) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start'] += ($this->sc_max_reg + $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_I_E']); 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start'] > $qt_geral_reg_form_detalle_citadiagnos)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start'] = $qt_geral_reg_form_detalle_citadiagnos - $this->sc_max_reg; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start'] = 0; 
              }
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start'] -= $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start'] = ($qt_geral_reg_form_detalle_citadiagnos + 1) - $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start'] = 0; 
          }
      } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_I_E'] = 0; 
      }
      $Cmps_ord_def = array();
      $sc_order_by  = "";
      $sc_order_by = "dcdsecuen";
      $sc_order_by = str_replace("order by ", "", $sc_order_by);
      $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
      if (!empty($sc_order_by))
      {
          $sc_order_by = " order by $sc_order_by "; 
      }
      if ($this->nmgp_opcao == "ordem" && in_array($this->nmgp_ordem, $Cmps_ord_def)) 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['ordem_cmp'] != $this->nmgp_ordem)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['ordem_cmp'] = $this->nmgp_ordem; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['ordem_ord'] = ' asc'; 
          }
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['ordem_ord'] == ' asc')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['ordem_ord'] = ' desc'; 
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['ordem_ord'] = ' asc'; 
          }
      } 
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['ordem_cmp'])) 
      { 
          $sc_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['ordem_cmp'] . $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['ordem_ord']; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT dcdsecuen, citid, sercodigo, dcdcantidad, dcdprecio, dcdporcendesc, dcdtotal from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT dcdsecuen, citid, sercodigo, dcdcantidad, dcdprecio, dcdporcendesc, dcdtotal from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT dcdsecuen, citid, sercodigo, dcdcantidad, dcdprecio, dcdporcendesc, dcdtotal from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT dcdsecuen, citid, sercodigo, dcdcantidad, dcdprecio, dcdporcendesc, dcdtotal from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      else 
      { 
          $nmgp_select = "SELECT dcdsecuen, citid, sercodigo, dcdcantidad, dcdprecio, dcdporcendesc, dcdtotal from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      if ($this->nmgp_opcao != "novo") 
      { 
      if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
          $rs = $this->Db->Execute($nmgp_select) ;
      }
      elseif ('total' == $this->form_paginacao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = $this->Db->Execute($nmgp_select) ; 
      }
      else
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['run_iframe'] == "R")
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          else 
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start']) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start']) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start']) ; 
              } 
              else  
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
                  $rs = $this->Db->Execute($nmgp_select) ; 
                  if (!$rs === false && !$rs->EOF) 
                  { 
                      $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start']) ;  
                  } 
              } 
          } 
      }
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
              $this->nm_flag_saida_novo = "S"; 
              $this->nmgp_opcao = "novo"; 
              $this->sc_evento  = "novo"; 
              if ($this->aba_iframe)
              {
                  $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs->EOF && $this->nmgp_botoes['new'] != "on")
          {
              $this->nmgp_form_empty = true;
          }
          if ($rs->EOF)
          {
              $sc_seq_vert = 0; 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_filter']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['empty_filter'] = true;
              }
          }
          else
          {
              $sc_seq_vert = 1; 
          }
          if ('total' == $this->form_paginacao)
          {
              $bPagTest = true;
              $this->sc_max_reg = 0;
          }
          else
          {
              $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
          }
          if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
              $this->nm_proc_onload(false);
          }
          while (!$rs->EOF && $bPagTest)
          { 
              if ('total' == $this->form_paginacao)
              {
                  $this->sc_max_reg++;
              }
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $guard_seq_vert = $sc_seq_vert;
                  $sc_seq_vert    = $this->nmgp_refresh_row;
              }
              if ('total' != $this->form_paginacao)
              {
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['run_iframe'] == "R")
              { 
                  $this->sc_max_reg++;
              } 
              }
              $this->dcdsecuen_ = $rs->fields[0] ; 
              $this->nmgp_dados_select['dcdsecuen_'] = $this->dcdsecuen_;
              $this->citid_ = $rs->fields[1] ; 
              $this->nmgp_dados_select['citid_'] = $this->citid_;
              $this->sercodigo_ = $rs->fields[2] ; 
              $this->nmgp_dados_select['sercodigo_'] = $this->sercodigo_;
              $this->dcdcantidad_ = $rs->fields[3] ; 
              $this->nmgp_dados_select['dcdcantidad_'] = $this->dcdcantidad_;
              $this->dcdprecio_ = trim($rs->fields[4]) ; 
              $this->nmgp_dados_select['dcdprecio_'] = $this->dcdprecio_;
              $this->dcdporcendesc_ = trim($rs->fields[5]) ; 
              $this->nmgp_dados_select['dcdporcendesc_'] = $this->dcdporcendesc_;
              $this->dcdtotal_ = trim($rs->fields[6]) ; 
              $this->nmgp_dados_select['dcdtotal_'] = $this->dcdtotal_;
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->dcdsecuen_ = (string)$this->dcdsecuen_; 
              $this->citid_ = (string)$this->citid_; 
              $this->sercodigo_ = (string)$this->sercodigo_; 
              $this->dcdcantidad_ = (string)$this->dcdcantidad_; 
              $this->dcdprecio_ = (strpos(strtolower($this->dcdprecio_), "e")) ? (float)$this->dcdprecio_ : $this->dcdprecio_; 
              $this->dcdprecio_ = (string)$this->dcdprecio_; 
              $this->dcdporcendesc_ = (strpos(strtolower($this->dcdporcendesc_), "e")) ? (float)$this->dcdporcendesc_ : $this->dcdporcendesc_; 
              $this->dcdporcendesc_ = (string)$this->dcdporcendesc_; 
              $this->dcdtotal_ = (strpos(strtolower($this->dcdtotal_), "e")) ? (float)$this->dcdtotal_ : $this->dcdtotal_; 
              $this->dcdtotal_ = (string)$this->dcdtotal_; 
              if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['parms'])) 
              { 
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['parms'] = "dcdsecuen_?#?$this->dcdsecuen_?@?";
              } 
              $this->nm_proc_onload_record($sc_seq_vert);
              $this->storeRecordState($sc_seq_vert);
//
//-- 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dados_select'][$sc_seq_vert] = $this->nmgp_dados_select;
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_form_detalle_citadiagnos[$sc_seq_vert]['sercodigo_'] =  $this->sercodigo_; 
             $this->form_vert_form_detalle_citadiagnos[$sc_seq_vert]['dcdcantidad_'] =  $this->dcdcantidad_; 
             $this->form_vert_form_detalle_citadiagnos[$sc_seq_vert]['dcdprecio_'] =  $this->dcdprecio_; 
             $this->form_vert_form_detalle_citadiagnos[$sc_seq_vert]['dcdporcendesc_'] =  $this->dcdporcendesc_; 
             $this->form_vert_form_detalle_citadiagnos[$sc_seq_vert]['dcdtotal_'] =  $this->dcdtotal_; 
             $this->form_vert_form_detalle_citadiagnos[$sc_seq_vert]['dcdsecuen_'] =  $this->dcdsecuen_; 
             $this->form_vert_form_detalle_citadiagnos[$sc_seq_vert]['citid_'] =  $this->citid_; 
              $sc_seq_vert++; 
              $rs->MoveNext() ; 
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $sc_seq_vert = $guard_seq_vert;
              }
              if ('total' != $this->form_paginacao)
              {
                  $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
              }
          } 
          ksort ($this->form_vert_form_detalle_citadiagnos); 
          $rs->Close(); 
          if ($this->form_paginacao == "total")
          {
              $this->SC_nav_page = "";
          }
          else
          {
              $this->NM_gera_nav_page(); 
          }
          $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start'] < (($qt_geral_reg_form_detalle_citadiagnos + 1) - $this->sc_max_reg);
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['opcao'] = '';
          }
      } 
      if ($this->nmgp_opcao == "novo") 
      { 
          $sc_seq_vert = 1; 
          $sc_check_incl = array(); 
          if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao) 
          { 
              $sc_seq_vert = $this->sc_seq_vert; 
              $this->sc_evento = "novo"; 
              $this->sc_max_reg_incl = $this->sc_seq_vert; 
          } 
          elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['embutida_multi']) 
          { 
          } 
          else 
          { 
              $this->sc_max_reg_incl = 0; 
          } 
          while ($sc_seq_vert <= $this->sc_max_reg_incl) 
          { 
              $this->dcdsecuen_ = "";  
              $this->sercodigo_ = "";  
              $this->dcdcantidad_ = "";  
              $this->dcdprecio_ = "";  
              $this->dcdporcendesc_ = "";  
              $this->dcdtotal_ = "";  
              $this->nm_proc_onload_record($sc_seq_vert);
              if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['foreign_key']))
              {
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['foreign_key'] as $sFKName => $sFKValue)
                  {
                      if (isset($this->sc_conv_var[$sFKName]))
                      {
                          $sFKName = $this->sc_conv_var[$sFKName];
                      }
                      eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
                  }
              }
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_form_detalle_citadiagnos[$sc_seq_vert]['sercodigo_'] =  $this->sercodigo_; 
             $this->form_vert_form_detalle_citadiagnos[$sc_seq_vert]['dcdcantidad_'] =  $this->dcdcantidad_; 
             $this->form_vert_form_detalle_citadiagnos[$sc_seq_vert]['dcdprecio_'] =  $this->dcdprecio_; 
             $this->form_vert_form_detalle_citadiagnos[$sc_seq_vert]['dcdporcendesc_'] =  $this->dcdporcendesc_; 
             $this->form_vert_form_detalle_citadiagnos[$sc_seq_vert]['dcdtotal_'] =  $this->dcdtotal_; 
             $this->form_vert_form_detalle_citadiagnos[$sc_seq_vert]['dcdsecuen_'] =  $this->dcdsecuen_; 
             $this->form_vert_form_detalle_citadiagnos[$sc_seq_vert]['citid_'] =  $this->citid_; 
              $sc_seq_vert++; 
          } 
          if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
              $this->nm_proc_onload(false);
          }
      }  
  }
   function NM_gera_nav_page() 
   {
       $this->SC_nav_page = "";
       $Arr_result        = array();
       $Ind_result        = 0;
       $Reg_Page   = $this->sc_max_reg;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['reg_start'] + $this->sc_max_reg;
       $rec_fim    = ($rec_fim > $rec_tot) ? $rec_tot : $rec_fim;
       if ($rec_tot == 0)
       {
           return;
       }
       $Qtd_Pages  = ceil($rec_tot / $Reg_Page);
       $Page_Atu   = ceil($rec_fim / $Reg_Page);
       $Link_ini   = 1;
       if ($Page_Atu > $Max_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       elseif ($Page_Atu > $Mid_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       if (($Qtd_Pages - $Link_ini) < $Max_link)
       {
           $Link_ini = ($Qtd_Pages - $Max_link) + 1;
       }
       if ($Link_ini < 1)
       {
           $Link_ini = 1;
       }
       for ($x = 0; $x < $Max_link && $Link_ini <= $Qtd_Pages; $x++)
       {
           $rec = (($Link_ini - 1) * $Reg_Page) + 1;
           if ($Link_ini == $Page_Atu)
           {
               $Arr_result[$Ind_result] = '<span class="scFormToolbarNavOpen" style="vertical-align: middle;">' . $Link_ini . '</span>';
           }
           else
           {
               $Arr_result[$Ind_result] = '<a class="scFormToolbarNav" style="vertical-align: middle;" href="javascript: nm_navpage(' . $rec . ')">' . $Link_ini . '</a>';
           }
           $Link_ini++;
           $Ind_result++;
           if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
           {
               $Arr_result[$Ind_result] = '<img src="' . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . '" align="absmiddle" style="vertical-align: middle;">';
               $Ind_result++;
           }
       }
       if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
       {
           krsort($Arr_result);
       }
       foreach ($Arr_result as $Ind_result => $Lin_result)
       {
           $this->SC_nav_page .= $Lin_result;
       }
   }
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function actualiza_titulo_cita()
{
$_SESSION['scriptcase']['form_detalle_citadiagnos']['contr_erro'] = 'on';
  
$sql2="select fclnumero from cita where citid=".$this->citid_ ;
 
      $nm_select = $sql2; 
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
$fichacli=$this->rs[0][0];

$sql="select fclapellidos, fclnombres, fclcelular from ficha_cliente where fclnumero=".$fichacli;
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
;

$titulo_cita1=$fichacli."-".$this->ds[0][0]." ".$this->ds[0][1]." (".$this->ds[0][2].")";

$sql3="select S.sernombre from servicio S, detalle_citadiagnos D where D.sercodigo=S.sercodigo and D.citid=".$this->citid_ ;
 
      $nm_select = $sql3; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ps = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ps[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ps = false;
          $this->ps_erro = $this->Db->ErrorMsg();
      } 
;

$titulo_cita2="";
foreach($this->ps  as $item) {
	
	$titulo_cita2=$titulo_cita2." ".$item[0];
	
}
$titulo_cita=$titulo_cita1." ".$titulo_cita2;

$titulo_truncado=substr($titulo_cita,0,300);

$updtsql="update cita set cittitulo='".$titulo_truncado."' where citid=".$this->citid_ ;

     $nm_select = $updtsql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_detalle_citadiagnos_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
$_SESSION['scriptcase']['form_detalle_citadiagnos']['contr_erro'] = 'off';
}
function compareFloatNumbers($float1, $float2, $operator)
{
$_SESSION['scriptcase']['form_detalle_citadiagnos']['contr_erro'] = 'on';
  
    $epsilon = 0.00001;  
      
    $float1 = (float)$float1;  
    $float2 = (float)$float2;  
      
    switch ($operator)  
    {  
        case "=":  
        case "eq":  
        {  
            if (abs($float1 - $float2) < $epsilon) {  
                return true;  
            }  
            break;    
        }  
        case "<":  
        case "lt":  
        {  
            if (abs($float1 - $float2) < $epsilon) {  
                return false;  
            }  
            else  
            {  
                if ($float1 < $float2) {  
                    return true;  
                }  
            }  
            break;    
        }  
        case "<=":  
        case "lte":  
        {  
            if ($this->compareFloatNumbers($float1, $float2, '<') || $this->compareFloatNumbers($float1, $float2, '=')) {  
                return true;  
            }  
            break;    
        }  
        case ">":  
        case "gt":  
        {  
            if (abs($float1 - $float2) < $epsilon) {  
                return false;  
            }  
            else  
            {  
                if ($float1 > $float2) {  
                    return true;  
                }  
            }  
            break;    
        }  
        case ">=":  
        case "gte":  
        {  
            if ($this->compareFloatNumbers($float1, $float2, '>') || $this->compareFloatNumbers($float1, $float2, '=')) {  
                return true;  
            }  
            break;    
        }  
        case "<>":  
        case "!=":  
        case "ne":  
        {  
            if (abs($float1 - $float2) > $epsilon) {  
                return true;  
            }  
            break;    
        }  
        default:  
        {  
            die("Unknown operator '".$operator."' in $this->compareFloatNumbers()");     
        }  
    }  
      
    return false;  


$_SESSION['scriptcase']['form_detalle_citadiagnos']['contr_erro'] = 'off';
}
function dcdcantidad__onChange()
{
$_SESSION['scriptcase']['form_detalle_citadiagnos']['contr_erro'] = 'on';
  
$original_dcdprecio_ = $this->dcdprecio_;
$original_dcdcantidad_ = $this->dcdcantidad_;
$original_dcdporcendesc_ = $this->dcdporcendesc_;
$original_dcdtotal_ = $this->dcdtotal_;

$subtotal=$this->dcdprecio_ *$this->dcdcantidad_ ;

$valordscto=($this->dcdporcendesc_ *$subtotal)/100;

$this->dcdtotal_ =$subtotal-$valordscto;

$modificado_dcdprecio_ = $this->dcdprecio_;
$modificado_dcdcantidad_ = $this->dcdcantidad_;
$modificado_dcdporcendesc_ = $this->dcdporcendesc_;
$modificado_dcdtotal_ = $this->dcdtotal_;
$this->nm_formatar_campos('dcdprecio_', 'dcdcantidad_', 'dcdporcendesc_', 'dcdtotal_');
$this->nmgp_refresh_fields = array();
if ($original_dcdprecio_ !== $modificado_dcdprecio_ || isset($this->nmgp_cmp_readonly['dcdprecio_']) || (isset($bFlagRead_dcdprecio_) && $bFlagRead_dcdprecio_))
{
    $this->nmgp_refresh_fields[] = 'dcdprecio_';
    $this->NM_ajax_changed['dcdprecio_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dcdcantidad_ !== $modificado_dcdcantidad_ || isset($this->nmgp_cmp_readonly['dcdcantidad_']) || (isset($bFlagRead_dcdcantidad_) && $bFlagRead_dcdcantidad_))
{
    $this->nmgp_refresh_fields[] = 'dcdcantidad_';
    $this->NM_ajax_changed['dcdcantidad_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dcdporcendesc_ !== $modificado_dcdporcendesc_ || isset($this->nmgp_cmp_readonly['dcdporcendesc_']) || (isset($bFlagRead_dcdporcendesc_) && $bFlagRead_dcdporcendesc_))
{
    $this->nmgp_refresh_fields[] = 'dcdporcendesc_';
    $this->NM_ajax_changed['dcdporcendesc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dcdtotal_ !== $modificado_dcdtotal_ || isset($this->nmgp_cmp_readonly['dcdtotal_']) || (isset($bFlagRead_dcdtotal_) && $bFlagRead_dcdtotal_))
{
    $this->nmgp_refresh_fields[] = 'dcdtotal_';
    $this->NM_ajax_changed['dcdtotal_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'dcdcantidad';
form_detalle_citadiagnos_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_detalle_citadiagnos']['contr_erro'] = 'off';
}
function dcdporcendesc__onChange()
{
$_SESSION['scriptcase']['form_detalle_citadiagnos']['contr_erro'] = 'on';
  
$original_dcdprecio_ = $this->dcdprecio_;
$original_dcdcantidad_ = $this->dcdcantidad_;
$original_dcdporcendesc_ = $this->dcdporcendesc_;
$original_dcdtotal_ = $this->dcdtotal_;

$subtotal=$this->dcdprecio_ *$this->dcdcantidad_ ;

$valordscto=($this->dcdporcendesc_ *$subtotal)/100;

$this->dcdtotal_ =$subtotal-$valordscto;

$modificado_dcdprecio_ = $this->dcdprecio_;
$modificado_dcdcantidad_ = $this->dcdcantidad_;
$modificado_dcdporcendesc_ = $this->dcdporcendesc_;
$modificado_dcdtotal_ = $this->dcdtotal_;
$this->nm_formatar_campos('dcdprecio_', 'dcdcantidad_', 'dcdporcendesc_', 'dcdtotal_');
$this->nmgp_refresh_fields = array();
if ($original_dcdprecio_ !== $modificado_dcdprecio_ || isset($this->nmgp_cmp_readonly['dcdprecio_']) || (isset($bFlagRead_dcdprecio_) && $bFlagRead_dcdprecio_))
{
    $this->nmgp_refresh_fields[] = 'dcdprecio_';
    $this->NM_ajax_changed['dcdprecio_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dcdcantidad_ !== $modificado_dcdcantidad_ || isset($this->nmgp_cmp_readonly['dcdcantidad_']) || (isset($bFlagRead_dcdcantidad_) && $bFlagRead_dcdcantidad_))
{
    $this->nmgp_refresh_fields[] = 'dcdcantidad_';
    $this->NM_ajax_changed['dcdcantidad_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dcdporcendesc_ !== $modificado_dcdporcendesc_ || isset($this->nmgp_cmp_readonly['dcdporcendesc_']) || (isset($bFlagRead_dcdporcendesc_) && $bFlagRead_dcdporcendesc_))
{
    $this->nmgp_refresh_fields[] = 'dcdporcendesc_';
    $this->NM_ajax_changed['dcdporcendesc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dcdtotal_ !== $modificado_dcdtotal_ || isset($this->nmgp_cmp_readonly['dcdtotal_']) || (isset($bFlagRead_dcdtotal_) && $bFlagRead_dcdtotal_))
{
    $this->nmgp_refresh_fields[] = 'dcdtotal_';
    $this->NM_ajax_changed['dcdtotal_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'dcdporcendesc';
form_detalle_citadiagnos_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_detalle_citadiagnos']['contr_erro'] = 'off';
}
function dcdtotal__onChange()
{
$_SESSION['scriptcase']['form_detalle_citadiagnos']['contr_erro'] = 'on';
  
$original_dcdprecio_ = $this->dcdprecio_;
$original_dcdcantidad_ = $this->dcdcantidad_;
$original_dcdporcendesc_ = $this->dcdporcendesc_;
$original_dcdtotal_ = $this->dcdtotal_;

$subtotal=$this->dcdprecio_ *$this->dcdcantidad_ ;

$this->dcdporcendesc_ =100-(($this->dcdtotal_ *100)/$subtotal);

$modificado_dcdprecio_ = $this->dcdprecio_;
$modificado_dcdcantidad_ = $this->dcdcantidad_;
$modificado_dcdporcendesc_ = $this->dcdporcendesc_;
$modificado_dcdtotal_ = $this->dcdtotal_;
$this->nm_formatar_campos('dcdprecio_', 'dcdcantidad_', 'dcdporcendesc_', 'dcdtotal_');
$this->nmgp_refresh_fields = array();
if ($original_dcdprecio_ !== $modificado_dcdprecio_ || isset($this->nmgp_cmp_readonly['dcdprecio_']) || (isset($bFlagRead_dcdprecio_) && $bFlagRead_dcdprecio_))
{
    $this->nmgp_refresh_fields[] = 'dcdprecio_';
    $this->NM_ajax_changed['dcdprecio_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dcdcantidad_ !== $modificado_dcdcantidad_ || isset($this->nmgp_cmp_readonly['dcdcantidad_']) || (isset($bFlagRead_dcdcantidad_) && $bFlagRead_dcdcantidad_))
{
    $this->nmgp_refresh_fields[] = 'dcdcantidad_';
    $this->NM_ajax_changed['dcdcantidad_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dcdporcendesc_ !== $modificado_dcdporcendesc_ || isset($this->nmgp_cmp_readonly['dcdporcendesc_']) || (isset($bFlagRead_dcdporcendesc_) && $bFlagRead_dcdporcendesc_))
{
    $this->nmgp_refresh_fields[] = 'dcdporcendesc_';
    $this->NM_ajax_changed['dcdporcendesc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dcdtotal_ !== $modificado_dcdtotal_ || isset($this->nmgp_cmp_readonly['dcdtotal_']) || (isset($bFlagRead_dcdtotal_) && $bFlagRead_dcdtotal_))
{
    $this->nmgp_refresh_fields[] = 'dcdtotal_';
    $this->NM_ajax_changed['dcdtotal_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'dcdtotal';
form_detalle_citadiagnos_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_detalle_citadiagnos']['contr_erro'] = 'off';
}
function sercodigo__onChange()
{
$_SESSION['scriptcase']['form_detalle_citadiagnos']['contr_erro'] = 'on';
  
$original_sercodigo_ = $this->sercodigo_;
$original_dcdprecio_ = $this->dcdprecio_;
$original_dcdcantidad_ = $this->dcdcantidad_;
$original_dcdporcendesc_ = $this->dcdporcendesc_;
$original_dcdtotal_ = $this->dcdtotal_;

$check_sql = "SELECT serprecio, sersincosto, seriva"
   . " FROM servicio"
   . " WHERE sercodigo = " . $this->sercodigo_ ;
 
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

if (isset($this->rs[0][0]))     
{
    $this->dcdprecio_  = $this->rs[0][0];
    
}

else {
	$this->dcdprecio_  = 0;
	
}

$subtotal=$this->dcdprecio_ *$this->dcdcantidad_ ;

$valordscto=($this->dcdporcendesc_ *$subtotal)/100;

$this->dcdtotal_ =$subtotal-$valordscto;



$modificado_sercodigo_ = $this->sercodigo_;
$modificado_dcdprecio_ = $this->dcdprecio_;
$modificado_dcdcantidad_ = $this->dcdcantidad_;
$modificado_dcdporcendesc_ = $this->dcdporcendesc_;
$modificado_dcdtotal_ = $this->dcdtotal_;
$this->nm_formatar_campos('sercodigo_', 'dcdprecio_', 'dcdcantidad_', 'dcdporcendesc_', 'dcdtotal_');
$this->nmgp_refresh_fields = array();
if ($original_sercodigo_ !== $modificado_sercodigo_ || isset($this->nmgp_cmp_readonly['sercodigo_']) || (isset($bFlagRead_sercodigo_) && $bFlagRead_sercodigo_))
{
    $this->nmgp_refresh_fields[] = 'sercodigo_';
    $this->NM_ajax_changed['sercodigo_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dcdprecio_ !== $modificado_dcdprecio_ || isset($this->nmgp_cmp_readonly['dcdprecio_']) || (isset($bFlagRead_dcdprecio_) && $bFlagRead_dcdprecio_))
{
    $this->nmgp_refresh_fields[] = 'dcdprecio_';
    $this->NM_ajax_changed['dcdprecio_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dcdcantidad_ !== $modificado_dcdcantidad_ || isset($this->nmgp_cmp_readonly['dcdcantidad_']) || (isset($bFlagRead_dcdcantidad_) && $bFlagRead_dcdcantidad_))
{
    $this->nmgp_refresh_fields[] = 'dcdcantidad_';
    $this->NM_ajax_changed['dcdcantidad_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dcdporcendesc_ !== $modificado_dcdporcendesc_ || isset($this->nmgp_cmp_readonly['dcdporcendesc_']) || (isset($bFlagRead_dcdporcendesc_) && $bFlagRead_dcdporcendesc_))
{
    $this->nmgp_refresh_fields[] = 'dcdporcendesc_';
    $this->NM_ajax_changed['dcdporcendesc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dcdtotal_ !== $modificado_dcdtotal_ || isset($this->nmgp_cmp_readonly['dcdtotal_']) || (isset($bFlagRead_dcdtotal_) && $bFlagRead_dcdtotal_))
{
    $this->nmgp_refresh_fields[] = 'dcdtotal_';
    $this->NM_ajax_changed['dcdtotal_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'sercodigo';
form_detalle_citadiagnos_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_detalle_citadiagnos']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_detalle_citadiagnos_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
   if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
   {
        $this->Form_Corpo(true);
   }
   elseif ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
   {
        $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['table_refresh'] = true;
        $this->Form_Table(true);
        $this->Form_Corpo(false, true);
   }
   else
   {
        $this->Form_Init();
        $this->Form_Table();
        $this->Form_Corpo();
        $this->Form_Fim();
   }
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("dcdsecuen_", "citid_", "sercodigo_", "dcdcantidad_", "dcdprecio_", "dcddscto", "dcdtotal_"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['csrf_token'];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_detalle_citadiagnos_pack_ajax_response();
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
              $this->SC_monta_condicao($comando, "dcdsecuen", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "citid", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_sercodigo_($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "sercodigo", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "dcdcantidad", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "dcdprecio", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "dcdtotal", $arg_search, str_replace(",", ".", $data_search));
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_detalle_citadiagnos = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['total'] = $qt_geral_reg_form_detalle_citadiagnos;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_detalle_citadiagnos_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_detalle_citadiagnos_pack_ajax_response();
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
      $nm_numeric[] = "dcdsecuen";$nm_numeric[] = "citid";$nm_numeric[] = "sercodigo";$nm_numeric[] = "dcdcantidad";$nm_numeric[] = "dcdprecio";$nm_numeric[] = "dcdporcendesc";$nm_numeric[] = "dcdtotal";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['decimal_db'] == ".")
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
   function SC_lookup_sercodigo_($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT concat(E.espnombre,' - ',S.sernombre,' - $ ',S.serprecio), S.sercodigo FROM servicio S, especialidad E WHERE (concat(E.espnombre,' - ',S.sernombre,' - $ ',S.serprecio) LIKE '%$campo%') AND (S.espcodigo=E.espcodigo)" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
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
       $nmgp_saida_form = "form_detalle_citadiagnos_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_detalle_citadiagnos_fim.php";
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
       form_detalle_citadiagnos_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['masterValue']);
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
function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $opc="", $alt_modal=430, $larg_modal=630)
{
   if (isset($this->NM_is_redirected) && $this->NM_is_redirected)
   {
       return;
   }
   if (is_array($nm_apl_parms))
   {
       $tmp_parms = "";
       foreach ($nm_apl_parms as $par => $val)
       {
           $par = trim($par);
           $val = trim($val);
           $tmp_parms .= str_replace(".", "_", $par) . "?#?";
           if (substr($val, 0, 1) == "$")
           {
               $tmp_parms .= $$val;
           }
           elseif (substr($val, 0, 1) == "{")
           {
               $val        = substr($val, 1, -1);
               $tmp_parms .= $this->$val;
           }
           elseif (substr($val, 0, 1) == "[")
           {
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos'][substr($val, 1, -1)];
           }
           else
           {
               $tmp_parms .= $val;
           }
           $tmp_parms .= "?@?";
       }
       $nm_apl_parms = $tmp_parms;
   }
   if (empty($opc))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['opc_ant'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_citadiagnos']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           form_detalle_citadiagnos_pack_ajax_response();
           exit;
       }
       echo "<SCRIPT language=\"javascript\">";
       if (strtolower($nm_target) == "_blank")
       {
           echo "window.open ('" . $nm_apl_dest . "');";
           echo "</SCRIPT>";
           return;
       }
       else
       {
           echo "window.location='" . $nm_apl_dest . "';";
           echo "</SCRIPT>";
           $this->NM_close_db();
           exit;
       }
   }
   $dir = explode("/", $nm_apl_dest);
   if (count($dir) == 1)
   {
       $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
       $nm_apl_dest = $this->Ini->path_link . SC_dir_app_name($nm_apl_dest) . "/" . $nm_apl_dest . ".php";
   }
   if ($this->NM_ajax_flag)
   {
       $nm_apl_parms = str_replace("?#?", "*scin", NM_charset_to_utf8($nm_apl_parms));
       $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
       $this->NM_ajax_info['redir']['metodo']     = 'post';
       $this->NM_ajax_info['redir']['action']     = $nm_apl_dest;
       $this->NM_ajax_info['redir']['nmgp_parms'] = $nm_apl_parms;
       $this->NM_ajax_info['redir']['target']     = $nm_target_form;
       $this->NM_ajax_info['redir']['h_modal']    = $alt_modal;
       $this->NM_ajax_info['redir']['w_modal']    = $larg_modal;
       if ($nm_target_form == "_blank")
       {
           $this->NM_ajax_info['redir']['nmgp_outra_jan'] = 'true';
       }
       else
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida']      = $nm_apl_retorno;
           $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       }
       form_detalle_citadiagnos_pack_ajax_response();
       exit;
   }
   if ($nm_target == "modal")
   {
       if (!empty($nm_apl_parms))
       {
           $nm_apl_parms = str_replace("?#?", "*scin", $nm_apl_parms);
           $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
           $nm_apl_parms = "nmgp_parms=" . $nm_apl_parms . "&";
       }
       $par_modal = "?script_case_init=" . $this->Ini->sc_page . "&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&";
       $this->redir_modal = "$(function() { tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
       $this->NM_is_redirected = true;
       return;
   }
   if ($nm_target == "_blank")
   {
?>
<form name="Fredir" method="post" target="_blank" action="<?php echo $nm_apl_dest; ?>">
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
</form>
<script type="text/javascript">
setTimeout(function() { document.Fredir.submit(); }, 250);
</script>
<?php
    return;
   }
?>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
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
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
   </HEAD>
   <BODY>
<?php
   }
?>
<form name="Fredir" method="post" 
                  target="_self"> 
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
<?php
   if ($nm_target_form == "_blank")
   {
?>
  <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
  <input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nm_apl_retorno) ?>">
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
<?php
   }
?>
</form> 
   <SCRIPT type="text/javascript">
<?php
   if ($nm_target_form == "modal")
   {
?>
       $(document).ready(function(){
           tb_show('', '<?php echo $nm_apl_dest ?>?script_case_init=<?php echo $this->Ini->sc_page; ?>&nmgp_url_saida=modal&nmgp_parms=<?php echo $this->form_encode_input($nm_apl_parms); ?>&nmgp_outra_jan=true&TB_iframe=true&height=<?php echo $alt_modal; ?>&width=<?php echo $larg_modal; ?>&modal=true', '');
       });
<?php
   }
   else
   {
?>
    $(function() {
       document.Fredir.target = "<?php echo $nm_target_form ?>"; 
       document.Fredir.action = "<?php echo $nm_apl_dest ?>";
       document.Fredir.submit();
    });
<?php
   }
?>
   </SCRIPT>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
?>
   </BODY>
   </HTML>
<?php
   }
?>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
       $this->NM_close_db();
       exit;
   }
}
    function sc_ajax_javascript($sJsFunc, $aParam = array())
    {
        if ($this->NM_ajax_flag)
        {
            foreach ($aParam as $i => $v)
            {
                $aParam[$i] = NM_charset_to_utf8($v);
            }
            $this->NM_ajax_info['ajaxJavascript'][] = array(NM_charset_to_utf8($sJsFunc), $aParam);
        }
        else
        {
            foreach ($aParam as $i => $v)
            {
                $aParam[$i] = '"' . str_replace('"', '\"', $v) . '"';
            }
            $this->NM_non_ajax_info['ajaxJavascript'][] = array($sJsFunc, $aParam);
        }
    } // sc_ajax_javascript
    function sc_field_readonly($sField, $sStatus, $iSeq = '')
    {
        if ('on' != $sStatus && 'off' != $sStatus)
        {
            return;
        }

        $sFieldDateTime = '';

        $sFlagVar        = 'bFlagRead_' . $sField;
        $this->$sFlagVar = 'on' == $sStatus;

        if (isset($this->nmgp_refresh_row))
        {
            $iSeq = $this->nmgp_refresh_row;
        }

        $this->nmgp_cmp_readonly[$sField]                = $sStatus;
        $this->NM_ajax_info['readOnly'][$sField . $iSeq] = $sStatus;
        if ('' != $sFieldDateTime)
        {
            $this->NM_ajax_info['readOnly'][$sFieldDateTime . $iSeq] = $sStatus;
        }
    } // sc_field_readonly
}
?>
