<?php

namespace App\Service;

use App\Enums\CompressorStatus;
use App\Enums\UserType;
use App\Models\Customer;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DataTables;
use Crypt;
use Illuminate\Support\Facades\Crypt as FacadesCrypt;
use Illuminate\Support\Facades\Storage;

class UserService
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function create()
    {
        $type = auth()->user()->type;
        if($type == UserType::SUPERADMIN){
            return view('backend.user.user',['role' => Role::get()]);
        }else{
            return view('frontend.user.customer');
        }
    }
    public function index($request)
    {
        if ($request->ajax()) {
            $data = User::where('type',UserType::ADMIN)->orderBy('id','desc')->get();
            return Datatables::of($data)
            ->addIndexColumn()
                ->addColumn('date', function ($row) {
                    $btn = $row['created_at'];
                    return $btn;
                })
                ->addColumn('first_name', function ($row) {
                    $btn = $row['first_name'] ?? '-';
                    return $btn;
                })
                ->addColumn('email', function ($row) {
                    $btn = $row['email'] ?? "-";
                    return $btn;
                })
                ->addColumn('mobile', function ($row) {
                    $btn = $row['mobile'] ?? "-";
                    return $btn;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="dropdown user-card">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end ">
                            <a href="' . url('/super-admin/user/' . Crypt::encrypt($row['id']) . '/edit') . '" class="dropdown-item course_dropdown">Edit<span><i class="fas fa-pen menu_icon float-end"></i></span></a>
                            <a href="javascript:void(0)" data-id="' . Crypt::encrypt($row['id']) . '" class="dropdown-item course_dropdown delete">Delete<span><i class="fas fa-trash-alt menu_icon float-end"></i></span></a>
                            </div>
                            </div>';
                            return $btn;
                            // <a data-id="{{Crypt::encrypt($value->id)}}" data-value="{{$value->status == '1' ? "0" : "1"}}" class="dropdown-item course_dropdown status-change">{{$value->status == '1' ? "Disable" : "Enable"}}<span><i class="fas fa-toggle-on menu_icon float-end"></i></span></a>
                })
                ->rawColumns(['date','first_name','email', 'mobile','action'])
                ->make(true);
        }
        return view('backend.user.user_index');
    }

    public function store(array $data)
    {
        DB::beginTransaction();
        $user = new User();
        $data['type'] = UserType::ADMIN;
        if($data['role'] ?? null){
            $role = $data['role'];
        }
        if($role ?? null){
            $user->assignRole($role);
        }
        $user->fill($data);
        $user->save();

        DB::commit();
        session()->flash("success", "User has been successfully created!");
        return redirect('/super-admin/dashboard');
    }
    public function update(array $data, User $user)
    {
        DB::beginTransaction();
        if($data['role'] != null){
            $role = $data['role'];
        }
        $data['type'] = UserType::ADMIN;
        $user->fill($data);
        $user->save();
        if($data['role'] != null){
            $user->syncRoles($role);
        }
        DB::commit();
        session()->flash("success", "User has been successfully Updated!");
        return redirect('/super-admin/dashboard');
    }

    public function destroy($user)
    {
        $user->delete();
        return ['status'=>'1'];
    }
    public function roleCreate()
    {
        $permission = Permission::get()->groupBy('permission_group');
        // dd($permission->toArray());
        return $permission;
    }

    public function roleIndex($request){
        if ($request->ajax()) {
            $data = Role::orderBy('id','desc')->get();
            return Datatables::of($data)
            ->addIndexColumn()
                ->addColumn('date', function ($row) {
                    $btn = $row['created_at'];
                    return $btn;
                })
                ->addColumn('role', function ($row) {
                    $btn = $row['name'] ?? '-';
                    return $btn;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="dropdown user-card">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end "><a href="' . url('/super-admin/role/' . Crypt::encrypt($row['id']) . '/edit') . '" class="dropdown-item course_dropdown">Edit<span><i class="fas fa-pen menu_icon float-end"></i></span></a>
                            <a data-id="' . Crypt::encrypt($row['id']) . '" class="dropdown-item course_dropdown delete">Delete<span><i class="fas fa-trash-alt menu_icon float-end"></i></span></a>
                                </div>
                            </div>';
                    return $btn;
                })
                ->rawColumns(['date','role','action'])
                ->make(true);
        }
        // session()->flash("success", "Role has been Successfully Created!");
        return view('backend.role.role_index');
    }

    public function roleStore($request)
    {
        $role = new Role;
        $role->name = $request->role_name;
        $role->save();
        $permission = $request->permission_id;
        foreach($permission as $permissions){
            $role->givePermissionTo($permissions);
        }
        session()->flash("success", "Role has been successfully created!");
        return redirect('/super-admin/role');
    }

    public function roleUpdate($request, $id)
    {
        DB::beginTransaction();
        $i = \Crypt::decrypt($id);
        $role = Role::where('id',$i)->first();
        $role->name = $request->role_name;
        $role->save();
        $permission = $request->permission_id;
        $role->syncPermissions($permission);
        DB::commit();
        session()->flash("success", "Role has been successfully Updated!");
        return redirect('/super-admin/role');
    }

    public function roleDestroy($id)
    {
        Role::where('id',\Crypt::decrypt($id))->delete();
        return ['status'=>'1'];
    }

}
