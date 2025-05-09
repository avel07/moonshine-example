<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\NewsSection;

use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Resources\ModelResource;
use Throwable;
use MoonShine\UI\Fields\{Color, Fieldset, ID, Image, Text, Checkbox, Date, Number, Field};
use App\MoonShine\Resources\NewsSectionResource;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Collections\Fields;
use Illuminate\Http\UploadedFile;

/**
 * @extends FormPage<ModelResource>
 */
class NewsSectionFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        $item = $this->getResource()?->getItem();
        return [
            ID::make()->sortable(),
            Checkbox::make('Активность', 'active'),
            Text::make('Название', 'title')
                ->required()
                ->unescape()
                ->reactive(static function (Fields $fields, ?string $value) use ($item) {
                    $codeValue = $fields->findByColumn('code')?->getValue();
                    if (empty($codeValue) || empty($item)) {
                        return tap(
                            $fields,
                            static fn($fields) => $fields->findByColumn('code')?->setValue(str($value ?? "")->slug()->value())
                        );
                    }
                    return $fields;
                }, debounce: 100),
            Text::make('Символьный код', 'code')
                ->reactive()
                ->required(),
            Number::make('Сортировка', 'sort')
                ->setValue(500),
            Image::make('Картинка превью', 'preview_picture')
                ->nullable()
                ->removable()
                ->enableDeleteDir()
                ->disk('minio')
                ->customName(fn(UploadedFile $file) => 'news/' . date('Y-m-d') . '/' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $file->extension())
                ->allowedExtensions(['png', 'svg', 'jpg', 'jpeg', 'webp']),
            Image::make('Детальная картинка', 'detail_picture')
                ->nullable()
                ->removable()
                ->enableDeleteDir()
                ->disk('minio')
                ->customName(fn(UploadedFile $file) => 'news/' . date('Y-m-d') . '/' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $file->extension())
                ->allowedExtensions(['png', 'svg', 'jpg', 'jpeg', 'webp']),
            BelongsTo::make(
                'Родительский раздел',
                'parent',
                fn($item) => "$item->title ($item->id)",
                NewsSectionResource::class
            )->nullable(),
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function topLayer(): array
    {
        return [
            ...parent::topLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function mainLayer(): array
    {
        return [
            ...parent::mainLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function bottomLayer(): array
    {
        return [
            ...parent::bottomLayer()
        ];
    }
}
