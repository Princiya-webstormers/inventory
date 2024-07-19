<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Http\Requests\SaveInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Http\Requests\StatusUpdateInventoryRequest;
use App\Models\Inventory;
use App\Service\InventoryService;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    private $inventoryService;

    public function __construct(InventoryService $inventoryService)
    {
        $this->middleware('auth');
        $this->inventoryService = $inventoryService;
    }
    public function index(Request $request)
    {
        return $this->inventoryService->index($request);
    }
    public function create()
    {
        return view('backend.inventory.inventory');
    }
    public function store(SaveInventoryRequest $request){
        return $this->inventoryService->store($request->validated());
    }
    public function edit(Inventory $inventory) {
        return view('backend.inventory.inventory', [
            'edit'=>$inventory,
        ]);
    }
    public function update(UpdateInventoryRequest $request, Inventory $inventory){
        return $this->inventoryService->update($request->validated(), $inventory);
    }
    public function destroy(Inventory $inventory){
        return $this->inventoryService->destroy($inventory);
    }

}
