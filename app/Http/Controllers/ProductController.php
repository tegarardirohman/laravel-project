<?php
namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return response()->json($this->productService->getAll(), 200);
    }

    public function show($id)
    {
        return response()->json($this->productService->getById($id), 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_product_id' => 'required|exists:category_products,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $product = $this->productService->create($request->all());

        return response()->json($product, 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_product_id' => 'required|exists:category_products,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $product = $this->productService->update($id, $request->all());

        return response()->json($product, 200);
    }

    public function destroy($id)
    {
        $this->productService->delete($id);

        return response()->json(null, 204);
    }
}
