<nav>
	<ul>
		<li><a href="index.php?page=accueil">L'atelier</a></li>
		<li><a href="index.php?page=cours">Les cours</a></li>
		<li><a href="index.php?page=contact">Me contacter</a></li>
		<?php
		if(isset($_SESSION['email']))
		{
			if($_SESSION['email']=='patou59690@hotmail.fr')
			{
		?>
		<li><a href="index.php?page=gestion">Gestion</a></li>
		<?php
			}
		}
		?>
	</ul>
</nav>