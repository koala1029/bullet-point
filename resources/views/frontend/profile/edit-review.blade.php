@extends('frontend.layouts.app')
@section('title')
    マイポワント
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .star-rating {
            display: inline-block;
        }

        .star {
            display: inline-block;
            width: 25px;
            height: 25px;
            background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="%23ccc" d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>');
            background-size: contain;
            background-repeat: no-repeat;
        }

        .star.full {
            background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="%23ffd700" d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>');
        }

        .star.half {
            background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><defs><linearGradient id="half" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="50%" stop-color="%23ffd700"/><stop offset="50%" stop-color="%23ccc"/></linearGradient></defs><path fill="url(%23half)" d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>');
        }

        .rating-value {
            font-size: 14px;
            vertical-align: top;
            line-height: 25px;
            margin-left: 5px;
        }

        /* rating */
        .rating-css div {
            color: #ffe400;
            font-size: 15px;
            font-family: sans-serif;
            font-weight: 800;
            text-align: center;
            text-transform: uppercase;
            padding: 5px 0;
        }

        .rating-css input {
            display: none;
        }

        .rating-css input+label {
            font-size: 25px;
            text-shadow: 1px 1px 0 #8f8420;
            cursor: pointer;
        }

        .rating-css input:checked+label~label {
            color: #b4afaf;
        }

        .rating-css label:active {
            transform: scale(0.8);
            transition: 0.3s ease;
        }
    </style>
@endsection
@section('content')
    <section class="infor_setting">
        <div class="all_search">
            <div class="container">
                <div class="tabs">
                    <a  href="{{ route('profile.edit') }}" data-tab-target="#tab1Content" class="tab_rad tab1">プロフィール編集</a>
                    <a  href="{{ route('profile.edit-review')}}" class="tab_rad tab2 active">投稿一覧</a>
                    <a href="{{ route('profile.edit-favorite')}}" data-tab-target="#tab3Content" class="tab_rad1 tab3">お気に入り商品一覧</a>
                </div>
                <div id="tab2Content" data-tab-content class="active tab-content">
                    @if (count($product_reviews) > 0)
                        <div class="set_search_1">
                            @foreach ($product_reviews as $product_review)
                                <div class="my-review-item">
                                    <a href="{{ route('products.detail', $product_review->product_id) }}">
                                        <div class="setsearch_1 wow fadeInUp">
                                            <div class="setsearch_1_setmodal">
                                                <div class="user">
                                                    <div class="user_avatar">
                                                        <img src="/assets/img/user1.png" alt="" class="">
                                                    </div>
                                                    <div class="user_setting">
                                                        <div class="part_setting">
                                                            <div class="row1">
                                                                <p>ニックネーム : &nbsp;<span class="row1_des"></span></p>
                                                                <p><span
                                                                        class="row1_des">{{ $product_review->user->nickname . 'さん' }}</span>
                                                                </p>
                                                                <p>年齢 : &nbsp;<span
                                                                        class="row1_des">{{ $product_review->user->age }}</span>&nbsp;代
                                                                </p>
                                                            </div>
                                                            <div class="cols">
                                                                <div class="col1">
                                                                    <p>バレエ : &nbsp;<span
                                                                            class="col1_des">{{ $product_review->user->ballet_career }}年</span>
                                                                    </p>
                                                                    <p>足の形 : &nbsp;<span
                                                                            class="col1_des">{{ $product_review->user->foot_shape }}</span>
                                                                    </p>
                                                                </div>
                                                                <div class="col1">
                                                                    <p>レッスン頻度：&nbsp;<span class="col1_des">週&nbsp;2</span>回
                                                                    </p>
                                                                    <p>足幅 : &nbsp;<span
                                                                            class="col1_des">{{ $product_review->user->foot_width }}</span>
                                                                    </p>
                                                                </div>
                                                                <div class="col1">
                                                                    <p>足の大きさ : &nbsp;<span class="col1_des">24</span>(cm)
                                                                    </p>
                                                                    <p>甲の高さ : &nbsp;<span
                                                                            class="col1_des">{{ $product_review->user->foot_width }}</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="setting">
                                                    <div class="setting_des">
                                                        <div class="row1">
                                                            <div class="col1">
                                                                <p>メーカー名 : &nbsp;<span
                                                                        class="col1_des">{{ $product_review->product->maker->name }}</span>
                                                                </p>
                                                                <p>購入サイズ : &nbsp;<span
                                                                        class="col1_des">{{ $product_review->purchase_size }}</span>&nbsp;(cm)
                                                                </p>

                                                            </div>
                                                            <div class="col1">
                                                                <p>製品名 : &nbsp;<span
                                                                        class="col1_des">{{ $product_review->product->name }}</span>
                                                                </p>
                                                                <p>ワイズ : &nbsp;<span
                                                                        class="col1_des">{{ $product_review->purchase_width }}</span>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="row2">
                                                            <div class="row2_part">
                                                                <div class="star-rating-group">
                                                                    <p class="star-lavel">総合満足度: </p>
                                                                    @include('partials.star-rating', [
                                                                        'rating' =>
                                                                            $product_review->average_satisfaction,
                                                                    ])
                                                                </div>
                                                            </div>
                                                            <div class="row2_part">
                                                                <div class="star-rating-group">
                                                                    <p class="star-lavel">履き心: </p>
                                                                    @include('partials.star-rating', [
                                                                        'rating' => $product_review->comfort,
                                                                    ])
                                                                </div>
                                                                <div class="star-rating-group">
                                                                    <p class="star-lavel">音の静かさ: </p>
                                                                    @include('partials.star-rating', [
                                                                        'rating' => $product_review->quietness,
                                                                    ])
                                                                </div>
                                                            </div>
                                                            <div class="row2_part">
                                                                <div class="star-rating-group">
                                                                    <p class="star-lavel">軽 さ: </p>
                                                                    @include('partials.star-rating', [
                                                                        'rating' => $product_review->lightness,
                                                                    ])
                                                                </div>
                                                                <div class="star-rating-group">
                                                                    <p class="star-lavel">安定性: </p>
                                                                    @include('partials.star-rating', [
                                                                        'rating' => $product_review->stability,
                                                                    ])
                                                                </div>
                                                                <div class="star-rating-group">
                                                                    <p class="star-lavel">持ちの良さ: </p>
                                                                    @include('partials.star-rating', [
                                                                        'rating' => $product_review->longavity,
                                                                    ])
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="review">
                                                    <p class="review_quote">"</p>
                                                    <p class="review_quote1">"</p>
                                                    <p class="review__describe">{{ $product_review->content }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="setsearch_1_set_btn">
                                        <button type="submit" data-product_review_id="{{ $product_review->id }}" class="sub_btn review-modal-btn">修正する</button>
                                        <form action="{{ route('profile.review-delete', $product_review->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="sub_btn wow fadeInUp"
                                                onclick="return confirm('本当にこの記録を削除しますか？')">削除する
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- <div class="read_more wow fadeInUp">
                            <div class="btn">
                                <img src="./assets/img/arrow.png" alt="" class="btn_arrow_rotate">
                                <p class="btn__title">
                                    前へ戻る
                                </p>
                            </div>
                            <div class="btn">
                                <p class="btn__title">
                                    次へ進む
                                </p>
                                <img src="./assets/img/arrow.png" alt="">
                            </div>
                        </div> --}}
                    @else
                        <div class="alert empty-alert">表示するデータがありません。</div>
                    @endif
                </div>

            </div>
        </div>
    </section>

    <div id="updateReviewModal" class="modal-dialog">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <div class="modal_title">
                    <h1 class="modal_title_tlt" id="product_name"></h1>
                </div>
                <form id="updateReviewForm" action="{{ route('profile.update-review') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="product_review_id" value="">
                    <input type="hidden" name="product_id" value="">
                    <div class="tab_search">
                        <div class="tab_search_part1">
                            <div class="tab2_part1">
                                <p class="tlt_2">購入サイズ : &nbsp;&nbsp;</p>
                                <input type="text" class="in_2" id="purchase_size" name="purchase_size">
                                <p class="tlt_2">(cm)</p>
                            </div>
                            <div class="tab2_part1">
                                <p class="tlt_2">ワイズ : &nbsp;&nbsp;</p>
                                <input type="text" class="in_2" id="purchase_width" name="purchase_width">
                            </div>
                            <div class="tab2_part1">
                                <p class="tlt_2">シャンク : &nbsp;&nbsp;</p>
                                <input type="text" class="in_2" id="shank" name="shank">
                            </div>
                        </div>
                        <div class="tab_search_part2">
                            <div class="tab2_part2">
                                <p class="tlt_2">総合満足度 : &nbsp;&nbsp;</p>
                                <div class="rating-css">
                                    <div class="star-icon">
                                        <input type="radio" value="1" name="average_satisfaction" checked
                                            id="avg_rating1">
                                        <label for="avg_rating1" class="fa fa-star"></label>
                                        <input type="radio" value="2" name="average_satisfaction"
                                            id="avg_rating2">
                                        <label for="avg_rating2" class="fa fa-star"></label>
                                        <input type="radio" value="3" name="average_satisfaction"
                                            id="avg_rating3">
                                        <label for="avg_rating3" class="fa fa-star"></label>
                                        <input type="radio" value="4" name="average_satisfaction"
                                            id="avg_rating4">
                                        <label for="avg_rating4" class="fa fa-star"></label>
                                        <input type="radio" value="5" name="average_satisfaction"
                                            id="avg_rating5">
                                        <label for="avg_rating5" class="fa fa-star"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab_search_part2">
                        <div class="tab2_part2">
                            <p class="tlt_2">履き心: </p>
                            <div class="rating-css">
                                <div class="star-icon">
                                    <input type="radio" value="1" name="comfort" checked id="comfort_rating1">
                                    <label for="comfort_rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="comfort" id="comfort_rating2">
                                    <label for="comfort_rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="comfort" id="comfort_rating3">
                                    <label for="comfort_rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="comfort" id="comfort_rating4">
                                    <label for="comfort_rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="comfort" id="comfort_rating5">
                                    <label for="comfort_rating5" class="fa fa-star"></label>
                                </div>
                            </div>
                        </div>
                        <div class="tab2_part2">
                            <p class="tlt_2">音の静かさ: </p>
                            <div class="rating-css">
                                <div class="star-icon">
                                    <input type="radio" value="1" name="quietness" checked
                                        id="quietness_rating1">
                                    <label for="quietness_rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="quietness" id="quietness_rating2">
                                    <label for="quietness_rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="quietness" id="quietness_rating3">
                                    <label for="quietness_rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="quietness" id="quietness_rating4">
                                    <label for="quietness_rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="quietness" id="quietness_rating5">
                                    <label for="quietness_rating5" class="fa fa-star"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab_search_part2">
                        <div class="tab2_part2">
                            <p class="tlt_2">軽 さ : </p>
                            <div class="rating-css">
                                <div class="star-icon">
                                    <input type="radio" value="1" name="lightness" checked
                                        id="lightness_rating1">
                                    <label for="lightness_rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="lightness" id="lightness_rating2">
                                    <label for="lightness_rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="lightness" id="lightness_rating3">
                                    <label for="lightness_rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="lightness" id="lightness_rating4">
                                    <label for="lightness_rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="lightness" id="lightness_rating5">
                                    <label for="lightness_rating5" class="fa fa-star"></label>
                                </div>
                            </div>
                        </div>
                        <div class="tab2_part2">
                            <p class="tlt_2">安定性: </p>
                            <div class="rating-css">
                                <div class="star-icon">
                                    <input type="radio" value="1" name="stability" checked
                                        id="stability_rating1">
                                    <label for="stability_rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="stability" id="stability_rating2">
                                    <label for="stability_rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="stability" id="stability_rating3">
                                    <label for="stability_rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="stability" id="stability_rating4">
                                    <label for="stability_rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="stability" id="stability_rating5">
                                    <label for="stability_rating5" class="fa fa-star"></label>
                                </div>
                            </div>
                        </div>
                        <div class="tab2_part2">
                            <p class="tlt_2">持ちの良さ: </p>
                            <div class="rating-css">
                                <div class="star-icon">
                                    <input type="radio" value="1" name="longavity" checked
                                        id="longevity_rating1">
                                    <label for="longevity_rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="longavity" id="longevity_rating2">
                                    <label for="longevity_rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="longavity" id="longevity_rating3">
                                    <label for="longevity_rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="longavity" id="longevity_rating4">
                                    <label for="longevity_rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="longavity" id="longevity_rating5">
                                    <label for="longevity_rating5" class="fa fa-star"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab_search_part3">
                        <textarea name="review_text" id="" cols="30" rows="10" class="in_des"></textarea>
                    </div>
                    <button type="submit" class="btn">投 稿</button>
                </form>
            </div>
        </div>

    </div>
@endsection
@section('script')
<script>

    
    var updateReviewModal = document.getElementById("updateReviewModal");

    // When the user clicks the button, open the modal
    if (updateReviewModal) {
        const editButtons = document.querySelectorAll('.review-modal-btn');
    
        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const productReviewId = this.getAttribute('data-product_review_id');
                event.preventDefault(); // Prevent form submission if it's within a form
                
                $.ajax({
                    url: "{{ route('profile.get-review') }}",
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        product_review_id: productReviewId,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        // Populate the modal with the fetched review data
                        if(response.success == true){
                            const review = response.data;
                    
                            // Update form fields
                            document.getElementById('purchase_size').value = review.purchase_size;
                            document.getElementById('purchase_width').value = review.purchase_width;
                            document.getElementById('shank').value = review.shank;
                            
                            // Update radio buttons
                            document.querySelector(`input[name="average_satisfaction"][value="${review.average_satisfaction}"]`).checked = true;
                            document.querySelector(`input[name="comfort"][value="${review.comfort}"]`).checked = true;
                            document.querySelector(`input[name="quietness"][value="${review.quietness}"]`).checked = true;
                            document.querySelector(`input[name="lightness"][value="${review.lightness}"]`).checked = true;
                            document.querySelector(`input[name="stability"][value="${review.stability}"]`).checked = true;
                            document.querySelector(`input[name="longavity"][value="${review.longavity}"]`).checked = true;
                            
                            // Update textarea
                            document.querySelector('textarea[name="review_text"]').value = review.content;
                            document.querySelector(`input[type="hidden"][name="product_review_id"]`).value = review.id;
                            document.querySelector(`input[type="hidden"][name="product_id"]`).value = review.product_id;
                            
                            updateReviewModal.style.display = "block";
                        } else {
                            toastr.error(response.error);
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    }

    if (updateReviewModal) {
        var closeBtn = updateReviewModal.querySelector('.close');
        closeBtn.onclick = function () {
            updateReviewModal.style.display = "none";
        }
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == updateReviewModal) {
            updateReviewModal.style.display = "none";
        }
    }
</script>
@endsection