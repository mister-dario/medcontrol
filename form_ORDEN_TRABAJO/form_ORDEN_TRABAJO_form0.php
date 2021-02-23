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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - ORDEN DE TRABAJO"); } else { echo strip_tags(""); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['embutida_pdf']))
 {
 ?>
<?php
    if ((isset($this->nmgp_tipo_pdf) && $this->nmgp_tipo_pdf == "pb") || (isset($this->nmgp_cor_print) && $this->nmgp_cor_print == "PB"))
    {
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['prt_view'] && $this->Ini->Export_img_zip) 
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
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['prt_view'] && $this->Ini->Export_img_zip) 
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
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_ORDEN_TRABAJO/form_ORDEN_TRABAJO_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_ORDEN_TRABAJO_sajax_js.php");
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
     if (F_name == "facturado")
     {
        $('input[name="facturado[]"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="facturado[]"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="facturado[]"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('form_ORDEN_TRABAJO_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  $("#hidden_bloco_1").each(function() {
   $(this.rows[0]).bind("click", {block: this}, toggleBlock)
                  .mouseover(function() { $(this).css("cursor", "pointer"); })
                  .mouseout(function() { $(this).css("cursor", ""); });
  });

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
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
    "hidden_bloco_1": false
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['recarga'];
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
 include_once("form_ORDEN_TRABAJO_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_ORDEN_TRABAJO'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_ORDEN_TRABAJO'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['pdf_view'])
{
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['run_iframe'] != "R")
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
        $sCondStyle = ($this->nmgp_botoes['FACTURAR'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "facturar", "scBtnFn_FACTURAR()", "scBtnFn_FACTURAR()", "sc_FACTURAR_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
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
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['empty_filter'] = true;
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
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['num_fact']))
           {
               $this->nmgp_cmp_readonly['num_fact'] = 'on';
           }
?>
   <tr>


    <TD colspan="5" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">DATOS ORDEN DE TRABAJO</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['fechaemision']))
           {
               $this->nmgp_cmp_readonly['fechaemision'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idcomprador']))
           {
               $this->nmgp_cmp_readonly['idcomprador'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['razonsocialcomprador']))
           {
               $this->nmgp_cmp_readonly['razonsocialcomprador'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['totalsinimpuestos']))
           {
               $this->nmgp_cmp_readonly['totalsinimpuestos'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['totaldescuento']))
           {
               $this->nmgp_cmp_readonly['totaldescuento'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['num_fact']))
    {
        $this->nm_new_label['num_fact'] = "NÚMERO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $num_fact = $this->num_fact;
   $sStyleHidden_num_fact = '';
   if (isset($this->nmgp_cmp_hidden['num_fact']) && $this->nmgp_cmp_hidden['num_fact'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['num_fact']);
       $sStyleHidden_num_fact = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_num_fact = 'display: none;';
   $sStyleReadInp_num_fact = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["num_fact"]) &&  $this->nmgp_cmp_readonly["num_fact"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['num_fact']);
       $sStyleReadLab_num_fact = '';
       $sStyleReadInp_num_fact = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['num_fact']) && $this->nmgp_cmp_hidden['num_fact'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="num_fact" value="<?php echo $this->form_encode_input($num_fact) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_num_fact_line" id="hidden_field_data_num_fact" style="<?php echo $sStyleHidden_num_fact; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_num_fact_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_num_fact_label" style=""><span id="id_label_num_fact"><?php echo $this->nm_new_label['num_fact']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["num_fact"]) &&  $this->nmgp_cmp_readonly["num_fact"] == "on")) { 

 ?>
<input type="hidden" name="num_fact" value="<?php echo $this->form_encode_input($num_fact) . "\"><span id=\"id_ajax_label_num_fact\">" . $num_fact . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_num_fact" class="sc-ui-readonly-num_fact css_num_fact_line" style="<?php echo $sStyleReadLab_num_fact; ?>"><?php echo $this->form_format_readonly("num_fact", $this->form_encode_input($this->num_fact)); ?></span><span id="id_read_off_num_fact" class="css_read_off_num_fact" style="white-space: nowrap;<?php echo $sStyleReadInp_num_fact; ?>">
 <input class="sc-js-input scFormObjectOdd css_num_fact_obj" style="" id="id_sc_field_num_fact" type=text name="num_fact" value="<?php echo $this->form_encode_input($num_fact) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_num_fact_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_num_fact_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fechaemision']))
    {
        $this->nm_new_label['fechaemision'] = "FECHA DE EMISIÓN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fechaemision = $this->fechaemision;
   $sStyleHidden_fechaemision = '';
   if (isset($this->nmgp_cmp_hidden['fechaemision']) && $this->nmgp_cmp_hidden['fechaemision'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fechaemision']);
       $sStyleHidden_fechaemision = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fechaemision = 'display: none;';
   $sStyleReadInp_fechaemision = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["fechaemision"]) &&  $this->nmgp_cmp_readonly["fechaemision"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fechaemision']);
       $sStyleReadLab_fechaemision = '';
       $sStyleReadInp_fechaemision = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fechaemision']) && $this->nmgp_cmp_hidden['fechaemision'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fechaemision" value="<?php echo $this->form_encode_input($fechaemision) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fechaemision_line" id="hidden_field_data_fechaemision" style="<?php echo $sStyleHidden_fechaemision; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fechaemision_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fechaemision_label" style=""><span id="id_label_fechaemision"><?php echo $this->nm_new_label['fechaemision']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["fechaemision"]) &&  $this->nmgp_cmp_readonly["fechaemision"] == "on")) { 

 ?>
<input type="hidden" name="fechaemision" value="<?php echo $this->form_encode_input($fechaemision) . "\"><span id=\"id_ajax_label_fechaemision\">" . $fechaemision . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_fechaemision" class="sc-ui-readonly-fechaemision css_fechaemision_line" style="<?php echo $sStyleReadLab_fechaemision; ?>"><?php echo $this->form_format_readonly("fechaemision", $this->form_encode_input($this->fechaemision)); ?></span><span id="id_read_off_fechaemision" class="css_read_off_fechaemision" style="white-space: nowrap;<?php echo $sStyleReadInp_fechaemision; ?>">
 <input class="sc-js-input scFormObjectOdd css_fechaemision_obj" style="" id="id_sc_field_fechaemision" type=text name="fechaemision" value="<?php echo $this->form_encode_input($fechaemision) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fechaemision_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechaemision_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['idcomprador']))
    {
        $this->nm_new_label['idcomprador'] = "ID CLIENTE";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idcomprador = $this->idcomprador;
   $sStyleHidden_idcomprador = '';
   if (isset($this->nmgp_cmp_hidden['idcomprador']) && $this->nmgp_cmp_hidden['idcomprador'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idcomprador']);
       $sStyleHidden_idcomprador = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idcomprador = 'display: none;';
   $sStyleReadInp_idcomprador = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idcomprador"]) &&  $this->nmgp_cmp_readonly["idcomprador"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idcomprador']);
       $sStyleReadLab_idcomprador = '';
       $sStyleReadInp_idcomprador = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idcomprador']) && $this->nmgp_cmp_hidden['idcomprador'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idcomprador" value="<?php echo $this->form_encode_input($idcomprador) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idcomprador_line" id="hidden_field_data_idcomprador" style="<?php echo $sStyleHidden_idcomprador; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idcomprador_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idcomprador_label" style=""><span id="id_label_idcomprador"><?php echo $this->nm_new_label['idcomprador']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["idcomprador"]) &&  $this->nmgp_cmp_readonly["idcomprador"] == "on")) { 

 ?>
<input type="hidden" name="idcomprador" value="<?php echo $this->form_encode_input($idcomprador) . "\"><span id=\"id_ajax_label_idcomprador\">" . $idcomprador . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_idcomprador" class="sc-ui-readonly-idcomprador css_idcomprador_line" style="<?php echo $sStyleReadLab_idcomprador; ?>"><?php echo $this->form_format_readonly("idcomprador", $this->form_encode_input($this->idcomprador)); ?></span><span id="id_read_off_idcomprador" class="css_read_off_idcomprador" style="white-space: nowrap;<?php echo $sStyleReadInp_idcomprador; ?>">
 <input class="sc-js-input scFormObjectOdd css_idcomprador_obj" style="" id="id_sc_field_idcomprador" type=text name="idcomprador" value="<?php echo $this->form_encode_input($idcomprador) ?>"
 size=13 maxlength=13 alt="{datatype: 'text', maxLength: 13, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idcomprador_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idcomprador_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['razonsocialcomprador']))
    {
        $this->nm_new_label['razonsocialcomprador'] = "NOMBRE CLIENTE";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $razonsocialcomprador = $this->razonsocialcomprador;
   $sStyleHidden_razonsocialcomprador = '';
   if (isset($this->nmgp_cmp_hidden['razonsocialcomprador']) && $this->nmgp_cmp_hidden['razonsocialcomprador'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['razonsocialcomprador']);
       $sStyleHidden_razonsocialcomprador = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_razonsocialcomprador = 'display: none;';
   $sStyleReadInp_razonsocialcomprador = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["razonsocialcomprador"]) &&  $this->nmgp_cmp_readonly["razonsocialcomprador"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['razonsocialcomprador']);
       $sStyleReadLab_razonsocialcomprador = '';
       $sStyleReadInp_razonsocialcomprador = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['razonsocialcomprador']) && $this->nmgp_cmp_hidden['razonsocialcomprador'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="razonsocialcomprador" value="<?php echo $this->form_encode_input($razonsocialcomprador) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_razonsocialcomprador_line" id="hidden_field_data_razonsocialcomprador" style="<?php echo $sStyleHidden_razonsocialcomprador; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_razonsocialcomprador_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_razonsocialcomprador_label" style=""><span id="id_label_razonsocialcomprador"><?php echo $this->nm_new_label['razonsocialcomprador']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["razonsocialcomprador"]) &&  $this->nmgp_cmp_readonly["razonsocialcomprador"] == "on")) { 

 ?>
<input type="hidden" name="razonsocialcomprador" value="<?php echo $this->form_encode_input($razonsocialcomprador) . "\"><span id=\"id_ajax_label_razonsocialcomprador\">" . $razonsocialcomprador . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_razonsocialcomprador" class="sc-ui-readonly-razonsocialcomprador css_razonsocialcomprador_line" style="<?php echo $sStyleReadLab_razonsocialcomprador; ?>"><?php echo $this->form_format_readonly("razonsocialcomprador", $this->form_encode_input($this->razonsocialcomprador)); ?></span><span id="id_read_off_razonsocialcomprador" class="css_read_off_razonsocialcomprador" style="white-space: nowrap;<?php echo $sStyleReadInp_razonsocialcomprador; ?>">
 <input class="sc-js-input scFormObjectOdd css_razonsocialcomprador_obj" style="" id="id_sc_field_razonsocialcomprador" type=text name="razonsocialcomprador" value="<?php echo $this->form_encode_input($razonsocialcomprador) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_razonsocialcomprador_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_razonsocialcomprador_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['totalsinimpuestos']))
    {
        $this->nm_new_label['totalsinimpuestos'] = "TOTAL SIN IMPUESTOS";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $totalsinimpuestos = $this->totalsinimpuestos;
   $sStyleHidden_totalsinimpuestos = '';
   if (isset($this->nmgp_cmp_hidden['totalsinimpuestos']) && $this->nmgp_cmp_hidden['totalsinimpuestos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['totalsinimpuestos']);
       $sStyleHidden_totalsinimpuestos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_totalsinimpuestos = 'display: none;';
   $sStyleReadInp_totalsinimpuestos = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["totalsinimpuestos"]) &&  $this->nmgp_cmp_readonly["totalsinimpuestos"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['totalsinimpuestos']);
       $sStyleReadLab_totalsinimpuestos = '';
       $sStyleReadInp_totalsinimpuestos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['totalsinimpuestos']) && $this->nmgp_cmp_hidden['totalsinimpuestos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="totalsinimpuestos" value="<?php echo $this->form_encode_input($totalsinimpuestos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_totalsinimpuestos_line" id="hidden_field_data_totalsinimpuestos" style="<?php echo $sStyleHidden_totalsinimpuestos; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_totalsinimpuestos_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_totalsinimpuestos_label" style=""><span id="id_label_totalsinimpuestos"><?php echo $this->nm_new_label['totalsinimpuestos']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["totalsinimpuestos"]) &&  $this->nmgp_cmp_readonly["totalsinimpuestos"] == "on")) { 

 ?>
<input type="hidden" name="totalsinimpuestos" value="<?php echo $this->form_encode_input($totalsinimpuestos) . "\"><span id=\"id_ajax_label_totalsinimpuestos\">" . $totalsinimpuestos . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_totalsinimpuestos" class="sc-ui-readonly-totalsinimpuestos css_totalsinimpuestos_line" style="<?php echo $sStyleReadLab_totalsinimpuestos; ?>"><?php echo $this->form_format_readonly("totalsinimpuestos", $this->form_encode_input($this->totalsinimpuestos)); ?></span><span id="id_read_off_totalsinimpuestos" class="css_read_off_totalsinimpuestos" style="white-space: nowrap;<?php echo $sStyleReadInp_totalsinimpuestos; ?>">
 <input class="sc-js-input scFormObjectOdd css_totalsinimpuestos_obj" style="" id="id_sc_field_totalsinimpuestos" type=text name="totalsinimpuestos" value="<?php echo $this->form_encode_input($totalsinimpuestos) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['totalsinimpuestos']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['totalsinimpuestos']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['totalsinimpuestos']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['totalsinimpuestos']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_totalsinimpuestos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_totalsinimpuestos_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_num_fact_dumb = ('' == $sStyleHidden_num_fact) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_num_fact_dumb" style="<?php echo $sStyleHidden_num_fact_dumb; ?>"></TD>
<?php $sStyleHidden_fechaemision_dumb = ('' == $sStyleHidden_fechaemision) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fechaemision_dumb" style="<?php echo $sStyleHidden_fechaemision_dumb; ?>"></TD>
<?php $sStyleHidden_idcomprador_dumb = ('' == $sStyleHidden_idcomprador) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idcomprador_dumb" style="<?php echo $sStyleHidden_idcomprador_dumb; ?>"></TD>
<?php $sStyleHidden_razonsocialcomprador_dumb = ('' == $sStyleHidden_razonsocialcomprador) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_razonsocialcomprador_dumb" style="<?php echo $sStyleHidden_razonsocialcomprador_dumb; ?>"></TD>
<?php $sStyleHidden_totalsinimpuestos_dumb = ('' == $sStyleHidden_totalsinimpuestos) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_totalsinimpuestos_dumb" style="<?php echo $sStyleHidden_totalsinimpuestos_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['base_12']))
           {
               $this->nmgp_cmp_readonly['base_12'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['base_0']))
           {
               $this->nmgp_cmp_readonly['base_0'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['importetotal']))
           {
               $this->nmgp_cmp_readonly['importetotal'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['campoadicional1']))
           {
               $this->nmgp_cmp_readonly['campoadicional1'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['totaldescuento']))
    {
        $this->nm_new_label['totaldescuento'] = "DESCUENTO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $totaldescuento = $this->totaldescuento;
   $sStyleHidden_totaldescuento = '';
   if (isset($this->nmgp_cmp_hidden['totaldescuento']) && $this->nmgp_cmp_hidden['totaldescuento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['totaldescuento']);
       $sStyleHidden_totaldescuento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_totaldescuento = 'display: none;';
   $sStyleReadInp_totaldescuento = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["totaldescuento"]) &&  $this->nmgp_cmp_readonly["totaldescuento"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['totaldescuento']);
       $sStyleReadLab_totaldescuento = '';
       $sStyleReadInp_totaldescuento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['totaldescuento']) && $this->nmgp_cmp_hidden['totaldescuento'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="totaldescuento" value="<?php echo $this->form_encode_input($totaldescuento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_totaldescuento_line" id="hidden_field_data_totaldescuento" style="<?php echo $sStyleHidden_totaldescuento; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_totaldescuento_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_totaldescuento_label" style=""><span id="id_label_totaldescuento"><?php echo $this->nm_new_label['totaldescuento']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["totaldescuento"]) &&  $this->nmgp_cmp_readonly["totaldescuento"] == "on")) { 

 ?>
<input type="hidden" name="totaldescuento" value="<?php echo $this->form_encode_input($totaldescuento) . "\"><span id=\"id_ajax_label_totaldescuento\">" . $totaldescuento . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_totaldescuento" class="sc-ui-readonly-totaldescuento css_totaldescuento_line" style="<?php echo $sStyleReadLab_totaldescuento; ?>"><?php echo $this->form_format_readonly("totaldescuento", $this->form_encode_input($this->totaldescuento)); ?></span><span id="id_read_off_totaldescuento" class="css_read_off_totaldescuento" style="white-space: nowrap;<?php echo $sStyleReadInp_totaldescuento; ?>">
 <input class="sc-js-input scFormObjectOdd css_totaldescuento_obj" style="" id="id_sc_field_totaldescuento" type=text name="totaldescuento" value="<?php echo $this->form_encode_input($totaldescuento) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['totaldescuento']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['totaldescuento']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['totaldescuento']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['totaldescuento']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_totaldescuento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_totaldescuento_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['base_12']))
    {
        $this->nm_new_label['base_12'] = "BASE 12%";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $base_12 = $this->base_12;
   $sStyleHidden_base_12 = '';
   if (isset($this->nmgp_cmp_hidden['base_12']) && $this->nmgp_cmp_hidden['base_12'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['base_12']);
       $sStyleHidden_base_12 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_base_12 = 'display: none;';
   $sStyleReadInp_base_12 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["base_12"]) &&  $this->nmgp_cmp_readonly["base_12"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['base_12']);
       $sStyleReadLab_base_12 = '';
       $sStyleReadInp_base_12 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['base_12']) && $this->nmgp_cmp_hidden['base_12'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="base_12" value="<?php echo $this->form_encode_input($base_12) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_base_12_line" id="hidden_field_data_base_12" style="<?php echo $sStyleHidden_base_12; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_base_12_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_base_12_label" style=""><span id="id_label_base_12"><?php echo $this->nm_new_label['base_12']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["base_12"]) &&  $this->nmgp_cmp_readonly["base_12"] == "on")) { 

 ?>
<input type="hidden" name="base_12" value="<?php echo $this->form_encode_input($base_12) . "\"><span id=\"id_ajax_label_base_12\">" . $base_12 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_base_12" class="sc-ui-readonly-base_12 css_base_12_line" style="<?php echo $sStyleReadLab_base_12; ?>"><?php echo $this->form_format_readonly("base_12", $this->form_encode_input($this->base_12)); ?></span><span id="id_read_off_base_12" class="css_read_off_base_12" style="white-space: nowrap;<?php echo $sStyleReadInp_base_12; ?>">
 <input class="sc-js-input scFormObjectOdd css_base_12_obj" style="" id="id_sc_field_base_12" type=text name="base_12" value="<?php echo $this->form_encode_input($base_12) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['base_12']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['base_12']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['base_12']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['base_12']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_base_12_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_base_12_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['base_0']))
    {
        $this->nm_new_label['base_0'] = "BASE 0%";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $base_0 = $this->base_0;
   $sStyleHidden_base_0 = '';
   if (isset($this->nmgp_cmp_hidden['base_0']) && $this->nmgp_cmp_hidden['base_0'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['base_0']);
       $sStyleHidden_base_0 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_base_0 = 'display: none;';
   $sStyleReadInp_base_0 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["base_0"]) &&  $this->nmgp_cmp_readonly["base_0"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['base_0']);
       $sStyleReadLab_base_0 = '';
       $sStyleReadInp_base_0 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['base_0']) && $this->nmgp_cmp_hidden['base_0'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="base_0" value="<?php echo $this->form_encode_input($base_0) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_base_0_line" id="hidden_field_data_base_0" style="<?php echo $sStyleHidden_base_0; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_base_0_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_base_0_label" style=""><span id="id_label_base_0"><?php echo $this->nm_new_label['base_0']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["base_0"]) &&  $this->nmgp_cmp_readonly["base_0"] == "on")) { 

 ?>
<input type="hidden" name="base_0" value="<?php echo $this->form_encode_input($base_0) . "\"><span id=\"id_ajax_label_base_0\">" . $base_0 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_base_0" class="sc-ui-readonly-base_0 css_base_0_line" style="<?php echo $sStyleReadLab_base_0; ?>"><?php echo $this->form_format_readonly("base_0", $this->form_encode_input($this->base_0)); ?></span><span id="id_read_off_base_0" class="css_read_off_base_0" style="white-space: nowrap;<?php echo $sStyleReadInp_base_0; ?>">
 <input class="sc-js-input scFormObjectOdd css_base_0_obj" style="" id="id_sc_field_base_0" type=text name="base_0" value="<?php echo $this->form_encode_input($base_0) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['base_0']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['base_0']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['base_0']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['base_0']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_base_0_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_base_0_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['importetotal']))
    {
        $this->nm_new_label['importetotal'] = "IMPORTE TOTAL";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importetotal = $this->importetotal;
   $sStyleHidden_importetotal = '';
   if (isset($this->nmgp_cmp_hidden['importetotal']) && $this->nmgp_cmp_hidden['importetotal'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importetotal']);
       $sStyleHidden_importetotal = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importetotal = 'display: none;';
   $sStyleReadInp_importetotal = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["importetotal"]) &&  $this->nmgp_cmp_readonly["importetotal"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importetotal']);
       $sStyleReadLab_importetotal = '';
       $sStyleReadInp_importetotal = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importetotal']) && $this->nmgp_cmp_hidden['importetotal'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importetotal" value="<?php echo $this->form_encode_input($importetotal) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importetotal_line" id="hidden_field_data_importetotal" style="<?php echo $sStyleHidden_importetotal; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_importetotal_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_importetotal_label" style=""><span id="id_label_importetotal"><?php echo $this->nm_new_label['importetotal']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["importetotal"]) &&  $this->nmgp_cmp_readonly["importetotal"] == "on")) { 

 ?>
<input type="hidden" name="importetotal" value="<?php echo $this->form_encode_input($importetotal) . "\"><span id=\"id_ajax_label_importetotal\">" . $importetotal . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_importetotal" class="sc-ui-readonly-importetotal css_importetotal_line" style="<?php echo $sStyleReadLab_importetotal; ?>"><?php echo $this->form_format_readonly("importetotal", $this->form_encode_input($this->importetotal)); ?></span><span id="id_read_off_importetotal" class="css_read_off_importetotal" style="white-space: nowrap;<?php echo $sStyleReadInp_importetotal; ?>">
 <input class="sc-js-input scFormObjectOdd css_importetotal_obj" style="" id="id_sc_field_importetotal" type=text name="importetotal" value="<?php echo $this->form_encode_input($importetotal) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importetotal']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importetotal']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importetotal']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importetotal']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_importetotal_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_importetotal_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['facturado']))
   {
       $this->nm_new_label['facturado'] = "FACTURADO";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $facturado = $this->facturado;
   $sStyleHidden_facturado = '';
   if (isset($this->nmgp_cmp_hidden['facturado']) && $this->nmgp_cmp_hidden['facturado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['facturado']);
       $sStyleHidden_facturado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_facturado = 'display: none;';
   $sStyleReadInp_facturado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['facturado']) && $this->nmgp_cmp_readonly['facturado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['facturado']);
       $sStyleReadLab_facturado = '';
       $sStyleReadInp_facturado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['facturado']) && $this->nmgp_cmp_hidden['facturado'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="facturado" value="<?php echo $this->form_encode_input($this->facturado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->facturado_1 = explode(";", trim($this->facturado));
  } 
  else
  {
      if (empty($this->facturado))
      {
          $this->facturado_1= array(); 
          $this->facturado= "";
      } 
      else
      {
          $this->facturado_1= $this->facturado; 
          $this->facturado= ""; 
          foreach ($this->facturado_1 as $cada_facturado)
          {
             if (!empty($facturado))
             {
                 $this->facturado.= ";"; 
             } 
             $this->facturado.= $cada_facturado; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_facturado_line" id="hidden_field_data_facturado" style="<?php echo $sStyleHidden_facturado; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_facturado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_facturado_label" style=""><span id="id_label_facturado"><?php echo $this->nm_new_label['facturado']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["facturado"]) &&  $this->nmgp_cmp_readonly["facturado"] == "on") { 

$facturado_look = "";
 if ($this->facturado == "1") { $facturado_look .= "" ;} 
 if (empty($facturado_look)) { $facturado_look = $this->facturado; }
?>
<input type="hidden" name="facturado" value="<?php echo $this->form_encode_input($facturado) . "\">" . $facturado_look . ""; ?>
<?php } else { ?>

<?php

$facturado_look = "";
 if ($this->facturado == "1") { $facturado_look .= "" ;} 
 if (empty($facturado_look)) { $facturado_look = $this->facturado; }
?>
<span id="id_read_on_facturado" class="css_facturado_line" style="<?php echo $sStyleReadLab_facturado; ?>"><?php echo $this->form_format_readonly("facturado", $this->form_encode_input($facturado_look)); ?></span><span id="id_read_off_facturado" class="css_read_off_facturado css_facturado_line" style="<?php echo $sStyleReadInp_facturado; ?>"><?php echo "<div id=\"idAjaxCheckbox_facturado\" style=\"display: inline-block\" class=\"css_facturado_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_facturado_line"><?php $tempOptionId = "id-opt-facturado" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-facturado sc-ui-checkbox-facturado" name="facturado[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['Lookup_facturado'][] = '1'; ?>
<?php  if (in_array("1", $this->facturado_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>"></label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_facturado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_facturado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_totaldescuento_dumb = ('' == $sStyleHidden_totaldescuento) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_totaldescuento_dumb" style="<?php echo $sStyleHidden_totaldescuento_dumb; ?>"></TD>
<?php $sStyleHidden_base_12_dumb = ('' == $sStyleHidden_base_12) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_base_12_dumb" style="<?php echo $sStyleHidden_base_12_dumb; ?>"></TD>
<?php $sStyleHidden_base_0_dumb = ('' == $sStyleHidden_base_0) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_base_0_dumb" style="<?php echo $sStyleHidden_base_0_dumb; ?>"></TD>
<?php $sStyleHidden_importetotal_dumb = ('' == $sStyleHidden_importetotal) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_importetotal_dumb" style="<?php echo $sStyleHidden_importetotal_dumb; ?>"></TD>
<?php $sStyleHidden_facturado_dumb = ('' == $sStyleHidden_facturado) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_facturado_dumb" style="<?php echo $sStyleHidden_facturado_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="8" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf1\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_exp . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>CAMPOS ADICIONALES<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['valoradicional1']))
           {
               $this->nmgp_cmp_readonly['valoradicional1'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['campoadicional2']))
           {
               $this->nmgp_cmp_readonly['campoadicional2'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['valoradicional2']))
           {
               $this->nmgp_cmp_readonly['valoradicional2'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['campoadicional3']))
           {
               $this->nmgp_cmp_readonly['campoadicional3'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['valoradicional3']))
           {
               $this->nmgp_cmp_readonly['valoradicional3'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['campoadicional4']))
           {
               $this->nmgp_cmp_readonly['campoadicional4'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['valoradicional4']))
           {
               $this->nmgp_cmp_readonly['valoradicional4'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['campoadicional5']))
           {
               $this->nmgp_cmp_readonly['campoadicional5'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['campoadicional1']))
    {
        $this->nm_new_label['campoadicional1'] = "CAMPOADICIONAL1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $campoadicional1 = $this->campoadicional1;
   $sStyleHidden_campoadicional1 = '';
   if (isset($this->nmgp_cmp_hidden['campoadicional1']) && $this->nmgp_cmp_hidden['campoadicional1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['campoadicional1']);
       $sStyleHidden_campoadicional1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_campoadicional1 = 'display: none;';
   $sStyleReadInp_campoadicional1 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["campoadicional1"]) &&  $this->nmgp_cmp_readonly["campoadicional1"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['campoadicional1']);
       $sStyleReadLab_campoadicional1 = '';
       $sStyleReadInp_campoadicional1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['campoadicional1']) && $this->nmgp_cmp_hidden['campoadicional1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="campoadicional1" value="<?php echo $this->form_encode_input($campoadicional1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_campoadicional1_line" id="hidden_field_data_campoadicional1" style="<?php echo $sStyleHidden_campoadicional1; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_campoadicional1_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["campoadicional1"]) &&  $this->nmgp_cmp_readonly["campoadicional1"] == "on")) { 

 ?>
<input type="hidden" name="campoadicional1" value="<?php echo $this->form_encode_input($campoadicional1) . "\"><span id=\"id_ajax_label_campoadicional1\">" . $campoadicional1 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_campoadicional1" class="sc-ui-readonly-campoadicional1 css_campoadicional1_line" style="<?php echo $sStyleReadLab_campoadicional1; ?>"><?php echo $this->form_format_readonly("campoadicional1", $this->form_encode_input($this->campoadicional1)); ?></span><span id="id_read_off_campoadicional1" class="css_read_off_campoadicional1" style="white-space: nowrap;<?php echo $sStyleReadInp_campoadicional1; ?>">
 <input class="sc-js-input scFormObjectOdd css_campoadicional1_obj" style="" id="id_sc_field_campoadicional1" type=text name="campoadicional1" value="<?php echo $this->form_encode_input($campoadicional1) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_campoadicional1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_campoadicional1_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valoradicional1']))
    {
        $this->nm_new_label['valoradicional1'] = "VALORADICIONAL1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valoradicional1 = $this->valoradicional1;
   $sStyleHidden_valoradicional1 = '';
   if (isset($this->nmgp_cmp_hidden['valoradicional1']) && $this->nmgp_cmp_hidden['valoradicional1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valoradicional1']);
       $sStyleHidden_valoradicional1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valoradicional1 = 'display: none;';
   $sStyleReadInp_valoradicional1 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["valoradicional1"]) &&  $this->nmgp_cmp_readonly["valoradicional1"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valoradicional1']);
       $sStyleReadLab_valoradicional1 = '';
       $sStyleReadInp_valoradicional1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valoradicional1']) && $this->nmgp_cmp_hidden['valoradicional1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valoradicional1" value="<?php echo $this->form_encode_input($valoradicional1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valoradicional1_line" id="hidden_field_data_valoradicional1" style="<?php echo $sStyleHidden_valoradicional1; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valoradicional1_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["valoradicional1"]) &&  $this->nmgp_cmp_readonly["valoradicional1"] == "on")) { 

 ?>
<input type="hidden" name="valoradicional1" value="<?php echo $this->form_encode_input($valoradicional1) . "\"><span id=\"id_ajax_label_valoradicional1\">" . $valoradicional1 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_valoradicional1" class="sc-ui-readonly-valoradicional1 css_valoradicional1_line" style="<?php echo $sStyleReadLab_valoradicional1; ?>"><?php echo $this->form_format_readonly("valoradicional1", $this->form_encode_input($this->valoradicional1)); ?></span><span id="id_read_off_valoradicional1" class="css_read_off_valoradicional1" style="white-space: nowrap;<?php echo $sStyleReadInp_valoradicional1; ?>">
 <input class="sc-js-input scFormObjectOdd css_valoradicional1_obj" style="" id="id_sc_field_valoradicional1" type=text name="valoradicional1" value="<?php echo $this->form_encode_input($valoradicional1) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valoradicional1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valoradicional1_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['campoadicional2']))
    {
        $this->nm_new_label['campoadicional2'] = "CAMPOADICIONAL2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $campoadicional2 = $this->campoadicional2;
   $sStyleHidden_campoadicional2 = '';
   if (isset($this->nmgp_cmp_hidden['campoadicional2']) && $this->nmgp_cmp_hidden['campoadicional2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['campoadicional2']);
       $sStyleHidden_campoadicional2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_campoadicional2 = 'display: none;';
   $sStyleReadInp_campoadicional2 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["campoadicional2"]) &&  $this->nmgp_cmp_readonly["campoadicional2"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['campoadicional2']);
       $sStyleReadLab_campoadicional2 = '';
       $sStyleReadInp_campoadicional2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['campoadicional2']) && $this->nmgp_cmp_hidden['campoadicional2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="campoadicional2" value="<?php echo $this->form_encode_input($campoadicional2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_campoadicional2_line" id="hidden_field_data_campoadicional2" style="<?php echo $sStyleHidden_campoadicional2; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_campoadicional2_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["campoadicional2"]) &&  $this->nmgp_cmp_readonly["campoadicional2"] == "on")) { 

 ?>
<input type="hidden" name="campoadicional2" value="<?php echo $this->form_encode_input($campoadicional2) . "\"><span id=\"id_ajax_label_campoadicional2\">" . $campoadicional2 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_campoadicional2" class="sc-ui-readonly-campoadicional2 css_campoadicional2_line" style="<?php echo $sStyleReadLab_campoadicional2; ?>"><?php echo $this->form_format_readonly("campoadicional2", $this->form_encode_input($this->campoadicional2)); ?></span><span id="id_read_off_campoadicional2" class="css_read_off_campoadicional2" style="white-space: nowrap;<?php echo $sStyleReadInp_campoadicional2; ?>">
 <input class="sc-js-input scFormObjectOdd css_campoadicional2_obj" style="" id="id_sc_field_campoadicional2" type=text name="campoadicional2" value="<?php echo $this->form_encode_input($campoadicional2) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_campoadicional2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_campoadicional2_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valoradicional2']))
    {
        $this->nm_new_label['valoradicional2'] = "VALORADICIONAL2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valoradicional2 = $this->valoradicional2;
   $sStyleHidden_valoradicional2 = '';
   if (isset($this->nmgp_cmp_hidden['valoradicional2']) && $this->nmgp_cmp_hidden['valoradicional2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valoradicional2']);
       $sStyleHidden_valoradicional2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valoradicional2 = 'display: none;';
   $sStyleReadInp_valoradicional2 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["valoradicional2"]) &&  $this->nmgp_cmp_readonly["valoradicional2"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valoradicional2']);
       $sStyleReadLab_valoradicional2 = '';
       $sStyleReadInp_valoradicional2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valoradicional2']) && $this->nmgp_cmp_hidden['valoradicional2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valoradicional2" value="<?php echo $this->form_encode_input($valoradicional2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valoradicional2_line" id="hidden_field_data_valoradicional2" style="<?php echo $sStyleHidden_valoradicional2; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valoradicional2_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["valoradicional2"]) &&  $this->nmgp_cmp_readonly["valoradicional2"] == "on")) { 

 ?>
<input type="hidden" name="valoradicional2" value="<?php echo $this->form_encode_input($valoradicional2) . "\"><span id=\"id_ajax_label_valoradicional2\">" . $valoradicional2 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_valoradicional2" class="sc-ui-readonly-valoradicional2 css_valoradicional2_line" style="<?php echo $sStyleReadLab_valoradicional2; ?>"><?php echo $this->form_format_readonly("valoradicional2", $this->form_encode_input($this->valoradicional2)); ?></span><span id="id_read_off_valoradicional2" class="css_read_off_valoradicional2" style="white-space: nowrap;<?php echo $sStyleReadInp_valoradicional2; ?>">
 <input class="sc-js-input scFormObjectOdd css_valoradicional2_obj" style="" id="id_sc_field_valoradicional2" type=text name="valoradicional2" value="<?php echo $this->form_encode_input($valoradicional2) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valoradicional2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valoradicional2_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['campoadicional3']))
    {
        $this->nm_new_label['campoadicional3'] = "CAMPOADICIONAL3";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $campoadicional3 = $this->campoadicional3;
   $sStyleHidden_campoadicional3 = '';
   if (isset($this->nmgp_cmp_hidden['campoadicional3']) && $this->nmgp_cmp_hidden['campoadicional3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['campoadicional3']);
       $sStyleHidden_campoadicional3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_campoadicional3 = 'display: none;';
   $sStyleReadInp_campoadicional3 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["campoadicional3"]) &&  $this->nmgp_cmp_readonly["campoadicional3"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['campoadicional3']);
       $sStyleReadLab_campoadicional3 = '';
       $sStyleReadInp_campoadicional3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['campoadicional3']) && $this->nmgp_cmp_hidden['campoadicional3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="campoadicional3" value="<?php echo $this->form_encode_input($campoadicional3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_campoadicional3_line" id="hidden_field_data_campoadicional3" style="<?php echo $sStyleHidden_campoadicional3; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_campoadicional3_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["campoadicional3"]) &&  $this->nmgp_cmp_readonly["campoadicional3"] == "on")) { 

 ?>
<input type="hidden" name="campoadicional3" value="<?php echo $this->form_encode_input($campoadicional3) . "\"><span id=\"id_ajax_label_campoadicional3\">" . $campoadicional3 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_campoadicional3" class="sc-ui-readonly-campoadicional3 css_campoadicional3_line" style="<?php echo $sStyleReadLab_campoadicional3; ?>"><?php echo $this->form_format_readonly("campoadicional3", $this->form_encode_input($this->campoadicional3)); ?></span><span id="id_read_off_campoadicional3" class="css_read_off_campoadicional3" style="white-space: nowrap;<?php echo $sStyleReadInp_campoadicional3; ?>">
 <input class="sc-js-input scFormObjectOdd css_campoadicional3_obj" style="" id="id_sc_field_campoadicional3" type=text name="campoadicional3" value="<?php echo $this->form_encode_input($campoadicional3) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_campoadicional3_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_campoadicional3_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valoradicional3']))
    {
        $this->nm_new_label['valoradicional3'] = "VALORADICIONAL3";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valoradicional3 = $this->valoradicional3;
   $sStyleHidden_valoradicional3 = '';
   if (isset($this->nmgp_cmp_hidden['valoradicional3']) && $this->nmgp_cmp_hidden['valoradicional3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valoradicional3']);
       $sStyleHidden_valoradicional3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valoradicional3 = 'display: none;';
   $sStyleReadInp_valoradicional3 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["valoradicional3"]) &&  $this->nmgp_cmp_readonly["valoradicional3"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valoradicional3']);
       $sStyleReadLab_valoradicional3 = '';
       $sStyleReadInp_valoradicional3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valoradicional3']) && $this->nmgp_cmp_hidden['valoradicional3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valoradicional3" value="<?php echo $this->form_encode_input($valoradicional3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valoradicional3_line" id="hidden_field_data_valoradicional3" style="<?php echo $sStyleHidden_valoradicional3; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valoradicional3_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["valoradicional3"]) &&  $this->nmgp_cmp_readonly["valoradicional3"] == "on")) { 

 ?>
<input type="hidden" name="valoradicional3" value="<?php echo $this->form_encode_input($valoradicional3) . "\"><span id=\"id_ajax_label_valoradicional3\">" . $valoradicional3 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_valoradicional3" class="sc-ui-readonly-valoradicional3 css_valoradicional3_line" style="<?php echo $sStyleReadLab_valoradicional3; ?>"><?php echo $this->form_format_readonly("valoradicional3", $this->form_encode_input($this->valoradicional3)); ?></span><span id="id_read_off_valoradicional3" class="css_read_off_valoradicional3" style="white-space: nowrap;<?php echo $sStyleReadInp_valoradicional3; ?>">
 <input class="sc-js-input scFormObjectOdd css_valoradicional3_obj" style="" id="id_sc_field_valoradicional3" type=text name="valoradicional3" value="<?php echo $this->form_encode_input($valoradicional3) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valoradicional3_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valoradicional3_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['campoadicional4']))
    {
        $this->nm_new_label['campoadicional4'] = "CAMPOADICIONAL4";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $campoadicional4 = $this->campoadicional4;
   $sStyleHidden_campoadicional4 = '';
   if (isset($this->nmgp_cmp_hidden['campoadicional4']) && $this->nmgp_cmp_hidden['campoadicional4'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['campoadicional4']);
       $sStyleHidden_campoadicional4 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_campoadicional4 = 'display: none;';
   $sStyleReadInp_campoadicional4 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["campoadicional4"]) &&  $this->nmgp_cmp_readonly["campoadicional4"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['campoadicional4']);
       $sStyleReadLab_campoadicional4 = '';
       $sStyleReadInp_campoadicional4 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['campoadicional4']) && $this->nmgp_cmp_hidden['campoadicional4'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="campoadicional4" value="<?php echo $this->form_encode_input($campoadicional4) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_campoadicional4_line" id="hidden_field_data_campoadicional4" style="<?php echo $sStyleHidden_campoadicional4; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_campoadicional4_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["campoadicional4"]) &&  $this->nmgp_cmp_readonly["campoadicional4"] == "on")) { 

 ?>
<input type="hidden" name="campoadicional4" value="<?php echo $this->form_encode_input($campoadicional4) . "\"><span id=\"id_ajax_label_campoadicional4\">" . $campoadicional4 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_campoadicional4" class="sc-ui-readonly-campoadicional4 css_campoadicional4_line" style="<?php echo $sStyleReadLab_campoadicional4; ?>"><?php echo $this->form_format_readonly("campoadicional4", $this->form_encode_input($this->campoadicional4)); ?></span><span id="id_read_off_campoadicional4" class="css_read_off_campoadicional4" style="white-space: nowrap;<?php echo $sStyleReadInp_campoadicional4; ?>">
 <input class="sc-js-input scFormObjectOdd css_campoadicional4_obj" style="" id="id_sc_field_campoadicional4" type=text name="campoadicional4" value="<?php echo $this->form_encode_input($campoadicional4) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_campoadicional4_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_campoadicional4_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valoradicional4']))
    {
        $this->nm_new_label['valoradicional4'] = "VALORADICIONAL4";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valoradicional4 = $this->valoradicional4;
   $sStyleHidden_valoradicional4 = '';
   if (isset($this->nmgp_cmp_hidden['valoradicional4']) && $this->nmgp_cmp_hidden['valoradicional4'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valoradicional4']);
       $sStyleHidden_valoradicional4 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valoradicional4 = 'display: none;';
   $sStyleReadInp_valoradicional4 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["valoradicional4"]) &&  $this->nmgp_cmp_readonly["valoradicional4"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valoradicional4']);
       $sStyleReadLab_valoradicional4 = '';
       $sStyleReadInp_valoradicional4 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valoradicional4']) && $this->nmgp_cmp_hidden['valoradicional4'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valoradicional4" value="<?php echo $this->form_encode_input($valoradicional4) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valoradicional4_line" id="hidden_field_data_valoradicional4" style="<?php echo $sStyleHidden_valoradicional4; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valoradicional4_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["valoradicional4"]) &&  $this->nmgp_cmp_readonly["valoradicional4"] == "on")) { 

 ?>
<input type="hidden" name="valoradicional4" value="<?php echo $this->form_encode_input($valoradicional4) . "\"><span id=\"id_ajax_label_valoradicional4\">" . $valoradicional4 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_valoradicional4" class="sc-ui-readonly-valoradicional4 css_valoradicional4_line" style="<?php echo $sStyleReadLab_valoradicional4; ?>"><?php echo $this->form_format_readonly("valoradicional4", $this->form_encode_input($this->valoradicional4)); ?></span><span id="id_read_off_valoradicional4" class="css_read_off_valoradicional4" style="white-space: nowrap;<?php echo $sStyleReadInp_valoradicional4; ?>">
 <input class="sc-js-input scFormObjectOdd css_valoradicional4_obj" style="" id="id_sc_field_valoradicional4" type=text name="valoradicional4" value="<?php echo $this->form_encode_input($valoradicional4) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valoradicional4_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valoradicional4_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_campoadicional1_dumb = ('' == $sStyleHidden_campoadicional1) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_campoadicional1_dumb" style="<?php echo $sStyleHidden_campoadicional1_dumb; ?>"></TD>
<?php $sStyleHidden_valoradicional1_dumb = ('' == $sStyleHidden_valoradicional1) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valoradicional1_dumb" style="<?php echo $sStyleHidden_valoradicional1_dumb; ?>"></TD>
<?php $sStyleHidden_campoadicional2_dumb = ('' == $sStyleHidden_campoadicional2) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_campoadicional2_dumb" style="<?php echo $sStyleHidden_campoadicional2_dumb; ?>"></TD>
<?php $sStyleHidden_valoradicional2_dumb = ('' == $sStyleHidden_valoradicional2) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valoradicional2_dumb" style="<?php echo $sStyleHidden_valoradicional2_dumb; ?>"></TD>
<?php $sStyleHidden_campoadicional3_dumb = ('' == $sStyleHidden_campoadicional3) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_campoadicional3_dumb" style="<?php echo $sStyleHidden_campoadicional3_dumb; ?>"></TD>
<?php $sStyleHidden_valoradicional3_dumb = ('' == $sStyleHidden_valoradicional3) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valoradicional3_dumb" style="<?php echo $sStyleHidden_valoradicional3_dumb; ?>"></TD>
<?php $sStyleHidden_campoadicional4_dumb = ('' == $sStyleHidden_campoadicional4) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_campoadicional4_dumb" style="<?php echo $sStyleHidden_campoadicional4_dumb; ?>"></TD>
<?php $sStyleHidden_valoradicional4_dumb = ('' == $sStyleHidden_valoradicional4) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valoradicional4_dumb" style="<?php echo $sStyleHidden_valoradicional4_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['valoradicional5']))
           {
               $this->nmgp_cmp_readonly['valoradicional5'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['campoadicional6']))
           {
               $this->nmgp_cmp_readonly['campoadicional6'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['valoradicional6']))
           {
               $this->nmgp_cmp_readonly['valoradicional6'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['campoadicional7']))
           {
               $this->nmgp_cmp_readonly['campoadicional7'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['valoradicional7']))
           {
               $this->nmgp_cmp_readonly['valoradicional7'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['campoadicional8']))
           {
               $this->nmgp_cmp_readonly['campoadicional8'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['valoradicional8']))
           {
               $this->nmgp_cmp_readonly['valoradicional8'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['campoadicional9']))
           {
               $this->nmgp_cmp_readonly['campoadicional9'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['campoadicional5']))
    {
        $this->nm_new_label['campoadicional5'] = "CAMPOADICIONAL5";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $campoadicional5 = $this->campoadicional5;
   $sStyleHidden_campoadicional5 = '';
   if (isset($this->nmgp_cmp_hidden['campoadicional5']) && $this->nmgp_cmp_hidden['campoadicional5'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['campoadicional5']);
       $sStyleHidden_campoadicional5 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_campoadicional5 = 'display: none;';
   $sStyleReadInp_campoadicional5 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["campoadicional5"]) &&  $this->nmgp_cmp_readonly["campoadicional5"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['campoadicional5']);
       $sStyleReadLab_campoadicional5 = '';
       $sStyleReadInp_campoadicional5 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['campoadicional5']) && $this->nmgp_cmp_hidden['campoadicional5'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="campoadicional5" value="<?php echo $this->form_encode_input($campoadicional5) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_campoadicional5_line" id="hidden_field_data_campoadicional5" style="<?php echo $sStyleHidden_campoadicional5; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_campoadicional5_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["campoadicional5"]) &&  $this->nmgp_cmp_readonly["campoadicional5"] == "on")) { 

 ?>
<input type="hidden" name="campoadicional5" value="<?php echo $this->form_encode_input($campoadicional5) . "\"><span id=\"id_ajax_label_campoadicional5\">" . $campoadicional5 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_campoadicional5" class="sc-ui-readonly-campoadicional5 css_campoadicional5_line" style="<?php echo $sStyleReadLab_campoadicional5; ?>"><?php echo $this->form_format_readonly("campoadicional5", $this->form_encode_input($this->campoadicional5)); ?></span><span id="id_read_off_campoadicional5" class="css_read_off_campoadicional5" style="white-space: nowrap;<?php echo $sStyleReadInp_campoadicional5; ?>">
 <input class="sc-js-input scFormObjectOdd css_campoadicional5_obj" style="" id="id_sc_field_campoadicional5" type=text name="campoadicional5" value="<?php echo $this->form_encode_input($campoadicional5) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_campoadicional5_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_campoadicional5_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valoradicional5']))
    {
        $this->nm_new_label['valoradicional5'] = "VALORADICIONAL5";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valoradicional5 = $this->valoradicional5;
   $sStyleHidden_valoradicional5 = '';
   if (isset($this->nmgp_cmp_hidden['valoradicional5']) && $this->nmgp_cmp_hidden['valoradicional5'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valoradicional5']);
       $sStyleHidden_valoradicional5 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valoradicional5 = 'display: none;';
   $sStyleReadInp_valoradicional5 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["valoradicional5"]) &&  $this->nmgp_cmp_readonly["valoradicional5"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valoradicional5']);
       $sStyleReadLab_valoradicional5 = '';
       $sStyleReadInp_valoradicional5 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valoradicional5']) && $this->nmgp_cmp_hidden['valoradicional5'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valoradicional5" value="<?php echo $this->form_encode_input($valoradicional5) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valoradicional5_line" id="hidden_field_data_valoradicional5" style="<?php echo $sStyleHidden_valoradicional5; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valoradicional5_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["valoradicional5"]) &&  $this->nmgp_cmp_readonly["valoradicional5"] == "on")) { 

 ?>
<input type="hidden" name="valoradicional5" value="<?php echo $this->form_encode_input($valoradicional5) . "\"><span id=\"id_ajax_label_valoradicional5\">" . $valoradicional5 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_valoradicional5" class="sc-ui-readonly-valoradicional5 css_valoradicional5_line" style="<?php echo $sStyleReadLab_valoradicional5; ?>"><?php echo $this->form_format_readonly("valoradicional5", $this->form_encode_input($this->valoradicional5)); ?></span><span id="id_read_off_valoradicional5" class="css_read_off_valoradicional5" style="white-space: nowrap;<?php echo $sStyleReadInp_valoradicional5; ?>">
 <input class="sc-js-input scFormObjectOdd css_valoradicional5_obj" style="" id="id_sc_field_valoradicional5" type=text name="valoradicional5" value="<?php echo $this->form_encode_input($valoradicional5) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valoradicional5_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valoradicional5_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['campoadicional6']))
    {
        $this->nm_new_label['campoadicional6'] = "CAMPOADICIONAL6";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $campoadicional6 = $this->campoadicional6;
   $sStyleHidden_campoadicional6 = '';
   if (isset($this->nmgp_cmp_hidden['campoadicional6']) && $this->nmgp_cmp_hidden['campoadicional6'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['campoadicional6']);
       $sStyleHidden_campoadicional6 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_campoadicional6 = 'display: none;';
   $sStyleReadInp_campoadicional6 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["campoadicional6"]) &&  $this->nmgp_cmp_readonly["campoadicional6"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['campoadicional6']);
       $sStyleReadLab_campoadicional6 = '';
       $sStyleReadInp_campoadicional6 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['campoadicional6']) && $this->nmgp_cmp_hidden['campoadicional6'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="campoadicional6" value="<?php echo $this->form_encode_input($campoadicional6) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_campoadicional6_line" id="hidden_field_data_campoadicional6" style="<?php echo $sStyleHidden_campoadicional6; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_campoadicional6_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["campoadicional6"]) &&  $this->nmgp_cmp_readonly["campoadicional6"] == "on")) { 

 ?>
<input type="hidden" name="campoadicional6" value="<?php echo $this->form_encode_input($campoadicional6) . "\"><span id=\"id_ajax_label_campoadicional6\">" . $campoadicional6 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_campoadicional6" class="sc-ui-readonly-campoadicional6 css_campoadicional6_line" style="<?php echo $sStyleReadLab_campoadicional6; ?>"><?php echo $this->form_format_readonly("campoadicional6", $this->form_encode_input($this->campoadicional6)); ?></span><span id="id_read_off_campoadicional6" class="css_read_off_campoadicional6" style="white-space: nowrap;<?php echo $sStyleReadInp_campoadicional6; ?>">
 <input class="sc-js-input scFormObjectOdd css_campoadicional6_obj" style="" id="id_sc_field_campoadicional6" type=text name="campoadicional6" value="<?php echo $this->form_encode_input($campoadicional6) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_campoadicional6_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_campoadicional6_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valoradicional6']))
    {
        $this->nm_new_label['valoradicional6'] = "VALORADICIONAL6";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valoradicional6 = $this->valoradicional6;
   $sStyleHidden_valoradicional6 = '';
   if (isset($this->nmgp_cmp_hidden['valoradicional6']) && $this->nmgp_cmp_hidden['valoradicional6'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valoradicional6']);
       $sStyleHidden_valoradicional6 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valoradicional6 = 'display: none;';
   $sStyleReadInp_valoradicional6 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["valoradicional6"]) &&  $this->nmgp_cmp_readonly["valoradicional6"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valoradicional6']);
       $sStyleReadLab_valoradicional6 = '';
       $sStyleReadInp_valoradicional6 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valoradicional6']) && $this->nmgp_cmp_hidden['valoradicional6'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valoradicional6" value="<?php echo $this->form_encode_input($valoradicional6) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valoradicional6_line" id="hidden_field_data_valoradicional6" style="<?php echo $sStyleHidden_valoradicional6; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valoradicional6_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["valoradicional6"]) &&  $this->nmgp_cmp_readonly["valoradicional6"] == "on")) { 

 ?>
<input type="hidden" name="valoradicional6" value="<?php echo $this->form_encode_input($valoradicional6) . "\"><span id=\"id_ajax_label_valoradicional6\">" . $valoradicional6 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_valoradicional6" class="sc-ui-readonly-valoradicional6 css_valoradicional6_line" style="<?php echo $sStyleReadLab_valoradicional6; ?>"><?php echo $this->form_format_readonly("valoradicional6", $this->form_encode_input($this->valoradicional6)); ?></span><span id="id_read_off_valoradicional6" class="css_read_off_valoradicional6" style="white-space: nowrap;<?php echo $sStyleReadInp_valoradicional6; ?>">
 <input class="sc-js-input scFormObjectOdd css_valoradicional6_obj" style="" id="id_sc_field_valoradicional6" type=text name="valoradicional6" value="<?php echo $this->form_encode_input($valoradicional6) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valoradicional6_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valoradicional6_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['campoadicional7']))
    {
        $this->nm_new_label['campoadicional7'] = "CAMPOADICIONAL7";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $campoadicional7 = $this->campoadicional7;
   $sStyleHidden_campoadicional7 = '';
   if (isset($this->nmgp_cmp_hidden['campoadicional7']) && $this->nmgp_cmp_hidden['campoadicional7'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['campoadicional7']);
       $sStyleHidden_campoadicional7 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_campoadicional7 = 'display: none;';
   $sStyleReadInp_campoadicional7 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["campoadicional7"]) &&  $this->nmgp_cmp_readonly["campoadicional7"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['campoadicional7']);
       $sStyleReadLab_campoadicional7 = '';
       $sStyleReadInp_campoadicional7 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['campoadicional7']) && $this->nmgp_cmp_hidden['campoadicional7'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="campoadicional7" value="<?php echo $this->form_encode_input($campoadicional7) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_campoadicional7_line" id="hidden_field_data_campoadicional7" style="<?php echo $sStyleHidden_campoadicional7; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_campoadicional7_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["campoadicional7"]) &&  $this->nmgp_cmp_readonly["campoadicional7"] == "on")) { 

 ?>
<input type="hidden" name="campoadicional7" value="<?php echo $this->form_encode_input($campoadicional7) . "\"><span id=\"id_ajax_label_campoadicional7\">" . $campoadicional7 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_campoadicional7" class="sc-ui-readonly-campoadicional7 css_campoadicional7_line" style="<?php echo $sStyleReadLab_campoadicional7; ?>"><?php echo $this->form_format_readonly("campoadicional7", $this->form_encode_input($this->campoadicional7)); ?></span><span id="id_read_off_campoadicional7" class="css_read_off_campoadicional7" style="white-space: nowrap;<?php echo $sStyleReadInp_campoadicional7; ?>">
 <input class="sc-js-input scFormObjectOdd css_campoadicional7_obj" style="" id="id_sc_field_campoadicional7" type=text name="campoadicional7" value="<?php echo $this->form_encode_input($campoadicional7) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_campoadicional7_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_campoadicional7_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valoradicional7']))
    {
        $this->nm_new_label['valoradicional7'] = "VALORADICIONAL7";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valoradicional7 = $this->valoradicional7;
   $sStyleHidden_valoradicional7 = '';
   if (isset($this->nmgp_cmp_hidden['valoradicional7']) && $this->nmgp_cmp_hidden['valoradicional7'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valoradicional7']);
       $sStyleHidden_valoradicional7 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valoradicional7 = 'display: none;';
   $sStyleReadInp_valoradicional7 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["valoradicional7"]) &&  $this->nmgp_cmp_readonly["valoradicional7"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valoradicional7']);
       $sStyleReadLab_valoradicional7 = '';
       $sStyleReadInp_valoradicional7 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valoradicional7']) && $this->nmgp_cmp_hidden['valoradicional7'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valoradicional7" value="<?php echo $this->form_encode_input($valoradicional7) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valoradicional7_line" id="hidden_field_data_valoradicional7" style="<?php echo $sStyleHidden_valoradicional7; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valoradicional7_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["valoradicional7"]) &&  $this->nmgp_cmp_readonly["valoradicional7"] == "on")) { 

 ?>
<input type="hidden" name="valoradicional7" value="<?php echo $this->form_encode_input($valoradicional7) . "\"><span id=\"id_ajax_label_valoradicional7\">" . $valoradicional7 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_valoradicional7" class="sc-ui-readonly-valoradicional7 css_valoradicional7_line" style="<?php echo $sStyleReadLab_valoradicional7; ?>"><?php echo $this->form_format_readonly("valoradicional7", $this->form_encode_input($this->valoradicional7)); ?></span><span id="id_read_off_valoradicional7" class="css_read_off_valoradicional7" style="white-space: nowrap;<?php echo $sStyleReadInp_valoradicional7; ?>">
 <input class="sc-js-input scFormObjectOdd css_valoradicional7_obj" style="" id="id_sc_field_valoradicional7" type=text name="valoradicional7" value="<?php echo $this->form_encode_input($valoradicional7) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valoradicional7_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valoradicional7_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['campoadicional8']))
    {
        $this->nm_new_label['campoadicional8'] = "CAMPOADICIONAL8";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $campoadicional8 = $this->campoadicional8;
   $sStyleHidden_campoadicional8 = '';
   if (isset($this->nmgp_cmp_hidden['campoadicional8']) && $this->nmgp_cmp_hidden['campoadicional8'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['campoadicional8']);
       $sStyleHidden_campoadicional8 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_campoadicional8 = 'display: none;';
   $sStyleReadInp_campoadicional8 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["campoadicional8"]) &&  $this->nmgp_cmp_readonly["campoadicional8"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['campoadicional8']);
       $sStyleReadLab_campoadicional8 = '';
       $sStyleReadInp_campoadicional8 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['campoadicional8']) && $this->nmgp_cmp_hidden['campoadicional8'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="campoadicional8" value="<?php echo $this->form_encode_input($campoadicional8) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_campoadicional8_line" id="hidden_field_data_campoadicional8" style="<?php echo $sStyleHidden_campoadicional8; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_campoadicional8_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["campoadicional8"]) &&  $this->nmgp_cmp_readonly["campoadicional8"] == "on")) { 

 ?>
<input type="hidden" name="campoadicional8" value="<?php echo $this->form_encode_input($campoadicional8) . "\"><span id=\"id_ajax_label_campoadicional8\">" . $campoadicional8 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_campoadicional8" class="sc-ui-readonly-campoadicional8 css_campoadicional8_line" style="<?php echo $sStyleReadLab_campoadicional8; ?>"><?php echo $this->form_format_readonly("campoadicional8", $this->form_encode_input($this->campoadicional8)); ?></span><span id="id_read_off_campoadicional8" class="css_read_off_campoadicional8" style="white-space: nowrap;<?php echo $sStyleReadInp_campoadicional8; ?>">
 <input class="sc-js-input scFormObjectOdd css_campoadicional8_obj" style="" id="id_sc_field_campoadicional8" type=text name="campoadicional8" value="<?php echo $this->form_encode_input($campoadicional8) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_campoadicional8_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_campoadicional8_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valoradicional8']))
    {
        $this->nm_new_label['valoradicional8'] = "VALORADICIONAL8";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valoradicional8 = $this->valoradicional8;
   $sStyleHidden_valoradicional8 = '';
   if (isset($this->nmgp_cmp_hidden['valoradicional8']) && $this->nmgp_cmp_hidden['valoradicional8'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valoradicional8']);
       $sStyleHidden_valoradicional8 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valoradicional8 = 'display: none;';
   $sStyleReadInp_valoradicional8 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["valoradicional8"]) &&  $this->nmgp_cmp_readonly["valoradicional8"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valoradicional8']);
       $sStyleReadLab_valoradicional8 = '';
       $sStyleReadInp_valoradicional8 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valoradicional8']) && $this->nmgp_cmp_hidden['valoradicional8'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valoradicional8" value="<?php echo $this->form_encode_input($valoradicional8) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valoradicional8_line" id="hidden_field_data_valoradicional8" style="<?php echo $sStyleHidden_valoradicional8; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valoradicional8_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["valoradicional8"]) &&  $this->nmgp_cmp_readonly["valoradicional8"] == "on")) { 

 ?>
<input type="hidden" name="valoradicional8" value="<?php echo $this->form_encode_input($valoradicional8) . "\"><span id=\"id_ajax_label_valoradicional8\">" . $valoradicional8 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_valoradicional8" class="sc-ui-readonly-valoradicional8 css_valoradicional8_line" style="<?php echo $sStyleReadLab_valoradicional8; ?>"><?php echo $this->form_format_readonly("valoradicional8", $this->form_encode_input($this->valoradicional8)); ?></span><span id="id_read_off_valoradicional8" class="css_read_off_valoradicional8" style="white-space: nowrap;<?php echo $sStyleReadInp_valoradicional8; ?>">
 <input class="sc-js-input scFormObjectOdd css_valoradicional8_obj" style="" id="id_sc_field_valoradicional8" type=text name="valoradicional8" value="<?php echo $this->form_encode_input($valoradicional8) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valoradicional8_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valoradicional8_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_campoadicional5_dumb = ('' == $sStyleHidden_campoadicional5) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_campoadicional5_dumb" style="<?php echo $sStyleHidden_campoadicional5_dumb; ?>"></TD>
<?php $sStyleHidden_valoradicional5_dumb = ('' == $sStyleHidden_valoradicional5) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valoradicional5_dumb" style="<?php echo $sStyleHidden_valoradicional5_dumb; ?>"></TD>
<?php $sStyleHidden_campoadicional6_dumb = ('' == $sStyleHidden_campoadicional6) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_campoadicional6_dumb" style="<?php echo $sStyleHidden_campoadicional6_dumb; ?>"></TD>
<?php $sStyleHidden_valoradicional6_dumb = ('' == $sStyleHidden_valoradicional6) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valoradicional6_dumb" style="<?php echo $sStyleHidden_valoradicional6_dumb; ?>"></TD>
<?php $sStyleHidden_campoadicional7_dumb = ('' == $sStyleHidden_campoadicional7) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_campoadicional7_dumb" style="<?php echo $sStyleHidden_campoadicional7_dumb; ?>"></TD>
<?php $sStyleHidden_valoradicional7_dumb = ('' == $sStyleHidden_valoradicional7) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valoradicional7_dumb" style="<?php echo $sStyleHidden_valoradicional7_dumb; ?>"></TD>
<?php $sStyleHidden_campoadicional8_dumb = ('' == $sStyleHidden_campoadicional8) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_campoadicional8_dumb" style="<?php echo $sStyleHidden_campoadicional8_dumb; ?>"></TD>
<?php $sStyleHidden_valoradicional8_dumb = ('' == $sStyleHidden_valoradicional8) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valoradicional8_dumb" style="<?php echo $sStyleHidden_valoradicional8_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['valoradicional9']))
           {
               $this->nmgp_cmp_readonly['valoradicional9'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['campoadicional10']))
           {
               $this->nmgp_cmp_readonly['campoadicional10'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['valoradicional10']))
           {
               $this->nmgp_cmp_readonly['valoradicional10'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['campoadicional11']))
           {
               $this->nmgp_cmp_readonly['campoadicional11'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['valoradicional11']))
           {
               $this->nmgp_cmp_readonly['valoradicional11'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['campoadicional12']))
           {
               $this->nmgp_cmp_readonly['campoadicional12'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['valoradicional12']))
           {
               $this->nmgp_cmp_readonly['valoradicional12'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['campoadicional13']))
           {
               $this->nmgp_cmp_readonly['campoadicional13'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['campoadicional9']))
    {
        $this->nm_new_label['campoadicional9'] = "CAMPOADICIONAL9";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $campoadicional9 = $this->campoadicional9;
   $sStyleHidden_campoadicional9 = '';
   if (isset($this->nmgp_cmp_hidden['campoadicional9']) && $this->nmgp_cmp_hidden['campoadicional9'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['campoadicional9']);
       $sStyleHidden_campoadicional9 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_campoadicional9 = 'display: none;';
   $sStyleReadInp_campoadicional9 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["campoadicional9"]) &&  $this->nmgp_cmp_readonly["campoadicional9"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['campoadicional9']);
       $sStyleReadLab_campoadicional9 = '';
       $sStyleReadInp_campoadicional9 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['campoadicional9']) && $this->nmgp_cmp_hidden['campoadicional9'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="campoadicional9" value="<?php echo $this->form_encode_input($campoadicional9) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_campoadicional9_line" id="hidden_field_data_campoadicional9" style="<?php echo $sStyleHidden_campoadicional9; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_campoadicional9_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["campoadicional9"]) &&  $this->nmgp_cmp_readonly["campoadicional9"] == "on")) { 

 ?>
<input type="hidden" name="campoadicional9" value="<?php echo $this->form_encode_input($campoadicional9) . "\"><span id=\"id_ajax_label_campoadicional9\">" . $campoadicional9 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_campoadicional9" class="sc-ui-readonly-campoadicional9 css_campoadicional9_line" style="<?php echo $sStyleReadLab_campoadicional9; ?>"><?php echo $this->form_format_readonly("campoadicional9", $this->form_encode_input($this->campoadicional9)); ?></span><span id="id_read_off_campoadicional9" class="css_read_off_campoadicional9" style="white-space: nowrap;<?php echo $sStyleReadInp_campoadicional9; ?>">
 <input class="sc-js-input scFormObjectOdd css_campoadicional9_obj" style="" id="id_sc_field_campoadicional9" type=text name="campoadicional9" value="<?php echo $this->form_encode_input($campoadicional9) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_campoadicional9_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_campoadicional9_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valoradicional9']))
    {
        $this->nm_new_label['valoradicional9'] = "VALORADICIONAL9";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valoradicional9 = $this->valoradicional9;
   $sStyleHidden_valoradicional9 = '';
   if (isset($this->nmgp_cmp_hidden['valoradicional9']) && $this->nmgp_cmp_hidden['valoradicional9'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valoradicional9']);
       $sStyleHidden_valoradicional9 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valoradicional9 = 'display: none;';
   $sStyleReadInp_valoradicional9 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["valoradicional9"]) &&  $this->nmgp_cmp_readonly["valoradicional9"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valoradicional9']);
       $sStyleReadLab_valoradicional9 = '';
       $sStyleReadInp_valoradicional9 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valoradicional9']) && $this->nmgp_cmp_hidden['valoradicional9'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valoradicional9" value="<?php echo $this->form_encode_input($valoradicional9) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valoradicional9_line" id="hidden_field_data_valoradicional9" style="<?php echo $sStyleHidden_valoradicional9; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valoradicional9_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["valoradicional9"]) &&  $this->nmgp_cmp_readonly["valoradicional9"] == "on")) { 

 ?>
<input type="hidden" name="valoradicional9" value="<?php echo $this->form_encode_input($valoradicional9) . "\"><span id=\"id_ajax_label_valoradicional9\">" . $valoradicional9 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_valoradicional9" class="sc-ui-readonly-valoradicional9 css_valoradicional9_line" style="<?php echo $sStyleReadLab_valoradicional9; ?>"><?php echo $this->form_format_readonly("valoradicional9", $this->form_encode_input($this->valoradicional9)); ?></span><span id="id_read_off_valoradicional9" class="css_read_off_valoradicional9" style="white-space: nowrap;<?php echo $sStyleReadInp_valoradicional9; ?>">
 <input class="sc-js-input scFormObjectOdd css_valoradicional9_obj" style="" id="id_sc_field_valoradicional9" type=text name="valoradicional9" value="<?php echo $this->form_encode_input($valoradicional9) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valoradicional9_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valoradicional9_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['campoadicional10']))
    {
        $this->nm_new_label['campoadicional10'] = "CAMPOADICIONAL10";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $campoadicional10 = $this->campoadicional10;
   $sStyleHidden_campoadicional10 = '';
   if (isset($this->nmgp_cmp_hidden['campoadicional10']) && $this->nmgp_cmp_hidden['campoadicional10'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['campoadicional10']);
       $sStyleHidden_campoadicional10 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_campoadicional10 = 'display: none;';
   $sStyleReadInp_campoadicional10 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["campoadicional10"]) &&  $this->nmgp_cmp_readonly["campoadicional10"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['campoadicional10']);
       $sStyleReadLab_campoadicional10 = '';
       $sStyleReadInp_campoadicional10 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['campoadicional10']) && $this->nmgp_cmp_hidden['campoadicional10'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="campoadicional10" value="<?php echo $this->form_encode_input($campoadicional10) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_campoadicional10_line" id="hidden_field_data_campoadicional10" style="<?php echo $sStyleHidden_campoadicional10; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_campoadicional10_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["campoadicional10"]) &&  $this->nmgp_cmp_readonly["campoadicional10"] == "on")) { 

 ?>
<input type="hidden" name="campoadicional10" value="<?php echo $this->form_encode_input($campoadicional10) . "\"><span id=\"id_ajax_label_campoadicional10\">" . $campoadicional10 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_campoadicional10" class="sc-ui-readonly-campoadicional10 css_campoadicional10_line" style="<?php echo $sStyleReadLab_campoadicional10; ?>"><?php echo $this->form_format_readonly("campoadicional10", $this->form_encode_input($this->campoadicional10)); ?></span><span id="id_read_off_campoadicional10" class="css_read_off_campoadicional10" style="white-space: nowrap;<?php echo $sStyleReadInp_campoadicional10; ?>">
 <input class="sc-js-input scFormObjectOdd css_campoadicional10_obj" style="" id="id_sc_field_campoadicional10" type=text name="campoadicional10" value="<?php echo $this->form_encode_input($campoadicional10) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_campoadicional10_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_campoadicional10_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valoradicional10']))
    {
        $this->nm_new_label['valoradicional10'] = "VALORADICIONAL10";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valoradicional10 = $this->valoradicional10;
   $sStyleHidden_valoradicional10 = '';
   if (isset($this->nmgp_cmp_hidden['valoradicional10']) && $this->nmgp_cmp_hidden['valoradicional10'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valoradicional10']);
       $sStyleHidden_valoradicional10 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valoradicional10 = 'display: none;';
   $sStyleReadInp_valoradicional10 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["valoradicional10"]) &&  $this->nmgp_cmp_readonly["valoradicional10"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valoradicional10']);
       $sStyleReadLab_valoradicional10 = '';
       $sStyleReadInp_valoradicional10 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valoradicional10']) && $this->nmgp_cmp_hidden['valoradicional10'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valoradicional10" value="<?php echo $this->form_encode_input($valoradicional10) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valoradicional10_line" id="hidden_field_data_valoradicional10" style="<?php echo $sStyleHidden_valoradicional10; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valoradicional10_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["valoradicional10"]) &&  $this->nmgp_cmp_readonly["valoradicional10"] == "on")) { 

 ?>
<input type="hidden" name="valoradicional10" value="<?php echo $this->form_encode_input($valoradicional10) . "\"><span id=\"id_ajax_label_valoradicional10\">" . $valoradicional10 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_valoradicional10" class="sc-ui-readonly-valoradicional10 css_valoradicional10_line" style="<?php echo $sStyleReadLab_valoradicional10; ?>"><?php echo $this->form_format_readonly("valoradicional10", $this->form_encode_input($this->valoradicional10)); ?></span><span id="id_read_off_valoradicional10" class="css_read_off_valoradicional10" style="white-space: nowrap;<?php echo $sStyleReadInp_valoradicional10; ?>">
 <input class="sc-js-input scFormObjectOdd css_valoradicional10_obj" style="" id="id_sc_field_valoradicional10" type=text name="valoradicional10" value="<?php echo $this->form_encode_input($valoradicional10) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valoradicional10_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valoradicional10_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['campoadicional11']))
    {
        $this->nm_new_label['campoadicional11'] = "CAMPOADICIONAL11";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $campoadicional11 = $this->campoadicional11;
   $sStyleHidden_campoadicional11 = '';
   if (isset($this->nmgp_cmp_hidden['campoadicional11']) && $this->nmgp_cmp_hidden['campoadicional11'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['campoadicional11']);
       $sStyleHidden_campoadicional11 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_campoadicional11 = 'display: none;';
   $sStyleReadInp_campoadicional11 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["campoadicional11"]) &&  $this->nmgp_cmp_readonly["campoadicional11"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['campoadicional11']);
       $sStyleReadLab_campoadicional11 = '';
       $sStyleReadInp_campoadicional11 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['campoadicional11']) && $this->nmgp_cmp_hidden['campoadicional11'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="campoadicional11" value="<?php echo $this->form_encode_input($campoadicional11) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_campoadicional11_line" id="hidden_field_data_campoadicional11" style="<?php echo $sStyleHidden_campoadicional11; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_campoadicional11_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["campoadicional11"]) &&  $this->nmgp_cmp_readonly["campoadicional11"] == "on")) { 

 ?>
<input type="hidden" name="campoadicional11" value="<?php echo $this->form_encode_input($campoadicional11) . "\"><span id=\"id_ajax_label_campoadicional11\">" . $campoadicional11 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_campoadicional11" class="sc-ui-readonly-campoadicional11 css_campoadicional11_line" style="<?php echo $sStyleReadLab_campoadicional11; ?>"><?php echo $this->form_format_readonly("campoadicional11", $this->form_encode_input($this->campoadicional11)); ?></span><span id="id_read_off_campoadicional11" class="css_read_off_campoadicional11" style="white-space: nowrap;<?php echo $sStyleReadInp_campoadicional11; ?>">
 <input class="sc-js-input scFormObjectOdd css_campoadicional11_obj" style="" id="id_sc_field_campoadicional11" type=text name="campoadicional11" value="<?php echo $this->form_encode_input($campoadicional11) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_campoadicional11_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_campoadicional11_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valoradicional11']))
    {
        $this->nm_new_label['valoradicional11'] = "VALORADICIONAL11";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valoradicional11 = $this->valoradicional11;
   $sStyleHidden_valoradicional11 = '';
   if (isset($this->nmgp_cmp_hidden['valoradicional11']) && $this->nmgp_cmp_hidden['valoradicional11'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valoradicional11']);
       $sStyleHidden_valoradicional11 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valoradicional11 = 'display: none;';
   $sStyleReadInp_valoradicional11 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["valoradicional11"]) &&  $this->nmgp_cmp_readonly["valoradicional11"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valoradicional11']);
       $sStyleReadLab_valoradicional11 = '';
       $sStyleReadInp_valoradicional11 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valoradicional11']) && $this->nmgp_cmp_hidden['valoradicional11'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valoradicional11" value="<?php echo $this->form_encode_input($valoradicional11) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valoradicional11_line" id="hidden_field_data_valoradicional11" style="<?php echo $sStyleHidden_valoradicional11; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valoradicional11_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["valoradicional11"]) &&  $this->nmgp_cmp_readonly["valoradicional11"] == "on")) { 

 ?>
<input type="hidden" name="valoradicional11" value="<?php echo $this->form_encode_input($valoradicional11) . "\"><span id=\"id_ajax_label_valoradicional11\">" . $valoradicional11 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_valoradicional11" class="sc-ui-readonly-valoradicional11 css_valoradicional11_line" style="<?php echo $sStyleReadLab_valoradicional11; ?>"><?php echo $this->form_format_readonly("valoradicional11", $this->form_encode_input($this->valoradicional11)); ?></span><span id="id_read_off_valoradicional11" class="css_read_off_valoradicional11" style="white-space: nowrap;<?php echo $sStyleReadInp_valoradicional11; ?>">
 <input class="sc-js-input scFormObjectOdd css_valoradicional11_obj" style="" id="id_sc_field_valoradicional11" type=text name="valoradicional11" value="<?php echo $this->form_encode_input($valoradicional11) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valoradicional11_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valoradicional11_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['campoadicional12']))
    {
        $this->nm_new_label['campoadicional12'] = "CAMPOADICIONAL12";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $campoadicional12 = $this->campoadicional12;
   $sStyleHidden_campoadicional12 = '';
   if (isset($this->nmgp_cmp_hidden['campoadicional12']) && $this->nmgp_cmp_hidden['campoadicional12'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['campoadicional12']);
       $sStyleHidden_campoadicional12 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_campoadicional12 = 'display: none;';
   $sStyleReadInp_campoadicional12 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["campoadicional12"]) &&  $this->nmgp_cmp_readonly["campoadicional12"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['campoadicional12']);
       $sStyleReadLab_campoadicional12 = '';
       $sStyleReadInp_campoadicional12 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['campoadicional12']) && $this->nmgp_cmp_hidden['campoadicional12'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="campoadicional12" value="<?php echo $this->form_encode_input($campoadicional12) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_campoadicional12_line" id="hidden_field_data_campoadicional12" style="<?php echo $sStyleHidden_campoadicional12; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_campoadicional12_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["campoadicional12"]) &&  $this->nmgp_cmp_readonly["campoadicional12"] == "on")) { 

 ?>
<input type="hidden" name="campoadicional12" value="<?php echo $this->form_encode_input($campoadicional12) . "\"><span id=\"id_ajax_label_campoadicional12\">" . $campoadicional12 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_campoadicional12" class="sc-ui-readonly-campoadicional12 css_campoadicional12_line" style="<?php echo $sStyleReadLab_campoadicional12; ?>"><?php echo $this->form_format_readonly("campoadicional12", $this->form_encode_input($this->campoadicional12)); ?></span><span id="id_read_off_campoadicional12" class="css_read_off_campoadicional12" style="white-space: nowrap;<?php echo $sStyleReadInp_campoadicional12; ?>">
 <input class="sc-js-input scFormObjectOdd css_campoadicional12_obj" style="" id="id_sc_field_campoadicional12" type=text name="campoadicional12" value="<?php echo $this->form_encode_input($campoadicional12) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_campoadicional12_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_campoadicional12_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valoradicional12']))
    {
        $this->nm_new_label['valoradicional12'] = "VALORADICIONAL12";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valoradicional12 = $this->valoradicional12;
   $sStyleHidden_valoradicional12 = '';
   if (isset($this->nmgp_cmp_hidden['valoradicional12']) && $this->nmgp_cmp_hidden['valoradicional12'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valoradicional12']);
       $sStyleHidden_valoradicional12 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valoradicional12 = 'display: none;';
   $sStyleReadInp_valoradicional12 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["valoradicional12"]) &&  $this->nmgp_cmp_readonly["valoradicional12"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valoradicional12']);
       $sStyleReadLab_valoradicional12 = '';
       $sStyleReadInp_valoradicional12 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valoradicional12']) && $this->nmgp_cmp_hidden['valoradicional12'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valoradicional12" value="<?php echo $this->form_encode_input($valoradicional12) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valoradicional12_line" id="hidden_field_data_valoradicional12" style="<?php echo $sStyleHidden_valoradicional12; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valoradicional12_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["valoradicional12"]) &&  $this->nmgp_cmp_readonly["valoradicional12"] == "on")) { 

 ?>
<input type="hidden" name="valoradicional12" value="<?php echo $this->form_encode_input($valoradicional12) . "\"><span id=\"id_ajax_label_valoradicional12\">" . $valoradicional12 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_valoradicional12" class="sc-ui-readonly-valoradicional12 css_valoradicional12_line" style="<?php echo $sStyleReadLab_valoradicional12; ?>"><?php echo $this->form_format_readonly("valoradicional12", $this->form_encode_input($this->valoradicional12)); ?></span><span id="id_read_off_valoradicional12" class="css_read_off_valoradicional12" style="white-space: nowrap;<?php echo $sStyleReadInp_valoradicional12; ?>">
 <input class="sc-js-input scFormObjectOdd css_valoradicional12_obj" style="" id="id_sc_field_valoradicional12" type=text name="valoradicional12" value="<?php echo $this->form_encode_input($valoradicional12) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valoradicional12_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valoradicional12_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_campoadicional9_dumb = ('' == $sStyleHidden_campoadicional9) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_campoadicional9_dumb" style="<?php echo $sStyleHidden_campoadicional9_dumb; ?>"></TD>
<?php $sStyleHidden_valoradicional9_dumb = ('' == $sStyleHidden_valoradicional9) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valoradicional9_dumb" style="<?php echo $sStyleHidden_valoradicional9_dumb; ?>"></TD>
<?php $sStyleHidden_campoadicional10_dumb = ('' == $sStyleHidden_campoadicional10) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_campoadicional10_dumb" style="<?php echo $sStyleHidden_campoadicional10_dumb; ?>"></TD>
<?php $sStyleHidden_valoradicional10_dumb = ('' == $sStyleHidden_valoradicional10) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valoradicional10_dumb" style="<?php echo $sStyleHidden_valoradicional10_dumb; ?>"></TD>
<?php $sStyleHidden_campoadicional11_dumb = ('' == $sStyleHidden_campoadicional11) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_campoadicional11_dumb" style="<?php echo $sStyleHidden_campoadicional11_dumb; ?>"></TD>
<?php $sStyleHidden_valoradicional11_dumb = ('' == $sStyleHidden_valoradicional11) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valoradicional11_dumb" style="<?php echo $sStyleHidden_valoradicional11_dumb; ?>"></TD>
<?php $sStyleHidden_campoadicional12_dumb = ('' == $sStyleHidden_campoadicional12) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_campoadicional12_dumb" style="<?php echo $sStyleHidden_campoadicional12_dumb; ?>"></TD>
<?php $sStyleHidden_valoradicional12_dumb = ('' == $sStyleHidden_valoradicional12) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valoradicional12_dumb" style="<?php echo $sStyleHidden_valoradicional12_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['valoradicional13']))
           {
               $this->nmgp_cmp_readonly['valoradicional13'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['campoadicional14']))
           {
               $this->nmgp_cmp_readonly['campoadicional14'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['valoradicional14']))
           {
               $this->nmgp_cmp_readonly['valoradicional14'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['campoadicional15']))
           {
               $this->nmgp_cmp_readonly['campoadicional15'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['valoradicional15']))
           {
               $this->nmgp_cmp_readonly['valoradicional15'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['campoadicional16']))
           {
               $this->nmgp_cmp_readonly['campoadicional16'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['valoradicional16']))
           {
               $this->nmgp_cmp_readonly['valoradicional16'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['campoadicional17']))
           {
               $this->nmgp_cmp_readonly['campoadicional17'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['campoadicional13']))
    {
        $this->nm_new_label['campoadicional13'] = "CAMPOADICIONAL13";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $campoadicional13 = $this->campoadicional13;
   $sStyleHidden_campoadicional13 = '';
   if (isset($this->nmgp_cmp_hidden['campoadicional13']) && $this->nmgp_cmp_hidden['campoadicional13'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['campoadicional13']);
       $sStyleHidden_campoadicional13 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_campoadicional13 = 'display: none;';
   $sStyleReadInp_campoadicional13 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["campoadicional13"]) &&  $this->nmgp_cmp_readonly["campoadicional13"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['campoadicional13']);
       $sStyleReadLab_campoadicional13 = '';
       $sStyleReadInp_campoadicional13 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['campoadicional13']) && $this->nmgp_cmp_hidden['campoadicional13'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="campoadicional13" value="<?php echo $this->form_encode_input($campoadicional13) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_campoadicional13_line" id="hidden_field_data_campoadicional13" style="<?php echo $sStyleHidden_campoadicional13; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_campoadicional13_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["campoadicional13"]) &&  $this->nmgp_cmp_readonly["campoadicional13"] == "on")) { 

 ?>
<input type="hidden" name="campoadicional13" value="<?php echo $this->form_encode_input($campoadicional13) . "\"><span id=\"id_ajax_label_campoadicional13\">" . $campoadicional13 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_campoadicional13" class="sc-ui-readonly-campoadicional13 css_campoadicional13_line" style="<?php echo $sStyleReadLab_campoadicional13; ?>"><?php echo $this->form_format_readonly("campoadicional13", $this->form_encode_input($this->campoadicional13)); ?></span><span id="id_read_off_campoadicional13" class="css_read_off_campoadicional13" style="white-space: nowrap;<?php echo $sStyleReadInp_campoadicional13; ?>">
 <input class="sc-js-input scFormObjectOdd css_campoadicional13_obj" style="" id="id_sc_field_campoadicional13" type=text name="campoadicional13" value="<?php echo $this->form_encode_input($campoadicional13) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_campoadicional13_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_campoadicional13_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valoradicional13']))
    {
        $this->nm_new_label['valoradicional13'] = "VALORADICIONAL13";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valoradicional13 = $this->valoradicional13;
   $sStyleHidden_valoradicional13 = '';
   if (isset($this->nmgp_cmp_hidden['valoradicional13']) && $this->nmgp_cmp_hidden['valoradicional13'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valoradicional13']);
       $sStyleHidden_valoradicional13 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valoradicional13 = 'display: none;';
   $sStyleReadInp_valoradicional13 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["valoradicional13"]) &&  $this->nmgp_cmp_readonly["valoradicional13"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valoradicional13']);
       $sStyleReadLab_valoradicional13 = '';
       $sStyleReadInp_valoradicional13 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valoradicional13']) && $this->nmgp_cmp_hidden['valoradicional13'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valoradicional13" value="<?php echo $this->form_encode_input($valoradicional13) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valoradicional13_line" id="hidden_field_data_valoradicional13" style="<?php echo $sStyleHidden_valoradicional13; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valoradicional13_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["valoradicional13"]) &&  $this->nmgp_cmp_readonly["valoradicional13"] == "on")) { 

 ?>
<input type="hidden" name="valoradicional13" value="<?php echo $this->form_encode_input($valoradicional13) . "\"><span id=\"id_ajax_label_valoradicional13\">" . $valoradicional13 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_valoradicional13" class="sc-ui-readonly-valoradicional13 css_valoradicional13_line" style="<?php echo $sStyleReadLab_valoradicional13; ?>"><?php echo $this->form_format_readonly("valoradicional13", $this->form_encode_input($this->valoradicional13)); ?></span><span id="id_read_off_valoradicional13" class="css_read_off_valoradicional13" style="white-space: nowrap;<?php echo $sStyleReadInp_valoradicional13; ?>">
 <input class="sc-js-input scFormObjectOdd css_valoradicional13_obj" style="" id="id_sc_field_valoradicional13" type=text name="valoradicional13" value="<?php echo $this->form_encode_input($valoradicional13) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valoradicional13_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valoradicional13_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['campoadicional14']))
    {
        $this->nm_new_label['campoadicional14'] = "CAMPOADICIONAL14";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $campoadicional14 = $this->campoadicional14;
   $sStyleHidden_campoadicional14 = '';
   if (isset($this->nmgp_cmp_hidden['campoadicional14']) && $this->nmgp_cmp_hidden['campoadicional14'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['campoadicional14']);
       $sStyleHidden_campoadicional14 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_campoadicional14 = 'display: none;';
   $sStyleReadInp_campoadicional14 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["campoadicional14"]) &&  $this->nmgp_cmp_readonly["campoadicional14"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['campoadicional14']);
       $sStyleReadLab_campoadicional14 = '';
       $sStyleReadInp_campoadicional14 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['campoadicional14']) && $this->nmgp_cmp_hidden['campoadicional14'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="campoadicional14" value="<?php echo $this->form_encode_input($campoadicional14) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_campoadicional14_line" id="hidden_field_data_campoadicional14" style="<?php echo $sStyleHidden_campoadicional14; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_campoadicional14_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["campoadicional14"]) &&  $this->nmgp_cmp_readonly["campoadicional14"] == "on")) { 

 ?>
<input type="hidden" name="campoadicional14" value="<?php echo $this->form_encode_input($campoadicional14) . "\"><span id=\"id_ajax_label_campoadicional14\">" . $campoadicional14 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_campoadicional14" class="sc-ui-readonly-campoadicional14 css_campoadicional14_line" style="<?php echo $sStyleReadLab_campoadicional14; ?>"><?php echo $this->form_format_readonly("campoadicional14", $this->form_encode_input($this->campoadicional14)); ?></span><span id="id_read_off_campoadicional14" class="css_read_off_campoadicional14" style="white-space: nowrap;<?php echo $sStyleReadInp_campoadicional14; ?>">
 <input class="sc-js-input scFormObjectOdd css_campoadicional14_obj" style="" id="id_sc_field_campoadicional14" type=text name="campoadicional14" value="<?php echo $this->form_encode_input($campoadicional14) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_campoadicional14_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_campoadicional14_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valoradicional14']))
    {
        $this->nm_new_label['valoradicional14'] = "VALORADICIONAL14";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valoradicional14 = $this->valoradicional14;
   $sStyleHidden_valoradicional14 = '';
   if (isset($this->nmgp_cmp_hidden['valoradicional14']) && $this->nmgp_cmp_hidden['valoradicional14'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valoradicional14']);
       $sStyleHidden_valoradicional14 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valoradicional14 = 'display: none;';
   $sStyleReadInp_valoradicional14 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["valoradicional14"]) &&  $this->nmgp_cmp_readonly["valoradicional14"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valoradicional14']);
       $sStyleReadLab_valoradicional14 = '';
       $sStyleReadInp_valoradicional14 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valoradicional14']) && $this->nmgp_cmp_hidden['valoradicional14'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valoradicional14" value="<?php echo $this->form_encode_input($valoradicional14) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valoradicional14_line" id="hidden_field_data_valoradicional14" style="<?php echo $sStyleHidden_valoradicional14; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valoradicional14_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["valoradicional14"]) &&  $this->nmgp_cmp_readonly["valoradicional14"] == "on")) { 

 ?>
<input type="hidden" name="valoradicional14" value="<?php echo $this->form_encode_input($valoradicional14) . "\"><span id=\"id_ajax_label_valoradicional14\">" . $valoradicional14 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_valoradicional14" class="sc-ui-readonly-valoradicional14 css_valoradicional14_line" style="<?php echo $sStyleReadLab_valoradicional14; ?>"><?php echo $this->form_format_readonly("valoradicional14", $this->form_encode_input($this->valoradicional14)); ?></span><span id="id_read_off_valoradicional14" class="css_read_off_valoradicional14" style="white-space: nowrap;<?php echo $sStyleReadInp_valoradicional14; ?>">
 <input class="sc-js-input scFormObjectOdd css_valoradicional14_obj" style="" id="id_sc_field_valoradicional14" type=text name="valoradicional14" value="<?php echo $this->form_encode_input($valoradicional14) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valoradicional14_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valoradicional14_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['campoadicional15']))
    {
        $this->nm_new_label['campoadicional15'] = "CAMPOADICIONAL15";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $campoadicional15 = $this->campoadicional15;
   $sStyleHidden_campoadicional15 = '';
   if (isset($this->nmgp_cmp_hidden['campoadicional15']) && $this->nmgp_cmp_hidden['campoadicional15'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['campoadicional15']);
       $sStyleHidden_campoadicional15 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_campoadicional15 = 'display: none;';
   $sStyleReadInp_campoadicional15 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["campoadicional15"]) &&  $this->nmgp_cmp_readonly["campoadicional15"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['campoadicional15']);
       $sStyleReadLab_campoadicional15 = '';
       $sStyleReadInp_campoadicional15 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['campoadicional15']) && $this->nmgp_cmp_hidden['campoadicional15'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="campoadicional15" value="<?php echo $this->form_encode_input($campoadicional15) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_campoadicional15_line" id="hidden_field_data_campoadicional15" style="<?php echo $sStyleHidden_campoadicional15; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_campoadicional15_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["campoadicional15"]) &&  $this->nmgp_cmp_readonly["campoadicional15"] == "on")) { 

 ?>
<input type="hidden" name="campoadicional15" value="<?php echo $this->form_encode_input($campoadicional15) . "\"><span id=\"id_ajax_label_campoadicional15\">" . $campoadicional15 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_campoadicional15" class="sc-ui-readonly-campoadicional15 css_campoadicional15_line" style="<?php echo $sStyleReadLab_campoadicional15; ?>"><?php echo $this->form_format_readonly("campoadicional15", $this->form_encode_input($this->campoadicional15)); ?></span><span id="id_read_off_campoadicional15" class="css_read_off_campoadicional15" style="white-space: nowrap;<?php echo $sStyleReadInp_campoadicional15; ?>">
 <input class="sc-js-input scFormObjectOdd css_campoadicional15_obj" style="" id="id_sc_field_campoadicional15" type=text name="campoadicional15" value="<?php echo $this->form_encode_input($campoadicional15) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_campoadicional15_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_campoadicional15_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valoradicional15']))
    {
        $this->nm_new_label['valoradicional15'] = "VALORADICIONAL15";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valoradicional15 = $this->valoradicional15;
   $sStyleHidden_valoradicional15 = '';
   if (isset($this->nmgp_cmp_hidden['valoradicional15']) && $this->nmgp_cmp_hidden['valoradicional15'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valoradicional15']);
       $sStyleHidden_valoradicional15 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valoradicional15 = 'display: none;';
   $sStyleReadInp_valoradicional15 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["valoradicional15"]) &&  $this->nmgp_cmp_readonly["valoradicional15"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valoradicional15']);
       $sStyleReadLab_valoradicional15 = '';
       $sStyleReadInp_valoradicional15 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valoradicional15']) && $this->nmgp_cmp_hidden['valoradicional15'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valoradicional15" value="<?php echo $this->form_encode_input($valoradicional15) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valoradicional15_line" id="hidden_field_data_valoradicional15" style="<?php echo $sStyleHidden_valoradicional15; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valoradicional15_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["valoradicional15"]) &&  $this->nmgp_cmp_readonly["valoradicional15"] == "on")) { 

 ?>
<input type="hidden" name="valoradicional15" value="<?php echo $this->form_encode_input($valoradicional15) . "\"><span id=\"id_ajax_label_valoradicional15\">" . $valoradicional15 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_valoradicional15" class="sc-ui-readonly-valoradicional15 css_valoradicional15_line" style="<?php echo $sStyleReadLab_valoradicional15; ?>"><?php echo $this->form_format_readonly("valoradicional15", $this->form_encode_input($this->valoradicional15)); ?></span><span id="id_read_off_valoradicional15" class="css_read_off_valoradicional15" style="white-space: nowrap;<?php echo $sStyleReadInp_valoradicional15; ?>">
 <input class="sc-js-input scFormObjectOdd css_valoradicional15_obj" style="" id="id_sc_field_valoradicional15" type=text name="valoradicional15" value="<?php echo $this->form_encode_input($valoradicional15) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valoradicional15_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valoradicional15_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['campoadicional16']))
    {
        $this->nm_new_label['campoadicional16'] = "CAMPOADICIONAL16";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $campoadicional16 = $this->campoadicional16;
   $sStyleHidden_campoadicional16 = '';
   if (isset($this->nmgp_cmp_hidden['campoadicional16']) && $this->nmgp_cmp_hidden['campoadicional16'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['campoadicional16']);
       $sStyleHidden_campoadicional16 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_campoadicional16 = 'display: none;';
   $sStyleReadInp_campoadicional16 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["campoadicional16"]) &&  $this->nmgp_cmp_readonly["campoadicional16"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['campoadicional16']);
       $sStyleReadLab_campoadicional16 = '';
       $sStyleReadInp_campoadicional16 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['campoadicional16']) && $this->nmgp_cmp_hidden['campoadicional16'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="campoadicional16" value="<?php echo $this->form_encode_input($campoadicional16) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_campoadicional16_line" id="hidden_field_data_campoadicional16" style="<?php echo $sStyleHidden_campoadicional16; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_campoadicional16_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["campoadicional16"]) &&  $this->nmgp_cmp_readonly["campoadicional16"] == "on")) { 

 ?>
<input type="hidden" name="campoadicional16" value="<?php echo $this->form_encode_input($campoadicional16) . "\"><span id=\"id_ajax_label_campoadicional16\">" . $campoadicional16 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_campoadicional16" class="sc-ui-readonly-campoadicional16 css_campoadicional16_line" style="<?php echo $sStyleReadLab_campoadicional16; ?>"><?php echo $this->form_format_readonly("campoadicional16", $this->form_encode_input($this->campoadicional16)); ?></span><span id="id_read_off_campoadicional16" class="css_read_off_campoadicional16" style="white-space: nowrap;<?php echo $sStyleReadInp_campoadicional16; ?>">
 <input class="sc-js-input scFormObjectOdd css_campoadicional16_obj" style="" id="id_sc_field_campoadicional16" type=text name="campoadicional16" value="<?php echo $this->form_encode_input($campoadicional16) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_campoadicional16_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_campoadicional16_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valoradicional16']))
    {
        $this->nm_new_label['valoradicional16'] = "VALORADICIONAL16";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valoradicional16 = $this->valoradicional16;
   $sStyleHidden_valoradicional16 = '';
   if (isset($this->nmgp_cmp_hidden['valoradicional16']) && $this->nmgp_cmp_hidden['valoradicional16'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valoradicional16']);
       $sStyleHidden_valoradicional16 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valoradicional16 = 'display: none;';
   $sStyleReadInp_valoradicional16 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["valoradicional16"]) &&  $this->nmgp_cmp_readonly["valoradicional16"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valoradicional16']);
       $sStyleReadLab_valoradicional16 = '';
       $sStyleReadInp_valoradicional16 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valoradicional16']) && $this->nmgp_cmp_hidden['valoradicional16'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valoradicional16" value="<?php echo $this->form_encode_input($valoradicional16) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valoradicional16_line" id="hidden_field_data_valoradicional16" style="<?php echo $sStyleHidden_valoradicional16; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valoradicional16_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["valoradicional16"]) &&  $this->nmgp_cmp_readonly["valoradicional16"] == "on")) { 

 ?>
<input type="hidden" name="valoradicional16" value="<?php echo $this->form_encode_input($valoradicional16) . "\"><span id=\"id_ajax_label_valoradicional16\">" . $valoradicional16 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_valoradicional16" class="sc-ui-readonly-valoradicional16 css_valoradicional16_line" style="<?php echo $sStyleReadLab_valoradicional16; ?>"><?php echo $this->form_format_readonly("valoradicional16", $this->form_encode_input($this->valoradicional16)); ?></span><span id="id_read_off_valoradicional16" class="css_read_off_valoradicional16" style="white-space: nowrap;<?php echo $sStyleReadInp_valoradicional16; ?>">
 <input class="sc-js-input scFormObjectOdd css_valoradicional16_obj" style="" id="id_sc_field_valoradicional16" type=text name="valoradicional16" value="<?php echo $this->form_encode_input($valoradicional16) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valoradicional16_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valoradicional16_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_campoadicional13_dumb = ('' == $sStyleHidden_campoadicional13) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_campoadicional13_dumb" style="<?php echo $sStyleHidden_campoadicional13_dumb; ?>"></TD>
<?php $sStyleHidden_valoradicional13_dumb = ('' == $sStyleHidden_valoradicional13) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valoradicional13_dumb" style="<?php echo $sStyleHidden_valoradicional13_dumb; ?>"></TD>
<?php $sStyleHidden_campoadicional14_dumb = ('' == $sStyleHidden_campoadicional14) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_campoadicional14_dumb" style="<?php echo $sStyleHidden_campoadicional14_dumb; ?>"></TD>
<?php $sStyleHidden_valoradicional14_dumb = ('' == $sStyleHidden_valoradicional14) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valoradicional14_dumb" style="<?php echo $sStyleHidden_valoradicional14_dumb; ?>"></TD>
<?php $sStyleHidden_campoadicional15_dumb = ('' == $sStyleHidden_campoadicional15) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_campoadicional15_dumb" style="<?php echo $sStyleHidden_campoadicional15_dumb; ?>"></TD>
<?php $sStyleHidden_valoradicional15_dumb = ('' == $sStyleHidden_valoradicional15) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valoradicional15_dumb" style="<?php echo $sStyleHidden_valoradicional15_dumb; ?>"></TD>
<?php $sStyleHidden_campoadicional16_dumb = ('' == $sStyleHidden_campoadicional16) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_campoadicional16_dumb" style="<?php echo $sStyleHidden_campoadicional16_dumb; ?>"></TD>
<?php $sStyleHidden_valoradicional16_dumb = ('' == $sStyleHidden_valoradicional16) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valoradicional16_dumb" style="<?php echo $sStyleHidden_valoradicional16_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['valoradicional17']))
           {
               $this->nmgp_cmp_readonly['valoradicional17'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['campoadicional18']))
           {
               $this->nmgp_cmp_readonly['campoadicional18'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['valoradicional18']))
           {
               $this->nmgp_cmp_readonly['valoradicional18'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['campoadicional19']))
           {
               $this->nmgp_cmp_readonly['campoadicional19'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['valoradicional19']))
           {
               $this->nmgp_cmp_readonly['valoradicional19'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['campoadicional20']))
           {
               $this->nmgp_cmp_readonly['campoadicional20'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['valoradicional20']))
           {
               $this->nmgp_cmp_readonly['valoradicional20'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['campoadicional17']))
    {
        $this->nm_new_label['campoadicional17'] = "CAMPOADICIONAL17";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $campoadicional17 = $this->campoadicional17;
   $sStyleHidden_campoadicional17 = '';
   if (isset($this->nmgp_cmp_hidden['campoadicional17']) && $this->nmgp_cmp_hidden['campoadicional17'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['campoadicional17']);
       $sStyleHidden_campoadicional17 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_campoadicional17 = 'display: none;';
   $sStyleReadInp_campoadicional17 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["campoadicional17"]) &&  $this->nmgp_cmp_readonly["campoadicional17"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['campoadicional17']);
       $sStyleReadLab_campoadicional17 = '';
       $sStyleReadInp_campoadicional17 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['campoadicional17']) && $this->nmgp_cmp_hidden['campoadicional17'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="campoadicional17" value="<?php echo $this->form_encode_input($campoadicional17) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_campoadicional17_line" id="hidden_field_data_campoadicional17" style="<?php echo $sStyleHidden_campoadicional17; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_campoadicional17_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["campoadicional17"]) &&  $this->nmgp_cmp_readonly["campoadicional17"] == "on")) { 

 ?>
<input type="hidden" name="campoadicional17" value="<?php echo $this->form_encode_input($campoadicional17) . "\"><span id=\"id_ajax_label_campoadicional17\">" . $campoadicional17 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_campoadicional17" class="sc-ui-readonly-campoadicional17 css_campoadicional17_line" style="<?php echo $sStyleReadLab_campoadicional17; ?>"><?php echo $this->form_format_readonly("campoadicional17", $this->form_encode_input($this->campoadicional17)); ?></span><span id="id_read_off_campoadicional17" class="css_read_off_campoadicional17" style="white-space: nowrap;<?php echo $sStyleReadInp_campoadicional17; ?>">
 <input class="sc-js-input scFormObjectOdd css_campoadicional17_obj" style="" id="id_sc_field_campoadicional17" type=text name="campoadicional17" value="<?php echo $this->form_encode_input($campoadicional17) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_campoadicional17_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_campoadicional17_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valoradicional17']))
    {
        $this->nm_new_label['valoradicional17'] = "VALORADICIONAL17";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valoradicional17 = $this->valoradicional17;
   $sStyleHidden_valoradicional17 = '';
   if (isset($this->nmgp_cmp_hidden['valoradicional17']) && $this->nmgp_cmp_hidden['valoradicional17'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valoradicional17']);
       $sStyleHidden_valoradicional17 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valoradicional17 = 'display: none;';
   $sStyleReadInp_valoradicional17 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["valoradicional17"]) &&  $this->nmgp_cmp_readonly["valoradicional17"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valoradicional17']);
       $sStyleReadLab_valoradicional17 = '';
       $sStyleReadInp_valoradicional17 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valoradicional17']) && $this->nmgp_cmp_hidden['valoradicional17'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valoradicional17" value="<?php echo $this->form_encode_input($valoradicional17) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valoradicional17_line" id="hidden_field_data_valoradicional17" style="<?php echo $sStyleHidden_valoradicional17; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valoradicional17_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["valoradicional17"]) &&  $this->nmgp_cmp_readonly["valoradicional17"] == "on")) { 

 ?>
<input type="hidden" name="valoradicional17" value="<?php echo $this->form_encode_input($valoradicional17) . "\"><span id=\"id_ajax_label_valoradicional17\">" . $valoradicional17 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_valoradicional17" class="sc-ui-readonly-valoradicional17 css_valoradicional17_line" style="<?php echo $sStyleReadLab_valoradicional17; ?>"><?php echo $this->form_format_readonly("valoradicional17", $this->form_encode_input($this->valoradicional17)); ?></span><span id="id_read_off_valoradicional17" class="css_read_off_valoradicional17" style="white-space: nowrap;<?php echo $sStyleReadInp_valoradicional17; ?>">
 <input class="sc-js-input scFormObjectOdd css_valoradicional17_obj" style="" id="id_sc_field_valoradicional17" type=text name="valoradicional17" value="<?php echo $this->form_encode_input($valoradicional17) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valoradicional17_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valoradicional17_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['campoadicional18']))
    {
        $this->nm_new_label['campoadicional18'] = "CAMPOADICIONAL18";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $campoadicional18 = $this->campoadicional18;
   $sStyleHidden_campoadicional18 = '';
   if (isset($this->nmgp_cmp_hidden['campoadicional18']) && $this->nmgp_cmp_hidden['campoadicional18'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['campoadicional18']);
       $sStyleHidden_campoadicional18 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_campoadicional18 = 'display: none;';
   $sStyleReadInp_campoadicional18 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["campoadicional18"]) &&  $this->nmgp_cmp_readonly["campoadicional18"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['campoadicional18']);
       $sStyleReadLab_campoadicional18 = '';
       $sStyleReadInp_campoadicional18 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['campoadicional18']) && $this->nmgp_cmp_hidden['campoadicional18'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="campoadicional18" value="<?php echo $this->form_encode_input($campoadicional18) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_campoadicional18_line" id="hidden_field_data_campoadicional18" style="<?php echo $sStyleHidden_campoadicional18; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_campoadicional18_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["campoadicional18"]) &&  $this->nmgp_cmp_readonly["campoadicional18"] == "on")) { 

 ?>
<input type="hidden" name="campoadicional18" value="<?php echo $this->form_encode_input($campoadicional18) . "\"><span id=\"id_ajax_label_campoadicional18\">" . $campoadicional18 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_campoadicional18" class="sc-ui-readonly-campoadicional18 css_campoadicional18_line" style="<?php echo $sStyleReadLab_campoadicional18; ?>"><?php echo $this->form_format_readonly("campoadicional18", $this->form_encode_input($this->campoadicional18)); ?></span><span id="id_read_off_campoadicional18" class="css_read_off_campoadicional18" style="white-space: nowrap;<?php echo $sStyleReadInp_campoadicional18; ?>">
 <input class="sc-js-input scFormObjectOdd css_campoadicional18_obj" style="" id="id_sc_field_campoadicional18" type=text name="campoadicional18" value="<?php echo $this->form_encode_input($campoadicional18) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_campoadicional18_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_campoadicional18_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valoradicional18']))
    {
        $this->nm_new_label['valoradicional18'] = "VALORADICIONAL18";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valoradicional18 = $this->valoradicional18;
   $sStyleHidden_valoradicional18 = '';
   if (isset($this->nmgp_cmp_hidden['valoradicional18']) && $this->nmgp_cmp_hidden['valoradicional18'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valoradicional18']);
       $sStyleHidden_valoradicional18 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valoradicional18 = 'display: none;';
   $sStyleReadInp_valoradicional18 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["valoradicional18"]) &&  $this->nmgp_cmp_readonly["valoradicional18"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valoradicional18']);
       $sStyleReadLab_valoradicional18 = '';
       $sStyleReadInp_valoradicional18 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valoradicional18']) && $this->nmgp_cmp_hidden['valoradicional18'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valoradicional18" value="<?php echo $this->form_encode_input($valoradicional18) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valoradicional18_line" id="hidden_field_data_valoradicional18" style="<?php echo $sStyleHidden_valoradicional18; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valoradicional18_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["valoradicional18"]) &&  $this->nmgp_cmp_readonly["valoradicional18"] == "on")) { 

 ?>
<input type="hidden" name="valoradicional18" value="<?php echo $this->form_encode_input($valoradicional18) . "\"><span id=\"id_ajax_label_valoradicional18\">" . $valoradicional18 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_valoradicional18" class="sc-ui-readonly-valoradicional18 css_valoradicional18_line" style="<?php echo $sStyleReadLab_valoradicional18; ?>"><?php echo $this->form_format_readonly("valoradicional18", $this->form_encode_input($this->valoradicional18)); ?></span><span id="id_read_off_valoradicional18" class="css_read_off_valoradicional18" style="white-space: nowrap;<?php echo $sStyleReadInp_valoradicional18; ?>">
 <input class="sc-js-input scFormObjectOdd css_valoradicional18_obj" style="" id="id_sc_field_valoradicional18" type=text name="valoradicional18" value="<?php echo $this->form_encode_input($valoradicional18) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valoradicional18_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valoradicional18_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['campoadicional19']))
    {
        $this->nm_new_label['campoadicional19'] = "CAMPOADICIONAL19";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $campoadicional19 = $this->campoadicional19;
   $sStyleHidden_campoadicional19 = '';
   if (isset($this->nmgp_cmp_hidden['campoadicional19']) && $this->nmgp_cmp_hidden['campoadicional19'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['campoadicional19']);
       $sStyleHidden_campoadicional19 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_campoadicional19 = 'display: none;';
   $sStyleReadInp_campoadicional19 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["campoadicional19"]) &&  $this->nmgp_cmp_readonly["campoadicional19"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['campoadicional19']);
       $sStyleReadLab_campoadicional19 = '';
       $sStyleReadInp_campoadicional19 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['campoadicional19']) && $this->nmgp_cmp_hidden['campoadicional19'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="campoadicional19" value="<?php echo $this->form_encode_input($campoadicional19) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_campoadicional19_line" id="hidden_field_data_campoadicional19" style="<?php echo $sStyleHidden_campoadicional19; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_campoadicional19_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["campoadicional19"]) &&  $this->nmgp_cmp_readonly["campoadicional19"] == "on")) { 

 ?>
<input type="hidden" name="campoadicional19" value="<?php echo $this->form_encode_input($campoadicional19) . "\"><span id=\"id_ajax_label_campoadicional19\">" . $campoadicional19 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_campoadicional19" class="sc-ui-readonly-campoadicional19 css_campoadicional19_line" style="<?php echo $sStyleReadLab_campoadicional19; ?>"><?php echo $this->form_format_readonly("campoadicional19", $this->form_encode_input($this->campoadicional19)); ?></span><span id="id_read_off_campoadicional19" class="css_read_off_campoadicional19" style="white-space: nowrap;<?php echo $sStyleReadInp_campoadicional19; ?>">
 <input class="sc-js-input scFormObjectOdd css_campoadicional19_obj" style="" id="id_sc_field_campoadicional19" type=text name="campoadicional19" value="<?php echo $this->form_encode_input($campoadicional19) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_campoadicional19_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_campoadicional19_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valoradicional19']))
    {
        $this->nm_new_label['valoradicional19'] = "VALORADICIONAL19";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valoradicional19 = $this->valoradicional19;
   $sStyleHidden_valoradicional19 = '';
   if (isset($this->nmgp_cmp_hidden['valoradicional19']) && $this->nmgp_cmp_hidden['valoradicional19'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valoradicional19']);
       $sStyleHidden_valoradicional19 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valoradicional19 = 'display: none;';
   $sStyleReadInp_valoradicional19 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["valoradicional19"]) &&  $this->nmgp_cmp_readonly["valoradicional19"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valoradicional19']);
       $sStyleReadLab_valoradicional19 = '';
       $sStyleReadInp_valoradicional19 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valoradicional19']) && $this->nmgp_cmp_hidden['valoradicional19'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valoradicional19" value="<?php echo $this->form_encode_input($valoradicional19) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valoradicional19_line" id="hidden_field_data_valoradicional19" style="<?php echo $sStyleHidden_valoradicional19; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valoradicional19_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["valoradicional19"]) &&  $this->nmgp_cmp_readonly["valoradicional19"] == "on")) { 

 ?>
<input type="hidden" name="valoradicional19" value="<?php echo $this->form_encode_input($valoradicional19) . "\"><span id=\"id_ajax_label_valoradicional19\">" . $valoradicional19 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_valoradicional19" class="sc-ui-readonly-valoradicional19 css_valoradicional19_line" style="<?php echo $sStyleReadLab_valoradicional19; ?>"><?php echo $this->form_format_readonly("valoradicional19", $this->form_encode_input($this->valoradicional19)); ?></span><span id="id_read_off_valoradicional19" class="css_read_off_valoradicional19" style="white-space: nowrap;<?php echo $sStyleReadInp_valoradicional19; ?>">
 <input class="sc-js-input scFormObjectOdd css_valoradicional19_obj" style="" id="id_sc_field_valoradicional19" type=text name="valoradicional19" value="<?php echo $this->form_encode_input($valoradicional19) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valoradicional19_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valoradicional19_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['campoadicional20']))
    {
        $this->nm_new_label['campoadicional20'] = "CAMPOADICIONAL20";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $campoadicional20 = $this->campoadicional20;
   $sStyleHidden_campoadicional20 = '';
   if (isset($this->nmgp_cmp_hidden['campoadicional20']) && $this->nmgp_cmp_hidden['campoadicional20'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['campoadicional20']);
       $sStyleHidden_campoadicional20 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_campoadicional20 = 'display: none;';
   $sStyleReadInp_campoadicional20 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["campoadicional20"]) &&  $this->nmgp_cmp_readonly["campoadicional20"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['campoadicional20']);
       $sStyleReadLab_campoadicional20 = '';
       $sStyleReadInp_campoadicional20 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['campoadicional20']) && $this->nmgp_cmp_hidden['campoadicional20'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="campoadicional20" value="<?php echo $this->form_encode_input($campoadicional20) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_campoadicional20_line" id="hidden_field_data_campoadicional20" style="<?php echo $sStyleHidden_campoadicional20; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_campoadicional20_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["campoadicional20"]) &&  $this->nmgp_cmp_readonly["campoadicional20"] == "on")) { 

 ?>
<input type="hidden" name="campoadicional20" value="<?php echo $this->form_encode_input($campoadicional20) . "\"><span id=\"id_ajax_label_campoadicional20\">" . $campoadicional20 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_campoadicional20" class="sc-ui-readonly-campoadicional20 css_campoadicional20_line" style="<?php echo $sStyleReadLab_campoadicional20; ?>"><?php echo $this->form_format_readonly("campoadicional20", $this->form_encode_input($this->campoadicional20)); ?></span><span id="id_read_off_campoadicional20" class="css_read_off_campoadicional20" style="white-space: nowrap;<?php echo $sStyleReadInp_campoadicional20; ?>">
 <input class="sc-js-input scFormObjectOdd css_campoadicional20_obj" style="" id="id_sc_field_campoadicional20" type=text name="campoadicional20" value="<?php echo $this->form_encode_input($campoadicional20) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_campoadicional20_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_campoadicional20_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valoradicional20']))
    {
        $this->nm_new_label['valoradicional20'] = "VALORADICIONAL20";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valoradicional20 = $this->valoradicional20;
   $sStyleHidden_valoradicional20 = '';
   if (isset($this->nmgp_cmp_hidden['valoradicional20']) && $this->nmgp_cmp_hidden['valoradicional20'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valoradicional20']);
       $sStyleHidden_valoradicional20 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valoradicional20 = 'display: none;';
   $sStyleReadInp_valoradicional20 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["valoradicional20"]) &&  $this->nmgp_cmp_readonly["valoradicional20"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valoradicional20']);
       $sStyleReadLab_valoradicional20 = '';
       $sStyleReadInp_valoradicional20 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valoradicional20']) && $this->nmgp_cmp_hidden['valoradicional20'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valoradicional20" value="<?php echo $this->form_encode_input($valoradicional20) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valoradicional20_line" id="hidden_field_data_valoradicional20" style="<?php echo $sStyleHidden_valoradicional20; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valoradicional20_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["valoradicional20"]) &&  $this->nmgp_cmp_readonly["valoradicional20"] == "on")) { 

 ?>
<input type="hidden" name="valoradicional20" value="<?php echo $this->form_encode_input($valoradicional20) . "\"><span id=\"id_ajax_label_valoradicional20\">" . $valoradicional20 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_valoradicional20" class="sc-ui-readonly-valoradicional20 css_valoradicional20_line" style="<?php echo $sStyleReadLab_valoradicional20; ?>"><?php echo $this->form_format_readonly("valoradicional20", $this->form_encode_input($this->valoradicional20)); ?></span><span id="id_read_off_valoradicional20" class="css_read_off_valoradicional20" style="white-space: nowrap;<?php echo $sStyleReadInp_valoradicional20; ?>">
 <input class="sc-js-input scFormObjectOdd css_valoradicional20_obj" style="" id="id_sc_field_valoradicional20" type=text name="valoradicional20" value="<?php echo $this->form_encode_input($valoradicional20) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valoradicional20_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valoradicional20_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_campoadicional17_dumb = ('' == $sStyleHidden_campoadicional17) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_campoadicional17_dumb" style="<?php echo $sStyleHidden_campoadicional17_dumb; ?>"></TD>
<?php $sStyleHidden_valoradicional17_dumb = ('' == $sStyleHidden_valoradicional17) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valoradicional17_dumb" style="<?php echo $sStyleHidden_valoradicional17_dumb; ?>"></TD>
<?php $sStyleHidden_campoadicional18_dumb = ('' == $sStyleHidden_campoadicional18) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_campoadicional18_dumb" style="<?php echo $sStyleHidden_campoadicional18_dumb; ?>"></TD>
<?php $sStyleHidden_valoradicional18_dumb = ('' == $sStyleHidden_valoradicional18) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valoradicional18_dumb" style="<?php echo $sStyleHidden_valoradicional18_dumb; ?>"></TD>
<?php $sStyleHidden_campoadicional19_dumb = ('' == $sStyleHidden_campoadicional19) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_campoadicional19_dumb" style="<?php echo $sStyleHidden_campoadicional19_dumb; ?>"></TD>
<?php $sStyleHidden_valoradicional19_dumb = ('' == $sStyleHidden_valoradicional19) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valoradicional19_dumb" style="<?php echo $sStyleHidden_valoradicional19_dumb; ?>"></TD>
<?php $sStyleHidden_campoadicional20_dumb = ('' == $sStyleHidden_campoadicional20) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_campoadicional20_dumb" style="<?php echo $sStyleHidden_campoadicional20_dumb; ?>"></TD>
<?php $sStyleHidden_valoradicional20_dumb = ('' == $sStyleHidden_valoradicional20) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valoradicional20_dumb" style="<?php echo $sStyleHidden_valoradicional20_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">DETALLE DE LA ORDEN DE TRABAJO</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['detalle_factura']))
    {
        $this->nm_new_label['detalle_factura'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $detalle_factura = $this->detalle_factura;
   $sStyleHidden_detalle_factura = '';
   if (isset($this->nmgp_cmp_hidden['detalle_factura']) && $this->nmgp_cmp_hidden['detalle_factura'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['detalle_factura']);
       $sStyleHidden_detalle_factura = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_detalle_factura = 'display: none;';
   $sStyleReadInp_detalle_factura = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['detalle_factura']) && $this->nmgp_cmp_readonly['detalle_factura'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['detalle_factura']);
       $sStyleReadLab_detalle_factura = '';
       $sStyleReadInp_detalle_factura = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['detalle_factura']) && $this->nmgp_cmp_hidden['detalle_factura'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="detalle_factura" value="<?php echo $this->form_encode_input($detalle_factura) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_detalle_factura_line" id="hidden_field_data_detalle_factura" style="<?php echo $sStyleHidden_detalle_factura; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_detalle_factura_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_detalle_factura_label" style=""><span id="id_label_detalle_factura"><?php echo $this->nm_new_label['detalle_factura']; ?></span></span><br>
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle_factura'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle_factura'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle_factura'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] ]['form_DETALLE_ORDEN_TRABAJO']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] ]['form_DETALLE_ORDEN_TRABAJO']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] ]['form_DETALLE_ORDEN_TRABAJO']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] ]['form_DETALLE_ORDEN_TRABAJO']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] ]['form_DETALLE_ORDEN_TRABAJO']['embutida_liga_form_insert'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] ]['form_DETALLE_ORDEN_TRABAJO']['embutida_liga_form_update'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] ]['form_DETALLE_ORDEN_TRABAJO']['embutida_liga_form_delete'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] ]['form_DETALLE_ORDEN_TRABAJO']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] ]['form_DETALLE_ORDEN_TRABAJO']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] ]['form_DETALLE_ORDEN_TRABAJO']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] ]['form_DETALLE_ORDEN_TRABAJO']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] ]['form_DETALLE_ORDEN_TRABAJO']['embutida_liga_tp_pag'] = 'total';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] ]['form_DETALLE_ORDEN_TRABAJO']['embutida_parms'] = "NM_btn_insert*scinN*scoutNM_btn_update*scinN*scoutNM_btn_delete*scinN*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] ]['form_DETALLE_ORDEN_TRABAJO']['foreign_key']['estab'] = $this->nmgp_dados_form['estab'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] ]['form_DETALLE_ORDEN_TRABAJO']['foreign_key']['ptoemi'] = $this->nmgp_dados_form['ptoemi'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] ]['form_DETALLE_ORDEN_TRABAJO']['foreign_key']['secuencial'] = $this->nmgp_dados_form['secuencial'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] ]['form_DETALLE_ORDEN_TRABAJO']['foreign_key']['lote'] = $this->nmgp_dados_form['lote'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] ]['form_DETALLE_ORDEN_TRABAJO']['where_filter'] = "ESTAB = " . $this->nmgp_dados_form['estab'] . " AND PTOEMI = " . $this->nmgp_dados_form['ptoemi'] . " AND SECUENCIAL = " . $this->nmgp_dados_form['secuencial'] . " AND LOTE = '" . $this->nmgp_dados_form['lote'] . "'";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] ]['form_DETALLE_ORDEN_TRABAJO']['where_detal']  = "ESTAB = " . $this->nmgp_dados_form['estab'] . " AND PTOEMI = " . $this->nmgp_dados_form['ptoemi'] . " AND SECUENCIAL = " . $this->nmgp_dados_form['secuencial'] . " AND LOTE = '" . $this->nmgp_dados_form['lote'] . "'";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] ]['form_ORDEN_TRABAJO']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] ]['form_DETALLE_ORDEN_TRABAJO']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_ORDEN_TRABAJO_empty.htm' : $this->Ini->link_form_DETALLE_ORDEN_TRABAJO_edit . '?SC_where_pdf=' . $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] ]['form_DETALLE_ORDEN_TRABAJO']['where_filter'] . '&script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y';
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['pdf_view'])
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] ]['form_DETALLE_ORDEN_TRABAJO']['embutida_pdf'] = true;
     $_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['form_DETALLE_ORDEN_TRABAJO'] = $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] ]['form_DETALLE_ORDEN_TRABAJO']['embutida_form_parms'] . '?#?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '?@??#?script_case_detail=Y?@?';
     include_once ($this->Ini->root . $this->Ini->link_form_DETALLE_ORDEN_TRABAJO_edit . "index.php");
     $this->form_DETALLE_ORDEN_TRABAJO_pdf_det = new form_DETALLE_ORDEN_TRABAJO_edit;
     if (method_exists($this->form_DETALLE_ORDEN_TRABAJO_pdf_det, "inicializa"))
     {
         $this->form_DETALLE_ORDEN_TRABAJO_pdf_det->inicializa();
     }
     unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['form_DETALLE_ORDEN_TRABAJO_script_case_init'] ]['form_DETALLE_ORDEN_TRABAJO']['embutida_pdf']);
     unset($_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['form_DETALLE_ORDEN_TRABAJO']);
 }
 else
 {
?>
    <iframe border="0" id="nmsc_iframe_liga_form_DETALLE_ORDEN_TRABAJO"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_DETALLE_ORDEN_TRABAJO"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
 }
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detalle_factura_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detalle_factura_text"></span></td></tr></table></td></tr></table> </TD>
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
  $nm_sc_blocos_da_pag = array(0,1,2);

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
  $nm_sc_blocos_da_pag = array(0,1,2);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['masterValue']);
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
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['pdf_view']) {
?>
 $(document).ready(function() {
  $('#SC_blk_pdf1').click();
});
<?php
}
?>
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_ORDEN_TRABAJO");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_ORDEN_TRABAJO");
 parent.scAjaxDetailHeight("form_ORDEN_TRABAJO", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_ORDEN_TRABAJO", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_ORDEN_TRABAJO", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['sc_modal'])
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
			tb_show('', "<?php echo  $this->Ini->path_link . SC_dir_app_name('form_ORDEN_TRABAJO')  ?>/form_ORDEN_TRABAJO_config_pdf.php?nm_opc=pdf&nm_target=2&nm_cor=cor&papel=1&lpapel=0&apapel=0&orientacao=1&bookmarks=XX&largura=800&conf_larg=10&conf_fonte=N&grafico=XX&language=es&conf_socor=S&password=n&pdf_zip=N&sc_ver_93=n&KeepThis=true&TB_iframe=true&modal=true");
			 return;
		}
	}
	function scBtnFn_FACTURAR() {
		if ($("#sc_FACTURAR_top").length && $("#sc_FACTURAR_top").is(":visible")) {
			sc_btn_FACTURAR()
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_ORDEN_TRABAJO']['buttonStatus'] = $this->nmgp_botoes;
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
