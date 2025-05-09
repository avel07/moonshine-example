<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\NewsSection;

use App\MoonShine\Resources\NewsSectionResource;
use MoonShine\Laravel\Pages\Crud\IndexPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Resources\ModelResource;
use Throwable;
use MoonShine\UI\Fields\{Color, Fieldset, ID, Image, Text, Checkbox, Date};
use MoonShine\Laravel\Fields\Relationships\BelongsToMany;
use Leeto\MoonShineTree\View\Components\TreeComponent;

/**
 * @extends IndexPage<ModelResource>
 */
class NewsSectionIndexPage extends IndexPage
{
    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function mainLayer(): array
    {
        return [
            ...$this->getPageButtons(),
            TreeComponent::make($this->getResource()),
        ];
    }
}
