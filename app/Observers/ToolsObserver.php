<?php

namespace App\Observers;

use App\Models\Collection;
use App\Models\Tool;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Nova;

class ToolsObserver
{
    public function created(Tool $tool)
    {
        Nova::whenServing(function (NovaRequest $request) use ($tool) {

            $collection = $tool->collection;
            if ($collection){
                /** @var \Illuminate\Support\Collection $tools */
                $tools = $collection->tools;
                if($tools->count() > 0){
                    $summa = $tools->sum('price');
                    $collection->update(['price' => $summa]);
                }
            }
        });
        // Always invoked...
    }

    public function updated(Tool $tool)
    {
        Nova::whenServing(function (NovaRequest $request) use ($tool) {

            $collection = $tool->collection;
            if ($collection){
                /** @var \Illuminate\Support\Collection $tools */
                $tools = $collection->tools;
                if($tools->count() > 0){
                    $summa = $tools->sum('price');
                    $collection->update(['price' => $summa]);
                }
            }
        });
        // Always invoked...
    }
}
