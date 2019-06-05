let sqlBtn = document.querySelector(".consoleBtn");
let structureBtn = document.querySelector(".structureBtn");
let tableDataBtn = document.querySelector(".showing-recordsBtn");
let insertBtn = document.querySelector(".insertBtn");
let allSigns = document.querySelector(".sign-AllBtn");
let toSend = document.querySelector(".dataForModify");
let localSendList = [];

function toModify(number){
  if(localSendList.indexOf(number) === -1)
  {
    localSendList.push(number);
  }
  else {
    localSendList.splice(localSendList.indexOf(number),1);
  }
  let finalList = "";
  for(let i = 0 ; i < localSendList.length; i++)
  {
    finalList+=localSendList[i]+";";
    toSend.value = finalList;
  }
  if(localSendList.length == 0)
  {
    toSend.value = "";
  }
}

allSigns.addEventListener("click",function(){
  let checkList = document.getElementsByClassName("modyfingCheckbox");
  for(let i = 0 ; i < checkList.length; i++)
  {
    let localId = checkList[i].id;
    document.querySelector("#"+localId).click();
  }
});

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
