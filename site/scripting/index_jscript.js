/*
/////////////*vertical scroll - todo to improve the scrolling down by having a fixed down and up button that jumps sections on hover\\\\\\\\\\\\
lt goDown = document.getElementById('goDown'); 
let backUp = document.getElementById('backUp');
let posArray = [0, 400, 690, 1250, 1600];
let posArrayLength = posArray.length;
let invPosArray = [1600, 1250, 690, 400, 0];

i = posArray[0];
if (posArray[i] == posArray[0]){
  goDown.addEventListener('mouseenter', () => window. scrollTo({
    top: posArray[1],
    behavior: 'smooth',
  }))
}
else if(posArray[i] == posArray[1]){
  goDown.addEventListener('mouseenter', () => window. scrollTo({
    top: posArray[2],
    behavior: 'smooth',
  }))
}
goDown.addEventListener('mouseleave', () => goDown.stopPropagation());

*/

////////incremental scroll downs - patchy solution for now:\\\\\\\\

  //first section:
let down1 = document.getElementById('goDown1');
down1.addEventListener('click', () => window.location.href = 'htdocs/index.html#two');
let up1 = document.getElementById('backUp1');
up1.addEventListener('click', () => window.location.href = 'htdocs/index.html#one');
  //second section: 
  let down2 = document.getElementById('goDown2');
  down2.addEventListener('click', () => window.location.href = 'htdocs/index.html#three');
  let up2 = document.getElementById('backUp2');
  up2.addEventListener('click', () => window.location.href = 'htdocs/index.html#two');
  //third section
  let down3 = document.getElementById('goDown3');
  down3.addEventListener('click', () => window.location.href = 'htdocs/index.html#four');
  let up3 = document.getElementById('backUp3');
  up3.addEventListener('click', () => window.location.href = 'htdocs/index.html#three');
  //fourth section
  let down4 = document.getElementById('goDown4');
  down4.addEventListener('click', () => window.location.href = 'htdocs/index.html#five');
  let up4 = document.getElementById('backUp4');
  up4.addEventListener('click', () => window.location.href = 'htdocs/index.html#four');


//////// horizontal scroll of news items.\\\\\\\\\
const slider = document.getElementById('newsContainer');
let isDown = false;
let startX;
let scrollLeft;

slider.addEventListener('mousedown', (e) => {
  isDown = true;
  startX = e.pageX - slider.offsetLeft;
  scrollLeft = slider.scrollLeft;
});
slider.addEventListener('mouseleave', () => {
  isDown = false;
});
slider.addEventListener('mouseup', () => {
  isDown = false;
});
slider.addEventListener('mousemove', (e) => {
  if(!isDown) return;
  e.preventDefault();
  const x = e.pageX - slider.offsetLeft;
  const walk = (x - startX) * 3; //scroll-fast
  slider.scrollLeft = scrollLeft - walk;
  console.log(walk);
});
