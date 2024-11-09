function updateTime() {
    const currentTime = new Date();
    let hours = currentTime.getHours();
    const minutes = String(currentTime.getMinutes()).padStart(2, "0");
    const seconds = String(currentTime.getSeconds()).padStart(2, "0");
    const ampm = hours >= 12 ? "PM" : "AM";
    hours = hours % 12;
    hours = hours ? String(hours).padStart(2, "0") : "12";
    const time = `${hours}:${minutes}:${seconds} `;
    document.getElementById("current-time").textContent = time;
    document.getElementById("ampm-link").textContent = ampm;
}
updateTime();
setInterval(updateTime, 1000);
