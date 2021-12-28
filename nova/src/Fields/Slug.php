<?php

namespace Laravel\Nova\Fields;

use Laravel\Nova\Http\Requests\NovaRequest;

class Slug extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'slug-field';

    /**
     * The separator to use for the slug.
     *
     * @var string
     */
    public $separator = '-';

    /**
     * Whether to show the field's customize button.
     *
     * @var string
     */
    public $showCustomizeButton = false;

    /**
     * Create a new field.
     *
     * @param  string  $name
     * @param  string|callable|null  $attribute
     * @param  callable|null  $resolveCallback
     * @return void
     */
    public function __construct($name, $attribute = null, callable $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);
    }

    /**
     * Set the separator used for slugifying the field.
     *
     * @param string $separator
     * @return $this
     */
    public function separator($separator)
    {
        $this->separator = $separator;

        return $this;
    }

    /**
     * Prepare the element for JSON serialization.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        $request = app(NovaRequest::class);

        if ($request->isUpdateOrUpdateAttachedRequest()) {
            $this->readonly();
            $this->showCustomizeButton = true;
        }

        return array_merge([
            'separator' => $this->separator,
            'showCustomizeButton' => $this->showCustomizeButton,
        ], parent::jsonSerialize());
    }
}
