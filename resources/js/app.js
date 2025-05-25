import './bootstrap';
import * as fabric from 'fabric';

let canvas; 

window.openDrawingsForm = function () {
    document.getElementById('drawings').classList.remove('hidden');

    const canvasElement = document.getElementById('canvas');
    if (canvasElement) {
        canvas = new fabric.Canvas('canvas');
        canvas.isDrawingMode = true;

        canvas.freeDrawingBrush = new fabric.PencilBrush(canvas);
        var brush = canvas.freeDrawingBrush;
        brush.color = 'black';
        brush.width = 5;
    }
}

window.closeDrawingsForm = function () {
    document.getElementById('drawings').classList.add('hidden');

    if (canvas) {
        canvas.dispose();
    }
}