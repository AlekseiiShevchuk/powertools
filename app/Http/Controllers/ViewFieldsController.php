<?php

namespace App\Http\Controllers;

use App\ViewField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreViewFieldsRequest;
use App\Http\Requests\UpdateViewFieldsRequest;

class ViewFieldsController extends Controller
{
    /**
     * Display a listing of ViewField.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('view_field_access')) {
            return abort(401);
        }
        $view_fields = ViewField::all();

        return view('view_fields.index', compact('view_fields'));
    }

    /**
     * Show the form for creating new ViewField.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('view_field_create')) {
            return abort(401);
        }
        return view('view_fields.create');
    }

    /**
     * Store a newly created ViewField in storage.
     *
     * @param  \App\Http\Requests\StoreViewFieldsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreViewFieldsRequest $request)
    {
        if (! Gate::allows('view_field_create')) {
            return abort(401);
        }
        $view_field = ViewField::create($request->all());

        return redirect()->route('view_fields.index');
    }


    /**
     * Show the form for editing ViewField.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('view_field_edit')) {
            return abort(401);
        }
        $view_field = ViewField::findOrFail($id);

        return view('view_fields.edit', compact('view_field'));
    }

    /**
     * Update ViewField in storage.
     *
     * @param  \App\Http\Requests\UpdateViewFieldsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateViewFieldsRequest $request, $id)
    {
        if (! Gate::allows('view_field_edit')) {
            return abort(401);
        }
        $view_field = ViewField::findOrFail($id);
        $view_field->update($request->all());

        return redirect()->route('view_fields.index');
    }


    /**
     * Display ViewField.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('view_field_view')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::whereHas('available_fields',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get(),
        ];

        $view_field = ViewField::findOrFail($id);

        return view('view_fields.show', compact('view_field') + $relations);
    }


    /**
     * Remove ViewField from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('view_field_delete')) {
            return abort(401);
        }
        $view_field = ViewField::findOrFail($id);
        $view_field->delete();

        return redirect()->route('view_fields.index');
    }

    /**
     * Delete all selected ViewField at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('view_field_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ViewField::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
