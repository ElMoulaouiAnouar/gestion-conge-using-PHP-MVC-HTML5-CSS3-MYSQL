<?php
class EmployeController extends Controller{

    private $employe_model = null;

    public function __construct()
    {
        $this->employe_model = $this->model('Employe');
    }

    public function create(){
        if(isset($_SESSION['user_id']) && $_SESSION['type_user'] == 'admin'){
            $this->view('employes.create');
        }
        else{
            redirect::to('user/index');
        }
    }
    
    public function edit($id){
        if(isset($_SESSION['user_id'])){
            $this->view('employes.edit',['id'=>$id]);
        }
        else{
            redirect::to('user/index');
        }
    }

    // public function update($id,$validation){
    //     if(isset($_POST['btn_update'])){
    //         //instance from class validation
            
    //         $data = [
    //             'nom' => Filters::FilterInput($_POST['nom']),
    //             'prenom' => Filters::FilterInput($_POST['prenom']),
    //             'tel' => Filters::FilterInput($_POST['tel']),
    //             'datenaissance' => $_POST['datenaissance'],
    //             'password' => Filters::FilterInput($_POST['password']),
    //             'confirmed_password' => Filters::FilterInput($_POST['confirmed_password']),
    //             'gander' => $_POST['gander']
    //         ];
    //         //save data to variable user
    //         $user = $data;
             
    //         $validation->Validate($data,[
    //             'nom' => 'required|chaine',
    //             'prenom' =>'required|chaine',
    //             'tel' => 'required|tel',
    //             'datenaissance' => 'required|date:1',
    //             'password' => 'required|password',
    //             'confirmed_password' => 'required|confirmed',
    //             'gander' => 'number|max:1'
    //         ]);
            
    //         if($validation->ErrorCount() == 0){
    //             //update data
    //         }
            
    //     }
    //     else{
    //         $userController = new UserController;
    //         $user = $userController->getUser($id);
    //     }
    //     return $user;
    // }

   public function store($request){

        if(isset($_POST['btn_add'])){
            $data = [
                'nom' => Filters::FilterInput($_POST['nom']),
                'prenom' => Filters::FilterInput($_POST['prenom']),
                'tel' => Filters::FilterInput($_POST['tel']),
                'email' => Filters::FilterInput($_POST['email']),
                'datenaissance' => $_POST['datenaissance'],
                'gander' => $_POST['gander'],
                'pass' => Filters::FilterInput($_POST['password']),
                'confirmed_password' => Filters::FilterInput($_POST['confirmed_password']),
                'type_user' => $_POST['type_user']
            ];
            // //save data to variable user
            $user = $data;
            
            $request->Validate($data,[
                'nom' => 'required|chaine',
                'prenom' =>'required|chaine',
                'tel' => 'required|tel',
                'email' => 'required|email',
                'datenaissance' => 'required|date:1',
                'password' => 'required|password',
                'confirmed_password' => 'required|confirmed',
                'type_user' => 'number|max:1',
                'gander' => 'number|max:1',
            ]);

            if($request->ErrorCount() == 0){
                //insert data

                if($this->employe_model->CheckEmailExist($data['email'])){
                    session::Set("faild",'email exist');
                    redirect::To('employe/create');
                }
                else{
                    if($this->employe_model->insert($data)){
                        session::Set('success','Adding emoloyes success');
                        redirect::To('employe/create');
                    }
                    else{
                        session::Set('faild','can not adding employes');
                        redirect::To('employe/create');
                    }
                }
            }
            
          return $user;
        }
    }
    
    public function ListEmploye(){
        if(isset($_SESSION['user_id']) && $_SESSION['type_user'] == 'admin'){
            $data = $this->employe_model->GetAll($_SESSION['user_id']);
            $this->view('employes.listEmploye',$data);
        }
        else{
            redirect::to('user/index');
        }
        
    }

    public function destroy($id){
        if(isset($_SESSION['user_id'])){
            $this->employe_model->delete($id);
            redirect::To("employe/listEmploye");
        }
        else{
            redirect::to('user/index');
        }
    }
    
    public function update($request , $id){
        if(isset($_POST['btn_update'])){
            $data = [
                'nom' => Filters::FilterInput($_POST['nom']),
                'prenom' => Filters::FilterInput($_POST['prenom']),
                'tel' => Filters::FilterInput($_POST['tel']),
                'datenaissance' => $_POST['datenaissance'],
                'gander' => $_POST['gander'],
                'pass' => Filters::FilterInput($_POST['password']),
                'confirmed_password' => Filters::FilterInput($_POST['confirmed_password'])
            ];
            // //save data to variable user
            $user = $data;
            
            $request->Validate($data,[
                'nom' => 'required|chaine',
                'prenom' =>'required|chaine',
                'tel' => 'required|tel',
                'datenaissance' => 'required|date:1',
                'password' => 'required|password',
                'confirmed_password' => 'required|confirmed',
                'gander' => 'number|max:1'
            ]);

            if($request->ErrorCount() == 0){
                //update 
                if($this->employe_model->update($data,$id)){
                    session::Set('success','update emoloyes success');
                }
                else{
                    session::Set("faild","can not update employe");
                }
                redirect::To('employe/listEmploye');
            }
        }
        else{
            $userController = new UserController;
            $user = $userController->getUser($id);
        }
        return $user;
    }
    
}