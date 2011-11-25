<?php
App::uses('AppController', 'Controller');
/**
 * Titles Controller
 *
 * @property Title $Title
 */
class TitlesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Title->recursive = 0;
		$this->set('titles', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Title->id = $id;
		if (!$this->Title->exists()) {
			throw new NotFoundException(__('Invalid title'));
		}
		$this->set('title', $this->Title->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Title->create();
			if ($this->Title->save($this->request->data)) {
				$this->Session->setFlash(__('The title has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The title could not be saved. Please, try again.'));
			}
		}
		$publishers = $this->Title->Publisher->find('list');
		$categories = $this->Title->Category->find('list');
		$shelves = $this->Title->Shelf->find('list');
		$authors = $this->Title->Author->find('list');
		$tags = $this->Title->Tag->find('list');
		$this->set(compact('publishers', 'categories', 'shelves', 'authors', 'tags'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Title->id = $id;
		if (!$this->Title->exists()) {
			throw new NotFoundException(__('Invalid title'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Title->save($this->request->data)) {
				$this->Session->setFlash(__('The title has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The title could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Title->read(null, $id);
		}
		$publishers = $this->Title->Publisher->find('list');
		$categories = $this->Title->Category->find('list');
		$shelves = $this->Title->Shelf->find('list');
		$authors = $this->Title->Author->find('list');
		$tags = $this->Title->Tag->find('list');
		$this->set(compact('publishers', 'categories', 'shelves', 'authors', 'tags'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Title->id = $id;
		if (!$this->Title->exists()) {
			throw new NotFoundException(__('Invalid title'));
		}
		if ($this->Title->delete()) {
			$this->Session->setFlash(__('Title deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Title was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
