<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html"/>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<title>Contact | Développeur Java & Youtubeur de 1000 abonnés</title>

	<meta name="description" content="ItsAlexousd | Développeur Java & Youtubeur de 1000 abonnés">

	<meta name="author" content="DraftMan">
	<meta name="copyright" content="ItsAlexousd">

	<link rel="shortcut icon" href="/images/favicon.png" type="image/ico" />

	<meta property="og:title" content="ItsAlexousd | Développeur Java & Youtubeur de 1000 abonnés">
	<meta property="og:type" content="website">
	<meta property="og:description" content="ItsAlexousd | Développeur Java & Youtubeur de 1000 abonnés">
	<meta property="og:locale" content="fr_FR">
	<meta property="og:url" content="https://www.itsalexousd.fr/">
	<meta property="og:site_name" content="ItsAlexousd.fr">
	<meta property="og:image" content="https://www.itsalexousd.fr/images/avatar.jpg">
	<meta property="og:image:secure_url" content="https://www.itsalexousd.fr/images/avatar.jpg">

	<meta name="theme-color" content="#CD6E57">
    <meta name="apple-mobile-web-app-status-bar-style" content="#CD6E57">
    <meta name="msapplication-navbutton-color" content="#CD6E57">

	<meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@ItsAlexousd">
    <meta name="twitter:creator" content="@ItsAlexousd">
    <meta name="twitter:title" content="ItsAlexousd | Développeur Java & Youtubeur de 1000 abonnés">
    <meta name="twitter:description" content="ItsAlexousd | Développeur Java & Youtubeur de 1000 abonnés">
    <meta name="twitter:image:src" content="https://www.itsalexousd.fr/images/avatar.jpg">
    
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body id="page">
<header>
	<div class="infos">
		<div class="content">
			<div class="description">
				<h1 id="subscribers">ItsAlexousd | Développeur Java & Youtubeur de 1000 abonnés</h1>
			</div>
			<div class="social">
				<a href="https://twitter.com/ItsAlexousd" class="icons"><i class="icon-twitter"></i></a>
				<a href="discord" class="icons"><i class="icon-discord"></i></a>
				<a href="#" class="icons fortnite"><i class="icon-fortnite"></i></a>
				<a href="" class="icons"><i class="icon-google-plus"></i></a>
				<a href="https://www.youtube.com/c/ItsAlexousd" class="button"><i class="icon-youtube"></i><span>MA CHAINE</span></a>
			</div>
		</div>
	</div>
	<div class="primairie">
		<div class="content">
			<a class="logo" href="" title="ItsAlexousd"><img alt="ItsAlexousd" src="images/logo.png"></a>
			<div id="mobile-nav-button"></div>
			<nav id="nav">
				<a class="accueil" href="/" title="Accueil">Accueil</a>
				<a class="videos" id="videos-button" href="videos" title="Mes vidéos">Mes Vidéos</a>
				<a class="discord" href="discord" title="Discord">Discord</a>
				<a class="contact active" href="contact" title="Contact">Contact</a>
			</nav>
		</div
	</div>
</header>
<div class="cache"></div>
<section id="path">
	<div class="content">
	<p><a href="/">ItsAlexousd.fr</a> > <span>Social</span> > <span>Contact</span></p>
	<a href="/devis">Demander un devis</a>
	</div>
</section>
<section id="corps" class="contact">
	<div class="content">
		<div class="title">
			<h2>M'envoyer un mail</h2>
		</div>
		<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
$mail = new PHPMailer();
if(isset($_POST['message'])) { 
    $email_to       = 'ton adresse';

    $email_from     = $_POST['email'];          // EXPEDITEUR DE L'EMAIL
    $email_object   = $_POST['objet'];          // OBJET DE L'EMAIL
    $email_author   = $_POST['author'];         // AUTEUR DE L'EMAIL
    $email_discord  = $_POST['discord'];        // DISCORD DE L'AUTEUR
    $email_message  = $_POST['message'];        // MESSAGE DU MAIL

    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "adresse email";
    $mail->Password = "password";

    $mail->setFrom($email_from, $email_author);
    $mail->addAddress($email_to);
    $mail->addReplyTo($email_from, $email_author);

    $mail->isHTML(true);
    $mail->Subject = $email_object;
    $mail->Body    = '<html>
                        <body>
                            <table style="width:100%;">
                                <tr>
                                    <td colspan="2">
                                        Vous avez reçu un message le ' . date( 'd/m/Y' ) . ' à  ' . date( 'H:i:s' ) . '<br>
                                        <hr>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">' . nl2br( $_POST['message'] ) . '</td><br>
                                </tr>
                                <tr>
                                    <td colspan="2">Mail : ' . nl2br( $_POST['email'] ) . '</td>
                                </tr><br>
                                <tr>
                                    <td colspan="2" class="discord">Discord : ' . nl2br( $_POST['discord'] ) . '.</td>
                                </tr><br>
                                <tr>
                                    <td colspan="2">Cordialement ' . nl2br( $_POST['author'] ) . '.</td>
                                </tr>
                            </table>
                        </body>
                        </html>';
    $mail->AltBody = 'Un mail provenant de itsalexousd.fr';

    if (!$mail->send()) {
        $msg = '<div class="error-card">Désolé, quelque chose c\'est mal passé. Veuillez réessayer plus tard.\n'.$mail->ErrorInfo.'</div>';
    } else {
        $msg = '<div class="success-card">Message Envoyé! Merci de nous avoir contacté.</div>';
    }
}
?>
		<form method="POST" name="form" enctype="multipart/form-data">
            
            <input maxlength="50" name="author" type="text" placeholder="Votre nom" required/>

            <input maxlength="50" name="objet" type="text" placeholder="Votre objet" required/>

            <input maxlength="50" name="email" type="email" placeholder="Votre adresse mail" required/>

            <input type="text" maxlength="50" name="discord" placeholder="Votre pseudo discord"/>

            <textarea name="message" placeholder="Message" rows="4" class="message" required></textarea>
            
            <input data-role="submit" type="submit" value="Envoyer" />
        </form>
	</div>
</section>
<div class="cache"></div>
	<section id="partenaires">
		<div class="title">
			<h4>Partenaires</h4>
		</div>
		<div class="content">
			<a href="https://www.youtube.com/channel/UCFfJNxWTuD8UCnG5JNSiqkw" class="image">
			<img src="/images/grimille.png" alt="Grimille Logo">
			</a>
			<a href="https://www.youtube.com/user/Gravenilvectuto" class="image">
				<img src="/images/graven.png" alt="Graven Logo">
			</a>
			<a href="https://www.draftman.fr" class="image">
				<img src="/images/draftman.png" alt="DraftMan Logo">
			</a>
		</div>
	</section>
	<footer>
		<div class="content">
			<div class="image">
				<img src="images/favicon.png" alt="Logo ItsAlexousd">
			</div>
			<div>
				<h4>Navigation</h4>
				<a href="/" title="Accueil">Accueil</a>
				<a href="/videos" title="Mes vidéos">Mes vidéos</a>
				<a href="/discord" title="Discord">Discord</a>
				<a href="/contact" title="Contact">Contact</a>
			</div>
			<div>
				<h4>Social</h4>
				<a href="/contact" title="Contact">Contact</a>
				<a href="/discord" target="blank">Discord</a>
				<a href="https://twitter.com/ItsAlexousd" target="blank">Twitter</a>
				<a href="#" class="fortnite">Fortnite</a>
			</div>
			<div>
				<h4>Amis</h4>
				<a href="https://www.draftman.fr" target="blank">DraftMan</a>
				<a href="https://www.pelt10.fr" target="blank">Pelt10</a>
				<a href="https://www.youtube.com/user/Gravenilvectuto" target="blank">Gavenilvec</a>
				<a href="https://www.youtube.com/channel/UCFfJNxWTuD8UCnG5JNSiqkw" target="blank">Grimile</a>
			</div>
		</div>
		<div id="copyright">
			<section>Copyright 2018 &copy; - All rights reserved</section><span class="sep"> - </span><section>Développé avec <span class="coeur">❤</span> par DraftMan</section>
		</div>
	</footer>
	<div id="fortnite-modal">
	  <div class="modal-content">
	    <div class="modal-header">
	      <span class="close">&times;</span>
	      <h2><i class="icon-fortnite"></i> Fortnite</h2>
	    </div>
	    <div class="modal-body">
	      <p>Ajoute moi sur fortnite !</p>
	      <p>Voici mon pseudo : <span class="name">ISTALEXOUSD</span></p>
	    </div>
	  </div>
	</div>
	<script src="/js/moment.js"></script>
	<script src="/js/app.js"></script>
</body>
</html>