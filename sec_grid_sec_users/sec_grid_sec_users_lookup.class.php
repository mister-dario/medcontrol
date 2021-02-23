<?php
class sec_grid_sec_users_lookup
{
//  
   function lookup_active(&$active) 
   {
      $conteudo = "" ; 
      if ($active == "Y")
      { 
          $conteudo = "" . $this->Ini->Nm_lang['lang_opt_yes'] . "";
      } 
      if ($active == "N")
      { 
          $conteudo = "" . $this->Ini->Nm_lang['lang_opt_no'] . "";
      } 
      if (!empty($conteudo)) 
      { 
          $active = $conteudo; 
      } 
   }  
//  
   function lookup_tipo(&$tipo) 
   {
      $conteudo = "" ; 
      if ($tipo == "1")
      { 
          $conteudo = "Administrador";
      } 
      if ($tipo == "2")
      { 
          $conteudo = "Médico";
      } 
      if ($tipo == "3")
      { 
          $conteudo = "Digitador";
      } 
      if ($tipo == "0")
      { 
          $conteudo = "Super Usuario";
      } 
      if (!empty($conteudo)) 
      { 
          $tipo = $conteudo; 
      } 
   }  
//  
   function lookup_priv_admin(&$priv_admin) 
   {
      $conteudo = "" ; 
      if ($priv_admin == "Y")
      { 
          $conteudo = "" . $this->Ini->Nm_lang['lang_opt_yes'] . "";
      } 
      if ($priv_admin == "N")
      { 
          $conteudo = "" . $this->Ini->Nm_lang['lang_opt_no'] . "";
      } 
      if (!empty($conteudo)) 
      { 
          $priv_admin = $conteudo; 
      } 
   }  
}
?>
