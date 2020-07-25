<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Republic;

class UserController extends Controller
{
    public function Anunciar($id, $republic_id){
        $user = User::findOrFail($id);
        $republic = Republic::findOrFail($republic_id);
        $republic->user_id = $id;
        $republic->save();
        return response()->json($republic);
    }

    public function removeRepublic($id,$republic_id){
        $user=User::findOrFail($id);
        $republic=Republic::findOrFail($republic_id);
        $republic->user_id = Null;
        $republic->save();
        return response()->json($user);
    }
    
    public function createUser(Request $request){
        $user = new User;
        $user->Name = $request->Name;
        $user->Cpf = $request->Cpf;
        $user->Phone = $reqiest->Phone;
        $user->Name = $request->Years;
        $user->Email = $request->Email;
        $user->Password = $request->Password;
        $user->save();
        return response()->json($user);
    }
    public function deleteUser($id){
        User::destroy($id);
        return response()->json(['User deletado']);
    }
    public function showUser($id){
        $user=User::findOrFail($id);
        return response()->json($user);
    }

    public function listUser($id){
        $user=User::all();
        return response()->json([$user]);
    }



    public function updateUser(Request $requeste,$id){
        $user = User::findOrFail($id);
        if($request->Name){
            $User->Name = $request->Name;
        }
        if($request->Cpf){
            $User->Cpf = $request->Cpf;
        }
        if($request->Phone){
            $User->Phone = $request->Phone;
        }
        if($request->Years){
            $User->Years = $request->Years;
        }
        if($request->Email){
            $User->Email = $request->Email;
        }
        if($request->Password){
            $User->Password = $request->Password;
        }
        $user->save();
        return response()->json($user);
    }
}




