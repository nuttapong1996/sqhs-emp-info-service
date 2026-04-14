<x-app-layout title="โปรไฟล์">
    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-6 sm:items-center">

        <dt class="flex justify-center ">
            <img src="{{ route('emp.photo') }}?v={{ session()->getId() }}"
                class="object-scale-down size-40 sm:size-48 rounded-full ring-2 ring-gray-500/10 shadow-md"
                alt="รูปพนักงาน">
        </dt>

        <dd class="sm:col-span-2 mt-6 sm:mt-0 text-center sm:text-left">
            <h3 class="text-lg/7 font-bold text-gray-900">{{ $emp->name_thai_emp }}</h3>
            <p class="mt-1 text-sm/6 text-gray-500">{{ $emp->name_eng_emp }}</p>
        </dd>

    </div>
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

            {{-- <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm/6 font-medium text-gray-900">เลขประกันสังคม</dt>
                    <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $emp->social_security_number }}</dd>
                </div> --}}

            {{-- <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm/6 font-medium text-gray-900">Attachments</dt>
                    <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                            <li class="flex items-center justify-between py-4 pr-5 pl-4 text-sm/6">
                                <div class="flex w-0 flex-1 items-center">
                                    <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true"
                                        class="size-5 shrink-0 text-gray-400">
                                        <path
                                            d="M15.621 4.379a3 3 0 0 0-4.242 0l-7 7a3 3 0 0 0 4.241 4.243h.001l.497-.5a.75.75 0 0 1 1.064 1.057l-.498.501-.002.002a4.5 4.5 0 0 1-6.364-6.364l7-7a4.5 4.5 0 0 1 6.368 6.36l-3.455 3.553A2.625 2.625 0 1 1 9.52 9.52l3.45-3.451a.75.75 0 1 1 1.061 1.06l-3.45 3.451a1.125 1.125 0 0 0 1.587 1.595l3.454-3.553a3 3 0 0 0 0-4.242Z"
                                            clip-rule="evenodd" fill-rule="evenodd" />
                                    </svg>
                                    <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                        <span
                                            class="truncate font-medium text-gray-900">resume_back_end_developer.pdf</span>
                                        <span class="shrink-0 text-gray-400">2.4mb</span>
                                    </div>
                                </div>
                                <div class="ml-4 shrink-0">
                                    <a href="#"
                                        class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                </div>
                            </li>
                            <li class="flex items-center justify-between py-4 pr-5 pl-4 text-sm/6">
                                <div class="flex w-0 flex-1 items-center">
                                    <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true"
                                        class="size-5 shrink-0 text-gray-400">
                                        <path
                                            d="M15.621 4.379a3 3 0 0 0-4.242 0l-7 7a3 3 0 0 0 4.241 4.243h.001l.497-.5a.75.75 0 0 1 1.064 1.057l-.498.501-.002.002a4.5 4.5 0 0 1-6.364-6.364l7-7a4.5 4.5 0 0 1 6.368 6.36l-3.455 3.553A2.625 2.625 0 1 1 9.52 9.52l3.45-3.451a.75.75 0 1 1 1.061 1.06l-3.45 3.451a1.125 1.125 0 0 0 1.587 1.595l3.454-3.553a3 3 0 0 0 0-4.242Z"
                                            clip-rule="evenodd" fill-rule="evenodd" />
                                    </svg>
                                    <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                        <span
                                            class="truncate font-medium text-gray-900">coverletter_back_end_developer.pdf</span>
                                        <span class="shrink-0 text-gray-400">4.5mb</span>
                                    </div>
                                </div>
                                <div class="ml-4 shrink-0">
                                    <a href="#"
                                        class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                </div>
                            </li>
                        </ul>
                    </dd>
                </div> 
                --}}

        </dl>
    </div>
    </div>

</x-app-layout>
