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
                        form_submit(array(
                                          'value' =>'Se deconnecter',
                                          'class','btn'
                                         )).
                        form_close(); ?>
                </div>
              </div>
         </div>
        <div id="main" role="main" class="hero-unit">
            <?php echo(form_open('site/update',$this->uri->segment(3))); ?>
                 <?php echo(form_label('Modifier le lien','url')); ?>
                 
                  <?php echo(form_input(array(
                                              'name' => 'url',
                                              'id' => 'url',
                                              'value' => $lien->url
                                              ))); ?>
                    <?php echo(form_hidden('id',$lien->id)); ?>
                <?php echo(form_submit('Envoi','Modifier')); ?>  
            <?php echo(form_close()); ?>
      </div>
      <footer>
        <p>© DIEMPI YE WE</p>
      </footer>
        <!-- Scripts-->
               <script type="text/javascript" src="http://localhost/linkser/jquery.js"></script>
        <script type="text/javascript" src="http://localhost/linkser/script.js"></script> 
    </body>
</html>
