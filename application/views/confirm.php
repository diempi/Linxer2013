<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title><?php echo('Confirmation de suppression'); ?></title>
        
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
            <?php echo(form_open('site/delete',$this->uri->segment(3))); ?>

                  <?php echo('Voulez-vous vraiment supprimer ce lien ?'); ?>
                  <?php echo(form_hidden('id',$this->uri->segment(3))); ?>
              <?php echo(form_submit(array('Submit'=>'Oui',
                                           'type'=>'Submit',
                                           'value'=>'Oui',
                                           'name'=>'Oui',
                                           'class'=>'btn' 
              ))) ;?>
              <a href="<?php echo site_url().'site/index'; ?>" class="btn" title="Annuler"> Non </a>

            <?php echo(form_close()); ?>                
      </div>
        <!-- Scripts-->
        <script type="text/javascript" src="http://localhost/linkser/jquery.js"></script>
        <script type="text/javascript" src="http://localhost/linkser/script.js"></script> 
    </body>
</html>
