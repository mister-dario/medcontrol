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
.css_read_off_fech_vence button {
	background-color: transparent;
	border: 0;
	padding: 0
}
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
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_cita/form_cita_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_cita_sajax_js.php");
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

 function hide() {
  alert('Hola');
 } // hide
<?php

include_once('form_cita_jquery.php');

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
    if ("hidden_bloco_3" == block_id) {
      scAjaxDetailHeight("form_detalle_presupuesto_cita", $($("#nmsc_iframe_liga_form_detalle_presupuesto_cita")[0].contentWindow.document).innerHeight());
    }
    if ("hidden_bloco_4" == block_id) {
      scAjaxDetailHeight("form_detalle_citadiagnos", "500");
      scAjaxDetailHeight("form_detalle_cita_presup", "500");
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['recarga'];
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
 include_once("form_cita_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_cita'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_cita'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php echo "PROCESAR CITA" ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo "" . $_SESSION['var_docum'] . "" ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['fast_search'][2] : "";
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
        $sCondStyle = ($this->nmgp_botoes['CONTINUAR'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "continuar", "scBtnFn_CONTINUAR()", "scBtnFn_CONTINUAR()", "sc_CONTINUAR_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['regresar'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "regresar", "scBtnFn_regresar()", "scBtnFn_regresar()", "sc_regresar_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['val_primcli']))
   {
       $this->nmgp_cmp_hidden['val_primcli'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['estado_presupuesto']))
   {
       $this->nmgp_cmp_hidden['estado_presupuesto'] = 'off';
   }
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_fclnumero']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_fclnumero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_fclnumero']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_fclnumero'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_fclnumero']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_fclnumero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_fclnumero']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_fclnumero'] = array(); 
    }

   $old_value_totalsinimp = $this->totalsinimp;
   $old_value_totaldesc = $this->totaldesc;
   $old_value_base12 = $this->base12;
   $old_value_base0 = $this->base0;
   $old_value_valor_iva = $this->valor_iva;
   $old_value_importe_total = $this->importe_total;
   $old_value_valor_efec = $this->valor_efec;
   $old_value_valor_cheque = $this->valor_cheque;
   $old_value_valor_tarjcred = $this->valor_tarjcred;
   $old_value_valor_transfer = $this->valor_transfer;
   $old_value_num_tarjcred = $this->num_tarjcred;
   $old_value_fech_vence = $this->fech_vence;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_totalsinimp = $this->totalsinimp;
   $unformatted_value_totaldesc = $this->totaldesc;
   $unformatted_value_base12 = $this->base12;
   $unformatted_value_base0 = $this->base0;
   $unformatted_value_valor_iva = $this->valor_iva;
   $unformatted_value_importe_total = $this->importe_total;
   $unformatted_value_valor_efec = $this->valor_efec;
   $unformatted_value_valor_cheque = $this->valor_cheque;
   $unformatted_value_valor_tarjcred = $this->valor_tarjcred;
   $unformatted_value_valor_transfer = $this->valor_transfer;
   $unformatted_value_num_tarjcred = $this->num_tarjcred;
   $unformatted_value_fech_vence = $this->fech_vence;

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

   $this->totalsinimp = $old_value_totalsinimp;
   $this->totaldesc = $old_value_totaldesc;
   $this->base12 = $old_value_base12;
   $this->base0 = $old_value_base0;
   $this->valor_iva = $old_value_valor_iva;
   $this->importe_total = $old_value_importe_total;
   $this->valor_efec = $old_value_valor_efec;
   $this->valor_cheque = $old_value_valor_cheque;
   $this->valor_tarjcred = $old_value_valor_tarjcred;
   $this->valor_transfer = $old_value_valor_transfer;
   $this->num_tarjcred = $old_value_num_tarjcred;
   $this->fech_vence = $old_value_fech_vence;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_fclnumero'][] = $rs->fields[0];
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





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['procesar_factura']))
   {
       $this->nm_new_label['procesar_factura'] = "PROCESAR";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $procesar_factura = $this->procesar_factura;
   $sStyleHidden_procesar_factura = '';
   if (isset($this->nmgp_cmp_hidden['procesar_factura']) && $this->nmgp_cmp_hidden['procesar_factura'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['procesar_factura']);
       $sStyleHidden_procesar_factura = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_procesar_factura = 'display: none;';
   $sStyleReadInp_procesar_factura = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['procesar_factura']) && $this->nmgp_cmp_readonly['procesar_factura'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['procesar_factura']);
       $sStyleReadLab_procesar_factura = '';
       $sStyleReadInp_procesar_factura = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['procesar_factura']) && $this->nmgp_cmp_hidden['procesar_factura'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="procesar_factura" value="<?php echo $this->form_encode_input($this->procesar_factura) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_procesar_factura_line" id="hidden_field_data_procesar_factura" style="<?php echo $sStyleHidden_procesar_factura; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_procesar_factura_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_procesar_factura_label" style=""><span id="id_label_procesar_factura"><?php echo $this->nm_new_label['procesar_factura']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["procesar_factura"]) &&  $this->nmgp_cmp_readonly["procesar_factura"] == "on") { 

$procesar_factura_look = "";
 if ($this->procesar_factura == "F") { $procesar_factura_look .= "FACTURA" ;} 
 if ($this->procesar_factura == "O") { $procesar_factura_look .= "ORDEN DE TRABAJO" ;} 
 if (empty($procesar_factura_look)) { $procesar_factura_look = $this->procesar_factura; }
?>
<input type="hidden" name="procesar_factura" value="<?php echo $this->form_encode_input($procesar_factura) . "\">" . $procesar_factura_look . ""; ?>
<?php } else { ?>
<?php

$procesar_factura_look = "";
 if ($this->procesar_factura == "F") { $procesar_factura_look .= "FACTURA" ;} 
 if ($this->procesar_factura == "O") { $procesar_factura_look .= "ORDEN DE TRABAJO" ;} 
 if (empty($procesar_factura_look)) { $procesar_factura_look = $this->procesar_factura; }
?>
<span id="id_read_on_procesar_factura" class="css_procesar_factura_line"  style="<?php echo $sStyleReadLab_procesar_factura; ?>"><?php echo $this->form_format_readonly("procesar_factura", $this->form_encode_input($procesar_factura_look)); ?></span><span id="id_read_off_procesar_factura" class="css_read_off_procesar_factura" style="white-space: nowrap; <?php echo $sStyleReadInp_procesar_factura; ?>">
 <span id="idAjaxSelect_procesar_factura"><select class="sc-js-input scFormObjectOdd css_procesar_factura_obj" style="" id="id_sc_field_procesar_factura" name="procesar_factura" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_procesar_factura'][] = ''; ?>
 <option value="">------------------------</option>
 <option  value="F" <?php  if ($this->procesar_factura == "F") { echo " selected" ;} ?>>FACTURA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_procesar_factura'][] = 'F'; ?>
 <option  value="O" <?php  if ($this->procesar_factura == "O") { echo " selected" ;} ?>>ORDEN DE TRABAJO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_procesar_factura'][] = 'O'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_procesar_factura_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_procesar_factura_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['totalsinimp']))
           {
               $this->nmgp_cmp_readonly['totalsinimp'] = 'on';
           }
?>


   <?php
   if (!isset($this->nm_new_label['emisor']))
   {
       $this->nm_new_label['emisor'] = "EMISOR";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $emisor = $this->emisor;
   $sStyleHidden_emisor = '';
   if (isset($this->nmgp_cmp_hidden['emisor']) && $this->nmgp_cmp_hidden['emisor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['emisor']);
       $sStyleHidden_emisor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_emisor = 'display: none;';
   $sStyleReadInp_emisor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['emisor']) && $this->nmgp_cmp_readonly['emisor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['emisor']);
       $sStyleReadLab_emisor = '';
       $sStyleReadInp_emisor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['emisor']) && $this->nmgp_cmp_hidden['emisor'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="emisor" value="<?php echo $this->form_encode_input($this->emisor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_emisor_line" id="hidden_field_data_emisor" style="<?php echo $sStyleHidden_emisor; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_emisor_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_emisor_label" style=""><span id="id_label_emisor"><?php echo $this->nm_new_label['emisor']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["emisor"]) &&  $this->nmgp_cmp_readonly["emisor"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_emisor']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_emisor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_emisor']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_emisor'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_emisor']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_emisor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_emisor']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_emisor'] = array(); 
    }

   $old_value_totalsinimp = $this->totalsinimp;
   $old_value_totaldesc = $this->totaldesc;
   $old_value_base12 = $this->base12;
   $old_value_base0 = $this->base0;
   $old_value_valor_iva = $this->valor_iva;
   $old_value_importe_total = $this->importe_total;
   $old_value_valor_efec = $this->valor_efec;
   $old_value_valor_cheque = $this->valor_cheque;
   $old_value_valor_tarjcred = $this->valor_tarjcred;
   $old_value_valor_transfer = $this->valor_transfer;
   $old_value_num_tarjcred = $this->num_tarjcred;
   $old_value_fech_vence = $this->fech_vence;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_totalsinimp = $this->totalsinimp;
   $unformatted_value_totaldesc = $this->totaldesc;
   $unformatted_value_base12 = $this->base12;
   $unformatted_value_base0 = $this->base0;
   $unformatted_value_valor_iva = $this->valor_iva;
   $unformatted_value_importe_total = $this->importe_total;
   $unformatted_value_valor_efec = $this->valor_efec;
   $unformatted_value_valor_cheque = $this->valor_cheque;
   $unformatted_value_valor_tarjcred = $this->valor_tarjcred;
   $unformatted_value_valor_transfer = $this->valor_transfer;
   $unformatted_value_num_tarjcred = $this->num_tarjcred;
   $unformatted_value_fech_vence = $this->fech_vence;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT emiruc, emiruc + ' - ' + emirazsoc  FROM fac_emisores  where emiactivo=1 ORDER BY emiruc, emirazsoc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT emiruc, concat(emiruc,' - ',emirazsoc)  FROM fac_emisores  where emiactivo=1 ORDER BY emiruc, emirazsoc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT emiruc, emiruc&' - '&emirazsoc  FROM fac_emisores  where emiactivo=1 ORDER BY emiruc, emirazsoc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT emiruc, emiruc||' - '||emirazsoc  FROM fac_emisores  where emiactivo=1 ORDER BY emiruc, emirazsoc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT emiruc, emiruc + ' - ' + emirazsoc  FROM fac_emisores  where emiactivo=1 ORDER BY emiruc, emirazsoc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT emiruc, emiruc||' - '||emirazsoc  FROM fac_emisores  where emiactivo=1 ORDER BY emiruc, emirazsoc";
   }
   else
   {
       $nm_comando = "SELECT emiruc, emiruc||' - '||emirazsoc  FROM fac_emisores  where emiactivo=1 ORDER BY emiruc, emirazsoc";
   }

   $this->totalsinimp = $old_value_totalsinimp;
   $this->totaldesc = $old_value_totaldesc;
   $this->base12 = $old_value_base12;
   $this->base0 = $old_value_base0;
   $this->valor_iva = $old_value_valor_iva;
   $this->importe_total = $old_value_importe_total;
   $this->valor_efec = $old_value_valor_efec;
   $this->valor_cheque = $old_value_valor_cheque;
   $this->valor_tarjcred = $old_value_valor_tarjcred;
   $this->valor_transfer = $old_value_valor_transfer;
   $this->num_tarjcred = $old_value_num_tarjcred;
   $this->fech_vence = $old_value_fech_vence;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_emisor'][] = $rs->fields[0];
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
   $emisor_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->emisor_1))
          {
              foreach ($this->emisor_1 as $tmp_emisor)
              {
                  if (trim($tmp_emisor) === trim($cadaselect[1])) { $emisor_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->emisor) === trim($cadaselect[1])) { $emisor_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="emisor" value="<?php echo $this->form_encode_input($emisor) . "\">" . $emisor_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_emisor();
   $x = 0 ; 
   $emisor_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->emisor_1))
          {
              foreach ($this->emisor_1 as $tmp_emisor)
              {
                  if (trim($tmp_emisor) === trim($cadaselect[1])) { $emisor_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->emisor) === trim($cadaselect[1])) { $emisor_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($emisor_look))
          {
              $emisor_look = $this->emisor;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_emisor\" class=\"css_emisor_line\" style=\"" .  $sStyleReadLab_emisor . "\">" . $this->form_format_readonly("emisor", $this->form_encode_input($emisor_look)) . "</span><span id=\"id_read_off_emisor\" class=\"css_read_off_emisor\" style=\"white-space: nowrap; " . $sStyleReadInp_emisor . "\">";
   echo " <span id=\"idAjaxSelect_emisor\"><select class=\"sc-js-input scFormObjectOdd css_emisor_obj\" style=\"\" id=\"id_sc_field_emisor\" name=\"emisor\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_emisor'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","------------------------") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->emisor) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->emisor)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emisor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emisor_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_emisor_dumb = ('' == $sStyleHidden_emisor) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_emisor_dumb" style="<?php echo $sStyleHidden_emisor_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="100%" height="">
   <a name="bloco_1"></a>
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['totaldesc']))
           {
               $this->nmgp_cmp_readonly['totaldesc'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['base12']))
           {
               $this->nmgp_cmp_readonly['base12'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['base0']))
           {
               $this->nmgp_cmp_readonly['base0'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['valor_iva']))
           {
               $this->nmgp_cmp_readonly['valor_iva'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['importe_total']))
           {
               $this->nmgp_cmp_readonly['importe_total'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['totalsinimp']))
    {
        $this->nm_new_label['totalsinimp'] = "TOTAL SIN IMP.";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $totalsinimp = $this->totalsinimp;
   $sStyleHidden_totalsinimp = '';
   if (isset($this->nmgp_cmp_hidden['totalsinimp']) && $this->nmgp_cmp_hidden['totalsinimp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['totalsinimp']);
       $sStyleHidden_totalsinimp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_totalsinimp = 'display: none;';
   $sStyleReadInp_totalsinimp = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["totalsinimp"]) &&  $this->nmgp_cmp_readonly["totalsinimp"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['totalsinimp']);
       $sStyleReadLab_totalsinimp = '';
       $sStyleReadInp_totalsinimp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['totalsinimp']) && $this->nmgp_cmp_hidden['totalsinimp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="totalsinimp" value="<?php echo $this->form_encode_input($totalsinimp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_totalsinimp_line" id="hidden_field_data_totalsinimp" style="<?php echo $sStyleHidden_totalsinimp; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_totalsinimp_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_totalsinimp_label" style=""><span id="id_label_totalsinimp"><?php echo $this->nm_new_label['totalsinimp']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["totalsinimp"]) &&  $this->nmgp_cmp_readonly["totalsinimp"] == "on")) { 

 ?>
<input type="hidden" name="totalsinimp" value="<?php echo $this->form_encode_input($totalsinimp) . "\"><span id=\"id_ajax_label_totalsinimp\">" . $totalsinimp . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_totalsinimp" class="sc-ui-readonly-totalsinimp css_totalsinimp_line" style="<?php echo $sStyleReadLab_totalsinimp; ?>"><?php echo $this->form_format_readonly("totalsinimp", $this->form_encode_input($this->totalsinimp)); ?></span><span id="id_read_off_totalsinimp" class="css_read_off_totalsinimp" style="white-space: nowrap;<?php echo $sStyleReadInp_totalsinimp; ?>">
 <input class="sc-js-input scFormObjectOdd css_totalsinimp_obj" style="" id="id_sc_field_totalsinimp" type=text name="totalsinimp" value="<?php echo $this->form_encode_input($totalsinimp) ?>"
 size=10 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['totalsinimp']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['totalsinimp']['format_pos'] || 3 == $this->field_config['totalsinimp']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['totalsinimp']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['totalsinimp']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['totalsinimp']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['totalsinimp']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_totalsinimp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_totalsinimp_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['totaldesc']))
    {
        $this->nm_new_label['totaldesc'] = "TOTAL DESC.";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $totaldesc = $this->totaldesc;
   $sStyleHidden_totaldesc = '';
   if (isset($this->nmgp_cmp_hidden['totaldesc']) && $this->nmgp_cmp_hidden['totaldesc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['totaldesc']);
       $sStyleHidden_totaldesc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_totaldesc = 'display: none;';
   $sStyleReadInp_totaldesc = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["totaldesc"]) &&  $this->nmgp_cmp_readonly["totaldesc"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['totaldesc']);
       $sStyleReadLab_totaldesc = '';
       $sStyleReadInp_totaldesc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['totaldesc']) && $this->nmgp_cmp_hidden['totaldesc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="totaldesc" value="<?php echo $this->form_encode_input($totaldesc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_totaldesc_line" id="hidden_field_data_totaldesc" style="<?php echo $sStyleHidden_totaldesc; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_totaldesc_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_totaldesc_label" style=""><span id="id_label_totaldesc"><?php echo $this->nm_new_label['totaldesc']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["totaldesc"]) &&  $this->nmgp_cmp_readonly["totaldesc"] == "on")) { 

 ?>
<input type="hidden" name="totaldesc" value="<?php echo $this->form_encode_input($totaldesc) . "\"><span id=\"id_ajax_label_totaldesc\">" . $totaldesc . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_totaldesc" class="sc-ui-readonly-totaldesc css_totaldesc_line" style="<?php echo $sStyleReadLab_totaldesc; ?>"><?php echo $this->form_format_readonly("totaldesc", $this->form_encode_input($this->totaldesc)); ?></span><span id="id_read_off_totaldesc" class="css_read_off_totaldesc" style="white-space: nowrap;<?php echo $sStyleReadInp_totaldesc; ?>">
 <input class="sc-js-input scFormObjectOdd css_totaldesc_obj" style="" id="id_sc_field_totaldesc" type=text name="totaldesc" value="<?php echo $this->form_encode_input($totaldesc) ?>"
 size=10 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['totaldesc']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['totaldesc']['format_pos'] || 3 == $this->field_config['totaldesc']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['totaldesc']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['totaldesc']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['totaldesc']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['totaldesc']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_totaldesc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_totaldesc_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['base12']))
    {
        $this->nm_new_label['base12'] = "BASE IMPONIBLE 12%";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $base12 = $this->base12;
   $sStyleHidden_base12 = '';
   if (isset($this->nmgp_cmp_hidden['base12']) && $this->nmgp_cmp_hidden['base12'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['base12']);
       $sStyleHidden_base12 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_base12 = 'display: none;';
   $sStyleReadInp_base12 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["base12"]) &&  $this->nmgp_cmp_readonly["base12"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['base12']);
       $sStyleReadLab_base12 = '';
       $sStyleReadInp_base12 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['base12']) && $this->nmgp_cmp_hidden['base12'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="base12" value="<?php echo $this->form_encode_input($base12) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_base12_line" id="hidden_field_data_base12" style="<?php echo $sStyleHidden_base12; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_base12_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_base12_label" style=""><span id="id_label_base12"><?php echo $this->nm_new_label['base12']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["base12"]) &&  $this->nmgp_cmp_readonly["base12"] == "on")) { 

 ?>
<input type="hidden" name="base12" value="<?php echo $this->form_encode_input($base12) . "\"><span id=\"id_ajax_label_base12\">" . $base12 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_base12" class="sc-ui-readonly-base12 css_base12_line" style="<?php echo $sStyleReadLab_base12; ?>"><?php echo $this->form_format_readonly("base12", $this->form_encode_input($this->base12)); ?></span><span id="id_read_off_base12" class="css_read_off_base12" style="white-space: nowrap;<?php echo $sStyleReadInp_base12; ?>">
 <input class="sc-js-input scFormObjectOdd css_base12_obj" style="" id="id_sc_field_base12" type=text name="base12" value="<?php echo $this->form_encode_input($base12) ?>"
 size=10 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['base12']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['base12']['format_pos'] || 3 == $this->field_config['base12']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['base12']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['base12']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['base12']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['base12']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_base12_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_base12_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['base0']))
    {
        $this->nm_new_label['base0'] = "BASE IMPONIBLE 0%";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $base0 = $this->base0;
   $sStyleHidden_base0 = '';
   if (isset($this->nmgp_cmp_hidden['base0']) && $this->nmgp_cmp_hidden['base0'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['base0']);
       $sStyleHidden_base0 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_base0 = 'display: none;';
   $sStyleReadInp_base0 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["base0"]) &&  $this->nmgp_cmp_readonly["base0"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['base0']);
       $sStyleReadLab_base0 = '';
       $sStyleReadInp_base0 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['base0']) && $this->nmgp_cmp_hidden['base0'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="base0" value="<?php echo $this->form_encode_input($base0) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_base0_line" id="hidden_field_data_base0" style="<?php echo $sStyleHidden_base0; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_base0_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_base0_label" style=""><span id="id_label_base0"><?php echo $this->nm_new_label['base0']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["base0"]) &&  $this->nmgp_cmp_readonly["base0"] == "on")) { 

 ?>
<input type="hidden" name="base0" value="<?php echo $this->form_encode_input($base0) . "\"><span id=\"id_ajax_label_base0\">" . $base0 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_base0" class="sc-ui-readonly-base0 css_base0_line" style="<?php echo $sStyleReadLab_base0; ?>"><?php echo $this->form_format_readonly("base0", $this->form_encode_input($this->base0)); ?></span><span id="id_read_off_base0" class="css_read_off_base0" style="white-space: nowrap;<?php echo $sStyleReadInp_base0; ?>">
 <input class="sc-js-input scFormObjectOdd css_base0_obj" style="" id="id_sc_field_base0" type=text name="base0" value="<?php echo $this->form_encode_input($base0) ?>"
 size=10 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['base0']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['base0']['format_pos'] || 3 == $this->field_config['base0']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['base0']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['base0']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['base0']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['base0']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_base0_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_base0_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valor_iva']))
    {
        $this->nm_new_label['valor_iva'] = "IVA 12%";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valor_iva = $this->valor_iva;
   $sStyleHidden_valor_iva = '';
   if (isset($this->nmgp_cmp_hidden['valor_iva']) && $this->nmgp_cmp_hidden['valor_iva'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valor_iva']);
       $sStyleHidden_valor_iva = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valor_iva = 'display: none;';
   $sStyleReadInp_valor_iva = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["valor_iva"]) &&  $this->nmgp_cmp_readonly["valor_iva"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valor_iva']);
       $sStyleReadLab_valor_iva = '';
       $sStyleReadInp_valor_iva = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valor_iva']) && $this->nmgp_cmp_hidden['valor_iva'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valor_iva" value="<?php echo $this->form_encode_input($valor_iva) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valor_iva_line" id="hidden_field_data_valor_iva" style="<?php echo $sStyleHidden_valor_iva; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valor_iva_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valor_iva_label" style=""><span id="id_label_valor_iva"><?php echo $this->nm_new_label['valor_iva']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["valor_iva"]) &&  $this->nmgp_cmp_readonly["valor_iva"] == "on")) { 

 ?>
<input type="hidden" name="valor_iva" value="<?php echo $this->form_encode_input($valor_iva) . "\"><span id=\"id_ajax_label_valor_iva\">" . $valor_iva . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_valor_iva" class="sc-ui-readonly-valor_iva css_valor_iva_line" style="<?php echo $sStyleReadLab_valor_iva; ?>"><?php echo $this->form_format_readonly("valor_iva", $this->form_encode_input($this->valor_iva)); ?></span><span id="id_read_off_valor_iva" class="css_read_off_valor_iva" style="white-space: nowrap;<?php echo $sStyleReadInp_valor_iva; ?>">
 <input class="sc-js-input scFormObjectOdd css_valor_iva_obj" style="" id="id_sc_field_valor_iva" type=text name="valor_iva" value="<?php echo $this->form_encode_input($valor_iva) ?>"
 size=10 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['valor_iva']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['valor_iva']['format_pos'] || 3 == $this->field_config['valor_iva']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_iva']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_iva']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valor_iva']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valor_iva']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valor_iva_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valor_iva_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['importe_total']))
    {
        $this->nm_new_label['importe_total'] = "IMPORTE TOTAL";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importe_total = $this->importe_total;
   $sStyleHidden_importe_total = '';
   if (isset($this->nmgp_cmp_hidden['importe_total']) && $this->nmgp_cmp_hidden['importe_total'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importe_total']);
       $sStyleHidden_importe_total = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importe_total = 'display: none;';
   $sStyleReadInp_importe_total = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["importe_total"]) &&  $this->nmgp_cmp_readonly["importe_total"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importe_total']);
       $sStyleReadLab_importe_total = '';
       $sStyleReadInp_importe_total = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importe_total']) && $this->nmgp_cmp_hidden['importe_total'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importe_total" value="<?php echo $this->form_encode_input($importe_total) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importe_total_line" id="hidden_field_data_importe_total" style="<?php echo $sStyleHidden_importe_total; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_importe_total_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_importe_total_label" style=""><span id="id_label_importe_total"><?php echo $this->nm_new_label['importe_total']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["importe_total"]) &&  $this->nmgp_cmp_readonly["importe_total"] == "on")) { 

 ?>
<input type="hidden" name="importe_total" value="<?php echo $this->form_encode_input($importe_total) . "\"><span id=\"id_ajax_label_importe_total\">" . $importe_total . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_importe_total" class="sc-ui-readonly-importe_total css_importe_total_line" style="<?php echo $sStyleReadLab_importe_total; ?>"><?php echo $this->form_format_readonly("importe_total", $this->form_encode_input($this->importe_total)); ?></span><span id="id_read_off_importe_total" class="css_read_off_importe_total" style="white-space: nowrap;<?php echo $sStyleReadInp_importe_total; ?>">
 <input class="sc-js-input scFormObjectOdd css_importe_total_obj" style="" id="id_sc_field_importe_total" type=text name="importe_total" value="<?php echo $this->form_encode_input($importe_total) ?>"
 size=10 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['importe_total']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['importe_total']['format_pos'] || 3 == $this->field_config['importe_total']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importe_total']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importe_total']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importe_total']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importe_total']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_importe_total_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_importe_total_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_totalsinimp_dumb = ('' == $sStyleHidden_totalsinimp) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_totalsinimp_dumb" style="<?php echo $sStyleHidden_totalsinimp_dumb; ?>"></TD>
<?php $sStyleHidden_totaldesc_dumb = ('' == $sStyleHidden_totaldesc) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_totaldesc_dumb" style="<?php echo $sStyleHidden_totaldesc_dumb; ?>"></TD>
<?php $sStyleHidden_base12_dumb = ('' == $sStyleHidden_base12) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_base12_dumb" style="<?php echo $sStyleHidden_base12_dumb; ?>"></TD>
<?php $sStyleHidden_base0_dumb = ('' == $sStyleHidden_base0) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_base0_dumb" style="<?php echo $sStyleHidden_base0_dumb; ?>"></TD>
<?php $sStyleHidden_valor_iva_dumb = ('' == $sStyleHidden_valor_iva) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valor_iva_dumb" style="<?php echo $sStyleHidden_valor_iva_dumb; ?>"></TD>
<?php $sStyleHidden_importe_total_dumb = ('' == $sStyleHidden_importe_total) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_importe_total_dumb" style="<?php echo $sStyleHidden_importe_total_dumb; ?>"></TD>
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
    if (!isset($this->nm_new_label['tipo_pago']))
    {
        $this->nm_new_label['tipo_pago'] = "TIPO DE PAGO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_pago = $this->tipo_pago;
   $sStyleHidden_tipo_pago = '';
   if (isset($this->nmgp_cmp_hidden['tipo_pago']) && $this->nmgp_cmp_hidden['tipo_pago'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_pago']);
       $sStyleHidden_tipo_pago = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_pago = 'display: none;';
   $sStyleReadInp_tipo_pago = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_pago']) && $this->nmgp_cmp_readonly['tipo_pago'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_pago']);
       $sStyleReadLab_tipo_pago = '';
       $sStyleReadInp_tipo_pago = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_pago']) && $this->nmgp_cmp_hidden['tipo_pago'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipo_pago" value="<?php echo $this->form_encode_input($tipo_pago) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipo_pago_line" id="hidden_field_data_tipo_pago" style="<?php echo $sStyleHidden_tipo_pago; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_pago_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipo_pago_label" style=""><span id="id_label_tipo_pago"><?php echo $this->nm_new_label['tipo_pago']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_pago"]) &&  $this->nmgp_cmp_readonly["tipo_pago"] == "on") { 

 if ("1" == $this->tipo_pago) { $tipo_pago_look = "CONTADO";} 
 if ("2" == $this->tipo_pago) { $tipo_pago_look = "CRÉDITO";} 
?>
<input type="hidden" name="tipo_pago" value="<?php echo $this->form_encode_input($tipo_pago) . "\">" . $tipo_pago_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->tipo_pago) { $tipo_pago_look = "CONTADO";} 
 if ("2" == $this->tipo_pago) { $tipo_pago_look = "CRÉDITO";} 
?>
<span id="id_read_on_tipo_pago"  class="css_tipo_pago_line" style="<?php echo $sStyleReadLab_tipo_pago; ?>"><?php echo $this->form_format_readonly("tipo_pago", $this->form_encode_input($tipo_pago_look)); ?></span><span id="id_read_off_tipo_pago" class="css_read_off_tipo_pago css_tipo_pago_line" style="<?php echo $sStyleReadInp_tipo_pago; ?>"><div id="idAjaxRadio_tipo_pago" style="display: inline-block"  class="css_tipo_pago_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_tipo_pago_line"><?php $tempOptionId = "id-opt-tipo_pago" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-tipo_pago sc-ui-radio-tipo_pago" type=radio name="tipo_pago" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_tipo_pago'][] = '1'; ?>
<?php  if ("1" == $this->tipo_pago)  { echo " checked" ;} ?><?php  if (empty($this->tipo_pago)) { echo " checked" ;} ?>  onClick="do_ajax_form_cita_event_tipo_pago_onclick();" ><label for="<?php echo $tempOptionId ?>">CONTADO</label></TD>
  <TD class="scFormDataFontOdd css_tipo_pago_line"><?php $tempOptionId = "id-opt-tipo_pago" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-tipo_pago sc-ui-radio-tipo_pago" type=radio name="tipo_pago" value="2"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_tipo_pago'][] = '2'; ?>
<?php  if ("2" == $this->tipo_pago)  { echo " checked" ;} ?>  onClick="do_ajax_form_cita_event_tipo_pago_onclick();" ><label for="<?php echo $tempOptionId ?>">CRÉDITO</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_pago_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_pago_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valor_efec']))
    {
        $this->nm_new_label['valor_efec'] = "EFECTIVO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valor_efec = $this->valor_efec;
   $sStyleHidden_valor_efec = '';
   if (isset($this->nmgp_cmp_hidden['valor_efec']) && $this->nmgp_cmp_hidden['valor_efec'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valor_efec']);
       $sStyleHidden_valor_efec = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valor_efec = 'display: none;';
   $sStyleReadInp_valor_efec = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valor_efec']) && $this->nmgp_cmp_readonly['valor_efec'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valor_efec']);
       $sStyleReadLab_valor_efec = '';
       $sStyleReadInp_valor_efec = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valor_efec']) && $this->nmgp_cmp_hidden['valor_efec'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valor_efec" value="<?php echo $this->form_encode_input($valor_efec) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valor_efec_line" id="hidden_field_data_valor_efec" style="<?php echo $sStyleHidden_valor_efec; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valor_efec_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valor_efec_label" style=""><span id="id_label_valor_efec"><?php echo $this->nm_new_label['valor_efec']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valor_efec"]) &&  $this->nmgp_cmp_readonly["valor_efec"] == "on") { 

 ?>
<input type="hidden" name="valor_efec" value="<?php echo $this->form_encode_input($valor_efec) . "\">" . $valor_efec . ""; ?>
<?php } else { ?>
<span id="id_read_on_valor_efec" class="sc-ui-readonly-valor_efec css_valor_efec_line" style="<?php echo $sStyleReadLab_valor_efec; ?>"><?php echo $this->form_format_readonly("valor_efec", $this->form_encode_input($this->valor_efec)); ?></span><span id="id_read_off_valor_efec" class="css_read_off_valor_efec" style="white-space: nowrap;<?php echo $sStyleReadInp_valor_efec; ?>">
 <input class="sc-js-input scFormObjectOdd css_valor_efec_obj" style="" id="id_sc_field_valor_efec" type=text name="valor_efec" value="<?php echo $this->form_encode_input($valor_efec) ?>"
 size=10 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['valor_efec']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['valor_efec']['format_pos'] || 3 == $this->field_config['valor_efec']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_efec']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_efec']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valor_efec']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valor_efec']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valor_efec_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valor_efec_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valor_cheque']))
    {
        $this->nm_new_label['valor_cheque'] = "CHEQUE";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valor_cheque = $this->valor_cheque;
   $sStyleHidden_valor_cheque = '';
   if (isset($this->nmgp_cmp_hidden['valor_cheque']) && $this->nmgp_cmp_hidden['valor_cheque'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valor_cheque']);
       $sStyleHidden_valor_cheque = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valor_cheque = 'display: none;';
   $sStyleReadInp_valor_cheque = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valor_cheque']) && $this->nmgp_cmp_readonly['valor_cheque'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valor_cheque']);
       $sStyleReadLab_valor_cheque = '';
       $sStyleReadInp_valor_cheque = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valor_cheque']) && $this->nmgp_cmp_hidden['valor_cheque'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valor_cheque" value="<?php echo $this->form_encode_input($valor_cheque) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valor_cheque_line" id="hidden_field_data_valor_cheque" style="<?php echo $sStyleHidden_valor_cheque; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valor_cheque_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valor_cheque_label" style=""><span id="id_label_valor_cheque"><?php echo $this->nm_new_label['valor_cheque']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valor_cheque"]) &&  $this->nmgp_cmp_readonly["valor_cheque"] == "on") { 

 ?>
<input type="hidden" name="valor_cheque" value="<?php echo $this->form_encode_input($valor_cheque) . "\">" . $valor_cheque . ""; ?>
<?php } else { ?>
<span id="id_read_on_valor_cheque" class="sc-ui-readonly-valor_cheque css_valor_cheque_line" style="<?php echo $sStyleReadLab_valor_cheque; ?>"><?php echo $this->form_format_readonly("valor_cheque", $this->form_encode_input($this->valor_cheque)); ?></span><span id="id_read_off_valor_cheque" class="css_read_off_valor_cheque" style="white-space: nowrap;<?php echo $sStyleReadInp_valor_cheque; ?>">
 <input class="sc-js-input scFormObjectOdd css_valor_cheque_obj" style="" id="id_sc_field_valor_cheque" type=text name="valor_cheque" value="<?php echo $this->form_encode_input($valor_cheque) ?>"
 size=10 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['valor_cheque']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['valor_cheque']['format_pos'] || 3 == $this->field_config['valor_cheque']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_cheque']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_cheque']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valor_cheque']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valor_cheque']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valor_cheque_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valor_cheque_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valor_tarjcred']))
    {
        $this->nm_new_label['valor_tarjcred'] = "TARJ. CRÉD.";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valor_tarjcred = $this->valor_tarjcred;
   $sStyleHidden_valor_tarjcred = '';
   if (isset($this->nmgp_cmp_hidden['valor_tarjcred']) && $this->nmgp_cmp_hidden['valor_tarjcred'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valor_tarjcred']);
       $sStyleHidden_valor_tarjcred = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valor_tarjcred = 'display: none;';
   $sStyleReadInp_valor_tarjcred = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valor_tarjcred']) && $this->nmgp_cmp_readonly['valor_tarjcred'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valor_tarjcred']);
       $sStyleReadLab_valor_tarjcred = '';
       $sStyleReadInp_valor_tarjcred = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valor_tarjcred']) && $this->nmgp_cmp_hidden['valor_tarjcred'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valor_tarjcred" value="<?php echo $this->form_encode_input($valor_tarjcred) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valor_tarjcred_line" id="hidden_field_data_valor_tarjcred" style="<?php echo $sStyleHidden_valor_tarjcred; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valor_tarjcred_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valor_tarjcred_label" style=""><span id="id_label_valor_tarjcred"><?php echo $this->nm_new_label['valor_tarjcred']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valor_tarjcred"]) &&  $this->nmgp_cmp_readonly["valor_tarjcred"] == "on") { 

 ?>
<input type="hidden" name="valor_tarjcred" value="<?php echo $this->form_encode_input($valor_tarjcred) . "\">" . $valor_tarjcred . ""; ?>
<?php } else { ?>
<span id="id_read_on_valor_tarjcred" class="sc-ui-readonly-valor_tarjcred css_valor_tarjcred_line" style="<?php echo $sStyleReadLab_valor_tarjcred; ?>"><?php echo $this->form_format_readonly("valor_tarjcred", $this->form_encode_input($this->valor_tarjcred)); ?></span><span id="id_read_off_valor_tarjcred" class="css_read_off_valor_tarjcred" style="white-space: nowrap;<?php echo $sStyleReadInp_valor_tarjcred; ?>">
 <input class="sc-js-input scFormObjectOdd css_valor_tarjcred_obj" style="" id="id_sc_field_valor_tarjcred" type=text name="valor_tarjcred" value="<?php echo $this->form_encode_input($valor_tarjcred) ?>"
 size=10 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['valor_tarjcred']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['valor_tarjcred']['format_pos'] || 3 == $this->field_config['valor_tarjcred']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_tarjcred']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_tarjcred']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valor_tarjcred']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valor_tarjcred']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valor_tarjcred_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valor_tarjcred_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valor_transfer']))
    {
        $this->nm_new_label['valor_transfer'] = "TRANSF. BANC.";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valor_transfer = $this->valor_transfer;
   $sStyleHidden_valor_transfer = '';
   if (isset($this->nmgp_cmp_hidden['valor_transfer']) && $this->nmgp_cmp_hidden['valor_transfer'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valor_transfer']);
       $sStyleHidden_valor_transfer = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valor_transfer = 'display: none;';
   $sStyleReadInp_valor_transfer = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valor_transfer']) && $this->nmgp_cmp_readonly['valor_transfer'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valor_transfer']);
       $sStyleReadLab_valor_transfer = '';
       $sStyleReadInp_valor_transfer = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valor_transfer']) && $this->nmgp_cmp_hidden['valor_transfer'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valor_transfer" value="<?php echo $this->form_encode_input($valor_transfer) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valor_transfer_line" id="hidden_field_data_valor_transfer" style="<?php echo $sStyleHidden_valor_transfer; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valor_transfer_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valor_transfer_label" style=""><span id="id_label_valor_transfer"><?php echo $this->nm_new_label['valor_transfer']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valor_transfer"]) &&  $this->nmgp_cmp_readonly["valor_transfer"] == "on") { 

 ?>
<input type="hidden" name="valor_transfer" value="<?php echo $this->form_encode_input($valor_transfer) . "\">" . $valor_transfer . ""; ?>
<?php } else { ?>
<span id="id_read_on_valor_transfer" class="sc-ui-readonly-valor_transfer css_valor_transfer_line" style="<?php echo $sStyleReadLab_valor_transfer; ?>"><?php echo $this->form_format_readonly("valor_transfer", $this->form_encode_input($this->valor_transfer)); ?></span><span id="id_read_off_valor_transfer" class="css_read_off_valor_transfer" style="white-space: nowrap;<?php echo $sStyleReadInp_valor_transfer; ?>">
 <input class="sc-js-input scFormObjectOdd css_valor_transfer_obj" style="" id="id_sc_field_valor_transfer" type=text name="valor_transfer" value="<?php echo $this->form_encode_input($valor_transfer) ?>"
 size=10 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['valor_transfer']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['valor_transfer']['format_pos'] || 3 == $this->field_config['valor_transfer']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_transfer']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_transfer']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valor_transfer']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valor_transfer']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valor_transfer_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valor_transfer_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['num_cheque']))
    {
        $this->nm_new_label['num_cheque'] = "No. CHEQUE";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $num_cheque = $this->num_cheque;
   $sStyleHidden_num_cheque = '';
   if (isset($this->nmgp_cmp_hidden['num_cheque']) && $this->nmgp_cmp_hidden['num_cheque'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['num_cheque']);
       $sStyleHidden_num_cheque = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_num_cheque = 'display: none;';
   $sStyleReadInp_num_cheque = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['num_cheque']) && $this->nmgp_cmp_readonly['num_cheque'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['num_cheque']);
       $sStyleReadLab_num_cheque = '';
       $sStyleReadInp_num_cheque = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['num_cheque']) && $this->nmgp_cmp_hidden['num_cheque'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="num_cheque" value="<?php echo $this->form_encode_input($num_cheque) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_num_cheque_line" id="hidden_field_data_num_cheque" style="<?php echo $sStyleHidden_num_cheque; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_num_cheque_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_num_cheque_label" style=""><span id="id_label_num_cheque"><?php echo $this->nm_new_label['num_cheque']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["num_cheque"]) &&  $this->nmgp_cmp_readonly["num_cheque"] == "on") { 

 ?>
<input type="hidden" name="num_cheque" value="<?php echo $this->form_encode_input($num_cheque) . "\">" . $num_cheque . ""; ?>
<?php } else { ?>
<span id="id_read_on_num_cheque" class="sc-ui-readonly-num_cheque css_num_cheque_line" style="<?php echo $sStyleReadLab_num_cheque; ?>"><?php echo $this->form_format_readonly("num_cheque", $this->form_encode_input($this->num_cheque)); ?></span><span id="id_read_off_num_cheque" class="css_read_off_num_cheque" style="white-space: nowrap;<?php echo $sStyleReadInp_num_cheque; ?>">
 <input class="sc-js-input scFormObjectOdd css_num_cheque_obj" style="" id="id_sc_field_num_cheque" type=text name="num_cheque" value="<?php echo $this->form_encode_input($num_cheque) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_num_cheque_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_num_cheque_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_tipo_pago_dumb = ('' == $sStyleHidden_tipo_pago) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_tipo_pago_dumb" style="<?php echo $sStyleHidden_tipo_pago_dumb; ?>"></TD>
<?php $sStyleHidden_valor_efec_dumb = ('' == $sStyleHidden_valor_efec) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valor_efec_dumb" style="<?php echo $sStyleHidden_valor_efec_dumb; ?>"></TD>
<?php $sStyleHidden_valor_cheque_dumb = ('' == $sStyleHidden_valor_cheque) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valor_cheque_dumb" style="<?php echo $sStyleHidden_valor_cheque_dumb; ?>"></TD>
<?php $sStyleHidden_valor_tarjcred_dumb = ('' == $sStyleHidden_valor_tarjcred) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valor_tarjcred_dumb" style="<?php echo $sStyleHidden_valor_tarjcred_dumb; ?>"></TD>
<?php $sStyleHidden_valor_transfer_dumb = ('' == $sStyleHidden_valor_transfer) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valor_transfer_dumb" style="<?php echo $sStyleHidden_valor_transfer_dumb; ?>"></TD>
<?php $sStyleHidden_num_cheque_dumb = ('' == $sStyleHidden_num_cheque) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_num_cheque_dumb" style="<?php echo $sStyleHidden_num_cheque_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['forma_factura']))
    {
        $this->nm_new_label['forma_factura'] = "FORMA FACTURA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $forma_factura = $this->forma_factura;
   $sStyleHidden_forma_factura = '';
   if (isset($this->nmgp_cmp_hidden['forma_factura']) && $this->nmgp_cmp_hidden['forma_factura'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['forma_factura']);
       $sStyleHidden_forma_factura = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_forma_factura = 'display: none;';
   $sStyleReadInp_forma_factura = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['forma_factura']) && $this->nmgp_cmp_readonly['forma_factura'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['forma_factura']);
       $sStyleReadLab_forma_factura = '';
       $sStyleReadInp_forma_factura = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['forma_factura']) && $this->nmgp_cmp_hidden['forma_factura'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="forma_factura" value="<?php echo $this->form_encode_input($forma_factura) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_forma_factura_line" id="hidden_field_data_forma_factura" style="<?php echo $sStyleHidden_forma_factura; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_forma_factura_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_forma_factura_label" style=""><span id="id_label_forma_factura"><?php echo $this->nm_new_label['forma_factura']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["forma_factura"]) &&  $this->nmgp_cmp_readonly["forma_factura"] == "on") { 

 if ("1" == $this->forma_factura) { $forma_factura_look = "CON DETALLE";} 
 if ("2" == $this->forma_factura) { $forma_factura_look = "HONORARIOS";} 
?>
<input type="hidden" name="forma_factura" value="<?php echo $this->form_encode_input($forma_factura) . "\">" . $forma_factura_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->forma_factura) { $forma_factura_look = "CON DETALLE";} 
 if ("2" == $this->forma_factura) { $forma_factura_look = "HONORARIOS";} 
?>
<span id="id_read_on_forma_factura"  class="css_forma_factura_line" style="<?php echo $sStyleReadLab_forma_factura; ?>"><?php echo $this->form_format_readonly("forma_factura", $this->form_encode_input($forma_factura_look)); ?></span><span id="id_read_off_forma_factura" class="css_read_off_forma_factura css_forma_factura_line" style="<?php echo $sStyleReadInp_forma_factura; ?>"><div id="idAjaxRadio_forma_factura" style="display: inline-block"  class="css_forma_factura_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_forma_factura_line"><?php $tempOptionId = "id-opt-forma_factura" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-forma_factura sc-ui-radio-forma_factura" type=radio name="forma_factura" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_forma_factura'][] = '1'; ?>
<?php  if ("1" == $this->forma_factura)  { echo " checked" ;} ?><?php  if (empty($this->forma_factura)) { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">CON DETALLE</label></TD>
  <TD class="scFormDataFontOdd css_forma_factura_line"><?php $tempOptionId = "id-opt-forma_factura" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-forma_factura sc-ui-radio-forma_factura" type=radio name="forma_factura" value="2"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_forma_factura'][] = '2'; ?>
<?php  if ("2" == $this->forma_factura)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">HONORARIOS</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_forma_factura_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_forma_factura_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['banco_cheque']))
    {
        $this->nm_new_label['banco_cheque'] = "BANCO CHEQUE";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $banco_cheque = $this->banco_cheque;
   $sStyleHidden_banco_cheque = '';
   if (isset($this->nmgp_cmp_hidden['banco_cheque']) && $this->nmgp_cmp_hidden['banco_cheque'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['banco_cheque']);
       $sStyleHidden_banco_cheque = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_banco_cheque = 'display: none;';
   $sStyleReadInp_banco_cheque = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['banco_cheque']) && $this->nmgp_cmp_readonly['banco_cheque'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['banco_cheque']);
       $sStyleReadLab_banco_cheque = '';
       $sStyleReadInp_banco_cheque = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['banco_cheque']) && $this->nmgp_cmp_hidden['banco_cheque'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="banco_cheque" value="<?php echo $this->form_encode_input($banco_cheque) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_banco_cheque_line" id="hidden_field_data_banco_cheque" style="<?php echo $sStyleHidden_banco_cheque; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_banco_cheque_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_banco_cheque_label" style=""><span id="id_label_banco_cheque"><?php echo $this->nm_new_label['banco_cheque']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["banco_cheque"]) &&  $this->nmgp_cmp_readonly["banco_cheque"] == "on") { 

 ?>
<input type="hidden" name="banco_cheque" value="<?php echo $this->form_encode_input($banco_cheque) . "\">" . $banco_cheque . ""; ?>
<?php } else { ?>
<span id="id_read_on_banco_cheque" class="sc-ui-readonly-banco_cheque css_banco_cheque_line" style="<?php echo $sStyleReadLab_banco_cheque; ?>"><?php echo $this->form_format_readonly("banco_cheque", $this->form_encode_input($this->banco_cheque)); ?></span><span id="id_read_off_banco_cheque" class="css_read_off_banco_cheque" style="white-space: nowrap;<?php echo $sStyleReadInp_banco_cheque; ?>">
 <input class="sc-js-input scFormObjectOdd css_banco_cheque_obj" style="" id="id_sc_field_banco_cheque" type=text name="banco_cheque" value="<?php echo $this->form_encode_input($banco_cheque) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_banco_cheque_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_banco_cheque_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['tipo_tarjcred']))
   {
       $this->nm_new_label['tipo_tarjcred'] = "TIP. TARJ. CRÉD.";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_tarjcred = $this->tipo_tarjcred;
   $sStyleHidden_tipo_tarjcred = '';
   if (isset($this->nmgp_cmp_hidden['tipo_tarjcred']) && $this->nmgp_cmp_hidden['tipo_tarjcred'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_tarjcred']);
       $sStyleHidden_tipo_tarjcred = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_tarjcred = 'display: none;';
   $sStyleReadInp_tipo_tarjcred = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_tarjcred']) && $this->nmgp_cmp_readonly['tipo_tarjcred'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_tarjcred']);
       $sStyleReadLab_tipo_tarjcred = '';
       $sStyleReadInp_tipo_tarjcred = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_tarjcred']) && $this->nmgp_cmp_hidden['tipo_tarjcred'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_tarjcred" value="<?php echo $this->form_encode_input($this->tipo_tarjcred) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipo_tarjcred_line" id="hidden_field_data_tipo_tarjcred" style="<?php echo $sStyleHidden_tipo_tarjcred; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_tarjcred_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipo_tarjcred_label" style=""><span id="id_label_tipo_tarjcred"><?php echo $this->nm_new_label['tipo_tarjcred']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_tarjcred"]) &&  $this->nmgp_cmp_readonly["tipo_tarjcred"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_tipo_tarjcred']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_tipo_tarjcred'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_tipo_tarjcred']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_tipo_tarjcred'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_tipo_tarjcred']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_tipo_tarjcred'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_tipo_tarjcred']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_tipo_tarjcred'] = array(); 
    }

   $old_value_totalsinimp = $this->totalsinimp;
   $old_value_totaldesc = $this->totaldesc;
   $old_value_base12 = $this->base12;
   $old_value_base0 = $this->base0;
   $old_value_valor_iva = $this->valor_iva;
   $old_value_importe_total = $this->importe_total;
   $old_value_valor_efec = $this->valor_efec;
   $old_value_valor_cheque = $this->valor_cheque;
   $old_value_valor_tarjcred = $this->valor_tarjcred;
   $old_value_valor_transfer = $this->valor_transfer;
   $old_value_num_tarjcred = $this->num_tarjcred;
   $old_value_fech_vence = $this->fech_vence;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_totalsinimp = $this->totalsinimp;
   $unformatted_value_totaldesc = $this->totaldesc;
   $unformatted_value_base12 = $this->base12;
   $unformatted_value_base0 = $this->base0;
   $unformatted_value_valor_iva = $this->valor_iva;
   $unformatted_value_importe_total = $this->importe_total;
   $unformatted_value_valor_efec = $this->valor_efec;
   $unformatted_value_valor_cheque = $this->valor_cheque;
   $unformatted_value_valor_tarjcred = $this->valor_tarjcred;
   $unformatted_value_valor_transfer = $this->valor_transfer;
   $unformatted_value_num_tarjcred = $this->num_tarjcred;
   $unformatted_value_fech_vence = $this->fech_vence;

   $nm_comando = "SELECT tcrcodigo, tcrnombre  FROM tarjetas_credito  ORDER BY tcrnombre";

   $this->totalsinimp = $old_value_totalsinimp;
   $this->totaldesc = $old_value_totaldesc;
   $this->base12 = $old_value_base12;
   $this->base0 = $old_value_base0;
   $this->valor_iva = $old_value_valor_iva;
   $this->importe_total = $old_value_importe_total;
   $this->valor_efec = $old_value_valor_efec;
   $this->valor_cheque = $old_value_valor_cheque;
   $this->valor_tarjcred = $old_value_valor_tarjcred;
   $this->valor_transfer = $old_value_valor_transfer;
   $this->num_tarjcred = $old_value_num_tarjcred;
   $this->fech_vence = $old_value_fech_vence;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_tipo_tarjcred'][] = $rs->fields[0];
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
   $tipo_tarjcred_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tipo_tarjcred_1))
          {
              foreach ($this->tipo_tarjcred_1 as $tmp_tipo_tarjcred)
              {
                  if (trim($tmp_tipo_tarjcred) === trim($cadaselect[1])) { $tipo_tarjcred_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tipo_tarjcred) === trim($cadaselect[1])) { $tipo_tarjcred_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="tipo_tarjcred" value="<?php echo $this->form_encode_input($tipo_tarjcred) . "\">" . $tipo_tarjcred_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_tipo_tarjcred();
   $x = 0 ; 
   $tipo_tarjcred_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tipo_tarjcred_1))
          {
              foreach ($this->tipo_tarjcred_1 as $tmp_tipo_tarjcred)
              {
                  if (trim($tmp_tipo_tarjcred) === trim($cadaselect[1])) { $tipo_tarjcred_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tipo_tarjcred) === trim($cadaselect[1])) { $tipo_tarjcred_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($tipo_tarjcred_look))
          {
              $tipo_tarjcred_look = $this->tipo_tarjcred;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_tipo_tarjcred\" class=\"css_tipo_tarjcred_line\" style=\"" .  $sStyleReadLab_tipo_tarjcred . "\">" . $this->form_format_readonly("tipo_tarjcred", $this->form_encode_input($tipo_tarjcred_look)) . "</span><span id=\"id_read_off_tipo_tarjcred\" class=\"css_read_off_tipo_tarjcred\" style=\"white-space: nowrap; " . $sStyleReadInp_tipo_tarjcred . "\">";
   echo " <span id=\"idAjaxSelect_tipo_tarjcred\"><select class=\"sc-js-input scFormObjectOdd css_tipo_tarjcred_obj\" style=\"\" id=\"id_sc_field_tipo_tarjcred\" name=\"tipo_tarjcred\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['Lookup_tipo_tarjcred'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","------------------------") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->tipo_tarjcred) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->tipo_tarjcred)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_tarjcred_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_tarjcred_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['num_tarjcred']))
    {
        $this->nm_new_label['num_tarjcred'] = "No. TARJ. CRÉD.";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $num_tarjcred = $this->num_tarjcred;
   $sStyleHidden_num_tarjcred = '';
   if (isset($this->nmgp_cmp_hidden['num_tarjcred']) && $this->nmgp_cmp_hidden['num_tarjcred'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['num_tarjcred']);
       $sStyleHidden_num_tarjcred = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_num_tarjcred = 'display: none;';
   $sStyleReadInp_num_tarjcred = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['num_tarjcred']) && $this->nmgp_cmp_readonly['num_tarjcred'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['num_tarjcred']);
       $sStyleReadLab_num_tarjcred = '';
       $sStyleReadInp_num_tarjcred = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['num_tarjcred']) && $this->nmgp_cmp_hidden['num_tarjcred'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="num_tarjcred" value="<?php echo $this->form_encode_input($num_tarjcred) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_num_tarjcred_line" id="hidden_field_data_num_tarjcred" style="<?php echo $sStyleHidden_num_tarjcred; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_num_tarjcred_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_num_tarjcred_label" style=""><span id="id_label_num_tarjcred"><?php echo $this->nm_new_label['num_tarjcred']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["num_tarjcred"]) &&  $this->nmgp_cmp_readonly["num_tarjcred"] == "on") { 

 ?>
<input type="hidden" name="num_tarjcred" value="<?php echo $this->form_encode_input($num_tarjcred) . "\">" . $num_tarjcred . ""; ?>
<?php } else { ?>
<span id="id_read_on_num_tarjcred" class="sc-ui-readonly-num_tarjcred css_num_tarjcred_line" style="<?php echo $sStyleReadLab_num_tarjcred; ?>"><?php echo $this->form_format_readonly("num_tarjcred", $this->form_encode_input($this->num_tarjcred)); ?></span><span id="id_read_off_num_tarjcred" class="css_read_off_num_tarjcred" style="white-space: nowrap;<?php echo $sStyleReadInp_num_tarjcred; ?>">
 <input class="sc-js-input scFormObjectOdd css_num_tarjcred_obj" style="" id="id_sc_field_num_tarjcred" type=text name="num_tarjcred" value="<?php echo $this->form_encode_input($num_tarjcred) ?>"
 size=15 maxlength=20 alt="{datatype: 'cc', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_num_tarjcred_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_num_tarjcred_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['banco_transfer']))
    {
        $this->nm_new_label['banco_transfer'] = "BANCO TRANSF.";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $banco_transfer = $this->banco_transfer;
   $sStyleHidden_banco_transfer = '';
   if (isset($this->nmgp_cmp_hidden['banco_transfer']) && $this->nmgp_cmp_hidden['banco_transfer'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['banco_transfer']);
       $sStyleHidden_banco_transfer = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_banco_transfer = 'display: none;';
   $sStyleReadInp_banco_transfer = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['banco_transfer']) && $this->nmgp_cmp_readonly['banco_transfer'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['banco_transfer']);
       $sStyleReadLab_banco_transfer = '';
       $sStyleReadInp_banco_transfer = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['banco_transfer']) && $this->nmgp_cmp_hidden['banco_transfer'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="banco_transfer" value="<?php echo $this->form_encode_input($banco_transfer) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_banco_transfer_line" id="hidden_field_data_banco_transfer" style="<?php echo $sStyleHidden_banco_transfer; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_banco_transfer_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_banco_transfer_label" style=""><span id="id_label_banco_transfer"><?php echo $this->nm_new_label['banco_transfer']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["banco_transfer"]) &&  $this->nmgp_cmp_readonly["banco_transfer"] == "on") { 

 ?>
<input type="hidden" name="banco_transfer" value="<?php echo $this->form_encode_input($banco_transfer) . "\">" . $banco_transfer . ""; ?>
<?php } else { ?>
<span id="id_read_on_banco_transfer" class="sc-ui-readonly-banco_transfer css_banco_transfer_line" style="<?php echo $sStyleReadLab_banco_transfer; ?>"><?php echo $this->form_format_readonly("banco_transfer", $this->form_encode_input($this->banco_transfer)); ?></span><span id="id_read_off_banco_transfer" class="css_read_off_banco_transfer" style="white-space: nowrap;<?php echo $sStyleReadInp_banco_transfer; ?>">
 <input class="sc-js-input scFormObjectOdd css_banco_transfer_obj" style="" id="id_sc_field_banco_transfer" type=text name="banco_transfer" value="<?php echo $this->form_encode_input($banco_transfer) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_banco_transfer_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_banco_transfer_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['numcta_transfer']))
    {
        $this->nm_new_label['numcta_transfer'] = "CTA. TRANSF.";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numcta_transfer = $this->numcta_transfer;
   $sStyleHidden_numcta_transfer = '';
   if (isset($this->nmgp_cmp_hidden['numcta_transfer']) && $this->nmgp_cmp_hidden['numcta_transfer'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numcta_transfer']);
       $sStyleHidden_numcta_transfer = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numcta_transfer = 'display: none;';
   $sStyleReadInp_numcta_transfer = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numcta_transfer']) && $this->nmgp_cmp_readonly['numcta_transfer'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numcta_transfer']);
       $sStyleReadLab_numcta_transfer = '';
       $sStyleReadInp_numcta_transfer = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numcta_transfer']) && $this->nmgp_cmp_hidden['numcta_transfer'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numcta_transfer" value="<?php echo $this->form_encode_input($numcta_transfer) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_numcta_transfer_line" id="hidden_field_data_numcta_transfer" style="<?php echo $sStyleHidden_numcta_transfer; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numcta_transfer_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_numcta_transfer_label" style=""><span id="id_label_numcta_transfer"><?php echo $this->nm_new_label['numcta_transfer']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numcta_transfer"]) &&  $this->nmgp_cmp_readonly["numcta_transfer"] == "on") { 

 ?>
<input type="hidden" name="numcta_transfer" value="<?php echo $this->form_encode_input($numcta_transfer) . "\">" . $numcta_transfer . ""; ?>
<?php } else { ?>
<span id="id_read_on_numcta_transfer" class="sc-ui-readonly-numcta_transfer css_numcta_transfer_line" style="<?php echo $sStyleReadLab_numcta_transfer; ?>"><?php echo $this->form_format_readonly("numcta_transfer", $this->form_encode_input($this->numcta_transfer)); ?></span><span id="id_read_off_numcta_transfer" class="css_read_off_numcta_transfer" style="white-space: nowrap;<?php echo $sStyleReadInp_numcta_transfer; ?>">
 <input class="sc-js-input scFormObjectOdd css_numcta_transfer_obj" style="" id="id_sc_field_numcta_transfer" type=text name="numcta_transfer" value="<?php echo $this->form_encode_input($numcta_transfer) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numcta_transfer_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numcta_transfer_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_forma_factura_dumb = ('' == $sStyleHidden_forma_factura) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_forma_factura_dumb" style="<?php echo $sStyleHidden_forma_factura_dumb; ?>"></TD>
<?php $sStyleHidden_banco_cheque_dumb = ('' == $sStyleHidden_banco_cheque) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_banco_cheque_dumb" style="<?php echo $sStyleHidden_banco_cheque_dumb; ?>"></TD>
<?php $sStyleHidden_tipo_tarjcred_dumb = ('' == $sStyleHidden_tipo_tarjcred) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_tipo_tarjcred_dumb" style="<?php echo $sStyleHidden_tipo_tarjcred_dumb; ?>"></TD>
<?php $sStyleHidden_num_tarjcred_dumb = ('' == $sStyleHidden_num_tarjcred) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_num_tarjcred_dumb" style="<?php echo $sStyleHidden_num_tarjcred_dumb; ?>"></TD>
<?php $sStyleHidden_banco_transfer_dumb = ('' == $sStyleHidden_banco_transfer) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_banco_transfer_dumb" style="<?php echo $sStyleHidden_banco_transfer_dumb; ?>"></TD>
<?php $sStyleHidden_numcta_transfer_dumb = ('' == $sStyleHidden_numcta_transfer) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_numcta_transfer_dumb" style="<?php echo $sStyleHidden_numcta_transfer_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fech_vence']))
    {
        $this->nm_new_label['fech_vence'] = "FECHA VENCIMIENTO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fech_vence = $this->fech_vence;
   $sStyleHidden_fech_vence = '';
   if (isset($this->nmgp_cmp_hidden['fech_vence']) && $this->nmgp_cmp_hidden['fech_vence'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fech_vence']);
       $sStyleHidden_fech_vence = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fech_vence = 'display: none;';
   $sStyleReadInp_fech_vence = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fech_vence']) && $this->nmgp_cmp_readonly['fech_vence'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fech_vence']);
       $sStyleReadLab_fech_vence = '';
       $sStyleReadInp_fech_vence = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fech_vence']) && $this->nmgp_cmp_hidden['fech_vence'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fech_vence" value="<?php echo $this->form_encode_input($fech_vence) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fech_vence_line" id="hidden_field_data_fech_vence" style="<?php echo $sStyleHidden_fech_vence; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fech_vence_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fech_vence_label" style=""><span id="id_label_fech_vence"><?php echo $this->nm_new_label['fech_vence']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fech_vence"]) &&  $this->nmgp_cmp_readonly["fech_vence"] == "on") { 

 ?>
<input type="hidden" name="fech_vence" value="<?php echo $this->form_encode_input($fech_vence) . "\">" . $fech_vence . ""; ?>
<?php } else { ?>
<span id="id_read_on_fech_vence" class="sc-ui-readonly-fech_vence css_fech_vence_line" style="<?php echo $sStyleReadLab_fech_vence; ?>"><?php echo $this->form_format_readonly("fech_vence", $this->form_encode_input($fech_vence)); ?></span><span id="id_read_off_fech_vence" class="css_read_off_fech_vence" style="white-space: nowrap;<?php echo $sStyleReadInp_fech_vence; ?>"><?php
$tmp_form_data = $this->field_config['fech_vence']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fech_vence_obj" style="" id="id_sc_field_fech_vence" type=text name="fech_vence" value="<?php echo $this->form_encode_input($fech_vence) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fech_vence']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fech_vence']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'dd/mm/aaaa', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fech_vence_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fech_vence_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="5" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
<?php $sStyleHidden_fech_vence_dumb = ('' == $sStyleHidden_fech_vence) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fech_vence_dumb" style="<?php echo $sStyleHidden_fech_vence_dumb; ?>"></TD>
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
    if (!isset($this->nm_new_label['detalle_presupuesto']))
    {
        $this->nm_new_label['detalle_presupuesto'] = "DETALLE DE PRESUPUESTO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $detalle_presupuesto = $this->detalle_presupuesto;
   $sStyleHidden_detalle_presupuesto = '';
   if (isset($this->nmgp_cmp_hidden['detalle_presupuesto']) && $this->nmgp_cmp_hidden['detalle_presupuesto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['detalle_presupuesto']);
       $sStyleHidden_detalle_presupuesto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_detalle_presupuesto = 'display: none;';
   $sStyleReadInp_detalle_presupuesto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['detalle_presupuesto']) && $this->nmgp_cmp_readonly['detalle_presupuesto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['detalle_presupuesto']);
       $sStyleReadLab_detalle_presupuesto = '';
       $sStyleReadInp_detalle_presupuesto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['detalle_presupuesto']) && $this->nmgp_cmp_hidden['detalle_presupuesto'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="detalle_presupuesto" value="<?php echo $this->form_encode_input($detalle_presupuesto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_detalle_presupuesto_line" id="hidden_field_data_detalle_presupuesto" style="<?php echo $sStyleHidden_detalle_presupuesto; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_detalle_presupuesto_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_detalle_presupuesto_label" style=""><span id="id_label_detalle_presupuesto"><?php echo $this->nm_new_label['detalle_presupuesto']; ?></span></span><br>
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle_presupuesto'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle_presupuesto'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_presupuesto_cita_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle_presupuesto'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_presupuesto_cita_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_presupuesto_cita_script_case_init'] ]['form_detalle_presupuesto_cita']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_presupuesto_cita_script_case_init'] ]['form_detalle_presupuesto_cita']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_presupuesto_cita_script_case_init'] ]['form_detalle_presupuesto_cita']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_presupuesto_cita_script_case_init'] ]['form_detalle_presupuesto_cita']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_presupuesto_cita_script_case_init'] ]['form_detalle_presupuesto_cita']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_presupuesto_cita_script_case_init'] ]['form_detalle_presupuesto_cita']['embutida_liga_form_update'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_presupuesto_cita_script_case_init'] ]['form_detalle_presupuesto_cita']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_presupuesto_cita_script_case_init'] ]['form_detalle_presupuesto_cita']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_presupuesto_cita_script_case_init'] ]['form_detalle_presupuesto_cita']['embutida_liga_grid_edit'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_presupuesto_cita_script_case_init'] ]['form_detalle_presupuesto_cita']['embutida_liga_grid_edit_link'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_presupuesto_cita_script_case_init'] ]['form_detalle_presupuesto_cita']['embutida_liga_qtd_reg'] = '';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_presupuesto_cita_script_case_init'] ]['form_detalle_presupuesto_cita']['embutida_liga_tp_pag'] = 'total';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_presupuesto_cita_script_case_init'] ]['form_detalle_presupuesto_cita']['embutida_parms'] = "v_estadopresup*scin" . $this->nmgp_dados_form['estado_presupuesto'] . "*scoutv_facturado*scin" . $this->nmgp_dados_form['citfactur'] . "*scoutv_anulado*scin" . $this->nmgp_dados_form['citanula'] . "*scoutv_numerocita*scin" . $this->nmgp_dados_form['citid'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinN*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_presupuesto_cita_script_case_init'] ]['form_detalle_presupuesto_cita']['foreign_key']['prenumero'] = $this->nmgp_dados_form['prenumero'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_presupuesto_cita_script_case_init'] ]['form_detalle_presupuesto_cita']['where_filter'] = "prenumero = " . $this->nmgp_dados_form['prenumero'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_presupuesto_cita_script_case_init'] ]['form_detalle_presupuesto_cita']['where_detal']  = "prenumero = " . $this->nmgp_dados_form['prenumero'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_presupuesto_cita_script_case_init'] ]['form_cita']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_presupuesto_cita_script_case_init'] ]['form_detalle_presupuesto_cita']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_cita_empty.htm' : $this->Ini->link_form_detalle_presupuesto_cita_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y';
if (isset($this->Ini->sc_lig_target['C_@scinf_detalle_presupuesto']) && 'nmsc_iframe_liga_form_detalle_presupuesto_cita' != $this->Ini->sc_lig_target['C_@scinf_detalle_presupuesto'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_detalle_presupuesto'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_presupuesto_cita_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_detalle_presupuesto'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_detalle_presupuesto_cita"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="850" name="nmsc_iframe_liga_form_detalle_presupuesto_cita"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detalle_presupuesto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detalle_presupuesto_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_detalle_presupuesto_dumb = ('' == $sStyleHidden_detalle_presupuesto) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_detalle_presupuesto_dumb" style="<?php echo $sStyleHidden_detalle_presupuesto_dumb; ?>"></TD>
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
    if (!isset($this->nm_new_label['servicios']))
    {
        $this->nm_new_label['servicios'] = "SERVICIOS REALIZADOS";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servicios = $this->servicios;
   $sStyleHidden_servicios = '';
   if (isset($this->nmgp_cmp_hidden['servicios']) && $this->nmgp_cmp_hidden['servicios'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servicios']);
       $sStyleHidden_servicios = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servicios = 'display: none;';
   $sStyleReadInp_servicios = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servicios']) && $this->nmgp_cmp_readonly['servicios'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servicios']);
       $sStyleReadLab_servicios = '';
       $sStyleReadInp_servicios = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servicios']) && $this->nmgp_cmp_hidden['servicios'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servicios" value="<?php echo $this->form_encode_input($servicios) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_servicios_line" id="hidden_field_data_servicios" style="<?php echo $sStyleHidden_servicios; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_servicios_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_servicios_label" style=""><span id="id_label_servicios"><?php echo $this->nm_new_label['servicios']; ?></span></span><br>
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_servicios'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_servicios'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_citadiagnos_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_servicios'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_citadiagnos_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_citadiagnos_script_case_init'] ]['form_detalle_citadiagnos']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_citadiagnos_script_case_init'] ]['form_detalle_citadiagnos']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_citadiagnos_script_case_init'] ]['form_detalle_citadiagnos']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_citadiagnos_script_case_init'] ]['form_detalle_citadiagnos']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_citadiagnos_script_case_init'] ]['form_detalle_citadiagnos']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_citadiagnos_script_case_init'] ]['form_detalle_citadiagnos']['embutida_liga_form_update'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_citadiagnos_script_case_init'] ]['form_detalle_citadiagnos']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_citadiagnos_script_case_init'] ]['form_detalle_citadiagnos']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_citadiagnos_script_case_init'] ]['form_detalle_citadiagnos']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_citadiagnos_script_case_init'] ]['form_detalle_citadiagnos']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_citadiagnos_script_case_init'] ]['form_detalle_citadiagnos']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_citadiagnos_script_case_init'] ]['form_detalle_citadiagnos']['embutida_liga_tp_pag'] = 'total';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_citadiagnos_script_case_init'] ]['form_detalle_citadiagnos']['embutida_parms'] = "v_facturado*scin" . $this->nmgp_dados_form['citfactur'] . "*scoutv_anulado*scin" . $this->nmgp_dados_form['citanula'] . "*scoutv_numpresup*scin" . $this->nmgp_dados_form['prenumero'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinN*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_citadiagnos_script_case_init'] ]['form_detalle_citadiagnos']['foreign_key']['citid'] = $this->nmgp_dados_form['citid'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_citadiagnos_script_case_init'] ]['form_detalle_citadiagnos']['where_filter'] = "citid = " . $this->nmgp_dados_form['citid'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_citadiagnos_script_case_init'] ]['form_detalle_citadiagnos']['where_detal']  = "citid = " . $this->nmgp_dados_form['citid'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_citadiagnos_script_case_init'] ]['form_cita']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_citadiagnos_script_case_init'] ]['form_detalle_citadiagnos']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_cita_empty.htm' : $this->Ini->link_form_detalle_citadiagnos_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y&sc_ifr_height=500';
if (isset($this->Ini->sc_lig_target['C_@scinf_servicios']) && 'nmsc_iframe_liga_form_detalle_citadiagnos' != $this->Ini->sc_lig_target['C_@scinf_servicios'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_servicios'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_citadiagnos_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_servicios'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_detalle_citadiagnos"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="500" width="100%" name="nmsc_iframe_liga_form_detalle_citadiagnos"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servicios_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servicios_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servicios_presup']))
    {
        $this->nm_new_label['servicios_presup'] = "SERVICIOS REALIZADOS";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servicios_presup = $this->servicios_presup;
   $sStyleHidden_servicios_presup = '';
   if (isset($this->nmgp_cmp_hidden['servicios_presup']) && $this->nmgp_cmp_hidden['servicios_presup'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servicios_presup']);
       $sStyleHidden_servicios_presup = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servicios_presup = 'display: none;';
   $sStyleReadInp_servicios_presup = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servicios_presup']) && $this->nmgp_cmp_readonly['servicios_presup'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servicios_presup']);
       $sStyleReadLab_servicios_presup = '';
       $sStyleReadInp_servicios_presup = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servicios_presup']) && $this->nmgp_cmp_hidden['servicios_presup'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servicios_presup" value="<?php echo $this->form_encode_input($servicios_presup) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_servicios_presup_line" id="hidden_field_data_servicios_presup" style="<?php echo $sStyleHidden_servicios_presup; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_servicios_presup_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_servicios_presup_label" style=""><span id="id_label_servicios_presup"><?php echo $this->nm_new_label['servicios_presup']; ?></span></span><br>
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_servicios_presup'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_servicios_presup'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_cita_presup_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_servicios_presup'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_cita_presup_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_cita_presup_script_case_init'] ]['form_detalle_cita_presup']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_cita_presup_script_case_init'] ]['form_detalle_cita_presup']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_cita_presup_script_case_init'] ]['form_detalle_cita_presup']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_cita_presup_script_case_init'] ]['form_detalle_cita_presup']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_cita_presup_script_case_init'] ]['form_detalle_cita_presup']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_cita_presup_script_case_init'] ]['form_detalle_cita_presup']['embutida_liga_form_update'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_cita_presup_script_case_init'] ]['form_detalle_cita_presup']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_cita_presup_script_case_init'] ]['form_detalle_cita_presup']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_cita_presup_script_case_init'] ]['form_detalle_cita_presup']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_cita_presup_script_case_init'] ]['form_detalle_cita_presup']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_cita_presup_script_case_init'] ]['form_detalle_cita_presup']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_cita_presup_script_case_init'] ]['form_detalle_cita_presup']['embutida_liga_tp_pag'] = 'total';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_cita_presup_script_case_init'] ]['form_detalle_cita_presup']['embutida_parms'] = "v_facturado*scin" . $this->nmgp_dados_form['citfactur'] . "*scoutv_anulado*scin" . $this->nmgp_dados_form['citanula'] . "*scoutv_numpresup*scin" . $this->nmgp_dados_form['prenumero'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinN*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_cita_presup_script_case_init'] ]['form_detalle_cita_presup']['foreign_key']['citid'] = $this->nmgp_dados_form['citid'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_cita_presup_script_case_init'] ]['form_detalle_cita_presup']['where_filter'] = "citid = " . $this->nmgp_dados_form['citid'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_cita_presup_script_case_init'] ]['form_detalle_cita_presup']['where_detal']  = "citid = " . $this->nmgp_dados_form['citid'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_cita_presup_script_case_init'] ]['form_cita']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_cita_presup_script_case_init'] ]['form_detalle_cita_presup']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_cita_empty.htm' : $this->Ini->link_form_detalle_cita_presup_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y&sc_ifr_height=500';
if (isset($this->Ini->sc_lig_target['C_@scinf_servicios_presup']) && 'nmsc_iframe_liga_form_detalle_cita_presup' != $this->Ini->sc_lig_target['C_@scinf_servicios_presup'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_servicios_presup'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['form_detalle_cita_presup_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_servicios_presup'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_detalle_cita_presup"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="500" width="100%" name="nmsc_iframe_liga_form_detalle_cita_presup"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servicios_presup_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servicios_presup_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['estado_presupuesto']))
    {
        $this->nm_new_label['estado_presupuesto'] = "estado_presupuesto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estado_presupuesto = $this->estado_presupuesto;
   if (!isset($this->nmgp_cmp_hidden['estado_presupuesto']))
   {
       $this->nmgp_cmp_hidden['estado_presupuesto'] = 'off';
   }
   $sStyleHidden_estado_presupuesto = '';
   if (isset($this->nmgp_cmp_hidden['estado_presupuesto']) && $this->nmgp_cmp_hidden['estado_presupuesto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estado_presupuesto']);
       $sStyleHidden_estado_presupuesto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estado_presupuesto = 'display: none;';
   $sStyleReadInp_estado_presupuesto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estado_presupuesto']) && $this->nmgp_cmp_readonly['estado_presupuesto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estado_presupuesto']);
       $sStyleReadLab_estado_presupuesto = '';
       $sStyleReadInp_estado_presupuesto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estado_presupuesto']) && $this->nmgp_cmp_hidden['estado_presupuesto'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estado_presupuesto" value="<?php echo $this->form_encode_input($estado_presupuesto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estado_presupuesto_line" id="hidden_field_data_estado_presupuesto" style="<?php echo $sStyleHidden_estado_presupuesto; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_estado_presupuesto_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_estado_presupuesto_label" style=""><span id="id_label_estado_presupuesto"><?php echo $this->nm_new_label['estado_presupuesto']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estado_presupuesto"]) &&  $this->nmgp_cmp_readonly["estado_presupuesto"] == "on") { 

 ?>
<input type="hidden" name="estado_presupuesto" value="<?php echo $this->form_encode_input($estado_presupuesto) . "\">" . $estado_presupuesto . ""; ?>
<?php } else { ?>
<span id="id_read_on_estado_presupuesto" class="sc-ui-readonly-estado_presupuesto css_estado_presupuesto_line" style="<?php echo $sStyleReadLab_estado_presupuesto; ?>"><?php echo $this->form_format_readonly("estado_presupuesto", $this->form_encode_input($this->estado_presupuesto)); ?></span><span id="id_read_off_estado_presupuesto" class="css_read_off_estado_presupuesto" style="white-space: nowrap;<?php echo $sStyleReadInp_estado_presupuesto; ?>">
 <input class="sc-js-input scFormObjectOdd css_estado_presupuesto_obj" style="" id="id_sc_field_estado_presupuesto" type=text name="estado_presupuesto" value="<?php echo $this->form_encode_input($estado_presupuesto) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estado_presupuesto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estado_presupuesto_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_estado_presupuesto_dumb = ('' == $sStyleHidden_estado_presupuesto) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_estado_presupuesto_dumb" style="<?php echo $sStyleHidden_estado_presupuesto_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_5"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="50%" height="">
<div id="div_hidden_bloco_5"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_5" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['val_primcli']))
    {
        $this->nm_new_label['val_primcli'] = "val_primcli";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $val_primcli = $this->val_primcli;
   if (!isset($this->nmgp_cmp_hidden['val_primcli']))
   {
       $this->nmgp_cmp_hidden['val_primcli'] = 'off';
   }
   $sStyleHidden_val_primcli = '';
   if (isset($this->nmgp_cmp_hidden['val_primcli']) && $this->nmgp_cmp_hidden['val_primcli'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['val_primcli']);
       $sStyleHidden_val_primcli = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_val_primcli = 'display: none;';
   $sStyleReadInp_val_primcli = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['val_primcli']) && $this->nmgp_cmp_readonly['val_primcli'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['val_primcli']);
       $sStyleReadLab_val_primcli = '';
       $sStyleReadInp_val_primcli = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['val_primcli']) && $this->nmgp_cmp_hidden['val_primcli'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="val_primcli" value="<?php echo $this->form_encode_input($val_primcli) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_val_primcli_line" id="hidden_field_data_val_primcli" style="<?php echo $sStyleHidden_val_primcli; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_val_primcli_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_val_primcli_label" style=""><span id="id_label_val_primcli"><?php echo $this->nm_new_label['val_primcli']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["val_primcli"]) &&  $this->nmgp_cmp_readonly["val_primcli"] == "on") { 

 ?>
<input type="hidden" name="val_primcli" value="<?php echo $this->form_encode_input($val_primcli) . "\">" . $val_primcli . ""; ?>
<?php } else { ?>
<span id="id_read_on_val_primcli" class="sc-ui-readonly-val_primcli css_val_primcli_line" style="<?php echo $sStyleReadLab_val_primcli; ?>"><?php echo $this->form_format_readonly("val_primcli", $this->form_encode_input($this->val_primcli)); ?></span><span id="id_read_off_val_primcli" class="css_read_off_val_primcli" style="white-space: nowrap;<?php echo $sStyleReadInp_val_primcli; ?>">
 <input class="sc-js-input scFormObjectOdd css_val_primcli_obj" style="" id="id_sc_field_val_primcli" type=text name="val_primcli" value="<?php echo $this->form_encode_input($val_primcli) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_val_primcli_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_val_primcli_text"></span></td></tr></table></td></tr></table> </TD>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['run_iframe'] != "R")
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
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8592;)", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8592;)", "sc-unique-btn-2", "", "");?>
 
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
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8594;)", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8594;)", "sc-unique-btn-4", "", "");?>
 
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
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai_modal()", "scBtnFn_sys_format_sai_modal()", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5);

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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_cita");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_cita");
 parent.scAjaxDetailHeight("form_cita", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_cita", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_cita", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['sc_modal'])
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
	function scBtnFn_CONTINUAR() {
		if ($("#sc_CONTINUAR_top").length && $("#sc_CONTINUAR_top").is(":visible")) {
			sc_btn_CONTINUAR()
			 return;
		}
	}
	function scBtnFn_regresar() {
		if ($("#sc_regresar_top").length && $("#sc_regresar_top").is(":visible")) {
			sc_btn_regresar()
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
		if ($("#sc_b_ini_b.sc-unique-btn-1").length && $("#sc_b_ini_b.sc-unique-btn-1").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-2").length && $("#sc_b_ret_b.sc-unique-btn-2").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-3").length && $("#sc_b_avc_b.sc-unique-btn-3").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-4").length && $("#sc_b_fim_b.sc-unique-btn-4").is(":visible")) {
			nm_move ('final');
			 return;
		}
	}
	function scBtnFn_sys_format_sai_modal() {
		if ($("#sc_b_sai_b.sc-unique-btn-5").length && $("#sc_b_sai_b.sc-unique-btn-5").is(":visible")) {
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cita']['buttonStatus'] = $this->nmgp_botoes;
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
