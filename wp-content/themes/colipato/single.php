<?php
if (in_category(4)) { // Si el post pertenece a la categoría con id = 1
    include(TEMPLATEPATH . '/single-premios.php');

}else{

	include(TEMPLATEPATH . '/single-ori.php');
}
?>


