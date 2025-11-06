<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Jobs\SendWelcomeEmailJob;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $query = Employee::with('department');

        if ($request->has('department_id')) {
            $query->where('department_id', $request->department_id);
        }

        $perPage = $request->get('per_page', null);
        if ($perPage) {
            return response()->json($query->paginate((int)$perPage));
        }

        return response()->json($query->get());
    }

    public function store(StoreEmployeeRequest $request)
    {
         $data = $request->validated();
        $employee = Employee::create($data);

        // SendWelcomeEmailJob::dispatch($employee);

        return response()->json($employee->load('department'), 201);
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete(); 
        return response()->json(['message' => 'Employee deleted.']);
    }
}
