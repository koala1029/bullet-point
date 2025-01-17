@extends('admin.layouts.master')
@section('title')
ユーザー管理
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
        ユーザー管理
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">ユーザー管理</h5>
                    <div>
                        <a href="{{ route('admin.users.create') }}" id="addRow" class="btn btn-primary">ユーザー登録</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="project-datatable" class="table nowrap dt-responsive align-middle table-hover table-bordered"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID</th>
                                <th>ニックネーム</th>
                                <th>メールアドレス</th>
                                <th>性 別</th>
                                <th>年 齢</th>
                                <th>バレエ歴</th>
                                <th>バレエのレベル</th>
                                <th>足の形</th>
                                <th>足の大きさ</th>
                                <th>足 幅</th>
                                <th>甲の高さ</th>
                                <th>タイプ</th>
                                <th>登録日</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->nickname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td>{{ $user->age }}</td>
                                    <td>{{ $user->ballet_career }}</td>
                                    <td>{{ $user->ballet_level }}</td>
                                    <td>{{ $user->foot_shape }}</td>
                                    <td>{{ $user->foot_size }}</td>
                                    <td>{{ $user->foot_width }}</td>
                                    <td>{{ $user->foot_height }}</td>
                                    <td>{{ $user->type }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td class="text-center">
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="{{ route('admin.users.edit', $user->id) }}"
                                                        class="dropdown-item"><i
                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i> ショー</a>
                                                </li>
                                                <li><a href="{{ route('admin.users.edit', $user->id) }}"
                                                        class="dropdown-item edit-item-btn"><i
                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i> 編集</a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('admin.users.destroy', $user->id) }}"
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
            let table = new DataTable('#project-datatable', {
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
