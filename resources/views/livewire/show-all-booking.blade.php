<div class="bg-white rounded-lg">
    <div class="flex items-center justify-between relative">
        <div class="flex">
            @if ($this->weekIsGreaterThanCurrent)
            <button type="button" class="p-4" wire:click="decrementCalendarWeek">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300 hover:text-gray-700" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            @endif
            <div class="text-lg font-semibold p-4">
                {{ $this->calendarStartDate->format('l') }}
            </div>
        </div>


        <div class="text-lg font-semibold p-4">
            {{ $this->calendarStartDate->format('d F ') }}
        </div>

        <div class="flex">
            <div class="text-lg font-semibold p-4">
                {{ $this->calendarStartDate->format('Y') }}
            </div>
            <button type="button" class="p-4" wire:click="incrementCalendarWeek">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300 hover:text-gray-700" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>


    <div class="grid grid-cols-7 gap-0 px-3 pb-2">
        @foreach ($this->calendarWeekInterval as $day)
        <div
            class="child p-2 hover:bg-gray-200 cusor-pointer focus:outline-none bg-white flex-1 h-32 lg:h-40 border border-gray-200 -mt-px -ml-px">

            <div class="text-sm leading-none mb-2 text-gray-700">
                {{ $day->format('g:i A') }}
            </div>

            <div class="p-2 my-2 flex-1 overflow-y-auto">
                <div class="bg-white rounded-lg border py-2 px-3 shadow-md cursor-pointer">
                    <p class="text-sm font-medium">
                        tiltle of the appointment
                    </p>
                    <p class="mt-2 text-xs">
                        duration
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>


</div>