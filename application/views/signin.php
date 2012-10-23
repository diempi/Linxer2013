<?php echo 
    form_open('main/signin').
    form_label('user','user').
    form_input(array(
                     'name' =>'Login',
                     'id' =>'user',
                     'value' =>''
                     )).
    form_label('mot de passe','mdp').
    form_password(array(
                     'name' =>'mdp',
                     'id' =>'mdp'
                     )).
    form_submit(array(
                      'value' =>'Connexion'
                     )).
    form_close();


  if($error)
  {
    ?>
        <p><?php echo $error; ?></p>
   <?php 
  };