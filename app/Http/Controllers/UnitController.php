<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitRequest;
use App\Repositories\UnitRepository;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    private $repository;
    private $indexRoute ;

    public function __construct(UnitRepository $repository, $indexRoute = 'unit.index')
    {
        $this->repository = $repository;
        $this->indexRoute = $indexRoute;
    }
    public function index(){
        $contentData = $this->repository->all();
        return view('unit.index', compact('contentData'));
    }
    public function create(){
        return view('unit.create');
    }
    public function store(UnitRequest $request)
    {
        $data = $this->repository->create($request);
        return redirect()->route($this->indexRoute)->with('success', 'Successfully Unit Created');
    }
    public function edit($uuid){
        $data = $this->repository->get($uuid);
        return view('unit.edit',compact('data'));
    }
    public function update(UnitRequest $request, $uuid)
    {
        $data = $this->repository->update($request, $uuid);
        return redirect()->route($this->indexRoute)->with('success','Successfully Unit Updated');
    }
    public function destroy($uuid)
    {
        $data = $this->repository->delete($uuid);
        return redirect()->route($this->indexRoute)->with('success', 'Unit Information Removed');
    }
}
