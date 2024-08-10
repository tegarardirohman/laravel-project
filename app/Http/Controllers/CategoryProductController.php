<?php

namespace App\Http\Controllers;

use App\Services\CategoryProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryProductController extends Controller
{
    protected $categoryProductService;

    public function __construct(CategoryProductService $categoryProductService)
    {
        $this->categoryProductService = $categoryProductService;
    }

    public function index()
    {
        return response()->json($this->categoryProductService->getAll(), 200);
    }

    public function show($id)
    {
        return response()->json($this->categoryProductService->getById($id), 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $categoryProduct = $this->categoryProductService->create($request->all());

        return response()->json($categoryProduct, 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $categoryProduct = $this->categoryProductService->update($id, $request->all());

        return response()->json($categoryProduct, 200);
    }

    public function destroy($id)
    {
        $this->categoryProductService->delete($id);

        return response()->json(null, 204);
    }
}
