<x-app-layout title="ใบขับขี่" pagetitle="ใบขับขี่">
    <div class="px-4 py-6 w-full">
        <table class="table-auto w-full border border-gray-300">
            <thead>
                <tr>
                    <th class="px-2 py-2 border border-gray-300">ประเภทใบขับขี่</th>
                    <th class="px-2 py-2 border border-gray-300">วันที่ออกบัตร</th>
                    <th class="px-2 py-2 border border-gray-300">สิ้นสุด</th>
                    <th class="px-2 py-2 border border-gray-300">สถานะ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activeLicenses as $License)
                    <tr>
                        <td class="px-2 py-2 border border-gray-300">{{ $License['license_name'] }}</td>
                        <td class="px-2 py-2 border border-gray-300">{{ date('d M Y' ,strtotime($License['issue_date']))}}</td>
                        <td class="px-2 py-2 border border-gray-300">{{  date('d M Y' ,strtotime($License['expiry_date']))}}</td>
                        <td class="px-2 py-2 border border-gray-300 text-center">
                         @if ($License['status'] === 'T')
                             <div class="text-green-600 font-bold">Valid</div>
                         @else
                            <div class="text-red-500 font-bold">Invalid</div>
                         @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
