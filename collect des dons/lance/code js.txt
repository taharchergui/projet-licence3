const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});
let projet =null;
fetch('projet.json')
.then(Response=>Response.json())
.then(data => {
  projet = data;
  console.log(projet);
  addDataToHTML();

})

document.addEventListener("DOMContentLoaded", function () {
  let projects = [];

  function addDataToHTML() {
      const projectsList = document.getElementById("projectsList");
      projectsList.innerHTML = "";

      projects.forEach((project) => {
          const projectCard = document.createElement("div");
          projectCard.classList.add("col-md-4", "mb-4", "project");
          projectCard.setAttribute("data-name", project.name);

          projectCard.innerHTML = `
              <div class="card h-100">
                  <div class="card-body">
                      <h3 class="card-title">${project.name}</h3>
                      <p class="card-text">${project.description}</p>
                      <p class="card-text"><strong>Montant de Dons: ${project.amount}€</strong></p>
                      <a href="#donate" class="btn btn-primary">Faire un Don</a>
                  </div>
                  <div class="card-footer bg-transparent border-top d-flex justify-content-between align-items-center">
                      <small class="text-muted">Dernière mise à jour il y a ${project.lastUpdated} minutes</small>
                      <button type="button" class="btn btn-outline-danger btn-sm addToFav"><i class="lni lni-heart"></i> Ajouter aux favoris</button>
                  </div>
              </div>
          `;

          projectsList.appendChild(projectCard);
      });

      const addToFavButtons = document.querySelectorAll(".addToFav");
      addToFavButtons.forEach((button) => {
          button.addEventListener("click", addToFavorites);
      });
  }

  function addToFavorites(event) {
      const button = event.target;
      const cardFooter = button.parentElement;
      const projectCard = cardFooter.parentElement.parentElement;

      console.log("Ajouter aux favoris : ", projectCard.getAttribute("data-name"));
  }

  function searchProjects() {
      const searchInput = document.getElementById("searchInput").value.toLowerCase();

      projects.forEach((project) => {
          const projectName = project.name.toLowerCase();
          const projectCard = document.querySelector(`.project[data-name="${project.name}"]`);

          if (projectName.includes(searchInput)) {
              projectCard.style.display = "block";
          } else {
              projectCard.style.display = "none";
          }
      });
  }

  fetch("projet.json")
      .then((response) => response.json())
      .then((data) => {
          projects = data;
          console.log(projects);
          addDataToHTML();
      })
      .catch((error) => {
          console.error("Une erreur s'est produite lors du chargement des projets : ", error);
      });

  const searchBtn = document.getElementById("searchBtn");
  searchBtn.addEventListener("click", searchProjects);
});
