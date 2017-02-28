<!-- vu pour ajouter un élève-->
<?php
?>
<h4> Remplissez les champs ci dessous pour ajouter un élève </h4>
<?php echo $this->Form->create('Eleve');?>
	<?php echo $this->Form->input('nom',array('label'=>"Nom: "));?>
	<br>
	<?php echo $this->Form->input('prenom',array('label'=>"Prenom: "));?>
	<br>
	<?php echo $this->Form->input('date_naissance',array('label'=>"Date de naissance: ",'type'=>'date','dateFormat'=>'YMD','minYear' => date('Y') - 40));?>
	<br>
<?php echo $this->Form->end("Ajouter");?>
<br>
<br>
<?php echo $this->Html->link('Retour à l\'accueil',array('controller'=>'eleves','action'=>'index','index')); ?>
<h5><strong> 
<?php echo $this->Session->flash() ;?></strong></h5>
