<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('backend.services.index', compact('services'));
    }

    public function create(Request $request)
    {
        return view('backend.services.create');
    }

    public function store(ServiceRequest $request)
    {
        try {
            $data = $request->all();
            Service::create($data);
            return redirect()->route('service.index')->withMessage('Service Added');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return view('backend.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->except('_token');
            Service::where('id', $id)->update($data);

            return redirect()->route('service.index')->withMessage('Updated Done');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $product = Service::find($id);
            $product->delete();
            return redirect()->route('service.index')->withMessage('Deleted Done');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

}
