<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\Iproducts as InterfacesIproducts;
use App\Models\Products;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class ProductsController extends Controller
{
   private $producto;
   public function __construct(InterfacesIproducts $product)
   {
     $this->producto=$product;
   }

    public function index(): View
    {
        $products = $this->producto->Read();
        return view('index2', compact('products'));
    }

    public function create():View
    {
        return view('Product.Create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
           
            "Nombre"=>"required",
            "Descripcion"=>"required"
        ]);

        $produc=new Products($request->all());
        $this->producto->create($produc);
    }

    public function edit(int $id):View
    {
        return view('Product.Edit',['Id'=>$id]);
    }

    public function update(Request $request, int $id)
    { 
        $request->validate([
            
            'Nombre'=>'required',
            'Descripcion'=>'required'
        ]);
        
        $datos=new Products;
        $datos->Nombre=$request->input('Nombre');
        $datos->Descripcion=$request->input('Descripcion');

        if($this->producto->Update($id,$datos))
        {
          return redirect()->route('Producto.index')->with('Success','Producto editado correctamente');
        }   
        return back()->withErrors(['error' => 'Error al actualizar el producto']);
    }

    public function destroy(string $id)
    {
        if($this->producto->Delete($id)){
            return redirect()->route('Producto.index')->with('Success','Producto eliminado correctamente');
        }
        return back()->withErrors(['error' => 'Error al Eliminar el producto']);
    }

    public function show(Request $request)
    {
        $request->validate([
         'Nombre'=>'required'
        ]);
       
        $nombre=$request->input('BucarNombre');
        $resultado= $this->producto->Search($nombre);
        return view('Poducts.Index',['nombre'=>$resultado]);      
    }
}
