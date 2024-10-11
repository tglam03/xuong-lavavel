<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'employees.';
    public function index()
    {
        //
        $data = Employee::query()->latest('id')->paginate(5);
//        dd($data->toArray());

        return view(self::PATH_VIEW .  __FUNCTION__, compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view(self::PATH_VIEW .  __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $data = $request->validate([
            'first_name'    => 'required|string|max:100',
            'last_name'     => 'required|string|max:100',
            'email'         => 'required|email|max:100',
            'phone'         => ['
                                required',
                                'string',
                                'max:20',
                                Rule::unique('employees')],

            'date_of_birth' => 'nullable|date',
            'hire_date'     => 'nullable|date',
            'salary'        => 'nullable|numeric|min:1000',
            'is_active'     => ['nullable', Rule::in(0,1)],
//            'department_id' => 'nullable|integer|exists:departments,id',
//            'manager_id'    => 'nullable|integer|exists:employees,id',
            'address'       => 'required|max:255',
            'image'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1000',
        ]);

        try {
//            dd($request->hasFile('image'));
            if($request->hasFile('image')){
                $data['image'] = Storage::put('employees', $request->file('image'));
            }

            Employee::query()->create($data);

            return redirect()->route('employees.index')
                            ->with('succes', true);
        } catch(\Throwable $th) {
            if(!empty($data['image'] && Storage::exists($data['image']))) {
                Storage::delete($data['image']);
            }

            return back()
                    ->with('succes',false)
                    ->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view(self::PATH_VIEW .  __FUNCTION__, compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view(self::PATH_VIEW .  __FUNCTION__, compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //

//        dd($request->all());
        $data = $request->validate([
            'first_name'    => 'required|string|max:100',
            'last_name'     => 'required|string|max:100',
            'email'         => 'required|email|max:100',
            'phone'         => ['
                                required',
                'string',
                'max:20',
                Rule::unique('employees')->ignore($employee->id)],

            'date_of_birth' => 'nullable|date',
            'hire_date'     => 'nullable|date',
            'salary'        => 'nullable|numeric|min:1000',
            'is_active'     => ['nullable', Rule::in(0,1)],
            'department_id' => 'nullable|integer|exists:departments,id',
            'manager_id'    => 'nullable|integer|exists:employees,id',
            'address'       => 'required|max:255',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1000',
        ]);

        try {
//            dd($request->hasFile('image'));
            $data['is_active'] ??= 0;
            if($request->hasFile('image')){
                $data['image'] = Storage::put('employees', $request->file('image'));
            }

            $currentPathImage = $employee->image;

            $employee->update($data);

            if($request->hasFile('image')
                && !empty($currentPathImage)
                && Storage::exists($currentPathImage)
            ){
                Storage::delete($currentPathImage);
            }

            return redirect()->route('employees.index')
                ->with('succes', true);
        } catch(\Throwable $th) {
            if(!empty($data['image'] && Storage::exists($data['image']))) {
                Storage::delete($data['image']);
            }

            return back()
                ->with('succes',false)
                ->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        try{
            $employee->delete();

            return back()->with('succes', true);
        }
        catch(\Throwable $th){
            return back()
                ->with('succes', false)
                ->with('error', $th->getMessage());
        }
    }
   /**
     *Force Remove the specified resource from storage.
     */
    public function ForceDestroy(Employee $employee)
    {
        try{

        if(!empty($employee->image) && Storage::exists($employee->image)){
            Storage::delete($employee->image);
        }

        $employee->forceDelete();

        return back()
                ->with('succes', true);

        }catch(\Throwable $th){
            return back()->with('succes', false)
                         ->with('error', $th->getMessage());
        }
    }
}
