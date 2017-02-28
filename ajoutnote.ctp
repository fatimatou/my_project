<!--vu de l'ajout de note-->
<?php
?>
<h4> Merci de renseigner les champs ci - dessous </h4>
<?php echo $this->Form->create('Note');?>
	<br>
	<?php echo $this->Form->input('nommatiere',array('label'=>"Matière: "));?>
	<br>
	<?php echo $this->Form->input('grade',array('label'=>"Note obtenu: "));?>
	<br>
	<?php echo $this->Form->end("Ajouter une note");?>
<br>
<br>
<?php echo $this->Html->link('Retour à l\'accueil',array('controller'=>'eleves','action'=>'index','index')); ?>
<h5><strong> 
<?php echo $this->Session->flash() ;?></strong></h5>
