<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title><?php echo($titre); ?></title>
        
        <?php echo link_tag('css/style.css'); ?> 
        <?php echo link_tag('css/bootstrap.min.css'); ?>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                        <a href="<?php index_page(); ?>"><h1 class="brand">Linkser</h1></a>
                </div>
              </div>
         </div>
        <div id="main" role="main" class="hero-unit">
                <div id="linksearch">
                        <?php echo(form_open('site/preview')); ?>
                         <?php echo(form_label('Lien a ajouter ','title')); ?>
                          <?php echo(form_input(array(
                                                      'name' => 'title',
                                                      'id' => 'title',
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
                            <li><?php echo($lien->title); ?>  <?php echo(anchor('site/edit_preview/'.$lien->id,'modifier',array('title' => 'Modifier ce lien'))); ?>  - <?php echo(anchor('site/confirm/'.$lien->id,'supprimer',array('title' => 'Supprimer ce lien')) ); ?>  </li>
                    <?php        
                        }
                    ?>
                    
         
                    <?php echo 
            form_open('main/signoff').
            form_submit(array(
                              'value' =>'Se deconnecter',
                              'class','btn'
                             )).
            form_close(); ?>
                </ul>
      </div>
        <!-- Scripts-->
               <script type="text/javascript" src="http://localhost/linkser/jquery.js"></script>
        <script type="text/javascript" src="http://localhost/linkser/script.js"></script> 
    </body>
</html>
