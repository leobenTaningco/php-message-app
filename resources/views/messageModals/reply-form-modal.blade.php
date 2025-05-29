<div
  id="replyFormModal"
  class="fixed inset-0 flex items-center justify-center z-50 hidden"
>
  <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md relative">
    <button
      onclick="closeReplyForm()"
      class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-xl font-bold"
    >
      &times;
    </button>

    <h2 class="text-2xl font-semibold text-[#5BA5BF] mb-4">Leave a Reply</h2>

    <form method="POST" action="{{ route('replies.store') }}" autocomplete="off">
      @csrf

      <div class="mb-4">
        <label for="content" class="block text-gray-700 font-medium mb-1">Your Reply</label>
        <input type="hidden" name="message_id" value="{{ $message->id }}">
        <textarea
          id="content"
          name="content"
          rows="4"
          required
          class="w-full border border-[#A6D7E8] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#6CB4CE]"
        ></textarea>
      </div>

      <button
        type="submit"
        class="bg-[#6CB4CE] text-white font-medium px-4 py-2 rounded hover:bg-[#5BA5BF]"
      >
        Submit
      </button>
    </form>
  </div>
</div>

