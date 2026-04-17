<x-app-layout title="โปรไฟล์">
    {{-- รูปภาพและชื่อ --}}
    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-6 sm:items-center">

        <dt class="flex justify-center  ">
            <img src="{{ route('emp.photo') }}?v={{ session()->getId() }}"
                class="object-scale-down size-40 sm:size-48 rounded-full ring-2 ring-gray-500/10 shadow-md"
                alt="รูปพนักงาน">
        </dt>

        <dd class="sm:col-span-2 mt-6 sm:mt-0 text-center sm:text-left">
            <h3 class="text-lg/7 font-bold text-gray-900">{{ $emp->name_thai_emp }}</h3>
            <p class="mt-1 text-sm/6 text-gray-500">{{ $emp->name_eng_emp }}</p>
        </dd>

    </div>

    {{-- รายละเอียด --}}
    <div class="mt-3 border-t border-gray-100">
        <dl class="divide-y divide-gray-100">
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-900">รหัสพนักงาน</dt>
                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $emp->code_emp }}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-900">แผนก/ฝ่าย</dt>
                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $dept->name_deptemp }}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-900">ตำแหน่ง</dt>
                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $emp->position_emp }}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-900">โครงการ</dt>
                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $worksite->name_work_project }}
                </dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-900">สัญชาติ</dt>
                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $nation->name_nationality }}</dd>
            </div>
        </dl>
    </div>
</x-app-layout>
