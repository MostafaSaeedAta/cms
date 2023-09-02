<?php

app()->booted(function () {
    theme_option()
        ->setField([
            'id' => 'preloader_enabled',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'customSelect',
            'label' => __('Enable Preloader?'),
            'attributes' => [
                'name' => 'preloader_enabled',
                'list' => [
                    'yes' => trans('core/base::base.yes'),
                    'no' => trans('core/base::base.no'),
                ],
                'value' => 'yes',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id' => 'preloader_version',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'customSelect',
            'label' => __('Preloader Version?'),
            'attributes' => [
                'name' => 'preloader_version',
                'list' => [
                    'v1' => 'V1',
                    'v2' => 'V2',
                ],
                'value' => 'v1',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id' => 'animation_enabled',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'customSelect',
            'label' => __('Enable animation?'),
            'attributes' => [
                'name' => 'animation_enabled',
                'list' => [
                    'yes' => trans('core/base::base.yes'),
                    'no' => trans('core/base::base.no'),
                ],
                'value' => 'yes',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id' => 'copyright',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'text',
            'label' => __('Copyright'),
            'attributes' => [
                'name' => 'copyright',
                'value' => __('© :year Your Company. All right reserved.', ['year' => now()->format('Y')]),
                'options' => [
                    'class' => 'form-control',
                    'placeholder' => __('Change copyright'),
                    'data-counter' => 250,
                ],
            ],
            'helper' => __('Copyright on footer of site'),
        ])
        ->setField([
            'id' => 'primary_font',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'googleFonts',
            'label' => __('Primary font'),
            'attributes' => [
                'name' => 'primary_font',
                'value' => 'Chivo',
            ],
        ])
        ->setField([
            'id' => 'secondary_font',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'googleFonts',
            'label' => __('Secondary font'),
            'attributes' => [
                'name' => 'secondary_font',
                'value' => 'Noto Sans',
            ],
        ])
        ->setField([
            'id' => 'primary_color',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'customColor',
            'label' => __('Primary color'),
            'attributes' => [
                'name' => 'primary_color',
                'value' => '#508FDA',
            ],
        ])
        ->setField([
            'id' => 'secondary_color',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'customColor',
            'label' => __('Secondary color'),
            'attributes' => [
                'name' => 'secondary_color',
                'value' => '#8D99AE',
            ],
        ])
        ->setField([
            'id' => 'danger_color',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'customColor',
            'label' => __('Danger color'),
            'attributes' => [
                'name' => 'danger_color',
                'value' => '#EF476F',
            ],
        ])
        ->setField([
            'id' => 'hotline',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'text',
            'label' => __('Hotline'),
            'attributes' => [
                'name' => 'hotline',
                'value' => null,
                'options' => [
                    'class' => 'form-control',
                    'data-counter' => 25,
                ],
            ],
        ])
        ->setField([
            'id' => 'email',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'email',
            'label' => __('Email'),
            'attributes' => [
                'name' => 'email',
                'value' => null,
                'options' => [
                    'class' => 'form-control',
                    'data-counter' => 120,
                ],
            ],
        ])
        ->setField([
            'id' => 'address',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'text',
            'label' => __('Address'),
            'attributes' => [
                'name' => 'address',
                'value' => '',
                'options' => [
                    'class' => 'form-control',
                    'placeholder' => __('Change address'),
                ],
            ],
        ])
        ->setField([
            'id' => '404_page_image',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'mediaImage',
            'label' => __('404 page image'),
            'attributes' => [
                'name' => '404_page_image',
                'value' => '',
            ],
        ])
        ->setField([
            'id' => 'login_page_image',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'mediaImage',
            'label' => __('Login page image'),
            'attributes' => [
                'name' => 'login_page_image',
                'value' => '',
            ],
        ])
        ->setField([
            'id' => 'register_page_images',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'mediaImages',
            'label' => __('Register page images'),
            'attributes' => [
                'name' => 'register_page_images[]',
                'values' => theme_option('register_page_images', []),
                'attributes' => [
                    'allow_thumb' => false,
                ],
            ],
        ])
        ->setSection([
            'title' => __('Social links'),
            'desc' => __('Social links'),
            'id' => 'opt-text-subsection-social-links',
            'subsection' => true,
            'icon' => 'fa fa-share-alt',
        ])
        ->setField([
            'id' => 'social_links',
            'section_id' => 'opt-text-subsection-social-links',
            'type' => 'repeater',
            'label' => __('Social links'),
            'attributes' => [
                'name' => 'social_links',
                'value' => null,
                'fields' => [
                    [
                        'type' => 'text',
                        'label' => __('Name'),
                        'attributes' => [
                            'name' => 'social-name',
                            'value' => null,
                            'options' => [
                                'class' => 'form-control',
                            ],
                        ],
                    ],
                    [
                        'type' => 'mediaImage',
                        'label' => __('Icon Image'),
                        'attributes' => [
                            'name' => 'social-icon',
                            'value' => null,
                            'options' => [
                                'class' => 'form-control',
                            ],
                        ],
                    ],
                    [
                        'type' => 'text',
                        'label' => __('URL'),
                        'attributes' => [
                            'name' => 'social-url',
                            'value' => null,
                            'options' => [
                                'class' => 'form-control',
                            ],
                        ],
                    ],
                ],
            ],
        ]);

    theme_option()
        ->setSection([
            'title' => __('Header'),
            'desc' => __('Header config'),
            'id' => 'opt-text-subsection-header',
            'subsection' => true,
            'icon' => 'fa fa-link',
        ])
        ->setField([
            'id' => 'action_button_text',
            'section_id' => 'opt-text-subsection-header',
            'type' => 'text',
            'label' => __('Action button text'),
            'attributes' => [
                'name' => 'action_button_text',
                'value' => null,
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id' => 'header_top_enabled',
            'section_id' => 'opt-text-subsection-header',
            'type' => 'customSelect',
            'label' => __('Enable header top'),
            'attributes' => [
                'name' => 'header_top_enabled',
                'list' => [
                    0 => trans('core/base::base.no'),
                    1 => trans('core/base::base.yes'),
                ],
                'value' => 1,
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id' => 'action_button_url',
            'section_id' => 'opt-text-subsection-header',
            'type' => 'text',
            'label' => __('Action button URL'),
            'attributes' => [
                'name' => 'action_button_url',
                'value' => null,
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ]);

    if (is_plugin_active('blog')) {
        theme_option()->setField([
            'id' => 'background_post_single',
            'section_id' => 'opt-text-subsection-blog',
            'type' => 'mediaImage',
            'label' => __('Background post single'),
            'attributes' => [
                'name' => 'background_post_single',
                'value' => '',
            ],
        ]);
    }

    // Facebook integration
    theme_option()
        ->setField([
            'id' => 'facebook_comment_enabled_in_product',
            'section_id' => 'opt-text-subsection-facebook-integration',
            'type' => 'customSelect',
            'label' => __('Enable Facebook comment in product detail page?'),
            'attributes' => [
                'name' => 'facebook_comment_enabled_in_product',
                'list' => [
                    'no' => trans('core/base::base.no'),
                    'yes' => trans('core/base::base.yes'),
                ],
                'value' => 'no',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ]);
});
