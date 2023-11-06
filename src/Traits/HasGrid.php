<?php

namespace Encore\Admin\Traits;

use Encore\Admin\Layout\Content;

trait HasGrid
{
    public function index(Content $content)
    {
        // TODO: add bread crumb

        return $content
            ->title($this->title())
            ->description($this->description['index'] ?? trans('admin.list'))
            ->body($this->grid());
    }
}
