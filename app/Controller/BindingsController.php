<?php
App::uses('AppController', 'Controller');
/**
 * Bindings Controller
 *
 * @property Binding $Binding
 */
class BindingsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Binding->recursive = 0;
		$this->set('bindings', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Binding->id = $id;
		if (!$this->Binding->exists()) {
			throw new NotFoundException(__('Invalid binding'));
		}
		$this->set('binding', $this->Binding->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Binding->create();
			if ($this->Binding->save($this->request->data)) {
				$this->Session->setFlash(__('The binding has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The binding could not be saved. Please, try again.'));
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
		$this->Binding->id = $id;
		if (!$this->Binding->exists()) {
			throw new NotFoundException(__('Invalid binding'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Binding->save($this->request->data)) {
				$this->Session->setFlash(__('The binding has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The binding could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Binding->read(null, $id);
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
		$this->Binding->id = $id;
		if (!$this->Binding->exists()) {
			throw new NotFoundException(__('Invalid binding'));
		}
		if ($this->Binding->delete()) {
			$this->Session->setFlash(__('Binding deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Binding was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
