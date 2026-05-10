<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生成绩</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            gap: 10px;
        }
        .search-box input {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 250px;
            font-size: 14px;
        }
        .search-box input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.2s;
        }
        .btn-primary {
            background: #667eea;
            color: white;
        }
        .btn-primary:hover {
            background: #5568d3;
        }
        .btn-danger {
            background: #ef4444;
            color: white;
        }
        .btn-danger:hover {
            background: #dc2626;
        }
        .btn-secondary {
            background: #6b7280;
            color: white;
        }
        .btn-secondary:hover {
            background: #4b5563;
        }
        .btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        .btn-sm {
            padding: 6px 12px;
            font-size: 13px;
            margin-right: 5px;
        }
        .sort-buttons {
            display: flex;
            gap: 8px;
            align-items: center;
        }
        .sort-label {
            font-size: 14px;
            color: #666;
            margin-right: 5px;
        }
        .sort-select {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            background: white;
            min-width: 100px;
        }
        .sort-select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed;
        }
        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            vertical-align: middle;
        }
        th:nth-child(1), td:nth-child(1) {
            width: 30%;
            text-align: left;
        }
        th:nth-child(2), td:nth-child(2) {
            width: 35%;
        }
        th:nth-child(3), td:nth-child(3) {
            width: 35%;
        }
        th {
            background: #667eea;
            color: white;
            font-weight: 600;
        }
        tr:hover {
            background: #f5f5f5;
        }
        .score {
            font-weight: bold;
            color: #667eea;
            font-size: 16px;
        }
        .pagination {
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-top: 20px;
            align-items: center;
        }
        .pagination a, .pagination span {
            padding: 8px 12px;
            text-decoration: none;
            color: #667eea;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: all 0.2s;
        }
        .pagination a:hover {
            background: #667eea;
            color: white;
        }
        .pagination .active {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }
        .pagination .disabled {
            color: #999;
            cursor: not-allowed;
        }
        .pagination .disabled:hover {
            background: white;
            color: #999;
        }

        /* Modal 样式 */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }
        .modal.active {
            display: flex;
        }
        .modal-content {
            background: white;
            padding: 25px;
            border-radius: 12px;
            width: 400px;
            max-width: 90%;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        .modal-header {
            margin-bottom: 20px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-size: 14px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
        }
        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        .form-group input:disabled {
            background: #f3f4f6;
            color: #999;
        }
        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        /* 成功提示 */
        .success-message {
            background: #d1fae5;
            color: #065f46;
            padding: 10px 15px;
            border-radius: 6px;
            margin-bottom: 15px;
            text-align: center;
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📊 zhwang's 学生成绩表</h1>

        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <div class="header-actions">
            <div style="display: flex; gap: 15px; align-items: center; flex: 1;">
                <div class="search-box">
                    <form action="/scores" method="GET" id="searchForm">
                        <input type="text" name="keyword" placeholder="输入姓名搜索..." value="{{ $keyword ?? '' }}">
                        <input type="hidden" name="sort_by" value="{{ $sortBy ?? 'name' }}">
                        <input type="hidden" name="sort_order" value="{{ $sortOrder ?? 'asc' }}">
                    </form>
                </div>
                <div class="sort-buttons">
                    <span class="sort-label">排序：</span>
                    <select class="sort-select" id="sortBySelect" onchange="updateSort()">
                        <option value="name,asc" {{ ($sortBy ?? 'name') == 'name' && ($sortOrder ?? 'asc') == 'asc' ? 'selected' : '' }}>姓名升序</option>
                        <option value="name,desc" {{ ($sortBy ?? 'name') == 'name' && ($sortOrder ?? 'asc') == 'desc' ? 'selected' : '' }}>姓名降序</option>
                        <option value="score,asc" {{ ($sortBy ?? 'name') == 'score' && ($sortOrder ?? 'asc') == 'asc' ? 'selected' : '' }}>成绩升序</option>
                        <option value="score,desc" {{ ($sortBy ?? 'name') == 'score' && ($sortOrder ?? 'asc') == 'desc' ? 'selected' : '' }}>成绩降序</option>
                    </select>
                </div>
            </div>
            <button class="btn btn-primary" onclick="openAddModal()">+ 添加</button>
        </div>

        <table>
            <thead>
                <tr>
                    <th style="cursor: pointer;" onclick="toggleSort('name')">
                        姓名
                        @if(($sortBy ?? 'name') == 'name')
                            <span>{{ $sortOrder == 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </th>
                    <th style="cursor: pointer;" onclick="toggleSort('score')">
                        成绩
                        @if(($sortBy ?? 'name') == 'score')
                            <span>{{ $sortOrder == 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @forelse($scores as $score)
                    <tr>
                        <td>{{ $score->name }}</td>
                        <td class="score">{{ $score->score }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm"
                                data-id="{{ $score->id }}"
                                data-name="{{ e($score->name) }}"
                                data-score="{{ $score->score }}"
                                onclick="openEditModal(this)">编辑</button>
                            <button class="btn btn-danger btn-sm"
                                data-id="{{ $score->id }}"
                                data-name="{{ e($score->name) }}"
                                onclick="openDeleteModal(this)">删除</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">
                            <div class="empty-state">
                                暂无数据
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if($scores->hasPages())
            <div class="pagination">
                {{-- 上一页 --}}
                @if($scores->onFirstPage())
                    <span class="disabled">上一页</span>
                @else
                    <a href="{{ $scores->appends(['keyword' => $keyword ?? '', 'sort_by' => $sortBy ?? 'name', 'sort_order' => $sortOrder ?? 'asc'])->previousPageUrl() }}">上一页</a>
                @endif

                {{-- 页码 --}}
                @if($scores->lastPage() <= 7)
                    {{-- 总页数少，全部显示 --}}
                    @for($i = 1; $i <= $scores->lastPage(); $i++)
                        @if($i == $scores->currentPage())
                            <span class="active">{{ $i }}</span>
                        @else
                            <a href="{{ $scores->appends(['keyword' => $keyword ?? '', 'sort_by' => $sortBy ?? 'name', 'sort_order' => $sortOrder ?? 'asc'])->url($i) }}">{{ $i }}</a>
                        @endif
                    @endfor
                @else
                    {{-- 总页数多，显示首页、当前页附近、末页，中间用省略号 --}}
                    {{-- 首页 --}}
                    @if($scores->currentPage() == 1)
                        <span class="active">1</span>
                    @else
                        <a href="{{ $scores->appends(['keyword' => $keyword ?? '', 'sort_by' => $sortBy ?? 'name', 'sort_order' => $sortOrder ?? 'asc'])->url(1) }}">1</a>
                    @endif

                    {{-- 前面的省略号 --}}
                    @if($scores->currentPage() > 3)
                        <span>...</span>
                    @endif

                    {{-- 当前页附近的页码 --}}
                    @for($i = max(2, $scores->currentPage() - 1); $i <= min($scores->lastPage() - 1, $scores->currentPage() + 1); $i++)
                        @if($i == $scores->currentPage())
                            <span class="active">{{ $i }}</span>
                        @else
                            <a href="{{ $scores->appends(['keyword' => $keyword ?? '', 'sort_by' => $sortBy ?? 'name', 'sort_order' => $sortOrder ?? 'asc'])->url($i) }}">{{ $i }}</a>
                        @endif
                    @endfor

                    {{-- 后面的省略号 --}}
                    @if($scores->currentPage() < $scores->lastPage() - 2)
                        <span>...</span>
                    @endif

                    {{-- 末页 --}}
                    @if($scores->currentPage() == $scores->lastPage())
                        <span class="active">{{ $scores->lastPage() }}</span>
                    @else
                        <a href="{{ $scores->appends(['keyword' => $keyword ?? '', 'sort_by' => $sortBy ?? 'name', 'sort_order' => $sortOrder ?? 'asc'])->url($scores->lastPage()) }}">{{ $scores->lastPage() }}</a>
                    @endif
                @endif

                {{-- 下一页 --}}
                @if($scores->hasMorePages())
                    <a href="{{ $scores->appends(['keyword' => $keyword ?? '', 'sort_by' => $sortBy ?? 'name', 'sort_order' => $sortOrder ?? 'asc'])->nextPageUrl() }}">下一页</a>
                @else
                    <span class="disabled">下一页</span>
                @endif
            </div>

            <p style="text-align: center; color: #666; margin-top: 10px;">
                共 {{ $scores->total() }} 条记录，第 {{ $scores->currentPage() }} / {{ $scores->lastPage() }} 页
            </p>
        @else
            @if($scores->count() > 0)
                <p style="text-align: center; color: #666; margin-top: 20px;">
                    共 {{ $scores->count() }} 条记录
                </p>
            @endif
        @endif
    </div>

    {{-- 添加 Modal --}}
    <div id="addModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">添加学生成绩</div>
            <form action="/scores" method="POST">
                @csrf
                <div class="form-group">
                    <label>姓名</label>
                    <input type="text" id="addName" name="name" oninput="checkAddForm()">
                </div>
                <div class="form-group">
                    <label>成绩</label>
                    <input type="number" id="addScore" name="score" oninput="checkAddForm()">
                </div>
                <div class="modal-actions">
                    <button type="button" class="btn btn-secondary" onclick="closeAddModal()">取消</button>
                    <button type="submit" class="btn btn-primary" id="addSubmitBtn" disabled>确定</button>
                </div>
            </form>
        </div>
    </div>

    {{-- 编辑 Modal --}}
    <div id="editModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">编辑学生成绩</div>
            <form action="/scores/{{ $editId ?? '' }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>姓名</label>
                    <input type="text" id="editName" name="name" value="{{ $editName ?? '' }}" disabled>
                </div>
                <div class="form-group">
                    <label>成绩</label>
                    <input type="number" id="editScore" name="score" value="{{ $editScore ?? '' }}" oninput="checkEditForm()">
                </div>
                <div class="modal-actions">
                    <button type="button" class="btn btn-secondary" onclick="closeEditModal()">取消</button>
                    <button type="submit" class="btn btn-primary" id="editSubmitBtn">确定</button>
                </div>
            </form>
        </div>
    </div>

    {{-- 删除确认 Modal --}}
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">确认删除</div>
            <p style="color: #666; margin-bottom: 20px;">确定要删除学生 <strong id="deleteStudentName"></strong> 的成绩吗？</p>
            <form id="deleteForm" action="" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-actions">
                    <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">取消</button>
                    <button type="submit" class="btn btn-danger">确定</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // 获取当前 URL 参数
        function getUrlParams() {
            const params = new URLSearchParams(window.location.search);
            return {
                keyword: params.get('keyword') || '',
                sort_by: params.get('sort_by') || 'name',
                sort_order: params.get('sort_order') || 'asc'
            };
        }

        // 更新 URL 并跳转
        function updateUrl(params) {
            const url = new URL(window.location);
            Object.keys(params).forEach(key => {
                if (params[key]) {
                    url.searchParams.set(key, params[key]);
                } else {
                    url.searchParams.delete(key);
                }
            });
            window.location.href = url.toString();
        }

        // 更新排序（下拉列表）
        function updateSort() {
            const select = document.getElementById('sortBySelect');
            const value = select.value;
            const [sortBy, sortOrder] = value.split(',');
            const params = getUrlParams();
            params.sort_by = sortBy;
            params.sort_order = sortOrder;
            updateUrl(params);
        }

        // 点击表头切换排序
        function toggleSort(field) {
            const params = getUrlParams();
            if (params.sort_by === field) {
                params.sort_order = params.sort_order === 'asc' ? 'desc' : 'asc';
            } else {
                params.sort_by = field;
                params.sort_order = 'asc';
            }
            updateUrl(params);
        }

        // 添加 Modal
        function openAddModal() {
            document.getElementById('addModal').classList.add('active');
            document.getElementById('addName').value = '';
            document.getElementById('addScore').value = '';
            document.getElementById('addSubmitBtn').disabled = true;
            setTimeout(() => document.getElementById('addName').focus(), 100);
        }

        function closeAddModal() {
            document.getElementById('addModal').classList.remove('active');
        }

        function checkAddForm() {
            const name = document.getElementById('addName').value.trim();
            const score = document.getElementById('addScore').value.trim();
            document.getElementById('addSubmitBtn').disabled = !name || !score;
        }

        // 编辑 Modal
        function openEditModal(button) {
            const id = button.dataset.id;
            const name = button.dataset.name;
            const score = button.dataset.score;

            document.getElementById('editModal').classList.add('active');
            document.getElementById('editName').value = name;
            document.getElementById('editScore').value = score;
            document.querySelector('#editModal form').action = '/scores/' + id;
            setTimeout(() => document.getElementById('editScore').focus(), 100);
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.remove('active');
        }

        function checkEditForm() {
            const score = document.getElementById('editScore').value.trim();
            document.getElementById('editSubmitBtn').disabled = !score;
        }

        // 删除 Modal
        function openDeleteModal(button) {
            const id = button.dataset.id;
            const name = button.dataset.name;

            document.getElementById('deleteStudentName').textContent = name;
            document.getElementById('deleteForm').action = '/scores/' + id;
            document.getElementById('deleteModal').classList.add('active');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('active');
        }

        // 点击 Modal 外部关闭
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.remove('active');
                }
            });
        });

        // ESC 键关闭 Modal
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                document.querySelectorAll('.modal').forEach(modal => {
                    modal.classList.remove('active');
                });
            }
        });
    </script>
</body>
</html>
