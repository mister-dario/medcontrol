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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " EMISOR"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " EMISOR"); } ?></TITLE>
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
.css_read_off_emifeccrea button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_emifecmodi button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_fac_emisores/form_fac_emisores_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_fac_emisores_mob_sajax_js.php");
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

include_once('form_fac_emisores_mob_jquery.php');

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

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['recarga'];
}
    $remove_margin = '';
    $remove_border = '';
    $vertical_center = '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_fac_emisores']['error_buffer']) && '' != $_SESSION['scriptcase']['form_fac_emisores']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_fac_emisores']['error_buffer'];
}
elseif (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
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
 include_once("form_fac_emisores_mob_js0.php");
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
               action="form_fac_emisores_mob.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_fac_emisores_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_fac_emisores_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " EMISOR"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " EMISOR"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['fast_search'][2] : "";
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
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "sc-unique-btn-14", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "sc-unique-btn-15", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Escape)", "sc-unique-btn-16", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + S)", "sc-unique-btn-17", "", "");?>
 
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
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-18", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-19", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-20", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-21", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-22", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['empty_filter'] = true;
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
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['emiruc']))
           {
               $this->nmgp_cmp_readonly['emiruc'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['emiruc']))
    {
        $this->nm_new_label['emiruc'] = "RUC";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $emiruc = $this->emiruc;
   $sStyleHidden_emiruc = '';
   if (isset($this->nmgp_cmp_hidden['emiruc']) && $this->nmgp_cmp_hidden['emiruc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['emiruc']);
       $sStyleHidden_emiruc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_emiruc = 'display: none;';
   $sStyleReadInp_emiruc = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["emiruc"]) &&  $this->nmgp_cmp_readonly["emiruc"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['emiruc']);
       $sStyleReadLab_emiruc = '';
       $sStyleReadInp_emiruc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['emiruc']) && $this->nmgp_cmp_hidden['emiruc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="emiruc" value="<?php echo $this->form_encode_input($emiruc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_emiruc_line" id="hidden_field_data_emiruc" style="<?php echo $sStyleHidden_emiruc; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_emiruc_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_emiruc_label" style=""><span id="id_label_emiruc"><?php echo $this->nm_new_label['emiruc']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['php_cmp_required']['emiruc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['php_cmp_required']['emiruc'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["emiruc"]) &&  $this->nmgp_cmp_readonly["emiruc"] == "on")) { 

 ?>
<input type="hidden" name="emiruc" value="<?php echo $this->form_encode_input($emiruc) . "\"><span id=\"id_ajax_label_emiruc\">" . $emiruc . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_emiruc" class="sc-ui-readonly-emiruc css_emiruc_line" style="<?php echo $sStyleReadLab_emiruc; ?>"><?php echo $this->form_format_readonly("emiruc", $this->form_encode_input($this->emiruc)); ?></span><span id="id_read_off_emiruc" class="css_read_off_emiruc" style="white-space: nowrap;<?php echo $sStyleReadInp_emiruc; ?>">
 <input class="sc-js-input scFormObjectOdd css_emiruc_obj" style="" id="id_sc_field_emiruc" type=text name="emiruc" value="<?php echo $this->form_encode_input($emiruc) ?>"
 size=13 maxlength=13 alt="{datatype: 'text', maxLength: 13, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emiruc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emiruc_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['emirazsoc']))
    {
        $this->nm_new_label['emirazsoc'] = "RAZÓN SOCIAL";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $emirazsoc = $this->emirazsoc;
   $sStyleHidden_emirazsoc = '';
   if (isset($this->nmgp_cmp_hidden['emirazsoc']) && $this->nmgp_cmp_hidden['emirazsoc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['emirazsoc']);
       $sStyleHidden_emirazsoc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_emirazsoc = 'display: none;';
   $sStyleReadInp_emirazsoc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['emirazsoc']) && $this->nmgp_cmp_readonly['emirazsoc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['emirazsoc']);
       $sStyleReadLab_emirazsoc = '';
       $sStyleReadInp_emirazsoc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['emirazsoc']) && $this->nmgp_cmp_hidden['emirazsoc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="emirazsoc" value="<?php echo $this->form_encode_input($emirazsoc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_emirazsoc_line" id="hidden_field_data_emirazsoc" style="<?php echo $sStyleHidden_emirazsoc; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_emirazsoc_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_emirazsoc_label" style=""><span id="id_label_emirazsoc"><?php echo $this->nm_new_label['emirazsoc']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['php_cmp_required']['emirazsoc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['php_cmp_required']['emirazsoc'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["emirazsoc"]) &&  $this->nmgp_cmp_readonly["emirazsoc"] == "on") { 

 ?>
<input type="hidden" name="emirazsoc" value="<?php echo $this->form_encode_input($emirazsoc) . "\">" . $emirazsoc . ""; ?>
<?php } else { ?>
<span id="id_read_on_emirazsoc" class="sc-ui-readonly-emirazsoc css_emirazsoc_line" style="<?php echo $sStyleReadLab_emirazsoc; ?>"><?php echo $this->form_format_readonly("emirazsoc", $this->form_encode_input($this->emirazsoc)); ?></span><span id="id_read_off_emirazsoc" class="css_read_off_emirazsoc" style="white-space: nowrap;<?php echo $sStyleReadInp_emirazsoc; ?>">
 <input class="sc-js-input scFormObjectOdd css_emirazsoc_obj" style="" id="id_sc_field_emirazsoc" type=text name="emirazsoc" value="<?php echo $this->form_encode_input($emirazsoc) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emirazsoc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emirazsoc_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['eminomcom']))
    {
        $this->nm_new_label['eminomcom'] = "NOMBRE COMERCIAL";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $eminomcom = $this->eminomcom;
   $sStyleHidden_eminomcom = '';
   if (isset($this->nmgp_cmp_hidden['eminomcom']) && $this->nmgp_cmp_hidden['eminomcom'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['eminomcom']);
       $sStyleHidden_eminomcom = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_eminomcom = 'display: none;';
   $sStyleReadInp_eminomcom = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['eminomcom']) && $this->nmgp_cmp_readonly['eminomcom'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['eminomcom']);
       $sStyleReadLab_eminomcom = '';
       $sStyleReadInp_eminomcom = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['eminomcom']) && $this->nmgp_cmp_hidden['eminomcom'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="eminomcom" value="<?php echo $this->form_encode_input($eminomcom) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_eminomcom_line" id="hidden_field_data_eminomcom" style="<?php echo $sStyleHidden_eminomcom; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_eminomcom_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_eminomcom_label" style=""><span id="id_label_eminomcom"><?php echo $this->nm_new_label['eminomcom']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['php_cmp_required']['eminomcom']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['php_cmp_required']['eminomcom'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["eminomcom"]) &&  $this->nmgp_cmp_readonly["eminomcom"] == "on") { 

 ?>
<input type="hidden" name="eminomcom" value="<?php echo $this->form_encode_input($eminomcom) . "\">" . $eminomcom . ""; ?>
<?php } else { ?>
<span id="id_read_on_eminomcom" class="sc-ui-readonly-eminomcom css_eminomcom_line" style="<?php echo $sStyleReadLab_eminomcom; ?>"><?php echo $this->form_format_readonly("eminomcom", $this->form_encode_input($this->eminomcom)); ?></span><span id="id_read_off_eminomcom" class="css_read_off_eminomcom" style="white-space: nowrap;<?php echo $sStyleReadInp_eminomcom; ?>">
 <input class="sc-js-input scFormObjectOdd css_eminomcom_obj" style="" id="id_sc_field_eminomcom" type=text name="eminomcom" value="<?php echo $this->form_encode_input($eminomcom) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_eminomcom_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_eminomcom_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['emidirmat']))
    {
        $this->nm_new_label['emidirmat'] = "DIRECCIÓN MATRIZ";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $emidirmat = $this->emidirmat;
   $sStyleHidden_emidirmat = '';
   if (isset($this->nmgp_cmp_hidden['emidirmat']) && $this->nmgp_cmp_hidden['emidirmat'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['emidirmat']);
       $sStyleHidden_emidirmat = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_emidirmat = 'display: none;';
   $sStyleReadInp_emidirmat = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['emidirmat']) && $this->nmgp_cmp_readonly['emidirmat'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['emidirmat']);
       $sStyleReadLab_emidirmat = '';
       $sStyleReadInp_emidirmat = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['emidirmat']) && $this->nmgp_cmp_hidden['emidirmat'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="emidirmat" value="<?php echo $this->form_encode_input($emidirmat) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_emidirmat_line" id="hidden_field_data_emidirmat" style="<?php echo $sStyleHidden_emidirmat; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_emidirmat_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_emidirmat_label" style=""><span id="id_label_emidirmat"><?php echo $this->nm_new_label['emidirmat']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['php_cmp_required']['emidirmat']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['php_cmp_required']['emidirmat'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["emidirmat"]) &&  $this->nmgp_cmp_readonly["emidirmat"] == "on") { 

 ?>
<input type="hidden" name="emidirmat" value="<?php echo $this->form_encode_input($emidirmat) . "\">" . $emidirmat . ""; ?>
<?php } else { ?>
<span id="id_read_on_emidirmat" class="sc-ui-readonly-emidirmat css_emidirmat_line" style="<?php echo $sStyleReadLab_emidirmat; ?>"><?php echo $this->form_format_readonly("emidirmat", $this->form_encode_input($this->emidirmat)); ?></span><span id="id_read_off_emidirmat" class="css_read_off_emidirmat" style="white-space: nowrap;<?php echo $sStyleReadInp_emidirmat; ?>">
 <input class="sc-js-input scFormObjectOdd css_emidirmat_obj" style="" id="id_sc_field_emidirmat" type=text name="emidirmat" value="<?php echo $this->form_encode_input($emidirmat) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emidirmat_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emidirmat_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['emidirest']))
    {
        $this->nm_new_label['emidirest'] = "DIRECCIÓN ESTABLECIMIENTO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $emidirest = $this->emidirest;
   $sStyleHidden_emidirest = '';
   if (isset($this->nmgp_cmp_hidden['emidirest']) && $this->nmgp_cmp_hidden['emidirest'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['emidirest']);
       $sStyleHidden_emidirest = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_emidirest = 'display: none;';
   $sStyleReadInp_emidirest = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['emidirest']) && $this->nmgp_cmp_readonly['emidirest'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['emidirest']);
       $sStyleReadLab_emidirest = '';
       $sStyleReadInp_emidirest = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['emidirest']) && $this->nmgp_cmp_hidden['emidirest'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="emidirest" value="<?php echo $this->form_encode_input($emidirest) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_emidirest_line" id="hidden_field_data_emidirest" style="<?php echo $sStyleHidden_emidirest; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_emidirest_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_emidirest_label" style=""><span id="id_label_emidirest"><?php echo $this->nm_new_label['emidirest']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['php_cmp_required']['emidirest']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['php_cmp_required']['emidirest'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["emidirest"]) &&  $this->nmgp_cmp_readonly["emidirest"] == "on") { 

 ?>
<input type="hidden" name="emidirest" value="<?php echo $this->form_encode_input($emidirest) . "\">" . $emidirest . ""; ?>
<?php } else { ?>
<span id="id_read_on_emidirest" class="sc-ui-readonly-emidirest css_emidirest_line" style="<?php echo $sStyleReadLab_emidirest; ?>"><?php echo $this->form_format_readonly("emidirest", $this->form_encode_input($this->emidirest)); ?></span><span id="id_read_off_emidirest" class="css_read_off_emidirest" style="white-space: nowrap;<?php echo $sStyleReadInp_emidirest; ?>">
 <input class="sc-js-input scFormObjectOdd css_emidirest_obj" style="" id="id_sc_field_emidirest" type=text name="emidirest" value="<?php echo $this->form_encode_input($emidirest) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emidirest_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emidirest_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['eminumconesp']))
    {
        $this->nm_new_label['eminumconesp'] = "No. CONTRIBUYENTE ESPECIAL";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $eminumconesp = $this->eminumconesp;
   $sStyleHidden_eminumconesp = '';
   if (isset($this->nmgp_cmp_hidden['eminumconesp']) && $this->nmgp_cmp_hidden['eminumconesp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['eminumconesp']);
       $sStyleHidden_eminumconesp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_eminumconesp = 'display: none;';
   $sStyleReadInp_eminumconesp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['eminumconesp']) && $this->nmgp_cmp_readonly['eminumconesp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['eminumconesp']);
       $sStyleReadLab_eminumconesp = '';
       $sStyleReadInp_eminumconesp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['eminumconesp']) && $this->nmgp_cmp_hidden['eminumconesp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="eminumconesp" value="<?php echo $this->form_encode_input($eminumconesp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_eminumconesp_line" id="hidden_field_data_eminumconesp" style="<?php echo $sStyleHidden_eminumconesp; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_eminumconesp_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_eminumconesp_label" style=""><span id="id_label_eminumconesp"><?php echo $this->nm_new_label['eminumconesp']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["eminumconesp"]) &&  $this->nmgp_cmp_readonly["eminumconesp"] == "on") { 

 ?>
<input type="hidden" name="eminumconesp" value="<?php echo $this->form_encode_input($eminumconesp) . "\">" . $eminumconesp . ""; ?>
<?php } else { ?>
<span id="id_read_on_eminumconesp" class="sc-ui-readonly-eminumconesp css_eminumconesp_line" style="<?php echo $sStyleReadLab_eminumconesp; ?>"><?php echo $this->form_format_readonly("eminumconesp", $this->form_encode_input($this->eminumconesp)); ?></span><span id="id_read_off_eminumconesp" class="css_read_off_eminumconesp" style="white-space: nowrap;<?php echo $sStyleReadInp_eminumconesp; ?>">
 <input class="sc-js-input scFormObjectOdd css_eminumconesp_obj" style="" id="id_sc_field_eminumconesp" type=text name="eminumconesp" value="<?php echo $this->form_encode_input($eminumconesp) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_eminumconesp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_eminumconesp_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['emioblicon']))
   {
       $this->nm_new_label['emioblicon'] = "OBLIGADO A LLEVAR CONTABILIDAD";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $emioblicon = $this->emioblicon;
   $sStyleHidden_emioblicon = '';
   if (isset($this->nmgp_cmp_hidden['emioblicon']) && $this->nmgp_cmp_hidden['emioblicon'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['emioblicon']);
       $sStyleHidden_emioblicon = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_emioblicon = 'display: none;';
   $sStyleReadInp_emioblicon = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['emioblicon']) && $this->nmgp_cmp_readonly['emioblicon'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['emioblicon']);
       $sStyleReadLab_emioblicon = '';
       $sStyleReadInp_emioblicon = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['emioblicon']) && $this->nmgp_cmp_hidden['emioblicon'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="emioblicon" value="<?php echo $this->form_encode_input($this->emioblicon) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->emioblicon_1 = explode(";", trim($this->emioblicon));
  } 
  else
  {
      if (empty($this->emioblicon))
      {
          $this->emioblicon_1= array(); 
          $this->emioblicon= "";
      } 
      else
      {
          $this->emioblicon_1= $this->emioblicon; 
          $this->emioblicon= ""; 
          foreach ($this->emioblicon_1 as $cada_emioblicon)
          {
             if (!empty($emioblicon))
             {
                 $this->emioblicon.= ";"; 
             } 
             $this->emioblicon.= $cada_emioblicon; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_emioblicon_line" id="hidden_field_data_emioblicon" style="<?php echo $sStyleHidden_emioblicon; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_emioblicon_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_emioblicon_label" style=""><span id="id_label_emioblicon"><?php echo $this->nm_new_label['emioblicon']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["emioblicon"]) &&  $this->nmgp_cmp_readonly["emioblicon"] == "on") { 

$emioblicon_look = "";
 if ($this->emioblicon == "1") { $emioblicon_look .= "" ;} 
 if (empty($emioblicon_look)) { $emioblicon_look = $this->emioblicon; }
?>
<input type="hidden" name="emioblicon" value="<?php echo $this->form_encode_input($emioblicon) . "\">" . $emioblicon_look . ""; ?>
<?php } else { ?>

<?php

$emioblicon_look = "";
 if ($this->emioblicon == "1") { $emioblicon_look .= "" ;} 
 if (empty($emioblicon_look)) { $emioblicon_look = $this->emioblicon; }
?>
<span id="id_read_on_emioblicon" class="css_emioblicon_line" style="<?php echo $sStyleReadLab_emioblicon; ?>"><?php echo $this->form_format_readonly("emioblicon", $this->form_encode_input($emioblicon_look)); ?></span><span id="id_read_off_emioblicon" class="css_read_off_emioblicon css_emioblicon_line" style="<?php echo $sStyleReadInp_emioblicon; ?>"><?php echo "<div id=\"idAjaxCheckbox_emioblicon\" style=\"display: inline-block\" class=\"css_emioblicon_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_emioblicon_line"><?php $tempOptionId = "id-opt-emioblicon" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-emioblicon sc-ui-checkbox-emioblicon" name="emioblicon[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['Lookup_emioblicon'][] = '1'; ?>
<?php  if (in_array("1", $this->emioblicon_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>"></label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emioblicon_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emioblicon_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['emiestab']))
    {
        $this->nm_new_label['emiestab'] = "No. ESTABLECIMIENTO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $emiestab = $this->emiestab;
   $sStyleHidden_emiestab = '';
   if (isset($this->nmgp_cmp_hidden['emiestab']) && $this->nmgp_cmp_hidden['emiestab'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['emiestab']);
       $sStyleHidden_emiestab = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_emiestab = 'display: none;';
   $sStyleReadInp_emiestab = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['emiestab']) && $this->nmgp_cmp_readonly['emiestab'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['emiestab']);
       $sStyleReadLab_emiestab = '';
       $sStyleReadInp_emiestab = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['emiestab']) && $this->nmgp_cmp_hidden['emiestab'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="emiestab" value="<?php echo $this->form_encode_input($emiestab) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_emiestab_line" id="hidden_field_data_emiestab" style="<?php echo $sStyleHidden_emiestab; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_emiestab_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_emiestab_label" style=""><span id="id_label_emiestab"><?php echo $this->nm_new_label['emiestab']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['php_cmp_required']['emiestab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['php_cmp_required']['emiestab'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["emiestab"]) &&  $this->nmgp_cmp_readonly["emiestab"] == "on") { 

 ?>
<input type="hidden" name="emiestab" value="<?php echo $this->form_encode_input($emiestab) . "\">" . $emiestab . ""; ?>
<?php } else { ?>
<span id="id_read_on_emiestab" class="sc-ui-readonly-emiestab css_emiestab_line" style="<?php echo $sStyleReadLab_emiestab; ?>"><?php echo $this->form_format_readonly("emiestab", $this->form_encode_input($this->emiestab)); ?></span><span id="id_read_off_emiestab" class="css_read_off_emiestab" style="white-space: nowrap;<?php echo $sStyleReadInp_emiestab; ?>">
 <input class="sc-js-input scFormObjectOdd css_emiestab_obj" style="" id="id_sc_field_emiestab" type=text name="emiestab" value="<?php echo $this->form_encode_input($emiestab) ?>"
 size=3 alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['emiestab']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['emiestab']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['emiestab']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emiestab_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emiestab_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['emiptoemi']))
    {
        $this->nm_new_label['emiptoemi'] = "PUNTO DE EMISIÓN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $emiptoemi = $this->emiptoemi;
   $sStyleHidden_emiptoemi = '';
   if (isset($this->nmgp_cmp_hidden['emiptoemi']) && $this->nmgp_cmp_hidden['emiptoemi'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['emiptoemi']);
       $sStyleHidden_emiptoemi = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_emiptoemi = 'display: none;';
   $sStyleReadInp_emiptoemi = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['emiptoemi']) && $this->nmgp_cmp_readonly['emiptoemi'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['emiptoemi']);
       $sStyleReadLab_emiptoemi = '';
       $sStyleReadInp_emiptoemi = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['emiptoemi']) && $this->nmgp_cmp_hidden['emiptoemi'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="emiptoemi" value="<?php echo $this->form_encode_input($emiptoemi) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_emiptoemi_line" id="hidden_field_data_emiptoemi" style="<?php echo $sStyleHidden_emiptoemi; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_emiptoemi_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_emiptoemi_label" style=""><span id="id_label_emiptoemi"><?php echo $this->nm_new_label['emiptoemi']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['php_cmp_required']['emiptoemi']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['php_cmp_required']['emiptoemi'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["emiptoemi"]) &&  $this->nmgp_cmp_readonly["emiptoemi"] == "on") { 

 ?>
<input type="hidden" name="emiptoemi" value="<?php echo $this->form_encode_input($emiptoemi) . "\">" . $emiptoemi . ""; ?>
<?php } else { ?>
<span id="id_read_on_emiptoemi" class="sc-ui-readonly-emiptoemi css_emiptoemi_line" style="<?php echo $sStyleReadLab_emiptoemi; ?>"><?php echo $this->form_format_readonly("emiptoemi", $this->form_encode_input($this->emiptoemi)); ?></span><span id="id_read_off_emiptoemi" class="css_read_off_emiptoemi" style="white-space: nowrap;<?php echo $sStyleReadInp_emiptoemi; ?>">
 <input class="sc-js-input scFormObjectOdd css_emiptoemi_obj" style="" id="id_sc_field_emiptoemi" type=text name="emiptoemi" value="<?php echo $this->form_encode_input($emiptoemi) ?>"
 size=3 alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['emiptoemi']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['emiptoemi']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['emiptoemi']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emiptoemi_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emiptoemi_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['emiformatoride']))
   {
       $this->nm_new_label['emiformatoride'] = "FORMATO RIDE";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $emiformatoride = $this->emiformatoride;
   $sStyleHidden_emiformatoride = '';
   if (isset($this->nmgp_cmp_hidden['emiformatoride']) && $this->nmgp_cmp_hidden['emiformatoride'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['emiformatoride']);
       $sStyleHidden_emiformatoride = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_emiformatoride = 'display: none;';
   $sStyleReadInp_emiformatoride = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['emiformatoride']) && $this->nmgp_cmp_readonly['emiformatoride'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['emiformatoride']);
       $sStyleReadLab_emiformatoride = '';
       $sStyleReadInp_emiformatoride = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['emiformatoride']) && $this->nmgp_cmp_hidden['emiformatoride'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="emiformatoride" value="<?php echo $this->form_encode_input($this->emiformatoride) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_emiformatoride_line" id="hidden_field_data_emiformatoride" style="<?php echo $sStyleHidden_emiformatoride; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_emiformatoride_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_emiformatoride_label" style=""><span id="id_label_emiformatoride"><?php echo $this->nm_new_label['emiformatoride']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['php_cmp_required']['emiformatoride']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['php_cmp_required']['emiformatoride'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["emiformatoride"]) &&  $this->nmgp_cmp_readonly["emiformatoride"] == "on") { 

$emiformatoride_look = "";
 if ($this->emiformatoride == "1") { $emiformatoride_look .= "FORMATO 1 - KV" ;} 
 if ($this->emiformatoride == "2") { $emiformatoride_look .= "FORMATO 2 - FM" ;} 
 if (empty($emiformatoride_look)) { $emiformatoride_look = $this->emiformatoride; }
?>
<input type="hidden" name="emiformatoride" value="<?php echo $this->form_encode_input($emiformatoride) . "\">" . $emiformatoride_look . ""; ?>
<?php } else { ?>
<?php

$emiformatoride_look = "";
 if ($this->emiformatoride == "1") { $emiformatoride_look .= "FORMATO 1 - KV" ;} 
 if ($this->emiformatoride == "2") { $emiformatoride_look .= "FORMATO 2 - FM" ;} 
 if (empty($emiformatoride_look)) { $emiformatoride_look = $this->emiformatoride; }
?>
<span id="id_read_on_emiformatoride" class="css_emiformatoride_line"  style="<?php echo $sStyleReadLab_emiformatoride; ?>"><?php echo $this->form_format_readonly("emiformatoride", $this->form_encode_input($emiformatoride_look)); ?></span><span id="id_read_off_emiformatoride" class="css_read_off_emiformatoride" style="white-space: nowrap; <?php echo $sStyleReadInp_emiformatoride; ?>">
 <span id="idAjaxSelect_emiformatoride"><select class="sc-js-input scFormObjectOdd css_emiformatoride_obj" style="" id="id_sc_field_emiformatoride" name="emiformatoride" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['Lookup_emiformatoride'][] = ''; ?>
 <option value="">------------------------</option>
 <option  value="1" <?php  if ($this->emiformatoride == "1") { echo " selected" ;} ?>>FORMATO 1 - KV</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['Lookup_emiformatoride'][] = '1'; ?>
 <option  value="2" <?php  if ($this->emiformatoride == "2") { echo " selected" ;} ?>>FORMATO 2 - FM</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['Lookup_emiformatoride'][] = '2'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emiformatoride_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emiformatoride_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['emiclavetoken']))
    {
        $this->nm_new_label['emiclavetoken'] = "CONTRASEÑA FIRMA ELECT.";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $emiclavetoken = $this->emiclavetoken;
   $sStyleHidden_emiclavetoken = '';
   if (isset($this->nmgp_cmp_hidden['emiclavetoken']) && $this->nmgp_cmp_hidden['emiclavetoken'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['emiclavetoken']);
       $sStyleHidden_emiclavetoken = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_emiclavetoken = 'display: none;';
   $sStyleReadInp_emiclavetoken = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['emiclavetoken']) && $this->nmgp_cmp_readonly['emiclavetoken'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['emiclavetoken']);
       $sStyleReadLab_emiclavetoken = '';
       $sStyleReadInp_emiclavetoken = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['emiclavetoken']) && $this->nmgp_cmp_hidden['emiclavetoken'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="emiclavetoken" value="<?php echo $this->form_encode_input($emiclavetoken) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_emiclavetoken_line" id="hidden_field_data_emiclavetoken" style="<?php echo $sStyleHidden_emiclavetoken; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_emiclavetoken_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_emiclavetoken_label" style=""><span id="id_label_emiclavetoken"><?php echo $this->nm_new_label['emiclavetoken']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['php_cmp_required']['emiclavetoken']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['php_cmp_required']['emiclavetoken'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["emiclavetoken"]) &&  $this->nmgp_cmp_readonly["emiclavetoken"] == "on") { ?>
<input type="hidden" name="emiclavetoken" value="">
<?php } else { ?>
<span id="id_read_on_emiclavetoken" class="sc-ui-readonly-emiclavetoken css_emiclavetoken_line" style="<?php echo $sStyleReadLab_emiclavetoken; ?>"><?php echo $this->form_format_readonly("emiclavetoken", $this->form_encode_input($this->emiclavetoken)); ?></span><span id="id_read_off_emiclavetoken" class="css_read_off_emiclavetoken" style="white-space: nowrap;<?php echo $sStyleReadInp_emiclavetoken; ?>"><input class="sc-js-input scFormObjectOdd css_emiclavetoken_obj" style="" id="id_sc_field_emiclavetoken" type="password" autocomplete="off" name="emiclavetoken" value="" 
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emiclavetoken_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emiclavetoken_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['emiusucrea']))
           {
               $this->nmgp_cmp_readonly['emiusucrea'] = 'on';
           }
?>


   <?php
   if (!isset($this->nm_new_label['emiactivo']))
   {
       $this->nm_new_label['emiactivo'] = "ACTIVO";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $emiactivo = $this->emiactivo;
   $sStyleHidden_emiactivo = '';
   if (isset($this->nmgp_cmp_hidden['emiactivo']) && $this->nmgp_cmp_hidden['emiactivo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['emiactivo']);
       $sStyleHidden_emiactivo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_emiactivo = 'display: none;';
   $sStyleReadInp_emiactivo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['emiactivo']) && $this->nmgp_cmp_readonly['emiactivo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['emiactivo']);
       $sStyleReadLab_emiactivo = '';
       $sStyleReadInp_emiactivo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['emiactivo']) && $this->nmgp_cmp_hidden['emiactivo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="emiactivo" value="<?php echo $this->form_encode_input($this->emiactivo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->emiactivo_1 = explode(";", trim($this->emiactivo));
  } 
  else
  {
      if (empty($this->emiactivo))
      {
          $this->emiactivo_1= array(); 
          $this->emiactivo= "";
      } 
      else
      {
          $this->emiactivo_1= $this->emiactivo; 
          $this->emiactivo= ""; 
          foreach ($this->emiactivo_1 as $cada_emiactivo)
          {
             if (!empty($emiactivo))
             {
                 $this->emiactivo.= ";"; 
             } 
             $this->emiactivo.= $cada_emiactivo; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_emiactivo_line" id="hidden_field_data_emiactivo" style="<?php echo $sStyleHidden_emiactivo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_emiactivo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_emiactivo_label" style=""><span id="id_label_emiactivo"><?php echo $this->nm_new_label['emiactivo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["emiactivo"]) &&  $this->nmgp_cmp_readonly["emiactivo"] == "on") { 

$emiactivo_look = "";
 if ($this->emiactivo == "1") { $emiactivo_look .= "" ;} 
 if (empty($emiactivo_look)) { $emiactivo_look = $this->emiactivo; }
?>
<input type="hidden" name="emiactivo" value="<?php echo $this->form_encode_input($emiactivo) . "\">" . $emiactivo_look . ""; ?>
<?php } else { ?>

<?php

$emiactivo_look = "";
 if ($this->emiactivo == "1") { $emiactivo_look .= "" ;} 
 if (empty($emiactivo_look)) { $emiactivo_look = $this->emiactivo; }
?>
<span id="id_read_on_emiactivo" class="css_emiactivo_line" style="<?php echo $sStyleReadLab_emiactivo; ?>"><?php echo $this->form_format_readonly("emiactivo", $this->form_encode_input($emiactivo_look)); ?></span><span id="id_read_off_emiactivo" class="css_read_off_emiactivo css_emiactivo_line" style="<?php echo $sStyleReadInp_emiactivo; ?>"><?php echo "<div id=\"idAjaxCheckbox_emiactivo\" style=\"display: inline-block\" class=\"css_emiactivo_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_emiactivo_line"><?php $tempOptionId = "id-opt-emiactivo" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-emiactivo sc-ui-checkbox-emiactivo" name="emiactivo[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['Lookup_emiactivo'][] = '1'; ?>
<?php  if (in_array("1", $this->emiactivo_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>"></label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emiactivo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emiactivo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['emifeccrea']))
           {
               $this->nmgp_cmp_readonly['emifeccrea'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['emiusucrea']))
    {
        $this->nm_new_label['emiusucrea'] = "USUARIO CREACIÓN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $emiusucrea = $this->emiusucrea;
   $sStyleHidden_emiusucrea = '';
   if (isset($this->nmgp_cmp_hidden['emiusucrea']) && $this->nmgp_cmp_hidden['emiusucrea'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['emiusucrea']);
       $sStyleHidden_emiusucrea = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_emiusucrea = 'display: none;';
   $sStyleReadInp_emiusucrea = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["emiusucrea"]) &&  $this->nmgp_cmp_readonly["emiusucrea"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['emiusucrea']);
       $sStyleReadLab_emiusucrea = '';
       $sStyleReadInp_emiusucrea = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['emiusucrea']) && $this->nmgp_cmp_hidden['emiusucrea'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="emiusucrea" value="<?php echo $this->form_encode_input($emiusucrea) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_emiusucrea_line" id="hidden_field_data_emiusucrea" style="<?php echo $sStyleHidden_emiusucrea; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_emiusucrea_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_emiusucrea_label" style=""><span id="id_label_emiusucrea"><?php echo $this->nm_new_label['emiusucrea']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["emiusucrea"]) &&  $this->nmgp_cmp_readonly["emiusucrea"] == "on")) { 

 ?>
<input type="hidden" name="emiusucrea" value="<?php echo $this->form_encode_input($emiusucrea) . "\"><span id=\"id_ajax_label_emiusucrea\">" . $emiusucrea . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_emiusucrea" class="sc-ui-readonly-emiusucrea css_emiusucrea_line" style="<?php echo $sStyleReadLab_emiusucrea; ?>"><?php echo $this->form_format_readonly("emiusucrea", $this->form_encode_input($this->emiusucrea)); ?></span><span id="id_read_off_emiusucrea" class="css_read_off_emiusucrea" style="white-space: nowrap;<?php echo $sStyleReadInp_emiusucrea; ?>">
 <input class="sc-js-input scFormObjectOdd css_emiusucrea_obj" style="" id="id_sc_field_emiusucrea" type=text name="emiusucrea" value="<?php echo $this->form_encode_input($emiusucrea) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emiusucrea_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emiusucrea_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['emiusumodi']))
           {
               $this->nmgp_cmp_readonly['emiusumodi'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['emifeccrea']))
    {
        $this->nm_new_label['emifeccrea'] = "FECHA CREACIÓN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_emifeccrea = $this->emifeccrea;
   if (strlen($this->emifeccrea_hora) > 8 ) {$this->emifeccrea_hora = substr($this->emifeccrea_hora, 0, 8);}
   $this->emifeccrea .= ' ' . $this->emifeccrea_hora;
   $this->emifeccrea  = trim($this->emifeccrea);
   $emifeccrea = $this->emifeccrea;
   $sStyleHidden_emifeccrea = '';
   if (isset($this->nmgp_cmp_hidden['emifeccrea']) && $this->nmgp_cmp_hidden['emifeccrea'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['emifeccrea']);
       $sStyleHidden_emifeccrea = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_emifeccrea = 'display: none;';
   $sStyleReadInp_emifeccrea = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["emifeccrea"]) &&  $this->nmgp_cmp_readonly["emifeccrea"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['emifeccrea']);
       $sStyleReadLab_emifeccrea = '';
       $sStyleReadInp_emifeccrea = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['emifeccrea']) && $this->nmgp_cmp_hidden['emifeccrea'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="emifeccrea" value="<?php echo $this->form_encode_input($emifeccrea) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_emifeccrea_line" id="hidden_field_data_emifeccrea" style="<?php echo $sStyleHidden_emifeccrea; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_emifeccrea_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_emifeccrea_label" style=""><span id="id_label_emifeccrea"><?php echo $this->nm_new_label['emifeccrea']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["emifeccrea"]) &&  $this->nmgp_cmp_readonly["emifeccrea"] == "on")) { 

 ?>
<input type="hidden" name="emifeccrea" value="<?php echo $this->form_encode_input($emifeccrea) . "\"><span id=\"id_ajax_label_emifeccrea\">" . $emifeccrea . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_emifeccrea" class="sc-ui-readonly-emifeccrea css_emifeccrea_line" style="<?php echo $sStyleReadLab_emifeccrea; ?>"><?php echo $this->form_format_readonly("emifeccrea", $this->form_encode_input($emifeccrea)); ?></span><span id="id_read_off_emifeccrea" class="css_read_off_emifeccrea" style="white-space: nowrap;<?php echo $sStyleReadInp_emifeccrea; ?>"><?php
$tmp_form_data = $this->field_config['emifeccrea']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_emifeccrea_obj" style="" id="id_sc_field_emifeccrea" type=text name="emifeccrea" value="<?php echo $this->form_encode_input($emifeccrea) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['emifeccrea']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['emifeccrea']['date_format']; ?>', timeSep: '<?php echo $this->field_config['emifeccrea']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emifeccrea_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emifeccrea_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->emifeccrea = $old_dt_emifeccrea;
?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['emifecmodi']))
           {
               $this->nmgp_cmp_readonly['emifecmodi'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['emiusumodi']))
    {
        $this->nm_new_label['emiusumodi'] = "USUARIO MODIFICACIÓN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $emiusumodi = $this->emiusumodi;
   $sStyleHidden_emiusumodi = '';
   if (isset($this->nmgp_cmp_hidden['emiusumodi']) && $this->nmgp_cmp_hidden['emiusumodi'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['emiusumodi']);
       $sStyleHidden_emiusumodi = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_emiusumodi = 'display: none;';
   $sStyleReadInp_emiusumodi = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["emiusumodi"]) &&  $this->nmgp_cmp_readonly["emiusumodi"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['emiusumodi']);
       $sStyleReadLab_emiusumodi = '';
       $sStyleReadInp_emiusumodi = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['emiusumodi']) && $this->nmgp_cmp_hidden['emiusumodi'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="emiusumodi" value="<?php echo $this->form_encode_input($emiusumodi) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_emiusumodi_line" id="hidden_field_data_emiusumodi" style="<?php echo $sStyleHidden_emiusumodi; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_emiusumodi_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_emiusumodi_label" style=""><span id="id_label_emiusumodi"><?php echo $this->nm_new_label['emiusumodi']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["emiusumodi"]) &&  $this->nmgp_cmp_readonly["emiusumodi"] == "on")) { 

 ?>
<input type="hidden" name="emiusumodi" value="<?php echo $this->form_encode_input($emiusumodi) . "\"><span id=\"id_ajax_label_emiusumodi\">" . $emiusumodi . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_emiusumodi" class="sc-ui-readonly-emiusumodi css_emiusumodi_line" style="<?php echo $sStyleReadLab_emiusumodi; ?>"><?php echo $this->form_format_readonly("emiusumodi", $this->form_encode_input($this->emiusumodi)); ?></span><span id="id_read_off_emiusumodi" class="css_read_off_emiusumodi" style="white-space: nowrap;<?php echo $sStyleReadInp_emiusumodi; ?>">
 <input class="sc-js-input scFormObjectOdd css_emiusumodi_obj" style="" id="id_sc_field_emiusumodi" type=text name="emiusumodi" value="<?php echo $this->form_encode_input($emiusumodi) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emiusumodi_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emiusumodi_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['emifecmodi']))
    {
        $this->nm_new_label['emifecmodi'] = "FECHA MODIFICACIÓN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_emifecmodi = $this->emifecmodi;
   if (strlen($this->emifecmodi_hora) > 8 ) {$this->emifecmodi_hora = substr($this->emifecmodi_hora, 0, 8);}
   $this->emifecmodi .= ' ' . $this->emifecmodi_hora;
   $this->emifecmodi  = trim($this->emifecmodi);
   $emifecmodi = $this->emifecmodi;
   $sStyleHidden_emifecmodi = '';
   if (isset($this->nmgp_cmp_hidden['emifecmodi']) && $this->nmgp_cmp_hidden['emifecmodi'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['emifecmodi']);
       $sStyleHidden_emifecmodi = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_emifecmodi = 'display: none;';
   $sStyleReadInp_emifecmodi = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["emifecmodi"]) &&  $this->nmgp_cmp_readonly["emifecmodi"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['emifecmodi']);
       $sStyleReadLab_emifecmodi = '';
       $sStyleReadInp_emifecmodi = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['emifecmodi']) && $this->nmgp_cmp_hidden['emifecmodi'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="emifecmodi" value="<?php echo $this->form_encode_input($emifecmodi) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_emifecmodi_line" id="hidden_field_data_emifecmodi" style="<?php echo $sStyleHidden_emifecmodi; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_emifecmodi_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_emifecmodi_label" style=""><span id="id_label_emifecmodi"><?php echo $this->nm_new_label['emifecmodi']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["emifecmodi"]) &&  $this->nmgp_cmp_readonly["emifecmodi"] == "on")) { 

 ?>
<input type="hidden" name="emifecmodi" value="<?php echo $this->form_encode_input($emifecmodi) . "\"><span id=\"id_ajax_label_emifecmodi\">" . $emifecmodi . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_emifecmodi" class="sc-ui-readonly-emifecmodi css_emifecmodi_line" style="<?php echo $sStyleReadLab_emifecmodi; ?>"><?php echo $this->form_format_readonly("emifecmodi", $this->form_encode_input($emifecmodi)); ?></span><span id="id_read_off_emifecmodi" class="css_read_off_emifecmodi" style="white-space: nowrap;<?php echo $sStyleReadInp_emifecmodi; ?>"><?php
$tmp_form_data = $this->field_config['emifecmodi']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_emifecmodi_obj" style="" id="id_sc_field_emifecmodi" type=text name="emifecmodi" value="<?php echo $this->form_encode_input($emifecmodi) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['emifecmodi']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['emifecmodi']['date_format']; ?>', timeSep: '<?php echo $this->field_config['emifecmodi']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emifecmodi_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emifecmodi_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->emifecmodi = $old_dt_emifecmodi;
?>





<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "R")
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
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8592;)", "sc-unique-btn-23", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8592;)", "sc-unique-btn-24", "", "");?>
 
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
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8594;)", "sc-unique-btn-25", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8594;)", "sc-unique-btn-26", "", "");?>
 
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_fac_emisores_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_fac_emisores_mob");
 parent.scAjaxDetailHeight("form_fac_emisores_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_fac_emisores_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_fac_emisores_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['sc_modal'])
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
		if ($("#sc_b_new_t.sc-unique-btn-14").length && $("#sc_b_new_t.sc-unique-btn-14").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-15").length && $("#sc_b_ins_t.sc-unique-btn-15").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-16").length && $("#sc_b_sai_t.sc-unique-btn-16").is(":visible")) {
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-4").length && $("#sc_b_upd_t.sc-unique-btn-4").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
		if ($("#sc_b_upd_t.sc-unique-btn-17").length && $("#sc_b_upd_t.sc-unique-btn-17").is(":visible")) {
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
		if ($("#sc_b_sai_t.sc-unique-btn-18").length && $("#sc_b_sai_t.sc-unique-btn-18").is(":visible")) {
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-19").length && $("#sc_b_sai_t.sc-unique-btn-19").is(":visible")) {
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-20").length && $("#sc_b_sai_t.sc-unique-btn-20").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-21").length && $("#sc_b_sai_t.sc-unique-btn-21").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-22").length && $("#sc_b_sai_t.sc-unique-btn-22").is(":visible")) {
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
		if ($("#sc_b_ini_b.sc-unique-btn-23").length && $("#sc_b_ini_b.sc-unique-btn-23").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-11").length && $("#sc_b_ret_b.sc-unique-btn-11").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
		if ($("#sc_b_ret_b.sc-unique-btn-24").length && $("#sc_b_ret_b.sc-unique-btn-24").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-12").length && $("#sc_b_avc_b.sc-unique-btn-12").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
		if ($("#sc_b_avc_b.sc-unique-btn-25").length && $("#sc_b_avc_b.sc-unique-btn-25").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-13").length && $("#sc_b_fim_b.sc-unique-btn-13").is(":visible")) {
			nm_move ('final');
			 return;
		}
		if ($("#sc_b_fim_b.sc-unique-btn-26").length && $("#sc_b_fim_b.sc-unique-btn-26").is(":visible")) {
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
<span id="sc-id-mobile-out"><?php echo $this->Ini->Nm_lang['lang_version_web']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_fac_emisores_mob']['buttonStatus'] = $this->nmgp_botoes;
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
