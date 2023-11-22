<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<?php require 'data.php'; 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        create();
    }
    ?>

<h1>Ajoutez votre commentaire</h1>
    <form action="index.php" method="post">
        <div class="formulaire">
            <ul>
                <li>
                    <label> Votre nom </label>
                    <input name="nom" id="nom" type="text" required/>
                </li>
                <li>
                    <label> Votre mail<i>(facultatif)</i></label>
                    <input name="mail" id="mail" type="email" />
                </li>
                <li>
                    <label> Votre commentaire </label>
                    <textarea name="commentaire" id="commentaire" required></textarea> 
                </li>
            </ul>
        <div class="button">
            <button type="submit">Envoyer</button>
        </div>
    </form>
</div>
<?php   $file = __DIR__ .'/commentaire.txt';
        $commentsString = file_get_contents($file);
        $comments = explode(PHP_EOL, $commentsString);
        $comments = explode(PHP_EOL, $commentsString);
        $totalComments=0;
    
        for ($i = 0; $i <count($comments)-3; $i +=3) {
            $totalComments++;}
        echo '<h2>Tous les commentaires('.$totalComments.')</h2>';
?>


<?php 
    echo('<div id="comment_container">');
    affiche_commentaire();
    echo('</div>');  
?>

</body>
</html>