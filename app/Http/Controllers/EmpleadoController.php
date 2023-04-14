<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class EmpleadoController
 * @package App\Http\Controllers
 */
class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $fecha1=trim($request->get('fecha1'));
        $fecha2=trim($request->get('fecha2'));

        // if ($texto && $fecha1 && $fecha2!=='') {

            $empleados = DB::table('empleados')
            ->select('id','nombres','apellidos','dni','correo','fecha_nacimiento','area','cargo','local','fecha_inicio','fecha_fin','tipo_contrato')
            ->where('area','LIKE','%'.$texto.'%')
            ->orWhere('cargo','LIKE','%'.$texto.'%')
            ->orWhere('local','LIKE','%'.$texto.'%')
            ->whereBetween('fecha_fin',[$fecha1,$fecha2])
            ->orderBy('nombres','asc')
            ->paginate(10);

        // }elseif ($fecha1 && $fecha2 === '') {

        //     $empleados = DB::table('empleados')
        //     ->select('id','nombres','apellidos','dni','correo','fecha_nacimiento','area','cargo','local','fecha_inicio','fecha_fin','tipo_contrato')
        //     ->where('area','LIKE','%'.$texto.'%')
        //     ->orWhere('cargo','LIKE','%'.$texto.'%')
        //     ->orWhere('local','LIKE','%'.$texto.'%')
        //     ->orderBy('nombres','asc')
        //     ->paginate(10);

            
        // }

            return view('empleado.index',compact('empleados','texto','fecha1','fecha2'));

        
        // 
        // 
        
        // $empleados = Empleado::paginate();
        // $users = $empleados->get();

        //  return view('empleado.index',['empleados'=> $users]); 
        // return view('empleado.index', compact('empleados','texto'));
            //  ->with('i', (request()->input('page', 1) - 1) * $empleados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleado = new Empleado();
        return view('empleado.create', compact('empleado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Empleado::$rules);

        $empleado = Empleado::create($request->all());

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::find($id);

        return view('empleado.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);

        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Empleado $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        request()->validate(Empleado::$rules);

        $empleado->update($request->all());

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $empleado = Empleado::find($id)->delete();

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado deleted successfully');
    }
}
