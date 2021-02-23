<?php
class form_DETALLE_ORDEN_TRABAJO_form extends form_DETALLE_ORDEN_TRABAJO_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - DETALLE_FACTURA"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - DETALLE_FACTURA"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['sc_redir_atualiz'] == 'ok')
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_DETALLE_ORDEN_TRABAJO/form_DETALLE_ORDEN_TRABAJO_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_DETALLE_ORDEN_TRABAJO_sajax_js.php");
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

include_once('form_DETALLE_ORDEN_TRABAJO_jquery.php');

?>

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
$str_iframe_body = 'margin-left: 0px; margin-right: 0px; margin-top: 0px; margin-bottom: 0px;';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['recarga'];
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
 include_once("form_DETALLE_ORDEN_TRABAJO_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['form_DETALLE_ORDEN_TRABAJO'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_DETALLE_ORDEN_TRABAJO'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['empty_filter'] = true;
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
   if (!isset($this->nmgp_cmp_hidden['estab_']))
   {
       $this->nmgp_cmp_hidden['estab_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['ptoemi_']))
   {
       $this->nmgp_cmp_hidden['ptoemi_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['secuencial_']))
   {
       $this->nmgp_cmp_hidden['secuencial_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['lote_']))
   {
       $this->nmgp_cmp_hidden['lote_'] = 'off';
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


    ?>

    <TD class="scFormLabelOddMult" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['codigo_']) && $this->nmgp_cmp_hidden['codigo_'] == 'off') { $sStyleHidden_codigo_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['codigo_']) || $this->nmgp_cmp_hidden['codigo_'] == 'on') {
      if (!isset($this->nm_new_label['codigo_'])) {
          $this->nm_new_label['codigo_'] = "CÓDIGO PRODUCTO"; } ?>

    <TD class="scFormLabelOddMult css_codigo__label" id="hidden_field_label_codigo_" style="<?php echo $sStyleHidden_codigo_; ?>" > <?php echo $this->nm_new_label['codigo_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['descripcion_']) && $this->nmgp_cmp_hidden['descripcion_'] == 'off') { $sStyleHidden_descripcion_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['descripcion_']) || $this->nmgp_cmp_hidden['descripcion_'] == 'on') {
      if (!isset($this->nm_new_label['descripcion_'])) {
          $this->nm_new_label['descripcion_'] = "DESCRIPCIÓN"; } ?>

    <TD class="scFormLabelOddMult css_descripcion__label" id="hidden_field_label_descripcion_" style="<?php echo $sStyleHidden_descripcion_; ?>" > <?php echo $this->nm_new_label['descripcion_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['cantidad_']) && $this->nmgp_cmp_hidden['cantidad_'] == 'off') { $sStyleHidden_cantidad_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['cantidad_']) || $this->nmgp_cmp_hidden['cantidad_'] == 'on') {
      if (!isset($this->nm_new_label['cantidad_'])) {
          $this->nm_new_label['cantidad_'] = "CANTIDAD"; } ?>

    <TD class="scFormLabelOddMult css_cantidad__label" id="hidden_field_label_cantidad_" style="<?php echo $sStyleHidden_cantidad_; ?>" > <?php echo $this->nm_new_label['cantidad_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['preciounitario_']) && $this->nmgp_cmp_hidden['preciounitario_'] == 'off') { $sStyleHidden_preciounitario_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['preciounitario_']) || $this->nmgp_cmp_hidden['preciounitario_'] == 'on') {
      if (!isset($this->nm_new_label['preciounitario_'])) {
          $this->nm_new_label['preciounitario_'] = "PRECIO UNITARIO"; } ?>

    <TD class="scFormLabelOddMult css_preciounitario__label" id="hidden_field_label_preciounitario_" style="<?php echo $sStyleHidden_preciounitario_; ?>" > <?php echo $this->nm_new_label['preciounitario_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['descuento_']) && $this->nmgp_cmp_hidden['descuento_'] == 'off') { $sStyleHidden_descuento_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['descuento_']) || $this->nmgp_cmp_hidden['descuento_'] == 'on') {
      if (!isset($this->nm_new_label['descuento_'])) {
          $this->nm_new_label['descuento_'] = "DESCUENTO"; } ?>

    <TD class="scFormLabelOddMult css_descuento__label" id="hidden_field_label_descuento_" style="<?php echo $sStyleHidden_descuento_; ?>" > <?php echo $this->nm_new_label['descuento_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['estab_']) && $this->nmgp_cmp_hidden['estab_'] == 'off') { $sStyleHidden_estab_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['estab_']) || $this->nmgp_cmp_hidden['estab_'] == 'on') {
      if (!isset($this->nm_new_label['estab_'])) {
          $this->nm_new_label['estab_'] = "ESTAB"; } ?>

    <TD class="scFormLabelOddMult css_estab__label" id="hidden_field_label_estab_" style="<?php echo $sStyleHidden_estab_; ?>" > <?php echo $this->nm_new_label['estab_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ptoemi_']) && $this->nmgp_cmp_hidden['ptoemi_'] == 'off') { $sStyleHidden_ptoemi_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ptoemi_']) || $this->nmgp_cmp_hidden['ptoemi_'] == 'on') {
      if (!isset($this->nm_new_label['ptoemi_'])) {
          $this->nm_new_label['ptoemi_'] = "PTOEMI"; } ?>

    <TD class="scFormLabelOddMult css_ptoemi__label" id="hidden_field_label_ptoemi_" style="<?php echo $sStyleHidden_ptoemi_; ?>" > <?php echo $this->nm_new_label['ptoemi_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['secuencial_']) && $this->nmgp_cmp_hidden['secuencial_'] == 'off') { $sStyleHidden_secuencial_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['secuencial_']) || $this->nmgp_cmp_hidden['secuencial_'] == 'on') {
      if (!isset($this->nm_new_label['secuencial_'])) {
          $this->nm_new_label['secuencial_'] = "SECUENCIAL"; } ?>

    <TD class="scFormLabelOddMult css_secuencial__label" id="hidden_field_label_secuencial_" style="<?php echo $sStyleHidden_secuencial_; ?>" > <?php echo $this->nm_new_label['secuencial_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['lote_']) && $this->nmgp_cmp_hidden['lote_'] == 'off') { $sStyleHidden_lote_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['lote_']) || $this->nmgp_cmp_hidden['lote_'] == 'on') {
      if (!isset($this->nm_new_label['lote_'])) {
          $this->nm_new_label['lote_'] = "LOTE"; } ?>

    <TD class="scFormLabelOddMult css_lote__label" id="hidden_field_label_lote_" style="<?php echo $sStyleHidden_lote_; ?>" > <?php echo $this->nm_new_label['lote_'] ?> </TD>
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
       $iStart = sizeof($this->form_vert_form_DETALLE_ORDEN_TRABAJO);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_DETALLE_ORDEN_TRABAJO = $this->form_vert_form_DETALLE_ORDEN_TRABAJO;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_DETALLE_ORDEN_TRABAJO))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['estab_']))
           {
               $this->nmgp_cmp_readonly['estab_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['ptoemi_']))
           {
               $this->nmgp_cmp_readonly['ptoemi_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['secuencial_']))
           {
               $this->nmgp_cmp_readonly['secuencial_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['lote_']))
           {
               $this->nmgp_cmp_readonly['lote_'] = 'on';
           }
   foreach ($this->form_vert_form_DETALLE_ORDEN_TRABAJO as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->ruc_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['ruc_'];
       $this->coddoc_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['coddoc_'];
       $this->preciototalsinimpuesto_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['preciototalsinimpuesto_'];
       $this->nombredetalleadicional1_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['nombredetalleadicional1_'];
       $this->valoradicional1_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['valoradicional1_'];
       $this->nombredetalleadicional2_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['nombredetalleadicional2_'];
       $this->valoradicional2_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['valoradicional2_'];
       $this->nombredetalleadicional3_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['nombredetalleadicional3_'];
       $this->valoradicional3_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['valoradicional3_'];
       $this->nombredetalleadicional4_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['nombredetalleadicional4_'];
       $this->valoradicional4_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['valoradicional4_'];
       $this->nombredetalleadicional5_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['nombredetalleadicional5_'];
       $this->valoradicional5_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['valoradicional5_'];
       $this->nombredetalleadicional6_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['nombredetalleadicional6_'];
       $this->valoradicional6_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['valoradicional6_'];
       $this->nombredetalleadicional7_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['nombredetalleadicional7_'];
       $this->valoradicional7_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['valoradicional7_'];
       $this->nombredetalleadicional8_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['nombredetalleadicional8_'];
       $this->valoradicional8_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['valoradicional8_'];
       $this->nombredetalleadicional9_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['nombredetalleadicional9_'];
       $this->valoradicional9_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['valoradicional9_'];
       $this->nombredetalleadicional10_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['nombredetalleadicional10_'];
       $this->valoradicional10_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['valoradicional10_'];
       $this->nombredetalleadicional11_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['nombredetalleadicional11_'];
       $this->valoradicional11_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['valoradicional11_'];
       $this->nombredetalleadicional12_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['nombredetalleadicional12_'];
       $this->valoradicional12_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['valoradicional12_'];
       $this->nombredetalleadicional13_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['nombredetalleadicional13_'];
       $this->valoradicional13_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['valoradicional13_'];
       $this->nombredetalleadicional14_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['nombredetalleadicional14_'];
       $this->valoradicional14_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['valoradicional14_'];
       $this->nombredetalleadicional15_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['nombredetalleadicional15_'];
       $this->valoradicional15_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['valoradicional15_'];
       $this->codigoimpuesto_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['codigoimpuesto_'];
       $this->codigoporcentajeimp_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['codigoporcentajeimp_'];
       $this->tarifa_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['tarifa_'];
       $this->baseimponible_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['baseimponible_'];
       $this->valor_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['valor_'];
       $this->codimpice_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['codimpice_'];
       $this->codporcenice_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['codporcenice_'];
       $this->baseice_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['baseice_'];
       $this->porcenice_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['porcenice_'];
       $this->valorice_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['valorice_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['codigo_'] = true;
           $this->nmgp_cmp_readonly['descripcion_'] = true;
           $this->nmgp_cmp_readonly['cantidad_'] = true;
           $this->nmgp_cmp_readonly['preciounitario_'] = true;
           $this->nmgp_cmp_readonly['descuento_'] = true;
           $this->nmgp_cmp_readonly['estab_'] = true;
           $this->nmgp_cmp_readonly['ptoemi_'] = true;
           $this->nmgp_cmp_readonly['secuencial_'] = true;
           $this->nmgp_cmp_readonly['lote_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['codigo_']) || $this->nmgp_cmp_readonly['codigo_'] != "on") {$this->nmgp_cmp_readonly['codigo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['descripcion_']) || $this->nmgp_cmp_readonly['descripcion_'] != "on") {$this->nmgp_cmp_readonly['descripcion_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cantidad_']) || $this->nmgp_cmp_readonly['cantidad_'] != "on") {$this->nmgp_cmp_readonly['cantidad_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['preciounitario_']) || $this->nmgp_cmp_readonly['preciounitario_'] != "on") {$this->nmgp_cmp_readonly['preciounitario_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['descuento_']) || $this->nmgp_cmp_readonly['descuento_'] != "on") {$this->nmgp_cmp_readonly['descuento_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['estab_']) || $this->nmgp_cmp_readonly['estab_'] != "on") {$this->nmgp_cmp_readonly['estab_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ptoemi_']) || $this->nmgp_cmp_readonly['ptoemi_'] != "on") {$this->nmgp_cmp_readonly['ptoemi_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['secuencial_']) || $this->nmgp_cmp_readonly['secuencial_'] != "on") {$this->nmgp_cmp_readonly['secuencial_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['lote_']) || $this->nmgp_cmp_readonly['lote_'] != "on") {$this->nmgp_cmp_readonly['lote_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->codigo_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['codigo_']; 
       $codigo_ = $this->codigo_; 
       $sStyleHidden_codigo_ = '';
       if (isset($sCheckRead_codigo_))
       {
           unset($sCheckRead_codigo_);
       }
       if (isset($this->nmgp_cmp_readonly['codigo_']))
       {
           $sCheckRead_codigo_ = $this->nmgp_cmp_readonly['codigo_'];
       }
       if (isset($this->nmgp_cmp_hidden['codigo_']) && $this->nmgp_cmp_hidden['codigo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['codigo_']);
           $sStyleHidden_codigo_ = 'display: none;';
       }
       $bTestReadOnly_codigo_ = true;
       $sStyleReadLab_codigo_ = 'display: none;';
       $sStyleReadInp_codigo_ = '';
       if (isset($this->nmgp_cmp_readonly['codigo_']) && $this->nmgp_cmp_readonly['codigo_'] == 'on')
       {
           $bTestReadOnly_codigo_ = false;
           unset($this->nmgp_cmp_readonly['codigo_']);
           $sStyleReadLab_codigo_ = '';
           $sStyleReadInp_codigo_ = 'display: none;';
       }
       $this->descripcion_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['descripcion_']; 
       $descripcion_ = $this->descripcion_; 
       $sStyleHidden_descripcion_ = '';
       if (isset($sCheckRead_descripcion_))
       {
           unset($sCheckRead_descripcion_);
       }
       if (isset($this->nmgp_cmp_readonly['descripcion_']))
       {
           $sCheckRead_descripcion_ = $this->nmgp_cmp_readonly['descripcion_'];
       }
       if (isset($this->nmgp_cmp_hidden['descripcion_']) && $this->nmgp_cmp_hidden['descripcion_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['descripcion_']);
           $sStyleHidden_descripcion_ = 'display: none;';
       }
       $bTestReadOnly_descripcion_ = true;
       $sStyleReadLab_descripcion_ = 'display: none;';
       $sStyleReadInp_descripcion_ = '';
       if (isset($this->nmgp_cmp_readonly['descripcion_']) && $this->nmgp_cmp_readonly['descripcion_'] == 'on')
       {
           $bTestReadOnly_descripcion_ = false;
           unset($this->nmgp_cmp_readonly['descripcion_']);
           $sStyleReadLab_descripcion_ = '';
           $sStyleReadInp_descripcion_ = 'display: none;';
       }
       $this->cantidad_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['cantidad_']; 
       $cantidad_ = $this->cantidad_; 
       $sStyleHidden_cantidad_ = '';
       if (isset($sCheckRead_cantidad_))
       {
           unset($sCheckRead_cantidad_);
       }
       if (isset($this->nmgp_cmp_readonly['cantidad_']))
       {
           $sCheckRead_cantidad_ = $this->nmgp_cmp_readonly['cantidad_'];
       }
       if (isset($this->nmgp_cmp_hidden['cantidad_']) && $this->nmgp_cmp_hidden['cantidad_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cantidad_']);
           $sStyleHidden_cantidad_ = 'display: none;';
       }
       $bTestReadOnly_cantidad_ = true;
       $sStyleReadLab_cantidad_ = 'display: none;';
       $sStyleReadInp_cantidad_ = '';
       if (isset($this->nmgp_cmp_readonly['cantidad_']) && $this->nmgp_cmp_readonly['cantidad_'] == 'on')
       {
           $bTestReadOnly_cantidad_ = false;
           unset($this->nmgp_cmp_readonly['cantidad_']);
           $sStyleReadLab_cantidad_ = '';
           $sStyleReadInp_cantidad_ = 'display: none;';
       }
       $this->preciounitario_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['preciounitario_']; 
       $preciounitario_ = $this->preciounitario_; 
       $sStyleHidden_preciounitario_ = '';
       if (isset($sCheckRead_preciounitario_))
       {
           unset($sCheckRead_preciounitario_);
       }
       if (isset($this->nmgp_cmp_readonly['preciounitario_']))
       {
           $sCheckRead_preciounitario_ = $this->nmgp_cmp_readonly['preciounitario_'];
       }
       if (isset($this->nmgp_cmp_hidden['preciounitario_']) && $this->nmgp_cmp_hidden['preciounitario_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['preciounitario_']);
           $sStyleHidden_preciounitario_ = 'display: none;';
       }
       $bTestReadOnly_preciounitario_ = true;
       $sStyleReadLab_preciounitario_ = 'display: none;';
       $sStyleReadInp_preciounitario_ = '';
       if (isset($this->nmgp_cmp_readonly['preciounitario_']) && $this->nmgp_cmp_readonly['preciounitario_'] == 'on')
       {
           $bTestReadOnly_preciounitario_ = false;
           unset($this->nmgp_cmp_readonly['preciounitario_']);
           $sStyleReadLab_preciounitario_ = '';
           $sStyleReadInp_preciounitario_ = 'display: none;';
       }
       $this->descuento_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['descuento_']; 
       $descuento_ = $this->descuento_; 
       $sStyleHidden_descuento_ = '';
       if (isset($sCheckRead_descuento_))
       {
           unset($sCheckRead_descuento_);
       }
       if (isset($this->nmgp_cmp_readonly['descuento_']))
       {
           $sCheckRead_descuento_ = $this->nmgp_cmp_readonly['descuento_'];
       }
       if (isset($this->nmgp_cmp_hidden['descuento_']) && $this->nmgp_cmp_hidden['descuento_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['descuento_']);
           $sStyleHidden_descuento_ = 'display: none;';
       }
       $bTestReadOnly_descuento_ = true;
       $sStyleReadLab_descuento_ = 'display: none;';
       $sStyleReadInp_descuento_ = '';
       if (isset($this->nmgp_cmp_readonly['descuento_']) && $this->nmgp_cmp_readonly['descuento_'] == 'on')
       {
           $bTestReadOnly_descuento_ = false;
           unset($this->nmgp_cmp_readonly['descuento_']);
           $sStyleReadLab_descuento_ = '';
           $sStyleReadInp_descuento_ = 'display: none;';
       }
       $this->estab_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['estab_']; 
       $estab_ = $this->estab_; 
       if (!isset($this->nmgp_cmp_hidden['estab_']))
       {
           $this->nmgp_cmp_hidden['estab_'] = 'off';
       }
       $sStyleHidden_estab_ = '';
       if (isset($sCheckRead_estab_))
       {
           unset($sCheckRead_estab_);
       }
       if (isset($this->nmgp_cmp_readonly['estab_']))
       {
           $sCheckRead_estab_ = $this->nmgp_cmp_readonly['estab_'];
       }
       if (isset($this->nmgp_cmp_hidden['estab_']) && $this->nmgp_cmp_hidden['estab_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['estab_']);
           $sStyleHidden_estab_ = 'display: none;';
       }
       $bTestReadOnly_estab_ = true;
       $sStyleReadLab_estab_ = 'display: none;';
       $sStyleReadInp_estab_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["estab_"]) &&  $this->nmgp_cmp_readonly["estab_"] == "on"))
       {
           $bTestReadOnly_estab_ = false;
           unset($this->nmgp_cmp_readonly['estab_']);
           $sStyleReadLab_estab_ = '';
           $sStyleReadInp_estab_ = 'display: none;';
       }
       $this->ptoemi_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['ptoemi_']; 
       $ptoemi_ = $this->ptoemi_; 
       if (!isset($this->nmgp_cmp_hidden['ptoemi_']))
       {
           $this->nmgp_cmp_hidden['ptoemi_'] = 'off';
       }
       $sStyleHidden_ptoemi_ = '';
       if (isset($sCheckRead_ptoemi_))
       {
           unset($sCheckRead_ptoemi_);
       }
       if (isset($this->nmgp_cmp_readonly['ptoemi_']))
       {
           $sCheckRead_ptoemi_ = $this->nmgp_cmp_readonly['ptoemi_'];
       }
       if (isset($this->nmgp_cmp_hidden['ptoemi_']) && $this->nmgp_cmp_hidden['ptoemi_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ptoemi_']);
           $sStyleHidden_ptoemi_ = 'display: none;';
       }
       $bTestReadOnly_ptoemi_ = true;
       $sStyleReadLab_ptoemi_ = 'display: none;';
       $sStyleReadInp_ptoemi_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["ptoemi_"]) &&  $this->nmgp_cmp_readonly["ptoemi_"] == "on"))
       {
           $bTestReadOnly_ptoemi_ = false;
           unset($this->nmgp_cmp_readonly['ptoemi_']);
           $sStyleReadLab_ptoemi_ = '';
           $sStyleReadInp_ptoemi_ = 'display: none;';
       }
       $this->secuencial_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['secuencial_']; 
       $secuencial_ = $this->secuencial_; 
       if (!isset($this->nmgp_cmp_hidden['secuencial_']))
       {
           $this->nmgp_cmp_hidden['secuencial_'] = 'off';
       }
       $sStyleHidden_secuencial_ = '';
       if (isset($sCheckRead_secuencial_))
       {
           unset($sCheckRead_secuencial_);
       }
       if (isset($this->nmgp_cmp_readonly['secuencial_']))
       {
           $sCheckRead_secuencial_ = $this->nmgp_cmp_readonly['secuencial_'];
       }
       if (isset($this->nmgp_cmp_hidden['secuencial_']) && $this->nmgp_cmp_hidden['secuencial_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['secuencial_']);
           $sStyleHidden_secuencial_ = 'display: none;';
       }
       $bTestReadOnly_secuencial_ = true;
       $sStyleReadLab_secuencial_ = 'display: none;';
       $sStyleReadInp_secuencial_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["secuencial_"]) &&  $this->nmgp_cmp_readonly["secuencial_"] == "on"))
       {
           $bTestReadOnly_secuencial_ = false;
           unset($this->nmgp_cmp_readonly['secuencial_']);
           $sStyleReadLab_secuencial_ = '';
           $sStyleReadInp_secuencial_ = 'display: none;';
       }
       $this->lote_ = $this->form_vert_form_DETALLE_ORDEN_TRABAJO[$sc_seq_vert]['lote_']; 
       $lote_ = $this->lote_; 
       if (!isset($this->nmgp_cmp_hidden['lote_']))
       {
           $this->nmgp_cmp_hidden['lote_'] = 'off';
       }
       $sStyleHidden_lote_ = '';
       if (isset($sCheckRead_lote_))
       {
           unset($sCheckRead_lote_);
       }
       if (isset($this->nmgp_cmp_readonly['lote_']))
       {
           $sCheckRead_lote_ = $this->nmgp_cmp_readonly['lote_'];
       }
       if (isset($this->nmgp_cmp_hidden['lote_']) && $this->nmgp_cmp_hidden['lote_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['lote_']);
           $sStyleHidden_lote_ = 'display: none;';
       }
       $bTestReadOnly_lote_ = true;
       $sStyleReadLab_lote_ = 'display: none;';
       $sStyleReadInp_lote_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["lote_"]) &&  $this->nmgp_cmp_readonly["lote_"] == "on"))
       {
           $bTestReadOnly_lote_ = false;
           unset($this->nmgp_cmp_readonly['lote_']);
           $sStyleReadLab_lote_ = '';
           $sStyleReadInp_lote_ = 'display: none;';
       }

       $nm_cor_fun_vert = ($nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>" > <?php echo $sc_seq_vert; ?> </TD>
   
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "sc_inline_form(" . $sc_seq_vert . ", 'estab_,ptoemi_,secuencial_,lote_', 500, 450)", "sc_inline_form(" . $sc_seq_vert . ", 'estab_,ptoemi_,secuencial_,lote_', 500, 450)", "sc_open_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayUpdate. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "sc_inline_form(" . $sc_seq_vert . ", 'estab_,ptoemi_,secuencial_,lote_', 500, 450)", "sc_inline_form(" . $sc_seq_vert . ", 'estab_,ptoemi_,secuencial_,lote_', 500, 450)", "sc_open_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($this->nmgp_botoes['update'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php }?>
<?php if ($this->nmgp_botoes['insert'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_DETALLE_ORDEN_TRABAJO_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_DETALLE_ORDEN_TRABAJO_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_DETALLE_ORDEN_TRABAJO_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_DETALLE_ORDEN_TRABAJO_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_DETALLE_ORDEN_TRABAJO_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_DETALLE_ORDEN_TRABAJO_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['codigo_']) && $this->nmgp_cmp_hidden['codigo_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($codigo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_codigo__line" id="hidden_field_data_codigo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_codigo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_codigo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_codigo_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigo_"]) &&  $this->nmgp_cmp_readonly["codigo_"] == "on") { 

 ?>
<input type="hidden" name="codigo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($codigo_) . "\">" . $codigo_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_codigo_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-codigo_<?php echo $sc_seq_vert ?> css_codigo__line" style="<?php echo $sStyleReadLab_codigo_; ?>"><?php echo $this->form_format_readonly("codigo_", $this->form_encode_input($this->codigo_)); ?></span><span id="id_read_off_codigo_<?php echo $sc_seq_vert ?>" class="css_read_off_codigo_" style="white-space: nowrap;<?php echo $sStyleReadInp_codigo_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_codigo__obj" style="" id="id_sc_field_codigo_<?php echo $sc_seq_vert ?>" type=text name="codigo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($codigo_) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['descripcion_']) && $this->nmgp_cmp_hidden['descripcion_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descripcion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($descripcion_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_descripcion__line" id="hidden_field_data_descripcion_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_descripcion_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_descripcion__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_descripcion_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descripcion_"]) &&  $this->nmgp_cmp_readonly["descripcion_"] == "on") { 

 ?>
<input type="hidden" name="descripcion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($descripcion_) . "\">" . $descripcion_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_descripcion_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-descripcion_<?php echo $sc_seq_vert ?> css_descripcion__line" style="<?php echo $sStyleReadLab_descripcion_; ?>"><?php echo $this->form_format_readonly("descripcion_", $this->form_encode_input($this->descripcion_)); ?></span><span id="id_read_off_descripcion_<?php echo $sc_seq_vert ?>" class="css_read_off_descripcion_" style="white-space: nowrap;<?php echo $sStyleReadInp_descripcion_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_descripcion__obj" style="" id="id_sc_field_descripcion_<?php echo $sc_seq_vert ?>" type=text name="descripcion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($descripcion_) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descripcion_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descripcion_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cantidad_']) && $this->nmgp_cmp_hidden['cantidad_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cantidad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cantidad_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cantidad__line" id="hidden_field_data_cantidad_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cantidad_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cantidad__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cantidad_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cantidad_"]) &&  $this->nmgp_cmp_readonly["cantidad_"] == "on") { 

 ?>
<input type="hidden" name="cantidad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cantidad_) . "\">" . $cantidad_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cantidad_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-cantidad_<?php echo $sc_seq_vert ?> css_cantidad__line" style="<?php echo $sStyleReadLab_cantidad_; ?>"><?php echo $this->form_format_readonly("cantidad_", $this->form_encode_input($this->cantidad_)); ?></span><span id="id_read_off_cantidad_<?php echo $sc_seq_vert ?>" class="css_read_off_cantidad_" style="white-space: nowrap;<?php echo $sStyleReadInp_cantidad_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_cantidad__obj" style="" id="id_sc_field_cantidad_<?php echo $sc_seq_vert ?>" type=text name="cantidad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cantidad_) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cantidad_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cantidad_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cantidad_']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cantidad_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cantidad_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cantidad_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['preciounitario_']) && $this->nmgp_cmp_hidden['preciounitario_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="preciounitario_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($preciounitario_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_preciounitario__line" id="hidden_field_data_preciounitario_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_preciounitario_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_preciounitario__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_preciounitario_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["preciounitario_"]) &&  $this->nmgp_cmp_readonly["preciounitario_"] == "on") { 

 ?>
<input type="hidden" name="preciounitario_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($preciounitario_) . "\">" . $preciounitario_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_preciounitario_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-preciounitario_<?php echo $sc_seq_vert ?> css_preciounitario__line" style="<?php echo $sStyleReadLab_preciounitario_; ?>"><?php echo $this->form_format_readonly("preciounitario_", $this->form_encode_input($this->preciounitario_)); ?></span><span id="id_read_off_preciounitario_<?php echo $sc_seq_vert ?>" class="css_read_off_preciounitario_" style="white-space: nowrap;<?php echo $sStyleReadInp_preciounitario_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_preciounitario__obj" style="" id="id_sc_field_preciounitario_<?php echo $sc_seq_vert ?>" type=text name="preciounitario_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($preciounitario_) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['preciounitario_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['preciounitario_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['preciounitario_']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['preciounitario_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_preciounitario_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_preciounitario_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['descuento_']) && $this->nmgp_cmp_hidden['descuento_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descuento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($descuento_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_descuento__line" id="hidden_field_data_descuento_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_descuento_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_descuento__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_descuento_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descuento_"]) &&  $this->nmgp_cmp_readonly["descuento_"] == "on") { 

 ?>
<input type="hidden" name="descuento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($descuento_) . "\">" . $descuento_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_descuento_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-descuento_<?php echo $sc_seq_vert ?> css_descuento__line" style="<?php echo $sStyleReadLab_descuento_; ?>"><?php echo $this->form_format_readonly("descuento_", $this->form_encode_input($this->descuento_)); ?></span><span id="id_read_off_descuento_<?php echo $sc_seq_vert ?>" class="css_read_off_descuento_" style="white-space: nowrap;<?php echo $sStyleReadInp_descuento_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_descuento__obj" style="" id="id_sc_field_descuento_<?php echo $sc_seq_vert ?>" type=text name="descuento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($descuento_) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['descuento_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['descuento_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['descuento_']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['descuento_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descuento_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descuento_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['estab_']) && $this->nmgp_cmp_hidden['estab_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estab_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($estab_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_estab__line" id="hidden_field_data_estab_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_estab_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_estab__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_estab_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["estab_"]) &&  $this->nmgp_cmp_readonly["estab_"] == "on")) { 

 ?>
<input type="hidden" name="estab_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($estab_) . "\"><span id=\"id_ajax_label_estab_" . $sc_seq_vert . "\">" . $estab_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_estab_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-estab_<?php echo $sc_seq_vert ?> css_estab__line" style="<?php echo $sStyleReadLab_estab_; ?>"><?php echo $this->form_format_readonly("estab_", $this->form_encode_input($this->estab_)); ?></span><span id="id_read_off_estab_<?php echo $sc_seq_vert ?>" class="css_read_off_estab_" style="white-space: nowrap;<?php echo $sStyleReadInp_estab_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_estab__obj" style="" id="id_sc_field_estab_<?php echo $sc_seq_vert ?>" type=text name="estab_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($estab_) ?>"
 size=3 alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['estab_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['estab_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['estab_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estab_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estab_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ptoemi_']) && $this->nmgp_cmp_hidden['ptoemi_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ptoemi_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ptoemi_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ptoemi__line" id="hidden_field_data_ptoemi_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ptoemi_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ptoemi__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ptoemi_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["ptoemi_"]) &&  $this->nmgp_cmp_readonly["ptoemi_"] == "on")) { 

 ?>
<input type="hidden" name="ptoemi_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ptoemi_) . "\"><span id=\"id_ajax_label_ptoemi_" . $sc_seq_vert . "\">" . $ptoemi_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_ptoemi_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ptoemi_<?php echo $sc_seq_vert ?> css_ptoemi__line" style="<?php echo $sStyleReadLab_ptoemi_; ?>"><?php echo $this->form_format_readonly("ptoemi_", $this->form_encode_input($this->ptoemi_)); ?></span><span id="id_read_off_ptoemi_<?php echo $sc_seq_vert ?>" class="css_read_off_ptoemi_" style="white-space: nowrap;<?php echo $sStyleReadInp_ptoemi_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ptoemi__obj" style="" id="id_sc_field_ptoemi_<?php echo $sc_seq_vert ?>" type=text name="ptoemi_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ptoemi_) ?>"
 size=3 alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ptoemi_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ptoemi_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['ptoemi_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ptoemi_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ptoemi_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['secuencial_']) && $this->nmgp_cmp_hidden['secuencial_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="secuencial_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($secuencial_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_secuencial__line" id="hidden_field_data_secuencial_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_secuencial_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_secuencial__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_secuencial_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["secuencial_"]) &&  $this->nmgp_cmp_readonly["secuencial_"] == "on")) { 

 ?>
<input type="hidden" name="secuencial_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($secuencial_) . "\"><span id=\"id_ajax_label_secuencial_" . $sc_seq_vert . "\">" . $secuencial_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_secuencial_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-secuencial_<?php echo $sc_seq_vert ?> css_secuencial__line" style="<?php echo $sStyleReadLab_secuencial_; ?>"><?php echo $this->form_format_readonly("secuencial_", $this->form_encode_input($this->secuencial_)); ?></span><span id="id_read_off_secuencial_<?php echo $sc_seq_vert ?>" class="css_read_off_secuencial_" style="white-space: nowrap;<?php echo $sStyleReadInp_secuencial_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_secuencial__obj" style="" id="id_sc_field_secuencial_<?php echo $sc_seq_vert ?>" type=text name="secuencial_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($secuencial_) ?>"
 size=9 maxlength=9 alt="{datatype: 'integer', maxLength: 9, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['secuencial_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['secuencial_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['secuencial_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_secuencial_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_secuencial_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['lote_']) && $this->nmgp_cmp_hidden['lote_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="lote_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($lote_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_lote__line" id="hidden_field_data_lote_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_lote_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_lote__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_lote_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["lote_"]) &&  $this->nmgp_cmp_readonly["lote_"] == "on")) { 

 ?>
<input type="hidden" name="lote_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($lote_) . "\"><span id=\"id_ajax_label_lote_" . $sc_seq_vert . "\">" . $lote_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_lote_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-lote_<?php echo $sc_seq_vert ?> css_lote__line" style="<?php echo $sStyleReadLab_lote_; ?>"><?php echo $this->form_format_readonly("lote_", $this->form_encode_input($this->lote_)); ?></span><span id="id_read_off_lote_<?php echo $sc_seq_vert ?>" class="css_read_off_lote_" style="white-space: nowrap;<?php echo $sStyleReadInp_lote_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_lote__obj" style="" id="id_sc_field_lote_<?php echo $sc_seq_vert ?>" type=text name="lote_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($lote_) ?>"
 size=22 maxlength=22 alt="{datatype: 'text', maxLength: 22, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lote_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lote_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_codigo_))
       {
           $this->nmgp_cmp_readonly['codigo_'] = $sCheckRead_codigo_;
       }
       if ('display: none;' == $sStyleHidden_codigo_)
       {
           $this->nmgp_cmp_hidden['codigo_'] = 'off';
       }
       if (isset($sCheckRead_descripcion_))
       {
           $this->nmgp_cmp_readonly['descripcion_'] = $sCheckRead_descripcion_;
       }
       if ('display: none;' == $sStyleHidden_descripcion_)
       {
           $this->nmgp_cmp_hidden['descripcion_'] = 'off';
       }
       if (isset($sCheckRead_cantidad_))
       {
           $this->nmgp_cmp_readonly['cantidad_'] = $sCheckRead_cantidad_;
       }
       if ('display: none;' == $sStyleHidden_cantidad_)
       {
           $this->nmgp_cmp_hidden['cantidad_'] = 'off';
       }
       if (isset($sCheckRead_preciounitario_))
       {
           $this->nmgp_cmp_readonly['preciounitario_'] = $sCheckRead_preciounitario_;
       }
       if ('display: none;' == $sStyleHidden_preciounitario_)
       {
           $this->nmgp_cmp_hidden['preciounitario_'] = 'off';
       }
       if (isset($sCheckRead_descuento_))
       {
           $this->nmgp_cmp_readonly['descuento_'] = $sCheckRead_descuento_;
       }
       if ('display: none;' == $sStyleHidden_descuento_)
       {
           $this->nmgp_cmp_hidden['descuento_'] = 'off';
       }
       if (isset($sCheckRead_estab_))
       {
           $this->nmgp_cmp_readonly['estab_'] = $sCheckRead_estab_;
       }
       if ('display: none;' == $sStyleHidden_estab_)
       {
           $this->nmgp_cmp_hidden['estab_'] = 'off';
       }
       if (isset($sCheckRead_ptoemi_))
       {
           $this->nmgp_cmp_readonly['ptoemi_'] = $sCheckRead_ptoemi_;
       }
       if ('display: none;' == $sStyleHidden_ptoemi_)
       {
           $this->nmgp_cmp_hidden['ptoemi_'] = 'off';
       }
       if (isset($sCheckRead_secuencial_))
       {
           $this->nmgp_cmp_readonly['secuencial_'] = $sCheckRead_secuencial_;
       }
       if ('display: none;' == $sStyleHidden_secuencial_)
       {
           $this->nmgp_cmp_hidden['secuencial_'] = 'off';
       }
       if (isset($sCheckRead_lote_))
       {
           $this->nmgp_cmp_readonly['lote_'] = $sCheckRead_lote_;
       }
       if ('display: none;' == $sStyleHidden_lote_)
       {
           $this->nmgp_cmp_hidden['lote_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_DETALLE_ORDEN_TRABAJO = $guarda_form_vert_form_DETALLE_ORDEN_TRABAJO;
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
<?php
if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
?>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['run_iframe'] != "R")
{
    $NM_btn = false;
    if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai_modal()", "scBtnFn_sys_format_sai_modal()", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['run_iframe'] != "R")
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
<?php
}
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
<script>
 var iAjaxNewLine = <?php echo $sc_seq_vert; ?>;
<?php
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_DETALLE_ORDEN_TRABAJO");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_DETALLE_ORDEN_TRABAJO");
 parent.scAjaxDetailHeight("form_DETALLE_ORDEN_TRABAJO", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_DETALLE_ORDEN_TRABAJO", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_DETALLE_ORDEN_TRABAJO", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['sc_modal'])
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
	function scBtnFn_sys_format_sai_modal() {
		if ($("#sc_b_sai_b.sc-unique-btn-1").length && $("#sc_b_sai_b.sc-unique-btn-1").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
	}
</script>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_DETALLE_ORDEN_TRABAJO']['buttonStatus'] = $this->nmgp_botoes;
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
