<?php
class pdfreport_FACTURA_grid
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
   var $f_razonsocial = array();
   var $f_ruc = array();
   var $f_estab = array();
   var $f_ptoemi = array();
   var $f_secuencial = array();
   var $f_lote = array();
   var $f_dirmatriz = array();
   var $f_fechaemision = array();
   var $f_direstablecimiento = array();
   var $f_numcontribuyenteespecial = array();
   var $f_obligadocontabilidad = array();
   var $f_guiaremision = array();
   var $f_razonsocialcomprador = array();
   var $f_idcomprador = array();
   var $f_base_12 = array();
   var $f_base_0 = array();
   var $f_totalsinimpuestos = array();
   var $f_totaldescuento = array();
   var $f_tarifa1 = array();
   var $f_valor1 = array();
   var $f_propina = array();
   var $f_importetotal = array();
   var $f_campoadicional1 = array();
   var $f_valoradicional1 = array();
   var $f_campoadicional2 = array();
   var $f_valoradicional2 = array();
   var $f_campoadicional3 = array();
   var $f_valoradicional3 = array();
   var $f_campoadicional4 = array();
   var $f_valoradicional4 = array();
   var $f_campoadicional5 = array();
   var $f_valoradicional5 = array();
   var $f_campoadicional6 = array();
   var $f_valoradicional6 = array();
   var $f_campoadicional7 = array();
   var $f_valoradicional7 = array();
   var $f_campoadicional8 = array();
   var $f_valoradicional8 = array();
   var $f_campoadicional9 = array();
   var $f_valoradicional9 = array();
   var $f_campoadicional10 = array();
   var $f_valoradicional10 = array();
   var $f_campoadicional11 = array();
   var $f_valoradicional11 = array();
   var $f_campoadicional12 = array();
   var $f_valoradicional12 = array();
   var $f_campoadicional13 = array();
   var $f_valoradicional13 = array();
   var $f_campoadicional14 = array();
   var $f_valoradicional14 = array();
   var $f_campoadicional15 = array();
   var $f_valoradicional15 = array();
   var $f_campoadicional16 = array();
   var $f_valoradicional16 = array();
   var $f_campoadicional17 = array();
   var $f_valoradicional17 = array();
   var $f_campoadicional18 = array();
   var $f_valoradicional18 = array();
   var $f_campoadicional19 = array();
   var $f_valoradicional19 = array();
   var $f_campoadicional20 = array();
   var $f_valoradicional20 = array();
   var $ff_clave_acceso = array();
   var $ff_numeroautorizacion = array();
   var $ff_fechaautorizacion = array();
   var $f_numpagos = array();
   var $f_formapago1 = array();
   var $f_valortot1 = array();
   var $f_plazo1 = array();
   var $f_unidadtiempo1 = array();
   var $f_formapago2 = array();
   var $f_valortot2 = array();
   var $f_plazo2 = array();
   var $f_unidadtiempo2 = array();
   var $f_ambiente = array();
   var $look_f_formapago1 = array();
   var $look_f_ambiente = array();
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
   $this->default_font = 'Helvetica';
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
   $_SESSION['scriptcase']['pdfreport_FACTURA']['default_font'] = $this->default_font;
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
           if (in_array("pdfreport_FACTURA", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->f_razonsocial[0] = $Busca_temp['f_razonsocial']; 
       $tmp_pos = strpos($this->f_razonsocial[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->f_razonsocial[0]))
       {
           $this->f_razonsocial[0] = substr($this->f_razonsocial[0], 0, $tmp_pos);
       }
       $this->f_ruc[0] = $Busca_temp['f_ruc']; 
       $tmp_pos = strpos($this->f_ruc[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->f_ruc[0]))
       {
           $this->f_ruc[0] = substr($this->f_ruc[0], 0, $tmp_pos);
       }
       $this->f_estab[0] = $Busca_temp['f_estab']; 
       $tmp_pos = strpos($this->f_estab[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->f_estab[0]))
       {
           $this->f_estab[0] = substr($this->f_estab[0], 0, $tmp_pos);
       }
       $this->f_ptoemi[0] = $Busca_temp['f_ptoemi']; 
       $tmp_pos = strpos($this->f_ptoemi[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->f_ptoemi[0]))
       {
           $this->f_ptoemi[0] = substr($this->f_ptoemi[0], 0, $tmp_pos);
       }
       $this->f_valoradicional14[0] = $Busca_temp['f_valoradicional14']; 
       $tmp_pos = strpos($this->f_valoradicional14[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->f_valoradicional14[0]))
       {
           $this->f_valoradicional14[0] = substr($this->f_valoradicional14[0], 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_FACTURA']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_FACTURA']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_FACTURA']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_FACTURA']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['where_orig'] = " where F.ESTAB=FF.ESTAB AND F.PTOEMI=FF.PTOEMI AND F.SECUENCIAL=FF.SECUENCIAL AND F.LOTE=FF.LOTE AND F.ESTAB=" . $_SESSION['var_estab'] . " AND F.PTOEMI=" . $_SESSION['var_ptoemi'] . " AND F.SECUENCIAL=" . $_SESSION['var_secuencial'] . " AND F.LOTE='" . $_SESSION['var_lote'] . "'";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['where_pesq'];  
//----- 
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
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['order_grid'] = $nmgp_order_by;
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
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/grp__NM__img__NM__facturas_f1.jpg", "0.000000", "0.000000", "210", "297", '', '', '', false, 300, '', false, false, 0);
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_razonsocial'] = "f_razonsocial";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_ruc'] = "f_ruc";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_estab'] = "f_estab";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_ptoemi'] = "f_ptoemi";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_secuencial'] = "f_secuencial";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_lote'] = "f_lote";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_dirmatriz'] = "f_dirmatriz";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_fechaemision'] = "f_fechaemision";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_direstablecimiento'] = "f_direstablecimiento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_numcontribuyenteespecial'] = "f_numcontribuyenteespecial";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_obligadocontabilidad'] = "f_obligadocontabilidad";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_guiaremision'] = "f_guiaremision";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_razonsocialcomprador'] = "f_razonsocialcomprador";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_idcomprador'] = "f_idcomprador";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_base_12'] = "f_base_12";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_base_0'] = "f_base_0";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_totalsinimpuestos'] = "f_totalsinimpuestos";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_totaldescuento'] = "f_totaldescuento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_tarifa1'] = "TARIFA1";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_valor1'] = "f_valor1";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_propina'] = "f_propina";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_importetotal'] = "f_importetotal";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_campoadicional1'] = "f_campoadicional1";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_valoradicional1'] = "f_valoradicional1";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_campoadicional2'] = "f_campoadicional2";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_valoradicional2'] = "f_valoradicional2";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_campoadicional3'] = "f_campoadicional3";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_valoradicional3'] = "f_valoradicional3";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_campoadicional4'] = "f_campoadicional4";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_valoradicional4'] = "f_valoradicional4";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_campoadicional5'] = "f_campoadicional5";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_valoradicional5'] = "f_valoradicional5";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_campoadicional6'] = "f_campoadicional6";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_valoradicional6'] = "f_valoradicional6";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_campoadicional7'] = "f_campoadicional7";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_valoradicional7'] = "f_valoradicional7";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_campoadicional8'] = "f_campoadicional8";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_valoradicional8'] = "f_valoradicional8";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_campoadicional9'] = "f_campoadicional9";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_valoradicional9'] = "f_valoradicional9";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_campoadicional10'] = "f_campoadicional10";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_valoradicional10'] = "f_valoradicional10";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_campoadicional11'] = "f_campoadicional11";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_valoradicional11'] = "f_valoradicional11";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_campoadicional12'] = "CAMPOADICIONAL12";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_valoradicional12'] = "VALORADICIONAL12";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_campoadicional13'] = "CAMPOADICIONAL13";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_valoradicional13'] = "VALORADICIONAL13";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_campoadicional14'] = "CAMPOADICIONAL14";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_valoradicional14'] = "VALORADICIONAL14";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_campoadicional15'] = "CAMPOADICIONAL15";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_valoradicional15'] = "VALORADICIONAL15";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_campoadicional16'] = "CAMPOADICIONAL16";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_valoradicional16'] = "VALORADICIONAL16";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_campoadicional17'] = "CAMPOADICIONAL17";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_valoradicional17'] = "VALORADICIONAL17";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_campoadicional18'] = "CAMPOADICIONAL18";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_valoradicional18'] = "VALORADICIONAL18";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_campoadicional19'] = "CAMPOADICIONAL19";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_valoradicional19'] = "VALORADICIONAL19";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_campoadicional20'] = "CAMPOADICIONAL20";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_valoradicional20'] = "VALORADICIONAL20";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['ff_clave_acceso'] = "ff_clave_acceso";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['ff_numeroautorizacion'] = "ff_numeroautorizacion";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['ff_fechaautorizacion'] = "ff_fechaautorizacion";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_numpagos'] = "NUMPAGOS";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_formapago1'] = "FORMAPAGO1";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_valortot1'] = "VALORTOT1";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_plazo1'] = "PLAZO1";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_unidadtiempo1'] = "UNIDADTIEMPO1";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_formapago2'] = "FORMAPAGO2";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_valortot2'] = "VALORTOT2";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_plazo2'] = "PLAZO2";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_unidadtiempo2'] = "UNIDADTIEMPO2";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['f_ambiente'] = "AMBIENTE";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['ice'] = "ICE";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['ca_bar'] = "ca_bar";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['detalle'] = "detalle";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['detalle_cantidad'] = "CANTIDAD";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['detalle_descuento'] = "DESCUENTO";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['detalle_item'] = "ITEM";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['detalle_preciototalsinimpuesto'] = "PRECIOTOTALSINIMPUESTO";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['detalle_preciounitario'] = "PRECIOUNITARIO";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['direccion'] = "direccion";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['fecha_auth_format'] = "fecha_auth_format";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['label_atencion'] = "label_atencion";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['label_ca'] = "label_ca";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['label_codcliente'] = "label_codcliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['label_contr_especial'] = "label_contr_especial";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['label_descuento'] = "label_descuento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['label_dircliente'] = "label_dircliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['label_fecha_auth'] = "label_fecha_auth";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['label_fecha_emision'] = "label_fecha_emision";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['label_file'] = "label_file";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['label_formapago'] = "label_formapago";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['label_guia_remision'] = "label_guia_remision";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['label_iva'] = "label_iva";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['label_lote'] = "label_lote";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['label_nom_cliente'] = "label_nom_cliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['label_num_auth'] = "label_num_auth";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['label_obligado_cont'] = "label_obligado_cont";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['label_promo'] = "label_promo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['label_ruccliente'] = "label_ruccliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['label_stexento'] = "label_stexento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['label_stgravado'] = "label_stgravado";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['label_subtotal'] = "label_subtotal";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['label_suma_letras'] = "label_suma_letras";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['label_telfcliente'] = "label_telfcliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['label_vence'] = "label_vence";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['labels']['label_vendedor'] = "label_vendedor";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_FACTURA']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_FACTURA']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_FACTURA']['lig_edit'];
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
       $this->Pdf->Text(10, 10, html_entity_decode($this->nm_grid_sem_reg, ENT_COMPAT, $_SESSION['scriptcase']['charset']));
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_FACTURA']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->f_razonsocial[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->f_ruc[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->f_estab[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->f_estab[$this->nm_grid_colunas] = (string)$this->f_estab[$this->nm_grid_colunas];
          $this->f_ptoemi[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->f_ptoemi[$this->nm_grid_colunas] = (string)$this->f_ptoemi[$this->nm_grid_colunas];
          $this->f_secuencial[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->f_secuencial[$this->nm_grid_colunas] = (string)$this->f_secuencial[$this->nm_grid_colunas];
          $this->f_lote[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->f_dirmatriz[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->f_fechaemision[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->f_direstablecimiento[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->f_numcontribuyenteespecial[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->f_numcontribuyenteespecial[$this->nm_grid_colunas] = (string)$this->f_numcontribuyenteespecial[$this->nm_grid_colunas];
          $this->f_obligadocontabilidad[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->f_guiaremision[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->f_razonsocialcomprador[$this->nm_grid_colunas] = $this->rs_grid->fields[12] ;  
          $this->f_idcomprador[$this->nm_grid_colunas] = $this->rs_grid->fields[13] ;  
          $this->f_base_12[$this->nm_grid_colunas] = $this->rs_grid->fields[14] ;  
          $this->f_base_12[$this->nm_grid_colunas] = (strpos(strtolower($this->f_base_12[$this->nm_grid_colunas]), "e")) ? (float)$this->f_base_12[$this->nm_grid_colunas] : $this->f_base_12[$this->nm_grid_colunas]; 
          $this->f_base_12[$this->nm_grid_colunas] = (string)$this->f_base_12[$this->nm_grid_colunas];
          $this->f_base_0[$this->nm_grid_colunas] = $this->rs_grid->fields[15] ;  
          $this->f_base_0[$this->nm_grid_colunas] = (strpos(strtolower($this->f_base_0[$this->nm_grid_colunas]), "e")) ? (float)$this->f_base_0[$this->nm_grid_colunas] : $this->f_base_0[$this->nm_grid_colunas]; 
          $this->f_base_0[$this->nm_grid_colunas] = (string)$this->f_base_0[$this->nm_grid_colunas];
          $this->f_totalsinimpuestos[$this->nm_grid_colunas] = $this->rs_grid->fields[16] ;  
          $this->f_totalsinimpuestos[$this->nm_grid_colunas] = (strpos(strtolower($this->f_totalsinimpuestos[$this->nm_grid_colunas]), "e")) ? (float)$this->f_totalsinimpuestos[$this->nm_grid_colunas] : $this->f_totalsinimpuestos[$this->nm_grid_colunas]; 
          $this->f_totalsinimpuestos[$this->nm_grid_colunas] = (string)$this->f_totalsinimpuestos[$this->nm_grid_colunas];
          $this->f_totaldescuento[$this->nm_grid_colunas] = $this->rs_grid->fields[17] ;  
          $this->f_totaldescuento[$this->nm_grid_colunas] = (strpos(strtolower($this->f_totaldescuento[$this->nm_grid_colunas]), "e")) ? (float)$this->f_totaldescuento[$this->nm_grid_colunas] : $this->f_totaldescuento[$this->nm_grid_colunas]; 
          $this->f_totaldescuento[$this->nm_grid_colunas] = (string)$this->f_totaldescuento[$this->nm_grid_colunas];
          $this->f_tarifa1[$this->nm_grid_colunas] = $this->rs_grid->fields[18] ;  
          $this->f_tarifa1[$this->nm_grid_colunas] = (strpos(strtolower($this->f_tarifa1[$this->nm_grid_colunas]), "e")) ? (float)$this->f_tarifa1[$this->nm_grid_colunas] : $this->f_tarifa1[$this->nm_grid_colunas]; 
          $this->f_tarifa1[$this->nm_grid_colunas] = (string)$this->f_tarifa1[$this->nm_grid_colunas];
          $this->f_valor1[$this->nm_grid_colunas] = $this->rs_grid->fields[19] ;  
          $this->f_valor1[$this->nm_grid_colunas] = (strpos(strtolower($this->f_valor1[$this->nm_grid_colunas]), "e")) ? (float)$this->f_valor1[$this->nm_grid_colunas] : $this->f_valor1[$this->nm_grid_colunas]; 
          $this->f_valor1[$this->nm_grid_colunas] = (string)$this->f_valor1[$this->nm_grid_colunas];
          $this->f_propina[$this->nm_grid_colunas] = $this->rs_grid->fields[20] ;  
          $this->f_propina[$this->nm_grid_colunas] = (strpos(strtolower($this->f_propina[$this->nm_grid_colunas]), "e")) ? (float)$this->f_propina[$this->nm_grid_colunas] : $this->f_propina[$this->nm_grid_colunas]; 
          $this->f_propina[$this->nm_grid_colunas] = (string)$this->f_propina[$this->nm_grid_colunas];
          $this->f_importetotal[$this->nm_grid_colunas] = $this->rs_grid->fields[21] ;  
          $this->f_importetotal[$this->nm_grid_colunas] = (strpos(strtolower($this->f_importetotal[$this->nm_grid_colunas]), "e")) ? (float)$this->f_importetotal[$this->nm_grid_colunas] : $this->f_importetotal[$this->nm_grid_colunas]; 
          $this->f_importetotal[$this->nm_grid_colunas] = (string)$this->f_importetotal[$this->nm_grid_colunas];
          $this->f_campoadicional1[$this->nm_grid_colunas] = $this->rs_grid->fields[22] ;  
          $this->f_valoradicional1[$this->nm_grid_colunas] = $this->rs_grid->fields[23] ;  
          $this->f_campoadicional2[$this->nm_grid_colunas] = $this->rs_grid->fields[24] ;  
          $this->f_valoradicional2[$this->nm_grid_colunas] = $this->rs_grid->fields[25] ;  
          $this->f_campoadicional3[$this->nm_grid_colunas] = $this->rs_grid->fields[26] ;  
          $this->f_valoradicional3[$this->nm_grid_colunas] = $this->rs_grid->fields[27] ;  
          $this->f_campoadicional4[$this->nm_grid_colunas] = $this->rs_grid->fields[28] ;  
          $this->f_valoradicional4[$this->nm_grid_colunas] = $this->rs_grid->fields[29] ;  
          $this->f_campoadicional5[$this->nm_grid_colunas] = $this->rs_grid->fields[30] ;  
          $this->f_valoradicional5[$this->nm_grid_colunas] = $this->rs_grid->fields[31] ;  
          $this->f_campoadicional6[$this->nm_grid_colunas] = $this->rs_grid->fields[32] ;  
          $this->f_valoradicional6[$this->nm_grid_colunas] = $this->rs_grid->fields[33] ;  
          $this->f_campoadicional7[$this->nm_grid_colunas] = $this->rs_grid->fields[34] ;  
          $this->f_valoradicional7[$this->nm_grid_colunas] = $this->rs_grid->fields[35] ;  
          $this->f_campoadicional8[$this->nm_grid_colunas] = $this->rs_grid->fields[36] ;  
          $this->f_valoradicional8[$this->nm_grid_colunas] = $this->rs_grid->fields[37] ;  
          $this->f_campoadicional9[$this->nm_grid_colunas] = $this->rs_grid->fields[38] ;  
          $this->f_valoradicional9[$this->nm_grid_colunas] = $this->rs_grid->fields[39] ;  
          $this->f_campoadicional10[$this->nm_grid_colunas] = $this->rs_grid->fields[40] ;  
          $this->f_valoradicional10[$this->nm_grid_colunas] = $this->rs_grid->fields[41] ;  
          $this->f_campoadicional11[$this->nm_grid_colunas] = $this->rs_grid->fields[42] ;  
          $this->f_valoradicional11[$this->nm_grid_colunas] = $this->rs_grid->fields[43] ;  
          $this->f_campoadicional12[$this->nm_grid_colunas] = $this->rs_grid->fields[44] ;  
          $this->f_valoradicional12[$this->nm_grid_colunas] = $this->rs_grid->fields[45] ;  
          $this->f_campoadicional13[$this->nm_grid_colunas] = $this->rs_grid->fields[46] ;  
          $this->f_valoradicional13[$this->nm_grid_colunas] = $this->rs_grid->fields[47] ;  
          $this->f_campoadicional14[$this->nm_grid_colunas] = $this->rs_grid->fields[48] ;  
          $this->f_valoradicional14[$this->nm_grid_colunas] = $this->rs_grid->fields[49] ;  
          $this->f_campoadicional15[$this->nm_grid_colunas] = $this->rs_grid->fields[50] ;  
          $this->f_valoradicional15[$this->nm_grid_colunas] = $this->rs_grid->fields[51] ;  
          $this->f_campoadicional16[$this->nm_grid_colunas] = $this->rs_grid->fields[52] ;  
          $this->f_valoradicional16[$this->nm_grid_colunas] = $this->rs_grid->fields[53] ;  
          $this->f_campoadicional17[$this->nm_grid_colunas] = $this->rs_grid->fields[54] ;  
          $this->f_valoradicional17[$this->nm_grid_colunas] = $this->rs_grid->fields[55] ;  
          $this->f_campoadicional18[$this->nm_grid_colunas] = $this->rs_grid->fields[56] ;  
          $this->f_valoradicional18[$this->nm_grid_colunas] = $this->rs_grid->fields[57] ;  
          $this->f_campoadicional19[$this->nm_grid_colunas] = $this->rs_grid->fields[58] ;  
          $this->f_valoradicional19[$this->nm_grid_colunas] = $this->rs_grid->fields[59] ;  
          $this->f_campoadicional20[$this->nm_grid_colunas] = $this->rs_grid->fields[60] ;  
          $this->f_valoradicional20[$this->nm_grid_colunas] = $this->rs_grid->fields[61] ;  
          $this->ff_clave_acceso[$this->nm_grid_colunas] = $this->rs_grid->fields[62] ;  
          $this->ff_numeroautorizacion[$this->nm_grid_colunas] = $this->rs_grid->fields[63] ;  
          $this->ff_fechaautorizacion[$this->nm_grid_colunas] = $this->rs_grid->fields[64] ;  
          $this->f_numpagos[$this->nm_grid_colunas] = $this->rs_grid->fields[65] ;  
          $this->f_numpagos[$this->nm_grid_colunas] = (string)$this->f_numpagos[$this->nm_grid_colunas];
          $this->f_formapago1[$this->nm_grid_colunas] = $this->rs_grid->fields[66] ;  
          $this->f_formapago1[$this->nm_grid_colunas] = (string)$this->f_formapago1[$this->nm_grid_colunas];
          $this->f_valortot1[$this->nm_grid_colunas] = $this->rs_grid->fields[67] ;  
          $this->f_valortot1[$this->nm_grid_colunas] = (strpos(strtolower($this->f_valortot1[$this->nm_grid_colunas]), "e")) ? (float)$this->f_valortot1[$this->nm_grid_colunas] : $this->f_valortot1[$this->nm_grid_colunas]; 
          $this->f_valortot1[$this->nm_grid_colunas] = (string)$this->f_valortot1[$this->nm_grid_colunas];
          $this->f_plazo1[$this->nm_grid_colunas] = $this->rs_grid->fields[68] ;  
          $this->f_plazo1[$this->nm_grid_colunas] = (string)$this->f_plazo1[$this->nm_grid_colunas];
          $this->f_unidadtiempo1[$this->nm_grid_colunas] = $this->rs_grid->fields[69] ;  
          $this->f_formapago2[$this->nm_grid_colunas] = $this->rs_grid->fields[70] ;  
          $this->f_formapago2[$this->nm_grid_colunas] = (string)$this->f_formapago2[$this->nm_grid_colunas];
          $this->f_valortot2[$this->nm_grid_colunas] = $this->rs_grid->fields[71] ;  
          $this->f_valortot2[$this->nm_grid_colunas] = (strpos(strtolower($this->f_valortot2[$this->nm_grid_colunas]), "e")) ? (float)$this->f_valortot2[$this->nm_grid_colunas] : $this->f_valortot2[$this->nm_grid_colunas]; 
          $this->f_valortot2[$this->nm_grid_colunas] = (string)$this->f_valortot2[$this->nm_grid_colunas];
          $this->f_plazo2[$this->nm_grid_colunas] = $this->rs_grid->fields[72] ;  
          $this->f_plazo2[$this->nm_grid_colunas] = (string)$this->f_plazo2[$this->nm_grid_colunas];
          $this->f_unidadtiempo2[$this->nm_grid_colunas] = $this->rs_grid->fields[73] ;  
          $this->f_ambiente[$this->nm_grid_colunas] = $this->rs_grid->fields[74] ;  
          $this->f_ambiente[$this->nm_grid_colunas] = (string)$this->f_ambiente[$this->nm_grid_colunas];
          $this->detalle_cantidad[$this->nm_grid_colunas] = array();
          $this->detalle_descuento[$this->nm_grid_colunas] = array();
          $this->detalle_item[$this->nm_grid_colunas] = array();
          $this->detalle_preciototalsinimpuesto[$this->nm_grid_colunas] = array();
          $this->detalle_preciounitario[$this->nm_grid_colunas] = array();
          $this->Lookup->lookup_detalle($this->detalle[$this->nm_grid_colunas] , $this->f_estab[$this->nm_grid_colunas], $this->f_ptoemi[$this->nm_grid_colunas], $this->f_secuencial[$this->nm_grid_colunas], $this->f_lote[$this->nm_grid_colunas], $array_detalle); 
          $NM_ind = 0;
          $this->detalle = array();
          foreach ($array_detalle as $cada_subselect) 
          {
              $this->detalle[$this->nm_grid_colunas][$NM_ind] = "";
              $this->detalle_item[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[0];
              $this->detalle_cantidad[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[1];
              $this->detalle_preciounitario[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[2];
              $this->detalle_descuento[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[3];
              $this->detalle_preciototalsinimpuesto[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[4];
              $NM_ind++;
          }
          $this->look_f_formapago1[$this->nm_grid_colunas] = $this->f_formapago1[$this->nm_grid_colunas]; 
   $this->Lookup->lookup_f_formapago1($this->look_f_formapago1[$this->nm_grid_colunas]); 
          $this->look_f_ambiente[$this->nm_grid_colunas] = $this->f_ambiente[$this->nm_grid_colunas]; 
   $this->Lookup->lookup_f_ambiente($this->look_f_ambiente[$this->nm_grid_colunas]); 
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
          $_SESSION['scriptcase']['pdfreport_FACTURA']['contr_erro'] = 'on';
 $this->ca_bar[$this->nm_grid_colunas]  = $this->ff_clave_acceso[$this->nm_grid_colunas] ;

$this->direccion[$this->nm_grid_colunas]  = $this->f_valoradicional2[$this->nm_grid_colunas] ;
	
$dia_auth = substr($this->ff_fechaautorizacion[$this->nm_grid_colunas] ,8,2);
$mes_auth = substr($this->ff_fechaautorizacion[$this->nm_grid_colunas] ,5,2);
$anio_auth = substr($this->ff_fechaautorizacion[$this->nm_grid_colunas] ,0,4);
$hora_auth = substr($this->ff_fechaautorizacion[$this->nm_grid_colunas] ,11,2);
$minuto_auth = substr($this->ff_fechaautorizacion[$this->nm_grid_colunas] ,14,2);

$fecha_auth = $dia_auth."/".$mes_auth."/".$anio_auth;
$tiempo_auth = $hora_auth.":".$minuto_auth;

$this->fecha_auth_format[$this->nm_grid_colunas]  = $fecha_auth." ".$tiempo_auth;

$this->label_ca[$this->nm_grid_colunas] ="CLAVE DE ACCESO";
$this->label_num_auth[$this->nm_grid_colunas] ="Número de autorización:";
$this->label_fecha_auth[$this->nm_grid_colunas] ="Fecha de autorización:";
$this->label_codcliente[$this->nm_grid_colunas] ="R.U.C.:";
$this->label_nom_cliente[$this->nm_grid_colunas] ="Cliente:";
$this->label_ruccliente[$this->nm_grid_colunas] ="RUC/CI:";
$this->label_fecha_emision[$this->nm_grid_colunas] ="Fecha de emisión:";
$this->label_guia_remision[$this->nm_grid_colunas] ="Guía de remisión:";
$this->label_telfcliente[$this->nm_grid_colunas] ="Teléfono:";
$this->label_dircliente[$this->nm_grid_colunas] ="Dirección:";
$this->label_formapago[$this->nm_grid_colunas] ="Forma de pago";
$this->label_vendedor[$this->nm_grid_colunas] ="Valor";
$this->label_contr_especial[$this->nm_grid_colunas] ="Nro. Contribuyente Especial:";
$this->label_obligado_cont[$this->nm_grid_colunas] ="OBLIGADO A LLEVAR CONTABILIDAD:";

$this->label_vence[$this->nm_grid_colunas] ='Vence:';
$this->label_file[$this->nm_grid_colunas] ='File:';
$this->label_atencion[$this->nm_grid_colunas] ='Atención:';
		
$this->label_lote[$this->nm_grid_colunas] ="Plazo";
$this->label_promo[$this->nm_grid_colunas] ="Tiempo";	

$this->label_suma_letras[$this->nm_grid_colunas] ='LA SUMA DE:';
$this->label_subtotal[$this->nm_grid_colunas] ="Subtotal";
$this->label_descuento[$this->nm_grid_colunas] ="Descuento";
$this->label_stexento[$this->nm_grid_colunas] ="Subtotal 0%";
$this->label_stgravado[$this->nm_grid_colunas] ="Subtotal ".$this->f_tarifa1[$this->nm_grid_colunas] ."%";
$this->label_iva[$this->nm_grid_colunas] ="IVA ".$this->f_tarifa1[$this->nm_grid_colunas] ."%";

$this->f_totalsinimpuestos[$this->nm_grid_colunas] =$this->f_totalsinimpuestos[$this->nm_grid_colunas] +$this->f_totaldescuento[$this->nm_grid_colunas] ;
	
$check_sql = "SELECT SUM(VALORICE)"
   . " FROM DETALLE_FACTURA"
   . " WHERE CODIMPICE > 0 AND ESTAB =".$this->f_estab[$this->nm_grid_colunas] ." AND PTOEMI=".$this->f_ptoemi[$this->nm_grid_colunas] ." AND SECUENCIAL=".$this->f_secuencial[$this->nm_grid_colunas] ." AND LOTE='".$this->f_lote[$this->nm_grid_colunas] ."'";
 
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
$_SESSION['scriptcase']['pdfreport_FACTURA']['contr_erro'] = 'off';
          $this->f_razonsocial[$this->nm_grid_colunas] = sc_strip_script($this->f_razonsocial[$this->nm_grid_colunas]);
          if ($this->f_razonsocial[$this->nm_grid_colunas] === "") 
          { 
              $this->f_razonsocial[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_razonsocial[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_razonsocial[$this->nm_grid_colunas]);
          $this->f_ruc[$this->nm_grid_colunas] = sc_strip_script($this->f_ruc[$this->nm_grid_colunas]);
          if ($this->f_ruc[$this->nm_grid_colunas] === "") 
          { 
              $this->f_ruc[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_ruc[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_ruc[$this->nm_grid_colunas]);
          $this->f_estab[$this->nm_grid_colunas] = sc_strip_script($this->f_estab[$this->nm_grid_colunas]);
          if ($this->f_estab[$this->nm_grid_colunas] === "") 
          { 
              $this->f_estab[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_estab[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_estab[$this->nm_grid_colunas]);
          $this->f_ptoemi[$this->nm_grid_colunas] = sc_strip_script($this->f_ptoemi[$this->nm_grid_colunas]);
          if ($this->f_ptoemi[$this->nm_grid_colunas] === "") 
          { 
              $this->f_ptoemi[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_ptoemi[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_ptoemi[$this->nm_grid_colunas]);
          $this->f_secuencial[$this->nm_grid_colunas] = sc_strip_script($this->f_secuencial[$this->nm_grid_colunas]);
          if ($this->f_secuencial[$this->nm_grid_colunas] === "") 
          { 
              $this->f_secuencial[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_secuencial[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_secuencial[$this->nm_grid_colunas]);
          $this->f_lote[$this->nm_grid_colunas] = sc_strip_script($this->f_lote[$this->nm_grid_colunas]);
          if ($this->f_lote[$this->nm_grid_colunas] === "") 
          { 
              $this->f_lote[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_lote[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_lote[$this->nm_grid_colunas]);
          $this->f_dirmatriz[$this->nm_grid_colunas] = sc_strip_script($this->f_dirmatriz[$this->nm_grid_colunas]);
          if ($this->f_dirmatriz[$this->nm_grid_colunas] === "") 
          { 
              $this->f_dirmatriz[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_dirmatriz[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_dirmatriz[$this->nm_grid_colunas]);
          $this->f_fechaemision[$this->nm_grid_colunas] = sc_strip_script($this->f_fechaemision[$this->nm_grid_colunas]);
          if ($this->f_fechaemision[$this->nm_grid_colunas] === "") 
          { 
              $this->f_fechaemision[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_fechaemision[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_fechaemision[$this->nm_grid_colunas]);
          $this->f_direstablecimiento[$this->nm_grid_colunas] = sc_strip_script($this->f_direstablecimiento[$this->nm_grid_colunas]);
          if ($this->f_direstablecimiento[$this->nm_grid_colunas] === "") 
          { 
              $this->f_direstablecimiento[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_direstablecimiento[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_direstablecimiento[$this->nm_grid_colunas]);
          $this->f_numcontribuyenteespecial[$this->nm_grid_colunas] = sc_strip_script($this->f_numcontribuyenteespecial[$this->nm_grid_colunas]);
          if ($this->f_numcontribuyenteespecial[$this->nm_grid_colunas] === "") 
          { 
              $this->f_numcontribuyenteespecial[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_numcontribuyenteespecial[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_numcontribuyenteespecial[$this->nm_grid_colunas]);
          $this->f_obligadocontabilidad[$this->nm_grid_colunas] = sc_strip_script($this->f_obligadocontabilidad[$this->nm_grid_colunas]);
          if ($this->f_obligadocontabilidad[$this->nm_grid_colunas] === "") 
          { 
              $this->f_obligadocontabilidad[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_obligadocontabilidad[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_obligadocontabilidad[$this->nm_grid_colunas]);
          $this->f_guiaremision[$this->nm_grid_colunas] = sc_strip_script($this->f_guiaremision[$this->nm_grid_colunas]);
          if ($this->f_guiaremision[$this->nm_grid_colunas] === "") 
          { 
              $this->f_guiaremision[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_guiaremision[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_guiaremision[$this->nm_grid_colunas]);
          $this->f_razonsocialcomprador[$this->nm_grid_colunas] = sc_strip_script($this->f_razonsocialcomprador[$this->nm_grid_colunas]);
          if ($this->f_razonsocialcomprador[$this->nm_grid_colunas] === "") 
          { 
              $this->f_razonsocialcomprador[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_razonsocialcomprador[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_razonsocialcomprador[$this->nm_grid_colunas]);
          $this->f_idcomprador[$this->nm_grid_colunas] = sc_strip_script($this->f_idcomprador[$this->nm_grid_colunas]);
          if ($this->f_idcomprador[$this->nm_grid_colunas] === "") 
          { 
              $this->f_idcomprador[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_idcomprador[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_idcomprador[$this->nm_grid_colunas]);
          $this->f_base_12[$this->nm_grid_colunas] = sc_strip_script($this->f_base_12[$this->nm_grid_colunas]);
          if ($this->f_base_12[$this->nm_grid_colunas] === "") 
          { 
              $this->f_base_12[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->f_base_12[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->f_base_12[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_base_12[$this->nm_grid_colunas]);
          $this->f_base_0[$this->nm_grid_colunas] = sc_strip_script($this->f_base_0[$this->nm_grid_colunas]);
          if ($this->f_base_0[$this->nm_grid_colunas] === "") 
          { 
              $this->f_base_0[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->f_base_0[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->f_base_0[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_base_0[$this->nm_grid_colunas]);
          $this->f_totalsinimpuestos[$this->nm_grid_colunas] = sc_strip_script($this->f_totalsinimpuestos[$this->nm_grid_colunas]);
          if ($this->f_totalsinimpuestos[$this->nm_grid_colunas] === "") 
          { 
              $this->f_totalsinimpuestos[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->f_totalsinimpuestos[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->f_totalsinimpuestos[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_totalsinimpuestos[$this->nm_grid_colunas]);
          $this->f_totaldescuento[$this->nm_grid_colunas] = sc_strip_script($this->f_totaldescuento[$this->nm_grid_colunas]);
          if ($this->f_totaldescuento[$this->nm_grid_colunas] === "") 
          { 
              $this->f_totaldescuento[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->f_totaldescuento[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->f_totaldescuento[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_totaldescuento[$this->nm_grid_colunas]);
          $this->f_tarifa1[$this->nm_grid_colunas] = sc_strip_script($this->f_tarifa1[$this->nm_grid_colunas]);
          if ($this->f_tarifa1[$this->nm_grid_colunas] === "") 
          { 
              $this->f_tarifa1[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->f_tarifa1[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "6", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->f_tarifa1[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_tarifa1[$this->nm_grid_colunas]);
          $this->f_valor1[$this->nm_grid_colunas] = sc_strip_script($this->f_valor1[$this->nm_grid_colunas]);
          if ($this->f_valor1[$this->nm_grid_colunas] === "") 
          { 
              $this->f_valor1[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->f_valor1[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->f_valor1[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_valor1[$this->nm_grid_colunas]);
          $this->f_propina[$this->nm_grid_colunas] = sc_strip_script($this->f_propina[$this->nm_grid_colunas]);
          if ($this->f_propina[$this->nm_grid_colunas] === "") 
          { 
              $this->f_propina[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->f_propina[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->f_propina[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_propina[$this->nm_grid_colunas]);
          $this->f_importetotal[$this->nm_grid_colunas] = sc_strip_script($this->f_importetotal[$this->nm_grid_colunas]);
          if ($this->f_importetotal[$this->nm_grid_colunas] === "") 
          { 
              $this->f_importetotal[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->f_importetotal[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->f_importetotal[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_importetotal[$this->nm_grid_colunas]);
          $this->f_campoadicional1[$this->nm_grid_colunas] = sc_strip_script($this->f_campoadicional1[$this->nm_grid_colunas]);
          if ($this->f_campoadicional1[$this->nm_grid_colunas] === "") 
          { 
              $this->f_campoadicional1[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_campoadicional1[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_campoadicional1[$this->nm_grid_colunas]);
          $this->f_valoradicional1[$this->nm_grid_colunas] = sc_strip_script($this->f_valoradicional1[$this->nm_grid_colunas]);
          if ($this->f_valoradicional1[$this->nm_grid_colunas] === "") 
          { 
              $this->f_valoradicional1[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_valoradicional1[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_valoradicional1[$this->nm_grid_colunas]);
          $this->f_campoadicional2[$this->nm_grid_colunas] = sc_strip_script($this->f_campoadicional2[$this->nm_grid_colunas]);
          if ($this->f_campoadicional2[$this->nm_grid_colunas] === "") 
          { 
              $this->f_campoadicional2[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_campoadicional2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_campoadicional2[$this->nm_grid_colunas]);
          $this->f_valoradicional2[$this->nm_grid_colunas] = sc_strip_script($this->f_valoradicional2[$this->nm_grid_colunas]);
          if ($this->f_valoradicional2[$this->nm_grid_colunas] === "") 
          { 
              $this->f_valoradicional2[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_valoradicional2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_valoradicional2[$this->nm_grid_colunas]);
          $this->f_campoadicional3[$this->nm_grid_colunas] = sc_strip_script($this->f_campoadicional3[$this->nm_grid_colunas]);
          if ($this->f_campoadicional3[$this->nm_grid_colunas] === "") 
          { 
              $this->f_campoadicional3[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_campoadicional3[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_campoadicional3[$this->nm_grid_colunas]);
          $this->f_valoradicional3[$this->nm_grid_colunas] = sc_strip_script($this->f_valoradicional3[$this->nm_grid_colunas]);
          if ($this->f_valoradicional3[$this->nm_grid_colunas] === "") 
          { 
              $this->f_valoradicional3[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_valoradicional3[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_valoradicional3[$this->nm_grid_colunas]);
          $this->f_campoadicional4[$this->nm_grid_colunas] = sc_strip_script($this->f_campoadicional4[$this->nm_grid_colunas]);
          if ($this->f_campoadicional4[$this->nm_grid_colunas] === "") 
          { 
              $this->f_campoadicional4[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_campoadicional4[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_campoadicional4[$this->nm_grid_colunas]);
          $this->f_valoradicional4[$this->nm_grid_colunas] = sc_strip_script($this->f_valoradicional4[$this->nm_grid_colunas]);
          if ($this->f_valoradicional4[$this->nm_grid_colunas] === "") 
          { 
              $this->f_valoradicional4[$this->nm_grid_colunas] = "" ;  
          } 
          if ($this->f_valoradicional4[$this->nm_grid_colunas] !== "")
          { 
              $this->f_valoradicional4[$this->nm_grid_colunas] = nl2br($this->f_valoradicional4[$this->nm_grid_colunas]) ; 
              $temp = explode("<br />", $this->f_valoradicional4[$this->nm_grid_colunas]); 
              if (!isset($temp[1])) 
              { 
                  $temp = explode("<br>", $this->f_valoradicional4[$this->nm_grid_colunas]); 
              } 
              $this->f_valoradicional4[$this->nm_grid_colunas] = "" ; 
              $ind_x = 0 ; 
              while (isset($temp[$ind_x])) 
              { 
                 if (!empty($this->f_valoradicional4[$this->nm_grid_colunas])) 
                 { 
                     $this->f_valoradicional4[$this->nm_grid_colunas] .= "<br>"; 
                 } 
                 if (strlen($temp[$ind_x]) > 100) 
                 { 
                     $this->f_valoradicional4[$this->nm_grid_colunas] .= wordwrap($temp[$ind_x], 100, "<br>", true); 
                 } 
                 else 
                 { 
                     $this->f_valoradicional4[$this->nm_grid_colunas] .= $temp[$ind_x]; 
                 } 
                 $ind_x++; 
              }  
          }  
          $this->f_valoradicional4[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_valoradicional4[$this->nm_grid_colunas]);
          $this->f_campoadicional5[$this->nm_grid_colunas] = sc_strip_script($this->f_campoadicional5[$this->nm_grid_colunas]);
          if ($this->f_campoadicional5[$this->nm_grid_colunas] === "") 
          { 
              $this->f_campoadicional5[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_campoadicional5[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_campoadicional5[$this->nm_grid_colunas]);
          $this->f_valoradicional5[$this->nm_grid_colunas] = sc_strip_script($this->f_valoradicional5[$this->nm_grid_colunas]);
          if ($this->f_valoradicional5[$this->nm_grid_colunas] === "") 
          { 
              $this->f_valoradicional5[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_valoradicional5[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_valoradicional5[$this->nm_grid_colunas]);
          $this->f_campoadicional6[$this->nm_grid_colunas] = sc_strip_script($this->f_campoadicional6[$this->nm_grid_colunas]);
          if ($this->f_campoadicional6[$this->nm_grid_colunas] === "") 
          { 
              $this->f_campoadicional6[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_campoadicional6[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_campoadicional6[$this->nm_grid_colunas]);
          $this->f_valoradicional6[$this->nm_grid_colunas] = sc_strip_script($this->f_valoradicional6[$this->nm_grid_colunas]);
          if ($this->f_valoradicional6[$this->nm_grid_colunas] === "") 
          { 
              $this->f_valoradicional6[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_valoradicional6[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_valoradicional6[$this->nm_grid_colunas]);
          $this->f_campoadicional7[$this->nm_grid_colunas] = sc_strip_script($this->f_campoadicional7[$this->nm_grid_colunas]);
          if ($this->f_campoadicional7[$this->nm_grid_colunas] === "") 
          { 
              $this->f_campoadicional7[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_campoadicional7[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_campoadicional7[$this->nm_grid_colunas]);
          $this->f_valoradicional7[$this->nm_grid_colunas] = sc_strip_script($this->f_valoradicional7[$this->nm_grid_colunas]);
          if ($this->f_valoradicional7[$this->nm_grid_colunas] === "") 
          { 
              $this->f_valoradicional7[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_valoradicional7[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_valoradicional7[$this->nm_grid_colunas]);
          $this->f_campoadicional8[$this->nm_grid_colunas] = sc_strip_script($this->f_campoadicional8[$this->nm_grid_colunas]);
          if ($this->f_campoadicional8[$this->nm_grid_colunas] === "") 
          { 
              $this->f_campoadicional8[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_campoadicional8[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_campoadicional8[$this->nm_grid_colunas]);
          $this->f_valoradicional8[$this->nm_grid_colunas] = sc_strip_script($this->f_valoradicional8[$this->nm_grid_colunas]);
          if ($this->f_valoradicional8[$this->nm_grid_colunas] === "") 
          { 
              $this->f_valoradicional8[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_valoradicional8[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_valoradicional8[$this->nm_grid_colunas]);
          $this->f_campoadicional9[$this->nm_grid_colunas] = sc_strip_script($this->f_campoadicional9[$this->nm_grid_colunas]);
          if ($this->f_campoadicional9[$this->nm_grid_colunas] === "") 
          { 
              $this->f_campoadicional9[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_campoadicional9[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_campoadicional9[$this->nm_grid_colunas]);
          $this->f_valoradicional9[$this->nm_grid_colunas] = sc_strip_script($this->f_valoradicional9[$this->nm_grid_colunas]);
          if ($this->f_valoradicional9[$this->nm_grid_colunas] === "") 
          { 
              $this->f_valoradicional9[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_valoradicional9[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_valoradicional9[$this->nm_grid_colunas]);
          $this->f_campoadicional10[$this->nm_grid_colunas] = sc_strip_script($this->f_campoadicional10[$this->nm_grid_colunas]);
          if ($this->f_campoadicional10[$this->nm_grid_colunas] === "") 
          { 
              $this->f_campoadicional10[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_campoadicional10[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_campoadicional10[$this->nm_grid_colunas]);
          $this->f_valoradicional10[$this->nm_grid_colunas] = sc_strip_script($this->f_valoradicional10[$this->nm_grid_colunas]);
          if ($this->f_valoradicional10[$this->nm_grid_colunas] === "") 
          { 
              $this->f_valoradicional10[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_valoradicional10[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_valoradicional10[$this->nm_grid_colunas]);
          $this->f_campoadicional11[$this->nm_grid_colunas] = sc_strip_script($this->f_campoadicional11[$this->nm_grid_colunas]);
          if ($this->f_campoadicional11[$this->nm_grid_colunas] === "") 
          { 
              $this->f_campoadicional11[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_campoadicional11[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_campoadicional11[$this->nm_grid_colunas]);
          $this->f_valoradicional11[$this->nm_grid_colunas] = sc_strip_script($this->f_valoradicional11[$this->nm_grid_colunas]);
          if ($this->f_valoradicional11[$this->nm_grid_colunas] === "") 
          { 
              $this->f_valoradicional11[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_valoradicional11[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_valoradicional11[$this->nm_grid_colunas]);
          $this->f_campoadicional12[$this->nm_grid_colunas] = sc_strip_script($this->f_campoadicional12[$this->nm_grid_colunas]);
          if ($this->f_campoadicional12[$this->nm_grid_colunas] === "") 
          { 
              $this->f_campoadicional12[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_campoadicional12[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_campoadicional12[$this->nm_grid_colunas]);
          $this->f_valoradicional12[$this->nm_grid_colunas] = sc_strip_script($this->f_valoradicional12[$this->nm_grid_colunas]);
          if ($this->f_valoradicional12[$this->nm_grid_colunas] === "") 
          { 
              $this->f_valoradicional12[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_valoradicional12[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_valoradicional12[$this->nm_grid_colunas]);
          $this->f_campoadicional13[$this->nm_grid_colunas] = sc_strip_script($this->f_campoadicional13[$this->nm_grid_colunas]);
          if ($this->f_campoadicional13[$this->nm_grid_colunas] === "") 
          { 
              $this->f_campoadicional13[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_campoadicional13[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_campoadicional13[$this->nm_grid_colunas]);
          $this->f_valoradicional13[$this->nm_grid_colunas] = sc_strip_script($this->f_valoradicional13[$this->nm_grid_colunas]);
          if ($this->f_valoradicional13[$this->nm_grid_colunas] === "") 
          { 
              $this->f_valoradicional13[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_valoradicional13[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_valoradicional13[$this->nm_grid_colunas]);
          $this->f_campoadicional14[$this->nm_grid_colunas] = sc_strip_script($this->f_campoadicional14[$this->nm_grid_colunas]);
          if ($this->f_campoadicional14[$this->nm_grid_colunas] === "") 
          { 
              $this->f_campoadicional14[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_campoadicional14[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_campoadicional14[$this->nm_grid_colunas]);
          $this->f_valoradicional14[$this->nm_grid_colunas] = sc_strip_script($this->f_valoradicional14[$this->nm_grid_colunas]);
          if ($this->f_valoradicional14[$this->nm_grid_colunas] === "") 
          { 
              $this->f_valoradicional14[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_valoradicional14[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_valoradicional14[$this->nm_grid_colunas]);
          $this->f_campoadicional15[$this->nm_grid_colunas] = sc_strip_script($this->f_campoadicional15[$this->nm_grid_colunas]);
          if ($this->f_campoadicional15[$this->nm_grid_colunas] === "") 
          { 
              $this->f_campoadicional15[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_campoadicional15[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_campoadicional15[$this->nm_grid_colunas]);
          $this->f_valoradicional15[$this->nm_grid_colunas] = sc_strip_script($this->f_valoradicional15[$this->nm_grid_colunas]);
          if ($this->f_valoradicional15[$this->nm_grid_colunas] === "") 
          { 
              $this->f_valoradicional15[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_valoradicional15[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_valoradicional15[$this->nm_grid_colunas]);
          $this->f_campoadicional16[$this->nm_grid_colunas] = sc_strip_script($this->f_campoadicional16[$this->nm_grid_colunas]);
          if ($this->f_campoadicional16[$this->nm_grid_colunas] === "") 
          { 
              $this->f_campoadicional16[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_campoadicional16[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_campoadicional16[$this->nm_grid_colunas]);
          $this->f_valoradicional16[$this->nm_grid_colunas] = sc_strip_script($this->f_valoradicional16[$this->nm_grid_colunas]);
          if ($this->f_valoradicional16[$this->nm_grid_colunas] === "") 
          { 
              $this->f_valoradicional16[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_valoradicional16[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_valoradicional16[$this->nm_grid_colunas]);
          $this->f_campoadicional17[$this->nm_grid_colunas] = sc_strip_script($this->f_campoadicional17[$this->nm_grid_colunas]);
          if ($this->f_campoadicional17[$this->nm_grid_colunas] === "") 
          { 
              $this->f_campoadicional17[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_campoadicional17[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_campoadicional17[$this->nm_grid_colunas]);
          $this->f_valoradicional17[$this->nm_grid_colunas] = sc_strip_script($this->f_valoradicional17[$this->nm_grid_colunas]);
          if ($this->f_valoradicional17[$this->nm_grid_colunas] === "") 
          { 
              $this->f_valoradicional17[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_valoradicional17[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_valoradicional17[$this->nm_grid_colunas]);
          $this->f_campoadicional18[$this->nm_grid_colunas] = sc_strip_script($this->f_campoadicional18[$this->nm_grid_colunas]);
          if ($this->f_campoadicional18[$this->nm_grid_colunas] === "") 
          { 
              $this->f_campoadicional18[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_campoadicional18[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_campoadicional18[$this->nm_grid_colunas]);
          $this->f_valoradicional18[$this->nm_grid_colunas] = sc_strip_script($this->f_valoradicional18[$this->nm_grid_colunas]);
          if ($this->f_valoradicional18[$this->nm_grid_colunas] === "") 
          { 
              $this->f_valoradicional18[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_valoradicional18[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_valoradicional18[$this->nm_grid_colunas]);
          $this->f_campoadicional19[$this->nm_grid_colunas] = sc_strip_script($this->f_campoadicional19[$this->nm_grid_colunas]);
          if ($this->f_campoadicional19[$this->nm_grid_colunas] === "") 
          { 
              $this->f_campoadicional19[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_campoadicional19[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_campoadicional19[$this->nm_grid_colunas]);
          $this->f_valoradicional19[$this->nm_grid_colunas] = sc_strip_script($this->f_valoradicional19[$this->nm_grid_colunas]);
          if ($this->f_valoradicional19[$this->nm_grid_colunas] === "") 
          { 
              $this->f_valoradicional19[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_valoradicional19[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_valoradicional19[$this->nm_grid_colunas]);
          $this->f_campoadicional20[$this->nm_grid_colunas] = sc_strip_script($this->f_campoadicional20[$this->nm_grid_colunas]);
          if ($this->f_campoadicional20[$this->nm_grid_colunas] === "") 
          { 
              $this->f_campoadicional20[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_campoadicional20[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_campoadicional20[$this->nm_grid_colunas]);
          $this->f_valoradicional20[$this->nm_grid_colunas] = sc_strip_script($this->f_valoradicional20[$this->nm_grid_colunas]);
          if ($this->f_valoradicional20[$this->nm_grid_colunas] === "") 
          { 
              $this->f_valoradicional20[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_valoradicional20[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_valoradicional20[$this->nm_grid_colunas]);
          $this->ff_clave_acceso[$this->nm_grid_colunas] = sc_strip_script($this->ff_clave_acceso[$this->nm_grid_colunas]);
          if ($this->ff_clave_acceso[$this->nm_grid_colunas] === "") 
          { 
              $this->ff_clave_acceso[$this->nm_grid_colunas] = "" ;  
          } 
          $this->ff_clave_acceso[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ff_clave_acceso[$this->nm_grid_colunas]);
          $this->ff_numeroautorizacion[$this->nm_grid_colunas] = sc_strip_script($this->ff_numeroautorizacion[$this->nm_grid_colunas]);
          if ($this->ff_numeroautorizacion[$this->nm_grid_colunas] === "") 
          { 
              $this->ff_numeroautorizacion[$this->nm_grid_colunas] = "" ;  
          } 
          $this->ff_numeroautorizacion[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ff_numeroautorizacion[$this->nm_grid_colunas]);
          $this->ff_fechaautorizacion[$this->nm_grid_colunas] = sc_strip_script($this->ff_fechaautorizacion[$this->nm_grid_colunas]);
          if ($this->ff_fechaautorizacion[$this->nm_grid_colunas] === "") 
          { 
              $this->ff_fechaautorizacion[$this->nm_grid_colunas] = "" ;  
          } 
          $this->ff_fechaautorizacion[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ff_fechaautorizacion[$this->nm_grid_colunas]);
          $this->f_numpagos[$this->nm_grid_colunas] = sc_strip_script($this->f_numpagos[$this->nm_grid_colunas]);
          if ($this->f_numpagos[$this->nm_grid_colunas] === "") 
          { 
              $this->f_numpagos[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->f_numpagos[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->f_numpagos[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_numpagos[$this->nm_grid_colunas]);
          $this->f_formapago1[$this->nm_grid_colunas] = trim(sc_strip_script($this->look_f_formapago1[$this->nm_grid_colunas])); 
          if ($this->f_formapago1[$this->nm_grid_colunas] === "") 
          { 
              $this->f_formapago1[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_formapago1[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_formapago1[$this->nm_grid_colunas]);
          $this->f_valortot1[$this->nm_grid_colunas] = sc_strip_script($this->f_valortot1[$this->nm_grid_colunas]);
          if ($this->f_valortot1[$this->nm_grid_colunas] === "") 
          { 
              $this->f_valortot1[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->f_valortot1[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->f_valortot1[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_valortot1[$this->nm_grid_colunas]);
          $this->f_plazo1[$this->nm_grid_colunas] = sc_strip_script($this->f_plazo1[$this->nm_grid_colunas]);
          if ($this->f_plazo1[$this->nm_grid_colunas] === "") 
          { 
              $this->f_plazo1[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->f_plazo1[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->f_plazo1[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_plazo1[$this->nm_grid_colunas]);
          $this->f_unidadtiempo1[$this->nm_grid_colunas] = sc_strip_script($this->f_unidadtiempo1[$this->nm_grid_colunas]);
          if ($this->f_unidadtiempo1[$this->nm_grid_colunas] === "") 
          { 
              $this->f_unidadtiempo1[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_unidadtiempo1[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_unidadtiempo1[$this->nm_grid_colunas]);
          $this->f_formapago2[$this->nm_grid_colunas] = sc_strip_script($this->f_formapago2[$this->nm_grid_colunas]);
          if ($this->f_formapago2[$this->nm_grid_colunas] === "") 
          { 
              $this->f_formapago2[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->f_formapago2[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->f_formapago2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_formapago2[$this->nm_grid_colunas]);
          $this->f_valortot2[$this->nm_grid_colunas] = sc_strip_script($this->f_valortot2[$this->nm_grid_colunas]);
          if ($this->f_valortot2[$this->nm_grid_colunas] === "") 
          { 
              $this->f_valortot2[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->f_valortot2[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "6", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->f_valortot2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_valortot2[$this->nm_grid_colunas]);
          $this->f_plazo2[$this->nm_grid_colunas] = sc_strip_script($this->f_plazo2[$this->nm_grid_colunas]);
          if ($this->f_plazo2[$this->nm_grid_colunas] === "") 
          { 
              $this->f_plazo2[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->f_plazo2[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->f_plazo2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_plazo2[$this->nm_grid_colunas]);
          $this->f_unidadtiempo2[$this->nm_grid_colunas] = sc_strip_script($this->f_unidadtiempo2[$this->nm_grid_colunas]);
          if ($this->f_unidadtiempo2[$this->nm_grid_colunas] === "") 
          { 
              $this->f_unidadtiempo2[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_unidadtiempo2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_unidadtiempo2[$this->nm_grid_colunas]);
          $this->f_ambiente[$this->nm_grid_colunas] = trim(sc_strip_script($this->look_f_ambiente[$this->nm_grid_colunas])); 
          if ($this->f_ambiente[$this->nm_grid_colunas] === "") 
          { 
              $this->f_ambiente[$this->nm_grid_colunas] = "" ;  
          } 
          $this->f_ambiente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->f_ambiente[$this->nm_grid_colunas]);
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
                 if (strlen($temp[$ind_x]) > 60) 
                 { 
                     $this->detalle_item[$this->nm_grid_colunas][$NM_ind] .= wordwrap($temp[$ind_x], 60, "<br>", true); 
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
            $razon_social = array('posx' => '16', 'posy' => '37', 'data' => $this->SC_conv_utf8('R.U.C.:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $ruc_emisor = array('posx' => '31', 'posy' => '37', 'data' => $this->f_ruc[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $num_fact1 = array('posx' => '162', 'posy' => '27', 'data' => $this->f_estab[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $num_fact2 = array('posx' => '172', 'posy' => '27', 'data' => $this->f_ptoemi[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $num_fact3 = array('posx' => '182', 'posy' => '27', 'data' => $this->f_secuencial[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_contr_especial = array('posx' => '5', 'posy' => '67', 'data' => $this->SC_conv_utf8('Forma de Pago:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $num_contribuyente_especial = array('posx' => '28', 'posy' => '67', 'data' => $this->f_valoradicional6[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_obligado_cont = array('posx' => '10', 'posy' => '42', 'data' => $this->label_obligado_cont[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $obligado_contabilidad = array('posx' => '65', 'posy' => '42', 'data' => $this->f_obligadocontabilidad[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_num_auth = array('posx' => '91', 'posy' => '38', 'data' => $this->label_num_auth[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $numero_auth = array('posx' => '126', 'posy' => '38', 'data' => $this->ff_numeroautorizacion[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_fecha_auth = array('posx' => '85', 'posy' => '61', 'data' => $this->SC_conv_utf8('Email:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_fecha_auth_format = array('posx' => '95', 'posy' => '61', 'data' => $this->f_valoradicional1[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_nom_cliente = array('posx' => '5', 'posy' => '49', 'data' => $this->label_nom_cliente[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $razon_social_comprador = array('posx' => '17', 'posy' => '49', 'data' => $this->f_razonsocialcomprador[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_codcliente = array('posx' => '123', 'posy' => '49', 'data' => $this->SC_conv_utf8('Paciente:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $codcliente = array('posx' => '137', 'posy' => '49', 'data' => $this->f_valoradicional5[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_dircliente = array('posx' => '5', 'posy' => '55', 'data' => $this->label_dircliente[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_direccion = array('posx' => '22', 'posy' => '55', 'data' => $this->direccion[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_ruccliente = array('posx' => '5', 'posy' => '61', 'data' => $this->label_ruccliente[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $id_comprador = array('posx' => '17', 'posy' => '61', 'data' => $this->f_idcomprador[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_telfcliente = array('posx' => '40', 'posy' => '61', 'data' => $this->label_telfcliente[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_telf_cliente = array('posx' => '54', 'posy' => '61', 'data' => $this->f_valoradicional3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_fecha_emision = array('posx' => '155', 'posy' => '61', 'data' => $this->label_fecha_emision[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $fecha_emision_comprobante = array('posx' => '181', 'posy' => '61', 'data' => $this->f_fechaemision[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_vence = array('posx' => '91', 'posy' => '42', 'data' => $this->SC_conv_utf8('AMBIENTE:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_vence = array('posx' => '109', 'posy' => '42', 'data' => $this->f_ambiente[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_bodega = array('posx' => '131', 'posy' => '42', 'data' => $this->SC_conv_utf8('EMISIÓN:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_bodega = array('posx' => '146', 'posy' => '42', 'data' => $this->SC_conv_utf8('NORMAL'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detalle_ITEM = array('posx' => '5', 'posy' => '91', 'data' => $this->detalle_item[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detalle_CANTIDAD = array('posx' => '114', 'posy' => '91', 'data' => $this->detalle_cantidad[$this->nm_grid_colunas], 'width'      => '14', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detalle_PRECIOUNITARIO = array('posx' => '136', 'posy' => '91', 'data' => $this->detalle_preciounitario[$this->nm_grid_colunas], 'width'      => '18', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detalle_DESCUENTO = array('posx' => '155', 'posy' => '91', 'data' => $this->detalle_descuento[$this->nm_grid_colunas], 'width'      => '18', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detalle_PRECIOTOTALSINIMPUESTO = array('posx' => '174', 'posy' => '91', 'data' => $this->detalle_preciototalsinimpuesto[$this->nm_grid_colunas], 'width'      => '21', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_puerto = array('posx' => '5', 'posy' => '209', 'data' => $this->f_campoadicional9[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_puerto = array('posx' => '45', 'posy' => '209', 'data' => $this->f_valoradicional9[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_guia = array('posx' => '5', 'posy' => '213', 'data' => $this->f_campoadicional10[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_guia = array('posx' => '45', 'posy' => '213', 'data' => $this->f_valoradicional10[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_linea = array('posx' => '5', 'posy' => '217', 'data' => $this->f_campoadicional11[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_linea = array('posx' => '45', 'posy' => '217', 'data' => $this->f_valoradicional11[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_cantidad = array('posx' => '5', 'posy' => '221', 'data' => $this->f_campoadicional12[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_cantidad = array('posx' => '45', 'posy' => '221', 'data' => $this->f_valoradicional12[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_orden = array('posx' => '5', 'posy' => '225', 'data' => $this->f_campoadicional13[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_orden = array('posx' => '45', 'posy' => '225', 'data' => $this->f_valoradicional13[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_proveedor = array('posx' => '5', 'posy' => '229', 'data' => $this->f_campoadicional14[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_proveedor = array('posx' => '45', 'posy' => '229', 'data' => $this->f_valoradicional14[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_agente = array('posx' => '5', 'posy' => '233', 'data' => $this->f_campoadicional15[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_agente = array('posx' => '45', 'posy' => '233', 'data' => $this->f_valoradicional15[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_asesor = array('posx' => '5', 'posy' => '237', 'data' => $this->f_campoadicional16[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_asesor = array('posx' => '45', 'posy' => '237', 'data' => $this->f_valoradicional16[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $label_suma_letras = array('posx' => '5', 'posy' => '247', 'data' => $this->SC_conv_utf8('No. FICHA PACIENTE'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '7', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $suma_letras = array('posx' => '5', 'posy' => '251', 'data' => $this->f_valoradicional4[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '7', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_subtotal = array('posx' => '162', 'posy' => '245', 'data' => $this->label_subtotal[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_descuento = array('posx' => '162', 'posy' => '249', 'data' => $this->label_descuento[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_ICE = array('posx' => '162', 'posy' => '253', 'data' => $this->SC_conv_utf8('ICE'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_stgravado = array('posx' => '162', 'posy' => '261', 'data' => $this->label_stgravado[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_stexento = array('posx' => '162', 'posy' => '257', 'data' => $this->label_stexento[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_iva = array('posx' => '162', 'posy' => '265', 'data' => $this->label_iva[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $total_sin_impuestos = array('posx' => '184', 'posy' => '245', 'data' => $this->f_totalsinimpuestos[$this->nm_grid_colunas], 'width'      => '21', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $total_descuento = array('posx' => '184', 'posy' => '249', 'data' => $this->f_totaldescuento[$this->nm_grid_colunas], 'width'      => '21', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_ICE = array('posx' => '184', 'posy' => '253', 'data' => $this->ice[$this->nm_grid_colunas], 'width'      => '21', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $base0 = array('posx' => '184', 'posy' => '257', 'data' => $this->f_base_0[$this->nm_grid_colunas], 'width'      => '21', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $base12 = array('posx' => '184', 'posy' => '261', 'data' => $this->f_base_12[$this->nm_grid_colunas], 'width'      => '21', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $valor1 = array('posx' => '184', 'posy' => '265', 'data' => $this->f_valor1[$this->nm_grid_colunas], 'width'      => '21', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $importe_total = array('posx' => '-46', 'posy' => '272', 'data' => $this->f_importetotal[$this->nm_grid_colunas], 'width'      => '41', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_label_formapago = array('posx' => '6', 'posy' => '260', 'data' => $this->label_formapago[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '7', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_label_vendedor = array('posx' => '75', 'posy' => '260', 'data' => $this->label_vendedor[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '7', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_label_lote = array('posx' => '90', 'posy' => '260', 'data' => $this->label_lote[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '7', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_label_promo = array('posx' => '105', 'posy' => '260', 'data' => $this->label_promo[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '7', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_formapago = array('posx' => '6', 'posy' => '264', 'data' => $this->f_formapago1[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '7', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_vendedor = array('posx' => '75', 'posy' => '264', 'data' => $this->f_valortot1[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '7', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $ruc_vendedor = array('posx' => '90', 'posy' => '264', 'data' => $this->f_plazo1[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '7', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $razon_social_vendedor = array('posx' => '105', 'posy' => '264', 'data' => $this->f_unidadtiempo1[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '7', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_label_ca = array('posx' => '92', 'posy' => '280', 'data' => $this->label_ca[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $codigo_barra = array('posx' => '71', 'posy' => '284', 'data' => $this->ca_bar[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($razon_social['font_type'], $razon_social['font_style'], $razon_social['font_size']);
            $this->pdf_text_color($razon_social['data'], $razon_social['color_r'], $razon_social['color_g'], $razon_social['color_b']);
            if (!empty($razon_social['posx']) && !empty($razon_social['posy']))
            {
                $this->Pdf->SetXY($razon_social['posx'], $razon_social['posy']);
            }
            elseif (!empty($razon_social['posx']))
            {
                $this->Pdf->SetX($razon_social['posx']);
            }
            elseif (!empty($razon_social['posy']))
            {
                $this->Pdf->SetY($razon_social['posy']);
            }
            $this->Pdf->Cell($razon_social['width'], 0, $razon_social['data'], 0, 0, $razon_social['align']);

            $this->Pdf->SetFont($ruc_emisor['font_type'], $ruc_emisor['font_style'], $ruc_emisor['font_size']);
            $this->pdf_text_color($ruc_emisor['data'], $ruc_emisor['color_r'], $ruc_emisor['color_g'], $ruc_emisor['color_b']);
            if (!empty($ruc_emisor['posx']) && !empty($ruc_emisor['posy']))
            {
                $this->Pdf->SetXY($ruc_emisor['posx'], $ruc_emisor['posy']);
            }
            elseif (!empty($ruc_emisor['posx']))
            {
                $this->Pdf->SetX($ruc_emisor['posx']);
            }
            elseif (!empty($ruc_emisor['posy']))
            {
                $this->Pdf->SetY($ruc_emisor['posy']);
            }
            $this->Pdf->Cell($ruc_emisor['width'], 0, $ruc_emisor['data'], 0, 0, $ruc_emisor['align']);

            $this->Pdf->SetFont($num_fact1['font_type'], $num_fact1['font_style'], $num_fact1['font_size']);
            $this->pdf_text_color($num_fact1['data'], $num_fact1['color_r'], $num_fact1['color_g'], $num_fact1['color_b']);
            if (!empty($num_fact1['posx']) && !empty($num_fact1['posy']))
            {
                $this->Pdf->SetXY($num_fact1['posx'], $num_fact1['posy']);
            }
            elseif (!empty($num_fact1['posx']))
            {
                $this->Pdf->SetX($num_fact1['posx']);
            }
            elseif (!empty($num_fact1['posy']))
            {
                $this->Pdf->SetY($num_fact1['posy']);
            }
            $this->Pdf->Cell($num_fact1['width'], 0, $num_fact1['data'], 0, 0, $num_fact1['align']);

            $this->Pdf->SetFont($num_fact2['font_type'], $num_fact2['font_style'], $num_fact2['font_size']);
            $this->pdf_text_color($num_fact2['data'], $num_fact2['color_r'], $num_fact2['color_g'], $num_fact2['color_b']);
            if (!empty($num_fact2['posx']) && !empty($num_fact2['posy']))
            {
                $this->Pdf->SetXY($num_fact2['posx'], $num_fact2['posy']);
            }
            elseif (!empty($num_fact2['posx']))
            {
                $this->Pdf->SetX($num_fact2['posx']);
            }
            elseif (!empty($num_fact2['posy']))
            {
                $this->Pdf->SetY($num_fact2['posy']);
            }
            $this->Pdf->Cell($num_fact2['width'], 0, $num_fact2['data'], 0, 0, $num_fact2['align']);

            $this->Pdf->SetFont($num_fact3['font_type'], $num_fact3['font_style'], $num_fact3['font_size']);
            $this->pdf_text_color($num_fact3['data'], $num_fact3['color_r'], $num_fact3['color_g'], $num_fact3['color_b']);
            if (!empty($num_fact3['posx']) && !empty($num_fact3['posy']))
            {
                $this->Pdf->SetXY($num_fact3['posx'], $num_fact3['posy']);
            }
            elseif (!empty($num_fact3['posx']))
            {
                $this->Pdf->SetX($num_fact3['posx']);
            }
            elseif (!empty($num_fact3['posy']))
            {
                $this->Pdf->SetY($num_fact3['posy']);
            }
            $this->Pdf->Cell($num_fact3['width'], 0, $num_fact3['data'], 0, 0, $num_fact3['align']);

            $this->Pdf->SetFont($cell_label_contr_especial['font_type'], $cell_label_contr_especial['font_style'], $cell_label_contr_especial['font_size']);
            $this->pdf_text_color($cell_label_contr_especial['data'], $cell_label_contr_especial['color_r'], $cell_label_contr_especial['color_g'], $cell_label_contr_especial['color_b']);
            if (!empty($cell_label_contr_especial['posx']) && !empty($cell_label_contr_especial['posy']))
            {
                $this->Pdf->SetXY($cell_label_contr_especial['posx'], $cell_label_contr_especial['posy']);
            }
            elseif (!empty($cell_label_contr_especial['posx']))
            {
                $this->Pdf->SetX($cell_label_contr_especial['posx']);
            }
            elseif (!empty($cell_label_contr_especial['posy']))
            {
                $this->Pdf->SetY($cell_label_contr_especial['posy']);
            }
            $this->Pdf->Cell($cell_label_contr_especial['width'], 0, $cell_label_contr_especial['data'], 0, 0, $cell_label_contr_especial['align']);

            $this->Pdf->SetFont($num_contribuyente_especial['font_type'], $num_contribuyente_especial['font_style'], $num_contribuyente_especial['font_size']);
            $this->pdf_text_color($num_contribuyente_especial['data'], $num_contribuyente_especial['color_r'], $num_contribuyente_especial['color_g'], $num_contribuyente_especial['color_b']);
            if (!empty($num_contribuyente_especial['posx']) && !empty($num_contribuyente_especial['posy']))
            {
                $this->Pdf->SetXY($num_contribuyente_especial['posx'], $num_contribuyente_especial['posy']);
            }
            elseif (!empty($num_contribuyente_especial['posx']))
            {
                $this->Pdf->SetX($num_contribuyente_especial['posx']);
            }
            elseif (!empty($num_contribuyente_especial['posy']))
            {
                $this->Pdf->SetY($num_contribuyente_especial['posy']);
            }
            $this->Pdf->Cell($num_contribuyente_especial['width'], 0, $num_contribuyente_especial['data'], 0, 0, $num_contribuyente_especial['align']);

            $this->Pdf->SetFont($cell_label_obligado_cont['font_type'], $cell_label_obligado_cont['font_style'], $cell_label_obligado_cont['font_size']);
            $this->pdf_text_color($cell_label_obligado_cont['data'], $cell_label_obligado_cont['color_r'], $cell_label_obligado_cont['color_g'], $cell_label_obligado_cont['color_b']);
            if (!empty($cell_label_obligado_cont['posx']) && !empty($cell_label_obligado_cont['posy']))
            {
                $this->Pdf->SetXY($cell_label_obligado_cont['posx'], $cell_label_obligado_cont['posy']);
            }
            elseif (!empty($cell_label_obligado_cont['posx']))
            {
                $this->Pdf->SetX($cell_label_obligado_cont['posx']);
            }
            elseif (!empty($cell_label_obligado_cont['posy']))
            {
                $this->Pdf->SetY($cell_label_obligado_cont['posy']);
            }
            $this->Pdf->Cell($cell_label_obligado_cont['width'], 0, $cell_label_obligado_cont['data'], 0, 0, $cell_label_obligado_cont['align']);

            $this->Pdf->SetFont($obligado_contabilidad['font_type'], $obligado_contabilidad['font_style'], $obligado_contabilidad['font_size']);
            $this->pdf_text_color($obligado_contabilidad['data'], $obligado_contabilidad['color_r'], $obligado_contabilidad['color_g'], $obligado_contabilidad['color_b']);
            if (!empty($obligado_contabilidad['posx']) && !empty($obligado_contabilidad['posy']))
            {
                $this->Pdf->SetXY($obligado_contabilidad['posx'], $obligado_contabilidad['posy']);
            }
            elseif (!empty($obligado_contabilidad['posx']))
            {
                $this->Pdf->SetX($obligado_contabilidad['posx']);
            }
            elseif (!empty($obligado_contabilidad['posy']))
            {
                $this->Pdf->SetY($obligado_contabilidad['posy']);
            }
            $this->Pdf->Cell($obligado_contabilidad['width'], 0, $obligado_contabilidad['data'], 0, 0, $obligado_contabilidad['align']);

            $this->Pdf->SetFont($cell_label_num_auth['font_type'], $cell_label_num_auth['font_style'], $cell_label_num_auth['font_size']);
            $this->pdf_text_color($cell_label_num_auth['data'], $cell_label_num_auth['color_r'], $cell_label_num_auth['color_g'], $cell_label_num_auth['color_b']);
            if (!empty($cell_label_num_auth['posx']) && !empty($cell_label_num_auth['posy']))
            {
                $this->Pdf->SetXY($cell_label_num_auth['posx'], $cell_label_num_auth['posy']);
            }
            elseif (!empty($cell_label_num_auth['posx']))
            {
                $this->Pdf->SetX($cell_label_num_auth['posx']);
            }
            elseif (!empty($cell_label_num_auth['posy']))
            {
                $this->Pdf->SetY($cell_label_num_auth['posy']);
            }
            $this->Pdf->Cell($cell_label_num_auth['width'], 0, $cell_label_num_auth['data'], 0, 0, $cell_label_num_auth['align']);

            $this->Pdf->SetFont($numero_auth['font_type'], $numero_auth['font_style'], $numero_auth['font_size']);
            $this->pdf_text_color($numero_auth['data'], $numero_auth['color_r'], $numero_auth['color_g'], $numero_auth['color_b']);
            if (!empty($numero_auth['posx']) && !empty($numero_auth['posy']))
            {
                $this->Pdf->SetXY($numero_auth['posx'], $numero_auth['posy']);
            }
            elseif (!empty($numero_auth['posx']))
            {
                $this->Pdf->SetX($numero_auth['posx']);
            }
            elseif (!empty($numero_auth['posy']))
            {
                $this->Pdf->SetY($numero_auth['posy']);
            }
            $this->Pdf->Cell($numero_auth['width'], 0, $numero_auth['data'], 0, 0, $numero_auth['align']);

            $this->Pdf->SetFont($cell_label_fecha_auth['font_type'], $cell_label_fecha_auth['font_style'], $cell_label_fecha_auth['font_size']);
            $this->pdf_text_color($cell_label_fecha_auth['data'], $cell_label_fecha_auth['color_r'], $cell_label_fecha_auth['color_g'], $cell_label_fecha_auth['color_b']);
            if (!empty($cell_label_fecha_auth['posx']) && !empty($cell_label_fecha_auth['posy']))
            {
                $this->Pdf->SetXY($cell_label_fecha_auth['posx'], $cell_label_fecha_auth['posy']);
            }
            elseif (!empty($cell_label_fecha_auth['posx']))
            {
                $this->Pdf->SetX($cell_label_fecha_auth['posx']);
            }
            elseif (!empty($cell_label_fecha_auth['posy']))
            {
                $this->Pdf->SetY($cell_label_fecha_auth['posy']);
            }
            $this->Pdf->Cell($cell_label_fecha_auth['width'], 0, $cell_label_fecha_auth['data'], 0, 0, $cell_label_fecha_auth['align']);

            $this->Pdf->SetFont($cell_fecha_auth_format['font_type'], $cell_fecha_auth_format['font_style'], $cell_fecha_auth_format['font_size']);
            $this->pdf_text_color($cell_fecha_auth_format['data'], $cell_fecha_auth_format['color_r'], $cell_fecha_auth_format['color_g'], $cell_fecha_auth_format['color_b']);
            if (!empty($cell_fecha_auth_format['posx']) && !empty($cell_fecha_auth_format['posy']))
            {
                $this->Pdf->SetXY($cell_fecha_auth_format['posx'], $cell_fecha_auth_format['posy']);
            }
            elseif (!empty($cell_fecha_auth_format['posx']))
            {
                $this->Pdf->SetX($cell_fecha_auth_format['posx']);
            }
            elseif (!empty($cell_fecha_auth_format['posy']))
            {
                $this->Pdf->SetY($cell_fecha_auth_format['posy']);
            }
            $this->Pdf->Cell($cell_fecha_auth_format['width'], 0, $cell_fecha_auth_format['data'], 0, 0, $cell_fecha_auth_format['align']);

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

            $this->Pdf->SetFont($razon_social_comprador['font_type'], $razon_social_comprador['font_style'], $razon_social_comprador['font_size']);
            $this->pdf_text_color($razon_social_comprador['data'], $razon_social_comprador['color_r'], $razon_social_comprador['color_g'], $razon_social_comprador['color_b']);
            if (!empty($razon_social_comprador['posx']) && !empty($razon_social_comprador['posy']))
            {
                $this->Pdf->SetXY($razon_social_comprador['posx'], $razon_social_comprador['posy']);
            }
            elseif (!empty($razon_social_comprador['posx']))
            {
                $this->Pdf->SetX($razon_social_comprador['posx']);
            }
            elseif (!empty($razon_social_comprador['posy']))
            {
                $this->Pdf->SetY($razon_social_comprador['posy']);
            }
            $this->Pdf->Cell($razon_social_comprador['width'], 0, $razon_social_comprador['data'], 0, 0, $razon_social_comprador['align']);

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

            $this->Pdf->SetFont($codcliente['font_type'], $codcliente['font_style'], $codcliente['font_size']);
            $this->pdf_text_color($codcliente['data'], $codcliente['color_r'], $codcliente['color_g'], $codcliente['color_b']);
            if (!empty($codcliente['posx']) && !empty($codcliente['posy']))
            {
                $this->Pdf->SetXY($codcliente['posx'], $codcliente['posy']);
            }
            elseif (!empty($codcliente['posx']))
            {
                $this->Pdf->SetX($codcliente['posx']);
            }
            elseif (!empty($codcliente['posy']))
            {
                $this->Pdf->SetY($codcliente['posy']);
            }
            $this->Pdf->Cell($codcliente['width'], 0, $codcliente['data'], 0, 0, $codcliente['align']);

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

            $this->Pdf->SetFont($id_comprador['font_type'], $id_comprador['font_style'], $id_comprador['font_size']);
            $this->pdf_text_color($id_comprador['data'], $id_comprador['color_r'], $id_comprador['color_g'], $id_comprador['color_b']);
            if (!empty($id_comprador['posx']) && !empty($id_comprador['posy']))
            {
                $this->Pdf->SetXY($id_comprador['posx'], $id_comprador['posy']);
            }
            elseif (!empty($id_comprador['posx']))
            {
                $this->Pdf->SetX($id_comprador['posx']);
            }
            elseif (!empty($id_comprador['posy']))
            {
                $this->Pdf->SetY($id_comprador['posy']);
            }
            $this->Pdf->Cell($id_comprador['width'], 0, $id_comprador['data'], 0, 0, $id_comprador['align']);

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

            $this->Pdf->SetFont($cell_telf_cliente['font_type'], $cell_telf_cliente['font_style'], $cell_telf_cliente['font_size']);
            $this->pdf_text_color($cell_telf_cliente['data'], $cell_telf_cliente['color_r'], $cell_telf_cliente['color_g'], $cell_telf_cliente['color_b']);
            if (!empty($cell_telf_cliente['posx']) && !empty($cell_telf_cliente['posy']))
            {
                $this->Pdf->SetXY($cell_telf_cliente['posx'], $cell_telf_cliente['posy']);
            }
            elseif (!empty($cell_telf_cliente['posx']))
            {
                $this->Pdf->SetX($cell_telf_cliente['posx']);
            }
            elseif (!empty($cell_telf_cliente['posy']))
            {
                $this->Pdf->SetY($cell_telf_cliente['posy']);
            }
            $this->Pdf->Cell($cell_telf_cliente['width'], 0, $cell_telf_cliente['data'], 0, 0, $cell_telf_cliente['align']);

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

            $this->Pdf->SetFont($fecha_emision_comprobante['font_type'], $fecha_emision_comprobante['font_style'], $fecha_emision_comprobante['font_size']);
            $this->pdf_text_color($fecha_emision_comprobante['data'], $fecha_emision_comprobante['color_r'], $fecha_emision_comprobante['color_g'], $fecha_emision_comprobante['color_b']);
            if (!empty($fecha_emision_comprobante['posx']) && !empty($fecha_emision_comprobante['posy']))
            {
                $this->Pdf->SetXY($fecha_emision_comprobante['posx'], $fecha_emision_comprobante['posy']);
            }
            elseif (!empty($fecha_emision_comprobante['posx']))
            {
                $this->Pdf->SetX($fecha_emision_comprobante['posx']);
            }
            elseif (!empty($fecha_emision_comprobante['posy']))
            {
                $this->Pdf->SetY($fecha_emision_comprobante['posy']);
            }
            $this->Pdf->Cell($fecha_emision_comprobante['width'], 0, $fecha_emision_comprobante['data'], 0, 0, $fecha_emision_comprobante['align']);

            $this->Pdf->SetFont($cell_label_vence['font_type'], $cell_label_vence['font_style'], $cell_label_vence['font_size']);
            $this->pdf_text_color($cell_label_vence['data'], $cell_label_vence['color_r'], $cell_label_vence['color_g'], $cell_label_vence['color_b']);
            if (!empty($cell_label_vence['posx']) && !empty($cell_label_vence['posy']))
            {
                $this->Pdf->SetXY($cell_label_vence['posx'], $cell_label_vence['posy']);
            }
            elseif (!empty($cell_label_vence['posx']))
            {
                $this->Pdf->SetX($cell_label_vence['posx']);
            }
            elseif (!empty($cell_label_vence['posy']))
            {
                $this->Pdf->SetY($cell_label_vence['posy']);
            }
            $this->Pdf->Cell($cell_label_vence['width'], 0, $cell_label_vence['data'], 0, 0, $cell_label_vence['align']);

            $this->Pdf->SetFont($cell_vence['font_type'], $cell_vence['font_style'], $cell_vence['font_size']);
            $this->pdf_text_color($cell_vence['data'], $cell_vence['color_r'], $cell_vence['color_g'], $cell_vence['color_b']);
            if (!empty($cell_vence['posx']) && !empty($cell_vence['posy']))
            {
                $this->Pdf->SetXY($cell_vence['posx'], $cell_vence['posy']);
            }
            elseif (!empty($cell_vence['posx']))
            {
                $this->Pdf->SetX($cell_vence['posx']);
            }
            elseif (!empty($cell_vence['posy']))
            {
                $this->Pdf->SetY($cell_vence['posy']);
            }
            $this->Pdf->Cell($cell_vence['width'], 0, $cell_vence['data'], 0, 0, $cell_vence['align']);

            $this->Pdf->SetFont($cell_label_bodega['font_type'], $cell_label_bodega['font_style'], $cell_label_bodega['font_size']);
            $this->pdf_text_color($cell_label_bodega['data'], $cell_label_bodega['color_r'], $cell_label_bodega['color_g'], $cell_label_bodega['color_b']);
            if (!empty($cell_label_bodega['posx']) && !empty($cell_label_bodega['posy']))
            {
                $this->Pdf->SetXY($cell_label_bodega['posx'], $cell_label_bodega['posy']);
            }
            elseif (!empty($cell_label_bodega['posx']))
            {
                $this->Pdf->SetX($cell_label_bodega['posx']);
            }
            elseif (!empty($cell_label_bodega['posy']))
            {
                $this->Pdf->SetY($cell_label_bodega['posy']);
            }
            $this->Pdf->Cell($cell_label_bodega['width'], 0, $cell_label_bodega['data'], 0, 0, $cell_label_bodega['align']);

            $this->Pdf->SetFont($cell_bodega['font_type'], $cell_bodega['font_style'], $cell_bodega['font_size']);
            $this->pdf_text_color($cell_bodega['data'], $cell_bodega['color_r'], $cell_bodega['color_g'], $cell_bodega['color_b']);
            if (!empty($cell_bodega['posx']) && !empty($cell_bodega['posy']))
            {
                $this->Pdf->SetXY($cell_bodega['posx'], $cell_bodega['posy']);
            }
            elseif (!empty($cell_bodega['posx']))
            {
                $this->Pdf->SetX($cell_bodega['posx']);
            }
            elseif (!empty($cell_bodega['posy']))
            {
                $this->Pdf->SetY($cell_bodega['posy']);
            }
            $this->Pdf->Cell($cell_bodega['width'], 0, $cell_bodega['data'], 0, 0, $cell_bodega['align']);

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
                $this->Pdf->SetFont($cell_detalle_DESCUENTO['font_type'], $cell_detalle_DESCUENTO['font_style'], $cell_detalle_DESCUENTO['font_size']);
                if (!empty($cell_detalle_DESCUENTO['posx']))
                {
                    $this->Pdf->SetX($cell_detalle_DESCUENTO['posx']);
                }
                $this->pdf_text_color($this->detalle_descuento[$this->nm_grid_colunas][$NM_ind], $cell_detalle_DESCUENTO['color_r'], $cell_detalle_DESCUENTO['color_g'], $cell_detalle_DESCUENTO['color_b']);
                $this->Pdf->Cell($cell_detalle_DESCUENTO['width'], 0, $this->detalle_descuento[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detalle_DESCUENTO['align']);
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

            $this->Pdf->SetFont($cell_label_puerto['font_type'], $cell_label_puerto['font_style'], $cell_label_puerto['font_size']);
            $this->pdf_text_color($cell_label_puerto['data'], $cell_label_puerto['color_r'], $cell_label_puerto['color_g'], $cell_label_puerto['color_b']);
            if (!empty($cell_label_puerto['posx']) && !empty($cell_label_puerto['posy']))
            {
                $this->Pdf->SetXY($cell_label_puerto['posx'], $cell_label_puerto['posy']);
            }
            elseif (!empty($cell_label_puerto['posx']))
            {
                $this->Pdf->SetX($cell_label_puerto['posx']);
            }
            elseif (!empty($cell_label_puerto['posy']))
            {
                $this->Pdf->SetY($cell_label_puerto['posy']);
            }
            $this->Pdf->Cell($cell_label_puerto['width'], 0, $cell_label_puerto['data'], 0, 0, $cell_label_puerto['align']);

            $this->Pdf->SetFont($cell_puerto['font_type'], $cell_puerto['font_style'], $cell_puerto['font_size']);
            $this->pdf_text_color($cell_puerto['data'], $cell_puerto['color_r'], $cell_puerto['color_g'], $cell_puerto['color_b']);
            if (!empty($cell_puerto['posx']) && !empty($cell_puerto['posy']))
            {
                $this->Pdf->SetXY($cell_puerto['posx'], $cell_puerto['posy']);
            }
            elseif (!empty($cell_puerto['posx']))
            {
                $this->Pdf->SetX($cell_puerto['posx']);
            }
            elseif (!empty($cell_puerto['posy']))
            {
                $this->Pdf->SetY($cell_puerto['posy']);
            }
            $this->Pdf->Cell($cell_puerto['width'], 0, $cell_puerto['data'], 0, 0, $cell_puerto['align']);

            $this->Pdf->SetFont($cell_label_guia['font_type'], $cell_label_guia['font_style'], $cell_label_guia['font_size']);
            $this->pdf_text_color($cell_label_guia['data'], $cell_label_guia['color_r'], $cell_label_guia['color_g'], $cell_label_guia['color_b']);
            if (!empty($cell_label_guia['posx']) && !empty($cell_label_guia['posy']))
            {
                $this->Pdf->SetXY($cell_label_guia['posx'], $cell_label_guia['posy']);
            }
            elseif (!empty($cell_label_guia['posx']))
            {
                $this->Pdf->SetX($cell_label_guia['posx']);
            }
            elseif (!empty($cell_label_guia['posy']))
            {
                $this->Pdf->SetY($cell_label_guia['posy']);
            }
            $this->Pdf->Cell($cell_label_guia['width'], 0, $cell_label_guia['data'], 0, 0, $cell_label_guia['align']);

            $this->Pdf->SetFont($cell_guia['font_type'], $cell_guia['font_style'], $cell_guia['font_size']);
            $this->pdf_text_color($cell_guia['data'], $cell_guia['color_r'], $cell_guia['color_g'], $cell_guia['color_b']);
            if (!empty($cell_guia['posx']) && !empty($cell_guia['posy']))
            {
                $this->Pdf->SetXY($cell_guia['posx'], $cell_guia['posy']);
            }
            elseif (!empty($cell_guia['posx']))
            {
                $this->Pdf->SetX($cell_guia['posx']);
            }
            elseif (!empty($cell_guia['posy']))
            {
                $this->Pdf->SetY($cell_guia['posy']);
            }
            $this->Pdf->Cell($cell_guia['width'], 0, $cell_guia['data'], 0, 0, $cell_guia['align']);

            $this->Pdf->SetFont($cell_label_linea['font_type'], $cell_label_linea['font_style'], $cell_label_linea['font_size']);
            $this->pdf_text_color($cell_label_linea['data'], $cell_label_linea['color_r'], $cell_label_linea['color_g'], $cell_label_linea['color_b']);
            if (!empty($cell_label_linea['posx']) && !empty($cell_label_linea['posy']))
            {
                $this->Pdf->SetXY($cell_label_linea['posx'], $cell_label_linea['posy']);
            }
            elseif (!empty($cell_label_linea['posx']))
            {
                $this->Pdf->SetX($cell_label_linea['posx']);
            }
            elseif (!empty($cell_label_linea['posy']))
            {
                $this->Pdf->SetY($cell_label_linea['posy']);
            }
            $this->Pdf->Cell($cell_label_linea['width'], 0, $cell_label_linea['data'], 0, 0, $cell_label_linea['align']);

            $this->Pdf->SetFont($cell_linea['font_type'], $cell_linea['font_style'], $cell_linea['font_size']);
            $this->pdf_text_color($cell_linea['data'], $cell_linea['color_r'], $cell_linea['color_g'], $cell_linea['color_b']);
            if (!empty($cell_linea['posx']) && !empty($cell_linea['posy']))
            {
                $this->Pdf->SetXY($cell_linea['posx'], $cell_linea['posy']);
            }
            elseif (!empty($cell_linea['posx']))
            {
                $this->Pdf->SetX($cell_linea['posx']);
            }
            elseif (!empty($cell_linea['posy']))
            {
                $this->Pdf->SetY($cell_linea['posy']);
            }
            $this->Pdf->Cell($cell_linea['width'], 0, $cell_linea['data'], 0, 0, $cell_linea['align']);

            $this->Pdf->SetFont($cell_label_cantidad['font_type'], $cell_label_cantidad['font_style'], $cell_label_cantidad['font_size']);
            $this->pdf_text_color($cell_label_cantidad['data'], $cell_label_cantidad['color_r'], $cell_label_cantidad['color_g'], $cell_label_cantidad['color_b']);
            if (!empty($cell_label_cantidad['posx']) && !empty($cell_label_cantidad['posy']))
            {
                $this->Pdf->SetXY($cell_label_cantidad['posx'], $cell_label_cantidad['posy']);
            }
            elseif (!empty($cell_label_cantidad['posx']))
            {
                $this->Pdf->SetX($cell_label_cantidad['posx']);
            }
            elseif (!empty($cell_label_cantidad['posy']))
            {
                $this->Pdf->SetY($cell_label_cantidad['posy']);
            }
            $this->Pdf->Cell($cell_label_cantidad['width'], 0, $cell_label_cantidad['data'], 0, 0, $cell_label_cantidad['align']);

            $this->Pdf->SetFont($cell_cantidad['font_type'], $cell_cantidad['font_style'], $cell_cantidad['font_size']);
            $this->pdf_text_color($cell_cantidad['data'], $cell_cantidad['color_r'], $cell_cantidad['color_g'], $cell_cantidad['color_b']);
            if (!empty($cell_cantidad['posx']) && !empty($cell_cantidad['posy']))
            {
                $this->Pdf->SetXY($cell_cantidad['posx'], $cell_cantidad['posy']);
            }
            elseif (!empty($cell_cantidad['posx']))
            {
                $this->Pdf->SetX($cell_cantidad['posx']);
            }
            elseif (!empty($cell_cantidad['posy']))
            {
                $this->Pdf->SetY($cell_cantidad['posy']);
            }
            $this->Pdf->Cell($cell_cantidad['width'], 0, $cell_cantidad['data'], 0, 0, $cell_cantidad['align']);

            $this->Pdf->SetFont($cell_label_orden['font_type'], $cell_label_orden['font_style'], $cell_label_orden['font_size']);
            $this->pdf_text_color($cell_label_orden['data'], $cell_label_orden['color_r'], $cell_label_orden['color_g'], $cell_label_orden['color_b']);
            if (!empty($cell_label_orden['posx']) && !empty($cell_label_orden['posy']))
            {
                $this->Pdf->SetXY($cell_label_orden['posx'], $cell_label_orden['posy']);
            }
            elseif (!empty($cell_label_orden['posx']))
            {
                $this->Pdf->SetX($cell_label_orden['posx']);
            }
            elseif (!empty($cell_label_orden['posy']))
            {
                $this->Pdf->SetY($cell_label_orden['posy']);
            }
            $this->Pdf->Cell($cell_label_orden['width'], 0, $cell_label_orden['data'], 0, 0, $cell_label_orden['align']);

            $this->Pdf->SetFont($cell_orden['font_type'], $cell_orden['font_style'], $cell_orden['font_size']);
            $this->pdf_text_color($cell_orden['data'], $cell_orden['color_r'], $cell_orden['color_g'], $cell_orden['color_b']);
            if (!empty($cell_orden['posx']) && !empty($cell_orden['posy']))
            {
                $this->Pdf->SetXY($cell_orden['posx'], $cell_orden['posy']);
            }
            elseif (!empty($cell_orden['posx']))
            {
                $this->Pdf->SetX($cell_orden['posx']);
            }
            elseif (!empty($cell_orden['posy']))
            {
                $this->Pdf->SetY($cell_orden['posy']);
            }
            $this->Pdf->Cell($cell_orden['width'], 0, $cell_orden['data'], 0, 0, $cell_orden['align']);

            $this->Pdf->SetFont($cell_label_proveedor['font_type'], $cell_label_proveedor['font_style'], $cell_label_proveedor['font_size']);
            $this->pdf_text_color($cell_label_proveedor['data'], $cell_label_proveedor['color_r'], $cell_label_proveedor['color_g'], $cell_label_proveedor['color_b']);
            if (!empty($cell_label_proveedor['posx']) && !empty($cell_label_proveedor['posy']))
            {
                $this->Pdf->SetXY($cell_label_proveedor['posx'], $cell_label_proveedor['posy']);
            }
            elseif (!empty($cell_label_proveedor['posx']))
            {
                $this->Pdf->SetX($cell_label_proveedor['posx']);
            }
            elseif (!empty($cell_label_proveedor['posy']))
            {
                $this->Pdf->SetY($cell_label_proveedor['posy']);
            }
            $this->Pdf->Cell($cell_label_proveedor['width'], 0, $cell_label_proveedor['data'], 0, 0, $cell_label_proveedor['align']);

            $this->Pdf->SetFont($cell_proveedor['font_type'], $cell_proveedor['font_style'], $cell_proveedor['font_size']);
            $this->pdf_text_color($cell_proveedor['data'], $cell_proveedor['color_r'], $cell_proveedor['color_g'], $cell_proveedor['color_b']);
            if (!empty($cell_proveedor['posx']) && !empty($cell_proveedor['posy']))
            {
                $this->Pdf->SetXY($cell_proveedor['posx'], $cell_proveedor['posy']);
            }
            elseif (!empty($cell_proveedor['posx']))
            {
                $this->Pdf->SetX($cell_proveedor['posx']);
            }
            elseif (!empty($cell_proveedor['posy']))
            {
                $this->Pdf->SetY($cell_proveedor['posy']);
            }
            $this->Pdf->Cell($cell_proveedor['width'], 0, $cell_proveedor['data'], 0, 0, $cell_proveedor['align']);

            $this->Pdf->SetFont($cell_label_agente['font_type'], $cell_label_agente['font_style'], $cell_label_agente['font_size']);
            $this->pdf_text_color($cell_label_agente['data'], $cell_label_agente['color_r'], $cell_label_agente['color_g'], $cell_label_agente['color_b']);
            if (!empty($cell_label_agente['posx']) && !empty($cell_label_agente['posy']))
            {
                $this->Pdf->SetXY($cell_label_agente['posx'], $cell_label_agente['posy']);
            }
            elseif (!empty($cell_label_agente['posx']))
            {
                $this->Pdf->SetX($cell_label_agente['posx']);
            }
            elseif (!empty($cell_label_agente['posy']))
            {
                $this->Pdf->SetY($cell_label_agente['posy']);
            }
            $this->Pdf->Cell($cell_label_agente['width'], 0, $cell_label_agente['data'], 0, 0, $cell_label_agente['align']);

            $this->Pdf->SetFont($cell_agente['font_type'], $cell_agente['font_style'], $cell_agente['font_size']);
            $this->pdf_text_color($cell_agente['data'], $cell_agente['color_r'], $cell_agente['color_g'], $cell_agente['color_b']);
            if (!empty($cell_agente['posx']) && !empty($cell_agente['posy']))
            {
                $this->Pdf->SetXY($cell_agente['posx'], $cell_agente['posy']);
            }
            elseif (!empty($cell_agente['posx']))
            {
                $this->Pdf->SetX($cell_agente['posx']);
            }
            elseif (!empty($cell_agente['posy']))
            {
                $this->Pdf->SetY($cell_agente['posy']);
            }
            $this->Pdf->Cell($cell_agente['width'], 0, $cell_agente['data'], 0, 0, $cell_agente['align']);

            $this->Pdf->SetFont($cell_label_asesor['font_type'], $cell_label_asesor['font_style'], $cell_label_asesor['font_size']);
            $this->pdf_text_color($cell_label_asesor['data'], $cell_label_asesor['color_r'], $cell_label_asesor['color_g'], $cell_label_asesor['color_b']);
            if (!empty($cell_label_asesor['posx']) && !empty($cell_label_asesor['posy']))
            {
                $this->Pdf->SetXY($cell_label_asesor['posx'], $cell_label_asesor['posy']);
            }
            elseif (!empty($cell_label_asesor['posx']))
            {
                $this->Pdf->SetX($cell_label_asesor['posx']);
            }
            elseif (!empty($cell_label_asesor['posy']))
            {
                $this->Pdf->SetY($cell_label_asesor['posy']);
            }
            $this->Pdf->Cell($cell_label_asesor['width'], 0, $cell_label_asesor['data'], 0, 0, $cell_label_asesor['align']);

            $this->Pdf->SetFont($cell_asesor['font_type'], $cell_asesor['font_style'], $cell_asesor['font_size']);
            $this->pdf_text_color($cell_asesor['data'], $cell_asesor['color_r'], $cell_asesor['color_g'], $cell_asesor['color_b']);
            if (!empty($cell_asesor['posx']) && !empty($cell_asesor['posy']))
            {
                $this->Pdf->SetXY($cell_asesor['posx'], $cell_asesor['posy']);
            }
            elseif (!empty($cell_asesor['posx']))
            {
                $this->Pdf->SetX($cell_asesor['posx']);
            }
            elseif (!empty($cell_asesor['posy']))
            {
                $this->Pdf->SetY($cell_asesor['posy']);
            }
            $this->Pdf->Cell($cell_asesor['width'], 0, $cell_asesor['data'], 0, 0, $cell_asesor['align']);

            $this->Pdf->SetFont($label_suma_letras['font_type'], $label_suma_letras['font_style'], $label_suma_letras['font_size']);
            $this->pdf_text_color($label_suma_letras['data'], $label_suma_letras['color_r'], $label_suma_letras['color_g'], $label_suma_letras['color_b']);
            if (!empty($label_suma_letras['posx']) && !empty($label_suma_letras['posy']))
            {
                $this->Pdf->SetXY($label_suma_letras['posx'], $label_suma_letras['posy']);
            }
            elseif (!empty($label_suma_letras['posx']))
            {
                $this->Pdf->SetX($label_suma_letras['posx']);
            }
            elseif (!empty($label_suma_letras['posy']))
            {
                $this->Pdf->SetY($label_suma_letras['posy']);
            }
            $this->Pdf->Cell($label_suma_letras['width'], 0, $label_suma_letras['data'], 0, 0, $label_suma_letras['align']);

            $this->Pdf->SetFont($suma_letras['font_type'], $suma_letras['font_style'], $suma_letras['font_size']);
            $this->Pdf->SetTextColor($suma_letras['color_r'], $suma_letras['color_g'], $suma_letras['color_b']);
            if (!empty($suma_letras['posx']) && !empty($suma_letras['posy']))
            {
                $this->Pdf->SetXY($suma_letras['posx'], $suma_letras['posy']);
            }
            elseif (!empty($suma_letras['posx']))
            {
                $this->Pdf->SetX($suma_letras['posx']);
            }
            elseif (!empty($suma_letras['posy']))
            {
                $this->Pdf->SetY($suma_letras['posy']);
            }
            $NM_partes_val = explode("<br>", $suma_letras['data']);
            $PosX = $this->Pdf->GetX();
            $Incre = false;
            foreach ($NM_partes_val as $Lines)
            {
                if ($Incre)
                {
                    $this->Pdf->Ln(2.4694444444444);
                }
                $this->Pdf->SetX($PosX);
                $this->Pdf->Cell($suma_letras['width'], 0, trim($Lines), 0, 0, $suma_letras['align']);
                $Incre = true;
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

            $this->Pdf->SetFont($total_sin_impuestos['font_type'], $total_sin_impuestos['font_style'], $total_sin_impuestos['font_size']);
            $this->pdf_text_color($total_sin_impuestos['data'], $total_sin_impuestos['color_r'], $total_sin_impuestos['color_g'], $total_sin_impuestos['color_b']);
            if (!empty($total_sin_impuestos['posx']) && !empty($total_sin_impuestos['posy']))
            {
                $this->Pdf->SetXY($total_sin_impuestos['posx'], $total_sin_impuestos['posy']);
            }
            elseif (!empty($total_sin_impuestos['posx']))
            {
                $this->Pdf->SetX($total_sin_impuestos['posx']);
            }
            elseif (!empty($total_sin_impuestos['posy']))
            {
                $this->Pdf->SetY($total_sin_impuestos['posy']);
            }
            $this->Pdf->Cell($total_sin_impuestos['width'], 0, $total_sin_impuestos['data'], 0, 0, $total_sin_impuestos['align']);

            $this->Pdf->SetFont($total_descuento['font_type'], $total_descuento['font_style'], $total_descuento['font_size']);
            $this->pdf_text_color($total_descuento['data'], $total_descuento['color_r'], $total_descuento['color_g'], $total_descuento['color_b']);
            if (!empty($total_descuento['posx']) && !empty($total_descuento['posy']))
            {
                $this->Pdf->SetXY($total_descuento['posx'], $total_descuento['posy']);
            }
            elseif (!empty($total_descuento['posx']))
            {
                $this->Pdf->SetX($total_descuento['posx']);
            }
            elseif (!empty($total_descuento['posy']))
            {
                $this->Pdf->SetY($total_descuento['posy']);
            }
            $this->Pdf->Cell($total_descuento['width'], 0, $total_descuento['data'], 0, 0, $total_descuento['align']);

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

            $this->Pdf->SetFont($base0['font_type'], $base0['font_style'], $base0['font_size']);
            $this->pdf_text_color($base0['data'], $base0['color_r'], $base0['color_g'], $base0['color_b']);
            if (!empty($base0['posx']) && !empty($base0['posy']))
            {
                $this->Pdf->SetXY($base0['posx'], $base0['posy']);
            }
            elseif (!empty($base0['posx']))
            {
                $this->Pdf->SetX($base0['posx']);
            }
            elseif (!empty($base0['posy']))
            {
                $this->Pdf->SetY($base0['posy']);
            }
            $this->Pdf->Cell($base0['width'], 0, $base0['data'], 0, 0, $base0['align']);

            $this->Pdf->SetFont($base12['font_type'], $base12['font_style'], $base12['font_size']);
            $this->pdf_text_color($base12['data'], $base12['color_r'], $base12['color_g'], $base12['color_b']);
            if (!empty($base12['posx']) && !empty($base12['posy']))
            {
                $this->Pdf->SetXY($base12['posx'], $base12['posy']);
            }
            elseif (!empty($base12['posx']))
            {
                $this->Pdf->SetX($base12['posx']);
            }
            elseif (!empty($base12['posy']))
            {
                $this->Pdf->SetY($base12['posy']);
            }
            $this->Pdf->Cell($base12['width'], 0, $base12['data'], 0, 0, $base12['align']);

            $this->Pdf->SetFont($valor1['font_type'], $valor1['font_style'], $valor1['font_size']);
            $this->pdf_text_color($valor1['data'], $valor1['color_r'], $valor1['color_g'], $valor1['color_b']);
            if (!empty($valor1['posx']) && !empty($valor1['posy']))
            {
                $this->Pdf->SetXY($valor1['posx'], $valor1['posy']);
            }
            elseif (!empty($valor1['posx']))
            {
                $this->Pdf->SetX($valor1['posx']);
            }
            elseif (!empty($valor1['posy']))
            {
                $this->Pdf->SetY($valor1['posy']);
            }
            $this->Pdf->Cell($valor1['width'], 0, $valor1['data'], 0, 0, $valor1['align']);

            $this->Pdf->SetFont($importe_total['font_type'], $importe_total['font_style'], $importe_total['font_size']);
            $this->pdf_text_color($importe_total['data'], $importe_total['color_r'], $importe_total['color_g'], $importe_total['color_b']);
            if (!empty($importe_total['posx']) && !empty($importe_total['posy']))
            {
                $this->Pdf->SetXY($importe_total['posx'], $importe_total['posy']);
            }
            elseif (!empty($importe_total['posx']))
            {
                $this->Pdf->SetX($importe_total['posx']);
            }
            elseif (!empty($importe_total['posy']))
            {
                $this->Pdf->SetY($importe_total['posy']);
            }
            $this->Pdf->Cell($importe_total['width'], 0, $importe_total['data'], 0, 0, $importe_total['align']);

            $this->Pdf->SetFont($cell_label_formapago['font_type'], $cell_label_formapago['font_style'], $cell_label_formapago['font_size']);
            $this->pdf_text_color($cell_label_formapago['data'], $cell_label_formapago['color_r'], $cell_label_formapago['color_g'], $cell_label_formapago['color_b']);
            if (!empty($cell_label_formapago['posx']) && !empty($cell_label_formapago['posy']))
            {
                $this->Pdf->SetXY($cell_label_formapago['posx'], $cell_label_formapago['posy']);
            }
            elseif (!empty($cell_label_formapago['posx']))
            {
                $this->Pdf->SetX($cell_label_formapago['posx']);
            }
            elseif (!empty($cell_label_formapago['posy']))
            {
                $this->Pdf->SetY($cell_label_formapago['posy']);
            }
            $this->Pdf->Cell($cell_label_formapago['width'], 0, $cell_label_formapago['data'], 0, 0, $cell_label_formapago['align']);

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

            $this->Pdf->SetFont($cell_formapago['font_type'], $cell_formapago['font_style'], $cell_formapago['font_size']);
            $this->pdf_text_color($cell_formapago['data'], $cell_formapago['color_r'], $cell_formapago['color_g'], $cell_formapago['color_b']);
            if (!empty($cell_formapago['posx']) && !empty($cell_formapago['posy']))
            {
                $this->Pdf->SetXY($cell_formapago['posx'], $cell_formapago['posy']);
            }
            elseif (!empty($cell_formapago['posx']))
            {
                $this->Pdf->SetX($cell_formapago['posx']);
            }
            elseif (!empty($cell_formapago['posy']))
            {
                $this->Pdf->SetY($cell_formapago['posy']);
            }
            $this->Pdf->Cell($cell_formapago['width'], 0, $cell_formapago['data'], 0, 0, $cell_formapago['align']);

            $this->Pdf->SetFont($cell_vendedor['font_type'], $cell_vendedor['font_style'], $cell_vendedor['font_size']);
            $this->pdf_text_color($cell_vendedor['data'], $cell_vendedor['color_r'], $cell_vendedor['color_g'], $cell_vendedor['color_b']);
            if (!empty($cell_vendedor['posx']) && !empty($cell_vendedor['posy']))
            {
                $this->Pdf->SetXY($cell_vendedor['posx'], $cell_vendedor['posy']);
            }
            elseif (!empty($cell_vendedor['posx']))
            {
                $this->Pdf->SetX($cell_vendedor['posx']);
            }
            elseif (!empty($cell_vendedor['posy']))
            {
                $this->Pdf->SetY($cell_vendedor['posy']);
            }
            $this->Pdf->Cell($cell_vendedor['width'], 0, $cell_vendedor['data'], 0, 0, $cell_vendedor['align']);

            $this->Pdf->SetFont($ruc_vendedor['font_type'], $ruc_vendedor['font_style'], $ruc_vendedor['font_size']);
            $this->pdf_text_color($ruc_vendedor['data'], $ruc_vendedor['color_r'], $ruc_vendedor['color_g'], $ruc_vendedor['color_b']);
            if (!empty($ruc_vendedor['posx']) && !empty($ruc_vendedor['posy']))
            {
                $this->Pdf->SetXY($ruc_vendedor['posx'], $ruc_vendedor['posy']);
            }
            elseif (!empty($ruc_vendedor['posx']))
            {
                $this->Pdf->SetX($ruc_vendedor['posx']);
            }
            elseif (!empty($ruc_vendedor['posy']))
            {
                $this->Pdf->SetY($ruc_vendedor['posy']);
            }
            $this->Pdf->Cell($ruc_vendedor['width'], 0, $ruc_vendedor['data'], 0, 0, $ruc_vendedor['align']);

            $this->Pdf->SetFont($razon_social_vendedor['font_type'], $razon_social_vendedor['font_style'], $razon_social_vendedor['font_size']);
            $this->pdf_text_color($razon_social_vendedor['data'], $razon_social_vendedor['color_r'], $razon_social_vendedor['color_g'], $razon_social_vendedor['color_b']);
            if (!empty($razon_social_vendedor['posx']) && !empty($razon_social_vendedor['posy']))
            {
                $this->Pdf->SetXY($razon_social_vendedor['posx'], $razon_social_vendedor['posy']);
            }
            elseif (!empty($razon_social_vendedor['posx']))
            {
                $this->Pdf->SetX($razon_social_vendedor['posx']);
            }
            elseif (!empty($razon_social_vendedor['posy']))
            {
                $this->Pdf->SetY($razon_social_vendedor['posy']);
            }
            $this->Pdf->Cell($razon_social_vendedor['width'], 0, $razon_social_vendedor['data'], 0, 0, $razon_social_vendedor['align']);

            $this->Pdf->SetFont($cell_label_ca['font_type'], $cell_label_ca['font_style'], $cell_label_ca['font_size']);
            $this->pdf_text_color($cell_label_ca['data'], $cell_label_ca['color_r'], $cell_label_ca['color_g'], $cell_label_ca['color_b']);
            if (!empty($cell_label_ca['posx']) && !empty($cell_label_ca['posy']))
            {
                $this->Pdf->SetXY($cell_label_ca['posx'], $cell_label_ca['posy']);
            }
            elseif (!empty($cell_label_ca['posx']))
            {
                $this->Pdf->SetX($cell_label_ca['posx']);
            }
            elseif (!empty($cell_label_ca['posy']))
            {
                $this->Pdf->SetY($cell_label_ca['posy']);
            }
            $this->Pdf->Cell($cell_label_ca['width'], 0, $cell_label_ca['data'], 0, 0, $cell_label_ca['align']);

            if (isset($codigo_barra['data']) && !empty($codigo_barra['data']) && is_file($codigo_barra['data']))
            {
                $Finfo_img = finfo_open(FILEINFO_MIME_TYPE);
                $Tipo_img  = finfo_file($Finfo_img, $codigo_barra['data']);
                finfo_close($Finfo_img);
                if (substr($Tipo_img, 0, 5) == "image")
                {
                    $this->Pdf->Image($codigo_barra['data'], $codigo_barra['posx'], $codigo_barra['posy'], 70, 10);
                }
            }

			$this->Pdf->Output("/tmp/factura_".$this->f_estab[$this->nm_grid_colunas]."-".$this->f_ptoemi[$this->nm_grid_colunas]."-".$this->f_secuencial[$this->nm_grid_colunas].".pdf","F");
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
