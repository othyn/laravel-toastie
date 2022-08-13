<div>
    @if ($shouldBeDisplayed)
        <div x-data="{ toastie: true, countdownWidth: 100 }"
            @if ($shouldAutoDismiss) x-init="setTimeout(function() { countdownWidth = 0; }, 10);
        setTimeout(function() { toastie = false; }, {{ $autoDismissInMilliseconds }})" @endif
            class="fixed top-5 right-5">
            <div x-show="toastie" x-transition
                class="flex items-center justify-between max-w-xs bg-white border rounded-xl shadow-sm shadow-purple-600">
                <div class="flex flex-col @if ($shouldAutoDismiss) pt-4 pb-2 px-4 @else p-4 @endif">
                    <div class="flex items-center">
                        <span aria-label="info">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-purple-600" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>

                        <p class="ml-3 mr-5 text-sm font-bold text-purple-600">{{ $message }}</p>

                        <span @click="toastie = false;" class="inline-flex items-center cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </span>
                    </div>

                    @if ($shouldAutoDismiss)
                        <div class="bg-purple-400 block rounded h-1 text-center mt-3"
                            :style="`width: ${countdownWidth}%; transition: width {{ $autoDismissInSeconds }}s;`">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>
