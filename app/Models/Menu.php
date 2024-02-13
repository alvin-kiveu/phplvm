<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public static function getCommonMenuItems()
    {
        return [
            [
                'text' => 'VPN',
                'icon' => 'feather icon-shield',
                'url' => 'vpn',
            ],
            [
                'text' => 'My Addon',
                'icon' => 'feather icon-box',
                'url' => 'myaddon',
            ],
            [
                'text' => 'PPPTP Management',
                'icon' => 'feather icon-shield',
                'submenu' => [
                    [
                        'text' => 'Add PPPTP',
                        'url' => '/addppptp',
                    ],
                    [
                        'text' => 'View PPPTP',
                        'url' => '/viewppptp',
                    ],
                ],
            ],
            [
                'text' => 'User Management',
                'icon' => 'feather icon-users',
                'submenu' => [
                    [
                        'text' => 'Add Role',
                        'url' => '/role/add',
                    ],
                    [
                        'text' => 'Roles',
                        'url' => '/role/list',
                    ],
                    [
                        'text' => 'Add User',
                        'url' => '/user/add',
                    ],
                    [
                        'text' => 'View Users',
                        'url' => '/user/list',
                    ],
                ],
            ],
        ];
    }
}
?>
