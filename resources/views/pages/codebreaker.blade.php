<?php

use function Laravel\Folio\name;
use function Livewire\Volt\{state, with, mount, protect};

name('codebreaker');

state(['message']);

state(['key'])->locked();

mount(function (): void {
    $this->key = $this->generateKey();
});

$generateKey = protect(function () {
    return collect(range('A', 'Z'))
        ->shuffle()
        ->combine(range('A', 'Z'));
});

$regenerateKey = function () {
    $this->key = $this->generateKey();
};

$encrypt = function () {
    return collect(str_split(strtoupper($this->message)))->map(fn($letter) => $this->key[$letter] ?? $letter);
};

with(function () {
    return [
        'encryptedMessage' => $this->message ? $this->encrypt($this->message) : collect([]),
    ];
});

?>

<x-app-layout :navigation="false">
    @volt('codebreakers')
        <main>
            <div class="mx-auto max-w-xl px-4 py-3">
                <div class="space-y-4 px-4 py-3 text-center">
                    <h2 class="text-3xl">Codebreakers</h2>

                    <p class="text-sm">
                        A print and play game where you try to guess the secret
                        code.
                    </p>
                </div>

                <form>
                    <textarea
                        wire:model.live="message"
                        placeholder="Message"
                        class="w-full rounded border-none bg-black/30 px-4 py-3 font-mono text-green-600 shadow-md placeholder:text-green-900"
                        required
                        autofocus
                    ></textarea>
                </form>

                <div class="col-span-12 px-4 py-3">
                    @if ($encryptedMessage->isNotEmpty())
                        {{ $encryptedMessage->implode('') }}
                    @else
                        No message yet.
                    @endif
                </div>

                <div class="grid grid-cols-6 px-4 py-3">
                    @foreach ($key as $key => $value)
                        <div>
                            {{ $value }} => {{ $key }}
                        </div>
                    @endforeach
                </div>

                <div class="flex items-center justify-end">
                    <button
                        wire:click="regenerateKey"
                        wire:loading.attr="disabled"
                        class="relative mt-3 w-full items-center gap-2 rounded bg-gradient-to-b from-indigo-900 to-indigo-950 px-4 py-3 text-center text-sm text-indigo-100 shadow-md transition-all hover:border-white hover:bg-indigo-900 active:text-base"
                    >
                        Regenerate Key
                        <svg
                            wire:loading.delay
                            wire:target="regenerateKey"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="absolute right-4 h-6 w-6 animate-spin"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"
                            />
                        </svg>
                    </button>
                </div>

            </div>
        </main>
    @endvolt
</x-app-layout>
