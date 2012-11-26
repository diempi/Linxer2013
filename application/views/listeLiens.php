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
                        <?php echo 
                        form_open('main/signoff').
                        form_submit(array('Submit'=>'Oui',
                                          'type'=>'Submit',
                                          'value' =>'Se deconnecter',
                                          'type'=>'Submit',
                                          'class','btn'
                                         )).
                        form_close(); ?>
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
              <?php echo(form_submit(array('Submit'=>'Oui',
                                           'type'=>'Submit',
                                           'value'=>'Previsualiser',
                                           'name'=>'Oui',
                                           'class'=>'btn' 
              ))) ;?>
                    
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
                            <li><?php echo($lien->title); ?>  <?php echo(anchor('site/selectOne/'.$lien->id,'modifier',array('title' => 'Modifier ce lien'))); ?>  - <?php echo(anchor('site/confirm/'.$lien->id,'supprimer',array('title' => 'Supprimer ce lien')) ); ?>  </li>
                    <?php        
                        }
                    ?>
                </ul>
      </div>
      
      
      <footer>
        <p>© DIEMPI YE WE</p>
      </footer>
        <!-- Scripts-->
               <script type="text/javascript" src="http://localhost/linkser/jquery.js"></script>
        <script type="text/javascript" src="http://localhost/linkser/script.js"></script> 
    </body>
</html>
