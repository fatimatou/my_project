<?php
  /** model pour gerer les ajout DE NOTE
  /** une note concerne qu'un seul élève
  * 
  */
  App::uses('AppModel','Model');

  class Note extends AppModel{
  	public $useTable= 'notes';
  	// nom de modèle
  	var $nam= 'Note';
  	// je définis la relations entre les deux tables eleve et note
  	public $belongsTo = array(
  		'Eleve'=> array(
  			'ClassName'=>'Eleve',
  			'foreignKey'=>'eleve_id',
  			)
  		);
  	//rglès de validation des données pour le formulaire ajout
  	public $validate= array(
  		'nommatiere'=>array('rule'=>array('custom', '#([a-zA-Z])+#'),'required'=>true,'allowEmpty'=>false,'message'=>'Merci de remplir les bonnes valeurs pour le champs matière svp!'),
  		'grade'=>array('rule'=>array('custom','#([^\-])#','required'=>true,'allowEmpty'=>false,'message'=>'Veuillez remplir le champs Note svp!')
  			)
  		);

  }
?>
