<div
  id="drawings"
  class="fixed inset-0 flex items-center justify-center z-50 hidden">
  <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md relative">
    <button
      onclick="closeDrawingsForm()"
      class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-xl font-bold">
      &times;
    </button>
    <h2 class="text-2xl font-semibold text-[#5BA5BF] mb-4">Leave a Message</h2>
    <form method="POST" action="{{ route('drawings.store') }}" autocomplete="off" id="drawingsForm">
      @csrf
      <canvas id="canvas" class="w-full aspect-square  border border-gray-500 "></canvas>
      <input type="hidden" name="content" id="drawingInput" />
      <button
        type="submit"
        class="bg-[#6CB4CE] text-white font-medium mt-2 px-4 py-2 rounded hover:bg-[#5BA5BF]">
        Submit
      </button>
    </form>
  </div>
</div>