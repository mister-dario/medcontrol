<?php
class pdfreport_ORDEN_TRABAJO_grid
{
   var $Ini;
   var $Erro;
   var $Pdf;
   var $Db;
   var $rs_grid;
   var $nm_grid_sem_reg;
   var $SC_seq_register;
   var $nm_location;
   var $nm_data;
   var $nm_cod_barra;
   var $sc_proc_grid; 
   var $nmgp_botoes = array();
   var $Campos_Mens_erro;
   var $NM_raiz_img; 
   var $Font_ttf; 
   var $ice = array();
   var $ca_bar = array();
   var $detalle = array();
   var $detalle_cantidad = array();
   var $detalle_codigo = array();
   var $detalle_descuento = array();
   var $detalle_item = array();
   var $detalle_preciototalsinimpuesto = array();
   var $detalle_preciounitario = array();
   var $direccion = array();
   var $fecha_auth_format = array();
   var $label_atencion = array();
   var $label_ca = array();
   var $label_codcliente = array();
   var $label_contr_especial = array();
   var $label_descuento = array();
   var $label_dircliente = array();
   var $label_fecha_auth = array();
   var $label_fecha_emision = array();
   var $label_file = array();
   var $label_formapago = array();
   var $label_guia_remision = array();
   var $label_iva = array();
   var $label_lote = array();
   var $label_nom_cliente = array();
   var $label_num_auth = array();
   var $label_obligado_cont = array();
   var $label_promo = array();
   var $label_ruccliente = array();
   var $label_stexento = array();
   var $label_stgravado = array();
   var $label_subtotal = array();
   var $label_suma_letras = array();
   var $label_telfcliente = array();
   var $label_vence = array();
   var $label_vendedor = array();
   var $razonsocial = array();
   var $ruc = array();
   var $estab = array();
   var $ptoemi = array();
   var $secuencial = array();
   var $lote = array();
   var $dirmatriz = array();
   var $fechaemision = array();
   var $direstablecimiento = array();
   var $numcontribuyenteespecial = array();
   var $obligadocontabilidad = array();
   var $guiaremision = array();
   var $razonsocialcomprador = array();
   var $idcomprador = array();
   var $base_12 = array();
   var $base_0 = array();
   var $totalsinimpuestos = array();
   var $totaldescuento = array();
   var $tarifa1 = array();
   var $valor1 = array();
   var $propina = array();
   var $importetotal = array();
   var $campoadicional1 = array();
   var $valoradicional1 = array();
   var $campoadicional2 = array();
   var $valoradicional2 = array();
   var $campoadicional3 = array();
   var $valoradicional3 = array();
   var $campoadicional4 = array();
   var $valoradicional4 = array();
   var $campoadicional5 = array();
   var $valoradicional5 = array();
   var $campoadicional6 = array();
   var $valoradicional6 = array();
   var $campoadicional7 = array();
   var $valoradicional7 = array();
   var $campoadicional8 = array();
   var $valoradicional8 = array();
   var $campoadicional9 = array();
   var $valoradicional9 = array();
   var $campoadicional10 = array();
   var $valoradicional10 = array();
   var $campoadicional11 = array();
   var $valoradicional11 = array();
   var $campoadicional12 = array();
   var $valoradicional12 = array();
   var $campoadicional13 = array();
   var $valoradicional13 = array();
   var $campoadicional14 = array();
   var $valoradicional14 = array();
   var $campoadicional15 = array();
   var $valoradicional15 = array();
   var $campoadicional16 = array();
   var $valoradicional16 = array();
   var $campoadicional17 = array();
   var $valoradicional17 = array();
   var $campoadicional18 = array();
   var $valoradicional18 = array();
   var $campoadicional19 = array();
   var $valoradicional19 = array();
   var $campoadicional20 = array();
   var $valoradicional20 = array();
//--- 
 function monta_grid($linhas = 0)
 {

   clearstatcache();
   $this->inicializa();
   $this->grid();
 }
//--- 
 function inicializa()
 {
   global $nm_saida, 
   $rec, $nmgp_chave, $nmgp_opcao, $nmgp_ordem, $nmgp_chave_det, 
   $nmgp_quant_linhas, $nmgp_quant_colunas, $nmgp_url_saida, $nmgp_parms;
//
   include_once($this->Ini->path_third . "/barcodegen/class/BCGFont.php");
   include_once($this->Ini->path_third . "/barcodegen/class/BCGColor.php");
   include_once($this->Ini->path_third . "/barcodegen/class/BCGDrawing.php");
   include_once($this->Ini->path_third . "/barcodegen/class/BCGcode128.barcode.php");
   $this->nm_data = new nm_data("es");
   include_once("../_lib/lib/php/nm_font_tcpdf.php");
   $this->default_font = '';
   $this->default_font_sr  = 'Helvetica';
   $this->default_style    = '';
   $this->default_style_sr = 'B';
   $Tp_papel = "A4";
   $old_dir = getcwd();
   $File_font_ttf     = "";
   $temp_font_ttf     = "";
   $this->Font_ttf    = false;
   $this->Font_ttf_sr = false;
   if (empty($this->default_font) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font))
   {
       $this->default_font = "Times";
   }
   if (empty($this->default_font_sr) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font_sr = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font_sr))
   {
       $this->default_font_sr = "Times";
   }
   $_SESSION['scriptcase']['pdfreport_ORDEN_TRABAJO']['default_font'] = $this->default_font;
   chdir($this->Ini->path_third . "/tcpdf/");
   include_once("tcpdf.php");
   chdir($old_dir);
   $this->Pdf = new TCPDF('P', 'mm', $Tp_papel, true, 'UTF-8', false);
   $this->Pdf->setPrintHeader(false);
   $this->Pdf->setPrintFooter(false);
   if (!empty($File_font_ttf))
   {
       $this->Pdf->addTTFfont($File_font_ttf, "", "", 32, $_SESSION['scriptcase']['dir_temp'] . "/");
   }
   $this->Pdf->SetDisplayMode('real');
   $this->aba_iframe = false;
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("pdfreport_ORDEN_TRABAJO", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->razonsocial[0] = $Busca_temp['razonsocial']; 
       $tmp_pos = strpos($this->razonsocial[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->razonsocial[0]))
       {
           $this->razonsocial[0] = substr($this->razonsocial[0], 0, $tmp_pos);
       }
       $this->ruc[0] = $Busca_temp['ruc']; 
       $tmp_pos = strpos($this->ruc[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->ruc[0]))
       {
           $this->ruc[0] = substr($this->ruc[0], 0, $tmp_pos);
       }
       $this->estab[0] = $Busca_temp['estab']; 
       $tmp_pos = strpos($this->estab[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->estab[0]))
       {
           $this->estab[0] = substr($this->estab[0], 0, $tmp_pos);
       }
       $this->ptoemi[0] = $Busca_temp['ptoemi']; 
       $tmp_pos = strpos($this->ptoemi[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->ptoemi[0]))
       {
           $this->ptoemi[0] = substr($this->ptoemi[0], 0, $tmp_pos);
       }
       $this->valoradicional14[0] = $Busca_temp['valoradicional14']; 
       $tmp_pos = strpos($this->valoradicional14[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->valoradicional14[0]))
       {
           $this->valoradicional14[0] = substr($this->valoradicional14[0], 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_ORDEN_TRABAJO']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_ORDEN_TRABAJO']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_ORDEN_TRABAJO']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_ORDEN_TRABAJO']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['where_orig'] = " where ESTAB=" . $_SESSION['var_estab'] . " AND PTOEMI=" . $_SESSION['var_ptoemi'] . " AND SECUENCIAL=" . $_SESSION['var_secuencial'] . " AND LOTE='" . $_SESSION['var_lote'] . "'";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT RAZONSOCIAL, RUC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, BASE_12, BASE_0, TOTALSINIMPUESTOS, TOTALDESCUENTO, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT RAZONSOCIAL, RUC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, BASE_12, BASE_0, TOTALSINIMPUESTOS, TOTALDESCUENTO, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT RAZONSOCIAL, RUC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, BASE_12, BASE_0, TOTALSINIMPUESTOS, TOTALDESCUENTO, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT RAZONSOCIAL, RUC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, BASE_12, BASE_0, TOTALSINIMPUESTOS, TOTALDESCUENTO, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT RAZONSOCIAL, RUC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, BASE_12, BASE_0, TOTALSINIMPUESTOS, TOTALDESCUENTO, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT RAZONSOCIAL, RUC, ESTAB, PTOEMI, SECUENCIAL, LOTE, DIRMATRIZ, FECHAEMISION, DIRESTABLECIMIENTO, NUMCONTRIBUYENTEESPECIAL, OBLIGADOCONTABILIDAD, GUIAREMISION, RAZONSOCIALCOMPRADOR, IDCOMPRADOR, BASE_12, BASE_0, TOTALSINIMPUESTOS, TOTALDESCUENTO, TARIFA1, VALOR1, PROPINA, IMPORTETOTAL, CAMPOADICIONAL1, VALORADICIONAL1, CAMPOADICIONAL2, VALORADICIONAL2, CAMPOADICIONAL3, VALORADICIONAL3, CAMPOADICIONAL4, VALORADICIONAL4, CAMPOADICIONAL5, VALORADICIONAL5, CAMPOADICIONAL6, VALORADICIONAL6, CAMPOADICIONAL7, VALORADICIONAL7, CAMPOADICIONAL8, VALORADICIONAL8, CAMPOADICIONAL9, VALORADICIONAL9, CAMPOADICIONAL10, VALORADICIONAL10, CAMPOADICIONAL11, VALORADICIONAL11, CAMPOADICIONAL12, VALORADICIONAL12, CAMPOADICIONAL13, VALORADICIONAL13, CAMPOADICIONAL14, VALORADICIONAL14, CAMPOADICIONAL15, VALORADICIONAL15, CAMPOADICIONAL16, VALORADICIONAL16, CAMPOADICIONAL17, VALORADICIONAL17, CAMPOADICIONAL18, VALORADICIONAL18, CAMPOADICIONAL19, VALORADICIONAL19, CAMPOADICIONAL20, VALORADICIONAL20 from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['ordem_desc']; 
   } 
   if (!empty($campos_order_select)) 
   { 
       if (!empty($nmgp_order_by)) 
       { 
          $nmgp_order_by .= ", " . $campos_order_select; 
       } 
       else 
       { 
          $nmgp_order_by = " order by $campos_order_select"; 
       } 
   } 
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['order_grid'] = $nmgp_order_by;
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
   { 
       $this->nm_grid_sem_reg = $this->SC_conv_utf8($this->Ini->Nm_lang['lang_errm_empt']); 
   }  
// 
 }  
// 
 function Pdf_init()
 {
     if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
     {
         $this->Pdf->setRTL(true);
     }
     $this->Pdf->setHeaderMargin(0);
     $this->Pdf->setFooterMargin(0);
     $this->Pdf->setCellMargins($left = 0, $top = 0, $right = 0, $bottom = 0);
     $this->Pdf->SetAutoPageBreak(true, 0);
     if ($this->Font_ttf)
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12);
     }
     $this->Pdf->SetTextColor(0, 0, 0);
 }
// 
 function Pdf_image()
 {
   if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
   {
       $this->Pdf->setRTL(false);
   }
   $SV_margin = $this->Pdf->getBreakMargin();
   $SV_auto_page_break = $this->Pdf->getAutoPageBreak();
   $this->Pdf->SetAutoPageBreak(false, 0);
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/grp__NM__img__NM__facturas_f1.jpg", "0.000000", "0.000000", "209", "296", '', '', '', false, 300, '', false, false, 0);
   $this->Pdf->SetAutoPageBreak($SV_auto_page_break, $SV_margin);
   $this->Pdf->setPageMark();
   if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
   {
       $this->Pdf->setRTL(true);
   }
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida, $nm_url_saida;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['razonsocial'] = "RAZONSOCIAL";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['ruc'] = "RUC";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['estab'] = "ESTAB";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['ptoemi'] = "PTOEMI";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['secuencial'] = "SECUENCIAL";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['lote'] = "LOTE";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['dirmatriz'] = "DIRMATRIZ";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['fechaemision'] = "FECHAEMISION";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['direstablecimiento'] = "DIRESTABLECIMIENTO";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['numcontribuyenteespecial'] = "NUMCONTRIBUYENTEESPECIAL";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['obligadocontabilidad'] = "OBLIGADOCONTABILIDAD";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['guiaremision'] = "GUIAREMISION";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['razonsocialcomprador'] = "RAZONSOCIALCOMPRADOR";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['idcomprador'] = "IDCOMPRADOR";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['base_12'] = "BASE 12";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['base_0'] = "BASE";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['totalsinimpuestos'] = "TOTALSINIMPUESTOS";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['totaldescuento'] = "TOTALDESCUENTO";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['tarifa1'] = "TARIFA1";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['valor1'] = "VALOR1";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['propina'] = "PROPINA";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['importetotal'] = "IMPORTETOTAL";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['campoadicional1'] = "CAMPOADICIONAL1";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['valoradicional1'] = "VALORADICIONAL1";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['campoadicional2'] = "CAMPOADICIONAL2";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['valoradicional2'] = "VALORADICIONAL2";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['campoadicional3'] = "CAMPOADICIONAL3";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['valoradicional3'] = "VALORADICIONAL3";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['campoadicional4'] = "CAMPOADICIONAL4";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['valoradicional4'] = "VALORADICIONAL4";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['campoadicional5'] = "CAMPOADICIONAL5";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['valoradicional5'] = "VALORADICIONAL5";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['campoadicional6'] = "CAMPOADICIONAL6";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['valoradicional6'] = "VALORADICIONAL6";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['campoadicional7'] = "CAMPOADICIONAL7";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['valoradicional7'] = "VALORADICIONAL7";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['campoadicional8'] = "CAMPOADICIONAL8";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['valoradicional8'] = "VALORADICIONAL8";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['campoadicional9'] = "CAMPOADICIONAL9";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['valoradicional9'] = "VALORADICIONAL9";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['campoadicional10'] = "CAMPOADICIONAL10";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['valoradicional10'] = "VALORADICIONAL10";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['campoadicional11'] = "CAMPOADICIONAL11";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['valoradicional11'] = "VALORADICIONAL11";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['campoadicional12'] = "CAMPOADICIONAL12";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['valoradicional12'] = "VALORADICIONAL12";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['campoadicional13'] = "CAMPOADICIONAL13";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['valoradicional13'] = "VALORADICIONAL13";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['campoadicional14'] = "CAMPOADICIONAL14";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['valoradicional14'] = "VALORADICIONAL14";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['campoadicional15'] = "CAMPOADICIONAL15";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['valoradicional15'] = "VALORADICIONAL15";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['campoadicional16'] = "CAMPOADICIONAL16";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['valoradicional16'] = "VALORADICIONAL16";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['campoadicional17'] = "CAMPOADICIONAL17";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['valoradicional17'] = "VALORADICIONAL17";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['campoadicional18'] = "CAMPOADICIONAL18";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['valoradicional18'] = "VALORADICIONAL18";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['campoadicional19'] = "CAMPOADICIONAL19";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['valoradicional19'] = "VALORADICIONAL19";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['campoadicional20'] = "CAMPOADICIONAL20";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['valoradicional20'] = "VALORADICIONAL20";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['ice'] = "ICE";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['ca_bar'] = "ca_bar";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['detalle'] = "detalle";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['detalle_cantidad'] = "CANTIDAD";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['detalle_codigo'] = "CODIGO";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['detalle_descuento'] = "DESCUENTO";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['detalle_item'] = "ITEM";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['detalle_preciototalsinimpuesto'] = "PRECIOTOTALSINIMPUESTO";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['detalle_preciounitario'] = "PRECIOUNITARIO";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['direccion'] = "direccion";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['fecha_auth_format'] = "fecha_auth_format";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['label_atencion'] = "label_atencion";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['label_ca'] = "label_ca";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['label_codcliente'] = "label_codcliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['label_contr_especial'] = "label_contr_especial";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['label_descuento'] = "label_descuento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['label_dircliente'] = "label_dircliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['label_fecha_auth'] = "label_fecha_auth";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['label_fecha_emision'] = "label_fecha_emision";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['label_file'] = "label_file";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['label_formapago'] = "label_formapago";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['label_guia_remision'] = "label_guia_remision";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['label_iva'] = "label_iva";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['label_lote'] = "label_lote";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['label_nom_cliente'] = "label_nom_cliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['label_num_auth'] = "label_num_auth";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['label_obligado_cont'] = "label_obligado_cont";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['label_promo'] = "label_promo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['label_ruccliente'] = "label_ruccliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['label_stexento'] = "label_stexento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['label_stgravado'] = "label_stgravado";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['label_subtotal'] = "label_subtotal";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['label_suma_letras'] = "label_suma_letras";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['label_telfcliente'] = "label_telfcliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['label_vence'] = "label_vence";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['labels']['label_vendedor'] = "label_vendedor";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_ORDEN_TRABAJO']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_ORDEN_TRABAJO']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_ORDEN_TRABAJO']['lig_edit'];
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       $this->Pdf_init();
       $this->Pdf->AddPage();
       if ($this->Font_ttf_sr)
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12, $this->def_TTF);
       }
       else
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12);
       }
       $this->Pdf->SetTextColor(0, 0, 0);
       $this->Pdf->Text(0.000000, 0.000000, html_entity_decode($this->nm_grid_sem_reg, ENT_COMPAT, $_SESSION['scriptcase']['charset']));
       $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
       return;
   }
// 
   $Init_Pdf = true;
   $this->SC_seq_register = 0; 
   while (!$this->rs_grid->EOF) 
   {  
      $this->nm_grid_colunas = 0; 
      $nm_quant_linhas = 0;
      $this->Pdf->setImageScale(1.33);
      $this->Pdf->AddPage();
      $this->Pdf_init();
      $this->Pdf_image();
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ORDEN_TRABAJO']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->razonsocial[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->ruc[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->estab[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->estab[$this->nm_grid_colunas] = (string)$this->estab[$this->nm_grid_colunas];
          $this->ptoemi[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->ptoemi[$this->nm_grid_colunas] = (string)$this->ptoemi[$this->nm_grid_colunas];
          $this->secuencial[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->secuencial[$this->nm_grid_colunas] = (string)$this->secuencial[$this->nm_grid_colunas];
          $this->lote[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->dirmatriz[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->fechaemision[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->direstablecimiento[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->numcontribuyenteespecial[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->numcontribuyenteespecial[$this->nm_grid_colunas] = (string)$this->numcontribuyenteespecial[$this->nm_grid_colunas];
          $this->obligadocontabilidad[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->guiaremision[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->razonsocialcomprador[$this->nm_grid_colunas] = $this->rs_grid->fields[12] ;  
          $this->idcomprador[$this->nm_grid_colunas] = $this->rs_grid->fields[13] ;  
          $this->base_12[$this->nm_grid_colunas] = $this->rs_grid->fields[14] ;  
          $this->base_12[$this->nm_grid_colunas] = (strpos(strtolower($this->base_12[$this->nm_grid_colunas]), "e")) ? (float)$this->base_12[$this->nm_grid_colunas] : $this->base_12[$this->nm_grid_colunas]; 
          $this->base_12[$this->nm_grid_colunas] = (string)$this->base_12[$this->nm_grid_colunas];
          $this->base_0[$this->nm_grid_colunas] = $this->rs_grid->fields[15] ;  
          $this->base_0[$this->nm_grid_colunas] = (strpos(strtolower($this->base_0[$this->nm_grid_colunas]), "e")) ? (float)$this->base_0[$this->nm_grid_colunas] : $this->base_0[$this->nm_grid_colunas]; 
          $this->base_0[$this->nm_grid_colunas] = (string)$this->base_0[$this->nm_grid_colunas];
          $this->totalsinimpuestos[$this->nm_grid_colunas] = $this->rs_grid->fields[16] ;  
          $this->totalsinimpuestos[$this->nm_grid_colunas] = (strpos(strtolower($this->totalsinimpuestos[$this->nm_grid_colunas]), "e")) ? (float)$this->totalsinimpuestos[$this->nm_grid_colunas] : $this->totalsinimpuestos[$this->nm_grid_colunas]; 
          $this->totalsinimpuestos[$this->nm_grid_colunas] = (string)$this->totalsinimpuestos[$this->nm_grid_colunas];
          $this->totaldescuento[$this->nm_grid_colunas] = $this->rs_grid->fields[17] ;  
          $this->totaldescuento[$this->nm_grid_colunas] = (strpos(strtolower($this->totaldescuento[$this->nm_grid_colunas]), "e")) ? (float)$this->totaldescuento[$this->nm_grid_colunas] : $this->totaldescuento[$this->nm_grid_colunas]; 
          $this->totaldescuento[$this->nm_grid_colunas] = (string)$this->totaldescuento[$this->nm_grid_colunas];
          $this->tarifa1[$this->nm_grid_colunas] = $this->rs_grid->fields[18] ;  
          $this->tarifa1[$this->nm_grid_colunas] = (strpos(strtolower($this->tarifa1[$this->nm_grid_colunas]), "e")) ? (float)$this->tarifa1[$this->nm_grid_colunas] : $this->tarifa1[$this->nm_grid_colunas]; 
          $this->tarifa1[$this->nm_grid_colunas] = (string)$this->tarifa1[$this->nm_grid_colunas];
          $this->valor1[$this->nm_grid_colunas] = $this->rs_grid->fields[19] ;  
          $this->valor1[$this->nm_grid_colunas] = (strpos(strtolower($this->valor1[$this->nm_grid_colunas]), "e")) ? (float)$this->valor1[$this->nm_grid_colunas] : $this->valor1[$this->nm_grid_colunas]; 
          $this->valor1[$this->nm_grid_colunas] = (string)$this->valor1[$this->nm_grid_colunas];
          $this->propina[$this->nm_grid_colunas] = $this->rs_grid->fields[20] ;  
          $this->propina[$this->nm_grid_colunas] = (strpos(strtolower($this->propina[$this->nm_grid_colunas]), "e")) ? (float)$this->propina[$this->nm_grid_colunas] : $this->propina[$this->nm_grid_colunas]; 
          $this->propina[$this->nm_grid_colunas] = (string)$this->propina[$this->nm_grid_colunas];
          $this->importetotal[$this->nm_grid_colunas] = $this->rs_grid->fields[21] ;  
          $this->importetotal[$this->nm_grid_colunas] = (strpos(strtolower($this->importetotal[$this->nm_grid_colunas]), "e")) ? (float)$this->importetotal[$this->nm_grid_colunas] : $this->importetotal[$this->nm_grid_colunas]; 
          $this->importetotal[$this->nm_grid_colunas] = (string)$this->importetotal[$this->nm_grid_colunas];
          $this->campoadicional1[$this->nm_grid_colunas] = $this->rs_grid->fields[22] ;  
          $this->valoradicional1[$this->nm_grid_colunas] = $this->rs_grid->fields[23] ;  
          $this->campoadicional2[$this->nm_grid_colunas] = $this->rs_grid->fields[24] ;  
          $this->valoradicional2[$this->nm_grid_colunas] = $this->rs_grid->fields[25] ;  
          $this->campoadicional3[$this->nm_grid_colunas] = $this->rs_grid->fields[26] ;  
          $this->valoradicional3[$this->nm_grid_colunas] = $this->rs_grid->fields[27] ;  
          $this->campoadicional4[$this->nm_grid_colunas] = $this->rs_grid->fields[28] ;  
          $this->valoradicional4[$this->nm_grid_colunas] = $this->rs_grid->fields[29] ;  
          $this->campoadicional5[$this->nm_grid_colunas] = $this->rs_grid->fields[30] ;  
          $this->valoradicional5[$this->nm_grid_colunas] = $this->rs_grid->fields[31] ;  
          $this->campoadicional6[$this->nm_grid_colunas] = $this->rs_grid->fields[32] ;  
          $this->valoradicional6[$this->nm_grid_colunas] = $this->rs_grid->fields[33] ;  
          $this->campoadicional7[$this->nm_grid_colunas] = $this->rs_grid->fields[34] ;  
          $this->valoradicional7[$this->nm_grid_colunas] = $this->rs_grid->fields[35] ;  
          $this->campoadicional8[$this->nm_grid_colunas] = $this->rs_grid->fields[36] ;  
          $this->valoradicional8[$this->nm_grid_colunas] = $this->rs_grid->fields[37] ;  
          $this->campoadicional9[$this->nm_grid_colunas] = $this->rs_grid->fields[38] ;  
          $this->valoradicional9[$this->nm_grid_colunas] = $this->rs_grid->fields[39] ;  
          $this->campoadicional10[$this->nm_grid_colunas] = $this->rs_grid->fields[40] ;  
          $this->valoradicional10[$this->nm_grid_colunas] = $this->rs_grid->fields[41] ;  
          $this->campoadicional11[$this->nm_grid_colunas] = $this->rs_grid->fields[42] ;  
          $this->valoradicional11[$this->nm_grid_colunas] = $this->rs_grid->fields[43] ;  
          $this->campoadicional12[$this->nm_grid_colunas] = $this->rs_grid->fields[44] ;  
          $this->valoradicional12[$this->nm_grid_colunas] = $this->rs_grid->fields[45] ;  
          $this->campoadicional13[$this->nm_grid_colunas] = $this->rs_grid->fields[46] ;  
          $this->valoradicional13[$this->nm_grid_colunas] = $this->rs_grid->fields[47] ;  
          $this->campoadicional14[$this->nm_grid_colunas] = $this->rs_grid->fields[48] ;  
          $this->valoradicional14[$this->nm_grid_colunas] = $this->rs_grid->fields[49] ;  
          $this->campoadicional15[$this->nm_grid_colunas] = $this->rs_grid->fields[50] ;  
          $this->valoradicional15[$this->nm_grid_colunas] = $this->rs_grid->fields[51] ;  
          $this->campoadicional16[$this->nm_grid_colunas] = $this->rs_grid->fields[52] ;  
          $this->valoradicional16[$this->nm_grid_colunas] = $this->rs_grid->fields[53] ;  
          $this->campoadicional17[$this->nm_grid_colunas] = $this->rs_grid->fields[54] ;  
          $this->valoradicional17[$this->nm_grid_colunas] = $this->rs_grid->fields[55] ;  
          $this->campoadicional18[$this->nm_grid_colunas] = $this->rs_grid->fields[56] ;  
          $this->valoradicional18[$this->nm_grid_colunas] = $this->rs_grid->fields[57] ;  
          $this->campoadicional19[$this->nm_grid_colunas] = $this->rs_grid->fields[58] ;  
          $this->valoradicional19[$this->nm_grid_colunas] = $this->rs_grid->fields[59] ;  
          $this->campoadicional20[$this->nm_grid_colunas] = $this->rs_grid->fields[60] ;  
          $this->valoradicional20[$this->nm_grid_colunas] = $this->rs_grid->fields[61] ;  
          $this->detalle_cantidad[$this->nm_grid_colunas] = array();
          $this->detalle_codigo[$this->nm_grid_colunas] = array();
          $this->detalle_descuento[$this->nm_grid_colunas] = array();
          $this->detalle_item[$this->nm_grid_colunas] = array();
          $this->detalle_preciototalsinimpuesto[$this->nm_grid_colunas] = array();
          $this->detalle_preciounitario[$this->nm_grid_colunas] = array();
          $this->Lookup->lookup_detalle($this->detalle[$this->nm_grid_colunas] , $this->estab[$this->nm_grid_colunas], $this->ptoemi[$this->nm_grid_colunas], $this->secuencial[$this->nm_grid_colunas], $this->lote[$this->nm_grid_colunas], $array_detalle); 
          $NM_ind = 0;
          $this->detalle = array();
          foreach ($array_detalle as $cada_subselect) 
          {
              $this->detalle[$this->nm_grid_colunas][$NM_ind] = "";
              $this->detalle_codigo[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[0];
              $this->detalle_item[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[1];
              $this->detalle_cantidad[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[2];
              $this->detalle_preciounitario[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[3];
              $this->detalle_descuento[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[4];
              $this->detalle_preciototalsinimpuesto[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[5];
              $NM_ind++;
          }
          $this->ice[$this->nm_grid_colunas] = "";
          $this->ca_bar[$this->nm_grid_colunas] = "";
          $this->direccion[$this->nm_grid_colunas] = "";
          $this->fecha_auth_format[$this->nm_grid_colunas] = "";
          $this->label_atencion[$this->nm_grid_colunas] = "";
          $this->label_ca[$this->nm_grid_colunas] = "";
          $this->label_codcliente[$this->nm_grid_colunas] = "";
          $this->label_contr_especial[$this->nm_grid_colunas] = "";
          $this->label_descuento[$this->nm_grid_colunas] = "";
          $this->label_dircliente[$this->nm_grid_colunas] = "";
          $this->label_fecha_auth[$this->nm_grid_colunas] = "";
          $this->label_fecha_emision[$this->nm_grid_colunas] = "";
          $this->label_file[$this->nm_grid_colunas] = "";
          $this->label_formapago[$this->nm_grid_colunas] = "";
          $this->label_guia_remision[$this->nm_grid_colunas] = "";
          $this->label_iva[$this->nm_grid_colunas] = "";
          $this->label_lote[$this->nm_grid_colunas] = "";
          $this->label_nom_cliente[$this->nm_grid_colunas] = "";
          $this->label_num_auth[$this->nm_grid_colunas] = "";
          $this->label_obligado_cont[$this->nm_grid_colunas] = "";
          $this->label_promo[$this->nm_grid_colunas] = "";
          $this->label_ruccliente[$this->nm_grid_colunas] = "";
          $this->label_stexento[$this->nm_grid_colunas] = "";
          $this->label_stgravado[$this->nm_grid_colunas] = "";
          $this->label_subtotal[$this->nm_grid_colunas] = "";
          $this->label_suma_letras[$this->nm_grid_colunas] = "";
          $this->label_telfcliente[$this->nm_grid_colunas] = "";
          $this->label_vence[$this->nm_grid_colunas] = "";
          $this->label_vendedor[$this->nm_grid_colunas] = "";
          $_SESSION['scriptcase']['pdfreport_ORDEN_TRABAJO']['contr_erro'] = 'on';
 $this->label_codcliente[$this->nm_grid_colunas] ="R.U.C.:";
$this->label_nom_cliente[$this->nm_grid_colunas] ="Cliente:";
$this->label_ruccliente[$this->nm_grid_colunas] ="RUC/CI:";
$this->label_fecha_emision[$this->nm_grid_colunas] ="Fecha de emisión:";
$this->label_telfcliente[$this->nm_grid_colunas] ="Teléfono:";
$this->label_dircliente[$this->nm_grid_colunas] ="Dirección:";

$this->label_subtotal[$this->nm_grid_colunas] ="Subtotal";
$this->label_descuento[$this->nm_grid_colunas] ="Descuento";
$this->label_stexento[$this->nm_grid_colunas] ="Subtotal 0%";
$this->label_stgravado[$this->nm_grid_colunas] ="Subtotal ".$this->tarifa1[$this->nm_grid_colunas] ."%";
$this->label_iva[$this->nm_grid_colunas] ="IVA ".$this->tarifa1[$this->nm_grid_colunas] ."%";

$this->totalsinimpuestos[$this->nm_grid_colunas] =$this->totalsinimpuestos[$this->nm_grid_colunas] +$this->totaldescuento[$this->nm_grid_colunas] ;
	
$check_sql = "SELECT SUM(VALORICE)"
   . " FROM DETALLE_FACTURA"
   . " WHERE CODIMPICE > 0 AND ESTAB =".$this->estab[$this->nm_grid_colunas] ." AND PTOEMI=".$this->ptoemi[$this->nm_grid_colunas] ." AND SECUENCIAL=".$this->secuencial[$this->nm_grid_colunas] ." AND LOTE='".$this->lote[$this->nm_grid_colunas] ."'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs[$this->nm_grid_colunas] = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->rs[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs[$this->nm_grid_colunas] = false;
          $this->rs_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;

if(isset($this->rs[$this->nm_grid_colunas][0][0])) {
	
	$this->ice[$this->nm_grid_colunas] =$this->rs[$this->nm_grid_colunas][0][0];	
}

else {
	
	$this->ice[$this->nm_grid_colunas] =0;
}
$_SESSION['scriptcase']['pdfreport_ORDEN_TRABAJO']['contr_erro'] = 'off';
          $this->razonsocial[$this->nm_grid_colunas] = sc_strip_script($this->razonsocial[$this->nm_grid_colunas]);
          if ($this->razonsocial[$this->nm_grid_colunas] === "") 
          { 
              $this->razonsocial[$this->nm_grid_colunas] = "" ;  
          } 
          $this->razonsocial[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->razonsocial[$this->nm_grid_colunas]);
          $this->ruc[$this->nm_grid_colunas] = sc_strip_script($this->ruc[$this->nm_grid_colunas]);
          if ($this->ruc[$this->nm_grid_colunas] === "") 
          { 
              $this->ruc[$this->nm_grid_colunas] = "" ;  
          } 
          $this->ruc[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ruc[$this->nm_grid_colunas]);
          $this->estab[$this->nm_grid_colunas] = sc_strip_script($this->estab[$this->nm_grid_colunas]);
          if ($this->estab[$this->nm_grid_colunas] === "") 
          { 
              $this->estab[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->estab[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->estab[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->estab[$this->nm_grid_colunas]);
          $this->ptoemi[$this->nm_grid_colunas] = sc_strip_script($this->ptoemi[$this->nm_grid_colunas]);
          if ($this->ptoemi[$this->nm_grid_colunas] === "") 
          { 
              $this->ptoemi[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->ptoemi[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->ptoemi[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ptoemi[$this->nm_grid_colunas]);
          $this->secuencial[$this->nm_grid_colunas] = sc_strip_script($this->secuencial[$this->nm_grid_colunas]);
          if ($this->secuencial[$this->nm_grid_colunas] === "") 
          { 
              $this->secuencial[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->secuencial[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->secuencial[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->secuencial[$this->nm_grid_colunas]);
          $this->lote[$this->nm_grid_colunas] = sc_strip_script($this->lote[$this->nm_grid_colunas]);
          if ($this->lote[$this->nm_grid_colunas] === "") 
          { 
              $this->lote[$this->nm_grid_colunas] = "" ;  
          } 
          $this->lote[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->lote[$this->nm_grid_colunas]);
          $this->dirmatriz[$this->nm_grid_colunas] = sc_strip_script($this->dirmatriz[$this->nm_grid_colunas]);
          if ($this->dirmatriz[$this->nm_grid_colunas] === "") 
          { 
              $this->dirmatriz[$this->nm_grid_colunas] = "" ;  
          } 
          $this->dirmatriz[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->dirmatriz[$this->nm_grid_colunas]);
          $this->fechaemision[$this->nm_grid_colunas] = sc_strip_script($this->fechaemision[$this->nm_grid_colunas]);
          if ($this->fechaemision[$this->nm_grid_colunas] === "") 
          { 
              $this->fechaemision[$this->nm_grid_colunas] = "" ;  
          } 
          $this->fechaemision[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fechaemision[$this->nm_grid_colunas]);
          $this->direstablecimiento[$this->nm_grid_colunas] = sc_strip_script($this->direstablecimiento[$this->nm_grid_colunas]);
          if ($this->direstablecimiento[$this->nm_grid_colunas] === "") 
          { 
              $this->direstablecimiento[$this->nm_grid_colunas] = "" ;  
          } 
          $this->direstablecimiento[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->direstablecimiento[$this->nm_grid_colunas]);
          $this->numcontribuyenteespecial[$this->nm_grid_colunas] = sc_strip_script($this->numcontribuyenteespecial[$this->nm_grid_colunas]);
          if ($this->numcontribuyenteespecial[$this->nm_grid_colunas] === "") 
          { 
              $this->numcontribuyenteespecial[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->numcontribuyenteespecial[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->numcontribuyenteespecial[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->numcontribuyenteespecial[$this->nm_grid_colunas]);
          $this->obligadocontabilidad[$this->nm_grid_colunas] = sc_strip_script($this->obligadocontabilidad[$this->nm_grid_colunas]);
          if ($this->obligadocontabilidad[$this->nm_grid_colunas] === "") 
          { 
              $this->obligadocontabilidad[$this->nm_grid_colunas] = "" ;  
          } 
          $this->obligadocontabilidad[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->obligadocontabilidad[$this->nm_grid_colunas]);
          $this->guiaremision[$this->nm_grid_colunas] = sc_strip_script($this->guiaremision[$this->nm_grid_colunas]);
          if ($this->guiaremision[$this->nm_grid_colunas] === "") 
          { 
              $this->guiaremision[$this->nm_grid_colunas] = "" ;  
          } 
          $this->guiaremision[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->guiaremision[$this->nm_grid_colunas]);
          $this->razonsocialcomprador[$this->nm_grid_colunas] = sc_strip_script($this->razonsocialcomprador[$this->nm_grid_colunas]);
          if ($this->razonsocialcomprador[$this->nm_grid_colunas] === "") 
          { 
              $this->razonsocialcomprador[$this->nm_grid_colunas] = "" ;  
          } 
          $this->razonsocialcomprador[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->razonsocialcomprador[$this->nm_grid_colunas]);
          $this->idcomprador[$this->nm_grid_colunas] = sc_strip_script($this->idcomprador[$this->nm_grid_colunas]);
          if ($this->idcomprador[$this->nm_grid_colunas] === "") 
          { 
              $this->idcomprador[$this->nm_grid_colunas] = "" ;  
          } 
          $this->idcomprador[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idcomprador[$this->nm_grid_colunas]);
          $this->base_12[$this->nm_grid_colunas] = sc_strip_script($this->base_12[$this->nm_grid_colunas]);
          if ($this->base_12[$this->nm_grid_colunas] === "") 
          { 
              $this->base_12[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->base_12[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->base_12[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->base_12[$this->nm_grid_colunas]);
          $this->base_0[$this->nm_grid_colunas] = sc_strip_script($this->base_0[$this->nm_grid_colunas]);
          if ($this->base_0[$this->nm_grid_colunas] === "") 
          { 
              $this->base_0[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->base_0[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->base_0[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->base_0[$this->nm_grid_colunas]);
          $this->totalsinimpuestos[$this->nm_grid_colunas] = sc_strip_script($this->totalsinimpuestos[$this->nm_grid_colunas]);
          if ($this->totalsinimpuestos[$this->nm_grid_colunas] === "") 
          { 
              $this->totalsinimpuestos[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->totalsinimpuestos[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->totalsinimpuestos[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->totalsinimpuestos[$this->nm_grid_colunas]);
          $this->totaldescuento[$this->nm_grid_colunas] = sc_strip_script($this->totaldescuento[$this->nm_grid_colunas]);
          if ($this->totaldescuento[$this->nm_grid_colunas] === "") 
          { 
              $this->totaldescuento[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->totaldescuento[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->totaldescuento[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->totaldescuento[$this->nm_grid_colunas]);
          $this->tarifa1[$this->nm_grid_colunas] = sc_strip_script($this->tarifa1[$this->nm_grid_colunas]);
          if ($this->tarifa1[$this->nm_grid_colunas] === "") 
          { 
              $this->tarifa1[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->tarifa1[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->tarifa1[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tarifa1[$this->nm_grid_colunas]);
          $this->valor1[$this->nm_grid_colunas] = sc_strip_script($this->valor1[$this->nm_grid_colunas]);
          if ($this->valor1[$this->nm_grid_colunas] === "") 
          { 
              $this->valor1[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->valor1[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->valor1[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->valor1[$this->nm_grid_colunas]);
          $this->propina[$this->nm_grid_colunas] = sc_strip_script($this->propina[$this->nm_grid_colunas]);
          if ($this->propina[$this->nm_grid_colunas] === "") 
          { 
              $this->propina[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->propina[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->propina[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->propina[$this->nm_grid_colunas]);
          $this->importetotal[$this->nm_grid_colunas] = sc_strip_script($this->importetotal[$this->nm_grid_colunas]);
          if ($this->importetotal[$this->nm_grid_colunas] === "") 
          { 
              $this->importetotal[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->importetotal[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->importetotal[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->importetotal[$this->nm_grid_colunas]);
          $this->campoadicional1[$this->nm_grid_colunas] = sc_strip_script($this->campoadicional1[$this->nm_grid_colunas]);
          if ($this->campoadicional1[$this->nm_grid_colunas] === "") 
          { 
              $this->campoadicional1[$this->nm_grid_colunas] = "" ;  
          } 
          $this->campoadicional1[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->campoadicional1[$this->nm_grid_colunas]);
          $this->valoradicional1[$this->nm_grid_colunas] = sc_strip_script($this->valoradicional1[$this->nm_grid_colunas]);
          if ($this->valoradicional1[$this->nm_grid_colunas] === "") 
          { 
              $this->valoradicional1[$this->nm_grid_colunas] = "" ;  
          } 
          $this->valoradicional1[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->valoradicional1[$this->nm_grid_colunas]);
          $this->campoadicional2[$this->nm_grid_colunas] = sc_strip_script($this->campoadicional2[$this->nm_grid_colunas]);
          if ($this->campoadicional2[$this->nm_grid_colunas] === "") 
          { 
              $this->campoadicional2[$this->nm_grid_colunas] = "" ;  
          } 
          $this->campoadicional2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->campoadicional2[$this->nm_grid_colunas]);
          $this->valoradicional2[$this->nm_grid_colunas] = sc_strip_script($this->valoradicional2[$this->nm_grid_colunas]);
          if ($this->valoradicional2[$this->nm_grid_colunas] === "") 
          { 
              $this->valoradicional2[$this->nm_grid_colunas] = "" ;  
          } 
          $this->valoradicional2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->valoradicional2[$this->nm_grid_colunas]);
          $this->campoadicional3[$this->nm_grid_colunas] = sc_strip_script($this->campoadicional3[$this->nm_grid_colunas]);
          if ($this->campoadicional3[$this->nm_grid_colunas] === "") 
          { 
              $this->campoadicional3[$this->nm_grid_colunas] = "" ;  
          } 
          $this->campoadicional3[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->campoadicional3[$this->nm_grid_colunas]);
          $this->valoradicional3[$this->nm_grid_colunas] = sc_strip_script($this->valoradicional3[$this->nm_grid_colunas]);
          if ($this->valoradicional3[$this->nm_grid_colunas] === "") 
          { 
              $this->valoradicional3[$this->nm_grid_colunas] = "" ;  
          } 
          $this->valoradicional3[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->valoradicional3[$this->nm_grid_colunas]);
          $this->campoadicional4[$this->nm_grid_colunas] = sc_strip_script($this->campoadicional4[$this->nm_grid_colunas]);
          if ($this->campoadicional4[$this->nm_grid_colunas] === "") 
          { 
              $this->campoadicional4[$this->nm_grid_colunas] = "" ;  
          } 
          $this->campoadicional4[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->campoadicional4[$this->nm_grid_colunas]);
          $this->valoradicional4[$this->nm_grid_colunas] = sc_strip_script($this->valoradicional4[$this->nm_grid_colunas]);
          if ($this->valoradicional4[$this->nm_grid_colunas] === "") 
          { 
              $this->valoradicional4[$this->nm_grid_colunas] = "" ;  
          } 
          $this->valoradicional4[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->valoradicional4[$this->nm_grid_colunas]);
          $this->campoadicional5[$this->nm_grid_colunas] = sc_strip_script($this->campoadicional5[$this->nm_grid_colunas]);
          if ($this->campoadicional5[$this->nm_grid_colunas] === "") 
          { 
              $this->campoadicional5[$this->nm_grid_colunas] = "" ;  
          } 
          $this->campoadicional5[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->campoadicional5[$this->nm_grid_colunas]);
          $this->valoradicional5[$this->nm_grid_colunas] = sc_strip_script($this->valoradicional5[$this->nm_grid_colunas]);
          if ($this->valoradicional5[$this->nm_grid_colunas] === "") 
          { 
              $this->valoradicional5[$this->nm_grid_colunas] = "" ;  
          } 
          $this->valoradicional5[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->valoradicional5[$this->nm_grid_colunas]);
          $this->campoadicional6[$this->nm_grid_colunas] = sc_strip_script($this->campoadicional6[$this->nm_grid_colunas]);
          if ($this->campoadicional6[$this->nm_grid_colunas] === "") 
          { 
              $this->campoadicional6[$this->nm_grid_colunas] = "" ;  
          } 
          $this->campoadicional6[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->campoadicional6[$this->nm_grid_colunas]);
          $this->valoradicional6[$this->nm_grid_colunas] = sc_strip_script($this->valoradicional6[$this->nm_grid_colunas]);
          if ($this->valoradicional6[$this->nm_grid_colunas] === "") 
          { 
              $this->valoradicional6[$this->nm_grid_colunas] = "" ;  
          } 
          $this->valoradicional6[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->valoradicional6[$this->nm_grid_colunas]);
          $this->campoadicional7[$this->nm_grid_colunas] = sc_strip_script($this->campoadicional7[$this->nm_grid_colunas]);
          if ($this->campoadicional7[$this->nm_grid_colunas] === "") 
          { 
              $this->campoadicional7[$this->nm_grid_colunas] = "" ;  
          } 
          $this->campoadicional7[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->campoadicional7[$this->nm_grid_colunas]);
          $this->valoradicional7[$this->nm_grid_colunas] = sc_strip_script($this->valoradicional7[$this->nm_grid_colunas]);
          if ($this->valoradicional7[$this->nm_grid_colunas] === "") 
          { 
              $this->valoradicional7[$this->nm_grid_colunas] = "" ;  
          } 
          $this->valoradicional7[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->valoradicional7[$this->nm_grid_colunas]);
          $this->campoadicional8[$this->nm_grid_colunas] = sc_strip_script($this->campoadicional8[$this->nm_grid_colunas]);
          if ($this->campoadicional8[$this->nm_grid_colunas] === "") 
          { 
              $this->campoadicional8[$this->nm_grid_colunas] = "" ;  
          } 
          $this->campoadicional8[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->campoadicional8[$this->nm_grid_colunas]);
          $this->valoradicional8[$this->nm_grid_colunas] = sc_strip_script($this->valoradicional8[$this->nm_grid_colunas]);
          if ($this->valoradicional8[$this->nm_grid_colunas] === "") 
          { 
              $this->valoradicional8[$this->nm_grid_colunas] = "" ;  
          } 
          $this->valoradicional8[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->valoradicional8[$this->nm_grid_colunas]);
          $this->campoadicional9[$this->nm_grid_colunas] = sc_strip_script($this->campoadicional9[$this->nm_grid_colunas]);
          if ($this->campoadicional9[$this->nm_grid_colunas] === "") 
          { 
              $this->campoadicional9[$this->nm_grid_colunas] = "" ;  
          } 
          $this->campoadicional9[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->campoadicional9[$this->nm_grid_colunas]);
          $this->valoradicional9[$this->nm_grid_colunas] = sc_strip_script($this->valoradicional9[$this->nm_grid_colunas]);
          if ($this->valoradicional9[$this->nm_grid_colunas] === "") 
          { 
              $this->valoradicional9[$this->nm_grid_colunas] = "" ;  
          } 
          $this->valoradicional9[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->valoradicional9[$this->nm_grid_colunas]);
          $this->campoadicional10[$this->nm_grid_colunas] = sc_strip_script($this->campoadicional10[$this->nm_grid_colunas]);
          if ($this->campoadicional10[$this->nm_grid_colunas] === "") 
          { 
              $this->campoadicional10[$this->nm_grid_colunas] = "" ;  
          } 
          $this->campoadicional10[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->campoadicional10[$this->nm_grid_colunas]);
          $this->valoradicional10[$this->nm_grid_colunas] = sc_strip_script($this->valoradicional10[$this->nm_grid_colunas]);
          if ($this->valoradicional10[$this->nm_grid_colunas] === "") 
          { 
              $this->valoradicional10[$this->nm_grid_colunas] = "" ;  
          } 
          $this->valoradicional10[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->valoradicional10[$this->nm_grid_colunas]);
          $this->campoadicional11[$this->nm_grid_colunas] = sc_strip_script($this->campoadicional11[$this->nm_grid_colunas]);
          if ($this->campoadicional11[$this->nm_grid_colunas] === "") 
          { 
              $this->campoadicional11[$this->nm_grid_colunas] = "" ;  
          } 
          $this->campoadicional11[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->campoadicional11[$this->nm_grid_colunas]);
          $this->valoradicional11[$this->nm_grid_colunas] = sc_strip_script($this->valoradicional11[$this->nm_grid_colunas]);
          if ($this->valoradicional11[$this->nm_grid_colunas] === "") 
          { 
              $this->valoradicional11[$this->nm_grid_colunas] = "" ;  
          } 
          $this->valoradicional11[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->valoradicional11[$this->nm_grid_colunas]);
          $this->campoadicional12[$this->nm_grid_colunas] = sc_strip_script($this->campoadicional12[$this->nm_grid_colunas]);
          if ($this->campoadicional12[$this->nm_grid_colunas] === "") 
          { 
              $this->campoadicional12[$this->nm_grid_colunas] = "" ;  
          } 
          $this->campoadicional12[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->campoadicional12[$this->nm_grid_colunas]);
          $this->valoradicional12[$this->nm_grid_colunas] = sc_strip_script($this->valoradicional12[$this->nm_grid_colunas]);
          if ($this->valoradicional12[$this->nm_grid_colunas] === "") 
          { 
              $this->valoradicional12[$this->nm_grid_colunas] = "" ;  
          } 
          $this->valoradicional12[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->valoradicional12[$this->nm_grid_colunas]);
          $this->campoadicional13[$this->nm_grid_colunas] = sc_strip_script($this->campoadicional13[$this->nm_grid_colunas]);
          if ($this->campoadicional13[$this->nm_grid_colunas] === "") 
          { 
              $this->campoadicional13[$this->nm_grid_colunas] = "" ;  
          } 
          $this->campoadicional13[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->campoadicional13[$this->nm_grid_colunas]);
          $this->valoradicional13[$this->nm_grid_colunas] = sc_strip_script($this->valoradicional13[$this->nm_grid_colunas]);
          if ($this->valoradicional13[$this->nm_grid_colunas] === "") 
          { 
              $this->valoradicional13[$this->nm_grid_colunas] = "" ;  
          } 
          $this->valoradicional13[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->valoradicional13[$this->nm_grid_colunas]);
          $this->campoadicional14[$this->nm_grid_colunas] = sc_strip_script($this->campoadicional14[$this->nm_grid_colunas]);
          if ($this->campoadicional14[$this->nm_grid_colunas] === "") 
          { 
              $this->campoadicional14[$this->nm_grid_colunas] = "" ;  
          } 
          $this->campoadicional14[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->campoadicional14[$this->nm_grid_colunas]);
          $this->valoradicional14[$this->nm_grid_colunas] = sc_strip_script($this->valoradicional14[$this->nm_grid_colunas]);
          if ($this->valoradicional14[$this->nm_grid_colunas] === "") 
          { 
              $this->valoradicional14[$this->nm_grid_colunas] = "" ;  
          } 
          $this->valoradicional14[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->valoradicional14[$this->nm_grid_colunas]);
          $this->campoadicional15[$this->nm_grid_colunas] = sc_strip_script($this->campoadicional15[$this->nm_grid_colunas]);
          if ($this->campoadicional15[$this->nm_grid_colunas] === "") 
          { 
              $this->campoadicional15[$this->nm_grid_colunas] = "" ;  
          } 
          $this->campoadicional15[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->campoadicional15[$this->nm_grid_colunas]);
          $this->valoradicional15[$this->nm_grid_colunas] = sc_strip_script($this->valoradicional15[$this->nm_grid_colunas]);
          if ($this->valoradicional15[$this->nm_grid_colunas] === "") 
          { 
              $this->valoradicional15[$this->nm_grid_colunas] = "" ;  
          } 
          $this->valoradicional15[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->valoradicional15[$this->nm_grid_colunas]);
          $this->campoadicional16[$this->nm_grid_colunas] = sc_strip_script($this->campoadicional16[$this->nm_grid_colunas]);
          if ($this->campoadicional16[$this->nm_grid_colunas] === "") 
          { 
              $this->campoadicional16[$this->nm_grid_colunas] = "" ;  
          } 
          $this->campoadicional16[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->campoadicional16[$this->nm_grid_colunas]);
          $this->valoradicional16[$this->nm_grid_colunas] = sc_strip_script($this->valoradicional16[$this->nm_grid_colunas]);
          if ($this->valoradicional16[$this->nm_grid_colunas] === "") 
          { 
              $this->valoradicional16[$this->nm_grid_colunas] = "" ;  
          } 
          $this->valoradicional16[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->valoradicional16[$this->nm_grid_colunas]);
          $this->campoadicional17[$this->nm_grid_colunas] = sc_strip_script($this->campoadicional17[$this->nm_grid_colunas]);
          if ($this->campoadicional17[$this->nm_grid_colunas] === "") 
          { 
              $this->campoadicional17[$this->nm_grid_colunas] = "" ;  
          } 
          $this->campoadicional17[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->campoadicional17[$this->nm_grid_colunas]);
          $this->valoradicional17[$this->nm_grid_colunas] = sc_strip_script($this->valoradicional17[$this->nm_grid_colunas]);
          if ($this->valoradicional17[$this->nm_grid_colunas] === "") 
          { 
              $this->valoradicional17[$this->nm_grid_colunas] = "" ;  
          } 
          $this->valoradicional17[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->valoradicional17[$this->nm_grid_colunas]);
          $this->campoadicional18[$this->nm_grid_colunas] = sc_strip_script($this->campoadicional18[$this->nm_grid_colunas]);
          if ($this->campoadicional18[$this->nm_grid_colunas] === "") 
          { 
              $this->campoadicional18[$this->nm_grid_colunas] = "" ;  
          } 
          $this->campoadicional18[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->campoadicional18[$this->nm_grid_colunas]);
          $this->valoradicional18[$this->nm_grid_colunas] = sc_strip_script($this->valoradicional18[$this->nm_grid_colunas]);
          if ($this->valoradicional18[$this->nm_grid_colunas] === "") 
          { 
              $this->valoradicional18[$this->nm_grid_colunas] = "" ;  
          } 
          $this->valoradicional18[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->valoradicional18[$this->nm_grid_colunas]);
          $this->campoadicional19[$this->nm_grid_colunas] = sc_strip_script($this->campoadicional19[$this->nm_grid_colunas]);
          if ($this->campoadicional19[$this->nm_grid_colunas] === "") 
          { 
              $this->campoadicional19[$this->nm_grid_colunas] = "" ;  
          } 
          $this->campoadicional19[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->campoadicional19[$this->nm_grid_colunas]);
          $this->valoradicional19[$this->nm_grid_colunas] = sc_strip_script($this->valoradicional19[$this->nm_grid_colunas]);
          if ($this->valoradicional19[$this->nm_grid_colunas] === "") 
          { 
              $this->valoradicional19[$this->nm_grid_colunas] = "" ;  
          } 
          $this->valoradicional19[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->valoradicional19[$this->nm_grid_colunas]);
          $this->campoadicional20[$this->nm_grid_colunas] = sc_strip_script($this->campoadicional20[$this->nm_grid_colunas]);
          if ($this->campoadicional20[$this->nm_grid_colunas] === "") 
          { 
              $this->campoadicional20[$this->nm_grid_colunas] = "" ;  
          } 
          $this->campoadicional20[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->campoadicional20[$this->nm_grid_colunas]);
          $this->valoradicional20[$this->nm_grid_colunas] = sc_strip_script($this->valoradicional20[$this->nm_grid_colunas]);
          if ($this->valoradicional20[$this->nm_grid_colunas] === "") 
          { 
              $this->valoradicional20[$this->nm_grid_colunas] = "" ;  
          } 
          $this->valoradicional20[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->valoradicional20[$this->nm_grid_colunas]);
          if ($this->ice[$this->nm_grid_colunas] === "") 
          { 
              $this->ice[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->ice[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->ice[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ice[$this->nm_grid_colunas]);
          if ($this->ca_bar[$this->nm_grid_colunas] === "") 
          { 
              $this->ca_bar[$this->nm_grid_colunas] = "" ;  
          } 
          elseif ($this->Ini->Gd_missing)
          { 
              $this->ca_bar[$this->nm_grid_colunas] = "<span class=\"scErrorLine\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>";
          } 
          else   
          { 
              $Font_bar = new BCGFont($this->Ini->path_third . '/barcodegen/class/font/Arial.ttf', 8);
              $Color_black = new BCGColor(0, 0, 0);
              $Color_white = new BCGColor(255, 255, 255);
              $out_ca_bar = $this->Ini->path_imag_temp . "/sc_code128c_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".png";
              $_SESSION['scriptcase']['sc_num_img']++ ;
              $this->ca_bar[$this->nm_grid_colunas] = (string) $this->ca_bar[$this->nm_grid_colunas];
              $Code_bar = new BCGcode128();
              $Code_bar->setScale(1);
              $Code_bar->setThickness(30);
              $Code_bar->setForegroundColor($Color_black);
              $Code_bar->setBackgroundColor($Color_white);
              $Code_bar->setFont($Font_bar);
              $Code_bar->setStart('C');
              $Code_bar->setTilde(true);
              $Code_bar->parse($this->ca_bar[$this->nm_grid_colunas]);
              $Drawing_bar = new BCGDrawing($this->Ini->root . $out_ca_bar, $Color_white);
              $Drawing_bar->setBarcode($Code_bar);
              $Drawing_bar->setDPI(150);
              $Drawing_bar->draw();
              $Drawing_bar->finish(BCGDrawing::IMG_FORMAT_PNG);
          } 
              $this->ca_bar[$this->nm_grid_colunas] = $this->NM_raiz_img . $out_ca_bar;
          $this->ca_bar[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ca_bar[$this->nm_grid_colunas]);
          if ($this->direccion[$this->nm_grid_colunas] === "") 
          { 
              $this->direccion[$this->nm_grid_colunas] = "" ;  
          } 
          $this->direccion[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->direccion[$this->nm_grid_colunas]);
          if ($this->fecha_auth_format[$this->nm_grid_colunas] === "") 
          { 
              $this->fecha_auth_format[$this->nm_grid_colunas] = "" ;  
          } 
          $this->fecha_auth_format[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fecha_auth_format[$this->nm_grid_colunas]);
          if ($this->label_atencion[$this->nm_grid_colunas] === "") 
          { 
              $this->label_atencion[$this->nm_grid_colunas] = "" ;  
          } 
          $this->label_atencion[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->label_atencion[$this->nm_grid_colunas]);
          if ($this->label_ca[$this->nm_grid_colunas] === "") 
          { 
              $this->label_ca[$this->nm_grid_colunas] = "" ;  
          } 
          $this->label_ca[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->label_ca[$this->nm_grid_colunas]);
          if ($this->label_codcliente[$this->nm_grid_colunas] === "") 
          { 
              $this->label_codcliente[$this->nm_grid_colunas] = "" ;  
          } 
          $this->label_codcliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->label_codcliente[$this->nm_grid_colunas]);
          if ($this->label_contr_especial[$this->nm_grid_colunas] === "") 
          { 
              $this->label_contr_especial[$this->nm_grid_colunas] = "" ;  
          } 
          $this->label_contr_especial[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->label_contr_especial[$this->nm_grid_colunas]);
          if ($this->label_descuento[$this->nm_grid_colunas] === "") 
          { 
              $this->label_descuento[$this->nm_grid_colunas] = "" ;  
          } 
          $this->label_descuento[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->label_descuento[$this->nm_grid_colunas]);
          if ($this->label_dircliente[$this->nm_grid_colunas] === "") 
          { 
              $this->label_dircliente[$this->nm_grid_colunas] = "" ;  
          } 
          $this->label_dircliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->label_dircliente[$this->nm_grid_colunas]);
          if ($this->label_fecha_auth[$this->nm_grid_colunas] === "") 
          { 
              $this->label_fecha_auth[$this->nm_grid_colunas] = "" ;  
          } 
          $this->label_fecha_auth[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->label_fecha_auth[$this->nm_grid_colunas]);
          if ($this->label_fecha_emision[$this->nm_grid_colunas] === "") 
          { 
              $this->label_fecha_emision[$this->nm_grid_colunas] = "" ;  
          } 
          $this->label_fecha_emision[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->label_fecha_emision[$this->nm_grid_colunas]);
          if ($this->label_file[$this->nm_grid_colunas] === "") 
          { 
              $this->label_file[$this->nm_grid_colunas] = "" ;  
          } 
          $this->label_file[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->label_file[$this->nm_grid_colunas]);
          if ($this->label_formapago[$this->nm_grid_colunas] === "") 
          { 
              $this->label_formapago[$this->nm_grid_colunas] = "" ;  
          } 
          $this->label_formapago[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->label_formapago[$this->nm_grid_colunas]);
          if ($this->label_guia_remision[$this->nm_grid_colunas] === "") 
          { 
              $this->label_guia_remision[$this->nm_grid_colunas] = "" ;  
          } 
          $this->label_guia_remision[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->label_guia_remision[$this->nm_grid_colunas]);
          if ($this->label_iva[$this->nm_grid_colunas] === "") 
          { 
              $this->label_iva[$this->nm_grid_colunas] = "" ;  
          } 
          $this->label_iva[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->label_iva[$this->nm_grid_colunas]);
          if ($this->label_lote[$this->nm_grid_colunas] === "") 
          { 
              $this->label_lote[$this->nm_grid_colunas] = "" ;  
          } 
          $this->label_lote[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->label_lote[$this->nm_grid_colunas]);
          if ($this->label_nom_cliente[$this->nm_grid_colunas] === "") 
          { 
              $this->label_nom_cliente[$this->nm_grid_colunas] = "" ;  
          } 
          $this->label_nom_cliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->label_nom_cliente[$this->nm_grid_colunas]);
          if ($this->label_num_auth[$this->nm_grid_colunas] === "") 
          { 
              $this->label_num_auth[$this->nm_grid_colunas] = "" ;  
          } 
          $this->label_num_auth[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->label_num_auth[$this->nm_grid_colunas]);
          if ($this->label_obligado_cont[$this->nm_grid_colunas] === "") 
          { 
              $this->label_obligado_cont[$this->nm_grid_colunas] = "" ;  
          } 
          $this->label_obligado_cont[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->label_obligado_cont[$this->nm_grid_colunas]);
          if ($this->label_promo[$this->nm_grid_colunas] === "") 
          { 
              $this->label_promo[$this->nm_grid_colunas] = "" ;  
          } 
          $this->label_promo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->label_promo[$this->nm_grid_colunas]);
          if ($this->label_ruccliente[$this->nm_grid_colunas] === "") 
          { 
              $this->label_ruccliente[$this->nm_grid_colunas] = "" ;  
          } 
          $this->label_ruccliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->label_ruccliente[$this->nm_grid_colunas]);
          if ($this->label_stexento[$this->nm_grid_colunas] === "") 
          { 
              $this->label_stexento[$this->nm_grid_colunas] = "" ;  
          } 
          $this->label_stexento[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->label_stexento[$this->nm_grid_colunas]);
          if ($this->label_stgravado[$this->nm_grid_colunas] === "") 
          { 
              $this->label_stgravado[$this->nm_grid_colunas] = "" ;  
          } 
          $this->label_stgravado[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->label_stgravado[$this->nm_grid_colunas]);
          if ($this->label_subtotal[$this->nm_grid_colunas] === "") 
          { 
              $this->label_subtotal[$this->nm_grid_colunas] = "" ;  
          } 
          $this->label_subtotal[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->label_subtotal[$this->nm_grid_colunas]);
          if ($this->label_suma_letras[$this->nm_grid_colunas] === "") 
          { 
              $this->label_suma_letras[$this->nm_grid_colunas] = "" ;  
          } 
          $this->label_suma_letras[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->label_suma_letras[$this->nm_grid_colunas]);
          if ($this->label_telfcliente[$this->nm_grid_colunas] === "") 
          { 
              $this->label_telfcliente[$this->nm_grid_colunas] = "" ;  
          } 
          $this->label_telfcliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->label_telfcliente[$this->nm_grid_colunas]);
          if ($this->label_vence[$this->nm_grid_colunas] === "") 
          { 
              $this->label_vence[$this->nm_grid_colunas] = "" ;  
          } 
          $this->label_vence[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->label_vence[$this->nm_grid_colunas]);
          if ($this->label_vendedor[$this->nm_grid_colunas] === "") 
          { 
              $this->label_vendedor[$this->nm_grid_colunas] = "" ;  
          } 
          $this->label_vendedor[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->label_vendedor[$this->nm_grid_colunas]);
          foreach ($this->detalle_cantidad[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_cantidad[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_cantidad[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalle_cantidad[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "1", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detalle_cantidad[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_cantidad[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_codigo[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_codigo[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_codigo[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->detalle_codigo[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_codigo[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_descuento[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_descuento[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_descuento[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalle_descuento[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detalle_descuento[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_descuento[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_item[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_item[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_item[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          if ($this->detalle_item[$this->nm_grid_colunas][$NM_ind] !== "")
          { 
              $this->detalle_item[$this->nm_grid_colunas][$NM_ind] = nl2br($this->detalle_item[$this->nm_grid_colunas][$NM_ind]) ; 
              $temp = explode("<br />", $this->detalle_item[$this->nm_grid_colunas][$NM_ind]); 
              if (!isset($temp[1])) 
              { 
                  $temp = explode("<br>", $this->detalle_item[$this->nm_grid_colunas][$NM_ind]); 
              } 
              $this->detalle_item[$this->nm_grid_colunas][$NM_ind] = "" ; 
              $ind_x = 0 ; 
              while (isset($temp[$ind_x])) 
              { 
                 if (!empty($this->detalle_item[$this->nm_grid_colunas][$NM_ind])) 
                 { 
                     $this->detalle_item[$this->nm_grid_colunas][$NM_ind] .= "<br>"; 
                 } 
                 if (strlen($temp[$ind_x]) > 72) 
                 { 
                     $this->detalle_item[$this->nm_grid_colunas][$NM_ind] .= wordwrap($temp[$ind_x], 72, "<br>", true); 
                 } 
                 else 
                 { 
                     $this->detalle_item[$this->nm_grid_colunas][$NM_ind] .= $temp[$ind_x]; 
                 } 
                 $ind_x++; 
              }  
          }  
              $this->detalle_item[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_item[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_preciototalsinimpuesto[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_preciototalsinimpuesto[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_preciototalsinimpuesto[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalle_preciototalsinimpuesto[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detalle_preciototalsinimpuesto[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_preciototalsinimpuesto[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_preciounitario[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_preciounitario[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_preciounitario[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalle_preciounitario[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detalle_preciounitario[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_preciounitario[$this->nm_grid_colunas][$NM_ind]);
          }
            $cell_label_nom_cliente = array('posx' => '5', 'posy' => '53', 'data' => $this->label_nom_cliente[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_label_codcliente = array('posx' => '15', 'posy' => '39', 'data' => $this->label_codcliente[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_label_dircliente = array('posx' => '5', 'posy' => '59', 'data' => $this->label_dircliente[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_direccion = array('posx' => '22', 'posy' => '59', 'data' => $this->direccion[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_ruccliente = array('posx' => '5', 'posy' => '65', 'data' => $this->label_ruccliente[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_label_telfcliente = array('posx' => '80', 'posy' => '65', 'data' => $this->label_telfcliente[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_label_fecha_emision = array('posx' => '140', 'posy' => '65', 'data' => $this->label_fecha_emision[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_detalle_ITEM = array('posx' => '5', 'posy' => '91', 'data' => $this->detalle_item[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detalle_CANTIDAD = array('posx' => '130', 'posy' => '91', 'data' => $this->detalle_cantidad[$this->nm_grid_colunas], 'width'      => '14', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detalle_PRECIOUNITARIO = array('posx' => '155', 'posy' => '91', 'data' => $this->detalle_preciounitario[$this->nm_grid_colunas], 'width'      => '18', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detalle_PRECIOTOTALSINIMPUESTO = array('posx' => '184', 'posy' => '91', 'data' => $this->detalle_preciototalsinimpuesto[$this->nm_grid_colunas], 'width'      => '21', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_subtotal = array('posx' => '162', 'posy' => '247', 'data' => $this->label_subtotal[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_descuento = array('posx' => '162', 'posy' => '251', 'data' => $this->label_descuento[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_ICE = array('posx' => '162', 'posy' => '255', 'data' => $this->SC_conv_utf8('ICE'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_stgravado = array('posx' => '162', 'posy' => '263', 'data' => $this->label_stgravado[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_stexento = array('posx' => '162', 'posy' => '259', 'data' => $this->label_stexento[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_iva = array('posx' => '162', 'posy' => '267', 'data' => $this->label_iva[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_ICE = array('posx' => '184', 'posy' => '255', 'data' => $this->ice[$this->nm_grid_colunas], 'width'      => '21', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_vendedor = array('posx' => '75', 'posy' => '260', 'data' => $this->label_vendedor[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '7', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_label_lote = array('posx' => '90', 'posy' => '260', 'data' => $this->label_lote[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '7', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_label_promo = array('posx' => '105', 'posy' => '260', 'data' => $this->label_promo[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '7', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);


            $this->Pdf->SetFont($cell_label_nom_cliente['font_type'], $cell_label_nom_cliente['font_style'], $cell_label_nom_cliente['font_size']);
            $this->pdf_text_color($cell_label_nom_cliente['data'], $cell_label_nom_cliente['color_r'], $cell_label_nom_cliente['color_g'], $cell_label_nom_cliente['color_b']);
            if (!empty($cell_label_nom_cliente['posx']) && !empty($cell_label_nom_cliente['posy']))
            {
                $this->Pdf->SetXY($cell_label_nom_cliente['posx'], $cell_label_nom_cliente['posy']);
            }
            elseif (!empty($cell_label_nom_cliente['posx']))
            {
                $this->Pdf->SetX($cell_label_nom_cliente['posx']);
            }
            elseif (!empty($cell_label_nom_cliente['posy']))
            {
                $this->Pdf->SetY($cell_label_nom_cliente['posy']);
            }
            $this->Pdf->Cell($cell_label_nom_cliente['width'], 0, $cell_label_nom_cliente['data'], 0, 0, $cell_label_nom_cliente['align']);

            $this->Pdf->SetFont($cell_label_codcliente['font_type'], $cell_label_codcliente['font_style'], $cell_label_codcliente['font_size']);
            $this->pdf_text_color($cell_label_codcliente['data'], $cell_label_codcliente['color_r'], $cell_label_codcliente['color_g'], $cell_label_codcliente['color_b']);
            if (!empty($cell_label_codcliente['posx']) && !empty($cell_label_codcliente['posy']))
            {
                $this->Pdf->SetXY($cell_label_codcliente['posx'], $cell_label_codcliente['posy']);
            }
            elseif (!empty($cell_label_codcliente['posx']))
            {
                $this->Pdf->SetX($cell_label_codcliente['posx']);
            }
            elseif (!empty($cell_label_codcliente['posy']))
            {
                $this->Pdf->SetY($cell_label_codcliente['posy']);
            }
            $this->Pdf->Cell($cell_label_codcliente['width'], 0, $cell_label_codcliente['data'], 0, 0, $cell_label_codcliente['align']);

            $this->Pdf->SetFont($cell_label_dircliente['font_type'], $cell_label_dircliente['font_style'], $cell_label_dircliente['font_size']);
            $this->pdf_text_color($cell_label_dircliente['data'], $cell_label_dircliente['color_r'], $cell_label_dircliente['color_g'], $cell_label_dircliente['color_b']);
            if (!empty($cell_label_dircliente['posx']) && !empty($cell_label_dircliente['posy']))
            {
                $this->Pdf->SetXY($cell_label_dircliente['posx'], $cell_label_dircliente['posy']);
            }
            elseif (!empty($cell_label_dircliente['posx']))
            {
                $this->Pdf->SetX($cell_label_dircliente['posx']);
            }
            elseif (!empty($cell_label_dircliente['posy']))
            {
                $this->Pdf->SetY($cell_label_dircliente['posy']);
            }
            $this->Pdf->Cell($cell_label_dircliente['width'], 0, $cell_label_dircliente['data'], 0, 0, $cell_label_dircliente['align']);

            $this->Pdf->SetFont($cell_direccion['font_type'], $cell_direccion['font_style'], $cell_direccion['font_size']);
            $this->pdf_text_color($cell_direccion['data'], $cell_direccion['color_r'], $cell_direccion['color_g'], $cell_direccion['color_b']);
            if (!empty($cell_direccion['posx']) && !empty($cell_direccion['posy']))
            {
                $this->Pdf->SetXY($cell_direccion['posx'], $cell_direccion['posy']);
            }
            elseif (!empty($cell_direccion['posx']))
            {
                $this->Pdf->SetX($cell_direccion['posx']);
            }
            elseif (!empty($cell_direccion['posy']))
            {
                $this->Pdf->SetY($cell_direccion['posy']);
            }
            $this->Pdf->Cell($cell_direccion['width'], 0, $cell_direccion['data'], 0, 0, $cell_direccion['align']);

            $this->Pdf->SetFont($cell_label_ruccliente['font_type'], $cell_label_ruccliente['font_style'], $cell_label_ruccliente['font_size']);
            $this->pdf_text_color($cell_label_ruccliente['data'], $cell_label_ruccliente['color_r'], $cell_label_ruccliente['color_g'], $cell_label_ruccliente['color_b']);
            if (!empty($cell_label_ruccliente['posx']) && !empty($cell_label_ruccliente['posy']))
            {
                $this->Pdf->SetXY($cell_label_ruccliente['posx'], $cell_label_ruccliente['posy']);
            }
            elseif (!empty($cell_label_ruccliente['posx']))
            {
                $this->Pdf->SetX($cell_label_ruccliente['posx']);
            }
            elseif (!empty($cell_label_ruccliente['posy']))
            {
                $this->Pdf->SetY($cell_label_ruccliente['posy']);
            }
            $this->Pdf->Cell($cell_label_ruccliente['width'], 0, $cell_label_ruccliente['data'], 0, 0, $cell_label_ruccliente['align']);

            $this->Pdf->SetFont($cell_label_telfcliente['font_type'], $cell_label_telfcliente['font_style'], $cell_label_telfcliente['font_size']);
            $this->pdf_text_color($cell_label_telfcliente['data'], $cell_label_telfcliente['color_r'], $cell_label_telfcliente['color_g'], $cell_label_telfcliente['color_b']);
            if (!empty($cell_label_telfcliente['posx']) && !empty($cell_label_telfcliente['posy']))
            {
                $this->Pdf->SetXY($cell_label_telfcliente['posx'], $cell_label_telfcliente['posy']);
            }
            elseif (!empty($cell_label_telfcliente['posx']))
            {
                $this->Pdf->SetX($cell_label_telfcliente['posx']);
            }
            elseif (!empty($cell_label_telfcliente['posy']))
            {
                $this->Pdf->SetY($cell_label_telfcliente['posy']);
            }
            $this->Pdf->Cell($cell_label_telfcliente['width'], 0, $cell_label_telfcliente['data'], 0, 0, $cell_label_telfcliente['align']);

            $this->Pdf->SetFont($cell_label_fecha_emision['font_type'], $cell_label_fecha_emision['font_style'], $cell_label_fecha_emision['font_size']);
            $this->pdf_text_color($cell_label_fecha_emision['data'], $cell_label_fecha_emision['color_r'], $cell_label_fecha_emision['color_g'], $cell_label_fecha_emision['color_b']);
            if (!empty($cell_label_fecha_emision['posx']) && !empty($cell_label_fecha_emision['posy']))
            {
                $this->Pdf->SetXY($cell_label_fecha_emision['posx'], $cell_label_fecha_emision['posy']);
            }
            elseif (!empty($cell_label_fecha_emision['posx']))
            {
                $this->Pdf->SetX($cell_label_fecha_emision['posx']);
            }
            elseif (!empty($cell_label_fecha_emision['posy']))
            {
                $this->Pdf->SetY($cell_label_fecha_emision['posy']);
            }
            $this->Pdf->Cell($cell_label_fecha_emision['width'], 0, $cell_label_fecha_emision['data'], 0, 0, $cell_label_fecha_emision['align']);

            $this->Pdf->SetY(91);
            foreach ($this->detalle[$this->nm_grid_colunas] as $NM_ind => $Dados)
            {
                $this->Pdf->SetFont($cell_detalle_ITEM['font_type'], $cell_detalle_ITEM['font_style'], $cell_detalle_ITEM['font_size']);
                if (!empty($cell_detalle_ITEM['posx']))
                {
                    $this->Pdf->SetX($cell_detalle_ITEM['posx']);
                }
                $NM_partes_val = explode("<br>", $this->detalle_item[$this->nm_grid_colunas][$NM_ind]);
                $PosX = $this->Pdf->GetX();
                $Incre = false;
                $sv_Y  = $this->Pdf->GetY();
                $tmp_Y = $sv_Y;
                if (!isset($max_Y) || empty($max_Y))
                {
                    $max_Y = $sv_Y;
                }
                foreach ($NM_partes_val as $Lines)
                {
                    if ($Incre)
                    {
                        $this->Pdf->Ln(4.2333333333333);
                        $tmp_Y += 4.2333333333333;
                        $max_Y = ($tmp_Y > $max_Y) ? $tmp_Y : $max_Y;
                    }
                    $this->Pdf->SetX($PosX);
                    $this->pdf_text_color(trim($Lines), $cell_detalle_ITEM['color_r'], $cell_detalle_ITEM['color_g'], $cell_detalle_ITEM['color_b']);
                    $this->Pdf->Cell($cell_detalle_ITEM['width'], 0, trim($Lines), 0, 0, $cell_detalle_ITEM['align']);
                    $Incre = true;
                }
                $this->Pdf->SetY($sv_Y);
                $this->Pdf->SetFont($cell_detalle_CANTIDAD['font_type'], $cell_detalle_CANTIDAD['font_style'], $cell_detalle_CANTIDAD['font_size']);
                if (!empty($cell_detalle_CANTIDAD['posx']))
                {
                    $this->Pdf->SetX($cell_detalle_CANTIDAD['posx']);
                }
                $this->pdf_text_color($this->detalle_cantidad[$this->nm_grid_colunas][$NM_ind], $cell_detalle_CANTIDAD['color_r'], $cell_detalle_CANTIDAD['color_g'], $cell_detalle_CANTIDAD['color_b']);
                $this->Pdf->Cell($cell_detalle_CANTIDAD['width'], 0, $this->detalle_cantidad[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detalle_CANTIDAD['align']);
                $this->Pdf->SetFont($cell_detalle_PRECIOUNITARIO['font_type'], $cell_detalle_PRECIOUNITARIO['font_style'], $cell_detalle_PRECIOUNITARIO['font_size']);
                if (!empty($cell_detalle_PRECIOUNITARIO['posx']))
                {
                    $this->Pdf->SetX($cell_detalle_PRECIOUNITARIO['posx']);
                }
                $this->pdf_text_color($this->detalle_preciounitario[$this->nm_grid_colunas][$NM_ind], $cell_detalle_PRECIOUNITARIO['color_r'], $cell_detalle_PRECIOUNITARIO['color_g'], $cell_detalle_PRECIOUNITARIO['color_b']);
                $this->Pdf->Cell($cell_detalle_PRECIOUNITARIO['width'], 0, $this->detalle_preciounitario[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detalle_PRECIOUNITARIO['align']);
                $this->Pdf->SetFont($cell_detalle_PRECIOTOTALSINIMPUESTO['font_type'], $cell_detalle_PRECIOTOTALSINIMPUESTO['font_style'], $cell_detalle_PRECIOTOTALSINIMPUESTO['font_size']);
                if (!empty($cell_detalle_PRECIOTOTALSINIMPUESTO['posx']))
                {
                    $this->Pdf->SetX($cell_detalle_PRECIOTOTALSINIMPUESTO['posx']);
                }
                $this->pdf_text_color($this->detalle_preciototalsinimpuesto[$this->nm_grid_colunas][$NM_ind], $cell_detalle_PRECIOTOTALSINIMPUESTO['color_r'], $cell_detalle_PRECIOTOTALSINIMPUESTO['color_g'], $cell_detalle_PRECIOTOTALSINIMPUESTO['color_b']);
                $this->Pdf->Cell($cell_detalle_PRECIOTOTALSINIMPUESTO['width'], 0, $this->detalle_preciototalsinimpuesto[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detalle_PRECIOTOTALSINIMPUESTO['align']);
                if (!isset($max_Y) || empty($max_Y) || $this->Pdf->GetY() < $max_Y )
                {
                    $max_Y = $this->Pdf->GetY();
                }
                $max_Y += 4;
                $this->Pdf->SetY($max_Y);

            }

            $this->Pdf->SetFont($cell_label_subtotal['font_type'], $cell_label_subtotal['font_style'], $cell_label_subtotal['font_size']);
            $this->pdf_text_color($cell_label_subtotal['data'], $cell_label_subtotal['color_r'], $cell_label_subtotal['color_g'], $cell_label_subtotal['color_b']);
            if (!empty($cell_label_subtotal['posx']) && !empty($cell_label_subtotal['posy']))
            {
                $this->Pdf->SetXY($cell_label_subtotal['posx'], $cell_label_subtotal['posy']);
            }
            elseif (!empty($cell_label_subtotal['posx']))
            {
                $this->Pdf->SetX($cell_label_subtotal['posx']);
            }
            elseif (!empty($cell_label_subtotal['posy']))
            {
                $this->Pdf->SetY($cell_label_subtotal['posy']);
            }
            $this->Pdf->Cell($cell_label_subtotal['width'], 0, $cell_label_subtotal['data'], 0, 0, $cell_label_subtotal['align']);

            $this->Pdf->SetFont($cell_label_descuento['font_type'], $cell_label_descuento['font_style'], $cell_label_descuento['font_size']);
            $this->pdf_text_color($cell_label_descuento['data'], $cell_label_descuento['color_r'], $cell_label_descuento['color_g'], $cell_label_descuento['color_b']);
            if (!empty($cell_label_descuento['posx']) && !empty($cell_label_descuento['posy']))
            {
                $this->Pdf->SetXY($cell_label_descuento['posx'], $cell_label_descuento['posy']);
            }
            elseif (!empty($cell_label_descuento['posx']))
            {
                $this->Pdf->SetX($cell_label_descuento['posx']);
            }
            elseif (!empty($cell_label_descuento['posy']))
            {
                $this->Pdf->SetY($cell_label_descuento['posy']);
            }
            $this->Pdf->Cell($cell_label_descuento['width'], 0, $cell_label_descuento['data'], 0, 0, $cell_label_descuento['align']);

            $this->Pdf->SetFont($cell_label_ICE['font_type'], $cell_label_ICE['font_style'], $cell_label_ICE['font_size']);
            $this->pdf_text_color($cell_label_ICE['data'], $cell_label_ICE['color_r'], $cell_label_ICE['color_g'], $cell_label_ICE['color_b']);
            if (!empty($cell_label_ICE['posx']) && !empty($cell_label_ICE['posy']))
            {
                $this->Pdf->SetXY($cell_label_ICE['posx'], $cell_label_ICE['posy']);
            }
            elseif (!empty($cell_label_ICE['posx']))
            {
                $this->Pdf->SetX($cell_label_ICE['posx']);
            }
            elseif (!empty($cell_label_ICE['posy']))
            {
                $this->Pdf->SetY($cell_label_ICE['posy']);
            }
            $this->Pdf->Cell($cell_label_ICE['width'], 0, $cell_label_ICE['data'], 0, 0, $cell_label_ICE['align']);

            $this->Pdf->SetFont($cell_label_stgravado['font_type'], $cell_label_stgravado['font_style'], $cell_label_stgravado['font_size']);
            $this->pdf_text_color($cell_label_stgravado['data'], $cell_label_stgravado['color_r'], $cell_label_stgravado['color_g'], $cell_label_stgravado['color_b']);
            if (!empty($cell_label_stgravado['posx']) && !empty($cell_label_stgravado['posy']))
            {
                $this->Pdf->SetXY($cell_label_stgravado['posx'], $cell_label_stgravado['posy']);
            }
            elseif (!empty($cell_label_stgravado['posx']))
            {
                $this->Pdf->SetX($cell_label_stgravado['posx']);
            }
            elseif (!empty($cell_label_stgravado['posy']))
            {
                $this->Pdf->SetY($cell_label_stgravado['posy']);
            }
            $this->Pdf->Cell($cell_label_stgravado['width'], 0, $cell_label_stgravado['data'], 0, 0, $cell_label_stgravado['align']);

            $this->Pdf->SetFont($cell_label_stexento['font_type'], $cell_label_stexento['font_style'], $cell_label_stexento['font_size']);
            $this->pdf_text_color($cell_label_stexento['data'], $cell_label_stexento['color_r'], $cell_label_stexento['color_g'], $cell_label_stexento['color_b']);
            if (!empty($cell_label_stexento['posx']) && !empty($cell_label_stexento['posy']))
            {
                $this->Pdf->SetXY($cell_label_stexento['posx'], $cell_label_stexento['posy']);
            }
            elseif (!empty($cell_label_stexento['posx']))
            {
                $this->Pdf->SetX($cell_label_stexento['posx']);
            }
            elseif (!empty($cell_label_stexento['posy']))
            {
                $this->Pdf->SetY($cell_label_stexento['posy']);
            }
            $this->Pdf->Cell($cell_label_stexento['width'], 0, $cell_label_stexento['data'], 0, 0, $cell_label_stexento['align']);

            $this->Pdf->SetFont($cell_label_iva['font_type'], $cell_label_iva['font_style'], $cell_label_iva['font_size']);
            $this->pdf_text_color($cell_label_iva['data'], $cell_label_iva['color_r'], $cell_label_iva['color_g'], $cell_label_iva['color_b']);
            if (!empty($cell_label_iva['posx']) && !empty($cell_label_iva['posy']))
            {
                $this->Pdf->SetXY($cell_label_iva['posx'], $cell_label_iva['posy']);
            }
            elseif (!empty($cell_label_iva['posx']))
            {
                $this->Pdf->SetX($cell_label_iva['posx']);
            }
            elseif (!empty($cell_label_iva['posy']))
            {
                $this->Pdf->SetY($cell_label_iva['posy']);
            }
            $this->Pdf->Cell($cell_label_iva['width'], 0, $cell_label_iva['data'], 0, 0, $cell_label_iva['align']);

            $this->Pdf->SetFont($cell_ICE['font_type'], $cell_ICE['font_style'], $cell_ICE['font_size']);
            $this->pdf_text_color($cell_ICE['data'], $cell_ICE['color_r'], $cell_ICE['color_g'], $cell_ICE['color_b']);
            if (!empty($cell_ICE['posx']) && !empty($cell_ICE['posy']))
            {
                $this->Pdf->SetXY($cell_ICE['posx'], $cell_ICE['posy']);
            }
            elseif (!empty($cell_ICE['posx']))
            {
                $this->Pdf->SetX($cell_ICE['posx']);
            }
            elseif (!empty($cell_ICE['posy']))
            {
                $this->Pdf->SetY($cell_ICE['posy']);
            }
            $this->Pdf->Cell($cell_ICE['width'], 0, $cell_ICE['data'], 0, 0, $cell_ICE['align']);

            $this->Pdf->SetFont($cell_label_vendedor['font_type'], $cell_label_vendedor['font_style'], $cell_label_vendedor['font_size']);
            $this->pdf_text_color($cell_label_vendedor['data'], $cell_label_vendedor['color_r'], $cell_label_vendedor['color_g'], $cell_label_vendedor['color_b']);
            if (!empty($cell_label_vendedor['posx']) && !empty($cell_label_vendedor['posy']))
            {
                $this->Pdf->SetXY($cell_label_vendedor['posx'], $cell_label_vendedor['posy']);
            }
            elseif (!empty($cell_label_vendedor['posx']))
            {
                $this->Pdf->SetX($cell_label_vendedor['posx']);
            }
            elseif (!empty($cell_label_vendedor['posy']))
            {
                $this->Pdf->SetY($cell_label_vendedor['posy']);
            }
            $this->Pdf->Cell($cell_label_vendedor['width'], 0, $cell_label_vendedor['data'], 0, 0, $cell_label_vendedor['align']);

            $this->Pdf->SetFont($cell_label_lote['font_type'], $cell_label_lote['font_style'], $cell_label_lote['font_size']);
            $this->pdf_text_color($cell_label_lote['data'], $cell_label_lote['color_r'], $cell_label_lote['color_g'], $cell_label_lote['color_b']);
            if (!empty($cell_label_lote['posx']) && !empty($cell_label_lote['posy']))
            {
                $this->Pdf->SetXY($cell_label_lote['posx'], $cell_label_lote['posy']);
            }
            elseif (!empty($cell_label_lote['posx']))
            {
                $this->Pdf->SetX($cell_label_lote['posx']);
            }
            elseif (!empty($cell_label_lote['posy']))
            {
                $this->Pdf->SetY($cell_label_lote['posy']);
            }
            $this->Pdf->Cell($cell_label_lote['width'], 0, $cell_label_lote['data'], 0, 0, $cell_label_lote['align']);

            $this->Pdf->SetFont($cell_label_promo['font_type'], $cell_label_promo['font_style'], $cell_label_promo['font_size']);
            $this->pdf_text_color($cell_label_promo['data'], $cell_label_promo['color_r'], $cell_label_promo['color_g'], $cell_label_promo['color_b']);
            if (!empty($cell_label_promo['posx']) && !empty($cell_label_promo['posy']))
            {
                $this->Pdf->SetXY($cell_label_promo['posx'], $cell_label_promo['posy']);
            }
            elseif (!empty($cell_label_promo['posx']))
            {
                $this->Pdf->SetX($cell_label_promo['posx']);
            }
            elseif (!empty($cell_label_promo['posy']))
            {
                $this->Pdf->SetY($cell_label_promo['posy']);
            }
            $this->Pdf->Cell($cell_label_promo['width'], 0, $cell_label_promo['data'], 0, 0, $cell_label_promo['align']);

          $max_Y = 0;
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
      }  
   }  
   $this->rs_grid->Close();
   $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
 }
 function pdf_text_color(&$val, $r, $g, $b)
 {
     $pos = strpos($val, "@SCNEG#");
     if ($pos !== false)
     {
         $cor = trim(substr($val, $pos + 7));
         $val = substr($val, 0, $pos);
         $cor = (substr($cor, 0, 1) == "#") ? substr($cor, 1) : $cor;
         if (strlen($cor) == 6)
         {
             $r = hexdec(substr($cor, 0, 2));
             $g = hexdec(substr($cor, 2, 2));
             $b = hexdec(substr($cor, 4, 2));
         }
     }
     $this->Pdf->SetTextColor($r, $g, $b);
 }
 function SC_conv_utf8($input)
 {
     if ($_SESSION['scriptcase']['charset'] != "UTF-8" && !NM_is_utf8($input))
     {
         $input = sc_convert_encoding($input, "UTF-8", $_SESSION['scriptcase']['charset']);
     }
     return $input;
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
