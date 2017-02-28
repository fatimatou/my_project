<?php
?>
<!-- vue permettant d'afficher le profil d'un élève en fonction de son id-->

<h4> <?php echo $eleve['Eleve']['nom']." ".$eleve['Eleve']['prenom']; ?> </h4>

<h5> Née le: <?php echo $eleve['Eleve']['date_naissance'];?></h5>

<?php echo $this->Html->link('Ajouter une note',array('controller'=>'eleves','action'=>'ajounote','ajoutnote'));?>

<?php echo $this->Html->link('Retour à l\'accueil',array('controller'=>'eleves','action'=>'index','index')); ?>
