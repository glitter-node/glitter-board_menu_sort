<?php

namespace Plugins\Glitter\BoardMenuSort\Listeners;

use App\Contracts\Extension\HookListenerInterface;
use DateTimeInterface;
use Illuminate\Support\Collection;

/**
 * sirsoft-board 사용자 메뉴 결과를 생성일 최신순으로 재배열합니다.
 */
class SortMenuBoardsListener implements HookListenerInterface
{
    /**
     * @return array<string, array{method: string, priority: int, type: string}>
     */
    public static function getSubscribedHooks(): array
    {
        return [
            'sirsoft-board.board.filter_menu_list_result' => [
                'method' => 'sortNewestFirst',
                'priority' => 10,
                'type' => 'filter',
            ],
        ];
    }

    /**
     * HookListenerInterface 기본 진입점입니다. 실제 구독 메서드는 별도 지정합니다.
     *
     * @param  mixed  ...$args  훅 인자
     */
    public function handle(...$args): void
    {
        // getSubscribedHooks()의 sortNewestFirst()가 실행됩니다.
    }

    /**
     * 전달받은 게시판만 생성일 내림차순으로 정렬합니다.
     * created_at 동률은 id 내림차순으로 안정화합니다.
     *
     * @param  Collection<int, mixed>  $boards  권한 검사를 마친 복제 모델 컬렉션
     * @param  array<string, mixed>  $context  현재 사용자·로케일
     * @return Collection<int, mixed> 같은 모델 인스턴스를 담은 정렬 컬렉션
     */
    public function sortNewestFirst(Collection $boards, array $context = []): Collection
    {
        return $boards
            ->sort(function ($left, $right): int {
                $createdAt = $this->compareCreatedAt($right->getAttribute('created_at') ?? null, $left->getAttribute('created_at') ?? null);

                if ($createdAt !== 0) {
                    return $createdAt;
                }

                return ((int) $right->getAttribute('id')) <=> ((int) $left->getAttribute('id'));
            })
            ->values();
    }

    private function compareCreatedAt(mixed $left, mixed $right): int
    {
        if ($left === null || $right === null) {
            return ($left !== null) <=> ($right !== null);
        }

        $leftValue = $left instanceof DateTimeInterface ? $left->format('U.u') : (string) $left;
        $rightValue = $right instanceof DateTimeInterface ? $right->format('U.u') : (string) $right;

        return $leftValue <=> $rightValue;
    }
}
