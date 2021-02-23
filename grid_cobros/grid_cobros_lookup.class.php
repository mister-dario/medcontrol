<?php
class grid_cobros_lookup
{
//  
   function lookup_emiruc(&$conteudo , $emiruc) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $emiruc; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      $nm_comando = "select emirazsoc from fac_emisores where emiruc = '" . substr($this->Db->qstr($emiruc), 1 , -1) . "' order by emirazsoc" ; 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[0]))  
          { 
              $conteudo = trim($rx->fields[0]); 
          } 
          $save_conteudo1 = $conteudo ; 
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      if ($conteudo === "") 
      { 
          $conteudo = "&nbsp;";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
//  
   function lookup_fclnumero(&$conteudo , $fclnumero) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $fclnumero; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($fclnumero) === "" || trim($fclnumero) == "&nbsp;" || trim($fclnumero) === "" || trim($fclnumero) == "&nbsp;" || trim($fclnumero) === "" || trim($fclnumero) == "&nbsp;" || trim($fclnumero) === "" || trim($fclnumero) == "&nbsp;" || trim($fclnumero) === "" || trim($fclnumero) == "&nbsp;" || trim($fclnumero) === "" || trim($fclnumero) == "&nbsp;" || trim($fclnumero) === "" || trim($fclnumero) == "&nbsp;" || trim($fclnumero) === "" || trim($fclnumero) == "&nbsp;" || trim($fclnumero) === "" || trim($fclnumero) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT fclapellidos + ' ' + fclnombres  FROM ficha_cliente where fclnumero = $fclnumero order by fclapellidos, fclnombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(fclapellidos,' ',fclnombres)  FROM ficha_cliente where fclnumero = $fclnumero order by fclapellidos, fclnombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT fclapellidos&' '&fclnombres  FROM ficha_cliente where fclnumero = $fclnumero order by fclapellidos, fclnombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT fclapellidos||' '||fclnombres  FROM ficha_cliente where fclnumero = $fclnumero order by fclapellidos, fclnombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT fclapellidos + ' ' + fclnombres  FROM ficha_cliente where fclnumero = $fclnumero order by fclapellidos, fclnombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT fclapellidos||' '||fclnombres  FROM ficha_cliente where fclnumero = $fclnumero order by fclapellidos, fclnombres" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT fclapellidos||' '||fclnombres  FROM ficha_cliente where fclnumero = $fclnumero order by fclapellidos, fclnombres" ; 
      } 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[0]))  
          { 
              $conteudo = trim($rx->fields[0]); 
          } 
          $save_conteudo1 = $conteudo ; 
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      if ($conteudo === "") 
      { 
          $conteudo = "&nbsp;";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
//  
   function lookup_cobanula(&$cobanula) 
   {
      $conteudo = "" ; 
      if ($cobanula == "1")
      { 
          $conteudo = "SÍ";
      } 
      if ($cobanula == "0")
      { 
          $conteudo = "NO";
      } 
      if (!empty($conteudo)) 
      { 
          $cobanula = $conteudo; 
      } 
   }  
}
?>
