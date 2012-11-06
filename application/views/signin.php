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
  };