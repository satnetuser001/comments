<tr class="tableHead">
    <th>
        <div>
            Имя
        </div>
        <div>
            <div>
                <a
                    href="{{ route('home', ['sortField' => 'user_name', 'sortDirection' => 'asc']) }}"
                    class="
                        sort
                        @if($sortedBy['sortField'] == 'user_name' and $sortedBy['sortDirection'] == 'asc')
                            selectedSort
                        @endif
                    "
                >
                    &#9650;
                </a>
            </div>
            <div>
                <a
                    href="{{ route('home', ['sortField' => 'user_name', 'sortDirection' => 'desc']) }}"
                    class="
                        sort
                        @if($sortedBy['sortField'] == 'user_name' and $sortedBy['sortDirection'] == 'desc')
                            selectedSort
                        @endif
                    "
                >
                    &#9660;
                </a>
            </div>
        </div>
    </th>
    <th>
        <div>
            Email
        </div>
        <div>
            <div>
                <a
                    href="{{ route('home', ['sortField' => 'email', 'sortDirection' => 'asc']) }}"
                    class="
                        sort
                        @if($sortedBy['sortField'] == 'email' and $sortedBy['sortDirection'] == 'asc')
                            selectedSort
                        @endif
                    "
                >
                    &#9650;
                </a>
            </div>
            <div>
                <a
                    href="{{ route('home', ['sortField' => 'email', 'sortDirection' => 'desc']) }}"
                    class="
                        sort
                        @if($sortedBy['sortField'] == 'email' and $sortedBy['sortDirection'] == 'desc')
                            selectedSort
                        @endif
                    "
                >
                    &#9660;
                </a>
            </div>
        </div>
    </th>
    <th>
        <div>
            Дата создания
        </div>
        <div>
            <div>
                <a
                    href="{{ route('home', ['sortField' => 'created_at', 'sortDirection' => 'asc']) }}"
                    class="
                        sort
                        @if($sortedBy['sortField'] == 'created_at' and $sortedBy['sortDirection'] == 'asc')
                            selectedSort
                        @endif
                    "
                >
                    &#9650;
                </a>
            </div>
            <div>
                <a
                    href="{{ route('home', ['sortField' => 'created_at', 'sortDirection' => 'desc']) }}"
                    class="
                        sort
                        @if($sortedBy['sortField'] == 'created_at' and $sortedBy['sortDirection'] == 'desc')
                            selectedSort
                        @endif
                    "
                >
                    &#9660;
                </a>
            </div>
        </div>
    </th>
</tr>