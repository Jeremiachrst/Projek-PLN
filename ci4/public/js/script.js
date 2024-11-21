document.addEventListener("DOMContentLoaded", function () {
  const sidebar = document.querySelector(".sidebar");
  const sidebarToggleBtn = document.getElementById("sidebarToggleBtn");
  const mainContent = document.querySelector(".main-content");

  function toggleSidebar() {
    sidebar.classList.toggle("sidebar-minimized");
    mainContent.classList.toggle("main-content-expanded");

    // Trigger window resize event to adjust charts
    window.dispatchEvent(new Event("resize"));
  }

  sidebarToggleBtn.addEventListener("click", toggleSidebar);
  window.addEventListener("resize", checkWidth);
});

$(document).ready(function () {
  $("#myInput").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });
});

function openModal(modalId) {
  $(".modal").modal("hide");
  $("#" + modalId).modal("show");
}

function closeModal(modalId) {
  $("#" + modalId).modal("hide");
}

function backToParentModal(currentModalId) {
  $("#" + currentModalId).modal("hide");
  if (currentModalId === "modalUnit" || currentModalId === "modalPembangkit") {
    $("#tambahDataModal").modal("show");
  } else if (currentModalId === "modal2a" || currentModalId === "modal2b") {
    $("#modalPembangkit").modal("show");
  }
}
