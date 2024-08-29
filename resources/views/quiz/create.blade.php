<x-nav>
    <form method="POST" action="quiz">
        @csrf
        <div class="space-y-12 bg-gray-900 rounded-md p-2 text-lg ">
            <h2>
                write your chapter, question and correlated answer here.
            </h2>

            <div class="">
                <input type="text" name="chapter" id="chapter" autocomplete="chapter"
                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                    placeholder="chapter">
            </div>

            <div class="">
                <input type="text" name="question" id="question" autocomplete="question"
                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                    placeholder="question">

            </div>

            <div class="">
                <input type="text" name="answer" id="answer" autocomplete="answer"
                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                    placeholder="answer">
            </div>

            <input type="hidden" name="_token" value="{{crsf_token()}}" />


            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/"><button type="button"
                        class="text-sm font-semibold leading-6 text-gray-900 text-white">Cancel</button></a>
                <a href="/"><button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </a>
            </div>
        </div>
        </div>
    </form>
</x-nav>