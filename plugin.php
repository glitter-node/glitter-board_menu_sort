<?php

namespace Plugins\Glitter\BoardMenuSort;

use App\Extension\AbstractPlugin;
use Plugins\Glitter\BoardMenuSort\Listeners\SortMenuBoardsListener;

class Plugin extends AbstractPlugin
{
    /**
     * 공식 sirsoft-board 메뉴 결과 필터 구독자를 등록합니다.
     *
     * @return array<class-string>
     */
    public function getHookListeners(): array
    {
        return [SortMenuBoardsListener::class];
    }
}
