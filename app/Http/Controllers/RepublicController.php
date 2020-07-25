<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Republic;
use App\User;

class RepublicController extends Controller
{   
    public function createRepublic(Request $request){
        $republic = new Republic;
        $republic->Name = $request->Name;
        $republic->Street = $request->Street;
        $republic->Number = $request->Number;
        $republic->City = $request->City;
        $republic->SpaceAvailable = $request->SpaceAvailable;
        $republic->Bedrooms = $request->Bedrooms;
        $republic->Price = $request->Price;
        $republic->Phone = $request->Phone;
        $republic->Cep = $request->Cep;
        $republic->SmokeAllowed = $request->SmokeAllowed;
        $republic->AnimalAllowed = $request->AnimalAllowed;
        $republic->KidsAllowed = $request->KidsAllowed;
        $republic->save();
        return response()->json($republic);
    }

    public function addUser($id,$republic_id){
        $user= User::findOrFail($id);
        $republic= Republic::findOrFail($republic_id);
        $republic->user_id=$id;
        $republic->save();
        return response()->json($republic);
    }

    public function removeUser($id,$republic_id){
        $user = User::findOrFail($id);
        $republic = Republic::findOrFail($republic_id);
        $republic->republic_id = NULL;
        $user->save();
        return response()->json($republic);
    }

        

    public function showRepublic($id){
        $republic = Republic::findOrFail($id);
        return response()->json($republic);
    }

    public function listRepublic(){
        $republic = Republic::all();
        return response()->json([$republic]);

    }

    public function updateRepublic(Request $request,$id){
        $republic = Republic::findOrFail($id);
        if($request->Name){
            $republic->Name = $request->Name;
        }
        if($request->Street){
            $republic->Street = $request->Street;
        }
        if($request->City){
            $republic->City = $request->City;
        }
        if($request->Number){
            $republic->Number = $request->Number;
        }
        if($request->SpaceAvailable){
            $republic->SpaceAvailable = $request->SpaceAvailable;
        }
        if($request->Bedrooms){
            $republic->Bedrooms = $request->Bedrooms;
        }
        if($request->Price){
            $republic->Price = $request->Price;
        }
        if($request->Phone){
            $republic->Phone = $request->Phone;
        }
        if($request->Cep){
            $republic->Cep = $request->Cep;
        }
        if($request->SmokeAllowed){
            $republic->SmokeAllowed = $request->SmokeAllowed;
        }
        if($request->AnimalAllowed){
            $republic->AnimalAllowed = $request->AnimalAllowed;
        }
        if($request->KidsAllowed){
            $republic->KidsAllowed = $request->KidsAllowed;
        }
        $republic->save();
        return response()->json($republic);
    }
    
    public function deleteRepublic($id){
        Republic::destroy($id);
        return response()->json(['Produto Deletado']);
    }
}
