@extends('layouts.app')

@section('content')

<h1>Contact</h1>

{{--<form action="/confirm" method="POST">--}}
<form action="{{ url('/confirm') }}" method="POST">
  @csrf

  <table class="form-table">
    <tr>
      <th>お名前<span class="required">※</span></th>
      <td>
        <div class="name-fields">
          <input type="text" name="last_name" placeholder="例 山田" value="{{ old('last_name') }}">
          <input type="text" name="first_name" placeholder="例 太郎" value="{{ old('first_name') }}">
        </div>
        @error('last_name')
          <div class="error-message">{{ $message }}</div>
        @enderror
        @error('first_name')
          <div class="error-message">{{ $message }}</div>
        @enderror
      </td>
    </tr>

    <tr>
      <th>性別<span class="required">※</span></th>
      <td>
        <label><input type="radio" name="gender" value="1" {{ old('gender', '1') == '1' ? 'checked' : '' }}>男性</label>
        <label><input type="radio" name="gender" value="2" {{ old('gender', '1') == '2' ? 'checked' : '' }}>女性</label>
        <label><input type="radio" name="gender" value="3" {{ old('gender', '1') == '3' ? 'checked' : '' }}>その他</label>
        @error('gender')
          <div class="error-message">{{ $message }}</div>
        @enderror
      </td>
    </tr>

    <tr>
      <th>メールアドレス<span class="required">※</span></th>
      <td>
        <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}">
        @error('email')
          <div class="error-message">{{ $message }}</div>
        @enderror
      </td>
    </tr>

    <tr>
      <th>電話番号<span class="required">※</span></th>
        <td>
          <div class="tel-fields">
            <div class="tel-field">
              <input type="text" name="tel1" placeholder="080" value="{{ old('tel1') }}">
              @error('tel1')
                <div class="error-message">{{ $message }}</div>
              @enderror
            </div>

            <div class="tel-field">
              <input type="text" name="tel2" placeholder="1234" value="{{ old('tel2') }}">
              @error('tel2')
                <div class="error-message">{{ $message }}</div>
              @enderror
            </div>

            <div class="tel-field">
              <input type="text" name="tel3" placeholder="5678" value="{{ old('tel3') }}">
              @error('tel3')
                <div class="error-message">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </td>
    </tr>

    <tr>
      <th>住所<span class="required">※</span></th>
      <td>
        <input type="text" name="address" placeholder="例 東京都渋谷区千駄ヶ谷1―2―3" value="{{ old('address') }}">
        @error('address')
          <div class="error-message">{{ $message }}</div>
        @enderror
      </td>
    </tr>

    <tr>
      <th>建物名</th>
      <td>
        <input type="text" name="building" placeholder="例 千駄ヶ谷マンション101" value="{{ old('building') }}">
        @error('building')
          <div class="error-message">{{ $message }}</div>
        @enderror
      </td>
    </tr>

    <tr>
      <th>お問い合わせの種類<span class="required">※</span></th>
      <td>
        <select name="category_id">
          <option value="">選択してください</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
              {{ $category->content }}
            </option>
          @endforeach
        </select>
        @error('category_id')
          <div class="error-message">{{ $message }}</div>
        @enderror
      </td>
    </tr>

    <tr>
      <th>お問い合わせ内容<span class="required">※</span></th>
      <td>
        <textarea name="detail" placeholder="お問い合わせ内容をご記入ください" maxlength="120">{{ old('detail') }}</textarea>
        @error('detail')
          <div class="error-message">{{ $message }}</div>
        @enderror
      </td>
    </tr>
  </table>

  <div class="form-submit">
    <button type="submit">確認画面へ</button>
  </div>
</form>

@endsection
