<?php 
if(!isset($_SESSION['email'])){
?>
			<h1>Me contacter</h1>
				<form action="index.php?page=contact" method="post" id="formcontact">
				    <div>
				        <label for="nom">Nom :</label>
				        <input type="text" id="nom" name="nom" />
				    </div>
				    <div>
				        <label for="courriel">Courriel :</label>
				        <input type="email" id="courriel" name="courriel" />
				    </div>
				    <div>
				        <label for="message">Message :</label>
				        <textarea id="message" name="message"></textarea>
				    </div>
				    
				    <div class="button">
				        <button type="submit" name="btEnvoyer" id="btEnvoyer">Envoyer votre message</button>
				    </div>
				    <?php
if(isset($_POST['btEnvoyer'])){
	
	if(isset($_POST['nom'])){
		
		if(isset($_POST['courriel'])){
			
			if(isset($_POST['message'])){
				
				$mail = 'patou59690@hotmail.fr'; // Déclaration de l'adresse de destination.
				if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui présentent des bogues.
				{
					$passage_ligne = "\r\n";
				}
				else
				{
					$passage_ligne = "\n";
				}
				
				//=====Déclaration des messages au format texte et au format HTML.
				$message_txt = $_POST['message'];
				$message_html = "<html><head></head><body>".$_POST['message']."</body></html>";
				//==========
				 
				
				//=====Création de la boundary.
				$boundary = "-----=".md5(rand());
				$boundary_alt = "-----=".md5(rand());
				//==========
				 
				//=====Définition du sujet.
				$sujet = $_POST['nom']." vous envoi un mail depuis votre site de cour de couture.";
				//=========
				 
				//=====Création du header de l'e-mail.
				$header = "From: \"Site cours de couture\"<".$_POST['courriel'].">".$passage_ligne;
				$header.= "Reply-to: \"Site cours de couture\"<".$_POST['courriel'].">".$passage_ligne;
				$header.= "MIME-Version: 1.0".$passage_ligne;
				$header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
				//==========
				 
				//=====Création du message.
				$message = $passage_ligne."--".$boundary.$passage_ligne;
				$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;
				$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
				//=====Ajout du message au format texte.
				$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
				$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
				$message.= $passage_ligne.$message_txt.$passage_ligne;
				//==========
				 
				$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
				
				//=====Ajout du message au format HTML.
				$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
				$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
				$message.= $passage_ligne.$message_html.$passage_ligne;
				//==========
				 
				//=====On ferme la boundary alternative.
				$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
				//==========
				 
				 
				 
				$message.= $passage_ligne."--".$boundary.$passage_ligne;
				 
				//=====Ajout de la pièce jointe.
				//$message.= "Content-Type: image/jpeg; name=\"image.jpg\"".$passage_ligne;
				//$message.= "Content-Transfer-Encoding: base64".$passage_ligne;
				//$message.= "Content-Disposition: attachment; filename=\"image.jpg\"".$passage_ligne;
				//$message.= $passage_ligne.$attachement.$passage_ligne.$passage_ligne;
				//$message.= $passage_ligne."--".$boundary."--".$passage_ligne; 
				//========== 
				//=====Envoi de l'e-mail.

				mail($mail,$sujet,$message,$header);
				 echo 'message envoyé';
				//==========
			}
			else{echo 'Le champ "Message" n\'est pas remplis, l\'email ne peut être envoyé sans. '; }
		}
		else{echo 'Le champ "Courriel" n\'est pas remplis, l\'email ne peut être envoyé sans. ';}
	}
	else{echo 'Le champ "Nom" n\'est pas remplis, l\'email ne peut être envoyé sans. ';}
}
}
else{ ?>

		<h1>Me contacter</h1>
			<form action="index.php?page=contact" method="post" id="formcontact">
			    <div>
			        <label for="message">Message :</label>
			        <textarea id="message" name="message"></textarea>
			    </div>
			    
			    <div class="button">
			        <button type="submit" name="btEnvoyer" id="btEnvoyer">Envoyer votre message</button>
			    </div>
<?php
	if(isset($_POST['btEnvoyer'])){
		if(isset($_POST['message'])){
			
			$mail = 'benji62750@gmail.com'; // Déclaration de l'adresse de destination.
			if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui présentent des bogues.
			{
				$passage_ligne = "\r\n";
			}
			else
			{
				$passage_ligne = "\n";
			}
			
			//=====Déclaration des messages au format texte et au format HTML.
			$message_txt = $_POST['message'];
			$message_html = "<html><head></head><body>".$_POST['message']."</body></html>";
			//==========
			 
			
			//=====Création de la boundary.
			$boundary = "-----=".md5(rand());
			$boundary_alt = "-----=".md5(rand());
			//==========
			 
			//=====Définition du sujet.
			$sujet = $_SESSION['NomPrenom']." vous envoi un mail depuis votre site de cour de couture.";
			//=========
			 
			//=====Création du header de l'e-mail.
			$header = "From: \"Site cours de couture\"<".$_SESSION['email'].">".$passage_ligne;
			$header.= "Reply-to: \"Site cours de couture\"<".$_SESSION['email'].">".$passage_ligne;
			$header.= "MIME-Version: 1.0".$passage_ligne;
			$header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
			//==========
			 
			//=====Création du message.
			$message = $passage_ligne."--".$boundary.$passage_ligne;
			$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;
			$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
			//=====Ajout du message au format texte.
			$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_txt.$passage_ligne;
			//==========
			 
			$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
			
			//=====Ajout du message au format HTML.
			$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_html.$passage_ligne;
			//==========
			 
			//=====On ferme la boundary alternative.
			$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
			//==========
			 
			 
			 
			$message.= $passage_ligne."--".$boundary.$passage_ligne;
			 
			//=====Ajout de la pièce jointe.
			//$message.= "Content-Type: image/jpeg; name=\"image.jpg\"".$passage_ligne;
			//$message.= "Content-Transfer-Encoding: base64".$passage_ligne;
			//$message.= "Content-Disposition: attachment; filename=\"image.jpg\"".$passage_ligne;
			//$message.= $passage_ligne.$attachement.$passage_ligne.$passage_ligne;
			//$message.= $passage_ligne."--".$boundary."--".$passage_ligne; 
			//========== 
			//=====Envoi de l'e-mail.
	
			mail($mail,$sujet,$message,$header);
			 echo 'message envoyé';
			//==========
		}
		else{echo 'Le champ "Nom" n\'est pas remplis, l\'email ne peut être envoyé sans. ';}
	}	
}
?>
				</form>
				<div id="contact"><p>A l'atelier de couture</p><p>22 rue Lalo</p><p>62750 Loos-en-Gohelle</p><p>Télephone: </p> </div>
			
				<iframe id="carte" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29594.106417123414!2d2.801662084933959!3d50.43536026931677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47dd3a618b90ce9f%3A0x98ffd8f5608ed92b!2s22+Rue+Lalo%2C+62750+Loos-en-Gohelle!5e0!3m2!1sfr!2sfr!4v1454296788119" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
