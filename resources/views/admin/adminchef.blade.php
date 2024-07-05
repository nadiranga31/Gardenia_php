
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


<div class="max-w-lg lg:ms-auto mx-auto text-center pt-3 pl-9 ">
    <div class="py-16 px-7 rounded-md bg-white">

        <form action=" {{ url('/uploadchef') }}" method="post" enctype="multipart/form-data" >

            @csrf

            <div class="grid md:grid-cols-2 grid-cols-1 gap-6">
                <div class="md:col-span-2">
                    <label  class="text-black">name</label>
                <input type="text" name="name"  placeholder="chef's name" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700 text-black" required>
              </div>

              <div class="md:col-span-2">
                <textarea name="speciality" rows="5" cols="" placeholder="Add a speciality " class="text-black w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700"  required></textarea>
              </div>


             <div class="md:col-span-2">
                <label  class="float-left block  font-normal text-gray-400 text-lg">Add a Chef's Image :</label>
                <input type="file"  name="image" class=" text-black peer block w-full appearance-none border-none   bg-transparent py-2.5 px-0 text-sm  focus:border-blue-600 focus:outline-none focus:ring-0">
            </div>


              <div class="md:col-span-2">
                <button class="py-3 text-base font-medium rounded text-white bg-blue-800 w-full hover:bg-blue-700 transition duration-300">Add</button>
              </div>
            </div>
          </form>

        </div>
    </div>

          <div class=" w-auto overflow-hidden rounded-lg border border-gray-200 shadow-md m-5 ">
            <table class="w-auto  bg-white text-left text-sm text-gray-500">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">chef Name</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">speciality</th>

                    <th scope="col" class="px-6 py-4 font-medium text-gray-900 " >Image</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Update</th>

                  </tr>
                </thead>


                @foreach ($data as $data )


                <tbody align="center" class="w-auto divide-y divide-gray-100 border-t border-gray-100">
                  <tr class="hover:bg-gray-50 w-auto ">
                    <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                        <div class="text-gray-400">{{ $data->name }}</div>
                    </th>

                    <td > <div class="text-gray-400">{{ $data->speciality }}</div></td>


                    <td class="px-9 py-4 w-56">
                         <img class="" src="/chefimage/{{ $data->image }}" >
                        </td>



                    <td class="px-6 py-4">
                      <div class="flex justify-end gap-4">
                        <a x-data="{ tooltip: 'Delete' }" href="{{ url('/deletechef',$data->id) }}">

                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="h-6 w-6"
                            x-tooltip="tooltip"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                            />
                          </svg>
                        </a>

                      </div>
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex justify-end gap-4">
                    <a x-data="{ tooltip: 'Edite' }" href="{{ url('/updatechef',$data->id) }}">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke-width="1.5"
                          stroke="currentColor"
                          class="h-6 w-6"
                          x-tooltip="tooltip"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                          />
                        </svg>
                      </a>
                    </div>
                    </td>



                  </tr>

                </tbody>
                @endforeach

              </table>
            </div>














    @include('admin.adminscript')

  </body>

</html>



