<?php


namespace Encore\Admin\Widgets;

use Illuminate\Contracts\Support\Renderable;

class Button extends Widget implements Renderable
{
    /**
     * @var string
     */
    protected $view = 'admin::widgets.button';

    /**
     * @var string
     */
    protected $title = '';

    /**
     * Font Awesome icon
     *
     * @var string
     */
    protected $icon = 'gear';

    /**
     * @var string
     */
    protected $link = '';

    /**
     * Badge
     *
     * @var string
     */
    protected $badge = '';

    /**
     * Color of badge
     * @var string
     */
    protected $style = 'green';

    /**
     * @var string
     */
    protected $script;

    /**
     * Button constructor.
     *
     * @param string $title
     * @param string $icon
     * @param string $link
     * @param string $badge
     * @param string $style
     */
    public function __construct($title = '', $icon = '', $link = '', $badge = '', $style = 'green')
    {
        if ($title) {
            $this->title = $title;
        }

        if ($icon) {
            $this->icon = $icon;
        }

        if ($link) {
            $this->link = $link;
        }

        if ($badge) {
            $this->badge = $badge;
        }

        if ($style) {
            $this->style = $style;
        }

        $this->class('btn btn-app');
    }

    /**
     * Set button title
     *
     * @param string $title
     *
     * @return $this
     */
    public function title(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Set button icon
     *
     * @param string $icon
     *
     * @return $this
     */
    public function icon(string $icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Set button link
     *
     * @param string $link
     *
     * @return $this
     */
    public function link(string $link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Set button badge
     *
     * @param string $badge
     *
     * @return $this
     */
    public function badge(string $badge)
    {
        $this->badge = $badge;

        return $this;
    }

    /**
     * Set button style
     *
     * @param string $style
     *
     * @return $this
     */
    public function style(string $style)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Variables in view.
     *
     * @return array
     */
    protected function variables()
    {
        return [
            'title' => $this->title,
            'icon' => $this->icon,
            'link' => $this->link,
            'badge' => $this->badge,
            'style' => $this->style,
            'attributes' => $this->formatAttributes(),
            'script' => $this->script,
        ];
    }


    /**
     * Render button.
     *
     * @return string
     */
    public function render()
    {
        return view($this->view, $this->variables())->render();
    }
}
