# Glitter Board Menu Sort

`sirsoft-board` 1.2.1의 공식 `sirsoft-board.board.filter_menu_list_result` 훅을 구독해, 이미 권한 필터링된 게시판 컬렉션을 `created_at DESC`, `id DESC`로 재정렬하는 플러그인입니다.

플러그인은 항목을 추가·제거하지 않고 모델을 수정하거나 캐시 저장소를 변경하지 않습니다. `sirsoft-board >=1.2.1`이 필요합니다.

이 API 훅에는 템플릿/호출 화면 컨텍스트가 없으므로 활성 시 같은 API를 쓰는 모든 소비자가 영향을 받습니다. 비활성화하면 sirsoft-board의 기본 관리자 `display_order` 순서로 복귀합니다.
