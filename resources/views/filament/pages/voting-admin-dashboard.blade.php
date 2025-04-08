<x-filament-panels::page>
    
<x-filament::page>
    <!-- <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1> -->

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- System Management Widget -->
        <!-- <div class="p-4 bg-white rounded shadow"> -->
            <!-- <h2 class="font-semibold">System Management</h2>
            <p>Overview of system status and key metrics.</p> -->
            <!-- Display system stats here -->
        <!-- </div> -->

        <!-- Create Contests -->
        <div class="p-4 bg-white rounded shadow">
            <h2 class="font-semibold">Contests</h2>
            <p>Create and manage contests.</p>
            <x-filament::button tag="a" href="{{ \App\Filament\Resources\ContestResource\Pages\CreateContest::getUrl() }}">
                Create Contest
            </x-filament::button>
        </div>

        <!-- Onboard Users -->
        <div class="p-4 bg-white rounded shadow">
            <h2 class="font-semibold">User Onboarding</h2>
            <p>Add or import new users.</p>
            <x-filament::button tag="a" href="{{ \App\Filament\Resources\UserResource\Pages\CreateUser::getUrl() }}">
                Onboard User
            </x-filament::button>
        </div>
    </div>
</x-filament::page>


</x-filament-panels::page>
