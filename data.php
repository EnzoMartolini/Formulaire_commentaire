<?php
    function create () {
        $file = __DIR__ . '/commentaire.txt';
        //Validation du nom et echappement des données
        if (isset($_POST['nom']) && preg_match('/^[a-zA-Z ]+$/', $_POST['nom'])) 
        {
            $currentName = htmlspecialchars($_POST['nom'], ENT_QUOTES, 'UTF-8');
            $currentData = $currentName . PHP_EOL;
        } 

        //Valideation du mail et echappement des données
        if (isset($_POST['mail']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) 
        {
            $currentMail = htmlspecialchars($_POST['mail'], ENT_QUOTES, 'UTF-8');
            $currentData .= $currentMail. PHP_EOL;
        }  else { $currentData .= PHP_EOL;}

        //Validation du commentaire et echappement des données
        if (isset($_POST['commentaire'])) {
            $currentCommentaire = htmlspecialchars($_POST['commentaire'], ENT_QUOTES, 'UTF-8');
            $currentData .= $currentCommentaire . PHP_EOL;
        }

        if (isset($currentName) && isset($currentCommentaire))
        {
        file_put_contents($file, $currentData, FILE_APPEND);
        }
        header('Location: ' . $_SERVER['PHP_SELF']);
    }

    function affiche_commentaire () {
        $file = __DIR__ .'/commentaire.txt';
        $commentsString = file_get_contents($file);
        $comments = explode(PHP_EOL, $commentsString);

        for ($i = 0; $i <count($comments)-3; $i +=3) {

            // Affichage de chaque commentaire sous forme structurée
            echo "<div class='comment'>";
            
            // Les trois lignes correspondent au nom, mail (facultatif), et commentaire
            echo "<p><strong>Nom:</strong> {$comments[$i]}</p>";

            if (!empty($comments[$i + 1])) {
            echo "<p><strong>Mail:</strong> {$comments[$i + 1]}</p>";
            }

            echo "<p><strong>Commentaire:</strong> {$comments[$i + 2]}</p>";
            

            echo "</div>";
        }
    }

?>