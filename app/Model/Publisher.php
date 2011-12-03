<?php
App::uses('AppModel', 'Model');
/**
 * Publisher Model
 *
 * @property Title $Title
 */
class Publisher extends AppModel {
	var $virtualFields=array(
		'titles' => 'select count(*) from titles as Title where Publisher.id=Title.publisher_id',
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
			'foreignKey' => 'publisher_id',
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
 * Used to check for an existing publisher and of there is one return id if not add new and return id
 * Pre: $name is the name to check for
 * Mod: if not found add publisher
 * Post: return publisher_id
 */
	public function checkAdd($name) {
		$publisher=$this->find('first',array('conditions'=>array('Publisher.name'=>$name)));
		$id=null;
		if($publisher) {
			//publisher found
			$id=$publisher['Publisher']['id'];
		} else {
			//add publisher
			if($this->save(array('id'=>null,'name'=>$name))) $id=$this->getInsertId();
		}//endif
		return $id;
	}//end public function checkAdd

}
