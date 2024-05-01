<table>
    <thead>
        <tr>
            <th>
                <div>
                    Имя
                </div>
                <div>
                    <div><a href="{{ route('home', ['sortField' => 'user_name', 'sortDirection' => 'asc']) }}">&#9650;</a></div>
                    <div><a href="{{ route('home', ['sortField' => 'user_name', 'sortDirection' => 'desc']) }}">&#9660;</a></div>
                </div>
            </th>
            <th>
                <div>
                    Email
                </div>
                <div>
                    <div><a href="{{ route('home', ['sortField' => 'email', 'sortDirection' => 'asc']) }}">&#9650;</a></div>
                    <div><a href="{{ route('home', ['sortField' => 'email', 'sortDirection' => 'desc']) }}">&#9660;</a></div>
                </div>
            </th>
            <th>
                <div>
                    Дата создания
                </div>
                <div>
                    <div><a href="{{ route('home', ['sortField' => 'created_at', 'sortDirection' => 'asc']) }}">&#9650;</a></div>
                    <div><a href="{{ route('home', ['sortField' => 'created_at', 'sortDirection' => 'desc']) }}">&#9660;</a></div>
                </div>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($comments as $comment)
            <tr>
                <td colspan="3">
                    @include('includes.commentTuple', ['comment' => $comment])
                </td>
            </tr>
        @endforeach
    </tbody>
</table>