
let logo, superzeichen;

let font_bold, font_medium, font_regular;

let distance, wash, mask;

let fade, grp, dir, speed;

let h1, h1_sub, h2, h2_sub;

let socket;

function preload(){
    logo = loadImage('img/JUH_Logo_Weiss_sRGB.png');
    superzeichen = loadImage('img/Superzeichen_sRGB.png');

    font_bold = loadFont('font/MavenPro-Bold.ttf');
    font_medium = loadFont('font/MavenPro-Medium.ttf');
    font_regular = loadFont('font/MavenPro-Regular.ttf');

    distance = loadImage('img/distance.png');
    wash = loadImage('img/wash.png');
    mask = loadImage('img/mask.png');


}


function setup(){
  createCanvas(windowWidth,  windowHeight);
  frameRate(30);
  fade = 0;
  grp = 0;
  dir = 1;
  speed = 2;

  socket = io.connect('ws://fs1.kai-thater.de:3000');

  socket.on('msg', msg_received);
}

function msg_received(data){
    h1          = data.h1;
    h1_sub      = data.h1_sub;
    h2          = data.h2;
    h2_sub      = data.h2_sub;
}

function windowResized(){
  resizeCanvas(windowWidth, windowHeight);
}
function draw(){
 background(235,0,60);

 push();
    translate(width/2, height/2);
    fill(0,5,72);
    stroke(0,5,72);
    strokeWeight(4);
    angleMode(DEGREES);
    rotate(21.26);
    rect(0,0,width, width);
    rotate(-90);
    rect(0,0,width,width);
 pop();

 push();
    translate(width/2, height/2);
    
    translate(p5.Vector.fromAngle(1.94185333, 350));
    imageMode(CENTER);
    image(superzeichen, 0, 0, 75, 75);
 pop();

 push();
    translate(25, 25);
    image(logo, 0 , 0, logo.width*0.15, logo.height*0.15);

 pop();


 push();

    let x = 75;
    let y = 150;
    textFont(font_bold);
    fill(255,255,255);
    textSize(150);
    text(h1, x, y, width-x, height-y);

    
    x = 75;
    y += 140;
    textFont(font_regular);
    fill(255,255,255);
    textSize(150);
    text(h1_sub, x, y, width-x, height-y);

 pop();


 push();
    x = 75;
    y += 200;
    textFont(font_bold);
    fill(255,255,255);
    textSize(75);
    text(h2, x, y, width-x, height-y);

    x = 75;
    y += 75;
    textFont(font_regular);
    fill(255,255,255);
    textSize(75);
    text(h2_sub, x, y, width-x, height-y);
 pop();


  if(dir == 1 && fade < 256){
      fade +=speed;
  }else if(dir == 1 && fade >= 255){
      dir = 0;
  }


  if(dir == 0 && fade > 0){
      fade -=speed;
  }else if (dir == 0 && fade == 0){
      dir = 1;
      grp += 1;
      if(grp > 2){
          grp = 0;
      }
  }

 show_mask();
 show_wash();
 show_distance();


 //console.log("fade =" + fade + " dir=" + dir + "  grp=" + grp);
 

}



function show_mask(){

    push();

    x = 300;
    y = 300;
    dx = 150;
    dy = 150;

    let alpha = 0;
    if(grp == 0){
        alpha = fade;
    }

    tint(255, alpha);
    image(mask, width-x, height-y, dx, dy);
    fill(255,255,255, alpha);
    noStroke();
    textFont(font_regular);
    textSize(25);
    textAlign(CENTER, TOP);
    text("Bitte tragen Sie einen Mund-Nasen-Schutz", width-x-(dx/2), height-y+dy+5, dx*2, dy*3);

 pop();

}



function show_wash(){

    push();

    x = 300;
    y = 300;
    dx = 150;
    dy = 150;

    let alpha = 0;
    if(grp == 1){
        alpha = fade;
    }


    tint(255, alpha);
    image(wash, width-x, height-y, dx, dy);
    fill(255,255,255, alpha);
    noStroke();
    textFont(font_regular);
    textSize(25);
    textAlign(CENTER, TOP);
    text("Bitte desinfizieren Sie Ihre Hände", width-x-(dx/2), height-y+dy+5, dx*2, dy*3);

 pop();

}


function show_distance(){

    push();

    x = 300;
    y = 300;
    dx = 150;
    dy = 150;

    let alpha = 0;
    if(grp == 2){
        alpha = fade;
    }


    tint(255, alpha);
    image(distance, width-x, height-y, dx, dy);
    fill(255,255,255, alpha);
    noStroke();
    textFont(font_regular);
    textSize(25);
    textAlign(CENTER, TOP);
    text("Bitte halten Sie einen Abstand von 1,5m zueinander ein", width-x-(dx/2), height-y+dy+5, dx*2, dy*3);

 pop();

}