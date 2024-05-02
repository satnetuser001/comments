<tr>
    <th>
        <div>
            Имя
        </div>
        <div>
            <div>
                <a
                    href="{{ route('home', ['sortField' => 'user_name', 'sortDirection' => 'asc']) }}"
                    @if($sortedBy['sortField'] == 'user_name' and $sortedBy['sortDirection'] == 'asc')
                        class="selectedSort"
                    @endif
                >
                    &#9650;
                </a>
            </div>
            <div>
                <a
                    href="{{ route('home', ['sortField' => 'user_name', 'sortDirection' => 'desc']) }}"
                    @if($sortedBy['sortField'] == 'user_name' and $sortedBy['sortDirection'] == 'desc')
                        class="selectedSort"
                    @endif
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
                    @if($sortedBy['sortField'] == 'email' and $sortedBy['sortDirection'] == 'asc')
                        class="selectedSort"
                    @endif
                >
                    &#9650;
                </a>
            </div>
            <div>
                <a
                    href="{{ route('home', ['sortField' => 'email', 'sortDirection' => 'desc']) }}"
                    @if($sortedBy['sortField'] == 'email' and $sortedBy['sortDirection'] == 'desc')
                        class="selectedSort"
                    @endif
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
                    @if($sortedBy['sortField'] == 'created_at' and $sortedBy['sortDirection'] == 'asc')
                        class="selectedSort"
                    @endif
                >
                    &#9650;
                </a>
            </div>
            <div>
                <a
                    href="{{ route('home', ['sortField' => 'created_at', 'sortDirection' => 'desc']) }}"
                    @if($sortedBy['sortField'] == 'created_at' and $sortedBy['sortDirection'] == 'desc')
                        class="selectedSort"
                    @endif
                >
                    &#9660;
                </a>
            </div>
        </div>
    </th>
</tr>