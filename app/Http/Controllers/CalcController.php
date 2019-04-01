<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CalcController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveCalc()
    {
        $exp= $_REQUEST['old'];
        $calcNew= $_REQUEST['calcNew'];
        $createdAt = date("Y-m-d H:i:s");

        if(!empty(Auth::id())){
        $loggedUserId =  Auth::id();
        }else{
            $loggedUserId =0;
        }

        $calc= new \App\Calc;

        $array = array(
                        'user_id'=>$loggedUserId,
                        'expression'=>$exp,
                        'result'=>$calcNew,
                        'created_at'=>$createdAt,
                        'updated_at'=>$createdAt
                        );

        $calc->create($array);

         $data = array();
         $data['list'] = " ";
        //
        return json_encode($data);

     
      
    }

    public function store()
    {
       
       $postedData = $_POST['calc_id'];
       foreach($postedData as $key=>$value){
  
            $calc = \App\Calc::find($value);
            $calc->name = $_POST['name'][$key];
            $calc->save();
       }
       
      return redirect('home');
    }

    public function loadHistory(){

        if(!empty(Auth::id())){
        $loggedUserId =  Auth::id();
        }else{
            $loggedUserId =0;
        }

        if(!empty($loggedUserId)){
        $calcHistroy = \DB::select('SELECT * FROM pockete_calc where user_id='.$loggedUserId.' order by id DESC');
        $tr = '';
        $tr = "<form method='post' action='".url('store', $parameters = array(), $secure = null)."'>". csrf_field()."
        <table style='display:block;
  overflow:auto;
  height:200px;
  width:170%;border: solid 2px #E26458;' cellpadding='5'><thead><tr><th>Name</th><th style='width: 76%;'>Fraction</th><th>Result</th></thead><tbody style='display:block; '>";
        foreach($calcHistroy as $value){
            if(!empty($value->name))
            { 
                $name = $value->name;
            }else{
                $name = '';
            }
             $tr .= "<tr style='display:block;'>
                        <td><input type='text' style='width: 92px;' name='name[]' placeholder='Enter Name' class='btn btn-success' value='".$name."' /><input type='hidden' name='calc_id[]' value='".$value->id."' /></td>
                        <td style='width: 64%;text-align:center'>".$value->expression."</td>
                        <td style='width: 14%;text-align:center'>".$value->result."</td>
                        
                    </tr>";
            
          
        }
        $tr .= "</tbody></table>
                    <input type='submit' class='btn btn-success' value='Save' style='background: #E26458;
    border: none;
    color: #fff;
    padding: 7px 31px;
    float: left;
    position: relative;
    /* left: -195px; */
    margin-top: 20px;font-weight: bold;' />
                    </form>";

        $data = array();
        $data['list'] = $tr;
        //
        return json_encode($data);
    }
    }
}
