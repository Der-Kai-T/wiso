function RPG (start, dur, tisch_id, texte, color){

  this.start = start;
  this.dur = dur;
  this.tisch_id = tisch_id;
  this.texte = texte;
  this.color = color;


  this.draw = function(){

    var start_ = (this.start) * col_width;
    var stop_ = (this.stop) * col_width;

  //  console.log("start=" + start_ + "  stop=" + stop_);

    var tisch_row = tische_id[this.tisch_id];

    var x = first_col +start_;
    var y = first_row + row_height * tisch_row;
    var w = start_+dur;
    var h = row_height / 2;

  //  console.log("x=" + x + " y=" + y + " w= " +w, " h=" + h);
      push();
        noStroke();
        fill(255,0,0);
        rect(x,y,w,h);
        var titel = this.texte['Titel'];
        var system = this.texte['System'];
        var sl = this.texte['SL'];
        fill(0);
        noStroke();
        translate(x,y);
        textSize(14);
        text(titel, 0,14);
        textStyle(ITALIC);
        text(system, 0, 28);
      pop();

  }


}
