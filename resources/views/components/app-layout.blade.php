@props([
    'title' => 'title',
])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @googlefonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title }}</title>
</head>

<body>
    <div class="min-h-full">
        {{-- <nav class="bg-gray-800 dark:bg-gray-800/50"> --}}
        <nav class="bg-blue-950 dark:bg-gray-800/50">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    {{-- Dekstop Menu --}}
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <img src="{{ asset('imgs/logo1.svg') }}"alt="Your Company" class="size-8" />
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <!-- Current: "bg-gray-900 dark:bg-gray-950/50 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
                                <a href="{{ route('home') }}" aria-current="page"
                                    class="rounded-md bg-orange-500 px-3 py-2 text-sm font-medium text-white dark:bg-gray-950/50">หน้าหลัก</a>
                                <a href="#"
                                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">สถิติการลาย้อนหลัง</a>
                                <a href="#"
                                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">ใบขับขี่</a>
                            </div>
                        </div>
                    </div>

                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <!-- Profile dropdown -->
                            <el-dropdown class="relative ml-3">
                                <button
                                    class="relative flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-500">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">Open user menu</span>
                                    <img src="{{ route('emp.photo') }}?v={{ session()->getId() }}" alt="รูปพนักงาน"
                                        class="size-10 object-cover rounded-full outline -outline-offset-1 outline-white/10" />
                                    <div class="ml-3">
                                        <div class="text-base/5 font-medium text-white text-left">
                                            คุณ{{ Auth::user()->name_thai_emp }}</div>
                                        <div class="text-sm font-medium text-gray-400">{{ Auth::user()->name_eng_emp }}
                                        </div>
                                    </div>
                                </button>

                                <el-menu anchor="bottom end" popover
                                    class="w-48 origin-top-right rounded-md bg-white py-1 shadow-lg outline-1 outline-black/5 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in dark:bg-gray-800 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10">
                                    <a href="{{ route('profile') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden dark:text-gray-300 dark:focus:bg-white/5">โปรไฟล์</a>
                                    <a href="{{ route('logout') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden dark:text-gray-300 dark:focus:bg-white/5">ออกจากระบบ</a>
                                </el-menu>
                            </el-dropdown>
                        </div>
                    </div>
                    {{-- Mobile Menu --}}
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button" command="--toggle" commandfor="mobile-menu"
                            class="relative inline-flex items-center justify-center rounded-md p-2 text-orange-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-orange-500">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                data-slot="icon" aria-hidden="true" class="size-6 in-aria-expanded:hidden">
                                <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                data-slot="icon" aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
                                <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <el-disclosure id="mobile-menu" hidden class="block md:hidden">
                <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                    <a href="{{ route('home') }}" aria-current="page"
                        class="block rounded-md bg-orange-500 px-3 py-2 text-base font-medium text-white dark:bg-gray-950/50">หน้าหลัก</a>
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">สถิติการลาย้อนหลัง</a>
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">ใบขับขี่</a>
                </div>
                <div class="border-t border-white/10 pt-4 pb-3">
                    <div class="flex items-center px-5">
                        <div class="shrink-0">
                            <img src="{{ route('emp.photo') }}?v={{ session()->getId() }}" alt="รูปพนักงาน"
                                class="size-10 object-cover rounded-full outline -outline-offset-1 outline-white/10" />
                        </div>
                        <div class="ml-3">
                            <div class="text-base/5 font-medium text-white">คุณ{{ Auth::user()->name_thai_emp }}</div>
                            <div class="text-sm font-medium text-gray-400">{{ Auth::user()->name_eng_emp }}</div>
                        </div>
                        {{-- <button type="button"
                            class="relative ml-auto shrink-0 rounded-full p-1 text-gray-400 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">View notifications</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                data-slot="icon" aria-hidden="true" class="size-6">
                                <path
                                    d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button> --}}
                    </div>
                    <div class="mt-3 space-y-1 px-2">
                        <a href="{{ route('profile') }}"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">โปรไฟล์</a>
                        <a href="{{ route('logout') }}"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">ออกจากระบบ</a>
                    </div>
                </div>
            </el-disclosure>
        </nav>
        {{-- Contents --}}
        <header
            class="relative bg-white shadow-sm dark:bg-gray-800 dark:shadow-none dark:after:pointer-events-none dark:after:absolute dark:after:inset-x-0 dark:after:inset-y-0 dark:after:border-y dark:after:border-white/10">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $title }}</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>
