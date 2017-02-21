<?php

namespace App\Http\Controllers\Api\V1;

use App\ViewField;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreViewFieldsRequest;
use App\Http\Requests\UpdateViewFieldsRequest;

class ViewFieldsController extends Controller
{
    public function index()
    {
        return ViewField::all();
    }

    public function show($id)
    {
        return ViewField::findOrFail($id);
    }

    public function update(UpdateViewFieldsRequest $request, $id)
    {
        $view_field = ViewField::findOrFail($id);
        $view_field->update($request->all());

        return $view_field;
    }

    public function store(StoreViewFieldsRequest $request)
    {
        $view_field = ViewField::create($request->all());

        return $view_field;
    }

    public function destroy($id)
    {
        $view_field = ViewField::findOrFail($id);
        $view_field->delete();
        return '';
    }
}
