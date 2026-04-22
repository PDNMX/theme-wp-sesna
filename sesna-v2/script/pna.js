
var carouselIndex = 0;
function changeActive(){
  // console.log(carouselIndex);
  $("#pills-tab li a").removeClass("active");
  $("#pills-tab li a").eq(carouselIndex).addClass("active");

  $("#pills-tab-2 li a").removeClass("active");
  $("#pills-tab-2 li:nth("+carouselIndex+") a").addClass("active");
}


$('#carouselExampleIndicators').bind('slide.bs.carousel', function(e) {
  carouselIndex = e['to'];
  // console.log(carouselIndex);
  changeActive();
});

$(".carouselPlay").on("click",function(){
  $('.carousel').carousel('cycle');
});

$(".carouselPause").on("click",function(){
  $('.carousel').carousel('pause');
});












    /* 		D3 	GRAFICA 1			*/
const letterFrequencies =[
{ letter: "a",label:"IMCO", 						frequency: 4 },
{ letter: "b",label:"CIDE", 						frequency: 12 },
{ letter: "c",label:"INEGI", 						frequency: 18 },
{ letter: "d",label:"MÉXICO EVALÚA", 				frequency: 8 },
{ letter: "e",label:"UNODC", 						frequency: 4 },
{ letter: "f",label:"IMPUNIDAD CERO", 				frequency: 10 },
{ letter: "g",label:"ASF", 							frequency: 6 },
{ letter: "h",label:"UNAM", 						frequency: 8 },
{ letter: "i",label:"FUNDAR", 						frequency: 4 },
{ letter: "j",label:"TRANSPARENCIA INTERNACIONAL", 	frequency: 4 },
{ letter: "k",label:"TRANSPARENCIA MEXICANA", 		frequency: 2 },
{ letter: "l",label:"RED POR LA RENDICIÓN DE CUENTAS", frequency: 1 },
{ letter: "m",label:"COFECE", 						frequency: 2 },
{ letter: "n",label:"SFP", 							frequency: 2 },
{ letter: "o",label:"BANCO MUNDIAL", 				frequency: 4 },
{ letter: "p",label:"SHCP", 						frequency: 4 },
{ letter: "q",label:"OTROS", 						frequency: 18 }];


const margin = { top: 20, right: 5, bottom: 30, left: 20  };
var widthChartContainer = document.getElementById("chartContainer").offsetWidth;
//console.log(widthChartContainer);  
// const width = 550 - margin.left - margin.right;
var width = 550 - margin.left - margin.right;
var height = 250 - margin.top - margin.bottom;
var xGlobo = 5;
var yGlobo = 20;
if(widthChartContainer < 460){
	width = 270 - margin.left - margin.right;
	height = 150 - margin.top - margin.bottom;
  xGlobo = 2;
}

const xScale = d3.
scaleBand().
range([0, width]).
round(true).
paddingInner(0.6); // space between bars (it's a ratio)

const yScale = d3.scaleLinear().range([height, 0]);

const xAxis = d3.axisBottom().scale(xScale);

const yAxis = d3.
axisLeft().
scale(yScale).
ticks(12, "");

const svg = d3.
select(".chart").
append("svg").//responsive SVG needs these 2 attributes and no width and height attr
attr("width", width + margin.left + margin.right).
attr("height", height + margin.top + margin.bottom).
append("g").
attr("transform", `translate(${margin.left}, ${margin.right})`);

// set the ranges
var x = d3.scaleTime().range([0, width]);
var y = d3.scaleLinear().range([height, 0]);

const tooltip = d3.
select(".chart").
append("div").
attr("class", "tooltip").
  // style("height", "20px").
  style("border-radius","10px").
  style("color","#fff").
  style("font-family","Montserrat, sans-serif").
style("opacity", 0);

const tooltip2 = d3.
select(".chart").
append("div").
attr("class", "tooltip2").
style("opacity", 0);

xScale.domain(letterFrequencies.map(d => d.letter));
yScale.domain([0, d3.max(letterFrequencies, d => d.frequency)]);

svg.
append("g").
attr("class", "x axis").
attr("transform", `translate(0, ${height})`).
call(xAxis);

svg.
append("g").
attr("class", "y axis").
call(yAxis).
append("text").
attr("transform", "rotate(-90)").
attr("y", 6).
attr("dy", ".71em")


// gridlines in y axis function
function make_y_gridlines() {return d3.axisLeft(y).ticks(5)}
// add the Y gridlines
svg.append("g")			
.attr("class", "grid")
.call(make_y_gridlines()
  .tickSize(-width)
  .tickFormat("")
)

svg.
selectAll(".bar").
data(letterFrequencies).
enter().
append("rect").
attr("class", "bar").
attr("x", d => xScale(d.letter)).
attr("width", xScale.bandwidth()).
attr("y", d => yScale(d.frequency)).
attr("height", d => height - yScale(d.frequency)).
on("mouseover", function(d, i){
  var coordValue = $(".bar").eq( i );
  var xCood = parseInt(coordValue[0].getAttribute("x")) + xGlobo; 
   // console.log(xCood);
  var yCood = parseInt(coordValue[0].getAttribute("y")) - yGlobo;
  // console.log(yCood);
	/*	TOOLTIP ROJO CON FRECUENCIA	*/
  tooltip.
  transition().
  duration(200).
  style("opacity", 1);
  tooltip.
  html(`${d.frequency}`).
  style("left", xCood + `px`).
  style("top", yCood  + `px`)

  	/*	TOOLTIP DEPENDENCIA	*/
  tooltip2.
  transition().
  duration(200).
  style("opacity", 1);
  tooltip2.
  html(`<p>${d.label}</p>`).
  style("background-color","#fff").
  style("position","absolute").
  style("color","#dd2725").
  style("font-weight","800").
  style("font-family","Montserrat, sans-serif").
  style("right", `0`).
  style("bottom", `-50px`);



}).
on("mouseout", d =>{
	tooltip.transition().duration(500).style("opacity", 0)
	tooltip2.transition().duration(500).style("opacity", 0)
});




/* 		D3 	GRAFICA 2			*/
const yearFrequencies =[
{ year: "2005", 						frequency: 1 },
{ year: "2010",						frequency: 3 },
{ year: "2011",						frequency: 4 },
{ year: "2013", 				frequency: 4 },
{ year: "2014", 						frequency: 2 },
{ year: "2015", 				frequency: 6 },
{ year: "2016", 							frequency: 17 },
{ year: "2017",frequency: 30 },
{ year: "2018",					frequency:34 }];


const margin2 = { top: 20, right: 5, bottom: 30, left: 20  };
var widthChartContainer2 = screen.width;
// const width = 550 - margin.left - margin.right;
var width2 = 550 - margin2.left - margin2.right;
var height2 = 250 - margin2.top - margin2.bottom;
var xGlobo2 = 15;
var yGlobo2 = 20;
if(widthChartContainer2 < 460){
	width2 = 270 - margin2.left - margin2.right;
	height2 = 150 - margin2.top - margin2.bottom;
  xGlobo2 = 5;
}

const xScale2 = d3.
scaleBand().
range([0, width2]).
round(true).
paddingInner(0.5); // space between bars (it's a ratio)

const yScale2 = d3.scaleLinear().range([height2, 0]);

const xAxis2 = d3.axisBottom().scale(xScale2);

const yAxis2 = d3.
axisLeft().
scale(yScale2);
// ticks(9, "");

const svg2 = d3.
select(".chart2").
append("svg").//responsive SVG needs these 2 attributes and no width and height attr
attr("width", width2 + margin2.left + margin2.right).
attr("height", height2 + margin2.top + margin2.bottom).
append("g").
attr("transform", `translate(${margin2.left}, ${margin2.right})`);

// set the ranges
var x2 = d3.scaleTime().range([0, width2]);
var y2 = d3.scaleLinear().range([height2, 0]);

const tooltipChart2 = d3.
select(".chart2").
append("div").
attr("class", "tooltipChart2").
style("opacity", 0);


xScale2.domain(yearFrequencies.map(d => d.year));
yScale2.domain([0, d3.max(yearFrequencies, d => d.frequency)]);

svg2.
append("g").
attr("class", "x axis").
attr("transform", `translate(0, ${height2})`).
call(xAxis2);

svg2.
append("g").
attr("class", "y axis").
call(yAxis2).
append("text").
attr("transform", "rotate(-90)").
attr("y", 6).
attr("dy", ".71em")


// gridlines in y axis function
function make_y_gridlines2() {return d3.axisLeft(y2).ticks(5)}
// add the Y gridlines
svg2.append("g")			
.attr("class", "grid")
.call(make_y_gridlines2()
  .tickSize(-width2)
  .tickFormat("")
)

svg2.
selectAll(".bar").
data(yearFrequencies).
enter().
append("rect").
attr("class", "bar2").
attr("x", d => xScale2(d.year)).
attr("width", xScale2.bandwidth()).
attr("y", d => yScale2(d.frequency)).
attr("height", d => height2 - yScale2(d.frequency)).
on("mouseover", function(d,i){

  var coordValue2 = $(".bar2").eq( i );
  console.log(coordValue2[0].getAttribute("y"));
  var xCood2 = parseInt(coordValue2[0].getAttribute("x")) + xGlobo2;
  console.log(xCood2);
  var yCood2 = parseInt(coordValue2[0].getAttribute("y")) - yGlobo2;
  console.log(yCood2);

	/*	TOOLTIP ROJO CON FRECUENCIA	*/
  tooltipChart2.
  transition().
  duration(200).
  style("opacity", 1);
  tooltipChart2.
  html(`${d.frequency}`).
  // style("background-color","#dd2725").
  style("border-radius","10px").
  style("color","#fff").
  style("font-family","Montserrat, sans-serif").
  style("left", xCood2 + `px`).
  style("top", yCood2 + `px`);
 



}).
on("mouseout", d =>{
	tooltipChart2.transition().duration(500).style("opacity", 0)
});




