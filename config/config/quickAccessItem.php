<?php

return [

    [
        'title' => "index.cash desk",
        'routName' => "admin.transaction.index",
        'routParams' => [],

        'icon' => "",
    ],
    [
        'title' => "index.products",
        'routName' => "admin.product.index",
        'routParams' => [],

        'icon' => "",
    ],
    [
        'title' => "index.new orders",
        'routName' => "admin.orders.index",
        'routParams' => ['orderStatus' => 'awaiting_restaurant_approval'],
        'icon' => "ki-outline ki-handcart fs-2",
    ],
    [
        'title' => "index.ready orders",
        'routName' => "admin.orders.index",
        'routParams' => ['orderStatus' => 'ready_to_send'],
        'icon' => "ki-outline ki-handcart fs-2",
    ]
];

