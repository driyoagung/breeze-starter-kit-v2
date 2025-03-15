<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Store;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

// use Illuminate\Routing\Controllers;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // implements Controllers\HasMiddleware
    // public static function middleware()
    // {
    //     return [
    //         new Controllers\Middleware('auth', except: ['index'])
    //     ];
    // }
    public function index()
    {
        return view("stores.index", [
            "stores" => Store::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            "stores.form",
            [
                "store" => new Store(),
                "page_meta" => [
                    "title" => "Create Store",
                    "description" => "Create a New Store up to 5 account",
                    "method" => "post",
                    "button" => "Create",
                    "url" => route("stores.store"),
                ],
            ]
        );

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $file = $request->file("logo");
        $request->user()->stores()->create([
            ...$request->validated(),
            ...[
                "logo" => $file->store("images/stores"),
            ]
        ]);
        return redirect()->route("stores.index");

    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Store $store)
    {
        Gate::authorize('update', $store);
        // abort_if($request->user()->isNot($store->user), 403);
        return view("stores.form", [
            "store" => $store,
            "page_meta" => [
                "title" => "Edit Store",
                "description" => "Edit Store" . $store->name,
                "method" => "put",
                "button" => "Update",
                "url" => route("stores.update", $store),
            ],
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Store $store)
    {
        $store->update([
            "name" => $request->name,
            "description" => $request->description,

        ]);
        return redirect()->route("stores.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
    }
}
