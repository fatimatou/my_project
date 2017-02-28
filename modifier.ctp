<?php
?>
<!-- vue pour la modification d'un profil élève-->
<!-- si le champs id es présent, c'est pour éditer sinon c'est la fontion save qui est appelé-->
<h4> Merci de renseigner les champs à modifier </h4>
<?php echo $this->Form->create('Eleve');?>
	<?php echo $this->Form->input('nom',array('label'=>"Nom: "));?>
	<br>
	<?php echo $this->Form->input('prenom',array('label'=>"Prenom: "));?>
	<br>
	<?php echo $this->Form->input('date_naissance',array('label'=>"Date de naissance: ",'type'=>'date','dateFormat'=>'YMD','minYear' => date('Y') - 40));?>
	<br>
<?php echo $this->Form->end("Modifier");?>
<br>
<br>
<h5><strong> 
<?php echo $this->Session->flash() ;?></strong></h5>
