<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Simple top summary --}}
            <div class="mb-6">
                <h1 class="text-2xl font-bold mb-2">Dashboard Summary</h1>
                <p>Total Books: {{ $bookCount }}</p>
                <p>Total Users: {{ $userCount }}</p>
            </div>

            {{-- Stats Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900">Total Number of Books</h3>
                    <p class="mt-2 text-2xl">{{ $bookCount }}</p>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900">Registered Users</h3>
                    <p class="mt-2 text-2xl">{{ $userCount }}</p>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900">Total Staff</h3>
                    <p class="mt-2 text-2xl">{{ $staffCount }}</p>
                </div>
            </div>

            {{-- Staff List --}}
            <div class="mt-8">
                <h3 class="text-xl font-bold mb-2">Staff List:</h3>
                <ul class="list-disc pl-6">
                    @forelse ($staffList as $staff)
                        <li>{{ $staff->name }} - {{ $staff->position }}</li>
                    @empty
                        <li>No staff found.</li>
                    @endforelse
                </ul>
            </div>

            {{-- User List --}}
            <div class="mt-8">
                <h3 class="text-xl font-bold mb-2">User List:</h3>
                <ul class="list-disc pl-6">
                    @foreach ($users as $user)
                        <li>{{ $user->name }}</li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>
