<?php
App::uses('AppModel', 'Model');
/**
 * Series Model
 *
 * @property Title $Title
 */
class Series extends AppModel {
	var $virtualFields=array(
		'titles'=>'select count(*) from titles as Title where Series.id=Title.series_id',
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
			'foreignKey' => 'series_id',
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
 * Used to check for an existing series and of there is one return id if not add new and return id
 * Pre: $name is the name to check for
 * Mod: if not found add series
 * Post: return series_id
 */
	public function checkAdd($name) {
		$series=$this->find('first',array('conditions'=>array('Series.name'=>$name)));
		$id=null;
		if($series) {
			//series found
			$id=$series['Series']['id'];
		} else {
			//add series
			if($this->save(array('id'=>null,'name'=>$name))) $id=$this->getInsertId();
		}//endif
		return $id;
	}//end public function checkAdd

}
