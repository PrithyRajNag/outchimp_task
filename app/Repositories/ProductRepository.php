<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductRepository
{
    private $model;

    public function __construct(Product $model)
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
        if ($request->has('brand') && $request->get('brand')) {
            $this->model->brand = $request->brand;
        }
        if ($request->has('description') && $request->get('description')) {
            $this->model->description = $request->description;
        }
        if ($request->has('quantity') && $request->get('quantity')) {
            $this->model->quantity = $request->quantity;
        }
        if ($request->has('alert_quantity') && $request->get('alert_quantity')) {
            $this->model->alert_quantity = $request->alert_quantity;
        }
        if ($request->has('status') && $request->get('status')) {
            $this->model->status = $request->status;
        }
        if ($request->has('category_id') && $request->get('category_id')) {
            $this->model->category_id = $request->category_id;
        }
        if ($request->has('unit_id') && $request->get('unit_id')) {
            $this->model->unit_id = $request->unit_id;
        }
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->getClientOriginalName();
            $path = $request->image->store('public/images/');
            $this->model->image = $fileName;
        }

        return $this->model->save();
    }

    public function update($request, $uuid)
    {
        $item = $this->model->where('uuid', $uuid)->first();
        if (!$item) {
            throw new NotFoundHttpException('Product not found');
        }
        if ($request->has('name') && $request->get('name')) {
            $item->name = $request->name;
        }
        if ($request->has('code') && $request->get('code')) {
            $item->code = $request->code;
        }
        if ($request->has('brand') && $request->get('brand')) {
            $item->brand = $request->brand;
        }
        if ($request->has('description') && $request->get('description')) {
            $item->description = $request->description;
        }
        if ($request->has('quantity') && $request->get('quantity')) {
            $item->quantity = $request->quantity;
        }
        if ($request->has('alert_quantity') && $request->get('alert_quantity')) {
            $item->alert_quantity = $request->alert_quantity;
        }
        if ($request->has('status') && $request->get('status')) {
            $item->status = $request->status;
        }
        if ($request->has('category_id') && $request->get('category_id')) {
            $item->category_id = $request->category_id;
        }
        if ($request->has('unit_id') && $request->get('unit_id')) {
            $item->unit_id = $request->unit_id;
        }
        if ($request->hasFile('image')) {
            if ($item->image != null && Storage::exists('public/images/' . $item->image)) {
                Storage::delete('public/images/' . $item->image);
            }
            $fileName = time() . '.' . $request->image->getClientOriginalName();
            $request->image->store('public/images/');
            $item->image = $fileName;
        }
        return $item->save();

    }

    public function delete($uuid)
    {
        $item = $this->model->where('uuid', $uuid)->first();
        if (!$item) {
            throw new NotFoundHttpException('Product Not Found');
        }
        return $item->delete();
    }

    public function get($uuid)
    {
        $item = $this->model->where('uuid', $uuid)->first();

        if (!$item) {
            throw new NotFoundHttpException('Product not Found');
        }
        return $item;
    }
}
