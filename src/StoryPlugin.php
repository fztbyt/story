<?php

namespace Orchestra\Story;

use Illuminate\Support\Fluent;
use Orchestra\Extension\Plugin;
use Orchestra\Story\Model\Content;
use Orchestra\Story\Facades\StoryFormat;
use Illuminate\Contracts\Support\Arrayable;
use Orchestra\Story\Http\Handlers\StoryMenuHandler;
use Orchestra\Contracts\Html\Form\Builder as FormBuilder;

class StoryPlugin extends Plugin
{
    /**
     * Extension name.
     *
     * @var string
     */
    protected $extension = 'orchestra/story';

    /**
     * Configuration.
     *
     * @var array
     */
    protected $config = [
        'default_format' => 'orchestra/story::default_format',
        'default_page'   => 'orchestra/story::default_page',
        'per_page'       => 'orchestra/story::per_page',
        'page_permalink' => 'orchestra/story::permalink.page',
        'post_permalink' => 'orchestra/story::permalink.post',
    ];

    /**
     * Menu handler.
     *
     * @var object|null
     */
    protected $menu = StoryMenuHandler::class;

    /**
     * Validation rules.
     *
     * @var array
     */
    protected $rules = [
        'page_permalink' => ['required'],
        'post_permalink' => ['required'],
    ];

    /**
     * Sidebar placeholders.
     *
     * @var array
     */
    protected $sidebar = [
        'permalink-help' => 'orchestra/story::widgets.help',
    ];

    /**
     * Setup the form.
     *
     * @param  \Illuminate\Support\Fluent  $model
     * @param  \Orchestra\Contracts\Html\Form\Builder  $form
     *
     * @return void
     */
    protected function form(Fluent $model, FormBuilder $form)
    {
        $form->extend(function ($form) use ($model) {
            $form->fieldset('Page Management', function ($fieldset) {
                $pages = Content::page()->publish()->pluck('title', 'slug');

                if ($pages instanceof Arrayable) {
                    $pages = $pages->toArray();
                }

                $pages = array_merge(['_posts_' => 'Display Posts'], $pages);

                $fieldset->control('select', 'default_format')
                    ->label('Default Format')
                    ->options(StoryFormat::getParsers());

                $fieldset->control('select', 'default_page')
                    ->label('Default Page')
                    ->options($pages);

                $fieldset->control('text', 'Page Permalink', 'page_permalink');
                $fieldset->control('text', 'Post Permalink', 'post_permalink');
            });
        });
    }
}
