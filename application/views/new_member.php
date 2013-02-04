<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Ajout d'un nouveau membre</title>
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
            <?php echo(form_open('site/add_member',$this->input->post('id'))); ?>
                 <?php echo(form_label('Nom d\'utilisateur: ','username')); ?>
                 
                  <?php echo(form_input(array(
                                              'type' =>'text',
                                              'name' => 'username',
                                              'id' => 'username',
                                              'placeholder' => 'Entrez votre login'
                                              ))); ?>
                 <?php echo(form_label('Mot de passe: ','password')); ?>
                 
                  <?php echo(form_input(array(
                                              'type' => 'password',
                                              'name' => 'password',
                                              'id' => 'password',
                                              'placeholder' => 'Entrez votre mot de passe'
                                              ))); ?>                                       
                  <?php echo(form_label('Email: ','email')); ?>
                 
                  <?php echo(form_input(array(
                                              'type' => 'email',
                                              'name' => 'email',
                                              'id' => 'email',
                                              'placeholder' => 'Entrez votre email'
                                              ))); ?>                                                                                            
                    <?php echo(form_hidden('id',$this->input->post('id'))); ?>
                <?php echo(form_submit(array('value'=>'S\'inscrire',
                                              'class'=>'btn'
                                      ))) ;?>  
            <?php echo(form_close()); ?> 
        <div id="login">
                <a href="main/signin" title="Connectez-vous">Se connecter</a>
        </div>               
      </div>
   
      <footer>
        <p>© DIEMPI YE WE</p>
      </footer>
        <!-- Scripts-->
               <script type="text/javascript" src="http://localhost/linkser/jquery.js"></script>
        <script type="text/javascript" src="http://localhost/linkser/script.js"></script> 
    </body>
</html>
