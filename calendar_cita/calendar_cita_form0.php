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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " cita"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " cita"); } ?></TITLE>
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
.css_read_off_citfecha button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_citfeccrea button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_citfecmodi button {
	background-color: transparent;
	border: 0;
	padding: 0
}
</style>
<?php
}
?>
 <style type="text/css">
  .scSpin_citduracion_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
 </style>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>calendar_cita/calendar_cita_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = true;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("calendar_cita_sajax_js.php");
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

 function sc_calendar_all_day_click() {
  var allDayField = $("input[name='__calend_all_day__[]']");
  if (allDayField.length) {
     if (allDayField.prop("checked")) {
      scAjaxElementDisplay('hidden_field_label_cithoraini', 'off');
      scAjaxElementDisplay('hidden_field_data_cithoraini', 'off');
      scAjaxElementDisplay('hidden_field_label_cithorafin', 'off');
      scAjaxElementDisplay('hidden_field_data_cithorafin', 'off');
     }
     else {
      scAjaxElementDisplay('hidden_field_label_cithoraini', 'on');
      scAjaxElementDisplay('hidden_field_data_cithoraini', 'on');
      scAjaxElementDisplay('hidden_field_label_cithorafin', 'on');
      scAjaxElementDisplay('hidden_field_data_cithorafin', 'on');
     }
    }
 } // sc_calendar_all_day_click

 function sc_calendar_recurrence_change() {
          var recurField = $("#id_sc_field_citrecurr");
          if ("N" == recurField.val()) {
                  scAjaxElementDisplay("hidden_field_label_citperiod", "off");
                  scAjaxElementDisplay("hidden_field_data_citperiod", "off");
                  scAjaxElementDisplay("hidden_field_label_citrecurrinfo", "off");
                  scAjaxElementDisplay("hidden_field_data_citrecurrinfo", "off");
          }
          else {
                  scAjaxElementDisplay("hidden_field_label_citperiod", "on");
                  scAjaxElementDisplay("hidden_field_data_citperiod", "on");
                  scAjaxElementDisplay("hidden_field_label_citrecurrinfo", "on");
                  scAjaxElementDisplay("hidden_field_data_citrecurrinfo", "on");
          }
  
 } // sc_calendar_recurrence_change

 function nm_field_disabled(Fields, Opt) {
  opcao = "<?php if ($GLOBALS["erro_incl"] == 1) {echo "novo";} else {echo $this->nmgp_opcao;} ?>";
  if (opcao == "novo" && Opt == "U") {
      return;
  }
  if (opcao != "novo" && Opt == "I") {
      return;
  }
  Field = Fields.split(";");
  for (i=0; i < Field.length; i++)
  {
     F_temp = Field[i].split("=");
     F_name = F_temp[0];
     F_opc  = (F_temp[1] && ("disabled" == F_temp[1] || "true" == F_temp[1])) ? true : false;
     if (F_name == "hora_fin_mostrar")
     {
        $('input[name="hora_fin_mostrar"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="hora_fin_mostrar"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="hora_fin_mostrar"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "fclnumero")
     {
        $('input[name="fclnumero"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="fclnumero"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="fclnumero"]').removeClass("scFormInputDisabled");
        }
        $('input[id="cap_fclnumero"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('#cap_fclnumero').hide();
        }
        else {
            $('#cap_fclnumero').show();
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('calendar_cita_jquery.php');

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

  mainForm = document.getElementById('main_table_form');
  formResize();

  sc_calendar_all_day_click();
  sc_calendar_recurrence_change();

  sc_form_onload();

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
 function formResize()
 {
    var formWidth = mainForm.clientWidth,
        formHeight = mainForm.clientHeight,
        windowHeight = $(window.parent).height();
    if (0 == formWidth || 0 == formHeight)
    {
        setTimeout("formResize()", 50);
    }
    else
    {
        if (formHeight > windowHeight - 100)
        {
            formHeight = windowHeight - 100;
        }
        self.parent.tb_resize(formHeight + 50, formWidth + 50);
    }
 }

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['recarga'];
}
if ('' != $this->fclnumero)
{
    $this->lookup_fclnumero($look_rpc_fclnumero);
    $look_rpc_fclnumero =  str_replace('<', '&lt;', $look_rpc_fclnumero);
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
<script type="text/javascript" src="<?php  echo $this->Ini->path_js . "/nm_rpc.js" ?>"> 
</script> 
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
 include_once("calendar_cita_js0.php");
?>
<script type="text/javascript" src="<?php  echo $this->Ini->path_js . "/nm_rpc.js" ?>"> 
</script> 
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['calendar_cita'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['calendar_cita'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="850">
 <tr>
  <td>
  <div class="scFormBorder" style="<?php echo (isset($remove_border) ? $remove_border : ''); ?>">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php echo "INFORMACIÓN DE LA CITA" ?></div>
    <div class="scFormHeaderFont" style="float: right;"></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['cittitulo']))
   {
       $this->nmgp_cmp_hidden['cittitulo'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['cithorafin']))
   {
       $this->nmgp_cmp_hidden['cithorafin'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['citcolor']))
   {
       $this->nmgp_cmp_hidden['citcolor'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['info_documento_2']))
   {
       $this->nmgp_cmp_hidden['info_documento_2'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['citid']))
           {
               $this->nmgp_cmp_readonly['citid'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cittitulo']))
           {
               $this->nmgp_cmp_readonly['cittitulo'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['citid']))
    {
        $this->nm_new_label['citid'] = "No. CITA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $citid = $this->citid;
   $sStyleHidden_citid = '';
   if (isset($this->nmgp_cmp_hidden['citid']) && $this->nmgp_cmp_hidden['citid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['citid']);
       $sStyleHidden_citid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_citid = 'display: none;';
   $sStyleReadInp_citid = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["citid"]) &&  $this->nmgp_cmp_readonly["citid"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['citid']);
       $sStyleReadLab_citid = '';
       $sStyleReadInp_citid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['citid']) && $this->nmgp_cmp_hidden['citid'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="citid" value="<?php echo $this->form_encode_input($citid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_citid_line" id="hidden_field_data_citid" style="<?php echo $sStyleHidden_citid; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_citid_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_citid_label" style=""><span id="id_label_citid"><?php echo $this->nm_new_label['citid']; ?></span></span><br>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { 
 ?>
<span id="id_read_on_citid" css_citid_line" style="<?php echo $sStyleReadLab_citid; ?>"><?php echo $this->form_format_readonly("citid", $this->form_encode_input($this->citid)); ?></span><span id="id_read_off_citid" class="css_read_off_citid" style="<?php echo $sStyleReadInp_citid; ?>"><input type="hidden" name="citid" value="<?php echo $this->form_encode_input($citid) . "\">"?><span id="id_ajax_label_citid"><?php echo nl2br($citid); ?></span>
</span><?php } else { ?>
&nbsp;
<?php } ?>
</span></td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_citid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_citid_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cittitulo']))
    {
        $this->nm_new_label['cittitulo'] = "ASUNTO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cittitulo = $this->cittitulo;
   if (!isset($this->nmgp_cmp_hidden['cittitulo']))
   {
       $this->nmgp_cmp_hidden['cittitulo'] = 'off';
   }
   $sStyleHidden_cittitulo = '';
   if (isset($this->nmgp_cmp_hidden['cittitulo']) && $this->nmgp_cmp_hidden['cittitulo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cittitulo']);
       $sStyleHidden_cittitulo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cittitulo = 'display: none;';
   $sStyleReadInp_cittitulo = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cittitulo"]) &&  $this->nmgp_cmp_readonly["cittitulo"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cittitulo']);
       $sStyleReadLab_cittitulo = '';
       $sStyleReadInp_cittitulo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cittitulo']) && $this->nmgp_cmp_hidden['cittitulo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cittitulo" value="<?php echo $this->form_encode_input($cittitulo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cittitulo_line" id="hidden_field_data_cittitulo" style="<?php echo $sStyleHidden_cittitulo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cittitulo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cittitulo_label" style=""><span id="id_label_cittitulo"><?php echo $this->nm_new_label['cittitulo']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["cittitulo"]) &&  $this->nmgp_cmp_readonly["cittitulo"] == "on")) { 

 ?>
<input type="hidden" name="cittitulo" value="<?php echo $this->form_encode_input($cittitulo) . "\"><span id=\"id_ajax_label_cittitulo\">" . $cittitulo . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_cittitulo" class="sc-ui-readonly-cittitulo css_cittitulo_line" style="<?php echo $sStyleReadLab_cittitulo; ?>"><?php echo $this->form_format_readonly("cittitulo", $this->form_encode_input($this->cittitulo)); ?></span><span id="id_read_off_cittitulo" class="css_read_off_cittitulo" style="white-space: nowrap;<?php echo $sStyleReadInp_cittitulo; ?>">
 <input class="sc-js-input scFormObjectOdd css_cittitulo_obj" style="" id="id_sc_field_cittitulo" type=text name="cittitulo" value="<?php echo $this->form_encode_input($cittitulo) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_cittitulo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cittitulo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['citfecha']))
    {
        $this->nm_new_label['citfecha'] = "FECHA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $citfecha = $this->citfecha;
   $sStyleHidden_citfecha = '';
   if (isset($this->nmgp_cmp_hidden['citfecha']) && $this->nmgp_cmp_hidden['citfecha'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['citfecha']);
       $sStyleHidden_citfecha = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_citfecha = 'display: none;';
   $sStyleReadInp_citfecha = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['citfecha']) && $this->nmgp_cmp_readonly['citfecha'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['citfecha']);
       $sStyleReadLab_citfecha = '';
       $sStyleReadInp_citfecha = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['citfecha']) && $this->nmgp_cmp_hidden['citfecha'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="citfecha" value="<?php echo $this->form_encode_input($citfecha) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_citfecha_line" id="hidden_field_data_citfecha" style="<?php echo $sStyleHidden_citfecha; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_citfecha_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_citfecha_label" style=""><span id="id_label_citfecha"><?php echo $this->nm_new_label['citfecha']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['php_cmp_required']['citfecha']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['php_cmp_required']['citfecha'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["citfecha"]) &&  $this->nmgp_cmp_readonly["citfecha"] == "on") { 

 ?>
<input type="hidden" name="citfecha" value="<?php echo $this->form_encode_input($citfecha) . "\">" . $citfecha . ""; ?>
<?php } else { ?>
<span id="id_read_on_citfecha" class="sc-ui-readonly-citfecha css_citfecha_line" style="<?php echo $sStyleReadLab_citfecha; ?>"><?php echo $this->form_format_readonly("citfecha", $this->form_encode_input($citfecha)); ?></span><span id="id_read_off_citfecha" class="css_read_off_citfecha" style="white-space: nowrap;<?php echo $sStyleReadInp_citfecha; ?>"><?php
$tmp_form_data = $this->field_config['citfecha']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_citfecha_obj" style="" id="id_sc_field_citfecha" type=text name="citfecha" value="<?php echo $this->form_encode_input($citfecha) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['citfecha']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['citfecha']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_citfecha_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_citfecha_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['agesecuen']))
   {
       $this->nm_new_label['agesecuen'] = "AGENDA";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $agesecuen = $this->agesecuen;
   $sStyleHidden_agesecuen = '';
   if (isset($this->nmgp_cmp_hidden['agesecuen']) && $this->nmgp_cmp_hidden['agesecuen'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agesecuen']);
       $sStyleHidden_agesecuen = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agesecuen = 'display: none;';
   $sStyleReadInp_agesecuen = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['agesecuen']) && $this->nmgp_cmp_readonly['agesecuen'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agesecuen']);
       $sStyleReadLab_agesecuen = '';
       $sStyleReadInp_agesecuen = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agesecuen']) && $this->nmgp_cmp_hidden['agesecuen'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="agesecuen" value="<?php echo $this->form_encode_input($this->agesecuen) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_agesecuen_line" id="hidden_field_data_agesecuen" style="<?php echo $sStyleHidden_agesecuen; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_agesecuen_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_agesecuen_label" style=""><span id="id_label_agesecuen"><?php echo $this->nm_new_label['agesecuen']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['php_cmp_required']['agesecuen']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['php_cmp_required']['agesecuen'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agesecuen"]) &&  $this->nmgp_cmp_readonly["agesecuen"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_agesecuen']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_agesecuen'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_agesecuen']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_agesecuen'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_agesecuen']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_agesecuen'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_agesecuen']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_agesecuen'] = array(); 
    }

   $old_value_citid = $this->citid;
   $old_value_citfecha = $this->citfecha;
   $old_value_cithoraini = $this->cithoraini;
   $old_value_citduracion = $this->citduracion;
   $old_value_cithorafin = $this->cithorafin;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_citid = $this->citid;
   $unformatted_value_citfecha = $this->citfecha;
   $unformatted_value_cithoraini = $this->cithoraini;
   $unformatted_value_citduracion = $this->citduracion;
   $unformatted_value_cithorafin = $this->cithorafin;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT A.agesecuen, A.agenombre + ' - ' + M.medapellidos + ' ' + M.mednombres  FROM agenda A, medico M where A.medcodigo=M.medcodigo and A.ageactivo=1 ORDER BY A.agenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT A.agesecuen, concat(A.agenombre,' - ',M.medapellidos,' ',M.mednombres)  FROM agenda A, medico M where A.medcodigo=M.medcodigo and A.ageactivo=1 ORDER BY A.agenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT A.agesecuen, A.agenombre&' - '&M.medapellidos&' '&M.mednombres  FROM agenda A, medico M where A.medcodigo=M.medcodigo and A.ageactivo=1 ORDER BY A.agenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT A.agesecuen, A.agenombre||' - '||M.medapellidos||' '||M.mednombres  FROM agenda A, medico M where A.medcodigo=M.medcodigo and A.ageactivo=1 ORDER BY A.agenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT A.agesecuen, A.agenombre + ' - ' + M.medapellidos + ' ' + M.mednombres  FROM agenda A, medico M where A.medcodigo=M.medcodigo and A.ageactivo=1 ORDER BY A.agenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT A.agesecuen, A.agenombre||' - '||M.medapellidos||' '||M.mednombres  FROM agenda A, medico M where A.medcodigo=M.medcodigo and A.ageactivo=1 ORDER BY A.agenombre";
   }
   else
   {
       $nm_comando = "SELECT A.agesecuen, A.agenombre||' - '||M.medapellidos||' '||M.mednombres  FROM agenda A, medico M where A.medcodigo=M.medcodigo and A.ageactivo=1 ORDER BY A.agenombre";
   }

   $this->citid = $old_value_citid;
   $this->citfecha = $old_value_citfecha;
   $this->cithoraini = $old_value_cithoraini;
   $this->citduracion = $old_value_citduracion;
   $this->cithorafin = $old_value_cithorafin;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_agesecuen'][] = $rs->fields[0];
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
   $agesecuen_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->agesecuen_1))
          {
              foreach ($this->agesecuen_1 as $tmp_agesecuen)
              {
                  if (trim($tmp_agesecuen) === trim($cadaselect[1])) { $agesecuen_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->agesecuen) === trim($cadaselect[1])) { $agesecuen_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="agesecuen" value="<?php echo $this->form_encode_input($agesecuen) . "\">" . $agesecuen_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_agesecuen();
   $x = 0 ; 
   $agesecuen_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->agesecuen_1))
          {
              foreach ($this->agesecuen_1 as $tmp_agesecuen)
              {
                  if (trim($tmp_agesecuen) === trim($cadaselect[1])) { $agesecuen_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->agesecuen) === trim($cadaselect[1])) { $agesecuen_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($agesecuen_look))
          {
              $agesecuen_look = $this->agesecuen;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_agesecuen\" class=\"css_agesecuen_line\" style=\"" .  $sStyleReadLab_agesecuen . "\">" . $this->form_format_readonly("agesecuen", $this->form_encode_input($agesecuen_look)) . "</span><span id=\"id_read_off_agesecuen\" class=\"css_read_off_agesecuen\" style=\"white-space: nowrap; " . $sStyleReadInp_agesecuen . "\">";
   echo " <span id=\"idAjaxSelect_agesecuen\"><select class=\"sc-js-input scFormObjectOdd css_agesecuen_obj\" style=\"\" id=\"id_sc_field_agesecuen\" name=\"agesecuen\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_agesecuen'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","------------------------") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->agesecuen) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->agesecuen)) 
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
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_agesecuen_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_agesecuen_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="1" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
<?php $sStyleHidden_citid_dumb = ('' == $sStyleHidden_citid) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_citid_dumb" style="<?php echo $sStyleHidden_citid_dumb; ?>"></TD>
<?php $sStyleHidden_cittitulo_dumb = ('' == $sStyleHidden_cittitulo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cittitulo_dumb" style="<?php echo $sStyleHidden_cittitulo_dumb; ?>"></TD>
<?php $sStyleHidden_citfecha_dumb = ('' == $sStyleHidden_citfecha) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_citfecha_dumb" style="<?php echo $sStyleHidden_citfecha_dumb; ?>"></TD>
<?php $sStyleHidden_agesecuen_dumb = ('' == $sStyleHidden_agesecuen) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_agesecuen_dumb" style="<?php echo $sStyleHidden_agesecuen_dumb; ?>"></TD>
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
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['citfactur']))
           {
               $this->nmgp_cmp_readonly['citfactur'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['cithoraini']))
    {
        $this->nm_new_label['cithoraini'] = "HORA INICIO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cithoraini = $this->cithoraini;
   $sStyleHidden_cithoraini = '';
   if (isset($this->nmgp_cmp_hidden['cithoraini']) && $this->nmgp_cmp_hidden['cithoraini'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cithoraini']);
       $sStyleHidden_cithoraini = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cithoraini = 'display: none;';
   $sStyleReadInp_cithoraini = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cithoraini']) && $this->nmgp_cmp_readonly['cithoraini'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cithoraini']);
       $sStyleReadLab_cithoraini = '';
       $sStyleReadInp_cithoraini = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cithoraini']) && $this->nmgp_cmp_hidden['cithoraini'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cithoraini" value="<?php echo $this->form_encode_input($cithoraini) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cithoraini_line" id="hidden_field_data_cithoraini" style="<?php echo $sStyleHidden_cithoraini; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cithoraini_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cithoraini_label" style=""><span id="id_label_cithoraini"><?php echo $this->nm_new_label['cithoraini']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['php_cmp_required']['cithoraini']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['php_cmp_required']['cithoraini'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cithoraini"]) &&  $this->nmgp_cmp_readonly["cithoraini"] == "on") { 

 ?>
<input type="hidden" name="cithoraini" value="<?php echo $this->form_encode_input($cithoraini) . "\">" . $cithoraini . ""; ?>
<?php } else { ?>
<span id="id_read_on_cithoraini" class="sc-ui-readonly-cithoraini css_cithoraini_line" style="<?php echo $sStyleReadLab_cithoraini; ?>"><?php echo $this->form_format_readonly("cithoraini", $this->form_encode_input($cithoraini)); ?></span><span id="id_read_off_cithoraini" class="css_read_off_cithoraini" style="white-space: nowrap;<?php echo $sStyleReadInp_cithoraini; ?>"><?php
$tmp_form_data = $this->field_config['cithoraini']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_cithoraini_obj" style="" id="id_sc_field_cithoraini" type=text name="cithoraini" value="<?php echo $this->form_encode_input($cithoraini) ?>"
 size=4 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['cithoraini']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['cithoraini']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_cithoraini_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cithoraini_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['citduracion']))
    {
        $this->nm_new_label['citduracion'] = "DURACIÓN (min)";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $citduracion = $this->citduracion;
   $sStyleHidden_citduracion = '';
   if (isset($this->nmgp_cmp_hidden['citduracion']) && $this->nmgp_cmp_hidden['citduracion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['citduracion']);
       $sStyleHidden_citduracion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_citduracion = 'display: none;';
   $sStyleReadInp_citduracion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['citduracion']) && $this->nmgp_cmp_readonly['citduracion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['citduracion']);
       $sStyleReadLab_citduracion = '';
       $sStyleReadInp_citduracion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['citduracion']) && $this->nmgp_cmp_hidden['citduracion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="citduracion" value="<?php echo $this->form_encode_input($citduracion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_citduracion_line" id="hidden_field_data_citduracion" style="<?php echo $sStyleHidden_citduracion; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_citduracion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_citduracion_label" style=""><span id="id_label_citduracion"><?php echo $this->nm_new_label['citduracion']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['php_cmp_required']['citduracion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['php_cmp_required']['citduracion'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["citduracion"]) &&  $this->nmgp_cmp_readonly["citduracion"] == "on") { 

 ?>
<input type="hidden" name="citduracion" value="<?php echo $this->form_encode_input($citduracion) . "\">" . $citduracion . ""; ?>
<?php } else { ?>
<span id="id_read_on_citduracion" class="sc-ui-readonly-citduracion css_citduracion_line" style="<?php echo $sStyleReadLab_citduracion; ?>"><?php echo $this->form_format_readonly("citduracion", $this->form_encode_input($this->citduracion)); ?></span><span id="id_read_off_citduracion" class="css_read_off_citduracion" style="white-space: nowrap;<?php echo $sStyleReadInp_citduracion; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_citduracion_obj css_citduracion_obj" style="" id="id_sc_field_citduracion" type=text name="citduracion" value="<?php echo $this->form_encode_input($citduracion) ?>"
 size=5 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['citduracion']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['citduracion']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_citduracion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_citduracion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cithorafin']))
    {
        $this->nm_new_label['cithorafin'] = "HORA FINal";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cithorafin = $this->cithorafin;
   if (!isset($this->nmgp_cmp_hidden['cithorafin']))
   {
       $this->nmgp_cmp_hidden['cithorafin'] = 'off';
   }
   $sStyleHidden_cithorafin = '';
   if (isset($this->nmgp_cmp_hidden['cithorafin']) && $this->nmgp_cmp_hidden['cithorafin'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cithorafin']);
       $sStyleHidden_cithorafin = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cithorafin = 'display: none;';
   $sStyleReadInp_cithorafin = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cithorafin']) && $this->nmgp_cmp_readonly['cithorafin'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cithorafin']);
       $sStyleReadLab_cithorafin = '';
       $sStyleReadInp_cithorafin = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cithorafin']) && $this->nmgp_cmp_hidden['cithorafin'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cithorafin" value="<?php echo $this->form_encode_input($cithorafin) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cithorafin_line" id="hidden_field_data_cithorafin" style="<?php echo $sStyleHidden_cithorafin; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cithorafin_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cithorafin_label" style=""><span id="id_label_cithorafin"><?php echo $this->nm_new_label['cithorafin']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cithorafin"]) &&  $this->nmgp_cmp_readonly["cithorafin"] == "on") { 

 ?>
<input type="hidden" name="cithorafin" value="<?php echo $this->form_encode_input($cithorafin) . "\">" . $cithorafin . ""; ?>
<?php } else { ?>
<span id="id_read_on_cithorafin" class="sc-ui-readonly-cithorafin css_cithorafin_line" style="<?php echo $sStyleReadLab_cithorafin; ?>"><?php echo $this->form_format_readonly("cithorafin", $this->form_encode_input($cithorafin)); ?></span><span id="id_read_off_cithorafin" class="css_read_off_cithorafin" style="white-space: nowrap;<?php echo $sStyleReadInp_cithorafin; ?>"><?php
$tmp_form_data = $this->field_config['cithorafin']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_cithorafin_obj" style="" id="id_sc_field_cithorafin" type=text name="cithorafin" value="<?php echo $this->form_encode_input($cithorafin) ?>"
 size=4 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['cithorafin']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['cithorafin']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_cithorafin_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cithorafin_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['hora_fin_mostrar']))
    {
        $this->nm_new_label['hora_fin_mostrar'] = "HORA FIN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hora_fin_mostrar = $this->hora_fin_mostrar;
   $sStyleHidden_hora_fin_mostrar = '';
   if (isset($this->nmgp_cmp_hidden['hora_fin_mostrar']) && $this->nmgp_cmp_hidden['hora_fin_mostrar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hora_fin_mostrar']);
       $sStyleHidden_hora_fin_mostrar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hora_fin_mostrar = 'display: none;';
   $sStyleReadInp_hora_fin_mostrar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['hora_fin_mostrar']) && $this->nmgp_cmp_readonly['hora_fin_mostrar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hora_fin_mostrar']);
       $sStyleReadLab_hora_fin_mostrar = '';
       $sStyleReadInp_hora_fin_mostrar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hora_fin_mostrar']) && $this->nmgp_cmp_hidden['hora_fin_mostrar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hora_fin_mostrar" value="<?php echo $this->form_encode_input($hora_fin_mostrar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_hora_fin_mostrar_line" id="hidden_field_data_hora_fin_mostrar" style="<?php echo $sStyleHidden_hora_fin_mostrar; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hora_fin_mostrar_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_hora_fin_mostrar_label" style=""><span id="id_label_hora_fin_mostrar"><?php echo $this->nm_new_label['hora_fin_mostrar']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hora_fin_mostrar"]) &&  $this->nmgp_cmp_readonly["hora_fin_mostrar"] == "on") { 

 ?>
<input type="hidden" name="hora_fin_mostrar" value="<?php echo $this->form_encode_input($hora_fin_mostrar) . "\">" . $hora_fin_mostrar . ""; ?>
<?php } else { ?>
<span id="id_read_on_hora_fin_mostrar" class="sc-ui-readonly-hora_fin_mostrar css_hora_fin_mostrar_line" style="<?php echo $sStyleReadLab_hora_fin_mostrar; ?>"><?php echo $this->form_format_readonly("hora_fin_mostrar", $this->form_encode_input($this->hora_fin_mostrar)); ?></span><span id="id_read_off_hora_fin_mostrar" class="css_read_off_hora_fin_mostrar" style="white-space: nowrap;<?php echo $sStyleReadInp_hora_fin_mostrar; ?>">
 <input class="sc-js-input scFormObjectOdd css_hora_fin_mostrar_obj" style="" id="id_sc_field_hora_fin_mostrar" type=text name="hora_fin_mostrar" value="<?php echo $this->form_encode_input($hora_fin_mostrar) ?>"
 size=3 maxlength=8 alt="{datatype: 'text', maxLength: 8, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_hora_fin_mostrar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hora_fin_mostrar_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['citfactur']))
   {
       $this->nm_new_label['citfactur'] = "ESTADO";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $citfactur = $this->citfactur;
   $sStyleHidden_citfactur = '';
   if (isset($this->nmgp_cmp_hidden['citfactur']) && $this->nmgp_cmp_hidden['citfactur'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['citfactur']);
       $sStyleHidden_citfactur = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_citfactur = 'display: none;';
   $sStyleReadInp_citfactur = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["citfactur"]) &&  $this->nmgp_cmp_readonly["citfactur"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['citfactur']);
       $sStyleReadLab_citfactur = '';
       $sStyleReadInp_citfactur = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['citfactur']) && $this->nmgp_cmp_hidden['citfactur'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="citfactur" value="<?php echo $this->form_encode_input($this->citfactur) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_citfactur_line" id="hidden_field_data_citfactur" style="<?php echo $sStyleHidden_citfactur; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_citfactur_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_citfactur_label" style=""><span id="id_label_citfactur"><?php echo $this->nm_new_label['citfactur']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["citfactur"]) &&  $this->nmgp_cmp_readonly["citfactur"] == "on")) { 

$citfactur_look = "";
 if ($this->citfactur == "0") { $citfactur_look .= "NO PROCESADA" ;} 
 if ($this->citfactur == "1") { $citfactur_look .= "FACTURADA" ;} 
 if ($this->citfactur == "2") { $citfactur_look .= "ORDEN DE TRAB. GENERADA" ;} 
 if ($this->citfactur == "3") { $citfactur_look .= "CANCELADA POR CLÍNICA" ;} 
 if ($this->citfactur == "4") { $citfactur_look .= "CANCELADA POR PACIENTE" ;} 
 if (empty($citfactur_look)) { $citfactur_look = $this->citfactur; }
?>
<input type="hidden" name="citfactur" value="<?php echo $this->form_encode_input($citfactur) . "\"><span id=\"id_ajax_label_citfactur\">" . $citfactur_look . "</span>"; ?>
<?php } else { ?>
<?php

$citfactur_look = "";
 if ($this->citfactur == "0") { $citfactur_look .= "NO PROCESADA" ;} 
 if ($this->citfactur == "1") { $citfactur_look .= "FACTURADA" ;} 
 if ($this->citfactur == "2") { $citfactur_look .= "ORDEN DE TRAB. GENERADA" ;} 
 if ($this->citfactur == "3") { $citfactur_look .= "CANCELADA POR CLÍNICA" ;} 
 if ($this->citfactur == "4") { $citfactur_look .= "CANCELADA POR PACIENTE" ;} 
 if (empty($citfactur_look)) { $citfactur_look = $this->citfactur; }
?>
<span id="id_read_on_citfactur" class="css_citfactur_line"  style="<?php echo $sStyleReadLab_citfactur; ?>"><?php echo $this->form_format_readonly("citfactur", $this->form_encode_input($citfactur_look)); ?></span><span id="id_read_off_citfactur" class="css_read_off_citfactur" style="white-space: nowrap; <?php echo $sStyleReadInp_citfactur; ?>">
 <span id="idAjaxSelect_citfactur"><select class="sc-js-input scFormObjectOdd css_citfactur_obj" style="" id="id_sc_field_citfactur" name="citfactur" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="0" <?php  if ($this->citfactur == "0") { echo " selected" ;} ?>>NO PROCESADA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_citfactur'][] = '0'; ?>
 <option  value="1" <?php  if ($this->citfactur == "1") { echo " selected" ;} ?>>FACTURADA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_citfactur'][] = '1'; ?>
 <option  value="2" <?php  if ($this->citfactur == "2") { echo " selected" ;} ?>>ORDEN DE TRAB. GENERADA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_citfactur'][] = '2'; ?>
 <option  value="3" <?php  if ($this->citfactur == "3") { echo " selected" ;} ?>>CANCELADA POR CLÍNICA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_citfactur'][] = '3'; ?>
 <option  value="4" <?php  if ($this->citfactur == "4") { echo " selected" ;} ?>>CANCELADA POR PACIENTE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_citfactur'][] = '4'; ?>
 </select></span>
</span><?php  }?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_citfactur_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_citfactur_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['info_documento']))
    {
        $this->nm_new_label['info_documento'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $info_documento = $this->info_documento;
   $sStyleHidden_info_documento = '';
   if (isset($this->nmgp_cmp_hidden['info_documento']) && $this->nmgp_cmp_hidden['info_documento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['info_documento']);
       $sStyleHidden_info_documento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_info_documento = 'display: none;';
   $sStyleReadInp_info_documento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['info_documento']) && $this->nmgp_cmp_readonly['info_documento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['info_documento']);
       $sStyleReadLab_info_documento = '';
       $sStyleReadInp_info_documento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['info_documento']) && $this->nmgp_cmp_hidden['info_documento'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="info_documento" value="<?php echo $this->form_encode_input($info_documento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_info_documento_line" id="hidden_field_data_info_documento" style="<?php echo $sStyleHidden_info_documento; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_info_documento_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_info_documento_label" style=""><span id="id_label_info_documento"><?php echo $this->nm_new_label['info_documento']; ?></span></span><br><span id="id_ajax_label_info_documento"><?php echo $info_documento?></span>
<input type="hidden" name="info_documento" value="<?php echo $this->form_encode_input($info_documento); ?>">
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_info_documento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_info_documento_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="1" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
<?php $sStyleHidden_cithoraini_dumb = ('' == $sStyleHidden_cithoraini) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cithoraini_dumb" style="<?php echo $sStyleHidden_cithoraini_dumb; ?>"></TD>
<?php $sStyleHidden_citduracion_dumb = ('' == $sStyleHidden_citduracion) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_citduracion_dumb" style="<?php echo $sStyleHidden_citduracion_dumb; ?>"></TD>
<?php $sStyleHidden_cithorafin_dumb = ('' == $sStyleHidden_cithorafin) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cithorafin_dumb" style="<?php echo $sStyleHidden_cithorafin_dumb; ?>"></TD>
<?php $sStyleHidden_hora_fin_mostrar_dumb = ('' == $sStyleHidden_hora_fin_mostrar) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_hora_fin_mostrar_dumb" style="<?php echo $sStyleHidden_hora_fin_mostrar_dumb; ?>"></TD>
<?php $sStyleHidden_citfactur_dumb = ('' == $sStyleHidden_citfactur) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_citfactur_dumb" style="<?php echo $sStyleHidden_citfactur_dumb; ?>"></TD>
<?php $sStyleHidden_info_documento_dumb = ('' == $sStyleHidden_info_documento) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_info_documento_dumb" style="<?php echo $sStyleHidden_info_documento_dumb; ?>"></TD>
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
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cittipo']))
           {
               $this->nmgp_cmp_readonly['cittipo'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['fclnumero']))
    {
        $this->nm_new_label['fclnumero'] = "PACIENTE";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   if ('novo' != $this->nmgp_opcao) {
       $this->nmgp_cmp_readonly['fclnumero'] = 'on';
   }
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
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fclnumero']) && $this->nmgp_cmp_readonly['fclnumero'] == 'on')
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

    <TD class="scFormDataOdd css_fclnumero_line" id="hidden_field_data_fclnumero" style="<?php echo $sStyleHidden_fclnumero; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclnumero_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclnumero_label" style=""><span id="id_label_fclnumero"><?php echo $this->nm_new_label['fclnumero']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['php_cmp_required']['fclnumero']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['php_cmp_required']['fclnumero'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br><input type="hidden" name="fclnumero" value="<?php echo $this->form_encode_input($fclnumero); ?>"><span id="id_ajax_label_fclnumero"><?php echo nl2br($fclnumero); ?></span>
<?php
   $Sc_iframe_master = ($this->Embutida_call) ? 'nmgp_iframe_ret*scinnmsc_iframe_liga_calendar_cita*scout' : '';
   if (isset($this->Ini->sc_lig_md5["grid_ficha_cliente_capture"]) && $this->Ini->sc_lig_md5["grid_ficha_cliente_capture"] == "S") {
       $Parms_Lig  = "nmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutnmgp_parms_ret*scinF1,fclnumero,fclnumero*scoutnm_evt_ret_busca*scinsc_calendar_cita_fclnumero_onchange(this)*scoutjs_lookup*scinlookup_fclnumero*scout" . $Sc_iframe_master;
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@calendar_cita@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutnmgp_parms_ret*scinF1,fclnumero,fclnumero*scoutnm_evt_ret_busca*scinsc_calendar_cita_fclnumero_onchange(this)*scoutjs_lookup*scinlookup_fclnumero*scout" . $Sc_iframe_master;
   }
?>

<?php if (!$this->Ini->Export_img_zip) { ?><?php echo nmButtonOutput($this->arr_buttons, "bform_captura", "scModalCapture('" . $this->Ini->link_grid_ficha_cliente_capture_cons_psq . "?script_case_init=" . $this->Ini->sc_page . "&nmgp_parms=" . $Md5_Lig . "&SC_lig_apl_orig=calendar_cita&KeepThis=true&TB_iframe=true&height=300&width=700&modal=true')", "scModalCapture('" . $this->Ini->link_grid_ficha_cliente_capture_cons_psq . "?script_case_init=" . $this->Ini->sc_page . "&nmgp_parms=" . $Md5_Lig . "&SC_lig_apl_orig=calendar_cita&KeepThis=true&TB_iframe=true&height=300&width=700&modal=true')", "cap_fclnumero", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
 <SPAN id="id_lookup_fclnumero"><?php echo $look_rpc_fclnumero; ?></SPAN></td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_fclnumero_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclnumero_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['paciente_nuevo']))
   {
       $this->nm_new_label['paciente_nuevo'] = "NUEVO PACIENTE";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $paciente_nuevo = $this->paciente_nuevo;
   $sStyleHidden_paciente_nuevo = '';
   if (isset($this->nmgp_cmp_hidden['paciente_nuevo']) && $this->nmgp_cmp_hidden['paciente_nuevo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['paciente_nuevo']);
       $sStyleHidden_paciente_nuevo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_paciente_nuevo = 'display: none;';
   $sStyleReadInp_paciente_nuevo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['paciente_nuevo']) && $this->nmgp_cmp_readonly['paciente_nuevo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['paciente_nuevo']);
       $sStyleReadLab_paciente_nuevo = '';
       $sStyleReadInp_paciente_nuevo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['paciente_nuevo']) && $this->nmgp_cmp_hidden['paciente_nuevo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="paciente_nuevo" value="<?php echo $this->form_encode_input($this->paciente_nuevo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->paciente_nuevo_1 = explode(";", trim($this->paciente_nuevo));
  } 
  else
  {
      if (empty($this->paciente_nuevo))
      {
          $this->paciente_nuevo_1= array(); 
          $this->paciente_nuevo= "";
      } 
      else
      {
          $this->paciente_nuevo_1= $this->paciente_nuevo; 
          $this->paciente_nuevo= ""; 
          foreach ($this->paciente_nuevo_1 as $cada_paciente_nuevo)
          {
             if (!empty($paciente_nuevo))
             {
                 $this->paciente_nuevo.= ";"; 
             } 
             $this->paciente_nuevo.= $cada_paciente_nuevo; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_paciente_nuevo_line" id="hidden_field_data_paciente_nuevo" style="<?php echo $sStyleHidden_paciente_nuevo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_paciente_nuevo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_paciente_nuevo_label" style=""><span id="id_label_paciente_nuevo"><?php echo $this->nm_new_label['paciente_nuevo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["paciente_nuevo"]) &&  $this->nmgp_cmp_readonly["paciente_nuevo"] == "on") { 

$paciente_nuevo_look = "";
 if ($this->paciente_nuevo == "1") { $paciente_nuevo_look .= "" ;} 
 if (empty($paciente_nuevo_look)) { $paciente_nuevo_look = $this->paciente_nuevo; }
?>
<input type="hidden" name="paciente_nuevo" value="<?php echo $this->form_encode_input($paciente_nuevo) . "\">" . $paciente_nuevo_look . ""; ?>
<?php } else { ?>

<?php

$paciente_nuevo_look = "";
 if ($this->paciente_nuevo == "1") { $paciente_nuevo_look .= "" ;} 
 if (empty($paciente_nuevo_look)) { $paciente_nuevo_look = $this->paciente_nuevo; }
?>
<span id="id_read_on_paciente_nuevo" class="css_paciente_nuevo_line" style="<?php echo $sStyleReadLab_paciente_nuevo; ?>"><?php echo $this->form_format_readonly("paciente_nuevo", $this->form_encode_input($paciente_nuevo_look)); ?></span><span id="id_read_off_paciente_nuevo" class="css_read_off_paciente_nuevo css_paciente_nuevo_line" style="<?php echo $sStyleReadInp_paciente_nuevo; ?>"><?php echo "<div id=\"idAjaxCheckbox_paciente_nuevo\" style=\"display: inline-block\" class=\"css_paciente_nuevo_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_paciente_nuevo_line"><?php $tempOptionId = "id-opt-paciente_nuevo" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-paciente_nuevo sc-ui-checkbox-paciente_nuevo" name="paciente_nuevo[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_paciente_nuevo'][] = '1'; ?>
<?php  if (in_array("1", $this->paciente_nuevo_1))  { echo " checked" ;} ?> onClick="do_ajax_calendar_cita_event_paciente_nuevo_onclick();" ><span></span>
<label for="<?php echo $tempOptionId ?>"></label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_paciente_nuevo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_paciente_nuevo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['cittipo']))
   {
       $this->nm_new_label['cittipo'] = "TIPO";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cittipo = $this->cittipo;
   $sStyleHidden_cittipo = '';
   if (isset($this->nmgp_cmp_hidden['cittipo']) && $this->nmgp_cmp_hidden['cittipo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cittipo']);
       $sStyleHidden_cittipo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cittipo = 'display: none;';
   $sStyleReadInp_cittipo = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cittipo"]) &&  $this->nmgp_cmp_readonly["cittipo"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cittipo']);
       $sStyleReadLab_cittipo = '';
       $sStyleReadInp_cittipo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cittipo']) && $this->nmgp_cmp_hidden['cittipo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="cittipo" value="<?php echo $this->form_encode_input($this->cittipo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cittipo_line" id="hidden_field_data_cittipo" style="<?php echo $sStyleHidden_cittipo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cittipo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cittipo_label" style=""><span id="id_label_cittipo"><?php echo $this->nm_new_label['cittipo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['php_cmp_required']['cittipo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['php_cmp_required']['cittipo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["cittipo"]) &&  $this->nmgp_cmp_readonly["cittipo"] == "on")) { 

$cittipo_look = "";
 if ($this->cittipo == "D") { $cittipo_look .= "DIAGNÓSTICO" ;} 
 if ($this->cittipo == "P") { $cittipo_look .= "PROGRAMADO" ;} 
 if ($this->cittipo == "C") { $cittipo_look .= "CONTROL" ;} 
 if (empty($cittipo_look)) { $cittipo_look = $this->cittipo; }
?>
<input type="hidden" name="cittipo" value="<?php echo $this->form_encode_input($cittipo) . "\"><span id=\"id_ajax_label_cittipo\">" . $cittipo_look . "</span>"; ?>
<?php } else { ?>
<?php

$cittipo_look = "";
 if ($this->cittipo == "D") { $cittipo_look .= "DIAGNÓSTICO" ;} 
 if ($this->cittipo == "P") { $cittipo_look .= "PROGRAMADO" ;} 
 if ($this->cittipo == "C") { $cittipo_look .= "CONTROL" ;} 
 if (empty($cittipo_look)) { $cittipo_look = $this->cittipo; }
?>
<span id="id_read_on_cittipo" class="css_cittipo_line"  style="<?php echo $sStyleReadLab_cittipo; ?>"><?php echo $this->form_format_readonly("cittipo", $this->form_encode_input($cittipo_look)); ?></span><span id="id_read_off_cittipo" class="css_read_off_cittipo" style="white-space: nowrap; <?php echo $sStyleReadInp_cittipo; ?>">
 <span id="idAjaxSelect_cittipo"><select class="sc-js-input scFormObjectOdd css_cittipo_obj" style="" id="id_sc_field_cittipo" name="cittipo" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_cittipo'][] = ''; ?>
 <option value="">------------------------</option>
 <option  value="D" <?php  if ($this->cittipo == "D") { echo " selected" ;} ?>>DIAGNÓSTICO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_cittipo'][] = 'D'; ?>
 <option  value="P" <?php  if ($this->cittipo == "P") { echo " selected" ;} ?>>PROGRAMADO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_cittipo'][] = 'P'; ?>
 <option  value="C" <?php  if ($this->cittipo == "C") { echo " selected" ;} ?>>CONTROL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_cittipo'][] = 'C'; ?>
 </select></span>
</span><?php  }?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_cittipo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cittipo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['label_ficha']))
    {
        $this->nm_new_label['label_ficha'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $label_ficha = $this->label_ficha;
   $sStyleHidden_label_ficha = '';
   if (isset($this->nmgp_cmp_hidden['label_ficha']) && $this->nmgp_cmp_hidden['label_ficha'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['label_ficha']);
       $sStyleHidden_label_ficha = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_label_ficha = 'display: none;';
   $sStyleReadInp_label_ficha = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['label_ficha']) && $this->nmgp_cmp_readonly['label_ficha'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['label_ficha']);
       $sStyleReadLab_label_ficha = '';
       $sStyleReadInp_label_ficha = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['label_ficha']) && $this->nmgp_cmp_hidden['label_ficha'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="label_ficha" value="<?php echo $this->form_encode_input($label_ficha) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_label_ficha_line" id="hidden_field_data_label_ficha" style="<?php echo $sStyleHidden_label_ficha; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_label_ficha_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_label_ficha_label" style=""><span id="id_label_label_ficha"><?php echo $this->nm_new_label['label_ficha']; ?></span></span><br><span id="id_ajax_label_label_ficha"><?php echo $label_ficha?></span>
<input type="hidden" name="label_ficha" value="<?php echo $this->form_encode_input($label_ficha); ?>">
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_label_ficha_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_label_ficha_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['ficha_cliente']))
    {
        $this->nm_new_label['ficha_cliente'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ficha_cliente = $this->ficha_cliente;
   $sStyleHidden_ficha_cliente = '';
   if (isset($this->nmgp_cmp_hidden['ficha_cliente']) && $this->nmgp_cmp_hidden['ficha_cliente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ficha_cliente']);
       $sStyleHidden_ficha_cliente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ficha_cliente = 'display: none;';
   $sStyleReadInp_ficha_cliente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ficha_cliente']) && $this->nmgp_cmp_readonly['ficha_cliente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ficha_cliente']);
       $sStyleReadLab_ficha_cliente = '';
       $sStyleReadInp_ficha_cliente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ficha_cliente']) && $this->nmgp_cmp_hidden['ficha_cliente'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ficha_cliente" value="<?php echo $this->form_encode_input($ficha_cliente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ficha_cliente_line" id="hidden_field_data_ficha_cliente" style="<?php echo $sStyleHidden_ficha_cliente; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ficha_cliente_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ficha_cliente_label" style=""><span id="id_label_ficha_cliente"><?php echo $this->nm_new_label['ficha_cliente']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__folder_blue_32.png"))
          { 
              $ficha_cliente = "&nbsp;" ;  
          } 
          else 
          { 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__folder_blue_32.png";
                  $ficha_cliente = "<img border=\"0\" src=\"scriptcase__NM__ico__NM__folder_blue_32.png\"/>" ; 
              }
              else {
                  $ficha_cliente = "<img border=\"0\" src=\"" . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__folder_blue_32.png\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_ficha_cliente"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_form_ficha_cliente_edit . "', '$this->nm_location', 'fclnumero*scin" . $this->nmgp_dados_form['fclnumero'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scoutsc_redir_atualiz*scinok*scoutsc_redir_insert*scinok*scout', '', '_blank', '0', '0', 'form_ficha_cliente')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $ficha_cliente ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ficha_cliente"]) &&  $this->nmgp_cmp_readonly["ficha_cliente"] == "on") { 

 ?>
<input type="hidden" name="ficha_cliente" value="<?php echo $this->form_encode_input($ficha_cliente) . "\">" . $ficha_cliente . ""; ?>
<?php } else { ?>
<span id="id_read_on_ficha_cliente" class="sc-ui-readonly-ficha_cliente css_ficha_cliente_line" style="<?php echo $sStyleReadLab_ficha_cliente; ?>"><?php echo $this->form_format_readonly("ficha_cliente", $this->form_encode_input($this->ficha_cliente)); ?></span><span id="id_read_off_ficha_cliente" class="css_read_off_ficha_cliente" style="white-space: nowrap;<?php echo $sStyleReadInp_ficha_cliente; ?>"></span><?php } ?>
<span class="scFormPopupBubble" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">Abrir ficha del paciente</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">Abrir ficha del paciente</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_ficha_cliente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ficha_cliente_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['editar_cita']))
    {
        $this->nm_new_label['editar_cita'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $editar_cita = $this->editar_cita;
   $sStyleHidden_editar_cita = '';
   if (isset($this->nmgp_cmp_hidden['editar_cita']) && $this->nmgp_cmp_hidden['editar_cita'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['editar_cita']);
       $sStyleHidden_editar_cita = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_editar_cita = 'display: none;';
   $sStyleReadInp_editar_cita = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['editar_cita']) && $this->nmgp_cmp_readonly['editar_cita'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['editar_cita']);
       $sStyleReadLab_editar_cita = '';
       $sStyleReadInp_editar_cita = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['editar_cita']) && $this->nmgp_cmp_hidden['editar_cita'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="editar_cita" value="<?php echo $this->form_encode_input($editar_cita) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_editar_cita_line" id="hidden_field_data_editar_cita" style="<?php echo $sStyleHidden_editar_cita; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_editar_cita_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_editar_cita_label" style=""><span id="id_label_editar_cita"><?php echo $this->nm_new_label['editar_cita']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__console_network_32.png"))
          { 
              $editar_cita = "&nbsp;" ;  
          } 
          else 
          { 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__console_network_32.png";
                  $editar_cita = "<img border=\"0\" src=\"scriptcase__NM__ico__NM__console_network_32.png\"/>" ; 
              }
              else {
                  $editar_cita = "<img border=\"0\" src=\"" . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__console_network_32.png\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_editar_cita"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_form_cita_edit . "', '$this->nm_location', 'citid*scin" . $this->nmgp_dados_form['citid'] . "*scoutvar_docum*scin" . $this->nmgp_dados_form['info_documento_2'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout', '', '_self', '0', '0', 'form_cita')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $editar_cita ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["editar_cita"]) &&  $this->nmgp_cmp_readonly["editar_cita"] == "on") { 

 ?>
<input type="hidden" name="editar_cita" value="<?php echo $this->form_encode_input($editar_cita) . "\">" . $editar_cita . ""; ?>
<?php } else { ?>
<span id="id_read_on_editar_cita" class="sc-ui-readonly-editar_cita css_editar_cita_line" style="<?php echo $sStyleReadLab_editar_cita; ?>"><?php echo $this->form_format_readonly("editar_cita", $this->form_encode_input($this->editar_cita)); ?></span><span id="id_read_off_editar_cita" class="css_read_off_editar_cita" style="white-space: nowrap;<?php echo $sStyleReadInp_editar_cita; ?>"></span><?php } ?>
<span class="scFormPopupBubble" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">Procesar Cita</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">Procesar Cita</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_editar_cita_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_editar_cita_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_fclnumero_dumb = ('' == $sStyleHidden_fclnumero) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fclnumero_dumb" style="<?php echo $sStyleHidden_fclnumero_dumb; ?>"></TD>
<?php $sStyleHidden_paciente_nuevo_dumb = ('' == $sStyleHidden_paciente_nuevo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_paciente_nuevo_dumb" style="<?php echo $sStyleHidden_paciente_nuevo_dumb; ?>"></TD>
<?php $sStyleHidden_cittipo_dumb = ('' == $sStyleHidden_cittipo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cittipo_dumb" style="<?php echo $sStyleHidden_cittipo_dumb; ?>"></TD>
<?php $sStyleHidden_label_ficha_dumb = ('' == $sStyleHidden_label_ficha) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_label_ficha_dumb" style="<?php echo $sStyleHidden_label_ficha_dumb; ?>"></TD>
<?php $sStyleHidden_ficha_cliente_dumb = ('' == $sStyleHidden_ficha_cliente) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_ficha_cliente_dumb" style="<?php echo $sStyleHidden_ficha_cliente_dumb; ?>"></TD>
<?php $sStyleHidden_editar_cita_dumb = ('' == $sStyleHidden_editar_cita) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_editar_cita_dumb" style="<?php echo $sStyleHidden_editar_cita_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['citcolor']))
    {
        $this->nm_new_label['citcolor'] = "Citcolor";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $citcolor = $this->citcolor;
   if (!isset($this->nmgp_cmp_hidden['citcolor']))
   {
       $this->nmgp_cmp_hidden['citcolor'] = 'off';
   }
   $sStyleHidden_citcolor = '';
   if (isset($this->nmgp_cmp_hidden['citcolor']) && $this->nmgp_cmp_hidden['citcolor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['citcolor']);
       $sStyleHidden_citcolor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_citcolor = 'display: none;';
   $sStyleReadInp_citcolor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['citcolor']) && $this->nmgp_cmp_readonly['citcolor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['citcolor']);
       $sStyleReadLab_citcolor = '';
       $sStyleReadInp_citcolor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['citcolor']) && $this->nmgp_cmp_hidden['citcolor'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="citcolor" value="<?php echo $this->form_encode_input($citcolor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_citcolor_line" id="hidden_field_data_citcolor" style="<?php echo $sStyleHidden_citcolor; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_citcolor_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_citcolor_label" style=""><span id="id_label_citcolor"><?php echo $this->nm_new_label['citcolor']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["citcolor"]) &&  $this->nmgp_cmp_readonly["citcolor"] == "on") { 

 ?>
<input type="hidden" name="citcolor" value="<?php echo $this->form_encode_input($citcolor) . "\">" . $citcolor . ""; ?>
<?php } else { ?>
<span id="id_read_on_citcolor" class="sc-ui-readonly-citcolor css_citcolor_line" style="<?php echo $sStyleReadLab_citcolor; ?>"><?php echo $this->form_format_readonly("citcolor", $this->form_encode_input($this->citcolor)); ?></span><span id="id_read_off_citcolor" class="css_read_off_citcolor" style="white-space: nowrap;<?php echo $sStyleReadInp_citcolor; ?>">
 <input class="sc-js-input scFormObjectOdd css_citcolor_obj" style="" id="id_sc_field_citcolor" type=text name="citcolor" value="<?php echo $this->form_encode_input($citcolor) ?>"
 size=7 maxlength=7 alt="{datatype: 'text', maxLength: 7, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_citcolor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_citcolor_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="5" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
<?php $sStyleHidden_citcolor_dumb = ('' == $sStyleHidden_citcolor) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_citcolor_dumb" style="<?php echo $sStyleHidden_citcolor_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_3"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['nombre_presupuesto']))
           {
               $this->nmgp_cmp_readonly['nombre_presupuesto'] = 'on';
           }
?>


   <?php
   if (!isset($this->nm_new_label['prenumero']))
   {
       $this->nm_new_label['prenumero'] = "PRESUPUESTO";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $prenumero = $this->prenumero;
   $sStyleHidden_prenumero = '';
   if (isset($this->nmgp_cmp_hidden['prenumero']) && $this->nmgp_cmp_hidden['prenumero'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['prenumero']);
       $sStyleHidden_prenumero = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_prenumero = 'display: none;';
   $sStyleReadInp_prenumero = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['prenumero']) && $this->nmgp_cmp_readonly['prenumero'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['prenumero']);
       $sStyleReadLab_prenumero = '';
       $sStyleReadInp_prenumero = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['prenumero']) && $this->nmgp_cmp_hidden['prenumero'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="prenumero" value="<?php echo $this->form_encode_input($this->prenumero) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_prenumero_line" id="hidden_field_data_prenumero" style="<?php echo $sStyleHidden_prenumero; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_prenumero_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_prenumero_label" style=""><span id="id_label_prenumero"><?php echo $this->nm_new_label['prenumero']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["prenumero"]) &&  $this->nmgp_cmp_readonly["prenumero"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_prenumero']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_prenumero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_prenumero']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_prenumero'] = array(); 
}
if ($this->fclnumero != "")
{ 
   $this->nm_clear_val("fclnumero");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_prenumero']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_prenumero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_prenumero']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_prenumero'] = array(); 
    }

   $old_value_citid = $this->citid;
   $old_value_citfecha = $this->citfecha;
   $old_value_cithoraini = $this->cithoraini;
   $old_value_citduracion = $this->citduracion;
   $old_value_cithorafin = $this->cithorafin;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_citid = $this->citid;
   $unformatted_value_citfecha = $this->citfecha;
   $unformatted_value_cithoraini = $this->cithoraini;
   $unformatted_value_citduracion = $this->citduracion;
   $unformatted_value_cithorafin = $this->cithorafin;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT prenumero, prenumero + ' - ' + prenombre  FROM presupuesto  WHERE fclnumero=$this->fclnumero AND preestado<>'T' ORDER BY prenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT prenumero, concat(prenumero,' - ',prenombre)  FROM presupuesto  WHERE fclnumero=$this->fclnumero AND preestado<>'T' ORDER BY prenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT prenumero, prenumero&' - '&prenombre  FROM presupuesto  WHERE fclnumero=$this->fclnumero AND preestado<>'T' ORDER BY prenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT prenumero, prenumero||' - '||prenombre  FROM presupuesto  WHERE fclnumero=$this->fclnumero AND preestado<>'T' ORDER BY prenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT prenumero, convert(char,prenumero) + ' - ' + prenombre  FROM presupuesto  WHERE fclnumero=$this->fclnumero AND preestado<>'T' ORDER BY prenombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT prenumero, char(prenumero)||' - '||prenombre  FROM presupuesto  WHERE fclnumero=$this->fclnumero AND preestado<>'T' ORDER BY prenombre";
   }
   else
   {
       $nm_comando = "SELECT prenumero, prenumero||' - '||prenombre  FROM presupuesto  WHERE fclnumero=$this->fclnumero AND preestado<>'T' ORDER BY prenombre";
   }

   $this->citid = $old_value_citid;
   $this->citfecha = $old_value_citfecha;
   $this->cithoraini = $old_value_cithoraini;
   $this->citduracion = $old_value_citduracion;
   $this->cithorafin = $old_value_cithorafin;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_prenumero'][] = $rs->fields[0];
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
} 
   $x = 0; 
   $prenumero_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->prenumero_1))
          {
              foreach ($this->prenumero_1 as $tmp_prenumero)
              {
                  if (trim($tmp_prenumero) === trim($cadaselect[1])) { $prenumero_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->prenumero) === trim($cadaselect[1])) { $prenumero_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="prenumero" value="<?php echo $this->form_encode_input($prenumero) . "\">" . $prenumero_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_prenumero();
   $x = 0 ; 
   $prenumero_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->prenumero_1))
          {
              foreach ($this->prenumero_1 as $tmp_prenumero)
              {
                  if (trim($tmp_prenumero) === trim($cadaselect[1])) { $prenumero_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->prenumero) === trim($cadaselect[1])) { $prenumero_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($prenumero_look))
          {
              $prenumero_look = $this->prenumero;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_prenumero\" class=\"css_prenumero_line\" style=\"" .  $sStyleReadLab_prenumero . "\">" . $this->form_format_readonly("prenumero", $this->form_encode_input($prenumero_look)) . "</span><span id=\"id_read_off_prenumero\" class=\"css_read_off_prenumero\" style=\"white-space: nowrap; " . $sStyleReadInp_prenumero . "\">";
   echo " <span id=\"idAjaxSelect_prenumero\"><select class=\"sc-js-input scFormObjectOdd css_prenumero_obj\" style=\"\" id=\"id_sc_field_prenumero\" name=\"prenumero\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_prenumero'][] = 'null'; 
   echo "  <option value=\"null\">" . str_replace("<", "&lt;","------------------------") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->prenumero) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->prenumero)) 
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
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_prenumero_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_prenumero_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['nombre_presupuesto']))
    {
        $this->nm_new_label['nombre_presupuesto'] = "PRESUPUESTO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombre_presupuesto = $this->nombre_presupuesto;
   $sStyleHidden_nombre_presupuesto = '';
   if (isset($this->nmgp_cmp_hidden['nombre_presupuesto']) && $this->nmgp_cmp_hidden['nombre_presupuesto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombre_presupuesto']);
       $sStyleHidden_nombre_presupuesto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombre_presupuesto = 'display: none;';
   $sStyleReadInp_nombre_presupuesto = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["nombre_presupuesto"]) &&  $this->nmgp_cmp_readonly["nombre_presupuesto"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombre_presupuesto']);
       $sStyleReadLab_nombre_presupuesto = '';
       $sStyleReadInp_nombre_presupuesto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombre_presupuesto']) && $this->nmgp_cmp_hidden['nombre_presupuesto'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre_presupuesto" value="<?php echo $this->form_encode_input($nombre_presupuesto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nombre_presupuesto_line" id="hidden_field_data_nombre_presupuesto" style="<?php echo $sStyleHidden_nombre_presupuesto; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombre_presupuesto_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nombre_presupuesto_label" style=""><span id="id_label_nombre_presupuesto"><?php echo $this->nm_new_label['nombre_presupuesto']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["nombre_presupuesto"]) &&  $this->nmgp_cmp_readonly["nombre_presupuesto"] == "on")) { 

 ?>
<input type="hidden" name="nombre_presupuesto" value="<?php echo $this->form_encode_input($nombre_presupuesto) . "\"><span id=\"id_ajax_label_nombre_presupuesto\">" . $nombre_presupuesto . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_nombre_presupuesto" class="sc-ui-readonly-nombre_presupuesto css_nombre_presupuesto_line" style="<?php echo $sStyleReadLab_nombre_presupuesto; ?>"><?php echo $this->form_format_readonly("nombre_presupuesto", $this->form_encode_input($this->nombre_presupuesto)); ?></span><span id="id_read_off_nombre_presupuesto" class="css_read_off_nombre_presupuesto" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre_presupuesto; ?>">
 <input class="sc-js-input scFormObjectOdd css_nombre_presupuesto_obj" style="" id="id_sc_field_nombre_presupuesto" type=text name="nombre_presupuesto" value="<?php echo $this->form_encode_input($nombre_presupuesto) ?>"
 size=10 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_nombre_presupuesto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre_presupuesto_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['editar_presup']))
    {
        $this->nm_new_label['editar_presup'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $editar_presup = $this->editar_presup;
   $sStyleHidden_editar_presup = '';
   if (isset($this->nmgp_cmp_hidden['editar_presup']) && $this->nmgp_cmp_hidden['editar_presup'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['editar_presup']);
       $sStyleHidden_editar_presup = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_editar_presup = 'display: none;';
   $sStyleReadInp_editar_presup = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['editar_presup']) && $this->nmgp_cmp_readonly['editar_presup'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['editar_presup']);
       $sStyleReadLab_editar_presup = '';
       $sStyleReadInp_editar_presup = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['editar_presup']) && $this->nmgp_cmp_hidden['editar_presup'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="editar_presup" value="<?php echo $this->form_encode_input($editar_presup) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_editar_presup_line" id="hidden_field_data_editar_presup" style="<?php echo $sStyleHidden_editar_presup; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_editar_presup_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_editar_presup_label" style=""><span id="id_label_editar_presup"><?php echo $this->nm_new_label['editar_presup']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__notebook_edit_32.png"))
          { 
              $editar_presup = "&nbsp;" ;  
          } 
          else 
          { 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__notebook_edit_32.png";
                  $editar_presup = "<img border=\"0\" src=\"scriptcase__NM__ico__NM__notebook_edit_32.png\"/>" ; 
              }
              else {
                  $editar_presup = "<img border=\"0\" src=\"" . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__notebook_edit_32.png\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_editar_presup"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_form_presupuesto_edit . "', '$this->nm_location', 'prenumero*scin" . $this->nmgp_dados_form['prenumero'] . "*scoutv_selected_cli*scin" . $this->nmgp_dados_form['fclnumero'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scoutsc_redir_atualiz*scinok*scoutsc_redir_insert*scinok*scout', '', '_blank', '0', '0', 'form_presupuesto')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $editar_presup ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["editar_presup"]) &&  $this->nmgp_cmp_readonly["editar_presup"] == "on") { 

 ?>
<input type="hidden" name="editar_presup" value="<?php echo $this->form_encode_input($editar_presup) . "\">" . $editar_presup . ""; ?>
<?php } else { ?>
<span id="id_read_on_editar_presup" class="sc-ui-readonly-editar_presup css_editar_presup_line" style="<?php echo $sStyleReadLab_editar_presup; ?>"><?php echo $this->form_format_readonly("editar_presup", $this->form_encode_input($this->editar_presup)); ?></span><span id="id_read_off_editar_presup" class="css_read_off_editar_presup" style="white-space: nowrap;<?php echo $sStyleReadInp_editar_presup; ?>"></span><?php } ?>
<span class="scFormPopupBubble" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">Editar presupuesto</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">Editar presupuesto</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_editar_presup_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_editar_presup_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['info_documento_2']))
    {
        $this->nm_new_label['info_documento_2'] = "info_documento_2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $info_documento_2 = $this->info_documento_2;
   if (!isset($this->nmgp_cmp_hidden['info_documento_2']))
   {
       $this->nmgp_cmp_hidden['info_documento_2'] = 'off';
   }
   $sStyleHidden_info_documento_2 = '';
   if (isset($this->nmgp_cmp_hidden['info_documento_2']) && $this->nmgp_cmp_hidden['info_documento_2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['info_documento_2']);
       $sStyleHidden_info_documento_2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_info_documento_2 = 'display: none;';
   $sStyleReadInp_info_documento_2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['info_documento_2']) && $this->nmgp_cmp_readonly['info_documento_2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['info_documento_2']);
       $sStyleReadLab_info_documento_2 = '';
       $sStyleReadInp_info_documento_2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['info_documento_2']) && $this->nmgp_cmp_hidden['info_documento_2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="info_documento_2" value="<?php echo $this->form_encode_input($info_documento_2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_info_documento_2_line" id="hidden_field_data_info_documento_2" style="<?php echo $sStyleHidden_info_documento_2; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_info_documento_2_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_info_documento_2_label" style=""><span id="id_label_info_documento_2"><?php echo $this->nm_new_label['info_documento_2']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["info_documento_2"]) &&  $this->nmgp_cmp_readonly["info_documento_2"] == "on") { 

 ?>
<input type="hidden" name="info_documento_2" value="<?php echo $this->form_encode_input($info_documento_2) . "\">" . $info_documento_2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_info_documento_2" class="sc-ui-readonly-info_documento_2 css_info_documento_2_line" style="<?php echo $sStyleReadLab_info_documento_2; ?>"><?php echo $this->form_format_readonly("info_documento_2", $this->form_encode_input($this->info_documento_2)); ?></span><span id="id_read_off_info_documento_2" class="css_read_off_info_documento_2" style="white-space: nowrap;<?php echo $sStyleReadInp_info_documento_2; ?>">
 <input class="sc-js-input scFormObjectOdd css_info_documento_2_obj" style="" id="id_sc_field_info_documento_2" type=text name="info_documento_2" value="<?php echo $this->form_encode_input($info_documento_2) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_info_documento_2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_info_documento_2_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_prenumero_dumb = ('' == $sStyleHidden_prenumero) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_prenumero_dumb" style="<?php echo $sStyleHidden_prenumero_dumb; ?>"></TD>
<?php $sStyleHidden_nombre_presupuesto_dumb = ('' == $sStyleHidden_nombre_presupuesto) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_nombre_presupuesto_dumb" style="<?php echo $sStyleHidden_nombre_presupuesto_dumb; ?>"></TD>
<?php $sStyleHidden_editar_presup_dumb = ('' == $sStyleHidden_editar_presup) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_editar_presup_dumb" style="<?php echo $sStyleHidden_editar_presup_dumb; ?>"></TD>
<?php $sStyleHidden_info_documento_2_dumb = ('' == $sStyleHidden_info_documento_2) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_info_documento_2_dumb" style="<?php echo $sStyleHidden_info_documento_2_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_4"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_4" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['citobserv']))
    {
        $this->nm_new_label['citobserv'] = "OBSERVACIONES";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $citobserv = $this->citobserv;
   $sStyleHidden_citobserv = '';
   if (isset($this->nmgp_cmp_hidden['citobserv']) && $this->nmgp_cmp_hidden['citobserv'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['citobserv']);
       $sStyleHidden_citobserv = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_citobserv = 'display: none;';
   $sStyleReadInp_citobserv = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['citobserv']) && $this->nmgp_cmp_readonly['citobserv'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['citobserv']);
       $sStyleReadLab_citobserv = '';
       $sStyleReadInp_citobserv = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['citobserv']) && $this->nmgp_cmp_hidden['citobserv'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="citobserv" value="<?php echo $this->form_encode_input($citobserv) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_citobserv_line" id="hidden_field_data_citobserv" style="<?php echo $sStyleHidden_citobserv; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_citobserv_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_citobserv_label" style=""><span id="id_label_citobserv"><?php echo $this->nm_new_label['citobserv']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["citobserv"]) &&  $this->nmgp_cmp_readonly["citobserv"] == "on") { 

 ?>
<input type="hidden" name="citobserv" value="<?php echo $this->form_encode_input($citobserv) . "\">" . $citobserv . ""; ?>
<?php } else { ?>
<span id="id_read_on_citobserv" class="sc-ui-readonly-citobserv css_citobserv_line" style="<?php echo $sStyleReadLab_citobserv; ?>"><?php echo $this->form_format_readonly("citobserv", $this->form_encode_input($this->citobserv)); ?></span><span id="id_read_off_citobserv" class="css_read_off_citobserv" style="white-space: nowrap;<?php echo $sStyleReadInp_citobserv; ?>">
 <input class="sc-js-input scFormObjectOdd css_citobserv_obj" style="" id="id_sc_field_citobserv" type=text name="citobserv" value="<?php echo $this->form_encode_input($citobserv) ?>"
 size=70 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_citobserv_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_citobserv_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['cancelar_cita']))
   {
       $this->nm_new_label['cancelar_cita'] = "CANCELAR CITA";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cancelar_cita = $this->cancelar_cita;
   $sStyleHidden_cancelar_cita = '';
   if (isset($this->nmgp_cmp_hidden['cancelar_cita']) && $this->nmgp_cmp_hidden['cancelar_cita'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cancelar_cita']);
       $sStyleHidden_cancelar_cita = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cancelar_cita = 'display: none;';
   $sStyleReadInp_cancelar_cita = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cancelar_cita']) && $this->nmgp_cmp_readonly['cancelar_cita'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cancelar_cita']);
       $sStyleReadLab_cancelar_cita = '';
       $sStyleReadInp_cancelar_cita = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cancelar_cita']) && $this->nmgp_cmp_hidden['cancelar_cita'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="cancelar_cita" value="<?php echo $this->form_encode_input($this->cancelar_cita) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cancelar_cita_line" id="hidden_field_data_cancelar_cita" style="<?php echo $sStyleHidden_cancelar_cita; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cancelar_cita_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cancelar_cita_label" style=""><span id="id_label_cancelar_cita"><?php echo $this->nm_new_label['cancelar_cita']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cancelar_cita"]) &&  $this->nmgp_cmp_readonly["cancelar_cita"] == "on") { 

$cancelar_cita_look = "";
 if ($this->cancelar_cita == "CLIN") { $cancelar_cita_look .= "CANCELA CLÍNICA" ;} 
 if ($this->cancelar_cita == "CLIE") { $cancelar_cita_look .= "CANCELA PACIENTE" ;} 
 if (empty($cancelar_cita_look)) { $cancelar_cita_look = $this->cancelar_cita; }
?>
<input type="hidden" name="cancelar_cita" value="<?php echo $this->form_encode_input($cancelar_cita) . "\">" . $cancelar_cita_look . ""; ?>
<?php } else { ?>
<?php

$cancelar_cita_look = "";
 if ($this->cancelar_cita == "CLIN") { $cancelar_cita_look .= "CANCELA CLÍNICA" ;} 
 if ($this->cancelar_cita == "CLIE") { $cancelar_cita_look .= "CANCELA PACIENTE" ;} 
 if (empty($cancelar_cita_look)) { $cancelar_cita_look = $this->cancelar_cita; }
?>
<span id="id_read_on_cancelar_cita" class="css_cancelar_cita_line"  style="<?php echo $sStyleReadLab_cancelar_cita; ?>"><?php echo $this->form_format_readonly("cancelar_cita", $this->form_encode_input($cancelar_cita_look)); ?></span><span id="id_read_off_cancelar_cita" class="css_read_off_cancelar_cita" style="white-space: nowrap; <?php echo $sStyleReadInp_cancelar_cita; ?>">
 <span id="idAjaxSelect_cancelar_cita"><select class="sc-js-input scFormObjectOdd css_cancelar_cita_obj" style="" id="id_sc_field_cancelar_cita" name="cancelar_cita" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_cancelar_cita'][] = ''; ?>
 <option value="">------------------------</option>
 <option  value="CLIN" <?php  if ($this->cancelar_cita == "CLIN") { echo " selected" ;} ?>>CANCELA CLÍNICA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_cancelar_cita'][] = 'CLIN'; ?>
 <option  value="CLIE" <?php  if ($this->cancelar_cita == "CLIE") { echo " selected" ;} ?>>CANCELA PACIENTE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['Lookup_cancelar_cita'][] = 'CLIE'; ?>
 </select></span>
</span><?php  }?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_cancelar_cita_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cancelar_cita_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + S)", "sc-unique-btn-3", "", "");?>
 
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
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (F1)", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['run_iframe'] != "R")
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
   function scModalCapture(sUrl)
   {
<?php
   $Parent = ($this->Embutida_call) ? 'parent.' : '';
?>
    <?php echo $Parent ?>tb_show('', sUrl, '');
   }
  </script>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3,4);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("calendar_cita");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("calendar_cita");
 parent.scAjaxDetailHeight("calendar_cita", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("calendar_cita", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("calendar_cita", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['sc_modal'])
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
		if ($("#sc_b_new_b.sc-unique-btn-1").length && $("#sc_b_new_b.sc-unique-btn-1").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_b.sc-unique-btn-2").length && $("#sc_b_ins_b.sc-unique-btn-2").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_b.sc-unique-btn-3").length && $("#sc_b_upd_b.sc-unique-btn-3").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_b").length && $("#sc_b_hlp_b").is(":visible")) {
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_b.sc-unique-btn-4").length && $("#sc_b_sai_b.sc-unique-btn-4").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_b.sc-unique-btn-5").length && $("#sc_b_sai_b.sc-unique-btn-5").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_b.sc-unique-btn-6").length && $("#sc_b_sai_b.sc-unique-btn-6").is(":visible")) {
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
$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_cita']['buttonStatus'] = $this->nmgp_botoes;
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
