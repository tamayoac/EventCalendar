<div class="bg-gray-200 mt-4 lg:mt-0 mr-0 lg:mr-2">
    <div class="flex flex-wrap p-4">
        <form class="form-event">
            {{ csrf_field() }}
            <div class="w-full px-1 mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Event
                </label>
                <input name="event_name"class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" id="event" type="text" placeholder="Event">
          </div>
          <div class="flex flex-wrap mb-4">
            <div class="w-full md:w-1/2 px-1">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="datepicker_from">
                    From
                  </label>
                  <input name="event_from" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" id="datepicker_from" type="text" placeholder="Event">
              </div>
              <div class="w-full md:w-1/2 px-1">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="datepicker_to">
                    To
                  </label>
                  <input name="event_to" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" id="datepicker_to" type="text" placeholder="Event">
              </div>
          </div>
          <div class="flex flex-wrap">
            <div class="w-full md:w-1/2">
                <div class="bg-gray-600 rounded m-2 p-2">
                    <input name="monday" id="monday" type="checkbox" class="text-sm form-checkbox" value="1"><label for="monday" class="text-white text-xs ml-1 uppercase font-bold">Monday</label> 
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <div class="bg-gray-600 rounded m-2 p-2">
                    <input name="tuesday" id="tuesday" type="checkbox" class="text-sm form-checkbox" value="2"><label for="tuesday" class="text-white text-xs ml-1 uppercase font-bold">Tuesday</label> 
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <div class="bg-gray-600 rounded m-2 p-2">
                    <input name="wednesday" id="wednesday" type="checkbox" class="text-sm form-checkbox" value="3"><label for="wednesday" class="text-white text-xs ml-1 uppercase font-bold">Wednesday</label> 
            
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <div class="bg-gray-600 rounded m-2 p-2">
                    <input name="thursday" id="thursday" type="checkbox" class="text-sm form-checkbox" value="4"><label for="thursday" class="text-white text-xs ml-1 uppercase font-bold">Thursday</label> 
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <div class="bg-gray-600 rounded m-2 p-2">
                    <input name="friday" id="friday" type="checkbox" class="text-sm form-checkbox" value="5"><label for="friday" class="text-white text-xs ml-1 uppercase font-bold">Friday</label> 
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <div class="bg-gray-600 rounded m-2 p-2">
                    <input name="saturday" id="saturday" type="checkbox" class="text-sm form-checkbox" value="6"><label for="saturday"class="text-white text-xs ml-1 uppercase font-bold">Saturday</label> 
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <div class="bg-gray-600 rounded m-2 p-2">
                    <input name="sunday" id="sunday" type="checkbox" class="text-sm form-checkbox" value="0"><label for="sunday"class="text-white text-xs ml-1 uppercase font-bold">Sunday</label> 
                </div>
            </div>
          </div>

        </form>
        <div class="mx-1 my-2 w-full">
            <button class="submit-btn p-2 bg-green-400 text-white w-full">Save</button>
        </div>
    </div>
</div>