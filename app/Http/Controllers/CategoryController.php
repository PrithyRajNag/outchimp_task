<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $repository;
    private $indexRoute ;

    public function __construct(CategoryRepository $repository, $indexRoute = 'category.index')
    {
        $this->repository = $repository;
        $this->indexRoute = $indexRoute;
    }
    public function index(){
        $contentData = $this->repository->all();
        return view('category.index', compact('contentData'));
    }
    public function create(){
        return view('category.create');
    }
    public function store(CategoryRequest $request)
    {
        $data = $this->repository->create($request);
        return redirect()->route($this->indexRoute)->with('success', 'Successfully Category Created');
    }
    public function edit($uuid){
        $data = $this->repository->get($uuid);
        return view('category.edit',compact('data'));
    }
    public function update(CategoryRequest $request, $uuid)
    {
        $data = $this->repository->update($request, $uuid);
        return redirect()->route($this->indexRoute)->with('success','Successfully Category Updated');
    }
    public function destroy($uuid)
    {
        $data = $this->repository->delete($uuid);
        return redirect()->route($this->indexRoute)->with('success', 'Category Information Removed');
    }
}
