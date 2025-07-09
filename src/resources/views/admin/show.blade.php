{{--
※レイアウトが適用されるように一時的に追記（モーダルウィンドウのCSS確認用） 
※モーダル実装時は削除予定
@extends('layouts.admin')
@section('content')
--}}


<div class="modal-content">

  {{-- 閉じるボタン --}}
  <div class="modal-close-btn">
    <button type="button" class="modal-close-btn-submit" onclick="window.closeModal()">
      ✖
    </button>
</div>

  <table class="modal-table">
    <tr class="modal-row">
      <th class="modal-th">お名前</th>
      <td class="modal-td">{{ $contact->last_name }} {{ $contact->first_name }}</td>
    </tr>
    <tr class="modal-row">
      <th class="modal-th">性別</th>
      <td class="modal-td">
        @if ($contact->gender === 1) 男性
        @elseif ($contact->gender === 2) 女性
        @else その他
        @endif
      </td>
    </tr>
    <tr class="modal-row">
      <th class="modal-th">メールアドレス</th>
      <td class="modal-td">{{ $contact->email }}</td>
    </tr>
    <tr class="modal-row">
      <th class="modal-th">電話番号</th>
      <td class="modal-td">{{ $contact->tel }}</td>
    </tr>
    <tr class="modal-row">
      <th class="modal-th">住所</th>
      <td class="modal-td">{{ $contact->address }}</td>
    </tr>
    <tr class="modal-row">
      <th class="modal-th">建物名</th>
      <td class="modal-td">{{ $contact->building ?? '-' }}</td>
    </tr>
    <tr class="modal-row">
      <th class="modal-th">お問い合わせ内容</th>
      <td class="modal-td">{{ $contact->detail }}</td>
    </tr>
  </table>

  <form method="POST" action="{{ route('admin.destroy', $contact->id) }}" class="modal-delete-form">
    @csrf
    @method('DELETE')
    <button type="submit" class="modal-delete-btn">
      削除
    </button>
  </form>

</div>

<script>
  window.closeModal = function() {
    alert('閉じる処理を実装してください');
  }
</script>

{{--
※レイアウトが適用されるように一時的に追記（モーダルウィンドウのCSS確認用） 
※モーダル実装時は削除予定 
@endsection
--}}