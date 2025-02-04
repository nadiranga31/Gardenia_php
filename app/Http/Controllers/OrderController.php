<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{
    protected $product;
    public function __construct(){
        $this->product = new Order();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Order::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'foodname' => 'required|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'name' => 'required|max:255',
            'phone' => 'required|numeric',
            'address' => 'required|max:255',
      ]);


        $product = Order::create($validatedData);


        return response()->json(['message' => 'Product created successfully', 'Product' => $product], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Order::find($id);


        // Check if the product was found
       if ($product) {
      // Return the product as a JSON response with a 200 HTTP status code
           return response()->json($product, 200);
       } else {
   // Return a 404 Not Found HTTP status code if the product was not found
      return response()->json(['message' => 'Product not found'], 404);
   }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Order::find($id);



      // Check if the product was found
      if ($product) {

        $validatedData = $request->validate([
            'foodname' => 'required|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'name' => 'required|max:255',
            'phone' => 'required|numeric',
            'address' => 'required|max:255',
      ]);

      // Update the product with the validated data
      $product->update($validatedData);



        // Return the updated product as a JSON response with a 200 HTTP status code
         return response()->json($product, 200);
      } else {
        // Return a 404 Not Found HTTP status code if the product was not found
        return response()->json(['message' => 'Product not found'], 404);
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $product = Order::find($id);

        if ($product) {
            // Delete the product
            $product->delete();


            // Return a 204 No Content HTTP status code
            return response()->json([
                "message" => "Order deleted successfully"
            ], 204);
          } else {
            // Return a 404 Not Found HTTP status code if the product was not found
            return response()->json(['message' => 'Product not found'], 404);
          }
    }
}
