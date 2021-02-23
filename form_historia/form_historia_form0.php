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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " historia"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " historia"); } ?></TITLE>
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
.css_read_off_hisfecha button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_hisfeccrea button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_hisfecmodi button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_historia/form_historia_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_historia_sajax_js.php");
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
     if (F_name == "medcodigo")
     {
        $('input[name="medcodigo_autocomp"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="medcodigo_autocomp"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="medcodigo_autocomp"]').removeClass("scFormInputDisabled");
        }
        $('input[id="medcodigo_autocomp_cap"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('#medcodigo_autocomp_cap').hide();
        }
        else {
            $('#medcodigo_autocomp_cap').show();
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('form_historia_jquery.php');

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
     do_ajax_form_historia_refresh_medcodigo(sRow);
     if ('function' == typeof do_ajax_form_historia_event_medcodigo_onchange) { do_ajax_form_historia_event_medcodigo_onchange(sRow); }
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
     url: "form_historia.php",
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
    do_ajax_form_historia_refresh_medcodigo(sRow);
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['recarga'];
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
 include_once("form_historia_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_historia'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_historia'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " historia"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " historia"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "R")
{
    $NM_btn = false;
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
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['fclnumero']))
   {
       $this->nmgp_cmp_hidden['fclnumero'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['hisedad']))
   {
       $this->nmgp_cmp_hidden['hisedad'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['hisfecha']))
           {
               $this->nmgp_cmp_readonly['hisfecha'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['cliente']))
    {
        $this->nm_new_label['cliente'] = "CLIENTE";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cliente = $this->cliente;
   $sStyleHidden_cliente = '';
   if (isset($this->nmgp_cmp_hidden['cliente']) && $this->nmgp_cmp_hidden['cliente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cliente']);
       $sStyleHidden_cliente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cliente = 'display: none;';
   $sStyleReadInp_cliente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cliente']) && $this->nmgp_cmp_readonly['cliente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cliente']);
       $sStyleReadLab_cliente = '';
       $sStyleReadInp_cliente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cliente']) && $this->nmgp_cmp_hidden['cliente'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cliente" value="<?php echo $this->form_encode_input($cliente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cliente_line" id="hidden_field_data_cliente" style="<?php echo $sStyleHidden_cliente; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cliente_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cliente_label" style=""><span id="id_label_cliente"><?php echo $this->nm_new_label['cliente']; ?></span></span><br><span id="id_ajax_label_cliente"><?php echo $cliente?></span>
<input type="hidden" name="cliente" value="<?php echo $this->form_encode_input($cliente); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cliente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cliente_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['edad']))
    {
        $this->nm_new_label['edad'] = "EDAD";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $edad = $this->edad;
   $sStyleHidden_edad = '';
   if (isset($this->nmgp_cmp_hidden['edad']) && $this->nmgp_cmp_hidden['edad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['edad']);
       $sStyleHidden_edad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_edad = 'display: none;';
   $sStyleReadInp_edad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['edad']) && $this->nmgp_cmp_readonly['edad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['edad']);
       $sStyleReadLab_edad = '';
       $sStyleReadInp_edad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['edad']) && $this->nmgp_cmp_hidden['edad'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="edad" value="<?php echo $this->form_encode_input($edad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_edad_line" id="hidden_field_data_edad" style="<?php echo $sStyleHidden_edad; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_edad_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_edad_label" style=""><span id="id_label_edad"><?php echo $this->nm_new_label['edad']; ?></span></span><br><span id="id_ajax_label_edad"><?php echo $edad?></span>
<input type="hidden" name="edad" value="<?php echo $this->form_encode_input($edad); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_edad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_edad_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_cliente_dumb = ('' == $sStyleHidden_cliente) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cliente_dumb" style="<?php echo $sStyleHidden_cliente_dumb; ?>"></TD>
<?php $sStyleHidden_edad_dumb = ('' == $sStyleHidden_edad) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_edad_dumb" style="<?php echo $sStyleHidden_edad_dumb; ?>"></TD>
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
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['medcodigo']))
           {
               $this->nmgp_cmp_readonly['medcodigo'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['espcodigo']))
           {
               $this->nmgp_cmp_readonly['espcodigo'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['fclnumero']))
           {
               $this->nmgp_cmp_readonly['fclnumero'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['hispeso']))
           {
               $this->nmgp_cmp_readonly['hispeso'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['hisfecha']))
    {
        $this->nm_new_label['hisfecha'] = "FECHA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hisfecha = $this->hisfecha;
   $sStyleHidden_hisfecha = '';
   if (isset($this->nmgp_cmp_hidden['hisfecha']) && $this->nmgp_cmp_hidden['hisfecha'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hisfecha']);
       $sStyleHidden_hisfecha = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hisfecha = 'display: none;';
   $sStyleReadInp_hisfecha = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["hisfecha"]) &&  $this->nmgp_cmp_readonly["hisfecha"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hisfecha']);
       $sStyleReadLab_hisfecha = '';
       $sStyleReadInp_hisfecha = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hisfecha']) && $this->nmgp_cmp_hidden['hisfecha'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hisfecha" value="<?php echo $this->form_encode_input($hisfecha) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_hisfecha_line" id="hidden_field_data_hisfecha" style="<?php echo $sStyleHidden_hisfecha; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hisfecha_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_hisfecha_label" style=""><span id="id_label_hisfecha"><?php echo $this->nm_new_label['hisfecha']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['php_cmp_required']['hisfecha']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['php_cmp_required']['hisfecha'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["hisfecha"]) &&  $this->nmgp_cmp_readonly["hisfecha"] == "on")) { 

 ?>
<input type="hidden" name="hisfecha" value="<?php echo $this->form_encode_input($hisfecha) . "\"><span id=\"id_ajax_label_hisfecha\">" . $hisfecha . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_hisfecha" class="sc-ui-readonly-hisfecha css_hisfecha_line" style="<?php echo $sStyleReadLab_hisfecha; ?>"><?php echo $this->form_format_readonly("hisfecha", $this->form_encode_input($hisfecha)); ?></span><span id="id_read_off_hisfecha" class="css_read_off_hisfecha" style="white-space: nowrap;<?php echo $sStyleReadInp_hisfecha; ?>"><?php
$tmp_form_data = $this->field_config['hisfecha']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_hisfecha_obj" style="" id="id_sc_field_hisfecha" type=text name="hisfecha" value="<?php echo $this->form_encode_input($hisfecha) ?>"
 size=8 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['hisfecha']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['hisfecha']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hisfecha_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hisfecha_text"></span></td></tr></table></td></tr></table> </TD>
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
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["medcodigo"]) &&  $this->nmgp_cmp_readonly["medcodigo"] == "on"))
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

    <TD class="scFormDataOdd css_medcodigo_line" id="hidden_field_data_medcodigo" style="<?php echo $sStyleHidden_medcodigo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_medcodigo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_medcodigo_label" style=""><span id="id_label_medcodigo"><?php echo $this->nm_new_label['medcodigo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['php_cmp_required']['medcodigo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['php_cmp_required']['medcodigo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["medcodigo"]) &&  $this->nmgp_cmp_readonly["medcodigo"] == "on")) { 

 ?>
<input type="hidden" name="medcodigo" value="<?php echo $this->form_encode_input($medcodigo) . "\"><span id=\"id_ajax_label_medcodigo\">" . $medcodigo . "</span>"; ?>
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['Lookup_medcodigo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['Lookup_medcodigo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['Lookup_medcodigo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['Lookup_medcodigo'] = array(); 
    }

   $old_value_hisfecha = $this->hisfecha;
   $old_value_fclnumero = $this->fclnumero;
   $old_value_hispeso = $this->hispeso;
   $old_value_hisaltura = $this->hisaltura;
   $old_value_histemperatura = $this->histemperatura;
   $old_value_hispulso = $this->hispulso;
   $old_value_hisfrecresp = $this->hisfrecresp;
   $old_value_hisedad = $this->hisedad;
   $old_value_hisfeccrea = $this->hisfeccrea;
   $old_value_hisfeccrea_hora = $this->hisfeccrea_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_hisfecha = $this->hisfecha;
   $unformatted_value_fclnumero = $this->fclnumero;
   $unformatted_value_hispeso = $this->hispeso;
   $unformatted_value_hisaltura = $this->hisaltura;
   $unformatted_value_histemperatura = $this->histemperatura;
   $unformatted_value_hispulso = $this->hispulso;
   $unformatted_value_hisfrecresp = $this->hisfrecresp;
   $unformatted_value_hisedad = $this->hisedad;
   $unformatted_value_hisfeccrea = $this->hisfeccrea;
   $unformatted_value_hisfeccrea_hora = $this->hisfeccrea_hora;

   $hisembaraz_val_str = "";
   if (!empty($this->hisembaraz))
   {
       if (is_array($this->hisembaraz))
       {
           $Tmp_array = $this->hisembaraz;
       }
       else
       {
           $Tmp_array = explode(";", $this->hisembaraz);
       }
       $hisembaraz_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $hisembaraz_val_str)
          {
             $hisembaraz_val_str .= ", ";
          }
          $hisembaraz_val_str .= $Tmp_val_cmp;
       }
   }
   $hisfumador_val_str = "";
   if (!empty($this->hisfumador))
   {
       if (is_array($this->hisfumador))
       {
           $Tmp_array = $this->hisfumador;
       }
       else
       {
           $Tmp_array = explode(";", $this->hisfumador);
       }
       $hisfumador_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $hisfumador_val_str)
          {
             $hisfumador_val_str .= ", ";
          }
          $hisfumador_val_str .= $Tmp_val_cmp;
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

   $this->hisfecha = $old_value_hisfecha;
   $this->fclnumero = $old_value_fclnumero;
   $this->hispeso = $old_value_hispeso;
   $this->hisaltura = $old_value_hisaltura;
   $this->histemperatura = $old_value_histemperatura;
   $this->hispulso = $old_value_hispulso;
   $this->hisfrecresp = $old_value_hisfrecresp;
   $this->hisedad = $old_value_hisedad;
   $this->hisfeccrea = $old_value_hisfeccrea;
   $this->hisfeccrea_hora = $old_value_hisfeccrea_hora;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['Lookup_medcodigo'][] = $rs->fields[0];
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['Lookup_medcodigo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['Lookup_medcodigo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['Lookup_medcodigo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['Lookup_medcodigo'] = array(); 
    }

   $old_value_hisfecha = $this->hisfecha;
   $old_value_fclnumero = $this->fclnumero;
   $old_value_hispeso = $this->hispeso;
   $old_value_hisaltura = $this->hisaltura;
   $old_value_histemperatura = $this->histemperatura;
   $old_value_hispulso = $this->hispulso;
   $old_value_hisfrecresp = $this->hisfrecresp;
   $old_value_hisedad = $this->hisedad;
   $old_value_hisfeccrea = $this->hisfeccrea;
   $old_value_hisfeccrea_hora = $this->hisfeccrea_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_hisfecha = $this->hisfecha;
   $unformatted_value_fclnumero = $this->fclnumero;
   $unformatted_value_hispeso = $this->hispeso;
   $unformatted_value_hisaltura = $this->hisaltura;
   $unformatted_value_histemperatura = $this->histemperatura;
   $unformatted_value_hispulso = $this->hispulso;
   $unformatted_value_hisfrecresp = $this->hisfrecresp;
   $unformatted_value_hisedad = $this->hisedad;
   $unformatted_value_hisfeccrea = $this->hisfeccrea;
   $unformatted_value_hisfeccrea_hora = $this->hisfeccrea_hora;

   $hisembaraz_val_str = "";
   if (!empty($this->hisembaraz))
   {
       if (is_array($this->hisembaraz))
       {
           $Tmp_array = $this->hisembaraz;
       }
       else
       {
           $Tmp_array = explode(";", $this->hisembaraz);
       }
       $hisembaraz_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $hisembaraz_val_str)
          {
             $hisembaraz_val_str .= ", ";
          }
          $hisembaraz_val_str .= $Tmp_val_cmp;
       }
   }
   $hisfumador_val_str = "";
   if (!empty($this->hisfumador))
   {
       if (is_array($this->hisfumador))
       {
           $Tmp_array = $this->hisfumador;
       }
       else
       {
           $Tmp_array = explode(";", $this->hisfumador);
       }
       $hisfumador_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $hisfumador_val_str)
          {
             $hisfumador_val_str .= ", ";
          }
          $hisfumador_val_str .= $Tmp_val_cmp;
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

   $this->hisfecha = $old_value_hisfecha;
   $this->fclnumero = $old_value_fclnumero;
   $this->hispeso = $old_value_hispeso;
   $this->hisaltura = $old_value_hisaltura;
   $this->histemperatura = $old_value_histemperatura;
   $this->hispulso = $old_value_hispulso;
   $this->hisfrecresp = $old_value_hisfrecresp;
   $this->hisedad = $old_value_hisedad;
   $this->hisfeccrea = $old_value_hisfeccrea;
   $this->hisfeccrea_hora = $old_value_hisfeccrea_hora;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['Lookup_medcodigo'][] = $rs->fields[0];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_medcodigo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_medcodigo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['espcodigo']))
   {
       $this->nm_new_label['espcodigo'] = "ESPECIALIDAD";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $espcodigo = $this->espcodigo;
   $sStyleHidden_espcodigo = '';
   if (isset($this->nmgp_cmp_hidden['espcodigo']) && $this->nmgp_cmp_hidden['espcodigo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['espcodigo']);
       $sStyleHidden_espcodigo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_espcodigo = 'display: none;';
   $sStyleReadInp_espcodigo = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["espcodigo"]) &&  $this->nmgp_cmp_readonly["espcodigo"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['espcodigo']);
       $sStyleReadLab_espcodigo = '';
       $sStyleReadInp_espcodigo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['espcodigo']) && $this->nmgp_cmp_hidden['espcodigo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="espcodigo" value="<?php echo $this->form_encode_input($this->espcodigo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_espcodigo_line" id="hidden_field_data_espcodigo" style="<?php echo $sStyleHidden_espcodigo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_espcodigo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_espcodigo_label" style=""><span id="id_label_espcodigo"><?php echo $this->nm_new_label['espcodigo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['php_cmp_required']['espcodigo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['php_cmp_required']['espcodigo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["espcodigo"]) &&  $this->nmgp_cmp_readonly["espcodigo"] == "on")) { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['Lookup_espcodigo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['Lookup_espcodigo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['Lookup_espcodigo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['Lookup_espcodigo'] = array(); 
}
if ($this->medcodigo != "")
{ 
   $this->nm_clear_val("medcodigo");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['Lookup_espcodigo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['Lookup_espcodigo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['Lookup_espcodigo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['Lookup_espcodigo'] = array(); 
    }

   $old_value_hisfecha = $this->hisfecha;
   $old_value_fclnumero = $this->fclnumero;
   $old_value_hispeso = $this->hispeso;
   $old_value_hisaltura = $this->hisaltura;
   $old_value_histemperatura = $this->histemperatura;
   $old_value_hispulso = $this->hispulso;
   $old_value_hisfrecresp = $this->hisfrecresp;
   $old_value_hisedad = $this->hisedad;
   $old_value_hisfeccrea = $this->hisfeccrea;
   $old_value_hisfeccrea_hora = $this->hisfeccrea_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_hisfecha = $this->hisfecha;
   $unformatted_value_fclnumero = $this->fclnumero;
   $unformatted_value_hispeso = $this->hispeso;
   $unformatted_value_hisaltura = $this->hisaltura;
   $unformatted_value_histemperatura = $this->histemperatura;
   $unformatted_value_hispulso = $this->hispulso;
   $unformatted_value_hisfrecresp = $this->hisfrecresp;
   $unformatted_value_hisedad = $this->hisedad;
   $unformatted_value_hisfeccrea = $this->hisfeccrea;
   $unformatted_value_hisfeccrea_hora = $this->hisfeccrea_hora;

   $nm_comando = "SELECT E.espcodigo, E.espnombre FROM especialidad E, medxesp M WHERE M.espcodigo=E.espcodigo AND M.medcodigo=$this->medcodigo ORDER BY E.espcodigo";

   $this->hisfecha = $old_value_hisfecha;
   $this->fclnumero = $old_value_fclnumero;
   $this->hispeso = $old_value_hispeso;
   $this->hisaltura = $old_value_hisaltura;
   $this->histemperatura = $old_value_histemperatura;
   $this->hispulso = $old_value_hispulso;
   $this->hisfrecresp = $old_value_hisfrecresp;
   $this->hisedad = $old_value_hisedad;
   $this->hisfeccrea = $old_value_hisfeccrea;
   $this->hisfeccrea_hora = $old_value_hisfeccrea_hora;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['Lookup_espcodigo'][] = $rs->fields[0];
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
   $espcodigo_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->espcodigo_1))
          {
              foreach ($this->espcodigo_1 as $tmp_espcodigo)
              {
                  if (trim($tmp_espcodigo) === trim($cadaselect[1])) { $espcodigo_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->espcodigo) === trim($cadaselect[1])) { $espcodigo_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="espcodigo" value="<?php echo $this->form_encode_input($espcodigo) . "\"><span id=\"id_ajax_label_espcodigo\">" . $espcodigo_look . "</span>"; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_espcodigo();
   $x = 0 ; 
   $espcodigo_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->espcodigo_1))
          {
              foreach ($this->espcodigo_1 as $tmp_espcodigo)
              {
                  if (trim($tmp_espcodigo) === trim($cadaselect[1])) { $espcodigo_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->espcodigo) === trim($cadaselect[1])) { $espcodigo_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($espcodigo_look))
          {
              $espcodigo_look = $this->espcodigo;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_espcodigo\" class=\"css_espcodigo_line\" style=\"" .  $sStyleReadLab_espcodigo . "\">" . $this->form_format_readonly("espcodigo", $this->form_encode_input($espcodigo_look)) . "</span><span id=\"id_read_off_espcodigo\" class=\"css_read_off_espcodigo\" style=\"white-space: nowrap; " . $sStyleReadInp_espcodigo . "\">";
   echo " <span id=\"idAjaxSelect_espcodigo\"><select class=\"sc-js-input scFormObjectOdd css_espcodigo_obj\" style=\"\" id=\"id_sc_field_espcodigo\" name=\"espcodigo\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['Lookup_espcodigo'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","------------------------") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->espcodigo) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->espcodigo)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_espcodigo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_espcodigo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fclnumero']))
    {
        $this->nm_new_label['fclnumero'] = "CLIENTE";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fclnumero = $this->fclnumero;
   if (!isset($this->nmgp_cmp_hidden['fclnumero']))
   {
       $this->nmgp_cmp_hidden['fclnumero'] = 'off';
   }
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

    <TD class="scFormDataOdd css_fclnumero_line" id="hidden_field_data_fclnumero" style="<?php echo $sStyleHidden_fclnumero; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fclnumero_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fclnumero_label" style=""><span id="id_label_fclnumero"><?php echo $this->nm_new_label['fclnumero']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['php_cmp_required']['fclnumero']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['php_cmp_required']['fclnumero'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["fclnumero"]) &&  $this->nmgp_cmp_readonly["fclnumero"] == "on")) { 

 ?>
<input type="hidden" name="fclnumero" value="<?php echo $this->form_encode_input($fclnumero) . "\"><span id=\"id_ajax_label_fclnumero\">" . $fclnumero . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_fclnumero" class="sc-ui-readonly-fclnumero css_fclnumero_line" style="<?php echo $sStyleReadLab_fclnumero; ?>"><?php echo $this->form_format_readonly("fclnumero", $this->form_encode_input($this->fclnumero)); ?></span><span id="id_read_off_fclnumero" class="css_read_off_fclnumero" style="white-space: nowrap;<?php echo $sStyleReadInp_fclnumero; ?>">
 <input class="sc-js-input scFormObjectOdd css_fclnumero_obj" style="" id="id_sc_field_fclnumero" type=text name="fclnumero" value="<?php echo $this->form_encode_input($fclnumero) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['fclnumero']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['fclnumero']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['fclnumero']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fclnumero_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fclnumero_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_hisfecha_dumb = ('' == $sStyleHidden_hisfecha) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_hisfecha_dumb" style="<?php echo $sStyleHidden_hisfecha_dumb; ?>"></TD>
<?php $sStyleHidden_medcodigo_dumb = ('' == $sStyleHidden_medcodigo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_medcodigo_dumb" style="<?php echo $sStyleHidden_medcodigo_dumb; ?>"></TD>
<?php $sStyleHidden_espcodigo_dumb = ('' == $sStyleHidden_espcodigo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_espcodigo_dumb" style="<?php echo $sStyleHidden_espcodigo_dumb; ?>"></TD>
<?php $sStyleHidden_fclnumero_dumb = ('' == $sStyleHidden_fclnumero) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fclnumero_dumb" style="<?php echo $sStyleHidden_fclnumero_dumb; ?>"></TD>
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
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['hisaltura']))
           {
               $this->nmgp_cmp_readonly['hisaltura'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['histemperatura']))
           {
               $this->nmgp_cmp_readonly['histemperatura'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['hispulso']))
           {
               $this->nmgp_cmp_readonly['hispulso'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['hisfrecresp']))
           {
               $this->nmgp_cmp_readonly['hisfrecresp'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['hispeso']))
    {
        $this->nm_new_label['hispeso'] = "PESO (l)";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hispeso = $this->hispeso;
   $sStyleHidden_hispeso = '';
   if (isset($this->nmgp_cmp_hidden['hispeso']) && $this->nmgp_cmp_hidden['hispeso'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hispeso']);
       $sStyleHidden_hispeso = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hispeso = 'display: none;';
   $sStyleReadInp_hispeso = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["hispeso"]) &&  $this->nmgp_cmp_readonly["hispeso"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hispeso']);
       $sStyleReadLab_hispeso = '';
       $sStyleReadInp_hispeso = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hispeso']) && $this->nmgp_cmp_hidden['hispeso'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hispeso" value="<?php echo $this->form_encode_input($hispeso) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_hispeso_line" id="hidden_field_data_hispeso" style="<?php echo $sStyleHidden_hispeso; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hispeso_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_hispeso_label" style=""><span id="id_label_hispeso"><?php echo $this->nm_new_label['hispeso']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["hispeso"]) &&  $this->nmgp_cmp_readonly["hispeso"] == "on")) { 

 ?>
<input type="hidden" name="hispeso" value="<?php echo $this->form_encode_input($hispeso) . "\"><span id=\"id_ajax_label_hispeso\">" . $hispeso . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_hispeso" class="sc-ui-readonly-hispeso css_hispeso_line" style="<?php echo $sStyleReadLab_hispeso; ?>"><?php echo $this->form_format_readonly("hispeso", $this->form_encode_input($this->hispeso)); ?></span><span id="id_read_off_hispeso" class="css_read_off_hispeso" style="white-space: nowrap;<?php echo $sStyleReadInp_hispeso; ?>">
 <input class="sc-js-input scFormObjectOdd css_hispeso_obj" style="" id="id_sc_field_hispeso" type=text name="hispeso" value="<?php echo $this->form_encode_input($hispeso) ?>"
 size=5 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['hispeso']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['hispeso']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['hispeso']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hispeso_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hispeso_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['hisaltura']))
    {
        $this->nm_new_label['hisaltura'] = "ESTATURA (cm)";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hisaltura = $this->hisaltura;
   $sStyleHidden_hisaltura = '';
   if (isset($this->nmgp_cmp_hidden['hisaltura']) && $this->nmgp_cmp_hidden['hisaltura'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hisaltura']);
       $sStyleHidden_hisaltura = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hisaltura = 'display: none;';
   $sStyleReadInp_hisaltura = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["hisaltura"]) &&  $this->nmgp_cmp_readonly["hisaltura"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hisaltura']);
       $sStyleReadLab_hisaltura = '';
       $sStyleReadInp_hisaltura = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hisaltura']) && $this->nmgp_cmp_hidden['hisaltura'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hisaltura" value="<?php echo $this->form_encode_input($hisaltura) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_hisaltura_line" id="hidden_field_data_hisaltura" style="<?php echo $sStyleHidden_hisaltura; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hisaltura_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_hisaltura_label" style=""><span id="id_label_hisaltura"><?php echo $this->nm_new_label['hisaltura']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["hisaltura"]) &&  $this->nmgp_cmp_readonly["hisaltura"] == "on")) { 

 ?>
<input type="hidden" name="hisaltura" value="<?php echo $this->form_encode_input($hisaltura) . "\"><span id=\"id_ajax_label_hisaltura\">" . $hisaltura . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_hisaltura" class="sc-ui-readonly-hisaltura css_hisaltura_line" style="<?php echo $sStyleReadLab_hisaltura; ?>"><?php echo $this->form_format_readonly("hisaltura", $this->form_encode_input($this->hisaltura)); ?></span><span id="id_read_off_hisaltura" class="css_read_off_hisaltura" style="white-space: nowrap;<?php echo $sStyleReadInp_hisaltura; ?>">
 <input class="sc-js-input scFormObjectOdd css_hisaltura_obj" style="" id="id_sc_field_hisaltura" type=text name="hisaltura" value="<?php echo $this->form_encode_input($hisaltura) ?>"
 size=5 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['hisaltura']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['hisaltura']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['hisaltura']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hisaltura_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hisaltura_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['histemperatura']))
    {
        $this->nm_new_label['histemperatura'] = "TEMP. CORPORAL (°C)";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $histemperatura = $this->histemperatura;
   $sStyleHidden_histemperatura = '';
   if (isset($this->nmgp_cmp_hidden['histemperatura']) && $this->nmgp_cmp_hidden['histemperatura'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['histemperatura']);
       $sStyleHidden_histemperatura = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_histemperatura = 'display: none;';
   $sStyleReadInp_histemperatura = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["histemperatura"]) &&  $this->nmgp_cmp_readonly["histemperatura"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['histemperatura']);
       $sStyleReadLab_histemperatura = '';
       $sStyleReadInp_histemperatura = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['histemperatura']) && $this->nmgp_cmp_hidden['histemperatura'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="histemperatura" value="<?php echo $this->form_encode_input($histemperatura) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_histemperatura_line" id="hidden_field_data_histemperatura" style="<?php echo $sStyleHidden_histemperatura; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_histemperatura_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_histemperatura_label" style=""><span id="id_label_histemperatura"><?php echo $this->nm_new_label['histemperatura']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["histemperatura"]) &&  $this->nmgp_cmp_readonly["histemperatura"] == "on")) { 

 ?>
<input type="hidden" name="histemperatura" value="<?php echo $this->form_encode_input($histemperatura) . "\"><span id=\"id_ajax_label_histemperatura\">" . $histemperatura . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_histemperatura" class="sc-ui-readonly-histemperatura css_histemperatura_line" style="<?php echo $sStyleReadLab_histemperatura; ?>"><?php echo $this->form_format_readonly("histemperatura", $this->form_encode_input($this->histemperatura)); ?></span><span id="id_read_off_histemperatura" class="css_read_off_histemperatura" style="white-space: nowrap;<?php echo $sStyleReadInp_histemperatura; ?>">
 <input class="sc-js-input scFormObjectOdd css_histemperatura_obj" style="" id="id_sc_field_histemperatura" type=text name="histemperatura" value="<?php echo $this->form_encode_input($histemperatura) ?>"
 size=5 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['histemperatura']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['histemperatura']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['histemperatura']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_histemperatura_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_histemperatura_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['hispulso']))
    {
        $this->nm_new_label['hispulso'] = "PULSO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hispulso = $this->hispulso;
   $sStyleHidden_hispulso = '';
   if (isset($this->nmgp_cmp_hidden['hispulso']) && $this->nmgp_cmp_hidden['hispulso'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hispulso']);
       $sStyleHidden_hispulso = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hispulso = 'display: none;';
   $sStyleReadInp_hispulso = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["hispulso"]) &&  $this->nmgp_cmp_readonly["hispulso"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hispulso']);
       $sStyleReadLab_hispulso = '';
       $sStyleReadInp_hispulso = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hispulso']) && $this->nmgp_cmp_hidden['hispulso'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hispulso" value="<?php echo $this->form_encode_input($hispulso) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_hispulso_line" id="hidden_field_data_hispulso" style="<?php echo $sStyleHidden_hispulso; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hispulso_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_hispulso_label" style=""><span id="id_label_hispulso"><?php echo $this->nm_new_label['hispulso']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["hispulso"]) &&  $this->nmgp_cmp_readonly["hispulso"] == "on")) { 

 ?>
<input type="hidden" name="hispulso" value="<?php echo $this->form_encode_input($hispulso) . "\"><span id=\"id_ajax_label_hispulso\">" . $hispulso . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_hispulso" class="sc-ui-readonly-hispulso css_hispulso_line" style="<?php echo $sStyleReadLab_hispulso; ?>"><?php echo $this->form_format_readonly("hispulso", $this->form_encode_input($this->hispulso)); ?></span><span id="id_read_off_hispulso" class="css_read_off_hispulso" style="white-space: nowrap;<?php echo $sStyleReadInp_hispulso; ?>">
 <input class="sc-js-input scFormObjectOdd css_hispulso_obj" style="" id="id_sc_field_hispulso" type=text name="hispulso" value="<?php echo $this->form_encode_input($hispulso) ?>"
 size=5 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['hispulso']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['hispulso']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['hispulso']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hispulso_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hispulso_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_hispeso_dumb = ('' == $sStyleHidden_hispeso) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_hispeso_dumb" style="<?php echo $sStyleHidden_hispeso_dumb; ?>"></TD>
<?php $sStyleHidden_hisaltura_dumb = ('' == $sStyleHidden_hisaltura) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_hisaltura_dumb" style="<?php echo $sStyleHidden_hisaltura_dumb; ?>"></TD>
<?php $sStyleHidden_histemperatura_dumb = ('' == $sStyleHidden_histemperatura) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_histemperatura_dumb" style="<?php echo $sStyleHidden_histemperatura_dumb; ?>"></TD>
<?php $sStyleHidden_hispulso_dumb = ('' == $sStyleHidden_hispulso) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_hispulso_dumb" style="<?php echo $sStyleHidden_hispulso_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['hispresart']))
           {
               $this->nmgp_cmp_readonly['hispresart'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['hisembaraz']))
           {
               $this->nmgp_cmp_readonly['hisembaraz'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['hisedad']))
           {
               $this->nmgp_cmp_readonly['hisedad'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['hisfrecresp']))
    {
        $this->nm_new_label['hisfrecresp'] = "FREC. RESP.";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hisfrecresp = $this->hisfrecresp;
   $sStyleHidden_hisfrecresp = '';
   if (isset($this->nmgp_cmp_hidden['hisfrecresp']) && $this->nmgp_cmp_hidden['hisfrecresp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hisfrecresp']);
       $sStyleHidden_hisfrecresp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hisfrecresp = 'display: none;';
   $sStyleReadInp_hisfrecresp = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["hisfrecresp"]) &&  $this->nmgp_cmp_readonly["hisfrecresp"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hisfrecresp']);
       $sStyleReadLab_hisfrecresp = '';
       $sStyleReadInp_hisfrecresp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hisfrecresp']) && $this->nmgp_cmp_hidden['hisfrecresp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hisfrecresp" value="<?php echo $this->form_encode_input($hisfrecresp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_hisfrecresp_line" id="hidden_field_data_hisfrecresp" style="<?php echo $sStyleHidden_hisfrecresp; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hisfrecresp_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_hisfrecresp_label" style=""><span id="id_label_hisfrecresp"><?php echo $this->nm_new_label['hisfrecresp']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["hisfrecresp"]) &&  $this->nmgp_cmp_readonly["hisfrecresp"] == "on")) { 

 ?>
<input type="hidden" name="hisfrecresp" value="<?php echo $this->form_encode_input($hisfrecresp) . "\"><span id=\"id_ajax_label_hisfrecresp\">" . $hisfrecresp . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_hisfrecresp" class="sc-ui-readonly-hisfrecresp css_hisfrecresp_line" style="<?php echo $sStyleReadLab_hisfrecresp; ?>"><?php echo $this->form_format_readonly("hisfrecresp", $this->form_encode_input($this->hisfrecresp)); ?></span><span id="id_read_off_hisfrecresp" class="css_read_off_hisfrecresp" style="white-space: nowrap;<?php echo $sStyleReadInp_hisfrecresp; ?>">
 <input class="sc-js-input scFormObjectOdd css_hisfrecresp_obj" style="" id="id_sc_field_hisfrecresp" type=text name="hisfrecresp" value="<?php echo $this->form_encode_input($hisfrecresp) ?>"
 size=5 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['hisfrecresp']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['hisfrecresp']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['hisfrecresp']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hisfrecresp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hisfrecresp_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['hispresart']))
    {
        $this->nm_new_label['hispresart'] = "PRESIÓN ART.";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hispresart = $this->hispresart;
   $sStyleHidden_hispresart = '';
   if (isset($this->nmgp_cmp_hidden['hispresart']) && $this->nmgp_cmp_hidden['hispresart'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hispresart']);
       $sStyleHidden_hispresart = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hispresart = 'display: none;';
   $sStyleReadInp_hispresart = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["hispresart"]) &&  $this->nmgp_cmp_readonly["hispresart"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hispresart']);
       $sStyleReadLab_hispresart = '';
       $sStyleReadInp_hispresart = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hispresart']) && $this->nmgp_cmp_hidden['hispresart'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hispresart" value="<?php echo $this->form_encode_input($hispresart) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_hispresart_line" id="hidden_field_data_hispresart" style="<?php echo $sStyleHidden_hispresart; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hispresart_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_hispresart_label" style=""><span id="id_label_hispresart"><?php echo $this->nm_new_label['hispresart']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["hispresart"]) &&  $this->nmgp_cmp_readonly["hispresart"] == "on")) { 

 ?>
<input type="hidden" name="hispresart" value="<?php echo $this->form_encode_input($hispresart) . "\"><span id=\"id_ajax_label_hispresart\">" . $hispresart . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_hispresart" class="sc-ui-readonly-hispresart css_hispresart_line" style="<?php echo $sStyleReadLab_hispresart; ?>"><?php echo $this->form_format_readonly("hispresart", $this->form_encode_input($this->hispresart)); ?></span><span id="id_read_off_hispresart" class="css_read_off_hispresart" style="white-space: nowrap;<?php echo $sStyleReadInp_hispresart; ?>">
 <input class="sc-js-input scFormObjectOdd css_hispresart_obj" style="" id="id_sc_field_hispresart" type=text name="hispresart" value="<?php echo $this->form_encode_input($hispresart) ?>"
 size=7 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789 .,/-") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hispresart_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hispresart_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['hisfumador']))
   {
       $this->nm_new_label['hisfumador'] = "FUMADOR (A)";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hisfumador = $this->hisfumador;
   $sStyleHidden_hisfumador = '';
   if (isset($this->nmgp_cmp_hidden['hisfumador']) && $this->nmgp_cmp_hidden['hisfumador'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hisfumador']);
       $sStyleHidden_hisfumador = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hisfumador = 'display: none;';
   $sStyleReadInp_hisfumador = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['hisfumador']) && $this->nmgp_cmp_readonly['hisfumador'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hisfumador']);
       $sStyleReadLab_hisfumador = '';
       $sStyleReadInp_hisfumador = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hisfumador']) && $this->nmgp_cmp_hidden['hisfumador'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="hisfumador" value="<?php echo $this->form_encode_input($this->hisfumador) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->hisfumador_1 = explode(";", trim($this->hisfumador));
  } 
  else
  {
      if (empty($this->hisfumador))
      {
          $this->hisfumador_1= array(); 
          $this->hisfumador= "";
      } 
      else
      {
          $this->hisfumador_1= $this->hisfumador; 
          $this->hisfumador= ""; 
          foreach ($this->hisfumador_1 as $cada_hisfumador)
          {
             if (!empty($hisfumador))
             {
                 $this->hisfumador.= ";"; 
             } 
             $this->hisfumador.= $cada_hisfumador; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_hisfumador_line" id="hidden_field_data_hisfumador" style="<?php echo $sStyleHidden_hisfumador; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hisfumador_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_hisfumador_label" style=""><span id="id_label_hisfumador"><?php echo $this->nm_new_label['hisfumador']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hisfumador"]) &&  $this->nmgp_cmp_readonly["hisfumador"] == "on") { 

$hisfumador_look = "";
 if ($this->hisfumador == "1") { $hisfumador_look .= "" ;} 
 if (empty($hisfumador_look)) { $hisfumador_look = $this->hisfumador; }
?>
<input type="hidden" name="hisfumador" value="<?php echo $this->form_encode_input($hisfumador) . "\">" . $hisfumador_look . ""; ?>
<?php } else { ?>

<?php

$hisfumador_look = "";
 if ($this->hisfumador == "1") { $hisfumador_look .= "" ;} 
 if (empty($hisfumador_look)) { $hisfumador_look = $this->hisfumador; }
?>
<span id="id_read_on_hisfumador" class="css_hisfumador_line" style="<?php echo $sStyleReadLab_hisfumador; ?>"><?php echo $this->form_format_readonly("hisfumador", $this->form_encode_input($hisfumador_look)); ?></span><span id="id_read_off_hisfumador" class="css_read_off_hisfumador css_hisfumador_line" style="<?php echo $sStyleReadInp_hisfumador; ?>"><?php echo "<div id=\"idAjaxCheckbox_hisfumador\" style=\"display: inline-block\" class=\"css_hisfumador_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_hisfumador_line"><?php $tempOptionId = "id-opt-hisfumador" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-hisfumador sc-ui-checkbox-hisfumador" name="hisfumador[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['Lookup_hisfumador'][] = '1'; ?>
<?php  if (in_array("1", $this->hisfumador_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hisfumador_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hisfumador_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['hisembaraz']))
   {
       $this->nm_new_label['hisembaraz'] = "EMBARAZADA";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hisembaraz = $this->hisembaraz;
   $sStyleHidden_hisembaraz = '';
   if (isset($this->nmgp_cmp_hidden['hisembaraz']) && $this->nmgp_cmp_hidden['hisembaraz'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hisembaraz']);
       $sStyleHidden_hisembaraz = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hisembaraz = 'display: none;';
   $sStyleReadInp_hisembaraz = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["hisembaraz"]) &&  $this->nmgp_cmp_readonly["hisembaraz"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hisembaraz']);
       $sStyleReadLab_hisembaraz = '';
       $sStyleReadInp_hisembaraz = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hisembaraz']) && $this->nmgp_cmp_hidden['hisembaraz'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="hisembaraz" value="<?php echo $this->form_encode_input($this->hisembaraz) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->hisembaraz_1 = explode(";", trim($this->hisembaraz));
  } 
  else
  {
      if (empty($this->hisembaraz))
      {
          $this->hisembaraz_1= array(); 
          $this->hisembaraz= "";
      } 
      else
      {
          $this->hisembaraz_1= $this->hisembaraz; 
          $this->hisembaraz= ""; 
          foreach ($this->hisembaraz_1 as $cada_hisembaraz)
          {
             if (!empty($hisembaraz))
             {
                 $this->hisembaraz.= ";"; 
             } 
             $this->hisembaraz.= $cada_hisembaraz; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_hisembaraz_line" id="hidden_field_data_hisembaraz" style="<?php echo $sStyleHidden_hisembaraz; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hisembaraz_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_hisembaraz_label" style=""><span id="id_label_hisembaraz"><?php echo $this->nm_new_label['hisembaraz']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["hisembaraz"]) &&  $this->nmgp_cmp_readonly["hisembaraz"] == "on")) { 

$hisembaraz_look = "";
 if ($this->hisembaraz == "1") { $hisembaraz_look .= "" ;} 
 if (empty($hisembaraz_look)) { $hisembaraz_look = $this->hisembaraz; }
?>
<input type="hidden" name="hisembaraz" value="<?php echo $this->form_encode_input($hisembaraz) . "\"><span id=\"id_ajax_label_hisembaraz\">" . $hisembaraz_look . "</span>"; ?>
<?php } else { ?>

<?php

$hisembaraz_look = "";
 if ($this->hisembaraz == "1") { $hisembaraz_look .= "" ;} 
 if (empty($hisembaraz_look)) { $hisembaraz_look = $this->hisembaraz; }
?>
<span id="id_read_on_hisembaraz" class="css_hisembaraz_line" style="<?php echo $sStyleReadLab_hisembaraz; ?>"><?php echo $this->form_format_readonly("hisembaraz", $this->form_encode_input($hisembaraz_look)); ?></span><span id="id_read_off_hisembaraz" class="css_read_off_hisembaraz css_hisembaraz_line" style="<?php echo $sStyleReadInp_hisembaraz; ?>"><?php echo "<div id=\"idAjaxCheckbox_hisembaraz\" style=\"display: inline-block\" class=\"css_hisembaraz_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_hisembaraz_line"><?php $tempOptionId = "id-opt-hisembaraz" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-hisembaraz sc-ui-checkbox-hisembaraz" name="hisembaraz[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['Lookup_hisembaraz'][] = '1'; ?>
<?php  if (in_array("1", $this->hisembaraz_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hisembaraz_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hisembaraz_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_hisfrecresp_dumb = ('' == $sStyleHidden_hisfrecresp) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_hisfrecresp_dumb" style="<?php echo $sStyleHidden_hisfrecresp_dumb; ?>"></TD>
<?php $sStyleHidden_hispresart_dumb = ('' == $sStyleHidden_hispresart) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_hispresart_dumb" style="<?php echo $sStyleHidden_hispresart_dumb; ?>"></TD>
<?php $sStyleHidden_hisfumador_dumb = ('' == $sStyleHidden_hisfumador) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_hisfumador_dumb" style="<?php echo $sStyleHidden_hisfumador_dumb; ?>"></TD>
<?php $sStyleHidden_hisembaraz_dumb = ('' == $sStyleHidden_hisembaraz) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_hisembaraz_dumb" style="<?php echo $sStyleHidden_hisembaraz_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['hisenfmed']))
           {
               $this->nmgp_cmp_readonly['hisenfmed'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['hisedad']))
    {
        $this->nm_new_label['hisedad'] = "EDAD";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hisedad = $this->hisedad;
   if (!isset($this->nmgp_cmp_hidden['hisedad']))
   {
       $this->nmgp_cmp_hidden['hisedad'] = 'off';
   }
   $sStyleHidden_hisedad = '';
   if (isset($this->nmgp_cmp_hidden['hisedad']) && $this->nmgp_cmp_hidden['hisedad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hisedad']);
       $sStyleHidden_hisedad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hisedad = 'display: none;';
   $sStyleReadInp_hisedad = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["hisedad"]) &&  $this->nmgp_cmp_readonly["hisedad"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hisedad']);
       $sStyleReadLab_hisedad = '';
       $sStyleReadInp_hisedad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hisedad']) && $this->nmgp_cmp_hidden['hisedad'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hisedad" value="<?php echo $this->form_encode_input($hisedad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_hisedad_line" id="hidden_field_data_hisedad" style="<?php echo $sStyleHidden_hisedad; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hisedad_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_hisedad_label" style=""><span id="id_label_hisedad"><?php echo $this->nm_new_label['hisedad']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["hisedad"]) &&  $this->nmgp_cmp_readonly["hisedad"] == "on")) { 

 ?>
<input type="hidden" name="hisedad" value="<?php echo $this->form_encode_input($hisedad) . "\"><span id=\"id_ajax_label_hisedad\">" . $hisedad . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_hisedad" class="sc-ui-readonly-hisedad css_hisedad_line" style="<?php echo $sStyleReadLab_hisedad; ?>"><?php echo $this->form_format_readonly("hisedad", $this->form_encode_input($this->hisedad)); ?></span><span id="id_read_off_hisedad" class="css_read_off_hisedad" style="white-space: nowrap;<?php echo $sStyleReadInp_hisedad; ?>">
 <input class="sc-js-input scFormObjectOdd css_hisedad_obj" style="" id="id_sc_field_hisedad" type=text name="hisedad" value="<?php echo $this->form_encode_input($hisedad) ?>"
 size=3 alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['hisedad']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['hisedad']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['hisedad']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hisedad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hisedad_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="3" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
<?php $sStyleHidden_hisedad_dumb = ('' == $sStyleHidden_hisedad) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_hisedad_dumb" style="<?php echo $sStyleHidden_hisedad_dumb; ?>"></TD>
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
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['hisanteced']))
           {
               $this->nmgp_cmp_readonly['hisanteced'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['hisenfmed']))
    {
        $this->nm_new_label['hisenfmed'] = "ENFERMEDADES / MEDICACIÓN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hisenfmed = $this->hisenfmed;
   $sStyleHidden_hisenfmed = '';
   if (isset($this->nmgp_cmp_hidden['hisenfmed']) && $this->nmgp_cmp_hidden['hisenfmed'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hisenfmed']);
       $sStyleHidden_hisenfmed = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hisenfmed = 'display: none;';
   $sStyleReadInp_hisenfmed = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["hisenfmed"]) &&  $this->nmgp_cmp_readonly["hisenfmed"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hisenfmed']);
       $sStyleReadLab_hisenfmed = '';
       $sStyleReadInp_hisenfmed = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hisenfmed']) && $this->nmgp_cmp_hidden['hisenfmed'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hisenfmed" value="<?php echo $this->form_encode_input($hisenfmed) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_hisenfmed_line" id="hidden_field_data_hisenfmed" style="<?php echo $sStyleHidden_hisenfmed; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hisenfmed_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_hisenfmed_label" style=""><span id="id_label_hisenfmed"><?php echo $this->nm_new_label['hisenfmed']; ?></span></span><br>
<?php
$hisenfmed_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($hisenfmed));

?>

<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["hisenfmed"]) &&  $this->nmgp_cmp_readonly["hisenfmed"] == "on")) { 

 ?>
<input type="hidden" name="hisenfmed" value="<?php echo $this->form_encode_input($hisenfmed) . "\"><span id=\"id_ajax_label_hisenfmed\">" . $hisenfmed_val . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_hisenfmed" class="sc-ui-readonly-hisenfmed css_hisenfmed_line" style="<?php echo $sStyleReadLab_hisenfmed; ?>"><?php echo $this->form_format_readonly("hisenfmed", str_replace(chr(10), "<br>", $this->form_encode_input($hisenfmed_val))); ?></span><span id="id_read_off_hisenfmed" class="css_read_off_hisenfmed" style="white-space: nowrap;<?php echo $sStyleReadInp_hisenfmed; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_hisenfmed_obj" style="white-space: pre-wrap;" name="hisenfmed" id="id_sc_field_hisenfmed" rows="4" cols="60"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $hisenfmed; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hisenfmed_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hisenfmed_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['hishistoria']))
           {
               $this->nmgp_cmp_readonly['hishistoria'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['hisanteced']))
    {
        $this->nm_new_label['hisanteced'] = "ANTECEDENTES";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hisanteced = $this->hisanteced;
   $sStyleHidden_hisanteced = '';
   if (isset($this->nmgp_cmp_hidden['hisanteced']) && $this->nmgp_cmp_hidden['hisanteced'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hisanteced']);
       $sStyleHidden_hisanteced = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hisanteced = 'display: none;';
   $sStyleReadInp_hisanteced = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["hisanteced"]) &&  $this->nmgp_cmp_readonly["hisanteced"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hisanteced']);
       $sStyleReadLab_hisanteced = '';
       $sStyleReadInp_hisanteced = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hisanteced']) && $this->nmgp_cmp_hidden['hisanteced'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hisanteced" value="<?php echo $this->form_encode_input($hisanteced) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_hisanteced_line" id="hidden_field_data_hisanteced" style="<?php echo $sStyleHidden_hisanteced; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hisanteced_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_hisanteced_label" style=""><span id="id_label_hisanteced"><?php echo $this->nm_new_label['hisanteced']; ?></span></span><br>
<?php
$hisanteced_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($hisanteced));

?>

<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["hisanteced"]) &&  $this->nmgp_cmp_readonly["hisanteced"] == "on")) { 

 ?>
<input type="hidden" name="hisanteced" value="<?php echo $this->form_encode_input($hisanteced) . "\"><span id=\"id_ajax_label_hisanteced\">" . $hisanteced_val . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_hisanteced" class="sc-ui-readonly-hisanteced css_hisanteced_line" style="<?php echo $sStyleReadLab_hisanteced; ?>"><?php echo $this->form_format_readonly("hisanteced", str_replace(chr(10), "<br>", $this->form_encode_input($hisanteced_val))); ?></span><span id="id_read_off_hisanteced" class="css_read_off_hisanteced" style="white-space: nowrap;<?php echo $sStyleReadInp_hisanteced; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_hisanteced_obj" style="white-space: pre-wrap;" name="hisanteced" id="id_sc_field_hisanteced" rows="4" cols="60"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $hisanteced; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hisanteced_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hisanteced_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['hisevolucion']))
           {
               $this->nmgp_cmp_readonly['hisevolucion'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['hishistoria']))
    {
        $this->nm_new_label['hishistoria'] = "HISTORIA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hishistoria = $this->hishistoria;
   $sStyleHidden_hishistoria = '';
   if (isset($this->nmgp_cmp_hidden['hishistoria']) && $this->nmgp_cmp_hidden['hishistoria'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hishistoria']);
       $sStyleHidden_hishistoria = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hishistoria = 'display: none;';
   $sStyleReadInp_hishistoria = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["hishistoria"]) &&  $this->nmgp_cmp_readonly["hishistoria"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hishistoria']);
       $sStyleReadLab_hishistoria = '';
       $sStyleReadInp_hishistoria = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hishistoria']) && $this->nmgp_cmp_hidden['hishistoria'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hishistoria" value="<?php echo $this->form_encode_input($hishistoria) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_hishistoria_line" id="hidden_field_data_hishistoria" style="<?php echo $sStyleHidden_hishistoria; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hishistoria_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_hishistoria_label" style=""><span id="id_label_hishistoria"><?php echo $this->nm_new_label['hishistoria']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['php_cmp_required']['hishistoria']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['php_cmp_required']['hishistoria'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php
$hishistoria_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($hishistoria));

?>

<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["hishistoria"]) &&  $this->nmgp_cmp_readonly["hishistoria"] == "on")) { 

 ?>
<input type="hidden" name="hishistoria" value="<?php echo $this->form_encode_input($hishistoria) . "\"><span id=\"id_ajax_label_hishistoria\">" . $hishistoria_val . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_hishistoria" class="sc-ui-readonly-hishistoria css_hishistoria_line" style="<?php echo $sStyleReadLab_hishistoria; ?>"><?php echo $this->form_format_readonly("hishistoria", str_replace(chr(10), "<br>", $this->form_encode_input($hishistoria_val))); ?></span><span id="id_read_off_hishistoria" class="css_read_off_hishistoria" style="white-space: nowrap;<?php echo $sStyleReadInp_hishistoria; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_hishistoria_obj" style="white-space: pre-wrap;" name="hishistoria" id="id_sc_field_hishistoria" rows="4" cols="60"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $hishistoria; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hishistoria_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hishistoria_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['hisusucrea']))
           {
               $this->nmgp_cmp_readonly['hisusucrea'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['hisevolucion']))
    {
        $this->nm_new_label['hisevolucion'] = "EVOLUCIÓN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hisevolucion = $this->hisevolucion;
   $sStyleHidden_hisevolucion = '';
   if (isset($this->nmgp_cmp_hidden['hisevolucion']) && $this->nmgp_cmp_hidden['hisevolucion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hisevolucion']);
       $sStyleHidden_hisevolucion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hisevolucion = 'display: none;';
   $sStyleReadInp_hisevolucion = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["hisevolucion"]) &&  $this->nmgp_cmp_readonly["hisevolucion"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hisevolucion']);
       $sStyleReadLab_hisevolucion = '';
       $sStyleReadInp_hisevolucion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hisevolucion']) && $this->nmgp_cmp_hidden['hisevolucion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hisevolucion" value="<?php echo $this->form_encode_input($hisevolucion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_hisevolucion_line" id="hidden_field_data_hisevolucion" style="<?php echo $sStyleHidden_hisevolucion; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hisevolucion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_hisevolucion_label" style=""><span id="id_label_hisevolucion"><?php echo $this->nm_new_label['hisevolucion']; ?></span></span><br>
<?php
$hisevolucion_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($hisevolucion));

?>

<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["hisevolucion"]) &&  $this->nmgp_cmp_readonly["hisevolucion"] == "on")) { 

 ?>
<input type="hidden" name="hisevolucion" value="<?php echo $this->form_encode_input($hisevolucion) . "\"><span id=\"id_ajax_label_hisevolucion\">" . $hisevolucion_val . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_hisevolucion" class="sc-ui-readonly-hisevolucion css_hisevolucion_line" style="<?php echo $sStyleReadLab_hisevolucion; ?>"><?php echo $this->form_format_readonly("hisevolucion", str_replace(chr(10), "<br>", $this->form_encode_input($hisevolucion_val))); ?></span><span id="id_read_off_hisevolucion" class="css_read_off_hisevolucion" style="white-space: nowrap;<?php echo $sStyleReadInp_hisevolucion; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_hisevolucion_obj" style="white-space: pre-wrap;" name="hisevolucion" id="id_sc_field_hisevolucion" rows="4" cols="60"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $hisevolucion; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hisevolucion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hisevolucion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_hisevolucion_dumb = ('' == $sStyleHidden_hisevolucion) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_hisevolucion_dumb" style="<?php echo $sStyleHidden_hisevolucion_dumb; ?>"></TD>
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
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['hisfeccrea']))
           {
               $this->nmgp_cmp_readonly['hisfeccrea'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['hisusucrea']))
    {
        $this->nm_new_label['hisusucrea'] = "USUARIO CREACIÓN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hisusucrea = $this->hisusucrea;
   $sStyleHidden_hisusucrea = '';
   if (isset($this->nmgp_cmp_hidden['hisusucrea']) && $this->nmgp_cmp_hidden['hisusucrea'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hisusucrea']);
       $sStyleHidden_hisusucrea = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hisusucrea = 'display: none;';
   $sStyleReadInp_hisusucrea = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["hisusucrea"]) &&  $this->nmgp_cmp_readonly["hisusucrea"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hisusucrea']);
       $sStyleReadLab_hisusucrea = '';
       $sStyleReadInp_hisusucrea = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hisusucrea']) && $this->nmgp_cmp_hidden['hisusucrea'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hisusucrea" value="<?php echo $this->form_encode_input($hisusucrea) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_hisusucrea_line" id="hidden_field_data_hisusucrea" style="<?php echo $sStyleHidden_hisusucrea; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hisusucrea_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_hisusucrea_label" style=""><span id="id_label_hisusucrea"><?php echo $this->nm_new_label['hisusucrea']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["hisusucrea"]) &&  $this->nmgp_cmp_readonly["hisusucrea"] == "on")) { 

 ?>
<input type="hidden" name="hisusucrea" value="<?php echo $this->form_encode_input($hisusucrea) . "\"><span id=\"id_ajax_label_hisusucrea\">" . $hisusucrea . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_hisusucrea" class="sc-ui-readonly-hisusucrea css_hisusucrea_line" style="<?php echo $sStyleReadLab_hisusucrea; ?>"><?php echo $this->form_format_readonly("hisusucrea", $this->form_encode_input($this->hisusucrea)); ?></span><span id="id_read_off_hisusucrea" class="css_read_off_hisusucrea" style="white-space: nowrap;<?php echo $sStyleReadInp_hisusucrea; ?>">
 <input class="sc-js-input scFormObjectOdd css_hisusucrea_obj" style="" id="id_sc_field_hisusucrea" type=text name="hisusucrea" value="<?php echo $this->form_encode_input($hisusucrea) ?>"
 size=32 maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hisusucrea_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hisusucrea_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['hisfeccrea']))
    {
        $this->nm_new_label['hisfeccrea'] = "FECHA CREACIÓN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_hisfeccrea = $this->hisfeccrea;
   if (strlen($this->hisfeccrea_hora) > 8 ) {$this->hisfeccrea_hora = substr($this->hisfeccrea_hora, 0, 8);}
   $this->hisfeccrea .= ' ' . $this->hisfeccrea_hora;
   $this->hisfeccrea  = trim($this->hisfeccrea);
   $hisfeccrea = $this->hisfeccrea;
   $sStyleHidden_hisfeccrea = '';
   if (isset($this->nmgp_cmp_hidden['hisfeccrea']) && $this->nmgp_cmp_hidden['hisfeccrea'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hisfeccrea']);
       $sStyleHidden_hisfeccrea = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hisfeccrea = 'display: none;';
   $sStyleReadInp_hisfeccrea = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["hisfeccrea"]) &&  $this->nmgp_cmp_readonly["hisfeccrea"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hisfeccrea']);
       $sStyleReadLab_hisfeccrea = '';
       $sStyleReadInp_hisfeccrea = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hisfeccrea']) && $this->nmgp_cmp_hidden['hisfeccrea'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hisfeccrea" value="<?php echo $this->form_encode_input($hisfeccrea) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_hisfeccrea_line" id="hidden_field_data_hisfeccrea" style="<?php echo $sStyleHidden_hisfeccrea; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hisfeccrea_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_hisfeccrea_label" style=""><span id="id_label_hisfeccrea"><?php echo $this->nm_new_label['hisfeccrea']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["hisfeccrea"]) &&  $this->nmgp_cmp_readonly["hisfeccrea"] == "on")) { 

 ?>
<input type="hidden" name="hisfeccrea" value="<?php echo $this->form_encode_input($hisfeccrea) . "\"><span id=\"id_ajax_label_hisfeccrea\">" . $hisfeccrea . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_hisfeccrea" class="sc-ui-readonly-hisfeccrea css_hisfeccrea_line" style="<?php echo $sStyleReadLab_hisfeccrea; ?>"><?php echo $this->form_format_readonly("hisfeccrea", $this->form_encode_input($hisfeccrea)); ?></span><span id="id_read_off_hisfeccrea" class="css_read_off_hisfeccrea" style="white-space: nowrap;<?php echo $sStyleReadInp_hisfeccrea; ?>"><?php
$tmp_form_data = $this->field_config['hisfeccrea']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_hisfeccrea_obj" style="" id="id_sc_field_hisfeccrea" type=text name="hisfeccrea" value="<?php echo $this->form_encode_input($hisfeccrea) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['hisfeccrea']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['hisfeccrea']['date_format']; ?>', timeSep: '<?php echo $this->field_config['hisfeccrea']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hisfeccrea_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hisfeccrea_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->hisfeccrea = $old_dt_hisfeccrea;
?>

    <TD class="scFormDataOdd" colspan="2" >&nbsp;</TD>




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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "R")
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
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8592;)", "sc-unique-btn-9", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8592;)", "sc-unique-btn-10", "", "");?>
 
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
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8594;)", "sc-unique-btn-11", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8594;)", "sc-unique-btn-12", "", "");?>
 
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_historia");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_historia");
 parent.scAjaxDetailHeight("form_historia", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_historia", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_historia", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['sc_modal'])
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
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_t").length && $("#sc_b_hlp_t").is(":visible")) {
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_t.sc-unique-btn-4").length && $("#sc_b_sai_t.sc-unique-btn-4").is(":visible")) {
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-5").length && $("#sc_b_sai_t.sc-unique-btn-5").is(":visible")) {
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-6").length && $("#sc_b_sai_t.sc-unique-btn-6").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
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
	}
	function scBtnFn_sys_GridPermiteSeq() {
		if ($("#brec_b").length && $("#brec_b").is(":visible")) {
			nm_navpage(document.F1.nmgp_rec_b.value, 'P'); document.F1.nmgp_rec_b.value = '';
			 return;
		}
	}
	function scBtnFn_sys_format_ini() {
		if ($("#sc_b_ini_b.sc-unique-btn-9").length && $("#sc_b_ini_b.sc-unique-btn-9").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-10").length && $("#sc_b_ret_b.sc-unique-btn-10").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-11").length && $("#sc_b_avc_b.sc-unique-btn-11").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-12").length && $("#sc_b_fim_b.sc-unique-btn-12").is(":visible")) {
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_historia']['buttonStatus'] = $this->nmgp_botoes;
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
