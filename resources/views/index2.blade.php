@extends('layouts.Plantilla');

@section('title')

@section('content')
    
<a href="{{route('product.create')}}">Ingresar a AgregarS</a>

<div class="row">
    <div class="col-sm-6">
      
        <table class="table">
            <thead>
              <tr>
               
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
              </tr>
            </thead>
            <tbody>
        
               @foreach ($products as $item)
               <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->Nombre}}</td>
                <td>{{$item->Descripcion}}</td>
                <td>   
                    
                </td>
              </tr>
               @endforeach 
              
              
            </tbody>
          </table>
    </div>
</div>

@endsection