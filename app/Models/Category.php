<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Kết nối với tên bảng ở trên phpMyAdmin
    protected $table = 'category';

    // Tạo khóa chính (nếu khóa chính không phải là id mã tự tăng)
    // public $primaryKey = 'id';

    // Định nghĩa các cột cần điền vào ở các hành động create / update
    protected $fillable = ['category_name'];
}
