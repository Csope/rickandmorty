<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css', 'resources/js/app.js', 'node_modules/flowbite/dist/flowbite.min.js',  'node_modules/flowbite/dist/datepicker.min.js'])
</head>
<body class='bg-slate-50'>
    <div class='container mx-auto'>
    <h1 class="text-center p-5 text-2xl">Rick & Morty episodes</h1>
    <div class="pb-4">
      @include('partials.filters')
       
    </div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">

@if (count($episodes) > 0)
    <table class="w-full bg-white text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                  <div class="flex items-center">  
                    ID
                    <a href="/sort-episodes/id"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                    </svg></a>
                </div>  
                </th>
                <th scope="col" class="px-6 py-3 ">
                <div class="flex items-center">    
                Name
                <a href="/sort-episodes/name"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                </svg></a>
                </div>  
                </th>
                <th scope="col" class="px-6 py-3">
                <div class="flex items-center">    
                Air Date
                <a href="/sort-episodes/air_date"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                </svg></a>
                </div>  
                </th>
                <th scope="col" class="px-6 py-3">
                <div class="flex items-center">    
                Episode
                <a href="/sort-episodes/episode"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                </svg></a>
                </div>  
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach ($episodes as $episode)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td class="px-6 py-4">{{ $episode->id }}</td>
                <td class="px-6 py-4 cursor-pointer" data-modal-target="{{ $episode->id }}-modal" data-modal-toggle="{{ $episode->id }}-modal">
                    {{ $episode->name }}
                    @include('partials.characters', ['id' => $episode->id, 'title' => $episode->name, 'characters' => $episode->characters])
                </td>
                <td class="px-6 py-4">{{ $episode->air_date }}</td>
                <td class="px-6 py-4">{{ $episode->episode }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <div class='text-center p-5 bg-white'>
      Not found any records!
    </div>
   
@endif
   
</div>
<div class='pt-4'>
     <!-- Pagination Links -->
    {{ $episodes->links() }}
</div>
   



</div>
</body>
</html>