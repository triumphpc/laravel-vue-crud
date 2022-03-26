<?php
namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Product;

/**
 * Controller for product model
 *
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * Main page view
     *
     * @return array
     */
    public function index(): array {
        $products = Product::all()->toArray();

        return array_reverse($products);
    }

    /**
     * Save handler
     *
     * @param Request $request Request object
     *
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse {
        $product = new Product([
            Product::FIELD_NAME => $request->input("name"),
            Product::FIELD_DETAIL => $request->input("detail"),
        ]);

        $product->save();

        return response()->json("Product created!");
    }

    /**
     * Get product data
     *
     * @param $id Product identifier
     *
     * @return JsonResponse
     */
    public function show($id): JsonResponse {
        $product = Product::find($id);

        return response()->json($product);
    }

    /**
     *
     * Update product details
     *
     * @param $id Product identifier
     * @param Request $request Request object
     *
     * @return JsonResponse
     */
    public function update($id, Request $request): JsonResponse {
        $product = Product::find($id);
        $product->update($request->all());

        return response()->json("Product updated!'");
    }

    /**
     * Delete product
     *
     * @param $id Product identifier
     *
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse {
        $product = Product::find($id);
        $product->delete();

        return response()->json("Product deleted!");
    }
}
