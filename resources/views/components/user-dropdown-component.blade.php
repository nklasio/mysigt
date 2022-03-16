<div class="flex">
    @auth
        <a href="{{ route('devices') }}"
            class="inline-block px-4 py-2 mt-4 text-sm font-semibold leading-none text-gray-600 hover:text-gray-400 lg:mt-0">Devices</a>
        <div>
            <div x-data="{
                            open: false,
                            toggle() {
                                if(this.open) {
                                    return this.close()
                                }
                                this.open = true
                            },
                            close(focusAfter) {
                                if (!this.open) return
                                this.open = false
                                focusAfter && focusAfter.focus()
                            }
                        }" x-on:keydown.escape.prevent.stop="close($refs.button)"
                x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']">

                <a x-ref="button" x-on:click.prevent="toggle()"
                    class="inline-block px-4 py-2 mt-4 text-sm font-semibold leading-none text-gray-700 cursor-pointer hover:text-gray-600 lg:mt-0">{{ Auth::user()->name }}</a>

                <div x-ref="panel" x-show="open" x-on:click.outside="close($refs.button)" "
                                                            style=" display: none"
                    class="absolute float-right w-40 py-2 mt-2 bg-white border border-gray-200 rounded-lg shadow-xl">
                    <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-400 hover:text-white">Profile</a>
                    <a href="{{ route('devices') }}"
                        class="block px-4 py-2 text-gray-800 hover:bg-gray-400 hover:text-white">Devices</a>
                    @can('access dashboard')
                        <a href="{{ route('dashboard.home') }}"
                            class="block px-4 py-2 text-gray-800 border-t border-gray-200 hover:bg-gray-400 hover:text-white">Dashboard</a>
                    @endcan
                    <a href="{{ route('logout') }}"
                        class="block px-4 py-2 text-gray-800 border-t border-gray-200 hover:bg-gray-400 hover:text-white">Log
                        out</a>
                </div>
            </div>


        </div>
    @endauth
</div>
