const container = document.getElementById("container");
const registerBtn = document.getElementById("register");
const loginBtn = document.getElementById("login");

registerBtn.addEventListener("click", () => {
  container.classList.add("active");
});

loginBtn.addEventListener("click", () => {
  container.classList.remove("active");
});

function togglePassword(inputId, toggleBtn) {
  const input = document.getElementById(inputId);
  if (input.type === "password") {
    input.type = "text";
    toggleBtn.textContent = "🙉"; // Open eye emoji
  } else {
    input.type = "password";
    toggleBtn.textContent = "🙈"; // Closed eye emoji
  }
}
