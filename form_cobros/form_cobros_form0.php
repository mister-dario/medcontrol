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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " cobro"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " cobro"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
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
.css_read_off_cobfecha button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_cobfecanula button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_pdf']))
 {
 ?>
<?php
    if ((isset($this->nmgp_tipo_pdf) && $this->nmgp_tipo_pdf == "pb") || (isset($this->nmgp_cor_print) && $this->nmgp_cor_print == "PB"))
    {
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['prt_view'] && $this->Ini->Export_img_zip) 
        {
?>
 <style type="text/css">
<?php
           $NM_css = file($this->Ini->root . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_form_bw.css");
           foreach ($NM_css as $cada_css)
           {
               echo $cada_css;
           }
           $NM_css = file($this->Ini->root . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_form_bw" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css");
           foreach ($NM_css as $cada_css)
           {
               echo $cada_css;
           }
?>
 </style>
<?php
        }
        else
        {
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form_bw.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form_bw<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
        }
    }
    else
    {
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['prt_view'] && $this->Ini->Export_img_zip) 
        {
?>
 <style type="text/css">
<?php
           $NM_css = file($this->Ini->root . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_form.css");
           foreach ($NM_css as $cada_css)
           {
               echo $cada_css;
           }
           $NM_css = file($this->Ini->root . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css");
           foreach ($NM_css as $cada_css)
           {
               echo $cada_css;
           }
?>
 </style>
<?php
        }
        else
        {
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
        }
    }
?>
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_cobros/form_cobros_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_cobros_sajax_js.php");
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
<?php

include_once('form_cobros_jquery.php');

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

  scJQElementsAdd('');

  scJQGeneralAdd();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
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
    if ("hidden_bloco_1" == block_id) {
      scAjaxDetailHeight("grid_detalle_cobro", $($("#nmsc_iframe_liga_grid_detalle_cobro")[0].contentWindow.document).innerHeight());
    }
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['recarga'];
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
 include_once("form_cobros_js0.php");
?>
<script type="text/javascript"> 
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
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['insert_validation']; ?>">
<?php
}
?>
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
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_cobros'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_cobros'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0 >
 <tr>
  <td>
  <div class="scFormBorder" style="<?php echo (isset($remove_border) ? $remove_border : ''); ?>">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php echo "COBRO " . $_SESSION['v_numerocob'] . " - " . $_SESSION['v_nomemisor'] . "" ?></div>
    <div class="scFormHeaderFont" style="float: right;"></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['pdf_view'])
{
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe'] != "R")
{
    $NM_btn = false;
        $sCondStyle = ($this->nmgp_botoes['pdf'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bpdf", "scBtnFn_sys_format_pdf()", "scBtnFn_sys_format_pdf()", "sc_b_pdf_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['ANULAR'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "anular", "scBtnFn_ANULAR()", "scBtnFn_ANULAR()", "sc_ANULAR_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
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
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
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
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['fclnumero']))
           {
               $this->nmgp_cmp_readonly['fclnumero'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cobfecha']))
           {
               $this->nmgp_cmp_readonly['cobfecha'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cobvalefec']))
           {
               $this->nmgp_cmp_readonly['cobvalefec'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cobvalcheq']))
           {
               $this->nmgp_cmp_readonly['cobvalcheq'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cobvaltarjcred']))
           {
               $this->nmgp_cmp_readonly['cobvaltarjcred'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cobvaltransf']))
           {
               $this->nmgp_cmp_readonly['cobvaltransf'] = 'on';
           }
?>


   <?php
   if (!isset($this->nm_new_label['fclnumero']))
   {
       $this->nm_new_label['fclnumero'] = "PACIENTE";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclnumero = $this->fclnumero;
   $sStyleHidden_fclnumero = '';
   if (isset($this->nmgp_cmp_hidden['fclnumero']) && $this->nmgp_cmp_hidden['fclnumero'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclnumero']);
       $sStyleHidden_fclnumero = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclnumero = 'display: none;';
   $sStyleReadInp_fclnumero = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["fclnumero"]) &&  $this->nmgp_cmp_readonly["fclnumero"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclnumero']);
       $sStyleReadLab_fclnumero = '';
       $sStyleReadInp_fclnumero = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclnumero']) && $this->nmgp_cmp_hidden['fclnumero'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fclnumero" value="<?php echo $this->form_encode_input($this->fclnumero) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclnumero_line" id="hidden_field_data_fclnumero" style="<?php echo $sStyleHidden_fclnumero; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclnumero_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclnumero_label" style=""><span id="id_label_fclnumero"><?php echo $this->nm_new_label['fclnumero']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["fclnumero"]) &&  $this->nmgp_cmp_readonly["fclnumero"] == "on")) { 
 
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
   $x = 0; 
   $fclnumero_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->fclnumero_1))
          {
              foreach ($this->fclnumero_1 as $tmp_fclnumero)
              {
                  if (trim($tmp_fclnumero) === trim($cadaselect[1])) { $fclnumero_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->fclnumero) === trim($cadaselect[1])) { $fclnumero_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="fclnumero" value="<?php echo $this->form_encode_input($fclnumero) . "\"><span id=\"id_ajax_label_fclnumero\">" . $fclnumero_look . "</span>"; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_fclnumero();
   $x = 0 ; 
   $fclnumero_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->fclnumero_1))
          {
              foreach ($this->fclnumero_1 as $tmp_fclnumero)
              {
                  if (trim($tmp_fclnumero) === trim($cadaselect[1])) { $fclnumero_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->fclnumero) === trim($cadaselect[1])) { $fclnumero_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($fclnumero_look))
          {
              $fclnumero_look = $this->fclnumero;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_fclnumero\" class=\"css_fclnumero_line\" style=\"" .  $sStyleReadLab_fclnumero . "\">" . $this->form_format_readonly("fclnumero", $this->form_encode_input($fclnumero_look)) . "</span><span id=\"id_read_off_fclnumero\" class=\"css_read_off_fclnumero\" style=\"white-space: nowrap; " . $sStyleReadInp_fclnumero . "\">";
   echo " <span id=\"idAjaxSelect_fclnumero\"><select class=\"sc-js-input scFormObjectOdd css_fclnumero_obj\" style=\"\" id=\"id_sc_field_fclnumero\" name=\"fclnumero\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->fclnumero) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->fclnumero)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclnumero_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclnumero_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cobfecha']))
    {
        $this->nm_new_label['cobfecha'] = "FECHA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cobfecha = $this->cobfecha;
   $sStyleHidden_cobfecha = '';
   if (isset($this->nmgp_cmp_hidden['cobfecha']) && $this->nmgp_cmp_hidden['cobfecha'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cobfecha']);
       $sStyleHidden_cobfecha = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cobfecha = 'display: none;';
   $sStyleReadInp_cobfecha = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cobfecha"]) &&  $this->nmgp_cmp_readonly["cobfecha"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cobfecha']);
       $sStyleReadLab_cobfecha = '';
       $sStyleReadInp_cobfecha = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cobfecha']) && $this->nmgp_cmp_hidden['cobfecha'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cobfecha" value="<?php echo $this->form_encode_input($cobfecha) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cobfecha_line" id="hidden_field_data_cobfecha" style="<?php echo $sStyleHidden_cobfecha; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cobfecha_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cobfecha_label" style=""><span id="id_label_cobfecha"><?php echo $this->nm_new_label['cobfecha']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["cobfecha"]) &&  $this->nmgp_cmp_readonly["cobfecha"] == "on")) { 

 ?>
<input type="hidden" name="cobfecha" value="<?php echo $this->form_encode_input($cobfecha) . "\"><span id=\"id_ajax_label_cobfecha\">" . $cobfecha . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_cobfecha" class="sc-ui-readonly-cobfecha css_cobfecha_line" style="<?php echo $sStyleReadLab_cobfecha; ?>"><?php echo $this->form_format_readonly("cobfecha", $this->form_encode_input($cobfecha)); ?></span><span id="id_read_off_cobfecha" class="css_read_off_cobfecha" style="white-space: nowrap;<?php echo $sStyleReadInp_cobfecha; ?>"><?php
$tmp_form_data = $this->field_config['cobfecha']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_cobfecha_obj" style="" id="id_sc_field_cobfecha" type=text name="cobfecha" value="<?php echo $this->form_encode_input($cobfecha) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['cobfecha']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['cobfecha']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cobfecha_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cobfecha_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cobvalefec']))
    {
        $this->nm_new_label['cobvalefec'] = "VALOR EFECTIVO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cobvalefec = $this->cobvalefec;
   $sStyleHidden_cobvalefec = '';
   if (isset($this->nmgp_cmp_hidden['cobvalefec']) && $this->nmgp_cmp_hidden['cobvalefec'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cobvalefec']);
       $sStyleHidden_cobvalefec = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cobvalefec = 'display: none;';
   $sStyleReadInp_cobvalefec = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cobvalefec"]) &&  $this->nmgp_cmp_readonly["cobvalefec"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cobvalefec']);
       $sStyleReadLab_cobvalefec = '';
       $sStyleReadInp_cobvalefec = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cobvalefec']) && $this->nmgp_cmp_hidden['cobvalefec'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cobvalefec" value="<?php echo $this->form_encode_input($cobvalefec) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cobvalefec_line" id="hidden_field_data_cobvalefec" style="<?php echo $sStyleHidden_cobvalefec; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cobvalefec_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cobvalefec_label" style=""><span id="id_label_cobvalefec"><?php echo $this->nm_new_label['cobvalefec']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["cobvalefec"]) &&  $this->nmgp_cmp_readonly["cobvalefec"] == "on")) { 

 ?>
<input type="hidden" name="cobvalefec" value="<?php echo $this->form_encode_input($cobvalefec) . "\"><span id=\"id_ajax_label_cobvalefec\">" . $cobvalefec . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_cobvalefec" class="sc-ui-readonly-cobvalefec css_cobvalefec_line" style="<?php echo $sStyleReadLab_cobvalefec; ?>"><?php echo $this->form_format_readonly("cobvalefec", $this->form_encode_input($this->cobvalefec)); ?></span><span id="id_read_off_cobvalefec" class="css_read_off_cobvalefec" style="white-space: nowrap;<?php echo $sStyleReadInp_cobvalefec; ?>">
 <input class="sc-js-input scFormObjectOdd css_cobvalefec_obj" style="" id="id_sc_field_cobvalefec" type=text name="cobvalefec" value="<?php echo $this->form_encode_input($cobvalefec) ?>"
 size=12 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['cobvalefec']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['cobvalefec']['format_pos'] || 3 == $this->field_config['cobvalefec']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cobvalefec']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cobvalefec']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cobvalefec']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cobvalefec']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cobvalefec_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cobvalefec_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cobvalcheq']))
    {
        $this->nm_new_label['cobvalcheq'] = "VALOR CHEQUE";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cobvalcheq = $this->cobvalcheq;
   $sStyleHidden_cobvalcheq = '';
   if (isset($this->nmgp_cmp_hidden['cobvalcheq']) && $this->nmgp_cmp_hidden['cobvalcheq'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cobvalcheq']);
       $sStyleHidden_cobvalcheq = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cobvalcheq = 'display: none;';
   $sStyleReadInp_cobvalcheq = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cobvalcheq"]) &&  $this->nmgp_cmp_readonly["cobvalcheq"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cobvalcheq']);
       $sStyleReadLab_cobvalcheq = '';
       $sStyleReadInp_cobvalcheq = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cobvalcheq']) && $this->nmgp_cmp_hidden['cobvalcheq'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cobvalcheq" value="<?php echo $this->form_encode_input($cobvalcheq) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cobvalcheq_line" id="hidden_field_data_cobvalcheq" style="<?php echo $sStyleHidden_cobvalcheq; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cobvalcheq_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cobvalcheq_label" style=""><span id="id_label_cobvalcheq"><?php echo $this->nm_new_label['cobvalcheq']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["cobvalcheq"]) &&  $this->nmgp_cmp_readonly["cobvalcheq"] == "on")) { 

 ?>
<input type="hidden" name="cobvalcheq" value="<?php echo $this->form_encode_input($cobvalcheq) . "\"><span id=\"id_ajax_label_cobvalcheq\">" . $cobvalcheq . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_cobvalcheq" class="sc-ui-readonly-cobvalcheq css_cobvalcheq_line" style="<?php echo $sStyleReadLab_cobvalcheq; ?>"><?php echo $this->form_format_readonly("cobvalcheq", $this->form_encode_input($this->cobvalcheq)); ?></span><span id="id_read_off_cobvalcheq" class="css_read_off_cobvalcheq" style="white-space: nowrap;<?php echo $sStyleReadInp_cobvalcheq; ?>">
 <input class="sc-js-input scFormObjectOdd css_cobvalcheq_obj" style="" id="id_sc_field_cobvalcheq" type=text name="cobvalcheq" value="<?php echo $this->form_encode_input($cobvalcheq) ?>"
 size=12 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['cobvalcheq']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['cobvalcheq']['format_pos'] || 3 == $this->field_config['cobvalcheq']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cobvalcheq']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cobvalcheq']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cobvalcheq']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cobvalcheq']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cobvalcheq_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cobvalcheq_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cobvaltarjcred']))
    {
        $this->nm_new_label['cobvaltarjcred'] = "VALOR TARJ. CR�DITO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cobvaltarjcred = $this->cobvaltarjcred;
   $sStyleHidden_cobvaltarjcred = '';
   if (isset($this->nmgp_cmp_hidden['cobvaltarjcred']) && $this->nmgp_cmp_hidden['cobvaltarjcred'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cobvaltarjcred']);
       $sStyleHidden_cobvaltarjcred = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cobvaltarjcred = 'display: none;';
   $sStyleReadInp_cobvaltarjcred = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cobvaltarjcred"]) &&  $this->nmgp_cmp_readonly["cobvaltarjcred"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cobvaltarjcred']);
       $sStyleReadLab_cobvaltarjcred = '';
       $sStyleReadInp_cobvaltarjcred = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cobvaltarjcred']) && $this->nmgp_cmp_hidden['cobvaltarjcred'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cobvaltarjcred" value="<?php echo $this->form_encode_input($cobvaltarjcred) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cobvaltarjcred_line" id="hidden_field_data_cobvaltarjcred" style="<?php echo $sStyleHidden_cobvaltarjcred; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cobvaltarjcred_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cobvaltarjcred_label" style=""><span id="id_label_cobvaltarjcred"><?php echo $this->nm_new_label['cobvaltarjcred']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["cobvaltarjcred"]) &&  $this->nmgp_cmp_readonly["cobvaltarjcred"] == "on")) { 

 ?>
<input type="hidden" name="cobvaltarjcred" value="<?php echo $this->form_encode_input($cobvaltarjcred) . "\"><span id=\"id_ajax_label_cobvaltarjcred\">" . $cobvaltarjcred . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_cobvaltarjcred" class="sc-ui-readonly-cobvaltarjcred css_cobvaltarjcred_line" style="<?php echo $sStyleReadLab_cobvaltarjcred; ?>"><?php echo $this->form_format_readonly("cobvaltarjcred", $this->form_encode_input($this->cobvaltarjcred)); ?></span><span id="id_read_off_cobvaltarjcred" class="css_read_off_cobvaltarjcred" style="white-space: nowrap;<?php echo $sStyleReadInp_cobvaltarjcred; ?>">
 <input class="sc-js-input scFormObjectOdd css_cobvaltarjcred_obj" style="" id="id_sc_field_cobvaltarjcred" type=text name="cobvaltarjcred" value="<?php echo $this->form_encode_input($cobvaltarjcred) ?>"
 size=12 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['cobvaltarjcred']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['cobvaltarjcred']['format_pos'] || 3 == $this->field_config['cobvaltarjcred']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cobvaltarjcred']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cobvaltarjcred']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cobvaltarjcred']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cobvaltarjcred']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cobvaltarjcred_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cobvaltarjcred_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_fclnumero_dumb = ('' == $sStyleHidden_fclnumero) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fclnumero_dumb" style="<?php echo $sStyleHidden_fclnumero_dumb; ?>"></TD>
<?php $sStyleHidden_cobfecha_dumb = ('' == $sStyleHidden_cobfecha) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cobfecha_dumb" style="<?php echo $sStyleHidden_cobfecha_dumb; ?>"></TD>
<?php $sStyleHidden_cobvalefec_dumb = ('' == $sStyleHidden_cobvalefec) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cobvalefec_dumb" style="<?php echo $sStyleHidden_cobvalefec_dumb; ?>"></TD>
<?php $sStyleHidden_cobvalcheq_dumb = ('' == $sStyleHidden_cobvalcheq) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cobvalcheq_dumb" style="<?php echo $sStyleHidden_cobvalcheq_dumb; ?>"></TD>
<?php $sStyleHidden_cobvaltarjcred_dumb = ('' == $sStyleHidden_cobvaltarjcred) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cobvaltarjcred_dumb" style="<?php echo $sStyleHidden_cobvaltarjcred_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cobvalretfte']))
           {
               $this->nmgp_cmp_readonly['cobvalretfte'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cobvaltotal']))
           {
               $this->nmgp_cmp_readonly['cobvaltotal'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cobvalcruz']))
           {
               $this->nmgp_cmp_readonly['cobvalcruz'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['saldo_favor']))
           {
               $this->nmgp_cmp_readonly['saldo_favor'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cobanula']))
           {
               $this->nmgp_cmp_readonly['cobanula'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['cobvaltransf']))
    {
        $this->nm_new_label['cobvaltransf'] = "VALOR TRANSFER.";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cobvaltransf = $this->cobvaltransf;
   $sStyleHidden_cobvaltransf = '';
   if (isset($this->nmgp_cmp_hidden['cobvaltransf']) && $this->nmgp_cmp_hidden['cobvaltransf'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cobvaltransf']);
       $sStyleHidden_cobvaltransf = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cobvaltransf = 'display: none;';
   $sStyleReadInp_cobvaltransf = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cobvaltransf"]) &&  $this->nmgp_cmp_readonly["cobvaltransf"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cobvaltransf']);
       $sStyleReadLab_cobvaltransf = '';
       $sStyleReadInp_cobvaltransf = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cobvaltransf']) && $this->nmgp_cmp_hidden['cobvaltransf'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cobvaltransf" value="<?php echo $this->form_encode_input($cobvaltransf) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cobvaltransf_line" id="hidden_field_data_cobvaltransf" style="<?php echo $sStyleHidden_cobvaltransf; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cobvaltransf_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cobvaltransf_label" style=""><span id="id_label_cobvaltransf"><?php echo $this->nm_new_label['cobvaltransf']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["cobvaltransf"]) &&  $this->nmgp_cmp_readonly["cobvaltransf"] == "on")) { 

 ?>
<input type="hidden" name="cobvaltransf" value="<?php echo $this->form_encode_input($cobvaltransf) . "\"><span id=\"id_ajax_label_cobvaltransf\">" . $cobvaltransf . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_cobvaltransf" class="sc-ui-readonly-cobvaltransf css_cobvaltransf_line" style="<?php echo $sStyleReadLab_cobvaltransf; ?>"><?php echo $this->form_format_readonly("cobvaltransf", $this->form_encode_input($this->cobvaltransf)); ?></span><span id="id_read_off_cobvaltransf" class="css_read_off_cobvaltransf" style="white-space: nowrap;<?php echo $sStyleReadInp_cobvaltransf; ?>">
 <input class="sc-js-input scFormObjectOdd css_cobvaltransf_obj" style="" id="id_sc_field_cobvaltransf" type=text name="cobvaltransf" value="<?php echo $this->form_encode_input($cobvaltransf) ?>"
 size=12 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['cobvaltransf']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['cobvaltransf']['format_pos'] || 3 == $this->field_config['cobvaltransf']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cobvaltransf']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cobvaltransf']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cobvaltransf']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cobvaltransf']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cobvaltransf_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cobvaltransf_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cobvalretfte']))
    {
        $this->nm_new_label['cobvalretfte'] = "VALOR RET. FUENTE";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cobvalretfte = $this->cobvalretfte;
   $sStyleHidden_cobvalretfte = '';
   if (isset($this->nmgp_cmp_hidden['cobvalretfte']) && $this->nmgp_cmp_hidden['cobvalretfte'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cobvalretfte']);
       $sStyleHidden_cobvalretfte = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cobvalretfte = 'display: none;';
   $sStyleReadInp_cobvalretfte = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cobvalretfte"]) &&  $this->nmgp_cmp_readonly["cobvalretfte"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cobvalretfte']);
       $sStyleReadLab_cobvalretfte = '';
       $sStyleReadInp_cobvalretfte = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cobvalretfte']) && $this->nmgp_cmp_hidden['cobvalretfte'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cobvalretfte" value="<?php echo $this->form_encode_input($cobvalretfte) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cobvalretfte_line" id="hidden_field_data_cobvalretfte" style="<?php echo $sStyleHidden_cobvalretfte; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cobvalretfte_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cobvalretfte_label" style=""><span id="id_label_cobvalretfte"><?php echo $this->nm_new_label['cobvalretfte']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["cobvalretfte"]) &&  $this->nmgp_cmp_readonly["cobvalretfte"] == "on")) { 

 ?>
<input type="hidden" name="cobvalretfte" value="<?php echo $this->form_encode_input($cobvalretfte) . "\"><span id=\"id_ajax_label_cobvalretfte\">" . $cobvalretfte . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_cobvalretfte" class="sc-ui-readonly-cobvalretfte css_cobvalretfte_line" style="<?php echo $sStyleReadLab_cobvalretfte; ?>"><?php echo $this->form_format_readonly("cobvalretfte", $this->form_encode_input($this->cobvalretfte)); ?></span><span id="id_read_off_cobvalretfte" class="css_read_off_cobvalretfte" style="white-space: nowrap;<?php echo $sStyleReadInp_cobvalretfte; ?>">
 <input class="sc-js-input scFormObjectOdd css_cobvalretfte_obj" style="" id="id_sc_field_cobvalretfte" type=text name="cobvalretfte" value="<?php echo $this->form_encode_input($cobvalretfte) ?>"
 size=12 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['cobvalretfte']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['cobvalretfte']['format_pos'] || 3 == $this->field_config['cobvalretfte']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cobvalretfte']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cobvalretfte']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cobvalretfte']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cobvalretfte']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cobvalretfte_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cobvalretfte_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cobvaltotal']))
    {
        $this->nm_new_label['cobvaltotal'] = "VALOR TOTAL";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cobvaltotal = $this->cobvaltotal;
   $sStyleHidden_cobvaltotal = '';
   if (isset($this->nmgp_cmp_hidden['cobvaltotal']) && $this->nmgp_cmp_hidden['cobvaltotal'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cobvaltotal']);
       $sStyleHidden_cobvaltotal = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cobvaltotal = 'display: none;';
   $sStyleReadInp_cobvaltotal = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cobvaltotal"]) &&  $this->nmgp_cmp_readonly["cobvaltotal"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cobvaltotal']);
       $sStyleReadLab_cobvaltotal = '';
       $sStyleReadInp_cobvaltotal = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cobvaltotal']) && $this->nmgp_cmp_hidden['cobvaltotal'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cobvaltotal" value="<?php echo $this->form_encode_input($cobvaltotal) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cobvaltotal_line" id="hidden_field_data_cobvaltotal" style="<?php echo $sStyleHidden_cobvaltotal; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cobvaltotal_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cobvaltotal_label" style=""><span id="id_label_cobvaltotal"><?php echo $this->nm_new_label['cobvaltotal']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["cobvaltotal"]) &&  $this->nmgp_cmp_readonly["cobvaltotal"] == "on")) { 

 ?>
<input type="hidden" name="cobvaltotal" value="<?php echo $this->form_encode_input($cobvaltotal) . "\"><span id=\"id_ajax_label_cobvaltotal\">" . $cobvaltotal . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_cobvaltotal" class="sc-ui-readonly-cobvaltotal css_cobvaltotal_line" style="<?php echo $sStyleReadLab_cobvaltotal; ?>"><?php echo $this->form_format_readonly("cobvaltotal", $this->form_encode_input($this->cobvaltotal)); ?></span><span id="id_read_off_cobvaltotal" class="css_read_off_cobvaltotal" style="white-space: nowrap;<?php echo $sStyleReadInp_cobvaltotal; ?>">
 <input class="sc-js-input scFormObjectOdd css_cobvaltotal_obj" style="" id="id_sc_field_cobvaltotal" type=text name="cobvaltotal" value="<?php echo $this->form_encode_input($cobvaltotal) ?>"
 size=12 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['cobvaltotal']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['cobvaltotal']['format_pos'] || 3 == $this->field_config['cobvaltotal']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cobvaltotal']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cobvaltotal']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cobvaltotal']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cobvaltotal']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cobvaltotal_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cobvaltotal_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cobvalcruz']))
    {
        $this->nm_new_label['cobvalcruz'] = "VALOR CRUZADO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cobvalcruz = $this->cobvalcruz;
   $sStyleHidden_cobvalcruz = '';
   if (isset($this->nmgp_cmp_hidden['cobvalcruz']) && $this->nmgp_cmp_hidden['cobvalcruz'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cobvalcruz']);
       $sStyleHidden_cobvalcruz = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cobvalcruz = 'display: none;';
   $sStyleReadInp_cobvalcruz = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cobvalcruz"]) &&  $this->nmgp_cmp_readonly["cobvalcruz"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cobvalcruz']);
       $sStyleReadLab_cobvalcruz = '';
       $sStyleReadInp_cobvalcruz = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cobvalcruz']) && $this->nmgp_cmp_hidden['cobvalcruz'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cobvalcruz" value="<?php echo $this->form_encode_input($cobvalcruz) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cobvalcruz_line" id="hidden_field_data_cobvalcruz" style="<?php echo $sStyleHidden_cobvalcruz; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cobvalcruz_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cobvalcruz_label" style=""><span id="id_label_cobvalcruz"><?php echo $this->nm_new_label['cobvalcruz']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["cobvalcruz"]) &&  $this->nmgp_cmp_readonly["cobvalcruz"] == "on")) { 

 ?>
<input type="hidden" name="cobvalcruz" value="<?php echo $this->form_encode_input($cobvalcruz) . "\"><span id=\"id_ajax_label_cobvalcruz\">" . $cobvalcruz . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_cobvalcruz" class="sc-ui-readonly-cobvalcruz css_cobvalcruz_line" style="<?php echo $sStyleReadLab_cobvalcruz; ?>"><?php echo $this->form_format_readonly("cobvalcruz", $this->form_encode_input($this->cobvalcruz)); ?></span><span id="id_read_off_cobvalcruz" class="css_read_off_cobvalcruz" style="white-space: nowrap;<?php echo $sStyleReadInp_cobvalcruz; ?>">
 <input class="sc-js-input scFormObjectOdd css_cobvalcruz_obj" style="" id="id_sc_field_cobvalcruz" type=text name="cobvalcruz" value="<?php echo $this->form_encode_input($cobvalcruz) ?>"
 size=12 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['cobvalcruz']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['cobvalcruz']['format_pos'] || 3 == $this->field_config['cobvalcruz']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cobvalcruz']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cobvalcruz']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cobvalcruz']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cobvalcruz']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cobvalcruz_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cobvalcruz_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['saldo_favor']))
    {
        $this->nm_new_label['saldo_favor'] = "SALDO A FAVOR";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $saldo_favor = $this->saldo_favor;
   $sStyleHidden_saldo_favor = '';
   if (isset($this->nmgp_cmp_hidden['saldo_favor']) && $this->nmgp_cmp_hidden['saldo_favor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['saldo_favor']);
       $sStyleHidden_saldo_favor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_saldo_favor = 'display: none;';
   $sStyleReadInp_saldo_favor = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["saldo_favor"]) &&  $this->nmgp_cmp_readonly["saldo_favor"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['saldo_favor']);
       $sStyleReadLab_saldo_favor = '';
       $sStyleReadInp_saldo_favor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['saldo_favor']) && $this->nmgp_cmp_hidden['saldo_favor'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="saldo_favor" value="<?php echo $this->form_encode_input($saldo_favor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_saldo_favor_line" id="hidden_field_data_saldo_favor" style="<?php echo $sStyleHidden_saldo_favor; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_saldo_favor_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_saldo_favor_label" style=""><span id="id_label_saldo_favor"><?php echo $this->nm_new_label['saldo_favor']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["saldo_favor"]) &&  $this->nmgp_cmp_readonly["saldo_favor"] == "on")) { 

 ?>
<input type="hidden" name="saldo_favor" value="<?php echo $this->form_encode_input($saldo_favor) . "\"><span id=\"id_ajax_label_saldo_favor\">" . $saldo_favor . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_saldo_favor" class="sc-ui-readonly-saldo_favor css_saldo_favor_line" style="<?php echo $sStyleReadLab_saldo_favor; ?>"><?php echo $this->form_format_readonly("saldo_favor", $this->form_encode_input($this->saldo_favor)); ?></span><span id="id_read_off_saldo_favor" class="css_read_off_saldo_favor" style="white-space: nowrap;<?php echo $sStyleReadInp_saldo_favor; ?>">
 <input class="sc-js-input scFormObjectOdd css_saldo_favor_obj" style="" id="id_sc_field_saldo_favor" type=text name="saldo_favor" value="<?php echo $this->form_encode_input($saldo_favor) ?>"
 size=10 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['saldo_favor']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['saldo_favor']['format_pos'] || 3 == $this->field_config['saldo_favor']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['saldo_favor']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['saldo_favor']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['saldo_favor']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['saldo_favor']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_saldo_favor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_saldo_favor_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_cobvaltransf_dumb = ('' == $sStyleHidden_cobvaltransf) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cobvaltransf_dumb" style="<?php echo $sStyleHidden_cobvaltransf_dumb; ?>"></TD>
<?php $sStyleHidden_cobvalretfte_dumb = ('' == $sStyleHidden_cobvalretfte) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cobvalretfte_dumb" style="<?php echo $sStyleHidden_cobvalretfte_dumb; ?>"></TD>
<?php $sStyleHidden_cobvaltotal_dumb = ('' == $sStyleHidden_cobvaltotal) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cobvaltotal_dumb" style="<?php echo $sStyleHidden_cobvaltotal_dumb; ?>"></TD>
<?php $sStyleHidden_cobvalcruz_dumb = ('' == $sStyleHidden_cobvalcruz) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cobvalcruz_dumb" style="<?php echo $sStyleHidden_cobvalcruz_dumb; ?>"></TD>
<?php $sStyleHidden_saldo_favor_dumb = ('' == $sStyleHidden_saldo_favor) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_saldo_favor_dumb" style="<?php echo $sStyleHidden_saldo_favor_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cobnumcheq']))
           {
               $this->nmgp_cmp_readonly['cobnumcheq'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cobbancheq']))
           {
               $this->nmgp_cmp_readonly['cobbancheq'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['tcrcodigo']))
           {
               $this->nmgp_cmp_readonly['tcrcodigo'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cobnumtarjcred']))
           {
               $this->nmgp_cmp_readonly['cobnumtarjcred'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cobbantransf']))
           {
               $this->nmgp_cmp_readonly['cobbantransf'] = 'on';
           }
?>


   <?php
   if (!isset($this->nm_new_label['cobanula']))
   {
       $this->nm_new_label['cobanula'] = "ANULADO";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cobanula = $this->cobanula;
   $sStyleHidden_cobanula = '';
   if (isset($this->nmgp_cmp_hidden['cobanula']) && $this->nmgp_cmp_hidden['cobanula'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cobanula']);
       $sStyleHidden_cobanula = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cobanula = 'display: none;';
   $sStyleReadInp_cobanula = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cobanula"]) &&  $this->nmgp_cmp_readonly["cobanula"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cobanula']);
       $sStyleReadLab_cobanula = '';
       $sStyleReadInp_cobanula = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cobanula']) && $this->nmgp_cmp_hidden['cobanula'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="cobanula" value="<?php echo $this->form_encode_input($this->cobanula) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cobanula_line" id="hidden_field_data_cobanula" style="<?php echo $sStyleHidden_cobanula; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cobanula_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cobanula_label" style=""><span id="id_label_cobanula"><?php echo $this->nm_new_label['cobanula']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["cobanula"]) &&  $this->nmgp_cmp_readonly["cobanula"] == "on")) { 

$cobanula_look = "";
 if ($this->cobanula == "1") { $cobanula_look .= "S�" ;} 
 if ($this->cobanula == "0") { $cobanula_look .= "NO" ;} 
 if (empty($cobanula_look)) { $cobanula_look = $this->cobanula; }
?>
<input type="hidden" name="cobanula" value="<?php echo $this->form_encode_input($cobanula) . "\"><span id=\"id_ajax_label_cobanula\">" . $cobanula_look . "</span>"; ?>
<?php } else { ?>
<?php

$cobanula_look = "";
 if ($this->cobanula == "1") { $cobanula_look .= "S�" ;} 
 if ($this->cobanula == "0") { $cobanula_look .= "NO" ;} 
 if (empty($cobanula_look)) { $cobanula_look = $this->cobanula; }
?>
<span id="id_read_on_cobanula" class="css_cobanula_line"  style="<?php echo $sStyleReadLab_cobanula; ?>"><?php echo $this->form_format_readonly("cobanula", $this->form_encode_input($cobanula_look)); ?></span><span id="id_read_off_cobanula" class="css_read_off_cobanula" style="white-space: nowrap; <?php echo $sStyleReadInp_cobanula; ?>">
 <span id="idAjaxSelect_cobanula"><select class="sc-js-input scFormObjectOdd css_cobanula_obj" style="" id="id_sc_field_cobanula" name="cobanula" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="1" <?php  if ($this->cobanula == "1") { echo " selected" ;} ?>>S�</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_cobanula'][] = '1'; ?>
 <option  value="0" <?php  if ($this->cobanula == "0") { echo " selected" ;} ?>>NO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_cobanula'][] = '0'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cobanula_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cobanula_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cobnumcheq']))
    {
        $this->nm_new_label['cobnumcheq'] = "No. CHEQUE";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cobnumcheq = $this->cobnumcheq;
   $sStyleHidden_cobnumcheq = '';
   if (isset($this->nmgp_cmp_hidden['cobnumcheq']) && $this->nmgp_cmp_hidden['cobnumcheq'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cobnumcheq']);
       $sStyleHidden_cobnumcheq = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cobnumcheq = 'display: none;';
   $sStyleReadInp_cobnumcheq = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cobnumcheq"]) &&  $this->nmgp_cmp_readonly["cobnumcheq"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cobnumcheq']);
       $sStyleReadLab_cobnumcheq = '';
       $sStyleReadInp_cobnumcheq = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cobnumcheq']) && $this->nmgp_cmp_hidden['cobnumcheq'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cobnumcheq" value="<?php echo $this->form_encode_input($cobnumcheq) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cobnumcheq_line" id="hidden_field_data_cobnumcheq" style="<?php echo $sStyleHidden_cobnumcheq; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cobnumcheq_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cobnumcheq_label" style=""><span id="id_label_cobnumcheq"><?php echo $this->nm_new_label['cobnumcheq']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["cobnumcheq"]) &&  $this->nmgp_cmp_readonly["cobnumcheq"] == "on")) { 

 ?>
<input type="hidden" name="cobnumcheq" value="<?php echo $this->form_encode_input($cobnumcheq) . "\"><span id=\"id_ajax_label_cobnumcheq\">" . $cobnumcheq . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_cobnumcheq" class="sc-ui-readonly-cobnumcheq css_cobnumcheq_line" style="<?php echo $sStyleReadLab_cobnumcheq; ?>"><?php echo $this->form_format_readonly("cobnumcheq", $this->form_encode_input($this->cobnumcheq)); ?></span><span id="id_read_off_cobnumcheq" class="css_read_off_cobnumcheq" style="white-space: nowrap;<?php echo $sStyleReadInp_cobnumcheq; ?>">
 <input class="sc-js-input scFormObjectOdd css_cobnumcheq_obj" style="" id="id_sc_field_cobnumcheq" type=text name="cobnumcheq" value="<?php echo $this->form_encode_input($cobnumcheq) ?>"
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cobnumcheq_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cobnumcheq_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cobbancheq']))
    {
        $this->nm_new_label['cobbancheq'] = "BANCO CHEQUE";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cobbancheq = $this->cobbancheq;
   $sStyleHidden_cobbancheq = '';
   if (isset($this->nmgp_cmp_hidden['cobbancheq']) && $this->nmgp_cmp_hidden['cobbancheq'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cobbancheq']);
       $sStyleHidden_cobbancheq = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cobbancheq = 'display: none;';
   $sStyleReadInp_cobbancheq = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cobbancheq"]) &&  $this->nmgp_cmp_readonly["cobbancheq"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cobbancheq']);
       $sStyleReadLab_cobbancheq = '';
       $sStyleReadInp_cobbancheq = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cobbancheq']) && $this->nmgp_cmp_hidden['cobbancheq'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cobbancheq" value="<?php echo $this->form_encode_input($cobbancheq) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cobbancheq_line" id="hidden_field_data_cobbancheq" style="<?php echo $sStyleHidden_cobbancheq; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cobbancheq_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cobbancheq_label" style=""><span id="id_label_cobbancheq"><?php echo $this->nm_new_label['cobbancheq']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["cobbancheq"]) &&  $this->nmgp_cmp_readonly["cobbancheq"] == "on")) { 

 ?>
<input type="hidden" name="cobbancheq" value="<?php echo $this->form_encode_input($cobbancheq) . "\"><span id=\"id_ajax_label_cobbancheq\">" . $cobbancheq . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_cobbancheq" class="sc-ui-readonly-cobbancheq css_cobbancheq_line" style="<?php echo $sStyleReadLab_cobbancheq; ?>"><?php echo $this->form_format_readonly("cobbancheq", $this->form_encode_input($this->cobbancheq)); ?></span><span id="id_read_off_cobbancheq" class="css_read_off_cobbancheq" style="white-space: nowrap;<?php echo $sStyleReadInp_cobbancheq; ?>">
 <input class="sc-js-input scFormObjectOdd css_cobbancheq_obj" style="" id="id_sc_field_cobbancheq" type=text name="cobbancheq" value="<?php echo $this->form_encode_input($cobbancheq) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cobbancheq_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cobbancheq_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['tcrcodigo']))
   {
       $this->nm_new_label['tcrcodigo'] = "TIP. TARJ. CR�D.";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tcrcodigo = $this->tcrcodigo;
   $sStyleHidden_tcrcodigo = '';
   if (isset($this->nmgp_cmp_hidden['tcrcodigo']) && $this->nmgp_cmp_hidden['tcrcodigo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tcrcodigo']);
       $sStyleHidden_tcrcodigo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tcrcodigo = 'display: none;';
   $sStyleReadInp_tcrcodigo = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["tcrcodigo"]) &&  $this->nmgp_cmp_readonly["tcrcodigo"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tcrcodigo']);
       $sStyleReadLab_tcrcodigo = '';
       $sStyleReadInp_tcrcodigo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tcrcodigo']) && $this->nmgp_cmp_hidden['tcrcodigo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tcrcodigo" value="<?php echo $this->form_encode_input($this->tcrcodigo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tcrcodigo_line" id="hidden_field_data_tcrcodigo" style="<?php echo $sStyleHidden_tcrcodigo; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tcrcodigo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tcrcodigo_label" style=""><span id="id_label_tcrcodigo"><?php echo $this->nm_new_label['tcrcodigo']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["tcrcodigo"]) &&  $this->nmgp_cmp_readonly["tcrcodigo"] == "on")) { 
 
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
   $x = 0; 
   $tcrcodigo_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tcrcodigo_1))
          {
              foreach ($this->tcrcodigo_1 as $tmp_tcrcodigo)
              {
                  if (trim($tmp_tcrcodigo) === trim($cadaselect[1])) { $tcrcodigo_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tcrcodigo) === trim($cadaselect[1])) { $tcrcodigo_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="tcrcodigo" value="<?php echo $this->form_encode_input($tcrcodigo) . "\"><span id=\"id_ajax_label_tcrcodigo\">" . $tcrcodigo_look . "</span>"; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_tcrcodigo();
   $x = 0 ; 
   $tcrcodigo_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tcrcodigo_1))
          {
              foreach ($this->tcrcodigo_1 as $tmp_tcrcodigo)
              {
                  if (trim($tmp_tcrcodigo) === trim($cadaselect[1])) { $tcrcodigo_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tcrcodigo) === trim($cadaselect[1])) { $tcrcodigo_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($tcrcodigo_look))
          {
              $tcrcodigo_look = $this->tcrcodigo;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_tcrcodigo\" class=\"css_tcrcodigo_line\" style=\"" .  $sStyleReadLab_tcrcodigo . "\">" . $this->form_format_readonly("tcrcodigo", $this->form_encode_input($tcrcodigo_look)) . "</span><span id=\"id_read_off_tcrcodigo\" class=\"css_read_off_tcrcodigo\" style=\"white-space: nowrap; " . $sStyleReadInp_tcrcodigo . "\">";
   echo " <span id=\"idAjaxSelect_tcrcodigo\"><select class=\"sc-js-input scFormObjectOdd css_tcrcodigo_obj\" style=\"\" id=\"id_sc_field_tcrcodigo\" name=\"tcrcodigo\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lookup_tcrcodigo'][] = 'null'; 
   echo "  <option value=\"null\">" . str_replace("<", "&lt;","------------------------") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->tcrcodigo) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->tcrcodigo)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tcrcodigo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tcrcodigo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cobnumtarjcred']))
    {
        $this->nm_new_label['cobnumtarjcred'] = "No. TARJ. CR�D.";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cobnumtarjcred = $this->cobnumtarjcred;
   $sStyleHidden_cobnumtarjcred = '';
   if (isset($this->nmgp_cmp_hidden['cobnumtarjcred']) && $this->nmgp_cmp_hidden['cobnumtarjcred'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cobnumtarjcred']);
       $sStyleHidden_cobnumtarjcred = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cobnumtarjcred = 'display: none;';
   $sStyleReadInp_cobnumtarjcred = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cobnumtarjcred"]) &&  $this->nmgp_cmp_readonly["cobnumtarjcred"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cobnumtarjcred']);
       $sStyleReadLab_cobnumtarjcred = '';
       $sStyleReadInp_cobnumtarjcred = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cobnumtarjcred']) && $this->nmgp_cmp_hidden['cobnumtarjcred'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cobnumtarjcred" value="<?php echo $this->form_encode_input($cobnumtarjcred) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cobnumtarjcred_line" id="hidden_field_data_cobnumtarjcred" style="<?php echo $sStyleHidden_cobnumtarjcred; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cobnumtarjcred_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cobnumtarjcred_label" style=""><span id="id_label_cobnumtarjcred"><?php echo $this->nm_new_label['cobnumtarjcred']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["cobnumtarjcred"]) &&  $this->nmgp_cmp_readonly["cobnumtarjcred"] == "on")) { 

 ?>
<input type="hidden" name="cobnumtarjcred" value="<?php echo $this->form_encode_input($cobnumtarjcred) . "\"><span id=\"id_ajax_label_cobnumtarjcred\">" . $cobnumtarjcred . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_cobnumtarjcred" class="sc-ui-readonly-cobnumtarjcred css_cobnumtarjcred_line" style="<?php echo $sStyleReadLab_cobnumtarjcred; ?>"><?php echo $this->form_format_readonly("cobnumtarjcred", $this->form_encode_input($this->cobnumtarjcred)); ?></span><span id="id_read_off_cobnumtarjcred" class="css_read_off_cobnumtarjcred" style="white-space: nowrap;<?php echo $sStyleReadInp_cobnumtarjcred; ?>">
 <input class="sc-js-input scFormObjectOdd css_cobnumtarjcred_obj" style="" id="id_sc_field_cobnumtarjcred" type=text name="cobnumtarjcred" value="<?php echo $this->form_encode_input($cobnumtarjcred) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cobnumtarjcred_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cobnumtarjcred_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_cobanula_dumb = ('' == $sStyleHidden_cobanula) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cobanula_dumb" style="<?php echo $sStyleHidden_cobanula_dumb; ?>"></TD>
<?php $sStyleHidden_cobnumcheq_dumb = ('' == $sStyleHidden_cobnumcheq) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cobnumcheq_dumb" style="<?php echo $sStyleHidden_cobnumcheq_dumb; ?>"></TD>
<?php $sStyleHidden_cobbancheq_dumb = ('' == $sStyleHidden_cobbancheq) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cobbancheq_dumb" style="<?php echo $sStyleHidden_cobbancheq_dumb; ?>"></TD>
<?php $sStyleHidden_tcrcodigo_dumb = ('' == $sStyleHidden_tcrcodigo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_tcrcodigo_dumb" style="<?php echo $sStyleHidden_tcrcodigo_dumb; ?>"></TD>
<?php $sStyleHidden_cobnumtarjcred_dumb = ('' == $sStyleHidden_cobnumtarjcred) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cobnumtarjcred_dumb" style="<?php echo $sStyleHidden_cobnumtarjcred_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cobctatransf']))
           {
               $this->nmgp_cmp_readonly['cobctatransf'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['cobbantransf']))
    {
        $this->nm_new_label['cobbantransf'] = "BANCO TRANSFER.";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cobbantransf = $this->cobbantransf;
   $sStyleHidden_cobbantransf = '';
   if (isset($this->nmgp_cmp_hidden['cobbantransf']) && $this->nmgp_cmp_hidden['cobbantransf'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cobbantransf']);
       $sStyleHidden_cobbantransf = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cobbantransf = 'display: none;';
   $sStyleReadInp_cobbantransf = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cobbantransf"]) &&  $this->nmgp_cmp_readonly["cobbantransf"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cobbantransf']);
       $sStyleReadLab_cobbantransf = '';
       $sStyleReadInp_cobbantransf = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cobbantransf']) && $this->nmgp_cmp_hidden['cobbantransf'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cobbantransf" value="<?php echo $this->form_encode_input($cobbantransf) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cobbantransf_line" id="hidden_field_data_cobbantransf" style="<?php echo $sStyleHidden_cobbantransf; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cobbantransf_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cobbantransf_label" style=""><span id="id_label_cobbantransf"><?php echo $this->nm_new_label['cobbantransf']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["cobbantransf"]) &&  $this->nmgp_cmp_readonly["cobbantransf"] == "on")) { 

 ?>
<input type="hidden" name="cobbantransf" value="<?php echo $this->form_encode_input($cobbantransf) . "\"><span id=\"id_ajax_label_cobbantransf\">" . $cobbantransf . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_cobbantransf" class="sc-ui-readonly-cobbantransf css_cobbantransf_line" style="<?php echo $sStyleReadLab_cobbantransf; ?>"><?php echo $this->form_format_readonly("cobbantransf", $this->form_encode_input($this->cobbantransf)); ?></span><span id="id_read_off_cobbantransf" class="css_read_off_cobbantransf" style="white-space: nowrap;<?php echo $sStyleReadInp_cobbantransf; ?>">
 <input class="sc-js-input scFormObjectOdd css_cobbantransf_obj" style="" id="id_sc_field_cobbantransf" type=text name="cobbantransf" value="<?php echo $this->form_encode_input($cobbantransf) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cobbantransf_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cobbantransf_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cobctatransf']))
    {
        $this->nm_new_label['cobctatransf'] = "No. CTA. TRANSFER.";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cobctatransf = $this->cobctatransf;
   $sStyleHidden_cobctatransf = '';
   if (isset($this->nmgp_cmp_hidden['cobctatransf']) && $this->nmgp_cmp_hidden['cobctatransf'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cobctatransf']);
       $sStyleHidden_cobctatransf = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cobctatransf = 'display: none;';
   $sStyleReadInp_cobctatransf = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cobctatransf"]) &&  $this->nmgp_cmp_readonly["cobctatransf"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cobctatransf']);
       $sStyleReadLab_cobctatransf = '';
       $sStyleReadInp_cobctatransf = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cobctatransf']) && $this->nmgp_cmp_hidden['cobctatransf'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cobctatransf" value="<?php echo $this->form_encode_input($cobctatransf) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cobctatransf_line" id="hidden_field_data_cobctatransf" style="<?php echo $sStyleHidden_cobctatransf; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cobctatransf_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cobctatransf_label" style=""><span id="id_label_cobctatransf"><?php echo $this->nm_new_label['cobctatransf']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["cobctatransf"]) &&  $this->nmgp_cmp_readonly["cobctatransf"] == "on")) { 

 ?>
<input type="hidden" name="cobctatransf" value="<?php echo $this->form_encode_input($cobctatransf) . "\"><span id=\"id_ajax_label_cobctatransf\">" . $cobctatransf . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_cobctatransf" class="sc-ui-readonly-cobctatransf css_cobctatransf_line" style="<?php echo $sStyleReadLab_cobctatransf; ?>"><?php echo $this->form_format_readonly("cobctatransf", $this->form_encode_input($this->cobctatransf)); ?></span><span id="id_read_off_cobctatransf" class="css_read_off_cobctatransf" style="white-space: nowrap;<?php echo $sStyleReadInp_cobctatransf; ?>">
 <input class="sc-js-input scFormObjectOdd css_cobctatransf_obj" style="" id="id_sc_field_cobctatransf" type=text name="cobctatransf" value="<?php echo $this->form_encode_input($cobctatransf) ?>"
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cobctatransf_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cobctatransf_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="3" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
<?php $sStyleHidden_cobbantransf_dumb = ('' == $sStyleHidden_cobbantransf) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cobbantransf_dumb" style="<?php echo $sStyleHidden_cobbantransf_dumb; ?>"></TD>
<?php $sStyleHidden_cobctatransf_dumb = ('' == $sStyleHidden_cobctatransf) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cobctatransf_dumb" style="<?php echo $sStyleHidden_cobctatransf_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['detalle_cobro']))
    {
        $this->nm_new_label['detalle_cobro'] = "DETALLE";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $detalle_cobro = $this->detalle_cobro;
   $sStyleHidden_detalle_cobro = '';
   if (isset($this->nmgp_cmp_hidden['detalle_cobro']) && $this->nmgp_cmp_hidden['detalle_cobro'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['detalle_cobro']);
       $sStyleHidden_detalle_cobro = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_detalle_cobro = 'display: none;';
   $sStyleReadInp_detalle_cobro = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['detalle_cobro']) && $this->nmgp_cmp_readonly['detalle_cobro'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['detalle_cobro']);
       $sStyleReadLab_detalle_cobro = '';
       $sStyleReadInp_detalle_cobro = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['detalle_cobro']) && $this->nmgp_cmp_hidden['detalle_cobro'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="detalle_cobro" value="<?php echo $this->form_encode_input($detalle_cobro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_detalle_cobro_line" id="hidden_field_data_detalle_cobro" style="<?php echo $sStyleHidden_detalle_cobro; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_detalle_cobro_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_detalle_cobro_label" style=""><span id="id_label_detalle_cobro"><?php echo $this->nm_new_label['detalle_cobro']; ?></span></span><br>
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle_cobro'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle_cobro'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['grid_detalle_cobro_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle_cobro'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['grid_detalle_cobro_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['grid_detalle_cobro_script_case_init'] ]['grid_detalle_cobro']['embutida_form_full']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['grid_detalle_cobro_script_case_init'] ]['grid_detalle_cobro']['embutida_form']       = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['grid_detalle_cobro_script_case_init'] ]['grid_detalle_cobro']['embutida_pai']        = "form_cobros";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['grid_detalle_cobro_script_case_init'] ]['grid_detalle_cobro']['embutida_form_parms'] = "v_rucemison*scin" . $this->nmgp_dados_form['emiruc'] . "*scoutnumero_cobro*scin" . $this->nmgp_dados_form['cobnumero'] . "*scout";
 if (isset($this->Ini->sc_lig_md5["grid_detalle_cobro"]) && $this->Ini->sc_lig_md5["grid_detalle_cobro"] == "S") {
     $Parms_Lig  = "v_rucemison*scin" . $this->nmgp_dados_form['emiruc'] . "*scoutnumero_cobro*scin" . $this->nmgp_dados_form['cobnumero'] . "*scout";
     $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_cobros@SC_par@" . md5($Parms_Lig);
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
 } else {
     $Md5_Lig  = "v_rucemison*scin" . $this->nmgp_dados_form['emiruc'] . "*scoutnumero_cobro*scin" . $this->nmgp_dados_form['cobnumero'] . "*scout";
 }
 $parms_lig_cons = "&nmgp_parms=" . $Md5_Lig;
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_cobros_empty.htm' : $this->Ini->link_grid_detalle_cobro_cons . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y' . $parms_lig_cons;
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['pdf_view'])
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['grid_detalle_cobro_script_case_init'] ]['grid_detalle_cobro']['embutida_pdf'] = true;
     $_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['grid_detalle_cobro'] = $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['grid_detalle_cobro_script_case_init'] ]['grid_detalle_cobro']['embutida_form_parms'] . '?#?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '?@??#?script_case_detail=Y?@?';
     include_once ($this->Ini->root . $this->Ini->link_grid_detalle_cobro_cons . "index.php");
     $this->grid_detalle_cobro_pdf_det = new grid_detalle_cobro_apl;
     if (method_exists($this->grid_detalle_cobro_pdf_det, "controle"))
     {
         $this->grid_detalle_cobro_pdf_det->controle();
     }
     unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['grid_detalle_cobro_script_case_init'] ]['grid_detalle_cobro']['embutida_pdf']);
     unset($_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['grid_detalle_cobro']);
 }
 else
 {
?>
    <iframe border="0" id="nmsc_iframe_liga_grid_detalle_cobro"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_grid_detalle_cobro"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
 }
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detalle_cobro_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detalle_cobro_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
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

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = 'hidden';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
$(window).bind("load", function() {
<?php
  $nm_sc_blocos_da_pag = array(0,1);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = '';";
      }
  }
?>
});
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['masterValue']))
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
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
<?php
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['pdf_view']) {
?>
 $(document).ready(function() {
});
<?php
}
?>
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_cobros");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_cobros");
 parent.scAjaxDetailHeight("form_cobros", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_cobros", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_cobros", <?php echo $sTamanhoIframe; ?>);
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
	function scBtnFn_sys_format_pdf() {
		if ($("#sc_b_pdf_t.sc-unique-btn-1").length && $("#sc_b_pdf_t.sc-unique-btn-1").is(":visible")) {
			tb_show('', "<?php echo  $this->Ini->path_link . SC_dir_app_name('form_cobros')  ?>/form_cobros_config_pdf.php?nm_opc=pdf&nm_target=2&nm_cor=cor&papel=8&lpapel=0&apapel=0&orientacao=1&bookmarks=XX&largura=800&conf_larg=10&conf_fonte=N&grafico=XX&language=es&conf_socor=N&password=n&pdf_zip=N&sc_ver_93=n&KeepThis=true&TB_iframe=true&modal=true");
			 return;
		}
	}
	function scBtnFn_ANULAR() {
		if ($("#sc_ANULAR_top").length && $("#sc_ANULAR_top").is(":visible")) {
			sc_btn_ANULAR()
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
		if ($("#sc_b_sai_t.sc-unique-btn-2").length && $("#sc_b_sai_t.sc-unique-btn-2").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-4").length && $("#sc_b_sai_t.sc-unique-btn-4").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
	}
</script>
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga_mobile");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-in"><?php echo $this->Ini->Nm_lang['lang_version_mobile']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cobros']['buttonStatus'] = $this->nmgp_botoes;
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
