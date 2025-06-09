<div class="flex flex-row w-full h-100 p-4">
  @foreach ($messages as $message)
  @include('messageModals.reply-form-modal', ['message' => $message])
  <div class="flex flex-col w-75 h-75 bg-white m-3 rounded-md shadow-lg">
    <div class="flex items-center h-12 w-full p-3 rounded-t-md" style="background-color: {{ $message->color }}">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 stroke-blue-900">
        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
      </svg>
      <span class="font-bold ml-2 text-blue-900">{{ $message->name }}</span>
    </div>
    <div class="flex flex-col flex-grow overflow-auto py-2">
      <div class="message-bubble relative p-3 mx-5 mt-auto mb-1 text-slate-800 rounded-lg max-w-[70%] self-start" data-color="{{ $message->color }}">
        <span>{{ $message->content }}</span>
        <div class="absolute left-0 bottom-0 transform -translate-x-[0.18rem] translate-y-[0.18rem] w-2 h-2 bg-blue-100 rotate-40 rounded-lg"></div>
        <div class="absolute left-0 bottom-0 transform -translate-x-[0.32rem] translate-y-[0.32rem] w-1.5 h-1.5 bg-green-100 rotate-40 rounded-lg"></div>
        <div class="absolute left-0 bottom-0 transform -translate-x-[0.37rem] translate-y-[0.37rem] w-1 h-1 bg-red-100 rotate-40 rounded-lg"></div>
      </div>
      @foreach ($message->replies as $reply)
      <div class="reply-bubble relative p-3 mx-5 my-1 bg-red-200 text-slate-800 rounded-lg max-w-[70%] self-end" data-color="{{ $reply->color }}">
        <span>{{ $reply->content }}</span>
        <div class="absolute right-0 bottom-0 transform translate-x-[0.18rem] translate-y-[0.18rem] w-2 h-2 bg-red-100 rotate-40 rounded-lg"></div>
        <div class="absolute right-0 bottom-0 transform translate-x-[0.32rem] translate-y-[0.32rem] w-1.5 h-1.5 bg-red-200 rotate-40 rounded-lg"></div>
        <div class="absolute right-0 bottom-0 transform translate-x-[0.37rem] translate-y-[0.37rem] w-1 h-1 bg-red-300 rotate-40 rounded-lg"></div>
      </div>
      @endforeach
    </div>
    <div class="mt-auto flex items-center h-12 w-full p-3 rounded-b-md" style="background-color: {{ $message->color }}">
      <button
        onclick="document.getElementById('replyFormModal-{{ $message->id }}').classList.contains('hidden')? openReplyForm('{{ $message->id }}'): closeReplyForm('{{ $message->id }}')"
        class="w-full flex items-center justify-between rounded-md cursor-pointer"
        type="button">
        <div class="flex items-center w-full mr-3 bg-white p-1 rounded-md text-sm text-gray-400">
          &nbsp; Reply
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 rounded-full hover:bg-blue-300">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 2L11 13M22 2L15 22L11 13L2 9L22 2Z" />
        </svg>
      </button>
    </div>
  </div>
  @endforeach
  <script>
    function openReplyForm(messageId) {
      document.getElementById('replyFormModal-' + messageId).classList.remove('hidden')
    }

    function closeReplyForm(messageId) {
      document.getElementById('replyFormModal-' + messageId).classList.add('hidden')
    }
  </script>
</div>
<script>
  function adjustBubbleColor(hex, percent = 20) {
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
  document.querySelectorAll('.message-bubble').forEach(el => {
    let color = el.dataset.color;
    let adjusted = adjustBubbleColor(color);
    el.style.backgroundColor = adjusted;
  });
  document.querySelectorAll('.reply-bubble').forEach(el => {
    let color = el.dataset.color;
    let adjusted = adjustBubbleColor(color);
    el.style.backgroundColor = adjusted;
  });
</script>