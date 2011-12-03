<?php
App::uses('AppModel', 'Model');
/**
 * Title Model
 *
 * @property Publisher $Publisher
 * @property Category $Category
 * @property Shelf $Shelf
 * @property Author $Author
 * @property Tag $Tag
 */
class Title extends AppModel {
	var $virtualFields=array(
		'author' => 'select CONCAT(Author.lastName, ", ", Author.firstName) from authors as Author,authors_titles 
			where Author.id=authors_titles.author_id and authors_titles.title_id=Title.id limit 1',
	);
	var $order= "Title.name";

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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Publisher' => array(
			'className' => 'Publisher',
			'foreignKey' => 'publisher_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Binding' => array(
			'className' => 'Binding',
			'foreignKey' => 'binding_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Series' => array(
			'className' => 'Series',
			'foreignKey' => 'series_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Shelf' => array(
			'className' => 'Shelf',
			'foreignKey' => 'shelf_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Author' => array(
			'className' => 'Author',
			'joinTable' => 'authors_titles',
			'foreignKey' => 'title_id',
			'associationForeignKey' => 'author_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Tag' => array(
			'className' => 'Tag',
			'joinTable' => 'tags_titles',
			'foreignKey' => 'title_id',
			'associationForeignKey' => 'tag_id',
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
