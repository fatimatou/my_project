<?php
?>
<!--ma page d'accueil / fichier css style/-->
<h3> Bienvenue sur l'espace Gestion des élèves </h3>
<h5>Les fonctionnalités de l'application:</h5>
<ul>
	<li><?php echo ('Ajouter un(e) élève');?></li>
	<li><?php echo ('Modifier les informations d\'un(e) élève');?></li>
    <li><?php echo ('Ajouter une note à un(e) élève');?></li>
    <li><?php echo ('Supprimer un(e) élève');?></li>
</ul>
<br>
<br>
<br>
<li><?php echo $this->Html->link('Cliquez Ici pour l\'ajout d\'un(e) élève',array('controller'=>'eleves','action'=>'ajouter','ajouter'));?></li>
<h4> <strong>Note: </strong></h4>
<p>Vous pouvez supprimer un (e) élève , ajouter une note ou modifier son profil avec la liste des élèves présents ci dessous </p>
<br>
<h3> Liste des élèves </h3>
<table>
	<tr>
		<th>Id &nbsp;&nbsp;</th>
		<th>Nom &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>Prénom&nbsp;&nbsp;</th>
        <th>Date de naissance &nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th></th>
    </tr>
    <!--pour chaque élève on l'ajoute au tableau-->
    <?php foreach ($eleves as $eleve):?>
    	<tr>
    		<td><?php echo $eleve['Eleve']['id']; ?> </td>
    		<td><?php echo $eleve['Eleve']['nom']; ?> </td>
    		<td><?php echo $eleve['Eleve']['prenom']; ?> </td>
    		<td><?php echo $eleve['Eleve']['date_naissance']; ?> </td>
            <td>
            <?php echo $this->Html->link('Ajouter une note',array('action'=>'ajounote', $eleve['Eleve']['id']));?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
            <td>
            <?php echo $this->Html->link('Modifier profil',array('action'=>'modifier', $eleve['Eleve']['id']));?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
            <td>
            <!-- postLink permet de créer un lien qui utilise du JS  pour supprimer notre élève-->
            <?php echo $this->Form->postLink('Supprimer',
            array('action'=>'supprimer',$eleve['Eleve']['id']),
            array('confirm'=>'Etes vous sur?'));?>
            </td>

    	</tr>
    <?php endforeach ; ?>
    <?php unset($post); ?>

</table>
<br>
<h3> Liste des notes </h3>
<table>
    <tr>
    <th>Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>Matière &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>Note &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>id_Elève &nbsp;&nbsp;</th>
    </tr>
        <!--pour chaque élève on l'ajoute au tableau de notes-->
    <?php foreach ($eleves as $eleve):?>
        <tr>
            <td><?php echo $eleve['Note']['id']; ?> </td>
            <td><?php echo $eleve['Note']['nommatiere']; ?> </td>
            <td><?php echo $eleve['Note']['grade']; ?> </td>
            <td><?php echo $eleve['Note']['eleve_id']; ?> </td>
        </tr>
<?php endforeach ; ?>
</table>
<h5><strong> 
<?php echo $this->Session->flash() ;?> </strong></h5>
