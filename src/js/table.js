let sqlBtn = document.querySelector(".consoleBtn");
let structureBtn = document.querySelector(".structureBtn");
let tableDataBtn = document.querySelector(".showing-recordsBtn");
let insertBtn = document.querySelector(".insertBtn");
sqlBtn.addEventListener("click",function(){
  document.querySelector(".showing-records").style.display = "none";
  document.querySelector(".structure").style.display = "none";
  document.querySelector(".queries").style.display = "block";
  document.querySelector(".insert").style.display = "none";
});
structureBtn.addEventListener("click",function(){
  document.querySelector(".showing-records").style.display = "none";
  document.querySelector(".structure").style.display = "block";
  document.querySelector(".queries").style.display = "none";
  document.querySelector(".insert").style.display = "none";
});

tableDataBtn.addEventListener("click",function(){
  document.querySelector(".showing-records").style.display = "block";
  document.querySelector(".structure").style.display = "none";
  document.querySelector(".queries").style.display = "none";
  document.querySelector(".insert").style.display = "none";
});
insertBtn.addEventListener("click",function(){
  document.querySelector(".showing-records").style.display = "none";
  document.querySelector(".structure").style.display = "none";
  document.querySelector(".queries").style.display = "none";
  document.querySelector(".insert").style.display = "block";
});
