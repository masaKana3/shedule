import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import interactionPlugin from "@fullcalendar/interaction";
import axios from "axios";

console.log("📌 calendar.js がロードされました！");

document.addEventListener("DOMContentLoaded", function () {
    let calendarEl = document.getElementById("calendar");

    if (!calendarEl) {
        console.error("🚨 `#calendar` の要素が見つかりません！");
        return;
    }

    console.log("📌 `#calendar` が見つかりました！カレンダーを描画します！");

    let calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
        initialView: "dayGridMonth",
        events: "/api/schedules", // スケジュールデータを取得
        selectable: true,
        editable: true,
        eventClick: function (info) {
            alert("スケジュール: " + info.event.title);
        },
    });

    calendar.render();
});
