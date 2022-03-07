<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=portfolio;charset=utf8','root','');
    } catch(Exception $e) {
        die('Erreur :' .$e->getMessage());
    }

    require_once('months.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi">
    <title>Portfolio Joachim</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <div id="bureau">
        <div id="tapis">
            <div id="couv_presentation">
                <div class="double_page">
                    <div class="page_left" id="presentation_left">
                        <h1>Joachim
                        Bernard-Lambert</h1>
                        <h2>Développeur informatique</h2>
                        <ul>
                            <li>18 ans</li>
                            <li>Brest, Bretagne, France</li>
                            <li>Ploërmel, Brxxxetagne, France</li>
                        </ul>
                    </div>
                    <div class="page_right" id="presentation_right">
                        <div id="cadre_photo">  
                            <div class="trombone" id="tromb_pres">
                                <img src="img/trombone.png" alt="Image de trombone">
                            </div>
                            
                            <div id="photo_presentation">
                                <img src="img/image-cv.jpg" alt="Photo de Joachim">
                            </div>
                        </div>
                        <div id="reseaux_container">
                            <a href="https://www.linkedin.com/in/joachim-bernard-lambert01/" target="_blank" title="Ma page Linkedin"><img src="img/logo linkedin.png" alt="Logo Linkedin"></a>
                            <a href="https://github.com/Joachim-B" target="_blank"><img src="img/logo github.png" alt="Logo Github" title="Mon compte Github"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="cv">
            <a href="https://cv-joachim-bernard-lambert.joachim-b.repl.co/" target="_blank" id="pdf apercu" title="Ouvrir mon CV dans un nouvel onglet"><img src="img/apercu-cv.jpg" alt="aperçu CV"></a>
        </div>

        <div id="couv_reals">
            <div id="reals_fermé">
                <h1>Mes réalisations</h1>
            </div>

            <?php
                $s = "SELECT `id`,`name`,`description`,`more_info`,`image`,`link`,`github`,`date`,(SELECT LEFT(date,2)) as day,(SELECT SUBSTRING(date,4,2)) as month,(SELECT RIGHT(date,4)) as year,(SELECT CONCAT(year,month,day)) as concatDate FROM `projet` ORDER BY concatDate desc;";
                $resultat = $db->query($s);

                while($enregistrement = $resultat->fetch()) {

                    $id=$enregistrement[0];
                    $name=$enregistrement[1];
                    $description=$enregistrement[2];
                    $more_info=$enregistrement[3];
                    $image=$enregistrement[4];
                    $link=$enregistrement[5];
                    $github=$enregistrement[6];
                    $date=$enregistrement[7];
                    $month = $enregistrement[9];
                    $year = $enregistrement[10];

                    $month_uppercase = ucfirst($month_list[$month-1]);

                    $s = "SELECT `id_projet`,`outil` FROM `competences_projet` WHERE `id_projet` = $id";
                    $array_outil = $db->query($s);

                    $liste_outils = array();

                    echo
                    "<div class='double_page'>
                    <div class='page_left reals_left'>
                        <div class='description_real'>
                            <div class='outils_projet'>";

                            while($query2 = $array_outil->fetch()) {
                                $outil = $query2[1];
                                echo "<span>$outil</span>";
                            }

                            echo "</div>
                            <p>Langages utilisés</p>
                            <div class='container_resume'>
                                <div>
                                    $description
                                </div>
                                <a href='$more_info' target='_blank'>Plus d'infos...</a>
                            </div>
                        </div>
                        <div class='container_left_arrow_page'>
                            <div></div>
                        </div>
                    </div>
                    <div class='page_right reals_right'>
                        <div class='contenu_right'>
                            <h1>$name</h1>
                            <p class='date_projet'>$month_uppercase $year</p>
                            <div class='apercu_projet'>
                                <img src='img/$image' alt='aperçu projet' class='img_reals'>
                                <div class='img_links'>
                                    <a href='$github' target='_blank' title='Ouvrir le projet Github'><img src='img/github.svg'/></a>
                                    <a href='$link' target='_blank' title='Ouvrir le projet dans un nouvel onglet'><img src='img/external-link.svg'/></a>
                                </div>
                            </div>
                        </div>
                        <div class='container_right_arrow_page'>
                            <div></div>
                        </div>
                    </div>
                </div>";
                }
            ?>

        </div>

        <div id="contact">
            <h1>Me contacter</h1>
            <form action="sendMessage.php" method="POST">
                <div id="nom_prenom">
                    <div>
                        <p>Nom :</p>
                        <input type="text" name="nom" placeholder="Nom" required class="contact_form" />
                    </div>
                    <div>
                        <p>Prénom :</p>
                        <input type="text" name="prenom" placeholder="Prénom" required class="contact_form"/>
                    </div>
                </div>

                <p>Email :</p>
                <input type="email" name="email" placeholder="E-Mail" required class="contact_form"/>
                <p>Votre message :</p>
                <div id="message_submit">
                    <textarea name="message" placeholder="Entrez votre message..." rows="15" cols="50" required class="contact_form"></textarea>
                    <input type="submit" name="submit" id="contact_submit" value="Envoyer" class="contact_form"/>
                </div>
            </form>
        </div>


        <div id="bouton_pres" class="bouton_onglets">
            <h1>Présentation</h1>
        </div>
        <div id="bouton_cv" class="bouton_onglets">
            <h1>Mon CV</h1>
        </div>
        <div id="bouton_contact" class="bouton_onglets">
            <h1>Contact</h1>
        </div>

    </div>
    <div id="bouton_go_nav">
        <span>Voir mon travail</span>
        <div class="fleche_go_nav">
        </div>
    </div>
</body>
</html>