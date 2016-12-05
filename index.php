<?php
require_once 'haut.php';
?>
<section>
<?php		
//si une page est appeler via un lien
if(isset($_GET['page'])){
	$page=''.$_GET['page'].'.php';
}
else{//si aucune page n'est appeler via un lien on affiche le menu utilisateur
	$page='accueil.php';
}

//si la page existe
if(file_exists($page)){
	require_once $page;
}
else{//si elle n'existe pas
	echo 'Page introuvable';
}
?>
</section>
<?php
require_once 'bas.php';
?>		