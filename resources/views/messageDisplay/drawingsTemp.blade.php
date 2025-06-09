<div id="drawingDisplay" class="flex flex-row w-full h-100">
  @foreach ($drawings as $index => $drawing)
  <canvas id="canvas-{{ $index }}" class="w-full aspect-square border border-gray-500" width="300" height="300"></canvas>
  @endforeach
</div>