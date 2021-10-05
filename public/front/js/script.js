


//toggle spin class on icon
window.onload = function(){
//selecting landing page element
    let landingPage = document.querySelector(".landing-page");

//get array of objects
    let imagesArray = ["school1.jpg","school2.jpg","school3.jpeg","school4.jpg"];
    let randomimages = true;
    let backgroundInteravl;
    function randomize() {
        console.log('yes');
        if (randomimages === true){
            backgroundInteravl = setInterval(()=> {
                let randomNumber = Math.floor(Math.random() *imagesArray.length);
                if (randomNumber===1){
                    landingPage.style.backgroundImage = 'url(front/images/school1.jpg)';

                } else if (randomNumber === 2){
                    landingPage.style.backgroundImage = 'url(front/images/school2.jpg)';

                }else if (randomNumber === 3){
                    landingPage.style.backgroundImage = 'url(front/images/school3.jpeg)';

                }else if (randomNumber === 0){
                    landingPage.style.backgroundImage = 'url(front/images/school4.jpg)';

                }
            },2000);
        }
    }

    document.querySelector(".settings-box .toggle-settings .fa-gear").onclick = function () {
        //for rotation
        this.classList.toggle("fa-spin");
        document.querySelector(".settings-box").classList.toggle("open");
    };

    //check if there is color in local storage
    let mainColor = localStorage.getItem("color_option");
    if (mainColor!= null){
        console.log(mainColor);
        document.documentElement.style.setProperty('--main-color',mainColor);

        document.querySelectorAll(".colors-list li").forEach(element => {

           element.classList.remove("active");

           if (element.dataset.color === mainColor){
               element.classList.add("active");
           }
        });

    }

    let backgroundrandom = localStorage.getItem("background_random");
    if (backgroundrandom === 'yes'){
        randomize();
    }else {
        randomimages = false;
        clearInterval(backgroundInteravl);
        document.querySelectorAll(".random-background span").forEach(element => {

            element.classList.remove("active");

            if (element.dataset.background === backgroundrandom){
                element.classList.add("active");
            }
        });
    }


    const colorLi = document.querySelectorAll(".colors-list li");

    colorLi.forEach(li=>{
        li.addEventListener("click",(e)=>{
            console.log(e.target.dataset.color);
            document.documentElement.style.setProperty('--main-color',e.target.dataset.color);
            localStorage.setItem("color_option",e.target.dataset.color);

            e.target.parentElement.querySelectorAll(".active").forEach(element => {
                element.classList.remove("active");

            });
            e.target.classList.add("active");
        });
    });

    //change random background
    const randomBack = document.querySelectorAll(".random-background span");

    randomBack.forEach(span=>{

        span.addEventListener("click",(e)=>{


            e.target.parentElement.querySelectorAll(".active").forEach(element => {
                element.classList.remove("active");
            });
            if (e.target.dataset.background==='no'){
                randomimages = false;
                clearInterval(backgroundInteravl);
                localStorage.setItem("background_random",e.target.dataset.background);

            }
            if (e.target.dataset.background==='yes'){
                randomimages = true;
                randomize();
                localStorage.setItem("background_random",e.target.dataset.background);

            }
            e.target.classList.add("active");
        });
    });

    //our skills script

    let ourSkills = document.querySelector(".skills");
    window.onscroll = function () {

        //skills offsettop
        let  skillsOffsetTop = ourSkills.offsetTop;

        // offset height
        let skillsOuterHeight = ourSkills.offsetHeight;

        //window height

        let windowHeight = this.innerHeight;

        //window scrooll top
        let scroltop = this.pageYOffset;

        if (scroltop > (skillsOffsetTop + skillsOuterHeight -windowHeight)){
            let allskills = document.querySelectorAll(".skill-box .skill-progress span");
            allskills.forEach(skill => {
               skill.style.width = skill.dataset.progress;
            });
        }
    };

    //our gallery
    let ourGallery = document.querySelectorAll(".gallery img");
    ourGallery.forEach(img=>{
       img.addEventListener('click' , (e) =>{
          //create overlay element
          let overlay = document.createElement("div");

          //add class to overlay
           overlay.className = 'popup-overlay';

           //append overlay to body
           document.body.appendChild(overlay);

           //create the popup
           let popupBox = document.createElement("div");
           popupBox.className = 'popup-box';
           if (img.alt!==null){
               let imgHeading = document.createElement("h3");
               let imgText = document.createTextNode(img.alt);
               imgHeading.appendChild(imgText);
               popupBox.appendChild(imgHeading);
           }

           //create the Image
           let popupImage = document.createElement("img");
           popupImage.src = img.src;
           popupBox.appendChild(popupImage);
           document.body.appendChild(popupBox);

           let closebtn = document.createElement("span");
           let closebuttonText = document.createTextNode("x");

            closebtn.appendChild(closebuttonText);
            closebtn.className = 'close-button';

            popupBox.appendChild(closebtn);
       });
    });


    document.addEventListener('click',function (e) {
       if (e.target.className == 'close-button'){
           e.target.parentNode.remove();
           document.querySelector(".popup-overlay").remove();
       }

    });
}
