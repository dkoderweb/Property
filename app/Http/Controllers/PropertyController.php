<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Country;
use App\Models\PropertyImages;
use DataTables;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $property = Property::with('images')->get();

            // if(isset($input['select_columns'])){

            //     $string_columns = ['first_name','state','groupr_name','sales_rep','customer_account_status_name','address_line1','address_line2','city'];
                    
            //     $s_item = applyConditions($array, $input ,$string_columns);
    
            //     $result_array = $s_item;
            // }else{
            //     $result_array = $array;
            // }

            return DataTables::of($property)
            ->addColumn('action', function($property) {
                return '<a href="' . route('property.show', $property->id) . '" class="btn btn-info btn-sm">View</a>
                        <a href="' . route('property.edit', $property->id) . '" class="btn btn-primary btn-sm">Edit</a>
                        <form method="POST" action="' . route('property.destroy', $property->id) . '" style="display:inline">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this prop$property?\')">Delete</button>
                        </form>';
            })
            ->addColumn('city', function($branch) {
                return $branch->city->name;
            })
            ->addColumn('state', function($branch) {
                return $branch->state->name;
            })
            ->addColumn('country', function($branch) {
                return $branch->country->name;
            })
            ->rawColumns(['action'])
            ->make(true);
        
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::get(["name", "id"]);
        return view('property.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'type' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city_id' => 'required|string|max:255',
            'state_id' => 'required|string|max:255',
            'country_id' => 'required|string|max:255',
            'pincode' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'size_area' => 'required|integer',
            'status' => 'required|string|max:255',
            'furnishing_status' => 'required|string|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',  
        ]);
        $property = new Property();
        $property->fill($request->all());
        $property->save();


        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = $image->getClientOriginalName();
                $image->storeAs('public/images', $filename);
                $img = new PropertyImages;
                $img->image =  $filename;
                $img->user_id =  $property->id;
                $img->save();
            }
        }
        return redirect()->route('property.index')->with('success', 'Property created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::with('images')->find($id);

        return view('property.view',compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
