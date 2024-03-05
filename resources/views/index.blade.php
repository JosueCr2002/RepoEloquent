@extends('layouts.Plantilla');

@section('title')

@section('content')
    
<a href="{{route('person.create')}}">Ingresar a AgregarS</a>

<div class="row">
    <div class="col-sm-6">
      
        <table class="table">
            <thead>
              <tr>
               
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
        
               @foreach ($people as $item)
               <tr>
                <td>{{$item->Nombre}}</td>
                <td>{{$item->Apellido}}</td>
                <td>   
                    <a href="{{ route('person.edit', ['person' => $item->id]) }}" class="btn btn-warning btn-sm">Editar</a>
   
                
                    <form action="{{route('person.destroy',$item)}}" method="POST">
                    
                     @csrf
                     @method("DELETE")
                    
                     <input type="submit" class=" btn btn-danger btn-sm" value="Eliminar">
                    </form>
                </td>
              </tr>
               @endforeach 
              
              
            </tbody>
          </table>
    </div>
</div>



@endsection