<div>
    <div class="flex items-center">
        <div class="w-full">
          <h2 class="text-center text-indigo-600 font-bold text-2xl uppercase mb-10">Add new contact</h2>
          <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2 border border-gray-200">
              <div class="mb-5">
                <label for="name" class="block mb-2 font-bold text-gray-600">Name</label>
                <input type="text" wire:model="name" id="name" name="name" placeholder="Type name" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 w-full">
                @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
              </div>
     
              <div class="mb-5">
                <label for="email" class="block mb-2 font-bold text-gray-600">Email</label>
                <input type="email" wire:model="email" id="email" name="email" placeholder="Type email" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 w-full">
                @error('email')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
              </div>
     
              <div class="mb-5">
                <label for="phone_number" class="block mb-2 font-bold text-gray-600">Phone number</label>
                <input type="text" wire:model="phone_number" id="phone_number" name="phone_number" placeholder="Type phone number" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 w-full">
                @error('phone_number')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
              </div>
     
              <div class="mb-5">
                <label for="gender" class="block mb-2 font-bold text-gray-600">Gender</label>
                <select wire:model="gender" name="gender" id="gender" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 w-full">
                    <option value="" disabled selected>Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                @error('gender')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
              </div>
     
              <div class="mb-5">
                <label for="address" class="block mb-2 font-bold text-gray-600">Address</label>
                <textarea wire:model="address" name="address" id="address" cols="30" rows="5" placeholder="Type address" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 w-full"></textarea>
                @error('address')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
              </div>
     
              <button type="button" wire:click="saveContact" class="block w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold p-3 rounded-lg">Submit</button>
          </div>
        </div>
      </div> 
</div>
