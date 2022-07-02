<div class="flex justify-end px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800" >
    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
    <nav aria-label="Table navigation">
        <ul class="inline-flex items-center">
        <li class="{{ $attributes['current']==1?'hidden':'' }}">
            <a class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-blue"
            aria-label="Previous" href="{{ URL::current().'?page='.strval($attributes['current']-1)}}">
            <svg
                aria-hidden="true"
                class="w-4 h-4 fill-current"
                viewBox="0 0 20 20"
            >
                <path
                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                clip-rule="evenodd"
                fill-rule="evenodd"
                ></path>
            </svg>
            </a>
        </li>
        <li class="{{ $attributes['current']==1?'hidden':'' }}">
            <a class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-blue">
            {{ $attributes['current']-1 }}
            </a>
        </li>
        <li>
            <button class="px-3 py-1 text-white transition-colors duration-150 bg-blue-600 border border-r-0 border-blue-600 rounded-md focus:outline-none focus:shadow-outline-blue" >
            {{ $attributes['current'] }}
            </button>
        </li>
        <li class="{{ $attributes['current']>=$attributes['total']?'hidden':'' }}">
            <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-blue" >
            {{ $attributes['current']+1 }}
            </button>
        </li>
        <li class="{{ $attributes['current']+1>=$attributes['total']?'hidden':'' }}">
            <span class="px-3 py-1">...</span>
        </li>
        <li class="{{ $attributes['current']+1>=$attributes['total']?'hidden':'' }}">
            <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-blue" >
            {{ $attributes['total'] }}
            </button>
        </li>
        <li class="{{ $attributes['current']>=$attributes['total']?'hidden':'' }}">
            <a href="{{ URL::current().'?page='.strval($attributes['current']+1) }}" class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-blue"
            aria-label="Next" >
            <svg
                class="w-4 h-4 fill-current"
                aria-hidden="true"
                viewBox="0 0 20 20"
            >
                <path
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"
                fill-rule="evenodd"
                ></path>
            </svg>
            </a>
        </li>
        </ul>
    </nav>
    </span>
</div>