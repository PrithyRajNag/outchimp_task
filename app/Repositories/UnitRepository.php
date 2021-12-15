<?php

namespace App\Repositories;

use App\Models\Unit;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UnitRepository
{
    private $model;

    public function __construct(Unit $model)
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
        if ($request->has('code') && $request->get('code')) {
            $this->model->code = $request->code;
        }

        return $this->model->save();
    }

    public function update($request, $uuid)
    {
        $item = $this->model->where('uuid',$uuid)->first();
        if (!$item) {
            throw new NotFoundHttpException('Unit not found');
        }
        if ($request->has('name') && $request->get('name')) {
            $item->name = $request->name;
        }
        if ($request->has('code') && $request->get('code')) {
            $item->code = $request->code;
        }
        return $item->save();

    }

    public function delete($uuid)
    {
        $item = $this->model->where('uuid', $uuid)->first();
        if (!$item) {
            throw new NotFoundHttpException('Unit Not Found');
        }
        return $item->delete();
    }

    public function get($uuid)
    {
        $item = $this->model->where('uuid', $uuid)->first();

        if (!$item) {
            throw new NotFoundHttpException('Unit not Found');
        }
        return $item;
    }
}
