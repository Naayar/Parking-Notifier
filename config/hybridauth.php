<?php
use Cake\Core\Configure;
 
return [
    'HybridAuth' => [
        'providers' => [
            'Facebook' => [
                'enabled' => true,
                'keys' => [
                    'id' => '1746281588966450',
                    'secret' => '030fc1337edb02a87f6b564a8043448a'
                ],
                'scope' => 'email, public_profile'
            ]
        ]
    ],
];
