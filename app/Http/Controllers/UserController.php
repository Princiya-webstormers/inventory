<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Http\Requests\SaveUserRequest;
use App\Http\Requests\SaveCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Customer;
use App\Models\User;
use App\Service\UserService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Crypt;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->middleware('auth');
        $this->userService = $userService;
    }
    public function create()
    {
        return $this->userService->create();
    }
    public function index(Request $request)
    {
        return $this->userService->index($request);
    }

    public function store(SaveUserRequest $request){
        return $this->userService->store($request->validated());
    }
    public function edit(User $user) {
        $type = auth()->user()->type;
        if($type == UserType::SUPERADMIN){
            return view('backend.user.user', [
                'edit'=>$user,
                'role' => Role::get(),
            ]);
        }
    }
    public function update(UpdateUserRequest $request, User $user){
        return $this->userService->update($request->validated(), $user);
    }

    public function destroy(User $user){
        return $this->userService->destroy($user);
    }

    public function roleIndex(Request $request){
        return $this->userService->roleIndex($request);
    }
    public function roleCreate()
    {
        return view('backend.role.add_role',['data' => $this->userService->roleCreate()]);
    }
    public function roleStore(Request $request)
    {
        return $this->userService->roleStore($request);
    }
    public function roleEdit($id) {
        $decrypted = \Crypt::decrypt($id);
        $role = Role::where('id',$decrypted)->first();

        $role_permission = Role::where('id',$decrypted)->with('permissions')->get();
        $all_permissions = Permission::get();
        $permission = Permission::whereIn('id',$role_permission[0]->permissions->pluck('id'))->get();
        $data = $temp = [];
        foreach($all_permissions as $all){
            $permission_name = $all->name;
            foreach($permission as $value){
                if($all->name == $value->name){
                    $temp[] = $value->name;
                    $data[$all->permission_group][] = ['permission_name'=>$all->name,'status'=>1];
                }
            }
            if(!in_array($permission_name,$temp)){
                $data[$all->permission_group][] = ['permission_name'=>$all->name,'status'=>0];
            }
        }
        return view('backend.role.add_role', [
            'edit' => $role,
            'data' => $data,
        ]);
    }
    public function roleUpdate(Request $request, $id){
        return $this->userService->roleUpdate($request, $id);
    }
    public function roleDestroy($id){
        return $this->userService->roleDestroy($id);
    }
    public function forgetPassword()
    {
        return view('frontend.forget');
    }


}
