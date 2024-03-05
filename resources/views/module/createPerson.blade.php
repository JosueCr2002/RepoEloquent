@extends('layouts.Plantilla')

@section('tilte')
<title>Agregar</title>
@section('content')

<br>
<div class="row justify-content-center">

    <div class="col-md-5">
        <div class="card">
           
            <div class="card-body">
        
               <form action="{{route('person.store')}}" method="POST">
                 @csrf
                <div class="form-group">
                    <label for="Name" >Ingrese el nombre</label>
                    <input type="text" name="Nombre" id="Name"class="form-control" required>
        
                </div>
                <div class="form-group">
                    <label for="LastName" >Ingrese el Apellido</label>
                    <input type="text" name="Apellido" id="LastName"class="form-control" required>
        
                </div>
                
                  <input type="submit" class="btn btn-primary btn-sm"value="Guardar">
               </form>
               
        
        
            </div>
        </div>
    </div>
</div>




@endsection