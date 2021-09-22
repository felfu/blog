<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto">
            <form action="/sessions" method="post">
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                        Email
                    </label>
                    <input class="border border-gray-400 mb-6 p-2 w-full" type="email" name="email" id="email" required>
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
                        Password
                    </label>
                    <input class="border border-gray-400 mb-6 p-2 w-full" type="password" name="password" id="password" required>
                </div>
                <div class="mb-6">
                    <button class="bg-blue-400 text-white rounded hover:bg-blue-500 py-2 px-2" type="submit">
                        Log In
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
