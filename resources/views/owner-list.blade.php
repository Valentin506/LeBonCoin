@extends('layouts.app')


@foreach ($owners as $owner)
          
    <li>{{$owner->idproprietaire}}</li>
            
        
 @endforeach