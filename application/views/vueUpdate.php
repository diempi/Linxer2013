            <?php echo(form_open('site/update',$this->uri->segment(3))); ?>
                 <?php echo(form_label('Modifier le lien','title')); ?>
                 
                  <?php echo(form_input(array(
                                              'name' => 'title',
                                              'id' => 'title',
                                              'value' => $lien->title
                                              ))); ?>
                    <?php echo(form_hidden('id',$lien->id)); ?>
                <?php echo(form_submit('Envoi','Modifier')); ?>  
            <?php echo(form_close()); ?>