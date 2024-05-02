<table>
    <thead>
        @include('includes.commentsTableHead', ['sortedBy' => $sortedBy])
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