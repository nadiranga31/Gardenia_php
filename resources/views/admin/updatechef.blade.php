
<x-app-layout>
</x-app-layout>


<!DOCTYPE html>
<html lang="en">

  <head>

    <base href="/public">
    @include("admin.admincss")
  </head>

  <body>
    <div class="container-scroller">

    @include("admin.navbar")


<div class="max-w-lg lg:ms-auto mx-auto text-center pt-3 ">
    <div class="py-16 px-7 rounded-md bg-white">

        <form action=" {{ url('/updatefoodchef',$data->id) }}" method="post" enctype="multipart/form-data" >

            @csrf

            <div class="grid md:grid-cols-2 grid-cols-1 gap-6">
                <div class="md:col-span-2">
                    <label  class="text-black">name</label>
                <input type="text" name="name"  value="{{ $data->name }}"  class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700 text-black" required>
              </div>

              <div class="md:col-span-2">
                <textarea name="speciality" rows="5" cols=""  class="text-black w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700"  required> {{ $data->speciality }}</textarea>
              </div>




              <div class="md:col-span-2">
                <label  class="float-left block  font-normal text-gray-400 text-lg">Old Image :</label>
                <img src="/chefimage/{{ $data->image }}" alt="">

            </div>

            <div class="md:col-span-2">
                <label  class="float-left block  font-normal text-gray-400 text-lg">Add a Chef's New Image :</label>
                <input type="file"  name="image" placeholder="image" class=" text-black peer block w-full appearance-none border-none   bg-transparent py-2.5 px-0 text-sm  focus:border-blue-600 focus:outline-none focus:ring-0">
            </div>

              <div class="md:col-span-2">
                <button class="py-3 text-base font-medium rounded text-white bg-blue-800 w-full hover:bg-blue-700 transition duration-300">Update</button>
              </div>
            </div>
          </form>

        </div>
    </div>




 








    @include('admin.adminscript')

  </body>

</html>



