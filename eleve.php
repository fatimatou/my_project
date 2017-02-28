<?php
  /** model pour gerer les ajout /modif/supression élèves
  * un eleve peut avoir plusieurs notes/chaque matière une note
  */
  App::uses('AppModel','Model');

  class Eleve extends AppModel{	
  	public $useTable= 'eleves';
  	// je définis la relations entre les deux tables eleve et note
  	public $hasOne= array(
  		'Note'=> array(
  			'ClassName'=>'Note',
  			'foreignKey'=>'eleve_id',
  			'dependent'=> true
  			)
  		);

  	//rglès de validation des données pour le formulaire ajout
  	
  	// nom de modèle
  	var $nam= 'Eleve';
  	public $validate= array(
  		'nom'=>array('rule'=>array('custom', '#([a-zA-Z0-1\_\-])+#'),'required'=>true,'allowEmpty'=>false,'message'=>'Veuillez remplir le champs Nom svp!'),
  		'prenom'=>array('rule'=>array('custom', '#([a-zA-Z0-1\_\-])+#'),'required'=>true,'allowEmpty'=>false,'message'=>'Veuillez remplir le champs Prénom svp!'),
  		'date_naissance'=>array('rule'=>array('date'),'required'=>true,'allowEmpty'=>false,'message'=>'Merci de remplir le champs date de naissance!')
      );
  }
?>
