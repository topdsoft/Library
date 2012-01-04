<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';
	
	function beforeSave($options = array()) {
        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        return true;
    }

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'titleLimit' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	function createCSV() {
		/** create SCV file from user data
		$uname is the username used for databse name and directory
		**/
		$titles=ClassRegistry::init('Title')->find('all');
//debug($titles);exit;
		//parse results into arrays more formatted to csv
		$final=array();
		$final[]=array('Title','Author','Added','Year','ISBN','Own','Read','Want','Rating','Publisher','Category','Binding','Series','Shelf','Tags','Notes');
		foreach($titles as $title) {
			//loop for all titles
			$tags='';
			foreach($title['Tag'] as $tag) $tags.='['.$tag['name'].']';
			//condesne
			$final[]=array(
				$title['Title']['name'],
				$title['Title']['author'],
				$title['Title']['created'],
				$title['Title']['year'],
				$title['Title']['isbn'],
				$title['Title']['own'],
				$title['Title']['read'],
				$title['Title']['want'],
				$title['Title']['rating'],
				$title['Publisher']['name'],
				$title['Category']['name'],
				$title['Binding']['name'],
				$title['Series']['name'],
				$title['Shelf']['name'],
				$tags,
				$title['Title']['notes']
			);
		}//endforeach
		$fp= fopen('files/library.csv','w');
		foreach($final as $line) fputcsv($fp,$line);
		fclose($fp);
	}

}
