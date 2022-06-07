<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $menuRepository;

    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    public function getAll()
    {
        return $this->menuRepository->all();
    }

    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {
        return $this->menuRepository->store($request);
    }

    public function edit($id)
    {
        return $this->menuRepository->edit($id);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        return $this->menuRepository->update($request, $id);
    }
    public function delete($id)
    {
        return $this->menuRepository->delete($id);
    }

    // Menu items
    public function getAllItems($menu_id)
    {
        return $this->menuRepository->getAllItems($menu_id);
    }

    public function createItem($menu_id)
    {
        return $this->menuRepository->createItem($menu_id);
    }

    public function storeItem(Request $request, $menu_id)
    {
        return $this->menuRepository->storeItem($request, $menu_id);
    }

    public function editItem($menu_id, $item_id)
    {
        return $this->menuRepository->editItem($menu_id, $item_id);
    }

    public function updateItem(Request $request, $menu_id, $item_id)
    {
        return $this->menuRepository->updateItem($request, $menu_id, $item_id);
    }
    public function deleteItem($menu_id, $item_id)
    {
        return $this->menuRepository->deleteItem($menu_id, $item_id);
    }
}
