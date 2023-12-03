<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles =[
            ['name'=>'super-admin', 'display_name'=>'admin', 'group'=>'system','description'=>'The name of the'],
            ['name'=>'thu-thu', 'display_name'=>'Thủ thư', 'group'=>'system','description'=>''],
            ['name'=>'can-bo-thu-vien', 'display_name'=>'Cán bộ thư viện', 'group'=>'user','description'=>''],
            ['name'=>'giang-vien', 'display_name'=>'Giáo viên', 'group'=>'user','description'=>'The name of the'],
        ];
        foreach($roles as $role){
            Role::updateOrCreate($role);
        }

        $permissions =[
            ['name'=>'show-user', 'display_name'=>'Xem ', 'group'=>'Tài khoản'],
            ['name'=>'create-user', 'display_name'=>'Thêm mới', 'group'=>'Tài khoản'],
            ['name'=>'edit-user', 'display_name'=>'Sửa', 'group'=>'Tài khoản'],
            ['name'=>'delete-user', 'display_name'=>'Xóa', 'group'=>'Tài khoản'],

            ['name'=>'show-role', 'display_name'=>'Xem', 'group'=>'Chức năng'],
            ['name'=>'create-role', 'display_name'=>'Thêm mới', 'group'=>'Chức năng'],
            ['name'=>'edit-role', 'display_name'=>'Sửa', 'group'=>'Chức năng'],
            ['name'=>'delete-role', 'display_name'=>'Xóa', 'group'=>'Chức năng'],

            ['name'=>'show-reader', 'display_name'=>'Xem', 'group'=>'Bạn đọc'],
            ['name'=>'create-reader', 'display_name'=>'Thêm mới', 'group'=>'Bạn đọc'],
            ['name'=>'edit-reader', 'display_name'=>'Sửa', 'group'=>'Bạn đọc'],
            ['name'=>'delete-reader', 'display_name'=>'Xóa', 'group'=>'Bạn đọc'],

            ['name'=>'show-category', 'display_name'=>'Xem', 'group'=>'Thể loại'],
            ['name'=>'create-category', 'display_name'=>'Thêm mới', 'group'=>'Thể loại'],
            ['name'=>'edit-category', 'display_name'=>'Sửa', 'group'=>'Thể loại'],
            ['name'=>'delete-category' , 'display_name'=>'Xóa', 'group'=>'Thể loại'],

            ['name'=>'show-publisher', 'display_name'=>'Xem', 'group'=>'Nhà xuất bản'],
            ['name'=>'create-publisher', 'display_name'=>'Thêm mới', 'group'=>'Nhà xuất bản'],
            ['name'=>'edit-publisher', 'display_name'=>'Sửa', 'group'=>'Nhà xuất bản'],
            ['name'=>'delete-publisher', 'display_name'=>'Xóa', 'group'=>'Nhà xuất bản'],

            ['name'=>'show-author', 'display_name'=>'Xem', 'group'=>'Tác giả'],
            ['name'=>'create-author', 'display_name'=>'Thêm mới', 'group'=>'Tác giả'],
            ['name'=>'edit-author' , 'display_name'=>'Sửa', 'group'=>'Tác giả'],
            ['name'=>'delete-author', 'display_name'=>'Xóa', 'group'=>'Tác giả'],

            ['name'=>'show-book', 'display_name'=>'Xem', 'group'=>'Ấn phẩm'],
            ['name'=>'create-book', 'display_name'=>'Thêm mới', 'group'=>'Ấn phẩm'],
            ['name'=>'edit-book', 'display_name'=>'Sửa', 'group'=>'Ấn phẩm'],
            ['name'=>'delete-book', 'display_name'=>'Xóa', 'group'=>'Ấn phẩm'],

            ['name'=>'Xem Phiếu mượn', 'display_name'=>'Xem', 'group'=>'QL mượn'],
            ['name'=>'Thêm mới Phiếu mượn', 'display_name'=>'Thêm mới', 'group'=>'QL mượn'],
            ['name'=>'Sửa Phiếu mượn', 'display_name'=>'Sửa', 'group'=>'QL mượn'],
            ['name'=>'Xóa Phiếu mượn', 'display_name'=>'Xóa', 'group'=>'QL mượn'],

            ['name'=>'Xem Phiếu trả', 'display_name'=>'Xem', 'group'=>'QL trả'],
            ['name'=>'Thêm mới Phiếu trả', 'display_name'=>'Thêm mới', 'group'=>'QL trả'],
            ['name'=>'Sửa Phiếu trả', 'display_name'=>'Sửa', 'group'=>'QL trả'],
            ['name'=>'Xóa Phiếu trả', 'display_name'=>'Xóa', 'group'=>'QL trả'],
        ];
        foreach($permissions as $permissions){
            Permission::updateOrCreate($permissions);
        }

        // $admin = User::where('anhuynhadmin@gmail.com')->first();

        
            // $admin = User::factory()->create([
            //     'email' => 'anhuynhadmin@gmail.com',
            //     'password' => '1234432',
            // ]);
            // $admin->assignRole('super-admin');
        

    }
}
