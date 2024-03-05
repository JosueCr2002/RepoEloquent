<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        //
        $datos=Person::all();
        return view("index",['people'=>$datos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
        return view('module.createperson');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        //
        $request->validate(

         [
            'Nombre'=>'required|string',
            'Apellido'=>'required|string'
         ]
        );
       
        $nuevo=new Person;

        $nuevo->Nombre=$request->Nombre;
        $nuevo->Apellido=$request->Apellido;
     
        $nuevo->save();

        return redirect()->route('person.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person):View
    {
        //
    
        return view('module.Edit',['persons'=>$person]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person):RedirectResponse
    {
        //
        $request->validate(

            [
               'Nombre'=>'required|string',
               'Apellido'=>'required|string'
            ]
           );

        $person->Nombre=$request->Nombre;
        $person->Apellido=$request->Apellido;

        $person->update();
       
        return redirect()->route('person.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person):RedirectResponse
    {
        //

        $person->delete();
        return  redirect()->route('person.index');
    }
}
