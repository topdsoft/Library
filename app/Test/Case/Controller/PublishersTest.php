<?php
/* Publishers Test cases generated on: 2011-11-25 15:17:36 : 1322255856*/
App::uses('Publishers', 'Controller');

/**
 * TestPublishers *
 */
class TestPublishers extends Publishers {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

/**
 * Publishers Test Case
 *
 */
class PublishersTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.author', 'app.title', 'app.publisher', 'app.category', 'app.shelf', 'app.authors_title', 'app.tag', 'app.tags_title');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Publishers = new TestPublishers();
		$this->->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Publishers);

		parent::tearDown();
	}

}
