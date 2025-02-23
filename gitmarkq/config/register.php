<?php

return [
    'page' => [
        'contact' => [
            'path' => 'home.pages.contact'
        ]
    ],
    'detail' => [
        'property-details' => [
            'path' => 'home.pages.property-details',
            'model' => model_path('Property'),
        ],
        'category' => [
            'path' => 'home.pages.category',
            'model' => model_path('Category'),
        ],
        'post' => [
            'path' => 'home.pages.post',
            'model' => model_path('Post'),
        ],
        'page' => [
            'path' => 'home.pages.page',
            'model' => model_path('Page'),
        ],
        'property_category' => [
            'path' => 'home.pages.property_category',
            'model' => model_path('PropertyCategory'),
        ],
        'property_types' =>[
            'path' => 'home.pages.property_category',
            'model' => model_path('PropertyType'),
        ],
    ],
    'menu' => [
        'category' => [
            'model' => model_path('Category'),
            'view' => 'category'
        ],
        'post' => [
            'model' => model_path('Post'),
            'view' => 'post'
        ],
        'page' => [
            'model' => model_path('Page'),
            'view' => 'page'
        ],
        'property_category' => [
            'model' => model_path('PropertyCategory'),
            'view' => 'property_category'
        ],
        'property' => [
            'model' => model_path('Property'),
            'view' => 'property'
        ],
        'property_types'=>[
            'model' => model_path('PropertyType'),
            'view' => 'property_category'
        ],
    ],
    'page-template' =>[
        [
            'name' => 'Template One',
            'blade_path' => 'template.template-1',
            'slug' => 'template-1'
        ],
        [
            'name' => 'Template Two',
            'blade_path' => 'template.template-2',
            'slug' => 'template-2'
        ],
        [
            'name' => 'Default',
            'blade_path' => 'template.default',
            'slug' => 'default'
        ],
        [
            'name' => 'Template FAQs',
            'blade_path' => 'template.template-faqs',
            'slug' => 'template-faqs'
        ]
    ],
    'home-section'=> [
        'why-choose-us'=>[
            'name' => 'Why Choose Us',
            'slug' => 'why-choose-us',
            'fields'=>[
                [
                    'label' => 'Title',
                    'name' => 'title',
                    'type' => 'text',
                    'value' => 'Why Choose Us',
                    'required' => true
                ],
                [
                    'label' => 'Sub Title',
                    'name' => 'sub_title',
                    'type' => 'text',
                    'value' => 'Why Choose Us',
                    'required' => true
                ],
                [
                    'label' => 'Short Description',
                    'name' => 'short_description',
                    'type' => 'textaria',
                    'value' => 'short_description',
                    'required' => true
                ],
                [
                    'label' => 'Sub Title Description',
                    'name' => 'sub_title_description',
                    'type' => 'textaria',
                    'value' => 'short_description',
                    'required' => true
                ],
                [
                    'label' => 'Youtube Ifreme',
                    'name' => 'youtube_ifreme',
                    'type' => 'textaria',
                    'value' => 'youtube.com',
                    'required' => true
                ],
                [
                    'label' => 'Button One Link',
                    'name' => 'button_one_link',
                    'type' => 'text',
                    'value' => '#',
                    'required' => true
                ],
                [
                    'label' => 'Button Two Link',
                    'name' => 'button_two_link',
                    'type' => 'text',
                    'value' => '#',
                    'required' => true
                ],
                [
                    'label' => 'Client Satisfaction',
                    'name' => 'client_satisfaction',
                    'type' => 'text',
                    'value' => '1',
                    'required' => true
                ],
                [
                    'label' => 'House Build',
                    'name' => 'house_build',
                    'type' => 'number',
                    'value' => '1',
                    'required' => true
                ],
            ],
        ],
        
    ]
   
];