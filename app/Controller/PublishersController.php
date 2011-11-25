<?php
App::uses('AppController', 'Controller');
/**
 * Publishers Controller
 *
 * @property Publisher $Publisher
 */
class PublishersController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Publisher->recursive = 0;
		$this->set('publishers', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Publisher->id = $id;
		if (!$this->Publisher->exists()) {
			throw new NotFoundException(__('Invalid publisher'));
		}
		$this->set('publisher', $this->Publisher->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Publisher->create();
			if ($this->Publisher->save($this->request->data)) {
				$this->Session->setFlash(__('The publisher has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The publisher could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Publisher->id = $id;
		if (!$this->Publisher->exists()) {
			throw new NotFoundException(__('Invalid publisher'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Publisher->save($this->request->data)) {
				$this->Session->setFlash(__('The publisher has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The publisher could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Publisher->read(null, $id);
		}
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
		$this->Publisher->id = $id;
		if (!$this->Publisher->exists()) {
			throw new NotFoundException(__('Invalid publisher'));
		}
		if ($this->Publisher->delete()) {
			$this->Session->setFlash(__('Publisher deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Publisher was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
