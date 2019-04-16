<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Requests\CategoryDestroyRequest;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryUpdateRequest;
use App\Services\CategoryService;

class CategoriesController extends Controller
{
    /**
     * @param CategoryStoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryStoreRequest $request)
    {
        $input    = $request->only('parent', 'title');
        $category = new Category();
        $status   = ($category->fill($input)->save()) ? 'Категория создана' : 'Ошибка при создании категории';
        return back()->with(['catStatus' => $status]);
    }


    /**
     * @param CategoryUpdateRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryUpdateRequest $request)
    {
        $input    = $request->only('id', 'title');
        $category = Category::find($input['id']);
        $status   = ($category->fill($input)->update()) ? 'Категория обновлена' : 'Ошибка при обновлении категории';
        return back()->with(['catStatus' => $status]);
    }


    /**
     * TODO : куда перенаправлять?
     * @param CategoryDestroyRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(CategoryDestroyRequest $request)
    {
        $result = (new CategoryService)->delete($request);
        $status = ($result) ? 'Категория удалена' : 'Ошибка при удалении категории';
        return back()->with(['catStatus' => $status]);
    }
}
