<?php
/* Publisher Test cases generated on: 2011-11-25 15:15:14 : 1322255714*/
App::uses('Publisher', 'Model');

/**
 * Publisher Test Case
 *
 */
class PublisherTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.publisher', 'app.title');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Publisher = ClassRegistry::init('Publisher');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Publisher);

		parent::tearDown();
	}

}
