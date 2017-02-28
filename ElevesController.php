<?php
	App::uses('Controller', 'Controller');

	// controleur qui contient la gestion des éléves
	class ElevesController extends AppController{
		public $helpers = array('Html','Form','Session');
		public $uses = array('Eleve','Note');
		//public $components = array('Flash');** ne marche pas avec cette version

      // récupère le conten de mes tables note et élèves
		  public function index(){
			 $req= $this->Eleve->find('all',array('recursive'=> 1));
			 //var_dump($req);
		    $this->set('eleves',$this->Eleve->find('all'));
		}
		
		// Recupere les details d'un eleve en fonction de l'id passé en parametre view = view.ctp
        public function view($id = null) {
        	//debug($id);
            if (!$id) {
                throw new NotFoundException(__('Merci de specifier l\'id'));
            }
            $eleve = $this->Eleve->findById($id);
            if (!$eleve) {
                throw new NotFoundException(__('Aucun eleve trouvé'));
            }
            //set permet de transmettre des données (soit du controler à la vue ou soit du controller au model)
            $this->set('eleve', $eleve);
        }

		//fonction d'ajout d'un élève view = ajouter.ctp
		public function ajouter(){
			//debug($this->request->data);
			if($this->request->is('post') && (!empty($this->request->data))){
				$this->Eleve->create();
				$req= $this->Eleve->save($this->request->data);
				if ($req){
					$this->Session->setFlash('Votre ajout a été bien effectué!');
					return $this->redirect(array('action'=>'index'));
				}
				//debug($this->Eleve->validationErrors);
				else {
				$this->Session->setFlash('Problème d\'ajout d\'un élève');
				}
			}
		}
		//fct dde modification d'un champ eleve view =modifier.ctp
		public function modifier($id = null){
			if (!$id) {
            throw new NotFoundException(__('Elève invalide'));
        	}
        	$student = $this->Eleve->findById($id);
      if (!$student) {
        throw new NotFoundException(__('Elève introuvable'));
      }
        if ($this->request->is(array('post', 'put'))) {
        $this->Eleve->id = $id;
          if ($this->Eleve->save($this->request->data)) {
          $this->Session->setFlash('Votre modification a été bien effectué!');
          return $this->redirect(array('action' => 'index'));
          }
          $this->Session->setFlash("Impossible de mettre a jour les informations de l'élève");
        	}

        if (!$this->request->data) {
            $this->request->data = $student;
        }
      }

      	//view=supprim.ctp 
      	public function supprim(){
      		// elle affiche juste le message de suppression de l'élève
      	}
      	public function ajout_ok(){
      		// elle affiche juste le message d'ajout de note d'un élève
      	}
		//fct de supression d'un élève view = supprimer.ctp
		public function supprimer($id){
			//crée une exception si on appelle directement la méthode get
			if ($this->request->is('get')) {
          		throw new MethodNotAllowedException();
        	}

       		if (!$this->Eleve->delete($id)) {
           		$this->Session->setFlash('l\'élève n\'a pas pu être supprimé!');
       		}
       		else {
       			return $this->redirect(array('action' => 'supprim'));
       			$this->Session->setFlash('l\'eleve avec l\'id %s a été ben supprimé',h($id));
       		}
       		//return $this->redirect(array('action' => 'index'));
		}

		//fct d'ajout de notes--utilise la table note
		public function ajounote($id = null){
      // je charge le modèle
			$this->loadModel('Note');
			if (!$id) {
            throw new NotFoundException(__('Il faut spécifier un id'));
        	}
        	$el= $this->Eleve->findById($id);
        		if(!$el){
        			throw new NotFoundException(__('l\'eleve n\'existe pas'));
        		}
        		$this->set('eleve',$el);
            
            // vérification si c'est un formulaire post et qu'il soit pas vide
          		if($this->request->is('post') && (!empty($this->request->data))){
          			
                $this->request->data['Note']['eleve_id']= $id;
          		  $this->Note->create();
        		    //debug($this->request->data);
      				  $req2= $this->Eleve->Note->saveAll($this->request->data);
      				  //debug($req2);
      					if ($req2){
      						return $this->redirect(array('action'=>'ajout_ok'));
      					}
      					else {
      					$this->Session->setFlash('Problème d\'ajout d\'une note à un élève');
      					}
				}
		}
	}

?>
