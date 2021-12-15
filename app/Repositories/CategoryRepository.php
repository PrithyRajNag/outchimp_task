<?php

namespace App\Repositories;

use App\Models\Category;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryRepository
{
    private $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create($request)
    {
        if ($request->has('name') && $request->get('name')) {
            $this->model->name = $request->name;
        }
        if ($request->has('description') && $request->get('description')) {
            $this->model->description = $request->description;
        }

        return $this->model->save();
    }

    public function update($request, $uuid)
    {
        $item = $this->model->where('uuid',$uuid)->first();
        if (!$item) {
            throw new NotFoundHttpException('Category not found');
        }
        if ($request->has('name') && $request->get('name')) {
            $item->name = $request->name;
        }
        if ($request->has('description') && $request->get('description')) {
            $item->description = $request->description;
        }
        return $item->save();

    }

    public function delete($uuid)
    {
        $item = $this->model->where('uuid',$uuid)->first();
        if (!$item) {
            throw new NotFoundHttpException('Category Not Found');
        }
        return $item->delete();
    }
    public function get($uuid)
    {
        $item = $this->model->where('uuid',$uuid)->first();

        if (!$item) {
            throw new NotFoundHttpException('Category not Found');
        }
        return $item;
    }
}
