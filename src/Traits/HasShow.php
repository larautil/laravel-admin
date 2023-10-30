<?php

namespace Encore\Admin\Traits;

use Encore\Admin\Layout\Content;

trait HasShow
{
    /**
     * Show interface
     *
     * @param Content $content
     * @param $id
     *
     * @return Content
     */
    public function show(Content $content, $id)
    {
        return $content
            ->title($this->title())
            ->description($this->description['show'] ?? trans('admin.show'))
            ->body($this->detail($id));
    }
}
