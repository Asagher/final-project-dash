<?php

namespace App\Http\Controllers\my_controller;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\ShipmentLine;
use App\Models\ShippingRequest;
use Illuminate\Http\Request;

class OrderShipController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    if ($request) {
      //handel add Customers
      if (
        $request->has('national_id_s') &&
        !empty($request->national_id_s) &&
        $request->has('national_id_r') &&
        !empty($request->national_id_r)
      ) {
        $nationalIdS = $request->national_id_s;
        $nationalIdR = $request->national_id_r;

        $customerS = Customer::firstOrCreate(
          ['national_id' => $nationalIdS],
          [
            'first_name' => $request->first_name_s,
            'middle_name' => $request->middle_name_s,
            'last_name' => $request->last_name_s,
            'address' => $request->address_s,
            'phone' => $request->phone_s,
            'email' => $request->email_s,
          ]
        );

        $customerR = Customer::firstOrCreate(
          ['national_id' => $nationalIdR],
          [
            'national_id' => $request->national_id_r,
            'first_name' => $request->first_name_r,
            'middle_name' => $request->middle_name_r,
            'last_name' => $request->last_name_r,
            'address' => $request->address_r,
            'phone' => $request->phone_r,
            'email' => $request->email_r,
          ]
        );
      }

      $totalWeight = 0;
      $totalCost = 0;
      foreach ($request->lines as $line) {
        // add line weights
        $totalWeight += $line['total_wight'];
        $totalCost += $line['line_total_cost'];
      }
      // Shipment Create line and request

      $shippingRequest = ShippingRequest::create([
        'sender_customer_id' => $customerS->id,
        'receiver_customer_id' => $customerR->id,
        'status_id' => 1,
        'total_weight' => $totalWeight,
        'total_shipping_cost' => $totalCost,
        'shipping_delivery' => $request->shipping_delivery,
      ]);

      foreach ($request->lines as $line) {
        $shippingRequest->shipmentLines()->create([
          'category_id' => $line['category'],
          'quantity' => $line['quantity'],
          'total_weight' => $line['total_wight'],

          'line_total_cost' => $line['line_total_cost'],
        ]);
      }

      $shippingRequest->save();
      return response()->json(['message' => 'Done'], 200);
    } else {
      return response()->json(['message' => 'Have Error'], 422);
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
