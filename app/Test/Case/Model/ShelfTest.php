<?php
/* Shelf Test cases generated on: 2011-11-25 15:15:31 : 1322255731*/
App::uses('Shelf', 'Model');

/**
 * Shelf Test Case
 *
 */
class ShelfTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.shelf', 'app.title');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Shelf = ClassRegistry::init('Shelf');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Shelf);

		parent::tearDown();
	}

}
