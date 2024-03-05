<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\Iproducts;
use App\Models\Products;
use Illuminate\Database\Eloquent\Collection;


use function PHPUnit\Framework\isEmpty;

class ProductRepository implements Iproducts 
{

        public function Create (Products $producto)
        {
          $nuevo=new Products;
          $nuevo->Nombre=$producto->Nombre;
          $nuevo->Descripcion=$producto->Descripcion;
          $nuevo->save();
        }
        
        public function Read():Collection
        {
         return Products::all();
        }
        
        public function Update(int $Id, Products $product)
        {  
            $result=Products::find($Id);

             if(!$result)
             {
                return false;
             }
                $result->update($product);
                 return true;             
        }
        
        public function Delete(int $product)
        {
            $result=Products::find($product);
            if(!$result)
            {
               return false;
            }
               $result->delete();
               return true;   
        }

        public function Search(string $Nombre)
        {
            $buscar=Products::where('Nombre','ilike','%'.$Nombre.'%')->get();
            if(isEmpty($buscar)){
                return null;
            }
            return $buscar;
        }

}

