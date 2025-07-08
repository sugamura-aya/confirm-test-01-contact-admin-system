@extends('layouts.app')

@section('content')

<h1 class="title">Confirm</h1>

<div class="confirm-table">
    <table class="confirm-table__inner">
        <tr>
            <th class="confirm-table__content">お名前 </th>
            <td class="confirm-table__answer">{{ $contact['last_name'] }} {{ $contact['first_name'] }}</td>
        </tr>
        <tr>
            <th class="confirm-table__content">性別</th>
            <td class="confirm-table__answer">
                @if ($contact['gender'] == '1')
                    男性
                @elseif ($contact['gender'] == '2')
                    女性
                @elseif ($contact['gender'] == '3')
                    その他
                @else
                    未選択
                @endif
            </td>
        </tr>
        <tr>
            <th class="confirm-table__content">メールアドレス</th>
            <td class="confirm-table__answer">{{$contact['email']}}</td>
        </tr>
        <tr>
            <th class="confirm-table__content">電話番号</th>
            <td class="confirm-table__answer">{{$contact['tel']}}</td>
        </tr>
        <tr>
            <th class="confirm-table__content">住所</th>
            <td class="confirm-table__answer">{{$contact['address']}}</td>
        </tr>
        <tr>
            <th class="confirm-table__content">建物名</th>
            <td class="confirm-table__answer">{{$contact['building']}}</td>
        </tr>
        <tr>
            <th class="confirm-table__content">お問い合わせの種類</th>
            <td class="confirm-table__answer">{{ $categoryName }}</td>
        </tr>
        <tr>
            <th class="confirm-table__content">お問い合わせ内容</th>
            <td class="confirm-table__answer">{{$contact['detail']}}</td>
        </tr>
    </table>
</div>


<div class="confirm-form__button">
    <form class="send-button" action="/thanks" method="POST">
    @csrf
        <button class="send-button-submit" type="submit">送信</button>
    </form>

    <form class="correction-button" action="{{ url('/') }}" method="GET" >
        <button type="submit" class="correction-button-submit">修正</button>
    </form>
</div>


@endsection