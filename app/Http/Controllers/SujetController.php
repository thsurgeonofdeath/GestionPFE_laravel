<?php

namespace App\Http\Controllers;

use App\Models\Encadrant;
use App\Models\Sujet;
use App\Models\User;
use App\Models\Etudiant;
use App\Models\Filiere;
use App\Models\Type_sujet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SujetController extends Controller
{
     ////////////////////////Etudiant////////////////////////////////////////////////
    
    public function afficherSujet()
    {
       $sujets= Sujet::all();
       $user=User::all();
       $types=Type_sujet::all();  
       $filiere=Filiere::all();

       return view('etudiant',['sujets'=>$sujets, 'user'=>$user,'types'=>$types,'filiere'=>$filiere]);
    }
    public function detailSujet($id)
    {
       
        $sujet= Sujet::find($id);
        
        return view('detailSujet',['sujet'=>$sujet]);
    }
     
     public function filtre(Request $request)
     {
        $type_filiere=Filiere::find($request->filiere)->Type_filiere->id;
        $encadrants=Encadrant::all()->where('type_filiere_id',$type_filiere)->pluck('id');
        $sujets=Sujet::all()->whereIn('encadrant_id', $encadrants)->where('type_sujet_id',$request->type);
        $sujets2=Sujet::all()->whereIn('encadrant_id', 'e');
        if ($sujets!=null) {
            foreach ($sujets as $sujet) {
                if($sujet->etudiants->first()->filiere_id==$request->filiere && date('Y', strtotime($sujet->created_at))==$request->year){
                    $sujets2->push($sujet);
                } 
            }
        }
        $types=Type_sujet::all();  
        $filiere=Filiere::all();
            return view('etudiant',['sujets'=>$sujets2,'types'=>$types,'filiere'=>$filiere,'selectedf'=>$request->filiere,'selectedt'=>$request->type,'selectedy'=>$request->year]);
     }


     function filtre_titre(Request $request)
     {  
        $types=Type_sujet::all();
        $filiere=Filiere::all(); 
        
        $sujets = DB::table('sujets')
        ->where('titre', 'like', '%'.$request->titre.'%')
        ->pluck('id');
        $sujets=Sujet::all()->whereIn('id',$sujets);
           return view('etudiant',['sujets'=>$sujets,'types'=>$types,'filiere'=>$filiere]);
     }




public function mesSujet_valide($id)
{
          $sujets=Auth::user()->etudiant->sujets;
          $sujets=$sujets->where('validation',1);
          $types=Type_sujet::all();  
          $filiere=Filiere::all();
         return view('etudiant',['sujets'=>$sujets,'types'=>$types,'filiere'=>$filiere]);
}
public function mesSujet_nonvalide($id)
{
          $sujets=Auth::user()->etudiant->sujets;
          $sujets=$sujets->where('validation',0);
          $types=Type_sujet::all();  
          $filiere=Filiere::all();
         return view('etudiant',['sujets'=>$sujets,'types'=>$types,'filiere'=>$filiere]);
}
public function parametre()
{
    $user=Auth::user();
    return view('parametre',['user'=>$user]);
}
public function modifierInfo(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|string|confirmed|min:8',
    ]);
    
    // Here we will attempt to reset the user's password. If it is successful we
    // will update the password on an actual user model and persist it to the
    // database. Otherwise we will parse the error and return the response.
    User::find(auth()->user()->id)->forceFill([
               'name'=>$request->name,
               'email'=>$request->email,
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(60),
            ])->save();
    
           
        
    
    
    return back()->with('success','le profil a été modifié avec succes');
}
 ////////////////////////Encadrant////////////////////////////////////////////////
 public function afficherSujetE()
 {
    $sujet= Sujet::all();
    $user=User::all();
    $types=Type_sujet::all();  
    $filiere=Filiere::all();

    return view('encadrant',['sujet'=>$sujet, 'user'=>$user,'types'=>$types,'filiere'=>$filiere]);
 }
 public function searchE(Request $request)
 {
    $key = trim($request->get('txt'));
    $filtre = $request->get('filtre');
    $sujet = sujet::all();
    if($filtre==1)
        {
              $sujet = sujet::query()
               ->where('titre', 'like', "%{$key}%")
               ->orderBy('created_at', 'desc')
               ->get();
        }
    if($filtre==2)
        {
             $sujet = Sujet::query()
            ->select('sujets.*')
            ->join('etudiant_sujet','sujets.id','=','etudiant_sujet.sujet_id') 
            ->join('etudiants','etudiant_sujet.etudiant_id' ,'=' ,'etudiants.id')
            ->where( 'etudiants.promotion' ,'=', $key)
            ->distinct()
            ->get();
   
        }
    
    $types=Type_sujet::all();  
    $filiere=Filiere::all();
        return view('encadrant',['sujet'=>$sujet,'types'=>$types,'filiere'=>$filiere]);
 }
 public function filtreFiliereE(Request $request)
     {
        $filtre1 = $request->get('filiere');
        //$etudiant = Etudiant::query()    
        //->where('filiere_id',  '=', $filtre1)
        //->get();
            ///  $sujet= DB::table('sujets')-> query('select sujets.* from etudiants,etudiant_sujet,filieres,sujets where filiere_id=2 and etudiants.filiere_id=filieres.id and etudiant_sujet.etudiant_id=etudiants.id and etudiant_sujet.sujet_id=sujets.id')->get();
            //$sujet= DB::table('sujets')-> select(' sujets.* ')->from(' etudiants')->from('etudiant_sujet')->from('filieres,sujets')->where( ' filiere_id','=','2' )->where( 'etudiants.filiere_id','=','filieres.id' )->where('etudiant_sujet.etudiant_id','=','etudiants.id')->where( 'etudiant_sujet.sujet_id','=','sujets.id')->get();
      
        //trouver les sujet des etudiants
        $sujet = Sujet::query()
            ->select('sujets.*')
            ->join('etudiant_sujet','sujets.id','=','etudiant_sujet.sujet_id') 
            ->join('etudiants','etudiant_sujet.etudiant_id' ,'=' ,'etudiants.id')
            ->where( 'etudiants.filiere_id' ,'=', $filtre1)
            ->distinct()
            ->get();
            
        /*$sujet=Sujet::query()  ->join('sujets', 'etudiants.id', '=', 'sujets.etudiant_id')
        ->select('sujets.*', 'etudiants.filiere_id')
        ->where('etudiant_sujet.etudiant_id',  '=',$etudiant.'.id')  ->get();
            */
 

       // $sujet = sujet::all();
     
        $types=Type_sujet::all();  
        $filiere=Filiere::all();
            return view('encadrant',['sujet'=>$sujet,'types'=>$types,'filiere'=>$filiere]);
     }
     
function filtreTypeE(Request $request)
{
    $filtre1 = $request->get('type');
    $sujet = sujet::query()
            ->where('type_sujet_id', '=',$filtre1 )
            ->orderBy('created_at', 'desc')
            ->get();
            $types=Type_sujet::all();  
            $filiere=Filiere::all();
                return view('encadrant',['sujet'=>$sujet,'types'=>$types,'filiere'=>$filiere]);
}
function filtreNiveauE(Request $request)
{
    $filtre1 = $request->get('niveau');
    $sujet = sujet::query()
            ->where('niveau', '=',$filtre1 )
            ->orderBy('created_at', 'desc')
            ->get();
            $types=Type_sujet::all();  
            $filiere=Filiere::all();
                return view('encadrant',['sujet'=>$sujet,'types'=>$types,'filiere'=>$filiere]);
}
 public function addsujet()
    {

          $types=Type_sujet::all();  
            $etudiants=Etudiant::all()->where('filiere_id',Auth::user()->etudiant->filiere_id);
            $encadrants=Encadrant::all()->where('type_filiere_id',Auth::user()->etudiant->filiere->type_filiere_id);
         return view('sujets.addsujet',['etudiants'=>$etudiants,'encadrants'=>$encadrants,'types'=>$types]);
    }
    
    public function storeSujet(Request $request)
    {
       

        $this->validate($request,[
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'niveau' => 'required',
            'type_sujet_id'=> 'required',

            'phone' => 'required',
            'email' => 'required',
            'raport' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
        ]);
      
        $sujet = new Sujet();
        $name = time().'_'.$request->raport->getClientOriginalName();
        $filePath = $request->file('raport')->storeAs('uploads', $name, 'public');
        $sujet->raport = $name;
        $sujet->description = $request->description;
        $sujet->encadrant_id = $request->encadrant;
        $sujet->type_sujet_id = $request->type_sujet_id;
        $sujet->phone=$request->phone;
        $sujet->email=$request->email;
        $sujet->titre=$request->titre;
        $sujet->niveau=$request->niveau;
        $sujet->save();
        $etudiants=$request->etudiants;
        $sujet->etudiants()->attach($etudiants);
        $sujet->etudiants()->attach(Auth::user()->etudiant->id);

        return back()->with('success','le sujet a été enregistrés avec succes');
   }
 
   public function findEtudiantWithFiliereID($id,$promo,$niveau)
    {
       
        $data = Etudiant::query()
        ->select('etudiants.*','users.name')
        ->join('users','etudiants.etudiant_id','=','users.id') 
        ->join('filieres','etudiants.filiere_id' ,'=' ,'filieres.id')
        ->where( 'etudiants.filiere_id' ,'=', $id)
        ->where('etudiants.promotion',$promo)
        ->where('etudiants.niveau',$niveau)
        ->distinct()
        ->get();

        return response()->json($data);
    }

    public function detailSujetE($id)
    {
        
        $sujet= Sujet::find($id);
        return view('detailSujetE',['sujet'=>$sujet]);
    }
    
    public function modifierSujetE($id)
    {
        $sujet= Sujet::find($id);

        $types=Type_sujet::all();  
            $filiere=Filiere::all();
            $etudiants=Etudiant::all();
                return view('modifierSujetE',['sujet'=>$sujet,'etudiants'=>$etudiants,'types'=>$types,'filiere'=>$filiere]);
    }
    public function storeModification(Request $request ,$id)
    {
        $sujet= Sujet::find($id);
        $this->validate($request,[
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            //'niveau' => 'required',
            'limite' => 'required',
            'type_sujet_id'=> 'required'

        ]);
        $sujet->titre = $request->titre;
        $sujet->description = $request->description;
        $sujet->date_limite = $request->limite;
        $sujet->type_sujet_id = $request->type_sujet_id;
       

        $sujet->save();

        return view('detailSujetE',['sujet'=>$sujet]);
    }
    public function valider(Request $request ,$id)
    {
        $sujet =Sujet::find($id);
      
           $sujet->validation =$request->validation;

           $sujet->save();
    
           return view('detailSujetE',['sujet'=>$sujet]);
        
    }
    public function supprimerSujet($id)
    {
        $s= Sujet::find($id);
        $s->delete();

        $sujet= Sujet::all();
        $user=User::all();
        $types=Type_sujet::all();  
        $filiere=Filiere::all();
            return view('encadrant',['sujet'=>$sujet, 'user'=>$user,'types'=>$types,'filiere'=>$filiere])->with('success','Sujet supprimé avec succes');
    }

    public function parametreE()
    {
        $user=Auth::user();
        return view('parametreE',['user'=>$user]);
    }
   
  
public function sendMsg(Request $request)
{
    $this->validate($request,[
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'tel' => 'required|string',
        'message'=> 'required|string',

    ]);
    DB::table('contacts')->insert([ 
        'name'             => $request->name,
        'email' => $request->email,
        'phone'      => $request->tel,
        'message' => $request->message
        
    ]);
    return back()->with('success','votre message a bien été envoyé.');

}
public function generatePV()
    {
        return view('generatePV');
    }
    public function sendpv(Request $request)
{

    $this->validate($request,[
        'date' => 'required|date',
        'superviseur' => 'required',
        'note'=> 'required|string',
        'sujet'=> 'required|string'

    ]);
    DB::table('pvs')->insert([ 
        'date'             => $request->date,
        'sujet' => $request->sujet,
        'superviseur'      => $request->superviseur,
        'note' => $request->note
        
    ]);
    return back()->with('success','votre PV a été enregistré');
}

public function cherche(){
$text = $_GET['query'];
$users = User::where('name','like', '%'.$text.'%')->get();

return view('cherche', compact('users'));
}
}

