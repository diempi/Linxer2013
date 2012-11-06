<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title><?php echo($titre); ?></title>
        <?php echo link_tag('css/bootstrap.min.css'); ?>        
        <?php echo link_tag('css/style.css'); ?> 
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
            <?php echo(form_open('site/add',$this->uri->segment(3))); ?>
                 <?php echo(form_label('Ajouter le lien','url')); ?>
                 
                  <?php echo(form_input(array(
                                              'name' => 'title',
                                              'id' => 'title',
                                              'value' => $titre
                                              ))); ?>

                  <?php echo(form_textarea(array(
                                              'name' => 'desc',
                                              'id' => 'desc',
                                              'value' => $description
                                              ))); ?>  
                  <?php echo(form_input(array(
                                              'name' => 'link',
                                              'id' => 'link',
                                              'value' => $link
                                              ))); ?>                                                                                                                                         
                    <?php echo(form_hidden('id',$this->uri->segment(3))); ?>
                    <?php 
                      $db_updated = array('title' => $titre,'desc'=> $description, 'link' => $link );
                    ; ?>
                <?php echo(form_submit(array('value'=>'Ajouter',
                                              'class'=>'btn'
                                      ))) ;?>  
            <?php echo(form_close()); ?> 
      </div>
        <!-- Scripts-->
               <script type="text/javascript" src="http://localhost/linkser/jquery.js"></script>
        <script type="text/javascript" src="http://localhost/linkser/script.js"></script> 
    </body>
</html>
