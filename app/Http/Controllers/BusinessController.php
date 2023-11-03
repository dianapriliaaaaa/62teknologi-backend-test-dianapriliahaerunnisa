<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Business;

class ExampleController extends Controller
{

    public function storeBusiness()
    {
        try {

        $data = $request->all();
        $business = new Business($data);
        $business->save();


        return response()->json([
                'success' => 'Data berhasil disimpan',
                'data'  => $business
            ], 200);
        } catch (\Exception $e) {
            \Log::error('Error: ' . $e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan dalam server'], 500);
        }
    }

    public function updateBusiness(Request $request, $id)
    {
        $business = Business::find($id);

        if (!$business) {
            return response()->json(['message' => 'data not found'], 404);
        }

        $business->update($request->all());
        return response()->json($business);
    }

    public function destroyBusiness($id)
    {
        $business = Business::find($id);
        if (!$business) {
            return response()->json([
                'success' => false,
                'message' => 'data not found',
            ], 404);
        }
        $result = $business->delete();
        if ($result) {
            return response()->json([
                'success' => true,
                'message' => 'data has been deleted',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete data',
            ], 500);
        }
    }

    public function searchBusiness(Request $request)
    {
        $query = Business::query();

        if ($request->has('location')) {
            $query->where('location', 'like', '%' . $request->input('location') . '%');
        }
        if ($request->has('latitude')) {
            $query->where('latitude', 'like', '%' . $request->input('latitude') . '%');
        }
        if ($request->has('longitude')) {
            $query->where('longitude', 'like', '%' . $request->input('laongitude') . '%');
        }
        if ($request->has('term')) {
            $query->where('term', 'like', '%' . $request->input('term') . '%');
        }
        if ($request->has('radius')) {
            $query->where('radius', 'like', '%' . $request->input('radius') . '%');
        }

        $businesses = $query->get();

        return response()->json($businesses, 200);
    }
}