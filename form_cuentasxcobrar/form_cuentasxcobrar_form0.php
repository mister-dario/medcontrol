<?php
class form_cuentasxcobrar_form extends form_cuentasxcobrar_apl
{
function Form_Init()
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
?>
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

header("X-XSS-Protection: 1; mode=block");
header("X-Frame-Options: SAMEORIGIN");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " cuentasxcobrar"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " cuentasxcobrar"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </SCRIPT>
 <SCRIPT type="text/javascript">
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
  var sc_css_status_pwd_box = '<?php echo $this->Ini->Css_status_pwd_box; ?>';
  var sc_css_status_pwd_text = '<?php echo $this->Ini->Css_status_pwd_text; ?>';
<?php
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['sc_redir_atualiz'] == 'ok')
{
?>
  var sc_closeChange = true;
<?php
}
else
{
?>
  var sc_closeChange = false;
<?php
}
?>
 </SCRIPT>
        <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
<input type="hidden" id="sc-mobile-lock" value='true' />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <style type="text/css">
   .scFormLabelOddMult a img[src$='<?php echo $this->Ini->Label_sort_desc ?>'], 
   .scFormLabelOddMult a img[src$='<?php echo $this->Ini->Label_sort_asc ?>']{opacity:1!important;} 
   .scFormLabelOddMult a img{opacity:0;transition:all .2s;} 
   .scFormLabelOddMult:HOVER a img{opacity:1;transition:all .2s;} 
 </style>
<style type="text/css">
.sc-button-image.disabled {
	opacity: 0.25
}
.sc-button-image.disabled img {
	cursor: default !important
}
</style>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
<?php
$miniCalendarFA = $this->jqueryFAFile('calendar');
if ('' != $miniCalendarFA) {
?>
<style type="text/css">
.css_read_off_cxcfecvence_ button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_cxcfecdoc_ button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_cxcfeccancel_ button {
	background-color: transparent;
	border: 0;
	padding: 0
}
</style>
<?php
}
?>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_cuentasxcobrar/form_cuentasxcobrar_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_cuentasxcobrar_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
function navpage_atualiza(str_navpage)
{
    if (document.getElementById("sc_b_navpage_b")) document.getElementById("sc_b_navpage_b").innerHTML = str_navpage;
}
<?php

include_once('form_cuentasxcobrar_jquery.php');

?>
var applicationKeys = "";
applicationKeys += "ctrl+shift+right";
applicationKeys += ",";
applicationKeys += "ctrl+shift+left";
applicationKeys += ",";
applicationKeys += "ctrl+right";
applicationKeys += ",";
applicationKeys += "ctrl+left";
applicationKeys += ",";
applicationKeys += "alt+q";
applicationKeys += ",";
applicationKeys += "escape";
applicationKeys += ",";
applicationKeys += "ctrl+enter";
applicationKeys += ",";
applicationKeys += "ctrl+s";
applicationKeys += ",";
applicationKeys += "ctrl+delete";
applicationKeys += ",";
applicationKeys += "f1";
applicationKeys += ",";
applicationKeys += "ctrl+shift+c";

var hotkeyList = "";

function execHotKey(e, h) {
    var hotkey_fired = false;
  switch (true) {
    case (["ctrl+shift+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_fim");
      break;
    case (["ctrl+shift+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ini");
      break;
    case (["ctrl+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ava");
      break;
    case (["ctrl+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ret");
      break;
    case (["alt+q"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_sai");
      break;
    case (["escape"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_cnl");
      break;
    case (["ctrl+enter"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_inc");
      break;
    case (["ctrl+s"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_alt");
      break;
    case (["ctrl+delete"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_exc");
      break;
    case (["f1"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_webh");
      break;
    case (["ctrl+shift+c"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_copy");
      break;
    default:
      return true;
  }
  if (hotkey_fired) {
        e.preventDefault();
        return false;
    } else {
        return true;
    }
}
</script>
<script type="text/javascript" src="../_lib/lib/js/hotkeys.inc.js"></script>
<script type="text/javascript" src="../_lib/lib/js/hotkeys_setup.js"></script>
<script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
<script type="text/javascript">
function process_hotkeys(hotkey)
{
  if (hotkey == "sys_format_fim") {
    if (typeof scBtnFn_sys_format_fim !== "undefined" && typeof scBtnFn_sys_format_fim === "function") {
      scBtnFn_sys_format_fim();
        return true;
    }
  }
  if (hotkey == "sys_format_ini") {
    if (typeof scBtnFn_sys_format_ini !== "undefined" && typeof scBtnFn_sys_format_ini === "function") {
      scBtnFn_sys_format_ini();
        return true;
    }
  }
  if (hotkey == "sys_format_ava") {
    if (typeof scBtnFn_sys_format_ava !== "undefined" && typeof scBtnFn_sys_format_ava === "function") {
      scBtnFn_sys_format_ava();
        return true;
    }
  }
  if (hotkey == "sys_format_ret") {
    if (typeof scBtnFn_sys_format_ret !== "undefined" && typeof scBtnFn_sys_format_ret === "function") {
      scBtnFn_sys_format_ret();
        return true;
    }
  }
  if (hotkey == "sys_format_sai") {
    if (typeof scBtnFn_sys_format_sai !== "undefined" && typeof scBtnFn_sys_format_sai === "function") {
      scBtnFn_sys_format_sai();
        return true;
    }
  }
  if (hotkey == "sys_format_cnl") {
    if (typeof scBtnFn_sys_format_cnl !== "undefined" && typeof scBtnFn_sys_format_cnl === "function") {
      scBtnFn_sys_format_cnl();
        return true;
    }
  }
  if (hotkey == "sys_format_inc") {
    if (typeof scBtnFn_sys_format_inc !== "undefined" && typeof scBtnFn_sys_format_inc === "function") {
      scBtnFn_sys_format_inc();
        return true;
    }
  }
  if (hotkey == "sys_format_alt") {
    if (typeof scBtnFn_sys_format_alt !== "undefined" && typeof scBtnFn_sys_format_alt === "function") {
      scBtnFn_sys_format_alt();
        return true;
    }
  }
  if (hotkey == "sys_format_exc") {
    if (typeof scBtnFn_sys_format_exc !== "undefined" && typeof scBtnFn_sys_format_exc === "function") {
      scBtnFn_sys_format_exc();
        return true;
    }
  }
  if (hotkey == "sys_format_webh") {
    if (typeof scBtnFn_sys_format_webh !== "undefined" && typeof scBtnFn_sys_format_webh === "function") {
      scBtnFn_sys_format_webh();
        return true;
    }
  }
  if (hotkey == "sys_format_copy") {
    if (typeof scBtnFn_sys_format_copy !== "undefined" && typeof scBtnFn_sys_format_copy === "function") {
      scBtnFn_sys_format_copy();
        return true;
    }
  }
    return false;
}

 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).on('load', function() {
   });
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = '';
    $remove_border = '';
    $vertical_center = '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_cuentasxcobrar_js0.php");
?>
<script type="text/javascript"> 
  sc_quant_excl = <?php echo count($sc_check_excl); ?>; 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
 </script>
<form  name="F1" method="post" 
               action="./" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_cuentasxcobrar'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_cuentasxcobrar'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable scFormToastTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle scFormToastTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage scFormToastMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<?php
$msgDefClose = isset($this->arr_buttons['bmessageclose']) ? $this->arr_buttons['bmessageclose']['value'] : 'Ok';
?>
<script type="text/javascript">
var scMsgDefTitle = "<?php echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl']; ?>";
var scMsgDefButton = "Ok";
var scMsgDefClose = "<?php echo $msgDefClose; ?>";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<?php
if ($this->record_insert_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmi']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
if ($this->record_delete_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmd']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
?>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="100%">
 <tr>
  <td>
  <div class="scFormBorder" style="<?php echo (isset($remove_border) ? $remove_border : ''); ?>">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " cuentasxcobrar"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " cuentasxcobrar"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($this->Embutida_form) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Escape)", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + S)", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (F1)", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-9", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-10", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['empty_filter'] = true;
       }
       echo "<tr><td>";
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
     <div id="SC_tab_mult_reg">
<?php
}

function Form_Table($Table_refresh = false)
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
   if ($Table_refresh) 
   { 
       ob_start();
   }
?>
<?php
   if (!isset($this->nmgp_cmp_hidden['emiruc_']))
   {
       $this->nmgp_cmp_hidden['emiruc_'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php
$labelRowCount = 0;
?>
   <tr class="sc-ui-header-row" id="sc-id-fixed-headers-row-<?php echo $labelRowCount++ ?>">
<?php
$orderColName = '';
$orderColOrient = '';
?>
    <script type="text/javascript">
     var orderImgAsc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc ?>";
     var orderImgDesc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc ?>";
     var orderImgNone = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort ?>";
     var orderColName = "";
     function scSetOrderColumn(clickedColumn) {
      $(".sc-ui-img-order-column").attr("src", orderImgNone);
      if (clickedColumn != orderColName) {
       orderColName = clickedColumn;
       orderColOrient = orderImgAsc;
      }
      else if ("" != orderColName) {
       orderColOrient = orderColOrient == orderImgAsc ? orderImgDesc : orderImgAsc;
      }
      else {
       orderColName = "";
       orderColOrient = "";
      }
      $("#sc-id-img-order-" + orderColName).attr("src", orderColOrient);
     }
    </script>
<?php
     $Col_span = "";


       if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") { $Col_span = " colspan=2"; }
    if (!$this->Embutida_form && $this->nmgp_opcao == "novo") { $Col_span = " colspan=2"; }
 ?>

    <TD class="scFormLabelOddMult" style="display: none;" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['cxctipodoc_']) && $this->nmgp_cmp_hidden['cxctipodoc_'] == 'off') { $sStyleHidden_cxctipodoc_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['cxctipodoc_']) || $this->nmgp_cmp_hidden['cxctipodoc_'] == 'on') {
      if (!isset($this->nm_new_label['cxctipodoc_'])) {
          $this->nm_new_label['cxctipodoc_'] = "TIPO DOC."; } ?>

    <TD class="scFormLabelOddMult css_cxctipodoc__label" id="hidden_field_label_cxctipodoc_" style="<?php echo $sStyleHidden_cxctipodoc_; ?>" > <?php echo $this->nm_new_label['cxctipodoc_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['cxcnumdoc_']) && $this->nmgp_cmp_hidden['cxcnumdoc_'] == 'off') { $sStyleHidden_cxcnumdoc_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['cxcnumdoc_']) || $this->nmgp_cmp_hidden['cxcnumdoc_'] == 'on') {
      if (!isset($this->nm_new_label['cxcnumdoc_'])) {
          $this->nm_new_label['cxcnumdoc_'] = "No. DOC."; } ?>

    <TD class="scFormLabelOddMult css_cxcnumdoc__label" id="hidden_field_label_cxcnumdoc_" style="<?php echo $sStyleHidden_cxcnumdoc_; ?>" > <?php echo $this->nm_new_label['cxcnumdoc_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['cxcvalini_']) && $this->nmgp_cmp_hidden['cxcvalini_'] == 'off') { $sStyleHidden_cxcvalini_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['cxcvalini_']) || $this->nmgp_cmp_hidden['cxcvalini_'] == 'on') {
      if (!isset($this->nm_new_label['cxcvalini_'])) {
          $this->nm_new_label['cxcvalini_'] = "VALOR INICIAL"; } ?>

    <TD class="scFormLabelOddMult css_cxcvalini__label" id="hidden_field_label_cxcvalini_" style="<?php echo $sStyleHidden_cxcvalini_; ?>" > <?php echo $this->nm_new_label['cxcvalini_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['cxcvalpen_']) && $this->nmgp_cmp_hidden['cxcvalpen_'] == 'off') { $sStyleHidden_cxcvalpen_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['cxcvalpen_']) || $this->nmgp_cmp_hidden['cxcvalpen_'] == 'on') {
      if (!isset($this->nm_new_label['cxcvalpen_'])) {
          $this->nm_new_label['cxcvalpen_'] = "VALOR PENDIENTE"; } ?>

    <TD class="scFormLabelOddMult css_cxcvalpen__label" id="hidden_field_label_cxcvalpen_" style="<?php echo $sStyleHidden_cxcvalpen_; ?>" > <?php echo $this->nm_new_label['cxcvalpen_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['saldo_favor_']) && $this->nmgp_cmp_hidden['saldo_favor_'] == 'off') { $sStyleHidden_saldo_favor_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['saldo_favor_']) || $this->nmgp_cmp_hidden['saldo_favor_'] == 'on') {
      if (!isset($this->nm_new_label['saldo_favor_'])) {
          $this->nm_new_label['saldo_favor_'] = "A FAVOR"; } ?>

    <TD class="scFormLabelOddMult css_saldo_favor__label" id="hidden_field_label_saldo_favor_" style="<?php echo $sStyleHidden_saldo_favor_; ?>" > <?php echo $this->nm_new_label['saldo_favor_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['cxcvalretfte_']) && $this->nmgp_cmp_hidden['cxcvalretfte_'] == 'off') { $sStyleHidden_cxcvalretfte_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['cxcvalretfte_']) || $this->nmgp_cmp_hidden['cxcvalretfte_'] == 'on') {
      if (!isset($this->nm_new_label['cxcvalretfte_'])) {
          $this->nm_new_label['cxcvalretfte_'] = "VALOR RET. FUENTE"; } ?>

    <TD class="scFormLabelOddMult css_cxcvalretfte__label" id="hidden_field_label_cxcvalretfte_" style="<?php echo $sStyleHidden_cxcvalretfte_; ?>" > <?php echo $this->nm_new_label['cxcvalretfte_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['cxcfecvence_']) && $this->nmgp_cmp_hidden['cxcfecvence_'] == 'off') { $sStyleHidden_cxcfecvence_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['cxcfecvence_']) || $this->nmgp_cmp_hidden['cxcfecvence_'] == 'on') {
      if (!isset($this->nm_new_label['cxcfecvence_'])) {
          $this->nm_new_label['cxcfecvence_'] = "FECHA VENCIMIENTO"; } ?>

    <TD class="scFormLabelOddMult css_cxcfecvence__label" id="hidden_field_label_cxcfecvence_" style="<?php echo $sStyleHidden_cxcfecvence_; ?>" > <?php echo $this->nm_new_label['cxcfecvence_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['abono_']) && $this->nmgp_cmp_hidden['abono_'] == 'off') { $sStyleHidden_abono_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['abono_']) || $this->nmgp_cmp_hidden['abono_'] == 'on') {
      if (!isset($this->nm_new_label['abono_'])) {
          $this->nm_new_label['abono_'] = "ABONO / RETENCIÓN"; } ?>

    <TD class="scFormLabelOddMult css_abono__label" id="hidden_field_label_abono_" style="<?php echo $sStyleHidden_abono_; ?>" > <?php echo $this->nm_new_label['abono_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['emiruc_']) && $this->nmgp_cmp_hidden['emiruc_'] == 'off') { $sStyleHidden_emiruc_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['emiruc_']) || $this->nmgp_cmp_hidden['emiruc_'] == 'on') {
      if (!isset($this->nm_new_label['emiruc_'])) {
          $this->nm_new_label['emiruc_'] = "Emiruc"; } ?>

    <TD class="scFormLabelOddMult css_emiruc__label" id="hidden_field_label_emiruc_" style="<?php echo $sStyleHidden_emiruc_; ?>" > <?php echo $this->nm_new_label['emiruc_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>





    <script type="text/javascript">
     var orderColOrient = "<?php echo $orderColOrient ?>";
     scSetOrderColumn("<?php echo $orderColName ?>");
    </script>
   </tr>
<?php   
} 
function Form_Corpo($Line_Add = false, $Table_refresh = false) 
{ 
   global $sc_seq_vert; 
   if ($Line_Add) 
   { 
       ob_start();
       $iStart = sizeof($this->form_vert_form_cuentasxcobrar);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_cuentasxcobrar = $this->form_vert_form_cuentasxcobrar;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_cuentasxcobrar))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cxctipodoc_']))
           {
               $this->nmgp_cmp_readonly['cxctipodoc_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cxcnumdoc_']))
           {
               $this->nmgp_cmp_readonly['cxcnumdoc_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cxcvalini_']))
           {
               $this->nmgp_cmp_readonly['cxcvalini_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cxcvalpen_']))
           {
               $this->nmgp_cmp_readonly['cxcvalpen_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['saldo_favor_']))
           {
               $this->nmgp_cmp_readonly['saldo_favor_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cxcvalretfte_']))
           {
               $this->nmgp_cmp_readonly['cxcvalretfte_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cxcfecvence_']))
           {
               $this->nmgp_cmp_readonly['cxcfecvence_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['emiruc_']))
           {
               $this->nmgp_cmp_readonly['emiruc_'] = 'on';
           }
   foreach ($this->form_vert_form_cuentasxcobrar as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->fclnumero_ = $this->form_vert_form_cuentasxcobrar[$sc_seq_vert]['fclnumero_'];
       $this->cxcvalretiva_ = $this->form_vert_form_cuentasxcobrar[$sc_seq_vert]['cxcvalretiva_'];
       $this->cxcanulado_ = $this->form_vert_form_cuentasxcobrar[$sc_seq_vert]['cxcanulado_'];
       $this->cxcfecdoc_ = $this->form_vert_form_cuentasxcobrar[$sc_seq_vert]['cxcfecdoc_'];
       $this->cxcfeccancel_ = $this->form_vert_form_cuentasxcobrar[$sc_seq_vert]['cxcfeccancel_'];
       $this->secuen_numdoc_ = $this->form_vert_form_cuentasxcobrar[$sc_seq_vert]['secuen_numdoc_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['cxctipodoc_'] = true;
           $this->nmgp_cmp_readonly['cxcnumdoc_'] = true;
           $this->nmgp_cmp_readonly['cxcvalini_'] = true;
           $this->nmgp_cmp_readonly['cxcvalpen_'] = true;
           $this->nmgp_cmp_readonly['saldo_favor_'] = true;
           $this->nmgp_cmp_readonly['cxcvalretfte_'] = true;
           $this->nmgp_cmp_readonly['cxcfecvence_'] = true;
           $this->nmgp_cmp_readonly['abono_'] = true;
           $this->nmgp_cmp_readonly['emiruc_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['cxctipodoc_']) || $this->nmgp_cmp_readonly['cxctipodoc_'] != "on") {$this->nmgp_cmp_readonly['cxctipodoc_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cxcnumdoc_']) || $this->nmgp_cmp_readonly['cxcnumdoc_'] != "on") {$this->nmgp_cmp_readonly['cxcnumdoc_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cxcvalini_']) || $this->nmgp_cmp_readonly['cxcvalini_'] != "on") {$this->nmgp_cmp_readonly['cxcvalini_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cxcvalpen_']) || $this->nmgp_cmp_readonly['cxcvalpen_'] != "on") {$this->nmgp_cmp_readonly['cxcvalpen_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['saldo_favor_']) || $this->nmgp_cmp_readonly['saldo_favor_'] != "on") {$this->nmgp_cmp_readonly['saldo_favor_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cxcvalretfte_']) || $this->nmgp_cmp_readonly['cxcvalretfte_'] != "on") {$this->nmgp_cmp_readonly['cxcvalretfte_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cxcfecvence_']) || $this->nmgp_cmp_readonly['cxcfecvence_'] != "on") {$this->nmgp_cmp_readonly['cxcfecvence_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['abono_']) || $this->nmgp_cmp_readonly['abono_'] != "on") {$this->nmgp_cmp_readonly['abono_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['emiruc_']) || $this->nmgp_cmp_readonly['emiruc_'] != "on") {$this->nmgp_cmp_readonly['emiruc_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->cxctipodoc_ = $this->form_vert_form_cuentasxcobrar[$sc_seq_vert]['cxctipodoc_']; 
       $cxctipodoc_ = $this->cxctipodoc_; 
       $sStyleHidden_cxctipodoc_ = '';
       if (isset($sCheckRead_cxctipodoc_))
       {
           unset($sCheckRead_cxctipodoc_);
       }
       if (isset($this->nmgp_cmp_readonly['cxctipodoc_']))
       {
           $sCheckRead_cxctipodoc_ = $this->nmgp_cmp_readonly['cxctipodoc_'];
       }
       if (isset($this->nmgp_cmp_hidden['cxctipodoc_']) && $this->nmgp_cmp_hidden['cxctipodoc_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cxctipodoc_']);
           $sStyleHidden_cxctipodoc_ = 'display: none;';
       }
       $bTestReadOnly_cxctipodoc_ = true;
       $sStyleReadLab_cxctipodoc_ = 'display: none;';
       $sStyleReadInp_cxctipodoc_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cxctipodoc_"]) &&  $this->nmgp_cmp_readonly["cxctipodoc_"] == "on"))
       {
           $bTestReadOnly_cxctipodoc_ = false;
           unset($this->nmgp_cmp_readonly['cxctipodoc_']);
           $sStyleReadLab_cxctipodoc_ = '';
           $sStyleReadInp_cxctipodoc_ = 'display: none;';
       }
       $this->cxcnumdoc_ = $this->form_vert_form_cuentasxcobrar[$sc_seq_vert]['cxcnumdoc_']; 
       $cxcnumdoc_ = $this->cxcnumdoc_; 
       $sStyleHidden_cxcnumdoc_ = '';
       if (isset($sCheckRead_cxcnumdoc_))
       {
           unset($sCheckRead_cxcnumdoc_);
       }
       if (isset($this->nmgp_cmp_readonly['cxcnumdoc_']))
       {
           $sCheckRead_cxcnumdoc_ = $this->nmgp_cmp_readonly['cxcnumdoc_'];
       }
       if (isset($this->nmgp_cmp_hidden['cxcnumdoc_']) && $this->nmgp_cmp_hidden['cxcnumdoc_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cxcnumdoc_']);
           $sStyleHidden_cxcnumdoc_ = 'display: none;';
       }
       $bTestReadOnly_cxcnumdoc_ = true;
       $sStyleReadLab_cxcnumdoc_ = 'display: none;';
       $sStyleReadInp_cxcnumdoc_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cxcnumdoc_"]) &&  $this->nmgp_cmp_readonly["cxcnumdoc_"] == "on"))
       {
           $bTestReadOnly_cxcnumdoc_ = false;
           unset($this->nmgp_cmp_readonly['cxcnumdoc_']);
           $sStyleReadLab_cxcnumdoc_ = '';
           $sStyleReadInp_cxcnumdoc_ = 'display: none;';
       }
       $this->cxcvalini_ = $this->form_vert_form_cuentasxcobrar[$sc_seq_vert]['cxcvalini_']; 
       $cxcvalini_ = $this->cxcvalini_; 
       $sStyleHidden_cxcvalini_ = '';
       if (isset($sCheckRead_cxcvalini_))
       {
           unset($sCheckRead_cxcvalini_);
       }
       if (isset($this->nmgp_cmp_readonly['cxcvalini_']))
       {
           $sCheckRead_cxcvalini_ = $this->nmgp_cmp_readonly['cxcvalini_'];
       }
       if (isset($this->nmgp_cmp_hidden['cxcvalini_']) && $this->nmgp_cmp_hidden['cxcvalini_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cxcvalini_']);
           $sStyleHidden_cxcvalini_ = 'display: none;';
       }
       $bTestReadOnly_cxcvalini_ = true;
       $sStyleReadLab_cxcvalini_ = 'display: none;';
       $sStyleReadInp_cxcvalini_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cxcvalini_"]) &&  $this->nmgp_cmp_readonly["cxcvalini_"] == "on"))
       {
           $bTestReadOnly_cxcvalini_ = false;
           unset($this->nmgp_cmp_readonly['cxcvalini_']);
           $sStyleReadLab_cxcvalini_ = '';
           $sStyleReadInp_cxcvalini_ = 'display: none;';
       }
       $this->cxcvalpen_ = $this->form_vert_form_cuentasxcobrar[$sc_seq_vert]['cxcvalpen_']; 
       $cxcvalpen_ = $this->cxcvalpen_; 
       $sStyleHidden_cxcvalpen_ = '';
       if (isset($sCheckRead_cxcvalpen_))
       {
           unset($sCheckRead_cxcvalpen_);
       }
       if (isset($this->nmgp_cmp_readonly['cxcvalpen_']))
       {
           $sCheckRead_cxcvalpen_ = $this->nmgp_cmp_readonly['cxcvalpen_'];
       }
       if (isset($this->nmgp_cmp_hidden['cxcvalpen_']) && $this->nmgp_cmp_hidden['cxcvalpen_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cxcvalpen_']);
           $sStyleHidden_cxcvalpen_ = 'display: none;';
       }
       $bTestReadOnly_cxcvalpen_ = true;
       $sStyleReadLab_cxcvalpen_ = 'display: none;';
       $sStyleReadInp_cxcvalpen_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cxcvalpen_"]) &&  $this->nmgp_cmp_readonly["cxcvalpen_"] == "on"))
       {
           $bTestReadOnly_cxcvalpen_ = false;
           unset($this->nmgp_cmp_readonly['cxcvalpen_']);
           $sStyleReadLab_cxcvalpen_ = '';
           $sStyleReadInp_cxcvalpen_ = 'display: none;';
       }
       $this->saldo_favor_ = $this->form_vert_form_cuentasxcobrar[$sc_seq_vert]['saldo_favor_']; 
       $saldo_favor_ = $this->saldo_favor_; 
       $sStyleHidden_saldo_favor_ = '';
       if (isset($sCheckRead_saldo_favor_))
       {
           unset($sCheckRead_saldo_favor_);
       }
       if (isset($this->nmgp_cmp_readonly['saldo_favor_']))
       {
           $sCheckRead_saldo_favor_ = $this->nmgp_cmp_readonly['saldo_favor_'];
       }
       if (isset($this->nmgp_cmp_hidden['saldo_favor_']) && $this->nmgp_cmp_hidden['saldo_favor_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['saldo_favor_']);
           $sStyleHidden_saldo_favor_ = 'display: none;';
       }
       $bTestReadOnly_saldo_favor_ = true;
       $sStyleReadLab_saldo_favor_ = 'display: none;';
       $sStyleReadInp_saldo_favor_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["saldo_favor_"]) &&  $this->nmgp_cmp_readonly["saldo_favor_"] == "on"))
       {
           $bTestReadOnly_saldo_favor_ = false;
           unset($this->nmgp_cmp_readonly['saldo_favor_']);
           $sStyleReadLab_saldo_favor_ = '';
           $sStyleReadInp_saldo_favor_ = 'display: none;';
       }
       $this->cxcvalretfte_ = $this->form_vert_form_cuentasxcobrar[$sc_seq_vert]['cxcvalretfte_']; 
       $cxcvalretfte_ = $this->cxcvalretfte_; 
       $sStyleHidden_cxcvalretfte_ = '';
       if (isset($sCheckRead_cxcvalretfte_))
       {
           unset($sCheckRead_cxcvalretfte_);
       }
       if (isset($this->nmgp_cmp_readonly['cxcvalretfte_']))
       {
           $sCheckRead_cxcvalretfte_ = $this->nmgp_cmp_readonly['cxcvalretfte_'];
       }
       if (isset($this->nmgp_cmp_hidden['cxcvalretfte_']) && $this->nmgp_cmp_hidden['cxcvalretfte_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cxcvalretfte_']);
           $sStyleHidden_cxcvalretfte_ = 'display: none;';
       }
       $bTestReadOnly_cxcvalretfte_ = true;
       $sStyleReadLab_cxcvalretfte_ = 'display: none;';
       $sStyleReadInp_cxcvalretfte_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cxcvalretfte_"]) &&  $this->nmgp_cmp_readonly["cxcvalretfte_"] == "on"))
       {
           $bTestReadOnly_cxcvalretfte_ = false;
           unset($this->nmgp_cmp_readonly['cxcvalretfte_']);
           $sStyleReadLab_cxcvalretfte_ = '';
           $sStyleReadInp_cxcvalretfte_ = 'display: none;';
       }
       $this->cxcfecvence_ = $this->form_vert_form_cuentasxcobrar[$sc_seq_vert]['cxcfecvence_']; 
       $cxcfecvence_ = $this->cxcfecvence_; 
       $sStyleHidden_cxcfecvence_ = '';
       if (isset($sCheckRead_cxcfecvence_))
       {
           unset($sCheckRead_cxcfecvence_);
       }
       if (isset($this->nmgp_cmp_readonly['cxcfecvence_']))
       {
           $sCheckRead_cxcfecvence_ = $this->nmgp_cmp_readonly['cxcfecvence_'];
       }
       if (isset($this->nmgp_cmp_hidden['cxcfecvence_']) && $this->nmgp_cmp_hidden['cxcfecvence_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cxcfecvence_']);
           $sStyleHidden_cxcfecvence_ = 'display: none;';
       }
       $bTestReadOnly_cxcfecvence_ = true;
       $sStyleReadLab_cxcfecvence_ = 'display: none;';
       $sStyleReadInp_cxcfecvence_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cxcfecvence_"]) &&  $this->nmgp_cmp_readonly["cxcfecvence_"] == "on"))
       {
           $bTestReadOnly_cxcfecvence_ = false;
           unset($this->nmgp_cmp_readonly['cxcfecvence_']);
           $sStyleReadLab_cxcfecvence_ = '';
           $sStyleReadInp_cxcfecvence_ = 'display: none;';
       }
       $this->abono_ = $this->form_vert_form_cuentasxcobrar[$sc_seq_vert]['abono_']; 
       $abono_ = $this->abono_; 
       $sStyleHidden_abono_ = '';
       if (isset($sCheckRead_abono_))
       {
           unset($sCheckRead_abono_);
       }
       if (isset($this->nmgp_cmp_readonly['abono_']))
       {
           $sCheckRead_abono_ = $this->nmgp_cmp_readonly['abono_'];
       }
       if (isset($this->nmgp_cmp_hidden['abono_']) && $this->nmgp_cmp_hidden['abono_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['abono_']);
           $sStyleHidden_abono_ = 'display: none;';
       }
       $bTestReadOnly_abono_ = true;
       $sStyleReadLab_abono_ = 'display: none;';
       $sStyleReadInp_abono_ = '';
       if (isset($this->nmgp_cmp_readonly['abono_']) && $this->nmgp_cmp_readonly['abono_'] == 'on')
       {
           $bTestReadOnly_abono_ = false;
           unset($this->nmgp_cmp_readonly['abono_']);
           $sStyleReadLab_abono_ = '';
           $sStyleReadInp_abono_ = 'display: none;';
       }
       $this->emiruc_ = $this->form_vert_form_cuentasxcobrar[$sc_seq_vert]['emiruc_']; 
       $emiruc_ = $this->emiruc_; 
       if (!isset($this->nmgp_cmp_hidden['emiruc_']))
       {
           $this->nmgp_cmp_hidden['emiruc_'] = 'off';
       }
       $sStyleHidden_emiruc_ = '';
       if (isset($sCheckRead_emiruc_))
       {
           unset($sCheckRead_emiruc_);
       }
       if (isset($this->nmgp_cmp_readonly['emiruc_']))
       {
           $sCheckRead_emiruc_ = $this->nmgp_cmp_readonly['emiruc_'];
       }
       if (isset($this->nmgp_cmp_hidden['emiruc_']) && $this->nmgp_cmp_hidden['emiruc_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['emiruc_']);
           $sStyleHidden_emiruc_ = 'display: none;';
       }
       $bTestReadOnly_emiruc_ = true;
       $sStyleReadLab_emiruc_ = 'display: none;';
       $sStyleReadInp_emiruc_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["emiruc_"]) &&  $this->nmgp_cmp_readonly["emiruc_"] == "on"))
       {
           $bTestReadOnly_emiruc_ = false;
           unset($this->nmgp_cmp_readonly['emiruc_']);
           $sStyleReadLab_emiruc_ = '';
           $sStyleReadInp_emiruc_ = 'display: none;';
       }

       $nm_cor_fun_vert = ($nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>"  style="display: none;"> <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\""; if (in_array($sc_seq_vert, $sc_check_excl)) { echo " checked";} ?> onclick="if (this.checked) {sc_quant_excl++; } else {sc_quant_excl--; }" class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
   <?php if (!$this->Embutida_form && $this->nmgp_opcao == "novo") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\"" ; if (in_array($sc_seq_vert, $sc_check_incl) || !empty($this->nm_todas_criticas)) { echo " checked ";} ?> class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
   <?php if ($this->Embutida_form) {?>
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_actions<?php echo $sc_seq_vert; ?>" NOWRAP> <?php if ($this->nmgp_opcao != "novo") {
    if ($this->nmgp_botoes['delete'] == "off") {
        $sDisplayDelete = 'display: none';
    }
    else {
        $sDisplayDelete = '';
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayDelete. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php
if ($this->nmgp_opcao != "novo") {
    if ($this->nmgp_botoes['update'] == "off") {
        $sDisplayUpdate = 'display: none';
    }
    else {
        $sDisplayUpdate = '';
    }
    if ($this->Embutida_ronly) {
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayUpdate. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
        $sButDisp = 'display: none';
    }
    else
    {
        $sButDisp = $sDisplayUpdate;
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "" . $sButDisp. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
}
?>

<?php if ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_opcao == "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_incluir", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "sc_ins_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php if ($this->nmgp_botoes['delete'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($Line_Add && $this->Embutida_ronly) {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($this->nmgp_botoes['update'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php }?>
<?php if ($this->nmgp_botoes['insert'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_cuentasxcobrar_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_cuentasxcobrar_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_cuentasxcobrar_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_cuentasxcobrar_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_cuentasxcobrar_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_cuentasxcobrar_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['cxctipodoc_']) && $this->nmgp_cmp_hidden['cxctipodoc_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cxctipodoc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cxctipodoc_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cxctipodoc__line" id="hidden_field_data_cxctipodoc_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cxctipodoc_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cxctipodoc__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cxctipodoc_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["cxctipodoc_"]) &&  $this->nmgp_cmp_readonly["cxctipodoc_"] == "on")) { 

 ?>
<input type="hidden" name="cxctipodoc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cxctipodoc_) . "\"><span id=\"id_ajax_label_cxctipodoc_" . $sc_seq_vert . "\">" . $cxctipodoc_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_cxctipodoc_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-cxctipodoc_<?php echo $sc_seq_vert ?> css_cxctipodoc__line" style="<?php echo $sStyleReadLab_cxctipodoc_; ?>"><?php echo $this->form_format_readonly("cxctipodoc_", $this->form_encode_input($this->cxctipodoc_)); ?></span><span id="id_read_off_cxctipodoc_<?php echo $sc_seq_vert ?>" class="css_read_off_cxctipodoc_" style="white-space: nowrap;<?php echo $sStyleReadInp_cxctipodoc_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_cxctipodoc__obj" style="" id="id_sc_field_cxctipodoc_<?php echo $sc_seq_vert ?>" type=text name="cxctipodoc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cxctipodoc_) ?>"
 size=1 maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cxctipodoc_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cxctipodoc_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cxcnumdoc_']) && $this->nmgp_cmp_hidden['cxcnumdoc_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cxcnumdoc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cxcnumdoc_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cxcnumdoc__line" id="hidden_field_data_cxcnumdoc_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cxcnumdoc_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cxcnumdoc__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cxcnumdoc_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["cxcnumdoc_"]) &&  $this->nmgp_cmp_readonly["cxcnumdoc_"] == "on")) { 

 ?>
<input type="hidden" name="cxcnumdoc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cxcnumdoc_) . "\"><span id=\"id_ajax_label_cxcnumdoc_" . $sc_seq_vert . "\">" . $cxcnumdoc_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_cxcnumdoc_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-cxcnumdoc_<?php echo $sc_seq_vert ?> css_cxcnumdoc__line" style="<?php echo $sStyleReadLab_cxcnumdoc_; ?>"><?php echo $this->form_format_readonly("cxcnumdoc_", $this->form_encode_input($this->cxcnumdoc_)); ?></span><span id="id_read_off_cxcnumdoc_<?php echo $sc_seq_vert ?>" class="css_read_off_cxcnumdoc_" style="white-space: nowrap;<?php echo $sStyleReadInp_cxcnumdoc_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_cxcnumdoc__obj" style="" id="id_sc_field_cxcnumdoc_<?php echo $sc_seq_vert ?>" type=text name="cxcnumdoc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cxcnumdoc_) ?>"
 size=11 maxlength=11 alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cxcnumdoc_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cxcnumdoc_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cxcvalini_']) && $this->nmgp_cmp_hidden['cxcvalini_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cxcvalini_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cxcvalini_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cxcvalini__line" id="hidden_field_data_cxcvalini_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cxcvalini_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cxcvalini__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cxcvalini_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["cxcvalini_"]) &&  $this->nmgp_cmp_readonly["cxcvalini_"] == "on")) { 

 ?>
<input type="hidden" name="cxcvalini_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cxcvalini_) . "\"><span id=\"id_ajax_label_cxcvalini_" . $sc_seq_vert . "\">" . $cxcvalini_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_cxcvalini_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-cxcvalini_<?php echo $sc_seq_vert ?> css_cxcvalini__line" style="<?php echo $sStyleReadLab_cxcvalini_; ?>"><?php echo $this->form_format_readonly("cxcvalini_", $this->form_encode_input($this->cxcvalini_)); ?></span><span id="id_read_off_cxcvalini_<?php echo $sc_seq_vert ?>" class="css_read_off_cxcvalini_" style="white-space: nowrap;<?php echo $sStyleReadInp_cxcvalini_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_cxcvalini__obj" style="" id="id_sc_field_cxcvalini_<?php echo $sc_seq_vert ?>" type=text name="cxcvalini_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cxcvalini_) ?>"
 size=12 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['cxcvalini_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['cxcvalini_']['format_pos'] || 3 == $this->field_config['cxcvalini_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cxcvalini_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cxcvalini_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cxcvalini_']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cxcvalini_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cxcvalini_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cxcvalini_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cxcvalpen_']) && $this->nmgp_cmp_hidden['cxcvalpen_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cxcvalpen_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cxcvalpen_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cxcvalpen__line" id="hidden_field_data_cxcvalpen_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cxcvalpen_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cxcvalpen__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cxcvalpen_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["cxcvalpen_"]) &&  $this->nmgp_cmp_readonly["cxcvalpen_"] == "on")) { 

 ?>
<input type="hidden" name="cxcvalpen_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cxcvalpen_) . "\"><span id=\"id_ajax_label_cxcvalpen_" . $sc_seq_vert . "\">" . $cxcvalpen_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_cxcvalpen_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-cxcvalpen_<?php echo $sc_seq_vert ?> css_cxcvalpen__line" style="<?php echo $sStyleReadLab_cxcvalpen_; ?>"><?php echo $this->form_format_readonly("cxcvalpen_", $this->form_encode_input($this->cxcvalpen_)); ?></span><span id="id_read_off_cxcvalpen_<?php echo $sc_seq_vert ?>" class="css_read_off_cxcvalpen_" style="white-space: nowrap;<?php echo $sStyleReadInp_cxcvalpen_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_cxcvalpen__obj" style="" id="id_sc_field_cxcvalpen_<?php echo $sc_seq_vert ?>" type=text name="cxcvalpen_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cxcvalpen_) ?>"
 size=12 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['cxcvalpen_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['cxcvalpen_']['format_pos'] || 3 == $this->field_config['cxcvalpen_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cxcvalpen_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cxcvalpen_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cxcvalpen_']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cxcvalpen_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cxcvalpen_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cxcvalpen_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['saldo_favor_']) && $this->nmgp_cmp_hidden['saldo_favor_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="saldo_favor_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($saldo_favor_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_saldo_favor__line" id="hidden_field_data_saldo_favor_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_saldo_favor_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_saldo_favor__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_saldo_favor_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["saldo_favor_"]) &&  $this->nmgp_cmp_readonly["saldo_favor_"] == "on")) { 

 ?>
<input type="hidden" name="saldo_favor_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($saldo_favor_) . "\"><span id=\"id_ajax_label_saldo_favor_" . $sc_seq_vert . "\">" . $saldo_favor_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_saldo_favor_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-saldo_favor_<?php echo $sc_seq_vert ?> css_saldo_favor__line" style="<?php echo $sStyleReadLab_saldo_favor_; ?>"><?php echo $this->form_format_readonly("saldo_favor_", $this->form_encode_input($this->saldo_favor_)); ?></span><span id="id_read_off_saldo_favor_<?php echo $sc_seq_vert ?>" class="css_read_off_saldo_favor_" style="white-space: nowrap;<?php echo $sStyleReadInp_saldo_favor_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_saldo_favor__obj" style="" id="id_sc_field_saldo_favor_<?php echo $sc_seq_vert ?>" type=text name="saldo_favor_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($saldo_favor_) ?>"
 size=10 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['saldo_favor_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['saldo_favor_']['format_pos'] || 3 == $this->field_config['saldo_favor_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['saldo_favor_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['saldo_favor_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['saldo_favor_']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['saldo_favor_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_saldo_favor_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_saldo_favor_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cxcvalretfte_']) && $this->nmgp_cmp_hidden['cxcvalretfte_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cxcvalretfte_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cxcvalretfte_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cxcvalretfte__line" id="hidden_field_data_cxcvalretfte_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cxcvalretfte_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cxcvalretfte__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cxcvalretfte_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["cxcvalretfte_"]) &&  $this->nmgp_cmp_readonly["cxcvalretfte_"] == "on")) { 

 ?>
<input type="hidden" name="cxcvalretfte_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cxcvalretfte_) . "\"><span id=\"id_ajax_label_cxcvalretfte_" . $sc_seq_vert . "\">" . $cxcvalretfte_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_cxcvalretfte_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-cxcvalretfte_<?php echo $sc_seq_vert ?> css_cxcvalretfte__line" style="<?php echo $sStyleReadLab_cxcvalretfte_; ?>"><?php echo $this->form_format_readonly("cxcvalretfte_", $this->form_encode_input($this->cxcvalretfte_)); ?></span><span id="id_read_off_cxcvalretfte_<?php echo $sc_seq_vert ?>" class="css_read_off_cxcvalretfte_" style="white-space: nowrap;<?php echo $sStyleReadInp_cxcvalretfte_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_cxcvalretfte__obj" style="" id="id_sc_field_cxcvalretfte_<?php echo $sc_seq_vert ?>" type=text name="cxcvalretfte_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cxcvalretfte_) ?>"
 size=12 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['cxcvalretfte_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['cxcvalretfte_']['format_pos'] || 3 == $this->field_config['cxcvalretfte_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cxcvalretfte_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cxcvalretfte_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cxcvalretfte_']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cxcvalretfte_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cxcvalretfte_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cxcvalretfte_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cxcfecvence_']) && $this->nmgp_cmp_hidden['cxcfecvence_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cxcfecvence_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cxcfecvence_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cxcfecvence__line" id="hidden_field_data_cxcfecvence_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cxcfecvence_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cxcfecvence__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cxcfecvence_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["cxcfecvence_"]) &&  $this->nmgp_cmp_readonly["cxcfecvence_"] == "on")) { 

 ?>
<input type="hidden" name="cxcfecvence_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cxcfecvence_) . "\"><span id=\"id_ajax_label_cxcfecvence_" . $sc_seq_vert . "\">" . $cxcfecvence_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_cxcfecvence_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-cxcfecvence_<?php echo $sc_seq_vert ?> css_cxcfecvence__line" style="<?php echo $sStyleReadLab_cxcfecvence_; ?>"><?php echo $this->form_format_readonly("cxcfecvence_", $this->form_encode_input($cxcfecvence_)); ?></span><span id="id_read_off_cxcfecvence_<?php echo $sc_seq_vert ?>" class="css_read_off_cxcfecvence_" style="white-space: nowrap;<?php echo $sStyleReadInp_cxcfecvence_; ?>"><?php
$tmp_form_data = $this->field_config['cxcfecvence_']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOddMult css_cxcfecvence__obj" style="" id="id_sc_field_cxcfecvence_<?php echo $sc_seq_vert ?>" type=text name="cxcfecvence_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cxcfecvence_) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['cxcfecvence_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['cxcfecvence_']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cxcfecvence_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cxcfecvence_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['abono_']) && $this->nmgp_cmp_hidden['abono_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="abono_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($abono_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_abono__line" id="hidden_field_data_abono_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_abono_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOddMult css_abono__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_abono_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["abono_"]) &&  $this->nmgp_cmp_readonly["abono_"] == "on") { 

 ?>
<input type="hidden" name="abono_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($abono_) . "\">" . $abono_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_abono_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-abono_<?php echo $sc_seq_vert ?> css_abono__line" style="<?php echo $sStyleReadLab_abono_; ?>"><?php echo $this->form_format_readonly("abono_", $this->form_encode_input($this->abono_)); ?></span><span id="id_read_off_abono_<?php echo $sc_seq_vert ?>" class="css_read_off_abono_" style="white-space: nowrap;<?php echo $sStyleReadInp_abono_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_abono__obj" style="" id="id_sc_field_abono_<?php echo $sc_seq_vert ?>" type=text name="abono_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($abono_) ?>"
 size=10 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['abono_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['abono_']['format_pos'] || 3 == $this->field_config['abono_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['abono_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['abono_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['abono_']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['abono_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_abono_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_abono_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['emiruc_']) && $this->nmgp_cmp_hidden['emiruc_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="emiruc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->emiruc_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_emiruc__line" id="hidden_field_data_emiruc_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_emiruc_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_emiruc__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_emiruc_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["emiruc_"]) &&  $this->nmgp_cmp_readonly["emiruc_"] == "on")) { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['Lookup_emiruc_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['Lookup_emiruc_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['Lookup_emiruc_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['Lookup_emiruc_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['Lookup_emiruc_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['Lookup_emiruc_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['Lookup_emiruc_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['Lookup_emiruc_'] = array(); 
    }

   $old_value_cxcvalini_ = $this->cxcvalini_;
   $old_value_cxcvalpen_ = $this->cxcvalpen_;
   $old_value_saldo_favor_ = $this->saldo_favor_;
   $old_value_cxcvalretfte_ = $this->cxcvalretfte_;
   $old_value_cxcfecvence_ = $this->cxcfecvence_;
   $old_value_abono_ = $this->abono_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_cxcvalini_ = $this->cxcvalini_;
   $unformatted_value_cxcvalpen_ = $this->cxcvalpen_;
   $unformatted_value_saldo_favor_ = $this->saldo_favor_;
   $unformatted_value_cxcvalretfte_ = $this->cxcvalretfte_;
   $unformatted_value_cxcfecvence_ = $this->cxcfecvence_;
   $unformatted_value_abono_ = $this->abono_;

   $nm_comando = "SELECT emiruc, emiruc FROM fac_emisores ORDER BY emiruc";

   $this->cxcvalini_ = $old_value_cxcvalini_;
   $this->cxcvalpen_ = $old_value_cxcvalpen_;
   $this->saldo_favor_ = $old_value_saldo_favor_;
   $this->cxcvalretfte_ = $old_value_cxcvalretfte_;
   $this->cxcfecvence_ = $old_value_cxcfecvence_;
   $this->abono_ = $old_value_abono_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['Lookup_emiruc_'][] = $rs->fields[0];
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
   $x = 0; 
   $emiruc__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->emiruc__1))
          {
              foreach ($this->emiruc__1 as $tmp_emiruc_)
              {
                  if (trim($tmp_emiruc_) === trim($cadaselect[1])) { $emiruc__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->emiruc_) === trim($cadaselect[1])) { $emiruc__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="emiruc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($emiruc_) . "\"><span id=\"id_ajax_label_emiruc_" . $sc_seq_vert . "\">" . $emiruc__look . "</span>"; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_emiruc_();
   $x = 0 ; 
   $emiruc__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->emiruc__1))
          {
              foreach ($this->emiruc__1 as $tmp_emiruc_)
              {
                  if (trim($tmp_emiruc_) === trim($cadaselect[1])) { $emiruc__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->emiruc_) === trim($cadaselect[1])) { $emiruc__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($emiruc__look))
          {
              $emiruc__look = $this->emiruc_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_emiruc_" . $sc_seq_vert . "\" class=\"css_emiruc__line\" style=\"" .  $sStyleReadLab_emiruc_ . "\">" . $this->form_format_readonly("emiruc_", $this->form_encode_input($emiruc__look)) . "</span><span id=\"id_read_off_emiruc_" . $sc_seq_vert . "\" class=\"css_read_off_emiruc_\" style=\"white-space: nowrap; " . $sStyleReadInp_emiruc_ . "\">";
   echo " <span id=\"idAjaxSelect_emiruc_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_emiruc__obj\" style=\"\" id=\"id_sc_field_emiruc_" . $sc_seq_vert . "\" name=\"emiruc_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->emiruc_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->emiruc_)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emiruc_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emiruc_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_cxctipodoc_))
       {
           $this->nmgp_cmp_readonly['cxctipodoc_'] = $sCheckRead_cxctipodoc_;
       }
       if ('display: none;' == $sStyleHidden_cxctipodoc_)
       {
           $this->nmgp_cmp_hidden['cxctipodoc_'] = 'off';
       }
       if (isset($sCheckRead_cxcnumdoc_))
       {
           $this->nmgp_cmp_readonly['cxcnumdoc_'] = $sCheckRead_cxcnumdoc_;
       }
       if ('display: none;' == $sStyleHidden_cxcnumdoc_)
       {
           $this->nmgp_cmp_hidden['cxcnumdoc_'] = 'off';
       }
       if (isset($sCheckRead_cxcvalini_))
       {
           $this->nmgp_cmp_readonly['cxcvalini_'] = $sCheckRead_cxcvalini_;
       }
       if ('display: none;' == $sStyleHidden_cxcvalini_)
       {
           $this->nmgp_cmp_hidden['cxcvalini_'] = 'off';
       }
       if (isset($sCheckRead_cxcvalpen_))
       {
           $this->nmgp_cmp_readonly['cxcvalpen_'] = $sCheckRead_cxcvalpen_;
       }
       if ('display: none;' == $sStyleHidden_cxcvalpen_)
       {
           $this->nmgp_cmp_hidden['cxcvalpen_'] = 'off';
       }
       if (isset($sCheckRead_saldo_favor_))
       {
           $this->nmgp_cmp_readonly['saldo_favor_'] = $sCheckRead_saldo_favor_;
       }
       if ('display: none;' == $sStyleHidden_saldo_favor_)
       {
           $this->nmgp_cmp_hidden['saldo_favor_'] = 'off';
       }
       if (isset($sCheckRead_cxcvalretfte_))
       {
           $this->nmgp_cmp_readonly['cxcvalretfte_'] = $sCheckRead_cxcvalretfte_;
       }
       if ('display: none;' == $sStyleHidden_cxcvalretfte_)
       {
           $this->nmgp_cmp_hidden['cxcvalretfte_'] = 'off';
       }
       if (isset($sCheckRead_cxcfecvence_))
       {
           $this->nmgp_cmp_readonly['cxcfecvence_'] = $sCheckRead_cxcfecvence_;
       }
       if ('display: none;' == $sStyleHidden_cxcfecvence_)
       {
           $this->nmgp_cmp_hidden['cxcfecvence_'] = 'off';
       }
       if (isset($sCheckRead_abono_))
       {
           $this->nmgp_cmp_readonly['abono_'] = $sCheckRead_abono_;
       }
       if ('display: none;' == $sStyleHidden_abono_)
       {
           $this->nmgp_cmp_hidden['abono_'] = 'off';
       }
       if (isset($sCheckRead_emiruc_))
       {
           $this->nmgp_cmp_readonly['emiruc_'] = $sCheckRead_emiruc_;
       }
       if ('display: none;' == $sStyleHidden_emiruc_)
       {
           $this->nmgp_cmp_hidden['emiruc_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_cuentasxcobrar = $guarda_form_vert_form_cuentasxcobrar;
   } 
   if ($Table_refresh) 
   { 
       $this->Table_refresh = ob_get_contents();
       ob_end_clean();
   } 
}

function Form_Fim() 
{
   global $sc_seq_vert, $opcao_botoes, $nm_url_saida; 
?>   
</TABLE></div><!-- bloco_f -->
 </div>
<?php
$iContrVert = $this->Embutida_form ? $sc_seq_vert + 1 : $sc_seq_vert + 1;
if ($sc_seq_vert < $this->sc_max_reg)
{
    echo " <script type=\"text/javascript\">";
    echo "    bRefreshTable = true;";
    echo "</script>";
}
?>
<input type="hidden" name="sc_contr_vert" value="<?php echo $this->form_encode_input($iContrVert); ?>">
<?php
    $sEmptyStyle = 0 == $sc_seq_vert ? '' : 'display: none;';
?>
</td></tr>
<tr id="sc-ui-empty-form" style="<?php echo $sEmptyStyle; ?>"><td class="scFormPageText" style="padding: 10px; text-align: center; font-weight: bold">
<?php echo $this->Ini->Nm_lang['lang_errm_empt'];
?>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "birpara", "scBtnFn_sys_GridPermiteSeq()", "scBtnFn_sys_GridPermiteSeq()", "brec_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['qtline'] == "on")
      {
?> 
          <span class="<?php echo $this->css_css_toolbar_obj ?>" style="border: 0px;"><?php echo $this->Ini->Nm_lang['lang_btns_rows'] ?></span>
          <select class="scFormToolbarInput" name="nmgp_quant_linhas_b" onchange="document.F7.nmgp_max_line.value = this.value; document.F7.submit();"> 
<?php 
              $obj_sel = ($this->sc_max_reg == '10') ? " selected" : "";
?> 
           <option value="10" <?php echo $obj_sel ?>>10</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '20') ? " selected" : "";
?> 
           <option value="20" <?php echo $obj_sel ?>>20</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '50') ? " selected" : "";
?> 
           <option value="50" <?php echo $obj_sel ?>>50</option>
          </select>
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8592;)", "sc-unique-btn-11", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8592;)", "sc-unique-btn-12", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8594;)", "sc-unique-btn-13", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8594;)", "sc-unique-btn-14", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>
<script>
 var iAjaxNewLine = <?php echo $sc_seq_vert; ?>;
<?php
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['run_modal'])
{
?>
 for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) {
  scJQElementsAdd(iLine);
 }
<?php
}
else
{
?>
 $(function() {
  setTimeout(function() { for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) { scJQElementsAdd(iLine); } }, 250);
 });
<?php
}
?>
</script>
<div id="new_line_dummy" style="display: none">
</div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
   </td></tr></table>
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['masterValue']);
?>
}
<?php
    }
}
?>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_cuentasxcobrar");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_cuentasxcobrar");
 parent.scAjaxDetailHeight("form_cuentasxcobrar", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_cuentasxcobrar", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_cuentasxcobrar", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
    }
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
    $isToast   = isset($this->NM_ajax_info['displayMsgToast']) && $this->NM_ajax_info['displayMsgToast'] ? 'true' : 'false';
    $toastType = $isToast && isset($this->NM_ajax_info['displayMsgToastType']) ? $this->NM_ajax_info['displayMsgToastType'] : '';
?>
<script type="text/javascript">
_scAjaxShowMessage({title: scMsgDefTitle, message: "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: <?php echo $isToast ?>, toastPos: "", type: "<?php echo $toastType ?>"});
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script type='text/javascript'>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['sc_modal'])
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
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<?php
if ($this->nmgp_form_empty) {
?>
<script type="text/javascript">
scAjax_displayEmptyForm();
</script>
<?php
}
?>
<script type="text/javascript">
	function scBtnFn_sys_format_inc() {
		if ($("#sc_b_new_t.sc-unique-btn-1").length && $("#sc_b_new_t.sc-unique-btn-1").is(":visible")) {
			do_ajax_form_cuentasxcobrar_add_new_line(); return false;
			 return;
		}
		if ($("#sc_b_new_t.sc-unique-btn-2").length && $("#sc_b_new_t.sc-unique-btn-2").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-3").length && $("#sc_b_ins_t.sc-unique-btn-3").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-4").length && $("#sc_b_sai_t.sc-unique-btn-4").is(":visible")) {
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-5").length && $("#sc_b_upd_t.sc-unique-btn-5").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_t").length && $("#sc_b_hlp_t").is(":visible")) {
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_t.sc-unique-btn-6").length && $("#sc_b_sai_t.sc-unique-btn-6").is(":visible")) {
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-8").length && $("#sc_b_sai_t.sc-unique-btn-8").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-9").length && $("#sc_b_sai_t.sc-unique-btn-9").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-10").length && $("#sc_b_sai_t.sc-unique-btn-10").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
	}
	function scBtnFn_sys_GridPermiteSeq() {
		if ($("#brec_b").length && $("#brec_b").is(":visible")) {
			nm_navpage(document.F1.nmgp_rec_b.value, 'P'); document.F1.nmgp_rec_b.value = '';
			 return;
		}
	}
	function scBtnFn_sys_format_ini() {
		if ($("#sc_b_ini_b.sc-unique-btn-11").length && $("#sc_b_ini_b.sc-unique-btn-11").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-12").length && $("#sc_b_ret_b.sc-unique-btn-12").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-13").length && $("#sc_b_avc_b.sc-unique-btn-13").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-14").length && $("#sc_b_fim_b.sc-unique-btn-14").is(":visible")) {
			nm_move ('final');
			 return;
		}
	}
</script>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cuentasxcobrar']['buttonStatus'] = $this->nmgp_botoes;
?>
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
</script>
</body> 
</html> 
<?php 
 } 
} 
?> 
