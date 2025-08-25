var pages = [
  "/",
  "/about/",
  "/projects/",
  "/games/",
  "/programs/",
  "/other/"
];

function searchSite() {
  var query = document.getElementById("searchBox").value.toLowerCase();
  var resultsDiv = document.getElementById("results");
  resultsDiv.innerHTML = "Hledám...";

  var results = [];

  Promise.all(pages.map(function(url) {
    return fetch(url).then(function(resp) { return resp.text(); })
      .then(function(html) {
        // vytáhneme čistý text (odstraníme HTML tagy)
        var text = html.replace(/<[^>]+>/g, " ").toLowerCase();

        var index = text.indexOf(query);
        if (index !== -1) {
          // úryvek kolem výsledku
          var start = Math.max(0, index - 40);
          var end = Math.min(text.length, index + query.length + 40);
          var snippet = text.substring(start, end);

          // zvýraznění hledaného slova
          var re = new RegExp("(" + query + ")", "gi");
          snippet = snippet.replace(re, "<mark>$1</mark>");

          results.push(
            '<li><a href="'+url+'">'+url+'</a><br><small>... '
            + snippet + ' ...</small></li>'
          );
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
    var googleLink = "https://www.google.com/search?q=site:username.github.io+" + encodeURIComponent(query);
    resultsDiv.innerHTML += '<p><a href="'+googleLink+'" target="_blank">Hledat na Googlu</a></p>';
  });
}
