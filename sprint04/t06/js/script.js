
document.addEventListener("DOMContentLoaded", function() {
    var images = document.querySelectorAll("img");    
    var loadTimeout;
    var counter = 0;
    function lazyload () {
    if(loadTimeout) {
        clearTimeout(loadTimeout);
    }    
    
    loadTimeout = setTimeout(function() {
            var scroll = window.pageYOffset;
            images.forEach(function(img) {
                if(img.offsetTop < (window.innerHeight + scroll) && (img.offsetTop + 612) > scroll) {
                    img.src = img.dataset.src;
                    if(img.classList.contains("lazy")) {
                        counter++;
                        console.log(counter);
                        let info = document.querySelector(".counter .text");
                        info.innerHTML = counter + " images loaded from 20"
                        img.setAttribute("class", "lazy_not");

                        if(counter == 20) {
                            info.style.background = "#A6EB9A";
                            setTimeout(() => {
                                info.style.display = "none"
                            }, 3000)
                        }
                    }
                }
            });
            if(images.length == 0) { 
                document.removeEventListener("scroll", lazyload);
            }
        }, 50);
    }

    document.addEventListener("scroll", lazyload);
});