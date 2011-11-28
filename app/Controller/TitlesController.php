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
		$this->paginate=array('order'=>array('Title.author'=>'asc','Title.name'=>'asc'));
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
	public function add($id=null) {
		if ($this->request->is('post')) {
			$this->Title->create();
//debug($this->request->data);exit;
			if ($this->Title->save($this->request->data)) {
				$this->Session->setFlash(__('The title has been saved'));
				if(isset($this->request->data['form']['referer'])) $this->redirect($this->request->data['form']['referer']);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The title could not be saved. Please, try again.'));
			}
		} else {
			//get referrer
			$this->request->data['form']['referer']=$this->referer(array('action' => 'index'),true);
			//set defaults to none
			$this->request->data['Title']['category_id']=0;
			$this->request->data['Title']['publisher_id']=0;
			$this->request->data['Title']['shelf_id']=0;
			$this->request->data['Title']['binding_id']=0;
			$this->request->data['Title']['series_id']=0;
		}//endif for post
		$publishers = $this->Title->Publisher->find('list');
		$categories = $this->Title->Category->find('list');
		$shelves = $this->Title->Shelf->find('list');
		$publishers[0]=$shelves[0]=$categories[0]='(none)';
		$authors = $this->Title->Author->find('list');
		$tags = $this->Title->Tag->find('list');
		$this->set(compact('publishers', 'categories', 'shelves', 'authors', 'tags'));
		//check for input
		if($id) {
			//value passed in validate and set author
			if($this->Title->Author->read(null,$id)) $this->request->data['Author']['id']=$id;
		}//endif
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
		$publishers[0]=$shelves[0]=$categories[0]='(none)';
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
