document.querySelector(".envquicklinks-bar__toggle").addEventListener("click", function() {
    document.querySelector(".envquicklinks-bar").classList.toggle('is--hidden');
    this.classList.toggle('is--closed');

    if (this.innerText == "[ - ]") {
         this.innerText = "[ + ]";
    }
    else if (this.innerText == "[ + ]") {
        this.innerText = "[ - ]";
    }
});