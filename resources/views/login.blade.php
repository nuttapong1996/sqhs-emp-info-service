<!DOCTYPE html>
<html class="h-full" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @PwaHead
    @googlefonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ config('app.name') }}</title>
</head>

<body class="bg-blue-50 h-full">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img src="{{ asset('imgs/logo.svg') }}" alt="Logo Company" class="mx-auto h-25 w-auto" />
            <h2 class="text-center text-3xl/loose font-bold tracking-tight text-gray-900 mt-5">Employee Info Service
            </h2>
            <h4 class="text-center text-2xl/loose">ระบบบริการข้อมูลพนักงาน</h4>
            <h6 class="text-center text-sm/loose">SAHAKOL EQUIPMENT PCL. (Hongsa)</h6>
        </div>

        <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
            <form action="{{ route('check-emp') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
                    <label for="empcode" class="block text-sm/6 font-medium text-gray-900">รหัสพนักงาน:</label>
                    <div class="mt-1">
                        <input id="empcode" type="text" name="empcode" autocomplete="off" maxlength="20"
                            oninput="this.value = this.value.toUpperCase()" placeholder="กรุณากรอกรหัสพนักงาน"
                            class="block h-10 w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-700 focus:outline-2 focus:-outline-offset-2 focus:outline-orange-500 sm:text-sm/6" />
                    </div>

                    <label for="empbday" class="block text-sm/6 font-medium text-gray-900 mt-3">วันเดือนปีเกิด:</label>
                    <div class="mt-1">
                        <div x-data x-init="flatpickr($refs.Birthdate, {
                            dateFormat: 'Y-m-d', // บังคับรูปแบบเป็น ค.ศ.
                            allowInput: true
                        })">
                            <input x-ref="Birthdate" wire:model="birth_date" placeholder="YYYY-MM-DD" wire:model
                                id="empbday" type="text" name="empbday" autocomplete="off" maxlength="20"
                                oninput="this.value = this.value.toUpperCase()" placeholder="กรุณากรอกรหัสพนักงาน"
                                class="block h-10 w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-700 focus:outline-2 focus:-outline-offset-2 focus:outline-orange-500 sm:text-sm/6" />
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md  bg-blue-950 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-blue-900 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-500">
                        ตกลง
                    </button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm/6 text-gray-400">
                พัฒนาโดย แผนกสารสนเทศ บมจ.สหกลอิควิปเมนท์ (แม่เมาะ)
            </p>
        </div>
    </div>
    @livewireScripts
    @RegisterServiceWorkerScript
</body>

</html>
