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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . ""); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . ""); } ?></TITLE>
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
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>control_filtro_ABONO_FACTURA/control_filtro_ABONO_FACTURA_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("control_filtro_ABONO_FACTURA_mob_sajax_js.php");
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

include_once('control_filtro_ABONO_FACTURA_mob_jquery.php');

?>

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


  $(".sc-ui-autocomp-num_doc_fac", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "num_doc_fac" != sId ? sId.substr(11) : "";
   if ("" == $(this).val()) {
    var hasChanged = "" != $("#id_sc_field_" + sId).val();
    $("#id_sc_field_" + sId).val("");
    if (hasChanged) {
     if ('function' == typeof do_ajax_control_filtro_ABONO_FACTURA_mob_event_num_doc_fac_onchange) { do_ajax_control_filtro_ABONO_FACTURA_mob_event_num_doc_fac_onchange(sRow); }
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
     url: "control_filtro_ABONO_FACTURA_mob.php",
     dataType: "json",
     data: {
      term: request.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_num_doc_fac?@?emisor?#?" + scAjaxGetFieldSelect("emisor") + "",
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
    var sId = $(this).attr("id").substr(6), sRow = 'num_doc_fac' != sId ? sId.substr(11) : '';
    if ("" == $(this).val()) {
     do_ajax_control_filtro_ABONO_FACTURA_mob_event_num_doc_fac_onchange(sRow);
    }
   },
   focus: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'num_doc_fac' != sId ? sId.substr(11) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
   },
   select: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'num_doc_fac' != sId ? sId.substr(11) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    do_ajax_control_filtro_ABONO_FACTURA_mob_event_num_doc_fac_onchange(sRow);
    event.preventDefault();
    $("#id_sc_field_" + sId).trigger("focus");
   }
  });
  $("#id_ac_num_doc_fac", elem).on("focus", function() {
    $("#id_sc_field_num_doc_fac").trigger("focus");
  }).on("blur", function() {
    $("#id_sc_field_num_doc_fac").trigger("blur");
  });

  $(".sc-ui-autocomp-num_doc_ot", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "num_doc_ot" != sId ? sId.substr(10) : "";
   if ("" == $(this).val()) {
    var hasChanged = "" != $("#id_sc_field_" + sId).val();
    $("#id_sc_field_" + sId).val("");
    if (hasChanged) {
     if ('function' == typeof do_ajax_control_filtro_ABONO_FACTURA_mob_event_num_doc_ot_onchange) { do_ajax_control_filtro_ABONO_FACTURA_mob_event_num_doc_ot_onchange(sRow); }
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
     url: "control_filtro_ABONO_FACTURA_mob.php",
     dataType: "json",
     data: {
      term: request.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_num_doc_ot?@?emisor?#?" + scAjaxGetFieldSelect("emisor") + "",
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
    var sId = $(this).attr("id").substr(6), sRow = 'num_doc_ot' != sId ? sId.substr(10) : '';
    if ("" == $(this).val()) {
     do_ajax_control_filtro_ABONO_FACTURA_mob_event_num_doc_ot_onchange(sRow);
    }
   },
   focus: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'num_doc_ot' != sId ? sId.substr(10) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
   },
   select: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'num_doc_ot' != sId ? sId.substr(10) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    do_ajax_control_filtro_ABONO_FACTURA_mob_event_num_doc_ot_onchange(sRow);
    event.preventDefault();
    $("#id_sc_field_" + sId).trigger("focus");
   }
  });
  $("#id_ac_num_doc_ot", elem).on("focus", function() {
    $("#id_sc_field_num_doc_ot").trigger("focus");
  }).on("blur", function() {
    $("#id_sc_field_num_doc_ot").trigger("blur");
  });
}
</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['recarga'];
}
    $remove_margin = '';
    $remove_border = '';
    $vertical_center = '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (isset($_SESSION['scriptcase']['control_filtro_ABONO_FACTURA']['error_buffer']) && '' != $_SESSION['scriptcase']['control_filtro_ABONO_FACTURA']['error_buffer'])
{
    echo $_SESSION['scriptcase']['control_filtro_ABONO_FACTURA']['error_buffer'];
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
 include_once("control_filtro_ABONO_FACTURA_mob_js0.php");
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
               action="control_filtro_ABONO_FACTURA_mob.php" 
               target="_self">
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nmgp_url_saida); ?>">
<input type="hidden" name="bok" value="OK">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['control_filtro_ABONO_FACTURA_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['control_filtro_ABONO_FACTURA_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php echo "ABONO A FACTURA / ORDEN DE TRABAJO" ?></div>
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['secuencial']))
   {
       $this->nmgp_cmp_hidden['secuencial'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


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

    <TD class="scFormDataOdd css_emisor_line" id="hidden_field_data_emisor" style="<?php echo $sStyleHidden_emisor; ?>"> <span class="scFormLabelOddFormat css_emisor_label" style=""><span id="id_label_emisor"><?php echo $this->nm_new_label['emisor']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['php_cmp_required']['emisor']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['php_cmp_required']['emisor'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["emisor"]) &&  $this->nmgp_cmp_readonly["emisor"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_emisor']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_emisor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_emisor']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_emisor'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_emisor']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_emisor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_emisor']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_emisor'] = array(); 
    }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT emiruc, emiruc + ' - ' + emirazsoc  FROM fac_emisores  ORDER BY emiruc, emirazsoc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT emiruc, concat(emiruc,' - ',emirazsoc)  FROM fac_emisores  ORDER BY emiruc, emirazsoc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT emiruc, emiruc&' - '&emirazsoc  FROM fac_emisores  ORDER BY emiruc, emirazsoc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT emiruc, emiruc||' - '||emirazsoc  FROM fac_emisores  ORDER BY emiruc, emirazsoc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT emiruc, emiruc + ' - ' + emirazsoc  FROM fac_emisores  ORDER BY emiruc, emirazsoc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT emiruc, emiruc||' - '||emirazsoc  FROM fac_emisores  ORDER BY emiruc, emirazsoc";
   }
   else
   {
       $nm_comando = "SELECT emiruc, emiruc||' - '||emirazsoc  FROM fac_emisores  ORDER BY emiruc, emirazsoc";
   }
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_emisor'][] = $rs->fields[0];
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_emisor'][] = ''; 
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
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_doc']))
   {
       $this->nm_new_label['tipo_doc'] = "TIPO DOC.";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_doc = $this->tipo_doc;
   $sStyleHidden_tipo_doc = '';
   if (isset($this->nmgp_cmp_hidden['tipo_doc']) && $this->nmgp_cmp_hidden['tipo_doc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_doc']);
       $sStyleHidden_tipo_doc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_doc = 'display: none;';
   $sStyleReadInp_tipo_doc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_doc']) && $this->nmgp_cmp_readonly['tipo_doc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_doc']);
       $sStyleReadLab_tipo_doc = '';
       $sStyleReadInp_tipo_doc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_doc']) && $this->nmgp_cmp_hidden['tipo_doc'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_doc" value="<?php echo $this->form_encode_input($this->tipo_doc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipo_doc_line" id="hidden_field_data_tipo_doc" style="<?php echo $sStyleHidden_tipo_doc; ?>"> <span class="scFormLabelOddFormat css_tipo_doc_label" style=""><span id="id_label_tipo_doc"><?php echo $this->nm_new_label['tipo_doc']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['php_cmp_required']['tipo_doc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['php_cmp_required']['tipo_doc'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_doc"]) &&  $this->nmgp_cmp_readonly["tipo_doc"] == "on") { 

$tipo_doc_look = "";
 if ($this->tipo_doc == "F") { $tipo_doc_look .= "FACTURA" ;} 
 if ($this->tipo_doc == "O") { $tipo_doc_look .= "ORDEN DE TRABAJO" ;} 
 if (empty($tipo_doc_look)) { $tipo_doc_look = $this->tipo_doc; }
?>
<input type="hidden" name="tipo_doc" value="<?php echo $this->form_encode_input($tipo_doc) . "\">" . $tipo_doc_look . ""; ?>
<?php } else { ?>
<?php

$tipo_doc_look = "";
 if ($this->tipo_doc == "F") { $tipo_doc_look .= "FACTURA" ;} 
 if ($this->tipo_doc == "O") { $tipo_doc_look .= "ORDEN DE TRABAJO" ;} 
 if (empty($tipo_doc_look)) { $tipo_doc_look = $this->tipo_doc; }
?>
<span id="id_read_on_tipo_doc" class="css_tipo_doc_line"  style="<?php echo $sStyleReadLab_tipo_doc; ?>"><?php echo $this->form_format_readonly("tipo_doc", $this->form_encode_input($tipo_doc_look)); ?></span><span id="id_read_off_tipo_doc" class="css_read_off_tipo_doc" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo_doc; ?>">
 <span id="idAjaxSelect_tipo_doc"><select class="sc-js-input scFormObjectOdd css_tipo_doc_obj" style="" id="id_sc_field_tipo_doc" name="tipo_doc" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_tipo_doc'][] = ''; ?>
 <option value="">------------------------</option>
 <option  value="F" <?php  if ($this->tipo_doc == "F") { echo " selected" ;} ?>>FACTURA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_tipo_doc'][] = 'F'; ?>
 <option  value="O" <?php  if ($this->tipo_doc == "O") { echo " selected" ;} ?>>ORDEN DE TRABAJO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_tipo_doc'][] = 'O'; ?>
 </select></span>
</span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['num_doc_fac']))
    {
        $this->nm_new_label['num_doc_fac'] = "No. DOCUMENTO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $num_doc_fac = $this->num_doc_fac;
   $sStyleHidden_num_doc_fac = '';
   if (isset($this->nmgp_cmp_hidden['num_doc_fac']) && $this->nmgp_cmp_hidden['num_doc_fac'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['num_doc_fac']);
       $sStyleHidden_num_doc_fac = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_num_doc_fac = 'display: none;';
   $sStyleReadInp_num_doc_fac = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['num_doc_fac']) && $this->nmgp_cmp_readonly['num_doc_fac'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['num_doc_fac']);
       $sStyleReadLab_num_doc_fac = '';
       $sStyleReadInp_num_doc_fac = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['num_doc_fac']) && $this->nmgp_cmp_hidden['num_doc_fac'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="num_doc_fac" value="<?php echo $this->form_encode_input($num_doc_fac) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_num_doc_fac_line" id="hidden_field_data_num_doc_fac" style="<?php echo $sStyleHidden_num_doc_fac; ?>"> <span class="scFormLabelOddFormat css_num_doc_fac_label" style=""><span id="id_label_num_doc_fac"><?php echo $this->nm_new_label['num_doc_fac']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["num_doc_fac"]) &&  $this->nmgp_cmp_readonly["num_doc_fac"] == "on") { 

 ?>
<input type="hidden" name="num_doc_fac" value="<?php echo $this->form_encode_input($num_doc_fac) . "\">" . $num_doc_fac . ""; ?>
<?php } else { ?>

<?php
$aRecData['num_doc_fac'] = $this->num_doc_fac;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_num_doc_fac']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_num_doc_fac'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_num_doc_fac']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_num_doc_fac'] = array(); 
    }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT SECUENCIAL, ESTAB + '-' + PTOEMI + '-' + SECUENCIAL FROM FACTURA WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_fac), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT SECUENCIAL, concat(ESTAB,'-',PTOEMI,'-',SECUENCIAL) FROM FACTURA WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_fac), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT SECUENCIAL, ESTAB&'-'&PTOEMI&'-'&SECUENCIAL FROM FACTURA WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_fac), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT SECUENCIAL, ESTAB||'-'||PTOEMI||'-'||SECUENCIAL FROM FACTURA WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_fac), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT SECUENCIAL, ESTAB + '-' + PTOEMI + '-' + convert(char,SECUENCIAL) FROM FACTURA WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_fac), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT SECUENCIAL, ESTAB||'-'||PTOEMI||'-'||char(SECUENCIAL) FROM FACTURA WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_fac), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
   else
   {
       $nm_comando = "SELECT SECUENCIAL, ESTAB||'-'||PTOEMI||'-'||SECUENCIAL FROM FACTURA WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_fac), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_num_doc_fac'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->num_doc_fac])) ? $aLookup[0][$this->num_doc_fac] : $this->num_doc_fac;
$num_doc_fac_look = (isset($aLookup[0][$this->num_doc_fac])) ? $aLookup[0][$this->num_doc_fac] : $this->num_doc_fac;
?>
<span id="id_read_on_num_doc_fac" class="sc-ui-readonly-num_doc_fac css_num_doc_fac_line" style="<?php echo $sStyleReadLab_num_doc_fac; ?>"><?php echo $this->form_format_readonly("num_doc_fac", str_replace("<", "&lt;", $num_doc_fac_look)); ?></span><span id="id_read_off_num_doc_fac" class="css_read_off_num_doc_fac" style="white-space: nowrap;<?php echo $sStyleReadInp_num_doc_fac; ?>">
 <input class="sc-js-input scFormObjectOdd css_num_doc_fac_obj" style="display: none;" id="id_sc_field_num_doc_fac" type=text name="num_doc_fac" value="<?php echo $this->form_encode_input($num_doc_fac) ?>"
 size=10 maxlength=20 style="display: none" alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['num_doc_fac'] = $this->num_doc_fac;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_num_doc_fac']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_num_doc_fac'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_num_doc_fac']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_num_doc_fac'] = array(); 
    }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT SECUENCIAL, ESTAB + '-' + PTOEMI + '-' + SECUENCIAL FROM FACTURA WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_fac), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT SECUENCIAL, concat(ESTAB,'-',PTOEMI,'-',SECUENCIAL) FROM FACTURA WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_fac), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT SECUENCIAL, ESTAB&'-'&PTOEMI&'-'&SECUENCIAL FROM FACTURA WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_fac), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT SECUENCIAL, ESTAB||'-'||PTOEMI||'-'||SECUENCIAL FROM FACTURA WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_fac), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT SECUENCIAL, ESTAB + '-' + PTOEMI + '-' + convert(char,SECUENCIAL) FROM FACTURA WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_fac), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT SECUENCIAL, ESTAB||'-'||PTOEMI||'-'||char(SECUENCIAL) FROM FACTURA WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_fac), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
   else
   {
       $nm_comando = "SELECT SECUENCIAL, ESTAB||'-'||PTOEMI||'-'||SECUENCIAL FROM FACTURA WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_fac), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_num_doc_fac'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->num_doc_fac])) ? $aLookup[0][$this->num_doc_fac] : '';
$num_doc_fac_look = (isset($aLookup[0][$this->num_doc_fac])) ? $aLookup[0][$this->num_doc_fac] : '';
?>
<input type="text" id="id_ac_num_doc_fac" name="num_doc_fac_autocomp" class="scFormObjectOdd sc-ui-autocomp-num_doc_fac css_num_doc_fac_obj" size="30" value="<?php echo $sAutocompValue; ?>" alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  /></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['num_doc_ot']))
    {
        $this->nm_new_label['num_doc_ot'] = "No. DOCUMENTO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $num_doc_ot = $this->num_doc_ot;
   $sStyleHidden_num_doc_ot = '';
   if (isset($this->nmgp_cmp_hidden['num_doc_ot']) && $this->nmgp_cmp_hidden['num_doc_ot'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['num_doc_ot']);
       $sStyleHidden_num_doc_ot = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_num_doc_ot = 'display: none;';
   $sStyleReadInp_num_doc_ot = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['num_doc_ot']) && $this->nmgp_cmp_readonly['num_doc_ot'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['num_doc_ot']);
       $sStyleReadLab_num_doc_ot = '';
       $sStyleReadInp_num_doc_ot = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['num_doc_ot']) && $this->nmgp_cmp_hidden['num_doc_ot'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="num_doc_ot" value="<?php echo $this->form_encode_input($num_doc_ot) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_num_doc_ot_line" id="hidden_field_data_num_doc_ot" style="<?php echo $sStyleHidden_num_doc_ot; ?>"> <span class="scFormLabelOddFormat css_num_doc_ot_label" style=""><span id="id_label_num_doc_ot"><?php echo $this->nm_new_label['num_doc_ot']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["num_doc_ot"]) &&  $this->nmgp_cmp_readonly["num_doc_ot"] == "on") { 

 ?>
<input type="hidden" name="num_doc_ot" value="<?php echo $this->form_encode_input($num_doc_ot) . "\">" . $num_doc_ot . ""; ?>
<?php } else { ?>

<?php
$aRecData['num_doc_ot'] = $this->num_doc_ot;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_num_doc_ot']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_num_doc_ot'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_num_doc_ot']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_num_doc_ot'] = array(); 
    }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT SECUENCIAL, ESTAB + '-' + PTOEMI + '-' + SECUENCIAL FROM orden_trabajo WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_ot), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT SECUENCIAL, concat(ESTAB,'-',PTOEMI,'-',SECUENCIAL) FROM orden_trabajo WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_ot), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT SECUENCIAL, ESTAB&'-'&PTOEMI&'-'&SECUENCIAL FROM orden_trabajo WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_ot), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT SECUENCIAL, ESTAB||'-'||PTOEMI||'-'||SECUENCIAL FROM orden_trabajo WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_ot), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT SECUENCIAL, ESTAB + '-' + PTOEMI + '-' + convert(char,SECUENCIAL) FROM orden_trabajo WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_ot), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT SECUENCIAL, ESTAB||'-'||PTOEMI||'-'||char(SECUENCIAL) FROM orden_trabajo WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_ot), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
   else
   {
       $nm_comando = "SELECT SECUENCIAL, ESTAB||'-'||PTOEMI||'-'||SECUENCIAL FROM orden_trabajo WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_ot), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_num_doc_ot'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->num_doc_ot])) ? $aLookup[0][$this->num_doc_ot] : $this->num_doc_ot;
$num_doc_ot_look = (isset($aLookup[0][$this->num_doc_ot])) ? $aLookup[0][$this->num_doc_ot] : $this->num_doc_ot;
?>
<span id="id_read_on_num_doc_ot" class="sc-ui-readonly-num_doc_ot css_num_doc_ot_line" style="<?php echo $sStyleReadLab_num_doc_ot; ?>"><?php echo $this->form_format_readonly("num_doc_ot", str_replace("<", "&lt;", $num_doc_ot_look)); ?></span><span id="id_read_off_num_doc_ot" class="css_read_off_num_doc_ot" style="white-space: nowrap;<?php echo $sStyleReadInp_num_doc_ot; ?>">
 <input class="sc-js-input scFormObjectOdd css_num_doc_ot_obj" style="display: none;" id="id_sc_field_num_doc_ot" type=text name="num_doc_ot" value="<?php echo $this->form_encode_input($num_doc_ot) ?>"
 size=10 maxlength=20 style="display: none" alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['num_doc_ot'] = $this->num_doc_ot;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_num_doc_ot']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_num_doc_ot'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_num_doc_ot']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_num_doc_ot'] = array(); 
    }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT SECUENCIAL, ESTAB + '-' + PTOEMI + '-' + SECUENCIAL FROM orden_trabajo WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_ot), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT SECUENCIAL, concat(ESTAB,'-',PTOEMI,'-',SECUENCIAL) FROM orden_trabajo WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_ot), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT SECUENCIAL, ESTAB&'-'&PTOEMI&'-'&SECUENCIAL FROM orden_trabajo WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_ot), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT SECUENCIAL, ESTAB||'-'||PTOEMI||'-'||SECUENCIAL FROM orden_trabajo WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_ot), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT SECUENCIAL, ESTAB + '-' + PTOEMI + '-' + convert(char,SECUENCIAL) FROM orden_trabajo WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_ot), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT SECUENCIAL, ESTAB||'-'||PTOEMI||'-'||char(SECUENCIAL) FROM orden_trabajo WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_ot), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
   else
   {
       $nm_comando = "SELECT SECUENCIAL, ESTAB||'-'||PTOEMI||'-'||SECUENCIAL FROM orden_trabajo WHERE (RUC='$this->emisor') AND SECUENCIAL = '" . substr($this->Db->qstr($this->num_doc_ot), 1, -1) . "' ORDER BY ESTAB, PTOEMI, SECUENCIAL";
   }
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['Lookup_num_doc_ot'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->num_doc_ot])) ? $aLookup[0][$this->num_doc_ot] : '';
$num_doc_ot_look = (isset($aLookup[0][$this->num_doc_ot])) ? $aLookup[0][$this->num_doc_ot] : '';
?>
<input type="text" id="id_ac_num_doc_ot" name="num_doc_ot_autocomp" class="scFormObjectOdd sc-ui-autocomp-num_doc_ot css_num_doc_ot_obj" size="30" value="<?php echo $sAutocompValue; ?>" alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  /></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['secuencial']))
    {
        $this->nm_new_label['secuencial'] = "SECUENCIAL";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $secuencial = $this->secuencial;
   if (!isset($this->nmgp_cmp_hidden['secuencial']))
   {
       $this->nmgp_cmp_hidden['secuencial'] = 'off';
   }
   $sStyleHidden_secuencial = '';
   if (isset($this->nmgp_cmp_hidden['secuencial']) && $this->nmgp_cmp_hidden['secuencial'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['secuencial']);
       $sStyleHidden_secuencial = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_secuencial = 'display: none;';
   $sStyleReadInp_secuencial = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['secuencial']) && $this->nmgp_cmp_readonly['secuencial'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['secuencial']);
       $sStyleReadLab_secuencial = '';
       $sStyleReadInp_secuencial = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['secuencial']) && $this->nmgp_cmp_hidden['secuencial'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="secuencial" value="<?php echo $this->form_encode_input($secuencial) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_secuencial_line" id="hidden_field_data_secuencial" style="<?php echo $sStyleHidden_secuencial; ?>"> <span class="scFormLabelOddFormat css_secuencial_label" style=""><span id="id_label_secuencial"><?php echo $this->nm_new_label['secuencial']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["secuencial"]) &&  $this->nmgp_cmp_readonly["secuencial"] == "on") { 

 ?>
<input type="hidden" name="secuencial" value="<?php echo $this->form_encode_input($secuencial) . "\">" . $secuencial . ""; ?>
<?php } else { ?>
<span id="id_read_on_secuencial" class="sc-ui-readonly-secuencial css_secuencial_line" style="<?php echo $sStyleReadLab_secuencial; ?>"><?php echo $this->form_format_readonly("secuencial", $this->form_encode_input($this->secuencial)); ?></span><span id="id_read_off_secuencial" class="css_read_off_secuencial" style="white-space: nowrap;<?php echo $sStyleReadInp_secuencial; ?>">
 <input class="sc-js-input scFormObjectOdd css_secuencial_obj" style="" id="id_sc_field_secuencial" type=text name="secuencial" value="<?php echo $this->form_encode_input($secuencial) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
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
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
    $NM_btn = false;
?>
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
        $sCondStyle = ($this->nmgp_botoes['ok'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bok", "scBtnFn_sys_format_ok()", "scBtnFn_sys_format_ok()", "sub_form_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
?>
       
<?php
           if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
           if (($nm_apl_dependente != 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['dashboard_info']['under_dashboard'])) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['nm_run_menu']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['nm_run_menu'] != 1))) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "Bsair_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
           if (($nm_apl_dependente == 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "Bsair_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
            </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("control_filtro_ABONO_FACTURA_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("control_filtro_ABONO_FACTURA_mob");
 parent.scAjaxDetailHeight("control_filtro_ABONO_FACTURA_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("control_filtro_ABONO_FACTURA_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("control_filtro_ABONO_FACTURA_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['sc_modal'])
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
	function scBtnFn_sys_format_ok() {
		if ($("#sub_form_b.sc-unique-btn-1").length && $("#sub_form_b.sc-unique-btn-1").is(":visible")) {
			nm_atualiza('alterar');
			 return;
		}
		if ($("#sub_form_b.sc-unique-btn-4").length && $("#sub_form_b.sc-unique-btn-4").is(":visible")) {
			nm_atualiza('alterar');
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
		if ($("#Bsair_b.sc-unique-btn-2").length && $("#Bsair_b.sc-unique-btn-2").is(":visible")) {
			nm_saida_glo(); return false;
			 return;
		}
		if ($("#Bsair_b.sc-unique-btn-3").length && $("#Bsair_b.sc-unique-btn-3").is(":visible")) {
			nm_saida_glo(); return false;
			 return;
		}
		if ($("#Bsair_b.sc-unique-btn-5").length && $("#Bsair_b.sc-unique-btn-5").is(":visible")) {
			nm_saida_glo(); return false;
			 return;
		}
		if ($("#Bsair_b.sc-unique-btn-6").length && $("#Bsair_b.sc-unique-btn-6").is(":visible")) {
			nm_saida_glo(); return false;
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
$_SESSION['sc_session'][$this->Ini->sc_page]['control_filtro_ABONO_FACTURA_mob']['buttonStatus'] = $this->nmgp_botoes;
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
