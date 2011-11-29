<?php
/* Binding Test cases generated on: 2011-11-28 09:53:56 : 1322495636*/
App::uses('Binding', 'Model');

/**
 * Binding Test Case
 *
 */
class BindingTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.binding', 'app.title', 'app.publisher', 'app.category', 'app.shelf', 'app.author', 'app.authors_title', 'app.tag', 'app.tags_title');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Binding = ClassRegistry::init('Binding');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Binding);

		parent::tearDown();
	}

}
