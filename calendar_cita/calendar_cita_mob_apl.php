<?php
//
class calendar_cita_mob_apl
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
   var $citid;
   var $cittitulo;
   var $citfecha;
   var $cithoraini;
   var $cithorafin;
   var $citduracion;
   var $agesecuen;
   var $agesecuen_1;
   var $fclnumero;
   var $cittipo;
   var $cittipo_1;
   var $citfactur;
   var $citfactur_1;
   var $prenumero;
   var $prenumero_1;
   var $citobserv;
   var $citanula;
   var $citcolor;
   var $citperiod;
   var $citperiod_1;
   var $citrecurr;
   var $citrecurr_1;
   var $citrecurrinfo;
   var $citusucrea;
   var $citusumodi;
   var $citfeccrea;
   var $citfeccrea_hora;
   var $citfecmodi;
   var $citfecmodi_hora;
   var $__calend_all_day__;
   var $__calend_all_day___1;
   var $editar_cita;
   var $editar_presup;
   var $ficha_cliente;
   var $hora_fin_mostrar;
   var $label_ficha;
   var $cancelar_cita;
   var $cancelar_cita_1;
   var $info_documento;
   var $info_documento_2;
   var $nombre_presupuesto;
   var $paciente_nuevo;
   var $paciente_nuevo_1;
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
   var $is_calendar_app = true;
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
          if (isset($this->NM_ajax_info['param']['agesecuen']))
          {
              $this->agesecuen = $this->NM_ajax_info['param']['agesecuen'];
          }
          if (isset($this->NM_ajax_info['param']['cancelar_cita']))
          {
              $this->cancelar_cita = $this->NM_ajax_info['param']['cancelar_cita'];
          }
          if (isset($this->NM_ajax_info['param']['citcolor']))
          {
              $this->citcolor = $this->NM_ajax_info['param']['citcolor'];
          }
          if (isset($this->NM_ajax_info['param']['citduracion']))
          {
              $this->citduracion = $this->NM_ajax_info['param']['citduracion'];
          }
          if (isset($this->NM_ajax_info['param']['citfactur']))
          {
              $this->citfactur = $this->NM_ajax_info['param']['citfactur'];
          }
          if (isset($this->NM_ajax_info['param']['citfecha']))
          {
              $this->citfecha = $this->NM_ajax_info['param']['citfecha'];
          }
          if (isset($this->NM_ajax_info['param']['cithorafin']))
          {
              $this->cithorafin = $this->NM_ajax_info['param']['cithorafin'];
          }
          if (isset($this->NM_ajax_info['param']['cithoraini']))
          {
              $this->cithoraini = $this->NM_ajax_info['param']['cithoraini'];
          }
          if (isset($this->NM_ajax_info['param']['citid']))
          {
              $this->citid = $this->NM_ajax_info['param']['citid'];
          }
          if (isset($this->NM_ajax_info['param']['citobserv']))
          {
              $this->citobserv = $this->NM_ajax_info['param']['citobserv'];
          }
          if (isset($this->NM_ajax_info['param']['cittipo']))
          {
              $this->cittipo = $this->NM_ajax_info['param']['cittipo'];
          }
          if (isset($this->NM_ajax_info['param']['cittitulo']))
          {
              $this->cittitulo = $this->NM_ajax_info['param']['cittitulo'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['editar_cita']))
          {
              $this->editar_cita = $this->NM_ajax_info['param']['editar_cita'];
          }
          if (isset($this->NM_ajax_info['param']['editar_presup']))
          {
              $this->editar_presup = $this->NM_ajax_info['param']['editar_presup'];
          }
          if (isset($this->NM_ajax_info['param']['fclnumero']))
          {
              $this->fclnumero = $this->NM_ajax_info['param']['fclnumero'];
          }
          if (isset($this->NM_ajax_info['param']['ficha_cliente']))
          {
              $this->ficha_cliente = $this->NM_ajax_info['param']['ficha_cliente'];
          }
          if (isset($this->NM_ajax_info['param']['hora_fin_mostrar']))
          {
              $this->hora_fin_mostrar = $this->NM_ajax_info['param']['hora_fin_mostrar'];
          }
          if (isset($this->NM_ajax_info['param']['info_documento']))
          {
              $this->info_documento = $this->NM_ajax_info['param']['info_documento'];
          }
          if (isset($this->NM_ajax_info['param']['info_documento_2']))
          {
              $this->info_documento_2 = $this->NM_ajax_info['param']['info_documento_2'];
          }
          if (isset($this->NM_ajax_info['param']['label_ficha']))
          {
              $this->label_ficha = $this->NM_ajax_info['param']['label_ficha'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_fields']))
          {
              $this->nmgp_refresh_fields = $this->NM_ajax_info['param']['nmgp_refresh_fields'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['nombre_presupuesto']))
          {
              $this->nombre_presupuesto = $this->NM_ajax_info['param']['nombre_presupuesto'];
          }
          if (isset($this->NM_ajax_info['param']['paciente_nuevo']))
          {
              $this->paciente_nuevo = $this->NM_ajax_info['param']['paciente_nuevo'];
          }
          if (isset($this->NM_ajax_info['param']['prenumero']))
          {
              $this->prenumero = $this->NM_ajax_info['param']['prenumero'];
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
      if (isset($this->v_mincodigoficha) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['v_mincodigoficha'] = $this->v_mincodigoficha;
      }
      if (isset($_POST["usr_login"]) && isset($this->usr_login)) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_POST["v_mincodigoficha"]) && isset($this->v_mincodigoficha)) 
      {
          $_SESSION['v_mincodigoficha'] = $this->v_mincodigoficha;
      }
      if (isset($_GET["usr_login"]) && isset($this->usr_login)) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_GET["v_mincodigoficha"]) && isset($this->v_mincodigoficha)) 
      {
          $_SESSION['v_mincodigoficha'] = $this->v_mincodigoficha;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['calendar_cita_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['calendar_cita_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['calendar_cita_mob']['embutida_parms']);
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
                 nm_limpa_str_calendar_cita_mob($cadapar[1]);
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
          if (isset($this->v_mincodigoficha)) 
          {
              $_SESSION['v_mincodigoficha'] = $this->v_mincodigoficha;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['calendar_cita_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['calendar_cita_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['calendar_cita_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['calendar_cita_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
          if (isset($this->v_mincodigoficha)) 
          {
              $_SESSION['v_mincodigoficha'] = $this->v_mincodigoficha;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['calendar_cita_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['calendar_cita_mob']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['calendar_cita_mob']['nm_run_menu'] = 1;
      } 
      if (isset($this->nmgp_opcao) && 'igual_calendar' == $this->nmgp_opcao) {
          $this->nmgp_opcao = 'igual';
          $this->citid = $this->__orig_citid;
      }

      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      if ('' == $this->nmgp_opcao && !$this->NM_ajax_flag)
      {
          $this->nmgp_opcao = 'calendar';
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['calendar_cita_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['calendar_cita_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['calendar_cita_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['calendar_cita_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['calendar_cita_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['calendar_cita_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['calendar_cita_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new calendar_cita_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_cita']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['calendar_cita'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['calendar_cita_mob']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['calendar_cita_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['calendar_cita_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['calendar_cita_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['calendar_cita_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('calendar_cita_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['calendar_cita_mob']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " cita";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "calendar_cita_mob")
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
      $_SESSION['scriptcase']['css_form_help'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form.css";
      $_SESSION['scriptcase']['css_form_help_dir'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
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



      $_SESSION['scriptcase']['error_icon']['calendar_cita_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['calendar_cita_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_orig'] = " where citanula=0 and citfactur<3";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_pesq'] = " where citanula=0 and citfactur<3";
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['calendar_cita_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['calendar_cita_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['calendar_cita_mob'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }

      $this->nmgp_botoes['first']   = "off";
      $this->nmgp_botoes['back']    = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last']    = "off";

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['dados_form'];
          if (!isset($this->citanula)){$this->citanula = $this->nmgp_dados_form['citanula'];} 
          if (!isset($this->citperiod)){$this->citperiod = $this->nmgp_dados_form['citperiod'];} 
          if (!isset($this->citrecurr)){$this->citrecurr = $this->nmgp_dados_form['citrecurr'];} 
          if (!isset($this->citrecurrinfo)){$this->citrecurrinfo = $this->nmgp_dados_form['citrecurrinfo'];} 
          if (!isset($this->citusucrea)){$this->citusucrea = $this->nmgp_dados_form['citusucrea'];} 
          if (!isset($this->citusumodi)){$this->citusumodi = $this->nmgp_dados_form['citusumodi'];} 
          if (!isset($this->citfeccrea)){$this->citfeccrea = $this->nmgp_dados_form['citfeccrea'];} 
          if (!isset($this->citfecmodi)){$this->citfecmodi = $this->nmgp_dados_form['citfecmodi'];} 
          if (!isset($this->__calend_all_day__)){$this->__calend_all_day__ = $this->nmgp_dados_form['__calend_all_day__'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['hora_fin_mostrar'] != "null"){$this->hora_fin_mostrar = $this->nmgp_dados_form['hora_fin_mostrar'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("calendar_cita_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'calendar_cita/calendar_cita_mob_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'calendar_cita_mob_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'calendar_cita_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'calendar_cita_mob_help.txt');
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
          require_once($this->Ini->path_embutida . 'calendar_cita/calendar_cita_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "calendar_cita_mob_erro.class.php"); 
      }
      $this->Erro      = new calendar_cita_mob_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['calendar_cita_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      if ('calendar' == $this->nmgp_opcao && (!isset($this->NM_ajax_flag) || ('validate_' != substr($this->NM_ajax_opcao, 0, 9) && 'add_new_line' != $this->NM_ajax_opcao && 'autocomp_' != substr($this->NM_ajax_opcao, 0, 9))))
      {
          $_SESSION['scriptcase']['calendar_cita_mob']['contr_erro'] = 'on';
  $sql="select agesecuen, agecolor from agenda where ageactivo=1";
 
      $nm_select = $sql; 
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

?>
<script>
function format_categories() {	
	<?php
	$categorias="";
	foreach($this->rs  as $color) {
	?>
	filterCategory('<?php echo $color[0]; ?>');		  				top.document.getElementById("iframe_main_menu").contentWindow.document.getElementById("id_calendar_category_<?php echo $color[0]; ?>").style.backgroundColor = "<?php echo $color[1]; ?>";
	top.document.getElementById("iframe_main_menu").contentWindow.document.getElementById("id_calendar_category_<?php echo $color[0]; ?>").style.color = "black";
	
	<?php
		
		$categorias.="filterCategory('".$color[0]."'),";
	}
	$categorias_funciones=rtrim($categorias,",");
	?>
	top.document.getElementById("iframe_main_menu").contentWindow.document.getElementById("id_calendar_category_SCNULLCAT").innerHTML = '<div style="width:16px; height:16px; display: inline-block; margin: 0px 2px; border-style: solid; border-width: 1px; border-color: #000; background-color: #fff;"></div>TODAS LAS AGENDAS'; 
	
	

top.document.getElementById("iframe_main_menu").contentWindow.document.getElementById("id_calendar_category_SCNULLCAT").onclick = function() {disable_all(),<?php echo $categorias_funciones; ?>}; 	
	
}
	
function disable_all() {
	<?php
	foreach($this->rs  as $color) {
	?>
	 							top.document.getElementById("iframe_main_menu").contentWindow.document.getElementById("id_calendar_category_<?php echo $color[0]; ?>").classList.remove('scCalendarCategoryItemActive');

	
	<?php
		
		
	}

	?>
	
}
	
	
function imp_ag(){
	
top.document.getElementById("iframe_main_menu").contentWindow.document.getElementById("mybtn").addEventListener("click", function(){ 
			 var newWindowContent = top.document.getElementById("iframe_main_menu").contentWindow.document.getElementsByClassName('fc-scroller')[1].innerHTML;
			 var newWindow = window.open("", "", "width=700,height=700");
			 newWindow.document.write(newWindowContent);
	 });
}	
	
function mostrar_minicalendar_ok() { 
	
	for (var j=1; j <= 3; j++) {

		var slides = top.document.getElementById("iframe_main_menu").contentWindow.document.getElementsByClassName("fc-day-header");
		for (var i = 0; i < slides.length; i++) {

		   slides.item(i).classList.remove('fc-day-header');
		}

	}


	for (var j=1; j <= 7; j++) {
		var slides = top.document.getElementById("iframe_main_menu").contentWindow.document.getElementsByClassName("fc-day-top");
		for (var i = 0; i < slides.length; i++) {

		   slides.item(i).classList.remove('fc-day-top');
		}
	}


	var slides = top.document.getElementById("iframe_main_menu").contentWindow.document.getElementsByClassName("fc-other-month");
		for (var i = 0; i < slides.length; i++) {

		   slides.item(i).style="background-color:#d3d3d3";
	}
	
}

</script>

<?php

echo "<body onload=\"format_categories();\"></body>";

 $this->Ini->Nm_lang['lang_calendar_categories'] ="AGENDAS";
$_SESSION['scriptcase']['calendar_cita_mob']['contr_erro'] = 'off'; 
      }
      if (isset($this->citid)) { $this->nm_limpa_alfa($this->citid); }
      if (isset($this->cittitulo)) { $this->nm_limpa_alfa($this->cittitulo); }
      if (isset($this->citduracion)) { $this->nm_limpa_alfa($this->citduracion); }
      if (isset($this->agesecuen)) { $this->nm_limpa_alfa($this->agesecuen); }
      if (isset($this->fclnumero)) { $this->nm_limpa_alfa($this->fclnumero); }
      if (isset($this->cittipo)) { $this->nm_limpa_alfa($this->cittipo); }
      if (isset($this->citfactur)) { $this->nm_limpa_alfa($this->citfactur); }
      if (isset($this->prenumero)) { $this->nm_limpa_alfa($this->prenumero); }
      if (isset($this->citobserv)) { $this->nm_limpa_alfa($this->citobserv); }
      if (isset($this->citcolor)) { $this->nm_limpa_alfa($this->citcolor); }
      if ($nm_opc_lookup == "lookup")
      { 
          if ($GLOBALS['F'] == "fclnumero")
          { 
              $nm_parms   = substr($GLOBALS['P0'], 1, strlen($GLOBALS['P0']) - 2);
              $array_vars = explode(",", $nm_parms);
              $this->fclnumero = $array_vars[0];
              $fclnumero       = $this->fclnumero;
              $this->fclnumero       = $fclnumero;
              $this->lookup_fclnumero($conteudo);
              $conteudo = str_replace("&", "&amp;", $conteudo); 
              $conteudo = str_replace("\/" , "\/", $conteudo); 
              echo "<html><head></head>";
              echo " <body onload=\"p=document.layers?parentLayer:window.parent;p.jsrsLoaded('" . $GLOBALS['C'] . "');\">";
              echo "  jsrsPayload:";
              echo "  <br>";
              echo "  <form name=\"jsrs_Form\"><textarea name=\"jsrs_Payload\">";
              echo "$conteudo";
              echo " </textarea></form></body></html>";
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- citid
      $this->field_config['citid']               = array();
      $this->field_config['citid']['symbol_grp'] = '';
      $this->field_config['citid']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['citid']['symbol_dec'] = '';
      $this->field_config['citid']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['citid']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- citfecha
      $this->field_config['citfecha']                 = array();
      $this->field_config['citfecha']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['citfecha']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['citfecha']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'citfecha');
      //-- cithoraini
      $this->field_config['cithoraini']                 = array();
      $this->field_config['cithoraini']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['cithoraini']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['cithoraini']['date_display'] = "hhii";
      $this->new_date_format('HH', 'cithoraini');
      //-- citduracion
      $this->field_config['citduracion']               = array();
      $this->field_config['citduracion']['symbol_grp'] = '';
      $this->field_config['citduracion']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['citduracion']['symbol_dec'] = '';
      $this->field_config['citduracion']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['citduracion']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- cithorafin
      $this->field_config['cithorafin']                 = array();
      $this->field_config['cithorafin']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['cithorafin']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['cithorafin']['date_display'] = "hhii";
      $this->new_date_format('HH', 'cithorafin');
      //-- citanula
      $this->field_config['citanula']               = array();
      $this->field_config['citanula']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['citanula']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['citanula']['symbol_dec'] = '';
      $this->field_config['citanula']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['citanula']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- citfeccrea
      $this->field_config['citfeccrea']                 = array();
      $this->field_config['citfeccrea']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['citfeccrea']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['citfeccrea']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['citfeccrea']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'citfeccrea');
      //-- citfecmodi
      $this->field_config['citfecmodi']                 = array();
      $this->field_config['citfecmodi']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['citfecmodi']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['citfecmodi']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['citfecmodi']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'citfecmodi');
      //-- __calend_all_day__
      $this->field_config['__calendar_recur_info__']                 = array();
      $this->field_config['__calendar_recur_info__']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['__calendar_recur_info__']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['__calendar_recur_info__']['date_display'] = 'ddmmaaaa';
      $this->field_config['__calendar_recur_info__']['symbol_grp']   = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['__calendar_recur_info__']['symbol_fmt']   = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->new_date_format('DT', '__calendar_recur_info__');
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
      $this->calendarConfigValues = array(
          'insert'           => 'on' == $this->nmgp_botoes['insert'],
          'update'           => 'on' == $this->nmgp_botoes['update'],
          'delete'           => 'on' == $this->nmgp_botoes['delete'],
          'eventColorPast'   => 'scCalendarEventPast',
          'eventColorToday'  => 'scCalendarEventOnDay',
          'eventColorFuture' => 'scCalendarEventFuture',
      );
      if ('calendar' == $this->nmgp_opcao)
      {
          $this->calendarOutputDisplay();
          exit;
      }
      elseif ('importGoogleCalendarEvents' == $this->nmgp_opcao)
      {
         $this->calendarOutputImportGoogleCalendarEvents();
         exit;
      }
      elseif ('importGoogle' == $this->nmgp_opcao)
      {
         $this->calendarOutputImportGoogleDisplay();
         exit;
      }
      elseif ('exportGoogleCalendarEvents' == $this->nmgp_opcao)
      {
         $this->calendarExportEventsToGoogle();
         exit;
      }
      elseif ('exportGoogle' == $this->nmgp_opcao)
      {
         $this->calendarOutputExportEventsToGoogle();
         exit;
      }
      elseif ('calendar_fetch' == $this->nmgp_opcao)
      {
          $aEvents = $this->calendarFetchEvents();
          $this->calendarOutputJson($this->calendarNormalizeEvents($aEvents), true);
          exit;
      }
      elseif ('calendar_drop' == $this->nmgp_opcao)
      {
          $this->calendarOutputJson($this->calendarDragDrop());
          exit;
      }
      elseif ('calendar_resize' == $this->nmgp_opcao)
      {
          $this->calendarOutputJson($this->calendarResize());
          exit;
      }
      elseif ('calendar_print' == $this->nmgp_opcao)
      {
          $aEvents = $this->calendarFetchEvents('', true);
          $this->calendarOutputJson($this->calendarPrintEvents($this->calendarNormalizeEvents($aEvents)));
          exit;
      }

      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
         $this->info_documento = "";
         $this->label_ficha = "";
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_citid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'citid');
          }
          if ('validate_cittitulo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cittitulo');
          }
          if ('validate_citfecha' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'citfecha');
          }
          if ('validate_agesecuen' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agesecuen');
          }
          if ('validate_cithoraini' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cithoraini');
          }
          if ('validate_citduracion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'citduracion');
          }
          if ('validate_cithorafin' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cithorafin');
          }
          if ('validate_hora_fin_mostrar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'hora_fin_mostrar');
          }
          if ('validate_citfactur' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'citfactur');
          }
          if ('validate_fclnumero' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclnumero');
          }
          if ('validate_paciente_nuevo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'paciente_nuevo');
          }
          if ('validate_cittipo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cittipo');
          }
          if ('validate_ficha_cliente' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ficha_cliente');
          }
          if ('validate_editar_cita' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'editar_cita');
          }
          if ('validate_citcolor' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'citcolor');
          }
          if ('validate_prenumero' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'prenumero');
          }
          if ('validate_nombre_presupuesto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nombre_presupuesto');
          }
          if ('validate_editar_presup' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'editar_presup');
          }
          if ('validate_info_documento_2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'info_documento_2');
          }
          if ('validate_citobserv' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'citobserv');
          }
          if ('validate_cancelar_cita' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cancelar_cita');
          }
          calendar_cita_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_agesecuen_onchange' == $this->NM_ajax_opcao)
          {
              $this->agesecuen_onChange();
          }
          if ('event_citduracion_onchange' == $this->NM_ajax_opcao)
          {
              $this->citduracion_onChange();
          }
          if ('event_cithoraini_onchange' == $this->NM_ajax_opcao)
          {
              $this->cithoraini_onChange();
          }
          if ('event_cittipo_onchange' == $this->NM_ajax_opcao)
          {
              $this->cittipo_onChange();
          }
          if ('event_paciente_nuevo_onclick' == $this->NM_ajax_opcao)
          {
              $this->paciente_nuevo_onClick();
          }
          calendar_cita_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->__calend_all_day__))
          {
              $x = 0; 
              $this->__calend_all_day___1 = $this->__calend_all_day__;
              $this->__calend_all_day__ = ""; 
              if ($this->__calend_all_day___1 != "") 
              { 
                  foreach ($this->__calend_all_day___1 as $dados___calend_all_day___1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->__calend_all_day__ .= ";";
                      } 
                      $this->__calend_all_day__ .= $dados___calend_all_day___1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->paciente_nuevo))
          {
              $x = 0; 
              $this->paciente_nuevo_1 = $this->paciente_nuevo;
              $this->paciente_nuevo = ""; 
              if ($this->paciente_nuevo_1 != "") 
              { 
                  foreach ($this->paciente_nuevo_1 as $dados_paciente_nuevo_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->paciente_nuevo .= ";";
                      } 
                      $this->paciente_nuevo .= $dados_paciente_nuevo_1;
                      $x++ ; 
                  } 
              } 
          } 
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['dados_select']['hora_fin_mostrar']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->hora_fin_mostrar = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['dados_select']['hora_fin_mostrar'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['dados_select']['fclnumero']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->fclnumero = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['dados_select']['fclnumero'];
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              calendar_cita_mob_pack_ajax_response();
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
          if ($this->nmgp_opcao != "incluir")
          {
              $this->scFormFocusErrorName = '';
          }
          $_SESSION['scriptcase']['calendar_cita_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  calendar_cita_mob_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          calendar_cita_mob_pack_ajax_response();
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
          calendar_cita_mob_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "calendar_cita_mob.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " cita") ?></TITLE>
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
<form name="Fdown" method="get" action="calendar_cita_mob_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="calendar_cita_mob"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="calendar_cita_mob.php" target="_self" style="display: none"> 
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
   function lookup_fclnumero(&$conteudo)
   {
      global  $fclnumero;
      $guarda_formatado = $this->formatado;
      $this->nm_tira_formatacao();
      $Salva_opc = $this->nmgp_opcao;
      $this->nmgp_opcao = "lookup_rpc";
      $this->nm_converte_datas();
      $this->nmgp_opcao = $Salva_opc;
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "SELECT fclapellidos + ' ' + fclnombres  FROM ficha_cliente  WHERE fclnumero = $this->fclnumero  ORDER BY fclapellidos, fclnombres";
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      {
          $nm_comando = "SELECT concat(fclapellidos,' ',fclnombres)  FROM ficha_cliente  WHERE fclnumero = $this->fclnumero  ORDER BY fclapellidos, fclnombres";
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $nm_comando = "SELECT fclapellidos&' '&fclnombres  FROM ficha_cliente  WHERE fclnumero = $this->fclnumero  ORDER BY fclapellidos, fclnombres";
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "SELECT fclapellidos||' '||fclnombres  FROM ficha_cliente  WHERE fclnumero = $this->fclnumero  ORDER BY fclapellidos, fclnombres";
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      {
          $nm_comando = "SELECT fclapellidos + ' ' + fclnombres  FROM ficha_cliente  WHERE fclnumero = $this->fclnumero  ORDER BY fclapellidos, fclnombres";
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      {
          $nm_comando = "SELECT fclapellidos||' '||fclnombres  FROM ficha_cliente  WHERE fclnumero = $this->fclnumero  ORDER BY fclapellidos, fclnombres";
      }
      else
      {
          $nm_comando = "SELECT fclapellidos||' '||fclnombres  FROM ficha_cliente  WHERE fclnumero = $this->fclnumero  ORDER BY fclapellidos, fclnombres";
      }
      if ($this->fclnumero == "")
      { 
          $conteudo = ""; 
          $this->nm_formatar_campos();
          return; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      {
          $conteudo = (isset($rs->fields[0])) ? $rs->fields[0] : ""; 
          $rs->Close() ; 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      {  
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      $GLOBALS["NM_ERRO_IBASE"] = 0; 
      foreach ($this->Before_unformat as $Cmp => $Val)
      {
          $this->$Cmp = $Val;
          $this->formatado = $guarda_formatado;
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
           case 'citid':
               return "No. CITA";
               break;
           case 'cittitulo':
               return "ASUNTO";
               break;
           case 'citfecha':
               return "FECHA";
               break;
           case 'agesecuen':
               return "AGENDA";
               break;
           case 'cithoraini':
               return "HORA INICIO";
               break;
           case 'citduracion':
               return "DURACI�N (min)";
               break;
           case 'cithorafin':
               return "HORA FINal";
               break;
           case 'hora_fin_mostrar':
               return "HORA FIN";
               break;
           case 'citfactur':
               return "ESTADO";
               break;
           case 'info_documento':
               return "";
               break;
           case 'fclnumero':
               return "PACIENTE";
               break;
           case 'paciente_nuevo':
               return "NUEVO PACIENTE";
               break;
           case 'cittipo':
               return "TIPO";
               break;
           case 'label_ficha':
               return "";
               break;
           case 'ficha_cliente':
               return "";
               break;
           case 'editar_cita':
               return "";
               break;
           case 'citcolor':
               return "Citcolor";
               break;
           case 'prenumero':
               return "PRESUPUESTO";
               break;
           case 'nombre_presupuesto':
               return "PRESUPUESTO";
               break;
           case 'editar_presup':
               return "";
               break;
           case 'info_documento_2':
               return "info_documento_2";
               break;
           case 'citobserv':
               return "OBSERVACIONES";
               break;
           case 'cancelar_cita':
               return "CANCELAR CITA";
               break;
           case 'citanula':
               return "Citanula";
               break;
           case 'citperiod':
               return "Citperiod";
               break;
           case 'citrecurr':
               return "Citrecurr";
               break;
           case 'citrecurrinfo':
               return "Citrecurrinfo";
               break;
           case 'citusucrea':
               return "USUARIO CREACI�N";
               break;
           case 'citusumodi':
               return "USUARIO MODIFICACI�N";
               break;
           case 'citfeccrea':
               return "FECHA CREACI�N";
               break;
           case 'citfecmodi':
               return "FECHA MODIFICACI�N";
               break;
           case '__calend_all_day__':
               return "" . $this->Ini->Nm_lang['lang_per_allday'] . "";
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
     $this->scFormFocusErrorName = '';
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_calendar_cita_mob']) || !is_array($this->NM_ajax_info['errList']['geral_calendar_cita_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_calendar_cita_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_calendar_cita_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if (isset($this->__calend_all_day__) && 'Y' == $this->__calend_all_day__)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['bypass_required_time']['cithoraini'] = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['bypass_required_time']['cithorafin'] = true;
      }
      if ('' == $filtro || 'citid' == $filtro)
        $this->ValidateField_citid($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "citid";

      if ('' == $filtro || 'cittitulo' == $filtro)
        $this->ValidateField_cittitulo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "cittitulo";

      if ('' == $filtro || 'citfecha' == $filtro)
        $this->ValidateField_citfecha($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "citfecha";

      if ('' == $filtro || 'agesecuen' == $filtro)
        $this->ValidateField_agesecuen($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "agesecuen";

      if ('' == $filtro || 'cithoraini' == $filtro)
        $this->ValidateField_cithoraini($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "cithoraini";

      if ('' == $filtro || 'citduracion' == $filtro)
        $this->ValidateField_citduracion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "citduracion";

      if ('' == $filtro || 'cithorafin' == $filtro)
        $this->ValidateField_cithorafin($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "cithorafin";

      if ('' == $filtro || 'hora_fin_mostrar' == $filtro)
        $this->ValidateField_hora_fin_mostrar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "hora_fin_mostrar";

      if ('' == $filtro || 'citfactur' == $filtro)
        $this->ValidateField_citfactur($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "citfactur";

      if ('' == $filtro || 'fclnumero' == $filtro)
        $this->ValidateField_fclnumero($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "fclnumero";

      if ('' == $filtro || 'paciente_nuevo' == $filtro)
        $this->ValidateField_paciente_nuevo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "paciente_nuevo";

      if ('' == $filtro || 'cittipo' == $filtro)
        $this->ValidateField_cittipo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "cittipo";

      if ('' == $filtro || 'ficha_cliente' == $filtro)
        $this->ValidateField_ficha_cliente($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "ficha_cliente";

      if ('' == $filtro || 'editar_cita' == $filtro)
        $this->ValidateField_editar_cita($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "editar_cita";

      if ('' == $filtro || 'citcolor' == $filtro)
        $this->ValidateField_citcolor($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "citcolor";

      if ('' == $filtro || 'prenumero' == $filtro)
        $this->ValidateField_prenumero($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "prenumero";

      if ('' == $filtro || 'nombre_presupuesto' == $filtro)
        $this->ValidateField_nombre_presupuesto($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "nombre_presupuesto";

      if ('' == $filtro || 'editar_presup' == $filtro)
        $this->ValidateField_editar_presup($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "editar_presup";

      if ('' == $filtro || 'info_documento_2' == $filtro)
        $this->ValidateField_info_documento_2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "info_documento_2";

      if ('' == $filtro || 'citobserv' == $filtro)
        $this->ValidateField_citobserv($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "citobserv";

      if ('' == $filtro || 'cancelar_cita' == $filtro)
        $this->ValidateField_cancelar_cita($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "cancelar_cita";

      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['bypass_required_time']['cithoraini'] = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['bypass_required_time']['cithorafin'] = false;

      if (isset($this->__calend_all_day__) && 'Y' == $this->__calend_all_day__)
      {
          $this->cithoraini = '';
          $this->cithorafin = '';
      }

//-- converter datas   
          $this->nm_converte_datas();
//---

      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['calendar_cita_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cittipo = $this->cittipo;
    $original_prenumero = $this->prenumero;
}
  if(($this->cittipo =="P" || $this->cittipo =="C") && $this->prenumero =="null") {

	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Debe escoger un presupuesto.";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "Debe escoger un presupuesto.";
 }
;
	
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cittipo != $this->cittipo || (isset($bFlagRead_cittipo) && $bFlagRead_cittipo)))
    {
        $this->ajax_return_values_cittipo(true);
    }
    if (($original_prenumero != $this->prenumero || (isset($bFlagRead_prenumero) && $bFlagRead_prenumero)))
    {
        $this->ajax_return_values_prenumero(true);
    }
}
$_SESSION['scriptcase']['calendar_cita_mob']['contr_erro'] = 'off'; 
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

    function ValidateField_citid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->citid === "" || is_null($this->citid))  
      { 
          $this->citid = 0;
      } 
      nm_limpa_numero($this->citid, $this->field_config['citid']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->citid != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->citid) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "No. CITA: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['citid']))
                  {
                      $Campos_Erros['citid'] = array();
                  }
                  $Campos_Erros['citid'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['citid']) || !is_array($this->NM_ajax_info['errList']['citid']))
                  {
                      $this->NM_ajax_info['errList']['citid'] = array();
                  }
                  $this->NM_ajax_info['errList']['citid'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->citid, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "No. CITA; " ; 
                  if (!isset($Campos_Erros['citid']))
                  {
                      $Campos_Erros['citid'] = array();
                  }
                  $Campos_Erros['citid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['citid']) || !is_array($this->NM_ajax_info['errList']['citid']))
                  {
                      $this->NM_ajax_info['errList']['citid'] = array();
                  }
                  $this->NM_ajax_info['errList']['citid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'citid';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_citid

    function ValidateField_cittitulo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->cittitulo) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "ASUNTO " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cittitulo']))
              {
                  $Campos_Erros['cittitulo'] = array();
              }
              $Campos_Erros['cittitulo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cittitulo']) || !is_array($this->NM_ajax_info['errList']['cittitulo']))
              {
                  $this->NM_ajax_info['errList']['cittitulo'] = array();
              }
              $this->NM_ajax_info['errList']['cittitulo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cittitulo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cittitulo

    function ValidateField_citfecha(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->citfecha, $this->field_config['citfecha']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['citfecha']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['citfecha']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['citfecha']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['citfecha']['date_sep']) ; 
          if (trim($this->citfecha) != "")  
          { 
              if ($teste_validade->Data($this->citfecha, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "FECHA; " ; 
                  if (!isset($Campos_Erros['citfecha']))
                  {
                      $Campos_Erros['citfecha'] = array();
                  }
                  $Campos_Erros['citfecha'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['citfecha']) || !is_array($this->NM_ajax_info['errList']['citfecha']))
                  {
                      $this->NM_ajax_info['errList']['citfecha'] = array();
                  }
                  $this->NM_ajax_info['errList']['citfecha'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['php_cmp_required']['citfecha']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['php_cmp_required']['citfecha'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "FECHA" ; 
              if (!isset($Campos_Erros['citfecha']))
              {
                  $Campos_Erros['citfecha'] = array();
              }
              $Campos_Erros['citfecha'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['citfecha']) || !is_array($this->NM_ajax_info['errList']['citfecha']))
                  {
                      $this->NM_ajax_info['errList']['citfecha'] = array();
                  }
                  $this->NM_ajax_info['errList']['citfecha'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
          $this->field_config['citfecha']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'citfecha';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_citfecha

    function ValidateField_agesecuen(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->agesecuen == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['php_cmp_required']['agesecuen']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['php_cmp_required']['agesecuen'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "AGENDA" ; 
          if (!isset($Campos_Erros['agesecuen']))
          {
              $Campos_Erros['agesecuen'] = array();
          }
          $Campos_Erros['agesecuen'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['agesecuen']) || !is_array($this->NM_ajax_info['errList']['agesecuen']))
          {
              $this->NM_ajax_info['errList']['agesecuen'] = array();
          }
          $this->NM_ajax_info['errList']['agesecuen'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->agesecuen) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_agesecuen']) && !in_array($this->agesecuen, $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_agesecuen']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['agesecuen']))
              {
                  $Campos_Erros['agesecuen'] = array();
              }
              $Campos_Erros['agesecuen'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['agesecuen']) || !is_array($this->NM_ajax_info['errList']['agesecuen']))
              {
                  $this->NM_ajax_info['errList']['agesecuen'] = array();
              }
              $this->NM_ajax_info['errList']['agesecuen'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'agesecuen';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_agesecuen

    function ValidateField_cithoraini(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->cithoraini, $this->field_config['cithoraini']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['cithoraini']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['cithoraini']['time_sep']) ; 
          if (trim($this->cithoraini) != "")  
          { 
              if ($teste_validade->Hora($this->cithoraini, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "HORA INICIO; " ; 
                  if (!isset($Campos_Erros['cithoraini']))
                  {
                      $Campos_Erros['cithoraini'] = array();
                  }
                  $Campos_Erros['cithoraini'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cithoraini']) || !is_array($this->NM_ajax_info['errList']['cithoraini']))
                  {
                      $this->NM_ajax_info['errList']['cithoraini'] = array();
                  }
                  $this->NM_ajax_info['errList']['cithoraini'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['php_cmp_required']['cithoraini']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['php_cmp_required']['cithoraini'] == "on") 
           { 
              if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['bypass_required_time']['cithoraini']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['bypass_required_time']['cithoraini'])
              {
              $hasError = true;
              $Campos_Falta[] = "HORA INICIO" ; 
              if (!isset($Campos_Erros['cithoraini']))
              {
                  $Campos_Erros['cithoraini'] = array();
              }
              $Campos_Erros['cithoraini'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['cithoraini']) || !is_array($this->NM_ajax_info['errList']['cithoraini']))
                  {
                      $this->NM_ajax_info['errList']['cithoraini'] = array();
                  }
                  $this->NM_ajax_info['errList']['cithoraini'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
              }
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cithoraini';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cithoraini

    function ValidateField_citduracion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_numero($this->citduracion, $this->field_config['citduracion']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->citduracion != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->citduracion) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "DURACI�N (min): " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['citduracion']))
                  {
                      $Campos_Erros['citduracion'] = array();
                  }
                  $Campos_Erros['citduracion'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['citduracion']) || !is_array($this->NM_ajax_info['errList']['citduracion']))
                  {
                      $this->NM_ajax_info['errList']['citduracion'] = array();
                  }
                  $this->NM_ajax_info['errList']['citduracion'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->citduracion, 11, 0, 5, 99999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "DURACI�N (min); " ; 
                  if (!isset($Campos_Erros['citduracion']))
                  {
                      $Campos_Erros['citduracion'] = array();
                  }
                  $Campos_Erros['citduracion'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['citduracion']) || !is_array($this->NM_ajax_info['errList']['citduracion']))
                  {
                      $this->NM_ajax_info['errList']['citduracion'] = array();
                  }
                  $this->NM_ajax_info['errList']['citduracion'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['php_cmp_required']['citduracion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['php_cmp_required']['citduracion'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "DURACI�N (min)" ; 
              if (!isset($Campos_Erros['citduracion']))
              {
                  $Campos_Erros['citduracion'] = array();
              }
              $Campos_Erros['citduracion'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['citduracion']) || !is_array($this->NM_ajax_info['errList']['citduracion']))
                  {
                      $this->NM_ajax_info['errList']['citduracion'] = array();
                  }
                  $this->NM_ajax_info['errList']['citduracion'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'citduracion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_citduracion

    function ValidateField_cithorafin(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->cithorafin, $this->field_config['cithorafin']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['cithorafin']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['cithorafin']['time_sep']) ; 
          if (trim($this->cithorafin) != "")  
          { 
              if ($teste_validade->Hora($this->cithorafin, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "HORA FINal; " ; 
                  if (!isset($Campos_Erros['cithorafin']))
                  {
                      $Campos_Erros['cithorafin'] = array();
                  }
                  $Campos_Erros['cithorafin'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cithorafin']) || !is_array($this->NM_ajax_info['errList']['cithorafin']))
                  {
                      $this->NM_ajax_info['errList']['cithorafin'] = array();
                  }
                  $this->NM_ajax_info['errList']['cithorafin'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cithorafin';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cithorafin

    function ValidateField_hora_fin_mostrar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->hora_fin_mostrar) > 8) 
          { 
              $hasError = true;
              $Campos_Crit .= "HORA FIN " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['hora_fin_mostrar']))
              {
                  $Campos_Erros['hora_fin_mostrar'] = array();
              }
              $Campos_Erros['hora_fin_mostrar'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['hora_fin_mostrar']) || !is_array($this->NM_ajax_info['errList']['hora_fin_mostrar']))
              {
                  $this->NM_ajax_info['errList']['hora_fin_mostrar'] = array();
              }
              $this->NM_ajax_info['errList']['hora_fin_mostrar'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'hora_fin_mostrar';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_hora_fin_mostrar

    function ValidateField_citfactur(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if ($this->nmgp_opcao == "incluir")
   {
      if ($this->citfactur == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->citfactur === "" || is_null($this->citfactur))  
      { 
          $this->citfactur = 0;
          $this->sc_force_zero[] = 'citfactur';
      } 
   }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'citfactur';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_citfactur

    function ValidateField_fclnumero(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['php_cmp_required']['fclnumero']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['php_cmp_required']['fclnumero'] == "on")) 
      { 
          if ($this->fclnumero == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "PACIENTE" ; 
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
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fclnumero) > 11) 
          { 
              $hasError = true;
              $Campos_Crit .= "PACIENTE " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fclnumero']))
              {
                  $Campos_Erros['fclnumero'] = array();
              }
              $Campos_Erros['fclnumero'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fclnumero']) || !is_array($this->NM_ajax_info['errList']['fclnumero']))
              {
                  $this->NM_ajax_info['errList']['fclnumero'] = array();
              }
              $this->NM_ajax_info['errList']['fclnumero'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
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

    function ValidateField_paciente_nuevo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if ($this->nmgp_opcao == "incluir")
   {
      if ($this->paciente_nuevo == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->paciente_nuevo))
          {
              $x = 0; 
              $this->paciente_nuevo_1 = array(); 
              foreach ($this->paciente_nuevo as $ind => $dados_paciente_nuevo_1 ) 
              {
                  if ($dados_paciente_nuevo_1 != "") 
                  {
                      $this->paciente_nuevo_1[] = $dados_paciente_nuevo_1;
                  } 
              } 
              $this->paciente_nuevo = ""; 
              foreach ($this->paciente_nuevo_1 as $dados_paciente_nuevo_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->paciente_nuevo .= ";";
                   } 
                   $this->paciente_nuevo .= $dados_paciente_nuevo_1;
                   $x++ ; 
              } 
          } 
      } 
   }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'paciente_nuevo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_paciente_nuevo

    function ValidateField_cittipo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if ($this->nmgp_opcao == "incluir")
   {
      if ($this->cittipo == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['php_cmp_required']['cittipo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['php_cmp_required']['cittipo'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "TIPO" ;
          if (!isset($Campos_Erros['cittipo']))
          {
              $Campos_Erros['cittipo'] = array();
          }
          $Campos_Erros['cittipo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['cittipo']) || !is_array($this->NM_ajax_info['errList']['cittipo']))
                  {
                      $this->NM_ajax_info['errList']['cittipo'] = array();
                  }
                  $this->NM_ajax_info['errList']['cittipo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
   }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cittipo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cittipo

    function ValidateField_ficha_cliente(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->ficha_cliente) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ficha_cliente';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ficha_cliente

    function ValidateField_editar_cita(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->editar_cita) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'editar_cita';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_editar_cita

    function ValidateField_citcolor(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->citcolor) > 7) 
          { 
              $hasError = true;
              $Campos_Crit .= "Citcolor " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 7 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['citcolor']))
              {
                  $Campos_Erros['citcolor'] = array();
              }
              $Campos_Erros['citcolor'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 7 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['citcolor']) || !is_array($this->NM_ajax_info['errList']['citcolor']))
              {
                  $this->NM_ajax_info['errList']['citcolor'] = array();
              }
              $this->NM_ajax_info['errList']['citcolor'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 7 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'citcolor';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_citcolor

    function ValidateField_prenumero(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if ($this->nmgp_opcao == "incluir")
   {
               if (!empty($this->prenumero) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_prenumero']) && !in_array($this->prenumero, $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_prenumero']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['prenumero']))
                   {
                       $Campos_Erros['prenumero'] = array();
                   }
                   $Campos_Erros['prenumero'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['prenumero']) || !is_array($this->NM_ajax_info['errList']['prenumero']))
                   {
                       $this->NM_ajax_info['errList']['prenumero'] = array();
                   }
                   $this->NM_ajax_info['errList']['prenumero'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
   }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'prenumero';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_prenumero

    function ValidateField_nombre_presupuesto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->nombre_presupuesto) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "PRESUPUESTO " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nombre_presupuesto']))
              {
                  $Campos_Erros['nombre_presupuesto'] = array();
              }
              $Campos_Erros['nombre_presupuesto'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nombre_presupuesto']) || !is_array($this->NM_ajax_info['errList']['nombre_presupuesto']))
              {
                  $this->NM_ajax_info['errList']['nombre_presupuesto'] = array();
              }
              $this->NM_ajax_info['errList']['nombre_presupuesto'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nombre_presupuesto';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nombre_presupuesto

    function ValidateField_editar_presup(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->editar_presup) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'editar_presup';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_editar_presup

    function ValidateField_info_documento_2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->info_documento_2) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "info_documento_2 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['info_documento_2']))
              {
                  $Campos_Erros['info_documento_2'] = array();
              }
              $Campos_Erros['info_documento_2'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['info_documento_2']) || !is_array($this->NM_ajax_info['errList']['info_documento_2']))
              {
                  $this->NM_ajax_info['errList']['info_documento_2'] = array();
              }
              $this->NM_ajax_info['errList']['info_documento_2'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'info_documento_2';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_info_documento_2

    function ValidateField_citobserv(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->citobserv) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "OBSERVACIONES " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['citobserv']))
              {
                  $Campos_Erros['citobserv'] = array();
              }
              $Campos_Erros['citobserv'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['citobserv']) || !is_array($this->NM_ajax_info['errList']['citobserv']))
              {
                  $this->NM_ajax_info['errList']['citobserv'] = array();
              }
              $this->NM_ajax_info['errList']['citobserv'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'citobserv';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_citobserv

    function ValidateField_cancelar_cita(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cancelar_cita == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cancelar_cita';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cancelar_cita

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
    $this->nmgp_dados_form['citid'] = $this->citid;
    $this->nmgp_dados_form['cittitulo'] = $this->cittitulo;
    $this->nmgp_dados_form['citfecha'] = (strlen(trim($this->citfecha)) > 19) ? str_replace(".", ":", $this->citfecha) : trim($this->citfecha);
    $this->nmgp_dados_form['agesecuen'] = $this->agesecuen;
    $this->nmgp_dados_form['cithoraini'] = (strlen(trim($this->cithoraini)) > 19) ? str_replace(".", ":", $this->cithoraini) : trim($this->cithoraini);
    $this->nmgp_dados_form['citduracion'] = $this->citduracion;
    $this->nmgp_dados_form['cithorafin'] = (strlen(trim($this->cithorafin)) > 19) ? str_replace(".", ":", $this->cithorafin) : trim($this->cithorafin);
    $this->nmgp_dados_form['hora_fin_mostrar'] = $this->hora_fin_mostrar;
    $this->nmgp_dados_form['citfactur'] = $this->citfactur;
    $this->nmgp_dados_form['info_documento'] = $this->info_documento;
    $this->nmgp_dados_form['fclnumero'] = $this->fclnumero;
    $this->nmgp_dados_form['paciente_nuevo'] = $this->paciente_nuevo;
    $this->nmgp_dados_form['cittipo'] = $this->cittipo;
    $this->nmgp_dados_form['label_ficha'] = $this->label_ficha;
    $this->nmgp_dados_form['ficha_cliente'] = $this->ficha_cliente;
    $this->nmgp_dados_form['editar_cita'] = $this->editar_cita;
    $this->nmgp_dados_form['citcolor'] = $this->citcolor;
    $this->nmgp_dados_form['prenumero'] = $this->prenumero;
    $this->nmgp_dados_form['nombre_presupuesto'] = $this->nombre_presupuesto;
    $this->nmgp_dados_form['editar_presup'] = $this->editar_presup;
    $this->nmgp_dados_form['info_documento_2'] = $this->info_documento_2;
    $this->nmgp_dados_form['citobserv'] = $this->citobserv;
    $this->nmgp_dados_form['cancelar_cita'] = $this->cancelar_cita;
    $this->nmgp_dados_form['citanula'] = $this->citanula;
    $this->nmgp_dados_form['citperiod'] = $this->citperiod;
    $this->nmgp_dados_form['citrecurr'] = $this->citrecurr;
    $this->nmgp_dados_form['citrecurrinfo'] = $this->citrecurrinfo;
    $this->nmgp_dados_form['citusucrea'] = $this->citusucrea;
    $this->nmgp_dados_form['citusumodi'] = $this->citusumodi;
    $this->nmgp_dados_form['citfeccrea'] = $this->citfeccrea;
    $this->nmgp_dados_form['citfecmodi'] = $this->citfecmodi;
    $this->nmgp_dados_form['__calend_all_day__'] = $this->__calend_all_day__;
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['citid'] = $this->citid;
      nm_limpa_numero($this->citid, $this->field_config['citid']['symbol_grp']) ; 
      $this->Before_unformat['citfecha'] = $this->citfecha;
      nm_limpa_data($this->citfecha, $this->field_config['citfecha']['date_sep']) ; 
      $this->Before_unformat['cithoraini'] = $this->cithoraini;
      nm_limpa_hora($this->cithoraini, $this->field_config['cithoraini']['time_sep']) ; 
      $this->Before_unformat['citduracion'] = $this->citduracion;
      nm_limpa_numero($this->citduracion, $this->field_config['citduracion']['symbol_grp']) ; 
      $this->Before_unformat['cithorafin'] = $this->cithorafin;
      nm_limpa_hora($this->cithorafin, $this->field_config['cithorafin']['time_sep']) ; 
      $this->Before_unformat['citanula'] = $this->citanula;
      nm_limpa_numero($this->citanula, $this->field_config['citanula']['symbol_grp']) ; 
      $this->Before_unformat['citfeccrea'] = $this->citfeccrea;
      nm_limpa_data($this->citfeccrea, $this->field_config['citfeccrea']['date_sep']) ; 
      nm_limpa_hora($this->citfeccrea_hora, $this->field_config['citfeccrea']['time_sep']) ; 
      $this->Before_unformat['citfecmodi'] = $this->citfecmodi;
      nm_limpa_data($this->citfecmodi, $this->field_config['citfecmodi']['date_sep']) ; 
      nm_limpa_hora($this->citfecmodi_hora, $this->field_config['citfecmodi']['time_sep']) ; 
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
      if ($Nome_Campo == "citid")
      {
          nm_limpa_numero($this->citid, $this->field_config['citid']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "citduracion")
      {
          nm_limpa_numero($this->citduracion, $this->field_config['citduracion']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "citanula")
      {
          nm_limpa_numero($this->citanula, $this->field_config['citanula']['symbol_grp']) ; 
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
      if ('' !== $this->citid || (!empty($format_fields) && isset($format_fields['citid'])))
      {
          nmgp_Form_Num_Val($this->citid, $this->field_config['citid']['symbol_grp'], $this->field_config['citid']['symbol_dec'], "0", "S", $this->field_config['citid']['format_neg'], "", "", "-", $this->field_config['citid']['symbol_fmt']) ; 
      }
      if ((!empty($this->citfecha) && 'null' != $this->citfecha) || (!empty($format_fields) && isset($format_fields['citfecha'])))
      {
          nm_volta_data($this->citfecha, $this->field_config['citfecha']['date_format']) ; 
          nmgp_Form_Datas($this->citfecha, $this->field_config['citfecha']['date_format'], $this->field_config['citfecha']['date_sep']) ;  
      }
      elseif ('null' == $this->citfecha || '' == $this->citfecha)
      {
          $this->citfecha = '';
      }
      if ((!empty($this->cithoraini) && 'null' != $this->cithoraini) || (!empty($format_fields) && isset($format_fields['cithoraini'])))
      {
          nm_volta_hora($this->cithoraini, $this->field_config['cithoraini']['date_format']) ; 
          nmgp_Form_Hora($this->cithoraini, $this->field_config['cithoraini']['date_format'], $this->field_config['cithoraini']['time_sep']) ;  
      }
      elseif ('null' == $this->cithoraini || '' == $this->cithoraini)
      {
          $this->cithoraini = '';
      }
      if ('' !== $this->citduracion || (!empty($format_fields) && isset($format_fields['citduracion'])))
      {
          nmgp_Form_Num_Val($this->citduracion, $this->field_config['citduracion']['symbol_grp'], $this->field_config['citduracion']['symbol_dec'], "0", "S", $this->field_config['citduracion']['format_neg'], "", "", "-", $this->field_config['citduracion']['symbol_fmt']) ; 
      }
      if ((!empty($this->cithorafin) && 'null' != $this->cithorafin) || (!empty($format_fields) && isset($format_fields['cithorafin'])))
      {
          nm_volta_hora($this->cithorafin, $this->field_config['cithorafin']['date_format']) ; 
          nmgp_Form_Hora($this->cithorafin, $this->field_config['cithorafin']['date_format'], $this->field_config['cithorafin']['time_sep']) ;  
      }
      elseif ('null' == $this->cithorafin || '' == $this->cithorafin)
      {
          $this->cithorafin = '';
      }
      if ($this->citrecurrinfo != '')
      {
          $tmpRecurInfo = json_decode($this->citrecurrinfo, true);
          if ($tmpRecurInfo['endin'] != '')
          {
              nm_volta_data($tmpRecurInfo['endin'], $this->field_config['__calendar_recur_info__']['date_format']);
              nmgp_Form_Datas($tmpRecurInfo['endin'], $this->field_config['__calendar_recur_info__']['date_format'], $this->field_config['__calendar_recur_info__']['date_sep']);
              $this->citrecurrinfo = json_encode($tmpRecurInfo);
          }
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
      $guarda_format_hora = $this->field_config['citfecha']['date_format'];
      if ($this->citfecha != "")  
      { 
          nm_conv_data($this->citfecha, $this->field_config['citfecha']['date_format']) ; 
          $this->citfecha_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->citfecha_hora = substr($this->citfecha_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->citfecha_hora = substr($this->citfecha_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->citfecha_hora = substr($this->citfecha_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->citfecha_hora = substr($this->citfecha_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->citfecha_hora = substr($this->citfecha_hora, 0, -4);
          }
      } 
      if ($this->citfecha == "" && $use_null)  
      { 
          $this->citfecha = "null" ; 
      } 
      $this->field_config['citfecha']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['cithoraini']['date_format'];
      if ($this->cithoraini != "")  
      { 
          $this->cithoraini_hora = $this->cithoraini;
          $this->cithoraini = "1900-01-01";
          nm_conv_hora($this->cithoraini_hora, $this->field_config['cithoraini']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->cithoraini_hora = substr($this->cithoraini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->cithoraini_hora = substr($this->cithoraini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->cithoraini_hora = substr($this->cithoraini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->cithoraini_hora = substr($this->cithoraini_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->cithoraini_hora = substr($this->cithoraini_hora, 0, -4);
          }
          $this->cithoraini = $this->cithoraini_hora;
      } 
      if ($this->cithoraini == "" && $use_null)  
      { 
          $this->cithoraini = "null" ; 
      } 
      $this->field_config['cithoraini']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['cithorafin']['date_format'];
      if ($this->cithorafin != "")  
      { 
          $this->cithorafin_hora = $this->cithorafin;
          $this->cithorafin = "1900-01-01";
          nm_conv_hora($this->cithorafin_hora, $this->field_config['cithorafin']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->cithorafin_hora = substr($this->cithorafin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->cithorafin_hora = substr($this->cithorafin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->cithorafin_hora = substr($this->cithorafin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->cithorafin_hora = substr($this->cithorafin_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->cithorafin_hora = substr($this->cithorafin_hora, 0, -4);
          }
          $this->cithorafin = $this->cithorafin_hora;
      } 
      if ($this->cithorafin == "" && $use_null)  
      { 
          $this->cithorafin = "null" ; 
      } 
      $this->field_config['cithorafin']['date_format'] = $guarda_format_hora;
      if ($this->hora_fin_mostrar != "")  
      {
      }
      if ($this->citrecurrinfo != '')
      {
          $tmpRecurInfo = json_decode($this->citrecurrinfo, true);
          if ($tmpRecurInfo['endin'] != '')
          {
              nm_conv_data($tmpRecurInfo['endin'], $this->field_config['__calendar_recur_info__']['date_format']);
              $this->citrecurrinfo = json_encode($tmpRecurInfo);
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
          $this->ajax_return_values_citid();
          $this->ajax_return_values_cittitulo();
          $this->ajax_return_values_citfecha();
          $this->ajax_return_values_agesecuen();
          $this->ajax_return_values_cithoraini();
          $this->ajax_return_values_citduracion();
          $this->ajax_return_values_cithorafin();
          $this->ajax_return_values_hora_fin_mostrar();
          $this->ajax_return_values_citfactur();
          $this->ajax_return_values_info_documento();
          $this->ajax_return_values_fclnumero();
          $this->ajax_return_values_paciente_nuevo();
          $this->ajax_return_values_cittipo();
          $this->ajax_return_values_label_ficha();
          $this->ajax_return_values_ficha_cliente();
          $this->ajax_return_values_editar_cita();
          $this->ajax_return_values_citcolor();
          $this->ajax_return_values_prenumero();
          $this->ajax_return_values_nombre_presupuesto();
          $this->ajax_return_values_editar_presup();
          $this->ajax_return_values_info_documento_2();
          $this->ajax_return_values_citobserv();
          $this->ajax_return_values_cancelar_cita();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['citid']['keyVal'] = calendar_cita_mob_pack_protect_string($this->nmgp_dados_form['citid']);
          }
   } // ajax_return_values

          //----- citid
   function ajax_return_values_citid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("citid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->citid);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['citid'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("citid", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- cittitulo
   function ajax_return_values_cittitulo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cittitulo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cittitulo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cittitulo'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("cittitulo", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- citfecha
   function ajax_return_values_citfecha($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("citfecha", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->citfecha);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['citfecha'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- agesecuen
   function ajax_return_values_agesecuen($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agesecuen", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agesecuen);
              $aLookup = array();
              $this->_tmp_lookup_agesecuen = $this->agesecuen;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_agesecuen']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_agesecuen'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_agesecuen']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_agesecuen'] = array(); 
}
$aLookup[] = array(calendar_cita_mob_pack_protect_string('') => str_replace('<', '&lt;',calendar_cita_mob_pack_protect_string('------------------------')));
$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_agesecuen'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_citid = $this->citid;
   $old_value_citfecha = $this->citfecha;
   $old_value_cithoraini = $this->cithoraini;
   $old_value_citduracion = $this->citduracion;
   $old_value_cithorafin = $this->cithorafin;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_citid = $this->citid;
   $unformatted_value_citfecha = $this->citfecha;
   $unformatted_value_cithoraini = $this->cithoraini;
   $unformatted_value_citduracion = $this->citduracion;
   $unformatted_value_cithorafin = $this->cithorafin;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT A.agesecuen, A.agenombre + ' - ' + M.medapellidos + ' ' + M.mednombres  FROM agenda A, medico M where A.medcodigo=M.medcodigo and A.ageactivo=1 ORDER BY A.agenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT A.agesecuen, concat(A.agenombre,' - ',M.medapellidos,' ',M.mednombres)  FROM agenda A, medico M where A.medcodigo=M.medcodigo and A.ageactivo=1 ORDER BY A.agenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT A.agesecuen, A.agenombre&' - '&M.medapellidos&' '&M.mednombres  FROM agenda A, medico M where A.medcodigo=M.medcodigo and A.ageactivo=1 ORDER BY A.agenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT A.agesecuen, A.agenombre||' - '||M.medapellidos||' '||M.mednombres  FROM agenda A, medico M where A.medcodigo=M.medcodigo and A.ageactivo=1 ORDER BY A.agenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT A.agesecuen, A.agenombre + ' - ' + M.medapellidos + ' ' + M.mednombres  FROM agenda A, medico M where A.medcodigo=M.medcodigo and A.ageactivo=1 ORDER BY A.agenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT A.agesecuen, A.agenombre||' - '||M.medapellidos||' '||M.mednombres  FROM agenda A, medico M where A.medcodigo=M.medcodigo and A.ageactivo=1 ORDER BY A.agenombre";
   }
   else
   {
       $nm_comando = "SELECT A.agesecuen, A.agenombre||' - '||M.medapellidos||' '||M.mednombres  FROM agenda A, medico M where A.medcodigo=M.medcodigo and A.ageactivo=1 ORDER BY A.agenombre";
   }

   $this->citid = $old_value_citid;
   $this->citfecha = $old_value_citfecha;
   $this->cithoraini = $old_value_cithoraini;
   $this->citduracion = $old_value_citduracion;
   $this->cithorafin = $old_value_cithorafin;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(calendar_cita_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', calendar_cita_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_agesecuen'][] = $rs->fields[0];
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
          $sSelComp = "name=\"agesecuen\"";
          if (isset($this->NM_ajax_info['select_html']['agesecuen']) && !empty($this->NM_ajax_info['select_html']['agesecuen']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['agesecuen'];
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

                  if ($this->agesecuen == $sValue)
                  {
                      $this->_tmp_lookup_agesecuen = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['agesecuen'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['agesecuen']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['agesecuen']['valList'][$i] = calendar_cita_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['agesecuen']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['agesecuen']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['agesecuen']['labList'] = $aLabel;
          }
   }

          //----- cithoraini
   function ajax_return_values_cithoraini($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cithoraini", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cithoraini);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cithoraini'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- citduracion
   function ajax_return_values_citduracion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("citduracion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->citduracion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['citduracion'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- cithorafin
   function ajax_return_values_cithorafin($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cithorafin", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cithorafin);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cithorafin'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- hora_fin_mostrar
   function ajax_return_values_hora_fin_mostrar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("hora_fin_mostrar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->hora_fin_mostrar);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['hora_fin_mostrar'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- citfactur
   function ajax_return_values_citfactur($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("citfactur", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->citfactur);
              $aLookup = array();
              $this->_tmp_lookup_citfactur = $this->citfactur;

$aLookup[] = array(calendar_cita_mob_pack_protect_string('0') => str_replace('<', '&lt;',calendar_cita_mob_pack_protect_string("NO PROCESADA")));
$aLookup[] = array(calendar_cita_mob_pack_protect_string('1') => str_replace('<', '&lt;',calendar_cita_mob_pack_protect_string("FACTURADA")));
$aLookup[] = array(calendar_cita_mob_pack_protect_string('2') => str_replace('<', '&lt;',calendar_cita_mob_pack_protect_string("ORDEN DE TRAB. GENERADA")));
$aLookup[] = array(calendar_cita_mob_pack_protect_string('3') => str_replace('<', '&lt;',calendar_cita_mob_pack_protect_string("CANCELADA POR CL�NICA")));
$aLookup[] = array(calendar_cita_mob_pack_protect_string('4') => str_replace('<', '&lt;',calendar_cita_mob_pack_protect_string("CANCELADA POR PACIENTE")));
$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_citfactur'][] = '0';
$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_citfactur'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_citfactur'][] = '2';
$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_citfactur'][] = '3';
$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_citfactur'][] = '4';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"citfactur\"";
          if (isset($this->NM_ajax_info['select_html']['citfactur']) && !empty($this->NM_ajax_info['select_html']['citfactur']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['citfactur'];
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

                  if ($this->citfactur == $sValue)
                  {
                      $this->_tmp_lookup_citfactur = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $Nm_tp_obj = (isset($this->nmgp_refresh_fields) && in_array("citfactur", $this->nmgp_refresh_fields)) ? 'select' : 'text';
          $this->NM_ajax_info['fldList']['citfactur'] = array(
                       'row'    => '',
               'type'    => $Nm_tp_obj,
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['citfactur']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['citfactur']['valList'][$i] = calendar_cita_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['citfactur']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['citfactur']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['citfactur']['labList'] = $aLabel;
          }
   }

          //----- info_documento
   function ajax_return_values_info_documento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("info_documento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->info_documento);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['info_documento'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- fclnumero
   function ajax_return_values_fclnumero($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclnumero", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclnumero);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fclnumero'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
              $orig_fclnumero = $this->fclnumero;
              $fclnumero      = $this->fclnumero;
              $this->fclnumero = $fclnumero;
              $this->lookup_fclnumero($conteudo);
              $this->fclnumero = $orig_fclnumero;
              $this->NM_ajax_info['fldList']['fclnumero']['lookupCons'] = calendar_cita_mob_pack_protect_string(NM_charset_to_utf8($conteudo));
          }
   }

          //----- paciente_nuevo
   function ajax_return_values_paciente_nuevo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("paciente_nuevo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->paciente_nuevo);
              $aLookup = array();
              $this->_tmp_lookup_paciente_nuevo = $this->paciente_nuevo;

$aLookup[] = array(calendar_cita_mob_pack_protect_string('1') => str_replace('<', '&lt;',calendar_cita_mob_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_paciente_nuevo'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['paciente_nuevo']) && !empty($this->NM_ajax_info['select_html']['paciente_nuevo']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['paciente_nuevo'];
          }
          $this->NM_ajax_info['fldList']['paciente_nuevo'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-paciente_nuevo',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['paciente_nuevo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['paciente_nuevo']['valList'][$i] = calendar_cita_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['paciente_nuevo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['paciente_nuevo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['paciente_nuevo']['labList'] = $aLabel;
          }
   }

          //----- cittipo
   function ajax_return_values_cittipo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cittipo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cittipo);
              $aLookup = array();
              $this->_tmp_lookup_cittipo = $this->cittipo;

$aLookup[] = array(calendar_cita_mob_pack_protect_string('D') => str_replace('<', '&lt;',calendar_cita_mob_pack_protect_string("DIAGN�STICO")));
$aLookup[] = array(calendar_cita_mob_pack_protect_string('P') => str_replace('<', '&lt;',calendar_cita_mob_pack_protect_string("PROGRAMADO")));
$aLookup[] = array(calendar_cita_mob_pack_protect_string('C') => str_replace('<', '&lt;',calendar_cita_mob_pack_protect_string("CONTROL")));
$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_cittipo'][] = 'D';
$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_cittipo'][] = 'P';
$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_cittipo'][] = 'C';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"cittipo\"";
          if (isset($this->NM_ajax_info['select_html']['cittipo']) && !empty($this->NM_ajax_info['select_html']['cittipo']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['cittipo'];
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

                  if ($this->cittipo == $sValue)
                  {
                      $this->_tmp_lookup_cittipo = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $Nm_tp_obj = (isset($this->nmgp_refresh_fields) && in_array("cittipo", $this->nmgp_refresh_fields)) ? 'select' : 'text';
          $this->NM_ajax_info['fldList']['cittipo'] = array(
                       'row'    => '',
               'type'    => $Nm_tp_obj,
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['cittipo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['cittipo']['valList'][$i] = calendar_cita_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['cittipo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['cittipo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['cittipo']['labList'] = $aLabel;
          }
   }

          //----- label_ficha
   function ajax_return_values_label_ficha($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("label_ficha", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->label_ficha);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['label_ficha'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- ficha_cliente
   function ajax_return_values_ficha_cliente($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ficha_cliente", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ficha_cliente);
              $aLookup = array();
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__folder_blue_32.png"))
          { 
              $ficha_cliente = "&nbsp;" ;  
          } 
          else 
          { 
              $ficha_cliente = "<img border=\"0\" src=\"" . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__folder_blue_32.png\"/>" ; 
          } 
    $sTmpImgHtml = "<a href=\"javascript:nm_gp_submit('" . $this->Ini->link_form_ficha_cliente_edit . "', '$this->nm_location', 'fclnumero*scin" . $this->nmgp_dados_form['fclnumero'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout', '', '_blank', '0', '0', 'form_ficha_cliente')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $ficha_cliente . "</font></a>";
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ficha_cliente'] = array(
                       'row'    => '',
               'type'    => 'imagehtml',
               'valList' => array($sTmpValue),
               'imgHtml' => $sTmpImgHtml,
              );
          }
   }

          //----- editar_cita
   function ajax_return_values_editar_cita($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("editar_cita", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->editar_cita);
              $aLookup = array();
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__console_network_32.png"))
          { 
              $editar_cita = "&nbsp;" ;  
          } 
          else 
          { 
              $editar_cita = "<img border=\"0\" src=\"" . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__console_network_32.png\"/>" ; 
          } 
    $sTmpImgHtml = "<a href=\"javascript:nm_gp_submit('" . $this->Ini->link_form_cita_edit . "', '$this->nm_location', 'citid*scin" . $this->nmgp_dados_form['citid'] . "*scoutvar_docum*scin" . $this->nmgp_dados_form['info_documento_2'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout', '', '_self', '0', '0', 'form_cita')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $editar_cita . "</font></a>";
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['editar_cita'] = array(
                       'row'    => '',
               'type'    => 'imagehtml',
               'valList' => array($sTmpValue),
               'imgHtml' => $sTmpImgHtml,
              );
          }
   }

          //----- citcolor
   function ajax_return_values_citcolor($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("citcolor", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->citcolor);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['citcolor'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- prenumero
   function ajax_return_values_prenumero($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("prenumero", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->prenumero);
              $aLookup = array();
              $this->_tmp_lookup_prenumero = $this->prenumero;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_prenumero']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_prenumero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_prenumero']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_prenumero'] = array(); 
}
$aLookup[] = array(calendar_cita_mob_pack_protect_string('null') => str_replace('<', '&lt;',calendar_cita_mob_pack_protect_string('------------------------')));
$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_prenumero'][] = 'null';
if ($this->fclnumero != "")
{ 
   $this->nm_clear_val("fclnumero");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_citid = $this->citid;
   $old_value_citfecha = $this->citfecha;
   $old_value_cithoraini = $this->cithoraini;
   $old_value_citduracion = $this->citduracion;
   $old_value_cithorafin = $this->cithorafin;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_citid = $this->citid;
   $unformatted_value_citfecha = $this->citfecha;
   $unformatted_value_cithoraini = $this->cithoraini;
   $unformatted_value_citduracion = $this->citduracion;
   $unformatted_value_cithorafin = $this->cithorafin;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT prenumero, prenumero + ' - ' + prenombre  FROM presupuesto  WHERE fclnumero=$this->fclnumero AND preestado<>'T' ORDER BY prenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT prenumero, concat(prenumero,' - ',prenombre)  FROM presupuesto  WHERE fclnumero=$this->fclnumero AND preestado<>'T' ORDER BY prenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT prenumero, prenumero&' - '&prenombre  FROM presupuesto  WHERE fclnumero=$this->fclnumero AND preestado<>'T' ORDER BY prenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT prenumero, prenumero||' - '||prenombre  FROM presupuesto  WHERE fclnumero=$this->fclnumero AND preestado<>'T' ORDER BY prenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT prenumero, convert(char,prenumero) + ' - ' + prenombre  FROM presupuesto  WHERE fclnumero=$this->fclnumero AND preestado<>'T' ORDER BY prenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT prenumero, char(prenumero)||' - '||prenombre  FROM presupuesto  WHERE fclnumero=$this->fclnumero AND preestado<>'T' ORDER BY prenombre";
   }
   else
   {
       $nm_comando = "SELECT prenumero, prenumero||' - '||prenombre  FROM presupuesto  WHERE fclnumero=$this->fclnumero AND preestado<>'T' ORDER BY prenombre";
   }

   $this->citid = $old_value_citid;
   $this->citfecha = $old_value_citfecha;
   $this->cithoraini = $old_value_cithoraini;
   $this->citduracion = $old_value_citduracion;
   $this->cithorafin = $old_value_cithorafin;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(calendar_cita_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', calendar_cita_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_prenumero'][] = $rs->fields[0];
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
} 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"prenumero\"";
          if (isset($this->NM_ajax_info['select_html']['prenumero']) && !empty($this->NM_ajax_info['select_html']['prenumero']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['prenumero'];
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

                  if ($this->prenumero == $sValue)
                  {
                      $this->_tmp_lookup_prenumero = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['prenumero'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['prenumero']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['prenumero']['valList'][$i] = calendar_cita_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['prenumero']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['prenumero']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['prenumero']['labList'] = $aLabel;
          }
   }

          //----- nombre_presupuesto
   function ajax_return_values_nombre_presupuesto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nombre_presupuesto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nombre_presupuesto);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nombre_presupuesto'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("nombre_presupuesto", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- editar_presup
   function ajax_return_values_editar_presup($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("editar_presup", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->editar_presup);
              $aLookup = array();
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__notebook_edit_32.png"))
          { 
              $editar_presup = "&nbsp;" ;  
          } 
          else 
          { 
              $editar_presup = "<img border=\"0\" src=\"" . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__notebook_edit_32.png\"/>" ; 
          } 
    $sTmpImgHtml = "<a href=\"javascript:nm_gp_submit('" . $this->Ini->link_form_presupuesto_edit . "', '$this->nm_location', 'prenumero*scin" . $this->nmgp_dados_form['prenumero'] . "*scoutv_selected_cli*scin" . $this->nmgp_dados_form['fclnumero'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout', '', '_blank', '0', '0', 'form_presupuesto')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $editar_presup . "</font></a>";
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['editar_presup'] = array(
                       'row'    => '',
               'type'    => 'imagehtml',
               'valList' => array($sTmpValue),
               'imgHtml' => $sTmpImgHtml,
              );
          }
   }

          //----- info_documento_2
   function ajax_return_values_info_documento_2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("info_documento_2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->info_documento_2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['info_documento_2'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- citobserv
   function ajax_return_values_citobserv($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("citobserv", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->citobserv);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['citobserv'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cancelar_cita
   function ajax_return_values_cancelar_cita($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cancelar_cita", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cancelar_cita);
              $aLookup = array();
              $this->_tmp_lookup_cancelar_cita = $this->cancelar_cita;

$aLookup[] = array(calendar_cita_mob_pack_protect_string('CLIN') => str_replace('<', '&lt;',calendar_cita_mob_pack_protect_string("CANCELA CL�NICA")));
$aLookup[] = array(calendar_cita_mob_pack_protect_string('CLIE') => str_replace('<', '&lt;',calendar_cita_mob_pack_protect_string("CANCELA PACIENTE")));
$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_cancelar_cita'][] = 'CLIN';
$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_cancelar_cita'][] = 'CLIE';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"cancelar_cita\"";
          if (isset($this->NM_ajax_info['select_html']['cancelar_cita']) && !empty($this->NM_ajax_info['select_html']['cancelar_cita']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['cancelar_cita'];
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

                  if ($this->cancelar_cita == $sValue)
                  {
                      $this->_tmp_lookup_cancelar_cita = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['cancelar_cita'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['cancelar_cita']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['cancelar_cita']['valList'][$i] = calendar_cita_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['cancelar_cita']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['cancelar_cita']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['cancelar_cita']['labList'] = $aLabel;
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['upload_dir'][$fieldName][] = $newName;
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
      if ($this->sc_evento == "novo" || $this->sc_evento == "incluir" || ($this->nmgp_opcao == "nada" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['opc_ant']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['opc_ant'] == "novo") || (isset($GLOBALS['erro_incl']) && 1 == $GLOBALS['erro_incl']))
      {
          if (!isset($this->nmgp_cmp_hidden["citid"]))
          {
              $this->nmgp_cmp_hidden["citid"] = "off"; $this->NM_ajax_info['fieldDisplay']['citid'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["citfactur"]))
          {
              $this->nmgp_cmp_hidden["citfactur"] = "off"; $this->NM_ajax_info['fieldDisplay']['citfactur'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["editar_cita"]))
          {
              $this->nmgp_cmp_hidden["editar_cita"] = "off"; $this->NM_ajax_info['fieldDisplay']['editar_cita'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["editar_presup"]))
          {
              $this->nmgp_cmp_hidden["editar_presup"] = "off"; $this->NM_ajax_info['fieldDisplay']['editar_presup'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["ficha_cliente"]))
          {
              $this->nmgp_cmp_hidden["ficha_cliente"] = "off"; $this->NM_ajax_info['fieldDisplay']['ficha_cliente'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["label_ficha"]))
          {
              $this->nmgp_cmp_hidden["label_ficha"] = "off"; $this->NM_ajax_info['fieldDisplay']['label_ficha'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["cancelar_cita"]))
          {
              $this->nmgp_cmp_hidden["cancelar_cita"] = "off"; $this->NM_ajax_info['fieldDisplay']['cancelar_cita'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["nombre_presupuesto"]))
          {
              $this->nmgp_cmp_hidden["nombre_presupuesto"] = "off"; $this->NM_ajax_info['fieldDisplay']['nombre_presupuesto'] = 'off';
          }
      }
      else
      {
          if (!isset($this->nmgp_cmp_hidden["prenumero"]))
          {
              $this->nmgp_cmp_hidden["prenumero"] = "off"; $this->NM_ajax_info['fieldDisplay']['prenumero'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["paciente_nuevo"]))
          {
              $this->nmgp_cmp_hidden["paciente_nuevo"] = "off"; $this->NM_ajax_info['fieldDisplay']['paciente_nuevo'] = 'off';
          }
      }
      if ('calendar' != $this->nmgp_opcao) {
          if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
          $_SESSION['scriptcase']['calendar_cita_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cancelar_cita = $this->cancelar_cita;
    $original_citduracion = $this->citduracion;
    $original_citfactur = $this->citfactur;
    $original_cithoraini = $this->cithoraini;
    $original_citid = $this->citid;
    $original_cittipo = $this->cittipo;
    $original_editar_cita = $this->editar_cita;
    $original_editar_presup = $this->editar_presup;
    $original_hora_fin_mostrar = $this->hora_fin_mostrar;
    $original_info_documento = $this->info_documento;
    $original_info_documento_2 = $this->info_documento_2;
    $original_nombre_presupuesto = $this->nombre_presupuesto;
    $original_prenumero = $this->prenumero;
}
  $this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "off";;

if(isset($this->citduracion ) && !empty($this->citduracion )) {
	$endTime = strtotime("+".$this->citduracion ." minutes", strtotime($this->cithoraini ));
	$this->hora_fin_mostrar =date('H:i', $endTime);
	
	
}

if($this->cittipo =='D' || $this->cittipo =="") {
	
	$this->nmgp_cmp_hidden["prenumero"] = "off"; $this->NM_ajax_info['fieldDisplay']['prenumero'] = 'off';
}

else {
	$this->nmgp_cmp_hidden["prenumero"] = "on"; $this->NM_ajax_info['fieldDisplay']['prenumero'] = 'on';
	
}


if($this->sc_evento != "novo") {
	
	$this->nmgp_cmp_hidden["prenumero"] = "off"; $this->NM_ajax_info['fieldDisplay']['prenumero'] = 'off';
	
	if($this->cittipo =='D' && isset($this->citid ) && !empty($this->citid )) {
	
		$this->nmgp_cmp_hidden["editar_presup"] = "off"; $this->NM_ajax_info['fieldDisplay']['editar_presup'] = 'off';
		
	}
	
	if(($this->cittipo =='P' || $this->cittipo =='C')  && isset($this->citid ) && !empty($this->citid )) {

		
		$this->nmgp_cmp_hidden["editar_presup"] = "on"; $this->NM_ajax_info['fieldDisplay']['editar_presup'] = 'on';
	}
	
	if($this->citfactur ==3 || $this->citfactur ==4) {
		$this->nmgp_cmp_hidden["editar_cita"] = "off"; $this->NM_ajax_info['fieldDisplay']['editar_cita'] = 'off';	
		$this->nmgp_cmp_hidden["cancelar_cita"] = "off"; $this->NM_ajax_info['fieldDisplay']['cancelar_cita'] = 'off';	
		$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "off";;	
		
	}
	
	if($this->citfactur ==1 || $this->citfactur ==2) {
		
		$this->nmgp_cmp_hidden["cancelar_cita"] = "off"; $this->NM_ajax_info['fieldDisplay']['cancelar_cita'] = 'off';	
		$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "off";;	
		
		
		if($this->citfactur ==1) {
			
			$sql="select concat(F.ESTAB, '-',F.PTOEMI,'-' ,F.SECUENCIAL,' ',F.RAZONSOCIAL) as documento from FACTURA F, FACTURA_FLAGS FF where F.ESTAB=FF.ESTAB AND F.PTOEMI=FF.PTOEMI AND F.SECUENCIAL=FF.SECUENCIAL AND F.LOTE=FF.LOTE AND FF.AUTORIZADO<2 AND F.num_cita=".$this->citid ;
			 
      $nm_select = $sql; 
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
				
				$this->info_documento =$this->rs[0][0];
				$this->info_documento_2 ="FAC. ".$this->rs[0][0];
			}
		}
		
		if($this->citfactur ==2) {
			
			$sql="select concat(ESTAB, '-',PTOEMI,'-' ,SECUENCIAL,' ',RAZONSOCIAL) as documento from orden_trabajo where num_cita=".$this->citid ;
			 
      $nm_select = $sql; 
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
				
				$this->info_documento =$this->rs[0][0];
				$this->info_documento_2 ="O.T. ".$this->rs[0][0];
			}
		}
		
		
	}
	
	$sql333="SELECT prenumero, concat(prenumero,' - ',prenombre) 
FROM presupuesto 
WHERE prenumero=".$this->prenumero ;
	 
      $nm_select = $sql333; 
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
	
	$this->nombre_presupuesto =$this->ds[0][1];
	
	
	
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cancelar_cita != $this->cancelar_cita || (isset($bFlagRead_cancelar_cita) && $bFlagRead_cancelar_cita)))
    {
        $this->ajax_return_values_cancelar_cita(true);
    }
    if (($original_citduracion != $this->citduracion || (isset($bFlagRead_citduracion) && $bFlagRead_citduracion)))
    {
        $this->ajax_return_values_citduracion(true);
    }
    if (($original_citfactur != $this->citfactur || (isset($bFlagRead_citfactur) && $bFlagRead_citfactur)))
    {
        $this->ajax_return_values_citfactur(true);
    }
    if (($original_cithoraini != $this->cithoraini || (isset($bFlagRead_cithoraini) && $bFlagRead_cithoraini)))
    {
        $this->ajax_return_values_cithoraini(true);
    }
    if (($original_citid != $this->citid || (isset($bFlagRead_citid) && $bFlagRead_citid)))
    {
        $this->ajax_return_values_citid(true);
    }
    if (($original_cittipo != $this->cittipo || (isset($bFlagRead_cittipo) && $bFlagRead_cittipo)))
    {
        $this->ajax_return_values_cittipo(true);
    }
    if (($original_editar_cita != $this->editar_cita || (isset($bFlagRead_editar_cita) && $bFlagRead_editar_cita)))
    {
        $this->ajax_return_values_editar_cita(true);
    }
    if (($original_editar_presup != $this->editar_presup || (isset($bFlagRead_editar_presup) && $bFlagRead_editar_presup)))
    {
        $this->ajax_return_values_editar_presup(true);
    }
    if (($original_hora_fin_mostrar != $this->hora_fin_mostrar || (isset($bFlagRead_hora_fin_mostrar) && $bFlagRead_hora_fin_mostrar)))
    {
        $this->ajax_return_values_hora_fin_mostrar(true);
    }
    if (($original_info_documento != $this->info_documento || (isset($bFlagRead_info_documento) && $bFlagRead_info_documento)))
    {
        $this->ajax_return_values_info_documento(true);
    }
    if (($original_info_documento_2 != $this->info_documento_2 || (isset($bFlagRead_info_documento_2) && $bFlagRead_info_documento_2)))
    {
        $this->ajax_return_values_info_documento_2(true);
    }
    if (($original_nombre_presupuesto != $this->nombre_presupuesto || (isset($bFlagRead_nombre_presupuesto) && $bFlagRead_nombre_presupuesto)))
    {
        $this->ajax_return_values_nombre_presupuesto(true);
    }
    if (($original_prenumero != $this->prenumero || (isset($bFlagRead_prenumero) && $bFlagRead_prenumero)))
    {
        $this->ajax_return_values_prenumero(true);
    }
}
$_SESSION['scriptcase']['calendar_cita_mob']['contr_erro'] = 'off'; 
          }
          if (empty($this->citfeccrea))
          {
              $this->citfeccrea_hora = $this->citfeccrea;
          }
          if (empty($this->citfecmodi))
          {
              $this->citfecmodi_hora = $this->citfecmodi;
          }
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
    if ("incluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['calendar_cita_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_agesecuen = $this->agesecuen;
    $original_citfecha = $this->citfecha;
    $original_cithorafin = $this->cithorafin;
    $original_cithoraini = $this->cithoraini;
    $original_cittipo = $this->cittipo;
    $original_cittitulo = $this->cittitulo;
    $original_fclnumero = $this->fclnumero;
    $original_paciente_nuevo = $this->paciente_nuevo;
    $original_prenumero = $this->prenumero;
}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
if (!isset($this->sc_temp_v_mincodigoficha)) {$this->sc_temp_v_mincodigoficha = (isset($_SESSION['v_mincodigoficha'])) ? $_SESSION['v_mincodigoficha'] : "";}
  $error_test    = $this->cithorafin  <= $this->cithoraini ;    
$error_message = 'La hora fin debe ser mayor a la hora inicio'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$dayofweek = date('N', strtotime($this->citfecha ));

$sql="SELECT agelunactivo, agemaractivo, agemieactivo, agejueactivo, agevieactivo, agesabactivo, agedomactivo, agelunini, agelunfin, agemarini, agemarfin, agemieini, agemiefin, agejueini, agejuefin, agevieini, ageviefin, agesabini, agesabfin, agedomini, agedomfin FROM agenda WHERE agesecuen=".$this->agesecuen ;
 
      $nm_select = $sql; 
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

$lunactivo=$this->rs[0][0];
$maractivo=$this->rs[0][1];
$mieactivo=$this->rs[0][2];
$jueactivo=$this->rs[0][3];
$vieactivo=$this->rs[0][4];
$sabactivo=$this->rs[0][5];
$domactivo=$this->rs[0][6];

$lunhoraini=$this->rs[0][7];
$marhoraini=$this->rs[0][9];
$miehoraini=$this->rs[0][11];
$juehoraini=$this->rs[0][13];
$viehoraini=$this->rs[0][15];
$sabhoraini=$this->rs[0][17];
$domhoraini=$this->rs[0][19];

$lunhorafin=$this->rs[0][8];
$marhorafin=$this->rs[0][10];
$miehorafin=$this->rs[0][12];
$juehorafin=$this->rs[0][14];
$viehorafin=$this->rs[0][16];
$sabhorafin=$this->rs[0][18];
$domhorafin=$this->rs[0][20];


$error_test    = ($dayofweek == 1 && $lunactivo==0);    
$error_message = 'El d�a de la semana para la fecha ingresada (lunes) no se encuentra activo en la agenda seleccionada.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($dayofweek == 2 && $maractivo==0);    
$error_message = 'El d�a de la semana para la fecha ingresada (martes) no se encuentra activo en la agenda seleccionada.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($dayofweek == 3 && $mieactivo==0);    
$error_message = 'El d�a de la semana para la fecha ingresada (mi�rcoles) no se encuentra activo en la agenda seleccionada.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($dayofweek == 4 && $jueactivo==0);    
$error_message = 'El d�a de la semana para la fecha ingresada (jueves) no se encuentra activo en la agenda seleccionada.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($dayofweek == 5 && $vieactivo==0);    
$error_message = 'El d�a de la semana para la fecha ingresada (viernes) no se encuentra activo en la agenda seleccionada.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($dayofweek == 6 && $sabactivo==0);    
$error_message = 'El d�a de la semana para la fecha ingresada (s�bado) no se encuentra activo en la agenda seleccionada.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}


$error_test    = ($dayofweek == 7 && $domactivo==0);    
$error_message = 'El d�a de la semana para la fecha ingresada (domingo) no se encuentra activo en la agenda seleccionada.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($dayofweek == 1 && $lunactivo==1 && (($this->cithoraini <$lunhoraini || $this->cithoraini >$lunhorafin) || ($this->cithorafin  < $lunhoraini ||  $this->cithorafin >$lunhorafin) ));    
$error_message = 'La hora inicio o fin est�n fuera del rango configurado en la agenda seleccionada para el d�a de la semana de la fecha ingresada (lunes).'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($dayofweek == 2 && $maractivo==1 && (($this->cithoraini <$marhoraini || $this->cithoraini >$marhorafin) || ($this->cithorafin  < $marhoraini ||  $this->cithorafin >$marhorafin) ));    
$error_message = 'La hora inicio o fin est�n fuera del rango configurado en la agenda seleccionada para el d�a de la semana de la fecha ingresada (martes).'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($dayofweek == 3 && $mieactivo==1 && (($this->cithoraini <$miehoraini || $this->cithoraini >$miehorafin) || ($this->cithorafin  < $miehoraini ||  $this->cithorafin >$miehorafin) ));    
$error_message = 'La hora inicio o fin est�n fuera del rango configurado en la agenda seleccionada para el d�a de la semana de la fecha ingresada (mi�rcoles).'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($dayofweek == 4 && $jueactivo==1 && (($this->cithoraini <$juehoraini || $this->cithoraini >$juehorafin) || ($this->cithorafin  < $juehoraini ||  $this->cithorafin >$juehorafin) ));    
$error_message = 'La hora inicio o fin est�n fuera del rango configurado en la agenda seleccionada para el d�a de la semana de la fecha ingresada (jueves).'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($dayofweek == 5 && $vieactivo==1 && (($this->cithoraini <$viehoraini || $this->cithoraini >$viehorafin) || ($this->cithorafin  < $viehoraini ||  $this->cithorafin >$viehorafin) ));    
$error_message = 'La hora inicio o fin est�n fuera del rango configurado en la agenda seleccionada para el d�a de la semana de la fecha ingresada (viernes).'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($dayofweek == 6 && $sabactivo==1 && (($this->cithoraini <$sabhoraini || $this->cithoraini >$sabhorafin) || ($this->cithorafin  < $sabhoraini ||  $this->cithorafin >$sabhorafin) ));    
$error_message = 'La hora inicio o fin est�n fuera del rango configurado en la agenda seleccionada para el d�a de la semana de la fecha ingresada (s�bado).'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($dayofweek == 7 && $domactivo==1 && (($this->cithoraini <$domhoraini || $this->cithoraini >$domhorafin) || ($this->cithorafin  < $domhoraini ||  $this->cithorafin >$domhorafin) ));    
$error_message = 'La hora inicio o fin est�n fuera del rango configurado en la agenda seleccionada para el d�a de la semana de la fecha ingresada (domingo).'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}


$sql2="select cithoraini, cithorafin, cittitulo from cita where agesecuen=".$this->agesecuen ." and citfecha='".$this->citfecha ."' and citanula=0 and citfactur<3";
 
      $nm_select = $sql2; 
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


foreach($this->ds  as $horario) {
	
	$error_test    = (($this->cithoraini  >= $horario[0] && $this->cithoraini  < $horario[1]) || ($this->cithorafin  > $horario[0] &&  $this->cithorafin  <= $horario[1]));    
	$error_message = 'El horario se cruza con la cita '.$horario[2].' programada de '.substr($horario[0],0,5)." a ".substr($horario[1],0,5); 

	if ($error_test)
	{
		
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
	}
	
}



$sql2="select cithoraini, cithorafin, cittitulo from cita where fclnumero=".$this->fclnumero ." and citfecha='".$this->citfecha ."' and citanula=0 and citfactur<3";
 
      $nm_select = $sql2; 
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


foreach($this->ds  as $horario) {
	
	$error_test    = (($this->cithoraini  >= $horario[0] && $this->cithoraini  < $horario[1]) || ($this->cithorafin  > $horario[0] &&  $this->cithorafin  <= $horario[1]));    
	$error_message = 'El paciente ya tiene una cita programada de '.substr($horario[0],0,5)." a ".substr($horario[1],0,5); 

	if ($error_test)
	{
		
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
	}
	
}


if($this->cittipo =="D" || $this->cittipo =="") {
	
   $this->prenumero 	= 'NULL';

}


if($this->paciente_nuevo ==1) {
	
	$select="SELECT MAX(fclnumero) FROM ficha_cliente where fclnumero>=".$this->sc_temp_v_mincodigoficha;
	 
      $nm_select = $select; 
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

	if(isset($this->ds[0][0])) {

		$this->fclnumero 	= $this->ds[0][0]+1;

	}

	else {

		$this->fclnumero  = $this->sc_temp_v_mincodigoficha;
	}
	
	$insert_paciente="INSERT INTO ficha_cliente (fclnumero, fclnombres, fclapellidos, fclfechareg, fclusucrea, fclfeccrea,fclactivo) VALUES (".$this->fclnumero .",'NUEVO','PACIENTE','".date('Y-m-d')."','".$this->sc_temp_usr_login."','".date('Y-m-d H:i:s')."',1)";
	
     $nm_select = $insert_paciente; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                calendar_cita_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	
	
}


$sql="select fclapellidos, fclnombres, fclcelular from ficha_cliente where fclnumero=".$this->fclnumero ;
 
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

$this->cittitulo =$this->fclnumero ."-".$this->ds[0][0]." ".$this->ds[0][1]." (".$this->ds[0][2].")";
if (isset($this->sc_temp_v_mincodigoficha)) { $_SESSION['v_mincodigoficha'] = $this->sc_temp_v_mincodigoficha;}
if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_agesecuen != $this->agesecuen || (isset($bFlagRead_agesecuen) && $bFlagRead_agesecuen)))
    {
        $this->ajax_return_values_agesecuen(true);
    }
    if (($original_citfecha != $this->citfecha || (isset($bFlagRead_citfecha) && $bFlagRead_citfecha)))
    {
        $this->ajax_return_values_citfecha(true);
    }
    if (($original_cithorafin != $this->cithorafin || (isset($bFlagRead_cithorafin) && $bFlagRead_cithorafin)))
    {
        $this->ajax_return_values_cithorafin(true);
    }
    if (($original_cithoraini != $this->cithoraini || (isset($bFlagRead_cithoraini) && $bFlagRead_cithoraini)))
    {
        $this->ajax_return_values_cithoraini(true);
    }
    if (($original_cittipo != $this->cittipo || (isset($bFlagRead_cittipo) && $bFlagRead_cittipo)))
    {
        $this->ajax_return_values_cittipo(true);
    }
    if (($original_cittitulo != $this->cittitulo || (isset($bFlagRead_cittitulo) && $bFlagRead_cittitulo)))
    {
        $this->ajax_return_values_cittitulo(true);
    }
    if (($original_fclnumero != $this->fclnumero || (isset($bFlagRead_fclnumero) && $bFlagRead_fclnumero)))
    {
        $this->ajax_return_values_fclnumero(true);
    }
    if (($original_paciente_nuevo != $this->paciente_nuevo || (isset($bFlagRead_paciente_nuevo) && $bFlagRead_paciente_nuevo)))
    {
        $this->ajax_return_values_paciente_nuevo(true);
    }
    if (($original_prenumero != $this->prenumero || (isset($bFlagRead_prenumero) && $bFlagRead_prenumero)))
    {
        $this->ajax_return_values_prenumero(true);
    }
}
$_SESSION['scriptcase']['calendar_cita_mob']['contr_erro'] = 'off'; 
    }
    if ("alterar" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['calendar_cita_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_agesecuen = $this->agesecuen;
    $original_citduracion = $this->citduracion;
    $original_citfecha = $this->citfecha;
    $original_cithorafin = $this->cithorafin;
    $original_cithoraini = $this->cithoraini;
    $original_citid = $this->citid;
    $original_cittipo = $this->cittipo;
    $original_fclnumero = $this->fclnumero;
    $original_prenumero = $this->prenumero;
}
  $error_test    = $this->cithorafin  <= $this->cithoraini ;    
$error_message = 'La hora fin debe ser mayor a la hora inicio'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$dayofweek = date('N', strtotime($this->citfecha ));

$sql="SELECT agelunactivo, agemaractivo, agemieactivo, agejueactivo, agevieactivo, agesabactivo, agedomactivo, agelunini, agelunfin, agemarini, agemarfin, agemieini, agemiefin, agejueini, agejuefin, agevieini, ageviefin, agesabini, agesabfin, agedomini, agedomfin FROM agenda WHERE agesecuen=".$this->agesecuen ;
 
      $nm_select = $sql; 
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

$lunactivo=$this->rs[0][0];
$maractivo=$this->rs[0][1];
$mieactivo=$this->rs[0][2];
$jueactivo=$this->rs[0][3];
$vieactivo=$this->rs[0][4];
$sabactivo=$this->rs[0][5];
$domactivo=$this->rs[0][6];

$lunhoraini=$this->rs[0][7];
$marhoraini=$this->rs[0][9];
$miehoraini=$this->rs[0][11];
$juehoraini=$this->rs[0][13];
$viehoraini=$this->rs[0][15];
$sabhoraini=$this->rs[0][17];
$domhoraini=$this->rs[0][19];

$lunhorafin=$this->rs[0][8];
$marhorafin=$this->rs[0][10];
$miehorafin=$this->rs[0][12];
$juehorafin=$this->rs[0][14];
$viehorafin=$this->rs[0][16];
$sabhorafin=$this->rs[0][18];
$domhorafin=$this->rs[0][20];


$error_test    = ($dayofweek == 1 && $lunactivo==0);    
$error_message = 'El d�a de la semana para la fecha ingresada (lunes) no se encuentra activo en la agenda seleccionada.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($dayofweek == 2 && $maractivo==0);    
$error_message = 'El d�a de la semana para la fecha ingresada (martes) no se encuentra activo en la agenda seleccionada.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($dayofweek == 3 && $mieactivo==0);    
$error_message = 'El d�a de la semana para la fecha ingresada (mi�rcoles) no se encuentra activo en la agenda seleccionada.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($dayofweek == 4 && $jueactivo==0);    
$error_message = 'El d�a de la semana para la fecha ingresada (jueves) no se encuentra activo en la agenda seleccionada.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($dayofweek == 5 && $vieactivo==0);    
$error_message = 'El d�a de la semana para la fecha ingresada (viernes) no se encuentra activo en la agenda seleccionada.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($dayofweek == 6 && $sabactivo==0);    
$error_message = 'El d�a de la semana para la fecha ingresada (s�bado) no se encuentra activo en la agenda seleccionada.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}


$error_test    = ($dayofweek == 7 && $domactivo==0);    
$error_message = 'El d�a de la semana para la fecha ingresada (domingo) no se encuentra activo en la agenda seleccionada.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($dayofweek == 1 && $lunactivo==1 && (($this->cithoraini <$lunhoraini || $this->cithoraini >$lunhorafin) || ($this->cithorafin  < $lunhoraini ||  $this->cithorafin >$lunhorafin) ));    
$error_message = 'La hora inicio o fin est�n fuera del rango configurado en la agenda seleccionada para el d�a de la semana de la fecha ingresada (lunes).'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($dayofweek == 2 && $maractivo==1 && (($this->cithoraini <$marhoraini || $this->cithoraini >$marhorafin) || ($this->cithorafin  < $marhoraini ||  $this->cithorafin >$marhorafin) ));    
$error_message = 'La hora inicio o fin est�n fuera del rango configurado en la agenda seleccionada para el d�a de la semana de la fecha ingresada (martes).'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($dayofweek == 3 && $mieactivo==1 && (($this->cithoraini <$miehoraini || $this->cithoraini >$miehorafin) || ($this->cithorafin  < $miehoraini ||  $this->cithorafin >$miehorafin) ));    
$error_message = 'La hora inicio o fin est�n fuera del rango configurado en la agenda seleccionada para el d�a de la semana de la fecha ingresada (mi�rcoles).'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($dayofweek == 4 && $jueactivo==1 && (($this->cithoraini <$juehoraini || $this->cithoraini >$juehorafin) || ($this->cithorafin  < $juehoraini ||  $this->cithorafin >$juehorafin) ));    
$error_message = 'La hora inicio o fin est�n fuera del rango configurado en la agenda seleccionada para el d�a de la semana de la fecha ingresada (jueves).'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($dayofweek == 5 && $vieactivo==1 && (($this->cithoraini <$viehoraini || $this->cithoraini >$viehorafin) || ($this->cithorafin  < $viehoraini ||  $this->cithorafin >$viehorafin) ));    
$error_message = 'La hora inicio o fin est�n fuera del rango configurado en la agenda seleccionada para el d�a de la semana de la fecha ingresada (viernes).'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($dayofweek == 6 && $sabactivo==1 && (($this->cithoraini <$sabhoraini || $this->cithoraini >$sabhorafin) || ($this->cithorafin  < $sabhoraini ||  $this->cithorafin >$sabhorafin) ));    
$error_message = 'La hora inicio o fin est�n fuera del rango configurado en la agenda seleccionada para el d�a de la semana de la fecha ingresada (s�bado).'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($dayofweek == 7 && $domactivo==1 && (($this->cithoraini <$domhoraini || $this->cithoraini >$domhorafin) || ($this->cithorafin  < $domhoraini ||  $this->cithorafin >$domhorafin) ));    
$error_message = 'La hora inicio o fin est�n fuera del rango configurado en la agenda seleccionada para el d�a de la semana de la fecha ingresada (domingo).'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}


$sql2="select cithoraini, cithorafin, cittitulo from cita where agesecuen=".$this->agesecuen ." and citfecha='".$this->citfecha ."' and citanula=0 and citfactur<3 and citid<>".$this->citid ;
 
      $nm_select = $sql2; 
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


foreach($this->ds  as $horario) {
	
	$error_test    = (($this->cithoraini  >= $horario[0] && $this->cithoraini  < $horario[1]) || ($this->cithorafin  > $horario[0] &&  $this->cithorafin  <= $horario[1]));    
	$error_message = 'El horario se cruza con la cita '.$horario[2].' programada de '.substr($horario[0],0,5)." a ".substr($horario[1],0,5); 

	if ($error_test)
	{
		
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
	}
	
}



$sql2="select cithoraini, cithorafin, cittitulo from cita where fclnumero=".$this->fclnumero ." and citfecha='".$this->citfecha ."' and citanula=0 and citfactur<3 and citid<>".$this->citid ;
 
      $nm_select = $sql2; 
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


foreach($this->ds  as $horario) {
	
	$error_test    = (($this->cithoraini  >= $horario[0] && $this->cithoraini  < $horario[1]) || ($this->cithorafin  > $horario[0] &&  $this->cithorafin  <= $horario[1]));    
	$error_message = 'El paciente ya tiene una cita programada de '.substr($horario[0],0,5)." a ".substr($horario[1],0,5); 

	if ($error_test)
	{
		
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
	}
	
}


$sql3="select sum(serduracion) from servicio where sercodigo in (select sercodigo from detalle_citadiagnos where citid=".$this->citid .")";
 
      $nm_select = $sql3; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->hs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->hs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->hs = false;
          $this->hs_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->hs[0][0])) {
	
	$duracion_servicios=$this->hs[0][0];
}
else {
	$duracion_servicios=0;
}

if($this->citduracion  < $duracion_servicios) {
	
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "La duraci�n de la cita no puede ser menor a la duraci�n de los servicios ingresados.";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_calendar_cita_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "La duraci�n de la cita no puede ser menor a la duraci�n de los servicios ingresados.";
 }
;
}



if($this->cittipo =="D" || $this->cittipo =="") {
	
   $this->prenumero 	= 'NULL';

}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_agesecuen != $this->agesecuen || (isset($bFlagRead_agesecuen) && $bFlagRead_agesecuen)))
    {
        $this->ajax_return_values_agesecuen(true);
    }
    if (($original_citduracion != $this->citduracion || (isset($bFlagRead_citduracion) && $bFlagRead_citduracion)))
    {
        $this->ajax_return_values_citduracion(true);
    }
    if (($original_citfecha != $this->citfecha || (isset($bFlagRead_citfecha) && $bFlagRead_citfecha)))
    {
        $this->ajax_return_values_citfecha(true);
    }
    if (($original_cithorafin != $this->cithorafin || (isset($bFlagRead_cithorafin) && $bFlagRead_cithorafin)))
    {
        $this->ajax_return_values_cithorafin(true);
    }
    if (($original_cithoraini != $this->cithoraini || (isset($bFlagRead_cithoraini) && $bFlagRead_cithoraini)))
    {
        $this->ajax_return_values_cithoraini(true);
    }
    if (($original_citid != $this->citid || (isset($bFlagRead_citid) && $bFlagRead_citid)))
    {
        $this->ajax_return_values_citid(true);
    }
    if (($original_cittipo != $this->cittipo || (isset($bFlagRead_cittipo) && $bFlagRead_cittipo)))
    {
        $this->ajax_return_values_cittipo(true);
    }
    if (($original_fclnumero != $this->fclnumero || (isset($bFlagRead_fclnumero) && $bFlagRead_fclnumero)))
    {
        $this->ajax_return_values_fclnumero(true);
    }
    if (($original_prenumero != $this->prenumero || (isset($bFlagRead_prenumero) && $bFlagRead_prenumero)))
    {
        $this->ajax_return_values_prenumero(true);
    }
}
$_SESSION['scriptcase']['calendar_cita_mob']['contr_erro'] = 'off'; 
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
      if (!isset($this->citusumodi)){$this->citusumodi =  $_SESSION['usr_login'];}  
      if ('incluir' == $this->nmgp_opcao && empty($this->citfactur)) {$this->citfactur = "0"; $NM_val_null[] = "citfactur";}  
      if ('incluir' == $this->nmgp_opcao && empty($this->citusucrea)) {$this->citusucrea = "" . $_SESSION['usr_login'] . ""; $NM_val_null[] = "citusucrea";}  
      if (('alterar' == $this->nmgp_opcao || 'igual' == $this->nmgp_opcao) && empty($this->citusumodi)){$this->citusumodi = "" . $_SESSION['usr_login'] . ""; $NM_val_null[] = "citusumodi";}  
      $NM_val_form['citid'] = $this->citid;
      $NM_val_form['cittitulo'] = $this->cittitulo;
      $NM_val_form['citfecha'] = $this->citfecha;
      $NM_val_form['agesecuen'] = $this->agesecuen;
      $NM_val_form['cithoraini'] = $this->cithoraini;
      $NM_val_form['citduracion'] = $this->citduracion;
      $NM_val_form['cithorafin'] = $this->cithorafin;
      $NM_val_form['hora_fin_mostrar'] = $this->hora_fin_mostrar;
      $NM_val_form['citfactur'] = $this->citfactur;
      $NM_val_form['info_documento'] = $this->info_documento;
      $NM_val_form['fclnumero'] = $this->fclnumero;
      $NM_val_form['paciente_nuevo'] = $this->paciente_nuevo;
      $NM_val_form['cittipo'] = $this->cittipo;
      $NM_val_form['label_ficha'] = $this->label_ficha;
      $NM_val_form['ficha_cliente'] = $this->ficha_cliente;
      $NM_val_form['editar_cita'] = $this->editar_cita;
      $NM_val_form['citcolor'] = $this->citcolor;
      $NM_val_form['prenumero'] = $this->prenumero;
      $NM_val_form['nombre_presupuesto'] = $this->nombre_presupuesto;
      $NM_val_form['editar_presup'] = $this->editar_presup;
      $NM_val_form['info_documento_2'] = $this->info_documento_2;
      $NM_val_form['citobserv'] = $this->citobserv;
      $NM_val_form['cancelar_cita'] = $this->cancelar_cita;
      $NM_val_form['citanula'] = $this->citanula;
      $NM_val_form['citperiod'] = $this->citperiod;
      $NM_val_form['citrecurr'] = $this->citrecurr;
      $NM_val_form['citrecurrinfo'] = $this->citrecurrinfo;
      $NM_val_form['citusucrea'] = $this->citusucrea;
      $NM_val_form['citusumodi'] = $this->citusumodi;
      $NM_val_form['citfeccrea'] = $this->citfeccrea;
      $NM_val_form['citfecmodi'] = $this->citfecmodi;
      $NM_val_form['__calend_all_day__'] = $this->__calend_all_day__;
      if ($this->citid === "" || is_null($this->citid))  
      { 
          $this->citid = 0;
      } 
      if ($this->citduracion === "" || is_null($this->citduracion))  
      { 
          $this->citduracion = 0;
          $this->sc_force_zero[] = 'citduracion';
      } 
      if ($this->agesecuen === "" || is_null($this->agesecuen))  
      { 
          $this->agesecuen = 0;
          $this->sc_force_zero[] = 'agesecuen';
      } 
      if ($this->fclnumero === "" || is_null($this->fclnumero))  
      { 
          $this->fclnumero = 0;
          $this->sc_force_zero[] = 'fclnumero';
      } 
      if ($this->citfactur === "" || is_null($this->citfactur))  
      { 
          $this->citfactur = 0;
          $this->sc_force_zero[] = 'citfactur';
      } 
      if ($this->prenumero === "" || is_null($this->prenumero))  
      { 
          $this->prenumero = 0;
          $this->sc_force_zero[] = 'prenumero';
      } 
      if ($this->citanula === "" || is_null($this->citanula))  
      { 
          $this->citanula = 0;
          $this->sc_force_zero[] = 'citanula';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->cittitulo_before_qstr = $this->cittitulo;
          $this->cittitulo = substr($this->Db->qstr($this->cittitulo), 1, -1); 
          if ($this->cittitulo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cittitulo = "null"; 
              $NM_val_null[] = "cittitulo";
          } 
          if ($this->citfecha == "")  
          { 
              $this->citfecha = "null"; 
              $NM_val_null[] = "citfecha";
          } 
          if ($this->cithoraini == "")  
          { 
              $this->cithoraini = "null"; 
              $NM_val_null[] = "cithoraini";
          } 
          if ($this->cithorafin == "")  
          { 
              $this->cithorafin = "null"; 
              $NM_val_null[] = "cithorafin";
          } 
          $this->cittipo_before_qstr = $this->cittipo;
          $this->cittipo = substr($this->Db->qstr($this->cittipo), 1, -1); 
          if ($this->cittipo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cittipo = "null"; 
              $NM_val_null[] = "cittipo";
          } 
          $this->citobserv_before_qstr = $this->citobserv;
          $this->citobserv = substr($this->Db->qstr($this->citobserv), 1, -1); 
          if ($this->citobserv == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->citobserv = "null"; 
              $NM_val_null[] = "citobserv";
          } 
          $this->citcolor_before_qstr = $this->citcolor;
          $this->citcolor = substr($this->Db->qstr($this->citcolor), 1, -1); 
          if ($this->citcolor == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->citcolor = "null"; 
              $NM_val_null[] = "citcolor";
          } 
          $this->citperiod_before_qstr = $this->citperiod;
          $this->citperiod = substr($this->Db->qstr($this->citperiod), 1, -1); 
          if ($this->citperiod == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->citperiod = "null"; 
              $NM_val_null[] = "citperiod";
          } 
          $this->citrecurr_before_qstr = $this->citrecurr;
          $this->citrecurr = substr($this->Db->qstr($this->citrecurr), 1, -1); 
          if ($this->citrecurr == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->citrecurr = "null"; 
              $NM_val_null[] = "citrecurr";
          } 
          $this->citrecurrinfo_before_qstr = $this->citrecurrinfo;
          $this->citrecurrinfo = substr($this->Db->qstr($this->citrecurrinfo), 1, -1); 
          if ($this->citrecurrinfo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->citrecurrinfo = "null"; 
              $NM_val_null[] = "citrecurrinfo";
          } 
          $this->citusucrea_before_qstr = $this->citusucrea;
          $this->citusucrea = substr($this->Db->qstr($this->citusucrea), 1, -1); 
          if ($this->citusucrea == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->citusucrea = "null"; 
              $NM_val_null[] = "citusucrea";
          } 
          $this->citusumodi_before_qstr = $this->citusumodi;
          $this->citusumodi = substr($this->Db->qstr($this->citusumodi), 1, -1); 
          if ($this->citusumodi == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->citusumodi = "null"; 
              $NM_val_null[] = "citusumodi";
          } 
          if ($this->citfeccrea == "")  
          { 
              $this->citfeccrea = "null"; 
              $NM_val_null[] = "citfeccrea";
          } 
          if ($this->citfecmodi == "")  
          { 
              $this->citfecmodi = "null"; 
              $NM_val_null[] = "citfecmodi";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['foreign_key'] as $sFKName => $sFKValue)
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
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where citid = $this->citid ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where citid = $this->citid "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where citid = $this->citid ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where citid = $this->citid "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where citid = $this->citid ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where citid = $this->citid "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where citid = $this->citid ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where citid = $this->citid "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where citid = $this->citid ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where citid = $this->citid "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 calendar_cita_mob_pack_ajax_response();
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
              $this->citfecmodi =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->citfecmodi_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $NM_val_form['citfecmodi'] = $this->citfecmodi;
              $this->NM_ajax_changed['citfecmodi'] = true;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "citfecha = #$this->citfecha#, cithoraini = #$this->cithoraini#, cithorafin = #$this->cithorafin#, citduracion = $this->citduracion, agesecuen = $this->agesecuen, fclnumero = $this->fclnumero, citobserv = '$this->citobserv', citcolor = '$this->citcolor'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "citfecha = " . $this->Ini->date_delim . $this->citfecha . $this->Ini->date_delim1 . ", cithoraini = " . $this->Ini->date_delim . $this->cithoraini . $this->Ini->date_delim1 . ", cithorafin = " . $this->Ini->date_delim . $this->cithorafin . $this->Ini->date_delim1 . ", citduracion = $this->citduracion, agesecuen = $this->agesecuen, fclnumero = $this->fclnumero, citobserv = '$this->citobserv', citcolor = '$this->citcolor'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "citfecha = " . $this->Ini->date_delim . $this->citfecha . $this->Ini->date_delim1 . ", cithoraini = " . $this->Ini->date_delim . $this->cithoraini . $this->Ini->date_delim1 . ", cithorafin = " . $this->Ini->date_delim . $this->cithorafin . $this->Ini->date_delim1 . ", citduracion = $this->citduracion, agesecuen = $this->agesecuen, fclnumero = $this->fclnumero, citobserv = '$this->citobserv', citcolor = '$this->citcolor'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "citfecha = EXTEND('$this->citfecha', YEAR TO DAY), cithoraini = " . $this->Ini->date_delim . $this->cithoraini . $this->Ini->date_delim1 . ", cithorafin = " . $this->Ini->date_delim . $this->cithorafin . $this->Ini->date_delim1 . ", citduracion = $this->citduracion, agesecuen = $this->agesecuen, fclnumero = $this->fclnumero, citobserv = '$this->citobserv', citcolor = '$this->citcolor'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "citfecha = " . $this->Ini->date_delim . $this->citfecha . $this->Ini->date_delim1 . ", cithoraini = " . $this->Ini->date_delim . $this->cithoraini . $this->Ini->date_delim1 . ", cithorafin = " . $this->Ini->date_delim . $this->cithorafin . $this->Ini->date_delim1 . ", citduracion = $this->citduracion, agesecuen = $this->agesecuen, fclnumero = $this->fclnumero, citobserv = '$this->citobserv', citcolor = '$this->citcolor'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "citfecha = " . $this->Ini->date_delim . $this->citfecha . $this->Ini->date_delim1 . ", cithoraini = " . $this->Ini->date_delim . $this->cithoraini . $this->Ini->date_delim1 . ", cithorafin = " . $this->Ini->date_delim . $this->cithorafin . $this->Ini->date_delim1 . ", citduracion = $this->citduracion, agesecuen = $this->agesecuen, fclnumero = $this->fclnumero, citobserv = '$this->citobserv', citcolor = '$this->citcolor'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "citfecha = " . $this->Ini->date_delim . $this->citfecha . $this->Ini->date_delim1 . ", cithoraini = " . $this->Ini->date_delim . $this->cithoraini . $this->Ini->date_delim1 . ", cithorafin = " . $this->Ini->date_delim . $this->cithorafin . $this->Ini->date_delim1 . ", citduracion = $this->citduracion, agesecuen = $this->agesecuen, fclnumero = $this->fclnumero, citobserv = '$this->citobserv', citcolor = '$this->citcolor'"; 
              } 
              if (isset($NM_val_form['cittitulo']) && $NM_val_form['cittitulo'] != $this->nmgp_dados_select['cittitulo']) 
              { 
                  $SC_fields_update[] = "cittitulo = '$this->cittitulo'"; 
              } 
              if (isset($NM_val_form['cittipo']) && $NM_val_form['cittipo'] != $this->nmgp_dados_select['cittipo']) 
              { 
                  $SC_fields_update[] = "cittipo = '$this->cittipo'"; 
              } 
              if (isset($NM_val_form['citfactur']) && $NM_val_form['citfactur'] != $this->nmgp_dados_select['citfactur']) 
              { 
                  $SC_fields_update[] = "citfactur = $this->citfactur"; 
              } 
              if (isset($NM_val_form['prenumero']) && $NM_val_form['prenumero'] != $this->nmgp_dados_select['prenumero']) 
              { 
                  $SC_fields_update[] = "prenumero = $this->prenumero"; 
              } 
              if (isset($NM_val_form['citanula']) && $NM_val_form['citanula'] != $this->nmgp_dados_select['citanula']) 
              { 
                  $SC_fields_update[] = "citanula = $this->citanula"; 
              } 
              if (isset($NM_val_form['citperiod']) && $NM_val_form['citperiod'] != $this->nmgp_dados_select['citperiod']) 
              { 
                  $SC_fields_update[] = "citperiod = '$this->citperiod'"; 
              } 
              if (isset($NM_val_form['citrecurr']) && $NM_val_form['citrecurr'] != $this->nmgp_dados_select['citrecurr']) 
              { 
                  $SC_fields_update[] = "citrecurr = '$this->citrecurr'"; 
              } 
              if (isset($NM_val_form['citrecurrinfo']) && $NM_val_form['citrecurrinfo'] != $this->nmgp_dados_select['citrecurrinfo']) 
              { 
                  $SC_fields_update[] = "citrecurrinfo = '$this->citrecurrinfo'"; 
              } 
              if (isset($NM_val_form['citusucrea']) && $NM_val_form['citusucrea'] != $this->nmgp_dados_select['citusucrea']) 
              { 
                  $SC_fields_update[] = "citusucrea = '$this->citusucrea'"; 
              } 
              if (isset($NM_val_form['citusumodi']) && $NM_val_form['citusumodi'] != $this->nmgp_dados_select['citusumodi']) 
              { 
                  $SC_fields_update[] = "citusumodi = '$this->citusumodi'"; 
              } 
              if (isset($NM_val_form['citfeccrea']) && $NM_val_form['citfeccrea'] != $this->nmgp_dados_select['citfeccrea']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "citfeccrea = #$this->citfeccrea#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "citfeccrea = EXTEND('" . $this->citfeccrea . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "citfeccrea = " . $this->Ini->date_delim . $this->citfeccrea . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['citfecmodi']) && $NM_val_form['citfecmodi'] != $this->nmgp_dados_select['citfecmodi']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "citfecmodi = #$this->citfecmodi#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "citfecmodi = EXTEND('" . $this->citfecmodi . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "citfecmodi = " . $this->Ini->date_delim . $this->citfecmodi . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE citid = $this->citid ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE citid = $this->citid ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE citid = $this->citid ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE citid = $this->citid ";  
              }  
              else  
              {
                  $comando .= " WHERE citid = $this->citid ";  
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
                                  calendar_cita_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->cittitulo = $this->cittitulo_before_qstr;
              $this->cittipo = $this->cittipo_before_qstr;
              $this->citobserv = $this->citobserv_before_qstr;
              $this->citcolor = $this->citcolor_before_qstr;
              $this->citperiod = $this->citperiod_before_qstr;
              $this->citrecurr = $this->citrecurr_before_qstr;
              $this->citrecurrinfo = $this->citrecurrinfo_before_qstr;
              $this->citusucrea = $this->citusucrea_before_qstr;
              $this->citusumodi = $this->citusumodi_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }

              $this->NM_ajax_info['calendarReload'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['citid'])) { $this->citid = $NM_val_form['citid']; }
              elseif (isset($this->citid)) { $this->nm_limpa_alfa($this->citid); }
              if     (isset($NM_val_form) && isset($NM_val_form['cittitulo'])) { $this->cittitulo = $NM_val_form['cittitulo']; }
              elseif (isset($this->cittitulo)) { $this->nm_limpa_alfa($this->cittitulo); }
              if     (isset($NM_val_form) && isset($NM_val_form['citduracion'])) { $this->citduracion = $NM_val_form['citduracion']; }
              elseif (isset($this->citduracion)) { $this->nm_limpa_alfa($this->citduracion); }
              if     (isset($NM_val_form) && isset($NM_val_form['agesecuen'])) { $this->agesecuen = $NM_val_form['agesecuen']; }
              elseif (isset($this->agesecuen)) { $this->nm_limpa_alfa($this->agesecuen); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclnumero'])) { $this->fclnumero = $NM_val_form['fclnumero']; }
              elseif (isset($this->fclnumero)) { $this->nm_limpa_alfa($this->fclnumero); }
              if     (isset($NM_val_form) && isset($NM_val_form['cittipo'])) { $this->cittipo = $NM_val_form['cittipo']; }
              elseif (isset($this->cittipo)) { $this->nm_limpa_alfa($this->cittipo); }
              if     (isset($NM_val_form) && isset($NM_val_form['citfactur'])) { $this->citfactur = $NM_val_form['citfactur']; }
              elseif (isset($this->citfactur)) { $this->nm_limpa_alfa($this->citfactur); }
              if     (isset($NM_val_form) && isset($NM_val_form['prenumero'])) { $this->prenumero = $NM_val_form['prenumero']; }
              elseif (isset($this->prenumero)) { $this->nm_limpa_alfa($this->prenumero); }
              if     (isset($NM_val_form) && isset($NM_val_form['citobserv'])) { $this->citobserv = $NM_val_form['citobserv']; }
              elseif (isset($this->citobserv)) { $this->nm_limpa_alfa($this->citobserv); }
              if     (isset($NM_val_form) && isset($NM_val_form['citcolor'])) { $this->citcolor = $NM_val_form['citcolor']; }
              elseif (isset($this->citcolor)) { $this->nm_limpa_alfa($this->citcolor); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('citid', 'cittitulo', 'citfecha', 'agesecuen', 'cithoraini', 'citduracion', 'cithorafin', 'hora_fin_mostrar', 'citfactur', 'info_documento', 'fclnumero', 'paciente_nuevo', 'cittipo', 'label_ficha', 'ficha_cliente', 'editar_cita', 'citcolor', 'prenumero', 'nombre_presupuesto', 'editar_presup', 'info_documento_2', 'citobserv', 'cancelar_cita'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['foreign_key'] as $sFKName => $sFKValue)
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
              $NM_cmp_auto = "citid, ";
          } 
              $this->citfeccrea =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->citfeccrea_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($this->google_calendar_insert) || !$this->google_calendar_insert)
          {
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      calendar_cita_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (cittitulo, citfecha, cithoraini, cithorafin, citduracion, agesecuen, fclnumero, cittipo, citfactur, prenumero, citobserv, citanula, citcolor, citperiod, citrecurr, citrecurrinfo, citusucrea, citusumodi, citfeccrea, citfecmodi) VALUES ('$this->cittitulo', #$this->citfecha#, #$this->cithoraini#, #$this->cithorafin#, $this->citduracion, $this->agesecuen, $this->fclnumero, '$this->cittipo', $this->citfactur, $this->prenumero, '$this->citobserv', $this->citanula, '$this->citcolor', '$this->citperiod', '$this->citrecurr', '$this->citrecurrinfo', '$this->citusucrea', '$this->citusumodi', #$this->citfeccrea#, #$this->citfecmodi#)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cittitulo, citfecha, cithoraini, cithorafin, citduracion, agesecuen, fclnumero, cittipo, citfactur, prenumero, citobserv, citanula, citcolor, citperiod, citrecurr, citrecurrinfo, citusucrea, citusumodi, citfeccrea, citfecmodi) VALUES (" . $NM_seq_auto . "'$this->cittitulo', " . $this->Ini->date_delim . $this->citfecha . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->cithoraini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->cithorafin . $this->Ini->date_delim1 . ", $this->citduracion, $this->agesecuen, $this->fclnumero, '$this->cittipo', $this->citfactur, $this->prenumero, '$this->citobserv', $this->citanula, '$this->citcolor', '$this->citperiod', '$this->citrecurr', '$this->citrecurrinfo', '$this->citusucrea', '$this->citusumodi', " . $this->Ini->date_delim . $this->citfeccrea . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->citfecmodi . $this->Ini->date_delim1 . ")"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cittitulo, citfecha, cithoraini, cithorafin, citduracion, agesecuen, fclnumero, cittipo, citfactur, prenumero, citobserv, citanula, citcolor, citperiod, citrecurr, citrecurrinfo, citusucrea, citusumodi, citfeccrea, citfecmodi) VALUES (" . $NM_seq_auto . "'$this->cittitulo', " . $this->Ini->date_delim . $this->citfecha . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->cithoraini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->cithorafin . $this->Ini->date_delim1 . ", $this->citduracion, $this->agesecuen, $this->fclnumero, '$this->cittipo', $this->citfactur, $this->prenumero, '$this->citobserv', $this->citanula, '$this->citcolor', '$this->citperiod', '$this->citrecurr', '$this->citrecurrinfo', '$this->citusucrea', '$this->citusumodi', " . $this->Ini->date_delim . $this->citfeccrea . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->citfecmodi . $this->Ini->date_delim1 . ")"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cittitulo, citfecha, cithoraini, cithorafin, citduracion, agesecuen, fclnumero, cittipo, citfactur, prenumero, citobserv, citanula, citcolor, citperiod, citrecurr, citrecurrinfo, citusucrea, citusumodi, citfeccrea, citfecmodi) VALUES (" . $NM_seq_auto . "'$this->cittitulo', " . $this->Ini->date_delim . $this->citfecha . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->cithoraini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->cithorafin . $this->Ini->date_delim1 . ", $this->citduracion, $this->agesecuen, $this->fclnumero, '$this->cittipo', $this->citfactur, $this->prenumero, '$this->citobserv', $this->citanula, '$this->citcolor', '$this->citperiod', '$this->citrecurr', '$this->citrecurrinfo', '$this->citusucrea', '$this->citusumodi', " . $this->Ini->date_delim . $this->citfeccrea . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->citfecmodi . $this->Ini->date_delim1 . ")"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cittitulo, citfecha, cithoraini, cithorafin, citduracion, agesecuen, fclnumero, cittipo, citfactur, prenumero, citobserv, citanula, citcolor, citperiod, citrecurr, citrecurrinfo, citusucrea, citusumodi, citfeccrea, citfecmodi) VALUES (" . $NM_seq_auto . "'$this->cittitulo', EXTEND('$this->citfecha', YEAR TO DAY), " . $this->Ini->date_delim . $this->cithoraini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->cithorafin . $this->Ini->date_delim1 . ", $this->citduracion, $this->agesecuen, $this->fclnumero, '$this->cittipo', $this->citfactur, $this->prenumero, '$this->citobserv', $this->citanula, '$this->citcolor', '$this->citperiod', '$this->citrecurr', '$this->citrecurrinfo', '$this->citusucrea', '$this->citusumodi', EXTEND('$this->citfeccrea', YEAR TO FRACTION), EXTEND('$this->citfecmodi', YEAR TO FRACTION))"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cittitulo, citfecha, cithoraini, cithorafin, citduracion, agesecuen, fclnumero, cittipo, citfactur, prenumero, citobserv, citanula, citcolor, citperiod, citrecurr, citrecurrinfo, citusucrea, citusumodi, citfeccrea, citfecmodi) VALUES (" . $NM_seq_auto . "'$this->cittitulo', " . $this->Ini->date_delim . $this->citfecha . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->cithoraini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->cithorafin . $this->Ini->date_delim1 . ", $this->citduracion, $this->agesecuen, $this->fclnumero, '$this->cittipo', $this->citfactur, $this->prenumero, '$this->citobserv', $this->citanula, '$this->citcolor', '$this->citperiod', '$this->citrecurr', '$this->citrecurrinfo', '$this->citusucrea', '$this->citusumodi', " . $this->Ini->date_delim . $this->citfeccrea . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->citfecmodi . $this->Ini->date_delim1 . ")"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cittitulo, citfecha, cithoraini, cithorafin, citduracion, agesecuen, fclnumero, cittipo, citfactur, prenumero, citobserv, citanula, citcolor, citperiod, citrecurr, citrecurrinfo, citusucrea, citusumodi, citfeccrea, citfecmodi) VALUES (" . $NM_seq_auto . "'$this->cittitulo', " . $this->Ini->date_delim . $this->citfecha . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->cithoraini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->cithorafin . $this->Ini->date_delim1 . ", $this->citduracion, $this->agesecuen, $this->fclnumero, '$this->cittipo', $this->citfactur, $this->prenumero, '$this->citobserv', $this->citanula, '$this->citcolor', '$this->citperiod', '$this->citrecurr', '$this->citrecurrinfo', '$this->citusucrea', '$this->citusumodi', " . $this->Ini->date_delim . $this->citfeccrea . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->citfecmodi . $this->Ini->date_delim1 . ")"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cittitulo, citfecha, cithoraini, cithorafin, citduracion, agesecuen, fclnumero, cittipo, citfactur, prenumero, citobserv, citanula, citcolor, citperiod, citrecurr, citrecurrinfo, citusucrea, citusumodi, citfeccrea, citfecmodi) VALUES (" . $NM_seq_auto . "'$this->cittitulo', " . $this->Ini->date_delim . $this->citfecha . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->cithoraini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->cithorafin . $this->Ini->date_delim1 . ", $this->citduracion, $this->agesecuen, $this->fclnumero, '$this->cittipo', $this->citfactur, $this->prenumero, '$this->citobserv', $this->citanula, '$this->citcolor', '$this->citperiod', '$this->citrecurr', '$this->citrecurrinfo', '$this->citusucrea', '$this->citusumodi', " . $this->Ini->date_delim . $this->citfeccrea . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->citfecmodi . $this->Ini->date_delim1 . ")"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "cittitulo, citfecha, cithoraini, cithorafin, citduracion, agesecuen, fclnumero, cittipo, citfactur, prenumero, citobserv, citanula, citcolor, citperiod, citrecurr, citrecurrinfo, citusucrea, citusumodi, citfeccrea, citfecmodi) VALUES (" . $NM_seq_auto . "'$this->cittitulo', " . $this->Ini->date_delim . $this->citfecha . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->cithoraini . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->cithorafin . $this->Ini->date_delim1 . ", $this->citduracion, $this->agesecuen, $this->fclnumero, '$this->cittipo', $this->citfactur, $this->prenumero, '$this->citobserv', $this->citanula, '$this->citcolor', '$this->citperiod', '$this->citrecurr', '$this->citrecurrinfo', '$this->citusucrea', '$this->citusumodi', " . $this->Ini->date_delim . $this->citfeccrea . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->citfecmodi . $this->Ini->date_delim1 . ")"; 
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
                              calendar_cita_mob_pack_ajax_response();
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
                          calendar_cita_mob_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->citid =  $rsy->fields[0];
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
                  $this->citid = $rsy->fields[0];
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
                  $this->citid = $rsy->fields[0];
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
                  $this->citid = $rsy->fields[0];
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
                  $this->citid = $rsy->fields[0];
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
                  $this->citid = $rsy->fields[0];
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
                  $this->citid = $rsy->fields[0];
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
                  $this->citid = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['total']);
              }

              $this->NM_ajax_info['calendarReload'] = true;

              $this->sc_evento = "insert"; 
              $this->cittitulo = $this->cittitulo_before_qstr;
              $this->cittipo = $this->cittipo_before_qstr;
              $this->citobserv = $this->citobserv_before_qstr;
              $this->citcolor = $this->citcolor_before_qstr;
              $this->citperiod = $this->citperiod_before_qstr;
              $this->citrecurr = $this->citrecurr_before_qstr;
              $this->citrecurrinfo = $this->citrecurrinfo_before_qstr;
              $this->citusucrea = $this->citusucrea_before_qstr;
              $this->citusumodi = $this->citusumodi_before_qstr;
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['return_edit'] = "new";
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
          $this->citid = substr($this->Db->qstr($this->citid), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where citid = $this->citid"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where citid = $this->citid "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where citid = $this->citid"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where citid = $this->citid "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where citid = $this->citid"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where citid = $this->citid "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where citid = $this->citid"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where citid = $this->citid "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where citid = $this->citid"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where citid = $this->citid "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where citid = $this->citid "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where citid = $this->citid "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where citid = $this->citid "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where citid = $this->citid "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where citid = $this->citid "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where citid = $this->citid "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where citid = $this->citid "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where citid = $this->citid "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where citid = $this->citid "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where citid = $this->citid "); 
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
                          calendar_cita_mob_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['total']);
              }

              $this->NM_ajax_info['calendarReload'] = true;

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
        $_SESSION['scriptcase']['calendar_cita_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cancelar_cita = $this->cancelar_cita;
    $original_citid = $this->citid;
    $original_cittitulo = $this->cittitulo;
}
  if($this->cancelar_cita =='CLIN') {

	$updt="UPDATE cita SET citfactur=3, cittitulo='*** ".$this->cittitulo ."' WHERE citid=".$this->citid ;
	
     $nm_select = $updt; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                calendar_cita_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	
}

if($this->cancelar_cita =='CLIE') {

	$updt="UPDATE cita SET citfactur=4, cittitulo='*** ".$this->cittitulo ."' WHERE citid=".$this->citid ;
	
     $nm_select = $updt; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                calendar_cita_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cancelar_cita != $this->cancelar_cita || (isset($bFlagRead_cancelar_cita) && $bFlagRead_cancelar_cita)))
    {
        $this->ajax_return_values_cancelar_cita(true);
    }
    if (($original_citid != $this->citid || (isset($bFlagRead_citid) && $bFlagRead_citid)))
    {
        $this->ajax_return_values_citid(true);
    }
    if (($original_cittitulo != $this->cittitulo || (isset($bFlagRead_cittitulo) && $bFlagRead_cittitulo)))
    {
        $this->ajax_return_values_cittitulo(true);
    }
}
$_SESSION['scriptcase']['calendar_cita_mob']['contr_erro'] = 'off'; 
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['parms'] = "citid?#?$this->citid?@?"; 
      }
      $this->NM_commit_db(); 
      if (isset($this->google_calendar_insert) && $this->google_calendar_insert)
      {
          return;
      }
      if (('insert' == $this->sc_evento && 1 != $GLOBALS["erro_incl"]) || 'delete' == $this->sc_evento)
      {
          $this->calendarOutputReload();
          exit;
      }
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->citid = null === $this->citid ? null : substr($this->Db->qstr($this->citid), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_filter'] . ")";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT citid, cittitulo, str_replace (convert(char(10),citfecha,102), '.', '-') + ' ' + convert(char(8),citfecha,20), str_replace (convert(char(10),cithoraini,102), '.', '-') + ' ' + convert(char(8),cithoraini,20), str_replace (convert(char(10),cithorafin,102), '.', '-') + ' ' + convert(char(8),cithorafin,20), citduracion, agesecuen, fclnumero, cittipo, citfactur, prenumero, citobserv, citanula, citcolor, citperiod, citrecurr, citrecurrinfo, citusucrea, citusumodi, str_replace (convert(char(10),citfeccrea,102), '.', '-') + ' ' + convert(char(8),citfeccrea,20), str_replace (convert(char(10),citfecmodi,102), '.', '-') + ' ' + convert(char(8),citfecmodi,20) from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT citid, cittitulo, convert(char(23),citfecha,121), convert(char(23),cithoraini,121), convert(char(23),cithorafin,121), citduracion, agesecuen, fclnumero, cittipo, citfactur, prenumero, citobserv, citanula, citcolor, citperiod, citrecurr, citrecurrinfo, citusucrea, citusumodi, convert(char(23),citfeccrea,121), convert(char(23),citfecmodi,121) from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT citid, cittitulo, citfecha, cithoraini, cithorafin, citduracion, agesecuen, fclnumero, cittipo, citfactur, prenumero, citobserv, citanula, citcolor, citperiod, citrecurr, citrecurrinfo, citusucrea, citusumodi, citfeccrea, citfecmodi from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT citid, cittitulo, EXTEND(citfecha, YEAR TO DAY), cithoraini, cithorafin, citduracion, agesecuen, fclnumero, cittipo, citfactur, prenumero, citobserv, citanula, citcolor, citperiod, citrecurr, citrecurrinfo, citusucrea, citusumodi, EXTEND(citfeccrea, YEAR TO FRACTION), EXTEND(citfecmodi, YEAR TO FRACTION) from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT citid, cittitulo, citfecha, cithoraini, cithorafin, citduracion, agesecuen, fclnumero, cittipo, citfactur, prenumero, citobserv, citanula, citcolor, citperiod, citrecurr, citrecurrinfo, citusucrea, citusumodi, citfeccrea, citfecmodi from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = "citanula=0 and citfactur<3";
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  {
                     $aWhere[] = "citid = $this->citid"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                  {
                     $aWhere[] = "citid = $this->citid"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  {
                     $aWhere[] = "citid = $this->citid"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  {
                     $aWhere[] = "citid = $this->citid"; 
                  }  
                  else  
                  {
                     $aWhere[] = "citid = $this->citid"; 
                  }
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "citid";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['empty_filter'] = true;
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
              $this->citid = $rs->fields[0] ; 
              $this->nmgp_dados_select['citid'] = $this->citid;
              $this->cittitulo = $rs->fields[1] ; 
              $this->nmgp_dados_select['cittitulo'] = $this->cittitulo;
              $this->citfecha = $rs->fields[2] ; 
              $this->nmgp_dados_select['citfecha'] = $this->citfecha;
              $this->cithoraini = $rs->fields[3] ; 
              $this->nmgp_dados_select['cithoraini'] = $this->cithoraini;
              $this->cithorafin = $rs->fields[4] ; 
              $this->nmgp_dados_select['cithorafin'] = $this->cithorafin;
              $this->citduracion = $rs->fields[5] ; 
              $this->nmgp_dados_select['citduracion'] = $this->citduracion;
              $this->agesecuen = $rs->fields[6] ; 
              $this->nmgp_dados_select['agesecuen'] = $this->agesecuen;
              $this->fclnumero = $rs->fields[7] ; 
              $this->nmgp_dados_select['fclnumero'] = $this->fclnumero;
              $this->cittipo = $rs->fields[8] ; 
              $this->nmgp_dados_select['cittipo'] = $this->cittipo;
              $this->citfactur = $rs->fields[9] ; 
              $this->nmgp_dados_select['citfactur'] = $this->citfactur;
              $this->prenumero = $rs->fields[10] ; 
              $this->nmgp_dados_select['prenumero'] = $this->prenumero;
              $this->citobserv = $rs->fields[11] ; 
              $this->nmgp_dados_select['citobserv'] = $this->citobserv;
              $this->citanula = $rs->fields[12] ; 
              $this->nmgp_dados_select['citanula'] = $this->citanula;
              $this->citcolor = $rs->fields[13] ; 
              $this->nmgp_dados_select['citcolor'] = $this->citcolor;
              $this->citperiod = $rs->fields[14] ; 
              $this->nmgp_dados_select['citperiod'] = $this->citperiod;
              $this->citrecurr = $rs->fields[15] ; 
              $this->nmgp_dados_select['citrecurr'] = $this->citrecurr;
              $this->citrecurrinfo = $rs->fields[16] ; 
              $this->nmgp_dados_select['citrecurrinfo'] = $this->citrecurrinfo;
              $this->citusucrea = $rs->fields[17] ; 
              $this->nmgp_dados_select['citusucrea'] = $this->citusucrea;
              $this->citusumodi = $rs->fields[18] ; 
              $this->nmgp_dados_select['citusumodi'] = $this->citusumodi;
              $this->citfeccrea = $rs->fields[19] ; 
              if (substr($this->citfeccrea, 10, 1) == "-") 
              { 
                 $this->citfeccrea = substr($this->citfeccrea, 0, 10) . " " . substr($this->citfeccrea, 11);
              } 
              if (substr($this->citfeccrea, 13, 1) == ".") 
              { 
                 $this->citfeccrea = substr($this->citfeccrea, 0, 13) . ":" . substr($this->citfeccrea, 14, 2) . ":" . substr($this->citfeccrea, 17);
              } 
              $this->nmgp_dados_select['citfeccrea'] = $this->citfeccrea;
              $this->citfecmodi = $rs->fields[20] ; 
              if (substr($this->citfecmodi, 10, 1) == "-") 
              { 
                 $this->citfecmodi = substr($this->citfecmodi, 0, 10) . " " . substr($this->citfecmodi, 11);
              } 
              if (substr($this->citfecmodi, 13, 1) == ".") 
              { 
                 $this->citfecmodi = substr($this->citfecmodi, 0, 13) . ":" . substr($this->citfecmodi, 14, 2) . ":" . substr($this->citfecmodi, 17);
              } 
              $this->nmgp_dados_select['citfecmodi'] = $this->citfecmodi;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->citid = (string)$this->citid; 
              $this->citduracion = (string)$this->citduracion; 
              $this->agesecuen = (string)$this->agesecuen; 
              $this->fclnumero = (string)$this->fclnumero; 
              $this->citfactur = (string)$this->citfactur; 
              $this->prenumero = (string)$this->prenumero; 
              $this->citanula = (string)$this->citanula; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['parms'] = "citid?#?$this->citid?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['reg_start'] < $qt_geral_reg_calendar_cita_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['opcao']   = '';
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
              $this->citid = "";  
              $this->nmgp_dados_form["citid"] = $this->citid;
              $this->cittitulo = "";  
              $this->nmgp_dados_form["cittitulo"] = $this->cittitulo;
              $this->citfecha = "";  
              $this->citfecha_hora = "" ;  
              $this->nmgp_dados_form["citfecha"] = $this->citfecha;
              $this->cithoraini = "";  
              $this->cithoraini_hora = "" ;  
              $this->nmgp_dados_form["cithoraini"] = $this->cithoraini;
              $this->cithorafin = "";  
              $this->cithorafin_hora = "" ;  
              $this->nmgp_dados_form["cithorafin"] = $this->cithorafin;
              $this->citduracion = "";  
              $this->nmgp_dados_form["citduracion"] = $this->citduracion;
              $this->agesecuen = "";  
              $this->nmgp_dados_form["agesecuen"] = $this->agesecuen;
              $this->fclnumero = "";  
              $this->nmgp_dados_form["fclnumero"] = $this->fclnumero;
              $this->cittipo = "";  
              $this->nmgp_dados_form["cittipo"] = $this->cittipo;
              $this->citfactur = "";  
              $this->nmgp_dados_form["citfactur"] = $this->citfactur;
              $this->prenumero = "";  
              $this->nmgp_dados_form["prenumero"] = $this->prenumero;
              $this->citobserv = "";  
              $this->nmgp_dados_form["citobserv"] = $this->citobserv;
              $this->citanula = "";  
              $this->nmgp_dados_form["citanula"] = $this->citanula;
              $this->citcolor = "";  
              $this->nmgp_dados_form["citcolor"] = $this->citcolor;
              $this->citperiod = "";  
              $this->nmgp_dados_form["citperiod"] = $this->citperiod;
              $this->citrecurr = "";  
              $this->nmgp_dados_form["citrecurr"] = $this->citrecurr;
              $this->citrecurrinfo = "";  
              $this->nmgp_dados_form["citrecurrinfo"] = $this->citrecurrinfo;
              $this->citusucrea = "";  
              $this->nmgp_dados_form["citusucrea"] = $this->citusucrea;
              $this->citusumodi = "";  
              $this->nmgp_dados_form["citusumodi"] = $this->citusumodi;
              $this->citfeccrea = "";  
              $this->citfeccrea_hora = "" ;  
              $this->nmgp_dados_form["citfeccrea"] = $this->citfeccrea;
              $this->citfecmodi = "";  
              $this->citfecmodi_hora = "" ;  
              $this->nmgp_dados_form["citfecmodi"] = $this->citfecmodi;
              $this->__calend_all_day__ = "";  
              $this->nmgp_dados_form["__calend_all_day__"] = $this->__calend_all_day__;
              $this->editar_cita = "";  
              $this->nmgp_dados_form["editar_cita"] = $this->editar_cita;
              $this->editar_presup = "";  
              $this->nmgp_dados_form["editar_presup"] = $this->editar_presup;
              $this->ficha_cliente = "";  
              $this->nmgp_dados_form["ficha_cliente"] = $this->ficha_cliente;
              $this->hora_fin_mostrar = "";  
              $this->nmgp_dados_form["hora_fin_mostrar"] = $this->hora_fin_mostrar;
              $this->nmgp_dados_form["label_ficha"] = $this->label_ficha;
              $this->cancelar_cita = "";  
              $this->nmgp_dados_form["cancelar_cita"] = $this->cancelar_cita;
              $this->nmgp_dados_form["info_documento"] = $this->info_documento;
              $this->info_documento_2 = "";  
              $this->nmgp_dados_form["info_documento_2"] = $this->info_documento_2;
              $this->nombre_presupuesto = "";  
              $this->nmgp_dados_form["nombre_presupuesto"] = $this->nombre_presupuesto;
              $this->paciente_nuevo = "";  
              $this->nmgp_dados_form["paciente_nuevo"] = $this->paciente_nuevo;
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }

          if (isset($this->sc_cal_click_date) && isset($this->sc_cal_click_time))
          {
              list($iTimestampIni, $iTimestampEnd) = $this->calendarInitTimestamp();

              $sTimeFormat1 = 'true' == $this->sc_cal_click_allday ? ''          : 'H:i:s';
              $sTimeFormat2 = 'true' == $this->sc_cal_click_allday ? ' 00:00:00' : ' H:i:s';

              $this->citfecha = date('Y-m-d', $iTimestampIni);
              $this->cithoraini = date($sTimeFormat1, $iTimestampIni);
              $this->citfecha = date('Y-m-d', $iTimestampEnd);
              $this->cithorafin = date($sTimeFormat1, $iTimestampEnd);
          }

          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['foreign_key'] as $sFKName => $sFKValue)
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function agesecuen_onChange()
{
$_SESSION['scriptcase']['calendar_cita_mob']['contr_erro'] = 'on';
  
$original_agesecuen = $this->agesecuen;
$original_citcolor = $this->citcolor;
$original_citduracion = $this->citduracion;
$original_cithoraini = $this->cithoraini;
$original_cithorafin = $this->cithorafin;
$original_hora_fin_mostrar = $this->hora_fin_mostrar;

$sql="SELECT agecolor,ageintervalo FROM agenda WHERE agesecuen=".$this->agesecuen ;
 
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

$this->citcolor =$this->ds[0][0];
$intervalo=$this->ds[0][1];
$this->citduracion =$this->ds[0][1];

$endTime = strtotime("+".$intervalo." minutes", strtotime($this->cithoraini ));
$this->cithorafin =date('H:i:s', $endTime);
$this->hora_fin_mostrar =date('H:i', $endTime);




$modificado_agesecuen = $this->agesecuen;
$modificado_citcolor = $this->citcolor;
$modificado_citduracion = $this->citduracion;
$modificado_cithoraini = $this->cithoraini;
$modificado_cithorafin = $this->cithorafin;
$modificado_hora_fin_mostrar = $this->hora_fin_mostrar;
$this->nm_formatar_campos('agesecuen', 'citcolor', 'citduracion', 'cithoraini', 'cithorafin', 'hora_fin_mostrar');
if ($original_agesecuen !== $modificado_agesecuen || isset($this->nmgp_cmp_readonly['agesecuen']) || (isset($bFlagRead_agesecuen) && $bFlagRead_agesecuen))
{
    $this->ajax_return_values_agesecuen(true);
}
if ($original_citcolor !== $modificado_citcolor || isset($this->nmgp_cmp_readonly['citcolor']) || (isset($bFlagRead_citcolor) && $bFlagRead_citcolor))
{
    $this->ajax_return_values_citcolor(true);
}
if ($original_citduracion !== $modificado_citduracion || isset($this->nmgp_cmp_readonly['citduracion']) || (isset($bFlagRead_citduracion) && $bFlagRead_citduracion))
{
    $this->ajax_return_values_citduracion(true);
}
if ($original_cithoraini !== $modificado_cithoraini || isset($this->nmgp_cmp_readonly['cithoraini']) || (isset($bFlagRead_cithoraini) && $bFlagRead_cithoraini))
{
    $this->ajax_return_values_cithoraini(true);
}
if ($original_cithorafin !== $modificado_cithorafin || isset($this->nmgp_cmp_readonly['cithorafin']) || (isset($bFlagRead_cithorafin) && $bFlagRead_cithorafin))
{
    $this->ajax_return_values_cithorafin(true);
}
if ($original_hora_fin_mostrar !== $modificado_hora_fin_mostrar || isset($this->nmgp_cmp_readonly['hora_fin_mostrar']) || (isset($bFlagRead_hora_fin_mostrar) && $bFlagRead_hora_fin_mostrar))
{
    $this->ajax_return_values_hora_fin_mostrar(true);
}
$this->NM_ajax_info['event_field'] = 'agesecuen';
calendar_cita_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['calendar_cita_mob']['contr_erro'] = 'off';
}
function citduracion_onChange()
{
$_SESSION['scriptcase']['calendar_cita_mob']['contr_erro'] = 'on';
  
$original_citduracion = $this->citduracion;
$original_cithoraini = $this->cithoraini;
$original_cithorafin = $this->cithorafin;
$original_hora_fin_mostrar = $this->hora_fin_mostrar;

$endTime = strtotime("+".$this->citduracion ." minutes", strtotime($this->cithoraini ));
$this->cithorafin =date('H:i:s', $endTime);
$this->hora_fin_mostrar =date('H:i', $endTime);

$modificado_citduracion = $this->citduracion;
$modificado_cithoraini = $this->cithoraini;
$modificado_cithorafin = $this->cithorafin;
$modificado_hora_fin_mostrar = $this->hora_fin_mostrar;
$this->nm_formatar_campos('citduracion', 'cithoraini', 'cithorafin', 'hora_fin_mostrar');
if ($original_citduracion !== $modificado_citduracion || isset($this->nmgp_cmp_readonly['citduracion']) || (isset($bFlagRead_citduracion) && $bFlagRead_citduracion))
{
    $this->ajax_return_values_citduracion(true);
}
if ($original_cithoraini !== $modificado_cithoraini || isset($this->nmgp_cmp_readonly['cithoraini']) || (isset($bFlagRead_cithoraini) && $bFlagRead_cithoraini))
{
    $this->ajax_return_values_cithoraini(true);
}
if ($original_cithorafin !== $modificado_cithorafin || isset($this->nmgp_cmp_readonly['cithorafin']) || (isset($bFlagRead_cithorafin) && $bFlagRead_cithorafin))
{
    $this->ajax_return_values_cithorafin(true);
}
if ($original_hora_fin_mostrar !== $modificado_hora_fin_mostrar || isset($this->nmgp_cmp_readonly['hora_fin_mostrar']) || (isset($bFlagRead_hora_fin_mostrar) && $bFlagRead_hora_fin_mostrar))
{
    $this->ajax_return_values_hora_fin_mostrar(true);
}
$this->NM_ajax_info['event_field'] = 'citduracion';
calendar_cita_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['calendar_cita_mob']['contr_erro'] = 'off';
}
function cithoraini_onChange()
{
$_SESSION['scriptcase']['calendar_cita_mob']['contr_erro'] = 'on';
  
$original_citduracion = $this->citduracion;
$original_cithoraini = $this->cithoraini;
$original_cithorafin = $this->cithorafin;
$original_hora_fin_mostrar = $this->hora_fin_mostrar;

$endTime = strtotime("+".$this->citduracion ." minutes", strtotime($this->cithoraini ));
$this->cithorafin =date('H:i:s', $endTime);
$this->hora_fin_mostrar =date('H:i', $endTime);

$modificado_citduracion = $this->citduracion;
$modificado_cithoraini = $this->cithoraini;
$modificado_cithorafin = $this->cithorafin;
$modificado_hora_fin_mostrar = $this->hora_fin_mostrar;
$this->nm_formatar_campos('citduracion', 'cithoraini', 'cithorafin', 'hora_fin_mostrar');
if ($original_citduracion !== $modificado_citduracion || isset($this->nmgp_cmp_readonly['citduracion']) || (isset($bFlagRead_citduracion) && $bFlagRead_citduracion))
{
    $this->ajax_return_values_citduracion(true);
}
if ($original_cithoraini !== $modificado_cithoraini || isset($this->nmgp_cmp_readonly['cithoraini']) || (isset($bFlagRead_cithoraini) && $bFlagRead_cithoraini))
{
    $this->ajax_return_values_cithoraini(true);
}
if ($original_cithorafin !== $modificado_cithorafin || isset($this->nmgp_cmp_readonly['cithorafin']) || (isset($bFlagRead_cithorafin) && $bFlagRead_cithorafin))
{
    $this->ajax_return_values_cithorafin(true);
}
if ($original_hora_fin_mostrar !== $modificado_hora_fin_mostrar || isset($this->nmgp_cmp_readonly['hora_fin_mostrar']) || (isset($bFlagRead_hora_fin_mostrar) && $bFlagRead_hora_fin_mostrar))
{
    $this->ajax_return_values_hora_fin_mostrar(true);
}
$this->NM_ajax_info['event_field'] = 'cithoraini';
calendar_cita_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['calendar_cita_mob']['contr_erro'] = 'off';
}
function cittipo_onChange()
{
$_SESSION['scriptcase']['calendar_cita_mob']['contr_erro'] = 'on';
  
$original_cittipo = $this->cittipo;
$original_prenumero = $this->prenumero;

if($this->cittipo =='D' || $this->cittipo =="") {
	
	$this->nmgp_cmp_hidden["prenumero"] = "off"; $this->NM_ajax_info['fieldDisplay']['prenumero'] = 'off';
	

}

else {
	$this->nmgp_cmp_hidden["prenumero"] = "on"; $this->NM_ajax_info['fieldDisplay']['prenumero'] = 'on';
	
}

$modificado_cittipo = $this->cittipo;
$modificado_prenumero = $this->prenumero;
$this->nm_formatar_campos('cittipo', 'prenumero');
if ($original_cittipo !== $modificado_cittipo || isset($this->nmgp_cmp_readonly['cittipo']) || (isset($bFlagRead_cittipo) && $bFlagRead_cittipo))
{
    $this->ajax_return_values_cittipo(true);
}
if ($original_prenumero !== $modificado_prenumero || isset($this->nmgp_cmp_readonly['prenumero']) || (isset($bFlagRead_prenumero) && $bFlagRead_prenumero))
{
    $this->ajax_return_values_prenumero(true);
}
$this->NM_ajax_info['event_field'] = 'cittipo';
calendar_cita_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['calendar_cita_mob']['contr_erro'] = 'off';
}
function paciente_nuevo_onClick()
{
$_SESSION['scriptcase']['calendar_cita_mob']['contr_erro'] = 'on';
  
$original_paciente_nuevo = $this->paciente_nuevo;
$original_fclnumero = $this->fclnumero;

if($this->paciente_nuevo ==1) {
	
	$this->nmgp_cmp_hidden["fclnumero"] = "off"; $this->NM_ajax_info['fieldDisplay']['fclnumero'] = 'off';	
	$this->fclnumero =0;
	
}

else {
	
	
	$this->nmgp_cmp_hidden["fclnumero"] = "on"; $this->NM_ajax_info['fieldDisplay']['fclnumero'] = 'on';
	$this->fclnumero ="";
}

$modificado_paciente_nuevo = $this->paciente_nuevo;
$modificado_fclnumero = $this->fclnumero;
$this->nm_formatar_campos('paciente_nuevo', 'fclnumero');
if ($original_paciente_nuevo !== $modificado_paciente_nuevo || isset($this->nmgp_cmp_readonly['paciente_nuevo']) || (isset($bFlagRead_paciente_nuevo) && $bFlagRead_paciente_nuevo))
{
    $this->ajax_return_values_paciente_nuevo(true);
}
if ($original_fclnumero !== $modificado_fclnumero || isset($this->nmgp_cmp_readonly['fclnumero']) || (isset($bFlagRead_fclnumero) && $bFlagRead_fclnumero))
{
    $this->ajax_return_values_fclnumero(true);
}
$this->NM_ajax_info['event_field'] = 'paciente';
calendar_cita_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['calendar_cita_mob']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              calendar_cita_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();

    if (('' == $this->cithoraini || '00:00:00' == $this->cithoraini) && ('' == $this->cithorafin || '00:00:00' == $this->cithorafin))
    {
        $this->__calend_all_day__ = 'Y';
    }

    include_once("calendar_cita_mob_form0.php");
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array(""))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

   function calendarOutputDisplay()
   {
       if (isset($_SESSION['scriptcase']['reg_conf']['date_format']) && '' != $_SESSION['scriptcase']['reg_conf']['date_format'])
       {
           $iPosDay     = strpos($_SESSION['scriptcase']['reg_conf']['date_format'], 'd');
           $iPosMonth   = strpos($_SESSION['scriptcase']['reg_conf']['date_format'], 'm');
           $sCalDateCol = (false !== $iPosDay && false !== $iPosMonth && $iPosDay > $iPosMonth) ? 'M/D' : 'D/M';
       }
       else
       {
           $sCalDateCol = 'M/D';
       }

       $appReturn = '';
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['iframe_menu'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['sc_outra_jan']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['sc_outra_jan'] != 'calendar_cita_mob')) {
           global $nm_url_saida, $nm_apl_dependente;
           if ((!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['run_iframe'] == "R" || $this->aba_iframe) && ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['run_iframe'] != "F") && ($nm_apl_dependente == 1)) {
               $appReturn = $nm_url_saida;
           }
           else {
           }
       }

       $iFirstDay = isset($_SESSION['scriptcase']['reg_conf']['date_week_ini']) && '' != $_SESSION['scriptcase']['reg_conf']['date_week_ini'] ? array_search($_SESSION['scriptcase']['reg_conf']['date_week_ini'], array('SU', 'MO', 'TU', 'WE', 'TH', 'FR', 'SA')) : false;
       $iFirstDay = false === $iFirstDay ? 0 : $iFirstDay;
       header("X-XSS-Protection: 1; mode=block");
       header("X-Frame-Options: SAMEORIGIN");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?> xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <title></title>
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/fullcalendar-3.4.0/fullcalendar.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox.css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appcalendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appcalendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <script type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/fullcalendar-3.4.0/lib/moment.min.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/fullcalendar-3.4.0/fullcalendar.min.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/fullcalendar-3.4.0/gcal.min.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
<script type="text/javascript">
  function calendarGoBack() {
    document.F6.action = "<?php echo $appReturn; ?>";
    document.F6.submit();
  }
</script>
<style type="text/css">

@media (max-width: 1200px) {
    .fc-toolbar .fc-center{
        display:none;
    }
}

@media (max-width: 1150px) {
    .fc-toolbar .fc-center{
        display:inline-block !important;
    }

    button.fc-today-button,
    button.fc-print-button,
    button.fc-importGoogle-button,
    button.fc-exportGoogle-button,
    button.fc-month-button,
    button.fc-agendaWeek-button,
    button.fc-agendaDay-button,
    button.fc-listMonth-button {
        background-repeat: no-repeat;
        background-size: 24px;
        background-position: center;
        text-indent: -9999px;
    }

    button.fc-today-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_today.png)!important;
    }

    button.fc-print-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_print.png)!important;
    }

    button.fc-importGoogle-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_down.png)!important;
    }

    button.fc-exportGoogle-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_up.png)!important;
    }

    button.fc-month-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_month.png)!important;
    }

    button.fc-agendaWeek-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_week.png)!important;
    }

    button.fc-agendaDay-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_day.png)!important;
    }

    button.fc-listMonth-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_list.png)!important;
    }
}

@media (max-width: 670px) {
    button.fc-print-button{
        display:none !important;
    }
}

@media (max-width: 853px) {
    .fc-toolbar .fc-center{
        display:none !important;
    }
    button.fc-prev-button,
    button.fc-next-button{
        padding: 2px 5px!important;
    }
}
</style>
 <script type="text/javascript">
  function sc_session_redir(url_redir)
  {
      if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
      {
          window.parent.sc_session_redir(url_redir);
      }
      else
      {
          if (window.opener && typeof window.opener.sc_session_redir === 'function')
          {
              window.close();
              window.opener.sc_session_redir(url_redir);
          }
          else
          {
              window.location = url_redir;
          }
      }
  }
  function calendar_reload() {
    $('#calendar').fullCalendar('refetchEvents');
  }
  function calendar_print() {
      $.ajax({
          url: 'calendar_cita_mob.php',
          type: 'GET',
          dataType: 'json',
          data: {
              nmgp_opcao: 'calendar_print',
              category: getCategory(true),
              start: $('#calendar').fullCalendar('getView').start.format(),
              end: $('#calendar').fullCalendar('getView').end.format()
          }
      }).done(function(data) {
          if ('html' == data.outputFormat) {
              var newWindow = window.open('');
              newWindow.document.write(data.printHtml);
              newWindow.document.close();
              newWindow.focus();
          }
          else {
              var newWindow = window.open(data.fileHtml);
          }
          //newWindow.print();
      });
  }
  $(document).ready(function() {
    $('#calendar_mini').fullCalendar({
        monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
        monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>"],
        dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang["lang_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
        dayNamesShort: ["<?php   echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>"],
        buttonText: {
          today: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
        },
    firstDay: <?php echo $iFirstDay; ?>,
        header: {
            left: 'prev,next today',
            center: 'title',
            right:'',
        },
        dayClick: function(date, jsEvent, view) {
          $('#calendar').fullCalendar( 'gotoDate', date );
        },
        defaultView: 'month',
    });
    $('#calendar').fullCalendar({
      height: ($( document ).height()-10),
      monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
      monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>"],
      dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang["lang_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
      dayNamesShort: ["<?php   echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>"],
      allDayText: "<?php       echo html_entity_decode($this->Ini->Nm_lang["lang_per_allday"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);     ?>",
      allDayHtml: "<?php       echo html_entity_decode($this->Ini->Nm_lang["lang_per_allday"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);     ?>",
      noEventsMessage: "<?php       echo html_entity_decode($this->Ini->Nm_lang["lang_per_nevent"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);     ?>",
      buttonText: {
        today: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
        month: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_month"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
        week: "<?php   echo html_entity_decode($this->Ini->Nm_lang["lang_per_week"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);        ?>",
        day: "<?php    echo html_entity_decode($this->Ini->Nm_lang["lang_per_day"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);         ?>",
        agenda: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_agenda"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
        print: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_print"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);  ?>",
        listMonth: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_agenda"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);  ?>",
      },
      views: {
        month: {titleFormat: 'MMMM YYYY', columnFormat: 'ddd', timeFormat: 'H:mm',slotLabelFormat: ['ddd','H:mm'],},
        week: {titleFormat: 'MMM D YYYY', columnFormat: 'ddd <?php echo $sCalDateCol; ?>', timeFormat: 'H:mm',slotLabelFormat: ['ddd <?php echo $sCalDateCol; ?>','H:mm'],},
        day: {titleFormat: 'dddd[,] MMM D[,] YYYY', columnFormat: 'dddd <?php echo $sCalDateCol; ?>', timeFormat: 'H:mm',slotLabelFormat: ['dddd <?php echo $sCalDateCol; ?>','H:mm'],},
      },
      firstDay: <?php echo $iFirstDay; ?>,
      header: {
        left: 'prev,next today print',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listMonth<?php if ('' != $appReturn) { echo ' goBack'; } ?>'
      },
      customButtons: {
        goBack: {
          text: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_back"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
          click: function() {
            calendarGoBack();
          }
        },
        print: {
          text: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_print"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);  ?>",
          click: function() {
            calendar_print();
          }
        }
      },
      editable: <?php echo ($this->calendarConfigValues['update'] ? 'true' : 'false'); ?>,
      slotDuration: "00:15:00",
      snapDuration: "00:05:00",
      nextDayThreshold: "00:00:00",
      eventStartEditable: false,
      allDaySlot: false,
      minTime: "07:00:00",
      maxTime: "22:00:00",
<?php
       if (isset($this->Ini->Nm_lang["lang_calendar_no_events"]) && '' != $this->Ini->Nm_lang["lang_calendar_no_events"]) {
?>
      noEventsMessage: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_no_events"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
<?php
       }
?>
      events: 'calendar_cita_mob.php?script_case_init=<?php echo $this->Ini->sc_page ?>&nmgp_opcao=calendar_fetch' + getCategory(false),
      eventRender: function (event, element, view) {
        if(event.hasOwnProperty('description') && event.description != '')
        {
            element.find('.fc-title').append('<div class="hr-line-solid-no-margin"></div><span style="font-size: 80%;">'+event.description+'</span></div>');
        }
      },
      dayClick: function(date, jsEvent, view) {
<?php
       if ($this->calendarConfigValues['insert'])
       {
?>
        var sDate = date.format(), sTime = '00:00:00', allDay = false;
        if (sDate.indexOf('T') > 0)
        {
            dateParts = date.format().split('T');
            sDate = dateParts[0], sTime = dateParts[1];
        }
        else if ('month' == view.type)
        {
            sTime = '06:00:00';
        }
        else
        {
            allDay = true;
        }
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
        scAddNewEvent(sDate, sTime, allDay);
<?php
}
else
{
?>
        tb_show('', 'calendar_cita_mob.php?nmgp_opcao=edit_novo&sc_cal_click_date=' + sDate + '&sc_cal_click_time=' + sTime + '&sc_cal_click_allday=' + allDay + '&script_case_init=<?php echo $this->Ini->sc_page ?>&nmgp_outra_jan=true&nmgp_url_saida=modal&TB_iframe=true&modal=true&height=500&width=700', '');
<?php
}

?>
<?php
       }
?>
      },
      eventClick: function(calEvent, jsEvent, view) {
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
        scEditEvent(calEvent.id);
<?php
}
else
{
?>
        tb_show('', 'calendar_cita_mob.php?nmgp_opcao=igual_calendar&citid=' + calEvent.id + '&__orig_citid=' + calEvent.id + '&script_case_init=<?php echo $this->Ini->sc_page ?>&nmgp_outra_jan=true&nmgp_url_saida=modal&TB_iframe=true&modal=true&height=500&width=700', '');
<?php
}

?>
      },
      eventDrop: function(event, delta, revertFunc) {
        $.ajax({
          url: 'calendar_cita_mob.php',
          type: 'POST',
          dataType: 'json',
          data: { 'script_case_init': '<?php echo $this->Ini->sc_page ?>', 'nmgp_opcao': 'calendar_drop', 'sc_event_id': event.id, 'sc_day_delta': delta._data.days, 'sc_time_delta': (delta._data.hours * 60) + delta._data.minutes, 'sc_all_day': event.allDay, 'sc_fullcal_start': (event._start && event._start._d ? event._start._d.toISOString() : ''), 'sc_fullcal_end': (event._end && event._end._d ? event._end._d.toISOString() : '') },
          originalEvent: event,
          success: function(data) {
            var bChanged = false;
            if (typeof data['status'] !== "undefined" && false == data['status']) {
              revertFunc();
            }
            else {
              if (typeof data['backgroundColor'] !== "undefined" && '' != data['backgroundColor']) {
                if (this.originalEvent.backgroundColor != data['backgroundColor']) {
                  bChanged = true;
                }
                this.originalEvent.backgroundColor = data['backgroundColor'];
              }
              if (typeof data['borderColor'] !== "undefined" && '' != data['borderColor']) {
                if (this.originalEvent.borderColor != data['borderColor']) {
                  bChanged = true;
                }
                this.originalEvent.borderColor = data['borderColor'];
              }
              if (this.originalEvent.allDay || this.originalEvent.originalAllDay || bChanged) {
                $('#calendar').fullCalendar('refetchEvents');
              }
              else {
                $('#calendar').fullCalendar('updateEvent', this.originalEvent);
              }
            }
            if (typeof data['message'] !== "undefined" && '' != data['message']) {
              alert(data['message']);
            }
          }
        });
      },
      eventResize: function(event, delta, revertFunc) {
        $.post(
          'calendar_cita_mob.php',
          { 'script_case_init': '<?php echo $this->Ini->sc_page ?>', 'nmgp_opcao': 'calendar_resize', 'sc_event_id': event.id, 'sc_day_delta': delta._data.days, 'sc_time_delta': (delta._data.hours * 60) + delta._data.minutes, 'sc_fullcal_start': (event._start && event._start._d ? event._start._d.toISOString() : ''), 'sc_fullcal_end': (event._end && event._end._d ? event._end._d.toISOString() : '') },
          function(data) {
            if (false == data['status']) {
              revertFunc();
            }
            if (typeof data['message'] !== "undefined" && '' != data['message']) {
              alert(data['message']);
            }
          },
          'json'
        );
      },
      defaultView: 'agendaDay',
    });
  });
  function scAddNewEvent(sDate, sTime, allDay) {
    $("#sc-ui-nmgp_opcao").val("edit_novo");
    $("#sc-ui-click-date").val(sDate);
    $("#sc-ui-click-time").val(sTime);
    $("#sc-ui-click-allday").val(allDay);
    $("#sc-ui-form").submit();
  }
  function scEditEvent(sEventId) {
    $("#sc-ui-nmgp_opcao").val("igual");
    $("#sc-ui-event-id").val(sEventId);
    $("#sc-ui-form").submit();
  }

        function filterCategory(category) {
                if ($("#id_calendar_category_" + category).hasClass('scCalendarCategoryItemActive')) {
                        $("#id_calendar_category_" + category).removeClass('scCalendarCategoryItemActive');
                }
                else {
                        $("#id_calendar_category_" + category).addClass('scCalendarCategoryItemActive');
                }

                refreshFilterCategories();
        }

        function refreshFilterCategories() {
                $('#calendar').fullCalendar('removeEventSource', 'calendar_cita_mob.php?script_case_init=<?php echo $this->Ini->sc_page ?>&nmgp_opcao=calendar_fetch' + getCategory(false));

                setCategory();

                $('#calendar').fullCalendar('addEventSource', 'calendar_cita_mob.php?script_case_init=<?php echo $this->Ini->sc_page ?>&nmgp_opcao=calendar_fetch' + getCategory(false));
        }

        function setCategory() {
                var selectedCategories = $(".scCalendarCategoryItemActive"), categoryList = new Array(), i;

                for (i = 0; i < selectedCategories.length; i++) {
                        categoryList.push($(selectedCategories[i]).attr("id").substr(21));
                }

                $("#category_filter").val(categoryList.join(")SCCL)"))
        }

        function getCategory(isPrint) {
                var categoryFilter = $("#category_filter");

                if (!categoryFilter.length) {
                        return "";
                }
                else if (isPrint) {
                        return categoryFilter.val();
                }
                else {
                        return "&category=" + categoryFilter.val();
                }
        }
 </script>
</head>
<body class="scAppCalendarPage" style="">
<style type="text/css">
.sc-cal-page-container {
    display: flex;
    flex-direction: row;
}
.sc-cal-side-container {
    display: flex;
    flex-direction: column;
    min-width: 250px;
    max-width: 300px;
}
.sc-cal-calendar-container {
    display: flex;
}
.sc-cal-button-container {
    display: flex;
    margin: 0 0 5px 0;
}
.sc-cal-categories-container {
    overflow: hidden;
    white-space: nowrap;
}
a#id_bcalendargoogleimport {
    white-space: nowrap;
}
a#id_bcalendargoogleexport {
    white-space: nowrap;
}
</style>
<div class='scCalendarBorder sc-cal-page-container'>
    <?php
if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['dashboard_info']['under_dashboard']) {
?>
<style type="text/css">
BODY { margin: 0 !important }
</style>
<?php
}
?>
<div class="sc-cal-side-container">
<div id="calendar_mini"></div>
     <script type="text/javascript">$(function() { refreshFilterCategories(); });</script>
     <div class='scCalendarCategory'>
      <div class='scCalendarCategoryTitle'><?php echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_categories"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></div>
       <input type='hidden' value='' id='category_filter' name='category_filter' />
       <div class='scCalendarCategoryItemsMoldura sc-cal-categories-container'>
<?php
$categoryLookup = $this->Form_lookup_agesecuen();
foreach ($categoryLookup as $categoryData)
{
        if (!empty($categoryData) && strpos($categoryData, '?#?') !== false)
        {
                $categoryParts = explode('?#?', $categoryData);
                if (!isset($categoryParts[3]))
                {
                        $categoryParts[3] = '';
                }
?>
        <div class='scCalendarCategoryItem scCalendarCategoryItemActive' onclick="filterCategory('<?php echo $categoryParts[1] ?>')" id='id_calendar_category_<?php echo $categoryParts[1] ?>'>
         <div style='width:16px; height:16px; display: inline-block; margin: 0px 2px; border-style: solid; border-width: 1px; border-color: <?php echo $categoryParts[3] ?>; background-color: <?php echo $categoryParts[3] ?>;'></div>
                 <?php echo $categoryParts[0] ?>
        </div>
<?php
        }
}
?>
        <div class='scCalendarCategoryItem scCalendarCategoryItemActive' onclick="filterCategory('SCNULLCAT')" id='id_calendar_category_SCNULLCAT'>
         <div style='width:16px; height:16px; display: inline-block; margin: 0px 2px; border-style: solid; border-width: 1px; border-color: #000; background-color: #fff;'></div>
                 <?php echo $this->Ini->Nm_lang['lang_calendar_no_category']; ?>
        </div>
       </div>
      </div>
     </div>

    <div class="sc-cal-calendar-container">
    <div id="calendar" style="min-width: 260px; display:inline-block; margin-left:4px; vertical-align: top;"></div>
    </div>
</div>
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
<form name="F1" id="sc-ui-form" method="post"
      action="calendar_cita.php"
      target="_self">
 <input type="hidden" name="nm_form_submit" value="1" />
 <input type="hidden" name="nmgp_url_saida" value="" />
 <input type="hidden" name="nmgp_opcao" id="sc-ui-nmgp_opcao" value="" />
 <input type="hidden" name="nmgp_parms" value="" />
 <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>" />
 <input type="hidden" name="sc_cal_click_date" id="sc-ui-click-date" value="" />
 <input type="hidden" name="sc_cal_click_time" id="sc-ui-click-time" value="" />
 <input type="hidden" name="sc_cal_click_allday" id="sc-ui-click-allday" value="" />
 <input type="hidden" name="citid" id="sc-ui-event-id" value="" />
</form>
<?php
}

?>
<form name="F6" method="post" action="./" target="_self">
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>" />
</form>
</body>
</html>
<?php
   } // calendarOutputDisplay

   function calendarOutputJson($returnArray, $integerIndexes = false)
   {
       if (!isset($_GET['nmgp_opcao']) || ($_GET['nmgp_opcao'] != 'igual' && $_GET['nmgp_opcao'] != 'edit_novo'))
       {
            $Temp = ob_get_clean();
       }
       $returnFinal = array();
       foreach ($returnArray as $arrayKey => $arrayValue) {
           if ($integerIndexes) {
               $returnFinal[] = $arrayValue;
           } else {
               $returnFinal[$arrayKey] = $arrayValue;
           }
       }
       $oJson = new Services_JSON();
       echo $oJson->encode($returnFinal);
   } // calendarOutputJson

   function calendarOutputReload()
   {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html']; ?>" />
 <title></title>
 <script type="text/javascript" src="<?php echo $this->Ini->url_third; ?>jquery/js/jquery.js"></script>
<form name="fsai" method="post" action="<?php echo $_SESSION['scriptcase']['sc_url_saida'][$script_case_init]; ?>">
<input type=hidden name="script_case_init" value="<?php  echo $this->form_encode_input($script_case_init); ?>"> 
</form>
<SCRIPT LANGUAGE="Javascript">
   nm_ver_saida = "<?php echo $_SESSION['scriptcase']['sc_url_saida'][$script_case_init]; ?>";
   nm_ver_saida = nm_ver_saida.toLowerCase();
   if (nm_ver_saida.substr(0, 4) != ".php" && (nm_ver_saida.substr(0, 7) == "http://" || nm_ver_saida.substr(0, 8) == "https://" || nm_ver_saida.substr(0, 3) == "../")) 
   { 
       window.location = ("<?php echo $_SESSION['scriptcase']['sc_url_saida'][$script_case_init]; ?>"); 
   } 
   else 
   { 
       document.fsai.submit();
   } 
</SCRIPT>
</head>
<body>
</body>
</html>
<?php
   } // calendarOutputReload

   function calendarFetchEvents($sId = '', $bPrintCalendar = false)
   {
       $aEvents = array_merge($this->calendarFetchNormalEvents($sId, $bPrintCalendar), $this->calendarFetchRecurrentEvents($sId));

       $categoryLookup = $this->Form_lookup_agesecuen();
       $categoryColors = array();
       foreach ($categoryLookup as $categoryData)
       {
           if (!empty($categoryData) && strpos($categoryData, '?#?') !== false)
           {
               $categoryParts = explode('?#?', $categoryData);
               if (isset($categoryParts[3]))
               {
                   $categoryColors[ $categoryParts[1] ] = $categoryParts[3];
               }
           }
       }

       foreach ($aEvents as $iEvent => $aEventData)
       {
           if ((!isset($aEventData['event_color']) || '' == $aEventData['event_color']) && isset($aEventData['category']) && '' != $aEventData['category'] && isset($categoryColors[ $aEventData['category'] ]))
           {
               $aEventData['event_color'] = $categoryColors[ $aEventData['category'] ];
           }
           if (isset($aEventData['event_color']))
           {
               $aEvents[$iEvent]['backgroundColor'] = $aEventData['event_color'];
               $aEvents[$iEvent]['borderColor']     = $aEventData['event_color'];
           }
           if ($aEventData['start'] < date('Y-m-d'))
           {
               $aEvents[$iEvent]['className'] = $this->calendarConfigValues['eventColorPast'];
           }
           elseif ($aEventData['start'] > date('Y-m-d'))
           {
               $aEvents[$iEvent]['className'] = $this->calendarConfigValues['eventColorFuture'];
           }
           else
           {
               $aEvents[$iEvent]['className'] = $this->calendarConfigValues['eventColorToday'];
           }
       }

       return $aEvents;
   } // calendarFetchEvents

   function calendarFetchNormalEvents($sId, $bPrintCalendar = false, $filter = null)
   {
       $aSelect = $this->calendarFetchSelect(null !== $filter);

       $whereClause = $this->calendarWhere($sId, false, $bPrintCalendar, $filter);
       if (false === $whereClause) {
           return array();
       }

       $sSql = 'SELECT ' . implode(', ', $aSelect)
             . ' FROM '  . $this->Ini->nm_tabela
             . $whereClause;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $sSql; 
       $oRs = $this->Db->Execute($sSql);

       $aEvents = array();

       while ($oRs && !$oRs->EOF)
       {
           $aEvent = array();

           $iSql = 0;
           foreach ($aSelect as $sFldName => $sFldSql)
           {
               if ('title' == $sFldName || 'description' == $sFldName)
               {
                   $aEvent[$sFldName] = NM_charset_to_utf8($oRs->fields[$iSql]);
               }
               else
               {
                   $aEvent[$sFldName] = $oRs->fields[$iSql];
               }
               $iSql++;
           }

           $aEvents[] = $aEvent;

           $oRs->MoveNext();
       }

       return $aEvents;
   } // calendarFetchNormalEvents

   function calendarFetchRecurrentEvents($sId, $bPrintCalendar = false)
   {
       if ('' != $sId)
       {
           return array();
       }

       $aSelect = $this->calendarFetchSelect();

       $whereClause = $this->calendarWhere($sId, true, $bPrintCalendar);
       if (false === $whereClause) {
           return array();
       }

       $sSql = 'SELECT ' . implode(', ', $aSelect)
             . ' FROM '  . $this->Ini->nm_tabela
             . $whereClause;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $sSql; 
       $oRs = $this->Db->Execute($sSql);

           $calendarDisplayStart = isset($_GET['start']) && '' != $_GET['start'] ? str_replace('-', '', $_GET['start']) : '';
           $calendarDisplayEnd   = isset($_GET['end'])   && '' != $_GET['end']   ? str_replace('-', '', $_GET['end'])   : '';

       $aEvents = array();

       while ($oRs && !$oRs->EOF)
       {
           $aEvent = array('recur_info' => null);

           $iSql = 0;
           foreach ($aSelect as $sFldName => $sFldSql)
           {
               if ('title' == $sFldName)
               {
                   $aEvent[$sFldName] = NM_charset_to_utf8($oRs->fields[$iSql]);
               }
               elseif ('recur_info' == $sFldName)
               {
                   $aEvent[$sFldName] = json_decode($oRs->fields[$iSql]);
               }
               else
               {
                   $aEvent[$sFldName] = $oRs->fields[$iSql];
               }
               $iSql++;
           }

           switch ($aEvent['period'])
           {
               case 'D':
                   $this->calendarRecurrentDay($aEvents, $aEvent, $calendarDisplayStart, $calendarDisplayEnd);
                   break;

               case 'W':
                   $this->calendarRecurrentWeek($aEvents, $aEvent, $calendarDisplayStart, $calendarDisplayEnd);
                   break;

               case 'M':
                   $this->calendarRecurrentMonth($aEvents, $aEvent, $calendarDisplayStart, $calendarDisplayEnd);
                   break;

               case 'A':
                   $this->calendarRecurrentYear($aEvents, $aEvent, $calendarDisplayStart, $calendarDisplayEnd);
                   break;
           }

           $oRs->MoveNext();
       }

       return $aEvents;
   } // calendarFetchRecurrentEvents

   function calendarFetchSelect($googleInfo = false)
   {
       $aSelect = array();

       $aSelect['id'] = "citid";

       $aSelect['title'] = "cittitulo";

       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
       {
           $aSelect['start'] = "convert(char(23),citfecha,121)";
       }
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
       {
           $aSelect['start'] = "str_replace(convert(char(10),citfecha,102), '.', '-') + ' ' + convert(char(8),citfecha,20)";
       }
       else
       {
           $aSelect['start'] = "citfecha";
       }

       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
       {
           $aSelect['end'] = "convert(char(23),citfecha,121)";
       }
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
       {
           $aSelect['end'] = "str_replace(convert(char(10),citfecha,102), '.', '-') + ' ' + convert(char(8),citfecha,20)";
       }
       else
       {
           $aSelect['end'] = "citfecha";
       }

       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
       {
           $aSelect['start_time'] = "convert(char(8),cithoraini,108)";
       }
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
       {
           $aSelect['start_time'] = "str_replace(convert(char(10),cithoraini,102), '.', '-') + ' ' + convert(char(8),cithoraini,20)";
       }
       else
       {
           $aSelect['start_time'] = "cithoraini";
       }

       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
       {
           $aSelect['end_time'] = "convert(char(8),cithorafin,108)";
       }
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
       {
           $aSelect['end_time'] = "str_replace(convert(char(10),cithorafin,102), '.', '-') + ' ' + convert(char(8),cithorafin,20)";
       }
       else
       {
           $aSelect['end_time'] = "cithorafin";
       }

       $aSelect['event_color'] = "citcolor";

       $aSelect['category'] = "agesecuen";

       $aSelect['recurrence'] = "citrecurr";
       $aSelect['period'] = "citperiod";
       $aSelect['recur_info'] = "citrecurrinfo";

       if ($googleInfo) {
       }

       return $aSelect;
   } // calendarFetchSelect

   function calendarWhere($sId, $bRecur = false, $bPrintCalendar = false, $filter = null)
   {
       if ('' != $sId)
       {
           return " WHERE citid = " . $sId;
       }

       $aWhere = array();

       if (null === $filter) {
           $sStart      = isset($_GET['start'])    && '' != $_GET['start']    ? $_GET['start']    : '';
           $sEnd        = isset($_GET['end'])      && '' != $_GET['end']      ? $_GET['end']      : '';
           $sCategory   = isset($_GET['category']) && '' != $_GET['category'] ? $_GET['category'] : '';

           if ('' != $sStart && '' != $sEnd)
           {
               $s_Ini_StartFormat = $sStart;
               $s_Ini_EndFormat   = $sEnd;
               if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
               {
                   $aWhere[] = "convert(char(23),citfecha,121) >= '" . $s_Ini_StartFormat . "' AND convert(char(23),citfecha,121) <= '" . $s_Ini_EndFormat . "'";
               }
               elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
               {
                   $aWhere[] = "str_replace(convert(char(10),citfecha,102), '.', '-') + ' ' + convert(char(8),citfecha,20) >= '" . $s_Ini_StartFormat . "' AND str_replace(convert(char(10),citfecha,102), '.', '-') + ' ' + convert(char(8),citfecha,20) <= '" . $s_Ini_EndFormat . "'";
               }
               elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
               {
                   $aWhere[] = "citfecha >= #" . $s_Ini_StartFormat . "# AND citfecha <= #" . $s_Ini_EndFormat . "#";
               }
               else
               {
                   $aWhere[] = "citfecha >= '" . $s_Ini_StartFormat . "' AND citfecha <= '" . $s_Ini_EndFormat . "'";
               }

               if (!$bPrintCalendar)
               {
                   $s_Fin_StartFormat = date('Y-m-d', $this->calendarFullcalendarToTimestamp($sStart));
                   $s_Fin_EndFormat   = date('Y-m-d', $this->calendarFullcalendarToTimestamp($sEnd));
               }
               else
               {
                   $s_Fin_StartFormat = $sStart;
                   $s_Fin_EndFormat   = $sEnd;
               }
               if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
               {
                   $aWhere[] = "convert(char(23),citfecha,121) >= '" . $s_Fin_StartFormat . "' AND convert(char(23),citfecha,121) <= '" . $s_Fin_EndFormat . "'";
                   $aWhere[] = "convert(char(23),citfecha,121) <= '" . $s_Ini_StartFormat . "' AND convert(char(23),citfecha,121) >= '" . $s_Fin_EndFormat . "'";
               }
               elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
               {
                   $aWhere[] = "str_replace(convert(char(10),citfecha,102), '.', '-') + ' ' + convert(char(8),citfecha,20) >= '" . $s_Fin_StartFormat . "' AND str_replace(convert(char(10),citfecha,102), '.', '-') + ' ' + convert(char(8),citfecha,20) <= '" . $s_Fin_EndFormat . "'";
                   $aWhere[] = "str_replace(convert(char(10),citfecha,102), '.', '-') + ' ' + convert(char(8),citfecha,20) <= '" . $s_Ini_StartFormat . "' AND str_replace(convert(char(10),citfecha,102), '.', '-') + ' ' + convert(char(8),citfecha,20) >= '" . $s_Fin_EndFormat . "'";
               }
               elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
               {
                   $aWhere[] = "citfecha >= #" . $s_Fin_StartFormat . "# AND citfecha <= #" . $s_Fin_EndFormat . "#";
                   $aWhere[] = "citfecha <= #" . $s_Ini_StartFormat . "# AND citfecha >= #" . $s_Fin_EndFormat . "#";
               }
               else
               {
                   $aWhere[] = "citfecha >= '" . $s_Fin_StartFormat . "' AND citfecha <= '" . $s_Fin_EndFormat . "'";
                   $aWhere[] = "citfecha <= '" . $s_Ini_StartFormat . "' AND citfecha >= '" . $s_Fin_EndFormat . "'";
               }
           }

           $aFinal = array('(' . implode(') OR (', $aWhere) . ')');
           if ('' != $sCategory)
           {
               $categoryList  = explode(')SCCL)', $sCategory);
               $categoryRules = array();
               foreach ($categoryList as $categoryItem)
               {
                   if ('SCNULLCAT' == $categoryItem) {
                       $categoryRules[] = "(agesecuen = 0 OR agesecuen IS NULL)";
                   }
                   else {
                       $categoryRules[] = "agesecuen = {$categoryItem}";
                   }
               }
               $aFinal[] = '(' . implode(' OR ', $categoryRules) . ')';
           }
           else
           {
               return false;
           }

           $aFinal[] = "citrecurr " . ($bRecur ? "=" : "<>") . " 'Y'";
       }
       else {
           $aRules = array();
           if (!$filter['_sc_evt_all'] && $filter['_sc_evt_empty']) {
               $aRules[] = " = ''";
           }
           if (!$filter['_sc_evt_all'] && $filter['_sc_evt_google']) {
               $aRules[] = " = '" . $_POST['sc_calendar_id'] . "'";
           }

           $aFinal = !empty($aRules) ? array('(' . implode(') OR (', $aRules) . ')') : array();
       }

       $cWhere = array();
       $sc_where_filter = '';
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_filter_form'])
       {
           $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_filter_form'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_filter'])
       {
           if (empty($sc_where_filter))
           {
               $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_filter'];
           }
           else
           {
               $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_filter'] . ")";
           }
       }
       $cWhere[] = "citanula=0 and citfactur<3";
       $cWhere[] = $sc_where_filter;
       $wUsr     = $this->returnWhere($cWhere);
       if (!empty($wUsr))
       {
           $aFinal[] = substr(trim($wUsr), 5);
       }

       return empty($aFinal) ? '' : ' WHERE (' . implode(') AND (', $aFinal) . ')';
   } // calendarWhere

    function calendarRecurrentDay(&$eventsToDisplay, $thisEvent, $calendarDisplayStart, $calendarDisplayEnd) {
        $this->calendarRecurrence(
            $eventsToDisplay,
            $thisEvent,
            $this->calendarRecurrenceParams($thisEvent, $calendarDisplayStart, $calendarDisplayEnd, 'daily')
        );
    } // calendarRecurrentDay

    function calendarRecurrentWeek(&$eventsToDisplay, $thisEvent, $calendarDisplayStart, $calendarDisplayEnd) {
        $this->calendarRecurrence(
            $eventsToDisplay,
            $thisEvent,
            $this->calendarRecurrenceParams($thisEvent, $calendarDisplayStart, $calendarDisplayEnd, 'weekly')
        );
    } // calendarRecurrentWeek

    function calendarRecurrentMonth(&$eventsToDisplay, $thisEvent, $calendarDisplayStart, $calendarDisplayEnd) {
        $this->calendarRecurrence(
            $eventsToDisplay,
            $thisEvent,
            $this->calendarRecurrenceParams($thisEvent, $calendarDisplayStart, $calendarDisplayEnd, 'monthly')
        );
    } // calendarRecurrentMonth

    function calendarRecurrentYear(&$eventsToDisplay, $thisEvent, $calendarDisplayStart, $calendarDisplayEnd) {
        $this->calendarRecurrence(
            $eventsToDisplay,
            $thisEvent,
            $this->calendarRecurrenceParams($thisEvent, $calendarDisplayStart, $calendarDisplayEnd, 'yearly')
        );
    } // calendarRecurrentYear

    function calendarRecurrence(&$eventsToDisplay, $thisEvent, $params) {
        if (isset($thisEvent['recur_info'])) {
            switch ($thisEvent['recur_info']->endon) {
                case 'N': // never
                    $this->calendarRecurrenceNever($eventsToDisplay, $thisEvent, $params);
                    return;

                case 'A': // after X occurrences
                    $this->calendarRecurrenceAfterOccurrences($eventsToDisplay, $thisEvent, $params);
                    return;

                case 'I': // in X date
                    $this->calendarRecurrenceInDate($eventsToDisplay, $thisEvent, $params);
                    return;
            }
        }

        $this->calendarRecurrenceOnEvent($eventsToDisplay, $thisEvent, $params);
    } // calendarRecurrence

    function calendarRecurrenceParams($thisEvent, $calendarDisplayStart, $calendarDisplayEnd, $period) {
        $startTimestamp = $this->calendarStartToTimestamp($thisEvent);
        $startDate      = date('Ymd', $startTimestamp);
        $startTime      = date('His', $startTimestamp);

        $endTimestamp = $this->calendarEndToTimestamp($thisEvent);
        if (false === $endTimestamp) {
            $endTimestamp = $startTimestamp;
        }
        $endDate = date('Ymd', $endTimestamp);
        $endTime = date('His', $endTimestamp);

        $params = array(
            'displayStartDate' => $calendarDisplayStart,
            'displayEndDate'   => $calendarDisplayEnd,
            'startDate'        => $startDate,
            'startTime'        => $startTime,
            'endDate'          => $endDate,
            'testEndDate'      => $endDate,
            'endTime'          => $endTime,
            'period'           => $period,
            'repeat'           => !isset($thisEvent['recur_info']) ? 1  : $thisEvent['recur_info']->repeat,
            'endafter'         => !isset($thisEvent['recur_info']) ? '' : $thisEvent['recur_info']->endafter,
            'endin'            => !isset($thisEvent['recur_info']) ? '' : str_replace('-', '', $thisEvent['recur_info']->endin),
            'daysToAdd'        => array(),
            'forceEndToStart'  => false
        );

        if (isset($thisEvent['recur_info']) && 'weekly' == $period && '' != $thisEvent['recur_info']->repeatin) {
            $params['daysToAdd'] = explode(';', $thisEvent['recur_info']->repeatin);
        }

        return $params;
    } // calendarRecurrenceParams

    function calendarRecurrenceOnEvent(&$eventsToDisplay, $thisEvent, $params) {
        $params['endafter']        = 0;
        $params['forceEndToStart'] = true;

        $this->calendarRecurrenceGetEvents($eventsToDisplay, $thisEvent, $params);
    } // calendarRecurrenceOnEvent

    function calendarRecurrenceNever(&$eventsToDisplay, $thisEvent, $params) {
        $params['endDate']  = $params['displayEndDate'];
        $params['endafter'] = 0;

        $this->calendarRecurrenceGetEvents($eventsToDisplay, $thisEvent, $params);
    } // calendarRecurrenceNever

    function calendarRecurrenceAfterOccurrences(&$eventsToDisplay, $thisEvent, $params) {
        $params['endDate'] = $params['displayEndDate'];

        $this->calendarRecurrenceGetEvents($eventsToDisplay, $thisEvent, $params);
    } // calendarRecurrenceAfterOccurrences

    function calendarRecurrenceInDate(&$eventsToDisplay, $thisEvent, $params) {
        $params['endDate']  = $params['endin'];
        $params['endafter'] = 0;

        $this->calendarRecurrenceGetEvents($eventsToDisplay, $thisEvent, $params);
    } // calendarRecurrenceInDate

    function calendarRecurrenceGetEvents(&$eventsToDisplay, $thisEvent, $params) {
    $params['displayStartDate'] = $this->calendarGetDateOnly($params['displayStartDate']);
    $params['displayEndDate']   = $this->calendarGetDateOnly($params['displayEndDate']);
    $params['startDate']        = $this->calendarGetDateOnly($params['startDate']);
    $params['endDate']          = $this->calendarGetDateOnly($params['endDate']);

        $thisStartDate  = $params['startDate'];
        $thisEndDate    = $params['testEndDate'];
        $periodCount    = 1;
        $skip           = 0;
        $occurences     = 0;
        $daysCorrection = array('SU' => 0, 'MO' => 1, 'TU' => 2, 'WE' => 3, 'TH' => 4, 'FR' => 5, 'SA' => 6);

        while ($thisStartDate < $params['displayEndDate']) {
            if ($thisStartDate <= $params['endDate']) {
                $addEvent = true;

                if (1 < $params['repeat']) {
                    $skip++;

                    if (1 < $skip) {
                        if ($skip == $params['repeat']) {
                            $skip  = 0;
                        }

                        $addEvent = false;
                    }
                }

                if ($addEvent) {
                    // add date only
                    if (empty($params['daysToAdd'])) {
                        if ($params['displayStartDate'] <= $thisStartDate) {
                            $newEvent = $thisEvent;
                            $this->calendarTimestampToStart($newEvent, $this->calendarGetMktime($thisStartDate, $params['startTime']), $newEvent['allDay']);
                            if ($params['forceEndToStart']) {
                                $this->calendarTimestampToEnd($newEvent, $this->calendarGetMktime($thisStartDate, $params['endTime']), $newEvent['allDay']);
                            }
                            else {
                                $this->calendarTimestampToEnd($newEvent, $this->calendarGetMktime($thisEndDate, $params['endTime']), $newEvent['allDay']);
                            }

                            $eventsToDisplay[] = $newEvent;
                        }

                        $occurences++;

                        if (0 < $params['endafter'] && $occurences >= $params['endafter']) {
                            break;
                        }
                    }
                    // add specific week days based on date
                    else {
                        $diffToSunday = date('w', strtotime($thisStartDate));
                        $sundayDate   = $this->calendarRecurrentAddDay($thisStartDate, $diffToSunday * -1);

                        foreach ($params['daysToAdd'] as $newDay) {
                            $newDate = $this->calendarRecurrentAddDay($sundayDate, $daysCorrection[$newDay]);

                            if ($params['displayEndDate'] > $newDate && $newDate <= $params['endDate']) {
                                if ($params['displayStartDate'] <= $newDate) {
                                    $newEvent = $thisEvent;
                                    $this->calendarTimestampToStart($newEvent, $this->calendarGetMktime($newDate, $params['startTime']), $newEvent['allDay']);
                                    $this->calendarTimestampToEnd($newEvent, $this->calendarGetMktime($newDate, $params['endTime']), $newEvent['allDay']);

                                    $eventsToDisplay[] = $newEvent;
                                }

                                $occurences++;

                                if (0 < $params['endafter'] && $occurences >= $params['endafter']) {
                                    break 2;
                                }
                            }
                        }
                    }
                }
            }

            $this->calendarRecurrenceAddPeriod($params['period'], $periodCount, $thisStartDate, $thisEndDate, $params['startDate'], $params['testEndDate']);

            $periodCount++;
        }
    } // calendarRecurrenceGetEvents

    function calendarGetDateOnly($date) {
    if (false !== strpos($date, 'T')) {
      $parts = explode('T', $date);
      return $parts[0];
    }

    return $date;
    } // calendarGetDateOnly

    function calendarRecurrenceAddPeriod($period, $periodCount, &$thisStart, &$thisEnd, $start, $end) {
        switch ($period) {
            case 'daily':
                $thisStart = $this->calendarRecurrentAddDay($start, $periodCount);
                $thisEnd   = $this->calendarRecurrentAddDay($end, $periodCount);
                break;

            case 'weekly':
                $thisStart = $this->calendarRecurrentAddDay($start, $periodCount * 7);
                $thisEnd   = $this->calendarRecurrentAddDay($end, $periodCount * 7);
                break;

            case 'monthly':
                $thisStart = $this->calendarRecurrentAddMonth($start, $periodCount);
                $thisEnd   = $this->calendarRecurrentAddMonth($end, $periodCount);
                break;

            case 'yearly':
                $thisStart = $this->calendarRecurrentAddYear($start, $periodCount);
                $thisEnd   = $this->calendarRecurrentAddYear($end, $periodCount);
                break;
        }
    } // calendarRecurrenceAddPeriod

   function calendarRecurrentAddDay($sDate, $iAdd)
   {
       $iDate = $this->calendarGetMktime($sDate, '000000', $iAdd);

       return date('Ymd', $iDate);
   } // calendarRecurrentAddDay

   function calendarRecurrentAddMonth($sDate, $iAdd)
   {
       $iYear  = (integer) substr($sDate, 0, 4);
       $iMonth = (integer) substr($sDate, 4, 2) + $iAdd;
       $iDay   = (integer) substr($sDate, 6, 2);

       while (12 < $iMonth)
       {
           $iMonth -= 12;
           $iYear++;
       }

       if (2 == $iMonth && !$this->calendarIsLeapYear($iYear) && 28 < $iDay)
       {
           $sDate = $iYear . '0228';
       }
       elseif (2 == $iMonth && $this->calendarIsLeapYear($iYear) && 29 < $iDay)
       {
           $sDate = $iYear . '0228';
       }
       elseif (in_array($iMonth, array(4, 6, 9, 11)) && 31 == $iDay)
       {
           $sDate = $iYear . (10 > $iMonth ? '0' . $iMonth : $iMonth) . '30';
       }
       else
       {
           $sDate = $iYear . (10 > $iMonth ? '0' . $iMonth : $iMonth) . substr($sDate, 6);
       }

       return $sDate;
   } // calendarRecurrentAddMonth

   function calendarRecurrentAddYear($sDate, $iAdd)
   {
       $iYear  = substr($sDate, 0, 4) + $iAdd;
       $iMonth = (integer) substr($sDate, 4, 2);
       $iDay   = (integer) substr($sDate, 6, 2);

       if (2 == $iMonth && !$this->calendarIsLeapYear($iYear) && 29 == $iDay)
       {
           $sDate = $iYear . '0228';
       }
       else
       {
           $sDate = $iYear . substr($sDate, 4);
       }

       return $sDate;
   } // calendarRecurrentAddYear

   function calendarIsLeapYear(&$iYear)
   {
       if ($iYear % 4 != 0)
       {
           return false;
       }
       else
       {
           if ($iYear % 100 != 0)
           {
               return true;
           }
           else
           {
               if ($iYear % 400 != 0)
               {
                   return false;
               }
               else
               {
                   return true;
               }
           }
       }
   } // calendarIsLeapYear

   function calendarHandleEvents($aEvents)
   {
       foreach ($aEvents as $i => $aEventData)
       {
           if (false !== strpos($aEventData['start'], ' '))
           {
               $aTemp               = explode(' ', $aEventData['start']);
               $aEventData['start'] = $aTemp[0];
           }
           if (false !== strpos($aEventData['start_time'], ' '))
           {
               $aTemp                    = explode(' ', $aEventData['start_time']);
               $aEventData['start_time'] = $aTemp[1];
           }
           if (8 < strlen($aEventData['start_time']))
           {
               $aEventData['start_time'] = substr($aEventData['start_time'], 0, 8);
           }
           if (false !== strpos($aEventData['end'], ' '))
           {
               $aTemp             = explode(' ', $aEventData['end']);
               $aEventData['end'] = $aTemp[0];
           }
           if (false !== strpos($aEventData['end_time'], ' '))
           {
               $aTemp                  = explode(' ', $aEventData['end_time']);
               $aEventData['end_time'] = $aTemp[1];
           }
           if (8 < strlen($aEventData['end_time']))
           {
               $aEventData['end_time'] = substr($aEventData['end_time'], 0, 8);
           }

           $aEvents[$i] = $aEventData;
       }

       return $aEvents;
   } // calendarHandleEvents

   function calendarNormalizeEvents($aEvents)
   {
       $aEvents = $this->calendarHandleEvents($aEvents);

       foreach ($aEvents as $i => $aEventData)
       {
           if ((isset($aEventData['id']) && '' == $aEventData['id']) || (isset($aEventData['title']) && '' == $aEventData['title']) || (isset($aEventData['start']) && '' == $aEventData['start']))
           {
               unset($aEvents[$i]);
           }
           else
           {

               $bStartTime = false;
               $bEndTime   = false;

               if (isset($aEventData['start_time']) && '' == $aEventData['start_time'])
               {
                   unset($aEventData['start_time']);
               }

               if (isset($aEventData['end']) && '' == $aEventData['end'])
               {
                   unset($aEventData['end']);
                   unset($aEventData['end_time']);
               }
               elseif (isset($aEventData['end_time']) && '' == $aEventData['end_time'])
               {
                   unset($aEventData['end_time']);
               }

               if ((isset($aEventData['start_time']) && ('' == $aEventData['start_time'] || '00:00:00' == $aEventData['start_time'])) && (isset($aEventData['end_time']) && ('' == $aEventData['end_time'] || '00:00:00' == $aEventData['end_time'])))
               {
                   unset($aEventData['start_time']);
                   unset($aEventData['end_time']);
               }


               if (isset($aEventData['start']) && isset($aEventData['start_time']))
               {
                   $aEventData['start'] .= ' ' . $aEventData['start_time'];
                   unset($aEventData['start_time']);
                   $bStartTime = true;
               }
               if (isset($aEventData['end']) && isset($aEventData['end_time']))
               {
                   $aEventData['end'] .= ' ' . $aEventData['end_time'];
                   unset($aEventData['end_time']);
                   $bEndTime = true;
               }

               if ($bStartTime)
               {
                   $aEventData['allDay'] = false;
               }
               else
               {
                   $aEventData['allDay'] = true;
               }

               if ($aEventData['allDay'] && isset($aEventData['end']) && '' != $aEventData['end'] && $aEventData['start'] < $aEventData['end'])
               {
                   $mktime = mktime(0, 0, 0,
                       (integer) substr($aEventData['end'], 5, 2),
                       ((integer) substr($aEventData['end'], 8, 2)) + 1,
                       (integer) substr($aEventData['end'], 0, 4));
                   $aEventData['end'] = date('Y-m-d', $mktime);
               }

               $aEvents[$i] = $aEventData;
           }
       }

       return $aEvents;
   } // calendarNormalizeEvents

   function calendarPrintEvents($aEvents)
   {
       $aEventHtml = array();
       $sPrintHtml = '';
       $sLastDay   = '';

       $sPrintHtml .= "<html" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\n";
       $sPrintHtml .= "<head>\n";
       $sPrintHtml .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
       $sPrintHtml .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_appcalendar.css\" />\n";
       $sPrintHtml .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_appcalendar" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" />\n";
       $sPrintHtml .= "<style type=\"text/css\">\n";
       $sPrintHtml .= ".sc-ui-cal-time { padding-left: 20px }\n";
       $sPrintHtml .= ".sc-ui-cal-event { padding-left: 35px }\n";
       $sPrintHtml .= "</style>\n";
       $sPrintHtml .= "</head>\n";
       $sPrintHtml .= "<body>\n";

       $sPrintHtml .= "" . $this->Ini->Nm_lang['lang_events_order'] . "<hr style=\"border-style: solid; border-width: 1px 0 0 0\"/><br />\n";
       foreach ($this->calendarPrintSort($aEvents) as $aEventData)
       {
           $aStartInfo = explode(' ', $aEventData['start']);
           $aEndInfo   = explode(' ', $aEventData['end']);
           if (!isset($aStartInfo[1]))
           {
               $aStartInfo[1] = '';
           }
           if (!isset($aEndInfo[1]))
           {
               $aEndInfo[1] = '';
           }

           $sEventHtml = '';

           if ('' == $sLastDay || $aStartInfo[0] != $sLastDay)
           {
               $sEventHtml .= '<div class="scCalendarPrintDate">' . sc_convert_encoding($this->calendarPrintFormatDate($aStartInfo[0]), 'UTF-8', $_SESSION['scriptcase']['charset']) . "</div>\n";
               $sLastDay = $aStartInfo[0];
           }
           $sEventHtml .= '<div class="scCalendarPrintTime sc-ui-cal-time">';
           if ('' == $aStartInfo[1])
           {
               $sEventHtml .= sc_convert_encoding($this->Ini->Nm_lang['lang_per_allday'], 'UTF-8', $_SESSION['scriptcase']['charset']);
           }
           elseif ($aEventData['start'] == $aEventData['end'])
           {
               $sEventHtml .= $aStartInfo[1];
           }
           else
           {
               $sEventHtml .= $aStartInfo[1] . ' ' . sc_convert_encoding($this->Ini->Nm_lang['lang_othr_txto'], 'UTF-8', $_SESSION['scriptcase']['charset']) . ' ' . $aEndInfo[1];
           }
           $sEventHtml .= "</div>\n";
           $sEventHtml .= '<div class="scCalendarPrintEvent sc-ui-cal-event">';
           $sEventHtml .= $aEventData['title'];
           $sEventHtml .= "</div>\n";

           $aEventHtml[] = $sEventHtml;
       }

       $sPrintHtml .= implode('<br />', $aEventHtml);

       $sPrintHtml .= "</body>\n";
       $sPrintHtml .= "</html>\n";

       $sTmpFile  = $this->Ini->path_imag_temp . '/sc_cal_print' . md5(session_id() . microtime()) . '.html';
       $rHtmlFile = @fopen($this->Ini->root . $sTmpFile, 'w');
       if ($rHtmlFile)
       {
           @fwrite($rHtmlFile, $sPrintHtml);
           @fclose($rHtmlFile);
           return array('outputFormat' => 'file', 'fileHtml' => $sTmpFile);
       }
       else
       {
           return array('outputFormat' => 'html', 'printHtml' => $sPrintHtml);
       }
   } // calendarPrintEvents

   function calendarPrintSort($aEvents)
   {
       $aUnsortedEvents = array();
       $aSortedEvents   = array();

       foreach ($aEvents as $aEventData)
       {
           if (!isset($aUnsortedEvents[ $aEventData['start'] ]))
           {
               $aUnsortedEvents[ $aEventData['start'] ] = array();
           }
           if (!isset($aUnsortedEvents[ $aEventData['start'] ][ $aEventData['end'] ]))
           {
               $aUnsortedEvents[ $aEventData['start'] ][ $aEventData['end'] ] = array();
           }
           $aUnsortedEvents[ $aEventData['start'] ][ $aEventData['end'] ][] = $aEventData;
       }

       ksort($aUnsortedEvents);
       foreach ($aUnsortedEvents as $aEventsEnd)
       {
           ksort($aEventsEnd);
           foreach ($aEventsEnd as $aEventList)
           {
               foreach ($aEventList as $aEventData)
               {
                   $aSortedEvents[] = $aEventData;
               }
           }
       }

       return $aSortedEvents;
   } // calendarPrintSort

   function calendarPrintFormatDate($sDate)
   {
       $aDateTime     = explode(' ', $sDate);
       $aDateParts    = explode('-', $aDateTime[0]);
       $iMktime       = mktime(0, 0, 0, $aDateParts[1], $aDateParts[2], $aDateParts[0]);
       $sFormatString = "l, F j";
       $sFormatted    = '';
       $bSlash        = false;

       for ($i = 0; $i < strlen($sFormatString); $i++)
       {
           $sFormatChar = $sFormatString[$i];
           if (!$bSlash && "\\" == $sFormatChar)
           {
               $bSlash = true;
           }
           elseif ($bSlash)
           {
               $bSlash      = false;
               $sFormatChar = "\\" . $sFormatString[$i];
           }
           if ($bSlash)
           {
               continue;
           }
           elseif ('D' == $sFormatChar || 'l' == $sFormatChar)
           {
               $sWeekDay = date('w', $iMktime);
               $sShort   = 'D' == $sFormatChar ? 'shrt_' : '';
               switch ($sWeekDay)
               {
                   case '0':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '1':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '2':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '3':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '4':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '5':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '6':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
               }
           }
           elseif ('F' == $sFormatChar || 'M' == $sFormatChar)
           {
               $sShort = 'M' == $sFormatChar ? 'shrt_' : '';
               switch ($aDateParts[1])
               {
                   case '1':
                   case '01':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '2':
                   case '02':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '3':
                   case '03':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '4':
                   case '04':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '5':
                   case '05':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '6':
                   case '06':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '7':
                   case '07':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '8':
                   case '08':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '9':
                   case '09':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '10':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '11':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '12':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
               }
           }
           else
           {
               $sFormatted .= date($sFormatChar, $iMktime);
           }
       }

       return $sFormatted;
   } // calendarPrintFormatDate

   function calendarUpdateEvent($sOp, $sId, $iDays, $iMinutes, $bAllDay, $fullcalendarStart, $fullcalendarEnd)
   {
       $aEvents = $this->calendarFetchEvents($sId);
       if (1 != sizeof($aEvents))
       {
           return array('status' => false, 'message' => 'Erro ao recuperar informacoes do evento');
       }
       $aEvent = $aEvents[0];

       $iStart = $this->calendarStartToTimestamp($aEvent);
       $iEnd   = $this->calendarEndToTimestamp($aEvent);

       if (false === $iStart)
       {
           return array('status' => false, 'message' => 'Erro na manipulacao da data inicial');
       }
       elseif (false === $iEnd)
       {
           return array('status' => false, 'message' => 'Erro na manipulacao da data final');
       }

       if ('move' == $sOp) {
           $iStart += ($iDays * 86400) + ($iMinutes * 60);
       }
       $iEnd += ($iDays * 86400) + ($iMinutes * 60);

       $this->calendarTimestampToStart($aEvent, $iStart, $bAllDay);
       $this->calendarTimestampToEnd($aEvent, $iEnd, $bAllDay);

       if ('' == $aEvent['start'])
       {
           $aEvent['start'] = 'null';
       }
       if ('' == $aEvent['start_time'])
       {
           $aEvent['start_time'] = 'null';
       }
       if ('' == $aEvent['end'])
       {
           $aEvent['end'] = 'null';
       }
       if ('' == $aEvent['end_time'])
       {
           $aEvent['end_time'] = 'null';
       }

       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
       {
           $sSql = 'UPDATE ' . $this->Ini->nm_tabela . " SET citfecha = #" . $aEvent['start'] . "#, cithoraini = #" . $aEvent['start_time'] . "#, citfecha = #" . $aEvent['end'] . "#, cithorafin = #" . $aEvent['end_time'] . "#" . $this->calendarWhere($sId);
       }
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
       {
           $sSql = 'UPDATE ' . $this->Ini->nm_tabela . " SET citfecha = EXTEND(citfecha, YEAR TO DAY), citfecha = EXTEND(citfecha, YEAR TO DAY)" . $this->calendarWhere($sId);
       }
       else
       {
           $sSql = 'UPDATE ' . $this->Ini->nm_tabela . " SET citfecha = '" . $aEvent['start'] . "', cithoraini = '" . $aEvent['start_time'] . "', citfecha = '" . $aEvent['end'] . "', cithorafin = '" . $aEvent['end_time'] . "'" . $this->calendarWhere($sId);
       }

       $sSql = str_replace(array('#null#', "'null'"), array('null', 'null'), $sSql);

       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $sSql; 
       $oRs = $this->Db->Execute($sSql);

       if (false === $iStart)
       {
           return array('status' => false, 'message' => 'Erro na atualizacao do evento');
       }

       $aReturn = array('status' => true, 'message' => '');

       if ($aEvent['start_only'] < date('Y-m-d'))
       {
           $aReturn['backgroundColor'] = $aReturn['borderColor'] = $this->calendarConfigValues['eventColorPast'];
       }
       elseif ($aEvent['start_only'] > date('Y-m-d'))
       {
           $aReturn['backgroundColor'] = $aReturn['borderColor'] = $this->calendarConfigValues['eventColorFuture'];
       }
       else
       {
           $aReturn['backgroundColor'] = $aReturn['borderColor'] = $this->calendarConfigValues['eventColorToday'];
       }

       return $aReturn;
   } // calendarUpdateEvent

   function calendarStartToTimestamp($aEvent)
   {
       if (!isset($aEvent['start']) || '' == $aEvent['start'])
       {
           return false;
       }

       $iYear  = (integer) substr($aEvent['start'], 0, 4);
       $iMonth = (integer) substr($aEvent['start'], 5, 2);
       $iDay   = (integer) substr($aEvent['start'], 8, 2);

       if (!isset($aEvent['start_time']) || '' == $aEvent['start_time'])
       {
           $iHour   = 0;
           $iMinute = 0;
           $iSecond = 0;
       }
       else
       {
           $iHour   = (integer) substr($aEvent['start_time'], 0, 2);
           $iMinute = (integer) substr($aEvent['start_time'], 3, 2);
           $iSecond = (integer) substr($aEvent['start_time'], 6, 2);
       }

       return mktime($iHour, $iMinute, $iSecond, $iMonth, $iDay, $iYear);
   } // calendarStartToTimestamp

   function calendarEndToTimestamp($aEvent)
   {
       if (!isset($aEvent['end']) || '' == $aEvent['end'])
       {
           return false;
       }

       $iYear  = (integer) substr($aEvent['end'], 0, 4);
       $iMonth = (integer) substr($aEvent['end'], 5, 2);
       $iDay   = (integer) substr($aEvent['end'], 8, 2);

       if (!isset($aEvent['end_time']) || '' == $aEvent['end_time'])
       {
           $iHour   = 0;
           $iMinute = 0;
           $iSecond = 0;
       }
       else
       {
           $iHour   = (integer) substr($aEvent['end_time'], 0, 2);
           $iMinute = (integer) substr($aEvent['end_time'], 3, 2);
           $iSecond = (integer) substr($aEvent['end_time'], 6, 2);
       }

       return mktime($iHour, $iMinute, $iSecond, $iMonth, $iDay, $iYear);
   } // calendarEndToTimestamp

   function calendarFullcalendarToTimestamp($dateTime)
   {
       $iYear   = (integer) substr($dateTime, 0, 4);
       $iMonth  = (integer) substr($dateTime, 5, 2);
       $iDay    = (integer) substr($dateTime, 8, 2);
       $iHour   = (integer) substr($dateTime, 11, 2);
       $iMinute = (integer) substr($dateTime, 14, 2);
       $iSecond = (integer) substr($dateTime, 17, 2);

       return mktime($iHour, $iMinute, $iSecond, $iMonth, $iDay, $iYear);
   } // calendarStartToTimestamp

   function calendarTimestampToStart(&$aEvent, $iTimestamp, $bAllDay)
   {
       if ($bAllDay)
       {
           $this->calendarRemoveTime($iTimestamp);
       }

       $aEvent['start_only'] = date('Y-m-d', $iTimestamp);
       $aEvent['start']      = date('Y-m-d', $iTimestamp);
       $aEvent['start_time'] = $bAllDay ? '' : date('H:i:s', $iTimestamp);
   } // calendarTimestampToStart

   function calendarTimestampToEnd(&$aEvent, $iTimestamp, $bAllDay)
   {
       if ($bAllDay)
       {
           $this->calendarRemoveTime($iTimestamp);
       }

       $aEvent['end']      = date('Y-m-d', $iTimestamp);
       $aEvent['end_time'] = $bAllDay ? '' : date('H:i:s', $iTimestamp);
   } // calendarTimestampToEnd

   function calendarGetMktime($sDate, $sTime, $iAddDay = 0)
   {
       return mktime( (integer) substr($sTime, 0, 2),
                      (integer) substr($sTime, 2, 2),
                      (integer) substr($sTime, 4, 2),
                      (integer) substr($sDate, 4, 2),
                     ((integer) substr($sDate, 6, 2)) + $iAddDay,
                      (integer) substr($sDate, 0, 4));
   } // calendarGetMktime

   function calendarDragDrop()
   {
       return $this->calendarUpdateEvent('move', $this->sc_event_id, $this->sc_day_delta, $this->sc_time_delta, 'true' == $this->sc_all_day, $this->sc_fullcal_start, $this->sc_fullcal_end);
   } // calendarDragDrop

   function calendarResize()
   {
       return $this->calendarUpdateEvent('resize', $this->sc_event_id, $this->sc_day_delta, $this->sc_time_delta, false, $this->sc_fullcal_start, $this->sc_fullcal_end);
   } // calendarDragDrop

   function calendarRemoveTime(&$iTimestamp)
   {
       $iTimestamp = mktime(0, 0, 0, date('m', $iTimestamp), date('d', $iTimestamp), date('Y', $iTimestamp));
   } // calendarRemoveTime

   function calendarInitTimestamp()
   {
       $aDate = explode('-', $this->sc_cal_click_date);
       $aTime = 'true' == $this->sc_cal_click_allday ? array(0, 0, 0) : explode(':', $this->sc_cal_click_time);

       $iInit = mktime($aTime[0], $aTime[1], $aTime[2], $aDate[1], $aDate[2], $aDate[0]);
       $iEnd  = 'true' == $this->sc_cal_click_allday ? $iInit : $iInit + 7200;

       return array($iInit, $iEnd);
   } // calendarInitTimestamp

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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['csrf_token'];
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

   function Form_lookup_agesecuen()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_agesecuen']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_agesecuen'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_agesecuen']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_agesecuen'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_agesecuen']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_agesecuen'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_agesecuen']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_agesecuen'] = array(); 
    }

   $old_value_citid = $this->citid;
   $old_value_citfecha = $this->citfecha;
   $old_value_cithoraini = $this->cithoraini;
   $old_value_citduracion = $this->citduracion;
   $old_value_cithorafin = $this->cithorafin;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_citid = $this->citid;
   $unformatted_value_citfecha = $this->citfecha;
   $unformatted_value_cithoraini = $this->cithoraini;
   $unformatted_value_citduracion = $this->citduracion;
   $unformatted_value_cithorafin = $this->cithorafin;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT A.agesecuen, A.agenombre + ' - ' + M.medapellidos + ' ' + M.mednombres  FROM agenda A, medico M where A.medcodigo=M.medcodigo and A.ageactivo=1 ORDER BY A.agenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT A.agesecuen, concat(A.agenombre,' - ',M.medapellidos,' ',M.mednombres)  FROM agenda A, medico M where A.medcodigo=M.medcodigo and A.ageactivo=1 ORDER BY A.agenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT A.agesecuen, A.agenombre&' - '&M.medapellidos&' '&M.mednombres  FROM agenda A, medico M where A.medcodigo=M.medcodigo and A.ageactivo=1 ORDER BY A.agenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT A.agesecuen, A.agenombre||' - '||M.medapellidos||' '||M.mednombres  FROM agenda A, medico M where A.medcodigo=M.medcodigo and A.ageactivo=1 ORDER BY A.agenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT A.agesecuen, A.agenombre + ' - ' + M.medapellidos + ' ' + M.mednombres  FROM agenda A, medico M where A.medcodigo=M.medcodigo and A.ageactivo=1 ORDER BY A.agenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT A.agesecuen, A.agenombre||' - '||M.medapellidos||' '||M.mednombres  FROM agenda A, medico M where A.medcodigo=M.medcodigo and A.ageactivo=1 ORDER BY A.agenombre";
   }
   else
   {
       $nm_comando = "SELECT A.agesecuen, A.agenombre||' - '||M.medapellidos||' '||M.mednombres  FROM agenda A, medico M where A.medcodigo=M.medcodigo and A.ageactivo=1 ORDER BY A.agenombre";
   }

   $this->citid = $old_value_citid;
   $this->citfecha = $old_value_citfecha;
   $this->cithoraini = $old_value_cithoraini;
   $this->citduracion = $old_value_citduracion;
   $this->cithorafin = $old_value_cithorafin;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_agesecuen'][] = $rs->fields[0];
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
   function Form_lookup_citfactur()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "NO PROCESADA?#?0?#?N?@?";
       $nmgp_def_dados .= "FACTURADA?#?1?#?N?@?";
       $nmgp_def_dados .= "ORDEN DE TRAB. GENERADA?#?2?#?N?@?";
       $nmgp_def_dados .= "CANCELADA POR CL�NICA?#?3?#?N?@?";
       $nmgp_def_dados .= "CANCELADA POR PACIENTE?#?4?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_paciente_nuevo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_cittipo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "DIAGN�STICO?#?D?#?N?@?";
       $nmgp_def_dados .= "PROGRAMADO?#?P?#?N?@?";
       $nmgp_def_dados .= "CONTROL?#?C?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_prenumero()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_prenumero']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_prenumero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_prenumero']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_prenumero'] = array(); 
}
if ($this->fclnumero != "")
{ 
   $this->nm_clear_val("fclnumero");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_prenumero']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_prenumero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_prenumero']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_prenumero'] = array(); 
    }

   $old_value_citid = $this->citid;
   $old_value_citfecha = $this->citfecha;
   $old_value_cithoraini = $this->cithoraini;
   $old_value_citduracion = $this->citduracion;
   $old_value_cithorafin = $this->cithorafin;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_citid = $this->citid;
   $unformatted_value_citfecha = $this->citfecha;
   $unformatted_value_cithoraini = $this->cithoraini;
   $unformatted_value_citduracion = $this->citduracion;
   $unformatted_value_cithorafin = $this->cithorafin;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT prenumero, prenumero + ' - ' + prenombre  FROM presupuesto  WHERE fclnumero=$this->fclnumero AND preestado<>'T' ORDER BY prenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT prenumero, concat(prenumero,' - ',prenombre)  FROM presupuesto  WHERE fclnumero=$this->fclnumero AND preestado<>'T' ORDER BY prenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT prenumero, prenumero&' - '&prenombre  FROM presupuesto  WHERE fclnumero=$this->fclnumero AND preestado<>'T' ORDER BY prenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT prenumero, prenumero||' - '||prenombre  FROM presupuesto  WHERE fclnumero=$this->fclnumero AND preestado<>'T' ORDER BY prenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT prenumero, convert(char,prenumero) + ' - ' + prenombre  FROM presupuesto  WHERE fclnumero=$this->fclnumero AND preestado<>'T' ORDER BY prenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT prenumero, char(prenumero)||' - '||prenombre  FROM presupuesto  WHERE fclnumero=$this->fclnumero AND preestado<>'T' ORDER BY prenombre";
   }
   else
   {
       $nm_comando = "SELECT prenumero, prenumero||' - '||prenombre  FROM presupuesto  WHERE fclnumero=$this->fclnumero AND preestado<>'T' ORDER BY prenombre";
   }

   $this->citid = $old_value_citid;
   $this->citfecha = $old_value_citfecha;
   $this->cithoraini = $old_value_cithoraini;
   $this->citduracion = $old_value_citduracion;
   $this->cithorafin = $old_value_cithorafin;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['Lookup_prenumero'][] = $rs->fields[0];
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
} 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_cancelar_cita()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "CANCELA CL�NICA?#?CLIN?#?N?@?";
       $nmgp_def_dados .= "CANCELA PACIENTE?#?CLIE?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              calendar_cita_mob_pack_ajax_response();
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
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_filter_form'] . " and (citanula=0 and citfactur<3) and (" . $comando . ")";
      }
      else
      {
          $sc_where = " where citanula=0 and citfactur<3 and (" . $comando . ")";
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_calendar_cita_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['total'] = $qt_geral_reg_calendar_cita_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          calendar_cita_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          calendar_cita_mob_pack_ajax_response();
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
      $nm_numeric[] = "citid";$nm_numeric[] = "citduracion";$nm_numeric[] = "agesecuen";$nm_numeric[] = "fclnumero";$nm_numeric[] = "citfactur";$nm_numeric[] = "prenumero";$nm_numeric[] = "citanula";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['decimal_db'] == ".")
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
      $Nm_datas['citfecha'] = "date";$Nm_datas['cithoraini'] = "time";$Nm_datas['cithorafin'] = "time";$Nm_datas['citfeccrea'] = "datetime";$Nm_datas['citfecmodi'] = "datetime";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['SC_sep_date1'];
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
       $nmgp_saida_form = "calendar_cita_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "calendar_cita_mob_fim.php";
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
       calendar_cita_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita_mob']['masterValue']);
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
