<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Unit;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $repository;
    private $indexRoute ;

    public function __construct(ProductRepository $repository, $indexRoute = 'product.index')
    {
        $this->repository = $repository;
        $this->indexRoute = $indexRoute;
    }
    public function index(){
        $contentData = $this->repository->all();
        return view('product.index', compact('contentData'));
    }
    public function create(){
        $categories = Category::all();
        $units = Unit::all();
        return view('product.create',compact('categories','units'));
    }
    public function store(ProductRequest $request)
    {
//        return $request->all();
        $data = $this->repository->create($request);
        return redirect()->route($this->indexRoute)->with('success', 'Successfully Product Created');
    }
    public function edit($uuid){
        $categories = Category::all();
        $units = Unit::all();
        $data = $this->repository->get($uuid);
        return view('product.edit',compact('data','categories','units'));
    }
    public function update(ProductRequest $request, $uuid)
    {
        $data = $this->repository->update($request, $uuid);
        return redirect()->route($this->indexRoute)->with('success','Successfully Product Updated');
    }
    public function destroy($uuid)
    {
        $data = $this->repository->delete($uuid);
        return redirect()->route($this->indexRoute)->with('success', 'Product Information Removed');
    }
}
