<script>
var pages = [
  "home.html",
  "projects.html",
  "games.html",
  "programs.html",
  "other.html",
  "about.html"
];

function searchSite() {
  var query = document.getElementById("searchBox").value.toLowerCase();
  var resultsDiv = document.getElementById("results");
  resultsDiv.innerHTML = "Hledám...";
  
  var results = [];

  Promise.all(pages.map(function(url) {
    return fetch(url).then(function(resp) { return resp.text(); })
      .then(function(text) {
        if (text.toLowerCase().indexOf(query) !== -1) {
          results.push('<li><a href="'+url+'">'+url+'</a></li>');
        }
      }).catch(function(e) {
        console.log("Nepodařilo se načíst " + url, e);
      });
  })).then(function() {
    if (results.length > 0) {
      resultsDiv.innerHTML = "<h3>Výsledky na mém webu:</h3><ul>" + results.join("") + "</ul>";
    } else {
      resultsDiv.innerHTML = "<p>Na mém webu nic nenalezeno.</p>";
    }

    // odkaz na Google hledání
    var googleLink = "https://www.google.com/search?q=" + encodeURIComponent(query);
    resultsDiv.innerHTML += '<p><a href="'+googleLink+'" target="_blank">Hledat na Googlu</a></p>';
  });
}
