<?php



return [

    /**
     * The locales which the `translatable` wrapper will use by default.
     *
     * Can be a:
     *  - Keyed array (['en' => 'English])
     *  - Callable that returns a keyed array
     */
    'locales' => [
        'az' => 'Azərbaycanca',
        'ru' => 'Русский',
        'en' => 'English',
    ],


    /**
     * If enabled, the Nova's current locale will always be displayed as
     * the first locale in the tabs arrangement.
     *
     * If disabled, the locales array order is respected.
     */
    'prioritize_nova_locale' => true,


    /**
     * Defines the display type for the translatable tabs.
     *
     * Available options are: 'row', 'column'
     */
    'display_type' => 'row',


    /**
     * If set to a locale key, the translatable fields will automatically fill other
     * locales of the field's value when saving the field from the defined "default"
     * locale.
     *
     * Set to locale key (`en`, `ru`, etc) or null to enable/disable.
     */
    'fill_other_locales_from' => null,

];