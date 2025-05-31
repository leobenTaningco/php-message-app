<div id="messageFormModal" class="fixed inset-0 flex items-center justify-center z-50 hdden">
  <div class="bg-blue-100 rounded-lg shadow-lg p-6 w-full max-w-md relative">
    <button onclick="closeForm()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-xl font-bold">
      &times;
    </button>

    <h2 class="text-2xl font-semibold text-[#5BA5BF] mb-4">Leave a Message</h2>

    <form method="POST" action="{{ route('messages.store') }}" autocomplete="off">
      @csrf
      <div class="flex flex-col bg-white rounded-md shadow-lg">
        <div class="flex items-center h-12 bg-blue-400 p-3 rounded-t-md">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 stroke-blue-900">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
          </svg>
          <input type="text" id="name" name="name" required placeholder="Your name here..." class="ml-2 w-full border border-[#A6D7E8] rounded px-3 py-1.5 text-blue-900 font-semibold focus:outline-none focus:ring-2 focus:ring-[#6CB4CE]" />
        </div>

        <div class="flex flex-col flex-grow overflow-auto py-3">
          <div class="relative p-3 mx-5 mb-3 bg-blue-200 text-slate-800 rounded-lg max-w-[75%] self-start">
            <textarea id="content" name="content" rows="4" required placeholder="Your message here..." class="w-full border border-[#A6D7E8] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#6CB4CE]"></textarea>
            <div class="absolute left-0 bottom-0 transform -translate-x-[0.18rem] translate-y-[0.18rem] w-2 h-2 bg-blue-100 rotate-45 rounded-sm"></div>
            <div class="absolute left-0 bottom-0 transform -translate-x-[0.32rem] translate-y-[0.32rem] w-1.5 h-1.5 bg-green-100 rotate-45 rounded-sm"></div>
            <div class="absolute left-0 bottom-0 transform -translate-x-[0.37rem] translate-y-[0.37rem] w-1 h-1 bg-red-100 rotate-45 rounded-sm"></div>
          </div>
        </div>
        <div class="mt-auto flex items-center h-12 w-full bg-blue-400 p-3 rounded-b-md">
          <div class="w-full flex items-center justify-between rounded-md">
            <div class="flex items-center w-full mr-3 bg-white p-1 rounded-md text-sm text-gray-400">
            &nbsp;Reply
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 rounded-full hover:bg-blue-300">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 2L11 13M22 2L15 22L11 13L2 9L22 2Z" />
            </svg>
          </div>
        </div>
      </div>

      <button type="submit" class="mt-4 w-full bg-[#6CB4CE] text-white font-extrabold px-4 py-2 rounded hover:bg-[#5BA5BF]">Submit</button>
    </form>
  </div>
</div>
