<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $user;
    protected $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }


    public function index()
    {
        $users = $this->user->latest('id')->paginate(5);
        $roles = $this->role->all()->groupBy('group');
        return View('admin.user.index', compact('users'))->with([
            'pageTitle' => 'Hệ thống',
            'pageSubtitle' => 'Tài khoản',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->role->all()->groupBy('group');
        return View('admin.user.create', compact('roles'))->with([
            'pageTitle' => 'Tài khoản',
            'pageSubtitle' => 'Tạo tài khoản',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $dataCreate = $request->all();
        $dataCreate['password'] = Hash::make($request->password);
        $dataCreate['image'] = $this->user->saveImage($request);

        $user = $this->user->create($dataCreate);
        $user->images()->create(['url' => $dataCreate['image']]);
        $user->roles()->attach($dataCreate['role_ids']);
        return to_route('users.index')->with(['message'=> 'Tạo mới thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $user = $this->user->findOrFail($id)->load('roles');
         $roles = $this->role->all()->groupBy('group');
         return View('admin.user.edit', compact('user','roles'))->with([
            'pageTitle' => 'Tài khoản',
            'pageSubtitle' => 'Sửa tài khoản',
        ]);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->user->findOrFail($id)->load('roles');
        $dataUpdate = $request->except('password');
        if($request->password){
            $dataCreate['password'] = Hash::make($request->password);
        }
        $currentImage = $user->images ? $user->images->first()->url : '';
        $dataUpdate['image'] = $this->user->updateImage($request, $currentImage);



        $user->update($dataUpdate);
        $user->images()->updateOrCreate(['url' => $dataUpdate['image']]);
        $user->roles()->sync($dataUpdate['role_ids'] ?? []);
        return to_route('users.index')->with(['message'=> 'Chỉnh sửa thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->user->findOrFail($id)->load('roles');

        $imageName = $user->images->count()>0 ? $user->images->first()->url : '';
        $this->user->deleteImage($imageName);
        $user->images()->delete();
        $user->delete();
        return to_route('users.index')->with(['message'=> 'Xóa thành công']);



    }
}
