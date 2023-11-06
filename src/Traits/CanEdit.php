<?php

namespace Encore\Admin\Traits;

use Encore\Admin\Layout\Content;

trait CanEdit
{
    /**
     * Update the specified resource in storage.
     *
     * @param int|string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        return $this->form()->update($id);
    }

    /**
     * Edit interface
     *
     * @param Content $content
     * @param $id
     *
     * @return Content
     */
    public function edit(Content $content, $id)
    {
        return $content
            ->title($this->title())
            ->description($this->description['edit'] ?? trans('admin.edit'))
            ->body($this->form()->edit($id));
    }
}
