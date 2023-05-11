<?php

namespace App\Http\Controllers;
use App\Models\Libro;

use Illuminate\Http\Request;

class LibroController extends Controller
{
    //Ver Lista De Libros
    public function index(Request $request){
        $texto =trim($request->get('busqueda'));
            $libros = Libro::where('titulo', 'like', '%'.$texto.'%')
                ->orWhere('autor', 'like', '%'.$texto.'%')
                ->orWhere('editorial', 'like', '%'.$texto.'%')->paginate(10);
            return view('RaizLibros')->with('libros', $libros);
    }
    //VER LIBROS
    public function show($id){
        $libro = Libro::findOrFail($id);
        return view ('LibroIndividual')->with('libro',$libro);

    }
        //filtro busqueda
        public function search(Request $request){
            $texto =trim($request->get('busqueda'));
            $libros = Libro::where('titulo', 'like', '%'.$texto.'%')
                ->orWhere('autor', 'like', '%'.$texto.'%')
                ->orWhere('editorial', 'like', '%'.$texto.'%')->paginate(10);
            return view('RaizLibros')->with('libros', $libros);
        }
    //REDIRIGE A LA VISTA PARA CREAR UN LIBRO
    public function create(){
        return view('FormCrearLibro');
    }
   
    //CREAR LIBRO
    public function store (Request $request){
        //Validaciones
        $request->validate([
            'titulo'=>'required|alpha',
            'autor'=>'required|alpha',
            'editorial'=>'required|alpha',
            'anio_public'=>'required|date',
            'cantidad_dispo'=>'required|numeric',
    
        ]);

        $libro = new Libro(); //Para crear un nuevo Libro
        $libro->titulo=$request->input(key:'titulo');
        $libro->autor=$request->input(key:'autor');
        $libro->editorial=$request->input(key:'editorial');
        $libro->anio_publicado=$request->input(key:'anio_public');
        $libro->cantidad_dispo=$request->input(key:'cantidad_dispo');
            
    
        $creado=$libro->save();//Guarda el libro
        if($creado){
            return redirect()->route('libros.index')->with ('mensaje','El Libro fue creada exitosamente');
        }else{
            return back();
            
        }
           
    
        }


        //editar
        public function edit ($id){
            $libro = Libro::findOrfail($id);
            return view('FormCrearLibro')->with('libro',$libro);
        }
    //actualizar
        public function update (Request $request , $id){
            //validaciones
            $request->validate([
                'titulo'=>'required',
                'autor'=>'required',
                'editorial'=>'required',
                'anio_public'=>'required|date',
                'cantidad_dispo'=>'required|numeric',
        
            ]);
    
            $libro = Libro::find($id); //Para crear un nuevo Libro
            $libro->titulo=$request->input(key:'titulo');
            $libro->autor=$request->input(key:'autor');
            $libro->editorial=$request->input(key:'editorial');
            $libro->anio_publicado=$request->input(key:'anio_public');
            $libro->cantidad_dispo=$request->input(key:'cantidad_dispo');
                
        
            $creado=$libro->save();//Guarda el libro actualizado
            if($creado){
                return redirect()->route('libros.index')->with ('mensaje','El Libro fue Actualizado exitosamente');
            }
            else{
                return back();
                
            }

            


        }
        //eliminar

        public function destroy($id){
            $libro = Libro::with('prestamos')->find($id);
            if ($libro) {
                $libro->prestamos()->delete();
                $libro->delete();
            }
            return redirect()->route('libros.index')
            ->with('mensaje', 'El Libro ha sido eliminado.');
        
        } 

     
}
