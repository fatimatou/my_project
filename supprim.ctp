<!--page d'affichage de supression -->
<strong><?php echo ("L'élève a été bien supprimé");?> </strong>
<?php
echo ("<br>");
echo ("<br>");
echo $this->Html->link('Retour à l\'accueil',array('controller'=>'eleves','action'=>'index','index')); ?>

<h5><strong> 
<?php echo $this->Session->flash() ;?> </strong></h5>
