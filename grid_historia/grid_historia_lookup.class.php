<?php
class grid_historia_lookup
{
//  
   function lookup_medcodigo(&$conteudo , $medcodigo) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $medcodigo; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($medcodigo) === "" || trim($medcodigo) == "&nbsp;" || trim($medcodigo) === "" || trim($medcodigo) == "&nbsp;" || trim($medcodigo) === "" || trim($medcodigo) == "&nbsp;" || trim($medcodigo) === "" || trim($medcodigo) == "&nbsp;" || trim($medcodigo) === "" || trim($medcodigo) == "&nbsp;" || trim($medcodigo) === "" || trim($medcodigo) == "&nbsp;" || trim($medcodigo) === "" || trim($medcodigo) == "&nbsp;" || trim($medcodigo) === "" || trim($medcodigo) == "&nbsp;" || trim($medcodigo) === "" || trim($medcodigo) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT medapellidos + ' ' + mednombres  FROM medico where medcodigo = $medcodigo order by medapellidos, mednombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(medapellidos,' ',mednombres)  FROM medico where medcodigo = $medcodigo order by medapellidos, mednombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT medapellidos&' '&mednombres  FROM medico where medcodigo = $medcodigo order by medapellidos, mednombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT medapellidos||' '||mednombres  FROM medico where medcodigo = $medcodigo order by medapellidos, mednombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT medapellidos + ' ' + mednombres  FROM medico where medcodigo = $medcodigo order by medapellidos, mednombres" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT medapellidos||' '||mednombres  FROM medico where medcodigo = $medcodigo order by medapellidos, mednombres" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT medapellidos||' '||mednombres  FROM medico where medcodigo = $medcodigo order by medapellidos, mednombres" ; 
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
   function lookup_espcodigo(&$conteudo , $espcodigo) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $espcodigo; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($espcodigo) === "" || trim($espcodigo) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select espnombre from especialidad where espcodigo = $espcodigo order by espnombre" ; 
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
