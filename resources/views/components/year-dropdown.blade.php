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
