<?php
App::uses('AppModel', 'Model');
/**
 * Shelf Model
 *
 * @property Title $Title
 */
class Shelf extends AppModel {
	var $virtualFields=array(
		'titles' => 'select count(*) from titles as Title where Shelf.id=Title.shelf_id',
	);

	/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Title' => array(
			'className' => 'Title',
			'foreignKey' => 'shelf_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
/**
 * Used to check for an existing shelf and of there is one return id if not add new and return id
 * Pre: $name is the name to check for
 * Mod: if not found add shelf
 * Post: return shelf_id
 */
	public function checkAdd($name) {
		$shelf=$this->find('first',array('conditions'=>array('Shelf.name'=>$name)));
		$id=null;
		if($category) {
			//shelf found
			$id=$shelf['Shelf']['id'];
		} else {
			//add shelf
			if($this->save(array('id'=>null,'name'=>$name))) $id=$this->getInsertId();
		}//endif
		return $id;
	}//end public function checkAdd

}
