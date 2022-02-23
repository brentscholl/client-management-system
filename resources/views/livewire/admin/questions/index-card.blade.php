<section class="mt-8 xl:mt-10">
    <x-card :opened="$cardOpened">
        <x-card.header title="Questions" count="{{ optional($questions)->total() }}">
            @livewire('admin.questions.create', [
                'client' => $client,
                'setClient' => $setClient,
                'project' => $project,
                'setProject' => $setProject,
                'service' => $service,
                'setService' => $setService,
                'package' => $package,
                'setPackage' => $setPackage,
                'assign_type' => $assign_type], key('create-question'))
        </x-card.header>
        <x-card.body :cardOpened="$cardOpened">
            <div>
                @if($cardOpened)
                    @if($client)
                        <div class="pb-6 bg-white">
                            <div class="max-w-7xl mx-auto">
                                <div>
                                    <nav class="flex space-x-4" aria-label="Tabs">
                                        <button
                                            type="button"
                                            wire:click="filter('all')"
                                            @if($filter == 'all')
                                            class="bg-secondary-100 text-secondary-800 px-3 py-2 font-medium text-sm rounded-md focus:outline-none"
                                            @else
                                            class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md focus:outline-none"
                                            @endif
                                        >
                                            All
                                        </button>
                                        <button
                                            type="button"
                                            wire:click="filter('answered')"
                                            @if($filter == 'answered')
                                            class="bg-green-100 text-green-800 px-3 py-2 font-medium text-sm rounded-md focus:outline-none"
                                            @else
                                            class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md focus:outline-none"
                                            @endif
                                        >
                                            Answered
                                        </button>

                                        <button
                                            type="button"
                                            wire:click="filter('unanswered')"
                                            @if($filter == 'unanswered')
                                            class="bg-gray-100 text-gray-800 px-3 py-2 font-medium text-sm rounded-md focus:outline-none"
                                            @else
                                            class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md focus:outline-none"
                                            @endif
                                        >
                                            Unanswered
                                        </button>

                                        <button
                                            type="button"
                                            wire:click="filter('unique')"
                                            @if($filter == 'unique')
                                            class="bg-amber-100 text-amber-500 px-3 py-2 font-medium text-sm rounded-md focus:outline-none"
                                            @else
                                            class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md focus:outline-none"
                                            @endif
                                        >
                                            Unique to Client
                                        </button>
                                    </nav>
                                </div>

                            </div>
                        </div>
                    @endif
                    @if($questions->count() > 0)

                        <div class="grid grid-cols-1 gap-4">
                            @foreach($questions as $question)
                                @livewire('admin.questions.question-card', [
                                    'question' => $question,
                                    'showService' => true,
                                    'setService' => $setService,
                                    'setClient' => $setClient,
                                    'setProject' =>  $setProject,
                                    'setPackage' => $setPackage,
                                    'client_id' => $client ? $client->id : null
                                    ], key($question->id))
                            @endforeach
                        </div>
                            @if($questions->hasMorePages())
                                <div class="max-w-2xl mx-auto px-4 mb-4 mt-4">
                                    <div class="relative">
                                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                            <div class="w-full border-t border-gray-200"></div>
                                        </div>
                                        <div class="relative flex justify-center">
                                            <button wire:click="loadMore()"
                                                type="button"
                                                class="inline-flex items-center shadow-sm px-2 py-0.5 border border-gray-200 text-xs font-medium rounded-full text-gray-400 bg-white hover:bg-secondary-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary-500"
                                            >
                                                <svg class="-ml-1.5 mr-1 h-3 w-3 text-gray-400" x-description="Heroicon name: solid/plus-sm" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                                </svg>
                                                <span>Show More</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                    @else
                        <span class="relative block w-full border-2 border-gray-200 border-dashed rounded-lg p-12 text-center">
                            <x-svg.question class="mx-auto h-12 w-12 text-gray-200"/>
                            <span class="mt-2 block text-sm font-medium text-gray-300">
                              No questions assigned
                            </span>
                        </span>
                    @endif
                @else
                    <x-svg.spinner class="w-6 h-6 my-4 mx-auto text-secondary-500"/>
                @endif
            </div>

        </x-card.body>
    </x-card>
</section>
