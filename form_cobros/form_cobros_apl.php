<?php
//
class form_cobros_apl
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
   var $emiruc;
   var $emiruc_1;
   var $cobnumero;
   var $fclnumero;
   var $fclnumero_1;
   var $cobfecha;
   var $cobvalefec;
   var $cobvalcheq;
   var $cobvaltarjcred;
   var $cobvaltransf;
   var $cobvalretfte;
   var $cobvaltotal;
   var $cobnumcheq;
   var $cobbancheq;
   var $tcrcodigo;
   var $tcrcodigo_1;
   var $cobnumtarjcred;
   var $cobbantransf;
   var $cobctatransf;
   var $cobvalcruz;
   var $cobanula;
   var $cobanula_1;
   var $cobfecanula;
   var $cobfecanula_hora;
   var $cobusucrea;
   var $detalle_cobro;
   var $saldo_favor;
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
          if (isset($this->NM_ajax_info['param']['cobanula']))
          {
              $this->cobanula = $this->NM_ajax_info['param']['cobanula'];
          }
          if (isset($this->NM_ajax_info['param']['cobbancheq']))
          {
              $this->cobbancheq = $this->NM_ajax_info['param']['cobbancheq'];
          }
          if (isset($this->NM_ajax_info['param']['cobbantransf']))
          {
              $this->cobbantransf = $this->NM_ajax_info['param']['cobbantransf'];
          }
          if (isset($this->NM_ajax_info['param']['cobctatransf']))
          {
              $this->cobctatransf = $this->NM_ajax_info['param']['cobctatransf'];
          }
          if (isset($this->NM_ajax_info['param']['cobfecha']))
          {
              $this->cobfecha = $this->NM_ajax_info['param']['cobfecha'];
          }
          if (isset($this->NM_ajax_info['param']['cobnumcheq']))
          {
              $this->cobnumcheq = $this->NM_ajax_info['param']['cobnumcheq'];
          }
          if (isset($this->NM_ajax_info['param']['cobnumero']))
          {
              $this->cobnumero = $this->NM_ajax_info['param']['cobnumero'];
          }
          if (isset($this->NM_ajax_info['param']['cobnumtarjcred']))
          {
              $this->cobnumtarjcred = $this->NM_ajax_info['param']['cobnumtarjcred'];
          }
          if (isset($this->NM_ajax_info['param']['cobvalcheq']))
          {
              $this->cobvalcheq = $this->NM_ajax_info['param']['cobvalcheq'];
          }
          if (isset($this->NM_ajax_info['param']['cobvalcruz']))
          {
              $this->cobvalcruz = $this->NM_ajax_info['param']['cobvalcruz'];
          }
          if (isset($this->NM_ajax_info['param']['cobvalefec']))
          {
              $this->cobvalefec = $this->NM_ajax_info['param']['cobvalefec'];
          }
          if (isset($this->NM_ajax_info['param']['cobvalretfte']))
          {
              $this->cobvalretfte = $this->NM_ajax_info['param']['cobvalretfte'];
          }
          if (isset($this->NM_ajax_info['param']['cobvaltarjcred']))
          {
              $this->cobvaltarjcred = $this->NM_ajax_info['param']['cobvaltarjcred'];
          }
          if (isset($this->NM_ajax_info['param']['cobvaltotal']))
          {
              $this->cobvaltotal = $this->NM_ajax_info['param']['cobvaltotal'];
          }
          if (isset($this->NM_ajax_info['param']['cobvaltransf']))
          {
              $this->cobvaltransf = $this->NM_ajax_info['param']['cobvaltransf'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['detalle_cobro']))
          {
              $this->detalle_cobro = $this->NM_ajax_info['param']['detalle_cobro'];
          }
          if (isset($this->NM_ajax_info['param']['emiruc']))
          {
              $this->emiruc = $this->NM_ajax_info['param']['emiruc'];
          }
          if (isset($this->NM_ajax_info['param']['fclnumero']))
          {
              $this->fclnumero = $this->NM_ajax_info['param']['fclnumero'];
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
          if (isset($this->NM_ajax_info['param']['saldo_favor']))
          {
              $this->saldo_favor = $this->NM_ajax_info['param']['saldo_favor'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['tcrcodigo']))
          {
              $this->tcrcodigo = $this->NM_ajax_info['param']['tcrcodigo'];
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
      if (isset($this->v_numerocob) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['v_numerocob'] = $this->v_numerocob;
      }
      if (isset($this->v_nomemisor) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['v_nomemisor'] = $this->v_nomemisor;
      }
      if (isset($_POST["v_numerocob"]) && isset($this->v_numerocob)) 
      {
          $_SESSION['v_numerocob'] = $this->v_numerocob;
      }
      if (isset($_POST["v_nomemisor"]) && isset($this->v_nomemisor)) 
      {
          $_SESSION['v_nomemisor'] = $this->v_nomemisor;
      }
      if (isset($_GET["v_numerocob"]) && isset($this->v_numerocob)) 
      {
          $_SESSION['v_numerocob'] = $this->v_numerocob;
      }
      if (isset($_GET["v_nomemisor"]) && isset($this->v_nomemisor)) 
      {
          $_SESSION['v_nomemisor'] = $this->v_nomemisor;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_cobros']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_cobros']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_cobros']['embutida_parms']);
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
                 nm_limpa_str_form_cobros($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->v_numerocob)) 
          {
              $_SESSION['v_numerocob'] = $this->v_numerocob;
          }
          if (isset($this->v_nomemisor)) 
          {
              $_SESSION['v_nomemisor'] = $this->v_nomemisor;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_cobros']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_cobros']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_cobros']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_cobros']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->v_numerocob)) 
          {
              $_SESSION['v_numerocob'] = $this->v_numerocob;
          }
          if (isset($this->v_nomemisor)) 
          {
              $_SESSION['v_nomemisor'] = $this->v_nomemisor;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_cobros']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_cobros']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_cobros']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_cobros']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_cobros']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_cobros']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_cobros']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_cobros']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_cobros']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_cobros']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_cobros_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_cobros']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_cobros']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_cobros'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_cobros']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_cobros']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_cobros') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_cobros']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " cobro";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_cobros")
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
      $_SESSION['scriptcase']['css_popup']                 = $this->Ini->str_schema_all . "_grid.css";
      $_SESSION['scriptcase']['css_popup_dir']             = $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $_SESSION['scriptcase']['css_btn_popup']             = $this->Ini->Str_btn_form . "/" . $this->Ini->Str_btn_form . ".css";
      $_SESSION['sc_session']['path_third']                = $this->Ini->path_prod . "/third";
      $_SESSION['scriptcase']['bg_btn_popup']['bok']       = nmButtonOutput($this->arr_buttons, "bok_appdiv", "processa(); if (self.parent && self.parent.tb_remove) {self.parent.tb_remove();} ", "processa(); if (self.parent && self.parent.tb_remove) {self.parent.tb_remove();} ", "bok", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");
      $_SESSION['scriptcase']['bg_btn_popup']['btbremove'] = nmButtonOutput($this->arr_buttons, "bsair_appdiv", "self.parent.tb_remove()", "self.parent.tb_remove()", "bsair", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");
      $_SESSION['scriptcase']['sc_tp_pdf']                 = "wkhtmltopdf";
      $_SESSION['scriptcase']['sc_idioma_pdf'] = array();
      $_SESSION['scriptcase']['sc_idioma_pdf']['es'] = array('titulo' => $this->Ini->Nm_lang['lang_pdff_titl'], 'titulo_colunas' => $this->Ini->Nm_lang['lang_btns_clmn_hint'], 'modules' => $this->Ini->Nm_lang['lang_export_modules'], 'mod_grid' => $this->Ini->Nm_lang['lang_export_mod_grid'], 'mod_resume' => $this->Ini->Nm_lang['lang_export_mod_summary'], 'mod_chart' => $this->Ini->Nm_lang['lang_export_mod_chart'], 'tp_imp' => $this->Ini->Nm_lang['lang_pdff_type'], 'color' => $this->Ini->Nm_lang['lang_pdff_colr'], 'econm' => $this->Ini->Nm_lang['lang_pdff_bndw'], 'tp_pap' => $this->Ini->Nm_lang['lang_pdff_pper'], 'carta' => $this->Ini->Nm_lang['lang_pdff_letr'], 'oficio' => $this->Ini->Nm_lang['lang_pdff_legl'], 'customiz' => $this->Ini->Nm_lang['lang_pdff_cstm'], 'alt_papel' => $this->Ini->Nm_lang['lang_pdff_pper_hgth'], 'larg_papel' => $this->Ini->Nm_lang['lang_pdff_pper_wdth'], 'orient' => $this->Ini->Nm_lang['lang_pdff_pper_orie'], 'retrato' => $this->Ini->Nm_lang['lang_pdff_prtr'], 'paisag' => $this->Ini->Nm_lang['lang_pdff_lnds'], 'book' => $this->Ini->Nm_lang['lang_pdff_bkmk'], 'grafico' => $this->Ini->Nm_lang['lang_pdff_chrt'], 'largura' => $this->Ini->Nm_lang['lang_pdff_wdth'], 'fonte' => $this->Ini->Nm_lang['lang_pdff_font'], 'create' => $this->Ini->Nm_lang['lang_pdff_create'], 'sim' => $this->Ini->Nm_lang['lang_pdff_chrt_yess'], 'nao' => $this->Ini->Nm_lang['lang_pdff_chrt_nooo'], 'chart_level' => $this->Ini->Nm_lang['lang_chart_level_groupby'], 'chart_level' => $this->Ini->Nm_lang['lang_chart_level_groupby'], 'group_general' => $this->Ini->Nm_lang['lang_pdff_group_general'], 'group_chart' => $this->Ini->Nm_lang['lang_pdff_group_chart'], 'pdf_res' => $this->Ini->Nm_lang['lang_app_xls_summry'], 'pdf_cons' => $this->Ini->Nm_lang['lang_app_xls_grid'], 'password' => $this->Ini->Nm_lang['lang_app_xls_pswd'], 'page_break' => $this->Ini->Nm_lang['lang_groupby_break_page_pdf'], 'other_options' => $this->Ini->Nm_lang['lang_app_other_options'], 'label_group' => $this->Ini->Nm_lang['lang_pdf_below_groupby'], 'page_label' => $this->Ini->Nm_lang['lang_pdf_all_pages_title'], 'page_header' => $this->Ini->Nm_lang['lang_pdf_all_pages_header'], 'format_zip' => $this->Ini->Nm_lang['lang_export_pdf_zip'], 'cancela' => $this->Ini->Nm_lang['lang_pdff_cncl']);
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['pdf_view'] = false;
      if ($this->nmgp_opcao == "pdf" || $this->nmgp_opcao == "print")
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['pdf_view'] = true;
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opc_ant'] == "novo")
          {
              $this->nmgp_opcao = "novo";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opcao'] = "novo";
          }
          else
          {
              $this->nmgp_opcao = "igual";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opcao'] = "igual";
          }
      } 
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


      $this->arr_buttons['anular']['hint']             = "";
      $this->arr_buttons['anular']['type']             = "button";
      $this->arr_buttons['anular']['value']            = "ANULAR";
      $this->arr_buttons['anular']['display']          = "only_text";
      $this->arr_buttons['anular']['display_position'] = "text_right";
      $this->arr_buttons['anular']['style']            = "default";
      $this->arr_buttons['anular']['image']            = "";


      $_SESSION['scriptcase']['error_icon']['form_cobros']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_cobros'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['new']  = "off";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['insert'] = "off";
      $this->nmgp_botoes['update'] = "off";
      $this->nmgp_botoes['delete'] = "off";
      $this->nmgp_botoes['pdf'] = "on";
      $this->nmgp_botoes['first'] = "off";
      $this->nmgp_botoes['back'] = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last'] = "off";
      $this->nmgp_botoes['summary'] = "off";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['reload'] = "off";
      $this->nmgp_botoes['ANULAR'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cobros']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_cobros'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_cobros'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form'];
          if (!isset($this->emiruc)){$this->emiruc = $this->nmgp_dados_form['emiruc'];} 
          if (!isset($this->cobnumero)){$this->cobnumero = $this->nmgp_dados_form['cobnumero'];} 
          if (!isset($this->cobfecanula)){$this->cobfecanula = $this->nmgp_dados_form['cobfecanula'];} 
          if (!isset($this->cobusucrea)){$this->cobusucrea = $this->nmgp_dados_form['cobusucrea'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_cobros", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
      if (isset($_GET['nm_cal_display']))
      {
          if ($this->Embutida_proc)
          { 
              include_once($this->Ini->path_embutida . 'form_cobros/form_cobros_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_cobros_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_cobros_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_cobros_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_cobros/form_cobros_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_cobros_erro.class.php"); 
      }
      $this->Erro      = new form_cobros_erro();
      $this->Erro->Ini = $this->Ini;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opcao']))
         { 
             if ($this->emiruc != "" || $this->cobnumero != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_cobros']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['ANULAR'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['ANULAR'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['botoes']['ANULAR'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      if ($this->nmgp_opcao == "excluir")
      {
          $GLOBALS['script_case_init'] = $this->Ini->sc_page;
      }
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      if (isset($this->fclnumero)) { $this->nm_limpa_alfa($this->fclnumero); }
      if (isset($this->cobvalefec)) { $this->nm_limpa_alfa($this->cobvalefec); }
      if (isset($this->cobvalcheq)) { $this->nm_limpa_alfa($this->cobvalcheq); }
      if (isset($this->cobvaltarjcred)) { $this->nm_limpa_alfa($this->cobvaltarjcred); }
      if (isset($this->cobvaltransf)) { $this->nm_limpa_alfa($this->cobvaltransf); }
      if (isset($this->cobvalretfte)) { $this->nm_limpa_alfa($this->cobvalretfte); }
      if (isset($this->cobvaltotal)) { $this->nm_limpa_alfa($this->cobvaltotal); }
      if (isset($this->cobnumcheq)) { $this->nm_limpa_alfa($this->cobnumcheq); }
      if (isset($this->cobbancheq)) { $this->nm_limpa_alfa($this->cobbancheq); }
      if (isset($this->tcrcodigo)) { $this->nm_limpa_alfa($this->tcrcodigo); }
      if (isset($this->cobnumtarjcred)) { $this->nm_limpa_alfa($this->cobnumtarjcred); }
      if (isset($this->cobbantransf)) { $this->nm_limpa_alfa($this->cobbantransf); }
      if (isset($this->cobctatransf)) { $this->nm_limpa_alfa($this->cobctatransf); }
      if (isset($this->cobvalcruz)) { $this->nm_limpa_alfa($this->cobvalcruz); }
      if (isset($this->cobanula)) { $this->nm_limpa_alfa($this->cobanula); }
      if (isset($this->detalle_cobro)) { $this->nm_limpa_alfa($this->detalle_cobro); }
      if ($nm_opc_form_php == "formphp")
      { 
          if ($nm_call_php == "ANULAR")
          { 
              $this->sc_btn_ANULAR();
          } 
          $this->NM_close_db(); 
          exit;
      } 
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- cobfecha
      $this->field_config['cobfecha']                 = array();
      $this->field_config['cobfecha']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['cobfecha']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['cobfecha']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'cobfecha');
      //-- cobvalefec
      $this->field_config['cobvalefec']               = array();
      $this->field_config['cobvalefec']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['cobvalefec']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['cobvalefec']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['cobvalefec']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['cobvalefec']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['cobvalefec']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- cobvalcheq
      $this->field_config['cobvalcheq']               = array();
      $this->field_config['cobvalcheq']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['cobvalcheq']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['cobvalcheq']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['cobvalcheq']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['cobvalcheq']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['cobvalcheq']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- cobvaltarjcred
      $this->field_config['cobvaltarjcred']               = array();
      $this->field_config['cobvaltarjcred']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['cobvaltarjcred']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['cobvaltarjcred']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['cobvaltarjcred']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['cobvaltarjcred']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['cobvaltarjcred']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- cobvaltransf
      $this->field_config['cobvaltransf']               = array();
      $this->field_config['cobvaltransf']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['cobvaltransf']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['cobvaltransf']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['cobvaltransf']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['cobvaltransf']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['cobvaltransf']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- cobvalretfte
      $this->field_config['cobvalretfte']               = array();
      $this->field_config['cobvalretfte']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['cobvalretfte']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['cobvalretfte']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['cobvalretfte']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['cobvalretfte']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['cobvalretfte']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- cobvaltotal
      $this->field_config['cobvaltotal']               = array();
      $this->field_config['cobvaltotal']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['cobvaltotal']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['cobvaltotal']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['cobvaltotal']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['cobvaltotal']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['cobvaltotal']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- cobvalcruz
      $this->field_config['cobvalcruz']               = array();
      $this->field_config['cobvalcruz']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['cobvalcruz']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['cobvalcruz']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['cobvalcruz']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['cobvalcruz']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['cobvalcruz']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- saldo_favor
      $this->field_config['saldo_favor']               = array();
      $this->field_config['saldo_favor']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['saldo_favor']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['saldo_favor']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['saldo_favor']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['saldo_favor']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['saldo_favor']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- cobnumero
      $this->field_config['cobnumero']               = array();
      $this->field_config['cobnumero']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cobnumero']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cobnumero']['symbol_dec'] = '';
      $this->field_config['cobnumero']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cobnumero']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- cobfecanula
      $this->field_config['cobfecanula']                 = array();
      $this->field_config['cobfecanula']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['cobfecanula']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['cobfecanula']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['cobfecanula']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'cobfecanula');
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
          if ('validate_fclnumero' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclnumero');
          }
          if ('validate_cobfecha' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cobfecha');
          }
          if ('validate_cobvalefec' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cobvalefec');
          }
          if ('validate_cobvalcheq' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cobvalcheq');
          }
          if ('validate_cobvaltarjcred' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cobvaltarjcred');
          }
          if ('validate_cobvaltransf' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cobvaltransf');
          }
          if ('validate_cobvalretfte' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cobvalretfte');
          }
          if ('validate_cobvaltotal' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cobvaltotal');
          }
          if ('validate_cobvalcruz' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cobvalcruz');
          }
          if ('validate_saldo_favor' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'saldo_favor');
          }
          if ('validate_cobanula' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cobanula');
          }
          if ('validate_cobnumcheq' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cobnumcheq');
          }
          if ('validate_cobbancheq' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cobbancheq');
          }
          if ('validate_tcrcodigo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tcrcodigo');
          }
          if ('validate_cobnumtarjcred' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cobnumtarjcred');
          }
          if ('validate_cobbantransf' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cobbantransf');
          }
          if ('validate_cobctatransf' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cobctatransf');
          }
          if ('validate_detalle_cobro' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'detalle_cobro');
          }
          form_cobros_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_cobros_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_cobros']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_cobros_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_evento == "update")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_evento == "delete")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_cobros_pack_ajax_response();
          exit;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['pdf_view'])
      { 
          if (in_array(trim($this->Ini->str_lang), $this->Ini->nm_font_ttf) && strtolower($_SESSION['scriptcase']['charset']) != "utf-8")
          { 
              $_SESSION['scriptcase']['charset_html'] = "utf-8";
          }
          ob_start();
      } 
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          form_cobros_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['pdf_view'])
      { 
          $this->NM_pdf_output();
      } 
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
//
//--------------------------------------------------------------------------------------
   function NM_pdf_output()
   {
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['pdf_view'])
      { 
          $arq_pdf_in = $this->Ini->root . $this->Ini->path_imag_temp . "/sc_form_cobros_html_" . session_id() . ".html";
          $url_pdf_in = $this->Ini->server_pdf . $this->Ini->path_imag_temp . "/sc_form_cobros_html_" . session_id() . ".html";
          $str_htm    =  ob_get_contents();
          ob_end_clean();
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['prt_view'])
          { 
              if (isset($this->nmgp_password) && $this->nmgp_password != "")
              { 
                  $arq_prt_base = "/sc_form_cobros_html_" . session_id() . ".html";
                  $arq_htm    =  fopen($arq_pdf_in, 'w');
                  fwrite($arq_htm, $str_htm); 
                  fclose($arq_htm);
                  $this->html_export_print($arq_prt_base, $this->nmgp_password);
                  exit;
              } 
              else 
              { 
                  echo $str_htm ;
                  exit;
              } 
          } 
          $arq_htm    =  fopen($arq_pdf_in, 'w');
          if (in_array(trim($this->Ini->str_lang), $this->Ini->nm_font_ttf) && strtolower($_SESSION['scriptcase']['charset']) != "utf-8")
          { 
              $_SESSION['scriptcase']['charset_html'] = (isset($this->Ini->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->Ini->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
              $str_htm = sc_convert_encoding($str_htm, "UTF-8",$_SESSION['scriptcase']['charset']);
          }
          fwrite($arq_htm, $str_htm); 
          fclose($arq_htm);
          $nm_arquivo_pdf_base = "/sc_pdf_" . date("YmdHis") . "_" . rand(0, 1000) . "form_cobros";
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['pdf_name']))
          {
              $nm_arquivo_pdf_base = str_replace(".pdf", "", $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['pdf_name']);
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['pdf_name']);
          }
          $nm_arquivo_pdf_url  = $this->Ini->path_imag_temp . $nm_arquivo_pdf_base . ".pdf";
          $nm_arquivo_pdf_serv = $this->Ini->root . $nm_arquivo_pdf_url;
          if (isset($this->nmgp_parms_pdf) && !empty($this->nmgp_parms_pdf))
          {
              $str_pd4ml    = $this->nmgp_parms_pdf;;
          }
          else
          {
              $str_pd4ml    = " --page-size A4 --orientation Portrait";
          }
          $arq_pdf_out  = (FALSE !== strpos($nm_arquivo_pdf_serv, ' ')) ? " \"$nm_arquivo_pdf_serv\"" : " $nm_arquivo_pdf_serv";
          $url_pdf_in   = (FALSE !== strpos($url_pdf_in, ' ')) ? " \"$url_pdf_in\"" : " $url_pdf_in";
          $Win_autentication = "";
          if (isset($_SESSION['sc_pdf_usr']) && !empty($_SESSION['sc_pdf_usr']))
          {
              $_SESSION['sc_iis_usr'] = $_SESSION['sc_pdf_usr'];
          }
          if (isset($_SESSION['sc_iis_usr']) && !empty($_SESSION['sc_iis_usr']))
          {
              $Win_autentication .= " --username " . $_SESSION['sc_iis_usr'];
          }
          if (isset($_SESSION['sc_pdf_pw']) && !empty($_SESSION['sc_pdf_pw']))
          {
              $_SESSION['sc_iis_pw'] = $_SESSION['sc_pdf_pw'];
          }
          if (isset($_SESSION['sc_iis_pw']) && !empty($_SESSION['sc_iis_pw']))
          {
              $Win_autentication .= " --password " . $_SESSION['sc_iis_pw'];
          }
          if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
          {
              chdir($this->Ini->path_third . "/wkhtmltopdf/win");
              $str_execcmd = 'wkhtmltopdf ' . $str_pd4ml . $Win_autentication . '  ' . $url_pdf_in . ' ' . $arq_pdf_out;
          }
          elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
          {
              if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
              {
                  if (FALSE !== strpos(php_uname(), 'Debian 4.19')) 
                  {
                      chdir($this->Ini->path_third . "/wkhtmltopdf/buster");
                  }
                  elseif (FALSE !== strpos(php_uname(), 'Debian 4.9')) 
                  {
                      chdir($this->Ini->path_third . "/wkhtmltopdf/stretch");
                  }
                  else
                  {
                      chdir($this->Ini->path_third . "/wkhtmltopdf/linux-i386");
                  }
                  $str_execcmd = './wkhtmltopdf-i386 ' . $str_pd4ml . $Win_autentication . '  ' . $url_pdf_in . ' ' . $arq_pdf_out;
              }
              else
              {
                  if (FALSE !== strpos(php_uname(), 'Debian 4.19')) 
                  {
                      chdir($this->Ini->path_third . "/wkhtmltopdf/buster");
                  }
                  elseif (FALSE !== strpos(php_uname(), 'Debian 4.9')) 
                  {
                      chdir($this->Ini->path_third . "/wkhtmltopdf/stretch");
                  }
                  else
                  {
                      chdir($this->Ini->path_third . "/wkhtmltopdf/linux-amd64");
                  }
                  $str_execcmd = './wkhtmltopdf-amd64 ' . $str_pd4ml . $Win_autentication . '  ' . $url_pdf_in . ' ' . $arq_pdf_out;
              }
          }
          elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin')) 
          {
              chdir($this->Ini->path_third . "/wkhtmltopdf/osx/Contents/MacOS");
              $str_execcmd = './wkhtmltopdf ' . $str_pd4ml . $Win_autentication . '  ' . $url_pdf_in . ' ' . $arq_pdf_out;
          }
          $arr_execcmd = array();
          exec($str_execcmd);
          $str_cmd_qpdf = "";
          $str_zip      = "";
          // ----- PDF log
          $fp = @fopen($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_pdf_base . '.log', 'w');
          if ($fp)
          {
              @fwrite($fp, $str_execcmd . "\r\n\r\n");
              @fwrite($fp, implode("\r\n", $arr_execcmd));
              @fwrite($fp, $str_cmd_qpdf . "\r\n\r\n");
              @fwrite($fp, $str_zip . "\r\n\r\n");
              @fclose($fp);
          }
          $NM_tit_doc = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['pdf_name'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['pdf_name'] : "form_cobros";
          if (isset($this->pdf_zip) && $this->pdf_zip == "S")
          {
              $nm_arquivo_pdf_url = str_replace(".pdf", ".zip", $nm_arquivo_pdf_url);
              $NM_tit_doc_x = $NM_tit_doc . ".zip";
          }
          else
          {
              $NM_tit_doc_x = $NM_tit_doc . ".pdf";
          }
          $path_doc_md5 = md5($nm_arquivo_pdf_url);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros'][$path_doc_md5][0] = $nm_arquivo_pdf_url;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros'][$path_doc_md5][1] = $NM_tit_doc_x;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " cobro") ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" /> 
  <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
</HEAD>
<BODY class="scExportPage">
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: top">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">PDF</td>
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
<form name="Fview" method="get" action="<?php echo  $this->form_encode_input($nm_arquivo_pdf_url) ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="form_cobros_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_cobros"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="./"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nmgp_opcao" value="<?php echo $this->nmgp_opcao ?>"> 
</form> 
         </BODY>
         </HTML>
<?php
          exit;
      } 
   }
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_cobros.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " cobro") ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
<form name="Fdown" method="get" action="form_cobros_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_cobros"> 
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
   function sc_btn_ANULAR() 
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;
 
     ob_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
 <head>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

      if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
      {
?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
      }

?>
        <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
    <SCRIPT type="text/javascript">
      var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
      var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
      var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
      var sc_userSweetAlertDisplayed = false;
    </SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
    <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
    <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 </head>
  <body class="scFormPage">
      <table class="scFormTabela" align="center"><tr><td>
<?php
      $varloc_btn_php = array();
      $nmgp_opcao_saida_php = "igual";
      $nmgp_opc_ant_saida_php = "";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      else
      {
          if (!isset($this->saldo_favor) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['saldo_favor']))
          {
              $varloc_btn_php['saldo_favor'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['saldo_favor'];
          }
          if (!isset($this->emiruc) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['emiruc']))
          {
              $varloc_btn_php['emiruc'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['emiruc'];
          }
          if (!isset($this->cobnumero) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['cobnumero']))
          {
              $varloc_btn_php['cobnumero'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['cobnumero'];
          }
          if (!isset($this->emiruc) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['emiruc']))
          {
              $varloc_btn_php['emiruc'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['emiruc'];
          }
          if (!isset($this->cobnumero) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['cobnumero']))
          {
              $varloc_btn_php['cobnumero'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['cobnumero'];
          }
          if (!isset($this->emiruc) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['emiruc']))
          {
              $varloc_btn_php['emiruc'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['emiruc'];
          }
          if (!isset($this->cobnumero) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['cobnumero']))
          {
              $varloc_btn_php['cobnumero'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['cobnumero'];
          }
          if (!isset($this->ds) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['ds']))
          {
              $varloc_btn_php['ds'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['ds'];
          }
          if (!isset($this->emiruc) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['emiruc']))
          {
              $varloc_btn_php['emiruc'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['emiruc'];
          }
          if (!isset($this->cobnumero) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['cobnumero']))
          {
              $varloc_btn_php['cobnumero'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['cobnumero'];
          }
          if (!isset($this->emiruc) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['emiruc']))
          {
              $varloc_btn_php['emiruc'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['emiruc'];
          }
          if (!isset($this->cobnumero) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['cobnumero']))
          {
              $varloc_btn_php['cobnumero'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['cobnumero'];
          }
          if (!isset($this->emiruc) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['emiruc']))
          {
              $varloc_btn_php['emiruc'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['emiruc'];
          }
          if (!isset($this->cobnumero) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['cobnumero']))
          {
              $varloc_btn_php['cobnumero'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['cobnumero'];
          }
          if (!isset($this->ds) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['ds']))
          {
              $varloc_btn_php['ds'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['ds'];
          }
          if (!isset($this->emiruc) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['emiruc']))
          {
              $varloc_btn_php['emiruc'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['emiruc'];
          }
          if (!isset($this->cobnumero) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['cobnumero']))
          {
              $varloc_btn_php['cobnumero'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form']['cobnumero'];
          }
      }
      $nm_f_saida = "./";
      nm_limpa_data($this->cobfecha, $this->field_config['cobfecha']['date_sep']) ; 
      if (!empty($this->field_config['cobvalefec']['symbol_dec']))
      {
          $this->sc_remove_currency($this->cobvalefec, $this->field_config['cobvalefec']['symbol_dec'], $this->field_config['cobvalefec']['symbol_grp'], $this->field_config['cobvalefec']['symbol_mon']); 
          nm_limpa_valor($this->cobvalefec, $this->field_config['cobvalefec']['symbol_dec'], $this->field_config['cobvalefec']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['cobvalcheq']['symbol_dec']))
      {
          $this->sc_remove_currency($this->cobvalcheq, $this->field_config['cobvalcheq']['symbol_dec'], $this->field_config['cobvalcheq']['symbol_grp'], $this->field_config['cobvalcheq']['symbol_mon']); 
          nm_limpa_valor($this->cobvalcheq, $this->field_config['cobvalcheq']['symbol_dec'], $this->field_config['cobvalcheq']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['cobvaltarjcred']['symbol_dec']))
      {
          $this->sc_remove_currency($this->cobvaltarjcred, $this->field_config['cobvaltarjcred']['symbol_dec'], $this->field_config['cobvaltarjcred']['symbol_grp'], $this->field_config['cobvaltarjcred']['symbol_mon']); 
          nm_limpa_valor($this->cobvaltarjcred, $this->field_config['cobvaltarjcred']['symbol_dec'], $this->field_config['cobvaltarjcred']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['cobvaltransf']['symbol_dec']))
      {
          $this->sc_remove_currency($this->cobvaltransf, $this->field_config['cobvaltransf']['symbol_dec'], $this->field_config['cobvaltransf']['symbol_grp'], $this->field_config['cobvaltransf']['symbol_mon']); 
          nm_limpa_valor($this->cobvaltransf, $this->field_config['cobvaltransf']['symbol_dec'], $this->field_config['cobvaltransf']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['cobvalretfte']['symbol_dec']))
      {
          $this->sc_remove_currency($this->cobvalretfte, $this->field_config['cobvalretfte']['symbol_dec'], $this->field_config['cobvalretfte']['symbol_grp'], $this->field_config['cobvalretfte']['symbol_mon']); 
          nm_limpa_valor($this->cobvalretfte, $this->field_config['cobvalretfte']['symbol_dec'], $this->field_config['cobvalretfte']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['cobvaltotal']['symbol_dec']))
      {
          $this->sc_remove_currency($this->cobvaltotal, $this->field_config['cobvaltotal']['symbol_dec'], $this->field_config['cobvaltotal']['symbol_grp'], $this->field_config['cobvaltotal']['symbol_mon']); 
          nm_limpa_valor($this->cobvaltotal, $this->field_config['cobvaltotal']['symbol_dec'], $this->field_config['cobvaltotal']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['cobvalcruz']['symbol_dec']))
      {
          $this->sc_remove_currency($this->cobvalcruz, $this->field_config['cobvalcruz']['symbol_dec'], $this->field_config['cobvalcruz']['symbol_grp'], $this->field_config['cobvalcruz']['symbol_mon']); 
          nm_limpa_valor($this->cobvalcruz, $this->field_config['cobvalcruz']['symbol_dec'], $this->field_config['cobvalcruz']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['saldo_favor']['symbol_dec']))
      {
          $this->sc_remove_currency($this->saldo_favor, $this->field_config['saldo_favor']['symbol_dec'], $this->field_config['saldo_favor']['symbol_grp'], $this->field_config['saldo_favor']['symbol_mon']); 
          nm_limpa_valor($this->saldo_favor, $this->field_config['saldo_favor']['symbol_dec'], $this->field_config['saldo_favor']['symbol_grp']) ; 
      }
      $this->nm_converte_datas();
      foreach ($varloc_btn_php as $cmp => $val_cmp)
      {
          $this->$cmp = $val_cmp;
      }
      $_SESSION['scriptcase']['form_cobros']['contr_erro'] = 'on';
  $tiene_docb=$this->compareFloatNumbers($this->saldo_favor ,0,">");
$fecha_actual=date('Y-m-d H:i:s');

if($tiene_docb) {
	
	$sql="select cxcvalini, cxcvalpen from cuentasxcobrar where emiruc='".$this->emiruc ."' and cxctipodoc='B' and cxcnumdoc='".$this->cobnumero ."'";
	 
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
	
	$diffval=$this->ds[0][0]-$this->ds[0][1];
	
	if($this->compareFloatNumbers($diffval,0,">")) {
		
		$sql="select max(D.cobnumero) from detalle_cobro D, cobros C where C.emiruc=D.cobemiruc and C.cobnumero=D.cobnumero and C.cobanula=0 and D.cobnumero>0 and D.cxcemiruc='".$this->emiruc ."' and D.cxctipodoc='B' and D.cxcnumdoc='".$this->cobnumero ."'";
		 
      $nm_select = $sql; 
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
		
		echo "<center style='color:red'>No se puede anular porque el saldo a favor generado en este cobro fue utilizado en el cobro No. ".$this->ps[0][0]."</center>";
	}
	
	else {
		if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco)
{
    $this->Ini->sc_tem_trans_banco = $this->Db->BeginTrans();
}

		$sql="SELECT decvalabono, cxcemiruc, cxctipodoc, cxcnumdoc, decvalretfte FROM detalle_cobro WHERE cobemiruc='".$this->emiruc ."' AND cobnumero=".$this->cobnumero ;
		 
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

		foreach($this->ds  as $detcobro) {

			$updtcxc="UPDATE cuentasxcobrar SET cxcvalpen=cxcvalpen+".$detcobro[0]." WHERE emiruc='".$detcobro[1]."' AND cxctipodoc='".$detcobro[2]."' AND cxcnumdoc='".$detcobro[3]."' AND cxcvalretfte=cxcvalretfte-".$detcobro[4];
			
     $nm_select = $updtcxc; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_cobros_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

		}

		$updtcob="UPDATE cobros SET cobanula=1, cobfecanula='".$fecha_actual."' WHERE emiruc='".$this->emiruc ."' AND cobnumero=".$this->cobnumero ;
		
     $nm_select = $updtcob; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_cobros_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		
		$updtcxcb="update cuentasxcobrar set cxcanulado=1 where emiruc='".$this->emiruc ."' and cxctipodoc='B' and cxcnumdoc='".$this->cobnumero ."'";
		
     $nm_select = $updtcxcb; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_cobros_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

		
		echo "<center style='color:green'>Cobro anulado exitosamente.</center>";
		
	}
}

else {
	if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco)
{
    $this->Ini->sc_tem_trans_banco = $this->Db->BeginTrans();
}

	$sql="SELECT decvalabono, cxcemiruc, cxctipodoc, cxcnumdoc, decvalretfte FROM detalle_cobro WHERE cobemiruc='".$this->emiruc ."' AND cobnumero=".$this->cobnumero ;
	 
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
	
	foreach($this->ds  as $detcobro) {
		
		$updtcxc="UPDATE cuentasxcobrar SET cxcvalpen=cxcvalpen+".$detcobro[0]." WHERE emiruc='".$detcobro[1]."' AND cxctipodoc='".$detcobro[2]."' AND cxcnumdoc='".$detcobro[3]."' AND cxcvalretfte=cxcvalretfte-".$detcobro[4];
		
     $nm_select = $updtcxc; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_cobros_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		
	}
	
	$updtcob="UPDATE cobros SET cobanula=1, cobfecanula='".$fecha_actual."' WHERE emiruc='".$this->emiruc ."' AND cobnumero=".$this->cobnumero ;
	
     $nm_select = $updtcob; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_cobros_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	
	if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

	echo "<center style='color:green'>Cobro anulado exitosamente.</center>";
}
$_SESSION['scriptcase']['form_cobros']['contr_erro'] = 'off'; 
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="emiruc" value="<?php echo $this->form_encode_input($this->emiruc) ?>"/>
      <input type=hidden name="cobnumero" value="<?php echo $this->form_encode_input($this->cobnumero) ?>"/>
      <input type=hidden name="nmgp_opcao" value="<?php echo $this->form_encode_input($nmgp_opcao_saida_php); ?>"/>
      <input type=hidden name="nmgp_opc_ant" value="<?php echo $this->form_encode_input($nmgp_opc_ant_saida_php); ?>"/>
      <input type=submit name="nmgp_bok" value="<?php echo $this->Ini->Nm_lang['lang_btns_cfrm'] ?>"/>
      </form>
      </td></tr></table>
      </body>
      </html>
<?php
       if (isset($this->redir_modal) && !empty($this->redir_modal))
       {
           echo "<script type=\"text/javascript\">" . $this->redir_modal . "</script>";
           $this->redir_modal = "";
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
           case 'fclnumero':
               return "PACIENTE";
               break;
           case 'cobfecha':
               return "FECHA";
               break;
           case 'cobvalefec':
               return "VALOR EFECTIVO";
               break;
           case 'cobvalcheq':
               return "VALOR CHEQUE";
               break;
           case 'cobvaltarjcred':
               return "VALOR TARJ. CRÉDITO";
               break;
           case 'cobvaltransf':
               return "VALOR TRANSFER.";
               break;
           case 'cobvalretfte':
               return "VALOR RET. FUENTE";
               break;
           case 'cobvaltotal':
               return "VALOR TOTAL";
               break;
           case 'cobvalcruz':
               return "VALOR CRUZADO";
               break;
           case 'saldo_favor':
               return "SALDO A FAVOR";
               break;
           case 'cobanula':
               return "ANULADO";
               break;
           case 'cobnumcheq':
               return "No. CHEQUE";
               break;
           case 'cobbancheq':
               return "BANCO CHEQUE";
               break;
           case 'tcrcodigo':
               return "TIP. TARJ. CRÉD.";
               break;
           case 'cobnumtarjcred':
               return "No. TARJ. CRÉD.";
               break;
           case 'cobbantransf':
               return "BANCO TRANSFER.";
               break;
           case 'cobctatransf':
               return "No. CTA. TRANSFER.";
               break;
           case 'detalle_cobro':
               return "DETALLE";
               break;
           case 'emiruc':
               return "EMISOR";
               break;
           case 'cobnumero':
               return "NÚMERO";
               break;
           case 'cobfecanula':
               return "FECHA ANULACIÓN";
               break;
           case 'cobusucrea':
               return "USUARIO CREACIÓN";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_cobros']) || !is_array($this->NM_ajax_info['errList']['geral_form_cobros']))
              {
                  $this->NM_ajax_info['errList']['geral_form_cobros'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_cobros'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'fclnumero' == $filtro)
        $this->ValidateField_fclnumero($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cobfecha' == $filtro)
        $this->ValidateField_cobfecha($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cobvalefec' == $filtro)
        $this->ValidateField_cobvalefec($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cobvalcheq' == $filtro)
        $this->ValidateField_cobvalcheq($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cobvaltarjcred' == $filtro)
        $this->ValidateField_cobvaltarjcred($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cobvaltransf' == $filtro)
        $this->ValidateField_cobvaltransf($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cobvalretfte' == $filtro)
        $this->ValidateField_cobvalretfte($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cobvaltotal' == $filtro)
        $this->ValidateField_cobvaltotal($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cobvalcruz' == $filtro)
        $this->ValidateField_cobvalcruz($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'saldo_favor' == $filtro)
        $this->ValidateField_saldo_favor($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cobanula' == $filtro)
        $this->ValidateField_cobanula($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cobnumcheq' == $filtro)
        $this->ValidateField_cobnumcheq($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cobbancheq' == $filtro)
        $this->ValidateField_cobbancheq($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tcrcodigo' == $filtro)
        $this->ValidateField_tcrcodigo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cobnumtarjcred' == $filtro)
        $this->ValidateField_cobnumtarjcred($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cobbantransf' == $filtro)
        $this->ValidateField_cobbantransf($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cobctatransf' == $filtro)
        $this->ValidateField_cobctatransf($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'detalle_cobro' == $filtro)
        $this->ValidateField_detalle_cobro($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---
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

    function ValidateField_fclnumero(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if ($this->nmgp_opcao == "incluir")
   {
      if ($this->fclnumero == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['php_cmp_required']['fclnumero']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['php_cmp_required']['fclnumero'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "PACIENTE" ; 
          if (!isset($Campos_Erros['fclnumero']))
          {
              $Campos_Erros['fclnumero'] = array();
          }
          $Campos_Erros['fclnumero'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['fclnumero']) || !is_array($this->NM_ajax_info['errList']['fclnumero']))
          {
              $this->NM_ajax_info['errList']['fclnumero'] = array();
          }
          $this->NM_ajax_info['errList']['fclnumero'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->fclnumero) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_fclnumero']) && !in_array($this->fclnumero, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_fclnumero']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['fclnumero']))
              {
                  $Campos_Erros['fclnumero'] = array();
              }
              $Campos_Erros['fclnumero'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['fclnumero']) || !is_array($this->NM_ajax_info['errList']['fclnumero']))
              {
                  $this->NM_ajax_info['errList']['fclnumero'] = array();
              }
              $this->NM_ajax_info['errList']['fclnumero'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
   }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclnumero';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclnumero

    function ValidateField_cobfecha(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->cobfecha, $this->field_config['cobfecha']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao == "incluir")
      { 
          $guarda_datahora = $this->field_config['cobfecha']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['cobfecha']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['cobfecha']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['cobfecha']['date_sep']) ; 
          if (trim($this->cobfecha) != "")  
          { 
              if ($teste_validade->Data($this->cobfecha, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "FECHA; " ; 
                  if (!isset($Campos_Erros['cobfecha']))
                  {
                      $Campos_Erros['cobfecha'] = array();
                  }
                  $Campos_Erros['cobfecha'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cobfecha']) || !is_array($this->NM_ajax_info['errList']['cobfecha']))
                  {
                      $this->NM_ajax_info['errList']['cobfecha'] = array();
                  }
                  $this->NM_ajax_info['errList']['cobfecha'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['php_cmp_required']['cobfecha']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['php_cmp_required']['cobfecha'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "FECHA" ; 
              if (!isset($Campos_Erros['cobfecha']))
              {
                  $Campos_Erros['cobfecha'] = array();
              }
              $Campos_Erros['cobfecha'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['cobfecha']) || !is_array($this->NM_ajax_info['errList']['cobfecha']))
                  {
                      $this->NM_ajax_info['errList']['cobfecha'] = array();
                  }
                  $this->NM_ajax_info['errList']['cobfecha'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
          $this->field_config['cobfecha']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cobfecha';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cobfecha

    function ValidateField_cobvalefec(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cobvalefec === "" || is_null($this->cobvalefec))  
      { 
          $this->cobvalefec = 0;
          $this->sc_force_zero[] = 'cobvalefec';
      } 
      if (!empty($this->field_config['cobvalefec']['symbol_dec']))
      {
          $this->sc_remove_currency($this->cobvalefec, $this->field_config['cobvalefec']['symbol_dec'], $this->field_config['cobvalefec']['symbol_grp'], $this->field_config['cobvalefec']['symbol_mon']); 
          nm_limpa_valor($this->cobvalefec, $this->field_config['cobvalefec']['symbol_dec'], $this->field_config['cobvalefec']['symbol_grp']) ; 
          if ('.' == substr($this->cobvalefec, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->cobvalefec, 1)))
              {
                  $this->cobvalefec = '';
              }
              else
              {
                  $this->cobvalefec = '0' . $this->cobvalefec;
              }
          }
      }
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->cobvalefec != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->cobvalefec) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "VALOR EFECTIVO: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cobvalefec']))
                  {
                      $Campos_Erros['cobvalefec'] = array();
                  }
                  $Campos_Erros['cobvalefec'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cobvalefec']) || !is_array($this->NM_ajax_info['errList']['cobvalefec']))
                  {
                      $this->NM_ajax_info['errList']['cobvalefec'] = array();
                  }
                  $this->NM_ajax_info['errList']['cobvalefec'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cobvalefec, 10, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "VALOR EFECTIVO; " ; 
                  if (!isset($Campos_Erros['cobvalefec']))
                  {
                      $Campos_Erros['cobvalefec'] = array();
                  }
                  $Campos_Erros['cobvalefec'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cobvalefec']) || !is_array($this->NM_ajax_info['errList']['cobvalefec']))
                  {
                      $this->NM_ajax_info['errList']['cobvalefec'] = array();
                  }
                  $this->NM_ajax_info['errList']['cobvalefec'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cobvalefec';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cobvalefec

    function ValidateField_cobvalcheq(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cobvalcheq === "" || is_null($this->cobvalcheq))  
      { 
          $this->cobvalcheq = 0;
          $this->sc_force_zero[] = 'cobvalcheq';
      } 
      if (!empty($this->field_config['cobvalcheq']['symbol_dec']))
      {
          $this->sc_remove_currency($this->cobvalcheq, $this->field_config['cobvalcheq']['symbol_dec'], $this->field_config['cobvalcheq']['symbol_grp'], $this->field_config['cobvalcheq']['symbol_mon']); 
          nm_limpa_valor($this->cobvalcheq, $this->field_config['cobvalcheq']['symbol_dec'], $this->field_config['cobvalcheq']['symbol_grp']) ; 
          if ('.' == substr($this->cobvalcheq, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->cobvalcheq, 1)))
              {
                  $this->cobvalcheq = '';
              }
              else
              {
                  $this->cobvalcheq = '0' . $this->cobvalcheq;
              }
          }
      }
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->cobvalcheq != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->cobvalcheq) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "VALOR CHEQUE: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cobvalcheq']))
                  {
                      $Campos_Erros['cobvalcheq'] = array();
                  }
                  $Campos_Erros['cobvalcheq'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cobvalcheq']) || !is_array($this->NM_ajax_info['errList']['cobvalcheq']))
                  {
                      $this->NM_ajax_info['errList']['cobvalcheq'] = array();
                  }
                  $this->NM_ajax_info['errList']['cobvalcheq'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cobvalcheq, 10, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "VALOR CHEQUE; " ; 
                  if (!isset($Campos_Erros['cobvalcheq']))
                  {
                      $Campos_Erros['cobvalcheq'] = array();
                  }
                  $Campos_Erros['cobvalcheq'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cobvalcheq']) || !is_array($this->NM_ajax_info['errList']['cobvalcheq']))
                  {
                      $this->NM_ajax_info['errList']['cobvalcheq'] = array();
                  }
                  $this->NM_ajax_info['errList']['cobvalcheq'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cobvalcheq';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cobvalcheq

    function ValidateField_cobvaltarjcred(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cobvaltarjcred === "" || is_null($this->cobvaltarjcred))  
      { 
          $this->cobvaltarjcred = 0;
          $this->sc_force_zero[] = 'cobvaltarjcred';
      } 
      if (!empty($this->field_config['cobvaltarjcred']['symbol_dec']))
      {
          $this->sc_remove_currency($this->cobvaltarjcred, $this->field_config['cobvaltarjcred']['symbol_dec'], $this->field_config['cobvaltarjcred']['symbol_grp'], $this->field_config['cobvaltarjcred']['symbol_mon']); 
          nm_limpa_valor($this->cobvaltarjcred, $this->field_config['cobvaltarjcred']['symbol_dec'], $this->field_config['cobvaltarjcred']['symbol_grp']) ; 
          if ('.' == substr($this->cobvaltarjcred, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->cobvaltarjcred, 1)))
              {
                  $this->cobvaltarjcred = '';
              }
              else
              {
                  $this->cobvaltarjcred = '0' . $this->cobvaltarjcred;
              }
          }
      }
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->cobvaltarjcred != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->cobvaltarjcred) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "VALOR TARJ. CRÉDITO: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cobvaltarjcred']))
                  {
                      $Campos_Erros['cobvaltarjcred'] = array();
                  }
                  $Campos_Erros['cobvaltarjcred'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cobvaltarjcred']) || !is_array($this->NM_ajax_info['errList']['cobvaltarjcred']))
                  {
                      $this->NM_ajax_info['errList']['cobvaltarjcred'] = array();
                  }
                  $this->NM_ajax_info['errList']['cobvaltarjcred'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cobvaltarjcred, 10, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "VALOR TARJ. CRÉDITO; " ; 
                  if (!isset($Campos_Erros['cobvaltarjcred']))
                  {
                      $Campos_Erros['cobvaltarjcred'] = array();
                  }
                  $Campos_Erros['cobvaltarjcred'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cobvaltarjcred']) || !is_array($this->NM_ajax_info['errList']['cobvaltarjcred']))
                  {
                      $this->NM_ajax_info['errList']['cobvaltarjcred'] = array();
                  }
                  $this->NM_ajax_info['errList']['cobvaltarjcred'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cobvaltarjcred';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cobvaltarjcred

    function ValidateField_cobvaltransf(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cobvaltransf === "" || is_null($this->cobvaltransf))  
      { 
          $this->cobvaltransf = 0;
          $this->sc_force_zero[] = 'cobvaltransf';
      } 
      if (!empty($this->field_config['cobvaltransf']['symbol_dec']))
      {
          $this->sc_remove_currency($this->cobvaltransf, $this->field_config['cobvaltransf']['symbol_dec'], $this->field_config['cobvaltransf']['symbol_grp'], $this->field_config['cobvaltransf']['symbol_mon']); 
          nm_limpa_valor($this->cobvaltransf, $this->field_config['cobvaltransf']['symbol_dec'], $this->field_config['cobvaltransf']['symbol_grp']) ; 
          if ('.' == substr($this->cobvaltransf, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->cobvaltransf, 1)))
              {
                  $this->cobvaltransf = '';
              }
              else
              {
                  $this->cobvaltransf = '0' . $this->cobvaltransf;
              }
          }
      }
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->cobvaltransf != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->cobvaltransf) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "VALOR TRANSFER.: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cobvaltransf']))
                  {
                      $Campos_Erros['cobvaltransf'] = array();
                  }
                  $Campos_Erros['cobvaltransf'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cobvaltransf']) || !is_array($this->NM_ajax_info['errList']['cobvaltransf']))
                  {
                      $this->NM_ajax_info['errList']['cobvaltransf'] = array();
                  }
                  $this->NM_ajax_info['errList']['cobvaltransf'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cobvaltransf, 10, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "VALOR TRANSFER.; " ; 
                  if (!isset($Campos_Erros['cobvaltransf']))
                  {
                      $Campos_Erros['cobvaltransf'] = array();
                  }
                  $Campos_Erros['cobvaltransf'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cobvaltransf']) || !is_array($this->NM_ajax_info['errList']['cobvaltransf']))
                  {
                      $this->NM_ajax_info['errList']['cobvaltransf'] = array();
                  }
                  $this->NM_ajax_info['errList']['cobvaltransf'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cobvaltransf';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cobvaltransf

    function ValidateField_cobvalretfte(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cobvalretfte === "" || is_null($this->cobvalretfte))  
      { 
          $this->cobvalretfte = 0;
          $this->sc_force_zero[] = 'cobvalretfte';
      } 
      if (!empty($this->field_config['cobvalretfte']['symbol_dec']))
      {
          $this->sc_remove_currency($this->cobvalretfte, $this->field_config['cobvalretfte']['symbol_dec'], $this->field_config['cobvalretfte']['symbol_grp'], $this->field_config['cobvalretfte']['symbol_mon']); 
          nm_limpa_valor($this->cobvalretfte, $this->field_config['cobvalretfte']['symbol_dec'], $this->field_config['cobvalretfte']['symbol_grp']) ; 
          if ('.' == substr($this->cobvalretfte, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->cobvalretfte, 1)))
              {
                  $this->cobvalretfte = '';
              }
              else
              {
                  $this->cobvalretfte = '0' . $this->cobvalretfte;
              }
          }
      }
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->cobvalretfte != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->cobvalretfte) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "VALOR RET. FUENTE: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cobvalretfte']))
                  {
                      $Campos_Erros['cobvalretfte'] = array();
                  }
                  $Campos_Erros['cobvalretfte'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cobvalretfte']) || !is_array($this->NM_ajax_info['errList']['cobvalretfte']))
                  {
                      $this->NM_ajax_info['errList']['cobvalretfte'] = array();
                  }
                  $this->NM_ajax_info['errList']['cobvalretfte'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cobvalretfte, 10, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "VALOR RET. FUENTE; " ; 
                  if (!isset($Campos_Erros['cobvalretfte']))
                  {
                      $Campos_Erros['cobvalretfte'] = array();
                  }
                  $Campos_Erros['cobvalretfte'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cobvalretfte']) || !is_array($this->NM_ajax_info['errList']['cobvalretfte']))
                  {
                      $this->NM_ajax_info['errList']['cobvalretfte'] = array();
                  }
                  $this->NM_ajax_info['errList']['cobvalretfte'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cobvalretfte';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cobvalretfte

    function ValidateField_cobvaltotal(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cobvaltotal === "" || is_null($this->cobvaltotal))  
      { 
          $this->cobvaltotal = 0;
          $this->sc_force_zero[] = 'cobvaltotal';
      } 
      if (!empty($this->field_config['cobvaltotal']['symbol_dec']))
      {
          $this->sc_remove_currency($this->cobvaltotal, $this->field_config['cobvaltotal']['symbol_dec'], $this->field_config['cobvaltotal']['symbol_grp'], $this->field_config['cobvaltotal']['symbol_mon']); 
          nm_limpa_valor($this->cobvaltotal, $this->field_config['cobvaltotal']['symbol_dec'], $this->field_config['cobvaltotal']['symbol_grp']) ; 
          if ('.' == substr($this->cobvaltotal, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->cobvaltotal, 1)))
              {
                  $this->cobvaltotal = '';
              }
              else
              {
                  $this->cobvaltotal = '0' . $this->cobvaltotal;
              }
          }
      }
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->cobvaltotal != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->cobvaltotal) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "VALOR TOTAL: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cobvaltotal']))
                  {
                      $Campos_Erros['cobvaltotal'] = array();
                  }
                  $Campos_Erros['cobvaltotal'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cobvaltotal']) || !is_array($this->NM_ajax_info['errList']['cobvaltotal']))
                  {
                      $this->NM_ajax_info['errList']['cobvaltotal'] = array();
                  }
                  $this->NM_ajax_info['errList']['cobvaltotal'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cobvaltotal, 10, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "VALOR TOTAL; " ; 
                  if (!isset($Campos_Erros['cobvaltotal']))
                  {
                      $Campos_Erros['cobvaltotal'] = array();
                  }
                  $Campos_Erros['cobvaltotal'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cobvaltotal']) || !is_array($this->NM_ajax_info['errList']['cobvaltotal']))
                  {
                      $this->NM_ajax_info['errList']['cobvaltotal'] = array();
                  }
                  $this->NM_ajax_info['errList']['cobvaltotal'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cobvaltotal';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cobvaltotal

    function ValidateField_cobvalcruz(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cobvalcruz === "" || is_null($this->cobvalcruz))  
      { 
          $this->cobvalcruz = 0;
          $this->sc_force_zero[] = 'cobvalcruz';
      } 
      if (!empty($this->field_config['cobvalcruz']['symbol_dec']))
      {
          $this->sc_remove_currency($this->cobvalcruz, $this->field_config['cobvalcruz']['symbol_dec'], $this->field_config['cobvalcruz']['symbol_grp'], $this->field_config['cobvalcruz']['symbol_mon']); 
          nm_limpa_valor($this->cobvalcruz, $this->field_config['cobvalcruz']['symbol_dec'], $this->field_config['cobvalcruz']['symbol_grp']) ; 
          if ('.' == substr($this->cobvalcruz, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->cobvalcruz, 1)))
              {
                  $this->cobvalcruz = '';
              }
              else
              {
                  $this->cobvalcruz = '0' . $this->cobvalcruz;
              }
          }
      }
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->cobvalcruz != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->cobvalcruz) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "VALOR CRUZADO: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cobvalcruz']))
                  {
                      $Campos_Erros['cobvalcruz'] = array();
                  }
                  $Campos_Erros['cobvalcruz'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cobvalcruz']) || !is_array($this->NM_ajax_info['errList']['cobvalcruz']))
                  {
                      $this->NM_ajax_info['errList']['cobvalcruz'] = array();
                  }
                  $this->NM_ajax_info['errList']['cobvalcruz'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cobvalcruz, 10, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "VALOR CRUZADO; " ; 
                  if (!isset($Campos_Erros['cobvalcruz']))
                  {
                      $Campos_Erros['cobvalcruz'] = array();
                  }
                  $Campos_Erros['cobvalcruz'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cobvalcruz']) || !is_array($this->NM_ajax_info['errList']['cobvalcruz']))
                  {
                      $this->NM_ajax_info['errList']['cobvalcruz'] = array();
                  }
                  $this->NM_ajax_info['errList']['cobvalcruz'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cobvalcruz';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cobvalcruz

    function ValidateField_saldo_favor(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->saldo_favor === "" || is_null($this->saldo_favor))  
      { 
          $this->saldo_favor = 0;
          $this->sc_force_zero[] = 'saldo_favor';
      } 
      if (!empty($this->field_config['saldo_favor']['symbol_dec']))
      {
          $this->sc_remove_currency($this->saldo_favor, $this->field_config['saldo_favor']['symbol_dec'], $this->field_config['saldo_favor']['symbol_grp'], $this->field_config['saldo_favor']['symbol_mon']); 
          nm_limpa_valor($this->saldo_favor, $this->field_config['saldo_favor']['symbol_dec'], $this->field_config['saldo_favor']['symbol_grp']) ; 
          if ('.' == substr($this->saldo_favor, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->saldo_favor, 1)))
              {
                  $this->saldo_favor = '';
              }
              else
              {
                  $this->saldo_favor = '0' . $this->saldo_favor;
              }
          }
      }
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->saldo_favor != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->saldo_favor, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->saldo_favor, -1))
              {
                  $iTestSize++;
                  $this->saldo_favor = '-' . substr($this->saldo_favor, 0, -1);
              }
              if (strlen($this->saldo_favor) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "SALDO A FAVOR: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['saldo_favor']))
                  {
                      $Campos_Erros['saldo_favor'] = array();
                  }
                  $Campos_Erros['saldo_favor'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['saldo_favor']) || !is_array($this->NM_ajax_info['errList']['saldo_favor']))
                  {
                      $this->NM_ajax_info['errList']['saldo_favor'] = array();
                  }
                  $this->NM_ajax_info['errList']['saldo_favor'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->saldo_favor, 18, 2, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "SALDO A FAVOR; " ; 
                  if (!isset($Campos_Erros['saldo_favor']))
                  {
                      $Campos_Erros['saldo_favor'] = array();
                  }
                  $Campos_Erros['saldo_favor'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['saldo_favor']) || !is_array($this->NM_ajax_info['errList']['saldo_favor']))
                  {
                      $this->NM_ajax_info['errList']['saldo_favor'] = array();
                  }
                  $this->NM_ajax_info['errList']['saldo_favor'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'saldo_favor';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_saldo_favor

    function ValidateField_cobanula(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if ($this->nmgp_opcao == "incluir")
   {
      if ($this->cobanula == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->cobanula === "" || is_null($this->cobanula))  
      { 
          $this->cobanula = 0;
          $this->sc_force_zero[] = 'cobanula';
      } 
   }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cobanula';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cobanula

    function ValidateField_cobnumcheq(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->cobnumcheq) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "No. CHEQUE " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cobnumcheq']))
              {
                  $Campos_Erros['cobnumcheq'] = array();
              }
              $Campos_Erros['cobnumcheq'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cobnumcheq']) || !is_array($this->NM_ajax_info['errList']['cobnumcheq']))
              {
                  $this->NM_ajax_info['errList']['cobnumcheq'] = array();
              }
              $this->NM_ajax_info['errList']['cobnumcheq'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cobnumcheq';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cobnumcheq

    function ValidateField_cobbancheq(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->cobbancheq) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "BANCO CHEQUE " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cobbancheq']))
              {
                  $Campos_Erros['cobbancheq'] = array();
              }
              $Campos_Erros['cobbancheq'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cobbancheq']) || !is_array($this->NM_ajax_info['errList']['cobbancheq']))
              {
                  $this->NM_ajax_info['errList']['cobbancheq'] = array();
              }
              $this->NM_ajax_info['errList']['cobbancheq'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cobbancheq';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cobbancheq

    function ValidateField_tcrcodigo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if ($this->nmgp_opcao == "incluir")
   {
               if (!empty($this->tcrcodigo) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_tcrcodigo']) && !in_array($this->tcrcodigo, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_tcrcodigo']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['tcrcodigo']))
                   {
                       $Campos_Erros['tcrcodigo'] = array();
                   }
                   $Campos_Erros['tcrcodigo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['tcrcodigo']) || !is_array($this->NM_ajax_info['errList']['tcrcodigo']))
                   {
                       $this->NM_ajax_info['errList']['tcrcodigo'] = array();
                   }
                   $this->NM_ajax_info['errList']['tcrcodigo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
   }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tcrcodigo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tcrcodigo

    function ValidateField_cobnumtarjcred(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->cobnumtarjcred) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "No. TARJ. CRÉD. " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cobnumtarjcred']))
              {
                  $Campos_Erros['cobnumtarjcred'] = array();
              }
              $Campos_Erros['cobnumtarjcred'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cobnumtarjcred']) || !is_array($this->NM_ajax_info['errList']['cobnumtarjcred']))
              {
                  $this->NM_ajax_info['errList']['cobnumtarjcred'] = array();
              }
              $this->NM_ajax_info['errList']['cobnumtarjcred'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cobnumtarjcred';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cobnumtarjcred

    function ValidateField_cobbantransf(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->cobbantransf) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "BANCO TRANSFER. " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cobbantransf']))
              {
                  $Campos_Erros['cobbantransf'] = array();
              }
              $Campos_Erros['cobbantransf'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cobbantransf']) || !is_array($this->NM_ajax_info['errList']['cobbantransf']))
              {
                  $this->NM_ajax_info['errList']['cobbantransf'] = array();
              }
              $this->NM_ajax_info['errList']['cobbantransf'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cobbantransf';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cobbantransf

    function ValidateField_cobctatransf(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->cobctatransf) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "No. CTA. TRANSFER. " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cobctatransf']))
              {
                  $Campos_Erros['cobctatransf'] = array();
              }
              $Campos_Erros['cobctatransf'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cobctatransf']) || !is_array($this->NM_ajax_info['errList']['cobctatransf']))
              {
                  $this->NM_ajax_info['errList']['cobctatransf'] = array();
              }
              $this->NM_ajax_info['errList']['cobctatransf'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cobctatransf';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cobctatransf

    function ValidateField_detalle_cobro(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->detalle_cobro) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'detalle_cobro';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_detalle_cobro

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
    $this->nmgp_dados_form['fclnumero'] = $this->fclnumero;
    $this->nmgp_dados_form['cobfecha'] = (strlen(trim($this->cobfecha)) > 19) ? str_replace(".", ":", $this->cobfecha) : trim($this->cobfecha);
    $this->nmgp_dados_form['cobvalefec'] = $this->cobvalefec;
    $this->nmgp_dados_form['cobvalcheq'] = $this->cobvalcheq;
    $this->nmgp_dados_form['cobvaltarjcred'] = $this->cobvaltarjcred;
    $this->nmgp_dados_form['cobvaltransf'] = $this->cobvaltransf;
    $this->nmgp_dados_form['cobvalretfte'] = $this->cobvalretfte;
    $this->nmgp_dados_form['cobvaltotal'] = $this->cobvaltotal;
    $this->nmgp_dados_form['cobvalcruz'] = $this->cobvalcruz;
    $this->nmgp_dados_form['saldo_favor'] = $this->saldo_favor;
    $this->nmgp_dados_form['cobanula'] = $this->cobanula;
    $this->nmgp_dados_form['cobnumcheq'] = $this->cobnumcheq;
    $this->nmgp_dados_form['cobbancheq'] = $this->cobbancheq;
    $this->nmgp_dados_form['tcrcodigo'] = $this->tcrcodigo;
    $this->nmgp_dados_form['cobnumtarjcred'] = $this->cobnumtarjcred;
    $this->nmgp_dados_form['cobbantransf'] = $this->cobbantransf;
    $this->nmgp_dados_form['cobctatransf'] = $this->cobctatransf;
    $this->nmgp_dados_form['detalle_cobro'] = $this->detalle_cobro;
    $this->nmgp_dados_form['emiruc'] = $this->emiruc;
    $this->nmgp_dados_form['cobnumero'] = $this->cobnumero;
    $this->nmgp_dados_form['cobfecanula'] = $this->cobfecanula;
    $this->nmgp_dados_form['cobusucrea'] = $this->cobusucrea;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['cobfecha'] = $this->cobfecha;
      nm_limpa_data($this->cobfecha, $this->field_config['cobfecha']['date_sep']) ; 
      $this->Before_unformat['cobvalefec'] = $this->cobvalefec;
      if (!empty($this->field_config['cobvalefec']['symbol_dec']))
      {
         $this->sc_remove_currency($this->cobvalefec, $this->field_config['cobvalefec']['symbol_dec'], $this->field_config['cobvalefec']['symbol_grp'], $this->field_config['cobvalefec']['symbol_mon']);
         nm_limpa_valor($this->cobvalefec, $this->field_config['cobvalefec']['symbol_dec'], $this->field_config['cobvalefec']['symbol_grp']);
      }
      $this->Before_unformat['cobvalcheq'] = $this->cobvalcheq;
      if (!empty($this->field_config['cobvalcheq']['symbol_dec']))
      {
         $this->sc_remove_currency($this->cobvalcheq, $this->field_config['cobvalcheq']['symbol_dec'], $this->field_config['cobvalcheq']['symbol_grp'], $this->field_config['cobvalcheq']['symbol_mon']);
         nm_limpa_valor($this->cobvalcheq, $this->field_config['cobvalcheq']['symbol_dec'], $this->field_config['cobvalcheq']['symbol_grp']);
      }
      $this->Before_unformat['cobvaltarjcred'] = $this->cobvaltarjcred;
      if (!empty($this->field_config['cobvaltarjcred']['symbol_dec']))
      {
         $this->sc_remove_currency($this->cobvaltarjcred, $this->field_config['cobvaltarjcred']['symbol_dec'], $this->field_config['cobvaltarjcred']['symbol_grp'], $this->field_config['cobvaltarjcred']['symbol_mon']);
         nm_limpa_valor($this->cobvaltarjcred, $this->field_config['cobvaltarjcred']['symbol_dec'], $this->field_config['cobvaltarjcred']['symbol_grp']);
      }
      $this->Before_unformat['cobvaltransf'] = $this->cobvaltransf;
      if (!empty($this->field_config['cobvaltransf']['symbol_dec']))
      {
         $this->sc_remove_currency($this->cobvaltransf, $this->field_config['cobvaltransf']['symbol_dec'], $this->field_config['cobvaltransf']['symbol_grp'], $this->field_config['cobvaltransf']['symbol_mon']);
         nm_limpa_valor($this->cobvaltransf, $this->field_config['cobvaltransf']['symbol_dec'], $this->field_config['cobvaltransf']['symbol_grp']);
      }
      $this->Before_unformat['cobvalretfte'] = $this->cobvalretfte;
      if (!empty($this->field_config['cobvalretfte']['symbol_dec']))
      {
         $this->sc_remove_currency($this->cobvalretfte, $this->field_config['cobvalretfte']['symbol_dec'], $this->field_config['cobvalretfte']['symbol_grp'], $this->field_config['cobvalretfte']['symbol_mon']);
         nm_limpa_valor($this->cobvalretfte, $this->field_config['cobvalretfte']['symbol_dec'], $this->field_config['cobvalretfte']['symbol_grp']);
      }
      $this->Before_unformat['cobvaltotal'] = $this->cobvaltotal;
      if (!empty($this->field_config['cobvaltotal']['symbol_dec']))
      {
         $this->sc_remove_currency($this->cobvaltotal, $this->field_config['cobvaltotal']['symbol_dec'], $this->field_config['cobvaltotal']['symbol_grp'], $this->field_config['cobvaltotal']['symbol_mon']);
         nm_limpa_valor($this->cobvaltotal, $this->field_config['cobvaltotal']['symbol_dec'], $this->field_config['cobvaltotal']['symbol_grp']);
      }
      $this->Before_unformat['cobvalcruz'] = $this->cobvalcruz;
      if (!empty($this->field_config['cobvalcruz']['symbol_dec']))
      {
         $this->sc_remove_currency($this->cobvalcruz, $this->field_config['cobvalcruz']['symbol_dec'], $this->field_config['cobvalcruz']['symbol_grp'], $this->field_config['cobvalcruz']['symbol_mon']);
         nm_limpa_valor($this->cobvalcruz, $this->field_config['cobvalcruz']['symbol_dec'], $this->field_config['cobvalcruz']['symbol_grp']);
      }
      $this->Before_unformat['saldo_favor'] = $this->saldo_favor;
      if (!empty($this->field_config['saldo_favor']['symbol_dec']))
      {
         $this->sc_remove_currency($this->saldo_favor, $this->field_config['saldo_favor']['symbol_dec'], $this->field_config['saldo_favor']['symbol_grp'], $this->field_config['saldo_favor']['symbol_mon']);
         nm_limpa_valor($this->saldo_favor, $this->field_config['saldo_favor']['symbol_dec'], $this->field_config['saldo_favor']['symbol_grp']);
      }
      $this->Before_unformat['cobnumero'] = $this->cobnumero;
      nm_limpa_numero($this->cobnumero, $this->field_config['cobnumero']['symbol_grp']) ; 
      $this->Before_unformat['cobfecanula'] = $this->cobfecanula;
      nm_limpa_data($this->cobfecanula, $this->field_config['cobfecanula']['date_sep']) ; 
      nm_limpa_hora($this->cobfecanula_hora, $this->field_config['cobfecanula']['time_sep']) ; 
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
      if ($Nome_Campo == "cobvalefec")
      {
          if (!empty($this->field_config['cobvalefec']['symbol_dec']))
          {
             $this->sc_remove_currency($this->cobvalefec, $this->field_config['cobvalefec']['symbol_dec'], $this->field_config['cobvalefec']['symbol_grp'], $this->field_config['cobvalefec']['symbol_mon']);
             nm_limpa_valor($this->cobvalefec, $this->field_config['cobvalefec']['symbol_dec'], $this->field_config['cobvalefec']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "cobvalcheq")
      {
          if (!empty($this->field_config['cobvalcheq']['symbol_dec']))
          {
             $this->sc_remove_currency($this->cobvalcheq, $this->field_config['cobvalcheq']['symbol_dec'], $this->field_config['cobvalcheq']['symbol_grp'], $this->field_config['cobvalcheq']['symbol_mon']);
             nm_limpa_valor($this->cobvalcheq, $this->field_config['cobvalcheq']['symbol_dec'], $this->field_config['cobvalcheq']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "cobvaltarjcred")
      {
          if (!empty($this->field_config['cobvaltarjcred']['symbol_dec']))
          {
             $this->sc_remove_currency($this->cobvaltarjcred, $this->field_config['cobvaltarjcred']['symbol_dec'], $this->field_config['cobvaltarjcred']['symbol_grp'], $this->field_config['cobvaltarjcred']['symbol_mon']);
             nm_limpa_valor($this->cobvaltarjcred, $this->field_config['cobvaltarjcred']['symbol_dec'], $this->field_config['cobvaltarjcred']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "cobvaltransf")
      {
          if (!empty($this->field_config['cobvaltransf']['symbol_dec']))
          {
             $this->sc_remove_currency($this->cobvaltransf, $this->field_config['cobvaltransf']['symbol_dec'], $this->field_config['cobvaltransf']['symbol_grp'], $this->field_config['cobvaltransf']['symbol_mon']);
             nm_limpa_valor($this->cobvaltransf, $this->field_config['cobvaltransf']['symbol_dec'], $this->field_config['cobvaltransf']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "cobvalretfte")
      {
          if (!empty($this->field_config['cobvalretfte']['symbol_dec']))
          {
             $this->sc_remove_currency($this->cobvalretfte, $this->field_config['cobvalretfte']['symbol_dec'], $this->field_config['cobvalretfte']['symbol_grp'], $this->field_config['cobvalretfte']['symbol_mon']);
             nm_limpa_valor($this->cobvalretfte, $this->field_config['cobvalretfte']['symbol_dec'], $this->field_config['cobvalretfte']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "cobvaltotal")
      {
          if (!empty($this->field_config['cobvaltotal']['symbol_dec']))
          {
             $this->sc_remove_currency($this->cobvaltotal, $this->field_config['cobvaltotal']['symbol_dec'], $this->field_config['cobvaltotal']['symbol_grp'], $this->field_config['cobvaltotal']['symbol_mon']);
             nm_limpa_valor($this->cobvaltotal, $this->field_config['cobvaltotal']['symbol_dec'], $this->field_config['cobvaltotal']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "cobvalcruz")
      {
          if (!empty($this->field_config['cobvalcruz']['symbol_dec']))
          {
             $this->sc_remove_currency($this->cobvalcruz, $this->field_config['cobvalcruz']['symbol_dec'], $this->field_config['cobvalcruz']['symbol_grp'], $this->field_config['cobvalcruz']['symbol_mon']);
             nm_limpa_valor($this->cobvalcruz, $this->field_config['cobvalcruz']['symbol_dec'], $this->field_config['cobvalcruz']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "saldo_favor")
      {
          if (!empty($this->field_config['saldo_favor']['symbol_dec']))
          {
             $this->sc_remove_currency($this->saldo_favor, $this->field_config['saldo_favor']['symbol_dec'], $this->field_config['saldo_favor']['symbol_grp'], $this->field_config['saldo_favor']['symbol_mon']);
             nm_limpa_valor($this->saldo_favor, $this->field_config['saldo_favor']['symbol_dec'], $this->field_config['saldo_favor']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "cobnumero")
      {
          nm_limpa_numero($this->cobnumero, $this->field_config['cobnumero']['symbol_grp']) ; 
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
      if ((!empty($this->cobfecha) && 'null' != $this->cobfecha) || (!empty($format_fields) && isset($format_fields['cobfecha'])))
      {
          nm_volta_data($this->cobfecha, $this->field_config['cobfecha']['date_format']) ; 
          nmgp_Form_Datas($this->cobfecha, $this->field_config['cobfecha']['date_format'], $this->field_config['cobfecha']['date_sep']) ;  
      }
      elseif ('null' == $this->cobfecha || '' == $this->cobfecha)
      {
          $this->cobfecha = '';
      }
      if ('' !== $this->cobvalefec || (!empty($format_fields) && isset($format_fields['cobvalefec'])))
      {
          nmgp_Form_Num_Val($this->cobvalefec, $this->field_config['cobvalefec']['symbol_grp'], $this->field_config['cobvalefec']['symbol_dec'], "2", "S", $this->field_config['cobvalefec']['format_neg'], "", "", "-", $this->field_config['cobvalefec']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['cobvalefec']['symbol_mon'];
          $this->sc_add_currency($this->cobvalefec, $sMonSymb, $this->field_config['cobvalefec']['format_pos']); 
      }
      if ('' !== $this->cobvalcheq || (!empty($format_fields) && isset($format_fields['cobvalcheq'])))
      {
          nmgp_Form_Num_Val($this->cobvalcheq, $this->field_config['cobvalcheq']['symbol_grp'], $this->field_config['cobvalcheq']['symbol_dec'], "2", "S", $this->field_config['cobvalcheq']['format_neg'], "", "", "-", $this->field_config['cobvalcheq']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['cobvalcheq']['symbol_mon'];
          $this->sc_add_currency($this->cobvalcheq, $sMonSymb, $this->field_config['cobvalcheq']['format_pos']); 
      }
      if ('' !== $this->cobvaltarjcred || (!empty($format_fields) && isset($format_fields['cobvaltarjcred'])))
      {
          nmgp_Form_Num_Val($this->cobvaltarjcred, $this->field_config['cobvaltarjcred']['symbol_grp'], $this->field_config['cobvaltarjcred']['symbol_dec'], "2", "S", $this->field_config['cobvaltarjcred']['format_neg'], "", "", "-", $this->field_config['cobvaltarjcred']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['cobvaltarjcred']['symbol_mon'];
          $this->sc_add_currency($this->cobvaltarjcred, $sMonSymb, $this->field_config['cobvaltarjcred']['format_pos']); 
      }
      if ('' !== $this->cobvaltransf || (!empty($format_fields) && isset($format_fields['cobvaltransf'])))
      {
          nmgp_Form_Num_Val($this->cobvaltransf, $this->field_config['cobvaltransf']['symbol_grp'], $this->field_config['cobvaltransf']['symbol_dec'], "2", "S", $this->field_config['cobvaltransf']['format_neg'], "", "", "-", $this->field_config['cobvaltransf']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['cobvaltransf']['symbol_mon'];
          $this->sc_add_currency($this->cobvaltransf, $sMonSymb, $this->field_config['cobvaltransf']['format_pos']); 
      }
      if ('' !== $this->cobvalretfte || (!empty($format_fields) && isset($format_fields['cobvalretfte'])))
      {
          nmgp_Form_Num_Val($this->cobvalretfte, $this->field_config['cobvalretfte']['symbol_grp'], $this->field_config['cobvalretfte']['symbol_dec'], "2", "S", $this->field_config['cobvalretfte']['format_neg'], "", "", "-", $this->field_config['cobvalretfte']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['cobvalretfte']['symbol_mon'];
          $this->sc_add_currency($this->cobvalretfte, $sMonSymb, $this->field_config['cobvalretfte']['format_pos']); 
      }
      if ('' !== $this->cobvaltotal || (!empty($format_fields) && isset($format_fields['cobvaltotal'])))
      {
          nmgp_Form_Num_Val($this->cobvaltotal, $this->field_config['cobvaltotal']['symbol_grp'], $this->field_config['cobvaltotal']['symbol_dec'], "2", "S", $this->field_config['cobvaltotal']['format_neg'], "", "", "-", $this->field_config['cobvaltotal']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['cobvaltotal']['symbol_mon'];
          $this->sc_add_currency($this->cobvaltotal, $sMonSymb, $this->field_config['cobvaltotal']['format_pos']); 
      }
      if ('' !== $this->cobvalcruz || (!empty($format_fields) && isset($format_fields['cobvalcruz'])))
      {
          nmgp_Form_Num_Val($this->cobvalcruz, $this->field_config['cobvalcruz']['symbol_grp'], $this->field_config['cobvalcruz']['symbol_dec'], "2", "S", $this->field_config['cobvalcruz']['format_neg'], "", "", "-", $this->field_config['cobvalcruz']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['cobvalcruz']['symbol_mon'];
          $this->sc_add_currency($this->cobvalcruz, $sMonSymb, $this->field_config['cobvalcruz']['format_pos']); 
      }
      if ('' !== $this->saldo_favor || (!empty($format_fields) && isset($format_fields['saldo_favor'])))
      {
          nmgp_Form_Num_Val($this->saldo_favor, $this->field_config['saldo_favor']['symbol_grp'], $this->field_config['saldo_favor']['symbol_dec'], "2", "S", $this->field_config['saldo_favor']['format_neg'], "", "", "-", $this->field_config['saldo_favor']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['saldo_favor']['symbol_mon'];
          $this->sc_add_currency($this->saldo_favor, $sMonSymb, $this->field_config['saldo_favor']['format_pos']); 
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
//
//-- 
   function nm_converte_datas($use_null = true, $bForce = false)
   {
      $guarda_format_hora = $this->field_config['cobfecha']['date_format'];
      if ($this->cobfecha != "")  
      { 
          nm_conv_data($this->cobfecha, $this->field_config['cobfecha']['date_format']) ; 
          $this->cobfecha_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->cobfecha_hora = substr($this->cobfecha_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->cobfecha_hora = substr($this->cobfecha_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->cobfecha_hora = substr($this->cobfecha_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->cobfecha_hora = substr($this->cobfecha_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->cobfecha_hora = substr($this->cobfecha_hora, 0, -4);
          }
      } 
      if ($this->cobfecha == "" && $use_null)  
      { 
          $this->cobfecha = "null" ; 
      } 
      $this->field_config['cobfecha']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_fclnumero();
          $this->ajax_return_values_cobfecha();
          $this->ajax_return_values_cobvalefec();
          $this->ajax_return_values_cobvalcheq();
          $this->ajax_return_values_cobvaltarjcred();
          $this->ajax_return_values_cobvaltransf();
          $this->ajax_return_values_cobvalretfte();
          $this->ajax_return_values_cobvaltotal();
          $this->ajax_return_values_cobvalcruz();
          $this->ajax_return_values_saldo_favor();
          $this->ajax_return_values_cobanula();
          $this->ajax_return_values_cobnumcheq();
          $this->ajax_return_values_cobbancheq();
          $this->ajax_return_values_tcrcodigo();
          $this->ajax_return_values_cobnumtarjcred();
          $this->ajax_return_values_cobbantransf();
          $this->ajax_return_values_cobctatransf();
          $this->ajax_return_values_detalle_cobro();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['emiruc']['keyVal'] = form_cobros_pack_protect_string($this->nmgp_dados_form['emiruc']);
              $this->NM_ajax_info['fldList']['cobnumero']['keyVal'] = form_cobros_pack_protect_string($this->nmgp_dados_form['cobnumero']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['grid_detalle_cobro_script_case_init'] ]['grid_detalle_cobro']['embutida_form_full'] = false;
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['grid_detalle_cobro_script_case_init'] ]['grid_detalle_cobro']['embutida_form']       = true;
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['grid_detalle_cobro_script_case_init'] ]['grid_detalle_cobro']['embutida_pai']        = "form_cobros";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['grid_detalle_cobro_script_case_init'] ]['grid_detalle_cobro']['embutida_form_parms'] = "v_rucemison*scin" . $this->nmgp_dados_form['emiruc'] . "*scoutnumero_cobro*scin" . $this->nmgp_dados_form['cobnumero'] . "*scout";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['grid_detalle_cobro_script_case_init'] ]['grid_detalle_cobro']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['grid_detalle_cobro_script_case_init'] ]['grid_detalle_cobro']['total']);
          }
   } // ajax_return_values

          //----- fclnumero
   function ajax_return_values_fclnumero($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclnumero", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclnumero);
              $aLookup = array();
              $this->_tmp_lookup_fclnumero = $this->fclnumero;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_fclnumero']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_fclnumero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_fclnumero']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_fclnumero'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_cobfecha = $this->cobfecha;
   $old_value_cobvalefec = $this->cobvalefec;
   $old_value_cobvalcheq = $this->cobvalcheq;
   $old_value_cobvaltarjcred = $this->cobvaltarjcred;
   $old_value_cobvaltransf = $this->cobvaltransf;
   $old_value_cobvalretfte = $this->cobvalretfte;
   $old_value_cobvaltotal = $this->cobvaltotal;
   $old_value_cobvalcruz = $this->cobvalcruz;
   $old_value_saldo_favor = $this->saldo_favor;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_cobfecha = $this->cobfecha;
   $unformatted_value_cobvalefec = $this->cobvalefec;
   $unformatted_value_cobvalcheq = $this->cobvalcheq;
   $unformatted_value_cobvaltarjcred = $this->cobvaltarjcred;
   $unformatted_value_cobvaltransf = $this->cobvaltransf;
   $unformatted_value_cobvalretfte = $this->cobvalretfte;
   $unformatted_value_cobvaltotal = $this->cobvaltotal;
   $unformatted_value_cobvalcruz = $this->cobvalcruz;
   $unformatted_value_saldo_favor = $this->saldo_favor;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT fclnumero, fclapellidos + ' ' + fclnombres  FROM ficha_cliente  ORDER BY fclapellidos, fclnombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT fclnumero, concat(fclapellidos,' ',fclnombres)  FROM ficha_cliente  ORDER BY fclapellidos, fclnombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT fclnumero, fclapellidos&' '&fclnombres  FROM ficha_cliente  ORDER BY fclapellidos, fclnombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT fclnumero, fclapellidos||' '||fclnombres  FROM ficha_cliente  ORDER BY fclapellidos, fclnombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT fclnumero, fclapellidos + ' ' + fclnombres  FROM ficha_cliente  ORDER BY fclapellidos, fclnombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT fclnumero, fclapellidos||' '||fclnombres  FROM ficha_cliente  ORDER BY fclapellidos, fclnombres";
   }
   else
   {
       $nm_comando = "SELECT fclnumero, fclapellidos||' '||fclnombres  FROM ficha_cliente  ORDER BY fclapellidos, fclnombres";
   }

   $this->cobfecha = $old_value_cobfecha;
   $this->cobvalefec = $old_value_cobvalefec;
   $this->cobvalcheq = $old_value_cobvalcheq;
   $this->cobvaltarjcred = $old_value_cobvaltarjcred;
   $this->cobvaltransf = $old_value_cobvaltransf;
   $this->cobvalretfte = $old_value_cobvalretfte;
   $this->cobvaltotal = $old_value_cobvaltotal;
   $this->cobvalcruz = $old_value_cobvalcruz;
   $this->saldo_favor = $old_value_saldo_favor;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_cobros_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_cobros_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_fclnumero'][] = $rs->fields[0];
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
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"fclnumero\"";
          if (isset($this->NM_ajax_info['select_html']['fclnumero']) && !empty($this->NM_ajax_info['select_html']['fclnumero']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['fclnumero'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->fclnumero == $sValue)
                  {
                      $this->_tmp_lookup_fclnumero = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $Nm_tp_obj = (isset($this->nmgp_refresh_fields) && in_array("fclnumero", $this->nmgp_refresh_fields)) ? 'select' : 'text';
          $this->NM_ajax_info['fldList']['fclnumero'] = array(
                       'row'    => '',
               'type'    => $Nm_tp_obj,
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fclnumero']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fclnumero']['valList'][$i] = form_cobros_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fclnumero']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fclnumero']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fclnumero']['labList'] = $aLabel;
          }
   }

          //----- cobfecha
   function ajax_return_values_cobfecha($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cobfecha", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cobfecha);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cobfecha'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- cobvalefec
   function ajax_return_values_cobvalefec($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cobvalefec", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cobvalefec);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cobvalefec'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- cobvalcheq
   function ajax_return_values_cobvalcheq($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cobvalcheq", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cobvalcheq);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cobvalcheq'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- cobvaltarjcred
   function ajax_return_values_cobvaltarjcred($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cobvaltarjcred", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cobvaltarjcred);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cobvaltarjcred'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- cobvaltransf
   function ajax_return_values_cobvaltransf($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cobvaltransf", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cobvaltransf);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cobvaltransf'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- cobvalretfte
   function ajax_return_values_cobvalretfte($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cobvalretfte", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cobvalretfte);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cobvalretfte'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- cobvaltotal
   function ajax_return_values_cobvaltotal($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cobvaltotal", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cobvaltotal);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cobvaltotal'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- cobvalcruz
   function ajax_return_values_cobvalcruz($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cobvalcruz", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cobvalcruz);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cobvalcruz'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- saldo_favor
   function ajax_return_values_saldo_favor($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("saldo_favor", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->saldo_favor);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['saldo_favor'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- cobanula
   function ajax_return_values_cobanula($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cobanula", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cobanula);
              $aLookup = array();
              $this->_tmp_lookup_cobanula = $this->cobanula;

$aLookup[] = array(form_cobros_pack_protect_string('1') => str_replace('<', '&lt;',form_cobros_pack_protect_string("SÍ")));
$aLookup[] = array(form_cobros_pack_protect_string('0') => str_replace('<', '&lt;',form_cobros_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_cobanula'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_cobanula'][] = '0';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"cobanula\"";
          if (isset($this->NM_ajax_info['select_html']['cobanula']) && !empty($this->NM_ajax_info['select_html']['cobanula']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['cobanula'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->cobanula == $sValue)
                  {
                      $this->_tmp_lookup_cobanula = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $Nm_tp_obj = (isset($this->nmgp_refresh_fields) && in_array("cobanula", $this->nmgp_refresh_fields)) ? 'select' : 'text';
          $this->NM_ajax_info['fldList']['cobanula'] = array(
                       'row'    => '',
               'type'    => $Nm_tp_obj,
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['cobanula']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['cobanula']['valList'][$i] = form_cobros_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['cobanula']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['cobanula']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['cobanula']['labList'] = $aLabel;
          }
   }

          //----- cobnumcheq
   function ajax_return_values_cobnumcheq($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cobnumcheq", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cobnumcheq);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cobnumcheq'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cobbancheq
   function ajax_return_values_cobbancheq($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cobbancheq", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cobbancheq);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cobbancheq'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tcrcodigo
   function ajax_return_values_tcrcodigo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tcrcodigo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tcrcodigo);
              $aLookup = array();
              $this->_tmp_lookup_tcrcodigo = $this->tcrcodigo;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_tcrcodigo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_tcrcodigo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_tcrcodigo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_tcrcodigo'] = array(); 
}
$aLookup[] = array(form_cobros_pack_protect_string('null') => str_replace('<', '&lt;',form_cobros_pack_protect_string('------------------------')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_tcrcodigo'][] = 'null';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_cobfecha = $this->cobfecha;
   $old_value_cobvalefec = $this->cobvalefec;
   $old_value_cobvalcheq = $this->cobvalcheq;
   $old_value_cobvaltarjcred = $this->cobvaltarjcred;
   $old_value_cobvaltransf = $this->cobvaltransf;
   $old_value_cobvalretfte = $this->cobvalretfte;
   $old_value_cobvaltotal = $this->cobvaltotal;
   $old_value_cobvalcruz = $this->cobvalcruz;
   $old_value_saldo_favor = $this->saldo_favor;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_cobfecha = $this->cobfecha;
   $unformatted_value_cobvalefec = $this->cobvalefec;
   $unformatted_value_cobvalcheq = $this->cobvalcheq;
   $unformatted_value_cobvaltarjcred = $this->cobvaltarjcred;
   $unformatted_value_cobvaltransf = $this->cobvaltransf;
   $unformatted_value_cobvalretfte = $this->cobvalretfte;
   $unformatted_value_cobvaltotal = $this->cobvaltotal;
   $unformatted_value_cobvalcruz = $this->cobvalcruz;
   $unformatted_value_saldo_favor = $this->saldo_favor;

   $nm_comando = "SELECT tcrcodigo, tcrnombre  FROM tarjetas_credito  ORDER BY tcrnombre";

   $this->cobfecha = $old_value_cobfecha;
   $this->cobvalefec = $old_value_cobvalefec;
   $this->cobvalcheq = $old_value_cobvalcheq;
   $this->cobvaltarjcred = $old_value_cobvaltarjcred;
   $this->cobvaltransf = $old_value_cobvaltransf;
   $this->cobvalretfte = $old_value_cobvalretfte;
   $this->cobvaltotal = $old_value_cobvaltotal;
   $this->cobvalcruz = $old_value_cobvalcruz;
   $this->saldo_favor = $old_value_saldo_favor;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_cobros_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_cobros_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_tcrcodigo'][] = $rs->fields[0];
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
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"tcrcodigo\"";
          if (isset($this->NM_ajax_info['select_html']['tcrcodigo']) && !empty($this->NM_ajax_info['select_html']['tcrcodigo']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['tcrcodigo'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->tcrcodigo == $sValue)
                  {
                      $this->_tmp_lookup_tcrcodigo = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $Nm_tp_obj = (isset($this->nmgp_refresh_fields) && in_array("tcrcodigo", $this->nmgp_refresh_fields)) ? 'select' : 'text';
          $this->NM_ajax_info['fldList']['tcrcodigo'] = array(
                       'row'    => '',
               'type'    => $Nm_tp_obj,
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tcrcodigo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tcrcodigo']['valList'][$i] = form_cobros_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tcrcodigo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tcrcodigo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tcrcodigo']['labList'] = $aLabel;
          }
   }

          //----- cobnumtarjcred
   function ajax_return_values_cobnumtarjcred($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cobnumtarjcred", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cobnumtarjcred);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cobnumtarjcred'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cobbantransf
   function ajax_return_values_cobbantransf($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cobbantransf", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cobbantransf);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cobbantransf'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cobctatransf
   function ajax_return_values_cobctatransf($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cobctatransf", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cobctatransf);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cobctatransf'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- detalle_cobro
   function ajax_return_values_detalle_cobro($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("detalle_cobro", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->detalle_cobro);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['detalle_cobro'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['upload_dir'][$fieldName][] = $newName;
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
      if ($this->sc_evento == "novo" || $this->sc_evento == "incluir" || ($this->nmgp_opcao == "nada" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opc_ant']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opc_ant'] == "novo") || (isset($GLOBALS['erro_incl']) && 1 == $GLOBALS['erro_incl']))
      {
          if (!isset($this->nmgp_cmp_hidden["cobanula"]))
          {
              $this->nmgp_cmp_hidden["cobanula"] = "off"; $this->NM_ajax_info['fieldDisplay']['cobanula'] = 'off';
          }
      }
      else
      {
      }
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_cobros']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cobanula = $this->cobanula;
    $original_cobvalcruz = $this->cobvalcruz;
    $original_cobvaltotal = $this->cobvaltotal;
    $original_saldo_favor = $this->saldo_favor;
}
  $this->saldo_favor =$this->cobvaltotal -$this->cobvalcruz ;


if($this->cobanula ==1) {
	
	$this->NM_ajax_info['buttonDisplay']['ANULAR'] = $this->nmgp_botoes["ANULAR"] = "off";;	
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cobanula != $this->cobanula || (isset($bFlagRead_cobanula) && $bFlagRead_cobanula)))
    {
        $this->ajax_return_values_cobanula(true);
    }
    if (($original_cobvalcruz != $this->cobvalcruz || (isset($bFlagRead_cobvalcruz) && $bFlagRead_cobvalcruz)))
    {
        $this->ajax_return_values_cobvalcruz(true);
    }
    if (($original_cobvaltotal != $this->cobvaltotal || (isset($bFlagRead_cobvaltotal) && $bFlagRead_cobvaltotal)))
    {
        $this->ajax_return_values_cobvaltotal(true);
    }
    if (($original_saldo_favor != $this->saldo_favor || (isset($bFlagRead_saldo_favor) && $bFlagRead_saldo_favor)))
    {
        $this->ajax_return_values_saldo_favor(true);
    }
}
$_SESSION['scriptcase']['form_cobros']['contr_erro'] = 'off'; 
      }
      if (empty($this->cobfecanula))
      {
          $this->cobfecanula_hora = $this->cobfecanula;
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
      $this->cobvalefec = str_replace($sc_parm1, $sc_parm2, $this->cobvalefec); 
      $this->cobvalcheq = str_replace($sc_parm1, $sc_parm2, $this->cobvalcheq); 
      $this->cobvaltarjcred = str_replace($sc_parm1, $sc_parm2, $this->cobvaltarjcred); 
      $this->cobvaltransf = str_replace($sc_parm1, $sc_parm2, $this->cobvaltransf); 
      $this->cobvalretfte = str_replace($sc_parm1, $sc_parm2, $this->cobvalretfte); 
      $this->cobvaltotal = str_replace($sc_parm1, $sc_parm2, $this->cobvaltotal); 
      $this->cobvalcruz = str_replace($sc_parm1, $sc_parm2, $this->cobvalcruz); 
      $this->saldo_favor = str_replace($sc_parm1, $sc_parm2, $this->saldo_favor); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->cobvalefec = "'" . $this->cobvalefec . "'";
      $this->cobvalcheq = "'" . $this->cobvalcheq . "'";
      $this->cobvaltarjcred = "'" . $this->cobvaltarjcred . "'";
      $this->cobvaltransf = "'" . $this->cobvaltransf . "'";
      $this->cobvalretfte = "'" . $this->cobvalretfte . "'";
      $this->cobvaltotal = "'" . $this->cobvaltotal . "'";
      $this->cobvalcruz = "'" . $this->cobvalcruz . "'";
      $this->saldo_favor = "'" . $this->saldo_favor . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->cobvalefec = str_replace("'", "", $this->cobvalefec); 
      $this->cobvalcheq = str_replace("'", "", $this->cobvalcheq); 
      $this->cobvaltarjcred = str_replace("'", "", $this->cobvaltarjcred); 
      $this->cobvaltransf = str_replace("'", "", $this->cobvaltransf); 
      $this->cobvalretfte = str_replace("'", "", $this->cobvalretfte); 
      $this->cobvaltotal = str_replace("'", "", $this->cobvaltotal); 
      $this->cobvalcruz = str_replace("'", "", $this->cobvalcruz); 
      $this->saldo_favor = str_replace("'", "", $this->saldo_favor); 
   } 
//----------- 

   function controle_navegacao()
   {
      global $sc_where;

          if (false && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['total']))
          {
               $sc_where_pos = " WHERE ((emiruc < '" . substr($this->Db->qstr($this->emiruc), 1, -1) . "') OR (emiruc = '" . substr($this->Db->qstr($this->emiruc), 1, -1) . "' AND cobnumero < $this->cobnumero))";
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
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['total'] = $rsc->fields[0];
               $rsc->Close(); 
               if ('' != $this->cobnumero)
               {
               $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['inicio'] = $rsc->fields[0];
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['inicio'] < 0)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['inicio'] = 0;
               }
               $rsc->Close(); 
               }
               else
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['inicio'] = 0;
               }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['qt_reg_grid'] = 1;
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['inicio']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['inicio'] = 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['final']  = 0;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opcao'] = $this->NM_ajax_info['param']['nmgp_opcao'];
          if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opcao'], array('incluir', 'alterar', 'excluir')))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opcao'] = '';
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opcao'] == 'inicio')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['inicio'] = 0;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opcao'] == 'retorna')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['inicio'] = 0 ;
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opcao'] == 'avanca' && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['total']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['total'] > $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['final']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['final'];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opcao'] == 'final')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['inicio'] = 0;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['final'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['qt_reg_grid'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['final'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opcao'] = '';

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
    if ("excluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_cobros']['contr_erro'] = 'on';
              /* detalle_cobro */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM detalle_cobro WHERE cobemiruc = '" . $this->emiruc  . "' AND cobnumero = " . $this->cobnumero ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM detalle_cobro WHERE cobemiruc = '" . $this->emiruc  . "' AND cobnumero = " . $this->cobnumero ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM detalle_cobro WHERE cobemiruc = '" . $this->emiruc  . "' AND cobnumero = " . $this->cobnumero ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM detalle_cobro WHERE cobemiruc = '" . $this->emiruc  . "' AND cobnumero = " . $this->cobnumero ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM detalle_cobro WHERE cobemiruc = '" . $this->emiruc  . "' AND cobnumero = " . $this->cobnumero ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_detalle_cobro = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dataset_detalle_cobro[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_detalle_cobro = false;
          $this->dataset_detalle_cobro_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_detalle_cobro[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_cobros' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }
$_SESSION['scriptcase']['form_cobros']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $this->nmgp_opcao ; 
          if ($this->nmgp_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          else
          { 
              $this->sc_evento = ""; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->NM_rollback_db(); 
          $this->Campos_Mens_erro = ""; 
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
      $NM_val_form['fclnumero'] = $this->fclnumero;
      $NM_val_form['cobfecha'] = $this->cobfecha;
      $NM_val_form['cobvalefec'] = $this->cobvalefec;
      $NM_val_form['cobvalcheq'] = $this->cobvalcheq;
      $NM_val_form['cobvaltarjcred'] = $this->cobvaltarjcred;
      $NM_val_form['cobvaltransf'] = $this->cobvaltransf;
      $NM_val_form['cobvalretfte'] = $this->cobvalretfte;
      $NM_val_form['cobvaltotal'] = $this->cobvaltotal;
      $NM_val_form['cobvalcruz'] = $this->cobvalcruz;
      $NM_val_form['saldo_favor'] = $this->saldo_favor;
      $NM_val_form['cobanula'] = $this->cobanula;
      $NM_val_form['cobnumcheq'] = $this->cobnumcheq;
      $NM_val_form['cobbancheq'] = $this->cobbancheq;
      $NM_val_form['tcrcodigo'] = $this->tcrcodigo;
      $NM_val_form['cobnumtarjcred'] = $this->cobnumtarjcred;
      $NM_val_form['cobbantransf'] = $this->cobbantransf;
      $NM_val_form['cobctatransf'] = $this->cobctatransf;
      $NM_val_form['detalle_cobro'] = $this->detalle_cobro;
      $NM_val_form['emiruc'] = $this->emiruc;
      $NM_val_form['cobnumero'] = $this->cobnumero;
      $NM_val_form['cobfecanula'] = $this->cobfecanula;
      $NM_val_form['cobusucrea'] = $this->cobusucrea;
      if ($this->cobnumero === "" || is_null($this->cobnumero))  
      { 
          $this->cobnumero = 0;
      } 
      if ($this->fclnumero === "" || is_null($this->fclnumero))  
      { 
          $this->fclnumero = 0;
          $this->sc_force_zero[] = 'fclnumero';
      } 
      if ($this->cobvalefec === "" || is_null($this->cobvalefec))  
      { 
          $this->cobvalefec = 0;
          $this->sc_force_zero[] = 'cobvalefec';
      } 
      if ($this->cobvalcheq === "" || is_null($this->cobvalcheq))  
      { 
          $this->cobvalcheq = 0;
          $this->sc_force_zero[] = 'cobvalcheq';
      } 
      if ($this->cobvaltarjcred === "" || is_null($this->cobvaltarjcred))  
      { 
          $this->cobvaltarjcred = 0;
          $this->sc_force_zero[] = 'cobvaltarjcred';
      } 
      if ($this->cobvaltransf === "" || is_null($this->cobvaltransf))  
      { 
          $this->cobvaltransf = 0;
          $this->sc_force_zero[] = 'cobvaltransf';
      } 
      if ($this->cobvalretfte === "" || is_null($this->cobvalretfte))  
      { 
          $this->cobvalretfte = 0;
          $this->sc_force_zero[] = 'cobvalretfte';
      } 
      if ($this->cobvaltotal === "" || is_null($this->cobvaltotal))  
      { 
          $this->cobvaltotal = 0;
          $this->sc_force_zero[] = 'cobvaltotal';
      } 
      if ($this->tcrcodigo === "" || is_null($this->tcrcodigo))  
      { 
          $this->tcrcodigo = 0;
          $this->sc_force_zero[] = 'tcrcodigo';
      } 
      if ($this->cobvalcruz === "" || is_null($this->cobvalcruz))  
      { 
          $this->cobvalcruz = 0;
          $this->sc_force_zero[] = 'cobvalcruz';
      } 
      if ($this->cobanula === "" || is_null($this->cobanula))  
      { 
          $this->cobanula = 0;
          $this->sc_force_zero[] = 'cobanula';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->emiruc_before_qstr = $this->emiruc;
          $this->emiruc = substr($this->Db->qstr($this->emiruc), 1, -1); 
          if ($this->emiruc == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->emiruc = "null"; 
              $NM_val_null[] = "emiruc";
          } 
          if ($this->cobfecha == "")  
          { 
              $this->cobfecha = "null"; 
              $NM_val_null[] = "cobfecha";
          } 
          $this->cobnumcheq_before_qstr = $this->cobnumcheq;
          $this->cobnumcheq = substr($this->Db->qstr($this->cobnumcheq), 1, -1); 
          if ($this->cobnumcheq == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cobnumcheq = "null"; 
              $NM_val_null[] = "cobnumcheq";
          } 
          $this->cobbancheq_before_qstr = $this->cobbancheq;
          $this->cobbancheq = substr($this->Db->qstr($this->cobbancheq), 1, -1); 
          if ($this->cobbancheq == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cobbancheq = "null"; 
              $NM_val_null[] = "cobbancheq";
          } 
          $this->cobnumtarjcred_before_qstr = $this->cobnumtarjcred;
          $this->cobnumtarjcred = substr($this->Db->qstr($this->cobnumtarjcred), 1, -1); 
          if ($this->cobnumtarjcred == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cobnumtarjcred = "null"; 
              $NM_val_null[] = "cobnumtarjcred";
          } 
          $this->cobbantransf_before_qstr = $this->cobbantransf;
          $this->cobbantransf = substr($this->Db->qstr($this->cobbantransf), 1, -1); 
          if ($this->cobbantransf == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cobbantransf = "null"; 
              $NM_val_null[] = "cobbantransf";
          } 
          $this->cobctatransf_before_qstr = $this->cobctatransf;
          $this->cobctatransf = substr($this->Db->qstr($this->cobctatransf), 1, -1); 
          if ($this->cobctatransf == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cobctatransf = "null"; 
              $NM_val_null[] = "cobctatransf";
          } 
          if ($this->cobfecanula == "")  
          { 
              $this->cobfecanula = "null"; 
              $NM_val_null[] = "cobfecanula";
          } 
          $this->cobusucrea_before_qstr = $this->cobusucrea;
          $this->cobusucrea = substr($this->Db->qstr($this->cobusucrea), 1, -1); 
          if ($this->cobusucrea == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cobusucrea = "null"; 
              $NM_val_null[] = "cobusucrea";
          } 
          $this->detalle_cobro_before_qstr = $this->detalle_cobro;
          $this->detalle_cobro = substr($this->Db->qstr($this->detalle_cobro), 1, -1); 
          if ($this->detalle_cobro == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->detalle_cobro = "null"; 
              $NM_val_null[] = "detalle_cobro";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_cobros_pack_ajax_response();
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
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
              } 
              if (isset($NM_val_form['fclnumero']) && $NM_val_form['fclnumero'] != $this->nmgp_dados_select['fclnumero']) 
              { 
                  $SC_fields_update[] = "fclnumero = $this->fclnumero"; 
              } 
              if (isset($NM_val_form['cobfecha']) && $NM_val_form['cobfecha'] != $this->nmgp_dados_select['cobfecha']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "cobfecha = #$this->cobfecha#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "cobfecha = EXTEND('" . $this->cobfecha . "', YEAR TO DAY)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "cobfecha = " . $this->Ini->date_delim . $this->cobfecha . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['cobvalefec']) && $NM_val_form['cobvalefec'] != $this->nmgp_dados_select['cobvalefec']) 
              { 
                  $SC_fields_update[] = "cobvalefec = $this->cobvalefec"; 
              } 
              if (isset($NM_val_form['cobvalcheq']) && $NM_val_form['cobvalcheq'] != $this->nmgp_dados_select['cobvalcheq']) 
              { 
                  $SC_fields_update[] = "cobvalcheq = $this->cobvalcheq"; 
              } 
              if (isset($NM_val_form['cobvaltarjcred']) && $NM_val_form['cobvaltarjcred'] != $this->nmgp_dados_select['cobvaltarjcred']) 
              { 
                  $SC_fields_update[] = "cobvaltarjcred = $this->cobvaltarjcred"; 
              } 
              if (isset($NM_val_form['cobvaltransf']) && $NM_val_form['cobvaltransf'] != $this->nmgp_dados_select['cobvaltransf']) 
              { 
                  $SC_fields_update[] = "cobvaltransf = $this->cobvaltransf"; 
              } 
              if (isset($NM_val_form['cobvalretfte']) && $NM_val_form['cobvalretfte'] != $this->nmgp_dados_select['cobvalretfte']) 
              { 
                  $SC_fields_update[] = "cobvalretfte = $this->cobvalretfte"; 
              } 
              if (isset($NM_val_form['cobvaltotal']) && $NM_val_form['cobvaltotal'] != $this->nmgp_dados_select['cobvaltotal']) 
              { 
                  $SC_fields_update[] = "cobvaltotal = $this->cobvaltotal"; 
              } 
              if (isset($NM_val_form['cobnumcheq']) && $NM_val_form['cobnumcheq'] != $this->nmgp_dados_select['cobnumcheq']) 
              { 
                  $SC_fields_update[] = "cobnumcheq = '$this->cobnumcheq'"; 
              } 
              if (isset($NM_val_form['cobbancheq']) && $NM_val_form['cobbancheq'] != $this->nmgp_dados_select['cobbancheq']) 
              { 
                  $SC_fields_update[] = "cobbancheq = '$this->cobbancheq'"; 
              } 
              if (isset($NM_val_form['tcrcodigo']) && $NM_val_form['tcrcodigo'] != $this->nmgp_dados_select['tcrcodigo']) 
              { 
                  $SC_fields_update[] = "tcrcodigo = $this->tcrcodigo"; 
              } 
              if (isset($NM_val_form['cobnumtarjcred']) && $NM_val_form['cobnumtarjcred'] != $this->nmgp_dados_select['cobnumtarjcred']) 
              { 
                  $SC_fields_update[] = "cobnumtarjcred = '$this->cobnumtarjcred'"; 
              } 
              if (isset($NM_val_form['cobbantransf']) && $NM_val_form['cobbantransf'] != $this->nmgp_dados_select['cobbantransf']) 
              { 
                  $SC_fields_update[] = "cobbantransf = '$this->cobbantransf'"; 
              } 
              if (isset($NM_val_form['cobctatransf']) && $NM_val_form['cobctatransf'] != $this->nmgp_dados_select['cobctatransf']) 
              { 
                  $SC_fields_update[] = "cobctatransf = '$this->cobctatransf'"; 
              } 
              if (isset($NM_val_form['cobvalcruz']) && $NM_val_form['cobvalcruz'] != $this->nmgp_dados_select['cobvalcruz']) 
              { 
                  $SC_fields_update[] = "cobvalcruz = $this->cobvalcruz"; 
              } 
              if (isset($NM_val_form['cobanula']) && $NM_val_form['cobanula'] != $this->nmgp_dados_select['cobanula']) 
              { 
                  $SC_fields_update[] = "cobanula = $this->cobanula"; 
              } 
              if (isset($NM_val_form['cobfecanula']) && $NM_val_form['cobfecanula'] != $this->nmgp_dados_select['cobfecanula']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "cobfecanula = #$this->cobfecanula#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "cobfecanula = EXTEND('" . $this->cobfecanula . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "cobfecanula = " . $this->Ini->date_delim . $this->cobfecanula . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['cobusucrea']) && $NM_val_form['cobusucrea'] != $this->nmgp_dados_select['cobusucrea']) 
              { 
                  $SC_fields_update[] = "cobusucrea = '$this->cobusucrea'"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE emiruc = '$this->emiruc' and cobnumero = $this->cobnumero ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE emiruc = '$this->emiruc' and cobnumero = $this->cobnumero ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE emiruc = '$this->emiruc' and cobnumero = $this->cobnumero ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE emiruc = '$this->emiruc' and cobnumero = $this->cobnumero ";  
              }  
              else  
              {
                  $comando .= " WHERE emiruc = '$this->emiruc' and cobnumero = $this->cobnumero ";  
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
                                  form_cobros_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->emiruc = $this->emiruc_before_qstr;
              $this->cobnumcheq = $this->cobnumcheq_before_qstr;
              $this->cobbancheq = $this->cobbancheq_before_qstr;
              $this->cobnumtarjcred = $this->cobnumtarjcred_before_qstr;
              $this->cobbantransf = $this->cobbantransf_before_qstr;
              $this->cobctatransf = $this->cobctatransf_before_qstr;
              $this->cobusucrea = $this->cobusucrea_before_qstr;
              $this->detalle_cobro = $this->detalle_cobro_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['fclnumero'])) { $this->fclnumero = $NM_val_form['fclnumero']; }
              elseif (isset($this->fclnumero)) { $this->nm_limpa_alfa($this->fclnumero); }
              if     (isset($NM_val_form) && isset($NM_val_form['cobvalefec'])) { $this->cobvalefec = $NM_val_form['cobvalefec']; }
              elseif (isset($this->cobvalefec)) { $this->nm_limpa_alfa($this->cobvalefec); }
              if     (isset($NM_val_form) && isset($NM_val_form['cobvalcheq'])) { $this->cobvalcheq = $NM_val_form['cobvalcheq']; }
              elseif (isset($this->cobvalcheq)) { $this->nm_limpa_alfa($this->cobvalcheq); }
              if     (isset($NM_val_form) && isset($NM_val_form['cobvaltarjcred'])) { $this->cobvaltarjcred = $NM_val_form['cobvaltarjcred']; }
              elseif (isset($this->cobvaltarjcred)) { $this->nm_limpa_alfa($this->cobvaltarjcred); }
              if     (isset($NM_val_form) && isset($NM_val_form['cobvaltransf'])) { $this->cobvaltransf = $NM_val_form['cobvaltransf']; }
              elseif (isset($this->cobvaltransf)) { $this->nm_limpa_alfa($this->cobvaltransf); }
              if     (isset($NM_val_form) && isset($NM_val_form['cobvalretfte'])) { $this->cobvalretfte = $NM_val_form['cobvalretfte']; }
              elseif (isset($this->cobvalretfte)) { $this->nm_limpa_alfa($this->cobvalretfte); }
              if     (isset($NM_val_form) && isset($NM_val_form['cobvaltotal'])) { $this->cobvaltotal = $NM_val_form['cobvaltotal']; }
              elseif (isset($this->cobvaltotal)) { $this->nm_limpa_alfa($this->cobvaltotal); }
              if     (isset($NM_val_form) && isset($NM_val_form['cobnumcheq'])) { $this->cobnumcheq = $NM_val_form['cobnumcheq']; }
              elseif (isset($this->cobnumcheq)) { $this->nm_limpa_alfa($this->cobnumcheq); }
              if     (isset($NM_val_form) && isset($NM_val_form['cobbancheq'])) { $this->cobbancheq = $NM_val_form['cobbancheq']; }
              elseif (isset($this->cobbancheq)) { $this->nm_limpa_alfa($this->cobbancheq); }
              if     (isset($NM_val_form) && isset($NM_val_form['tcrcodigo'])) { $this->tcrcodigo = $NM_val_form['tcrcodigo']; }
              elseif (isset($this->tcrcodigo)) { $this->nm_limpa_alfa($this->tcrcodigo); }
              if     (isset($NM_val_form) && isset($NM_val_form['cobnumtarjcred'])) { $this->cobnumtarjcred = $NM_val_form['cobnumtarjcred']; }
              elseif (isset($this->cobnumtarjcred)) { $this->nm_limpa_alfa($this->cobnumtarjcred); }
              if     (isset($NM_val_form) && isset($NM_val_form['cobbantransf'])) { $this->cobbantransf = $NM_val_form['cobbantransf']; }
              elseif (isset($this->cobbantransf)) { $this->nm_limpa_alfa($this->cobbantransf); }
              if     (isset($NM_val_form) && isset($NM_val_form['cobctatransf'])) { $this->cobctatransf = $NM_val_form['cobctatransf']; }
              elseif (isset($this->cobctatransf)) { $this->nm_limpa_alfa($this->cobctatransf); }
              if     (isset($NM_val_form) && isset($NM_val_form['cobvalcruz'])) { $this->cobvalcruz = $NM_val_form['cobvalcruz']; }
              elseif (isset($this->cobvalcruz)) { $this->nm_limpa_alfa($this->cobvalcruz); }
              if     (isset($NM_val_form) && isset($NM_val_form['cobanula'])) { $this->cobanula = $NM_val_form['cobanula']; }
              elseif (isset($this->cobanula)) { $this->nm_limpa_alfa($this->cobanula); }
              if     (isset($NM_val_form) && isset($NM_val_form['detalle_cobro'])) { $this->detalle_cobro = $NM_val_form['detalle_cobro']; }
              elseif (isset($this->detalle_cobro)) { $this->nm_limpa_alfa($this->detalle_cobro); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('fclnumero', 'cobfecha', 'cobvalefec', 'cobvalcheq', 'cobvaltarjcred', 'cobvaltransf', 'cobvalretfte', 'cobvaltotal', 'cobvalcruz', 'saldo_favor', 'cobanula', 'cobnumcheq', 'cobbancheq', 'tcrcodigo', 'cobnumtarjcred', 'cobbantransf', 'cobctatransf', 'detalle_cobro'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          $bInsertOk = true;
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "); 
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
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_cobros_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (emiruc, cobnumero, fclnumero, cobfecha, cobvalefec, cobvalcheq, cobvaltarjcred, cobvaltransf, cobvalretfte, cobvaltotal, cobnumcheq, cobbancheq, tcrcodigo, cobnumtarjcred, cobbantransf, cobctatransf, cobvalcruz, cobanula, cobfecanula, cobusucrea) VALUES ('$this->emiruc', $this->cobnumero, $this->fclnumero, #$this->cobfecha#, $this->cobvalefec, $this->cobvalcheq, $this->cobvaltarjcred, $this->cobvaltransf, $this->cobvalretfte, $this->cobvaltotal, '$this->cobnumcheq', '$this->cobbancheq', $this->tcrcodigo, '$this->cobnumtarjcred', '$this->cobbantransf', '$this->cobctatransf', $this->cobvalcruz, $this->cobanula, #$this->cobfecanula#, '$this->cobusucrea')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "emiruc, cobnumero, fclnumero, cobfecha, cobvalefec, cobvalcheq, cobvaltarjcred, cobvaltransf, cobvalretfte, cobvaltotal, cobnumcheq, cobbancheq, tcrcodigo, cobnumtarjcred, cobbantransf, cobctatransf, cobvalcruz, cobanula, cobfecanula, cobusucrea) VALUES (" . $NM_seq_auto . "'$this->emiruc', $this->cobnumero, $this->fclnumero, " . $this->Ini->date_delim . $this->cobfecha . $this->Ini->date_delim1 . ", $this->cobvalefec, $this->cobvalcheq, $this->cobvaltarjcred, $this->cobvaltransf, $this->cobvalretfte, $this->cobvaltotal, '$this->cobnumcheq', '$this->cobbancheq', $this->tcrcodigo, '$this->cobnumtarjcred', '$this->cobbantransf', '$this->cobctatransf', $this->cobvalcruz, $this->cobanula, " . $this->Ini->date_delim . $this->cobfecanula . $this->Ini->date_delim1 . ", '$this->cobusucrea')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "emiruc, cobnumero, fclnumero, cobfecha, cobvalefec, cobvalcheq, cobvaltarjcred, cobvaltransf, cobvalretfte, cobvaltotal, cobnumcheq, cobbancheq, tcrcodigo, cobnumtarjcred, cobbantransf, cobctatransf, cobvalcruz, cobanula, cobfecanula, cobusucrea) VALUES (" . $NM_seq_auto . "'$this->emiruc', $this->cobnumero, $this->fclnumero, " . $this->Ini->date_delim . $this->cobfecha . $this->Ini->date_delim1 . ", $this->cobvalefec, $this->cobvalcheq, $this->cobvaltarjcred, $this->cobvaltransf, $this->cobvalretfte, $this->cobvaltotal, '$this->cobnumcheq', '$this->cobbancheq', $this->tcrcodigo, '$this->cobnumtarjcred', '$this->cobbantransf', '$this->cobctatransf', $this->cobvalcruz, $this->cobanula, " . $this->Ini->date_delim . $this->cobfecanula . $this->Ini->date_delim1 . ", '$this->cobusucrea')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "emiruc, cobnumero, fclnumero, cobfecha, cobvalefec, cobvalcheq, cobvaltarjcred, cobvaltransf, cobvalretfte, cobvaltotal, cobnumcheq, cobbancheq, tcrcodigo, cobnumtarjcred, cobbantransf, cobctatransf, cobvalcruz, cobanula, cobfecanula, cobusucrea) VALUES (" . $NM_seq_auto . "'$this->emiruc', $this->cobnumero, $this->fclnumero, " . $this->Ini->date_delim . $this->cobfecha . $this->Ini->date_delim1 . ", $this->cobvalefec, $this->cobvalcheq, $this->cobvaltarjcred, $this->cobvaltransf, $this->cobvalretfte, $this->cobvaltotal, '$this->cobnumcheq', '$this->cobbancheq', $this->tcrcodigo, '$this->cobnumtarjcred', '$this->cobbantransf', '$this->cobctatransf', $this->cobvalcruz, $this->cobanula, " . $this->Ini->date_delim . $this->cobfecanula . $this->Ini->date_delim1 . ", '$this->cobusucrea')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "emiruc, cobnumero, fclnumero, cobfecha, cobvalefec, cobvalcheq, cobvaltarjcred, cobvaltransf, cobvalretfte, cobvaltotal, cobnumcheq, cobbancheq, tcrcodigo, cobnumtarjcred, cobbantransf, cobctatransf, cobvalcruz, cobanula, cobfecanula, cobusucrea) VALUES (" . $NM_seq_auto . "'$this->emiruc', $this->cobnumero, $this->fclnumero, EXTEND('$this->cobfecha', YEAR TO DAY), $this->cobvalefec, $this->cobvalcheq, $this->cobvaltarjcred, $this->cobvaltransf, $this->cobvalretfte, $this->cobvaltotal, '$this->cobnumcheq', '$this->cobbancheq', $this->tcrcodigo, '$this->cobnumtarjcred', '$this->cobbantransf', '$this->cobctatransf', $this->cobvalcruz, $this->cobanula, EXTEND('$this->cobfecanula', YEAR TO FRACTION), '$this->cobusucrea')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "emiruc, cobnumero, fclnumero, cobfecha, cobvalefec, cobvalcheq, cobvaltarjcred, cobvaltransf, cobvalretfte, cobvaltotal, cobnumcheq, cobbancheq, tcrcodigo, cobnumtarjcred, cobbantransf, cobctatransf, cobvalcruz, cobanula, cobfecanula, cobusucrea) VALUES (" . $NM_seq_auto . "'$this->emiruc', $this->cobnumero, $this->fclnumero, " . $this->Ini->date_delim . $this->cobfecha . $this->Ini->date_delim1 . ", $this->cobvalefec, $this->cobvalcheq, $this->cobvaltarjcred, $this->cobvaltransf, $this->cobvalretfte, $this->cobvaltotal, '$this->cobnumcheq', '$this->cobbancheq', $this->tcrcodigo, '$this->cobnumtarjcred', '$this->cobbantransf', '$this->cobctatransf', $this->cobvalcruz, $this->cobanula, " . $this->Ini->date_delim . $this->cobfecanula . $this->Ini->date_delim1 . ", '$this->cobusucrea')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "emiruc, cobnumero, fclnumero, cobfecha, cobvalefec, cobvalcheq, cobvaltarjcred, cobvaltransf, cobvalretfte, cobvaltotal, cobnumcheq, cobbancheq, tcrcodigo, cobnumtarjcred, cobbantransf, cobctatransf, cobvalcruz, cobanula, cobfecanula, cobusucrea) VALUES (" . $NM_seq_auto . "'$this->emiruc', $this->cobnumero, $this->fclnumero, " . $this->Ini->date_delim . $this->cobfecha . $this->Ini->date_delim1 . ", $this->cobvalefec, $this->cobvalcheq, $this->cobvaltarjcred, $this->cobvaltransf, $this->cobvalretfte, $this->cobvaltotal, '$this->cobnumcheq', '$this->cobbancheq', $this->tcrcodigo, '$this->cobnumtarjcred', '$this->cobbantransf', '$this->cobctatransf', $this->cobvalcruz, $this->cobanula, " . $this->Ini->date_delim . $this->cobfecanula . $this->Ini->date_delim1 . ", '$this->cobusucrea')"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "emiruc, cobnumero, fclnumero, cobfecha, cobvalefec, cobvalcheq, cobvaltarjcred, cobvaltransf, cobvalretfte, cobvaltotal, cobnumcheq, cobbancheq, tcrcodigo, cobnumtarjcred, cobbantransf, cobctatransf, cobvalcruz, cobanula, cobfecanula, cobusucrea) VALUES (" . $NM_seq_auto . "'$this->emiruc', $this->cobnumero, $this->fclnumero, " . $this->Ini->date_delim . $this->cobfecha . $this->Ini->date_delim1 . ", $this->cobvalefec, $this->cobvalcheq, $this->cobvaltarjcred, $this->cobvaltransf, $this->cobvalretfte, $this->cobvaltotal, '$this->cobnumcheq', '$this->cobbancheq', $this->tcrcodigo, '$this->cobnumtarjcred', '$this->cobbantransf', '$this->cobctatransf', $this->cobvalcruz, $this->cobanula, " . $this->Ini->date_delim . $this->cobfecanula . $this->Ini->date_delim1 . ", '$this->cobusucrea')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "emiruc, cobnumero, fclnumero, cobfecha, cobvalefec, cobvalcheq, cobvaltarjcred, cobvaltransf, cobvalretfte, cobvaltotal, cobnumcheq, cobbancheq, tcrcodigo, cobnumtarjcred, cobbantransf, cobctatransf, cobvalcruz, cobanula, cobfecanula, cobusucrea) VALUES (" . $NM_seq_auto . "'$this->emiruc', $this->cobnumero, $this->fclnumero, " . $this->Ini->date_delim . $this->cobfecha . $this->Ini->date_delim1 . ", $this->cobvalefec, $this->cobvalcheq, $this->cobvaltarjcred, $this->cobvaltransf, $this->cobvalretfte, $this->cobvaltotal, '$this->cobnumcheq', '$this->cobbancheq', $this->tcrcodigo, '$this->cobnumtarjcred', '$this->cobbantransf', '$this->cobctatransf', $this->cobvalcruz, $this->cobanula, " . $this->Ini->date_delim . $this->cobfecanula . $this->Ini->date_delim1 . ", '$this->cobusucrea')"; 
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
                              form_cobros_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->emiruc = $this->emiruc_before_qstr;
              $this->cobnumcheq = $this->cobnumcheq_before_qstr;
              $this->cobbancheq = $this->cobbancheq_before_qstr;
              $this->cobnumtarjcred = $this->cobnumtarjcred_before_qstr;
              $this->cobbantransf = $this->cobbantransf_before_qstr;
              $this->cobctatransf = $this->cobctatransf_before_qstr;
              $this->cobusucrea = $this->cobusucrea_before_qstr;
              $this->detalle_cobro = $this->detalle_cobro_before_qstr;
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              $this->nmgp_botoes['ANULAR'] = "on";
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->emiruc = substr($this->Db->qstr($this->emiruc), 1, -1); 
          $this->cobnumero = substr($this->Db->qstr($this->cobnumero), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where emiruc = '$this->emiruc' and cobnumero = $this->cobnumero "); 
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
                          form_cobros_pack_ajax_response();
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['total']);
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['parms'] = "emiruc?#?$this->emiruc?@?cobnumero?#?$this->cobnumero?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->emiruc = null === $this->emiruc ? null : substr($this->Db->qstr($this->emiruc), 1, -1); 
          $this->cobnumero = null === $this->cobnumero ? null : substr($this->Db->qstr($this->cobnumero), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_filter'] . ")";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT emiruc, cobnumero, fclnumero, str_replace (convert(char(10),cobfecha,102), '.', '-') + ' ' + convert(char(8),cobfecha,20), cobvalefec, cobvalcheq, cobvaltarjcred, cobvaltransf, cobvalretfte, cobvaltotal, cobnumcheq, cobbancheq, tcrcodigo, cobnumtarjcred, cobbantransf, cobctatransf, cobvalcruz, cobanula, str_replace (convert(char(10),cobfecanula,102), '.', '-') + ' ' + convert(char(8),cobfecanula,20), cobusucrea from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT emiruc, cobnumero, fclnumero, convert(char(23),cobfecha,121), cobvalefec, cobvalcheq, cobvaltarjcred, cobvaltransf, cobvalretfte, cobvaltotal, cobnumcheq, cobbancheq, tcrcodigo, cobnumtarjcred, cobbantransf, cobctatransf, cobvalcruz, cobanula, convert(char(23),cobfecanula,121), cobusucrea from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT emiruc, cobnumero, fclnumero, cobfecha, cobvalefec, cobvalcheq, cobvaltarjcred, cobvaltransf, cobvalretfte, cobvaltotal, cobnumcheq, cobbancheq, tcrcodigo, cobnumtarjcred, cobbantransf, cobctatransf, cobvalcruz, cobanula, cobfecanula, cobusucrea from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT emiruc, cobnumero, fclnumero, EXTEND(cobfecha, YEAR TO DAY), cobvalefec, cobvalcheq, cobvaltarjcred, cobvaltransf, cobvalretfte, cobvaltotal, cobnumcheq, cobbancheq, tcrcodigo, cobnumtarjcred, cobbantransf, cobctatransf, cobvalcruz, cobanula, EXTEND(cobfecanula, YEAR TO FRACTION), cobusucrea from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT emiruc, cobnumero, fclnumero, cobfecha, cobvalefec, cobvalcheq, cobvaltarjcred, cobvaltransf, cobvalretfte, cobvaltotal, cobnumcheq, cobbancheq, tcrcodigo, cobnumtarjcred, cobbantransf, cobctatransf, cobvalcruz, cobanula, cobfecanula, cobusucrea from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "emiruc = '$this->emiruc' and cobnumero = $this->cobnumero"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "emiruc = '$this->emiruc' and cobnumero = $this->cobnumero"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "emiruc = '$this->emiruc' and cobnumero = $this->cobnumero"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "emiruc = '$this->emiruc' and cobnumero = $this->cobnumero"; 
              }  
              else  
              {
                  $aWhere[] = "emiruc = '$this->emiruc' and cobnumero = $this->cobnumero"; 
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
          $sc_order_by = "emiruc, cobnumero";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['select'] = ""; 
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['ANULAR'] = $this->nmgp_botoes['ANULAR'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['empty_filter'] = true;
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
              $this->emiruc = $rs->fields[0] ; 
              $this->nmgp_dados_select['emiruc'] = $this->emiruc;
              $this->cobnumero = $rs->fields[1] ; 
              $this->nmgp_dados_select['cobnumero'] = $this->cobnumero;
              $this->fclnumero = $rs->fields[2] ; 
              $this->nmgp_dados_select['fclnumero'] = $this->fclnumero;
              $this->cobfecha = $rs->fields[3] ; 
              $this->nmgp_dados_select['cobfecha'] = $this->cobfecha;
              $this->cobvalefec = trim($rs->fields[4]) ; 
              $this->nmgp_dados_select['cobvalefec'] = $this->cobvalefec;
              $this->cobvalcheq = trim($rs->fields[5]) ; 
              $this->nmgp_dados_select['cobvalcheq'] = $this->cobvalcheq;
              $this->cobvaltarjcred = trim($rs->fields[6]) ; 
              $this->nmgp_dados_select['cobvaltarjcred'] = $this->cobvaltarjcred;
              $this->cobvaltransf = trim($rs->fields[7]) ; 
              $this->nmgp_dados_select['cobvaltransf'] = $this->cobvaltransf;
              $this->cobvalretfte = trim($rs->fields[8]) ; 
              $this->nmgp_dados_select['cobvalretfte'] = $this->cobvalretfte;
              $this->cobvaltotal = trim($rs->fields[9]) ; 
              $this->nmgp_dados_select['cobvaltotal'] = $this->cobvaltotal;
              $this->cobnumcheq = $rs->fields[10] ; 
              $this->nmgp_dados_select['cobnumcheq'] = $this->cobnumcheq;
              $this->cobbancheq = $rs->fields[11] ; 
              $this->nmgp_dados_select['cobbancheq'] = $this->cobbancheq;
              $this->tcrcodigo = $rs->fields[12] ; 
              $this->nmgp_dados_select['tcrcodigo'] = $this->tcrcodigo;
              $this->cobnumtarjcred = $rs->fields[13] ; 
              $this->nmgp_dados_select['cobnumtarjcred'] = $this->cobnumtarjcred;
              $this->cobbantransf = $rs->fields[14] ; 
              $this->nmgp_dados_select['cobbantransf'] = $this->cobbantransf;
              $this->cobctatransf = $rs->fields[15] ; 
              $this->nmgp_dados_select['cobctatransf'] = $this->cobctatransf;
              $this->cobvalcruz = trim($rs->fields[16]) ; 
              $this->nmgp_dados_select['cobvalcruz'] = $this->cobvalcruz;
              $this->cobanula = $rs->fields[17] ; 
              $this->nmgp_dados_select['cobanula'] = $this->cobanula;
              $this->cobfecanula = $rs->fields[18] ; 
              if (substr($this->cobfecanula, 10, 1) == "-") 
              { 
                 $this->cobfecanula = substr($this->cobfecanula, 0, 10) . " " . substr($this->cobfecanula, 11);
              } 
              if (substr($this->cobfecanula, 13, 1) == ".") 
              { 
                 $this->cobfecanula = substr($this->cobfecanula, 0, 13) . ":" . substr($this->cobfecanula, 14, 2) . ":" . substr($this->cobfecanula, 17);
              } 
              $this->nmgp_dados_select['cobfecanula'] = $this->cobfecanula;
              $this->cobusucrea = $rs->fields[19] ; 
              $this->nmgp_dados_select['cobusucrea'] = $this->cobusucrea;
              $this->detalle_cobro = $rs->fields[20] ; 
              $this->nmgp_dados_select['detalle_cobro'] = $this->detalle_cobro;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->cobnumero = (string)$this->cobnumero; 
              $this->fclnumero = (string)$this->fclnumero; 
              $this->cobvalefec = (strpos(strtolower($this->cobvalefec), "e")) ? (float)$this->cobvalefec : $this->cobvalefec; 
              $this->cobvalefec = (string)$this->cobvalefec; 
              $this->cobvalcheq = (strpos(strtolower($this->cobvalcheq), "e")) ? (float)$this->cobvalcheq : $this->cobvalcheq; 
              $this->cobvalcheq = (string)$this->cobvalcheq; 
              $this->cobvaltarjcred = (strpos(strtolower($this->cobvaltarjcred), "e")) ? (float)$this->cobvaltarjcred : $this->cobvaltarjcred; 
              $this->cobvaltarjcred = (string)$this->cobvaltarjcred; 
              $this->cobvaltransf = (strpos(strtolower($this->cobvaltransf), "e")) ? (float)$this->cobvaltransf : $this->cobvaltransf; 
              $this->cobvaltransf = (string)$this->cobvaltransf; 
              $this->cobvalretfte = (strpos(strtolower($this->cobvalretfte), "e")) ? (float)$this->cobvalretfte : $this->cobvalretfte; 
              $this->cobvalretfte = (string)$this->cobvalretfte; 
              $this->cobvaltotal = (strpos(strtolower($this->cobvaltotal), "e")) ? (float)$this->cobvaltotal : $this->cobvaltotal; 
              $this->cobvaltotal = (string)$this->cobvaltotal; 
              $this->tcrcodigo = (string)$this->tcrcodigo; 
              $this->cobvalcruz = (strpos(strtolower($this->cobvalcruz), "e")) ? (float)$this->cobvalcruz : $this->cobvalcruz; 
              $this->cobvalcruz = (string)$this->cobvalcruz; 
              $this->cobanula = (string)$this->cobanula; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['parms'] = "emiruc?#?$this->emiruc?@?cobnumero?#?$this->cobnumero?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_select'] = $this->nmgp_dados_select;
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
              $this->emiruc = "";  
              $this->nmgp_dados_form["emiruc"] = $this->emiruc;
              $this->cobnumero = "";  
              $this->nmgp_dados_form["cobnumero"] = $this->cobnumero;
              $this->fclnumero = "";  
              $this->nmgp_dados_form["fclnumero"] = $this->fclnumero;
              $this->cobfecha = "";  
              $this->cobfecha_hora = "" ;  
              $this->nmgp_dados_form["cobfecha"] = $this->cobfecha;
              $this->cobvalefec = "";  
              $this->nmgp_dados_form["cobvalefec"] = $this->cobvalefec;
              $this->cobvalcheq = "";  
              $this->nmgp_dados_form["cobvalcheq"] = $this->cobvalcheq;
              $this->cobvaltarjcred = "";  
              $this->nmgp_dados_form["cobvaltarjcred"] = $this->cobvaltarjcred;
              $this->cobvaltransf = "";  
              $this->nmgp_dados_form["cobvaltransf"] = $this->cobvaltransf;
              $this->cobvalretfte = "";  
              $this->nmgp_dados_form["cobvalretfte"] = $this->cobvalretfte;
              $this->cobvaltotal = "";  
              $this->nmgp_dados_form["cobvaltotal"] = $this->cobvaltotal;
              $this->cobnumcheq = "";  
              $this->nmgp_dados_form["cobnumcheq"] = $this->cobnumcheq;
              $this->cobbancheq = "";  
              $this->nmgp_dados_form["cobbancheq"] = $this->cobbancheq;
              $this->tcrcodigo = "";  
              $this->nmgp_dados_form["tcrcodigo"] = $this->tcrcodigo;
              $this->cobnumtarjcred = "";  
              $this->nmgp_dados_form["cobnumtarjcred"] = $this->cobnumtarjcred;
              $this->cobbantransf = "";  
              $this->nmgp_dados_form["cobbantransf"] = $this->cobbantransf;
              $this->cobctatransf = "";  
              $this->nmgp_dados_form["cobctatransf"] = $this->cobctatransf;
              $this->cobvalcruz = "";  
              $this->nmgp_dados_form["cobvalcruz"] = $this->cobvalcruz;
              $this->cobanula = "";  
              $this->nmgp_dados_form["cobanula"] = $this->cobanula;
              $this->cobfecanula = "";  
              $this->cobfecanula_hora = "" ;  
              $this->nmgp_dados_form["cobfecanula"] = $this->cobfecanula;
              $this->cobusucrea = "";  
              $this->nmgp_dados_form["cobusucrea"] = $this->cobusucrea;
              $this->detalle_cobro = "";  
              $this->nmgp_dados_form["detalle_cobro"] = $this->detalle_cobro;
              $this->saldo_favor = "";  
              $this->nmgp_dados_form["saldo_favor"] = $this->saldo_favor;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['foreign_key'] as $sFKName => $sFKValue)
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
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['grid_detalle_cobro_script_case_init'] ]['grid_detalle_cobro']['embutida_parms'] = "v_rucemison*scin" . $this->nmgp_dados_form['emiruc'] . "*scoutnumero_cobro*scin" . $this->nmgp_dados_form['cobnumero'] . "*scout";
  }
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function compareFloatNumbers($float1, $float2, $operator)
{
$_SESSION['scriptcase']['form_cobros']['contr_erro'] = 'on';
  
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


$_SESSION['scriptcase']['form_cobros']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_cobros_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_cobros_form0.php");
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("emiruc", "cobnumero", "fclnumero", "cobvalefec", "cobvalcheq", "cobvaltarjcred", "cobvaltransf", "convalretfte", "cobvaltotal", "cobnumcheq", "cobbancheq", "tcrcodigo", "cobnumtarjcred", "cobbantransf", "cobctatransf", "cobvalcruz", "cobanula"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarTimeStart($sFormat)
   {
       $aDateParts = explode(';', $sFormat);

       if (2 == sizeof($aDateParts))
       {
           $sTime = $aDateParts[1];
       }
       else
       {
           $sTime = 'hh:mm:ss';
       }

       return str_replace(array('h', 'm', 'i', 's'), array('0', '0', '0', '0'), $sTime);
   } // jqueryCalendarTimeStart

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

   function jqueryIconFile($sModule)
   {
       $sImage = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalendario']['display'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalculadora']['display'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return '' == $sImage ? '' : $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile

   function jqueryFAFile($sModule)
   {
       $sFA = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
           {
               $sFA = $this->arr_buttons['bcalendario']['fontawesomeicon'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
           {
               $sFA = $this->arr_buttons['bcalculadora']['fontawesomeicon'];
           }
       }

       return '' == $sFA ? '' : "<span class='scButton_fontawesome " . $sFA . "'></span>";
   } // jqueryFAFile

   function jqueryButtonText($sModule)
   {
       $sClass = '';
       $sText  = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalendario']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalendario']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalendario']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i>";
                   }
               }
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalculadora']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalculadora']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalculadora']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> ";
                   }
               }
           }
       }

       return '' == $sText ? array('', '') : array($sText, $sClass);
   } // jqueryButtonText


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['csrf_token'];
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

   function Form_lookup_fclnumero()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_fclnumero']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_fclnumero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_fclnumero']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_fclnumero'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_fclnumero']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_fclnumero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_fclnumero']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_fclnumero'] = array(); 
    }

   $old_value_cobfecha = $this->cobfecha;
   $old_value_cobvalefec = $this->cobvalefec;
   $old_value_cobvalcheq = $this->cobvalcheq;
   $old_value_cobvaltarjcred = $this->cobvaltarjcred;
   $old_value_cobvaltransf = $this->cobvaltransf;
   $old_value_cobvalretfte = $this->cobvalretfte;
   $old_value_cobvaltotal = $this->cobvaltotal;
   $old_value_cobvalcruz = $this->cobvalcruz;
   $old_value_saldo_favor = $this->saldo_favor;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_cobfecha = $this->cobfecha;
   $unformatted_value_cobvalefec = $this->cobvalefec;
   $unformatted_value_cobvalcheq = $this->cobvalcheq;
   $unformatted_value_cobvaltarjcred = $this->cobvaltarjcred;
   $unformatted_value_cobvaltransf = $this->cobvaltransf;
   $unformatted_value_cobvalretfte = $this->cobvalretfte;
   $unformatted_value_cobvaltotal = $this->cobvaltotal;
   $unformatted_value_cobvalcruz = $this->cobvalcruz;
   $unformatted_value_saldo_favor = $this->saldo_favor;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT fclnumero, fclapellidos + ' ' + fclnombres  FROM ficha_cliente  ORDER BY fclapellidos, fclnombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT fclnumero, concat(fclapellidos,' ',fclnombres)  FROM ficha_cliente  ORDER BY fclapellidos, fclnombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT fclnumero, fclapellidos&' '&fclnombres  FROM ficha_cliente  ORDER BY fclapellidos, fclnombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT fclnumero, fclapellidos||' '||fclnombres  FROM ficha_cliente  ORDER BY fclapellidos, fclnombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT fclnumero, fclapellidos + ' ' + fclnombres  FROM ficha_cliente  ORDER BY fclapellidos, fclnombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT fclnumero, fclapellidos||' '||fclnombres  FROM ficha_cliente  ORDER BY fclapellidos, fclnombres";
   }
   else
   {
       $nm_comando = "SELECT fclnumero, fclapellidos||' '||fclnombres  FROM ficha_cliente  ORDER BY fclapellidos, fclnombres";
   }

   $this->cobfecha = $old_value_cobfecha;
   $this->cobvalefec = $old_value_cobvalefec;
   $this->cobvalcheq = $old_value_cobvalcheq;
   $this->cobvaltarjcred = $old_value_cobvaltarjcred;
   $this->cobvaltransf = $old_value_cobvaltransf;
   $this->cobvalretfte = $old_value_cobvalretfte;
   $this->cobvaltotal = $old_value_cobvaltotal;
   $this->cobvalcruz = $old_value_cobvalcruz;
   $this->saldo_favor = $old_value_saldo_favor;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_fclnumero'][] = $rs->fields[0];
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
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_cobanula()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SÍ?#?1?#??@?";
       $nmgp_def_dados .= "NO?#?0?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_tcrcodigo()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_tcrcodigo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_tcrcodigo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_tcrcodigo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_tcrcodigo'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_tcrcodigo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_tcrcodigo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_tcrcodigo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_tcrcodigo'] = array(); 
    }

   $old_value_cobfecha = $this->cobfecha;
   $old_value_cobvalefec = $this->cobvalefec;
   $old_value_cobvalcheq = $this->cobvalcheq;
   $old_value_cobvaltarjcred = $this->cobvaltarjcred;
   $old_value_cobvaltransf = $this->cobvaltransf;
   $old_value_cobvalretfte = $this->cobvalretfte;
   $old_value_cobvaltotal = $this->cobvaltotal;
   $old_value_cobvalcruz = $this->cobvalcruz;
   $old_value_saldo_favor = $this->saldo_favor;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_cobfecha = $this->cobfecha;
   $unformatted_value_cobvalefec = $this->cobvalefec;
   $unformatted_value_cobvalcheq = $this->cobvalcheq;
   $unformatted_value_cobvaltarjcred = $this->cobvaltarjcred;
   $unformatted_value_cobvaltransf = $this->cobvaltransf;
   $unformatted_value_cobvalretfte = $this->cobvalretfte;
   $unformatted_value_cobvaltotal = $this->cobvaltotal;
   $unformatted_value_cobvalcruz = $this->cobvalcruz;
   $unformatted_value_saldo_favor = $this->saldo_favor;

   $nm_comando = "SELECT tcrcodigo, tcrnombre  FROM tarjetas_credito  ORDER BY tcrnombre";

   $this->cobfecha = $old_value_cobfecha;
   $this->cobvalefec = $old_value_cobvalefec;
   $this->cobvalcheq = $old_value_cobvalcheq;
   $this->cobvaltarjcred = $old_value_cobvaltarjcred;
   $this->cobvaltransf = $old_value_cobvaltransf;
   $this->cobvalretfte = $old_value_cobvalretfte;
   $this->cobvaltotal = $old_value_cobvaltotal;
   $this->cobvalcruz = $old_value_cobvalcruz;
   $this->saldo_favor = $old_value_saldo_favor;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_tcrcodigo'][] = $rs->fields[0];
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
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_cobros_pack_ajax_response();
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
              $data_lookup = $this->SC_lookup_emiruc($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "emiruc", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cobnumero", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_fclnumero($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "fclnumero", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cobvalefec", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cobvalcheq", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cobvaltarjcred", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cobvaltransf", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cobvaltotal", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cobnumcheq", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cobbancheq", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_tcrcodigo($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "tcrcodigo", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cobnumtarjcred", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cobbantransf", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cobctatransf", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cobvalcruz", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_cobanula($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "cobanula", $arg_search, $data_lookup);
              }
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_cobros = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['total'] = $qt_geral_reg_form_cobros;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_cobros_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_cobros_pack_ajax_response();
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
      $nm_numeric[] = "cobnumero";$nm_numeric[] = "fclnumero";$nm_numeric[] = "cobvalefec";$nm_numeric[] = "cobvalcheq";$nm_numeric[] = "cobvaltarjcred";$nm_numeric[] = "cobvaltransf";$nm_numeric[] = "cobvalretfte";$nm_numeric[] = "cobvaltotal";$nm_numeric[] = "tcrcodigo";$nm_numeric[] = "cobvalcruz";$nm_numeric[] = "cobanula";$nm_numeric[] = "";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['decimal_db'] == ".")
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
      $Nm_datas['cobfecha'] = "date";$Nm_datas['cobfecanula'] = "datetime";
         if (isset($Nm_datas[$campo_join]))
         {
             for ($x = 0; $x < strlen($campo); $x++)
             {
                 $tst = substr($campo, $x, 1);
                 if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
                 {
                     return;
                 }
             }
         }
          if (isset($Nm_datas[$campo_join]))
          {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
             $nm_aspas  = "#";
             $nm_aspas1 = "#";
          }
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['SC_sep_date1'];
              }
          }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
          }
          if (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
          elseif ($Nm_datas[$campo_join] == "time" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(10)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(19)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "times" || $Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $nome  = "TO_DATE(TO_CHAR(" . $nome . ", 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "datetime" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO FRACTION)";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO DAY)";
          }
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
   function SC_lookup_emiruc($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT emirazsoc, emiruc FROM fac_emisores WHERE (emirazsoc LIKE '%$campo%')" ; 
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
   function SC_lookup_fclnumero($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT fclapellidos + ' ' + fclnombres, fclnumero FROM ficha_cliente WHERE (fclapellidos + ' ' + fclnombres LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(fclapellidos,' ',fclnombres), fclnumero FROM ficha_cliente WHERE (concat(fclapellidos,' ',fclnombres) LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT fclapellidos&' '&fclnombres, fclnumero FROM ficha_cliente WHERE (fclapellidos&' '&fclnombres LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT fclapellidos||' '||fclnombres, fclnumero FROM ficha_cliente WHERE (fclapellidos||' '||fclnombres LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT fclapellidos + ' ' + fclnombres, fclnumero FROM ficha_cliente WHERE (fclapellidos + ' ' + fclnombres LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT fclapellidos||' '||fclnombres, fclnumero FROM ficha_cliente WHERE (fclapellidos||' '||fclnombres LIKE '%$campo%')" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT fclapellidos||' '||fclnombres, fclnumero FROM ficha_cliente WHERE (fclapellidos||' '||fclnombres LIKE '%$campo%')" ; 
      } 
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
   function SC_lookup_tcrcodigo($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT tcrnombre, tcrcodigo FROM tarjetas_credito WHERE (tcrnombre LIKE '%$campo%')" ; 
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
   function SC_lookup_cobanula($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['1'] = "SÍ";
       $data_look['0'] = "NO";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
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
          
       }
       return $result;
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
       $nmgp_saida_form = "form_cobros_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_cobros_fim.php";
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
       form_cobros_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['masterValue']);
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
