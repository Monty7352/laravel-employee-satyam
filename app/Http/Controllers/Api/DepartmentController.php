<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        
        return response()->json(Department::all());
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|unique:departments,name']);
        $dept = Department::create(['name' => $request->name]);
        return response()->json($dept, 201);
    }
}
