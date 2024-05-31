let buttonExit = document.querySelector(".c-notification__exit");

if (buttonExit) {
  buttonExit.addEventListener("click", function (e) {
    const notification = document.querySelector(".c-notification");
    notification.style.display = "none";
  });
}
