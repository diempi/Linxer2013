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
                <?php echo(form_submit('Envoi','Ajouter')); ?>  
            <?php echo(form_close()); ?>