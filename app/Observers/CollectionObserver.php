<?php

namespace App\Observers;

use App\Models\Collection;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Nova;
class CollectionObserver
{
    public function created(Collection $collection)
    {
//        Nova::whenServing(function (NovaRequest $request) use ($collection) {
//            /** @var \Illuminate\Support\Collection $tools */
//            $tools = $collection->tools;
//            if($tools->count() > 0){
//                $summa = $tools->sum('price');
//                $collection->update(['price' => $summa]);
//            }
//        });

        // Always invoked...
    }
}
