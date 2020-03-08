<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Societe;
use Yajra\DataTables\Facades\DataTables;


class SocieteController extends Controller
{


    function index()
    {
     return view('societe.ajaxdata');
     //http://127.0.0:8001/ajaxdata
    }

     function getdata()
    {
     $societes = Societe::select('id','libelle','adresse','tel','fax','email','code_postal','registre_commercial'
     	,'matricule_fiscal');
     return DataTables::of($societes)
         ->addColumn('action', function($societe){
             return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$societe->id.'">
                        <i class="glyphicon glyphicon-edit"></i> </a>
                     <a href="#" class="btn btn-xs btn-danger delete" id="'.$societe->id.'">
                        <i class="glyphicon glyphicon-remove"></i></a>';
         })
         ->addColumn('checkbox', '<input type="checkbox" name="societe_checkbox[]" class="societe_checkbox" value="{{$id}}" />')
         ->rawColumns(['checkbox','action'])
         ->make(true);
    }

    function postdata(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'libelle' => 'required',
            'adresse'  => 'required',
             'tel'  => 'required',
              'fax'  => 'required',
               'email'  => 'required',
               'code_postal'  => 'required',
                'registre_commercial'  => 'required',
                 'matricule_fiscal'  => 'required',
        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
            if($request->get('button_action') == "insert")
            {
                $societe = new Societe([
                    'libelle'    =>  $request->get('libelle'),
                    'adresse'     =>  $request->get('adresse'),
                     'tel'     =>  $request->get('tel'),
                      'fax'     =>  $request->get('fax'),
                       'email'     =>  $request->get('email'),
                        'code_postal'     =>  $request->get('code_postal'),
                          'registre_commercial'     =>  $request->get('registre_commercial'),
                         'matricule_fiscal'     =>  $request->get('matricule_fiscal')

                ]);
                $societe->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }
        }
        if($request->get('button_action') == 'update')
        {
            $societe = Societe::find($request->get('societe_id'));
            $societe->libelle = $request->get('libelle');
             $societe->adresse = $request->get('adresse');
            $societe->tel = $request->get('tel');
            $societe->fax = $request->get('tel');
            $societe->email = $request->get('email');
            $societe->code_postal = $request->get('code_postal');
            $societe->registre_commercial = $request->get('registre_commercial');
            $societe->matricule_fiscal = $request->get('matricule_fiscal');
             $societe->save();
            $success_output = '<div class="alert alert-success">Data Updated</div>';
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);

    }



    function fetchdata(Request $request)
{

    $id = $request->input('id');

    $societe = Societe::find($id);

    $output = array(
        'libelle'    =>  $societe->libelle,
        'adresse'     => $societe->adresse,
        'tel'     =>  $societe->tel,
        'fax'     =>  $societe->fax,
        'email'     =>  $societe->email,
        'code_postal'     =>  $societe->code_postal,
        'registre_commercial'     =>  $societe->registre_commercial,
        'matricule_fiscal'     =>  $societe->matricule_fiscal
    );

    echo json_encode($output);
}


    function removedata(Request $request)
    {
        $societe= Societe::find($request->input('id'));
        if($societe->delete())
        {
            echo 'Data Deleted';
        }
    }
    function massremove(Request $request)
    {
        $societe_id_array = $request->input('id');
        $societe = Societe::whereIn('id', $societe_id_array);
        if($societe->delete())
        {
            echo 'Data Deleted';
        }
    }



}

