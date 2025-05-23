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
            <h1 class="text-2xl my-4">Chatty</h1>

            <ul class="flex flex-col gap-2 mb-4">
                @foreach($messages as $message)
                    <div class="flex justify-between">
                        <pre class="whitespace-pre-wrap">{{ $message->content }}</pre>
                        <a
                            class="text-blue-800 hover:underline"
                            href="{{route('messages.show', $message)}}">Reply</a>
                    </div>
                    <hr/>
                @endforeach
            </ul>

            <form action="/messages" method="POST">
                @csrf()
                <textarea
                    name="content"
                    rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Start a conversation"
                ></textarea>

                <button
                    class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-1 px-2 mt-2 rounded"
                    type="submit"
                >Submit</button>
            </form>
        </div>

    </body>
</html>
