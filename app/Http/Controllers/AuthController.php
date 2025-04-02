<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function products() {
        return response()->json(Product::all(), 200);
    }

    public function detail($id) {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json($product, 200);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'unit_price' => 'required|numeric',
            'promotion_price' => 'nullable|numeric',
            'unit' => 'required|string|max:50',
            'new' => 'required|boolean',
            'id_type' => 'required|integer|exists:type_products,id',
            'image' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $product = Product::create($validated);
        return response()->json($product, 201);
    }

    public function delete($id) {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $product->delete();
        return response()->json(['message' => 'Product deleted'], 200);
    }

    public function updateProduct(Request $request, $id) {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'unit_price' => 'sometimes|required|numeric',
            'promotion_price' => 'sometimes|nullable|numeric',
            'unit' => 'sometimes|required|string|max:50',
            'new' => 'sometimes|required|boolean',
            'id_type' => 'sometimes|required|integer|exists:type_products,id',
            'image' => 'sometimes|required|string',
            'description' => 'sometimes|nullable|string',
        ]);

        $product->update($validated);
        return response()->json($product, 200);
    }
}
