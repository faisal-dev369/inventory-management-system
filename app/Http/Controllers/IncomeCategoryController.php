<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\IncomeCategory;
use Carbon\Carbon;
use Session;
use Auth;
use DB;

class IncomeCategoryController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }
    public function add(){

        return view('admin.income.category.add');

    }

    public function insert(Request $request)
    {
    // Validation
    $request->validate([
        'incate_name'    => 'required|unique:income_categories,incate_name|max:50',
        'incate_remarks' => 'nullable|max:200',
    ], [
        'incate_name.required' => 'Category name is required!',
        'incate_name.unique'   => 'This category already exists!',
        'incate_name.max'      => 'Category name must not exceed 50 characters.',
        'incate_remarks.max'   => 'Remarks must not exceed 200 characters.',
    ]);
    // $slug = 'IC' . uniqid();
    $slug = Str::slug($request->incate_name, '-');
    $creator = Auth::user()->id;
    // Data Insert
    IncomeCategory::insert([
        'incate_name'    => $request->incate_name,
        'incate_remarks' => $request->incate_remarks,
        'incate_creator' =>  $creator,
        'incate_slug' =>  $slug,

        'created_at'     => Carbon::now()->toDateTimeString(),
    ]);

     return redirect('/dashboard/income/category')
     //->back()
     ->with('success', 'Income Category inserted successfully!');

    }

    public function index(){
    $allData = IncomeCategory::where('incate_status', 1)
                ->orderBy('incate_id', 'DESC')
                ->get();

    return view('admin.income.category.all', compact('allData'));
    }


    public function edit($slug){
        $data =IncomeCategory::where('incate_status', 1)
        ->where('incate_slug', $slug)
        ->firstorfail();

       return view('admin.income.category.edit', compact('data')); 
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'incate_name'    => 'required|unique:income_categories,incate_name,' . $id . ',incate_id|max:50',
            'incate_remarks' => 'nullable|max:200',
        ], [
            'incate_name.required' => 'Category name is required!',
            'incate_name.unique'   => 'This category already exists!',
            'incate_name.max'      => 'Category name must not exceed 50 characters.',
            'incate_remarks.max'   => 'Remarks must not exceed 200 characters.',
        ]);

        $slug = Str::slug($request->incate_name, '-');
        $creator = Auth::user()->id;

        IncomeCategory::where('incate_status', 1)
            ->where('incate_id', $id)
            ->update([
                'incate_name'    => $request->incate_name,
                'incate_remarks' => $request->incate_remarks,
                'incate_editor'  => $creator,
                'incate_slug'    => $slug,
                'updated_at'     => Carbon::now(),
            ]);

        return redirect('/dashboard/income/category/view/'.$slug)
            ->with('success', 'Income Category updated successfully!');
    }

    public function view($slug)
    {
    $data =IncomeCategory::where('incate_status', 1)
        ->where('incate_slug', $slug)
     ->firstorfail();

    return view('admin.income.category.view', compact('data'));
    }

    public function softdelete($id){

        $category = IncomeCategory::findOrFail($id);
        $category->delete(); // sets deleted_at timestamp
        return redirect('/dashboard/income/category')
               ->with('success', 'Income Category soft deleted successfully!');
        
    }
    // Hard Delete
    public function delete($id){
        $category = IncomeCategory::withTrashed()->findOrFail($id);
        $category->forceDelete(); // permanently remove
        return redirect('/dashboard/income/category')
               ->with('success', 'Income Category permanently deleted!');
    }
    public function restore($id){

        $category = IncomeCategory::withTrashed()->findOrFail($id);
        $category->restore(); // deleted_at = null
        return redirect('/dashboard/income/category')
               ->with('success', 'Income Category restored successfully!');
        
    }

}
