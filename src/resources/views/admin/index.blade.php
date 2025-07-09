@extends('layouts.admin')

@section('content')

<h1 class="auth-title">Admin</h1>

<div class="search-page">
    <form action="/admin" class="search-form" method="get">
        {{--名前・メールアドレス検索フォーム--}}
        <input type="text" class="search-item search-text" name="name" placeholder="名前やメールアドレスを入力してください" value="{{ request('name') }}">

        {{--性別検索セレクトボックス--}}
        <select name="gender" class="search-item search-gender">
            <option value="">性別</option>
            {{--「検索実行したあと、選んだ値（性別やカテゴリ）を再度選ばれた状態にしておく」--}}
            <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>すべて</option>
            <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>男性</option>
            <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>女性</option>
            <option value="4" {{ request('gender') == '4' ? 'selected' : '' }}>その他</option>
        </select>

        {{--お問合せ種類検索セレクトボックス--}}
        <select name="category_id" class="search-item search-category">
            <option value="">お問合せの種類</option>
            @foreach($categories as $category)
            {{--「検索実行したあと、選んだ値（性別やカテゴリ）を再度選ばれた状態にしておく」--}}
            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->content }}
            </option>
            @endforeach
        </select>

        {{--日付検索カレンダー--}}
        <input type="date" class="search-item search-date" name="date" value="{{ request('date') }}">

        {{--検索ボタン・リセットボタン--}}
        <div class="button-group">
            <button class="search-button" type="submit">検索</button>
            <a class="reset-button" href="{{ route('admin.index') }}" type="submit">リセット</a>
        </div>
    </form>
</div>

<div class="export-pagination">
    <form action="/admin/export" method="get">
        <button class="export-btn btn btn-primary">エクスポート</button>
    </form>
    
    {{-- ページネーションリンクの表示 --}}
    {{ $contacts->links() }}
</div>

{{--一覧表示--}}
<table class="contact-table">
  <tr class="table-header">
    <th class="header-name">お名前</th>
    <th class="header-gender">性別</th>
    <th class="header-email">メールアドレス</th>
    <th class="header-category">お問い合わせの種類</th>
    <th class="header-detail"></th>
  </tr>
  @foreach ($contacts as $contact)
  <tr class="table-row">
    <td class="row-name">{{ $contact->last_name }} {{ $contact->first_name }}</td>
    <td class="row-gender">
      @if ($contact->gender == 1)
        Male
      @elseif ($contact->gender == 2)
        Female
      @else
        Other
      @endif
    </td>
    <td class="row-email">{{ $contact->email }}</td>
    <td class="row-category">{{ $contact->category->content ?? 'Uncategorized' }}</td>
    <td class="row-detail">
      <a href="{{ route('admin.show', $contact->id) }}" class="detail-button">詳細</a>
    </td>
  </tr>
  @endforeach
</table>

@endsection