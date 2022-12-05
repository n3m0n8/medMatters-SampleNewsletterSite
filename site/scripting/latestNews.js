////////////incremental scroll downs - patchy solution for now:\\\\\\\\\\\\\\\\
  //first down:
  let down1 = document.getElementById('goDown1');
  down1.addEventListener('click', () => window.location.href = 'Latest.html#article-2');
   //second down: 
    let down2 = document.getElementById('goDown2');
    down2.addEventListener('click', () => window.location.href = 'Latest.html#article-3');
    let up1 = document.getElementById('backUp1');
    up1.addEventListener('click', () => window.location.href = 'Latest.html#article-1');
    //third down: 
    let down3 = document.getElementById('goDown3');
    down3.addEventListener('click', () => window.location.href = 'Latest.html#article-4');
    let up2 = document.getElementById('backUp2');
    up2.addEventListener('click', () => window.location.href = 'Latest.html#article-2');
    //fourth down: 
    let down4 = document.getElementById('goDown4');
    down4.addEventListener('click', () => window.location.href = 'Latest.html#article-5');
    let up3 = document.getElementById('backUp3');
    up3.addEventListener('click', () => window.location.href = 'Latest.html#article-3');
    let up4 = document.getElementById('backUp4');
    up4.addEventListener('click', () => window.location.href = 'Latest.html#article-4');
/*
    //////todo image cycling on timeout to switch the images of each story (and include a video embed in some of them) \\
    
    let frstSct = 'one';
    let scndSct = 'two';  
    let thrdSct = 'three'; 
    let frthSct = 'four'; 
    let ffthSct = 'five'; 
    let sct = document.getElementById

const imagesArray = [
    { img: 'assets/images/latests/{$sct}/1.jpg', time: 3000 },
    { img: 'assets/images/latests/{$sct}/2.jpg', time: 3000 },
    ];  

const img = document.getElementById('imgsSct{$sct}');
    //generator function with yield of the image from the array
    function* getImage() {
      for (let image of imagesArray) {
        yield image;
      }
    }

const imageGenerator = getImage();
    
    function showNextImage() {
      const image = imageGenerator.next().value;
      if (!image) return;
      img.src = image.img;
      setTimeout(showNextImage, image.time);
    };
    showNextImage(); 
*/
