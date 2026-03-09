<?php

namespace Flute\Modules\FluteUsers\Components;

use Flute\Core\Components\Table;
use Flute\Core\Database\Entities\User;

class UsersTableComponent extends Table
{
    public array $paginationOptions = [15, 30];

    public int $perPage = 15;

    public function mount()
    {
        $this->setSelect(user()->can('admin.users') ? rep(User::class)->select()->columns([
            'id',
            'name',
            'roles',
            'last_logged',
        ])->load(['roles']) : rep(User::class)->select()->columns([
                'id',
                'name',
                'roles',
                'last_logged',
            ])->where('hidden', false)->load(['roles']));
    }

    public function columns() : array
    {
        return [
            [
                'label' => 'ID',
                'field' => 'id',
                'allowSort' => false,
                'searchable' => true,
                'defaultSort' => true,
                'defaultDirection' => 'desc',
                'searchFields' => ['id'],
                'width' => '80px'
            ],
            [
                'label' => __('fluteusers.user'),
                'field' => 'name',
                'width' => '250px',
                'allowSort' => true,
                'searchFields' => ['name'],
                'searchable' => true,
                'renderer' => function ($row) {
                    return view('fluteusers::cells.user', [
                        'row' => $row,
                    ])->render();
                }
            ],
            [
                'label' => __('fluteusers.roles'),
                'allowSort' => false,
                'field' => 'roles',
                'width' => '200px',
                'renderer' => function ($row) {
                    return view('fluteusers::cells.roles', [
                        'row' => $row,
                    ])->render();
                }
            ],
            [
                'label' => __('fluteusers.last_login'),
                'field' => 'last_logged',
                'allowSort' => true,
                'width' => '100px',
                'renderer' => function ($row) {
                    return $row->last_logged ? carbon($row->last_logged)->diffForHumans() : __('fluteusers.never');
                }
            ],
            [
                'label' => __('fluteusers.socials'),
                'allowSort' => false,
                'field' => 'socials',
                'width' => '150px',
                'renderer' => function ($row) {
                    return view('fluteusers::cells.socials', [
                        'row' => $row,
                    ])->render();
                }
            ]
        ];
    }
}