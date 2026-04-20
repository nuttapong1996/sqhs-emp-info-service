<x-app-layout title="หน้าหลัก">
    <div class="flex flex-col">
        <h3 class="text-2xl mt-3">ยอดสถิติวันลาประจำปี {{ now()->format('Y') }}</h3>
        <div class="grid grid-cols-1 gap-8 p-3 mt-3 lg:grid-cols-2 xl:grid-cols-4">

            <!-- ลาพักร้อนปัจจุบัน -->
            <div class="flex flex-col shadow p-5 bg-white rounded-md">
                <div class="flex items-center  justify-between">
                    <div>
                        <h6 class="text-md font-medium leading-loose tracking-wider text-gray-600 uppercase ">
                            ลาพักร้อนปี {{ now()->format('Y') }}
                        </h6>
                        <span class="text-xl font-semibold">{{ $sumleave->cur_vacation }} วัน</span>
                        <span class="inline-block px-2 py-px ml-2 text-md text-green-500 bg-green-100 rounded-md">
                            เหลือ {{ $sumleave->remain_cur_vacation }} วัน
                        </span>
                    </div>

                    <div>
                        <span>
                            <svg class="w-12 h-12 text-gray-300" xmlns="http://www.w3.org/2000/svg" width="200"
                                height="200" viewBox="0 0 2048 2048">
                                <path fill="#d6d6d6"
                                    d="M1728 1664q26 0 45 19t19 45q0 26-19 45t-45 19H960q-26 0-45-19t-19-45q0-26 19-45t45-19h768zm-128 256q26 0 45 19t19 45q0 26-19 45t-45 19h-512q-26 0-45-19t-19-45q0-26 19-45t45-19h512zm238-512h210v128H537q-10 64-14 128t-7 127t-3 128t-1 129H128v-193q0-81 6-160t17-159H0v-128h172q50-245 151-471t250-427q-146-5-268-61T82 289l-45-46l47-44q104-97 228-147T579 1q156 0 286 58t239 168q77 2 149 24t134 60t113 90t87 115t57 135t20 150v64h-64q-132 0-247-56t-199-159q-76 138-191 227t-269 125q-43 99-76 200t-57 206h289q22-84 69-154t112-122t146-79t167-29q87 0 167 28t145 80t113 121t69 155zM1238 380q-6 65-26 132q51 88 134 146t185 74q-10-61-35-115t-63-101t-88-80t-107-56zm-126 7q-102 8-192 50T759 547T642 704t-61 189q85-7 161-36t139-78t112-112t81-144q14-33 23-67t15-69zM224 247q80 66 177 101t201 35q97 0 187-30t168-88q-80-66-177-101t-201-35q-97 0-187 30t-168 88zm318 775q-8 2-16 2t-16 0h-32q-16 0-32-2v-47q-53 118-89 232t-59 230t-32 235t-10 248h128q0-121 8-234t27-223t49-219t74-222zm442 386h720q-20-57-56-104t-83-81t-104-52t-117-19q-61 0-117 18t-103 52t-84 81t-56 105z" />
                            </svg>
                        </span>
                    </div>
                </div>
                <span class="text-xs inline-block mt-3 px-1 py-1 text-red-500 bg-red-100 rounded-md">ใช้ได้ถึง กุมภาพันธ์ปี {{ now()->format('Y') + 1 }}</span>
            </div>

            <!-- ลาพักร้อนปัจจุบัน -->
            <div class="flex flex-col shadow p-5 bg-white rounded-md">
                <div class="flex items-center  justify-between">
                    <div>
                        <h6 class="text-md font-medium leading-loose tracking-wider text-gray-600 uppercase ">
                            ลาพักร้อนปี {{ now()->format('Y') -1 }}
                        </h6>
                        <span class="text-xl font-semibold">{{ $sumleave->prev_vecation_usage }} วัน</span>
                        <span class="inline-block px-2 py-px ml-2 text-md text-green-500 bg-green-100 rounded-md">
                            เหลือ {{ $sumleave->prev_vecation_remain }} วัน
                        </span>
                    </div>

                    <div>
                        <span>
                            <svg class="w-12 h-12 text-gray-300" xmlns="http://www.w3.org/2000/svg" width="200"
                                height="200" viewBox="0 0 2048 2048">
                                <path fill="#d6d6d6"
                                    d="M1728 1664q26 0 45 19t19 45q0 26-19 45t-45 19H960q-26 0-45-19t-19-45q0-26 19-45t45-19h768zm-128 256q26 0 45 19t19 45q0 26-19 45t-45 19h-512q-26 0-45-19t-19-45q0-26 19-45t45-19h512zm238-512h210v128H537q-10 64-14 128t-7 127t-3 128t-1 129H128v-193q0-81 6-160t17-159H0v-128h172q50-245 151-471t250-427q-146-5-268-61T82 289l-45-46l47-44q104-97 228-147T579 1q156 0 286 58t239 168q77 2 149 24t134 60t113 90t87 115t57 135t20 150v64h-64q-132 0-247-56t-199-159q-76 138-191 227t-269 125q-43 99-76 200t-57 206h289q22-84 69-154t112-122t146-79t167-29q87 0 167 28t145 80t113 121t69 155zM1238 380q-6 65-26 132q51 88 134 146t185 74q-10-61-35-115t-63-101t-88-80t-107-56zm-126 7q-102 8-192 50T759 547T642 704t-61 189q85-7 161-36t139-78t112-112t81-144q14-33 23-67t15-69zM224 247q80 66 177 101t201 35q97 0 187-30t168-88q-80-66-177-101t-201-35q-97 0-187 30t-168 88zm318 775q-8 2-16 2t-16 0h-32q-16 0-32-2v-47q-53 118-89 232t-59 230t-32 235t-10 248h128q0-121 8-234t27-223t49-219t74-222zm442 386h720q-20-57-56-104t-83-81t-104-52t-117-19q-61 0-117 18t-103 52t-84 81t-56 105z" />
                            </svg>
                        </span>
                    </div>
                </div>
                <span class="text-xs inline-block mt-3 px-1 py-1 text-red-500 bg-red-100 rounded-md">ใช้ได้ถึง เมษายนปี {{ now()->format('Y') }}</span>
            </div>




            {{-- <!-- Orders card -->
            <div class="flex items-center shadow justify-between p-4 bg-white rounded-md">
                <div>
                    <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase">
                        Orders
                    </h6>
                    <span class="text-xl font-semibold">45,021</span>
                    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                        +3.1%
                    </span>
                </div>
                <div>
                    <span>
                        <svg class="w-12 h-12 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </span>
                </div>
            </div>

            <!-- Tickets card -->
            <div class="flex items-center shadow justify-between p-4 bg-white rounded-md">
                <div>
                    <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase">
                        Tickets
                    </h6>
                    <span class="text-xl font-semibold">20,516</span>
                    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                        +3.1%
                    </span>
                </div>
                <div>
                    <span>
                        <svg class="w-12 h-12 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z">
                            </path>
                        </svg>
                    </span>
                </div> --}}
        </div>
    </div>
    </div>
</x-app-layout>
