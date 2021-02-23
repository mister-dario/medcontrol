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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " agenda"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " agenda"); } ?></TITLE>
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
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/timepicker/jquery.ui.timepicker.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/timepicker/jquery.ui.timepicker.css" type="text/css" media="screen" />
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
.css_read_off_agefeccrea button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_agefecmodi button {
	background-color: transparent;
	border: 0;
	padding: 0
}
</style>
<?php
}
?>
<style type="text/css">
	.sc.switch {
		position: relative;
		display: inline-flex;
	}

	.sc.switch span {
		display: inline-block;
		margin-right: 5px;
	}

	.sc.switch span {
		background: #DFDFDF;
		width: 22px;
		height: 14px;
		display: block;
		position: relative;
		top: 0px;
		left: 0;
		border-radius: 15px;
		padding: 0 3px;
		transition: all .2s linear;
		box-shadow: 0px 0px 2px rgba(164, 164, 164, 0.8) inset;
	}

	.sc.switch span:before {
		content: '\2713';
		display: inline-block;
		color: white;
		font-size: 10px;
		z-index: 0;
		position: absolute;
		top: 0;
		left: 4px;
	}

	.sc.switch span:after {
		content: '';
		background: white;
		width: 12px;
		height: 12px;
		display: block;
		position: absolute;
		top: 1px;
		left: 1px;
		border-radius: 15px;
		transition: all .2s linear;
		z-index: 1;
	}

	.sc.switch input {
		margin-right: 10px;
		cursor: pointer;
		z-index: 2;
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		opacity: 0;
		margin: 0;
		padding: 0;
	}

	.sc.switch input:disabled + span {
		opacity: 0.35;
	}

	.sc.switch input:checked + span {
		background: #66AFE9;
	}

	.sc.switch input:checked + span:after {
		left: calc(100% - 1px);
		transform: translateX(-100%);
	}

	.sc.radio {
		position: relative;
		display: inline-flex;
	}

	.sc.radio span {
		display: inline-block;
		margin-right: 5px;
	}

	.sc.radio span {
		background: #ffffff;
		border: 1px solid #66AFE9;
		width: 12px;
		height: 12px;
		display: block;
		position: relative;
		top: 0px;
		left: 0;
		border-radius: 15px;
		transition: all .2s;
		box-shadow: 0px 0px 2px rgba(164, 164, 164, 0.8) inset;
	}

	.sc.radio span:after {
		content: '';
		background: #66AFE9;
		width: 12px;
		height: 12px;
		display: block;
		position: absolute;
		top: 0;
		left: 0;
		border-radius: 15px;
		transition: all .2s;
		z-index: 1;
		transform: scale(0);
	}

	.sc.radio input {
		cursor: pointer;
		z-index: 2;
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		opacity: 0;
		margin: 0;
		padding: 0;
	}

	.sc.radio input:disabled + span {
		opacity: 0.35;
	}

	.sc.radio input:checked + span {
		background: #66AFE9;
	}

	.sc.radio input:checked + span:after {
		transform: translateX(-100%);
		transform: scale(1);
	}
</style>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_agenda/form_agenda_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_agenda_sajax_js.php");
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
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo substr($this->Ini->Nm_lang['lang_othr_smry_info'], strpos($this->Ini->Nm_lang['lang_othr_smry_info'], "?final?")) ?>]";
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
function navpage_atualiza(str_navpage)
{
    if (document.getElementById("sc_b_navpage_b")) document.getElementById("sc_b_navpage_b").innerHTML = str_navpage;
}
<?php

include_once('form_agenda_jquery.php');

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

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  addAutocomplete(this);

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
     if ($('#t').length>0) {
         scQuickSearchKeyUp('t', null);
     }
   });
   function scQuickSearchSubmit_t() {
     nm_move('fast_search', 't');
   }

   function scQuickSearchKeyUp(sPos, e) {
     if (null != e) {
       var keyPressed = e.charCode || e.keyCode || e.which;
       if (13 == keyPressed) {
         if ('t' == sPos) scQuickSearchSubmit_t();
       }
       else
       {
           $('#SC_fast_search_submit_'+sPos).show();
       }
     }
   }
   function nm_gp_submit_qsearch(pos)
   {
        nm_move('fast_search', pos);
   }
   function nm_gp_open_qsearch_div(pos)
   {
        if($('#SC_fast_search_dropdown_' + pos).hasClass('fa-caret-down'))
        {
            if(($('#quicksearchph_' + pos).offset().top+$('#id_qs_div_' + pos).height()+10) >= $(document).height())
            {
                $('#id_qs_div_' + pos).offset({top:($('#quicksearchph_' + pos).offset().top-($('#quicksearchph_' + pos).height()/2)-$('#id_qs_div_' + pos).height()-4)});
            }

            nm_gp_open_qsearch_div_store_temp(pos);
            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-down').addClass('fa-caret-up');
        }
        else
        {
            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-up').addClass('fa-caret-down');
        }
        $('#id_qs_div_' + pos).toggle();
   }

   var tmp_qs_arr_fields = [], tmp_qs_arr_cond = "";
   function nm_gp_open_qsearch_div_store_temp(pos)
   {
        tmp_qs_arr_fields = [], tmp_qs_str_cond = "";

        if($('#fast_search_f0_' + pos).prop('type') == 'select-multiple')
        {
            tmp_qs_arr_fields = $('#fast_search_f0_' + pos).val();
        }
        else
        {
            tmp_qs_arr_fields.push($('#fast_search_f0_' + pos).val());
        }

        tmp_qs_str_cond = $('#cond_fast_search_f0_' + pos).val();
   }

   function nm_gp_cancel_qsearch_div_store_temp(pos)
   {
        $('#fast_search_f0_' + pos).val('');
        $("#fast_search_f0_" + pos + " option").prop('selected', false);
        for(it=0; it<tmp_qs_arr_fields.length; it++)
        {
            $("#fast_search_f0_" + pos + " option[value='"+ tmp_qs_arr_fields[it] +"']").prop('selected', true);
        }
        $("#fast_search_f0_" + pos).change();
        tmp_qs_arr_fields = [];

        $('#cond_fast_search_f0_' + pos).val(tmp_qs_str_cond);
        $('#cond_fast_search_f0_' + pos).change();
        tmp_qs_str_cond = "";

        nm_gp_open_qsearch_div(pos);
   } if($(".sc-ui-block-control").length) {
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

 function addAutocomplete(elem) {


  $(".sc-ui-autocomp-medcodigo", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "medcodigo" != sId ? sId.substr(9) : "";
   if ("" == $(this).val()) {
    var hasChanged = "" != $("#id_sc_field_" + sId).val();
    $("#id_sc_field_" + sId).val("");
    if (hasChanged) {
     if ('function' == typeof do_ajax_form_agenda_event_medcodigo_onchange) { do_ajax_form_agenda_event_medcodigo_onchange(sRow); }
    }
   }
   scEventControl_data[sId]["autocomp"] = false;
  }).on("keydown", function(e) {
   if(e.keyCode == $.ui.keyCode.TAB && $(".ui-autocomplete").filter(":visible").length) {
    e.keyCode = $.ui.keyCode.DOWN;
    $(this).trigger(e);
    e.keyCode = $.ui.keyCode.ENTER;
    $(this).trigger(e);
   }
  }).autocomplete({
   minLength: 1,
   source: function (request, response) {
    $.ajax({
     url: "form_agenda.php",
     dataType: "json",
     data: {
      term: request.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_medcodigo",
      script_case_init: document.F2.script_case_init.value
     },
     success: function (data) {
      if (data == "ss_time_out") {
          nm_move('novo');
      }
      response(data);
     }
    });
   },
   focus: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'medcodigo' != sId ? sId.substr(9) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
   },
   select: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'medcodigo' != sId ? sId.substr(9) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
    $("#id_sc_field_" + sId).trigger("focus");
   }
  });
  $("#id_ac_medcodigo", elem).on("focus", function() {
    $("#id_sc_field_medcodigo").trigger("focus");
  }).on("blur", function() {
    $("#id_sc_field_medcodigo").trigger("blur");
  });
}
</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['recarga'];
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
 include_once("form_agenda_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_agenda'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_agenda'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " agenda"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " agenda"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['fast_search'][2] : "";
          $stateSearchIconClose  = 'none';
          $stateSearchIconSearch = '';
          if(!empty($OPC_dat))
          {
              $stateSearchIconClose  = '';
              $stateSearchIconSearch = 'none';
          }
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <input id='fast_search_f0_t' type="hidden" name="nmgp_fast_search_t" value="SC_all_Cmp">
          <select id='cond_fast_search_f0_t' class="scFormToolbarInput" style="vertical-align: middle;display:none;" name="nmgp_cond_fast_search_t" onChange="change_fast_t = 'CH';">
<?php 
          $OPC_sel = ("qp" == $OPC_arg) ? " selected" : "";
           echo "           <option value='qp'" . $OPC_sel . ">" . $this->Ini->Nm_lang['lang_srch_like'] . "</option>";
?> 
          </select>
          <span id="quicksearchph_t" class="scFormToolbarInput" style='display: inline-block; vertical-align: inherit'>
              <span>
                  <input type="text" id="SC_fast_search_t" class="scFormToolbarInputText" style="border-width: 0px;;" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{maxLength: 255}" placeholder="<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>">&nbsp;
                  <img style="display: <?php echo $stateSearchIconSearch ?>; "  id="SC_fast_search_submit_t" class='css_toolbar_obj_qs_search_img' src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search; ?>" onclick="scQuickSearchSubmit_t();">
                  <img style="display: <?php echo $stateSearchIconClose ?>; " id="SC_fast_search_close_t" class='css_toolbar_obj_qs_search_img' src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean; ?>" onclick="document.getElementById('SC_fast_search_t').value = '__Clear_Fast__'; nm_move('fast_search', 't');">
              </span>
          </span>  </div>
  <?php
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Escape)", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + S)", "sc-unique-btn-4", "", "");?>
 
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
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-9", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "R")
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
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['agenombre']))
    {
        $this->nm_new_label['agenombre'] = "NOMBRE";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $agenombre = $this->agenombre;
   $sStyleHidden_agenombre = '';
   if (isset($this->nmgp_cmp_hidden['agenombre']) && $this->nmgp_cmp_hidden['agenombre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agenombre']);
       $sStyleHidden_agenombre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agenombre = 'display: none;';
   $sStyleReadInp_agenombre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['agenombre']) && $this->nmgp_cmp_readonly['agenombre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agenombre']);
       $sStyleReadLab_agenombre = '';
       $sStyleReadInp_agenombre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agenombre']) && $this->nmgp_cmp_hidden['agenombre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="agenombre" value="<?php echo $this->form_encode_input($agenombre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_agenombre_label" id="hidden_field_label_agenombre" style="<?php echo $sStyleHidden_agenombre; ?>"><span id="id_label_agenombre"><?php echo $this->nm_new_label['agenombre']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['php_cmp_required']['agenombre']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['php_cmp_required']['agenombre'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_agenombre_line" id="hidden_field_data_agenombre" style="<?php echo $sStyleHidden_agenombre; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agenombre_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agenombre"]) &&  $this->nmgp_cmp_readonly["agenombre"] == "on") { 

 ?>
<input type="hidden" name="agenombre" value="<?php echo $this->form_encode_input($agenombre) . "\">" . $agenombre . ""; ?>
<?php } else { ?>
<span id="id_read_on_agenombre" class="sc-ui-readonly-agenombre css_agenombre_line" style="<?php echo $sStyleReadLab_agenombre; ?>"><?php echo $this->form_format_readonly("agenombre", $this->form_encode_input($this->agenombre)); ?></span><span id="id_read_off_agenombre" class="css_read_off_agenombre" style="white-space: nowrap;<?php echo $sStyleReadInp_agenombre; ?>">
 <input class="sc-js-input scFormObjectOdd css_agenombre_obj" style="" id="id_sc_field_agenombre" type=text name="agenombre" value="<?php echo $this->form_encode_input($agenombre) ?>"
 size=50 maxlength=80 alt="{datatype: 'text', maxLength: 80, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agenombre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agenombre_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['medcodigo']))
    {
        $this->nm_new_label['medcodigo'] = "MÉDICO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $medcodigo = $this->medcodigo;
   $sStyleHidden_medcodigo = '';
   if (isset($this->nmgp_cmp_hidden['medcodigo']) && $this->nmgp_cmp_hidden['medcodigo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['medcodigo']);
       $sStyleHidden_medcodigo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_medcodigo = 'display: none;';
   $sStyleReadInp_medcodigo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['medcodigo']) && $this->nmgp_cmp_readonly['medcodigo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['medcodigo']);
       $sStyleReadLab_medcodigo = '';
       $sStyleReadInp_medcodigo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['medcodigo']) && $this->nmgp_cmp_hidden['medcodigo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="medcodigo" value="<?php echo $this->form_encode_input($medcodigo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_medcodigo_label" id="hidden_field_label_medcodigo" style="<?php echo $sStyleHidden_medcodigo; ?>"><span id="id_label_medcodigo"><?php echo $this->nm_new_label['medcodigo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['php_cmp_required']['medcodigo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['php_cmp_required']['medcodigo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_medcodigo_line" id="hidden_field_data_medcodigo" style="<?php echo $sStyleHidden_medcodigo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_medcodigo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["medcodigo"]) &&  $this->nmgp_cmp_readonly["medcodigo"] == "on") { 

 ?>
<input type="hidden" name="medcodigo" value="<?php echo $this->form_encode_input($medcodigo) . "\">" . $medcodigo . ""; ?>
<?php } else { ?>

<?php
$aRecData['medcodigo'] = $this->medcodigo;
$aLookup = array();
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
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
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
$sAutocompValue = (isset($aLookup[0][$this->medcodigo])) ? $aLookup[0][$this->medcodigo] : $this->medcodigo;
$medcodigo_look = (isset($aLookup[0][$this->medcodigo])) ? $aLookup[0][$this->medcodigo] : $this->medcodigo;
?>
<span id="id_read_on_medcodigo" class="sc-ui-readonly-medcodigo css_medcodigo_line" style="<?php echo $sStyleReadLab_medcodigo; ?>"><?php echo $this->form_format_readonly("medcodigo", str_replace("<", "&lt;", $medcodigo_look)); ?></span><span id="id_read_off_medcodigo" class="css_read_off_medcodigo" style="white-space: nowrap;<?php echo $sStyleReadInp_medcodigo; ?>">
 <input class="sc-js-input scFormObjectOdd css_medcodigo_obj" style="display: none;" id="id_sc_field_medcodigo" type=text name="medcodigo" value="<?php echo $this->form_encode_input($medcodigo) ?>"
 size=11 maxlength=11 style="display: none" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['medcodigo'] = $this->medcodigo;
$aLookup = array();
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
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
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
$sAutocompValue = (isset($aLookup[0][$this->medcodigo])) ? $aLookup[0][$this->medcodigo] : '';
$medcodigo_look = (isset($aLookup[0][$this->medcodigo])) ? $aLookup[0][$this->medcodigo] : '';
?>
<input type="text" id="id_ac_medcodigo" name="medcodigo_autocomp" class="scFormObjectOdd sc-ui-autocomp-medcodigo css_medcodigo_obj" size="30" value="<?php echo $sAutocompValue; ?>" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_medcodigo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_medcodigo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ageintervalo']))
    {
        $this->nm_new_label['ageintervalo'] = "INTERVALO (minutos)";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ageintervalo = $this->ageintervalo;
   $sStyleHidden_ageintervalo = '';
   if (isset($this->nmgp_cmp_hidden['ageintervalo']) && $this->nmgp_cmp_hidden['ageintervalo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ageintervalo']);
       $sStyleHidden_ageintervalo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ageintervalo = 'display: none;';
   $sStyleReadInp_ageintervalo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ageintervalo']) && $this->nmgp_cmp_readonly['ageintervalo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ageintervalo']);
       $sStyleReadLab_ageintervalo = '';
       $sStyleReadInp_ageintervalo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ageintervalo']) && $this->nmgp_cmp_hidden['ageintervalo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ageintervalo" value="<?php echo $this->form_encode_input($ageintervalo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ageintervalo_label" id="hidden_field_label_ageintervalo" style="<?php echo $sStyleHidden_ageintervalo; ?>"><span id="id_label_ageintervalo"><?php echo $this->nm_new_label['ageintervalo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['php_cmp_required']['ageintervalo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['php_cmp_required']['ageintervalo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_ageintervalo_line" id="hidden_field_data_ageintervalo" style="<?php echo $sStyleHidden_ageintervalo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ageintervalo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ageintervalo"]) &&  $this->nmgp_cmp_readonly["ageintervalo"] == "on") { 

 ?>
<input type="hidden" name="ageintervalo" value="<?php echo $this->form_encode_input($ageintervalo) . "\">" . $ageintervalo . ""; ?>
<?php } else { ?>
<span id="id_read_on_ageintervalo" class="sc-ui-readonly-ageintervalo css_ageintervalo_line" style="<?php echo $sStyleReadLab_ageintervalo; ?>"><?php echo $this->form_format_readonly("ageintervalo", $this->form_encode_input($this->ageintervalo)); ?></span><span id="id_read_off_ageintervalo" class="css_read_off_ageintervalo" style="white-space: nowrap;<?php echo $sStyleReadInp_ageintervalo; ?>">
 <input class="sc-js-input scFormObjectOdd css_ageintervalo_obj" style="" id="id_sc_field_ageintervalo" type=text name="ageintervalo" value="<?php echo $this->form_encode_input($ageintervalo) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ageintervalo']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ageintervalo']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['ageintervalo']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ageintervalo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ageintervalo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['ageactivo']))
   {
       $this->nm_new_label['ageactivo'] = "ACTIVO";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ageactivo = $this->ageactivo;
   $sStyleHidden_ageactivo = '';
   if (isset($this->nmgp_cmp_hidden['ageactivo']) && $this->nmgp_cmp_hidden['ageactivo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ageactivo']);
       $sStyleHidden_ageactivo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ageactivo = 'display: none;';
   $sStyleReadInp_ageactivo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ageactivo']) && $this->nmgp_cmp_readonly['ageactivo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ageactivo']);
       $sStyleReadLab_ageactivo = '';
       $sStyleReadInp_ageactivo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ageactivo']) && $this->nmgp_cmp_hidden['ageactivo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ageactivo" value="<?php echo $this->form_encode_input($this->ageactivo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->ageactivo_1 = explode(";", trim($this->ageactivo));
  } 
  else
  {
      if (empty($this->ageactivo))
      {
          $this->ageactivo_1= array(); 
          $this->ageactivo= "";
      } 
      else
      {
          $this->ageactivo_1= $this->ageactivo; 
          $this->ageactivo= ""; 
          foreach ($this->ageactivo_1 as $cada_ageactivo)
          {
             if (!empty($ageactivo))
             {
                 $this->ageactivo.= ";"; 
             } 
             $this->ageactivo.= $cada_ageactivo; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ageactivo_label" id="hidden_field_label_ageactivo" style="<?php echo $sStyleHidden_ageactivo; ?>"><span id="id_label_ageactivo"><?php echo $this->nm_new_label['ageactivo']; ?></span></TD>
    <TD class="scFormDataOdd css_ageactivo_line" id="hidden_field_data_ageactivo" style="<?php echo $sStyleHidden_ageactivo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ageactivo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ageactivo"]) &&  $this->nmgp_cmp_readonly["ageactivo"] == "on") { 

$ageactivo_look = "";
 if ($this->ageactivo == "1") { $ageactivo_look .= "" ;} 
 if (empty($ageactivo_look)) { $ageactivo_look = $this->ageactivo; }
?>
<input type="hidden" name="ageactivo" value="<?php echo $this->form_encode_input($ageactivo) . "\">" . $ageactivo_look . ""; ?>
<?php } else { ?>

<?php

$ageactivo_look = "";
 if ($this->ageactivo == "1") { $ageactivo_look .= "" ;} 
 if (empty($ageactivo_look)) { $ageactivo_look = $this->ageactivo; }
?>
<span id="id_read_on_ageactivo" class="css_ageactivo_line" style="<?php echo $sStyleReadLab_ageactivo; ?>"><?php echo $this->form_format_readonly("ageactivo", $this->form_encode_input($ageactivo_look)); ?></span><span id="id_read_off_ageactivo" class="css_read_off_ageactivo css_ageactivo_line" style="<?php echo $sStyleReadInp_ageactivo; ?>"><?php echo "<div id=\"idAjaxCheckbox_ageactivo\" style=\"display: inline-block\" class=\"css_ageactivo_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_ageactivo_line"><?php $tempOptionId = "id-opt-ageactivo" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-ageactivo sc-ui-checkbox-ageactivo" name="ageactivo[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_ageactivo'][] = '1'; ?>
<?php  if (in_array("1", $this->ageactivo_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>"></label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ageactivo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ageactivo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['ageusucrea']))
           {
               $this->nmgp_cmp_readonly['ageusucrea'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['agecolor']))
    {
        $this->nm_new_label['agecolor'] = "COLOR";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $agecolor = $this->agecolor;
   $sStyleHidden_agecolor = '';
   if (isset($this->nmgp_cmp_hidden['agecolor']) && $this->nmgp_cmp_hidden['agecolor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agecolor']);
       $sStyleHidden_agecolor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agecolor = 'display: none;';
   $sStyleReadInp_agecolor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['agecolor']) && $this->nmgp_cmp_readonly['agecolor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agecolor']);
       $sStyleReadLab_agecolor = '';
       $sStyleReadInp_agecolor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agecolor']) && $this->nmgp_cmp_hidden['agecolor'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="agecolor" value="<?php echo $this->form_encode_input($agecolor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_agecolor_label" id="hidden_field_label_agecolor" style="<?php echo $sStyleHidden_agecolor; ?>"><span id="id_label_agecolor"><?php echo $this->nm_new_label['agecolor']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['php_cmp_required']['agecolor']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['php_cmp_required']['agecolor'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_agecolor_line" id="hidden_field_data_agecolor" style="<?php echo $sStyleHidden_agecolor; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agecolor_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agecolor"]) &&  $this->nmgp_cmp_readonly["agecolor"] == "on") { 

 ?>
<input type="hidden" name="agecolor" value="<?php echo $this->form_encode_input($agecolor) . "\">" . $agecolor . ""; ?>
<?php } else { ?>
<span id="id_read_on_agecolor" class="sc-ui-readonly-agecolor css_agecolor_line" style="<?php echo $sStyleReadLab_agecolor; ?>"><?php echo $this->form_format_readonly("agecolor", $this->form_encode_input($this->agecolor)); ?></span><span id="id_read_off_agecolor" class="css_read_off_agecolor" style="white-space: nowrap;<?php echo $sStyleReadInp_agecolor; ?>">
 <input class="sc-js-input scFormObjectOdd css_agecolor_obj" style="display: none;" id="id_sc_field_agecolor" type=text name="agecolor" value="<?php echo $this->form_encode_input($agecolor) ?>"
 size=7 maxlength=7 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><div class='colors_agecolor scFormColorPaleteItem <?php echo ($this->form_encode_input($this->agecolor) == '#F7FE2E')?'scFormColorPaleteItemChecked':'' ?>' valor='#F7FE2E' onclick='setaCorPaleta("agecolor", "#F7FE2E")' style='border-color:#F7FE2E;background-color:#F7FE2E; '></div><div class='colors_agecolor scFormColorPaleteItem <?php echo ($this->form_encode_input($this->agecolor) == '#914814')?'scFormColorPaleteItemChecked':'' ?>' valor='#914814' onclick='setaCorPaleta("agecolor", "#914814")' style='border-color:#914814;background-color:#914814; '></div><div class='colors_agecolor scFormColorPaleteItem <?php echo ($this->form_encode_input($this->agecolor) == '#FF8000')?'scFormColorPaleteItemChecked':'' ?>' valor='#FF8000' onclick='setaCorPaleta("agecolor", "#FF8000")' style='border-color:#FF8000;background-color:#FF8000; '></div><div class='colors_agecolor scFormColorPaleteItem <?php echo ($this->form_encode_input($this->agecolor) == '#7F463C')?'scFormColorPaleteItemChecked':'' ?>' valor='#7F463C' onclick='setaCorPaleta("agecolor", "#7F463C")' style='border-color:#7F463C;background-color:#7F463C; '></div><div class='colors_agecolor scFormColorPaleteItem <?php echo ($this->form_encode_input($this->agecolor) == '#FF0000')?'scFormColorPaleteItemChecked':'' ?>' valor='#FF0000' onclick='setaCorPaleta("agecolor", "#FF0000")' style='border-color:#FF0000;background-color:#FF0000; '></div><div class='colors_agecolor scFormColorPaleteItem <?php echo ($this->form_encode_input($this->agecolor) == '#FE2EF7')?'scFormColorPaleteItemChecked':'' ?>' valor='#FE2EF7' onclick='setaCorPaleta("agecolor", "#FE2EF7")' style='border-color:#FE2EF7;background-color:#FE2EF7; '></div><div class='colors_agecolor scFormColorPaleteItem <?php echo ($this->form_encode_input($this->agecolor) == '#08088A')?'scFormColorPaleteItemChecked':'' ?>' valor='#08088A' onclick='setaCorPaleta("agecolor", "#08088A")' style='border-color:#08088A;background-color:#08088A; '></div><div class='colors_agecolor scFormColorPaleteItem <?php echo ($this->form_encode_input($this->agecolor) == '#2E64FE')?'scFormColorPaleteItemChecked':'' ?>' valor='#2E64FE' onclick='setaCorPaleta("agecolor", "#2E64FE")' style='border-color:#2E64FE;background-color:#2E64FE; '></div><div class='colors_agecolor scFormColorPaleteItem <?php echo ($this->form_encode_input($this->agecolor) == '#00FFFF')?'scFormColorPaleteItemChecked':'' ?>' valor='#00FFFF' onclick='setaCorPaleta("agecolor", "#00FFFF")' style='border-color:#00FFFF;background-color:#00FFFF; '></div><div class='colors_agecolor scFormColorPaleteItem <?php echo ($this->form_encode_input($this->agecolor) == '#276D30')?'scFormColorPaleteItemChecked':'' ?>' valor='#276D30' onclick='setaCorPaleta("agecolor", "#276D30")' style='border-color:#276D30;background-color:#276D30; '></div><div class='colors_agecolor scFormColorPaleteItem <?php echo ($this->form_encode_input($this->agecolor) == '#01DF01')?'scFormColorPaleteItemChecked':'' ?>' valor='#01DF01' onclick='setaCorPaleta("agecolor", "#01DF01")' style='border-color:#01DF01;background-color:#01DF01; '></div><div class='colors_agecolor scFormColorPaleteItem <?php echo ($this->form_encode_input($this->agecolor) == '#BFFF00')?'scFormColorPaleteItemChecked':'' ?>' valor='#BFFF00' onclick='setaCorPaleta("agecolor", "#BFFF00")' style='border-color:#BFFF00;background-color:#BFFF00; '></div><div class='colors_agecolor scFormColorPaleteItem <?php echo ($this->form_encode_input($this->agecolor) == '#BDBDBD')?'scFormColorPaleteItemChecked':'' ?>' valor='#BDBDBD' onclick='setaCorPaleta("agecolor", "#BDBDBD")' style='border-color:#BDBDBD;background-color:#BDBDBD; '></div><div class='colors_agecolor scFormColorPaleteItem <?php echo ($this->form_encode_input($this->agecolor) == '')?'scFormColorPaleteItemChecked':'' ?>' valor='' onclick='setaCorPaleta("agecolor", "")' style='border-style:dotted;background-color:#fff; '></div></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agecolor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agecolor_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="2" >&nbsp;</TD>
<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } ?>
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
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['agefeccrea']))
           {
               $this->nmgp_cmp_readonly['agefeccrea'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['ageusumodi']))
           {
               $this->nmgp_cmp_readonly['ageusumodi'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['agefecmodi']))
           {
               $this->nmgp_cmp_readonly['agefecmodi'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['ageusucrea']))
    {
        $this->nm_new_label['ageusucrea'] = "USUARIO CREACIÓN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ageusucrea = $this->ageusucrea;
   $sStyleHidden_ageusucrea = '';
   if (isset($this->nmgp_cmp_hidden['ageusucrea']) && $this->nmgp_cmp_hidden['ageusucrea'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ageusucrea']);
       $sStyleHidden_ageusucrea = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ageusucrea = 'display: none;';
   $sStyleReadInp_ageusucrea = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["ageusucrea"]) &&  $this->nmgp_cmp_readonly["ageusucrea"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ageusucrea']);
       $sStyleReadLab_ageusucrea = '';
       $sStyleReadInp_ageusucrea = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ageusucrea']) && $this->nmgp_cmp_hidden['ageusucrea'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ageusucrea" value="<?php echo $this->form_encode_input($ageusucrea) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ageusucrea_label" id="hidden_field_label_ageusucrea" style="<?php echo $sStyleHidden_ageusucrea; ?>"><span id="id_label_ageusucrea"><?php echo $this->nm_new_label['ageusucrea']; ?></span></TD>
    <TD class="scFormDataOdd css_ageusucrea_line" id="hidden_field_data_ageusucrea" style="<?php echo $sStyleHidden_ageusucrea; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ageusucrea_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["ageusucrea"]) &&  $this->nmgp_cmp_readonly["ageusucrea"] == "on")) { 

 ?>
<input type="hidden" name="ageusucrea" value="<?php echo $this->form_encode_input($ageusucrea) . "\"><span id=\"id_ajax_label_ageusucrea\">" . $ageusucrea . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_ageusucrea" class="sc-ui-readonly-ageusucrea css_ageusucrea_line" style="<?php echo $sStyleReadLab_ageusucrea; ?>"><?php echo $this->form_format_readonly("ageusucrea", $this->form_encode_input($this->ageusucrea)); ?></span><span id="id_read_off_ageusucrea" class="css_read_off_ageusucrea" style="white-space: nowrap;<?php echo $sStyleReadInp_ageusucrea; ?>">
 <input class="sc-js-input scFormObjectOdd css_ageusucrea_obj" style="" id="id_sc_field_ageusucrea" type=text name="ageusucrea" value="<?php echo $this->form_encode_input($ageusucrea) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ageusucrea_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ageusucrea_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['agefeccrea']))
    {
        $this->nm_new_label['agefeccrea'] = "FECHA CREACIÓN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_agefeccrea = $this->agefeccrea;
   if (strlen($this->agefeccrea_hora) > 8 ) {$this->agefeccrea_hora = substr($this->agefeccrea_hora, 0, 8);}
   $this->agefeccrea .= ' ' . $this->agefeccrea_hora;
   $this->agefeccrea  = trim($this->agefeccrea);
   $agefeccrea = $this->agefeccrea;
   $sStyleHidden_agefeccrea = '';
   if (isset($this->nmgp_cmp_hidden['agefeccrea']) && $this->nmgp_cmp_hidden['agefeccrea'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agefeccrea']);
       $sStyleHidden_agefeccrea = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agefeccrea = 'display: none;';
   $sStyleReadInp_agefeccrea = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["agefeccrea"]) &&  $this->nmgp_cmp_readonly["agefeccrea"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agefeccrea']);
       $sStyleReadLab_agefeccrea = '';
       $sStyleReadInp_agefeccrea = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agefeccrea']) && $this->nmgp_cmp_hidden['agefeccrea'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="agefeccrea" value="<?php echo $this->form_encode_input($agefeccrea) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_agefeccrea_label" id="hidden_field_label_agefeccrea" style="<?php echo $sStyleHidden_agefeccrea; ?>"><span id="id_label_agefeccrea"><?php echo $this->nm_new_label['agefeccrea']; ?></span></TD>
    <TD class="scFormDataOdd css_agefeccrea_line" id="hidden_field_data_agefeccrea" style="<?php echo $sStyleHidden_agefeccrea; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agefeccrea_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["agefeccrea"]) &&  $this->nmgp_cmp_readonly["agefeccrea"] == "on")) { 

 ?>
<input type="hidden" name="agefeccrea" value="<?php echo $this->form_encode_input($agefeccrea) . "\"><span id=\"id_ajax_label_agefeccrea\">" . $agefeccrea . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_agefeccrea" class="sc-ui-readonly-agefeccrea css_agefeccrea_line" style="<?php echo $sStyleReadLab_agefeccrea; ?>"><?php echo $this->form_format_readonly("agefeccrea", $this->form_encode_input($agefeccrea)); ?></span><span id="id_read_off_agefeccrea" class="css_read_off_agefeccrea" style="white-space: nowrap;<?php echo $sStyleReadInp_agefeccrea; ?>"><?php
$tmp_form_data = $this->field_config['agefeccrea']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_agefeccrea_obj" style="" id="id_sc_field_agefeccrea" type=text name="agefeccrea" value="<?php echo $this->form_encode_input($agefeccrea) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['agefeccrea']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['agefeccrea']['date_format']; ?>', timeSep: '<?php echo $this->field_config['agefeccrea']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agefeccrea_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agefeccrea_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->agefeccrea = $old_dt_agefeccrea;
?>

   <?php
    if (!isset($this->nm_new_label['ageusumodi']))
    {
        $this->nm_new_label['ageusumodi'] = "USUARIO MODIFICACIÓN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ageusumodi = $this->ageusumodi;
   $sStyleHidden_ageusumodi = '';
   if (isset($this->nmgp_cmp_hidden['ageusumodi']) && $this->nmgp_cmp_hidden['ageusumodi'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ageusumodi']);
       $sStyleHidden_ageusumodi = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ageusumodi = 'display: none;';
   $sStyleReadInp_ageusumodi = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["ageusumodi"]) &&  $this->nmgp_cmp_readonly["ageusumodi"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ageusumodi']);
       $sStyleReadLab_ageusumodi = '';
       $sStyleReadInp_ageusumodi = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ageusumodi']) && $this->nmgp_cmp_hidden['ageusumodi'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ageusumodi" value="<?php echo $this->form_encode_input($ageusumodi) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ageusumodi_label" id="hidden_field_label_ageusumodi" style="<?php echo $sStyleHidden_ageusumodi; ?>"><span id="id_label_ageusumodi"><?php echo $this->nm_new_label['ageusumodi']; ?></span></TD>
    <TD class="scFormDataOdd css_ageusumodi_line" id="hidden_field_data_ageusumodi" style="<?php echo $sStyleHidden_ageusumodi; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ageusumodi_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["ageusumodi"]) &&  $this->nmgp_cmp_readonly["ageusumodi"] == "on")) { 

 ?>
<input type="hidden" name="ageusumodi" value="<?php echo $this->form_encode_input($ageusumodi) . "\"><span id=\"id_ajax_label_ageusumodi\">" . $ageusumodi . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_ageusumodi" class="sc-ui-readonly-ageusumodi css_ageusumodi_line" style="<?php echo $sStyleReadLab_ageusumodi; ?>"><?php echo $this->form_format_readonly("ageusumodi", $this->form_encode_input($this->ageusumodi)); ?></span><span id="id_read_off_ageusumodi" class="css_read_off_ageusumodi" style="white-space: nowrap;<?php echo $sStyleReadInp_ageusumodi; ?>">
 <input class="sc-js-input scFormObjectOdd css_ageusumodi_obj" style="" id="id_sc_field_ageusumodi" type=text name="ageusumodi" value="<?php echo $this->form_encode_input($ageusumodi) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ageusumodi_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ageusumodi_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['agefecmodi']))
    {
        $this->nm_new_label['agefecmodi'] = "FECHA MODIFICACIÓN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_agefecmodi = $this->agefecmodi;
   if (strlen($this->agefecmodi_hora) > 8 ) {$this->agefecmodi_hora = substr($this->agefecmodi_hora, 0, 8);}
   $this->agefecmodi .= ' ' . $this->agefecmodi_hora;
   $this->agefecmodi  = trim($this->agefecmodi);
   $agefecmodi = $this->agefecmodi;
   $sStyleHidden_agefecmodi = '';
   if (isset($this->nmgp_cmp_hidden['agefecmodi']) && $this->nmgp_cmp_hidden['agefecmodi'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agefecmodi']);
       $sStyleHidden_agefecmodi = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agefecmodi = 'display: none;';
   $sStyleReadInp_agefecmodi = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["agefecmodi"]) &&  $this->nmgp_cmp_readonly["agefecmodi"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agefecmodi']);
       $sStyleReadLab_agefecmodi = '';
       $sStyleReadInp_agefecmodi = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agefecmodi']) && $this->nmgp_cmp_hidden['agefecmodi'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="agefecmodi" value="<?php echo $this->form_encode_input($agefecmodi) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_agefecmodi_label" id="hidden_field_label_agefecmodi" style="<?php echo $sStyleHidden_agefecmodi; ?>"><span id="id_label_agefecmodi"><?php echo $this->nm_new_label['agefecmodi']; ?></span></TD>
    <TD class="scFormDataOdd css_agefecmodi_line" id="hidden_field_data_agefecmodi" style="<?php echo $sStyleHidden_agefecmodi; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agefecmodi_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["agefecmodi"]) &&  $this->nmgp_cmp_readonly["agefecmodi"] == "on")) { 

 ?>
<input type="hidden" name="agefecmodi" value="<?php echo $this->form_encode_input($agefecmodi) . "\"><span id=\"id_ajax_label_agefecmodi\">" . $agefecmodi . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_agefecmodi" class="sc-ui-readonly-agefecmodi css_agefecmodi_line" style="<?php echo $sStyleReadLab_agefecmodi; ?>"><?php echo $this->form_format_readonly("agefecmodi", $this->form_encode_input($agefecmodi)); ?></span><span id="id_read_off_agefecmodi" class="css_read_off_agefecmodi" style="white-space: nowrap;<?php echo $sStyleReadInp_agefecmodi; ?>"><?php
$tmp_form_data = $this->field_config['agefecmodi']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_agefecmodi_obj" style="" id="id_sc_field_agefecmodi" type=text name="agefecmodi" value="<?php echo $this->form_encode_input($agefecmodi) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['agefecmodi']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['agefecmodi']['date_format']; ?>', timeSep: '<?php echo $this->field_config['agefecmodi']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agefecmodi_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agefecmodi_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->agefecmodi = $old_dt_agefecmodi;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="7" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">DÍAS DISPONIBLES</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['agelunactivo']))
   {
       $this->nm_new_label['agelunactivo'] = "LUNES";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $agelunactivo = $this->agelunactivo;
   $sStyleHidden_agelunactivo = '';
   if (isset($this->nmgp_cmp_hidden['agelunactivo']) && $this->nmgp_cmp_hidden['agelunactivo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agelunactivo']);
       $sStyleHidden_agelunactivo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agelunactivo = 'display: none;';
   $sStyleReadInp_agelunactivo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['agelunactivo']) && $this->nmgp_cmp_readonly['agelunactivo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agelunactivo']);
       $sStyleReadLab_agelunactivo = '';
       $sStyleReadInp_agelunactivo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agelunactivo']) && $this->nmgp_cmp_hidden['agelunactivo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="agelunactivo" value="<?php echo $this->form_encode_input($this->agelunactivo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->agelunactivo_1 = explode(";", trim($this->agelunactivo));
  } 
  else
  {
      if (empty($this->agelunactivo))
      {
          $this->agelunactivo_1= array(); 
          $this->agelunactivo= "";
      } 
      else
      {
          $this->agelunactivo_1= $this->agelunactivo; 
          $this->agelunactivo= ""; 
          foreach ($this->agelunactivo_1 as $cada_agelunactivo)
          {
             if (!empty($agelunactivo))
             {
                 $this->agelunactivo.= ";"; 
             } 
             $this->agelunactivo.= $cada_agelunactivo; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_agelunactivo_line" id="hidden_field_data_agelunactivo" style="<?php echo $sStyleHidden_agelunactivo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agelunactivo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_agelunactivo_label" style=""><span id="id_label_agelunactivo"><?php echo $this->nm_new_label['agelunactivo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agelunactivo"]) &&  $this->nmgp_cmp_readonly["agelunactivo"] == "on") { 

$agelunactivo_look = "";
 if ($this->agelunactivo == "1") { $agelunactivo_look .= "" ;} 
 if (empty($agelunactivo_look)) { $agelunactivo_look = $this->agelunactivo; }
?>
<input type="hidden" name="agelunactivo" value="<?php echo $this->form_encode_input($agelunactivo) . "\">" . $agelunactivo_look . ""; ?>
<?php } else { ?>

<?php

$agelunactivo_look = "";
 if ($this->agelunactivo == "1") { $agelunactivo_look .= "" ;} 
 if (empty($agelunactivo_look)) { $agelunactivo_look = $this->agelunactivo; }
?>
<span id="id_read_on_agelunactivo" class="css_agelunactivo_line" style="<?php echo $sStyleReadLab_agelunactivo; ?>"><?php echo $this->form_format_readonly("agelunactivo", $this->form_encode_input($agelunactivo_look)); ?></span><span id="id_read_off_agelunactivo" class="css_read_off_agelunactivo css_agelunactivo_line" style="<?php echo $sStyleReadInp_agelunactivo; ?>"><?php echo "<div id=\"idAjaxCheckbox_agelunactivo\" style=\"display: inline-block\" class=\"css_agelunactivo_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_agelunactivo_line"><?php $tempOptionId = "id-opt-agelunactivo" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-agelunactivo sc-ui-checkbox-agelunactivo" name="agelunactivo[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_agelunactivo'][] = '1'; ?>
<?php  if (in_array("1", $this->agelunactivo_1))  { echo " checked" ;} ?> onClick="do_ajax_form_agenda_event_agelunactivo_onclick();" ><span></span>
<label for="<?php echo $tempOptionId ?>"></label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agelunactivo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agelunactivo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['agemaractivo']))
   {
       $this->nm_new_label['agemaractivo'] = "MARTES";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $agemaractivo = $this->agemaractivo;
   $sStyleHidden_agemaractivo = '';
   if (isset($this->nmgp_cmp_hidden['agemaractivo']) && $this->nmgp_cmp_hidden['agemaractivo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agemaractivo']);
       $sStyleHidden_agemaractivo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agemaractivo = 'display: none;';
   $sStyleReadInp_agemaractivo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['agemaractivo']) && $this->nmgp_cmp_readonly['agemaractivo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agemaractivo']);
       $sStyleReadLab_agemaractivo = '';
       $sStyleReadInp_agemaractivo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agemaractivo']) && $this->nmgp_cmp_hidden['agemaractivo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="agemaractivo" value="<?php echo $this->form_encode_input($this->agemaractivo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->agemaractivo_1 = explode(";", trim($this->agemaractivo));
  } 
  else
  {
      if (empty($this->agemaractivo))
      {
          $this->agemaractivo_1= array(); 
          $this->agemaractivo= "";
      } 
      else
      {
          $this->agemaractivo_1= $this->agemaractivo; 
          $this->agemaractivo= ""; 
          foreach ($this->agemaractivo_1 as $cada_agemaractivo)
          {
             if (!empty($agemaractivo))
             {
                 $this->agemaractivo.= ";"; 
             } 
             $this->agemaractivo.= $cada_agemaractivo; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_agemaractivo_line" id="hidden_field_data_agemaractivo" style="<?php echo $sStyleHidden_agemaractivo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agemaractivo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_agemaractivo_label" style=""><span id="id_label_agemaractivo"><?php echo $this->nm_new_label['agemaractivo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agemaractivo"]) &&  $this->nmgp_cmp_readonly["agemaractivo"] == "on") { 

$agemaractivo_look = "";
 if ($this->agemaractivo == "1") { $agemaractivo_look .= "" ;} 
 if (empty($agemaractivo_look)) { $agemaractivo_look = $this->agemaractivo; }
?>
<input type="hidden" name="agemaractivo" value="<?php echo $this->form_encode_input($agemaractivo) . "\">" . $agemaractivo_look . ""; ?>
<?php } else { ?>

<?php

$agemaractivo_look = "";
 if ($this->agemaractivo == "1") { $agemaractivo_look .= "" ;} 
 if (empty($agemaractivo_look)) { $agemaractivo_look = $this->agemaractivo; }
?>
<span id="id_read_on_agemaractivo" class="css_agemaractivo_line" style="<?php echo $sStyleReadLab_agemaractivo; ?>"><?php echo $this->form_format_readonly("agemaractivo", $this->form_encode_input($agemaractivo_look)); ?></span><span id="id_read_off_agemaractivo" class="css_read_off_agemaractivo css_agemaractivo_line" style="<?php echo $sStyleReadInp_agemaractivo; ?>"><?php echo "<div id=\"idAjaxCheckbox_agemaractivo\" style=\"display: inline-block\" class=\"css_agemaractivo_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_agemaractivo_line"><?php $tempOptionId = "id-opt-agemaractivo" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-agemaractivo sc-ui-checkbox-agemaractivo" name="agemaractivo[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_agemaractivo'][] = '1'; ?>
<?php  if (in_array("1", $this->agemaractivo_1))  { echo " checked" ;} ?> onClick="do_ajax_form_agenda_event_agemaractivo_onclick();" ><span></span>
<label for="<?php echo $tempOptionId ?>"></label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agemaractivo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agemaractivo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['agemieactivo']))
   {
       $this->nm_new_label['agemieactivo'] = "MIÉRCOLES";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $agemieactivo = $this->agemieactivo;
   $sStyleHidden_agemieactivo = '';
   if (isset($this->nmgp_cmp_hidden['agemieactivo']) && $this->nmgp_cmp_hidden['agemieactivo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agemieactivo']);
       $sStyleHidden_agemieactivo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agemieactivo = 'display: none;';
   $sStyleReadInp_agemieactivo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['agemieactivo']) && $this->nmgp_cmp_readonly['agemieactivo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agemieactivo']);
       $sStyleReadLab_agemieactivo = '';
       $sStyleReadInp_agemieactivo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agemieactivo']) && $this->nmgp_cmp_hidden['agemieactivo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="agemieactivo" value="<?php echo $this->form_encode_input($this->agemieactivo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->agemieactivo_1 = explode(";", trim($this->agemieactivo));
  } 
  else
  {
      if (empty($this->agemieactivo))
      {
          $this->agemieactivo_1= array(); 
          $this->agemieactivo= "";
      } 
      else
      {
          $this->agemieactivo_1= $this->agemieactivo; 
          $this->agemieactivo= ""; 
          foreach ($this->agemieactivo_1 as $cada_agemieactivo)
          {
             if (!empty($agemieactivo))
             {
                 $this->agemieactivo.= ";"; 
             } 
             $this->agemieactivo.= $cada_agemieactivo; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_agemieactivo_line" id="hidden_field_data_agemieactivo" style="<?php echo $sStyleHidden_agemieactivo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agemieactivo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_agemieactivo_label" style=""><span id="id_label_agemieactivo"><?php echo $this->nm_new_label['agemieactivo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agemieactivo"]) &&  $this->nmgp_cmp_readonly["agemieactivo"] == "on") { 

$agemieactivo_look = "";
 if ($this->agemieactivo == "1") { $agemieactivo_look .= "" ;} 
 if (empty($agemieactivo_look)) { $agemieactivo_look = $this->agemieactivo; }
?>
<input type="hidden" name="agemieactivo" value="<?php echo $this->form_encode_input($agemieactivo) . "\">" . $agemieactivo_look . ""; ?>
<?php } else { ?>

<?php

$agemieactivo_look = "";
 if ($this->agemieactivo == "1") { $agemieactivo_look .= "" ;} 
 if (empty($agemieactivo_look)) { $agemieactivo_look = $this->agemieactivo; }
?>
<span id="id_read_on_agemieactivo" class="css_agemieactivo_line" style="<?php echo $sStyleReadLab_agemieactivo; ?>"><?php echo $this->form_format_readonly("agemieactivo", $this->form_encode_input($agemieactivo_look)); ?></span><span id="id_read_off_agemieactivo" class="css_read_off_agemieactivo css_agemieactivo_line" style="<?php echo $sStyleReadInp_agemieactivo; ?>"><?php echo "<div id=\"idAjaxCheckbox_agemieactivo\" style=\"display: inline-block\" class=\"css_agemieactivo_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_agemieactivo_line"><?php $tempOptionId = "id-opt-agemieactivo" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-agemieactivo sc-ui-checkbox-agemieactivo" name="agemieactivo[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_agemieactivo'][] = '1'; ?>
<?php  if (in_array("1", $this->agemieactivo_1))  { echo " checked" ;} ?> onClick="do_ajax_form_agenda_event_agemieactivo_onclick();" ><span></span>
<label for="<?php echo $tempOptionId ?>"></label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agemieactivo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agemieactivo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['agejueactivo']))
   {
       $this->nm_new_label['agejueactivo'] = "JUEVES";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $agejueactivo = $this->agejueactivo;
   $sStyleHidden_agejueactivo = '';
   if (isset($this->nmgp_cmp_hidden['agejueactivo']) && $this->nmgp_cmp_hidden['agejueactivo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agejueactivo']);
       $sStyleHidden_agejueactivo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agejueactivo = 'display: none;';
   $sStyleReadInp_agejueactivo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['agejueactivo']) && $this->nmgp_cmp_readonly['agejueactivo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agejueactivo']);
       $sStyleReadLab_agejueactivo = '';
       $sStyleReadInp_agejueactivo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agejueactivo']) && $this->nmgp_cmp_hidden['agejueactivo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="agejueactivo" value="<?php echo $this->form_encode_input($this->agejueactivo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->agejueactivo_1 = explode(";", trim($this->agejueactivo));
  } 
  else
  {
      if (empty($this->agejueactivo))
      {
          $this->agejueactivo_1= array(); 
          $this->agejueactivo= "";
      } 
      else
      {
          $this->agejueactivo_1= $this->agejueactivo; 
          $this->agejueactivo= ""; 
          foreach ($this->agejueactivo_1 as $cada_agejueactivo)
          {
             if (!empty($agejueactivo))
             {
                 $this->agejueactivo.= ";"; 
             } 
             $this->agejueactivo.= $cada_agejueactivo; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_agejueactivo_line" id="hidden_field_data_agejueactivo" style="<?php echo $sStyleHidden_agejueactivo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agejueactivo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_agejueactivo_label" style=""><span id="id_label_agejueactivo"><?php echo $this->nm_new_label['agejueactivo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agejueactivo"]) &&  $this->nmgp_cmp_readonly["agejueactivo"] == "on") { 

$agejueactivo_look = "";
 if ($this->agejueactivo == "1") { $agejueactivo_look .= "" ;} 
 if (empty($agejueactivo_look)) { $agejueactivo_look = $this->agejueactivo; }
?>
<input type="hidden" name="agejueactivo" value="<?php echo $this->form_encode_input($agejueactivo) . "\">" . $agejueactivo_look . ""; ?>
<?php } else { ?>

<?php

$agejueactivo_look = "";
 if ($this->agejueactivo == "1") { $agejueactivo_look .= "" ;} 
 if (empty($agejueactivo_look)) { $agejueactivo_look = $this->agejueactivo; }
?>
<span id="id_read_on_agejueactivo" class="css_agejueactivo_line" style="<?php echo $sStyleReadLab_agejueactivo; ?>"><?php echo $this->form_format_readonly("agejueactivo", $this->form_encode_input($agejueactivo_look)); ?></span><span id="id_read_off_agejueactivo" class="css_read_off_agejueactivo css_agejueactivo_line" style="<?php echo $sStyleReadInp_agejueactivo; ?>"><?php echo "<div id=\"idAjaxCheckbox_agejueactivo\" style=\"display: inline-block\" class=\"css_agejueactivo_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_agejueactivo_line"><?php $tempOptionId = "id-opt-agejueactivo" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-agejueactivo sc-ui-checkbox-agejueactivo" name="agejueactivo[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_agejueactivo'][] = '1'; ?>
<?php  if (in_array("1", $this->agejueactivo_1))  { echo " checked" ;} ?> onClick="do_ajax_form_agenda_event_agejueactivo_onclick();" ><span></span>
<label for="<?php echo $tempOptionId ?>"></label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agejueactivo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agejueactivo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['agevieactivo']))
   {
       $this->nm_new_label['agevieactivo'] = "VIERNES";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $agevieactivo = $this->agevieactivo;
   $sStyleHidden_agevieactivo = '';
   if (isset($this->nmgp_cmp_hidden['agevieactivo']) && $this->nmgp_cmp_hidden['agevieactivo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agevieactivo']);
       $sStyleHidden_agevieactivo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agevieactivo = 'display: none;';
   $sStyleReadInp_agevieactivo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['agevieactivo']) && $this->nmgp_cmp_readonly['agevieactivo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agevieactivo']);
       $sStyleReadLab_agevieactivo = '';
       $sStyleReadInp_agevieactivo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agevieactivo']) && $this->nmgp_cmp_hidden['agevieactivo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="agevieactivo" value="<?php echo $this->form_encode_input($this->agevieactivo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->agevieactivo_1 = explode(";", trim($this->agevieactivo));
  } 
  else
  {
      if (empty($this->agevieactivo))
      {
          $this->agevieactivo_1= array(); 
          $this->agevieactivo= "";
      } 
      else
      {
          $this->agevieactivo_1= $this->agevieactivo; 
          $this->agevieactivo= ""; 
          foreach ($this->agevieactivo_1 as $cada_agevieactivo)
          {
             if (!empty($agevieactivo))
             {
                 $this->agevieactivo.= ";"; 
             } 
             $this->agevieactivo.= $cada_agevieactivo; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_agevieactivo_line" id="hidden_field_data_agevieactivo" style="<?php echo $sStyleHidden_agevieactivo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agevieactivo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_agevieactivo_label" style=""><span id="id_label_agevieactivo"><?php echo $this->nm_new_label['agevieactivo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agevieactivo"]) &&  $this->nmgp_cmp_readonly["agevieactivo"] == "on") { 

$agevieactivo_look = "";
 if ($this->agevieactivo == "1") { $agevieactivo_look .= "" ;} 
 if (empty($agevieactivo_look)) { $agevieactivo_look = $this->agevieactivo; }
?>
<input type="hidden" name="agevieactivo" value="<?php echo $this->form_encode_input($agevieactivo) . "\">" . $agevieactivo_look . ""; ?>
<?php } else { ?>

<?php

$agevieactivo_look = "";
 if ($this->agevieactivo == "1") { $agevieactivo_look .= "" ;} 
 if (empty($agevieactivo_look)) { $agevieactivo_look = $this->agevieactivo; }
?>
<span id="id_read_on_agevieactivo" class="css_agevieactivo_line" style="<?php echo $sStyleReadLab_agevieactivo; ?>"><?php echo $this->form_format_readonly("agevieactivo", $this->form_encode_input($agevieactivo_look)); ?></span><span id="id_read_off_agevieactivo" class="css_read_off_agevieactivo css_agevieactivo_line" style="<?php echo $sStyleReadInp_agevieactivo; ?>"><?php echo "<div id=\"idAjaxCheckbox_agevieactivo\" style=\"display: inline-block\" class=\"css_agevieactivo_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_agevieactivo_line"><?php $tempOptionId = "id-opt-agevieactivo" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-agevieactivo sc-ui-checkbox-agevieactivo" name="agevieactivo[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_agevieactivo'][] = '1'; ?>
<?php  if (in_array("1", $this->agevieactivo_1))  { echo " checked" ;} ?> onClick="do_ajax_form_agenda_event_agevieactivo_onclick();" ><span></span>
<label for="<?php echo $tempOptionId ?>"></label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agevieactivo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agevieactivo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['agesabactivo']))
   {
       $this->nm_new_label['agesabactivo'] = "SÁBADO";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $agesabactivo = $this->agesabactivo;
   $sStyleHidden_agesabactivo = '';
   if (isset($this->nmgp_cmp_hidden['agesabactivo']) && $this->nmgp_cmp_hidden['agesabactivo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agesabactivo']);
       $sStyleHidden_agesabactivo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agesabactivo = 'display: none;';
   $sStyleReadInp_agesabactivo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['agesabactivo']) && $this->nmgp_cmp_readonly['agesabactivo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agesabactivo']);
       $sStyleReadLab_agesabactivo = '';
       $sStyleReadInp_agesabactivo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agesabactivo']) && $this->nmgp_cmp_hidden['agesabactivo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="agesabactivo" value="<?php echo $this->form_encode_input($this->agesabactivo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->agesabactivo_1 = explode(";", trim($this->agesabactivo));
  } 
  else
  {
      if (empty($this->agesabactivo))
      {
          $this->agesabactivo_1= array(); 
      } 
      else
      {
          $this->agesabactivo_1= $this->agesabactivo; 
          $this->agesabactivo= ""; 
          foreach ($this->agesabactivo_1 as $cada_agesabactivo)
          {
             if (!empty($agesabactivo))
             {
                 $this->agesabactivo.= ";"; 
             } 
             $this->agesabactivo.= $cada_agesabactivo; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_agesabactivo_line" id="hidden_field_data_agesabactivo" style="<?php echo $sStyleHidden_agesabactivo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agesabactivo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_agesabactivo_label" style=""><span id="id_label_agesabactivo"><?php echo $this->nm_new_label['agesabactivo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agesabactivo"]) &&  $this->nmgp_cmp_readonly["agesabactivo"] == "on") { 

$agesabactivo_look = "";
 if (in_array("1", $this->agesabactivo_1))  { $agesabactivo_look .= "<br />";} 
?>
<input type="hidden" name="agesabactivo" value="<?php echo $this->form_encode_input($agesabactivo) . "\">" . $agesabactivo_look . ""; ?>
<?php } else { ?>

<?php

$agesabactivo_look = "";
 if (in_array("1", $this->agesabactivo_1))  { $agesabactivo_look .= "<br />";} 
?>
<span id="id_read_on_agesabactivo" class="css_agesabactivo_line" style="<?php echo $sStyleReadLab_agesabactivo; ?>"><?php echo $this->form_format_readonly("agesabactivo", $this->form_encode_input($agesabactivo_look)); ?></span><span id="id_read_off_agesabactivo" class="css_read_off_agesabactivo css_agesabactivo_line" style="<?php echo $sStyleReadInp_agesabactivo; ?>"><?php echo "<div id=\"idAjaxCheckbox_agesabactivo\" style=\"display: inline-block\" class=\"css_agesabactivo_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_agesabactivo_line"><?php $tempOptionId = "id-opt-agesabactivo" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-agesabactivo sc-ui-checkbox-agesabactivo" name="agesabactivo[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_agesabactivo'][] = '1'; ?>
<?php  if (in_array("1", $this->agesabactivo_1))  { echo " checked" ;} ?> onClick="do_ajax_form_agenda_event_agesabactivo_onclick();" ><span></span>
<label for="<?php echo $tempOptionId ?>"></label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agesabactivo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agesabactivo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['agedomactivo']))
   {
       $this->nm_new_label['agedomactivo'] = "DOMINGO";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $agedomactivo = $this->agedomactivo;
   $sStyleHidden_agedomactivo = '';
   if (isset($this->nmgp_cmp_hidden['agedomactivo']) && $this->nmgp_cmp_hidden['agedomactivo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agedomactivo']);
       $sStyleHidden_agedomactivo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agedomactivo = 'display: none;';
   $sStyleReadInp_agedomactivo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['agedomactivo']) && $this->nmgp_cmp_readonly['agedomactivo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agedomactivo']);
       $sStyleReadLab_agedomactivo = '';
       $sStyleReadInp_agedomactivo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agedomactivo']) && $this->nmgp_cmp_hidden['agedomactivo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="agedomactivo" value="<?php echo $this->form_encode_input($this->agedomactivo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->agedomactivo_1 = explode(";", trim($this->agedomactivo));
  } 
  else
  {
      if (empty($this->agedomactivo))
      {
          $this->agedomactivo_1= array(); 
          $this->agedomactivo= "";
      } 
      else
      {
          $this->agedomactivo_1= $this->agedomactivo; 
          $this->agedomactivo= ""; 
          foreach ($this->agedomactivo_1 as $cada_agedomactivo)
          {
             if (!empty($agedomactivo))
             {
                 $this->agedomactivo.= ";"; 
             } 
             $this->agedomactivo.= $cada_agedomactivo; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_agedomactivo_line" id="hidden_field_data_agedomactivo" style="<?php echo $sStyleHidden_agedomactivo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agedomactivo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_agedomactivo_label" style=""><span id="id_label_agedomactivo"><?php echo $this->nm_new_label['agedomactivo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agedomactivo"]) &&  $this->nmgp_cmp_readonly["agedomactivo"] == "on") { 

$agedomactivo_look = "";
 if ($this->agedomactivo == "1") { $agedomactivo_look .= "" ;} 
 if (empty($agedomactivo_look)) { $agedomactivo_look = $this->agedomactivo; }
?>
<input type="hidden" name="agedomactivo" value="<?php echo $this->form_encode_input($agedomactivo) . "\">" . $agedomactivo_look . ""; ?>
<?php } else { ?>

<?php

$agedomactivo_look = "";
 if ($this->agedomactivo == "1") { $agedomactivo_look .= "" ;} 
 if (empty($agedomactivo_look)) { $agedomactivo_look = $this->agedomactivo; }
?>
<span id="id_read_on_agedomactivo" class="css_agedomactivo_line" style="<?php echo $sStyleReadLab_agedomactivo; ?>"><?php echo $this->form_format_readonly("agedomactivo", $this->form_encode_input($agedomactivo_look)); ?></span><span id="id_read_off_agedomactivo" class="css_read_off_agedomactivo css_agedomactivo_line" style="<?php echo $sStyleReadInp_agedomactivo; ?>"><?php echo "<div id=\"idAjaxCheckbox_agedomactivo\" style=\"display: inline-block\" class=\"css_agedomactivo_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_agedomactivo_line"><?php $tempOptionId = "id-opt-agedomactivo" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-agedomactivo sc-ui-checkbox-agedomactivo" name="agedomactivo[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['Lookup_agedomactivo'][] = '1'; ?>
<?php  if (in_array("1", $this->agedomactivo_1))  { echo " checked" ;} ?> onClick="do_ajax_form_agenda_event_agedomactivo_onclick();" ><span></span>
<label for="<?php echo $tempOptionId ?>"></label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agedomactivo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agedomactivo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_agelunactivo_dumb = ('' == $sStyleHidden_agelunactivo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_agelunactivo_dumb" style="<?php echo $sStyleHidden_agelunactivo_dumb; ?>"></TD>
<?php $sStyleHidden_agemaractivo_dumb = ('' == $sStyleHidden_agemaractivo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_agemaractivo_dumb" style="<?php echo $sStyleHidden_agemaractivo_dumb; ?>"></TD>
<?php $sStyleHidden_agemieactivo_dumb = ('' == $sStyleHidden_agemieactivo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_agemieactivo_dumb" style="<?php echo $sStyleHidden_agemieactivo_dumb; ?>"></TD>
<?php $sStyleHidden_agejueactivo_dumb = ('' == $sStyleHidden_agejueactivo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_agejueactivo_dumb" style="<?php echo $sStyleHidden_agejueactivo_dumb; ?>"></TD>
<?php $sStyleHidden_agevieactivo_dumb = ('' == $sStyleHidden_agevieactivo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_agevieactivo_dumb" style="<?php echo $sStyleHidden_agevieactivo_dumb; ?>"></TD>
<?php $sStyleHidden_agesabactivo_dumb = ('' == $sStyleHidden_agesabactivo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_agesabactivo_dumb" style="<?php echo $sStyleHidden_agesabactivo_dumb; ?>"></TD>
<?php $sStyleHidden_agedomactivo_dumb = ('' == $sStyleHidden_agedomactivo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_agedomactivo_dumb" style="<?php echo $sStyleHidden_agedomactivo_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_3"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="4" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">LUNES</TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['agelunini']))
    {
        $this->nm_new_label['agelunini'] = "HORA INICIO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $agelunini = $this->agelunini;
   $sStyleHidden_agelunini = '';
   if (isset($this->nmgp_cmp_hidden['agelunini']) && $this->nmgp_cmp_hidden['agelunini'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agelunini']);
       $sStyleHidden_agelunini = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agelunini = 'display: none;';
   $sStyleReadInp_agelunini = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['agelunini']) && $this->nmgp_cmp_readonly['agelunini'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agelunini']);
       $sStyleReadLab_agelunini = '';
       $sStyleReadInp_agelunini = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agelunini']) && $this->nmgp_cmp_hidden['agelunini'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="agelunini" value="<?php echo $this->form_encode_input($agelunini) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_agelunini_label" id="hidden_field_label_agelunini" style="<?php echo $sStyleHidden_agelunini; ?>"><span id="id_label_agelunini"><?php echo $this->nm_new_label['agelunini']; ?></span></TD>
    <TD class="scFormDataOdd css_agelunini_line" id="hidden_field_data_agelunini" style="<?php echo $sStyleHidden_agelunini; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agelunini_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agelunini"]) &&  $this->nmgp_cmp_readonly["agelunini"] == "on") { 

 ?>
<input type="hidden" name="agelunini" value="<?php echo $this->form_encode_input($agelunini) . "\">" . $agelunini . ""; ?>
<?php } else { ?>
<span id="id_read_on_agelunini" class="sc-ui-readonly-agelunini css_agelunini_line" style="<?php echo $sStyleReadLab_agelunini; ?>"><?php echo $this->form_format_readonly("agelunini", $this->form_encode_input($agelunini)); ?></span><span id="id_read_off_agelunini" class="css_read_off_agelunini" style="white-space: nowrap;<?php echo $sStyleReadInp_agelunini; ?>"><?php
$tmp_form_data = $this->field_config['agelunini']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_agelunini_obj" style="" id="id_sc_field_agelunini" type=text name="agelunini" value="<?php echo $this->form_encode_input($agelunini) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['agelunini']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['agelunini']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agelunini_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agelunini_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['agelunfin']))
    {
        $this->nm_new_label['agelunfin'] = "HORA FIN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $agelunfin = $this->agelunfin;
   $sStyleHidden_agelunfin = '';
   if (isset($this->nmgp_cmp_hidden['agelunfin']) && $this->nmgp_cmp_hidden['agelunfin'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agelunfin']);
       $sStyleHidden_agelunfin = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agelunfin = 'display: none;';
   $sStyleReadInp_agelunfin = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['agelunfin']) && $this->nmgp_cmp_readonly['agelunfin'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agelunfin']);
       $sStyleReadLab_agelunfin = '';
       $sStyleReadInp_agelunfin = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agelunfin']) && $this->nmgp_cmp_hidden['agelunfin'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="agelunfin" value="<?php echo $this->form_encode_input($agelunfin) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_agelunfin_label" id="hidden_field_label_agelunfin" style="<?php echo $sStyleHidden_agelunfin; ?>"><span id="id_label_agelunfin"><?php echo $this->nm_new_label['agelunfin']; ?></span></TD>
    <TD class="scFormDataOdd css_agelunfin_line" id="hidden_field_data_agelunfin" style="<?php echo $sStyleHidden_agelunfin; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agelunfin_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agelunfin"]) &&  $this->nmgp_cmp_readonly["agelunfin"] == "on") { 

 ?>
<input type="hidden" name="agelunfin" value="<?php echo $this->form_encode_input($agelunfin) . "\">" . $agelunfin . ""; ?>
<?php } else { ?>
<span id="id_read_on_agelunfin" class="sc-ui-readonly-agelunfin css_agelunfin_line" style="<?php echo $sStyleReadLab_agelunfin; ?>"><?php echo $this->form_format_readonly("agelunfin", $this->form_encode_input($agelunfin)); ?></span><span id="id_read_off_agelunfin" class="css_read_off_agelunfin" style="white-space: nowrap;<?php echo $sStyleReadInp_agelunfin; ?>"><?php
$tmp_form_data = $this->field_config['agelunfin']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_agelunfin_obj" style="" id="id_sc_field_agelunfin" type=text name="agelunfin" value="<?php echo $this->form_encode_input($agelunfin) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['agelunfin']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['agelunfin']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agelunfin_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agelunfin_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_4"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_4" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="4" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">MARTES</TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['agemarini']))
    {
        $this->nm_new_label['agemarini'] = "HORA INICIO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $agemarini = $this->agemarini;
   $sStyleHidden_agemarini = '';
   if (isset($this->nmgp_cmp_hidden['agemarini']) && $this->nmgp_cmp_hidden['agemarini'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agemarini']);
       $sStyleHidden_agemarini = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agemarini = 'display: none;';
   $sStyleReadInp_agemarini = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['agemarini']) && $this->nmgp_cmp_readonly['agemarini'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agemarini']);
       $sStyleReadLab_agemarini = '';
       $sStyleReadInp_agemarini = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agemarini']) && $this->nmgp_cmp_hidden['agemarini'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="agemarini" value="<?php echo $this->form_encode_input($agemarini) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_agemarini_label" id="hidden_field_label_agemarini" style="<?php echo $sStyleHidden_agemarini; ?>"><span id="id_label_agemarini"><?php echo $this->nm_new_label['agemarini']; ?></span></TD>
    <TD class="scFormDataOdd css_agemarini_line" id="hidden_field_data_agemarini" style="<?php echo $sStyleHidden_agemarini; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agemarini_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agemarini"]) &&  $this->nmgp_cmp_readonly["agemarini"] == "on") { 

 ?>
<input type="hidden" name="agemarini" value="<?php echo $this->form_encode_input($agemarini) . "\">" . $agemarini . ""; ?>
<?php } else { ?>
<span id="id_read_on_agemarini" class="sc-ui-readonly-agemarini css_agemarini_line" style="<?php echo $sStyleReadLab_agemarini; ?>"><?php echo $this->form_format_readonly("agemarini", $this->form_encode_input($agemarini)); ?></span><span id="id_read_off_agemarini" class="css_read_off_agemarini" style="white-space: nowrap;<?php echo $sStyleReadInp_agemarini; ?>"><?php
$tmp_form_data = $this->field_config['agemarini']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_agemarini_obj" style="" id="id_sc_field_agemarini" type=text name="agemarini" value="<?php echo $this->form_encode_input($agemarini) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['agemarini']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['agemarini']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agemarini_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agemarini_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['agemarfin']))
    {
        $this->nm_new_label['agemarfin'] = "HORA FIN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $agemarfin = $this->agemarfin;
   $sStyleHidden_agemarfin = '';
   if (isset($this->nmgp_cmp_hidden['agemarfin']) && $this->nmgp_cmp_hidden['agemarfin'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agemarfin']);
       $sStyleHidden_agemarfin = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agemarfin = 'display: none;';
   $sStyleReadInp_agemarfin = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['agemarfin']) && $this->nmgp_cmp_readonly['agemarfin'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agemarfin']);
       $sStyleReadLab_agemarfin = '';
       $sStyleReadInp_agemarfin = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agemarfin']) && $this->nmgp_cmp_hidden['agemarfin'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="agemarfin" value="<?php echo $this->form_encode_input($agemarfin) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_agemarfin_label" id="hidden_field_label_agemarfin" style="<?php echo $sStyleHidden_agemarfin; ?>"><span id="id_label_agemarfin"><?php echo $this->nm_new_label['agemarfin']; ?></span></TD>
    <TD class="scFormDataOdd css_agemarfin_line" id="hidden_field_data_agemarfin" style="<?php echo $sStyleHidden_agemarfin; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agemarfin_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agemarfin"]) &&  $this->nmgp_cmp_readonly["agemarfin"] == "on") { 

 ?>
<input type="hidden" name="agemarfin" value="<?php echo $this->form_encode_input($agemarfin) . "\">" . $agemarfin . ""; ?>
<?php } else { ?>
<span id="id_read_on_agemarfin" class="sc-ui-readonly-agemarfin css_agemarfin_line" style="<?php echo $sStyleReadLab_agemarfin; ?>"><?php echo $this->form_format_readonly("agemarfin", $this->form_encode_input($agemarfin)); ?></span><span id="id_read_off_agemarfin" class="css_read_off_agemarfin" style="white-space: nowrap;<?php echo $sStyleReadInp_agemarfin; ?>"><?php
$tmp_form_data = $this->field_config['agemarfin']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_agemarfin_obj" style="" id="id_sc_field_agemarfin" type=text name="agemarfin" value="<?php echo $this->form_encode_input($agemarfin) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['agemarfin']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['agemarfin']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agemarfin_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agemarfin_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_5"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_5"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_5" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="4" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">MIÉRCOLES</TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['agemieini']))
    {
        $this->nm_new_label['agemieini'] = "HORA INICIO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $agemieini = $this->agemieini;
   $sStyleHidden_agemieini = '';
   if (isset($this->nmgp_cmp_hidden['agemieini']) && $this->nmgp_cmp_hidden['agemieini'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agemieini']);
       $sStyleHidden_agemieini = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agemieini = 'display: none;';
   $sStyleReadInp_agemieini = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['agemieini']) && $this->nmgp_cmp_readonly['agemieini'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agemieini']);
       $sStyleReadLab_agemieini = '';
       $sStyleReadInp_agemieini = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agemieini']) && $this->nmgp_cmp_hidden['agemieini'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="agemieini" value="<?php echo $this->form_encode_input($agemieini) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_agemieini_label" id="hidden_field_label_agemieini" style="<?php echo $sStyleHidden_agemieini; ?>"><span id="id_label_agemieini"><?php echo $this->nm_new_label['agemieini']; ?></span></TD>
    <TD class="scFormDataOdd css_agemieini_line" id="hidden_field_data_agemieini" style="<?php echo $sStyleHidden_agemieini; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agemieini_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agemieini"]) &&  $this->nmgp_cmp_readonly["agemieini"] == "on") { 

 ?>
<input type="hidden" name="agemieini" value="<?php echo $this->form_encode_input($agemieini) . "\">" . $agemieini . ""; ?>
<?php } else { ?>
<span id="id_read_on_agemieini" class="sc-ui-readonly-agemieini css_agemieini_line" style="<?php echo $sStyleReadLab_agemieini; ?>"><?php echo $this->form_format_readonly("agemieini", $this->form_encode_input($agemieini)); ?></span><span id="id_read_off_agemieini" class="css_read_off_agemieini" style="white-space: nowrap;<?php echo $sStyleReadInp_agemieini; ?>"><?php
$tmp_form_data = $this->field_config['agemieini']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_agemieini_obj" style="" id="id_sc_field_agemieini" type=text name="agemieini" value="<?php echo $this->form_encode_input($agemieini) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['agemieini']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['agemieini']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agemieini_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agemieini_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['agemiefin']))
    {
        $this->nm_new_label['agemiefin'] = "HORA FIN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $agemiefin = $this->agemiefin;
   $sStyleHidden_agemiefin = '';
   if (isset($this->nmgp_cmp_hidden['agemiefin']) && $this->nmgp_cmp_hidden['agemiefin'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agemiefin']);
       $sStyleHidden_agemiefin = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agemiefin = 'display: none;';
   $sStyleReadInp_agemiefin = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['agemiefin']) && $this->nmgp_cmp_readonly['agemiefin'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agemiefin']);
       $sStyleReadLab_agemiefin = '';
       $sStyleReadInp_agemiefin = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agemiefin']) && $this->nmgp_cmp_hidden['agemiefin'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="agemiefin" value="<?php echo $this->form_encode_input($agemiefin) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_agemiefin_label" id="hidden_field_label_agemiefin" style="<?php echo $sStyleHidden_agemiefin; ?>"><span id="id_label_agemiefin"><?php echo $this->nm_new_label['agemiefin']; ?></span></TD>
    <TD class="scFormDataOdd css_agemiefin_line" id="hidden_field_data_agemiefin" style="<?php echo $sStyleHidden_agemiefin; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agemiefin_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agemiefin"]) &&  $this->nmgp_cmp_readonly["agemiefin"] == "on") { 

 ?>
<input type="hidden" name="agemiefin" value="<?php echo $this->form_encode_input($agemiefin) . "\">" . $agemiefin . ""; ?>
<?php } else { ?>
<span id="id_read_on_agemiefin" class="sc-ui-readonly-agemiefin css_agemiefin_line" style="<?php echo $sStyleReadLab_agemiefin; ?>"><?php echo $this->form_format_readonly("agemiefin", $this->form_encode_input($agemiefin)); ?></span><span id="id_read_off_agemiefin" class="css_read_off_agemiefin" style="white-space: nowrap;<?php echo $sStyleReadInp_agemiefin; ?>"><?php
$tmp_form_data = $this->field_config['agemiefin']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_agemiefin_obj" style="" id="id_sc_field_agemiefin" type=text name="agemiefin" value="<?php echo $this->form_encode_input($agemiefin) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['agemiefin']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['agemiefin']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agemiefin_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agemiefin_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_6"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_6"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_6" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="4" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">JUEVES</TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['agejueini']))
    {
        $this->nm_new_label['agejueini'] = "HORA INICIO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $agejueini = $this->agejueini;
   $sStyleHidden_agejueini = '';
   if (isset($this->nmgp_cmp_hidden['agejueini']) && $this->nmgp_cmp_hidden['agejueini'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agejueini']);
       $sStyleHidden_agejueini = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agejueini = 'display: none;';
   $sStyleReadInp_agejueini = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['agejueini']) && $this->nmgp_cmp_readonly['agejueini'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agejueini']);
       $sStyleReadLab_agejueini = '';
       $sStyleReadInp_agejueini = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agejueini']) && $this->nmgp_cmp_hidden['agejueini'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="agejueini" value="<?php echo $this->form_encode_input($agejueini) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_agejueini_label" id="hidden_field_label_agejueini" style="<?php echo $sStyleHidden_agejueini; ?>"><span id="id_label_agejueini"><?php echo $this->nm_new_label['agejueini']; ?></span></TD>
    <TD class="scFormDataOdd css_agejueini_line" id="hidden_field_data_agejueini" style="<?php echo $sStyleHidden_agejueini; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agejueini_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agejueini"]) &&  $this->nmgp_cmp_readonly["agejueini"] == "on") { 

 ?>
<input type="hidden" name="agejueini" value="<?php echo $this->form_encode_input($agejueini) . "\">" . $agejueini . ""; ?>
<?php } else { ?>
<span id="id_read_on_agejueini" class="sc-ui-readonly-agejueini css_agejueini_line" style="<?php echo $sStyleReadLab_agejueini; ?>"><?php echo $this->form_format_readonly("agejueini", $this->form_encode_input($agejueini)); ?></span><span id="id_read_off_agejueini" class="css_read_off_agejueini" style="white-space: nowrap;<?php echo $sStyleReadInp_agejueini; ?>"><?php
$tmp_form_data = $this->field_config['agejueini']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_agejueini_obj" style="" id="id_sc_field_agejueini" type=text name="agejueini" value="<?php echo $this->form_encode_input($agejueini) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['agejueini']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['agejueini']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agejueini_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agejueini_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['agejuefin']))
    {
        $this->nm_new_label['agejuefin'] = "HORA FIN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $agejuefin = $this->agejuefin;
   $sStyleHidden_agejuefin = '';
   if (isset($this->nmgp_cmp_hidden['agejuefin']) && $this->nmgp_cmp_hidden['agejuefin'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agejuefin']);
       $sStyleHidden_agejuefin = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agejuefin = 'display: none;';
   $sStyleReadInp_agejuefin = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['agejuefin']) && $this->nmgp_cmp_readonly['agejuefin'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agejuefin']);
       $sStyleReadLab_agejuefin = '';
       $sStyleReadInp_agejuefin = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agejuefin']) && $this->nmgp_cmp_hidden['agejuefin'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="agejuefin" value="<?php echo $this->form_encode_input($agejuefin) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_agejuefin_label" id="hidden_field_label_agejuefin" style="<?php echo $sStyleHidden_agejuefin; ?>"><span id="id_label_agejuefin"><?php echo $this->nm_new_label['agejuefin']; ?></span></TD>
    <TD class="scFormDataOdd css_agejuefin_line" id="hidden_field_data_agejuefin" style="<?php echo $sStyleHidden_agejuefin; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agejuefin_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agejuefin"]) &&  $this->nmgp_cmp_readonly["agejuefin"] == "on") { 

 ?>
<input type="hidden" name="agejuefin" value="<?php echo $this->form_encode_input($agejuefin) . "\">" . $agejuefin . ""; ?>
<?php } else { ?>
<span id="id_read_on_agejuefin" class="sc-ui-readonly-agejuefin css_agejuefin_line" style="<?php echo $sStyleReadLab_agejuefin; ?>"><?php echo $this->form_format_readonly("agejuefin", $this->form_encode_input($agejuefin)); ?></span><span id="id_read_off_agejuefin" class="css_read_off_agejuefin" style="white-space: nowrap;<?php echo $sStyleReadInp_agejuefin; ?>"><?php
$tmp_form_data = $this->field_config['agejuefin']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_agejuefin_obj" style="" id="id_sc_field_agejuefin" type=text name="agejuefin" value="<?php echo $this->form_encode_input($agejuefin) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['agejuefin']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['agejuefin']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agejuefin_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agejuefin_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_7"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_7"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_7" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="4" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">VIERNES</TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['agevieini']))
    {
        $this->nm_new_label['agevieini'] = "HORA INICIO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $agevieini = $this->agevieini;
   $sStyleHidden_agevieini = '';
   if (isset($this->nmgp_cmp_hidden['agevieini']) && $this->nmgp_cmp_hidden['agevieini'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agevieini']);
       $sStyleHidden_agevieini = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agevieini = 'display: none;';
   $sStyleReadInp_agevieini = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['agevieini']) && $this->nmgp_cmp_readonly['agevieini'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agevieini']);
       $sStyleReadLab_agevieini = '';
       $sStyleReadInp_agevieini = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agevieini']) && $this->nmgp_cmp_hidden['agevieini'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="agevieini" value="<?php echo $this->form_encode_input($agevieini) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_agevieini_label" id="hidden_field_label_agevieini" style="<?php echo $sStyleHidden_agevieini; ?>"><span id="id_label_agevieini"><?php echo $this->nm_new_label['agevieini']; ?></span></TD>
    <TD class="scFormDataOdd css_agevieini_line" id="hidden_field_data_agevieini" style="<?php echo $sStyleHidden_agevieini; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agevieini_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agevieini"]) &&  $this->nmgp_cmp_readonly["agevieini"] == "on") { 

 ?>
<input type="hidden" name="agevieini" value="<?php echo $this->form_encode_input($agevieini) . "\">" . $agevieini . ""; ?>
<?php } else { ?>
<span id="id_read_on_agevieini" class="sc-ui-readonly-agevieini css_agevieini_line" style="<?php echo $sStyleReadLab_agevieini; ?>"><?php echo $this->form_format_readonly("agevieini", $this->form_encode_input($agevieini)); ?></span><span id="id_read_off_agevieini" class="css_read_off_agevieini" style="white-space: nowrap;<?php echo $sStyleReadInp_agevieini; ?>"><?php
$tmp_form_data = $this->field_config['agevieini']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_agevieini_obj" style="" id="id_sc_field_agevieini" type=text name="agevieini" value="<?php echo $this->form_encode_input($agevieini) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['agevieini']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['agevieini']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agevieini_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agevieini_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['ageviefin']))
    {
        $this->nm_new_label['ageviefin'] = "HORA FIN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ageviefin = $this->ageviefin;
   $sStyleHidden_ageviefin = '';
   if (isset($this->nmgp_cmp_hidden['ageviefin']) && $this->nmgp_cmp_hidden['ageviefin'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ageviefin']);
       $sStyleHidden_ageviefin = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ageviefin = 'display: none;';
   $sStyleReadInp_ageviefin = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ageviefin']) && $this->nmgp_cmp_readonly['ageviefin'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ageviefin']);
       $sStyleReadLab_ageviefin = '';
       $sStyleReadInp_ageviefin = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ageviefin']) && $this->nmgp_cmp_hidden['ageviefin'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ageviefin" value="<?php echo $this->form_encode_input($ageviefin) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ageviefin_label" id="hidden_field_label_ageviefin" style="<?php echo $sStyleHidden_ageviefin; ?>"><span id="id_label_ageviefin"><?php echo $this->nm_new_label['ageviefin']; ?></span></TD>
    <TD class="scFormDataOdd css_ageviefin_line" id="hidden_field_data_ageviefin" style="<?php echo $sStyleHidden_ageviefin; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ageviefin_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ageviefin"]) &&  $this->nmgp_cmp_readonly["ageviefin"] == "on") { 

 ?>
<input type="hidden" name="ageviefin" value="<?php echo $this->form_encode_input($ageviefin) . "\">" . $ageviefin . ""; ?>
<?php } else { ?>
<span id="id_read_on_ageviefin" class="sc-ui-readonly-ageviefin css_ageviefin_line" style="<?php echo $sStyleReadLab_ageviefin; ?>"><?php echo $this->form_format_readonly("ageviefin", $this->form_encode_input($ageviefin)); ?></span><span id="id_read_off_ageviefin" class="css_read_off_ageviefin" style="white-space: nowrap;<?php echo $sStyleReadInp_ageviefin; ?>"><?php
$tmp_form_data = $this->field_config['ageviefin']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_ageviefin_obj" style="" id="id_sc_field_ageviefin" type=text name="ageviefin" value="<?php echo $this->form_encode_input($ageviefin) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['ageviefin']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['ageviefin']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ageviefin_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ageviefin_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_8"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_8"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_8" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="4" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">SÁBADO</TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['agesabini']))
    {
        $this->nm_new_label['agesabini'] = "HORA INICIO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $agesabini = $this->agesabini;
   $sStyleHidden_agesabini = '';
   if (isset($this->nmgp_cmp_hidden['agesabini']) && $this->nmgp_cmp_hidden['agesabini'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agesabini']);
       $sStyleHidden_agesabini = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agesabini = 'display: none;';
   $sStyleReadInp_agesabini = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['agesabini']) && $this->nmgp_cmp_readonly['agesabini'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agesabini']);
       $sStyleReadLab_agesabini = '';
       $sStyleReadInp_agesabini = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agesabini']) && $this->nmgp_cmp_hidden['agesabini'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="agesabini" value="<?php echo $this->form_encode_input($agesabini) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_agesabini_label" id="hidden_field_label_agesabini" style="<?php echo $sStyleHidden_agesabini; ?>"><span id="id_label_agesabini"><?php echo $this->nm_new_label['agesabini']; ?></span></TD>
    <TD class="scFormDataOdd css_agesabini_line" id="hidden_field_data_agesabini" style="<?php echo $sStyleHidden_agesabini; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agesabini_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agesabini"]) &&  $this->nmgp_cmp_readonly["agesabini"] == "on") { 

 ?>
<input type="hidden" name="agesabini" value="<?php echo $this->form_encode_input($agesabini) . "\">" . $agesabini . ""; ?>
<?php } else { ?>
<span id="id_read_on_agesabini" class="sc-ui-readonly-agesabini css_agesabini_line" style="<?php echo $sStyleReadLab_agesabini; ?>"><?php echo $this->form_format_readonly("agesabini", $this->form_encode_input($agesabini)); ?></span><span id="id_read_off_agesabini" class="css_read_off_agesabini" style="white-space: nowrap;<?php echo $sStyleReadInp_agesabini; ?>"><?php
$tmp_form_data = $this->field_config['agesabini']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_agesabini_obj" style="" id="id_sc_field_agesabini" type=text name="agesabini" value="<?php echo $this->form_encode_input($agesabini) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['agesabini']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['agesabini']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agesabini_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agesabini_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['agesabfin']))
    {
        $this->nm_new_label['agesabfin'] = "HORA FIN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $agesabfin = $this->agesabfin;
   $sStyleHidden_agesabfin = '';
   if (isset($this->nmgp_cmp_hidden['agesabfin']) && $this->nmgp_cmp_hidden['agesabfin'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agesabfin']);
       $sStyleHidden_agesabfin = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agesabfin = 'display: none;';
   $sStyleReadInp_agesabfin = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['agesabfin']) && $this->nmgp_cmp_readonly['agesabfin'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agesabfin']);
       $sStyleReadLab_agesabfin = '';
       $sStyleReadInp_agesabfin = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agesabfin']) && $this->nmgp_cmp_hidden['agesabfin'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="agesabfin" value="<?php echo $this->form_encode_input($agesabfin) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_agesabfin_label" id="hidden_field_label_agesabfin" style="<?php echo $sStyleHidden_agesabfin; ?>"><span id="id_label_agesabfin"><?php echo $this->nm_new_label['agesabfin']; ?></span></TD>
    <TD class="scFormDataOdd css_agesabfin_line" id="hidden_field_data_agesabfin" style="<?php echo $sStyleHidden_agesabfin; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agesabfin_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agesabfin"]) &&  $this->nmgp_cmp_readonly["agesabfin"] == "on") { 

 ?>
<input type="hidden" name="agesabfin" value="<?php echo $this->form_encode_input($agesabfin) . "\">" . $agesabfin . ""; ?>
<?php } else { ?>
<span id="id_read_on_agesabfin" class="sc-ui-readonly-agesabfin css_agesabfin_line" style="<?php echo $sStyleReadLab_agesabfin; ?>"><?php echo $this->form_format_readonly("agesabfin", $this->form_encode_input($agesabfin)); ?></span><span id="id_read_off_agesabfin" class="css_read_off_agesabfin" style="white-space: nowrap;<?php echo $sStyleReadInp_agesabfin; ?>"><?php
$tmp_form_data = $this->field_config['agesabfin']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_agesabfin_obj" style="" id="id_sc_field_agesabfin" type=text name="agesabfin" value="<?php echo $this->form_encode_input($agesabfin) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['agesabfin']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['agesabfin']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agesabfin_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agesabfin_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_9"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_9"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_9" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="4" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">DOMINGO</TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['agedomini']))
    {
        $this->nm_new_label['agedomini'] = "HORA INICIO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $agedomini = $this->agedomini;
   $sStyleHidden_agedomini = '';
   if (isset($this->nmgp_cmp_hidden['agedomini']) && $this->nmgp_cmp_hidden['agedomini'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agedomini']);
       $sStyleHidden_agedomini = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agedomini = 'display: none;';
   $sStyleReadInp_agedomini = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['agedomini']) && $this->nmgp_cmp_readonly['agedomini'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agedomini']);
       $sStyleReadLab_agedomini = '';
       $sStyleReadInp_agedomini = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agedomini']) && $this->nmgp_cmp_hidden['agedomini'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="agedomini" value="<?php echo $this->form_encode_input($agedomini) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_agedomini_label" id="hidden_field_label_agedomini" style="<?php echo $sStyleHidden_agedomini; ?>"><span id="id_label_agedomini"><?php echo $this->nm_new_label['agedomini']; ?></span></TD>
    <TD class="scFormDataOdd css_agedomini_line" id="hidden_field_data_agedomini" style="<?php echo $sStyleHidden_agedomini; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agedomini_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agedomini"]) &&  $this->nmgp_cmp_readonly["agedomini"] == "on") { 

 ?>
<input type="hidden" name="agedomini" value="<?php echo $this->form_encode_input($agedomini) . "\">" . $agedomini . ""; ?>
<?php } else { ?>
<span id="id_read_on_agedomini" class="sc-ui-readonly-agedomini css_agedomini_line" style="<?php echo $sStyleReadLab_agedomini; ?>"><?php echo $this->form_format_readonly("agedomini", $this->form_encode_input($agedomini)); ?></span><span id="id_read_off_agedomini" class="css_read_off_agedomini" style="white-space: nowrap;<?php echo $sStyleReadInp_agedomini; ?>"><?php
$tmp_form_data = $this->field_config['agedomini']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_agedomini_obj" style="" id="id_sc_field_agedomini" type=text name="agedomini" value="<?php echo $this->form_encode_input($agedomini) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['agedomini']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['agedomini']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agedomini_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agedomini_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['agedomfin']))
    {
        $this->nm_new_label['agedomfin'] = "HORA FIN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $agedomfin = $this->agedomfin;
   $sStyleHidden_agedomfin = '';
   if (isset($this->nmgp_cmp_hidden['agedomfin']) && $this->nmgp_cmp_hidden['agedomfin'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agedomfin']);
       $sStyleHidden_agedomfin = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agedomfin = 'display: none;';
   $sStyleReadInp_agedomfin = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['agedomfin']) && $this->nmgp_cmp_readonly['agedomfin'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agedomfin']);
       $sStyleReadLab_agedomfin = '';
       $sStyleReadInp_agedomfin = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agedomfin']) && $this->nmgp_cmp_hidden['agedomfin'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="agedomfin" value="<?php echo $this->form_encode_input($agedomfin) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_agedomfin_label" id="hidden_field_label_agedomfin" style="<?php echo $sStyleHidden_agedomfin; ?>"><span id="id_label_agedomfin"><?php echo $this->nm_new_label['agedomfin']; ?></span></TD>
    <TD class="scFormDataOdd css_agedomfin_line" id="hidden_field_data_agedomfin" style="<?php echo $sStyleHidden_agedomfin; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agedomfin_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agedomfin"]) &&  $this->nmgp_cmp_readonly["agedomfin"] == "on") { 

 ?>
<input type="hidden" name="agedomfin" value="<?php echo $this->form_encode_input($agedomfin) . "\">" . $agedomfin . ""; ?>
<?php } else { ?>
<span id="id_read_on_agedomfin" class="sc-ui-readonly-agedomfin css_agedomfin_line" style="<?php echo $sStyleReadLab_agedomfin; ?>"><?php echo $this->form_format_readonly("agedomfin", $this->form_encode_input($agedomfin)); ?></span><span id="id_read_off_agedomfin" class="css_read_off_agedomfin" style="white-space: nowrap;<?php echo $sStyleReadInp_agedomfin; ?>"><?php
$tmp_form_data = $this->field_config['agedomfin']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_agedomfin_obj" style="" id="id_sc_field_agedomfin" type=text name="agedomfin" value="<?php echo $this->form_encode_input($agedomfin) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['agedomfin']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['agedomfin']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_agedomfin_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agedomfin_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "R")
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
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8592;)", "sc-unique-btn-10", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8592;)", "sc-unique-btn-11", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8594;)", "sc-unique-btn-12", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8594;)", "sc-unique-btn-13", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5,6,7,8,9);

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
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['masterValue']))
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_agenda");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_agenda");
 parent.scAjaxDetailHeight("form_agenda", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_agenda", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_agenda", <?php echo $sTamanhoIframe; ?>);
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
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-2").length && $("#sc_b_ins_t.sc-unique-btn-2").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-4").length && $("#sc_b_upd_t.sc-unique-btn-4").is(":visible")) {
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
		if ($("#sc_b_sai_t.sc-unique-btn-5").length && $("#sc_b_sai_t.sc-unique-btn-5").is(":visible")) {
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-6").length && $("#sc_b_sai_t.sc-unique-btn-6").is(":visible")) {
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
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
	}
	function scBtnFn_sys_GridPermiteSeq() {
		if ($("#brec_b").length && $("#brec_b").is(":visible")) {
			nm_navpage(document.F1.nmgp_rec_b.value, 'P'); document.F1.nmgp_rec_b.value = '';
			 return;
		}
	}
	function scBtnFn_sys_format_ini() {
		if ($("#sc_b_ini_b.sc-unique-btn-10").length && $("#sc_b_ini_b.sc-unique-btn-10").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-11").length && $("#sc_b_ret_b.sc-unique-btn-11").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-12").length && $("#sc_b_avc_b.sc-unique-btn-12").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-13").length && $("#sc_b_fim_b.sc-unique-btn-13").is(":visible")) {
			nm_move ('final');
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_agenda']['buttonStatus'] = $this->nmgp_botoes;
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
