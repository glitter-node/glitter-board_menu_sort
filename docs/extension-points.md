# 구독 확장점

## `sirsoft-board.board.filter_menu_list_result`

- **종류:** Filter
- **최소 버전:** `sirsoft-board 1.2.1`
- **인자:** `Illuminate\Support\Collection $boards`, `array $context`
- **반환:** 같은 컬렉션 계열의 정렬된 컬렉션
- **발행:** `BoardService::getMenuBoards()`

모듈은 활성 게시판을 공용 캐시에서 읽고 현재 사용자의 게시판 열람 권한으로 필터링한 뒤, 모델 복제본 컬렉션에 결과 훅을 적용합니다. 컨텍스트에는 `user`와 `locale`이 포함됩니다. 훅 호출 화면이나 템플릿 식별자는 포함되지 않습니다.

리스너는 기존 컬렉션만 `created_at DESC`, `id DESC`로 정렬합니다. 조회·필터링·모델 수정은 하지 않습니다. 결과 훅은 캐시 읽기 뒤에 실행되므로 공용 캐시에 이 정렬 결과를 저장하지 않습니다.

## 적용 범위

같은 API를 사용하는 PC·모바일 헤더 및 다른 소비자에 동일하게 적용됩니다. 특정 템플릿/화면만 골라 적용할 서버 요청 컨텍스트는 제공되지 않습니다. 플러그인을 비활성화하면 모듈 기본 `display_order` 순서가 복원됩니다.
