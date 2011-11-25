<?php
/* Author Test cases generated on: 2011-11-25 15:14:24 : 1322255664*/
App::uses('Author', 'Model');

/**
 * Author Test Case
 *
 */
class AuthorTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.author', 'app.title', 'app.authors_title');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Author = ClassRegistry::init('Author');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Author);

		parent::tearDown();
	}

}
