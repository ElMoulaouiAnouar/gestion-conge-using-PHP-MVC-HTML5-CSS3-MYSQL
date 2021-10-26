<?php 
class DemandController extends Controller{

    private $demand_model = null;
    
    public function __construct(){
        $this->demand_model = $this->model('Demand');
    }
    //funciton show view index of demande
    public function index($status = ''){
        if(isset($_SESSION['user_id']) && $_SESSION['type_user'] == 'admin'){
            $data = $this->demand_model->AllDemands($status);
            $this->view('demands.index',$data);
        }
    }

    public function create(){
        if(isset($_SESSION['user_id']) && $_SESSION['type_user'] == 'user'){
            $this->view('demands.create');
        }
    }

    public function store($request){
        if(isset($_POST['btn_add'])){
            $data = [
                'date_debut' => $_POST['date_debut'],
                'date_fin' => $_POST['date_fin']
            ];
            $request->validate($data,[
                'date_debut' => 'required',
                'date_fin' => 'required'
            ]);

            if($request->ErrorCount() == 0){
               //insert demande to table demande_conge
               if($this->demand_model->insert($data['date_debut'],$data['date_fin'])){
                   session::Set("success","Demande Send Success");
               }
               else{
                    session::Set("faild"," Can not Send Demande");
               }
               redirect::To('demand/create');
            }
            else
                return $data;
        }
    }

    public function MesDemands($status = ''){
        if(isset($_SESSION['user_id']) && $_SESSION['type_user'] == 'user'){
            $data = $this->demand_model->MyDemande($_SESSION['user_id'],$status);
            $this->view('demands.MyDemandes',$data);
        }
    }

    //function delete demande
    public function destroy($id){
        if(isset($_SESSION['user_id']) && $_SESSION['type_user'] == 'admin'){
            if($this->demand_model->delete($id)){
                session::Set('success','delete success');
            }
            redirect::To('demand/index');
        }
        else if(isset($_SESSION['user_id']) && $_SESSION['type_user'] == 'user'){
            if($this->demand_model->delete($id)){
                session::Set('success','delete success');
            }
            redirect::To('demand/MesDemands');
        }
    }


    //function change status demande

    public function ChangeStatus($id,$status){
        if(isset($_SESSION['user_id']) && $_SESSION['type_user'] == 'admin'){
            if($this->demand_model->updateStatus($status,$id)){
                session::Set("success",'change etat demande success');
            }
            else{
                session::Set("faild",'can cont change etat demande');
            }
            redirect::To('demand/index');
        }   
     }
     //function get total demandes with etat de demande
     public function getTotalDemands($status = ''){
         return $this->demand_model->TotalDemands($status);
     }
}