@props([
    'title' => 'title',
    'content' => 'content',
    'subcontent' => 'subcontent',
    'icon' => ' <svg class="w-12 h-12 text-gray-300" xmlns="http://www.w3.org/2000/svg" width="200"
                                height="200" viewBox="0 0 2048 2048">
                                <path fill="#d6d6d6"
                                    d="" />
                            </svg>',
    'foot' => 'foot',
    'colorSub' => 'text-blue-500 bg-blue-100',
    'colorFoot' => 'text-blue-500 bg-blue-100',
])
<div class="flex flex-col shadow p-5 bg-white rounded-md">
    <div class="flex items-center  justify-between">
        <div>
            <h6 class="text-md font-medium leading-loose tracking-wider text-gray-600 uppercase ">
                {{ $title }}
            </h6>
            <span class="text-xl font-semibold">
                {{ $content }}
            </span>
            <span class="inline-block px-2 py-px ml-2 text-md {{ $colorSub }} rounded-md">
                {{ $subcontent }}
            </span>
        </div>

        <div>
            <span>
                <svg class="w-12 h-12 text-gray-300" xmlns="http://www.w3.org/2000/svg" width="200" height="200"
                    viewBox="0 0 2048 2048">
                    {{ $icon }}
                </svg>
            </span>
        </div>
    </div>
    <span class="text-xs inline-block mt-3 px-1 py-1 {{ $colorFoot }} rounded-md">
        {{ $foot }}
    </span>
</div>
