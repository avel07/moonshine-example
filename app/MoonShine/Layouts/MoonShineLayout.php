<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use App\MoonShine\Resources\TestResource;
use MoonShine\AssetManager\InlineCss;
use MoonShine\Laravel\Layouts\CompactLayout;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\UI\Components\{Components,
    Layout\Div,
    Layout\Flash,
    Layout\Body,
    Layout\Content,
    Layout\Html,
    Layout\Layout,
    Layout\Logo,
    Layout\Menu,
    Layout\TopBar,
    Layout\Wrapper};
use MoonShine\Laravel\Resources\MoonShineUserResource;
use MoonShine\Laravel\Resources\MoonShineUserRoleResource;
use MoonShine\MenuManager\MenuGroup;
use MoonShine\MenuManager\MenuItem;

final class MoonShineLayout extends CompactLayout
{
    protected function assets(): array
    {
        return [
            ...parent::assets(),
            InlineCss::make(<<<'Style'
            :root {
              --radius: 0.1rem;
              --radius-sm: 0.075rem;
              --radius-md: 0.175rem;
              --radius-lg: 0.25rem;
              --radius-xl: 0.3rem;
              --radius-2xl: 0.4rem;
              --radius-3xl: 0.6rem;
              --radius-full: 9999px;
            }
        Style
            ),
        ];
    }

    protected function menu(): array
    {
        return [
            ...parent::menu(),
            // MenuGroup::make('Статьи', [
            //     MenuItem::make(
            //         'Категории',
            //         CategoryResource::class
            //     ),
            //     MenuItem::make(
            //         'Статьи',
            //         ArticleResource::class
            //     ),
            // ]),
            MenuItem::make('ТЕСТ', TestResource::class)
                ->icon('users'),

            // MenuItem::make('Сайт', static fn () => route('home')),
        ];
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        parent::colors($colorManager);

        // $colorManager->primary('#00000');
    }

    protected function getLogoComponent(): Logo
    {
        return parent::getLogoComponent();
    }

    public function build(): Layout
    {
        return Layout::make([
            Html::make([
                $this->getHeadComponent(),
                Body::make([
                    Wrapper::make([
                        $this->getSidebarComponent(),

                        Div::make([

                            Flash::make(),

                            $this->getHeaderComponent(),

                            Content::make([
                                Components::make(
                                    $this->getPage()->getComponents()
                                ),
                            ]),

                            $this->getFooterComponent(),
                        ])->class('layout-page'),
                    ]),
                ])->class('theme-minimalistic'),
            ])
                ->customAttributes([
                    'lang' => $this->getHeadLang(),
                ])
                ->withAlpineJs()
                ->withThemes(),
        ]);
    }
}
