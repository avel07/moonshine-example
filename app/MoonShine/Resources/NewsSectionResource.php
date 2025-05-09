<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Builder;
use App\Models\NewsSection;
use App\MoonShine\Pages\NewsSection\{
    NewsSectionIndexPage,
    NewsSectionFormPage,
    NewsSectionDetailPage
};
use MoonShine\Laravel\Pages\Page;
use Leeto\MoonShineTree\Resources\TreeResource;
use MoonShine\Support\Enums\PageType;

/**
 * @extends ThreeResource<NewsSection, NewsSectionIndexPage, NewsSectionFormPage, NewsSectionDetailPage>
 */
class NewsSectionResource extends TreeResource
{
    protected string $model = NewsSection::class;

    protected string $title = 'NewsSections';

    protected string $sortColumn = 'sort';

    protected string $column = 'title';

    // protected bool $createInModal = true;

    protected bool $editInModal = true;

    protected ?PageType $redirectAfterSave = PageType::INDEX;

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [
            NewsSectionIndexPage::class,
            NewsSectionFormPage::class,
        ];
    }

    /**
     * @param NewsSection $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }

    public function treeKey(): ?string
    {
        return 'parent_id';
    }

    public function sortKey(): string
    {
        return $this->getSortColumn();
    }
}
