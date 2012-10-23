<!DOCTYPE HTML>
<html lang="fr">
    
    <head>
        <meta charset="utf-8">
        <title><?php echo($titre); ?></title>
        
        <?php echo link_tag('css/style.css'); ?> 
    </head>
    <body>
        
        <div id="linksearch">
                <?php echo(form_open('site/preview')); ?>
                 <?php echo(form_label('Lien a ajouter ','title')); ?>
                  <?php echo(form_input(array(
                                              'name' => 'url',
                                              'id' => 'url',
                                              'value' => '',
                                              'placeholder' => 'Entrez une URL'
                                              ))); ?>
                <?php echo(form_submit('Envoi','OK')); ?>
            
            <?php echo(form_close()); ?>
            <div id="resultbox">
                <div id="sitesearch"></div>
	    </div>
           <hr />
        </div>
        <h1>Liste des liens</h1>
        <ul>
            <?php
                foreach($liens as $lien)
                {
            ?>
                    <li><?php echo($lien->title); ?> <a href="site/edit" title="Modifier">Modifier</a>  <a href="site/delete" class="delete" title="Supprimer">Supprimer</a></li>
            <?php        
                }
            ?>
            
 
            <?php echo 
    form_open('main/signoff').
    form_submit(array(
                      'value' =>'Se deconnecter'
                     )).
    form_close(); ?>
    
            
            
        </ul>
        <!-- Scripts-->
               <script type="text/javascript" src="http://localhost/linkser/jquery.js"></script>
        <script type="text/javascript" src="http://localhost/linkser/script.js"></script> 
    </body>
</html>
