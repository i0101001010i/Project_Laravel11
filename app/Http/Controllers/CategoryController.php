<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Đừng quên import model và resource API của nó vào nha
use App\Models\Category;
use App\Http\Resources\category as CategoryResource;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        
        $arr = [
            'status' => true,
            'message' => "Danh sách category",
            'data' => CategoryResource::collection($categories),
        ];
        return response()->json($arr, 200);
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
        // lấy tất cả input từ người dùng
        $input = $request->all();

        // Kiểm tra dữ liệu
        $validator = Validator::make($input, [
            'category_name' => 'required',
        ]);

        // Nếu fail
        if($validator->fails()) {
            $arr = [
                'success' => false,
                'message' => "Lỗi kiểm tra dữ liệu",
                'data' => $validator->errors()
            ];
            return response()->json($arr, 200);
        }

        // Nếu thành công
        $category = Category::create($input);
        $arr = [
            'status' => true,
            'message' => "Đã lưu category mới",
            'data' => new CategoryResource($category),
        ];
        return response()->json($arr, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        if(is_null($category)) {
            $arr = [
                'status' => false,
                'message' => "Không có category này",
                'data' => [],
            ];
            return response()->json($arr, 200);
        }

        $arr = [
            'status' => true,
            'message' => "Chi tiết category",
            'data' => new CategoryResource($category),
        ];
        return response()->json($arr, 201);
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
    public function update(Request $request, Category $category)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'category_name' => 'required',
        ]);

        if($validator->fails()) {
            $arr = [
                'success' => false,
                'message' => "Lỗi kiểm tra dữ liệu",
                'data' => $validator->errors()
            ];
            return response()->json($arr, 200);
        }

        $category->category_name = $input['category_name'];
        $category->save();
        $arr = [
            'status' => true,
            'message' => "Cập nhật category",
            'data' => new CategoryResource($category),
        ];
        return response()->json($arr, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        $arr = [
            'status' => true,
            'message' => "Đã xóa category",
            'data' => [],
        ];
        return response()->json($arr, 200);
    }
}
