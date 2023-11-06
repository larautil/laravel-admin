<?php

namespace Encore\Admin\Grid\Actions;

use Encore\Admin\Actions\RowAction;

class Show extends RowAction
{
    /**
     * @return array|null|string
     */
    public function name()
    {
        return '<i class="fa fa-info-circle"></i>'.__('admin.show');
    }

    /**
     * @return string
     */
    public function href()
    {
        return "{$this->getResource()}/{$this->getKey()}";
    }
}
