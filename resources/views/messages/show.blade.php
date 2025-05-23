<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Chatty</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="w-full flex justify-center bg-amber-100">
        <div class="w-[400px]">
            <h1 class="text-2xl my-4"><a href="/">Chatty</a></h1>

            <div class="mb-4 bg-amber-300 p-4 rounded">
                <pre>{{ $message->content }}</pre>
            </div>


            <div class="ml-6">
                <hr class="mb-4">
                <ul class="flex flex-col gap-4 mb-4">
                    @foreach($message->children as $child)
                        <pre>{{ $child->content }}</pre>
                        <hr/>
                    @endforeach
                </ul>

                <form action="/messages" method="POST">
                    @csrf()
                    <input type="hidden" name="parent_id" value="{{$message->id}}" />
                    <textarea name="content"
                              rows="4"
                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                              placeholder="Reply here..."
                    ></textarea>

                    <button
                        class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-1 px-2 mt-2 rounded"
                        type="submit"
                    >Submit</button>
                </form>
            </div>
        </div>

    </body>
</html>
