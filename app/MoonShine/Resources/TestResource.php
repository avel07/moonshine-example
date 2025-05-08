<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Test;
use App\MoonShine\Pages\Test\TestIndexPage;
use App\MoonShine\Pages\Test\TestFormPage;
use App\MoonShine\Pages\Test\TestDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Pages\Page;

/**
 * @extends ModelResource<Test, TestIndexPage, TestFormPage, TestDetailPage>
 */
class TestResource extends ModelResource
{
    protected string $model = Test::class;

    protected string $title = 'Tests';
    
    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [
            TestIndexPage::class,
            TestFormPage::class,
            // TestDetailPage::class,
        ];
    }

    /**
     * @param Test $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
