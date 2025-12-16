<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-6 space-y-6">

        <!-- Kopējie kopsavilkumi (Total) -->
        @if($totals)
            <div class="bg-white rounded shadow p-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4  flex flex-row-reverse">
                <div>
                    <div class="text-xs text-gray-500">Vehicles</div>
                    <div class="text-xl font-bold">{{ $totals['vehicles'] ?? '-' }}</div>
                </div>
                <div>
                    <div class="text-xs text-gray-500">Parties</div>
                    <div class="text-xl font-bold">{{ $totals['parties'] ?? '-' }}</div>
                </div>
                <div>
                    <div class="text-xs text-gray-500">Users</div>
                    <div class="text-xl font-bold">{{ $totals['users'] ?? '-' }}</div>
                </div>
                <div>
                    <div class="text-xs text-gray-500">Cases</div>
                    <div class="text-xl font-bold">{{ $totals['cases'] ?? '-' }}</div>
                </div>
                <div>
                    <div class="text-xs text-gray-500">Inspections</div>
                    <div class="text-xl font-bold">{{ $totals['inspections'] ?? '-' }}</div>
                </div>
                <div>
                    <div class="text-xs text-gray-500">Documents</div>
                    <div class="text-xl font-bold">{{ $totals['documents'] ?? '-' }}</div>
                </div>
            </div>
        @endif

        <!-- Filtri -->
        <div class="bg-white rounded shadow p-4 flex flex-wrap gap-4 items-end">
            <form method="GET" class="flex flex-wrap gap-4 items-end">
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Vehicle</label>
                    <select name="vehicle" class="border px-2 py-1 rounded">
                        <option value="">All vehicles</option>
                        @foreach($vehicles as $v)
                            <option value="{{ $v['id'] }}"
                                @if(request('vehicle') === $v['id']) selected @endif>
                                {{ $v['plate_no'] }} – {{ $v['make'] }} {{ $v['model'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs text-gray-500 mb-1">User</label>
                    <select name="user" class="border px-2 py-1 rounded">
                        <option value="">All users</option>
                        @foreach($users as $u)
                            <option value="{{ $u['id'] }}"
                                @if(request('user') === $u['id']) selected @endif>
                                {{ $u['full_name'] ?? $u['username'] }}
                                ({{ $u['role'] ?? '-' }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs text-gray-500 mb-1">Case</label>
                    <select name="case" class="border px-2 py-1 rounded">
                        <option value="">All cases</option>
                        @foreach($cases as $c)
                            <option value="{{ $c['id'] }}"
                                @if(request('case') === $c['id']) selected @endif>
                                {{ $c['id'] }} ({{ $c['status'] ?? 'unknown' }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="text-pink bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center leading-5">
                    Apply filters
                </button>
            </form>
        </div>

        <!-- Vehicles tabula -->
        <div class="bg-white rounded shadow p-4">
            <h2 class="text-lg font-bold mb-3">Vehicles</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="border-b bg-gray-50">
                            <th class="text-left px-2 py-1">ID</th>
                            <th class="text-left px-2 py-1">Plate No</th>
                            <th class="text-left px-2 py-1">Country</th>
                            <th class="text-left px-2 py-1">Make</th>
                            <th class="text-left px-2 py-1">Model</th>
                            <th class="text-left px-2 py-1">VIN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vehicles as $v)
                            @if(!$selectedVehicleId || $selectedVehicleId === $v['id'])
                                <tr class="border-b">
                                    <td class="px-2 py-1">{{ $v['id'] }}</td>
                                    <td class="px-2 py-1">{{ $v['plate_no'] }}</td>
                                    <td class="px-2 py-1">{{ $v['country'] }}</td>
                                    <td class="px-2 py-1">{{ $v['make'] }}</td>
                                    <td class="px-2 py-1">{{ $v['model'] }}</td>
                                    <td class="px-2 py-1">{{ $v['vin'] }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Users tabula -->
        <div class="bg-white rounded shadow p-4">
            <h2 class="text-lg font-bold mb-3">Users</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="border-b bg-gray-50">
                            <th class="text-left px-2 py-1">ID</th>
                            <th class="text-left px-2 py-1">Username</th>
                            <th class="text-left px-2 py-1">Full name</th>
                            <th class="text-left px-2 py-1">Role</th>
                            <th class="text-left px-2 py-1">Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $u)
                            @if(!$selectedUserId || $selectedUserId === $u['id'])
                                <tr class="border-b">
                                    <td class="px-2 py-1">{{ $u['id'] }}</td>
                                    <td class="px-2 py-1">{{ $u['username'] }}</td>
                                    <td class="px-2 py-1">{{ $u['full_name'] }}</td>
                                    <td class="px-2 py-1">{{ $u['role'] }}</td>
                                    <td class="px-2 py-1">
                                        {{ isset($u['active']) && $u['active'] ? 'Yes' : 'No' }}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Inspections tabula -->
        <div class="bg-white rounded shadow p-4">
            <h2 class="text-lg font-bold mb-3">Inspections</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="border-b bg-gray-50">
                            <th class="text-left px-2 py-1">ID</th>
                            <th class="text-left px-2 py-1">Case ID</th>
                            <th class="text-left px-2 py-1">Type</th>
                            <th class="text-left px-2 py-1">Requested by</th>
                            <th class="text-left px-2 py-1">Start TS</th>
                            <th class="text-left px-2 py-1">Location</th>
                            <th class="text-left px-2 py-1">Checks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inspections as $i)
                            @if(!$selectedCaseId || $selectedCaseId === $i['case_id'])
                                <tr class="border-b">
                                    <td class="px-2 py-1">{{ $i['id'] }}</td>
                                    <td class="px-2 py-1">{{ $i['case_id'] }}</td>
                                    <td class="px-2 py-1">{{ $i['type'] }}</td>
                                    <td class="px-2 py-1">{{ $i['requested_by'] }}</td>
                                    <td class="px-2 py-1">{{ $i['start_ts'] }}</td>
                                    <td class="px-2 py-1">{{ $i['location'] }}</td>
                                    <td class="px-2 py-1">
                                        @if(!empty($i['checks']))
                                            @foreach($i['checks'] as $check)
                                                <div>
                                                    {{ $check['name'] }} – {{ $check['result'] }}
                                                </div>
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Documents tabula -->
        <div class="bg-white rounded shadow p-4">
            <h2 class="text-lg font-bold mb-3">Documents</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="border-b bg-gray-50">
                            <th class="text-left px-2 py-1">ID</th>
                            <th class="text-left px-2 py-1">Case ID</th>
                            <th class="text-left px-2 py-1">Filename</th>
                            <th class="text-left px-2 py-1">MIME</th>
                            <th class="text-left px-2 py-1">Category</th>
                            <th class="text-left px-2 py-1">Pages</th>
                            <th class="text-left px-2 py-1">Uploaded by</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($documents as $d)
                            <tr class="border-b">
                                <td class="px-2 py-1">{{ $d['id'] }}</td>
                                <td class="px-2 py-1">{{ $d['case_id'] }}</td>
                                <td class="px-2 py-1">{{ $d['filename'] }}</td>
                                <td class="px-2 py-1">{{ $d['mime_type'] }}</td>
                                <td class="px-2 py-1">{{ $d['category'] ?? '' }}</td>
                                <td class="px-2 py-1">{{ $d['pages'] ?? '' }}</td>
                                <td class="px-2 py-1">{{ $d['uploaded_by'] ?? '' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Parties tabula -->
        <div class="bg-white rounded shadow p-4">
            <h2 class="text-lg font-bold mb-3">Parties</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="border-b bg-gray-50">
                            <th class="text-left px-2 py-1">ID</th>
                            <th class="text-left px-2 py-1">Type</th>
                            <th class="text-left px-2 py-1">Name</th>
                            <th class="text-left px-2 py-1">Reg code</th>
                            <th class="text-left px-2 py-1">VAT</th>
                            <th class="text-left px-2 py-1">Country</th>
                            <th class="text-left px-2 py-1">Email</th>
                            <th class="text-left px-2 py-1">Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($parties as $p)
                            <tr class="border-b">
                                <td class="px-2 py-1">{{ $p['id'] }}</td>
                                <td class="px-2 py-1">{{ $p['type'] }}</td>
                                <td class="px-2 py-1">{{ $p['name'] }}</td>
                                <td class="px-2 py-1">{{ $p['reg_code'] ?? '' }}</td>
                                <td class="px-2 py-1">{{ $p['vat'] ?? '' }}</td>
                                <td class="px-2 py-1">{{ $p['country'] }}</td>
                                <td class="px-2 py-1">{{ $p['email'] ?? '' }}</td>
                                <td class="px-2 py-1">{{ $p['phone'] ?? '' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>
