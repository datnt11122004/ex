<?php
return [
    'module' => [
        [
            'name' => 'user',
            'title' => 'Quản lý thành viên',
            'icon' => 'fa fa-user',
            'subModule' => [
                [
                    'title' => 'Quản lý nhóm thành viên',
                    'route' => 'auth.user.catalogue'
                ],
                [
                    'title' => 'Quản lý thành viên',
                    'route' => 'auth.user'
                ],
            ]
        ],
        [
            'name' => 'post',
            'title' => 'Quản lý bài viết',
            'icon' => 'fa fa-file',
            'subModule' => [
                [
                    'title' => 'Quản lý nhóm bài viết',
                    'route' => 'auth.user.catalogue'
                ],
                [
                    'title' => 'Quản lý bài viết',
                    'route' => 'auth.user'
                ],
            ]
        ],
    ]
];
