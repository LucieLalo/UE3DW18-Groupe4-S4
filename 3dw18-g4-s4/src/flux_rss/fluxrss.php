<?php

    $xml = '<?xml version="1.0" encoding="iso-8859-1"?><rss version="2.0">';
    $xml .= '<channel>'; 
    $xml .= '<title>Titre du channel</title>';
    $xml .= '<link>http://www.monsite.com</link>';
    $xml .= '<description>Description du channel</description>';


   // @mysql_connect($host,$user,$pwd) or die("Connexion impossible");
   /* @mysql_select_db($base) or die("Echec de selection de la base");
    

    $news=mysql_query("SELECT * FROM news ORDER BY date DESC LIMIT, 15");

    while($tab=mysql_fetch_array($news)){   
        $user=$tab[tl_users];
        $lien=$tab[tl_lien];
        $tags=$tab[tl_tags];
        $tags_liens=$tab[tl_tags_liens];

    
        $xml .= '<item>';
        $xml .= '<user>'.$user.'</user>';
        $xml .= '<link>'.$lien.'</link>';
        $xml .= '<tags>'.$tags.'</tags>'; 
        $xml .= '<tags_lien>'.$tags_liens.'</tags_liens>';
        $xml .= '</item>';
        $xml .= '</channel>';
        $xml .= '</rss>';
        
        // écriture dans le fichier
        $fp = fopen("flux.xml", 'w+');
        fputs($fp, $xml);
        fclose($fp);
        @mysql_close();


        function lit_rss($fichier,$objets) {
    
            // on lit tout le fichier
            if($chaine = @implode("",@file($fichier))) {
        
                // on découpe la chaine obtenue en items
                $tmp = preg_split("/<\/?"."item".">/",$chaine);
        
                // pour chaque item
                for($i=1;$i<sizeof($tmp)-1;$i+=2)
        
                    // on lit chaque objet de l'item
                    foreach($objets as $objet) {
        
                        // on découpe la chaine pour obtenir le contenu de l'objet
                        $tmp2 = preg_split("/<\/?".$objet.">/",$tmp[$i]);
        
                        // on ajoute le contenu de l'objet au tableau resultat
                        $resultat[$i-1][] = @$tmp2[1];
                    }
        
                // on retourne le tableau resultat
                return $resultat;
            }
        }


        $rss = lit_rss("flux.xml",array("user","link","tags","tags_liens"));

        foreach($rss as $tab) {
            echo '<div class="news">
                    <div class="news_user">'.$tab[0].'</div>
                    <div class="news_box_liens"> <a href="'.$tab[1].'</a></div>
                    <div class="news_box_tags">'.$tab[2].'</div>
                    <div class="news_box_tags_liens">'.$tab[4].'</div>
                </div>';
        }


*/
?>