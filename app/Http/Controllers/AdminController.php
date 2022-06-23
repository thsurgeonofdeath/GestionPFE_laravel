<?php
namespace App\Http\Controllers;
use App\Exports\AdminExport;
use App\Exports\profExport;
use App\Models\Etudiant;
use App\Models\Filiere;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
class AdminController extends Controller
{
    public function index()
    {  
        return view('admin')->with('felieres',Filiere::all());
    }
    public function search( Request $request)
    {   $ids=Etudiant::all()->where('niveau',$request->niveau)->where('filiere_id',$request->feliere)->pluck('user_id');
        $users=User::all()->whereIn('id',$ids);
        return view('admin')->with('users',$users)->with('felieres',Filiere::all())->with('niveau',$request->niveau)->with('fel',$request->feliere);
    }
    public function add()
    {
        return view('createEtudiant')->with('felieres',Filiere::all());
    }
    public function etudiants()
    {
        return view('admin')->with('users',User::all()->where('role','etudiant'))->with('felieres',Filiere::all());
    }
    public function admins()
    {
        return view('admin')->with('users',User::all()->where('role','admin'))->with('felieres',Filiere::all());
    }
    public function encadrants()
    {
        return view('admin')->with('users',User::all()->where('role','encadrant'))->with('felieres',Filiere::all());
    }
    public function destroy(User $user)
    {
        if (isset($user->etudiant)) {
            $user->etudiant->delete();
        }
        $user->delete();
        return redirect()->route('Admin.etudiants');
    }
    public function editE($id)
    {
        $user=User::find($id);
        return view('createEtudiant')->with('felieres',Filiere::all())->with('user',$user);
    }
    public function storeE(Request $request)
    {
        $role='etudiant';
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'cne' => 'required|unique:etudiants',
            'password' => 'required|string|confirmed|min:8',
        ]);

       $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=>$role,
       ]);
        $etudiant=new Etudiant;
        $etudiant->cne=$request->cne;
        $etudiant->niveau=$request->niveau;
        $etudiant->filiere_id=$request->feliere;
        $etudiant->user_id=$user->id;
        $etudiant->save();
        return redirect()->route('Admin.etudiants');              
        }
        public function updateE(Request $request , $id)
        { 
            $request->validate([
                'password' => 'string|confirmed|min:8',
            ]);
           $user= User::find($id);         
            if ($request->password) {
                $user->password=Hash::make($request->password);
            }
            $user->update([
                'name' => request('name'), 
                'email' => request('email'), 
                ]);
            $etudiant=Etudiant::find($user->etudiant->id);
            $etudiant->cne=$request->cne;
            $etudiant->niveau=$request->niveau;
            $etudiant->filiere_id=$request->feliere;
            $etudiant->user_id=$user->id;
            $user->update();
            $etudiant->update();
            return redirect()->route('Admin.etudiants');              
            }
            public function create($role){
                return view('createAE')->with('role',$role);
            }
            public function store(Request $request,$role){
                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|confirmed|min:8',
                ]);
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role'=>$role,
                ]);
                if ($role=='admin') {
                    return redirect()->route('Admin.admins'); 
                }
               
                if ($role=='encadrant') {
                    return redirect()->route('Admin.encadrants'); 
                }
            }
            public function update(Request $request , $id,$role)
            {
                $request->validate([
                    'password' => 'string|confirmed|min:8',
                ]);
               $user= User::find($id);         
                if ($request->password) {
                    $user->password=Hash::make($request->password);
                }
                $user->update([
                    'name' => request('name'), 
                    'email' => request('email'), 
                    ]);
              
                    if ($role=='admin') {
                        return redirect()->route('Admin.admins'); 
                    }
                   
                    if ($role=='encadrant') {
                        return redirect()->route('Admin.encadrants'); 
                    }          
                }
                public function edit($id,$role)
                {
                    
                    $user=User::find($id);
                    return view('createAE')->with('role',$role)->with('user',$user);
                }
                public function exportA() 
                    {
             
                        return Excel::download(new AdminExport, 'admins.xlsx');
                    }
                    public function exportE() 
                    {
             
                        return Excel::download(new profExport, 'profs.xlsx');
                    }
}

