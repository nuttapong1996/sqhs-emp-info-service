@props([
    'title' => '',
])
<div class="flex items-center justify-between py-4">
    @if ($title !== '')
        <h2 class="text-xl font-bold text-gray-800">
            {{ $title }} {{$selectedYear ?: date('Y') }}
        </h2>
    @endif

    <div class="flex items-center space-x-2">
        <label class="text-sm font-medium">เลือกปี:</label>
        <select wire:model.live="selectedYear" class="form-select w-32 rounded-md border-gray-300">
            <option value="{{ date('Y') }}">{{ date('Y') }}</option>
            <option value="{{ date('Y') - 1 }}">{{ date('Y') - 1 }}</option>
        </select>
    </div>

</div>


<div wire:loading.flex 
     class="fixed inset-0 z-[9999] flex items-center justify-center bg-gray-900/20 backdrop-blur-sm pointer-events-none">
     
    <div class="flex items-center gap-3 px-6 py-4 bg-white rounded-xl shadow-2xl border border-gray-100">
        <div class="w-6 h-6 border-4 border-gray-200 border-t-blue-600 rounded-full animate-spin"></div>
        <span class="font-medium text-gray-700">กำลังอัปเดตข้อมูล...</span>
    </div>

</div>
