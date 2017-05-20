<?php
return [
    'admin-login' => 'admin/default/login',
    'user/<action:\w+>'=>'user/default/<action>',
    'user/activate-account/<code:\w+>'=>'user/account/activate-account',
    'user/account-created'=>'user/account/account-created',
    'user/password-reset/<code:\w+>'=>'user/account/password-reset',
    'avatar/<username:\w+>/<size:\w+>.png'=>'user/account/avatar',
    'user/<username:\w+>/<action:(activity|preferences)>'=>'/user/mine/<action>',
    'posts/<action:\w+>'=>'/posts/default/<action>',
    '<module:\w+>/<controller:\w+>' => '<module>/<controller>/index',
    '<action:\w+>'=>'home/user/<action>',

];