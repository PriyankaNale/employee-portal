<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Employees Controller
 *
 *
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $condition="";
        if(isset($this->request->query['name'])) {
           $this->paginate = array(
        'conditions' => array('name LIKE' => "%".$this->request->query['name']."%"),
        'limit' => 10
    );
        }
        $employees = $this->paginate($this->Employees);
       
        $this->set(compact('employees'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => [],
        ]);

        $this->set('employee', $employee);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $employee = $this->Employees->newEntity();
        if ($this->request->is('post')) {

            //Save employee profile photo
            if(!empty($this->request->data['photo']))
                {
                    $user_photo = $this->save_user_image($this->request->data['photo']); 

                    if($user_photo) {
                        $this->request->data['photo'] = $user_photo;                        
                    }
                }


            $employee = $this->Employees->patchEntity($employee, $this->request->data);
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $this->set(compact('employee'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

             //Save employee profile photo
            if(!empty($this->request->data['photo']))
                {
                    $user_photo = $this->save_user_image($this->request->data['photo']); 

                    if($user_photo) {
                        $this->request->data['photo'] = $user_photo;                        
                    }
                }

            
            $employee = $this->Employees->patchEntity($employee, $this->request->data);
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $this->set(compact('employee'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);
        if ($this->Employees->delete($employee)) {
            $this->Flash->success(__('The employee has been deleted.'));
        } else {
            $this->Flash->error(__('The employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
    *Save employee profile photo
    */
    public function save_user_image($file) {
        $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
        $arr_ext = array('jpg', 'jpeg', 'gif'); 
       
        //if the extension is valid
        if(in_array($ext, $arr_ext))
        {
                            
            if (!file_exists(WWW_ROOT . 'img/uploads/employees/')) {
                mkdir(WWW_ROOT . 'img/uploads/employees/', 0777, true);
            }
                               
            move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/employees/' . $file['name']);
                return $file['name'];
            } else {
                return false;
            }
                
    }
}
