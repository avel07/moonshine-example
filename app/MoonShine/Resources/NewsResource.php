<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\News;
use App\MoonShine\Pages\News\NewsIndexPage;
use App\MoonShine\Pages\News\NewsFormPage;
use App\MoonShine\Pages\News\NewsDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Pages\Page;

/**
 * @extends ModelResource<News, NewsIndexPage, NewsFormPage, NewsDetailPage>
 */
class NewsResource extends ModelResource
{
    protected string $model = News::class;

    protected string $title = 'News';
    
    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [
            NewsIndexPage::class,
            NewsFormPage::class,
            // NewsDetailPage::class,
        ];
    }

    /**
     * @param News $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
