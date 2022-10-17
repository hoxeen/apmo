<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Mortgage;
use Illuminate\Http\Request;

class MortgageController extends Controller
{
    public function newEntity() {
//        $entity = Apartment::all();
        return view('createMortgage');
    }

    public function create(Request $request) {
        Mortgage::create($request->except('_token'));
    }

    public function existsEntity($id)
    {

        $mortgage = Mortgage::query()->where('id', $id)->get()[0];




        return view('updateMortgage', compact('mortgage'));
    }

    public function update(Request $request)
    {
        $entity = $request->except('_token');
        Mortgage::query()->where('id', $entity['id'])->update($entity);
        return redirect()->action(
            [MortgageController::class, 'existsEntity'], ['id' => $entity['id']]
        );
    }

    public function list()
    {
        $entities = Mortgage::all();
        return view('listMortgage', compact('entities'));
    }


}
