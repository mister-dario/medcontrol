<?php
class grid_cita_lookup
{
//  
   function lookup_c_agesecuen(&$conteudo , $c_agesecuen) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $c_agesecuen; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($c_agesecuen) === "" || trim($c_agesecuen) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select agenombre from agenda where agesecuen = $c_agesecuen order by agenombre" ; 
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
   function lookup_c_cittipo(&$c_cittipo) 
   {
      $conteudo = "" ; 
      if ($c_cittipo == "D")
      { 
          $conteudo = "DIÁGNOSTICO";
      } 
      if ($c_cittipo == "P")
      { 
          $conteudo = "PROGRAMADO";
      } 
      if ($c_cittipo == "C")
      { 
          $conteudo = "CONTROL";
      } 
      if (!empty($conteudo)) 
      { 
          $c_cittipo = $conteudo; 
      } 
   }  
//  
   function lookup_c_citfactur(&$c_citfactur) 
   {
      $conteudo = "" ; 
      if ($c_citfactur == "0")
      { 
          $conteudo = "NO PROCESADA";
      } 
      if ($c_citfactur == "1")
      { 
          $conteudo = "FACTURADA";
      } 
      if ($c_citfactur == "2")
      { 
          $conteudo = "ORDEN DE TRABAJO";
      } 
      if ($c_citfactur == "3")
      { 
          $conteudo = "CANCELADA POR CLÍNICA";
      } 
      if ($c_citfactur == "4")
      { 
          $conteudo = "CANCELADA POR CLIENTE";
      } 
      if (!empty($conteudo)) 
      { 
          $c_citfactur = $conteudo; 
      } 
   }  
//  
   function lookup_c_prenumero(&$conteudo , $c_prenumero) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $c_prenumero; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($c_prenumero) === "" || trim($c_prenumero) == "&nbsp;" || trim($c_prenumero) === "" || trim($c_prenumero) == "&nbsp;" || trim($c_prenumero) === "" || trim($c_prenumero) == "&nbsp;" || trim($c_prenumero) === "" || trim($c_prenumero) == "&nbsp;" || trim($c_prenumero) === "" || trim($c_prenumero) == "&nbsp;" || trim($c_prenumero) === "" || trim($c_prenumero) == "&nbsp;" || trim($c_prenumero) === "" || trim($c_prenumero) == "&nbsp;" || trim($c_prenumero) === "" || trim($c_prenumero) == "&nbsp;" || trim($c_prenumero) === "" || trim($c_prenumero) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT prenumero + ' - ' + prenombre  FROM presupuesto where prenumero = $c_prenumero order by prenumero, prenombre" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(prenumero,' - ',prenombre)  FROM presupuesto where prenumero = $c_prenumero order by prenumero, prenombre" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT prenumero&' - '&prenombre  FROM presupuesto where prenumero = $c_prenumero order by prenumero, prenombre" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT prenumero||' - '||prenombre  FROM presupuesto where prenumero = $c_prenumero order by prenumero, prenombre" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT convert(char,prenumero) + ' - ' + prenombre  FROM presupuesto where prenumero = $c_prenumero order by prenumero, prenombre" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT char(prenumero)||' - '||prenombre  FROM presupuesto where prenumero = $c_prenumero order by prenumero, prenombre" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT prenumero||' - '||prenombre  FROM presupuesto where prenumero = $c_prenumero order by prenumero, prenombre" ; 
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
}
?>
