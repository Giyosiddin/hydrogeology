<?php
namespace App\Repositories;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Support\Str;


class MenuRepository
{

    public function all()
    {
        // dd();
        $menus = Menu::paginate(15);
        return view('admin.menu.all', compact('menus'));
    }

    public function store($request)
    {
        $resource = new Menu();

        $resource->name = $request->name;
        $resource->location = $request->location;
        $resource->save();
       return redirect()->route('menuItem.all',$resource->id)->with(['msg' => "Menu created successfully!"]);
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.menu.edit', compact('menu'));
    }

    public function update($request, $id)
    {
        $resource = Menu::findOrFail($id);

        $resource->name = $request->name;
        $resource->location = $request->location;
        $resource->save();
        return redirect()->route('menuItem.all',$resource->id)->with(['msg' => "Menu updated successfully!"]);
    }

    public function delete($id)
    {
        $resource = Menu::findOrFail($id);
        $resource->delete();
        return redirect()->route('menu.all');
    }

    // Menu items
    public function getAllItems($menu_id)
    {
        // $menu = Menu::with('items','items.parent')->findOrFail($menu_id);
        $items = MenuItem::with('parent','children')->orderBy('order', 'ASC')
            ->where('menu_id', $menu_id)->get()->toTree();
        return view('admin.menu.items.all', compact('items', 'menu_id'));
    }
    public function createItem($menu_id)
    {
        $items = MenuItem::where('menu_id', $menu_id)->doesntHave('parent')->get();
        return view('admin.menu.items.create', compact('items'));
    }
    public function storeItem($request, $menu_id)
    {
        $data = $request->all();
        $data['menu_id'] = $menu_id;
        // $data['parent_id'] = $menu_id;
        $item = new MenuItem();
        $item = $item->create($data);

        return redirect()->route('menuItem.all', $menu_id);
    }

    public function editItem($menu_id, $item_id)
    {
        $item = MenuItem::findOrFail($item_id);
        $allItems = MenuItem::where('menu_id', $menu_id)->where('id', '!=', $item_id)->get();
        // dd($allItems);
        return view('admin.menu.items.edit', compact('item', 'allItems','menu_id'));
    }

    public function updateItem($request, $menu_id, $item_id)
    {
        $menuItem = MenuItem::findOrFail($item_id);
        $update = $menuItem->update($request->all());
        return redirect()->route('menuItem.all', $menu_id);
    }
    public function deleteItem($menu_id, $item_id)
    {
        $menuItem = MenuItem::findOrFail($item_id);
        $delete = $menuItem->delete();
        return redirect()->route('menuItem.all', $menu_id);
    }
}
