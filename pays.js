(function () {
  console.log("rest api");

  // Function to fetch data based on the category
  function fetchDataForCategory(categories) {
    let url = `https://gftnth00.mywhc.ca/tim49/wp-json/wp/v2/posts?categories=${categories}`;
    fetch(url)
      .then(function (response) {
        if (!response.ok) {
          throw new Error(
            "La requête a échoué avec le statut " + response.status
          );
        }
        return response.json();
      })
      .then(function (data) {
        let restapi = document.querySelector(".contenu__restapi");
        restapi.innerHTML = "";
        data.forEach(function (article) {
          let titre = article.title.rendered;
          let contenu = article.content.rendered;
          contenu = contenu.substring(0, 75) + "...";
          let carte = document.createElement("div");
          carte.classList.add("restapi__carte");
          carte.innerHTML = `<h2>${titre}</h2><p>${contenu}</p>`;
          restapi.appendChild(carte);
        });
      })
      .catch(function (error) {
        console.error("Erreur lors de la récupération des données :", error);
      });
  }

  // Event listeners for category buttons
  let boutton_categorie = document.querySelectorAll(".boutton_categorie");
  boutton_categorie.forEach(function (button) {
    button.addEventListener("mousedown", function () {
      // Extract category ID from button ID
      let category = this.id.split("_")[1];
      fetchDataForCategory(category);
    });
  });
})();
