<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyInquery;

class PropertyInqueryController extends Controller
{
    public function index()
    {
        $propertyInqueries = PropertyInquery::all();
        return view('admin.property-inquery.index', compact('propertyInqueries'));
    }

    public function show($id)
    {
        $data = PropertyInquery::find($id);
        return view('admin.property-inquery.show', compact('data'));
    }
}
