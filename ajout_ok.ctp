<!--page d'ajout de confirmation une note -->
<strong><?php echo ("La note a été bien ajoutée pour l'élève");?> </strong>
<?php
echo ("<br>");
echo ("<br>");
echo $this->Html->link('Retour à l\'accueil',array('controller'=>'eleves','action'=>'index','index')); ?>

<h5><strong> 
<?php echo $this->Session->flash() ;?> </strong></h5>
