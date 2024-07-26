<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class category extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        // Đây là nơi khai báo định dạng của API để gửi về cho người dùng
        return [
            'id' => $this->id,
            'category_name' => $this->category_name,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            //  ^
            //  |- cái này có thể đổi tên được cho người dùng dễ đọc dễ hiểu
        ];
    }
}
