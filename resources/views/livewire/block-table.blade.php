<div id="block-list" class="w-full">
    <x-skeletons.blocks>
        <x-tables.desktop.blocks :blocks="$blocks" :sorting="$this->blocksOrderingDirection"/>

        <x-tables.mobile.blocks :blocks="$blocks" :sorting="$this->blocksOrderingDirection"/>

        <x-general.pagination :results="$blocks" class="mt-8" />

        <script>
            window.addEventListener('livewire:load', () => window.livewire.on('pageChanged', () => scrollToQuery('#block-list')));
        </script>
    </x-skeletons.blocks>
</div>
