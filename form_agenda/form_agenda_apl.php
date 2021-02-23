<?php
//
class form_agenda_apl
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
                                'navSummary'        => array(),
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
   var $agesecuen;
   var $agenombre;
   var $medcodigo;
   var $ageactivo;
   var $ageactivo_1;
   var $ageintervalo;
   var $agelunactivo;
   var $agelunactivo_1;
   var $agemaractivo;
   var $agemaractivo_1;
   var $agemieactivo;
   var $agemieactivo_1;
   var $agejueactivo;
   var $agejueactivo_1;
   var $agevieactivo;
   var $agevieactivo_1;
   var $agesabactivo;
   var $agesabactivo_1;
   var $agedomactivo;
   var $agedomactivo_1;
   var $agelunini;
   var $agelunfin;
   var $agemarini;
   var $agemarfin;
   var $agemieini;
   var $agemiefin;
   var $agejueini;
   var $agejuefin;
   var $agevieini;
   var $ageviefin;
   var $agesabini;
   var $agesabfin;
   var $agedomini;
   var $agedomfin;
   var $agecolor;
   var $ageusucrea;
   var $ageusumodi;
   var $agefeccrea;
   var $agefeccrea_hora;
   var $agefecmodi;
   var $agefecmodi_hora;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $sc_insert_on;
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
          if (isset($this->NM_ajax_info['param']['ageactivo']))
          {
              $this->ageactivo = $this->NM_ajax_info['param']['ageactivo'];
          }
          if (isset($this->NM_ajax_info['param']['agecolor']))
          {
              $this->agecolor = $this->NM_ajax_info['param']['agecolor'];
          }
          if (isset($this->NM_ajax_info['param']['agedomactivo']))
          {
              $this->agedomactivo = $this->NM_ajax_info['param']['agedomactivo'];
          }
          if (isset($this->NM_ajax_info['param']['agedomfin']))
          {
              $this->agedomfin = $this->NM_ajax_info['param']['agedomfin'];
          }
          if (isset($this->NM_ajax_info['param']['agedomini']))
          {
              $this->agedomini = $this->NM_ajax_info['param']['agedomini'];
          }
          if (isset($this->NM_ajax_info['param']['agefeccrea']))
          {
              $this->agefeccrea = $this->NM_ajax_info['param']['agefeccrea'];
          }
          if (isset($this->NM_ajax_info['param']['agefecmodi']))
          {
              $this->agefecmodi = $this->NM_ajax_info['param']['agefecmodi'];
          }
          if (isset($this->NM_ajax_info['param']['ageintervalo']))
          {
              $this->ageintervalo = $this->NM_ajax_info['param']['ageintervalo'];
          }
          if (isset($this->NM_ajax_info['param']['agejueactivo']))
          {
              $this->agejueactivo = $this->NM_ajax_info['param']['agejueactivo'];
          }
          if (isset($this->NM_ajax_info['param']['agejuefin']))
          {
              $this->agejuefin = $this->NM_ajax_info['param']['agejuefin'];
          }
          if (isset($this->NM_ajax_info['param']['agejueini']))
          {
              $this->agejueini = $this->NM_ajax_info['param']['agejueini'];
          }
          if (isset($this->NM_ajax_info['param']['agelunactivo']))
          {
              $this->agelunactivo = $this->NM_ajax_info['param']['agelunactivo'];
          }
          if (isset($this->NM_ajax_info['param']['agelunfin']))
          {
              $this->agelunfin = $this->NM_ajax_info['param']['agelunfin'];
          }
          if (isset($this->NM_ajax_info['param']['agelunini']))
          {
              $this->agelunini = $this->NM_ajax_info['param']['agelunini'];
          }
          if (isset($this->NM_ajax_info['param']['agemaractivo']))
          {
              $this->agemaractivo = $this->NM_ajax_info['param']['agemaractivo'];
          }
          if (isset($this->NM_ajax_info['param']['agemarfin']))
          {
              $this->agemarfin = $this->NM_ajax_info['param']['agemarfin'];
          }
          if (isset($this->NM_ajax_info['param']['agemarini']))
          {
              $this->agemarini = $this->NM_ajax_info['param']['agemarini'];
          }
          if (isset($this->NM_ajax_info['param']['agemieactivo']))
          {
              $this->agemieactivo = $this->NM_ajax_info['param']['agemieactivo'];
          }
          if (isset($this->NM_ajax_info['param']['agemiefin']))
          {
              $this->agemiefin = $this->NM_ajax_info['param']['agemiefin'];
          }
          if (isset($this->NM_ajax_info['param']['agemieini']))
          {
              $this->agemieini = $this->NM_ajax_info['param']['agemieini'];
          }
          if (isset($this->NM_ajax_info['param']['agenombre']))
          {
              $this->agenombre = $this->NM_ajax_info['param']['agenombre'];
          }
          if (isset($this->NM_ajax_info['param']['agesabactivo']))
          {
              $this->agesabactivo = $this->NM_ajax_info['param']['agesabactivo'];
          }
          if (isset($this->NM_ajax_info['param']['agesabfin']))
          {
              $this->agesabfin = $this->NM_ajax_info['param']['agesabfin'];
          }
          if (isset($this->NM_ajax_info['param']['agesabini']))
          {
              $this->agesabini = $this->NM_ajax_info['param']['agesabini'];
          }
          if (isset($this->NM_ajax_info['param']['agesecuen']))
          {
              $this->agesecuen = $this->NM_ajax_info['param']['agesecuen'];
          }
          if (isset($this->NM_ajax_info['param']['ageusucrea']))
          {
              $this->ageusucrea = $this->NM_ajax_info['param']['ageusucrea'];
          }
          if (isset($this->NM_ajax_info['param']['ageusumodi']))
          {
              $this->ageusumodi = $this->NM_ajax_info['param']['ageusumodi'];
          }
          if (isset($this->NM_ajax_info['param']['agevieactivo']))
          {
              $this->agevieactivo = $this->NM_ajax_info['param']['agevieactivo'];
          }
          if (isset($this->NM_ajax_info['param']['ageviefin']))
          {
              $this->ageviefin = $this->NM_ajax_info['param']['ageviefin'];
          }
          if (isset($this->NM_ajax_info['param']['agevieini']))
          {
              $this->agevieini = $this->NM_ajax_info['param']['agevieini'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['medcodigo']))
          {
              $this->medcodigo = $this->NM_ajax_info['param']['medcodigo'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_arg_fast_search']))
          {
              $this->nmgp_arg_fast_search = $this->NM_ajax_info['param']['nmgp_arg_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_cond_fast_search']))
          {
              $this->nmgp_cond_fast_search = $this->NM_ajax_info['param']['nmgp_cond_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_fast_search']))
          {
              $this->nmgp_fast_search = $this->NM_ajax_info['param']['nmgp_fast_search'];
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
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
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
      if (isset($this->usr_login) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_POST["usr_login"]) && isset($this->usr_login)) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_GET["usr_login"]) && isset($this->usr_login)) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_agenda']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_agenda']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_agenda']['embutida_parms']);
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
                 nm_limpa_str_form_agenda($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_agenda']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_agenda']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_agenda']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_agenda']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_agenda']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_agenda']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_agenda']['nm_run_menu'] = 1;
      } 
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->agefeccrea);
          $this->agefeccrea      = $aDtParts[0];
          $this->agefeccrea_hora = $aDtParts[1];
      }
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->agefecmodi);
          $this->agefecmodi      = $aDtParts[0];
          $this->agefecmodi_hora = $aDtParts[1];
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_agenda']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_agenda']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_agenda']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_agenda']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_agenda']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_agenda']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_agenda']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_agenda_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_agenda']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_agenda']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_agenda'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_agenda']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_agenda']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_agenda') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_agenda']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " agenda";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_agenda")
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



      $_SESSION['scriptcase']['error_icon']['form_agenda']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_agenda'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "off";
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "on";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['reload'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_agenda']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_agenda'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_agenda'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dados_form'];
          if (!isset($this->agesecuen)){$this->agesecuen = $this->nmgp_dados_form['agesecuen'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_agenda", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      if (!$this->NM_ajax_flag)
      {
          $_SESSION['scriptcase']['sc_tab_cores']['paleta']  = $this->Ini->Nm_lang['lang_othr_cplt_titl'];
          $_SESSION['scriptcase']['sc_tab_cores']['setacor'] = $this->Ini->Nm_lang['lang_othr_cplt_defn'];
          $_SESSION['scriptcase']['sc_tab_cores']['atualiz'] = $this->Ini->Nm_lang['lang_btns_colr_updt_hint'];
          $_SESSION['scriptcase']['sc_tab_cores']['cancela'] = $this->Ini->Nm_lang['lang_btns_colr_cncl_hint'];
      }
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
              include_once($this->Ini->path_embutida . 'form_agenda/form_agenda_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_agenda_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_agenda_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_agenda_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_agenda/form_agenda_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_agenda_erro.class.php"); 
      }
      $this->Erro      = new form_agenda_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['opcao']))
         { 
             if ($this->agesecuen != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_agenda']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
      if (isset($this->agenombre)) { $this->nm_limpa_alfa($this->agenombre); }
      if (isset($this->medcodigo)) { $this->nm_limpa_alfa($this->medcodigo); }
      if (isset($this->ageactivo)) { $this->nm_limpa_alfa($this->ageactivo); }
      if (isset($this->ageintervalo)) { $this->nm_limpa_alfa($this->ageintervalo); }
      if (isset($this->agelunactivo)) { $this->nm_limpa_alfa($this->agelunactivo); }
      if (isset($this->agemaractivo)) { $this->nm_limpa_alfa($this->agemaractivo); }
      if (isset($this->agemieactivo)) { $this->nm_limpa_alfa($this->agemieactivo); }
      if (isset($this->agejueactivo)) { $this->nm_limpa_alfa($this->agejueactivo); }
      if (isset($this->agevieactivo)) { $this->nm_limpa_alfa($this->agevieactivo); }
      if (isset($this->agesabactivo)) { $this->nm_limpa_alfa($this->agesabactivo); }
      if (isset($this->agedomactivo)) { $this->nm_limpa_alfa($this->agedomactivo); }
      if (isset($this->agecolor)) { $this->nm_limpa_alfa($this->agecolor); }
      if (isset($this->ageusucrea)) { $this->nm_limpa_alfa($this->ageusucrea); }
      if (isset($this->ageusumodi)) { $this->nm_limpa_alfa($this->ageusumodi); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- ageintervalo
      $this->field_config['ageintervalo']               = array();
      $this->field_config['ageintervalo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ageintervalo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ageintervalo']['symbol_dec'] = '';
      $this->field_config['ageintervalo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ageintervalo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- agefeccrea
      $this->field_config['agefeccrea']                 = array();
      $this->field_config['agefeccrea']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['agefeccrea']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['agefeccrea']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['agefeccrea']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'agefeccrea');
      //-- agefecmodi
      $this->field_config['agefecmodi']                 = array();
      $this->field_config['agefecmodi']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['agefecmodi']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['agefecmodi']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['agefecmodi']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'agefecmodi');
      //-- agelunini
      $this->field_config['agelunini']                 = array();
      $this->field_config['agelunini']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['agelunini']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['agelunini']['date_display'] = "hhii";
      $this->new_date_format('HH', 'agelunini');
      //-- agelunfin
      $this->field_config['agelunfin']                 = array();
      $this->field_config['agelunfin']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['agelunfin']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['agelunfin']['date_display'] = "hhii";
      $this->new_date_format('HH', 'agelunfin');
      //-- agemarini
      $this->field_config['agemarini']                 = array();
      $this->field_config['agemarini']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['agemarini']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['agemarini']['date_display'] = "hhii";
      $this->new_date_format('HH', 'agemarini');
      //-- agemarfin
      $this->field_config['agemarfin']                 = array();
      $this->field_config['agemarfin']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['agemarfin']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['agemarfin']['date_display'] = "hhii";
      $this->new_date_format('HH', 'agemarfin');
      //-- agemieini
      $this->field_config['agemieini']                 = array();
      $this->field_config['agemieini']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['agemieini']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['agemieini']['date_display'] = "hhii";
      $this->new_date_format('HH', 'agemieini');
      //-- agemiefin
      $this->field_config['agemiefin']                 = array();
      $this->field_config['agemiefin']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['agemiefin']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['agemiefin']['date_display'] = "hhii";
      $this->new_date_format('HH', 'agemiefin');
      //-- agejueini
      $this->field_config['agejueini']                 = array();
      $this->field_config['agejueini']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['agejueini']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['agejueini']['date_display'] = "hhii";
      $this->new_date_format('HH', 'agejueini');
      //-- agejuefin
      $this->field_config['agejuefin']                 = array();
      $this->field_config['agejuefin']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['agejuefin']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['agejuefin']['date_display'] = "hhii";
      $this->new_date_format('HH', 'agejuefin');
      //-- agevieini
      $this->field_config['agevieini']                 = array();
      $this->field_config['agevieini']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['agevieini']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['agevieini']['date_display'] = "hhii";
      $this->new_date_format('HH', 'agevieini');
      //-- ageviefin
      $this->field_config['ageviefin']                 = array();
      $this->field_config['ageviefin']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['ageviefin']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['ageviefin']['date_display'] = "hhii";
      $this->new_date_format('HH', 'ageviefin');
      //-- agesabini
      $this->field_config['agesabini']                 = array();
      $this->field_config['agesabini']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['agesabini']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['agesabini']['date_display'] = "hhii";
      $this->new_date_format('HH', 'agesabini');
      //-- agesabfin
      $this->field_config['agesabfin']                 = array();
      $this->field_config['agesabfin']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['agesabfin']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['agesabfin']['date_display'] = "hhii";
      $this->new_date_format('HH', 'agesabfin');
      //-- agedomini
      $this->field_config['agedomini']                 = array();
      $this->field_config['agedomini']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['agedomini']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['agedomini']['date_display'] = "hhii";
      $this->new_date_format('HH', 'agedomini');
      //-- agedomfin
      $this->field_config['agedomfin']                 = array();
      $this->field_config['agedomfin']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['agedomfin']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['agedomfin']['date_display'] = "hhii";
      $this->new_date_format('HH', 'agedomfin');
      //-- agesecuen
      $this->field_config['agesecuen']               = array();
      $this->field_config['agesecuen']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['agesecuen']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['agesecuen']['symbol_dec'] = '';
      $this->field_config['agesecuen']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['agesecuen']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
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
          if ('validate_agenombre' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agenombre');
          }
          if ('validate_medcodigo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'medcodigo');
          }
          if ('validate_ageintervalo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ageintervalo');
          }
          if ('validate_ageactivo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ageactivo');
          }
          if ('validate_agecolor' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agecolor');
          }
          if ('validate_ageusucrea' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ageusucrea');
          }
          if ('validate_agefeccrea' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agefeccrea');
          }
          if ('validate_ageusumodi' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ageusumodi');
          }
          if ('validate_agefecmodi' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agefecmodi');
          }
          if ('validate_agelunactivo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agelunactivo');
          }
          if ('validate_agemaractivo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agemaractivo');
          }
          if ('validate_agemieactivo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agemieactivo');
          }
          if ('validate_agejueactivo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agejueactivo');
          }
          if ('validate_agevieactivo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agevieactivo');
          }
          if ('validate_agesabactivo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agesabactivo');
          }
          if ('validate_agedomactivo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agedomactivo');
          }
          if ('validate_agelunini' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agelunini');
          }
          if ('validate_agelunfin' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agelunfin');
          }
          if ('validate_agemarini' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agemarini');
          }
          if ('validate_agemarfin' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agemarfin');
          }
          if ('validate_agemieini' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agemieini');
          }
          if ('validate_agemiefin' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agemiefin');
          }
          if ('validate_agejueini' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agejueini');
          }
          if ('validate_agejuefin' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agejuefin');
          }
          if ('validate_agevieini' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agevieini');
          }
          if ('validate_ageviefin' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ageviefin');
          }
          if ('validate_agesabini' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agesabini');
          }
          if ('validate_agesabfin' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agesabfin');
          }
          if ('validate_agedomini' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agedomini');
          }
          if ('validate_agedomfin' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agedomfin');
          }
          form_agenda_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_agedomactivo_onclick' == $this->NM_ajax_opcao)
          {
              $this->agedomactivo_onClick();
          }
          if ('event_agejueactivo_onclick' == $this->NM_ajax_opcao)
          {
              $this->agejueactivo_onClick();
          }
          if ('event_agelunactivo_onclick' == $this->NM_ajax_opcao)
          {
              $this->agelunactivo_onClick();
          }
          if ('event_agemaractivo_onclick' == $this->NM_ajax_opcao)
          {
              $this->agemaractivo_onClick();
          }
          if ('event_agemieactivo_onclick' == $this->NM_ajax_opcao)
          {
              $this->agemieactivo_onClick();
          }
          if ('event_agesabactivo_onclick' == $this->NM_ajax_opcao)
          {
              $this->agesabactivo_onClick();
          }
          if ('event_agevieactivo_onclick' == $this->NM_ajax_opcao)
          {
              $this->agevieactivo_onClick();
          }
          form_agenda_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('autocomp_medcodigo' == $this->NM_ajax_opcao)
          {
              if (isset($_GET['term'])) {
                  $this->medcodigo = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
              } else {
                  $this->medcodigo = '';
              }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_medcodigo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_medcodigo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_medcodigo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_medcodigo'] = array(); 
    }

   $old_value_ageintervalo = $this->ageintervalo;
   $old_value_agefeccrea = $this->agefeccrea;
   $old_value_agefeccrea_hora = $this->agefeccrea_hora;
   $old_value_agefecmodi = $this->agefecmodi;
   $old_value_agefecmodi_hora = $this->agefecmodi_hora;
   $old_value_agelunini = $this->agelunini;
   $old_value_agelunfin = $this->agelunfin;
   $old_value_agemarini = $this->agemarini;
   $old_value_agemarfin = $this->agemarfin;
   $old_value_agemieini = $this->agemieini;
   $old_value_agemiefin = $this->agemiefin;
   $old_value_agejueini = $this->agejueini;
   $old_value_agejuefin = $this->agejuefin;
   $old_value_agevieini = $this->agevieini;
   $old_value_ageviefin = $this->ageviefin;
   $old_value_agesabini = $this->agesabini;
   $old_value_agesabfin = $this->agesabfin;
   $old_value_agedomini = $this->agedomini;
   $old_value_agedomfin = $this->agedomfin;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_ageintervalo = $this->ageintervalo;
   $unformatted_value_agefeccrea = $this->agefeccrea;
   $unformatted_value_agefeccrea_hora = $this->agefeccrea_hora;
   $unformatted_value_agefecmodi = $this->agefecmodi;
   $unformatted_value_agefecmodi_hora = $this->agefecmodi_hora;
   $unformatted_value_agelunini = $this->agelunini;
   $unformatted_value_agelunfin = $this->agelunfin;
   $unformatted_value_agemarini = $this->agemarini;
   $unformatted_value_agemarfin = $this->agemarfin;
   $unformatted_value_agemieini = $this->agemieini;
   $unformatted_value_agemiefin = $this->agemiefin;
   $unformatted_value_agejueini = $this->agejueini;
   $unformatted_value_agejuefin = $this->agejuefin;
   $unformatted_value_agevieini = $this->agevieini;
   $unformatted_value_ageviefin = $this->ageviefin;
   $unformatted_value_agesabini = $this->agesabini;
   $unformatted_value_agesabfin = $this->agesabfin;
   $unformatted_value_agedomini = $this->agedomini;
   $unformatted_value_agedomfin = $this->agedomfin;

   $ageactivo_val_str = "";
   if (!empty($this->ageactivo))
   {
       if (is_array($this->ageactivo))
       {
           $Tmp_array = $this->ageactivo;
       }
       else
       {
           $Tmp_array = explode(";", $this->ageactivo);
       }
       $ageactivo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ageactivo_val_str)
          {
             $ageactivo_val_str .= ", ";
          }
          $ageactivo_val_str .= $Tmp_val_cmp;
       }
   }
   $agelunactivo_val_str = "";
   if (!empty($this->agelunactivo))
   {
       if (is_array($this->agelunactivo))
       {
           $Tmp_array = $this->agelunactivo;
       }
       else
       {
           $Tmp_array = explode(";", $this->agelunactivo);
       }
       $agelunactivo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $agelunactivo_val_str)
          {
             $agelunactivo_val_str .= ", ";
          }
          $agelunactivo_val_str .= $Tmp_val_cmp;
       }
   }
   $agemaractivo_val_str = "";
   if (!empty($this->agemaractivo))
   {
       if (is_array($this->agemaractivo))
       {
           $Tmp_array = $this->agemaractivo;
       }
       else
       {
           $Tmp_array = explode(";", $this->agemaractivo);
       }
       $agemaractivo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $agemaractivo_val_str)
          {
             $agemaractivo_val_str .= ", ";
          }
          $agemaractivo_val_str .= $Tmp_val_cmp;
       }
   }
   $agemieactivo_val_str = "";
   if (!empty($this->agemieactivo))
   {
       if (is_array($this->agemieactivo))
       {
           $Tmp_array = $this->agemieactivo;
       }
       else
       {
           $Tmp_array = explode(";", $this->agemieactivo);
       }
       $agemieactivo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $agemieactivo_val_str)
          {
             $agemieactivo_val_str .= ", ";
          }
          $agemieactivo_val_str .= $Tmp_val_cmp;
       }
   }
   $agejueactivo_val_str = "";
   if (!empty($this->agejueactivo))
   {
       if (is_array($this->agejueactivo))
       {
           $Tmp_array = $this->agejueactivo;
       }
       else
       {
           $Tmp_array = explode(";", $this->agejueactivo);
       }
       $agejueactivo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $agejueactivo_val_str)
          {
             $agejueactivo_val_str .= ", ";
          }
          $agejueactivo_val_str .= $Tmp_val_cmp;
       }
   }
   $agevieactivo_val_str = "";
   if (!empty($this->agevieactivo))
   {
       if (is_array($this->agevieactivo))
       {
           $Tmp_array = $this->agevieactivo;
       }
       else
       {
           $Tmp_array = explode(";", $this->agevieactivo);
       }
       $agevieactivo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $agevieactivo_val_str)
          {
             $agevieactivo_val_str .= ", ";
          }
          $agevieactivo_val_str .= $Tmp_val_cmp;
       }
   }
   $agesabactivo_val_str = "";
   if (!empty($this->agesabactivo))
   {
       if (is_array($this->agesabactivo))
       {
           $Tmp_array = $this->agesabactivo;
       }
       else
       {
           $Tmp_array = explode(";", $this->agesabactivo);
       }
       $agesabactivo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $agesabactivo_val_str)
          {
             $agesabactivo_val_str .= ", ";
          }
          $agesabactivo_val_str .= $Tmp_val_cmp;
       }
   }
   $agedomactivo_val_str = "";
   if (!empty($this->agedomactivo))
   {
       if (is_array($this->agedomactivo))
       {
           $Tmp_array = $this->agedomactivo;
       }
       else
       {
           $Tmp_array = explode(";", $this->agedomactivo);
       }
       $agedomactivo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $agedomactivo_val_str)
          {
             $agedomactivo_val_str .= ", ";
          }
          $agedomactivo_val_str .= $Tmp_val_cmp;
       }
   }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT medcodigo, medapellidos + ' ' + mednombres FROM medico WHERE medapellidos + ' ' + mednombres LIKE '%" . substr($this->Db->qstr($this->medcodigo), 1, -1) . "%' ORDER BY medapellidos, mednombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT medcodigo, concat(medapellidos,' ',mednombres) FROM medico WHERE concat(medapellidos,' ',mednombres) LIKE '%" . substr($this->Db->qstr($this->medcodigo), 1, -1) . "%' ORDER BY medapellidos, mednombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT medcodigo, medapellidos&' '&mednombres FROM medico WHERE medapellidos&' '&mednombres LIKE '%" . substr($this->Db->qstr($this->medcodigo), 1, -1) . "%' ORDER BY medapellidos, mednombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT medcodigo, medapellidos||' '||mednombres FROM medico WHERE medapellidos||' '||mednombres LIKE '%" . substr($this->Db->qstr($this->medcodigo), 1, -1) . "%' ORDER BY medapellidos, mednombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT medcodigo, medapellidos + ' ' + mednombres FROM medico WHERE medapellidos + ' ' + mednombres LIKE '%" . substr($this->Db->qstr($this->medcodigo), 1, -1) . "%' ORDER BY medapellidos, mednombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT medcodigo, medapellidos||' '||mednombres FROM medico WHERE medapellidos||' '||mednombres LIKE '%" . substr($this->Db->qstr($this->medcodigo), 1, -1) . "%' ORDER BY medapellidos, mednombres";
   }
   else
   {
       $nm_comando = "SELECT medcodigo, medapellidos||' '||mednombres FROM medico WHERE medapellidos||' '||mednombres LIKE '%" . substr($this->Db->qstr($this->medcodigo), 1, -1) . "%' ORDER BY medapellidos, mednombres";
   }

   $this->ageintervalo = $old_value_ageintervalo;
   $this->agefeccrea = $old_value_agefeccrea;
   $this->agefeccrea_hora = $old_value_agefeccrea_hora;
   $this->agefecmodi = $old_value_agefecmodi;
   $this->agefecmodi_hora = $old_value_agefecmodi_hora;
   $this->agelunini = $old_value_agelunini;
   $this->agelunfin = $old_value_agelunfin;
   $this->agemarini = $old_value_agemarini;
   $this->agemarfin = $old_value_agemarfin;
   $this->agemieini = $old_value_agemieini;
   $this->agemiefin = $old_value_agemiefin;
   $this->agejueini = $old_value_agejueini;
   $this->agejuefin = $old_value_agejuefin;
   $this->agevieini = $old_value_agevieini;
   $this->ageviefin = $old_value_ageviefin;
   $this->agesabini = $old_value_agesabini;
   $this->agesabfin = $old_value_agesabfin;
   $this->agedomini = $old_value_agedomini;
   $this->agedomfin = $old_value_agedomfin;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_agenda_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_agenda_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_medcodigo'][] = $rs->fields[0];
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
          form_agenda_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->ageactivo))
          {
              $x = 0; 
              $this->ageactivo_1 = $this->ageactivo;
              $this->ageactivo = ""; 
              if ($this->ageactivo_1 != "") 
              { 
                  foreach ($this->ageactivo_1 as $dados_ageactivo_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->ageactivo .= ";";
                      } 
                      $this->ageactivo .= $dados_ageactivo_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->agelunactivo))
          {
              $x = 0; 
              $this->agelunactivo_1 = $this->agelunactivo;
              $this->agelunactivo = ""; 
              if ($this->agelunactivo_1 != "") 
              { 
                  foreach ($this->agelunactivo_1 as $dados_agelunactivo_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->agelunactivo .= ";";
                      } 
                      $this->agelunactivo .= $dados_agelunactivo_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->agemaractivo))
          {
              $x = 0; 
              $this->agemaractivo_1 = $this->agemaractivo;
              $this->agemaractivo = ""; 
              if ($this->agemaractivo_1 != "") 
              { 
                  foreach ($this->agemaractivo_1 as $dados_agemaractivo_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->agemaractivo .= ";";
                      } 
                      $this->agemaractivo .= $dados_agemaractivo_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->agemieactivo))
          {
              $x = 0; 
              $this->agemieactivo_1 = $this->agemieactivo;
              $this->agemieactivo = ""; 
              if ($this->agemieactivo_1 != "") 
              { 
                  foreach ($this->agemieactivo_1 as $dados_agemieactivo_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->agemieactivo .= ";";
                      } 
                      $this->agemieactivo .= $dados_agemieactivo_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->agejueactivo))
          {
              $x = 0; 
              $this->agejueactivo_1 = $this->agejueactivo;
              $this->agejueactivo = ""; 
              if ($this->agejueactivo_1 != "") 
              { 
                  foreach ($this->agejueactivo_1 as $dados_agejueactivo_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->agejueactivo .= ";";
                      } 
                      $this->agejueactivo .= $dados_agejueactivo_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->agevieactivo))
          {
              $x = 0; 
              $this->agevieactivo_1 = $this->agevieactivo;
              $this->agevieactivo = ""; 
              if ($this->agevieactivo_1 != "") 
              { 
                  foreach ($this->agevieactivo_1 as $dados_agevieactivo_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->agevieactivo .= ";";
                      } 
                      $this->agevieactivo .= $dados_agevieactivo_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->agesabactivo))
          {
              $x = 0; 
              $this->agesabactivo_1 = $this->agesabactivo;
              $this->agesabactivo = ""; 
              if ($this->agesabactivo_1 != "") 
              { 
                  foreach ($this->agesabactivo_1 as $dados_agesabactivo_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->agesabactivo .= ";";
                      } 
                      $this->agesabactivo .= $dados_agesabactivo_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->agedomactivo))
          {
              $x = 0; 
              $this->agedomactivo_1 = $this->agedomactivo;
              $this->agedomactivo = ""; 
              if ($this->agedomactivo_1 != "") 
              { 
                  foreach ($this->agedomactivo_1 as $dados_agedomactivo_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->agedomactivo .= ";";
                      } 
                      $this->agedomactivo .= $dados_agedomactivo_1;
                      $x++ ; 
                  } 
              } 
          } 
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_agenda_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_agenda']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_agenda_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['recarga'] = $this->nmgp_opcao;
          if ($this->sc_evento == "update")
          {
              $this->NM_close_db(); 
              $this->nmgp_redireciona(2); 
          }
          if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
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
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_agenda_pack_ajax_response();
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
          form_agenda_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_agenda.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " agenda") ?></TITLE>
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
<form name="Fdown" method="get" action="form_agenda_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_agenda"> 
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
           case 'agenombre':
               return "NOMBRE";
               break;
           case 'medcodigo':
               return "MÉDICO";
               break;
           case 'ageintervalo':
               return "INTERVALO (minutos)";
               break;
           case 'ageactivo':
               return "ACTIVO";
               break;
           case 'agecolor':
               return "COLOR";
               break;
           case 'ageusucrea':
               return "USUARIO CREACIÓN";
               break;
           case 'agefeccrea':
               return "FECHA CREACIÓN";
               break;
           case 'ageusumodi':
               return "USUARIO MODIFICACIÓN";
               break;
           case 'agefecmodi':
               return "FECHA MODIFICACIÓN";
               break;
           case 'agelunactivo':
               return "LUNES";
               break;
           case 'agemaractivo':
               return "MARTES";
               break;
           case 'agemieactivo':
               return "MIÉRCOLES";
               break;
           case 'agejueactivo':
               return "JUEVES";
               break;
           case 'agevieactivo':
               return "VIERNES";
               break;
           case 'agesabactivo':
               return "SÁBADO";
               break;
           case 'agedomactivo':
               return "DOMINGO";
               break;
           case 'agelunini':
               return "HORA INICIO";
               break;
           case 'agelunfin':
               return "HORA FIN";
               break;
           case 'agemarini':
               return "HORA INICIO";
               break;
           case 'agemarfin':
               return "HORA FIN";
               break;
           case 'agemieini':
               return "HORA INICIO";
               break;
           case 'agemiefin':
               return "HORA FIN";
               break;
           case 'agejueini':
               return "HORA INICIO";
               break;
           case 'agejuefin':
               return "HORA FIN";
               break;
           case 'agevieini':
               return "HORA INICIO";
               break;
           case 'ageviefin':
               return "HORA FIN";
               break;
           case 'agesabini':
               return "HORA INICIO";
               break;
           case 'agesabfin':
               return "HORA FIN";
               break;
           case 'agedomini':
               return "HORA INICIO";
               break;
           case 'agedomfin':
               return "HORA FIN";
               break;
           case 'agesecuen':
               return "CÓD. AGENDA";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_agenda']) || !is_array($this->NM_ajax_info['errList']['geral_form_agenda']))
              {
                  $this->NM_ajax_info['errList']['geral_form_agenda'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_agenda'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'agenombre' == $filtro)
        $this->ValidateField_agenombre($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'medcodigo' == $filtro)
        $this->ValidateField_medcodigo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ageintervalo' == $filtro)
        $this->ValidateField_ageintervalo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ageactivo' == $filtro)
        $this->ValidateField_ageactivo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'agecolor' == $filtro)
        $this->ValidateField_agecolor($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ageusucrea' == $filtro)
        $this->ValidateField_ageusucrea($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'agefeccrea' == $filtro)
        $this->ValidateField_agefeccrea($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ageusumodi' == $filtro)
        $this->ValidateField_ageusumodi($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'agefecmodi' == $filtro)
        $this->ValidateField_agefecmodi($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'agelunactivo' == $filtro)
        $this->ValidateField_agelunactivo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'agemaractivo' == $filtro)
        $this->ValidateField_agemaractivo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'agemieactivo' == $filtro)
        $this->ValidateField_agemieactivo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'agejueactivo' == $filtro)
        $this->ValidateField_agejueactivo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'agevieactivo' == $filtro)
        $this->ValidateField_agevieactivo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'agesabactivo' == $filtro)
        $this->ValidateField_agesabactivo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'agedomactivo' == $filtro)
        $this->ValidateField_agedomactivo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'agelunini' == $filtro)
        $this->ValidateField_agelunini($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'agelunfin' == $filtro)
        $this->ValidateField_agelunfin($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'agemarini' == $filtro)
        $this->ValidateField_agemarini($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'agemarfin' == $filtro)
        $this->ValidateField_agemarfin($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'agemieini' == $filtro)
        $this->ValidateField_agemieini($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'agemiefin' == $filtro)
        $this->ValidateField_agemiefin($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'agejueini' == $filtro)
        $this->ValidateField_agejueini($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'agejuefin' == $filtro)
        $this->ValidateField_agejuefin($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'agevieini' == $filtro)
        $this->ValidateField_agevieini($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ageviefin' == $filtro)
        $this->ValidateField_ageviefin($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'agesabini' == $filtro)
        $this->ValidateField_agesabini($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'agesabfin' == $filtro)
        $this->ValidateField_agesabfin($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'agedomini' == $filtro)
        $this->ValidateField_agedomini($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'agedomfin' == $filtro)
        $this->ValidateField_agedomfin($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---

      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['form_agenda']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_agedomactivo = $this->agedomactivo;
    $original_agedomfin = $this->agedomfin;
    $original_agedomini = $this->agedomini;
    $original_agejueactivo = $this->agejueactivo;
    $original_agejuefin = $this->agejuefin;
    $original_agejueini = $this->agejueini;
    $original_agelunactivo = $this->agelunactivo;
    $original_agelunfin = $this->agelunfin;
    $original_agelunini = $this->agelunini;
    $original_agemaractivo = $this->agemaractivo;
    $original_agemarfin = $this->agemarfin;
    $original_agemarini = $this->agemarini;
    $original_agemieactivo = $this->agemieactivo;
    $original_agemiefin = $this->agemiefin;
    $original_agemieini = $this->agemieini;
    $original_agesabactivo = $this->agesabactivo;
    $original_agesabfin = $this->agesabfin;
    $original_agesabini = $this->agesabini;
    $original_agevieactivo = $this->agevieactivo;
    $original_ageviefin = $this->ageviefin;
    $original_agevieini = $this->agevieini;
}
  $error_test    = ($this->agelunactivo !=1 &&  $this->agemaractivo !=1 &&  $this->agemieactivo !=1 &&  $this->agejueactivo !=1 &&  $this->agevieactivo !=1 &&  $this->agesabactivo !=1 &&  $this->agedomactivo !=1);    
$error_message = 'Debe activar al menos un día para la agenda.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_agenda' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($this->agelunactivo ==1 && ($this->agelunini  == 'null' || $this->agelunfin  == 'null'));    
$error_message = 'Se deben ingresar las horas de inicio y fin del día lunes.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_agenda' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($this->agemaractivo ==1 && ($this->agemarini  == 'null' || $this->agemarfin  == 'null'));    
$error_message = 'Se deben ingresar las horas de inicio y fin del día martes.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_agenda' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($this->agemieactivo ==1 && ($this->agemieini  == 'null' || $this->agemiefin  == 'null'));    
$error_message = 'Se deben ingresar las horas de inicio y fin del día miércoles.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_agenda' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($this->agejueactivo ==1 && ($this->agejueini  == 'null' || $this->agejuefin  == 'null'));    
$error_message = 'Se deben ingresar las horas de inicio y fin del día jueves.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_agenda' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($this->agevieactivo ==1 && ($this->agevieini  == 'null' || $this->ageviefin  == 'null'));    
$error_message = 'Se deben ingresar las horas de inicio y fin del día viernes.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_agenda' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($this->agesabactivo ==1 && ($this->agesabini  == 'null' || $this->agesabfin  == 'null'));    
$error_message = 'Se deben ingresar las horas de inicio y fin del día sábado.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_agenda' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($this->agedomactivo ==1 && ($this->agedomini  == 'null' || $this->agedomfin  == 'null'));    
$error_message = 'Se deben ingresar las horas de inicio y fin del día domingo.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_agenda' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($this->agelunactivo ==1 && $this->agelunini  >= $this->agelunfin );    
$error_message = 'La hora fin del día lunes debe ser mayor a la hora inicio.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_agenda' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($this->agemaractivo ==1 && $this->agemarini  >= $this->agemarfin );    
$error_message = 'La hora fin del día martes debe ser mayor a la hora inicio.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_agenda' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($this->agemieactivo ==1 && $this->agemieini  >= $this->agemiefin );    
$error_message = 'La hora fin del día miércoles debe ser mayor a la hora inicio.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_agenda' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($this->agejueactivo ==1 && $this->agejueini  >= $this->agejuefin );    
$error_message = 'La hora fin del día jueves debe ser mayor a la hora inicio.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_agenda' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($this->agevieactivo ==1 && $this->agevieini  >= $this->ageviefin );    
$error_message = 'La hora fin del día viernes debe ser mayor a la hora inicio.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_agenda' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($this->agesabactivo ==1 && $this->agesabini  >= $this->agesabfin );    
$error_message = 'La hora fin del día sábado debe ser mayor a la hora inicio.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_agenda' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($this->agedomactivo ==1 && $this->agedomini  >= $this->agedomfin );    
$error_message = 'La hora fin del día domingo debe ser mayor a la hora inicio.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_agenda' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_agedomactivo != $this->agedomactivo || (isset($bFlagRead_agedomactivo) && $bFlagRead_agedomactivo)))
    {
        $this->ajax_return_values_agedomactivo(true);
    }
    if (($original_agedomfin != $this->agedomfin || (isset($bFlagRead_agedomfin) && $bFlagRead_agedomfin)))
    {
        $this->ajax_return_values_agedomfin(true);
    }
    if (($original_agedomini != $this->agedomini || (isset($bFlagRead_agedomini) && $bFlagRead_agedomini)))
    {
        $this->ajax_return_values_agedomini(true);
    }
    if (($original_agejueactivo != $this->agejueactivo || (isset($bFlagRead_agejueactivo) && $bFlagRead_agejueactivo)))
    {
        $this->ajax_return_values_agejueactivo(true);
    }
    if (($original_agejuefin != $this->agejuefin || (isset($bFlagRead_agejuefin) && $bFlagRead_agejuefin)))
    {
        $this->ajax_return_values_agejuefin(true);
    }
    if (($original_agejueini != $this->agejueini || (isset($bFlagRead_agejueini) && $bFlagRead_agejueini)))
    {
        $this->ajax_return_values_agejueini(true);
    }
    if (($original_agelunactivo != $this->agelunactivo || (isset($bFlagRead_agelunactivo) && $bFlagRead_agelunactivo)))
    {
        $this->ajax_return_values_agelunactivo(true);
    }
    if (($original_agelunfin != $this->agelunfin || (isset($bFlagRead_agelunfin) && $bFlagRead_agelunfin)))
    {
        $this->ajax_return_values_agelunfin(true);
    }
    if (($original_agelunini != $this->agelunini || (isset($bFlagRead_agelunini) && $bFlagRead_agelunini)))
    {
        $this->ajax_return_values_agelunini(true);
    }
    if (($original_agemaractivo != $this->agemaractivo || (isset($bFlagRead_agemaractivo) && $bFlagRead_agemaractivo)))
    {
        $this->ajax_return_values_agemaractivo(true);
    }
    if (($original_agemarfin != $this->agemarfin || (isset($bFlagRead_agemarfin) && $bFlagRead_agemarfin)))
    {
        $this->ajax_return_values_agemarfin(true);
    }
    if (($original_agemarini != $this->agemarini || (isset($bFlagRead_agemarini) && $bFlagRead_agemarini)))
    {
        $this->ajax_return_values_agemarini(true);
    }
    if (($original_agemieactivo != $this->agemieactivo || (isset($bFlagRead_agemieactivo) && $bFlagRead_agemieactivo)))
    {
        $this->ajax_return_values_agemieactivo(true);
    }
    if (($original_agemiefin != $this->agemiefin || (isset($bFlagRead_agemiefin) && $bFlagRead_agemiefin)))
    {
        $this->ajax_return_values_agemiefin(true);
    }
    if (($original_agemieini != $this->agemieini || (isset($bFlagRead_agemieini) && $bFlagRead_agemieini)))
    {
        $this->ajax_return_values_agemieini(true);
    }
    if (($original_agesabactivo != $this->agesabactivo || (isset($bFlagRead_agesabactivo) && $bFlagRead_agesabactivo)))
    {
        $this->ajax_return_values_agesabactivo(true);
    }
    if (($original_agesabfin != $this->agesabfin || (isset($bFlagRead_agesabfin) && $bFlagRead_agesabfin)))
    {
        $this->ajax_return_values_agesabfin(true);
    }
    if (($original_agesabini != $this->agesabini || (isset($bFlagRead_agesabini) && $bFlagRead_agesabini)))
    {
        $this->ajax_return_values_agesabini(true);
    }
    if (($original_agevieactivo != $this->agevieactivo || (isset($bFlagRead_agevieactivo) && $bFlagRead_agevieactivo)))
    {
        $this->ajax_return_values_agevieactivo(true);
    }
    if (($original_ageviefin != $this->ageviefin || (isset($bFlagRead_ageviefin) && $bFlagRead_ageviefin)))
    {
        $this->ajax_return_values_ageviefin(true);
    }
    if (($original_agevieini != $this->agevieini || (isset($bFlagRead_agevieini) && $bFlagRead_agevieini)))
    {
        $this->ajax_return_values_agevieini(true);
    }
}
$_SESSION['scriptcase']['form_agenda']['contr_erro'] = 'off'; 
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

    function ValidateField_agenombre(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['php_cmp_required']['agenombre']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['php_cmp_required']['agenombre'] == "on")) 
      { 
          if ($this->agenombre == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "NOMBRE" ; 
              if (!isset($Campos_Erros['agenombre']))
              {
                  $Campos_Erros['agenombre'] = array();
              }
              $Campos_Erros['agenombre'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['agenombre']) || !is_array($this->NM_ajax_info['errList']['agenombre']))
                  {
                      $this->NM_ajax_info['errList']['agenombre'] = array();
                  }
                  $this->NM_ajax_info['errList']['agenombre'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->agenombre) > 80) 
          { 
              $hasError = true;
              $Campos_Crit .= "NOMBRE " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 80 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['agenombre']))
              {
                  $Campos_Erros['agenombre'] = array();
              }
              $Campos_Erros['agenombre'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 80 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['agenombre']) || !is_array($this->NM_ajax_info['errList']['agenombre']))
              {
                  $this->NM_ajax_info['errList']['agenombre'] = array();
              }
              $this->NM_ajax_info['errList']['agenombre'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 80 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agenombre';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_agenombre

    function ValidateField_medcodigo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['php_cmp_required']['medcodigo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['php_cmp_required']['medcodigo'] == "on")) 
      { 
          if ($this->medcodigo == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "MÉDICO" ; 
              if (!isset($Campos_Erros['medcodigo']))
              {
                  $Campos_Erros['medcodigo'] = array();
              }
              $Campos_Erros['medcodigo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['medcodigo']) || !is_array($this->NM_ajax_info['errList']['medcodigo']))
                  {
                      $this->NM_ajax_info['errList']['medcodigo'] = array();
                  }
                  $this->NM_ajax_info['errList']['medcodigo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->medcodigo) > 11) 
          { 
              $hasError = true;
              $Campos_Crit .= "MÉDICO " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['medcodigo']))
              {
                  $Campos_Erros['medcodigo'] = array();
              }
              $Campos_Erros['medcodigo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['medcodigo']) || !is_array($this->NM_ajax_info['errList']['medcodigo']))
              {
                  $this->NM_ajax_info['errList']['medcodigo'] = array();
              }
              $this->NM_ajax_info['errList']['medcodigo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'medcodigo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_medcodigo

    function ValidateField_ageintervalo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_numero($this->ageintervalo, $this->field_config['ageintervalo']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->ageintervalo != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->ageintervalo) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "INTERVALO (minutos): " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['ageintervalo']))
                  {
                      $Campos_Erros['ageintervalo'] = array();
                  }
                  $Campos_Erros['ageintervalo'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['ageintervalo']) || !is_array($this->NM_ajax_info['errList']['ageintervalo']))
                  {
                      $this->NM_ajax_info['errList']['ageintervalo'] = array();
                  }
                  $this->NM_ajax_info['errList']['ageintervalo'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->ageintervalo, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "INTERVALO (minutos); " ; 
                  if (!isset($Campos_Erros['ageintervalo']))
                  {
                      $Campos_Erros['ageintervalo'] = array();
                  }
                  $Campos_Erros['ageintervalo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['ageintervalo']) || !is_array($this->NM_ajax_info['errList']['ageintervalo']))
                  {
                      $this->NM_ajax_info['errList']['ageintervalo'] = array();
                  }
                  $this->NM_ajax_info['errList']['ageintervalo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['php_cmp_required']['ageintervalo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['php_cmp_required']['ageintervalo'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "INTERVALO (minutos)" ; 
              if (!isset($Campos_Erros['ageintervalo']))
              {
                  $Campos_Erros['ageintervalo'] = array();
              }
              $Campos_Erros['ageintervalo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['ageintervalo']) || !is_array($this->NM_ajax_info['errList']['ageintervalo']))
                  {
                      $this->NM_ajax_info['errList']['ageintervalo'] = array();
                  }
                  $this->NM_ajax_info['errList']['ageintervalo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ageintervalo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ageintervalo

    function ValidateField_ageactivo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ageactivo == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->ageactivo))
          {
              $x = 0; 
              $this->ageactivo_1 = array(); 
              foreach ($this->ageactivo as $ind => $dados_ageactivo_1 ) 
              {
                  if ($dados_ageactivo_1 != "") 
                  {
                      $this->ageactivo_1[] = $dados_ageactivo_1;
                  } 
              } 
              $this->ageactivo = ""; 
              foreach ($this->ageactivo_1 as $dados_ageactivo_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->ageactivo .= ";";
                   } 
                   $this->ageactivo .= $dados_ageactivo_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->ageactivo === "" || is_null($this->ageactivo))  
      { 
          $this->ageactivo = 0;
          $this->sc_force_zero[] = 'ageactivo';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ageactivo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ageactivo

    function ValidateField_agecolor(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->agecolor) != "")  
          { 
          } 
          elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['php_cmp_required']['agecolor']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['php_cmp_required']['agecolor'] == "on") 
          { 
              $hasError = true;
              $Campos_Falta[] = "COLOR" ; 
              if (!isset($Campos_Erros['agecolor']))
              {
                  $Campos_Erros['agecolor'] = array();
              }
              $Campos_Erros['agecolor'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['agecolor']) || !is_array($this->NM_ajax_info['errList']['agecolor']))
                  {
                      $this->NM_ajax_info['errList']['agecolor'] = array();
                  }
                  $this->NM_ajax_info['errList']['agecolor'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agecolor';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_agecolor

    function ValidateField_ageusucrea(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->ageusucrea) > 32) 
          { 
              $hasError = true;
              $Campos_Crit .= "USUARIO CREACIÓN " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['ageusucrea']))
              {
                  $Campos_Erros['ageusucrea'] = array();
              }
              $Campos_Erros['ageusucrea'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['ageusucrea']) || !is_array($this->NM_ajax_info['errList']['ageusucrea']))
              {
                  $this->NM_ajax_info['errList']['ageusucrea'] = array();
              }
              $this->NM_ajax_info['errList']['ageusucrea'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ageusucrea';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ageusucrea

    function ValidateField_agefeccrea(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->agefeccrea, $this->field_config['agefeccrea']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao == "incluir")
      { 
          $guarda_datahora = $this->field_config['agefeccrea']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['agefeccrea']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['agefeccrea']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['agefeccrea']['date_sep']) ; 
          if (trim($this->agefeccrea) != "")  
          { 
              if ($teste_validade->Data($this->agefeccrea, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "FECHA CREACIÓN; " ; 
                  if (!isset($Campos_Erros['agefeccrea']))
                  {
                      $Campos_Erros['agefeccrea'] = array();
                  }
                  $Campos_Erros['agefeccrea'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['agefeccrea']) || !is_array($this->NM_ajax_info['errList']['agefeccrea']))
                  {
                      $this->NM_ajax_info['errList']['agefeccrea'] = array();
                  }
                  $this->NM_ajax_info['errList']['agefeccrea'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['agefeccrea']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agefeccrea';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->agefeccrea_hora, $this->field_config['agefeccrea_hora']['time_sep']) ; 
      if ($this->nmgp_opcao == "incluir")
      {
          $Format_Hora = $this->field_config['agefeccrea_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['agefeccrea_hora']['time_sep']) ; 
          if (trim($this->agefeccrea_hora) != "")  
          { 
              if ($teste_validade->Hora($this->agefeccrea_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "FECHA CREACIÓN; " ; 
                  if (!isset($Campos_Erros['agefeccrea_hora']))
                  {
                      $Campos_Erros['agefeccrea_hora'] = array();
                  }
                  $Campos_Erros['agefeccrea_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['agefeccrea']) || !is_array($this->NM_ajax_info['errList']['agefeccrea']))
                  {
                      $this->NM_ajax_info['errList']['agefeccrea'] = array();
                  }
                  $this->NM_ajax_info['errList']['agefeccrea'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['agefeccrea']) && isset($Campos_Erros['agefeccrea_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['agefeccrea'], $Campos_Erros['agefeccrea_hora']);
          if (empty($Campos_Erros['agefeccrea_hora']))
          {
              unset($Campos_Erros['agefeccrea_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['agefeccrea']))
          {
              $this->NM_ajax_info['errList']['agefeccrea'] = array_unique($this->NM_ajax_info['errList']['agefeccrea']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agefeccrea_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_agefeccrea_hora

    function ValidateField_ageusumodi(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->ageusumodi) > 32) 
          { 
              $hasError = true;
              $Campos_Crit .= "USUARIO MODIFICACIÓN " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['ageusumodi']))
              {
                  $Campos_Erros['ageusumodi'] = array();
              }
              $Campos_Erros['ageusumodi'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['ageusumodi']) || !is_array($this->NM_ajax_info['errList']['ageusumodi']))
              {
                  $this->NM_ajax_info['errList']['ageusumodi'] = array();
              }
              $this->NM_ajax_info['errList']['ageusumodi'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ageusumodi';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ageusumodi

    function ValidateField_agefecmodi(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->agefecmodi, $this->field_config['agefecmodi']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao == "incluir")
      { 
          $guarda_datahora = $this->field_config['agefecmodi']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['agefecmodi']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['agefecmodi']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['agefecmodi']['date_sep']) ; 
          if (trim($this->agefecmodi) != "")  
          { 
              if ($teste_validade->Data($this->agefecmodi, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "FECHA MODIFICACIÓN; " ; 
                  if (!isset($Campos_Erros['agefecmodi']))
                  {
                      $Campos_Erros['agefecmodi'] = array();
                  }
                  $Campos_Erros['agefecmodi'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['agefecmodi']) || !is_array($this->NM_ajax_info['errList']['agefecmodi']))
                  {
                      $this->NM_ajax_info['errList']['agefecmodi'] = array();
                  }
                  $this->NM_ajax_info['errList']['agefecmodi'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['agefecmodi']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agefecmodi';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->agefecmodi_hora, $this->field_config['agefecmodi_hora']['time_sep']) ; 
      if ($this->nmgp_opcao == "incluir")
      {
          $Format_Hora = $this->field_config['agefecmodi_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['agefecmodi_hora']['time_sep']) ; 
          if (trim($this->agefecmodi_hora) != "")  
          { 
              if ($teste_validade->Hora($this->agefecmodi_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "FECHA MODIFICACIÓN; " ; 
                  if (!isset($Campos_Erros['agefecmodi_hora']))
                  {
                      $Campos_Erros['agefecmodi_hora'] = array();
                  }
                  $Campos_Erros['agefecmodi_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['agefecmodi']) || !is_array($this->NM_ajax_info['errList']['agefecmodi']))
                  {
                      $this->NM_ajax_info['errList']['agefecmodi'] = array();
                  }
                  $this->NM_ajax_info['errList']['agefecmodi'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['agefecmodi']) && isset($Campos_Erros['agefecmodi_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['agefecmodi'], $Campos_Erros['agefecmodi_hora']);
          if (empty($Campos_Erros['agefecmodi_hora']))
          {
              unset($Campos_Erros['agefecmodi_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['agefecmodi']))
          {
              $this->NM_ajax_info['errList']['agefecmodi'] = array_unique($this->NM_ajax_info['errList']['agefecmodi']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agefecmodi_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_agefecmodi_hora

    function ValidateField_agelunactivo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->agelunactivo == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->agelunactivo))
          {
              $x = 0; 
              $this->agelunactivo_1 = array(); 
              foreach ($this->agelunactivo as $ind => $dados_agelunactivo_1 ) 
              {
                  if ($dados_agelunactivo_1 != "") 
                  {
                      $this->agelunactivo_1[] = $dados_agelunactivo_1;
                  } 
              } 
              $this->agelunactivo = ""; 
              foreach ($this->agelunactivo_1 as $dados_agelunactivo_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->agelunactivo .= ";";
                   } 
                   $this->agelunactivo .= $dados_agelunactivo_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->agelunactivo === "" || is_null($this->agelunactivo))  
      { 
          $this->agelunactivo = 0;
          $this->sc_force_zero[] = 'agelunactivo';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agelunactivo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_agelunactivo

    function ValidateField_agemaractivo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->agemaractivo == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->agemaractivo))
          {
              $x = 0; 
              $this->agemaractivo_1 = array(); 
              foreach ($this->agemaractivo as $ind => $dados_agemaractivo_1 ) 
              {
                  if ($dados_agemaractivo_1 != "") 
                  {
                      $this->agemaractivo_1[] = $dados_agemaractivo_1;
                  } 
              } 
              $this->agemaractivo = ""; 
              foreach ($this->agemaractivo_1 as $dados_agemaractivo_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->agemaractivo .= ";";
                   } 
                   $this->agemaractivo .= $dados_agemaractivo_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->agemaractivo === "" || is_null($this->agemaractivo))  
      { 
          $this->agemaractivo = 0;
          $this->sc_force_zero[] = 'agemaractivo';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agemaractivo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_agemaractivo

    function ValidateField_agemieactivo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->agemieactivo == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->agemieactivo))
          {
              $x = 0; 
              $this->agemieactivo_1 = array(); 
              foreach ($this->agemieactivo as $ind => $dados_agemieactivo_1 ) 
              {
                  if ($dados_agemieactivo_1 != "") 
                  {
                      $this->agemieactivo_1[] = $dados_agemieactivo_1;
                  } 
              } 
              $this->agemieactivo = ""; 
              foreach ($this->agemieactivo_1 as $dados_agemieactivo_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->agemieactivo .= ";";
                   } 
                   $this->agemieactivo .= $dados_agemieactivo_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->agemieactivo === "" || is_null($this->agemieactivo))  
      { 
          $this->agemieactivo = 0;
          $this->sc_force_zero[] = 'agemieactivo';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agemieactivo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_agemieactivo

    function ValidateField_agejueactivo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->agejueactivo == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->agejueactivo))
          {
              $x = 0; 
              $this->agejueactivo_1 = array(); 
              foreach ($this->agejueactivo as $ind => $dados_agejueactivo_1 ) 
              {
                  if ($dados_agejueactivo_1 != "") 
                  {
                      $this->agejueactivo_1[] = $dados_agejueactivo_1;
                  } 
              } 
              $this->agejueactivo = ""; 
              foreach ($this->agejueactivo_1 as $dados_agejueactivo_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->agejueactivo .= ";";
                   } 
                   $this->agejueactivo .= $dados_agejueactivo_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->agejueactivo === "" || is_null($this->agejueactivo))  
      { 
          $this->agejueactivo = 0;
          $this->sc_force_zero[] = 'agejueactivo';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agejueactivo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_agejueactivo

    function ValidateField_agevieactivo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->agevieactivo == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->agevieactivo))
          {
              $x = 0; 
              $this->agevieactivo_1 = array(); 
              foreach ($this->agevieactivo as $ind => $dados_agevieactivo_1 ) 
              {
                  if ($dados_agevieactivo_1 != "") 
                  {
                      $this->agevieactivo_1[] = $dados_agevieactivo_1;
                  } 
              } 
              $this->agevieactivo = ""; 
              foreach ($this->agevieactivo_1 as $dados_agevieactivo_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->agevieactivo .= ";";
                   } 
                   $this->agevieactivo .= $dados_agevieactivo_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->agevieactivo === "" || is_null($this->agevieactivo))  
      { 
          $this->agevieactivo = 0;
          $this->sc_force_zero[] = 'agevieactivo';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agevieactivo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_agevieactivo

    function ValidateField_agesabactivo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->agesabactivo == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->agesabactivo))
          {
              $x = 0; 
              $this->agesabactivo_1 = array(); 
              foreach ($this->agesabactivo as $ind => $dados_agesabactivo_1 ) 
              {
                  if ($dados_agesabactivo_1 != "") 
                  {
                      $this->agesabactivo_1[] = $dados_agesabactivo_1;
                  } 
              } 
              $this->agesabactivo = ""; 
              foreach ($this->agesabactivo_1 as $dados_agesabactivo_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->agesabactivo .= ";";
                   } 
                   $this->agesabactivo .= $dados_agesabactivo_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->agesabactivo === "" || is_null($this->agesabactivo))  
      { 
          $this->agesabactivo = 0;
          $this->sc_force_zero[] = 'agesabactivo';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agesabactivo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_agesabactivo

    function ValidateField_agedomactivo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->agedomactivo == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->agedomactivo))
          {
              $x = 0; 
              $this->agedomactivo_1 = array(); 
              foreach ($this->agedomactivo as $ind => $dados_agedomactivo_1 ) 
              {
                  if ($dados_agedomactivo_1 != "") 
                  {
                      $this->agedomactivo_1[] = $dados_agedomactivo_1;
                  } 
              } 
              $this->agedomactivo = ""; 
              foreach ($this->agedomactivo_1 as $dados_agedomactivo_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->agedomactivo .= ";";
                   } 
                   $this->agedomactivo .= $dados_agedomactivo_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->agedomactivo === "" || is_null($this->agedomactivo))  
      { 
          $this->agedomactivo = 0;
          $this->sc_force_zero[] = 'agedomactivo';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agedomactivo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_agedomactivo

    function ValidateField_agelunini(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->agelunini, $this->field_config['agelunini']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['agelunini']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['agelunini']['time_sep']) ; 
          if (trim($this->agelunini) != "")  
          { 
              if ($teste_validade->Hora($this->agelunini, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "HORA INICIO; " ; 
                  if (!isset($Campos_Erros['agelunini']))
                  {
                      $Campos_Erros['agelunini'] = array();
                  }
                  $Campos_Erros['agelunini'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['agelunini']) || !is_array($this->NM_ajax_info['errList']['agelunini']))
                  {
                      $this->NM_ajax_info['errList']['agelunini'] = array();
                  }
                  $this->NM_ajax_info['errList']['agelunini'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agelunini';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_agelunini

    function ValidateField_agelunfin(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->agelunfin, $this->field_config['agelunfin']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['agelunfin']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['agelunfin']['time_sep']) ; 
          if (trim($this->agelunfin) != "")  
          { 
              if ($teste_validade->Hora($this->agelunfin, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "HORA FIN; " ; 
                  if (!isset($Campos_Erros['agelunfin']))
                  {
                      $Campos_Erros['agelunfin'] = array();
                  }
                  $Campos_Erros['agelunfin'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['agelunfin']) || !is_array($this->NM_ajax_info['errList']['agelunfin']))
                  {
                      $this->NM_ajax_info['errList']['agelunfin'] = array();
                  }
                  $this->NM_ajax_info['errList']['agelunfin'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agelunfin';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_agelunfin

    function ValidateField_agemarini(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->agemarini, $this->field_config['agemarini']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['agemarini']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['agemarini']['time_sep']) ; 
          if (trim($this->agemarini) != "")  
          { 
              if ($teste_validade->Hora($this->agemarini, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "HORA INICIO; " ; 
                  if (!isset($Campos_Erros['agemarini']))
                  {
                      $Campos_Erros['agemarini'] = array();
                  }
                  $Campos_Erros['agemarini'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['agemarini']) || !is_array($this->NM_ajax_info['errList']['agemarini']))
                  {
                      $this->NM_ajax_info['errList']['agemarini'] = array();
                  }
                  $this->NM_ajax_info['errList']['agemarini'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agemarini';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_agemarini

    function ValidateField_agemarfin(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->agemarfin, $this->field_config['agemarfin']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['agemarfin']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['agemarfin']['time_sep']) ; 
          if (trim($this->agemarfin) != "")  
          { 
              if ($teste_validade->Hora($this->agemarfin, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "HORA FIN; " ; 
                  if (!isset($Campos_Erros['agemarfin']))
                  {
                      $Campos_Erros['agemarfin'] = array();
                  }
                  $Campos_Erros['agemarfin'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['agemarfin']) || !is_array($this->NM_ajax_info['errList']['agemarfin']))
                  {
                      $this->NM_ajax_info['errList']['agemarfin'] = array();
                  }
                  $this->NM_ajax_info['errList']['agemarfin'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agemarfin';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_agemarfin

    function ValidateField_agemieini(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->agemieini, $this->field_config['agemieini']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['agemieini']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['agemieini']['time_sep']) ; 
          if (trim($this->agemieini) != "")  
          { 
              if ($teste_validade->Hora($this->agemieini, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "HORA INICIO; " ; 
                  if (!isset($Campos_Erros['agemieini']))
                  {
                      $Campos_Erros['agemieini'] = array();
                  }
                  $Campos_Erros['agemieini'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['agemieini']) || !is_array($this->NM_ajax_info['errList']['agemieini']))
                  {
                      $this->NM_ajax_info['errList']['agemieini'] = array();
                  }
                  $this->NM_ajax_info['errList']['agemieini'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agemieini';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_agemieini

    function ValidateField_agemiefin(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->agemiefin, $this->field_config['agemiefin']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['agemiefin']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['agemiefin']['time_sep']) ; 
          if (trim($this->agemiefin) != "")  
          { 
              if ($teste_validade->Hora($this->agemiefin, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "HORA FIN; " ; 
                  if (!isset($Campos_Erros['agemiefin']))
                  {
                      $Campos_Erros['agemiefin'] = array();
                  }
                  $Campos_Erros['agemiefin'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['agemiefin']) || !is_array($this->NM_ajax_info['errList']['agemiefin']))
                  {
                      $this->NM_ajax_info['errList']['agemiefin'] = array();
                  }
                  $this->NM_ajax_info['errList']['agemiefin'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agemiefin';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_agemiefin

    function ValidateField_agejueini(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->agejueini, $this->field_config['agejueini']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['agejueini']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['agejueini']['time_sep']) ; 
          if (trim($this->agejueini) != "")  
          { 
              if ($teste_validade->Hora($this->agejueini, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "HORA INICIO; " ; 
                  if (!isset($Campos_Erros['agejueini']))
                  {
                      $Campos_Erros['agejueini'] = array();
                  }
                  $Campos_Erros['agejueini'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['agejueini']) || !is_array($this->NM_ajax_info['errList']['agejueini']))
                  {
                      $this->NM_ajax_info['errList']['agejueini'] = array();
                  }
                  $this->NM_ajax_info['errList']['agejueini'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agejueini';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_agejueini

    function ValidateField_agejuefin(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->agejuefin, $this->field_config['agejuefin']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['agejuefin']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['agejuefin']['time_sep']) ; 
          if (trim($this->agejuefin) != "")  
          { 
              if ($teste_validade->Hora($this->agejuefin, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "HORA FIN; " ; 
                  if (!isset($Campos_Erros['agejuefin']))
                  {
                      $Campos_Erros['agejuefin'] = array();
                  }
                  $Campos_Erros['agejuefin'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['agejuefin']) || !is_array($this->NM_ajax_info['errList']['agejuefin']))
                  {
                      $this->NM_ajax_info['errList']['agejuefin'] = array();
                  }
                  $this->NM_ajax_info['errList']['agejuefin'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agejuefin';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_agejuefin

    function ValidateField_agevieini(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->agevieini, $this->field_config['agevieini']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['agevieini']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['agevieini']['time_sep']) ; 
          if (trim($this->agevieini) != "")  
          { 
              if ($teste_validade->Hora($this->agevieini, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "HORA INICIO; " ; 
                  if (!isset($Campos_Erros['agevieini']))
                  {
                      $Campos_Erros['agevieini'] = array();
                  }
                  $Campos_Erros['agevieini'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['agevieini']) || !is_array($this->NM_ajax_info['errList']['agevieini']))
                  {
                      $this->NM_ajax_info['errList']['agevieini'] = array();
                  }
                  $this->NM_ajax_info['errList']['agevieini'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agevieini';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_agevieini

    function ValidateField_ageviefin(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->ageviefin, $this->field_config['ageviefin']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['ageviefin']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['ageviefin']['time_sep']) ; 
          if (trim($this->ageviefin) != "")  
          { 
              if ($teste_validade->Hora($this->ageviefin, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "HORA FIN; " ; 
                  if (!isset($Campos_Erros['ageviefin']))
                  {
                      $Campos_Erros['ageviefin'] = array();
                  }
                  $Campos_Erros['ageviefin'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['ageviefin']) || !is_array($this->NM_ajax_info['errList']['ageviefin']))
                  {
                      $this->NM_ajax_info['errList']['ageviefin'] = array();
                  }
                  $this->NM_ajax_info['errList']['ageviefin'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ageviefin';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ageviefin

    function ValidateField_agesabini(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->agesabini, $this->field_config['agesabini']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['agesabini']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['agesabini']['time_sep']) ; 
          if (trim($this->agesabini) != "")  
          { 
              if ($teste_validade->Hora($this->agesabini, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "HORA INICIO; " ; 
                  if (!isset($Campos_Erros['agesabini']))
                  {
                      $Campos_Erros['agesabini'] = array();
                  }
                  $Campos_Erros['agesabini'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['agesabini']) || !is_array($this->NM_ajax_info['errList']['agesabini']))
                  {
                      $this->NM_ajax_info['errList']['agesabini'] = array();
                  }
                  $this->NM_ajax_info['errList']['agesabini'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agesabini';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_agesabini

    function ValidateField_agesabfin(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->agesabfin, $this->field_config['agesabfin']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['agesabfin']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['agesabfin']['time_sep']) ; 
          if (trim($this->agesabfin) != "")  
          { 
              if ($teste_validade->Hora($this->agesabfin, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "HORA FIN; " ; 
                  if (!isset($Campos_Erros['agesabfin']))
                  {
                      $Campos_Erros['agesabfin'] = array();
                  }
                  $Campos_Erros['agesabfin'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['agesabfin']) || !is_array($this->NM_ajax_info['errList']['agesabfin']))
                  {
                      $this->NM_ajax_info['errList']['agesabfin'] = array();
                  }
                  $this->NM_ajax_info['errList']['agesabfin'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agesabfin';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_agesabfin

    function ValidateField_agedomini(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->agedomini, $this->field_config['agedomini']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['agedomini']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['agedomini']['time_sep']) ; 
          if (trim($this->agedomini) != "")  
          { 
              if ($teste_validade->Hora($this->agedomini, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "HORA INICIO; " ; 
                  if (!isset($Campos_Erros['agedomini']))
                  {
                      $Campos_Erros['agedomini'] = array();
                  }
                  $Campos_Erros['agedomini'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['agedomini']) || !is_array($this->NM_ajax_info['errList']['agedomini']))
                  {
                      $this->NM_ajax_info['errList']['agedomini'] = array();
                  }
                  $this->NM_ajax_info['errList']['agedomini'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agedomini';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_agedomini

    function ValidateField_agedomfin(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->agedomfin, $this->field_config['agedomfin']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['agedomfin']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['agedomfin']['time_sep']) ; 
          if (trim($this->agedomfin) != "")  
          { 
              if ($teste_validade->Hora($this->agedomfin, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "HORA FIN; " ; 
                  if (!isset($Campos_Erros['agedomfin']))
                  {
                      $Campos_Erros['agedomfin'] = array();
                  }
                  $Campos_Erros['agedomfin'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['agedomfin']) || !is_array($this->NM_ajax_info['errList']['agedomfin']))
                  {
                      $this->NM_ajax_info['errList']['agedomfin'] = array();
                  }
                  $this->NM_ajax_info['errList']['agedomfin'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agedomfin';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_agedomfin

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
    $this->nmgp_dados_form['agenombre'] = $this->agenombre;
    $this->nmgp_dados_form['medcodigo'] = $this->medcodigo;
    $this->nmgp_dados_form['ageintervalo'] = $this->ageintervalo;
    $this->nmgp_dados_form['ageactivo'] = $this->ageactivo;
    $this->nmgp_dados_form['agecolor'] = $this->agecolor;
    $this->nmgp_dados_form['ageusucrea'] = $this->ageusucrea;
    $this->nmgp_dados_form['agefeccrea'] = (strlen(trim($this->agefeccrea)) > 19) ? str_replace(".", ":", $this->agefeccrea) : trim($this->agefeccrea);
    $this->nmgp_dados_form['ageusumodi'] = $this->ageusumodi;
    $this->nmgp_dados_form['agefecmodi'] = (strlen(trim($this->agefecmodi)) > 19) ? str_replace(".", ":", $this->agefecmodi) : trim($this->agefecmodi);
    $this->nmgp_dados_form['agelunactivo'] = $this->agelunactivo;
    $this->nmgp_dados_form['agemaractivo'] = $this->agemaractivo;
    $this->nmgp_dados_form['agemieactivo'] = $this->agemieactivo;
    $this->nmgp_dados_form['agejueactivo'] = $this->agejueactivo;
    $this->nmgp_dados_form['agevieactivo'] = $this->agevieactivo;
    $this->nmgp_dados_form['agesabactivo'] = $this->agesabactivo;
    $this->nmgp_dados_form['agedomactivo'] = $this->agedomactivo;
    $this->nmgp_dados_form['agelunini'] = (strlen(trim($this->agelunini)) > 19) ? str_replace(".", ":", $this->agelunini) : trim($this->agelunini);
    $this->nmgp_dados_form['agelunfin'] = (strlen(trim($this->agelunfin)) > 19) ? str_replace(".", ":", $this->agelunfin) : trim($this->agelunfin);
    $this->nmgp_dados_form['agemarini'] = (strlen(trim($this->agemarini)) > 19) ? str_replace(".", ":", $this->agemarini) : trim($this->agemarini);
    $this->nmgp_dados_form['agemarfin'] = (strlen(trim($this->agemarfin)) > 19) ? str_replace(".", ":", $this->agemarfin) : trim($this->agemarfin);
    $this->nmgp_dados_form['agemieini'] = (strlen(trim($this->agemieini)) > 19) ? str_replace(".", ":", $this->agemieini) : trim($this->agemieini);
    $this->nmgp_dados_form['agemiefin'] = (strlen(trim($this->agemiefin)) > 19) ? str_replace(".", ":", $this->agemiefin) : trim($this->agemiefin);
    $this->nmgp_dados_form['agejueini'] = (strlen(trim($this->agejueini)) > 19) ? str_replace(".", ":", $this->agejueini) : trim($this->agejueini);
    $this->nmgp_dados_form['agejuefin'] = (strlen(trim($this->agejuefin)) > 19) ? str_replace(".", ":", $this->agejuefin) : trim($this->agejuefin);
    $this->nmgp_dados_form['agevieini'] = (strlen(trim($this->agevieini)) > 19) ? str_replace(".", ":", $this->agevieini) : trim($this->agevieini);
    $this->nmgp_dados_form['ageviefin'] = (strlen(trim($this->ageviefin)) > 19) ? str_replace(".", ":", $this->ageviefin) : trim($this->ageviefin);
    $this->nmgp_dados_form['agesabini'] = (strlen(trim($this->agesabini)) > 19) ? str_replace(".", ":", $this->agesabini) : trim($this->agesabini);
    $this->nmgp_dados_form['agesabfin'] = (strlen(trim($this->agesabfin)) > 19) ? str_replace(".", ":", $this->agesabfin) : trim($this->agesabfin);
    $this->nmgp_dados_form['agedomini'] = (strlen(trim($this->agedomini)) > 19) ? str_replace(".", ":", $this->agedomini) : trim($this->agedomini);
    $this->nmgp_dados_form['agedomfin'] = (strlen(trim($this->agedomfin)) > 19) ? str_replace(".", ":", $this->agedomfin) : trim($this->agedomfin);
    $this->nmgp_dados_form['agesecuen'] = $this->agesecuen;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['ageintervalo'] = $this->ageintervalo;
      nm_limpa_numero($this->ageintervalo, $this->field_config['ageintervalo']['symbol_grp']) ; 
      $this->Before_unformat['agefeccrea'] = $this->agefeccrea;
      nm_limpa_data($this->agefeccrea, $this->field_config['agefeccrea']['date_sep']) ; 
      nm_limpa_hora($this->agefeccrea_hora, $this->field_config['agefeccrea']['time_sep']) ; 
      $this->Before_unformat['agefecmodi'] = $this->agefecmodi;
      nm_limpa_data($this->agefecmodi, $this->field_config['agefecmodi']['date_sep']) ; 
      nm_limpa_hora($this->agefecmodi_hora, $this->field_config['agefecmodi']['time_sep']) ; 
      $this->Before_unformat['agelunini'] = $this->agelunini;
      nm_limpa_hora($this->agelunini, $this->field_config['agelunini']['time_sep']) ; 
      $this->Before_unformat['agelunfin'] = $this->agelunfin;
      nm_limpa_hora($this->agelunfin, $this->field_config['agelunfin']['time_sep']) ; 
      $this->Before_unformat['agemarini'] = $this->agemarini;
      nm_limpa_hora($this->agemarini, $this->field_config['agemarini']['time_sep']) ; 
      $this->Before_unformat['agemarfin'] = $this->agemarfin;
      nm_limpa_hora($this->agemarfin, $this->field_config['agemarfin']['time_sep']) ; 
      $this->Before_unformat['agemieini'] = $this->agemieini;
      nm_limpa_hora($this->agemieini, $this->field_config['agemieini']['time_sep']) ; 
      $this->Before_unformat['agemiefin'] = $this->agemiefin;
      nm_limpa_hora($this->agemiefin, $this->field_config['agemiefin']['time_sep']) ; 
      $this->Before_unformat['agejueini'] = $this->agejueini;
      nm_limpa_hora($this->agejueini, $this->field_config['agejueini']['time_sep']) ; 
      $this->Before_unformat['agejuefin'] = $this->agejuefin;
      nm_limpa_hora($this->agejuefin, $this->field_config['agejuefin']['time_sep']) ; 
      $this->Before_unformat['agevieini'] = $this->agevieini;
      nm_limpa_hora($this->agevieini, $this->field_config['agevieini']['time_sep']) ; 
      $this->Before_unformat['ageviefin'] = $this->ageviefin;
      nm_limpa_hora($this->ageviefin, $this->field_config['ageviefin']['time_sep']) ; 
      $this->Before_unformat['agesabini'] = $this->agesabini;
      nm_limpa_hora($this->agesabini, $this->field_config['agesabini']['time_sep']) ; 
      $this->Before_unformat['agesabfin'] = $this->agesabfin;
      nm_limpa_hora($this->agesabfin, $this->field_config['agesabfin']['time_sep']) ; 
      $this->Before_unformat['agedomini'] = $this->agedomini;
      nm_limpa_hora($this->agedomini, $this->field_config['agedomini']['time_sep']) ; 
      $this->Before_unformat['agedomfin'] = $this->agedomfin;
      nm_limpa_hora($this->agedomfin, $this->field_config['agedomfin']['time_sep']) ; 
      $this->Before_unformat['agesecuen'] = $this->agesecuen;
      nm_limpa_numero($this->agesecuen, $this->field_config['agesecuen']['symbol_grp']) ; 
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
      if ($Nome_Campo == "ageintervalo")
      {
          nm_limpa_numero($this->ageintervalo, $this->field_config['ageintervalo']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "agesecuen")
      {
          nm_limpa_numero($this->agesecuen, $this->field_config['agesecuen']['symbol_grp']) ; 
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
      if ('' !== $this->ageintervalo || (!empty($format_fields) && isset($format_fields['ageintervalo'])))
      {
          nmgp_Form_Num_Val($this->ageintervalo, $this->field_config['ageintervalo']['symbol_grp'], $this->field_config['ageintervalo']['symbol_dec'], "0", "S", $this->field_config['ageintervalo']['format_neg'], "", "", "-", $this->field_config['ageintervalo']['symbol_fmt']) ; 
      }
      if ((!empty($this->agefeccrea) && 'null' != $this->agefeccrea) || (!empty($format_fields) && isset($format_fields['agefeccrea'])))
      {
          $nm_separa_data = strpos($this->field_config['agefeccrea']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['agefeccrea']['date_format'];
          $this->field_config['agefeccrea']['date_format'] = substr($this->field_config['agefeccrea']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->agefeccrea, " ") ; 
          $this->agefeccrea_hora = substr($this->agefeccrea, $separador + 1) ; 
          $this->agefeccrea = substr($this->agefeccrea, 0, $separador) ; 
          nm_volta_data($this->agefeccrea, $this->field_config['agefeccrea']['date_format']) ; 
          nmgp_Form_Datas($this->agefeccrea, $this->field_config['agefeccrea']['date_format'], $this->field_config['agefeccrea']['date_sep']) ;  
          $this->field_config['agefeccrea']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->agefeccrea_hora, $this->field_config['agefeccrea']['date_format']) ; 
          nmgp_Form_Hora($this->agefeccrea_hora, $this->field_config['agefeccrea']['date_format'], $this->field_config['agefeccrea']['time_sep']) ;  
          $this->field_config['agefeccrea']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->agefeccrea || '' == $this->agefeccrea)
      {
          $this->agefeccrea_hora = '';
          $this->agefeccrea = '';
      }
      if ((!empty($this->agefecmodi) && 'null' != $this->agefecmodi) || (!empty($format_fields) && isset($format_fields['agefecmodi'])))
      {
          $nm_separa_data = strpos($this->field_config['agefecmodi']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['agefecmodi']['date_format'];
          $this->field_config['agefecmodi']['date_format'] = substr($this->field_config['agefecmodi']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->agefecmodi, " ") ; 
          $this->agefecmodi_hora = substr($this->agefecmodi, $separador + 1) ; 
          $this->agefecmodi = substr($this->agefecmodi, 0, $separador) ; 
          nm_volta_data($this->agefecmodi, $this->field_config['agefecmodi']['date_format']) ; 
          nmgp_Form_Datas($this->agefecmodi, $this->field_config['agefecmodi']['date_format'], $this->field_config['agefecmodi']['date_sep']) ;  
          $this->field_config['agefecmodi']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->agefecmodi_hora, $this->field_config['agefecmodi']['date_format']) ; 
          nmgp_Form_Hora($this->agefecmodi_hora, $this->field_config['agefecmodi']['date_format'], $this->field_config['agefecmodi']['time_sep']) ;  
          $this->field_config['agefecmodi']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->agefecmodi || '' == $this->agefecmodi)
      {
          $this->agefecmodi_hora = '';
          $this->agefecmodi = '';
      }
      if ((!empty($this->agelunini) && 'null' != $this->agelunini) || (!empty($format_fields) && isset($format_fields['agelunini'])))
      {
          nm_volta_hora($this->agelunini, $this->field_config['agelunini']['date_format']) ; 
          nmgp_Form_Hora($this->agelunini, $this->field_config['agelunini']['date_format'], $this->field_config['agelunini']['time_sep']) ;  
      }
      elseif ('null' == $this->agelunini || '' == $this->agelunini)
      {
          $this->agelunini = '';
      }
      if ((!empty($this->agelunfin) && 'null' != $this->agelunfin) || (!empty($format_fields) && isset($format_fields['agelunfin'])))
      {
          nm_volta_hora($this->agelunfin, $this->field_config['agelunfin']['date_format']) ; 
          nmgp_Form_Hora($this->agelunfin, $this->field_config['agelunfin']['date_format'], $this->field_config['agelunfin']['time_sep']) ;  
      }
      elseif ('null' == $this->agelunfin || '' == $this->agelunfin)
      {
          $this->agelunfin = '';
      }
      if ((!empty($this->agemarini) && 'null' != $this->agemarini) || (!empty($format_fields) && isset($format_fields['agemarini'])))
      {
          nm_volta_hora($this->agemarini, $this->field_config['agemarini']['date_format']) ; 
          nmgp_Form_Hora($this->agemarini, $this->field_config['agemarini']['date_format'], $this->field_config['agemarini']['time_sep']) ;  
      }
      elseif ('null' == $this->agemarini || '' == $this->agemarini)
      {
          $this->agemarini = '';
      }
      if ((!empty($this->agemarfin) && 'null' != $this->agemarfin) || (!empty($format_fields) && isset($format_fields['agemarfin'])))
      {
          nm_volta_hora($this->agemarfin, $this->field_config['agemarfin']['date_format']) ; 
          nmgp_Form_Hora($this->agemarfin, $this->field_config['agemarfin']['date_format'], $this->field_config['agemarfin']['time_sep']) ;  
      }
      elseif ('null' == $this->agemarfin || '' == $this->agemarfin)
      {
          $this->agemarfin = '';
      }
      if ((!empty($this->agemieini) && 'null' != $this->agemieini) || (!empty($format_fields) && isset($format_fields['agemieini'])))
      {
          nm_volta_hora($this->agemieini, $this->field_config['agemieini']['date_format']) ; 
          nmgp_Form_Hora($this->agemieini, $this->field_config['agemieini']['date_format'], $this->field_config['agemieini']['time_sep']) ;  
      }
      elseif ('null' == $this->agemieini || '' == $this->agemieini)
      {
          $this->agemieini = '';
      }
      if ((!empty($this->agemiefin) && 'null' != $this->agemiefin) || (!empty($format_fields) && isset($format_fields['agemiefin'])))
      {
          nm_volta_hora($this->agemiefin, $this->field_config['agemiefin']['date_format']) ; 
          nmgp_Form_Hora($this->agemiefin, $this->field_config['agemiefin']['date_format'], $this->field_config['agemiefin']['time_sep']) ;  
      }
      elseif ('null' == $this->agemiefin || '' == $this->agemiefin)
      {
          $this->agemiefin = '';
      }
      if ((!empty($this->agejueini) && 'null' != $this->agejueini) || (!empty($format_fields) && isset($format_fields['agejueini'])))
      {
          nm_volta_hora($this->agejueini, $this->field_config['agejueini']['date_format']) ; 
          nmgp_Form_Hora($this->agejueini, $this->field_config['agejueini']['date_format'], $this->field_config['agejueini']['time_sep']) ;  
      }
      elseif ('null' == $this->agejueini || '' == $this->agejueini)
      {
          $this->agejueini = '';
      }
      if ((!empty($this->agejuefin) && 'null' != $this->agejuefin) || (!empty($format_fields) && isset($format_fields['agejuefin'])))
      {
          nm_volta_hora($this->agejuefin, $this->field_config['agejuefin']['date_format']) ; 
          nmgp_Form_Hora($this->agejuefin, $this->field_config['agejuefin']['date_format'], $this->field_config['agejuefin']['time_sep']) ;  
      }
      elseif ('null' == $this->agejuefin || '' == $this->agejuefin)
      {
          $this->agejuefin = '';
      }
      if ((!empty($this->agevieini) && 'null' != $this->agevieini) || (!empty($format_fields) && isset($format_fields['agevieini'])))
      {
          nm_volta_hora($this->agevieini, $this->field_config['agevieini']['date_format']) ; 
          nmgp_Form_Hora($this->agevieini, $this->field_config['agevieini']['date_format'], $this->field_config['agevieini']['time_sep']) ;  
      }
      elseif ('null' == $this->agevieini || '' == $this->agevieini)
      {
          $this->agevieini = '';
      }
      if ((!empty($this->ageviefin) && 'null' != $this->ageviefin) || (!empty($format_fields) && isset($format_fields['ageviefin'])))
      {
          nm_volta_hora($this->ageviefin, $this->field_config['ageviefin']['date_format']) ; 
          nmgp_Form_Hora($this->ageviefin, $this->field_config['ageviefin']['date_format'], $this->field_config['ageviefin']['time_sep']) ;  
      }
      elseif ('null' == $this->ageviefin || '' == $this->ageviefin)
      {
          $this->ageviefin = '';
      }
      if ((!empty($this->agesabini) && 'null' != $this->agesabini) || (!empty($format_fields) && isset($format_fields['agesabini'])))
      {
          nm_volta_hora($this->agesabini, $this->field_config['agesabini']['date_format']) ; 
          nmgp_Form_Hora($this->agesabini, $this->field_config['agesabini']['date_format'], $this->field_config['agesabini']['time_sep']) ;  
      }
      elseif ('null' == $this->agesabini || '' == $this->agesabini)
      {
          $this->agesabini = '';
      }
      if ((!empty($this->agesabfin) && 'null' != $this->agesabfin) || (!empty($format_fields) && isset($format_fields['agesabfin'])))
      {
          nm_volta_hora($this->agesabfin, $this->field_config['agesabfin']['date_format']) ; 
          nmgp_Form_Hora($this->agesabfin, $this->field_config['agesabfin']['date_format'], $this->field_config['agesabfin']['time_sep']) ;  
      }
      elseif ('null' == $this->agesabfin || '' == $this->agesabfin)
      {
          $this->agesabfin = '';
      }
      if ((!empty($this->agedomini) && 'null' != $this->agedomini) || (!empty($format_fields) && isset($format_fields['agedomini'])))
      {
          nm_volta_hora($this->agedomini, $this->field_config['agedomini']['date_format']) ; 
          nmgp_Form_Hora($this->agedomini, $this->field_config['agedomini']['date_format'], $this->field_config['agedomini']['time_sep']) ;  
      }
      elseif ('null' == $this->agedomini || '' == $this->agedomini)
      {
          $this->agedomini = '';
      }
      if ((!empty($this->agedomfin) && 'null' != $this->agedomfin) || (!empty($format_fields) && isset($format_fields['agedomfin'])))
      {
          nm_volta_hora($this->agedomfin, $this->field_config['agedomfin']['date_format']) ; 
          nmgp_Form_Hora($this->agedomfin, $this->field_config['agedomfin']['date_format'], $this->field_config['agedomfin']['time_sep']) ;  
      }
      elseif ('null' == $this->agedomfin || '' == $this->agedomfin)
      {
          $this->agedomfin = '';
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
      $guarda_format_hora = $this->field_config['agefeccrea']['date_format'];
      if ($this->agefeccrea != "")  
      { 
          $nm_separa_data = strpos($this->field_config['agefeccrea']['date_format'], ";") ;
          $this->field_config['agefeccrea']['date_format'] = substr($this->field_config['agefeccrea']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->agefeccrea, $this->field_config['agefeccrea']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->agefeccrea = str_replace('-', '', $this->agefeccrea);
          }
          $this->field_config['agefeccrea']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->agefeccrea_hora, $this->field_config['agefeccrea']['date_format']) ; 
          if ($this->agefeccrea_hora == "" )  
          { 
              $this->agefeccrea_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->agefeccrea_hora = substr($this->agefeccrea_hora, 0, -4) . "." . substr($this->agefeccrea_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->agefeccrea_hora = substr($this->agefeccrea_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->agefeccrea_hora = substr($this->agefeccrea_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->agefeccrea_hora = substr($this->agefeccrea_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->agefeccrea_hora = substr($this->agefeccrea_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->agefeccrea_hora = substr($this->agefeccrea_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->agefeccrea_hora = substr($this->agefeccrea_hora, 0, -4);
          }
          if ($this->agefeccrea != "")  
          { 
              $this->agefeccrea .= " " . $this->agefeccrea_hora ; 
          }
      } 
      if ($this->agefeccrea == "" && $use_null)  
      { 
          $this->agefeccrea = "null" ; 
      } 
      $this->field_config['agefeccrea']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['agefecmodi']['date_format'];
      if ($this->agefecmodi != "")  
      { 
          $nm_separa_data = strpos($this->field_config['agefecmodi']['date_format'], ";") ;
          $this->field_config['agefecmodi']['date_format'] = substr($this->field_config['agefecmodi']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->agefecmodi, $this->field_config['agefecmodi']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->agefecmodi = str_replace('-', '', $this->agefecmodi);
          }
          $this->field_config['agefecmodi']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->agefecmodi_hora, $this->field_config['agefecmodi']['date_format']) ; 
          if ($this->agefecmodi_hora == "" )  
          { 
              $this->agefecmodi_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->agefecmodi_hora = substr($this->agefecmodi_hora, 0, -4) . "." . substr($this->agefecmodi_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->agefecmodi_hora = substr($this->agefecmodi_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->agefecmodi_hora = substr($this->agefecmodi_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->agefecmodi_hora = substr($this->agefecmodi_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->agefecmodi_hora = substr($this->agefecmodi_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->agefecmodi_hora = substr($this->agefecmodi_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->agefecmodi_hora = substr($this->agefecmodi_hora, 0, -4);
          }
          if ($this->agefecmodi != "")  
          { 
              $this->agefecmodi .= " " . $this->agefecmodi_hora ; 
          }
      } 
      if ($this->agefecmodi == "" && $use_null)  
      { 
          $this->agefecmodi = "null" ; 
      } 
      $this->field_config['agefecmodi']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['agelunini']['date_format'];
      if ($this->agelunini != "")  
      { 
          $this->agelunini_hora = $this->agelunini;
          $this->agelunini = "1900-01-01";
          nm_conv_hora($this->agelunini_hora, $this->field_config['agelunini']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->agelunini_hora = substr($this->agelunini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->agelunini_hora = substr($this->agelunini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->agelunini_hora = substr($this->agelunini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->agelunini_hora = substr($this->agelunini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->agelunini_hora = substr($this->agelunini_hora, 0, -4);
          }
          $this->agelunini = $this->agelunini_hora;
      } 
      if ($this->agelunini == "" && $use_null)  
      { 
          $this->agelunini = "null" ; 
      } 
      $this->field_config['agelunini']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['agelunfin']['date_format'];
      if ($this->agelunfin != "")  
      { 
          $this->agelunfin_hora = $this->agelunfin;
          $this->agelunfin = "1900-01-01";
          nm_conv_hora($this->agelunfin_hora, $this->field_config['agelunfin']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->agelunfin_hora = substr($this->agelunfin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->agelunfin_hora = substr($this->agelunfin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->agelunfin_hora = substr($this->agelunfin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->agelunfin_hora = substr($this->agelunfin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->agelunfin_hora = substr($this->agelunfin_hora, 0, -4);
          }
          $this->agelunfin = $this->agelunfin_hora;
      } 
      if ($this->agelunfin == "" && $use_null)  
      { 
          $this->agelunfin = "null" ; 
      } 
      $this->field_config['agelunfin']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['agemarini']['date_format'];
      if ($this->agemarini != "")  
      { 
          $this->agemarini_hora = $this->agemarini;
          $this->agemarini = "1900-01-01";
          nm_conv_hora($this->agemarini_hora, $this->field_config['agemarini']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->agemarini_hora = substr($this->agemarini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->agemarini_hora = substr($this->agemarini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->agemarini_hora = substr($this->agemarini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->agemarini_hora = substr($this->agemarini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->agemarini_hora = substr($this->agemarini_hora, 0, -4);
          }
          $this->agemarini = $this->agemarini_hora;
      } 
      if ($this->agemarini == "" && $use_null)  
      { 
          $this->agemarini = "null" ; 
      } 
      $this->field_config['agemarini']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['agemarfin']['date_format'];
      if ($this->agemarfin != "")  
      { 
          $this->agemarfin_hora = $this->agemarfin;
          $this->agemarfin = "1900-01-01";
          nm_conv_hora($this->agemarfin_hora, $this->field_config['agemarfin']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->agemarfin_hora = substr($this->agemarfin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->agemarfin_hora = substr($this->agemarfin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->agemarfin_hora = substr($this->agemarfin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->agemarfin_hora = substr($this->agemarfin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->agemarfin_hora = substr($this->agemarfin_hora, 0, -4);
          }
          $this->agemarfin = $this->agemarfin_hora;
      } 
      if ($this->agemarfin == "" && $use_null)  
      { 
          $this->agemarfin = "null" ; 
      } 
      $this->field_config['agemarfin']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['agemieini']['date_format'];
      if ($this->agemieini != "")  
      { 
          $this->agemieini_hora = $this->agemieini;
          $this->agemieini = "1900-01-01";
          nm_conv_hora($this->agemieini_hora, $this->field_config['agemieini']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->agemieini_hora = substr($this->agemieini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->agemieini_hora = substr($this->agemieini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->agemieini_hora = substr($this->agemieini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->agemieini_hora = substr($this->agemieini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->agemieini_hora = substr($this->agemieini_hora, 0, -4);
          }
          $this->agemieini = $this->agemieini_hora;
      } 
      if ($this->agemieini == "" && $use_null)  
      { 
          $this->agemieini = "null" ; 
      } 
      $this->field_config['agemieini']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['agemiefin']['date_format'];
      if ($this->agemiefin != "")  
      { 
          $this->agemiefin_hora = $this->agemiefin;
          $this->agemiefin = "1900-01-01";
          nm_conv_hora($this->agemiefin_hora, $this->field_config['agemiefin']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->agemiefin_hora = substr($this->agemiefin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->agemiefin_hora = substr($this->agemiefin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->agemiefin_hora = substr($this->agemiefin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->agemiefin_hora = substr($this->agemiefin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->agemiefin_hora = substr($this->agemiefin_hora, 0, -4);
          }
          $this->agemiefin = $this->agemiefin_hora;
      } 
      if ($this->agemiefin == "" && $use_null)  
      { 
          $this->agemiefin = "null" ; 
      } 
      $this->field_config['agemiefin']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['agejueini']['date_format'];
      if ($this->agejueini != "")  
      { 
          $this->agejueini_hora = $this->agejueini;
          $this->agejueini = "1900-01-01";
          nm_conv_hora($this->agejueini_hora, $this->field_config['agejueini']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->agejueini_hora = substr($this->agejueini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->agejueini_hora = substr($this->agejueini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->agejueini_hora = substr($this->agejueini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->agejueini_hora = substr($this->agejueini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->agejueini_hora = substr($this->agejueini_hora, 0, -4);
          }
          $this->agejueini = $this->agejueini_hora;
      } 
      if ($this->agejueini == "" && $use_null)  
      { 
          $this->agejueini = "null" ; 
      } 
      $this->field_config['agejueini']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['agejuefin']['date_format'];
      if ($this->agejuefin != "")  
      { 
          $this->agejuefin_hora = $this->agejuefin;
          $this->agejuefin = "1900-01-01";
          nm_conv_hora($this->agejuefin_hora, $this->field_config['agejuefin']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->agejuefin_hora = substr($this->agejuefin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->agejuefin_hora = substr($this->agejuefin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->agejuefin_hora = substr($this->agejuefin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->agejuefin_hora = substr($this->agejuefin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->agejuefin_hora = substr($this->agejuefin_hora, 0, -4);
          }
          $this->agejuefin = $this->agejuefin_hora;
      } 
      if ($this->agejuefin == "" && $use_null)  
      { 
          $this->agejuefin = "null" ; 
      } 
      $this->field_config['agejuefin']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['agevieini']['date_format'];
      if ($this->agevieini != "")  
      { 
          $this->agevieini_hora = $this->agevieini;
          $this->agevieini = "1900-01-01";
          nm_conv_hora($this->agevieini_hora, $this->field_config['agevieini']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->agevieini_hora = substr($this->agevieini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->agevieini_hora = substr($this->agevieini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->agevieini_hora = substr($this->agevieini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->agevieini_hora = substr($this->agevieini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->agevieini_hora = substr($this->agevieini_hora, 0, -4);
          }
          $this->agevieini = $this->agevieini_hora;
      } 
      if ($this->agevieini == "" && $use_null)  
      { 
          $this->agevieini = "null" ; 
      } 
      $this->field_config['agevieini']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['ageviefin']['date_format'];
      if ($this->ageviefin != "")  
      { 
          $this->ageviefin_hora = $this->ageviefin;
          $this->ageviefin = "1900-01-01";
          nm_conv_hora($this->ageviefin_hora, $this->field_config['ageviefin']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->ageviefin_hora = substr($this->ageviefin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->ageviefin_hora = substr($this->ageviefin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->ageviefin_hora = substr($this->ageviefin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->ageviefin_hora = substr($this->ageviefin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->ageviefin_hora = substr($this->ageviefin_hora, 0, -4);
          }
          $this->ageviefin = $this->ageviefin_hora;
      } 
      if ($this->ageviefin == "" && $use_null)  
      { 
          $this->ageviefin = "null" ; 
      } 
      $this->field_config['ageviefin']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['agesabini']['date_format'];
      if ($this->agesabini != "")  
      { 
          $this->agesabini_hora = $this->agesabini;
          $this->agesabini = "1900-01-01";
          nm_conv_hora($this->agesabini_hora, $this->field_config['agesabini']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->agesabini_hora = substr($this->agesabini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->agesabini_hora = substr($this->agesabini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->agesabini_hora = substr($this->agesabini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->agesabini_hora = substr($this->agesabini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->agesabini_hora = substr($this->agesabini_hora, 0, -4);
          }
          $this->agesabini = $this->agesabini_hora;
      } 
      if ($this->agesabini == "" && $use_null)  
      { 
          $this->agesabini = "null" ; 
      } 
      $this->field_config['agesabini']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['agesabfin']['date_format'];
      if ($this->agesabfin != "")  
      { 
          $this->agesabfin_hora = $this->agesabfin;
          $this->agesabfin = "1900-01-01";
          nm_conv_hora($this->agesabfin_hora, $this->field_config['agesabfin']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->agesabfin_hora = substr($this->agesabfin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->agesabfin_hora = substr($this->agesabfin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->agesabfin_hora = substr($this->agesabfin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->agesabfin_hora = substr($this->agesabfin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->agesabfin_hora = substr($this->agesabfin_hora, 0, -4);
          }
          $this->agesabfin = $this->agesabfin_hora;
      } 
      if ($this->agesabfin == "" && $use_null)  
      { 
          $this->agesabfin = "null" ; 
      } 
      $this->field_config['agesabfin']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['agedomini']['date_format'];
      if ($this->agedomini != "")  
      { 
          $this->agedomini_hora = $this->agedomini;
          $this->agedomini = "1900-01-01";
          nm_conv_hora($this->agedomini_hora, $this->field_config['agedomini']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->agedomini_hora = substr($this->agedomini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->agedomini_hora = substr($this->agedomini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->agedomini_hora = substr($this->agedomini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->agedomini_hora = substr($this->agedomini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->agedomini_hora = substr($this->agedomini_hora, 0, -4);
          }
          $this->agedomini = $this->agedomini_hora;
      } 
      if ($this->agedomini == "" && $use_null)  
      { 
          $this->agedomini = "null" ; 
      } 
      $this->field_config['agedomini']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['agedomfin']['date_format'];
      if ($this->agedomfin != "")  
      { 
          $this->agedomfin_hora = $this->agedomfin;
          $this->agedomfin = "1900-01-01";
          nm_conv_hora($this->agedomfin_hora, $this->field_config['agedomfin']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->agedomfin_hora = substr($this->agedomfin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->agedomfin_hora = substr($this->agedomfin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->agedomfin_hora = substr($this->agedomfin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->agedomfin_hora = substr($this->agedomfin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->agedomfin_hora = substr($this->agedomfin_hora, 0, -4);
          }
          $this->agedomfin = $this->agedomfin_hora;
      } 
      if ($this->agedomfin == "" && $use_null)  
      { 
          $this->agedomfin = "null" ; 
      } 
      $this->field_config['agedomfin']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_agenombre();
          $this->ajax_return_values_medcodigo();
          $this->ajax_return_values_ageintervalo();
          $this->ajax_return_values_ageactivo();
          $this->ajax_return_values_agecolor();
          $this->ajax_return_values_ageusucrea();
          $this->ajax_return_values_agefeccrea();
          $this->ajax_return_values_ageusumodi();
          $this->ajax_return_values_agefecmodi();
          $this->ajax_return_values_agelunactivo();
          $this->ajax_return_values_agemaractivo();
          $this->ajax_return_values_agemieactivo();
          $this->ajax_return_values_agejueactivo();
          $this->ajax_return_values_agevieactivo();
          $this->ajax_return_values_agesabactivo();
          $this->ajax_return_values_agedomactivo();
          $this->ajax_return_values_agelunini();
          $this->ajax_return_values_agelunfin();
          $this->ajax_return_values_agemarini();
          $this->ajax_return_values_agemarfin();
          $this->ajax_return_values_agemieini();
          $this->ajax_return_values_agemiefin();
          $this->ajax_return_values_agejueini();
          $this->ajax_return_values_agejuefin();
          $this->ajax_return_values_agevieini();
          $this->ajax_return_values_ageviefin();
          $this->ajax_return_values_agesabini();
          $this->ajax_return_values_agesabfin();
          $this->ajax_return_values_agedomini();
          $this->ajax_return_values_agedomfin();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['agesecuen']['keyVal'] = form_agenda_pack_protect_string($this->nmgp_dados_form['agesecuen']);
          }
   } // ajax_return_values

          //----- agenombre
   function ajax_return_values_agenombre($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agenombre", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agenombre);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['agenombre'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- medcodigo
   function ajax_return_values_medcodigo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("medcodigo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->medcodigo);
              $aLookup = array();
              $this->_tmp_lookup_medcodigo = $this->medcodigo;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_medcodigo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_medcodigo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_medcodigo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_medcodigo'] = array(); 
    }

   $old_value_ageintervalo = $this->ageintervalo;
   $old_value_agefeccrea = $this->agefeccrea;
   $old_value_agefeccrea_hora = $this->agefeccrea_hora;
   $old_value_agefecmodi = $this->agefecmodi;
   $old_value_agefecmodi_hora = $this->agefecmodi_hora;
   $old_value_agelunini = $this->agelunini;
   $old_value_agelunfin = $this->agelunfin;
   $old_value_agemarini = $this->agemarini;
   $old_value_agemarfin = $this->agemarfin;
   $old_value_agemieini = $this->agemieini;
   $old_value_agemiefin = $this->agemiefin;
   $old_value_agejueini = $this->agejueini;
   $old_value_agejuefin = $this->agejuefin;
   $old_value_agevieini = $this->agevieini;
   $old_value_ageviefin = $this->ageviefin;
   $old_value_agesabini = $this->agesabini;
   $old_value_agesabfin = $this->agesabfin;
   $old_value_agedomini = $this->agedomini;
   $old_value_agedomfin = $this->agedomfin;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_ageintervalo = $this->ageintervalo;
   $unformatted_value_agefeccrea = $this->agefeccrea;
   $unformatted_value_agefeccrea_hora = $this->agefeccrea_hora;
   $unformatted_value_agefecmodi = $this->agefecmodi;
   $unformatted_value_agefecmodi_hora = $this->agefecmodi_hora;
   $unformatted_value_agelunini = $this->agelunini;
   $unformatted_value_agelunfin = $this->agelunfin;
   $unformatted_value_agemarini = $this->agemarini;
   $unformatted_value_agemarfin = $this->agemarfin;
   $unformatted_value_agemieini = $this->agemieini;
   $unformatted_value_agemiefin = $this->agemiefin;
   $unformatted_value_agejueini = $this->agejueini;
   $unformatted_value_agejuefin = $this->agejuefin;
   $unformatted_value_agevieini = $this->agevieini;
   $unformatted_value_ageviefin = $this->ageviefin;
   $unformatted_value_agesabini = $this->agesabini;
   $unformatted_value_agesabfin = $this->agesabfin;
   $unformatted_value_agedomini = $this->agedomini;
   $unformatted_value_agedomfin = $this->agedomfin;

   $ageactivo_val_str = "";
   if (!empty($this->ageactivo))
   {
       if (is_array($this->ageactivo))
       {
           $Tmp_array = $this->ageactivo;
       }
       else
       {
           $Tmp_array = explode(";", $this->ageactivo);
       }
       $ageactivo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ageactivo_val_str)
          {
             $ageactivo_val_str .= ", ";
          }
          $ageactivo_val_str .= $Tmp_val_cmp;
       }
   }
   $agelunactivo_val_str = "";
   if (!empty($this->agelunactivo))
   {
       if (is_array($this->agelunactivo))
       {
           $Tmp_array = $this->agelunactivo;
       }
       else
       {
           $Tmp_array = explode(";", $this->agelunactivo);
       }
       $agelunactivo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $agelunactivo_val_str)
          {
             $agelunactivo_val_str .= ", ";
          }
          $agelunactivo_val_str .= $Tmp_val_cmp;
       }
   }
   $agemaractivo_val_str = "";
   if (!empty($this->agemaractivo))
   {
       if (is_array($this->agemaractivo))
       {
           $Tmp_array = $this->agemaractivo;
       }
       else
       {
           $Tmp_array = explode(";", $this->agemaractivo);
       }
       $agemaractivo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $agemaractivo_val_str)
          {
             $agemaractivo_val_str .= ", ";
          }
          $agemaractivo_val_str .= $Tmp_val_cmp;
       }
   }
   $agemieactivo_val_str = "";
   if (!empty($this->agemieactivo))
   {
       if (is_array($this->agemieactivo))
       {
           $Tmp_array = $this->agemieactivo;
       }
       else
       {
           $Tmp_array = explode(";", $this->agemieactivo);
       }
       $agemieactivo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $agemieactivo_val_str)
          {
             $agemieactivo_val_str .= ", ";
          }
          $agemieactivo_val_str .= $Tmp_val_cmp;
       }
   }
   $agejueactivo_val_str = "";
   if (!empty($this->agejueactivo))
   {
       if (is_array($this->agejueactivo))
       {
           $Tmp_array = $this->agejueactivo;
       }
       else
       {
           $Tmp_array = explode(";", $this->agejueactivo);
       }
       $agejueactivo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $agejueactivo_val_str)
          {
             $agejueactivo_val_str .= ", ";
          }
          $agejueactivo_val_str .= $Tmp_val_cmp;
       }
   }
   $agevieactivo_val_str = "";
   if (!empty($this->agevieactivo))
   {
       if (is_array($this->agevieactivo))
       {
           $Tmp_array = $this->agevieactivo;
       }
       else
       {
           $Tmp_array = explode(";", $this->agevieactivo);
       }
       $agevieactivo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $agevieactivo_val_str)
          {
             $agevieactivo_val_str .= ", ";
          }
          $agevieactivo_val_str .= $Tmp_val_cmp;
       }
   }
   $agesabactivo_val_str = "";
   if (!empty($this->agesabactivo))
   {
       if (is_array($this->agesabactivo))
       {
           $Tmp_array = $this->agesabactivo;
       }
       else
       {
           $Tmp_array = explode(";", $this->agesabactivo);
       }
       $agesabactivo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $agesabactivo_val_str)
          {
             $agesabactivo_val_str .= ", ";
          }
          $agesabactivo_val_str .= $Tmp_val_cmp;
       }
   }
   $agedomactivo_val_str = "";
   if (!empty($this->agedomactivo))
   {
       if (is_array($this->agedomactivo))
       {
           $Tmp_array = $this->agedomactivo;
       }
       else
       {
           $Tmp_array = explode(";", $this->agedomactivo);
       }
       $agedomactivo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $agedomactivo_val_str)
          {
             $agedomactivo_val_str .= ", ";
          }
          $agedomactivo_val_str .= $Tmp_val_cmp;
       }
   }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT medcodigo, medapellidos + ' ' + mednombres FROM medico WHERE medcodigo = " . substr($this->Db->qstr($this->medcodigo), 1, -1) . " ORDER BY medapellidos, mednombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT medcodigo, concat(medapellidos,' ',mednombres) FROM medico WHERE medcodigo = " . substr($this->Db->qstr($this->medcodigo), 1, -1) . " ORDER BY medapellidos, mednombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT medcodigo, medapellidos&' '&mednombres FROM medico WHERE medcodigo = " . substr($this->Db->qstr($this->medcodigo), 1, -1) . " ORDER BY medapellidos, mednombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT medcodigo, medapellidos||' '||mednombres FROM medico WHERE medcodigo = " . substr($this->Db->qstr($this->medcodigo), 1, -1) . " ORDER BY medapellidos, mednombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT medcodigo, medapellidos + ' ' + mednombres FROM medico WHERE medcodigo = " . substr($this->Db->qstr($this->medcodigo), 1, -1) . " ORDER BY medapellidos, mednombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT medcodigo, medapellidos||' '||mednombres FROM medico WHERE medcodigo = " . substr($this->Db->qstr($this->medcodigo), 1, -1) . " ORDER BY medapellidos, mednombres";
   }
   else
   {
       $nm_comando = "SELECT medcodigo, medapellidos||' '||mednombres FROM medico WHERE medcodigo = " . substr($this->Db->qstr($this->medcodigo), 1, -1) . " ORDER BY medapellidos, mednombres";
   }

   $this->ageintervalo = $old_value_ageintervalo;
   $this->agefeccrea = $old_value_agefeccrea;
   $this->agefeccrea_hora = $old_value_agefeccrea_hora;
   $this->agefecmodi = $old_value_agefecmodi;
   $this->agefecmodi_hora = $old_value_agefecmodi_hora;
   $this->agelunini = $old_value_agelunini;
   $this->agelunfin = $old_value_agelunfin;
   $this->agemarini = $old_value_agemarini;
   $this->agemarfin = $old_value_agemarfin;
   $this->agemieini = $old_value_agemieini;
   $this->agemiefin = $old_value_agemiefin;
   $this->agejueini = $old_value_agejueini;
   $this->agejuefin = $old_value_agejuefin;
   $this->agevieini = $old_value_agevieini;
   $this->ageviefin = $old_value_ageviefin;
   $this->agesabini = $old_value_agesabini;
   $this->agesabfin = $old_value_agesabfin;
   $this->agedomini = $old_value_agedomini;
   $this->agedomfin = $old_value_agedomfin;

   if ('' != $this->medcodigo && '' != $this->medcodigo && '' != $this->medcodigo && '' != $this->medcodigo && '' != $this->medcodigo && '' != $this->medcodigo && '' != $this->medcodigo)
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_agenda_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_agenda_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_medcodigo'][] = $rs->fields[0];
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
          $this->NM_ajax_info['fldList']['medcodigo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['medcodigo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['medcodigo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['medcodigo']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][form_agenda_pack_protect_string(NM_charset_to_utf8($this->medcodigo))]) ? $aLookup[0][form_agenda_pack_protect_string(NM_charset_to_utf8($this->medcodigo))] : "";
          $this->NM_ajax_info['fldList']['medcodigo_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }
   }

          //----- ageintervalo
   function ajax_return_values_ageintervalo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ageintervalo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ageintervalo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ageintervalo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- ageactivo
   function ajax_return_values_ageactivo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ageactivo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ageactivo);
              $aLookup = array();
              $this->_tmp_lookup_ageactivo = $this->ageactivo;

$aLookup[] = array(form_agenda_pack_protect_string('1') => str_replace('<', '&lt;',form_agenda_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_ageactivo'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['ageactivo']) && !empty($this->NM_ajax_info['select_html']['ageactivo']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['ageactivo'];
          }
          $this->NM_ajax_info['fldList']['ageactivo'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-ageactivo',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ageactivo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ageactivo']['valList'][$i] = form_agenda_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ageactivo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ageactivo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ageactivo']['labList'] = $aLabel;
          }
   }

          //----- agecolor
   function ajax_return_values_agecolor($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agecolor", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agecolor);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['agecolor'] = array(
                       'row'    => '',
               'type'    => 'color_palette',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- ageusucrea
   function ajax_return_values_ageusucrea($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ageusucrea", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ageusucrea);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ageusucrea'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- agefeccrea
   function ajax_return_values_agefeccrea($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agefeccrea", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agefeccrea);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['agefeccrea'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->agefeccrea . ' ' . $this->agefeccrea_hora),
              );
          }
   }

          //----- ageusumodi
   function ajax_return_values_ageusumodi($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ageusumodi", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ageusumodi);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ageusumodi'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- agefecmodi
   function ajax_return_values_agefecmodi($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agefecmodi", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agefecmodi);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['agefecmodi'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->agefecmodi . ' ' . $this->agefecmodi_hora),
              );
          }
   }

          //----- agelunactivo
   function ajax_return_values_agelunactivo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agelunactivo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agelunactivo);
              $aLookup = array();
              $this->_tmp_lookup_agelunactivo = $this->agelunactivo;

$aLookup[] = array(form_agenda_pack_protect_string('1') => str_replace('<', '&lt;',form_agenda_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_agelunactivo'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['agelunactivo']) && !empty($this->NM_ajax_info['select_html']['agelunactivo']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['agelunactivo'];
          }
          $this->NM_ajax_info['fldList']['agelunactivo'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-agelunactivo',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['agelunactivo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['agelunactivo']['valList'][$i] = form_agenda_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['agelunactivo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['agelunactivo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['agelunactivo']['labList'] = $aLabel;
          }
   }

          //----- agemaractivo
   function ajax_return_values_agemaractivo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agemaractivo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agemaractivo);
              $aLookup = array();
              $this->_tmp_lookup_agemaractivo = $this->agemaractivo;

$aLookup[] = array(form_agenda_pack_protect_string('1') => str_replace('<', '&lt;',form_agenda_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_agemaractivo'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['agemaractivo']) && !empty($this->NM_ajax_info['select_html']['agemaractivo']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['agemaractivo'];
          }
          $this->NM_ajax_info['fldList']['agemaractivo'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-agemaractivo',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['agemaractivo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['agemaractivo']['valList'][$i] = form_agenda_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['agemaractivo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['agemaractivo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['agemaractivo']['labList'] = $aLabel;
          }
   }

          //----- agemieactivo
   function ajax_return_values_agemieactivo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agemieactivo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agemieactivo);
              $aLookup = array();
              $this->_tmp_lookup_agemieactivo = $this->agemieactivo;

$aLookup[] = array(form_agenda_pack_protect_string('1') => str_replace('<', '&lt;',form_agenda_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_agemieactivo'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['agemieactivo']) && !empty($this->NM_ajax_info['select_html']['agemieactivo']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['agemieactivo'];
          }
          $this->NM_ajax_info['fldList']['agemieactivo'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-agemieactivo',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['agemieactivo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['agemieactivo']['valList'][$i] = form_agenda_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['agemieactivo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['agemieactivo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['agemieactivo']['labList'] = $aLabel;
          }
   }

          //----- agejueactivo
   function ajax_return_values_agejueactivo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agejueactivo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agejueactivo);
              $aLookup = array();
              $this->_tmp_lookup_agejueactivo = $this->agejueactivo;

$aLookup[] = array(form_agenda_pack_protect_string('1') => str_replace('<', '&lt;',form_agenda_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_agejueactivo'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['agejueactivo']) && !empty($this->NM_ajax_info['select_html']['agejueactivo']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['agejueactivo'];
          }
          $this->NM_ajax_info['fldList']['agejueactivo'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-agejueactivo',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['agejueactivo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['agejueactivo']['valList'][$i] = form_agenda_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['agejueactivo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['agejueactivo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['agejueactivo']['labList'] = $aLabel;
          }
   }

          //----- agevieactivo
   function ajax_return_values_agevieactivo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agevieactivo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agevieactivo);
              $aLookup = array();
              $this->_tmp_lookup_agevieactivo = $this->agevieactivo;

$aLookup[] = array(form_agenda_pack_protect_string('1') => str_replace('<', '&lt;',form_agenda_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_agevieactivo'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['agevieactivo']) && !empty($this->NM_ajax_info['select_html']['agevieactivo']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['agevieactivo'];
          }
          $this->NM_ajax_info['fldList']['agevieactivo'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-agevieactivo',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['agevieactivo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['agevieactivo']['valList'][$i] = form_agenda_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['agevieactivo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['agevieactivo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['agevieactivo']['labList'] = $aLabel;
          }
   }

          //----- agesabactivo
   function ajax_return_values_agesabactivo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agesabactivo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agesabactivo);
              $aLookup = array();
              $this->_tmp_lookup_agesabactivo = $this->agesabactivo;

$aLookup[] = array(form_agenda_pack_protect_string('1') => str_replace('<', '&lt;',form_agenda_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_agesabactivo'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['agesabactivo']) && !empty($this->NM_ajax_info['select_html']['agesabactivo']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['agesabactivo'];
          }
          $this->NM_ajax_info['fldList']['agesabactivo'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-agesabactivo',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['agesabactivo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['agesabactivo']['valList'][$i] = form_agenda_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['agesabactivo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['agesabactivo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['agesabactivo']['labList'] = $aLabel;
          }
   }

          //----- agedomactivo
   function ajax_return_values_agedomactivo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agedomactivo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agedomactivo);
              $aLookup = array();
              $this->_tmp_lookup_agedomactivo = $this->agedomactivo;

$aLookup[] = array(form_agenda_pack_protect_string('1') => str_replace('<', '&lt;',form_agenda_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_agedomactivo'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['agedomactivo']) && !empty($this->NM_ajax_info['select_html']['agedomactivo']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['agedomactivo'];
          }
          $this->NM_ajax_info['fldList']['agedomactivo'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-agedomactivo',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['agedomactivo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['agedomactivo']['valList'][$i] = form_agenda_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['agedomactivo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['agedomactivo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['agedomactivo']['labList'] = $aLabel;
          }
   }

          //----- agelunini
   function ajax_return_values_agelunini($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agelunini", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agelunini);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['agelunini'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- agelunfin
   function ajax_return_values_agelunfin($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agelunfin", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agelunfin);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['agelunfin'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- agemarini
   function ajax_return_values_agemarini($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agemarini", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agemarini);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['agemarini'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- agemarfin
   function ajax_return_values_agemarfin($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agemarfin", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agemarfin);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['agemarfin'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- agemieini
   function ajax_return_values_agemieini($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agemieini", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agemieini);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['agemieini'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- agemiefin
   function ajax_return_values_agemiefin($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agemiefin", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agemiefin);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['agemiefin'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- agejueini
   function ajax_return_values_agejueini($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agejueini", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agejueini);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['agejueini'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- agejuefin
   function ajax_return_values_agejuefin($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agejuefin", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agejuefin);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['agejuefin'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- agevieini
   function ajax_return_values_agevieini($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agevieini", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agevieini);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['agevieini'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- ageviefin
   function ajax_return_values_ageviefin($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ageviefin", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ageviefin);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ageviefin'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- agesabini
   function ajax_return_values_agesabini($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agesabini", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agesabini);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['agesabini'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- agesabfin
   function ajax_return_values_agesabfin($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agesabfin", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agesabfin);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['agesabfin'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- agedomini
   function ajax_return_values_agedomini($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agedomini", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agedomini);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['agedomini'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- agedomfin
   function ajax_return_values_agedomfin($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agedomfin", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agedomfin);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['agedomfin'] = array(
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['upload_dir'][$fieldName][] = $newName;
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
      if ($this->sc_evento == "novo" || $this->sc_evento == "incluir" || ($this->nmgp_opcao == "nada" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['opc_ant']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['opc_ant'] == "novo") || (isset($GLOBALS['erro_incl']) && 1 == $GLOBALS['erro_incl']))
      {
          if (!isset($this->nmgp_cmp_hidden["ageactivo"]))
          {
              $this->nmgp_cmp_hidden["ageactivo"] = "off"; $this->NM_ajax_info['fieldDisplay']['ageactivo'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["ageusucrea"]))
          {
              $this->nmgp_cmp_hidden["ageusucrea"] = "off"; $this->NM_ajax_info['fieldDisplay']['ageusucrea'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["ageusumodi"]))
          {
              $this->nmgp_cmp_hidden["ageusumodi"] = "off"; $this->NM_ajax_info['fieldDisplay']['ageusumodi'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["agefeccrea"]))
          {
              $this->nmgp_cmp_hidden["agefeccrea"] = "off"; $this->NM_ajax_info['fieldDisplay']['agefeccrea'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["agefecmodi"]))
          {
              $this->nmgp_cmp_hidden["agefecmodi"] = "off"; $this->NM_ajax_info['fieldDisplay']['agefecmodi'] = 'off';
          }
      }
      else
      {
      }
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_agenda']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_agedomactivo = $this->agedomactivo;
    $original_agejueactivo = $this->agejueactivo;
    $original_agelunactivo = $this->agelunactivo;
    $original_agemaractivo = $this->agemaractivo;
    $original_agemieactivo = $this->agemieactivo;
    $original_agesabactivo = $this->agesabactivo;
    $original_agevieactivo = $this->agevieactivo;
}
  if($this->agelunactivo ==1) {
	$this->Ini->nm_hidden_blocos[3] = "on"; $this->NM_ajax_info['blockDisplay']['3'] = 'on';
}
else {
	$this->Ini->nm_hidden_blocos[3] = "off"; $this->NM_ajax_info['blockDisplay']['3'] = 'off';
}

if($this->agemaractivo ==1) {
	$this->Ini->nm_hidden_blocos[4] = "on"; $this->NM_ajax_info['blockDisplay']['4'] = 'on';
}
else {
	$this->Ini->nm_hidden_blocos[4] = "off"; $this->NM_ajax_info['blockDisplay']['4'] = 'off';
}

if($this->agemieactivo ==1) {
	$this->Ini->nm_hidden_blocos[5] = "on"; $this->NM_ajax_info['blockDisplay']['5'] = 'on';
}
else {
	$this->Ini->nm_hidden_blocos[5] = "off"; $this->NM_ajax_info['blockDisplay']['5'] = 'off';
}

if($this->agejueactivo ==1) {
	$this->Ini->nm_hidden_blocos[6] = "on"; $this->NM_ajax_info['blockDisplay']['6'] = 'on';
}
else {
	$this->Ini->nm_hidden_blocos[6] = "off"; $this->NM_ajax_info['blockDisplay']['6'] = 'off';
}

if($this->agevieactivo ==1) {
	$this->Ini->nm_hidden_blocos[7] = "on"; $this->NM_ajax_info['blockDisplay']['7'] = 'on';
}
else {
	$this->Ini->nm_hidden_blocos[7] = "off"; $this->NM_ajax_info['blockDisplay']['7'] = 'off';
}

if($this->agesabactivo ==1) {
	$this->Ini->nm_hidden_blocos[8] = "on"; $this->NM_ajax_info['blockDisplay']['8'] = 'on';
}
else {
	$this->Ini->nm_hidden_blocos[8] = "off"; $this->NM_ajax_info['blockDisplay']['8'] = 'off';
}

if($this->agedomactivo ==1) {
	;
}
else {
	$this->Ini->nm_hidden_blocos[9] = "off"; $this->NM_ajax_info['blockDisplay']['9'] = 'off';
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_agedomactivo != $this->agedomactivo || (isset($bFlagRead_agedomactivo) && $bFlagRead_agedomactivo)))
    {
        $this->ajax_return_values_agedomactivo(true);
    }
    if (($original_agejueactivo != $this->agejueactivo || (isset($bFlagRead_agejueactivo) && $bFlagRead_agejueactivo)))
    {
        $this->ajax_return_values_agejueactivo(true);
    }
    if (($original_agelunactivo != $this->agelunactivo || (isset($bFlagRead_agelunactivo) && $bFlagRead_agelunactivo)))
    {
        $this->ajax_return_values_agelunactivo(true);
    }
    if (($original_agemaractivo != $this->agemaractivo || (isset($bFlagRead_agemaractivo) && $bFlagRead_agemaractivo)))
    {
        $this->ajax_return_values_agemaractivo(true);
    }
    if (($original_agemieactivo != $this->agemieactivo || (isset($bFlagRead_agemieactivo) && $bFlagRead_agemieactivo)))
    {
        $this->ajax_return_values_agemieactivo(true);
    }
    if (($original_agesabactivo != $this->agesabactivo || (isset($bFlagRead_agesabactivo) && $bFlagRead_agesabactivo)))
    {
        $this->ajax_return_values_agesabactivo(true);
    }
    if (($original_agevieactivo != $this->agevieactivo || (isset($bFlagRead_agevieactivo) && $bFlagRead_agevieactivo)))
    {
        $this->ajax_return_values_agevieactivo(true);
    }
}
$_SESSION['scriptcase']['form_agenda']['contr_erro'] = 'off'; 
      }
      if (empty($this->agefeccrea))
      {
          $this->agefeccrea_hora = $this->agefeccrea;
      }
      if (empty($this->agefecmodi))
      {
          $this->agefecmodi_hora = $this->agefecmodi;
      }
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
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
      if (!isset($this->ageusumodi)){$this->ageusumodi =  $_SESSION['usr_login'];}  
      if ('incluir' == $this->nmgp_opcao && empty($this->ageactivo)) {$this->ageactivo = "1"; $NM_val_null[] = "ageactivo";}  
      if ('incluir' == $this->nmgp_opcao && empty($this->ageusucrea)) {$this->ageusucrea = "" . $_SESSION['usr_login'] . ""; $NM_val_null[] = "ageusucrea";}  
      if (('alterar' == $this->nmgp_opcao || 'igual' == $this->nmgp_opcao) && empty($this->ageusumodi)){$this->ageusumodi = "" . $_SESSION['usr_login'] . ""; $NM_val_null[] = "ageusumodi";}  
      $NM_val_form['agenombre'] = $this->agenombre;
      $NM_val_form['medcodigo'] = $this->medcodigo;
      $NM_val_form['ageintervalo'] = $this->ageintervalo;
      $NM_val_form['ageactivo'] = $this->ageactivo;
      $NM_val_form['agecolor'] = $this->agecolor;
      $NM_val_form['ageusucrea'] = $this->ageusucrea;
      $NM_val_form['agefeccrea'] = $this->agefeccrea;
      $NM_val_form['ageusumodi'] = $this->ageusumodi;
      $NM_val_form['agefecmodi'] = $this->agefecmodi;
      $NM_val_form['agelunactivo'] = $this->agelunactivo;
      $NM_val_form['agemaractivo'] = $this->agemaractivo;
      $NM_val_form['agemieactivo'] = $this->agemieactivo;
      $NM_val_form['agejueactivo'] = $this->agejueactivo;
      $NM_val_form['agevieactivo'] = $this->agevieactivo;
      $NM_val_form['agesabactivo'] = $this->agesabactivo;
      $NM_val_form['agedomactivo'] = $this->agedomactivo;
      $NM_val_form['agelunini'] = $this->agelunini;
      $NM_val_form['agelunfin'] = $this->agelunfin;
      $NM_val_form['agemarini'] = $this->agemarini;
      $NM_val_form['agemarfin'] = $this->agemarfin;
      $NM_val_form['agemieini'] = $this->agemieini;
      $NM_val_form['agemiefin'] = $this->agemiefin;
      $NM_val_form['agejueini'] = $this->agejueini;
      $NM_val_form['agejuefin'] = $this->agejuefin;
      $NM_val_form['agevieini'] = $this->agevieini;
      $NM_val_form['ageviefin'] = $this->ageviefin;
      $NM_val_form['agesabini'] = $this->agesabini;
      $NM_val_form['agesabfin'] = $this->agesabfin;
      $NM_val_form['agedomini'] = $this->agedomini;
      $NM_val_form['agedomfin'] = $this->agedomfin;
      $NM_val_form['agesecuen'] = $this->agesecuen;
      if ($this->agesecuen === "" || is_null($this->agesecuen))  
      { 
          $this->agesecuen = 0;
      } 
      if ($this->medcodigo === "" || is_null($this->medcodigo))  
      { 
          $this->medcodigo = 0;
          $this->sc_force_zero[] = 'medcodigo';
      } 
      if ($this->ageactivo === "" || is_null($this->ageactivo))  
      { 
          $this->ageactivo = 0;
          $this->sc_force_zero[] = 'ageactivo';
      } 
      if ($this->ageintervalo === "" || is_null($this->ageintervalo))  
      { 
          $this->ageintervalo = 0;
          $this->sc_force_zero[] = 'ageintervalo';
      } 
      if ($this->agelunactivo === "" || is_null($this->agelunactivo))  
      { 
          $this->agelunactivo = 0;
          $this->sc_force_zero[] = 'agelunactivo';
      } 
      if ($this->agemaractivo === "" || is_null($this->agemaractivo))  
      { 
          $this->agemaractivo = 0;
          $this->sc_force_zero[] = 'agemaractivo';
      } 
      if ($this->agemieactivo === "" || is_null($this->agemieactivo))  
      { 
          $this->agemieactivo = 0;
          $this->sc_force_zero[] = 'agemieactivo';
      } 
      if ($this->agejueactivo === "" || is_null($this->agejueactivo))  
      { 
          $this->agejueactivo = 0;
          $this->sc_force_zero[] = 'agejueactivo';
      } 
      if ($this->agevieactivo === "" || is_null($this->agevieactivo))  
      { 
          $this->agevieactivo = 0;
          $this->sc_force_zero[] = 'agevieactivo';
      } 
      if ($this->agesabactivo === "" || is_null($this->agesabactivo))  
      { 
          $this->agesabactivo = 0;
          $this->sc_force_zero[] = 'agesabactivo';
      } 
      if ($this->agedomactivo === "" || is_null($this->agedomactivo))  
      { 
          $this->agedomactivo = 0;
          $this->sc_force_zero[] = 'agedomactivo';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->agenombre_before_qstr = $this->agenombre;
          $this->agenombre = substr($this->Db->qstr($this->agenombre), 1, -1); 
          if ($this->agenombre == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->agenombre = "null"; 
              $NM_val_null[] = "agenombre";
          } 
          if ($this->agelunini == "")  
          { 
              $this->agelunini = "null"; 
              $NM_val_null[] = "agelunini";
          } 
          if ($this->agelunfin == "")  
          { 
              $this->agelunfin = "null"; 
              $NM_val_null[] = "agelunfin";
          } 
          if ($this->agemarini == "")  
          { 
              $this->agemarini = "null"; 
              $NM_val_null[] = "agemarini";
          } 
          if ($this->agemarfin == "")  
          { 
              $this->agemarfin = "null"; 
              $NM_val_null[] = "agemarfin";
          } 
          if ($this->agemieini == "")  
          { 
              $this->agemieini = "null"; 
              $NM_val_null[] = "agemieini";
          } 
          if ($this->agemiefin == "")  
          { 
              $this->agemiefin = "null"; 
              $NM_val_null[] = "agemiefin";
          } 
          if ($this->agejueini == "")  
          { 
              $this->agejueini = "null"; 
              $NM_val_null[] = "agejueini";
          } 
          if ($this->agejuefin == "")  
          { 
              $this->agejuefin = "null"; 
              $NM_val_null[] = "agejuefin";
          } 
          if ($this->agevieini == "")  
          { 
              $this->agevieini = "null"; 
              $NM_val_null[] = "agevieini";
          } 
          if ($this->ageviefin == "")  
          { 
              $this->ageviefin = "null"; 
              $NM_val_null[] = "ageviefin";
          } 
          if ($this->agesabini == "")  
          { 
              $this->agesabini = "null"; 
              $NM_val_null[] = "agesabini";
          } 
          if ($this->agesabfin == "")  
          { 
              $this->agesabfin = "null"; 
              $NM_val_null[] = "agesabfin";
          } 
          if ($this->agedomini == "")  
          { 
              $this->agedomini = "null"; 
              $NM_val_null[] = "agedomini";
          } 
          if ($this->agedomfin == "")  
          { 
              $this->agedomfin = "null"; 
              $NM_val_null[] = "agedomfin";
          } 
          $this->agecolor_before_qstr = $this->agecolor;
          $this->agecolor = substr($this->Db->qstr($this->agecolor), 1, -1); 
          if ($this->agecolor == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->agecolor = "null"; 
              $NM_val_null[] = "agecolor";
          } 
          $this->ageusucrea_before_qstr = $this->ageusucrea;
          $this->ageusucrea = substr($this->Db->qstr($this->ageusucrea), 1, -1); 
          if ($this->ageusucrea == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ageusucrea = "null"; 
              $NM_val_null[] = "ageusucrea";
          } 
          $this->ageusumodi_before_qstr = $this->ageusumodi;
          $this->ageusumodi = substr($this->Db->qstr($this->ageusumodi), 1, -1); 
          if ($this->ageusumodi == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ageusumodi = "null"; 
              $NM_val_null[] = "ageusumodi";
          } 
          if ($this->agefeccrea == "")  
          { 
              $this->agefeccrea = "null"; 
              $NM_val_null[] = "agefeccrea";
          } 
          if ($this->agefecmodi == "")  
          { 
              $this->agefecmodi = "null"; 
              $NM_val_null[] = "agefecmodi";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_agenda_pack_ajax_response();
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
              $Cmd_Unique = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where (agenombre = '" . $this->agenombre . "' AND medcodigo = " . $this->medcodigo . ") AND (agesecuen <> $this->agesecuen)";
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
                          form_agenda_pack_ajax_response();
                      }
                      exit;
                  }
              }
              elseif (0 < $rsUni->fields[0])
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_ukey'] . " NOMBRE, MÉDICO"); 
                  $this->nmgp_opcao = "nada"; 
                  $aUpdateOk[] = 'agenombre+medcodigo';
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
              $this->agefecmodi =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->agefecmodi_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $NM_val_form['agefecmodi'] = $this->agefecmodi;
              $this->NM_ajax_changed['agefecmodi'] = true;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "agenombre = '$this->agenombre', medcodigo = $this->medcodigo, ageactivo = $this->ageactivo, ageintervalo = $this->ageintervalo, agelunactivo = $this->agelunactivo, agemaractivo = $this->agemaractivo, agemieactivo = $this->agemieactivo, agejueactivo = $this->agejueactivo, agevieactivo = $this->agevieactivo, agesabactivo = $this->agesabactivo, agedomactivo = $this->agedomactivo, agelunini = #$this->agelunini#, agelunfin = #$this->agelunfin#, agemarini = #$this->agemarini#, agemarfin = #$this->agemarfin#, agemieini = #$this->agemieini#, agemiefin = #$this->agemiefin#, agejueini = #$this->agejueini#, agejuefin = #$this->agejuefin#, agevieini = #$this->agevieini#, ageviefin = #$this->ageviefin#, agesabini = #$this->agesabini#, agesabfin = #$this->agesabfin#, agedomini = #$this->agedomini#, agedomfin = #$this->agedomfin#, agecolor = '$this->agecolor'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "agenombre = '$this->agenombre', medcodigo = $this->medcodigo, ageactivo = $this->ageactivo, ageintervalo = $this->ageintervalo, agelunactivo = $this->agelunactivo, agemaractivo = $this->agemaractivo, agemieactivo = $this->agemieactivo, agejueactivo = $this->agejueactivo, agevieactivo = $this->agevieactivo, agesabactivo = $this->agesabactivo, agedomactivo = $this->agedomactivo, agelunini = " . $this->Ini->date_delim . $this->agelunini . $this->Ini->date_delim1 . ", agelunfin = " . $this->Ini->date_delim . $this->agelunfin . $this->Ini->date_delim1 . ", agemarini = " . $this->Ini->date_delim . $this->agemarini . $this->Ini->date_delim1 . ", agemarfin = " . $this->Ini->date_delim . $this->agemarfin . $this->Ini->date_delim1 . ", agemieini = " . $this->Ini->date_delim . $this->agemieini . $this->Ini->date_delim1 . ", agemiefin = " . $this->Ini->date_delim . $this->agemiefin . $this->Ini->date_delim1 . ", agejueini = " . $this->Ini->date_delim . $this->agejueini . $this->Ini->date_delim1 . ", agejuefin = " . $this->Ini->date_delim . $this->agejuefin . $this->Ini->date_delim1 . ", agevieini = " . $this->Ini->date_delim . $this->agevieini . $this->Ini->date_delim1 . ", ageviefin = " . $this->Ini->date_delim . $this->ageviefin . $this->Ini->date_delim1 . ", agesabini = " . $this->Ini->date_delim . $this->agesabini . $this->Ini->date_delim1 . ", agesabfin = " . $this->Ini->date_delim . $this->agesabfin . $this->Ini->date_delim1 . ", agedomini = " . $this->Ini->date_delim . $this->agedomini . $this->Ini->date_delim1 . ", agedomfin = " . $this->Ini->date_delim . $this->agedomfin . $this->Ini->date_delim1 . ", agecolor = '$this->agecolor'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "agenombre = '$this->agenombre', medcodigo = $this->medcodigo, ageactivo = $this->ageactivo, ageintervalo = $this->ageintervalo, agelunactivo = $this->agelunactivo, agemaractivo = $this->agemaractivo, agemieactivo = $this->agemieactivo, agejueactivo = $this->agejueactivo, agevieactivo = $this->agevieactivo, agesabactivo = $this->agesabactivo, agedomactivo = $this->agedomactivo, agelunini = " . $this->Ini->date_delim . $this->agelunini . $this->Ini->date_delim1 . ", agelunfin = " . $this->Ini->date_delim . $this->agelunfin . $this->Ini->date_delim1 . ", agemarini = " . $this->Ini->date_delim . $this->agemarini . $this->Ini->date_delim1 . ", agemarfin = " . $this->Ini->date_delim . $this->agemarfin . $this->Ini->date_delim1 . ", agemieini = " . $this->Ini->date_delim . $this->agemieini . $this->Ini->date_delim1 . ", agemiefin = " . $this->Ini->date_delim . $this->agemiefin . $this->Ini->date_delim1 . ", agejueini = " . $this->Ini->date_delim . $this->agejueini . $this->Ini->date_delim1 . ", agejuefin = " . $this->Ini->date_delim . $this->agejuefin . $this->Ini->date_delim1 . ", agevieini = " . $this->Ini->date_delim . $this->agevieini . $this->Ini->date_delim1 . ", ageviefin = " . $this->Ini->date_delim . $this->ageviefin . $this->Ini->date_delim1 . ", agesabini = " . $this->Ini->date_delim . $this->agesabini . $this->Ini->date_delim1 . ", agesabfin = " . $this->Ini->date_delim . $this->agesabfin . $this->Ini->date_delim1 . ", agedomini = " . $this->Ini->date_delim . $this->agedomini . $this->Ini->date_delim1 . ", agedomfin = " . $this->Ini->date_delim . $this->agedomfin . $this->Ini->date_delim1 . ", agecolor = '$this->agecolor'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "agenombre = '$this->agenombre', medcodigo = $this->medcodigo, ageactivo = $this->ageactivo, ageintervalo = $this->ageintervalo, agelunactivo = $this->agelunactivo, agemaractivo = $this->agemaractivo, agemieactivo = $this->agemieactivo, agejueactivo = $this->agejueactivo, agevieactivo = $this->agevieactivo, agesabactivo = $this->agesabactivo, agedomactivo = $this->agedomactivo, agelunini = " . $this->Ini->date_delim . $this->agelunini . $this->Ini->date_delim1 . ", agelunfin = " . $this->Ini->date_delim . $this->agelunfin . $this->Ini->date_delim1 . ", agemarini = " . $this->Ini->date_delim . $this->agemarini . $this->Ini->date_delim1 . ", agemarfin = " . $this->Ini->date_delim . $this->agemarfin . $this->Ini->date_delim1 . ", agemieini = " . $this->Ini->date_delim . $this->agemieini . $this->Ini->date_delim1 . ", agemiefin = " . $this->Ini->date_delim . $this->agemiefin . $this->Ini->date_delim1 . ", agejueini = " . $this->Ini->date_delim . $this->agejueini . $this->Ini->date_delim1 . ", agejuefin = " . $this->Ini->date_delim . $this->agejuefin . $this->Ini->date_delim1 . ", agevieini = " . $this->Ini->date_delim . $this->agevieini . $this->Ini->date_delim1 . ", ageviefin = " . $this->Ini->date_delim . $this->ageviefin . $this->Ini->date_delim1 . ", agesabini = " . $this->Ini->date_delim . $this->agesabini . $this->Ini->date_delim1 . ", agesabfin = " . $this->Ini->date_delim . $this->agesabfin . $this->Ini->date_delim1 . ", agedomini = " . $this->Ini->date_delim . $this->agedomini . $this->Ini->date_delim1 . ", agedomfin = " . $this->Ini->date_delim . $this->agedomfin . $this->Ini->date_delim1 . ", agecolor = '$this->agecolor'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "agenombre = '$this->agenombre', medcodigo = $this->medcodigo, ageactivo = $this->ageactivo, ageintervalo = $this->ageintervalo, agelunactivo = $this->agelunactivo, agemaractivo = $this->agemaractivo, agemieactivo = $this->agemieactivo, agejueactivo = $this->agejueactivo, agevieactivo = $this->agevieactivo, agesabactivo = $this->agesabactivo, agedomactivo = $this->agedomactivo, agelunini = " . $this->Ini->date_delim . $this->agelunini . $this->Ini->date_delim1 . ", agelunfin = " . $this->Ini->date_delim . $this->agelunfin . $this->Ini->date_delim1 . ", agemarini = " . $this->Ini->date_delim . $this->agemarini . $this->Ini->date_delim1 . ", agemarfin = " . $this->Ini->date_delim . $this->agemarfin . $this->Ini->date_delim1 . ", agemieini = " . $this->Ini->date_delim . $this->agemieini . $this->Ini->date_delim1 . ", agemiefin = " . $this->Ini->date_delim . $this->agemiefin . $this->Ini->date_delim1 . ", agejueini = " . $this->Ini->date_delim . $this->agejueini . $this->Ini->date_delim1 . ", agejuefin = " . $this->Ini->date_delim . $this->agejuefin . $this->Ini->date_delim1 . ", agevieini = " . $this->Ini->date_delim . $this->agevieini . $this->Ini->date_delim1 . ", ageviefin = " . $this->Ini->date_delim . $this->ageviefin . $this->Ini->date_delim1 . ", agesabini = " . $this->Ini->date_delim . $this->agesabini . $this->Ini->date_delim1 . ", agesabfin = " . $this->Ini->date_delim . $this->agesabfin . $this->Ini->date_delim1 . ", agedomini = " . $this->Ini->date_delim . $this->agedomini . $this->Ini->date_delim1 . ", agedomfin = " . $this->Ini->date_delim . $this->agedomfin . $this->Ini->date_delim1 . ", agecolor = '$this->agecolor'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "agenombre = '$this->agenombre', medcodigo = $this->medcodigo, ageactivo = $this->ageactivo, ageintervalo = $this->ageintervalo, agelunactivo = $this->agelunactivo, agemaractivo = $this->agemaractivo, agemieactivo = $this->agemieactivo, agejueactivo = $this->agejueactivo, agevieactivo = $this->agevieactivo, agesabactivo = $this->agesabactivo, agedomactivo = $this->agedomactivo, agelunini = " . $this->Ini->date_delim . $this->agelunini . $this->Ini->date_delim1 . ", agelunfin = " . $this->Ini->date_delim . $this->agelunfin . $this->Ini->date_delim1 . ", agemarini = " . $this->Ini->date_delim . $this->agemarini . $this->Ini->date_delim1 . ", agemarfin = " . $this->Ini->date_delim . $this->agemarfin . $this->Ini->date_delim1 . ", agemieini = " . $this->Ini->date_delim . $this->agemieini . $this->Ini->date_delim1 . ", agemiefin = " . $this->Ini->date_delim . $this->agemiefin . $this->Ini->date_delim1 . ", agejueini = " . $this->Ini->date_delim . $this->agejueini . $this->Ini->date_delim1 . ", agejuefin = " . $this->Ini->date_delim . $this->agejuefin . $this->Ini->date_delim1 . ", agevieini = " . $this->Ini->date_delim . $this->agevieini . $this->Ini->date_delim1 . ", ageviefin = " . $this->Ini->date_delim . $this->ageviefin . $this->Ini->date_delim1 . ", agesabini = " . $this->Ini->date_delim . $this->agesabini . $this->Ini->date_delim1 . ", agesabfin = " . $this->Ini->date_delim . $this->agesabfin . $this->Ini->date_delim1 . ", agedomini = " . $this->Ini->date_delim . $this->agedomini . $this->Ini->date_delim1 . ", agedomfin = " . $this->Ini->date_delim . $this->agedomfin . $this->Ini->date_delim1 . ", agecolor = '$this->agecolor'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "agenombre = '$this->agenombre', medcodigo = $this->medcodigo, ageactivo = $this->ageactivo, ageintervalo = $this->ageintervalo, agelunactivo = $this->agelunactivo, agemaractivo = $this->agemaractivo, agemieactivo = $this->agemieactivo, agejueactivo = $this->agejueactivo, agevieactivo = $this->agevieactivo, agesabactivo = $this->agesabactivo, agedomactivo = $this->agedomactivo, agelunini = " . $this->Ini->date_delim . $this->agelunini . $this->Ini->date_delim1 . ", agelunfin = " . $this->Ini->date_delim . $this->agelunfin . $this->Ini->date_delim1 . ", agemarini = " . $this->Ini->date_delim . $this->agemarini . $this->Ini->date_delim1 . ", agemarfin = " . $this->Ini->date_delim . $this->agemarfin . $this->Ini->date_delim1 . ", agemieini = " . $this->Ini->date_delim . $this->agemieini . $this->Ini->date_delim1 . ", agemiefin = " . $this->Ini->date_delim . $this->agemiefin . $this->Ini->date_delim1 . ", agejueini = " . $this->Ini->date_delim . $this->agejueini . $this->Ini->date_delim1 . ", agejuefin = " . $this->Ini->date_delim . $this->agejuefin . $this->Ini->date_delim1 . ", agevieini = " . $this->Ini->date_delim . $this->agevieini . $this->Ini->date_delim1 . ", ageviefin = " . $this->Ini->date_delim . $this->ageviefin . $this->Ini->date_delim1 . ", agesabini = " . $this->Ini->date_delim . $this->agesabini . $this->Ini->date_delim1 . ", agesabfin = " . $this->Ini->date_delim . $this->agesabfin . $this->Ini->date_delim1 . ", agedomini = " . $this->Ini->date_delim . $this->agedomini . $this->Ini->date_delim1 . ", agedomfin = " . $this->Ini->date_delim . $this->agedomfin . $this->Ini->date_delim1 . ", agecolor = '$this->agecolor'"; 
              } 
              if (isset($NM_val_form['ageusucrea']) && $NM_val_form['ageusucrea'] != $this->nmgp_dados_select['ageusucrea']) 
              { 
                  $SC_fields_update[] = "ageusucrea = '$this->ageusucrea'"; 
              } 
              if (isset($NM_val_form['ageusumodi']) && $NM_val_form['ageusumodi'] != $this->nmgp_dados_select['ageusumodi']) 
              { 
                  $SC_fields_update[] = "ageusumodi = '$this->ageusumodi'"; 
              } 
              if (isset($NM_val_form['agefeccrea']) && $NM_val_form['agefeccrea'] != $this->nmgp_dados_select['agefeccrea']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "agefeccrea = #$this->agefeccrea#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "agefeccrea = EXTEND('" . $this->agefeccrea . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "agefeccrea = " . $this->Ini->date_delim . $this->agefeccrea . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['agefecmodi']) && $NM_val_form['agefecmodi'] != $this->nmgp_dados_select['agefecmodi']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "agefecmodi = #$this->agefecmodi#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "agefecmodi = EXTEND('" . $this->agefecmodi . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "agefecmodi = " . $this->Ini->date_delim . $this->agefecmodi . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE agesecuen = $this->agesecuen ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE agesecuen = $this->agesecuen ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE agesecuen = $this->agesecuen ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE agesecuen = $this->agesecuen ";  
              }  
              else  
              {
                  $comando .= " WHERE agesecuen = $this->agesecuen ";  
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
                                  form_agenda_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->agenombre = $this->agenombre_before_qstr;
              $this->agecolor = $this->agecolor_before_qstr;
              $this->ageusucrea = $this->ageusucrea_before_qstr;
              $this->ageusumodi = $this->ageusumodi_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['agenombre'])) { $this->agenombre = $NM_val_form['agenombre']; }
              elseif (isset($this->agenombre)) { $this->nm_limpa_alfa($this->agenombre); }
              if     (isset($NM_val_form) && isset($NM_val_form['medcodigo'])) { $this->medcodigo = $NM_val_form['medcodigo']; }
              elseif (isset($this->medcodigo)) { $this->nm_limpa_alfa($this->medcodigo); }
              if     (isset($NM_val_form) && isset($NM_val_form['ageactivo'])) { $this->ageactivo = $NM_val_form['ageactivo']; }
              elseif (isset($this->ageactivo)) { $this->nm_limpa_alfa($this->ageactivo); }
              if     (isset($NM_val_form) && isset($NM_val_form['ageintervalo'])) { $this->ageintervalo = $NM_val_form['ageintervalo']; }
              elseif (isset($this->ageintervalo)) { $this->nm_limpa_alfa($this->ageintervalo); }
              if     (isset($NM_val_form) && isset($NM_val_form['agelunactivo'])) { $this->agelunactivo = $NM_val_form['agelunactivo']; }
              elseif (isset($this->agelunactivo)) { $this->nm_limpa_alfa($this->agelunactivo); }
              if     (isset($NM_val_form) && isset($NM_val_form['agemaractivo'])) { $this->agemaractivo = $NM_val_form['agemaractivo']; }
              elseif (isset($this->agemaractivo)) { $this->nm_limpa_alfa($this->agemaractivo); }
              if     (isset($NM_val_form) && isset($NM_val_form['agemieactivo'])) { $this->agemieactivo = $NM_val_form['agemieactivo']; }
              elseif (isset($this->agemieactivo)) { $this->nm_limpa_alfa($this->agemieactivo); }
              if     (isset($NM_val_form) && isset($NM_val_form['agejueactivo'])) { $this->agejueactivo = $NM_val_form['agejueactivo']; }
              elseif (isset($this->agejueactivo)) { $this->nm_limpa_alfa($this->agejueactivo); }
              if     (isset($NM_val_form) && isset($NM_val_form['agevieactivo'])) { $this->agevieactivo = $NM_val_form['agevieactivo']; }
              elseif (isset($this->agevieactivo)) { $this->nm_limpa_alfa($this->agevieactivo); }
              if     (isset($NM_val_form) && isset($NM_val_form['agesabactivo'])) { $this->agesabactivo = $NM_val_form['agesabactivo']; }
              elseif (isset($this->agesabactivo)) { $this->nm_limpa_alfa($this->agesabactivo); }
              if     (isset($NM_val_form) && isset($NM_val_form['agedomactivo'])) { $this->agedomactivo = $NM_val_form['agedomactivo']; }
              elseif (isset($this->agedomactivo)) { $this->nm_limpa_alfa($this->agedomactivo); }
              if     (isset($NM_val_form) && isset($NM_val_form['agecolor'])) { $this->agecolor = $NM_val_form['agecolor']; }
              elseif (isset($this->agecolor)) { $this->nm_limpa_alfa($this->agecolor); }
              if     (isset($NM_val_form) && isset($NM_val_form['ageusucrea'])) { $this->ageusucrea = $NM_val_form['ageusucrea']; }
              elseif (isset($this->ageusucrea)) { $this->nm_limpa_alfa($this->ageusucrea); }
              if     (isset($NM_val_form) && isset($NM_val_form['ageusumodi'])) { $this->ageusumodi = $NM_val_form['ageusumodi']; }
              elseif (isset($this->ageusumodi)) { $this->nm_limpa_alfa($this->ageusumodi); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('agenombre', 'medcodigo', 'ageintervalo', 'ageactivo', 'agecolor', 'ageusucrea', 'agefeccrea', 'ageusumodi', 'agefecmodi', 'agelunactivo', 'agemaractivo', 'agemieactivo', 'agejueactivo', 'agevieactivo', 'agesabactivo', 'agedomactivo', 'agelunini', 'agelunfin', 'agemarini', 'agemarfin', 'agemieini', 'agemiefin', 'agejueini', 'agejuefin', 'agevieini', 'ageviefin', 'agesabini', 'agesabfin', 'agedomini', 'agedomfin'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "agesecuen, ";
          } 
              $this->agefeccrea =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->agefeccrea_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
          $bInsertOk = true;
          $aInsertOk = array(); 
              $Cmd_Unique = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where agenombre = '" . $this->agenombre . "' AND medcodigo = " . $this->medcodigo . "";
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
                          form_agenda_pack_ajax_response();
                          exit;
                      }
                  }
              }
              elseif (0 < $rsUni->fields[0])
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_inst_uniq'] . " NOMBRE, MÉDICO"); 
                  $this->nmgp_opcao = "nada"; 
                  $GLOBALS["erro_incl"] = 1; 
                  $aInsertOk[] = 'agenombre+medcodigo';
                  $rsUni->Close();
              }
              else
              {
                  $rsUni->Close();
              }
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_agenda_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (agenombre, medcodigo, ageactivo, ageintervalo, agelunactivo, agemaractivo, agemieactivo, agejueactivo, agevieactivo, agesabactivo, agedomactivo, agelunini, agelunfin, agemarini, agemarfin, agemieini, agemiefin, agejueini, agejuefin, agevieini, ageviefin, agesabini, agesabfin, agedomini, agedomfin, agecolor, ageusucrea, ageusumodi, agefeccrea, agefecmodi) VALUES ('$this->agenombre', $this->medcodigo, $this->ageactivo, $this->ageintervalo, $this->agelunactivo, $this->agemaractivo, $this->agemieactivo, $this->agejueactivo, $this->agevieactivo, $this->agesabactivo, $this->agedomactivo, #$this->agelunini#, #$this->agelunfin#, #$this->agemarini#, #$this->agemarfin#, #$this->agemieini#, #$this->agemiefin#, #$this->agejueini#, #$this->agejuefin#, #$this->agevieini#, #$this->ageviefin#, #$this->agesabini#, #$this->agesabfin#, #$this->agedomini#, #$this->agedomfin#, '$this->agecolor', '$this->ageusucrea', '$this->ageusumodi', #$this->agefeccrea#, #$this->agefecmodi#)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "agenombre, medcodigo, ageactivo, ageintervalo, agelunactivo, agemaractivo, agemieactivo, agejueactivo, agevieactivo, agesabactivo, agedomactivo, agelunini, agelunfin, agemarini, agemarfin, agemieini, agemiefin, agejueini, agejuefin, agevieini, ageviefin, agesabini, agesabfin, agedomini, agedomfin, agecolor, ageusucrea, ageusumodi, agefeccrea, agefecmodi) VALUES (" . $NM_seq_auto . "'$this->agenombre', $this->medcodigo, $this->ageactivo, $this->ageintervalo, $this->agelunactivo, $this->agemaractivo, $this->agemieactivo, $this->agejueactivo, $this->agevieactivo, $this->agesabactivo, $this->agedomactivo, " . $this->Ini->date_delim . $this->agelunini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agelunfin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemarini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemarfin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemieini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemiefin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agejueini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agejuefin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agevieini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->ageviefin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agesabini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agesabfin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agedomini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agedomfin . $this->Ini->date_delim1 . ", '$this->agecolor', '$this->ageusucrea', '$this->ageusumodi', " . $this->Ini->date_delim . $this->agefeccrea . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agefecmodi . $this->Ini->date_delim1 . ")"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "agenombre, medcodigo, ageactivo, ageintervalo, agelunactivo, agemaractivo, agemieactivo, agejueactivo, agevieactivo, agesabactivo, agedomactivo, agelunini, agelunfin, agemarini, agemarfin, agemieini, agemiefin, agejueini, agejuefin, agevieini, ageviefin, agesabini, agesabfin, agedomini, agedomfin, agecolor, ageusucrea, ageusumodi, agefeccrea, agefecmodi) VALUES (" . $NM_seq_auto . "'$this->agenombre', $this->medcodigo, $this->ageactivo, $this->ageintervalo, $this->agelunactivo, $this->agemaractivo, $this->agemieactivo, $this->agejueactivo, $this->agevieactivo, $this->agesabactivo, $this->agedomactivo, " . $this->Ini->date_delim . $this->agelunini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agelunfin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemarini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemarfin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemieini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemiefin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agejueini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agejuefin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agevieini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->ageviefin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agesabini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agesabfin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agedomini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agedomfin . $this->Ini->date_delim1 . ", '$this->agecolor', '$this->ageusucrea', '$this->ageusumodi', " . $this->Ini->date_delim . $this->agefeccrea . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agefecmodi . $this->Ini->date_delim1 . ")"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "agenombre, medcodigo, ageactivo, ageintervalo, agelunactivo, agemaractivo, agemieactivo, agejueactivo, agevieactivo, agesabactivo, agedomactivo, agelunini, agelunfin, agemarini, agemarfin, agemieini, agemiefin, agejueini, agejuefin, agevieini, ageviefin, agesabini, agesabfin, agedomini, agedomfin, agecolor, ageusucrea, ageusumodi, agefeccrea, agefecmodi) VALUES (" . $NM_seq_auto . "'$this->agenombre', $this->medcodigo, $this->ageactivo, $this->ageintervalo, $this->agelunactivo, $this->agemaractivo, $this->agemieactivo, $this->agejueactivo, $this->agevieactivo, $this->agesabactivo, $this->agedomactivo, " . $this->Ini->date_delim . $this->agelunini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agelunfin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemarini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemarfin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemieini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemiefin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agejueini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agejuefin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agevieini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->ageviefin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agesabini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agesabfin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agedomini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agedomfin . $this->Ini->date_delim1 . ", '$this->agecolor', '$this->ageusucrea', '$this->ageusumodi', " . $this->Ini->date_delim . $this->agefeccrea . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agefecmodi . $this->Ini->date_delim1 . ")"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "agenombre, medcodigo, ageactivo, ageintervalo, agelunactivo, agemaractivo, agemieactivo, agejueactivo, agevieactivo, agesabactivo, agedomactivo, agelunini, agelunfin, agemarini, agemarfin, agemieini, agemiefin, agejueini, agejuefin, agevieini, ageviefin, agesabini, agesabfin, agedomini, agedomfin, agecolor, ageusucrea, ageusumodi, agefeccrea, agefecmodi) VALUES (" . $NM_seq_auto . "'$this->agenombre', $this->medcodigo, $this->ageactivo, $this->ageintervalo, $this->agelunactivo, $this->agemaractivo, $this->agemieactivo, $this->agejueactivo, $this->agevieactivo, $this->agesabactivo, $this->agedomactivo, " . $this->Ini->date_delim . $this->agelunini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agelunfin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemarini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemarfin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemieini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemiefin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agejueini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agejuefin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agevieini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->ageviefin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agesabini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agesabfin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agedomini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agedomfin . $this->Ini->date_delim1 . ", '$this->agecolor', '$this->ageusucrea', '$this->ageusumodi', EXTEND('$this->agefeccrea', YEAR TO FRACTION), EXTEND('$this->agefecmodi', YEAR TO FRACTION))"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "agenombre, medcodigo, ageactivo, ageintervalo, agelunactivo, agemaractivo, agemieactivo, agejueactivo, agevieactivo, agesabactivo, agedomactivo, agelunini, agelunfin, agemarini, agemarfin, agemieini, agemiefin, agejueini, agejuefin, agevieini, ageviefin, agesabini, agesabfin, agedomini, agedomfin, agecolor, ageusucrea, ageusumodi, agefeccrea, agefecmodi) VALUES (" . $NM_seq_auto . "'$this->agenombre', $this->medcodigo, $this->ageactivo, $this->ageintervalo, $this->agelunactivo, $this->agemaractivo, $this->agemieactivo, $this->agejueactivo, $this->agevieactivo, $this->agesabactivo, $this->agedomactivo, " . $this->Ini->date_delim . $this->agelunini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agelunfin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemarini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemarfin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemieini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemiefin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agejueini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agejuefin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agevieini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->ageviefin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agesabini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agesabfin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agedomini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agedomfin . $this->Ini->date_delim1 . ", '$this->agecolor', '$this->ageusucrea', '$this->ageusumodi', " . $this->Ini->date_delim . $this->agefeccrea . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agefecmodi . $this->Ini->date_delim1 . ")"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "agenombre, medcodigo, ageactivo, ageintervalo, agelunactivo, agemaractivo, agemieactivo, agejueactivo, agevieactivo, agesabactivo, agedomactivo, agelunini, agelunfin, agemarini, agemarfin, agemieini, agemiefin, agejueini, agejuefin, agevieini, ageviefin, agesabini, agesabfin, agedomini, agedomfin, agecolor, ageusucrea, ageusumodi, agefeccrea, agefecmodi) VALUES (" . $NM_seq_auto . "'$this->agenombre', $this->medcodigo, $this->ageactivo, $this->ageintervalo, $this->agelunactivo, $this->agemaractivo, $this->agemieactivo, $this->agejueactivo, $this->agevieactivo, $this->agesabactivo, $this->agedomactivo, " . $this->Ini->date_delim . $this->agelunini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agelunfin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemarini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemarfin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemieini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemiefin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agejueini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agejuefin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agevieini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->ageviefin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agesabini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agesabfin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agedomini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agedomfin . $this->Ini->date_delim1 . ", '$this->agecolor', '$this->ageusucrea', '$this->ageusumodi', " . $this->Ini->date_delim . $this->agefeccrea . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agefecmodi . $this->Ini->date_delim1 . ")"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "agenombre, medcodigo, ageactivo, ageintervalo, agelunactivo, agemaractivo, agemieactivo, agejueactivo, agevieactivo, agesabactivo, agedomactivo, agelunini, agelunfin, agemarini, agemarfin, agemieini, agemiefin, agejueini, agejuefin, agevieini, ageviefin, agesabini, agesabfin, agedomini, agedomfin, agecolor, ageusucrea, ageusumodi, agefeccrea, agefecmodi) VALUES (" . $NM_seq_auto . "'$this->agenombre', $this->medcodigo, $this->ageactivo, $this->ageintervalo, $this->agelunactivo, $this->agemaractivo, $this->agemieactivo, $this->agejueactivo, $this->agevieactivo, $this->agesabactivo, $this->agedomactivo, " . $this->Ini->date_delim . $this->agelunini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agelunfin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemarini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemarfin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemieini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemiefin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agejueini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agejuefin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agevieini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->ageviefin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agesabini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agesabfin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agedomini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agedomfin . $this->Ini->date_delim1 . ", '$this->agecolor', '$this->ageusucrea', '$this->ageusumodi', " . $this->Ini->date_delim . $this->agefeccrea . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agefecmodi . $this->Ini->date_delim1 . ")"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "agenombre, medcodigo, ageactivo, ageintervalo, agelunactivo, agemaractivo, agemieactivo, agejueactivo, agevieactivo, agesabactivo, agedomactivo, agelunini, agelunfin, agemarini, agemarfin, agemieini, agemiefin, agejueini, agejuefin, agevieini, ageviefin, agesabini, agesabfin, agedomini, agedomfin, agecolor, ageusucrea, ageusumodi, agefeccrea, agefecmodi) VALUES (" . $NM_seq_auto . "'$this->agenombre', $this->medcodigo, $this->ageactivo, $this->ageintervalo, $this->agelunactivo, $this->agemaractivo, $this->agemieactivo, $this->agejueactivo, $this->agevieactivo, $this->agesabactivo, $this->agedomactivo, " . $this->Ini->date_delim . $this->agelunini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agelunfin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemarini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemarfin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemieini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agemiefin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agejueini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agejuefin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agevieini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->ageviefin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agesabini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agesabfin . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agedomini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agedomfin . $this->Ini->date_delim1 . ", '$this->agecolor', '$this->ageusucrea', '$this->ageusumodi', " . $this->Ini->date_delim . $this->agefeccrea . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->agefecmodi . $this->Ini->date_delim1 . ")"; 
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
                              form_agenda_pack_ajax_response();
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
                          form_agenda_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->agesecuen =  $rsy->fields[0];
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
                  $this->agesecuen = $rsy->fields[0];
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
                  $this->agesecuen = $rsy->fields[0];
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
                  $this->agesecuen = $rsy->fields[0];
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
                  $this->agesecuen = $rsy->fields[0];
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
                  $this->agesecuen = $rsy->fields[0];
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
                  $this->agesecuen = $rsy->fields[0];
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
                  $this->agesecuen = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->agenombre = $this->agenombre_before_qstr;
              $this->agecolor = $this->agecolor_before_qstr;
              $this->ageusucrea = $this->ageusucrea_before_qstr;
              $this->ageusumodi = $this->ageusumodi_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->agesecuen = substr($this->Db->qstr($this->agesecuen), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where agesecuen = $this->agesecuen "); 
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
                          form_agenda_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['total']);
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
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['scriptcase']['form_agenda']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_agecolor = $this->agecolor;
}
  $update_table  = 'cita';      
$update_where  = "agesecuen = ".$this->agesecuen ; 
$update_fields = array(   
     "citcolor = '".$this->agecolor ."'",     
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
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_agenda_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_agecolor != $this->agecolor || (isset($bFlagRead_agecolor) && $bFlagRead_agecolor)))
    {
        $this->ajax_return_values_agecolor(true);
    }
}
$_SESSION['scriptcase']['form_agenda']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $salva_opcao ; 
          if ($salva_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->sc_evento = ""; 
          $this->NM_rollback_db(); 
          return; 
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['parms'] = "agesecuen?#?$this->agesecuen?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->agesecuen = null === $this->agesecuen ? null : substr($this->Db->qstr($this->agesecuen), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->agesecuen)) 
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
          else 
          { 
              $this->nmgp_opcao = "igual"; 
          } 
      } 
      if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->nmgp_opcao != "nada" && (trim($this->agesecuen) == "")) 
      { 
          if ($this->nmgp_opcao == "avanca")  
          { 
              $this->nmgp_opcao = "final"; 
          } 
          elseif ($this->nmgp_opcao != "novo")
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] == "F" && $this->sc_evento == "insert")
      {
          $this->nmgp_opcao = "final";
      }
      $sc_where = trim("");
      if (substr(strtolower($sc_where), 0, 5) == "where")
      {
          $sc_where  = substr($sc_where , 5);
      }
      if (!empty($sc_where))
      {
          $sc_where = " where " . $sc_where . " ";
      }
      if ('' != $sc_where_filter)
      {
          $sc_where = ('' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_agenda = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['total'] = $qt_geral_reg_form_agenda;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->agesecuen))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "agesecuen < $this->agesecuen "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "agesecuen < $this->agesecuen "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "agesecuen < $this->agesecuen "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "agesecuen < $this->agesecuen "; 
              }
              else  
              {
                  $Key_Where = "agesecuen < $this->agesecuen "; 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_agenda = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start'] > $qt_geral_reg_form_agenda)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start'] = $qt_geral_reg_form_agenda; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start'] = $qt_geral_reg_form_agenda; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_agenda) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT agesecuen, agenombre, medcodigo, ageactivo, ageintervalo, agelunactivo, agemaractivo, agemieactivo, agejueactivo, agevieactivo, agesabactivo, agedomactivo, str_replace (convert(char(10),agelunini,102), '.', '-') + ' ' + convert(char(8),agelunini,20), str_replace (convert(char(10),agelunfin,102), '.', '-') + ' ' + convert(char(8),agelunfin,20), str_replace (convert(char(10),agemarini,102), '.', '-') + ' ' + convert(char(8),agemarini,20), str_replace (convert(char(10),agemarfin,102), '.', '-') + ' ' + convert(char(8),agemarfin,20), str_replace (convert(char(10),agemieini,102), '.', '-') + ' ' + convert(char(8),agemieini,20), str_replace (convert(char(10),agemiefin,102), '.', '-') + ' ' + convert(char(8),agemiefin,20), str_replace (convert(char(10),agejueini,102), '.', '-') + ' ' + convert(char(8),agejueini,20), str_replace (convert(char(10),agejuefin,102), '.', '-') + ' ' + convert(char(8),agejuefin,20), str_replace (convert(char(10),agevieini,102), '.', '-') + ' ' + convert(char(8),agevieini,20), str_replace (convert(char(10),ageviefin,102), '.', '-') + ' ' + convert(char(8),ageviefin,20), str_replace (convert(char(10),agesabini,102), '.', '-') + ' ' + convert(char(8),agesabini,20), str_replace (convert(char(10),agesabfin,102), '.', '-') + ' ' + convert(char(8),agesabfin,20), str_replace (convert(char(10),agedomini,102), '.', '-') + ' ' + convert(char(8),agedomini,20), str_replace (convert(char(10),agedomfin,102), '.', '-') + ' ' + convert(char(8),agedomfin,20), agecolor, ageusucrea, ageusumodi, str_replace (convert(char(10),agefeccrea,102), '.', '-') + ' ' + convert(char(8),agefeccrea,20), str_replace (convert(char(10),agefecmodi,102), '.', '-') + ' ' + convert(char(8),agefecmodi,20) from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT agesecuen, agenombre, medcodigo, ageactivo, ageintervalo, agelunactivo, agemaractivo, agemieactivo, agejueactivo, agevieactivo, agesabactivo, agedomactivo, convert(char(23),agelunini,121), convert(char(23),agelunfin,121), convert(char(23),agemarini,121), convert(char(23),agemarfin,121), convert(char(23),agemieini,121), convert(char(23),agemiefin,121), convert(char(23),agejueini,121), convert(char(23),agejuefin,121), convert(char(23),agevieini,121), convert(char(23),ageviefin,121), convert(char(23),agesabini,121), convert(char(23),agesabfin,121), convert(char(23),agedomini,121), convert(char(23),agedomfin,121), agecolor, ageusucrea, ageusumodi, convert(char(23),agefeccrea,121), convert(char(23),agefecmodi,121) from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT agesecuen, agenombre, medcodigo, ageactivo, ageintervalo, agelunactivo, agemaractivo, agemieactivo, agejueactivo, agevieactivo, agesabactivo, agedomactivo, agelunini, agelunfin, agemarini, agemarfin, agemieini, agemiefin, agejueini, agejuefin, agevieini, ageviefin, agesabini, agesabfin, agedomini, agedomfin, agecolor, ageusucrea, ageusumodi, agefeccrea, agefecmodi from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT agesecuen, agenombre, medcodigo, ageactivo, ageintervalo, agelunactivo, agemaractivo, agemieactivo, agejueactivo, agevieactivo, agesabactivo, agedomactivo, agelunini, agelunfin, agemarini, agemarfin, agemieini, agemiefin, agejueini, agejuefin, agevieini, ageviefin, agesabini, agesabfin, agedomini, agedomfin, agecolor, ageusucrea, ageusumodi, EXTEND(agefeccrea, YEAR TO FRACTION), EXTEND(agefecmodi, YEAR TO FRACTION) from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT agesecuen, agenombre, medcodigo, ageactivo, ageintervalo, agelunactivo, agemaractivo, agemieactivo, agejueactivo, agevieactivo, agesabactivo, agedomactivo, agelunini, agelunfin, agemarini, agemarfin, agemieini, agemiefin, agejueini, agejuefin, agevieini, ageviefin, agesabini, agesabfin, agedomini, agedomfin, agecolor, ageusucrea, ageusumodi, agefeccrea, agefecmodi from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "agesecuen = $this->agesecuen"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "agesecuen = $this->agesecuen"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "agesecuen = $this->agesecuen"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "agesecuen = $this->agesecuen"; 
              }  
              else  
              {
                  $aWhere[] = "agesecuen = $this->agesecuen"; 
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
          $sc_order_by = "agesecuen";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['empty_filter'] = true;
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
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_saida_novo = "S"; 
              $rs->Close(); 
              if ($this->aba_iframe)
              {
                  $this->NM_ajax_info['buttonDisplay']['exit'] = $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd_extr']); 
              $this->nmgp_opcao = "novo"; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->agesecuen = $rs->fields[0] ; 
              $this->nmgp_dados_select['agesecuen'] = $this->agesecuen;
              $this->agenombre = $rs->fields[1] ; 
              $this->nmgp_dados_select['agenombre'] = $this->agenombre;
              $this->medcodigo = $rs->fields[2] ; 
              $this->nmgp_dados_select['medcodigo'] = $this->medcodigo;
              $this->ageactivo = $rs->fields[3] ; 
              $this->nmgp_dados_select['ageactivo'] = $this->ageactivo;
              $this->ageintervalo = $rs->fields[4] ; 
              $this->nmgp_dados_select['ageintervalo'] = $this->ageintervalo;
              $this->agelunactivo = $rs->fields[5] ; 
              $this->nmgp_dados_select['agelunactivo'] = $this->agelunactivo;
              $this->agemaractivo = $rs->fields[6] ; 
              $this->nmgp_dados_select['agemaractivo'] = $this->agemaractivo;
              $this->agemieactivo = $rs->fields[7] ; 
              $this->nmgp_dados_select['agemieactivo'] = $this->agemieactivo;
              $this->agejueactivo = $rs->fields[8] ; 
              $this->nmgp_dados_select['agejueactivo'] = $this->agejueactivo;
              $this->agevieactivo = $rs->fields[9] ; 
              $this->nmgp_dados_select['agevieactivo'] = $this->agevieactivo;
              $this->agesabactivo = $rs->fields[10] ; 
              $this->nmgp_dados_select['agesabactivo'] = $this->agesabactivo;
              $this->agedomactivo = $rs->fields[11] ; 
              $this->nmgp_dados_select['agedomactivo'] = $this->agedomactivo;
              $this->agelunini = $rs->fields[12] ; 
              $this->nmgp_dados_select['agelunini'] = $this->agelunini;
              $this->agelunfin = $rs->fields[13] ; 
              $this->nmgp_dados_select['agelunfin'] = $this->agelunfin;
              $this->agemarini = $rs->fields[14] ; 
              $this->nmgp_dados_select['agemarini'] = $this->agemarini;
              $this->agemarfin = $rs->fields[15] ; 
              $this->nmgp_dados_select['agemarfin'] = $this->agemarfin;
              $this->agemieini = $rs->fields[16] ; 
              $this->nmgp_dados_select['agemieini'] = $this->agemieini;
              $this->agemiefin = $rs->fields[17] ; 
              $this->nmgp_dados_select['agemiefin'] = $this->agemiefin;
              $this->agejueini = $rs->fields[18] ; 
              $this->nmgp_dados_select['agejueini'] = $this->agejueini;
              $this->agejuefin = $rs->fields[19] ; 
              $this->nmgp_dados_select['agejuefin'] = $this->agejuefin;
              $this->agevieini = $rs->fields[20] ; 
              $this->nmgp_dados_select['agevieini'] = $this->agevieini;
              $this->ageviefin = $rs->fields[21] ; 
              $this->nmgp_dados_select['ageviefin'] = $this->ageviefin;
              $this->agesabini = $rs->fields[22] ; 
              $this->nmgp_dados_select['agesabini'] = $this->agesabini;
              $this->agesabfin = $rs->fields[23] ; 
              $this->nmgp_dados_select['agesabfin'] = $this->agesabfin;
              $this->agedomini = $rs->fields[24] ; 
              $this->nmgp_dados_select['agedomini'] = $this->agedomini;
              $this->agedomfin = $rs->fields[25] ; 
              $this->nmgp_dados_select['agedomfin'] = $this->agedomfin;
              $this->agecolor = $rs->fields[26] ; 
              $this->nmgp_dados_select['agecolor'] = $this->agecolor;
              $this->ageusucrea = $rs->fields[27] ; 
              $this->nmgp_dados_select['ageusucrea'] = $this->ageusucrea;
              $this->ageusumodi = $rs->fields[28] ; 
              $this->nmgp_dados_select['ageusumodi'] = $this->ageusumodi;
              $this->agefeccrea = $rs->fields[29] ; 
              if (substr($this->agefeccrea, 10, 1) == "-") 
              { 
                 $this->agefeccrea = substr($this->agefeccrea, 0, 10) . " " . substr($this->agefeccrea, 11);
              } 
              if (substr($this->agefeccrea, 13, 1) == ".") 
              { 
                 $this->agefeccrea = substr($this->agefeccrea, 0, 13) . ":" . substr($this->agefeccrea, 14, 2) . ":" . substr($this->agefeccrea, 17);
              } 
              $this->nmgp_dados_select['agefeccrea'] = $this->agefeccrea;
              $this->agefecmodi = $rs->fields[30] ; 
              if (substr($this->agefecmodi, 10, 1) == "-") 
              { 
                 $this->agefecmodi = substr($this->agefecmodi, 0, 10) . " " . substr($this->agefecmodi, 11);
              } 
              if (substr($this->agefecmodi, 13, 1) == ".") 
              { 
                 $this->agefecmodi = substr($this->agefecmodi, 0, 13) . ":" . substr($this->agefecmodi, 14, 2) . ":" . substr($this->agefecmodi, 17);
              } 
              $this->nmgp_dados_select['agefecmodi'] = $this->agefecmodi;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->agesecuen = (string)$this->agesecuen; 
              $this->medcodigo = (string)$this->medcodigo; 
              $this->ageactivo = (string)$this->ageactivo; 
              $this->ageintervalo = (string)$this->ageintervalo; 
              $this->agelunactivo = (string)$this->agelunactivo; 
              $this->agemaractivo = (string)$this->agemaractivo; 
              $this->agemieactivo = (string)$this->agemieactivo; 
              $this->agejueactivo = (string)$this->agejueactivo; 
              $this->agevieactivo = (string)$this->agevieactivo; 
              $this->agesabactivo = (string)$this->agesabactivo; 
              $this->agedomactivo = (string)$this->agedomactivo; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['parms'] = "agesecuen?#?$this->agesecuen?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start'] < $qt_geral_reg_form_agenda;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['opcao']   = '';
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
              $this->agesecuen = "";  
              $this->nmgp_dados_form["agesecuen"] = $this->agesecuen;
              $this->agenombre = "";  
              $this->nmgp_dados_form["agenombre"] = $this->agenombre;
              $this->medcodigo = "";  
              $this->nmgp_dados_form["medcodigo"] = $this->medcodigo;
              $this->ageactivo = "";  
              $this->nmgp_dados_form["ageactivo"] = $this->ageactivo;
              $this->ageintervalo = "";  
              $this->nmgp_dados_form["ageintervalo"] = $this->ageintervalo;
              $this->agelunactivo = "";  
              $this->nmgp_dados_form["agelunactivo"] = $this->agelunactivo;
              $this->agemaractivo = "";  
              $this->nmgp_dados_form["agemaractivo"] = $this->agemaractivo;
              $this->agemieactivo = "";  
              $this->nmgp_dados_form["agemieactivo"] = $this->agemieactivo;
              $this->agejueactivo = "";  
              $this->nmgp_dados_form["agejueactivo"] = $this->agejueactivo;
              $this->agevieactivo = "";  
              $this->nmgp_dados_form["agevieactivo"] = $this->agevieactivo;
              $this->agesabactivo = "";  
              $this->nmgp_dados_form["agesabactivo"] = $this->agesabactivo;
              $this->agedomactivo = "";  
              $this->nmgp_dados_form["agedomactivo"] = $this->agedomactivo;
              $this->agelunini = "";  
              $this->agelunini_hora = "" ;  
              $this->nmgp_dados_form["agelunini"] = $this->agelunini;
              $this->agelunfin = "";  
              $this->agelunfin_hora = "" ;  
              $this->nmgp_dados_form["agelunfin"] = $this->agelunfin;
              $this->agemarini = "";  
              $this->agemarini_hora = "" ;  
              $this->nmgp_dados_form["agemarini"] = $this->agemarini;
              $this->agemarfin = "";  
              $this->agemarfin_hora = "" ;  
              $this->nmgp_dados_form["agemarfin"] = $this->agemarfin;
              $this->agemieini = "";  
              $this->agemieini_hora = "" ;  
              $this->nmgp_dados_form["agemieini"] = $this->agemieini;
              $this->agemiefin = "";  
              $this->agemiefin_hora = "" ;  
              $this->nmgp_dados_form["agemiefin"] = $this->agemiefin;
              $this->agejueini = "";  
              $this->agejueini_hora = "" ;  
              $this->nmgp_dados_form["agejueini"] = $this->agejueini;
              $this->agejuefin = "";  
              $this->agejuefin_hora = "" ;  
              $this->nmgp_dados_form["agejuefin"] = $this->agejuefin;
              $this->agevieini = "";  
              $this->agevieini_hora = "" ;  
              $this->nmgp_dados_form["agevieini"] = $this->agevieini;
              $this->ageviefin = "";  
              $this->ageviefin_hora = "" ;  
              $this->nmgp_dados_form["ageviefin"] = $this->ageviefin;
              $this->agesabini = "";  
              $this->agesabini_hora = "" ;  
              $this->nmgp_dados_form["agesabini"] = $this->agesabini;
              $this->agesabfin = "";  
              $this->agesabfin_hora = "" ;  
              $this->nmgp_dados_form["agesabfin"] = $this->agesabfin;
              $this->agedomini = "";  
              $this->agedomini_hora = "" ;  
              $this->nmgp_dados_form["agedomini"] = $this->agedomini;
              $this->agedomfin = "";  
              $this->agedomfin_hora = "" ;  
              $this->nmgp_dados_form["agedomfin"] = $this->agedomfin;
              $this->agecolor = "";  
              $this->nmgp_dados_form["agecolor"] = $this->agecolor;
              $this->ageusucrea = "";  
              $this->nmgp_dados_form["ageusucrea"] = $this->ageusucrea;
              $this->ageusumodi = "";  
              $this->nmgp_dados_form["ageusumodi"] = $this->ageusumodi;
              $this->agefeccrea = "";  
              $this->agefeccrea_hora = "" ;  
              $this->nmgp_dados_form["agefeccrea"] = $this->agefeccrea;
              $this->agefecmodi = "";  
              $this->agefecmodi_hora = "" ;  
              $this->nmgp_dados_form["agefecmodi"] = $this->agefecmodi;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['foreign_key'] as $sFKName => $sFKValue)
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
// 
//-- 
   function nm_db_retorna($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(agesecuen) from " . $this->Ini->nm_tabela . " where agesecuen < $this->agesecuen" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(agesecuen) from " . $this->Ini->nm_tabela . " where agesecuen < $this->agesecuen" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(agesecuen) from " . $this->Ini->nm_tabela . " where agesecuen < $this->agesecuen" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(agesecuen) from " . $this->Ini->nm_tabela . " where agesecuen < $this->agesecuen" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(agesecuen) from " . $this->Ini->nm_tabela . " where agesecuen < $this->agesecuen" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(agesecuen) from " . $this->Ini->nm_tabela . " where agesecuen < $this->agesecuen" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(agesecuen) from " . $this->Ini->nm_tabela . " where agesecuen < $this->agesecuen" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(agesecuen) from " . $this->Ini->nm_tabela . " where agesecuen < $this->agesecuen" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(agesecuen) from " . $this->Ini->nm_tabela . " where agesecuen < $this->agesecuen" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(agesecuen) from " . $this->Ini->nm_tabela . " where agesecuen < $this->agesecuen" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->agesecuen = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "inicio";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_avanca($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(agesecuen) from " . $this->Ini->nm_tabela . " where agesecuen > $this->agesecuen" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(agesecuen) from " . $this->Ini->nm_tabela . " where agesecuen > $this->agesecuen" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(agesecuen) from " . $this->Ini->nm_tabela . " where agesecuen > $this->agesecuen" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(agesecuen) from " . $this->Ini->nm_tabela . " where agesecuen > $this->agesecuen" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(agesecuen) from " . $this->Ini->nm_tabela . " where agesecuen > $this->agesecuen" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(agesecuen) from " . $this->Ini->nm_tabela . " where agesecuen > $this->agesecuen" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(agesecuen) from " . $this->Ini->nm_tabela . " where agesecuen > $this->agesecuen" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(agesecuen) from " . $this->Ini->nm_tabela . " where agesecuen > $this->agesecuen" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(agesecuen) from " . $this->Ini->nm_tabela . " where agesecuen > $this->agesecuen" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(agesecuen) from " . $this->Ini->nm_tabela . " where agesecuen > $this->agesecuen" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->agesecuen = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "final";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_inicio($str_where_param = '') 
   {   
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela; 
     $rs = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela);
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if ($rs->fields[0] == 0) 
     { 
         $this->nmgp_opcao = "novo"; 
         $this->nm_flag_saida_novo = "S"; 
         $rs->Close(); 
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return;
     }
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(agesecuen) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(agesecuen) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(agesecuen) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(agesecuen) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(agesecuen) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(agesecuen) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(agesecuen) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(agesecuen) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(agesecuen) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(agesecuen) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_filter']))
         { 
             $rs->Close();  
             return ; 
         } 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->agesecuen = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
// 
//-- 
   function nm_db_final($str_where_param = '') 
   { 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(agesecuen) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(agesecuen) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(agesecuen) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(agesecuen) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(agesecuen) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(agesecuen) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(agesecuen) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(agesecuen) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(agesecuen) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(agesecuen) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->agesecuen = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
   function NM_gera_nav_page() 
   {
       $this->SC_nav_page = "";
       $Arr_result        = array();
       $Ind_result        = 0;
       $Reg_Page   = 1;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start'] + 1;
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function agedomactivo_onClick()
{
$_SESSION['scriptcase']['form_agenda']['contr_erro'] = 'on';
  
$original_agedomactivo = $this->agedomactivo;
$original_agedomini = $this->agedomini;
$original_agedomfin = $this->agedomfin;

if($this->agedomactivo ==1) {
	$this->Ini->nm_hidden_blocos[9] = "on"; $this->NM_ajax_info['blockDisplay']['9'] = 'on';
}
else {
	$this->Ini->nm_hidden_blocos[9] = "off"; $this->NM_ajax_info['blockDisplay']['9'] = 'off';
	$this->agedomini ="null";
	$this->agedomfin ="null";		
}

$modificado_agedomactivo = $this->agedomactivo;
$modificado_agedomini = $this->agedomini;
$modificado_agedomfin = $this->agedomfin;
$this->nm_formatar_campos('agedomactivo', 'agedomini', 'agedomfin');
if ($original_agedomactivo !== $modificado_agedomactivo || isset($this->nmgp_cmp_readonly['agedomactivo']) || (isset($bFlagRead_agedomactivo) && $bFlagRead_agedomactivo))
{
    $this->ajax_return_values_agedomactivo(true);
}
if ($original_agedomini !== $modificado_agedomini || isset($this->nmgp_cmp_readonly['agedomini']) || (isset($bFlagRead_agedomini) && $bFlagRead_agedomini))
{
    $this->ajax_return_values_agedomini(true);
}
if ($original_agedomfin !== $modificado_agedomfin || isset($this->nmgp_cmp_readonly['agedomfin']) || (isset($bFlagRead_agedomfin) && $bFlagRead_agedomfin))
{
    $this->ajax_return_values_agedomfin(true);
}
$this->NM_ajax_info['event_field'] = 'agedomactivo';
form_agenda_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_agenda']['contr_erro'] = 'off';
}
function agejueactivo_onClick()
{
$_SESSION['scriptcase']['form_agenda']['contr_erro'] = 'on';
  
$original_agejueactivo = $this->agejueactivo;
$original_agejueini = $this->agejueini;
$original_agejuefin = $this->agejuefin;

if($this->agejueactivo ==1) {
	$this->Ini->nm_hidden_blocos[6] = "on"; $this->NM_ajax_info['blockDisplay']['6'] = 'on';
}
else {
	$this->Ini->nm_hidden_blocos[6] = "off"; $this->NM_ajax_info['blockDisplay']['6'] = 'off';
	$this->agejueini ="null";
	$this->agejuefin ="null";	
}

$modificado_agejueactivo = $this->agejueactivo;
$modificado_agejueini = $this->agejueini;
$modificado_agejuefin = $this->agejuefin;
$this->nm_formatar_campos('agejueactivo', 'agejueini', 'agejuefin');
if ($original_agejueactivo !== $modificado_agejueactivo || isset($this->nmgp_cmp_readonly['agejueactivo']) || (isset($bFlagRead_agejueactivo) && $bFlagRead_agejueactivo))
{
    $this->ajax_return_values_agejueactivo(true);
}
if ($original_agejueini !== $modificado_agejueini || isset($this->nmgp_cmp_readonly['agejueini']) || (isset($bFlagRead_agejueini) && $bFlagRead_agejueini))
{
    $this->ajax_return_values_agejueini(true);
}
if ($original_agejuefin !== $modificado_agejuefin || isset($this->nmgp_cmp_readonly['agejuefin']) || (isset($bFlagRead_agejuefin) && $bFlagRead_agejuefin))
{
    $this->ajax_return_values_agejuefin(true);
}
$this->NM_ajax_info['event_field'] = 'agejueactivo';
form_agenda_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_agenda']['contr_erro'] = 'off';
}
function agelunactivo_onClick()
{
$_SESSION['scriptcase']['form_agenda']['contr_erro'] = 'on';
  
$original_agelunactivo = $this->agelunactivo;
$original_agelunini = $this->agelunini;
$original_agelunfin = $this->agelunfin;

if($this->agelunactivo ==1) {
	$this->Ini->nm_hidden_blocos[3] = "on"; $this->NM_ajax_info['blockDisplay']['3'] = 'on';
}
else {
	$this->Ini->nm_hidden_blocos[3] = "off"; $this->NM_ajax_info['blockDisplay']['3'] = 'off';
	$this->agelunini ="null";
	$this->agelunfin ="null";
}

$modificado_agelunactivo = $this->agelunactivo;
$modificado_agelunini = $this->agelunini;
$modificado_agelunfin = $this->agelunfin;
$this->nm_formatar_campos('agelunactivo', 'agelunini', 'agelunfin');
if ($original_agelunactivo !== $modificado_agelunactivo || isset($this->nmgp_cmp_readonly['agelunactivo']) || (isset($bFlagRead_agelunactivo) && $bFlagRead_agelunactivo))
{
    $this->ajax_return_values_agelunactivo(true);
}
if ($original_agelunini !== $modificado_agelunini || isset($this->nmgp_cmp_readonly['agelunini']) || (isset($bFlagRead_agelunini) && $bFlagRead_agelunini))
{
    $this->ajax_return_values_agelunini(true);
}
if ($original_agelunfin !== $modificado_agelunfin || isset($this->nmgp_cmp_readonly['agelunfin']) || (isset($bFlagRead_agelunfin) && $bFlagRead_agelunfin))
{
    $this->ajax_return_values_agelunfin(true);
}
$this->NM_ajax_info['event_field'] = 'agelunactivo';
form_agenda_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_agenda']['contr_erro'] = 'off';
}
function agemaractivo_onClick()
{
$_SESSION['scriptcase']['form_agenda']['contr_erro'] = 'on';
  
$original_agemaractivo = $this->agemaractivo;
$original_agemarini = $this->agemarini;
$original_agemarfin = $this->agemarfin;

if($this->agemaractivo ==1) {
	$this->Ini->nm_hidden_blocos[4] = "on"; $this->NM_ajax_info['blockDisplay']['4'] = 'on';
}
else {
	$this->Ini->nm_hidden_blocos[4] = "off"; $this->NM_ajax_info['blockDisplay']['4'] = 'off';
	$this->agemarini ="null";
	$this->agemarfin ="null";
}

$modificado_agemaractivo = $this->agemaractivo;
$modificado_agemarini = $this->agemarini;
$modificado_agemarfin = $this->agemarfin;
$this->nm_formatar_campos('agemaractivo', 'agemarini', 'agemarfin');
if ($original_agemaractivo !== $modificado_agemaractivo || isset($this->nmgp_cmp_readonly['agemaractivo']) || (isset($bFlagRead_agemaractivo) && $bFlagRead_agemaractivo))
{
    $this->ajax_return_values_agemaractivo(true);
}
if ($original_agemarini !== $modificado_agemarini || isset($this->nmgp_cmp_readonly['agemarini']) || (isset($bFlagRead_agemarini) && $bFlagRead_agemarini))
{
    $this->ajax_return_values_agemarini(true);
}
if ($original_agemarfin !== $modificado_agemarfin || isset($this->nmgp_cmp_readonly['agemarfin']) || (isset($bFlagRead_agemarfin) && $bFlagRead_agemarfin))
{
    $this->ajax_return_values_agemarfin(true);
}
$this->NM_ajax_info['event_field'] = 'agemaractivo';
form_agenda_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_agenda']['contr_erro'] = 'off';
}
function agemieactivo_onClick()
{
$_SESSION['scriptcase']['form_agenda']['contr_erro'] = 'on';
  
$original_agemieactivo = $this->agemieactivo;
$original_agemieini = $this->agemieini;
$original_agemiefin = $this->agemiefin;

if($this->agemieactivo ==1) {
	$this->Ini->nm_hidden_blocos[5] = "on"; $this->NM_ajax_info['blockDisplay']['5'] = 'on';
}
else {
	$this->Ini->nm_hidden_blocos[5] = "off"; $this->NM_ajax_info['blockDisplay']['5'] = 'off';
	$this->agemieini ="null";
	$this->agemiefin ="null";
}

$modificado_agemieactivo = $this->agemieactivo;
$modificado_agemieini = $this->agemieini;
$modificado_agemiefin = $this->agemiefin;
$this->nm_formatar_campos('agemieactivo', 'agemieini', 'agemiefin');
if ($original_agemieactivo !== $modificado_agemieactivo || isset($this->nmgp_cmp_readonly['agemieactivo']) || (isset($bFlagRead_agemieactivo) && $bFlagRead_agemieactivo))
{
    $this->ajax_return_values_agemieactivo(true);
}
if ($original_agemieini !== $modificado_agemieini || isset($this->nmgp_cmp_readonly['agemieini']) || (isset($bFlagRead_agemieini) && $bFlagRead_agemieini))
{
    $this->ajax_return_values_agemieini(true);
}
if ($original_agemiefin !== $modificado_agemiefin || isset($this->nmgp_cmp_readonly['agemiefin']) || (isset($bFlagRead_agemiefin) && $bFlagRead_agemiefin))
{
    $this->ajax_return_values_agemiefin(true);
}
$this->NM_ajax_info['event_field'] = 'agemieactivo';
form_agenda_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_agenda']['contr_erro'] = 'off';
}
function agesabactivo_onClick()
{
$_SESSION['scriptcase']['form_agenda']['contr_erro'] = 'on';
  
$original_agesabactivo = $this->agesabactivo;
$original_agesabini = $this->agesabini;
$original_agesabfin = $this->agesabfin;

if($this->agesabactivo ==1) {
	$this->Ini->nm_hidden_blocos[8] = "on"; $this->NM_ajax_info['blockDisplay']['8'] = 'on';
}
else {
	$this->Ini->nm_hidden_blocos[8] = "off"; $this->NM_ajax_info['blockDisplay']['8'] = 'off';
	$this->agesabini ="null";
	$this->agesabfin ="null";	
}

$modificado_agesabactivo = $this->agesabactivo;
$modificado_agesabini = $this->agesabini;
$modificado_agesabfin = $this->agesabfin;
$this->nm_formatar_campos('agesabactivo', 'agesabini', 'agesabfin');
if ($original_agesabactivo !== $modificado_agesabactivo || isset($this->nmgp_cmp_readonly['agesabactivo']) || (isset($bFlagRead_agesabactivo) && $bFlagRead_agesabactivo))
{
    $this->ajax_return_values_agesabactivo(true);
}
if ($original_agesabini !== $modificado_agesabini || isset($this->nmgp_cmp_readonly['agesabini']) || (isset($bFlagRead_agesabini) && $bFlagRead_agesabini))
{
    $this->ajax_return_values_agesabini(true);
}
if ($original_agesabfin !== $modificado_agesabfin || isset($this->nmgp_cmp_readonly['agesabfin']) || (isset($bFlagRead_agesabfin) && $bFlagRead_agesabfin))
{
    $this->ajax_return_values_agesabfin(true);
}
$this->NM_ajax_info['event_field'] = 'agesabactivo';
form_agenda_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_agenda']['contr_erro'] = 'off';
}
function agevieactivo_onClick()
{
$_SESSION['scriptcase']['form_agenda']['contr_erro'] = 'on';
  
$original_agevieactivo = $this->agevieactivo;
$original_agevieini = $this->agevieini;
$original_ageviefin = $this->ageviefin;

if($this->agevieactivo ==1) {
	$this->Ini->nm_hidden_blocos[7] = "on"; $this->NM_ajax_info['blockDisplay']['7'] = 'on';
}
else {
	$this->Ini->nm_hidden_blocos[7] = "off"; $this->NM_ajax_info['blockDisplay']['7'] = 'off';
	$this->agevieini ="null";
	$this->ageviefin ="null";	
}

$modificado_agevieactivo = $this->agevieactivo;
$modificado_agevieini = $this->agevieini;
$modificado_ageviefin = $this->ageviefin;
$this->nm_formatar_campos('agevieactivo', 'agevieini', 'ageviefin');
if ($original_agevieactivo !== $modificado_agevieactivo || isset($this->nmgp_cmp_readonly['agevieactivo']) || (isset($bFlagRead_agevieactivo) && $bFlagRead_agevieactivo))
{
    $this->ajax_return_values_agevieactivo(true);
}
if ($original_agevieini !== $modificado_agevieini || isset($this->nmgp_cmp_readonly['agevieini']) || (isset($bFlagRead_agevieini) && $bFlagRead_agevieini))
{
    $this->ajax_return_values_agevieini(true);
}
if ($original_ageviefin !== $modificado_ageviefin || isset($this->nmgp_cmp_readonly['ageviefin']) || (isset($bFlagRead_ageviefin) && $bFlagRead_ageviefin))
{
    $this->ajax_return_values_ageviefin(true);
}
$this->NM_ajax_info['event_field'] = 'agevieactivo';
form_agenda_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_agenda']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_agenda_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_agenda_form0.php");
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("agesecuen", "agenombre", "medcodigo", "ageactivo", "ageintervalo", "agelunactivo", "agemaractivo", "agemieactivo", "agejueactivo", "agevieactivo", "agesabactivo", "agedomactivo", "ageusucrea", "ageusumodi"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['csrf_token'];
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

   function Form_lookup_ageactivo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_agelunactivo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_agemaractivo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_agemieactivo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_agejueactivo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_agevieactivo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_agesabactivo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_agedomactivo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_agenda_pack_ajax_response();
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
              $this->SC_monta_condicao($comando, "agesecuen", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "agenombre", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_medcodigo($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "medcodigo", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_ageactivo($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "ageactivo", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ageintervalo", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_agelunactivo($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "agelunactivo", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_agemaractivo($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "agemaractivo", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_agemieactivo($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "agemieactivo", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_agejueactivo($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "agejueactivo", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_agevieactivo($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "agevieactivo", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_agesabactivo($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "agesabactivo", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_agedomactivo($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "agedomactivo", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ageusucrea", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ageusumodi", $arg_search, $data_search);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_agenda = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['total'] = $qt_geral_reg_form_agenda;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_agenda_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_agenda_pack_ajax_response();
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
      $nm_numeric[] = "agesecuen";$nm_numeric[] = "medcodigo";$nm_numeric[] = "ageactivo";$nm_numeric[] = "ageintervalo";$nm_numeric[] = "agelunactivo";$nm_numeric[] = "agemaractivo";$nm_numeric[] = "agemieactivo";$nm_numeric[] = "agejueactivo";$nm_numeric[] = "agevieactivo";$nm_numeric[] = "agesabactivo";$nm_numeric[] = "agedomactivo";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['decimal_db'] == ".")
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
      $Nm_datas['agelunini'] = "time";$Nm_datas['agelunfin'] = "time";$Nm_datas['agemarini'] = "time";$Nm_datas['agemarfin'] = "time";$Nm_datas['agemieini'] = "time";$Nm_datas['agemiefin'] = "time";$Nm_datas['agejueini'] = "time";$Nm_datas['agejuefin'] = "time";$Nm_datas['agevieini'] = "time";$Nm_datas['ageviefin'] = "time";$Nm_datas['agesabini'] = "time";$Nm_datas['agesabfin'] = "time";$Nm_datas['agedomini'] = "time";$Nm_datas['agedomfin'] = "time";$Nm_datas['agefeccrea'] = "datetime";$Nm_datas['agefecmodi'] = "datetime";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['SC_sep_date1'];
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
   function SC_lookup_medcodigo($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT medapellidos + ' ' + mednombres, medcodigo FROM medico WHERE (medapellidos + ' ' + mednombres LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(medapellidos,' ',mednombres), medcodigo FROM medico WHERE (concat(medapellidos,' ',mednombres) LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT medapellidos&' '&mednombres, medcodigo FROM medico WHERE (medapellidos&' '&mednombres LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT medapellidos||' '||mednombres, medcodigo FROM medico WHERE (medapellidos||' '||mednombres LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT medapellidos + ' ' + mednombres, medcodigo FROM medico WHERE (medapellidos + ' ' + mednombres LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT medapellidos||' '||mednombres, medcodigo FROM medico WHERE (medapellidos||' '||mednombres LIKE '%$campo%')" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT medapellidos||' '||mednombres, medcodigo FROM medico WHERE (medapellidos||' '||mednombres LIKE '%$campo%')" ; 
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
   function SC_lookup_ageactivo($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['1'] = "";
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
   function SC_lookup_agelunactivo($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['1'] = "";
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
   function SC_lookup_agemaractivo($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['1'] = "";
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
   function SC_lookup_agemieactivo($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['1'] = "";
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
   function SC_lookup_agejueactivo($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['1'] = "";
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
   function SC_lookup_agevieactivo($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['1'] = "";
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
   function SC_lookup_agesabactivo($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['1'] = "";
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
   function SC_lookup_agedomactivo($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['1'] = "";
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
       $nmgp_saida_form = "form_agenda_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_agenda_fim.php";
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
       form_agenda_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['masterValue']);
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
