@extends('frontend.layouts.app')
@section('title')
    マイポワント
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .news_ttl {
            text-align: center;
            color: #ff9293;
            font-size: 25px;
            font-weight: 600;
        }
    </style>
@endsection
@section('content')
    <section class="news_all">
        <div class="container_news">
            <div class="title">
                <h1 class="title_tlt">お知らせ</h1>
                <p class="title_subtlt">- News -</p>
            </div>
            <div class="news_data">
                @if (count($notifications) > 0)
                    @foreach ($notifications as $notification)
                        <a href="{{ route('detail-notification', $notification->id) }}" class="data">
                            <span class="data__date">{{ $notification->created_at->format('Y年 n月 j日') }}</span>
                            <span class="data__des">{{ $notification->title }}</span>
                        </a>
                    @endforeach
                @else
                    <div class="alert empty-alert">表示するデータがありません。</div>
                @endif
            </div>
        </div>

    </section>
@endsection
@section('script')
@endsection
