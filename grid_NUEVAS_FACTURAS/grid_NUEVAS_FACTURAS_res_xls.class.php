<?php

class grid_NUEVAS_FACTURAS_res_xls
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Xls_dados;
   var $Xls_workbook;
   var $Xls_col;
   var $Xls_row;
   var $array_titulos;
   var $array_linhas;
   var $Arquivo;
   var $Tit_doc;

   //---- 
   function __construct()
   {
   }

   //---- 
   function monta_xls()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Xls_f);
          $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
          $Temp = ob_get_clean();
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      else
      {
          $this->monta_html();
      }
   }

   //----- 
   function inicializa_vars()
   {
      $this->Use_phpspreadsheet = (phpversion() >=  "7.3.9" && is_dir($this->Ini->path_third . '/phpspreadsheet')) ? true : false;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
      $this->Xls_row = 1;
      if ($this->Use_phpspreadsheet) {
          require_once $this->Ini->path_third . '/phpspreadsheet/vendor/autoload.php';
      } 
      else { 
          set_include_path(get_include_path() . PATH_SEPARATOR . $this->Ini->path_third . '/phpexcel/');
          require_once $this->Ini->path_third . '/phpexcel/PHPExcel.php';
          require_once $this->Ini->path_third . '/phpexcel/PHPExcel/IOFactory.php';
      } 
      $this->array_titulos = array();
      $this->array_linhas  = array();
      $this->Xls_password = "";
      $this->Xls_tp     = ".xls";
      $this->Xls_col    = 0;
      $this->nm_data    = new nm_data("es");
      if (isset($_REQUEST['nmgp_tp_xls']) && !empty($_REQUEST['nmgp_tp_xls']))
      {
          $this->Xls_tp = "." . $_REQUEST['nmgp_tp_xls'];
      }
      $this->Arquivo    = "sc_xls";
      $this->Arquivo   .= "_" . date('YmdHis') . "_" . rand(0, 1000);
      $this->Arq_zip    = $this->Arquivo . "_grid_NUEVAS_FACTURAS.zip";
      $this->Arquivo   .= "_grid_NUEVAS_FACTURAS";
      $this->Arquivo   .= $this->Xls_tp;
      $this->Tit_doc    = "grid_NUEVAS_FACTURAS" . $this->Xls_tp;
      $this->Tit_zip    = "grid_NUEVAS_FACTURAS.zip";
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['xls_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['xls_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['xls_name'] .= $this->Xls_tp ;
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['xls_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['xls_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['xls_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['xls_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['xls_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['xls_name']);
      }
      $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
      if ($this->Use_phpspreadsheet) {
          $this->Xls_dados = new PhpOffice\PhpSpreadsheet\Spreadsheet();
      }
      else {
          $this->Xls_dados = new PHPExcel();
      }
      $this->Xls_dados->setActiveSheetIndex(0);
      $this->Nm_ActiveSheet = $this->Xls_dados->getActiveSheet();
      if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
      {
          $this->Nm_ActiveSheet->setRightToLeft(true);
      }
      $this->Res       = new grid_NUEVAS_FACTURAS_resumo("out");
      $this->prep_modulos("Res");
   }

   //---- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }

   //----- 
   function grava_arquivo()
   {
      $this->Res->resumo_export();
      $this->comp_field   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['pivot_group_by'];
      $this->comp_y_axys  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['pivot_y_axys'];
      $this->comp_tabular = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['pivot_tabular'];
      $this->array_titulos = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['arr_export']['label'];
      $this->array_linhas  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['arr_export']['data'];
      $b_display = false;
      $contr_rowspan = array();
      $contr_colspan = array();
      foreach ($this->array_titulos as $lines)
      {
           $this->Xls_col = 0;
           if (!$b_display)
           {
               if ($this->comp_tabular)
               {
                   foreach ($this->comp_y_axys as $iYAxysIndex)
                   {
                       $contr_rowspan[$this->Xls_col] = sizeof($this->array_titulos);
                       $contr_colspan[$this->Xls_col] = 1;
                       if ($this->Use_phpspreadsheet) {
                           $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                       }
                       else {
                           $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                       }
                       $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $this->comp_field[$iYAxysIndex]);
                       $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
                       $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
                       $this->Xls_col += 1;
                   }
               }
               else
               {
                   $colspan = $this->comp_tabular ? sizeof($this->comp_y_axys) : 1;
                   $contr_rowspan[$this->Xls_col] = sizeof($this->array_titulos);
                   $contr_colspan[$this->Xls_col] = $colspan;
                   $campo_titulo = $this->Ini->Nm_lang['lang_othr_smry_msge'];
                   if (!NM_is_utf8($campo_titulo))
                   {
                       $campo_titulo = sc_convert_encoding($campo_titulo, "UTF-8", $_SESSION['scriptcase']['charset']);
                   }
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                   }
                   $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $campo_titulo);
                   $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
                   $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
                   $this->Xls_col += $colspan;
               }
               $b_display = true;
           }
           foreach ($lines as $columns)
           {
               $col_ok = false;
               $colspan = (isset($columns['colspan']) && 1 < $columns['colspan']) ? $columns['colspan'] : 1;
               while (!$col_ok)
               {
                   if (isset($contr_rowspan[$this->Xls_col]) && 1 < $contr_rowspan[$this->Xls_col])
                   {
                       $contr_rowspan[$this->Xls_col]--;
                       $this->Xls_col += $contr_colspan[$this->Xls_col];
                   }
                   else
                   {
                       $col_ok = true;
                   }
               }
               if (isset($columns['rowspan']) && 1 < $columns['rowspan'])
               {
                   $contr_rowspan[$this->Xls_col] = $columns['rowspan'];
                   $contr_colspan[$this->Xls_col] = $colspan;
               }
               $campo_titulo = $columns['label'];
               if (!NM_is_utf8($campo_titulo))
               {
                   $campo_titulo = sc_convert_encoding($campo_titulo, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               if ($this->Use_phpspreadsheet) {
                   $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
               }
               else {
                   $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
               }
               $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $campo_titulo);
               $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getFont()->setBold(true);
               $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->Xls_col))->setAutoSize(true);
               $this->Xls_col += $colspan;
           }
           foreach ($contr_rowspan as $col => $row)
           {
               if ($col >= $this->Xls_col && $row > 1)
               {
                   $contr_rowspan[$col]--;
               }
           }
           $this->Xls_row++;
      }
      foreach ($this->array_linhas as $lines)
      {
           $this->Xls_col = 0;
           $colspan       = 0;
           foreach ($lines as $num_col => $columns)
           {
               if (0 <= $columns['level'])
               {
                   $cada_dado = $this->comp_tabular ? $columns['label'] : str_repeat('   ', $columns['level']) . $columns['label'];
               }
               else
               {
                   $cada_dado = $columns['value'];
               }
               if (!NM_is_utf8($cada_dado))
               {
                   $cada_dado = sc_convert_encoding($cada_dado, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               $this->Xls_col = $num_col + $colspan;
               if (isset($columns['colspan']) && $columns['colspan'] > 0)
               {
                   $colspan = ($columns['colspan'] - 1);
               }
               if (0 <= $columns['level'])
               {
                   if (!NM_is_utf8($cada_dado))
                   {
                       $cada_dado = sc_convert_encoding($cada_dado, "UTF-8", $_SESSION['scriptcase']['charset']);
                   }
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                   }
                   $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $cada_dado);
               }
               else
               {
                   if (!NM_is_utf8($cada_val))
                   {
                       $cada_val = sc_convert_encoding($cada_val, "UTF-8", $_SESSION['scriptcase']['charset']);
                   }
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->Xls_col) . $this->Xls_row)->getNumberFormat()->setFormatCode('');
                   $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->Xls_col) . $this->Xls_row, $cada_dado);
               }
               $this->Xls_col += $colspan;
           }
           $this->Xls_row++;
      }
      if ($this->Use_phpspreadsheet) {
          if ($this->Xls_tp == ".xlsx") {
              $objWriter = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($this->Xls_dados);
          } 
          else {
              $objWriter = new PhpOffice\PhpSpreadsheet\Writer\Xls($this->Xls_dados);
          } 
      } 
      else {
          if ($this->Xls_tp == ".xlsx") {
              $objWriter = new PHPExcel_Writer_Excel2007($this->Xls_dados);
          } 
          else {
              $objWriter = new PHPExcel_Writer_Excel5($this->Xls_dados);
          } 
      } 
      $objWriter->save($this->Xls_f);
   }


   function calc_cell($col)
   {
       $arr_alfa = array("","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
       $val_ret = "";
       $result = $col + 1;
       while ($result > 26)
       {
           $cel      = $result % 26;
           $result   = $result / 26;
           if ($cel == 0)
           {
               $cel    = 26;
               $result--;
           }
           $val_ret = $arr_alfa[$cel] . $val_ret;
       }
       $val_ret = $arr_alfa[$result] . $val_ret;
       return $val_ret;
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>NUEVAS FACTURAS  :: Excel</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <?php
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->str_google_fonts ?>" />
 <?php
 }
 ?>
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">XLS</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_NUEVAS_FACTURAS_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_NUEVAS_FACTURAS"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NUEVAS_FACTURAS']['xls_return']); ?>"> 
</FORM> 
</td></tr></table>
</BODY>
</HTML>
<?php
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $str_highlight_ini = "";
      $str_highlight_fim = "";
      if(substr($nm_campo, 0, 23) == '<div class="highlight">' && substr($nm_campo, -6) == '</div>')
      {
           $str_highlight_ini = substr($nm_campo, 0, 23);
           $str_highlight_fim = substr($nm_campo, -6);

           $trab_campo = substr($nm_campo, 23, -6);
           $tam_campo  = strlen($trab_campo);
      }      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont2 >= $tam_campo)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
   } 
function crear_comprobante($contenedor)
{
$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'on';
  
$contenedor->preserveWhiteSpace = false;
$contenedor->formatOutput = true;

$documento = $contenedor->createElement("factura");

$contenedor->appendChild($documento);

$factura_id = $contenedor->createAttribute("id");
$factura_id->value = 'comprobante';
$documento->appendChild($factura_id);

$factura_version = $contenedor->createAttribute("version");
$factura_version->value = '1.1.0';
$documento->appendChild($factura_version);

return $documento;

$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'off';
}
function crear_detalles($contenedor, $documento)
{
$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'on';
  
$detalles = $contenedor->createElement("detalles");
$documento->appendChild($detalles);

$check_sql = "SELECT CODIGO, DESCRIPCION, CANTIDAD, PRECIOUNITARIO, DESCUENTO, PRECIOTOTALSINIMPUESTO,"
   . "NOMBREDETALLEADICIONAL1, VALORADICIONAL1, NOMBREDETALLEADICIONAL2, VALORADICIONAL2, NOMBREDETALLEADICIONAL3,VALORADICIONAL3,"
   . "CODIGOIMPUESTO, CODIGOPORCENTAJEIMP, TARIFA, BASEIMPONIBLE, VALOR, CODIMPICE, CODPORCENICE, PORCENICE, BASEICE,  VALORICE"  
   . " FROM DETALLE_FACTURA"
   . " WHERE ESTAB = " .$f_estab . " AND PTOEMI = ".$f_ptoemi ." AND SECUENCIAL = ".$f_secuencial ." AND LOTE = '".$f_lote ."'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 
;

foreach($rs  as $items) {
	
	
	$detalles_detalle = $contenedor->createElement("detalle");
	$detalles->appendChild($detalles_detalle);
	
	$detalles_codigoPrincipal = $contenedor->createElement("codigoPrincipal");
	$detalles_codigoPrincipal->nodeValue = $items[0];
	$detalles_detalle->appendChild($detalles_codigoPrincipal);
	
	$detalles_descripcion = $contenedor->createElement("descripcion");
	$detalles_descripcion->nodeValue = $items[1];
	$detalles_detalle->appendChild($detalles_descripcion);
	
	$detalles_cantidad = $contenedor->createElement("cantidad");
	$detalles_cantidad->nodeValue = $items[2];
	$detalles_detalle->appendChild($detalles_cantidad);
	
	$detalles_preciounitario = $contenedor->createElement("precioUnitario");
	$detalles_preciounitario->nodeValue = $items[3];
	$detalles_detalle->appendChild($detalles_preciounitario);
	
	$detalles_descuento = $contenedor->createElement("descuento");
	$detalles_descuento->nodeValue = bcdiv($items[4], 1, 2);
	$detalles_detalle->appendChild($detalles_descuento);

	$detalles_precioTotalSinImpuesto = $contenedor->createElement("precioTotalSinImpuesto");
	$detalles_precioTotalSinImpuesto->nodeValue = $items[5];
	$detalles_detalle->appendChild($detalles_precioTotalSinImpuesto);
	
	if(trim($items[6])!="" || trim($items[8])!="" || trim($items[10])!="") {
		$detalles_detallesAdicionales = $contenedor->createElement("detallesAdicionales");
		$detalles_detalle->appendChild($detalles_detallesAdicionales);
		
		if(trim($items[6])!="") {
			
			$detallesAdicionales_detAdicional = $contenedor->createElement("detAdicional");
			$detalles_detallesAdicionales->appendChild($detallesAdicionales_detAdicional);
		
			$nombre_detAdicional = $contenedor->createAttribute("nombre");
			$nombre_detAdicional->value = $items[6];
			$detallesAdicionales_detAdicional->appendChild($nombre_detAdicional);
			
			$valor_detAdicional = $contenedor->createAttribute("valor");
			$valor_detAdicional->value = $items[7];
			$detallesAdicionales_detAdicional->appendChild($valor_detAdicional);
		}
		if(trim($items[8])!="") {
			
			$detallesAdicionales_detAdicional = $contenedor->createElement("detAdicional");
			$detalles_detallesAdicionales->appendChild($detallesAdicionales_detAdicional);
		
			$nombre_detAdicional = $contenedor->createAttribute("nombre");
			$nombre_detAdicional->value = $items[8];
			$detallesAdicionales_detAdicional->appendChild($nombre_detAdicional);
			
			$valor_detAdicional = $contenedor->createAttribute("valor");
			$valor_detAdicional->value = $items[9];
			$detallesAdicionales_detAdicional->appendChild($valor_detAdicional);
		}
		if(trim($items[10])!="") {
			
			$detallesAdicionales_detAdicional = $contenedor->createElement("detAdicional");
			$detalles_detallesAdicionales->appendChild($detallesAdicionales_detAdicional);
		
			$nombre_detAdicional = $contenedor->createAttribute("nombre");
			$nombre_detAdicional->value = $items[10];
			$detallesAdicionales_detAdicional->appendChild($nombre_detAdicional);
			
			$valor_detAdicional = $contenedor->createAttribute("valor");
			$valor_detAdicional->value = $items[11];
			$detallesAdicionales_detAdicional->appendChild($valor_detAdicional);
		}
	}
	
	
	$detalle_impuestos = $contenedor->createElement("impuestos");
	$detalles_detalle->appendChild($detalle_impuestos);
	
	if($items[17]>0) {
		$impuestos_impuesto = $contenedor->createElement("impuesto");
		$detalle_impuestos->appendChild($impuestos_impuesto);
		
		$impuesto_codigo = $contenedor->createElement("codigo");
		$impuesto_codigo->nodeValue = $items[17];
		$impuestos_impuesto->appendChild($impuesto_codigo);	
		
		$impuesto_codigoPorcentaje = $contenedor->createElement("codigoPorcentaje");
		$impuesto_codigoPorcentaje->nodeValue = $items[18];
		$impuestos_impuesto->appendChild($impuesto_codigoPorcentaje);	
	
		$impuesto_tarifa = $contenedor->createElement("tarifa");
		$impuesto_tarifa->nodeValue = $items[19];
		$impuestos_impuesto->appendChild($impuesto_tarifa);	
		
		$impuesto_baseImponible = $contenedor->createElement("baseImponible");
		$impuesto_baseImponible->nodeValue = $items[20];
		$impuestos_impuesto->appendChild($impuesto_baseImponible);	
		
		$impuesto_valor = $contenedor->createElement("valor");
		$impuesto_valor->nodeValue = $items[21];
		$impuestos_impuesto->appendChild($impuesto_valor);
		
	}
	
	$impuestos_impuesto = $contenedor->createElement("impuesto");
	$detalle_impuestos->appendChild($impuestos_impuesto);
	
	$impuesto_codigo = $contenedor->createElement("codigo");
	$impuesto_codigo->nodeValue = $items[12];
	$impuestos_impuesto->appendChild($impuesto_codigo);	
	
	$impuesto_codigoPorcentaje = $contenedor->createElement("codigoPorcentaje");
	$impuesto_codigoPorcentaje->nodeValue = $items[13];
	$impuestos_impuesto->appendChild($impuesto_codigoPorcentaje);	

	$impuesto_tarifa = $contenedor->createElement("tarifa");
	$impuesto_tarifa->nodeValue = $items[14];
	$impuestos_impuesto->appendChild($impuesto_tarifa);	
	
	$impuesto_baseImponible = $contenedor->createElement("baseImponible");
	$impuesto_baseImponible->nodeValue = $items[15];
	$impuestos_impuesto->appendChild($impuesto_baseImponible);	
	
	$impuesto_valor = $contenedor->createElement("valor");
	$impuesto_valor->nodeValue = $items[16];
	$impuestos_impuesto->appendChild($impuesto_valor);	
	


}
$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'off';
}
function crear_infoAdicional($contenedor, $documento)
{
$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'on';
  
if(trim($f_campoadicional1 )!="" || trim($f_campoadicional2 )!="" || trim($f_campoadicional3 )!="" || trim($f_campoadicional4 )!="" || trim($f_campoadicional5 )!="" || trim($f_campoadicional6 )!="" || trim($f_campoadicional7 )!="" || trim($f_campoadicional8 )!="" || trim($f_campoadicional9 )!="" || trim($f_campoadicional10 )!="" || trim($f_campoadicional11 )!="" || trim($f_campoadicional12 )!="" || trim($f_campoadicional13 )!="" || trim($f_campoadicional14 )!="" || trim($f_campoadicional15 )!="") {

	$infoAdicional = $contenedor->createElement("infoAdicional");
	$documento->appendChild($infoAdicional);
	
	if(trim($f_campoadicional1 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $f_valoradicional1 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $f_campoadicional1 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	if(trim($f_campoadicional2 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $f_valoradicional2 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $f_campoadicional2 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}

	if(trim($f_campoadicional3 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $f_valoradicional3 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $f_campoadicional3 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}

	if(trim($f_campoadicional4 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $f_valoradicional4 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $f_campoadicional4 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	if(trim($f_campoadicional5 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $f_valoradicional5 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $f_campoadicional5 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	if(trim($f_campoadicional6 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $f_valoradicional6 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $f_campoadicional6 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	if(trim($f_campoadicional7 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $f_valoradicional7 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $f_campoadicional7 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	if(trim($f_campoadicional8 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $f_valoradicional8 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $f_campoadicional8 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	if(trim($f_campoadicional9 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $f_valoradicional9 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $f_campoadicional9 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	if(trim($f_campoadicional10 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $f_valoradicional10 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $f_campoadicional10 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	if(trim($f_campoadicional11 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $f_valoradicional11 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $f_campoadicional11 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	if(trim($f_campoadicional12 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $f_valoradicional12 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $f_campoadicional12 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	if(trim($f_campoadicional13 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $f_valoradicional13 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $f_campoadicional13 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	if(trim($f_campoadicional14 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $f_valoradicional14 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $f_campoadicional14 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	if(trim($f_campoadicional15 )!="") {
		$infoAdicional_campoAdicional = $contenedor->createElement("campoAdicional");
		$infoAdicional_campoAdicional->nodeValue = $f_valoradicional15 ;
		$infoAdicional->appendChild($infoAdicional_campoAdicional);	
		
		$nombre_campoAdicional = $contenedor->createAttribute("nombre");
		$nombre_campoAdicional->value = $f_campoadicional15 ;
		$infoAdicional_campoAdicional->appendChild($nombre_campoAdicional);		
	}
	
	
}



$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'off';
}
function crear_infoFactura($contenedor, $documento)
{
$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'on';
  
$infofact = $contenedor->createElement("infoFactura");
$documento->appendChild($infofact);

$infofact_fechaEmision = $contenedor->createElement("fechaEmision");
$infofact_fechaEmision->nodeValue = $f_fechaemision ;
$infofact->appendChild($infofact_fechaEmision);

$infofact_dirEstablecimiento = $contenedor->createElement("dirEstablecimiento");
$infofact_dirEstablecimiento->nodeValue = $f_direstablecimiento ;
$infofact->appendChild($infofact_dirEstablecimiento);

if(trim($f_numcontribuyenteespecial )!='' && $f_numcontribuyenteespecial !=0) {
	$infofact_contribuyenteEspecial = $contenedor->createElement("contribuyenteEspecial");
	$infofact_contribuyenteEspecial->nodeValue = $f_numcontribuyenteespecial ;
	$infofact->appendChild($infofact_contribuyenteEspecial);
}

$infofact_obligadoContabilidad = $contenedor->createElement("obligadoContabilidad");
$infofact_obligadoContabilidad->nodeValue = $f_obligadocontabilidad ;
$infofact->appendChild($infofact_obligadoContabilidad);
	
$infofact_tipoidComprador = $contenedor->createElement("tipoIdentificacionComprador");
$infofact_tipoidComprador->nodeValue = $f_tipoidentcomprador ;
$infofact->appendChild($infofact_tipoidComprador);
	
if(trim($f_guiaremision )!="") {
	$infofact_guiaRemision = $contenedor->createElement("guiaRemision");
	$infofact_guiaRemision->nodeValue = $f_guiaremision ;
	$infofact->appendChild($infofact_guiaRemision);	
}

$infofact_razonSocialComprador = $contenedor->createElement("razonSocialComprador");
$infofact_razonSocialComprador->nodeValue = $f_razonsocialcomprador ;
$infofact->appendChild($infofact_razonSocialComprador);

$infofact_idComprador = $contenedor->createElement("identificacionComprador");
$infofact_idComprador->nodeValue = $f_idcomprador ;
$infofact->appendChild($infofact_idComprador);

$infofact_totalSinImpuestos = $contenedor->createElement("totalSinImpuestos");
$infofact_totalSinImpuestos->nodeValue = $f_totalsinimpuestos ;
$infofact->appendChild($infofact_totalSinImpuestos);

$infofact_totalDescuento = $contenedor->createElement("totalDescuento");
$infofact_totalDescuento->nodeValue = bcdiv($f_totaldescuento , 1, 2);;
$infofact->appendChild($infofact_totalDescuento);


$infofact_totalConImpuestos = $contenedor->createElement("totalConImpuestos");
$infofact->appendChild($infofact_totalConImpuestos);

$check_sql = "SELECT CODIMPICE, CODPORCENICE, PORCENICE, SUM(BASEICE),  SUM(VALORICE)
  FROM DETALLE_FACTURA
   WHERE CODIMPICE > 0 AND ESTAB =".$f_estab ." AND PTOEMI=".$f_ptoemi ." AND SECUENCIAL=".$f_secuencial ." AND LOTE='".$f_lote ."'
GROUP BY  CODIMPICE, CODPORCENICE, PORCENICE";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 
;

foreach($rs  as $impice) {
	$totalConImpuestos_totalImpuestoIce = $contenedor->createElement("totalImpuesto");
	$infofact_totalConImpuestos->appendChild($totalConImpuestos_totalImpuestoIce);
	
	$codigoImpuesto = $contenedor->createElement("codigo");
	$codigoImpuesto->nodeValue = 3;
	$totalConImpuestos_totalImpuestoIce->appendChild($codigoImpuesto);
	
	$codigoPorcentaje = $contenedor->createElement("codigoPorcentaje");
	$codigoPorcentaje->nodeValue = $impice[1];
	$totalConImpuestos_totalImpuestoIce->appendChild($codigoPorcentaje);
	
	$baseImponible = $contenedor->createElement("baseImponible");
	$baseImponible->nodeValue = $impice[3];
	$totalConImpuestos_totalImpuestoIce->appendChild($baseImponible);
	
	$valor = $contenedor->createElement("valor");
	$valor->nodeValue = $impice[4];
	$totalConImpuestos_totalImpuestoIce->appendChild($valor);	
}

if($f_base_0 >0) {
	$totalConImpuestos_totalImpuestoIva0 = $contenedor->createElement("totalImpuesto");
	$infofact_totalConImpuestos->appendChild($totalConImpuestos_totalImpuestoIva0);
	
	$codigoImpuesto = $contenedor->createElement("codigo");
	$codigoImpuesto->nodeValue = 2;
	$totalConImpuestos_totalImpuestoIva0->appendChild($codigoImpuesto);
	
	$codigoPorcentaje = $contenedor->createElement("codigoPorcentaje");
	$codigoPorcentaje->nodeValue = 0;
	$totalConImpuestos_totalImpuestoIva0->appendChild($codigoPorcentaje);
	
	$baseImponible = $contenedor->createElement("baseImponible");
	$baseImponible->nodeValue = $f_base_0 ;
	$totalConImpuestos_totalImpuestoIva0->appendChild($baseImponible);
	
	$valor = $contenedor->createElement("valor");
	$valor->nodeValue = 0;
	$totalConImpuestos_totalImpuestoIva0->appendChild($valor);
}

if($f_base_12 >0) {
	$totalConImpuestos_totalImpuestoIva12 = $contenedor->createElement("totalImpuesto");
	$infofact_totalConImpuestos->appendChild($totalConImpuestos_totalImpuestoIva12);
	
	$codigoImpuesto = $contenedor->createElement("codigo");
	$codigoImpuesto->nodeValue = 2;
	$totalConImpuestos_totalImpuestoIva12->appendChild($codigoImpuesto);
	
	$codigoPorcentaje = $contenedor->createElement("codigoPorcentaje");
	$codigoPorcentaje->nodeValue = $f_codporcentajeimpuesto ;
	$totalConImpuestos_totalImpuestoIva12->appendChild($codigoPorcentaje);
	
	$baseImponible = $contenedor->createElement("baseImponible");
	$baseImponible->nodeValue = $f_base_12 ;
	$totalConImpuestos_totalImpuestoIva12->appendChild($baseImponible);
	
	$valor = $contenedor->createElement("valor");
	$valor->nodeValue = $f_valor1 ;
	$totalConImpuestos_totalImpuestoIva12->appendChild($valor);
}	

$infofact_propina = $contenedor->createElement("propina");
$infofact_propina->nodeValue = $f_propina ;
$infofact->appendChild($infofact_propina);

$infofact_importeTotal = $contenedor->createElement("importeTotal");
$infofact_importeTotal->nodeValue = $f_importetotal ;
$infofact->appendChild($infofact_importeTotal);

$infofact_moneda = $contenedor->createElement("moneda");
$infofact_moneda->nodeValue = $f_moneda ;
$infofact->appendChild($infofact_moneda);

$infofact_pagos = $contenedor->createElement("pagos");
$infofact->appendChild($infofact_pagos);


$check_sql = "SELECT NUMPAGOS, FORMAPAGO1, VALORTOT1, PLAZO1, UNIDADTIEMPO1, FORMAPAGO2, VALORTOT2, PLAZO2, UNIDADTIEMPO2"
   . " FROM FACTURA"
    . " WHERE ESTAB = " .$f_estab . " AND PTOEMI = ".$f_ptoemi ." AND SECUENCIAL = ".$f_secuencial ." AND LOTE = '".$f_lote ."'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 
;

$numpagos = $rs[0][0];
	
$pagos_pago1 = $contenedor->createElement("pago");
$infofact_pagos->appendChild($pagos_pago1);
	
$pago1_forma = $contenedor->createElement("formaPago");
$pago1_forma->nodeValue = str_pad($rs[0][1], 2, "0", STR_PAD_LEFT);
$pagos_pago1->appendChild($pago1_forma);

$pago1_total = $contenedor->createElement("total");
$pago1_total->nodeValue = $rs[0][2];
$pagos_pago1->appendChild($pago1_total);

$pago1_plazo = $contenedor->createElement("plazo");
$pago1_plazo->nodeValue = $rs[0][3];
$pagos_pago1->appendChild($pago1_plazo);

$pago1_unitiempo = $contenedor->createElement("unidadTiempo");
$pago1_unitiempo->nodeValue = $rs[0][4];
$pagos_pago1->appendChild($pago1_unitiempo);
	
if($numpagos==2) {

	$pagos_pago2 = $contenedor->createElement("pago");
	$infofact_pagos->appendChild($pagos_pago2);
		
	$pago2_forma = $contenedor->createElement("formaPago");
	$pago2_forma->nodeValue = str_pad($rs[0][5], 2, "0", STR_PAD_LEFT);
	$pagos_pago2->appendChild($pago2_forma);
	
	$pago2_total = $contenedor->createElement("total");
	$pago2_total->nodeValue = $rs[0][6];
	$pagos_pago2->appendChild($pago2_total);
	
	$pago2_plazo = $contenedor->createElement("plazo");
	$pago2_plazo->nodeValue = $rs[0][7];
	$pagos_pago2->appendChild($pago2_plazo);
	
	$pago2_unitiempo = $contenedor->createElement("unidadTiempo");
	$pago2_unitiempo->nodeValue = $rs[0][8];
	$pagos_pago2->appendChild($pago2_unitiempo);
	
	
}
$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'off';
}
function crear_infoTributaria($contenedor, $documento, $ambiente, $tipoEmision, $tipoComprobante, $factura)
{
$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'on';
  

$infotrib = $contenedor->createElement("infoTributaria");
$documento->appendChild($infotrib);

$infotrib_ambiente = $contenedor->createElement("ambiente");
$infotrib_ambiente->nodeValue = $ambiente;
$infotrib->appendChild($infotrib_ambiente);

$infotrib_tipoEmision = $contenedor->createElement("tipoEmision");
$infotrib_tipoEmision->nodeValue = $tipoEmision;
$infotrib->appendChild($infotrib_tipoEmision);

$infotrib_razonSocial = $contenedor->createElement("razonSocial");
$infotrib_razonSocial->nodeValue = $f_razonsocial ;
$infotrib->appendChild($infotrib_razonSocial);
	
$infotrib_nombreComercial = $contenedor->createElement("nombreComercial");
$infotrib_nombreComercial->nodeValue = $f_nombrecomercial ;
$infotrib->appendChild($infotrib_nombreComercial);
	
$infotrib_ruc = $contenedor->createElement("ruc");
$infotrib_ruc->nodeValue = $f_ruc ;
$infotrib->appendChild($infotrib_ruc);	
	
$fecha_emision=$f_fechaemision ;

list($dia, $mes, $ano) = explode("/", $fecha_emision);

list($establecimiento, $ptoEmision, $secuencial) = explode("-", $factura);

$serie=$establecimiento."".$ptoEmision;

$codigo_numerico=$this->generar_codigo_numerico($fecha_emision); 
	
$clave_acceso_sdv=$dia."".$mes."".$ano."".$tipoComprobante."".$f_ruc ."".$ambiente."".$serie."".$secuencial."".$codigo_numerico."".$tipoEmision;

$digito_verificador=$this->modulo11($clave_acceso_sdv);

$clave_acceso=$clave_acceso_sdv."".$digito_verificador;

$infotrib_claveAcceso = $contenedor->createElement("claveAcceso");
$infotrib_claveAcceso->nodeValue = $clave_acceso;
$infotrib->appendChild($infotrib_claveAcceso);

$update_table  = 'FACTURA_FLAGS';      
$update_where  = " ESTAB = ".$f_estab ." AND PTOEMI = ".$f_ptoemi ." AND SECUENCIAL = ".$f_secuencial ." AND LOTE = '".$f_lote ."'"; 
$update_fields = array(   
     "CLAVE_ACCESO = '".$clave_acceso."'"
 );
$update_sql = 'UPDATE ' . $update_table
    . ' SET '   . implode(', ', $update_fields)
    . ' WHERE ' . $update_where;

     $nm_select = $update_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

$infotrib_codDoc = $contenedor->createElement("codDoc");
$infotrib_codDoc->nodeValue = $tipoComprobante;
$infotrib->appendChild($infotrib_codDoc);

$infotrib_estab = $contenedor->createElement("estab");
$infotrib_estab->nodeValue = $establecimiento;
$infotrib->appendChild($infotrib_estab);

$infotrib_ptoEmi = $contenedor->createElement("ptoEmi");
$infotrib_ptoEmi->nodeValue = $ptoEmision;
$infotrib->appendChild($infotrib_ptoEmi);

$infotrib_secuencial = $contenedor->createElement("secuencial");
$infotrib_secuencial->nodeValue = $secuencial;
$infotrib->appendChild($infotrib_secuencial);

$infotrib_dirMatriz = $contenedor->createElement("dirMatriz");
$infotrib_dirMatriz->nodeValue = $f_dirmatriz ;
$infotrib->appendChild($infotrib_dirMatriz);
$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'off';
}
function generar_codigo_numerico($fecha_emision)
{
$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'on';
  
$d1dia = substr($fecha_emision,0,1);
$d2dia = substr($fecha_emision,1,1);
$d1mes = substr($fecha_emision,3,1);
$d2mes = substr($fecha_emision,4,1);
$d1ano = substr($fecha_emision,6,1);
$d2ano = substr($fecha_emision,7,1);
$d3ano = substr($fecha_emision,8,1);
$d4ano = substr($fecha_emision,9,1);
	
$d1cn = 0;
$d2cn = 0;
$d3cn = 0;
$d4cn = 0;
$d5cn = 0;
$d6cn = 0;
$d7cn = 0;
$d8cn = 0;

if($d1dia!=9)
	$d1cn=$d1dia+1;
if($d2dia!=9)
	$d2cn=$d2dia+1;
if($d1mes!=9)
	$d3cn=$d1mes+1;
if($d2mes!=9)
	$d4cn=$d2mes+1;
if($d1ano!=9)
	$d5cn=$d1ano+1;
if($d2ano!=9)
	$d6cn=$d2ano+1;
if($d3ano!=9)
	$d7cn=$d3ano+1;
if($d4ano!=9)
	$d8cn=$d4ano+1;

return $d1cn."".$d2cn."".$d3cn."".$d4cn."".$d5cn."".$d6cn."".$d7cn."".$d8cn;

$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'off';
}
function modulo11($cadena)
{
$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'on';
  
$entrada=str_split(strrev($cadena));

$dividido=array_chunk($entrada,6);

$total=0;
foreach($dividido as $parte) {
	$subtotal=0;
	foreach($parte as $clave=>$valor) {
		$factor=$clave+2;
		$subtotal=$subtotal+($valor*$factor);
	}
	$total=$total+$subtotal;	
}

$modulo=$total%11;

$verificador=11-$modulo;

if($verificador==11)
	$verificador=0;
if($verificador==10)
	$verificador=1;

return $verificador;


$_SESSION['scriptcase']['grid_NUEVAS_FACTURAS']['contr_erro'] = 'off';
}
}

?>
