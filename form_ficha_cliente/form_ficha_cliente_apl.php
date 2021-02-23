<?php
//
class form_ficha_cliente_apl
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
   var $fclnumero;
   var $fclnombres;
   var $fclapellidos;
   var $fclfechareg;
   var $fclfechanac;
   var $fclsexo;
   var $fclcedula;
   var $fclestciv;
   var $fclestciv_1;
   var $fcldireccion;
   var $fclciudad;
   var $fcltelefono;
   var $fclcelular;
   var $fclemail;
   var $fclprofesion;
   var $fcllugartrab;
   var $fclreferpub;
   var $fclreferpub_1;
   var $fclreferface;
   var $fclreferface_1;
   var $fclreferweb;
   var $fclreferweb_1;
   var $fclreferremit;
   var $fclreferremit_1;
   var $fclreferremitnom;
   var $fclmotivprimcons;
   var $fclproblemactual;
   var $fclbajotratmed;
   var $fclbajotratmed_1;
   var $fclalerganest;
   var $fclalerganest_1;
   var $fclprophemor;
   var $fclprophemor_1;
   var $fclintervquir;
   var $fclintervquir_1;
   var $fclmediesp;
   var $fclmediesp_1;
   var $fclhiperten;
   var $fclhiperten_1;
   var $fclhipotiro;
   var $fclhipotiro_1;
   var $fclaltercora;
   var $fclaltercora_1;
   var $fclgastrit;
   var $fclgastrit_1;
   var $fclenfsangre;
   var $fclenfsangre_1;
   var $fcldiabet;
   var $fcldiabet_1;
   var $fclhepatit;
   var $fclhepatit_1;
   var $fclcancer;
   var $fclcancer_1;
   var $fclvih;
   var $fclvih_1;
   var $fclartrit;
   var $fclartrit_1;
   var $fclinsufren;
   var $fclinsufren_1;
   var $fclotrasenf;
   var $fclotrasenf_1;
   var $fclotrasenfdesc;
   var $fclobserv;
   var $fclusucrea;
   var $fclusumodi;
   var $fclfeccrea;
   var $fclfeccrea_hora;
   var $fclfecmodi;
   var $fclfecmodi_hora;
   var $fclfacigual;
   var $fclfacigual_1;
   var $fclfacnombre;
   var $fclfacruc;
   var $fclfacdir;
   var $fclfactelf;
   var $fclfacmail;
   var $fclactivo;
   var $fclactivo_1;
   var $cobros;
   var $historias;
   var $presupuestos;
   var $update_titulo_citas;
   var $update_titulo_citas_1;
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
          if (isset($this->NM_ajax_info['param']['cobros']))
          {
              $this->cobros = $this->NM_ajax_info['param']['cobros'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['fclactivo']))
          {
              $this->fclactivo = $this->NM_ajax_info['param']['fclactivo'];
          }
          if (isset($this->NM_ajax_info['param']['fclalerganest']))
          {
              $this->fclalerganest = $this->NM_ajax_info['param']['fclalerganest'];
          }
          if (isset($this->NM_ajax_info['param']['fclaltercora']))
          {
              $this->fclaltercora = $this->NM_ajax_info['param']['fclaltercora'];
          }
          if (isset($this->NM_ajax_info['param']['fclapellidos']))
          {
              $this->fclapellidos = $this->NM_ajax_info['param']['fclapellidos'];
          }
          if (isset($this->NM_ajax_info['param']['fclartrit']))
          {
              $this->fclartrit = $this->NM_ajax_info['param']['fclartrit'];
          }
          if (isset($this->NM_ajax_info['param']['fclbajotratmed']))
          {
              $this->fclbajotratmed = $this->NM_ajax_info['param']['fclbajotratmed'];
          }
          if (isset($this->NM_ajax_info['param']['fclcancer']))
          {
              $this->fclcancer = $this->NM_ajax_info['param']['fclcancer'];
          }
          if (isset($this->NM_ajax_info['param']['fclcedula']))
          {
              $this->fclcedula = $this->NM_ajax_info['param']['fclcedula'];
          }
          if (isset($this->NM_ajax_info['param']['fclcelular']))
          {
              $this->fclcelular = $this->NM_ajax_info['param']['fclcelular'];
          }
          if (isset($this->NM_ajax_info['param']['fclciudad']))
          {
              $this->fclciudad = $this->NM_ajax_info['param']['fclciudad'];
          }
          if (isset($this->NM_ajax_info['param']['fcldiabet']))
          {
              $this->fcldiabet = $this->NM_ajax_info['param']['fcldiabet'];
          }
          if (isset($this->NM_ajax_info['param']['fcldireccion']))
          {
              $this->fcldireccion = $this->NM_ajax_info['param']['fcldireccion'];
          }
          if (isset($this->NM_ajax_info['param']['fclemail']))
          {
              $this->fclemail = $this->NM_ajax_info['param']['fclemail'];
          }
          if (isset($this->NM_ajax_info['param']['fclenfsangre']))
          {
              $this->fclenfsangre = $this->NM_ajax_info['param']['fclenfsangre'];
          }
          if (isset($this->NM_ajax_info['param']['fclestciv']))
          {
              $this->fclestciv = $this->NM_ajax_info['param']['fclestciv'];
          }
          if (isset($this->NM_ajax_info['param']['fclfacdir']))
          {
              $this->fclfacdir = $this->NM_ajax_info['param']['fclfacdir'];
          }
          if (isset($this->NM_ajax_info['param']['fclfacigual']))
          {
              $this->fclfacigual = $this->NM_ajax_info['param']['fclfacigual'];
          }
          if (isset($this->NM_ajax_info['param']['fclfacmail']))
          {
              $this->fclfacmail = $this->NM_ajax_info['param']['fclfacmail'];
          }
          if (isset($this->NM_ajax_info['param']['fclfacnombre']))
          {
              $this->fclfacnombre = $this->NM_ajax_info['param']['fclfacnombre'];
          }
          if (isset($this->NM_ajax_info['param']['fclfacruc']))
          {
              $this->fclfacruc = $this->NM_ajax_info['param']['fclfacruc'];
          }
          if (isset($this->NM_ajax_info['param']['fclfactelf']))
          {
              $this->fclfactelf = $this->NM_ajax_info['param']['fclfactelf'];
          }
          if (isset($this->NM_ajax_info['param']['fclfeccrea']))
          {
              $this->fclfeccrea = $this->NM_ajax_info['param']['fclfeccrea'];
          }
          if (isset($this->NM_ajax_info['param']['fclfechanac']))
          {
              $this->fclfechanac = $this->NM_ajax_info['param']['fclfechanac'];
          }
          if (isset($this->NM_ajax_info['param']['fclfechareg']))
          {
              $this->fclfechareg = $this->NM_ajax_info['param']['fclfechareg'];
          }
          if (isset($this->NM_ajax_info['param']['fclfecmodi']))
          {
              $this->fclfecmodi = $this->NM_ajax_info['param']['fclfecmodi'];
          }
          if (isset($this->NM_ajax_info['param']['fclgastrit']))
          {
              $this->fclgastrit = $this->NM_ajax_info['param']['fclgastrit'];
          }
          if (isset($this->NM_ajax_info['param']['fclhepatit']))
          {
              $this->fclhepatit = $this->NM_ajax_info['param']['fclhepatit'];
          }
          if (isset($this->NM_ajax_info['param']['fclhiperten']))
          {
              $this->fclhiperten = $this->NM_ajax_info['param']['fclhiperten'];
          }
          if (isset($this->NM_ajax_info['param']['fclhipotiro']))
          {
              $this->fclhipotiro = $this->NM_ajax_info['param']['fclhipotiro'];
          }
          if (isset($this->NM_ajax_info['param']['fclinsufren']))
          {
              $this->fclinsufren = $this->NM_ajax_info['param']['fclinsufren'];
          }
          if (isset($this->NM_ajax_info['param']['fclintervquir']))
          {
              $this->fclintervquir = $this->NM_ajax_info['param']['fclintervquir'];
          }
          if (isset($this->NM_ajax_info['param']['fcllugartrab']))
          {
              $this->fcllugartrab = $this->NM_ajax_info['param']['fcllugartrab'];
          }
          if (isset($this->NM_ajax_info['param']['fclmediesp']))
          {
              $this->fclmediesp = $this->NM_ajax_info['param']['fclmediesp'];
          }
          if (isset($this->NM_ajax_info['param']['fclmotivprimcons']))
          {
              $this->fclmotivprimcons = $this->NM_ajax_info['param']['fclmotivprimcons'];
          }
          if (isset($this->NM_ajax_info['param']['fclnombres']))
          {
              $this->fclnombres = $this->NM_ajax_info['param']['fclnombres'];
          }
          if (isset($this->NM_ajax_info['param']['fclnumero']))
          {
              $this->fclnumero = $this->NM_ajax_info['param']['fclnumero'];
          }
          if (isset($this->NM_ajax_info['param']['fclobserv']))
          {
              $this->fclobserv = $this->NM_ajax_info['param']['fclobserv'];
          }
          if (isset($this->NM_ajax_info['param']['fclotrasenf']))
          {
              $this->fclotrasenf = $this->NM_ajax_info['param']['fclotrasenf'];
          }
          if (isset($this->NM_ajax_info['param']['fclotrasenfdesc']))
          {
              $this->fclotrasenfdesc = $this->NM_ajax_info['param']['fclotrasenfdesc'];
          }
          if (isset($this->NM_ajax_info['param']['fclproblemactual']))
          {
              $this->fclproblemactual = $this->NM_ajax_info['param']['fclproblemactual'];
          }
          if (isset($this->NM_ajax_info['param']['fclprofesion']))
          {
              $this->fclprofesion = $this->NM_ajax_info['param']['fclprofesion'];
          }
          if (isset($this->NM_ajax_info['param']['fclprophemor']))
          {
              $this->fclprophemor = $this->NM_ajax_info['param']['fclprophemor'];
          }
          if (isset($this->NM_ajax_info['param']['fclreferface']))
          {
              $this->fclreferface = $this->NM_ajax_info['param']['fclreferface'];
          }
          if (isset($this->NM_ajax_info['param']['fclreferpub']))
          {
              $this->fclreferpub = $this->NM_ajax_info['param']['fclreferpub'];
          }
          if (isset($this->NM_ajax_info['param']['fclreferremit']))
          {
              $this->fclreferremit = $this->NM_ajax_info['param']['fclreferremit'];
          }
          if (isset($this->NM_ajax_info['param']['fclreferremitnom']))
          {
              $this->fclreferremitnom = $this->NM_ajax_info['param']['fclreferremitnom'];
          }
          if (isset($this->NM_ajax_info['param']['fclreferweb']))
          {
              $this->fclreferweb = $this->NM_ajax_info['param']['fclreferweb'];
          }
          if (isset($this->NM_ajax_info['param']['fclsexo']))
          {
              $this->fclsexo = $this->NM_ajax_info['param']['fclsexo'];
          }
          if (isset($this->NM_ajax_info['param']['fcltelefono']))
          {
              $this->fcltelefono = $this->NM_ajax_info['param']['fcltelefono'];
          }
          if (isset($this->NM_ajax_info['param']['fclusucrea']))
          {
              $this->fclusucrea = $this->NM_ajax_info['param']['fclusucrea'];
          }
          if (isset($this->NM_ajax_info['param']['fclusumodi']))
          {
              $this->fclusumodi = $this->NM_ajax_info['param']['fclusumodi'];
          }
          if (isset($this->NM_ajax_info['param']['fclvih']))
          {
              $this->fclvih = $this->NM_ajax_info['param']['fclvih'];
          }
          if (isset($this->NM_ajax_info['param']['historias']))
          {
              $this->historias = $this->NM_ajax_info['param']['historias'];
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
          if (isset($this->NM_ajax_info['param']['presupuestos']))
          {
              $this->presupuestos = $this->NM_ajax_info['param']['presupuestos'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['update_titulo_citas']))
          {
              $this->update_titulo_citas = $this->NM_ajax_info['param']['update_titulo_citas'];
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
      if (isset($this->usr_perfil) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['usr_perfil'] = $this->usr_perfil;
      }
      if (isset($_POST["usr_login"]) && isset($this->usr_login)) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_POST["v_mincodigoficha"]) && isset($this->v_mincodigoficha)) 
      {
          $_SESSION['v_mincodigoficha'] = $this->v_mincodigoficha;
      }
      if (isset($_POST["usr_perfil"]) && isset($this->usr_perfil)) 
      {
          $_SESSION['usr_perfil'] = $this->usr_perfil;
      }
      if (isset($_GET["usr_login"]) && isset($this->usr_login)) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_GET["v_mincodigoficha"]) && isset($this->v_mincodigoficha)) 
      {
          $_SESSION['v_mincodigoficha'] = $this->v_mincodigoficha;
      }
      if (isset($_GET["usr_perfil"]) && isset($this->usr_perfil)) 
      {
          $_SESSION['usr_perfil'] = $this->usr_perfil;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_ficha_cliente']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_ficha_cliente']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_ficha_cliente']['embutida_parms']);
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
                 nm_limpa_str_form_ficha_cliente($cadapar[1]);
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
          if (isset($this->usr_perfil)) 
          {
              $_SESSION['usr_perfil'] = $this->usr_perfil;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_ficha_cliente']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_ficha_cliente']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_ficha_cliente']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_ficha_cliente']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
          if (isset($this->v_mincodigoficha)) 
          {
              $_SESSION['v_mincodigoficha'] = $this->v_mincodigoficha;
          }
          if (isset($this->usr_perfil)) 
          {
              $_SESSION['usr_perfil'] = $this->usr_perfil;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_ficha_cliente']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_ficha_cliente']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_ficha_cliente']['nm_run_menu'] = 1;
      } 
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->fclfeccrea);
          $this->fclfeccrea      = $aDtParts[0];
          $this->fclfeccrea_hora = $aDtParts[1];
      }
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->fclfecmodi);
          $this->fclfecmodi      = $aDtParts[0];
          $this->fclfecmodi_hora = $aDtParts[1];
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_ficha_cliente']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_ficha_cliente']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_ficha_cliente']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_ficha_cliente']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_ficha_cliente']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_ficha_cliente']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_ficha_cliente']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_ficha_cliente_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_ficha_cliente']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_ficha_cliente']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_ficha_cliente'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_ficha_cliente']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_ficha_cliente']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_ficha_cliente') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_ficha_cliente']['label'] = "FICHA PACIENTE";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_ficha_cliente")
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


      $this->arr_buttons['volver']['hint']             = "";
      $this->arr_buttons['volver']['type']             = "button";
      $this->arr_buttons['volver']['value']            = "Volver";
      $this->arr_buttons['volver']['display']          = "only_text";
      $this->arr_buttons['volver']['display_position'] = "text_right";
      $this->arr_buttons['volver']['style']            = "default";
      $this->arr_buttons['volver']['image']            = "";


      $_SESSION['scriptcase']['error_icon']['form_ficha_cliente']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_ficha_cliente'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "off";
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
      $this->nmgp_botoes['volver'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_ficha_cliente']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_ficha_cliente'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_ficha_cliente'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_ficha_cliente", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_ficha_cliente/form_ficha_cliente_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_ficha_cliente_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_ficha_cliente_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_ficha_cliente_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_ficha_cliente/form_ficha_cliente_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_ficha_cliente_erro.class.php"); 
      }
      $this->Erro      = new form_ficha_cliente_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['opcao']))
         { 
             if ($this->fclnumero != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_ficha_cliente']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['volver'] = "on";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['volver'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['botoes']['volver'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['dados_form'];
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
      $this->sc_insert_on = false;
      if (isset($this->fclnumero)) { $this->nm_limpa_alfa($this->fclnumero); }
      if (isset($this->fclnombres)) { $this->nm_limpa_alfa($this->fclnombres); }
      if (isset($this->fclapellidos)) { $this->nm_limpa_alfa($this->fclapellidos); }
      if (isset($this->fclsexo)) { $this->nm_limpa_alfa($this->fclsexo); }
      if (isset($this->fclcedula)) { $this->nm_limpa_alfa($this->fclcedula); }
      if (isset($this->fclestciv)) { $this->nm_limpa_alfa($this->fclestciv); }
      if (isset($this->fcldireccion)) { $this->nm_limpa_alfa($this->fcldireccion); }
      if (isset($this->fclciudad)) { $this->nm_limpa_alfa($this->fclciudad); }
      if (isset($this->fcltelefono)) { $this->nm_limpa_alfa($this->fcltelefono); }
      if (isset($this->fclcelular)) { $this->nm_limpa_alfa($this->fclcelular); }
      if (isset($this->fclemail)) { $this->nm_limpa_alfa($this->fclemail); }
      if (isset($this->fclprofesion)) { $this->nm_limpa_alfa($this->fclprofesion); }
      if (isset($this->fcllugartrab)) { $this->nm_limpa_alfa($this->fcllugartrab); }
      if (isset($this->fclreferpub)) { $this->nm_limpa_alfa($this->fclreferpub); }
      if (isset($this->fclreferface)) { $this->nm_limpa_alfa($this->fclreferface); }
      if (isset($this->fclreferweb)) { $this->nm_limpa_alfa($this->fclreferweb); }
      if (isset($this->fclreferremit)) { $this->nm_limpa_alfa($this->fclreferremit); }
      if (isset($this->fclreferremitnom)) { $this->nm_limpa_alfa($this->fclreferremitnom); }
      if (isset($this->fclmotivprimcons)) { $this->nm_limpa_alfa($this->fclmotivprimcons); }
      if (isset($this->fclproblemactual)) { $this->nm_limpa_alfa($this->fclproblemactual); }
      if (isset($this->fclbajotratmed)) { $this->nm_limpa_alfa($this->fclbajotratmed); }
      if (isset($this->fclalerganest)) { $this->nm_limpa_alfa($this->fclalerganest); }
      if (isset($this->fclprophemor)) { $this->nm_limpa_alfa($this->fclprophemor); }
      if (isset($this->fclintervquir)) { $this->nm_limpa_alfa($this->fclintervquir); }
      if (isset($this->fclmediesp)) { $this->nm_limpa_alfa($this->fclmediesp); }
      if (isset($this->fclhiperten)) { $this->nm_limpa_alfa($this->fclhiperten); }
      if (isset($this->fclhipotiro)) { $this->nm_limpa_alfa($this->fclhipotiro); }
      if (isset($this->fclaltercora)) { $this->nm_limpa_alfa($this->fclaltercora); }
      if (isset($this->fclgastrit)) { $this->nm_limpa_alfa($this->fclgastrit); }
      if (isset($this->fclenfsangre)) { $this->nm_limpa_alfa($this->fclenfsangre); }
      if (isset($this->fcldiabet)) { $this->nm_limpa_alfa($this->fcldiabet); }
      if (isset($this->fclhepatit)) { $this->nm_limpa_alfa($this->fclhepatit); }
      if (isset($this->fclcancer)) { $this->nm_limpa_alfa($this->fclcancer); }
      if (isset($this->fclvih)) { $this->nm_limpa_alfa($this->fclvih); }
      if (isset($this->fclartrit)) { $this->nm_limpa_alfa($this->fclartrit); }
      if (isset($this->fclinsufren)) { $this->nm_limpa_alfa($this->fclinsufren); }
      if (isset($this->fclotrasenf)) { $this->nm_limpa_alfa($this->fclotrasenf); }
      if (isset($this->fclotrasenfdesc)) { $this->nm_limpa_alfa($this->fclotrasenfdesc); }
      if (isset($this->fclobserv)) { $this->nm_limpa_alfa($this->fclobserv); }
      if (isset($this->fclusucrea)) { $this->nm_limpa_alfa($this->fclusucrea); }
      if (isset($this->fclusumodi)) { $this->nm_limpa_alfa($this->fclusumodi); }
      if (isset($this->fclfacigual)) { $this->nm_limpa_alfa($this->fclfacigual); }
      if (isset($this->fclfacnombre)) { $this->nm_limpa_alfa($this->fclfacnombre); }
      if (isset($this->fclfacruc)) { $this->nm_limpa_alfa($this->fclfacruc); }
      if (isset($this->fclfacdir)) { $this->nm_limpa_alfa($this->fclfacdir); }
      if (isset($this->fclfactelf)) { $this->nm_limpa_alfa($this->fclfactelf); }
      if (isset($this->fclfacmail)) { $this->nm_limpa_alfa($this->fclfacmail); }
      if (isset($this->fclactivo)) { $this->nm_limpa_alfa($this->fclactivo); }
      if (isset($this->cobros)) { $this->nm_limpa_alfa($this->cobros); }
      if (isset($this->historias)) { $this->nm_limpa_alfa($this->historias); }
      if (isset($this->presupuestos)) { $this->nm_limpa_alfa($this->presupuestos); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- fclnumero
      $this->field_config['fclnumero']               = array();
      $this->field_config['fclnumero']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['fclnumero']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['fclnumero']['symbol_dec'] = '';
      $this->field_config['fclnumero']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['fclnumero']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fclfechareg
      $this->field_config['fclfechareg']                 = array();
      $this->field_config['fclfechareg']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fclfechareg']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fclfechareg']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fclfechareg');
      //-- fclfechanac
      $this->field_config['fclfechanac']                 = array();
      $this->field_config['fclfechanac']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fclfechanac']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fclfechanac']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fclfechanac');
      //-- fclfeccrea
      $this->field_config['fclfeccrea']                 = array();
      $this->field_config['fclfeccrea']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fclfeccrea']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fclfeccrea']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fclfeccrea']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fclfeccrea');
      //-- fclfecmodi
      $this->field_config['fclfecmodi']                 = array();
      $this->field_config['fclfecmodi']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fclfecmodi']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fclfecmodi']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fclfecmodi']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fclfecmodi');
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
          if ('validate_fclfechareg' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclfechareg');
          }
          if ('validate_fclcedula' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclcedula');
          }
          if ('validate_fclactivo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclactivo');
          }
          if ('validate_fclapellidos' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclapellidos');
          }
          if ('validate_fclnombres' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclnombres');
          }
          if ('validate_update_titulo_citas' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'update_titulo_citas');
          }
          if ('validate_fclfechanac' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclfechanac');
          }
          if ('validate_fclsexo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclsexo');
          }
          if ('validate_fclestciv' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclestciv');
          }
          if ('validate_fcldireccion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fcldireccion');
          }
          if ('validate_fclciudad' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclciudad');
          }
          if ('validate_fcltelefono' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fcltelefono');
          }
          if ('validate_fclcelular' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclcelular');
          }
          if ('validate_fclemail' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclemail');
          }
          if ('validate_fclprofesion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclprofesion');
          }
          if ('validate_fcllugartrab' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fcllugartrab');
          }
          if ('validate_fclfacigual' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclfacigual');
          }
          if ('validate_fclfacruc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclfacruc');
          }
          if ('validate_fclfacnombre' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclfacnombre');
          }
          if ('validate_fclfacdir' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclfacdir');
          }
          if ('validate_fclfactelf' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclfactelf');
          }
          if ('validate_fclfacmail' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclfacmail');
          }
          if ('validate_fclreferpub' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclreferpub');
          }
          if ('validate_fclreferface' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclreferface');
          }
          if ('validate_fclreferweb' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclreferweb');
          }
          if ('validate_fclreferremit' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclreferremit');
          }
          if ('validate_fclreferremitnom' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclreferremitnom');
          }
          if ('validate_fclmotivprimcons' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclmotivprimcons');
          }
          if ('validate_fclproblemactual' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclproblemactual');
          }
          if ('validate_fclbajotratmed' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclbajotratmed');
          }
          if ('validate_fclalerganest' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclalerganest');
          }
          if ('validate_fclprophemor' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclprophemor');
          }
          if ('validate_fclintervquir' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclintervquir');
          }
          if ('validate_fclmediesp' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclmediesp');
          }
          if ('validate_fclhiperten' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclhiperten');
          }
          if ('validate_fclhipotiro' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclhipotiro');
          }
          if ('validate_fclaltercora' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclaltercora');
          }
          if ('validate_fclgastrit' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclgastrit');
          }
          if ('validate_fclenfsangre' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclenfsangre');
          }
          if ('validate_fcldiabet' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fcldiabet');
          }
          if ('validate_fclhepatit' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclhepatit');
          }
          if ('validate_fclcancer' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclcancer');
          }
          if ('validate_fclvih' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclvih');
          }
          if ('validate_fclartrit' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclartrit');
          }
          if ('validate_fclinsufren' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclinsufren');
          }
          if ('validate_fclotrasenf' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclotrasenf');
          }
          if ('validate_fclotrasenfdesc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclotrasenfdesc');
          }
          if ('validate_fclobserv' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclobserv');
          }
          if ('validate_fclusucrea' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclusucrea');
          }
          if ('validate_fclfeccrea' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclfeccrea');
          }
          if ('validate_fclusumodi' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclusumodi');
          }
          if ('validate_fclfecmodi' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fclfecmodi');
          }
          if ('validate_historias' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'historias');
          }
          if ('validate_presupuestos' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'presupuestos');
          }
          if ('validate_cobros' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cobros');
          }
          form_ficha_cliente_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_fclfacigual_onclick' == $this->NM_ajax_opcao)
          {
              $this->fclfacigual_onClick();
          }
          if ('event_fclotrasenf_onclick' == $this->NM_ajax_opcao)
          {
              $this->fclotrasenf_onClick();
          }
          if ('event_fclreferremit_onclick' == $this->NM_ajax_opcao)
          {
              $this->fclreferremit_onClick();
          }
          form_ficha_cliente_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->fclreferpub))
          {
              $x = 0; 
              $this->fclreferpub_1 = $this->fclreferpub;
              $this->fclreferpub = ""; 
              if ($this->fclreferpub_1 != "") 
              { 
                  foreach ($this->fclreferpub_1 as $dados_fclreferpub_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->fclreferpub .= ";";
                      } 
                      $this->fclreferpub .= $dados_fclreferpub_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->fclreferface))
          {
              $x = 0; 
              $this->fclreferface_1 = $this->fclreferface;
              $this->fclreferface = ""; 
              if ($this->fclreferface_1 != "") 
              { 
                  foreach ($this->fclreferface_1 as $dados_fclreferface_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->fclreferface .= ";";
                      } 
                      $this->fclreferface .= $dados_fclreferface_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->fclreferweb))
          {
              $x = 0; 
              $this->fclreferweb_1 = $this->fclreferweb;
              $this->fclreferweb = ""; 
              if ($this->fclreferweb_1 != "") 
              { 
                  foreach ($this->fclreferweb_1 as $dados_fclreferweb_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->fclreferweb .= ";";
                      } 
                      $this->fclreferweb .= $dados_fclreferweb_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->fclreferremit))
          {
              $x = 0; 
              $this->fclreferremit_1 = $this->fclreferremit;
              $this->fclreferremit = ""; 
              if ($this->fclreferremit_1 != "") 
              { 
                  foreach ($this->fclreferremit_1 as $dados_fclreferremit_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->fclreferremit .= ";";
                      } 
                      $this->fclreferremit .= $dados_fclreferremit_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->fclbajotratmed))
          {
              $x = 0; 
              $this->fclbajotratmed_1 = $this->fclbajotratmed;
              $this->fclbajotratmed = ""; 
              if ($this->fclbajotratmed_1 != "") 
              { 
                  foreach ($this->fclbajotratmed_1 as $dados_fclbajotratmed_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->fclbajotratmed .= ";";
                      } 
                      $this->fclbajotratmed .= $dados_fclbajotratmed_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->fclalerganest))
          {
              $x = 0; 
              $this->fclalerganest_1 = $this->fclalerganest;
              $this->fclalerganest = ""; 
              if ($this->fclalerganest_1 != "") 
              { 
                  foreach ($this->fclalerganest_1 as $dados_fclalerganest_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->fclalerganest .= ";";
                      } 
                      $this->fclalerganest .= $dados_fclalerganest_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->fclprophemor))
          {
              $x = 0; 
              $this->fclprophemor_1 = $this->fclprophemor;
              $this->fclprophemor = ""; 
              if ($this->fclprophemor_1 != "") 
              { 
                  foreach ($this->fclprophemor_1 as $dados_fclprophemor_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->fclprophemor .= ";";
                      } 
                      $this->fclprophemor .= $dados_fclprophemor_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->fclintervquir))
          {
              $x = 0; 
              $this->fclintervquir_1 = $this->fclintervquir;
              $this->fclintervquir = ""; 
              if ($this->fclintervquir_1 != "") 
              { 
                  foreach ($this->fclintervquir_1 as $dados_fclintervquir_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->fclintervquir .= ";";
                      } 
                      $this->fclintervquir .= $dados_fclintervquir_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->fclmediesp))
          {
              $x = 0; 
              $this->fclmediesp_1 = $this->fclmediesp;
              $this->fclmediesp = ""; 
              if ($this->fclmediesp_1 != "") 
              { 
                  foreach ($this->fclmediesp_1 as $dados_fclmediesp_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->fclmediesp .= ";";
                      } 
                      $this->fclmediesp .= $dados_fclmediesp_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->fclhiperten))
          {
              $x = 0; 
              $this->fclhiperten_1 = $this->fclhiperten;
              $this->fclhiperten = ""; 
              if ($this->fclhiperten_1 != "") 
              { 
                  foreach ($this->fclhiperten_1 as $dados_fclhiperten_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->fclhiperten .= ";";
                      } 
                      $this->fclhiperten .= $dados_fclhiperten_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->fclhipotiro))
          {
              $x = 0; 
              $this->fclhipotiro_1 = $this->fclhipotiro;
              $this->fclhipotiro = ""; 
              if ($this->fclhipotiro_1 != "") 
              { 
                  foreach ($this->fclhipotiro_1 as $dados_fclhipotiro_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->fclhipotiro .= ";";
                      } 
                      $this->fclhipotiro .= $dados_fclhipotiro_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->fclaltercora))
          {
              $x = 0; 
              $this->fclaltercora_1 = $this->fclaltercora;
              $this->fclaltercora = ""; 
              if ($this->fclaltercora_1 != "") 
              { 
                  foreach ($this->fclaltercora_1 as $dados_fclaltercora_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->fclaltercora .= ";";
                      } 
                      $this->fclaltercora .= $dados_fclaltercora_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->fclgastrit))
          {
              $x = 0; 
              $this->fclgastrit_1 = $this->fclgastrit;
              $this->fclgastrit = ""; 
              if ($this->fclgastrit_1 != "") 
              { 
                  foreach ($this->fclgastrit_1 as $dados_fclgastrit_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->fclgastrit .= ";";
                      } 
                      $this->fclgastrit .= $dados_fclgastrit_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->fclenfsangre))
          {
              $x = 0; 
              $this->fclenfsangre_1 = $this->fclenfsangre;
              $this->fclenfsangre = ""; 
              if ($this->fclenfsangre_1 != "") 
              { 
                  foreach ($this->fclenfsangre_1 as $dados_fclenfsangre_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->fclenfsangre .= ";";
                      } 
                      $this->fclenfsangre .= $dados_fclenfsangre_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->fcldiabet))
          {
              $x = 0; 
              $this->fcldiabet_1 = $this->fcldiabet;
              $this->fcldiabet = ""; 
              if ($this->fcldiabet_1 != "") 
              { 
                  foreach ($this->fcldiabet_1 as $dados_fcldiabet_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->fcldiabet .= ";";
                      } 
                      $this->fcldiabet .= $dados_fcldiabet_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->fclhepatit))
          {
              $x = 0; 
              $this->fclhepatit_1 = $this->fclhepatit;
              $this->fclhepatit = ""; 
              if ($this->fclhepatit_1 != "") 
              { 
                  foreach ($this->fclhepatit_1 as $dados_fclhepatit_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->fclhepatit .= ";";
                      } 
                      $this->fclhepatit .= $dados_fclhepatit_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->fclcancer))
          {
              $x = 0; 
              $this->fclcancer_1 = $this->fclcancer;
              $this->fclcancer = ""; 
              if ($this->fclcancer_1 != "") 
              { 
                  foreach ($this->fclcancer_1 as $dados_fclcancer_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->fclcancer .= ";";
                      } 
                      $this->fclcancer .= $dados_fclcancer_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->fclvih))
          {
              $x = 0; 
              $this->fclvih_1 = $this->fclvih;
              $this->fclvih = ""; 
              if ($this->fclvih_1 != "") 
              { 
                  foreach ($this->fclvih_1 as $dados_fclvih_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->fclvih .= ";";
                      } 
                      $this->fclvih .= $dados_fclvih_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->fclartrit))
          {
              $x = 0; 
              $this->fclartrit_1 = $this->fclartrit;
              $this->fclartrit = ""; 
              if ($this->fclartrit_1 != "") 
              { 
                  foreach ($this->fclartrit_1 as $dados_fclartrit_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->fclartrit .= ";";
                      } 
                      $this->fclartrit .= $dados_fclartrit_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->fclinsufren))
          {
              $x = 0; 
              $this->fclinsufren_1 = $this->fclinsufren;
              $this->fclinsufren = ""; 
              if ($this->fclinsufren_1 != "") 
              { 
                  foreach ($this->fclinsufren_1 as $dados_fclinsufren_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->fclinsufren .= ";";
                      } 
                      $this->fclinsufren .= $dados_fclinsufren_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->fclotrasenf))
          {
              $x = 0; 
              $this->fclotrasenf_1 = $this->fclotrasenf;
              $this->fclotrasenf = ""; 
              if ($this->fclotrasenf_1 != "") 
              { 
                  foreach ($this->fclotrasenf_1 as $dados_fclotrasenf_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->fclotrasenf .= ";";
                      } 
                      $this->fclotrasenf .= $dados_fclotrasenf_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->fclfacigual))
          {
              $x = 0; 
              $this->fclfacigual_1 = $this->fclfacigual;
              $this->fclfacigual = ""; 
              if ($this->fclfacigual_1 != "") 
              { 
                  foreach ($this->fclfacigual_1 as $dados_fclfacigual_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->fclfacigual .= ";";
                      } 
                      $this->fclfacigual .= $dados_fclfacigual_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->fclactivo))
          {
              $x = 0; 
              $this->fclactivo_1 = $this->fclactivo;
              $this->fclactivo = ""; 
              if ($this->fclactivo_1 != "") 
              { 
                  foreach ($this->fclactivo_1 as $dados_fclactivo_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->fclactivo .= ";";
                      } 
                      $this->fclactivo .= $dados_fclactivo_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->update_titulo_citas))
          {
              $x = 0; 
              $this->update_titulo_citas_1 = $this->update_titulo_citas;
              $this->update_titulo_citas = ""; 
              if ($this->update_titulo_citas_1 != "") 
              { 
                  foreach ($this->update_titulo_citas_1 as $dados_update_titulo_citas_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->update_titulo_citas .= ";";
                      } 
                      $this->update_titulo_citas .= $dados_update_titulo_citas_1;
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
              form_ficha_cliente_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_ficha_cliente']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_ficha_cliente_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['sc_redir_atualiz'] == "ok")
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
          form_ficha_cliente_pack_ajax_response();
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
          form_ficha_cliente_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_ficha_cliente.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("FICHA PACIENTE") ?></TITLE>
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
<form name="Fdown" method="get" action="form_ficha_cliente_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_ficha_cliente"> 
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
           case 'fclnumero':
               return "No. FICHA";
               break;
           case 'fclfechareg':
               return "FECHA REGISTRO";
               break;
           case 'fclcedula':
               return "No. IDENTIFICACIÓN";
               break;
           case 'fclactivo':
               return "ACTIVO";
               break;
           case 'fclapellidos':
               return "APELLIDOS";
               break;
           case 'fclnombres':
               return "NOMBRES";
               break;
           case 'update_titulo_citas':
               return "ACTUALIZAR ASUNTO CITAS";
               break;
           case 'fclfechanac':
               return "FECHA DE NACIMIENTO";
               break;
           case 'fclsexo':
               return "SEXO";
               break;
           case 'fclestciv':
               return "ESTADO CIVIL";
               break;
           case 'fcldireccion':
               return "DIRECCIÓN";
               break;
           case 'fclciudad':
               return "CIUDAD";
               break;
           case 'fcltelefono':
               return "TELÉFONO";
               break;
           case 'fclcelular':
               return "CELULAR";
               break;
           case 'fclemail':
               return "CORREO ELECTRÓNICO";
               break;
           case 'fclprofesion':
               return "PROFESIÓN";
               break;
           case 'fcllugartrab':
               return "LUGAR DE TRABAJO";
               break;
           case 'fclfacigual':
               return "FACTURAR CON MISMOS DATOS";
               break;
           case 'fclfacruc':
               return "CÉDULA / RUC";
               break;
           case 'fclfacnombre':
               return "NOMBRE";
               break;
           case 'fclfacdir':
               return "DIRECCIÓN";
               break;
           case 'fclfactelf':
               return "TELÉFONO";
               break;
           case 'fclfacmail':
               return "CORREO ELECTRÓNICO";
               break;
           case 'fclreferpub':
               return "PUBLICIDAD";
               break;
           case 'fclreferface':
               return "FACEBOOK";
               break;
           case 'fclreferweb':
               return "PÁGINA WEB";
               break;
           case 'fclreferremit':
               return "REMITIDO POR";
               break;
           case 'fclreferremitnom':
               return "";
               break;
           case 'fclmotivprimcons':
               return "Fclmotivprimcons";
               break;
           case 'fclproblemactual':
               return "Fclproblemactual";
               break;
           case 'fclbajotratmed':
               return "¿Está bajo tratamiento médico?";
               break;
           case 'fclalerganest':
               return "¿Alergia a anestesia?";
               break;
           case 'fclprophemor':
               return "¿Propenso a hemorragias?";
               break;
           case 'fclintervquir':
               return "¿Ha tenido intervenciones quirúrgicas?";
               break;
           case 'fclmediesp':
               return "¿Toma un medicamento especial?";
               break;
           case 'fclhiperten':
               return "¿Hipertensión?";
               break;
           case 'fclhipotiro':
               return "¿Hipotiroidismo?";
               break;
           case 'fclaltercora':
               return "¿Alteraciones al corazón?";
               break;
           case 'fclgastrit':
               return "¿Gastritis?";
               break;
           case 'fclenfsangre':
               return "¿Enfermedades sanguíneas?";
               break;
           case 'fcldiabet':
               return "¿Diabetes?";
               break;
           case 'fclhepatit':
               return "¿Hepatitis?";
               break;
           case 'fclcancer':
               return "¿Cáncer?";
               break;
           case 'fclvih':
               return "¿VIH?";
               break;
           case 'fclartrit':
               return "¿Artritis?";
               break;
           case 'fclinsufren':
               return "¿Insuficiencia renal?";
               break;
           case 'fclotrasenf':
               return "¿Otros?";
               break;
           case 'fclotrasenfdesc':
               return "Explique cuáles son";
               break;
           case 'fclobserv':
               return "Fclobserv";
               break;
           case 'fclusucrea':
               return "USUARIO CREACIÓN";
               break;
           case 'fclfeccrea':
               return "FECHA CREACIÓN";
               break;
           case 'fclusumodi':
               return "USUARIO MODIFICACIÓN";
               break;
           case 'fclfecmodi':
               return "FECHA MODIFICACIÓN";
               break;
           case 'historias':
               return "HISTORIAS";
               break;
           case 'presupuestos':
               return "PRESUPUESTOS";
               break;
           case 'cobros':
               return "cobros";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_ficha_cliente']) || !is_array($this->NM_ajax_info['errList']['geral_form_ficha_cliente']))
              {
                  $this->NM_ajax_info['errList']['geral_form_ficha_cliente'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_ficha_cliente'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'fclnumero' == $filtro)
        $this->ValidateField_fclnumero($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclfechareg' == $filtro)
        $this->ValidateField_fclfechareg($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclcedula' == $filtro)
        $this->ValidateField_fclcedula($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclactivo' == $filtro)
        $this->ValidateField_fclactivo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclapellidos' == $filtro)
        $this->ValidateField_fclapellidos($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclnombres' == $filtro)
        $this->ValidateField_fclnombres($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'update_titulo_citas' == $filtro)
        $this->ValidateField_update_titulo_citas($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclfechanac' == $filtro)
        $this->ValidateField_fclfechanac($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclsexo' == $filtro)
        $this->ValidateField_fclsexo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclestciv' == $filtro)
        $this->ValidateField_fclestciv($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fcldireccion' == $filtro)
        $this->ValidateField_fcldireccion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclciudad' == $filtro)
        $this->ValidateField_fclciudad($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fcltelefono' == $filtro)
        $this->ValidateField_fcltelefono($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclcelular' == $filtro)
        $this->ValidateField_fclcelular($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclemail' == $filtro)
        $this->ValidateField_fclemail($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclprofesion' == $filtro)
        $this->ValidateField_fclprofesion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fcllugartrab' == $filtro)
        $this->ValidateField_fcllugartrab($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclfacigual' == $filtro)
        $this->ValidateField_fclfacigual($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclfacruc' == $filtro)
        $this->ValidateField_fclfacruc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclfacnombre' == $filtro)
        $this->ValidateField_fclfacnombre($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclfacdir' == $filtro)
        $this->ValidateField_fclfacdir($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclfactelf' == $filtro)
        $this->ValidateField_fclfactelf($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclfacmail' == $filtro)
        $this->ValidateField_fclfacmail($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclreferpub' == $filtro)
        $this->ValidateField_fclreferpub($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclreferface' == $filtro)
        $this->ValidateField_fclreferface($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclreferweb' == $filtro)
        $this->ValidateField_fclreferweb($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclreferremit' == $filtro)
        $this->ValidateField_fclreferremit($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclreferremitnom' == $filtro)
        $this->ValidateField_fclreferremitnom($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclmotivprimcons' == $filtro)
        $this->ValidateField_fclmotivprimcons($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclproblemactual' == $filtro)
        $this->ValidateField_fclproblemactual($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclbajotratmed' == $filtro)
        $this->ValidateField_fclbajotratmed($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclalerganest' == $filtro)
        $this->ValidateField_fclalerganest($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclprophemor' == $filtro)
        $this->ValidateField_fclprophemor($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclintervquir' == $filtro)
        $this->ValidateField_fclintervquir($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclmediesp' == $filtro)
        $this->ValidateField_fclmediesp($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclhiperten' == $filtro)
        $this->ValidateField_fclhiperten($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclhipotiro' == $filtro)
        $this->ValidateField_fclhipotiro($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclaltercora' == $filtro)
        $this->ValidateField_fclaltercora($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclgastrit' == $filtro)
        $this->ValidateField_fclgastrit($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclenfsangre' == $filtro)
        $this->ValidateField_fclenfsangre($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fcldiabet' == $filtro)
        $this->ValidateField_fcldiabet($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclhepatit' == $filtro)
        $this->ValidateField_fclhepatit($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclcancer' == $filtro)
        $this->ValidateField_fclcancer($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclvih' == $filtro)
        $this->ValidateField_fclvih($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclartrit' == $filtro)
        $this->ValidateField_fclartrit($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclinsufren' == $filtro)
        $this->ValidateField_fclinsufren($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclotrasenf' == $filtro)
        $this->ValidateField_fclotrasenf($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclotrasenfdesc' == $filtro)
        $this->ValidateField_fclotrasenfdesc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclobserv' == $filtro)
        $this->ValidateField_fclobserv($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclusucrea' == $filtro)
        $this->ValidateField_fclusucrea($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclfeccrea' == $filtro)
        $this->ValidateField_fclfeccrea($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclusumodi' == $filtro)
        $this->ValidateField_fclusumodi($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fclfecmodi' == $filtro)
        $this->ValidateField_fclfecmodi($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'historias' == $filtro)
        $this->ValidateField_historias($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'presupuestos' == $filtro)
        $this->ValidateField_presupuestos($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cobros' == $filtro)
        $this->ValidateField_cobros($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---

      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['form_ficha_cliente']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_fclfacigual = $this->fclfacigual;
    $original_fclfacmail = $this->fclfacmail;
    $original_fclfacnombre = $this->fclfacnombre;
    $original_fclfacruc = $this->fclfacruc;
}
  $error_test    = ($this->fclfacigual  != 1 && trim($this->fclfacnombre )=="");    
$error_message = 'Debe ingresar el NOMBRE en los datos de facturación.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_ficha_cliente' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}

$error_test    = ($this->fclfacigual  != 1 && trim($this->fclfacruc )=="");    
$error_message = 'Debe ingresar el RUC en los datos de facturación.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_ficha_cliente' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}


$error_test    = ($this->fclfacigual  != 1 && trim($this->fclfacmail )=="");    
$error_message = 'Debe ingresar el CORREO ELECTRÓNICO en los datos de facturación.'; 

if ($error_test)
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $error_message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_ficha_cliente' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $error_message;
 }
;
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_fclfacigual != $this->fclfacigual || (isset($bFlagRead_fclfacigual) && $bFlagRead_fclfacigual)))
    {
        $this->ajax_return_values_fclfacigual(true);
    }
    if (($original_fclfacmail != $this->fclfacmail || (isset($bFlagRead_fclfacmail) && $bFlagRead_fclfacmail)))
    {
        $this->ajax_return_values_fclfacmail(true);
    }
    if (($original_fclfacnombre != $this->fclfacnombre || (isset($bFlagRead_fclfacnombre) && $bFlagRead_fclfacnombre)))
    {
        $this->ajax_return_values_fclfacnombre(true);
    }
    if (($original_fclfacruc != $this->fclfacruc || (isset($bFlagRead_fclfacruc) && $bFlagRead_fclfacruc)))
    {
        $this->ajax_return_values_fclfacruc(true);
    }
}
$_SESSION['scriptcase']['form_ficha_cliente']['contr_erro'] = 'off'; 
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

    function ValidateField_fclnumero(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_numero($this->fclnumero, $this->field_config['fclnumero']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->fclnumero != '')  
          { 
              $iTestSize = 11;
              if ('-' == substr($this->fclnumero, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->fclnumero, -1))
              {
                  $iTestSize++;
                  $this->fclnumero = '-' . substr($this->fclnumero, 0, -1);
              }
              if (strlen($this->fclnumero) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "No. FICHA: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['fclnumero']))
                  {
                      $Campos_Erros['fclnumero'] = array();
                  }
                  $Campos_Erros['fclnumero'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['fclnumero']) || !is_array($this->NM_ajax_info['errList']['fclnumero']))
                  {
                      $this->NM_ajax_info['errList']['fclnumero'] = array();
                  }
                  $this->NM_ajax_info['errList']['fclnumero'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->fclnumero, 11, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "No. FICHA; " ; 
                  if (!isset($Campos_Erros['fclnumero']))
                  {
                      $Campos_Erros['fclnumero'] = array();
                  }
                  $Campos_Erros['fclnumero'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fclnumero']) || !is_array($this->NM_ajax_info['errList']['fclnumero']))
                  {
                      $this->NM_ajax_info['errList']['fclnumero'] = array();
                  }
                  $this->NM_ajax_info['errList']['fclnumero'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['php_cmp_required']['fclnumero']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['php_cmp_required']['fclnumero'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "No. FICHA" ; 
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
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclnumero';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclnumero

    function ValidateField_fclfechareg(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fclfechareg, $this->field_config['fclfechareg']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao == "incluir")
      { 
          $guarda_datahora = $this->field_config['fclfechareg']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fclfechareg']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fclfechareg']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fclfechareg']['date_sep']) ; 
          if (trim($this->fclfechareg) != "")  
          { 
              if ($teste_validade->Data($this->fclfechareg, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "FECHA REGISTRO; " ; 
                  if (!isset($Campos_Erros['fclfechareg']))
                  {
                      $Campos_Erros['fclfechareg'] = array();
                  }
                  $Campos_Erros['fclfechareg'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fclfechareg']) || !is_array($this->NM_ajax_info['errList']['fclfechareg']))
                  {
                      $this->NM_ajax_info['errList']['fclfechareg'] = array();
                  }
                  $this->NM_ajax_info['errList']['fclfechareg'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['php_cmp_required']['fclfechareg']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['php_cmp_required']['fclfechareg'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "FECHA REGISTRO" ; 
              if (!isset($Campos_Erros['fclfechareg']))
              {
                  $Campos_Erros['fclfechareg'] = array();
              }
              $Campos_Erros['fclfechareg'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['fclfechareg']) || !is_array($this->NM_ajax_info['errList']['fclfechareg']))
                  {
                      $this->NM_ajax_info['errList']['fclfechareg'] = array();
                  }
                  $this->NM_ajax_info['errList']['fclfechareg'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
          $this->field_config['fclfechareg']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclfechareg';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclfechareg

    function ValidateField_fclcedula(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['php_cmp_required']['fclcedula']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['php_cmp_required']['fclcedula'] == "on")) 
      { 
          if ($this->fclcedula == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "No. IDENTIFICACIÓN" ; 
              if (!isset($Campos_Erros['fclcedula']))
              {
                  $Campos_Erros['fclcedula'] = array();
              }
              $Campos_Erros['fclcedula'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['fclcedula']) || !is_array($this->NM_ajax_info['errList']['fclcedula']))
                  {
                      $this->NM_ajax_info['errList']['fclcedula'] = array();
                  }
                  $this->NM_ajax_info['errList']['fclcedula'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fclcedula) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "No. IDENTIFICACIÓN " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fclcedula']))
              {
                  $Campos_Erros['fclcedula'] = array();
              }
              $Campos_Erros['fclcedula'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fclcedula']) || !is_array($this->NM_ajax_info['errList']['fclcedula']))
              {
                  $this->NM_ajax_info['errList']['fclcedula'] = array();
              }
              $this->NM_ajax_info['errList']['fclcedula'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclcedula';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclcedula

    function ValidateField_fclactivo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fclactivo == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->fclactivo))
          {
              $x = 0; 
              $this->fclactivo_1 = array(); 
              foreach ($this->fclactivo as $ind => $dados_fclactivo_1 ) 
              {
                  if ($dados_fclactivo_1 != "") 
                  {
                      $this->fclactivo_1[] = $dados_fclactivo_1;
                  } 
              } 
              $this->fclactivo = ""; 
              foreach ($this->fclactivo_1 as $dados_fclactivo_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->fclactivo .= ";";
                   } 
                   $this->fclactivo .= $dados_fclactivo_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->fclactivo === "" || is_null($this->fclactivo))  
      { 
          $this->fclactivo = 0;
          $this->sc_force_zero[] = 'fclactivo';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclactivo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclactivo

    function ValidateField_fclapellidos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['php_cmp_required']['fclapellidos']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['php_cmp_required']['fclapellidos'] == "on")) 
      { 
          if ($this->fclapellidos == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "APELLIDOS" ; 
              if (!isset($Campos_Erros['fclapellidos']))
              {
                  $Campos_Erros['fclapellidos'] = array();
              }
              $Campos_Erros['fclapellidos'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['fclapellidos']) || !is_array($this->NM_ajax_info['errList']['fclapellidos']))
                  {
                      $this->NM_ajax_info['errList']['fclapellidos'] = array();
                  }
                  $this->NM_ajax_info['errList']['fclapellidos'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fclapellidos) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "APELLIDOS " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fclapellidos']))
              {
                  $Campos_Erros['fclapellidos'] = array();
              }
              $Campos_Erros['fclapellidos'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fclapellidos']) || !is_array($this->NM_ajax_info['errList']['fclapellidos']))
              {
                  $this->NM_ajax_info['errList']['fclapellidos'] = array();
              }
              $this->NM_ajax_info['errList']['fclapellidos'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "abcdefghijklmnopqrstuvwxyz0123456789Ã¡Ã©Ã­Ã³ÃºÃ Ã¨Ã¬Ã²Ã¹Ã£ÃµÃ¢ÃªÃ®Ã´Ã»Ã¤Ã«Ã¯Ã¶Ã¼Ã±Ã½Ã¿Â¨Â´`^~Ã§ .,ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ÃÃ‰ÃÃ“ÃšÃ€ÃˆÃŒÃ’Ã™ÃƒÃ•Ã‚ÃŠÃŽÃ”Ã›Ã„Ã‹ÃÃ–ÃœÃ‘ÃÃ¿Â¨Â´`^~Ã‡ .,";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->fclapellidos ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->fclapellidos, $_SESSION['scriptcase']['charset']); $x++) 
          { 
               for ($y = 0; $y < mb_strlen($Teste_trab, $_SESSION['scriptcase']['charset']); $y++) 
               { 
                    if (sc_substr($Teste_compara, $x, 1) == sc_substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (sc_substr($Teste_compara, $x, 1) != sc_substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "APELLIDOS " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['fclapellidos']))
              {
                  $Campos_Erros['fclapellidos'] = array();
              }
              $Campos_Erros['fclapellidos'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['fclapellidos']) || !is_array($this->NM_ajax_info['errList']['fclapellidos']))
              {
                  $this->NM_ajax_info['errList']['fclapellidos'] = array();
              }
              $this->NM_ajax_info['errList']['fclapellidos'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclapellidos';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclapellidos

    function ValidateField_fclnombres(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['php_cmp_required']['fclnombres']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['php_cmp_required']['fclnombres'] == "on")) 
      { 
          if ($this->fclnombres == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "NOMBRES" ; 
              if (!isset($Campos_Erros['fclnombres']))
              {
                  $Campos_Erros['fclnombres'] = array();
              }
              $Campos_Erros['fclnombres'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['fclnombres']) || !is_array($this->NM_ajax_info['errList']['fclnombres']))
                  {
                      $this->NM_ajax_info['errList']['fclnombres'] = array();
                  }
                  $this->NM_ajax_info['errList']['fclnombres'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fclnombres) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "NOMBRES " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fclnombres']))
              {
                  $Campos_Erros['fclnombres'] = array();
              }
              $Campos_Erros['fclnombres'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fclnombres']) || !is_array($this->NM_ajax_info['errList']['fclnombres']))
              {
                  $this->NM_ajax_info['errList']['fclnombres'] = array();
              }
              $this->NM_ajax_info['errList']['fclnombres'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "abcdefghijklmnopqrstuvwxyz0123456789Ã¡Ã©Ã­Ã³ÃºÃ Ã¨Ã¬Ã²Ã¹Ã£ÃµÃ¢ÃªÃ®Ã´Ã»Ã¤Ã«Ã¯Ã¶Ã¼Ã±Ã½Ã¿Â¨Â´`^~Ã§ .,ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ÃÃ‰ÃÃ“ÃšÃ€ÃˆÃŒÃ’Ã™ÃƒÃ•Ã‚ÃŠÃŽÃ”Ã›Ã„Ã‹ÃÃ–ÃœÃ‘ÃÃ¿Â¨Â´`^~Ã‡ .,";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->fclnombres ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->fclnombres, $_SESSION['scriptcase']['charset']); $x++) 
          { 
               for ($y = 0; $y < mb_strlen($Teste_trab, $_SESSION['scriptcase']['charset']); $y++) 
               { 
                    if (sc_substr($Teste_compara, $x, 1) == sc_substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (sc_substr($Teste_compara, $x, 1) != sc_substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "NOMBRES " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['fclnombres']))
              {
                  $Campos_Erros['fclnombres'] = array();
              }
              $Campos_Erros['fclnombres'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['fclnombres']) || !is_array($this->NM_ajax_info['errList']['fclnombres']))
              {
                  $this->NM_ajax_info['errList']['fclnombres'] = array();
              }
              $this->NM_ajax_info['errList']['fclnombres'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclnombres';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclnombres

    function ValidateField_update_titulo_citas(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->update_titulo_citas == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->update_titulo_citas))
          {
              $x = 0; 
              $this->update_titulo_citas_1 = array(); 
              foreach ($this->update_titulo_citas as $ind => $dados_update_titulo_citas_1 ) 
              {
                  if ($dados_update_titulo_citas_1 != "") 
                  {
                      $this->update_titulo_citas_1[] = $dados_update_titulo_citas_1;
                  } 
              } 
              $this->update_titulo_citas = ""; 
              foreach ($this->update_titulo_citas_1 as $dados_update_titulo_citas_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->update_titulo_citas .= ";";
                   } 
                   $this->update_titulo_citas .= $dados_update_titulo_citas_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'update_titulo_citas';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_update_titulo_citas

    function ValidateField_fclfechanac(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fclfechanac, $this->field_config['fclfechanac']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fclfechanac']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fclfechanac']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fclfechanac']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fclfechanac']['date_sep']) ; 
          if (trim($this->fclfechanac) != "")  
          { 
              if ($teste_validade->Data($this->fclfechanac, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "FECHA DE NACIMIENTO; " ; 
                  if (!isset($Campos_Erros['fclfechanac']))
                  {
                      $Campos_Erros['fclfechanac'] = array();
                  }
                  $Campos_Erros['fclfechanac'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fclfechanac']) || !is_array($this->NM_ajax_info['errList']['fclfechanac']))
                  {
                      $this->NM_ajax_info['errList']['fclfechanac'] = array();
                  }
                  $this->NM_ajax_info['errList']['fclfechanac'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['php_cmp_required']['fclfechanac']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['php_cmp_required']['fclfechanac'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "FECHA DE NACIMIENTO" ; 
              if (!isset($Campos_Erros['fclfechanac']))
              {
                  $Campos_Erros['fclfechanac'] = array();
              }
              $Campos_Erros['fclfechanac'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['fclfechanac']) || !is_array($this->NM_ajax_info['errList']['fclfechanac']))
                  {
                      $this->NM_ajax_info['errList']['fclfechanac'] = array();
                  }
                  $this->NM_ajax_info['errList']['fclfechanac'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
          $this->field_config['fclfechanac']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclfechanac';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclfechanac

    function ValidateField_fclsexo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fclsexo == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['php_cmp_required']['fclsexo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['php_cmp_required']['fclsexo'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "SEXO" ; 
          if (!isset($Campos_Erros['fclsexo']))
          {
              $Campos_Erros['fclsexo'] = array();
          }
          $Campos_Erros['fclsexo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['fclsexo']) || !is_array($this->NM_ajax_info['errList']['fclsexo']))
                  {
                      $this->NM_ajax_info['errList']['fclsexo'] = array();
                  }
                  $this->NM_ajax_info['errList']['fclsexo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
      if ($this->fclsexo != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclsexo']) && !in_array($this->fclsexo, $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclsexo']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['fclsexo']))
              {
                  $Campos_Erros['fclsexo'] = array();
              }
              $Campos_Erros['fclsexo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['fclsexo']) || !is_array($this->NM_ajax_info['errList']['fclsexo']))
              {
                  $this->NM_ajax_info['errList']['fclsexo'] = array();
              }
              $this->NM_ajax_info['errList']['fclsexo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclsexo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclsexo

    function ValidateField_fclestciv(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fclestciv == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclestciv';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclestciv

    function ValidateField_fcldireccion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fcldireccion) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "DIRECCIÓN " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fcldireccion']))
              {
                  $Campos_Erros['fcldireccion'] = array();
              }
              $Campos_Erros['fcldireccion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fcldireccion']) || !is_array($this->NM_ajax_info['errList']['fcldireccion']))
              {
                  $this->NM_ajax_info['errList']['fcldireccion'] = array();
              }
              $this->NM_ajax_info['errList']['fcldireccion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fcldireccion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fcldireccion

    function ValidateField_fclciudad(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fclciudad) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "CIUDAD " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fclciudad']))
              {
                  $Campos_Erros['fclciudad'] = array();
              }
              $Campos_Erros['fclciudad'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fclciudad']) || !is_array($this->NM_ajax_info['errList']['fclciudad']))
              {
                  $this->NM_ajax_info['errList']['fclciudad'] = array();
              }
              $this->NM_ajax_info['errList']['fclciudad'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclciudad';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclciudad

    function ValidateField_fcltelefono(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fcltelefono) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "TELÉFONO " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fcltelefono']))
              {
                  $Campos_Erros['fcltelefono'] = array();
              }
              $Campos_Erros['fcltelefono'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fcltelefono']) || !is_array($this->NM_ajax_info['errList']['fcltelefono']))
              {
                  $this->NM_ajax_info['errList']['fcltelefono'] = array();
              }
              $this->NM_ajax_info['errList']['fcltelefono'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fcltelefono';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fcltelefono

    function ValidateField_fclcelular(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fclcelular) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "CELULAR " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fclcelular']))
              {
                  $Campos_Erros['fclcelular'] = array();
              }
              $Campos_Erros['fclcelular'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fclcelular']) || !is_array($this->NM_ajax_info['errList']['fclcelular']))
              {
                  $this->NM_ajax_info['errList']['fclcelular'] = array();
              }
              $this->NM_ajax_info['errList']['fclcelular'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "0123456789 ,0123456789 ,";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->fclcelular ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->fclcelular, $_SESSION['scriptcase']['charset']); $x++) 
          { 
               for ($y = 0; $y < mb_strlen($Teste_trab, $_SESSION['scriptcase']['charset']); $y++) 
               { 
                    if (sc_substr($Teste_compara, $x, 1) == sc_substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (sc_substr($Teste_compara, $x, 1) != sc_substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "CELULAR " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['fclcelular']))
              {
                  $Campos_Erros['fclcelular'] = array();
              }
              $Campos_Erros['fclcelular'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['fclcelular']) || !is_array($this->NM_ajax_info['errList']['fclcelular']))
              {
                  $this->NM_ajax_info['errList']['fclcelular'] = array();
              }
              $this->NM_ajax_info['errList']['fclcelular'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclcelular';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclcelular

    function ValidateField_fclemail(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->fclemail) != "")  
          { 
              if ($teste_validade->Email($this->fclemail) == false)  
              { 
                  $hasError = true;
                      $Campos_Crit .= "CORREO ELECTRÓNICO; " ; 
                  if (!isset($Campos_Erros['fclemail']))
                  {
                      $Campos_Erros['fclemail'] = array();
                  }
                  $Campos_Erros['fclemail'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                      if (!isset($this->NM_ajax_info['errList']['fclemail']) || !is_array($this->NM_ajax_info['errList']['fclemail']))
                      {
                          $this->NM_ajax_info['errList']['fclemail'] = array();
                      }
                      $this->NM_ajax_info['errList']['fclemail'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['php_cmp_required']['fclemail']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['php_cmp_required']['fclemail'] == "on") 
          { 
              $hasError = true;
              $Campos_Falta[] = "CORREO ELECTRÓNICO" ; 
              if (!isset($Campos_Erros['fclemail']))
              {
                  $Campos_Erros['fclemail'] = array();
              }
              $Campos_Erros['fclemail'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['fclemail']) || !is_array($this->NM_ajax_info['errList']['fclemail']))
                  {
                      $this->NM_ajax_info['errList']['fclemail'] = array();
                  }
                  $this->NM_ajax_info['errList']['fclemail'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclemail';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclemail

    function ValidateField_fclprofesion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fclprofesion) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "PROFESIÓN " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fclprofesion']))
              {
                  $Campos_Erros['fclprofesion'] = array();
              }
              $Campos_Erros['fclprofesion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fclprofesion']) || !is_array($this->NM_ajax_info['errList']['fclprofesion']))
              {
                  $this->NM_ajax_info['errList']['fclprofesion'] = array();
              }
              $this->NM_ajax_info['errList']['fclprofesion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclprofesion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclprofesion

    function ValidateField_fcllugartrab(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fcllugartrab) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "LUGAR DE TRABAJO " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fcllugartrab']))
              {
                  $Campos_Erros['fcllugartrab'] = array();
              }
              $Campos_Erros['fcllugartrab'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fcllugartrab']) || !is_array($this->NM_ajax_info['errList']['fcllugartrab']))
              {
                  $this->NM_ajax_info['errList']['fcllugartrab'] = array();
              }
              $this->NM_ajax_info['errList']['fcllugartrab'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fcllugartrab';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fcllugartrab

    function ValidateField_fclfacigual(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fclfacigual == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->fclfacigual))
          {
              $x = 0; 
              $this->fclfacigual_1 = array(); 
              foreach ($this->fclfacigual as $ind => $dados_fclfacigual_1 ) 
              {
                  if ($dados_fclfacigual_1 != "") 
                  {
                      $this->fclfacigual_1[] = $dados_fclfacigual_1;
                  } 
              } 
              $this->fclfacigual = ""; 
              foreach ($this->fclfacigual_1 as $dados_fclfacigual_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->fclfacigual .= ";";
                   } 
                   $this->fclfacigual .= $dados_fclfacigual_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->fclfacigual === "" || is_null($this->fclfacigual))  
      { 
          $this->fclfacigual = 0;
          $this->sc_force_zero[] = 'fclfacigual';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclfacigual';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclfacigual

    function ValidateField_fclfacruc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fclfacruc) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "CÉDULA / RUC " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fclfacruc']))
              {
                  $Campos_Erros['fclfacruc'] = array();
              }
              $Campos_Erros['fclfacruc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fclfacruc']) || !is_array($this->NM_ajax_info['errList']['fclfacruc']))
              {
                  $this->NM_ajax_info['errList']['fclfacruc'] = array();
              }
              $this->NM_ajax_info['errList']['fclfacruc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclfacruc';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclfacruc

    function ValidateField_fclfacnombre(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fclfacnombre) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "NOMBRE " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fclfacnombre']))
              {
                  $Campos_Erros['fclfacnombre'] = array();
              }
              $Campos_Erros['fclfacnombre'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fclfacnombre']) || !is_array($this->NM_ajax_info['errList']['fclfacnombre']))
              {
                  $this->NM_ajax_info['errList']['fclfacnombre'] = array();
              }
              $this->NM_ajax_info['errList']['fclfacnombre'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclfacnombre';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclfacnombre

    function ValidateField_fclfacdir(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fclfacdir) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "DIRECCIÓN " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fclfacdir']))
              {
                  $Campos_Erros['fclfacdir'] = array();
              }
              $Campos_Erros['fclfacdir'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fclfacdir']) || !is_array($this->NM_ajax_info['errList']['fclfacdir']))
              {
                  $this->NM_ajax_info['errList']['fclfacdir'] = array();
              }
              $this->NM_ajax_info['errList']['fclfacdir'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclfacdir';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclfacdir

    function ValidateField_fclfactelf(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fclfactelf) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "TELÉFONO " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fclfactelf']))
              {
                  $Campos_Erros['fclfactelf'] = array();
              }
              $Campos_Erros['fclfactelf'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fclfactelf']) || !is_array($this->NM_ajax_info['errList']['fclfactelf']))
              {
                  $this->NM_ajax_info['errList']['fclfactelf'] = array();
              }
              $this->NM_ajax_info['errList']['fclfactelf'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclfactelf';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclfactelf

    function ValidateField_fclfacmail(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fclfacmail) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "CORREO ELECTRÓNICO " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fclfacmail']))
              {
                  $Campos_Erros['fclfacmail'] = array();
              }
              $Campos_Erros['fclfacmail'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fclfacmail']) || !is_array($this->NM_ajax_info['errList']['fclfacmail']))
              {
                  $this->NM_ajax_info['errList']['fclfacmail'] = array();
              }
              $this->NM_ajax_info['errList']['fclfacmail'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclfacmail';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclfacmail

    function ValidateField_fclreferpub(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fclreferpub == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->fclreferpub))
          {
              $x = 0; 
              $this->fclreferpub_1 = array(); 
              foreach ($this->fclreferpub as $ind => $dados_fclreferpub_1 ) 
              {
                  if ($dados_fclreferpub_1 != "") 
                  {
                      $this->fclreferpub_1[] = $dados_fclreferpub_1;
                  } 
              } 
              $this->fclreferpub = ""; 
              foreach ($this->fclreferpub_1 as $dados_fclreferpub_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->fclreferpub .= ";";
                   } 
                   $this->fclreferpub .= $dados_fclreferpub_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->fclreferpub === "" || is_null($this->fclreferpub))  
      { 
          $this->fclreferpub = 0;
          $this->sc_force_zero[] = 'fclreferpub';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclreferpub';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclreferpub

    function ValidateField_fclreferface(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fclreferface == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->fclreferface))
          {
              $x = 0; 
              $this->fclreferface_1 = array(); 
              foreach ($this->fclreferface as $ind => $dados_fclreferface_1 ) 
              {
                  if ($dados_fclreferface_1 != "") 
                  {
                      $this->fclreferface_1[] = $dados_fclreferface_1;
                  } 
              } 
              $this->fclreferface = ""; 
              foreach ($this->fclreferface_1 as $dados_fclreferface_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->fclreferface .= ";";
                   } 
                   $this->fclreferface .= $dados_fclreferface_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->fclreferface === "" || is_null($this->fclreferface))  
      { 
          $this->fclreferface = 0;
          $this->sc_force_zero[] = 'fclreferface';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclreferface';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclreferface

    function ValidateField_fclreferweb(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fclreferweb == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->fclreferweb))
          {
              $x = 0; 
              $this->fclreferweb_1 = array(); 
              foreach ($this->fclreferweb as $ind => $dados_fclreferweb_1 ) 
              {
                  if ($dados_fclreferweb_1 != "") 
                  {
                      $this->fclreferweb_1[] = $dados_fclreferweb_1;
                  } 
              } 
              $this->fclreferweb = ""; 
              foreach ($this->fclreferweb_1 as $dados_fclreferweb_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->fclreferweb .= ";";
                   } 
                   $this->fclreferweb .= $dados_fclreferweb_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->fclreferweb === "" || is_null($this->fclreferweb))  
      { 
          $this->fclreferweb = 0;
          $this->sc_force_zero[] = 'fclreferweb';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclreferweb';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclreferweb

    function ValidateField_fclreferremit(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fclreferremit == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->fclreferremit))
          {
              $x = 0; 
              $this->fclreferremit_1 = array(); 
              foreach ($this->fclreferremit as $ind => $dados_fclreferremit_1 ) 
              {
                  if ($dados_fclreferremit_1 != "") 
                  {
                      $this->fclreferremit_1[] = $dados_fclreferremit_1;
                  } 
              } 
              $this->fclreferremit = ""; 
              foreach ($this->fclreferremit_1 as $dados_fclreferremit_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->fclreferremit .= ";";
                   } 
                   $this->fclreferremit .= $dados_fclreferremit_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->fclreferremit === "" || is_null($this->fclreferremit))  
      { 
          $this->fclreferremit = 0;
          $this->sc_force_zero[] = 'fclreferremit';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclreferremit';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclreferremit

    function ValidateField_fclreferremitnom(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fclreferremitnom) > 80) 
          { 
              $hasError = true;
              $Campos_Crit .= " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 80 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fclreferremitnom']))
              {
                  $Campos_Erros['fclreferremitnom'] = array();
              }
              $Campos_Erros['fclreferremitnom'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 80 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fclreferremitnom']) || !is_array($this->NM_ajax_info['errList']['fclreferremitnom']))
              {
                  $this->NM_ajax_info['errList']['fclreferremitnom'] = array();
              }
              $this->NM_ajax_info['errList']['fclreferremitnom'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 80 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclreferremitnom';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclreferremitnom

    function ValidateField_fclmotivprimcons(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fclmotivprimcons) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "Fclmotivprimcons " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fclmotivprimcons']))
              {
                  $Campos_Erros['fclmotivprimcons'] = array();
              }
              $Campos_Erros['fclmotivprimcons'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fclmotivprimcons']) || !is_array($this->NM_ajax_info['errList']['fclmotivprimcons']))
              {
                  $this->NM_ajax_info['errList']['fclmotivprimcons'] = array();
              }
              $this->NM_ajax_info['errList']['fclmotivprimcons'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclmotivprimcons';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclmotivprimcons

    function ValidateField_fclproblemactual(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fclproblemactual) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "Fclproblemactual " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fclproblemactual']))
              {
                  $Campos_Erros['fclproblemactual'] = array();
              }
              $Campos_Erros['fclproblemactual'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fclproblemactual']) || !is_array($this->NM_ajax_info['errList']['fclproblemactual']))
              {
                  $this->NM_ajax_info['errList']['fclproblemactual'] = array();
              }
              $this->NM_ajax_info['errList']['fclproblemactual'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclproblemactual';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclproblemactual

    function ValidateField_fclbajotratmed(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fclbajotratmed == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->fclbajotratmed))
          {
              $x = 0; 
              $this->fclbajotratmed_1 = array(); 
              foreach ($this->fclbajotratmed as $ind => $dados_fclbajotratmed_1 ) 
              {
                  if ($dados_fclbajotratmed_1 != "") 
                  {
                      $this->fclbajotratmed_1[] = $dados_fclbajotratmed_1;
                  } 
              } 
              $this->fclbajotratmed = ""; 
              foreach ($this->fclbajotratmed_1 as $dados_fclbajotratmed_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->fclbajotratmed .= ";";
                   } 
                   $this->fclbajotratmed .= $dados_fclbajotratmed_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->fclbajotratmed === "" || is_null($this->fclbajotratmed))  
      { 
          $this->fclbajotratmed = 0;
          $this->sc_force_zero[] = 'fclbajotratmed';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclbajotratmed';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclbajotratmed

    function ValidateField_fclalerganest(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fclalerganest == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->fclalerganest))
          {
              $x = 0; 
              $this->fclalerganest_1 = array(); 
              foreach ($this->fclalerganest as $ind => $dados_fclalerganest_1 ) 
              {
                  if ($dados_fclalerganest_1 != "") 
                  {
                      $this->fclalerganest_1[] = $dados_fclalerganest_1;
                  } 
              } 
              $this->fclalerganest = ""; 
              foreach ($this->fclalerganest_1 as $dados_fclalerganest_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->fclalerganest .= ";";
                   } 
                   $this->fclalerganest .= $dados_fclalerganest_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->fclalerganest === "" || is_null($this->fclalerganest))  
      { 
          $this->fclalerganest = 0;
          $this->sc_force_zero[] = 'fclalerganest';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclalerganest';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclalerganest

    function ValidateField_fclprophemor(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fclprophemor == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->fclprophemor))
          {
              $x = 0; 
              $this->fclprophemor_1 = array(); 
              foreach ($this->fclprophemor as $ind => $dados_fclprophemor_1 ) 
              {
                  if ($dados_fclprophemor_1 != "") 
                  {
                      $this->fclprophemor_1[] = $dados_fclprophemor_1;
                  } 
              } 
              $this->fclprophemor = ""; 
              foreach ($this->fclprophemor_1 as $dados_fclprophemor_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->fclprophemor .= ";";
                   } 
                   $this->fclprophemor .= $dados_fclprophemor_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->fclprophemor === "" || is_null($this->fclprophemor))  
      { 
          $this->fclprophemor = 0;
          $this->sc_force_zero[] = 'fclprophemor';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclprophemor';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclprophemor

    function ValidateField_fclintervquir(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fclintervquir == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->fclintervquir))
          {
              $x = 0; 
              $this->fclintervquir_1 = array(); 
              foreach ($this->fclintervquir as $ind => $dados_fclintervquir_1 ) 
              {
                  if ($dados_fclintervquir_1 != "") 
                  {
                      $this->fclintervquir_1[] = $dados_fclintervquir_1;
                  } 
              } 
              $this->fclintervquir = ""; 
              foreach ($this->fclintervquir_1 as $dados_fclintervquir_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->fclintervquir .= ";";
                   } 
                   $this->fclintervquir .= $dados_fclintervquir_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->fclintervquir === "" || is_null($this->fclintervquir))  
      { 
          $this->fclintervquir = 0;
          $this->sc_force_zero[] = 'fclintervquir';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclintervquir';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclintervquir

    function ValidateField_fclmediesp(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fclmediesp == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->fclmediesp))
          {
              $x = 0; 
              $this->fclmediesp_1 = array(); 
              foreach ($this->fclmediesp as $ind => $dados_fclmediesp_1 ) 
              {
                  if ($dados_fclmediesp_1 != "") 
                  {
                      $this->fclmediesp_1[] = $dados_fclmediesp_1;
                  } 
              } 
              $this->fclmediesp = ""; 
              foreach ($this->fclmediesp_1 as $dados_fclmediesp_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->fclmediesp .= ";";
                   } 
                   $this->fclmediesp .= $dados_fclmediesp_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->fclmediesp === "" || is_null($this->fclmediesp))  
      { 
          $this->fclmediesp = 0;
          $this->sc_force_zero[] = 'fclmediesp';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclmediesp';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclmediesp

    function ValidateField_fclhiperten(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fclhiperten == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->fclhiperten))
          {
              $x = 0; 
              $this->fclhiperten_1 = array(); 
              foreach ($this->fclhiperten as $ind => $dados_fclhiperten_1 ) 
              {
                  if ($dados_fclhiperten_1 != "") 
                  {
                      $this->fclhiperten_1[] = $dados_fclhiperten_1;
                  } 
              } 
              $this->fclhiperten = ""; 
              foreach ($this->fclhiperten_1 as $dados_fclhiperten_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->fclhiperten .= ";";
                   } 
                   $this->fclhiperten .= $dados_fclhiperten_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->fclhiperten === "" || is_null($this->fclhiperten))  
      { 
          $this->fclhiperten = 0;
          $this->sc_force_zero[] = 'fclhiperten';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclhiperten';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclhiperten

    function ValidateField_fclhipotiro(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fclhipotiro == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->fclhipotiro))
          {
              $x = 0; 
              $this->fclhipotiro_1 = array(); 
              foreach ($this->fclhipotiro as $ind => $dados_fclhipotiro_1 ) 
              {
                  if ($dados_fclhipotiro_1 != "") 
                  {
                      $this->fclhipotiro_1[] = $dados_fclhipotiro_1;
                  } 
              } 
              $this->fclhipotiro = ""; 
              foreach ($this->fclhipotiro_1 as $dados_fclhipotiro_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->fclhipotiro .= ";";
                   } 
                   $this->fclhipotiro .= $dados_fclhipotiro_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->fclhipotiro === "" || is_null($this->fclhipotiro))  
      { 
          $this->fclhipotiro = 0;
          $this->sc_force_zero[] = 'fclhipotiro';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclhipotiro';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclhipotiro

    function ValidateField_fclaltercora(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fclaltercora == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->fclaltercora))
          {
              $x = 0; 
              $this->fclaltercora_1 = array(); 
              foreach ($this->fclaltercora as $ind => $dados_fclaltercora_1 ) 
              {
                  if ($dados_fclaltercora_1 != "") 
                  {
                      $this->fclaltercora_1[] = $dados_fclaltercora_1;
                  } 
              } 
              $this->fclaltercora = ""; 
              foreach ($this->fclaltercora_1 as $dados_fclaltercora_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->fclaltercora .= ";";
                   } 
                   $this->fclaltercora .= $dados_fclaltercora_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->fclaltercora === "" || is_null($this->fclaltercora))  
      { 
          $this->fclaltercora = 0;
          $this->sc_force_zero[] = 'fclaltercora';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclaltercora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclaltercora

    function ValidateField_fclgastrit(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fclgastrit == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->fclgastrit))
          {
              $x = 0; 
              $this->fclgastrit_1 = array(); 
              foreach ($this->fclgastrit as $ind => $dados_fclgastrit_1 ) 
              {
                  if ($dados_fclgastrit_1 != "") 
                  {
                      $this->fclgastrit_1[] = $dados_fclgastrit_1;
                  } 
              } 
              $this->fclgastrit = ""; 
              foreach ($this->fclgastrit_1 as $dados_fclgastrit_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->fclgastrit .= ";";
                   } 
                   $this->fclgastrit .= $dados_fclgastrit_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->fclgastrit === "" || is_null($this->fclgastrit))  
      { 
          $this->fclgastrit = 0;
          $this->sc_force_zero[] = 'fclgastrit';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclgastrit';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclgastrit

    function ValidateField_fclenfsangre(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fclenfsangre == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->fclenfsangre))
          {
              $x = 0; 
              $this->fclenfsangre_1 = array(); 
              foreach ($this->fclenfsangre as $ind => $dados_fclenfsangre_1 ) 
              {
                  if ($dados_fclenfsangre_1 != "") 
                  {
                      $this->fclenfsangre_1[] = $dados_fclenfsangre_1;
                  } 
              } 
              $this->fclenfsangre = ""; 
              foreach ($this->fclenfsangre_1 as $dados_fclenfsangre_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->fclenfsangre .= ";";
                   } 
                   $this->fclenfsangre .= $dados_fclenfsangre_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->fclenfsangre === "" || is_null($this->fclenfsangre))  
      { 
          $this->fclenfsangre = 0;
          $this->sc_force_zero[] = 'fclenfsangre';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclenfsangre';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclenfsangre

    function ValidateField_fcldiabet(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fcldiabet == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->fcldiabet))
          {
              $x = 0; 
              $this->fcldiabet_1 = array(); 
              foreach ($this->fcldiabet as $ind => $dados_fcldiabet_1 ) 
              {
                  if ($dados_fcldiabet_1 != "") 
                  {
                      $this->fcldiabet_1[] = $dados_fcldiabet_1;
                  } 
              } 
              $this->fcldiabet = ""; 
              foreach ($this->fcldiabet_1 as $dados_fcldiabet_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->fcldiabet .= ";";
                   } 
                   $this->fcldiabet .= $dados_fcldiabet_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->fcldiabet === "" || is_null($this->fcldiabet))  
      { 
          $this->fcldiabet = 0;
          $this->sc_force_zero[] = 'fcldiabet';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fcldiabet';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fcldiabet

    function ValidateField_fclhepatit(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fclhepatit == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->fclhepatit))
          {
              $x = 0; 
              $this->fclhepatit_1 = array(); 
              foreach ($this->fclhepatit as $ind => $dados_fclhepatit_1 ) 
              {
                  if ($dados_fclhepatit_1 != "") 
                  {
                      $this->fclhepatit_1[] = $dados_fclhepatit_1;
                  } 
              } 
              $this->fclhepatit = ""; 
              foreach ($this->fclhepatit_1 as $dados_fclhepatit_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->fclhepatit .= ";";
                   } 
                   $this->fclhepatit .= $dados_fclhepatit_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->fclhepatit === "" || is_null($this->fclhepatit))  
      { 
          $this->fclhepatit = 0;
          $this->sc_force_zero[] = 'fclhepatit';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclhepatit';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclhepatit

    function ValidateField_fclcancer(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fclcancer == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->fclcancer))
          {
              $x = 0; 
              $this->fclcancer_1 = array(); 
              foreach ($this->fclcancer as $ind => $dados_fclcancer_1 ) 
              {
                  if ($dados_fclcancer_1 != "") 
                  {
                      $this->fclcancer_1[] = $dados_fclcancer_1;
                  } 
              } 
              $this->fclcancer = ""; 
              foreach ($this->fclcancer_1 as $dados_fclcancer_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->fclcancer .= ";";
                   } 
                   $this->fclcancer .= $dados_fclcancer_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->fclcancer === "" || is_null($this->fclcancer))  
      { 
          $this->fclcancer = 0;
          $this->sc_force_zero[] = 'fclcancer';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclcancer';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclcancer

    function ValidateField_fclvih(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fclvih == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->fclvih))
          {
              $x = 0; 
              $this->fclvih_1 = array(); 
              foreach ($this->fclvih as $ind => $dados_fclvih_1 ) 
              {
                  if ($dados_fclvih_1 != "") 
                  {
                      $this->fclvih_1[] = $dados_fclvih_1;
                  } 
              } 
              $this->fclvih = ""; 
              foreach ($this->fclvih_1 as $dados_fclvih_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->fclvih .= ";";
                   } 
                   $this->fclvih .= $dados_fclvih_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->fclvih === "" || is_null($this->fclvih))  
      { 
          $this->fclvih = 0;
          $this->sc_force_zero[] = 'fclvih';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclvih';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclvih

    function ValidateField_fclartrit(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fclartrit == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->fclartrit))
          {
              $x = 0; 
              $this->fclartrit_1 = array(); 
              foreach ($this->fclartrit as $ind => $dados_fclartrit_1 ) 
              {
                  if ($dados_fclartrit_1 != "") 
                  {
                      $this->fclartrit_1[] = $dados_fclartrit_1;
                  } 
              } 
              $this->fclartrit = ""; 
              foreach ($this->fclartrit_1 as $dados_fclartrit_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->fclartrit .= ";";
                   } 
                   $this->fclartrit .= $dados_fclartrit_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->fclartrit === "" || is_null($this->fclartrit))  
      { 
          $this->fclartrit = 0;
          $this->sc_force_zero[] = 'fclartrit';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclartrit';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclartrit

    function ValidateField_fclinsufren(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fclinsufren == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->fclinsufren))
          {
              $x = 0; 
              $this->fclinsufren_1 = array(); 
              foreach ($this->fclinsufren as $ind => $dados_fclinsufren_1 ) 
              {
                  if ($dados_fclinsufren_1 != "") 
                  {
                      $this->fclinsufren_1[] = $dados_fclinsufren_1;
                  } 
              } 
              $this->fclinsufren = ""; 
              foreach ($this->fclinsufren_1 as $dados_fclinsufren_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->fclinsufren .= ";";
                   } 
                   $this->fclinsufren .= $dados_fclinsufren_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->fclinsufren === "" || is_null($this->fclinsufren))  
      { 
          $this->fclinsufren = 0;
          $this->sc_force_zero[] = 'fclinsufren';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclinsufren';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclinsufren

    function ValidateField_fclotrasenf(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->fclotrasenf == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->fclotrasenf))
          {
              $x = 0; 
              $this->fclotrasenf_1 = array(); 
              foreach ($this->fclotrasenf as $ind => $dados_fclotrasenf_1 ) 
              {
                  if ($dados_fclotrasenf_1 != "") 
                  {
                      $this->fclotrasenf_1[] = $dados_fclotrasenf_1;
                  } 
              } 
              $this->fclotrasenf = ""; 
              foreach ($this->fclotrasenf_1 as $dados_fclotrasenf_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->fclotrasenf .= ";";
                   } 
                   $this->fclotrasenf .= $dados_fclotrasenf_1;
                   $x++ ; 
              } 
          } 
      } 
      if ($this->fclotrasenf === "" || is_null($this->fclotrasenf))  
      { 
          $this->fclotrasenf = 0;
          $this->sc_force_zero[] = 'fclotrasenf';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclotrasenf';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclotrasenf

    function ValidateField_fclotrasenfdesc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fclotrasenfdesc) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "Explique cuáles son " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fclotrasenfdesc']))
              {
                  $Campos_Erros['fclotrasenfdesc'] = array();
              }
              $Campos_Erros['fclotrasenfdesc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fclotrasenfdesc']) || !is_array($this->NM_ajax_info['errList']['fclotrasenfdesc']))
              {
                  $this->NM_ajax_info['errList']['fclotrasenfdesc'] = array();
              }
              $this->NM_ajax_info['errList']['fclotrasenfdesc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclotrasenfdesc';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclotrasenfdesc

    function ValidateField_fclobserv(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fclobserv) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "Fclobserv " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fclobserv']))
              {
                  $Campos_Erros['fclobserv'] = array();
              }
              $Campos_Erros['fclobserv'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fclobserv']) || !is_array($this->NM_ajax_info['errList']['fclobserv']))
              {
                  $this->NM_ajax_info['errList']['fclobserv'] = array();
              }
              $this->NM_ajax_info['errList']['fclobserv'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclobserv';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclobserv

    function ValidateField_fclusucrea(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->fclusucrea) > 32) 
          { 
              $hasError = true;
              $Campos_Crit .= "USUARIO CREACIÓN " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fclusucrea']))
              {
                  $Campos_Erros['fclusucrea'] = array();
              }
              $Campos_Erros['fclusucrea'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fclusucrea']) || !is_array($this->NM_ajax_info['errList']['fclusucrea']))
              {
                  $this->NM_ajax_info['errList']['fclusucrea'] = array();
              }
              $this->NM_ajax_info['errList']['fclusucrea'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclusucrea';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclusucrea

    function ValidateField_fclfeccrea(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fclfeccrea, $this->field_config['fclfeccrea']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao == "incluir")
      { 
          $guarda_datahora = $this->field_config['fclfeccrea']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fclfeccrea']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fclfeccrea']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fclfeccrea']['date_sep']) ; 
          if (trim($this->fclfeccrea) != "")  
          { 
              if ($teste_validade->Data($this->fclfeccrea, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "FECHA CREACIÓN; " ; 
                  if (!isset($Campos_Erros['fclfeccrea']))
                  {
                      $Campos_Erros['fclfeccrea'] = array();
                  }
                  $Campos_Erros['fclfeccrea'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fclfeccrea']) || !is_array($this->NM_ajax_info['errList']['fclfeccrea']))
                  {
                      $this->NM_ajax_info['errList']['fclfeccrea'] = array();
                  }
                  $this->NM_ajax_info['errList']['fclfeccrea'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fclfeccrea']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclfeccrea';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->fclfeccrea_hora, $this->field_config['fclfeccrea_hora']['time_sep']) ; 
      if ($this->nmgp_opcao == "incluir")
      {
          $Format_Hora = $this->field_config['fclfeccrea_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['fclfeccrea_hora']['time_sep']) ; 
          if (trim($this->fclfeccrea_hora) != "")  
          { 
              if ($teste_validade->Hora($this->fclfeccrea_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "FECHA CREACIÓN; " ; 
                  if (!isset($Campos_Erros['fclfeccrea_hora']))
                  {
                      $Campos_Erros['fclfeccrea_hora'] = array();
                  }
                  $Campos_Erros['fclfeccrea_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fclfeccrea']) || !is_array($this->NM_ajax_info['errList']['fclfeccrea']))
                  {
                      $this->NM_ajax_info['errList']['fclfeccrea'] = array();
                  }
                  $this->NM_ajax_info['errList']['fclfeccrea'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['fclfeccrea']) && isset($Campos_Erros['fclfeccrea_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['fclfeccrea'], $Campos_Erros['fclfeccrea_hora']);
          if (empty($Campos_Erros['fclfeccrea_hora']))
          {
              unset($Campos_Erros['fclfeccrea_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['fclfeccrea']))
          {
              $this->NM_ajax_info['errList']['fclfeccrea'] = array_unique($this->NM_ajax_info['errList']['fclfeccrea']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclfeccrea_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclfeccrea_hora

    function ValidateField_fclusumodi(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->fclusumodi) > 32) 
          { 
              $hasError = true;
              $Campos_Crit .= "USUARIO MODIFICACIÓN " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fclusumodi']))
              {
                  $Campos_Erros['fclusumodi'] = array();
              }
              $Campos_Erros['fclusumodi'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fclusumodi']) || !is_array($this->NM_ajax_info['errList']['fclusumodi']))
              {
                  $this->NM_ajax_info['errList']['fclusumodi'] = array();
              }
              $this->NM_ajax_info['errList']['fclusumodi'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclusumodi';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclusumodi

    function ValidateField_fclfecmodi(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fclfecmodi, $this->field_config['fclfecmodi']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao == "incluir")
      { 
          $guarda_datahora = $this->field_config['fclfecmodi']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fclfecmodi']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fclfecmodi']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fclfecmodi']['date_sep']) ; 
          if (trim($this->fclfecmodi) != "")  
          { 
              if ($teste_validade->Data($this->fclfecmodi, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "FECHA MODIFICACIÓN; " ; 
                  if (!isset($Campos_Erros['fclfecmodi']))
                  {
                      $Campos_Erros['fclfecmodi'] = array();
                  }
                  $Campos_Erros['fclfecmodi'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fclfecmodi']) || !is_array($this->NM_ajax_info['errList']['fclfecmodi']))
                  {
                      $this->NM_ajax_info['errList']['fclfecmodi'] = array();
                  }
                  $this->NM_ajax_info['errList']['fclfecmodi'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fclfecmodi']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclfecmodi';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->fclfecmodi_hora, $this->field_config['fclfecmodi_hora']['time_sep']) ; 
      if ($this->nmgp_opcao == "incluir")
      {
          $Format_Hora = $this->field_config['fclfecmodi_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['fclfecmodi_hora']['time_sep']) ; 
          if (trim($this->fclfecmodi_hora) != "")  
          { 
              if ($teste_validade->Hora($this->fclfecmodi_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "FECHA MODIFICACIÓN; " ; 
                  if (!isset($Campos_Erros['fclfecmodi_hora']))
                  {
                      $Campos_Erros['fclfecmodi_hora'] = array();
                  }
                  $Campos_Erros['fclfecmodi_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fclfecmodi']) || !is_array($this->NM_ajax_info['errList']['fclfecmodi']))
                  {
                      $this->NM_ajax_info['errList']['fclfecmodi'] = array();
                  }
                  $this->NM_ajax_info['errList']['fclfecmodi'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['fclfecmodi']) && isset($Campos_Erros['fclfecmodi_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['fclfecmodi'], $Campos_Erros['fclfecmodi_hora']);
          if (empty($Campos_Erros['fclfecmodi_hora']))
          {
              unset($Campos_Erros['fclfecmodi_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['fclfecmodi']))
          {
              $this->NM_ajax_info['errList']['fclfecmodi'] = array_unique($this->NM_ajax_info['errList']['fclfecmodi']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fclfecmodi_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fclfecmodi_hora

    function ValidateField_historias(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->historias) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'historias';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_historias

    function ValidateField_presupuestos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->presupuestos) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'presupuestos';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_presupuestos

    function ValidateField_cobros(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->cobros) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cobros';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cobros

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
    $this->nmgp_dados_form['fclfechareg'] = (strlen(trim($this->fclfechareg)) > 19) ? str_replace(".", ":", $this->fclfechareg) : trim($this->fclfechareg);
    $this->nmgp_dados_form['fclcedula'] = $this->fclcedula;
    $this->nmgp_dados_form['fclactivo'] = $this->fclactivo;
    $this->nmgp_dados_form['fclapellidos'] = $this->fclapellidos;
    $this->nmgp_dados_form['fclnombres'] = $this->fclnombres;
    $this->nmgp_dados_form['update_titulo_citas'] = $this->update_titulo_citas;
    $this->nmgp_dados_form['fclfechanac'] = (strlen(trim($this->fclfechanac)) > 19) ? str_replace(".", ":", $this->fclfechanac) : trim($this->fclfechanac);
    $this->nmgp_dados_form['fclsexo'] = $this->fclsexo;
    $this->nmgp_dados_form['fclestciv'] = $this->fclestciv;
    $this->nmgp_dados_form['fcldireccion'] = $this->fcldireccion;
    $this->nmgp_dados_form['fclciudad'] = $this->fclciudad;
    $this->nmgp_dados_form['fcltelefono'] = $this->fcltelefono;
    $this->nmgp_dados_form['fclcelular'] = $this->fclcelular;
    $this->nmgp_dados_form['fclemail'] = $this->fclemail;
    $this->nmgp_dados_form['fclprofesion'] = $this->fclprofesion;
    $this->nmgp_dados_form['fcllugartrab'] = $this->fcllugartrab;
    $this->nmgp_dados_form['fclfacigual'] = $this->fclfacigual;
    $this->nmgp_dados_form['fclfacruc'] = $this->fclfacruc;
    $this->nmgp_dados_form['fclfacnombre'] = $this->fclfacnombre;
    $this->nmgp_dados_form['fclfacdir'] = $this->fclfacdir;
    $this->nmgp_dados_form['fclfactelf'] = $this->fclfactelf;
    $this->nmgp_dados_form['fclfacmail'] = $this->fclfacmail;
    $this->nmgp_dados_form['fclreferpub'] = $this->fclreferpub;
    $this->nmgp_dados_form['fclreferface'] = $this->fclreferface;
    $this->nmgp_dados_form['fclreferweb'] = $this->fclreferweb;
    $this->nmgp_dados_form['fclreferremit'] = $this->fclreferremit;
    $this->nmgp_dados_form['fclreferremitnom'] = $this->fclreferremitnom;
    $this->nmgp_dados_form['fclmotivprimcons'] = $this->fclmotivprimcons;
    $this->nmgp_dados_form['fclproblemactual'] = $this->fclproblemactual;
    $this->nmgp_dados_form['fclbajotratmed'] = $this->fclbajotratmed;
    $this->nmgp_dados_form['fclalerganest'] = $this->fclalerganest;
    $this->nmgp_dados_form['fclprophemor'] = $this->fclprophemor;
    $this->nmgp_dados_form['fclintervquir'] = $this->fclintervquir;
    $this->nmgp_dados_form['fclmediesp'] = $this->fclmediesp;
    $this->nmgp_dados_form['fclhiperten'] = $this->fclhiperten;
    $this->nmgp_dados_form['fclhipotiro'] = $this->fclhipotiro;
    $this->nmgp_dados_form['fclaltercora'] = $this->fclaltercora;
    $this->nmgp_dados_form['fclgastrit'] = $this->fclgastrit;
    $this->nmgp_dados_form['fclenfsangre'] = $this->fclenfsangre;
    $this->nmgp_dados_form['fcldiabet'] = $this->fcldiabet;
    $this->nmgp_dados_form['fclhepatit'] = $this->fclhepatit;
    $this->nmgp_dados_form['fclcancer'] = $this->fclcancer;
    $this->nmgp_dados_form['fclvih'] = $this->fclvih;
    $this->nmgp_dados_form['fclartrit'] = $this->fclartrit;
    $this->nmgp_dados_form['fclinsufren'] = $this->fclinsufren;
    $this->nmgp_dados_form['fclotrasenf'] = $this->fclotrasenf;
    $this->nmgp_dados_form['fclotrasenfdesc'] = $this->fclotrasenfdesc;
    $this->nmgp_dados_form['fclobserv'] = $this->fclobserv;
    $this->nmgp_dados_form['fclusucrea'] = $this->fclusucrea;
    $this->nmgp_dados_form['fclfeccrea'] = (strlen(trim($this->fclfeccrea)) > 19) ? str_replace(".", ":", $this->fclfeccrea) : trim($this->fclfeccrea);
    $this->nmgp_dados_form['fclusumodi'] = $this->fclusumodi;
    $this->nmgp_dados_form['fclfecmodi'] = (strlen(trim($this->fclfecmodi)) > 19) ? str_replace(".", ":", $this->fclfecmodi) : trim($this->fclfecmodi);
    $this->nmgp_dados_form['historias'] = $this->historias;
    $this->nmgp_dados_form['presupuestos'] = $this->presupuestos;
    $this->nmgp_dados_form['cobros'] = $this->cobros;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['fclnumero'] = $this->fclnumero;
      nm_limpa_numero($this->fclnumero, $this->field_config['fclnumero']['symbol_grp']) ; 
      $this->Before_unformat['fclfechareg'] = $this->fclfechareg;
      nm_limpa_data($this->fclfechareg, $this->field_config['fclfechareg']['date_sep']) ; 
      $this->Before_unformat['fclfechanac'] = $this->fclfechanac;
      nm_limpa_data($this->fclfechanac, $this->field_config['fclfechanac']['date_sep']) ; 
      $this->Before_unformat['fclfeccrea'] = $this->fclfeccrea;
      nm_limpa_data($this->fclfeccrea, $this->field_config['fclfeccrea']['date_sep']) ; 
      nm_limpa_hora($this->fclfeccrea_hora, $this->field_config['fclfeccrea']['time_sep']) ; 
      $this->Before_unformat['fclfecmodi'] = $this->fclfecmodi;
      nm_limpa_data($this->fclfecmodi, $this->field_config['fclfecmodi']['date_sep']) ; 
      nm_limpa_hora($this->fclfecmodi_hora, $this->field_config['fclfecmodi']['time_sep']) ; 
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
      if ($Nome_Campo == "fclnumero")
      {
          nm_limpa_numero($this->fclnumero, $this->field_config['fclnumero']['symbol_grp']) ; 
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
      if ('' !== $this->fclnumero || (!empty($format_fields) && isset($format_fields['fclnumero'])))
      {
          nmgp_Form_Num_Val($this->fclnumero, $this->field_config['fclnumero']['symbol_grp'], $this->field_config['fclnumero']['symbol_dec'], "0", "S", $this->field_config['fclnumero']['format_neg'], "", "", "-", $this->field_config['fclnumero']['symbol_fmt']) ; 
      }
      if ((!empty($this->fclfechareg) && 'null' != $this->fclfechareg) || (!empty($format_fields) && isset($format_fields['fclfechareg'])))
      {
          nm_volta_data($this->fclfechareg, $this->field_config['fclfechareg']['date_format']) ; 
          nmgp_Form_Datas($this->fclfechareg, $this->field_config['fclfechareg']['date_format'], $this->field_config['fclfechareg']['date_sep']) ;  
      }
      elseif ('null' == $this->fclfechareg || '' == $this->fclfechareg)
      {
          $this->fclfechareg = '';
      }
      if ((!empty($this->fclfechanac) && 'null' != $this->fclfechanac) || (!empty($format_fields) && isset($format_fields['fclfechanac'])))
      {
          nm_volta_data($this->fclfechanac, $this->field_config['fclfechanac']['date_format']) ; 
          nmgp_Form_Datas($this->fclfechanac, $this->field_config['fclfechanac']['date_format'], $this->field_config['fclfechanac']['date_sep']) ;  
      }
      elseif ('null' == $this->fclfechanac || '' == $this->fclfechanac)
      {
          $this->fclfechanac = '';
      }
      if ((!empty($this->fclfeccrea) && 'null' != $this->fclfeccrea) || (!empty($format_fields) && isset($format_fields['fclfeccrea'])))
      {
          $nm_separa_data = strpos($this->field_config['fclfeccrea']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['fclfeccrea']['date_format'];
          $this->field_config['fclfeccrea']['date_format'] = substr($this->field_config['fclfeccrea']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->fclfeccrea, " ") ; 
          $this->fclfeccrea_hora = substr($this->fclfeccrea, $separador + 1) ; 
          $this->fclfeccrea = substr($this->fclfeccrea, 0, $separador) ; 
          nm_volta_data($this->fclfeccrea, $this->field_config['fclfeccrea']['date_format']) ; 
          nmgp_Form_Datas($this->fclfeccrea, $this->field_config['fclfeccrea']['date_format'], $this->field_config['fclfeccrea']['date_sep']) ;  
          $this->field_config['fclfeccrea']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->fclfeccrea_hora, $this->field_config['fclfeccrea']['date_format']) ; 
          nmgp_Form_Hora($this->fclfeccrea_hora, $this->field_config['fclfeccrea']['date_format'], $this->field_config['fclfeccrea']['time_sep']) ;  
          $this->field_config['fclfeccrea']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->fclfeccrea || '' == $this->fclfeccrea)
      {
          $this->fclfeccrea_hora = '';
          $this->fclfeccrea = '';
      }
      if ((!empty($this->fclfecmodi) && 'null' != $this->fclfecmodi) || (!empty($format_fields) && isset($format_fields['fclfecmodi'])))
      {
          $nm_separa_data = strpos($this->field_config['fclfecmodi']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['fclfecmodi']['date_format'];
          $this->field_config['fclfecmodi']['date_format'] = substr($this->field_config['fclfecmodi']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->fclfecmodi, " ") ; 
          $this->fclfecmodi_hora = substr($this->fclfecmodi, $separador + 1) ; 
          $this->fclfecmodi = substr($this->fclfecmodi, 0, $separador) ; 
          nm_volta_data($this->fclfecmodi, $this->field_config['fclfecmodi']['date_format']) ; 
          nmgp_Form_Datas($this->fclfecmodi, $this->field_config['fclfecmodi']['date_format'], $this->field_config['fclfecmodi']['date_sep']) ;  
          $this->field_config['fclfecmodi']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->fclfecmodi_hora, $this->field_config['fclfecmodi']['date_format']) ; 
          nmgp_Form_Hora($this->fclfecmodi_hora, $this->field_config['fclfecmodi']['date_format'], $this->field_config['fclfecmodi']['time_sep']) ;  
          $this->field_config['fclfecmodi']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->fclfecmodi || '' == $this->fclfecmodi)
      {
          $this->fclfecmodi_hora = '';
          $this->fclfecmodi = '';
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
      $guarda_format_hora = $this->field_config['fclfechareg']['date_format'];
      if ($this->fclfechareg != "")  
      { 
          nm_conv_data($this->fclfechareg, $this->field_config['fclfechareg']['date_format']) ; 
          $this->fclfechareg_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fclfechareg_hora = substr($this->fclfechareg_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fclfechareg_hora = substr($this->fclfechareg_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fclfechareg_hora = substr($this->fclfechareg_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fclfechareg_hora = substr($this->fclfechareg_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fclfechareg_hora = substr($this->fclfechareg_hora, 0, -4);
          }
      } 
      if ($this->fclfechareg == "" && $use_null)  
      { 
          $this->fclfechareg = "null" ; 
      } 
      $this->field_config['fclfechareg']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fclfechanac']['date_format'];
      if ($this->fclfechanac != "")  
      { 
          nm_conv_data($this->fclfechanac, $this->field_config['fclfechanac']['date_format']) ; 
          $this->fclfechanac_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fclfechanac_hora = substr($this->fclfechanac_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fclfechanac_hora = substr($this->fclfechanac_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fclfechanac_hora = substr($this->fclfechanac_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fclfechanac_hora = substr($this->fclfechanac_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fclfechanac_hora = substr($this->fclfechanac_hora, 0, -4);
          }
      } 
      if ($this->fclfechanac == "" && $use_null)  
      { 
          $this->fclfechanac = "null" ; 
      } 
      $this->field_config['fclfechanac']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fclfeccrea']['date_format'];
      if ($this->fclfeccrea != "")  
      { 
          $nm_separa_data = strpos($this->field_config['fclfeccrea']['date_format'], ";") ;
          $this->field_config['fclfeccrea']['date_format'] = substr($this->field_config['fclfeccrea']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->fclfeccrea, $this->field_config['fclfeccrea']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->fclfeccrea = str_replace('-', '', $this->fclfeccrea);
          }
          $this->field_config['fclfeccrea']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->fclfeccrea_hora, $this->field_config['fclfeccrea']['date_format']) ; 
          if ($this->fclfeccrea_hora == "" )  
          { 
              $this->fclfeccrea_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->fclfeccrea_hora = substr($this->fclfeccrea_hora, 0, -4) . "." . substr($this->fclfeccrea_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fclfeccrea_hora = substr($this->fclfeccrea_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fclfeccrea_hora = substr($this->fclfeccrea_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fclfeccrea_hora = substr($this->fclfeccrea_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fclfeccrea_hora = substr($this->fclfeccrea_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fclfeccrea_hora = substr($this->fclfeccrea_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->fclfeccrea_hora = substr($this->fclfeccrea_hora, 0, -4);
          }
          if ($this->fclfeccrea != "")  
          { 
              $this->fclfeccrea .= " " . $this->fclfeccrea_hora ; 
          }
      } 
      if ($this->fclfeccrea == "" && $use_null)  
      { 
          $this->fclfeccrea = "null" ; 
      } 
      $this->field_config['fclfeccrea']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fclfecmodi']['date_format'];
      if ($this->fclfecmodi != "")  
      { 
          $nm_separa_data = strpos($this->field_config['fclfecmodi']['date_format'], ";") ;
          $this->field_config['fclfecmodi']['date_format'] = substr($this->field_config['fclfecmodi']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->fclfecmodi, $this->field_config['fclfecmodi']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->fclfecmodi = str_replace('-', '', $this->fclfecmodi);
          }
          $this->field_config['fclfecmodi']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->fclfecmodi_hora, $this->field_config['fclfecmodi']['date_format']) ; 
          if ($this->fclfecmodi_hora == "" )  
          { 
              $this->fclfecmodi_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->fclfecmodi_hora = substr($this->fclfecmodi_hora, 0, -4) . "." . substr($this->fclfecmodi_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fclfecmodi_hora = substr($this->fclfecmodi_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fclfecmodi_hora = substr($this->fclfecmodi_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fclfecmodi_hora = substr($this->fclfecmodi_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fclfecmodi_hora = substr($this->fclfecmodi_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fclfecmodi_hora = substr($this->fclfecmodi_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->fclfecmodi_hora = substr($this->fclfecmodi_hora, 0, -4);
          }
          if ($this->fclfecmodi != "")  
          { 
              $this->fclfecmodi .= " " . $this->fclfecmodi_hora ; 
          }
      } 
      if ($this->fclfecmodi == "" && $use_null)  
      { 
          $this->fclfecmodi = "null" ; 
      } 
      $this->field_config['fclfecmodi']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_fclfechareg();
          $this->ajax_return_values_fclcedula();
          $this->ajax_return_values_fclactivo();
          $this->ajax_return_values_fclapellidos();
          $this->ajax_return_values_fclnombres();
          $this->ajax_return_values_update_titulo_citas();
          $this->ajax_return_values_fclfechanac();
          $this->ajax_return_values_fclsexo();
          $this->ajax_return_values_fclestciv();
          $this->ajax_return_values_fcldireccion();
          $this->ajax_return_values_fclciudad();
          $this->ajax_return_values_fcltelefono();
          $this->ajax_return_values_fclcelular();
          $this->ajax_return_values_fclemail();
          $this->ajax_return_values_fclprofesion();
          $this->ajax_return_values_fcllugartrab();
          $this->ajax_return_values_fclfacigual();
          $this->ajax_return_values_fclfacruc();
          $this->ajax_return_values_fclfacnombre();
          $this->ajax_return_values_fclfacdir();
          $this->ajax_return_values_fclfactelf();
          $this->ajax_return_values_fclfacmail();
          $this->ajax_return_values_fclreferpub();
          $this->ajax_return_values_fclreferface();
          $this->ajax_return_values_fclreferweb();
          $this->ajax_return_values_fclreferremit();
          $this->ajax_return_values_fclreferremitnom();
          $this->ajax_return_values_fclmotivprimcons();
          $this->ajax_return_values_fclproblemactual();
          $this->ajax_return_values_fclbajotratmed();
          $this->ajax_return_values_fclalerganest();
          $this->ajax_return_values_fclprophemor();
          $this->ajax_return_values_fclintervquir();
          $this->ajax_return_values_fclmediesp();
          $this->ajax_return_values_fclhiperten();
          $this->ajax_return_values_fclhipotiro();
          $this->ajax_return_values_fclaltercora();
          $this->ajax_return_values_fclgastrit();
          $this->ajax_return_values_fclenfsangre();
          $this->ajax_return_values_fcldiabet();
          $this->ajax_return_values_fclhepatit();
          $this->ajax_return_values_fclcancer();
          $this->ajax_return_values_fclvih();
          $this->ajax_return_values_fclartrit();
          $this->ajax_return_values_fclinsufren();
          $this->ajax_return_values_fclotrasenf();
          $this->ajax_return_values_fclotrasenfdesc();
          $this->ajax_return_values_fclobserv();
          $this->ajax_return_values_fclusucrea();
          $this->ajax_return_values_fclfeccrea();
          $this->ajax_return_values_fclusumodi();
          $this->ajax_return_values_fclfecmodi();
          $this->ajax_return_values_historias();
          $this->ajax_return_values_presupuestos();
          $this->ajax_return_values_cobros();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['fclnumero']['keyVal'] = form_ficha_cliente_pack_protect_string($this->nmgp_dados_form['fclnumero']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['grid_cobros_script_case_init'] ]['grid_cobros']['embutida_form_full'] = true;
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['grid_cobros_script_case_init'] ]['grid_cobros']['embutida_form']       = true;
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['grid_cobros_script_case_init'] ]['grid_cobros']['embutida_pai']        = "form_ficha_cliente";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['grid_cobros_script_case_init'] ]['grid_cobros']['embutida_form_parms'] = "var_cliente*scin" . $this->nmgp_dados_form['fclnumero'] . "*scoutNMSC_paginacao*scinFULL*scout";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['grid_cobros_script_case_init'] ]['grid_cobros']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['grid_cobros_script_case_init'] ]['grid_cobros']['total']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['grid_historia_script_case_init'] ]['grid_historia']['embutida_form_full'] = true;
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['grid_historia_script_case_init'] ]['grid_historia']['embutida_form']       = true;
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['grid_historia_script_case_init'] ]['grid_historia']['embutida_pai']        = "form_ficha_cliente";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['grid_historia_script_case_init'] ]['grid_historia']['embutida_form_parms'] = "var_cliente*scin" . $this->nmgp_dados_form['fclnumero'] . "*scoutNMSC_paginacao*scinFULL*scout";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['grid_historia_script_case_init'] ]['grid_historia']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['grid_historia_script_case_init'] ]['grid_historia']['total']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['grid_presupuesto_script_case_init'] ]['grid_presupuesto']['embutida_form_full'] = true;
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['grid_presupuesto_script_case_init'] ]['grid_presupuesto']['embutida_form']       = true;
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['grid_presupuesto_script_case_init'] ]['grid_presupuesto']['embutida_pai']        = "form_ficha_cliente";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['grid_presupuesto_script_case_init'] ]['grid_presupuesto']['embutida_form_parms'] = "var_cliente*scin" . $this->nmgp_dados_form['fclnumero'] . "*scoutNMSC_paginacao*scinFULL*scout";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['grid_presupuesto_script_case_init'] ]['grid_presupuesto']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['grid_presupuesto_script_case_init'] ]['grid_presupuesto']['total']);
          }
   } // ajax_return_values

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
          }
   }

          //----- fclfechareg
   function ajax_return_values_fclfechareg($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclfechareg", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclfechareg);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fclfechareg'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- fclcedula
   function ajax_return_values_fclcedula($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclcedula", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclcedula);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fclcedula'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fclactivo
   function ajax_return_values_fclactivo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclactivo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclactivo);
              $aLookup = array();
              $this->_tmp_lookup_fclactivo = $this->fclactivo;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('1') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclactivo'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fclactivo']) && !empty($this->NM_ajax_info['select_html']['fclactivo']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fclactivo'];
          }
          $this->NM_ajax_info['fldList']['fclactivo'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-fclactivo',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fclactivo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fclactivo']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fclactivo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fclactivo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fclactivo']['labList'] = $aLabel;
          }
   }

          //----- fclapellidos
   function ajax_return_values_fclapellidos($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclapellidos", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclapellidos);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fclapellidos'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fclnombres
   function ajax_return_values_fclnombres($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclnombres", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclnombres);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fclnombres'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- update_titulo_citas
   function ajax_return_values_update_titulo_citas($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("update_titulo_citas", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->update_titulo_citas);
              $aLookup = array();
              $this->_tmp_lookup_update_titulo_citas = $this->update_titulo_citas;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('1') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_update_titulo_citas'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['update_titulo_citas']) && !empty($this->NM_ajax_info['select_html']['update_titulo_citas']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['update_titulo_citas'];
          }
          $this->NM_ajax_info['fldList']['update_titulo_citas'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-update_titulo_citas',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['update_titulo_citas']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['update_titulo_citas']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['update_titulo_citas']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['update_titulo_citas']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['update_titulo_citas']['labList'] = $aLabel;
          }
   }

          //----- fclfechanac
   function ajax_return_values_fclfechanac($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclfechanac", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclfechanac);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fclfechanac'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- fclsexo
   function ajax_return_values_fclsexo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclsexo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclsexo);
              $aLookup = array();
              $this->_tmp_lookup_fclsexo = $this->fclsexo;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('M') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("MASCULINO")));
$aLookup[] = array(form_ficha_cliente_pack_protect_string('F') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("FEMENINO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclsexo'][] = 'M';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclsexo'][] = 'F';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fclsexo']) && !empty($this->NM_ajax_info['select_html']['fclsexo']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fclsexo'];
          }
          $this->NM_ajax_info['fldList']['fclsexo'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 2,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fclsexo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fclsexo']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fclsexo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fclsexo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fclsexo']['labList'] = $aLabel;
          }
   }

          //----- fclestciv
   function ajax_return_values_fclestciv($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclestciv", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclestciv);
              $aLookup = array();
              $this->_tmp_lookup_fclestciv = $this->fclestciv;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('S') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("SOLTERO")));
$aLookup[] = array(form_ficha_cliente_pack_protect_string('C') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("CASADO")));
$aLookup[] = array(form_ficha_cliente_pack_protect_string('V') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("VIUDO")));
$aLookup[] = array(form_ficha_cliente_pack_protect_string('D') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("DIVORCIADO")));
$aLookup[] = array(form_ficha_cliente_pack_protect_string('U') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("UNIÓN LIBRE")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclestciv'][] = 'S';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclestciv'][] = 'C';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclestciv'][] = 'V';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclestciv'][] = 'D';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclestciv'][] = 'U';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"fclestciv\"";
          if (isset($this->NM_ajax_info['select_html']['fclestciv']) && !empty($this->NM_ajax_info['select_html']['fclestciv']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['fclestciv'];
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

                  if ($this->fclestciv == $sValue)
                  {
                      $this->_tmp_lookup_fclestciv = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['fclestciv'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fclestciv']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fclestciv']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fclestciv']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fclestciv']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fclestciv']['labList'] = $aLabel;
          }
   }

          //----- fcldireccion
   function ajax_return_values_fcldireccion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fcldireccion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fcldireccion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fcldireccion'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fclciudad
   function ajax_return_values_fclciudad($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclciudad", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclciudad);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fclciudad'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fcltelefono
   function ajax_return_values_fcltelefono($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fcltelefono", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fcltelefono);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fcltelefono'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fclcelular
   function ajax_return_values_fclcelular($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclcelular", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclcelular);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fclcelular'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fclemail
   function ajax_return_values_fclemail($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclemail", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclemail);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fclemail'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- fclprofesion
   function ajax_return_values_fclprofesion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclprofesion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclprofesion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fclprofesion'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fcllugartrab
   function ajax_return_values_fcllugartrab($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fcllugartrab", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fcllugartrab);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fcllugartrab'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fclfacigual
   function ajax_return_values_fclfacigual($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclfacigual", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclfacigual);
              $aLookup = array();
              $this->_tmp_lookup_fclfacigual = $this->fclfacigual;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('1') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclfacigual'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fclfacigual']) && !empty($this->NM_ajax_info['select_html']['fclfacigual']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fclfacigual'];
          }
          $this->NM_ajax_info['fldList']['fclfacigual'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-fclfacigual',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fclfacigual']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fclfacigual']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fclfacigual']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fclfacigual']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fclfacigual']['labList'] = $aLabel;
          }
   }

          //----- fclfacruc
   function ajax_return_values_fclfacruc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclfacruc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclfacruc);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fclfacruc'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fclfacnombre
   function ajax_return_values_fclfacnombre($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclfacnombre", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclfacnombre);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fclfacnombre'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fclfacdir
   function ajax_return_values_fclfacdir($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclfacdir", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclfacdir);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fclfacdir'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fclfactelf
   function ajax_return_values_fclfactelf($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclfactelf", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclfactelf);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fclfactelf'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fclfacmail
   function ajax_return_values_fclfacmail($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclfacmail", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclfacmail);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fclfacmail'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fclreferpub
   function ajax_return_values_fclreferpub($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclreferpub", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclreferpub);
              $aLookup = array();
              $this->_tmp_lookup_fclreferpub = $this->fclreferpub;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('1') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclreferpub'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fclreferpub']) && !empty($this->NM_ajax_info['select_html']['fclreferpub']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fclreferpub'];
          }
          $this->NM_ajax_info['fldList']['fclreferpub'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-fclreferpub',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fclreferpub']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fclreferpub']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fclreferpub']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fclreferpub']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fclreferpub']['labList'] = $aLabel;
          }
   }

          //----- fclreferface
   function ajax_return_values_fclreferface($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclreferface", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclreferface);
              $aLookup = array();
              $this->_tmp_lookup_fclreferface = $this->fclreferface;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('1') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclreferface'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fclreferface']) && !empty($this->NM_ajax_info['select_html']['fclreferface']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fclreferface'];
          }
          $this->NM_ajax_info['fldList']['fclreferface'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-fclreferface',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fclreferface']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fclreferface']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fclreferface']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fclreferface']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fclreferface']['labList'] = $aLabel;
          }
   }

          //----- fclreferweb
   function ajax_return_values_fclreferweb($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclreferweb", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclreferweb);
              $aLookup = array();
              $this->_tmp_lookup_fclreferweb = $this->fclreferweb;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('1') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclreferweb'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fclreferweb']) && !empty($this->NM_ajax_info['select_html']['fclreferweb']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fclreferweb'];
          }
          $this->NM_ajax_info['fldList']['fclreferweb'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-fclreferweb',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fclreferweb']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fclreferweb']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fclreferweb']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fclreferweb']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fclreferweb']['labList'] = $aLabel;
          }
   }

          //----- fclreferremit
   function ajax_return_values_fclreferremit($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclreferremit", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclreferremit);
              $aLookup = array();
              $this->_tmp_lookup_fclreferremit = $this->fclreferremit;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('1') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclreferremit'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fclreferremit']) && !empty($this->NM_ajax_info['select_html']['fclreferremit']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fclreferremit'];
          }
          $this->NM_ajax_info['fldList']['fclreferremit'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-fclreferremit',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fclreferremit']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fclreferremit']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fclreferremit']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fclreferremit']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fclreferremit']['labList'] = $aLabel;
          }
   }

          //----- fclreferremitnom
   function ajax_return_values_fclreferremitnom($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclreferremitnom", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclreferremitnom);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fclreferremitnom'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fclmotivprimcons
   function ajax_return_values_fclmotivprimcons($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclmotivprimcons", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclmotivprimcons);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fclmotivprimcons'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fclproblemactual
   function ajax_return_values_fclproblemactual($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclproblemactual", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclproblemactual);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fclproblemactual'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fclbajotratmed
   function ajax_return_values_fclbajotratmed($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclbajotratmed", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclbajotratmed);
              $aLookup = array();
              $this->_tmp_lookup_fclbajotratmed = $this->fclbajotratmed;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('1') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclbajotratmed'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fclbajotratmed']) && !empty($this->NM_ajax_info['select_html']['fclbajotratmed']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fclbajotratmed'];
          }
          $this->NM_ajax_info['fldList']['fclbajotratmed'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-fclbajotratmed',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fclbajotratmed']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fclbajotratmed']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fclbajotratmed']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fclbajotratmed']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fclbajotratmed']['labList'] = $aLabel;
          }
   }

          //----- fclalerganest
   function ajax_return_values_fclalerganest($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclalerganest", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclalerganest);
              $aLookup = array();
              $this->_tmp_lookup_fclalerganest = $this->fclalerganest;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('1') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclalerganest'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fclalerganest']) && !empty($this->NM_ajax_info['select_html']['fclalerganest']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fclalerganest'];
          }
          $this->NM_ajax_info['fldList']['fclalerganest'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-fclalerganest',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fclalerganest']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fclalerganest']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fclalerganest']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fclalerganest']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fclalerganest']['labList'] = $aLabel;
          }
   }

          //----- fclprophemor
   function ajax_return_values_fclprophemor($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclprophemor", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclprophemor);
              $aLookup = array();
              $this->_tmp_lookup_fclprophemor = $this->fclprophemor;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('1') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclprophemor'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fclprophemor']) && !empty($this->NM_ajax_info['select_html']['fclprophemor']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fclprophemor'];
          }
          $this->NM_ajax_info['fldList']['fclprophemor'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-fclprophemor',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fclprophemor']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fclprophemor']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fclprophemor']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fclprophemor']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fclprophemor']['labList'] = $aLabel;
          }
   }

          //----- fclintervquir
   function ajax_return_values_fclintervquir($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclintervquir", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclintervquir);
              $aLookup = array();
              $this->_tmp_lookup_fclintervquir = $this->fclintervquir;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('1') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclintervquir'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fclintervquir']) && !empty($this->NM_ajax_info['select_html']['fclintervquir']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fclintervquir'];
          }
          $this->NM_ajax_info['fldList']['fclintervquir'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-fclintervquir',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fclintervquir']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fclintervquir']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fclintervquir']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fclintervquir']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fclintervquir']['labList'] = $aLabel;
          }
   }

          //----- fclmediesp
   function ajax_return_values_fclmediesp($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclmediesp", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclmediesp);
              $aLookup = array();
              $this->_tmp_lookup_fclmediesp = $this->fclmediesp;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('1') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclmediesp'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fclmediesp']) && !empty($this->NM_ajax_info['select_html']['fclmediesp']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fclmediesp'];
          }
          $this->NM_ajax_info['fldList']['fclmediesp'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-fclmediesp',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fclmediesp']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fclmediesp']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fclmediesp']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fclmediesp']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fclmediesp']['labList'] = $aLabel;
          }
   }

          //----- fclhiperten
   function ajax_return_values_fclhiperten($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclhiperten", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclhiperten);
              $aLookup = array();
              $this->_tmp_lookup_fclhiperten = $this->fclhiperten;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('1') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclhiperten'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fclhiperten']) && !empty($this->NM_ajax_info['select_html']['fclhiperten']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fclhiperten'];
          }
          $this->NM_ajax_info['fldList']['fclhiperten'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-fclhiperten',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fclhiperten']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fclhiperten']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fclhiperten']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fclhiperten']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fclhiperten']['labList'] = $aLabel;
          }
   }

          //----- fclhipotiro
   function ajax_return_values_fclhipotiro($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclhipotiro", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclhipotiro);
              $aLookup = array();
              $this->_tmp_lookup_fclhipotiro = $this->fclhipotiro;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('1') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclhipotiro'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fclhipotiro']) && !empty($this->NM_ajax_info['select_html']['fclhipotiro']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fclhipotiro'];
          }
          $this->NM_ajax_info['fldList']['fclhipotiro'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-fclhipotiro',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fclhipotiro']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fclhipotiro']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fclhipotiro']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fclhipotiro']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fclhipotiro']['labList'] = $aLabel;
          }
   }

          //----- fclaltercora
   function ajax_return_values_fclaltercora($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclaltercora", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclaltercora);
              $aLookup = array();
              $this->_tmp_lookup_fclaltercora = $this->fclaltercora;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('1') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclaltercora'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fclaltercora']) && !empty($this->NM_ajax_info['select_html']['fclaltercora']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fclaltercora'];
          }
          $this->NM_ajax_info['fldList']['fclaltercora'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-fclaltercora',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fclaltercora']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fclaltercora']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fclaltercora']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fclaltercora']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fclaltercora']['labList'] = $aLabel;
          }
   }

          //----- fclgastrit
   function ajax_return_values_fclgastrit($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclgastrit", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclgastrit);
              $aLookup = array();
              $this->_tmp_lookup_fclgastrit = $this->fclgastrit;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('1') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclgastrit'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fclgastrit']) && !empty($this->NM_ajax_info['select_html']['fclgastrit']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fclgastrit'];
          }
          $this->NM_ajax_info['fldList']['fclgastrit'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-fclgastrit',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fclgastrit']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fclgastrit']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fclgastrit']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fclgastrit']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fclgastrit']['labList'] = $aLabel;
          }
   }

          //----- fclenfsangre
   function ajax_return_values_fclenfsangre($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclenfsangre", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclenfsangre);
              $aLookup = array();
              $this->_tmp_lookup_fclenfsangre = $this->fclenfsangre;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('1') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclenfsangre'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fclenfsangre']) && !empty($this->NM_ajax_info['select_html']['fclenfsangre']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fclenfsangre'];
          }
          $this->NM_ajax_info['fldList']['fclenfsangre'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-fclenfsangre',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fclenfsangre']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fclenfsangre']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fclenfsangre']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fclenfsangre']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fclenfsangre']['labList'] = $aLabel;
          }
   }

          //----- fcldiabet
   function ajax_return_values_fcldiabet($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fcldiabet", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fcldiabet);
              $aLookup = array();
              $this->_tmp_lookup_fcldiabet = $this->fcldiabet;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('1') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fcldiabet'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fcldiabet']) && !empty($this->NM_ajax_info['select_html']['fcldiabet']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fcldiabet'];
          }
          $this->NM_ajax_info['fldList']['fcldiabet'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-fcldiabet',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fcldiabet']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fcldiabet']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fcldiabet']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fcldiabet']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fcldiabet']['labList'] = $aLabel;
          }
   }

          //----- fclhepatit
   function ajax_return_values_fclhepatit($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclhepatit", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclhepatit);
              $aLookup = array();
              $this->_tmp_lookup_fclhepatit = $this->fclhepatit;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('1') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclhepatit'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fclhepatit']) && !empty($this->NM_ajax_info['select_html']['fclhepatit']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fclhepatit'];
          }
          $this->NM_ajax_info['fldList']['fclhepatit'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-fclhepatit',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fclhepatit']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fclhepatit']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fclhepatit']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fclhepatit']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fclhepatit']['labList'] = $aLabel;
          }
   }

          //----- fclcancer
   function ajax_return_values_fclcancer($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclcancer", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclcancer);
              $aLookup = array();
              $this->_tmp_lookup_fclcancer = $this->fclcancer;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('1') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclcancer'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fclcancer']) && !empty($this->NM_ajax_info['select_html']['fclcancer']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fclcancer'];
          }
          $this->NM_ajax_info['fldList']['fclcancer'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-fclcancer',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fclcancer']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fclcancer']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fclcancer']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fclcancer']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fclcancer']['labList'] = $aLabel;
          }
   }

          //----- fclvih
   function ajax_return_values_fclvih($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclvih", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclvih);
              $aLookup = array();
              $this->_tmp_lookup_fclvih = $this->fclvih;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('1') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclvih'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fclvih']) && !empty($this->NM_ajax_info['select_html']['fclvih']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fclvih'];
          }
          $this->NM_ajax_info['fldList']['fclvih'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-fclvih',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fclvih']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fclvih']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fclvih']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fclvih']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fclvih']['labList'] = $aLabel;
          }
   }

          //----- fclartrit
   function ajax_return_values_fclartrit($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclartrit", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclartrit);
              $aLookup = array();
              $this->_tmp_lookup_fclartrit = $this->fclartrit;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('1') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclartrit'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fclartrit']) && !empty($this->NM_ajax_info['select_html']['fclartrit']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fclartrit'];
          }
          $this->NM_ajax_info['fldList']['fclartrit'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-fclartrit',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fclartrit']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fclartrit']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fclartrit']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fclartrit']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fclartrit']['labList'] = $aLabel;
          }
   }

          //----- fclinsufren
   function ajax_return_values_fclinsufren($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclinsufren", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclinsufren);
              $aLookup = array();
              $this->_tmp_lookup_fclinsufren = $this->fclinsufren;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('1') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclinsufren'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fclinsufren']) && !empty($this->NM_ajax_info['select_html']['fclinsufren']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fclinsufren'];
          }
          $this->NM_ajax_info['fldList']['fclinsufren'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-fclinsufren',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fclinsufren']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fclinsufren']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fclinsufren']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fclinsufren']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fclinsufren']['labList'] = $aLabel;
          }
   }

          //----- fclotrasenf
   function ajax_return_values_fclotrasenf($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclotrasenf", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclotrasenf);
              $aLookup = array();
              $this->_tmp_lookup_fclotrasenf = $this->fclotrasenf;

$aLookup[] = array(form_ficha_cliente_pack_protect_string('1') => str_replace('<', '&lt;',form_ficha_cliente_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['Lookup_fclotrasenf'][] = '1';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['fclotrasenf']) && !empty($this->NM_ajax_info['select_html']['fclotrasenf']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['fclotrasenf'];
          }
          $this->NM_ajax_info['fldList']['fclotrasenf'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-fclotrasenf',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['fclotrasenf']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['fclotrasenf']['valList'][$i] = form_ficha_cliente_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['fclotrasenf']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['fclotrasenf']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['fclotrasenf']['labList'] = $aLabel;
          }
   }

          //----- fclotrasenfdesc
   function ajax_return_values_fclotrasenfdesc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclotrasenfdesc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclotrasenfdesc);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fclotrasenfdesc'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fclobserv
   function ajax_return_values_fclobserv($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclobserv", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclobserv);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fclobserv'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fclusucrea
   function ajax_return_values_fclusucrea($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclusucrea", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclusucrea);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fclusucrea'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fclfeccrea
   function ajax_return_values_fclfeccrea($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclfeccrea", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclfeccrea);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fclfeccrea'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->fclfeccrea . ' ' . $this->fclfeccrea_hora),
              );
          }
   }

          //----- fclusumodi
   function ajax_return_values_fclusumodi($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclusumodi", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclusumodi);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fclusumodi'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fclfecmodi
   function ajax_return_values_fclfecmodi($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fclfecmodi", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fclfecmodi);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fclfecmodi'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->fclfecmodi . ' ' . $this->fclfecmodi_hora),
              );
          }
   }

          //----- historias
   function ajax_return_values_historias($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("historias", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->historias);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['historias'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- presupuestos
   function ajax_return_values_presupuestos($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("presupuestos", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->presupuestos);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['presupuestos'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- cobros
   function ajax_return_values_cobros($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cobros", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cobros);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cobros'] = array(
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['upload_dir'][$fieldName][] = $newName;
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
      if ($this->sc_evento == "novo" || $this->sc_evento == "incluir" || ($this->nmgp_opcao == "nada" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['opc_ant']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['opc_ant'] == "novo") || (isset($GLOBALS['erro_incl']) && 1 == $GLOBALS['erro_incl']))
      {
          if (!isset($this->nmgp_cmp_hidden["fclnumero"]))
          {
              $this->nmgp_cmp_hidden["fclnumero"] = "off"; $this->NM_ajax_info['fieldDisplay']['fclnumero'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["fclusucrea"]))
          {
              $this->nmgp_cmp_hidden["fclusucrea"] = "off"; $this->NM_ajax_info['fieldDisplay']['fclusucrea'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["fclusumodi"]))
          {
              $this->nmgp_cmp_hidden["fclusumodi"] = "off"; $this->NM_ajax_info['fieldDisplay']['fclusumodi'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["fclfeccrea"]))
          {
              $this->nmgp_cmp_hidden["fclfeccrea"] = "off"; $this->NM_ajax_info['fieldDisplay']['fclfeccrea'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["fclfecmodi"]))
          {
              $this->nmgp_cmp_hidden["fclfecmodi"] = "off"; $this->NM_ajax_info['fieldDisplay']['fclfecmodi'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["fclactivo"]))
          {
              $this->nmgp_cmp_hidden["fclactivo"] = "off"; $this->NM_ajax_info['fieldDisplay']['fclactivo'] = 'off';
          }
          if (!isset($this->nmgp_cmp_hidden["presupuestos"]))
          {
              $this->nmgp_cmp_hidden["presupuestos"] = "off"; $this->NM_ajax_info['fieldDisplay']['presupuestos'] = 'off';
          }
      }
      else
      {
      }
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_ficha_cliente']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_fclfacigual = $this->fclfacigual;
    $original_fclotrasenf = $this->fclotrasenf;
    $original_fclotrasenfdesc = $this->fclotrasenfdesc;
    $original_fclreferremit = $this->fclreferremit;
    $original_fclreferremitnom = $this->fclreferremitnom;
}
if (!isset($this->sc_temp_usr_perfil)) {$this->sc_temp_usr_perfil = (isset($_SESSION['usr_perfil'])) ? $_SESSION['usr_perfil'] : "";}
  $this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "off";;

if ($this->fclreferremit  == 1)     
{
    $this->nmgp_cmp_hidden["fclreferremitnom"] = "on"; $this->NM_ajax_info['fieldDisplay']['fclreferremitnom'] = 'on';
}
else      
{
    $this->nmgp_cmp_hidden["fclreferremitnom"] = "off"; $this->NM_ajax_info['fieldDisplay']['fclreferremitnom'] = 'off';
	
}


if ($this->fclotrasenf == 1)     
{
    $this->nmgp_cmp_hidden["fclotrasenfdesc"] = "on"; $this->NM_ajax_info['fieldDisplay']['fclotrasenfdesc'] = 'on';
}
else      
{
    $this->nmgp_cmp_hidden["fclotrasenfdesc"] = "off"; $this->NM_ajax_info['fieldDisplay']['fclotrasenfdesc'] = 'off';
	
}



if ($this->sc_evento == "novo")     
{
	$this->Ini->nm_hidden_blocos[12] = "off"; $this->NM_ajax_info['blockDisplay']['12'] = 'off';
	$this->Ini->nm_hidden_blocos[11] = "off"; $this->NM_ajax_info['blockDisplay']['11'] = 'off';
	
}
else      
{
	$this->Ini->nm_hidden_blocos[12] = "on"; $this->NM_ajax_info['blockDisplay']['12'] = 'on';
	$this->Ini->nm_hidden_blocos[11] = "on"; $this->NM_ajax_info['blockDisplay']['11'] = 'on';
}


if($this->fclfacigual ==1) {
	
	$this->Ini->nm_hidden_blocos[3] = "off"; $this->NM_ajax_info['blockDisplay']['3'] = 'off';
	
}
else {
	
	$this->Ini->nm_hidden_blocos[3] = "on"; $this->NM_ajax_info['blockDisplay']['3'] = 'on';
}


if($this->sc_temp_usr_perfil==2) {
	$this->Ini->nm_hidden_blocos[13] = "off"; $this->NM_ajax_info['blockDisplay']['13'] = 'off';
	$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "off";;
	$this->NM_ajax_info['buttonDisplay']['insert'] = $this->nmgp_botoes["insert"] = "off";;
}

if($this->sc_temp_usr_perfil==3) {
	$this->Ini->nm_hidden_blocos[11] = "off"; $this->NM_ajax_info['blockDisplay']['11'] = 'off';
	$this->Ini->nm_hidden_blocos[12] = "off"; $this->NM_ajax_info['blockDisplay']['12'] = 'off';

}
if (isset($this->sc_temp_usr_perfil)) { $_SESSION['usr_perfil'] = $this->sc_temp_usr_perfil;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_fclfacigual != $this->fclfacigual || (isset($bFlagRead_fclfacigual) && $bFlagRead_fclfacigual)))
    {
        $this->ajax_return_values_fclfacigual(true);
    }
    if (($original_fclotrasenf != $this->fclotrasenf || (isset($bFlagRead_fclotrasenf) && $bFlagRead_fclotrasenf)))
    {
        $this->ajax_return_values_fclotrasenf(true);
    }
    if (($original_fclotrasenfdesc != $this->fclotrasenfdesc || (isset($bFlagRead_fclotrasenfdesc) && $bFlagRead_fclotrasenfdesc)))
    {
        $this->ajax_return_values_fclotrasenfdesc(true);
    }
    if (($original_fclreferremit != $this->fclreferremit || (isset($bFlagRead_fclreferremit) && $bFlagRead_fclreferremit)))
    {
        $this->ajax_return_values_fclreferremit(true);
    }
    if (($original_fclreferremitnom != $this->fclreferremitnom || (isset($bFlagRead_fclreferremitnom) && $bFlagRead_fclreferremitnom)))
    {
        $this->ajax_return_values_fclreferremitnom(true);
    }
}
$_SESSION['scriptcase']['form_ficha_cliente']['contr_erro'] = 'off'; 
      }
      if (empty($this->fclfeccrea))
      {
          $this->fclfeccrea_hora = $this->fclfeccrea;
      }
      if (empty($this->fclfecmodi))
      {
          $this->fclfecmodi_hora = $this->fclfecmodi;
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
      $_SESSION['scriptcase']['form_ficha_cliente']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_fclfacdir = $this->fclfacdir;
    $original_fclfacigual = $this->fclfacigual;
    $original_fclfacmail = $this->fclfacmail;
    $original_fclfacnombre = $this->fclfacnombre;
    $original_fclfacruc = $this->fclfacruc;
    $original_fclfactelf = $this->fclfactelf;
    $original_fclnumero = $this->fclnumero;
}
if (!isset($this->sc_temp_v_mincodigoficha)) {$this->sc_temp_v_mincodigoficha = (isset($_SESSION['v_mincodigoficha'])) ? $_SESSION['v_mincodigoficha'] : "";}
  if($this->fclfacigual ==1) {
	$this->fclfacnombre ="";
	$this->fclfacruc ="";
	$this->fclfacdir ="";
	$this->fclfactelf ="";
	$this->fclfacmail ="";
}


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
	
	$numficha	= $this->ds[0][0]+1;
	
}

else {
	
	$numficha = $this->sc_temp_v_mincodigoficha;
}


$this->fclnumero =$numficha;
if (isset($this->sc_temp_v_mincodigoficha)) { $_SESSION['v_mincodigoficha'] = $this->sc_temp_v_mincodigoficha;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_fclfacdir != $this->fclfacdir || (isset($bFlagRead_fclfacdir) && $bFlagRead_fclfacdir)))
    {
        $this->ajax_return_values_fclfacdir(true);
    }
    if (($original_fclfacigual != $this->fclfacigual || (isset($bFlagRead_fclfacigual) && $bFlagRead_fclfacigual)))
    {
        $this->ajax_return_values_fclfacigual(true);
    }
    if (($original_fclfacmail != $this->fclfacmail || (isset($bFlagRead_fclfacmail) && $bFlagRead_fclfacmail)))
    {
        $this->ajax_return_values_fclfacmail(true);
    }
    if (($original_fclfacnombre != $this->fclfacnombre || (isset($bFlagRead_fclfacnombre) && $bFlagRead_fclfacnombre)))
    {
        $this->ajax_return_values_fclfacnombre(true);
    }
    if (($original_fclfacruc != $this->fclfacruc || (isset($bFlagRead_fclfacruc) && $bFlagRead_fclfacruc)))
    {
        $this->ajax_return_values_fclfacruc(true);
    }
    if (($original_fclfactelf != $this->fclfactelf || (isset($bFlagRead_fclfactelf) && $bFlagRead_fclfactelf)))
    {
        $this->ajax_return_values_fclfactelf(true);
    }
    if (($original_fclnumero != $this->fclnumero || (isset($bFlagRead_fclnumero) && $bFlagRead_fclnumero)))
    {
        $this->ajax_return_values_fclnumero(true);
    }
}
$_SESSION['scriptcase']['form_ficha_cliente']['contr_erro'] = 'off'; 
    }
    if ("alterar" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_ficha_cliente']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_fclfacdir = $this->fclfacdir;
    $original_fclfacigual = $this->fclfacigual;
    $original_fclfacmail = $this->fclfacmail;
    $original_fclfacnombre = $this->fclfacnombre;
    $original_fclfacruc = $this->fclfacruc;
    $original_fclfactelf = $this->fclfactelf;
}
  if($this->fclfacigual ==1) {
	$this->fclfacnombre ="";
	$this->fclfacruc ="";
	$this->fclfacdir ="";
	$this->fclfactelf ="";
	$this->fclfacmail ="";
	
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_fclfacdir != $this->fclfacdir || (isset($bFlagRead_fclfacdir) && $bFlagRead_fclfacdir)))
    {
        $this->ajax_return_values_fclfacdir(true);
    }
    if (($original_fclfacigual != $this->fclfacigual || (isset($bFlagRead_fclfacigual) && $bFlagRead_fclfacigual)))
    {
        $this->ajax_return_values_fclfacigual(true);
    }
    if (($original_fclfacmail != $this->fclfacmail || (isset($bFlagRead_fclfacmail) && $bFlagRead_fclfacmail)))
    {
        $this->ajax_return_values_fclfacmail(true);
    }
    if (($original_fclfacnombre != $this->fclfacnombre || (isset($bFlagRead_fclfacnombre) && $bFlagRead_fclfacnombre)))
    {
        $this->ajax_return_values_fclfacnombre(true);
    }
    if (($original_fclfacruc != $this->fclfacruc || (isset($bFlagRead_fclfacruc) && $bFlagRead_fclfacruc)))
    {
        $this->ajax_return_values_fclfacruc(true);
    }
    if (($original_fclfactelf != $this->fclfactelf || (isset($bFlagRead_fclfactelf) && $bFlagRead_fclfactelf)))
    {
        $this->ajax_return_values_fclfactelf(true);
    }
}
$_SESSION['scriptcase']['form_ficha_cliente']['contr_erro'] = 'off'; 
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
      if ('incluir' == $this->nmgp_opcao && empty($this->fclusucrea)) {$this->fclusucrea = "" . $_SESSION['usr_login'] . ""; $NM_val_null[] = "fclusucrea";}  
      if (('alterar' == $this->nmgp_opcao || 'igual' == $this->nmgp_opcao) && empty($this->fclusumodi)){$this->fclusumodi = "" . $_SESSION['usr_login'] . ""; $NM_val_null[] = "fclusumodi";}  
      $NM_val_form['fclnumero'] = $this->fclnumero;
      $NM_val_form['fclfechareg'] = $this->fclfechareg;
      $NM_val_form['fclcedula'] = $this->fclcedula;
      $NM_val_form['fclactivo'] = $this->fclactivo;
      $NM_val_form['fclapellidos'] = $this->fclapellidos;
      $NM_val_form['fclnombres'] = $this->fclnombres;
      $NM_val_form['update_titulo_citas'] = $this->update_titulo_citas;
      $NM_val_form['fclfechanac'] = $this->fclfechanac;
      $NM_val_form['fclsexo'] = $this->fclsexo;
      $NM_val_form['fclestciv'] = $this->fclestciv;
      $NM_val_form['fcldireccion'] = $this->fcldireccion;
      $NM_val_form['fclciudad'] = $this->fclciudad;
      $NM_val_form['fcltelefono'] = $this->fcltelefono;
      $NM_val_form['fclcelular'] = $this->fclcelular;
      $NM_val_form['fclemail'] = $this->fclemail;
      $NM_val_form['fclprofesion'] = $this->fclprofesion;
      $NM_val_form['fcllugartrab'] = $this->fcllugartrab;
      $NM_val_form['fclfacigual'] = $this->fclfacigual;
      $NM_val_form['fclfacruc'] = $this->fclfacruc;
      $NM_val_form['fclfacnombre'] = $this->fclfacnombre;
      $NM_val_form['fclfacdir'] = $this->fclfacdir;
      $NM_val_form['fclfactelf'] = $this->fclfactelf;
      $NM_val_form['fclfacmail'] = $this->fclfacmail;
      $NM_val_form['fclreferpub'] = $this->fclreferpub;
      $NM_val_form['fclreferface'] = $this->fclreferface;
      $NM_val_form['fclreferweb'] = $this->fclreferweb;
      $NM_val_form['fclreferremit'] = $this->fclreferremit;
      $NM_val_form['fclreferremitnom'] = $this->fclreferremitnom;
      $NM_val_form['fclmotivprimcons'] = $this->fclmotivprimcons;
      $NM_val_form['fclproblemactual'] = $this->fclproblemactual;
      $NM_val_form['fclbajotratmed'] = $this->fclbajotratmed;
      $NM_val_form['fclalerganest'] = $this->fclalerganest;
      $NM_val_form['fclprophemor'] = $this->fclprophemor;
      $NM_val_form['fclintervquir'] = $this->fclintervquir;
      $NM_val_form['fclmediesp'] = $this->fclmediesp;
      $NM_val_form['fclhiperten'] = $this->fclhiperten;
      $NM_val_form['fclhipotiro'] = $this->fclhipotiro;
      $NM_val_form['fclaltercora'] = $this->fclaltercora;
      $NM_val_form['fclgastrit'] = $this->fclgastrit;
      $NM_val_form['fclenfsangre'] = $this->fclenfsangre;
      $NM_val_form['fcldiabet'] = $this->fcldiabet;
      $NM_val_form['fclhepatit'] = $this->fclhepatit;
      $NM_val_form['fclcancer'] = $this->fclcancer;
      $NM_val_form['fclvih'] = $this->fclvih;
      $NM_val_form['fclartrit'] = $this->fclartrit;
      $NM_val_form['fclinsufren'] = $this->fclinsufren;
      $NM_val_form['fclotrasenf'] = $this->fclotrasenf;
      $NM_val_form['fclotrasenfdesc'] = $this->fclotrasenfdesc;
      $NM_val_form['fclobserv'] = $this->fclobserv;
      $NM_val_form['fclusucrea'] = $this->fclusucrea;
      $NM_val_form['fclfeccrea'] = $this->fclfeccrea;
      $NM_val_form['fclusumodi'] = $this->fclusumodi;
      $NM_val_form['fclfecmodi'] = $this->fclfecmodi;
      $NM_val_form['historias'] = $this->historias;
      $NM_val_form['presupuestos'] = $this->presupuestos;
      $NM_val_form['cobros'] = $this->cobros;
      if ($this->fclnumero === "" || is_null($this->fclnumero))  
      { 
          $this->fclnumero = 0;
      } 
      if ($this->fclreferpub === "" || is_null($this->fclreferpub))  
      { 
          $this->fclreferpub = 0;
          $this->sc_force_zero[] = 'fclreferpub';
      } 
      if ($this->fclreferface === "" || is_null($this->fclreferface))  
      { 
          $this->fclreferface = 0;
          $this->sc_force_zero[] = 'fclreferface';
      } 
      if ($this->fclreferweb === "" || is_null($this->fclreferweb))  
      { 
          $this->fclreferweb = 0;
          $this->sc_force_zero[] = 'fclreferweb';
      } 
      if ($this->fclreferremit === "" || is_null($this->fclreferremit))  
      { 
          $this->fclreferremit = 0;
          $this->sc_force_zero[] = 'fclreferremit';
      } 
      if ($this->fclbajotratmed === "" || is_null($this->fclbajotratmed))  
      { 
          $this->fclbajotratmed = 0;
          $this->sc_force_zero[] = 'fclbajotratmed';
      } 
      if ($this->fclalerganest === "" || is_null($this->fclalerganest))  
      { 
          $this->fclalerganest = 0;
          $this->sc_force_zero[] = 'fclalerganest';
      } 
      if ($this->fclprophemor === "" || is_null($this->fclprophemor))  
      { 
          $this->fclprophemor = 0;
          $this->sc_force_zero[] = 'fclprophemor';
      } 
      if ($this->fclintervquir === "" || is_null($this->fclintervquir))  
      { 
          $this->fclintervquir = 0;
          $this->sc_force_zero[] = 'fclintervquir';
      } 
      if ($this->fclmediesp === "" || is_null($this->fclmediesp))  
      { 
          $this->fclmediesp = 0;
          $this->sc_force_zero[] = 'fclmediesp';
      } 
      if ($this->fclhiperten === "" || is_null($this->fclhiperten))  
      { 
          $this->fclhiperten = 0;
          $this->sc_force_zero[] = 'fclhiperten';
      } 
      if ($this->fclhipotiro === "" || is_null($this->fclhipotiro))  
      { 
          $this->fclhipotiro = 0;
          $this->sc_force_zero[] = 'fclhipotiro';
      } 
      if ($this->fclaltercora === "" || is_null($this->fclaltercora))  
      { 
          $this->fclaltercora = 0;
          $this->sc_force_zero[] = 'fclaltercora';
      } 
      if ($this->fclgastrit === "" || is_null($this->fclgastrit))  
      { 
          $this->fclgastrit = 0;
          $this->sc_force_zero[] = 'fclgastrit';
      } 
      if ($this->fclenfsangre === "" || is_null($this->fclenfsangre))  
      { 
          $this->fclenfsangre = 0;
          $this->sc_force_zero[] = 'fclenfsangre';
      } 
      if ($this->fcldiabet === "" || is_null($this->fcldiabet))  
      { 
          $this->fcldiabet = 0;
          $this->sc_force_zero[] = 'fcldiabet';
      } 
      if ($this->fclhepatit === "" || is_null($this->fclhepatit))  
      { 
          $this->fclhepatit = 0;
          $this->sc_force_zero[] = 'fclhepatit';
      } 
      if ($this->fclcancer === "" || is_null($this->fclcancer))  
      { 
          $this->fclcancer = 0;
          $this->sc_force_zero[] = 'fclcancer';
      } 
      if ($this->fclvih === "" || is_null($this->fclvih))  
      { 
          $this->fclvih = 0;
          $this->sc_force_zero[] = 'fclvih';
      } 
      if ($this->fclartrit === "" || is_null($this->fclartrit))  
      { 
          $this->fclartrit = 0;
          $this->sc_force_zero[] = 'fclartrit';
      } 
      if ($this->fclinsufren === "" || is_null($this->fclinsufren))  
      { 
          $this->fclinsufren = 0;
          $this->sc_force_zero[] = 'fclinsufren';
      } 
      if ($this->fclotrasenf === "" || is_null($this->fclotrasenf))  
      { 
          $this->fclotrasenf = 0;
          $this->sc_force_zero[] = 'fclotrasenf';
      } 
      if ($this->fclfacigual === "" || is_null($this->fclfacigual))  
      { 
          $this->fclfacigual = 0;
          $this->sc_force_zero[] = 'fclfacigual';
      } 
      if ($this->fclactivo === "" || is_null($this->fclactivo))  
      { 
          $this->fclactivo = 0;
          $this->sc_force_zero[] = 'fclactivo';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->fclnombres_before_qstr = $this->fclnombres;
          $this->fclnombres = substr($this->Db->qstr($this->fclnombres), 1, -1); 
          if ($this->fclnombres == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fclnombres = "null"; 
              $NM_val_null[] = "fclnombres";
          } 
          $this->fclapellidos_before_qstr = $this->fclapellidos;
          $this->fclapellidos = substr($this->Db->qstr($this->fclapellidos), 1, -1); 
          if ($this->fclapellidos == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fclapellidos = "null"; 
              $NM_val_null[] = "fclapellidos";
          } 
          if ($this->fclfechareg == "")  
          { 
              $this->fclfechareg = "null"; 
              $NM_val_null[] = "fclfechareg";
          } 
          if ($this->fclfechanac == "")  
          { 
              $this->fclfechanac = "null"; 
              $NM_val_null[] = "fclfechanac";
          } 
          $this->fclsexo_before_qstr = $this->fclsexo;
          $this->fclsexo = substr($this->Db->qstr($this->fclsexo), 1, -1); 
          if ($this->fclsexo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fclsexo = "null"; 
              $NM_val_null[] = "fclsexo";
          } 
          $this->fclcedula_before_qstr = $this->fclcedula;
          $this->fclcedula = substr($this->Db->qstr($this->fclcedula), 1, -1); 
          if ($this->fclcedula == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fclcedula = "null"; 
              $NM_val_null[] = "fclcedula";
          } 
          $this->fclestciv_before_qstr = $this->fclestciv;
          $this->fclestciv = substr($this->Db->qstr($this->fclestciv), 1, -1); 
          if ($this->fclestciv == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fclestciv = "null"; 
              $NM_val_null[] = "fclestciv";
          } 
          $this->fcldireccion_before_qstr = $this->fcldireccion;
          $this->fcldireccion = substr($this->Db->qstr($this->fcldireccion), 1, -1); 
          if ($this->fcldireccion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fcldireccion = "null"; 
              $NM_val_null[] = "fcldireccion";
          } 
          $this->fclciudad_before_qstr = $this->fclciudad;
          $this->fclciudad = substr($this->Db->qstr($this->fclciudad), 1, -1); 
          if ($this->fclciudad == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fclciudad = "null"; 
              $NM_val_null[] = "fclciudad";
          } 
          $this->fcltelefono_before_qstr = $this->fcltelefono;
          $this->fcltelefono = substr($this->Db->qstr($this->fcltelefono), 1, -1); 
          if ($this->fcltelefono == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fcltelefono = "null"; 
              $NM_val_null[] = "fcltelefono";
          } 
          $this->fclcelular_before_qstr = $this->fclcelular;
          $this->fclcelular = substr($this->Db->qstr($this->fclcelular), 1, -1); 
          if ($this->fclcelular == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fclcelular = "null"; 
              $NM_val_null[] = "fclcelular";
          } 
          $this->fclemail_before_qstr = $this->fclemail;
          $this->fclemail = substr($this->Db->qstr($this->fclemail), 1, -1); 
          if ($this->fclemail == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fclemail = "null"; 
              $NM_val_null[] = "fclemail";
          } 
          $this->fclprofesion_before_qstr = $this->fclprofesion;
          $this->fclprofesion = substr($this->Db->qstr($this->fclprofesion), 1, -1); 
          if ($this->fclprofesion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fclprofesion = "null"; 
              $NM_val_null[] = "fclprofesion";
          } 
          $this->fcllugartrab_before_qstr = $this->fcllugartrab;
          $this->fcllugartrab = substr($this->Db->qstr($this->fcllugartrab), 1, -1); 
          if ($this->fcllugartrab == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fcllugartrab = "null"; 
              $NM_val_null[] = "fcllugartrab";
          } 
          $this->fclreferremitnom_before_qstr = $this->fclreferremitnom;
          $this->fclreferremitnom = substr($this->Db->qstr($this->fclreferremitnom), 1, -1); 
          if ($this->fclreferremitnom == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fclreferremitnom = "null"; 
              $NM_val_null[] = "fclreferremitnom";
          } 
          $this->fclmotivprimcons_before_qstr = $this->fclmotivprimcons;
          $this->fclmotivprimcons = substr($this->Db->qstr($this->fclmotivprimcons), 1, -1); 
          if ($this->fclmotivprimcons == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fclmotivprimcons = "null"; 
              $NM_val_null[] = "fclmotivprimcons";
          } 
          $this->fclproblemactual_before_qstr = $this->fclproblemactual;
          $this->fclproblemactual = substr($this->Db->qstr($this->fclproblemactual), 1, -1); 
          if ($this->fclproblemactual == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fclproblemactual = "null"; 
              $NM_val_null[] = "fclproblemactual";
          } 
          $this->fclotrasenfdesc_before_qstr = $this->fclotrasenfdesc;
          $this->fclotrasenfdesc = substr($this->Db->qstr($this->fclotrasenfdesc), 1, -1); 
          if ($this->fclotrasenfdesc == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fclotrasenfdesc = "null"; 
              $NM_val_null[] = "fclotrasenfdesc";
          } 
          $this->fclobserv_before_qstr = $this->fclobserv;
          $this->fclobserv = substr($this->Db->qstr($this->fclobserv), 1, -1); 
          if ($this->fclobserv == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fclobserv = "null"; 
              $NM_val_null[] = "fclobserv";
          } 
          $this->fclusucrea_before_qstr = $this->fclusucrea;
          $this->fclusucrea = substr($this->Db->qstr($this->fclusucrea), 1, -1); 
          if ($this->fclusucrea == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fclusucrea = "null"; 
              $NM_val_null[] = "fclusucrea";
          } 
          $this->fclusumodi_before_qstr = $this->fclusumodi;
          $this->fclusumodi = substr($this->Db->qstr($this->fclusumodi), 1, -1); 
          if ($this->fclusumodi == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fclusumodi = "null"; 
              $NM_val_null[] = "fclusumodi";
          } 
          if ($this->fclfeccrea == "")  
          { 
              $this->fclfeccrea = "null"; 
              $NM_val_null[] = "fclfeccrea";
          } 
          if ($this->fclfecmodi == "")  
          { 
              $this->fclfecmodi = "null"; 
              $NM_val_null[] = "fclfecmodi";
          } 
          $this->fclfacnombre_before_qstr = $this->fclfacnombre;
          $this->fclfacnombre = substr($this->Db->qstr($this->fclfacnombre), 1, -1); 
          if ($this->fclfacnombre == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fclfacnombre = "null"; 
              $NM_val_null[] = "fclfacnombre";
          } 
          $this->fclfacruc_before_qstr = $this->fclfacruc;
          $this->fclfacruc = substr($this->Db->qstr($this->fclfacruc), 1, -1); 
          if ($this->fclfacruc == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fclfacruc = "null"; 
              $NM_val_null[] = "fclfacruc";
          } 
          $this->fclfacdir_before_qstr = $this->fclfacdir;
          $this->fclfacdir = substr($this->Db->qstr($this->fclfacdir), 1, -1); 
          if ($this->fclfacdir == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fclfacdir = "null"; 
              $NM_val_null[] = "fclfacdir";
          } 
          $this->fclfactelf_before_qstr = $this->fclfactelf;
          $this->fclfactelf = substr($this->Db->qstr($this->fclfactelf), 1, -1); 
          if ($this->fclfactelf == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fclfactelf = "null"; 
              $NM_val_null[] = "fclfactelf";
          } 
          $this->fclfacmail_before_qstr = $this->fclfacmail;
          $this->fclfacmail = substr($this->Db->qstr($this->fclfacmail), 1, -1); 
          if ($this->fclfacmail == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fclfacmail = "null"; 
              $NM_val_null[] = "fclfacmail";
          } 
          $this->cobros_before_qstr = $this->cobros;
          $this->cobros = substr($this->Db->qstr($this->cobros), 1, -1); 
          if ($this->cobros == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cobros = "null"; 
              $NM_val_null[] = "cobros";
          } 
          $this->historias_before_qstr = $this->historias;
          $this->historias = substr($this->Db->qstr($this->historias), 1, -1); 
          if ($this->historias == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->historias = "null"; 
              $NM_val_null[] = "historias";
          } 
          $this->presupuestos_before_qstr = $this->presupuestos;
          $this->presupuestos = substr($this->Db->qstr($this->presupuestos), 1, -1); 
          if ($this->presupuestos == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->presupuestos = "null"; 
              $NM_val_null[] = "presupuestos";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['foreign_key'] as $sFKName => $sFKValue)
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
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_ficha_cliente_pack_ajax_response();
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
              $this->fclfecmodi =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->fclfecmodi_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $NM_val_form['fclfecmodi'] = $this->fclfecmodi;
              $this->NM_ajax_changed['fclfecmodi'] = true;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "fclnombres = '$this->fclnombres', fclapellidos = '$this->fclapellidos', fclfechanac = #$this->fclfechanac#, fclsexo = '$this->fclsexo', fclcedula = '$this->fclcedula', fclestciv = '$this->fclestciv', fcldireccion = '$this->fcldireccion', fclciudad = '$this->fclciudad', fcltelefono = '$this->fcltelefono', fclcelular = '$this->fclcelular', fclemail = '$this->fclemail', fclprofesion = '$this->fclprofesion', fcllugartrab = '$this->fcllugartrab', fclreferpub = $this->fclreferpub, fclreferface = $this->fclreferface, fclreferweb = $this->fclreferweb, fclreferremit = $this->fclreferremit, fclreferremitnom = '$this->fclreferremitnom', fclmotivprimcons = '$this->fclmotivprimcons', fclproblemactual = '$this->fclproblemactual', fclbajotratmed = $this->fclbajotratmed, fclalerganest = $this->fclalerganest, fclprophemor = $this->fclprophemor, fclintervquir = $this->fclintervquir, fclmediesp = $this->fclmediesp, fclhiperten = $this->fclhiperten, fclhipotiro = $this->fclhipotiro, fclaltercora = $this->fclaltercora, fclgastrit = $this->fclgastrit, fclenfsangre = $this->fclenfsangre, fcldiabet = $this->fcldiabet, fclhepatit = $this->fclhepatit, fclcancer = $this->fclcancer, fclvih = $this->fclvih, fclartrit = $this->fclartrit, fclinsufren = $this->fclinsufren, fclotrasenf = $this->fclotrasenf, fclotrasenfdesc = '$this->fclotrasenfdesc', fclobserv = '$this->fclobserv', fclfacigual = $this->fclfacigual, fclfacnombre = '$this->fclfacnombre', fclfacruc = '$this->fclfacruc', fclfacdir = '$this->fclfacdir', fclfactelf = '$this->fclfactelf', fclfacmail = '$this->fclfacmail', fclactivo = $this->fclactivo"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "fclnombres = '$this->fclnombres', fclapellidos = '$this->fclapellidos', fclfechanac = " . $this->Ini->date_delim . $this->fclfechanac . $this->Ini->date_delim1 . ", fclsexo = '$this->fclsexo', fclcedula = '$this->fclcedula', fclestciv = '$this->fclestciv', fcldireccion = '$this->fcldireccion', fclciudad = '$this->fclciudad', fcltelefono = '$this->fcltelefono', fclcelular = '$this->fclcelular', fclemail = '$this->fclemail', fclprofesion = '$this->fclprofesion', fcllugartrab = '$this->fcllugartrab', fclreferpub = $this->fclreferpub, fclreferface = $this->fclreferface, fclreferweb = $this->fclreferweb, fclreferremit = $this->fclreferremit, fclreferremitnom = '$this->fclreferremitnom', fclmotivprimcons = '$this->fclmotivprimcons', fclproblemactual = '$this->fclproblemactual', fclbajotratmed = $this->fclbajotratmed, fclalerganest = $this->fclalerganest, fclprophemor = $this->fclprophemor, fclintervquir = $this->fclintervquir, fclmediesp = $this->fclmediesp, fclhiperten = $this->fclhiperten, fclhipotiro = $this->fclhipotiro, fclaltercora = $this->fclaltercora, fclgastrit = $this->fclgastrit, fclenfsangre = $this->fclenfsangre, fcldiabet = $this->fcldiabet, fclhepatit = $this->fclhepatit, fclcancer = $this->fclcancer, fclvih = $this->fclvih, fclartrit = $this->fclartrit, fclinsufren = $this->fclinsufren, fclotrasenf = $this->fclotrasenf, fclotrasenfdesc = '$this->fclotrasenfdesc', fclobserv = '$this->fclobserv', fclfacigual = $this->fclfacigual, fclfacnombre = '$this->fclfacnombre', fclfacruc = '$this->fclfacruc', fclfacdir = '$this->fclfacdir', fclfactelf = '$this->fclfactelf', fclfacmail = '$this->fclfacmail', fclactivo = $this->fclactivo"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "fclnombres = '$this->fclnombres', fclapellidos = '$this->fclapellidos', fclfechanac = " . $this->Ini->date_delim . $this->fclfechanac . $this->Ini->date_delim1 . ", fclsexo = '$this->fclsexo', fclcedula = '$this->fclcedula', fclestciv = '$this->fclestciv', fcldireccion = '$this->fcldireccion', fclciudad = '$this->fclciudad', fcltelefono = '$this->fcltelefono', fclcelular = '$this->fclcelular', fclemail = '$this->fclemail', fclprofesion = '$this->fclprofesion', fcllugartrab = '$this->fcllugartrab', fclreferpub = $this->fclreferpub, fclreferface = $this->fclreferface, fclreferweb = $this->fclreferweb, fclreferremit = $this->fclreferremit, fclreferremitnom = '$this->fclreferremitnom', fclmotivprimcons = '$this->fclmotivprimcons', fclproblemactual = '$this->fclproblemactual', fclbajotratmed = $this->fclbajotratmed, fclalerganest = $this->fclalerganest, fclprophemor = $this->fclprophemor, fclintervquir = $this->fclintervquir, fclmediesp = $this->fclmediesp, fclhiperten = $this->fclhiperten, fclhipotiro = $this->fclhipotiro, fclaltercora = $this->fclaltercora, fclgastrit = $this->fclgastrit, fclenfsangre = $this->fclenfsangre, fcldiabet = $this->fcldiabet, fclhepatit = $this->fclhepatit, fclcancer = $this->fclcancer, fclvih = $this->fclvih, fclartrit = $this->fclartrit, fclinsufren = $this->fclinsufren, fclotrasenf = $this->fclotrasenf, fclotrasenfdesc = '$this->fclotrasenfdesc', fclobserv = '$this->fclobserv', fclfacigual = $this->fclfacigual, fclfacnombre = '$this->fclfacnombre', fclfacruc = '$this->fclfacruc', fclfacdir = '$this->fclfacdir', fclfactelf = '$this->fclfactelf', fclfacmail = '$this->fclfacmail', fclactivo = $this->fclactivo"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "fclnombres = '$this->fclnombres', fclapellidos = '$this->fclapellidos', fclfechanac = EXTEND('$this->fclfechanac', YEAR TO DAY), fclsexo = '$this->fclsexo', fclcedula = '$this->fclcedula', fclestciv = '$this->fclestciv', fcldireccion = '$this->fcldireccion', fclciudad = '$this->fclciudad', fcltelefono = '$this->fcltelefono', fclcelular = '$this->fclcelular', fclemail = '$this->fclemail', fclprofesion = '$this->fclprofesion', fcllugartrab = '$this->fcllugartrab', fclreferpub = $this->fclreferpub, fclreferface = $this->fclreferface, fclreferweb = $this->fclreferweb, fclreferremit = $this->fclreferremit, fclreferremitnom = '$this->fclreferremitnom', fclmotivprimcons = '$this->fclmotivprimcons', fclproblemactual = '$this->fclproblemactual', fclbajotratmed = $this->fclbajotratmed, fclalerganest = $this->fclalerganest, fclprophemor = $this->fclprophemor, fclintervquir = $this->fclintervquir, fclmediesp = $this->fclmediesp, fclhiperten = $this->fclhiperten, fclhipotiro = $this->fclhipotiro, fclaltercora = $this->fclaltercora, fclgastrit = $this->fclgastrit, fclenfsangre = $this->fclenfsangre, fcldiabet = $this->fcldiabet, fclhepatit = $this->fclhepatit, fclcancer = $this->fclcancer, fclvih = $this->fclvih, fclartrit = $this->fclartrit, fclinsufren = $this->fclinsufren, fclotrasenf = $this->fclotrasenf, fclotrasenfdesc = '$this->fclotrasenfdesc', fclobserv = '$this->fclobserv', fclfacigual = $this->fclfacigual, fclfacnombre = '$this->fclfacnombre', fclfacruc = '$this->fclfacruc', fclfacdir = '$this->fclfacdir', fclfactelf = '$this->fclfactelf', fclfacmail = '$this->fclfacmail', fclactivo = $this->fclactivo"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "fclnombres = '$this->fclnombres', fclapellidos = '$this->fclapellidos', fclfechanac = " . $this->Ini->date_delim . $this->fclfechanac . $this->Ini->date_delim1 . ", fclsexo = '$this->fclsexo', fclcedula = '$this->fclcedula', fclestciv = '$this->fclestciv', fcldireccion = '$this->fcldireccion', fclciudad = '$this->fclciudad', fcltelefono = '$this->fcltelefono', fclcelular = '$this->fclcelular', fclemail = '$this->fclemail', fclprofesion = '$this->fclprofesion', fcllugartrab = '$this->fcllugartrab', fclreferpub = $this->fclreferpub, fclreferface = $this->fclreferface, fclreferweb = $this->fclreferweb, fclreferremit = $this->fclreferremit, fclreferremitnom = '$this->fclreferremitnom', fclmotivprimcons = '$this->fclmotivprimcons', fclproblemactual = '$this->fclproblemactual', fclbajotratmed = $this->fclbajotratmed, fclalerganest = $this->fclalerganest, fclprophemor = $this->fclprophemor, fclintervquir = $this->fclintervquir, fclmediesp = $this->fclmediesp, fclhiperten = $this->fclhiperten, fclhipotiro = $this->fclhipotiro, fclaltercora = $this->fclaltercora, fclgastrit = $this->fclgastrit, fclenfsangre = $this->fclenfsangre, fcldiabet = $this->fcldiabet, fclhepatit = $this->fclhepatit, fclcancer = $this->fclcancer, fclvih = $this->fclvih, fclartrit = $this->fclartrit, fclinsufren = $this->fclinsufren, fclotrasenf = $this->fclotrasenf, fclotrasenfdesc = '$this->fclotrasenfdesc', fclobserv = '$this->fclobserv', fclfacigual = $this->fclfacigual, fclfacnombre = '$this->fclfacnombre', fclfacruc = '$this->fclfacruc', fclfacdir = '$this->fclfacdir', fclfactelf = '$this->fclfactelf', fclfacmail = '$this->fclfacmail', fclactivo = $this->fclactivo"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "fclnombres = '$this->fclnombres', fclapellidos = '$this->fclapellidos', fclfechanac = " . $this->Ini->date_delim . $this->fclfechanac . $this->Ini->date_delim1 . ", fclsexo = '$this->fclsexo', fclcedula = '$this->fclcedula', fclestciv = '$this->fclestciv', fcldireccion = '$this->fcldireccion', fclciudad = '$this->fclciudad', fcltelefono = '$this->fcltelefono', fclcelular = '$this->fclcelular', fclemail = '$this->fclemail', fclprofesion = '$this->fclprofesion', fcllugartrab = '$this->fcllugartrab', fclreferpub = $this->fclreferpub, fclreferface = $this->fclreferface, fclreferweb = $this->fclreferweb, fclreferremit = $this->fclreferremit, fclreferremitnom = '$this->fclreferremitnom', fclmotivprimcons = '$this->fclmotivprimcons', fclproblemactual = '$this->fclproblemactual', fclbajotratmed = $this->fclbajotratmed, fclalerganest = $this->fclalerganest, fclprophemor = $this->fclprophemor, fclintervquir = $this->fclintervquir, fclmediesp = $this->fclmediesp, fclhiperten = $this->fclhiperten, fclhipotiro = $this->fclhipotiro, fclaltercora = $this->fclaltercora, fclgastrit = $this->fclgastrit, fclenfsangre = $this->fclenfsangre, fcldiabet = $this->fcldiabet, fclhepatit = $this->fclhepatit, fclcancer = $this->fclcancer, fclvih = $this->fclvih, fclartrit = $this->fclartrit, fclinsufren = $this->fclinsufren, fclotrasenf = $this->fclotrasenf, fclotrasenfdesc = '$this->fclotrasenfdesc', fclobserv = '$this->fclobserv', fclfacigual = $this->fclfacigual, fclfacnombre = '$this->fclfacnombre', fclfacruc = '$this->fclfacruc', fclfacdir = '$this->fclfacdir', fclfactelf = '$this->fclfactelf', fclfacmail = '$this->fclfacmail', fclactivo = $this->fclactivo"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "fclnombres = '$this->fclnombres', fclapellidos = '$this->fclapellidos', fclfechanac = " . $this->Ini->date_delim . $this->fclfechanac . $this->Ini->date_delim1 . ", fclsexo = '$this->fclsexo', fclcedula = '$this->fclcedula', fclestciv = '$this->fclestciv', fcldireccion = '$this->fcldireccion', fclciudad = '$this->fclciudad', fcltelefono = '$this->fcltelefono', fclcelular = '$this->fclcelular', fclemail = '$this->fclemail', fclprofesion = '$this->fclprofesion', fcllugartrab = '$this->fcllugartrab', fclreferpub = $this->fclreferpub, fclreferface = $this->fclreferface, fclreferweb = $this->fclreferweb, fclreferremit = $this->fclreferremit, fclreferremitnom = '$this->fclreferremitnom', fclmotivprimcons = '$this->fclmotivprimcons', fclproblemactual = '$this->fclproblemactual', fclbajotratmed = $this->fclbajotratmed, fclalerganest = $this->fclalerganest, fclprophemor = $this->fclprophemor, fclintervquir = $this->fclintervquir, fclmediesp = $this->fclmediesp, fclhiperten = $this->fclhiperten, fclhipotiro = $this->fclhipotiro, fclaltercora = $this->fclaltercora, fclgastrit = $this->fclgastrit, fclenfsangre = $this->fclenfsangre, fcldiabet = $this->fcldiabet, fclhepatit = $this->fclhepatit, fclcancer = $this->fclcancer, fclvih = $this->fclvih, fclartrit = $this->fclartrit, fclinsufren = $this->fclinsufren, fclotrasenf = $this->fclotrasenf, fclotrasenfdesc = '$this->fclotrasenfdesc', fclobserv = '$this->fclobserv', fclfacigual = $this->fclfacigual, fclfacnombre = '$this->fclfacnombre', fclfacruc = '$this->fclfacruc', fclfacdir = '$this->fclfacdir', fclfactelf = '$this->fclfactelf', fclfacmail = '$this->fclfacmail', fclactivo = $this->fclactivo"; 
              } 
              if (isset($NM_val_form['fclfechareg']) && $NM_val_form['fclfechareg'] != $this->nmgp_dados_select['fclfechareg']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "fclfechareg = #$this->fclfechareg#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "fclfechareg = EXTEND('" . $this->fclfechareg . "', YEAR TO DAY)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "fclfechareg = " . $this->Ini->date_delim . $this->fclfechareg . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['fclusucrea']) && $NM_val_form['fclusucrea'] != $this->nmgp_dados_select['fclusucrea']) 
              { 
                  $SC_fields_update[] = "fclusucrea = '$this->fclusucrea'"; 
              } 
              if (isset($NM_val_form['fclusumodi']) && $NM_val_form['fclusumodi'] != $this->nmgp_dados_select['fclusumodi']) 
              { 
                  $SC_fields_update[] = "fclusumodi = '$this->fclusumodi'"; 
              } 
              if (isset($NM_val_form['fclfeccrea']) && $NM_val_form['fclfeccrea'] != $this->nmgp_dados_select['fclfeccrea']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "fclfeccrea = #$this->fclfeccrea#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "fclfeccrea = EXTEND('" . $this->fclfeccrea . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "fclfeccrea = " . $this->Ini->date_delim . $this->fclfeccrea . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['fclfecmodi']) && $NM_val_form['fclfecmodi'] != $this->nmgp_dados_select['fclfecmodi']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "fclfecmodi = #$this->fclfecmodi#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "fclfecmodi = EXTEND('" . $this->fclfecmodi . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "fclfecmodi = " . $this->Ini->date_delim . $this->fclfecmodi . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE fclnumero = $this->fclnumero ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE fclnumero = $this->fclnumero ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE fclnumero = $this->fclnumero ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE fclnumero = $this->fclnumero ";  
              }  
              else  
              {
                  $comando .= " WHERE fclnumero = $this->fclnumero ";  
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
                                  form_ficha_cliente_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->fclnombres = $this->fclnombres_before_qstr;
              $this->fclapellidos = $this->fclapellidos_before_qstr;
              $this->fclsexo = $this->fclsexo_before_qstr;
              $this->fclcedula = $this->fclcedula_before_qstr;
              $this->fclestciv = $this->fclestciv_before_qstr;
              $this->fcldireccion = $this->fcldireccion_before_qstr;
              $this->fclciudad = $this->fclciudad_before_qstr;
              $this->fcltelefono = $this->fcltelefono_before_qstr;
              $this->fclcelular = $this->fclcelular_before_qstr;
              $this->fclemail = $this->fclemail_before_qstr;
              $this->fclprofesion = $this->fclprofesion_before_qstr;
              $this->fcllugartrab = $this->fcllugartrab_before_qstr;
              $this->fclreferremitnom = $this->fclreferremitnom_before_qstr;
              $this->fclmotivprimcons = $this->fclmotivprimcons_before_qstr;
              $this->fclproblemactual = $this->fclproblemactual_before_qstr;
              $this->fclotrasenfdesc = $this->fclotrasenfdesc_before_qstr;
              $this->fclobserv = $this->fclobserv_before_qstr;
              $this->fclusucrea = $this->fclusucrea_before_qstr;
              $this->fclusumodi = $this->fclusumodi_before_qstr;
              $this->fclfacnombre = $this->fclfacnombre_before_qstr;
              $this->fclfacruc = $this->fclfacruc_before_qstr;
              $this->fclfacdir = $this->fclfacdir_before_qstr;
              $this->fclfactelf = $this->fclfactelf_before_qstr;
              $this->fclfacmail = $this->fclfacmail_before_qstr;
              $this->cobros = $this->cobros_before_qstr;
              $this->historias = $this->historias_before_qstr;
              $this->presupuestos = $this->presupuestos_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['fclnumero'])) { $this->fclnumero = $NM_val_form['fclnumero']; }
              elseif (isset($this->fclnumero)) { $this->nm_limpa_alfa($this->fclnumero); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclnombres'])) { $this->fclnombres = $NM_val_form['fclnombres']; }
              elseif (isset($this->fclnombres)) { $this->nm_limpa_alfa($this->fclnombres); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclapellidos'])) { $this->fclapellidos = $NM_val_form['fclapellidos']; }
              elseif (isset($this->fclapellidos)) { $this->nm_limpa_alfa($this->fclapellidos); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclsexo'])) { $this->fclsexo = $NM_val_form['fclsexo']; }
              elseif (isset($this->fclsexo)) { $this->nm_limpa_alfa($this->fclsexo); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclcedula'])) { $this->fclcedula = $NM_val_form['fclcedula']; }
              elseif (isset($this->fclcedula)) { $this->nm_limpa_alfa($this->fclcedula); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclestciv'])) { $this->fclestciv = $NM_val_form['fclestciv']; }
              elseif (isset($this->fclestciv)) { $this->nm_limpa_alfa($this->fclestciv); }
              if     (isset($NM_val_form) && isset($NM_val_form['fcldireccion'])) { $this->fcldireccion = $NM_val_form['fcldireccion']; }
              elseif (isset($this->fcldireccion)) { $this->nm_limpa_alfa($this->fcldireccion); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclciudad'])) { $this->fclciudad = $NM_val_form['fclciudad']; }
              elseif (isset($this->fclciudad)) { $this->nm_limpa_alfa($this->fclciudad); }
              if     (isset($NM_val_form) && isset($NM_val_form['fcltelefono'])) { $this->fcltelefono = $NM_val_form['fcltelefono']; }
              elseif (isset($this->fcltelefono)) { $this->nm_limpa_alfa($this->fcltelefono); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclcelular'])) { $this->fclcelular = $NM_val_form['fclcelular']; }
              elseif (isset($this->fclcelular)) { $this->nm_limpa_alfa($this->fclcelular); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclemail'])) { $this->fclemail = $NM_val_form['fclemail']; }
              elseif (isset($this->fclemail)) { $this->nm_limpa_alfa($this->fclemail); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclprofesion'])) { $this->fclprofesion = $NM_val_form['fclprofesion']; }
              elseif (isset($this->fclprofesion)) { $this->nm_limpa_alfa($this->fclprofesion); }
              if     (isset($NM_val_form) && isset($NM_val_form['fcllugartrab'])) { $this->fcllugartrab = $NM_val_form['fcllugartrab']; }
              elseif (isset($this->fcllugartrab)) { $this->nm_limpa_alfa($this->fcllugartrab); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclreferpub'])) { $this->fclreferpub = $NM_val_form['fclreferpub']; }
              elseif (isset($this->fclreferpub)) { $this->nm_limpa_alfa($this->fclreferpub); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclreferface'])) { $this->fclreferface = $NM_val_form['fclreferface']; }
              elseif (isset($this->fclreferface)) { $this->nm_limpa_alfa($this->fclreferface); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclreferweb'])) { $this->fclreferweb = $NM_val_form['fclreferweb']; }
              elseif (isset($this->fclreferweb)) { $this->nm_limpa_alfa($this->fclreferweb); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclreferremit'])) { $this->fclreferremit = $NM_val_form['fclreferremit']; }
              elseif (isset($this->fclreferremit)) { $this->nm_limpa_alfa($this->fclreferremit); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclreferremitnom'])) { $this->fclreferremitnom = $NM_val_form['fclreferremitnom']; }
              elseif (isset($this->fclreferremitnom)) { $this->nm_limpa_alfa($this->fclreferremitnom); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclmotivprimcons'])) { $this->fclmotivprimcons = $NM_val_form['fclmotivprimcons']; }
              elseif (isset($this->fclmotivprimcons)) { $this->nm_limpa_alfa($this->fclmotivprimcons); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclproblemactual'])) { $this->fclproblemactual = $NM_val_form['fclproblemactual']; }
              elseif (isset($this->fclproblemactual)) { $this->nm_limpa_alfa($this->fclproblemactual); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclbajotratmed'])) { $this->fclbajotratmed = $NM_val_form['fclbajotratmed']; }
              elseif (isset($this->fclbajotratmed)) { $this->nm_limpa_alfa($this->fclbajotratmed); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclalerganest'])) { $this->fclalerganest = $NM_val_form['fclalerganest']; }
              elseif (isset($this->fclalerganest)) { $this->nm_limpa_alfa($this->fclalerganest); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclprophemor'])) { $this->fclprophemor = $NM_val_form['fclprophemor']; }
              elseif (isset($this->fclprophemor)) { $this->nm_limpa_alfa($this->fclprophemor); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclintervquir'])) { $this->fclintervquir = $NM_val_form['fclintervquir']; }
              elseif (isset($this->fclintervquir)) { $this->nm_limpa_alfa($this->fclintervquir); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclmediesp'])) { $this->fclmediesp = $NM_val_form['fclmediesp']; }
              elseif (isset($this->fclmediesp)) { $this->nm_limpa_alfa($this->fclmediesp); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclhiperten'])) { $this->fclhiperten = $NM_val_form['fclhiperten']; }
              elseif (isset($this->fclhiperten)) { $this->nm_limpa_alfa($this->fclhiperten); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclhipotiro'])) { $this->fclhipotiro = $NM_val_form['fclhipotiro']; }
              elseif (isset($this->fclhipotiro)) { $this->nm_limpa_alfa($this->fclhipotiro); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclaltercora'])) { $this->fclaltercora = $NM_val_form['fclaltercora']; }
              elseif (isset($this->fclaltercora)) { $this->nm_limpa_alfa($this->fclaltercora); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclgastrit'])) { $this->fclgastrit = $NM_val_form['fclgastrit']; }
              elseif (isset($this->fclgastrit)) { $this->nm_limpa_alfa($this->fclgastrit); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclenfsangre'])) { $this->fclenfsangre = $NM_val_form['fclenfsangre']; }
              elseif (isset($this->fclenfsangre)) { $this->nm_limpa_alfa($this->fclenfsangre); }
              if     (isset($NM_val_form) && isset($NM_val_form['fcldiabet'])) { $this->fcldiabet = $NM_val_form['fcldiabet']; }
              elseif (isset($this->fcldiabet)) { $this->nm_limpa_alfa($this->fcldiabet); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclhepatit'])) { $this->fclhepatit = $NM_val_form['fclhepatit']; }
              elseif (isset($this->fclhepatit)) { $this->nm_limpa_alfa($this->fclhepatit); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclcancer'])) { $this->fclcancer = $NM_val_form['fclcancer']; }
              elseif (isset($this->fclcancer)) { $this->nm_limpa_alfa($this->fclcancer); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclvih'])) { $this->fclvih = $NM_val_form['fclvih']; }
              elseif (isset($this->fclvih)) { $this->nm_limpa_alfa($this->fclvih); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclartrit'])) { $this->fclartrit = $NM_val_form['fclartrit']; }
              elseif (isset($this->fclartrit)) { $this->nm_limpa_alfa($this->fclartrit); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclinsufren'])) { $this->fclinsufren = $NM_val_form['fclinsufren']; }
              elseif (isset($this->fclinsufren)) { $this->nm_limpa_alfa($this->fclinsufren); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclotrasenf'])) { $this->fclotrasenf = $NM_val_form['fclotrasenf']; }
              elseif (isset($this->fclotrasenf)) { $this->nm_limpa_alfa($this->fclotrasenf); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclotrasenfdesc'])) { $this->fclotrasenfdesc = $NM_val_form['fclotrasenfdesc']; }
              elseif (isset($this->fclotrasenfdesc)) { $this->nm_limpa_alfa($this->fclotrasenfdesc); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclobserv'])) { $this->fclobserv = $NM_val_form['fclobserv']; }
              elseif (isset($this->fclobserv)) { $this->nm_limpa_alfa($this->fclobserv); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclusucrea'])) { $this->fclusucrea = $NM_val_form['fclusucrea']; }
              elseif (isset($this->fclusucrea)) { $this->nm_limpa_alfa($this->fclusucrea); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclusumodi'])) { $this->fclusumodi = $NM_val_form['fclusumodi']; }
              elseif (isset($this->fclusumodi)) { $this->nm_limpa_alfa($this->fclusumodi); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclfacigual'])) { $this->fclfacigual = $NM_val_form['fclfacigual']; }
              elseif (isset($this->fclfacigual)) { $this->nm_limpa_alfa($this->fclfacigual); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclfacnombre'])) { $this->fclfacnombre = $NM_val_form['fclfacnombre']; }
              elseif (isset($this->fclfacnombre)) { $this->nm_limpa_alfa($this->fclfacnombre); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclfacruc'])) { $this->fclfacruc = $NM_val_form['fclfacruc']; }
              elseif (isset($this->fclfacruc)) { $this->nm_limpa_alfa($this->fclfacruc); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclfacdir'])) { $this->fclfacdir = $NM_val_form['fclfacdir']; }
              elseif (isset($this->fclfacdir)) { $this->nm_limpa_alfa($this->fclfacdir); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclfactelf'])) { $this->fclfactelf = $NM_val_form['fclfactelf']; }
              elseif (isset($this->fclfactelf)) { $this->nm_limpa_alfa($this->fclfactelf); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclfacmail'])) { $this->fclfacmail = $NM_val_form['fclfacmail']; }
              elseif (isset($this->fclfacmail)) { $this->nm_limpa_alfa($this->fclfacmail); }
              if     (isset($NM_val_form) && isset($NM_val_form['fclactivo'])) { $this->fclactivo = $NM_val_form['fclactivo']; }
              elseif (isset($this->fclactivo)) { $this->nm_limpa_alfa($this->fclactivo); }
              if     (isset($NM_val_form) && isset($NM_val_form['cobros'])) { $this->cobros = $NM_val_form['cobros']; }
              elseif (isset($this->cobros)) { $this->nm_limpa_alfa($this->cobros); }
              if     (isset($NM_val_form) && isset($NM_val_form['historias'])) { $this->historias = $NM_val_form['historias']; }
              elseif (isset($this->historias)) { $this->nm_limpa_alfa($this->historias); }
              if     (isset($NM_val_form) && isset($NM_val_form['presupuestos'])) { $this->presupuestos = $NM_val_form['presupuestos']; }
              elseif (isset($this->presupuestos)) { $this->nm_limpa_alfa($this->presupuestos); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('fclnumero', 'fclfechareg', 'fclcedula', 'fclactivo', 'fclapellidos', 'fclnombres', 'update_titulo_citas', 'fclfechanac', 'fclsexo', 'fclestciv', 'fcldireccion', 'fclciudad', 'fcltelefono', 'fclcelular', 'fclemail', 'fclprofesion', 'fcllugartrab', 'fclfacigual', 'fclfacruc', 'fclfacnombre', 'fclfacdir', 'fclfactelf', 'fclfacmail', 'fclreferpub', 'fclreferface', 'fclreferweb', 'fclreferremit', 'fclreferremitnom', 'fclmotivprimcons', 'fclproblemactual', 'fclbajotratmed', 'fclalerganest', 'fclprophemor', 'fclintervquir', 'fclmediesp', 'fclhiperten', 'fclhipotiro', 'fclaltercora', 'fclgastrit', 'fclenfsangre', 'fcldiabet', 'fclhepatit', 'fclcancer', 'fclvih', 'fclartrit', 'fclinsufren', 'fclotrasenf', 'fclotrasenfdesc', 'fclobserv', 'fclusucrea', 'fclfeccrea', 'fclusumodi', 'fclfecmodi', 'historias', 'presupuestos', 'cobros'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
              $this->fclfeccrea =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->fclfeccrea_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
          $bInsertOk = true;
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "); 
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
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_ficha_cliente_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (fclnumero, fclnombres, fclapellidos, fclfechareg, fclfechanac, fclsexo, fclcedula, fclestciv, fcldireccion, fclciudad, fcltelefono, fclcelular, fclemail, fclprofesion, fcllugartrab, fclreferpub, fclreferface, fclreferweb, fclreferremit, fclreferremitnom, fclmotivprimcons, fclproblemactual, fclbajotratmed, fclalerganest, fclprophemor, fclintervquir, fclmediesp, fclhiperten, fclhipotiro, fclaltercora, fclgastrit, fclenfsangre, fcldiabet, fclhepatit, fclcancer, fclvih, fclartrit, fclinsufren, fclotrasenf, fclotrasenfdesc, fclobserv, fclusucrea, fclusumodi, fclfeccrea, fclfecmodi, fclfacigual, fclfacnombre, fclfacruc, fclfacdir, fclfactelf, fclfacmail, fclactivo) VALUES ($this->fclnumero, '$this->fclnombres', '$this->fclapellidos', #$this->fclfechareg#, #$this->fclfechanac#, '$this->fclsexo', '$this->fclcedula', '$this->fclestciv', '$this->fcldireccion', '$this->fclciudad', '$this->fcltelefono', '$this->fclcelular', '$this->fclemail', '$this->fclprofesion', '$this->fcllugartrab', $this->fclreferpub, $this->fclreferface, $this->fclreferweb, $this->fclreferremit, '$this->fclreferremitnom', '$this->fclmotivprimcons', '$this->fclproblemactual', $this->fclbajotratmed, $this->fclalerganest, $this->fclprophemor, $this->fclintervquir, $this->fclmediesp, $this->fclhiperten, $this->fclhipotiro, $this->fclaltercora, $this->fclgastrit, $this->fclenfsangre, $this->fcldiabet, $this->fclhepatit, $this->fclcancer, $this->fclvih, $this->fclartrit, $this->fclinsufren, $this->fclotrasenf, '$this->fclotrasenfdesc', '$this->fclobserv', '$this->fclusucrea', '$this->fclusumodi', #$this->fclfeccrea#, #$this->fclfecmodi#, $this->fclfacigual, '$this->fclfacnombre', '$this->fclfacruc', '$this->fclfacdir', '$this->fclfactelf', '$this->fclfacmail', $this->fclactivo)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "fclnumero, fclnombres, fclapellidos, fclfechareg, fclfechanac, fclsexo, fclcedula, fclestciv, fcldireccion, fclciudad, fcltelefono, fclcelular, fclemail, fclprofesion, fcllugartrab, fclreferpub, fclreferface, fclreferweb, fclreferremit, fclreferremitnom, fclmotivprimcons, fclproblemactual, fclbajotratmed, fclalerganest, fclprophemor, fclintervquir, fclmediesp, fclhiperten, fclhipotiro, fclaltercora, fclgastrit, fclenfsangre, fcldiabet, fclhepatit, fclcancer, fclvih, fclartrit, fclinsufren, fclotrasenf, fclotrasenfdesc, fclobserv, fclusucrea, fclusumodi, fclfeccrea, fclfecmodi, fclfacigual, fclfacnombre, fclfacruc, fclfacdir, fclfactelf, fclfacmail, fclactivo) VALUES (" . $NM_seq_auto . "$this->fclnumero, '$this->fclnombres', '$this->fclapellidos', " . $this->Ini->date_delim . $this->fclfechareg . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fclfechanac . $this->Ini->date_delim1 . ", '$this->fclsexo', '$this->fclcedula', '$this->fclestciv', '$this->fcldireccion', '$this->fclciudad', '$this->fcltelefono', '$this->fclcelular', '$this->fclemail', '$this->fclprofesion', '$this->fcllugartrab', $this->fclreferpub, $this->fclreferface, $this->fclreferweb, $this->fclreferremit, '$this->fclreferremitnom', '$this->fclmotivprimcons', '$this->fclproblemactual', $this->fclbajotratmed, $this->fclalerganest, $this->fclprophemor, $this->fclintervquir, $this->fclmediesp, $this->fclhiperten, $this->fclhipotiro, $this->fclaltercora, $this->fclgastrit, $this->fclenfsangre, $this->fcldiabet, $this->fclhepatit, $this->fclcancer, $this->fclvih, $this->fclartrit, $this->fclinsufren, $this->fclotrasenf, '$this->fclotrasenfdesc', '$this->fclobserv', '$this->fclusucrea', '$this->fclusumodi', " . $this->Ini->date_delim . $this->fclfeccrea . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fclfecmodi . $this->Ini->date_delim1 . ", $this->fclfacigual, '$this->fclfacnombre', '$this->fclfacruc', '$this->fclfacdir', '$this->fclfactelf', '$this->fclfacmail', $this->fclactivo)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "fclnumero, fclnombres, fclapellidos, fclfechareg, fclfechanac, fclsexo, fclcedula, fclestciv, fcldireccion, fclciudad, fcltelefono, fclcelular, fclemail, fclprofesion, fcllugartrab, fclreferpub, fclreferface, fclreferweb, fclreferremit, fclreferremitnom, fclmotivprimcons, fclproblemactual, fclbajotratmed, fclalerganest, fclprophemor, fclintervquir, fclmediesp, fclhiperten, fclhipotiro, fclaltercora, fclgastrit, fclenfsangre, fcldiabet, fclhepatit, fclcancer, fclvih, fclartrit, fclinsufren, fclotrasenf, fclotrasenfdesc, fclobserv, fclusucrea, fclusumodi, fclfeccrea, fclfecmodi, fclfacigual, fclfacnombre, fclfacruc, fclfacdir, fclfactelf, fclfacmail, fclactivo) VALUES (" . $NM_seq_auto . "$this->fclnumero, '$this->fclnombres', '$this->fclapellidos', " . $this->Ini->date_delim . $this->fclfechareg . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fclfechanac . $this->Ini->date_delim1 . ", '$this->fclsexo', '$this->fclcedula', '$this->fclestciv', '$this->fcldireccion', '$this->fclciudad', '$this->fcltelefono', '$this->fclcelular', '$this->fclemail', '$this->fclprofesion', '$this->fcllugartrab', $this->fclreferpub, $this->fclreferface, $this->fclreferweb, $this->fclreferremit, '$this->fclreferremitnom', '$this->fclmotivprimcons', '$this->fclproblemactual', $this->fclbajotratmed, $this->fclalerganest, $this->fclprophemor, $this->fclintervquir, $this->fclmediesp, $this->fclhiperten, $this->fclhipotiro, $this->fclaltercora, $this->fclgastrit, $this->fclenfsangre, $this->fcldiabet, $this->fclhepatit, $this->fclcancer, $this->fclvih, $this->fclartrit, $this->fclinsufren, $this->fclotrasenf, '$this->fclotrasenfdesc', '$this->fclobserv', '$this->fclusucrea', '$this->fclusumodi', " . $this->Ini->date_delim . $this->fclfeccrea . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fclfecmodi . $this->Ini->date_delim1 . ", $this->fclfacigual, '$this->fclfacnombre', '$this->fclfacruc', '$this->fclfacdir', '$this->fclfactelf', '$this->fclfacmail', $this->fclactivo)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "fclnumero, fclnombres, fclapellidos, fclfechareg, fclfechanac, fclsexo, fclcedula, fclestciv, fcldireccion, fclciudad, fcltelefono, fclcelular, fclemail, fclprofesion, fcllugartrab, fclreferpub, fclreferface, fclreferweb, fclreferremit, fclreferremitnom, fclmotivprimcons, fclproblemactual, fclbajotratmed, fclalerganest, fclprophemor, fclintervquir, fclmediesp, fclhiperten, fclhipotiro, fclaltercora, fclgastrit, fclenfsangre, fcldiabet, fclhepatit, fclcancer, fclvih, fclartrit, fclinsufren, fclotrasenf, fclotrasenfdesc, fclobserv, fclusucrea, fclusumodi, fclfeccrea, fclfecmodi, fclfacigual, fclfacnombre, fclfacruc, fclfacdir, fclfactelf, fclfacmail, fclactivo) VALUES (" . $NM_seq_auto . "$this->fclnumero, '$this->fclnombres', '$this->fclapellidos', " . $this->Ini->date_delim . $this->fclfechareg . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fclfechanac . $this->Ini->date_delim1 . ", '$this->fclsexo', '$this->fclcedula', '$this->fclestciv', '$this->fcldireccion', '$this->fclciudad', '$this->fcltelefono', '$this->fclcelular', '$this->fclemail', '$this->fclprofesion', '$this->fcllugartrab', $this->fclreferpub, $this->fclreferface, $this->fclreferweb, $this->fclreferremit, '$this->fclreferremitnom', '$this->fclmotivprimcons', '$this->fclproblemactual', $this->fclbajotratmed, $this->fclalerganest, $this->fclprophemor, $this->fclintervquir, $this->fclmediesp, $this->fclhiperten, $this->fclhipotiro, $this->fclaltercora, $this->fclgastrit, $this->fclenfsangre, $this->fcldiabet, $this->fclhepatit, $this->fclcancer, $this->fclvih, $this->fclartrit, $this->fclinsufren, $this->fclotrasenf, '$this->fclotrasenfdesc', '$this->fclobserv', '$this->fclusucrea', '$this->fclusumodi', " . $this->Ini->date_delim . $this->fclfeccrea . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fclfecmodi . $this->Ini->date_delim1 . ", $this->fclfacigual, '$this->fclfacnombre', '$this->fclfacruc', '$this->fclfacdir', '$this->fclfactelf', '$this->fclfacmail', $this->fclactivo)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "fclnumero, fclnombres, fclapellidos, fclfechareg, fclfechanac, fclsexo, fclcedula, fclestciv, fcldireccion, fclciudad, fcltelefono, fclcelular, fclemail, fclprofesion, fcllugartrab, fclreferpub, fclreferface, fclreferweb, fclreferremit, fclreferremitnom, fclmotivprimcons, fclproblemactual, fclbajotratmed, fclalerganest, fclprophemor, fclintervquir, fclmediesp, fclhiperten, fclhipotiro, fclaltercora, fclgastrit, fclenfsangre, fcldiabet, fclhepatit, fclcancer, fclvih, fclartrit, fclinsufren, fclotrasenf, fclotrasenfdesc, fclobserv, fclusucrea, fclusumodi, fclfeccrea, fclfecmodi, fclfacigual, fclfacnombre, fclfacruc, fclfacdir, fclfactelf, fclfacmail, fclactivo) VALUES (" . $NM_seq_auto . "$this->fclnumero, '$this->fclnombres', '$this->fclapellidos', EXTEND('$this->fclfechareg', YEAR TO DAY), EXTEND('$this->fclfechanac', YEAR TO DAY), '$this->fclsexo', '$this->fclcedula', '$this->fclestciv', '$this->fcldireccion', '$this->fclciudad', '$this->fcltelefono', '$this->fclcelular', '$this->fclemail', '$this->fclprofesion', '$this->fcllugartrab', $this->fclreferpub, $this->fclreferface, $this->fclreferweb, $this->fclreferremit, '$this->fclreferremitnom', '$this->fclmotivprimcons', '$this->fclproblemactual', $this->fclbajotratmed, $this->fclalerganest, $this->fclprophemor, $this->fclintervquir, $this->fclmediesp, $this->fclhiperten, $this->fclhipotiro, $this->fclaltercora, $this->fclgastrit, $this->fclenfsangre, $this->fcldiabet, $this->fclhepatit, $this->fclcancer, $this->fclvih, $this->fclartrit, $this->fclinsufren, $this->fclotrasenf, '$this->fclotrasenfdesc', '$this->fclobserv', '$this->fclusucrea', '$this->fclusumodi', EXTEND('$this->fclfeccrea', YEAR TO FRACTION), EXTEND('$this->fclfecmodi', YEAR TO FRACTION), $this->fclfacigual, '$this->fclfacnombre', '$this->fclfacruc', '$this->fclfacdir', '$this->fclfactelf', '$this->fclfacmail', $this->fclactivo)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "fclnumero, fclnombres, fclapellidos, fclfechareg, fclfechanac, fclsexo, fclcedula, fclestciv, fcldireccion, fclciudad, fcltelefono, fclcelular, fclemail, fclprofesion, fcllugartrab, fclreferpub, fclreferface, fclreferweb, fclreferremit, fclreferremitnom, fclmotivprimcons, fclproblemactual, fclbajotratmed, fclalerganest, fclprophemor, fclintervquir, fclmediesp, fclhiperten, fclhipotiro, fclaltercora, fclgastrit, fclenfsangre, fcldiabet, fclhepatit, fclcancer, fclvih, fclartrit, fclinsufren, fclotrasenf, fclotrasenfdesc, fclobserv, fclusucrea, fclusumodi, fclfeccrea, fclfecmodi, fclfacigual, fclfacnombre, fclfacruc, fclfacdir, fclfactelf, fclfacmail, fclactivo) VALUES (" . $NM_seq_auto . "$this->fclnumero, '$this->fclnombres', '$this->fclapellidos', " . $this->Ini->date_delim . $this->fclfechareg . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fclfechanac . $this->Ini->date_delim1 . ", '$this->fclsexo', '$this->fclcedula', '$this->fclestciv', '$this->fcldireccion', '$this->fclciudad', '$this->fcltelefono', '$this->fclcelular', '$this->fclemail', '$this->fclprofesion', '$this->fcllugartrab', $this->fclreferpub, $this->fclreferface, $this->fclreferweb, $this->fclreferremit, '$this->fclreferremitnom', '$this->fclmotivprimcons', '$this->fclproblemactual', $this->fclbajotratmed, $this->fclalerganest, $this->fclprophemor, $this->fclintervquir, $this->fclmediesp, $this->fclhiperten, $this->fclhipotiro, $this->fclaltercora, $this->fclgastrit, $this->fclenfsangre, $this->fcldiabet, $this->fclhepatit, $this->fclcancer, $this->fclvih, $this->fclartrit, $this->fclinsufren, $this->fclotrasenf, '$this->fclotrasenfdesc', '$this->fclobserv', '$this->fclusucrea', '$this->fclusumodi', " . $this->Ini->date_delim . $this->fclfeccrea . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fclfecmodi . $this->Ini->date_delim1 . ", $this->fclfacigual, '$this->fclfacnombre', '$this->fclfacruc', '$this->fclfacdir', '$this->fclfactelf', '$this->fclfacmail', $this->fclactivo)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "fclnumero, fclnombres, fclapellidos, fclfechareg, fclfechanac, fclsexo, fclcedula, fclestciv, fcldireccion, fclciudad, fcltelefono, fclcelular, fclemail, fclprofesion, fcllugartrab, fclreferpub, fclreferface, fclreferweb, fclreferremit, fclreferremitnom, fclmotivprimcons, fclproblemactual, fclbajotratmed, fclalerganest, fclprophemor, fclintervquir, fclmediesp, fclhiperten, fclhipotiro, fclaltercora, fclgastrit, fclenfsangre, fcldiabet, fclhepatit, fclcancer, fclvih, fclartrit, fclinsufren, fclotrasenf, fclotrasenfdesc, fclobserv, fclusucrea, fclusumodi, fclfeccrea, fclfecmodi, fclfacigual, fclfacnombre, fclfacruc, fclfacdir, fclfactelf, fclfacmail, fclactivo) VALUES (" . $NM_seq_auto . "$this->fclnumero, '$this->fclnombres', '$this->fclapellidos', " . $this->Ini->date_delim . $this->fclfechareg . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fclfechanac . $this->Ini->date_delim1 . ", '$this->fclsexo', '$this->fclcedula', '$this->fclestciv', '$this->fcldireccion', '$this->fclciudad', '$this->fcltelefono', '$this->fclcelular', '$this->fclemail', '$this->fclprofesion', '$this->fcllugartrab', $this->fclreferpub, $this->fclreferface, $this->fclreferweb, $this->fclreferremit, '$this->fclreferremitnom', '$this->fclmotivprimcons', '$this->fclproblemactual', $this->fclbajotratmed, $this->fclalerganest, $this->fclprophemor, $this->fclintervquir, $this->fclmediesp, $this->fclhiperten, $this->fclhipotiro, $this->fclaltercora, $this->fclgastrit, $this->fclenfsangre, $this->fcldiabet, $this->fclhepatit, $this->fclcancer, $this->fclvih, $this->fclartrit, $this->fclinsufren, $this->fclotrasenf, '$this->fclotrasenfdesc', '$this->fclobserv', '$this->fclusucrea', '$this->fclusumodi', " . $this->Ini->date_delim . $this->fclfeccrea . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fclfecmodi . $this->Ini->date_delim1 . ", $this->fclfacigual, '$this->fclfacnombre', '$this->fclfacruc', '$this->fclfacdir', '$this->fclfactelf', '$this->fclfacmail', $this->fclactivo)"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "fclnumero, fclnombres, fclapellidos, fclfechareg, fclfechanac, fclsexo, fclcedula, fclestciv, fcldireccion, fclciudad, fcltelefono, fclcelular, fclemail, fclprofesion, fcllugartrab, fclreferpub, fclreferface, fclreferweb, fclreferremit, fclreferremitnom, fclmotivprimcons, fclproblemactual, fclbajotratmed, fclalerganest, fclprophemor, fclintervquir, fclmediesp, fclhiperten, fclhipotiro, fclaltercora, fclgastrit, fclenfsangre, fcldiabet, fclhepatit, fclcancer, fclvih, fclartrit, fclinsufren, fclotrasenf, fclotrasenfdesc, fclobserv, fclusucrea, fclusumodi, fclfeccrea, fclfecmodi, fclfacigual, fclfacnombre, fclfacruc, fclfacdir, fclfactelf, fclfacmail, fclactivo) VALUES (" . $NM_seq_auto . "$this->fclnumero, '$this->fclnombres', '$this->fclapellidos', " . $this->Ini->date_delim . $this->fclfechareg . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fclfechanac . $this->Ini->date_delim1 . ", '$this->fclsexo', '$this->fclcedula', '$this->fclestciv', '$this->fcldireccion', '$this->fclciudad', '$this->fcltelefono', '$this->fclcelular', '$this->fclemail', '$this->fclprofesion', '$this->fcllugartrab', $this->fclreferpub, $this->fclreferface, $this->fclreferweb, $this->fclreferremit, '$this->fclreferremitnom', '$this->fclmotivprimcons', '$this->fclproblemactual', $this->fclbajotratmed, $this->fclalerganest, $this->fclprophemor, $this->fclintervquir, $this->fclmediesp, $this->fclhiperten, $this->fclhipotiro, $this->fclaltercora, $this->fclgastrit, $this->fclenfsangre, $this->fcldiabet, $this->fclhepatit, $this->fclcancer, $this->fclvih, $this->fclartrit, $this->fclinsufren, $this->fclotrasenf, '$this->fclotrasenfdesc', '$this->fclobserv', '$this->fclusucrea', '$this->fclusumodi', " . $this->Ini->date_delim . $this->fclfeccrea . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fclfecmodi . $this->Ini->date_delim1 . ", $this->fclfacigual, '$this->fclfacnombre', '$this->fclfacruc', '$this->fclfacdir', '$this->fclfactelf', '$this->fclfacmail', $this->fclactivo)"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "fclnumero, fclnombres, fclapellidos, fclfechareg, fclfechanac, fclsexo, fclcedula, fclestciv, fcldireccion, fclciudad, fcltelefono, fclcelular, fclemail, fclprofesion, fcllugartrab, fclreferpub, fclreferface, fclreferweb, fclreferremit, fclreferremitnom, fclmotivprimcons, fclproblemactual, fclbajotratmed, fclalerganest, fclprophemor, fclintervquir, fclmediesp, fclhiperten, fclhipotiro, fclaltercora, fclgastrit, fclenfsangre, fcldiabet, fclhepatit, fclcancer, fclvih, fclartrit, fclinsufren, fclotrasenf, fclotrasenfdesc, fclobserv, fclusucrea, fclusumodi, fclfeccrea, fclfecmodi, fclfacigual, fclfacnombre, fclfacruc, fclfacdir, fclfactelf, fclfacmail, fclactivo) VALUES (" . $NM_seq_auto . "$this->fclnumero, '$this->fclnombres', '$this->fclapellidos', " . $this->Ini->date_delim . $this->fclfechareg . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fclfechanac . $this->Ini->date_delim1 . ", '$this->fclsexo', '$this->fclcedula', '$this->fclestciv', '$this->fcldireccion', '$this->fclciudad', '$this->fcltelefono', '$this->fclcelular', '$this->fclemail', '$this->fclprofesion', '$this->fcllugartrab', $this->fclreferpub, $this->fclreferface, $this->fclreferweb, $this->fclreferremit, '$this->fclreferremitnom', '$this->fclmotivprimcons', '$this->fclproblemactual', $this->fclbajotratmed, $this->fclalerganest, $this->fclprophemor, $this->fclintervquir, $this->fclmediesp, $this->fclhiperten, $this->fclhipotiro, $this->fclaltercora, $this->fclgastrit, $this->fclenfsangre, $this->fcldiabet, $this->fclhepatit, $this->fclcancer, $this->fclvih, $this->fclartrit, $this->fclinsufren, $this->fclotrasenf, '$this->fclotrasenfdesc', '$this->fclobserv', '$this->fclusucrea', '$this->fclusumodi', " . $this->Ini->date_delim . $this->fclfeccrea . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fclfecmodi . $this->Ini->date_delim1 . ", $this->fclfacigual, '$this->fclfacnombre', '$this->fclfacruc', '$this->fclfacdir', '$this->fclfactelf', '$this->fclfacmail', $this->fclactivo)"; 
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
                              form_ficha_cliente_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->fclnombres = $this->fclnombres_before_qstr;
              $this->fclapellidos = $this->fclapellidos_before_qstr;
              $this->fclsexo = $this->fclsexo_before_qstr;
              $this->fclcedula = $this->fclcedula_before_qstr;
              $this->fclestciv = $this->fclestciv_before_qstr;
              $this->fcldireccion = $this->fcldireccion_before_qstr;
              $this->fclciudad = $this->fclciudad_before_qstr;
              $this->fcltelefono = $this->fcltelefono_before_qstr;
              $this->fclcelular = $this->fclcelular_before_qstr;
              $this->fclemail = $this->fclemail_before_qstr;
              $this->fclprofesion = $this->fclprofesion_before_qstr;
              $this->fcllugartrab = $this->fcllugartrab_before_qstr;
              $this->fclreferremitnom = $this->fclreferremitnom_before_qstr;
              $this->fclmotivprimcons = $this->fclmotivprimcons_before_qstr;
              $this->fclproblemactual = $this->fclproblemactual_before_qstr;
              $this->fclotrasenfdesc = $this->fclotrasenfdesc_before_qstr;
              $this->fclobserv = $this->fclobserv_before_qstr;
              $this->fclusucrea = $this->fclusucrea_before_qstr;
              $this->fclusumodi = $this->fclusumodi_before_qstr;
              $this->fclfacnombre = $this->fclfacnombre_before_qstr;
              $this->fclfacruc = $this->fclfacruc_before_qstr;
              $this->fclfacdir = $this->fclfacdir_before_qstr;
              $this->fclfactelf = $this->fclfactelf_before_qstr;
              $this->fclfacmail = $this->fclfacmail_before_qstr;
              $this->cobros = $this->cobros_before_qstr;
              $this->historias = $this->historias_before_qstr;
              $this->presupuestos = $this->presupuestos_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              $this->nmgp_botoes['volver'] = "on";
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
          $this->fclnumero = substr($this->Db->qstr($this->fclnumero), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where fclnumero = $this->fclnumero "); 
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
                          form_ficha_cliente_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['total']);
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
    if ("insert" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['scriptcase']['form_ficha_cliente']['contr_erro'] = 'on';
  if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}


 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_ficha_cliente') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
$_SESSION['scriptcase']['form_ficha_cliente']['contr_erro'] = 'off'; 
    }
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['scriptcase']['form_ficha_cliente']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_fclapellidos = $this->fclapellidos;
    $original_fclcelular = $this->fclcelular;
    $original_fclnombres = $this->fclnombres;
    $original_fclnumero = $this->fclnumero;
    $original_update_titulo_citas = $this->update_titulo_citas;
}
  if($this->update_titulo_citas ==1) {
	
	$sql="SELECT cittitulo, citid FROM cita WHERE fclnumero=".$this->fclnumero ;
	 
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
	
	foreach($this->rs  as $cita) {
		
		$pos = strpos($cita[0], ')');
		$conserva=substr($cita[0],$pos+2);
		
		$nuevo_titulo=$this->fclnumero ."-".$this->fclapellidos ." ".$this->fclnombres ." (".$this->fclcelular .") ".$conserva;

		$updt="UPDATE cita SET cittitulo='".$nuevo_titulo."' WHERE citid=".$cita[1];
		
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
                form_ficha_cliente_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		
		
	}


	
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_fclapellidos != $this->fclapellidos || (isset($bFlagRead_fclapellidos) && $bFlagRead_fclapellidos)))
    {
        $this->ajax_return_values_fclapellidos(true);
    }
    if (($original_fclcelular != $this->fclcelular || (isset($bFlagRead_fclcelular) && $bFlagRead_fclcelular)))
    {
        $this->ajax_return_values_fclcelular(true);
    }
    if (($original_fclnombres != $this->fclnombres || (isset($bFlagRead_fclnombres) && $bFlagRead_fclnombres)))
    {
        $this->ajax_return_values_fclnombres(true);
    }
    if (($original_fclnumero != $this->fclnumero || (isset($bFlagRead_fclnumero) && $bFlagRead_fclnumero)))
    {
        $this->ajax_return_values_fclnumero(true);
    }
    if (($original_update_titulo_citas != $this->update_titulo_citas || (isset($bFlagRead_update_titulo_citas) && $bFlagRead_update_titulo_citas)))
    {
        $this->ajax_return_values_update_titulo_citas(true);
    }
}
$_SESSION['scriptcase']['form_ficha_cliente']['contr_erro'] = 'off'; 
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['parms'] = "fclnumero?#?$this->fclnumero?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->fclnumero = null === $this->fclnumero ? null : substr($this->Db->qstr($this->fclnumero), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->fclnumero)) 
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
      if ($this->nmgp_opcao != "nada" && (trim($this->fclnumero) == "")) 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['run_iframe'] == "F" && $this->sc_evento == "insert")
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_ficha_cliente = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['total'] = $qt_geral_reg_form_ficha_cliente;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->fclnumero))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "fclnumero < $this->fclnumero "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "fclnumero < $this->fclnumero "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "fclnumero < $this->fclnumero "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "fclnumero < $this->fclnumero "; 
              }
              else  
              {
                  $Key_Where = "fclnumero < $this->fclnumero "; 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_ficha_cliente = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start'] > $qt_geral_reg_form_ficha_cliente)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start'] = $qt_geral_reg_form_ficha_cliente; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start'] = $qt_geral_reg_form_ficha_cliente; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_ficha_cliente) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT fclnumero, fclnombres, fclapellidos, str_replace (convert(char(10),fclfechareg,102), '.', '-') + ' ' + convert(char(8),fclfechareg,20), str_replace (convert(char(10),fclfechanac,102), '.', '-') + ' ' + convert(char(8),fclfechanac,20), fclsexo, fclcedula, fclestciv, fcldireccion, fclciudad, fcltelefono, fclcelular, fclemail, fclprofesion, fcllugartrab, fclreferpub, fclreferface, fclreferweb, fclreferremit, fclreferremitnom, fclmotivprimcons, fclproblemactual, fclbajotratmed, fclalerganest, fclprophemor, fclintervquir, fclmediesp, fclhiperten, fclhipotiro, fclaltercora, fclgastrit, fclenfsangre, fcldiabet, fclhepatit, fclcancer, fclvih, fclartrit, fclinsufren, fclotrasenf, fclotrasenfdesc, fclobserv, fclusucrea, fclusumodi, str_replace (convert(char(10),fclfeccrea,102), '.', '-') + ' ' + convert(char(8),fclfeccrea,20), str_replace (convert(char(10),fclfecmodi,102), '.', '-') + ' ' + convert(char(8),fclfecmodi,20), fclfacigual, fclfacnombre, fclfacruc, fclfacdir, fclfactelf, fclfacmail, fclactivo from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT fclnumero, fclnombres, fclapellidos, convert(char(23),fclfechareg,121), convert(char(23),fclfechanac,121), fclsexo, fclcedula, fclestciv, fcldireccion, fclciudad, fcltelefono, fclcelular, fclemail, fclprofesion, fcllugartrab, fclreferpub, fclreferface, fclreferweb, fclreferremit, fclreferremitnom, fclmotivprimcons, fclproblemactual, fclbajotratmed, fclalerganest, fclprophemor, fclintervquir, fclmediesp, fclhiperten, fclhipotiro, fclaltercora, fclgastrit, fclenfsangre, fcldiabet, fclhepatit, fclcancer, fclvih, fclartrit, fclinsufren, fclotrasenf, fclotrasenfdesc, fclobserv, fclusucrea, fclusumodi, convert(char(23),fclfeccrea,121), convert(char(23),fclfecmodi,121), fclfacigual, fclfacnombre, fclfacruc, fclfacdir, fclfactelf, fclfacmail, fclactivo from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT fclnumero, fclnombres, fclapellidos, fclfechareg, fclfechanac, fclsexo, fclcedula, fclestciv, fcldireccion, fclciudad, fcltelefono, fclcelular, fclemail, fclprofesion, fcllugartrab, fclreferpub, fclreferface, fclreferweb, fclreferremit, fclreferremitnom, fclmotivprimcons, fclproblemactual, fclbajotratmed, fclalerganest, fclprophemor, fclintervquir, fclmediesp, fclhiperten, fclhipotiro, fclaltercora, fclgastrit, fclenfsangre, fcldiabet, fclhepatit, fclcancer, fclvih, fclartrit, fclinsufren, fclotrasenf, fclotrasenfdesc, fclobserv, fclusucrea, fclusumodi, fclfeccrea, fclfecmodi, fclfacigual, fclfacnombre, fclfacruc, fclfacdir, fclfactelf, fclfacmail, fclactivo from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT fclnumero, fclnombres, fclapellidos, EXTEND(fclfechareg, YEAR TO DAY), EXTEND(fclfechanac, YEAR TO DAY), fclsexo, fclcedula, fclestciv, fcldireccion, fclciudad, fcltelefono, fclcelular, fclemail, fclprofesion, fcllugartrab, fclreferpub, fclreferface, fclreferweb, fclreferremit, fclreferremitnom, fclmotivprimcons, fclproblemactual, fclbajotratmed, fclalerganest, fclprophemor, fclintervquir, fclmediesp, fclhiperten, fclhipotiro, fclaltercora, fclgastrit, fclenfsangre, fcldiabet, fclhepatit, fclcancer, fclvih, fclartrit, fclinsufren, fclotrasenf, fclotrasenfdesc, fclobserv, fclusucrea, fclusumodi, EXTEND(fclfeccrea, YEAR TO FRACTION), EXTEND(fclfecmodi, YEAR TO FRACTION), fclfacigual, fclfacnombre, fclfacruc, fclfacdir, fclfactelf, fclfacmail, fclactivo from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT fclnumero, fclnombres, fclapellidos, fclfechareg, fclfechanac, fclsexo, fclcedula, fclestciv, fcldireccion, fclciudad, fcltelefono, fclcelular, fclemail, fclprofesion, fcllugartrab, fclreferpub, fclreferface, fclreferweb, fclreferremit, fclreferremitnom, fclmotivprimcons, fclproblemactual, fclbajotratmed, fclalerganest, fclprophemor, fclintervquir, fclmediesp, fclhiperten, fclhipotiro, fclaltercora, fclgastrit, fclenfsangre, fcldiabet, fclhepatit, fclcancer, fclvih, fclartrit, fclinsufren, fclotrasenf, fclotrasenfdesc, fclobserv, fclusucrea, fclusumodi, fclfeccrea, fclfecmodi, fclfacigual, fclfacnombre, fclfacruc, fclfacdir, fclfactelf, fclfacmail, fclactivo from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "fclnumero = $this->fclnumero"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "fclnumero = $this->fclnumero"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "fclnumero = $this->fclnumero"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "fclnumero = $this->fclnumero"; 
              }  
              else  
              {
                  $aWhere[] = "fclnumero = $this->fclnumero"; 
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
          $sc_order_by = "fclnumero";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['volver'] = $this->nmgp_botoes['volver'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['empty_filter'] = true;
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
              $this->NM_ajax_info['buttonDisplay']['volver'] = $this->nmgp_botoes['volver'] = "on";
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
              $this->fclnumero = $rs->fields[0] ; 
              $this->nmgp_dados_select['fclnumero'] = $this->fclnumero;
              $this->fclnombres = $rs->fields[1] ; 
              $this->nmgp_dados_select['fclnombres'] = $this->fclnombres;
              $this->fclapellidos = $rs->fields[2] ; 
              $this->nmgp_dados_select['fclapellidos'] = $this->fclapellidos;
              $this->fclfechareg = $rs->fields[3] ; 
              $this->nmgp_dados_select['fclfechareg'] = $this->fclfechareg;
              $this->fclfechanac = $rs->fields[4] ; 
              $this->nmgp_dados_select['fclfechanac'] = $this->fclfechanac;
              $this->fclsexo = $rs->fields[5] ; 
              $this->nmgp_dados_select['fclsexo'] = $this->fclsexo;
              $this->fclcedula = $rs->fields[6] ; 
              $this->nmgp_dados_select['fclcedula'] = $this->fclcedula;
              $this->fclestciv = $rs->fields[7] ; 
              $this->nmgp_dados_select['fclestciv'] = $this->fclestciv;
              $this->fcldireccion = $rs->fields[8] ; 
              $this->nmgp_dados_select['fcldireccion'] = $this->fcldireccion;
              $this->fclciudad = $rs->fields[9] ; 
              $this->nmgp_dados_select['fclciudad'] = $this->fclciudad;
              $this->fcltelefono = $rs->fields[10] ; 
              $this->nmgp_dados_select['fcltelefono'] = $this->fcltelefono;
              $this->fclcelular = $rs->fields[11] ; 
              $this->nmgp_dados_select['fclcelular'] = $this->fclcelular;
              $this->fclemail = $rs->fields[12] ; 
              $this->nmgp_dados_select['fclemail'] = $this->fclemail;
              $this->fclprofesion = $rs->fields[13] ; 
              $this->nmgp_dados_select['fclprofesion'] = $this->fclprofesion;
              $this->fcllugartrab = $rs->fields[14] ; 
              $this->nmgp_dados_select['fcllugartrab'] = $this->fcllugartrab;
              $this->fclreferpub = $rs->fields[15] ; 
              $this->nmgp_dados_select['fclreferpub'] = $this->fclreferpub;
              $this->fclreferface = $rs->fields[16] ; 
              $this->nmgp_dados_select['fclreferface'] = $this->fclreferface;
              $this->fclreferweb = $rs->fields[17] ; 
              $this->nmgp_dados_select['fclreferweb'] = $this->fclreferweb;
              $this->fclreferremit = $rs->fields[18] ; 
              $this->nmgp_dados_select['fclreferremit'] = $this->fclreferremit;
              $this->fclreferremitnom = $rs->fields[19] ; 
              $this->nmgp_dados_select['fclreferremitnom'] = $this->fclreferremitnom;
              $this->fclmotivprimcons = $rs->fields[20] ; 
              $this->nmgp_dados_select['fclmotivprimcons'] = $this->fclmotivprimcons;
              $this->fclproblemactual = $rs->fields[21] ; 
              $this->nmgp_dados_select['fclproblemactual'] = $this->fclproblemactual;
              $this->fclbajotratmed = $rs->fields[22] ; 
              $this->nmgp_dados_select['fclbajotratmed'] = $this->fclbajotratmed;
              $this->fclalerganest = $rs->fields[23] ; 
              $this->nmgp_dados_select['fclalerganest'] = $this->fclalerganest;
              $this->fclprophemor = $rs->fields[24] ; 
              $this->nmgp_dados_select['fclprophemor'] = $this->fclprophemor;
              $this->fclintervquir = $rs->fields[25] ; 
              $this->nmgp_dados_select['fclintervquir'] = $this->fclintervquir;
              $this->fclmediesp = $rs->fields[26] ; 
              $this->nmgp_dados_select['fclmediesp'] = $this->fclmediesp;
              $this->fclhiperten = $rs->fields[27] ; 
              $this->nmgp_dados_select['fclhiperten'] = $this->fclhiperten;
              $this->fclhipotiro = $rs->fields[28] ; 
              $this->nmgp_dados_select['fclhipotiro'] = $this->fclhipotiro;
              $this->fclaltercora = $rs->fields[29] ; 
              $this->nmgp_dados_select['fclaltercora'] = $this->fclaltercora;
              $this->fclgastrit = $rs->fields[30] ; 
              $this->nmgp_dados_select['fclgastrit'] = $this->fclgastrit;
              $this->fclenfsangre = $rs->fields[31] ; 
              $this->nmgp_dados_select['fclenfsangre'] = $this->fclenfsangre;
              $this->fcldiabet = $rs->fields[32] ; 
              $this->nmgp_dados_select['fcldiabet'] = $this->fcldiabet;
              $this->fclhepatit = $rs->fields[33] ; 
              $this->nmgp_dados_select['fclhepatit'] = $this->fclhepatit;
              $this->fclcancer = $rs->fields[34] ; 
              $this->nmgp_dados_select['fclcancer'] = $this->fclcancer;
              $this->fclvih = $rs->fields[35] ; 
              $this->nmgp_dados_select['fclvih'] = $this->fclvih;
              $this->fclartrit = $rs->fields[36] ; 
              $this->nmgp_dados_select['fclartrit'] = $this->fclartrit;
              $this->fclinsufren = $rs->fields[37] ; 
              $this->nmgp_dados_select['fclinsufren'] = $this->fclinsufren;
              $this->fclotrasenf = $rs->fields[38] ; 
              $this->nmgp_dados_select['fclotrasenf'] = $this->fclotrasenf;
              $this->fclotrasenfdesc = $rs->fields[39] ; 
              $this->nmgp_dados_select['fclotrasenfdesc'] = $this->fclotrasenfdesc;
              $this->fclobserv = $rs->fields[40] ; 
              $this->nmgp_dados_select['fclobserv'] = $this->fclobserv;
              $this->fclusucrea = $rs->fields[41] ; 
              $this->nmgp_dados_select['fclusucrea'] = $this->fclusucrea;
              $this->fclusumodi = $rs->fields[42] ; 
              $this->nmgp_dados_select['fclusumodi'] = $this->fclusumodi;
              $this->fclfeccrea = $rs->fields[43] ; 
              if (substr($this->fclfeccrea, 10, 1) == "-") 
              { 
                 $this->fclfeccrea = substr($this->fclfeccrea, 0, 10) . " " . substr($this->fclfeccrea, 11);
              } 
              if (substr($this->fclfeccrea, 13, 1) == ".") 
              { 
                 $this->fclfeccrea = substr($this->fclfeccrea, 0, 13) . ":" . substr($this->fclfeccrea, 14, 2) . ":" . substr($this->fclfeccrea, 17);
              } 
              $this->nmgp_dados_select['fclfeccrea'] = $this->fclfeccrea;
              $this->fclfecmodi = $rs->fields[44] ; 
              if (substr($this->fclfecmodi, 10, 1) == "-") 
              { 
                 $this->fclfecmodi = substr($this->fclfecmodi, 0, 10) . " " . substr($this->fclfecmodi, 11);
              } 
              if (substr($this->fclfecmodi, 13, 1) == ".") 
              { 
                 $this->fclfecmodi = substr($this->fclfecmodi, 0, 13) . ":" . substr($this->fclfecmodi, 14, 2) . ":" . substr($this->fclfecmodi, 17);
              } 
              $this->nmgp_dados_select['fclfecmodi'] = $this->fclfecmodi;
              $this->fclfacigual = $rs->fields[45] ; 
              $this->nmgp_dados_select['fclfacigual'] = $this->fclfacigual;
              $this->fclfacnombre = $rs->fields[46] ; 
              $this->nmgp_dados_select['fclfacnombre'] = $this->fclfacnombre;
              $this->fclfacruc = $rs->fields[47] ; 
              $this->nmgp_dados_select['fclfacruc'] = $this->fclfacruc;
              $this->fclfacdir = $rs->fields[48] ; 
              $this->nmgp_dados_select['fclfacdir'] = $this->fclfacdir;
              $this->fclfactelf = $rs->fields[49] ; 
              $this->nmgp_dados_select['fclfactelf'] = $this->fclfactelf;
              $this->fclfacmail = $rs->fields[50] ; 
              $this->nmgp_dados_select['fclfacmail'] = $this->fclfacmail;
              $this->fclactivo = $rs->fields[51] ; 
              $this->nmgp_dados_select['fclactivo'] = $this->fclactivo;
              $this->cobros = $rs->fields[52] ; 
              $this->nmgp_dados_select['cobros'] = $this->cobros;
              $this->historias = $rs->fields[53] ; 
              $this->nmgp_dados_select['historias'] = $this->historias;
              $this->presupuestos = $rs->fields[54] ; 
              $this->nmgp_dados_select['presupuestos'] = $this->presupuestos;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->fclnumero = (string)$this->fclnumero; 
              $this->fclreferpub = (string)$this->fclreferpub; 
              $this->fclreferface = (string)$this->fclreferface; 
              $this->fclreferweb = (string)$this->fclreferweb; 
              $this->fclreferremit = (string)$this->fclreferremit; 
              $this->fclbajotratmed = (string)$this->fclbajotratmed; 
              $this->fclalerganest = (string)$this->fclalerganest; 
              $this->fclprophemor = (string)$this->fclprophemor; 
              $this->fclintervquir = (string)$this->fclintervquir; 
              $this->fclmediesp = (string)$this->fclmediesp; 
              $this->fclhiperten = (string)$this->fclhiperten; 
              $this->fclhipotiro = (string)$this->fclhipotiro; 
              $this->fclaltercora = (string)$this->fclaltercora; 
              $this->fclgastrit = (string)$this->fclgastrit; 
              $this->fclenfsangre = (string)$this->fclenfsangre; 
              $this->fcldiabet = (string)$this->fcldiabet; 
              $this->fclhepatit = (string)$this->fclhepatit; 
              $this->fclcancer = (string)$this->fclcancer; 
              $this->fclvih = (string)$this->fclvih; 
              $this->fclartrit = (string)$this->fclartrit; 
              $this->fclinsufren = (string)$this->fclinsufren; 
              $this->fclotrasenf = (string)$this->fclotrasenf; 
              $this->fclfacigual = (string)$this->fclfacigual; 
              $this->fclactivo = (string)$this->fclactivo; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['parms'] = "fclnumero?#?$this->fclnumero?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start'] < $qt_geral_reg_form_ficha_cliente;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['opcao']   = '';
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
              $this->fclnumero = "-1";  
              $this->nmgp_dados_form["fclnumero"] = $this->fclnumero;
              $this->fclnombres = "";  
              $this->nmgp_dados_form["fclnombres"] = $this->fclnombres;
              $this->fclapellidos = "";  
              $this->nmgp_dados_form["fclapellidos"] = $this->fclapellidos;
              $this->fclfechareg =  date('Y') . "-" . date('m')  . "-" . date('d');
              $this->nmgp_dados_form["fclfechareg"] = $this->fclfechareg;
              $this->fclfechanac = "";  
              $this->fclfechanac_hora = "" ;  
              $this->nmgp_dados_form["fclfechanac"] = $this->fclfechanac;
              $this->fclsexo = "";  
              $this->nmgp_dados_form["fclsexo"] = $this->fclsexo;
              $this->fclcedula = "";  
              $this->nmgp_dados_form["fclcedula"] = $this->fclcedula;
              $this->fclestciv = "";  
              $this->nmgp_dados_form["fclestciv"] = $this->fclestciv;
              $this->fcldireccion = "";  
              $this->nmgp_dados_form["fcldireccion"] = $this->fcldireccion;
              $this->fclciudad = "";  
              $this->nmgp_dados_form["fclciudad"] = $this->fclciudad;
              $this->fcltelefono = "";  
              $this->nmgp_dados_form["fcltelefono"] = $this->fcltelefono;
              $this->fclcelular = "";  
              $this->nmgp_dados_form["fclcelular"] = $this->fclcelular;
              $this->fclemail = "";  
              $this->nmgp_dados_form["fclemail"] = $this->fclemail;
              $this->fclprofesion = "";  
              $this->nmgp_dados_form["fclprofesion"] = $this->fclprofesion;
              $this->fcllugartrab = "";  
              $this->nmgp_dados_form["fcllugartrab"] = $this->fcllugartrab;
              $this->fclreferpub = "";  
              $this->nmgp_dados_form["fclreferpub"] = $this->fclreferpub;
              $this->fclreferface = "";  
              $this->nmgp_dados_form["fclreferface"] = $this->fclreferface;
              $this->fclreferweb = "";  
              $this->nmgp_dados_form["fclreferweb"] = $this->fclreferweb;
              $this->fclreferremit = "";  
              $this->nmgp_dados_form["fclreferremit"] = $this->fclreferremit;
              $this->fclreferremitnom = "";  
              $this->nmgp_dados_form["fclreferremitnom"] = $this->fclreferremitnom;
              $this->fclmotivprimcons = "";  
              $this->nmgp_dados_form["fclmotivprimcons"] = $this->fclmotivprimcons;
              $this->fclproblemactual = "";  
              $this->nmgp_dados_form["fclproblemactual"] = $this->fclproblemactual;
              $this->fclbajotratmed = "";  
              $this->nmgp_dados_form["fclbajotratmed"] = $this->fclbajotratmed;
              $this->fclalerganest = "";  
              $this->nmgp_dados_form["fclalerganest"] = $this->fclalerganest;
              $this->fclprophemor = "";  
              $this->nmgp_dados_form["fclprophemor"] = $this->fclprophemor;
              $this->fclintervquir = "";  
              $this->nmgp_dados_form["fclintervquir"] = $this->fclintervquir;
              $this->fclmediesp = "";  
              $this->nmgp_dados_form["fclmediesp"] = $this->fclmediesp;
              $this->fclhiperten = "";  
              $this->nmgp_dados_form["fclhiperten"] = $this->fclhiperten;
              $this->fclhipotiro = "";  
              $this->nmgp_dados_form["fclhipotiro"] = $this->fclhipotiro;
              $this->fclaltercora = "";  
              $this->nmgp_dados_form["fclaltercora"] = $this->fclaltercora;
              $this->fclgastrit = "";  
              $this->nmgp_dados_form["fclgastrit"] = $this->fclgastrit;
              $this->fclenfsangre = "";  
              $this->nmgp_dados_form["fclenfsangre"] = $this->fclenfsangre;
              $this->fcldiabet = "";  
              $this->nmgp_dados_form["fcldiabet"] = $this->fcldiabet;
              $this->fclhepatit = "";  
              $this->nmgp_dados_form["fclhepatit"] = $this->fclhepatit;
              $this->fclcancer = "";  
              $this->nmgp_dados_form["fclcancer"] = $this->fclcancer;
              $this->fclvih = "";  
              $this->nmgp_dados_form["fclvih"] = $this->fclvih;
              $this->fclartrit = "";  
              $this->nmgp_dados_form["fclartrit"] = $this->fclartrit;
              $this->fclinsufren = "";  
              $this->nmgp_dados_form["fclinsufren"] = $this->fclinsufren;
              $this->fclotrasenf = "";  
              $this->nmgp_dados_form["fclotrasenf"] = $this->fclotrasenf;
              $this->fclotrasenfdesc = "";  
              $this->nmgp_dados_form["fclotrasenfdesc"] = $this->fclotrasenfdesc;
              $this->fclobserv = "";  
              $this->nmgp_dados_form["fclobserv"] = $this->fclobserv;
              $this->fclusucrea = "";  
              $this->nmgp_dados_form["fclusucrea"] = $this->fclusucrea;
              $this->fclusumodi = "";  
              $this->nmgp_dados_form["fclusumodi"] = $this->fclusumodi;
              $this->fclfeccrea = "";  
              $this->fclfeccrea_hora = "" ;  
              $this->nmgp_dados_form["fclfeccrea"] = $this->fclfeccrea;
              $this->fclfecmodi = "";  
              $this->fclfecmodi_hora = "" ;  
              $this->nmgp_dados_form["fclfecmodi"] = $this->fclfecmodi;
              $this->fclfacigual = "";  
              $this->nmgp_dados_form["fclfacigual"] = $this->fclfacigual;
              $this->fclfacnombre = "";  
              $this->nmgp_dados_form["fclfacnombre"] = $this->fclfacnombre;
              $this->fclfacruc = "";  
              $this->nmgp_dados_form["fclfacruc"] = $this->fclfacruc;
              $this->fclfacdir = "";  
              $this->nmgp_dados_form["fclfacdir"] = $this->fclfacdir;
              $this->fclfactelf = "";  
              $this->nmgp_dados_form["fclfactelf"] = $this->fclfactelf;
              $this->fclfacmail = "";  
              $this->nmgp_dados_form["fclfacmail"] = $this->fclfacmail;
              $this->fclactivo = "";  
              $this->nmgp_dados_form["fclactivo"] = $this->fclactivo;
              $this->cobros = "";  
              $this->nmgp_dados_form["cobros"] = $this->cobros;
              $this->historias = "";  
              $this->nmgp_dados_form["historias"] = $this->historias;
              $this->presupuestos = "";  
              $this->nmgp_dados_form["presupuestos"] = $this->presupuestos;
              $this->update_titulo_citas = "";  
              $this->nmgp_dados_form["update_titulo_citas"] = $this->update_titulo_citas;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['foreign_key'] as $sFKName => $sFKValue)
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
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['grid_historia_script_case_init'] ]['grid_historia']['embutida_parms'] = "var_cliente*scin" . $this->nmgp_dados_form['fclnumero'] . "*scoutNMSC_paginacao*scinFULL*scout";
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['grid_presupuesto_script_case_init'] ]['grid_presupuesto']['embutida_parms'] = "var_cliente*scin" . $this->nmgp_dados_form['fclnumero'] . "*scoutNMSC_paginacao*scinFULL*scout";
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['grid_cobros_script_case_init'] ]['grid_cobros']['embutida_parms'] = "var_cliente*scin" . $this->nmgp_dados_form['fclnumero'] . "*scoutNMSC_paginacao*scinFULL*scout";
  }
// 
//-- 
   function nm_db_retorna($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fclnumero) from " . $this->Ini->nm_tabela . " where fclnumero < $this->fclnumero" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(fclnumero) from " . $this->Ini->nm_tabela . " where fclnumero < $this->fclnumero" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fclnumero) from " . $this->Ini->nm_tabela . " where fclnumero < $this->fclnumero" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(fclnumero) from " . $this->Ini->nm_tabela . " where fclnumero < $this->fclnumero" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fclnumero) from " . $this->Ini->nm_tabela . " where fclnumero < $this->fclnumero" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(fclnumero) from " . $this->Ini->nm_tabela . " where fclnumero < $this->fclnumero" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fclnumero) from " . $this->Ini->nm_tabela . " where fclnumero < $this->fclnumero" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(fclnumero) from " . $this->Ini->nm_tabela . " where fclnumero < $this->fclnumero" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fclnumero) from " . $this->Ini->nm_tabela . " where fclnumero < $this->fclnumero" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(fclnumero) from " . $this->Ini->nm_tabela . " where fclnumero < $this->fclnumero" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->fclnumero = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fclnumero) from " . $this->Ini->nm_tabela . " where fclnumero > $this->fclnumero" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(fclnumero) from " . $this->Ini->nm_tabela . " where fclnumero > $this->fclnumero" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fclnumero) from " . $this->Ini->nm_tabela . " where fclnumero > $this->fclnumero" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(fclnumero) from " . $this->Ini->nm_tabela . " where fclnumero > $this->fclnumero" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fclnumero) from " . $this->Ini->nm_tabela . " where fclnumero > $this->fclnumero" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(fclnumero) from " . $this->Ini->nm_tabela . " where fclnumero > $this->fclnumero" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fclnumero) from " . $this->Ini->nm_tabela . " where fclnumero > $this->fclnumero" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(fclnumero) from " . $this->Ini->nm_tabela . " where fclnumero > $this->fclnumero" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fclnumero) from " . $this->Ini->nm_tabela . " where fclnumero > $this->fclnumero" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(fclnumero) from " . $this->Ini->nm_tabela . " where fclnumero > $this->fclnumero" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->fclnumero = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fclnumero) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(fclnumero) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fclnumero) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(fclnumero) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fclnumero) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(fclnumero) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fclnumero) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(fclnumero) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(fclnumero) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(fclnumero) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_filter']))
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
     $this->fclnumero = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fclnumero) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(fclnumero) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fclnumero) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(fclnumero) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fclnumero) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(fclnumero) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fclnumero) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(fclnumero) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(fclnumero) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(fclnumero) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
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
     $this->fclnumero = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['reg_start'] + 1;
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function fclfacigual_onClick()
{
$_SESSION['scriptcase']['form_ficha_cliente']['contr_erro'] = 'on';
  
$original_fclfacigual = $this->fclfacigual;

if($this->fclfacigual ==1) {
	
	$this->Ini->nm_hidden_blocos[3] = "off"; $this->NM_ajax_info['blockDisplay']['3'] = 'off';
	
}
else {
	
	$this->Ini->nm_hidden_blocos[3] = "on"; $this->NM_ajax_info['blockDisplay']['3'] = 'on';
}

$modificado_fclfacigual = $this->fclfacigual;
$this->nm_formatar_campos('fclfacigual');
if ($original_fclfacigual !== $modificado_fclfacigual || isset($this->nmgp_cmp_readonly['fclfacigual']) || (isset($bFlagRead_fclfacigual) && $bFlagRead_fclfacigual))
{
    $this->ajax_return_values_fclfacigual(true);
}
$this->NM_ajax_info['event_field'] = 'fclfacigual';
form_ficha_cliente_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_ficha_cliente']['contr_erro'] = 'off';
}
function fclotrasenf_onClick()
{
$_SESSION['scriptcase']['form_ficha_cliente']['contr_erro'] = 'on';
  
$original_fclotrasenf = $this->fclotrasenf;
$original_fclotrasenfdesc = $this->fclotrasenfdesc;

if ($this->fclotrasenf == 1)     
{
    $this->nmgp_cmp_hidden["fclotrasenfdesc"] = "on"; $this->NM_ajax_info['fieldDisplay']['fclotrasenfdesc'] = 'on';
}
else      
{
    $this->nmgp_cmp_hidden["fclotrasenfdesc"] = "off"; $this->NM_ajax_info['fieldDisplay']['fclotrasenfdesc'] = 'off';
	$this->fclotrasenfdesc ="";
}


$modificado_fclotrasenf = $this->fclotrasenf;
$modificado_fclotrasenfdesc = $this->fclotrasenfdesc;
$this->nm_formatar_campos('fclotrasenf', 'fclotrasenfdesc');
if ($original_fclotrasenf !== $modificado_fclotrasenf || isset($this->nmgp_cmp_readonly['fclotrasenf']) || (isset($bFlagRead_fclotrasenf) && $bFlagRead_fclotrasenf))
{
    $this->ajax_return_values_fclotrasenf(true);
}
if ($original_fclotrasenfdesc !== $modificado_fclotrasenfdesc || isset($this->nmgp_cmp_readonly['fclotrasenfdesc']) || (isset($bFlagRead_fclotrasenfdesc) && $bFlagRead_fclotrasenfdesc))
{
    $this->ajax_return_values_fclotrasenfdesc(true);
}
$this->NM_ajax_info['event_field'] = 'fclotrasenf';
form_ficha_cliente_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_ficha_cliente']['contr_erro'] = 'off';
}
function fclreferremit_onClick()
{
$_SESSION['scriptcase']['form_ficha_cliente']['contr_erro'] = 'on';
  
$original_fclreferremit = $this->fclreferremit;
$original_fclreferremitnom = $this->fclreferremitnom;

if ($this->fclreferremit  == 1)     
{
    $this->nmgp_cmp_hidden["fclreferremitnom"] = "on"; $this->NM_ajax_info['fieldDisplay']['fclreferremitnom'] = 'on';
}
else      
{
    $this->nmgp_cmp_hidden["fclreferremitnom"] = "off"; $this->NM_ajax_info['fieldDisplay']['fclreferremitnom'] = 'off';
	$this->fclreferremitnom ="";
}


$modificado_fclreferremit = $this->fclreferremit;
$modificado_fclreferremitnom = $this->fclreferremitnom;
$this->nm_formatar_campos('fclreferremit', 'fclreferremitnom');
if ($original_fclreferremit !== $modificado_fclreferremit || isset($this->nmgp_cmp_readonly['fclreferremit']) || (isset($bFlagRead_fclreferremit) && $bFlagRead_fclreferremit))
{
    $this->ajax_return_values_fclreferremit(true);
}
if ($original_fclreferremitnom !== $modificado_fclreferremitnom || isset($this->nmgp_cmp_readonly['fclreferremitnom']) || (isset($bFlagRead_fclreferremitnom) && $bFlagRead_fclreferremitnom))
{
    $this->ajax_return_values_fclreferremitnom(true);
}
$this->NM_ajax_info['event_field'] = 'fclreferremit';
form_ficha_cliente_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_ficha_cliente']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_ficha_cliente_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_ficha_cliente_form0.php");
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("fclnumero", "fclnombres", "fclapellidos", "fclcedula", "fclestciv", "fcldireccion", "fclciudad", "fcltelefono", "fclcelular", "fclemail", "fclprofesion", "fcllugartrab", "fclreferpub", "fclreferface", "fclreferweb", "fclreferremit", "fclreferremitnom", "fclmotivprimcons", "fclproblemactual", "fclbajotratmed", "fclalerganest", "fclprophemor", "fclintervquir", "fclmediesp", "fclhiperten", "fclhipotiro", "fclaltercora", "fclgastrit", "fclenfsangre", "fcldiabet", "fclhepatit", "fclcancer", "fclvih", "fclartrit", "fclinsufren", "fclotrasenf", "fclotrasenfdesc", "fclobserv", "fclusucrea", "fclusumodi"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['csrf_token'];
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

   function Form_lookup_fclactivo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_update_titulo_citas()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_fclsexo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "MASCULINO?#?M?#??@?";
       $nmgp_def_dados .= "FEMENINO?#?F?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_fclestciv()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SOLTERO?#?S?#??@?";
       $nmgp_def_dados .= "CASADO?#?C?#??@?";
       $nmgp_def_dados .= "VIUDO?#?V?#??@?";
       $nmgp_def_dados .= "DIVORCIADO?#?D?#??@?";
       $nmgp_def_dados .= "UNIÓN LIBRE?#?U?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_fclfacigual()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_fclreferpub()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_fclreferface()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_fclreferweb()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_fclreferremit()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_fclbajotratmed()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_fclalerganest()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_fclprophemor()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_fclintervquir()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_fclmediesp()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_fclhiperten()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_fclhipotiro()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_fclaltercora()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_fclgastrit()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_fclenfsangre()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_fcldiabet()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_fclhepatit()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_fclcancer()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_fclvih()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_fclartrit()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_fclinsufren()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_fclotrasenf()
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_ficha_cliente_pack_ajax_response();
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
              $this->SC_monta_condicao($comando, "fclnumero", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fclnombres", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fclapellidos", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fclcedula", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_fclestciv($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "fclestciv", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fcldireccion", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fclciudad", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fcltelefono", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fclcelular", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fclemail", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fclprofesion", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fcllugartrab", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_fclreferpub($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "fclreferpub", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_fclreferface($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "fclreferface", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_fclreferweb($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "fclreferweb", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_fclreferremit($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "fclreferremit", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fclreferremitnom", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fclmotivprimcons", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fclproblemactual", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_fclbajotratmed($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "fclbajotratmed", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_fclalerganest($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "fclalerganest", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_fclprophemor($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "fclprophemor", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_fclintervquir($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "fclintervquir", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_fclmediesp($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "fclmediesp", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_fclhiperten($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "fclhiperten", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_fclhipotiro($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "fclhipotiro", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_fclaltercora($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "fclaltercora", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_fclgastrit($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "fclgastrit", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_fclenfsangre($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "fclenfsangre", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_fcldiabet($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "fcldiabet", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_fclhepatit($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "fclhepatit", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_fclcancer($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "fclcancer", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_fclvih($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "fclvih", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_fclartrit($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "fclartrit", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_fclinsufren($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "fclinsufren", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_fclotrasenf($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "fclotrasenf", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fclotrasenfdesc", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fclobserv", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fclusucrea", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fclusumodi", $arg_search, $data_search);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_ficha_cliente = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['total'] = $qt_geral_reg_form_ficha_cliente;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_ficha_cliente_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_ficha_cliente_pack_ajax_response();
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
      $nm_numeric[] = "fclnumero";$nm_numeric[] = "fclreferpub";$nm_numeric[] = "fclreferface";$nm_numeric[] = "fclreferweb";$nm_numeric[] = "fclreferremit";$nm_numeric[] = "fclbajotratmed";$nm_numeric[] = "fclalerganest";$nm_numeric[] = "fclprophemor";$nm_numeric[] = "fclintervquir";$nm_numeric[] = "fclmediesp";$nm_numeric[] = "fclhiperten";$nm_numeric[] = "fclhipotiro";$nm_numeric[] = "fclaltercora";$nm_numeric[] = "fclgastrit";$nm_numeric[] = "fclenfsangre";$nm_numeric[] = "fcldiabet";$nm_numeric[] = "fclhepatit";$nm_numeric[] = "fclcancer";$nm_numeric[] = "fclvih";$nm_numeric[] = "fclartrit";$nm_numeric[] = "fclinsufren";$nm_numeric[] = "fclotrasenf";$nm_numeric[] = "fclfacigual";$nm_numeric[] = "fclactivo";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['decimal_db'] == ".")
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
      $Nm_datas['fclfechareg'] = "date";$Nm_datas['fclfechanac'] = "date";$Nm_datas['fclfeccrea'] = "datetime";$Nm_datas['fclfecmodi'] = "datetime";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['SC_sep_date1'];
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
   function SC_lookup_fclestciv($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['S'] = "SOLTERO";
       $data_look['C'] = "CASADO";
       $data_look['V'] = "VIUDO";
       $data_look['D'] = "DIVORCIADO";
       $data_look['U'] = "UNIÓN LIBRE";
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
   function SC_lookup_fclreferpub($condicao, $campo)
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
   function SC_lookup_fclreferface($condicao, $campo)
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
   function SC_lookup_fclreferweb($condicao, $campo)
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
   function SC_lookup_fclreferremit($condicao, $campo)
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
   function SC_lookup_fclbajotratmed($condicao, $campo)
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
   function SC_lookup_fclalerganest($condicao, $campo)
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
   function SC_lookup_fclprophemor($condicao, $campo)
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
   function SC_lookup_fclintervquir($condicao, $campo)
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
   function SC_lookup_fclmediesp($condicao, $campo)
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
   function SC_lookup_fclhiperten($condicao, $campo)
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
   function SC_lookup_fclhipotiro($condicao, $campo)
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
   function SC_lookup_fclaltercora($condicao, $campo)
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
   function SC_lookup_fclgastrit($condicao, $campo)
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
   function SC_lookup_fclenfsangre($condicao, $campo)
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
   function SC_lookup_fcldiabet($condicao, $campo)
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
   function SC_lookup_fclhepatit($condicao, $campo)
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
   function SC_lookup_fclcancer($condicao, $campo)
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
   function SC_lookup_fclvih($condicao, $campo)
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
   function SC_lookup_fclartrit($condicao, $campo)
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
   function SC_lookup_fclinsufren($condicao, $campo)
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
   function SC_lookup_fclotrasenf($condicao, $campo)
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
       $nmgp_saida_form = "form_ficha_cliente_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_ficha_cliente_fim.php";
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
       form_ficha_cliente_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['masterValue']);
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente'][substr($val, 1, -1)];
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['opc_ant'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           form_ficha_cliente_pack_ajax_response();
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
       form_ficha_cliente_pack_ajax_response();
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
}
?>
