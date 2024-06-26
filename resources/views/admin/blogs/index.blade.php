@extends('admin.layouts.master')
@section('title')
    ブログ管理
@endsection
@section('css')
    <!--datatable css-->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            管理者
        @endslot
        @slot('title')
            ブログ管理
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">ブログ</h5>
                    <div>
                        <a href="{{ route('admin.blogs.create') }}" id="addRow" class="btn btn-primary">商品登録</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="blog-datatable" class="table nowrap dt-responsive align-middle table-hover table-bordered"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID</th>
                                <th>ブログ</th>
                                <th>内容</th>
                                <th>投稿者</th>
                                <th>ステータス</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $index => $blog)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $blog->id }}</td>
                                    <td>
                                        <span>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-sm bg-light rounded p-1"><img
                                                            src="{{ URL::asset('images/blogs/' . $blog->image) }}"
                                                            alt="" class="img-fluid d-block"></div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="fs-14 mb-1"><a
                                                            href="{{ route('admin.blogs.edit', $blog->id) }}"
                                                            class="text-primary">{{ $blog->title }}</a></h5>
                                                </div>
                                            </div>
                                        </span>
                                    </td>
                                    <td>{{mb_strimwidth(strip_tags($blog->content), 0, 100, '...')}}</td>
                                    <td>{{ $blog->user->nickname }}</td>
                                    <td><span
                                            class="badge bg-{{ $blog->status == 1 ? 'success' : 'secondary' }}-subtle text-{{ $blog->status == 1 ? 'success' : 'secondary' }}"
                                            style="font-size: 12px">{{ $blog->status == 1 ? '現時' : '非県市' }}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="{{ route('admin.blogs.show', $blog->id) }}"
                                                        class="dropdown-item"><i
                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i> ショー</a>
                                                </li>
                                                <li><a href="{{ route('admin.blogs.edit', $blog->id) }}"
                                                        class="dropdown-item edit-item-btn"><i
                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i> 編集</a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('admin.blogs.destroy', $blog->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item remove-item-btn"
                                                            onclick="return confirm('本当にこの記録を削除しますか？')">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                            削除
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let table = new DataTable('#blog-datatable', {
                "pagingType": "full_numbers",
                language: {
                    processing: "処理中...",
                    lengthMenu: "_MENU_ 件表示",
                    zeroRecords: "記録は見つかりませんでした",
                    info: "_TOTAL_ 件中 _START_ から _END_ まで表示",
                    infoEmpty: "0 件中 0 から 0 まで表示",
                    infoFiltered: "(全 _MAX_ 件より抽出)",
                    search: "検索:",
                    paginate: {
                        first: "先頭",
                        previous: "前",
                        next: "次",
                        last: "最終"
                    }
                }
            });
        });
    </script>
@endsection