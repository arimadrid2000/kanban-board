<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;

class CardController extends Controller
{
    //Listar cards
    public function index(){

        $cards = Card::orderBy('name', 'asc')->get();
        return $cards;
    }

    //Crear card
    public function store(Request $request){

        $card = new Card;
        $card->name = $request->name;
        $card->user_id = $request->user_id;
        $card->end_date = $request->end_date;
        $card->panel_id = $request->panel_id;
        
        $card->save();
        return response()->json([
            'message' => 'Successfully created card!',

        ], 201);

    }

    //Actualizar card
    public function update(Request $request, $id){

        $card = Card::find($id);
        $card->name = $request->name;
        $card->end_date = $request->end_date;
        $card->panel_id = $request->panel_id;
        $card->save();
        return response()->json([
            'message' => 'Successfully updated card!'
        ], 201);
        
    }

    //Eliminar card
    public function destroy($id){

            $card = Card::find($id);
            $card->delete();
            return response()->json([
                'message' => 'Successfully deleted card!'
            ], 201);
    }

}
