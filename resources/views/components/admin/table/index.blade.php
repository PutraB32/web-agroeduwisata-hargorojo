<div class="admin-table-scroll bg-white rounded-lg shadow border border-gray-200">
    <table {{ $attributes->merge(['class' => 'admin-data-table min-w-full leading-normal']) }}>
        @if(isset($header))
        <thead>
            <tr>
                {{ $header }}
            </tr>
        </thead>
        @endif
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>
