<?php

namespace Encore\Admin\Controllers;

use Encore\Admin\Traits\CanCreate;
use Encore\Admin\Traits\HasShow;
use Illuminate\Routing\Controller;
use Encore\Admin\Traits\CanEdit;
use Encore\Admin\Traits\CanDelete;

abstract class ResourceController extends Controller
{
    /**
     * Resource Title
     *
     * @var string
     */
    protected string $title = 'Title';

    /**
     * Get Title
     *
     * @return string
     */
    protected function title(): string
    {
        return $this->title;
    }

    /**
     * Description for following 4 action pages.
     *
     * @var array
     */
    protected array $description = [
        'index'  => 'Index',
        'show'   => 'Show',
        'edit'   => 'Edit',
        'create' => 'Create',
    ];

    /**
     * Get Description
     *
     * @param string $key
     * @return string
     */
    protected function description(string $key): string
    {
        return $this->description[$key];
    }

    /**
     * @return bool
     */
    protected function canCreate(): bool
    {
        return in_array(CanCreate::class, class_uses_recursive($this)) && method_exists($this, 'form');
    }

    /**
     * @return bool
     */
    protected function canEdit(): bool
    {
        return in_array(CanEdit::class, class_uses_recursive($this)) && method_exists($this, 'form');
    }

    /**
     * @return bool
     */
    protected function hasShow(): bool
    {
        return in_array(HasShow::class, class_uses_recursive($this)) && method_exists($this, 'detail');
    }

    /**
     * @return bool
     */
    protected function canDelete(): bool
    {
        return in_array(CanDelete::class, class_uses_recursive($this));
    }
}
