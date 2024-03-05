<?php

namespace App\Http\Interfaces;

use App\Models\Products;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface Iproducts
{
     public function Create(Products $producto);
     public function Read():Collection;
     public function Update(int $Id, Products $datos);
     public function Delete(int $producto);
     public function Search(string $Nombre);
}