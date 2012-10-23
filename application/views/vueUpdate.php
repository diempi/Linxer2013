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