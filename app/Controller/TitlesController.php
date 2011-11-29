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
		$series = $this->Title->Series->find('list');
		$bindings = $this->Title->Binding->find('list');
		$publishers[0]=$shelves[0]=$categories[0]=$bindings[0]=$series[0]='(none)';
		$authors = $this->Title->Author->find('list');
		$tags = $this->Title->Tag->find('list');
		$this->set(compact('publishers', 'categories', 'shelves', 'authors', 'tags', 'bindings', 'series'));
		//check for input
		if($id) {
			//value passed in 
//debug($this->referer(array('action' => 'index'),true));exit;
			if(substr($this->referer(array('action' => 'index'),true),1,6)=='series') {
				//validate series
				if($this->Title->Series->read(null,$id)) $this->request->data['Title']['series_id']=$id;
			}//endif series
			if(substr($this->referer(array('action' => 'index'),true),1,7)=='authors') {
				//validate author
				if($this->Title->Author->read(null,$id)) $this->request->data['Author']['Author']=array(0=>$id);
//debug($this->request->data);exit;
			}//endif author
			if(substr($this->referer(array('action' => 'index'),true),1,10)=='publishers') {
				//validate publisher
				if($this->Title->Publisher->read(null,$id)) $this->request->data['Title']['publisher_id']=$id;
			}//endif publisher
			if(substr($this->referer(array('action' => 'index'),true),1,7)=='shelves') {
				//validate shelf
				if($this->Title->Shelf->read(null,$id)) $this->request->data['Title']['shelf_id']=$id;
			}//endif shelf
			if(substr($this->referer(array('action' => 'index'),true),1,10)=='categories') {
				//validate category
				if($this->Title->Category->read(null,$id)) $this->request->data['Title']['category_id']=$id;
			}//endif category
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
				if(isset($this->request->data['form']['referer'])) $this->redirect($this->request->data['form']['referer']);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The title could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Title->read(null, $id);
			//get referrer
			$this->request->data['form']['referer']=$this->referer(array('action' => 'index'),true);
		}
		$publishers = $this->Title->Publisher->find('list');
		$categories = $this->Title->Category->find('list');
		$shelves = $this->Title->Shelf->find('list');
		$series = $this->Title->Series->find('list');
		$bindings = $this->Title->Binding->find('list');
		$publishers[0]=$shelves[0]=$categories[0]=$bindings[0]=$series[0]='(none)';
		$authors = $this->Title->Author->find('list');
		$tags = $this->Title->Tag->find('list');
		$this->set(compact('publishers', 'categories', 'shelves', 'authors', 'tags', 'bindings', 'series'));
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
	
	public function import() {
		//bring in file
		$file=fopen('/home/kurtis/server/library/app/webroot/files/mom.csv','r');
		if ($file) {
			echo 'file open:';
			$cnt=$cntA=0;
			while($row=fgetcsv($file)) {
//debug($row);
				//make sure title is set
				if(!empty($row[1])) {
					//seperate first and last name
					$names=explode(',',$row[0],2);//debug($names);
					if(count($names)==1) {
						//only one name found
						echo "<br>one name found for author:{$names[0]}<br>";
						$fName='';
					} else $fName=trim($names[1]);
					$lName=trim($names[0]);
					$titlename=trim($row[1]);
					//find author
					$author_id=null;//debug($row);
					$author=$this->Title->Author->find('first',array('conditions'=>array('Author.lastName'=>$lName,'Author.firstName'=>$fName)));
					if(!$author) {
						//add author
						if($this->Title->Author->save(array('id'=>null,'lastName'=>$lName,'firstName'=>$fName)))$cntA++;
						$author_id=$this->Title->Author->getInsertId();
					} else $author_id=$author['Author']['id'];
					if($author_id) {
						//ok to continue and look for title
						$title=$this->Title->find('first',array('conditions'=>array('Title.name'=>$titlename)));
						if(!$title) {
							//ok to add title
							if($this->Title->save(array('Title'=>array('id'=>null,'name'=>$titlename),'Author'=>array('Author'=>array(0=>$author_id))))) $cnt++;
						}
					}
				}
			}//end while
			echo " $cntA authors added, $cnt titles added";
		}
		exit;
	}
}
