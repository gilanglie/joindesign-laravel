<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;

class EmployeesController extends Controller
{
    //
    public function index()
    {
        $avg = Employees::all()->avg('salary');
        $avgnozero = Employees::get()->map(function ($employee) {
            $employee->salary = str_replace('0', '', $employee->salary);
            return $employee;
        })->avg('salary');
        $total = $avg - $avgnozero;
        return response()->json(array(
            'data' => Employees::all(),
            'total' => $total,
        ));
    }
    public function store(Request $request)
    {
        $employees = Employees::create($request->all());

        return response()->json($employees, 201);
    }
    public function delete(Request $request, $id)
    {
        $employees = Employees::findOrFail($id);
        $employees->delete();

        return response()->json(null, 204);
    }

    public function reduceString($id)
    {
        $req = $id;
        $arr1 = str_split($str);
        // for (var i = 0; i < spacing.length; i++) {
            //     while (spacing[i] == spacing[i+1] && spacing[i+1] == spacing[i+2]
            //         ||
            //         spacing[i] != spacing[i+1] && spacing[i] != spacing[i-1]
            //         ) { 
            //             index.push(spacing[i]);
            //         }
            //     }
      
            //     for (var i = 0; i < index.length; i++) {
            //     while (index[i] == index[i+1] && index[i+1] == index[i+2]
            //         ||
            //         index[i] != index[i+1] && index[i] != index[i-1]
            //         ) { 
            //             index1.push(index[i]);
            //         }
            //     }
        return response()->json($req);
    }

}
