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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("NUEVO PACIENTE"); } else { echo strip_tags("FICHA PACIENTE"); } ?></TITLE>
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
.css_read_off_fclfechareg button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fclfechanac button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fclfeccrea button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fclfecmodi button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_ficha_cliente/form_ficha_cliente_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_ficha_cliente_mob_sajax_js.php");
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

include_once('form_ficha_cliente_mob_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['recarga'];
}
    $remove_margin = '';
    $remove_border = '';
    $vertical_center = '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_ficha_cliente']['error_buffer']) && '' != $_SESSION['scriptcase']['form_ficha_cliente']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_ficha_cliente']['error_buffer'];
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
 include_once("form_ficha_cliente_mob_js0.php");
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
               action="form_ficha_cliente_mob.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_ficha_cliente_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_ficha_cliente_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "NUEVO PACIENTE"; } else { echo "FICHA PACIENTE"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['fast_search'][2] : "";
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
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "sc-unique-btn-10", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "sc-unique-btn-11", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Escape)", "sc-unique-btn-12", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + S)", "sc-unique-btn-13", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['volver'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "volver", "scBtnFn_volver()", "scBtnFn_volver()", "sc_volver_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes == "novo") {
        $sCondStyle = ($this->nmgp_botoes['volver'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "volver", "scBtnFn_volver()", "scBtnFn_volver()", "sc_volver_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['empty_filter'] = true;
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
   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">DATOS BÁSICOS</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['fclfechareg']))
           {
               $this->nmgp_cmp_readonly['fclfechareg'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['fclnumero']))
    {
        $this->nm_new_label['fclnumero'] = "No. FICHA";
    }
?>
<?php
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
<?php if (isset($this->nmgp_cmp_hidden['fclnumero']) && $this->nmgp_cmp_hidden['fclnumero'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fclnumero" value="<?php echo $this->form_encode_input($fclnumero) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclnumero_line" id="hidden_field_data_fclnumero" style="<?php echo $sStyleHidden_fclnumero; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclnumero_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclnumero_label" style=""><span id="id_label_fclnumero"><?php echo $this->nm_new_label['fclnumero']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['php_cmp_required']['fclnumero']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['php_cmp_required']['fclnumero'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["fclnumero"]) &&  $this->nmgp_cmp_readonly["fclnumero"] == "on")) { 

 ?>
<input type="hidden" name="fclnumero" value="<?php echo $this->form_encode_input($fclnumero) . "\"><span id=\"id_ajax_label_fclnumero\">" . $fclnumero . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_fclnumero" class="sc-ui-readonly-fclnumero css_fclnumero_line" style="<?php echo $sStyleReadLab_fclnumero; ?>"><?php echo $this->form_format_readonly("fclnumero", $this->form_encode_input($this->fclnumero)); ?></span><span id="id_read_off_fclnumero" class="css_read_off_fclnumero" style="white-space: nowrap;<?php echo $sStyleReadInp_fclnumero; ?>">
 <input class="sc-js-input scFormObjectOdd css_fclnumero_obj" style="" id="id_sc_field_fclnumero" type=text name="fclnumero" value="<?php echo $this->form_encode_input($fclnumero) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['fclnumero']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['fclnumero']['symbol_fmt']; ?>, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['fclnumero']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclnumero_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclnumero_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fclfechareg']))
    {
        $this->nm_new_label['fclfechareg'] = "FECHA REGISTRO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclfechareg = $this->fclfechareg;
   $sStyleHidden_fclfechareg = '';
   if (isset($this->nmgp_cmp_hidden['fclfechareg']) && $this->nmgp_cmp_hidden['fclfechareg'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclfechareg']);
       $sStyleHidden_fclfechareg = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclfechareg = 'display: none;';
   $sStyleReadInp_fclfechareg = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["fclfechareg"]) &&  $this->nmgp_cmp_readonly["fclfechareg"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclfechareg']);
       $sStyleReadLab_fclfechareg = '';
       $sStyleReadInp_fclfechareg = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclfechareg']) && $this->nmgp_cmp_hidden['fclfechareg'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fclfechareg" value="<?php echo $this->form_encode_input($fclfechareg) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclfechareg_line" id="hidden_field_data_fclfechareg" style="<?php echo $sStyleHidden_fclfechareg; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclfechareg_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclfechareg_label" style=""><span id="id_label_fclfechareg"><?php echo $this->nm_new_label['fclfechareg']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['php_cmp_required']['fclfechareg']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['php_cmp_required']['fclfechareg'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["fclfechareg"]) &&  $this->nmgp_cmp_readonly["fclfechareg"] == "on")) { 

 ?>
<input type="hidden" name="fclfechareg" value="<?php echo $this->form_encode_input($fclfechareg) . "\"><span id=\"id_ajax_label_fclfechareg\">" . $fclfechareg . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_fclfechareg" class="sc-ui-readonly-fclfechareg css_fclfechareg_line" style="<?php echo $sStyleReadLab_fclfechareg; ?>"><?php echo $this->form_format_readonly("fclfechareg", $this->form_encode_input($fclfechareg)); ?></span><span id="id_read_off_fclfechareg" class="css_read_off_fclfechareg" style="white-space: nowrap;<?php echo $sStyleReadInp_fclfechareg; ?>"><?php
$tmp_form_data = $this->field_config['fclfechareg']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fclfechareg_obj" style="" id="id_sc_field_fclfechareg" type=text name="fclfechareg" value="<?php echo $this->form_encode_input($fclfechareg) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fclfechareg']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fclfechareg']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclfechareg_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclfechareg_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fclcedula']))
    {
        $this->nm_new_label['fclcedula'] = "No. IDENTIFICACIÓN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclcedula = $this->fclcedula;
   $sStyleHidden_fclcedula = '';
   if (isset($this->nmgp_cmp_hidden['fclcedula']) && $this->nmgp_cmp_hidden['fclcedula'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclcedula']);
       $sStyleHidden_fclcedula = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclcedula = 'display: none;';
   $sStyleReadInp_fclcedula = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclcedula']) && $this->nmgp_cmp_readonly['fclcedula'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclcedula']);
       $sStyleReadLab_fclcedula = '';
       $sStyleReadInp_fclcedula = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclcedula']) && $this->nmgp_cmp_hidden['fclcedula'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fclcedula" value="<?php echo $this->form_encode_input($fclcedula) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclcedula_line" id="hidden_field_data_fclcedula" style="<?php echo $sStyleHidden_fclcedula; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclcedula_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclcedula_label" style=""><span id="id_label_fclcedula"><?php echo $this->nm_new_label['fclcedula']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['php_cmp_required']['fclcedula']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['php_cmp_required']['fclcedula'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclcedula"]) &&  $this->nmgp_cmp_readonly["fclcedula"] == "on") { 

 ?>
<input type="hidden" name="fclcedula" value="<?php echo $this->form_encode_input($fclcedula) . "\">" . $fclcedula . ""; ?>
<?php } else { ?>
<span id="id_read_on_fclcedula" class="sc-ui-readonly-fclcedula css_fclcedula_line" style="<?php echo $sStyleReadLab_fclcedula; ?>"><?php echo $this->form_format_readonly("fclcedula", $this->form_encode_input($this->fclcedula)); ?></span><span id="id_read_off_fclcedula" class="css_read_off_fclcedula" style="white-space: nowrap;<?php echo $sStyleReadInp_fclcedula; ?>">
 <input class="sc-js-input scFormObjectOdd css_fclcedula_obj" style="" id="id_sc_field_fclcedula" type=text name="fclcedula" value="<?php echo $this->form_encode_input($fclcedula) ?>"
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclcedula_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclcedula_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fclactivo']))
   {
       $this->nm_new_label['fclactivo'] = "ACTIVO";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclactivo = $this->fclactivo;
   $sStyleHidden_fclactivo = '';
   if (isset($this->nmgp_cmp_hidden['fclactivo']) && $this->nmgp_cmp_hidden['fclactivo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclactivo']);
       $sStyleHidden_fclactivo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclactivo = 'display: none;';
   $sStyleReadInp_fclactivo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclactivo']) && $this->nmgp_cmp_readonly['fclactivo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclactivo']);
       $sStyleReadLab_fclactivo = '';
       $sStyleReadInp_fclactivo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclactivo']) && $this->nmgp_cmp_hidden['fclactivo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fclactivo" value="<?php echo $this->form_encode_input($this->fclactivo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->fclactivo_1 = explode(";", trim($this->fclactivo));
  } 
  else
  {
      if (empty($this->fclactivo))
      {
          $this->fclactivo_1= array(); 
          $this->fclactivo= "";
      } 
      else
      {
          $this->fclactivo_1= $this->fclactivo; 
          $this->fclactivo= ""; 
          foreach ($this->fclactivo_1 as $cada_fclactivo)
          {
             if (!empty($fclactivo))
             {
                 $this->fclactivo.= ";"; 
             } 
             $this->fclactivo.= $cada_fclactivo; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_fclactivo_line" id="hidden_field_data_fclactivo" style="<?php echo $sStyleHidden_fclactivo; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclactivo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclactivo_label" style=""><span id="id_label_fclactivo"><?php echo $this->nm_new_label['fclactivo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclactivo"]) &&  $this->nmgp_cmp_readonly["fclactivo"] == "on") { 

$fclactivo_look = "";
 if ($this->fclactivo == "1") { $fclactivo_look .= "" ;} 
 if (empty($fclactivo_look)) { $fclactivo_look = $this->fclactivo; }
?>
<input type="hidden" name="fclactivo" value="<?php echo $this->form_encode_input($fclactivo) . "\">" . $fclactivo_look . ""; ?>
<?php } else { ?>

<?php

$fclactivo_look = "";
 if ($this->fclactivo == "1") { $fclactivo_look .= "" ;} 
 if (empty($fclactivo_look)) { $fclactivo_look = $this->fclactivo; }
?>
<span id="id_read_on_fclactivo" class="css_fclactivo_line" style="<?php echo $sStyleReadLab_fclactivo; ?>"><?php echo $this->form_format_readonly("fclactivo", $this->form_encode_input($fclactivo_look)); ?></span><span id="id_read_off_fclactivo" class="css_read_off_fclactivo css_fclactivo_line" style="<?php echo $sStyleReadInp_fclactivo; ?>"><?php echo "<div id=\"idAjaxCheckbox_fclactivo\" style=\"display: inline-block\" class=\"css_fclactivo_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_fclactivo_line"><?php $tempOptionId = "id-opt-fclactivo" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-fclactivo sc-ui-checkbox-fclactivo" name="fclactivo[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclactivo'][] = '1'; ?>
<?php  if (in_array("1", $this->fclactivo_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>"></label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclactivo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclactivo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_fclactivo_dumb = ('' == $sStyleHidden_fclactivo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fclactivo_dumb" style="<?php echo $sStyleHidden_fclactivo_dumb; ?>"></TD>
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
    if (!isset($this->nm_new_label['fclapellidos']))
    {
        $this->nm_new_label['fclapellidos'] = "APELLIDOS";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclapellidos = $this->fclapellidos;
   $sStyleHidden_fclapellidos = '';
   if (isset($this->nmgp_cmp_hidden['fclapellidos']) && $this->nmgp_cmp_hidden['fclapellidos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclapellidos']);
       $sStyleHidden_fclapellidos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclapellidos = 'display: none;';
   $sStyleReadInp_fclapellidos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclapellidos']) && $this->nmgp_cmp_readonly['fclapellidos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclapellidos']);
       $sStyleReadLab_fclapellidos = '';
       $sStyleReadInp_fclapellidos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclapellidos']) && $this->nmgp_cmp_hidden['fclapellidos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fclapellidos" value="<?php echo $this->form_encode_input($fclapellidos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclapellidos_line" id="hidden_field_data_fclapellidos" style="<?php echo $sStyleHidden_fclapellidos; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclapellidos_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclapellidos_label" style=""><span id="id_label_fclapellidos"><?php echo $this->nm_new_label['fclapellidos']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['php_cmp_required']['fclapellidos']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['php_cmp_required']['fclapellidos'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclapellidos"]) &&  $this->nmgp_cmp_readonly["fclapellidos"] == "on") { 

 ?>
<input type="hidden" name="fclapellidos" value="<?php echo $this->form_encode_input($fclapellidos) . "\">" . $fclapellidos . ""; ?>
<?php } else { ?>
<span id="id_read_on_fclapellidos" class="sc-ui-readonly-fclapellidos css_fclapellidos_line" style="<?php echo $sStyleReadLab_fclapellidos; ?>"><?php echo $this->form_format_readonly("fclapellidos", $this->form_encode_input($this->fclapellidos)); ?></span><span id="id_read_off_fclapellidos" class="css_read_off_fclapellidos" style="white-space: nowrap;<?php echo $sStyleReadInp_fclapellidos; ?>">
 <input class="sc-js-input scFormObjectOdd css_fclapellidos_obj" style="" id="id_sc_field_fclapellidos" type=text name="fclapellidos" value="<?php echo $this->form_encode_input($fclapellidos) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789Ã¡Ã©Ã­Ã³ÃºÃ Ã¨Ã¬Ã²Ã¹Ã£ÃµÃ¢ÃªÃ®Ã´Ã»Ã¤Ã«Ã¯Ã¶Ã¼Ã±Ã½Ã¿Â¨Â´`^~Ã§ .,") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclapellidos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclapellidos_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fclnombres']))
    {
        $this->nm_new_label['fclnombres'] = "NOMBRES";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclnombres = $this->fclnombres;
   $sStyleHidden_fclnombres = '';
   if (isset($this->nmgp_cmp_hidden['fclnombres']) && $this->nmgp_cmp_hidden['fclnombres'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclnombres']);
       $sStyleHidden_fclnombres = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclnombres = 'display: none;';
   $sStyleReadInp_fclnombres = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclnombres']) && $this->nmgp_cmp_readonly['fclnombres'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclnombres']);
       $sStyleReadLab_fclnombres = '';
       $sStyleReadInp_fclnombres = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclnombres']) && $this->nmgp_cmp_hidden['fclnombres'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fclnombres" value="<?php echo $this->form_encode_input($fclnombres) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclnombres_line" id="hidden_field_data_fclnombres" style="<?php echo $sStyleHidden_fclnombres; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclnombres_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclnombres_label" style=""><span id="id_label_fclnombres"><?php echo $this->nm_new_label['fclnombres']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['php_cmp_required']['fclnombres']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['php_cmp_required']['fclnombres'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclnombres"]) &&  $this->nmgp_cmp_readonly["fclnombres"] == "on") { 

 ?>
<input type="hidden" name="fclnombres" value="<?php echo $this->form_encode_input($fclnombres) . "\">" . $fclnombres . ""; ?>
<?php } else { ?>
<span id="id_read_on_fclnombres" class="sc-ui-readonly-fclnombres css_fclnombres_line" style="<?php echo $sStyleReadLab_fclnombres; ?>"><?php echo $this->form_format_readonly("fclnombres", $this->form_encode_input($this->fclnombres)); ?></span><span id="id_read_off_fclnombres" class="css_read_off_fclnombres" style="white-space: nowrap;<?php echo $sStyleReadInp_fclnombres; ?>">
 <input class="sc-js-input scFormObjectOdd css_fclnombres_obj" style="" id="id_sc_field_fclnombres" type=text name="fclnombres" value="<?php echo $this->form_encode_input($fclnombres) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789Ã¡Ã©Ã­Ã³ÃºÃ Ã¨Ã¬Ã²Ã¹Ã£ÃµÃ¢ÃªÃ®Ã´Ã»Ã¤Ã«Ã¯Ã¶Ã¼Ã±Ã½Ã¿Â¨Â´`^~Ã§ .,") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclnombres_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclnombres_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['update_titulo_citas']))
   {
       $this->nm_new_label['update_titulo_citas'] = "ACTUALIZAR ASUNTO CITAS";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $update_titulo_citas = $this->update_titulo_citas;
   $sStyleHidden_update_titulo_citas = '';
   if (isset($this->nmgp_cmp_hidden['update_titulo_citas']) && $this->nmgp_cmp_hidden['update_titulo_citas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['update_titulo_citas']);
       $sStyleHidden_update_titulo_citas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_update_titulo_citas = 'display: none;';
   $sStyleReadInp_update_titulo_citas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['update_titulo_citas']) && $this->nmgp_cmp_readonly['update_titulo_citas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['update_titulo_citas']);
       $sStyleReadLab_update_titulo_citas = '';
       $sStyleReadInp_update_titulo_citas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['update_titulo_citas']) && $this->nmgp_cmp_hidden['update_titulo_citas'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="update_titulo_citas" value="<?php echo $this->form_encode_input($this->update_titulo_citas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->update_titulo_citas_1 = explode(";", trim($this->update_titulo_citas));
  } 
  else
  {
      if (empty($this->update_titulo_citas))
      {
          $this->update_titulo_citas_1= array(); 
          $this->update_titulo_citas= "";
      } 
      else
      {
          $this->update_titulo_citas_1= $this->update_titulo_citas; 
          $this->update_titulo_citas= ""; 
          foreach ($this->update_titulo_citas_1 as $cada_update_titulo_citas)
          {
             if (!empty($update_titulo_citas))
             {
                 $this->update_titulo_citas.= ";"; 
             } 
             $this->update_titulo_citas.= $cada_update_titulo_citas; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_update_titulo_citas_line" id="hidden_field_data_update_titulo_citas" style="<?php echo $sStyleHidden_update_titulo_citas; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_update_titulo_citas_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_update_titulo_citas_label" style=""><span id="id_label_update_titulo_citas"><?php echo $this->nm_new_label['update_titulo_citas']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["update_titulo_citas"]) &&  $this->nmgp_cmp_readonly["update_titulo_citas"] == "on") { 

$update_titulo_citas_look = "";
 if ($this->update_titulo_citas == "1") { $update_titulo_citas_look .= "" ;} 
 if (empty($update_titulo_citas_look)) { $update_titulo_citas_look = $this->update_titulo_citas; }
?>
<input type="hidden" name="update_titulo_citas" value="<?php echo $this->form_encode_input($update_titulo_citas) . "\">" . $update_titulo_citas_look . ""; ?>
<?php } else { ?>

<?php

$update_titulo_citas_look = "";
 if ($this->update_titulo_citas == "1") { $update_titulo_citas_look .= "" ;} 
 if (empty($update_titulo_citas_look)) { $update_titulo_citas_look = $this->update_titulo_citas; }
?>
<span id="id_read_on_update_titulo_citas" class="css_update_titulo_citas_line" style="<?php echo $sStyleReadLab_update_titulo_citas; ?>"><?php echo $this->form_format_readonly("update_titulo_citas", $this->form_encode_input($update_titulo_citas_look)); ?></span><span id="id_read_off_update_titulo_citas" class="css_read_off_update_titulo_citas css_update_titulo_citas_line" style="<?php echo $sStyleReadInp_update_titulo_citas; ?>"><?php echo "<div id=\"idAjaxCheckbox_update_titulo_citas\" style=\"display: inline-block\" class=\"css_update_titulo_citas_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_update_titulo_citas_line"><?php $tempOptionId = "id-opt-update_titulo_citas" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-update_titulo_citas sc-ui-checkbox-update_titulo_citas" name="update_titulo_citas[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_update_titulo_citas'][] = '1'; ?>
<?php  if (in_array("1", $this->update_titulo_citas_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>"></label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_update_titulo_citas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_update_titulo_citas_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fclfechanac']))
    {
        $this->nm_new_label['fclfechanac'] = "FECHA DE NACIMIENTO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclfechanac = $this->fclfechanac;
   $sStyleHidden_fclfechanac = '';
   if (isset($this->nmgp_cmp_hidden['fclfechanac']) && $this->nmgp_cmp_hidden['fclfechanac'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclfechanac']);
       $sStyleHidden_fclfechanac = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclfechanac = 'display: none;';
   $sStyleReadInp_fclfechanac = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclfechanac']) && $this->nmgp_cmp_readonly['fclfechanac'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclfechanac']);
       $sStyleReadLab_fclfechanac = '';
       $sStyleReadInp_fclfechanac = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclfechanac']) && $this->nmgp_cmp_hidden['fclfechanac'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fclfechanac" value="<?php echo $this->form_encode_input($fclfechanac) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclfechanac_line" id="hidden_field_data_fclfechanac" style="<?php echo $sStyleHidden_fclfechanac; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclfechanac_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclfechanac_label" style=""><span id="id_label_fclfechanac"><?php echo $this->nm_new_label['fclfechanac']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['php_cmp_required']['fclfechanac']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['php_cmp_required']['fclfechanac'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclfechanac"]) &&  $this->nmgp_cmp_readonly["fclfechanac"] == "on") { 

 ?>
<input type="hidden" name="fclfechanac" value="<?php echo $this->form_encode_input($fclfechanac) . "\">" . $fclfechanac . ""; ?>
<?php } else { ?>
<span id="id_read_on_fclfechanac" class="sc-ui-readonly-fclfechanac css_fclfechanac_line" style="<?php echo $sStyleReadLab_fclfechanac; ?>"><?php echo $this->form_format_readonly("fclfechanac", $this->form_encode_input($fclfechanac)); ?></span><span id="id_read_off_fclfechanac" class="css_read_off_fclfechanac" style="white-space: nowrap;<?php echo $sStyleReadInp_fclfechanac; ?>"><?php
$tmp_form_data = $this->field_config['fclfechanac']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fclfechanac_obj" style="" id="id_sc_field_fclfechanac" type=text name="fclfechanac" value="<?php echo $this->form_encode_input($fclfechanac) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fclfechanac']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fclfechanac']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclfechanac_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclfechanac_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_fclfechanac_dumb = ('' == $sStyleHidden_fclfechanac) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fclfechanac_dumb" style="<?php echo $sStyleHidden_fclfechanac_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fclsexo']))
    {
        $this->nm_new_label['fclsexo'] = "SEXO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclsexo = $this->fclsexo;
   $sStyleHidden_fclsexo = '';
   if (isset($this->nmgp_cmp_hidden['fclsexo']) && $this->nmgp_cmp_hidden['fclsexo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclsexo']);
       $sStyleHidden_fclsexo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclsexo = 'display: none;';
   $sStyleReadInp_fclsexo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclsexo']) && $this->nmgp_cmp_readonly['fclsexo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclsexo']);
       $sStyleReadLab_fclsexo = '';
       $sStyleReadInp_fclsexo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclsexo']) && $this->nmgp_cmp_hidden['fclsexo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fclsexo" value="<?php echo $this->form_encode_input($fclsexo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclsexo_line" id="hidden_field_data_fclsexo" style="<?php echo $sStyleHidden_fclsexo; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclsexo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclsexo_label" style=""><span id="id_label_fclsexo"><?php echo $this->nm_new_label['fclsexo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['php_cmp_required']['fclsexo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['php_cmp_required']['fclsexo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclsexo"]) &&  $this->nmgp_cmp_readonly["fclsexo"] == "on") { 

 if ("M" == $this->fclsexo) { $fclsexo_look = "MASCULINO";} 
 if ("F" == $this->fclsexo) { $fclsexo_look = "FEMENINO";} 
?>
<input type="hidden" name="fclsexo" value="<?php echo $this->form_encode_input($fclsexo) . "\">" . $fclsexo_look . ""; ?>
<?php } else { ?>

<?php

 if ("M" == $this->fclsexo) { $fclsexo_look = "MASCULINO";} 
 if ("F" == $this->fclsexo) { $fclsexo_look = "FEMENINO";} 
?>
<span id="id_read_on_fclsexo"  class="css_fclsexo_line" style="<?php echo $sStyleReadLab_fclsexo; ?>"><?php echo $this->form_format_readonly("fclsexo", $this->form_encode_input($fclsexo_look)); ?></span><span id="id_read_off_fclsexo" class="css_read_off_fclsexo css_fclsexo_line" style="<?php echo $sStyleReadInp_fclsexo; ?>"><div id="idAjaxRadio_fclsexo" style="display: inline-block"  class="css_fclsexo_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_fclsexo_line"><?php $tempOptionId = "id-opt-fclsexo" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-fclsexo sc-ui-radio-fclsexo" type=radio name="fclsexo" value="M"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclsexo'][] = 'M'; ?>
<?php  if ("M" == $this->fclsexo)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">MASCULINO</label></TD>
  <TD class="scFormDataFontOdd css_fclsexo_line"><?php $tempOptionId = "id-opt-fclsexo" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-fclsexo sc-ui-radio-fclsexo" type=radio name="fclsexo" value="F"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclsexo'][] = 'F'; ?>
<?php  if ("F" == $this->fclsexo)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">FEMENINO</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclsexo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclsexo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fclestciv']))
   {
       $this->nm_new_label['fclestciv'] = "ESTADO CIVIL";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclestciv = $this->fclestciv;
   $sStyleHidden_fclestciv = '';
   if (isset($this->nmgp_cmp_hidden['fclestciv']) && $this->nmgp_cmp_hidden['fclestciv'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclestciv']);
       $sStyleHidden_fclestciv = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclestciv = 'display: none;';
   $sStyleReadInp_fclestciv = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclestciv']) && $this->nmgp_cmp_readonly['fclestciv'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclestciv']);
       $sStyleReadLab_fclestciv = '';
       $sStyleReadInp_fclestciv = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclestciv']) && $this->nmgp_cmp_hidden['fclestciv'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fclestciv" value="<?php echo $this->form_encode_input($this->fclestciv) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclestciv_line" id="hidden_field_data_fclestciv" style="<?php echo $sStyleHidden_fclestciv; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclestciv_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclestciv_label" style=""><span id="id_label_fclestciv"><?php echo $this->nm_new_label['fclestciv']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclestciv"]) &&  $this->nmgp_cmp_readonly["fclestciv"] == "on") { 

$fclestciv_look = "";
 if ($this->fclestciv == "S") { $fclestciv_look .= "SOLTERO" ;} 
 if ($this->fclestciv == "C") { $fclestciv_look .= "CASADO" ;} 
 if ($this->fclestciv == "V") { $fclestciv_look .= "VIUDO" ;} 
 if ($this->fclestciv == "D") { $fclestciv_look .= "DIVORCIADO" ;} 
 if ($this->fclestciv == "U") { $fclestciv_look .= "UNIÓN LIBRE" ;} 
 if (empty($fclestciv_look)) { $fclestciv_look = $this->fclestciv; }
?>
<input type="hidden" name="fclestciv" value="<?php echo $this->form_encode_input($fclestciv) . "\">" . $fclestciv_look . ""; ?>
<?php } else { ?>
<?php

$fclestciv_look = "";
 if ($this->fclestciv == "S") { $fclestciv_look .= "SOLTERO" ;} 
 if ($this->fclestciv == "C") { $fclestciv_look .= "CASADO" ;} 
 if ($this->fclestciv == "V") { $fclestciv_look .= "VIUDO" ;} 
 if ($this->fclestciv == "D") { $fclestciv_look .= "DIVORCIADO" ;} 
 if ($this->fclestciv == "U") { $fclestciv_look .= "UNIÓN LIBRE" ;} 
 if (empty($fclestciv_look)) { $fclestciv_look = $this->fclestciv; }
?>
<span id="id_read_on_fclestciv" class="css_fclestciv_line"  style="<?php echo $sStyleReadLab_fclestciv; ?>"><?php echo $this->form_format_readonly("fclestciv", $this->form_encode_input($fclestciv_look)); ?></span><span id="id_read_off_fclestciv" class="css_read_off_fclestciv" style="white-space: nowrap; <?php echo $sStyleReadInp_fclestciv; ?>">
 <span id="idAjaxSelect_fclestciv"><select class="sc-js-input scFormObjectOdd css_fclestciv_obj" style="" id="id_sc_field_fclestciv" name="fclestciv" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclestciv'][] = ''; ?>
 <option value="">------------------------</option>
 <option  value="S" <?php  if ($this->fclestciv == "S") { echo " selected" ;} ?>>SOLTERO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclestciv'][] = 'S'; ?>
 <option  value="C" <?php  if ($this->fclestciv == "C") { echo " selected" ;} ?>>CASADO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclestciv'][] = 'C'; ?>
 <option  value="V" <?php  if ($this->fclestciv == "V") { echo " selected" ;} ?>>VIUDO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclestciv'][] = 'V'; ?>
 <option  value="D" <?php  if ($this->fclestciv == "D") { echo " selected" ;} ?>>DIVORCIADO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclestciv'][] = 'D'; ?>
 <option  value="U" <?php  if ($this->fclestciv == "U") { echo " selected" ;} ?>>UNIÓN LIBRE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclestciv'][] = 'U'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclestciv_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclestciv_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fcldireccion']))
    {
        $this->nm_new_label['fcldireccion'] = "DIRECCIÓN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fcldireccion = $this->fcldireccion;
   $sStyleHidden_fcldireccion = '';
   if (isset($this->nmgp_cmp_hidden['fcldireccion']) && $this->nmgp_cmp_hidden['fcldireccion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fcldireccion']);
       $sStyleHidden_fcldireccion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fcldireccion = 'display: none;';
   $sStyleReadInp_fcldireccion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fcldireccion']) && $this->nmgp_cmp_readonly['fcldireccion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fcldireccion']);
       $sStyleReadLab_fcldireccion = '';
       $sStyleReadInp_fcldireccion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fcldireccion']) && $this->nmgp_cmp_hidden['fcldireccion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fcldireccion" value="<?php echo $this->form_encode_input($fcldireccion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fcldireccion_line" id="hidden_field_data_fcldireccion" style="<?php echo $sStyleHidden_fcldireccion; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fcldireccion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fcldireccion_label" style=""><span id="id_label_fcldireccion"><?php echo $this->nm_new_label['fcldireccion']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fcldireccion"]) &&  $this->nmgp_cmp_readonly["fcldireccion"] == "on") { 

 ?>
<input type="hidden" name="fcldireccion" value="<?php echo $this->form_encode_input($fcldireccion) . "\">" . $fcldireccion . ""; ?>
<?php } else { ?>
<span id="id_read_on_fcldireccion" class="sc-ui-readonly-fcldireccion css_fcldireccion_line" style="<?php echo $sStyleReadLab_fcldireccion; ?>"><?php echo $this->form_format_readonly("fcldireccion", $this->form_encode_input($this->fcldireccion)); ?></span><span id="id_read_off_fcldireccion" class="css_read_off_fcldireccion" style="white-space: nowrap;<?php echo $sStyleReadInp_fcldireccion; ?>">
 <input class="sc-js-input scFormObjectOdd css_fcldireccion_obj" style="" id="id_sc_field_fcldireccion" type=text name="fcldireccion" value="<?php echo $this->form_encode_input($fcldireccion) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fcldireccion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fcldireccion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fclciudad']))
    {
        $this->nm_new_label['fclciudad'] = "CIUDAD";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclciudad = $this->fclciudad;
   $sStyleHidden_fclciudad = '';
   if (isset($this->nmgp_cmp_hidden['fclciudad']) && $this->nmgp_cmp_hidden['fclciudad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclciudad']);
       $sStyleHidden_fclciudad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclciudad = 'display: none;';
   $sStyleReadInp_fclciudad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclciudad']) && $this->nmgp_cmp_readonly['fclciudad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclciudad']);
       $sStyleReadLab_fclciudad = '';
       $sStyleReadInp_fclciudad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclciudad']) && $this->nmgp_cmp_hidden['fclciudad'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fclciudad" value="<?php echo $this->form_encode_input($fclciudad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclciudad_line" id="hidden_field_data_fclciudad" style="<?php echo $sStyleHidden_fclciudad; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclciudad_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclciudad_label" style=""><span id="id_label_fclciudad"><?php echo $this->nm_new_label['fclciudad']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclciudad"]) &&  $this->nmgp_cmp_readonly["fclciudad"] == "on") { 

 ?>
<input type="hidden" name="fclciudad" value="<?php echo $this->form_encode_input($fclciudad) . "\">" . $fclciudad . ""; ?>
<?php } else { ?>
<span id="id_read_on_fclciudad" class="sc-ui-readonly-fclciudad css_fclciudad_line" style="<?php echo $sStyleReadLab_fclciudad; ?>"><?php echo $this->form_format_readonly("fclciudad", $this->form_encode_input($this->fclciudad)); ?></span><span id="id_read_off_fclciudad" class="css_read_off_fclciudad" style="white-space: nowrap;<?php echo $sStyleReadInp_fclciudad; ?>">
 <input class="sc-js-input scFormObjectOdd css_fclciudad_obj" style="" id="id_sc_field_fclciudad" type=text name="fclciudad" value="<?php echo $this->form_encode_input($fclciudad) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclciudad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclciudad_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fcltelefono']))
    {
        $this->nm_new_label['fcltelefono'] = "TELÉFONO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fcltelefono = $this->fcltelefono;
   $sStyleHidden_fcltelefono = '';
   if (isset($this->nmgp_cmp_hidden['fcltelefono']) && $this->nmgp_cmp_hidden['fcltelefono'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fcltelefono']);
       $sStyleHidden_fcltelefono = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fcltelefono = 'display: none;';
   $sStyleReadInp_fcltelefono = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fcltelefono']) && $this->nmgp_cmp_readonly['fcltelefono'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fcltelefono']);
       $sStyleReadLab_fcltelefono = '';
       $sStyleReadInp_fcltelefono = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fcltelefono']) && $this->nmgp_cmp_hidden['fcltelefono'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fcltelefono" value="<?php echo $this->form_encode_input($fcltelefono) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fcltelefono_line" id="hidden_field_data_fcltelefono" style="<?php echo $sStyleHidden_fcltelefono; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fcltelefono_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fcltelefono_label" style=""><span id="id_label_fcltelefono"><?php echo $this->nm_new_label['fcltelefono']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fcltelefono"]) &&  $this->nmgp_cmp_readonly["fcltelefono"] == "on") { 

 ?>
<input type="hidden" name="fcltelefono" value="<?php echo $this->form_encode_input($fcltelefono) . "\">" . $fcltelefono . ""; ?>
<?php } else { ?>
<span id="id_read_on_fcltelefono" class="sc-ui-readonly-fcltelefono css_fcltelefono_line" style="<?php echo $sStyleReadLab_fcltelefono; ?>"><?php echo $this->form_format_readonly("fcltelefono", $this->form_encode_input($this->fcltelefono)); ?></span><span id="id_read_off_fcltelefono" class="css_read_off_fcltelefono" style="white-space: nowrap;<?php echo $sStyleReadInp_fcltelefono; ?>">
 <input class="sc-js-input scFormObjectOdd css_fcltelefono_obj" style="" id="id_sc_field_fcltelefono" type=text name="fcltelefono" value="<?php echo $this->form_encode_input($fcltelefono) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fcltelefono_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fcltelefono_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fclcelular']))
    {
        $this->nm_new_label['fclcelular'] = "CELULAR";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclcelular = $this->fclcelular;
   $sStyleHidden_fclcelular = '';
   if (isset($this->nmgp_cmp_hidden['fclcelular']) && $this->nmgp_cmp_hidden['fclcelular'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclcelular']);
       $sStyleHidden_fclcelular = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclcelular = 'display: none;';
   $sStyleReadInp_fclcelular = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclcelular']) && $this->nmgp_cmp_readonly['fclcelular'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclcelular']);
       $sStyleReadLab_fclcelular = '';
       $sStyleReadInp_fclcelular = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclcelular']) && $this->nmgp_cmp_hidden['fclcelular'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fclcelular" value="<?php echo $this->form_encode_input($fclcelular) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclcelular_line" id="hidden_field_data_fclcelular" style="<?php echo $sStyleHidden_fclcelular; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclcelular_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclcelular_label" style=""><span id="id_label_fclcelular"><?php echo $this->nm_new_label['fclcelular']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclcelular"]) &&  $this->nmgp_cmp_readonly["fclcelular"] == "on") { 

 ?>
<input type="hidden" name="fclcelular" value="<?php echo $this->form_encode_input($fclcelular) . "\">" . $fclcelular . ""; ?>
<?php } else { ?>
<span id="id_read_on_fclcelular" class="sc-ui-readonly-fclcelular css_fclcelular_line" style="<?php echo $sStyleReadLab_fclcelular; ?>"><?php echo $this->form_format_readonly("fclcelular", $this->form_encode_input($this->fclcelular)); ?></span><span id="id_read_off_fclcelular" class="css_read_off_fclcelular" style="white-space: nowrap;<?php echo $sStyleReadInp_fclcelular; ?>">
 <input class="sc-js-input scFormObjectOdd css_fclcelular_obj" style="" id="id_sc_field_fclcelular" type=text name="fclcelular" value="<?php echo $this->form_encode_input($fclcelular) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789 ,") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclcelular_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclcelular_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fclemail']))
    {
        $this->nm_new_label['fclemail'] = "CORREO ELECTRÓNICO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclemail = $this->fclemail;
   $sStyleHidden_fclemail = '';
   if (isset($this->nmgp_cmp_hidden['fclemail']) && $this->nmgp_cmp_hidden['fclemail'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclemail']);
       $sStyleHidden_fclemail = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclemail = 'display: none;';
   $sStyleReadInp_fclemail = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclemail']) && $this->nmgp_cmp_readonly['fclemail'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclemail']);
       $sStyleReadLab_fclemail = '';
       $sStyleReadInp_fclemail = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclemail']) && $this->nmgp_cmp_hidden['fclemail'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fclemail" value="<?php echo $this->form_encode_input($fclemail) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclemail_line" id="hidden_field_data_fclemail" style="<?php echo $sStyleHidden_fclemail; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclemail_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclemail_label" style=""><span id="id_label_fclemail"><?php echo $this->nm_new_label['fclemail']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['php_cmp_required']['fclemail']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['php_cmp_required']['fclemail'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclemail"]) &&  $this->nmgp_cmp_readonly["fclemail"] == "on") { 

 ?>
<input type="hidden" name="fclemail" value="<?php echo $this->form_encode_input($fclemail) . "\">" . $fclemail . ""; ?>
<?php } else { ?>
<span id="id_read_on_fclemail" class="sc-ui-readonly-fclemail css_fclemail_line" style="<?php echo $sStyleReadLab_fclemail; ?>"><?php echo $this->form_format_readonly("fclemail", $this->form_encode_input($this->fclemail)); ?></span><span id="id_read_off_fclemail" class="css_read_off_fclemail" style="white-space: nowrap;<?php echo $sStyleReadInp_fclemail; ?>">
 <input class="sc-js-input scFormObjectOdd css_fclemail_obj" style="" id="id_sc_field_fclemail" type=text name="fclemail" value="<?php echo $this->form_encode_input($fclemail) ?>"
 size=50 maxlength=50 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span style="display: none"><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.fclemail.value != '') {window.open('mailto:' + document.F1.fclemail.value); }", "if (document.F1.fclemail.value != '') {window.open('mailto:' + document.F1.fclemail.value); }", "fclemail_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclemail_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclemail_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fclprofesion']))
    {
        $this->nm_new_label['fclprofesion'] = "PROFESIÓN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclprofesion = $this->fclprofesion;
   $sStyleHidden_fclprofesion = '';
   if (isset($this->nmgp_cmp_hidden['fclprofesion']) && $this->nmgp_cmp_hidden['fclprofesion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclprofesion']);
       $sStyleHidden_fclprofesion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclprofesion = 'display: none;';
   $sStyleReadInp_fclprofesion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclprofesion']) && $this->nmgp_cmp_readonly['fclprofesion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclprofesion']);
       $sStyleReadLab_fclprofesion = '';
       $sStyleReadInp_fclprofesion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclprofesion']) && $this->nmgp_cmp_hidden['fclprofesion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fclprofesion" value="<?php echo $this->form_encode_input($fclprofesion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclprofesion_line" id="hidden_field_data_fclprofesion" style="<?php echo $sStyleHidden_fclprofesion; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclprofesion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclprofesion_label" style=""><span id="id_label_fclprofesion"><?php echo $this->nm_new_label['fclprofesion']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclprofesion"]) &&  $this->nmgp_cmp_readonly["fclprofesion"] == "on") { 

 ?>
<input type="hidden" name="fclprofesion" value="<?php echo $this->form_encode_input($fclprofesion) . "\">" . $fclprofesion . ""; ?>
<?php } else { ?>
<span id="id_read_on_fclprofesion" class="sc-ui-readonly-fclprofesion css_fclprofesion_line" style="<?php echo $sStyleReadLab_fclprofesion; ?>"><?php echo $this->form_format_readonly("fclprofesion", $this->form_encode_input($this->fclprofesion)); ?></span><span id="id_read_off_fclprofesion" class="css_read_off_fclprofesion" style="white-space: nowrap;<?php echo $sStyleReadInp_fclprofesion; ?>">
 <input class="sc-js-input scFormObjectOdd css_fclprofesion_obj" style="" id="id_sc_field_fclprofesion" type=text name="fclprofesion" value="<?php echo $this->form_encode_input($fclprofesion) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclprofesion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclprofesion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fcllugartrab']))
    {
        $this->nm_new_label['fcllugartrab'] = "LUGAR DE TRABAJO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fcllugartrab = $this->fcllugartrab;
   $sStyleHidden_fcllugartrab = '';
   if (isset($this->nmgp_cmp_hidden['fcllugartrab']) && $this->nmgp_cmp_hidden['fcllugartrab'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fcllugartrab']);
       $sStyleHidden_fcllugartrab = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fcllugartrab = 'display: none;';
   $sStyleReadInp_fcllugartrab = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fcllugartrab']) && $this->nmgp_cmp_readonly['fcllugartrab'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fcllugartrab']);
       $sStyleReadLab_fcllugartrab = '';
       $sStyleReadInp_fcllugartrab = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fcllugartrab']) && $this->nmgp_cmp_hidden['fcllugartrab'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fcllugartrab" value="<?php echo $this->form_encode_input($fcllugartrab) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fcllugartrab_line" id="hidden_field_data_fcllugartrab" style="<?php echo $sStyleHidden_fcllugartrab; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fcllugartrab_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fcllugartrab_label" style=""><span id="id_label_fcllugartrab"><?php echo $this->nm_new_label['fcllugartrab']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fcllugartrab"]) &&  $this->nmgp_cmp_readonly["fcllugartrab"] == "on") { 

 ?>
<input type="hidden" name="fcllugartrab" value="<?php echo $this->form_encode_input($fcllugartrab) . "\">" . $fcllugartrab . ""; ?>
<?php } else { ?>
<span id="id_read_on_fcllugartrab" class="sc-ui-readonly-fcllugartrab css_fcllugartrab_line" style="<?php echo $sStyleReadLab_fcllugartrab; ?>"><?php echo $this->form_format_readonly("fcllugartrab", $this->form_encode_input($this->fcllugartrab)); ?></span><span id="id_read_off_fcllugartrab" class="css_read_off_fcllugartrab" style="white-space: nowrap;<?php echo $sStyleReadInp_fcllugartrab; ?>">
 <input class="sc-js-input scFormObjectOdd css_fcllugartrab_obj" style="" id="id_sc_field_fcllugartrab" type=text name="fcllugartrab" value="<?php echo $this->form_encode_input($fcllugartrab) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fcllugartrab_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fcllugartrab_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fclfacigual']))
   {
       $this->nm_new_label['fclfacigual'] = "FACTURAR CON MISMOS DATOS";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclfacigual = $this->fclfacigual;
   $sStyleHidden_fclfacigual = '';
   if (isset($this->nmgp_cmp_hidden['fclfacigual']) && $this->nmgp_cmp_hidden['fclfacigual'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclfacigual']);
       $sStyleHidden_fclfacigual = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclfacigual = 'display: none;';
   $sStyleReadInp_fclfacigual = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclfacigual']) && $this->nmgp_cmp_readonly['fclfacigual'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclfacigual']);
       $sStyleReadLab_fclfacigual = '';
       $sStyleReadInp_fclfacigual = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclfacigual']) && $this->nmgp_cmp_hidden['fclfacigual'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fclfacigual" value="<?php echo $this->form_encode_input($this->fclfacigual) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->fclfacigual_1 = explode(";", trim($this->fclfacigual));
  } 
  else
  {
      if (empty($this->fclfacigual))
      {
          $this->fclfacigual_1= array(); 
          $this->fclfacigual= "";
      } 
      else
      {
          $this->fclfacigual_1= $this->fclfacigual; 
          $this->fclfacigual= ""; 
          foreach ($this->fclfacigual_1 as $cada_fclfacigual)
          {
             if (!empty($fclfacigual))
             {
                 $this->fclfacigual.= ";"; 
             } 
             $this->fclfacigual.= $cada_fclfacigual; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_fclfacigual_line" id="hidden_field_data_fclfacigual" style="<?php echo $sStyleHidden_fclfacigual; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclfacigual_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclfacigual_label" style=""><span id="id_label_fclfacigual"><?php echo $this->nm_new_label['fclfacigual']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclfacigual"]) &&  $this->nmgp_cmp_readonly["fclfacigual"] == "on") { 

$fclfacigual_look = "";
 if ($this->fclfacigual == "1") { $fclfacigual_look .= "" ;} 
 if (empty($fclfacigual_look)) { $fclfacigual_look = $this->fclfacigual; }
?>
<input type="hidden" name="fclfacigual" value="<?php echo $this->form_encode_input($fclfacigual) . "\">" . $fclfacigual_look . ""; ?>
<?php } else { ?>

<?php

$fclfacigual_look = "";
 if ($this->fclfacigual == "1") { $fclfacigual_look .= "" ;} 
 if (empty($fclfacigual_look)) { $fclfacigual_look = $this->fclfacigual; }
?>
<span id="id_read_on_fclfacigual" class="css_fclfacigual_line" style="<?php echo $sStyleReadLab_fclfacigual; ?>"><?php echo $this->form_format_readonly("fclfacigual", $this->form_encode_input($fclfacigual_look)); ?></span><span id="id_read_off_fclfacigual" class="css_read_off_fclfacigual css_fclfacigual_line" style="<?php echo $sStyleReadInp_fclfacigual; ?>"><?php echo "<div id=\"idAjaxCheckbox_fclfacigual\" style=\"display: inline-block\" class=\"css_fclfacigual_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_fclfacigual_line"><?php $tempOptionId = "id-opt-fclfacigual" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-fclfacigual sc-ui-checkbox-fclfacigual" name="fclfacigual[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclfacigual'][] = '1'; ?>
<?php  if (in_array("1", $this->fclfacigual_1))  { echo " checked" ;} ?> onClick="do_ajax_form_ficha_cliente_mob_event_fclfacigual_onclick();" ><span></span>
<label for="<?php echo $tempOptionId ?>"></label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclfacigual_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclfacigual_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_fclfacigual_dumb = ('' == $sStyleHidden_fclfacigual) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fclfacigual_dumb" style="<?php echo $sStyleHidden_fclfacigual_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_3"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">DATOS FACTURACIÓN</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fclfacruc']))
    {
        $this->nm_new_label['fclfacruc'] = "CÉDULA / RUC";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclfacruc = $this->fclfacruc;
   $sStyleHidden_fclfacruc = '';
   if (isset($this->nmgp_cmp_hidden['fclfacruc']) && $this->nmgp_cmp_hidden['fclfacruc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclfacruc']);
       $sStyleHidden_fclfacruc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclfacruc = 'display: none;';
   $sStyleReadInp_fclfacruc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclfacruc']) && $this->nmgp_cmp_readonly['fclfacruc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclfacruc']);
       $sStyleReadLab_fclfacruc = '';
       $sStyleReadInp_fclfacruc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclfacruc']) && $this->nmgp_cmp_hidden['fclfacruc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fclfacruc" value="<?php echo $this->form_encode_input($fclfacruc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclfacruc_line" id="hidden_field_data_fclfacruc" style="<?php echo $sStyleHidden_fclfacruc; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclfacruc_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclfacruc_label" style=""><span id="id_label_fclfacruc"><?php echo $this->nm_new_label['fclfacruc']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclfacruc"]) &&  $this->nmgp_cmp_readonly["fclfacruc"] == "on") { 

 ?>
<input type="hidden" name="fclfacruc" value="<?php echo $this->form_encode_input($fclfacruc) . "\">" . $fclfacruc . ""; ?>
<?php } else { ?>
<span id="id_read_on_fclfacruc" class="sc-ui-readonly-fclfacruc css_fclfacruc_line" style="<?php echo $sStyleReadLab_fclfacruc; ?>"><?php echo $this->form_format_readonly("fclfacruc", $this->form_encode_input($this->fclfacruc)); ?></span><span id="id_read_off_fclfacruc" class="css_read_off_fclfacruc" style="white-space: nowrap;<?php echo $sStyleReadInp_fclfacruc; ?>">
 <input class="sc-js-input scFormObjectOdd css_fclfacruc_obj" style="" id="id_sc_field_fclfacruc" type=text name="fclfacruc" value="<?php echo $this->form_encode_input($fclfacruc) ?>"
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclfacruc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclfacruc_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fclfacnombre']))
    {
        $this->nm_new_label['fclfacnombre'] = "NOMBRE";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclfacnombre = $this->fclfacnombre;
   $sStyleHidden_fclfacnombre = '';
   if (isset($this->nmgp_cmp_hidden['fclfacnombre']) && $this->nmgp_cmp_hidden['fclfacnombre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclfacnombre']);
       $sStyleHidden_fclfacnombre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclfacnombre = 'display: none;';
   $sStyleReadInp_fclfacnombre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclfacnombre']) && $this->nmgp_cmp_readonly['fclfacnombre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclfacnombre']);
       $sStyleReadLab_fclfacnombre = '';
       $sStyleReadInp_fclfacnombre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclfacnombre']) && $this->nmgp_cmp_hidden['fclfacnombre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fclfacnombre" value="<?php echo $this->form_encode_input($fclfacnombre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclfacnombre_line" id="hidden_field_data_fclfacnombre" style="<?php echo $sStyleHidden_fclfacnombre; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclfacnombre_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclfacnombre_label" style=""><span id="id_label_fclfacnombre"><?php echo $this->nm_new_label['fclfacnombre']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclfacnombre"]) &&  $this->nmgp_cmp_readonly["fclfacnombre"] == "on") { 

 ?>
<input type="hidden" name="fclfacnombre" value="<?php echo $this->form_encode_input($fclfacnombre) . "\">" . $fclfacnombre . ""; ?>
<?php } else { ?>
<span id="id_read_on_fclfacnombre" class="sc-ui-readonly-fclfacnombre css_fclfacnombre_line" style="<?php echo $sStyleReadLab_fclfacnombre; ?>"><?php echo $this->form_format_readonly("fclfacnombre", $this->form_encode_input($this->fclfacnombre)); ?></span><span id="id_read_off_fclfacnombre" class="css_read_off_fclfacnombre" style="white-space: nowrap;<?php echo $sStyleReadInp_fclfacnombre; ?>">
 <input class="sc-js-input scFormObjectOdd css_fclfacnombre_obj" style="" id="id_sc_field_fclfacnombre" type=text name="fclfacnombre" value="<?php echo $this->form_encode_input($fclfacnombre) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclfacnombre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclfacnombre_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fclfacdir']))
    {
        $this->nm_new_label['fclfacdir'] = "DIRECCIÓN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclfacdir = $this->fclfacdir;
   $sStyleHidden_fclfacdir = '';
   if (isset($this->nmgp_cmp_hidden['fclfacdir']) && $this->nmgp_cmp_hidden['fclfacdir'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclfacdir']);
       $sStyleHidden_fclfacdir = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclfacdir = 'display: none;';
   $sStyleReadInp_fclfacdir = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclfacdir']) && $this->nmgp_cmp_readonly['fclfacdir'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclfacdir']);
       $sStyleReadLab_fclfacdir = '';
       $sStyleReadInp_fclfacdir = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclfacdir']) && $this->nmgp_cmp_hidden['fclfacdir'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fclfacdir" value="<?php echo $this->form_encode_input($fclfacdir) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclfacdir_line" id="hidden_field_data_fclfacdir" style="<?php echo $sStyleHidden_fclfacdir; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclfacdir_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclfacdir_label" style=""><span id="id_label_fclfacdir"><?php echo $this->nm_new_label['fclfacdir']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclfacdir"]) &&  $this->nmgp_cmp_readonly["fclfacdir"] == "on") { 

 ?>
<input type="hidden" name="fclfacdir" value="<?php echo $this->form_encode_input($fclfacdir) . "\">" . $fclfacdir . ""; ?>
<?php } else { ?>
<span id="id_read_on_fclfacdir" class="sc-ui-readonly-fclfacdir css_fclfacdir_line" style="<?php echo $sStyleReadLab_fclfacdir; ?>"><?php echo $this->form_format_readonly("fclfacdir", $this->form_encode_input($this->fclfacdir)); ?></span><span id="id_read_off_fclfacdir" class="css_read_off_fclfacdir" style="white-space: nowrap;<?php echo $sStyleReadInp_fclfacdir; ?>">
 <input class="sc-js-input scFormObjectOdd css_fclfacdir_obj" style="" id="id_sc_field_fclfacdir" type=text name="fclfacdir" value="<?php echo $this->form_encode_input($fclfacdir) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclfacdir_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclfacdir_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fclfactelf']))
    {
        $this->nm_new_label['fclfactelf'] = "TELÉFONO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclfactelf = $this->fclfactelf;
   $sStyleHidden_fclfactelf = '';
   if (isset($this->nmgp_cmp_hidden['fclfactelf']) && $this->nmgp_cmp_hidden['fclfactelf'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclfactelf']);
       $sStyleHidden_fclfactelf = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclfactelf = 'display: none;';
   $sStyleReadInp_fclfactelf = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclfactelf']) && $this->nmgp_cmp_readonly['fclfactelf'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclfactelf']);
       $sStyleReadLab_fclfactelf = '';
       $sStyleReadInp_fclfactelf = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclfactelf']) && $this->nmgp_cmp_hidden['fclfactelf'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fclfactelf" value="<?php echo $this->form_encode_input($fclfactelf) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclfactelf_line" id="hidden_field_data_fclfactelf" style="<?php echo $sStyleHidden_fclfactelf; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclfactelf_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclfactelf_label" style=""><span id="id_label_fclfactelf"><?php echo $this->nm_new_label['fclfactelf']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclfactelf"]) &&  $this->nmgp_cmp_readonly["fclfactelf"] == "on") { 

 ?>
<input type="hidden" name="fclfactelf" value="<?php echo $this->form_encode_input($fclfactelf) . "\">" . $fclfactelf . ""; ?>
<?php } else { ?>
<span id="id_read_on_fclfactelf" class="sc-ui-readonly-fclfactelf css_fclfactelf_line" style="<?php echo $sStyleReadLab_fclfactelf; ?>"><?php echo $this->form_format_readonly("fclfactelf", $this->form_encode_input($this->fclfactelf)); ?></span><span id="id_read_off_fclfactelf" class="css_read_off_fclfactelf" style="white-space: nowrap;<?php echo $sStyleReadInp_fclfactelf; ?>">
 <input class="sc-js-input scFormObjectOdd css_fclfactelf_obj" style="" id="id_sc_field_fclfactelf" type=text name="fclfactelf" value="<?php echo $this->form_encode_input($fclfactelf) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclfactelf_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclfactelf_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fclfacmail']))
    {
        $this->nm_new_label['fclfacmail'] = "CORREO ELECTRÓNICO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclfacmail = $this->fclfacmail;
   $sStyleHidden_fclfacmail = '';
   if (isset($this->nmgp_cmp_hidden['fclfacmail']) && $this->nmgp_cmp_hidden['fclfacmail'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclfacmail']);
       $sStyleHidden_fclfacmail = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclfacmail = 'display: none;';
   $sStyleReadInp_fclfacmail = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclfacmail']) && $this->nmgp_cmp_readonly['fclfacmail'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclfacmail']);
       $sStyleReadLab_fclfacmail = '';
       $sStyleReadInp_fclfacmail = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclfacmail']) && $this->nmgp_cmp_hidden['fclfacmail'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fclfacmail" value="<?php echo $this->form_encode_input($fclfacmail) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclfacmail_line" id="hidden_field_data_fclfacmail" style="<?php echo $sStyleHidden_fclfacmail; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclfacmail_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclfacmail_label" style=""><span id="id_label_fclfacmail"><?php echo $this->nm_new_label['fclfacmail']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclfacmail"]) &&  $this->nmgp_cmp_readonly["fclfacmail"] == "on") { 

 ?>
<input type="hidden" name="fclfacmail" value="<?php echo $this->form_encode_input($fclfacmail) . "\">" . $fclfacmail . ""; ?>
<?php } else { ?>
<span id="id_read_on_fclfacmail" class="sc-ui-readonly-fclfacmail css_fclfacmail_line" style="<?php echo $sStyleReadLab_fclfacmail; ?>"><?php echo $this->form_format_readonly("fclfacmail", $this->form_encode_input($this->fclfacmail)); ?></span><span id="id_read_off_fclfacmail" class="css_read_off_fclfacmail" style="white-space: nowrap;<?php echo $sStyleReadInp_fclfacmail; ?>">
 <input class="sc-js-input scFormObjectOdd css_fclfacmail_obj" style="" id="id_sc_field_fclfacmail" type=text name="fclfacmail" value="<?php echo $this->form_encode_input($fclfacmail) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclfacmail_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclfacmail_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_fclfacmail_dumb = ('' == $sStyleHidden_fclfacmail) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fclfacmail_dumb" style="<?php echo $sStyleHidden_fclfacmail_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_4"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_4" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">¿CÓMO LLEGÓ A NOSOTROS?</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fclreferpub']))
   {
       $this->nm_new_label['fclreferpub'] = "PUBLICIDAD";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclreferpub = $this->fclreferpub;
   $sStyleHidden_fclreferpub = '';
   if (isset($this->nmgp_cmp_hidden['fclreferpub']) && $this->nmgp_cmp_hidden['fclreferpub'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclreferpub']);
       $sStyleHidden_fclreferpub = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclreferpub = 'display: none;';
   $sStyleReadInp_fclreferpub = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclreferpub']) && $this->nmgp_cmp_readonly['fclreferpub'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclreferpub']);
       $sStyleReadLab_fclreferpub = '';
       $sStyleReadInp_fclreferpub = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclreferpub']) && $this->nmgp_cmp_hidden['fclreferpub'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fclreferpub" value="<?php echo $this->form_encode_input($this->fclreferpub) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->fclreferpub_1 = explode(";", trim($this->fclreferpub));
  } 
  else
  {
      if (empty($this->fclreferpub))
      {
          $this->fclreferpub_1= array(); 
          $this->fclreferpub= "";
      } 
      else
      {
          $this->fclreferpub_1= $this->fclreferpub; 
          $this->fclreferpub= ""; 
          foreach ($this->fclreferpub_1 as $cada_fclreferpub)
          {
             if (!empty($fclreferpub))
             {
                 $this->fclreferpub.= ";"; 
             } 
             $this->fclreferpub.= $cada_fclreferpub; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_fclreferpub_line" id="hidden_field_data_fclreferpub" style="<?php echo $sStyleHidden_fclreferpub; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclreferpub_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclreferpub_label" style=""><span id="id_label_fclreferpub"><?php echo $this->nm_new_label['fclreferpub']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclreferpub"]) &&  $this->nmgp_cmp_readonly["fclreferpub"] == "on") { 

$fclreferpub_look = "";
 if ($this->fclreferpub == "1") { $fclreferpub_look .= "" ;} 
 if (empty($fclreferpub_look)) { $fclreferpub_look = $this->fclreferpub; }
?>
<input type="hidden" name="fclreferpub" value="<?php echo $this->form_encode_input($fclreferpub) . "\">" . $fclreferpub_look . ""; ?>
<?php } else { ?>

<?php

$fclreferpub_look = "";
 if ($this->fclreferpub == "1") { $fclreferpub_look .= "" ;} 
 if (empty($fclreferpub_look)) { $fclreferpub_look = $this->fclreferpub; }
?>
<span id="id_read_on_fclreferpub" class="css_fclreferpub_line" style="<?php echo $sStyleReadLab_fclreferpub; ?>"><?php echo $this->form_format_readonly("fclreferpub", $this->form_encode_input($fclreferpub_look)); ?></span><span id="id_read_off_fclreferpub" class="css_read_off_fclreferpub css_fclreferpub_line" style="<?php echo $sStyleReadInp_fclreferpub; ?>"><?php echo "<div id=\"idAjaxCheckbox_fclreferpub\" style=\"display: inline-block\" class=\"css_fclreferpub_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_fclreferpub_line"><?php $tempOptionId = "id-opt-fclreferpub" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-fclreferpub sc-ui-checkbox-fclreferpub" name="fclreferpub[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclreferpub'][] = '1'; ?>
<?php  if (in_array("1", $this->fclreferpub_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclreferpub_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclreferpub_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fclreferface']))
   {
       $this->nm_new_label['fclreferface'] = "FACEBOOK";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclreferface = $this->fclreferface;
   $sStyleHidden_fclreferface = '';
   if (isset($this->nmgp_cmp_hidden['fclreferface']) && $this->nmgp_cmp_hidden['fclreferface'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclreferface']);
       $sStyleHidden_fclreferface = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclreferface = 'display: none;';
   $sStyleReadInp_fclreferface = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclreferface']) && $this->nmgp_cmp_readonly['fclreferface'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclreferface']);
       $sStyleReadLab_fclreferface = '';
       $sStyleReadInp_fclreferface = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclreferface']) && $this->nmgp_cmp_hidden['fclreferface'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fclreferface" value="<?php echo $this->form_encode_input($this->fclreferface) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->fclreferface_1 = explode(";", trim($this->fclreferface));
  } 
  else
  {
      if (empty($this->fclreferface))
      {
          $this->fclreferface_1= array(); 
          $this->fclreferface= "";
      } 
      else
      {
          $this->fclreferface_1= $this->fclreferface; 
          $this->fclreferface= ""; 
          foreach ($this->fclreferface_1 as $cada_fclreferface)
          {
             if (!empty($fclreferface))
             {
                 $this->fclreferface.= ";"; 
             } 
             $this->fclreferface.= $cada_fclreferface; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_fclreferface_line" id="hidden_field_data_fclreferface" style="<?php echo $sStyleHidden_fclreferface; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclreferface_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclreferface_label" style=""><span id="id_label_fclreferface"><?php echo $this->nm_new_label['fclreferface']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclreferface"]) &&  $this->nmgp_cmp_readonly["fclreferface"] == "on") { 

$fclreferface_look = "";
 if ($this->fclreferface == "1") { $fclreferface_look .= "" ;} 
 if (empty($fclreferface_look)) { $fclreferface_look = $this->fclreferface; }
?>
<input type="hidden" name="fclreferface" value="<?php echo $this->form_encode_input($fclreferface) . "\">" . $fclreferface_look . ""; ?>
<?php } else { ?>

<?php

$fclreferface_look = "";
 if ($this->fclreferface == "1") { $fclreferface_look .= "" ;} 
 if (empty($fclreferface_look)) { $fclreferface_look = $this->fclreferface; }
?>
<span id="id_read_on_fclreferface" class="css_fclreferface_line" style="<?php echo $sStyleReadLab_fclreferface; ?>"><?php echo $this->form_format_readonly("fclreferface", $this->form_encode_input($fclreferface_look)); ?></span><span id="id_read_off_fclreferface" class="css_read_off_fclreferface css_fclreferface_line" style="<?php echo $sStyleReadInp_fclreferface; ?>"><?php echo "<div id=\"idAjaxCheckbox_fclreferface\" style=\"display: inline-block\" class=\"css_fclreferface_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_fclreferface_line"><?php $tempOptionId = "id-opt-fclreferface" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-fclreferface sc-ui-checkbox-fclreferface" name="fclreferface[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclreferface'][] = '1'; ?>
<?php  if (in_array("1", $this->fclreferface_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclreferface_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclreferface_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fclreferweb']))
   {
       $this->nm_new_label['fclreferweb'] = "PÁGINA WEB";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclreferweb = $this->fclreferweb;
   $sStyleHidden_fclreferweb = '';
   if (isset($this->nmgp_cmp_hidden['fclreferweb']) && $this->nmgp_cmp_hidden['fclreferweb'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclreferweb']);
       $sStyleHidden_fclreferweb = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclreferweb = 'display: none;';
   $sStyleReadInp_fclreferweb = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclreferweb']) && $this->nmgp_cmp_readonly['fclreferweb'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclreferweb']);
       $sStyleReadLab_fclreferweb = '';
       $sStyleReadInp_fclreferweb = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclreferweb']) && $this->nmgp_cmp_hidden['fclreferweb'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fclreferweb" value="<?php echo $this->form_encode_input($this->fclreferweb) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->fclreferweb_1 = explode(";", trim($this->fclreferweb));
  } 
  else
  {
      if (empty($this->fclreferweb))
      {
          $this->fclreferweb_1= array(); 
          $this->fclreferweb= "";
      } 
      else
      {
          $this->fclreferweb_1= $this->fclreferweb; 
          $this->fclreferweb= ""; 
          foreach ($this->fclreferweb_1 as $cada_fclreferweb)
          {
             if (!empty($fclreferweb))
             {
                 $this->fclreferweb.= ";"; 
             } 
             $this->fclreferweb.= $cada_fclreferweb; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_fclreferweb_line" id="hidden_field_data_fclreferweb" style="<?php echo $sStyleHidden_fclreferweb; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclreferweb_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclreferweb_label" style=""><span id="id_label_fclreferweb"><?php echo $this->nm_new_label['fclreferweb']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclreferweb"]) &&  $this->nmgp_cmp_readonly["fclreferweb"] == "on") { 

$fclreferweb_look = "";
 if ($this->fclreferweb == "1") { $fclreferweb_look .= "" ;} 
 if (empty($fclreferweb_look)) { $fclreferweb_look = $this->fclreferweb; }
?>
<input type="hidden" name="fclreferweb" value="<?php echo $this->form_encode_input($fclreferweb) . "\">" . $fclreferweb_look . ""; ?>
<?php } else { ?>

<?php

$fclreferweb_look = "";
 if ($this->fclreferweb == "1") { $fclreferweb_look .= "" ;} 
 if (empty($fclreferweb_look)) { $fclreferweb_look = $this->fclreferweb; }
?>
<span id="id_read_on_fclreferweb" class="css_fclreferweb_line" style="<?php echo $sStyleReadLab_fclreferweb; ?>"><?php echo $this->form_format_readonly("fclreferweb", $this->form_encode_input($fclreferweb_look)); ?></span><span id="id_read_off_fclreferweb" class="css_read_off_fclreferweb css_fclreferweb_line" style="<?php echo $sStyleReadInp_fclreferweb; ?>"><?php echo "<div id=\"idAjaxCheckbox_fclreferweb\" style=\"display: inline-block\" class=\"css_fclreferweb_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_fclreferweb_line"><?php $tempOptionId = "id-opt-fclreferweb" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-fclreferweb sc-ui-checkbox-fclreferweb" name="fclreferweb[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclreferweb'][] = '1'; ?>
<?php  if (in_array("1", $this->fclreferweb_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclreferweb_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclreferweb_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fclreferremit']))
   {
       $this->nm_new_label['fclreferremit'] = "REMITIDO POR";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclreferremit = $this->fclreferremit;
   $sStyleHidden_fclreferremit = '';
   if (isset($this->nmgp_cmp_hidden['fclreferremit']) && $this->nmgp_cmp_hidden['fclreferremit'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclreferremit']);
       $sStyleHidden_fclreferremit = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclreferremit = 'display: none;';
   $sStyleReadInp_fclreferremit = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclreferremit']) && $this->nmgp_cmp_readonly['fclreferremit'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclreferremit']);
       $sStyleReadLab_fclreferremit = '';
       $sStyleReadInp_fclreferremit = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclreferremit']) && $this->nmgp_cmp_hidden['fclreferremit'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fclreferremit" value="<?php echo $this->form_encode_input($this->fclreferremit) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->fclreferremit_1 = explode(";", trim($this->fclreferremit));
  } 
  else
  {
      if (empty($this->fclreferremit))
      {
          $this->fclreferremit_1= array(); 
          $this->fclreferremit= "";
      } 
      else
      {
          $this->fclreferremit_1= $this->fclreferremit; 
          $this->fclreferremit= ""; 
          foreach ($this->fclreferremit_1 as $cada_fclreferremit)
          {
             if (!empty($fclreferremit))
             {
                 $this->fclreferremit.= ";"; 
             } 
             $this->fclreferremit.= $cada_fclreferremit; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_fclreferremit_line" id="hidden_field_data_fclreferremit" style="<?php echo $sStyleHidden_fclreferremit; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclreferremit_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclreferremit_label" style=""><span id="id_label_fclreferremit"><?php echo $this->nm_new_label['fclreferremit']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclreferremit"]) &&  $this->nmgp_cmp_readonly["fclreferremit"] == "on") { 

$fclreferremit_look = "";
 if ($this->fclreferremit == "1") { $fclreferremit_look .= "" ;} 
 if (empty($fclreferremit_look)) { $fclreferremit_look = $this->fclreferremit; }
?>
<input type="hidden" name="fclreferremit" value="<?php echo $this->form_encode_input($fclreferremit) . "\">" . $fclreferremit_look . ""; ?>
<?php } else { ?>

<?php

$fclreferremit_look = "";
 if ($this->fclreferremit == "1") { $fclreferremit_look .= "" ;} 
 if (empty($fclreferremit_look)) { $fclreferremit_look = $this->fclreferremit; }
?>
<span id="id_read_on_fclreferremit" class="css_fclreferremit_line" style="<?php echo $sStyleReadLab_fclreferremit; ?>"><?php echo $this->form_format_readonly("fclreferremit", $this->form_encode_input($fclreferremit_look)); ?></span><span id="id_read_off_fclreferremit" class="css_read_off_fclreferremit css_fclreferremit_line" style="<?php echo $sStyleReadInp_fclreferremit; ?>"><?php echo "<div id=\"idAjaxCheckbox_fclreferremit\" style=\"display: inline-block\" class=\"css_fclreferremit_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_fclreferremit_line"><?php $tempOptionId = "id-opt-fclreferremit" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-fclreferremit sc-ui-checkbox-fclreferremit" name="fclreferremit[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclreferremit'][] = '1'; ?>
<?php  if (in_array("1", $this->fclreferremit_1))  { echo " checked" ;} ?> onClick="do_ajax_form_ficha_cliente_mob_event_fclreferremit_onclick();" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclreferremit_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclreferremit_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fclreferremitnom']))
    {
        $this->nm_new_label['fclreferremitnom'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclreferremitnom = $this->fclreferremitnom;
   $sStyleHidden_fclreferremitnom = '';
   if (isset($this->nmgp_cmp_hidden['fclreferremitnom']) && $this->nmgp_cmp_hidden['fclreferremitnom'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclreferremitnom']);
       $sStyleHidden_fclreferremitnom = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclreferremitnom = 'display: none;';
   $sStyleReadInp_fclreferremitnom = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclreferremitnom']) && $this->nmgp_cmp_readonly['fclreferremitnom'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclreferremitnom']);
       $sStyleReadLab_fclreferremitnom = '';
       $sStyleReadInp_fclreferremitnom = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclreferremitnom']) && $this->nmgp_cmp_hidden['fclreferremitnom'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fclreferremitnom" value="<?php echo $this->form_encode_input($fclreferremitnom) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclreferremitnom_line" id="hidden_field_data_fclreferremitnom" style="<?php echo $sStyleHidden_fclreferremitnom; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclreferremitnom_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclreferremitnom_label" style=""><span id="id_label_fclreferremitnom"><?php echo $this->nm_new_label['fclreferremitnom']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclreferremitnom"]) &&  $this->nmgp_cmp_readonly["fclreferremitnom"] == "on") { 

 ?>
<input type="hidden" name="fclreferremitnom" value="<?php echo $this->form_encode_input($fclreferremitnom) . "\">" . $fclreferremitnom . ""; ?>
<?php } else { ?>
<span id="id_read_on_fclreferremitnom" class="sc-ui-readonly-fclreferremitnom css_fclreferremitnom_line" style="<?php echo $sStyleReadLab_fclreferremitnom; ?>"><?php echo $this->form_format_readonly("fclreferremitnom", $this->form_encode_input($this->fclreferremitnom)); ?></span><span id="id_read_off_fclreferremitnom" class="css_read_off_fclreferremitnom" style="white-space: nowrap;<?php echo $sStyleReadInp_fclreferremitnom; ?>">
 <input class="sc-js-input scFormObjectOdd css_fclreferremitnom_obj" style="" id="id_sc_field_fclreferremitnom" type=text name="fclreferremitnom" value="<?php echo $this->form_encode_input($fclreferremitnom) ?>"
 size=50 maxlength=80 alt="{datatype: 'text', maxLength: 80, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclreferremitnom_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclreferremitnom_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_fclreferremitnom_dumb = ('' == $sStyleHidden_fclreferremitnom) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fclreferremitnom_dumb" style="<?php echo $sStyleHidden_fclreferremitnom_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_5"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_5"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_5" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">MOTIVO DE LA CONSULTA</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fclmotivprimcons']))
    {
        $this->nm_new_label['fclmotivprimcons'] = "Fclmotivprimcons";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclmotivprimcons = $this->fclmotivprimcons;
   $sStyleHidden_fclmotivprimcons = '';
   if (isset($this->nmgp_cmp_hidden['fclmotivprimcons']) && $this->nmgp_cmp_hidden['fclmotivprimcons'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclmotivprimcons']);
       $sStyleHidden_fclmotivprimcons = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclmotivprimcons = 'display: none;';
   $sStyleReadInp_fclmotivprimcons = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclmotivprimcons']) && $this->nmgp_cmp_readonly['fclmotivprimcons'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclmotivprimcons']);
       $sStyleReadLab_fclmotivprimcons = '';
       $sStyleReadInp_fclmotivprimcons = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclmotivprimcons']) && $this->nmgp_cmp_hidden['fclmotivprimcons'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fclmotivprimcons" value="<?php echo $this->form_encode_input($fclmotivprimcons) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclmotivprimcons_line" id="hidden_field_data_fclmotivprimcons" style="<?php echo $sStyleHidden_fclmotivprimcons; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclmotivprimcons_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclmotivprimcons"]) &&  $this->nmgp_cmp_readonly["fclmotivprimcons"] == "on") { 

 ?>
<input type="hidden" name="fclmotivprimcons" value="<?php echo $this->form_encode_input($fclmotivprimcons) . "\">" . $fclmotivprimcons . ""; ?>
<?php } else { ?>
<span id="id_read_on_fclmotivprimcons" class="sc-ui-readonly-fclmotivprimcons css_fclmotivprimcons_line" style="<?php echo $sStyleReadLab_fclmotivprimcons; ?>"><?php echo $this->form_format_readonly("fclmotivprimcons", $this->form_encode_input($this->fclmotivprimcons)); ?></span><span id="id_read_off_fclmotivprimcons" class="css_read_off_fclmotivprimcons" style="white-space: nowrap;<?php echo $sStyleReadInp_fclmotivprimcons; ?>">
 <input class="sc-js-input scFormObjectOdd css_fclmotivprimcons_obj" style="" id="id_sc_field_fclmotivprimcons" type=text name="fclmotivprimcons" value="<?php echo $this->form_encode_input($fclmotivprimcons) ?>"
 size=100 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclmotivprimcons_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclmotivprimcons_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_fclmotivprimcons_dumb = ('' == $sStyleHidden_fclmotivprimcons) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fclmotivprimcons_dumb" style="<?php echo $sStyleHidden_fclmotivprimcons_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_6"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_6"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_6" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">ENFERMEDAD O PROBLEMA ACTUAL</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fclproblemactual']))
    {
        $this->nm_new_label['fclproblemactual'] = "Fclproblemactual";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclproblemactual = $this->fclproblemactual;
   $sStyleHidden_fclproblemactual = '';
   if (isset($this->nmgp_cmp_hidden['fclproblemactual']) && $this->nmgp_cmp_hidden['fclproblemactual'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclproblemactual']);
       $sStyleHidden_fclproblemactual = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclproblemactual = 'display: none;';
   $sStyleReadInp_fclproblemactual = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclproblemactual']) && $this->nmgp_cmp_readonly['fclproblemactual'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclproblemactual']);
       $sStyleReadLab_fclproblemactual = '';
       $sStyleReadInp_fclproblemactual = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclproblemactual']) && $this->nmgp_cmp_hidden['fclproblemactual'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fclproblemactual" value="<?php echo $this->form_encode_input($fclproblemactual) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclproblemactual_line" id="hidden_field_data_fclproblemactual" style="<?php echo $sStyleHidden_fclproblemactual; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclproblemactual_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclproblemactual"]) &&  $this->nmgp_cmp_readonly["fclproblemactual"] == "on") { 

 ?>
<input type="hidden" name="fclproblemactual" value="<?php echo $this->form_encode_input($fclproblemactual) . "\">" . $fclproblemactual . ""; ?>
<?php } else { ?>
<span id="id_read_on_fclproblemactual" class="sc-ui-readonly-fclproblemactual css_fclproblemactual_line" style="<?php echo $sStyleReadLab_fclproblemactual; ?>"><?php echo $this->form_format_readonly("fclproblemactual", $this->form_encode_input($this->fclproblemactual)); ?></span><span id="id_read_off_fclproblemactual" class="css_read_off_fclproblemactual" style="white-space: nowrap;<?php echo $sStyleReadInp_fclproblemactual; ?>">
 <input class="sc-js-input scFormObjectOdd css_fclproblemactual_obj" style="" id="id_sc_field_fclproblemactual" type=text name="fclproblemactual" value="<?php echo $this->form_encode_input($fclproblemactual) ?>"
 size=100 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclproblemactual_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclproblemactual_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_fclproblemactual_dumb = ('' == $sStyleHidden_fclproblemactual) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fclproblemactual_dumb" style="<?php echo $sStyleHidden_fclproblemactual_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_7"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_7"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_7" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">ANTECEDENTES PERSONALES Y FAMILIARES</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fclbajotratmed']))
   {
       $this->nm_new_label['fclbajotratmed'] = "¿Está bajo tratamiento médico?";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclbajotratmed = $this->fclbajotratmed;
   $sStyleHidden_fclbajotratmed = '';
   if (isset($this->nmgp_cmp_hidden['fclbajotratmed']) && $this->nmgp_cmp_hidden['fclbajotratmed'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclbajotratmed']);
       $sStyleHidden_fclbajotratmed = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclbajotratmed = 'display: none;';
   $sStyleReadInp_fclbajotratmed = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclbajotratmed']) && $this->nmgp_cmp_readonly['fclbajotratmed'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclbajotratmed']);
       $sStyleReadLab_fclbajotratmed = '';
       $sStyleReadInp_fclbajotratmed = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclbajotratmed']) && $this->nmgp_cmp_hidden['fclbajotratmed'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fclbajotratmed" value="<?php echo $this->form_encode_input($this->fclbajotratmed) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->fclbajotratmed_1 = explode(";", trim($this->fclbajotratmed));
  } 
  else
  {
      if (empty($this->fclbajotratmed))
      {
          $this->fclbajotratmed_1= array(); 
          $this->fclbajotratmed= "";
      } 
      else
      {
          $this->fclbajotratmed_1= $this->fclbajotratmed; 
          $this->fclbajotratmed= ""; 
          foreach ($this->fclbajotratmed_1 as $cada_fclbajotratmed)
          {
             if (!empty($fclbajotratmed))
             {
                 $this->fclbajotratmed.= ";"; 
             } 
             $this->fclbajotratmed.= $cada_fclbajotratmed; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_fclbajotratmed_line" id="hidden_field_data_fclbajotratmed" style="<?php echo $sStyleHidden_fclbajotratmed; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclbajotratmed_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclbajotratmed_label" style=""><span id="id_label_fclbajotratmed"><?php echo $this->nm_new_label['fclbajotratmed']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclbajotratmed"]) &&  $this->nmgp_cmp_readonly["fclbajotratmed"] == "on") { 

$fclbajotratmed_look = "";
 if ($this->fclbajotratmed == "1") { $fclbajotratmed_look .= "" ;} 
 if (empty($fclbajotratmed_look)) { $fclbajotratmed_look = $this->fclbajotratmed; }
?>
<input type="hidden" name="fclbajotratmed" value="<?php echo $this->form_encode_input($fclbajotratmed) . "\">" . $fclbajotratmed_look . ""; ?>
<?php } else { ?>

<?php

$fclbajotratmed_look = "";
 if ($this->fclbajotratmed == "1") { $fclbajotratmed_look .= "" ;} 
 if (empty($fclbajotratmed_look)) { $fclbajotratmed_look = $this->fclbajotratmed; }
?>
<span id="id_read_on_fclbajotratmed" class="css_fclbajotratmed_line" style="<?php echo $sStyleReadLab_fclbajotratmed; ?>"><?php echo $this->form_format_readonly("fclbajotratmed", $this->form_encode_input($fclbajotratmed_look)); ?></span><span id="id_read_off_fclbajotratmed" class="css_read_off_fclbajotratmed css_fclbajotratmed_line" style="<?php echo $sStyleReadInp_fclbajotratmed; ?>"><?php echo "<div id=\"idAjaxCheckbox_fclbajotratmed\" style=\"display: inline-block\" class=\"css_fclbajotratmed_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_fclbajotratmed_line"><?php $tempOptionId = "id-opt-fclbajotratmed" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-fclbajotratmed sc-ui-checkbox-fclbajotratmed" name="fclbajotratmed[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclbajotratmed'][] = '1'; ?>
<?php  if (in_array("1", $this->fclbajotratmed_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclbajotratmed_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclbajotratmed_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fclalerganest']))
   {
       $this->nm_new_label['fclalerganest'] = "¿Alergia a anestesia?";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclalerganest = $this->fclalerganest;
   $sStyleHidden_fclalerganest = '';
   if (isset($this->nmgp_cmp_hidden['fclalerganest']) && $this->nmgp_cmp_hidden['fclalerganest'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclalerganest']);
       $sStyleHidden_fclalerganest = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclalerganest = 'display: none;';
   $sStyleReadInp_fclalerganest = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclalerganest']) && $this->nmgp_cmp_readonly['fclalerganest'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclalerganest']);
       $sStyleReadLab_fclalerganest = '';
       $sStyleReadInp_fclalerganest = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclalerganest']) && $this->nmgp_cmp_hidden['fclalerganest'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fclalerganest" value="<?php echo $this->form_encode_input($this->fclalerganest) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->fclalerganest_1 = explode(";", trim($this->fclalerganest));
  } 
  else
  {
      if (empty($this->fclalerganest))
      {
          $this->fclalerganest_1= array(); 
          $this->fclalerganest= "";
      } 
      else
      {
          $this->fclalerganest_1= $this->fclalerganest; 
          $this->fclalerganest= ""; 
          foreach ($this->fclalerganest_1 as $cada_fclalerganest)
          {
             if (!empty($fclalerganest))
             {
                 $this->fclalerganest.= ";"; 
             } 
             $this->fclalerganest.= $cada_fclalerganest; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_fclalerganest_line" id="hidden_field_data_fclalerganest" style="<?php echo $sStyleHidden_fclalerganest; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclalerganest_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclalerganest_label" style=""><span id="id_label_fclalerganest"><?php echo $this->nm_new_label['fclalerganest']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclalerganest"]) &&  $this->nmgp_cmp_readonly["fclalerganest"] == "on") { 

$fclalerganest_look = "";
 if ($this->fclalerganest == "1") { $fclalerganest_look .= "" ;} 
 if (empty($fclalerganest_look)) { $fclalerganest_look = $this->fclalerganest; }
?>
<input type="hidden" name="fclalerganest" value="<?php echo $this->form_encode_input($fclalerganest) . "\">" . $fclalerganest_look . ""; ?>
<?php } else { ?>

<?php

$fclalerganest_look = "";
 if ($this->fclalerganest == "1") { $fclalerganest_look .= "" ;} 
 if (empty($fclalerganest_look)) { $fclalerganest_look = $this->fclalerganest; }
?>
<span id="id_read_on_fclalerganest" class="css_fclalerganest_line" style="<?php echo $sStyleReadLab_fclalerganest; ?>"><?php echo $this->form_format_readonly("fclalerganest", $this->form_encode_input($fclalerganest_look)); ?></span><span id="id_read_off_fclalerganest" class="css_read_off_fclalerganest css_fclalerganest_line" style="<?php echo $sStyleReadInp_fclalerganest; ?>"><?php echo "<div id=\"idAjaxCheckbox_fclalerganest\" style=\"display: inline-block\" class=\"css_fclalerganest_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_fclalerganest_line"><?php $tempOptionId = "id-opt-fclalerganest" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-fclalerganest sc-ui-checkbox-fclalerganest" name="fclalerganest[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclalerganest'][] = '1'; ?>
<?php  if (in_array("1", $this->fclalerganest_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclalerganest_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclalerganest_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fclprophemor']))
   {
       $this->nm_new_label['fclprophemor'] = "¿Propenso a hemorragias?";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclprophemor = $this->fclprophemor;
   $sStyleHidden_fclprophemor = '';
   if (isset($this->nmgp_cmp_hidden['fclprophemor']) && $this->nmgp_cmp_hidden['fclprophemor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclprophemor']);
       $sStyleHidden_fclprophemor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclprophemor = 'display: none;';
   $sStyleReadInp_fclprophemor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclprophemor']) && $this->nmgp_cmp_readonly['fclprophemor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclprophemor']);
       $sStyleReadLab_fclprophemor = '';
       $sStyleReadInp_fclprophemor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclprophemor']) && $this->nmgp_cmp_hidden['fclprophemor'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fclprophemor" value="<?php echo $this->form_encode_input($this->fclprophemor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->fclprophemor_1 = explode(";", trim($this->fclprophemor));
  } 
  else
  {
      if (empty($this->fclprophemor))
      {
          $this->fclprophemor_1= array(); 
          $this->fclprophemor= "";
      } 
      else
      {
          $this->fclprophemor_1= $this->fclprophemor; 
          $this->fclprophemor= ""; 
          foreach ($this->fclprophemor_1 as $cada_fclprophemor)
          {
             if (!empty($fclprophemor))
             {
                 $this->fclprophemor.= ";"; 
             } 
             $this->fclprophemor.= $cada_fclprophemor; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_fclprophemor_line" id="hidden_field_data_fclprophemor" style="<?php echo $sStyleHidden_fclprophemor; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclprophemor_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclprophemor_label" style=""><span id="id_label_fclprophemor"><?php echo $this->nm_new_label['fclprophemor']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclprophemor"]) &&  $this->nmgp_cmp_readonly["fclprophemor"] == "on") { 

$fclprophemor_look = "";
 if ($this->fclprophemor == "1") { $fclprophemor_look .= "" ;} 
 if (empty($fclprophemor_look)) { $fclprophemor_look = $this->fclprophemor; }
?>
<input type="hidden" name="fclprophemor" value="<?php echo $this->form_encode_input($fclprophemor) . "\">" . $fclprophemor_look . ""; ?>
<?php } else { ?>

<?php

$fclprophemor_look = "";
 if ($this->fclprophemor == "1") { $fclprophemor_look .= "" ;} 
 if (empty($fclprophemor_look)) { $fclprophemor_look = $this->fclprophemor; }
?>
<span id="id_read_on_fclprophemor" class="css_fclprophemor_line" style="<?php echo $sStyleReadLab_fclprophemor; ?>"><?php echo $this->form_format_readonly("fclprophemor", $this->form_encode_input($fclprophemor_look)); ?></span><span id="id_read_off_fclprophemor" class="css_read_off_fclprophemor css_fclprophemor_line" style="<?php echo $sStyleReadInp_fclprophemor; ?>"><?php echo "<div id=\"idAjaxCheckbox_fclprophemor\" style=\"display: inline-block\" class=\"css_fclprophemor_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_fclprophemor_line"><?php $tempOptionId = "id-opt-fclprophemor" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-fclprophemor sc-ui-checkbox-fclprophemor" name="fclprophemor[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclprophemor'][] = '1'; ?>
<?php  if (in_array("1", $this->fclprophemor_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclprophemor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclprophemor_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fclintervquir']))
   {
       $this->nm_new_label['fclintervquir'] = "¿Ha tenido intervenciones quirúrgicas?";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclintervquir = $this->fclintervquir;
   $sStyleHidden_fclintervquir = '';
   if (isset($this->nmgp_cmp_hidden['fclintervquir']) && $this->nmgp_cmp_hidden['fclintervquir'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclintervquir']);
       $sStyleHidden_fclintervquir = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclintervquir = 'display: none;';
   $sStyleReadInp_fclintervquir = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclintervquir']) && $this->nmgp_cmp_readonly['fclintervquir'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclintervquir']);
       $sStyleReadLab_fclintervquir = '';
       $sStyleReadInp_fclintervquir = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclintervquir']) && $this->nmgp_cmp_hidden['fclintervquir'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fclintervquir" value="<?php echo $this->form_encode_input($this->fclintervquir) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->fclintervquir_1 = explode(";", trim($this->fclintervquir));
  } 
  else
  {
      if (empty($this->fclintervquir))
      {
          $this->fclintervquir_1= array(); 
          $this->fclintervquir= "";
      } 
      else
      {
          $this->fclintervquir_1= $this->fclintervquir; 
          $this->fclintervquir= ""; 
          foreach ($this->fclintervquir_1 as $cada_fclintervquir)
          {
             if (!empty($fclintervquir))
             {
                 $this->fclintervquir.= ";"; 
             } 
             $this->fclintervquir.= $cada_fclintervquir; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_fclintervquir_line" id="hidden_field_data_fclintervquir" style="<?php echo $sStyleHidden_fclintervquir; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclintervquir_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclintervquir_label" style=""><span id="id_label_fclintervquir"><?php echo $this->nm_new_label['fclintervquir']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclintervquir"]) &&  $this->nmgp_cmp_readonly["fclintervquir"] == "on") { 

$fclintervquir_look = "";
 if ($this->fclintervquir == "1") { $fclintervquir_look .= "" ;} 
 if (empty($fclintervquir_look)) { $fclintervquir_look = $this->fclintervquir; }
?>
<input type="hidden" name="fclintervquir" value="<?php echo $this->form_encode_input($fclintervquir) . "\">" . $fclintervquir_look . ""; ?>
<?php } else { ?>

<?php

$fclintervquir_look = "";
 if ($this->fclintervquir == "1") { $fclintervquir_look .= "" ;} 
 if (empty($fclintervquir_look)) { $fclintervquir_look = $this->fclintervquir; }
?>
<span id="id_read_on_fclintervquir" class="css_fclintervquir_line" style="<?php echo $sStyleReadLab_fclintervquir; ?>"><?php echo $this->form_format_readonly("fclintervquir", $this->form_encode_input($fclintervquir_look)); ?></span><span id="id_read_off_fclintervquir" class="css_read_off_fclintervquir css_fclintervquir_line" style="<?php echo $sStyleReadInp_fclintervquir; ?>"><?php echo "<div id=\"idAjaxCheckbox_fclintervquir\" style=\"display: inline-block\" class=\"css_fclintervquir_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_fclintervquir_line"><?php $tempOptionId = "id-opt-fclintervquir" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-fclintervquir sc-ui-checkbox-fclintervquir" name="fclintervquir[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclintervquir'][] = '1'; ?>
<?php  if (in_array("1", $this->fclintervquir_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclintervquir_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclintervquir_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fclmediesp']))
   {
       $this->nm_new_label['fclmediesp'] = "¿Toma un medicamento especial?";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclmediesp = $this->fclmediesp;
   $sStyleHidden_fclmediesp = '';
   if (isset($this->nmgp_cmp_hidden['fclmediesp']) && $this->nmgp_cmp_hidden['fclmediesp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclmediesp']);
       $sStyleHidden_fclmediesp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclmediesp = 'display: none;';
   $sStyleReadInp_fclmediesp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclmediesp']) && $this->nmgp_cmp_readonly['fclmediesp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclmediesp']);
       $sStyleReadLab_fclmediesp = '';
       $sStyleReadInp_fclmediesp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclmediesp']) && $this->nmgp_cmp_hidden['fclmediesp'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fclmediesp" value="<?php echo $this->form_encode_input($this->fclmediesp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->fclmediesp_1 = explode(";", trim($this->fclmediesp));
  } 
  else
  {
      if (empty($this->fclmediesp))
      {
          $this->fclmediesp_1= array(); 
          $this->fclmediesp= "";
      } 
      else
      {
          $this->fclmediesp_1= $this->fclmediesp; 
          $this->fclmediesp= ""; 
          foreach ($this->fclmediesp_1 as $cada_fclmediesp)
          {
             if (!empty($fclmediesp))
             {
                 $this->fclmediesp.= ";"; 
             } 
             $this->fclmediesp.= $cada_fclmediesp; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_fclmediesp_line" id="hidden_field_data_fclmediesp" style="<?php echo $sStyleHidden_fclmediesp; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclmediesp_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclmediesp_label" style=""><span id="id_label_fclmediesp"><?php echo $this->nm_new_label['fclmediesp']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclmediesp"]) &&  $this->nmgp_cmp_readonly["fclmediesp"] == "on") { 

$fclmediesp_look = "";
 if ($this->fclmediesp == "1") { $fclmediesp_look .= "" ;} 
 if (empty($fclmediesp_look)) { $fclmediesp_look = $this->fclmediesp; }
?>
<input type="hidden" name="fclmediesp" value="<?php echo $this->form_encode_input($fclmediesp) . "\">" . $fclmediesp_look . ""; ?>
<?php } else { ?>

<?php

$fclmediesp_look = "";
 if ($this->fclmediesp == "1") { $fclmediesp_look .= "" ;} 
 if (empty($fclmediesp_look)) { $fclmediesp_look = $this->fclmediesp; }
?>
<span id="id_read_on_fclmediesp" class="css_fclmediesp_line" style="<?php echo $sStyleReadLab_fclmediesp; ?>"><?php echo $this->form_format_readonly("fclmediesp", $this->form_encode_input($fclmediesp_look)); ?></span><span id="id_read_off_fclmediesp" class="css_read_off_fclmediesp css_fclmediesp_line" style="<?php echo $sStyleReadInp_fclmediesp; ?>"><?php echo "<div id=\"idAjaxCheckbox_fclmediesp\" style=\"display: inline-block\" class=\"css_fclmediesp_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_fclmediesp_line"><?php $tempOptionId = "id-opt-fclmediesp" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-fclmediesp sc-ui-checkbox-fclmediesp" name="fclmediesp[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclmediesp'][] = '1'; ?>
<?php  if (in_array("1", $this->fclmediesp_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclmediesp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclmediesp_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fclhiperten']))
   {
       $this->nm_new_label['fclhiperten'] = "¿Hipertensión?";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclhiperten = $this->fclhiperten;
   $sStyleHidden_fclhiperten = '';
   if (isset($this->nmgp_cmp_hidden['fclhiperten']) && $this->nmgp_cmp_hidden['fclhiperten'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclhiperten']);
       $sStyleHidden_fclhiperten = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclhiperten = 'display: none;';
   $sStyleReadInp_fclhiperten = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclhiperten']) && $this->nmgp_cmp_readonly['fclhiperten'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclhiperten']);
       $sStyleReadLab_fclhiperten = '';
       $sStyleReadInp_fclhiperten = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclhiperten']) && $this->nmgp_cmp_hidden['fclhiperten'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fclhiperten" value="<?php echo $this->form_encode_input($this->fclhiperten) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->fclhiperten_1 = explode(";", trim($this->fclhiperten));
  } 
  else
  {
      if (empty($this->fclhiperten))
      {
          $this->fclhiperten_1= array(); 
          $this->fclhiperten= "";
      } 
      else
      {
          $this->fclhiperten_1= $this->fclhiperten; 
          $this->fclhiperten= ""; 
          foreach ($this->fclhiperten_1 as $cada_fclhiperten)
          {
             if (!empty($fclhiperten))
             {
                 $this->fclhiperten.= ";"; 
             } 
             $this->fclhiperten.= $cada_fclhiperten; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_fclhiperten_line" id="hidden_field_data_fclhiperten" style="<?php echo $sStyleHidden_fclhiperten; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclhiperten_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclhiperten_label" style=""><span id="id_label_fclhiperten"><?php echo $this->nm_new_label['fclhiperten']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclhiperten"]) &&  $this->nmgp_cmp_readonly["fclhiperten"] == "on") { 

$fclhiperten_look = "";
 if ($this->fclhiperten == "1") { $fclhiperten_look .= "" ;} 
 if (empty($fclhiperten_look)) { $fclhiperten_look = $this->fclhiperten; }
?>
<input type="hidden" name="fclhiperten" value="<?php echo $this->form_encode_input($fclhiperten) . "\">" . $fclhiperten_look . ""; ?>
<?php } else { ?>

<?php

$fclhiperten_look = "";
 if ($this->fclhiperten == "1") { $fclhiperten_look .= "" ;} 
 if (empty($fclhiperten_look)) { $fclhiperten_look = $this->fclhiperten; }
?>
<span id="id_read_on_fclhiperten" class="css_fclhiperten_line" style="<?php echo $sStyleReadLab_fclhiperten; ?>"><?php echo $this->form_format_readonly("fclhiperten", $this->form_encode_input($fclhiperten_look)); ?></span><span id="id_read_off_fclhiperten" class="css_read_off_fclhiperten css_fclhiperten_line" style="<?php echo $sStyleReadInp_fclhiperten; ?>"><?php echo "<div id=\"idAjaxCheckbox_fclhiperten\" style=\"display: inline-block\" class=\"css_fclhiperten_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_fclhiperten_line"><?php $tempOptionId = "id-opt-fclhiperten" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-fclhiperten sc-ui-checkbox-fclhiperten" name="fclhiperten[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclhiperten'][] = '1'; ?>
<?php  if (in_array("1", $this->fclhiperten_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclhiperten_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclhiperten_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fclhipotiro']))
   {
       $this->nm_new_label['fclhipotiro'] = "¿Hipotiroidismo?";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclhipotiro = $this->fclhipotiro;
   $sStyleHidden_fclhipotiro = '';
   if (isset($this->nmgp_cmp_hidden['fclhipotiro']) && $this->nmgp_cmp_hidden['fclhipotiro'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclhipotiro']);
       $sStyleHidden_fclhipotiro = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclhipotiro = 'display: none;';
   $sStyleReadInp_fclhipotiro = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclhipotiro']) && $this->nmgp_cmp_readonly['fclhipotiro'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclhipotiro']);
       $sStyleReadLab_fclhipotiro = '';
       $sStyleReadInp_fclhipotiro = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclhipotiro']) && $this->nmgp_cmp_hidden['fclhipotiro'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fclhipotiro" value="<?php echo $this->form_encode_input($this->fclhipotiro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->fclhipotiro_1 = explode(";", trim($this->fclhipotiro));
  } 
  else
  {
      if (empty($this->fclhipotiro))
      {
          $this->fclhipotiro_1= array(); 
          $this->fclhipotiro= "";
      } 
      else
      {
          $this->fclhipotiro_1= $this->fclhipotiro; 
          $this->fclhipotiro= ""; 
          foreach ($this->fclhipotiro_1 as $cada_fclhipotiro)
          {
             if (!empty($fclhipotiro))
             {
                 $this->fclhipotiro.= ";"; 
             } 
             $this->fclhipotiro.= $cada_fclhipotiro; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_fclhipotiro_line" id="hidden_field_data_fclhipotiro" style="<?php echo $sStyleHidden_fclhipotiro; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclhipotiro_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclhipotiro_label" style=""><span id="id_label_fclhipotiro"><?php echo $this->nm_new_label['fclhipotiro']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclhipotiro"]) &&  $this->nmgp_cmp_readonly["fclhipotiro"] == "on") { 

$fclhipotiro_look = "";
 if ($this->fclhipotiro == "1") { $fclhipotiro_look .= "" ;} 
 if (empty($fclhipotiro_look)) { $fclhipotiro_look = $this->fclhipotiro; }
?>
<input type="hidden" name="fclhipotiro" value="<?php echo $this->form_encode_input($fclhipotiro) . "\">" . $fclhipotiro_look . ""; ?>
<?php } else { ?>

<?php

$fclhipotiro_look = "";
 if ($this->fclhipotiro == "1") { $fclhipotiro_look .= "" ;} 
 if (empty($fclhipotiro_look)) { $fclhipotiro_look = $this->fclhipotiro; }
?>
<span id="id_read_on_fclhipotiro" class="css_fclhipotiro_line" style="<?php echo $sStyleReadLab_fclhipotiro; ?>"><?php echo $this->form_format_readonly("fclhipotiro", $this->form_encode_input($fclhipotiro_look)); ?></span><span id="id_read_off_fclhipotiro" class="css_read_off_fclhipotiro css_fclhipotiro_line" style="<?php echo $sStyleReadInp_fclhipotiro; ?>"><?php echo "<div id=\"idAjaxCheckbox_fclhipotiro\" style=\"display: inline-block\" class=\"css_fclhipotiro_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_fclhipotiro_line"><?php $tempOptionId = "id-opt-fclhipotiro" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-fclhipotiro sc-ui-checkbox-fclhipotiro" name="fclhipotiro[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclhipotiro'][] = '1'; ?>
<?php  if (in_array("1", $this->fclhipotiro_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclhipotiro_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclhipotiro_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fclaltercora']))
   {
       $this->nm_new_label['fclaltercora'] = "¿Alteraciones al corazón?";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclaltercora = $this->fclaltercora;
   $sStyleHidden_fclaltercora = '';
   if (isset($this->nmgp_cmp_hidden['fclaltercora']) && $this->nmgp_cmp_hidden['fclaltercora'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclaltercora']);
       $sStyleHidden_fclaltercora = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclaltercora = 'display: none;';
   $sStyleReadInp_fclaltercora = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclaltercora']) && $this->nmgp_cmp_readonly['fclaltercora'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclaltercora']);
       $sStyleReadLab_fclaltercora = '';
       $sStyleReadInp_fclaltercora = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclaltercora']) && $this->nmgp_cmp_hidden['fclaltercora'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fclaltercora" value="<?php echo $this->form_encode_input($this->fclaltercora) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->fclaltercora_1 = explode(";", trim($this->fclaltercora));
  } 
  else
  {
      if (empty($this->fclaltercora))
      {
          $this->fclaltercora_1= array(); 
          $this->fclaltercora= "";
      } 
      else
      {
          $this->fclaltercora_1= $this->fclaltercora; 
          $this->fclaltercora= ""; 
          foreach ($this->fclaltercora_1 as $cada_fclaltercora)
          {
             if (!empty($fclaltercora))
             {
                 $this->fclaltercora.= ";"; 
             } 
             $this->fclaltercora.= $cada_fclaltercora; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_fclaltercora_line" id="hidden_field_data_fclaltercora" style="<?php echo $sStyleHidden_fclaltercora; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclaltercora_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclaltercora_label" style=""><span id="id_label_fclaltercora"><?php echo $this->nm_new_label['fclaltercora']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclaltercora"]) &&  $this->nmgp_cmp_readonly["fclaltercora"] == "on") { 

$fclaltercora_look = "";
 if ($this->fclaltercora == "1") { $fclaltercora_look .= "" ;} 
 if (empty($fclaltercora_look)) { $fclaltercora_look = $this->fclaltercora; }
?>
<input type="hidden" name="fclaltercora" value="<?php echo $this->form_encode_input($fclaltercora) . "\">" . $fclaltercora_look . ""; ?>
<?php } else { ?>

<?php

$fclaltercora_look = "";
 if ($this->fclaltercora == "1") { $fclaltercora_look .= "" ;} 
 if (empty($fclaltercora_look)) { $fclaltercora_look = $this->fclaltercora; }
?>
<span id="id_read_on_fclaltercora" class="css_fclaltercora_line" style="<?php echo $sStyleReadLab_fclaltercora; ?>"><?php echo $this->form_format_readonly("fclaltercora", $this->form_encode_input($fclaltercora_look)); ?></span><span id="id_read_off_fclaltercora" class="css_read_off_fclaltercora css_fclaltercora_line" style="<?php echo $sStyleReadInp_fclaltercora; ?>"><?php echo "<div id=\"idAjaxCheckbox_fclaltercora\" style=\"display: inline-block\" class=\"css_fclaltercora_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_fclaltercora_line"><?php $tempOptionId = "id-opt-fclaltercora" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-fclaltercora sc-ui-checkbox-fclaltercora" name="fclaltercora[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclaltercora'][] = '1'; ?>
<?php  if (in_array("1", $this->fclaltercora_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclaltercora_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclaltercora_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fclgastrit']))
   {
       $this->nm_new_label['fclgastrit'] = "¿Gastritis?";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclgastrit = $this->fclgastrit;
   $sStyleHidden_fclgastrit = '';
   if (isset($this->nmgp_cmp_hidden['fclgastrit']) && $this->nmgp_cmp_hidden['fclgastrit'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclgastrit']);
       $sStyleHidden_fclgastrit = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclgastrit = 'display: none;';
   $sStyleReadInp_fclgastrit = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclgastrit']) && $this->nmgp_cmp_readonly['fclgastrit'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclgastrit']);
       $sStyleReadLab_fclgastrit = '';
       $sStyleReadInp_fclgastrit = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclgastrit']) && $this->nmgp_cmp_hidden['fclgastrit'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fclgastrit" value="<?php echo $this->form_encode_input($this->fclgastrit) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->fclgastrit_1 = explode(";", trim($this->fclgastrit));
  } 
  else
  {
      if (empty($this->fclgastrit))
      {
          $this->fclgastrit_1= array(); 
          $this->fclgastrit= "";
      } 
      else
      {
          $this->fclgastrit_1= $this->fclgastrit; 
          $this->fclgastrit= ""; 
          foreach ($this->fclgastrit_1 as $cada_fclgastrit)
          {
             if (!empty($fclgastrit))
             {
                 $this->fclgastrit.= ";"; 
             } 
             $this->fclgastrit.= $cada_fclgastrit; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_fclgastrit_line" id="hidden_field_data_fclgastrit" style="<?php echo $sStyleHidden_fclgastrit; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclgastrit_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclgastrit_label" style=""><span id="id_label_fclgastrit"><?php echo $this->nm_new_label['fclgastrit']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclgastrit"]) &&  $this->nmgp_cmp_readonly["fclgastrit"] == "on") { 

$fclgastrit_look = "";
 if ($this->fclgastrit == "1") { $fclgastrit_look .= "" ;} 
 if (empty($fclgastrit_look)) { $fclgastrit_look = $this->fclgastrit; }
?>
<input type="hidden" name="fclgastrit" value="<?php echo $this->form_encode_input($fclgastrit) . "\">" . $fclgastrit_look . ""; ?>
<?php } else { ?>

<?php

$fclgastrit_look = "";
 if ($this->fclgastrit == "1") { $fclgastrit_look .= "" ;} 
 if (empty($fclgastrit_look)) { $fclgastrit_look = $this->fclgastrit; }
?>
<span id="id_read_on_fclgastrit" class="css_fclgastrit_line" style="<?php echo $sStyleReadLab_fclgastrit; ?>"><?php echo $this->form_format_readonly("fclgastrit", $this->form_encode_input($fclgastrit_look)); ?></span><span id="id_read_off_fclgastrit" class="css_read_off_fclgastrit css_fclgastrit_line" style="<?php echo $sStyleReadInp_fclgastrit; ?>"><?php echo "<div id=\"idAjaxCheckbox_fclgastrit\" style=\"display: inline-block\" class=\"css_fclgastrit_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_fclgastrit_line"><?php $tempOptionId = "id-opt-fclgastrit" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-fclgastrit sc-ui-checkbox-fclgastrit" name="fclgastrit[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclgastrit'][] = '1'; ?>
<?php  if (in_array("1", $this->fclgastrit_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclgastrit_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclgastrit_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fclenfsangre']))
   {
       $this->nm_new_label['fclenfsangre'] = "¿Enfermedades sanguíneas?";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclenfsangre = $this->fclenfsangre;
   $sStyleHidden_fclenfsangre = '';
   if (isset($this->nmgp_cmp_hidden['fclenfsangre']) && $this->nmgp_cmp_hidden['fclenfsangre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclenfsangre']);
       $sStyleHidden_fclenfsangre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclenfsangre = 'display: none;';
   $sStyleReadInp_fclenfsangre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclenfsangre']) && $this->nmgp_cmp_readonly['fclenfsangre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclenfsangre']);
       $sStyleReadLab_fclenfsangre = '';
       $sStyleReadInp_fclenfsangre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclenfsangre']) && $this->nmgp_cmp_hidden['fclenfsangre'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fclenfsangre" value="<?php echo $this->form_encode_input($this->fclenfsangre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->fclenfsangre_1 = explode(";", trim($this->fclenfsangre));
  } 
  else
  {
      if (empty($this->fclenfsangre))
      {
          $this->fclenfsangre_1= array(); 
          $this->fclenfsangre= "";
      } 
      else
      {
          $this->fclenfsangre_1= $this->fclenfsangre; 
          $this->fclenfsangre= ""; 
          foreach ($this->fclenfsangre_1 as $cada_fclenfsangre)
          {
             if (!empty($fclenfsangre))
             {
                 $this->fclenfsangre.= ";"; 
             } 
             $this->fclenfsangre.= $cada_fclenfsangre; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_fclenfsangre_line" id="hidden_field_data_fclenfsangre" style="<?php echo $sStyleHidden_fclenfsangre; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclenfsangre_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclenfsangre_label" style=""><span id="id_label_fclenfsangre"><?php echo $this->nm_new_label['fclenfsangre']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclenfsangre"]) &&  $this->nmgp_cmp_readonly["fclenfsangre"] == "on") { 

$fclenfsangre_look = "";
 if ($this->fclenfsangre == "1") { $fclenfsangre_look .= "" ;} 
 if (empty($fclenfsangre_look)) { $fclenfsangre_look = $this->fclenfsangre; }
?>
<input type="hidden" name="fclenfsangre" value="<?php echo $this->form_encode_input($fclenfsangre) . "\">" . $fclenfsangre_look . ""; ?>
<?php } else { ?>

<?php

$fclenfsangre_look = "";
 if ($this->fclenfsangre == "1") { $fclenfsangre_look .= "" ;} 
 if (empty($fclenfsangre_look)) { $fclenfsangre_look = $this->fclenfsangre; }
?>
<span id="id_read_on_fclenfsangre" class="css_fclenfsangre_line" style="<?php echo $sStyleReadLab_fclenfsangre; ?>"><?php echo $this->form_format_readonly("fclenfsangre", $this->form_encode_input($fclenfsangre_look)); ?></span><span id="id_read_off_fclenfsangre" class="css_read_off_fclenfsangre css_fclenfsangre_line" style="<?php echo $sStyleReadInp_fclenfsangre; ?>"><?php echo "<div id=\"idAjaxCheckbox_fclenfsangre\" style=\"display: inline-block\" class=\"css_fclenfsangre_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_fclenfsangre_line"><?php $tempOptionId = "id-opt-fclenfsangre" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-fclenfsangre sc-ui-checkbox-fclenfsangre" name="fclenfsangre[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclenfsangre'][] = '1'; ?>
<?php  if (in_array("1", $this->fclenfsangre_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclenfsangre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclenfsangre_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fcldiabet']))
   {
       $this->nm_new_label['fcldiabet'] = "¿Diabetes?";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fcldiabet = $this->fcldiabet;
   $sStyleHidden_fcldiabet = '';
   if (isset($this->nmgp_cmp_hidden['fcldiabet']) && $this->nmgp_cmp_hidden['fcldiabet'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fcldiabet']);
       $sStyleHidden_fcldiabet = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fcldiabet = 'display: none;';
   $sStyleReadInp_fcldiabet = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fcldiabet']) && $this->nmgp_cmp_readonly['fcldiabet'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fcldiabet']);
       $sStyleReadLab_fcldiabet = '';
       $sStyleReadInp_fcldiabet = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fcldiabet']) && $this->nmgp_cmp_hidden['fcldiabet'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fcldiabet" value="<?php echo $this->form_encode_input($this->fcldiabet) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->fcldiabet_1 = explode(";", trim($this->fcldiabet));
  } 
  else
  {
      if (empty($this->fcldiabet))
      {
          $this->fcldiabet_1= array(); 
          $this->fcldiabet= "";
      } 
      else
      {
          $this->fcldiabet_1= $this->fcldiabet; 
          $this->fcldiabet= ""; 
          foreach ($this->fcldiabet_1 as $cada_fcldiabet)
          {
             if (!empty($fcldiabet))
             {
                 $this->fcldiabet.= ";"; 
             } 
             $this->fcldiabet.= $cada_fcldiabet; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_fcldiabet_line" id="hidden_field_data_fcldiabet" style="<?php echo $sStyleHidden_fcldiabet; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fcldiabet_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fcldiabet_label" style=""><span id="id_label_fcldiabet"><?php echo $this->nm_new_label['fcldiabet']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fcldiabet"]) &&  $this->nmgp_cmp_readonly["fcldiabet"] == "on") { 

$fcldiabet_look = "";
 if ($this->fcldiabet == "1") { $fcldiabet_look .= "" ;} 
 if (empty($fcldiabet_look)) { $fcldiabet_look = $this->fcldiabet; }
?>
<input type="hidden" name="fcldiabet" value="<?php echo $this->form_encode_input($fcldiabet) . "\">" . $fcldiabet_look . ""; ?>
<?php } else { ?>

<?php

$fcldiabet_look = "";
 if ($this->fcldiabet == "1") { $fcldiabet_look .= "" ;} 
 if (empty($fcldiabet_look)) { $fcldiabet_look = $this->fcldiabet; }
?>
<span id="id_read_on_fcldiabet" class="css_fcldiabet_line" style="<?php echo $sStyleReadLab_fcldiabet; ?>"><?php echo $this->form_format_readonly("fcldiabet", $this->form_encode_input($fcldiabet_look)); ?></span><span id="id_read_off_fcldiabet" class="css_read_off_fcldiabet css_fcldiabet_line" style="<?php echo $sStyleReadInp_fcldiabet; ?>"><?php echo "<div id=\"idAjaxCheckbox_fcldiabet\" style=\"display: inline-block\" class=\"css_fcldiabet_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_fcldiabet_line"><?php $tempOptionId = "id-opt-fcldiabet" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-fcldiabet sc-ui-checkbox-fcldiabet" name="fcldiabet[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fcldiabet'][] = '1'; ?>
<?php  if (in_array("1", $this->fcldiabet_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fcldiabet_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fcldiabet_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fclhepatit']))
   {
       $this->nm_new_label['fclhepatit'] = "¿Hepatitis?";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclhepatit = $this->fclhepatit;
   $sStyleHidden_fclhepatit = '';
   if (isset($this->nmgp_cmp_hidden['fclhepatit']) && $this->nmgp_cmp_hidden['fclhepatit'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclhepatit']);
       $sStyleHidden_fclhepatit = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclhepatit = 'display: none;';
   $sStyleReadInp_fclhepatit = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclhepatit']) && $this->nmgp_cmp_readonly['fclhepatit'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclhepatit']);
       $sStyleReadLab_fclhepatit = '';
       $sStyleReadInp_fclhepatit = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclhepatit']) && $this->nmgp_cmp_hidden['fclhepatit'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fclhepatit" value="<?php echo $this->form_encode_input($this->fclhepatit) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->fclhepatit_1 = explode(";", trim($this->fclhepatit));
  } 
  else
  {
      if (empty($this->fclhepatit))
      {
          $this->fclhepatit_1= array(); 
          $this->fclhepatit= "";
      } 
      else
      {
          $this->fclhepatit_1= $this->fclhepatit; 
          $this->fclhepatit= ""; 
          foreach ($this->fclhepatit_1 as $cada_fclhepatit)
          {
             if (!empty($fclhepatit))
             {
                 $this->fclhepatit.= ";"; 
             } 
             $this->fclhepatit.= $cada_fclhepatit; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_fclhepatit_line" id="hidden_field_data_fclhepatit" style="<?php echo $sStyleHidden_fclhepatit; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclhepatit_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclhepatit_label" style=""><span id="id_label_fclhepatit"><?php echo $this->nm_new_label['fclhepatit']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclhepatit"]) &&  $this->nmgp_cmp_readonly["fclhepatit"] == "on") { 

$fclhepatit_look = "";
 if ($this->fclhepatit == "1") { $fclhepatit_look .= "" ;} 
 if (empty($fclhepatit_look)) { $fclhepatit_look = $this->fclhepatit; }
?>
<input type="hidden" name="fclhepatit" value="<?php echo $this->form_encode_input($fclhepatit) . "\">" . $fclhepatit_look . ""; ?>
<?php } else { ?>

<?php

$fclhepatit_look = "";
 if ($this->fclhepatit == "1") { $fclhepatit_look .= "" ;} 
 if (empty($fclhepatit_look)) { $fclhepatit_look = $this->fclhepatit; }
?>
<span id="id_read_on_fclhepatit" class="css_fclhepatit_line" style="<?php echo $sStyleReadLab_fclhepatit; ?>"><?php echo $this->form_format_readonly("fclhepatit", $this->form_encode_input($fclhepatit_look)); ?></span><span id="id_read_off_fclhepatit" class="css_read_off_fclhepatit css_fclhepatit_line" style="<?php echo $sStyleReadInp_fclhepatit; ?>"><?php echo "<div id=\"idAjaxCheckbox_fclhepatit\" style=\"display: inline-block\" class=\"css_fclhepatit_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_fclhepatit_line"><?php $tempOptionId = "id-opt-fclhepatit" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-fclhepatit sc-ui-checkbox-fclhepatit" name="fclhepatit[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclhepatit'][] = '1'; ?>
<?php  if (in_array("1", $this->fclhepatit_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclhepatit_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclhepatit_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fclcancer']))
   {
       $this->nm_new_label['fclcancer'] = "¿Cáncer?";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclcancer = $this->fclcancer;
   $sStyleHidden_fclcancer = '';
   if (isset($this->nmgp_cmp_hidden['fclcancer']) && $this->nmgp_cmp_hidden['fclcancer'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclcancer']);
       $sStyleHidden_fclcancer = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclcancer = 'display: none;';
   $sStyleReadInp_fclcancer = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclcancer']) && $this->nmgp_cmp_readonly['fclcancer'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclcancer']);
       $sStyleReadLab_fclcancer = '';
       $sStyleReadInp_fclcancer = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclcancer']) && $this->nmgp_cmp_hidden['fclcancer'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fclcancer" value="<?php echo $this->form_encode_input($this->fclcancer) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->fclcancer_1 = explode(";", trim($this->fclcancer));
  } 
  else
  {
      if (empty($this->fclcancer))
      {
          $this->fclcancer_1= array(); 
          $this->fclcancer= "";
      } 
      else
      {
          $this->fclcancer_1= $this->fclcancer; 
          $this->fclcancer= ""; 
          foreach ($this->fclcancer_1 as $cada_fclcancer)
          {
             if (!empty($fclcancer))
             {
                 $this->fclcancer.= ";"; 
             } 
             $this->fclcancer.= $cada_fclcancer; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_fclcancer_line" id="hidden_field_data_fclcancer" style="<?php echo $sStyleHidden_fclcancer; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclcancer_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclcancer_label" style=""><span id="id_label_fclcancer"><?php echo $this->nm_new_label['fclcancer']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclcancer"]) &&  $this->nmgp_cmp_readonly["fclcancer"] == "on") { 

$fclcancer_look = "";
 if ($this->fclcancer == "1") { $fclcancer_look .= "" ;} 
 if (empty($fclcancer_look)) { $fclcancer_look = $this->fclcancer; }
?>
<input type="hidden" name="fclcancer" value="<?php echo $this->form_encode_input($fclcancer) . "\">" . $fclcancer_look . ""; ?>
<?php } else { ?>

<?php

$fclcancer_look = "";
 if ($this->fclcancer == "1") { $fclcancer_look .= "" ;} 
 if (empty($fclcancer_look)) { $fclcancer_look = $this->fclcancer; }
?>
<span id="id_read_on_fclcancer" class="css_fclcancer_line" style="<?php echo $sStyleReadLab_fclcancer; ?>"><?php echo $this->form_format_readonly("fclcancer", $this->form_encode_input($fclcancer_look)); ?></span><span id="id_read_off_fclcancer" class="css_read_off_fclcancer css_fclcancer_line" style="<?php echo $sStyleReadInp_fclcancer; ?>"><?php echo "<div id=\"idAjaxCheckbox_fclcancer\" style=\"display: inline-block\" class=\"css_fclcancer_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_fclcancer_line"><?php $tempOptionId = "id-opt-fclcancer" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-fclcancer sc-ui-checkbox-fclcancer" name="fclcancer[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclcancer'][] = '1'; ?>
<?php  if (in_array("1", $this->fclcancer_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclcancer_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclcancer_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fclvih']))
   {
       $this->nm_new_label['fclvih'] = "¿VIH?";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclvih = $this->fclvih;
   $sStyleHidden_fclvih = '';
   if (isset($this->nmgp_cmp_hidden['fclvih']) && $this->nmgp_cmp_hidden['fclvih'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclvih']);
       $sStyleHidden_fclvih = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclvih = 'display: none;';
   $sStyleReadInp_fclvih = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclvih']) && $this->nmgp_cmp_readonly['fclvih'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclvih']);
       $sStyleReadLab_fclvih = '';
       $sStyleReadInp_fclvih = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclvih']) && $this->nmgp_cmp_hidden['fclvih'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fclvih" value="<?php echo $this->form_encode_input($this->fclvih) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->fclvih_1 = explode(";", trim($this->fclvih));
  } 
  else
  {
      if (empty($this->fclvih))
      {
          $this->fclvih_1= array(); 
          $this->fclvih= "";
      } 
      else
      {
          $this->fclvih_1= $this->fclvih; 
          $this->fclvih= ""; 
          foreach ($this->fclvih_1 as $cada_fclvih)
          {
             if (!empty($fclvih))
             {
                 $this->fclvih.= ";"; 
             } 
             $this->fclvih.= $cada_fclvih; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_fclvih_line" id="hidden_field_data_fclvih" style="<?php echo $sStyleHidden_fclvih; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclvih_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclvih_label" style=""><span id="id_label_fclvih"><?php echo $this->nm_new_label['fclvih']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclvih"]) &&  $this->nmgp_cmp_readonly["fclvih"] == "on") { 

$fclvih_look = "";
 if ($this->fclvih == "1") { $fclvih_look .= "" ;} 
 if (empty($fclvih_look)) { $fclvih_look = $this->fclvih; }
?>
<input type="hidden" name="fclvih" value="<?php echo $this->form_encode_input($fclvih) . "\">" . $fclvih_look . ""; ?>
<?php } else { ?>

<?php

$fclvih_look = "";
 if ($this->fclvih == "1") { $fclvih_look .= "" ;} 
 if (empty($fclvih_look)) { $fclvih_look = $this->fclvih; }
?>
<span id="id_read_on_fclvih" class="css_fclvih_line" style="<?php echo $sStyleReadLab_fclvih; ?>"><?php echo $this->form_format_readonly("fclvih", $this->form_encode_input($fclvih_look)); ?></span><span id="id_read_off_fclvih" class="css_read_off_fclvih css_fclvih_line" style="<?php echo $sStyleReadInp_fclvih; ?>"><?php echo "<div id=\"idAjaxCheckbox_fclvih\" style=\"display: inline-block\" class=\"css_fclvih_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_fclvih_line"><?php $tempOptionId = "id-opt-fclvih" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-fclvih sc-ui-checkbox-fclvih" name="fclvih[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclvih'][] = '1'; ?>
<?php  if (in_array("1", $this->fclvih_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclvih_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclvih_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fclartrit']))
   {
       $this->nm_new_label['fclartrit'] = "¿Artritis?";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclartrit = $this->fclartrit;
   $sStyleHidden_fclartrit = '';
   if (isset($this->nmgp_cmp_hidden['fclartrit']) && $this->nmgp_cmp_hidden['fclartrit'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclartrit']);
       $sStyleHidden_fclartrit = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclartrit = 'display: none;';
   $sStyleReadInp_fclartrit = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclartrit']) && $this->nmgp_cmp_readonly['fclartrit'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclartrit']);
       $sStyleReadLab_fclartrit = '';
       $sStyleReadInp_fclartrit = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclartrit']) && $this->nmgp_cmp_hidden['fclartrit'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fclartrit" value="<?php echo $this->form_encode_input($this->fclartrit) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->fclartrit_1 = explode(";", trim($this->fclartrit));
  } 
  else
  {
      if (empty($this->fclartrit))
      {
          $this->fclartrit_1= array(); 
          $this->fclartrit= "";
      } 
      else
      {
          $this->fclartrit_1= $this->fclartrit; 
          $this->fclartrit= ""; 
          foreach ($this->fclartrit_1 as $cada_fclartrit)
          {
             if (!empty($fclartrit))
             {
                 $this->fclartrit.= ";"; 
             } 
             $this->fclartrit.= $cada_fclartrit; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_fclartrit_line" id="hidden_field_data_fclartrit" style="<?php echo $sStyleHidden_fclartrit; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclartrit_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclartrit_label" style=""><span id="id_label_fclartrit"><?php echo $this->nm_new_label['fclartrit']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclartrit"]) &&  $this->nmgp_cmp_readonly["fclartrit"] == "on") { 

$fclartrit_look = "";
 if ($this->fclartrit == "1") { $fclartrit_look .= "" ;} 
 if (empty($fclartrit_look)) { $fclartrit_look = $this->fclartrit; }
?>
<input type="hidden" name="fclartrit" value="<?php echo $this->form_encode_input($fclartrit) . "\">" . $fclartrit_look . ""; ?>
<?php } else { ?>

<?php

$fclartrit_look = "";
 if ($this->fclartrit == "1") { $fclartrit_look .= "" ;} 
 if (empty($fclartrit_look)) { $fclartrit_look = $this->fclartrit; }
?>
<span id="id_read_on_fclartrit" class="css_fclartrit_line" style="<?php echo $sStyleReadLab_fclartrit; ?>"><?php echo $this->form_format_readonly("fclartrit", $this->form_encode_input($fclartrit_look)); ?></span><span id="id_read_off_fclartrit" class="css_read_off_fclartrit css_fclartrit_line" style="<?php echo $sStyleReadInp_fclartrit; ?>"><?php echo "<div id=\"idAjaxCheckbox_fclartrit\" style=\"display: inline-block\" class=\"css_fclartrit_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_fclartrit_line"><?php $tempOptionId = "id-opt-fclartrit" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-fclartrit sc-ui-checkbox-fclartrit" name="fclartrit[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclartrit'][] = '1'; ?>
<?php  if (in_array("1", $this->fclartrit_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclartrit_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclartrit_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fclinsufren']))
   {
       $this->nm_new_label['fclinsufren'] = "¿Insuficiencia renal?";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclinsufren = $this->fclinsufren;
   $sStyleHidden_fclinsufren = '';
   if (isset($this->nmgp_cmp_hidden['fclinsufren']) && $this->nmgp_cmp_hidden['fclinsufren'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclinsufren']);
       $sStyleHidden_fclinsufren = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclinsufren = 'display: none;';
   $sStyleReadInp_fclinsufren = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclinsufren']) && $this->nmgp_cmp_readonly['fclinsufren'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclinsufren']);
       $sStyleReadLab_fclinsufren = '';
       $sStyleReadInp_fclinsufren = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclinsufren']) && $this->nmgp_cmp_hidden['fclinsufren'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fclinsufren" value="<?php echo $this->form_encode_input($this->fclinsufren) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->fclinsufren_1 = explode(";", trim($this->fclinsufren));
  } 
  else
  {
      if (empty($this->fclinsufren))
      {
          $this->fclinsufren_1= array(); 
          $this->fclinsufren= "";
      } 
      else
      {
          $this->fclinsufren_1= $this->fclinsufren; 
          $this->fclinsufren= ""; 
          foreach ($this->fclinsufren_1 as $cada_fclinsufren)
          {
             if (!empty($fclinsufren))
             {
                 $this->fclinsufren.= ";"; 
             } 
             $this->fclinsufren.= $cada_fclinsufren; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_fclinsufren_line" id="hidden_field_data_fclinsufren" style="<?php echo $sStyleHidden_fclinsufren; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclinsufren_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclinsufren_label" style=""><span id="id_label_fclinsufren"><?php echo $this->nm_new_label['fclinsufren']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclinsufren"]) &&  $this->nmgp_cmp_readonly["fclinsufren"] == "on") { 

$fclinsufren_look = "";
 if ($this->fclinsufren == "1") { $fclinsufren_look .= "" ;} 
 if (empty($fclinsufren_look)) { $fclinsufren_look = $this->fclinsufren; }
?>
<input type="hidden" name="fclinsufren" value="<?php echo $this->form_encode_input($fclinsufren) . "\">" . $fclinsufren_look . ""; ?>
<?php } else { ?>

<?php

$fclinsufren_look = "";
 if ($this->fclinsufren == "1") { $fclinsufren_look .= "" ;} 
 if (empty($fclinsufren_look)) { $fclinsufren_look = $this->fclinsufren; }
?>
<span id="id_read_on_fclinsufren" class="css_fclinsufren_line" style="<?php echo $sStyleReadLab_fclinsufren; ?>"><?php echo $this->form_format_readonly("fclinsufren", $this->form_encode_input($fclinsufren_look)); ?></span><span id="id_read_off_fclinsufren" class="css_read_off_fclinsufren css_fclinsufren_line" style="<?php echo $sStyleReadInp_fclinsufren; ?>"><?php echo "<div id=\"idAjaxCheckbox_fclinsufren\" style=\"display: inline-block\" class=\"css_fclinsufren_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_fclinsufren_line"><?php $tempOptionId = "id-opt-fclinsufren" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-fclinsufren sc-ui-checkbox-fclinsufren" name="fclinsufren[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclinsufren'][] = '1'; ?>
<?php  if (in_array("1", $this->fclinsufren_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclinsufren_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclinsufren_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fclotrasenf']))
   {
       $this->nm_new_label['fclotrasenf'] = "¿Otros?";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclotrasenf = $this->fclotrasenf;
   $sStyleHidden_fclotrasenf = '';
   if (isset($this->nmgp_cmp_hidden['fclotrasenf']) && $this->nmgp_cmp_hidden['fclotrasenf'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclotrasenf']);
       $sStyleHidden_fclotrasenf = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclotrasenf = 'display: none;';
   $sStyleReadInp_fclotrasenf = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclotrasenf']) && $this->nmgp_cmp_readonly['fclotrasenf'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclotrasenf']);
       $sStyleReadLab_fclotrasenf = '';
       $sStyleReadInp_fclotrasenf = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclotrasenf']) && $this->nmgp_cmp_hidden['fclotrasenf'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fclotrasenf" value="<?php echo $this->form_encode_input($this->fclotrasenf) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->fclotrasenf_1 = explode(";", trim($this->fclotrasenf));
  } 
  else
  {
      if (empty($this->fclotrasenf))
      {
          $this->fclotrasenf_1= array(); 
          $this->fclotrasenf= "";
      } 
      else
      {
          $this->fclotrasenf_1= $this->fclotrasenf; 
          $this->fclotrasenf= ""; 
          foreach ($this->fclotrasenf_1 as $cada_fclotrasenf)
          {
             if (!empty($fclotrasenf))
             {
                 $this->fclotrasenf.= ";"; 
             } 
             $this->fclotrasenf.= $cada_fclotrasenf; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_fclotrasenf_line" id="hidden_field_data_fclotrasenf" style="<?php echo $sStyleHidden_fclotrasenf; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclotrasenf_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclotrasenf_label" style=""><span id="id_label_fclotrasenf"><?php echo $this->nm_new_label['fclotrasenf']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclotrasenf"]) &&  $this->nmgp_cmp_readonly["fclotrasenf"] == "on") { 

$fclotrasenf_look = "";
 if ($this->fclotrasenf == "1") { $fclotrasenf_look .= "" ;} 
 if (empty($fclotrasenf_look)) { $fclotrasenf_look = $this->fclotrasenf; }
?>
<input type="hidden" name="fclotrasenf" value="<?php echo $this->form_encode_input($fclotrasenf) . "\">" . $fclotrasenf_look . ""; ?>
<?php } else { ?>

<?php

$fclotrasenf_look = "";
 if ($this->fclotrasenf == "1") { $fclotrasenf_look .= "" ;} 
 if (empty($fclotrasenf_look)) { $fclotrasenf_look = $this->fclotrasenf; }
?>
<span id="id_read_on_fclotrasenf" class="css_fclotrasenf_line" style="<?php echo $sStyleReadLab_fclotrasenf; ?>"><?php echo $this->form_format_readonly("fclotrasenf", $this->form_encode_input($fclotrasenf_look)); ?></span><span id="id_read_off_fclotrasenf" class="css_read_off_fclotrasenf css_fclotrasenf_line" style="<?php echo $sStyleReadInp_fclotrasenf; ?>"><?php echo "<div id=\"idAjaxCheckbox_fclotrasenf\" style=\"display: inline-block\" class=\"css_fclotrasenf_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_fclotrasenf_line"><?php $tempOptionId = "id-opt-fclotrasenf" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-fclotrasenf sc-ui-checkbox-fclotrasenf" name="fclotrasenf[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lookup_fclotrasenf'][] = '1'; ?>
<?php  if (in_array("1", $this->fclotrasenf_1))  { echo " checked" ;} ?> onClick="do_ajax_form_ficha_cliente_mob_event_fclotrasenf_onclick();" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclotrasenf_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclotrasenf_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_fclotrasenf_dumb = ('' == $sStyleHidden_fclotrasenf) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fclotrasenf_dumb" style="<?php echo $sStyleHidden_fclotrasenf_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_8"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_8"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_8" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fclotrasenfdesc']))
    {
        $this->nm_new_label['fclotrasenfdesc'] = "Explique cuáles son";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclotrasenfdesc = $this->fclotrasenfdesc;
   $sStyleHidden_fclotrasenfdesc = '';
   if (isset($this->nmgp_cmp_hidden['fclotrasenfdesc']) && $this->nmgp_cmp_hidden['fclotrasenfdesc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclotrasenfdesc']);
       $sStyleHidden_fclotrasenfdesc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclotrasenfdesc = 'display: none;';
   $sStyleReadInp_fclotrasenfdesc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclotrasenfdesc']) && $this->nmgp_cmp_readonly['fclotrasenfdesc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclotrasenfdesc']);
       $sStyleReadLab_fclotrasenfdesc = '';
       $sStyleReadInp_fclotrasenfdesc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclotrasenfdesc']) && $this->nmgp_cmp_hidden['fclotrasenfdesc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fclotrasenfdesc" value="<?php echo $this->form_encode_input($fclotrasenfdesc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclotrasenfdesc_line" id="hidden_field_data_fclotrasenfdesc" style="<?php echo $sStyleHidden_fclotrasenfdesc; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclotrasenfdesc_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclotrasenfdesc_label" style=""><span id="id_label_fclotrasenfdesc"><?php echo $this->nm_new_label['fclotrasenfdesc']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclotrasenfdesc"]) &&  $this->nmgp_cmp_readonly["fclotrasenfdesc"] == "on") { 

 ?>
<input type="hidden" name="fclotrasenfdesc" value="<?php echo $this->form_encode_input($fclotrasenfdesc) . "\">" . $fclotrasenfdesc . ""; ?>
<?php } else { ?>
<span id="id_read_on_fclotrasenfdesc" class="sc-ui-readonly-fclotrasenfdesc css_fclotrasenfdesc_line" style="<?php echo $sStyleReadLab_fclotrasenfdesc; ?>"><?php echo $this->form_format_readonly("fclotrasenfdesc", $this->form_encode_input($this->fclotrasenfdesc)); ?></span><span id="id_read_off_fclotrasenfdesc" class="css_read_off_fclotrasenfdesc" style="white-space: nowrap;<?php echo $sStyleReadInp_fclotrasenfdesc; ?>">
 <input class="sc-js-input scFormObjectOdd css_fclotrasenfdesc_obj" style="" id="id_sc_field_fclotrasenfdesc" type=text name="fclotrasenfdesc" value="<?php echo $this->form_encode_input($fclotrasenfdesc) ?>"
 size=100 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclotrasenfdesc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclotrasenfdesc_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_fclotrasenfdesc_dumb = ('' == $sStyleHidden_fclotrasenfdesc) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fclotrasenfdesc_dumb" style="<?php echo $sStyleHidden_fclotrasenfdesc_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_9"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_9"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_9" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">OBSERVACIONES</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['fclusucrea']))
           {
               $this->nmgp_cmp_readonly['fclusucrea'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['fclobserv']))
    {
        $this->nm_new_label['fclobserv'] = "Fclobserv";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclobserv = $this->fclobserv;
   $sStyleHidden_fclobserv = '';
   if (isset($this->nmgp_cmp_hidden['fclobserv']) && $this->nmgp_cmp_hidden['fclobserv'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclobserv']);
       $sStyleHidden_fclobserv = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclobserv = 'display: none;';
   $sStyleReadInp_fclobserv = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclobserv']) && $this->nmgp_cmp_readonly['fclobserv'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclobserv']);
       $sStyleReadLab_fclobserv = '';
       $sStyleReadInp_fclobserv = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclobserv']) && $this->nmgp_cmp_hidden['fclobserv'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fclobserv" value="<?php echo $this->form_encode_input($fclobserv) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclobserv_line" id="hidden_field_data_fclobserv" style="<?php echo $sStyleHidden_fclobserv; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclobserv_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fclobserv"]) &&  $this->nmgp_cmp_readonly["fclobserv"] == "on") { 

 ?>
<input type="hidden" name="fclobserv" value="<?php echo $this->form_encode_input($fclobserv) . "\">" . $fclobserv . ""; ?>
<?php } else { ?>
<span id="id_read_on_fclobserv" class="sc-ui-readonly-fclobserv css_fclobserv_line" style="<?php echo $sStyleReadLab_fclobserv; ?>"><?php echo $this->form_format_readonly("fclobserv", $this->form_encode_input($this->fclobserv)); ?></span><span id="id_read_off_fclobserv" class="css_read_off_fclobserv" style="white-space: nowrap;<?php echo $sStyleReadInp_fclobserv; ?>">
 <input class="sc-js-input scFormObjectOdd css_fclobserv_obj" style="" id="id_sc_field_fclobserv" type=text name="fclobserv" value="<?php echo $this->form_encode_input($fclobserv) ?>"
 size=150 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclobserv_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclobserv_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_fclobserv_dumb = ('' == $sStyleHidden_fclobserv) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fclobserv_dumb" style="<?php echo $sStyleHidden_fclobserv_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_10"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_10"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_10" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['fclfeccrea']))
           {
               $this->nmgp_cmp_readonly['fclfeccrea'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['fclusucrea']))
    {
        $this->nm_new_label['fclusucrea'] = "USUARIO CREACIÓN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclusucrea = $this->fclusucrea;
   $sStyleHidden_fclusucrea = '';
   if (isset($this->nmgp_cmp_hidden['fclusucrea']) && $this->nmgp_cmp_hidden['fclusucrea'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclusucrea']);
       $sStyleHidden_fclusucrea = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclusucrea = 'display: none;';
   $sStyleReadInp_fclusucrea = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["fclusucrea"]) &&  $this->nmgp_cmp_readonly["fclusucrea"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclusucrea']);
       $sStyleReadLab_fclusucrea = '';
       $sStyleReadInp_fclusucrea = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclusucrea']) && $this->nmgp_cmp_hidden['fclusucrea'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fclusucrea" value="<?php echo $this->form_encode_input($fclusucrea) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclusucrea_line" id="hidden_field_data_fclusucrea" style="<?php echo $sStyleHidden_fclusucrea; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclusucrea_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclusucrea_label" style=""><span id="id_label_fclusucrea"><?php echo $this->nm_new_label['fclusucrea']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["fclusucrea"]) &&  $this->nmgp_cmp_readonly["fclusucrea"] == "on")) { 

 ?>
<input type="hidden" name="fclusucrea" value="<?php echo $this->form_encode_input($fclusucrea) . "\"><span id=\"id_ajax_label_fclusucrea\">" . $fclusucrea . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_fclusucrea" class="sc-ui-readonly-fclusucrea css_fclusucrea_line" style="<?php echo $sStyleReadLab_fclusucrea; ?>"><?php echo $this->form_format_readonly("fclusucrea", $this->form_encode_input($this->fclusucrea)); ?></span><span id="id_read_off_fclusucrea" class="css_read_off_fclusucrea" style="white-space: nowrap;<?php echo $sStyleReadInp_fclusucrea; ?>">
 <input class="sc-js-input scFormObjectOdd css_fclusucrea_obj" style="" id="id_sc_field_fclusucrea" type=text name="fclusucrea" value="<?php echo $this->form_encode_input($fclusucrea) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclusucrea_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclusucrea_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['fclusumodi']))
           {
               $this->nmgp_cmp_readonly['fclusumodi'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['fclfeccrea']))
    {
        $this->nm_new_label['fclfeccrea'] = "FECHA CREACIÓN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fclfeccrea = $this->fclfeccrea;
   if (strlen($this->fclfeccrea_hora) > 8 ) {$this->fclfeccrea_hora = substr($this->fclfeccrea_hora, 0, 8);}
   $this->fclfeccrea .= ' ' . $this->fclfeccrea_hora;
   $this->fclfeccrea  = trim($this->fclfeccrea);
   $fclfeccrea = $this->fclfeccrea;
   $sStyleHidden_fclfeccrea = '';
   if (isset($this->nmgp_cmp_hidden['fclfeccrea']) && $this->nmgp_cmp_hidden['fclfeccrea'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclfeccrea']);
       $sStyleHidden_fclfeccrea = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclfeccrea = 'display: none;';
   $sStyleReadInp_fclfeccrea = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["fclfeccrea"]) &&  $this->nmgp_cmp_readonly["fclfeccrea"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclfeccrea']);
       $sStyleReadLab_fclfeccrea = '';
       $sStyleReadInp_fclfeccrea = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclfeccrea']) && $this->nmgp_cmp_hidden['fclfeccrea'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fclfeccrea" value="<?php echo $this->form_encode_input($fclfeccrea) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclfeccrea_line" id="hidden_field_data_fclfeccrea" style="<?php echo $sStyleHidden_fclfeccrea; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclfeccrea_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclfeccrea_label" style=""><span id="id_label_fclfeccrea"><?php echo $this->nm_new_label['fclfeccrea']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["fclfeccrea"]) &&  $this->nmgp_cmp_readonly["fclfeccrea"] == "on")) { 

 ?>
<input type="hidden" name="fclfeccrea" value="<?php echo $this->form_encode_input($fclfeccrea) . "\"><span id=\"id_ajax_label_fclfeccrea\">" . $fclfeccrea . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_fclfeccrea" class="sc-ui-readonly-fclfeccrea css_fclfeccrea_line" style="<?php echo $sStyleReadLab_fclfeccrea; ?>"><?php echo $this->form_format_readonly("fclfeccrea", $this->form_encode_input($fclfeccrea)); ?></span><span id="id_read_off_fclfeccrea" class="css_read_off_fclfeccrea" style="white-space: nowrap;<?php echo $sStyleReadInp_fclfeccrea; ?>"><?php
$tmp_form_data = $this->field_config['fclfeccrea']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fclfeccrea_obj" style="" id="id_sc_field_fclfeccrea" type=text name="fclfeccrea" value="<?php echo $this->form_encode_input($fclfeccrea) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fclfeccrea']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fclfeccrea']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fclfeccrea']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclfeccrea_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclfeccrea_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->fclfeccrea = $old_dt_fclfeccrea;
?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['fclfecmodi']))
           {
               $this->nmgp_cmp_readonly['fclfecmodi'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['fclusumodi']))
    {
        $this->nm_new_label['fclusumodi'] = "USUARIO MODIFICACIÓN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclusumodi = $this->fclusumodi;
   $sStyleHidden_fclusumodi = '';
   if (isset($this->nmgp_cmp_hidden['fclusumodi']) && $this->nmgp_cmp_hidden['fclusumodi'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclusumodi']);
       $sStyleHidden_fclusumodi = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclusumodi = 'display: none;';
   $sStyleReadInp_fclusumodi = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["fclusumodi"]) &&  $this->nmgp_cmp_readonly["fclusumodi"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclusumodi']);
       $sStyleReadLab_fclusumodi = '';
       $sStyleReadInp_fclusumodi = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclusumodi']) && $this->nmgp_cmp_hidden['fclusumodi'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fclusumodi" value="<?php echo $this->form_encode_input($fclusumodi) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclusumodi_line" id="hidden_field_data_fclusumodi" style="<?php echo $sStyleHidden_fclusumodi; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclusumodi_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclusumodi_label" style=""><span id="id_label_fclusumodi"><?php echo $this->nm_new_label['fclusumodi']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["fclusumodi"]) &&  $this->nmgp_cmp_readonly["fclusumodi"] == "on")) { 

 ?>
<input type="hidden" name="fclusumodi" value="<?php echo $this->form_encode_input($fclusumodi) . "\"><span id=\"id_ajax_label_fclusumodi\">" . $fclusumodi . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_fclusumodi" class="sc-ui-readonly-fclusumodi css_fclusumodi_line" style="<?php echo $sStyleReadLab_fclusumodi; ?>"><?php echo $this->form_format_readonly("fclusumodi", $this->form_encode_input($this->fclusumodi)); ?></span><span id="id_read_off_fclusumodi" class="css_read_off_fclusumodi" style="white-space: nowrap;<?php echo $sStyleReadInp_fclusumodi; ?>">
 <input class="sc-js-input scFormObjectOdd css_fclusumodi_obj" style="" id="id_sc_field_fclusumodi" type=text name="fclusumodi" value="<?php echo $this->form_encode_input($fclusumodi) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclusumodi_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclusumodi_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fclfecmodi']))
    {
        $this->nm_new_label['fclfecmodi'] = "FECHA MODIFICACIÓN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fclfecmodi = $this->fclfecmodi;
   if (strlen($this->fclfecmodi_hora) > 8 ) {$this->fclfecmodi_hora = substr($this->fclfecmodi_hora, 0, 8);}
   $this->fclfecmodi .= ' ' . $this->fclfecmodi_hora;
   $this->fclfecmodi  = trim($this->fclfecmodi);
   $fclfecmodi = $this->fclfecmodi;
   $sStyleHidden_fclfecmodi = '';
   if (isset($this->nmgp_cmp_hidden['fclfecmodi']) && $this->nmgp_cmp_hidden['fclfecmodi'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fclfecmodi']);
       $sStyleHidden_fclfecmodi = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fclfecmodi = 'display: none;';
   $sStyleReadInp_fclfecmodi = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["fclfecmodi"]) &&  $this->nmgp_cmp_readonly["fclfecmodi"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fclfecmodi']);
       $sStyleReadLab_fclfecmodi = '';
       $sStyleReadInp_fclfecmodi = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fclfecmodi']) && $this->nmgp_cmp_hidden['fclfecmodi'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fclfecmodi" value="<?php echo $this->form_encode_input($fclfecmodi) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fclfecmodi_line" id="hidden_field_data_fclfecmodi" style="<?php echo $sStyleHidden_fclfecmodi; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclfecmodi_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclfecmodi_label" style=""><span id="id_label_fclfecmodi"><?php echo $this->nm_new_label['fclfecmodi']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["fclfecmodi"]) &&  $this->nmgp_cmp_readonly["fclfecmodi"] == "on")) { 

 ?>
<input type="hidden" name="fclfecmodi" value="<?php echo $this->form_encode_input($fclfecmodi) . "\"><span id=\"id_ajax_label_fclfecmodi\">" . $fclfecmodi . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_fclfecmodi" class="sc-ui-readonly-fclfecmodi css_fclfecmodi_line" style="<?php echo $sStyleReadLab_fclfecmodi; ?>"><?php echo $this->form_format_readonly("fclfecmodi", $this->form_encode_input($fclfecmodi)); ?></span><span id="id_read_off_fclfecmodi" class="css_read_off_fclfecmodi" style="white-space: nowrap;<?php echo $sStyleReadInp_fclfecmodi; ?>"><?php
$tmp_form_data = $this->field_config['fclfecmodi']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fclfecmodi_obj" style="" id="id_sc_field_fclfecmodi" type=text name="fclfecmodi" value="<?php echo $this->form_encode_input($fclfecmodi) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fclfecmodi']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fclfecmodi']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fclfecmodi']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclfecmodi_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclfecmodi_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->fclfecmodi = $old_dt_fclfecmodi;
?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_fclfecmodi_dumb = ('' == $sStyleHidden_fclfecmodi) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fclfecmodi_dumb" style="<?php echo $sStyleHidden_fclfecmodi_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_11"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_11"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_11" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">HISTORIAS</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['historias']))
    {
        $this->nm_new_label['historias'] = "HISTORIAS";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $historias = $this->historias;
   $sStyleHidden_historias = '';
   if (isset($this->nmgp_cmp_hidden['historias']) && $this->nmgp_cmp_hidden['historias'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['historias']);
       $sStyleHidden_historias = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_historias = 'display: none;';
   $sStyleReadInp_historias = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['historias']) && $this->nmgp_cmp_readonly['historias'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['historias']);
       $sStyleReadLab_historias = '';
       $sStyleReadInp_historias = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['historias']) && $this->nmgp_cmp_hidden['historias'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="historias" value="<?php echo $this->form_encode_input($historias) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_historias_line" id="hidden_field_data_historias" style="<?php echo $sStyleHidden_historias; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_historias_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_historias'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_historias'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_historia_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_historias'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_historia_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_historia_script_case_init'] ]['grid_historia']['embutida_form_full']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_historia_script_case_init'] ]['grid_historia']['embutida_form']       = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_historia_script_case_init'] ]['grid_historia']['embutida_pai']        = "form_ficha_cliente_mob";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_historia_script_case_init'] ]['grid_historia']['embutida_form_parms'] = "var_cliente*scin" . $this->nmgp_dados_form['fclnumero'] . "*scoutNMSC_paginacao*scinFULL*scout";
 if (isset($this->Ini->sc_lig_md5["grid_historia"]) && $this->Ini->sc_lig_md5["grid_historia"] == "S") {
     $Parms_Lig  = "var_cliente*scin" . $this->nmgp_dados_form['fclnumero'] . "*scoutNMSC_paginacao*scinFULL*scout";
     $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_ficha_cliente_mob@SC_par@" . md5($Parms_Lig);
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
 } else {
     $Md5_Lig  = "var_cliente*scin" . $this->nmgp_dados_form['fclnumero'] . "*scoutNMSC_paginacao*scinFULL*scout";
 }
 $parms_lig_cons = "&nmgp_parms=" . $Md5_Lig;
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_ficha_cliente_mob_empty.htm' : $this->Ini->link_grid_historia_cons . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y' . $parms_lig_cons;
 foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_historia_script_case_init'] ]['grid_historia'] as $i => $v)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_historia_script_case_init'] ]['grid_historia'][$i] = $v;
 }
if (isset($this->Ini->sc_lig_target['C_@scinf_historias']) && 'nmsc_iframe_liga_grid_historia' != $this->Ini->sc_lig_target['C_@scinf_historias'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_historias'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_historia_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_historias'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_grid_historia"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_grid_historia"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_historias_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_historias_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_historias_dumb = ('' == $sStyleHidden_historias) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_historias_dumb" style="<?php echo $sStyleHidden_historias_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_12"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_12"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_12" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">PRESUPUESTOS</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['presupuestos']))
    {
        $this->nm_new_label['presupuestos'] = "PRESUPUESTOS";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $presupuestos = $this->presupuestos;
   $sStyleHidden_presupuestos = '';
   if (isset($this->nmgp_cmp_hidden['presupuestos']) && $this->nmgp_cmp_hidden['presupuestos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['presupuestos']);
       $sStyleHidden_presupuestos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_presupuestos = 'display: none;';
   $sStyleReadInp_presupuestos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['presupuestos']) && $this->nmgp_cmp_readonly['presupuestos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['presupuestos']);
       $sStyleReadLab_presupuestos = '';
       $sStyleReadInp_presupuestos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['presupuestos']) && $this->nmgp_cmp_hidden['presupuestos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="presupuestos" value="<?php echo $this->form_encode_input($presupuestos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_presupuestos_line" id="hidden_field_data_presupuestos" style="<?php echo $sStyleHidden_presupuestos; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_presupuestos_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_presupuestos'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_presupuestos'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_presupuesto_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_presupuestos'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_presupuesto_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_presupuesto_script_case_init'] ]['grid_presupuesto']['embutida_form_full']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_presupuesto_script_case_init'] ]['grid_presupuesto']['embutida_form']       = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_presupuesto_script_case_init'] ]['grid_presupuesto']['embutida_pai']        = "form_ficha_cliente_mob";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_presupuesto_script_case_init'] ]['grid_presupuesto']['embutida_form_parms'] = "var_cliente*scin" . $this->nmgp_dados_form['fclnumero'] . "*scoutNMSC_paginacao*scinFULL*scout";
 if (isset($this->Ini->sc_lig_md5["grid_presupuesto"]) && $this->Ini->sc_lig_md5["grid_presupuesto"] == "S") {
     $Parms_Lig  = "var_cliente*scin" . $this->nmgp_dados_form['fclnumero'] . "*scoutNMSC_paginacao*scinFULL*scout";
     $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_ficha_cliente_mob@SC_par@" . md5($Parms_Lig);
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
 } else {
     $Md5_Lig  = "var_cliente*scin" . $this->nmgp_dados_form['fclnumero'] . "*scoutNMSC_paginacao*scinFULL*scout";
 }
 $parms_lig_cons = "&nmgp_parms=" . $Md5_Lig;
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_ficha_cliente_mob_empty.htm' : $this->Ini->link_grid_presupuesto_cons . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y' . $parms_lig_cons;
 foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_presupuesto_script_case_init'] ]['grid_presupuesto'] as $i => $v)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_presupuesto_script_case_init'] ]['grid_presupuesto'][$i] = $v;
 }
if (isset($this->Ini->sc_lig_target['C_@scinf_presupuestos']) && 'nmsc_iframe_liga_grid_presupuesto' != $this->Ini->sc_lig_target['C_@scinf_presupuestos'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_presupuestos'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_presupuesto_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_presupuestos'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_grid_presupuesto"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_grid_presupuesto"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_presupuestos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_presupuestos_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_presupuestos_dumb = ('' == $sStyleHidden_presupuestos) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_presupuestos_dumb" style="<?php echo $sStyleHidden_presupuestos_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_13"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_13"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_13" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"> COBROS</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cobros']))
    {
        $this->nm_new_label['cobros'] = "cobros";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cobros = $this->cobros;
   $sStyleHidden_cobros = '';
   if (isset($this->nmgp_cmp_hidden['cobros']) && $this->nmgp_cmp_hidden['cobros'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cobros']);
       $sStyleHidden_cobros = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cobros = 'display: none;';
   $sStyleReadInp_cobros = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cobros']) && $this->nmgp_cmp_readonly['cobros'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cobros']);
       $sStyleReadLab_cobros = '';
       $sStyleReadInp_cobros = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cobros']) && $this->nmgp_cmp_hidden['cobros'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cobros" value="<?php echo $this->form_encode_input($cobros) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cobros_line" id="hidden_field_data_cobros" style="<?php echo $sStyleHidden_cobros; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_cobros_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_cobros'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_cobros'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_cobros_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_cobros'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_cobros_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_cobros_script_case_init'] ]['grid_cobros']['embutida_form_full']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_cobros_script_case_init'] ]['grid_cobros']['embutida_form']       = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_cobros_script_case_init'] ]['grid_cobros']['embutida_pai']        = "form_ficha_cliente_mob";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_cobros_script_case_init'] ]['grid_cobros']['embutida_form_parms'] = "var_cliente*scin" . $this->nmgp_dados_form['fclnumero'] . "*scoutNMSC_paginacao*scinFULL*scout";
 if (isset($this->Ini->sc_lig_md5["grid_cobros"]) && $this->Ini->sc_lig_md5["grid_cobros"] == "S") {
     $Parms_Lig  = "var_cliente*scin" . $this->nmgp_dados_form['fclnumero'] . "*scoutNMSC_paginacao*scinFULL*scout";
     $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_ficha_cliente_mob@SC_par@" . md5($Parms_Lig);
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
 } else {
     $Md5_Lig  = "var_cliente*scin" . $this->nmgp_dados_form['fclnumero'] . "*scoutNMSC_paginacao*scinFULL*scout";
 }
 $parms_lig_cons = "&nmgp_parms=" . $Md5_Lig;
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_ficha_cliente_mob_empty.htm' : $this->Ini->link_grid_cobros_cons . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y' . $parms_lig_cons;
 foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_cobros_script_case_init'] ]['grid_cobros'] as $i => $v)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_cobros_script_case_init'] ]['grid_cobros'][$i] = $v;
 }
if (isset($this->Ini->sc_lig_target['C_@scinf_cobros']) && 'nmsc_iframe_liga_grid_cobros' != $this->Ini->sc_lig_target['C_@scinf_cobros'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_cobros'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['grid_cobros_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_cobros'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_grid_cobros"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_grid_cobros"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cobros_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cobros_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['run_iframe'] != "R")
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
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8592;)", "sc-unique-btn-14", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8592;)", "sc-unique-btn-15", "", "");?>
 
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
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8594;)", "sc-unique-btn-16", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8594;)", "sc-unique-btn-17", "", "");?>
 
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
    if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai_modal()", "scBtnFn_sys_format_sai_modal()", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-18", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13);

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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_ficha_cliente_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_ficha_cliente_mob");
 parent.scAjaxDetailHeight("form_ficha_cliente_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_ficha_cliente_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_ficha_cliente_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['sc_modal'])
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
		if ($("#sc_b_new_t.sc-unique-btn-10").length && $("#sc_b_new_t.sc-unique-btn-10").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-11").length && $("#sc_b_ins_t.sc-unique-btn-11").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-12").length && $("#sc_b_sai_t.sc-unique-btn-12").is(":visible")) {
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-4").length && $("#sc_b_upd_t.sc-unique-btn-4").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
		if ($("#sc_b_upd_t.sc-unique-btn-13").length && $("#sc_b_upd_t.sc-unique-btn-13").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_volver() {
		if ($("#sc_volver_top").length && $("#sc_volver_top").is(":visible")) {
			sc_btn_volver()
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
		if ($("#sc_b_ini_b.sc-unique-btn-5").length && $("#sc_b_ini_b.sc-unique-btn-5").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
		if ($("#sc_b_ini_b.sc-unique-btn-14").length && $("#sc_b_ini_b.sc-unique-btn-14").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-6").length && $("#sc_b_ret_b.sc-unique-btn-6").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
		if ($("#sc_b_ret_b.sc-unique-btn-15").length && $("#sc_b_ret_b.sc-unique-btn-15").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-7").length && $("#sc_b_avc_b.sc-unique-btn-7").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
		if ($("#sc_b_avc_b.sc-unique-btn-16").length && $("#sc_b_avc_b.sc-unique-btn-16").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-8").length && $("#sc_b_fim_b.sc-unique-btn-8").is(":visible")) {
			nm_move ('final');
			 return;
		}
		if ($("#sc_b_fim_b.sc-unique-btn-17").length && $("#sc_b_fim_b.sc-unique-btn-17").is(":visible")) {
			nm_move ('final');
			 return;
		}
	}
	function scBtnFn_sys_format_sai_modal() {
		if ($("#sc_b_sai_b.sc-unique-btn-9").length && $("#sc_b_sai_b.sc-unique-btn-9").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_b.sc-unique-btn-18").length && $("#sc_b_sai_b.sc-unique-btn-18").is(":visible")) {
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
<span id="sc-id-mobile-out"><?php echo $this->Ini->Nm_lang['lang_version_web']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ficha_cliente_mob']['buttonStatus'] = $this->nmgp_botoes;
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
