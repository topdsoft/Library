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
	var $order= "name";
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

}
