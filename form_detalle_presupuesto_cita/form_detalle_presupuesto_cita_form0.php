<?php
class form_detalle_presupuesto_cita_form extends form_detalle_presupuesto_cita_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " detalle_presupuesto"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " detalle_presupuesto"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['sc_redir_atualiz'] == 'ok')
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
 <style type="text/css">
  .scSpin_dprcantidad__obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
 </style>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['embutida_pdf']))
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
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_detalle_presupuesto_cita/form_detalle_presupuesto_cita_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_detalle_presupuesto_cita_sajax_js.php");
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

include_once('form_detalle_presupuesto_cita_jquery.php');

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

  addAutocomplete(this);

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

 function addAutocomplete(elem) {

  var iSeq_sercodigo_ = $(".sc-ui-autocomp-sercodigo_", elem).attr("id").substr(16);

  $(".sc-ui-autocomp-sercodigo_", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "sercodigo_" != sId ? sId.substr(10) : "";
   if ("" == $(this).val()) {
    var hasChanged = "" != $("#id_sc_field_" + sId).val();
    $("#id_sc_field_" + sId).val("");
    if (hasChanged) {
     if ('function' == typeof do_ajax_form_detalle_presupuesto_cita_event_sercodigo__onchange) { do_ajax_form_detalle_presupuesto_cita_event_sercodigo__onchange(sRow); }
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
     url: "form_detalle_presupuesto_cita.php",
     dataType: "json",
     data: {
      term: request.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_sercodigo_",
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
   change: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'sercodigo_' != sId ? sId.substr(10) : '';
    if ("" == $(this).val()) {
     do_ajax_form_detalle_presupuesto_cita_event_sercodigo__onchange(sRow);
    }
   },
   focus: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'sercodigo_' != sId ? sId.substr(10) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
   },
   select: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'sercodigo_' != sId ? sId.substr(10) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    do_ajax_form_detalle_presupuesto_cita_event_sercodigo__onchange(sRow);
    nm_check_insert(sRow);
    event.preventDefault();
    $("#id_sc_field_" + sId).trigger("focus");
   }
  });
  $("#id_ac_sercodigo_", elem).on("focus", function() {
    $("#id_sc_field_sercodigo_").trigger("focus");
  }).on("blur", function() {
    $("#id_sc_field_sercodigo_").trigger("blur");
  });
}
</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['recarga'];
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
 include_once("form_detalle_presupuesto_cita_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['form_detalle_presupuesto_cita'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_detalle_presupuesto_cita'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] != "R")
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
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-9", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['empty_filter'] = true;
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
   <?php if (isset($this->nmgp_cmp_hidden['add_']) && $this->nmgp_cmp_hidden['add_'] == 'off') { $sStyleHidden_add_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['add_']) || $this->nmgp_cmp_hidden['add_'] == 'on') {
      if (!isset($this->nm_new_label['add_'])) {
          $this->nm_new_label['add_'] = ""; } ?>

    <TD class="scFormLabelOddMult css_add__label" id="hidden_field_label_add_" style="<?php echo $sStyleHidden_add_; ?>" > <?php echo $this->nm_new_label['add_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['sercodigo_']) && $this->nmgp_cmp_hidden['sercodigo_'] == 'off') { $sStyleHidden_sercodigo_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['sercodigo_']) || $this->nmgp_cmp_hidden['sercodigo_'] == 'on') {
      if (!isset($this->nm_new_label['sercodigo_'])) {
          $this->nm_new_label['sercodigo_'] = "SERVICIO"; } ?>

    <TD class="scFormLabelOddMult css_sercodigo__label" id="hidden_field_label_sercodigo_" style="<?php echo $sStyleHidden_sercodigo_; ?>" > <?php echo $this->nm_new_label['sercodigo_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dprcantidad_']) && $this->nmgp_cmp_hidden['dprcantidad_'] == 'off') { $sStyleHidden_dprcantidad_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dprcantidad_']) || $this->nmgp_cmp_hidden['dprcantidad_'] == 'on') {
      if (!isset($this->nm_new_label['dprcantidad_'])) {
          $this->nm_new_label['dprcantidad_'] = "CANTIDAD"; } ?>

    <TD class="scFormLabelOddMult css_dprcantidad__label" id="hidden_field_label_dprcantidad_" style="<?php echo $sStyleHidden_dprcantidad_; ?>" > <?php echo $this->nm_new_label['dprcantidad_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dprprecio_']) && $this->nmgp_cmp_hidden['dprprecio_'] == 'off') { $sStyleHidden_dprprecio_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dprprecio_']) || $this->nmgp_cmp_hidden['dprprecio_'] == 'on') {
      if (!isset($this->nm_new_label['dprprecio_'])) {
          $this->nm_new_label['dprprecio_'] = "PRECIO"; } ?>

    <TD class="scFormLabelOddMult css_dprprecio__label" id="hidden_field_label_dprprecio_" style="<?php echo $sStyleHidden_dprprecio_; ?>" > <?php echo $this->nm_new_label['dprprecio_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dprporcendesc_']) && $this->nmgp_cmp_hidden['dprporcendesc_'] == 'off') { $sStyleHidden_dprporcendesc_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dprporcendesc_']) || $this->nmgp_cmp_hidden['dprporcendesc_'] == 'on') {
      if (!isset($this->nm_new_label['dprporcendesc_'])) {
          $this->nm_new_label['dprporcendesc_'] = "DESCUENTO (%)"; } ?>

    <TD class="scFormLabelOddMult css_dprporcendesc__label" id="hidden_field_label_dprporcendesc_" style="<?php echo $sStyleHidden_dprporcendesc_; ?>" > <?php echo $this->nm_new_label['dprporcendesc_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dprtotal_']) && $this->nmgp_cmp_hidden['dprtotal_'] == 'off') { $sStyleHidden_dprtotal_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dprtotal_']) || $this->nmgp_cmp_hidden['dprtotal_'] == 'on') {
      if (!isset($this->nm_new_label['dprtotal_'])) {
          $this->nm_new_label['dprtotal_'] = "SUBTOTAL"; } ?>

    <TD class="scFormLabelOddMult css_dprtotal__label" id="hidden_field_label_dprtotal_" style="<?php echo $sStyleHidden_dprtotal_; ?>" > <?php echo $this->nm_new_label['dprtotal_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dprabonado_']) && $this->nmgp_cmp_hidden['dprabonado_'] == 'off') { $sStyleHidden_dprabonado_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dprabonado_']) || $this->nmgp_cmp_hidden['dprabonado_'] == 'on') {
      if (!isset($this->nm_new_label['dprabonado_'])) {
          $this->nm_new_label['dprabonado_'] = "REALIZADO"; } ?>

    <TD class="scFormLabelOddMult css_dprabonado__label" id="hidden_field_label_dprabonado_" style="<?php echo $sStyleHidden_dprabonado_; ?>" > <?php echo $this->nm_new_label['dprabonado_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dprsaldo_']) && $this->nmgp_cmp_hidden['dprsaldo_'] == 'off') { $sStyleHidden_dprsaldo_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dprsaldo_']) || $this->nmgp_cmp_hidden['dprsaldo_'] == 'on') {
      if (!isset($this->nm_new_label['dprsaldo_'])) {
          $this->nm_new_label['dprsaldo_'] = "FALTANTE"; } ?>

    <TD class="scFormLabelOddMult css_dprsaldo__label" id="hidden_field_label_dprsaldo_" style="<?php echo $sStyleHidden_dprsaldo_; ?>" > <?php echo $this->nm_new_label['dprsaldo_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dproriginal_']) && $this->nmgp_cmp_hidden['dproriginal_'] == 'off') { $sStyleHidden_dproriginal_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dproriginal_']) || $this->nmgp_cmp_hidden['dproriginal_'] == 'on') {
      if (!isset($this->nm_new_label['dproriginal_'])) {
          $this->nm_new_label['dproriginal_'] = "ORIGINAL"; } ?>

    <TD class="scFormLabelOddMult css_dproriginal__label" id="hidden_field_label_dproriginal_" style="<?php echo $sStyleHidden_dproriginal_; ?>" > <?php echo $this->nm_new_label['dproriginal_'] ?> </TD>
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
       $iStart = sizeof($this->form_vert_form_detalle_presupuesto_cita);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_detalle_presupuesto_cita = $this->form_vert_form_detalle_presupuesto_cita;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_detalle_presupuesto_cita))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['dprprecio_']))
           {
               $this->nmgp_cmp_readonly['dprprecio_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['dprabonado_']))
           {
               $this->nmgp_cmp_readonly['dprabonado_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['dprsaldo_']))
           {
               $this->nmgp_cmp_readonly['dprsaldo_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['dproriginal_']))
           {
               $this->nmgp_cmp_readonly['dproriginal_'] = 'on';
           }
   foreach ($this->form_vert_form_detalle_presupuesto_cita as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->dprsecuen_ = $this->form_vert_form_detalle_presupuesto_cita[$sc_seq_vert]['dprsecuen_'];
       $this->prenumero_ = $this->form_vert_form_detalle_presupuesto_cita[$sc_seq_vert]['prenumero_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['add_'] = true;
           $this->nmgp_cmp_readonly['sercodigo_'] = true;
           $this->nmgp_cmp_readonly['dprcantidad_'] = true;
           $this->nmgp_cmp_readonly['dprprecio_'] = true;
           $this->nmgp_cmp_readonly['dprporcendesc_'] = true;
           $this->nmgp_cmp_readonly['dprtotal_'] = true;
           $this->nmgp_cmp_readonly['dprabonado_'] = true;
           $this->nmgp_cmp_readonly['dprsaldo_'] = true;
           $this->nmgp_cmp_readonly['dproriginal_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['add_']) || $this->nmgp_cmp_readonly['add_'] != "on") {$this->nmgp_cmp_readonly['add_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sercodigo_']) || $this->nmgp_cmp_readonly['sercodigo_'] != "on") {$this->nmgp_cmp_readonly['sercodigo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dprcantidad_']) || $this->nmgp_cmp_readonly['dprcantidad_'] != "on") {$this->nmgp_cmp_readonly['dprcantidad_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dprprecio_']) || $this->nmgp_cmp_readonly['dprprecio_'] != "on") {$this->nmgp_cmp_readonly['dprprecio_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dprporcendesc_']) || $this->nmgp_cmp_readonly['dprporcendesc_'] != "on") {$this->nmgp_cmp_readonly['dprporcendesc_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dprtotal_']) || $this->nmgp_cmp_readonly['dprtotal_'] != "on") {$this->nmgp_cmp_readonly['dprtotal_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dprabonado_']) || $this->nmgp_cmp_readonly['dprabonado_'] != "on") {$this->nmgp_cmp_readonly['dprabonado_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dprsaldo_']) || $this->nmgp_cmp_readonly['dprsaldo_'] != "on") {$this->nmgp_cmp_readonly['dprsaldo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dproriginal_']) || $this->nmgp_cmp_readonly['dproriginal_'] != "on") {$this->nmgp_cmp_readonly['dproriginal_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->add_ = $this->form_vert_form_detalle_presupuesto_cita[$sc_seq_vert]['add_']; 
       $add_ = $this->add_; 
       $sStyleHidden_add_ = '';
       if (isset($sCheckRead_add_))
       {
           unset($sCheckRead_add_);
       }
       if (isset($this->nmgp_cmp_readonly['add_']))
       {
           $sCheckRead_add_ = $this->nmgp_cmp_readonly['add_'];
       }
       if (isset($this->nmgp_cmp_hidden['add_']) && $this->nmgp_cmp_hidden['add_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['add_']);
           $sStyleHidden_add_ = 'display: none;';
       }
       $bTestReadOnly_add_ = true;
       $sStyleReadLab_add_ = 'display: none;';
       $sStyleReadInp_add_ = '';
       if (isset($this->nmgp_cmp_readonly['add_']) && $this->nmgp_cmp_readonly['add_'] == 'on')
       {
           $bTestReadOnly_add_ = false;
           unset($this->nmgp_cmp_readonly['add_']);
           $sStyleReadLab_add_ = '';
           $sStyleReadInp_add_ = 'display: none;';
       }
       $this->sercodigo_ = $this->form_vert_form_detalle_presupuesto_cita[$sc_seq_vert]['sercodigo_']; 
       $sercodigo_ = $this->sercodigo_; 
       $sStyleHidden_sercodigo_ = '';
       if (isset($sCheckRead_sercodigo_))
       {
           unset($sCheckRead_sercodigo_);
       }
       if (isset($this->nmgp_cmp_readonly['sercodigo_']))
       {
           $sCheckRead_sercodigo_ = $this->nmgp_cmp_readonly['sercodigo_'];
       }
       if (isset($this->nmgp_cmp_hidden['sercodigo_']) && $this->nmgp_cmp_hidden['sercodigo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['sercodigo_']);
           $sStyleHidden_sercodigo_ = 'display: none;';
       }
       $bTestReadOnly_sercodigo_ = true;
       $sStyleReadLab_sercodigo_ = 'display: none;';
       $sStyleReadInp_sercodigo_ = '';
       if (isset($this->nmgp_cmp_readonly['sercodigo_']) && $this->nmgp_cmp_readonly['sercodigo_'] == 'on')
       {
           $bTestReadOnly_sercodigo_ = false;
           unset($this->nmgp_cmp_readonly['sercodigo_']);
           $sStyleReadLab_sercodigo_ = '';
           $sStyleReadInp_sercodigo_ = 'display: none;';
       }
       $this->dprcantidad_ = $this->form_vert_form_detalle_presupuesto_cita[$sc_seq_vert]['dprcantidad_']; 
       $dprcantidad_ = $this->dprcantidad_; 
       $sStyleHidden_dprcantidad_ = '';
       if (isset($sCheckRead_dprcantidad_))
       {
           unset($sCheckRead_dprcantidad_);
       }
       if (isset($this->nmgp_cmp_readonly['dprcantidad_']))
       {
           $sCheckRead_dprcantidad_ = $this->nmgp_cmp_readonly['dprcantidad_'];
       }
       if (isset($this->nmgp_cmp_hidden['dprcantidad_']) && $this->nmgp_cmp_hidden['dprcantidad_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dprcantidad_']);
           $sStyleHidden_dprcantidad_ = 'display: none;';
       }
       $bTestReadOnly_dprcantidad_ = true;
       $sStyleReadLab_dprcantidad_ = 'display: none;';
       $sStyleReadInp_dprcantidad_ = '';
       if (isset($this->nmgp_cmp_readonly['dprcantidad_']) && $this->nmgp_cmp_readonly['dprcantidad_'] == 'on')
       {
           $bTestReadOnly_dprcantidad_ = false;
           unset($this->nmgp_cmp_readonly['dprcantidad_']);
           $sStyleReadLab_dprcantidad_ = '';
           $sStyleReadInp_dprcantidad_ = 'display: none;';
       }
       $this->dprprecio_ = $this->form_vert_form_detalle_presupuesto_cita[$sc_seq_vert]['dprprecio_']; 
       $dprprecio_ = $this->dprprecio_; 
       $sStyleHidden_dprprecio_ = '';
       if (isset($sCheckRead_dprprecio_))
       {
           unset($sCheckRead_dprprecio_);
       }
       if (isset($this->nmgp_cmp_readonly['dprprecio_']))
       {
           $sCheckRead_dprprecio_ = $this->nmgp_cmp_readonly['dprprecio_'];
       }
       if (isset($this->nmgp_cmp_hidden['dprprecio_']) && $this->nmgp_cmp_hidden['dprprecio_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dprprecio_']);
           $sStyleHidden_dprprecio_ = 'display: none;';
       }
       $bTestReadOnly_dprprecio_ = true;
       $sStyleReadLab_dprprecio_ = 'display: none;';
       $sStyleReadInp_dprprecio_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["dprprecio_"]) &&  $this->nmgp_cmp_readonly["dprprecio_"] == "on"))
       {
           $bTestReadOnly_dprprecio_ = false;
           unset($this->nmgp_cmp_readonly['dprprecio_']);
           $sStyleReadLab_dprprecio_ = '';
           $sStyleReadInp_dprprecio_ = 'display: none;';
       }
       $this->dprporcendesc_ = $this->form_vert_form_detalle_presupuesto_cita[$sc_seq_vert]['dprporcendesc_']; 
       $dprporcendesc_ = $this->dprporcendesc_; 
       $sStyleHidden_dprporcendesc_ = '';
       if (isset($sCheckRead_dprporcendesc_))
       {
           unset($sCheckRead_dprporcendesc_);
       }
       if (isset($this->nmgp_cmp_readonly['dprporcendesc_']))
       {
           $sCheckRead_dprporcendesc_ = $this->nmgp_cmp_readonly['dprporcendesc_'];
       }
       if (isset($this->nmgp_cmp_hidden['dprporcendesc_']) && $this->nmgp_cmp_hidden['dprporcendesc_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dprporcendesc_']);
           $sStyleHidden_dprporcendesc_ = 'display: none;';
       }
       $bTestReadOnly_dprporcendesc_ = true;
       $sStyleReadLab_dprporcendesc_ = 'display: none;';
       $sStyleReadInp_dprporcendesc_ = '';
       if (isset($this->nmgp_cmp_readonly['dprporcendesc_']) && $this->nmgp_cmp_readonly['dprporcendesc_'] == 'on')
       {
           $bTestReadOnly_dprporcendesc_ = false;
           unset($this->nmgp_cmp_readonly['dprporcendesc_']);
           $sStyleReadLab_dprporcendesc_ = '';
           $sStyleReadInp_dprporcendesc_ = 'display: none;';
       }
       $this->dprtotal_ = $this->form_vert_form_detalle_presupuesto_cita[$sc_seq_vert]['dprtotal_']; 
       $dprtotal_ = $this->dprtotal_; 
       $sStyleHidden_dprtotal_ = '';
       if (isset($sCheckRead_dprtotal_))
       {
           unset($sCheckRead_dprtotal_);
       }
       if (isset($this->nmgp_cmp_readonly['dprtotal_']))
       {
           $sCheckRead_dprtotal_ = $this->nmgp_cmp_readonly['dprtotal_'];
       }
       if (isset($this->nmgp_cmp_hidden['dprtotal_']) && $this->nmgp_cmp_hidden['dprtotal_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dprtotal_']);
           $sStyleHidden_dprtotal_ = 'display: none;';
       }
       $bTestReadOnly_dprtotal_ = true;
       $sStyleReadLab_dprtotal_ = 'display: none;';
       $sStyleReadInp_dprtotal_ = '';
       if (isset($this->nmgp_cmp_readonly['dprtotal_']) && $this->nmgp_cmp_readonly['dprtotal_'] == 'on')
       {
           $bTestReadOnly_dprtotal_ = false;
           unset($this->nmgp_cmp_readonly['dprtotal_']);
           $sStyleReadLab_dprtotal_ = '';
           $sStyleReadInp_dprtotal_ = 'display: none;';
       }
       $this->dprabonado_ = $this->form_vert_form_detalle_presupuesto_cita[$sc_seq_vert]['dprabonado_']; 
       $dprabonado_ = $this->dprabonado_; 
       $sStyleHidden_dprabonado_ = '';
       if (isset($sCheckRead_dprabonado_))
       {
           unset($sCheckRead_dprabonado_);
       }
       if (isset($this->nmgp_cmp_readonly['dprabonado_']))
       {
           $sCheckRead_dprabonado_ = $this->nmgp_cmp_readonly['dprabonado_'];
       }
       if (isset($this->nmgp_cmp_hidden['dprabonado_']) && $this->nmgp_cmp_hidden['dprabonado_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dprabonado_']);
           $sStyleHidden_dprabonado_ = 'display: none;';
       }
       $bTestReadOnly_dprabonado_ = true;
       $sStyleReadLab_dprabonado_ = 'display: none;';
       $sStyleReadInp_dprabonado_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["dprabonado_"]) &&  $this->nmgp_cmp_readonly["dprabonado_"] == "on"))
       {
           $bTestReadOnly_dprabonado_ = false;
           unset($this->nmgp_cmp_readonly['dprabonado_']);
           $sStyleReadLab_dprabonado_ = '';
           $sStyleReadInp_dprabonado_ = 'display: none;';
       }
       $this->dprsaldo_ = $this->form_vert_form_detalle_presupuesto_cita[$sc_seq_vert]['dprsaldo_']; 
       $dprsaldo_ = $this->dprsaldo_; 
       $sStyleHidden_dprsaldo_ = '';
       if (isset($sCheckRead_dprsaldo_))
       {
           unset($sCheckRead_dprsaldo_);
       }
       if (isset($this->nmgp_cmp_readonly['dprsaldo_']))
       {
           $sCheckRead_dprsaldo_ = $this->nmgp_cmp_readonly['dprsaldo_'];
       }
       if (isset($this->nmgp_cmp_hidden['dprsaldo_']) && $this->nmgp_cmp_hidden['dprsaldo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dprsaldo_']);
           $sStyleHidden_dprsaldo_ = 'display: none;';
       }
       $bTestReadOnly_dprsaldo_ = true;
       $sStyleReadLab_dprsaldo_ = 'display: none;';
       $sStyleReadInp_dprsaldo_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["dprsaldo_"]) &&  $this->nmgp_cmp_readonly["dprsaldo_"] == "on"))
       {
           $bTestReadOnly_dprsaldo_ = false;
           unset($this->nmgp_cmp_readonly['dprsaldo_']);
           $sStyleReadLab_dprsaldo_ = '';
           $sStyleReadInp_dprsaldo_ = 'display: none;';
       }
       $this->dproriginal_ = $this->form_vert_form_detalle_presupuesto_cita[$sc_seq_vert]['dproriginal_']; 
       $dproriginal_ = $this->dproriginal_; 
       $sStyleHidden_dproriginal_ = '';
       if (isset($sCheckRead_dproriginal_))
       {
           unset($sCheckRead_dproriginal_);
       }
       if (isset($this->nmgp_cmp_readonly['dproriginal_']))
       {
           $sCheckRead_dproriginal_ = $this->nmgp_cmp_readonly['dproriginal_'];
       }
       if (isset($this->nmgp_cmp_hidden['dproriginal_']) && $this->nmgp_cmp_hidden['dproriginal_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dproriginal_']);
           $sStyleHidden_dproriginal_ = 'display: none;';
       }
       $bTestReadOnly_dproriginal_ = true;
       $sStyleReadLab_dproriginal_ = 'display: none;';
       $sStyleReadInp_dproriginal_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["dproriginal_"]) &&  $this->nmgp_cmp_readonly["dproriginal_"] == "on"))
       {
           $bTestReadOnly_dproriginal_ = false;
           unset($this->nmgp_cmp_readonly['dproriginal_']);
           $sStyleReadLab_dproriginal_ = '';
           $sStyleReadInp_dproriginal_ = 'display: none;';
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_detalle_presupuesto_cita_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_detalle_presupuesto_cita_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_detalle_presupuesto_cita_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_detalle_presupuesto_cita_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_detalle_presupuesto_cita_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_detalle_presupuesto_cita_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['add_']) && $this->nmgp_cmp_hidden['add_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="add_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($add_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_add__line" id="hidden_field_data_add_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_add_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_add__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_add_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["add_"]) &&  $this->nmgp_cmp_readonly["add_"] == "on") { 

 ?>
<input type="hidden" name="add_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($add_) . "\">" . $add_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_add_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-add_<?php echo $sc_seq_vert ?> css_add__line" style="<?php echo $sStyleReadLab_add_; ?>"><?php echo $this->form_format_readonly("add_", $this->form_encode_input($this->add_)); ?></span><span id="id_read_off_add_<?php echo $sc_seq_vert ?>" class="css_read_off_add_" style="white-space: nowrap;<?php echo $sStyleReadInp_add_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_add__obj" style="" id="id_sc_field_add_<?php echo $sc_seq_vert ?>" type=text name="add_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($add_) ?>"
 size=1 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_add_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_add_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['sercodigo_']) && $this->nmgp_cmp_hidden['sercodigo_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sercodigo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sercodigo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_sercodigo__line" id="hidden_field_data_sercodigo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_sercodigo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_sercodigo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_sercodigo_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sercodigo_"]) &&  $this->nmgp_cmp_readonly["sercodigo_"] == "on") { 

 ?>
<input type="hidden" name="sercodigo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sercodigo_) . "\">" . $sercodigo_ . ""; ?>
<?php } else { ?>

<?php
$aRecData['sercodigo_'] = $this->sercodigo_;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['Lookup_sercodigo_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['Lookup_sercodigo_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['Lookup_sercodigo_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['Lookup_sercodigo_'] = array(); 
    }

   $old_value_dprcantidad_ = $this->dprcantidad_;
   $old_value_dprprecio_ = $this->dprprecio_;
   $old_value_dprporcendesc_ = $this->dprporcendesc_;
   $old_value_dprtotal_ = $this->dprtotal_;
   $old_value_dprabonado_ = $this->dprabonado_;
   $old_value_dprsaldo_ = $this->dprsaldo_;
   $this->nm_tira_formatacao();


   $unformatted_value_dprcantidad_ = $this->dprcantidad_;
   $unformatted_value_dprprecio_ = $this->dprprecio_;
   $unformatted_value_dprporcendesc_ = $this->dprporcendesc_;
   $unformatted_value_dprtotal_ = $this->dprtotal_;
   $unformatted_value_dprabonado_ = $this->dprabonado_;
   $unformatted_value_dprsaldo_ = $this->dprsaldo_;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT S.sercodigo, E.espnombre + ' - ' + S.sernombre FROM servicio S, especialidad E WHERE (S.espcodigo=E.espcodigo) AND S.sercodigo = " . $aRecData['sercodigo_'] . " ORDER BY E.espnombre, S.sernombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT S.sercodigo, concat(E.espnombre,' - ',S.sernombre) FROM servicio S, especialidad E WHERE (S.espcodigo=E.espcodigo) AND S.sercodigo = " . $aRecData['sercodigo_'] . " ORDER BY E.espnombre, S.sernombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT S.sercodigo, E.espnombre&' - '&S.sernombre FROM servicio S, especialidad E WHERE (S.espcodigo=E.espcodigo) AND S.sercodigo = " . $aRecData['sercodigo_'] . " ORDER BY E.espnombre, S.sernombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT S.sercodigo, E.espnombre||' - '||S.sernombre FROM servicio S, especialidad E WHERE (S.espcodigo=E.espcodigo) AND S.sercodigo = " . $aRecData['sercodigo_'] . " ORDER BY E.espnombre, S.sernombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT S.sercodigo, E.espnombre + ' - ' + S.sernombre FROM servicio S, especialidad E WHERE (S.espcodigo=E.espcodigo) AND S.sercodigo = " . $aRecData['sercodigo_'] . " ORDER BY E.espnombre, S.sernombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT S.sercodigo, E.espnombre||' - '||S.sernombre FROM servicio S, especialidad E WHERE (S.espcodigo=E.espcodigo) AND S.sercodigo = " . $aRecData['sercodigo_'] . " ORDER BY E.espnombre, S.sernombre";
   }
   else
   {
       $nm_comando = "SELECT S.sercodigo, E.espnombre||' - '||S.sernombre FROM servicio S, especialidad E WHERE (S.espcodigo=E.espcodigo) AND S.sercodigo = " . $aRecData['sercodigo_'] . " ORDER BY E.espnombre, S.sernombre";
   }

   $this->dprcantidad_ = $old_value_dprcantidad_;
   $this->dprprecio_ = $old_value_dprprecio_;
   $this->dprporcendesc_ = $old_value_dprporcendesc_;
   $this->dprtotal_ = $old_value_dprtotal_;
   $this->dprabonado_ = $old_value_dprabonado_;
   $this->dprsaldo_ = $old_value_dprsaldo_;

   if ('' != $aRecData['sercodigo_'] && '' != $aRecData['sercodigo_'] && '' != $aRecData['sercodigo_'] && '' != $aRecData['sercodigo_'] && '' != $aRecData['sercodigo_'] && '' != $aRecData['sercodigo_'] && '' != $aRecData['sercodigo_'])
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['Lookup_sercodigo_'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->sercodigo_])) ? $aLookup[0][$this->sercodigo_] : $this->sercodigo_;
$sercodigo__look = (isset($aLookup[0][$this->sercodigo_])) ? $aLookup[0][$this->sercodigo_] : $this->sercodigo_;
?>
<span id="id_read_on_sercodigo_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-sercodigo_<?php echo $sc_seq_vert ?> css_sercodigo__line" style="<?php echo $sStyleReadLab_sercodigo_; ?>"><?php echo $this->form_format_readonly("sercodigo_", str_replace("<", "&lt;", $sercodigo__look)); ?></span><span id="id_read_off_sercodigo_<?php echo $sc_seq_vert ?>" class="css_read_off_sercodigo_" style="white-space: nowrap;<?php echo $sStyleReadInp_sercodigo_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_sercodigo__obj" style="display: none;" id="id_sc_field_sercodigo_<?php echo $sc_seq_vert ?>" type=text name="sercodigo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sercodigo_) ?>"
 size=11 maxlength=11 style="display: none" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['sercodigo_'] = $this->sercodigo_;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['Lookup_sercodigo_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['Lookup_sercodigo_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['Lookup_sercodigo_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['Lookup_sercodigo_'] = array(); 
    }

   $old_value_dprcantidad_ = $this->dprcantidad_;
   $old_value_dprprecio_ = $this->dprprecio_;
   $old_value_dprporcendesc_ = $this->dprporcendesc_;
   $old_value_dprtotal_ = $this->dprtotal_;
   $old_value_dprabonado_ = $this->dprabonado_;
   $old_value_dprsaldo_ = $this->dprsaldo_;
   $this->nm_tira_formatacao();


   $unformatted_value_dprcantidad_ = $this->dprcantidad_;
   $unformatted_value_dprprecio_ = $this->dprprecio_;
   $unformatted_value_dprporcendesc_ = $this->dprporcendesc_;
   $unformatted_value_dprtotal_ = $this->dprtotal_;
   $unformatted_value_dprabonado_ = $this->dprabonado_;
   $unformatted_value_dprsaldo_ = $this->dprsaldo_;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT S.sercodigo, E.espnombre + ' - ' + S.sernombre FROM servicio S, especialidad E WHERE (S.espcodigo=E.espcodigo) AND S.sercodigo = " . $aRecData['sercodigo_'] . " ORDER BY E.espnombre, S.sernombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT S.sercodigo, concat(E.espnombre,' - ',S.sernombre) FROM servicio S, especialidad E WHERE (S.espcodigo=E.espcodigo) AND S.sercodigo = " . $aRecData['sercodigo_'] . " ORDER BY E.espnombre, S.sernombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT S.sercodigo, E.espnombre&' - '&S.sernombre FROM servicio S, especialidad E WHERE (S.espcodigo=E.espcodigo) AND S.sercodigo = " . $aRecData['sercodigo_'] . " ORDER BY E.espnombre, S.sernombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT S.sercodigo, E.espnombre||' - '||S.sernombre FROM servicio S, especialidad E WHERE (S.espcodigo=E.espcodigo) AND S.sercodigo = " . $aRecData['sercodigo_'] . " ORDER BY E.espnombre, S.sernombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT S.sercodigo, E.espnombre + ' - ' + S.sernombre FROM servicio S, especialidad E WHERE (S.espcodigo=E.espcodigo) AND S.sercodigo = " . $aRecData['sercodigo_'] . " ORDER BY E.espnombre, S.sernombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT S.sercodigo, E.espnombre||' - '||S.sernombre FROM servicio S, especialidad E WHERE (S.espcodigo=E.espcodigo) AND S.sercodigo = " . $aRecData['sercodigo_'] . " ORDER BY E.espnombre, S.sernombre";
   }
   else
   {
       $nm_comando = "SELECT S.sercodigo, E.espnombre||' - '||S.sernombre FROM servicio S, especialidad E WHERE (S.espcodigo=E.espcodigo) AND S.sercodigo = " . $aRecData['sercodigo_'] . " ORDER BY E.espnombre, S.sernombre";
   }

   $this->dprcantidad_ = $old_value_dprcantidad_;
   $this->dprprecio_ = $old_value_dprprecio_;
   $this->dprporcendesc_ = $old_value_dprporcendesc_;
   $this->dprtotal_ = $old_value_dprtotal_;
   $this->dprabonado_ = $old_value_dprabonado_;
   $this->dprsaldo_ = $old_value_dprsaldo_;

   if ('' != $aRecData['sercodigo_'] && '' != $aRecData['sercodigo_'] && '' != $aRecData['sercodigo_'] && '' != $aRecData['sercodigo_'] && '' != $aRecData['sercodigo_'] && '' != $aRecData['sercodigo_'] && '' != $aRecData['sercodigo_'])
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['Lookup_sercodigo_'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->sercodigo_])) ? $aLookup[0][$this->sercodigo_] : '';
$sercodigo__look = (isset($aLookup[0][$this->sercodigo_])) ? $aLookup[0][$this->sercodigo_] : '';
?>
<input type="text" id="id_ac_sercodigo_<?php echo $sc_seq_vert; ?>" name="sercodigo_<?php echo $sc_seq_vert; ?>_autocomp" class="scFormObjectOddMult sc-ui-autocomp-sercodigo_ css_sercodigo__obj" size="30" value="<?php echo $sAutocompValue; ?>" alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"  /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sercodigo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sercodigo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dprcantidad_']) && $this->nmgp_cmp_hidden['dprcantidad_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dprcantidad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dprcantidad_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dprcantidad__line" id="hidden_field_data_dprcantidad_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dprcantidad_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOddMult css_dprcantidad__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dprcantidad_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dprcantidad_"]) &&  $this->nmgp_cmp_readonly["dprcantidad_"] == "on") { 

 ?>
<input type="hidden" name="dprcantidad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dprcantidad_) . "\">" . $dprcantidad_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dprcantidad_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dprcantidad_<?php echo $sc_seq_vert ?> css_dprcantidad__line" style="<?php echo $sStyleReadLab_dprcantidad_; ?>"><?php echo $this->form_format_readonly("dprcantidad_", $this->form_encode_input($this->dprcantidad_)); ?></span><span id="id_read_off_dprcantidad_<?php echo $sc_seq_vert ?>" class="css_read_off_dprcantidad_" style="white-space: nowrap;<?php echo $sStyleReadInp_dprcantidad_; ?>">
 <input class="sc-js-input scFormObjectOddMult scFormObjectOddMultSpin scSpin_dprcantidad__obj css_dprcantidad__obj" style="" id="id_sc_field_dprcantidad_<?php echo $sc_seq_vert ?>" type=text name="dprcantidad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dprcantidad_) ?>"
 size=2 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dprcantidad_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dprcantidad_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['dprcantidad_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dprcantidad_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dprcantidad_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dprprecio_']) && $this->nmgp_cmp_hidden['dprprecio_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dprprecio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dprprecio_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dprprecio__line" id="hidden_field_data_dprprecio_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dprprecio_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOddMult css_dprprecio__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dprprecio_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["dprprecio_"]) &&  $this->nmgp_cmp_readonly["dprprecio_"] == "on")) { 

 ?>
<input type="hidden" name="dprprecio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dprprecio_) . "\"><span id=\"id_ajax_label_dprprecio_" . $sc_seq_vert . "\">" . $dprprecio_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_dprprecio_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dprprecio_<?php echo $sc_seq_vert ?> css_dprprecio__line" style="<?php echo $sStyleReadLab_dprprecio_; ?>"><?php echo $this->form_format_readonly("dprprecio_", $this->form_encode_input($this->dprprecio_)); ?></span><span id="id_read_off_dprprecio_<?php echo $sc_seq_vert ?>" class="css_read_off_dprprecio_" style="white-space: nowrap;<?php echo $sStyleReadInp_dprprecio_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dprprecio__obj" style="" id="id_sc_field_dprprecio_<?php echo $sc_seq_vert ?>" type=text name="dprprecio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dprprecio_) ?>"
 size=12 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['dprprecio_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['dprprecio_']['format_pos'] || 3 == $this->field_config['dprprecio_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['dprprecio_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dprprecio_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dprprecio_']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['dprprecio_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dprprecio_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dprprecio_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dprporcendesc_']) && $this->nmgp_cmp_hidden['dprporcendesc_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dprporcendesc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dprporcendesc_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dprporcendesc__line" id="hidden_field_data_dprporcendesc_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dprporcendesc_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOddMult css_dprporcendesc__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dprporcendesc_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dprporcendesc_"]) &&  $this->nmgp_cmp_readonly["dprporcendesc_"] == "on") { 

 ?>
<input type="hidden" name="dprporcendesc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dprporcendesc_) . "\">" . $dprporcendesc_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dprporcendesc_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dprporcendesc_<?php echo $sc_seq_vert ?> css_dprporcendesc__line" style="<?php echo $sStyleReadLab_dprporcendesc_; ?>"><?php echo $this->form_format_readonly("dprporcendesc_", $this->form_encode_input($this->dprporcendesc_)); ?></span><span id="id_read_off_dprporcendesc_<?php echo $sc_seq_vert ?>" class="css_read_off_dprporcendesc_" style="white-space: nowrap;<?php echo $sStyleReadInp_dprporcendesc_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dprporcendesc__obj" style="" id="id_sc_field_dprporcendesc_<?php echo $sc_seq_vert ?>" type=text name="dprporcendesc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dprporcendesc_) ?>"
 size=3 alt="{datatype: 'decimal', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['dprporcendesc_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dprporcendesc_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dprporcendesc_']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['dprporcendesc_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dprporcendesc_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dprporcendesc_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dprtotal_']) && $this->nmgp_cmp_hidden['dprtotal_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dprtotal_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dprtotal_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dprtotal__line" id="hidden_field_data_dprtotal_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dprtotal_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOddMult css_dprtotal__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dprtotal_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dprtotal_"]) &&  $this->nmgp_cmp_readonly["dprtotal_"] == "on") { 

 ?>
<input type="hidden" name="dprtotal_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dprtotal_) . "\">" . $dprtotal_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dprtotal_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dprtotal_<?php echo $sc_seq_vert ?> css_dprtotal__line" style="<?php echo $sStyleReadLab_dprtotal_; ?>"><?php echo $this->form_format_readonly("dprtotal_", $this->form_encode_input($this->dprtotal_)); ?></span><span id="id_read_off_dprtotal_<?php echo $sc_seq_vert ?>" class="css_read_off_dprtotal_" style="white-space: nowrap;<?php echo $sStyleReadInp_dprtotal_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dprtotal__obj" style="" id="id_sc_field_dprtotal_<?php echo $sc_seq_vert ?>" type=text name="dprtotal_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dprtotal_) ?>"
 size=7 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['dprtotal_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['dprtotal_']['format_pos'] || 3 == $this->field_config['dprtotal_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['dprtotal_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dprtotal_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dprtotal_']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['dprtotal_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dprtotal_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dprtotal_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dprabonado_']) && $this->nmgp_cmp_hidden['dprabonado_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dprabonado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dprabonado_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dprabonado__line" id="hidden_field_data_dprabonado_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dprabonado_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOddMult css_dprabonado__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dprabonado_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["dprabonado_"]) &&  $this->nmgp_cmp_readonly["dprabonado_"] == "on")) { 

 ?>
<input type="hidden" name="dprabonado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dprabonado_) . "\"><span id=\"id_ajax_label_dprabonado_" . $sc_seq_vert . "\">" . $dprabonado_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_dprabonado_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dprabonado_<?php echo $sc_seq_vert ?> css_dprabonado__line" style="<?php echo $sStyleReadLab_dprabonado_; ?>"><?php echo $this->form_format_readonly("dprabonado_", $this->form_encode_input($this->dprabonado_)); ?></span><span id="id_read_off_dprabonado_<?php echo $sc_seq_vert ?>" class="css_read_off_dprabonado_" style="white-space: nowrap;<?php echo $sStyleReadInp_dprabonado_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dprabonado__obj" style="" id="id_sc_field_dprabonado_<?php echo $sc_seq_vert ?>" type=text name="dprabonado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dprabonado_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['dprabonado_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['dprabonado_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dprabonado_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dprabonado_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dprsaldo_']) && $this->nmgp_cmp_hidden['dprsaldo_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dprsaldo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dprsaldo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dprsaldo__line" id="hidden_field_data_dprsaldo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dprsaldo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOddMult css_dprsaldo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dprsaldo_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["dprsaldo_"]) &&  $this->nmgp_cmp_readonly["dprsaldo_"] == "on")) { 

 ?>
<input type="hidden" name="dprsaldo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dprsaldo_) . "\"><span id=\"id_ajax_label_dprsaldo_" . $sc_seq_vert . "\">" . $dprsaldo_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_dprsaldo_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dprsaldo_<?php echo $sc_seq_vert ?> css_dprsaldo__line" style="<?php echo $sStyleReadLab_dprsaldo_; ?>"><?php echo $this->form_format_readonly("dprsaldo_", $this->form_encode_input($this->dprsaldo_)); ?></span><span id="id_read_off_dprsaldo_<?php echo $sc_seq_vert ?>" class="css_read_off_dprsaldo_" style="white-space: nowrap;<?php echo $sStyleReadInp_dprsaldo_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dprsaldo__obj" style="" id="id_sc_field_dprsaldo_<?php echo $sc_seq_vert ?>" type=text name="dprsaldo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dprsaldo_) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['dprsaldo_']['symbol_fmt']; ?>, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['dprsaldo_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dprsaldo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dprsaldo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dproriginal_']) && $this->nmgp_cmp_hidden['dproriginal_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="dproriginal_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->dproriginal_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dproriginal__line" id="hidden_field_data_dproriginal_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dproriginal_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dproriginal__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dproriginal_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["dproriginal_"]) &&  $this->nmgp_cmp_readonly["dproriginal_"] == "on")) { 

$dproriginal__look = "";
 if ($this->dproriginal_ == "1") { $dproriginal__look .= "SÍ" ;} 
 if ($this->dproriginal_ == "0") { $dproriginal__look .= "NO" ;} 
 if (empty($dproriginal__look)) { $dproriginal__look = $this->dproriginal_; }
?>
<input type="hidden" name="dproriginal_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dproriginal_) . "\"><span id=\"id_ajax_label_dproriginal_" . $sc_seq_vert . "\">" . $dproriginal__look . "</span>"; ?>
<?php } else { ?>
<?php

$dproriginal__look = "";
 if ($this->dproriginal_ == "1") { $dproriginal__look .= "SÍ" ;} 
 if ($this->dproriginal_ == "0") { $dproriginal__look .= "NO" ;} 
 if (empty($dproriginal__look)) { $dproriginal__look = $this->dproriginal_; }
?>
<span id="id_read_on_dproriginal_<?php echo $sc_seq_vert ; ?>" class="css_dproriginal__line"  style="<?php echo $sStyleReadLab_dproriginal_; ?>"><?php echo $this->form_format_readonly("dproriginal_", $this->form_encode_input($dproriginal__look)); ?></span><span id="id_read_off_dproriginal_<?php echo $sc_seq_vert ; ?>" class="css_read_off_dproriginal_" style="white-space: nowrap; <?php echo $sStyleReadInp_dproriginal_; ?>">
 <span id="idAjaxSelect_dproriginal_<?php echo $sc_seq_vert ?>"><select class="sc-js-input scFormObjectOddMult css_dproriginal__obj" style="" id="id_sc_field_dproriginal_<?php echo $sc_seq_vert ?>" name="dproriginal_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="1" <?php  if ($this->dproriginal_ == "1") { echo " selected" ;} ?>>SÍ</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['Lookup_dproriginal_'][] = '1'; ?>
 <option  value="0" <?php  if ($this->dproriginal_ == "0") { echo " selected" ;} ?>>NO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['Lookup_dproriginal_'][] = '0'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dproriginal_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dproriginal_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_add_))
       {
           $this->nmgp_cmp_readonly['add_'] = $sCheckRead_add_;
       }
       if ('display: none;' == $sStyleHidden_add_)
       {
           $this->nmgp_cmp_hidden['add_'] = 'off';
       }
       if (isset($sCheckRead_sercodigo_))
       {
           $this->nmgp_cmp_readonly['sercodigo_'] = $sCheckRead_sercodigo_;
       }
       if ('display: none;' == $sStyleHidden_sercodigo_)
       {
           $this->nmgp_cmp_hidden['sercodigo_'] = 'off';
       }
       if (isset($sCheckRead_dprcantidad_))
       {
           $this->nmgp_cmp_readonly['dprcantidad_'] = $sCheckRead_dprcantidad_;
       }
       if ('display: none;' == $sStyleHidden_dprcantidad_)
       {
           $this->nmgp_cmp_hidden['dprcantidad_'] = 'off';
       }
       if (isset($sCheckRead_dprprecio_))
       {
           $this->nmgp_cmp_readonly['dprprecio_'] = $sCheckRead_dprprecio_;
       }
       if ('display: none;' == $sStyleHidden_dprprecio_)
       {
           $this->nmgp_cmp_hidden['dprprecio_'] = 'off';
       }
       if (isset($sCheckRead_dprporcendesc_))
       {
           $this->nmgp_cmp_readonly['dprporcendesc_'] = $sCheckRead_dprporcendesc_;
       }
       if ('display: none;' == $sStyleHidden_dprporcendesc_)
       {
           $this->nmgp_cmp_hidden['dprporcendesc_'] = 'off';
       }
       if (isset($sCheckRead_dprtotal_))
       {
           $this->nmgp_cmp_readonly['dprtotal_'] = $sCheckRead_dprtotal_;
       }
       if ('display: none;' == $sStyleHidden_dprtotal_)
       {
           $this->nmgp_cmp_hidden['dprtotal_'] = 'off';
       }
       if (isset($sCheckRead_dprabonado_))
       {
           $this->nmgp_cmp_readonly['dprabonado_'] = $sCheckRead_dprabonado_;
       }
       if ('display: none;' == $sStyleHidden_dprabonado_)
       {
           $this->nmgp_cmp_hidden['dprabonado_'] = 'off';
       }
       if (isset($sCheckRead_dprsaldo_))
       {
           $this->nmgp_cmp_readonly['dprsaldo_'] = $sCheckRead_dprsaldo_;
       }
       if ('display: none;' == $sStyleHidden_dprsaldo_)
       {
           $this->nmgp_cmp_hidden['dprsaldo_'] = 'off';
       }
       if (isset($sCheckRead_dproriginal_))
       {
           $this->nmgp_cmp_readonly['dproriginal_'] = $sCheckRead_dproriginal_;
       }
       if ('display: none;' == $sStyleHidden_dproriginal_)
       {
           $this->nmgp_cmp_hidden['dproriginal_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_detalle_presupuesto_cita = $guarda_form_vert_form_detalle_presupuesto_cita;
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] != "R")
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
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8592;)", "sc-unique-btn-10", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
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
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8594;)", "sc-unique-btn-12", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
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
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_detalle_presupuesto_cita");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_detalle_presupuesto_cita");
 parent.scAjaxDetailHeight("form_detalle_presupuesto_cita", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_detalle_presupuesto_cita", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_detalle_presupuesto_cita", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['sc_modal'])
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
			do_ajax_form_detalle_presupuesto_cita_add_new_line(); return false;
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
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_presupuesto_cita']['buttonStatus'] = $this->nmgp_botoes;
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
