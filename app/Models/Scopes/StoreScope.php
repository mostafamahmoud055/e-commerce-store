<?php

namespace App\Models\Scopes;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Builder;

class StoreScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (Auth::guard("admin")->user() && Str::startsWith(Request::route()->getName() ,"dashboard")) {
            $store_id=Auth::guard("admin")->user()->store_id;
            $builder->where('store_id', $store_id);
        }
    }
}
