<div class="columns-1 sm:columns-2 md:columns-3 gap-4 mt-10 ">
  @foreach ($messages as $message)
    @include('messageModals.reply-form-modal', ['message' => $message])
    <div class="bg-white m-3 rounded-md shadow-lg w-80 break-inside-avoid" >

      <div class="flex items-center h-12 w-full p-3 rounded-t-md" style="background-color: {{ $message->color }}">        
          <img src="{{ $message->user && $message->user->profile_picture ? asset('storage/' . $message->user->profile_picture) : 'https://pbs.twimg.com/media/GkcZw0lWEAAuGGz?format=png&name=small' }}"
              class="w-10 h-10 rounded-full border border-gray-300 object-cover mr-3">
          <span class="font-bold text-blue-900 mb-1">{{ $message->user->name ?? 'Anonymous' }}</span>
      </div>

      <div class="flex flex-col py-2">
          <div class="message-bubble relative p-3 mx-5 mb-1 text-slate-800 rounded-lg max-w-[70%] self-start break-words" data-color="{{ $message->color }}">
              <div class="flex items-start mb-1">
                  <img src="{{ $message->user && $message->user->profile_picture ? asset('storage/' . $message->user->profile_picture) : 'https://pbs.twimg.com/media/GkcZw0lWEAAuGGz?format=png&name=small' }}"
                      class="w-6 h-6 rounded-full border border-gray-300 object-cover mr-1">
                  <span class="font-light text-sm text-blue-900">{{ $message->user->name ?? 'Anonymous' }}</span>
              </div>
              <span>{{ $message->content }}</span>
          </div>

          @foreach ($message->replies as $reply)
          <div class="reply-bubble relative p-3 mx-5 my-1 bg-red-200 text-slate-800 rounded-lg max-w-[70%] break-words
              {{ $reply->user_id === $message->user_id ? 'self-start' : 'self-end' }}" 
              data-color="{{ $reply->color }}">
              <div class="flex items-start mb-1">
                  <img src="{{ $reply->user && $reply->user->profile_picture ? asset('storage/' . $reply->user->profile_picture) : 'https://pbs.twimg.com/media/GkcZw0lWEAAuGGz?format=png&name=small' }}"
                      class="w-6 h-6 rounded-full border border-gray-300 object-cover mr-1">
                  <span class="font-light text-sm text-blue-900">{{ $reply->user->name ?? 'Anonymous' }}</span>
              </div>
              <span>{{ $reply->content }}</span>
          </div>
          @endforeach
      </div>

      <div class="flex items-center h-12 w-full p-3 rounded-b-md" style="background-color: {{ $message->color }}">
        <button
            onclick="document.getElementById('replyFormModal-{{ $message->id }}').classList.contains('hidden')? openReplyForm('{{ $message->id }}'): closeReplyForm('{{ $message->id }}')"
            class="w-full flex items-center justify-between rounded-md cursor-pointer"
            type="button">
            <a class="flex items-center w-full mr-3 bg-white p-1 rounded-md text-sm text-gray-400" href="{{ route('login') }}">
            &nbsp; Login to Reply
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 rounded-full">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 2L11 13M22 2L15 22L11 13L2 9L22 2Z" />
            </svg>
        </button>
      </div>

    </div>
  @endforeach
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