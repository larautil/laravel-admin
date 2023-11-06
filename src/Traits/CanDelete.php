<?php

namespace Encore\Admin\Traits;

trait CanDelete
{
    /**
     * Remove the specified resource from storage.
     *
     * @param int|string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->form()->destroy($id);
    }
}
