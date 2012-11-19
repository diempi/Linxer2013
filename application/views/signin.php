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

        <div id="main" role="main" class="hero-unit">
          <?php echo 
              form_open('main/signin').
              form_label('Login','user').
              form_input(array(
                               'name' =>'Login',
                               'id' =>'user',
                               'value' =>''
                               )).
              form_label('Mot de passe','mdp').
              form_password(array(
                               'name' =>'mdp',
                               'id' =>'mdp'
                               )).
              form_label('','').
              form_submit(array(
                                'value' =>'Connexion',
                                'class' => 'btn',
                                'name' => 'Connexion'
                               )).
              form_close();


            if($error)
            {
              ?>
                  <p><?php echo $error; ?></p>
             <?php 
            }; ?> 
      </div>
        <!-- Scripts-->
        <script type="text/javascript" src="http://localhost/linkser/jquery.js"></script>
        <script type="text/javascript" src="http://localhost/linkser/script.js"></script> 
    </body>
</html>