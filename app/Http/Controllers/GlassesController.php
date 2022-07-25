<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Glasses;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Imports\GlassesImport;
use Maatwebsite\Excel\Facades\Excel;


class GlassesController extends Controller
{

    public function store_brand(Request $request)
    {
        try {
            $request->validate(['nome_brand'=>'required']);

            $brands = new Brand;

            $brands->nome_brand=$request->nome_brand;
            $brands->id_employee=$request->id_employee;
            $brands->created_at=Carbon::now();
            $brands->updated_at=Carbon::now();

            $brands->save();

            return response()->json([
                'message'=>'brand creato',
                'brand'=>$brands,
                'status'=>200,

            ]);
        }
        catch (\exception $e)
        {
            return response()->json([
                'message'=>'brand non creato',
                'brand'=>$brands,
                'status'=>201,
                '4'=>$e,

            ]);
        }
    }



    public function store_category(Request $request)
    {
        try {

            $request->validate(['nome_categoria'=>'required']);

            return Category::create($request->all());
        }
        catch (\exception $e)
        {
            return response()->json([
                'message'=>'categoria non creata',
                'status'=>201,
                '4'=>$e,

            ]);
        }
    }



    public function store_color(Request $request)
    {
        try {

            $request->validate(['nome_colore'=>'required']);

            return Color::create($request->all());
        }
        catch (\exception $e)
        {
            return response()->json([
                'message'=>'colore non creato',
                'status'=>201,
                '4'=>$e,

            ]);
        }
    }



    public function store_type(Request $request)
    {
        try {

            $request->validate(['nome_tipo'=>'required']);

            return Type::create($request->all());
        }
        catch (\exception $e)
        {
            return response()->json([
                'message'=>'tipo non creato',
                'status'=>201,
                '4'=>$e,

            ]);
        }
    }



    public function store_glasses(Request $request)
    {
        try {

            return Glasses::create($request->all());
        }
        catch (\exception $e)
        {
            return response()->json([
                'message'=>'occhiali non creati',
                'status'=>201,
                '4'=>$e,

            ]);
        }
    }



    public function stampa()
    {
        return response()->json(Glasses::all());
    }




    public function stampaPerMarchio($id_brand)
    {
        $occhiale= Glasses::where('id_brand',$id_brand)->get();
        if(is_null($occhiale))
        {
            return response()->json(['message'=>'Occhiale non trovato', 'status'=>404]);
        }
        return response()->json($occhiale);
    }



    public function stampaPerCategoria($category)
    {
        $occhiale= Glasses::where('id_category',$category)->get();
        if(is_null($occhiale))
        {
            return response()->json(['message'=>'Occhiale non trovato', 'status'=>404]);
        }
        return response()->json($occhiale);
    }



    public function stampaPerColore($color)
    {
        $occhiale= Glasses::where('id_color',$color)->get();
        if(is_null($occhiale))
        {
            return response()->json(['message'=>'Occhiale non trovato', 'status'=>404]);
        }
        return response()->json($occhiale);
    }



    public function stampaPerTipo($type)
    {
        $occhiale= Glasses::where('id_type',$type)->get();
        if(is_null($occhiale))
        {
            return response()->json(['message'=>'Occhiale non trovato', 'status'=>404]);
        }
        return response()->json($occhiale);
    }



    public function updateocchiali(Request $request, $id_glasses){

        try {

            $occhiale = Glasses::find($id_glasses);

            if(is_null($occhiale))
            {
                return response()->json(['message' => 'Id non trovato', 'status'=>'404']);
            }
            $occhiale->update($request->all());

            return response()->json([
                'message' => 'occhiali modificato',
                'status' => 200,

            ]);
        }
        catch (\exception $e){

            return response()->json([
                'message'=>'occhiali non modificato',
                'status'=>201,
                '4'=>$e,

            ]);
        }
    }




    public function deleteocchiali($id_glasses){

        $occhiale = Glasses::find($id_glasses);

        if(is_null($occhiale))
        {
            return response()->json(['message' => 'id non trovato', 'status'=>'404']);
        }
        $occhiale->delete();

        return response()->json([
            'message'=>'occhiali eliminati',
            'status'=>200,
        ]);

    }

    public function importcsv(Request $request)
    {
        try {

            if (isset($request->file)) {
                return Excel::import(new GlassesImport, $request->file);
            }
        }
        catch (\exception $e)
        {
            return response()->json([
                'message'=>'file non caricato',
                'status'=>201,
                '4'=>$e,

            ]);
        }
    }


}
