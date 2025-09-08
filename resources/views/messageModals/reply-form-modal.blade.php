<div
  id="replyFormModal-{{ $message->id }}"
  class="flex w-full inset-0 p-4 fixed items-center justify-center z-50 hidden">
  <div class="fixed rounded-lg shadow-lg p-6 w-full max-w-md bg-gray-800">
    <button
      onclick="closeReplyForm('{{ $message->id }}')"
      class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-xl font-bold">
      &times;
    </button>
    <h2 class="text-2xl font-semibold text-[#d5eff8] mb-4">Leave a Reply</h2>
    <form method="POST" action="{{ route('replies.store') }}" autocomplete="off">
      @csrf
      <div class="flex flex-col w-full h-[24rem] bg-white rounded-md shadow-lg overflow-hidden">
        <div class="flex items-center h-12 p-3 rounded-t-md" style="background-color: {{ $message->color }};">
          <img
            src="{{ $message->user && $message->user->profile_picture ? asset('storage/' . $message->user()->profile_picture) : 'https://pbs.twimg.com/media/GkcZw0lWEAAuGGz?format=png&name=small' }}"
            class="w-10 h-10 rounded-full border border-gray-300 object-cover"
          >
          <div class="ml-2 w-full rounded px-3 py-1.5 text-blue-900 font-semibold focus:outline-none">{{ $message->user->name ?? 'Anonymous' }}</div>
        </div>

        <input type="hidden" name="message_id" value="{{ $message->id }}">

        <div class="flex flex-col flex-grow overflow-y-auto py-3">

          <div class="relative p-3 mx-5 mt-auto message-bubble-color text-slate-800 rounded-lg max-w-[75%] self-start" data-color="{{ $message->color }}">
            <div class="w-full px-3 py-2 ">{{ $message->content }}</div>
            <div class="absolute left-0 bottom-0 transform -translate-x-[0.18rem] translate-y-[0.18rem] w-2 h-2 bg-blue-100 rotate-45 rounded-sm"></div>
            <div class="absolute left-0 bottom-0 transform -translate-x-[0.32rem] translate-y-[0.32rem] w-1.5 h-1.5 bg-green-100 rotate-45 rounded-sm"></div>
            <div class="absolute left-0 bottom-0 transform -translate-x-[0.37rem] translate-y-[0.37rem] w-1 h-1 bg-red-100 rotate-45 rounded-sm"></div>
          </div>

          @foreach ($message->replies as $reply)
          <div class="relative p-3 mx-5 my-3 replies-bubble-color text-slate-800 rounded-lg max-w-[70%] self-end" data-color="{{ $reply->color }}">
            <span>{{ $reply->content }}</span>
            <div class="absolute right-0 bottom-0 transform translate-x-[0.18rem] translate-y-[0.18rem] w-2 h-2 bg-red-100 rotate-40 rounded-lg"></div>
            <div class="absolute right-0 bottom-0 transform translate-x-[0.32rem] translate-y-[0.32rem] w-1.5 h-1.5 bg-red-200 rotate-40 rounded-lg"></div>
            <div class="absolute right-0 bottom-0 transform translate-x-[0.37rem] translate-y-[0.37rem] w-1 h-1 bg-red-300 rotate-40 rounded-lg"></div>
          </div>
          @endforeach
        </div>

      <div class="flex items-center w-full p-3 rounded-b-md" style="background-color: {{ $message->color }};">
        <div class="w-full flex items-center justify-between rounded-md">
          <div class="flex items-center w-full mr-3 p-1 rounded-md text-sm font-semibold reply-bubble-color ">
            <textarea id="content" name="content" required placeholder="Your reply here..." class="w-full min-h-[2.5rem] resize-none border border-[#A6D7E8] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#6CB4CE]"></textarea>
          </div>
        </div>
      </div>
      </div>
      <div class="mt-4">
        <label class="block text-white font-semibold mb-2">Choose a Color:</label>
        <div class="flex space-x-3">
          <div id="defaultReplyColor" onclick="ReplyModal.selectReplyColor('#F87171', '{{ $message->id }}')" class="w-8 h-8 rounded-full cursor-pointer border-2 border-gray-300" style="background-color: #F87171;"></div>
          <div onclick="ReplyModal.selectReplyColor('#FBBF24', '{{ $message->id }}')" class="w-8 h-8 rounded-full cursor-pointer border-2 border-gray-300" style="background-color: #FBBF24;"></div>
          <div onclick="ReplyModal.selectReplyColor('#34D399', '{{ $message->id }}')" class="w-8 h-8 rounded-full cursor-pointer border-2 border-gray-300" style="background-color: #34D399;"></div>
          <div onclick="ReplyModal.selectReplyColor('#60A5FA', '{{ $message->id }}')" class="w-8 h-8 rounded-full cursor-pointer border-2 border-gray-300" style="background-color: #60A5FA;"></div>
          <div onclick="ReplyModal.selectReplyColor('#A78BFA', '{{ $message->id }}')" class="w-8 h-8 rounded-full cursor-pointer border-2 border-gray-300" style="background-color: #A78BFA;"></div>
        </div>
        <input type="hidden" name="color" id="replyColorInput-{{ $message->id }}" value='#F87171'>
      </div>
      <button type="submit" class="mt-4 w-full bg-[#6CB4CE] text-white font-extrabold px-4 py-2 rounded hover:bg-[#5BA5BF]">Submit</button>
    </form>
  </div>
</div>
<script>
  addEventListener('DOMContentLoaded', () => {
    const defaultColorReply = '#F87171';
    const messageId = document.querySelector('input[name="message_id"]').value;
    const replyColorInput = document.getElementById("replyColorInput-" + messageId);
    if (replyColorInput) {
      replyColorInput.value = defaultColorReply;
    }    
    document.getElementById('defaultReplyColor')
      .classList.add('ring-4', 'ring-offset-2', 'ring-blue-500');
    document.querySelectorAll('.reply-bubble-color').forEach(el => {
      el.style.backgroundColor = adjustBubbleColor(defaultColorReply);
    });
  });
  const ReplyModal = {
    selectReplyColor(color, messageId) {
      document.getElementById("replyColorInput-" + messageId).value = color;
      document.querySelectorAll('[onclick^="ReplyModal.selectReplyColor"]').forEach(el => {
        el.classList.remove('ring-4', 'ring-offset-2', 'ring-blue-500');
      });
      event.target.classList.add('ring-4', 'ring-offset-2', 'ring-blue-500');
      document.querySelectorAll('.reply-bubble-color').forEach(el => {
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
    },
    messageBubbleColor() {
      document.querySelectorAll('.message-bubble-color').forEach(el => {
        let color = el.dataset.color;
        let adjusted = adjustBubbleColor(color);
        el.style.backgroundColor = adjusted;
      });
    },
    repliesBubbleColor() {
      document.querySelectorAll('.replies-bubble-color').forEach(el => {
        let color = el.dataset.color;
        let adjusted = adjustBubbleColor(color);
        el.style.backgroundColor = adjusted;
      });
    }
  };
  document.addEventListener("DOMContentLoaded", () => {
    ReplyModal.messageBubbleColor();
  })
  document.addEventListener("DOMContentLoaded", () => {
    ReplyModal.repliesBubbleColor();
  })
</script>