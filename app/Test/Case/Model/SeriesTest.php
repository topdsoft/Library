<?php
/* Series Test cases generated on: 2011-11-28 09:54:12 : 1322495652*/
App::uses('Series', 'Model');

/**
 * Series Test Case
 *
 */
class SeriesTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.series', 'app.title', 'app.publisher', 'app.category', 'app.shelf', 'app.author', 'app.authors_title', 'app.tag', 'app.tags_title');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Series = ClassRegistry::init('Series');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Series);

		parent::tearDown();
	}

}
