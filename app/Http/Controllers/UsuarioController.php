<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
     //Ver Lista De usuarios
     public function index(Request $request){
        $texto =trim($request->get('busqueda'));
            $usuarios = Usuario::where('nombre', 'like', '%'.$texto.'%')
                ->orWhere('email', 'like', '%'.$texto.'%')
                ->orWhere('direccion', 'like', '%'.$texto.'%')->paginate(10);
            return view('usuarios.UsuariosIndex')->with('usuarios', $usuarios)->with('texto', $texto);
    }
    //VER usuarios
    public function show($id){
        $usuario = Usuario::findOrFail($id);
        return view ('usuarios.UsuarioIndividual')->with('usuario',$usuario);

    }
        
    //REDIRIGE A LA VISTA PARA CREAR UN usuario
    public function create(){
        return view('usuarios.FormUsuarioCrear');
    }
   
    //CREAR Usuario
    public function store (Request $request){
        //Validaciones
        $request->validate([
            'nombre'=>'required',
            'telefono'=>'required|numeric',
            'email'=>'required|email|unique:usuarios,email',
            'direccion'=>'required',
    
        ]);

        $usuario = new Usuario(); //Para crear un nuevo usaurio
        $usuario->nombre=$request->input(key:'nombre');
        $usuario->telefono=$request->input(key:'telefono');
        $usuario->email=$request->input(key:'email');
        $usuario->direccion=$request->input(key:'direccion');
            
    
        $creado=$usuario->save();//Guarda el usaurio
        if($creado){
            return redirect()->route('usuarios.index')->with ('mensaje','El Usuario fue creada exitosamente');
        }else{
            return back();
            
        }
           
    
        }


        //editar
        public function edit ($id){
            $usuario = Usuario::findOrfail($id);
            return view('usuarios.FormUsuarioCrear')->with('usuario',$usuario);
        }
    //actualizar
        public function update (Request $request , $id){
            //validaciones
            $request->validate([
                'nombre'=>'required',
                'telefono'=>'required',
                'email'=>'required|email',
                'direccion'=>'required',
        
            ]);

            $usuario = new Usuario(); //Para actualizar un nuevo usaurio
            $usuario->nombre=$request->input(key:'nombre');
            $usuario->telefono=$request->input(key:'telefono');
            $usuario->email=$request->input(key:'email');
            $usuario->direccion=$request->input(key:'direccion');
                
        
            $creado=$usuario->save();//Guarda el usaurio
            if($creado){
                return redirect()->route('usuarios.index')->with ('mensaje','El Usuario fue creada exitosamente');
            }else{
                return back();
                
            }

            


        }
        //eliminar

        public function destroy($id){
            $usuario = Usuario::with('prestamos')->find($id);
            if ($usuario) {
                $usuario->prestamos()->delete();
                $usuario->delete();
            }
            return redirect()->route('usuarios.index')
            ->with('mensaje', 'El Usuario ha sido eliminado.');
        
        } 

}
