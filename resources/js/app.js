import "./bootstrap";
import "@tailwindplus/elements";
import "./../../vendor/power-components/livewire-powergrid/dist/powergrid.js";
import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css"; // ดึงไฟล์ CSS ของปฏิทินมาด้วย

// ต้องประกาศให้ flatpickr กลายเป็นตัวแปร Global เพื่อให้ Alpine.js มองเห็นและเรียกใช้ได้
window.flatpickr = flatpickr;
