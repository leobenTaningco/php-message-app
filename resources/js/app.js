import './bootstrap';
import * as fabric from 'fabric';

let canvas; 

window.openDrawingsForm = function () {
    document.getElementById('drawings').classList.remove('hidden');

    const canvasElement = document.getElementById('canvas');
    if (canvasElement) {
        canvas = new fabric.Canvas('canvas');

        const rect = new fabric.Rect({
            left: 50,
            top: 50,
            fill: 'green',
            width: 50,
            height: 50
        });

        canvas.add(rect);
    }
}

window.closeFormTest = function () {
    document.getElementById('drawings').classList.add('hidden');

    if (canvas) {
        canvas.dispose();
    }
}