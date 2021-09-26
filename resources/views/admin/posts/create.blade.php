<x-layout>
    <section class="px-6 py-8">
        <div class="mt-10">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
                <form method="POST" action="/admin/posts" class="lg:flex text-sm">
                    @csrf

                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <input id="title" name="title" type="text" placeholder="Title"
                               class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                    </div>

                   <div class="lg:py-3 lg:px-5 flex items-center">
                        <input id="slug" name="slug" type="text" placeholder="Slug"
                               class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                    </div>

                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <input id="excerpt" name="excerpt" type="text" placeholder="Excerpt"
                               class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                    </div>

                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <input id="body" name="body" type="text" placeholder="Body"
                               class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                    </div>

                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <label>
                            Category
                            <select name="category_id"
                                    class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                                @php
                                    $categories = \App\Models\Category::all();
                                @endphp

                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                                @endforeach

                            </select>
                        </label>
                    </div>



                    <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                    >
                        Post
                    </button>
                </form>
            </div>
        </div>
    </section>
</x-layout>
