<?php
//
   if (!session_id())
   {
   include_once('form_agenda_mob_session.php');
           include_once("../_lib/lib/php/fix.php");
   @ini_set('session.cookie_httponly', 1);
   @ini_set('session.use_only_cookies', 1);
   @ini_set('session.cookie_secure', 0);
   @session_start() ;
       if (!function_exists("sc_check_mobile"))
       {
           include_once("../_lib/lib/php/nm_check_mobile.php");
       }
       $_SESSION['scriptcase']['device_mobile'] = sc_check_mobile();
       if (!isset($_SESSION['scriptcase']['display_mobile']))
       {
           $_SESSION['scriptcase']['display_mobile'] = true;
       }
       if ($_SESSION['scriptcase']['device_mobile'])
       {
           if ($_SESSION['scriptcase']['display_mobile'] && isset($_POST['_sc_force_mobile']) && 'out' == $_POST['_sc_force_mobile'])
           {
               $_SESSION['scriptcase']['display_mobile'] = false;
           }
           elseif (!$_SESSION['scriptcase']['display_mobile'] && isset($_POST['_sc_force_mobile']) && 'in' == $_POST['_sc_force_mobile'])
           {
               $_SESSION['scriptcase']['display_mobile'] = true;
           }
       }
       if (!$_SESSION['scriptcase']['display_mobile'])
       {
          include_once('form_agenda.php');
          exit;
       }
   }

   $_SESSION['scriptcase']['form_agenda']['error_buffer'] = '';

   $_SESSION['scriptcase']['form_agenda_mob']['glo_nm_perfil']          = "conn_mysql";
   $_SESSION['scriptcase']['form_agenda_mob']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['form_agenda_mob']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['form_agenda_mob']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['form_agenda_mob']['glo_nm_path_cache']  = "";
   $_SESSION['scriptcase']['form_agenda_mob']['glo_nm_path_doc']        = "";
   $NM_dir_atual = getcwd();
   if (empty($NM_dir_atual))
   {
       $str_path_sys  = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
       $str_path_sys  = str_replace("\\", '/', $str_path_sys);
   }
   else
   {
       $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
       $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
   }
   //check publication with the prod
   $str_path_apl_url = $_SERVER['PHP_SELF'];
   $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
   $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
   $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
   $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
   $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
   //check prod
   if(empty($_SESSION['scriptcase']['form_agenda_mob']['glo_nm_path_prod']))
   {
           /*check prod*/$_SESSION['scriptcase']['form_agenda_mob']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
   }
   //check img
   if(empty($_SESSION['scriptcase']['form_agenda_mob']['glo_nm_path_imagens']))
   {
           /*check img*/$_SESSION['scriptcase']['form_agenda_mob']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
   }
   //check tmp
   if(empty($_SESSION['scriptcase']['form_agenda_mob']['glo_nm_path_imag_temp']))
   {
           /*check tmp*/$_SESSION['scriptcase']['form_agenda_mob']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
   }
   //check cache
   if(empty($_SESSION['scriptcase']['form_agenda_mob']['glo_nm_path_cache']))
   {
           /*check cache*/$_SESSION['scriptcase']['form_agenda_mob']['glo_nm_path_cache'] = $str_path_apl_dir . "_lib/file/cache";
   }
   //check doc
   if(empty($_SESSION['scriptcase']['form_agenda_mob']['glo_nm_path_doc']))
   {
           /*check doc*/$_SESSION['scriptcase']['form_agenda_mob']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
   }
   //end check publication with the prod
//
class form_agenda_mob_ini
{
   var $nm_cod_apl;
   var $nm_nome_apl;
   var $nm_seguranca;
   var $nm_grupo;
   var $nm_grupo_versao;
   var $nm_autor;
   var $nm_versao_sc;
   var $nm_tp_lic_sc;
   var $nm_dt_criacao;
   var $nm_hr_criacao;
   var $nm_autor_alt;
   var $nm_dt_ult_alt;
   var $nm_hr_ult_alt;
   var $nm_timestamp;
   var $cor_bg_table;
   var $border_grid;
   var $cor_bg_grid;
   var $cor_cab_grid;
   var $cor_borda;
   var $cor_txt_cab_grid;
   var $cab_fonte_tipo;
   var $cab_fonte_tamanho;
   var $rod_fonte_tipo;
   var $rod_fonte_tamanho;
   var $cor_rod_grid;
   var $cor_txt_rod_grid;
   var $cor_barra_nav;
   var $cor_titulo;
   var $cor_txt_titulo;
   var $titulo_fonte_tipo;
   var $titulo_fonte_tamanho;
   var $cor_grid_impar;
   var $cor_grid_par;
   var $cor_txt_grid;
   var $texto_fonte_tipo;
   var $texto_fonte_tamanho;
   var $cor_lin_grupo;
   var $cor_txt_grupo;
   var $grupo_fonte_tipo;
   var $grupo_fonte_tamanho;
   var $cor_lin_sub_tot;
   var $cor_txt_sub_tot;
   var $sub_tot_fonte_tipo;
   var $sub_tot_fonte_tamanho;
   var $cor_lin_tot;
   var $cor_txt_tot;
   var $tot_fonte_tipo;
   var $tot_fonte_tamanho;
   var $cor_link_cab;
   var $cor_link_dados;
   var $img_fun_pag;
   var $img_fun_cab;
   var $img_fun_rod;
   var $img_fun_tit;
   var $img_fun_gru;
   var $img_fun_tot;
   var $img_fun_sub;
   var $img_fun_imp;
   var $img_fun_par;
   var $root;
   var $server;
   var $sc_protocolo;
   var $path_prod;
   var $path_link;
   var $path_aplicacao;
   var $path_embutida;
   var $path_botoes;
   var $path_img_global;
   var $path_img_modelo;
   var $path_icones;
   var $path_imagens;
   var $path_imag_cab;
   var $path_imag_temp;
   var $path_libs;
   var $path_doc;
   var $str_lang;
   var $str_schema_all;
   var $str_google_fonts;
   var $str_conf_reg;
   var $path_cep;
   var $path_secure;
   var $path_js;
   var $path_adodb;
   var $path_grafico;
   var $path_atual;
   var $Gd_missing;
   var $sc_site_ssl;
   var $nm_cont_lin;
   var $nm_limite_lin;
   var $nm_limite_lin_prt;
   var $nm_falta_var;
   var $nm_falta_var_db;
   var $nm_tpbanco;
   var $nm_servidor;
   var $nm_usuario;
   var $nm_senha;
   var $nm_database_encoding;
   var $nm_arr_db_extra_args = array();
   var $nm_con_db2 = array();
   var $nm_con_persistente;
   var $nm_con_use_schema;
   var $nm_tabela;
   var $nm_col_dinamica   = array();
   var $nm_order_dinamico = array();
   var $nm_hidden_pages   = array();
   var $nm_page_names     = array();
   var $nm_page_blocks    = array();
   var $nm_block_page     = array();
   var $nm_hidden_blocos  = array();
   var $sc_tem_trans_banco;
   var $nm_bases_all;
   var $nm_bases_access;
   var $nm_bases_db2;
   var $nm_bases_ibase;
   var $nm_bases_informix;
   var $nm_bases_mssql;
   var $nm_bases_mysql;
   var $nm_bases_postgres;
   var $nm_bases_oracle;
   var $nm_bases_sqlite;
   var $nm_bases_sybase;
   var $nm_bases_vfp;
   var $nm_bases_odbc;
   var $nm_bases_progress;
   var $sc_page;
   var $sc_lig_md5 = array();
   var $sc_lig_target = array();
   var $sc_lig_iframe = array();
   var $force_db_utf8 = false;
//
   function init()
   {
       global
             $nm_url_saida, $nm_apl_dependente, $script_case_init;

      @ini_set('magic_quotes_runtime', 0);
      $this->sc_page = $script_case_init;
      $_SESSION['scriptcase']['sc_num_page'] = $script_case_init;
      $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
      $_SESSION['scriptcase']['sc_cnt_sql']  = 0;
      $this->sc_charset['UTF-8'] = 'utf-8';
      $this->sc_charset['ISO-2022-JP'] = 'iso-2022-jp';
      $this->sc_charset['ISO-2022-KR'] = 'iso-2022-kr';
      $this->sc_charset['ISO-8859-1'] = 'iso-8859-1';
      $this->sc_charset['ISO-8859-2'] = 'iso-8859-2';
      $this->sc_charset['ISO-8859-3'] = 'iso-8859-3';
      $this->sc_charset['ISO-8859-4'] = 'iso-8859-4';
      $this->sc_charset['ISO-8859-5'] = 'iso-8859-5';
      $this->sc_charset['ISO-8859-6'] = 'iso-8859-6';
      $this->sc_charset['ISO-8859-7'] = 'iso-8859-7';
      $this->sc_charset['ISO-8859-8'] = 'iso-8859-8';
      $this->sc_charset['ISO-8859-8-I'] = 'iso-8859-8-i';
      $this->sc_charset['ISO-8859-9'] = 'iso-8859-9';
      $this->sc_charset['ISO-8859-10'] = 'iso-8859-10';
      $this->sc_charset['ISO-8859-13'] = 'iso-8859-13';
      $this->sc_charset['ISO-8859-14'] = 'iso-8859-14';
      $this->sc_charset['ISO-8859-15'] = 'iso-8859-15';
      $this->sc_charset['WINDOWS-1250'] = 'windows-1250';
      $this->sc_charset['WINDOWS-1251'] = 'windows-1251';
      $this->sc_charset['WINDOWS-1252'] = 'windows-1252';
      $this->sc_charset['TIS-620'] = 'tis-620';
      $this->sc_charset['WINDOWS-1253'] = 'windows-1253';
      $this->sc_charset['WINDOWS-1254'] = 'windows-1254';
      $this->sc_charset['WINDOWS-1255'] = 'windows-1255';
      $this->sc_charset['WINDOWS-1256'] = 'windows-1256';
      $this->sc_charset['WINDOWS-1257'] = 'windows-1257';
      $this->sc_charset['KOI8-R'] = 'koi8-r';
      $this->sc_charset['BIG-5'] = 'big5';
      $this->sc_charset['EUC-CN'] = 'EUC-CN';
      $this->sc_charset['GB18030'] = 'GB18030';
      $this->sc_charset['GB2312'] = 'gb2312';
      $this->sc_charset['EUC-JP'] = 'euc-jp';
      $this->sc_charset['SJIS'] = 'shift-jis';
      $this->sc_charset['EUC-KR'] = 'euc-kr';
      $_SESSION['scriptcase']['charset_entities']['UTF-8'] = 'UTF-8';
      $_SESSION['scriptcase']['charset_entities']['ISO-8859-1'] = 'ISO-8859-1';
      $_SESSION['scriptcase']['charset_entities']['ISO-8859-5'] = 'ISO-8859-5';
      $_SESSION['scriptcase']['charset_entities']['ISO-8859-15'] = 'ISO-8859-15';
      $_SESSION['scriptcase']['charset_entities']['WINDOWS-1251'] = 'cp1251';
      $_SESSION['scriptcase']['charset_entities']['WINDOWS-1252'] = 'cp1252';
      $_SESSION['scriptcase']['charset_entities']['BIG-5'] = 'BIG5';
      $_SESSION['scriptcase']['charset_entities']['EUC-CN'] = 'GB2312';
      $_SESSION['scriptcase']['charset_entities']['GB2312'] = 'GB2312';
      $_SESSION['scriptcase']['charset_entities']['SJIS'] = 'Shift_JIS';
      $_SESSION['scriptcase']['charset_entities']['EUC-JP'] = 'EUC-JP';
      $_SESSION['scriptcase']['charset_entities']['KOI8-R'] = 'KOI8-R';
      $_SESSION['scriptcase']['trial_version'] = 'N';
      $_SESSION['sc_session'][$this->sc_page]['form_agenda']['decimal_db'] = "."; 

      $this->nm_cod_apl      = "form_agenda"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "CIMEDFAC"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_script_by    = "netmake"; 
      $this->nm_script_type  = "PHP"; 
      $this->nm_versao_sc    = "v9"; 
      $this->nm_tp_lic_sc    = "ep_bronze"; 
      $this->nm_dt_criacao   = "20190704"; 
      $this->nm_hr_criacao   = "053212"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20201209"; 
      $this->nm_hr_ult_alt   = "141349"; 
      list($NM_usec, $NM_sec) = explode(" ", microtime()); 
      $this->nm_timestamp    = (float) $NM_sec; 
      $this->nm_app_version  = "1.0.0"; 
// 
      $this->border_grid           = ""; 
      $this->cor_bg_grid           = ""; 
      $this->cor_bg_table          = ""; 
      $this->cor_borda             = ""; 
      $this->cor_cab_grid          = ""; 
      $this->cor_txt_pag           = ""; 
      $this->cor_link_pag          = ""; 
      $this->pag_fonte_tipo        = ""; 
      $this->pag_fonte_tamanho     = ""; 
      $this->cor_txt_cab_grid      = ""; 
      $this->cab_fonte_tipo        = ""; 
      $this->cab_fonte_tamanho     = ""; 
      $this->rod_fonte_tipo        = ""; 
      $this->rod_fonte_tamanho     = ""; 
      $this->cor_rod_grid          = ""; 
      $this->cor_txt_rod_grid      = ""; 
      $this->cor_barra_nav         = ""; 
      $this->cor_titulo            = ""; 
      $this->cor_txt_titulo        = ""; 
      $this->titulo_fonte_tipo     = ""; 
      $this->titulo_fonte_tamanho  = ""; 
      $this->cor_grid_impar        = ""; 
      $this->cor_grid_par          = ""; 
      $this->cor_txt_grid          = ""; 
      $this->texto_fonte_tipo      = ""; 
      $this->texto_fonte_tamanho   = ""; 
      $this->cor_lin_grupo         = ""; 
      $this->cor_txt_grupo         = ""; 
      $this->grupo_fonte_tipo      = ""; 
      $this->grupo_fonte_tamanho   = ""; 
      $this->cor_lin_sub_tot       = ""; 
      $this->cor_txt_sub_tot       = ""; 
      $this->sub_tot_fonte_tipo    = ""; 
      $this->sub_tot_fonte_tamanho = ""; 
      $this->cor_lin_tot           = ""; 
      $this->cor_txt_tot           = ""; 
      $this->tot_fonte_tipo        = ""; 
      $this->tot_fonte_tamanho     = ""; 
      $this->cor_link_cab          = ""; 
      $this->cor_link_dados        = ""; 
      $this->img_fun_pag           = ""; 
      $this->img_fun_cab           = ""; 
      $this->img_fun_rod           = ""; 
      $this->img_fun_tit           = ""; 
      $this->img_fun_gru           = ""; 
      $this->img_fun_tot           = ""; 
      $this->img_fun_sub           = ""; 
      $this->img_fun_imp           = ""; 
      $this->img_fun_par           = ""; 
// 
      $NM_dir_atual = getcwd();
      if (empty($NM_dir_atual))
      {
          $str_path_sys          = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
          $str_path_sys          = str_replace("\\", '/', $str_path_sys);
      }
      else
      {
          $sc_nm_arquivo         = explode("/", $_SERVER['PHP_SELF']);
          $str_path_sys          = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
      }
      //check publication with the prod
      $str_path_apl_url = $_SERVER['PHP_SELF'];
      $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
      $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
      $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
// 
      $this->sc_site_ssl     = (isset($_SERVER['HTTP_REFERER']) && strtolower(substr($_SERVER['HTTP_REFERER'], 0, 5)) == 'https') ? true : false;
      $this->sc_protocolo    = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->path_prod       = $_SESSION['scriptcase']['form_agenda_mob']['glo_nm_path_prod'];
      $this->path_imagens    = $_SESSION['scriptcase']['form_agenda_mob']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['form_agenda_mob']['glo_nm_path_imag_temp'];
      $this->path_cache      = $_SESSION['scriptcase']['form_agenda_mob']['glo_nm_path_cache'];
      $this->path_doc        = $_SESSION['scriptcase']['form_agenda_mob']['glo_nm_path_doc'];
      if (!isset($_SESSION['scriptcase']['str_lang']) || empty($_SESSION['scriptcase']['str_lang']))
      {
          $_SESSION['scriptcase']['str_lang'] = "es";
      }
      if (!isset($_SESSION['scriptcase']['str_conf_reg']) || empty($_SESSION['scriptcase']['str_conf_reg']))
      {
          $_SESSION['scriptcase']['str_conf_reg'] = "es_ec";
      }
      $this->str_lang        = $_SESSION['scriptcase']['str_lang'];
      $this->str_conf_reg    = $_SESSION['scriptcase']['str_conf_reg'];
      $this->str_schema_all  = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc8_PictonBlue/Sc8_PictonBlue";
      $this->str_google_fonts  = isset($str_google_fonts)?$str_google_fonts:'';
      $this->server          = (isset($_SERVER['SERVER_NAME'])) ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
      if (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80 && !$this->sc_site_ssl )
      {
          $this->server         .= ":" . $_SERVER['SERVER_PORT'];
      }
      $this->server_pdf      = $this->sc_protocolo . $this->server;
      $this->server          = "";
      $this->sc_protocolo    = "";
      $str_path_web          = $_SERVER['PHP_SELF'];
      $str_path_web          = str_replace("\\", '/', $str_path_web);
      $str_path_web          = str_replace('//', '/', $str_path_web);
      $this->root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $this->path_aplicacao  = substr($str_path_sys, 0, strrpos($str_path_sys, '/'));
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/form_agenda';
      $this->path_embutida   = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/') + 1);
      $this->path_aplicacao .= '/';
      $this->path_link       = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $this->path_link       = substr($this->path_link, 0, strrpos($this->path_link, '/')) . '/';
      $this->path_help       = $this->path_link . "_lib/webhelp/";
      $this->path_lang       = "../_lib/lang/";
      $this->path_lang_js    = "../_lib/js/";
      $this->path_botoes     = $this->path_link . "_lib/img";
      $this->path_img_global = $this->path_link . "_lib/img";
      $this->path_img_modelo = $this->path_link . "_lib/img";
      $this->path_icones     = $this->path_link . "_lib/img";
      $this->path_imag_cab   = $this->path_link . "_lib/img";
      $this->path_btn        = $this->root . $this->path_link . "_lib/buttons/";
      $this->path_css        = $this->root . $this->path_link . "_lib/css/";
      $this->path_lib_php    = $this->root . $this->path_link . "_lib/lib/php/";
      $this->url_lib_js      = $this->path_link . "_lib/lib/js/";
      $this->url_lib         = $this->path_link . '/_lib/';
      $this->url_third       = $this->path_prod . '/third/';
      $this->path_cep        = $this->path_prod . "/cep";
      $this->path_cor        = $this->path_prod . "/cor";
      $this->path_js         = $this->path_prod . "/lib/js";
      $this->path_libs       = $this->root . $this->path_prod . "/lib/php";
      $this->path_third      = $this->root . $this->path_prod . "/third";
      $this->path_secure     = $this->root . $this->path_prod . "/secure";
      $this->path_adodb      = $this->root . $this->path_prod . "/third/adodb";

      $_SESSION['scriptcase']['dir_temp'] = $this->root . $this->path_imag_temp;
      if (isset($_SESSION['scriptcase']['form_agenda_mob']['session_timeout']['lang'])) {
          $this->str_lang = $_SESSION['scriptcase']['form_agenda_mob']['session_timeout']['lang'];
      }
      elseif (!isset($_SESSION['scriptcase']['form_agenda_mob']['actual_lang']) || $_SESSION['scriptcase']['form_agenda_mob']['actual_lang'] != $this->str_lang) {
          $_SESSION['scriptcase']['form_agenda_mob']['actual_lang'] = $this->str_lang;
          setcookie('sc_actual_lang_CIMEDFAC',$this->str_lang,'0','/');
      }
      global $inicial_form_agenda_mob;
      if (isset($_SESSION['scriptcase']['user_logout']))
      {
          foreach ($_SESSION['scriptcase']['user_logout'] as $ind => $parms)
          {
              if (isset($_SESSION[$parms['V']]) && $_SESSION[$parms['V']] == $parms['U'])
              {
                  $nm_apl_dest = $parms['R'];
                  $dir = explode("/", $nm_apl_dest);
                  if (count($dir) == 1)
                  {
                      $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
                      $nm_apl_dest = $this->path_link . SC_dir_app_name($nm_apl_dest) . "/";
                  }
                  unset($_SESSION['scriptcase']['user_logout'][$ind]);
                  if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag) && $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag)
                  {
                      $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['redir']['action']  = $nm_apl_dest;
                      $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['redir']['target']  = $parms['T'];
                      $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['redir']['metodo']  = "post";
                      $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['redir']['script_case_init']  = $this->sc_page;
                      form_agenda_mob_pack_ajax_response();
                      exit;
                  }
?>
                  <html>
                  <body>
                  <form name="FRedirect" method="POST" action="<?php echo $nm_apl_dest; ?>" target="<?php echo $parms['T']; ?>">
                  </form>
                  <script>
                   document.FRedirect.submit();
                  </script>
                  </body>
                  </html>
<?php
                  exit;
              }
          }
      }
      $str_path = substr($this->path_prod, 0, strrpos($this->path_prod, '/') + 1); 
      if (!is_file($this->root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
      {
          unset($_SESSION['scriptcase']['nm_sc_retorno']);
          unset($_SESSION['scriptcase']['form_agenda']['glo_nm_conexao']);
      }
      include($this->path_lang . $this->str_lang . ".lang.php");
      include($this->path_lang . "config_region.php");
      include($this->path_lang . "lang_config_region.php");
      $_SESSION['scriptcase']['charset'] = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "ISO-8859-15";
      ini_set('default_charset', $_SESSION['scriptcase']['charset']);
      $_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];

      asort($this->Nm_lang_conf_region);
      foreach ($this->Nm_lang_conf_region as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang_conf_region[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
      {
          $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
      }
      if (!function_exists("mb_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtmb'] . "</font></div>";exit;
      } 
      elseif (!function_exists("sc_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtsc'] . "</font></div>";exit;
      } 
      foreach ($this->Nm_conf_reg[$this->str_conf_reg] as $ind => $dados)
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
          {
              $this->Nm_conf_reg[$this->str_conf_reg][$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
      }
      foreach ($this->Nm_lang as $ind => $dados)
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($ind))
          {
              $ind = sc_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
              $this->Nm_lang[$ind] = $dados;
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
          {
              $this->Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
      }
      if (isset($_SESSION['scriptcase']['form_agenda_mob']['session_timeout']['redir'])) {
          $SS_cod_html  = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">';
          $SS_cod_html .= "<HTML>\r\n";
          $SS_cod_html .= " <HEAD>\r\n";
          $SS_cod_html .= "  <TITLE></TITLE>\r\n";
          $SS_cod_html .= "   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\"/>\r\n";
          if ($_SESSION['scriptcase']['proc_mobile']) {
              $SS_cod_html .= "   <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\"/>\r\n";
          }
          $SS_cod_html .= "   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n";
          $SS_cod_html .= "    <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n";
          if ($_SESSION['scriptcase']['form_agenda_mob']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body>\r\n";
          }
          else {
              $SS_cod_html .= "    <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_form.css\"/>\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\"/>\r\n";
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body class=\"scFormPage\">\r\n";
              $SS_cod_html .= "    <table align=\"center\"><tr><td style=\"padding: 0\"><div class=\"scFormBorder\">\r\n";
              $SS_cod_html .= "    <table width='100%' cellspacing=0 cellpadding=0><tr><td class=\"scFormDataOdd\" style=\"padding: 15px 30px; text-align: center\">\r\n";
              $SS_cod_html .= $this->Nm_lang['lang_errm_expired_session'] . "\r\n";
              $SS_cod_html .= "     <form name=\"Fsession_redir\" method=\"post\"\r\n";
              $SS_cod_html .= "           target=\"_self\">\r\n";
              $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['form_agenda_mob']['session_timeout']['redir'] . "');\">\r\n";
              $SS_cod_html .= "     </form>\r\n";
              $SS_cod_html .= "    </td></tr></table>\r\n";
              $SS_cod_html .= "    </div></td></tr></table>\r\n";
          }
          $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
          if ($_SESSION['scriptcase']['form_agenda_mob']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['form_agenda_mob']['session_timeout']['redir'] . "');\r\n";
          }
          $SS_cod_html .= "      function sc_session_redir(url_redir)\r\n";
          $SS_cod_html .= "      {\r\n";
          $SS_cod_html .= "         if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')\r\n";
          $SS_cod_html .= "         {\r\n";
          $SS_cod_html .= "            window.parent.sc_session_redir(url_redir);\r\n";
          $SS_cod_html .= "         }\r\n";
          $SS_cod_html .= "         else\r\n";
          $SS_cod_html .= "         {\r\n";
          $SS_cod_html .= "             if (window.opener && typeof window.opener.sc_session_redir === 'function')\r\n";
          $SS_cod_html .= "             {\r\n";
          $SS_cod_html .= "                 window.close();\r\n";
          $SS_cod_html .= "                 window.opener.sc_session_redir(url_redir);\r\n";
          $SS_cod_html .= "             }\r\n";
          $SS_cod_html .= "             else\r\n";
          $SS_cod_html .= "             {\r\n";
          $SS_cod_html .= "                 window.location = url_redir;\r\n";
          $SS_cod_html .= "             }\r\n";
          $SS_cod_html .= "         }\r\n";
          $SS_cod_html .= "      }\r\n";
          $SS_cod_html .= "    </script>\r\n";
          $SS_cod_html .= " </body>\r\n";
          $SS_cod_html .= "</HTML>\r\n";
          unset($_SESSION['scriptcase']['form_agenda_mob']['session_timeout']);
          unset($_SESSION['sc_session']);
      }
      if (isset($SS_cod_html) && isset($_GET['nmgp_opcao']) && (substr($_GET['nmgp_opcao'], 0, 14) == "ajax_aut_comp_" || substr($_GET['nmgp_opcao'], 0, 13) == "ajax_autocomp"))
      {
          unset($_SESSION['sc_session']);
          $oJson = new Services_JSON();
          echo $oJson->encode("ss_time_out");
          exit;
      }
      elseif (isset($SS_cod_html) && isset($_POST['nmgp_opcao']) && ($_POST['nmgp_opcao'] == "ajax_dyn_refresh_field" || $_POST['nmgp_opcao'] == "ajax_add_dyn_search" || $_POST['nmgp_opcao'] == "ajax_ch_bi_dyn_search"))
      {
          unset($_SESSION['sc_session']);
          $this->Arr_result = array();
          $this->Arr_result['ss_time_out'] = true;
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      elseif (isset($SS_cod_html) && isset($_POST['rs']) && !is_array($_POST['rs']) && 'ajax_' == substr($_POST['rs'], 0, 5) && isset($_POST['rsargs']) && !empty($_POST['rsargs']))
      {
          $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['redir']['action']  = "form_agenda_mob.php";
          $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['redir']['target']  = "_self";
          $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['redir']['metodo']  = "post";
          $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['redir']['script_case_init']  = $this->sc_page;
          form_agenda_mob_pack_ajax_response();
          exit;
      }
      elseif (isset($SS_cod_html))
      {
          echo $SS_cod_html;
          exit;
      }
      if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['form_agenda_mob']['session_timeout']['redir']))
      {
          unset($_SESSION['sc_session']['SC_parm_violation']);
          echo "<html>";
          echo "<body>";
          echo "<table align=\"center\" width=\"50%\" border=1 height=\"50px\">";
          echo "<tr>";
          echo "   <td align=\"center\">";
          echo "       <b><font size=4>" . $this->Nm_lang['lang_errm_ajax_data'] . "</font>";
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          echo "</body>";
          echo "</html>";
          exit;
      }
      $PHP_ver = str_replace(".", "", phpversion()); 
      if (substr($PHP_ver, 0, 3) < 434)
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_phpv'] . "</font></div>";exit;
      }
      if (file_exists($this->path_libs . "/ver.dat"))
      {
          $SC_ver = file($this->path_libs . "/ver.dat"); 
          $SC_ver = str_replace(".", "", $SC_ver[0]); 
          if (substr($SC_ver, 0, 5) < 40015)
          {
              echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_incp'] . "</font></div>";exit;
          } 
      } 
      if (-1 != version_compare(phpversion(), '5.0.0'))
      {
         $this->path_grafico    = $this->root . $this->path_prod . "/third/jpgraph5/src";
      }
      else
      {
          $this->path_grafico    = $this->root . $this->path_prod . "/third/jpgraph4/src";
      }
      $_SESSION['sc_session'][$this->sc_page]['form_agenda']['path_doc'] = $this->path_doc; 
      $_SESSION['scriptcase']['nm_path_prod'] = $this->root . $this->path_prod . "/"; 
      $_SESSION['scriptcase']['nm_root_cep']  = $this->root; 
      $_SESSION['scriptcase']['nm_path_cep']  = $this->path_cep; 
      if (empty($this->path_imag_cab))
      {
          $this->path_imag_cab = $this->path_img_global;
      }
      if (!is_dir($this->root . $this->path_prod))
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_default { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.5s;-o-transition: all 0.5s;-ms-transition: all 0.5s;-webkit-transition:all 0.5s;-moz-transition:all 0.5s;-webkit-backface-visibility: hidden;-webkit-transition: background-color linear 0.2s; text-decoration:none; border-width:1px; border-color:#65a7cf; border-style:solid; border-radius:3px; background-color:#2574A9; filter: alpha(opacity=100); opacity:1; padding:8px 10px; cursor:pointer;  }";
          echo ".scButton_default:hover { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.5s;-o-transition: all 0.5s;-ms-transition: all 0.5s;-webkit-transition:all 0.5s;-moz-transition:all 0.5s;-webkit-backface-visibility: hidden;-webkit-transition: background-color linear 0.2s; text-decoration:none; border-width:1px; border-color:#6a93ad; border-style:solid; border-radius:3px; background-color:#3B82B2; filter: alpha(opacity=100); opacity:1; padding:8px 10px; cursor:pointer;  }";
          echo ".scButton_default:active { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#14a8de; border-style:solid; border-radius:3px; background-color:#5190BA; filter: alpha(opacity=100); opacity:1; padding:8px 10px; cursor:pointer;  }";
          echo ".scButton_default_disabled { font-family:Tahoma, Arial, sans-serif; color:#7d7d7d; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#c9c9c9; border-style:solid; border-radius:3px; background-color:#e6e6e6; filter: alpha(opacity=100); opacity:1; padding:8px 10px; cursor:default;  }";
          echo ".scButton_default_selected { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.5s;-o-transition: all 0.5s;-ms-transition: all 0.5s;-webkit-transition:all 0.5s;-moz-transition:all 0.5s;-webkit-backface-visibility: hidden;-webkit-transition: background-color linear 0.2s; text-decoration:none; border-width:1px; border-color:#65a7cf; border-style:solid; border-radius:3px; background-color:#2574A9; filter: alpha(opacity=100); opacity:1; padding:8px 10px; cursor:pointer;  }";
          echo ".scButton_default_list { background-color:#ffffff; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list:hover { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list_disabled { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; filter: alpha(opacity=45); opacity:0.45; cursor:default;  }";
          echo ".scButton_default_list_selected { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; cursor:pointer; filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default_list:active { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_small { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.5s;-o-transition: all 0.5s;-ms-transition: all 0.5s;-webkit-transition:all 0.5s;-moz-transition:all 0.5s;-webkit-backface-visibility: hidden;-webkit-transition: background-color linear 0.2s; text-decoration:none; border-width:1px; border-color:#65a7cf; border-style:solid; border-radius:3px; background-color:#2574A9; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer;  }";
          echo ".scButton_small:hover { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.5s;-o-transition: all 0.5s;-ms-transition: all 0.5s;-webkit-transition:all 0.5s;-moz-transition:all 0.5s;-webkit-backface-visibility: hidden;-webkit-transition: background-color linear 0.2s; text-decoration:none; border-width:1px; border-color:#6a93ad; border-style:solid; border-radius:3px; background-color:#3B82B2; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer;  }";
          echo ".scButton_small:active { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#14a8de; border-style:solid; border-radius:3px; background-color:#5190BA; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer;  }";
          echo ".scButton_small_disabled { font-family:Tahoma, Arial, sans-serif; color:#7d7d7d; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#c9c9c9; border-style:solid; border-radius:3px; background-color:#e6e6e6; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:default;  }";
          echo ".scButton_small_selected { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.5s;-o-transition: all 0.5s;-ms-transition: all 0.5s;-webkit-transition:all 0.5s;-moz-transition:all 0.5s;-webkit-backface-visibility: hidden;-webkit-transition: background-color linear 0.2s; text-decoration:none; border-width:1px; border-color:#65a7cf; border-style:solid; border-radius:3px; background-color:#2574A9; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer;  }";
          echo ".scButton_small_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_small_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#2b77c0; border-style:solid; border-radius:4.25px; background-color:#2b77c0; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#999; border-style:solid; border-radius:4.25px; background-color:#999; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#7a7a7a; border-style:solid; border-radius:4.25px; background-color:#7a7a7a; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertcancel_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sc_image {  }";
          echo ".scButton_sc_image:hover {  }";
          echo ".scButton_sc_image:active {  }";
          echo ".scButton_sc_image_disabled {  }";
          echo ".scLink_default { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:active { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:hover { text-decoration: none; font-size: 12px; color: #0000AA;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_cmlb_nfnd'] . "</font>";
          echo "  " . $this->root . $this->path_prod;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['sc_outra_jan'] != 'form_agenda_mob')) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
?>
                  <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $this->Nm_lang['lang_btns_back'] ?>" title="<?php echo $this->Nm_lang['lang_btns_back_hint'] ?>" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

<?php
              } 
              else 
              { 
?>
                  <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $this->Nm_lang['lang_btns_exit'] ?>" title="__NM_HINT__ (Alt + Q)" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

<?php
              } 
          } 
          exit ;
      }

      $this->path_atual  = getcwd();
      $opsys = strtolower(php_uname());

      global $under_dashboard, $dashboard_app, $own_widget, $parent_widget, $compact_mode, $remove_margin, $remove_border;
      if (!isset($_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['under_dashboard']))
      {
          $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['under_dashboard'] = false;
          $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['dashboard_app']   = '';
          $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['own_widget']      = '';
          $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['parent_widget']   = '';
          $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['compact_mode']    = false;
          $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['remove_margin']   = false;
          $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['remove_border']   = false;
      }
      if (isset($_GET['under_dashboard']) && 1 == $_GET['under_dashboard'])
      {
          if (isset($_GET['own_widget']) && 'dbifrm_widget' == substr($_GET['own_widget'], 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['own_widget'] = $_GET['own_widget'];
              $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['under_dashboard'] = true;
              if (isset($_GET['dashboard_app'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['dashboard_app'] = $_GET['dashboard_app'];
              }
              if (isset($_GET['parent_widget'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['parent_widget'] = $_GET['parent_widget'];
              }
              if (isset($_GET['compact_mode'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['compact_mode'] = 1 == $_GET['compact_mode'];
              }
              if (isset($_GET['remove_margin'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['remove_margin'] = 1 == $_GET['remove_margin'];
              }
              if (isset($_GET['remove_border'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['remove_border'] = 1 == $_GET['remove_border'];
              }
          }
      }
      elseif (isset($under_dashboard) && 1 == $under_dashboard)
      {
          if (isset($own_widget) && 'dbifrm_widget' == substr($own_widget, 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['own_widget'] = $own_widget;
              $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['under_dashboard'] = true;
              if (isset($dashboard_app)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['dashboard_app'] = $dashboard_app;
              }
              if (isset($parent_widget)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['parent_widget'] = $parent_widget;
              }
              if (isset($compact_mode)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['compact_mode'] = 1 == $compact_mode;
              }
              if (isset($remove_margin)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['remove_margin'] = 1 == $remove_margin;
              }
              if (isset($remove_border)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['remove_border'] = 1 == $remove_border;
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['maximized'] = false;
      }
      if (isset($_GET['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['maximized'] = 1 == $_GET['maximized'];
      }
      if ($_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['under_dashboard'])
      {
          $sTmpDashboardApp = $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['dashboard_info']['dashboard_app'];
          if ('' != $sTmpDashboardApp && isset($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["form_agenda_mob"]))
          {
              foreach ($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["form_agenda_mob"] as $sTmpTargetLink => $sTmpTargetWidget)
              {
                  if (isset($this->sc_lig_target[$sTmpTargetLink]))
                  {
                      if (isset($this->sc_lig_iframe[$this->sc_lig_target[$sTmpTargetLink]]))
                      {
                          $this->sc_lig_iframe[$this->sc_lig_target[$sTmpTargetLink]] = $sTmpTargetWidget;
                      }
                      $this->sc_lig_target[$sTmpTargetLink] = $sTmpTargetWidget;
                  }
              }
          }
      }
      $this->nm_cont_lin       = 0;
      $this->nm_limite_lin     = 0;
      $this->nm_limite_lin_prt = 0;
// 
      include_once($this->path_adodb . "/adodb.inc.php");
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod");
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib");
      if(function_exists('set_php_timezone'))  set_php_timezone('form_agenda_mob'); 
      $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->sc_Include($this->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $this->sc_Include($this->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->sc_Include($this->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_api.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/fix.php", "", "") ; 
      $this->nm_data = new nm_data("es");
      global $inicial_form_agenda_mob, $NM_run_iframe;
      if ((isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag) && $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag) || (isset($_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['embutida_call']) && $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['embutida_call']) || $NM_run_iframe == 1)
      {
           $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
      }
      perfil_lib($this->path_libs);
      if (!isset($_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil']))
      {
          if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($this->path_libs, $this->path_prod);
          $_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil'] = true;
      }
      if (function_exists("nm_check_pdf_server")) $this->server_pdf = nm_check_pdf_server($this->path_libs, $this->server_pdf);
      if (!isset($_SESSION['scriptcase']['sc_num_img']) || empty($_SESSION['scriptcase']['sc_num_img']))
      { 
          $_SESSION['scriptcase']['sc_num_img'] = 1; 
      } 
      $this->Export_img_zip = false;;
      $this->Img_export_zip  = array();
      $this->regionalDefault();
      $this->sc_tem_trans_banco = false;
      $this->nm_bases_access     = array("access", "ado_access", "ace_access");
      $this->nm_bases_db2        = array("db2", "db2_odbc", "odbc_db2", "odbc_db2v6", "pdo_db2_odbc", "pdo_ibm");
      $this->nm_bases_ibase      = array("ibase", "firebird", "pdo_firebird", "borland_ibase");
      $this->nm_bases_informix   = array("informix", "informix72", "pdo_informix");
      $this->nm_bases_mssql      = array("mssql", "ado_mssql", "adooledb_mssql", "odbc_mssql", "mssqlnative", "pdo_sqlsrv", "pdo_dblib", "azure_mssql", "azure_ado_mssql", "azure_adooledb_mssql", "azure_odbc_mssql", "azure_mssqlnative", "azure_pdo_sqlsrv", "azure_pdo_dblib", "googlecloud_mssql", "googlecloud_ado_mssql", "googlecloud_adooledb_mssql", "googlecloud_odbc_mssql", "googlecloud_mssqlnative", "googlecloud_pdo_sqlsrv", "googlecloud_pdo_dblib", "amazonrds_mssql", "amazonrds_ado_mssql", "amazonrds_adooledb_mssql", "amazonrds_odbc_mssql", "amazonrds_mssqlnative", "amazonrds_pdo_sqlsrv", "amazonrds_pdo_dblib");
      $this->nm_bases_mysql      = array("mysql", "mysqlt", "mysqli", "maxsql", "pdo_mysql", "azure_mysql", "azure_mysqlt", "azure_mysqli", "azure_maxsql", "azure_pdo_mysql", "googlecloud_mysql", "googlecloud_mysqlt", "googlecloud_mysqli", "googlecloud_maxsql", "googlecloud_pdo_mysql", "amazonrds_mysql", "amazonrds_mysqlt", "amazonrds_mysqli", "amazonrds_maxsql", "amazonrds_pdo_mysql");
      $this->nm_bases_postgres   = array("postgres", "postgres64", "postgres7", "pdo_pgsql", "azure_postgres", "azure_postgres64", "azure_postgres7", "azure_pdo_pgsql", "googlecloud_postgres", "googlecloud_postgres64", "googlecloud_postgres7", "googlecloud_pdo_pgsql", "amazonrds_postgres", "amazonrds_postgres64", "amazonrds_postgres7", "amazonrds_pdo_pgsql");
      $this->nm_bases_oracle     = array("oci8", "oci805", "oci8po", "odbc_oracle", "oracle", "pdo_oracle", "oraclecloud_oci8", "oraclecloud_oci805", "oraclecloud_oci8po", "oraclecloud_odbc_oracle", "oraclecloud_oracle", "oraclecloud_pdo_oracle", "amazonrds_oci8", "amazonrds_oci805", "amazonrds_oci8po", "amazonrds_odbc_oracle", "amazonrds_oracle", "amazonrds_pdo_oracle");
      $this->nm_bases_sqlite     = array("sqlite", "sqlite3", "pdosqlite");
      $this->nm_bases_sybase     = array("sybase", "pdo_sybase_odbc", "pdo_sybase_dblib");
      $this->nm_bases_vfp        = array("vfp");
      $this->nm_bases_odbc       = array("odbc");
      $this->nm_bases_progress   = array("progress", "pdo_progress_odbc");
      $this->nm_bases_all        = array_merge($this->nm_bases_access, $this->nm_bases_db2, $this->nm_bases_ibase, $this->nm_bases_informix, $this->nm_bases_mssql, $this->nm_bases_mysql, $this->nm_bases_postgres, $this->nm_bases_oracle, $this->nm_bases_sqlite, $this->nm_bases_sybase, $this->nm_bases_vfp, $this->nm_bases_odbc, $this->nm_bases_progress);
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1DcJeZSX7HABYVWFaDMBOVIBsHEFYHMB/D9BsZSB/Z1vOZMB/DMzGZSXeDWB3DoJeDcBwZSX7DSrwHQJsDMvmVcFKV5BmVoBqD9BsZkFGHAvsD5XGHgBeHEFiV5B3DoF7D9XsDuFaHAveHuB/DMzGDkBOH5XCVoBiHQJmZkBiHINKD5XGDMzGDkXKDWFqHIBOHQJKH9BiD1BeV5BqDMzGZSJqDWF/HMBiD9BsVIraD1rwV5X7HgBeHEFiDWFqDoBODcXOZSX7HANOV5BOHuNODkBOV5F/VEBiDcJUZkFGHArKV5FUDMrYZSXeV5FqHIJsHQXGZSX7HAN7V5JwHuzGVIBOV5FYVoJwDcBqZ1B/HIBeV5FaDEBOVkXeH5F/DoraDcXOZSX7Z1BYV5JwHgvsZSrCV5F/VorqD9JmZ1rqHArKHQJwDEBODkFeH5FYVoFGHQJKDQJsZ1BYHuBODMzGDkFCDWFaVEFGHQBsZ1BiHABYZMFaHgBeHEFiV5B3DoF7D9XsDuFaHAveHQXGDMvsZSNiH5FqHIraHQNwZ1X7DSvmZMJeHgvCHEJqDWFGZuXGHQJeDQB/D1NKVWJeDMrwVcB/DuFGVEFGHQXOVINUHAvmZMBOHgvCHArCDWFqHIrqHQJKDuFaHIrKHuFUHgNKDkBODuFqDoFGDcBqVIJwD1rwHQrqHgBYVkJ3H5FYHINUHQNwH9BiZ1N7HuF7DMrwV9FeDWJeHMBOHQBsZ1BOHANOHuX7HgvCHArCDuJeHIB/DcXGZ9XGHAvmVWBqDMrwV9FeDuFqHIrqHQBqZkFGD1vsZMBODMrYZSXeDuFYVoXGDcJeZ9rqD1BeHQJeDMvsVIBsV5BmVEraHQNwZ1FGZ1rYHQFUHgvCHEJqHEXCHIJeHQXsZSFUDSN7HuBqDMrwV9BUDWBmVoX7DcFYZkFGD1rwHuFUHgvCHEJqHEFqHIBqHQXOZSBiDSrwHuJeHgNKDkBODuFqDoFGDcBqVIJwD1rwD5JeDMBYZSJqV5FaDoBODcJeDQFGD1veD5BOHgrYZSJ3V5X7VoraD9XOZ1rqD1vsD5FaDErKZSXeH5X/ZuXGHQXGZSFGHIrwVWXGHuBYDkFCDWJeVoraD9BsH9FaD1vsD5FaDErKZSXeH5FYDoJeD9JKDQFGHAveVWJsHgvsDkBODWFaVoFGDcJUZkFUZ1BOD5rqDEBOHEFiHEFqDoF7DcJUZSFGD1BeV5FGHgrYDkBODur/VoraD9XOH9FaD1rKD5BiDMzGHEFiDWFqZuBODcBwDQX7HIBeV5JwHuzGVcFKV5FYDoraD9BsZSFaD1vsV5FUDMBYVkXeHEFqZuJsHQJKDQJsZ1vCV5FGHuNOV9FeDWB3VoX7HQNmZ1BiHAvCD5BqHgveHArsDWrGDoBqHQJeDuFaHAveD5NUHgNKDkBOV5FYHMBiHQNmZkFGZ1vmZMJeHgNOHEJGDuJeHIraHQJeDQB/HIvsVWBqHuNOVIB/DWFYDoJsDcFYZ1X7DSNOHQJwDEBODkFeH5FYVoFGHQJKDQFaDSN7V5FUHuvmVcBOV5FYDoraDcBwZ1FGDSNOV5JeDEBOHEXeDWFqVoBiDcBwDQFGDSvCV5BiHgrwVcFKV5X7VoFGDcBqH9B/HABYV5FUDEBOZSJ3DWF/VoBiDcJUZSX7Z1BYHuFaDMvsV9FiV5BmVorq";
      $this->prep_conect();
      $this->conectDB();
      if (!in_array(strtolower($this->nm_tpbanco), $this->nm_bases_all))
      {
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nspt'] . "</font>";
          echo "  " . $perfil_trab;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['sc_outra_jan'] != 'form_agenda_mob')) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
                  echo "<a href='" . $_SESSION['scriptcase']['nm_sc_retorno'] . "' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase8_DarkBlue_bvoltar.gif' title='" . $this->Nm_lang['lang_btns_rtrn_scrp_hint'] . "' align=absmiddle></a> \n" ; 
              } 
              else 
              { 
                  echo "<a href='$nm_url_saida' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase8_DarkBlue_bsair.gif' title='" . $this->Nm_lang['lang_btns_exit_appl_hint'] . "' align=absmiddle></a> \n" ; 
              } 
          } 
          exit ;
      } 
   }
   function prep_conect()
   {
      $con_devel             =  (isset($_SESSION['scriptcase']['form_agenda_mob']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['form_agenda_mob']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['form_agenda_mob']['glo_nm_conexao']) && $_SESSION['scriptcase']['form_agenda_mob']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['form_agenda_mob']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['form_agenda_mob']['glo_nm_perfil']) && $_SESSION['scriptcase']['form_agenda_mob']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['form_agenda_mob']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['form_agenda_mob']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['form_agenda_mob']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      if (isset($_SESSION['scriptcase']['form_agenda_mob']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_agenda_mob']['glo_nm_conexao']))
      {
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'CIMEDFAC', 2, $this->force_db_utf8); 
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['form_agenda_mob']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['form_agenda_mob']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['form_agenda_mob']['glo_nm_perfil'];
      }
      elseif (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['glo_perfil'];
      }
      if (!empty($perfil_trab))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = "";
          carrega_perfil($perfil_trab, $this->path_libs, "S");
          if (empty($_SESSION['scriptcase']['glo_senha_protect']))
          {
              $nm_crit_perfil = true;
          }
      }
      else
      {
          $perfil_trab = $con_devel;
      }
      if (!$_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['embutida_form'] || !$_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['embutida_proc']) 
      {
          if (!isset($_SESSION['usr_login'])) 
          {
              $this->nm_falta_var .= "usr_login; ";
          }
      }
// 
      if (!isset($_SESSION['scriptcase']['glo_tpbanco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_tpbanco; ";
          }
      }
      else
      {
          $this->nm_tpbanco = $_SESSION['scriptcase']['glo_tpbanco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_servidor']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_servidor; ";
          }
      }
      else
      {
          $this->nm_servidor = $_SESSION['scriptcase']['glo_servidor']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_banco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_banco; ";
          }
      }
      else
      {
          $this->nm_banco = $_SESSION['scriptcase']['glo_banco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_usuario']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_usuario; ";
          }
      }
      else
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_usuario']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_senha']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_senha; ";
          }
      }
      else
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_senha']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_autocommit']))
      {
          $this->nm_con_db2['db2_autocommit'] = $_SESSION['scriptcase']['glo_db2_autocommit']; 
      }
      if (isset($_SESSION['scriptcase']['glo_database_encoding']))
      {
          $this->nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_lib']))
      {
          $this->nm_con_db2['db2_i5_lib'] = $_SESSION['scriptcase']['glo_db2_i5_lib']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_naming']))
      {
          $this->nm_con_db2['db2_i5_naming'] = $_SESSION['scriptcase']['glo_db2_i5_naming']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_commit']))
      {
          $this->nm_con_db2['db2_i5_commit'] = $_SESSION['scriptcase']['glo_db2_i5_commit']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_query_optimize']))
      {
          $this->nm_con_db2['db2_i5_query_optimize'] = $_SESSION['scriptcase']['glo_db2_i5_query_optimize']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_persistent']))
      {
          $this->nm_con_persistente = $_SESSION['scriptcase']['glo_use_persistent']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_schema']))
      {
          $this->nm_con_use_schema = $_SESSION['scriptcase']['glo_use_schema']; 
      }
      $this->nm_arr_db_extra_args = array(); 
      if (isset($_SESSION['scriptcase']['glo_use_ssl']))
      {
          $this->nm_arr_db_extra_args['use_ssl'] = $_SESSION['scriptcase']['glo_use_ssl']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_key']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_key'] = $_SESSION['scriptcase']['glo_mysql_ssl_key']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cert']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_cert'] = $_SESSION['scriptcase']['glo_mysql_ssl_cert']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_capath']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_capath'] = $_SESSION['scriptcase']['glo_mysql_ssl_capath']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_ca']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_ca'] = $_SESSION['scriptcase']['glo_mysql_ssl_ca']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cipher']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_cipher'] = $_SESSION['scriptcase']['glo_mysql_ssl_cipher']; 
      }
      if (isset($_SESSION['scriptcase']['oracle_type']))
      {
          $this->nm_arr_db_extra_args['oracle_type'] = $_SESSION['scriptcase']['oracle_type']; 
      }
      $this->date_delim  = "'";
      $this->date_delim1 = "'";
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
      {
          $this->date_delim  = "#";
          $this->date_delim1 = "#";
      }
      if (isset($_SESSION['scriptcase']['glo_decimal_db']) && !empty($_SESSION['scriptcase']['glo_decimal_db']))
      {
         $_SESSION['sc_session'][$this->sc_page]['form_agenda']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['form_agenda']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['form_agenda']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
          {
              $_SESSION['sc_session'][$this->sc_page]['form_agenda']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['form_agenda']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['form_agenda']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['form_agenda']['SC_sep_date1'];
      }
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = "agenda"; 
      }
// 
      if (!empty($this->nm_falta_var) || !empty($this->nm_falta_var_db) || $nm_crit_perfil)
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_default { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.5s;-o-transition: all 0.5s;-ms-transition: all 0.5s;-webkit-transition:all 0.5s;-moz-transition:all 0.5s;-webkit-backface-visibility: hidden;-webkit-transition: background-color linear 0.2s; text-decoration:none; border-width:1px; border-color:#65a7cf; border-style:solid; border-radius:3px; background-color:#2574A9; filter: alpha(opacity=100); opacity:1; padding:8px 10px; cursor:pointer;  }";
          echo ".scButton_default:hover { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.5s;-o-transition: all 0.5s;-ms-transition: all 0.5s;-webkit-transition:all 0.5s;-moz-transition:all 0.5s;-webkit-backface-visibility: hidden;-webkit-transition: background-color linear 0.2s; text-decoration:none; border-width:1px; border-color:#6a93ad; border-style:solid; border-radius:3px; background-color:#3B82B2; filter: alpha(opacity=100); opacity:1; padding:8px 10px; cursor:pointer;  }";
          echo ".scButton_default:active { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#14a8de; border-style:solid; border-radius:3px; background-color:#5190BA; filter: alpha(opacity=100); opacity:1; padding:8px 10px; cursor:pointer;  }";
          echo ".scButton_default_disabled { font-family:Tahoma, Arial, sans-serif; color:#7d7d7d; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#c9c9c9; border-style:solid; border-radius:3px; background-color:#e6e6e6; filter: alpha(opacity=100); opacity:1; padding:8px 10px; cursor:default;  }";
          echo ".scButton_default_selected { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.5s;-o-transition: all 0.5s;-ms-transition: all 0.5s;-webkit-transition:all 0.5s;-moz-transition:all 0.5s;-webkit-backface-visibility: hidden;-webkit-transition: background-color linear 0.2s; text-decoration:none; border-width:1px; border-color:#65a7cf; border-style:solid; border-radius:3px; background-color:#2574A9; filter: alpha(opacity=100); opacity:1; padding:8px 10px; cursor:pointer;  }";
          echo ".scButton_default_list { background-color:#ffffff; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list:hover { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list_disabled { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; filter: alpha(opacity=45); opacity:0.45; cursor:default;  }";
          echo ".scButton_default_list_selected { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; cursor:pointer; filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default_list:active { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_small { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.5s;-o-transition: all 0.5s;-ms-transition: all 0.5s;-webkit-transition:all 0.5s;-moz-transition:all 0.5s;-webkit-backface-visibility: hidden;-webkit-transition: background-color linear 0.2s; text-decoration:none; border-width:1px; border-color:#65a7cf; border-style:solid; border-radius:3px; background-color:#2574A9; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer;  }";
          echo ".scButton_small:hover { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.5s;-o-transition: all 0.5s;-ms-transition: all 0.5s;-webkit-transition:all 0.5s;-moz-transition:all 0.5s;-webkit-backface-visibility: hidden;-webkit-transition: background-color linear 0.2s; text-decoration:none; border-width:1px; border-color:#6a93ad; border-style:solid; border-radius:3px; background-color:#3B82B2; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer;  }";
          echo ".scButton_small:active { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#14a8de; border-style:solid; border-radius:3px; background-color:#5190BA; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer;  }";
          echo ".scButton_small_disabled { font-family:Tahoma, Arial, sans-serif; color:#7d7d7d; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#c9c9c9; border-style:solid; border-radius:3px; background-color:#e6e6e6; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:default;  }";
          echo ".scButton_small_selected { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.5s;-o-transition: all 0.5s;-ms-transition: all 0.5s;-webkit-transition:all 0.5s;-moz-transition:all 0.5s;-webkit-backface-visibility: hidden;-webkit-transition: background-color linear 0.2s; text-decoration:none; border-width:1px; border-color:#65a7cf; border-style:solid; border-radius:3px; background-color:#2574A9; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer;  }";
          echo ".scButton_small_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_small_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#2b77c0; border-style:solid; border-radius:4.25px; background-color:#2b77c0; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#999; border-style:solid; border-radius:4.25px; background-color:#999; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#7a7a7a; border-style:solid; border-radius:4.25px; background-color:#7a7a7a; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertcancel_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sc_image {  }";
          echo ".scButton_sc_image:hover {  }";
          echo ".scButton_sc_image:active {  }";
          echo ".scButton_sc_image_disabled {  }";
          echo ".scLink_default { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:active { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:hover { text-decoration: none; font-size: 12px; color: #0000AA;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          if (empty($this->nm_falta_var_db))
          {
              if (!empty($this->nm_falta_var))
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_glob'] . "</font>";
                  echo "  " . $this->nm_falta_var;
                  echo "   </b></td>";
                  echo " </tr>";
              }
              if ($nm_crit_perfil)
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nfnd'] . "</font>";
                  echo "  " . $perfil_trab;
                  echo "   </b></td>";
                  echo " </tr>";
              }
          }
          else
          {
              echo "<tr>";
              echo "   <td bgcolor=\"\">";
              echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_data'] . "</font></b>";
              echo "   </td>";
              echo " </tr>";
          }
          echo "</table>";
          if (!$_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['iframe_menu'] && (!isset($_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['sc_outra_jan']) || $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['sc_outra_jan'] != 'form_agenda_mob')) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
?>
                  <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $this->Nm_lang['lang_btns_back'] ?>" title="<?php echo $this->Nm_lang['lang_btns_back_hint'] ?>" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

<?php
              } 
              else 
              { 
?>
                  <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $this->Nm_lang['lang_btns_exit'] ?>" title="__NM_HINT__ (Alt + Q)" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

<?php
              } 
          } 
          exit ;
      }

      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2) && $this->force_db_utf8) {
          putenv('DB2CODEPAGE=1208');
      }

      if (isset($_SESSION['scriptcase']['glo_db_master_usr']) && !empty($_SESSION['scriptcase']['glo_db_master_usr']))
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_db_master_usr']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_pass']) && !empty($_SESSION['scriptcase']['glo_db_master_pass']))
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_db_master_pass']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_cript']) && !empty($_SESSION['scriptcase']['glo_db_master_cript']))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = $_SESSION['scriptcase']['glo_db_master_cript']; 
      }
  } 
// 
  function conectDB()
  {
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['form_agenda_mob']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_agenda_mob']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['form_agenda_mob']['glo_nm_conexao'], $this->root . $this->path_prod, 'CIMEDFAC', 1, $this->force_db_utf8); 
      } 
      else 
      { 
         if (!isset($this->nm_con_persistente))
         {
            $this->nm_con_persistente = 'N';
         }
         if (!isset($this->nm_con_db2))
         {
            $this->nm_con_db2 = '';
         }
         if (!isset($this->nm_database_encoding))
         {
            $this->nm_database_encoding = '';
         }
         if ($this->force_db_utf8)
         {
            $this->nm_database_encoding = 'utf8';
         }
         if (!isset($this->nm_arr_db_extra_args))
         {
            $this->nm_arr_db_extra_args = array();
         }
         $this->Db = db_conect($this->nm_tpbanco, $this->nm_servidor, $this->nm_usuario, $this->nm_senha, $this->nm_banco, $glo_senha_protect, "S", $this->nm_con_persistente, $this->nm_con_db2, $this->nm_database_encoding, $this->nm_arr_db_extra_args); 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase))
      {
          if (function_exists('ibase_timefmt'))
          {
              ibase_timefmt('%Y-%m-%d %H:%M:%S');
          } 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sybase))
      {
          $this->Db->fetchMode = ADODB_FETCH_BOTH;
          $this->Db->Execute("set dateformat ymd");
          $this->Db->Execute("set quoted_identifier ON");
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2))
      {
          $this->Db->fetchMode = ADODB_FETCH_NUM;
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql))
      {
          $this->Db->Execute("set dateformat ymd");
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle))
      {
          $this->Db->Execute("alter session set nls_date_format         = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_timestamp_format    = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_timestamp_tz_format = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_time_format         = 'hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_time_tz_format      = 'hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_numeric_characters  = '.,'");
          $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['decimal_db'] = "."; 
      } 
  }
// 

   function regionalDefault($sConfReg = '')
   {
      if ('' == $sConfReg)
      {
         $sConfReg = $this->str_conf_reg;
      }

      $_SESSION['scriptcase']['reg_conf']['date_format']           = (isset($this->Nm_conf_reg[$sConfReg]['data_format']))              ?  $this->Nm_conf_reg[$sConfReg]['data_format']                  : "ddmmyyyy";
      $_SESSION['scriptcase']['reg_conf']['date_sep']              = (isset($this->Nm_conf_reg[$sConfReg]['data_sep']))                 ?  $this->Nm_conf_reg[$sConfReg]['data_sep']                     : "/";
      $_SESSION['scriptcase']['reg_conf']['date_week_ini']         = (isset($this->Nm_conf_reg[$sConfReg]['prim_dia_sema']))            ?  $this->Nm_conf_reg[$sConfReg]['prim_dia_sema']                : "SU";
      $_SESSION['scriptcase']['reg_conf']['time_format']           = (isset($this->Nm_conf_reg[$sConfReg]['hora_format']))              ?  $this->Nm_conf_reg[$sConfReg]['hora_format']                  : "hhiiss";
      $_SESSION['scriptcase']['reg_conf']['time_sep']              = (isset($this->Nm_conf_reg[$sConfReg]['hora_sep']))                 ?  $this->Nm_conf_reg[$sConfReg]['hora_sep']                     : ":";
      $_SESSION['scriptcase']['reg_conf']['time_pos_ampm']         = (isset($this->Nm_conf_reg[$sConfReg]['hora_pos_ampm']))            ?  $this->Nm_conf_reg[$sConfReg]['hora_pos_ampm']                : "right_without_space";
      $_SESSION['scriptcase']['reg_conf']['time_simb_am']          = (isset($this->Nm_conf_reg[$sConfReg]['hora_simbolo_am']))          ?  $this->Nm_conf_reg[$sConfReg]['hora_simbolo_am']              : "am";
      $_SESSION['scriptcase']['reg_conf']['time_simb_pm']          = (isset($this->Nm_conf_reg[$sConfReg]['hora_simbolo_pm']))          ?  $this->Nm_conf_reg[$sConfReg]['hora_simbolo_pm']              : "pm";
      $_SESSION['scriptcase']['reg_conf']['simb_neg']              = (isset($this->Nm_conf_reg[$sConfReg]['num_sinal_neg']))            ?  $this->Nm_conf_reg[$sConfReg]['num_sinal_neg']                : "-";
      $_SESSION['scriptcase']['reg_conf']['grup_num']              = (isset($this->Nm_conf_reg[$sConfReg]['num_sep_agr']))              ?  $this->Nm_conf_reg[$sConfReg]['num_sep_agr']                  : ".";
      $_SESSION['scriptcase']['reg_conf']['dec_num']               = (isset($this->Nm_conf_reg[$sConfReg]['num_sep_dec']))              ?  $this->Nm_conf_reg[$sConfReg]['num_sep_dec']                  : ",";
      $_SESSION['scriptcase']['reg_conf']['neg_num']               = (isset($this->Nm_conf_reg[$sConfReg]['num_format_num_neg']))       ?  $this->Nm_conf_reg[$sConfReg]['num_format_num_neg']           : 2;
      $_SESSION['scriptcase']['reg_conf']['monet_simb']            = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_simbolo']))        ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_simbolo']            : "$";
      $_SESSION['scriptcase']['reg_conf']['monet_f_pos']           = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_format_num_pos'])) ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_format_num_pos']     : 3;
      $_SESSION['scriptcase']['reg_conf']['monet_f_neg']           = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_format_num_neg'])) ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_format_num_neg']     : 13;
      $_SESSION['scriptcase']['reg_conf']['grup_val']              = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_sep_agr']))        ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_sep_agr']            : ".";
      $_SESSION['scriptcase']['reg_conf']['dec_val']               = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_sep_dec']))        ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_sep_dec']            : ",";
      $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$sConfReg]['num_group_digit']))          ?  $this->Nm_conf_reg[$sConfReg]['num_group_digit']              : "1";
      $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_group_digit']))    ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_group_digit']        : "1";
      $_SESSION['scriptcase']['reg_conf']['html_dir']              = (isset($this->Nm_conf_reg[$sConfReg]['ger_ltr_rtl']))              ?  " DIR='" . $this->Nm_conf_reg[$sConfReg]['ger_ltr_rtl'] . "'" : "";
      $_SESSION['scriptcase']['reg_conf']['css_dir']               = (isset($this->Nm_conf_reg[$sConfReg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$sConfReg]['ger_ltr_rtl'] : "LTR";
      if ('' == $_SESSION['scriptcase']['reg_conf']['num_group_digit'])
      {
          $_SESSION['scriptcase']['reg_conf']['num_group_digit'] = '1';
      }
      if ('' == $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'])
      {
          $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = '1';
      }
   }
   function sc_Include($path, $tp, $name)
   {
       if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
       {
           include_once($path);
       }
   } // sc_Include
   function sc_Sql_Protect($var, $tp, $conex="")
   {
       if (empty($conex) || $conex == "conn_mysql")
       {
           $TP_banco = $_SESSION['scriptcase']['glo_tpbanco'];
       }
       else
       {
           eval ("\$TP_banco = \$this->nm_con_" . $conex . "['tpbanco'];");
       }
       if ($tp == "date")
       {
           $delim  = "'";
           $delim1 = "'";
           if (in_array(strtolower($TP_banco), $this->nm_bases_access))
           {
               $delim  = "#";
               $delim1 = "#";
           }
           if (isset($_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['form_agenda_mob']['SC_sep_date1'];
           }
           return $delim . $var . $delim1;
       }
       else
       {
           return $var;
       }
   } // sc_Sql_Protect
}
//===============================================================================
class form_agenda_mob_edit
{
    var $contr_form_agenda_mob;
    function inicializa()
    {
        global $nm_opc_lookup, $nm_opc_php, $script_case_init;
        require_once("form_agenda_mob_apl.php");
        $this->contr_form_agenda_mob = new form_agenda_mob_apl();
    }
}
if (!function_exists("NM_is_utf8"))
{
    include_once("../_lib/lib/php/nm_utf8.php");
}
ob_start();
//
//----------------  
//
    $_SESSION['scriptcase']['form_agenda_mob']['contr_erro'] = 'off';
    if (!function_exists("NM_is_utf8"))
    {
        include_once("../_lib/lib/php/nm_utf8.php");
    }
    if (!function_exists("SC_dir_app_ini"))
    {
        include_once("../_lib/lib/php/nm_ctrl_app_name.php");
    }
    SC_dir_app_ini('CIMEDFAC');
    $sc_conv_var = array();
    if (!empty($_FILES))
    {
        foreach ($_FILES as $nmgp_campo => $nmgp_valores)
        {
             if (isset($sc_conv_var[$nmgp_campo]))
             {
                 $nmgp_campo = $sc_conv_var[$nmgp_campo];
             }
             elseif (isset($sc_conv_var[strtolower($nmgp_campo)]))
             {
                 $nmgp_campo = $sc_conv_var[strtolower($nmgp_campo)];
             }
             $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
             $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
             $$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
             $$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
             $$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
        }
    }
    $Sc_lig_md5 = false;
    $Sem_Session = (!isset($_SESSION['sc_session'])) ? true : false;
    $_SESSION['scriptcase']['sem_session'] = false;
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
             if (isset($sc_conv_var[$nmgp_var]))
             {
                 $nmgp_var = $sc_conv_var[$nmgp_var];
             }
             elseif (isset($sc_conv_var[strtolower($nmgp_var)]))
             {
                 $nmgp_var = $sc_conv_var[strtolower($nmgp_var)];
             }
             nm_limpa_str_form_agenda_mob($nmgp_val);
             $nmgp_val = NM_decode_input($nmgp_val);
             $$nmgp_var = $nmgp_val;
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
             if (isset($sc_conv_var[$nmgp_var]))
             {
                 $nmgp_var = $sc_conv_var[$nmgp_var];
             }
             elseif (isset($sc_conv_var[strtolower($nmgp_var)]))
             {
                 $nmgp_var = $sc_conv_var[strtolower($nmgp_var)];
             }
             nm_limpa_str_form_agenda_mob($nmgp_val);
             $nmgp_val = NM_decode_input($nmgp_val);
             $$nmgp_var = $nmgp_val;
        }
    }
    if (!isset($_SERVER['HTTP_REFERER']) || (!isset($nmgp_parms) && !isset($script_case_init) && !isset($_POST['rs']) && !isset($nmgp_start) ))
    {
        $Sem_Session = false;
    }
    $NM_dir_atual = getcwd();
    if (empty($NM_dir_atual)) {
        $str_path_sys  = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
        $str_path_sys  = str_replace("\\", '/', $str_path_sys);
    }
    else {
        $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
        $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
    }
    $str_path_web    = $_SERVER['PHP_SELF'];
    $str_path_web    = str_replace("\\", '/', $str_path_web);
    $str_path_web    = str_replace('//', '/', $str_path_web);
    $path_aplicacao  = substr($str_path_web, 0, strrpos($str_path_web, '/'));
    $path_aplicacao  = substr($path_aplicacao, 0, strrpos($path_aplicacao, '/'));
    $root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
    if ($Sem_Session && (!isset($nmgp_start) || $nmgp_start != "SC")) {
        if (isset($_COOKIE['sc_apl_default_CIMEDFAC'])) {
            $apl_def = explode(",", $_COOKIE['sc_apl_default_CIMEDFAC']);
        }
        elseif (is_file($root . $_SESSION['scriptcase']['form_agenda']['glo_nm_path_imag_temp'] . "/sc_apl_default_CIMEDFAC.txt")) {
            $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['form_agenda']['glo_nm_path_imag_temp'] . "/sc_apl_default_CIMEDFAC.txt"));
        }
        if (isset($apl_def)) {
            if ($apl_def[0] != "form_agenda") {
                $_SESSION['scriptcase']['sem_session'] = true;
                if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                    $_SESSION['scriptcase']['form_agenda']['session_timeout']['redir'] = $apl_def[0];
                }
                else {
                    $_SESSION['scriptcase']['form_agenda']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
                }
                $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
                $_SESSION['scriptcase']['form_agenda']['session_timeout']['redir_tp'] = $Redir_tp;
            }
            if (isset($_COOKIE['sc_actual_lang_CIMEDFAC'])) {
                $_SESSION['scriptcase']['form_agenda']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_CIMEDFAC'];
            }
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
    if (isset($SC_where_pdf) && !empty($SC_where_pdf))
    {
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['where_filter'] = $SC_where_pdf;
    }

    if (isset($_POST['rs']) && !is_array($_POST['rs']) && 'ajax_' == substr($_POST['rs'], 0, 5) && isset($_POST['rsargs']) && !empty($_POST['rsargs']) && !isset($_SESSION['scriptcase']['form_agenda_mob']['session_timeout']['redir']))
    {
        if ('ajax_form_agenda_mob_validate_agenombre' == $_POST['rs'])
        {
            $agenombre = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_medcodigo' == $_POST['rs'])
        {
            $medcodigo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_ageintervalo' == $_POST['rs'])
        {
            $ageintervalo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_ageactivo' == $_POST['rs'])
        {
            $ageactivo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_agecolor' == $_POST['rs'])
        {
            $agecolor = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_ageusucrea' == $_POST['rs'])
        {
            $ageusucrea = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_agefeccrea' == $_POST['rs'])
        {
            $agefeccrea = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_ageusumodi' == $_POST['rs'])
        {
            $ageusumodi = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_agefecmodi' == $_POST['rs'])
        {
            $agefecmodi = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_agelunactivo' == $_POST['rs'])
        {
            $agelunactivo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_agemaractivo' == $_POST['rs'])
        {
            $agemaractivo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_agemieactivo' == $_POST['rs'])
        {
            $agemieactivo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_agejueactivo' == $_POST['rs'])
        {
            $agejueactivo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_agevieactivo' == $_POST['rs'])
        {
            $agevieactivo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_agesabactivo' == $_POST['rs'])
        {
            $agesabactivo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_agedomactivo' == $_POST['rs'])
        {
            $agedomactivo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_agelunini' == $_POST['rs'])
        {
            $agelunini = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_agelunfin' == $_POST['rs'])
        {
            $agelunfin = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_agemarini' == $_POST['rs'])
        {
            $agemarini = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_agemarfin' == $_POST['rs'])
        {
            $agemarfin = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_agemieini' == $_POST['rs'])
        {
            $agemieini = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_agemiefin' == $_POST['rs'])
        {
            $agemiefin = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_agejueini' == $_POST['rs'])
        {
            $agejueini = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_agejuefin' == $_POST['rs'])
        {
            $agejuefin = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_agevieini' == $_POST['rs'])
        {
            $agevieini = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_ageviefin' == $_POST['rs'])
        {
            $ageviefin = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_agesabini' == $_POST['rs'])
        {
            $agesabini = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_agesabfin' == $_POST['rs'])
        {
            $agesabfin = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_agedomini' == $_POST['rs'])
        {
            $agedomini = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_validate_agedomfin' == $_POST['rs'])
        {
            $agedomfin = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_event_agedomactivo_onclick' == $_POST['rs'])
        {
            $agedomactivo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $agedomini = NM_utf8_urldecode($_POST['rsargs'][1]);
            $agedomfin = NM_utf8_urldecode($_POST['rsargs'][2]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][3]);
        }
        if ('ajax_form_agenda_mob_event_agejueactivo_onclick' == $_POST['rs'])
        {
            $agejueactivo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $agejueini = NM_utf8_urldecode($_POST['rsargs'][1]);
            $agejuefin = NM_utf8_urldecode($_POST['rsargs'][2]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][3]);
        }
        if ('ajax_form_agenda_mob_event_agelunactivo_onclick' == $_POST['rs'])
        {
            $agelunactivo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $agelunini = NM_utf8_urldecode($_POST['rsargs'][1]);
            $agelunfin = NM_utf8_urldecode($_POST['rsargs'][2]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][3]);
        }
        if ('ajax_form_agenda_mob_event_agemaractivo_onclick' == $_POST['rs'])
        {
            $agemaractivo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $agemarini = NM_utf8_urldecode($_POST['rsargs'][1]);
            $agemarfin = NM_utf8_urldecode($_POST['rsargs'][2]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][3]);
        }
        if ('ajax_form_agenda_mob_event_agemieactivo_onclick' == $_POST['rs'])
        {
            $agemieactivo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $agemieini = NM_utf8_urldecode($_POST['rsargs'][1]);
            $agemiefin = NM_utf8_urldecode($_POST['rsargs'][2]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][3]);
        }
        if ('ajax_form_agenda_mob_event_agesabactivo_onclick' == $_POST['rs'])
        {
            $agesabactivo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $agesabini = NM_utf8_urldecode($_POST['rsargs'][1]);
            $agesabfin = NM_utf8_urldecode($_POST['rsargs'][2]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][3]);
        }
        if ('ajax_form_agenda_mob_event_agevieactivo_onclick' == $_POST['rs'])
        {
            $agevieactivo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $agevieini = NM_utf8_urldecode($_POST['rsargs'][1]);
            $ageviefin = NM_utf8_urldecode($_POST['rsargs'][2]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][3]);
        }
        if ('ajax_form_agenda_mob_autocomp_medcodigo' == $_POST['rs'])
        {
            $medcodigo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_agenda_mob_submit_form' == $_POST['rs'])
        {
            $agenombre = NM_utf8_urldecode($_POST['rsargs'][0]);
            $medcodigo = NM_utf8_urldecode($_POST['rsargs'][1]);
            $ageintervalo = NM_utf8_urldecode($_POST['rsargs'][2]);
            $ageactivo = NM_utf8_urldecode($_POST['rsargs'][3]);
            $agecolor = NM_utf8_urldecode($_POST['rsargs'][4]);
            $ageusucrea = NM_utf8_urldecode($_POST['rsargs'][5]);
            $agefeccrea = NM_utf8_urldecode($_POST['rsargs'][6]);
            $ageusumodi = NM_utf8_urldecode($_POST['rsargs'][7]);
            $agefecmodi = NM_utf8_urldecode($_POST['rsargs'][8]);
            $agelunactivo = NM_utf8_urldecode($_POST['rsargs'][9]);
            $agemaractivo = NM_utf8_urldecode($_POST['rsargs'][10]);
            $agemieactivo = NM_utf8_urldecode($_POST['rsargs'][11]);
            $agejueactivo = NM_utf8_urldecode($_POST['rsargs'][12]);
            $agevieactivo = NM_utf8_urldecode($_POST['rsargs'][13]);
            $agesabactivo = NM_utf8_urldecode($_POST['rsargs'][14]);
            $agedomactivo = NM_utf8_urldecode($_POST['rsargs'][15]);
            $agelunini = NM_utf8_urldecode($_POST['rsargs'][16]);
            $agelunfin = NM_utf8_urldecode($_POST['rsargs'][17]);
            $agemarini = NM_utf8_urldecode($_POST['rsargs'][18]);
            $agemarfin = NM_utf8_urldecode($_POST['rsargs'][19]);
            $agemieini = NM_utf8_urldecode($_POST['rsargs'][20]);
            $agemiefin = NM_utf8_urldecode($_POST['rsargs'][21]);
            $agejueini = NM_utf8_urldecode($_POST['rsargs'][22]);
            $agejuefin = NM_utf8_urldecode($_POST['rsargs'][23]);
            $agevieini = NM_utf8_urldecode($_POST['rsargs'][24]);
            $ageviefin = NM_utf8_urldecode($_POST['rsargs'][25]);
            $agesabini = NM_utf8_urldecode($_POST['rsargs'][26]);
            $agesabfin = NM_utf8_urldecode($_POST['rsargs'][27]);
            $agedomini = NM_utf8_urldecode($_POST['rsargs'][28]);
            $agedomfin = NM_utf8_urldecode($_POST['rsargs'][29]);
            $agesecuen = NM_utf8_urldecode($_POST['rsargs'][30]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][31]);
            $nmgp_url_saida = NM_utf8_urldecode($_POST['rsargs'][32]);
            $nmgp_opcao = NM_utf8_urldecode($_POST['rsargs'][33]);
            $nmgp_ancora = NM_utf8_urldecode($_POST['rsargs'][34]);
            $nmgp_num_form = NM_utf8_urldecode($_POST['rsargs'][35]);
            $nmgp_parms = NM_utf8_urldecode($_POST['rsargs'][36]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][37]);
            $csrf_token = NM_utf8_urldecode($_POST['rsargs'][38]);
        }
        if ('ajax_form_agenda_mob_navigate_form' == $_POST['rs'])
        {
            $agesecuen = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][1]);
            $nmgp_opcao = NM_utf8_urldecode($_POST['rsargs'][2]);
            $nmgp_ordem = NM_utf8_urldecode($_POST['rsargs'][3]);
            $nmgp_fast_search = NM_utf8_urldecode($_POST['rsargs'][4]);
            $nmgp_cond_fast_search = NM_utf8_urldecode($_POST['rsargs'][5]);
            $nmgp_arg_fast_search = NM_utf8_urldecode($_POST['rsargs'][6]);
            $nmgp_arg_dyn_search = NM_utf8_urldecode($_POST['rsargs'][7]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][8]);
        }
    }

    if (!empty($glo_perfil))  
    { 
        $_SESSION['scriptcase']['glo_perfil'] = $glo_perfil;
    }   
    if (isset($glo_servidor)) 
    {
        $_SESSION['scriptcase']['glo_servidor'] = $glo_servidor;
    }
    if (isset($glo_banco)) 
    {
        $_SESSION['scriptcase']['glo_banco'] = $glo_banco;
    }
    if (isset($glo_tpbanco)) 
    {
        $_SESSION['scriptcase']['glo_tpbanco'] = $glo_tpbanco;
    }
    if (isset($glo_usuario)) 
    {
        $_SESSION['scriptcase']['glo_usuario'] = $glo_usuario;
    }
    if (isset($glo_senha)) 
    {
        $_SESSION['scriptcase']['glo_senha'] = $glo_senha;
    }
    if (isset($glo_senha_protect)) 
    {
        $_SESSION['scriptcase']['glo_senha_protect'] = $glo_senha_protect;
    }
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['lig_edit_lookup']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['lig_edit_lookup']     = false;
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['lig_edit_lookup_cb']  = '';
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['lig_edit_lookup_row'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_call']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_call'] = false;
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_proc']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_proc'] = false;
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_liga_form_insert']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_liga_form_insert'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_liga_form_update']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_liga_form_update'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_liga_form_delete']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_liga_form_delete'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_liga_form_btn_nav']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_liga_form_btn_nav'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_liga_grid_edit']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_liga_grid_edit'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_liga_grid_edit_link']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_liga_grid_edit_link'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_liga_qtd_reg']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_liga_qtd_reg'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_liga_tp_pag']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_liga_tp_pag'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['run_modal']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['run_modal'] = isset($_GET['nmgp_url_saida']) && 'modal' == $_GET['nmgp_url_saida'];
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_proc'])
    {
        return;
    }
    if (isset($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_parms']))
    { 
        $tmp_nmgp_parms = '';
        if (isset($nmgp_parms) && '' != $nmgp_parms)
        {
            $tmp_nmgp_parms = $nmgp_parms . '?@?';
        }
        $nmgp_parms = $tmp_nmgp_parms . $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_parms'];
        unset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_parms']);
    } 
    if (isset($nmgp_parms) && !empty($nmgp_parms) && !is_array($nmgp_parms)) 
    { 
        if (isset($_SESSION['nm_aba_bg_color'])) 
        { 
            unset($_SESSION['nm_aba_bg_color']);
        }   
        $nmgp_parms = NM_decode_input($nmgp_parms);
        $nmgp_parms = str_replace("@aspass@", "'", $nmgp_parms);
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
               nm_limpa_str_form_agenda_mob($cadapar[1]);
               if (isset($sc_conv_var[$cadapar[0]]))
               {
                   $cadapar[0] = $sc_conv_var[$cadapar[0]];
               }
               elseif (isset($sc_conv_var[strtolower($cadapar[0])]))
               {
                   $cadapar[0] = $sc_conv_var[strtolower($cadapar[0])];
               }
               if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
               $Tmp_par   = $cadapar[0];
               $$Tmp_par = $cadapar[1];
           }
           $ix++;
        }
        if (isset($usr_login)) 
        {
            $_SESSION['usr_login'] = $usr_login;
        }
    } 
    elseif (isset($script_case_init) && !empty($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['parms']))
    {
        if (!isset($nmgp_opcao) || ($nmgp_opcao != "incluir" && $nmgp_opcao != "novo" && $nmgp_opcao != "recarga" && $nmgp_opcao != "muda_form"))
        {
            $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['parms']);
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
               $Tmp_par   = $cadapar[0];
               $$Tmp_par = $cadapar[1];
               $ix++;
            }
        }
    } 
    if (isset($script_case_init) && $script_case_init != preg_replace('/[^0-9.]/', '', $script_case_init))
    {
        unset($script_case_init);
    }
    if (!isset($script_case_init) || empty($script_case_init) || is_array($script_case_init))
    {
        $script_case_init = rand(2, 10000);
    }
    $salva_run = "N";
    $salva_iframe = false;
    if (isset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['iframe_menu']))
    {
        $salva_iframe = $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['iframe_menu'];
        unset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['iframe_menu']);
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['run_iframe']))
    {
        $salva_run = $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['run_iframe'];
        unset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['run_iframe']);
    }
    if (isset($nm_run_menu) && $nm_run_menu == 1)
    {
        if (isset($_SESSION['scriptcase']['sc_aba_iframe']) && isset($_SESSION['scriptcase']['sc_apl_menu_atual']))
        {
            foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
            {
                if ($aba == $_SESSION['scriptcase']['sc_apl_menu_atual'])
                {
                    unset($_SESSION['scriptcase']['sc_aba_iframe'][$aba]);
                    break;
                }
            }
        }
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "form_agenda_mob";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'form_agenda_mob' || $achou)
                {
                    unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                    if (!empty($_SESSION['sc_session'][$script_case_init][$nome_apl]))
                    {
                        $achou = true;
                    }
                }
            }
            if (!$achou && isset($nm_apl_menu))
            {
                foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
                {
                    if ($nome_apl == $nm_apl_menu || $achou)
                    {
                        $achou = true;
                        if ($nome_apl != $nm_apl_menu)
                        {
                            unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                        }
                    }
                }
            }
        }
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['iframe_menu']  = true;
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['mostra_cab']   = "S";
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['run_iframe']   = "N";
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['retorno_edit'] = "";
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['run_iframe']  = $salva_run;
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['iframe_menu'] = $salva_iframe;
    }

    if (!isset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['db_changed']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['db_changed'] = false;
    }
    if (isset($_GET['nmgp_outra_jan']) && 'true' == $_GET['nmgp_outra_jan'] && isset($_GET['nmgp_url_saida']) && 'modal' == $_GET['nmgp_url_saida'])
    {
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['db_changed'] = false;
    }

    if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'form_agenda_mob')
    {
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['sc_outra_jan'] = true;
         unset($_SESSION['scriptcase']['sc_outra_jan']);
    }
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        if (isset($nmgp_url_saida) && $nmgp_url_saida == "modal")
        {
            $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['sc_modal'] = true;
            $nm_url_saida = "form_agenda_mob_fim.php"; 
        }
        $nm_apl_dependente = 0;
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['sc_outra_jan'] = true;
    }
    $STR_lang    = (isset($_SESSION['scriptcase']['str_lang']) && !empty($_SESSION['scriptcase']['str_lang'])) ? $_SESSION['scriptcase']['str_lang'] : "es";
    if (isset($_SESSION['scriptcase']['form_agenda_mob']['session_timeout']['lang'])) {
        $STR_lang = $_SESSION['scriptcase']['form_agenda_mob']['session_timeout']['lang'];
    }
      $STR_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc8_PictonBlue/Sc8_PictonBlue";
    $NM_arq_lang = "../_lib/lang/" . $STR_lang . ".lang.php";
    $Nm_lang = array();
    if (is_file($NM_arq_lang))
    {
        $Lixo = file($NM_arq_lang);
        foreach ($Lixo as $Cada_lin) 
        {
            if (strpos($Cada_lin, "array()") === false && (trim($Cada_lin) != "<?php")  && (trim($Cada_lin) != "?" . ">"))
            {
                eval (str_replace("\$this->", "\$", $Cada_lin));
            }
        }
    }
    $_SESSION['scriptcase']['charset'] = (isset($Nm_lang['Nm_charset']) && !empty($Nm_lang['Nm_charset'])) ? $Nm_lang['Nm_charset'] : "ISO-8859-15";
    ini_set('default_charset', $_SESSION['scriptcase']['charset']);
    foreach ($Nm_lang as $ind => $dados)
    {
       if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
       {
           $Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
    }

    if (!isset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['initialize']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['initialize'] = true;
    }
    elseif (!isset($_SERVER['HTTP_REFERER']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['initialize'] = false;
    }
    elseif (false === strpos($_SERVER['HTTP_REFERER'], '/form_agenda/'))
    {
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['initialize'] = true;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['initialize'] = false;
    }

    if (isset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['first_time']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['first_time'] = false;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['first_time'] = true;
    }

    $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['menu_desenv'] = false;   
    if (!defined("SC_ERROR_HANDLER"))
    {
        define("SC_ERROR_HANDLER", 1);
    }
    include_once(dirname(__FILE__) . "/form_agenda_mob_erro.php");
    $nm_browser = strpos($_SERVER['HTTP_USER_AGENT'], "Konqueror") ;
    if (is_int($nm_browser))   
    {
        $nm_browser = "Konqueror"; 
    } 
    else  
    {
        $nm_browser = strpos($_SERVER['HTTP_USER_AGENT'], "Opera") ;
        if (is_int($nm_browser))   
        {
            $nm_browser = "Opera"; 
        }
    } 
    $_SESSION['scriptcase']['change_regional_old'] = '';
    $_SESSION['scriptcase']['change_regional_new'] = '';
    if (!empty($nmgp_opcao) && ($nmgp_opcao == "change_lang_t" || $nmgp_opcao == "change_lang_b" || $nmgp_opcao == "change_lang_f" || $nmgp_opcao == "force_lang"))  
    {
        $Temp_lang = $nmgp_opcao == "force_lang" ? explode(";" , $nmgp_idioma) : explode(";" , $nmgp_idioma_novo);  
        if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))  
        { 
            $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
        } 
        if (isset($Temp_lang[1]) && !empty($Temp_lang[1])) 
        { 
            $_SESSION['scriptcase']['change_regional_old'] = (isset($_SESSION['scriptcase']['str_conf_reg']) && !empty($_SESSION['scriptcase']['str_conf_reg'])) ? $_SESSION['scriptcase']['str_conf_reg'] : "es_ec";
            $_SESSION['scriptcase']['str_conf_reg']        = $Temp_lang[1];
            $_SESSION['scriptcase']['change_regional_new'] = $_SESSION['scriptcase']['str_conf_reg'];
        } 
        $nmgp_opcao = $nmgp_opcao == "force_lang" ? "inicio" : "igual";
    } 
    if (!empty($nmgp_opcao) && ($nmgp_opcao == "change_schema_t" || $nmgp_opcao == "change_schema_b" || $nmgp_opcao == "change_schema_f"))  
    {
        if ($nmgp_opcao == "change_schema_t")  
        {
            $nmgp_schema = $nmgp_schema_t . "/" . $nmgp_schema_t;  
        } 
        elseif ($nmgp_opcao == "change_schema_b")  
        {
            $nmgp_schema = $nmgp_schema_b . "/" . $nmgp_schema_b;  
        } 
        else 
        {
            $nmgp_schema = $nmgp_schema_f . "/" . $nmgp_schema_f;  
        } 
        $_SESSION['scriptcase']['str_schema_all'] = $nmgp_schema;
        $nmgp_opcao = "recarga";  
    } 
    if (!empty($nmgp_opcao) && $nmgp_opcao == "lookup")  
    {
        $nm_opc_lookup = $nmgp_opcao;
    }
    elseif (!empty($nmgp_opcao) && $nmgp_opcao == "formphp")  
    {
        $nm_opc_form_php = $nmgp_opcao;
    }
    else
    {
        if (!empty($nmgp_opcao))  
        {
            $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['opcao'] = $nmgp_opcao ; 
        }
        if (isset($_POST["usr_login"])) 
        {
            $_SESSION['usr_login'] = $_POST["usr_login"];
            nm_limpa_str_form_agenda_mob($_SESSION['usr_login']);
        }
        if (isset($_GET["usr_login"])) 
        {
            $_SESSION['usr_login'] = $_GET["usr_login"];
            nm_limpa_str_form_agenda_mob($_SESSION['usr_login']);
        }
        if (!empty($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['volta_redirect_apl']))
        {
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['volta_redirect_apl']; 
            $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['volta_redirect_tp']; 
            $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['volta_redirect_apl'] = "";
            $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['volta_redirect_tp'] = "";
            $nm_url_saida = "form_agenda_mob_fim.php"; 
        }
        elseif (isset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['sc_outra_jan'] == 'true')
        {
               $nm_url_saida = "form_agenda_mob_fim.php"; 
        }
        elseif ($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['run_iframe'] != "R")
        {
           $nm_url_saida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""; 
           $nm_url_saida = str_replace("_fim.php", ".php", $nm_url_saida); 
            $nm_saida_global = $nm_url_saida;
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['retorno_edit'] = $nmgp_url_saida ; 
            } 
            if (!empty($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['retorno_edit'])) 
            {
                $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['retorno_edit'] . "?script_case_init=" . $script_case_init;  
                $nm_apl_dependente = 1 ; 
                $nm_saida_global = $nm_url_saida;
            } 
            if ($nm_apl_dependente != 1) 
            { 
                $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['run_iframe'] = "N"; 
            } 
            if ($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['run_iframe'] != "R" && (!isset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_call']) || !$_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['embutida_call']))
            { 
                $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida; 
                $nm_url_saida = "form_agenda_mob_fim.php"; 
                $_SESSION['scriptcase']['sc_tp_saida'] = "P"; 
                if ($nm_apl_dependente == 1) 
                { 
                    $_SESSION['scriptcase']['sc_tp_saida'] = "D"; 
                } 
                if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1) 
                { 
                    $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['scriptcase']['nm_sc_retorno']; 
                } 
            } 
        }
        if (empty($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['volta_tp']) && $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['run_iframe'] != "R")
        {
            $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['volta_php'] = $nm_url_saida;
            $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['volta_apl'] = $nm_saida_global;
            $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['volta_ss']  = (isset($_SESSION['scriptcase']['sc_url_saida'][$script_case_init])) ? $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] : "";
            $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['volta_dep'] = $nm_apl_dependente;
            $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['volta_tp']  = (isset($_SESSION['scriptcase']['sc_tp_saida'])) ? $_SESSION['scriptcase']['sc_tp_saida'] : "";
        }
        $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['volta_php'];
        $nm_saida_global = $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['volta_php'];
        $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['volta_dep'];
        if ($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['run_iframe'] != "R" && !empty($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['volta_ss'])) 
        { 
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['volta_ss'];
            $_SESSION['scriptcase']['sc_tp_saida']  = $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['volta_tp'];
        } 
        if ($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['run_iframe'] == "R") 
        { 
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['retorno_edit'] = $nmgp_url_saida . "?script_case_init=" . $script_case_init; 
            } 
        } 
        if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['run_iframe'] != "R") 
        { 
            $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['menu_desenv'] = true;   
        } 
    }
    if (isset($nmgp_redir)) 
    { 
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['redir'] = $nmgp_redir;   
    } 
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['sc_outra_jan'] = true;
         if ($nmgp_url_saida == "modal")
         {
             $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['sc_modal'] = true;
             $nm_url_saida = "form_agenda_mob_fim.php"; 
         }
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['sc_outra_jan'])
    {
        $nm_apl_dependente = 0;
    }
    $GLOBALS["NM_ERRO_IBASE"] = 0;  
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_agenda'] = "on";
    } 
    if (!isset($_SESSION['scriptcase']['form_agenda_mob']['session_timeout']['redir']) && (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_agenda']) || $_SESSION['scriptcase']['sc_apl_seg']['form_agenda'] != "on"))
    { 
        $NM_Mens_Erro = $Nm_lang['lang_errm_unth_user'];
        $nm_botao_ok = ($_SESSION['sc_session'][$script_case_init]['form_agenda_mob']['iframe_menu']) ? false : true;
        if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
        {
            foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
            {
                if (in_array("form_agenda_mob", $apls_aba))
                {
                    $nm_botao_ok = false;
                     break;
                }
            }
        }
      $str_schema_app = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc8_PictonBlue/Sc8_PictonBlue";
       $str_button_app = trim($str_button);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

        <HTML>
         <HEAD>
          <TITLE></TITLE>
          <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

        if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
        {
?>
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
        }

?>
          <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>          <META http-equiv="Pragma" content="no-cache"/>
          <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
          <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $str_schema_app ?>_form.css" />
          <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $str_schema_app ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
          <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $str_button_app . '/' . $str_button_app ?>.css" />
         </HEAD>
         <body class="scFormPage">
          <div class="scFormBorder">
          <table align="center" style="width: 100%" class="scFormTable"><tr><td class="scFormDataOdd" style="padding: 15px 30px; text-align: center">
           <?php echo $NM_Mens_Erro; ?>
<?php
        if ($nm_botao_ok)
        {
?>
          <br />
          <form name="Fseg" method="post" 
                              action="<?php echo $nm_url_saida; ?>" 
                              target="_self"> 
           <input type="hidden" name="script_case_init" value="<?php echo $script_case_init; ?>"/> 
           <input type="submit" name="sc_sai_seg" value="OK" class="" > 
          </form> 
          <script type="text/javascript">
            function nm_move()
            { }
            function nm_atualiza()
            { }
          </script> 
<?php
        }
?>
          </td></tr></table>
          </div>
<?php
       if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']))
       {
?>
<br /><br /><br />
<div class="scFormBorder">
 <table align="center" style="width: 450px" class="scFormTable">
  <tr>
   <td class="scFormDataOdd" style="padding: 15px 30px">
    <?php echo $Nm_lang['lang_errm_unth_hwto']; ?>
   </td>
  </tr>
 </table>
</div>
<?php
       }
?>
         </body>
        </HTML>
<?php
        exit;
    } 
    $inicial_form_agenda_mob = new form_agenda_mob_edit();
    $inicial_form_agenda_mob->inicializa();

    $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['select_html'] = array();
    $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['select_html']['ageactivo'] = " onClick=\"\" ";
    $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['select_html']['agelunactivo'] = " onClick=\"do_ajax_form_agenda_mob_event_agelunactivo_onclick();\" ";
    $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['select_html']['agemaractivo'] = " onClick=\"do_ajax_form_agenda_mob_event_agemaractivo_onclick();\" ";
    $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['select_html']['agemieactivo'] = " onClick=\"do_ajax_form_agenda_mob_event_agemieactivo_onclick();\" ";
    $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['select_html']['agejueactivo'] = " onClick=\"do_ajax_form_agenda_mob_event_agejueactivo_onclick();\" ";
    $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['select_html']['agevieactivo'] = " onClick=\"do_ajax_form_agenda_mob_event_agevieactivo_onclick();\" ";
    $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['select_html']['agesabactivo'] = " onClick=\"do_ajax_form_agenda_mob_event_agesabactivo_onclick();\" ";
    $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['select_html']['agedomactivo'] = " onClick=\"do_ajax_form_agenda_mob_event_agedomactivo_onclick();\" ";

    if (!defined('SC_SAJAX_LOADED'))
    {
        include_once(dirname(__FILE__) . '/form_agenda_mob_sajax.php');
        define('SC_SAJAX_LOADED', 'YES');
    }
    if (!class_exists('Services_JSON'))
    {
        include_once(dirname(__FILE__) . '/form_agenda_mob_json.php');
    }
    $sajax_request_type = "POST";
    sajax_init();
    //$sajax_debug_mode = 1;
    sajax_export("ajax_form_agenda_mob_validate_agenombre");
    sajax_export("ajax_form_agenda_mob_validate_medcodigo");
    sajax_export("ajax_form_agenda_mob_validate_ageintervalo");
    sajax_export("ajax_form_agenda_mob_validate_ageactivo");
    sajax_export("ajax_form_agenda_mob_validate_agecolor");
    sajax_export("ajax_form_agenda_mob_validate_ageusucrea");
    sajax_export("ajax_form_agenda_mob_validate_agefeccrea");
    sajax_export("ajax_form_agenda_mob_validate_ageusumodi");
    sajax_export("ajax_form_agenda_mob_validate_agefecmodi");
    sajax_export("ajax_form_agenda_mob_validate_agelunactivo");
    sajax_export("ajax_form_agenda_mob_validate_agemaractivo");
    sajax_export("ajax_form_agenda_mob_validate_agemieactivo");
    sajax_export("ajax_form_agenda_mob_validate_agejueactivo");
    sajax_export("ajax_form_agenda_mob_validate_agevieactivo");
    sajax_export("ajax_form_agenda_mob_validate_agesabactivo");
    sajax_export("ajax_form_agenda_mob_validate_agedomactivo");
    sajax_export("ajax_form_agenda_mob_validate_agelunini");
    sajax_export("ajax_form_agenda_mob_validate_agelunfin");
    sajax_export("ajax_form_agenda_mob_validate_agemarini");
    sajax_export("ajax_form_agenda_mob_validate_agemarfin");
    sajax_export("ajax_form_agenda_mob_validate_agemieini");
    sajax_export("ajax_form_agenda_mob_validate_agemiefin");
    sajax_export("ajax_form_agenda_mob_validate_agejueini");
    sajax_export("ajax_form_agenda_mob_validate_agejuefin");
    sajax_export("ajax_form_agenda_mob_validate_agevieini");
    sajax_export("ajax_form_agenda_mob_validate_ageviefin");
    sajax_export("ajax_form_agenda_mob_validate_agesabini");
    sajax_export("ajax_form_agenda_mob_validate_agesabfin");
    sajax_export("ajax_form_agenda_mob_validate_agedomini");
    sajax_export("ajax_form_agenda_mob_validate_agedomfin");
    sajax_export("ajax_form_agenda_mob_event_agedomactivo_onclick");
    sajax_export("ajax_form_agenda_mob_event_agejueactivo_onclick");
    sajax_export("ajax_form_agenda_mob_event_agelunactivo_onclick");
    sajax_export("ajax_form_agenda_mob_event_agemaractivo_onclick");
    sajax_export("ajax_form_agenda_mob_event_agemieactivo_onclick");
    sajax_export("ajax_form_agenda_mob_event_agesabactivo_onclick");
    sajax_export("ajax_form_agenda_mob_event_agevieactivo_onclick");
    sajax_export("ajax_form_agenda_mob_autocomp_medcodigo");
    sajax_export("ajax_form_agenda_mob_submit_form");
    sajax_export("ajax_form_agenda_mob_navigate_form");
    sajax_handle_client_request();

    $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
//
    function nm_limpa_str_form_agenda_mob(&$str)
    {
        if (get_magic_quotes_gpc())
        {
            if (is_array($str))
            {
                foreach ($str as $x => $cada_str)
                {
                    $str[$x] = str_replace("@aspasd@", '"', $str[$x]);
                    $str[$x] = stripslashes($str[$x]);
                }
            }
            else
            {
                $str = str_replace("@aspasd@", '"', $str);
                $str = stripslashes($str);
            }
        }
    }

    function ajax_form_agenda_mob_validate_agenombre($agenombre, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_agenombre';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agenombre' => NM_utf8_urldecode($agenombre),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_agenombre

    function ajax_form_agenda_mob_validate_medcodigo($medcodigo, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_medcodigo';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'medcodigo' => NM_utf8_urldecode($medcodigo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_medcodigo

    function ajax_form_agenda_mob_validate_ageintervalo($ageintervalo, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_ageintervalo';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'ageintervalo' => NM_utf8_urldecode($ageintervalo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_ageintervalo

    function ajax_form_agenda_mob_validate_ageactivo($ageactivo, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_ageactivo';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'ageactivo' => NM_utf8_urldecode($ageactivo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_ageactivo

    function ajax_form_agenda_mob_validate_agecolor($agecolor, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_agecolor';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agecolor' => NM_utf8_urldecode($agecolor),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_agecolor

    function ajax_form_agenda_mob_validate_ageusucrea($ageusucrea, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_ageusucrea';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'ageusucrea' => NM_utf8_urldecode($ageusucrea),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_ageusucrea

    function ajax_form_agenda_mob_validate_agefeccrea($agefeccrea, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_agefeccrea';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agefeccrea' => NM_utf8_urldecode($agefeccrea),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_agefeccrea

    function ajax_form_agenda_mob_validate_ageusumodi($ageusumodi, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_ageusumodi';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'ageusumodi' => NM_utf8_urldecode($ageusumodi),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_ageusumodi

    function ajax_form_agenda_mob_validate_agefecmodi($agefecmodi, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_agefecmodi';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agefecmodi' => NM_utf8_urldecode($agefecmodi),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_agefecmodi

    function ajax_form_agenda_mob_validate_agelunactivo($agelunactivo, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_agelunactivo';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agelunactivo' => NM_utf8_urldecode($agelunactivo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_agelunactivo

    function ajax_form_agenda_mob_validate_agemaractivo($agemaractivo, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_agemaractivo';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agemaractivo' => NM_utf8_urldecode($agemaractivo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_agemaractivo

    function ajax_form_agenda_mob_validate_agemieactivo($agemieactivo, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_agemieactivo';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agemieactivo' => NM_utf8_urldecode($agemieactivo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_agemieactivo

    function ajax_form_agenda_mob_validate_agejueactivo($agejueactivo, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_agejueactivo';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agejueactivo' => NM_utf8_urldecode($agejueactivo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_agejueactivo

    function ajax_form_agenda_mob_validate_agevieactivo($agevieactivo, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_agevieactivo';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agevieactivo' => NM_utf8_urldecode($agevieactivo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_agevieactivo

    function ajax_form_agenda_mob_validate_agesabactivo($agesabactivo, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_agesabactivo';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agesabactivo' => NM_utf8_urldecode($agesabactivo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_agesabactivo

    function ajax_form_agenda_mob_validate_agedomactivo($agedomactivo, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_agedomactivo';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agedomactivo' => NM_utf8_urldecode($agedomactivo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_agedomactivo

    function ajax_form_agenda_mob_validate_agelunini($agelunini, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_agelunini';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agelunini' => NM_utf8_urldecode($agelunini),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_agelunini

    function ajax_form_agenda_mob_validate_agelunfin($agelunfin, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_agelunfin';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agelunfin' => NM_utf8_urldecode($agelunfin),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_agelunfin

    function ajax_form_agenda_mob_validate_agemarini($agemarini, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_agemarini';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agemarini' => NM_utf8_urldecode($agemarini),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_agemarini

    function ajax_form_agenda_mob_validate_agemarfin($agemarfin, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_agemarfin';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agemarfin' => NM_utf8_urldecode($agemarfin),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_agemarfin

    function ajax_form_agenda_mob_validate_agemieini($agemieini, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_agemieini';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agemieini' => NM_utf8_urldecode($agemieini),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_agemieini

    function ajax_form_agenda_mob_validate_agemiefin($agemiefin, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_agemiefin';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agemiefin' => NM_utf8_urldecode($agemiefin),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_agemiefin

    function ajax_form_agenda_mob_validate_agejueini($agejueini, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_agejueini';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agejueini' => NM_utf8_urldecode($agejueini),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_agejueini

    function ajax_form_agenda_mob_validate_agejuefin($agejuefin, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_agejuefin';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agejuefin' => NM_utf8_urldecode($agejuefin),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_agejuefin

    function ajax_form_agenda_mob_validate_agevieini($agevieini, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_agevieini';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agevieini' => NM_utf8_urldecode($agevieini),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_agevieini

    function ajax_form_agenda_mob_validate_ageviefin($ageviefin, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_ageviefin';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'ageviefin' => NM_utf8_urldecode($ageviefin),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_ageviefin

    function ajax_form_agenda_mob_validate_agesabini($agesabini, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_agesabini';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agesabini' => NM_utf8_urldecode($agesabini),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_agesabini

    function ajax_form_agenda_mob_validate_agesabfin($agesabfin, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_agesabfin';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agesabfin' => NM_utf8_urldecode($agesabfin),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_agesabfin

    function ajax_form_agenda_mob_validate_agedomini($agedomini, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_agedomini';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agedomini' => NM_utf8_urldecode($agedomini),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_agedomini

    function ajax_form_agenda_mob_validate_agedomfin($agedomfin, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'validate_agedomfin';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agedomfin' => NM_utf8_urldecode($agedomfin),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_validate_agedomfin

    function ajax_form_agenda_mob_event_agedomactivo_onclick($agedomactivo, $agedomini, $agedomfin, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'event_agedomactivo_onclick';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agedomactivo' => NM_utf8_urldecode($agedomactivo),
                  'agedomini' => NM_utf8_urldecode($agedomini),
                  'agedomfin' => NM_utf8_urldecode($agedomfin),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_event_agedomactivo_onclick

    function ajax_form_agenda_mob_event_agejueactivo_onclick($agejueactivo, $agejueini, $agejuefin, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'event_agejueactivo_onclick';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agejueactivo' => NM_utf8_urldecode($agejueactivo),
                  'agejueini' => NM_utf8_urldecode($agejueini),
                  'agejuefin' => NM_utf8_urldecode($agejuefin),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_event_agejueactivo_onclick

    function ajax_form_agenda_mob_event_agelunactivo_onclick($agelunactivo, $agelunini, $agelunfin, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'event_agelunactivo_onclick';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agelunactivo' => NM_utf8_urldecode($agelunactivo),
                  'agelunini' => NM_utf8_urldecode($agelunini),
                  'agelunfin' => NM_utf8_urldecode($agelunfin),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_event_agelunactivo_onclick

    function ajax_form_agenda_mob_event_agemaractivo_onclick($agemaractivo, $agemarini, $agemarfin, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'event_agemaractivo_onclick';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agemaractivo' => NM_utf8_urldecode($agemaractivo),
                  'agemarini' => NM_utf8_urldecode($agemarini),
                  'agemarfin' => NM_utf8_urldecode($agemarfin),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_event_agemaractivo_onclick

    function ajax_form_agenda_mob_event_agemieactivo_onclick($agemieactivo, $agemieini, $agemiefin, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'event_agemieactivo_onclick';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agemieactivo' => NM_utf8_urldecode($agemieactivo),
                  'agemieini' => NM_utf8_urldecode($agemieini),
                  'agemiefin' => NM_utf8_urldecode($agemiefin),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_event_agemieactivo_onclick

    function ajax_form_agenda_mob_event_agesabactivo_onclick($agesabactivo, $agesabini, $agesabfin, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'event_agesabactivo_onclick';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agesabactivo' => NM_utf8_urldecode($agesabactivo),
                  'agesabini' => NM_utf8_urldecode($agesabini),
                  'agesabfin' => NM_utf8_urldecode($agesabfin),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_event_agesabactivo_onclick

    function ajax_form_agenda_mob_event_agevieactivo_onclick($agevieactivo, $agevieini, $ageviefin, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'event_agevieactivo_onclick';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agevieactivo' => NM_utf8_urldecode($agevieactivo),
                  'agevieini' => NM_utf8_urldecode($agevieini),
                  'ageviefin' => NM_utf8_urldecode($ageviefin),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_event_agevieactivo_onclick

    function ajax_form_agenda_mob_autocomp_medcodigo($medcodigo, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'autocomp_medcodigo';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'medcodigo' => NM_utf8_urldecode($medcodigo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['medcodigo'] = utf8_decode(urldecode($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['medcodigo']));
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_autocomp_medcodigo

    function ajax_form_agenda_mob_submit_form($agenombre, $medcodigo, $ageintervalo, $ageactivo, $agecolor, $ageusucrea, $agefeccrea, $ageusumodi, $agefecmodi, $agelunactivo, $agemaractivo, $agemieactivo, $agejueactivo, $agevieactivo, $agesabactivo, $agedomactivo, $agelunini, $agelunfin, $agemarini, $agemarfin, $agemieini, $agemiefin, $agejueini, $agejuefin, $agevieini, $ageviefin, $agesabini, $agesabfin, $agedomini, $agedomfin, $agesecuen, $nm_form_submit, $nmgp_url_saida, $nmgp_opcao, $nmgp_ancora, $nmgp_num_form, $nmgp_parms, $script_case_init, $csrf_token)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'submit_form';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agenombre' => NM_utf8_urldecode($agenombre),
                  'medcodigo' => NM_utf8_urldecode($medcodigo),
                  'ageintervalo' => NM_utf8_urldecode($ageintervalo),
                  'ageactivo' => NM_utf8_urldecode($ageactivo),
                  'agecolor' => NM_utf8_urldecode($agecolor),
                  'ageusucrea' => NM_utf8_urldecode($ageusucrea),
                  'agefeccrea' => NM_utf8_urldecode($agefeccrea),
                  'ageusumodi' => NM_utf8_urldecode($ageusumodi),
                  'agefecmodi' => NM_utf8_urldecode($agefecmodi),
                  'agelunactivo' => NM_utf8_urldecode($agelunactivo),
                  'agemaractivo' => NM_utf8_urldecode($agemaractivo),
                  'agemieactivo' => NM_utf8_urldecode($agemieactivo),
                  'agejueactivo' => NM_utf8_urldecode($agejueactivo),
                  'agevieactivo' => NM_utf8_urldecode($agevieactivo),
                  'agesabactivo' => NM_utf8_urldecode($agesabactivo),
                  'agedomactivo' => NM_utf8_urldecode($agedomactivo),
                  'agelunini' => NM_utf8_urldecode($agelunini),
                  'agelunfin' => NM_utf8_urldecode($agelunfin),
                  'agemarini' => NM_utf8_urldecode($agemarini),
                  'agemarfin' => NM_utf8_urldecode($agemarfin),
                  'agemieini' => NM_utf8_urldecode($agemieini),
                  'agemiefin' => NM_utf8_urldecode($agemiefin),
                  'agejueini' => NM_utf8_urldecode($agejueini),
                  'agejuefin' => NM_utf8_urldecode($agejuefin),
                  'agevieini' => NM_utf8_urldecode($agevieini),
                  'ageviefin' => NM_utf8_urldecode($ageviefin),
                  'agesabini' => NM_utf8_urldecode($agesabini),
                  'agesabfin' => NM_utf8_urldecode($agesabfin),
                  'agedomini' => NM_utf8_urldecode($agedomini),
                  'agedomfin' => NM_utf8_urldecode($agedomfin),
                  'agesecuen' => NM_utf8_urldecode($agesecuen),
                  'nm_form_submit' => NM_utf8_urldecode($nm_form_submit),
                  'nmgp_url_saida' => NM_utf8_urldecode($nmgp_url_saida),
                  'nmgp_opcao' => NM_utf8_urldecode($nmgp_opcao),
                  'nmgp_ancora' => NM_utf8_urldecode($nmgp_ancora),
                  'nmgp_num_form' => NM_utf8_urldecode($nmgp_num_form),
                  'nmgp_parms' => NM_utf8_urldecode($nmgp_parms),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'csrf_token' => NM_utf8_urldecode($csrf_token),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_submit_form

    function ajax_form_agenda_mob_navigate_form($agesecuen, $nm_form_submit, $nmgp_opcao, $nmgp_ordem, $nmgp_fast_search, $nmgp_cond_fast_search, $nmgp_arg_fast_search, $nmgp_arg_dyn_search, $script_case_init)
    {
        global $inicial_form_agenda_mob;
        //register_shutdown_function("form_agenda_mob_pack_ajax_response");
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_flag          = true;
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao         = 'navigate_form';
        $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param'] = array(
                  'agesecuen' => NM_utf8_urldecode($agesecuen),
                  'nm_form_submit' => NM_utf8_urldecode($nm_form_submit),
                  'nmgp_opcao' => NM_utf8_urldecode($nmgp_opcao),
                  'nmgp_ordem' => NM_utf8_urldecode($nmgp_ordem),
                  'nmgp_fast_search' => NM_utf8_urldecode($nmgp_fast_search),
                  'nmgp_cond_fast_search' => NM_utf8_urldecode($nmgp_cond_fast_search),
                  'nmgp_arg_fast_search' => NM_utf8_urldecode($nmgp_arg_fast_search),
                  'nmgp_arg_dyn_search' => NM_utf8_urldecode($nmgp_arg_dyn_search),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_agenda_mob->contr_form_agenda_mob->controle();
        exit;
    } // ajax_navigate_form


   function form_agenda_mob_pack_ajax_response()
   {
      global $inicial_form_agenda_mob;
      $aResp = array();

      if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['empty_filter']))
      {
          $aResp['empty_filter'] = $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['empty_filter'];
      }
      if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['dyn_search']['NM_Dynamic_Search']))
      {
          $aResp['dyn_search']['NM_Dynamic_Search'] = $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['dyn_search']['NM_Dynamic_Search'];
      }
      if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str']))
      {
          $aResp['dyn_search']['id_dyn_search_cmd_str'] = $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str'];
      }
      if ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['calendarReload'])
      {
         $aResp['result'] = 'CALENDARRELOAD';
      }
      elseif ('' != $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['autoComp'])
      {
         $aResp['result'] = 'AUTOCOMP';
      }
//mestre_detalhe
      elseif (!empty($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['newline']))
      {
         $aResp['result'] = 'NEWLINE';
         ob_end_clean();
      }
      elseif (!empty($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['tableRefresh']))
      {
         $aResp['result'] = 'TABLEREFRESH';
      }
//-----
      elseif (!empty($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['errList']))
      {
         $aResp['result'] = 'ERROR';
      }
      elseif (!empty($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['fldList']))
      {
         $aResp['result'] = 'SET';
      }
      else
      {
         $aResp['result'] = 'OK';
      }
      if ('AUTOCOMP' == $aResp['result'])
      {
         $aResp = $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['autoComp'];
      }
//mestre_detalhe
      elseif ('NEWLINE' == $aResp['result'])
      {
         $aResp = $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['newline'];
      }
      else
//-----
      {
         $aResp['ajaxRequest'] = $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_opcao;
         if ('CALENDARRELOAD' == $aResp['result'])
         {
            form_agenda_mob_pack_calendar_reload($aResp);
         }
         elseif ('ERROR' == $aResp['result'])
         {
            form_agenda_mob_pack_ajax_errors($aResp);
         }
         elseif ('SET' == $aResp['result'])
         {
            form_agenda_mob_pack_ajax_set_fields($aResp);
         }
         elseif ('TABLEREFRESH' == $aResp['result'])
         {
            form_agenda_mob_pack_ajax_set_fields($aResp);
            $aResp['tableRefresh'] = form_agenda_mob_pack_protect_string($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['tableRefresh']);
         }
         if ('OK' == $aResp['result'] || 'SET' == $aResp['result'])
         {
            form_agenda_mob_pack_ajax_ok($aResp);
         }
         if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['focus']) && '' != $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['focus'])
         {
            $aResp['setFocus'] = $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['focus'];
         }
         if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['closeLine']) && '' != $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['closeLine'])
         {
            $aResp['closeLine'] = $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['closeLine'];
         }
         else
         {
            $aResp['closeLine'] = 'N';
         }
         if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['clearUpload']) && '' != $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['clearUpload'])
         {
            $aResp['clearUpload'] = $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['clearUpload'];
         }
         else
         {
            $aResp['clearUpload'] = 'N';
         }
         if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['varList']) && !empty($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['varList']))
         {
            form_agenda_mob_pack_var_list($aResp);
         }
         if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['masterValue']) && '' != $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['masterValue'])
         {
            form_agenda_mob_pack_master_value($aResp);
         }
         if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxAlert']) && '' != $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxAlert'])
         {
            form_agenda_mob_pack_ajax_alert($aResp);
         }
         if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']) && '' != $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage'])
         {
            form_agenda_mob_pack_ajax_message($aResp);
         }
         if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxJavascript']) && '' != $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxJavascript'])
         {
            form_agenda_mob_pack_ajax_javascript($aResp);
         }
         if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['redir']) && !empty($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['redir']))
         {
            form_agenda_mob_pack_ajax_redir($aResp);
         }
         if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['redirExit']) && !empty($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['redirExit']))
         {
            form_agenda_mob_pack_ajax_redir_exit($aResp);
         }
         if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['blockDisplay']) && !empty($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['blockDisplay']))
         {
            form_agenda_mob_pack_ajax_block_display($aResp);
         }
         if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['fieldDisplay']) && !empty($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['fieldDisplay']))
         {
            form_agenda_mob_pack_ajax_field_display($aResp);
         }
         if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['buttonDisplay']) && !empty($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['buttonDisplay']))
         {
            $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['buttonDisplay'] = $inicial_form_agenda_mob->contr_form_agenda_mob->nmgp_botoes;
            form_agenda_mob_pack_ajax_button_display($aResp);
         }
         if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['buttonDisplayVert']) && !empty($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['buttonDisplayVert']))
         {
            form_agenda_mob_pack_ajax_button_display_vert($aResp);
         }
         if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['fieldLabel']) && !empty($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['fieldLabel']))
         {
            form_agenda_mob_pack_ajax_field_label($aResp);
         }
         if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['readOnly']) && !empty($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['readOnly']))
         {
            form_agenda_mob_pack_ajax_readonly($aResp);
         }
         if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['navStatus']) && !empty($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['navStatus']))
         {
            form_agenda_mob_pack_ajax_nav_status($aResp);
         }
         if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['navSummary']) && !empty($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['navSummary']))
         {
            form_agenda_mob_pack_ajax_nav_Summary($aResp);
         }
         if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['navPage']))
         {
            form_agenda_mob_pack_ajax_navPage($aResp);
         }
         if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['btnVars']) && !empty($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['btnVars']))
         {
            form_agenda_mob_pack_ajax_btn_vars($aResp);
         }
         if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['quickSearchRes']) && $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['quickSearchRes'])
         {
            $aResp['quickSearchRes'] = 'Y';
         }
         else
         {
            $aResp['quickSearchRes'] = 'N';
         }
         if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['event_field']) && '' != $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['event_field'])
         {
            $aResp['eventField'] = $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['event_field'];
         }
         else
         {
            $aResp['eventField'] = '__SC_NO_FIELD';
         }
         $aResp['htmOutput'] = '';
    
         if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output']) && $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['buffer_output'])
         {
            $aResp['htmOutput'] = ob_get_contents();
            if (false === $aResp['htmOutput'])
            {
               $aResp['htmOutput'] = '';
            }
            else
            {
               $aResp['htmOutput'] = form_agenda_mob_pack_protect_string(NM_charset_to_utf8($aResp['htmOutput']));
               ob_end_clean();
            }
         }
      }
      if (is_array($aResp))
      {
          $oJson = new Services_JSON();
          echo "var res = " . trim(sajax_get_js_repr($oJson->encode($aResp))) . "; res;";
      }
      else
      {
          echo "var res = " . trim(sajax_get_js_repr($aResp)) . "; res;";
      }
      exit;
   } // form_agenda_mob_pack_ajax_response

   function form_agenda_mob_pack_calendar_reload(&$aResp)
   {
      global $inicial_form_agenda_mob;
      $aResp['calendarReload'] = 'OK';
   } // form_agenda_mob_pack_calendar_reload

   function form_agenda_mob_pack_ajax_errors(&$aResp)
   {
      global $inicial_form_agenda_mob;
      $aResp['errList'] = array();
      foreach ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['errList'] as $sField => $aMsg)
      {
         if ('geral_form_agenda_mob' == $sField)
         {
             $aMsg = form_agenda_mob_pack_ajax_remove_erros($aMsg);
         }
         foreach ($aMsg as $sMsg)
         {
            $iNumLinha = (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['nmgp_refresh_row']) && 'geral_form_agenda_mob' != $sField)
                       ? $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['nmgp_refresh_row'] : "";
            $aResp['errList'][] = array('fldName'  => $sField,
                                        'msgText'  => form_agenda_mob_pack_protect_string(NM_charset_to_utf8($sMsg)),
                                        'numLinha' => $iNumLinha);
         }
      }
   } // form_agenda_mob_pack_ajax_errors

   function form_agenda_mob_pack_ajax_remove_erros($aErrors)
   {
       $aNewErrors = array();
       if (!empty($aErrors))
       {
           $sErrorMsgs = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), implode('<br />', $aErrors));
           $aErrorMsgs = explode('<BR>', $sErrorMsgs);
           foreach ($aErrorMsgs as $sErrorMsg)
           {
               $sErrorMsg = trim($sErrorMsg);
               if ('' != $sErrorMsg && !in_array($sErrorMsg, $aNewErrors))
               {
                   $aNewErrors[] = $sErrorMsg;
               }
           }
       }
       return $aNewErrors;
   } // form_agenda_mob_pack_ajax_remove_erros

   function form_agenda_mob_pack_ajax_ok(&$aResp)
   {
      global $inicial_form_agenda_mob;
      $iNumLinha = (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      $aResp['msgDisplay'] = array('msgText'  => form_agenda_mob_pack_protect_string($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['msgDisplay']),
                                   'numLinha' => $iNumLinha);
   } // form_agenda_mob_pack_ajax_ok

   function form_agenda_mob_pack_ajax_set_fields(&$aResp)
   {
      global $inicial_form_agenda_mob;
      $iNumLinha = (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      if ('' != $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['rsSize'])
      {
         $aResp['rsSize'] = $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['rsSize'];
      }
      $aResp['fldList'] = array();
      foreach ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['fldList'] as $sField => $aData)
      {
         $aField = array();
         if (isset($aData['colNum']))
         {
            $aField['colNum'] = $aData['colNum'];
         }
         if (isset($aData['row']))
         {
            $aField['row'] = $aData['row'];
         }
         if (isset($aData['imgFile']))
         {
            $aField['imgFile'] = form_agenda_mob_pack_protect_string($aData['imgFile']);
         }
         if (isset($aData['imgOrig']))
         {
            $aField['imgOrig'] = form_agenda_mob_pack_protect_string($aData['imgOrig']);
         }
         if (isset($aData['imgLink']))
         {
            $aField['imgLink'] = form_agenda_mob_pack_protect_string($aData['imgLink']);
         }
         if (isset($aData['keepImg']))
         {
            $aField['keepImg'] = $aData['keepImg'];
         }
         if (isset($aData['hideName']))
         {
            $aField['hideName'] = $aData['hideName'];
         }
         if (isset($aData['docLink']))
         {
            $aField['docLink'] = form_agenda_mob_pack_protect_string($aData['docLink']);
         }
         if (isset($aData['docIcon']))
         {
            $aField['docIcon'] = form_agenda_mob_pack_protect_string($aData['docIcon']);
         }
         if (isset($aData['docReadonly']))
         {
            $aField['docReadonly'] = form_agenda_mob_pack_protect_string($aData['docReadonly']);
         }
         if (isset($aData['keyVal']))
         {
            $aField['keyVal'] = $aData['keyVal'];
         }
         if (isset($aData['optComp']))
         {
            $aField['optComp'] = $aData['optComp'];
         }
         if (isset($aData['optClass']))
         {
            $aField['optClass'] = $aData['optClass'];
         }
         if (isset($aData['optMulti']))
         {
            $aField['optMulti'] = $aData['optMulti'];
         }
         if (isset($aData['switch']))
         {
            $aField['switch'] = $aData['switch'];
         }
         if (isset($aData['lookupCons']))
         {
            $aField['lookupCons'] = $aData['lookupCons'];
         }
         if (isset($aData['imgHtml']))
         {
            $aField['imgHtml'] = form_agenda_mob_pack_protect_string($aData['imgHtml']);
         }
         if (isset($aData['mulHtml']))
         {
            $aField['mulHtml'] = form_agenda_mob_pack_protect_string($aData['mulHtml']);
         }
         if (isset($aData['updInnerHtml']))
         {
            $aField['updInnerHtml'] = $aData['updInnerHtml'];
         }
         if (isset($aData['htmComp']))
         {
            $aField['htmComp'] = str_replace("'", '__AS__', str_replace('"', '__AD__', $aData['htmComp']));
         }
         $aField['fldName']  = $sField;
         $aField['fldType']  = $aData['type'];
         $aField['numLinha'] = $iNumLinha;
         $aField['valList']  = array();
         foreach ($aData['valList'] as $iIndex => $sValue)
         {
            $aValue = array();
            if (isset($aData['labList'][$iIndex]))
            {
               $aValue['label'] = form_agenda_mob_pack_protect_string($aData['labList'][$iIndex]);
            }
            $aValue['value']     = ('_autocomp' != substr($sField, -9)) ? form_agenda_mob_pack_protect_string($sValue) : $sValue;
            $aField['valList'][] = $aValue;
         }
         foreach ($aField['valList'] as $iIndex => $aFieldData)
         {
             if ("null" == $aFieldData['value'])
             {
                 $aField['valList'][$iIndex]['value'] = '';
             }
         }
         if (isset($aData['optList']) && false !== $aData['optList'])
         {
            if (is_array($aData['optList']))
            {
               $aField['optList'] = array();
               foreach ($aData['optList'] as $aOptList)
               {
                  foreach ($aOptList as $sValue => $sLabel)
                  {
                     $sOpt = ($sValue !== $sLabel) ? $sValue : $sLabel;
                     $aField['optList'][] = array('value' => form_agenda_mob_pack_protect_string($sOpt),
                                                  'label' => form_agenda_mob_pack_protect_string($sLabel));
                  }
               }
            }
            else
            {
               $aField['optList'] = $aData['optList'];
            }
         }
         $aResp['fldList'][] = $aField;
      }
   } // form_agenda_mob_pack_ajax_set_fields

   function form_agenda_mob_pack_ajax_redir(&$aResp)
   {
      global $inicial_form_agenda_mob;
      $aInfo              = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session', 'h_modal', 'w_modal');
      $aResp['redirInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['redir'][$sTag]))
         {
            $aResp['redirInfo'][$sTag] = $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['redir'][$sTag];
         }
      }
   } // form_agenda_mob_pack_ajax_redir

   function form_agenda_mob_pack_ajax_redir_exit(&$aResp)
   {
      global $inicial_form_agenda_mob;
      $aInfo                  = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session');
      $aResp['redirExitInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['redirExit'][$sTag]))
         {
            $aResp['redirExitInfo'][$sTag] = $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['redirExit'][$sTag];
         }
      }
   } // form_agenda_mob_pack_ajax_redir_exit

   function form_agenda_mob_pack_var_list(&$aResp)
   {
      global $inicial_form_agenda_mob;
      foreach ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['varList'] as $varData)
      {
         $aResp['varList'][] = array('index' => key($varData),
                                      'value' => current($varData));
      }
   } // form_agenda_mob_pack_var_list

   function form_agenda_mob_pack_master_value(&$aResp)
   {
      global $inicial_form_agenda_mob;
      foreach ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['masterValue'] as $sIndex => $sValue)
      {
         $aResp['masterValue'][] = array('index' => $sIndex,
                                         'value' => $sValue);
      }
   } // form_agenda_mob_pack_master_value

   function form_agenda_mob_pack_ajax_alert(&$aResp)
   {
      global $inicial_form_agenda_mob;
      $aResp['ajaxAlert'] = array('message' => $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxAlert']['message'], 'params' =>  $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxAlert']['params']);
   } // form_agenda_mob_pack_ajax_alert

   function form_agenda_mob_pack_ajax_message(&$aResp)
   {
      global $inicial_form_agenda_mob;
      $aResp['ajaxMessage'] = array('message'      => form_agenda_mob_pack_protect_string($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['message']),
                                    'title'        => form_agenda_mob_pack_protect_string($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['title']),
                                    'modal'        => isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['modal'])        ? $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['modal']        : 'N',
                                    'timeout'      => isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['timeout'])      ? $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['timeout']      : '',
                                    'button'       => isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['button'])       ? $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['button']       : '',
                                    'button_label' => isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['button_label']) ? $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['button_label'] : 'Ok',
                                    'top'          => isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['top'])          ? $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['top']          : '',
                                    'left'         => isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['left'])         ? $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['left']         : '',
                                    'width'        => isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['width'])        ? $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['width']        : '',
                                    'height'       => isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['height'])       ? $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['height']       : '',
                                    'redir'        => isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['redir'])        ? $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['redir']        : '',
                                    'show_close'   => isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['show_close'])   ? $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['show_close']   : 'Y',
                                    'body_icon'    => isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['body_icon'])    ? $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['body_icon']    : 'Y',
                                    'toast'        => isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['toast'])        ? $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['toast']        : 'N',
                                    'toast_pos'    => isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['toast_pos'])    ? $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['toast_pos']    : '',
                                    'type'         => isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['type'])         ? $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['type']         : '',
                                    'redir_target' => isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['redir_target']) ? $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['redir_target'] : '',
                                    'redir_par'    => isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['redir_par'])    ? $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxMessage']['redir_par']    : '');
   } // form_agenda_mob_pack_ajax_message

   function form_agenda_mob_pack_ajax_javascript(&$aResp)
   {
      global $inicial_form_agenda_mob;
      foreach ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['ajaxJavascript'] as $aJsFunc)
      {
         $aResp['ajaxJavascript'][] = $aJsFunc;
      }
   } // form_agenda_mob_pack_ajax_javascript

   function form_agenda_mob_pack_ajax_block_display(&$aResp)
   {
      global $inicial_form_agenda_mob;
      $aResp['blockDisplay'] = array();
      foreach ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['blockDisplay'] as $sBlockName => $sBlockStatus)
      {
        $aResp['blockDisplay'][] = array($sBlockName, $sBlockStatus);
      }
   } // form_agenda_mob_pack_ajax_block_display

   function form_agenda_mob_pack_ajax_field_display(&$aResp)
   {
      global $inicial_form_agenda_mob;
      $aResp['fieldDisplay'] = array();
      foreach ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['fieldDisplay'] as $sFieldName => $sFieldStatus)
      {
        $aResp['fieldDisplay'][] = array($sFieldName, $sFieldStatus);
      }
   } // form_agenda_mob_pack_ajax_field_display

   function form_agenda_mob_pack_ajax_button_display(&$aResp)
   {
      global $inicial_form_agenda_mob;
      $aResp['buttonDisplay'] = array();
      foreach ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['buttonDisplay'] as $sButtonName => $sButtonStatus)
      {
        $aResp['buttonDisplay'][] = array($sButtonName, $sButtonStatus);
      }
   } // form_agenda_mob_pack_ajax_button_display

   function form_agenda_mob_pack_ajax_button_display_vert(&$aResp)
   {
      global $inicial_form_agenda_mob;
      $aResp['buttonDisplayVert'] = array();
      foreach ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['buttonDisplayVert'] as $aButtonData)
      {
        $aResp['buttonDisplayVert'][] = $aButtonData;
      }
   } // form_agenda_mob_pack_ajax_button_display

   function form_agenda_mob_pack_ajax_field_label(&$aResp)
   {
      global $inicial_form_agenda_mob;
      $aResp['fieldLabel'] = array();
      foreach ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['fieldLabel'] as $sFieldName => $sFieldLabel)
      {
        $aResp['fieldLabel'][] = array($sFieldName, form_agenda_mob_pack_protect_string($sFieldLabel));
      }
   } // form_agenda_mob_pack_ajax_field_label

   function form_agenda_mob_pack_ajax_readonly(&$aResp)
   {
      global $inicial_form_agenda_mob;
      $aResp['readOnly'] = array();
      foreach ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['readOnly'] as $sFieldName => $sFieldStatus)
      {
        $aResp['readOnly'][] = array($sFieldName, $sFieldStatus);
      }
   } // form_agenda_mob_pack_ajax_readonly

   function form_agenda_mob_pack_ajax_nav_status(&$aResp)
   {
      global $inicial_form_agenda_mob;
      $aResp['navStatus'] = array();
      if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['navStatus']['ret']) && '' != $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['navStatus']['ret'])
      {
         $aResp['navStatus']['ret'] = $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['navStatus']['ret'];
      }
      if (isset($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['navStatus']['ava']) && '' != $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['navStatus']['ava'])
      {
         $aResp['navStatus']['ava'] = $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['navStatus']['ava'];
      }
   } // form_agenda_mob_pack_ajax_nav_status

   function form_agenda_mob_pack_ajax_nav_Summary(&$aResp)
   {
      global $inicial_form_agenda_mob;
      $aResp['navSummary'] = array();
      $aResp['navSummary']['reg_ini'] = $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['navSummary']['reg_ini'];
      $aResp['navSummary']['reg_qtd'] = $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['navSummary']['reg_qtd'];
      $aResp['navSummary']['reg_tot'] = $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['navSummary']['reg_tot'];
   } // form_agenda_mob_pack_ajax_nav_Summary

   function form_agenda_mob_pack_ajax_navPage(&$aResp)
   {
      global $inicial_form_agenda_mob;
      $aResp['navPage'] = $inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['navPage'];
   } // form_agenda_mob_pack_ajax_navPage


   function form_agenda_mob_pack_ajax_btn_vars(&$aResp)
   {
      global $inicial_form_agenda_mob;
      $aResp['btnVars'] = array();
      foreach ($inicial_form_agenda_mob->contr_form_agenda_mob->NM_ajax_info['btnVars'] as $sBtnName => $sBtnValue)
      {
        $aResp['btnVars'][] = array($sBtnName, form_agenda_mob_pack_protect_string($sBtnValue));
      }
   } // form_agenda_mob_pack_ajax_btn_vars

   function form_agenda_mob_pack_protect_string($sString)
   {
      $sString = (string) $sString;

      if (!empty($sString))
      {
         if (function_exists('NM_is_utf8') && NM_is_utf8($sString))
         {
             return $sString;
         }
         else
         {
/*             return htmlentities($sString, ENT_COMPAT, $_SESSION['scriptcase']['charset']); */
             return sc_htmlentities($sString);
         }
      }
      elseif ('0' === $sString || 0 === $sString)
      {
         return '0';
      }
      else
      {
         return '';
      }
   } // form_agenda_mob_pack_protect_string
?>