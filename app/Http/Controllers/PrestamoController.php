<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Libro;
use App\Models\Usuario;

use Illuminate\Support\Facades\DB;


class PrestamoController extends Controller
{
     //Ver Lista De prestamos
     public function index(Request $request){
        $texto =trim($request->get('busqueda'));
        $prestamos = Prestamo::whereHas('usuario', function($query) use ($texto) {
            $query->where('nombre', 'like', "%$texto%");})->paginate(10);
        return view('prestamos.RaizPrestamo')->with('prestamos', $prestamos)->with('texto', $texto);
    }
    //VER prestamos
    public function show($id){
        $prestamo = Prestamo::with('usuario')->with('libro')->findOrFail($id);
        return view ('prestamos.PrestamoIndividual')->with('prestamo',$prestamo);

    }
        //filtro busqueda
        public function search(Request $request){
            $texto =trim($request->get('busqueda'));
            $prestamos = Prestamo::whereHas('usuario', function($query) use ($texto) {
                $query->where('nombre', 'like', "%$texto%");})->get();
            return view('prestamos.RaizPrestamo')->with('prestamos', $prestamos)->with('texto', $texto);
        }
    //REDIRIGE A LA VISTA PARA CREAR UN LIBRO
    public function create(){
        $libros= Libro::all();
        $usuarios= Usuario::all();
        return view('prestamos.FormPrestamosCrear')->with('libros', $libros)->with('usuarios', $usuarios);
    }
   
    //CREAR LIBRO
    public function store (Request $request){
        //Validaciones
        $request->validate([
            'fecha_sol'=>'required|date',
            'fecha_pres'=>'required|date',
            'fecha_dev'=>'required|date',
            'libro_id'=>'required',
            'usuario_id'=>'required',
    
        ]);

        $prestamo = new Prestamo(); //Para crear un nuevo prestamo
        $prestamo->fecha_solicitud=$request->input(key:'fecha_sol');
        $prestamo->fecha_prestamo=$request->input(key:'fecha_pres');
        $prestamo->fecha_devolucion=$request->input(key:'fecha_dev');
        $prestamo->libro_id=$request->input(key:'libro_id');
        $prestamo->usuario_id=$request->input(key:'usuario_id');
            
    
        $creado=$prestamo->save();//Guardael prestamo
        if($creado){
            return redirect()->route('prestamos.index')->with ('mensaje','El Prestamo fue creada exitosamente');
        }else{
            return back();
            
        }
           
    
        }


        //editar
        public function edit ($id){
            $prestamo=Prestamo::findOrFail($id);
            $libros= Libro::all();
            $usuarios= Usuario::all();
            return view('prestamos.FormPrestamosCrear')->with('prestamo', $prestamo)->with('libros', $libros)->with('usuarios', $usuarios);
        
        }
    //actualizar
        public function update (Request $request , $id){
            //validaciones
            $request->validate([
                'fecha_sol'=>'required|date',
                'fecha_pres'=>'required|date',
                'fecha_dev'=>'required|date',
                'libro_id'=>'required',
                'usuario_id'=>'required',
        
            ]);
    
            $prestamo = Prestamo::find($id); //Para crear un nuevo prestamo
            $prestamo->fecha_solicitud=$request->input(key:'fecha_sol');
            $prestamo->fecha_prestamo=$request->input(key:'fecha_pres');
            $prestamo->fecha_devolucion=$request->input(key:'fecha_dev');
            $prestamo->libro_id=$request->input(key:'libro_id');
            $prestamo->usuario_id=$request->input(key:'usuario_id');
                
        
            $creado=$prestamo->save();//Guardael prestamo
            if($creado){
                return redirect()->route('prestamos.index')->with ('mensaje','El Prestamo fue actualizado exitosamente');
            }else{
                return back();
                
            }

            


        }
        //eliminar

        public function destroy($id){
            
            Prestamo::destroy($id);
        return redirect()->route('prestamos.index')->with("mensaje", "Se eliminó exitosamente el prestamo.");
        
        } 

}
