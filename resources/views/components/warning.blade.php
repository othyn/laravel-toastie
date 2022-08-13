<div>
    @if ($shouldBeDisplayed)
        <div x-data="{ toastie: true, countdownWidth: 100 }"
            @if ($shouldAutoDismiss) x-init="setTimeout(function() { countdownWidth = 0; }, 10);
        setTimeout(function() { toastie = false; }, {{ $autoDismissInMilliseconds }})" @endif
            class="fixed top-5 right-5">
            <div x-show="toastie" x-transition
                class="flex items-center justify-between max-w-xs bg-white border rounded-xl shadow-sm shadow-yellow-600">
                <div class="flex flex-col @if ($shouldAutoDismiss) pt-4 pb-2 px-4 @else p-4 @endif">
                    <div class="flex items-center">
                        <span aria-label="warning">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-yellow-600" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>

                        <p class="ml-3 mr-5 text-sm font-bold text-yellow-600">{{ $message }}</p>

                        <span @click="toastie = false;" class="inline-flex items-center cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </span>
                    </div>

                    @if ($shouldAutoDismiss)
                        <div class="bg-yellow-400 block rounded h-1 text-center mt-3"
                            :style="`width: ${countdownWidth}%; transition: width {{ $autoDismissInSeconds }}s;`">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>
