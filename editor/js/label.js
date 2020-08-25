
//Einheit Maße ist 1px = 1 dot
//Auflösung Drucker sind 200 dpi
//Etikett sind 6,4 x 10,2 cm
//2,52 x 4,01 inch

//Große etiketten 100 x 150 cm
// 3.93 x 5.91

let prg_logo, barcode_sample;
let resolution = 200;
let label_width = 5.91;
let label_height = 3.93;

let label_width_dots = label_width * resolution;
let label_height_dots = label_height * resolution;

function setup(){

  img = loadImage('img/PRG_Brand_RGB.png');
  barcode_sample = loadImage('img/barcode_sample.png');


  var canvas = createCanvas(label_width_dots,label_height_dots);
  canvas.parent('label_preview')
  background(255,255,230);
  stroke(0);
  noFill();
  rect(0,0,width, height);

}

function draw(){
  draw_statics();

  noLoop;
}

let y;
function draw_statics(){

  //image(img, (width - (img.width / 2 ) - 20), 10, img.width / 2, img.height / 2);


  y= 10+(0.22 * resolution);
  textSize(0.22 * resolution);
  noStroke();
  fill(0);
  text(eqid, 20, y);


if(firmware == ""){

}else{
  push();
  textAlign(RIGHT)
  textSize(0.15*resolution);
  text("Software-Stand: " + firmware, width-20, y);
  pop();
}
  y = y + (0.35*resolution)
  textSize(0.35*resolution);
  rect(0, y-(0.35*resolution)+1, width,(0.35*resolution)-1 );
  fill(255);
  text(h1, 20, y-5 );

  fill(0);
  noStroke();
  textSize(0.1 * resolution);
  y=y+ (0.1 * resolution)+2;
  text(sub, 20, y);


push();
textAlign(RIGHT);
  text("Serviced by: " + user + " | " + now, width-20, y);
pop();
  stroke(255,0,255);



    y=150;
  line(0,y,width, y);
  noStroke();

let bc_height = 75;




textSize(0.075 * resolution);
y = y + 0.075 * resolution + 2;
text(eqid + "- " + h1, 20, y);
y = y+2;
draw_barcode(10, y, bc_height);
y= y+ bc_height;



let show_bcs = 0;
if(children_names.length > 4){
  show_bcs = 4;
}else{
  show_bcs = children_names.length;
}



for(let i = 0; i<show_bcs; i++){

  y = y + 0.075 * resolution + 2;
  text(children_names[i], 20, y);
  y = y+2;
  draw_barcode(10, y, bc_height);
  y= y+ bc_height;
}

//Starte Spalte 2
y=150;

if(children_names.length > 4){

show_bcs = children_names.length -4;
  for(let i = 0; i<show_bcs; i++){

    y = y + 0.075 * resolution + 2;
    text(children_names[i+5], (width/2)+20, y);
    y = y+2;

    draw_barcode((width/2) + 20,y,  bc_height);
    y= y+ bc_height;
  }
y= y+ bc_height/2;
}












let show_ad = 0;

if(noncoded.length > 3){
  show_ad = 3;
}else{
  show_ad = noncoded.length;
}



y = 660;
push();
textSize(0.12 * resolution);

  for(let i = 0; i<show_ad; i++){

    text(noncoded[i], 20, y);
    push();
    textAlign(RIGHT);
    text(noncoded_pre[i] + "<?????>" + noncoded_suf[i], width/2 - 10, y);
    pop();
    y = y+(0.12 * resolution)+5;
  }
pop();
























if(noncoded.length > 3){
  show_ad = noncoded.length -3;
  y = 660;
  push();
  textSize(0.12 * resolution);
    for(let i = 0; i<show_ad; i++){
        text(noncoded[i+3], 20, y);
      push();
      textAlign(RIGHT);
      text(noncoded_pre[i+3] + "<?????>" + noncoded_suf[i+3], width/2 - 10, y);
      pop();
      y = y+(0.12 * resolution)+5;
    }

  pop();


}










    stroke(255,0,255);
      y=height - 50;
    line(0,y,width, y);

    noStroke();

    textSize(0.15 * resolution);
    y = y + (0.15 * resolution) + 2;
    push();
    textAlign(RIGHT);
    if(area == ""){

    }else{
    text("Lagerort: " + area + " " + loc + " " + box, width-20, y);
    }

    pop();

    if(dguv){
      text("DGUV: 02/2020", 20, y);
    }
    push();
    textAlign(CENTER);
    text("HAM", width/2, y);
    pop();

}

function draw_barcode(bc_pos_x, bc_pos_y, height){
  let factor = width/barcode_sample.witdth;

  image(barcode_sample, bc_pos_x, bc_pos_y, (width/2)-40, height)
}
