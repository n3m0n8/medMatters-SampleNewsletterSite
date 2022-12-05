//general skipping of op-eds\\
  //first down:
  let down1 = document.getElementById('goDown1');
  down1.addEventListener('click', () => window.location.href = 'Opinion.html#opinion-2');
   //second down: 
    let down2 = document.getElementById('goDown2');
    down2.addEventListener('click', () => window.location.href = 'Opinion.html#opinion-3');
    let up1 = document.getElementById('backUp1');
    up1.addEventListener('click', () => window.location.href = 'Opinion.html#opinion-1');
    //third down: 
    //let down3 = document.getElementById('goDown3');
    //down3.addEventListener('click', () => window.location.href = 'Opinion.html#opinion-4');
    //let up2 = document.getElementById('backUp2');
    //up2.addEventListener('click', () => window.location.href = 'Opinion.html#opinion-2');
    //fourth down: 
    //let down4 = document.getElementById('goDown4');
    //down4.addEventListener('click', () => window.location.href = 'Opinion.html#opinion-5');
    //let up3 = document.getElementById('backUp3');
    //up3.addEventListener('click', () => window.location.href = 'Opinion.html#opinion-3');
    //let up4 = document.getElementById('backUp4');
    //up4.addEventListener('click', () => window.location.href = 'Latest.html#opinion-4');

// *older less efficient versions included alongside updated version \\
//let count = 0;
//let arrayTotal;
//let arrayStrtPos;
//for (const el of opContainers) {
    //count++;
    //arrayTotal = count;
    //arrayStrtPos = (arrayTotal - arrayTotal);
    //console.log(count, arrayStrtPos, arrayTotal);
//}
//let i = count[0];

/////// *css opacity traversal \\\\\\\
//op-eds containers array
let opContainers = document.getElementsByClassName("opinion-text-container");
//init conditions
    let firstParas= document.getElementsByClassName('para1');
    for (firsts of firstParas){
        firsts.style.visibility = 'visible';
    }
    let scndParas= document.getElementsByClassName('para2');
    for (scnds of scndParas){
        scnds.style.visibility = 'hidden';
    }
    let thrdParas= document.getElementsByClassName('para3');
    for (thrds of thrdParas){
        thrds.style.visibility = 'hidden';
    }
  //next button action
    function next1() {
        if (opContainers[0] && firstParas[0].style.visibility === 'visible'){
            firstParas[0].style.visibility = 'hidden';
            scndParas[0].style.visibility = 'visible';
        }
        else if (opContainers[1] && firstParas[1].style.visibility === 'visible'){
            firstParas[1].style.visibility = 'hidden';
            scndParas[1].style.visibility = 'visible';
            }
        //else if (opContainers[2] && firstParas[2].style.visibility === 'visible'){
          //  firstParas[2].style.visibility = 'hidden';
           // scndParas[2].style.visibility = 'visible';
            //}
    }
    function next2() {
        if (opContainers[0] && scndParas[0].style.visibility === 'visible'){
            scndParas[0].style.visibility = 'hidden';
            thrdParas[0].style.visibility = 'visible';
        }
        //else if (opContainers[1] && scndParas[1].style.visibility === 'visible'){
          //  scndParas[1].style.visibility = 'hidden';
            //thrdParas[1].style.visibility = 'visible';
            //}    
        //else if (opContainers[2] && scndParas[2].style.visibility === 'visible'){
          //  scndParas[2].style.visibility = 'hidden';
           // thrdParas[2].style.visibility = 'visible';
            //}
    }
//prev button action 
function prev1() {
    if (opContainers[0] && scndParas[0].style.visibility === 'visible'){
        scndParas[0].style.visibility = 'hidden';
        firstParas[0].style.visibility = 'visible';
    }
    else if (opContainers[1] && scndParas[1].style.visibility === 'visible'){
        scndParas[1].style.visibility = 'hidden';
        firstParas[1].style.visibility = 'visible';
        }
    //else if (opContainers[2] && scndParas[2].style.visibility === 'visible'){
        //scndParas[2].style.visibility = 'hidden';
        //firstParas[2].style.visibility = 'visible';
        //}
}
function prev2() {
    if (opContainers[0] && thrdParas[0].style.visibility === 'visible'){
        thrdParas[0].style.visibility = 'hidden';
        scndParas[0].style.visibility = 'visible';
    }
    //else if (opContainers[1] && thrdParas[1].style.visibility === 'visible'){
        //thrdParas[1].style.visibility = 'hidden';
        //scndParas[1].style.visibility = 'visible';
        //}
    //else if (opContainers[2] && thrdParas[2].style.visibility === 'visible'){
        //thrdParas[2].style.visibility = 'hidden';
        //scndParas[2].style.visibility = 'visible';
        //}
}

/* NOTE THIS IS ALL THE OLD, MORE INEFFICIENT CONSTRUCT:

//Op-Ed1
let op1more1 = document.getElementById('opEd1Next1');
    op1more1.addEventListener('click', () => {
        document.querySelector('.opinion1-text1').style.opacity = 0; 
        document.querySelector('.opinion1-text2').style.opacity = 1; 
        document.querySelector('.opinion1-text3').style.opacity = 0;
        //document.querySelector('.opinion1-text4').style.opacity = 0;
        //document.querySelector('.opinion1-text5').style.opacity = 0;
    }
);
let op1prev1 = document.getElementById('opEd1Prev1');
    op1prev1.addEventListener('click', () => {
        document.querySelector('.opinion1-text1').style.opacity = 1; 
        document.querySelector('.opinion1-text2').style.opacity = 0; 
        document.querySelector('.opinion1-text3').style.opacity = 0;
        //document.querySelector('.opinion1-text4').style.opacity = 0;
        //document.querySelector('.opinion1-text5').style.opacity = 0;
    }
);
let op1more2 = document.getElementById('opEd1Next2');
    op1more2.addEventListener('click', () => {
        document.querySelector('.opinion1-text1').style.opacity = 0; 
        document.querySelector('.opinion1-text2').style.opacity = 0; 
        document.querySelector('.opinion1-text3').style.opacity = 1;
        //document.querySelector('.opinion1-text4').style.opacity = 0;
        //document.querySelector('.opinion1-text5').style.opacity = 0;
    }
);
let op1prev2 = document.getElementById('opEd1Prev2');
    op1prev2.addEventListener('click', () => {
        document.querySelector('.opinion1-text1').style.opacity = 0; 
        document.querySelector('.opinion1-text2').style.opacity = 1; 
        document.querySelector('.opinion1-text3').style.opacity = 0;
        //document.querySelector('.opinion1-text4').style.opacity = 0;
        //document.querySelector('.opinion1-text5').style.opacity = 0;
    }
);

//Op-Ed2
let op2more1 = document.getElementById('opEd2Next1');
    op2more1.addEventListener('click', () => {
        document.querySelector('.opinion2-text1').style.opacity = 0; 
        document.querySelector('.opinion2-text2').style.opacity = 1; 
        document.querySelector('.opinion2-text3').style.opacity = 0;
        //document.querySelector('.opinion2-text4').style.opacity = 0;
        //document.querySelector('.opinion2-text5').style.opacity = 0;
    }
);
let op2prev1 = document.getElementById('opEd2Prev1');
    op2prev1.addEventListener('click', () => {
        document.querySelector('.opinion2-text1').style.opacity = 1; 
        document.querySelector('.opinion2-text2').style.opacity = 0; 
        document.querySelector('.opinion2-text3').style.opacity = 0;
        //document.querySelector('.opinion2-text4').style.opacity = 0;
        //document.querySelector('.opinion2-text5').style.opacity = 0;
    }
);
let op2more2 = document.getElementById('opEd2Next2');
    op2more2.addEventListener('click', () => {
        document.querySelector('.opinion2-text1').style.opacity = 0; 
        document.querySelector('.opinion2-text2').style.opacity = 0; 
        document.querySelector('.opinion2-text3').style.opacity = 1;
        //document.querySelector('.opinion2-text4').style.opacity = 0;
        //document.querySelector('.opinion2-text5').style.opacity = 0;
    }
);
let op2prev2 = document.getElementById('opEd2Prev2');
    op2prev2.addEventListener('click', () => {
        document.querySelector('.opinion2-text1').style.opacity = 0; 
        document.querySelector('.opinion2-text2').style.opacity = 1; 
        document.querySelector('.opinion2-text3').style.opacity = 0;
        //document.querySelector('.opinion2-text4').style.opacity = 0;
        //document.querySelector('.opinion2-text5').style.opacity = 0;
    }
);
*/