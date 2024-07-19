<?php

namespace App\Service;

use App\Enums\UserType;
use App\Models\Inventory;
use App\Models\InventoryLog;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use DataTables;
use Crypt;
use Illuminate\Support\Facades\Auth;

class InventoryService
{
    public function index($request)
    {
        if ($request->ajax()) {
            $data = Inventory::orderBy('id','desc')->get();
            return Datatables::of($data)
            ->addIndexColumn()
                ->addColumn('date', function ($row) {
                    $btn = $row['created_at'];
                    return $btn;
                })
                ->addColumn('name', function ($row) {
                    $btn = $row['name'];
                    return $btn;
                })
                ->addColumn('quantity', function ($row) {
                    $btn = $row['quantity'] ?? "-";
                    return $btn;
                })
                ->addColumn('price', function ($row) {
                    $btn = '₹'.number_format($row['price'],2) ?? "-";
                    return $btn;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="dropdown user-card">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-start ">';
                    if(auth()->user()->type == UserType::ADMIN && Auth::user()->hasPermissionTo('Inventory Edit')){
                        $btn = $btn.'<a href="' . url('/admin/product/' . Crypt::encrypt($row['id']) . '/edit') . '" class="dropdown-item course_dropdown">Edit<span><i class="fas fa-pen menu_icon float-end"></i></span></a>';
                    }else{
                        $btn = $btn.'<a href="' . url('/super-admin/product/' . Crypt::encrypt($row['id']) . '/edit') . '" class="dropdown-item course_dropdown">Edit<span><i class="fas fa-pen menu_icon float-end"></i></span></a>';
                    }
                    if(auth()->user()->type == UserType::ADMIN && Auth::user()->hasPermissionTo('Inventory Delete')){
                        $btn = $btn.' <a href="javascript:void(0)" data-id="' . Crypt::encrypt($row['id']) . '" class="dropdown-item course_dropdown delete">Delete<span><i class="fas fa-trash-alt menu_icon float-end"></i></span></a>';
                    }else{
                        $btn = $btn.' <a href="javascript:void(0)" data-id="' . Crypt::encrypt($row['id']) . '" class="dropdown-item course_dropdown delete">Delete<span><i class="fas fa-trash-alt menu_icon float-end"></i></span></a>';
                    }
                    $btn = $btn.'</div>
                        </div>';
                    return $btn;
                })
                ->rawColumns(['date','name','quantity', 'price', 'action'])
                ->make(true);
        }
        return view('backend.inventory.inventory_index');
    }
    public function store(array $data)
    {
        DB::beginTransaction();
        $inventory = new Inventory();
        $inventory->fill($data);
        $inventory->save();
        $inventoryLog = new InventoryLog();
        $data['user_id'] = auth()->user()->id;
        $data['item_id'] = $inventory['id'];
        $data['new_quantity'] = $inventory['quantity'];
        $inventoryLog->fill($data);
        $inventoryLog->save();
        DB::commit();
        session()->flash("success", "Inventory has been successfully created!");
        if(auth()->user()->type == UserType::ADMIN){
            return redirect('/admin/product');
        }elseif(auth()->user()->type == UserType::SUPERADMIN){
            return redirect('/super-admin/product');
        }
    }
    public function update(array $data, Inventory $inventory){
        DB::beginTransaction();
        $inventory->fill($data);
        $inventory->save();
        if($data['old_quantity'] != $data['quantity']){
            $inventoryLog = new InventoryLog();
            $data['user_id'] = auth()->user()->id;
            $data['item_id'] = $inventory['id'];
            $data['new_quantity'] = $data['quantity'];
            $data['old_quantity'] = $data['old_quantity'];
            $inventoryLog->fill($data);
            $inventoryLog->save();
        }
        DB::commit();
        session()->flash("success", "Inventory has been successfully updated!");
        if(auth()->user()->type == UserType::ADMIN){
            return redirect('/admin/product');
        }elseif(auth()->user()->type == UserType::SUPERADMIN){
            return redirect('/super-admin/product');
        }
    }
    public function destroy($inventory)
    {
        $inventory->delete();
        return ['status'=>'1'];
    }

}
