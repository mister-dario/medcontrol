<?php
//
class form_FACTURA_bkp_mob_apl
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
   var $razonsocial;
   var $nombrecomercial;
   var $ruc;
   var $coddoc;
   var $estab;
   var $ptoemi;
   var $secuencial;
   var $lote;
   var $dirmatriz;
   var $fechaemision;
   var $direstablecimiento;
   var $numcontribuyenteespecial;
   var $obligadocontabilidad;
   var $tipoidentcomprador;
   var $guiaremision;
   var $razonsocialcomprador;
   var $idcomprador;
   var $totalsinimpuestos;
   var $totaldescuento;
   var $base_12;
   var $base_0;
   var $codimpuesto;
   var $codporcentajeimpuesto;
   var $baseimponible1;
   var $tarifa1;
   var $valor1;
   var $propina;
   var $importetotal;
   var $moneda;
   var $formato;
   var $campoadicional1;
   var $valoradicional1;
   var $campoadicional2;
   var $valoradicional2;
   var $campoadicional3;
   var $valoradicional3;
   var $campoadicional4;
   var $valoradicional4;
   var $campoadicional5;
   var $valoradicional5;
   var $campoadicional6;
   var $valoradicional6;
   var $campoadicional7;
   var $valoradicional7;
   var $campoadicional8;
   var $valoradicional8;
   var $campoadicional9;
   var $valoradicional9;
   var $campoadicional10;
   var $valoradicional10;
   var $campoadicional11;
   var $valoradicional11;
   var $campoadicional12;
   var $valoradicional12;
   var $campoadicional13;
   var $valoradicional13;
   var $campoadicional14;
   var $valoradicional14;
   var $campoadicional15;
   var $valoradicional15;
   var $campoadicional16;
   var $valoradicional16;
   var $campoadicional17;
   var $valoradicional17;
   var $campoadicional18;
   var $valoradicional18;
   var $campoadicional19;
   var $valoradicional19;
   var $campoadicional20;
   var $valoradicional20;
   var $detalle_factura;
   var $num_fact;
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
          if (isset($this->NM_ajax_info['param']['base_0']))
          {
              $this->base_0 = $this->NM_ajax_info['param']['base_0'];
          }
          if (isset($this->NM_ajax_info['param']['base_12']))
          {
              $this->base_12 = $this->NM_ajax_info['param']['base_12'];
          }
          if (isset($this->NM_ajax_info['param']['campoadicional1']))
          {
              $this->campoadicional1 = $this->NM_ajax_info['param']['campoadicional1'];
          }
          if (isset($this->NM_ajax_info['param']['campoadicional10']))
          {
              $this->campoadicional10 = $this->NM_ajax_info['param']['campoadicional10'];
          }
          if (isset($this->NM_ajax_info['param']['campoadicional11']))
          {
              $this->campoadicional11 = $this->NM_ajax_info['param']['campoadicional11'];
          }
          if (isset($this->NM_ajax_info['param']['campoadicional12']))
          {
              $this->campoadicional12 = $this->NM_ajax_info['param']['campoadicional12'];
          }
          if (isset($this->NM_ajax_info['param']['campoadicional13']))
          {
              $this->campoadicional13 = $this->NM_ajax_info['param']['campoadicional13'];
          }
          if (isset($this->NM_ajax_info['param']['campoadicional14']))
          {
              $this->campoadicional14 = $this->NM_ajax_info['param']['campoadicional14'];
          }
          if (isset($this->NM_ajax_info['param']['campoadicional15']))
          {
              $this->campoadicional15 = $this->NM_ajax_info['param']['campoadicional15'];
          }
          if (isset($this->NM_ajax_info['param']['campoadicional16']))
          {
              $this->campoadicional16 = $this->NM_ajax_info['param']['campoadicional16'];
          }
          if (isset($this->NM_ajax_info['param']['campoadicional17']))
          {
              $this->campoadicional17 = $this->NM_ajax_info['param']['campoadicional17'];
          }
          if (isset($this->NM_ajax_info['param']['campoadicional18']))
          {
              $this->campoadicional18 = $this->NM_ajax_info['param']['campoadicional18'];
          }
          if (isset($this->NM_ajax_info['param']['campoadicional19']))
          {
              $this->campoadicional19 = $this->NM_ajax_info['param']['campoadicional19'];
          }
          if (isset($this->NM_ajax_info['param']['campoadicional2']))
          {
              $this->campoadicional2 = $this->NM_ajax_info['param']['campoadicional2'];
          }
          if (isset($this->NM_ajax_info['param']['campoadicional20']))
          {
              $this->campoadicional20 = $this->NM_ajax_info['param']['campoadicional20'];
          }
          if (isset($this->NM_ajax_info['param']['campoadicional3']))
          {
              $this->campoadicional3 = $this->NM_ajax_info['param']['campoadicional3'];
          }
          if (isset($this->NM_ajax_info['param']['campoadicional4']))
          {
              $this->campoadicional4 = $this->NM_ajax_info['param']['campoadicional4'];
          }
          if (isset($this->NM_ajax_info['param']['campoadicional5']))
          {
              $this->campoadicional5 = $this->NM_ajax_info['param']['campoadicional5'];
          }
          if (isset($this->NM_ajax_info['param']['campoadicional6']))
          {
              $this->campoadicional6 = $this->NM_ajax_info['param']['campoadicional6'];
          }
          if (isset($this->NM_ajax_info['param']['campoadicional7']))
          {
              $this->campoadicional7 = $this->NM_ajax_info['param']['campoadicional7'];
          }
          if (isset($this->NM_ajax_info['param']['campoadicional8']))
          {
              $this->campoadicional8 = $this->NM_ajax_info['param']['campoadicional8'];
          }
          if (isset($this->NM_ajax_info['param']['campoadicional9']))
          {
              $this->campoadicional9 = $this->NM_ajax_info['param']['campoadicional9'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['detalle_factura']))
          {
              $this->detalle_factura = $this->NM_ajax_info['param']['detalle_factura'];
          }
          if (isset($this->NM_ajax_info['param']['estab']))
          {
              $this->estab = $this->NM_ajax_info['param']['estab'];
          }
          if (isset($this->NM_ajax_info['param']['fechaemision']))
          {
              $this->fechaemision = $this->NM_ajax_info['param']['fechaemision'];
          }
          if (isset($this->NM_ajax_info['param']['guiaremision']))
          {
              $this->guiaremision = $this->NM_ajax_info['param']['guiaremision'];
          }
          if (isset($this->NM_ajax_info['param']['idcomprador']))
          {
              $this->idcomprador = $this->NM_ajax_info['param']['idcomprador'];
          }
          if (isset($this->NM_ajax_info['param']['importetotal']))
          {
              $this->importetotal = $this->NM_ajax_info['param']['importetotal'];
          }
          if (isset($this->NM_ajax_info['param']['lote']))
          {
              $this->lote = $this->NM_ajax_info['param']['lote'];
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
          if (isset($this->NM_ajax_info['param']['num_fact']))
          {
              $this->num_fact = $this->NM_ajax_info['param']['num_fact'];
          }
          if (isset($this->NM_ajax_info['param']['propina']))
          {
              $this->propina = $this->NM_ajax_info['param']['propina'];
          }
          if (isset($this->NM_ajax_info['param']['ptoemi']))
          {
              $this->ptoemi = $this->NM_ajax_info['param']['ptoemi'];
          }
          if (isset($this->NM_ajax_info['param']['razonsocialcomprador']))
          {
              $this->razonsocialcomprador = $this->NM_ajax_info['param']['razonsocialcomprador'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['secuencial']))
          {
              $this->secuencial = $this->NM_ajax_info['param']['secuencial'];
          }
          if (isset($this->NM_ajax_info['param']['totaldescuento']))
          {
              $this->totaldescuento = $this->NM_ajax_info['param']['totaldescuento'];
          }
          if (isset($this->NM_ajax_info['param']['totalsinimpuestos']))
          {
              $this->totalsinimpuestos = $this->NM_ajax_info['param']['totalsinimpuestos'];
          }
          if (isset($this->NM_ajax_info['param']['valoradicional1']))
          {
              $this->valoradicional1 = $this->NM_ajax_info['param']['valoradicional1'];
          }
          if (isset($this->NM_ajax_info['param']['valoradicional10']))
          {
              $this->valoradicional10 = $this->NM_ajax_info['param']['valoradicional10'];
          }
          if (isset($this->NM_ajax_info['param']['valoradicional11']))
          {
              $this->valoradicional11 = $this->NM_ajax_info['param']['valoradicional11'];
          }
          if (isset($this->NM_ajax_info['param']['valoradicional12']))
          {
              $this->valoradicional12 = $this->NM_ajax_info['param']['valoradicional12'];
          }
          if (isset($this->NM_ajax_info['param']['valoradicional13']))
          {
              $this->valoradicional13 = $this->NM_ajax_info['param']['valoradicional13'];
          }
          if (isset($this->NM_ajax_info['param']['valoradicional14']))
          {
              $this->valoradicional14 = $this->NM_ajax_info['param']['valoradicional14'];
          }
          if (isset($this->NM_ajax_info['param']['valoradicional15']))
          {
              $this->valoradicional15 = $this->NM_ajax_info['param']['valoradicional15'];
          }
          if (isset($this->NM_ajax_info['param']['valoradicional16']))
          {
              $this->valoradicional16 = $this->NM_ajax_info['param']['valoradicional16'];
          }
          if (isset($this->NM_ajax_info['param']['valoradicional17']))
          {
              $this->valoradicional17 = $this->NM_ajax_info['param']['valoradicional17'];
          }
          if (isset($this->NM_ajax_info['param']['valoradicional18']))
          {
              $this->valoradicional18 = $this->NM_ajax_info['param']['valoradicional18'];
          }
          if (isset($this->NM_ajax_info['param']['valoradicional19']))
          {
              $this->valoradicional19 = $this->NM_ajax_info['param']['valoradicional19'];
          }
          if (isset($this->NM_ajax_info['param']['valoradicional2']))
          {
              $this->valoradicional2 = $this->NM_ajax_info['param']['valoradicional2'];
          }
          if (isset($this->NM_ajax_info['param']['valoradicional20']))
          {
              $this->valoradicional20 = $this->NM_ajax_info['param']['valoradicional20'];
          }
          if (isset($this->NM_ajax_info['param']['valoradicional3']))
          {
              $this->valoradicional3 = $this->NM_ajax_info['param']['valoradicional3'];
          }
          if (isset($this->NM_ajax_info['param']['valoradicional4']))
          {
              $this->valoradicional4 = $this->NM_ajax_info['param']['valoradicional4'];
          }
          if (isset($this->NM_ajax_info['param']['valoradicional5']))
          {
              $this->valoradicional5 = $this->NM_ajax_info['param']['valoradicional5'];
          }
          if (isset($this->NM_ajax_info['param']['valoradicional6']))
          {
              $this->valoradicional6 = $this->NM_ajax_info['param']['valoradicional6'];
          }
          if (isset($this->NM_ajax_info['param']['valoradicional7']))
          {
              $this->valoradicional7 = $this->NM_ajax_info['param']['valoradicional7'];
          }
          if (isset($this->NM_ajax_info['param']['valoradicional8']))
          {
              $this->valoradicional8 = $this->NM_ajax_info['param']['valoradicional8'];
          }
          if (isset($this->NM_ajax_info['param']['valoradicional9']))
          {
              $this->valoradicional9 = $this->NM_ajax_info['param']['valoradicional9'];
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
      if (isset($this->v_aplicacion_link) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['v_aplicacion_link'] = $this->v_aplicacion_link;
      }
      if (isset($_POST["v_aplicacion_link"]) && isset($this->v_aplicacion_link)) 
      {
          $_SESSION['v_aplicacion_link'] = $this->v_aplicacion_link;
      }
      if (isset($_GET["v_aplicacion_link"]) && isset($this->v_aplicacion_link)) 
      {
          $_SESSION['v_aplicacion_link'] = $this->v_aplicacion_link;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_FACTURA_bkp_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_FACTURA_bkp_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_FACTURA_bkp_mob']['embutida_parms']);
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
                 nm_limpa_str_form_FACTURA_bkp_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->v_aplicacion_link)) 
          {
              $_SESSION['v_aplicacion_link'] = $this->v_aplicacion_link;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_FACTURA_bkp_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_FACTURA_bkp_mob']['total']);
          }
          if (!isset($_SESSION['sc_session'][$script_case_init]['form_FACTURA_bkp_mob']['total']))
          {
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_FACTURA_bkp_mob']['form_DETALLE_FACTURA_mob_script_case_init'] ]['form_DETALLE_FACTURA_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_FACTURA_bkp_mob']['form_DETALLE_FACTURA_mob_script_case_init'] ]['form_DETALLE_FACTURA_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_FACTURA_bkp_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_FACTURA_bkp_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->v_aplicacion_link)) 
          {
              $_SESSION['v_aplicacion_link'] = $this->v_aplicacion_link;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_FACTURA_bkp_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_FACTURA_bkp_mob']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_FACTURA_bkp_mob']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_FACTURA_bkp_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_FACTURA_bkp_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_FACTURA_bkp_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_FACTURA_bkp_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_FACTURA_bkp_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_FACTURA_bkp_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_FACTURA_bkp_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_FACTURA_bkp_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_FACTURA_bkp_mob']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_FACTURA_bkp_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_FACTURA_bkp_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_FACTURA_bkp_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_FACTURA_bkp_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_FACTURA_bkp_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_FACTURA_bkp_mob']['label'] = "form_FACTURA_bkp_mob";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_FACTURA_bkp_mob")
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


      $this->arr_buttons['redo_xml']['hint']             = "";
      $this->arr_buttons['redo_xml']['type']             = "button";
      $this->arr_buttons['redo_xml']['value']            = "REHACER XML";
      $this->arr_buttons['redo_xml']['display']          = "only_text";
      $this->arr_buttons['redo_xml']['display_position'] = "text_right";
      $this->arr_buttons['redo_xml']['style']            = "default";
      $this->arr_buttons['redo_xml']['image']            = "";


      $_SESSION['scriptcase']['error_icon']['form_FACTURA_bkp_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_FACTURA_bkp_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
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
      $this->nmgp_botoes['redo_xml'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_FACTURA_bkp_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_FACTURA_bkp_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_FACTURA_bkp_mob'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dados_form'];
          if (!isset($this->razonsocial)){$this->razonsocial = $this->nmgp_dados_form['razonsocial'];} 
          if (!isset($this->nombrecomercial)){$this->nombrecomercial = $this->nmgp_dados_form['nombrecomercial'];} 
          if (!isset($this->ruc)){$this->ruc = $this->nmgp_dados_form['ruc'];} 
          if (!isset($this->coddoc)){$this->coddoc = $this->nmgp_dados_form['coddoc'];} 
          if (!isset($this->estab)){$this->estab = $this->nmgp_dados_form['estab'];} 
          if (!isset($this->ptoemi)){$this->ptoemi = $this->nmgp_dados_form['ptoemi'];} 
          if (!isset($this->secuencial)){$this->secuencial = $this->nmgp_dados_form['secuencial'];} 
          if (!isset($this->lote)){$this->lote = $this->nmgp_dados_form['lote'];} 
          if (!isset($this->dirmatriz)){$this->dirmatriz = $this->nmgp_dados_form['dirmatriz'];} 
          if (!isset($this->direstablecimiento)){$this->direstablecimiento = $this->nmgp_dados_form['direstablecimiento'];} 
          if (!isset($this->numcontribuyenteespecial)){$this->numcontribuyenteespecial = $this->nmgp_dados_form['numcontribuyenteespecial'];} 
          if (!isset($this->obligadocontabilidad)){$this->obligadocontabilidad = $this->nmgp_dados_form['obligadocontabilidad'];} 
          if (!isset($this->tipoidentcomprador)){$this->tipoidentcomprador = $this->nmgp_dados_form['tipoidentcomprador'];} 
          if (!isset($this->codimpuesto)){$this->codimpuesto = $this->nmgp_dados_form['codimpuesto'];} 
          if (!isset($this->codporcentajeimpuesto)){$this->codporcentajeimpuesto = $this->nmgp_dados_form['codporcentajeimpuesto'];} 
          if (!isset($this->baseimponible1)){$this->baseimponible1 = $this->nmgp_dados_form['baseimponible1'];} 
          if (!isset($this->tarifa1)){$this->tarifa1 = $this->nmgp_dados_form['tarifa1'];} 
          if (!isset($this->valor1)){$this->valor1 = $this->nmgp_dados_form['valor1'];} 
          if (!isset($this->moneda)){$this->moneda = $this->nmgp_dados_form['moneda'];} 
          if (!isset($this->formato)){$this->formato = $this->nmgp_dados_form['formato'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_FACTURA_bkp_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'form_FACTURA_bkp_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_FACTURA_bkp_mob_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_FACTURA_bkp/form_FACTURA_bkp_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_FACTURA_bkp_mob_erro.class.php"); 
      }
      $this->Erro      = new form_FACTURA_bkp_mob_erro();
      $this->Erro->Ini = $this->Ini;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['opcao']))
         { 
             if ($this->estab != "" || $this->ptoemi != "" || $this->secuencial != "" || $this->lote != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_FACTURA_bkp_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['redo_xml'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['redo_xml'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['botoes']['redo_xml'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dados_form'];
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
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['form_DETALLE_FACTURA_mob_script_case_init'] ]['form_DETALLE_FACTURA_mob']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['form_DETALLE_FACTURA_mob_script_case_init'] ]['form_DETALLE_FACTURA_mob']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['form_DETALLE_FACTURA_mob_script_case_init'] ]['form_DETALLE_FACTURA_mob']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['form_DETALLE_FACTURA_mob_script_case_init'] ]['form_DETALLE_FACTURA_mob']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_DETALLE_FACTURA_mob') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_DETALLE_FACTURA_mob') . "/form_DETALLE_FACTURA_mob_apl.php");
          $this->form_DETALLE_FACTURA_mob = new form_DETALLE_FACTURA_mob_apl;
      }
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      if (isset($this->fechaemision)) { $this->nm_limpa_alfa($this->fechaemision); }
      if (isset($this->guiaremision)) { $this->nm_limpa_alfa($this->guiaremision); }
      if (isset($this->razonsocialcomprador)) { $this->nm_limpa_alfa($this->razonsocialcomprador); }
      if (isset($this->idcomprador)) { $this->nm_limpa_alfa($this->idcomprador); }
      if (isset($this->totalsinimpuestos)) { $this->nm_limpa_alfa($this->totalsinimpuestos); }
      if (isset($this->totaldescuento)) { $this->nm_limpa_alfa($this->totaldescuento); }
      if (isset($this->base_12)) { $this->nm_limpa_alfa($this->base_12); }
      if (isset($this->base_0)) { $this->nm_limpa_alfa($this->base_0); }
      if (isset($this->propina)) { $this->nm_limpa_alfa($this->propina); }
      if (isset($this->importetotal)) { $this->nm_limpa_alfa($this->importetotal); }
      if (isset($this->campoadicional1)) { $this->nm_limpa_alfa($this->campoadicional1); }
      if (isset($this->valoradicional1)) { $this->nm_limpa_alfa($this->valoradicional1); }
      if (isset($this->campoadicional2)) { $this->nm_limpa_alfa($this->campoadicional2); }
      if (isset($this->valoradicional2)) { $this->nm_limpa_alfa($this->valoradicional2); }
      if (isset($this->campoadicional3)) { $this->nm_limpa_alfa($this->campoadicional3); }
      if (isset($this->valoradicional3)) { $this->nm_limpa_alfa($this->valoradicional3); }
      if (isset($this->campoadicional4)) { $this->nm_limpa_alfa($this->campoadicional4); }
      if (isset($this->valoradicional4)) { $this->nm_limpa_alfa($this->valoradicional4); }
      if (isset($this->campoadicional5)) { $this->nm_limpa_alfa($this->campoadicional5); }
      if (isset($this->valoradicional5)) { $this->nm_limpa_alfa($this->valoradicional5); }
      if (isset($this->campoadicional6)) { $this->nm_limpa_alfa($this->campoadicional6); }
      if (isset($this->valoradicional6)) { $this->nm_limpa_alfa($this->valoradicional6); }
      if (isset($this->campoadicional7)) { $this->nm_limpa_alfa($this->campoadicional7); }
      if (isset($this->valoradicional7)) { $this->nm_limpa_alfa($this->valoradicional7); }
      if (isset($this->campoadicional8)) { $this->nm_limpa_alfa($this->campoadicional8); }
      if (isset($this->valoradicional8)) { $this->nm_limpa_alfa($this->valoradicional8); }
      if (isset($this->campoadicional9)) { $this->nm_limpa_alfa($this->campoadicional9); }
      if (isset($this->valoradicional9)) { $this->nm_limpa_alfa($this->valoradicional9); }
      if (isset($this->campoadicional10)) { $this->nm_limpa_alfa($this->campoadicional10); }
      if (isset($this->valoradicional10)) { $this->nm_limpa_alfa($this->valoradicional10); }
      if (isset($this->campoadicional11)) { $this->nm_limpa_alfa($this->campoadicional11); }
      if (isset($this->valoradicional11)) { $this->nm_limpa_alfa($this->valoradicional11); }
      if (isset($this->campoadicional12)) { $this->nm_limpa_alfa($this->campoadicional12); }
      if (isset($this->valoradicional12)) { $this->nm_limpa_alfa($this->valoradicional12); }
      if (isset($this->campoadicional13)) { $this->nm_limpa_alfa($this->campoadicional13); }
      if (isset($this->valoradicional13)) { $this->nm_limpa_alfa($this->valoradicional13); }
      if (isset($this->campoadicional14)) { $this->nm_limpa_alfa($this->campoadicional14); }
      if (isset($this->valoradicional14)) { $this->nm_limpa_alfa($this->valoradicional14); }
      if (isset($this->campoadicional15)) { $this->nm_limpa_alfa($this->campoadicional15); }
      if (isset($this->valoradicional15)) { $this->nm_limpa_alfa($this->valoradicional15); }
      if (isset($this->campoadicional16)) { $this->nm_limpa_alfa($this->campoadicional16); }
      if (isset($this->valoradicional16)) { $this->nm_limpa_alfa($this->valoradicional16); }
      if (isset($this->campoadicional17)) { $this->nm_limpa_alfa($this->campoadicional17); }
      if (isset($this->valoradicional17)) { $this->nm_limpa_alfa($this->valoradicional17); }
      if (isset($this->campoadicional18)) { $this->nm_limpa_alfa($this->campoadicional18); }
      if (isset($this->valoradicional18)) { $this->nm_limpa_alfa($this->valoradicional18); }
      if (isset($this->campoadicional19)) { $this->nm_limpa_alfa($this->campoadicional19); }
      if (isset($this->valoradicional19)) { $this->nm_limpa_alfa($this->valoradicional19); }
      if (isset($this->campoadicional20)) { $this->nm_limpa_alfa($this->campoadicional20); }
      if (isset($this->valoradicional20)) { $this->nm_limpa_alfa($this->valoradicional20); }
      if (isset($this->detalle_factura)) { $this->nm_limpa_alfa($this->detalle_factura); }
      if ($nm_opc_form_php == "formphp")
      { 
          if ($nm_call_php == "redo_xml")
          { 
              $this->sc_btn_redo_xml();
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- totalsinimpuestos
      $this->field_config['totalsinimpuestos']               = array();
      $this->field_config['totalsinimpuestos']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['totalsinimpuestos']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['totalsinimpuestos']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['totalsinimpuestos']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['totalsinimpuestos']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- totaldescuento
      $this->field_config['totaldescuento']               = array();
      $this->field_config['totaldescuento']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['totaldescuento']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['totaldescuento']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['totaldescuento']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['totaldescuento']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- base_12
      $this->field_config['base_12']               = array();
      $this->field_config['base_12']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['base_12']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['base_12']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['base_12']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['base_12']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- base_0
      $this->field_config['base_0']               = array();
      $this->field_config['base_0']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['base_0']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['base_0']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['base_0']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['base_0']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- propina
      $this->field_config['propina']               = array();
      $this->field_config['propina']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['propina']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['propina']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['propina']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['propina']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- importetotal
      $this->field_config['importetotal']               = array();
      $this->field_config['importetotal']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['importetotal']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['importetotal']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['importetotal']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['importetotal']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- coddoc
      $this->field_config['coddoc']               = array();
      $this->field_config['coddoc']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['coddoc']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['coddoc']['symbol_dec'] = '';
      $this->field_config['coddoc']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['coddoc']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- estab
      $this->field_config['estab']               = array();
      $this->field_config['estab']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['estab']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['estab']['symbol_dec'] = '';
      $this->field_config['estab']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['estab']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ptoemi
      $this->field_config['ptoemi']               = array();
      $this->field_config['ptoemi']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ptoemi']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ptoemi']['symbol_dec'] = '';
      $this->field_config['ptoemi']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ptoemi']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- secuencial
      $this->field_config['secuencial']               = array();
      $this->field_config['secuencial']['symbol_grp'] = '';
      $this->field_config['secuencial']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['secuencial']['symbol_dec'] = '';
      $this->field_config['secuencial']['symbol_neg'] = '-';
      $this->field_config['secuencial']['format_neg'] = '4';
      //-- numcontribuyenteespecial
      $this->field_config['numcontribuyenteespecial']               = array();
      $this->field_config['numcontribuyenteespecial']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['numcontribuyenteespecial']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['numcontribuyenteespecial']['symbol_dec'] = '';
      $this->field_config['numcontribuyenteespecial']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['numcontribuyenteespecial']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- tipoidentcomprador
      $this->field_config['tipoidentcomprador']               = array();
      $this->field_config['tipoidentcomprador']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['tipoidentcomprador']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['tipoidentcomprador']['symbol_dec'] = '';
      $this->field_config['tipoidentcomprador']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['tipoidentcomprador']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- codimpuesto
      $this->field_config['codimpuesto']               = array();
      $this->field_config['codimpuesto']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['codimpuesto']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['codimpuesto']['symbol_dec'] = '';
      $this->field_config['codimpuesto']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['codimpuesto']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- codporcentajeimpuesto
      $this->field_config['codporcentajeimpuesto']               = array();
      $this->field_config['codporcentajeimpuesto']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['codporcentajeimpuesto']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['codporcentajeimpuesto']['symbol_dec'] = '';
      $this->field_config['codporcentajeimpuesto']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['codporcentajeimpuesto']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- baseimponible1
      $this->field_config['baseimponible1']               = array();
      $this->field_config['baseimponible1']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['baseimponible1']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['baseimponible1']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['baseimponible1']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['baseimponible1']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- tarifa1
      $this->field_config['tarifa1']               = array();
      $this->field_config['tarifa1']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['tarifa1']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['tarifa1']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['tarifa1']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['tarifa1']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- valor1
      $this->field_config['valor1']               = array();
      $this->field_config['valor1']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['valor1']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['valor1']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['valor1']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['valor1']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- formato
      $this->field_config['formato']               = array();
      $this->field_config['formato']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['formato']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['formato']['symbol_dec'] = '';
      $this->field_config['formato']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['formato']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
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
          if ('validate_num_fact' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_fact');
          }
          if ('validate_fechaemision' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fechaemision');
          }
          if ('validate_guiaremision' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'guiaremision');
          }
          if ('validate_idcomprador' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idcomprador');
          }
          if ('validate_razonsocialcomprador' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'razonsocialcomprador');
          }
          if ('validate_totalsinimpuestos' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'totalsinimpuestos');
          }
          if ('validate_totaldescuento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'totaldescuento');
          }
          if ('validate_base_12' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'base_12');
          }
          if ('validate_base_0' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'base_0');
          }
          if ('validate_propina' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'propina');
          }
          if ('validate_importetotal' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'importetotal');
          }
          if ('validate_campoadicional1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'campoadicional1');
          }
          if ('validate_valoradicional1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valoradicional1');
          }
          if ('validate_campoadicional2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'campoadicional2');
          }
          if ('validate_valoradicional2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valoradicional2');
          }
          if ('validate_campoadicional3' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'campoadicional3');
          }
          if ('validate_valoradicional3' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valoradicional3');
          }
          if ('validate_campoadicional4' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'campoadicional4');
          }
          if ('validate_valoradicional4' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valoradicional4');
          }
          if ('validate_campoadicional5' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'campoadicional5');
          }
          if ('validate_valoradicional5' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valoradicional5');
          }
          if ('validate_campoadicional6' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'campoadicional6');
          }
          if ('validate_valoradicional6' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valoradicional6');
          }
          if ('validate_campoadicional7' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'campoadicional7');
          }
          if ('validate_valoradicional7' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valoradicional7');
          }
          if ('validate_campoadicional8' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'campoadicional8');
          }
          if ('validate_valoradicional8' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valoradicional8');
          }
          if ('validate_campoadicional9' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'campoadicional9');
          }
          if ('validate_valoradicional9' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valoradicional9');
          }
          if ('validate_campoadicional10' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'campoadicional10');
          }
          if ('validate_valoradicional10' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valoradicional10');
          }
          if ('validate_campoadicional11' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'campoadicional11');
          }
          if ('validate_valoradicional11' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valoradicional11');
          }
          if ('validate_campoadicional12' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'campoadicional12');
          }
          if ('validate_valoradicional12' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valoradicional12');
          }
          if ('validate_campoadicional13' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'campoadicional13');
          }
          if ('validate_valoradicional13' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valoradicional13');
          }
          if ('validate_campoadicional14' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'campoadicional14');
          }
          if ('validate_valoradicional14' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valoradicional14');
          }
          if ('validate_campoadicional15' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'campoadicional15');
          }
          if ('validate_valoradicional15' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valoradicional15');
          }
          if ('validate_campoadicional16' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'campoadicional16');
          }
          if ('validate_valoradicional16' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valoradicional16');
          }
          if ('validate_campoadicional17' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'campoadicional17');
          }
          if ('validate_valoradicional17' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valoradicional17');
          }
          if ('validate_campoadicional18' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'campoadicional18');
          }
          if ('validate_valoradicional18' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valoradicional18');
          }
          if ('validate_campoadicional19' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'campoadicional19');
          }
          if ('validate_valoradicional19' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valoradicional19');
          }
          if ('validate_campoadicional20' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'campoadicional20');
          }
          if ('validate_valoradicional20' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valoradicional20');
          }
          if ('validate_detalle_factura' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'detalle_factura');
          }
          form_FACTURA_bkp_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['inline_form_seq'] = $this->sc_seq_row;
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
              form_FACTURA_bkp_mob_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_FACTURA_bkp_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_FACTURA_bkp_mob_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_FACTURA_bkp_mob_pack_ajax_response();
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
          form_FACTURA_bkp_mob_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_FACTURA_bkp_mob.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("") ?></TITLE>
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
<form name="Fdown" method="get" action="form_FACTURA_bkp_mob_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_FACTURA_bkp_mob"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="form_FACTURA_bkp_mob.php" target="_self" style="display: none"> 
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
   function sc_btn_redo_xml() 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      else
      {
          if (!isset($this->estab) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dados_form']['estab']))
          {
              $varloc_btn_php['estab'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dados_form']['estab'];
          }
          if (!isset($this->ptoemi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dados_form']['ptoemi']))
          {
              $varloc_btn_php['ptoemi'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dados_form']['ptoemi'];
          }
          if (!isset($this->secuencial) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dados_form']['secuencial']))
          {
              $varloc_btn_php['secuencial'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dados_form']['secuencial'];
          }
          if (!isset($this->lote) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dados_form']['lote']))
          {
              $varloc_btn_php['lote'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dados_form']['lote'];
          }
          if (!isset($this->citid) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dados_form']['citid']))
          {
              $varloc_btn_php['citid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dados_form']['citid'];
          }
      }
      $nm_f_saida = "form_FACTURA_bkp_mob.php";
      if (!empty($this->field_config['totalsinimpuestos']['symbol_dec']))
      {
          nm_limpa_valor($this->totalsinimpuestos, $this->field_config['totalsinimpuestos']['symbol_dec'], $this->field_config['totalsinimpuestos']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['totaldescuento']['symbol_dec']))
      {
          nm_limpa_valor($this->totaldescuento, $this->field_config['totaldescuento']['symbol_dec'], $this->field_config['totaldescuento']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['base_12']['symbol_dec']))
      {
          nm_limpa_valor($this->base_12, $this->field_config['base_12']['symbol_dec'], $this->field_config['base_12']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['base_0']['symbol_dec']))
      {
          nm_limpa_valor($this->base_0, $this->field_config['base_0']['symbol_dec'], $this->field_config['base_0']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['propina']['symbol_dec']))
      {
          nm_limpa_valor($this->propina, $this->field_config['propina']['symbol_dec'], $this->field_config['propina']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['importetotal']['symbol_dec']))
      {
          nm_limpa_valor($this->importetotal, $this->field_config['importetotal']['symbol_dec'], $this->field_config['importetotal']['symbol_grp']) ; 
      }
      foreach ($varloc_btn_php as $cmp => $val_cmp)
      {
          $this->$cmp = $val_cmp;
      }
      $_SESSION['scriptcase']['form_FACTURA_bkp_mob']['contr_erro'] = 'on';
  if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('blank_crea_xml_fac') . "/", $this->nm_location, "v_estab?#?" . NM_encode_input($this->estab ) . "?@?" . "v_ptoemi?#?" . NM_encode_input($this->ptoemi ) . "?@?" . "v_numfactura?#?" . NM_encode_input($this->secuencial ) . "?@?" . "v_feclote?#?" . NM_encode_input($this->lote ) . "?@?" . "v_numcita?#?" . NM_encode_input($citid ) . "?@?" . "v_app_calling?#?" . NM_encode_input('form_cita') . "?@?","_self", '', 440, 630);
 };
$_SESSION['scriptcase']['form_FACTURA_bkp_mob']['contr_erro'] = 'off'; 
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="estab" value="<?php echo $this->form_encode_input($this->estab) ?>"/>
      <input type=hidden name="ptoemi" value="<?php echo $this->form_encode_input($this->ptoemi) ?>"/>
      <input type=hidden name="secuencial" value="<?php echo $this->form_encode_input($this->secuencial) ?>"/>
      <input type=hidden name="lote" value="<?php echo $this->form_encode_input($this->lote) ?>"/>
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
           case 'num_fact':
               return "NÚMERO";
               break;
           case 'fechaemision':
               return "FECHA DE EMISIÓN";
               break;
           case 'guiaremision':
               return "GUÍA DE REMISIÓN";
               break;
           case 'idcomprador':
               return "RUC";
               break;
           case 'razonsocialcomprador':
               return "RAZÓN SOCIAL";
               break;
           case 'totalsinimpuestos':
               return "TOTAL SIN IMPUESTOS";
               break;
           case 'totaldescuento':
               return "DESCUENTO";
               break;
           case 'base_12':
               return "BASE 12%";
               break;
           case 'base_0':
               return "BASE 0%";
               break;
           case 'propina':
               return "PROPINA";
               break;
           case 'importetotal':
               return "IMPORTE TOTAL";
               break;
           case 'campoadicional1':
               return "CAMPOADICIONAL1";
               break;
           case 'valoradicional1':
               return "VALORADICIONAL1";
               break;
           case 'campoadicional2':
               return "CAMPOADICIONAL2";
               break;
           case 'valoradicional2':
               return "VALORADICIONAL2";
               break;
           case 'campoadicional3':
               return "CAMPOADICIONAL3";
               break;
           case 'valoradicional3':
               return "VALORADICIONAL3";
               break;
           case 'campoadicional4':
               return "CAMPOADICIONAL4";
               break;
           case 'valoradicional4':
               return "VALORADICIONAL4";
               break;
           case 'campoadicional5':
               return "CAMPOADICIONAL5";
               break;
           case 'valoradicional5':
               return "VALORADICIONAL5";
               break;
           case 'campoadicional6':
               return "CAMPOADICIONAL6";
               break;
           case 'valoradicional6':
               return "VALORADICIONAL6";
               break;
           case 'campoadicional7':
               return "CAMPOADICIONAL7";
               break;
           case 'valoradicional7':
               return "VALORADICIONAL7";
               break;
           case 'campoadicional8':
               return "CAMPOADICIONAL8";
               break;
           case 'valoradicional8':
               return "VALORADICIONAL8";
               break;
           case 'campoadicional9':
               return "CAMPOADICIONAL9";
               break;
           case 'valoradicional9':
               return "VALORADICIONAL9";
               break;
           case 'campoadicional10':
               return "CAMPOADICIONAL10";
               break;
           case 'valoradicional10':
               return "VALORADICIONAL10";
               break;
           case 'campoadicional11':
               return "CAMPOADICIONAL11";
               break;
           case 'valoradicional11':
               return "VALORADICIONAL11";
               break;
           case 'campoadicional12':
               return "CAMPOADICIONAL12";
               break;
           case 'valoradicional12':
               return "VALORADICIONAL12";
               break;
           case 'campoadicional13':
               return "CAMPOADICIONAL13";
               break;
           case 'valoradicional13':
               return "VALORADICIONAL13";
               break;
           case 'campoadicional14':
               return "CAMPOADICIONAL14";
               break;
           case 'valoradicional14':
               return "VALORADICIONAL14";
               break;
           case 'campoadicional15':
               return "CAMPOADICIONAL15";
               break;
           case 'valoradicional15':
               return "VALORADICIONAL15";
               break;
           case 'campoadicional16':
               return "CAMPOADICIONAL16";
               break;
           case 'valoradicional16':
               return "VALORADICIONAL16";
               break;
           case 'campoadicional17':
               return "CAMPOADICIONAL17";
               break;
           case 'valoradicional17':
               return "VALORADICIONAL17";
               break;
           case 'campoadicional18':
               return "CAMPOADICIONAL18";
               break;
           case 'valoradicional18':
               return "VALORADICIONAL18";
               break;
           case 'campoadicional19':
               return "CAMPOADICIONAL19";
               break;
           case 'valoradicional19':
               return "VALORADICIONAL19";
               break;
           case 'campoadicional20':
               return "CAMPOADICIONAL20";
               break;
           case 'valoradicional20':
               return "VALORADICIONAL20";
               break;
           case 'detalle_factura':
               return "";
               break;
           case 'razonsocial':
               return "RAZONSOCIAL";
               break;
           case 'nombrecomercial':
               return "NOMBRECOMERCIAL";
               break;
           case 'ruc':
               return "RUC";
               break;
           case 'coddoc':
               return "CODDOC";
               break;
           case 'estab':
               return "ESTAB";
               break;
           case 'ptoemi':
               return "PTOEMI";
               break;
           case 'secuencial':
               return "SECUENCIAL";
               break;
           case 'lote':
               return "LOTE";
               break;
           case 'dirmatriz':
               return "DIRMATRIZ";
               break;
           case 'direstablecimiento':
               return "DIRESTABLECIMIENTO";
               break;
           case 'numcontribuyenteespecial':
               return "NUMCONTRIBUYENTEESPECIAL";
               break;
           case 'obligadocontabilidad':
               return "OBLIGADOCONTABILIDAD";
               break;
           case 'tipoidentcomprador':
               return "TIPOIDENTCOMPRADOR";
               break;
           case 'codimpuesto':
               return "CODIMPUESTO";
               break;
           case 'codporcentajeimpuesto':
               return "CODPORCENTAJEIMPUESTO";
               break;
           case 'baseimponible1':
               return "BASEIMPONIBLE1";
               break;
           case 'tarifa1':
               return "TARIFA1";
               break;
           case 'valor1':
               return "VALOR1";
               break;
           case 'moneda':
               return "MONEDA";
               break;
           case 'formato':
               return "FORMATO";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_FACTURA_bkp_mob']) || !is_array($this->NM_ajax_info['errList']['geral_form_FACTURA_bkp_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_form_FACTURA_bkp_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_FACTURA_bkp_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'num_fact' == $filtro)
        $this->ValidateField_num_fact($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fechaemision' == $filtro)
        $this->ValidateField_fechaemision($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'guiaremision' == $filtro)
        $this->ValidateField_guiaremision($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idcomprador' == $filtro)
        $this->ValidateField_idcomprador($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'razonsocialcomprador' == $filtro)
        $this->ValidateField_razonsocialcomprador($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'totalsinimpuestos' == $filtro)
        $this->ValidateField_totalsinimpuestos($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'totaldescuento' == $filtro)
        $this->ValidateField_totaldescuento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'base_12' == $filtro)
        $this->ValidateField_base_12($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'base_0' == $filtro)
        $this->ValidateField_base_0($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'propina' == $filtro)
        $this->ValidateField_propina($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'importetotal' == $filtro)
        $this->ValidateField_importetotal($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'campoadicional1' == $filtro)
        $this->ValidateField_campoadicional1($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valoradicional1' == $filtro)
        $this->ValidateField_valoradicional1($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'campoadicional2' == $filtro)
        $this->ValidateField_campoadicional2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valoradicional2' == $filtro)
        $this->ValidateField_valoradicional2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'campoadicional3' == $filtro)
        $this->ValidateField_campoadicional3($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valoradicional3' == $filtro)
        $this->ValidateField_valoradicional3($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'campoadicional4' == $filtro)
        $this->ValidateField_campoadicional4($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valoradicional4' == $filtro)
        $this->ValidateField_valoradicional4($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'campoadicional5' == $filtro)
        $this->ValidateField_campoadicional5($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valoradicional5' == $filtro)
        $this->ValidateField_valoradicional5($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'campoadicional6' == $filtro)
        $this->ValidateField_campoadicional6($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valoradicional6' == $filtro)
        $this->ValidateField_valoradicional6($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'campoadicional7' == $filtro)
        $this->ValidateField_campoadicional7($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valoradicional7' == $filtro)
        $this->ValidateField_valoradicional7($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'campoadicional8' == $filtro)
        $this->ValidateField_campoadicional8($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valoradicional8' == $filtro)
        $this->ValidateField_valoradicional8($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'campoadicional9' == $filtro)
        $this->ValidateField_campoadicional9($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valoradicional9' == $filtro)
        $this->ValidateField_valoradicional9($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'campoadicional10' == $filtro)
        $this->ValidateField_campoadicional10($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valoradicional10' == $filtro)
        $this->ValidateField_valoradicional10($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'campoadicional11' == $filtro)
        $this->ValidateField_campoadicional11($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valoradicional11' == $filtro)
        $this->ValidateField_valoradicional11($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'campoadicional12' == $filtro)
        $this->ValidateField_campoadicional12($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valoradicional12' == $filtro)
        $this->ValidateField_valoradicional12($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'campoadicional13' == $filtro)
        $this->ValidateField_campoadicional13($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valoradicional13' == $filtro)
        $this->ValidateField_valoradicional13($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'campoadicional14' == $filtro)
        $this->ValidateField_campoadicional14($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valoradicional14' == $filtro)
        $this->ValidateField_valoradicional14($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'campoadicional15' == $filtro)
        $this->ValidateField_campoadicional15($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valoradicional15' == $filtro)
        $this->ValidateField_valoradicional15($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'campoadicional16' == $filtro)
        $this->ValidateField_campoadicional16($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valoradicional16' == $filtro)
        $this->ValidateField_valoradicional16($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'campoadicional17' == $filtro)
        $this->ValidateField_campoadicional17($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valoradicional17' == $filtro)
        $this->ValidateField_valoradicional17($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'campoadicional18' == $filtro)
        $this->ValidateField_campoadicional18($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valoradicional18' == $filtro)
        $this->ValidateField_valoradicional18($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'campoadicional19' == $filtro)
        $this->ValidateField_campoadicional19($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valoradicional19' == $filtro)
        $this->ValidateField_valoradicional19($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'campoadicional20' == $filtro)
        $this->ValidateField_campoadicional20($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valoradicional20' == $filtro)
        $this->ValidateField_valoradicional20($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'detalle_factura' == $filtro)
        $this->ValidateField_detalle_factura($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_num_fact(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->num_fact) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "NÚMERO " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['num_fact']))
              {
                  $Campos_Erros['num_fact'] = array();
              }
              $Campos_Erros['num_fact'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['num_fact']) || !is_array($this->NM_ajax_info['errList']['num_fact']))
              {
                  $this->NM_ajax_info['errList']['num_fact'] = array();
              }
              $this->NM_ajax_info['errList']['num_fact'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'num_fact';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_num_fact

    function ValidateField_fechaemision(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['fechaemision']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['fechaemision'] == "on")) 
      { 
          if ($this->fechaemision == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "FECHA DE EMISIÓN" ; 
              if (!isset($Campos_Erros['fechaemision']))
              {
                  $Campos_Erros['fechaemision'] = array();
              }
              $Campos_Erros['fechaemision'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['fechaemision']) || !is_array($this->NM_ajax_info['errList']['fechaemision']))
                  {
                      $this->NM_ajax_info['errList']['fechaemision'] = array();
                  }
                  $this->NM_ajax_info['errList']['fechaemision'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->fechaemision) > 10) 
          { 
              $hasError = true;
              $Campos_Crit .= "FECHA DE EMISIÓN " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fechaemision']))
              {
                  $Campos_Erros['fechaemision'] = array();
              }
              $Campos_Erros['fechaemision'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fechaemision']) || !is_array($this->NM_ajax_info['errList']['fechaemision']))
              {
                  $this->NM_ajax_info['errList']['fechaemision'] = array();
              }
              $this->NM_ajax_info['errList']['fechaemision'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fechaemision';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fechaemision

    function ValidateField_guiaremision(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['guiaremision']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['guiaremision'] == "on")) 
      { 
          if ($this->guiaremision == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "GUÍA DE REMISIÓN" ; 
              if (!isset($Campos_Erros['guiaremision']))
              {
                  $Campos_Erros['guiaremision'] = array();
              }
              $Campos_Erros['guiaremision'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['guiaremision']) || !is_array($this->NM_ajax_info['errList']['guiaremision']))
                  {
                      $this->NM_ajax_info['errList']['guiaremision'] = array();
                  }
                  $this->NM_ajax_info['errList']['guiaremision'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->guiaremision) > 17) 
          { 
              $hasError = true;
              $Campos_Crit .= "GUÍA DE REMISIÓN " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 17 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['guiaremision']))
              {
                  $Campos_Erros['guiaremision'] = array();
              }
              $Campos_Erros['guiaremision'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 17 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['guiaremision']) || !is_array($this->NM_ajax_info['errList']['guiaremision']))
              {
                  $this->NM_ajax_info['errList']['guiaremision'] = array();
              }
              $this->NM_ajax_info['errList']['guiaremision'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 17 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'guiaremision';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_guiaremision

    function ValidateField_idcomprador(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['idcomprador']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['idcomprador'] == "on")) 
      { 
          if ($this->idcomprador == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "RUC" ; 
              if (!isset($Campos_Erros['idcomprador']))
              {
                  $Campos_Erros['idcomprador'] = array();
              }
              $Campos_Erros['idcomprador'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['idcomprador']) || !is_array($this->NM_ajax_info['errList']['idcomprador']))
                  {
                      $this->NM_ajax_info['errList']['idcomprador'] = array();
                  }
                  $this->NM_ajax_info['errList']['idcomprador'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->idcomprador) > 13) 
          { 
              $hasError = true;
              $Campos_Crit .= "RUC " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 13 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['idcomprador']))
              {
                  $Campos_Erros['idcomprador'] = array();
              }
              $Campos_Erros['idcomprador'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 13 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['idcomprador']) || !is_array($this->NM_ajax_info['errList']['idcomprador']))
              {
                  $this->NM_ajax_info['errList']['idcomprador'] = array();
              }
              $this->NM_ajax_info['errList']['idcomprador'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 13 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idcomprador';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idcomprador

    function ValidateField_razonsocialcomprador(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['razonsocialcomprador']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['razonsocialcomprador'] == "on")) 
      { 
          if ($this->razonsocialcomprador == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "RAZÓN SOCIAL" ; 
              if (!isset($Campos_Erros['razonsocialcomprador']))
              {
                  $Campos_Erros['razonsocialcomprador'] = array();
              }
              $Campos_Erros['razonsocialcomprador'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['razonsocialcomprador']) || !is_array($this->NM_ajax_info['errList']['razonsocialcomprador']))
                  {
                      $this->NM_ajax_info['errList']['razonsocialcomprador'] = array();
                  }
                  $this->NM_ajax_info['errList']['razonsocialcomprador'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->razonsocialcomprador) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "RAZÓN SOCIAL " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['razonsocialcomprador']))
              {
                  $Campos_Erros['razonsocialcomprador'] = array();
              }
              $Campos_Erros['razonsocialcomprador'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['razonsocialcomprador']) || !is_array($this->NM_ajax_info['errList']['razonsocialcomprador']))
              {
                  $this->NM_ajax_info['errList']['razonsocialcomprador'] = array();
              }
              $this->NM_ajax_info['errList']['razonsocialcomprador'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'razonsocialcomprador';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_razonsocialcomprador

    function ValidateField_totalsinimpuestos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['totalsinimpuestos']['symbol_dec']))
      {
          nm_limpa_valor($this->totalsinimpuestos, $this->field_config['totalsinimpuestos']['symbol_dec'], $this->field_config['totalsinimpuestos']['symbol_grp']) ; 
          if ('.' == substr($this->totalsinimpuestos, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->totalsinimpuestos, 1)))
              {
                  $this->totalsinimpuestos = '';
              }
              else
              {
                  $this->totalsinimpuestos = '0' . $this->totalsinimpuestos;
              }
          }
      }
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->totalsinimpuestos != '')  
          { 
              $iTestSize = 13;
              if ('-' == substr($this->totalsinimpuestos, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->totalsinimpuestos, -1))
              {
                  $iTestSize++;
                  $this->totalsinimpuestos = '-' . substr($this->totalsinimpuestos, 0, -1);
              }
              if (strlen($this->totalsinimpuestos) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "TOTAL SIN IMPUESTOS: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['totalsinimpuestos']))
                  {
                      $Campos_Erros['totalsinimpuestos'] = array();
                  }
                  $Campos_Erros['totalsinimpuestos'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['totalsinimpuestos']) || !is_array($this->NM_ajax_info['errList']['totalsinimpuestos']))
                  {
                      $this->NM_ajax_info['errList']['totalsinimpuestos'] = array();
                  }
                  $this->NM_ajax_info['errList']['totalsinimpuestos'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->totalsinimpuestos, 10, 2, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "TOTAL SIN IMPUESTOS; " ; 
                  if (!isset($Campos_Erros['totalsinimpuestos']))
                  {
                      $Campos_Erros['totalsinimpuestos'] = array();
                  }
                  $Campos_Erros['totalsinimpuestos'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['totalsinimpuestos']) || !is_array($this->NM_ajax_info['errList']['totalsinimpuestos']))
                  {
                      $this->NM_ajax_info['errList']['totalsinimpuestos'] = array();
                  }
                  $this->NM_ajax_info['errList']['totalsinimpuestos'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['totalsinimpuestos']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['totalsinimpuestos'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "TOTAL SIN IMPUESTOS" ; 
              if (!isset($Campos_Erros['totalsinimpuestos']))
              {
                  $Campos_Erros['totalsinimpuestos'] = array();
              }
              $Campos_Erros['totalsinimpuestos'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['totalsinimpuestos']) || !is_array($this->NM_ajax_info['errList']['totalsinimpuestos']))
                  {
                      $this->NM_ajax_info['errList']['totalsinimpuestos'] = array();
                  }
                  $this->NM_ajax_info['errList']['totalsinimpuestos'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'totalsinimpuestos';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_totalsinimpuestos

    function ValidateField_totaldescuento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['totaldescuento']['symbol_dec']))
      {
          nm_limpa_valor($this->totaldescuento, $this->field_config['totaldescuento']['symbol_dec'], $this->field_config['totaldescuento']['symbol_grp']) ; 
          if ('.' == substr($this->totaldescuento, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->totaldescuento, 1)))
              {
                  $this->totaldescuento = '';
              }
              else
              {
                  $this->totaldescuento = '0' . $this->totaldescuento;
              }
          }
      }
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->totaldescuento != '')  
          { 
              $iTestSize = 13;
              if ('-' == substr($this->totaldescuento, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->totaldescuento, -1))
              {
                  $iTestSize++;
                  $this->totaldescuento = '-' . substr($this->totaldescuento, 0, -1);
              }
              if (strlen($this->totaldescuento) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "DESCUENTO: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['totaldescuento']))
                  {
                      $Campos_Erros['totaldescuento'] = array();
                  }
                  $Campos_Erros['totaldescuento'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['totaldescuento']) || !is_array($this->NM_ajax_info['errList']['totaldescuento']))
                  {
                      $this->NM_ajax_info['errList']['totaldescuento'] = array();
                  }
                  $this->NM_ajax_info['errList']['totaldescuento'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->totaldescuento, 10, 2, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "DESCUENTO; " ; 
                  if (!isset($Campos_Erros['totaldescuento']))
                  {
                      $Campos_Erros['totaldescuento'] = array();
                  }
                  $Campos_Erros['totaldescuento'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['totaldescuento']) || !is_array($this->NM_ajax_info['errList']['totaldescuento']))
                  {
                      $this->NM_ajax_info['errList']['totaldescuento'] = array();
                  }
                  $this->NM_ajax_info['errList']['totaldescuento'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['totaldescuento']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['totaldescuento'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "DESCUENTO" ; 
              if (!isset($Campos_Erros['totaldescuento']))
              {
                  $Campos_Erros['totaldescuento'] = array();
              }
              $Campos_Erros['totaldescuento'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['totaldescuento']) || !is_array($this->NM_ajax_info['errList']['totaldescuento']))
                  {
                      $this->NM_ajax_info['errList']['totaldescuento'] = array();
                  }
                  $this->NM_ajax_info['errList']['totaldescuento'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'totaldescuento';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_totaldescuento

    function ValidateField_base_12(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['base_12']['symbol_dec']))
      {
          nm_limpa_valor($this->base_12, $this->field_config['base_12']['symbol_dec'], $this->field_config['base_12']['symbol_grp']) ; 
          if ('.' == substr($this->base_12, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->base_12, 1)))
              {
                  $this->base_12 = '';
              }
              else
              {
                  $this->base_12 = '0' . $this->base_12;
              }
          }
      }
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->base_12 != '')  
          { 
              $iTestSize = 13;
              if ('-' == substr($this->base_12, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->base_12, -1))
              {
                  $iTestSize++;
                  $this->base_12 = '-' . substr($this->base_12, 0, -1);
              }
              if (strlen($this->base_12) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "BASE 12%: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['base_12']))
                  {
                      $Campos_Erros['base_12'] = array();
                  }
                  $Campos_Erros['base_12'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['base_12']) || !is_array($this->NM_ajax_info['errList']['base_12']))
                  {
                      $this->NM_ajax_info['errList']['base_12'] = array();
                  }
                  $this->NM_ajax_info['errList']['base_12'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->base_12, 10, 2, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "BASE 12%; " ; 
                  if (!isset($Campos_Erros['base_12']))
                  {
                      $Campos_Erros['base_12'] = array();
                  }
                  $Campos_Erros['base_12'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['base_12']) || !is_array($this->NM_ajax_info['errList']['base_12']))
                  {
                      $this->NM_ajax_info['errList']['base_12'] = array();
                  }
                  $this->NM_ajax_info['errList']['base_12'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['base_12']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['base_12'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "BASE 12%" ; 
              if (!isset($Campos_Erros['base_12']))
              {
                  $Campos_Erros['base_12'] = array();
              }
              $Campos_Erros['base_12'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['base_12']) || !is_array($this->NM_ajax_info['errList']['base_12']))
                  {
                      $this->NM_ajax_info['errList']['base_12'] = array();
                  }
                  $this->NM_ajax_info['errList']['base_12'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'base_12';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_base_12

    function ValidateField_base_0(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['base_0']['symbol_dec']))
      {
          nm_limpa_valor($this->base_0, $this->field_config['base_0']['symbol_dec'], $this->field_config['base_0']['symbol_grp']) ; 
          if ('.' == substr($this->base_0, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->base_0, 1)))
              {
                  $this->base_0 = '';
              }
              else
              {
                  $this->base_0 = '0' . $this->base_0;
              }
          }
      }
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->base_0 != '')  
          { 
              $iTestSize = 13;
              if ('-' == substr($this->base_0, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->base_0, -1))
              {
                  $iTestSize++;
                  $this->base_0 = '-' . substr($this->base_0, 0, -1);
              }
              if (strlen($this->base_0) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "BASE 0%: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['base_0']))
                  {
                      $Campos_Erros['base_0'] = array();
                  }
                  $Campos_Erros['base_0'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['base_0']) || !is_array($this->NM_ajax_info['errList']['base_0']))
                  {
                      $this->NM_ajax_info['errList']['base_0'] = array();
                  }
                  $this->NM_ajax_info['errList']['base_0'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->base_0, 10, 2, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "BASE 0%; " ; 
                  if (!isset($Campos_Erros['base_0']))
                  {
                      $Campos_Erros['base_0'] = array();
                  }
                  $Campos_Erros['base_0'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['base_0']) || !is_array($this->NM_ajax_info['errList']['base_0']))
                  {
                      $this->NM_ajax_info['errList']['base_0'] = array();
                  }
                  $this->NM_ajax_info['errList']['base_0'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['base_0']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['base_0'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "BASE 0%" ; 
              if (!isset($Campos_Erros['base_0']))
              {
                  $Campos_Erros['base_0'] = array();
              }
              $Campos_Erros['base_0'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['base_0']) || !is_array($this->NM_ajax_info['errList']['base_0']))
                  {
                      $this->NM_ajax_info['errList']['base_0'] = array();
                  }
                  $this->NM_ajax_info['errList']['base_0'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'base_0';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_base_0

    function ValidateField_propina(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['propina']['symbol_dec']))
      {
          nm_limpa_valor($this->propina, $this->field_config['propina']['symbol_dec'], $this->field_config['propina']['symbol_grp']) ; 
          if ('.' == substr($this->propina, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->propina, 1)))
              {
                  $this->propina = '';
              }
              else
              {
                  $this->propina = '0' . $this->propina;
              }
          }
      }
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->propina != '')  
          { 
              $iTestSize = 13;
              if ('-' == substr($this->propina, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->propina, -1))
              {
                  $iTestSize++;
                  $this->propina = '-' . substr($this->propina, 0, -1);
              }
              if (strlen($this->propina) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "PROPINA: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['propina']))
                  {
                      $Campos_Erros['propina'] = array();
                  }
                  $Campos_Erros['propina'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['propina']) || !is_array($this->NM_ajax_info['errList']['propina']))
                  {
                      $this->NM_ajax_info['errList']['propina'] = array();
                  }
                  $this->NM_ajax_info['errList']['propina'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->propina, 10, 2, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "PROPINA; " ; 
                  if (!isset($Campos_Erros['propina']))
                  {
                      $Campos_Erros['propina'] = array();
                  }
                  $Campos_Erros['propina'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['propina']) || !is_array($this->NM_ajax_info['errList']['propina']))
                  {
                      $this->NM_ajax_info['errList']['propina'] = array();
                  }
                  $this->NM_ajax_info['errList']['propina'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['propina']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['propina'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "PROPINA" ; 
              if (!isset($Campos_Erros['propina']))
              {
                  $Campos_Erros['propina'] = array();
              }
              $Campos_Erros['propina'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['propina']) || !is_array($this->NM_ajax_info['errList']['propina']))
                  {
                      $this->NM_ajax_info['errList']['propina'] = array();
                  }
                  $this->NM_ajax_info['errList']['propina'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'propina';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_propina

    function ValidateField_importetotal(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['importetotal']['symbol_dec']))
      {
          nm_limpa_valor($this->importetotal, $this->field_config['importetotal']['symbol_dec'], $this->field_config['importetotal']['symbol_grp']) ; 
          if ('.' == substr($this->importetotal, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->importetotal, 1)))
              {
                  $this->importetotal = '';
              }
              else
              {
                  $this->importetotal = '0' . $this->importetotal;
              }
          }
      }
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->importetotal != '')  
          { 
              $iTestSize = 13;
              if ('-' == substr($this->importetotal, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->importetotal, -1))
              {
                  $iTestSize++;
                  $this->importetotal = '-' . substr($this->importetotal, 0, -1);
              }
              if (strlen($this->importetotal) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "IMPORTE TOTAL: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['importetotal']))
                  {
                      $Campos_Erros['importetotal'] = array();
                  }
                  $Campos_Erros['importetotal'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['importetotal']) || !is_array($this->NM_ajax_info['errList']['importetotal']))
                  {
                      $this->NM_ajax_info['errList']['importetotal'] = array();
                  }
                  $this->NM_ajax_info['errList']['importetotal'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->importetotal, 10, 2, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "IMPORTE TOTAL; " ; 
                  if (!isset($Campos_Erros['importetotal']))
                  {
                      $Campos_Erros['importetotal'] = array();
                  }
                  $Campos_Erros['importetotal'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['importetotal']) || !is_array($this->NM_ajax_info['errList']['importetotal']))
                  {
                      $this->NM_ajax_info['errList']['importetotal'] = array();
                  }
                  $this->NM_ajax_info['errList']['importetotal'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['importetotal']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['importetotal'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "IMPORTE TOTAL" ; 
              if (!isset($Campos_Erros['importetotal']))
              {
                  $Campos_Erros['importetotal'] = array();
              }
              $Campos_Erros['importetotal'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['importetotal']) || !is_array($this->NM_ajax_info['errList']['importetotal']))
                  {
                      $this->NM_ajax_info['errList']['importetotal'] = array();
                  }
                  $this->NM_ajax_info['errList']['importetotal'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'importetotal';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_importetotal

    function ValidateField_campoadicional1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional1']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional1'] == "on")) 
      { 
          if ($this->campoadicional1 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "CAMPOADICIONAL1" ; 
              if (!isset($Campos_Erros['campoadicional1']))
              {
                  $Campos_Erros['campoadicional1'] = array();
              }
              $Campos_Erros['campoadicional1'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['campoadicional1']) || !is_array($this->NM_ajax_info['errList']['campoadicional1']))
                  {
                      $this->NM_ajax_info['errList']['campoadicional1'] = array();
                  }
                  $this->NM_ajax_info['errList']['campoadicional1'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->campoadicional1) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "CAMPOADICIONAL1 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['campoadicional1']))
              {
                  $Campos_Erros['campoadicional1'] = array();
              }
              $Campos_Erros['campoadicional1'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['campoadicional1']) || !is_array($this->NM_ajax_info['errList']['campoadicional1']))
              {
                  $this->NM_ajax_info['errList']['campoadicional1'] = array();
              }
              $this->NM_ajax_info['errList']['campoadicional1'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'campoadicional1';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_campoadicional1

    function ValidateField_valoradicional1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional1']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional1'] == "on")) 
      { 
          if ($this->valoradicional1 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "VALORADICIONAL1" ; 
              if (!isset($Campos_Erros['valoradicional1']))
              {
                  $Campos_Erros['valoradicional1'] = array();
              }
              $Campos_Erros['valoradicional1'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['valoradicional1']) || !is_array($this->NM_ajax_info['errList']['valoradicional1']))
                  {
                      $this->NM_ajax_info['errList']['valoradicional1'] = array();
                  }
                  $this->NM_ajax_info['errList']['valoradicional1'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->valoradicional1) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "VALORADICIONAL1 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['valoradicional1']))
              {
                  $Campos_Erros['valoradicional1'] = array();
              }
              $Campos_Erros['valoradicional1'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['valoradicional1']) || !is_array($this->NM_ajax_info['errList']['valoradicional1']))
              {
                  $this->NM_ajax_info['errList']['valoradicional1'] = array();
              }
              $this->NM_ajax_info['errList']['valoradicional1'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valoradicional1';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valoradicional1

    function ValidateField_campoadicional2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional2']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional2'] == "on")) 
      { 
          if ($this->campoadicional2 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "CAMPOADICIONAL2" ; 
              if (!isset($Campos_Erros['campoadicional2']))
              {
                  $Campos_Erros['campoadicional2'] = array();
              }
              $Campos_Erros['campoadicional2'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['campoadicional2']) || !is_array($this->NM_ajax_info['errList']['campoadicional2']))
                  {
                      $this->NM_ajax_info['errList']['campoadicional2'] = array();
                  }
                  $this->NM_ajax_info['errList']['campoadicional2'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->campoadicional2) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "CAMPOADICIONAL2 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['campoadicional2']))
              {
                  $Campos_Erros['campoadicional2'] = array();
              }
              $Campos_Erros['campoadicional2'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['campoadicional2']) || !is_array($this->NM_ajax_info['errList']['campoadicional2']))
              {
                  $this->NM_ajax_info['errList']['campoadicional2'] = array();
              }
              $this->NM_ajax_info['errList']['campoadicional2'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'campoadicional2';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_campoadicional2

    function ValidateField_valoradicional2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional2']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional2'] == "on")) 
      { 
          if ($this->valoradicional2 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "VALORADICIONAL2" ; 
              if (!isset($Campos_Erros['valoradicional2']))
              {
                  $Campos_Erros['valoradicional2'] = array();
              }
              $Campos_Erros['valoradicional2'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['valoradicional2']) || !is_array($this->NM_ajax_info['errList']['valoradicional2']))
                  {
                      $this->NM_ajax_info['errList']['valoradicional2'] = array();
                  }
                  $this->NM_ajax_info['errList']['valoradicional2'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->valoradicional2) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "VALORADICIONAL2 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['valoradicional2']))
              {
                  $Campos_Erros['valoradicional2'] = array();
              }
              $Campos_Erros['valoradicional2'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['valoradicional2']) || !is_array($this->NM_ajax_info['errList']['valoradicional2']))
              {
                  $this->NM_ajax_info['errList']['valoradicional2'] = array();
              }
              $this->NM_ajax_info['errList']['valoradicional2'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valoradicional2';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valoradicional2

    function ValidateField_campoadicional3(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional3']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional3'] == "on")) 
      { 
          if ($this->campoadicional3 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "CAMPOADICIONAL3" ; 
              if (!isset($Campos_Erros['campoadicional3']))
              {
                  $Campos_Erros['campoadicional3'] = array();
              }
              $Campos_Erros['campoadicional3'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['campoadicional3']) || !is_array($this->NM_ajax_info['errList']['campoadicional3']))
                  {
                      $this->NM_ajax_info['errList']['campoadicional3'] = array();
                  }
                  $this->NM_ajax_info['errList']['campoadicional3'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->campoadicional3) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "CAMPOADICIONAL3 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['campoadicional3']))
              {
                  $Campos_Erros['campoadicional3'] = array();
              }
              $Campos_Erros['campoadicional3'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['campoadicional3']) || !is_array($this->NM_ajax_info['errList']['campoadicional3']))
              {
                  $this->NM_ajax_info['errList']['campoadicional3'] = array();
              }
              $this->NM_ajax_info['errList']['campoadicional3'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'campoadicional3';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_campoadicional3

    function ValidateField_valoradicional3(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional3']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional3'] == "on")) 
      { 
          if ($this->valoradicional3 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "VALORADICIONAL3" ; 
              if (!isset($Campos_Erros['valoradicional3']))
              {
                  $Campos_Erros['valoradicional3'] = array();
              }
              $Campos_Erros['valoradicional3'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['valoradicional3']) || !is_array($this->NM_ajax_info['errList']['valoradicional3']))
                  {
                      $this->NM_ajax_info['errList']['valoradicional3'] = array();
                  }
                  $this->NM_ajax_info['errList']['valoradicional3'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->valoradicional3) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "VALORADICIONAL3 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['valoradicional3']))
              {
                  $Campos_Erros['valoradicional3'] = array();
              }
              $Campos_Erros['valoradicional3'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['valoradicional3']) || !is_array($this->NM_ajax_info['errList']['valoradicional3']))
              {
                  $this->NM_ajax_info['errList']['valoradicional3'] = array();
              }
              $this->NM_ajax_info['errList']['valoradicional3'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valoradicional3';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valoradicional3

    function ValidateField_campoadicional4(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional4']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional4'] == "on")) 
      { 
          if ($this->campoadicional4 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "CAMPOADICIONAL4" ; 
              if (!isset($Campos_Erros['campoadicional4']))
              {
                  $Campos_Erros['campoadicional4'] = array();
              }
              $Campos_Erros['campoadicional4'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['campoadicional4']) || !is_array($this->NM_ajax_info['errList']['campoadicional4']))
                  {
                      $this->NM_ajax_info['errList']['campoadicional4'] = array();
                  }
                  $this->NM_ajax_info['errList']['campoadicional4'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->campoadicional4) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "CAMPOADICIONAL4 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['campoadicional4']))
              {
                  $Campos_Erros['campoadicional4'] = array();
              }
              $Campos_Erros['campoadicional4'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['campoadicional4']) || !is_array($this->NM_ajax_info['errList']['campoadicional4']))
              {
                  $this->NM_ajax_info['errList']['campoadicional4'] = array();
              }
              $this->NM_ajax_info['errList']['campoadicional4'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'campoadicional4';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_campoadicional4

    function ValidateField_valoradicional4(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional4']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional4'] == "on")) 
      { 
          if ($this->valoradicional4 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "VALORADICIONAL4" ; 
              if (!isset($Campos_Erros['valoradicional4']))
              {
                  $Campos_Erros['valoradicional4'] = array();
              }
              $Campos_Erros['valoradicional4'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['valoradicional4']) || !is_array($this->NM_ajax_info['errList']['valoradicional4']))
                  {
                      $this->NM_ajax_info['errList']['valoradicional4'] = array();
                  }
                  $this->NM_ajax_info['errList']['valoradicional4'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->valoradicional4) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "VALORADICIONAL4 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['valoradicional4']))
              {
                  $Campos_Erros['valoradicional4'] = array();
              }
              $Campos_Erros['valoradicional4'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['valoradicional4']) || !is_array($this->NM_ajax_info['errList']['valoradicional4']))
              {
                  $this->NM_ajax_info['errList']['valoradicional4'] = array();
              }
              $this->NM_ajax_info['errList']['valoradicional4'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valoradicional4';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valoradicional4

    function ValidateField_campoadicional5(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional5']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional5'] == "on")) 
      { 
          if ($this->campoadicional5 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "CAMPOADICIONAL5" ; 
              if (!isset($Campos_Erros['campoadicional5']))
              {
                  $Campos_Erros['campoadicional5'] = array();
              }
              $Campos_Erros['campoadicional5'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['campoadicional5']) || !is_array($this->NM_ajax_info['errList']['campoadicional5']))
                  {
                      $this->NM_ajax_info['errList']['campoadicional5'] = array();
                  }
                  $this->NM_ajax_info['errList']['campoadicional5'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->campoadicional5) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "CAMPOADICIONAL5 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['campoadicional5']))
              {
                  $Campos_Erros['campoadicional5'] = array();
              }
              $Campos_Erros['campoadicional5'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['campoadicional5']) || !is_array($this->NM_ajax_info['errList']['campoadicional5']))
              {
                  $this->NM_ajax_info['errList']['campoadicional5'] = array();
              }
              $this->NM_ajax_info['errList']['campoadicional5'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'campoadicional5';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_campoadicional5

    function ValidateField_valoradicional5(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional5']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional5'] == "on")) 
      { 
          if ($this->valoradicional5 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "VALORADICIONAL5" ; 
              if (!isset($Campos_Erros['valoradicional5']))
              {
                  $Campos_Erros['valoradicional5'] = array();
              }
              $Campos_Erros['valoradicional5'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['valoradicional5']) || !is_array($this->NM_ajax_info['errList']['valoradicional5']))
                  {
                      $this->NM_ajax_info['errList']['valoradicional5'] = array();
                  }
                  $this->NM_ajax_info['errList']['valoradicional5'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->valoradicional5) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "VALORADICIONAL5 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['valoradicional5']))
              {
                  $Campos_Erros['valoradicional5'] = array();
              }
              $Campos_Erros['valoradicional5'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['valoradicional5']) || !is_array($this->NM_ajax_info['errList']['valoradicional5']))
              {
                  $this->NM_ajax_info['errList']['valoradicional5'] = array();
              }
              $this->NM_ajax_info['errList']['valoradicional5'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valoradicional5';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valoradicional5

    function ValidateField_campoadicional6(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional6']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional6'] == "on")) 
      { 
          if ($this->campoadicional6 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "CAMPOADICIONAL6" ; 
              if (!isset($Campos_Erros['campoadicional6']))
              {
                  $Campos_Erros['campoadicional6'] = array();
              }
              $Campos_Erros['campoadicional6'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['campoadicional6']) || !is_array($this->NM_ajax_info['errList']['campoadicional6']))
                  {
                      $this->NM_ajax_info['errList']['campoadicional6'] = array();
                  }
                  $this->NM_ajax_info['errList']['campoadicional6'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->campoadicional6) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "CAMPOADICIONAL6 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['campoadicional6']))
              {
                  $Campos_Erros['campoadicional6'] = array();
              }
              $Campos_Erros['campoadicional6'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['campoadicional6']) || !is_array($this->NM_ajax_info['errList']['campoadicional6']))
              {
                  $this->NM_ajax_info['errList']['campoadicional6'] = array();
              }
              $this->NM_ajax_info['errList']['campoadicional6'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'campoadicional6';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_campoadicional6

    function ValidateField_valoradicional6(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional6']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional6'] == "on")) 
      { 
          if ($this->valoradicional6 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "VALORADICIONAL6" ; 
              if (!isset($Campos_Erros['valoradicional6']))
              {
                  $Campos_Erros['valoradicional6'] = array();
              }
              $Campos_Erros['valoradicional6'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['valoradicional6']) || !is_array($this->NM_ajax_info['errList']['valoradicional6']))
                  {
                      $this->NM_ajax_info['errList']['valoradicional6'] = array();
                  }
                  $this->NM_ajax_info['errList']['valoradicional6'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->valoradicional6) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "VALORADICIONAL6 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['valoradicional6']))
              {
                  $Campos_Erros['valoradicional6'] = array();
              }
              $Campos_Erros['valoradicional6'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['valoradicional6']) || !is_array($this->NM_ajax_info['errList']['valoradicional6']))
              {
                  $this->NM_ajax_info['errList']['valoradicional6'] = array();
              }
              $this->NM_ajax_info['errList']['valoradicional6'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valoradicional6';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valoradicional6

    function ValidateField_campoadicional7(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional7']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional7'] == "on")) 
      { 
          if ($this->campoadicional7 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "CAMPOADICIONAL7" ; 
              if (!isset($Campos_Erros['campoadicional7']))
              {
                  $Campos_Erros['campoadicional7'] = array();
              }
              $Campos_Erros['campoadicional7'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['campoadicional7']) || !is_array($this->NM_ajax_info['errList']['campoadicional7']))
                  {
                      $this->NM_ajax_info['errList']['campoadicional7'] = array();
                  }
                  $this->NM_ajax_info['errList']['campoadicional7'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->campoadicional7) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "CAMPOADICIONAL7 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['campoadicional7']))
              {
                  $Campos_Erros['campoadicional7'] = array();
              }
              $Campos_Erros['campoadicional7'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['campoadicional7']) || !is_array($this->NM_ajax_info['errList']['campoadicional7']))
              {
                  $this->NM_ajax_info['errList']['campoadicional7'] = array();
              }
              $this->NM_ajax_info['errList']['campoadicional7'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'campoadicional7';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_campoadicional7

    function ValidateField_valoradicional7(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional7']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional7'] == "on")) 
      { 
          if ($this->valoradicional7 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "VALORADICIONAL7" ; 
              if (!isset($Campos_Erros['valoradicional7']))
              {
                  $Campos_Erros['valoradicional7'] = array();
              }
              $Campos_Erros['valoradicional7'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['valoradicional7']) || !is_array($this->NM_ajax_info['errList']['valoradicional7']))
                  {
                      $this->NM_ajax_info['errList']['valoradicional7'] = array();
                  }
                  $this->NM_ajax_info['errList']['valoradicional7'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->valoradicional7) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "VALORADICIONAL7 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['valoradicional7']))
              {
                  $Campos_Erros['valoradicional7'] = array();
              }
              $Campos_Erros['valoradicional7'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['valoradicional7']) || !is_array($this->NM_ajax_info['errList']['valoradicional7']))
              {
                  $this->NM_ajax_info['errList']['valoradicional7'] = array();
              }
              $this->NM_ajax_info['errList']['valoradicional7'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valoradicional7';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valoradicional7

    function ValidateField_campoadicional8(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional8']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional8'] == "on")) 
      { 
          if ($this->campoadicional8 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "CAMPOADICIONAL8" ; 
              if (!isset($Campos_Erros['campoadicional8']))
              {
                  $Campos_Erros['campoadicional8'] = array();
              }
              $Campos_Erros['campoadicional8'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['campoadicional8']) || !is_array($this->NM_ajax_info['errList']['campoadicional8']))
                  {
                      $this->NM_ajax_info['errList']['campoadicional8'] = array();
                  }
                  $this->NM_ajax_info['errList']['campoadicional8'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->campoadicional8) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "CAMPOADICIONAL8 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['campoadicional8']))
              {
                  $Campos_Erros['campoadicional8'] = array();
              }
              $Campos_Erros['campoadicional8'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['campoadicional8']) || !is_array($this->NM_ajax_info['errList']['campoadicional8']))
              {
                  $this->NM_ajax_info['errList']['campoadicional8'] = array();
              }
              $this->NM_ajax_info['errList']['campoadicional8'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'campoadicional8';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_campoadicional8

    function ValidateField_valoradicional8(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional8']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional8'] == "on")) 
      { 
          if ($this->valoradicional8 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "VALORADICIONAL8" ; 
              if (!isset($Campos_Erros['valoradicional8']))
              {
                  $Campos_Erros['valoradicional8'] = array();
              }
              $Campos_Erros['valoradicional8'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['valoradicional8']) || !is_array($this->NM_ajax_info['errList']['valoradicional8']))
                  {
                      $this->NM_ajax_info['errList']['valoradicional8'] = array();
                  }
                  $this->NM_ajax_info['errList']['valoradicional8'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->valoradicional8) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "VALORADICIONAL8 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['valoradicional8']))
              {
                  $Campos_Erros['valoradicional8'] = array();
              }
              $Campos_Erros['valoradicional8'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['valoradicional8']) || !is_array($this->NM_ajax_info['errList']['valoradicional8']))
              {
                  $this->NM_ajax_info['errList']['valoradicional8'] = array();
              }
              $this->NM_ajax_info['errList']['valoradicional8'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valoradicional8';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valoradicional8

    function ValidateField_campoadicional9(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional9']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional9'] == "on")) 
      { 
          if ($this->campoadicional9 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "CAMPOADICIONAL9" ; 
              if (!isset($Campos_Erros['campoadicional9']))
              {
                  $Campos_Erros['campoadicional9'] = array();
              }
              $Campos_Erros['campoadicional9'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['campoadicional9']) || !is_array($this->NM_ajax_info['errList']['campoadicional9']))
                  {
                      $this->NM_ajax_info['errList']['campoadicional9'] = array();
                  }
                  $this->NM_ajax_info['errList']['campoadicional9'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->campoadicional9) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "CAMPOADICIONAL9 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['campoadicional9']))
              {
                  $Campos_Erros['campoadicional9'] = array();
              }
              $Campos_Erros['campoadicional9'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['campoadicional9']) || !is_array($this->NM_ajax_info['errList']['campoadicional9']))
              {
                  $this->NM_ajax_info['errList']['campoadicional9'] = array();
              }
              $this->NM_ajax_info['errList']['campoadicional9'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'campoadicional9';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_campoadicional9

    function ValidateField_valoradicional9(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional9']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional9'] == "on")) 
      { 
          if ($this->valoradicional9 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "VALORADICIONAL9" ; 
              if (!isset($Campos_Erros['valoradicional9']))
              {
                  $Campos_Erros['valoradicional9'] = array();
              }
              $Campos_Erros['valoradicional9'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['valoradicional9']) || !is_array($this->NM_ajax_info['errList']['valoradicional9']))
                  {
                      $this->NM_ajax_info['errList']['valoradicional9'] = array();
                  }
                  $this->NM_ajax_info['errList']['valoradicional9'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->valoradicional9) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "VALORADICIONAL9 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['valoradicional9']))
              {
                  $Campos_Erros['valoradicional9'] = array();
              }
              $Campos_Erros['valoradicional9'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['valoradicional9']) || !is_array($this->NM_ajax_info['errList']['valoradicional9']))
              {
                  $this->NM_ajax_info['errList']['valoradicional9'] = array();
              }
              $this->NM_ajax_info['errList']['valoradicional9'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valoradicional9';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valoradicional9

    function ValidateField_campoadicional10(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional10']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional10'] == "on")) 
      { 
          if ($this->campoadicional10 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "CAMPOADICIONAL10" ; 
              if (!isset($Campos_Erros['campoadicional10']))
              {
                  $Campos_Erros['campoadicional10'] = array();
              }
              $Campos_Erros['campoadicional10'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['campoadicional10']) || !is_array($this->NM_ajax_info['errList']['campoadicional10']))
                  {
                      $this->NM_ajax_info['errList']['campoadicional10'] = array();
                  }
                  $this->NM_ajax_info['errList']['campoadicional10'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->campoadicional10) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "CAMPOADICIONAL10 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['campoadicional10']))
              {
                  $Campos_Erros['campoadicional10'] = array();
              }
              $Campos_Erros['campoadicional10'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['campoadicional10']) || !is_array($this->NM_ajax_info['errList']['campoadicional10']))
              {
                  $this->NM_ajax_info['errList']['campoadicional10'] = array();
              }
              $this->NM_ajax_info['errList']['campoadicional10'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'campoadicional10';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_campoadicional10

    function ValidateField_valoradicional10(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional10']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional10'] == "on")) 
      { 
          if ($this->valoradicional10 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "VALORADICIONAL10" ; 
              if (!isset($Campos_Erros['valoradicional10']))
              {
                  $Campos_Erros['valoradicional10'] = array();
              }
              $Campos_Erros['valoradicional10'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['valoradicional10']) || !is_array($this->NM_ajax_info['errList']['valoradicional10']))
                  {
                      $this->NM_ajax_info['errList']['valoradicional10'] = array();
                  }
                  $this->NM_ajax_info['errList']['valoradicional10'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->valoradicional10) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "VALORADICIONAL10 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['valoradicional10']))
              {
                  $Campos_Erros['valoradicional10'] = array();
              }
              $Campos_Erros['valoradicional10'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['valoradicional10']) || !is_array($this->NM_ajax_info['errList']['valoradicional10']))
              {
                  $this->NM_ajax_info['errList']['valoradicional10'] = array();
              }
              $this->NM_ajax_info['errList']['valoradicional10'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valoradicional10';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valoradicional10

    function ValidateField_campoadicional11(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional11']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional11'] == "on")) 
      { 
          if ($this->campoadicional11 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "CAMPOADICIONAL11" ; 
              if (!isset($Campos_Erros['campoadicional11']))
              {
                  $Campos_Erros['campoadicional11'] = array();
              }
              $Campos_Erros['campoadicional11'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['campoadicional11']) || !is_array($this->NM_ajax_info['errList']['campoadicional11']))
                  {
                      $this->NM_ajax_info['errList']['campoadicional11'] = array();
                  }
                  $this->NM_ajax_info['errList']['campoadicional11'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->campoadicional11) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "CAMPOADICIONAL11 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['campoadicional11']))
              {
                  $Campos_Erros['campoadicional11'] = array();
              }
              $Campos_Erros['campoadicional11'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['campoadicional11']) || !is_array($this->NM_ajax_info['errList']['campoadicional11']))
              {
                  $this->NM_ajax_info['errList']['campoadicional11'] = array();
              }
              $this->NM_ajax_info['errList']['campoadicional11'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'campoadicional11';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_campoadicional11

    function ValidateField_valoradicional11(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional11']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional11'] == "on")) 
      { 
          if ($this->valoradicional11 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "VALORADICIONAL11" ; 
              if (!isset($Campos_Erros['valoradicional11']))
              {
                  $Campos_Erros['valoradicional11'] = array();
              }
              $Campos_Erros['valoradicional11'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['valoradicional11']) || !is_array($this->NM_ajax_info['errList']['valoradicional11']))
                  {
                      $this->NM_ajax_info['errList']['valoradicional11'] = array();
                  }
                  $this->NM_ajax_info['errList']['valoradicional11'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->valoradicional11) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "VALORADICIONAL11 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['valoradicional11']))
              {
                  $Campos_Erros['valoradicional11'] = array();
              }
              $Campos_Erros['valoradicional11'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['valoradicional11']) || !is_array($this->NM_ajax_info['errList']['valoradicional11']))
              {
                  $this->NM_ajax_info['errList']['valoradicional11'] = array();
              }
              $this->NM_ajax_info['errList']['valoradicional11'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valoradicional11';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valoradicional11

    function ValidateField_campoadicional12(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional12']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional12'] == "on")) 
      { 
          if ($this->campoadicional12 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "CAMPOADICIONAL12" ; 
              if (!isset($Campos_Erros['campoadicional12']))
              {
                  $Campos_Erros['campoadicional12'] = array();
              }
              $Campos_Erros['campoadicional12'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['campoadicional12']) || !is_array($this->NM_ajax_info['errList']['campoadicional12']))
                  {
                      $this->NM_ajax_info['errList']['campoadicional12'] = array();
                  }
                  $this->NM_ajax_info['errList']['campoadicional12'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->campoadicional12) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "CAMPOADICIONAL12 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['campoadicional12']))
              {
                  $Campos_Erros['campoadicional12'] = array();
              }
              $Campos_Erros['campoadicional12'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['campoadicional12']) || !is_array($this->NM_ajax_info['errList']['campoadicional12']))
              {
                  $this->NM_ajax_info['errList']['campoadicional12'] = array();
              }
              $this->NM_ajax_info['errList']['campoadicional12'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'campoadicional12';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_campoadicional12

    function ValidateField_valoradicional12(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional12']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional12'] == "on")) 
      { 
          if ($this->valoradicional12 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "VALORADICIONAL12" ; 
              if (!isset($Campos_Erros['valoradicional12']))
              {
                  $Campos_Erros['valoradicional12'] = array();
              }
              $Campos_Erros['valoradicional12'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['valoradicional12']) || !is_array($this->NM_ajax_info['errList']['valoradicional12']))
                  {
                      $this->NM_ajax_info['errList']['valoradicional12'] = array();
                  }
                  $this->NM_ajax_info['errList']['valoradicional12'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->valoradicional12) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "VALORADICIONAL12 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['valoradicional12']))
              {
                  $Campos_Erros['valoradicional12'] = array();
              }
              $Campos_Erros['valoradicional12'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['valoradicional12']) || !is_array($this->NM_ajax_info['errList']['valoradicional12']))
              {
                  $this->NM_ajax_info['errList']['valoradicional12'] = array();
              }
              $this->NM_ajax_info['errList']['valoradicional12'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valoradicional12';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valoradicional12

    function ValidateField_campoadicional13(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional13']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional13'] == "on")) 
      { 
          if ($this->campoadicional13 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "CAMPOADICIONAL13" ; 
              if (!isset($Campos_Erros['campoadicional13']))
              {
                  $Campos_Erros['campoadicional13'] = array();
              }
              $Campos_Erros['campoadicional13'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['campoadicional13']) || !is_array($this->NM_ajax_info['errList']['campoadicional13']))
                  {
                      $this->NM_ajax_info['errList']['campoadicional13'] = array();
                  }
                  $this->NM_ajax_info['errList']['campoadicional13'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->campoadicional13) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "CAMPOADICIONAL13 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['campoadicional13']))
              {
                  $Campos_Erros['campoadicional13'] = array();
              }
              $Campos_Erros['campoadicional13'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['campoadicional13']) || !is_array($this->NM_ajax_info['errList']['campoadicional13']))
              {
                  $this->NM_ajax_info['errList']['campoadicional13'] = array();
              }
              $this->NM_ajax_info['errList']['campoadicional13'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'campoadicional13';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_campoadicional13

    function ValidateField_valoradicional13(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional13']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional13'] == "on")) 
      { 
          if ($this->valoradicional13 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "VALORADICIONAL13" ; 
              if (!isset($Campos_Erros['valoradicional13']))
              {
                  $Campos_Erros['valoradicional13'] = array();
              }
              $Campos_Erros['valoradicional13'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['valoradicional13']) || !is_array($this->NM_ajax_info['errList']['valoradicional13']))
                  {
                      $this->NM_ajax_info['errList']['valoradicional13'] = array();
                  }
                  $this->NM_ajax_info['errList']['valoradicional13'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->valoradicional13) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "VALORADICIONAL13 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['valoradicional13']))
              {
                  $Campos_Erros['valoradicional13'] = array();
              }
              $Campos_Erros['valoradicional13'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['valoradicional13']) || !is_array($this->NM_ajax_info['errList']['valoradicional13']))
              {
                  $this->NM_ajax_info['errList']['valoradicional13'] = array();
              }
              $this->NM_ajax_info['errList']['valoradicional13'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valoradicional13';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valoradicional13

    function ValidateField_campoadicional14(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional14']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional14'] == "on")) 
      { 
          if ($this->campoadicional14 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "CAMPOADICIONAL14" ; 
              if (!isset($Campos_Erros['campoadicional14']))
              {
                  $Campos_Erros['campoadicional14'] = array();
              }
              $Campos_Erros['campoadicional14'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['campoadicional14']) || !is_array($this->NM_ajax_info['errList']['campoadicional14']))
                  {
                      $this->NM_ajax_info['errList']['campoadicional14'] = array();
                  }
                  $this->NM_ajax_info['errList']['campoadicional14'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->campoadicional14) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "CAMPOADICIONAL14 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['campoadicional14']))
              {
                  $Campos_Erros['campoadicional14'] = array();
              }
              $Campos_Erros['campoadicional14'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['campoadicional14']) || !is_array($this->NM_ajax_info['errList']['campoadicional14']))
              {
                  $this->NM_ajax_info['errList']['campoadicional14'] = array();
              }
              $this->NM_ajax_info['errList']['campoadicional14'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'campoadicional14';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_campoadicional14

    function ValidateField_valoradicional14(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional14']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional14'] == "on")) 
      { 
          if ($this->valoradicional14 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "VALORADICIONAL14" ; 
              if (!isset($Campos_Erros['valoradicional14']))
              {
                  $Campos_Erros['valoradicional14'] = array();
              }
              $Campos_Erros['valoradicional14'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['valoradicional14']) || !is_array($this->NM_ajax_info['errList']['valoradicional14']))
                  {
                      $this->NM_ajax_info['errList']['valoradicional14'] = array();
                  }
                  $this->NM_ajax_info['errList']['valoradicional14'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->valoradicional14) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "VALORADICIONAL14 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['valoradicional14']))
              {
                  $Campos_Erros['valoradicional14'] = array();
              }
              $Campos_Erros['valoradicional14'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['valoradicional14']) || !is_array($this->NM_ajax_info['errList']['valoradicional14']))
              {
                  $this->NM_ajax_info['errList']['valoradicional14'] = array();
              }
              $this->NM_ajax_info['errList']['valoradicional14'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valoradicional14';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valoradicional14

    function ValidateField_campoadicional15(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional15']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional15'] == "on")) 
      { 
          if ($this->campoadicional15 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "CAMPOADICIONAL15" ; 
              if (!isset($Campos_Erros['campoadicional15']))
              {
                  $Campos_Erros['campoadicional15'] = array();
              }
              $Campos_Erros['campoadicional15'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['campoadicional15']) || !is_array($this->NM_ajax_info['errList']['campoadicional15']))
                  {
                      $this->NM_ajax_info['errList']['campoadicional15'] = array();
                  }
                  $this->NM_ajax_info['errList']['campoadicional15'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->campoadicional15) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "CAMPOADICIONAL15 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['campoadicional15']))
              {
                  $Campos_Erros['campoadicional15'] = array();
              }
              $Campos_Erros['campoadicional15'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['campoadicional15']) || !is_array($this->NM_ajax_info['errList']['campoadicional15']))
              {
                  $this->NM_ajax_info['errList']['campoadicional15'] = array();
              }
              $this->NM_ajax_info['errList']['campoadicional15'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'campoadicional15';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_campoadicional15

    function ValidateField_valoradicional15(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional15']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional15'] == "on")) 
      { 
          if ($this->valoradicional15 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "VALORADICIONAL15" ; 
              if (!isset($Campos_Erros['valoradicional15']))
              {
                  $Campos_Erros['valoradicional15'] = array();
              }
              $Campos_Erros['valoradicional15'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['valoradicional15']) || !is_array($this->NM_ajax_info['errList']['valoradicional15']))
                  {
                      $this->NM_ajax_info['errList']['valoradicional15'] = array();
                  }
                  $this->NM_ajax_info['errList']['valoradicional15'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->valoradicional15) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "VALORADICIONAL15 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['valoradicional15']))
              {
                  $Campos_Erros['valoradicional15'] = array();
              }
              $Campos_Erros['valoradicional15'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['valoradicional15']) || !is_array($this->NM_ajax_info['errList']['valoradicional15']))
              {
                  $this->NM_ajax_info['errList']['valoradicional15'] = array();
              }
              $this->NM_ajax_info['errList']['valoradicional15'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valoradicional15';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valoradicional15

    function ValidateField_campoadicional16(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional16']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional16'] == "on")) 
      { 
          if ($this->campoadicional16 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "CAMPOADICIONAL16" ; 
              if (!isset($Campos_Erros['campoadicional16']))
              {
                  $Campos_Erros['campoadicional16'] = array();
              }
              $Campos_Erros['campoadicional16'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['campoadicional16']) || !is_array($this->NM_ajax_info['errList']['campoadicional16']))
                  {
                      $this->NM_ajax_info['errList']['campoadicional16'] = array();
                  }
                  $this->NM_ajax_info['errList']['campoadicional16'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->campoadicional16) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "CAMPOADICIONAL16 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['campoadicional16']))
              {
                  $Campos_Erros['campoadicional16'] = array();
              }
              $Campos_Erros['campoadicional16'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['campoadicional16']) || !is_array($this->NM_ajax_info['errList']['campoadicional16']))
              {
                  $this->NM_ajax_info['errList']['campoadicional16'] = array();
              }
              $this->NM_ajax_info['errList']['campoadicional16'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'campoadicional16';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_campoadicional16

    function ValidateField_valoradicional16(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional16']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional16'] == "on")) 
      { 
          if ($this->valoradicional16 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "VALORADICIONAL16" ; 
              if (!isset($Campos_Erros['valoradicional16']))
              {
                  $Campos_Erros['valoradicional16'] = array();
              }
              $Campos_Erros['valoradicional16'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['valoradicional16']) || !is_array($this->NM_ajax_info['errList']['valoradicional16']))
                  {
                      $this->NM_ajax_info['errList']['valoradicional16'] = array();
                  }
                  $this->NM_ajax_info['errList']['valoradicional16'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->valoradicional16) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "VALORADICIONAL16 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['valoradicional16']))
              {
                  $Campos_Erros['valoradicional16'] = array();
              }
              $Campos_Erros['valoradicional16'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['valoradicional16']) || !is_array($this->NM_ajax_info['errList']['valoradicional16']))
              {
                  $this->NM_ajax_info['errList']['valoradicional16'] = array();
              }
              $this->NM_ajax_info['errList']['valoradicional16'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valoradicional16';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valoradicional16

    function ValidateField_campoadicional17(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional17']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional17'] == "on")) 
      { 
          if ($this->campoadicional17 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "CAMPOADICIONAL17" ; 
              if (!isset($Campos_Erros['campoadicional17']))
              {
                  $Campos_Erros['campoadicional17'] = array();
              }
              $Campos_Erros['campoadicional17'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['campoadicional17']) || !is_array($this->NM_ajax_info['errList']['campoadicional17']))
                  {
                      $this->NM_ajax_info['errList']['campoadicional17'] = array();
                  }
                  $this->NM_ajax_info['errList']['campoadicional17'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->campoadicional17) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "CAMPOADICIONAL17 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['campoadicional17']))
              {
                  $Campos_Erros['campoadicional17'] = array();
              }
              $Campos_Erros['campoadicional17'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['campoadicional17']) || !is_array($this->NM_ajax_info['errList']['campoadicional17']))
              {
                  $this->NM_ajax_info['errList']['campoadicional17'] = array();
              }
              $this->NM_ajax_info['errList']['campoadicional17'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'campoadicional17';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_campoadicional17

    function ValidateField_valoradicional17(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional17']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional17'] == "on")) 
      { 
          if ($this->valoradicional17 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "VALORADICIONAL17" ; 
              if (!isset($Campos_Erros['valoradicional17']))
              {
                  $Campos_Erros['valoradicional17'] = array();
              }
              $Campos_Erros['valoradicional17'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['valoradicional17']) || !is_array($this->NM_ajax_info['errList']['valoradicional17']))
                  {
                      $this->NM_ajax_info['errList']['valoradicional17'] = array();
                  }
                  $this->NM_ajax_info['errList']['valoradicional17'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->valoradicional17) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "VALORADICIONAL17 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['valoradicional17']))
              {
                  $Campos_Erros['valoradicional17'] = array();
              }
              $Campos_Erros['valoradicional17'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['valoradicional17']) || !is_array($this->NM_ajax_info['errList']['valoradicional17']))
              {
                  $this->NM_ajax_info['errList']['valoradicional17'] = array();
              }
              $this->NM_ajax_info['errList']['valoradicional17'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valoradicional17';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valoradicional17

    function ValidateField_campoadicional18(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional18']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional18'] == "on")) 
      { 
          if ($this->campoadicional18 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "CAMPOADICIONAL18" ; 
              if (!isset($Campos_Erros['campoadicional18']))
              {
                  $Campos_Erros['campoadicional18'] = array();
              }
              $Campos_Erros['campoadicional18'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['campoadicional18']) || !is_array($this->NM_ajax_info['errList']['campoadicional18']))
                  {
                      $this->NM_ajax_info['errList']['campoadicional18'] = array();
                  }
                  $this->NM_ajax_info['errList']['campoadicional18'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->campoadicional18) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "CAMPOADICIONAL18 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['campoadicional18']))
              {
                  $Campos_Erros['campoadicional18'] = array();
              }
              $Campos_Erros['campoadicional18'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['campoadicional18']) || !is_array($this->NM_ajax_info['errList']['campoadicional18']))
              {
                  $this->NM_ajax_info['errList']['campoadicional18'] = array();
              }
              $this->NM_ajax_info['errList']['campoadicional18'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'campoadicional18';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_campoadicional18

    function ValidateField_valoradicional18(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional18']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional18'] == "on")) 
      { 
          if ($this->valoradicional18 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "VALORADICIONAL18" ; 
              if (!isset($Campos_Erros['valoradicional18']))
              {
                  $Campos_Erros['valoradicional18'] = array();
              }
              $Campos_Erros['valoradicional18'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['valoradicional18']) || !is_array($this->NM_ajax_info['errList']['valoradicional18']))
                  {
                      $this->NM_ajax_info['errList']['valoradicional18'] = array();
                  }
                  $this->NM_ajax_info['errList']['valoradicional18'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->valoradicional18) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "VALORADICIONAL18 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['valoradicional18']))
              {
                  $Campos_Erros['valoradicional18'] = array();
              }
              $Campos_Erros['valoradicional18'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['valoradicional18']) || !is_array($this->NM_ajax_info['errList']['valoradicional18']))
              {
                  $this->NM_ajax_info['errList']['valoradicional18'] = array();
              }
              $this->NM_ajax_info['errList']['valoradicional18'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valoradicional18';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valoradicional18

    function ValidateField_campoadicional19(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional19']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional19'] == "on")) 
      { 
          if ($this->campoadicional19 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "CAMPOADICIONAL19" ; 
              if (!isset($Campos_Erros['campoadicional19']))
              {
                  $Campos_Erros['campoadicional19'] = array();
              }
              $Campos_Erros['campoadicional19'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['campoadicional19']) || !is_array($this->NM_ajax_info['errList']['campoadicional19']))
                  {
                      $this->NM_ajax_info['errList']['campoadicional19'] = array();
                  }
                  $this->NM_ajax_info['errList']['campoadicional19'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->campoadicional19) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "CAMPOADICIONAL19 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['campoadicional19']))
              {
                  $Campos_Erros['campoadicional19'] = array();
              }
              $Campos_Erros['campoadicional19'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['campoadicional19']) || !is_array($this->NM_ajax_info['errList']['campoadicional19']))
              {
                  $this->NM_ajax_info['errList']['campoadicional19'] = array();
              }
              $this->NM_ajax_info['errList']['campoadicional19'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'campoadicional19';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_campoadicional19

    function ValidateField_valoradicional19(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional19']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional19'] == "on")) 
      { 
          if ($this->valoradicional19 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "VALORADICIONAL19" ; 
              if (!isset($Campos_Erros['valoradicional19']))
              {
                  $Campos_Erros['valoradicional19'] = array();
              }
              $Campos_Erros['valoradicional19'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['valoradicional19']) || !is_array($this->NM_ajax_info['errList']['valoradicional19']))
                  {
                      $this->NM_ajax_info['errList']['valoradicional19'] = array();
                  }
                  $this->NM_ajax_info['errList']['valoradicional19'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->valoradicional19) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "VALORADICIONAL19 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['valoradicional19']))
              {
                  $Campos_Erros['valoradicional19'] = array();
              }
              $Campos_Erros['valoradicional19'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['valoradicional19']) || !is_array($this->NM_ajax_info['errList']['valoradicional19']))
              {
                  $this->NM_ajax_info['errList']['valoradicional19'] = array();
              }
              $this->NM_ajax_info['errList']['valoradicional19'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valoradicional19';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valoradicional19

    function ValidateField_campoadicional20(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional20']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['campoadicional20'] == "on")) 
      { 
          if ($this->campoadicional20 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "CAMPOADICIONAL20" ; 
              if (!isset($Campos_Erros['campoadicional20']))
              {
                  $Campos_Erros['campoadicional20'] = array();
              }
              $Campos_Erros['campoadicional20'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['campoadicional20']) || !is_array($this->NM_ajax_info['errList']['campoadicional20']))
                  {
                      $this->NM_ajax_info['errList']['campoadicional20'] = array();
                  }
                  $this->NM_ajax_info['errList']['campoadicional20'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->campoadicional20) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "CAMPOADICIONAL20 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['campoadicional20']))
              {
                  $Campos_Erros['campoadicional20'] = array();
              }
              $Campos_Erros['campoadicional20'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['campoadicional20']) || !is_array($this->NM_ajax_info['errList']['campoadicional20']))
              {
                  $this->NM_ajax_info['errList']['campoadicional20'] = array();
              }
              $this->NM_ajax_info['errList']['campoadicional20'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'campoadicional20';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_campoadicional20

    function ValidateField_valoradicional20(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional20']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['php_cmp_required']['valoradicional20'] == "on")) 
      { 
          if ($this->valoradicional20 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "VALORADICIONAL20" ; 
              if (!isset($Campos_Erros['valoradicional20']))
              {
                  $Campos_Erros['valoradicional20'] = array();
              }
              $Campos_Erros['valoradicional20'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['valoradicional20']) || !is_array($this->NM_ajax_info['errList']['valoradicional20']))
                  {
                      $this->NM_ajax_info['errList']['valoradicional20'] = array();
                  }
                  $this->NM_ajax_info['errList']['valoradicional20'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->valoradicional20) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "VALORADICIONAL20 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['valoradicional20']))
              {
                  $Campos_Erros['valoradicional20'] = array();
              }
              $Campos_Erros['valoradicional20'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['valoradicional20']) || !is_array($this->NM_ajax_info['errList']['valoradicional20']))
              {
                  $this->NM_ajax_info['errList']['valoradicional20'] = array();
              }
              $this->NM_ajax_info['errList']['valoradicional20'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valoradicional20';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valoradicional20

    function ValidateField_detalle_factura(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->detalle_factura) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'detalle_factura';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_detalle_factura

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
    $this->nmgp_dados_form['num_fact'] = $this->num_fact;
    $this->nmgp_dados_form['fechaemision'] = $this->fechaemision;
    $this->nmgp_dados_form['guiaremision'] = $this->guiaremision;
    $this->nmgp_dados_form['idcomprador'] = $this->idcomprador;
    $this->nmgp_dados_form['razonsocialcomprador'] = $this->razonsocialcomprador;
    $this->nmgp_dados_form['totalsinimpuestos'] = $this->totalsinimpuestos;
    $this->nmgp_dados_form['totaldescuento'] = $this->totaldescuento;
    $this->nmgp_dados_form['base_12'] = $this->base_12;
    $this->nmgp_dados_form['base_0'] = $this->base_0;
    $this->nmgp_dados_form['propina'] = $this->propina;
    $this->nmgp_dados_form['importetotal'] = $this->importetotal;
    $this->nmgp_dados_form['campoadicional1'] = $this->campoadicional1;
    $this->nmgp_dados_form['valoradicional1'] = $this->valoradicional1;
    $this->nmgp_dados_form['campoadicional2'] = $this->campoadicional2;
    $this->nmgp_dados_form['valoradicional2'] = $this->valoradicional2;
    $this->nmgp_dados_form['campoadicional3'] = $this->campoadicional3;
    $this->nmgp_dados_form['valoradicional3'] = $this->valoradicional3;
    $this->nmgp_dados_form['campoadicional4'] = $this->campoadicional4;
    $this->nmgp_dados_form['valoradicional4'] = $this->valoradicional4;
    $this->nmgp_dados_form['campoadicional5'] = $this->campoadicional5;
    $this->nmgp_dados_form['valoradicional5'] = $this->valoradicional5;
    $this->nmgp_dados_form['campoadicional6'] = $this->campoadicional6;
    $this->nmgp_dados_form['valoradicional6'] = $this->valoradicional6;
    $this->nmgp_dados_form['campoadicional7'] = $this->campoadicional7;
    $this->nmgp_dados_form['valoradicional7'] = $this->valoradicional7;
    $this->nmgp_dados_form['campoadicional8'] = $this->campoadicional8;
    $this->nmgp_dados_form['valoradicional8'] = $this->valoradicional8;
    $this->nmgp_dados_form['campoadicional9'] = $this->campoadicional9;
    $this->nmgp_dados_form['valoradicional9'] = $this->valoradicional9;
    $this->nmgp_dados_form['campoadicional10'] = $this->campoadicional10;
    $this->nmgp_dados_form['valoradicional10'] = $this->valoradicional10;
    $this->nmgp_dados_form['campoadicional11'] = $this->campoadicional11;
    $this->nmgp_dados_form['valoradicional11'] = $this->valoradicional11;
    $this->nmgp_dados_form['campoadicional12'] = $this->campoadicional12;
    $this->nmgp_dados_form['valoradicional12'] = $this->valoradicional12;
    $this->nmgp_dados_form['campoadicional13'] = $this->campoadicional13;
    $this->nmgp_dados_form['valoradicional13'] = $this->valoradicional13;
    $this->nmgp_dados_form['campoadicional14'] = $this->campoadicional14;
    $this->nmgp_dados_form['valoradicional14'] = $this->valoradicional14;
    $this->nmgp_dados_form['campoadicional15'] = $this->campoadicional15;
    $this->nmgp_dados_form['valoradicional15'] = $this->valoradicional15;
    $this->nmgp_dados_form['campoadicional16'] = $this->campoadicional16;
    $this->nmgp_dados_form['valoradicional16'] = $this->valoradicional16;
    $this->nmgp_dados_form['campoadicional17'] = $this->campoadicional17;
    $this->nmgp_dados_form['valoradicional17'] = $this->valoradicional17;
    $this->nmgp_dados_form['campoadicional18'] = $this->campoadicional18;
    $this->nmgp_dados_form['valoradicional18'] = $this->valoradicional18;
    $this->nmgp_dados_form['campoadicional19'] = $this->campoadicional19;
    $this->nmgp_dados_form['valoradicional19'] = $this->valoradicional19;
    $this->nmgp_dados_form['campoadicional20'] = $this->campoadicional20;
    $this->nmgp_dados_form['valoradicional20'] = $this->valoradicional20;
    $this->nmgp_dados_form['detalle_factura'] = $this->detalle_factura;
    $this->nmgp_dados_form['razonsocial'] = $this->razonsocial;
    $this->nmgp_dados_form['nombrecomercial'] = $this->nombrecomercial;
    $this->nmgp_dados_form['ruc'] = $this->ruc;
    $this->nmgp_dados_form['coddoc'] = $this->coddoc;
    $this->nmgp_dados_form['estab'] = $this->estab;
    $this->nmgp_dados_form['ptoemi'] = $this->ptoemi;
    $this->nmgp_dados_form['secuencial'] = $this->secuencial;
    $this->nmgp_dados_form['lote'] = $this->lote;
    $this->nmgp_dados_form['dirmatriz'] = $this->dirmatriz;
    $this->nmgp_dados_form['direstablecimiento'] = $this->direstablecimiento;
    $this->nmgp_dados_form['numcontribuyenteespecial'] = $this->numcontribuyenteespecial;
    $this->nmgp_dados_form['obligadocontabilidad'] = $this->obligadocontabilidad;
    $this->nmgp_dados_form['tipoidentcomprador'] = $this->tipoidentcomprador;
    $this->nmgp_dados_form['codimpuesto'] = $this->codimpuesto;
    $this->nmgp_dados_form['codporcentajeimpuesto'] = $this->codporcentajeimpuesto;
    $this->nmgp_dados_form['baseimponible1'] = $this->baseimponible1;
    $this->nmgp_dados_form['tarifa1'] = $this->tarifa1;
    $this->nmgp_dados_form['valor1'] = $this->valor1;
    $this->nmgp_dados_form['moneda'] = $this->moneda;
    $this->nmgp_dados_form['formato'] = $this->formato;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['totalsinimpuestos'] = $this->totalsinimpuestos;
      if (!empty($this->field_config['totalsinimpuestos']['symbol_dec']))
      {
         nm_limpa_valor($this->totalsinimpuestos, $this->field_config['totalsinimpuestos']['symbol_dec'], $this->field_config['totalsinimpuestos']['symbol_grp']);
      }
      $this->Before_unformat['totaldescuento'] = $this->totaldescuento;
      if (!empty($this->field_config['totaldescuento']['symbol_dec']))
      {
         nm_limpa_valor($this->totaldescuento, $this->field_config['totaldescuento']['symbol_dec'], $this->field_config['totaldescuento']['symbol_grp']);
      }
      $this->Before_unformat['base_12'] = $this->base_12;
      if (!empty($this->field_config['base_12']['symbol_dec']))
      {
         nm_limpa_valor($this->base_12, $this->field_config['base_12']['symbol_dec'], $this->field_config['base_12']['symbol_grp']);
      }
      $this->Before_unformat['base_0'] = $this->base_0;
      if (!empty($this->field_config['base_0']['symbol_dec']))
      {
         nm_limpa_valor($this->base_0, $this->field_config['base_0']['symbol_dec'], $this->field_config['base_0']['symbol_grp']);
      }
      $this->Before_unformat['propina'] = $this->propina;
      if (!empty($this->field_config['propina']['symbol_dec']))
      {
         nm_limpa_valor($this->propina, $this->field_config['propina']['symbol_dec'], $this->field_config['propina']['symbol_grp']);
      }
      $this->Before_unformat['importetotal'] = $this->importetotal;
      if (!empty($this->field_config['importetotal']['symbol_dec']))
      {
         nm_limpa_valor($this->importetotal, $this->field_config['importetotal']['symbol_dec'], $this->field_config['importetotal']['symbol_grp']);
      }
      $this->Before_unformat['coddoc'] = $this->coddoc;
      nm_limpa_numero($this->coddoc, $this->field_config['coddoc']['symbol_grp']) ; 
      $this->Before_unformat['estab'] = $this->estab;
      nm_limpa_numero($this->estab, $this->field_config['estab']['symbol_grp']) ; 
      $this->Before_unformat['ptoemi'] = $this->ptoemi;
      nm_limpa_numero($this->ptoemi, $this->field_config['ptoemi']['symbol_grp']) ; 
      $this->Before_unformat['secuencial'] = $this->secuencial;
      nm_limpa_numero($this->secuencial, $this->field_config['secuencial']['symbol_grp']) ; 
      $this->Before_unformat['numcontribuyenteespecial'] = $this->numcontribuyenteespecial;
      nm_limpa_numero($this->numcontribuyenteespecial, $this->field_config['numcontribuyenteespecial']['symbol_grp']) ; 
      $this->Before_unformat['tipoidentcomprador'] = $this->tipoidentcomprador;
      nm_limpa_numero($this->tipoidentcomprador, $this->field_config['tipoidentcomprador']['symbol_grp']) ; 
      $this->Before_unformat['codimpuesto'] = $this->codimpuesto;
      nm_limpa_numero($this->codimpuesto, $this->field_config['codimpuesto']['symbol_grp']) ; 
      $this->Before_unformat['codporcentajeimpuesto'] = $this->codporcentajeimpuesto;
      nm_limpa_numero($this->codporcentajeimpuesto, $this->field_config['codporcentajeimpuesto']['symbol_grp']) ; 
      $this->Before_unformat['baseimponible1'] = $this->baseimponible1;
      if (!empty($this->field_config['baseimponible1']['symbol_dec']))
      {
         nm_limpa_valor($this->baseimponible1, $this->field_config['baseimponible1']['symbol_dec'], $this->field_config['baseimponible1']['symbol_grp']);
      }
      $this->Before_unformat['tarifa1'] = $this->tarifa1;
      if (!empty($this->field_config['tarifa1']['symbol_dec']))
      {
         nm_limpa_valor($this->tarifa1, $this->field_config['tarifa1']['symbol_dec'], $this->field_config['tarifa1']['symbol_grp']);
      }
      $this->Before_unformat['valor1'] = $this->valor1;
      if (!empty($this->field_config['valor1']['symbol_dec']))
      {
         nm_limpa_valor($this->valor1, $this->field_config['valor1']['symbol_dec'], $this->field_config['valor1']['symbol_grp']);
      }
      $this->Before_unformat['formato'] = $this->formato;
      nm_limpa_numero($this->formato, $this->field_config['formato']['symbol_grp']) ; 
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
      if ($Nome_Campo == "totalsinimpuestos")
      {
          if (!empty($this->field_config['totalsinimpuestos']['symbol_dec']))
          {
             nm_limpa_valor($this->totalsinimpuestos, $this->field_config['totalsinimpuestos']['symbol_dec'], $this->field_config['totalsinimpuestos']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "totaldescuento")
      {
          if (!empty($this->field_config['totaldescuento']['symbol_dec']))
          {
             nm_limpa_valor($this->totaldescuento, $this->field_config['totaldescuento']['symbol_dec'], $this->field_config['totaldescuento']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "base_12")
      {
          if (!empty($this->field_config['base_12']['symbol_dec']))
          {
             nm_limpa_valor($this->base_12, $this->field_config['base_12']['symbol_dec'], $this->field_config['base_12']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "base_0")
      {
          if (!empty($this->field_config['base_0']['symbol_dec']))
          {
             nm_limpa_valor($this->base_0, $this->field_config['base_0']['symbol_dec'], $this->field_config['base_0']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "propina")
      {
          if (!empty($this->field_config['propina']['symbol_dec']))
          {
             nm_limpa_valor($this->propina, $this->field_config['propina']['symbol_dec'], $this->field_config['propina']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "importetotal")
      {
          if (!empty($this->field_config['importetotal']['symbol_dec']))
          {
             nm_limpa_valor($this->importetotal, $this->field_config['importetotal']['symbol_dec'], $this->field_config['importetotal']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "coddoc")
      {
          nm_limpa_numero($this->coddoc, $this->field_config['coddoc']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "estab")
      {
          nm_limpa_numero($this->estab, $this->field_config['estab']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ptoemi")
      {
          nm_limpa_numero($this->ptoemi, $this->field_config['ptoemi']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "secuencial")
      {
          nm_limpa_numero($this->secuencial, $this->field_config['secuencial']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "numcontribuyenteespecial")
      {
          nm_limpa_numero($this->numcontribuyenteespecial, $this->field_config['numcontribuyenteespecial']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "tipoidentcomprador")
      {
          nm_limpa_numero($this->tipoidentcomprador, $this->field_config['tipoidentcomprador']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "codimpuesto")
      {
          nm_limpa_numero($this->codimpuesto, $this->field_config['codimpuesto']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "codporcentajeimpuesto")
      {
          nm_limpa_numero($this->codporcentajeimpuesto, $this->field_config['codporcentajeimpuesto']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "baseimponible1")
      {
          if (!empty($this->field_config['baseimponible1']['symbol_dec']))
          {
             nm_limpa_valor($this->baseimponible1, $this->field_config['baseimponible1']['symbol_dec'], $this->field_config['baseimponible1']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "tarifa1")
      {
          if (!empty($this->field_config['tarifa1']['symbol_dec']))
          {
             nm_limpa_valor($this->tarifa1, $this->field_config['tarifa1']['symbol_dec'], $this->field_config['tarifa1']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "valor1")
      {
          if (!empty($this->field_config['valor1']['symbol_dec']))
          {
             nm_limpa_valor($this->valor1, $this->field_config['valor1']['symbol_dec'], $this->field_config['valor1']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "formato")
      {
          nm_limpa_numero($this->formato, $this->field_config['formato']['symbol_grp']) ; 
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
      if ('' !== $this->totalsinimpuestos || (!empty($format_fields) && isset($format_fields['totalsinimpuestos'])))
      {
          nmgp_Form_Num_Val($this->totalsinimpuestos, $this->field_config['totalsinimpuestos']['symbol_grp'], $this->field_config['totalsinimpuestos']['symbol_dec'], "2", "S", $this->field_config['totalsinimpuestos']['format_neg'], "", "", "-", $this->field_config['totalsinimpuestos']['symbol_fmt']) ; 
      }
      if ('' !== $this->totaldescuento || (!empty($format_fields) && isset($format_fields['totaldescuento'])))
      {
          nmgp_Form_Num_Val($this->totaldescuento, $this->field_config['totaldescuento']['symbol_grp'], $this->field_config['totaldescuento']['symbol_dec'], "2", "S", $this->field_config['totaldescuento']['format_neg'], "", "", "-", $this->field_config['totaldescuento']['symbol_fmt']) ; 
      }
      if ('' !== $this->base_12 || (!empty($format_fields) && isset($format_fields['base_12'])))
      {
          nmgp_Form_Num_Val($this->base_12, $this->field_config['base_12']['symbol_grp'], $this->field_config['base_12']['symbol_dec'], "2", "S", $this->field_config['base_12']['format_neg'], "", "", "-", $this->field_config['base_12']['symbol_fmt']) ; 
      }
      if ('' !== $this->base_0 || (!empty($format_fields) && isset($format_fields['base_0'])))
      {
          nmgp_Form_Num_Val($this->base_0, $this->field_config['base_0']['symbol_grp'], $this->field_config['base_0']['symbol_dec'], "2", "S", $this->field_config['base_0']['format_neg'], "", "", "-", $this->field_config['base_0']['symbol_fmt']) ; 
      }
      if ('' !== $this->propina || (!empty($format_fields) && isset($format_fields['propina'])))
      {
          nmgp_Form_Num_Val($this->propina, $this->field_config['propina']['symbol_grp'], $this->field_config['propina']['symbol_dec'], "2", "S", $this->field_config['propina']['format_neg'], "", "", "-", $this->field_config['propina']['symbol_fmt']) ; 
      }
      if ('' !== $this->importetotal || (!empty($format_fields) && isset($format_fields['importetotal'])))
      {
          nmgp_Form_Num_Val($this->importetotal, $this->field_config['importetotal']['symbol_grp'], $this->field_config['importetotal']['symbol_dec'], "2", "S", $this->field_config['importetotal']['format_neg'], "", "", "-", $this->field_config['importetotal']['symbol_fmt']) ; 
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
          $this->ajax_return_values_num_fact();
          $this->ajax_return_values_fechaemision();
          $this->ajax_return_values_guiaremision();
          $this->ajax_return_values_idcomprador();
          $this->ajax_return_values_razonsocialcomprador();
          $this->ajax_return_values_totalsinimpuestos();
          $this->ajax_return_values_totaldescuento();
          $this->ajax_return_values_base_12();
          $this->ajax_return_values_base_0();
          $this->ajax_return_values_propina();
          $this->ajax_return_values_importetotal();
          $this->ajax_return_values_campoadicional1();
          $this->ajax_return_values_valoradicional1();
          $this->ajax_return_values_campoadicional2();
          $this->ajax_return_values_valoradicional2();
          $this->ajax_return_values_campoadicional3();
          $this->ajax_return_values_valoradicional3();
          $this->ajax_return_values_campoadicional4();
          $this->ajax_return_values_valoradicional4();
          $this->ajax_return_values_campoadicional5();
          $this->ajax_return_values_valoradicional5();
          $this->ajax_return_values_campoadicional6();
          $this->ajax_return_values_valoradicional6();
          $this->ajax_return_values_campoadicional7();
          $this->ajax_return_values_valoradicional7();
          $this->ajax_return_values_campoadicional8();
          $this->ajax_return_values_valoradicional8();
          $this->ajax_return_values_campoadicional9();
          $this->ajax_return_values_valoradicional9();
          $this->ajax_return_values_campoadicional10();
          $this->ajax_return_values_valoradicional10();
          $this->ajax_return_values_campoadicional11();
          $this->ajax_return_values_valoradicional11();
          $this->ajax_return_values_campoadicional12();
          $this->ajax_return_values_valoradicional12();
          $this->ajax_return_values_campoadicional13();
          $this->ajax_return_values_valoradicional13();
          $this->ajax_return_values_campoadicional14();
          $this->ajax_return_values_valoradicional14();
          $this->ajax_return_values_campoadicional15();
          $this->ajax_return_values_valoradicional15();
          $this->ajax_return_values_campoadicional16();
          $this->ajax_return_values_valoradicional16();
          $this->ajax_return_values_campoadicional17();
          $this->ajax_return_values_valoradicional17();
          $this->ajax_return_values_campoadicional18();
          $this->ajax_return_values_valoradicional18();
          $this->ajax_return_values_campoadicional19();
          $this->ajax_return_values_valoradicional19();
          $this->ajax_return_values_campoadicional20();
          $this->ajax_return_values_valoradicional20();
          $this->ajax_return_values_detalle_factura();
          $this->ajax_return_values_estab();
          $this->ajax_return_values_ptoemi();
          $this->ajax_return_values_secuencial();
          $this->ajax_return_values_lote();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['estab']['keyVal'] = form_FACTURA_bkp_mob_pack_protect_string($this->nmgp_dados_form['estab']);
              $this->NM_ajax_info['fldList']['ptoemi']['keyVal'] = form_FACTURA_bkp_mob_pack_protect_string($this->nmgp_dados_form['ptoemi']);
              $this->NM_ajax_info['fldList']['secuencial']['keyVal'] = form_FACTURA_bkp_mob_pack_protect_string($this->nmgp_dados_form['secuencial']);
              $this->NM_ajax_info['fldList']['lote']['keyVal'] = form_FACTURA_bkp_mob_pack_protect_string($this->nmgp_dados_form['lote']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['form_DETALLE_FACTURA_mob_script_case_init'] ]['form_DETALLE_FACTURA_mob']['foreign_key']['estab'] = $this->nmgp_dados_form['estab'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['form_DETALLE_FACTURA_mob_script_case_init'] ]['form_DETALLE_FACTURA_mob']['foreign_key']['ptoemi'] = $this->nmgp_dados_form['ptoemi'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['form_DETALLE_FACTURA_mob_script_case_init'] ]['form_DETALLE_FACTURA_mob']['foreign_key']['secuencial'] = $this->nmgp_dados_form['secuencial'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['form_DETALLE_FACTURA_mob_script_case_init'] ]['form_DETALLE_FACTURA_mob']['foreign_key']['lote'] = $this->nmgp_dados_form['lote'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['form_DETALLE_FACTURA_mob_script_case_init'] ]['form_DETALLE_FACTURA_mob']['where_filter'] = "ESTAB = " . $this->nmgp_dados_form['estab'] . " AND PTOEMI = " . $this->nmgp_dados_form['ptoemi'] . " AND SECUENCIAL = " . $this->nmgp_dados_form['secuencial'] . " AND LOTE = '" . $this->nmgp_dados_form['lote'] . "'";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['form_DETALLE_FACTURA_mob_script_case_init'] ]['form_DETALLE_FACTURA_mob']['where_detal']  = "ESTAB = " . $this->nmgp_dados_form['estab'] . " AND PTOEMI = " . $this->nmgp_dados_form['ptoemi'] . " AND SECUENCIAL = " . $this->nmgp_dados_form['secuencial'] . " AND LOTE = '" . $this->nmgp_dados_form['lote'] . "'";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['form_DETALLE_FACTURA_mob_script_case_init'] ]['form_DETALLE_FACTURA_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['form_DETALLE_FACTURA_mob_script_case_init'] ]['form_DETALLE_FACTURA_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['form_DETALLE_FACTURA_mob_script_case_init'] ]['form_DETALLE_FACTURA_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['form_DETALLE_FACTURA_mob_script_case_init'] ]['form_DETALLE_FACTURA_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['form_DETALLE_FACTURA_mob_script_case_init'] ]['form_DETALLE_FACTURA'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['form_DETALLE_FACTURA_mob_script_case_init'] ]['form_DETALLE_FACTURA_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['form_DETALLE_FACTURA_mob_script_case_init'] ]['form_DETALLE_FACTURA_mob']['total']);
              }
          }
   } // ajax_return_values

          //----- num_fact
   function ajax_return_values_num_fact($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("num_fact", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->num_fact);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['num_fact'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("num_fact", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- fechaemision
   function ajax_return_values_fechaemision($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fechaemision", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fechaemision);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fechaemision'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("fechaemision", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- guiaremision
   function ajax_return_values_guiaremision($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("guiaremision", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->guiaremision);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['guiaremision'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("guiaremision", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- idcomprador
   function ajax_return_values_idcomprador($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idcomprador", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idcomprador);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idcomprador'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("idcomprador", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- razonsocialcomprador
   function ajax_return_values_razonsocialcomprador($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("razonsocialcomprador", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->razonsocialcomprador);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['razonsocialcomprador'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("razonsocialcomprador", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- totalsinimpuestos
   function ajax_return_values_totalsinimpuestos($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("totalsinimpuestos", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->totalsinimpuestos);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['totalsinimpuestos'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("totalsinimpuestos", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- totaldescuento
   function ajax_return_values_totaldescuento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("totaldescuento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->totaldescuento);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['totaldescuento'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("totaldescuento", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- base_12
   function ajax_return_values_base_12($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("base_12", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->base_12);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['base_12'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("base_12", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- base_0
   function ajax_return_values_base_0($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("base_0", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->base_0);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['base_0'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("base_0", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- propina
   function ajax_return_values_propina($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("propina", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->propina);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['propina'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("propina", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- importetotal
   function ajax_return_values_importetotal($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("importetotal", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->importetotal);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['importetotal'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("importetotal", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- campoadicional1
   function ajax_return_values_campoadicional1($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("campoadicional1", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->campoadicional1);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['campoadicional1'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("campoadicional1", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- valoradicional1
   function ajax_return_values_valoradicional1($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valoradicional1", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valoradicional1);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valoradicional1'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("valoradicional1", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- campoadicional2
   function ajax_return_values_campoadicional2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("campoadicional2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->campoadicional2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['campoadicional2'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("campoadicional2", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- valoradicional2
   function ajax_return_values_valoradicional2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valoradicional2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valoradicional2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valoradicional2'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("valoradicional2", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- campoadicional3
   function ajax_return_values_campoadicional3($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("campoadicional3", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->campoadicional3);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['campoadicional3'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("campoadicional3", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- valoradicional3
   function ajax_return_values_valoradicional3($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valoradicional3", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valoradicional3);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valoradicional3'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("valoradicional3", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- campoadicional4
   function ajax_return_values_campoadicional4($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("campoadicional4", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->campoadicional4);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['campoadicional4'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("campoadicional4", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- valoradicional4
   function ajax_return_values_valoradicional4($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valoradicional4", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valoradicional4);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valoradicional4'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("valoradicional4", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- campoadicional5
   function ajax_return_values_campoadicional5($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("campoadicional5", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->campoadicional5);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['campoadicional5'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("campoadicional5", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- valoradicional5
   function ajax_return_values_valoradicional5($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valoradicional5", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valoradicional5);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valoradicional5'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("valoradicional5", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- campoadicional6
   function ajax_return_values_campoadicional6($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("campoadicional6", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->campoadicional6);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['campoadicional6'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("campoadicional6", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- valoradicional6
   function ajax_return_values_valoradicional6($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valoradicional6", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valoradicional6);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valoradicional6'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("valoradicional6", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- campoadicional7
   function ajax_return_values_campoadicional7($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("campoadicional7", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->campoadicional7);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['campoadicional7'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("campoadicional7", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- valoradicional7
   function ajax_return_values_valoradicional7($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valoradicional7", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valoradicional7);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valoradicional7'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("valoradicional7", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- campoadicional8
   function ajax_return_values_campoadicional8($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("campoadicional8", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->campoadicional8);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['campoadicional8'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("campoadicional8", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- valoradicional8
   function ajax_return_values_valoradicional8($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valoradicional8", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valoradicional8);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valoradicional8'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("valoradicional8", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- campoadicional9
   function ajax_return_values_campoadicional9($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("campoadicional9", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->campoadicional9);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['campoadicional9'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("campoadicional9", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- valoradicional9
   function ajax_return_values_valoradicional9($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valoradicional9", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valoradicional9);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valoradicional9'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("valoradicional9", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- campoadicional10
   function ajax_return_values_campoadicional10($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("campoadicional10", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->campoadicional10);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['campoadicional10'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("campoadicional10", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- valoradicional10
   function ajax_return_values_valoradicional10($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valoradicional10", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valoradicional10);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valoradicional10'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("valoradicional10", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- campoadicional11
   function ajax_return_values_campoadicional11($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("campoadicional11", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->campoadicional11);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['campoadicional11'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("campoadicional11", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- valoradicional11
   function ajax_return_values_valoradicional11($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valoradicional11", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valoradicional11);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valoradicional11'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("valoradicional11", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- campoadicional12
   function ajax_return_values_campoadicional12($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("campoadicional12", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->campoadicional12);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['campoadicional12'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("campoadicional12", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- valoradicional12
   function ajax_return_values_valoradicional12($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valoradicional12", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valoradicional12);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valoradicional12'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("valoradicional12", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- campoadicional13
   function ajax_return_values_campoadicional13($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("campoadicional13", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->campoadicional13);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['campoadicional13'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("campoadicional13", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- valoradicional13
   function ajax_return_values_valoradicional13($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valoradicional13", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valoradicional13);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valoradicional13'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("valoradicional13", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- campoadicional14
   function ajax_return_values_campoadicional14($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("campoadicional14", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->campoadicional14);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['campoadicional14'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("campoadicional14", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- valoradicional14
   function ajax_return_values_valoradicional14($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valoradicional14", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valoradicional14);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valoradicional14'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("valoradicional14", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- campoadicional15
   function ajax_return_values_campoadicional15($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("campoadicional15", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->campoadicional15);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['campoadicional15'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("campoadicional15", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- valoradicional15
   function ajax_return_values_valoradicional15($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valoradicional15", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valoradicional15);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valoradicional15'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("valoradicional15", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- campoadicional16
   function ajax_return_values_campoadicional16($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("campoadicional16", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->campoadicional16);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['campoadicional16'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("campoadicional16", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- valoradicional16
   function ajax_return_values_valoradicional16($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valoradicional16", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valoradicional16);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valoradicional16'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("valoradicional16", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- campoadicional17
   function ajax_return_values_campoadicional17($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("campoadicional17", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->campoadicional17);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['campoadicional17'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("campoadicional17", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- valoradicional17
   function ajax_return_values_valoradicional17($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valoradicional17", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valoradicional17);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valoradicional17'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("valoradicional17", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- campoadicional18
   function ajax_return_values_campoadicional18($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("campoadicional18", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->campoadicional18);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['campoadicional18'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("campoadicional18", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- valoradicional18
   function ajax_return_values_valoradicional18($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valoradicional18", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valoradicional18);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valoradicional18'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("valoradicional18", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- campoadicional19
   function ajax_return_values_campoadicional19($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("campoadicional19", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->campoadicional19);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['campoadicional19'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("campoadicional19", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- valoradicional19
   function ajax_return_values_valoradicional19($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valoradicional19", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valoradicional19);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valoradicional19'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("valoradicional19", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- campoadicional20
   function ajax_return_values_campoadicional20($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("campoadicional20", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->campoadicional20);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['campoadicional20'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("campoadicional20", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- valoradicional20
   function ajax_return_values_valoradicional20($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valoradicional20", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valoradicional20);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valoradicional20'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("valoradicional20", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- detalle_factura
   function ajax_return_values_detalle_factura($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("detalle_factura", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->detalle_factura);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['detalle_factura'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- estab
   function ajax_return_values_estab($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estab", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->estab);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['estab'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("estab", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- ptoemi
   function ajax_return_values_ptoemi($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ptoemi", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ptoemi);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ptoemi'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("ptoemi", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- secuencial
   function ajax_return_values_secuencial($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("secuencial", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->secuencial);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['secuencial'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("secuencial", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- lote
   function ajax_return_values_lote($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("lote", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->lote);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['lote'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->form_encode_input($sTmpValue)),
               'labList' => array($this->form_format_readonly("lote", $this->form_encode_input($sTmpValue))),
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['upload_dir'][$fieldName][] = $newName;
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
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_FACTURA_bkp_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_num_fact = $this->num_fact;
}
if (!isset($this->sc_temp_v_aplicacion_link)) {$this->sc_temp_v_aplicacion_link = (isset($_SESSION['v_aplicacion_link'])) ? $_SESSION['v_aplicacion_link'] : "";}
 if(trim($this->campoadicional1 )!="")
	$this->campoadicional1 =$this->campoadicional1 .":";
if(trim($this->campoadicional2 )!="")
	$this->campoadicional2 =$this->campoadicional2 .":";
if(trim($this->campoadicional3 )!="")
	$this->campoadicional3 =$this->campoadicional3 .":";
if(trim($this->campoadicional4 )!="")
	$this->campoadicional4 =$this->campoadicional4 .":";
if(trim($this->campoadicional5 )!="")
	$this->campoadicional5 =$this->campoadicional5 .":";
if(trim($this->campoadicional6 )!="")
	$this->campoadicional6 =$this->campoadicional6 .":";
if(trim($this->campoadicional7 )!="")
	$this->campoadicional7 =$this->campoadicional7 .":";
if(trim($this->campoadicional8 )!="")
	$this->campoadicional8 =$this->campoadicional8 .":";
if(trim($this->campoadicional9 )!="")
	$this->campoadicional9 =$this->campoadicional9 .":";
if(trim($this->campoadicional10 )!="")
	$this->campoadicional10 =$this->campoadicional10 .":";
if(trim($this->campoadicional11 )!="")
	$this->campoadicional11 =$this->campoadicional11 .":";
if(trim($this->campoadicional12 )!="")
	$this->campoadicional12 =$this->campoadicional12 .":";
if(trim($this->campoadicional13 )!="")
	$this->campoadicional13 =$this->campoadicional13 .":";
if(trim($this->campoadicional14 )!="")
	$this->campoadicional14 =$this->campoadicional14 .":";
if(trim($this->campoadicional15 )!="")
	$this->campoadicional15 =$this->campoadicional15 .":";
if(trim($this->campoadicional16 )!="")
	$this->campoadicional16 =$this->campoadicional16 .":";
if(trim($this->campoadicional17 )!="")
	$this->campoadicional17 =$this->campoadicional17 .":";
if(trim($this->campoadicional18 )!="")
	$this->campoadicional18 =$this->campoadicional18 .":";
if(trim($this->campoadicional19 )!="")
	$this->campoadicional19 =$this->campoadicional19 .":";
if(trim($this->campoadicional20 )!="")
	$this->campoadicional20 =$this->campoadicional20 .":";

$this->num_fact =$this->estab ."-".$this->ptoemi ."-".$this->secuencial ;


$calling_app=$this->sc_temp_v_aplicacion_link;

if($calling_app=='grid_FACTURAS_FIRMADAS') {
	$this->NM_ajax_info['buttonDisplay']['redo_xml'] = $this->nmgp_botoes["redo_xml"] = "on";;	
	
}

else {
	
	$this->NM_ajax_info['buttonDisplay']['redo_xml'] = $this->nmgp_botoes["redo_xml"] = "off";;	
	
}
if (isset($this->sc_temp_v_aplicacion_link)) { $_SESSION['v_aplicacion_link'] = $this->sc_temp_v_aplicacion_link;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_num_fact != $this->num_fact || (isset($bFlagRead_num_fact) && $bFlagRead_num_fact)))
    {
        $this->ajax_return_values_num_fact(true);
    }
}
$_SESSION['scriptcase']['form_FACTURA_bkp_mob']['contr_erro'] = 'off'; 
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
      $this->totalsinimpuestos = str_replace($sc_parm1, $sc_parm2, $this->totalsinimpuestos); 
      $this->totaldescuento = str_replace($sc_parm1, $sc_parm2, $this->totaldescuento); 
      $this->base_12 = str_replace($sc_parm1, $sc_parm2, $this->base_12); 
      $this->base_0 = str_replace($sc_parm1, $sc_parm2, $this->base_0); 
      $this->propina = str_replace($sc_parm1, $sc_parm2, $this->propina); 
      $this->importetotal = str_replace($sc_parm1, $sc_parm2, $this->importetotal); 
      $this->baseimponible1 = str_replace($sc_parm1, $sc_parm2, $this->baseimponible1); 
      $this->tarifa1 = str_replace($sc_parm1, $sc_parm2, $this->tarifa1); 
      $this->valor1 = str_replace($sc_parm1, $sc_parm2, $this->valor1); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->totalsinimpuestos = "'" . $this->totalsinimpuestos . "'";
      $this->totaldescuento = "'" . $this->totaldescuento . "'";
      $this->base_12 = "'" . $this->base_12 . "'";
      $this->base_0 = "'" . $this->base_0 . "'";
      $this->propina = "'" . $this->propina . "'";
      $this->importetotal = "'" . $this->importetotal . "'";
      $this->baseimponible1 = "'" . $this->baseimponible1 . "'";
      $this->tarifa1 = "'" . $this->tarifa1 . "'";
      $this->valor1 = "'" . $this->valor1 . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->totalsinimpuestos = str_replace("'", "", $this->totalsinimpuestos); 
      $this->totaldescuento = str_replace("'", "", $this->totaldescuento); 
      $this->base_12 = str_replace("'", "", $this->base_12); 
      $this->base_0 = str_replace("'", "", $this->base_0); 
      $this->propina = str_replace("'", "", $this->propina); 
      $this->importetotal = str_replace("'", "", $this->importetotal); 
      $this->baseimponible1 = str_replace("'", "", $this->baseimponible1); 
      $this->tarifa1 = str_replace("'", "", $this->tarifa1); 
      $this->valor1 = str_replace("'", "", $this->valor1); 
   } 
//----------- 

   function controle_navegacao()
   {
      global $sc_where;

          if (false && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['total']))
          {
               $sc_where_pos = " WHERE ((ESTAB < $this->estab) OR (ESTAB = $this->estab AND PTOEMI < $this->ptoemi) OR (ESTAB = $this->estab AND PTOEMI = $this->ptoemi AND SECUENCIAL < $this->secuencial) OR (ESTAB = $this->estab AND PTOEMI = $this->ptoemi AND SECUENCIAL = $this->secuencial AND LOTE < '" . substr($this->Db->qstr($this->lote), 1, -1) . "'))";
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
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['total'] = $rsc->fields[0];
               $rsc->Close(); 
               if ('' != $this->estab && '' != $this->ptoemi && '' != $this->secuencial)
               {
               $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['inicio'] = $rsc->fields[0];
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['inicio'] < 0)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['inicio'] = 0;
               }
               $rsc->Close(); 
               }
               else
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['inicio'] = 0;
               }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['qt_reg_grid'] = 1;
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['inicio']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['inicio'] = 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['final']  = 0;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['opcao'] = $this->NM_ajax_info['param']['nmgp_opcao'];
          if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['opcao'], array('incluir', 'alterar', 'excluir')))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['opcao'] = '';
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['opcao'] == 'inicio')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['inicio'] = 0;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['opcao'] == 'retorna')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['inicio'] = 0 ;
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['opcao'] == 'avanca' && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['total']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['total'] > $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['final']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['final'];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['opcao'] == 'final')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['inicio'] = 0;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['final'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['qt_reg_grid'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['final'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['opcao'] = '';

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
      $NM_val_form['num_fact'] = $this->num_fact;
      $NM_val_form['fechaemision'] = $this->fechaemision;
      $NM_val_form['guiaremision'] = $this->guiaremision;
      $NM_val_form['idcomprador'] = $this->idcomprador;
      $NM_val_form['razonsocialcomprador'] = $this->razonsocialcomprador;
      $NM_val_form['totalsinimpuestos'] = $this->totalsinimpuestos;
      $NM_val_form['totaldescuento'] = $this->totaldescuento;
      $NM_val_form['base_12'] = $this->base_12;
      $NM_val_form['base_0'] = $this->base_0;
      $NM_val_form['propina'] = $this->propina;
      $NM_val_form['importetotal'] = $this->importetotal;
      $NM_val_form['campoadicional1'] = $this->campoadicional1;
      $NM_val_form['valoradicional1'] = $this->valoradicional1;
      $NM_val_form['campoadicional2'] = $this->campoadicional2;
      $NM_val_form['valoradicional2'] = $this->valoradicional2;
      $NM_val_form['campoadicional3'] = $this->campoadicional3;
      $NM_val_form['valoradicional3'] = $this->valoradicional3;
      $NM_val_form['campoadicional4'] = $this->campoadicional4;
      $NM_val_form['valoradicional4'] = $this->valoradicional4;
      $NM_val_form['campoadicional5'] = $this->campoadicional5;
      $NM_val_form['valoradicional5'] = $this->valoradicional5;
      $NM_val_form['campoadicional6'] = $this->campoadicional6;
      $NM_val_form['valoradicional6'] = $this->valoradicional6;
      $NM_val_form['campoadicional7'] = $this->campoadicional7;
      $NM_val_form['valoradicional7'] = $this->valoradicional7;
      $NM_val_form['campoadicional8'] = $this->campoadicional8;
      $NM_val_form['valoradicional8'] = $this->valoradicional8;
      $NM_val_form['campoadicional9'] = $this->campoadicional9;
      $NM_val_form['valoradicional9'] = $this->valoradicional9;
      $NM_val_form['campoadicional10'] = $this->campoadicional10;
      $NM_val_form['valoradicional10'] = $this->valoradicional10;
      $NM_val_form['campoadicional11'] = $this->campoadicional11;
      $NM_val_form['valoradicional11'] = $this->valoradicional11;
      $NM_val_form['campoadicional12'] = $this->campoadicional12;
      $NM_val_form['valoradicional12'] = $this->valoradicional12;
      $NM_val_form['campoadicional13'] = $this->campoadicional13;
      $NM_val_form['valoradicional13'] = $this->valoradicional13;
      $NM_val_form['campoadicional14'] = $this->campoadicional14;
      $NM_val_form['valoradicional14'] = $this->valoradicional14;
      $NM_val_form['campoadicional15'] = $this->campoadicional15;
      $NM_val_form['valoradicional15'] = $this->valoradicional15;
      $NM_val_form['campoadicional16'] = $this->campoadicional16;
      $NM_val_form['valoradicional16'] = $this->valoradicional16;
      $NM_val_form['campoadicional17'] = $this->campoadicional17;
      $NM_val_form['valoradicional17'] = $this->valoradicional17;
      $NM_val_form['campoadicional18'] = $this->campoadicional18;
      $NM_val_form['valoradicional18'] = $this->valoradicional18;
      $NM_val_form['campoadicional19'] = $this->campoadicional19;
      $NM_val_form['valoradicional19'] = $this->valoradicional19;
      $NM_val_form['campoadicional20'] = $this->campoadicional20;
      $NM_val_form['valoradicional20'] = $this->valoradicional20;
      $NM_val_form['detalle_factura'] = $this->detalle_factura;
      $NM_val_form['razonsocial'] = $this->razonsocial;
      $NM_val_form['nombrecomercial'] = $this->nombrecomercial;
      $NM_val_form['ruc'] = $this->ruc;
      $NM_val_form['coddoc'] = $this->coddoc;
      $NM_val_form['estab'] = $this->estab;
      $NM_val_form['ptoemi'] = $this->ptoemi;
      $NM_val_form['secuencial'] = $this->secuencial;
      $NM_val_form['lote'] = $this->lote;
      $NM_val_form['dirmatriz'] = $this->dirmatriz;
      $NM_val_form['direstablecimiento'] = $this->direstablecimiento;
      $NM_val_form['numcontribuyenteespecial'] = $this->numcontribuyenteespecial;
      $NM_val_form['obligadocontabilidad'] = $this->obligadocontabilidad;
      $NM_val_form['tipoidentcomprador'] = $this->tipoidentcomprador;
      $NM_val_form['codimpuesto'] = $this->codimpuesto;
      $NM_val_form['codporcentajeimpuesto'] = $this->codporcentajeimpuesto;
      $NM_val_form['baseimponible1'] = $this->baseimponible1;
      $NM_val_form['tarifa1'] = $this->tarifa1;
      $NM_val_form['valor1'] = $this->valor1;
      $NM_val_form['moneda'] = $this->moneda;
      $NM_val_form['formato'] = $this->formato;
      if ($this->coddoc === "" || is_null($this->coddoc))  
      { 
          $this->coddoc = 0;
          $this->sc_force_zero[] = 'coddoc';
      } 
      if ($this->estab === "" || is_null($this->estab))  
      { 
          $this->estab = 0;
      } 
      if ($this->ptoemi === "" || is_null($this->ptoemi))  
      { 
          $this->ptoemi = 0;
      } 
      if ($this->secuencial === "" || is_null($this->secuencial))  
      { 
          $this->secuencial = 0;
      } 
      if ($this->numcontribuyenteespecial === "" || is_null($this->numcontribuyenteespecial))  
      { 
          $this->numcontribuyenteespecial = 0;
          $this->sc_force_zero[] = 'numcontribuyenteespecial';
      } 
      if ($this->tipoidentcomprador === "" || is_null($this->tipoidentcomprador))  
      { 
          $this->tipoidentcomprador = 0;
          $this->sc_force_zero[] = 'tipoidentcomprador';
      } 
      if ($this->totalsinimpuestos === "" || is_null($this->totalsinimpuestos))  
      { 
          $this->totalsinimpuestos = 0;
          $this->sc_force_zero[] = 'totalsinimpuestos';
      } 
      if ($this->totaldescuento === "" || is_null($this->totaldescuento))  
      { 
          $this->totaldescuento = 0;
          $this->sc_force_zero[] = 'totaldescuento';
      } 
      if ($this->base_12 === "" || is_null($this->base_12))  
      { 
          $this->base_12 = 0;
          $this->sc_force_zero[] = 'base_12';
      } 
      if ($this->base_0 === "" || is_null($this->base_0))  
      { 
          $this->base_0 = 0;
          $this->sc_force_zero[] = 'base_0';
      } 
      if ($this->codimpuesto === "" || is_null($this->codimpuesto))  
      { 
          $this->codimpuesto = 0;
          $this->sc_force_zero[] = 'codimpuesto';
      } 
      if ($this->codporcentajeimpuesto === "" || is_null($this->codporcentajeimpuesto))  
      { 
          $this->codporcentajeimpuesto = 0;
          $this->sc_force_zero[] = 'codporcentajeimpuesto';
      } 
      if ($this->baseimponible1 === "" || is_null($this->baseimponible1))  
      { 
          $this->baseimponible1 = 0;
          $this->sc_force_zero[] = 'baseimponible1';
      } 
      if ($this->tarifa1 === "" || is_null($this->tarifa1))  
      { 
          $this->tarifa1 = 0;
          $this->sc_force_zero[] = 'tarifa1';
      } 
      if ($this->valor1 === "" || is_null($this->valor1))  
      { 
          $this->valor1 = 0;
          $this->sc_force_zero[] = 'valor1';
      } 
      if ($this->propina === "" || is_null($this->propina))  
      { 
          $this->propina = 0;
          $this->sc_force_zero[] = 'propina';
      } 
      if ($this->importetotal === "" || is_null($this->importetotal))  
      { 
          $this->importetotal = 0;
          $this->sc_force_zero[] = 'importetotal';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->formato === "" || is_null($this->formato))  
      { 
          $this->formato = 0;
          $this->sc_force_zero[] = 'formato';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->razonsocial_before_qstr = $this->razonsocial;
          $this->razonsocial = substr($this->Db->qstr($this->razonsocial), 1, -1); 
          if ($this->razonsocial == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->razonsocial = "null"; 
              $NM_val_null[] = "razonsocial";
          } 
          $this->nombrecomercial_before_qstr = $this->nombrecomercial;
          $this->nombrecomercial = substr($this->Db->qstr($this->nombrecomercial), 1, -1); 
          if ($this->nombrecomercial == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombrecomercial = "null"; 
              $NM_val_null[] = "nombrecomercial";
          } 
          $this->ruc_before_qstr = $this->ruc;
          $this->ruc = substr($this->Db->qstr($this->ruc), 1, -1); 
          if ($this->ruc == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ruc = "null"; 
              $NM_val_null[] = "ruc";
          } 
          $this->lote_before_qstr = $this->lote;
          $this->lote = substr($this->Db->qstr($this->lote), 1, -1); 
          if ($this->lote == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->lote = "null"; 
              $NM_val_null[] = "lote";
          } 
          $this->dirmatriz_before_qstr = $this->dirmatriz;
          $this->dirmatriz = substr($this->Db->qstr($this->dirmatriz), 1, -1); 
          if ($this->dirmatriz == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->dirmatriz = "null"; 
              $NM_val_null[] = "dirmatriz";
          } 
          $this->fechaemision_before_qstr = $this->fechaemision;
          $this->fechaemision = substr($this->Db->qstr($this->fechaemision), 1, -1); 
          if ($this->fechaemision == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fechaemision = "null"; 
              $NM_val_null[] = "fechaemision";
          } 
          $this->direstablecimiento_before_qstr = $this->direstablecimiento;
          $this->direstablecimiento = substr($this->Db->qstr($this->direstablecimiento), 1, -1); 
          if ($this->direstablecimiento == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->direstablecimiento = "null"; 
              $NM_val_null[] = "direstablecimiento";
          } 
          $this->obligadocontabilidad_before_qstr = $this->obligadocontabilidad;
          $this->obligadocontabilidad = substr($this->Db->qstr($this->obligadocontabilidad), 1, -1); 
          if ($this->obligadocontabilidad == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->obligadocontabilidad = "null"; 
              $NM_val_null[] = "obligadocontabilidad";
          } 
          $this->guiaremision_before_qstr = $this->guiaremision;
          $this->guiaremision = substr($this->Db->qstr($this->guiaremision), 1, -1); 
          if ($this->guiaremision == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->guiaremision = "null"; 
              $NM_val_null[] = "guiaremision";
          } 
          $this->razonsocialcomprador_before_qstr = $this->razonsocialcomprador;
          $this->razonsocialcomprador = substr($this->Db->qstr($this->razonsocialcomprador), 1, -1); 
          if ($this->razonsocialcomprador == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->razonsocialcomprador = "null"; 
              $NM_val_null[] = "razonsocialcomprador";
          } 
          $this->idcomprador_before_qstr = $this->idcomprador;
          $this->idcomprador = substr($this->Db->qstr($this->idcomprador), 1, -1); 
          if ($this->idcomprador == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->idcomprador = "null"; 
              $NM_val_null[] = "idcomprador";
          } 
          $this->moneda_before_qstr = $this->moneda;
          $this->moneda = substr($this->Db->qstr($this->moneda), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->moneda == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->moneda = "null"; 
                  $NM_val_null[] = "moneda";
              } 
          }
          $this->campoadicional1_before_qstr = $this->campoadicional1;
          $this->campoadicional1 = substr($this->Db->qstr($this->campoadicional1), 1, -1); 
          if ($this->campoadicional1 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->campoadicional1 = "null"; 
              $NM_val_null[] = "campoadicional1";
          } 
          $this->valoradicional1_before_qstr = $this->valoradicional1;
          $this->valoradicional1 = substr($this->Db->qstr($this->valoradicional1), 1, -1); 
          if ($this->valoradicional1 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional1 = "null"; 
              $NM_val_null[] = "valoradicional1";
          } 
          $this->campoadicional2_before_qstr = $this->campoadicional2;
          $this->campoadicional2 = substr($this->Db->qstr($this->campoadicional2), 1, -1); 
          if ($this->campoadicional2 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->campoadicional2 = "null"; 
              $NM_val_null[] = "campoadicional2";
          } 
          $this->valoradicional2_before_qstr = $this->valoradicional2;
          $this->valoradicional2 = substr($this->Db->qstr($this->valoradicional2), 1, -1); 
          if ($this->valoradicional2 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional2 = "null"; 
              $NM_val_null[] = "valoradicional2";
          } 
          $this->campoadicional3_before_qstr = $this->campoadicional3;
          $this->campoadicional3 = substr($this->Db->qstr($this->campoadicional3), 1, -1); 
          if ($this->campoadicional3 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->campoadicional3 = "null"; 
              $NM_val_null[] = "campoadicional3";
          } 
          $this->valoradicional3_before_qstr = $this->valoradicional3;
          $this->valoradicional3 = substr($this->Db->qstr($this->valoradicional3), 1, -1); 
          if ($this->valoradicional3 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional3 = "null"; 
              $NM_val_null[] = "valoradicional3";
          } 
          $this->campoadicional4_before_qstr = $this->campoadicional4;
          $this->campoadicional4 = substr($this->Db->qstr($this->campoadicional4), 1, -1); 
          if ($this->campoadicional4 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->campoadicional4 = "null"; 
              $NM_val_null[] = "campoadicional4";
          } 
          $this->valoradicional4_before_qstr = $this->valoradicional4;
          $this->valoradicional4 = substr($this->Db->qstr($this->valoradicional4), 1, -1); 
          if ($this->valoradicional4 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional4 = "null"; 
              $NM_val_null[] = "valoradicional4";
          } 
          $this->campoadicional5_before_qstr = $this->campoadicional5;
          $this->campoadicional5 = substr($this->Db->qstr($this->campoadicional5), 1, -1); 
          if ($this->campoadicional5 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->campoadicional5 = "null"; 
              $NM_val_null[] = "campoadicional5";
          } 
          $this->valoradicional5_before_qstr = $this->valoradicional5;
          $this->valoradicional5 = substr($this->Db->qstr($this->valoradicional5), 1, -1); 
          if ($this->valoradicional5 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional5 = "null"; 
              $NM_val_null[] = "valoradicional5";
          } 
          $this->campoadicional6_before_qstr = $this->campoadicional6;
          $this->campoadicional6 = substr($this->Db->qstr($this->campoadicional6), 1, -1); 
          if ($this->campoadicional6 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->campoadicional6 = "null"; 
              $NM_val_null[] = "campoadicional6";
          } 
          $this->valoradicional6_before_qstr = $this->valoradicional6;
          $this->valoradicional6 = substr($this->Db->qstr($this->valoradicional6), 1, -1); 
          if ($this->valoradicional6 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional6 = "null"; 
              $NM_val_null[] = "valoradicional6";
          } 
          $this->campoadicional7_before_qstr = $this->campoadicional7;
          $this->campoadicional7 = substr($this->Db->qstr($this->campoadicional7), 1, -1); 
          if ($this->campoadicional7 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->campoadicional7 = "null"; 
              $NM_val_null[] = "campoadicional7";
          } 
          $this->valoradicional7_before_qstr = $this->valoradicional7;
          $this->valoradicional7 = substr($this->Db->qstr($this->valoradicional7), 1, -1); 
          if ($this->valoradicional7 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional7 = "null"; 
              $NM_val_null[] = "valoradicional7";
          } 
          $this->campoadicional8_before_qstr = $this->campoadicional8;
          $this->campoadicional8 = substr($this->Db->qstr($this->campoadicional8), 1, -1); 
          if ($this->campoadicional8 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->campoadicional8 = "null"; 
              $NM_val_null[] = "campoadicional8";
          } 
          $this->valoradicional8_before_qstr = $this->valoradicional8;
          $this->valoradicional8 = substr($this->Db->qstr($this->valoradicional8), 1, -1); 
          if ($this->valoradicional8 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional8 = "null"; 
              $NM_val_null[] = "valoradicional8";
          } 
          $this->campoadicional9_before_qstr = $this->campoadicional9;
          $this->campoadicional9 = substr($this->Db->qstr($this->campoadicional9), 1, -1); 
          if ($this->campoadicional9 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->campoadicional9 = "null"; 
              $NM_val_null[] = "campoadicional9";
          } 
          $this->valoradicional9_before_qstr = $this->valoradicional9;
          $this->valoradicional9 = substr($this->Db->qstr($this->valoradicional9), 1, -1); 
          if ($this->valoradicional9 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional9 = "null"; 
              $NM_val_null[] = "valoradicional9";
          } 
          $this->campoadicional10_before_qstr = $this->campoadicional10;
          $this->campoadicional10 = substr($this->Db->qstr($this->campoadicional10), 1, -1); 
          if ($this->campoadicional10 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->campoadicional10 = "null"; 
              $NM_val_null[] = "campoadicional10";
          } 
          $this->valoradicional10_before_qstr = $this->valoradicional10;
          $this->valoradicional10 = substr($this->Db->qstr($this->valoradicional10), 1, -1); 
          if ($this->valoradicional10 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional10 = "null"; 
              $NM_val_null[] = "valoradicional10";
          } 
          $this->campoadicional11_before_qstr = $this->campoadicional11;
          $this->campoadicional11 = substr($this->Db->qstr($this->campoadicional11), 1, -1); 
          if ($this->campoadicional11 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->campoadicional11 = "null"; 
              $NM_val_null[] = "campoadicional11";
          } 
          $this->valoradicional11_before_qstr = $this->valoradicional11;
          $this->valoradicional11 = substr($this->Db->qstr($this->valoradicional11), 1, -1); 
          if ($this->valoradicional11 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional11 = "null"; 
              $NM_val_null[] = "valoradicional11";
          } 
          $this->campoadicional12_before_qstr = $this->campoadicional12;
          $this->campoadicional12 = substr($this->Db->qstr($this->campoadicional12), 1, -1); 
          if ($this->campoadicional12 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->campoadicional12 = "null"; 
              $NM_val_null[] = "campoadicional12";
          } 
          $this->valoradicional12_before_qstr = $this->valoradicional12;
          $this->valoradicional12 = substr($this->Db->qstr($this->valoradicional12), 1, -1); 
          if ($this->valoradicional12 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional12 = "null"; 
              $NM_val_null[] = "valoradicional12";
          } 
          $this->campoadicional13_before_qstr = $this->campoadicional13;
          $this->campoadicional13 = substr($this->Db->qstr($this->campoadicional13), 1, -1); 
          if ($this->campoadicional13 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->campoadicional13 = "null"; 
              $NM_val_null[] = "campoadicional13";
          } 
          $this->valoradicional13_before_qstr = $this->valoradicional13;
          $this->valoradicional13 = substr($this->Db->qstr($this->valoradicional13), 1, -1); 
          if ($this->valoradicional13 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional13 = "null"; 
              $NM_val_null[] = "valoradicional13";
          } 
          $this->campoadicional14_before_qstr = $this->campoadicional14;
          $this->campoadicional14 = substr($this->Db->qstr($this->campoadicional14), 1, -1); 
          if ($this->campoadicional14 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->campoadicional14 = "null"; 
              $NM_val_null[] = "campoadicional14";
          } 
          $this->valoradicional14_before_qstr = $this->valoradicional14;
          $this->valoradicional14 = substr($this->Db->qstr($this->valoradicional14), 1, -1); 
          if ($this->valoradicional14 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional14 = "null"; 
              $NM_val_null[] = "valoradicional14";
          } 
          $this->campoadicional15_before_qstr = $this->campoadicional15;
          $this->campoadicional15 = substr($this->Db->qstr($this->campoadicional15), 1, -1); 
          if ($this->campoadicional15 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->campoadicional15 = "null"; 
              $NM_val_null[] = "campoadicional15";
          } 
          $this->valoradicional15_before_qstr = $this->valoradicional15;
          $this->valoradicional15 = substr($this->Db->qstr($this->valoradicional15), 1, -1); 
          if ($this->valoradicional15 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional15 = "null"; 
              $NM_val_null[] = "valoradicional15";
          } 
          $this->campoadicional16_before_qstr = $this->campoadicional16;
          $this->campoadicional16 = substr($this->Db->qstr($this->campoadicional16), 1, -1); 
          if ($this->campoadicional16 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->campoadicional16 = "null"; 
              $NM_val_null[] = "campoadicional16";
          } 
          $this->valoradicional16_before_qstr = $this->valoradicional16;
          $this->valoradicional16 = substr($this->Db->qstr($this->valoradicional16), 1, -1); 
          if ($this->valoradicional16 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional16 = "null"; 
              $NM_val_null[] = "valoradicional16";
          } 
          $this->campoadicional17_before_qstr = $this->campoadicional17;
          $this->campoadicional17 = substr($this->Db->qstr($this->campoadicional17), 1, -1); 
          if ($this->campoadicional17 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->campoadicional17 = "null"; 
              $NM_val_null[] = "campoadicional17";
          } 
          $this->valoradicional17_before_qstr = $this->valoradicional17;
          $this->valoradicional17 = substr($this->Db->qstr($this->valoradicional17), 1, -1); 
          if ($this->valoradicional17 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional17 = "null"; 
              $NM_val_null[] = "valoradicional17";
          } 
          $this->campoadicional18_before_qstr = $this->campoadicional18;
          $this->campoadicional18 = substr($this->Db->qstr($this->campoadicional18), 1, -1); 
          if ($this->campoadicional18 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->campoadicional18 = "null"; 
              $NM_val_null[] = "campoadicional18";
          } 
          $this->valoradicional18_before_qstr = $this->valoradicional18;
          $this->valoradicional18 = substr($this->Db->qstr($this->valoradicional18), 1, -1); 
          if ($this->valoradicional18 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional18 = "null"; 
              $NM_val_null[] = "valoradicional18";
          } 
          $this->campoadicional19_before_qstr = $this->campoadicional19;
          $this->campoadicional19 = substr($this->Db->qstr($this->campoadicional19), 1, -1); 
          if ($this->campoadicional19 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->campoadicional19 = "null"; 
              $NM_val_null[] = "campoadicional19";
          } 
          $this->valoradicional19_before_qstr = $this->valoradicional19;
          $this->valoradicional19 = substr($this->Db->qstr($this->valoradicional19), 1, -1); 
          if ($this->valoradicional19 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional19 = "null"; 
              $NM_val_null[] = "valoradicional19";
          } 
          $this->campoadicional20_before_qstr = $this->campoadicional20;
          $this->campoadicional20 = substr($this->Db->qstr($this->campoadicional20), 1, -1); 
          if ($this->campoadicional20 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->campoadicional20 = "null"; 
              $NM_val_null[] = "campoadicional20";
          } 
          $this->valoradicional20_before_qstr = $this->valoradicional20;
          $this->valoradicional20 = substr($this->Db->qstr($this->valoradicional20), 1, -1); 
          if ($this->valoradicional20 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valoradicional20 = "null"; 
              $NM_val_null[] = "valoradicional20";
          } 
          $this->detalle_factura_before_qstr = $this->detalle_factura;
          $this->detalle_factura = substr($this->Db->qstr($this->detalle_factura), 1, -1); 
          if ($this->detalle_factura == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->detalle_factura = "null"; 
              $NM_val_null[] = "detalle_factura";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_FACTURA_bkp_mob_pack_ajax_response();
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
              if (isset($NM_val_form['razonsocial']) && $NM_val_form['razonsocial'] != $this->nmgp_dados_select['razonsocial']) 
              { 
                  $SC_fields_update[] = "RAZONSOCIAL = '$this->razonsocial'"; 
              } 
              if (isset($NM_val_form['nombrecomercial']) && $NM_val_form['nombrecomercial'] != $this->nmgp_dados_select['nombrecomercial']) 
              { 
                  $SC_fields_update[] = "NOMBRECOMERCIAL = '$this->nombrecomercial'"; 
              } 
              if (isset($NM_val_form['ruc']) && $NM_val_form['ruc'] != $this->nmgp_dados_select['ruc']) 
              { 
                  $SC_fields_update[] = "RUC = '$this->ruc'"; 
              } 
              if (isset($NM_val_form['coddoc']) && $NM_val_form['coddoc'] != $this->nmgp_dados_select['coddoc']) 
              { 
                  $SC_fields_update[] = "CODDOC = $this->coddoc"; 
              } 
              if (isset($NM_val_form['dirmatriz']) && $NM_val_form['dirmatriz'] != $this->nmgp_dados_select['dirmatriz']) 
              { 
                  $SC_fields_update[] = "DIRMATRIZ = '$this->dirmatriz'"; 
              } 
              if (isset($NM_val_form['fechaemision']) && $NM_val_form['fechaemision'] != $this->nmgp_dados_select['fechaemision']) 
              { 
                  $SC_fields_update[] = "FECHAEMISION = '$this->fechaemision'"; 
              } 
              if (isset($NM_val_form['direstablecimiento']) && $NM_val_form['direstablecimiento'] != $this->nmgp_dados_select['direstablecimiento']) 
              { 
                  $SC_fields_update[] = "DIRESTABLECIMIENTO = '$this->direstablecimiento'"; 
              } 
              if (isset($NM_val_form['numcontribuyenteespecial']) && $NM_val_form['numcontribuyenteespecial'] != $this->nmgp_dados_select['numcontribuyenteespecial']) 
              { 
                  $SC_fields_update[] = "NUMCONTRIBUYENTEESPECIAL = $this->numcontribuyenteespecial"; 
              } 
              if (isset($NM_val_form['obligadocontabilidad']) && $NM_val_form['obligadocontabilidad'] != $this->nmgp_dados_select['obligadocontabilidad']) 
              { 
                  $SC_fields_update[] = "OBLIGADOCONTABILIDAD = '$this->obligadocontabilidad'"; 
              } 
              if (isset($NM_val_form['tipoidentcomprador']) && $NM_val_form['tipoidentcomprador'] != $this->nmgp_dados_select['tipoidentcomprador']) 
              { 
                  $SC_fields_update[] = "TIPOIDENTCOMPRADOR = $this->tipoidentcomprador"; 
              } 
              if (isset($NM_val_form['guiaremision']) && $NM_val_form['guiaremision'] != $this->nmgp_dados_select['guiaremision']) 
              { 
                  $SC_fields_update[] = "GUIAREMISION = '$this->guiaremision'"; 
              } 
              if (isset($NM_val_form['razonsocialcomprador']) && $NM_val_form['razonsocialcomprador'] != $this->nmgp_dados_select['razonsocialcomprador']) 
              { 
                  $SC_fields_update[] = "RAZONSOCIALCOMPRADOR = '$this->razonsocialcomprador'"; 
              } 
              if (isset($NM_val_form['idcomprador']) && $NM_val_form['idcomprador'] != $this->nmgp_dados_select['idcomprador']) 
              { 
                  $SC_fields_update[] = "IDCOMPRADOR = '$this->idcomprador'"; 
              } 
              if (isset($NM_val_form['totalsinimpuestos']) && $NM_val_form['totalsinimpuestos'] != $this->nmgp_dados_select['totalsinimpuestos']) 
              { 
                  $SC_fields_update[] = "TOTALSINIMPUESTOS = $this->totalsinimpuestos"; 
              } 
              if (isset($NM_val_form['totaldescuento']) && $NM_val_form['totaldescuento'] != $this->nmgp_dados_select['totaldescuento']) 
              { 
                  $SC_fields_update[] = "TOTALDESCUENTO = $this->totaldescuento"; 
              } 
              if (isset($NM_val_form['base_12']) && $NM_val_form['base_12'] != $this->nmgp_dados_select['base_12']) 
              { 
                  $SC_fields_update[] = "BASE_12 = $this->base_12"; 
              } 
              if (isset($NM_val_form['base_0']) && $NM_val_form['base_0'] != $this->nmgp_dados_select['base_0']) 
              { 
                  $SC_fields_update[] = "BASE_0 = $this->base_0"; 
              } 
              if (isset($NM_val_form['codimpuesto']) && $NM_val_form['codimpuesto'] != $this->nmgp_dados_select['codimpuesto']) 
              { 
                  $SC_fields_update[] = "CODIMPUESTO = $this->codimpuesto"; 
              } 
              if (isset($NM_val_form['codporcentajeimpuesto']) && $NM_val_form['codporcentajeimpuesto'] != $this->nmgp_dados_select['codporcentajeimpuesto']) 
              { 
                  $SC_fields_update[] = "CODPORCENTAJEIMPUESTO = $this->codporcentajeimpuesto"; 
              } 
              if (isset($NM_val_form['baseimponible1']) && $NM_val_form['baseimponible1'] != $this->nmgp_dados_select['baseimponible1']) 
              { 
                  $SC_fields_update[] = "BASEIMPONIBLE1 = $this->baseimponible1"; 
              } 
              if (isset($NM_val_form['tarifa1']) && $NM_val_form['tarifa1'] != $this->nmgp_dados_select['tarifa1']) 
              { 
                  $SC_fields_update[] = "TARIFA1 = $this->tarifa1"; 
              } 
              if (isset($NM_val_form['valor1']) && $NM_val_form['valor1'] != $this->nmgp_dados_select['valor1']) 
              { 
                  $SC_fields_update[] = "VALOR1 = $this->valor1"; 
              } 
              if (isset($NM_val_form['propina']) && $NM_val_form['propina'] != $this->nmgp_dados_select['propina']) 
              { 
                  $SC_fields_update[] = "PROPINA = $this->propina"; 
              } 
              if (isset($NM_val_form['importetotal']) && $NM_val_form['importetotal'] != $this->nmgp_dados_select['importetotal']) 
              { 
                  $SC_fields_update[] = "IMPORTETOTAL = $this->importetotal"; 
              } 
              if (isset($NM_val_form['moneda']) && $NM_val_form['moneda'] != $this->nmgp_dados_select['moneda']) 
              { 
                  $SC_fields_update[] = "MONEDA = '$this->moneda'"; 
              } 
              if (isset($NM_val_form['formato']) && $NM_val_form['formato'] != $this->nmgp_dados_select['formato']) 
              { 
                  $SC_fields_update[] = "FORMATO = $this->formato"; 
              } 
              if (isset($NM_val_form['campoadicional1']) && $NM_val_form['campoadicional1'] != $this->nmgp_dados_select['campoadicional1']) 
              { 
                  $SC_fields_update[] = "CAMPOADICIONAL1 = '$this->campoadicional1'"; 
              } 
              if (isset($NM_val_form['valoradicional1']) && $NM_val_form['valoradicional1'] != $this->nmgp_dados_select['valoradicional1']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL1 = '$this->valoradicional1'"; 
              } 
              if (isset($NM_val_form['campoadicional2']) && $NM_val_form['campoadicional2'] != $this->nmgp_dados_select['campoadicional2']) 
              { 
                  $SC_fields_update[] = "CAMPOADICIONAL2 = '$this->campoadicional2'"; 
              } 
              if (isset($NM_val_form['valoradicional2']) && $NM_val_form['valoradicional2'] != $this->nmgp_dados_select['valoradicional2']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL2 = '$this->valoradicional2'"; 
              } 
              if (isset($NM_val_form['campoadicional3']) && $NM_val_form['campoadicional3'] != $this->nmgp_dados_select['campoadicional3']) 
              { 
                  $SC_fields_update[] = "CAMPOADICIONAL3 = '$this->campoadicional3'"; 
              } 
              if (isset($NM_val_form['valoradicional3']) && $NM_val_form['valoradicional3'] != $this->nmgp_dados_select['valoradicional3']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL3 = '$this->valoradicional3'"; 
              } 
              if (isset($NM_val_form['campoadicional4']) && $NM_val_form['campoadicional4'] != $this->nmgp_dados_select['campoadicional4']) 
              { 
                  $SC_fields_update[] = "CAMPOADICIONAL4 = '$this->campoadicional4'"; 
              } 
              if (isset($NM_val_form['valoradicional4']) && $NM_val_form['valoradicional4'] != $this->nmgp_dados_select['valoradicional4']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL4 = '$this->valoradicional4'"; 
              } 
              if (isset($NM_val_form['campoadicional5']) && $NM_val_form['campoadicional5'] != $this->nmgp_dados_select['campoadicional5']) 
              { 
                  $SC_fields_update[] = "CAMPOADICIONAL5 = '$this->campoadicional5'"; 
              } 
              if (isset($NM_val_form['valoradicional5']) && $NM_val_form['valoradicional5'] != $this->nmgp_dados_select['valoradicional5']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL5 = '$this->valoradicional5'"; 
              } 
              if (isset($NM_val_form['campoadicional6']) && $NM_val_form['campoadicional6'] != $this->nmgp_dados_select['campoadicional6']) 
              { 
                  $SC_fields_update[] = "CAMPOADICIONAL6 = '$this->campoadicional6'"; 
              } 
              if (isset($NM_val_form['valoradicional6']) && $NM_val_form['valoradicional6'] != $this->nmgp_dados_select['valoradicional6']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL6 = '$this->valoradicional6'"; 
              } 
              if (isset($NM_val_form['campoadicional7']) && $NM_val_form['campoadicional7'] != $this->nmgp_dados_select['campoadicional7']) 
              { 
                  $SC_fields_update[] = "CAMPOADICIONAL7 = '$this->campoadicional7'"; 
              } 
              if (isset($NM_val_form['valoradicional7']) && $NM_val_form['valoradicional7'] != $this->nmgp_dados_select['valoradicional7']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL7 = '$this->valoradicional7'"; 
              } 
              if (isset($NM_val_form['campoadicional8']) && $NM_val_form['campoadicional8'] != $this->nmgp_dados_select['campoadicional8']) 
              { 
                  $SC_fields_update[] = "CAMPOADICIONAL8 = '$this->campoadicional8'"; 
              } 
              if (isset($NM_val_form['valoradicional8']) && $NM_val_form['valoradicional8'] != $this->nmgp_dados_select['valoradicional8']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL8 = '$this->valoradicional8'"; 
              } 
              if (isset($NM_val_form['campoadicional9']) && $NM_val_form['campoadicional9'] != $this->nmgp_dados_select['campoadicional9']) 
              { 
                  $SC_fields_update[] = "CAMPOADICIONAL9 = '$this->campoadicional9'"; 
              } 
              if (isset($NM_val_form['valoradicional9']) && $NM_val_form['valoradicional9'] != $this->nmgp_dados_select['valoradicional9']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL9 = '$this->valoradicional9'"; 
              } 
              if (isset($NM_val_form['campoadicional10']) && $NM_val_form['campoadicional10'] != $this->nmgp_dados_select['campoadicional10']) 
              { 
                  $SC_fields_update[] = "CAMPOADICIONAL10 = '$this->campoadicional10'"; 
              } 
              if (isset($NM_val_form['valoradicional10']) && $NM_val_form['valoradicional10'] != $this->nmgp_dados_select['valoradicional10']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL10 = '$this->valoradicional10'"; 
              } 
              if (isset($NM_val_form['campoadicional11']) && $NM_val_form['campoadicional11'] != $this->nmgp_dados_select['campoadicional11']) 
              { 
                  $SC_fields_update[] = "CAMPOADICIONAL11 = '$this->campoadicional11'"; 
              } 
              if (isset($NM_val_form['valoradicional11']) && $NM_val_form['valoradicional11'] != $this->nmgp_dados_select['valoradicional11']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL11 = '$this->valoradicional11'"; 
              } 
              if (isset($NM_val_form['campoadicional12']) && $NM_val_form['campoadicional12'] != $this->nmgp_dados_select['campoadicional12']) 
              { 
                  $SC_fields_update[] = "CAMPOADICIONAL12 = '$this->campoadicional12'"; 
              } 
              if (isset($NM_val_form['valoradicional12']) && $NM_val_form['valoradicional12'] != $this->nmgp_dados_select['valoradicional12']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL12 = '$this->valoradicional12'"; 
              } 
              if (isset($NM_val_form['campoadicional13']) && $NM_val_form['campoadicional13'] != $this->nmgp_dados_select['campoadicional13']) 
              { 
                  $SC_fields_update[] = "CAMPOADICIONAL13 = '$this->campoadicional13'"; 
              } 
              if (isset($NM_val_form['valoradicional13']) && $NM_val_form['valoradicional13'] != $this->nmgp_dados_select['valoradicional13']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL13 = '$this->valoradicional13'"; 
              } 
              if (isset($NM_val_form['campoadicional14']) && $NM_val_form['campoadicional14'] != $this->nmgp_dados_select['campoadicional14']) 
              { 
                  $SC_fields_update[] = "CAMPOADICIONAL14 = '$this->campoadicional14'"; 
              } 
              if (isset($NM_val_form['valoradicional14']) && $NM_val_form['valoradicional14'] != $this->nmgp_dados_select['valoradicional14']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL14 = '$this->valoradicional14'"; 
              } 
              if (isset($NM_val_form['campoadicional15']) && $NM_val_form['campoadicional15'] != $this->nmgp_dados_select['campoadicional15']) 
              { 
                  $SC_fields_update[] = "CAMPOADICIONAL15 = '$this->campoadicional15'"; 
              } 
              if (isset($NM_val_form['valoradicional15']) && $NM_val_form['valoradicional15'] != $this->nmgp_dados_select['valoradicional15']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL15 = '$this->valoradicional15'"; 
              } 
              if (isset($NM_val_form['campoadicional16']) && $NM_val_form['campoadicional16'] != $this->nmgp_dados_select['campoadicional16']) 
              { 
                  $SC_fields_update[] = "CAMPOADICIONAL16 = '$this->campoadicional16'"; 
              } 
              if (isset($NM_val_form['valoradicional16']) && $NM_val_form['valoradicional16'] != $this->nmgp_dados_select['valoradicional16']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL16 = '$this->valoradicional16'"; 
              } 
              if (isset($NM_val_form['campoadicional17']) && $NM_val_form['campoadicional17'] != $this->nmgp_dados_select['campoadicional17']) 
              { 
                  $SC_fields_update[] = "CAMPOADICIONAL17 = '$this->campoadicional17'"; 
              } 
              if (isset($NM_val_form['valoradicional17']) && $NM_val_form['valoradicional17'] != $this->nmgp_dados_select['valoradicional17']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL17 = '$this->valoradicional17'"; 
              } 
              if (isset($NM_val_form['campoadicional18']) && $NM_val_form['campoadicional18'] != $this->nmgp_dados_select['campoadicional18']) 
              { 
                  $SC_fields_update[] = "CAMPOADICIONAL18 = '$this->campoadicional18'"; 
              } 
              if (isset($NM_val_form['valoradicional18']) && $NM_val_form['valoradicional18'] != $this->nmgp_dados_select['valoradicional18']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL18 = '$this->valoradicional18'"; 
              } 
              if (isset($NM_val_form['campoadicional19']) && $NM_val_form['campoadicional19'] != $this->nmgp_dados_select['campoadicional19']) 
              { 
                  $SC_fields_update[] = "CAMPOADICIONAL19 = '$this->campoadicional19'"; 
              } 
              if (isset($NM_val_form['valoradicional19']) && $NM_val_form['valoradicional19'] != $this->nmgp_dados_select['valoradicional19']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL19 = '$this->valoradicional19'"; 
              } 
              if (isset($NM_val_form['campoadicional20']) && $NM_val_form['campoadicional20'] != $this->nmgp_dados_select['campoadicional20']) 
              { 
                  $SC_fields_update[] = "CAMPOADICIONAL20 = '$this->campoadicional20'"; 
              } 
              if (isset($NM_val_form['valoradicional20']) && $NM_val_form['valoradicional20'] != $this->nmgp_dados_select['valoradicional20']) 
              { 
                  $SC_fields_update[] = "VALORADICIONAL20 = '$this->valoradicional20'"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' ";  
              }  
              else  
              {
                  $comando .= " WHERE ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' ";  
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
                                  form_FACTURA_bkp_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->razonsocial = $this->razonsocial_before_qstr;
              $this->nombrecomercial = $this->nombrecomercial_before_qstr;
              $this->ruc = $this->ruc_before_qstr;
              $this->lote = $this->lote_before_qstr;
              $this->dirmatriz = $this->dirmatriz_before_qstr;
              $this->fechaemision = $this->fechaemision_before_qstr;
              $this->direstablecimiento = $this->direstablecimiento_before_qstr;
              $this->obligadocontabilidad = $this->obligadocontabilidad_before_qstr;
              $this->guiaremision = $this->guiaremision_before_qstr;
              $this->razonsocialcomprador = $this->razonsocialcomprador_before_qstr;
              $this->idcomprador = $this->idcomprador_before_qstr;
              $this->moneda = $this->moneda_before_qstr;
              $this->campoadicional1 = $this->campoadicional1_before_qstr;
              $this->valoradicional1 = $this->valoradicional1_before_qstr;
              $this->campoadicional2 = $this->campoadicional2_before_qstr;
              $this->valoradicional2 = $this->valoradicional2_before_qstr;
              $this->campoadicional3 = $this->campoadicional3_before_qstr;
              $this->valoradicional3 = $this->valoradicional3_before_qstr;
              $this->campoadicional4 = $this->campoadicional4_before_qstr;
              $this->valoradicional4 = $this->valoradicional4_before_qstr;
              $this->campoadicional5 = $this->campoadicional5_before_qstr;
              $this->valoradicional5 = $this->valoradicional5_before_qstr;
              $this->campoadicional6 = $this->campoadicional6_before_qstr;
              $this->valoradicional6 = $this->valoradicional6_before_qstr;
              $this->campoadicional7 = $this->campoadicional7_before_qstr;
              $this->valoradicional7 = $this->valoradicional7_before_qstr;
              $this->campoadicional8 = $this->campoadicional8_before_qstr;
              $this->valoradicional8 = $this->valoradicional8_before_qstr;
              $this->campoadicional9 = $this->campoadicional9_before_qstr;
              $this->valoradicional9 = $this->valoradicional9_before_qstr;
              $this->campoadicional10 = $this->campoadicional10_before_qstr;
              $this->valoradicional10 = $this->valoradicional10_before_qstr;
              $this->campoadicional11 = $this->campoadicional11_before_qstr;
              $this->valoradicional11 = $this->valoradicional11_before_qstr;
              $this->campoadicional12 = $this->campoadicional12_before_qstr;
              $this->valoradicional12 = $this->valoradicional12_before_qstr;
              $this->campoadicional13 = $this->campoadicional13_before_qstr;
              $this->valoradicional13 = $this->valoradicional13_before_qstr;
              $this->campoadicional14 = $this->campoadicional14_before_qstr;
              $this->valoradicional14 = $this->valoradicional14_before_qstr;
              $this->campoadicional15 = $this->campoadicional15_before_qstr;
              $this->valoradicional15 = $this->valoradicional15_before_qstr;
              $this->campoadicional16 = $this->campoadicional16_before_qstr;
              $this->valoradicional16 = $this->valoradicional16_before_qstr;
              $this->campoadicional17 = $this->campoadicional17_before_qstr;
              $this->valoradicional17 = $this->valoradicional17_before_qstr;
              $this->campoadicional18 = $this->campoadicional18_before_qstr;
              $this->valoradicional18 = $this->valoradicional18_before_qstr;
              $this->campoadicional19 = $this->campoadicional19_before_qstr;
              $this->valoradicional19 = $this->valoradicional19_before_qstr;
              $this->campoadicional20 = $this->campoadicional20_before_qstr;
              $this->valoradicional20 = $this->valoradicional20_before_qstr;
              $this->detalle_factura = $this->detalle_factura_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['estab'])) { $this->estab = $NM_val_form['estab']; }
              elseif (isset($this->estab)) { $this->nm_limpa_alfa($this->estab); }
              if     (isset($NM_val_form) && isset($NM_val_form['ptoemi'])) { $this->ptoemi = $NM_val_form['ptoemi']; }
              elseif (isset($this->ptoemi)) { $this->nm_limpa_alfa($this->ptoemi); }
              if     (isset($NM_val_form) && isset($NM_val_form['secuencial'])) { $this->secuencial = $NM_val_form['secuencial']; }
              elseif (isset($this->secuencial)) { $this->nm_limpa_alfa($this->secuencial); }
              if     (isset($NM_val_form) && isset($NM_val_form['lote'])) { $this->lote = $NM_val_form['lote']; }
              elseif (isset($this->lote)) { $this->nm_limpa_alfa($this->lote); }
              if     (isset($NM_val_form) && isset($NM_val_form['fechaemision'])) { $this->fechaemision = $NM_val_form['fechaemision']; }
              elseif (isset($this->fechaemision)) { $this->nm_limpa_alfa($this->fechaemision); }
              if     (isset($NM_val_form) && isset($NM_val_form['guiaremision'])) { $this->guiaremision = $NM_val_form['guiaremision']; }
              elseif (isset($this->guiaremision)) { $this->nm_limpa_alfa($this->guiaremision); }
              if     (isset($NM_val_form) && isset($NM_val_form['razonsocialcomprador'])) { $this->razonsocialcomprador = $NM_val_form['razonsocialcomprador']; }
              elseif (isset($this->razonsocialcomprador)) { $this->nm_limpa_alfa($this->razonsocialcomprador); }
              if     (isset($NM_val_form) && isset($NM_val_form['idcomprador'])) { $this->idcomprador = $NM_val_form['idcomprador']; }
              elseif (isset($this->idcomprador)) { $this->nm_limpa_alfa($this->idcomprador); }
              if     (isset($NM_val_form) && isset($NM_val_form['totalsinimpuestos'])) { $this->totalsinimpuestos = $NM_val_form['totalsinimpuestos']; }
              elseif (isset($this->totalsinimpuestos)) { $this->nm_limpa_alfa($this->totalsinimpuestos); }
              if     (isset($NM_val_form) && isset($NM_val_form['totaldescuento'])) { $this->totaldescuento = $NM_val_form['totaldescuento']; }
              elseif (isset($this->totaldescuento)) { $this->nm_limpa_alfa($this->totaldescuento); }
              if     (isset($NM_val_form) && isset($NM_val_form['base_12'])) { $this->base_12 = $NM_val_form['base_12']; }
              elseif (isset($this->base_12)) { $this->nm_limpa_alfa($this->base_12); }
              if     (isset($NM_val_form) && isset($NM_val_form['base_0'])) { $this->base_0 = $NM_val_form['base_0']; }
              elseif (isset($this->base_0)) { $this->nm_limpa_alfa($this->base_0); }
              if     (isset($NM_val_form) && isset($NM_val_form['propina'])) { $this->propina = $NM_val_form['propina']; }
              elseif (isset($this->propina)) { $this->nm_limpa_alfa($this->propina); }
              if     (isset($NM_val_form) && isset($NM_val_form['importetotal'])) { $this->importetotal = $NM_val_form['importetotal']; }
              elseif (isset($this->importetotal)) { $this->nm_limpa_alfa($this->importetotal); }
              if     (isset($NM_val_form) && isset($NM_val_form['campoadicional1'])) { $this->campoadicional1 = $NM_val_form['campoadicional1']; }
              elseif (isset($this->campoadicional1)) { $this->nm_limpa_alfa($this->campoadicional1); }
              if     (isset($NM_val_form) && isset($NM_val_form['valoradicional1'])) { $this->valoradicional1 = $NM_val_form['valoradicional1']; }
              elseif (isset($this->valoradicional1)) { $this->nm_limpa_alfa($this->valoradicional1); }
              if     (isset($NM_val_form) && isset($NM_val_form['campoadicional2'])) { $this->campoadicional2 = $NM_val_form['campoadicional2']; }
              elseif (isset($this->campoadicional2)) { $this->nm_limpa_alfa($this->campoadicional2); }
              if     (isset($NM_val_form) && isset($NM_val_form['valoradicional2'])) { $this->valoradicional2 = $NM_val_form['valoradicional2']; }
              elseif (isset($this->valoradicional2)) { $this->nm_limpa_alfa($this->valoradicional2); }
              if     (isset($NM_val_form) && isset($NM_val_form['campoadicional3'])) { $this->campoadicional3 = $NM_val_form['campoadicional3']; }
              elseif (isset($this->campoadicional3)) { $this->nm_limpa_alfa($this->campoadicional3); }
              if     (isset($NM_val_form) && isset($NM_val_form['valoradicional3'])) { $this->valoradicional3 = $NM_val_form['valoradicional3']; }
              elseif (isset($this->valoradicional3)) { $this->nm_limpa_alfa($this->valoradicional3); }
              if     (isset($NM_val_form) && isset($NM_val_form['campoadicional4'])) { $this->campoadicional4 = $NM_val_form['campoadicional4']; }
              elseif (isset($this->campoadicional4)) { $this->nm_limpa_alfa($this->campoadicional4); }
              if     (isset($NM_val_form) && isset($NM_val_form['valoradicional4'])) { $this->valoradicional4 = $NM_val_form['valoradicional4']; }
              elseif (isset($this->valoradicional4)) { $this->nm_limpa_alfa($this->valoradicional4); }
              if     (isset($NM_val_form) && isset($NM_val_form['campoadicional5'])) { $this->campoadicional5 = $NM_val_form['campoadicional5']; }
              elseif (isset($this->campoadicional5)) { $this->nm_limpa_alfa($this->campoadicional5); }
              if     (isset($NM_val_form) && isset($NM_val_form['valoradicional5'])) { $this->valoradicional5 = $NM_val_form['valoradicional5']; }
              elseif (isset($this->valoradicional5)) { $this->nm_limpa_alfa($this->valoradicional5); }
              if     (isset($NM_val_form) && isset($NM_val_form['campoadicional6'])) { $this->campoadicional6 = $NM_val_form['campoadicional6']; }
              elseif (isset($this->campoadicional6)) { $this->nm_limpa_alfa($this->campoadicional6); }
              if     (isset($NM_val_form) && isset($NM_val_form['valoradicional6'])) { $this->valoradicional6 = $NM_val_form['valoradicional6']; }
              elseif (isset($this->valoradicional6)) { $this->nm_limpa_alfa($this->valoradicional6); }
              if     (isset($NM_val_form) && isset($NM_val_form['campoadicional7'])) { $this->campoadicional7 = $NM_val_form['campoadicional7']; }
              elseif (isset($this->campoadicional7)) { $this->nm_limpa_alfa($this->campoadicional7); }
              if     (isset($NM_val_form) && isset($NM_val_form['valoradicional7'])) { $this->valoradicional7 = $NM_val_form['valoradicional7']; }
              elseif (isset($this->valoradicional7)) { $this->nm_limpa_alfa($this->valoradicional7); }
              if     (isset($NM_val_form) && isset($NM_val_form['campoadicional8'])) { $this->campoadicional8 = $NM_val_form['campoadicional8']; }
              elseif (isset($this->campoadicional8)) { $this->nm_limpa_alfa($this->campoadicional8); }
              if     (isset($NM_val_form) && isset($NM_val_form['valoradicional8'])) { $this->valoradicional8 = $NM_val_form['valoradicional8']; }
              elseif (isset($this->valoradicional8)) { $this->nm_limpa_alfa($this->valoradicional8); }
              if     (isset($NM_val_form) && isset($NM_val_form['campoadicional9'])) { $this->campoadicional9 = $NM_val_form['campoadicional9']; }
              elseif (isset($this->campoadicional9)) { $this->nm_limpa_alfa($this->campoadicional9); }
              if     (isset($NM_val_form) && isset($NM_val_form['valoradicional9'])) { $this->valoradicional9 = $NM_val_form['valoradicional9']; }
              elseif (isset($this->valoradicional9)) { $this->nm_limpa_alfa($this->valoradicional9); }
              if     (isset($NM_val_form) && isset($NM_val_form['campoadicional10'])) { $this->campoadicional10 = $NM_val_form['campoadicional10']; }
              elseif (isset($this->campoadicional10)) { $this->nm_limpa_alfa($this->campoadicional10); }
              if     (isset($NM_val_form) && isset($NM_val_form['valoradicional10'])) { $this->valoradicional10 = $NM_val_form['valoradicional10']; }
              elseif (isset($this->valoradicional10)) { $this->nm_limpa_alfa($this->valoradicional10); }
              if     (isset($NM_val_form) && isset($NM_val_form['campoadicional11'])) { $this->campoadicional11 = $NM_val_form['campoadicional11']; }
              elseif (isset($this->campoadicional11)) { $this->nm_limpa_alfa($this->campoadicional11); }
              if     (isset($NM_val_form) && isset($NM_val_form['valoradicional11'])) { $this->valoradicional11 = $NM_val_form['valoradicional11']; }
              elseif (isset($this->valoradicional11)) { $this->nm_limpa_alfa($this->valoradicional11); }
              if     (isset($NM_val_form) && isset($NM_val_form['campoadicional12'])) { $this->campoadicional12 = $NM_val_form['campoadicional12']; }
              elseif (isset($this->campoadicional12)) { $this->nm_limpa_alfa($this->campoadicional12); }
              if     (isset($NM_val_form) && isset($NM_val_form['valoradicional12'])) { $this->valoradicional12 = $NM_val_form['valoradicional12']; }
              elseif (isset($this->valoradicional12)) { $this->nm_limpa_alfa($this->valoradicional12); }
              if     (isset($NM_val_form) && isset($NM_val_form['campoadicional13'])) { $this->campoadicional13 = $NM_val_form['campoadicional13']; }
              elseif (isset($this->campoadicional13)) { $this->nm_limpa_alfa($this->campoadicional13); }
              if     (isset($NM_val_form) && isset($NM_val_form['valoradicional13'])) { $this->valoradicional13 = $NM_val_form['valoradicional13']; }
              elseif (isset($this->valoradicional13)) { $this->nm_limpa_alfa($this->valoradicional13); }
              if     (isset($NM_val_form) && isset($NM_val_form['campoadicional14'])) { $this->campoadicional14 = $NM_val_form['campoadicional14']; }
              elseif (isset($this->campoadicional14)) { $this->nm_limpa_alfa($this->campoadicional14); }
              if     (isset($NM_val_form) && isset($NM_val_form['valoradicional14'])) { $this->valoradicional14 = $NM_val_form['valoradicional14']; }
              elseif (isset($this->valoradicional14)) { $this->nm_limpa_alfa($this->valoradicional14); }
              if     (isset($NM_val_form) && isset($NM_val_form['campoadicional15'])) { $this->campoadicional15 = $NM_val_form['campoadicional15']; }
              elseif (isset($this->campoadicional15)) { $this->nm_limpa_alfa($this->campoadicional15); }
              if     (isset($NM_val_form) && isset($NM_val_form['valoradicional15'])) { $this->valoradicional15 = $NM_val_form['valoradicional15']; }
              elseif (isset($this->valoradicional15)) { $this->nm_limpa_alfa($this->valoradicional15); }
              if     (isset($NM_val_form) && isset($NM_val_form['campoadicional16'])) { $this->campoadicional16 = $NM_val_form['campoadicional16']; }
              elseif (isset($this->campoadicional16)) { $this->nm_limpa_alfa($this->campoadicional16); }
              if     (isset($NM_val_form) && isset($NM_val_form['valoradicional16'])) { $this->valoradicional16 = $NM_val_form['valoradicional16']; }
              elseif (isset($this->valoradicional16)) { $this->nm_limpa_alfa($this->valoradicional16); }
              if     (isset($NM_val_form) && isset($NM_val_form['campoadicional17'])) { $this->campoadicional17 = $NM_val_form['campoadicional17']; }
              elseif (isset($this->campoadicional17)) { $this->nm_limpa_alfa($this->campoadicional17); }
              if     (isset($NM_val_form) && isset($NM_val_form['valoradicional17'])) { $this->valoradicional17 = $NM_val_form['valoradicional17']; }
              elseif (isset($this->valoradicional17)) { $this->nm_limpa_alfa($this->valoradicional17); }
              if     (isset($NM_val_form) && isset($NM_val_form['campoadicional18'])) { $this->campoadicional18 = $NM_val_form['campoadicional18']; }
              elseif (isset($this->campoadicional18)) { $this->nm_limpa_alfa($this->campoadicional18); }
              if     (isset($NM_val_form) && isset($NM_val_form['valoradicional18'])) { $this->valoradicional18 = $NM_val_form['valoradicional18']; }
              elseif (isset($this->valoradicional18)) { $this->nm_limpa_alfa($this->valoradicional18); }
              if     (isset($NM_val_form) && isset($NM_val_form['campoadicional19'])) { $this->campoadicional19 = $NM_val_form['campoadicional19']; }
              elseif (isset($this->campoadicional19)) { $this->nm_limpa_alfa($this->campoadicional19); }
              if     (isset($NM_val_form) && isset($NM_val_form['valoradicional19'])) { $this->valoradicional19 = $NM_val_form['valoradicional19']; }
              elseif (isset($this->valoradicional19)) { $this->nm_limpa_alfa($this->valoradicional19); }
              if     (isset($NM_val_form) && isset($NM_val_form['campoadicional20'])) { $this->campoadicional20 = $NM_val_form['campoadicional20']; }
              elseif (isset($this->campoadicional20)) { $this->nm_limpa_alfa($this->campoadicional20); }
              if     (isset($NM_val_form) && isset($NM_val_form['valoradicional20'])) { $this->valoradicional20 = $NM_val_form['valoradicional20']; }
              elseif (isset($this->valoradicional20)) { $this->nm_limpa_alfa($this->valoradicional20); }
              if     (isset($NM_val_form) && isset($NM_val_form['detalle_factura'])) { $this->detalle_factura = $NM_val_form['detalle_factura']; }
              elseif (isset($this->detalle_factura)) { $this->nm_limpa_alfa($this->detalle_factura); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('num_fact', 'fechaemision', 'guiaremision', 'idcomprador', 'razonsocialcomprador', 'totalsinimpuestos', 'totaldescuento', 'base_12', 'base_0', 'propina', 'importetotal', 'campoadicional1', 'valoradicional1', 'campoadicional2', 'valoradicional2', 'campoadicional3', 'valoradicional3', 'campoadicional4', 'valoradicional4', 'campoadicional5', 'valoradicional5', 'campoadicional6', 'valoradicional6', 'campoadicional7', 'valoradicional7', 'campoadicional8', 'valoradicional8', 'campoadicional9', 'valoradicional9', 'campoadicional10', 'valoradicional10', 'campoadicional11', 'valoradicional11', 'campoadicional12', 'valoradicional12', 'campoadicional13', 'valoradicional13', 'campoadicional14', 'valoradicional14', 'campoadicional15', 'valoradicional15', 'campoadicional16', 'valoradicional16', 'campoadicional17', 'valoradicional17', 'campoadicional18', 'valoradicional18', 'campoadicional19', 'valoradicional19', 'campoadicional20', 'valoradicional20', 'detalle_factura'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          $bInsertOk = true;
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "); 
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
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_FACTURA_bkp_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->moneda != "")
                  { 
                       $compl_insert     .= ", MONEDA";
                       $compl_insert_val .= ", '$this->moneda'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (RAZONSOCIAL, NOMBRECOMERCIAL, RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, TIPOIDENTCOMPRADOR, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, TOTALSINIMPUESTOS, TOTALDESCUENTO, BASE_12, BASE_0, CODIMPUESTO, CODPORCENTAJEIMPUESTO, BASEIMPONIBLE1, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, FORMATO, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 $compl_insert) VALUES ('$this->razonsocial', '$this->nombrecomercial', '$this->ruc', $this->coddoc, $this->estab, $this->ptoemi, $this->secuencial, '$this->lote', '$this->dirmatriz', '$this->fechaemision', '$this->direstablecimiento', $this->numcontribuyenteespecial, '$this->obligadocontabilidad', $this->tipoidentcomprador, '$this->guiaremision', '$this->razonsocialcomprador', '$this->idcomprador', $this->totalsinimpuestos, $this->totaldescuento, $this->base_12, $this->base_0, $this->codimpuesto, $this->codporcentajeimpuesto, $this->baseimponible1, $this->tarifa1, $this->valor1, $this->propina, $this->importetotal, $this->formato, '$this->campoadicional1', '$this->valoradicional1', '$this->campoadicional2', '$this->valoradicional2', '$this->campoadicional3', '$this->valoradicional3', '$this->campoadicional4', '$this->valoradicional4', '$this->campoadicional5', '$this->valoradicional5', '$this->campoadicional6', '$this->valoradicional6', '$this->campoadicional7', '$this->valoradicional7', '$this->campoadicional8', '$this->valoradicional8', '$this->campoadicional9', '$this->valoradicional9', '$this->campoadicional10', '$this->valoradicional10', '$this->campoadicional11', '$this->valoradicional11', '$this->campoadicional12', '$this->valoradicional12', '$this->campoadicional13', '$this->valoradicional13', '$this->campoadicional14', '$this->valoradicional14', '$this->campoadicional15', '$this->valoradicional15', '$this->campoadicional16', '$this->valoradicional16', '$this->campoadicional17', '$this->valoradicional17', '$this->campoadicional18', '$this->valoradicional18', '$this->campoadicional19', '$this->valoradicional19', '$this->campoadicional20', '$this->valoradicional20' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->moneda != "")
                  { 
                       $compl_insert     .= ", MONEDA";
                       $compl_insert_val .= ", '$this->moneda'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "RAZONSOCIAL, NOMBRECOMERCIAL, RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, TIPOIDENTCOMPRADOR, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, TOTALSINIMPUESTOS, TOTALDESCUENTO, BASE_12, BASE_0, CODIMPUESTO, CODPORCENTAJEIMPUESTO, BASEIMPONIBLE1, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, FORMATO, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 $compl_insert) VALUES (" . $NM_seq_auto . "'$this->razonsocial', '$this->nombrecomercial', '$this->ruc', $this->coddoc, $this->estab, $this->ptoemi, $this->secuencial, '$this->lote', '$this->dirmatriz', '$this->fechaemision', '$this->direstablecimiento', $this->numcontribuyenteespecial, '$this->obligadocontabilidad', $this->tipoidentcomprador, '$this->guiaremision', '$this->razonsocialcomprador', '$this->idcomprador', $this->totalsinimpuestos, $this->totaldescuento, $this->base_12, $this->base_0, $this->codimpuesto, $this->codporcentajeimpuesto, $this->baseimponible1, $this->tarifa1, $this->valor1, $this->propina, $this->importetotal, $this->formato, '$this->campoadicional1', '$this->valoradicional1', '$this->campoadicional2', '$this->valoradicional2', '$this->campoadicional3', '$this->valoradicional3', '$this->campoadicional4', '$this->valoradicional4', '$this->campoadicional5', '$this->valoradicional5', '$this->campoadicional6', '$this->valoradicional6', '$this->campoadicional7', '$this->valoradicional7', '$this->campoadicional8', '$this->valoradicional8', '$this->campoadicional9', '$this->valoradicional9', '$this->campoadicional10', '$this->valoradicional10', '$this->campoadicional11', '$this->valoradicional11', '$this->campoadicional12', '$this->valoradicional12', '$this->campoadicional13', '$this->valoradicional13', '$this->campoadicional14', '$this->valoradicional14', '$this->campoadicional15', '$this->valoradicional15', '$this->campoadicional16', '$this->valoradicional16', '$this->campoadicional17', '$this->valoradicional17', '$this->campoadicional18', '$this->valoradicional18', '$this->campoadicional19', '$this->valoradicional19', '$this->campoadicional20', '$this->valoradicional20' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->moneda != "")
                  { 
                       $compl_insert     .= ", MONEDA";
                       $compl_insert_val .= ", '$this->moneda'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "RAZONSOCIAL, NOMBRECOMERCIAL, RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, TIPOIDENTCOMPRADOR, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, TOTALSINIMPUESTOS, TOTALDESCUENTO, BASE_12, BASE_0, CODIMPUESTO, CODPORCENTAJEIMPUESTO, BASEIMPONIBLE1, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, FORMATO, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 $compl_insert) VALUES (" . $NM_seq_auto . "'$this->razonsocial', '$this->nombrecomercial', '$this->ruc', $this->coddoc, $this->estab, $this->ptoemi, $this->secuencial, '$this->lote', '$this->dirmatriz', '$this->fechaemision', '$this->direstablecimiento', $this->numcontribuyenteespecial, '$this->obligadocontabilidad', $this->tipoidentcomprador, '$this->guiaremision', '$this->razonsocialcomprador', '$this->idcomprador', $this->totalsinimpuestos, $this->totaldescuento, $this->base_12, $this->base_0, $this->codimpuesto, $this->codporcentajeimpuesto, $this->baseimponible1, $this->tarifa1, $this->valor1, $this->propina, $this->importetotal, $this->formato, '$this->campoadicional1', '$this->valoradicional1', '$this->campoadicional2', '$this->valoradicional2', '$this->campoadicional3', '$this->valoradicional3', '$this->campoadicional4', '$this->valoradicional4', '$this->campoadicional5', '$this->valoradicional5', '$this->campoadicional6', '$this->valoradicional6', '$this->campoadicional7', '$this->valoradicional7', '$this->campoadicional8', '$this->valoradicional8', '$this->campoadicional9', '$this->valoradicional9', '$this->campoadicional10', '$this->valoradicional10', '$this->campoadicional11', '$this->valoradicional11', '$this->campoadicional12', '$this->valoradicional12', '$this->campoadicional13', '$this->valoradicional13', '$this->campoadicional14', '$this->valoradicional14', '$this->campoadicional15', '$this->valoradicional15', '$this->campoadicional16', '$this->valoradicional16', '$this->campoadicional17', '$this->valoradicional17', '$this->campoadicional18', '$this->valoradicional18', '$this->campoadicional19', '$this->valoradicional19', '$this->campoadicional20', '$this->valoradicional20' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->moneda != "")
                  { 
                       $compl_insert     .= ", MONEDA";
                       $compl_insert_val .= ", '$this->moneda'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "RAZONSOCIAL, NOMBRECOMERCIAL, RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, TIPOIDENTCOMPRADOR, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, TOTALSINIMPUESTOS, TOTALDESCUENTO, BASE_12, BASE_0, CODIMPUESTO, CODPORCENTAJEIMPUESTO, BASEIMPONIBLE1, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, FORMATO, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 $compl_insert) VALUES (" . $NM_seq_auto . "'$this->razonsocial', '$this->nombrecomercial', '$this->ruc', $this->coddoc, $this->estab, $this->ptoemi, $this->secuencial, '$this->lote', '$this->dirmatriz', '$this->fechaemision', '$this->direstablecimiento', $this->numcontribuyenteespecial, '$this->obligadocontabilidad', $this->tipoidentcomprador, '$this->guiaremision', '$this->razonsocialcomprador', '$this->idcomprador', $this->totalsinimpuestos, $this->totaldescuento, $this->base_12, $this->base_0, $this->codimpuesto, $this->codporcentajeimpuesto, $this->baseimponible1, $this->tarifa1, $this->valor1, $this->propina, $this->importetotal, $this->formato, '$this->campoadicional1', '$this->valoradicional1', '$this->campoadicional2', '$this->valoradicional2', '$this->campoadicional3', '$this->valoradicional3', '$this->campoadicional4', '$this->valoradicional4', '$this->campoadicional5', '$this->valoradicional5', '$this->campoadicional6', '$this->valoradicional6', '$this->campoadicional7', '$this->valoradicional7', '$this->campoadicional8', '$this->valoradicional8', '$this->campoadicional9', '$this->valoradicional9', '$this->campoadicional10', '$this->valoradicional10', '$this->campoadicional11', '$this->valoradicional11', '$this->campoadicional12', '$this->valoradicional12', '$this->campoadicional13', '$this->valoradicional13', '$this->campoadicional14', '$this->valoradicional14', '$this->campoadicional15', '$this->valoradicional15', '$this->campoadicional16', '$this->valoradicional16', '$this->campoadicional17', '$this->valoradicional17', '$this->campoadicional18', '$this->valoradicional18', '$this->campoadicional19', '$this->valoradicional19', '$this->campoadicional20', '$this->valoradicional20' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->moneda != "")
                  { 
                       $compl_insert     .= ", MONEDA";
                       $compl_insert_val .= ", '$this->moneda'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "RAZONSOCIAL, NOMBRECOMERCIAL, RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, TIPOIDENTCOMPRADOR, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, TOTALSINIMPUESTOS, TOTALDESCUENTO, BASE_12, BASE_0, CODIMPUESTO, CODPORCENTAJEIMPUESTO, BASEIMPONIBLE1, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, FORMATO, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 $compl_insert) VALUES (" . $NM_seq_auto . "'$this->razonsocial', '$this->nombrecomercial', '$this->ruc', $this->coddoc, $this->estab, $this->ptoemi, $this->secuencial, '$this->lote', '$this->dirmatriz', '$this->fechaemision', '$this->direstablecimiento', $this->numcontribuyenteespecial, '$this->obligadocontabilidad', $this->tipoidentcomprador, '$this->guiaremision', '$this->razonsocialcomprador', '$this->idcomprador', $this->totalsinimpuestos, $this->totaldescuento, $this->base_12, $this->base_0, $this->codimpuesto, $this->codporcentajeimpuesto, $this->baseimponible1, $this->tarifa1, $this->valor1, $this->propina, $this->importetotal, $this->formato, '$this->campoadicional1', '$this->valoradicional1', '$this->campoadicional2', '$this->valoradicional2', '$this->campoadicional3', '$this->valoradicional3', '$this->campoadicional4', '$this->valoradicional4', '$this->campoadicional5', '$this->valoradicional5', '$this->campoadicional6', '$this->valoradicional6', '$this->campoadicional7', '$this->valoradicional7', '$this->campoadicional8', '$this->valoradicional8', '$this->campoadicional9', '$this->valoradicional9', '$this->campoadicional10', '$this->valoradicional10', '$this->campoadicional11', '$this->valoradicional11', '$this->campoadicional12', '$this->valoradicional12', '$this->campoadicional13', '$this->valoradicional13', '$this->campoadicional14', '$this->valoradicional14', '$this->campoadicional15', '$this->valoradicional15', '$this->campoadicional16', '$this->valoradicional16', '$this->campoadicional17', '$this->valoradicional17', '$this->campoadicional18', '$this->valoradicional18', '$this->campoadicional19', '$this->valoradicional19', '$this->campoadicional20', '$this->valoradicional20' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->moneda != "")
                  { 
                       $compl_insert     .= ", MONEDA";
                       $compl_insert_val .= ", '$this->moneda'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "RAZONSOCIAL, NOMBRECOMERCIAL, RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, TIPOIDENTCOMPRADOR, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, TOTALSINIMPUESTOS, TOTALDESCUENTO, BASE_12, BASE_0, CODIMPUESTO, CODPORCENTAJEIMPUESTO, BASEIMPONIBLE1, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, FORMATO, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 $compl_insert) VALUES (" . $NM_seq_auto . "'$this->razonsocial', '$this->nombrecomercial', '$this->ruc', $this->coddoc, $this->estab, $this->ptoemi, $this->secuencial, '$this->lote', '$this->dirmatriz', '$this->fechaemision', '$this->direstablecimiento', $this->numcontribuyenteespecial, '$this->obligadocontabilidad', $this->tipoidentcomprador, '$this->guiaremision', '$this->razonsocialcomprador', '$this->idcomprador', $this->totalsinimpuestos, $this->totaldescuento, $this->base_12, $this->base_0, $this->codimpuesto, $this->codporcentajeimpuesto, $this->baseimponible1, $this->tarifa1, $this->valor1, $this->propina, $this->importetotal, $this->formato, '$this->campoadicional1', '$this->valoradicional1', '$this->campoadicional2', '$this->valoradicional2', '$this->campoadicional3', '$this->valoradicional3', '$this->campoadicional4', '$this->valoradicional4', '$this->campoadicional5', '$this->valoradicional5', '$this->campoadicional6', '$this->valoradicional6', '$this->campoadicional7', '$this->valoradicional7', '$this->campoadicional8', '$this->valoradicional8', '$this->campoadicional9', '$this->valoradicional9', '$this->campoadicional10', '$this->valoradicional10', '$this->campoadicional11', '$this->valoradicional11', '$this->campoadicional12', '$this->valoradicional12', '$this->campoadicional13', '$this->valoradicional13', '$this->campoadicional14', '$this->valoradicional14', '$this->campoadicional15', '$this->valoradicional15', '$this->campoadicional16', '$this->valoradicional16', '$this->campoadicional17', '$this->valoradicional17', '$this->campoadicional18', '$this->valoradicional18', '$this->campoadicional19', '$this->valoradicional19', '$this->campoadicional20', '$this->valoradicional20' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->moneda != "")
                  { 
                       $compl_insert     .= ", MONEDA";
                       $compl_insert_val .= ", '$this->moneda'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "RAZONSOCIAL, NOMBRECOMERCIAL, RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, TIPOIDENTCOMPRADOR, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, TOTALSINIMPUESTOS, TOTALDESCUENTO, BASE_12, BASE_0, CODIMPUESTO, CODPORCENTAJEIMPUESTO, BASEIMPONIBLE1, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, FORMATO, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 $compl_insert) VALUES (" . $NM_seq_auto . "'$this->razonsocial', '$this->nombrecomercial', '$this->ruc', $this->coddoc, $this->estab, $this->ptoemi, $this->secuencial, '$this->lote', '$this->dirmatriz', '$this->fechaemision', '$this->direstablecimiento', $this->numcontribuyenteespecial, '$this->obligadocontabilidad', $this->tipoidentcomprador, '$this->guiaremision', '$this->razonsocialcomprador', '$this->idcomprador', $this->totalsinimpuestos, $this->totaldescuento, $this->base_12, $this->base_0, $this->codimpuesto, $this->codporcentajeimpuesto, $this->baseimponible1, $this->tarifa1, $this->valor1, $this->propina, $this->importetotal, $this->formato, '$this->campoadicional1', '$this->valoradicional1', '$this->campoadicional2', '$this->valoradicional2', '$this->campoadicional3', '$this->valoradicional3', '$this->campoadicional4', '$this->valoradicional4', '$this->campoadicional5', '$this->valoradicional5', '$this->campoadicional6', '$this->valoradicional6', '$this->campoadicional7', '$this->valoradicional7', '$this->campoadicional8', '$this->valoradicional8', '$this->campoadicional9', '$this->valoradicional9', '$this->campoadicional10', '$this->valoradicional10', '$this->campoadicional11', '$this->valoradicional11', '$this->campoadicional12', '$this->valoradicional12', '$this->campoadicional13', '$this->valoradicional13', '$this->campoadicional14', '$this->valoradicional14', '$this->campoadicional15', '$this->valoradicional15', '$this->campoadicional16', '$this->valoradicional16', '$this->campoadicional17', '$this->valoradicional17', '$this->campoadicional18', '$this->valoradicional18', '$this->campoadicional19', '$this->valoradicional19', '$this->campoadicional20', '$this->valoradicional20' $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->moneda != "")
                  { 
                       $compl_insert     .= ", MONEDA";
                       $compl_insert_val .= ", '$this->moneda'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "RAZONSOCIAL, NOMBRECOMERCIAL, RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, TIPOIDENTCOMPRADOR, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, TOTALSINIMPUESTOS, TOTALDESCUENTO, BASE_12, BASE_0, CODIMPUESTO, CODPORCENTAJEIMPUESTO, BASEIMPONIBLE1, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, FORMATO, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 $compl_insert) VALUES (" . $NM_seq_auto . "'$this->razonsocial', '$this->nombrecomercial', '$this->ruc', $this->coddoc, $this->estab, $this->ptoemi, $this->secuencial, '$this->lote', '$this->dirmatriz', '$this->fechaemision', '$this->direstablecimiento', $this->numcontribuyenteespecial, '$this->obligadocontabilidad', $this->tipoidentcomprador, '$this->guiaremision', '$this->razonsocialcomprador', '$this->idcomprador', $this->totalsinimpuestos, $this->totaldescuento, $this->base_12, $this->base_0, $this->codimpuesto, $this->codporcentajeimpuesto, $this->baseimponible1, $this->tarifa1, $this->valor1, $this->propina, $this->importetotal, $this->formato, '$this->campoadicional1', '$this->valoradicional1', '$this->campoadicional2', '$this->valoradicional2', '$this->campoadicional3', '$this->valoradicional3', '$this->campoadicional4', '$this->valoradicional4', '$this->campoadicional5', '$this->valoradicional5', '$this->campoadicional6', '$this->valoradicional6', '$this->campoadicional7', '$this->valoradicional7', '$this->campoadicional8', '$this->valoradicional8', '$this->campoadicional9', '$this->valoradicional9', '$this->campoadicional10', '$this->valoradicional10', '$this->campoadicional11', '$this->valoradicional11', '$this->campoadicional12', '$this->valoradicional12', '$this->campoadicional13', '$this->valoradicional13', '$this->campoadicional14', '$this->valoradicional14', '$this->campoadicional15', '$this->valoradicional15', '$this->campoadicional16', '$this->valoradicional16', '$this->campoadicional17', '$this->valoradicional17', '$this->campoadicional18', '$this->valoradicional18', '$this->campoadicional19', '$this->valoradicional19', '$this->campoadicional20', '$this->valoradicional20' $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->moneda != "")
                  { 
                       $compl_insert     .= ", MONEDA";
                       $compl_insert_val .= ", '$this->moneda'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "RAZONSOCIAL, NOMBRECOMERCIAL, RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, TIPOIDENTCOMPRADOR, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, TOTALSINIMPUESTOS, TOTALDESCUENTO, BASE_12, BASE_0, CODIMPUESTO, CODPORCENTAJEIMPUESTO, BASEIMPONIBLE1, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, FORMATO, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 $compl_insert) VALUES (" . $NM_seq_auto . "'$this->razonsocial', '$this->nombrecomercial', '$this->ruc', $this->coddoc, $this->estab, $this->ptoemi, $this->secuencial, '$this->lote', '$this->dirmatriz', '$this->fechaemision', '$this->direstablecimiento', $this->numcontribuyenteespecial, '$this->obligadocontabilidad', $this->tipoidentcomprador, '$this->guiaremision', '$this->razonsocialcomprador', '$this->idcomprador', $this->totalsinimpuestos, $this->totaldescuento, $this->base_12, $this->base_0, $this->codimpuesto, $this->codporcentajeimpuesto, $this->baseimponible1, $this->tarifa1, $this->valor1, $this->propina, $this->importetotal, $this->formato, '$this->campoadicional1', '$this->valoradicional1', '$this->campoadicional2', '$this->valoradicional2', '$this->campoadicional3', '$this->valoradicional3', '$this->campoadicional4', '$this->valoradicional4', '$this->campoadicional5', '$this->valoradicional5', '$this->campoadicional6', '$this->valoradicional6', '$this->campoadicional7', '$this->valoradicional7', '$this->campoadicional8', '$this->valoradicional8', '$this->campoadicional9', '$this->valoradicional9', '$this->campoadicional10', '$this->valoradicional10', '$this->campoadicional11', '$this->valoradicional11', '$this->campoadicional12', '$this->valoradicional12', '$this->campoadicional13', '$this->valoradicional13', '$this->campoadicional14', '$this->valoradicional14', '$this->campoadicional15', '$this->valoradicional15', '$this->campoadicional16', '$this->valoradicional16', '$this->campoadicional17', '$this->valoradicional17', '$this->campoadicional18', '$this->valoradicional18', '$this->campoadicional19', '$this->valoradicional19', '$this->campoadicional20', '$this->valoradicional20' $compl_insert_val)"; 
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
                              form_FACTURA_bkp_mob_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->razonsocial = $this->razonsocial_before_qstr;
              $this->nombrecomercial = $this->nombrecomercial_before_qstr;
              $this->ruc = $this->ruc_before_qstr;
              $this->lote = $this->lote_before_qstr;
              $this->dirmatriz = $this->dirmatriz_before_qstr;
              $this->fechaemision = $this->fechaemision_before_qstr;
              $this->direstablecimiento = $this->direstablecimiento_before_qstr;
              $this->obligadocontabilidad = $this->obligadocontabilidad_before_qstr;
              $this->guiaremision = $this->guiaremision_before_qstr;
              $this->razonsocialcomprador = $this->razonsocialcomprador_before_qstr;
              $this->idcomprador = $this->idcomprador_before_qstr;
              $this->moneda = $this->moneda_before_qstr;
              $this->campoadicional1 = $this->campoadicional1_before_qstr;
              $this->valoradicional1 = $this->valoradicional1_before_qstr;
              $this->campoadicional2 = $this->campoadicional2_before_qstr;
              $this->valoradicional2 = $this->valoradicional2_before_qstr;
              $this->campoadicional3 = $this->campoadicional3_before_qstr;
              $this->valoradicional3 = $this->valoradicional3_before_qstr;
              $this->campoadicional4 = $this->campoadicional4_before_qstr;
              $this->valoradicional4 = $this->valoradicional4_before_qstr;
              $this->campoadicional5 = $this->campoadicional5_before_qstr;
              $this->valoradicional5 = $this->valoradicional5_before_qstr;
              $this->campoadicional6 = $this->campoadicional6_before_qstr;
              $this->valoradicional6 = $this->valoradicional6_before_qstr;
              $this->campoadicional7 = $this->campoadicional7_before_qstr;
              $this->valoradicional7 = $this->valoradicional7_before_qstr;
              $this->campoadicional8 = $this->campoadicional8_before_qstr;
              $this->valoradicional8 = $this->valoradicional8_before_qstr;
              $this->campoadicional9 = $this->campoadicional9_before_qstr;
              $this->valoradicional9 = $this->valoradicional9_before_qstr;
              $this->campoadicional10 = $this->campoadicional10_before_qstr;
              $this->valoradicional10 = $this->valoradicional10_before_qstr;
              $this->campoadicional11 = $this->campoadicional11_before_qstr;
              $this->valoradicional11 = $this->valoradicional11_before_qstr;
              $this->campoadicional12 = $this->campoadicional12_before_qstr;
              $this->valoradicional12 = $this->valoradicional12_before_qstr;
              $this->campoadicional13 = $this->campoadicional13_before_qstr;
              $this->valoradicional13 = $this->valoradicional13_before_qstr;
              $this->campoadicional14 = $this->campoadicional14_before_qstr;
              $this->valoradicional14 = $this->valoradicional14_before_qstr;
              $this->campoadicional15 = $this->campoadicional15_before_qstr;
              $this->valoradicional15 = $this->valoradicional15_before_qstr;
              $this->campoadicional16 = $this->campoadicional16_before_qstr;
              $this->valoradicional16 = $this->valoradicional16_before_qstr;
              $this->campoadicional17 = $this->campoadicional17_before_qstr;
              $this->valoradicional17 = $this->valoradicional17_before_qstr;
              $this->campoadicional18 = $this->campoadicional18_before_qstr;
              $this->valoradicional18 = $this->valoradicional18_before_qstr;
              $this->campoadicional19 = $this->campoadicional19_before_qstr;
              $this->valoradicional19 = $this->valoradicional19_before_qstr;
              $this->campoadicional20 = $this->campoadicional20_before_qstr;
              $this->valoradicional20 = $this->valoradicional20_before_qstr;
              $this->detalle_factura = $this->detalle_factura_before_qstr;
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              $this->nmgp_botoes['redo_xml'] = "on";
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->estab = substr($this->Db->qstr($this->estab), 1, -1); 
          $this->ptoemi = substr($this->Db->qstr($this->ptoemi), 1, -1); 
          $this->secuencial = substr($this->Db->qstr($this->secuencial), 1, -1); 
          $this->lote = substr($this->Db->qstr($this->lote), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';
          if ($bDelecaoOk)
          {
              $sDetailWhere = "ESTAB = " . $this->estab . " AND PTOEMI = " . $this->ptoemi . " AND SECUENCIAL = " . $this->secuencial . " AND LOTE = '" . $this->lote . "'";
              $this->form_DETALLE_FACTURA_mob->ini_controle();
              if ($this->form_DETALLE_FACTURA_mob->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote' "); 
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
                          form_FACTURA_bkp_mob_pack_ajax_response();
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['total']);
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['parms'] = "estab?#?$this->estab?@?ptoemi?#?$this->ptoemi?@?secuencial?#?$this->secuencial?@?lote?#?$this->lote?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->estab = null === $this->estab ? null : substr($this->Db->qstr($this->estab), 1, -1); 
          $this->ptoemi = null === $this->ptoemi ? null : substr($this->Db->qstr($this->ptoemi), 1, -1); 
          $this->secuencial = null === $this->secuencial ? null : substr($this->Db->qstr($this->secuencial), 1, -1); 
          $this->lote = null === $this->lote ? null : substr($this->Db->qstr($this->lote), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_filter'] . ")";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT RAZONSOCIAL, NOMBRECOMERCIAL, RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, TIPOIDENTCOMPRADOR, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, TOTALSINIMPUESTOS, TOTALDESCUENTO, BASE_12, BASE_0, CODIMPUESTO, CODPORCENTAJEIMPUESTO, BASEIMPONIBLE1, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, MONEDA, FORMATO, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT RAZONSOCIAL, NOMBRECOMERCIAL, RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, TIPOIDENTCOMPRADOR, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, TOTALSINIMPUESTOS, TOTALDESCUENTO, BASE_12, BASE_0, CODIMPUESTO, CODPORCENTAJEIMPUESTO, BASEIMPONIBLE1, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, MONEDA, FORMATO, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT RAZONSOCIAL, NOMBRECOMERCIAL, RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, TIPOIDENTCOMPRADOR, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, TOTALSINIMPUESTOS, TOTALDESCUENTO, BASE_12, BASE_0, CODIMPUESTO, CODPORCENTAJEIMPUESTO, BASEIMPONIBLE1, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, MONEDA, FORMATO, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT RAZONSOCIAL, NOMBRECOMERCIAL, RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, TIPOIDENTCOMPRADOR, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, TOTALSINIMPUESTOS, TOTALDESCUENTO, BASE_12, BASE_0, CODIMPUESTO, CODPORCENTAJEIMPUESTO, BASEIMPONIBLE1, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, MONEDA, FORMATO, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT RAZONSOCIAL, NOMBRECOMERCIAL, RUC, CODDOC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, TIPOIDENTCOMPRADOR, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, TOTALSINIMPUESTOS, TOTALDESCUENTO, BASE_12, BASE_0, CODIMPUESTO, CODPORCENTAJEIMPUESTO, BASEIMPONIBLE1, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, MONEDA, FORMATO, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote'"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote'"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote'"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote'"; 
              }  
              else  
              {
                  $aWhere[] = "ESTAB = $this->estab and PTOEMI = $this->ptoemi and SECUENCIAL = $this->secuencial and LOTE = '$this->lote'"; 
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['select'] = ""; 
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['redo_xml'] = $this->nmgp_botoes['redo_xml'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['empty_filter'] = true;
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
              $this->razonsocial = $rs->fields[0] ; 
              $this->nmgp_dados_select['razonsocial'] = $this->razonsocial;
              $this->nombrecomercial = $rs->fields[1] ; 
              $this->nmgp_dados_select['nombrecomercial'] = $this->nombrecomercial;
              $this->ruc = $rs->fields[2] ; 
              $this->nmgp_dados_select['ruc'] = $this->ruc;
              $this->coddoc = $rs->fields[3] ; 
              $this->nmgp_dados_select['coddoc'] = $this->coddoc;
              $this->estab = $rs->fields[4] ; 
              $this->nmgp_dados_select['estab'] = $this->estab;
              $this->ptoemi = $rs->fields[5] ; 
              $this->nmgp_dados_select['ptoemi'] = $this->ptoemi;
              $this->secuencial = $rs->fields[6] ; 
              $this->nmgp_dados_select['secuencial'] = $this->secuencial;
              $this->lote = $rs->fields[7] ; 
              $this->nmgp_dados_select['lote'] = $this->lote;
              $this->dirmatriz = $rs->fields[8] ; 
              $this->nmgp_dados_select['dirmatriz'] = $this->dirmatriz;
              $this->fechaemision = $rs->fields[9] ; 
              $this->nmgp_dados_select['fechaemision'] = $this->fechaemision;
              $this->direstablecimiento = $rs->fields[10] ; 
              $this->nmgp_dados_select['direstablecimiento'] = $this->direstablecimiento;
              $this->numcontribuyenteespecial = $rs->fields[11] ; 
              $this->nmgp_dados_select['numcontribuyenteespecial'] = $this->numcontribuyenteespecial;
              $this->obligadocontabilidad = $rs->fields[12] ; 
              $this->nmgp_dados_select['obligadocontabilidad'] = $this->obligadocontabilidad;
              $this->tipoidentcomprador = $rs->fields[13] ; 
              $this->nmgp_dados_select['tipoidentcomprador'] = $this->tipoidentcomprador;
              $this->guiaremision = $rs->fields[14] ; 
              $this->nmgp_dados_select['guiaremision'] = $this->guiaremision;
              $this->razonsocialcomprador = $rs->fields[15] ; 
              $this->nmgp_dados_select['razonsocialcomprador'] = $this->razonsocialcomprador;
              $this->idcomprador = $rs->fields[16] ; 
              $this->nmgp_dados_select['idcomprador'] = $this->idcomprador;
              $this->totalsinimpuestos = trim($rs->fields[17]) ; 
              $this->nmgp_dados_select['totalsinimpuestos'] = $this->totalsinimpuestos;
              $this->totaldescuento = trim($rs->fields[18]) ; 
              $this->nmgp_dados_select['totaldescuento'] = $this->totaldescuento;
              $this->base_12 = trim($rs->fields[19]) ; 
              $this->nmgp_dados_select['base_12'] = $this->base_12;
              $this->base_0 = trim($rs->fields[20]) ; 
              $this->nmgp_dados_select['base_0'] = $this->base_0;
              $this->codimpuesto = $rs->fields[21] ; 
              $this->nmgp_dados_select['codimpuesto'] = $this->codimpuesto;
              $this->codporcentajeimpuesto = $rs->fields[22] ; 
              $this->nmgp_dados_select['codporcentajeimpuesto'] = $this->codporcentajeimpuesto;
              $this->baseimponible1 = trim($rs->fields[23]) ; 
              $this->nmgp_dados_select['baseimponible1'] = $this->baseimponible1;
              $this->tarifa1 = trim($rs->fields[24]) ; 
              $this->nmgp_dados_select['tarifa1'] = $this->tarifa1;
              $this->valor1 = trim($rs->fields[25]) ; 
              $this->nmgp_dados_select['valor1'] = $this->valor1;
              $this->propina = trim($rs->fields[26]) ; 
              $this->nmgp_dados_select['propina'] = $this->propina;
              $this->importetotal = trim($rs->fields[27]) ; 
              $this->nmgp_dados_select['importetotal'] = $this->importetotal;
              $this->moneda = $rs->fields[28] ; 
              $this->nmgp_dados_select['moneda'] = $this->moneda;
              $this->formato = $rs->fields[29] ; 
              $this->nmgp_dados_select['formato'] = $this->formato;
              $this->campoadicional1 = $rs->fields[30] ; 
              $this->nmgp_dados_select['campoadicional1'] = $this->campoadicional1;
              $this->valoradicional1 = $rs->fields[31] ; 
              $this->nmgp_dados_select['valoradicional1'] = $this->valoradicional1;
              $this->campoadicional2 = $rs->fields[32] ; 
              $this->nmgp_dados_select['campoadicional2'] = $this->campoadicional2;
              $this->valoradicional2 = $rs->fields[33] ; 
              $this->nmgp_dados_select['valoradicional2'] = $this->valoradicional2;
              $this->campoadicional3 = $rs->fields[34] ; 
              $this->nmgp_dados_select['campoadicional3'] = $this->campoadicional3;
              $this->valoradicional3 = $rs->fields[35] ; 
              $this->nmgp_dados_select['valoradicional3'] = $this->valoradicional3;
              $this->campoadicional4 = $rs->fields[36] ; 
              $this->nmgp_dados_select['campoadicional4'] = $this->campoadicional4;
              $this->valoradicional4 = $rs->fields[37] ; 
              $this->nmgp_dados_select['valoradicional4'] = $this->valoradicional4;
              $this->campoadicional5 = $rs->fields[38] ; 
              $this->nmgp_dados_select['campoadicional5'] = $this->campoadicional5;
              $this->valoradicional5 = $rs->fields[39] ; 
              $this->nmgp_dados_select['valoradicional5'] = $this->valoradicional5;
              $this->campoadicional6 = $rs->fields[40] ; 
              $this->nmgp_dados_select['campoadicional6'] = $this->campoadicional6;
              $this->valoradicional6 = $rs->fields[41] ; 
              $this->nmgp_dados_select['valoradicional6'] = $this->valoradicional6;
              $this->campoadicional7 = $rs->fields[42] ; 
              $this->nmgp_dados_select['campoadicional7'] = $this->campoadicional7;
              $this->valoradicional7 = $rs->fields[43] ; 
              $this->nmgp_dados_select['valoradicional7'] = $this->valoradicional7;
              $this->campoadicional8 = $rs->fields[44] ; 
              $this->nmgp_dados_select['campoadicional8'] = $this->campoadicional8;
              $this->valoradicional8 = $rs->fields[45] ; 
              $this->nmgp_dados_select['valoradicional8'] = $this->valoradicional8;
              $this->campoadicional9 = $rs->fields[46] ; 
              $this->nmgp_dados_select['campoadicional9'] = $this->campoadicional9;
              $this->valoradicional9 = $rs->fields[47] ; 
              $this->nmgp_dados_select['valoradicional9'] = $this->valoradicional9;
              $this->campoadicional10 = $rs->fields[48] ; 
              $this->nmgp_dados_select['campoadicional10'] = $this->campoadicional10;
              $this->valoradicional10 = $rs->fields[49] ; 
              $this->nmgp_dados_select['valoradicional10'] = $this->valoradicional10;
              $this->campoadicional11 = $rs->fields[50] ; 
              $this->nmgp_dados_select['campoadicional11'] = $this->campoadicional11;
              $this->valoradicional11 = $rs->fields[51] ; 
              $this->nmgp_dados_select['valoradicional11'] = $this->valoradicional11;
              $this->campoadicional12 = $rs->fields[52] ; 
              $this->nmgp_dados_select['campoadicional12'] = $this->campoadicional12;
              $this->valoradicional12 = $rs->fields[53] ; 
              $this->nmgp_dados_select['valoradicional12'] = $this->valoradicional12;
              $this->campoadicional13 = $rs->fields[54] ; 
              $this->nmgp_dados_select['campoadicional13'] = $this->campoadicional13;
              $this->valoradicional13 = $rs->fields[55] ; 
              $this->nmgp_dados_select['valoradicional13'] = $this->valoradicional13;
              $this->campoadicional14 = $rs->fields[56] ; 
              $this->nmgp_dados_select['campoadicional14'] = $this->campoadicional14;
              $this->valoradicional14 = $rs->fields[57] ; 
              $this->nmgp_dados_select['valoradicional14'] = $this->valoradicional14;
              $this->campoadicional15 = $rs->fields[58] ; 
              $this->nmgp_dados_select['campoadicional15'] = $this->campoadicional15;
              $this->valoradicional15 = $rs->fields[59] ; 
              $this->nmgp_dados_select['valoradicional15'] = $this->valoradicional15;
              $this->campoadicional16 = $rs->fields[60] ; 
              $this->nmgp_dados_select['campoadicional16'] = $this->campoadicional16;
              $this->valoradicional16 = $rs->fields[61] ; 
              $this->nmgp_dados_select['valoradicional16'] = $this->valoradicional16;
              $this->campoadicional17 = $rs->fields[62] ; 
              $this->nmgp_dados_select['campoadicional17'] = $this->campoadicional17;
              $this->valoradicional17 = $rs->fields[63] ; 
              $this->nmgp_dados_select['valoradicional17'] = $this->valoradicional17;
              $this->campoadicional18 = $rs->fields[64] ; 
              $this->nmgp_dados_select['campoadicional18'] = $this->campoadicional18;
              $this->valoradicional18 = $rs->fields[65] ; 
              $this->nmgp_dados_select['valoradicional18'] = $this->valoradicional18;
              $this->campoadicional19 = $rs->fields[66] ; 
              $this->nmgp_dados_select['campoadicional19'] = $this->campoadicional19;
              $this->valoradicional19 = $rs->fields[67] ; 
              $this->nmgp_dados_select['valoradicional19'] = $this->valoradicional19;
              $this->campoadicional20 = $rs->fields[68] ; 
              $this->nmgp_dados_select['campoadicional20'] = $this->campoadicional20;
              $this->valoradicional20 = $rs->fields[69] ; 
              $this->nmgp_dados_select['valoradicional20'] = $this->valoradicional20;
              $this->detalle_factura = $rs->fields[70] ; 
              $this->nmgp_dados_select['detalle_factura'] = $this->detalle_factura;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->coddoc = (string)$this->coddoc; 
              $this->estab = (string)$this->estab; 
              $this->ptoemi = (string)$this->ptoemi; 
              $this->secuencial = (string)$this->secuencial; 
              $this->numcontribuyenteespecial = (string)$this->numcontribuyenteespecial; 
              $this->tipoidentcomprador = (string)$this->tipoidentcomprador; 
              $this->totalsinimpuestos = (strpos(strtolower($this->totalsinimpuestos), "e")) ? (float)$this->totalsinimpuestos : $this->totalsinimpuestos; 
              $this->totalsinimpuestos = (string)$this->totalsinimpuestos; 
              $this->totaldescuento = (strpos(strtolower($this->totaldescuento), "e")) ? (float)$this->totaldescuento : $this->totaldescuento; 
              $this->totaldescuento = (string)$this->totaldescuento; 
              $this->base_12 = (strpos(strtolower($this->base_12), "e")) ? (float)$this->base_12 : $this->base_12; 
              $this->base_12 = (string)$this->base_12; 
              $this->base_0 = (strpos(strtolower($this->base_0), "e")) ? (float)$this->base_0 : $this->base_0; 
              $this->base_0 = (string)$this->base_0; 
              $this->codimpuesto = (string)$this->codimpuesto; 
              $this->codporcentajeimpuesto = (string)$this->codporcentajeimpuesto; 
              $this->baseimponible1 = (strpos(strtolower($this->baseimponible1), "e")) ? (float)$this->baseimponible1 : $this->baseimponible1; 
              $this->baseimponible1 = (string)$this->baseimponible1; 
              $this->tarifa1 = (strpos(strtolower($this->tarifa1), "e")) ? (float)$this->tarifa1 : $this->tarifa1; 
              $this->tarifa1 = (string)$this->tarifa1; 
              $this->valor1 = (strpos(strtolower($this->valor1), "e")) ? (float)$this->valor1 : $this->valor1; 
              $this->valor1 = (string)$this->valor1; 
              $this->propina = (strpos(strtolower($this->propina), "e")) ? (float)$this->propina : $this->propina; 
              $this->propina = (string)$this->propina; 
              $this->importetotal = (strpos(strtolower($this->importetotal), "e")) ? (float)$this->importetotal : $this->importetotal; 
              $this->importetotal = (string)$this->importetotal; 
              $this->formato = (string)$this->formato; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['parms'] = "estab?#?$this->estab?@?ptoemi?#?$this->ptoemi?@?secuencial?#?$this->secuencial?@?lote?#?$this->lote?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dados_select'] = $this->nmgp_dados_select;
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
              $this->razonsocial = "";  
              $this->nmgp_dados_form["razonsocial"] = $this->razonsocial;
              $this->nombrecomercial = "";  
              $this->nmgp_dados_form["nombrecomercial"] = $this->nombrecomercial;
              $this->ruc = "";  
              $this->nmgp_dados_form["ruc"] = $this->ruc;
              $this->coddoc = "";  
              $this->nmgp_dados_form["coddoc"] = $this->coddoc;
              $this->estab = "";  
              $this->nmgp_dados_form["estab"] = $this->estab;
              $this->ptoemi = "";  
              $this->nmgp_dados_form["ptoemi"] = $this->ptoemi;
              $this->secuencial = "";  
              $this->nmgp_dados_form["secuencial"] = $this->secuencial;
              $this->lote = "";  
              $this->nmgp_dados_form["lote"] = $this->lote;
              $this->dirmatriz = "";  
              $this->nmgp_dados_form["dirmatriz"] = $this->dirmatriz;
              $this->fechaemision = "";  
              $this->nmgp_dados_form["fechaemision"] = $this->fechaemision;
              $this->direstablecimiento = "";  
              $this->nmgp_dados_form["direstablecimiento"] = $this->direstablecimiento;
              $this->numcontribuyenteespecial = "";  
              $this->nmgp_dados_form["numcontribuyenteespecial"] = $this->numcontribuyenteespecial;
              $this->obligadocontabilidad = "";  
              $this->nmgp_dados_form["obligadocontabilidad"] = $this->obligadocontabilidad;
              $this->tipoidentcomprador = "";  
              $this->nmgp_dados_form["tipoidentcomprador"] = $this->tipoidentcomprador;
              $this->guiaremision = "";  
              $this->nmgp_dados_form["guiaremision"] = $this->guiaremision;
              $this->razonsocialcomprador = "";  
              $this->nmgp_dados_form["razonsocialcomprador"] = $this->razonsocialcomprador;
              $this->idcomprador = "";  
              $this->nmgp_dados_form["idcomprador"] = $this->idcomprador;
              $this->totalsinimpuestos = "";  
              $this->nmgp_dados_form["totalsinimpuestos"] = $this->totalsinimpuestos;
              $this->totaldescuento = "";  
              $this->nmgp_dados_form["totaldescuento"] = $this->totaldescuento;
              $this->base_12 = "";  
              $this->nmgp_dados_form["base_12"] = $this->base_12;
              $this->base_0 = "";  
              $this->nmgp_dados_form["base_0"] = $this->base_0;
              $this->codimpuesto = "";  
              $this->nmgp_dados_form["codimpuesto"] = $this->codimpuesto;
              $this->codporcentajeimpuesto = "";  
              $this->nmgp_dados_form["codporcentajeimpuesto"] = $this->codporcentajeimpuesto;
              $this->baseimponible1 = "";  
              $this->nmgp_dados_form["baseimponible1"] = $this->baseimponible1;
              $this->tarifa1 = "";  
              $this->nmgp_dados_form["tarifa1"] = $this->tarifa1;
              $this->valor1 = "";  
              $this->nmgp_dados_form["valor1"] = $this->valor1;
              $this->propina = "";  
              $this->nmgp_dados_form["propina"] = $this->propina;
              $this->importetotal = "";  
              $this->nmgp_dados_form["importetotal"] = $this->importetotal;
              $this->moneda = "";  
              $this->nmgp_dados_form["moneda"] = $this->moneda;
              $this->formato = "";  
              $this->nmgp_dados_form["formato"] = $this->formato;
              $this->campoadicional1 = "";  
              $this->nmgp_dados_form["campoadicional1"] = $this->campoadicional1;
              $this->valoradicional1 = "";  
              $this->nmgp_dados_form["valoradicional1"] = $this->valoradicional1;
              $this->campoadicional2 = "";  
              $this->nmgp_dados_form["campoadicional2"] = $this->campoadicional2;
              $this->valoradicional2 = "";  
              $this->nmgp_dados_form["valoradicional2"] = $this->valoradicional2;
              $this->campoadicional3 = "";  
              $this->nmgp_dados_form["campoadicional3"] = $this->campoadicional3;
              $this->valoradicional3 = "";  
              $this->nmgp_dados_form["valoradicional3"] = $this->valoradicional3;
              $this->campoadicional4 = "";  
              $this->nmgp_dados_form["campoadicional4"] = $this->campoadicional4;
              $this->valoradicional4 = "";  
              $this->nmgp_dados_form["valoradicional4"] = $this->valoradicional4;
              $this->campoadicional5 = "";  
              $this->nmgp_dados_form["campoadicional5"] = $this->campoadicional5;
              $this->valoradicional5 = "";  
              $this->nmgp_dados_form["valoradicional5"] = $this->valoradicional5;
              $this->campoadicional6 = "";  
              $this->nmgp_dados_form["campoadicional6"] = $this->campoadicional6;
              $this->valoradicional6 = "";  
              $this->nmgp_dados_form["valoradicional6"] = $this->valoradicional6;
              $this->campoadicional7 = "";  
              $this->nmgp_dados_form["campoadicional7"] = $this->campoadicional7;
              $this->valoradicional7 = "";  
              $this->nmgp_dados_form["valoradicional7"] = $this->valoradicional7;
              $this->campoadicional8 = "";  
              $this->nmgp_dados_form["campoadicional8"] = $this->campoadicional8;
              $this->valoradicional8 = "";  
              $this->nmgp_dados_form["valoradicional8"] = $this->valoradicional8;
              $this->campoadicional9 = "";  
              $this->nmgp_dados_form["campoadicional9"] = $this->campoadicional9;
              $this->valoradicional9 = "";  
              $this->nmgp_dados_form["valoradicional9"] = $this->valoradicional9;
              $this->campoadicional10 = "";  
              $this->nmgp_dados_form["campoadicional10"] = $this->campoadicional10;
              $this->valoradicional10 = "";  
              $this->nmgp_dados_form["valoradicional10"] = $this->valoradicional10;
              $this->campoadicional11 = "";  
              $this->nmgp_dados_form["campoadicional11"] = $this->campoadicional11;
              $this->valoradicional11 = "";  
              $this->nmgp_dados_form["valoradicional11"] = $this->valoradicional11;
              $this->campoadicional12 = "";  
              $this->nmgp_dados_form["campoadicional12"] = $this->campoadicional12;
              $this->valoradicional12 = "";  
              $this->nmgp_dados_form["valoradicional12"] = $this->valoradicional12;
              $this->campoadicional13 = "";  
              $this->nmgp_dados_form["campoadicional13"] = $this->campoadicional13;
              $this->valoradicional13 = "";  
              $this->nmgp_dados_form["valoradicional13"] = $this->valoradicional13;
              $this->campoadicional14 = "";  
              $this->nmgp_dados_form["campoadicional14"] = $this->campoadicional14;
              $this->valoradicional14 = "";  
              $this->nmgp_dados_form["valoradicional14"] = $this->valoradicional14;
              $this->campoadicional15 = "";  
              $this->nmgp_dados_form["campoadicional15"] = $this->campoadicional15;
              $this->valoradicional15 = "";  
              $this->nmgp_dados_form["valoradicional15"] = $this->valoradicional15;
              $this->campoadicional16 = "";  
              $this->nmgp_dados_form["campoadicional16"] = $this->campoadicional16;
              $this->valoradicional16 = "";  
              $this->nmgp_dados_form["valoradicional16"] = $this->valoradicional16;
              $this->campoadicional17 = "";  
              $this->nmgp_dados_form["campoadicional17"] = $this->campoadicional17;
              $this->valoradicional17 = "";  
              $this->nmgp_dados_form["valoradicional17"] = $this->valoradicional17;
              $this->campoadicional18 = "";  
              $this->nmgp_dados_form["campoadicional18"] = $this->campoadicional18;
              $this->valoradicional18 = "";  
              $this->nmgp_dados_form["valoradicional18"] = $this->valoradicional18;
              $this->campoadicional19 = "";  
              $this->nmgp_dados_form["campoadicional19"] = $this->campoadicional19;
              $this->valoradicional19 = "";  
              $this->nmgp_dados_form["valoradicional19"] = $this->valoradicional19;
              $this->campoadicional20 = "";  
              $this->nmgp_dados_form["campoadicional20"] = $this->campoadicional20;
              $this->valoradicional20 = "";  
              $this->nmgp_dados_form["valoradicional20"] = $this->valoradicional20;
              $this->detalle_factura = "";  
              $this->nmgp_dados_form["detalle_factura"] = $this->detalle_factura;
              $this->num_fact = "";  
              $this->nmgp_dados_form["num_fact"] = $this->num_fact;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['foreign_key'] as $sFKName => $sFKValue)
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
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['form_DETALLE_FACTURA_mob_script_case_init'] ]['form_DETALLE_FACTURA_mob']['embutida_parms'] = "NM_btn_insert*scinN*scoutNM_btn_update*scinN*scoutNM_btn_delete*scinN*scoutNM_btn_navega*scinN*scout";
  }
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp']['record_state'][$sc_seq_vert]['buttons']['update'];
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_FACTURA_bkp_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_FACTURA_bkp_mob_form0.php");
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("razonsocial", "nombrecomercial", "ruc", "coddoc", "estab", "ptoemi", "secuencial", "lote", "dirmatriz", "fechaemision", "direstablecimiento", "numcontribuyenteespecial", "obligadocontabilidad", "tipoidentcomprador", "guiaremision", "razonsocialcomprador", "idcomprador", "totalsinimpuestos", "totaldescuento", "base_12", "base_0", "codimpuesto", "codporcentajeimpuesto", "baseimponible1", "tarifa1", "valor1", "propina", "importetotal", "moneda", "formato", "campoadicional1", "valoradicional1", "campoadicional2", "valoradicional2", "campoadicional3", "valoradicional3", "campoadicional4", "valoradicional4", "campoadicional5", "valoradicional5", "campoadicional6", "valoradicional6", "campoadicional7", "valoradicional7", "campoadicional8", "valoradicional8", "campoadicional9", "valoradicional9", "campoadicional10", "valoradicional10", "campoadicional11", "valoradicional11", "campoadicional12", "valoradicional12", "campoadicional13", "valoradicional13", "campoadicional14", "valoradicional14", "campoadicional15", "valoradicional15", "campoadicional16", "valoradicional16", "campoadicional17", "valoradicional17", "campoadicional18", "valoradicional18", "campoadicional19", "valoradicional19", "campoadicional20", "valoradicional20"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['csrf_token'];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_FACTURA_bkp_mob_pack_ajax_response();
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
              $this->SC_monta_condicao($comando, "RAZONSOCIAL", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "NOMBRECOMERCIAL", $arg_search, $data_search);
          }
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
              $this->SC_monta_condicao($comando, "DIRMATRIZ", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "FECHAEMISION", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "DIRESTABLECIMIENTO", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "NUMCONTRIBUYENTEESPECIAL", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "OBLIGADOCONTABILIDAD", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "TIPOIDENTCOMPRADOR", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "GUIAREMISION", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "RAZONSOCIALCOMPRADOR", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "IDCOMPRADOR", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "TOTALSINIMPUESTOS", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "TOTALDESCUENTO", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "BASE_12", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "BASE_0", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CODIMPUESTO", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CODPORCENTAJEIMPUESTO", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "BASEIMPONIBLE1", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "TARIFA1", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALOR1", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "PROPINA", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "IMPORTETOTAL", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "MONEDA", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "FORMATO", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CAMPOADICIONAL1", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL1", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CAMPOADICIONAL2", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL2", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CAMPOADICIONAL3", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL3", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CAMPOADICIONAL4", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL4", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CAMPOADICIONAL5", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL5", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CAMPOADICIONAL6", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL6", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CAMPOADICIONAL7", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL7", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CAMPOADICIONAL8", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL8", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CAMPOADICIONAL9", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL9", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CAMPOADICIONAL10", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL10", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CAMPOADICIONAL11", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL11", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CAMPOADICIONAL12", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL12", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CAMPOADICIONAL13", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL13", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CAMPOADICIONAL14", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL14", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CAMPOADICIONAL15", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL15", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CAMPOADICIONAL16", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL16", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CAMPOADICIONAL17", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL17", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CAMPOADICIONAL18", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL18", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CAMPOADICIONAL19", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL19", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CAMPOADICIONAL20", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VALORADICIONAL20", $arg_search, $data_search);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_FACTURA_bkp_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['total'] = $qt_geral_reg_form_FACTURA_bkp_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_FACTURA_bkp_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_FACTURA_bkp_mob_pack_ajax_response();
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
      $nm_numeric[] = "coddoc";$nm_numeric[] = "estab";$nm_numeric[] = "ptoemi";$nm_numeric[] = "secuencial";$nm_numeric[] = "numcontribuyenteespecial";$nm_numeric[] = "tipoidentcomprador";$nm_numeric[] = "totalsinimpuestos";$nm_numeric[] = "totaldescuento";$nm_numeric[] = "base_12";$nm_numeric[] = "base_0";$nm_numeric[] = "codimpuesto";$nm_numeric[] = "codporcentajeimpuesto";$nm_numeric[] = "baseimponible1";$nm_numeric[] = "tarifa1";$nm_numeric[] = "valor1";$nm_numeric[] = "propina";$nm_numeric[] = "importetotal";$nm_numeric[] = "formato";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['decimal_db'] == ".")
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
       $nmgp_saida_form = "form_FACTURA_bkp_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_FACTURA_bkp_mob_fim.php";
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
       form_FACTURA_bkp_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['masterValue']);
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_FACTURA_mob']['reg_start'] = "";
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_FACTURA_mob']['total']);
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob'][substr($val, 1, -1)];
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['opc_ant'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_FACTURA_bkp_mob']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           form_FACTURA_bkp_mob_pack_ajax_response();
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
       form_FACTURA_bkp_mob_pack_ajax_response();
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
