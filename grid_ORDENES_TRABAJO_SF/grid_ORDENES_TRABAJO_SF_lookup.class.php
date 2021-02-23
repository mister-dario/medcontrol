<?php
class grid_ORDENES_TRABAJO_SF_lookup
{
//  
   function lookup_facturado(&$facturado) 
   {
      $conteudo = "" ; 
      if ($facturado == "1")
      { 
          $conteudo = "SÍ";
      } 
      if ($facturado == "0")
      { 
          $conteudo = "NO";
      } 
      if (!empty($conteudo)) 
      { 
          $facturado = $conteudo; 
      } 
   }  
}
?>
