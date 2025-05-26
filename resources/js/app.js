import './bootstrap';
import * as fabric from 'fabric';
import { fabric } from 'fabric';
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

document.getElementById('drawingsForm').addEventListener('submit', function(e) {
    const json = canvas.toJSON();
    document.getElementById('drawingInput').value = JSON.stringify(json);
});

window.addEventListener('DOMContentLoaded', () => {
    console.log("window event listener called");
    fetch('/drawings-json')
        .then(() => console.log("fetched"))
        .then(res => res.json())
        .then(drawings => {
            drawings.forEach((drawing, index) => {
                const canvasEl = document.getElementById('canvas-' + index);
                if (!canvasEl) {
                    console.warn(`Canvas with id canvas-${index} not found!`);
                    return;
                }
                const canvas = new fabric.Canvas(canvasEl);
                const drawingJSON = JSON.parse(drawing);
                canvas.loadFromJSON(drawingJSON, () => {
                    canvas.renderAll();
                });
            });
        })
        .catch(err => console.error('Error loading drawings JSON:', err));
});

window.closeDrawingsForm = function () {
    document.getElementById('drawings').classList.add('hidden');

    if (canvas) {
        canvas.dispose();
    }
}