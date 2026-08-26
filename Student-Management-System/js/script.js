const searchInput = document.getElementById("searchInput");
if (searchInput) {
  searchInput.addEventListener("input", function () {
    const term = this.value.toLowerCase();
    document.querySelectorAll("#studentTable tbody tr").forEach(row => {
      row.style.display = row.innerText.toLowerCase().includes(term) ? "" : "none";
    });
  });
}

const form = document.getElementById("studentForm");
if (form) {
  form.addEventListener("submit", function(e) {
    const phone = form.phone.value.trim();
    if (!/^[0-9]{10}$/.test(phone)) {
      alert("Phone number must contain exactly 10 digits.");
      e.preventDefault();
    }
  });
}