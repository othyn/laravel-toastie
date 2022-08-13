<div>
    @if ($shouldBeDisplayed)
        <div x-data="{ toastie: true, countdownWidth: 100 }"
            @if ($shouldAutoDismiss) x-init="setTimeout(function() { countdownWidth = 0; }, 10);
        setTimeout(function() { toastie = false; }, {{ $autoDismissInMilliseconds }})" @endif
            class="fixed top-5 right-5">
            <div x-show="toastie" x-transition
                class="flex items-center justify-between max-w-xs bg-white border rounded-xl shadow-sm shadow-green-600">
                <div class="flex flex-col @if ($shouldAutoDismiss) pt-4 pb-2 px-4 @else p-4 @endif">
                    <div class="flex items-center">
                        <span aria-label="success">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-green-500" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>

                        <p class="ml-3 mr-5 text-sm font-bold text-green-600">{{ $message }}</p>

                        <span @click="toastie = false;" class="inline-flex items-center cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </span>
                    </div>

                    @if ($shouldAutoDismiss)
                        <div class="bg-green-400 block rounded h-1 text-center mt-3"
                            :style="`width: ${countdownWidth}%; transition: width {{ $autoDismissInSeconds }}s;`">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>
