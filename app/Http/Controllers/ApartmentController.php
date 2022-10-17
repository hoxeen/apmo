<?php

namespace App\Http\Controllers;


use App\Models\Apartment;
use App\Models\Mortgage;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function newEntity()
    {
        $mortgages = Mortgage::all();
        return view('createApartment', compact('mortgages'));
    }

    public function existsEntity($id)
    {
        $apartment = Apartment::query()->where('id', $id)->get()[0];
        $mortgages = Mortgage::all();
        return view('updateApartment', compact('apartment', 'mortgages'));
    }

    public function create(Request $request)
    {
        $result = $request->except('_token');
        $result['property'] = json_encode($result['property']);
        Apartment::create($result);
        return redirect()->action(
            [ApartmentController::class, 'newEntity']
        );
    }

    public function update(Request $request)
    {
        $entity = $request->except('_token');
        $entity['property'] = json_encode($entity['property']);
        Apartment::query()->where('id', $entity['id'])->update($entity);
        return redirect()->action(
            [ApartmentController::class, 'existsEntity'], ['id' => $entity['id']]
        );
    }

    public function list()
    {
        $entities = Apartment::all();
        for ($i = 0; $i < count($entities); $i++) {
            $entities[$i]['mortgage'] = Mortgage::query()->whereIn('id', json_decode($entities[$i]['property']))->get();
            for ($i2 = 0; $i2 < count($entities[$i]['mortgage']); $i2++) {
                $monthlyRate = $entities[$i]['mortgage'][$i2]['rate'] / 12 / 100;
                $totalRate = pow((1 + $monthlyRate), ($entities[$i]['mortgage'][$i2]['maximum_term'] * 12));
                $monthlyPayment = ($entities[$i]['price'] - $entities[$i]['mortgage'][$i2]['minimum_down_payment']) * $monthlyRate * $totalRate / ($totalRate - 1);
                $entities[$i]['mortgage'][$i2]['monthlyPayment'] = round($monthlyPayment);
            }
        }
        return view('listApartment', compact('entities'));
    }
}
