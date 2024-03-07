<?php

namespace App\Http\Controllers;

use App\Models\Tournment_Category;
use App\Models\TournmentCategory;
use Illuminate\Http\Request;

class TournmentCategoryController extends Controller
{
    public function show()
    {
        $categories = TournmentCategory::select('id', 'name', 'description')->get();
        return view('Category.Categorydashboard')->with('categories', $categories);
    }
    public function addcategoryform()
    {
        return view("Category.addcategory");
    }
    public function addcategory(Request $request)
    {
        $request->validate([
            'categoryname' => 'required|string|min:0|max:255',
            'categorydescription' => 'required|string|min:0|max:255',
        ]);
        TournmentCategory::create(
            [
                'name' => $request->categoryname,
                'description' => $request->categorydescription,
            ]
        );
        return redirect('/categorydashboard');
    }
    public function showupdate($id)
    {
        $category = TournmentCategory::find($id);
        return view('Category.updatecategory')->with('id', $id)->with('category', $category);
    }
    public function update(Request $request, $id)
    {
        $tour_category = TournmentCategory::findorFail($id);
        $tour_category->update([
            'name' => $request->categoryname,
            'description' => $request->categorydescription,
        ]);
        return redirect('/categorydashboard');
    }
    public function confirmdelete($id){
        return view("Category.ConfirmDelete")->with('id',$id);
    }
    public function delete($id){
        TournmentCategory::findorFail($id)->delete();
        return redirect('/categorydashboard');
    }
}
