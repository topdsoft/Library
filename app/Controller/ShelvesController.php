<?php
App::uses('AppController', 'Controller');
/**
 * Shelves Controller
 *
 * @property Shelf $Shelf
 */
class ShelvesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Shelf->recursive = 0;
		$this->set('shelves', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Shelf->id = $id;
		if (!$this->Shelf->exists()) {
			throw new NotFoundException(__('Invalid shelf'));
		}
		$this->set('shelf', $this->Shelf->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Shelf->create();
			if ($this->Shelf->save($this->request->data)) {
				$this->Session->setFlash(__('The shelf has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shelf could not be saved. Please, try again.'));
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
		$this->Shelf->id = $id;
		if (!$this->Shelf->exists()) {
			throw new NotFoundException(__('Invalid shelf'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Shelf->save($this->request->data)) {
				$this->Session->setFlash(__('The shelf has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shelf could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Shelf->read(null, $id);
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
		$this->Shelf->id = $id;
		if (!$this->Shelf->exists()) {
			throw new NotFoundException(__('Invalid shelf'));
		}
		if ($this->Shelf->delete()) {
			$this->Session->setFlash(__('Shelf deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Shelf was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
