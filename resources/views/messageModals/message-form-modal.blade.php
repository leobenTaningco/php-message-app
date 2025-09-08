<div id="messageFormModal" class="fixed inset-0 flex items-center justify-center z-50 hidden" >
  <div class="bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-md relative" onload="MessageModal.selectColor('#F87171')">
    <button onclick="closeForm()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-xl font-bold">
      &times;
    </button>
    <h2 class="text-2xl font-semibold text-[#c2dae3] mb-4">Leave a Message</h2>
    <form method="POST" action="{{ route('messages.store') }}" autocomplete="off">
      @csrf
      
      <div class="flex flex-col bg-white rounded-md shadow-lg">
        <div class="flex items-center h-12 header-color p-3 rounded-t-md">
          <img
            src="{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : 'https://pbs.twimg.com/media/GkcZw0lWEAAuGGz?format=png&name=small' }}"
            class="w-10 h-10 rounded-full border border-gray-300 object-cover"
          >
          <span class="ml-3 text-blue-900 font-semibold">
            {{ auth()->user()->name }}
          </span>
        </div>
        <div class="flex flex-col flex-grow overflow-auto py-3">
          <div class="relative p-3 mx-5 mb-3 message-bubble-color text-slate-800 rounded-lg max-w-[75%] self-start">
            <textarea id="content" name="content" rows="4" required placeholder="Your message here..." class="w-full border border-[#A6D7E8] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#6CB4CE]"></textarea>
            <div class="absolute left-0 bottom-0 transform -translate-x-[0.18rem] translate-y-[0.18rem] w-2 h-2 bg-blue-100 rotate-45 rounded-sm"></div>
            <div class="absolute left-0 bottom-0 transform -translate-x-[0.32rem] translate-y-[0.32rem] w-1.5 h-1.5 bg-green-100 rotate-45 rounded-sm"></div>
            <div class="absolute left-0 bottom-0 transform -translate-x-[0.37rem] translate-y-[0.37rem] w-1 h-1 bg-red-100 rotate-45 rounded-sm"></div>
          </div>
        </div>
        <div class="mt-auto flex items-center h-12 w-full footer-color p-3 rounded-b-md">
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
      <div class="mt-4">
        <label class="block text-white font-semibold mb-2">Choose a Color:</label>
        <div class="flex space-x-3" >
          <div id="defaultColor" onclick="MessageModal.selectColor('#F87171')" class="w-8 h-8 rounded-full cursor-pointer border-2 border-gray-300" style="background-color: #F87171;"></div>
          <div onclick="MessageModal.selectColor('#FBBF24')" class="w-8 h-8 rounded-full cursor-pointer border-2 border-gray-300" style="background-color: #FBBF24;"></div>
          <div onclick="MessageModal.selectColor('#34D399')" class="w-8 h-8 rounded-full cursor-pointer border-2 border-gray-300" style="background-color: #34D399;"></div>
          <div onclick="MessageModal.selectColor('#60A5FA')" class="w-8 h-8 rounded-full cursor-pointer border-2 border-gray-300" style="background-color: #60A5FA;"></div>
          <div onclick="MessageModal.selectColor('#A78BFA')" class="w-8 h-8 rounded-full cursor-pointer border-2 border-gray-300" style="background-color: #A78BFA;"></div>
        </div>
        <input type="hidden" name="color" id="colorInput" value="#F87171">
      </div>
      <button type="submit" class="mt-4 w-full bg-[#6CB4CE] text-white font-extrabold px-4 py-2 rounded hover:bg-[#5BA5BF]">Submit</button>
    </div>
    </form>
  </div>
</div>
<script>
  addEventListener('DOMContentLoaded', () => {
    const defaultColor = '#F87171';

    document.getElementById('colorInput').value = defaultColor;

    document.getElementById('defaultColor')
      .classList.add('ring-4', 'ring-offset-2', 'ring-blue-500');

    document.querySelectorAll('.header-color').forEach(el => {
      el.style.backgroundColor = defaultColor;
    });
    document.querySelectorAll('.footer-color').forEach(el => {
      el.style.backgroundColor = defaultColor;
    });
    document.querySelectorAll('.message-bubble-color').forEach(el => {
      el.style.backgroundColor = adjustBubbleColor(defaultColor);
    });
  });
  const MessageModal = {
    selectColor(color) {
      document.getElementById('colorInput').value = color;
      document.querySelectorAll('[onclick^="MessageModal.selectColor"]').forEach(el => {
        el.classList.remove('ring-4', 'ring-offset-2', 'ring-blue-500');
      });
      event.target.classList.add('ring-4', 'ring-offset-2', 'ring-blue-500');
      document.querySelectorAll('.header-color').forEach(el => {
        el.style.backgroundColor = color;
      });
      document.querySelectorAll('.footer-color').forEach(el => {
        el.style.backgroundColor = color;
      });
      document.querySelectorAll('.message-bubble-color').forEach(el => {
        el.style.backgroundColor = adjustBubbleColor(color);
      });
    },
    adjustBubbleColor(hex, percent = 20) {
      let num = parseInt(hex.replace("#", ""), 16),
        amt = Math.round(2.55 * percent),
        R = (num >> 16) + amt,
        G = (num >> 8 & 0x00FF) + amt,
        B = (num & 0x0000FF) + amt;
      return "#" + (
        0x1000000 +
        (R < 255 ? R < 1 ? 0 : R : 255) * 0x10000 +
        (G < 255 ? G < 1 ? 0 : G : 255) * 0x100 +
        (B < 255 ? B < 1 ? 0 : B : 255)
      ).toString(16).slice(1);
    }
  }
</script>