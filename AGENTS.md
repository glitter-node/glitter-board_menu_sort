# Glitter Board Menu Sort 개발 안내

## 목적과 범위

이 플러그인은 `sirsoft-board >=1.2.1`의 `sirsoft-board.board.filter_menu_list_result`만 구독합니다. 권한 검사가 끝난 메뉴 컬렉션을 `created_at DESC`, `id DESC`로 재배열합니다.

## 작업 규칙

- 소스는 `plugins/_bundled/glitter-board_menu_sort/`에서만 수정합니다. `plugins/glitter-board_menu_sort/`는 활성 설치본이므로 직접 수정하지 않습니다.
- 운영 반영은 `plugin:install` 또는 `plugin:update` 생명주기로 수행합니다. 이번 작업에서는 설치·활성화하지 않았습니다.
- 훅 입력 컬렉션에서 게시판을 조회·추가·제거하거나 모델 속성을 변경하지 않습니다.
- 필터의 범위는 같은 board-menu API를 사용하는 모든 소비자입니다. 호출 화면을 `Referer`, User-Agent, 클라이언트 템플릿 이름으로 추정하지 않습니다.
- 코드 변경 시 `plugin.json`, `composer.json`, `CHANGELOG.md` 버전을 동기화하고 변경 이력을 기록합니다.
- Filter 구독에는 반드시 `'type' => 'filter'`를 선언합니다.

## 진입점

- `plugin.php`: 플러그인과 리스너 연결
- `src/Listeners/SortMenuBoardsListener.php`: 순수 결과 재정렬
- `plugin.json`: 코어/모듈 최소 버전 및 의존성
- `docs/README.md`: 상세 계약과 운영 문서
