<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;

class FilterScope implements Scope
{
    public function apply($builder, $model)
    // $builder, $model Or // Builder $builder , Model $model
    {
        if (request()->query('company_id')) {
            $companyID = request()->query('company_id');
            $builder->where('company_id', $companyID);
        }
        // return $builder;
    }
}
