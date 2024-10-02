<?php

return [
    "1" => [
        [
            'title' => "dashboard",
            'routName' => "admin.index",
            'icon' => "ki-outline ki-home fs-2",
        ],
        [
            'title' => "orders list",
            'routName' => "",
            'icon' => "ki-outline ki-handcart fs-2",
            'child' => [
                [
                    'title' => "all orders list",
                    'routName' => "admin.orders.index",
                    'icon' => "ki-outline ki-handcart fs-2",
                ]
            ]

        ],
        [
            'title' => "users menu list",
            'routName' => "",
            'icon' => "ki-outline ki-user fs-2",
            'child' => [
                [
                    'title' => "creat client user",
                    'routName' => "admin.user.client.create",
                    'icon' => "",
                ],
                [
                    'title' => "customers list",
                    'routName' => "admin.user.client.index",
                    'icon' => "",
                ],
                [
                    'title' => "branch list",
                    'routName' => "admin.branch.index",
                    'icon' => "",
                ]
            ]

        ],
        [
            'title' => "discounts",
            'routName' => "",
            'icon' => "ki-outline ki-discount fs-2",
            'child' => [
                [
                    'title' => "add discount",
                    'routName' => "admin.discount.create",
                    'icon' => "",
                ],
                [
                    'title' => "list discount",
                    'routName' => "admin.discount.index",
                    'icon' => "",
                ]
            ]

        ],
        [
            'title' => "products list",
            'routName' => "admin.product.index",
            'icon' => "ki-outline ki-filter-tablet fs-2",
        ],
        [
            'title' => "category list",
            'routName' => "",
            'icon' => "ki-outline ki-category fs-2",
            'child' => [
                [
                    'title' => "all category",
                    'routName' => "admin.category.index",
                    'parameters' => "0",
                    'icon' => "",
                ]
            ]

        ],
//        [
//            'title' => "material list",
//            'routName' => "",
//            'icon' => "ki-outline ki-questionnaire-tablet fs-2",
//            'child' => [
//                [
//                    'title' => "all material",
//                    'routName' => "admin.material.index",
//                    'icon' => "",
//                ],
//                [
//                    'title' => "add new",
//                    'routName' => "admin.material.create",
//                    'icon' => "",
//                ]
//            ]
//
//        ],
//        [
//            'title' => "extra type list",
//            'routName' => "",
//            'icon' => "ki-outline ki-data fs-2",
//            'child' => [
//                [
//                    'title' => "all extra types",
//                    'routName' => "admin.extraType.index",
//                    'icon' => "",
//                ],
//                [
//                    'title' => "add extra type",
//                    'routName' => "admin.extraType.create",
//                    'icon' => "",
//                ]
//            ]
//        ],
        [
            'title' => "sliders",
            'routName' => "",
            'icon' => "ki-outline ki-picture fs-2",
            'child' => [
                [
                    'title' => "all sliders",
                    'routName' => "admin.sliders.index",
                    'icon' => "",
                ],
                [
                    'title' => "new slider",
                    'routName' => "admin.sliders.create",
                    'icon' => "",
                ]
            ]
        ],
        [
            'title' => "pages",
            'routName' => "",
            'icon' => "ki-outline ki-element-9 fs-2",
            'child' => [
                [
                    'title' => "pages",
                    'routName' => "admin.page.index",
                    'icon' => "",
                ],
                [
                    'title' => "create page",
                    'routName' => "admin.page.create",
                    'icon' => "",
                ]
            ]
        ],
        [
            'title' => "citys",
            'routName' => "",
            'icon' => "ki-outline ki-map fs-2",
            'child' => [
                [
                    'title' => "citys list",
                    'routName' => "admin.area.index",
                    'parameters' => "0",
                    'icon' => "",
                ],
                [
                    'title' => "add new",
                    'routName' => "admin.area.create",
                    'parameters' => "0",
                    'icon' => "",
                ]
            ]
        ],
        [
            'title' => "vendor",
            'routName' => "",
            'icon' => "ki-outline ki-mouse-square fs-2",
            'child' => [
                [
                    'title' => "vendors registered list",
                    'routName' => "admin.vendors.index",
                    'icon' => "",
                ]
            ]
        ],
        [
            'title' => "comments list",
            'routName' => "",
            'icon' => "ki-outline ki-send fs-2",
            'child' => [
                [
                    'title' => "all comments list",
                    'routName' => "admin.comments.index",
                    'icon' => "",
                ]
            ]
        ],
        [
            'title' => "Financial",
            'routName' => "",
            'icon' => "ki-outline ki-graph-up fs-2",
            'child' => [
                [
                    'title' => "Financial all list",
                    'routName' => "admin.transaction.index",
                    'icon' => "",
                ],
                [
                    'title' => "creat settlement user",
                    'routName' => "admin.settlement.create",
                    'icon' => "",
                ],
                [
                    'title' => "list settlement",
                    'routName' => "admin.settlement.WalletBranches",
                    'icon' => "",
                ]
            ]
        ],
        [
            'title' => "settings",
            'routName' => "",
            'icon' => "ki-outline ki-setting-2 fs-2x",
            'child' => [
                [
                    'title' => "setting seo",
                    'routName' => "admin.setting.seo",
                    'icon' => "",
                ],
                [
                    'title' => "setting home",
                    'routName' => "admin.setting.home",
                    'icon' => "",
                ],
                [
                    'title' => "setting general",
                    'routName' => "admin.setting.general",
                    'icon' => "",
                ]
            ]
        ],

        [
            'title' => "shipment types",
            'routName' => "",
            'icon' => "ki-outline ki-map fs-2x",
            'child' => [
                [
                    'title' => "list shipment type",
                    'routName' => "admin.deliveryType.index",
                    'icon' => "",
                ],
                [
                    'title' => "create shipment type",
                    'routName' => "admin.deliveryType.create",
                    'icon' => "",
                ]
            ]
        ],
        [
            'title' => "list tikets",
            'routName' => "admin.ticket.index",
            'icon' => "ki-outline ki-sms fs-2",
        ],
        [
            'title' => "list exports",
            'routName' => "admin.listExport.index",
            'icon' => "ki-outline ki-file fs-2",
        ],
    ],
    "3" => [
        [
            'title' => "dashboard",
            'routName' => "admin.index",
            'icon' => "ki-outline ki-home fs-2",
        ],
        [
            'title' => "orders list",
            'routName' => "",
            'icon' => "ki-outline ki-handcart fs-2",
            'child' => [
                [
                    'title' => "all orders list",
                    'routName' => "admin.orders.index",
                    'icon' => "ki-outline ki-handcart fs-2",

                ]
            ]

        ],
        [
            'title' => "products list",
            'routName' => "",
            'icon' => "ki-outline ki-filter-tablet fs-2",
            'child' => [
                [
                    'title' => "add new product",
                    'routName' => "admin.product.create",
                    'parameters' => "0",
                    'icon' => "",
                ],
                [
                    'title' => "view all products",
                    'routName' => "admin.product.index",
                    'icon' => "",
                ]
            ]

        ],
        [
            'title' => "category list",
            'routName' => "",
            'icon' => "ki-outline ki-category fs-2",
            'child' => [
                [
                    'title' => "all category",
                    'routName' => "admin.category.index",
                    'parameters' => "0",
                    'icon' => "",
                ]
            ]

        ],
//        [
//            'title' => "extra type list",
//            'routName' => "",
//            'icon' => "ki-outline ki-data fs-2",
//            'child' => [
//                [
//                    'title' => "all extra types",
//                    'routName' => "admin.extraType.index",
//                    'icon' => "",
//                ],
//                [
//                    'title' => "add extra type",
//                    'routName' => "admin.extraType.create",
//                    'icon' => "",
//
//                ]
//            ]
//        ],
        [
            'title' => "bank account list",
            'routName' => "",
            'icon' => "ki-outline ki-graph-up fs-2",
            'child' => [
                [
                    'title' => "bank account list",
                    'routName' => "admin.bankAccount.index",
                    'icon' => "",
                ],
                [
                    'title' => "bank account create",
                    'routName' => "admin.bankAccount.create",
                    'icon' => "",
                ]
            ]
        ],
        [
            'title' => "Financial",
            'routName' => "",
            'icon' => "ki-outline ki-graph-up fs-2",
            'child' => [
                [
                    'title' => "Financial all list",
                    'routName' => "admin.transaction.index",
                    'icon' => "",
                ]
            ]
        ],
        [
            'title' => "gallery",
            'routName' => "admin.branch.gallery",
            'icon' => "ki-outline ki-picture fs-2",
        ],
        [
            'title' => "activity",
            'routName' => "admin.branch.activity",
            'icon' => "ki-outline ki-time fs-2",
        ],
        [
            'title' => "list tikets",
            'routName' => "admin.ticket.index",
            'icon' => "ki-outline ki-sms fs-2",
        ],
        [
            'title' => "profile",
            'routName' => "admin.branch.edit",
            'icon' => "ki-outline ki-user fs-2",
        ],
        [
            'title' => "delivery areas",
            'routName' => "admin.branch.deliveryAreas",
            'parameters' => "0",
            'icon' => "ki-outline ki-map fs-2",
        ],
        [
            'title' => "delivery types",
            'routName' => "admin.branch.deliveryTypes",
            'parameters' => "0",
            'icon' => "ki-outline  fs-2",
        ]
    ],
    "5" => [
        [
            'title' => "dashboard",
            'routName' => "admin.index",
            'icon' => "ki-outline ki-home fs-2",
        ],
        [
            'title' => "orders list",
            'routName' => "",
            'icon' => "ki-outline ki-handcart fs-2",
            'child' => [
                [
                    'title' => "all orders ready_to_send",
                    'routName' => "admin.orders.index",
                    'icon' => "ki-outline ki-handcart fs-2",
                    'parameters' => ["orderStatus" => "ready_to_send"],

                ], [
                    'title' => "you orders list",
                    'routName' => "admin.orders.index",
                    'icon' => "ki-outline ki-handcart fs-2",

                ],
            ]
        ],
        [
            'title' => "Financial",
            'routName' => "",
            'icon' => "ki-outline ki-graph-up fs-2",
            'child' => [
                [
                    'title' => "Financial all list",
                    'routName' => "admin.transaction.index",
                    'icon' => "",
                ]
            ]
        ],
    ],
    "6" => [
        [
            'title' => "dashboard",
            'routName' => "admin.index",
            'icon' => "ki-outline ki-home fs-2",
        ],
        [
            'title' => "orders list",
            'routName' => "",
            'icon' => "ki-outline ki-handcart fs-2",
            'child' => [
                [
                    'title' => "all orders list",
                    'routName' => "admin.orders.index",
                    'icon' => "ki-outline ki-handcart fs-2",
                ]
            ]

        ],
        [
            'title' => "users menu list",
            'routName' => "",
            'icon' => "ki-outline ki-user fs-2",
            'child' => [
                [
                    'title' => "creat client user",
                    'routName' => "admin.user.client.create",
                    'icon' => "",
                ],
                [
                    'title' => "customers list",
                    'routName' => "admin.user.client.index",
                    'icon' => "",
                ]
            ]

        ],
        [
            'title' => "discounts",
            'routName' => "",
            'icon' => "ki-outline ki-discount fs-2",
            'child' => [
                [
                    'title' => "add discount",
                    'routName' => "admin.discount.create",
                    'icon' => "",
                ],
                [
                    'title' => "list discount",
                    'routName' => "admin.discount.index",
                    'icon' => "",
                ]
            ]

        ],
        [
            'title' => "products list",
            'routName' => "",
            'icon' => "ki-outline ki-filter-tablet fs-2",
            'child' => [
                [
                    'title' => "add new product",
                    'routName' => "admin.product.create",
                    'parameters' => "0",
                    'icon' => "",
                ],
                [
                    'title' => "view all products",
                    'routName' => "admin.product.index",
                    'icon' => "",
                ]
            ]

        ],
        [
            'title' => "category list",
            'routName' => "",
            'icon' => "ki-outline ki-category fs-2",
            'child' => [
                [
                    'title' => "all category",
                    'routName' => "admin.category.index",
                    'parameters' => "0",
                    'icon' => "",
                ]
            ]

        ],
        /*   [
               'title' => "extra type list",
               'routName' => "",
               'icon' => "ki-outline ki-data fs-2",
               'child' => [
                   [
                       'title' => "all extra types",
                       'routName' => "admin.extraType.index",
                       'icon' => "",
                   ],
                   [
                       'title' => "add extra type",
                       'routName' => "admin.extraType.create",
                       'icon' => "",
                   ]
               ]
           ],*/
        /* [
             'title' => "sliders",
             'routName' => "",
             'icon' => "ki-outline ki-picture fs-2",
             'child' => [
                 [
                     'title' => "all sliders",
                     'routName' => "admin.sliders.index",
                     'icon' => "",
                 ],
                 [
                     'title' => "new slider",
                     'routName' => "admin.sliders.create",
                     'icon' => "",
                 ]
             ]
         ],*/
        [
            'title' => "pages",
            'routName' => "",
            'icon' => "ki-outline ki-element-9 fs-2",
            'child' => [
                [
                    'title' => "pages",
                    'routName' => "admin.page.index",
                    'icon' => "",
                ],
                [
                    'title' => "create page",
                    'routName' => "admin.page.create",
                    'icon' => "",
                ]
            ]
        ],
        [
            'title' => "cities",
            'routName' => "",
            'icon' => "ki-outline ki-map fs-2",
            'child' => [
                [
                    'title' => "cities list",
                    'routName' => "admin.area.index",
                    'parameters' => "0",
                    'icon' => "",
                ],
                [
                    'title' => "add new",
                    'routName' => "admin.area.create",
                    'parameters' => "0",
                    'icon' => "",
                ],
                [
                    'title' => "delivery areas",
                    'routName' => "admin.branch.deliveryAreas",
                    'parameters' => "0",
                    'icon' => "",
                ]
            ]
        ],

        [
            'title' => "comments list",
            'routName' => "",
            'icon' => "ki-outline ki-send fs-2",
            'child' => [
                [
                    'title' => "all comments list",
                    'routName' => "admin.comments.index",
                    'icon' => "",
                ]
            ]
        ],
        [
            'title' => "Financial",
            'routName' => "",
            'icon' => "ki-outline ki-graph-up fs-2",
            'child' => [
                [
                    'title' => "Financial all list",
                    'routName' => "admin.transaction.index",
                    'icon' => "",
                ]
            ]
        ],
        [
            'title' => "settings",
            'routName' => "",
            'icon' => "ki-outline ki-setting-2 fs-2x",
            'child' => [

                [
                    'title' => "setting seo",
                    'routName' => "admin.setting.seo",
                    'icon' => "",
                ],
                [
                    'title' => "setting general",
                    'routName' => "admin.setting.general",
                    'icon' => "",
                ],
                [
                    'title' => "profile",
                    'routName' => "admin.branch.edit",
                    'icon' => "ki-outline ki-user fs-2",
                ],
                [
                    'title' => "activity",
                    'routName' => "admin.branch.activity",
                    'icon' => "ki-outline ki-time fs-2",
                ],
            ]
        ],
        [
            'title' => "shipment types",
            'routName' => "",
            'icon' => "ki-outline ki-map fs-2x",
            'child' => [
                [
                    'title' => "list shipment type",
                    'routName' => "admin.deliveryType.index",
                    'icon' => "",
                ],
                [
                    'title' => "create shipment type",
                    'routName' => "admin.deliveryType.create",
                    'icon' => "",
                ]
            ]
        ],
        [
            'title' => "delivery types",
            'routName' => "admin.branch.deliveryTypes",
            'parameters' => "0",
            'icon' => "ki-outline   fs-2",
        ],
        [
            'title' => "list tikets",
            'routName' => "admin.ticket.index",
            'icon' => "ki-outline ki-sms fs-2",
        ],
        [
            'title' => "list exports",
            'routName' => "admin.listExport.index",
            'icon' => "ki-outline ki-file fs-2",
        ],
    ],
];
