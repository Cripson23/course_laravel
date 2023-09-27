<?php
return [
    'cars' => [
        'created' => ['key' => 'cars.created', 'type' => 'success'],
        'restored' => ['key' => 'cars.restored', 'type' => 'success'],
        'restored-fail-vin' => ['key' => 'cars.restored-fail-vin', 'type' => 'danger'],
        'edited' => ['key' => 'cars.edited', 'type' => 'info'],
        'destroyed' => ['key' => 'cars.destroyed', 'type' => 'success'],
        'destroyed-fail-status' => ['key' => 'cars.destroyed-fail-status', 'type' => 'danger'],
        'deleted' => ['key' => 'cars.deleted', 'type' => 'success'],
    ],
    'brands' => [
        'created' => ['key' => 'brands.created', 'type' => 'success'],
        'edited' => ['key' => 'brands.edited', 'type' => 'info'],
        'destroyed' => ['key' => 'brands.destroyed', 'type' => 'danger'],
    ],
    'countries' => [
        'created' => ['key' => 'countries.created', 'type' => 'success'],
        'edited' => ['key' => 'countries.edited', 'type' => 'info'],
        'destroyed' => ['key' => 'countries.destroyed', 'type' => 'danger'],
    ],
    'tags' => [
        'created' => ['key' => 'tags.created', 'type' => 'success'],
        'edited' => ['key' => 'tags.edited', 'type' => 'info'],
        'destroyed' => ['key' => 'tags.destroyed', 'type' => 'danger'],
    ],
    'comments' => [
        'created' => ['key' => 'comments.created', 'type' => 'success'],
        'entity-not-founded' => ['key' => 'comments.entity-not-founded', 'type' => 'danger'],
        'entity-id-not-founded' => ['key' => 'comments.entity-id-not-founded', 'type' => 'danger']
    ],
    'auth' => [
        'register' => ['key' => 'auth.register', 'type' => 'success']
    ]
];
