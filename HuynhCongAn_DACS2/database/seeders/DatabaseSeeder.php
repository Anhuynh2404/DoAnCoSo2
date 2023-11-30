<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories =[
            ['name'=>'VĂN HỌC'],
            ['name'=>'KINH TẾ'],
            ['name'=>'GIÁO KHOA - THAM KHẢO'],
            ['name'=>'TÂM LÝ - KĨ NĂNG SỐNG'],
            ['name'=>'SÁCH HỌC NGOẠI NGỮ'],
            ['name'=>'CÔNG NGHỆ THÔNG TIN'],
            ['name'=>'GIÁO TRÌNH'],
            ['name'=>'ĐỀ TÀI KHOA HỌC'],
            ['name'=>'TẠP CHÍ'],

        ];
        foreach($categories as $category){
            Category::updateOrCreate($category);
        }

        $authors =[
            ['name'=>'Huỳnh Công An'],
            ['name'=>'Nam Cao'],
            ['name'=>'Tố Hữu'],
            ['name'=>'Ngô Tất Tố'],
            ['name'=>'Đặng Thị Thương Hùa'],
            ['name'=>'Võ Văn Minh Nhật'],
            ['name'=>'Lionel Messi'],
            ['name'=>'Gabriel Matineli'],
            ['name'=>'Gabriel Jesus'],
            ['name'=>'Wiliam Saliba'],
            ['name'=>'Ben White'],
            ['name'=>'Thomas Patey'],

        ];
        foreach($authors as $author){
            Author::updateOrCreate($author);
        }

        $publishers =[
            ['name'=>'NXB Kim Đồng','address' => 'Q4, TP Hồ Chí Minh','phone' => '0376087754','email' => 'kimdong@kd.nxb.vn'],
            ['name'=>'NXB Tuổi Trẻ','address' => 'Hà Nội','phone' => '044666655','email' => 'tuoitrehanoi@tthn.nxb.vn'],
            ['name'=>'NXB HelloKitty','address' => 'Đông Tháp','phone' => '842565611','email' => 'hellokitty@kd.nxb.vn'],
            ['name'=>'NXB GD và ĐT Việt Nam','address' => ' TP Hồ Chí Minh','phone'=> '8465952331','email' => 'dgvadt@udn.nxb.vn'],
            ['name'=>'NXB CNTT và TT Việt Hàn','address' => 'Ngũ Hành Sơn, TP Đà Nẵng','phone'=> '84999964561','email' => 'cnttvatt@vku.nxb.vn'],
            ['name'=>'NXB udnBOOK','address' => 'Điện Bàn, Quảng Nam','phone'=> '8499900056','email' => 'book@vku.nxb.vn'],
            ['name'=>'NXB Đà Nẵng','address' => 'Q4, TP Hồ Chí Minh','phone'=> '84659545232','email' => 'danangbook@kd.nxb.vn'],
        ];
        foreach($publishers as $publisher){
            Publisher::updateOrCreate($publisher);
        }
    }
}
