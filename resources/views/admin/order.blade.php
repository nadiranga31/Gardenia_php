
<x-app-layout>
</x-app-layout>


<!DOCTYPE html>
<html lang="en">

  <head>
    @include("admin.admincss")
  </head>

  <body>
    <div class="container-scroller">

    @include("admin.navbar")

    <div class="container">

        <form action="{{ url('/search') }}" method="get">
            @csrf
    <input type="text" name="search" class="text-black">
    <input type="submit" value="Search" class="btn btn-success">

</form>

    <div class=" w-full overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
    <table class="w-full  bg-white text-left text-sm text-gray-500">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>

            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Phone</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Address</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Foodname</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Price</th>

            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Quantity</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Total Price</th>


          </tr>
        </thead>


@foreach ( $data as $data )


        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
          <tr class="hover:bg-gray-50">
            <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">

              <div class="text-sm">
                <div class="font-medium text-gray-700">{{ $data->name }}</div>

              </div>
            </th>


            <td class="px-6 py-4">{{ $data->phone }}</td>
            <td class="px-6 py-4">{{ $data->address }}</td>
            <td class="px-6 py-4">{{ $data->foodname }}</td>
            <td class="px-6 py-4">Rs: {{ $data->price }}</td>
            <td class="px-6 py-4">{{ $data->quantity }}</td>
            <td class="px-6 py-4">Rs: {{ $data->price * $data->quantity }}</td>




          </tr>

        </tbody>
        @endforeach

      </table>
    </div>
    </div>
</div>




    @include('admin.adminscript')

  </body>

</html>



