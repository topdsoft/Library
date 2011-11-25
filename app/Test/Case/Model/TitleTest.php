<?php
/* Title Test cases generated on: 2011-11-25 15:16:38 : 1322255798*/
App::uses('Title', 'Model');

/**
 * Title Test Case
 *
 */
class TitleTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.title', 'app.publisher', 'app.category', 'app.shelf', 'app.author', 'app.authors_title', 'app.tag', 'app.tags_title');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Title = ClassRegistry::init('Title');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Title);

		parent::tearDown();
	}

}
