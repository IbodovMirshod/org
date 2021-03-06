<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Http\Requests\NovaRequest;
use Rimu\FormattedNumber\FormattedNumber;
use SimpleSquid\Nova\Fields\AdvancedNumber\AdvancedNumber;
use Yassi\NestedForm\NestedForm;

class Collection extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Collection::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            Text::make('Texnika nomi', 'name')->sortable(),
            FormattedNumber::make('Narxi', 'price')->hideFromDetail()->hideFromIndex(),
            AdvancedNumber::make('Narxi', 'price')
                ->decimals(0)
                ->suffix(' sum')
                ->thousandsSeparator(',')
                ->min(0)->hideWhenCreating()->hideWhenCreating(),
            BelongsTo::make('Kimga tegishli', 'user', 'App\Nova\User')->nullable()->showCreateRelationButton(),
            DateTime::make('O`zgartirilgan vaqti', 'updated_at')->hideWhenCreating()->hideWhenUpdating(),
            NestedForm::make('Qismlar', 'tools', 'App\Nova\Tools'),
            HasMany::make('Qismlar', 'tools', 'App\Nova\Tools'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
