<script>
var winterStartDay = 1;
var winterStartMonth = 10; //0 = leden → 11 = prosinec

var winterEndDay = 28; 
var winterEndMonth = 1;

var now = new Date();
var year = now.getFullYear();

var startDate = new Date(year, winterStartMonth, winterStartDay);
var endDate = new Date(year + (winterEndMonth < winterStartMonth ? 1 : 0), winterEndMonth, winterEndDay);

if (now >= startDate && now <= endDate) {
    var script = document.createElement("script");
    script.src = "../js/snow.js";
    script.async = true;
    document.head.appendChild(script);
}
</script>
