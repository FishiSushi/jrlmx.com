<?php

use function Livewire\Volt\with;

$links = [['route' => 'landing', 'label' => 'Home'], ['route' => 'codebreaker', 'label' => 'Codebreaker']];

with(compact('links'));

?>

<div>
    <nav>
        @foreach ($links as $link)
            <a
                href="{{ route($link['route']) }}"
                @class([
                    'inline-block px-4 py-3',
                    'underline' => request()->routeIs($link['route']),
                ])
                wire:navigate
            >
                {{ $link['label'] }}
            </a>
        @endforeach
    </nav>
</div>
