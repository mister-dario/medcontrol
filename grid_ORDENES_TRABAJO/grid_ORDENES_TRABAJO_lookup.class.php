<?php
class grid_ORDENES_TRABAJO_lookup
{
//  
   function lookup_o_facturado(&$o_facturado) 
   {
      $conteudo = "" ; 
      if ($o_facturado == "1")
      { 
          $conteudo = "SÍ";
      } 
      if ($o_facturado == "0")
      { 
          $conteudo = "NO";
      } 
      if (!empty($conteudo)) 
      { 
          $o_facturado = $conteudo; 
      } 
   }  
}
?>
