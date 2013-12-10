<?php

/**
 * Pinta una opcion de menu
 * @param string $nombre Nombre de la opcion
 * @param string $urlMenu Url de la opcion
 * @param boolean $subMenu Contiene o no un submenu
 * @return string Html de la opcion creada
 */
function pintarMenu( $nombre, $urlMenu, $subMenu = false ){
    $html = '';
    
    // Agregar una division 
    if( $nombre == 'dividir' ){
        return $html .= '<li role="presentation" class="divider"></li>';
    }
    
    if( !is_array($urlMenu) ){
        
        if( !$subMenu ){ 
            $classActive = "class='active'"; 
        }else{
            $classActive = "";
        }
        
        $urlController = base_url()."index.php/$urlMenu";
        $html .= "<li $classActive><a href='#' onclick=\"enviarPeticionAjax('$urlController');\">$nombre</a></li>";
    }else{
        if( $subMenu ){
            $html .= "<li class='dropdown-submenu'>";
        }else{
            $html .= "<li class='dropdown'>";
        }
        
        
        if( $subMenu ){
            $html .= "  <a tabindex='-1' href='#'>$nombre</a>";
        }else{
            $html .= "  <a href='#' class='dropdown-toggle' data-hover='dropdown'>$nombre<b class='caret'></b></a>";
        }
        
        
        $html .= "  <ul class='dropdown-menu'>";
        foreach ($urlMenu as $nombreSub => $urlMenuSub) {
            $html .= pintarMenu($nombreSub, $urlMenuSub, true);
        }
        $html .= "  </ul>";
        $html .= "</li>";
    }
    
    return $html;
}
?>