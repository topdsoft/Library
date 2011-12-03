<?php
App::uses('AppModel', 'Model');
/**
 * Author Model
 *
 * @property Title $Title
 */
class Author extends AppModel {

	var $virtualFields=array(
		'name' => 'CONCAT(Author.lastName, ", ", Author.firstName )',
		'titles' => 'select count(*) from authors_titles where authors_titles.author_id=Author.id',
	);
	var $order= "Author.name";
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
		'lastName' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'firstName' => array(
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
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Title' => array(
			'className' => 'Title',
			'joinTable' => 'authors_titles',
			'foreignKey' => 'author_id',
			'associationForeignKey' => 'title_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
/**
 * Used to check for an existing author and of there is one return id if not add new and return id
 * Pre: $lname and $fnake are first and last names to check for
 * Mod: if not found add author
 * Post: return author_id
 */
	public function checkAdd($lName,$fName) {
		$author=$this->find('first',array('conditions'=>array('Author.lastName'=>$lName,'Author.firstName'=>$fName)));
		$id=null;
		if($author) {
			//author found
			$id=$author['Author']['id'];
		} else {
			//add author
			if($this->save(array('id'=>null,'lastName'=>$lName,'firstName'=>$fName))) $id=$this->getInsertId();
		}//endif
		return $id;
	}//end public function checkAdd
}
