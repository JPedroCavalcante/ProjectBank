<?php

namespace App\Services\Holder;

use App\Models\Holder;

class IndexHolderService
{

    public function run($request)
    {
        $search = $request->search ?? null;

        return Holder::where(function ($query) use ($search) {
            if ($search) {
                $query->where('identifier', $search);
                $query->Orwhere('name', 'LIKE', "%{$search}%");
            }
        })->get();
    }
}
