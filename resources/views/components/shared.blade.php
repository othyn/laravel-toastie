<div>
    @if ($shouldBeDisplayed)
        <div x-data="{ toastie: true, countdownWidth: 100 }"
            @if ($shouldAutoDismiss) x-init="setTimeout(function() { countdownWidth = 0; }, 10);
        setTimeout(function() { toastie = false; }, {{ $autoDismissInMilliseconds }})" @endif
            class="fixed top-5 right-5">
            <div x-show="toastie" x-transition
                class="flex items-center justify-between max-w-xs bg-white border rounded-xl shadow-sm shadow-{{ $colour }}-600">
                <div class="flex flex-col @if ($shouldAutoDismiss) pt-4 pb-2 px-4 @else p-4 @endif">
                    <div class="flex items-center">
                        <span aria-label="{{ Str::lower($type->value) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-{{ $colour }}-600"
                                viewBox="0 0 20 20" fill="currentColor">
                                {!! $icon !!}
                            </svg>
                        </span>

                        <p class="ml-3 mr-5 text-sm font-bold text-{{ $colour }}-600">{{ $message }}</p>

                        <span @click="toastie = false;" class="inline-flex items-center cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </span>
                    </div>

                    @if ($shouldAutoDismiss)
                        <div class="bg-{{ $colour }}-400 block rounded h-1 text-center mt-3"
                            :style="`width: ${countdownWidth}%; transition: width {{ $autoDismissInSeconds }}s;`">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>
