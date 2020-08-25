
var test = "Hallo";


con_start = new Date(con_start * 1000);

var con_start_hour = con_start.getHours();
console.log(con_start_hour);


var runden = [];

var col_width, row_height, first_col, first_row;
var cols, rows;

var w, h;
function preload(){






    for(var i = 0; i< data.length; i++){
      var line = data[i];
      var t = line['Title'];
      var s = line['System'];
      var sl = line['SL'];
      var tbl = line['Table'];
      var clr = line['Color'];

      var start = line['Start'];
      var dur = line['dur'];

      var texte = {
        'Titel': t,
        'System': s,
        'SL': sl
      }


      runden.push(new RPG(start, dur, tbl, texte, clr));
    }


    var surr_div = document.getElementById('graphic');
    w = surr_div.clientWidth - 25;
    h = tische.length*75 + 150;


}


function setup(){
  var canvas = createCanvas(w,h);

  canvas.parent('graphic');

  background(200,200,200);

  first_col = 120;
  first_row = 75;
  col_width = (width-first_col)/zeiten.length;
  row_height = (height-first_row)/tische.length;

  cols = zeiten.length + 1;
  rows = tische.length + 1;



  draw_all();
}



function loop(){


}



function draw_all(){
  push();



    stroke(0);

    for(var i = 0; i< cols; i++){
        var x1 = first_col + col_width*i;
        var x2 = x1;
        var y1 = 0;
        var y2 = height;


        line(x1,y1,x2,y2);
    }

    for(var i = 0; i< rows; i++){
        var x1 = 0;
        var x2 = width;
        var y1 = first_row + row_height*i;
        var y2 = y1;


        line(x1,y1,x2,y2);
    }




  pop();


  for(var i = 0; i< zeiten.length; i++){
    var string = zeiten[i];
    var x = first_col + col_width*i + (col_width/2) + 8;
    var y = first_row - 5;

    push();
      textSize(16);
      translate(x,y);
      rotate(-PI/2);
      text(string, 0,0);
    pop();
  }


  tische.forEach(display_tische);





  for(var i = 0; i < runden.length; i++){
    runden[i].draw();
  }

}

function display_tische(item, index){
  var gruppe = item.gruppe;
  var name = item.name;
  var x = 5;
  var y = first_row + (row_height*index) + (row_height/2);

  push();
    translate(x,y);
    textSize(18);
    text(gruppe, 0,0);
    textSize(16);
    text(name, 0,18);
  pop();
}
