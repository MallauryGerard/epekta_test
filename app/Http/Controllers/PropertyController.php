<?php

namespace App\Http\Controllers;

use App\Enums\LangsEnum;
use App\Models\Property;
use App\Models\Property_description;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $properties = Property::with(['descriptions' => function($query) {
            return $query->where('lang', strtoupper(App::currentLocale()));
        }])->get();

        return view('property.index', ['properties' => $properties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('property.create');
    }

    /**
     * Store a newly created resource in storage.

     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $rules = [
            'images' => [],
            'images.*' => ['image'],
            'price' => ['required', 'integer', 'min:10000', 'max:10000000'],
            'address' => ['required', 'string', 'min:2', 'max:255'],
        ];
        foreach (LangsEnum::toValues() as $lang) {
            $rules['description_' . $lang] = ['required'];
        }
        $validated = $request->validate($rules);

        $property = new Property();
        $property->price = $validated['price'];
        $property->address = $validated['address'];
        $property->user_id = auth()->user()->id;
        $property->save();

        $descriptions = [];
        foreach (LangsEnum::toValues() as $lang) {
            $description = new Property_description();
            $description->lang = $lang;
            $description->description = $validated['description_' . $lang];
            $descriptions[] = $description;
        }

        $property->descriptions()->saveMany($descriptions);

        // TODO photos

        return redirect(route('property.index'))->with('success', __('Property has been created!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Property $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Property $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        return view('property.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Property $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Property $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        Property::destroy($property->id); // Descriptions are automatically destroyed thank to "ONDELETE CASCADE".

        return redirect(route('property.index'))->with('success', __('Property has been deleted!'));
    }
}
