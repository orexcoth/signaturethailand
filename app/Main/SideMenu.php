<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {
        return [
            'dashboard' => [
                'icon' => 'home',
                'route_name' => 'backendDashboard',
                'params' => [],
                'title' => 'แดชบอร์ด'
            ],
            'customers' => [
                'icon' => 'Users',
                'route_name' => 'BN_customers',
                'params' => [],
                'title' => 'ลูกค้า'
            ],
            'names' => [
                'icon' => 'Hard Drive',
                'title' => 'คลังชื่อ',
                'sub_menu' => [
                    'names-all' => [
                        'icon' => 'Folder',
                        'route_name' => 'BN_names_store',
                        'params' => [],
                        'title' => 'ชื่อทั้งหมด'
                    ],
                    'names-suggest' => [
                        'icon' => 'Folder Plus',
                        'route_name' => 'BN_names_suggest',
                        'params' => [],
                        'title' => 'ชื่อแนะนำ'
                    ]
                ]
            ],
            // 'signs' => [
            //     'icon' => 'Edit3',
            //     'route_name' => 'BN_signs',
            //     'params' => [],
            //     'title' => 'ลายเซ็นต์'
            // ],
            'reports' => [
                'icon' => 'Book Open',
                'title' => 'รายงาน',
                'sub_menu' => [
                    'reports-sell' => [
                        'icon' => 'Dollar Sign',
                        'route_name' => 'BN_reports',
                        'params' => [],
                        'title' => 'การขาย'
                    ],
                    'reports-order' => [
                        'icon' => 'EditI',
                        'route_name' => 'BN_reports',
                        'params' => [],
                        'title' => 'รายการสั่งทำ'
                    ],
                    'reports-overall' => [
                        'icon' => 'BarChart2',
                        'route_name' => 'BN_reports',
                        'params' => [],
                        'title' => 'ภาพรวม'
                    ]
                ]
            ],

            'works' => [
                'icon' => 'Briefcase',
                'title' => 'งาน',
                'sub_menu' => [
                    'names-all' => [
                        'icon' => 'Folder',
                        'route_name' => 'BN_works',
                        'params' => [],
                        'title' => 'มอบหมายงาน'
                    ],
                    'names-suggest' => [
                        'icon' => 'Folder Plus',
                        'route_name' => 'BN_works',
                        'params' => [],
                        'title' => 'ตารางงาน'
                    ]
                ]
            ],
            'commissions' => [
                'icon' => 'Dollar Sign',
                'route_name' => 'BN_commissions',
                'params' => [],
                'title' => 'ค่าคอมมิทชั่น'
            ],
            'articles' => [
                'icon' => 'Image',
                'route_name' => 'BN_articles',
                'params' => [],
                'title' => 'บทความ'
            ],
            'contacts' => [
                'icon' => 'Mail',
                'route_name' => 'BN_contacts',
                'params' => [],
                'title' => 'ข้อความติดต่อ'
            ],
            
            'users' => [
                'icon' => 'User',
                'route_name' => 'BN_users',
                'params' => [],
                'title' => 'ยูสเซอร์'
            ],
            'settings' => [
                'icon' => 'Settings',
                'title' => 'ตั้งค่า',
                'sub_menu' => [
                    'settings-system' => [
                        'icon' => 'Monitor',
                        'route_name' => 'BN_settings',
                        'params' => [],
                        'title' => 'ตั้งค่าระบบ'
                    ],
                    'settings-defaultprice' => [
                        'icon' => 'Monitor',
                        'route_name' => 'BN_settings_defaultprice',
                        'params' => [],
                        'title' => 'ราคาพื้นฐาน'
                    ],
                    'settings-logs' => [
                        'icon' => 'List',
                        'route_name' => 'BN_settings',
                        'params' => [],
                        'title' => 'ประวัติการใช้งาน'
                    ]
                ]
            ],











            // 'blur' => [
            //     'icon' => 'home',
            //     'route_name' => 'bn_blur',
            //     'params' => [],
            //     'title' => 'blur'
            // ],
            // 'watermark' => [
            //     'icon' => 'home',
            //     'route_name' => 'bn_watermark',
            //     'params' => [],
            //     'title' => 'watermark'
            // ],
            // 'mosaic' => [
            //     'icon' => 'home',
            //     'route_name' => 'bn_mosaic',
            //     'params' => [],
            //     'title' => 'mosaic'
            // ],
            
            // 'customers' => [
            //     'icon' => 'Users',
            //     'route_name' => 'BN_customers',
            //     'params' => [],
            //     'title' => 'ลูกค้า'
            // ],

            // 'posts' => [
            //     'icon' => 'File',
            //     'route_name' => 'BN_posts',
            //     'params' => [],
            //     'title' => 'โพสท์ขายรถ'
            // ],
            // 'car' => [
            //     'icon' => 'Box',
            //     'title' => 'ข้อมูลรถ',
            //     'sub_menu' => [
            //         'caroverall' => [
            //             'icon' => 'Sidebar',
            //             'route_name' => 'BN_car',
            //             'params' => [],
            //             'title' => 'ภาพรวม'
            //         ],
            //         'brands' => [
            //             'icon' => 'Sidebar',
            //             'route_name' => 'BN_brands',
            //             'params' => [],
            //             'title' => 'ยี่ห้อรถ'
            //         ],
            //         'models' => [
            //             'icon' => 'Package',
            //             'route_name' => 'BN_carmd',
            //             'params' => [],
            //             'title' => 'รุ่นรถ'
            //         ],
            //         'generations' => [
            //             'icon' => 'Package',
            //             'route_name' => 'BN_generations',
            //             'params' => [],
            //             'title' => 'โฉม'
            //         ],
            //         'sub_model' => [
            //             'icon' => 'Box',
            //             'route_name' => 'BN_sub_models',
            //             'params' => [],
            //             'title' => 'รุ่นย่อย'
            //         ],
            //     ]
            // ],
            // 'cat' => [
            //     'icon' => 'Grid',
            //     'route_name' => 'BN_categories',
            //     'params' => [],
            //     'title' => 'หมวดหมู่'
            // ],
            // 'tag' => [
            //     'icon' => 'Tag',
            //     'route_name' => 'BN_tags',
            //     'params' => [],
            //     'title' => 'แท็ก'
            // ],
            // 'news' => [
            //     'icon' => 'File-Text',
            //     'route_name' => 'BN_news',
            //     'params' => [],
            //     'title' => 'ข่าว'
            // ],
            
            // 'contacts' => [
            //     'icon' => 'Phone Forwarded',
            //     'route_name' => 'BN_contacts',
            //     'params' => [],
            //     'title' => 'ติดต่อ'
            // ],
            // 'setting' => [
            //     'icon' => 'Settings',
            //     'title' => 'ตั้งค่าระบบ',
            //     'sub_menu' => [
            //         'slide' => [
            //             'icon' => 'Image',
            //             'route_name' => 'BN_slide',
            //             'params' => [],
            //             'title' => 'ตั้งค่าแบนเนอร์'
            //         ],
            //         'setfooter' => [
            //             'icon' => 'Sidebar',
            //             'route_name' => 'BN_setfooter',
            //             'params' => [],
            //             'title' => 'ตั้งค่า footer'
            //         ],
            //         'termcondition' => [
            //             'icon' => 'Sidebar',
            //             'route_name' => 'BN_termcondition',
            //             'params' => [],
            //             'title' => 'ข้อกำหนดในการให้บริการ'
            //         ],
            //         'privacypolicy' => [
            //             'icon' => 'Sidebar',
            //             'route_name' => 'BN_privacypolicy',
            //             'params' => [],
            //             'title' => 'นโยบายความเป็นส่วนตัว'
            //         ],
            //     ]
            // ],
            // 'devider',
            // 'logs' => [
            //     'icon' => 'Book',
            //     'route_name' => 'BN_logs',
            //     'params' => [],
            //     'title' => 'Log'
            // ],
            
            // 'dev' => [
            //     'icon' => 'Cloud-Lightning',
            //     'route_name' => 'BN_dev',
            //     'params' => [],
            //     'title' => 'ผู้พัฒนาระบบ'
            // ],
            // 'chat' => [
            //     'icon' => 'message-square',
            //     'route_name' => 'chat',
            //     'params' => [
            //         'layout' => 'side-menu'
            //     ],
            //     'title' => 'Chat'
            // ],
            // 'post' => [
            //     'icon' => 'file-text',
            //     'route_name' => 'post',
            //     'params' => [
            //         'layout' => 'side-menu'
            //     ],
            //     'title' => 'Post'
            // ],
            // 'crud' => [
            //     'icon' => 'edit',
            //     'title' => 'Crud',
            //     'sub_menu' => [
            //         'crud-data-list' => [
            //             'icon' => '',
            //             'route_name' => 'crud-data-list',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Data List'
            //         ],
            //         'crud-form' => [
            //             'icon' => '',
            //             'route_name' => 'crud-form',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Form'
            //         ]
            //     ]
            // ],
            // 'dashboard' => [
            //     'icon' => 'home',
            //     'title' => 'Dashboard',
            //     'sub_menu' => [
            //         'dashboard-overview-1' => [
            //             'icon' => '',
            //             'route_name' => 'dashboard-overview-1',
            //             'params' => [
            //                 'layout' => 'side-menu',
            //             ],
            //             'title' => 'Overview 1'
            //         ],
            //         'dashboard-overview-2' => [
            //             'icon' => '',
            //             'route_name' => 'dashboard-overview-2',
            //             'params' => [
            //                 'layout' => 'side-menu',
            //             ],
            //             'title' => 'Overview 2'
            //         ],
            //         'dashboard-overview-3' => [
            //             'icon' => '',
            //             'route_name' => 'dashboard-overview-3',
            //             'params' => [
            //                 'layout' => 'side-menu',
            //             ],
            //             'title' => 'Overview 3'
            //         ],
            //         'dashboard-overview-4' => [
            //             'icon' => '',
            //             'route_name' => 'dashboard-overview-4',
            //             'params' => [
            //                 'layout' => 'side-menu',
            //             ],
            //             'title' => 'Overview 4'
            //         ]
            //     ]
            // ],
            // 'menu-layout' => [
            //     'icon' => 'box',
            //     'title' => 'Menu Layout',
            //     'sub_menu' => [
            //         'side-menu' => [
            //             'icon' => '',
            //             'route_name' => 'dashboard-overview-1',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Side Menu'
            //         ],
            //         'simple-menu' => [
            //             'icon' => '',
            //             'route_name' => 'dashboard-overview-1',
            //             'params' => [
            //                 'layout' => 'simple-menu'
            //             ],
            //             'title' => 'Simple Menu'
            //         ],
            //         'top-menu' => [
            //             'icon' => '',
            //             'route_name' => 'dashboard-overview-1',
            //             'params' => [
            //                 'layout' => 'top-menu'
            //             ],
            //             'title' => 'Top Menu'
            //         ]
            //     ]
            // ],
            // 'inbox' => [
            //     'icon' => 'inbox',
            //     'route_name' => 'inbox',
            //     'params' => [
            //         'layout' => 'side-menu'
            //     ],
            //     'title' => 'Inbox'
            // ],
            // 'file-manager' => [
            //     'icon' => 'hard-drive',
            //     'route_name' => 'file-manager',
            //     'params' => [
            //         'layout' => 'side-menu'
            //     ],
            //     'title' => 'File Manager'
            // ],
            // 'point-of-sale' => [
            //     'icon' => 'credit-card',
            //     'route_name' => 'point-of-sale',
            //     'params' => [
            //         'layout' => 'side-menu'
            //     ],
            //     'title' => 'Point of Sale'
            // ],
            // 'chat' => [
            //     'icon' => 'message-square',
            //     'route_name' => 'chat',
            //     'params' => [
            //         'layout' => 'side-menu'
            //     ],
            //     'title' => 'Chat'
            // ],
            // 'post' => [
            //     'icon' => 'file-text',
            //     'route_name' => 'post',
            //     'params' => [
            //         'layout' => 'side-menu'
            //     ],
            //     'title' => 'Post'
            // ],
            // 'calendar' => [
            //     'icon' => 'calendar',
            //     'route_name' => 'calendar',
            //     'params' => [
            //         'layout' => 'side-menu'
            //     ],
            //     'title' => 'Calendar'
            // ],
            // 'devider',
            // 'crud' => [
            //     'icon' => 'edit',
            //     'title' => 'Crud',
            //     'sub_menu' => [
            //         'crud-data-list' => [
            //             'icon' => '',
            //             'route_name' => 'crud-data-list',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Data List'
            //         ],
            //         'crud-form' => [
            //             'icon' => '',
            //             'route_name' => 'crud-form',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Form'
            //         ]
            //     ]
            // ],
            // 'users' => [
            //     'icon' => 'users',
            //     'title' => 'Users',
            //     'sub_menu' => [
            //         'users-layout-1' => [
            //             'icon' => '',
            //             'route_name' => 'users-layout-1',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Layout 1'
            //         ],
            //         'users-layout-2' => [
            //             'icon' => '',
            //             'route_name' => 'users-layout-2',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Layout 2'
            //         ],
            //         'users-layout-3' => [
            //             'icon' => '',
            //             'route_name' => 'users-layout-3',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Layout 3'
            //         ]
            //     ]
            // ],
            // 'profile' => [
            //     'icon' => 'trello',
            //     'title' => 'Profile',
            //     'sub_menu' => [
            //         'profile-overview-1' => [
            //             'icon' => '',
            //             'route_name' => 'profile-overview-1',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Overview 1'
            //         ],
            //         'profile-overview-2' => [
            //             'icon' => '',
            //             'route_name' => 'profile-overview-2',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Overview 2'
            //         ],
            //         'profile-overview-3' => [
            //             'icon' => '',
            //             'route_name' => 'profile-overview-3',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Overview 3'
            //         ]
            //     ]
            // ],
            // 'pages' => [
            //     'icon' => 'layout',
            //     'title' => 'Pages',
            //     'sub_menu' => [
            //         'wizards' => [
            //             'icon' => '',
            //             'title' => 'Wizards',
            //             'sub_menu' => [
            //                 'wizard-layout-1' => [
            //                     'icon' => '',
            //                     'route_name' => 'wizard-layout-1',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 1'
            //                 ],
            //                 'wizard-layout-2' => [
            //                     'icon' => '',
            //                     'route_name' => 'wizard-layout-2',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 2'
            //                 ],
            //                 'wizard-layout-3' => [
            //                     'icon' => '',
            //                     'route_name' => 'wizard-layout-3',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 3'
            //                 ]
            //             ]
            //         ],
            //         'blog' => [
            //             'icon' => '',
            //             'title' => 'Blog',
            //             'sub_menu' => [
            //                 'blog-layout-1' => [
            //                     'icon' => '',
            //                     'route_name' => 'blog-layout-1',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 1'
            //                 ],
            //                 'blog-layout-2' => [
            //                     'icon' => '',
            //                     'route_name' => 'blog-layout-2',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 2'
            //                 ],
            //                 'blog-layout-3' => [
            //                     'icon' => '',
            //                     'route_name' => 'blog-layout-3',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 3'
            //                 ]
            //             ]
            //         ],
            //         'pricing' => [
            //             'icon' => '',
            //             'title' => 'Pricing',
            //             'sub_menu' => [
            //                 'pricing-layout-1' => [
            //                     'icon' => '',
            //                     'route_name' => 'pricing-layout-1',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 1'
            //                 ],
            //                 'pricing-layout-2' => [
            //                     'icon' => '',
            //                     'route_name' => 'pricing-layout-2',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 2'
            //                 ]
            //             ]
            //         ],
            //         'invoice' => [
            //             'icon' => '',
            //             'title' => 'Invoice',
            //             'sub_menu' => [
            //                 'invoice-layout-1' => [
            //                     'icon' => '',
            //                     'route_name' => 'invoice-layout-1',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 1'
            //                 ],
            //                 'invoice-layout-2' => [
            //                     'icon' => '',
            //                     'route_name' => 'invoice-layout-2',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 2'
            //                 ]
            //             ]
            //         ],
            //         'faq' => [
            //             'icon' => '',
            //             'title' => 'FAQ',
            //             'sub_menu' => [
            //                 'faq-layout-1' => [
            //                     'icon' => '',
            //                     'route_name' => 'faq-layout-1',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 1'
            //                 ],
            //                 'faq-layout-2' => [
            //                     'icon' => '',
            //                     'route_name' => 'faq-layout-2',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 2'
            //                 ],
            //                 'faq-layout-3' => [
            //                     'icon' => '',
            //                     'route_name' => 'faq-layout-3',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 3'
            //                 ]
            //             ]
            //         ],
            //         'login' => [
            //             'icon' => '',
            //             'route_name' => 'login',
            //             'params' => [
            //                 'layout' => 'login'
            //             ],
            //             'title' => 'Login'
            //         ],
            //         'register' => [
            //             'icon' => '',
            //             'route_name' => 'register',
            //             'params' => [
            //                 'layout' => 'login'
            //             ],
            //             'title' => 'Register'
            //         ],
            //         'error-page' => [
            //             'icon' => '',
            //             'route_name' => 'error-page',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Error Page'
            //         ],
            //         'update-profile' => [
            //             'icon' => '',
            //             'route_name' => 'update-profile',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Update profile'
            //         ],
            //         'change-password' => [
            //             'icon' => '',
            //             'route_name' => 'change-password',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Change Password'
            //         ]
            //     ]
            // ],
            // 'devider',
            // 'components' => [
            //     'icon' => 'inbox',
            //     'title' => 'Components',
            //     'sub_menu' => [
            //         'grid' => [
            //             'icon' => '',
            //             'title' => 'Grid',
            //             'sub_menu' => [
            //                 'regular-table' => [
            //                     'icon' => '',
            //                     'route_name' => 'regular-table',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Regular Table'
            //                 ],
            //                 'tabulator' => [
            //                     'icon' => '',
            //                     'route_name' => 'tabulator',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Tabulator'
            //                 ]
            //             ]
            //         ],
            //         'overlay' => [
            //             'icon' => '',
            //             'title' => 'Overlay',
            //             'sub_menu' => [
            //                 'modal' => [
            //                     'icon' => '',
            //                     'route_name' => 'modal',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Modal'
            //                 ],
            //                 'slide-over' => [
            //                     'icon' => '',
            //                     'route_name' => 'slide-over',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Slide Over'
            //                 ],
            //                 'notification' => [
            //                     'icon' => '',
            //                     'route_name' => 'notification',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Notification'
            //                 ],
            //             ]
            //         ],
            //         'tab' => [
            //             'icon' => '',
            //             'route_name' => 'tab',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Tab'
            //         ],
            //         'accordion' => [
            //             'icon' => '',
            //             'route_name' => 'accordion',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Accordion'
            //         ],
            //         'button' => [
            //             'icon' => '',
            //             'route_name' => 'button',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Button'
            //         ],
            //         'alert' => [
            //             'icon' => '',
            //             'route_name' => 'alert',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Alert'
            //         ],
            //         'progress-bar' => [
            //             'icon' => '',
            //             'route_name' => 'progress-bar',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Progress Bar'
            //         ],
            //         'tooltip' => [
            //             'icon' => '',
            //             'route_name' => 'tooltip',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Tooltip'
            //         ],
            //         'dropdown' => [
            //             'icon' => '',
            //             'route_name' => 'dropdown',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Dropdown'
            //         ],
            //         'typography' => [
            //             'icon' => '',
            //             'route_name' => 'typography',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Typography'
            //         ],
            //         'icon' => [
            //             'icon' => '',
            //             'route_name' => 'icon',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Icon'
            //         ],
            //         'loading-icon' => [
            //             'icon' => '',
            //             'route_name' => 'loading-icon',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Loading Icon'
            //         ]
            //     ]
            // ],
            // 'forms' => [
            //     'icon' => 'sidebar',
            //     'title' => 'Forms',
            //     'sub_menu' => [
            //         'regular-form' => [
            //             'icon' => '',
            //             'route_name' => 'regular-form',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Regular Form'
            //         ],
            //         'datepicker' => [
            //             'icon' => '',
            //             'route_name' => 'datepicker',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Datepicker'
            //         ],
            //         'tom-select' => [
            //             'icon' => '',
            //             'route_name' => 'tom-select',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Tom Select'
            //         ],
            //         'file-upload' => [
            //             'icon' => '',
            //             'route_name' => 'file-upload',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'File Upload'
            //         ],
            //         'wysiwyg-editor' => [
            //             'icon' => '',
            //             'title' => 'Wysiwyg Editor',
            //             'sub_menu' => [
            //                 'wysiwyg-editor-classic' => [
            //                     'icon' => '',
            //                     'route_name' => 'wysiwyg-editor-classic',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Classic'
            //                 ],
            //                 'wysiwyg-editor-inline' => [
            //                     'icon' => '',
            //                     'route_name' => 'wysiwyg-editor-inline',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Inline'
            //                 ],
            //                 'wysiwyg-editor-balloon' => [
            //                     'icon' => '',
            //                     'route_name' => 'wysiwyg-editor-balloon',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Balloon'
            //                 ],
            //                 'wysiwyg-editor-balloon-block' => [
            //                     'icon' => '',
            //                     'route_name' => 'wysiwyg-editor-balloon-block',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Balloon Block'
            //                 ],
            //                 'wysiwyg-editor-document' => [
            //                     'icon' => '',
            //                     'route_name' => 'wysiwyg-editor-document',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Document'
            //                 ],
            //             ]
            //         ],
            //         'validation' => [
            //             'icon' => '',
            //             'route_name' => 'validation',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Validation'
            //         ]
            //     ]
            // ],
            // 'widgets' => [
            //     'icon' => 'hard-drive',
            //     'title' => 'Widgets',
            //     'sub_menu' => [
            //         'chart' => [
            //             'icon' => '',
            //             'route_name' => 'chart',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Chart'
            //         ],
            //         'slider' => [
            //             'icon' => '',
            //             'route_name' => 'slider',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Slider'
            //         ],
            //         'image-zoom' => [
            //             'icon' => '',
            //             'route_name' => 'image-zoom',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Image Zoom'
            //         ]
            //     ]
            // ]
        ];
    }
}
